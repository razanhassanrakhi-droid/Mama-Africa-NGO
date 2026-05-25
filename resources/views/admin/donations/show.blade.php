@extends('admin.layouts.app')

@section('title', app()->getLocale() == 'ar' ? 'تفاصيل التبرع' : 'Donation Details')
@section('header', app()->getLocale() == 'ar' ? 'تفاصيل التبرع' : 'Donation Details')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-6 flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-bold text-slate-800">{{ app()->getLocale() == 'ar' ? 'تفاصيل التبرع' : 'Donation Details' }} #{{ $donation->id }}</h2>
        </div>
        <a href="{{ route('admin.donations.index') }}" class="inline-flex items-center gap-2 bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-medium py-2 px-4 rounded-lg transition-colors border border-slate-300">
            <i class="fas {{ app()->getLocale() == 'ar' ? 'fa-arrow-right' : 'fa-arrow-left' }}"></i> 
            {{ app()->getLocale() == 'ar' ? 'العودة للقائمة' : 'Back to List' }}
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded-md shadow-sm">
            <div class="flex">
                <div class="flex-shrink-0">
                    <i class="fas fa-check-circle text-green-500"></i>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                </div>
            </div>
        </div>
    @endif

    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="px-6 py-5 border-b border-slate-200 bg-slate-50">
            <h3 class="text-lg font-semibold text-slate-800">{{ app()->getLocale() == 'ar' ? 'معلومات المتبرع والعملية' : 'Donor & Transaction Information' }}</h3>
        </div>
        
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-y-6 gap-x-8">
                
                <!-- Donor Name -->
                <div>
                    <dt class="text-sm font-medium text-slate-500">{{ app()->getLocale() == 'ar' ? 'اسم المتبرع' : 'Donor Name' }}</dt>
                    <dd class="mt-1 text-base font-semibold text-slate-900">{{ $donation->donor_name }}</dd>
                </div>

                <!-- Email -->
                <div>
                    <dt class="text-sm font-medium text-slate-500">{{ app()->getLocale() == 'ar' ? 'البريد الإلكتروني' : 'Email Address' }}</dt>
                    <dd class="mt-1 text-base text-slate-900">{{ $donation->donor_email ?? (app()->getLocale() == 'ar' ? 'غير متوفر' : 'N/A') }}</dd>
                </div>

                <!-- Amount -->
                <div>
                    <dt class="text-sm font-medium text-slate-500">{{ app()->getLocale() == 'ar' ? 'مبلغ التبرع' : 'Donation Amount' }}</dt>
                    <dd class="mt-1 text-2xl font-bold text-green-600">${{ number_format($donation->amount, 2) }}</dd>
                </div>

                <!-- Status -->
                <div>
                    <dt class="text-sm font-medium text-slate-500">{{ app()->getLocale() == 'ar' ? 'حالة العملية' : 'Transaction Status' }}</dt>
                    <dd class="mt-1">
                        @switch($donation->status)
                            @case('confirmed')
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                    <i class="fas fa-check-circle mr-1.5 ml-1.5"></i> {{ app()->getLocale() == 'ar' ? 'مؤكد' : 'Confirmed' }}
                                </span>
                                @break
                            @case('pending')
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                                    <i class="fas fa-clock mr-1.5 ml-1.5"></i> {{ app()->getLocale() == 'ar' ? 'قيد الانتظار' : 'Pending' }}
                                </span>
                                @break
                            @case('failed')
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                    <i class="fas fa-times-circle mr-1.5 ml-1.5"></i> {{ app()->getLocale() == 'ar' ? 'فشل' : 'Failed' }}
                                </span>
                                @break
                            @case('refunded')
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-800">
                                    <i class="fas fa-undo mr-1.5 ml-1.5"></i> {{ app()->getLocale() == 'ar' ? 'مسترد' : 'Refunded' }}
                                </span>
                                @break
                            @default
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                    {{ ucfirst($donation->status) }}
                                </span>
                        @endswitch
                    </dd>
                </div>

                <!-- Payment Method -->
                <div>
                    <dt class="text-sm font-medium text-slate-500">{{ app()->getLocale() == 'ar' ? 'طريقة الدفع' : 'Payment Method' }}</dt>
                    <dd class="mt-1 text-base text-slate-900 border-l-4 border-blue-500 pl-3">
                        <span class="font-semibold">{{ $donation->paymentMethod->name ?? (app()->getLocale() == 'ar' ? 'غير معروف' : 'Unknown') }}</span>
                    </dd>
                </div>

                <!-- Transaction Reference -->
                <div>
                    <dt class="text-sm font-medium text-slate-500">{{ app()->getLocale() == 'ar' ? 'الرقم المرجعي للعملية' : 'Transaction Reference' }}</dt>
                    <dd class="mt-1 text-sm font-mono bg-slate-100 text-slate-800 py-1 px-2 rounded inline-block">
                        {{ $donation->transaction_reference ?? (app()->getLocale() == 'ar' ? 'غير متوفر' : 'N/A') }}
                    </dd>
                </div>

                <!-- Donor Message -->
                <div class="md:col-span-2">
                    <dt class="text-sm font-medium text-slate-500">{{ app()->getLocale() == 'ar' ? 'رسالة المتبرع' : 'Donor Message' }}</dt>
                    <dd class="mt-2 text-base text-slate-700 bg-amber-50 rounded-lg p-4 border border-amber-100 italic">
                        "{{ $donation->message ?? (app()->getLocale() == 'ar' ? 'لم يترك المتبرع رسالة.' : 'No message provided.') }}"
                    </dd>
                </div>

                <!-- Date -->
                <div class="md:col-span-2">
                    <dt class="text-sm font-medium text-slate-500">{{ app()->getLocale() == 'ar' ? 'تاريخ العملية' : 'Date Submitted' }}</dt>
                    <dd class="mt-1 text-sm text-slate-600">
                        {{ $donation->created_at->format('F d, Y - h:i A') }}
                    </dd>
                </div>

            </div>
        </div>
        
        <div class="px-6 py-5 border-t border-slate-200 bg-slate-50">
            <h4 class="text-sm font-medium text-slate-800 mb-3">{{ app()->getLocale() == 'ar' ? 'تحديث حالة التبرع' : 'Update Donation Status' }}</h4>
            <form action="{{ route('admin.donations.update_status', $donation->id) }}" method="POST" class="flex flex-col sm:flex-row items-center gap-3">
                @csrf
                @method('PATCH')
                <div class="w-full sm:w-1/2">
                    <select name="status" class="w-full rounded-md border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" required>
                        <option value="pending" {{ $donation->status == 'pending' ? 'selected' : '' }}>{{ app()->getLocale() == 'ar' ? 'قيد الانتظار' : 'Pending' }}</option>
                        <option value="confirmed" {{ $donation->status == 'confirmed' ? 'selected' : '' }}>{{ app()->getLocale() == 'ar' ? 'مؤكد' : 'Confirmed' }}</option>
                        <option value="failed" {{ $donation->status == 'failed' ? 'selected' : '' }}>{{ app()->getLocale() == 'ar' ? 'فشل' : 'Failed' }}</option>
                        <option value="refunded" {{ $donation->status == 'refunded' ? 'selected' : '' }}>{{ app()->getLocale() == 'ar' ? 'مسترد' : 'Refunded' }}</option>
                    </select>
                </div>
                <button type="submit" class="w-full sm:w-auto inline-flex justify-center items-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                    <i class="fas fa-save mr-2 ml-2"></i> {{ app()->getLocale() == 'ar' ? 'تحديث الحالة' : 'Update Status' }}
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
