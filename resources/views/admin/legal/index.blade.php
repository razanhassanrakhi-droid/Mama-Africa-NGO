@extends('admin.layouts.app')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">{{ app()->getLocale() == 'ar' ? 'إدارة الصفحات القانونية' : 'Legal Pages Management' }}</h1>
    </div>

    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <div class="border-b border-gray-200">
            <nav class="flex -mb-px px-6" aria-label="Tabs">
                <button onclick="switchTab('privacy')" id="tab-privacy" class="w-1/2 py-4 px-1 text-center border-b-2 font-medium text-sm border-blue-500 text-blue-600">
                    {{ app()->getLocale() == 'ar' ? 'سياسة الخصوصية' : 'Privacy Policy' }}
                </button>
                <button onclick="switchTab('terms')" id="tab-terms" class="w-1/2 py-4 px-1 text-center border-b-2 font-medium text-sm border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300">
                    {{ app()->getLocale() == 'ar' ? 'شروط الخدمة' : 'Terms of Service' }}
                </button>
            </nav>
        </div>

        <!-- Privacy Tab -->
        <div id="content-privacy" class="p-6">
            <form action="{{ route('admin.legal.update', $privacy->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Title AR -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">{{ app()->getLocale() == 'ar' ? 'العنوان (عربي)' : 'Title (AR)' }}</label>
                        <input type="text" name="title_ar" value="{{ $privacy->title_ar }}" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <!-- Title EN -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">{{ app()->getLocale() == 'ar' ? 'العنوان (إنجليزي)' : 'Title (EN)' }}</label>
                        <input type="text" name="title_en" value="{{ $privacy->title_en }}" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <!-- Phone -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">{{ app()->getLocale() == 'ar' ? 'أرقام الهاتف (رقم في كل سطر)' : 'Phone Numbers (One per line)' }}</label>
                        <textarea name="phone" rows="2" dir="ltr" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ $privacy->phone }}</textarea>
                    </div>
                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">{{ app()->getLocale() == 'ar' ? 'رسائل البريد الإلكتروني (بريد في كل سطر)' : 'Email Addresses (One per line)' }}</label>
                        <textarea name="email" rows="2" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ $privacy->email }}</textarea>
                    </div>
                </div>

                <div class="mt-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">{{ app()->getLocale() == 'ar' ? 'المقدمة (عربي)' : 'Intro (AR)' }}</label>
                    <textarea name="intro_ar" rows="3" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ $privacy->intro_ar }}</textarea>
                </div>
                <div class="mt-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">{{ app()->getLocale() == 'ar' ? 'المقدمة (إنجليزي)' : 'Intro (EN)' }}</label>
                    <textarea name="intro_en" rows="3" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ $privacy->intro_en }}</textarea>
                </div>

                <div class="mt-6 border-t pt-6">
                    <h3 class="text-lg font-semibold mb-4">{{ app()->getLocale() == 'ar' ? 'الأقسام' : 'Sections' }}</h3>
                    
                    @for($i = 1; $i <= 6; $i++)
                    <div class="mb-8 p-4 bg-gray-50 rounded-lg border">
                        <h4 class="font-bold mb-3 border-b pb-1">Section {{ $i }}</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-medium text-gray-500 mb-1">Title AR</label>
                                <input type="text" name="s{{ $i }}_title_ar" value="{{ $privacy->{'s'.$i.'_title_ar'} }}" class="w-full text-sm border-gray-300 rounded-md">
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-500 mb-1">Title EN</label>
                                <input type="text" name="s{{ $i }}_title_en" value="{{ $privacy->{'s'.$i.'_title_en'} }}" class="w-full text-sm border-gray-300 rounded-md">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-3">
                            <div>
                                <label class="block text-xs font-medium text-gray-500 mb-1">Content AR</label>
                                <textarea name="s{{ $i }}_content_ar" rows="4" class="w-full text-sm border-gray-300 rounded-md">{{ $privacy->{'s'.$i.'_content_ar'} }}</textarea>
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-500 mb-1">Content EN</label>
                                <textarea name="s{{ $i }}_content_en" rows="4" class="w-full text-sm border-gray-300 rounded-md">{{ $privacy->{'s'.$i.'_content_en'} }}</textarea>
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>

                <div class="mt-6">
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition">
                        {{ app()->getLocale() == 'ar' ? 'حفظ التعديلات' : 'Save Changes' }}
                    </button>
                </div>
            </form>
        </div>

        <!-- Terms Tab -->
        <div id="content-terms" class="p-6 hidden">
            <form action="{{ route('admin.legal.update', $terms->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">{{ app()->getLocale() == 'ar' ? 'العنوان (عربي)' : 'Title (AR)' }}</label>
                        <input type="text" name="title_ar" value="{{ $terms->title_ar }}" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">{{ app()->getLocale() == 'ar' ? 'العنوان (إنجليزي)' : 'Title (EN)' }}</label>
                        <input type="text" name="title_en" value="{{ $terms->title_en }}" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <!-- Phone -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">{{ app()->getLocale() == 'ar' ? 'أرقام الهاتف (رقم في كل سطر)' : 'Phone Numbers (One per line)' }}</label>
                        <textarea name="phone" rows="2" dir="ltr" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ $terms->phone }}</textarea>
                    </div>
                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">{{ app()->getLocale() == 'ar' ? 'رسائل البريد الإلكتروني (بريد في كل سطر)' : 'Email Addresses (One per line)' }}</label>
                        <textarea name="email" rows="2" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ $terms->email }}</textarea>
                    </div>
                </div>

                <div class="mt-6 border-t pt-6">
                    <h3 class="text-lg font-semibold mb-4">{{ app()->getLocale() == 'ar' ? 'الأقسام' : 'Sections' }}</h3>
                    
                    @for($i = 1; $i <= 5; $i++)
                    <div class="mb-8 p-4 bg-gray-50 rounded-lg border">
                        <h4 class="font-bold mb-3 border-b pb-1">Section {{ $i }}</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-medium text-gray-500 mb-1">Title AR</label>
                                <input type="text" name="s{{ $i }}_title_ar" value="{{ $terms->{'s'.$i.'_title_ar'} }}" class="w-full text-sm border-gray-300 rounded-md">
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-500 mb-1">Title EN</label>
                                <input type="text" name="s{{ $i }}_title_en" value="{{ $terms->{'s'.$i.'_title_en'} }}" class="w-full text-sm border-gray-300 rounded-md">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-3">
                            <div>
                                <label class="block text-xs font-medium text-gray-500 mb-1">Content AR</label>
                                <textarea name="s{{ $i }}_content_ar" rows="4" class="w-full text-sm border-gray-300 rounded-md">{{ $terms->{'s'.$i.'_content_ar'} }}</textarea>
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-500 mb-1">Content EN</label>
                                <textarea name="s{{ $i }}_content_en" rows="4" class="w-full text-sm border-gray-300 rounded-md">{{ $terms->{'s'.$i.'_content_en'} }}</textarea>
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>

                <div class="mt-6">
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition">
                        {{ app()->getLocale() == 'ar' ? 'حفظ التعديلات' : 'Save Changes' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function switchTab(type) {
        if (type === 'privacy') {
            document.getElementById('content-privacy').classList.remove('hidden');
            document.getElementById('content-terms').classList.add('hidden');
            document.getElementById('tab-privacy').classList.add('border-blue-500', 'text-blue-600');
            document.getElementById('tab-privacy').classList.remove('border-transparent', 'text-gray-500');
            document.getElementById('tab-terms').classList.remove('border-blue-500', 'text-blue-600');
            document.getElementById('tab-terms').classList.add('border-transparent', 'text-gray-500');
        } else {
            document.getElementById('content-privacy').classList.add('hidden');
            document.getElementById('content-terms').classList.remove('hidden');
            document.getElementById('tab-privacy').classList.remove('border-blue-500', 'text-blue-600');
            document.getElementById('tab-privacy').classList.add('border-transparent', 'text-gray-500');
            document.getElementById('tab-terms').classList.add('border-blue-500', 'text-blue-600');
            document.getElementById('tab-terms').classList.remove('border-transparent', 'text-gray-500');
        }
    }
</script>
@endsection
