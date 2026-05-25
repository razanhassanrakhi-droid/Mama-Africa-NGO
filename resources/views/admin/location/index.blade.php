@extends('admin.layouts.app')

@section('title', app()->getLocale() === 'ar' ? 'المواقع الجغرافية' : 'Locations')
@section('header', app()->getLocale() === 'ar' ? 'المواقع الجغرافية للأنشطة' : 'Activity Locations')

@section('content')
<div class="px-4 py-6" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

    <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
        <h4 class="text-2xl font-bold text-gray-800 m-0">
            {{ app()->getLocale() === 'ar' ? 'إدارة مواقع الأنشطة' : 'Manage Activity Locations' }}
        </h4>
        <a href="{{ route('admin.location.create') }}" class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-full shadow-md transition-all flex items-center gap-2">
            <i class="fas fa-plus"></i> 
            {{ app()->getLocale() === 'ar' ? 'إضافة موقع جديد' : 'Add New Location' }}
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-right text-sm text-gray-600">
                <thead class="bg-gray-50 text-gray-700 text-xs uppercase font-semibold">
                    <tr>
                        <th class="px-6 py-4">{{ app()->getLocale() === 'ar' ? 'اسم الموقع' : 'Location Name' }}</th>
                        <th class="px-6 py-4">{{ app()->getLocale() === 'ar' ? 'الوصف (عربي)' : 'Description (AR)' }}</th>
                        <th class="px-6 py-4 font-semibold text-gray-700 whitespace-nowrap">{{ app()->getLocale() === 'ar' ? 'الإحداثيات (خط العرض / الطول)' : 'Coordinates (Lat / Lng)' }}</th>
                        <th class="px-6 py-4 text-center">{{ app()->getLocale() === 'ar' ? 'الإجراءات' : 'Actions' }}</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($locations as $loc)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="font-bold text-gray-800 text-base mb-1">{{ $loc->name_ar }}</div>
                            <div class="text-xs text-gray-500 font-mono" dir="ltr">{{ $loc->name_en }}</div>
                        </td>
                        <td class="px-6 py-4 max-w-xs">
                            <div class="truncate text-gray-600" title="{{ $loc->activity_description_ar }}">
                                {{ $loc->activity_description_ar ?? (app()->getLocale() === 'ar' ? 'لا يوجد وصف' : 'No description') }}
                            </div>
                        </td>
                        <td class="px-6 py-4 align-top">
                            @if($loc->latitude && $loc->longitude)
                            <button type="button" onclick="openAdminMapModal({{ $loc->latitude }}, {{ $loc->longitude }}, {{ \Illuminate\Support\Js::from($loc->name_ar) }})" class="text-sm font-semibold text-blue-600 bg-blue-50 hover:bg-blue-100 px-3 py-2 rounded-lg inline-flex items-center gap-2 border border-blue-100 transition-colors mb-2">
                                <i class="fas fa-map-marker-alt"></i> {{ app()->getLocale() === 'ar' ? 'عرض على الخريطة' : 'View on Map' }}
                            </button>
                            <br>
                            @endif
                            <div class="text-xs font-mono text-gray-500 bg-gray-50 px-2 py-1 rounded inline-block border border-gray-100">
                                Lat: {{ $loc->latitude ?? 'N/A' }} | Lng: {{ $loc->longitude ?? 'N/A' }}
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <div class="inline-flex rounded-lg shadow-sm">
                                <a href="{{ route('admin.location.edit', $loc->id) }}" title="{{ app()->getLocale() === 'ar' ? 'تعديل' : 'Edit' }}"
                                   class="px-3 py-2 bg-white border border-gray-200 text-blue-600 hover:bg-blue-50 hover:text-blue-700 rounded-s-lg transition-colors focus:z-10 focus:ring-2 focus:ring-blue-500">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.location.destroy', $loc->id) }}" method="POST" class="inline" 
                                      onsubmit="return confirm('{{ app()->getLocale() === 'ar' ? 'هل أنت متأكد من حذف هذا الموقع؟' : 'Are you sure you want to delete this location?' }}');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="{{ app()->getLocale() === 'ar' ? 'حذف' : 'Delete' }}"
                                            class="px-3 py-2 bg-white border border-s-0 border-gray-200 text-red-600 hover:bg-red-50 hover:text-red-700 rounded-e-lg transition-colors focus:z-10 focus:ring-2 focus:ring-red-500">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-12 text-center text-gray-500">
                            <div class="mb-4">
                                <i class="fas fa-map-marked-alt text-5xl text-gray-300"></i>
                            </div>
                            <h5 class="text-lg font-bold text-gray-700 mb-2">
                                {{ app()->getLocale() === 'ar' ? 'لا توجد مواقع مضافة حالياً' : 'No locations added yet' }}
                            </h5>
                            <p class="text-sm mb-4">
                                {{ app()->getLocale() === 'ar' ? 'ابدأ بإضافة أول موقع لنشاطك ليظهر في الصفحة الرئيسية.' : 'Start by adding your first activity location to display it on the homepage.' }}
                            </p>
                            <a href="{{ route('admin.location.create') }}" class="inline-block px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-full transition-colors">
                                {{ app()->getLocale() === 'ar' ? 'إضافة موقع الآن' : 'Add Location Now' }}
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

    {{-- Admin Map Modal using Tailwind --}}
    <div id="adminMapModal" class="fixed inset-0 z-[100] hidden bg-black/50 backdrop-blur-sm items-center justify-center p-4 custom-modal-transition">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-4xl overflow-hidden transform transition-all">
            <div class="flex justify-between items-center p-4 border-b border-gray-100 bg-gray-50">
                <h5 class="text-lg font-bold text-gray-800 flex items-center gap-2 m-0" id="adminModalLocName">
                    <i class="fas fa-globe-africa text-blue-600"></i>
                    <span>Map Preview</span>
                </h5>
                <button type="button" onclick="closeAdminMapModal()" class="text-gray-400 hover:text-gray-700 hover:bg-gray-200 rounded-full w-8 h-8 flex items-center justify-center transition-colors">
                    <i class="fas fa-times text-lg"></i>
                </button>
            </div>
            <div class="p-0 bg-gray-100">
                <iframe id="adminModalMapIframe" width="100%" height="500" frameborder="0" style="border:0; display:block;" allowfullscreen></iframe>
            </div>
        </div>
    </div>

    <script>
        function openAdminMapModal(lat, lng, name) {
            document.getElementById('adminModalLocName').querySelector('span').innerText = name;
            let mapUrl = `https://maps.google.com/maps?q=${lat},${lng}&t=&z=6&ie=UTF8&iwloc=&output=embed`;
            document.getElementById('adminModalMapIframe').src = mapUrl;
            document.getElementById('adminMapModal').classList.remove('hidden');
            document.getElementById('adminMapModal').classList.add('flex');
        }
        function closeAdminMapModal() {
            document.getElementById('adminMapModal').classList.add('hidden');
            document.getElementById('adminMapModal').classList.remove('flex');
            // Slight delay before clearing iframe to avoid flash
            setTimeout(() => {
                document.getElementById('adminModalMapIframe').src = '';
            }, 300);
        }
    </script>
@endsection
