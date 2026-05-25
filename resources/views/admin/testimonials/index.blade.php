@extends('admin.layouts.app')

@section('title', __('massage.testimonials_management') ?? 'Manage Testimonials')
@section('header', __('massage.testimonials_management') ?? 'Manage Testimonials')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div class="relative w-72">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <i class="fas fa-search text-gray-400"></i>
        </div>
        <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="{{ __('massage.dt_search_testimonials') }}" class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>
    
    <a href="{{ route('admin.testimonials.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg flex items-center gap-2 transition-colors">
        <i class="fas fa-plus"></i>
        <span>{{ __('massage.dt_add_testimonial') }}</span>
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse" id="dataTable">
            <thead class="bg-gray-50 text-gray-600 text-sm uppercase">
                <tr>
                    <th class="py-4 px-6 font-semibold">{{ __('massage.dt_author_name') }}</th>
                    <th class="py-4 px-6 font-semibold hidden md:table-cell">{{ __('massage.dt_comment') }}</th>
                    <th class="py-4 px-6 font-semibold text-center">{{ __('massage.dt_image') }}</th>
                    <th class="py-4 px-6 font-semibold text-center">{{ __('massage.dt_actions') }}</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-gray-700 text-sm">
                @forelse($testimonials as $item)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="py-4 px-6">
                        <div class="font-medium text-gray-900">{{ $item->getTranslation('name', app()->getLocale()) }}</div>
                        <div class="text-xs text-gray-500 mt-1">
                            <span class="font-semibold">AR:</span> {{ $item->getTranslation('name', 'ar') }} | 
                            <span class="font-semibold">EN:</span> {{ $item->getTranslation('name', 'en') }}
                        </div>
                    </td>
                    <td class="py-4 px-6 hidden md:table-cell">
                        <div class="text-gray-600 max-w-sm">
                            {{ \Illuminate\Support\Str::limit($item->getTranslation('comment', app()->getLocale()), 60) }}
                            @if($item->video_link)
                                <div class="mt-2">
                                    <a href="{{ $item->video_link }}" target="_blank" class="inline-flex items-center gap-1.5 text-xs font-semibold text-blue-600 hover:text-blue-700 bg-blue-50 px-2 py-1 rounded">
                                        <i class="fas fa-video"></i> {{ __('massage.watch') ?? 'Watch Video' }}
                                    </a>
                                </div>
                            @endif
                        </div>
                    </td>
                    <td class="py-4 px-6 text-center">
                        @if($item->image)
                            <img src="{{ url('/media/'.$item->image) }}" class="w-12 h-12 rounded-full object-cover mx-auto shadow-sm">
                        @else
                            <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center text-gray-400 mx-auto">
                                <i class="far fa-user"></i>
                            </div>
                        @endif
                    </td>
                    <td class="py-4 px-6 text-center">
                        <div class="flex items-center justify-center gap-2">
                            <a href="{{ route('admin.testimonials.edit', $item->id) }}" class="w-8 h-8 rounded bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white flex items-center justify-center transition-colors" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.testimonials.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this testimonial?');" class="inline">
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
                    <td colspan="4" class="py-8 px-6 text-center text-gray-500">
                        <div class="flex flex-col items-center justify-center gap-3">
                            <i class="far fa-comments text-4xl text-gray-300"></i>
                            <p>{{ __('massage.dt_no_testimonials') }}</p>
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


