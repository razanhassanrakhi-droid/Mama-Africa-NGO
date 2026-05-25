@extends('admin.layouts.app')

@section('title', (app()->getLocale() == 'ar' ? 'إضافة نشاط جديد لمشروع - ' : 'Add New Activity to ') . $project->getTranslation('name', app()->getLocale()))
@section('header', (app()->getLocale() == 'ar' ? 'إضافة نشاط جديد لمشروع - ' : 'Add New Activity to ') . $project->getTranslation('name', app()->getLocale()))

@section('content')
<div class="bg-white p-6 md:p-8 rounded-xl shadow-sm border border-gray-200 max-w-7xl mx-auto">
    <div class="flex items-center justify-between mb-6 pb-4 border-b border-gray-100">
        <div>
            <h3 class="text-xl font-bold text-gray-800">{{ app()->getLocale() == 'ar' ? 'تفاصيل النشاط / التدخل' : 'Activity / Intervention Details' }}</h3>
            <p class="text-xs text-gray-500 mt-1">{{ app()->getLocale() == 'ar' ? 'المشروع: ' . $project->getTranslation('name', 'ar') : 'Project: ' . $project->getTranslation('name', 'en') }}</p>
        </div>
        <a href="{{ route('admin.projects.activities.index', $project->id) }}" class="text-gray-500 hover:text-blue-600 transition-colors flex items-center gap-1">
            <i class="fas {{ app()->getLocale() == 'ar' ? 'fa-arrow-right' : 'fa-arrow-left' }}"></i> <span>{{ app()->getLocale() == 'ar' ? 'العودة للقائمة' : 'Back to list' }}</span>
        </a>
    </div>

    @if($errors->any())
    <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-700 rounded-lg">
        <h5 class="font-bold mb-1">{{ app()->getLocale() == 'ar' ? 'يرجى تصحيح الأخطاء التالية:' : 'Please correct the following errors:' }}</h5>
        <ul class="list-disc pl-5 rtl:pr-5 text-sm space-y-1">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.projects.activities.store', $project->id) }}" method="POST">
        @csrf

        <!-- Language Tabs Header -->
        <div class="border-b border-gray-200 mb-6">
            <nav class="-mb-px flex gap-6" aria-label="Tabs">
                <button type="button" onclick="switchLanguageTab('ar')" id="tab-btn-ar" class="tab-btn border-blue-500 text-blue-600 whitespace-nowrap py-3 px-1 border-b-2 font-bold text-sm flex items-center gap-2">
                    <span class="w-5 h-5 rounded-full bg-blue-100 text-blue-600 text-xs flex items-center justify-center font-bold">ع</span>
                    <span>العربية (Arabic)</span>
                </button>
                <button type="button" onclick="switchLanguageTab('en')" id="tab-btn-en" class="tab-btn border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-3 px-1 border-b-2 font-semibold text-sm flex items-center gap-2">
                    <span class="w-5 h-5 rounded-full bg-gray-100 text-gray-500 text-xs flex items-center justify-center font-bold">E</span>
                    <span>الإنجليزية (English)</span>
                </button>
            </nav>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Side: Translatable Form Inputs (Takes 2 columns) -->
            <div class="lg:col-span-2 space-y-6">
                
                <!-- Arabic Content Section -->
                <div id="content-ar" class="lang-content space-y-6">
                    <div class="bg-gray-50 p-5 rounded-lg border border-gray-100 space-y-4">
                        <h4 class="font-bold text-gray-700 border-b pb-2 flex items-center gap-2" dir="rtl">
                            <i class="fas fa-globe text-blue-500"></i> المحتوى باللغة العربية
                        </h4>
                        
                        <div>
                            <label class="block text-sm font-semibold mb-1 text-gray-600" dir="rtl">عنوان النشاط <span class="text-red-500">*</span></label>
                            <input type="text" name="title[ar]" value="{{ old('title.ar') }}" placeholder="مثال: تقديم سلال غذائية للأسر النازحة" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white text-right" dir="rtl">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold mb-1 text-gray-600" dir="rtl">الوصف الرئيسي للنشاط <span class="text-red-500">*</span></label>
                            <textarea name="description[ar]" rows="4" placeholder="اكتب وصفاً مختصراً للنشاط هنا..." class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white text-right" dir="rtl">{{ old('description.ar') }}</textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold mb-1 text-gray-600" dir="rtl">الوصف التفصيلي / تفاصيل إضافية <span class="text-xs text-gray-400">(اختياري)</span></label>
                            <textarea name="detail[ar]" rows="3" placeholder="أية تفاصيل إضافية مثل عدد المستفيدين أو طبيعة المواد الموزعة..." class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white text-right" dir="rtl">{{ old('detail.ar') }}</textarea>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold mb-1 text-gray-600" dir="rtl">الموقع / المركز <span class="text-red-500">*</span></label>
                                <input type="text" name="location[ar]" value="{{ old('location.ar') }}" placeholder="مثال: الفاشر - مراكز الإيواء - شمال دارفور" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white text-right" dir="rtl">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold mb-1 text-gray-600" dir="rtl">التاريخ / الفترة الزمنية <span class="text-red-500">*</span></label>
                                <input type="text" name="date[ar]" value="{{ old('date.ar') }}" placeholder="مثال: مارس - أبريل 2024" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white text-right" dir="rtl">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold mb-1 text-gray-600" dir="rtl">الجهة الممولة <span class="text-red-500">*</span></label>
                            <input type="text" name="funded_by[ar]" value="{{ old('funded_by.ar') }}" placeholder="مثال: منظمة بلان سودان" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white text-right" dir="rtl">
                        </div>
                    </div>
                </div>

                <!-- English Content Section -->
                <div id="content-en" class="lang-content space-y-6 hidden">
                    <div class="bg-gray-50 p-5 rounded-lg border border-gray-100 space-y-4">
                        <h4 class="font-bold text-gray-700 border-b pb-2 flex items-center gap-2">
                            <i class="fas fa-globe text-blue-500"></i> English Content
                        </h4>
                        
                        <div>
                            <label class="block text-sm font-semibold mb-1 text-gray-600">Activity Title <span class="text-red-500">*</span></label>
                            <input type="text" name="title[en]" value="{{ old('title.en') }}" placeholder="e.g. Provision of food security materials" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="ltr">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold mb-1 text-gray-600">Activity Description <span class="text-red-500">*</span></label>
                            <textarea name="description[en]" rows="4" placeholder="Write a short description of the activity here..." class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="ltr">{{ old('description.en') }}</textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold mb-1 text-gray-600">Detailed Description / Extra Info <span class="text-xs text-gray-400">(Optional)</span></label>
                            <textarea name="detail[en]" rows="3" placeholder="Any extra information e.g. number of beneficiaries..." class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="ltr">{{ old('detail.en') }}</textarea>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold mb-1 text-gray-600">Location / Center <span class="text-red-500">*</span></label>
                                <input type="text" name="location[en]" value="{{ old('location.en') }}" placeholder="e.g. El fasher - Shelters center North Darfur" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="ltr">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold mb-1 text-gray-600">Date / Period <span class="text-red-500">*</span></label>
                                <input type="text" name="date[en]" value="{{ old('date.en') }}" placeholder="e.g. March 2024 to April 2024" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="ltr">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold mb-1 text-gray-600">Funded By <span class="text-red-500">*</span></label>
                            <input type="text" name="funded_by[en]" value="{{ old('funded_by.en') }}" placeholder="e.g. Plan Sudan" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="ltr">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side: Settings & Save (Takes 1 column) -->
            <div class="lg:col-span-1 space-y-6">
                <div class="bg-gray-50 p-5 rounded-lg border border-gray-100 space-y-4">
                    <h4 class="font-bold text-gray-700 border-b pb-2 flex items-center gap-2">
                        <i class="fas fa-sliders-h text-blue-500"></i> {{ app()->getLocale() == 'ar' ? 'الإعدادات العامة' : 'General Settings' }}
                    </h4>

                    <!-- Status -->
                    <div>
                        <label class="block text-sm font-semibold mb-1 text-gray-600">{{ app()->getLocale() == 'ar' ? 'حالة النشاط' : 'Activity Status' }} <span class="text-red-500">*</span></label>
                        <select name="status" required class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                            <option value="completed" {{ old('status', 'completed') == 'completed' ? 'selected' : '' }}>
                                {{ app()->getLocale() == 'ar' ? 'مكتمل (Completed)' : 'Completed (مكتمل)' }}
                            </option>
                            <option value="ongoing" {{ old('status') == 'ongoing' ? 'selected' : '' }}>
                                {{ app()->getLocale() == 'ar' ? 'مستمر (Ongoing)' : 'Ongoing (مستمر)' }}
                            </option>
                            <option value="in_progress" {{ old('status') == 'in_progress' ? 'selected' : '' }}>
                                {{ app()->getLocale() == 'ar' ? 'قيد التنفيذ (In Progress)' : 'In Progress (قيد التنفيذ)' }}
                            </option>
                            <option value="planned" {{ old('status') == 'planned' ? 'selected' : '' }}>
                                {{ app()->getLocale() == 'ar' ? 'قيد التخطيط (Planned)' : 'Planned (قيد التخطيط)' }}
                            </option>
                        </select>
                    </div>

                    <!-- Amount -->
                    <div>
                        <label class="block text-sm font-semibold mb-1 text-gray-600">{{ app()->getLocale() == 'ar' ? 'المبلغ الكلي / التمويل ($)' : 'Total Amount ($)' }}</label>
                        <input type="text" name="amount" value="{{ old('amount') }}" placeholder="e.g. 2,000 USD" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                        <span class="text-xs text-gray-400 mt-1 block">{{ app()->getLocale() == 'ar' ? 'يمكنك كتابته كأرقام أو نص مع العملة.' : 'Can be entered as numbers or text with currency.' }}</span>
                    </div>

                    <!-- Custom Icon override -->
                    <div>
                        <label class="block text-sm font-semibold mb-1 text-gray-600">{{ app()->getLocale() == 'ar' ? 'أيقونة مخصصة (اختياري)' : 'Custom Icon (Optional)' }}</label>
                        <input type="text" name="icon" value="{{ old('icon') }}" placeholder="e.g. fas fa-tint" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                        <span class="text-xs text-gray-400 mt-1 block">
                            {{ app()->getLocale() == 'ar' ? 'اتركها فارغة لترث أيقونة المشروع الأساسية. مثل: fas fa-tint' : 'Leave empty to inherit project default icon. e.g. fas fa-tint' }}
                        </span>
                    </div>
                </div>

                <div class="bg-blue-50 border border-blue-100 p-4 rounded-lg flex gap-3 text-sm text-blue-800">
                    <i class="fas fa-info-circle text-lg mt-0.5 text-blue-500"></i>
                    <div>
                        <span class="font-bold">{{ app()->getLocale() == 'ar' ? 'ملاحظة:' : 'Note:' }}</span>
                        {{ app()->getLocale() == 'ar' ? 'تأكد من تعبئة البيانات باللغتين العربية والإنجليزية لضمان عرضها بشكل صحيح للمتصفحين.' : 'Ensure you fill both Arabic and English forms to support full localized rendering on the public site.' }}
                    </div>
                </div>

                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3.5 px-6 rounded-xl shadow-md hover:shadow-lg transition flex justify-center items-center gap-2">
                    <i class="fas fa-save"></i>
                    <span>{{ app()->getLocale() == 'ar' ? 'حفظ النشاط والعودة' : 'Save Activity' }}</span>
                </button>
            </div>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
function switchLanguageTab(locale) {
    // Hide all contents
    document.querySelectorAll('.lang-content').forEach(el => el.classList.add('hidden'));
    
    // Show selected content
    document.getElementById('content-' + locale).classList.remove('hidden');
    
    // Remove active styles from all tabs
    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.classList.remove('border-blue-500', 'text-blue-600');
        btn.classList.add('border-transparent', 'text-gray-500');
    });
    
    // Add active styles to clicked tab
    const activeBtn = document.getElementById('tab-btn-' + locale);
    activeBtn.classList.remove('border-transparent', 'text-gray-500');
    activeBtn.classList.add('border-blue-500', 'text-blue-600');
}

// Custom Tab-Aware JS Form Validation
document.querySelector('form').addEventListener('submit', function(e) {
    let isValid = true;
    
    // Check Arabic required fields
    const arFields = [
        { name: 'title[ar]', label: 'عنوان النشاط (Arabic Title)', tab: 'ar' },
        { name: 'description[ar]', label: 'الوصف الرئيسي للنشاط (Arabic Description)', tab: 'ar' },
        { name: 'location[ar]', label: 'الموقع / المركز (Arabic Location)', tab: 'ar' },
        { name: 'date[ar]', label: 'التاريخ / الفترة الزمنية (Arabic Date)', tab: 'ar' },
        { name: 'funded_by[ar]', label: 'الجهة الممولة (Arabic Funded By)', tab: 'ar' }
    ];
    
    // Check English required fields
    const enFields = [
        { name: 'title[en]', label: 'Activity Title', tab: 'en' },
        { name: 'description[en]', label: 'Activity Description', tab: 'en' },
        { name: 'location[en]', label: 'Location / Center', tab: 'en' },
        { name: 'date[en]', label: 'Date / Period', tab: 'en' },
        { name: 'funded_by[en]', label: 'Funded By', tab: 'en' }
    ];
    
    const allFields = [...arFields, ...enFields];
    
    for (let field of allFields) {
        const el = document.querySelector(`[name="${field.name}"]`);
        if (el && !el.value.trim()) {
            e.preventDefault();
            isValid = false;
            
            // Switch to the correct tab first
            switchLanguageTab(field.tab);
            
            // Focus the element and show styled validation error
            el.focus();
            el.classList.add('border-red-500', 'ring-2', 'ring-red-100');
            
            alert(
                field.tab === 'ar' 
                ? `يرجى ملء الحقل المطلوب: ${field.label}` 
                : `Please fill out the required field: ${field.label}`
            );
            
            // Remove red highlight when user types
            el.addEventListener('input', function() {
                el.classList.remove('border-red-500', 'ring-2', 'ring-red-100');
            }, { once: true });
            
            break;
        }
    }
});
</script>
@endpush
