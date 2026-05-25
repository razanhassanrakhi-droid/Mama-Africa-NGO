@extends('admin.layouts.app')

@section('title', __('massage.add_news') ?? 'Add News')
@section('header', __('massage.add_news') ?? 'Add News')

@section('content')
<div class="bg-white p-6 md:p-8 rounded-xl shadow-sm border border-gray-200 focus-within:ring-2 focus-within:ring-blue-100 transition-all max-w-5xl mx-auto">
    <div class="flex items-center justify-between mb-6 pb-4 border-b border-gray-100">
        <h3 class="text-xl font-bold text-gray-800">{{ __('massage.form_news_details') }}</h3>
        <a href="{{ route('admin.news.index') }}" class="text-gray-500 hover:text-blue-600 transition-colors flex items-center gap-1">
            <i class="fas {{ app()->getLocale() == 'ar' ? 'fa-arrow-right' : 'fa-arrow-left' }}"></i> <span>{{ __('massage.form_back_to_list') }}</span>
        </a>
    </div>

    <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-6">
                <!-- Title -->
                <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                    <h4 class="font-semibold text-gray-700 mb-4 border-b pb-2"><i class="fas fa-heading rtl:ml-2 ltr:mr-2"></i> {{ __('massage.dt_title') }}</h4>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold mb-1 text-gray-600">{{ __('massage.form_title_ar') }} <span class="text-red-500">*</span></label>
                            <input type="text" name="title[ar]" required class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="rtl">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold mb-1 text-gray-600">{{ __('massage.form_title_en') }} <span class="text-red-500">*</span></label>
                            <input type="text" name="title[en]" required class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="ltr">
                        </div>
                    </div>
                </div>

                <!-- Content/Details -->
                <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                    <h4 class="font-semibold text-gray-700 mb-4 border-b pb-2"><i class="fas fa-align-justify rtl:ml-2 ltr:mr-2"></i> {{ __('massage.dt_details_link') }}</h4>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold mb-1 text-gray-600">{{ __('massage.form_details_ar') }} <span class="text-red-500">*</span></label>
                            <textarea name="details[ar]" required rows="4" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="rtl"></textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold mb-1 text-gray-600">{{ __('massage.form_details_en') }} <span class="text-red-500">*</span></label>
                            <textarea name="details[en]" required rows="4" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="ltr"></textarea>
                        </div>
                    </div>
                </div>

                <!-- Challenges -->
                <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                    <h4 class="font-semibold text-gray-700 mb-4 border-b pb-2"><i class="fas fa-bullseye rtl:ml-2 ltr:mr-2"></i> {{ __('massage.dt_challenge') }}</h4>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold mb-1 text-gray-600">{{ __('massage.form_challenge_ar') }} <span class="text-red-500">*</span></label>
                            <textarea name="challange[ar]" required rows="3" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="rtl"></textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold mb-1 text-gray-600">{{ __('massage.form_challenge_en') }} <span class="text-red-500">*</span></label>
                            <textarea name="challange[en]" required rows="3" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="ltr"></textarea>
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
                                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                                @endforeach
                            </select>
                            <p class="text-xs text-gray-500 mt-1">Total Projects: {{ $totalProjects }}</p>
                        </div>

                        <!-- Cost/Pay -->
                        <div class="mb-4">
                            <label class="block text-sm font-semibold mb-1 text-gray-600">{{ __('massage.form_cost') }} <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 {{ app()->getLocale() == 'ar' ? 'right-0 pr-3' : 'left-0 pl-3' }} flex items-center pointer-events-none">
                                    <span class="text-gray-500">$</span>
                                </div>
                                <input type="number" name="pay" required min="0" step="0.01" class="w-full {{ app()->getLocale() == 'ar' ? 'pr-8' : 'pl-8' }} p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                            </div>
                        </div>

                        <!-- News Type Toggle -->
                        <div class="mb-4">
                            <label class="block text-sm font-semibold mb-2 text-gray-600">
                                <i class="fas fa-tag text-blue-500 rtl:ml-1 ltr:mr-1"></i>
                                {{ app()->getLocale() == 'ar' ? 'نوع الخبر' : 'News Type' }}
                            </label>

                            <div class="flex rounded-lg overflow-hidden border border-gray-300 w-full">
                                <button type="button" id="btn_new_news"
                                    onclick="setNewsType('new')"
                                    class="flex-1 py-2.5 px-3 text-sm font-bold flex items-center justify-center gap-2 transition-all bg-blue-600 text-white border-r border-blue-700">
                                    <i class="fas fa-bolt"></i>
                                    {{ app()->getLocale() == 'ar' ? 'خبر جديد' : 'New News' }}
                                </button>
                                <button type="button" id="btn_old_news"
                                    onclick="setNewsType('old')"
                                    class="flex-1 py-2.5 px-3 text-sm font-bold flex items-center justify-center gap-2 transition-all bg-white text-gray-500 hover:bg-gray-100">
                                    <i class="fas fa-history"></i>
                                    {{ app()->getLocale() == 'ar' ? 'خبر قديم' : 'Old News' }}
                                </button>
                            </div>

                            {{-- Hidden input always sent --}}
                            <input type="hidden" name="published_at" id="published_at_hidden" value="{{ old('published_at', now()->toDateString()) }}">

                            {{-- Date picker shown only for old news --}}
                            <div id="old_date_section" class="mt-3 hidden">
                                <label class="block text-xs font-semibold mb-1 text-gray-600">
                                    <i class="fas fa-calendar-alt text-amber-500"></i>
                                    {{ app()->getLocale() == 'ar' ? 'تاريخ الخبر القديم' : 'Historical Date' }}
                                    <span class="text-red-500">*</span>
                                </label>
                                <input type="date" id="old_date_input"
                                    max="{{ \Carbon\Carbon::yesterday()->toDateString() }}"
                                    onchange="document.getElementById('published_at_hidden').value = this.value"
                                    class="w-full p-2.5 rounded-lg border-2 border-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-400 bg-amber-50 text-gray-700"
                                    dir="ltr">
                                <p class="text-xs text-amber-600 mt-1 flex items-center gap-1">
                                    <i class="fas fa-exclamation-circle"></i>
                                    {{ app()->getLocale() == 'ar' ? 'يجب اختيار تاريخ قبل اليوم' : 'Must be before today' }}
                                </p>
                            </div>

                            {{-- New badge shown for new news --}}
                            <div id="new_date_section" class="mt-2">
                                <span class="inline-flex items-center gap-1 text-xs text-green-700 bg-green-50 border border-green-200 rounded-full py-1 px-3">
                                    <i class="fas fa-check-circle text-green-500"></i>
                                    {{ app()->getLocale() == 'ar' ? 'سيُنشر بتاريخ اليوم تلقائياً' : 'Will be published today automatically' }}
                                </span>
                            </div>
                        </div>

                        <!-- YouTube Link -->
                        <div class="mb-4">
                            <label class="block text-sm font-semibold mb-1 text-gray-600">{{ __('massage.form_youtube_link') }}</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 {{ app()->getLocale() == 'ar' ? 'right-0 pr-3' : 'left-0 pl-3' }} flex items-center pointer-events-none">
                                    <i class="fab fa-youtube text-red-500"></i>
                                </div>
                                <input type="url" name="youtube_link" placeholder="https://youtube.com/..." class="w-full {{ app()->getLocale() == 'ar' ? 'pr-10 text-left placeholder-right' : 'pl-10 text-left' }} p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="ltr">
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                        <h4 class="font-semibold text-gray-700 mb-4 border-b pb-2"><i class="fas fa-image rtl:ml-2 ltr:mr-2"></i> {{ __('massage.form_news_image') }}</h4>
                        
                        <div class="h-48 border-2 border-dashed border-blue-300 rounded-xl flex flex-col justify-center items-center bg-white hover:bg-blue-50 transition cursor-pointer group relative overflow-hidden">
                            <input type="file" name="image" id="news_image" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer z-10 w-full h-full" onchange="handleImageUpload(event, 'preview_news_image', 'placeholder_news_image', 'remove_news_image', 'hidden_news_image')">
                            
                            <div id="placeholder_news_image" class="w-full h-full flex flex-col items-center justify-center p-4 text-center">
                                <div class="w-12 h-12 bg-blue-100 text-blue-500 rounded-full flex items-center justify-center mb-2 group-hover:scale-110 transition-transform">
                                    <i class="fas fa-cloud-upload-alt text-xl"></i>
                                </div>
                                <span class="text-xs font-semibold text-gray-700 group-hover:text-blue-600">{{ __('massage.form_upload_photo') }}</span>
                            </div>
                            
                            <img id="preview_news_image" class="absolute inset-0 w-full h-full object-cover hidden" />
                            
                            <button id="remove_news_image" type="button" onclick="resetImageUpload('news_image', 'preview_news_image', 'placeholder_news_image', 'remove_news_image', 'hidden_news_image')" class="absolute top-2 right-2 bg-red-500 text-white w-6 h-6 rounded-full flex items-center justify-center hover:bg-red-600 hidden z-20 shadow-md transition-colors" title="Remove Image">
                                <i class="fas fa-times text-xs"></i>
                            </button>

                            <input type="hidden" name="cropped_image" id="hidden_news_image">
                        </div>
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-xl shadow-md transition flex justify-center items-center gap-2">
                            <i class="fas fa-save"></i> <span>{{ __('massage.form_save_news') }}</span>
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
    // Current mode: 'new' or 'old'
    let newsMode = 'new';

    function setNewsType(type) {
        newsMode = type;

        const btnNew = document.getElementById('btn_new_news');
        const btnOld = document.getElementById('btn_old_news');
        const oldSection = document.getElementById('old_date_section');
        const newSection = document.getElementById('new_date_section');
        const hiddenInput = document.getElementById('published_at_hidden');
        const oldDateInput = document.getElementById('old_date_input');

        if (type === 'new') {
            // Active: New button
            btnNew.className = 'flex-1 py-2.5 px-3 text-sm font-bold flex items-center justify-center gap-2 transition-all bg-blue-600 text-white border-r border-blue-700';
            btnOld.className = 'flex-1 py-2.5 px-3 text-sm font-bold flex items-center justify-center gap-2 transition-all bg-white text-gray-500 hover:bg-gray-100';

            // Show/hide sections
            oldSection.classList.add('hidden');
            newSection.classList.remove('hidden');

            // Set today's date
            hiddenInput.value = '{{ now()->toDateString() }}';
            oldDateInput.removeAttribute('required');
            oldDateInput.value = '';

        } else {
            // Active: Old button
            btnOld.className = 'flex-1 py-2.5 px-3 text-sm font-bold flex items-center justify-center gap-2 transition-all bg-amber-500 text-white';
            btnNew.className = 'flex-1 py-2.5 px-3 text-sm font-bold flex items-center justify-center gap-2 transition-all bg-white text-gray-500 hover:bg-gray-100 border-r border-gray-200';

            // Show/hide sections
            oldSection.classList.remove('hidden');
            newSection.classList.add('hidden');

            // Clear hidden input until user picks
            hiddenInput.value = '';
            oldDateInput.setAttribute('required', 'required');
            oldDateInput.focus();
        }
    }

    // Validate before submit
    document.querySelector('form').addEventListener('submit', function(e) {
        if (newsMode === 'old') {
            const dateVal = document.getElementById('old_date_input').value;
            if (!dateVal) {
                e.preventDefault();
                document.getElementById('old_date_input').classList.add('border-red-500', 'bg-red-50');
                document.getElementById('old_date_input').focus();

                // Show error
                let errMsg = document.getElementById('date_error_msg');
                if (!errMsg) {
                    errMsg = document.createElement('p');
                    errMsg.id = 'date_error_msg';
                    errMsg.className = 'text-xs text-red-600 mt-1 font-semibold flex items-center gap-1';
                    errMsg.innerHTML = '<i class="fas fa-times-circle"></i> {{ app()->getLocale() == "ar" ? "يجب اختيار تاريخ الخبر القديم" : "Please select the historical date" }}';
                    document.getElementById('old_date_input').after(errMsg);
                }
                return false;
            }
            document.getElementById('published_at_hidden').value = dateVal;
        }
    });
</script>
@endpush
