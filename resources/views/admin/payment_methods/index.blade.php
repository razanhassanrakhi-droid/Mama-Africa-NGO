@extends('admin.layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    
    <div class="mb-6 flex justify-between items-center px-2">
        <div>
            <h2 class="text-2xl font-bold text-slate-800">{{ app()->getLocale() == 'ar' ? 'طرق الدفع' : 'Payment Methods' }}</h2>
            <p class="text-sm text-slate-500 mt-1">{{ app()->getLocale() == 'ar' ? 'إدارة طرق الدفع المتاحة للتبرعات مثل التحويل البنكي، موبايل موني وغيرها.' : 'Manage available payment methods for donations such as Bank Transfer, Mobile Money, etc.' }}</p>
        </div>
        <a href="{{ route('admin.payment_methods.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg shadow-sm transition-colors flex items-center gap-2 text-sm">
            <i class="fas fa-plus"></i>
            {{ app()->getLocale() == 'ar' ? 'إضافة طريقة دفع' : 'Add New Method' }}
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded-md shadow-sm">
            <div class="flex">
                <div class="flex-shrink-0">
                    <i class="fas fa-check-circle text-green-400"></i>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                </div>
            </div>
        </div>
    @endif

    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 text-slate-500 text-xs uppercase tracking-wider border-b border-slate-200">
                        <th class="px-6 py-4 font-semibold">{{ app()->getLocale() == 'ar' ? 'الاسم' : 'Name / Icon' }}</th>
                        <th class="px-6 py-4 font-semibold">{{ app()->getLocale() == 'ar' ? 'النوع' : 'Type' }}</th>
                        <th class="px-6 py-4 font-semibold text-center">{{ app()->getLocale() == 'ar' ? 'الحالة' : 'Status' }}</th>
                        <th class="px-6 py-4 font-semibold text-right">{{ app()->getLocale() == 'ar' ? 'الإجراءات' : 'Actions' }}</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm">
                    @forelse($paymentMethods as $method)
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-lg bg-blue-50 text-blue-500 flex items-center justify-center flex-shrink-0 overflow-hidden border border-slate-100 shadow-sm">
                                    @if($method->logo && Storage::disk('public')->exists($method->logo))
                                        <img src="{{ url('/media/' . $method->logo) }}" class="w-full h-full object-contain" alt="{{ $method->name }}">
                                    @else
                                        <i class="{{ $method->icon ?: 'fas fa-money-bill-wave' }} text-lg"></i>
                                    @endif
                                </div>
                                <div>
                                    <div class="font-medium text-slate-800">{{ $method->getTranslation('name', app()->getLocale()) }}</div>
                                    @if($method->description)
                                    <div class="text-xs text-slate-500 mt-0.5 truncate max-w-xs">{{ $method->description }}</div>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium bg-slate-100 text-slate-700 border border-slate-200">
                                {{ ucfirst(str_replace('_', ' ', $method->type)) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            @if($method->is_active)
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-green-50 text-green-700 border border-green-200">
                                    <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span> Active
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-slate-100 text-slate-600 border border-slate-200">
                                    <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Inactive
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-3">
                                <a href="{{ route('admin.payment_methods.edit', $method->id) }}" class="text-blue-500 hover:text-blue-700 transition-colors flex items-center gap-1" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.payment_methods.destroy', $method->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-rose-500 hover:text-rose-700 transition-colors flex items-center gap-1" onclick="return confirm('{{ app()->getLocale() == 'ar' ? 'هل أنت متأكد من حذف طريقة الدفع هذه؟' : 'Are you sure you want to delete this payment method?' }}')" title="Delete">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-12 text-center text-slate-500">
                            <div class="flex flex-col items-center justify-center">
                                <i class="fas fa-credit-card text-4xl text-slate-300 mb-3"></i>
                                <p>{{ app()->getLocale() == 'ar' ? 'لا توجد طرق دفع مضافة حالياً.' : 'No payment methods found.' }}</p>
                                <a href="{{ route('admin.payment_methods.create') }}" class="text-blue-600 hover:text-blue-700 text-sm mt-2 font-medium">
                                    {{ app()->getLocale() == 'ar' ? 'أضف طريقة الدفع الأولى الآن' : 'Add your first payment method' }}
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection


