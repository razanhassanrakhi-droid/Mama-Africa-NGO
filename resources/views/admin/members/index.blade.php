@extends('admin.layouts.app')

@section('title', __('massage.members') ?? 'Manage Team Members')
@section('header', __('massage.members') ?? 'Manage Team Members')

@section('content')
<div class="mb-6 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
    <h2 class="text-2xl font-bold text-gray-800">{{ __('massage.members') ?? 'Manage Team Members' }}</h2>
    <div class="flex items-center gap-3 w-full md:w-auto">
        <div class="relative flex-1 md:w-72">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="fas fa-search text-gray-400"></i>
            </div>
            <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="{{ __('massage.dt_search_members') }}" class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        
        <a href="{{ route('admin.members.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg flex items-center gap-2 transition-colors whitespace-nowrap">
            <i class="fas fa-plus"></i>
            <span>{{ __('massage.dt_add_member') }}</span>
        </a>
    </div>
</div>

<!-- Team Section Settings Card -->
<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden mb-6">
    <div class="px-6 py-4 border-b border-gray-200 bg-gray-50 flex justify-between items-center cursor-pointer" onclick="document.getElementById('settingsForm').classList.toggle('hidden')">
        <h3 class="font-bold text-gray-800 flex items-center gap-2">
            <i class="fas fa-cog text-blue-600"></i> 
            {{ app()->getLocale() == 'ar' ? 'إعدادات قسم فريق العمل' : 'Team Section Settings' }}
        </h3>
        <button type="button" class="text-gray-500 hover:text-gray-700">
            <i class="fas fa-chevron-down"></i>
        </button>
    </div>
    <div id="settingsForm" class="hidden px-6 py-5">
        <form action="{{ route('admin.members.updateSettings') }}" method="POST">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- English Title -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Section Title (EN)</label>
                    <input type="text" name="title_en" value="{{ old('title_en', $teamSetting->title_en) }}" class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors" placeholder="Our Team Members">
                </div>
                
                <!-- Arabic Title -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">عنوان القسم (AR)</label>
                    <input type="text" name="title_ar" value="{{ old('title_ar', $teamSetting->title_ar) }}" dir="rtl" class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors" placeholder="أعضاء فريقنا">
                </div>
                
                <!-- English Description -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Section Description (EN)</label>
                    <textarea name="desc_en" rows="3" class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors" placeholder="Dedicated organizers and team members...">{{ old('desc_en', $teamSetting->desc_en) }}</textarea>
                </div>
                
                <!-- Arabic Description -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">وصف القسم (AR)</label>
                    <textarea name="desc_ar" rows="3" dir="rtl" class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors" placeholder="منظمون وأعضاء فريق متفانون...">{{ old('desc_ar', $teamSetting->desc_ar) }}</textarea>
                </div>
            </div>
            
            <div class="flex justify-end">
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-6 rounded-lg flex items-center gap-2 transition-colors">
                    <i class="fas fa-save"></i>
                    <span>{{ app()->getLocale() == 'ar' ? 'حفظ الإعدادات' : 'Save Settings' }}</span>
                </button>
            </div>
        </form>
    </div>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse" id="dataTable">
            <thead class="bg-gray-50 text-gray-600 text-sm uppercase">
                <tr>
                    <th class="py-4 px-6 font-semibold">{{ __('massage.dt_name') }}</th>
                    <th class="py-4 px-6 font-semibold hidden md:table-cell">{{ __('massage.dt_position') }}</th>
                    <th class="py-4 px-6 font-semibold hidden lg:table-cell">{{ __('massage.dt_role') }}</th>
                    <th class="py-4 px-6 font-semibold text-center">{{ __('massage.dt_image') }}</th>
                    <th class="py-4 px-6 font-semibold text-center">{{ __('massage.dt_actions') }}</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-gray-700 text-sm">
                @forelse($members as $item)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="py-4 px-6">
                        <div class="font-medium text-gray-900">{{ $item->getTranslation('name', app()->getLocale()) }}</div>
                        <div class="text-xs text-gray-500 mt-1">
                            <span class="font-semibold">AR:</span> {{ \Illuminate\Support\Str::limit($item->getTranslation('name', 'ar'), 20) }} | 
                            <span class="font-semibold">EN:</span> {{ \Illuminate\Support\Str::limit($item->getTranslation('name', 'en'), 20) }}
                        </div>
                    </td>
                    <td class="py-4 px-6 hidden md:table-cell">
                        <div class="font-medium">{{ $item->getTranslation('position', app()->getLocale()) }}</div>
                        <div class="text-xs text-gray-500 mt-1">
                            AR: {{ $item->getTranslation('position', 'ar') }} | EN: {{ $item->getTranslation('position', 'en') }}
                        </div>
                    </td>
                    <td class="py-4 px-6 hidden lg:table-cell">
                        <div class="font-medium">{{ $item->getTranslation('role', app()->getLocale()) }}</div>
                        <div class="text-xs text-gray-500 mt-1">
                            AR: {{ $item->getTranslation('role', 'ar') }} | EN: {{ $item->getTranslation('role', 'en') }}
                        </div>
                    </td>
                    <td class="py-4 px-6 text-center">
                        @if($item->image)
                            <img src="{{ url('/media/'.$item->image) }}" class="w-12 h-12 rounded-full object-cover mx-auto shadow-sm">
                        @else
                            <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center text-gray-400 mx-auto">
                                <i class="fas fa-user"></i>
                            </div>
                        @endif
                    </td>
                    <td class="py-4 px-6 text-center">
                        <div class="flex items-center justify-center gap-2">
                            <a href="{{ route('admin.members.edit', $item->id) }}" class="w-8 h-8 rounded bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white flex items-center justify-center transition-colors" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.members.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this member?');" class="inline">
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
                    <td colspan="5" class="py-8 px-6 text-center text-gray-500">
                        <div class="flex flex-col items-center justify-center gap-3">
                            <i class="fas fa-users text-4xl text-gray-300"></i>
                            <p>{{ __('massage.dt_no_members') }}</p>
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


