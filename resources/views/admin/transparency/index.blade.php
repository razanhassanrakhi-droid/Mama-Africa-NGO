@extends('admin.layouts.app')

@section('title', app()->getLocale() === 'ar' ? 'إدارة قسم الشفافية' : 'Transparency Section')

@section('content')
<div class="max-w-5xl mx-auto">

  {{-- Header --}}
  <div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-800">
      {{ app()->getLocale() === 'ar' ? 'إدارة قسم الشفافية' : 'Transparency Section' }}
    </h1>
    <p class="text-gray-500 text-sm mt-1">
      {{ app()->getLocale() === 'ar' ? 'تحكم في جميع محتويات قسم الشفافية في الصفحة الرئيسية' : 'Control all content of the Transparency section on the homepage' }}
    </p>
  </div>

  {{-- Success Alert --}}
  @if(session('success'))
  <div class="mb-5 flex items-center gap-3 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg">
    <i class="fas fa-check-circle text-green-500"></i>
    <span>{{ session('success') }}</span>
  </div>
  @endif

  <form method="POST" action="{{ route('admin.transparency.update') }}" enctype="multipart/form-data">
    @csrf

    {{-- ═══════════ Section Info ═══════════ --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
      <h2 class="text-lg font-semibold text-gray-700 mb-4 flex items-center gap-2">
        <i class="fas fa-align-left text-blue-500"></i>
        {{ app()->getLocale() === 'ar' ? 'عنوان القسم ووصفه' : 'Section Title & Description' }}
      </h2>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="block text-sm font-medium text-gray-600 mb-1">Title (English)</label>
          <input type="text" name="title_en" value="{{ old('title_en', $transparency->title_en ?? '') }}"
            class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-300 focus:outline-none @error('title_en') border-red-400 @enderror">
          @error('title_en')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-600 mb-1">العنوان (عربي)</label>
          <input type="text" name="title_ar" value="{{ old('title_ar', $transparency->title_ar ?? '') }}"
            dir="rtl" class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-300 focus:outline-none @error('title_ar') border-red-400 @enderror">
          @error('title_ar')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-600 mb-1">Description (English)</label>
          <textarea name="desc_en" rows="3"
            class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-300 focus:outline-none @error('desc_en') border-red-400 @enderror">{{ old('desc_en', $transparency->desc_en ?? '') }}</textarea>
          @error('desc_en')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-600 mb-1">الوصف (عربي)</label>
          <textarea name="desc_ar" rows="3" dir="rtl"
            class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-300 focus:outline-none @error('desc_ar') border-red-400 @enderror">{{ old('desc_ar', $transparency->desc_ar ?? '') }}</textarea>
          @error('desc_ar')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
        </div>
      </div>
    </div>

    {{-- ═══════════ 6 Counters ═══════════ --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
      <h2 class="text-lg font-semibold text-gray-700 mb-5 flex items-center gap-2">
        <i class="fas fa-sort-numeric-up text-green-500"></i>
        {{ app()->getLocale() === 'ar' ? 'العدادات الستة' : '6 Impact Counters' }}
      </h2>

      {{-- Show/Hide Values Toggle --}}
      <div class="mb-6 pb-4 border-b border-gray-100">
        <label class="flex items-center gap-3 cursor-pointer select-none group">
          <div class="relative items-center">
            <input type="checkbox" name="show_counter_values" value="1" 
              class="w-5 h-5 text-blue-600 rounded border-gray-300 focus:ring-blue-500 @error('show_counter_values') border-red-400 @enderror"
              {{ old('show_counter_values', $transparency->show_counter_values ?? true) ? 'checked' : '' }}>
          </div>
          <div class="flex flex-col">
            <span class="text-sm font-semibold text-gray-700 group-hover:text-blue-600 transition-colors">
              {{ app()->getLocale() === 'ar' ? 'إظهار القيم الرقمية للعدادات' : 'Show Numeric Values for Counters' }}
            </span>
            <span class="text-xs text-gray-500">
              {{ app()->getLocale() === 'ar' ? 'عند إلغاء التحديد، ستظهر الأيقونات والتسميات فقط على لوحة الشفافية' : 'When unchecked, only icons and labels will appear on the transparency dashboard' }}
            </span>
          </div>
        </label>
        @error('show_counter_values')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @for ($i = 1; $i <= 6; $i++)
        <div class="border border-gray-100 rounded-lg p-4 bg-gray-50">
          <p class="font-semibold text-sm text-gray-600 mb-3">
            {{ app()->getLocale() === 'ar' ? "العداد $i" : "Counter $i" }}
          </p>
          <div class="space-y-3">
            <div>
              <label class="block text-xs font-medium text-gray-500 mb-1">
                {{ app()->getLocale() === 'ar' ? 'القيمة الرقمية' : 'Numeric Value' }}
              </label>
              <input type="number" name="counter{{ $i }}_value" min="0" autocomplete="off"
                value="{{ old('counter'.$i.'_value', $transparency->{'counter'.$i.'_value'} ?? 0) }}"
                class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-300 focus:outline-none @error('counter'.$i.'_value') border-red-400 @enderror">
              @error('counter'.$i.'_value')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
              <label class="block text-xs font-medium text-gray-500 mb-1">Label (English)</label>
              <input type="text" name="counter{{ $i }}_label_en" autocomplete="off"
                value="{{ old('counter'.$i.'_label_en', $transparency->{'counter'.$i.'_label_en'} ?? '') }}"
                class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-300 focus:outline-none @error('counter'.$i.'_label_en') border-red-400 @enderror">
              @error('counter'.$i.'_label_en')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
              <label class="block text-xs font-medium text-gray-500 mb-1">التسمية (عربي)</label>
              <input type="text" name="counter{{ $i }}_label_ar" dir="rtl" autocomplete="off"
                value="{{ old('counter'.$i.'_label_ar', $transparency->{'counter'.$i.'_label_ar'} ?? '') }}"
                class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-300 focus:outline-none @error('counter'.$i.'_label_ar') border-red-400 @enderror">
              @error('counter'.$i.'_label_ar')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
          </div>
        </div>
        @endfor
      </div>
    </div>

    {{-- ═══════════ Financial Distribution ═══════════ --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
      <h2 class="text-lg font-semibold text-gray-700 mb-5 flex items-center gap-2">
        <i class="fas fa-money-bill-transfer text-indigo-500"></i>
        {{ app()->getLocale() === 'ar' ? 'التوزيع المالي للشفافية (%)' : 'Financial Transparency Distribution (%)' }}
      </h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div>
          <label class="block text-sm font-medium text-gray-600 mb-1">{{ app()->getLocale() === 'ar' ? 'البرامج (%)' : 'Programs (%)' }}</label>
          <input type="number" name="financial_programs" min="0" max="100" autocomplete="off"
            value="{{ old('financial_programs', $transparency->financial_programs ?? 85) }}"
            class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-300 focus:outline-none @error('financial_programs') border-red-400 @enderror">
          @error('financial_programs')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-600 mb-1">{{ app()->getLocale() === 'ar' ? 'العمليات (%)' : 'Operations (%)' }}</label>
          <input type="number" name="financial_operations" min="0" max="100" autocomplete="off"
            value="{{ old('financial_operations', $transparency->financial_operations ?? 10) }}"
            class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-300 focus:outline-none @error('financial_operations') border-red-400 @enderror">
          @error('financial_operations')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-600 mb-1">{{ app()->getLocale() === 'ar' ? 'التكاليف الإدارية (%)' : 'Admin Costs (%)' }}</label>
          <input type="number" name="financial_admin" min="0" max="100" autocomplete="off"
            value="{{ old('financial_admin', $transparency->financial_admin ?? 5) }}"
            class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-300 focus:outline-none @error('financial_admin') border-red-400 @enderror">
          @error('financial_admin')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
        </div>
      </div>

      <h3 class="text-md font-semibold text-gray-700 mb-4 border-t pt-4">
        {{ app()->getLocale() === 'ar' ? 'توزيع نسب البرامج الفردية (%)' : 'Individual Program Distribution (%)' }}
      </h3>
      <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div>
          <label class="block text-xs font-medium text-gray-600 mb-1">{{ app()->getLocale() === 'ar' ? 'مياه نظيفة' : 'Clean Water' }} (%)</label>
          <input type="number" name="percentage_clean_water" min="0" max="100" autocomplete="off"
            value="{{ old('percentage_clean_water', $transparency->percentage_clean_water ?? 30) }}"
            class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-300 focus:outline-none">
        </div>
        <div>
          <label class="block text-xs font-medium text-gray-600 mb-1">{{ app()->getLocale() === 'ar' ? 'تدريب' : 'Training' }} (%)</label>
          <input type="number" name="percentage_training" min="0" max="100" autocomplete="off"
            value="{{ old('percentage_training', $transparency->percentage_training ?? 30) }}"
            class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-300 focus:outline-none">
        </div>
        <div>
          <label class="block text-xs font-medium text-gray-600 mb-1">{{ app()->getLocale() === 'ar' ? 'تغذية' : 'Nutrition' }} (%)</label>
          <input type="number" name="percentage_nutrition" min="0" max="100" autocomplete="off"
            value="{{ old('percentage_nutrition', $transparency->percentage_nutrition ?? 20) }}"
            class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-300 focus:outline-none">
        </div>
        <div>
          <label class="block text-xs font-medium text-gray-600 mb-1">{{ app()->getLocale() === 'ar' ? 'بيئة' : 'Environment' }} (%)</label>
          <input type="number" name="percentage_environment" min="0" max="100" autocomplete="off"
            value="{{ old('percentage_environment', $transparency->percentage_environment ?? 12) }}"
            class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-300 focus:outline-none">
        </div>
      </div>
      <p class="text-xs text-gray-400 mt-4 italic">
        {{ app()->getLocale() === 'ar' ? '* تأكد أن مجموع نسب البرامج لا يتجاوز النسبة الإجمالية المخصصة للبرامج أعلاه.' : '* Ensure program percentages total does not exceed the total "Programs" allocation above.' }}
      </p>
    </div>

    {{-- ═══════════ Access Mode ═══════════ --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
      <h2 class="text-lg font-semibold text-gray-700 mb-4 flex items-center gap-2">
        <i class="fas fa-cog text-orange-500"></i>
        {{ app()->getLocale() === 'ar' ? 'خيار الوصول للتقارير السنوية' : 'Annual Reports Access Option' }}
      </h2>
      <div class="flex flex-wrap gap-4">
        {{-- Download --}}
        <label class="flex items-center gap-3 cursor-pointer select-none">
          <input type="radio" name="report_mode" value="download"
            class="w-4 h-4 text-orange-500 accent-orange-500"
            {{ old('report_mode', $transparency->report_mode ?? 'download') === 'download' ? 'checked' : '' }}>
          <span class="flex items-center gap-2 text-sm font-medium text-gray-700">
            <span class="inline-flex items-center gap-1.5 bg-green-100 text-green-700 px-3 py-1.5 rounded-full">
              <i class="fas fa-download"></i>
              {{ app()->getLocale() === 'ar' ? 'تنزيل الملف' : 'Download File' }}
            </span>
          </span>
        </label>
        {{-- View --}}
        <label class="flex items-center gap-3 cursor-pointer select-none">
          <input type="radio" name="report_mode" value="view"
            class="w-4 h-4 text-orange-500 accent-orange-500"
            {{ old('report_mode', $transparency->report_mode ?? 'download') === 'view' ? 'checked' : '' }}>
          <span class="flex items-center gap-2 text-sm font-medium text-gray-700">
            <span class="inline-flex items-center gap-1.5 bg-blue-100 text-blue-700 px-3 py-1.5 rounded-full">
              <i class="fas fa-eye"></i>
              {{ app()->getLocale() === 'ar' ? 'عرض في المتصفح' : 'View in Browser' }}
            </span>
          </span>
        </label>
      </div>
      @error('report_mode')
      <p class="text-red-500 text-xs mt-2 font-medium">{{ $message }}</p>
      @enderror
      <p class="text-gray-400 text-xs mt-2">
        {{ app()->getLocale() === 'ar'
          ? '"تنزيل" = يُحمَّل مباشرةً، "عرض" = يُفتح في نافذة جديدة'
          : '"Download" = saved directly to device, "View" = opened in a new browser tab' }}
      </p>
    </div>

    {{-- Save Button --}}
    <div class="flex justify-end mb-10">
      <button type="submit"
        class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-8 py-3 rounded-xl shadow-md transition-all">
        <i class="fas fa-save"></i>
        {{ app()->getLocale() === 'ar' ? 'حفظ التغييرات' : 'Save Changes' }}
      </button>
    </div>

  </form>
</div>

{{-- ═══════════ Funding Sources Management ═══════════ --}}
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6 max-w-5xl mx-auto">
  <div class="flex items-center justify-between mb-6">
    <h2 class="text-lg font-semibold text-gray-700 flex items-center gap-2">
      <i class="fas fa-circle-nodes text-orange-500"></i>
      {{ app()->getLocale() === 'ar' ? 'إدارة مصادر التمويل' : 'Funding Sources Management' }}
    </h2>
  </div>

  {{-- Add New Funding Source Form --}}
  <form action="{{ route('admin.transparency_funding_sources.store') }}" method="POST" class="bg-gray-50 border border-gray-200 rounded-lg p-4 mb-6">
    @csrf
    <div class="grid grid-cols-1 md:grid-cols-5 gap-4 items-end">
      <div>
        <label class="block text-xs font-medium text-gray-600 mb-1">Category (EN / AR)</label>
        <select name="category_en" id="category_selector" onchange="syncArabicCategory(this)" required
          class="w-full border border-gray-200 bg-white rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-orange-300 focus:outline-none">
          <option value="UN Agencies">UN Agencies / وكالات الأمم المتحدة</option>
          <option value="INGOs">INGOs / المنظمات غير الحكومية الدولية</option>
          <option value="Membership Support">Membership Support / دعم الأعضاء</option>
        </select>
        <input type="hidden" name="category_ar" id="category_ar_input" value="وكالات الأمم المتحدة">
      </div>
      <div>
        <label class="block text-xs font-medium text-gray-600 mb-1">Name (EN)</label>
        <input type="text" name="name_en" required autocomplete="off" placeholder="e.g. UNICEF"
          class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-orange-300 focus:outline-none">
      </div>
      <div>
        <label class="block text-xs font-medium text-gray-600 mb-1">الاسم (AR)</label>
        <input type="text" name="name_ar" required autocomplete="off" placeholder="مثال: اليونيسف" dir="rtl"
          class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-orange-300 focus:outline-none">
      </div>
      <div>
        <label class="block text-xs font-medium text-gray-600 mb-1">Icon Style Badge</label>
        <select name="icon" required
          class="w-full border border-gray-200 bg-white rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-orange-300 focus:outline-none">
          <option value="fa-child-reaching">Child Reaching (UNICEF)</option>
          <option value="fa-hand-holding-medical">Medical (WHO)</option>
          <option value="fa-hands-holding">Hands Holding (Plan)</option>
          <option value="fa-handshake-angle">Handshake Angle (COOPI)</option>
          <option value="fa-children">Children (Save Children)</option>
          <option value="fa-shield-heart">Shield Heart (Safer World)</option>
          <option value="fa-people-group">People Group (Sons of Darfur)</option>
          <option value="fa-id-card">ID Card (MAO Membership)</option>
          <option value="fa-globe">Globe (Standard UN)</option>
          <option value="fa-handshake">Handshake (Standard Partner)</option>
          <option value="fa-users">Users (Standard Community)</option>
        </select>
      </div>
      <div>
        <button type="submit" class="w-full bg-orange-500 hover:bg-orange-600 text-white py-2 px-4 rounded-lg text-sm font-semibold transition-colors flex items-center justify-center gap-2">
          <i class="fas fa-plus"></i> {{ app()->getLocale() === 'ar' ? 'إضافة' : 'Add Source' }}
        </button>
      </div>
    </div>
  </form>

  <script>
    function syncArabicCategory(selectElement) {
      const arInput = document.getElementById('category_ar_input');
      const val = selectElement.value;
      if (val === 'UN Agencies') {
        arInput.value = 'وكالات الأمم المتحدة';
      } else if (val === 'INGOs') {
        arInput.value = 'المنظمات غير الحكومية الدولية';
      } else if (val === 'Membership Support') {
        arInput.value = 'دعم الأعضاء';
      }
    }
  </script>

  {{-- Funding Sources List --}}
  <div class="overflow-x-auto">
    <table class="w-full text-left border-collapse">
      <thead>
        <tr class="bg-gray-50 text-gray-600 text-sm border-b border-gray-200">
          <th class="py-3 px-4 font-medium">{{ app()->getLocale() === 'ar' ? 'الاسم' : 'Name' }}</th>
          <th class="py-3 px-4 font-medium">{{ app()->getLocale() === 'ar' ? 'الفئة' : 'Category' }}</th>
          <th class="py-3 px-4 font-medium">{{ app()->getLocale() === 'ar' ? 'الأيقونة' : 'Icon Badge' }}</th>
          <th class="py-3 px-4 font-medium text-right">{{ app()->getLocale() === 'ar' ? 'إجراء' : 'Action' }}</th>
        </tr>
      </thead>
      <tbody class="text-sm text-gray-700 divide-y divide-gray-100">
        @forelse($fundingSources as $source)
        <tr class="hover:bg-gray-50 transition-colors">
          <td class="py-3 px-4">
            <div class="font-medium text-gray-800">{{ $source->name_en }}</div>
            <div class="text-xs text-gray-500" dir="rtl">{{ $source->name_ar }}</div>
          </td>
          <td class="py-3 px-4">
            <span class="inline-flex items-center px-2.5 py-1.5 rounded-full text-xs font-semibold
              @if(in_array(strtolower($source->category_en), ['un agencies', 'un agency', 'un'])) bg-blue-50 text-blue-700 border border-blue-100
              @elseif(in_array(strtolower($source->category_en), ['ingos', 'ingo'])) bg-green-50 text-green-700 border border-green-100
              @else bg-purple-50 text-purple-700 border border-purple-100 @endif">
              {{ app()->getLocale() === 'ar' ? $source->category_ar : $source->category_en }}
            </span>
          </td>
          <td class="py-3 px-4">
            <span class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-orange-100 text-orange-600">
              <i class="fa-solid {{ $source->icon ?? 'fa-circle-nodes' }}"></i>
            </span>
          </td>
          <td class="py-3 px-4 text-right">
            <div class="flex justify-end gap-2">
              <button type="button"
                onclick='openEditFundingSourceModal({ id: "{{ $source->id }}", name_en: @json($source->name_en), name_ar: @json($source->name_ar), category_en: @json($source->category_en), category_ar: @json($source->category_ar), icon: @json($source->icon) })'
                class="text-blue-500 hover:text-blue-700 bg-blue-50 hover:bg-blue-100 px-2 py-1 rounded transition-colors">
                <i class="fas fa-edit"></i>
              </button>
              <form action="{{ route('admin.transparency_funding_sources.destroy', $source->id) }}" method="POST" onsubmit="return confirm('{{ app()->getLocale() === 'ar' ? 'هل أنت متأكد من الحذف؟' : 'Are you sure you want to delete this funding source?' }}')">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-500 hover:text-red-700 bg-red-50 hover:bg-red-100 px-2 py-1 rounded transition-colors">
                  <i class="fas fa-trash"></i>
                </button>
              </form>
            </div>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="4" class="py-4 text-center text-gray-500">
            {{ app()->getLocale() === 'ar' ? 'لا يوجد جهات تمويل مضافة بعد' : 'No funding sources added yet' }}
          </td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

{{-- ═══════════ Annual Reports Management ═══════════ --}}
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-10 max-w-5xl mx-auto">
  <div class="flex items-center justify-between mb-6">
    <h2 class="text-lg font-semibold text-gray-700 flex items-center gap-2">
      <i class="fas fa-file-pdf text-red-500"></i>
      {{ app()->getLocale() === 'ar' ? 'التقارير السنوية (مركز التحميل)' : 'Annual Reports (Download Center)' }}
    </h2>
  </div>

  {{-- Add New Report Form --}}
  <form action="{{ route('admin.transparency_reports.store') }}" method="POST" enctype="multipart/form-data" class="bg-gray-50 border border-gray-200 rounded-lg p-4 mb-6">
    @csrf
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-start">
      <div>
        <label class="block text-xs font-medium text-gray-600 mb-1">Title (EN)</label>
        <input type="text" name="title_en" required
          class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-red-300 focus:outline-none">
      </div>
      <div>
        <label class="block text-xs font-medium text-gray-600 mb-1">العنوان (AR)</label>
        <input type="text" name="title_ar" dir="rtl" required
          class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-red-300 focus:outline-none">
      </div>
      <div>
        <label class="block text-xs font-medium text-gray-600 mb-1">Year</label>
        <input type="number" name="year" min="1990" max="{{ date('Y')+1 }}" value="{{ date('Y') }}" required
          class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-red-300 focus:outline-none">
      </div>
      <div>
        <label class="block text-xs font-medium text-gray-600 mb-1">PDF File</label>
        <div class="flex items-center gap-2">
          <input type="file" name="file_path" accept=".pdf" required
            class="w-full border border-gray-200 bg-white rounded-lg px-2 py-1.5 text-sm file:mr-2 file:py-1 file:px-2 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-red-50 file:text-red-700 hover:file:bg-red-100">
          <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded-lg text-sm font-medium transition-colors">
            <i class="fas fa-plus"></i>
          </button>
        </div>
      </div>
    </div>
  </form>

  {{-- Reports List --}}
  <div class="overflow-x-auto">
    <table class="w-full text-left border-collapse">
      <thead>
        <tr class="bg-gray-50 text-gray-600 text-sm border-b border-gray-200">
          <th class="py-3 px-4 font-medium">{{ app()->getLocale() === 'ar' ? 'العنوان' : 'Title' }}</th>
          <th class="py-3 px-4 font-medium">{{ app()->getLocale() === 'ar' ? 'السنة' : 'Year' }}</th>
          <th class="py-3 px-4 font-medium">{{ app()->getLocale() === 'ar' ? 'الملف' : 'File' }}</th>
          <th class="py-3 px-4 font-medium text-right">{{ app()->getLocale() === 'ar' ? 'إجراء' : 'Action' }}</th>
        </tr>
      </thead>
      <tbody class="text-sm text-gray-700 divide-y divide-gray-100">
        @forelse(isset($reports) ? $reports : [] as $rep)
        <tr class="hover:bg-gray-50 transition-colors">
          <td class="py-3 px-4">
            <div class="font-medium text-gray-800">{{ $rep->title_en }}</div>
            <div class="text-xs text-gray-500" dir="rtl">{{ $rep->title_ar }}</div>
          </td>
          <td class="py-3 px-4 font-semibold text-gray-600">{{ $rep->year }}</td>
          <td class="py-3 px-4">
            <a href="{{ url('/media/' . $rep->file_path) }}" target="_blank" class="text-blue-600 hover:underline flex items-center gap-1">
              <i class="fas fa-external-link-alt text-xs"></i> View PDF
            </a>
          </td>
          <td class="py-3 px-4 text-right">
            <div class="flex justify-end gap-2">
              <button type="button" 
                onclick='openEditModal({ id: "{{ $rep->id }}", title_en: @json($rep->title_en), title_ar: @json($rep->title_ar), year: "{{ $rep->year }}" })'
                class="text-blue-500 hover:text-blue-700 bg-blue-50 hover:bg-blue-100 px-2 py-1 rounded transition-colors">
                <i class="fas fa-edit"></i>
              </button>
              <form action="{{ route('admin.transparency_reports.destroy', $rep->id) }}" method="POST" onsubmit="return confirm('{{ app()->getLocale() === 'ar' ? 'هل أنت متأكد من الحذف؟' : 'Are you sure you want to delete this report?' }}')">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-500 hover:text-red-700 bg-red-50 hover:bg-red-100 px-2 py-1 rounded transition-colors">
                  <i class="fas fa-trash"></i>
                </button>
              </form>
            </div>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="4" class="py-4 text-center text-gray-500">
            {{ app()->getLocale() === 'ar' ? 'لا يوجد تقارير مضافة بعد' : 'No reports added yet' }}
          </td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

@endsection

@push('scripts')
<div id="editReportModal" class="fixed inset-0 z-50 hidden bg-gray-900 bg-opacity-50 overflow-y-auto h-full w-full px-4">
    <div class="relative top-20 mx-auto p-5 border w-full max-w-md shadow-lg rounded-xl bg-white">
        <div class="mt-3">
            <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">
                {{ app()->getLocale() === 'ar' ? 'تعديل التقرير' : 'Edit Report' }}
            </h3>
            <form id="editReportForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1">Title (EN)</label>
                        <input type="text" id="edit_title_en" name="title_en" required
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-300 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1">العنوان (AR)</label>
                        <input type="text" id="edit_title_ar" name="title_ar" dir="rtl" required
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-300 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1">Year</label>
                        <input type="number" id="edit_year" name="year" min="1990" max="{{ date('Y')+1 }}" required
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-300 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1">Replace PDF File (Optional)</label>
                        <input type="file" name="file_path" accept=".pdf"
                            class="w-full border border-gray-300 bg-white rounded-lg px-2 py-1.5 text-sm file:mr-2 file:py-1 file:px-2 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    </div>
                </div>

                <div class="flex justify-end gap-3 mt-6 border-t pt-4">
                    <button type="button" onclick="closeEditModal()" 
                        class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg text-sm font-medium transition-colors">
                        {{ app()->getLocale() === 'ar' ? 'إلغاء' : 'Cancel' }}
                    </button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm font-medium transition-colors shadow-sm">
                        {{ app()->getLocale() === 'ar' ? 'حفظ التعديلات' : 'Save Changes' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Funding Source Edit Modal --}}
<div id="editFundingSourceModal" class="fixed inset-0 z-50 hidden bg-gray-900 bg-opacity-50 overflow-y-auto h-full w-full px-4">
    <div class="relative top-20 mx-auto p-5 border w-full max-w-md shadow-lg rounded-xl bg-white">
        <div class="mt-3">
            <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">
                {{ app()->getLocale() === 'ar' ? 'تعديل جهة التمويل' : 'Edit Funding Source' }}
            </h3>
            <form id="editFundingSourceForm" method="POST">
                @csrf
                @method('PUT')
                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1">Category (EN / AR)</label>
                        <select id="edit_source_category_en" name="category_en" onchange="syncEditArabicCategory(this)" required
                            class="w-full border border-gray-300 bg-white rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-orange-300 focus:outline-none">
                            <option value="UN Agencies">UN Agencies / وكالات الأمم المتحدة</option>
                            <option value="INGOs">INGOs / المنظمات غير الحكومية الدولية</option>
                            <option value="Membership Support">Membership Support / دعم الأعضاء</option>
                        </select>
                        <input type="hidden" id="edit_source_category_ar" name="category_ar" value="">
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1">Name (EN)</label>
                        <input type="text" id="edit_source_name_en" name="name_en" required
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-orange-300 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1">الاسم (AR)</label>
                        <input type="text" id="edit_source_name_ar" name="name_ar" dir="rtl" required
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-orange-300 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1">Icon Style Badge</label>
                        <select id="edit_source_icon" name="icon" required
                            class="w-full border border-gray-300 bg-white rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-orange-300 focus:outline-none">
                            <option value="fa-child-reaching">Child Reaching (UNICEF)</option>
                            <option value="fa-hand-holding-medical">Medical (WHO)</option>
                            <option value="fa-hands-holding">Hands Holding (Plan)</option>
                            <option value="fa-handshake-angle">Handshake Angle (COOPI)</option>
                            <option value="fa-children">Children (Save Children)</option>
                            <option value="fa-shield-heart">Shield Heart (Safer World)</option>
                            <option value="fa-people-group">People Group (Sons of Darfur)</option>
                            <option value="fa-id-card">ID Card (MAO Membership)</option>
                            <option value="fa-globe">Globe (Standard UN)</option>
                            <option value="fa-handshake">Handshake (Standard Partner)</option>
                            <option value="fa-users">Users (Standard Community)</option>
                        </select>
                    </div>
                </div>

                <div class="flex justify-end gap-3 mt-6 border-t pt-4">
                    <button type="button" onclick="closeEditFundingSourceModal()" 
                        class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg text-sm font-medium transition-colors">
                        {{ app()->getLocale() === 'ar' ? 'إلغاء' : 'Cancel' }}
                    </button>
                    <button type="submit" class="px-4 py-2 bg-orange-500 hover:bg-orange-600 text-white rounded-lg text-sm font-medium transition-colors shadow-sm">
                        {{ app()->getLocale() === 'ar' ? 'حفظ التعديلات' : 'Save Changes' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function openEditModal(report) {
    const modal = document.getElementById('editReportModal');
    const form = document.getElementById('editReportForm');
    
    // Set field values
    document.getElementById('edit_title_en').value = report.title_en;
    document.getElementById('edit_title_ar').value = report.title_ar;
    document.getElementById('edit_year').value = report.year;
    
    // Set action URL
    form.action = `/admin/transparency/reports/${report.id}`;
    
    // Show modal
    modal.classList.remove('hidden');
    document.body.style.overflow = 'hidden'; // Prevent scrolling
}

function closeEditModal() {
    const modal = document.getElementById('editReportModal');
    modal.classList.add('hidden');
    document.body.style.overflow = 'auto'; // Restore scrolling
}

function openEditFundingSourceModal(source) {
    const modal = document.getElementById('editFundingSourceModal');
    const form = document.getElementById('editFundingSourceForm');
    
    // Set field values
    document.getElementById('edit_source_name_en').value = source.name_en;
    document.getElementById('edit_source_name_ar').value = source.name_ar;
    document.getElementById('edit_source_category_en').value = source.category_en;
    document.getElementById('edit_source_category_ar').value = source.category_ar;
    document.getElementById('edit_source_icon').value = source.icon || 'fa-circle-nodes';
    
    // Set action URL
    form.action = `/admin/transparency/funding-sources/${source.id}`;
    
    // Show modal
    modal.classList.remove('hidden');
    document.body.style.overflow = 'hidden'; // Prevent scrolling
}

function closeEditFundingSourceModal() {
    const modal = document.getElementById('editFundingSourceModal');
    modal.classList.add('hidden');
    document.body.style.overflow = 'auto'; // Restore scrolling
}


function syncEditArabicCategory(selectElement) {
  const arInput = document.getElementById('edit_source_category_ar');
  const val = selectElement.value;
  if (val === 'UN Agencies') {
    arInput.value = 'وكالات الأمم المتحدة';
  } else if (val === 'INGOs') {
    arInput.value = 'المنظمات غير الحكومية الدولية';
  } else if (val === 'Membership Support') {
    arInput.value = 'دعم الأعضاء';
  }
}

// Close modal when clicking outside
window.onclick = function(event) {
    const modalReport = document.getElementById('editReportModal');
    const modalFunding = document.getElementById('editFundingSourceModal');
    if (event.target == modalReport) {
        closeEditModal();
    }
    if (event.target == modalFunding) {
        closeEditFundingSourceModal();
    }
}
</script>
@endpush
