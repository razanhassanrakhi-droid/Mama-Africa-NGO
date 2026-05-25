@extends('layouts.admin')

@section('title','تعديل المشروع')

@section('content')

<main class="container mx-auto px-4 pb-10 flex-grow">

    <div class="bg-white p-6 rounded-2xl shadow-xl border border-gray-100 w-full max-w-6xl mx-auto">

        <h2 class="text-2xl font-bold mb-6 text-center">   {{ __('massage.project_management') }}</h2>

        <form action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">

                <!-- Form Inputs (Right Side) -->
                <div class="lg:col-span-3 space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        <!-- عنوان المشروع -->
                        <div class="col-span-2">
                          <label class="block text-sm font-semibold mb-1 text-gray-600">    {{ __('massage.project_name_ar') }}</label>
                            <input type="text" name="name[ar]" 
                                value="{{ old('name.ar', $project->getTranslation('name', 'ar')) }}"
                                class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">

                            <label class="block text-sm font-semibold mb-1 text-gray-600 mt-2"> {{ __('massage.project_name_en') }}</label>
                            <input type="text" name="name[en]" 
                                value="{{ old('name.en', $project->getTranslation('name', 'en')) }}"
                                class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                           <!-- حقل التحدي (challenge) -->
      
<div class="col-span-2">

    <!-- حقل التحدي -->
    <div class="mb-4">
        <label class="block text-sm font-semibold mb-1 text-gray-600">   {{ __('massage.challange_ar') }}</label>
                            <textarea name="challange[ar]" rows="4"
                                class="w-full p-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500">{{ old('challange.ar', $project->getTranslation('challange', 'ar')) }}</textarea>

                            <label class="block text-sm font-semibold mb-1 text-gray-600 mt-2">C  {{ __('massage.challange_en') }}</label>
                            <textarea name="challange[en]" rows="4"
                                class="w-full p-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500">{{ old('challange.en', $project->getTranslation('challange', 'en')) }}</textarea>
                        </div>


    <!-- حقل الوصف -->
    <div>
        <label class="block text-sm font-semibold mb-1 text-gray-600">       {{ __('massage.description_ar') }}</label>
                            <textarea name="description[ar]" rows="6"
                                class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description.ar', $project->getTranslation('description', 'ar')) }}</textarea>

                            <label class="block text-sm font-semibold mb-1 text-gray-600 mt-2">               {{ __('massage.description_en') }}
</label>
                            <textarea name="description[en]" rows="6"
                                class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description.en', $project->getTranslation('description', 'en')) }}</textarea>
                        </div>
</div>

                       
                       
                        
                <!-- رفع الصورة (Left Side) -->
                <div class="lg:col-span-1">
                    <label class="block text-sm font-semibold mb-2 text-gray-600 text-center">{{ __('massage.image') }} </label>
                    <div class="h-full min-h-[200px] border-2 border-dashed border-gray-300 rounded-xl flex flex-col justify-center items-center bg-gray-50 hover:bg-gray-100 transition cursor-pointer group relative overflow-hidden">
                        <input type="file" name="image" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer z-10" onchange="previewImage(event)">
                        
                        <div id="imagePreviewContainer" class="w-full h-full flex flex-col items-center justify-center p-2">
                            @if($project->image)
                                <img src="{{ url('/media/' . $project->image) }}" class="w-full h-full object-cover rounded-xl">
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-16 w-16 text-gray-400 group-hover:text-blue-500 transition mb-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span class="text-sm text-gray-500 font-medium group-hover:text-blue-600 text-center">{{ __('massage.image_upload') }}</span>
                            @endif
                        </div>

                    </div>
                </div>

            </div>
<br>
            <!-- زر الحفظ -->
            <div class="flex justify-center mt-6">
                <button type="submit" class="bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white font-bold py-3 px-10 rounded-xl shadow-lg transition-all active:scale-95">
                  {{ __('massage.update') }}
                </button>
            </div>

        </form>

    </div>

</main>

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
</script>
@endpush


