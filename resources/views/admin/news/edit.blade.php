@extends('admin.layouts.app')

@section('title', 'Edit News')
@section('header', 'Edit News')

@section('content')
<div class="bg-white p-6 md:p-8 rounded-xl shadow-sm border border-gray-200 focus-within:ring-2 focus-within:ring-blue-100 transition-all max-w-5xl mx-auto">
    <div class="flex items-center justify-between mb-6 pb-4 border-b border-gray-100">
        <h3 class="text-xl font-bold text-gray-800">{{ __('massage.form_edit_news') }}</h3>
        <a href="{{ route('admin.news.index') }}" class="text-gray-500 hover:text-blue-600 transition-colors flex items-center gap-1">
            <i class="fas {{ app()->getLocale() == 'ar' ? 'fa-arrow-right' : 'fa-arrow-left' }}"></i> <span>{{ __('massage.form_back_to_list') }}</span>
        </a>
    </div>

    <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-6">
                <!-- Title -->
                <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                    <h4 class="font-semibold text-gray-700 mb-4 border-b pb-2"><i class="fas fa-heading rtl:ml-2 ltr:mr-2"></i> {{ __('massage.dt_title') }}</h4>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold mb-1 text-gray-600">{{ __('massage.form_title_ar') }} <span class="text-red-500">*</span></label>
                            <input type="text" name="title[ar]" required value="{{ old('title.ar', $news->getTranslation('title','ar')) }}" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="rtl">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold mb-1 text-gray-600">{{ __('massage.form_title_en') }} <span class="text-red-500">*</span></label>
                            <input type="text" name="title[en]" required value="{{ old('title.en', $news->getTranslation('title','en')) }}" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="ltr">
                        </div>
                    </div>
                </div>

                <!-- Content/Details -->
                <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                    <h4 class="font-semibold text-gray-700 mb-4 border-b pb-2"><i class="fas fa-align-justify rtl:ml-2 ltr:mr-2"></i> {{ __('massage.dt_details_link') }}</h4>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold mb-1 text-gray-600">{{ __('massage.form_details_ar') }} <span class="text-red-500">*</span></label>
                            <textarea name="details[ar]" required rows="4" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="rtl">{{ old('details.ar', $news->getTranslation('details','ar')) }}</textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold mb-1 text-gray-600">{{ __('massage.form_details_en') }} <span class="text-red-500">*</span></label>
                            <textarea name="details[en]" required rows="4" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="ltr">{{ old('details.en', $news->getTranslation('details','en')) }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Challenges -->
                <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                    <h4 class="font-semibold text-gray-700 mb-4 border-b pb-2"><i class="fas fa-bullseye rtl:ml-2 ltr:mr-2"></i> {{ __('massage.dt_challenge') }}</h4>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold mb-1 text-gray-600">{{ __('massage.form_challenge_ar') }} <span class="text-red-500">*</span></label>
                            <textarea name="challange[ar]" required rows="3" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="rtl">{{ old('challange.ar', $news->getTranslation('challange', 'ar')) }}</textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold mb-1 text-gray-600">{{ __('massage.form_challenge_en') }} <span class="text-red-500">*</span></label>
                            <textarea name="challange[en]" required rows="3" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="ltr">{{ old('challange.en', $news->getTranslation('challange', 'en')) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Meta Sidebar -->
            <div class="lg:col-span-1 border-gray-100">
                <div class="sticky top-6 space-y-6">
                    <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                        <h4 class="font-semibold text-gray-700 mb-4 border-b pb-2"><i class="fas fa-cog rtl:ml-2 ltr:mr-2"></i> {{ __('massage.dt_actions') ?? 'Settings' }}</h4>
                        
                        <!-- Project Linking -->
                        <div class="mb-4">
                            <label class="block text-sm font-semibold mb-1 text-gray-600">{{ __('massage.dt_project') }} <span class="text-red-500">*</span></label>
                            <select name="project_id" required class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                                <option value="">{{ __('massage.form_select_project') }}</option>
                                @foreach ($projects as $project)
                                    <option value="{{ $project->id }}" {{ $news->project_id == $project->id ? 'selected' : '' }}>{{ $project->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Cost/Pay -->
                        <div class="mb-4">
                            <label class="block text-sm font-semibold mb-1 text-gray-600">{{ __('massage.form_cost') }} <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 {{ app()->getLocale() == 'ar' ? 'right-0 pr-3' : 'left-0 pl-3' }} flex items-center pointer-events-none">
                                    <span class="text-gray-500">$</span>
                                </div>
                                <input type="number" name="pay" required min="0" step="0.01" value="{{ old('pay', $news->pay) }}" class="w-full {{ app()->getLocale() == 'ar' ? 'pr-8' : 'pl-8' }} p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                            </div>
                        </div>

                        <!-- Publication Date -->
                        <div class="mb-4">
                            <label class="block text-sm font-semibold mb-1 text-gray-600">
                                <i class="fas fa-calendar-alt text-blue-500 rtl:ml-1 ltr:mr-1"></i>
                                {{ app()->getLocale() == 'ar' ? 'تاريخ النشر' : 'Publication Date' }}
                            </label>
                            <input type="date" name="published_at" value="{{ old('published_at', $news->published_at ? $news->published_at->format('Y-m-d') : now()->toDateString()) }}" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="ltr">
                            <p class="text-xs text-gray-400 mt-1">
                                <i class="fas fa-info-circle"></i>
                                {{ app()->getLocale() == 'ar' ? 'يمكنك تعديل التاريخ لأرشفة الأخبار بتواريخها الصحيحة' : 'You can modify the date to archive news with correct dates' }}
                            </p>
                        </div>

                        <!-- YouTube Link -->
                        <div class="mb-4">
                            <label class="block text-sm font-semibold mb-1 text-gray-600">{{ __('massage.form_youtube_link') }}</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 {{ app()->getLocale() == 'ar' ? 'right-0 pr-3' : 'left-0 pl-3' }} flex items-center pointer-events-none">
                                    <i class="fab fa-youtube text-red-500"></i>
                                </div>
                                <input type="url" name="youtube_link" value="{{ old('youtube_link', $news->youtube_link) }}" placeholder="https://youtube.com/..." class="w-full {{ app()->getLocale() == 'ar' ? 'pr-10 text-left placeholder-right' : 'pl-10 text-left' }} p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="ltr">
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                        <h4 class="font-semibold text-gray-700 mb-4 border-b pb-2"><i class="fas fa-image rtl:ml-2 ltr:mr-2"></i> {{ __('massage.form_news_image') }}</h4>
                        
                        <div class="h-48 border-2 border-dashed border-blue-300 rounded-xl flex flex-col justify-center items-center bg-white hover:bg-blue-50 transition cursor-pointer group relative overflow-hidden">
                            <input type="file" name="image" id="news_image" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer z-10 w-full h-full" onchange="handleImageUpload(event, 'preview_news_image', 'placeholder_news_image', 'remove_news_image', 'hidden_news_image')">
                            
                            <div id="placeholder_news_image" class="w-full h-full flex flex-col items-center justify-center p-4 text-center {{ $news->image ? 'hidden' : '' }}">
                                <div class="w-12 h-12 bg-blue-100 text-blue-500 rounded-full flex items-center justify-center mb-2 group-hover:scale-110 transition-transform">
                                    <i class="fas fa-cloud-upload-alt text-xl"></i>
                                </div>
                                <span class="text-xs font-semibold text-gray-700 group-hover:text-blue-600">{{ __('massage.form_change_image') }}</span>
                            </div>
                            
                            <img id="preview_news_image" src="{{ $news->image ? url('/media/'.$news->image) : '' }}" class="absolute inset-0 w-full h-full object-cover {{ $news->image ? '' : 'hidden' }}" />
                            
                            <button id="remove_news_image" type="button" onclick="resetImageUpload('news_image', 'preview_news_image', 'placeholder_news_image', 'remove_news_image', 'hidden_news_image')" class="absolute top-2 right-2 bg-red-500 text-white w-6 h-6 rounded-full flex items-center justify-center hover:bg-red-600 {{ $news->image ? '' : 'hidden' }} z-20 shadow-md transition-colors" title="Remove Image">
                                <i class="fas fa-times text-xs"></i>
                            </button>

                            <input type="hidden" name="cropped_image" id="hidden_news_image">
                        </div>
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-xl shadow-md transition flex justify-center items-center gap-2">
                            <i class="fas fa-save"></i> <span>{{ __('massage.form_update_news') }}</span>
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


