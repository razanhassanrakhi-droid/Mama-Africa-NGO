@extends('admin.layouts.app')

@section('title', __('massage.statistics_section'))
@section('header', __('massage.statistics_section'))

@section('content')
<div class="bg-white p-6 md:p-8 rounded-xl shadow-sm border border-gray-200 focus-within:ring-2 focus-within:ring-blue-100 transition-all max-w-5xl mx-auto">
    <div class="flex items-center justify-between mb-6 pb-4 border-b border-gray-100">
        <h3 class="text-xl font-bold text-gray-800">{{ __('massage.statistics_section') }}</h3>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <form action="{{ route('admin.statistics.update') }}" method="POST">
        @csrf

        <div class="space-y-8">
            <!-- Clean Water -->
            <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                <h4 class="font-semibold text-gray-700 mb-4 border-b pb-2"><i class="fas fa-tint rtl:ml-2 ltr:mr-2"></i> Clean Water</h4>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-sm font-semibold mb-1 text-gray-600">Value <span class="text-red-500">*</span></label>
                        <input type="text" name="cleanwater_value" required value="{{ old('cleanwater_value', $statistic->cleanwater_value ?? __('massage.stats.cleanwater_value')) }}" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="ltr">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-1 text-gray-600">Text (Arabic) <span class="text-red-500">*</span></label>
                        <input type="text" name="cleanwater_text_ar" required value="{{ old('cleanwater_text_ar', $statistic->cleanwater_text_ar ?? __('massage.stats.cleanwater_text', [], 'ar')) }}" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="rtl">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-1 text-gray-600">Text (English) <span class="text-red-500">*</span></label>
                        <input type="text" name="cleanwater_text_en" required value="{{ old('cleanwater_text_en', $statistic->cleanwater_text_en ?? __('massage.stats.cleanwater_text', [], 'en')) }}" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="ltr">
                    </div>
                </div>
            </div>

            <!-- Education -->
            <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                <h4 class="font-semibold text-gray-700 mb-4 border-b pb-2"><i class="fas fa-book rtl:ml-2 ltr:mr-2"></i> Education</h4>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-sm font-semibold mb-1 text-gray-600">Value <span class="text-red-500">*</span></label>
                        <input type="text" name="education_value" required value="{{ old('education_value', $statistic->education_value ?? __('massage.stats.education_value')) }}" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="ltr">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-1 text-gray-600">Text (Arabic) <span class="text-red-500">*</span></label>
                        <input type="text" name="education_text_ar" required value="{{ old('education_text_ar', $statistic->education_text_ar ?? __('massage.stats.education_text', [], 'ar')) }}" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="rtl">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-1 text-gray-600">Text (English) <span class="text-red-500">*</span></label>
                        <input type="text" name="education_text_en" required value="{{ old('education_text_en', $statistic->education_text_en ?? __('massage.stats.education_text', [], 'en')) }}" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="ltr">
                    </div>
                </div>
            </div>

            <!-- Villages -->
            <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                <h4 class="font-semibold text-gray-700 mb-4 border-b pb-2"><i class="fas fa-home rtl:ml-2 ltr:mr-2"></i> Villages</h4>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-sm font-semibold mb-1 text-gray-600">Value <span class="text-red-500">*</span></label>
                        <input type="text" name="villages_value" required value="{{ old('villages_value', $statistic->villages_value ?? __('massage.stats.villages_value')) }}" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="ltr">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-1 text-gray-600">Text (Arabic) <span class="text-red-500">*</span></label>
                        <input type="text" name="villages_text_ar" required value="{{ old('villages_text_ar', $statistic->villages_text_ar ?? __('massage.stats.villages_text', [], 'ar')) }}" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="rtl">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-1 text-gray-600">Text (English) <span class="text-red-500">*</span></label>
                        <input type="text" name="villages_text_en" required value="{{ old('villages_text_en', $statistic->villages_text_en ?? __('massage.stats.villages_text', [], 'en')) }}" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="ltr">
                    </div>
                </div>
            </div>

            <!-- Funds -->
            <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                <h4 class="font-semibold text-gray-700 mb-4 border-b pb-2"><i class="fas fa-dollar-sign rtl:ml-2 ltr:mr-2"></i> Funds</h4>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-sm font-semibold mb-1 text-gray-600">Value <span class="text-red-500">*</span></label>
                        <input type="text" name="funds_value" required value="{{ old('funds_value', $statistic->funds_value ?? __('massage.stats.funds_value')) }}" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="ltr">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-1 text-gray-600">Text (Arabic) <span class="text-red-500">*</span></label>
                        <input type="text" name="funds_text_ar" required value="{{ old('funds_text_ar', $statistic->funds_text_ar ?? __('massage.stats.funds_text', [], 'ar')) }}" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="rtl">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-1 text-gray-600">Text (English) <span class="text-red-500">*</span></label>
                        <input type="text" name="funds_text_en" required value="{{ old('funds_text_en', $statistic->funds_text_en ?? __('massage.stats.funds_text', [], 'en')) }}" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="ltr">
                    </div>
                </div>
            </div>

            <div class="mt-8 flex justify-end">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3.5 px-8 rounded-xl shadow-md hover:shadow-lg transition flex items-center gap-2">
                    <i class="fas fa-save"></i>
                    <span>Save Statistics</span>
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
