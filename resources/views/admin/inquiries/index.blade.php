@extends('admin.layouts.app')

@section('title', __('massage.inquiries') ?? 'User Inquiries')
@section('header', __('massage.inquiries') ?? 'User Inquiries')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div class="relative w-72">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <i class="fas fa-search text-gray-400"></i>
        </div>
        <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="{{ __('massage.dt_search_inquiries') }}" class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse" id="dataTable">
            <thead class="bg-gray-50 text-gray-600 text-sm uppercase">
                <tr>
                    <th class="py-4 px-6 font-semibold">{{ __('massage.dt_date') }}</th>
                    <th class="py-4 px-6 font-semibold">{{ __('massage.dt_sender_details') }}</th>
                    <th class="py-4 px-6 font-semibold">{{ __('massage.dt_message') }}</th>
                    <th class="py-4 px-6 font-semibold text-center">{{ __('massage.dt_actions') }}</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-gray-700 text-sm">
                @forelse($inquiries as $inquiry)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="py-4 px-6 whitespace-nowrap text-gray-500 text-xs">
                        {{ $inquiry->created_at->format('Y-m-d H:i') }}
                    </td>
                    <td class="py-4 px-6">
                        <div class="font-medium text-gray-900">{{ $inquiry->full_name }}</div>
                        <a href="mailto:{{ $inquiry->email }}" class="text-xs text-blue-500 hover:underline mt-1 block">
                            <i class="fas fa-envelope mr-1"></i>{{ $inquiry->email }}
                        </a>
                    </td>
                    <td class="py-4 px-6">
                        <div class="text-gray-600 max-w-lg whitespace-pre-line">{{ $inquiry->message }}</div>
                    </td>
                    <td class="py-4 px-6 text-center">
                        <form action="{{ route('admin.inquiries.destroy', $inquiry->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this inquiry?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-8 h-8 rounded bg-red-50 text-red-600 hover:bg-red-600 hover:text-white flex items-center justify-center transition-colors mx-auto" title="Delete">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="py-8 px-6 text-center text-gray-500">
                        <div class="flex flex-col items-center justify-center gap-3">
                            <i class="far fa-envelope-open text-4xl text-gray-300"></i>
                            <p>{{ __('massage.dt_no_inquiries') }}</p>
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
