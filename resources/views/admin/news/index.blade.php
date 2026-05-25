@extends('admin.layouts.app')

@section('title', __('massage.news') ?? 'Manage News')
@section('header', __('massage.news') ?? 'Manage News')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div class="relative w-72">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <i class="fas fa-search text-gray-400"></i>
        </div>
        <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="{{ __('massage.dt_search_news') }}" class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>
    
    <a href="{{ route('admin.news.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg flex items-center gap-2 transition-colors">
        <i class="fas fa-plus"></i>
        <span>{{ __('massage.dt_add_news') }}</span>
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse" id="dataTable">
            <thead class="bg-gray-50 text-gray-600 text-sm uppercase">
                <tr>
                    <th class="py-4 px-6 font-semibold">{{ __('massage.dt_title') }}</th>
                    <th class="py-4 px-6 font-semibold">{{ __('massage.dt_project') }}</th>
                    <th class="py-4 px-6 font-semibold">{{ __('massage.dt_cost') }}</th>
                    <th class="py-4 px-6 font-semibold hidden md:table-cell">{{ app()->getLocale() == 'ar' ? 'تاريخ النشر' : 'Date' }}</th>
                    <th class="py-4 px-6 font-semibold hidden lg:table-cell">{{ __('massage.dt_details_link') }}</th>
                    <th class="py-4 px-6 font-semibold text-center">{{ __('massage.dt_image') }}</th>
                    <th class="py-4 px-6 font-semibold text-center">{{ __('massage.dt_actions') }}</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-gray-700 text-sm">
                @forelse($news as $item)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="py-4 px-6">
                        <div class="font-medium text-gray-900">{{ $item->getTranslation('title', app()->getLocale()) }}</div>
                        <div class="text-xs text-gray-500 mt-1">
                            <span class="font-semibold">AR:</span> {{ \Illuminate\Support\Str::limit($item->getTranslation('title', 'ar'), 20) }} | 
                            <span class="font-semibold">EN:</span> {{ \Illuminate\Support\Str::limit($item->getTranslation('title', 'en'), 20) }}
                        </div>
                    </td>
                    <td class="py-4 px-6 text-gray-800">
                        {{ $item->project->name ?? 'بدون مشروع' }}
                    </td>
                    <td class="py-4 px-6">
                        <span class="bg-purple-100 text-purple-700 py-1 px-3 rounded-full text-xs font-bold">
                            {{ number_format((float)$item->pay, 2) }}
                        </span>
                    </td>
                    <td class="py-4 px-6 hidden md:table-cell">
                        @if($item->published_at)
                            <span class="inline-flex items-center gap-1 bg-blue-50 text-blue-700 py-1 px-2 rounded-full text-xs font-semibold">
                                <i class="fas fa-calendar-alt text-blue-400"></i>
                                {{ $item->published_at->format('Y-m-d') }}
                            </span>
                        @else
                            <span class="text-gray-400 text-xs">—</span>
                        @endif
                    </td>
                    <td class="py-4 px-6 hidden lg:table-cell">
                        <div class="text-gray-600 truncate max-w-xs">{{ \Illuminate\Support\Str::limit($item->getTranslation('details', app()->getLocale()), 40) }}</div>
                        @if($item->youtube_link)
                            <a href="{{ $item->youtube_link }}" target="_blank" class="text-blue-500 hover:text-blue-700 text-xs flexItems-center gap-1 mt-1">
                                <i class="fab fa-youtube text-red-500"></i> Video Link
                            </a>
                        @endif
                    </td>
                    <td class="py-4 px-6 text-center">
                        @if($item->image)
                            <img src="{{ url('/media/'.$item->image) }}" class="w-12 h-12 rounded-lg object-cover mx-auto shadow-sm" onerror="this.onerror=null;this.outerHTML='<div class=\'w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400 mx-auto\'><i class=\'fas fa-image\'></i></div>';">
                        @else
                            <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400 mx-auto">
                                <i class="fas fa-image"></i>
                            </div>
                        @endif
                    </td>
                    <td class="py-4 px-6 text-center">
                        <div class="flex items-center justify-center gap-2">
                            <a href="{{ route('admin.news.edit', $item->id) }}" class="w-8 h-8 rounded bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white flex items-center justify-center transition-colors" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this news?');" class="inline">
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
                    <td colspan="7" class="py-8 px-6 text-center text-gray-500">
                        <div class="flex flex-col items-center justify-center gap-3">
                            <i class="far fa-newspaper text-4xl text-gray-300"></i>
                            <p>{{ __('massage.dt_no_news') }}</p>
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
        if(row.cells.length === 1) return; // Skip empty row
        const rowText = Array.from(row.cells).map(cell => cell.innerText.toLowerCase()).join(" ");
        row.style.display = rowText.includes(filter) ? "" : "none";
    });
}
</script>
@endpush


