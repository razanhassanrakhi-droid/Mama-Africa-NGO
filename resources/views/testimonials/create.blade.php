@extends('layouts.admin')

@section('title','إدارة المشاريع')

@section('content')

<section class="container mx-auto px-4 pb-10 flex-grow">

  
    {{-- الفورم --}}
    <form action="{{ route('testimonials.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="glass-effect rounded-xl shadow-md p-6 mb-8 grid grid-cols-1 lg:grid-cols-4 gap-6">

            {{-- Inputs --}}
            <div class="lg:col-span-3 space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <div class="col-span-2">
                        <label class="block text-sm font-bold mb-1 text-gray-600 text-center" data-i18n="help">
                            تاثير المساعدات
                        </label>

                       <label class="block text-sm font-semibold mb-1 text-gray-600"> {{ __('massage.name_ar') }}</label>
    <input name="name[ar]" type="text" placeholder=" {{ __('massage.name_ar') }}"
           class="w-full p-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500">

    <label class="block text-sm font-semibold mb-1 text-gray-600 mt-2">{{ __('massage.name_ar') }}</label>
    <input name="name[en]" type="text" placeholder="Enter person name in English"
           class="w-full p-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500">
</div>

                    <div class="col-span-2">
                       <label class="block text-sm font-semibold mb-1 text-gray-600">{{ __('massage.comment_ar') }}</label>
    <input name="comment[ar]" type="text" placeholder="أدخل التعليق بالعربي"
           class="w-full p-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500">

    <label class="block text-sm font-semibold mb-1 text-gray-600 mt-2">{{ __('massage.comment_en') }}</label>
    <input name="comment[en]" type="text" placeholder="Enter comment in English"
           class="w-full p-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500">
</div>

                </div>
            </div>

            {{-- Upload Image --}}
            <div class="lg:col-span-1">
                <div class="h-full min-h-[200px] border-2 border-dashed border-gray-300 rounded-xl
                            flex flex-col justify-center items-center bg-gray-50 hover:bg-gray-100
                            transition cursor-pointer group relative overflow-hidden">

                    <input type="file" name="image" accept="image/*"
                           class="absolute inset-0 opacity-0 cursor-pointer z-10"
                           onchange="previewImage(event)">

                    <div id="imagePreviewContainer" class="w-full h-full flex flex-col items-center justify-center p-2">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="h-16 w-16 text-gray-400 group-hover:text-blue-500 transition mb-2"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                  d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <span class="text-sm text-gray-500 font-medium group-hover:text-blue-600">
{{ __('massage.upload_image') }}                        </span>
                    </div>

                    <img id="imagePreview" class="absolute inset-0 w-full h-full object-cover hidden" alt="preview"/>

                    <button id="removeImageBtn" type="button" onclick="removeImage(event)"
                            class="absolute top-2 right-2 bg-red-500 text-white p-1 rounded-full
                                   hover:bg-red-600 hidden z-20" title="حذف الصورة">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>

            {{-- Submit --}}
            <div class="lg:col-span-4 flex justify-center">
                <button type="submit"
                        class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-3 px-6 rounded-lg
                               shadow-md hover:shadow-lg transition transform hover:-translate-y-0.5
                               flex justify-center items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 4v16m8-8H4"/>
                    </svg>
                    <span data-i18n="create"> {{ __('massage.submit') }}</span>
                </button>
            </div>

        </div>
    </form>

    {{-- Search --}}
    <div class="flex flex-col items-center justify-center gap-6 p-6 max-w-2xl mx-auto">
        <div class="relative w-full">
            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>

            <input onkeyup="searchData(this.value)" id="search" type="text"
                   placeholder="{{ __('massage.search_placeholder') }}"
                   class="w-full p-4 pr-10 rounded-xl border border-gray-200 shadow-sm
                          focus:outline-none focus:ring-4 focus:ring-sky-500/20 focus:border-sky-500
                          transition-all bg-white text-gray-800 text-center">
        </div>
    </div>

    {{-- Table --}}
    <div class="bg-white rounded-2xl shadow-2xl overflow-hidden border border-gray-100 w-full max-w-6xl mx-auto">
        <div class="overflow-x-auto shadow-inner">
            <table class="w-full text-center border-collapse" id="productTable">
                <thead class="bg-gradient-to-l from-gray-50 to-gray-100">
                <tr class="text-indigo-900 uppercase text-sm leading-normal">
                    <th class="py-4 px-6 font-bold"> {{ __('massage.table.name') }}</th>
                    <th class="py-4 px-6 font-bold">{{ __('massage.table.comment') }}</th>
                    <th class="py-4 px-6 font-bold">{{ __('massage.table.image') }}</th>
                    <th class="py-4 px-6 font-bold">{{ __('massage.table.actions') }}</th>
                </tr>
                </thead>

                <tbody id="tbody" class="text-gray-700 text-sm font-light divide-y divide-gray-100">
                @foreach($testimonials as $item)
                    <tr class="hover:bg-indigo-50/50 transition-colors">
                        <td class="py-4 px-6 font-medium">
                             <div><strong>AR:</strong> {{ $item->getTranslation('name','ar') }}</div>
        <div><strong>EN:</strong> {{ $item->getTranslation('name','en') }}</div>
                        </td>
                        <td class="py-4 px-6"> <div><strong>AR:</strong> {{ $item->getTranslation('comment','ar') }}</div>
        <div><strong>EN:</strong> {{ $item->getTranslation('comment','en') }}</div></td>

                        <td class="py-4 px-6">
                            @if($item->image)    
                                <img src="{{ url('/media/'.$item->image) }}"
                                     class="w-12 h-12 rounded-full object-cover mx-auto" alt="img">
                            @else
                                <span class="text-gray-400">—</span>
                            @endif
                        </td>

                        <td class="py-4 px-6">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('testimonials.edit', $item->id) }}"
                                   class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white transition-all flex items-center justify-center">
                                    ✎
                                </a>

                                <form action="{{ route('testimonials.destroy', $item->id) }}" method="POST"
                                      onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="w-8 h-8 rounded-lg bg-rose-50 text-rose-600 hover:bg-rose-600 hover:text-white transition-all flex items-center justify-center">
                                        🗑
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
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
            container.classList.add('hidden');
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
        const title = row.cells[0].innerText.toLowerCase();
        const type = row.cells[1].innerText.toLowerCase();
        const cost = row.cells[2].innerText.toLowerCase();

        if (title.includes(filter) || type.includes(filter) || cost.includes(filter)) {
            row.style.display = "";
        } else {
            row.style.display = "none";
        }
    });
}  
</script>
</script>
@endpush


