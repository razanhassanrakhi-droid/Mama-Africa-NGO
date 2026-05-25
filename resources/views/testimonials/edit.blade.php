@extends('layouts.admin')

@section('title','تعديل المشروع')

@section('content')

<main class="container mx-auto px-4 pb-10 flex-grow">

    <div class="bg-white p-6 rounded-2xl shadow-xl border border-gray-100 w-full max-w-6xl mx-auto">

        <h2 class="text-2xl font-bold mb-6 text-center">تأثير المساعدات</h2>

        {{-- رسائل الأخطاء --}}
        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
                <ul class="list-disc ms-6">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">

                {{-- Inputs --}}
                <div class="lg:col-span-3 space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        <div class="col-span-2">
                             <label class="block text-sm font-semibold mb-1 text-gray-600">{{ __('massage.name_ar') }}</label>
        <input type="text" name="name[ar]"
               value="{{ old('name.ar', $testimonial->getTranslation('name', 'ar')) }}"
               class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">

        <label class="block text-sm font-semibold mb-1 text-gray-600 mt-2">{{ __('massage.name_en') }}</label>
        <input type="text" name="name[en]"
               value="{{ old('name.en', $testimonial->getTranslation('name', 'en')) }}"
               class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
    </div>

                        <div class="col-span-2">
                          <label class="block text-sm font-semibold mb-1 text-gray-600">{{ __('massage.comment_ar') }}</label>
        <input type="text" name="comment[ar]"
               value="{{ old('comment.ar', $testimonial->getTranslation('comment', 'ar')) }}"
               class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">

        <label class="block text-sm font-semibold mb-1 text-gray-600 mt-2">{{ __('massage.comment_en') }}</label>
        <input type="text" name="comment[en]"
               value="{{ old('comment.en', $testimonial->getTranslation('comment', 'en')) }}"
               class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
    </div>

                    </div>
                </div>

                {{-- Image --}}
                <div class="lg:col-span-1">
                    <label class="block text-sm font-semibold mb-2 text-gray-600 text-center">{{ __('massage.image') }}</label>

                    <div class="h-full min-h-[200px] border-2 border-dashed border-gray-300 rounded-xl
                                flex justify-center items-center bg-gray-50 hover:bg-gray-100 transition
                                cursor-pointer group relative overflow-hidden">

                        <input type="file" name="image" accept="image/*"
                               class="absolute inset-0 opacity-0 cursor-pointer z-10"
                               onchange="previewImage(event)">

                        {{-- Preview Container --}}
                        <div id="imagePreviewContainer" class="w-full h-full flex items-center justify-center p-2">
                            @if($testimonial->image)
                                <img src="{{ url('/media/' . $testimonial->image) }}"
                                     class="w-full h-full object-cover rounded-xl"
                                     alt="current">
                            @else
                                <div class="flex flex-col items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="h-16 w-16 text-gray-400 group-hover:text-blue-500 transition mb-2"
                                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                              d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <span class="text-sm text-gray-500 font-medium group-hover:text-blue-600 text-center">
                                 {{ __('massage.upload_image') }}
                                    </span>
                                </div>
                            @endif
                        </div>

                        {{-- زر حذف المعاينة (اختياري) --}}
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
                <div class="lg:col-span-4 flex justify-center mt-2">
                    <button type="submit"
                            class="bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700
                                   text-white font-bold py-3 px-10 rounded-xl shadow-lg transition-all active:scale-95">
                       {{ __('massage.update') }}
                    </button>
                </div>

            </div>
        </form>

    </div>

</main>
@endsection


@push('scripts')
<script>
function previewImage(event) {
    const input = event.target;
    const previewContainer = document.getElementById('imagePreviewContainer');
    const removeBtn = document.getElementById('removeImageBtn');

    previewContainer.innerHTML = '';

    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const img = document.createElement('img');
            img.src = e.target.result;
            img.className = 'w-full h-full object-cover rounded-xl';
            previewContainer.appendChild(img);

            if(removeBtn) removeBtn.classList.remove('hidden');
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function removeImage(event) {
    event.preventDefault();

    const input = document.querySelector('input[name="image"]');
    const previewContainer = document.getElementById('imagePreviewContainer');
    const removeBtn = document.getElementById('removeImageBtn');

    input.value = "";
    previewContainer.innerHTML = `
        @if($testimonial->image)
            <img src="{{ url('/media/' . $testimonial->image) }}" class="w-full h-full object-cover rounded-xl" alt="current">
        @else
            <div class="flex flex-col items-center justify-center">
                <span class="text-sm text-gray-500">اضغط لرفع صورة جديدة</span>
            </div>
        @endif
    `;

    if(removeBtn) removeBtn.classList.add('hidden');
}
</script>
@endpush


