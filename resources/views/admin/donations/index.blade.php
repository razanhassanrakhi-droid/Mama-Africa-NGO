@extends('admin.layouts.app')

@section('title', app()->getLocale() == 'ar' ? 'إدارة التبرعات' : 'Donations Management')
@section('header', app()->getLocale() == 'ar' ? 'إدارة التبرعات' : 'Donations')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-6 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h2 class="text-2xl font-bold text-slate-800">{{ app()->getLocale() == 'ar' ? 'سجل التبرعات' : 'Donations Record' }}</h2>
            <p class="text-sm text-slate-500 mt-1">{{ app()->getLocale() == 'ar' ? 'عرض وإدارة جميع معاملات التبرع' : 'View and manage all donation transactions.' }}</p>
        </div>
        
        <div class="flex flex-wrap items-center gap-3">
            <a href="{{ route('admin.donations.export_pdf', request()->all()) }}" class="inline-flex items-center px-4 py-2 bg-rose-600 hover:bg-rose-700 text-white text-sm font-medium rounded-lg shadow-sm transition-colors">
                <i class="fas fa-file-pdf {{ app()->getLocale() == 'ar' ? 'ml-2' : 'mr-2' }}"></i>
                {{ app()->getLocale() == 'ar' ? 'تنزيل PDF' : 'Download PDF' }}
            </a>
        </div>
    </div>

    <!-- Filters -->
    <div class="bg-white p-4 rounded-xl shadow-sm border border-slate-200 mb-6">
        <form action="{{ route('admin.donations.index') }}" method="GET" class="flex flex-wrap items-end gap-4">
            <div class="flex-1 min-w-[200px]">
                <label for="from_date" class="block text-sm font-medium text-slate-700 mb-1">{{ app()->getLocale() == 'ar' ? 'من تاريخ' : 'From Date' }}</label>
                <input type="date" name="from_date" id="from_date" value="{{ request('from_date') }}" 
                    class="w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
            </div>
            
            <div class="flex-1 min-w-[200px]">
                <label for="to_date" class="block text-sm font-medium text-slate-700 mb-1">{{ app()->getLocale() == 'ar' ? 'إلى تاريخ' : 'To Date' }}</label>
                <input type="date" name="to_date" id="to_date" value="{{ request('to_date') }}" 
                    class="w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
            </div>
            
            <div class="flex gap-2">
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg shadow-sm transition-colors">
                    <i class="fas fa-filter {{ app()->getLocale() == 'ar' ? 'ml-2' : 'mr-2' }}"></i>
                    {{ app()->getLocale() == 'ar' ? 'تصفية' : 'Filter' }}
                </button>
                
                @if(request()->hasAny(['from_date', 'to_date']))
                    <a href="{{ route('admin.donations.index') }}" class="inline-flex items-center px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-medium rounded-lg shadow-sm transition-colors">
                        <i class="fas fa-undo {{ app()->getLocale() == 'ar' ? 'ml-2' : 'mr-2' }}"></i>
                        {{ app()->getLocale() == 'ar' ? 'إعادة تعيين' : 'Reset' }}
                    </a>
                @endif
            </div>
        </form>
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
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200">
                <thead class="bg-slate-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 {{ app()->getLocale() == 'ar' ? 'text-right' : 'text-left' }} text-xs font-medium text-slate-500 uppercase tracking-wider">
                            {{ app()->getLocale() == 'ar' ? 'المتبرع' : 'Donor' }}
                        </th>
                        <th scope="col" class="px-6 py-3 {{ app()->getLocale() == 'ar' ? 'text-right' : 'text-left' }} text-xs font-medium text-slate-500 uppercase tracking-wider">
                            {{ app()->getLocale() == 'ar' ? 'المبلغ' : 'Amount' }}
                        </th>
                        <th scope="col" class="px-6 py-3 {{ app()->getLocale() == 'ar' ? 'text-right' : 'text-left' }} text-xs font- medium text-slate-500 uppercase tracking-wider">
                            {{ app()->getLocale() == 'ar' ? 'طريقة الدفع' : 'Method' }}
                        </th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-slate-500 uppercase tracking-wider">
                            {{ app()->getLocale() == 'ar' ? 'الحالة' : 'Status' }}
                        </th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-slate-500 uppercase tracking-wider">
                            {{ app()->getLocale() == 'ar' ? 'التاريخ' : 'Date' }}
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Actions</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-slate-200">
                    @forelse($donations as $donation)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10 flex items-center justify-center rounded-full bg-blue-100 text-blue-600 font-bold text-sm">
                                        {{ mb_substr($donation->donor_name, 0, 1) }}
                                    </div>
                                    <div class="{{ app()->getLocale() == 'ar' ? 'mr-4' : 'ml-4' }}">
                                        <div class="text-sm font-medium text-slate-900">{{ $donation->donor_name }}</div>
                                        <div class="text-sm text-slate-500">{{ $donation->donor_email ?? '-' }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-semibold text-slate-900">${{ number_format($donation->amount, 2) }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-100 text-slate-800">
                                    @if($donation->paymentMethod)
                                        <i class="{{ $donation->paymentMethod->icon ?? 'fas fa-money-bill' }}"></i>
                                        {{ $donation->paymentMethod->name }}
                                    @else
                                        {{ app()->getLocale() == 'ar' ? 'غير معروف' : 'Unknown' }}
                                    @endif
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                @switch($donation->status)
                                    @case('confirmed')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            {{ app()->getLocale() == 'ar' ? 'مؤكد' : 'Confirmed' }}
                                        </span>
                                        @break
                                    @case('pending')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                            {{ app()->getLocale() == 'ar' ? 'قيد الانتظار' : 'Pending' }}
                                        </span>
                                        @break
                                    @case('failed')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                            {{ app()->getLocale() == 'ar' ? 'فشل' : 'Failed' }}
                                        </span>
                                        @break
                                    @case('refunded')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                            {{ app()->getLocale() == 'ar' ? 'مسترد' : 'Refunded' }}
                                        </span>
                                        @break
                                    @default
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            {{ ucfirst($donation->status) }}
                                        </span>
                                @endswitch
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-slate-500">
                                {{ $donation->created_at->format('M d, Y') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap {{ app()->getLocale() == 'ar' ? 'text-left' : 'text-right' }} text-sm font-medium">
                                <a href="{{ route('admin.donations.show', $donation->id) }}" class="text-blue-600 hover:text-blue-900 bg-blue-50 hover:bg-blue-100 px-3 py-1.5 rounded-md transition-colors">
                                    {{ app()->getLocale() == 'ar' ? 'التفاصيل' : 'View' }}
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-10 text-center text-slate-500">
                                <div class="flex flex-col items-center justify-center">
                                    <i class="fas fa-box-open text-4xl mb-3 text-slate-300"></i>
                                    <p class="text-lg font-medium text-slate-600">{{ app()->getLocale() == 'ar' ? 'لا توجد تبرعات حتى الآن.' : 'No donations found yet.' }}</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($donations->hasPages())
            <div class="px-6 py-4 border-t border-slate-200">
                {{ $donations->links('vendor.pagination.tailwind') }}
            </div>
        @endif
    </div>
</div>
@endsection
