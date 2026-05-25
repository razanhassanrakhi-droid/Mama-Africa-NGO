@extends('admin.layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    
    <div class="mb-6 flex justify-between items-center">
        <h2 class="text-2xl font-bold text-slate-800">{{ app()->getLocale() == 'ar' ? 'إعدادات المنصة' : 'Platform Settings' }}</h2>
    </div>

    @if(session('success'))
        <div class="mb-4 bg-green-50 border-l-4 border-green-500 p-4 rounded-md shadow-sm">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                </div>
            </div>
        </div>
    @endif

    <form action="{{ route('admin.settings.store') }}" method="POST">
        @csrf
        
        <!-- General Settings Tab -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden mb-8">
            <div class="px-6 py-5 border-b border-slate-200 bg-slate-50/50">
                <h3 class="text-lg font-semibold text-slate-800">{{ app()->getLocale() == 'ar' ? 'الإعدادات العامة' : 'General Settings' }}</h3>
                <p class="text-sm text-slate-500 mt-1">{{ app()->getLocale() == 'ar' ? 'إعدادات التبرع والموقع الأساسية' : 'Core website and donation settings' }}</p>
            </div>
            
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="site_name_en" class="block text-sm font-medium text-slate-700 mb-1">Platform Name (English)</label>
                        <input type="text" id="site_name_en" name="site_name_en" value="{{ $settings['site_name_en'] ?? ($settings['site_name'] ?? 'Mama Africa NGO') }}" required
                            class="w-full rounded-lg border-slate-300 border px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-shadow">
                    </div>

                    <div dir="rtl">
                        <label for="site_name_ar" class="block text-sm font-medium text-slate-700 mb-1 text-right">اسم المنصة (عربي)</label>
                        <input type="text" id="site_name_ar" name="site_name_ar" value="{{ $settings['site_name_ar'] ?? '' }}" required
                            class="w-full rounded-lg border-slate-300 border px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-shadow text-right">
                    </div>
                    
                    <div>
                        <label for="default_currency" class="block text-sm font-medium text-slate-700 mb-1">Default Currency</label>
                        <select id="default_currency" name="default_currency" 
                            class="w-full rounded-lg border-slate-300 border px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-shadow bg-white">
                            <option value="USD" {{ ($settings['default_currency'] ?? '') == 'USD' ? 'selected' : '' }}>USD ($)</option>
                            <option value="EUR" {{ ($settings['default_currency'] ?? '') == 'EUR' ? 'selected' : '' }}>EUR (€)</option>
                            <option value="GBP" {{ ($settings['default_currency'] ?? '') == 'GBP' ? 'selected' : '' }}>GBP (£)</option>
                            <option value="KES" {{ ($settings['default_currency'] ?? '') == 'KES' ? 'selected' : '' }}>KES (Ksh)</option>
                            <option value="NGN" {{ ($settings['default_currency'] ?? '') == 'NGN' ? 'selected' : '' }}>NGN (₦)</option>
                        </select>
                    </div>
                    
                    <div class="col-span-1 md:col-span-2">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="donation_message_en" class="block text-sm font-medium text-slate-700 mb-1">Donation Page Message (English)</label>
                                <textarea id="donation_message_en" name="donation_message_en" rows="3"
                                    class="w-full rounded-lg border-slate-300 border px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-shadow">{{ $settings['donation_message_en'] ?? ($settings['donation_message'] ?? 'Your contribution makes a difference in the lives of many.') }}</textarea>
                            </div>
                            <div dir="rtl">
                                <label for="donation_message_ar" class="block text-sm font-medium text-slate-700 mb-1 text-right">رسالة صفحة التبرع (عربي)</label>
                                <textarea id="donation_message_ar" name="donation_message_ar" rows="3"
                                    class="w-full rounded-lg border-slate-300 border px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-shadow text-right">{{ $settings['donation_message_ar'] ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Donation Page Content (English) -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden mb-8">
            <div class="px-6 py-5 border-b border-slate-200 bg-slate-50/50">
                <h3 class="text-lg font-semibold text-slate-800">Donation Page Content (English)</h3>
                <p class="text-sm text-slate-500 mt-1">Customize the texts displayed on the donation page for English users.</p>
            </div>
            
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="donation_hero_title_en" class="block text-sm font-medium text-slate-700 mb-1">Hero Title</label>
                        <input type="text" id="donation_hero_title_en" name="donation_hero_title_en" value="{{ $settings['donation_hero_title_en'] ?? 'Support Our Mission' }}"
                            class="w-full rounded-lg border-slate-300 border px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-shadow">
                    </div>
                    <div>
                        <label for="donation_hero_subtitle_en" class="block text-sm font-medium text-slate-700 mb-1">Hero Subtitle</label>
                        <input type="text" id="donation_hero_subtitle_en" name="donation_hero_subtitle_en" value="{{ $settings['donation_hero_subtitle_en'] ?? 'Your contribution directly empowers communities across Africa. Every donation makes a lasting impact.' }}"
                            class="w-full rounded-lg border-slate-300 border px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-shadow">
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label for="donation_form_title_en" class="block text-sm font-medium text-slate-700 mb-1">Amount Section Title</label>
                        <input type="text" id="donation_form_title_en" name="donation_form_title_en" value="{{ $settings['donation_form_title_en'] ?? '1. Select Donation Amount' }}"
                            class="w-full rounded-lg border-slate-300 border px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-shadow">
                    </div>
                    <div>
                        <label for="donation_form_details_en" class="block text-sm font-medium text-slate-700 mb-1">Details Section Title</label>
                        <input type="text" id="donation_form_details_en" name="donation_form_details_en" value="{{ $settings['donation_form_details_en'] ?? '2. Your Details' }}"
                            class="w-full rounded-lg border-slate-300 border px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-shadow">
                    </div>
                    <div>
                        <label for="donation_form_payment_en" class="block text-sm font-medium text-slate-700 mb-1">Payment Section Title</label>
                        <input type="text" id="donation_form_payment_en" name="donation_form_payment_en" value="{{ $settings['donation_form_payment_en'] ?? '3. Select Payment Method' }}"
                            class="w-full rounded-lg border-slate-300 border px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-shadow">
                    </div>
                </div>
            </div>
        </div>

        <!-- Donation Page Content (Arabic) -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden mb-8" dir="rtl">
            <div class="px-6 py-5 border-b border-slate-200 bg-slate-50/50">
                <h3 class="text-lg font-semibold text-slate-800">محتوى صفحة التبرع (عربي)</h3>
                <p class="text-sm text-slate-500 mt-1">تخصيص النصوص المعروضة في صفحة التبرع للمستخدمين باللغة العربية.</p>
            </div>
            
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="donation_hero_title_ar" class="block text-sm font-medium text-slate-700 mb-1">العنوان الرئيسي (Hero)</label>
                        <input type="text" id="donation_hero_title_ar" name="donation_hero_title_ar" value="{{ $settings['donation_hero_title_ar'] ?? 'أدعم مهمتنا' }}"
                            class="w-full rounded-lg border-slate-300 border px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-shadow">
                    </div>
                    <div>
                        <label for="donation_hero_subtitle_ar" class="block text-sm font-medium text-slate-700 mb-1">وصف العنوان (Hero Subtitle)</label>
                        <input type="text" id="donation_hero_subtitle_ar" name="donation_hero_subtitle_ar" value="{{ $settings['donation_hero_subtitle_ar'] ?? 'مساهمتك تمكن المجتمعات في أفريقيا بشكل مباشر. كل تبرع يحدث تأثيراً دائماً.' }}"
                            class="w-full rounded-lg border-slate-300 border px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-shadow">
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label for="donation_form_title_ar" class="block text-sm font-medium text-slate-700 mb-1">عنوان قسم إختيار المبلغ</label>
                        <input type="text" id="donation_form_title_ar" name="donation_form_title_ar" value="{{ $settings['donation_form_title_ar'] ?? '1. اختر قيمة التبرع' }}"
                            class="w-full rounded-lg border-slate-300 border px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-shadow">
                    </div>
                    <div>
                        <label for="donation_form_details_ar" class="block text-sm font-medium text-slate-700 mb-1">عنوان قسم البيانات</label>
                        <input type="text" id="donation_form_details_ar" name="donation_form_details_ar" value="{{ $settings['donation_form_details_ar'] ?? '2. بياناتك' }}"
                            class="w-full rounded-lg border-slate-300 border px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-shadow">
                    </div>
                    <div>
                        <label for="donation_form_payment_ar" class="block text-sm font-medium text-slate-700 mb-1">عنوان قسم الدفع</label>
                        <input type="text" id="donation_form_payment_ar" name="donation_form_payment_ar" value="{{ $settings['donation_form_payment_ar'] ?? '3. اختر طريقة الدفع' }}"
                            class="w-full rounded-lg border-slate-300 border px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-shadow">
                    </div>
                </div>
            </div>
        </div>

        <!-- Payment Gateways -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden mb-8">
            <div class="px-6 py-5 border-b border-slate-200 bg-slate-50/50 flex justify-between items-center flex-wrap gap-4">
                <div>
                    <h3 class="text-lg font-semibold text-slate-800">{{ app()->getLocale() == 'ar' ? 'بوابات الدفع الإلكتروني' : 'Online Payment Gateways' }}</h3>
                    <p class="text-sm text-slate-500 mt-1">{{ app()->getLocale() == 'ar' ? 'إعداد خيارات الدفع الآلية مثل Stripe و Flutterwave و Paystack.' : 'Configure automated payment processing options like Stripe, Flutterwave, and Paystack.' }}</p>
                </div>
                <div class="text-right">
                    <p class="text-xs text-slate-500 mb-2">{{ app()->getLocale() == 'ar' ? 'إدارة التبرعات وطرق الدفع اليدوية؟' : 'Need to manage donations or custom methods?' }}</p>
                    <div class="flex gap-2 justify-end">
                        <a href="{{ route('admin.donations.index') }}" class="inline-flex items-center gap-2 bg-blue-50 text-blue-700 hover:bg-blue-100 border border-blue-200 text-sm font-medium py-2 px-4 rounded-lg transition-colors">
                            <i class="fas fa-hand-holding-heart"></i> {{ app()->getLocale() == 'ar' ? 'عرض التبرعات' : 'View Donations' }}
                        </a>
                        <a href="{{ route('admin.payment_methods.index') }}" class="inline-flex items-center gap-2 bg-slate-800 hover:bg-slate-700 text-white text-sm font-medium py-2 px-4 rounded-lg transition-colors">
                            <i class="fas fa-list"></i> {{ app()->getLocale() == 'ar' ? 'إدارة طرق الدفع' : 'Manage Methods' }}
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Stripe -->
                    <div class="border rounded-lg p-4 bg-slate-50 {{ session('success') ? 'border-blue-200' : 'border-slate-200' }}">
                        <div class="flex items-center justify-between mb-4">
                            <span class="font-bold text-slate-700 flex items-center gap-2"><i class="fab fa-stripe text-indigo-600 text-xl"></i> Stripe</span>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="enable_stripe" id="enable_stripe" value="1" class="sr-only peer" {{ ($settings['enable_stripe'] ?? '0') == '1' ? 'checked' : '' }}>
                                <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-600"></div>
                            </label>
                        </div>
                        <input type="password" name="stripe_secret" id="stripe_secret" placeholder="Stripe Secret Key" value="{{ $settings['stripe_secret'] ?? '' }}"
                               class="w-full rounded-lg border-slate-300 border px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-shadow">
                    </div>
                    
                    <!-- Flutterwave -->
                    <div class="border rounded-lg p-4 bg-slate-50 {{ session('success') ? 'border-orange-200' : 'border-slate-200' }}">
                        <div class="flex items-center justify-between mb-4">
                            <span class="font-bold text-slate-700 flex items-center gap-2">Flutterwave</span>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="enable_flutterwave" id="enable_flutterwave" value="1" class="sr-only peer" {{ ($settings['enable_flutterwave'] ?? '0') == '1' ? 'checked' : '' }}>
                                <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-orange-500"></div>
                            </label>
                        </div>
                        <input type="password" name="flutterwave_secret" id="flutterwave_secret" placeholder="Flutterwave Secret Key" value="{{ $settings['flutterwave_secret'] ?? '' }}"
                               class="w-full rounded-lg border-slate-300 border px-3 py-2 text-sm focus:ring-2 focus:ring-orange-500 focus:border-orange-500 outline-none transition-shadow">
                    </div>
                    
                    <!-- Paystack -->
                    <div class="border rounded-lg p-4 bg-slate-50 {{ session('success') ? 'border-cyan-200' : 'border-slate-200' }}">
                        <div class="flex items-center justify-between mb-4">
                            <span class="font-bold text-slate-700 flex items-center gap-2">Paystack</span>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="enable_paystack" id="enable_paystack" value="1" class="sr-only peer" {{ ($settings['enable_paystack'] ?? '0') == '1' ? 'checked' : '' }}>
                                <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-cyan-600"></div>
                            </label>
                        </div>
                        <input type="password" name="paystack_secret" id="paystack_secret" placeholder="Paystack Secret Key" value="{{ $settings['paystack_secret'] ?? '' }}"
                               class="w-full rounded-lg border-slate-300 border px-3 py-2 text-sm focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 outline-none transition-shadow">
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-end gap-3 pb-8">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2.5 px-6 rounded-lg shadow-sm transition-colors flex items-center gap-2">
                <i class="fas fa-save"></i> 
                {{ app()->getLocale() == 'ar' ? 'حفظ الإعدادات' : 'Save Settings' }}
            </button>
        </div>
        
    </form>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    function setupGatewayToggle(checkboxId, inputId, gatewayName) {
        const checkbox = document.getElementById(checkboxId);
        const input = document.getElementById(inputId);
        if(!checkbox || !input) return;

        // When the checkbox state changes
        checkbox.addEventListener('change', function() {
            if (this.checked) {
                // Prevent turning on if no secret key is provided
                if (input.value.trim() === '') {
                    this.checked = false; // Revert toggle
                    const msg = document.documentElement.dir === 'rtl' 
                        ? `يجب إدخال المفتاح السري (Secret Key) لتفعيل ${gatewayName}`
                        : `You must enter the Secret Key to enable ${gatewayName}`;
                    alert(msg);
                    input.focus();
                } else {
                    input.setAttribute('required', 'required');
                }
            } else {
                input.removeAttribute('required');
            }
        });

        // When typing in the input, if it becomes empty, disable the toggle
        input.addEventListener('input', function() {
            if (this.value.trim() === '') {
                checkbox.checked = false;
                this.removeAttribute('required');
            } else {
                if (checkbox.checked) {
                    this.setAttribute('required', 'required');
                }
            }
        });

        // Initial check on load
        if (checkbox.checked && input.value.trim() === '') {
            checkbox.checked = false;
        }
        if (checkbox.checked) {
            input.setAttribute('required', 'required');
        } else {
            input.removeAttribute('required');
        }
    }

    setupGatewayToggle('enable_stripe', 'stripe_secret', 'Stripe');
    setupGatewayToggle('enable_flutterwave', 'flutterwave_secret', 'Flutterwave');
    setupGatewayToggle('enable_paystack', 'paystack_secret', 'Paystack');
});
</script>
@endpush
