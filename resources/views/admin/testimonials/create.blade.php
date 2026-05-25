@extends('admin.layouts.app')

@section('title', __('massage.form_add_testimonial') ?? 'Add Testimonial')
@section('header', __('massage.form_add_testimonial') ?? 'Add Testimonial')

@section('content')
<div class="bg-white p-6 md:p-8 rounded-xl shadow-sm border border-gray-200 focus-within:ring-2 focus-within:ring-blue-100 transition-all max-w-5xl mx-auto">
    <div class="flex items-center justify-between mb-6 pb-4 border-b border-gray-100">
        <h3 class="text-xl font-bold text-gray-800">{{ __('massage.form_testimonial_details') }}</h3>
        <a href="{{ route('admin.testimonials.index') }}" class="text-gray-500 hover:text-blue-600 transition-colors flex items-center gap-1">
            <i class="fas {{ app()->getLocale() == 'ar' ? 'fa-arrow-right' : 'fa-arrow-left' }}"></i> <span>{{ __('massage.form_back_to_list') }}</span>
        </a>
    </div>

    <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-6">
                <!-- Name -->
                <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                    <h4 class="font-semibold text-gray-700 mb-4 border-b pb-2"><i class="fas fa-user rtl:ml-2 ltr:mr-2"></i> {{ __('massage.dt_author_name') }}</h4>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold mb-1 text-gray-600">{{ __('massage.form_name_ar') }} <span class="text-red-500">*</span></label>
                            <input type="text" name="name[ar]" required class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="rtl">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold mb-1 text-gray-600">{{ __('massage.form_name_en') }} <span class="text-red-500">*</span></label>
                            <input type="text" name="name[en]" required class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="ltr">
                        </div>
                    </div>
                </div>

                <!-- Comment -->
                <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                    <h4 class="font-semibold text-gray-700 mb-4 border-b pb-2"><i class="fas fa-comment-dots rtl:ml-2 ltr:mr-2"></i> {{ __('massage.dt_comment') }}</h4>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold mb-1 text-gray-600">{{ __('massage.form_comment_ar') }} <span class="text-red-500">*</span></label>
                            <textarea name="comment[ar]" required rows="4" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="rtl"></textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold mb-1 text-gray-600">{{ __('massage.form_comment_en') }} <span class="text-red-500">*</span></label>
                            <textarea name="comment[en]" required rows="4" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="ltr"></textarea>
                        </div>
                    </div>
                </div>
                <!-- Video Link -->
                <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                    <h4 class="font-semibold text-gray-700 mb-4 border-b pb-2"><i class="fas fa-video rtl:ml-2 ltr:mr-2"></i> {{ __('massage.form_video_link') }}</h4>
                    <div>
                        <input type="url" name="video_link" placeholder="https://youtube.com/..." class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="ltr">
                    </div>
                </div>
            </div>

            <div class="lg:col-span-1">
                <div class="sticky top-6">
                    <!-- Photo -->
                    <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                        <h4 class="font-semibold text-gray-700 mb-4 border-b pb-2"><i class="fas fa-camera rtl:ml-2 ltr:mr-2"></i> {{ __('massage.form_author_photo') }}</h4>
                        
                        <div class="h-64 border-2 border-dashed border-blue-300 rounded-xl flex flex-col justify-center items-center bg-white hover:bg-blue-50 transition cursor-pointer group relative overflow-hidden">
                            <input type="file" name="image" id="testimonial_image" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer z-10 w-full h-full" onchange="handleImageUpload(event, 'preview_testimonial_image', 'placeholder_testimonial_image', 'remove_testimonial_image', 'hidden_testimonial_image')">
                            
                            <div id="placeholder_testimonial_image" class="w-full h-full flex flex-col items-center justify-center p-4 text-center">
                                <div class="w-16 h-16 bg-blue-100 text-blue-500 rounded-full flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                                    <i class="fas fa-user-plus text-2xl"></i>
                                </div>
                                <span class="text-sm font-semibold text-gray-700 group-hover:text-blue-600">{{ __('massage.form_upload_photo') }}</span>
                            </div>
                            
                            <img id="preview_testimonial_image" class="absolute inset-0 w-full h-full object-cover hidden" />
                            
                            <button id="remove_testimonial_image" type="button" onclick="resetImageUpload('testimonial_image', 'preview_testimonial_image', 'placeholder_testimonial_image', 'remove_testimonial_image', 'hidden_testimonial_image')" class="absolute top-2 right-2 bg-red-500 text-white w-8 h-8 rounded-full flex items-center justify-center hover:bg-red-600 hidden z-20 shadow-md transition-colors" title="Remove Photo">
                                <i class="fas fa-times"></i>
                            </button>

                            <input type="hidden" name="cropped_image" id="hidden_testimonial_image">
                        </div>
                    </div>

                    <div class="mt-8">
                        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3.5 px-6 rounded-xl shadow-md hover:shadow-lg transition flex justify-center items-center gap-2">
                            <i class="fas fa-save"></i>
                            <span>{{ __('massage.form_save_testimonial') }}</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
@push('scripts')
@endpush
