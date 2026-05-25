@extends('admin.layouts.app')

@section('title', app()->getLocale() === 'ar' ? 'إدارة شبكة الشركاء' : 'Partnerships Network Management')

@section('content')
<div class="w-full">

  {{-- Header --}}
  <div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-800 flex items-center gap-4">
      <div class="w-14 h-14 rounded-2xl bg-emerald-100 text-emerald-600 flex items-center justify-center text-2xl shadow-sm">
        <i class="fas fa-handshake"></i>
      </div>
      {{ app()->getLocale() === 'ar' ? 'إدارة شبكة الشركاء' : 'Partnerships Network Management' }}
    </h1>
    <p class="text-gray-500 text-base mt-2 ml-[72px]">
      {{ app()->getLocale() === 'ar' ? 'إضافة وتعديل وحذف شركاء المنظمة (المنظمات المحلية والمؤسسات الحكومية)' : 'Add, edit and delete organizational partners (Local NGOs & Government Institutions)' }}
    </p>
  </div>

  {{-- Success Alert --}}
  @if(session('success'))
  <div class="mb-6 flex items-center gap-3 bg-green-50 border border-green-200 text-green-700 px-5 py-4 rounded-xl text-base">
    <i class="fas fa-check-circle text-green-500 text-lg"></i>
    <span>{{ session('success') }}</span>
  </div>
  @endif

  {{-- ═══════════ Add New Partnership Form ═══════════ --}}
  <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 mb-8">
    <h2 class="text-xl font-semibold text-gray-700 mb-5 flex items-center gap-2">
      <i class="fas fa-plus-circle text-emerald-500 text-lg"></i>
      {{ app()->getLocale() === 'ar' ? 'إضافة شريك جديد' : 'Add New Partner' }}
    </h2>

    <form action="{{ route('admin.transparency_partnerships.store') }}" method="POST" class="bg-gray-50 border border-gray-200 rounded-xl p-6">
      @csrf
      <div class="grid grid-cols-1 md:grid-cols-5 gap-5 items-end">
        <div>
          <label class="block text-sm font-medium text-gray-600 mb-2">Category (EN / AR)</label>
          <select name="category_en" id="partner_category_selector" onchange="syncArabicPartnerCategory(this)" required
            class="w-full border border-gray-200 bg-white rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-emerald-300 focus:outline-none">
            <option value="Local NGOs">Local NGOs / المنظمات المحلية</option>
            <option value="Government &amp; Local Institutions">Government &amp; Local Institutions / المؤسسات الحكومية</option>
          </select>
          <input type="hidden" name="category_ar" id="partner_category_ar_input" value="المنظمات غير الحكومية المحلية">
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-600 mb-2">Name (EN)</label>
          <input type="text" name="name_en" required autocomplete="off" placeholder="e.g. Future Stars Centre"
            class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-emerald-300 focus:outline-none">
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-600 mb-2">الاسم (AR)</label>
          <input type="text" name="name_ar" required autocomplete="off" placeholder="مثال: مركز نجوم المستقبل" dir="rtl"
            class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-emerald-300 focus:outline-none">
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-600 mb-2">Icon Style Badge</label>
          <select name="icon" required
            class="w-full border border-gray-200 bg-white rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-emerald-300 focus:outline-none">
            <option value="fa-dove">🕊️ Dove (Jabal Sae)</option>
            <option value="fa-star">⭐ Star (Future Stars)</option>
            <option value="fa-notes-medical">🏥 Medical (Holistic)</option>
            <option value="fa-sun">☀️ Sun (Tabasheer)</option>
            <option value="fa-users">👥 Users (Social Affairs)</option>
            <option value="fa-hospital">🏨 Hospital (Health)</option>
            <option value="fa-handshake">🤝 Handshake</option>
            <option value="fa-hands-helping">🙌 Hands Helping</option>
            <option value="fa-university">🎓 University</option>
            <option value="fa-building">🏢 Building</option>
            <option value="fa-globe">🌍 Globe</option>
            <option value="fa-leaf">🌿 Leaf</option>
          </select>
        </div>
        <div>
          <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white py-3 px-5 rounded-xl text-sm font-semibold transition-colors flex items-center justify-center gap-2 shadow-sm">
            <i class="fas fa-plus"></i> {{ app()->getLocale() === 'ar' ? 'إضافة شريك' : 'Add Partner' }}
          </button>
        </div>
      </div>
    </form>
  </div>

  {{-- ═══════════ Partnerships List ═══════════ --}}
  <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
    <h2 class="text-xl font-semibold text-gray-700 mb-6 flex items-center gap-2">
      <i class="fas fa-list text-emerald-500 text-lg"></i>
      {{ app()->getLocale() === 'ar' ? 'قائمة الشركاء الحاليين' : 'Current Partners List' }}
      <span class="ml-auto bg-emerald-100 text-emerald-700 text-sm font-bold px-4 py-1.5 rounded-full">
        {{ $partnerships->count() }} {{ app()->getLocale() === 'ar' ? 'شريك' : 'Partners' }}
      </span>
    </h2>

    <div class="overflow-x-auto">
      <table class="w-full text-left border-collapse">
        <thead>
          <tr class="bg-gray-50 text-gray-600 text-base border-b-2 border-gray-200">
            <th class="py-4 px-6 font-semibold">{{ app()->getLocale() === 'ar' ? 'الاسم' : 'Name' }}</th>
            <th class="py-4 px-6 font-semibold">{{ app()->getLocale() === 'ar' ? 'الفئة' : 'Category' }}</th>
            <th class="py-4 px-6 font-semibold">{{ app()->getLocale() === 'ar' ? 'الأيقونة' : 'Icon Badge' }}</th>
            <th class="py-4 px-6 font-semibold text-right">{{ app()->getLocale() === 'ar' ? 'إجراء' : 'Action' }}</th>
          </tr>
        </thead>
        <tbody class="text-base text-gray-700 divide-y divide-gray-100">
          @forelse($partnerships as $partner)
          <tr class="hover:bg-emerald-50/40 transition-colors">
            <td class="py-5 px-6">
              <div class="font-semibold text-gray-800 text-base">{{ $partner->name_en }}</div>
              <div class="text-sm text-gray-500 mt-1" dir="rtl">{{ $partner->name_ar }}</div>
            </td>
            <td class="py-5 px-6">
              <span class="inline-flex items-center px-3.5 py-2 rounded-full text-sm font-semibold
                @if(in_array(strtolower($partner->category_en), ['local ngos', 'local ngo', 'ngo'])) bg-orange-50 text-orange-700 border border-orange-200
                @else bg-emerald-50 text-emerald-700 border border-emerald-200 @endif">
                {{ app()->getLocale() === 'ar' ? $partner->category_ar : $partner->category_en }}
              </span>
            </td>
            <td class="py-5 px-6">
              <span class="inline-flex items-center justify-center w-11 h-11 rounded-xl bg-emerald-100 text-emerald-700 text-xl">
                <i class="fa-solid {{ $partner->icon ?? 'fa-handshake' }}"></i>
              </span>
            </td>
            <td class="py-5 px-6 text-right">
              <div class="flex justify-end gap-3">
                <button type="button"
                  onclick='openEditPartnershipModal({ id: "{{ $partner->id }}", name_en: @json($partner->name_en), name_ar: @json($partner->name_ar), category_en: @json($partner->category_en), category_ar: @json($partner->category_ar), icon: @json($partner->icon) })'
                  class="text-blue-500 hover:text-blue-700 bg-blue-50 hover:bg-blue-100 px-4 py-2 rounded-xl transition-colors text-sm font-medium flex items-center gap-1.5">
                  <i class="fas fa-edit"></i> {{ app()->getLocale() === 'ar' ? 'تعديل' : 'Edit' }}
                </button>
                <form action="{{ route('admin.transparency_partnerships.destroy', $partner->id) }}" method="POST" onsubmit="return confirm('{{ app()->getLocale() === 'ar' ? 'هل أنت متأكد من حذف هذا الشريك؟' : 'Are you sure you want to delete this partner?' }}')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="text-red-500 hover:text-red-700 bg-red-50 hover:bg-red-100 px-4 py-2 rounded-xl transition-colors text-sm font-medium flex items-center gap-1.5">
                    <i class="fas fa-trash"></i> {{ app()->getLocale() === 'ar' ? 'حذف' : 'Delete' }}
                  </button>
                </form>
              </div>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="4" class="py-16 text-center text-gray-400">
              <div class="flex flex-col items-center gap-3">
                <i class="fas fa-handshake text-6xl opacity-20"></i>
                <span class="text-base">{{ app()->getLocale() === 'ar' ? 'لا يوجد شركاء مضافين بعد' : 'No partners added yet' }}</span>
              </div>
            </td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

</div>

{{-- Edit Partnership Modal --}}
<div id="editPartnershipModal" class="fixed inset-0 z-50 hidden bg-gray-900 bg-opacity-50 overflow-y-auto h-full w-full px-4">
    <div class="relative top-16 mx-auto p-6 border w-full max-w-lg shadow-2xl rounded-2xl bg-white">
        <div class="mt-2">
            <h3 class="text-xl font-semibold text-gray-800 mb-5 border-b pb-4 flex items-center gap-2">
                <i class="fas fa-edit text-emerald-500 text-lg"></i>
                {{ app()->getLocale() === 'ar' ? 'تعديل الشريك' : 'Edit Partner' }}
            </h3>
            <form id="editPartnershipForm" method="POST">
                @csrf
                @method('PUT')
                <div class="space-y-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-2">Category (EN / AR)</label>
                        <select id="edit_partner_category_en" name="category_en" onchange="syncEditArabicPartnerCategory(this)" required
                            class="w-full border border-gray-300 bg-white rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-emerald-300 focus:outline-none">
                            <option value="Local NGOs">Local NGOs / المنظمات المحلية</option>
                            <option value="Government &amp; Local Institutions">Government &amp; Local Institutions / المؤسسات الحكومية</option>
                        </select>
                        <input type="hidden" id="edit_partner_category_ar" name="category_ar" value="">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-2">Name (EN)</label>
                        <input type="text" id="edit_partner_name_en" name="name_en" required
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-emerald-300 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-2">الاسم (AR)</label>
                        <input type="text" id="edit_partner_name_ar" name="name_ar" dir="rtl" required
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-emerald-300 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-2">Icon Style Badge</label>
                        <select id="edit_partner_icon" name="icon" required
                            class="w-full border border-gray-300 bg-white rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-emerald-300 focus:outline-none">
                            <option value="fa-dove">🕊️ Dove (Jabal Sae)</option>
                            <option value="fa-star">⭐ Star (Future Stars)</option>
                            <option value="fa-notes-medical">🏥 Medical (Holistic)</option>
                            <option value="fa-sun">☀️ Sun (Tabasheer)</option>
                            <option value="fa-users">👥 Users (Social Affairs)</option>
                            <option value="fa-hospital">🏨 Hospital (Health)</option>
                            <option value="fa-handshake">🤝 Handshake</option>
                            <option value="fa-hands-helping">🙌 Hands Helping</option>
                            <option value="fa-university">🎓 University</option>
                            <option value="fa-building">🏢 Building</option>
                            <option value="fa-globe">🌍 Globe</option>
                            <option value="fa-leaf">🌿 Leaf</option>
                        </select>
                    </div>
                </div>

                <div class="flex justify-end gap-3 mt-6 border-t pt-5">
                    <button type="button" onclick="closeEditPartnershipModal()"
                        class="px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl text-sm font-medium transition-colors">
                        {{ app()->getLocale() === 'ar' ? 'إلغاء' : 'Cancel' }}
                    </button>
                    <button type="submit" class="px-5 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-sm font-medium transition-colors shadow-sm">
                        {{ app()->getLocale() === 'ar' ? 'حفظ التعديلات' : 'Save Changes' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
function syncArabicPartnerCategory(selectElement) {
  const arInput = document.getElementById('partner_category_ar_input');
  const val = selectElement.value;
  if (val === 'Local NGOs') {
    arInput.value = 'المنظمات غير الحكومية المحلية';
  } else if (val === 'Government & Local Institutions') {
    arInput.value = 'المؤسسات الحكومية والمحلية';
  }
}

function openEditPartnershipModal(partner) {
    const modal = document.getElementById('editPartnershipModal');
    const form = document.getElementById('editPartnershipForm');
    document.getElementById('edit_partner_name_en').value = partner.name_en;
    document.getElementById('edit_partner_name_ar').value = partner.name_ar;
    document.getElementById('edit_partner_category_en').value = partner.category_en;
    document.getElementById('edit_partner_category_ar').value = partner.category_ar;
    document.getElementById('edit_partner_icon').value = partner.icon || 'fa-handshake';
    form.action = `/admin/transparency/partnerships/${partner.id}`;
    modal.classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeEditPartnershipModal() {
    const modal = document.getElementById('editPartnershipModal');
    modal.classList.add('hidden');
    document.body.style.overflow = 'auto';
}

function syncEditArabicPartnerCategory(selectElement) {
  const arInput = document.getElementById('edit_partner_category_ar');
  const val = selectElement.value;
  if (val === 'Local NGOs') {
    arInput.value = 'المنظمات غير الحكومية المحلية';
  } else if (val === 'Government & Local Institutions') {
    arInput.value = 'المؤسسات الحكومية والمحلية';
  }
}

window.onclick = function(event) {
    const modal = document.getElementById('editPartnershipModal');
    if (event.target == modal) {
        closeEditPartnershipModal();
    }
}
</script>
@endpush
@endsection
