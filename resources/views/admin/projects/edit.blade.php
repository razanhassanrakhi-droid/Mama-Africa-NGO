@extends('admin.layouts.app')

@section('title', __('massage.project_management') ?? 'Edit Project')
@section('header', __('massage.project_management') ?? 'Edit Project')

@section('content')
<div class="bg-white p-6 md:p-8 rounded-xl shadow-sm border border-gray-200 focus-within:ring-2 focus-within:ring-blue-100 transition-all max-w-7xl mx-auto">
    <div class="flex items-center justify-between mb-6 pb-4 border-b border-gray-100">
        <h3 class="text-xl font-bold text-gray-800">{{ __('massage.form_edit_project') }}</h3>
        <a href="{{ route('admin.projects.index') }}" class="text-gray-500 hover:text-blue-600 transition-colors flex items-center gap-1">
            <i class="fas {{ app()->getLocale() == 'ar' ? 'fa-arrow-right' : 'fa-arrow-left' }}"></i> <span>{{ __('massage.form_back_to_list') }}</span>
        </a>
    </div>

    <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Form Inputs (Takes 2 columns on large screens) -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Project Name -->
                <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                    <h4 class="font-semibold text-gray-700 mb-4 border-b pb-2"><i class="fas fa-font rtl:ml-2 ltr:mr-2"></i> {{ __('massage.dt_project_name') }}</h4>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold mb-1 text-gray-600">{{ __('massage.form_name_ar') }} <span class="text-red-500">*</span></label>
                            <input type="text" name="name[ar]" required value="{{ old('name.ar', $project->getTranslation('name', 'ar')) }}" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="rtl">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold mb-1 text-gray-600">{{ __('massage.form_name_en') }} <span class="text-red-500">*</span></label>
                            <input type="text" name="name[en]" required value="{{ old('name.en', $project->getTranslation('name', 'en')) }}" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="ltr">
                        </div>
                    </div>
                </div>

                <!-- Project Challenge -->
                <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                    <h4 class="font-semibold text-gray-700 mb-4 border-b pb-2"><i class="fas fa-bullseye rtl:ml-2 ltr:mr-2"></i> {{ __('massage.dt_challenge') }}</h4>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold mb-1 text-gray-600">{{ __('massage.form_challenge_ar') }} <span class="text-red-500">*</span></label>
                            <textarea name="challange[ar]" required rows="3" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="rtl">{{ old('challange.ar', $project->getTranslation('challange', 'ar')) }}</textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold mb-1 text-gray-600">{{ __('massage.form_challenge_en') }} <span class="text-red-500">*</span></label>
                            <textarea name="challange[en]" required rows="3" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="ltr">{{ old('challange.en', $project->getTranslation('challange', 'en')) }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Project Description -->
                <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                    <h4 class="font-semibold text-gray-700 mb-4 border-b pb-2"><i class="fas fa-align-left rtl:ml-2 ltr:mr-2"></i> {{ __('massage.dt_description') }}</h4>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold mb-1 text-gray-600">{{ __('massage.form_description_ar') }} <span class="text-red-500">*</span></label>
                            <textarea name="description[ar]" required rows="5" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="rtl">{{ old('description.ar', $project->getTranslation('description', 'ar')) }}</textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold mb-1 text-gray-600">{{ __('massage.form_description_en') }} <span class="text-red-500">*</span></label>
                            <textarea name="description[en]" required rows="5" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="ltr">{{ old('description.en', $project->getTranslation('description', 'en')) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Image Upload Sidebar (Takes 1 column) -->
            <div class="lg:col-span-1">
                <div class="sticky top-6">
                    <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                        <h4 class="font-semibold text-gray-700 mb-4 border-b pb-2"><i class="fas fa-image rtl:ml-2 ltr:mr-2"></i> {{ __('massage.form_project_image') }}</h4>
                        
                        <div class="h-64 border-2 border-dashed border-blue-300 rounded-xl flex flex-col justify-center items-center bg-white hover:bg-blue-50 transition cursor-pointer group relative overflow-hidden">
                            <input type="file" name="image" id="project_image" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer z-10 w-full h-full" onchange="handleImageUpload(event, 'preview_project_image', 'placeholder_project_image', 'remove_project_image', 'hidden_project_image')">
                            
                            <div id="placeholder_project_image" class="w-full h-full flex flex-col items-center justify-center p-4 text-center {{ $project->image ? 'hidden' : '' }}">
                                <div class="w-16 h-16 bg-blue-100 text-blue-500 rounded-full flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                                    <i class="fas fa-cloud-upload-alt text-2xl"></i>
                                </div>
                                <span class="text-sm font-semibold text-gray-700 group-hover:text-blue-600">{{ __('massage.form_change_image') }}</span>
                            </div>
                            
                            <img id="preview_project_image" src="{{ $project->image ? url('/media/'.$project->image) : '' }}" class="absolute inset-0 w-full h-full object-cover {{ $project->image ? '' : 'hidden' }}" />
                            
                            <button id="remove_project_image" type="button" onclick="resetImageUpload('project_image', 'preview_project_image', 'placeholder_project_image', 'remove_project_image', 'hidden_project_image')" class="absolute top-2 right-2 bg-red-500 text-white w-8 h-8 rounded-full flex items-center justify-center hover:bg-red-600 {{ $project->image ? '' : 'hidden' }} z-20 shadow-md transition-colors" title="Remove Image">
                                <i class="fas fa-times"></i>
                            </button>

                            <input type="hidden" name="cropped_image" id="hidden_project_image">
                        </div>
                    </div>

                    <div class="bg-gray-50 p-4 rounded-lg border border-gray-100 mt-6">
                        <h4 class="font-semibold text-gray-700 mb-4 border-b pb-2"><i class="fas fa-icons rtl:ml-2 ltr:mr-2"></i> {{ app()->getLocale() == 'ar' ? 'أيقونة المشروع' : 'Project Icon' }}</h4>
                        <div>
                            <label class="block text-sm font-semibold mb-1 text-gray-600">{{ app()->getLocale() == 'ar' ? 'فئة الأيقونة (FontAwesome)' : 'Icon Class (FontAwesome)' }}</label>
                            <input type="text" name="icon" placeholder="e.g. fas fa-tint" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" value="{{ old('icon', $project->icon) }}">
                            <p class="text-xs text-gray-500 mt-1">
                                {{ app()->getLocale() == 'ar' ? 'مثال: fas fa-tint للمياه، fas fa-dove للسلام، fas fa-shield-alt للحماية' : 'Example: fas fa-tint for WASH, fas fa-dove for Peace, fas fa-shield-alt for Protection' }}
                            </p>
                        </div>
                    </div>

                    <div class="mt-8">
                        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3.5 px-6 rounded-xl shadow-md hover:shadow-lg transition flex justify-center items-center gap-2">
                            <i class="fas fa-save"></i>
                            <span>{{ __('massage.form_update_project') }}</span>
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


