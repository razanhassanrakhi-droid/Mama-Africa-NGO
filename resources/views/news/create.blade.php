@extends('layouts.admin')

@section('title','إدارة المشاريع')

@section('content')

<!-- Main Content -->
    <main class="container mx-auto px-4 pb-10 flex-grow">
@if ($errors->any())
<div class="bg-red-100 text-red-800 p-4 rounded">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
        <!-- Input Section -->
<form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="glass-effect rounded-xl shadow-md p-6 mb-8 grid grid-cols-1 lg:grid-cols-4 gap-6">

        <!-- Form Inputs (Right Side) -->
        <div class="lg:col-span-3 space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 flex justify-center">
                <div class="col-span-2">
                    <label class="block text-2xl font-font-bold mb-1 text-black text-center">
                        {{ __('massage.news') }}
                    </label>

                    <!-- عنوان المشروع -->
<!-- عنوان المشروع باللغتين -->
<div class="mb-4">
    <label class="block text-sm font-semibold mb-1 text-gray-600"> {{ __('massage.project_name_ar') }}</label>
    <input type="text" name="title[ar]" placeholder=" {{ __('massage.project_name_ar') }}"
           class="w-3/4 p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all">
</div>

<div class="mb-4">
    <label class="block text-sm font-semibold mb-1 text-gray-600"> {{ __('massage.project_name_en') }}</label>
    <input type="text" name="title[en]" placeholder=" {{ __('massage.project_name_en') }}"
           class="w-3/4 p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all">
</div>

<!-- تفاصيل المشروع باللغتين -->
<div class="mb-4">
    <label class="block text-sm font-semibold mb-1 text-gray-600">{{ __('massage.project_details_ar') }}  </label>
    <textarea name="details[ar]" class="w-3/4 h-40 p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 transition-all"></textarea>
</div>

<div class="mb-4">
    <label class="block text-sm font-semibold mb-1 text-gray-600"> {{ __('massage.project_details_en') }}</label>
    <textarea name="details[en]" class="w-3/4 h-40 p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 transition-all"></textarea>
</div>
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


                    <!-- تصنيف المشروع -->
                    <label class="block text-gray-700 font-bold mb-3 text-lg">  {{ __('massage.project_category') }} </label>
                    <select name="project_id" id="programType">
                        <div class="flex-1">
       
@foreach ($projects as $project)
    <option value="{{ $project->id }}">{{ $project->name }}</option>
@endforeach
</select>


                </div>
            </div>
        </div>

        <!-- رفع الصورة (Left Side) -->
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
                    <span class="text-sm text-gray-500 font-medium group-hover:text-blue-600">{{ __('massage.image_upload') }}</span>
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


 <!-- Form Inputs (Right Side) -->
        <div class="lg:col-span-3 space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 flex justify-center">
                <div class="col-span-2">
                    

                    <!-- عنوان المشروع -->
                    <label class="block text-sm font-semibold mb-1 text-gray-600">  {{ __('massage.project_cost') }} </label>
<input name="pay" type="number" placeholder="0" 
       class="w-full p-2 text-center rounded-lg border border-gray-300 focus:ring-2 focus:ring-pink-500 focus:border-pink-500 outline-none transition-all shadow-sm" >                    <div class="flex items-center justify-between bg-blue-50 p-3 rounded-lg border border-blue-100 mt-2">
                    <span class="font-bold text-blue-800" data-i18n="totalproject">{{ __('massage.total_projects') }} </span>
                    <span id="total" class="bg-red-500 text-white px-4 py-1 rounded font-bold text-lg">{{ $totalProjects }}</span>
                </div>


                </div>
            </div>
        </div>

        <br>
       <div class="flex-1">
        <label class="block text-sm font-semibold mb-1 text-gray-600" >   {{ __('massage.youtube_link') }} </label>
        <input input type="url" name="youtube_link" placeholder="أدخل  اللينك"  class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
    </div>
<br>

        <!-- زر الحفظ -->
        <div class="max-w-5xl mx-auto p-4" dir="rtl">
            <div class="flex justify-center mb-6">
                <button type="submit"
                    class="bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white font-bold py-3 px-10 rounded-xl shadow-lg shadow-purple-200 transition-all active:scale-95 flex items-center justify-center gap-2">
{{ __('massage.add') }}       
         </button>
            </div>
        </div>
    </div>
</form>

{{-- صندوق البحث --}}
<div class="bg-white p-10 rounded-3xl shadow-2xl border border-gray-100 flex flex-col items-center w-full mb-10">
    <div class="flex flex-col md:flex-row items-center justify-center gap-6 w-full max-w-4xl">
        <div class="relative w-full group">
            <div class="absolute inset-y-0 right-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-sky-500 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>

            <input 
                onkeyup="searchData(this.value)" 
                id="search" 
                type="text" 
                placeholder="{{ __('massage.search_placeholder') }}"
                class="w-full text-xl p-6 pr-14 bg-gray-50 rounded-2xl border-2 border-transparent 
                       focus:border-sky-400 focus:bg-white focus:ring-8 focus:ring-sky-50/50 
                       outline-none transition-all text-gray-800 shadow-md placeholder:text-gray-400">
        </div>
    </div>
</div>

{{-- جدول البيانات --}}
<div class="bg-white rounded-2xl shadow-2xl overflow-hidden border border-gray-100 w-full max-w-6xl mx-auto">
    <div class="overflow-x-auto shadow-inner">
        <table class="w-full text-center border-collapse" id="productTable">
            
            <thead class="bg-gradient-to-l from-gray-50 to-gray-100">
                <tr class="text-indigo-900 uppercase text-sm leading-normal">
                    <th class="py-4 px-6 font-bold">{{ __('massage.tab.project') }}</th>
                    <th class="py-4 px-6 font-bold">{{ __('massage.tab.type') }}</th>
                    <th class="py-4 px-6 font-bold">{{ __('massage.tab.cost') }}</th>
                    <th class="py-4 px-6 font-bold">{{ __('massage.tab.image') }}</th>
                     <th class="py-4 px-6 font-bold">{{ __('massage.tab.details') }}</th>
                  <th class="py-4 px-6 font-bold">{{ __('massage.tab.challenges') }}</th>

                     <th class="py-4 px-6 font-bold">{{ __('massage.tab.link') }}</th>
                    <th class="py-4 px-6 font-bold">{{ __('massage.tab.actions') }}</th>
                   
                </tr>
            </thead>
            
            <tbody class="text-gray-700 text-sm font-light divide-y divide-gray-100">
               
@foreach($news as $item)
<tr class="hover:bg-indigo-50/50 transition-colors">
    
     {{-- العنوان باللغتين --}}
    <td class="py-4 px-6 font-medium">
        <div><strong>AR:</strong> {{ $item->getTranslation('title','ar') }}</div>
        <div><strong>EN:</strong> {{ $item->getTranslation('title','en') }}</div>
    </td>


    <td class="py-4 px-6">
        {{ $item->project->name ?? 'بدون مشروع' }}
    </td>

    <td class="py-4 px-6">
        <span class="py-1 px-3 rounded-full text-xs font-bold">
            {{ $item->pay }}
        </span>
    </td>
      <td class="py-4 px-6 text-center">
    @if($item->image)
        <img src="{{ url('/media/'.$item->image) }}" 
             class="w-12 h-12 rounded-full object-cover mx-auto">
    @endif
</td>

    {{-- التفاصيل باللغتين --}}
    <td class="py-4 px-6 text-left">
        <div><strong>AR:</strong> {{ $item->getTranslation('details','ar') }}</div>
        <div><strong>EN:</strong> {{ $item->getTranslation('details','en') }}</div>
    </td>
                      <td class="py-4 px-6 text-center font-medium">   
                             <strong>AR:</strong> {{ $item->getTranslation('challange', 'ar') }}<br>
            <strong>EN:</strong> {{ $item->getTranslation('challange', 'en') }}
                             </td>
         
<td class="py-4 px-6 font-medium">
        {{ $item->youtube_link }}
    </td>
    
    
    <td class="py-4 px-6">
        <div class="flex items-center justify-center gap-2">
<a href="{{ route('news.edit', $item->id) }}" 
   class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white transition-all flex items-center justify-center">
   ✎
</a>
<form action="{{ route('news.destroy', $item->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
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
</div>
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
@endpush


