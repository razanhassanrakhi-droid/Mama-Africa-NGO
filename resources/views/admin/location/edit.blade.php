@extends('admin.layouts.app')

@section('title', app()->getLocale() === 'ar' ? 'تعديل الموقع' : 'Edit Location')
@section('header', app()->getLocale() === 'ar' ? 'تعديل بيانات الموقع (v2)' : 'Edit Location Data (v2)')

@section('content')
<div class="px-4 py-6" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="bg-gray-50 border-b border-gray-100 py-4 px-6">
            <h5 class="m-0 font-bold text-gray-800 flex items-center gap-2">
                <i class="fas fa-edit text-blue-600"></i>
                {{ app()->getLocale() === 'ar' ? 'تعديل بيانات موقع:' : 'Edit Location:' }} <span class="text-blue-600">{{ app()->getLocale() === 'ar' ? $location->name_ar : $location->name_en }}</span>
            </h5>
        </div>

        <div class="p-6">
            <form action="{{ route('admin.location.update', $location->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Names --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            اسم الموقع (بالعربية) <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="name_ar" id="name_ar" value="{{ old('name_ar', $location->name_ar) }}" 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-colors @error('name_ar') border-red-500 @enderror" 
                               required placeholder="مثال: الخرطوم، مركز الأمل...">
                        @error('name_ar') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Location Name (English) <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="name_en" id="name_en" value="{{ old('name_en', $location->name_en) }}" 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-colors text-left @error('name_en') border-red-500 @enderror" 
                               required dir="ltr" placeholder="e.g. Khartoum, Hope Center...">
                        @error('name_en') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <hr class="my-6 border-gray-200">

                {{-- Map Coordinate Selection --}}
                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                        <i class="fas fa-map-marked-alt text-blue-600"></i>
                        {{ app()->getLocale() === 'ar' ? 'قم بتحديث موقع النشاط على الخريطة' : 'Update Location on Map' }}
                        <span class="text-red-500">*</span>
                    </label>
                    <div class="flex flex-wrap justify-between items-end mb-3 gap-2">
                        <p class="text-gray-500 text-xs mb-0">
                            {{ app()->getLocale() === 'ar' ? 'انقر على الخريطة لتحديث الدبوس، وسنقوم بجلب اسم المنطقة تلقائياً.' : 'Click on the map to update the pin and auto-fetch the location name.' }}
                        </p>
                        <button type="button" id="clearMapBtn" class="px-3 py-1.5 bg-red-50 hover:bg-red-100 text-red-600 rounded-md text-xs font-semibold transition-colors flex items-center gap-1 border border-red-100">
                            <i class="fas fa-trash-alt"></i> {{ app()->getLocale() === 'ar' ? 'إلغاء التحديد' : 'Clear Selection' }}
                        </button>
                    </div>
                    
                    <div id="map" class="w-full h-96 rounded-xl border border-gray-300 shadow-inner z-0"></div>
                    
                    <div class="grid grid-cols-2 gap-4 mt-3">
                        <div>
                            <label class="block text-xs text-gray-500 mb-1">Latitude</label>
                            <input type="text" name="latitude" id="lat" value="{{ old('latitude', $location->latitude) }}" readonly class="w-full bg-gray-50 border border-gray-200 text-gray-600 px-3 py-2 rounded-lg font-mono text-sm @error('latitude') border-red-500 @enderror">
                            @error('latitude') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-xs text-gray-500 mb-1">Longitude</label>
                            <input type="text" name="longitude" id="lng" value="{{ old('longitude', $location->longitude) }}" readonly class="w-full bg-gray-50 border border-gray-200 text-gray-600 px-3 py-2 rounded-lg font-mono text-sm @error('longitude') border-red-500 @enderror">
                            @error('longitude') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                <hr class="my-6 border-gray-200">

                {{-- Activity Description --}}
                <div class="mb-6">
                    <h6 class="font-bold text-gray-800 mb-4 flex items-center gap-2">
                        <i class="fas fa-align-right text-green-600"></i>
                        {{ app()->getLocale() === 'ar' ? 'وصف النشاط في الموقع' : 'Activity Description' }}
                    </h6>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                {{ app()->getLocale() === 'ar' ? 'الوصف بالعربية' : 'Arabic Description' }}
                            </label>
                            <textarea name="activity_description_ar" rows="4" 
                                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-colors @error('activity_description_ar') border-red-500 @enderror">{{ old('activity_description_ar', $location->activity_description_ar) }}</textarea>
                            @error('activity_description_ar') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                {{ app()->getLocale() === 'ar' ? 'Description (English)' : 'English Description' }}
                            </label>
                            <textarea name="activity_description_en" rows="4" dir="ltr" 
                                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-colors text-left @error('activity_description_en') border-red-500 @enderror">{{ old('activity_description_en', $location->activity_description_en) }}</textarea>
                            @error('activity_description_en') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                {{-- Buttons: inside main form --}}
                <div class="flex items-center justify-between mt-8 pt-4 border-t border-gray-100">
                    <a href="{{ route('admin.location.index') }}" class="px-6 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-full transition-colors">
                        {{ app()->getLocale() === 'ar' ? 'إلغاء' : 'Cancel' }}
                    </a>
                    <button type="submit" class="px-8 py-2 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-full shadow-md transition-all flex items-center gap-2">
                        <i class="fas fa-save"></i>
                        {{ app()->getLocale() === 'ar' ? 'حفظ التعديلات' : 'Save Changes' }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Audit Log History (outside main form) --}}
    <div class="mt-6 px-6 pb-6">
        <div class="mb-6">
            {{-- Session Messages --}}
            @if(session('success'))
                <div class="flex items-center gap-3 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-xl mb-4">
                    <i class="fas fa-check-circle text-green-500"></i>
                    <span class="text-sm font-medium">{{ session('success') }}</span>
                </div>
            @endif
            @if(session('error'))
                <div class="flex items-center gap-3 bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-xl mb-4">
                    <i class="fas fa-exclamation-circle text-red-500"></i>
                    <span class="text-sm font-medium">{{ session('error') }}</span>
                </div>
            @endif
            @if($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-xl mb-4">
                    <ul class="list-disc list-inside text-sm">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

                <div class="mb-8 border-t border-gray-100 pt-4">
                    <h6 class="font-bold text-gray-800 mb-4 flex items-center gap-2">
                        <i class="fas fa-history text-blue-600"></i>
                        {{ app()->getLocale() === 'ar' ? 'سجل ملفات التدقيق' : 'Audit Log History' }}
                    </h6>

                    @if($location->auditLogs->count() > 0)
                        <div class="overflow-x-auto bg-gray-50 rounded-xl border border-gray-100 mb-6">
                            <table class="w-full text-sm text-right">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                                    <tr>
                                        <th class="px-4 py-3">{{ __('massage.start_date') }}</th>
                                        <th class="px-4 py-3">{{ __('massage.end_date') }}</th>
                                        <th class="px-4 py-3 text-center">{{ __('massage.view') }}</th>
                                        <th class="px-4 py-3 text-center">{{ app()->getLocale() === 'ar' ? 'حذف' : 'Delete' }}</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @foreach($location->auditLogs as $log)
                                        <tr class="hover:bg-gray-100/50 transition-colors">
                                            <td class="px-4 py-3 font-mono text-xs text-gray-600">{{ $log->start_date ?: '---' }}</td>
                                            <td class="px-4 py-3 font-mono text-xs text-gray-600">{{ $log->end_date ?: '---' }}</td>
                                            <td class="px-4 py-3 text-center">
                                                <a href="{{ url('/media/' . $log->file_path) }}" target="_blank" class="text-blue-600 hover:text-blue-800 transition-colors">
                                                    <i class="fas fa-external-link-alt"></i>
                                                </a>
                                            </td>
                                            <td class="px-4 py-3 text-center">
                                                <form action="{{ route('admin.location.delete-log', $log->id) }}" method="POST" onsubmit="return confirm('{{ app()->getLocale() === 'ar' ? 'هل أنت متأكد من الحذف؟' : 'Are you sure?' }}')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-500 hover:text-red-700 transition-colors">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-6 bg-gray-50 rounded-xl border border-dashed border-gray-200 mb-6">
                            <i class="fas fa-folder-open text-gray-300 text-3xl mb-2"></i>
                            <p class="text-gray-400 text-xs">{{ app()->getLocale() === 'ar' ? 'لا يوجد سجل للملفات حالياً.' : 'No audit log history available.' }}</p>
                        </div>
                    @endif

                    {{-- Add New Log --}}
                    <div class="bg-blue-50/50 p-6 rounded-xl border border-blue-100">
                        <h6 class="text-sm font-bold text-blue-800 mb-4 flex items-center gap-2">
                            <i class="fas fa-plus-circle"></i>
                            {{ app()->getLocale() === 'ar' ? 'إضافة ملف تدقيق جديد' : 'Add New Audit Log' }}
                        </h6>
                        <form action="{{ route('admin.location.add-log', $location->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div>
                                    <label class="block text-xs font-semibold text-gray-700 mb-2">{{ __('massage.start_date') }}</label>
                                    <input type="date" name="start_date" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-xs">
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-gray-700 mb-2">{{ __('massage.end_date') }}</label>
                                    <input type="date" name="end_date" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-xs">
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-gray-700 mb-2">{{ app()->getLocale() === 'ar' ? 'ملف PDF' : 'PDF File' }}</label>
                                    <input type="file" name="audit_pdf" accept="application/pdf" class="w-full text-xs" required>
                                </div>
                            </div>
                            <button type="submit" class="mt-4 px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold rounded-full shadow-sm transition-all flex items-center gap-2">
                                <i class="fas fa-upload"></i>
                                {{ app()->getLocale() === 'ar' ? 'رفع وإضافة' : 'Upload & Add' }}
                            </button>
                        </form>
                    </div>
                </div>
    </div>
</div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
@endpush

@push('scripts')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Default center (Sudan)
        var defaultLat = 15.5007;
        var defaultLng = 32.5599;
        
        var existingLat = document.getElementById('lat').value;
        var existingLng = document.getElementById('lng').value;
        
        var startLat = existingLat ? parseFloat(existingLat) : defaultLat;
        var startLng = existingLng ? parseFloat(existingLng) : defaultLng;
        var zoom = existingLat ? 12 : 5;

        var map = L.map('map').setView([startLat, startLng], zoom);

        L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
            maxZoom: 20,
            subdomains:['mt0','mt1','mt2','mt3']
        }).addTo(map);

        var marker = null;
        if (existingLat && existingLng) {
            marker = L.marker([startLat, startLng]).addTo(map);
        }

        var inputAr = document.getElementById('name_ar');
        var inputEn = document.getElementById('name_en');
        var inputLat = document.getElementById('lat');
        var inputLng = document.getElementById('lng');
        var clearBtn = document.getElementById('clearMapBtn');

        clearBtn.addEventListener('click', function() {
            if (marker) {
                map.removeLayer(marker);
                marker = null;
            }
            inputLat.value = '';
            inputLng.value = '';
            inputAr.value = '';
            inputEn.value = '';
        });

        async function fetchLocationName(lat, lng) {
            try {
                // Fetch Arabic using zoom=12 to get city/town level (not specific streets)
                let resAr = await fetch(`https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${lat}&lon=${lng}&accept-language=ar&zoom=12`);
                let dataAr = await resAr.json();
                if (dataAr && dataAr.name) {
                    inputAr.value = dataAr.name + (dataAr.address && dataAr.address.state && dataAr.name !== dataAr.address.state ? '، ' + dataAr.address.state : '');
                } else if (dataAr && dataAr.display_name) {
                    inputAr.value = dataAr.display_name.split(',')[0]; 
                } else {
                    inputAr.value = '';
                }

                // Fetch English
                let resEn = await fetch(`https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${lat}&lon=${lng}&accept-language=en&zoom=12`);
                let dataEn = await resEn.json();
                if (dataEn && dataEn.name) {
                    inputEn.value = dataEn.name + (dataEn.address && dataEn.address.state && dataEn.name !== dataEn.address.state ? ', ' + dataEn.address.state : '');
                } else if (dataEn && dataEn.display_name) {
                    inputEn.value = dataEn.display_name.split(',')[0];
                } else {
                    inputEn.value = '';
                }
            } catch (error) {
                console.error("Reverse Geocoding failed", error);
                inputAr.value = '';
                inputEn.value = '';
            }
        }

        map.on('click', function(e) {
            var lat = e.latlng.lat.toFixed(6);
            var lng = e.latlng.lng.toFixed(6);

            inputLat.value = lat;
            inputLng.value = lng;

            if (marker) {
                marker.setLatLng(e.latlng);
            } else {
                marker = L.marker(e.latlng).addTo(map);
            }

            // Visual loading state
            inputAr.value = '{{ app()->getLocale() === "ar" ? "جاري جلب الموقع..." : "Fetching..." }}';
            inputEn.value = 'Fetching...';

            fetchLocationName(lat, lng);
        });

        // --- Forward Geocoding (Search by Name) ---
        async function searchLocationByName(query, isArabicInput) {
            if (!query.trim()) return;

            try {
                // Determine language for the search query to improve accuracy
                let lang = isArabicInput ? 'ar' : 'en';
                let targetLang = isArabicInput ? 'en' : 'ar';
                let targetInput = isArabicInput ? inputEn : inputAr;

                targetInput.value = '{{ app()->getLocale() === "ar" ? "جاري الترجمة..." : "Translating..." }}';

                // Fetch coordinates using Nominatim Forward Geocoding
                let res = await fetch(`https://nominatim.openstreetmap.org/search?format=jsonv2&q=${encodeURIComponent(query)}&accept-language=${lang}&limit=1`);
                let data = await res.json();

                if (data && data.length > 0) {
                    let lat = parseFloat(data[0].lat).toFixed(6);
                    let lng = parseFloat(data[0].lon).toFixed(6);

                    // Update Map and Marker
                    map.setView([lat, lng], 10);
                    if (marker) {
                        marker.setLatLng([lat, lng]);
                    } else {
                        marker = L.marker([lat, lng]).addTo(map);
                    }

                    // Update Hidden Coordinates
                    inputLat.value = lat;
                    inputLng.value = lng;

                    // Lookup exact entity in target language using OSM ID
                    let osmType = data[0].osm_type.charAt(0).toUpperCase(); // 'N', 'W', or 'R'
                    let osmId = data[0].osm_id;
                    
                    let lookupRes = await fetch(`https://nominatim.openstreetmap.org/lookup?format=jsonv2&osm_ids=${osmType}${osmId}&accept-language=${targetLang}`);
                    let lookupData = await lookupRes.json();
                    
                    if (lookupData && lookupData.length > 0) {
                        targetInput.value = lookupData[0].name || lookupData[0].display_name.split(',')[0];
                    } else {
                        targetInput.value = '';
                    }

                } else {
                    targetInput.value = '';
                }
            } catch (error) {
                console.error("Geocoding search failed", error);
                targetInput.value = '';
            }
        }

        // Listen for changes on Arabic Input
        inputAr.addEventListener('change', function() {
            searchLocationByName(this.value, true);
        });
        inputAr.addEventListener('keydown', function(e) {
            if(e.key === 'Enter') {
                e.preventDefault();
                searchLocationByName(this.value, true);
            }
        });

        // Listen for changes on English Input
        inputEn.addEventListener('change', function() {
            searchLocationByName(this.value, false);
        });
        inputEn.addEventListener('keydown', function(e) {
            if(e.key === 'Enter') {
                e.preventDefault();
                searchLocationByName(this.value, false);
            }
        });
    });
</script>
@endpush


