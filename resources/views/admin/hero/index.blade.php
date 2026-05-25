@extends('admin.layouts.app')

@section('title', __('massage.hero_section') ?? 'Hero Section')
@section('header', __('massage.hero_section') ?? 'Hero Section')

@section('content')
<div class="bg-white p-6 md:p-8 rounded-xl shadow-sm border border-gray-200 focus-within:ring-2 focus-within:ring-blue-100 transition-all max-w-5xl mx-auto">
    <div class="flex items-center justify-between mb-6 pb-4 border-b border-gray-100">
        <h3 class="text-xl font-bold text-gray-800">{{ __('massage.hero_section') ?? 'Edit Hero Section' }}</h3>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <form action="{{ route('admin.hero.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-6">
                <!-- Hero Title -->
                <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                    <h4 class="font-semibold text-gray-700 mb-4 border-b pb-2"><i class="fas fa-heading rtl:ml-2 ltr:mr-2"></i> Title</h4>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold mb-1 text-gray-600">Title (Arabic) <span class="text-red-500">*</span></label>
                            <input type="text" name="title_ar" required value="{{ old('title_ar', $hero->title_ar ?? __('massage.hero_title', [], 'ar')) }}" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="rtl">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold mb-1 text-gray-600">Title (English) <span class="text-red-500">*</span></label>
                            <input type="text" name="title_en" required value="{{ old('title_en', $hero->title_en ?? __('massage.hero_title', [], 'en')) }}" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="ltr">
                        </div>
                    </div>
                </div>

                <!-- Hero Description -->
                <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                    <h4 class="font-semibold text-gray-700 mb-4 border-b pb-2"><i class="fas fa-align-left rtl:ml-2 ltr:mr-2"></i> Description</h4>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold mb-1 text-gray-600">Description (Arabic) <span class="text-red-500">*</span></label>
                            <textarea name="description_ar" required rows="3" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="rtl">{{ old('description_ar', $hero->description_ar ?? __('massage.hero_desc', [], 'ar')) }}</textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold mb-1 text-gray-600">Description (English) <span class="text-red-500">*</span></label>
                            <textarea name="description_en" required rows="3" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="ltr">{{ old('description_en', $hero->description_en ?? __('massage.hero_desc', [], 'en')) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Image Upload Sidebar -->
            <div class="lg:col-span-1 space-y-6">
                <!-- Branding Section (Logo) -->
                <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                    <h4 class="font-semibold text-gray-700 mb-4 border-b pb-2"><i class="fas fa-gem rtl:ml-2 ltr:mr-2"></i> Branding & Logo</h4>
                    
                    <!-- Org Name -->
                    <div class="space-y-4 mb-6">
                        <div>
                            <label class="block text-sm font-semibold mb-1 text-gray-600">Organization Name (AR)</label>
                            <input type="text" name="org_name_ar" value="{{ old('org_name_ar', $hero->org_name_ar ?? 'ماما أفريكا') }}" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="rtl">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold mb-1 text-gray-600">Organization Name (EN)</label>
                            <input type="text" name="org_name_en" value="{{ old('org_name_en', $hero->org_name_en ?? 'Mama Africa') }}" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="ltr">
                        </div>
                    </div>

                    <!-- Tagline -->
                    <div class="space-y-4 mb-6">
                        <div>
                            <label class="block text-sm font-semibold mb-1 text-gray-600">Tagline (AR)</label>
                            <input type="text" name="tagline_ar" value="{{ old('tagline_ar', $hero->tagline_ar ?? 'تمكين المجتمعات في جميع أنحاء أفريقيا') }}" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="rtl">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold mb-1 text-gray-600">Tagline (EN)</label>
                            <input type="text" name="tagline_en" value="{{ old('tagline_en', $hero->tagline_en ?? 'Empowering Communities Across Africa') }}" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="ltr">
                        </div>
                    </div>

                    <!-- Logo Upload -->
                    <div>
                        <label class="block text-sm font-semibold mb-2 text-gray-600">Organization Logo</label>
                        <div class="h-32 border-2 border-dashed border-blue-300 rounded-xl flex flex-col justify-center items-center bg-white hover:bg-blue-50 transition cursor-pointer group relative overflow-hidden">
                            <input type="file" name="logo" id="hero_logo" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer z-10 w-full h-full" onchange="handleImageUpload(event, 'logoPreview', 'logoPlaceholder', 'removeLogoBtn', 'hidden_hero_logo')">
                            <input type="hidden" name="reset_logo" id="resetLogoInput" value="0">
                            
                            @php
                                $hasCustomLogo = isset($hero->logo) && $hero->logo;
                                $displayLogo = $hasCustomLogo ? url('/media/'.$hero->logo) : asset('images/favicon-org.png');
                            @endphp
                            
                            <div id="logoPlaceholder" class="w-full h-full flex flex-col items-center justify-center p-4 text-center {{ $hasCustomLogo ? 'hidden' : '' }}">
                                <div class="w-10 h-10 bg-blue-100 text-blue-500 rounded-full flex items-center justify-center mb-2 group-hover:scale-110 transition-transform">
                                    <i class="fas fa-cloud-upload-alt text-lg"></i>
                                </div>
                                <span class="text-xs font-semibold text-gray-700 group-hover:text-blue-600">{{ __('massage.form_change_image') }}</span>
                            </div>
                            
                            <img id="logoPreview" src="{{ $displayLogo }}" class="absolute inset-4 max-w-full max-h-full object-contain m-auto" />
                            
                            <button id="removeLogoBtn" type="button" onclick="heroResetLogo(event)" class="absolute top-2 right-2 bg-red-500 text-white w-6 h-6 rounded-full flex items-center justify-center hover:bg-red-600 {{ $hasCustomLogo ? '' : 'hidden' }} z-20 shadow-md transition-colors" title="استعادة الشعار الافتراضي">
                                <i class="fas fa-times text-xs"></i>
                            </button>

                            <input type="hidden" name="cropped_logo" id="hidden_hero_logo">
                        </div>
                    </div>
                </div>

                <div class="sticky top-6">
                    <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                        <h4 class="font-semibold text-gray-700 mb-4 border-b pb-2"><i class="fas fa-image rtl:ml-2 ltr:mr-2"></i> Background Image</h4>
                        
                        <div class="h-64 border-2 border-dashed border-blue-300 rounded-xl flex flex-col justify-center items-center bg-white hover:bg-blue-50 transition cursor-pointer group relative overflow-hidden">
                            <input type="file" name="image" id="hero_image" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer z-10 w-full h-full" onchange="handleImageUpload(event, 'imagePreview', 'imagePlaceholder', 'removeImageBtn', 'hidden_hero_image')">
                            <input type="hidden" name="reset_image" id="resetImageInput" value="0">
                            
                            @php
                                $hasCustomImage = isset($hero->image) && $hero->image;
                                $displayImage = $hasCustomImage ? url('/media/'.$hero->image) : asset('images/ray.png');
                            @endphp
                            
                            <div id="imagePlaceholder" class="w-full h-full flex flex-col items-center justify-center p-4 text-center {{ $hasCustomImage ? 'hidden' : '' }}">
                                <div class="w-16 h-16 bg-blue-100 text-blue-500 rounded-full flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                                    <i class="fas fa-cloud-upload-alt text-2xl"></i>
                                </div>
                                <span class="text-sm font-semibold text-gray-700 group-hover:text-blue-600">{{ __('massage.form_change_image') }}</span>
                            </div>
                            
                            <img id="imagePreview" src="{{ $displayImage }}" class="absolute inset-0 w-full h-full object-cover" />
                            
                            <button id="removeImageBtn" type="button" onclick="heroResetImage(event)" class="absolute top-2 right-2 bg-red-500 text-white w-8 h-8 rounded-full flex items-center justify-center hover:bg-red-600 {{ $hasCustomImage ? '' : 'hidden' }} z-20 shadow-md transition-colors" title="استعادة الصورة الافتراضية">
                                <i class="fas fa-times"></i>
                            </button>

                            <input type="hidden" name="cropped_image" id="hidden_hero_image">
                        </div>
                        @if($hasCustomImage)
                        <p class="text-xs text-gray-500 mt-2 text-center">اضغط × لاستعادة الصورة الافتراضية</p>
                        @endif
                    </div>

                    <div class="mt-8">
                        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3.5 px-6 rounded-xl shadow-md hover:shadow-lg transition flex justify-center items-center gap-2">
                            <i class="fas fa-save"></i>
                            <span>Save Hero Section</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
function heroResetLogo(event) {
    resetImageUpload('hero_logo', 'logoPreview', 'logoPlaceholder', 'removeLogoBtn', 'hidden_hero_logo');
    document.getElementById('logoPreview').src = '{{ asset('images/favicon-org.png') }}';
    document.getElementById('resetLogoInput').value = '1';
}

function heroResetImage(event) {
    resetImageUpload('hero_image', 'imagePreview', 'imagePlaceholder', 'removeImageBtn', 'hidden_hero_image');
    document.getElementById('imagePreview').src = '{{ asset('images/ray.png') }}';
    document.getElementById('resetImageInput').value = '1';
}
</script>
@endpush


