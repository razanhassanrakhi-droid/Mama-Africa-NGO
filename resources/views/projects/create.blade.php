@extends('layouts.admin')

@section('title','إدارة المشاريع')

@section('content')

<section  id="news" class="container mx-auto px-4 pb-10 flex-grow">
                 <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
 @csrf

   <!-- Form Inputs 3 (Right Side - 3 Columns) -->
<div class="lg:col-span-3 space-y-4">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 flex justify-center">

        <!-- حقل اسم المشروع -->
        <div class="col-span-2">
            <label class="block text-2xl font-font-bold mb-1 text-black text-center" data-i18n="projectM">
             {{ __('massage.project_management') }}
            </label>

           <label class="block text-sm font-semibold mb-1 text-gray-600">
                     {{ __('massage.project_name_ar') }}
            </label>
            <input type="text" name="name[ar]" placeholder="    {{ __('massage.project_name_ar') }}"
                class="w-full p-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500">

            <label class="block text-sm font-semibold mb-1 text-gray-600 mt-2">
            {{ __('massage.project_name_en') }}
            </label>
            <input type="text" name="name[en]" placeholder=" {{ __('massage.project_name_en') }}"
                class="w-full p-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- حقل التحدي (challenge) -->
        <div class="col-span-2">
<!-- التحدي -->
<label class="block text-sm font-semibold mb-1 text-gray-600">
   {{ __('massage.challange_ar') }}
</label>
<textarea name="challange[ar]" rows="4" placeholder=" {{ __('massage.challange_ar') }}"
    class="w-full p-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500"></textarea>

<label class="block text-sm font-semibold mb-1 text-gray-600 mt-2">
     {{ __('massage.challange_en') }}
</label>
<textarea name="challange[en]" rows="4" placeholder=" {{ __('massage.challange_en') }}"
    class="w-full p-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500"></textarea>
        </div>

        <!-- حقل الوصف (description) -->
        <div class="col-span-2">
             <label class="block text-sm font-semibold mb-1 text-gray-600">
             {{ __('massage.description_ar') }}
            </label>
            <textarea name="description[ar]" rows="6" placeholder="  {{ __('massage.description_ar') }}"
                class="w-full p-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500"></textarea>

            <label class="block text-sm font-semibold mb-1 text-gray-600 mt-2">
               {{ __('massage.description_en') }}
            </label>
            <textarea name="description[en]" rows="6" placeholder="{{ __('massage.description_en') }}"
                class="w-full p-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500"></textarea>
        </div>

    </div>
</div>

            <!-- Image Placeholder (Left Side - 1 Column) -->
           
        <div class="lg:col-span-1">
            <div class="h-full min-h-[200px] border-2 border-dashed border-gray-300 rounded-xl flex flex-col justify-center items-center bg-gray-50 hover:bg-gray-100 transition cursor-pointer group relative overflow-hidden">
                <input type="file" name="image" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer z-10"
                    onchange="previewImage(event)">
                <div id="imagePreviewContainer" class="w-full h-full flex flex-col items-center justify-center p-2">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-16 w-16 text-gray-400 group-hover:text-blue-500 transition mb-2" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span class="text-sm text-gray-500 font-medium group-hover:text-blue-600">{{ __('massage.image_upload') }}   </span>
                </div>
                <img id="imagePreview" class="absolute inset-0 w-full h-full object-cover hidden" />
                <button id="removeImageBtn" onclick="removeImage(event)"
                    class="absolute top-2 right-2 bg-red-500 text-white p-1 rounded-full hover:bg-red-600 hidden z-20"
                    title="حذف الصورة">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Action Buttons -->
</div>
    <div class="relative w-full">
        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>
          <div class="max-w-5xl mx-auto p-4" dir="rtl">
 <div class="  flex justify-center w-full">
            <button id="submitMamber" class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-3 px-6 rounded-lg shadow-md hover:shadow-lg transition transform hover:-translate-y-0.5 flex justify-center items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span data-i18n="createmember"> {{ __('massage.add_news') }} </span>
            </button>
        </div>
</div>
</form>
<input   onkeyup="searchData(this.value)" id="search" type="text" 
               placeholder="{{ __('massage.search_placeholder') }}" 
               class="w-full p-4 pr-10 rounded-xl border border-gray-200 shadow-sm 
                      focus:outline-none focus:ring-4 focus:ring-sky-500/20 focus:border-sky-500 
                      transition-all bg-white text-gray-800 text-center">
                      
  <div class="bg-white rounded-2xl shadow-2xl overflow-hidden border border-gray-100 w-full max-w-6xl mx-auto">
    <div class="overflow-x-auto shadow-inner">
        <table class="w-full text-center border-collapse" id="productTable">
            <thead class="bg-gradient-to-l from-gray-50 to-gray-100">
                <tr id="tableHeadRow" class="text-indigo-900 uppercase text-sm leading-normal">
                    <th class="py-4 px-6 font-bold">{{ __('massage.ta.project_category') }} </th>
                    <th class="py-4 px-6 font-bold">{{ __('massage.ta.project_details') }} </th>
                    <th class="py-4 px-6 font-bold">{{ __('massage.ta.project_challenges') }}</th>
                    <th class="py-4 px-6 font-bold">{{ __('massage.ta.image') }}</th>
                      <th class="py-4 px-6 font-bold">{{ __('massage.ta.actions') }}</th>
                </tr>
            </thead>
            
            <tbody id="tbody" class="text-gray-700 text-sm font-light divide-y divide-gray-100">
                @foreach($projects as $item)
            <tr class="hover:bg-indigo-50/50 transition-colors">
                    <td class="py-4 px-6 text-center font-medium">   
                           <strong>AR:</strong> {{ $item->getTranslation('name', 'ar') }}<br>
            <strong>EN:</strong> {{ $item->getTranslation('name', 'en') }}
                         </td>
                      <td class="py-4 px-6 text-center font-medium">   
                        <strong>AR:</strong> {{ $item->getTranslation('description', 'ar') }}<br>
            <strong>EN:</strong> {{ $item->getTranslation('description', 'en') }}
                      </td>
                        <td class="py-4 px-6 text-center font-medium">   
                             <strong>AR:</strong> {{ $item->getTranslation('challange', 'ar') }}<br>
            <strong>EN:</strong> {{ $item->getTranslation('challange', 'en') }}
                             </td>
                
                  
                    
 <td class="py-4 px-6 text-center">
    @if($item->image)
        <img src="{{ url('/media/'.$item->image) }}" 
             class="w-12 h-12 rounded-full object-cover mx-auto">
    @endif
</td>
                    <td class="py-4 px-6 text-center">
                        <div class="flex item-center justify-center gap-2">
<a href="{{ route('projects.edit', $item->id) }}" 
   class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white transition-all flex items-center justify-center">
   ✎
</a>
<form action="{{ route('projects.destroy', $item->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
    @csrf
    @method('DELETE')
    <button type="submit" class="w-8 h-8 rounded-lg bg-rose-50 text-rose-600 hover:bg-rose-600 hover:text-white transition-all flex items-center justify-center">
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

        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.classList.remove('hidden');
            container.classList.add('hidden');
            removeBtn.classList.remove('hidden');
        }

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

