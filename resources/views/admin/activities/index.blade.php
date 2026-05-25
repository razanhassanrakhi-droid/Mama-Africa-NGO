@extends('admin.layouts.app')

@section('title', (app()->getLocale() == 'ar' ? 'إدارة أنشطة ' : 'Manage Activities - ') . $project->getTranslation('name', app()->getLocale()))
@section('header', (app()->getLocale() == 'ar' ? 'إدارة أنشطة ' : 'Manage Activities - ') . $project->getTranslation('name', app()->getLocale()))

@section('content')
<div class="mb-6 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
    <div class="flex items-center gap-2">
        <a href="{{ route('admin.projects.index') }}" class="w-8 h-8 rounded bg-gray-100 text-gray-600 hover:bg-gray-200 flex items-center justify-center transition-colors">
            <i class="fas {{ app()->getLocale() == 'ar' ? 'fa-arrow-left' : 'fa-arrow-right' }}"></i>
        </a>
        <div class="relative w-72">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="fas fa-search text-gray-400"></i>
            </div>
            <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="{{ app()->getLocale() == 'ar' ? 'بحث عن أنشطة...' : 'Search activities...' }}" class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
    </div>
    
    <a href="{{ route('admin.projects.activities.create', $project->id) }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg flex items-center gap-2 transition-colors">
        <i class="fas fa-plus"></i>
        <span>{{ app()->getLocale() == 'ar' ? 'إضافة نشاط جديد' : 'Add New Activity' }}</span>
    </a>
</div>

@if(session('success'))
<div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-lg flex items-center gap-3">
    <i class="fas fa-check-circle text-lg"></i>
    <span>{{ session('success') }}</span>
</div>
@endif

<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse" id="dataTable">
            <thead class="bg-gray-50 text-gray-600 text-sm uppercase">
                <tr>
                    <th class="py-4 px-6 font-semibold">{{ app()->getLocale() == 'ar' ? 'عنوان النشاط' : 'Activity Title' }}</th>
                    <th class="py-4 px-6 font-semibold">{{ app()->getLocale() == 'ar' ? 'الموقع والتاريخ' : 'Location & Date' }}</th>
                    <th class="py-4 px-6 font-semibold">{{ app()->getLocale() == 'ar' ? 'التمويل والمبلغ' : 'Funding & Amount' }}</th>
                    <th class="py-4 px-6 font-semibold text-center">{{ app()->getLocale() == 'ar' ? 'الأيقونة' : 'Icon' }}</th>
                    <th class="py-4 px-6 font-semibold text-center">{{ app()->getLocale() == 'ar' ? 'الحالة' : 'Status' }}</th>
                    <th class="py-4 px-6 font-semibold text-center">{{ app()->getLocale() == 'ar' ? 'العمليات' : 'Actions' }}</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-gray-700 text-sm">
                @forelse($activities as $item)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="py-4 px-6">
                        <div class="font-medium text-gray-900">{{ $item->getTranslation('title', app()->getLocale()) }}</div>
                        <div class="text-xs text-gray-500 mt-1 max-w-sm truncate">
                            {{ \Illuminate\Support\Str::limit($item->getTranslation('description', app()->getLocale()), 60) }}
                        </div>
                    </td>
                    <td class="py-4 px-6">
                        <div class="font-medium text-gray-800">{{ $item->getTranslation('location', app()->getLocale()) }}</div>
                        <div class="text-xs text-gray-500 mt-0.5">
                            <i class="far fa-calendar-alt mr-1"></i> {{ $item->getTranslation('date', app()->getLocale()) }}
                        </div>
                    </td>
                    <td class="py-4 px-6">
                        <div class="font-medium text-gray-800">{{ $item->getTranslation('funded_by', app()->getLocale()) }}</div>
                        <div class="text-xs text-blue-600 font-semibold mt-0.5">
                            <i class="fas fa-hand-holding-usd mr-1"></i> {{ $item->amount ?: 'N/A' }}
                        </div>
                    </td>
                    <td class="py-4 px-6 text-center">
                        <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-blue-50 text-blue-600 shadow-sm" title="{{ $item->icon ?: 'Inherited Project Icon' }}">
                            <i class="{{ $item->effective_icon }}"></i>
                        </span>
                    </td>
                    <td class="py-4 px-6 text-center">
                        @if($item->getTranslation('status', 'en'))
                            <span class="px-2.5 py-1 rounded-full text-xs font-semibold {{ str_contains(strtolower($item->getTranslation('status', 'en')), 'complete') || str_contains(strtolower($item->getTranslation('status', 'en')), 'done') || str_contains($item->getTranslation('status', 'ar'), 'مكتمل') || str_contains($item->getTranslation('status', 'ar'), 'تم') ? 'bg-green-50 text-green-700 border border-green-200' : 'bg-blue-50 text-blue-700 border border-blue-200' }}">
                                {{ $item->getTranslation('status', app()->getLocale()) }}
                            </span>
                        @else
                            <span class="text-gray-400">-</span>
                        @endif
                    </td>
                    <td class="py-4 px-6 text-center">
                        <div class="flex items-center justify-center gap-2">
                            <a href="{{ route('admin.projects.activities.edit', [$project->id, $item->id]) }}" class="w-8 h-8 rounded bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white flex items-center justify-center transition-colors" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.projects.activities.destroy', [$project->id, $item->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this activity?');" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-8 h-8 rounded bg-red-50 text-red-600 hover:bg-red-600 hover:text-white flex items-center justify-center transition-colors" title="Delete">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="py-12 px-6 text-center text-gray-500">
                        <div class="flex flex-col items-center justify-center gap-3">
                            <i class="fas fa-tasks text-4xl text-gray-300"></i>
                            <p class="font-medium">{{ app()->getLocale() == 'ar' ? 'لا توجد أنشطة مضافة لهذا المشروع بعد.' : 'No activities added for this project yet.' }}</p>
                            <a href="{{ route('admin.projects.activities.create', $project->id) }}" class="mt-2 text-sm text-blue-600 hover:text-blue-700 font-semibold underline">
                                {{ app()->getLocale() == 'ar' ? 'أضف أول نشاط الآن' : 'Add the first activity now' }}
                            </a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<script>
function searchTable() {
    const filter = document.getElementById("searchInput").value.toLowerCase();
    const rows = document.querySelectorAll("#dataTable tbody tr");

    rows.forEach(row => {
        if(row.cells.length === 1) return;
        const rowText = Array.from(row.cells).map(cell => cell.innerText.toLowerCase()).join(" ");
        row.style.display = rowText.includes(filter) ? "" : "none";
    });
}
</script>
@endpush
