  @extends('layouts.admin')

@section('title','إدارة المشاريع')

@section('content')

  <!-- Search Input -->


        <div class="flex flex-col items-center justify-center gap-6 p-6 max-w-2xl mx-auto">

            <div class="relative w-full">
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>

                <input  onkeyup="searchData(this.value)" id="search" type="text" placeholder="بحث بالاسم..." class="w-full p-4 pr-10 rounded-xl border border-gray-200 shadow-sm 
                      focus:outline-none focus:ring-4 focus:ring-sky-500/20 focus:border-sky-500 
                      transition-all bg-white text-gray-800 text-center">
            </div>

        </div>
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden border border-gray-100 w-full max-w-6xl mx-auto">
            <div class="overflow-x-auto shadow-inner">
                <table class="w-full text-center border-collapse" id="productTable">
                    <thead class="bg-gradient-to-l from-gray-50 to-gray-100">
                        <tr id="tableHeadRow" class="text-indigo-900 uppercase text-sm leading-normal">
                            <th class="py-4 px-6 font-bold">{{ __('massage.inqtable.person_name') }}</th>
                            <th class="py-4 px-6 font-bold">{{ __('massage.inqtable.message') }}</th>
                            <th class="py-4 px-6 font-bold">{{ __('massage.inqtable.email') }}</th>
                            <th class="py-4 px-6 font-bold">{{ __('massage.inqtable.actions') }}</th>

                        </tr>
                    </thead>

<tbody id="tbody" class="text-gray-700 text-sm font-light divide-y divide-gray-100">
    @forelse($inquiries as $inquiry)
        <tr class="hover:bg-indigo-50/50 transition-colors">
            <td class="py-4 px-6 text-center font-medium">{{ $inquiry->full_name }}</td>
            <td class="py-4 px-6 text-center">{{ $inquiry->message }}</td>
            <td class="py-4 px-6 text-center">{{ $inquiry->email }}</td>
            <td class="py-4 px-6 text-center">
                <div class="flex item-center justify-center gap-2">
                    <!-- زر حذف مثالياً -->
                   <form action="{{ route('inquiries.destroy', $inquiry->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit"
        onclick="return confirm('هل أنت متأكد من حذف هذا الاستفسار؟')"
        class="w-8 h-8 rounded-lg bg-rose-50 text-rose-600 hover:bg-rose-600 hover:text-white transition-all flex items-center justify-center">
        🗑
    </button>
</form>
                </div>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="4" class="py-6 text-center text-gray-500">لا توجد بيانات حاليا.</td>
        </tr>
    @endforelse
</tbody>                </table>
            </div>
            <div id="noDataMessage" class="p-8 text-center text-gray-500 hidden" data-i18n="noData">
                لا توجد منتجات حاليا. أضف منتج جديد.
            </div>
        </div>
    </section>
    @endsection
@push('scripts')
<script>
function previewImage(event) {
    const input = event.target;
    const preview = document.getElementById('imagePreview');
    const container = document.getElementById('imagePreviewContainer');
    const removeBtn = document.getElementById('removeImageBtn');

    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = (e) => {
            preview.src = e.target.result;
            preview.classList.remove('hidden');
            container.classList.add('hidden'); // نخفي الأيقونة فقط
            removeBtn.classList.remove('hidden');
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function removeImage(event) {
    event.preventDefault();

    const input = document.querySelector('input[name="image"]');
    const preview = document.getElementById('imagePreview');
    const container = document.getElementById('imagePreviewContainer');
    const removeBtn = document.getElementById('removeImageBtn');

    input.value = "";
    preview.src = "";
    preview.classList.add('hidden');
    container.classList.remove('hidden');
    removeBtn.classList.add('hidden');
}
function searchData(value) {
    const filter = value.toLowerCase();
    const rows = document.querySelectorAll("#productTable tbody tr");

    rows.forEach(row => {
        // دمج كل الأعمدة النصية في الصف
        const rowText = Array.from(row.cells)
            .map(cell => cell.innerText.toLowerCase())
            .join(" ");

        // عرض أو إخفاء الصف
        if (rowText.includes(filter)) {
            row.style.display = "";
        } else {
            row.style.display = "none";
        }
    });
}

</script>
@endpush

