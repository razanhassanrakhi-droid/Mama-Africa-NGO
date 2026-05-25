@extends('admin.layouts.app')

@section('title', __('massage.about_section'))
@section('header', __('massage.about_section'))

@section('content')
<div class="bg-white p-6 md:p-8 rounded-xl shadow-sm border border-gray-200 focus-within:ring-2 focus-within:ring-blue-100 transition-all max-w-5xl mx-auto">
    <div class="flex items-center justify-between mb-6 pb-4 border-b border-gray-100">
        <h3 class="text-xl font-bold text-gray-800">{{ __('massage.about_section') }}</h3>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <form action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="space-y-8">
            <!-- Vision -->
            <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                <h4 class="font-bold text-lg text-gray-800 mb-4 border-b pb-2"><i class="fas fa-eye rtl:ml-2 ltr:mr-2"></i> Our Vision</h4>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-semibold mb-1 text-gray-600">Title (Arabic) *</label>
                        <input type="text" name="vision_title_ar" required value="{{ old('vision_title_ar', $about->vision_title_ar ?? __('massage.about.vision.title', [], 'ar')) }}" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" dir="rtl">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-1 text-gray-600">Title (English) *</label>
                        <input type="text" name="vision_title_en" required value="{{ old('vision_title_en', $about->vision_title_en ?? __('massage.about.vision.title', [], 'en')) }}" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" dir="ltr">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-semibold mb-1 text-gray-600">Description (Arabic) *</label>
                        <textarea name="vision_desc_ar" required rows="3" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" dir="rtl">{{ old('vision_desc_ar', $about->vision_desc_ar ?? trim(__('massage.about.vision.desc', [], 'ar'))) }}</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-1 text-gray-600">Description (English) *</label>
                        <textarea name="vision_desc_en" required rows="3" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" dir="ltr">{{ old('vision_desc_en', $about->vision_desc_en ?? trim(__('massage.about.vision.desc', [], 'en'))) }}</textarea>
                    </div>
                </div>

                <div class="mt-4">
                    <label class="block text-sm font-semibold mb-2 text-gray-600">Vision Image</label>
                    <div class="h-48 border-2 border-dashed border-blue-300 rounded-xl flex flex-col justify-center items-center bg-white hover:bg-blue-50 transition cursor-pointer group relative overflow-hidden">
                        <input type="file" name="vision_image" id="vision_image_input" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer z-10 w-full h-full" onchange="handleImageUpload(event, 'vision_preview', 'vision_placeholder', 'vision_remove', 'vision_cropped')">
                        
                        <div id="vision_placeholder" class="w-full h-full flex flex-col items-center justify-center p-4 text-center {{ (isset($about->vision_image) && $about->vision_image) ? 'hidden' : '' }}">
                            <div class="w-12 h-12 bg-blue-100 text-blue-500 rounded-full flex items-center justify-center mb-2 group-hover:scale-110 transition-transform">
                                <i class="fas fa-cloud-upload-alt text-xl"></i>
                            </div>
                            <span class="text-xs font-semibold text-gray-700 group-hover:text-blue-600">Upload Vision Image</span>
                        </div>
                        
                        <img id="vision_preview" src="{{ isset($about->vision_image) && $about->vision_image ? url('/media/'.$about->vision_image) : asset('images/1.jpg') }}" class="absolute inset-0 w-full h-full object-cover" />
                        
                        <button id="vision_remove" type="button" onclick="aboutResetImage(event, 'vision_image_input', 'vision_preview', 'vision_placeholder', 'vision_remove', 'vision_cropped', '{{ asset('images/1.jpg') }}', 'reset_vision_image')" class="absolute top-2 right-2 bg-red-500 text-white w-6 h-6 rounded-full flex items-center justify-center hover:bg-red-600 {{ (isset($about->vision_image) && $about->vision_image) ? '' : 'hidden' }} z-20 shadow-md transition-colors">
                            <i class="fas fa-times text-xs"></i>
                        </button>
                        
                        <input type="hidden" name="cropped_vision_image" id="vision_cropped">
                        <input type="hidden" name="reset_vision_image" id="reset_vision_image" value="0">
                    </div>
                </div>
            </div>

            <!-- Value Title -->
            <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                <h4 class="font-bold text-lg text-gray-800 mb-4 border-b pb-2"><i class="fas fa-star rtl:ml-2 ltr:mr-2"></i> Our Values</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-semibold mb-1 text-gray-600">Main Title (Arabic) *</label>
                        <input type="text" name="value_title_ar" required value="{{ old('value_title_ar', $about->value_title_ar ?? __('massage.about.value.title', [], 'ar')) }}" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" dir="rtl">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-1 text-gray-600">Main Title (English) *</label>
                        <input type="text" name="value_title_en" required value="{{ old('value_title_en', $about->value_title_en ?? __('massage.about.value.title', [], 'en')) }}" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" dir="ltr">
                    </div>
                </div>

                <!-- 4 Value Items -->
                @php
                    $values = [
                        'participation' => 'Participation',
                        'integrity' => 'Integrity',
                        'transparency' => 'Transparency',
                        'accountability' => 'Accountability'
                    ];
                @endphp

                @foreach($values as $key => $label)
                <div class="pl-4 mt-6 border-l-4 border-blue-500">
                    <h5 class="font-semibold text-gray-700 mb-3">{{ $label }}</h5>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-2">
                        <div>
                            <input type="text" name="value_{{ $key }}_ar" placeholder="Title (Arabic) *" required value="{{ old('value_'.$key.'_ar', $about->{'value_'.$key.'_ar'} ?? __('massage.about.value.'.$key, [], 'ar')) }}" class="w-full p-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" dir="rtl">
                        </div>
                        <div>
                            <input type="text" name="value_{{ $key }}_en" placeholder="Title (English) *" required value="{{ old('value_'.$key.'_en', $about->{'value_'.$key.'_en'} ?? __('massage.about.value.'.$key, [], 'en')) }}" class="w-full p-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" dir="ltr">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <textarea name="value_{{ $key }}_desc_ar" placeholder="Description (Arabic) *" required rows="2" class="w-full p-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" dir="rtl">{{ old('value_'.$key.'_desc_ar', $about->{'value_'.$key.'_desc_ar'} ?? __('massage.about.value.'.$key.'_desc', [], 'ar')) }}</textarea>
                        </div>
                        <div>
                            <textarea name="value_{{ $key }}_desc_en" placeholder="Description (English) *" required rows="2" class="w-full p-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" dir="ltr">{{ old('value_'.$key.'_desc_en', $about->{'value_'.$key.'_desc_en'} ?? __('massage.about.value.'.$key.'_desc', [], 'en')) }}</textarea>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="mt-6">
                    <label class="block text-sm font-semibold mb-2 text-gray-600">Values Image</label>
                    <div class="h-48 border-2 border-dashed border-blue-300 rounded-xl flex flex-col justify-center items-center bg-white hover:bg-blue-50 transition cursor-pointer group relative overflow-hidden">
                        <input type="file" name="value_image" id="value_image_input" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer z-10 w-full h-full" onchange="handleImageUpload(event, 'value_preview', 'value_placeholder', 'value_remove', 'value_cropped')">
                        
                        <div id="value_placeholder" class="w-full h-full flex flex-col items-center justify-center p-4 text-center {{ (isset($about->value_image) && $about->value_image) ? 'hidden' : '' }}">
                            <div class="w-12 h-12 bg-blue-100 text-blue-500 rounded-full flex items-center justify-center mb-2 group-hover:scale-110 transition-transform">
                                <i class="fas fa-cloud-upload-alt text-xl"></i>
                            </div>
                            <span class="text-xs font-semibold text-gray-700 group-hover:text-blue-600">Upload Values Image</span>
                        </div>
                        
                        <img id="value_preview" src="{{ isset($about->value_image) && $about->value_image ? url('/media/'.$about->value_image) : asset('images/3.jpg') }}" class="absolute inset-0 w-full h-full object-cover" />
                        
                        <button id="value_remove" type="button" onclick="aboutResetImage(event, 'value_image_input', 'value_preview', 'value_placeholder', 'value_remove', 'value_cropped', '{{ asset('images/3.jpg') }}', 'reset_value_image')" class="absolute top-2 right-2 bg-red-500 text-white w-6 h-6 rounded-full flex items-center justify-center hover:bg-red-600 {{ (isset($about->value_image) && $about->value_image) ? '' : 'hidden' }} z-20 shadow-md transition-colors">
                            <i class="fas fa-times text-xs"></i>
                        </button>
                        
                        <input type="hidden" name="cropped_value_image" id="value_cropped">
                        <input type="hidden" name="reset_value_image" id="reset_value_image" value="0">
                    </div>
                </div>
            </div>

            <!-- Mission -->
            <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                <h4 class="font-bold text-lg text-gray-800 mb-4 border-b pb-2"><i class="fas fa-bullseye rtl:ml-2 ltr:mr-2"></i> Our Mission</h4>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-semibold mb-1 text-gray-600">Title (Arabic) *</label>
                        <input type="text" name="mission_title_ar" required value="{{ old('mission_title_ar', $about->mission_title_ar ?? __('massage.about.mission.title', [], 'ar')) }}" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" dir="rtl">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-1 text-gray-600">Title (English) *</label>
                        <input type="text" name="mission_title_en" required value="{{ old('mission_title_en', $about->mission_title_en ?? __('massage.about.mission.title', [], 'en')) }}" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" dir="ltr">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-semibold mb-1 text-gray-600">Description (Arabic) *</label>
                        <textarea name="mission_desc_ar" required rows="3" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" dir="rtl">{{ old('mission_desc_ar', $about->mission_desc_ar ?? trim(__('massage.about.mission.desc', [], 'ar'))) }}</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-1 text-gray-600">Description (English) *</label>
                        <textarea name="mission_desc_en" required rows="3" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" dir="ltr">{{ old('mission_desc_en', $about->mission_desc_en ?? trim(__('massage.about.mission.desc', [], 'en'))) }}</textarea>
                    </div>
                </div>

                <div class="mt-4">
                    <label class="block text-sm font-semibold mb-2 text-gray-600">Mission Image</label>
                    <div class="h-48 border-2 border-dashed border-blue-300 rounded-xl flex flex-col justify-center items-center bg-white hover:bg-blue-50 transition cursor-pointer group relative overflow-hidden">
                        <input type="file" name="mission_image" id="mission_image_input" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer z-10 w-full h-full" onchange="handleImageUpload(event, 'mission_preview', 'mission_placeholder', 'mission_remove', 'mission_cropped')">
                        
                        <div id="mission_placeholder" class="w-full h-full flex flex-col items-center justify-center p-4 text-center {{ (isset($about->mission_image) && $about->mission_image) ? 'hidden' : '' }}">
                            <div class="w-12 h-12 bg-blue-100 text-blue-500 rounded-full flex items-center justify-center mb-2 group-hover:scale-110 transition-transform">
                                <i class="fas fa-cloud-upload-alt text-xl"></i>
                            </div>
                            <span class="text-xs font-semibold text-gray-700 group-hover:text-blue-600">Upload Mission Image</span>
                        </div>
                        
                        <img id="mission_preview" src="{{ isset($about->mission_image) && $about->mission_image ? url('/media/'.$about->mission_image) : asset('images/2.jpg') }}" class="absolute inset-0 w-full h-full object-cover" />
                        
                        <button id="mission_remove" type="button" onclick="aboutResetImage(event, 'mission_image_input', 'mission_preview', 'mission_placeholder', 'mission_remove', 'mission_cropped', '{{ asset('images/2.jpg') }}', 'reset_mission_image')" class="absolute top-2 right-2 bg-red-500 text-white w-6 h-6 rounded-full flex items-center justify-center hover:bg-red-600 {{ (isset($about->mission_image) && $about->mission_image) ? '' : 'hidden' }} z-20 shadow-md transition-colors">
                            <i class="fas fa-times text-xs"></i>
                        </button>
                        
                        <input type="hidden" name="cropped_mission_image" id="mission_cropped">
                        <input type="hidden" name="reset_mission_image" id="reset_mission_image" value="0">
                    </div>
                </div>
            </div>

            <!-- History -->
            <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                <h4 class="font-bold text-lg text-gray-800 mb-4 border-b pb-2"><i class="fas fa-history rtl:ml-2 ltr:mr-2"></i> Our History</h4>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-semibold mb-1 text-gray-600">Title (Arabic) *</label>
                        <input type="text" name="history_title_ar" required value="{{ old('history_title_ar', $about->history_title_ar ?? __('massage.about.history.title', [], 'ar')) }}" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" dir="rtl">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-1 text-gray-600">Title (English) *</label>
                        <input type="text" name="history_title_en" required value="{{ old('history_title_en', $about->history_title_en ?? __('massage.about.history.title', [], 'en')) }}" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" dir="ltr">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold mb-1 text-gray-600">Description (Arabic) *</label>
                        <textarea name="history_desc_ar" required rows="5" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" dir="rtl">{{ old('history_desc_ar', $about->history_desc_ar ?? trim(__('massage.about.history.desc', [], 'ar'))) }}</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-1 text-gray-600">Description (English) *</label>
                        <textarea name="history_desc_en" required rows="5" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" dir="ltr">{{ old('history_desc_en', $about->history_desc_en ?? trim(__('massage.about.history.desc', [], 'en'))) }}</textarea>
                    </div>
                </div>

                <div class="mt-4">
                    <label class="block text-sm font-semibold mb-2 text-gray-600">History Image</label>
                    <div class="h-48 border-2 border-dashed border-blue-300 rounded-xl flex flex-col justify-center items-center bg-white hover:bg-blue-50 transition cursor-pointer group relative overflow-hidden">
                        <input type="file" name="history_image" id="history_image_input" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer z-10 w-full h-full" onchange="handleImageUpload(event, 'history_preview', 'history_placeholder', 'history_remove', 'history_cropped')">
                        
                        <div id="history_placeholder" class="w-full h-full flex flex-col items-center justify-center p-4 text-center {{ (isset($about->history_image) && $about->history_image) ? 'hidden' : '' }}">
                            <div class="w-12 h-12 bg-blue-100 text-blue-500 rounded-full flex items-center justify-center mb-2 group-hover:scale-110 transition-transform">
                                <i class="fas fa-cloud-upload-alt text-xl"></i>
                            </div>
                            <span class="text-xs font-semibold text-gray-700 group-hover:text-blue-600">Upload History Image</span>
                        </div>
                        
                        <img id="history_preview" src="{{ isset($about->history_image) && $about->history_image ? url('/media/'.$about->history_image) : asset('images/last2.jpeg') }}" class="absolute inset-0 w-full h-full object-cover" />
                        
                        <button id="history_remove" type="button" onclick="aboutResetImage(event, 'history_image_input', 'history_preview', 'history_placeholder', 'history_remove', 'history_cropped', '{{ asset('images/last2.jpeg') }}', 'reset_history_image')" class="absolute top-2 right-2 bg-red-500 text-white w-6 h-6 rounded-full flex items-center justify-center hover:bg-red-600 {{ (isset($about->history_image) && $about->history_image) ? '' : 'hidden' }} z-20 shadow-md transition-colors">
                            <i class="fas fa-times text-xs"></i>
                        </button>
                        
                        <input type="hidden" name="cropped_history_image" id="history_cropped">
                        <input type="hidden" name="reset_history_image" id="reset_history_image" value="0">
                    </div>
                </div>
            </div>

            <!-- Our Goal -->
            <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                <h4 class="font-bold text-lg text-gray-800 mb-4 border-b pb-2"><i class="fas fa-bullseye rtl:ml-2 ltr:mr-2"></i> Our Goal</h4>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-semibold mb-1 text-gray-600">Title (Arabic) *</label>
                        <input type="text" name="goal_title_ar" required value="{{ old('goal_title_ar', $about->goal_title_ar ?? 'هدفنا') }}" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" dir="rtl">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-1 text-gray-600">Title (English) *</label>
                        <input type="text" name="goal_title_en" required value="{{ old('goal_title_en', $about->goal_title_en ?? 'Our Goal') }}" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" dir="ltr">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold mb-1 text-gray-600">Description (Arabic) *</label>
                        <textarea name="goal_desc_ar" required rows="5" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" dir="rtl">{{ old('goal_desc_ar', $about->goal_desc_ar ?? 'استيعاب التنمية الاجتماعية للناس والخدمات الأساسية من خلال توفير بناء السلام والأمن الغذائي والحماية والصرف الصحي والتنمية الثقافية') }}</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-1 text-gray-600">Description (English) *</label>
                        <textarea name="goal_desc_en" required rows="5" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" dir="ltr">{{ old('goal_desc_en', $about->goal_desc_en ?? 'To comprehend people social development and basic services by providing peace building, food security, protection. WASH and cultural development') }}</textarea>
                    </div>
                </div>

                <div class="mt-4">
                    <label class="block text-sm font-semibold mb-2 text-gray-600">Goal Image</label>
                    <div class="h-48 border-2 border-dashed border-blue-300 rounded-xl flex flex-col justify-center items-center bg-white hover:bg-blue-50 transition cursor-pointer group relative overflow-hidden">
                        <input type="file" name="goal_image" id="goal_image_input" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer z-10 w-full h-full" onchange="handleImageUpload(event, 'goal_preview', 'goal_placeholder', 'goal_remove', 'goal_cropped')">
                        
                        <div id="goal_placeholder" class="w-full h-full flex flex-col items-center justify-center p-4 text-center {{ (isset($about->goal_image) && $about->goal_image) ? 'hidden' : '' }}">
                            <div class="w-12 h-12 bg-blue-100 text-blue-500 rounded-full flex items-center justify-center mb-2 group-hover:scale-110 transition-transform">
                                <i class="fas fa-cloud-upload-alt text-xl"></i>
                            </div>
                            <span class="text-xs font-semibold text-gray-700 group-hover:text-blue-600">Upload Goal Image</span>
                        </div>
                        
                        <img id="goal_preview" src="{{ isset($about->goal_image) && $about->goal_image ? url('/media/'.$about->goal_image) : asset('images/1.jpg') }}" class="absolute inset-0 w-full h-full object-cover" />
                        
                        <button id="goal_remove" type="button" onclick="aboutResetImage(event, 'goal_image_input', 'goal_preview', 'goal_placeholder', 'goal_remove', 'goal_cropped', '{{ asset('images/1.jpg') }}', 'reset_goal_image')" class="absolute top-2 right-2 bg-red-500 text-white w-6 h-6 rounded-full flex items-center justify-center hover:bg-red-600 {{ (isset($about->goal_image) && $about->goal_image) ? '' : 'hidden' }} z-20 shadow-md transition-colors">
                            <i class="fas fa-times text-xs"></i>
                        </button>
                        
                        <input type="hidden" name="cropped_goal_image" id="goal_cropped">
                        <input type="hidden" name="reset_goal_image" id="reset_goal_image" value="0">
                    </div>
                </div>
            </div>

            <div class="mt-8 flex justify-end">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3.5 px-8 rounded-xl shadow-md hover:shadow-lg transition flex items-center gap-2">
                    <i class="fas fa-save"></i>
                    <span>Save About Section</span>
                </button>
            </div>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
function aboutResetImage(event, inputId, previewId, placeholderId, removeBtnId, hiddenCroppedId, defaultUrl, resetInputId) {
    resetImageUpload(inputId, previewId, placeholderId, removeBtnId, hiddenCroppedId);
    document.getElementById(previewId).src = defaultUrl;
    document.getElementById(resetInputId).value = '1';
}
</script>
@endpush


