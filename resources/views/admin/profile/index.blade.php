@extends('admin.layouts.app')

@section('title', app()->getLocale() == 'ar' ? 'إدارة الملف المؤسسي للمنظمة' : 'Institutional Profile Management')
@section('header', app()->getLocale() == 'ar' ? 'إدارة الملف المؤسسي للمنظمة' : 'Institutional Profile Management')

@section('content')
<div class="w-full px-4 sm:px-6 lg:px-8 py-6">
    
    <!-- Header Summary Card -->
    <div class="bg-gradient-to-r from-blue-800 to-indigo-900 rounded-2xl p-6 md:p-8 text-white shadow-lg mb-8 relative overflow-hidden">
        <div class="absolute right-0 top-0 opacity-10 transform translate-x-12 -translate-y-6">
            <i class="fas fa-file-invoice text-[200px]"></i>
        </div>
        <div class="relative z-10 flex flex-col md:flex-row md:items-center md:justify-between gap-6">
            <div>
                <span class="bg-blue-500/30 text-blue-200 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">
                    {{ app()->getLocale() == 'ar' ? 'لوحة إدارة المحتوى الديناميكي' : 'Dynamic CMS Control Panel' }}
                </span>
                <h1 class="text-2xl md:text-3xl font-extrabold mt-2 Cairo tracking-tight">
                    {{ app()->getLocale() == 'ar' ? 'إدارة الملف المؤسسي للمنظمة (MAO)' : 'Manage Institutional Profile (MAO)' }}
                </h1>
                <p class="text-blue-100 text-sm md:text-base mt-2 max-w-2xl leading-relaxed">
                    {{ app()->getLocale() == 'ar' ? 'تحكم كامل وبصورة واسعة وسهلة في جميع الأقسام، العناوين، البطاقات، التقييمات، وجهات الاتصال باللغتين العربية والإنجليزية.' : 'Complete, spacious, and intuitive control over all sections, headings, cards, progress bars, and contact details in both Arabic & English.' }}
                </p>
            </div>
            <a href="{{ route('organization.profile') }}" target="_blank" class="inline-flex items-center justify-center bg-white text-blue-900 hover:bg-blue-50 px-6 py-3.5 rounded-xl font-bold transition shadow-md hover:shadow-lg self-start md:self-auto">
                <i class="fas fa-external-link-alt mr-2 ml-2"></i>
                {{ app()->getLocale() == 'ar' ? 'عرض الصفحة الحالية للموقع' : 'View Profile Page' }}
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-emerald-50 border-l-4 border-emerald-500 p-4 rounded-xl flex items-center justify-between shadow-sm mb-6">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center text-lg">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div>
                    <h4 class="font-bold text-emerald-900 text-sm">{{ app()->getLocale() == 'ar' ? 'تمت العملية بنجاح' : 'Success' }}</h4>
                    <p class="text-emerald-700 text-xs mt-0.5 font-medium">{{ session('success') }}</p>
                </div>
            </div>
        </div>
    @endif

    <!-- Main Container Card -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        
        <!-- 10 Grouped Tabs Selector (Spacious Top Horizontal Grid) -->
        <div class="border-b border-gray-100 bg-gray-50/50 p-4 md:p-6">
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-3">
                
                @php
                    $tabs = [
                        'hero' => ['icon' => 'fas fa-image', 'label_ar' => 'واجهة الهيرو', 'label_en' => 'Hero Section', 'sub_ar' => 'العنوان الرئيسي والـ 3 بطاقات', 'sub_en' => 'Title & 3 badges'],
                        'objectives' => ['icon' => 'fas fa-hand-holding-heart', 'label_ar' => 'الأهداف الاستراتيجية', 'label_en' => 'Objectives', 'sub_ar' => 'رؤية المنظمة وأهدافها المستقبلية', 'sub_en' => 'Future plans & objectives'],
                        'timeline' => ['icon' => 'fas fa-history', 'label_ar' => 'الخط الزمني والتأسيس', 'label_en' => 'History Timeline', 'sub_ar' => 'أحداث التأسيس وتاريخ التطور', 'sub_en' => 'History events timeline'],
                        'journey' => ['icon' => 'fas fa-globe-africa', 'label_ar' => 'رحلة النمو والتجارب', 'label_en' => 'Experiences', 'sub_ar' => 'التجارب الإيجابية والتحديات الميدانية', 'sub_en' => 'Positive & challenges steps'],
                        'capacity' => ['icon' => 'fas fa-chart-line', 'label_ar' => 'التقييم والقدرات', 'label_en' => 'Capacity', 'sub_ar' => 'مؤشرات القدرة الداخلية والخارجية', 'sub_en' => 'Internal & external bars'],
                        'snapshot' => ['icon' => 'fas fa-file-signature', 'label_ar' => 'الملف بالأرقام', 'label_en' => 'Snapshot Stats', 'sub_ar' => 'أعداد الموظفين والمستفيدين والتغطية', 'sub_en' => 'Stat digits & snapshot cards'],
                        'swot' => ['icon' => 'fas fa-dumbbell', 'label_ar' => 'التحليل الرباعي SWOT', 'label_en' => 'SWOT Matrix', 'sub_ar' => 'نقاط القوة، الضعف، الفرص والاحتياجات', 'sub_en' => 'Strengths & capacity needs'],
                        'methodology' => ['icon' => 'fas fa-cogs', 'label_ar' => 'منهجيات العمل', 'label_en' => 'Methodologies', 'sub_ar' => 'المنح، آلية المراقبة والقضايا المشتركة', 'sub_en' => 'Grants support & M&E framework'],
                        'serve' => ['icon' => 'fas fa-handshake', 'label_ar' => 'الفئات المستهدفة', 'label_en' => 'Who We Serve', 'sub_ar' => 'المستفيدون والفئات المجتمعية', 'sub_en' => 'Target groups & community'],
                        'contact' => ['icon' => 'fas fa-user-tie', 'label_ar' => 'جهة الاتصال الرسمية', 'label_en' => 'Contact Person', 'sub_ar' => 'المسؤول، البريد، الهاتف والمنصب', 'sub_en' => 'Officer details & email'],
                    ];
                @endphp

                @foreach($tabs as $tabKey => $tab)
                <button type="button" onclick="switchProfileTab('{{ $tabKey }}')" id="tab-btn-{{ $tabKey }}" class="tab-btn p-3.5 rounded-xl border text-left ltr:text-left rtl:text-right transition-all flex flex-col md:flex-row items-center md:items-start gap-3 hover:shadow-md {{ $loop->first ? 'bg-blue-600 text-white border-blue-600 shadow-md shadow-blue-500/10' : 'bg-white text-gray-700 border-gray-200' }}">
                    <div class="w-10 h-10 rounded-xl flex items-center justify-center text-lg flex-shrink-0 {{ $loop->first ? 'bg-white/20 text-white' : 'bg-blue-50/50 text-blue-600' }} icon-box">
                        <i class="{{ $tab['icon'] }}"></i>
                    </div>
                    <div class="text-center md:text-left ltr:text-left rtl:text-right overflow-hidden w-full">
                        <h4 class="font-bold text-xs md:text-sm tracking-tight truncate title-text {{ $loop->first ? 'text-white' : 'text-gray-800' }}">
                            {{ app()->getLocale() == 'ar' ? $tab['label_ar'] : $tab['label_en'] }}
                        </h4>
                        <p class="text-[10px] truncate mt-0.5 desc-text {{ $loop->first ? 'text-blue-100' : 'text-gray-400' }} hidden sm:block">
                            {{ app()->getLocale() == 'ar' ? $tab['sub_ar'] : $tab['sub_en'] }}
                        </p>
                    </div>
                </button>
                @endforeach

            </div>
        </div>

        <!-- Form for saving Settings -->
        <form action="{{ route('admin.profile.update_settings') }}" method="POST" enctype="multipart/form-data" class="p-6 md:p-8 space-y-12">
            @csrf

            <!-- ========================================== -->
            <!-- TAB 1: HERO SECTION -->
            <!-- ========================================== -->
            <div id="tab-content-hero" class="tab-pane space-y-8">
                
                <div class="bg-gray-50/50 p-6 rounded-2xl border border-gray-100 space-y-6">
                    <div class="flex items-center gap-3 border-b border-gray-150 pb-3">
                        <div class="w-10 h-10 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center text-lg"><i class="fas fa-image"></i></div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-800">{{ app()->getLocale() == 'ar' ? 'قسم واجهة الصفحة (Hero Section)' : 'Hero Header Settings' }}</h3>
                            <p class="text-xs text-gray-400 mt-0.5">{{ app()->getLocale() == 'ar' ? 'تعديل العناوين الفرعية والرئيسية لواجهة الصفحة التعريفية.' : 'Modify the primary headers and subtexts on the landing hero section.' }}</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="block text-sm font-bold text-gray-700">العنوان الرئيسي للواجهة (عربي)</label>
                            <input type="text" name="hero_title_ar" value="{{ $setting->hero_title_ar }}" class="w-full p-3.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all font-medium text-gray-800 text-base" dir="rtl">
                        </div>
                        <div class="space-y-2">
                            <label class="block text-sm font-bold text-gray-700">Hero Main Title (English)</label>
                            <input type="text" name="hero_title_en" value="{{ $setting->hero_title_en }}" class="w-full p-3.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all font-medium text-gray-800 text-base" dir="ltr">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="block text-sm font-bold text-gray-700">العنوان الفرعي للواجهة (عربي)</label>
                            <textarea name="hero_subtitle_ar" rows="4" class="w-full p-3.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all font-medium text-gray-800 text-base leading-relaxed" dir="rtl">{{ $setting->hero_subtitle_ar }}</textarea>
                        </div>
                        <div class="space-y-2">
                            <label class="block text-sm font-bold text-gray-700">Hero Subtitle (English)</label>
                            <textarea name="hero_subtitle_en" rows="4" class="w-full p-3.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all font-medium text-gray-800 text-base leading-relaxed" dir="ltr">{{ $setting->hero_subtitle_en }}</textarea>
                        </div>
                    </div>

                    <!-- Hero Pills (3 stats badges) -->
                    <div class="border-t border-gray-150 pt-6">
                        <h4 class="font-bold text-base text-gray-800 mb-4 flex items-center gap-2">
                            <i class="fas fa-tags text-orange-500"></i>
                            {{ app()->getLocale() == 'ar' ? 'البطاقات الثلاث للواجهة العليا (Pills)' : 'Top Header Pills (Stats)' }}
                        </h4>
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                            
                            <!-- Pill 1 -->
                            <div class="bg-white p-5 rounded-xl border border-gray-200/80 space-y-4 shadow-sm">
                                <span class="bg-orange-50 text-orange-600 text-xs font-extrabold px-3 py-1 rounded-full uppercase tracking-wider">
                                    {{ app()->getLocale() == 'ar' ? 'البطاقة 1 (تاريخ التأسيس)' : 'Pill 1 (Founded Date)' }}
                                </span>
                                <div class="space-y-2.5">
                                    <input type="text" name="hero_pill1_icon" value="{{ $setting->hero_pill1_icon ?? 'fas fa-calendar-alt' }}" placeholder="Icon e.g. fas fa-calendar-alt" class="w-full p-3 rounded-lg border text-sm font-semibold">
                                    <input type="text" name="hero_pill1_text_ar" value="{{ $setting->hero_pill1_text_ar }}" placeholder="النص بالكامل (عربي)" class="w-full p-3 rounded-lg border text-sm" dir="rtl">
                                    <input type="text" name="hero_pill1_text_en" value="{{ $setting->hero_pill1_text_en }}" placeholder="Pill Text (EN)" class="w-full p-3 rounded-lg border text-sm" dir="ltr">
                                </div>
                            </div>

                            <!-- Pill 2 -->
                            <div class="bg-white p-5 rounded-xl border border-gray-200/80 space-y-4 shadow-sm">
                                <span class="bg-blue-50 text-blue-600 text-xs font-extrabold px-3 py-1 rounded-full uppercase tracking-wider">
                                    {{ app()->getLocale() == 'ar' ? 'البطاقة 2 (التسجيل والتغطية)' : 'Pill 2 (Registration)' }}
                                </span>
                                <div class="space-y-2.5">
                                    <input type="text" name="hero_pill2_icon" value="{{ $setting->hero_pill2_icon ?? 'fas fa-globe-africa' }}" placeholder="Icon e.g. fas fa-globe-africa" class="w-full p-3 rounded-lg border text-sm font-semibold">
                                    <input type="text" name="hero_pill2_text_ar" value="{{ $setting->hero_pill2_text_ar }}" placeholder="النص بالكامل (عربي)" class="w-full p-3 rounded-lg border text-sm" dir="rtl">
                                    <input type="text" name="hero_pill2_text_en" value="{{ $setting->hero_pill2_text_en }}" placeholder="Pill Text (EN)" class="w-full p-3 rounded-lg border text-sm" dir="ltr">
                                </div>
                            </div>

                            <!-- Pill 3 -->
                            <div class="bg-white p-5 rounded-xl border border-gray-200/80 space-y-4 shadow-sm">
                                <span class="bg-emerald-50 text-emerald-600 text-xs font-extrabold px-3 py-1 rounded-full uppercase tracking-wider">
                                    {{ app()->getLocale() == 'ar' ? 'البطاقة 3 (أرقام الموظفين)' : 'Pill 3 (Staff Count)' }}
                                </span>
                                <div class="space-y-2.5">
                                    <input type="text" name="hero_pill3_icon" value="{{ $setting->hero_pill3_icon ?? 'fas fa-users' }}" placeholder="Icon e.g. fas fa-users" class="w-full p-3 rounded-lg border text-sm font-semibold">
                                    <input type="text" name="hero_pill3_text_ar" value="{{ $setting->hero_pill3_text_ar }}" placeholder="النص بالكامل (عربي)" class="w-full p-3 rounded-lg border text-sm" dir="rtl">
                                    <input type="text" name="hero_pill3_text_en" value="{{ $setting->hero_pill3_text_en }}" placeholder="Pill Text (EN)" class="w-full p-3 rounded-lg border text-sm" dir="ltr">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- ========================================== -->
            <!-- TAB 2: OBJECTIVES -->
            <!-- ========================================== -->
            <div id="tab-content-objectives" class="tab-pane hidden space-y-8">
                
                <div class="bg-gray-50/50 p-6 rounded-2xl border border-gray-100 space-y-6">
                    <div class="flex items-center justify-between border-b border-gray-150 pb-3">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center text-lg"><i class="fas fa-hand-holding-heart"></i></div>
                            <div>
                                <h3 class="text-lg font-bold text-gray-800">{{ app()->getLocale() == 'ar' ? 'الأهداف الاستراتيجية' : 'Strategic Objectives Section' }}</h3>
                                <p class="text-xs text-gray-400 mt-0.5">{{ app()->getLocale() == 'ar' ? 'إضافة وتعديل الأهداف الاستراتيجية للمنظمة وقيمها.' : 'Configure the organizational objectives and target values.' }}</p>
                            </div>
                        </div>
                        <button type="button" onclick="openAddItemModal('objective')" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-xl text-sm font-bold transition flex items-center gap-2 shadow-md hover:shadow-lg">
                            <i class="fas fa-plus"></i> {{ app()->getLocale() == 'ar' ? 'إضافة هدف جديد' : 'Add Strategic Objective' }}
                        </button>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="block text-sm font-bold text-gray-700">عنوان قسم الأهداف (عربي)</label>
                            <input type="text" name="objectives_title_ar" value="{{ $setting->objectives_title_ar }}" class="w-full p-3.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500/20" dir="rtl">
                        </div>
                        <div class="space-y-2">
                            <label class="block text-sm font-bold text-gray-700">Objectives Section Title (English)</label>
                            <input type="text" name="objectives_title_en" value="{{ $setting->objectives_title_en }}" class="w-full p-3.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500/20" dir="ltr">
                        </div>
                    </div>

                    <!-- Spacious Grid for Objectives (Replaces old cramped tables) -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4">
                        @isset($items['objective'])
                            @foreach($items['objective'] as $item)
                            <div class="bg-white p-6 rounded-2xl border border-gray-200/80 shadow-sm flex items-start justify-between gap-4 hover:shadow-md transition">
                                <div class="flex gap-4">
                                    <div class="w-12 h-12 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center text-xl flex-shrink-0">
                                        <i class="{{ $item->icon ?? 'fas fa-hand-holding-heart' }}"></i>
                                    </div>
                                    <div class="space-y-1">
                                        <span class="text-xs font-bold bg-blue-50 text-blue-700 px-2.5 py-1 rounded-full uppercase">
                                            {{ app()->getLocale() == 'ar' ? 'ترتيب: ' . $item->sort_order : 'Sort Order: ' . $item->sort_order }}
                                        </span>
                                        <p class="text-sm font-medium text-gray-800 mt-2" dir="ltr">{{ $item->value_en }}</p>
                                        <p class="text-sm font-medium text-gray-600 mt-1.5 leading-relaxed" dir="rtl">{{ $item->value_ar }}</p>
                                    </div>
                                </div>
                                <div class="flex flex-col gap-2 flex-shrink-0">
                                    <button type="button" onclick="editItem({{ json_encode($item) }})" class="w-8 h-8 bg-blue-50 hover:bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center text-sm transition" title="Edit"><i class="fas fa-edit"></i></button>
                                    <button type="button" onclick="confirmDeleteItem({{ $item->id }})" class="w-8 h-8 bg-red-50 hover:bg-red-100 text-red-600 rounded-xl flex items-center justify-center text-sm transition" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <div class="col-span-full py-8 text-center text-gray-400 text-base">لا يوجد أهداف استراتيجية مضافة حالياً.</div>
                        @endisset
                    </div>
                </div>
            </div>

            <!-- ========================================== -->
            <!-- TAB 3: TIMELINE -->
            <!-- ========================================== -->
            <div id="tab-content-timeline" class="tab-pane hidden space-y-8">
                
                <div class="bg-gray-50/50 p-6 rounded-2xl border border-gray-100 space-y-6">
                    <div class="flex items-center justify-between border-b border-gray-150 pb-3">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center text-lg"><i class="fas fa-history"></i></div>
                            <div>
                                <h3 class="text-lg font-bold text-gray-800">{{ app()->getLocale() == 'ar' ? 'الخط الزمني للتاريخ والتأسيس' : 'History & Timeline Events' }}</h3>
                                <p class="text-xs text-gray-400 mt-0.5">{{ app()->getLocale() == 'ar' ? 'إدارة الخط الزمني والتواريخ المفصلية لتاريخ المنظمة.' : 'Control major historical milestones and foundation timelines.' }}</p>
                            </div>
                        </div>
                        <button type="button" onclick="openAddItemModal('timeline')" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-xl text-sm font-bold transition flex items-center gap-2 shadow-md hover:shadow-lg">
                            <i class="fas fa-plus"></i> {{ app()->getLocale() == 'ar' ? 'إضافة حدث زمني جديد' : 'Add Timeline Event' }}
                        </button>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="block text-sm font-bold text-gray-700">عنوان قسم التاريخ (عربي)</label>
                            <input type="text" name="timeline_title_ar" value="{{ $setting->timeline_title_ar }}" class="w-full p-3.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500/20" dir="rtl">
                        </div>
                        <div class="space-y-2">
                            <label class="block text-sm font-bold text-gray-700">History Section Title (English)</label>
                            <input type="text" name="timeline_title_en" value="{{ $setting->timeline_title_en }}" class="w-full p-3.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500/20" dir="ltr">
                        </div>
                    </div>

                    <!-- Chronological Milestones Layout (Replaces old cramped tables) -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 pt-4">
                        @isset($items['timeline'])
                            @foreach($items['timeline'] as $item)
                            <div class="bg-white p-6 rounded-2xl border border-gray-200/80 shadow-sm flex items-start justify-between gap-4 relative overflow-hidden hover:shadow-md transition">
                                <div class="absolute top-0 left-0 w-2 h-full bg-blue-600"></div>
                                <div class="flex flex-col gap-1.5 pl-2">
                                    <div class="flex items-center gap-2">
                                        <span class="text-xs font-bold bg-blue-50 text-blue-700 px-3 py-1 rounded-full">{{ $item->extra_value_en }}</span>
                                        <span class="text-xs font-bold text-gray-400" dir="rtl">{{ $item->extra_value_ar }}</span>
                                    </div>
                                    <h5 class="font-bold text-base text-gray-800 mt-2">{{ $item->title_en }}</h5>
                                    <p class="text-sm text-gray-500 font-semibold mt-1" dir="rtl">{{ $item->title_ar }}</p>
                                </div>
                                <div class="flex flex-col gap-2 flex-shrink-0">
                                    <button type="button" onclick="editItem({{ json_encode($item) }})" class="w-8 h-8 bg-blue-50 hover:bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center text-sm transition" title="Edit"><i class="fas fa-edit"></i></button>
                                    <button type="button" onclick="confirmDeleteItem({{ $item->id }})" class="w-8 h-8 bg-red-50 hover:bg-red-100 text-red-600 rounded-xl flex items-center justify-center text-sm transition" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <div class="col-span-full py-8 text-center text-gray-400 text-base">لا يوجد أحداث تاريخية مضافة حالياً.</div>
                        @endisset
                    </div>
                </div>
            </div>

            <!-- ========================================== -->
            <!-- TAB 4: EXPERIENCES (JOURNEY) -->
            <!-- ========================================== -->
            <div id="tab-content-journey" class="tab-pane hidden space-y-8">
                
                <div class="bg-gray-50/50 p-6 rounded-2xl border border-gray-100 space-y-6">
                    <div class="flex items-center gap-3 border-b border-gray-150 pb-3">
                        <div class="w-10 h-10 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center text-lg"><i class="fas fa-globe-africa"></i></div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-800">{{ app()->getLocale() == 'ar' ? 'رحلة النمو والتجارب الإيجابية والسلبية' : 'Journey Experiences & Growth' }}</h3>
                            <p class="text-xs text-gray-400 mt-0.5">{{ app()->getLocale() == 'ar' ? 'تعديل وتحرير التجارب الإيجابية والتحديات الميدانية للمنظمة.' : 'Control the positive growth events and field challenges encountered.' }}</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="block text-sm font-bold text-gray-700">العنوان الفوقي للقسم (عربي)</label>
                            <input type="text" name="journey_title_ar" value="{{ $setting->journey_title_ar }}" class="w-full p-3.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500/20" dir="rtl">
                        </div>
                        <div class="space-y-2">
                            <label class="block text-sm font-bold text-gray-700">Section Subtitle (English)</label>
                            <input type="text" name="journey_title_en" value="{{ $setting->journey_title_en }}" class="w-full p-3.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500/20" dir="ltr">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="block text-sm font-bold text-gray-700">العنوان الرئيسي للقسم (عربي)</label>
                            <input type="text" name="journey_pos_title_ar" value="{{ $setting->journey_pos_title_ar }}" class="w-full p-3.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500/20" dir="rtl">
                        </div>
                        <div class="space-y-2">
                            <label class="block text-sm font-bold text-gray-700">Section Main Title (English)</label>
                            <input type="text" name="journey_pos_title_en" value="{{ $setting->journey_pos_title_en }}" class="w-full p-3.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500/20" dir="ltr">
                        </div>
                    </div>

                    <!-- Spacious Grid for positive and negative experiences panel -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 pt-4">
                        
                        <!-- Positive Experience Card (Full Width, Spacious) -->
                        <div class="bg-white p-6 rounded-2xl border-2 border-emerald-150 space-y-6 shadow-sm">
                            <div class="border-b border-gray-100 pb-3">
                                <h4 class="font-bold text-base text-emerald-800 flex items-center gap-2">
                                    <i class="fas fa-seedling text-lg"></i>
                                    {{ app()->getLocale() == 'ar' ? 'التجارب الإيجابية' : 'Positive Experience' }}
                                </h4>
                            </div>
                            
                            <div class="space-y-4">
                                <div class="space-y-2">
                                    <label class="block text-sm font-bold text-emerald-700">شرح التجارب الإيجابية (عربي)</label>
                                    <textarea name="journey_pos_desc_ar" rows="8" placeholder="شرح التجارب الإيجابية..." class="w-full p-4 rounded-xl border border-gray-300 focus:ring-2 focus:ring-emerald-500/20 text-base" dir="rtl">{{ $setting->journey_pos_desc_ar }}</textarea>
                                    <p class="text-xs text-gray-400 mt-1">يمكنك كتابة النص بالكامل، واستخدام الأسطر الجديدة أو النقاط (•) لتقسيم النص بحرية.</p>
                                </div>
                                <div class="space-y-2">
                                    <label class="block text-sm font-bold text-emerald-700">Positive Experience Description (English)</label>
                                    <textarea name="journey_pos_desc_en" rows="8" placeholder="Positive Experience description..." class="w-full p-4 rounded-xl border border-gray-300 focus:ring-2 focus:ring-emerald-500/20 text-base" dir="ltr">{{ $setting->journey_pos_desc_en }}</textarea>
                                    <p class="text-xs text-gray-400 mt-1">Write your complete text here. Line breaks and bullet points are preserved naturally.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Challenges/Negative Experience Card (Full Width, Spacious) -->
                        <div class="bg-white p-6 rounded-2xl border-2 border-orange-150 space-y-6 shadow-sm">
                            <div class="border-b border-gray-100 pb-3">
                                <h4 class="font-bold text-base text-orange-800 flex items-center gap-2">
                                    <i class="fas fa-shield-alt text-lg"></i>
                                    {{ $setting->{'journey_neg_title_' . app()->getLocale()} }}
                                </h4>
                            </div>

                            <div class="space-y-4">
                                <div class="space-y-2">
                                    <label class="block text-sm font-bold text-orange-700">شرح التحديات والتجارب السلبية (عربي)</label>
                                    <textarea name="journey_neg_desc_ar" rows="8" placeholder="شرح التحديات..." class="w-full p-4 rounded-xl border border-gray-300 focus:ring-2 focus:ring-orange-500/20 text-base" dir="rtl">{{ $setting->journey_neg_desc_ar }}</textarea>
                                    <p class="text-xs text-gray-400 mt-1">اكتب التحديات بالكامل هنا. سيتم حفظ الأسطر الجديدة والنقاط وعرضها تلقائياً.</p>
                                </div>
                                <div class="space-y-2">
                                    <label class="block text-sm font-bold text-orange-700">Challenges & Negative Experience (English)</label>
                                    <textarea name="journey_neg_desc_en" rows="8" placeholder="Challenges description..." class="w-full p-4 rounded-xl border border-gray-300 focus:ring-2 focus:ring-orange-500/20 text-base" dir="ltr">{{ $setting->journey_neg_desc_en }}</textarea>
                                    <p class="text-xs text-gray-400 mt-1">Write your challenges text here. Line breaks are preserved and formatted perfectly.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- ========================================== -->
            <!-- TAB 5: CAPACITY ASSESSMENT -->
            <!-- ========================================== -->
            <div id="tab-content-capacity" class="tab-pane hidden space-y-8">
                
                <div class="bg-gray-50/50 p-6 rounded-2xl border border-gray-100 space-y-6">
                    <div class="flex items-center gap-3 border-b border-gray-150 pb-3">
                        <div class="w-10 h-10 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center text-lg"><i class="fas fa-chart-line"></i></div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-800">{{ app()->getLocale() == 'ar' ? 'التقييم المؤسسي والبيئة التشغيلية (أشرطة التقدم)' : 'Organizational Capacity & Progress Bars' }}</h3>
                            <p class="text-xs text-gray-400 mt-0.5">{{ app()->getLocale() == 'ar' ? 'تحديد النسب المئوية للتقييم الداخلي للمنظمة والبيئة التشغيلية الخارجية.' : 'Specify percentages for the internal capabilities and operational environments.' }}</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="block text-sm font-bold text-gray-700">عنوان قسم التقييم العام (عربي)</label>
                            <input type="text" name="capacity_title_ar" value="{{ $setting->capacity_title_ar }}" class="w-full p-3.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500/20" dir="rtl">
                        </div>
                        <div class="space-y-2">
                            <label class="block text-sm font-bold text-gray-700">Section Main Title (English)</label>
                            <input type="text" name="capacity_title_en" value="{{ $setting->capacity_title_en }}" class="w-full p-3.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500/20" dir="ltr">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="block text-sm font-bold text-gray-700">العنوان الفرعي لقسم التقييم (عربي)</label>
                            <input type="text" name="capacity_subtitle_ar" value="{{ $setting->capacity_subtitle_ar }}" class="w-full p-3.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500/20" dir="rtl">
                        </div>
                        <div class="space-y-2">
                            <label class="block text-sm font-bold text-gray-700">Section Subtitle (English)</label>
                            <input type="text" name="capacity_subtitle_en" value="{{ $setting->capacity_subtitle_en }}" class="w-full p-3.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500/20" dir="ltr">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="block text-sm font-bold text-gray-700">شرح قسم التقييم (عربي)</label>
                            <textarea name="capacity_desc_ar" rows="3" class="w-full p-3.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500/20 text-base" dir="rtl">{{ $setting->capacity_desc_ar }}</textarea>
                        </div>
                        <div class="space-y-2">
                            <label class="block text-sm font-bold text-gray-700">Section Description (English)</label>
                            <textarea name="capacity_desc_en" rows="3" class="w-full p-3.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500/20 text-base" dir="ltr">{{ $setting->capacity_desc_en }}</textarea>
                        </div>
                    </div>

                    <!-- Spacious columns for progress bars lists -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 pt-4">
                        
                        <!-- Column 1: Internal Progress bars -->
                        <div class="bg-white p-6 rounded-2xl border border-gray-200/80 space-y-4 shadow-sm">
                            <div class="flex justify-between items-center border-b border-gray-100 pb-3">
                                <h4 class="font-bold text-base text-gray-800 flex items-center gap-2"><i class="fas fa-building text-green-600"></i> {{ app()->getLocale() == 'ar' ? 'مؤشرات القدرات الداخلية' : 'Internal Capacities List' }}</h4>
                                <button type="button" onclick="openAddItemModal('capacity_internal')" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-xl text-xs font-bold transition flex items-center gap-1 shadow-sm">
                                    <i class="fas fa-plus"></i> {{ app()->getLocale() == 'ar' ? 'إضافة مؤشر داخلي' : 'Add Bar' }}
                                </button>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <input type="text" name="capacity_internal_title_ar" value="{{ $setting->capacity_internal_title_ar }}" placeholder="عنوان العمود (عربي)" class="p-3 rounded-xl text-sm border w-full">
                                <input type="text" name="capacity_internal_title_en" value="{{ $setting->capacity_internal_title_en }}" placeholder="Column Title (EN)" class="p-3 rounded-xl text-sm border w-full">
                            </div>
                            <div class="space-y-4 pt-2">
                                @isset($items['capacity_internal'])
                                    @foreach($items['capacity_internal'] as $bar)
                                    <div class="bg-gray-50 p-5 rounded-2xl border border-gray-150 flex justify-between items-center gap-4 hover:shadow-sm transition">
                                        <div class="flex-1">
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-center gap-2">
                                                    <i class="{{ $bar->icon }} text-green-600 text-base"></i>
                                                    <span class="font-bold text-sm text-gray-800">{{ $bar->title_en }}</span>
                                                </div>
                                                <span class="font-extrabold text-sm text-green-700">{{ $bar->number_value }}%</span>
                                            </div>
                                            <div class="w-full bg-gray-200 h-2.5 rounded-full mt-3 overflow-hidden shadow-inner">
                                                <div class="bg-green-500 h-full rounded-full" style="width: {{ $bar->number_value }}%"></div>
                                            </div>
                                            <div class="flex justify-between items-center mt-2">
                                                <p class="text-xs text-gray-400" dir="rtl">{{ $bar->title_ar }}</p>
                                                <span class="text-[10px] bg-gray-150 text-gray-500 px-2 py-0.5 rounded">{{ $bar->extra_value_en }} / {{ $bar->extra_value_ar }}</span>
                                            </div>
                                        </div>
                                        <div class="flex flex-col gap-2 flex-shrink-0">
                                            <button type="button" onclick="editItem({{ json_encode($bar) }})" class="text-blue-600 hover:bg-blue-50 w-7 h-7 rounded flex items-center justify-center transition"><i class="fas fa-edit"></i></button>
                                            <button type="button" onclick="confirmDeleteItem({{ $bar->id }})" class="text-red-600 hover:bg-red-50 w-7 h-7 rounded flex items-center justify-center transition"><i class="fas fa-trash-alt"></i></button>
                                        </div>
                                    </div>
                                    @endforeach
                                @endisset
                            </div>
                        </div>

                        <!-- Column 2: External Progress bars -->
                        <div class="bg-white p-6 rounded-2xl border border-gray-200/80 space-y-4 shadow-sm">
                            <div class="flex justify-between items-center border-b border-gray-100 pb-3">
                                <h4 class="font-bold text-base text-gray-800 flex items-center gap-2"><i class="fas fa-globe-africa text-orange-600"></i> {{ app()->getLocale() == 'ar' ? 'مؤشرات البيئة الخارجية' : 'Operational Environment List' }}</h4>
                                <button type="button" onclick="openAddItemModal('capacity_external')" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-xl text-xs font-bold transition flex items-center gap-1 shadow-sm">
                                    <i class="fas fa-plus"></i> {{ app()->getLocale() == 'ar' ? 'إضافة مؤشر خارجي' : 'Add Bar' }}
                                </button>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <input type="text" name="capacity_external_title_ar" value="{{ $setting->capacity_external_title_ar }}" placeholder="عنوان العمود (عربي)" class="p-3 rounded-xl text-sm border w-full">
                                <input type="text" name="capacity_external_title_en" value="{{ $setting->capacity_external_title_en }}" placeholder="Column Title (EN)" class="p-3 rounded-xl text-sm border w-full">
                            </div>
                            <div class="space-y-4 pt-2">
                                @isset($items['capacity_external'])
                                    @foreach($items['capacity_external'] as $bar)
                                    <div class="bg-gray-50 p-5 rounded-2xl border border-gray-150 flex justify-between items-center gap-4 hover:shadow-sm transition">
                                        <div class="flex-1">
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-center gap-2">
                                                    <i class="{{ $bar->icon }} text-orange-600 text-base"></i>
                                                    <span class="font-bold text-sm text-gray-800">{{ $bar->title_en }}</span>
                                                </div>
                                                <span class="font-extrabold text-sm text-orange-700">{{ $bar->number_value }}%</span>
                                            </div>
                                            <div class="w-full bg-gray-200 h-2.5 rounded-full mt-3 overflow-hidden shadow-inner">
                                                <div class="bg-orange-500 h-full rounded-full" style="width: {{ $bar->number_value }}%"></div>
                                            </div>
                                            <div class="flex justify-between items-center mt-2">
                                                <p class="text-xs text-gray-400" dir="rtl">{{ $bar->title_ar }}</p>
                                                <span class="text-[10px] bg-gray-150 text-gray-500 px-2 py-0.5 rounded">{{ $bar->extra_value_en }} / {{ $bar->extra_value_ar }}</span>
                                            </div>
                                        </div>
                                        <div class="flex flex-col gap-2 flex-shrink-0">
                                            <button type="button" onclick="editItem({{ json_encode($bar) }})" class="text-blue-600 hover:bg-blue-50 w-7 h-7 rounded flex items-center justify-center transition"><i class="fas fa-edit"></i></button>
                                            <button type="button" onclick="confirmDeleteItem({{ $bar->id }})" class="text-red-600 hover:bg-red-50 w-7 h-7 rounded flex items-center justify-center transition"><i class="fas fa-trash-alt"></i></button>
                                        </div>
                                    </div>
                                    @endforeach
                                @endisset
                            </div>
                        </div>

                    </div>

                    <!-- Summary Card -->
                    <div class="bg-blue-50/50 p-6 rounded-2xl border border-blue-200/50 space-y-4">
                        <h4 class="font-bold text-base text-blue-900 flex items-center gap-2"><i class="fas fa-lightbulb"></i> {{ app()->getLocale() == 'ar' ? 'الملخص التنفيذي لقسم التقييم' : 'Executive Capacity Summary Box' }}</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="space-y-1">
                                <label class="block text-xs font-bold text-blue-800">عنوان الملخص (عربي)</label>
                                <input type="text" name="capacity_summary_title_ar" value="{{ $setting->capacity_summary_title_ar }}" class="w-full p-3 rounded-lg border text-sm" dir="rtl">
                            </div>
                            <div class="space-y-1">
                                <label class="block text-xs font-bold text-blue-800">Summary Title (English)</label>
                                <input type="text" name="capacity_summary_title_en" value="{{ $setting->capacity_summary_title_en }}" class="w-full p-3 rounded-lg border text-sm" dir="ltr">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="space-y-1">
                                <label class="block text-xs font-bold text-blue-800">شرح الملخص (عربي)</label>
                                <textarea name="capacity_summary_desc_ar" rows="3" class="w-full p-3 rounded-lg border text-sm" dir="rtl">{{ $setting->capacity_summary_desc_ar }}</textarea>
                            </div>
                            <div class="space-y-1">
                                <label class="block text-xs font-bold text-blue-800">Summary Description (English)</label>
                                <textarea name="capacity_summary_desc_en" rows="3" class="w-full p-3 rounded-lg border text-sm" dir="ltr">{{ $setting->capacity_summary_desc_en }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ========================================== -->
            <!-- TAB 6: INST SNAPSHOT -->
            <!-- ========================================== -->
            <div id="tab-content-snapshot" class="tab-pane hidden space-y-8">
                
                <div class="bg-gray-50/50 p-6 rounded-2xl border border-gray-100 space-y-6">
                    <div class="flex items-center justify-between border-b border-gray-150 pb-3">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center text-lg"><i class="fas fa-file-signature"></i></div>
                            <div>
                                <h3 class="text-lg font-bold text-gray-800">{{ app()->getLocale() == 'ar' ? 'الملف المؤسسي بالأرقام والإحصائيات (Snapshot)' : 'Institutional Snapshot & Statistics' }}</h3>
                                <p class="text-xs text-gray-400 mt-0.5">{{ app()->getLocale() == 'ar' ? 'تحرير بطاقات الإحصاءات العامة مثل أرقام الموظفين، التغطية والجهات.' : 'Edit key numerical statistics like staff members, geographic coverage, etc.' }}</p>
                            </div>
                        </div>
                        <button type="button" onclick="openAddItemModal('snapshot')" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-xl text-sm font-bold transition flex items-center gap-2 shadow-md hover:shadow-lg">
                            <i class="fas fa-plus"></i> {{ app()->getLocale() == 'ar' ? 'إضافة بطاقة رقمية جديدة' : 'Add Snapshot Card' }}
                        </button>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="block text-sm font-bold text-gray-700">عنوان قسم الإحصائيات (عربي)</label>
                            <input type="text" name="snapshot_title_ar" value="{{ $setting->snapshot_title_ar }}" class="w-full p-3.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500/20" dir="rtl">
                        </div>
                        <div class="space-y-2">
                            <label class="block text-sm font-bold text-gray-700">Snapshot Section Title (English)</label>
                            <input type="text" name="snapshot_title_en" value="{{ $setting->snapshot_title_en }}" class="w-full p-3.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500/20" dir="ltr">
                        </div>
                    </div>

                    <!-- Modern Snapshot Visual Cards Grid (No cramped tables) -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 pt-4">
                        @isset($items['snapshot'])
                            @foreach($items['snapshot'] as $item)
                            <div class="bg-white p-6 rounded-2xl border border-gray-200/80 shadow-sm flex items-start justify-between gap-4 hover:shadow-md transition">
                                <div class="flex gap-4">
                                    <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center text-xl flex-shrink-0">
                                        <i class="{{ $item->icon }}"></i>
                                    </div>
                                    <div class="space-y-1">
                                        <span class="text-sm font-extrabold text-blue-600 block">{{ $item->value_en }}</span>
                                        <h5 class="font-bold text-base text-gray-800 leading-tight">{{ $item->title_en }}</h5>
                                        <p class="text-xs text-gray-400 mt-2 font-semibold" dir="rtl">{{ $item->title_ar }}: <span class="font-bold text-gray-600 text-sm">{{ $item->value_ar }}</span></p>
                                    </div>
                                </div>
                                <div class="flex flex-col gap-2 flex-shrink-0">
                                    <button type="button" onclick="editItem({{ json_encode($item) }})" class="w-8 h-8 bg-blue-50 hover:bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center text-sm transition" title="Edit"><i class="fas fa-edit"></i></button>
                                    <button type="button" onclick="confirmDeleteItem({{ $item->id }})" class="w-8 h-8 bg-red-50 hover:bg-red-100 text-red-600 rounded-xl flex items-center justify-center text-sm transition" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <div class="col-span-full py-8 text-center text-gray-400 text-base">لا يوجد إحصائيات معروضة حالياً.</div>
                        @endisset
                    </div>
                </div>
            </div>

            <!-- ========================================== -->
            <!-- TAB 7: SWOT MATRIX (INLINE MULTI-EDIT) -->
            <!-- ========================================== -->
            <div id="tab-content-swot" class="tab-pane hidden space-y-8">
                
                <div class="bg-gray-50/50 p-6 rounded-2xl border border-gray-100 space-y-6">
                    <div class="flex items-center gap-3 border-b border-gray-150 pb-3">
                        <div class="w-10 h-10 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center text-lg"><i class="fas fa-dumbbell"></i></div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-800">{{ app()->getLocale() == 'ar' ? 'التحليل الرباعي وقدرات العمل (SWOT)' : 'SWOT Matrix Strengths, Weaknesses, Opportunities, Needs' }}</h3>
                            <p class="text-xs text-gray-400 mt-0.5">{{ app()->getLocale() == 'ar' ? 'تحرير العناوين والقوائم التفصيلية لعناصر القوة والضعف والفرص والاحتياجات مباشرة وحفظها دفعة واحدة.' : 'Edit titles and SWOT lists inline directly and save all of them at once.' }}</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="block text-sm font-bold text-gray-700">عنوان قسم التحليل الرباعي (عربي)</label>
                            <input type="text" name="swot_title_ar" value="{{ $setting->swot_title_ar }}" class="w-full p-3.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500/20" dir="rtl">
                        </div>
                        <div class="space-y-2">
                            <label class="block text-sm font-bold text-gray-700">SWOT Section Title (English)</label>
                            <input type="text" name="swot_title_en" value="{{ $setting->swot_title_en }}" class="w-full p-3.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500/20" dir="ltr">
                        </div>
                    </div>

                    <!-- SWOT Matrix 4 Large Spacious Panels Grid -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 pt-4">
                        
                        <!-- Strengths Card -->
                        <div class="bg-emerald-50/30 p-6 rounded-2xl border-2 border-emerald-150/70 space-y-5 shadow-sm">
                            <div class="flex justify-between items-center border-b border-emerald-100 pb-3">
                                <h4 class="font-bold text-base text-emerald-800 flex items-center gap-2">
                                    <div class="w-9 h-9 rounded-lg bg-emerald-100 text-emerald-700 flex items-center justify-center text-base"><i class="{{ $setting->swot_strengths_icon ?? 'fas fa-dumbbell' }}"></i></div>
                                    {{ app()->getLocale() == 'ar' ? 'نقاط القوة (Strengths)' : 'Strengths' }}
                                </h4>
                                <button type="button" onclick="addSwotItemInline('swot_strength')" class="bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-xl text-xs font-bold transition flex items-center gap-1 shadow-sm">
                                    <i class="fas fa-plus"></i> {{ app()->getLocale() == 'ar' ? 'إضافة نقطة قوة' : 'Add' }}
                                </button>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <input type="text" name="swot_strengths_title_ar" value="{{ $setting->swot_strengths_title_ar }}" placeholder="عنوان العمود (عربي)" class="p-3 rounded-xl border text-sm font-semibold w-full">
                                <input type="text" name="swot_strengths_title_en" value="{{ $setting->swot_strengths_title_en }}" placeholder="Column Title (EN)" class="p-3 rounded-xl border text-sm font-semibold w-full">
                            </div>
                            <input type="text" name="swot_strengths_icon" value="{{ $setting->swot_strengths_icon ?? 'fas fa-dumbbell' }}" placeholder="Strengths Icon FontAwesome" class="p-3 rounded-xl border text-xs w-full">
                            
                            <div class="space-y-3 bg-white p-4 rounded-xl border border-emerald-100 min-h-36 max-h-96 overflow-y-auto" id="swot_strength_container">
                                @isset($items['swot_strength'])
                                    @foreach($items['swot_strength'] as $index => $item)
                                    <div class="swot-item bg-gray-50 p-3 border border-emerald-100 rounded-xl space-y-2 relative group" data-type="swot_strength">
                                        <input type="hidden" name="swot_items[swot_strength][{{ $index }}][id]" value="{{ $item->id }}">
                                        <button type="button" onclick="deleteSwotItem({{ $item->id }}, this)" class="absolute top-2 right-2 text-red-500 hover:text-red-700 bg-red-50 hover:bg-red-100 w-6 h-6 rounded flex items-center justify-center transition-colors">
                                            <i class="fas fa-trash-alt text-xs"></i>
                                        </button>
                                        <div class="grid grid-cols-1 gap-2 pr-6">
                                            <div class="flex items-center gap-2">
                                                <span class="text-xs font-semibold text-gray-500 w-8">AR</span>
                                                <input type="text" name="swot_items[swot_strength][{{ $index }}][value_ar]" value="{{ $item->value_ar }}" required class="w-full p-2 border border-gray-300 bg-white rounded-lg text-xs focus:ring-1 focus:ring-emerald-500 focus:outline-none" dir="rtl">
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <span class="text-xs font-semibold text-gray-500 w-8">EN</span>
                                                <input type="text" name="swot_items[swot_strength][{{ $index }}][value_en]" value="{{ $item->value_en }}" required class="w-full p-2 border border-gray-300 bg-white rounded-lg text-xs focus:ring-1 focus:ring-emerald-500 focus:outline-none" dir="ltr">
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                @endisset
                            </div>
                        </div>

                        <!-- Main Weaknesses Card -->
                        <div class="bg-red-50/30 p-6 rounded-2xl border-2 border-red-150/70 space-y-5 shadow-sm">
                            <div class="flex justify-between items-center border-b border-red-100 pb-3">
                                <h4 class="font-bold text-base text-red-800 flex items-center gap-2">
                                    <div class="w-9 h-9 rounded-lg bg-red-100 text-red-700 flex items-center justify-center text-base"><i class="{{ $setting->swot_weaknesses_icon ?? 'fas fa-exclamation-triangle' }}"></i></div>
                                    {{ app()->getLocale() == 'ar' ? 'نقاط الضعف الرئيسية' : 'Main Weaknesses' }}
                                </h4>
                                <button type="button" onclick="addSwotItemInline('swot_weakness')" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-xl text-xs font-bold transition flex items-center gap-1 shadow-sm">
                                    <i class="fas fa-plus"></i> {{ app()->getLocale() == 'ar' ? 'إضافة ضعف' : 'Add' }}
                                </button>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <input type="text" name="swot_weaknesses_title_ar" value="{{ $setting->swot_weaknesses_title_ar }}" placeholder="عنوان العمود (عربي)" class="p-3 rounded-xl border text-sm font-semibold w-full">
                                <input type="text" name="swot_weaknesses_title_en" value="{{ $setting->swot_weaknesses_title_en }}" placeholder="Column Title (EN)" class="p-3 rounded-xl border text-sm font-semibold w-full">
                            </div>
                            <input type="text" name="swot_weaknesses_icon" value="{{ $setting->swot_weaknesses_icon ?? 'fas fa-exclamation-triangle' }}" placeholder="Weaknesses Icon FontAwesome" class="p-3 rounded-xl border text-xs w-full">
                            
                            <div class="space-y-3 bg-white p-4 rounded-xl border border-red-100 min-h-36 max-h-96 overflow-y-auto" id="swot_weakness_container">
                                @isset($items['swot_weakness'])
                                    @foreach($items['swot_weakness'] as $index => $item)
                                    <div class="swot-item bg-gray-50 p-3 border border-red-100 rounded-xl space-y-2 relative group" data-type="swot_weakness">
                                        <input type="hidden" name="swot_items[swot_weakness][{{ $index }}][id]" value="{{ $item->id }}">
                                        <button type="button" onclick="deleteSwotItem({{ $item->id }}, this)" class="absolute top-2 right-2 text-red-500 hover:text-red-700 bg-red-50 hover:bg-red-100 w-6 h-6 rounded flex items-center justify-center transition-colors">
                                            <i class="fas fa-trash-alt text-xs"></i>
                                        </button>
                                        <div class="grid grid-cols-1 gap-2 pr-6">
                                            <div class="flex items-center gap-2">
                                                <span class="text-xs font-semibold text-gray-500 w-8">AR</span>
                                                <input type="text" name="swot_items[swot_weakness][{{ $index }}][value_ar]" value="{{ $item->value_ar }}" required class="w-full p-2 border border-gray-300 bg-white rounded-lg text-xs focus:ring-1 focus:ring-red-500 focus:outline-none" dir="rtl">
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <span class="text-xs font-semibold text-gray-500 w-8">EN</span>
                                                <input type="text" name="swot_items[swot_weakness][{{ $index }}][value_en]" value="{{ $item->value_en }}" required class="w-full p-2 border border-gray-300 bg-white rounded-lg text-xs focus:ring-1 focus:ring-red-500 focus:outline-none" dir="ltr">
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                @endisset
                            </div>
                        </div>

                        <!-- Opportunities Card -->
                        <div class="bg-blue-50/30 p-6 rounded-2xl border-2 border-blue-150/70 space-y-5 shadow-sm">
                            <div class="flex justify-between items-center border-b border-blue-100 pb-3">
                                <h4 class="font-bold text-base text-blue-800 flex items-center gap-2">
                                    <div class="w-9 h-9 rounded-lg bg-blue-100 text-blue-700 flex items-center justify-center text-base"><i class="{{ $setting->swot_opportunities_icon ?? 'fas fa-lightbulb' }}"></i></div>
                                    {{ app()->getLocale() == 'ar' ? 'الفرص المتاحة (Opportunities)' : 'Opportunities' }}
                                </h4>
                                <button type="button" onclick="addSwotItemInline('swot_opportunity')" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-xl text-xs font-bold transition flex items-center gap-1 shadow-sm">
                                    <i class="fas fa-plus"></i> {{ app()->getLocale() == 'ar' ? 'إضافة فرصة' : 'Add' }}
                                </button>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <input type="text" name="swot_opportunities_title_ar" value="{{ $setting->swot_opportunities_title_ar }}" placeholder="عنوان العمود (عربي)" class="p-3 rounded-xl border text-sm font-semibold w-full">
                                <input type="text" name="swot_opportunities_title_en" value="{{ $setting->swot_opportunities_title_en }}" placeholder="Column Title (EN)" class="p-3 rounded-xl border text-sm font-semibold w-full">
                            </div>
                            <input type="text" name="swot_opportunities_icon" value="{{ $setting->swot_opportunities_icon ?? 'fas fa-lightbulb' }}" placeholder="Opportunities Icon FontAwesome" class="p-3 rounded-xl border text-xs w-full">
                            
                            <div class="space-y-3 bg-white p-4 rounded-xl border border-blue-100 min-h-36 max-h-96 overflow-y-auto" id="swot_opportunity_container">
                                @isset($items['swot_opportunity'])
                                    @foreach($items['swot_opportunity'] as $index => $item)
                                    <div class="swot-item bg-gray-50 p-3 border border-blue-100 rounded-xl space-y-2 relative group" data-type="swot_opportunity">
                                        <input type="hidden" name="swot_items[swot_opportunity][{{ $index }}][id]" value="{{ $item->id }}">
                                        <button type="button" onclick="deleteSwotItem({{ $item->id }}, this)" class="absolute top-2 right-2 text-red-500 hover:text-red-700 bg-red-50 hover:bg-red-100 w-6 h-6 rounded flex items-center justify-center transition-colors">
                                            <i class="fas fa-trash-alt text-xs"></i>
                                        </button>
                                        <div class="grid grid-cols-1 gap-2 pr-6">
                                            <div class="flex items-center gap-2">
                                                <span class="text-xs font-semibold text-gray-500 w-8">AR</span>
                                                <input type="text" name="swot_items[swot_opportunity][{{ $index }}][value_ar]" value="{{ $item->value_ar }}" required class="w-full p-2 border border-gray-300 bg-white rounded-lg text-xs focus:ring-1 focus:ring-blue-500 focus:outline-none" dir="rtl">
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <span class="text-xs font-semibold text-gray-500 w-8">EN</span>
                                                <input type="text" name="swot_items[swot_opportunity][{{ $index }}][value_en]" value="{{ $item->value_en }}" required class="w-full p-2 border border-gray-300 bg-white rounded-lg text-xs focus:ring-1 focus:ring-blue-500 focus:outline-none" dir="ltr">
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                @endisset
                            </div>
                        </div>

                        <!-- Capacity Needs Card -->
                        <div class="bg-amber-50/30 p-6 rounded-2xl border-2 border-amber-150/70 space-y-5 shadow-sm">
                            <div class="flex justify-between items-center border-b border-amber-100 pb-3">
                                <h4 class="font-bold text-base text-amber-800 flex items-center gap-2">
                                    <div class="w-9 h-9 rounded-lg bg-amber-100 text-amber-700 flex items-center justify-center text-base"><i class="{{ $setting->swot_needs_icon ?? 'fas fa-tools' }}"></i></div>
                                    {{ app()->getLocale() == 'ar' ? 'الاحتياجات الحالية (Capacity Needs)' : 'Capacity Needs' }}
                                </h4>
                                <button type="button" onclick="addSwotItemInline('swot_need')" class="bg-amber-600 hover:bg-amber-700 text-white px-4 py-2 rounded-xl text-xs font-bold transition flex items-center gap-1 shadow-sm">
                                    <i class="fas fa-plus"></i> {{ app()->getLocale() == 'ar' ? 'إضافة احتياج' : 'Add' }}
                                </button>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <input type="text" name="swot_needs_title_ar" value="{{ $setting->swot_needs_title_ar }}" placeholder="عنوان العمود (عربي)" class="p-3 rounded-xl border text-sm font-semibold w-full">
                                <input type="text" name="swot_needs_title_en" value="{{ $setting->swot_needs_title_en }}" placeholder="Column Title (EN)" class="p-3 rounded-xl border text-sm font-semibold w-full">
                            </div>
                            <input type="text" name="swot_needs_icon" value="{{ $setting->swot_needs_icon ?? 'fas fa-tools' }}" placeholder="Needs Icon FontAwesome" class="p-3 rounded-xl border text-xs w-full">
                            
                            <div class="space-y-3 bg-white p-4 rounded-xl border border-amber-100 min-h-36 max-h-96 overflow-y-auto" id="swot_need_container">
                                @isset($items['swot_need'])
                                    @foreach($items['swot_need'] as $index => $item)
                                    <div class="swot-item bg-gray-50 p-3 border border-amber-100 rounded-xl space-y-2 relative group" data-type="swot_need">
                                        <input type="hidden" name="swot_items[swot_need][{{ $index }}][id]" value="{{ $item->id }}">
                                        <button type="button" onclick="deleteSwotItem({{ $item->id }}, this)" class="absolute top-2 right-2 text-red-500 hover:text-red-700 bg-red-50 hover:bg-red-100 w-6 h-6 rounded flex items-center justify-center transition-colors">
                                            <i class="fas fa-trash-alt text-xs"></i>
                                        </button>
                                        <div class="grid grid-cols-1 gap-2 pr-6">
                                            <div class="flex items-center gap-2">
                                                <span class="text-xs font-semibold text-gray-500 w-8">AR</span>
                                                <input type="text" name="swot_items[swot_need][{{ $index }}][value_ar]" value="{{ $item->value_ar }}" required class="w-full p-2 border border-gray-300 bg-white rounded-lg text-xs focus:ring-1 focus:ring-amber-500 focus:outline-none" dir="rtl">
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <span class="text-xs font-semibold text-gray-500 w-8">EN</span>
                                                <input type="text" name="swot_items[swot_need][{{ $index }}][value_en]" value="{{ $item->value_en }}" required class="w-full p-2 border border-gray-300 bg-white rounded-lg text-xs focus:ring-1 focus:ring-amber-500 focus:outline-none" dir="ltr">
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                @endisset
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- ========================================== -->
            <!-- TAB 8: METHODOLOGIES -->
            <!-- ========================================== -->
            <div id="tab-content-methodology" class="tab-pane hidden space-y-8">
                
                <div class="bg-gray-50/50 p-6 rounded-2xl border border-gray-100 space-y-6">
                    <div class="flex items-center justify-between border-b border-gray-150 pb-3">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center text-lg"><i class="fas fa-cogs"></i></div>
                            <div>
                                <h3 class="text-lg font-bold text-gray-800">{{ app()->getLocale() == 'ar' ? 'منهجيات العمل وآليات التنفيذ والقضايا المتقاطعة' : 'Execution Framework & Methodologies' }}</h3>
                                <p class="text-xs text-gray-400 mt-0.5">{{ app()->getLocale() == 'ar' ? 'تعديل مناهج العمل، تفاصيل المنح، الرصد والتقييم والقضايا المشتركة.' : 'Configure grant details, M&E frameworks, and cross-cutting parameters.' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="block text-sm font-bold text-gray-700">العنوان الرئيسي للمنهجيات (عربي)</label>
                            <input type="text" name="methodology_title_ar" value="{{ $setting->methodology_title_ar }}" class="w-full p-3.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500/20" dir="rtl">
                        </div>
                        <div class="space-y-2">
                            <label class="block text-sm font-bold text-gray-700">Methodology Title (English)</label>
                            <input type="text" name="methodology_title_en" value="{{ $setting->methodology_title_en }}" class="w-full p-3.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500/20" dir="ltr">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="block text-sm font-bold text-gray-700">العنوان الفرعي للمنهجيات (عربي)</label>
                            <input type="text" name="methodology_subtitle_ar" value="{{ $setting->methodology_subtitle_ar }}" class="w-full p-3.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500/20" dir="rtl">
                        </div>
                        <div class="space-y-2">
                            <label class="block text-sm font-bold text-gray-700">Methodology Subtitle (English)</label>
                            <input type="text" name="methodology_subtitle_en" value="{{ $setting->methodology_subtitle_en }}" class="w-full p-3.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500/20" dir="ltr">
                        </div>
                    </div>

                    <!-- Spacious Grid for 3 Groups -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 pt-4">
                        
                        <!-- Group 1: Grants Support -->
                        <div class="bg-white p-5 rounded-2xl border border-gray-200/80 space-y-4 shadow-sm flex flex-col justify-between">
                            <div class="space-y-4">
                                <div class="flex justify-between items-center border-b border-gray-100 pb-2">
                                    <h4 class="font-bold text-sm text-gray-800 flex items-center gap-1.5">
                                        <i class="fas fa-hand-holding-heart text-blue-500"></i>
                                        {{ app()->getLocale() == 'ar' ? 'دعم المنح' : 'Grants Support' }}
                                    </h4>
                                    <button type="button" onclick="openAddItemModal('methodology_grant')" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded-lg text-[10px] font-bold transition">Add</button>
                                </div>
                                <div class="space-y-2">
                                    <input type="text" name="methodology_grants_title_en" value="{{ $setting->methodology_grants_title_en }}" placeholder="Title (EN)" class="p-2.5 border rounded-lg text-xs w-full">
                                    <input type="text" name="methodology_grants_icon" value="{{ $setting->methodology_grants_icon ?? 'fas fa-hand-holding-heart' }}" placeholder="Icon" class="p-2.5 border rounded-lg text-xs w-full">
                                </div>
                                <div class="space-y-2.5 max-h-72 overflow-y-auto bg-gray-50 p-3.5 rounded-xl border border-gray-150">
                                    @isset($items['methodology_grant'])
                                        @foreach($items['methodology_grant'] as $item)
                                        <div class="flex justify-between items-center text-sm p-3.5 bg-white border border-gray-200/80 rounded-xl shadow-sm hover:shadow-md transition">
                                            <div class="flex flex-col gap-1 min-w-0">
                                                <span class="font-bold text-gray-800 truncate text-sm">{{ $item->title_en ?: ($item->title_ar ?: 'No Title') }}</span>
                                                @if($item->title_ar && $item->title_en)
                                                    <span class="text-xs text-gray-500 font-semibold truncate" dir="rtl">{{ $item->title_ar }}</span>
                                                @endif
                                            </div>
                                            <div class="flex gap-2 flex-shrink-0 items-center border-l ltr:border-l rtl:border-r ltr:pl-2.5 rtl:pr-2.5 border-gray-150">
                                                <button type="button" onclick="editItem({{ json_encode($item) }})" class="w-7 h-7 bg-blue-50 hover:bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center text-xs transition" title="Edit"><i class="fas fa-edit"></i></button>
                                                <button type="button" onclick="confirmDeleteItem({{ $item->id }})" class="w-7 h-7 bg-red-50 hover:bg-red-100 text-red-600 rounded-lg flex items-center justify-center text-xs transition" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                            </div>
                                        </div>
                                        @endforeach
                                    @endisset
                                </div>
                            </div>
                        </div>

                        <!-- Group 2: M&E -->
                        <div class="bg-white p-5 rounded-2xl border border-gray-200/80 space-y-4 shadow-sm flex flex-col justify-between">
                            <div class="space-y-4">
                                <div class="flex justify-between items-center border-b border-gray-100 pb-2">
                                    <h4 class="font-bold text-sm text-gray-800 flex items-center gap-1.5">
                                        <i class="fas fa-chart-line text-blue-500"></i>
                                        {{ app()->getLocale() == 'ar' ? 'المراقبة والتقييم' : 'M&E Framework' }}
                                    </h4>
                                    <button type="button" onclick="openAddItemModal('methodology_me')" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded-lg text-[10px] font-bold transition">Add</button>
                                </div>
                                <div class="space-y-2">
                                    <input type="text" name="methodology_me_title_en" value="{{ $setting->methodology_me_title_en }}" placeholder="Title (EN)" class="p-2.5 border rounded-lg text-xs w-full">
                                    <input type="text" name="methodology_me_icon" value="{{ $setting->methodology_me_icon ?? 'fas fa-chart-line' }}" placeholder="Icon" class="p-2.5 border rounded-lg text-xs w-full">
                                </div>
                                <div class="space-y-2.5 max-h-72 overflow-y-auto bg-gray-50 p-3.5 rounded-xl border border-gray-150">
                                    @isset($items['methodology_me'])
                                        @foreach($items['methodology_me'] as $item)
                                        <div class="flex justify-between items-center text-sm p-3.5 bg-white border border-gray-200/80 rounded-xl shadow-sm hover:shadow-md transition">
                                            <div class="flex flex-col gap-1 min-w-0">
                                                <span class="font-bold text-gray-800 truncate text-sm">{{ $item->title_en ?: ($item->title_ar ?: 'No Title') }}</span>
                                                @if($item->title_ar && $item->title_en)
                                                    <span class="text-xs text-gray-500 font-semibold truncate" dir="rtl">{{ $item->title_ar }}</span>
                                                @endif
                                            </div>
                                            <div class="flex gap-2 flex-shrink-0 items-center border-l ltr:border-l rtl:border-r ltr:pl-2.5 rtl:pr-2.5 border-gray-150">
                                                <button type="button" onclick="editItem({{ json_encode($item) }})" class="w-7 h-7 bg-blue-50 hover:bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center text-xs transition" title="Edit"><i class="fas fa-edit"></i></button>
                                                <button type="button" onclick="confirmDeleteItem({{ $item->id }})" class="w-7 h-7 bg-red-50 hover:bg-red-100 text-red-600 rounded-lg flex items-center justify-center text-xs transition" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                            </div>
                                        </div>
                                        @endforeach
                                    @endisset
                                </div>
                            </div>
                        </div>

                        <!-- Group 3: Cross Cutting Issues -->
                        <div class="bg-white p-5 rounded-2xl border border-gray-200/80 space-y-4 shadow-sm flex flex-col justify-between">
                            <div class="space-y-4">
                                <div class="flex justify-between items-center border-b border-gray-100 pb-2">
                                    <h4 class="font-bold text-sm text-gray-800 flex items-center gap-1.5">
                                        <i class="fas fa-leaf text-emerald-600"></i>
                                        {{ app()->getLocale() == 'ar' ? 'القضايا المشتركة' : 'Cross-cutting Issues' }}
                                    </h4>
                                    <button type="button" onclick="openAddItemModal('cross_cutting')" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded-lg text-[10px] font-bold transition">Add</button>
                                </div>
                                <div class="space-y-2">
                                    <input type="text" name="methodology_cross_title_en" value="{{ $setting->methodology_cross_title_en }}" placeholder="Title (EN)" class="p-2.5 border rounded-lg text-xs w-full">
                                    <textarea name="methodology_cross_desc_en" rows="2" placeholder="Description (EN)" class="p-2.5 border rounded-lg text-xs w-full h-12 leading-snug">{{ $setting->methodology_cross_desc_en }}</textarea>
                                </div>
                                <div class="space-y-2.5 max-h-72 overflow-y-auto bg-gray-50 p-3.5 rounded-xl border border-gray-150">
                                    @isset($items['cross_cutting'])
                                        @foreach($items['cross_cutting'] as $item)
                                        <div class="flex justify-between items-center text-sm p-3.5 bg-white border border-gray-200/80 rounded-xl shadow-sm hover:shadow-md transition">
                                            <div class="flex flex-col gap-1 min-w-0">
                                                <span class="font-bold text-gray-800 truncate text-sm">{{ $item->title_en ?: ($item->title_ar ?: 'No Title') }}</span>
                                                @if($item->title_ar && $item->title_en)
                                                    <span class="text-xs text-gray-500 font-semibold truncate" dir="rtl">{{ $item->title_ar }}</span>
                                                @endif
                                            </div>
                                            <div class="flex gap-2 flex-shrink-0 items-center border-l ltr:border-l rtl:border-r ltr:pl-2.5 rtl:pr-2.5 border-gray-150">
                                                <button type="button" onclick="editItem({{ json_encode($item) }})" class="w-7 h-7 bg-blue-50 hover:bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center text-xs transition" title="Edit"><i class="fas fa-edit"></i></button>
                                                <button type="button" onclick="confirmDeleteItem({{ $item->id }})" class="w-7 h-7 bg-red-50 hover:bg-red-100 text-red-600 rounded-lg flex items-center justify-center text-xs transition" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                            </div>
                                        </div>
                                        @endforeach
                                    @endisset
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- ========================================== -->
            <!-- TAB 9: WHO WE SERVE -->
            <!-- ========================================== -->
            <div id="tab-content-serve" class="tab-pane hidden space-y-8">
                
                <div class="bg-gray-50/50 p-6 rounded-2xl border border-gray-100 space-y-6">
                    <div class="flex items-center justify-between border-b border-gray-150 pb-3">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center text-lg"><i class="fas fa-handshake"></i></div>
                            <div>
                                <h3 class="text-lg font-bold text-gray-800">{{ app()->getLocale() == 'ar' ? 'الفئات المستهدفة والمستفيدون (Who We Serve)' : 'Target Audience & Livelihoods' }}</h3>
                                <p class="text-xs text-gray-400 mt-0.5">{{ app()->getLocale() == 'ar' ? 'تعديل الفئات المستهدفة للمنظمة، والمستفيدين الفعليين.' : 'Define target groups and local stakeholders benefiting from initiatives.' }}</p>
                            </div>
                        </div>
                        <button type="button" onclick="openAddItemModal('serve_audience')" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-xl text-sm font-bold transition flex items-center gap-2 shadow-md hover:shadow-lg">
                            <i class="fas fa-plus"></i> {{ app()->getLocale() == 'ar' ? 'إضافة فئة جديدة' : 'Add Target Group' }}
                        </button>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="block text-sm font-bold text-gray-700">عنوان قسم الفئات المستهدفة (عربي)</label>
                            <input type="text" name="serve_title_ar" value="{{ $setting->serve_title_ar }}" class="w-full p-3.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500/20" dir="rtl">
                        </div>
                        <div class="space-y-2">
                            <label class="block text-sm font-bold text-gray-700">Section Title (English)</label>
                            <input type="text" name="serve_title_en" value="{{ $setting->serve_title_en }}" class="w-full p-3.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500/20" dir="ltr">
                        </div>
                    </div>

                    <!-- Spacious Grid for Audiences (No cramped tables) -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 pt-4">
                        @isset($items['serve_audience'])
                            @foreach($items['serve_audience'] as $item)
                            <div class="bg-white p-6 rounded-2xl border border-gray-200/80 shadow-sm flex items-start justify-between gap-4 hover:shadow-md transition">
                                <div class="flex gap-4">
                                    <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center text-xl flex-shrink-0">
                                        <i class="{{ $item->icon }}"></i>
                                    </div>
                                    <div class="space-y-1">
                                        <h5 class="font-bold text-base text-gray-800">{{ $item->title_en }}</h5>
                                        <p class="text-xs text-gray-400 mt-1.5 leading-relaxed">{{ $item->value_en }}</p>
                                        <p class="text-xs text-gray-500 mt-3 font-semibold border-t pt-2" dir="rtl">{{ $item->title_ar }}: <span class="text-gray-400 font-normal">{{ $item->value_ar }}</span></p>
                                    </div>
                                </div>
                                <div class="flex flex-col gap-2 flex-shrink-0">
                                    <button type="button" onclick="editItem({{ json_encode($item) }})" class="w-8 h-8 bg-blue-50 hover:bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center text-sm transition" title="Edit"><i class="fas fa-edit"></i></button>
                                    <button type="button" onclick="confirmDeleteItem({{ $item->id }})" class="w-8 h-8 bg-red-50 hover:bg-red-100 text-red-600 rounded-xl flex items-center justify-center text-sm transition" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <div class="col-span-full py-8 text-center text-gray-400 text-base">لا يوجد فئات مستهدفة مضافة حالياً.</div>
                        @endisset
                    </div>
                </div>
            </div>

            <!-- ========================================== -->
            <!-- TAB 10: OFFICIAL CONTACT -->
            <!-- ========================================== -->
            <div id="tab-content-contact" class="tab-pane hidden space-y-8">
                
                <div class="bg-gray-50/50 p-6 rounded-2xl border border-gray-100 space-y-6">
                    <div class="flex items-center gap-3 border-b border-gray-150 pb-3">
                        <div class="w-10 h-10 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center text-lg"><i class="fas fa-user-tie"></i></div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-800">{{ app()->getLocale() == 'ar' ? 'جهة الاتصال الرسمية للمنظمة' : 'Official Contact Person Settings' }}</h3>
                            <p class="text-xs text-gray-400 mt-0.5">{{ app()->getLocale() == 'ar' ? 'تحديث وتفاصيل بيانات المسؤول الرسمي للتواصل مع المنظمة.' : 'Update coordinates and profile details for the chief officer.' }}</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="block text-sm font-bold text-gray-700">عنوان قسم الاتصال (عربي)</label>
                            <input type="text" name="contact_title_ar" value="{{ $setting->contact_title_ar }}" class="w-full p-3.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500/20" dir="rtl">
                        </div>
                        <div class="space-y-2">
                            <label class="block text-sm font-bold text-gray-700">Contact Section Title (English)</label>
                            <input type="text" name="contact_title_en" value="{{ $setting->contact_title_en }}" class="w-full p-3.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500/20" dir="ltr">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="block text-sm font-bold text-gray-700">العنوان الفرعي لقسم الاتصال (عربي)</label>
                            <input type="text" name="contact_subtitle_ar" value="{{ $setting->contact_subtitle_ar }}" class="w-full p-3.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500/20" dir="rtl">
                        </div>
                        <div class="space-y-2">
                            <label class="block text-sm font-bold text-gray-700">Contact Section Subtitle (English)</label>
                            <input type="text" name="contact_subtitle_en" value="{{ $setting->contact_subtitle_en }}" class="w-full p-3.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500/20" dir="ltr">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="block text-sm font-bold text-gray-700">شرح قسم الاتصال (عربي)</label>
                            <textarea name="contact_desc_ar" rows="3" class="w-full p-3.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500/20 leading-relaxed" dir="rtl">{{ $setting->contact_desc_ar }}</textarea>
                        </div>
                        <div class="space-y-2">
                            <label class="block text-sm font-bold text-gray-700">Contact Section Description (English)</label>
                            <textarea name="contact_desc_en" rows="3" class="w-full p-3.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500/20 leading-relaxed" dir="ltr">{{ $setting->contact_desc_en }}</textarea>
                        </div>
                    </div>

                    <!-- Business Profile credentials details (Spacious Full Width card style) -->
                    <div class="bg-white p-6 rounded-2xl border border-gray-200 shadow-sm space-y-6">
                        <h4 class="font-bold text-sm text-gray-400 uppercase tracking-wider border-b pb-2">
                            {{ app()->getLocale() == 'ar' ? 'بيانات جهة الاتصال بالتفصيل' : 'Officer Corporate Credentials' }}
                        </h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="block text-xs font-bold text-gray-600">الاسم الكامل (عربي)</label>
                                <input type="text" name="contact_name_ar" value="{{ $setting->contact_name_ar }}" class="w-full p-3 rounded-lg border focus:ring-2 focus:ring-blue-500/20 font-bold" dir="rtl">
                            </div>
                            <div class="space-y-2">
                                <label class="block text-xs font-bold text-gray-600">Full Name (English)</label>
                                <input type="text" name="contact_name_en" value="{{ $setting->contact_name_en }}" class="w-full p-3 rounded-lg border focus:ring-2 focus:ring-blue-500/20 font-bold" dir="ltr">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="block text-xs font-semibold text-gray-600">الوظيفة/المنصب (عربي)</label>
                                <input type="text" name="contact_position_ar" value="{{ $setting->contact_position_ar }}" class="w-full p-3 rounded-lg border focus:ring-2 focus:ring-blue-500/20" dir="rtl">
                            </div>
                            <div class="space-y-2">
                                <label class="block text-xs font-semibold text-gray-600">Job Position (English)</label>
                                <input type="text" name="contact_position_en" value="{{ $setting->contact_position_en }}" class="w-full p-3 rounded-lg border focus:ring-2 focus:ring-blue-500/20" dir="ltr">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="block text-xs font-semibold text-gray-600">البريد الإلكتروني الرسمي</label>
                                <input type="email" name="contact_email" value="{{ $setting->contact_email }}" class="w-full p-3 rounded-lg border focus:ring-2 focus:ring-blue-500/20" dir="ltr">
                            </div>
                            <div class="space-y-2">
                                <label class="block text-xs font-semibold text-gray-600">رقم الهاتف</label>
                                <input type="text" name="contact_phone" value="{{ $setting->contact_phone }}" class="w-full p-3 rounded-lg border focus:ring-2 focus:ring-blue-500/20" dir="ltr">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 border-t pt-4">
                            <div class="space-y-2">
                                <label class="block text-xs font-semibold text-gray-600">
                                    {{ app()->getLocale() == 'ar' ? 'الصورة الشخصية (الحد الأقصى: 2 ميجابايت)' : 'Profile Photo (Max: 2MB)' }}
                                </label>
                                <input type="file" name="contact_photo" accept="image/*" class="w-full p-2.5 rounded-lg border focus:ring-2 focus:ring-blue-500/20 text-xs text-gray-500">
                            </div>
                            <div class="flex items-center gap-4 bg-gray-50 p-3.5 rounded-xl border border-gray-150">
                                @if($setting->contact_photo)
                                    <div class="relative w-16 h-16 rounded-full overflow-hidden border border-gray-200 shadow-sm flex-shrink-0">
                                        <img src="{{ asset($setting->contact_photo) }}" class="w-full h-full object-cover">
                                    </div>
                                    <div class="space-y-1">
                                        <label class="flex items-center gap-2 text-xs font-semibold text-red-600 cursor-pointer">
                                            <input type="checkbox" name="remove_contact_photo" value="1" class="rounded text-red-600 focus:ring-red-500">
                                            {{ app()->getLocale() == 'ar' ? 'حذف الصورة الحالية' : 'Delete current photo' }}
                                        </label>
                                        <p class="text-[10px] text-gray-400 leading-none">
                                            {{ app()->getLocale() == 'ar' ? 'سيتم العودة للأيقونة الافتراضية' : 'Will fallback to default icon' }}
                                        </p>
                                    </div>
                                @else
                                    <div class="w-16 h-16 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center text-3xl flex-shrink-0">
                                        <i class="fas fa-user-tie"></i>
                                    </div>
                                    <div>
                                        <p class="text-xs font-semibold text-gray-600">{{ app()->getLocale() == 'ar' ? 'تظهر الأيقونة الافتراضية' : 'Default icon is active' }}</p>
                                        <p class="text-[10px] text-gray-400">{{ app()->getLocale() == 'ar' ? 'قم برفع صورة لتغييرها' : 'Upload a photo to change' }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Save button -->
            <div class="mt-12 pt-6 border-t border-gray-150 flex justify-end">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-extrabold py-4.5 px-12 rounded-xl shadow-lg hover:shadow-xl transition-all flex items-center gap-3 text-base">
                    <i class="fas fa-save text-lg"></i>
                    <span>{{ app()->getLocale() == 'ar' ? 'حفظ إعدادات هذا القسم بالكامل' : 'Save Complete Section Settings' }}</span>
                </button>
            </div>

        </form>
    </div>
</div>

<!-- ============================================== -->
<!-- MODAL: ADD / EDIT DYNAMIC ITEM -->
<!-- ============================================== -->
<div id="itemModal" class="fixed inset-0 bg-black/60 hidden items-center justify-center z-50 p-4 transition-all duration-300">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-xl overflow-hidden border border-gray-100 transform scale-95 transition-transform duration-300" id="itemModalBox">
        <div class="px-6 py-5 bg-gradient-to-r from-blue-700 to-indigo-800 text-white flex justify-between items-center shadow-md">
            <h3 id="modalTitle" class="font-bold text-lg">Add New Item</h3>
            <button type="button" onclick="closeItemModal()" class="text-white/80 hover:text-white transition"><i class="fas fa-times text-xl"></i></button>
        </div>
        
        <form id="itemForm" method="POST" class="p-6 space-y-5">
            @csrf
            <input type="hidden" name="_method" id="itemFormMethod" value="POST">
            <input type="hidden" name="type" id="itemTypeInput">
            
            <div id="form-group-icon" class="space-y-1.5">
                <label class="block text-sm font-bold text-gray-700">أيقونة الأنفاس الحرة (FontAwesome Icon Class)</label>
                <input type="text" name="icon" id="itemIconInput" class="w-full p-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm font-semibold" placeholder="e.g. fas fa-globe-africa">
            </div>

            <div id="form-group-title" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="space-y-1.5">
                    <label class="block text-sm font-bold text-gray-700">العنوان (عربي)</label>
                    <input type="text" name="title_ar" id="itemTitleArInput" class="w-full p-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500" dir="rtl">
                </div>
                <div class="space-y-1.5">
                    <label class="block text-sm font-bold text-gray-700">Title (English)</label>
                    <input type="text" name="title_en" id="itemTitleEnInput" class="w-full p-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500" dir="ltr">
                </div>
            </div>

            <div id="form-group-value" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="space-y-1.5">
                    <label class="block text-sm font-bold text-gray-700">القيمة/الشرح (عربي)</label>
                    <textarea name="value_ar" id="itemValueArInput" rows="3" class="w-full p-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 leading-normal" dir="rtl"></textarea>
                </div>
                <div class="space-y-1.5">
                    <label class="block text-sm font-bold text-gray-700">Value/Desc (English)</label>
                    <textarea name="value_en" id="itemValueEnInput" rows="3" class="w-full p-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 leading-normal" dir="ltr"></textarea>
                </div>
            </div>

            <div id="form-group-extra" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="space-y-1.5">
                    <label class="block text-sm font-bold text-gray-700">قيمة إضافية/تاريخ/حالة (عربي)</label>
                    <input type="text" name="extra_value_ar" id="itemExtraArInput" class="w-full p-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500" dir="rtl">
                </div>
                <div class="space-y-1.5">
                    <label class="block text-sm font-bold text-gray-700">Extra Value/Date/Status (EN)</label>
                    <input type="text" name="extra_value_en" id="itemExtraEnInput" class="w-full p-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500" dir="ltr">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div id="form-group-number" class="space-y-1.5 hidden">
                    <label class="block text-sm font-bold text-gray-700">القيمة الرقمية (النسبة % للمؤشر)</label>
                    <input type="number" name="number_value" id="itemNumberInput" min="0" max="100" class="w-full p-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 font-extrabold text-base text-gray-800">
                </div>
                <div id="form-group-sort-order" class="space-y-1.5">
                    <label class="block text-sm font-bold text-gray-700">ترتيب العرض (Sort Order)</label>
                    <input type="number" name="sort_order" id="itemSortInput" value="0" class="w-full p-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 font-bold text-gray-800">
                </div>
            </div>

            <div class="pt-6 border-t border-gray-100 flex justify-end gap-3.5">
                <button type="button" onclick="closeItemModal()" class="px-6 py-3 rounded-xl text-gray-600 border border-gray-300 font-bold hover:bg-gray-50 transition">{{ app()->getLocale() == 'ar' ? 'إلغاء' : 'Cancel' }}</button>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-extrabold py-3 px-8 rounded-xl transition shadow-md hover:shadow-lg flex items-center gap-2">
                    <i class="fas fa-save"></i>
                    <span>{{ app()->getLocale() == 'ar' ? 'حفظ العنصر بالكامل' : 'Save Completed Item' }}</span>
                </button>
            </div>
        </form>
    </div>
</div>

<!-- ============================================== -->
<!-- DELETE ITEM FORM (Silent submission) -->
<!-- ============================================== -->
<form id="deleteItemForm" method="POST" class="hidden">
    @csrf
    @method('DELETE')
</form>

<script>
    let swotIndexCounter = 1000;

    function deleteSwotItem(id, buttonElement) {
        let isAr = "{{ app()->getLocale() }}" === 'ar';
        let conf = confirm(isAr ? "هل أنت متأكد من رغبتك في حذف هذا العنصر نهائياً؟" : "Are you sure you want to permanently delete this item?");
        if (!conf) return;

        fetch('/admin/profile/items/' + id, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                _method: 'DELETE'
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                buttonElement.closest('.swot-item').remove();
            } else {
                alert(isAr ? "حدث خطأ أثناء الحذف!" : "Error deleting item!");
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert(isAr ? "حدث خطأ في الاتصال!" : "Connection error!");
        });
    }

    function addSwotItemInline(type) {
        const container = document.getElementById(type + '_container');
        if (!container) return;
        
        let focusRingColor = 'focus:ring-blue-500';
        let borderColor = 'border-gray-200';
        if (type === 'swot_strength') {
            focusRingColor = 'focus:ring-emerald-500';
            borderColor = 'border-emerald-250';
        } else if (type === 'swot_weakness') {
            focusRingColor = 'focus:ring-red-500';
            borderColor = 'border-red-250';
        } else if (type === 'swot_opportunity') {
            focusRingColor = 'focus:ring-blue-500';
            borderColor = 'border-blue-250';
        } else if (type === 'swot_need') {
            focusRingColor = 'focus:ring-amber-500';
            borderColor = 'border-amber-250';
        }
        
        const index = swotIndexCounter++;
        const html = `
        <div class="swot-item bg-gray-50 p-3 border ${borderColor} rounded-xl space-y-2 relative" data-type="${type}">
            <button type="button" onclick="this.closest('.swot-item').remove()" class="absolute top-2 right-2 text-red-500 hover:text-red-700 bg-red-50 hover:bg-red-100 w-6 h-6 rounded flex items-center justify-center transition-colors">
                <i class="fas fa-trash-alt text-xs"></i>
            </button>
            <div class="grid grid-cols-1 gap-2 pr-6">
                <div class="flex items-center gap-2">
                    <span class="text-xs font-semibold text-gray-500 w-8">AR</span>
                    <input type="text" name="swot_items[${type}][${index}][value_ar]" required placeholder="النص باللغة العربية" class="w-full p-2 border border-gray-300 bg-white rounded-lg text-xs ${focusRingColor} focus:outline-none" dir="rtl">
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-xs font-semibold text-gray-500 w-8">EN</span>
                    <input type="text" name="swot_items[${type}][${index}][value_en]" required placeholder="Text in English" class="w-full p-2 border border-gray-300 bg-white rounded-lg text-xs ${focusRingColor} focus:outline-none" dir="ltr">
                </div>
            </div>
        </div>
        `;
        
        container.insertAdjacentHTML('beforeend', html);
        container.scrollTop = container.scrollHeight;
    }

    function switchProfileTab(tabKey) {
        // Toggle tab content panes
        document.querySelectorAll('.tab-pane').forEach(el => {
            el.classList.add('hidden');
        });
        document.getElementById('tab-content-' + tabKey).classList.remove('hidden');

        // Toggle tab buttons styles
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.className = "tab-btn p-3.5 rounded-xl border text-left ltr:text-left rtl:text-right transition-all flex flex-col md:flex-row items-center md:items-start gap-3 hover:shadow-md bg-white text-gray-700 border-gray-200";
            
            let iconDiv = btn.querySelector('.icon-box');
            if (iconDiv) {
                iconDiv.className = "w-10 h-10 rounded-xl flex items-center justify-center text-lg flex-shrink-0 bg-blue-50/50 text-blue-600 icon-box";
            }
            let title = btn.querySelector('.title-text');
            if (title) title.className = "font-bold text-xs md:text-sm tracking-tight truncate title-text text-gray-800";
            
            let desc = btn.querySelector('.desc-text');
            if (desc) desc.className = "text-[10px] truncate mt-0.5 desc-text text-gray-400 hidden sm:block";
        });
        
        let activeBtn = document.getElementById('tab-btn-' + tabKey);
        if (activeBtn) {
            activeBtn.className = "tab-btn p-3.5 rounded-xl border text-left ltr:text-left rtl:text-right transition-all flex flex-col md:flex-row items-center md:items-start gap-3 hover:shadow-md bg-blue-600 text-white border-blue-600 shadow-md shadow-blue-500/10";
            
            let activeIconDiv = activeBtn.querySelector('.icon-box');
            if (activeIconDiv) {
                activeIconDiv.className = "w-10 h-10 rounded-xl flex items-center justify-center text-lg flex-shrink-0 bg-white/20 text-white icon-box";
            }
            let activeTitle = activeBtn.querySelector('.title-text');
            if (activeTitle) activeTitle.className = "font-bold text-xs md:text-sm tracking-tight truncate title-text text-white";
            
            let activeDesc = activeBtn.querySelector('.desc-text');
            if (activeDesc) activeDesc.className = "text-[10px] truncate mt-0.5 desc-text text-blue-100 hidden sm:block";
        }
    }

    // Modal Control logic
    function openAddItemModal(type) {
        let isAr = "{{ app()->getLocale() }}" === 'ar';
        
        // Reset Form
        document.getElementById('itemForm').reset();
        document.getElementById('itemFormMethod').value = 'POST';
        document.getElementById('itemTypeInput').value = type;
        document.getElementById('itemForm').action = "{{ route('admin.profile.store_item') }}";

        // Setup Form fields visibility based on type
        setupFormFieldsVisibility(type);

        const typeLabels = {
            'ar': {
                'objective': 'إضافة هدف استراتيجي جديد',
                'timeline': 'إضافة حدث زمني جديد للخط الزمني',
                'journey_pos_step': 'إضافة خطوة نمو (تجربة إيجابية)',
                'journey_neg_step': 'إضافة تحدي ميداني (تجربة سلبية)',
                'capacity_internal': 'إضافة مؤشر قدرات داخلي',
                'capacity_external': 'إضافة مؤشر بيئة تشغيل خارجي',
                'snapshot': 'إضافة بطاقة إحصائية رقمية',
                'swot_strength': 'إضافة نقطة قوة جديدة (SWOT)',
                'swot_weakness': 'إضافة نقطة ضعف رئيسية (SWOT)',
                'swot_opportunity': 'إضافة فرصة جديدة (SWOT)',
                'swot_need': 'إضافة احتياج حالي جديد (SWOT)',
                'methodology_grant': 'إضافة عنصر في دعم المنح',
                'methodology_me': 'إضافة عنصر في المراقبة والتقييم',
                'cross_cutting': 'إضافة قضية مشتركة متقاطعة',
                'serve_audience': 'إضافة فئة مستهدفة جديدة'
            },
            'en': {
                'objective': 'Add New Strategic Objective',
                'timeline': 'Add New Timeline Milestone Event',
                'journey_pos_step': 'Add New Growth Step (Positive Experience)',
                'journey_neg_step': 'Add New Field Challenge (Negative Experience)',
                'capacity_internal': 'Add New Internal Capacity Indicator',
                'capacity_external': 'Add New External Environment Indicator',
                'snapshot': 'Add New Statistical Snapshot Card',
                'swot_strength': 'Add New Strength Element (SWOT)',
                'swot_weakness': 'Add New Weakness Element (SWOT)',
                'swot_opportunity': 'Add New Opportunity Element (SWOT)',
                'swot_need': 'Add New Capacity Need Element (SWOT)',
                'methodology_grant': 'Add New Grants Support Item',
                'methodology_me': 'Add New Monitoring & Evaluation Item',
                'cross_cutting': 'Add New Cross-cutting Issue Item',
                'serve_audience': 'Add New Target Group / Beneficiary'
            }
        };
        
        let label = (typeLabels[isAr ? 'ar' : 'en'][type]) || (isAr ? 'إضافة عنصر جديد لـ ' + type : 'Add New Item for ' + type);
        document.getElementById('modalTitle').innerText = label;
        
        let modal = document.getElementById('itemModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        setTimeout(() => {
            document.getElementById('itemModalBox').classList.remove('scale-95');
            document.getElementById('itemModalBox').classList.add('scale-100');
        }, 10);
    }

    function editItem(item) {
        let isAr = "{{ app()->getLocale() }}" === 'ar';
        
        document.getElementById('itemForm').reset();
        document.getElementById('itemFormMethod').value = 'PUT';
        document.getElementById('itemTypeInput').value = item.type;
        document.getElementById('itemForm').action = "/admin/profile/items/" + item.id;

        setupFormFieldsVisibility(item.type);

        // Fill inputs
        document.getElementById('itemIconInput').value = item.icon || '';
        document.getElementById('itemTitleArInput').value = item.title_ar || '';
        document.getElementById('itemTitleEnInput').value = item.title_en || '';
        document.getElementById('itemValueArInput').value = item.value_ar || '';
        document.getElementById('itemValueEnInput').value = item.value_en || '';
        document.getElementById('itemExtraArInput').value = item.extra_value_ar || '';
        document.getElementById('itemExtraEnInput').value = item.extra_value_en || '';
        document.getElementById('itemNumberInput').value = item.number_value || '';
        document.getElementById('itemSortInput').value = item.sort_order || 0;

        const typeEditLabels = {
            'ar': {
                'objective': 'تعديل الهدف الاستراتيجي الحالي',
                'timeline': 'تعديل الحدث الزمني الحالي',
                'journey_pos_step': 'تعديل خطوة النمو (التجربة الإيجابية)',
                'journey_neg_step': 'تعديل التحدي الميداني الحالي',
                'capacity_internal': 'تعديل مؤشر القدرات الداخلي',
                'capacity_external': 'تعديل مؤشر البيئة التشغيل الخارجي',
                'snapshot': 'تعديل البطاقة الرقمية الإحصائية',
                'swot_strength': 'تعديل نقطة القوة (SWOT)',
                'swot_weakness': 'تعديل نقطة الضعف الرئيسية (SWOT)',
                'swot_opportunity': 'تعديل الفرصة المتاحة (SWOT)',
                'swot_need': 'تعديل الاحتياج الحالي (SWOT)',
                'methodology_grant': 'تعديل عنصر دعم المنح',
                'methodology_me': 'تعديل عنصر المراقبة والتقييم',
                'cross_cutting': 'تعديل القضية المشتركة الحالية',
                'serve_audience': 'تعديل الفئة المستهدفة الحالية'
            },
            'en': {
                'objective': 'Edit Selected Strategic Objective',
                'timeline': 'Edit Selected Timeline Milestone',
                'journey_pos_step': 'Edit Selected Growth Step',
                'journey_neg_step': 'Edit Selected Field Challenge',
                'capacity_internal': 'Edit Selected Internal Capacity Indicator',
                'capacity_external': 'Edit Selected External Environment Indicator',
                'snapshot': 'Edit Selected Snapshot Statistical Card',
                'swot_strength': 'Edit Strength Element (SWOT)',
                'swot_weakness': 'Edit Weakness Element (SWOT)',
                'swot_opportunity': 'Edit Opportunity Element (SWOT)',
                'swot_need': 'Edit Capacity Need Element (SWOT)',
                'methodology_grant': 'Edit Grants Support Item',
                'methodology_me': 'Edit Monitoring & Evaluation Item',
                'cross_cutting': 'Edit Cross-cutting Issue Item',
                'serve_audience': 'Edit Selected Target Group / Beneficiary'
            }
        };

        let label = (typeEditLabels[isAr ? 'ar' : 'en'][item.type]) || (isAr ? 'تعديل العنصر الحالي' : 'Edit Selected Item');
        document.getElementById('modalTitle').innerText = label;

        let modal = document.getElementById('itemModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        setTimeout(() => {
            document.getElementById('itemModalBox').classList.remove('scale-95');
            document.getElementById('itemModalBox').classList.add('scale-100');
        }, 10);
    }

    function closeItemModal() {
        document.getElementById('itemModalBox').classList.remove('scale-100');
        document.getElementById('itemModalBox').classList.add('scale-95');
        setTimeout(() => {
            let modal = document.getElementById('itemModal');
            modal.classList.remove('flex');
            modal.classList.add('hidden');
        }, 150);
    }

    function confirmDeleteItem(id) {
        let isAr = "{{ app()->getLocale() }}" === 'ar';
        let conf = confirm(isAr ? "هل أنت متأكد من رغبتك في حذف هذا العنصر نهائياً؟" : "Are you sure you want to permanently delete this item?");
        if (conf) {
            let form = document.getElementById('deleteItemForm');
            form.action = "/admin/profile/items/" + id;
            form.submit();
        }
    }

    function setupFormFieldsVisibility(type) {
        // Toggle groups
        let iconGroup = document.getElementById('form-group-icon');
        let titleGroup = document.getElementById('form-group-title');
        let valGroup = document.getElementById('form-group-value');
        let extraGroup = document.getElementById('form-group-extra');
        let numGroup = document.getElementById('form-group-number');

        // Hide all first
        iconGroup.classList.add('hidden');
        titleGroup.classList.add('hidden');
        valGroup.classList.add('hidden');
        extraGroup.classList.add('hidden');
        numGroup.classList.add('hidden'); // hidden by default

        if (type === 'objective') {
            iconGroup.classList.remove('hidden');
            valGroup.classList.remove('hidden');
        } else if (type === 'timeline') {
            titleGroup.classList.remove('hidden');
            extraGroup.classList.remove('hidden'); // dates
        } else if (type === 'journey_pos_step') {
            titleGroup.classList.remove('hidden');
        } else if (type === 'journey_neg_step') {
            valGroup.classList.remove('hidden');
        } else if (type === 'capacity_internal' || type === 'capacity_external') {
            iconGroup.classList.remove('hidden');
            titleGroup.classList.remove('hidden');
            extraGroup.classList.remove('hidden'); // status text
            numGroup.classList.remove('hidden'); // percentages
        } else if (type === 'snapshot') {
            iconGroup.classList.remove('hidden');
            titleGroup.classList.remove('hidden');
            valGroup.classList.remove('hidden'); // values
        } else if (type === 'swot_strength' || type === 'swot_weakness' || type === 'swot_opportunity' || type === 'swot_need') {
            valGroup.classList.remove('hidden');
        } else if (type === 'methodology_grant' || type === 'methodology_me') {
            iconGroup.classList.remove('hidden');
            titleGroup.classList.remove('hidden');
            valGroup.classList.remove('hidden');
        } else if (type === 'cross_cutting') {
            iconGroup.classList.remove('hidden');
            titleGroup.classList.remove('hidden');
        } else if (type === 'serve_audience') {
            iconGroup.classList.remove('hidden');
            titleGroup.classList.remove('hidden');
            valGroup.classList.remove('hidden');
        }
    }
</script>
@endsection
