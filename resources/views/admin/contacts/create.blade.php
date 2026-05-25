@extends('admin.layouts.app')

@section('title', __('massage.dt_add_contact') ?? 'Add Contact Details')
@section('header', __('massage.dt_add_contact') ?? 'Add Contact Details')

@section('content')
<div class="bg-white p-6 md:p-8 rounded-xl shadow-sm border border-gray-200 focus-within:ring-2 focus-within:ring-blue-100 transition-all max-w-2xl mx-auto">
    <div class="flex items-center justify-between mb-6 pb-4 border-b border-gray-100">
        <h3 class="text-xl font-bold text-gray-800">{{ __('massage.form_org_contact_info') }}</h3>
        <a href="{{ route('admin.contacts.index') }}" class="text-gray-500 hover:text-blue-600 transition-colors flex items-center gap-1">
            <i class="fas {{ app()->getLocale() == 'ar' ? 'fa-arrow-right' : 'fa-arrow-left' }}"></i> <span>{{ __('massage.form_back_to_list') }}</span>
        </a>
    </div>

    <form action="{{ route('admin.contacts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="space-y-6">
            <!-- Phone Number -->
            <div>
                <label class="block text-sm font-semibold mb-1 text-gray-600">{{ __('massage.dt_phone') }} <span class="text-red-500">*</span></label>
                <div class="relative">
                    <div class="absolute inset-y-0 {{ app()->getLocale() == 'ar' ? 'right-0 pr-3' : 'left-0 pl-3' }} flex items-center pointer-events-none">
                        <i class="fas fa-phone-alt text-gray-400"></i>
                    </div>
                    <input type="text" name="phone_number" required placeholder="+1234567890" class="w-full {{ app()->getLocale() == 'ar' ? 'pr-10 text-left placeholder-right' : 'pl-10 text-left' }} p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="ltr">
                </div>
                @error('phone_number') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
            </div>

            <!-- Email Address -->
            <div>
                <label class="block text-sm font-semibold mb-1 text-gray-600">{{ app()->getLocale() == 'ar' ? 'البريد الإلكتروني' : 'Email Address' }}</label>
                <div class="relative">
                    <div class="absolute inset-y-0 {{ app()->getLocale() == 'ar' ? 'right-0 pr-3' : 'left-0 pl-3' }} flex items-center pointer-events-none">
                        <i class="fas fa-envelope text-gray-400"></i>
                    </div>
                    <input type="email" name="email" placeholder="example@email.com" class="w-full {{ app()->getLocale() == 'ar' ? 'pr-10 text-left placeholder-right' : 'pl-10 text-left' }} p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="ltr">
                </div>
                @error('email') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Location AR -->
                <div>
                    <label class="block text-sm font-semibold mb-1 text-gray-600">{{ app()->getLocale() == 'ar' ? 'العنوان (بالعربي)' : 'Address (Arabic)' }}</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 {{ app()->getLocale() == 'ar' ? 'right-0 pr-3' : 'left-0 pl-3' }} flex items-center pointer-events-none">
                            <i class="fas fa-map-marker-alt text-gray-400"></i>
                        </div>
                        <input type="text" name="location_ar" placeholder="الخرطوم، السودان" class="w-full {{ app()->getLocale() == 'ar' ? 'pr-10' : 'pl-10' }} p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                    </div>
                    @error('location_ar') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- Location EN -->
                <div>
                    <label class="block text-sm font-semibold mb-1 text-gray-600">{{ app()->getLocale() == 'ar' ? 'العنوان (بالإنجليزي)' : 'Address (English)' }}</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 {{ app()->getLocale() == 'ar' ? 'right-0 pr-3' : 'left-0 pl-3' }} flex items-center pointer-events-none">
                            <i class="fas fa-map-marker-alt text-gray-400"></i>
                        </div>
                        <input type="text" name="location_en" placeholder="Khartoum, Sudan" class="w-full {{ app()->getLocale() == 'ar' ? 'pr-10' : 'pl-10' }} p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="ltr">
                    </div>
                    @error('location_en') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Footer Description AR -->
            <div>
                <label class="block text-sm font-semibold mb-1 text-gray-600">{{ app()->getLocale() == 'ar' ? 'نص ذيل الصفحة (بالعربي)' : 'Footer Description (Arabic)' }}</label>
                <textarea name="footer_desc_ar" rows="3" placeholder="تقديم المساعدات الأساسية..." class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white"></textarea>
                @error('footer_desc_ar') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
            </div>

            <!-- Footer Description EN -->
            <div>
                <label class="block text-sm font-semibold mb-1 text-gray-600">{{ app()->getLocale() == 'ar' ? 'نص ذيل الصفحة (بالإنجليزي)' : 'Footer Description (English)' }}</label>
                <textarea name="footer_desc_en" rows="3" placeholder="Bringing essential aid..." class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="ltr"></textarea>
                @error('footer_desc_en') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
            </div>

            <!-- Facebook URL -->
            <div>
                <label class="block text-sm font-semibold mb-1 text-gray-600">{{ __('massage.form_facebook_url') }}</label>
                <div class="relative">
                    <div class="absolute inset-y-0 {{ app()->getLocale() == 'ar' ? 'right-0 pr-3' : 'left-0 pl-3' }} flex items-center pointer-events-none">
                        <i class="fab fa-facebook text-blue-600"></i>
                    </div>
                    <input type="url" name="facebook_url" placeholder="https://facebook.com/yourpage" class="w-full {{ app()->getLocale() == 'ar' ? 'pr-10 text-left placeholder-right' : 'pl-10 text-left' }} p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="ltr">
                </div>
                @error('facebook_url') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
            </div>

            <!-- TikTok URL -->
            <div>
                <label class="block text-sm font-semibold mb-1 text-gray-600">{{ __('massage.form_tiktok_url') ?? 'TikTok URL' }}</label>
                <div class="relative">
                    <div class="absolute inset-y-0 {{ app()->getLocale() == 'ar' ? 'right-0 pr-3' : 'left-0 pl-3' }} flex items-center pointer-events-none">
                        <i class="fab fa-tiktok text-black"></i>
                    </div>
                    <input type="url" name="tiktok_url" placeholder="https://tiktok.com/@yourprofile" class="w-full {{ app()->getLocale() == 'ar' ? 'pr-10 text-left placeholder-right' : 'pl-10 text-left' }} p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="ltr">
                </div>
                @error('tiktok_url') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
            </div>

            <!-- WhatsApp URL -->
            <div>
                <label class="block text-sm font-semibold mb-1 text-gray-600">{{ app()->getLocale() == 'ar' ? 'رابط الواتساب' : 'WhatsApp URL' }}</label>
                <div class="relative">
                    <div class="absolute inset-y-0 {{ app()->getLocale() == 'ar' ? 'right-0 pr-3' : 'left-0 pl-3' }} flex items-center pointer-events-none">
                        <i class="fab fa-whatsapp text-green-500"></i>
                    </div>
                    <input type="url" name="whatsapp_url" placeholder="https://wa.me/24912345678" class="w-full {{ app()->getLocale() == 'ar' ? 'pr-10 text-left placeholder-right' : 'pl-10 text-left' }} p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="ltr">
                </div>
                @error('whatsapp_url') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
            </div>

            <!-- Instagram URL -->
            <div>
                <label class="block text-sm font-semibold mb-1 text-gray-600">{{ app()->getLocale() == 'ar' ? 'رابط الانستجرام' : 'Instagram URL' }}</label>
                <div class="relative">
                    <div class="absolute inset-y-0 {{ app()->getLocale() == 'ar' ? 'right-0 pr-3' : 'left-0 pl-3' }} flex items-center pointer-events-none">
                        <i class="fab fa-instagram text-pink-600"></i>
                    </div>
                    <input type="url" name="instagram_url" placeholder="https://instagram.com/username" class="w-full {{ app()->getLocale() == 'ar' ? 'pr-10 text-left placeholder-right' : 'pl-10 text-left' }} p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="ltr">
                </div>
                @error('instagram_url') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
            </div>

            <!-- LinkedIn URL -->
            <div>
                <label class="block text-sm font-semibold mb-1 text-gray-600">{{ app()->getLocale() == 'ar' ? 'رابط لينكد إن' : 'LinkedIn URL' }}</label>
                <div class="relative">
                    <div class="absolute inset-y-0 {{ app()->getLocale() == 'ar' ? 'right-0 pr-3' : 'left-0 pl-3' }} flex items-center pointer-events-none">
                        <i class="fab fa-linkedin text-blue-800"></i>
                    </div>
                    <input type="url" name="linkedin_url" placeholder="https://linkedin.com/in/username" class="w-full {{ app()->getLocale() == 'ar' ? 'pr-10 text-left placeholder-right' : 'pl-10 text-left' }} p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="ltr">
                </div>
                @error('linkedin_url') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
            </div>

            <!-- Telegram URL -->
            <div>
                <label class="block text-sm font-semibold mb-1 text-gray-600">{{ app()->getLocale() == 'ar' ? 'رابط تيليجرام' : 'Telegram URL' }}</label>
                <div class="relative">
                    <div class="absolute inset-y-0 {{ app()->getLocale() == 'ar' ? 'right-0 pr-3' : 'left-0 pl-3' }} flex items-center pointer-events-none">
                        <i class="fab fa-telegram text-blue-500"></i>
                    </div>
                    <input type="url" name="telegram_url" placeholder="https://t.me/username" class="w-full {{ app()->getLocale() == 'ar' ? 'pr-10 text-left placeholder-right' : 'pl-10 text-left' }} p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="ltr">
                </div>
                @error('telegram_url') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
            </div>

            <!-- X (Twitter) URL -->
            <div>
                <label class="block text-sm font-semibold mb-1 text-gray-600">{{ app()->getLocale() == 'ar' ? 'رابط منصة إكس (X)' : 'X (Twitter) URL' }}</label>
                <div class="relative">
                    <div class="absolute inset-y-0 {{ app()->getLocale() == 'ar' ? 'right-0 pr-3' : 'left-0 pl-3' }} flex items-center pointer-events-none">
                        <i class="fab fa-x-twitter text-black"></i>
                    </div>
                    <input type="url" name="x_url" placeholder="https://x.com/username" class="w-full {{ app()->getLocale() == 'ar' ? 'pr-10 text-left placeholder-right' : 'pl-10 text-left' }} p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="ltr">
                </div>
                @error('x_url') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
            </div>
            
            <div class="mt-8 pt-4 border-t border-gray-200">
                <h4 class="text-lg font-bold text-gray-800 mb-4">{{ app()->getLocale() == 'ar' ? 'معلومات الشركة المطورة' : 'Developer Information' }}</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Developer Name AR -->
                    <div>
                        <label class="block text-sm font-semibold mb-1 text-gray-600">{{ app()->getLocale() == 'ar' ? 'اسم المطوّر (بالعربي)' : 'Developer Name (Arabic)' }}</label>
                        <input type="text" name="developer_name_ar" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                        @error('developer_name_ar') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <!-- Developer Name EN -->
                    <div>
                        <label class="block text-sm font-semibold mb-1 text-gray-600">{{ app()->getLocale() == 'ar' ? 'اسم المطوّر (بالإنجليزي)' : 'Developer Name (English)' }}</label>
                        <input type="text" name="developer_name_en" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="ltr">
                        @error('developer_name_en') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <!-- Developer Link -->
                    <div>
                        <label class="block text-sm font-semibold mb-1 text-gray-600">{{ app()->getLocale() == 'ar' ? 'رابط موقع المطوّر' : 'Developer Website Link' }}</label>
                        <input type="url" name="developer_link" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="ltr">
                        @error('developer_link') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <!-- Developer Logo -->
                    <div class="md:col-span-2 space-y-4">
                        <div>
                            <label class="block text-sm font-semibold mb-1 text-gray-600">{{ app()->getLocale() == 'ar' ? 'سؤال الأمان: مكان الميلاد؟' : 'Security Question: Place of Birth?' }} <span class="text-red-500">*</span></label>
                            <input type="text" name="birth_place" placeholder="{{ app()->getLocale() == 'ar' ? 'أدخل مكان الميلاد للتحقق' : 'Enter place of birth to verify' }}" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                            @error('birth_place') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                            <small class="text-gray-400 mt-1 block">{{ app()->getLocale() == 'ar' ? 'مطلوب فقط عند رفع شعار المطوّر' : 'Required only when uploading developer logo' }}</small>
                        </div>

                        <label class="block text-sm font-semibold mb-2 text-gray-600">{{ app()->getLocale() == 'ar' ? 'شعار المطوّر' : 'Developer Logo' }}</label>
                        <div class="h-40 border-2 border-dashed border-blue-200 rounded-xl flex flex-col justify-center items-center bg-slate-50 hover:bg-white hover:border-blue-400 transition-all cursor-pointer group relative overflow-hidden">
                            <input type="file" name="developer_logo" id="dev_logo" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer z-10 w-full h-full" onchange="handleImageUpload(event, 'devLogoPreview', 'devLogoPlaceholder', 'removeDevLogoBtn', 'hidden_dev_logo')">
                            
                            <div id="devLogoPlaceholder" class="w-full h-full flex flex-col items-center justify-center p-4 text-center">
                                <div class="w-10 h-10 bg-white text-blue-500 rounded-full flex items-center justify-center mb-2 group-hover:scale-110 transition-transform shadow-sm">
                                    <i class="fas fa-image text-lg"></i>
                                </div>
                                <span class="text-xs font-semibold text-slate-600 group-hover:text-blue-600">{{ app()->getLocale() == 'ar' ? 'رفع شعار المطوّر' : 'Upload Developer Logo' }}</span>
                            </div>
                            
                            <img id="devLogoPreview" class="absolute inset-0 w-full h-full object-contain p-4 hidden" />
                            
                            <button id="removeDevLogoBtn" type="button" onclick="resetImageUpload('dev_logo', 'devLogoPreview', 'devLogoPlaceholder', 'removeDevLogoBtn', 'hidden_dev_logo')" class="absolute top-2 right-2 bg-rose-500 text-white w-7 h-7 rounded-full flex items-center justify-center hover:bg-rose-600 hidden z-20 shadow-md transition-colors">
                                <i class="fas fa-times text-xs"></i>
                            </button>

                            <input type="hidden" name="cropped_image" id="hidden_dev_logo">
                        </div>
                        <small class="text-gray-500 mt-1 block">{{ app()->getLocale() == 'ar' ? 'صورة شفافة (PNG) يفضل أن تكون بخلفية شفافة' : 'Preferred transparent background (PNG)' }}</small>
                    </div>
                </div>
            </div>

            <div class="mt-8 pt-4 border-t border-gray-100">
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-xl shadow-md transition flex justify-center items-center gap-2">
                    <i class="fas fa-save"></i> <span>{{ __('massage.form_save_contact') }}</span>
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
