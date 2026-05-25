@extends('admin.layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    
    <div class="mb-6 flex justify-between items-center">
        <h2 class="text-2xl font-bold text-slate-800">{{ app()->getLocale() == 'ar' ? 'إضافة طريقة دفع جديدة' : 'Add New Payment Method' }}</h2>
        <a href="{{ route('admin.payment_methods.index') }}" class="text-slate-500 hover:text-slate-700 transition-colors flex items-center gap-2">
            <i class="fas fa-arrow-{{ app()->getLocale() == 'ar' ? 'right' : 'left' }}"></i> 
            {{ app()->getLocale() == 'ar' ? 'عودة للقائمة' : 'Back to list' }}
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
        <form action="{{ route('admin.payment_methods.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="px-6 py-5 border-b border-slate-200 bg-slate-50/50">
                <h3 class="text-lg font-semibold text-slate-800">{{ app()->getLocale() == 'ar' ? 'تفاصيل طريقة الدفع' : 'Method Details' }}</h3>
                <p class="text-sm text-slate-500 mt-1">{{ app()->getLocale() == 'ar' ? 'أدخل المعلومات الخاصة بطريقة الدفع (مثل حسابك البنكي أو رقم موبايل موني)' : 'Enter the information for the new payment method (e.g., your Bank Account or Mobile Money number)' }}</p>
            </div>

            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="name_ar" class="block text-sm font-medium text-slate-700 mb-1">الاسم (بالعربي) <span class="text-rose-500">*</span></label>
                        <input type="text" id="name_ar" name="name[ar]" required placeholder="مثال: التحويل البنكي"
                            class="w-full rounded-lg border-slate-300 border px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-shadow">
                    </div>
                    <div>
                        <label for="name_en" class="block text-sm font-medium text-slate-700 mb-1">Name (English) <span class="text-rose-500">*</span></label>
                        <input type="text" id="name_en" name="name[en]" required placeholder="e.g. Bank Transfer"
                            class="w-full rounded-lg border-slate-300 border px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-shadow">
                    </div>
                    
                    <div>
                        <label for="type" class="block text-sm font-medium text-slate-700 mb-1">{{ app()->getLocale() == 'ar' ? 'النوع' : 'Type' }} <span class="text-rose-500">*</span></label>
                        <select id="type" name="type" required
                            class="w-full rounded-lg border-slate-300 border px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-shadow bg-white">
                            <option value="bank">{{ app()->getLocale() == 'ar' ? 'تحويل بنكي' : 'Bank Transfer' }}</option>
                            <option value="mobile_money">{{ app()->getLocale() == 'ar' ? 'موبايل موني' : 'Mobile Money' }}</option>
                            <option value="online">{{ app()->getLocale() == 'ar' ? 'بوابة دفع إلكتروني' : 'Online Gateway' }}</option>
                            <option value="crypto">{{ app()->getLocale() == 'ar' ? 'عملات رقمية' : 'Cryptocurrency' }}</option>
                        </select>
                    </div>
                    
                    <div>
                        <label for="icon" class="block text-sm font-medium text-slate-700 mb-1">{{ app()->getLocale() == 'ar' ? 'أيقونة FontAwesome (اختياري)' : 'FontAwesome Icon (optional)' }}</label>
                        <input type="text" id="icon" name="icon" placeholder="fas fa-university"
                            class="w-full rounded-lg border-slate-300 border px-4 py-2 text-slate-600 font-mono text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-shadow">
                    </div>

                    <div class="md:col-span-2">
                        <label for="logo" class="block text-sm font-medium text-slate-700 mb-2">{{ app()->getLocale() == 'ar' ? 'لوجو / صورة (اختياري)' : 'Logo / Image (optional)' }}</label>
                        <div class="h-40 border-2 border-dashed border-blue-200 rounded-xl flex flex-col justify-center items-center bg-slate-50 hover:bg-white hover:border-blue-400 transition-all cursor-pointer group relative overflow-hidden">
                            <input type="file" name="logo" id="payment_logo" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer z-10 w-full h-full" onchange="handleImageUpload(event, 'logoPreview', 'logoPlaceholder', 'removeLogoBtn', 'hidden_payment_logo')">
                            
                            <div id="logoPlaceholder" class="w-full h-full flex flex-col items-center justify-center p-4 text-center">
                                <div class="w-12 h-12 bg-white text-blue-500 rounded-full flex items-center justify-center mb-2 group-hover:scale-110 transition-transform shadow-sm">
                                    <i class="fas fa-image text-xl"></i>
                                </div>
                                <span class="text-xs font-semibold text-slate-600 group-hover:text-blue-600">{{ app()->getLocale() == 'ar' ? 'رفع شعار طريقة الدفع' : 'Upload Payment Logo' }}</span>
                            </div>
                            
                            <img id="logoPreview" class="absolute inset-0 w-full h-full object-contain p-4 hidden" />
                            
                            <button id="removeLogoBtn" type="button" onclick="resetImageUpload('payment_logo', 'logoPreview', 'logoPlaceholder', 'removeLogoBtn', 'hidden_payment_logo')" class="absolute top-2 right-2 bg-rose-500 text-white w-7 h-7 rounded-full flex items-center justify-center hover:bg-rose-600 hidden z-20 shadow-md transition-colors">
                                <i class="fas fa-times text-xs"></i>
                            </button>

                            <input type="hidden" name="cropped_image" id="hidden_payment_logo">
                        </div>
                    </div>

                    <div>
                        <label for="description_ar" class="block text-sm font-medium text-slate-700 mb-1">وصف قصير (بالعربي)</label>
                        <textarea id="description_ar" name="description[ar]" rows="2"
                            class="w-full rounded-lg border-slate-300 border px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-shadow"></textarea>
                    </div>
                    <div>
                        <label for="description_en" class="block text-sm font-medium text-slate-700 mb-1">Short Description (English)</label>
                        <textarea id="description_en" name="description[en]" rows="2"
                            class="w-full rounded-lg border-slate-300 border px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-shadow"></textarea>
                    </div>

                    <div>
                        <label for="instructions_ar" class="block text-sm font-medium text-slate-700 mb-1">تعليمات الدفع (بالعربي)</label>
                        <textarea id="instructions_ar" name="instructions[ar]" rows="4"
                            class="w-full rounded-lg border-slate-300 border px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-shadow"></textarea>
                    </div>
                    <div>
                        <label for="instructions_en" class="block text-sm font-medium text-slate-700 mb-1">Payment Instructions (English)</label>
                        <textarea id="instructions_en" name="instructions[en]" rows="4"
                            class="w-full rounded-lg border-slate-300 border px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-shadow"></textarea>
                    </div>
                </div>

                <div class="border-t border-slate-200 pt-5 pb-2">
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" class="sr-only peer" checked>
                        <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:{{ app()->getLocale() == 'ar' ? '-translate-x-full' : 'translate-x-full' }} peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] {{ app()->getLocale() == 'ar' ? 'after:right-[2px]' : 'after:left-[2px]' }} after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                        <span class="{{ app()->getLocale() == 'ar' ? 'mr-3' : 'ml-3' }} text-sm font-medium text-slate-700">{{ app()->getLocale() == 'ar' ? 'مُفعّل (يظهر للمستخدمين)' : 'Active (Visible to users)' }}</span>
                    </label>
                </div>
            </div>

            <div class="px-6 py-4 bg-slate-50 border-t border-slate-200 flex justify-end gap-3">
                <a href="{{ route('admin.payment_methods.index') }}" class="bg-white border border-slate-300 hover:bg-slate-50 text-slate-700 font-medium py-2 px-4 rounded-lg shadow-sm transition-colors text-sm">
                    {{ app()->getLocale() == 'ar' ? 'إلغاء' : 'Cancel' }}
                </a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-lg shadow-sm transition-colors flex items-center gap-2 text-sm">
                    <i class="fas fa-save"></i> 
                    {{ app()->getLocale() == 'ar' ? 'حفظ طريقة الدفع' : 'Save Payment Method' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
