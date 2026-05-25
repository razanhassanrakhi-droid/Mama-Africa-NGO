<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('massage.live_transparency') }} | {{ __('massage.brand') }}</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        display: ['Outfit', 'sans-serif'],
                    },
                    colors: {
                        orange: {
                            300: '#fdba74',
                            400: '#fb923c',
                            500: '#f97316',
                            600: '#ea580c',
                            900: '#7c2d12',
                        }
                    },
                    animation: {
                        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                    }
                }
            }
        }
    </script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Outfit:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Leaflet CSS for Map -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Google Charts (for Sankey) -->
    @push('scripts')
{{-- Google Charts no longer needed for current implementation --}}
@endpush
    <style>
        [x-cloak] { display: none !important; }
        .font-display { font-family: 'Outfit', sans-serif; }
        
        /* Custom UI styles provided by user */
        .sankey-container {
            scrollbar-width: thin;
            scrollbar-color: #f97316 #1c1917;
        }
        .flow-line {
            background: linear-gradient({{ app()->getLocale() == 'ar' ? '270deg' : '90deg' }}, #f97316 0%, #22c55e 100%);
            opacity: 0.3;
        }

        .custom-tooltip-content {
            background: rgba(28, 25, 23, 0.95);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 12px;
            border-radius: 12px;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.3);
        }
        .custom-tooltip-title {
            display: block;
            color: #f97316;
            font-weight: 700;
            font-size: 14px;
            margin-bottom: 4px;
        }
        .custom-tooltip-value {
            color: #f8fafc;
            font-size: 13px;
        }
        body {
            font-family: 'Inter', sans-serif;
            background: #1c1917; /* Fallback (Stone 900) */
            color: #fafaf9;
        }
        .bg-glass {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        }
        .bg-glass-hover:hover {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transform: translateY(-4px);
            box-shadow: 0 10px 40px rgba(249, 115, 22, 0.15); /* orange-500 */
        }
        .text-glow {
            text-shadow: 0 0 20px rgba(251, 146, 60, 0.5); /* orange-400 */
        }
        
        /* Map Customizations */
        #map { background: transparent; }
        .leaflet-container { font-family: 'Inter', sans-serif; }
        .leaflet-popup-content-wrapper {
            background: rgba(28, 25, 23, 0.9); /* stone-900 */
            backdrop-filter: blur(8px);
            color: white;
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 12px;
        }
        .leaflet-popup-tip { background: rgba(28, 25, 23, 0.9); }
        
        .leaflet-tooltip {
            background-color: #1a1a1a !important;
            border: 1px solid #f57c00 !important;
            border-radius: 8px !important;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5) !important;
            color: #ffffff !important;
            padding: 12px 16px !important;
            font-family: 'Inter', sans-serif !important;
            pointer-events: none;
            z-index: 1000;
        }
        .custom-tooltip-content { display: flex; flex-direction: column; gap: 4px; }
        .custom-tooltip-title { font-weight: 700; font-size: 14px; color: #f97316; margin-bottom: 4px; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 4px; }
        .custom-tooltip-value { font-size: 13px; color: #e0e0e0; }

        /* Popup Customizations */
        .glass-popup .leaflet-popup-content-wrapper {
            background: rgba(28, 25, 23, 0.95) !important;
            backdrop-filter: blur(12px) !important;
            border: 1px solid rgba(255, 255, 255, 0.1) !important;
            box-shadow: 0 10px 40px rgba(0,0,0,0.5) !important;
        }
        .glass-popup .leaflet-popup-content {
            margin: 0 !important;
            width: auto !important;
        }
        .glass-popup .leaflet-popup-close-button {
            top: 10px !important;
            right: 10px !important;
            color: #f97316 !important;
            font-size: 18px !important;
            padding: 4px !important;
            transition: transform 0.2s !important;
        }
        .glass-popup .leaflet-popup-close-button:hover {
            transform: scale(1.1);
            background: transparent !important;
        }
        
        @media (max-width: 767px) {
            .glass-popup .leaflet-popup-content-wrapper {
                max-width: 280px;
            }
            .glass-popup .leaflet-popup-content {
                max-height: 400px;
                overflow-y: auto;
            }
        }
    </style>
</head>
<body class="antialiased relative overflow-x-hidden selection:bg-orange-500 selection:text-white" x-data="transparencyDashboard()" x-init="initData()">
    
    <!-- Dynamic Ambient Background -->
    <div class="fixed inset-0 z-[-1] bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-orange-900/40 via-stone-900 to-stone-950"></div>
    <div class="fixed top-0 left-1/4 w-96 h-96 bg-orange-600/20 rounded-full blur-[128px] pointer-events-none animate-pulse-slow z-[-1]"></div>
    <div class="fixed bottom-0 right-1/4 w-[30rem] h-[30rem] bg-amber-600/10 rounded-full blur-[128px] pointer-events-none z-[-1]"></div>

    <!-- Navbar hidden for embedded view -->
    {{-- 
    <nav class="sticky top-0 z-50 bg-stone-900/50 backdrop-blur-lg border-b border-white/10">
        ...
    </nav>
    --}}

    <main id="main-content" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-20">
        
        <!-- Hero Header -->
        <div class="text-center max-w-4xl mx-auto space-y-8 mb-12">
            <h1 class="font-display text-lg md:text-5xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-orange-300 via-white to-amber-300 text-glow px-4 leading-tight py-2">
                {{ __('massage.live_transparency') }}
            </h1>
            <p class="text-lg md:text-xl text-stone-400 leading-relaxed font-light px-6">
                {{ __('massage.transparency_desc') }}
            </p>
        </div>

        <!-- Warning / Privacy Note -->
        <div class="bg-amber-500/10 border border-amber-500/20 rounded-2xl p-4 flex items-start gap-4 text-amber-200/90 w-full max-w-4xl mx-auto shadow-lg shadow-amber-500/5">
            <i class="fa-solid fa-shield-halved text-amber-400 text-xl mt-0.5"></i>
            <div class="text-sm leading-relaxed">
                <strong class="text-amber-400 font-semibold block mb-1">{{ __('massage.strict_privacy') }}</strong>
                {!! __('massage.privacy_note') !!}
            </div>
        </div>

        <!-- 6 IMPACT SECTORS GRID -->
        <div>
            <div class="flex items-center justify-between mb-8">
                <h2 class="font-display text-base md:text-2xl font-semibold text-white flex items-center gap-3">
                    <i class="fa-solid fa-chart-pie text-orange-400"></i> {{ __('massage.core_impact_sectors') }}
                </h2>
                <div class="text-xs font-medium text-orange-400/80 bg-orange-400/10 px-3 py-1 rounded-full border border-orange-400/20">
                    {{ __('massage.auto_syncing') }}
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <template x-for="(counter, index) in counters" :key="index">
                    <div class="bg-glass bg-glass-hover p-6 rounded-2xl transition-all duration-300 relative overflow-hidden group">
                        <!-- Card Decor -->
                        <div class="absolute top-0 inset-inline-start-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                            <i class="fa-solid text-6xl" :class="counter.icon || 'fa-chart-pie'"></i>
                        </div>
                        
                        <div class="relative z-10 flex flex-col h-full gap-6 transition-all duration-500" :class="showCounterValues ? 'justify-between' : 'justify-center items-center text-center'">
                            <h3 class="font-display text-stone-300 font-medium transition-all duration-500 line-clamp-2" 
                                :class="showCounterValues ? 'text-lg' : 'text-2xl text-white px-20'"
                                x-text="'{{ app()->getLocale() }}' === 'ar' ? counter.label_ar : counter.label_en"></h3>
                            
                            <template x-if="showCounterValues">
                                <div x-cloak>
                                    <div class="text-4xl md:text-5xl font-bold text-white tracking-tight flex items-baseline gap-1"
                                         x-transition:enter="transition ease-out duration-500"
                                         x-transition:enter-start="opacity-0 translate-y-2"
                                         x-transition:enter-end="opacity-100 translate-y-0">
                                        <span x-text="new Intl.NumberFormat().format(counter.value)"></span>
                                        <i x-show="counter.value > 0" class="fa-solid fa-caret-up text-orange-400 text-xl ms-2 animate-bounce"></i>
                                    </div>
                                    <div class="text-orange-400/80 text-sm mt-2 font-medium">{{ __('massage.verified_impact_units') }}</div>
                                </div>
                            </template>
                        </div>
                    </div>
                </template>
                <!-- Loading State fallback -->
                <div x-show="counters.length === 0" class="col-span-full py-12 text-center text-stone-400">
                    <i class="fa-solid fa-circle-notch fa-spin text-3xl mb-3 text-orange-500"></i>
                    <p>{{ __('massage.establishing_connection') }}</p>
                </div>
            </div>
        </div>

        <!-- FINANCIAL FLOW SANKEY DIAGRAM -->
        <div class="bg-glass p-8 rounded-3xl border border-white/10" id="financials">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
                <div>
                    <h2 class="font-display text-2xl font-semibold text-white flex items-center gap-3">
                        <i class="fa-solid fa-money-bill-transfer text-orange-400"></i> {{ __('massage.financial_transparency') }}
                    </h2>
                    <p class="text-stone-400 text-sm mt-1">{{ __('massage.financial_desc') }}</p>
                </div>
                <!-- Mini Stats -->
                <div class="flex gap-4">
                    <div class="bg-white/5 border border-white/10 rounded-xl px-4 py-2 text-center">
                        <div class="text-xs text-stone-400 mb-1">{{ __('massage.programs') }}</div>
                        <div class="text-orange-400 font-bold" x-text="financials.programs ? financials.programs + '%' : '...'"></div>
                    </div>
                </div>
            </div>

            <!-- Custom Responsive UI (Total Replacement for Sankey) -->
            <div class="w-full">
                <!-- Mobile View (Vertical Stack) -->
                <div class="block md:hidden space-y-6">
                    <div class="bg-stone-900/80 p-5 rounded-2xl border border-white/5">
                        <p class="text-sm text-stone-400 mb-2">{{ __('massage.total_funds') }} (100%)</p>
                        <div class="h-6 bg-stone-800 rounded-full overflow-hidden">
                            <div class="h-full bg-orange-500 w-full animate-pulse-slow"></div>
                        </div>
                    </div>

                    <div class="flex justify-center my-2 text-orange-500">
                        <i class="fa-solid fa-arrow-down-long animate-bounce"></i>
                    </div>

                    <div class="bg-stone-900/80 p-6 rounded-2xl border border-white/5 space-y-5">
                        <div class="flex items-center justify-between">
                            <p class="font-bold text-orange-400 text-lg">{{ __('massage.programs') }} (<span x-text="(financials.programs || 95) + '%'"></span>)</p>
                            <span class="px-3 py-1 bg-orange-500/10 text-orange-400 text-xs rounded-full border border-orange-500/20">{{ __('massage.active_delivery') ?? 'Active Delivery' }}</span>
                        </div>
                        
                        <div class="space-y-4">
                            <div>
                                <div class="flex justify-between text-sm mb-1.5 text-stone-300">
                                    <span>{{ __('massage.sankey_clean_water') }}</span>
                                    <span class="font-bold text-green-400" x-text="(financials.percentage_clean_water || 30) + '%'"></span>
                                </div>
                                <div class="h-2.5 bg-stone-800 rounded-full overflow-hidden">
                                    <div class="h-full bg-gradient-to-r from-green-500 to-emerald-400" :style="`width: ${financials.percentage_clean_water || 30}%`"></div>
                                </div>
                            </div>

                            <div>
                                <div class="flex justify-between text-sm mb-1.5 text-stone-300">
                                    <span>{{ __('massage.sankey_training') }}</span>
                                    <span class="font-bold text-green-400" x-text="(financials.percentage_training || 30) + '%'"></span>
                                </div>
                                <div class="h-2.5 bg-stone-800 rounded-full overflow-hidden">
                                    <div class="h-full bg-gradient-to-r from-green-600 to-green-400" :style="`width: ${financials.percentage_training || 30}%`"></div>
                                </div>
                            </div>

                            <div>
                                <div class="flex justify-between text-sm mb-1.5 text-stone-300">
                                    <span>{{ __('massage.sankey_nutrition') }}</span>
                                    <span class="font-bold text-orange-400" x-text="(financials.percentage_nutrition || 20) + '%'"></span>
                                </div>
                                <div class="h-2.5 bg-stone-800 rounded-full overflow-hidden">
                                    <div class="h-full bg-gradient-to-r from-orange-400 to-amber-300" :style="`width: ${financials.percentage_nutrition || 20}%`"></div>
                                </div>
                            </div>

                            <div>
                                <div class="flex justify-between text-sm mb-1.5 text-stone-300">
                                    <span>{{ __('massage.sankey_env') }}</span>
                                    <span class="font-bold text-stone-400" x-text="(financials.percentage_environment || 12) + '%'"></span>
                                </div>
                                <div class="h-2.5 bg-stone-800 rounded-full overflow-hidden">
                                    <div class="h-full bg-stone-500" :style="`width: ${financials.percentage_environment || 12}%`"></div>
                                </div>
                            </div>

                            <template x-if="(financials.programs || 95) > ((financials.percentage_clean_water || 0) + (financials.percentage_training || 0) + (financials.percentage_nutrition || 0) + (financials.percentage_environment || 0))">
                                <div>
                                    <div class="flex justify-between text-sm mb-1.5 text-stone-300">
                                        <span>{{ app()->getLocale() === 'ar' ? 'دعم برامج أخرى' : 'Other Program Support' }}</span>
                                        <span class="font-bold text-amber-500" x-text="((financials.programs || 95) - ((financials.percentage_clean_water || 0) + (financials.percentage_training || 0) + (financials.percentage_nutrition || 0) + (financials.percentage_environment || 0))) + '%'"></span>
                                    </div>
                                    <div class="h-2.5 bg-stone-800 rounded-full overflow-hidden">
                                        <div class="h-full bg-amber-600" :style="`width: ${((financials.programs || 95) - ((financials.percentage_clean_water || 0) + (financials.percentage_training || 0) + (financials.percentage_nutrition || 0) + (financials.percentage_environment || 0)))}%`"></div>
                                    </div>
                                </div>
                            </template>

                            <div class="pt-4 border-t border-white/5">
                                <div class="flex justify-between text-sm mb-1.5 text-stone-400">
                                    <span>{{ app()->getLocale() === 'ar' ? 'العمليات والإدارة' : 'Operations & Admin' }}</span>
                                    <span class="font-bold" x-text="(100 - (financials.programs || 95)) + '%'"></span>
                                </div>
                                <div class="h-2.5 bg-stone-800 rounded-full overflow-hidden">
                                    <div class="h-full bg-stone-600/50" :style="`width: ${100 - (financials.programs || 95)}%`"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Desktop View (Grid/Flow) -->
                <div class="hidden md:block bg-stone-900/30 p-10 rounded-3xl border border-white/5 sankey-container">
                    <div class="grid grid-cols-3 gap-12 items-center min-w-[850px]">
                        
                        <!-- Col 1: Source -->
                        <div class="space-y-4">
                            <div class="bg-gradient-to-br {{ app()->getLocale() == 'ar' ? 'rtl:bg-gradient-to-bl' : '' }} from-orange-600 to-orange-700 h-48 rounded-2xl flex flex-col justify-center items-center p-6 text-center shadow-2xl shadow-orange-900/20 border border-white/10 ring-1 ring-orange-500/30">
                                <i class="fa-solid fa-vault text-3xl mb-3 text-orange-200"></i>
                                <span class="font-bold text-xl text-white">{{ __('massage.total_funds') }}</span>
                                <span class="text-sm opacity-90 text-orange-100 mt-1 font-medium">(100%)</span>
                            </div>
                        </div>

                        <!-- Col 2: Connector & Mid Node -->
                        <div class="relative h-full flex items-center px-4">
                            <!-- Flow Lines Layer -->
                            <div class="absolute inset-0 flex flex-col justify-around py-16 opacity-40">
                                <div class="h-1.5 flow-line w-full rounded-full blur-[1px]"></div>
                                <div class="h-1.5 flow-line w-full rounded-full blur-[1px]"></div>
                                <div class="h-1.5 flow-line w-full rounded-full blur-[1px]"></div>
                                <div class="h-1.5 flow-line w-full rounded-full blur-[1px]"></div>
                            </div>
                            <!-- Middle Node -->
                            <div class="bg-gradient-to-br {{ app()->getLocale() == 'ar' ? 'rtl:bg-gradient-to-bl' : '' }} from-orange-500 to-amber-600 h-72 w-full rounded-2xl z-10 flex flex-col justify-center items-center p-6 text-center shadow-2xl shadow-orange-500/20 border border-white/10 ring-1 ring-orange-400/30">
                                <i class="fa-solid fa-hand-holding-heart text-4xl mb-4 text-orange-100 {{ app()->getLocale() == 'ar' ? '-scale-x-100' : '' }}"></i>
                                <span class="font-bold text-2xl text-white">{{ __('massage.programs') }}</span>
                                <span class="text-sm opacity-90 text-white mt-2 font-bold px-4 py-1.5 bg-white/10 rounded-full border border-white/20" x-text="'(' + (financials.programs || 95) + '%)'"></span>
                            </div>
                        </div>

                        <!-- Col 3: Destinations -->
                        <div class="space-y-4">
                            <div class="group/item bg-stone-800/50 hover:bg-emerald-600 p-5 rounded-2xl border-e-4 border-emerald-400 transition-all duration-300 cursor-default">
                                <div class="flex items-center justify-between">
                                    <p class="text-base font-bold text-emerald-100 group-hover/item:text-white">{{ __('massage.sankey_clean_water') }}</p>
                                    <span class="text-sm font-black text-emerald-400 group-hover/item:text-white" x-text="(financials.percentage_clean_water || 30) + '%'"></span>
                                </div>
                            </div>
                            <div class="group/item bg-stone-800/50 hover:bg-green-600 p-5 rounded-2xl border-e-4 border-green-500 transition-all duration-300 cursor-default">
                                <div class="flex items-center justify-between">
                                    <p class="text-base font-bold text-green-100 group-hover/item:text-white">{{ __('massage.sankey_training') }}</p>
                                    <span class="text-sm font-black text-green-400 group-hover/item:text-white" x-text="(financials.percentage_training || 30) + '%'"></span>
                                </div>
                            </div>
                            <div class="group/item bg-stone-800/50 hover:bg-orange-500 p-5 rounded-2xl border-e-4 border-orange-300 transition-all duration-300 cursor-default">
                                <div class="flex items-center justify-between">
                                    <p class="text-base font-bold text-orange-100 group-hover/item:text-white">{{ __('massage.sankey_nutrition') }}</p>
                                    <span class="text-sm font-black text-orange-300 group-hover/item:text-white" x-text="(financials.percentage_nutrition || 20) + '%'"></span>
                                </div>
                            </div>
                            <div class="group/item bg-stone-800/50 hover:bg-stone-600 p-5 rounded-2xl border-e-4 border-stone-400 transition-all duration-300 cursor-default">
                                <div class="flex items-center justify-between">
                                    <p class="text-base font-bold text-stone-200 group-hover/item:text-white">{{ __('massage.sankey_env') }}</p>
                                    <span class="text-sm font-black text-stone-300 group-hover/item:text-white" x-text="(financials.percentage_environment || 12) + '%'"></span>
                                </div>
                            </div>
                            <div x-show="(financials.programs || 95) > ((financials.percentage_clean_water || 0) + (financials.percentage_training || 0) + (financials.percentage_nutrition || 0) + (financials.percentage_environment || 0))" class="group/item bg-stone-800/30 hover:bg-amber-700/50 p-4 rounded-2xl border-e-4 border-amber-600/50 transition-all duration-300 cursor-default">
                                <div class="flex items-center justify-between">
                                    <p class="text-sm font-bold text-amber-200 group-hover/item:text-white">{{ app()->getLocale() === 'ar' ? 'دعم برامج أخرى' : 'Other Program Support' }}</p>
                                    <span class="text-sm font-black text-amber-400 group-hover/item:text-white" x-text="((financials.programs || 95) - ((financials.percentage_clean_water || 0) + (financials.percentage_training || 0) + (financials.percentage_nutrition || 0) + (financials.percentage_environment || 0))) + '%'"></span>
                                </div>
                            </div>
                            <!-- Separator for Operations -->
                            <div class="pt-2">
                                <div class="bg-stone-900/50 p-4 rounded-2xl border border-white/5 opacity-80 hover:opacity-100 transition-opacity">
                                    <div class="flex items-center justify-between">
                                        <p class="text-sm font-medium text-stone-400">{{ app()->getLocale() === 'ar' ? 'العمليات والإدارة' : 'Operations & Admin' }}</p>
                                        <span class="text-sm font-bold text-stone-500" x-text="(100 - (financials.programs || 95)) + '%'"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- INTERACTIVE LIVE MAP & DOWNLOAD CENTER ROW -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            
            <!-- Map -->
            <div class="bg-glass p-1 rounded-3xl border border-white/10 flex flex-col h-[500px]">
                <div class="p-6 pb-4">
                    <h2 class="font-display text-xl font-semibold text-white flex items-center gap-3">
                        <i class="fa-solid fa-map-location-dot text-orange-400"></i> {{ __('massage.global_activity') }}
                    </h2>
                    <p class="text-stone-400 text-sm mt-1">{{ __('massage.map_desc') }}</p>
                    
                    <!-- Year Filter -->
                    <div class="mt-4 flex flex-wrap gap-2">
                        <template x-for="year in availableYears" :key="year">
                            <button @click="selectedYear = year; filterMarkers()" 
                                    :class="selectedYear === year ? 'bg-orange-500 text-white border-orange-600' : 'bg-white/5 text-stone-400 border-white/10 hover:bg-white/10'"
                                    class="px-3 py-1 rounded-full text-xs font-medium border transition-all duration-300"
                                    x-text="year === 'all' ? '{{ __('massage.all_time') }}' : year">
                            </button>
                        </template>
                    </div>
                </div>
                <!-- Hint -->
                <div class="px-6 mb-2">
                    <div class="inline-flex items-center gap-2 text-[10px] text-orange-400/70 bg-orange-400/5 px-2 py-1 rounded border border-orange-400/10">
                        <i class="fa-solid fa-circle-info animate-pulse"></i>
                        {{ __('massage.map_interaction_hint') }}
                    </div>
                </div>
                <div id="map" class="w-full flex-grow rounded-b-[1.4rem] overflow-hidden z-0"></div>
            </div>

            <!-- Download Center -->
            <div class="bg-glass p-8 rounded-3xl border border-white/10 flex flex-col min-h-[400px] md:h-[500px]">
                <div class="mb-6">
                    <h2 class="font-display text-xl font-semibold text-white flex items-center gap-3">
                        <i class="fa-solid fa-file-pdf text-red-400"></i> {{ __('massage.annual_reports') }}
                    </h2>
                    <p class="text-stone-400 text-sm mt-1">{{ __('massage.reports_desc') }}</p>
                </div>
                
                <div class="overflow-y-auto pr-2 space-y-4 flex-grow custom-scrollbar">
                    <template x-for="report in reports" :key="report.id">
                        <div class="bg-white/5 border border-white/10 p-5 rounded-2xl flex items-center justify-between group hover:bg-white/10 transition-colors">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-xl bg-red-500/10 flex items-center justify-center border border-red-500/20">
                                    <i class="fa-solid fa-file-invoice" :class="report.year == new Date().getFullYear() ? 'text-red-400' : 'text-stone-400' + ' text-xl'"></i>
                                </div>
                                <div>
                                    <h4 class="text-white font-medium group-hover:text-orange-300 transition-colors" x-text="`${'{{ app()->getLocale() }}' === 'ar' ? report.title_ar : report.title_en}`"></h4>
                                    <div class="flex items-center gap-2 mt-1">
                                        <span class="text-xs px-2 py-0.5 rounded border flex items-center" :class="report.year == new Date().getFullYear() ? 'bg-orange-500/20 text-orange-300 border-orange-500/30' : 'text-stone-400 border-white/10 bg-white/5'">
                                            <i x-show="report.year == new Date().getFullYear()" class="fa-solid fa-circle-check me-1.5 text-[10px]"></i>
                                            <span x-text="report.year == new Date().getFullYear() ? '{{ __('massage.verified_auditor') }}' : '{{ __('massage.archived') }}'"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <a :href="'/storage/' + report.file_path" target="_blank" rel="noopener noreferrer" type="application/pdf" class="w-9 h-9 rounded-full bg-white/5 hover:bg-white/10 flex items-center justify-center text-stone-300 transition-all border border-white/10" title="{{ __('massage.view') }}">
                                    <i class="fa-solid fa-eye text-sm"></i>
                                </a>
                                <a :href="'/storage/' + report.file_path" :download="report.file_path.split('/').pop()" type="application/pdf" class="w-9 h-9 rounded-full bg-orange-500/10 hover:bg-orange-500 text-orange-400 hover:text-white flex items-center justify-center transition-all border border-orange-500/20 shadow-lg shadow-orange-500/10" title="{{ __('massage.download') }}">
                                    <i class="fa-solid fa-download text-sm"></i>
                                </a>
                            </div>
                        </div>
                    </template>
                    
                    <div x-show="reports.length === 0" class="text-center text-stone-400 py-8">
                        <i class="fa-solid fa-folder-open text-3xl mb-3 opacity-50"></i>
                        <p>{{ app()->getLocale() === 'ar' ? 'لا توجد تقارير متاحة' : 'No reports available' }}</p>
                    </div>
                </div>
            </div>
            
        </div>

        <!-- FUNDING SOURCES SECTION -->
        @php
            $fundingSources = \App\Models\TransparencyFundingSource::all();
            $unAgencies = $fundingSources->filter(fn($s) => in_array(strtolower($s->category_en), ['un agencies', 'un agency', 'un']));
            $ingos = $fundingSources->filter(fn($s) => in_array(strtolower($s->category_en), ['ingos', 'ingo']));
            $membership = $fundingSources->filter(fn($s) => in_array(strtolower($s->category_en), ['membership support', 'membership', 'members']));
        @endphp
        <div class="bg-glass p-8 rounded-3xl border border-white/10 relative overflow-hidden group" id="funding-sources">
            <!-- Card Ambient Glow -->
            <div class="absolute -right-24 -bottom-24 w-80 h-80 bg-orange-500/10 rounded-full blur-[100px] pointer-events-none group-hover:bg-orange-500/15 transition-all duration-700"></div>
            <div class="absolute -left-24 -top-24 w-80 h-80 bg-amber-500/5 rounded-full blur-[100px] pointer-events-none"></div>

            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4 relative z-10">
                <div>
                    <span class="inline-flex items-center gap-2 text-xs font-bold text-orange-400 uppercase tracking-widest bg-orange-500/10 px-3 py-1 rounded-full border border-orange-500/20 mb-2">
                        <i class="fa-solid fa-handshake-angle animate-pulse"></i> {{ app()->getLocale() === 'ar' ? 'الشبكة الداعمة' : 'Support Network' }}
                    </span>
                    <h2 class="font-display text-2xl md:text-3xl font-bold text-white flex items-center gap-3 tracking-tight mt-1">
                        <i class="fa-solid fa-circle-nodes text-orange-400 text-glow"></i> {{ __('massage.funding_sources') }}
                    </h2>
                    <p class="text-stone-400 text-sm mt-1.5 leading-relaxed max-w-2xl font-light">
                        {{ __('massage.funding_sources_desc') }}
                    </p>
                </div>
            </div>

            <!-- Categories Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-stretch relative z-10">
                
                <!-- UN Agencies Category -->
                <div class="bg-stone-950/40 backdrop-blur-md border border-white/5 rounded-2xl p-6 hover:border-orange-500/20 hover:bg-stone-900/60 hover:-translate-y-1 hover:shadow-[0_12px_40px_rgba(249,115,22,0.08)] transition-all duration-300 flex flex-col justify-between group/card">
                    <div>
                        <div class="flex items-center gap-3.5 mb-2">
                            <div class="w-12 h-12 rounded-2xl bg-orange-500/10 flex items-center justify-center border border-orange-500/20 group-hover/card:bg-orange-500 group-hover/card:border-orange-500 group-hover/card:text-white transition-all duration-300 shadow-[inset_0_0_12px_rgba(249,115,22,0.15)] group-hover/card:shadow-[0_0_20px_rgba(249,115,22,0.4)]">
                                <i class="fa-solid fa-globe text-orange-400 group-hover/card:text-white text-lg transition-colors"></i>
                            </div>
                            <div>
                                <h3 class="text-white font-semibold text-base md:text-lg tracking-wide">{{ __('massage.un_agencies') }}</h3>
                                <span class="text-[10px] text-orange-400/80 font-bold uppercase tracking-wider block mt-0.5">
                                    {{ app()->getLocale() === 'ar' ? 'تفويض دولي' : 'Global Mandate' }}
                                </span>
                            </div>
                        </div>
                        <div class="border-b border-white/5 my-4 w-full"></div>
                        <div class="flex flex-wrap gap-2.5 mt-4">
                            @forelse($unAgencies as $source)
                                <span class="bg-white/5 border border-white/10 hover:bg-orange-500/10 hover:border-orange-500/30 text-stone-200 hover:text-orange-300 px-4 py-2.5 rounded-xl text-xs font-semibold transition-all duration-300 flex items-center gap-2.5 shadow-[0_2px_8px_rgba(0,0,0,0.2)] hover:shadow-[0_4px_12px_rgba(249,115,22,0.15)] hover:-translate-y-0.5 cursor-pointer">
                                    <i class="fa-solid {{ $source->icon ?? 'fa-child-reaching' }} text-orange-400/80 text-sm"></i>
                                    {{ app()->getLocale() === 'ar' ? $source->name_ar : $source->name_en }}
                                </span>
                            @empty
                                <span class="text-stone-500 text-xs italic py-2">{{ app()->getLocale() === 'ar' ? 'لا توجد جهات حالياً' : 'No agencies added yet' }}</span>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- INGOs Category -->
                <div class="bg-stone-950/40 backdrop-blur-md border border-white/5 rounded-2xl p-6 hover:border-orange-500/20 hover:bg-stone-900/60 hover:-translate-y-1 hover:shadow-[0_12px_40px_rgba(249,115,22,0.08)] transition-all duration-300 flex flex-col justify-between group/card">
                    <div>
                        <div class="flex items-center gap-3.5 mb-2">
                            <div class="w-12 h-12 rounded-2xl bg-orange-500/10 flex items-center justify-center border border-orange-500/20 group-hover/card:bg-orange-500 group-hover/card:border-orange-500 group-hover/card:text-white transition-all duration-300 shadow-[inset_0_0_12px_rgba(249,115,22,0.15)] group-hover/card:shadow-[0_0_20px_rgba(249,115,22,0.4)]">
                                <i class="fa-solid fa-handshake text-orange-400 group-hover/card:text-white text-lg transition-colors"></i>
                            </div>
                            <div>
                                <h3 class="text-white font-semibold text-base md:text-lg tracking-wide">{{ __('massage.ingos') }}</h3>
                                <span class="text-[10px] text-orange-400/80 font-bold uppercase tracking-wider block mt-0.5">
                                    {{ app()->getLocale() === 'ar' ? 'شراكات إنسانية' : 'Humanitarian Partners' }}
                                </span>
                            </div>
                        </div>
                        <div class="border-b border-white/5 my-4 w-full"></div>
                        <div class="flex flex-wrap gap-2.5 mt-4">
                            @forelse($ingos as $source)
                                <span class="bg-white/5 border border-white/10 hover:bg-orange-500/10 hover:border-orange-500/30 text-stone-200 hover:text-orange-300 px-4 py-2.5 rounded-xl text-xs font-semibold transition-all duration-300 flex items-center gap-2.5 shadow-[0_2px_8px_rgba(0,0,0,0.2)] hover:shadow-[0_4px_12px_rgba(249,115,22,0.15)] hover:-translate-y-0.5 cursor-pointer">
                                    <i class="fa-solid {{ $source->icon ?? 'fa-handshake-angle' }} text-orange-400/80 text-sm"></i>
                                    {{ app()->getLocale() === 'ar' ? $source->name_ar : $source->name_en }}
                                </span>
                            @empty
                                <span class="text-stone-500 text-xs italic py-2">{{ app()->getLocale() === 'ar' ? 'لا توجد جهات حالياً' : 'No INGOs added yet' }}</span>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Membership Support Category -->
                <div class="bg-stone-950/40 backdrop-blur-md border border-white/5 rounded-2xl p-6 hover:border-orange-500/20 hover:bg-stone-900/60 hover:-translate-y-1 hover:shadow-[0_12px_40px_rgba(249,115,22,0.08)] transition-all duration-300 flex flex-col justify-between group/card">
                    <div>
                        <div class="flex items-center gap-3.5 mb-2">
                            <div class="w-12 h-12 rounded-2xl bg-orange-500/10 flex items-center justify-center border border-orange-500/20 group-hover/card:bg-orange-500 group-hover/card:border-orange-500 group-hover/card:text-white transition-all duration-300 shadow-[inset_0_0_12px_rgba(249,115,22,0.15)] group-hover/card:shadow-[0_0_20px_rgba(249,115,22,0.4)]">
                                <i class="fa-solid fa-users text-orange-400 group-hover/card:text-white text-lg transition-colors"></i>
                            </div>
                            <div>
                                <h3 class="text-white font-semibold text-base md:text-lg tracking-wide">{{ __('massage.membership_support') }}</h3>
                                <span class="text-[10px] text-orange-400/80 font-bold uppercase tracking-wider block mt-0.5">
                                    {{ app()->getLocale() === 'ar' ? 'مبادرات مجتمعية' : 'Community Led' }}
                                </span>
                            </div>
                        </div>
                        <div class="border-b border-white/5 my-4 w-full"></div>
                        <div class="flex flex-wrap gap-2.5 mt-4">
                            @forelse($membership as $source)
                                <span class="bg-white/5 border border-white/10 hover:bg-orange-500/10 hover:border-orange-500/30 text-stone-200 hover:text-orange-300 px-4 py-2.5 rounded-xl text-xs font-semibold transition-all duration-300 flex items-center gap-2.5 shadow-[0_2px_8px_rgba(0,0,0,0.2)] hover:shadow-[0_4px_12px_rgba(249,115,22,0.15)] hover:-translate-y-0.5 cursor-pointer">
                                    <i class="fa-solid {{ $source->icon ?? 'fa-people-group' }} text-orange-400/80 text-sm"></i>
                                    {{ app()->getLocale() === 'ar' ? $source->name_ar : $source->name_en }}
                                </span>
                            @empty
                                <span class="text-stone-500 text-xs italic py-2">{{ app()->getLocale() === 'ar' ? 'لا توجد جهات حالياً' : 'No members added yet' }}</span>
                            @endforelse
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </main>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    
    <!-- Application Logic -->
    <script>
        // Legacy Google Charts initialization removed
        
        let mapInstance = null;
        let markersGroup = null;

        document.addEventListener('alpine:init', () => {
            Alpine.data('transparencyDashboard', () => ({
                counters: [],
                showCounterValues: true,
                beneficiaries: [],
                financials: {},
                reports: [],
                sankeyDrawn: false,
                isMobile: window.innerWidth < 768,
                timer: null,
                selectedYear: 'all',
                availableYears: ['all'],
                allPins: [],
                markerMapping: [],
                
                initData() {
                    this.setupMap();
                    
                    // Fetch data immediately
                    this.fetchData().then(() => {
                        // Poll for new data every 3 seconds (Low-latency demonstration without blocking PHP threads)
                        this.timer = setInterval(() => {
                            this.fetchData();
                            this.sendHeight(); // Keep height in sync
                        }, 3000);
                    });

                    // Also fetch map data
                    this.fetchMapData();

                    // Handle window resize for responsiveness
                    window.addEventListener('resize', () => {
                        const wasMobile = this.isMobile;
                        this.isMobile = window.innerWidth < 768;
                        if (this.sankeyDrawn) {
                            this.drawSankey();
                        }
                        this.sendHeight();
                    });

                    // Send initial height
                    setTimeout(() => this.sendHeight(), 1000);
                },

                sendHeight() {
                    // Precise height detection focusing on actual content
                    const content = document.getElementById('main-content');
                    if (!content) return;
                    
                    const height = content.offsetHeight + content.offsetTop + 40; // Content height + top offset + buffer
                    window.parent.postMessage({ type: 'resizeTransparency', height: height }, '*');
                },

                async fetchData() {
                    try {
                        const response = await fetch("{{ Request::root() }}/api/transparency/stream");
                        if (!response.ok) return;
                        const data = await response.json();
                        
                        this.counters = data.counters;
                        this.showCounterValues = data.show_counter_values !== false;
                        this.beneficiaries = data.recent_beneficiaries;
                        this.financials = data.financials;
                        this.reports = data.reports || [];
                        
                        if (!this.sankeyDrawn && data.financials && Object.keys(data.financials).length > 0) {
                            this.sankeyDrawn = true;
                        }
                    } catch (e) {
                        console.error('Data fetch error:', e);
                    }
                },

                destroy() {
                    if (this.timer) {
                        clearInterval(this.timer);
                    }
                },

                drawSankey() {
                    // No longer using Google Charts Sankey, replaced with custom responsive UI
                },

                setupMap() {
                    // Dark theme map via Carto
                    mapInstance = L.map('map', { attributionControl: false }).setView([15.5007, 32.5599], 5);
                    L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
                        attribution: '&copy; OpenStreetMap &copy; CARTO',
                        subdomains: 'abcd',
                        maxZoom: 20
                    }).addTo(mapInstance);
                    
                    markersGroup = L.layerGroup().addTo(mapInstance);
                },

                async fetchMapData() {
                    try {
                        const response = await fetch("{{ Request::root() }}/api/transparency/map");
                        const pins = await response.json();
                        this.allPins = pins;
                        
                        // Extract unique years from all audit logs in pins
                        const years = new Set(['all']);
                        pins.forEach(pin => {
                            if (pin.audit_logs && pin.audit_logs.length > 0) {
                                pin.audit_logs.forEach(log => {
                                    if (log.start_date) {
                                        const year = new Date(log.start_date).getFullYear();
                                        years.add(year.toString());
                                    }
                                });
                            }
                        });
                        this.availableYears = Array.from(years).sort((a, b) => b - a);

                        // Define orange icon
                        const orangeIcon = L.divIcon({
                            className: 'custom-icon',
                            html: `<div class="w-12 h-12 flex items-center justify-center group pointer-events-auto cursor-pointer">
                                     <div class="w-4 h-4 rounded-full bg-orange-500 border border-stone-900 shadow-[0_0_20px_rgba(249,115,22,0.7)] relative transition-transform duration-300 group-hover:scale-150 group-hover:bg-orange-400">
                                         <div class="absolute inset-0 rounded-full animate-ping bg-orange-400 opacity-30 pointer-events-none" style="animation-duration: 2s;"></div>
                                     </div>
                                   </div>`,
                            iconSize: [48, 48],
                            iconAnchor: [24, 24]
                        });

                        this.renderMarkers(pins, orangeIcon);
                        
                        // Fit bounds to show all markers
                        if (pins.length > 0) {
                            const filteredForBounds = pins.filter(p => p.latitude && p.longitude);
                            if (filteredForBounds.length > 0) {
                                const bounds = L.latLngBounds(filteredForBounds.map(p => [p.latitude, p.longitude]));
                                mapInstance.fitBounds(bounds, { padding: [50, 50] });
                            }
                        }
                    } catch (e) {
                        console.error("Map fetch error:", e);
                    }
                },

                renderMarkers(pins, icon) {
                    markersGroup.clearLayers();
                    this.markerMapping = [];

                    pins.forEach(pin => {
                        if (pin.latitude && pin.longitude) {
                            const popupContent = `
                                <div class="min-w-[240px] p-2">
                                    <h4 class="font-bold text-white mb-3 pb-2 border-b border-white/10 text-base flex justify-between items-center">
                                        <span>${ '{{ app()->getLocale() }}' === 'ar' ? pin.name_ar : pin.name_en }</span>
                                        <span class="text-[10px] bg-orange-500/20 text-orange-400 px-2 py-0.5 rounded-full border border-orange-500/30 font-medium">
                                            ${pin.status === 'Active' ? "{{ __('massage.active') }}" : pin.status}
                                        </span>
                                    </h4>
                                    
                                    <div class="space-y-4 text-sm">
                                        <!-- Current Activity Highlight -->
                                        <div class="bg-gradient-to-br from-orange-500/10 to-transparent border border-white/5 p-3 rounded-xl relative overflow-hidden group">
                                            <div class="absolute -inset-inline-start-2 -top-2 opacity-10 group-hover:opacity-20 transition-opacity">
                                                <i class="fa-solid fa-bolt-lightning text-3xl text-orange-400"></i>
                                            </div>
                                            <p class="text-[10px] text-orange-400/80 font-bold uppercase tracking-widest mb-1.5 flex items-center gap-1.5">
                                                <i class="fa-solid fa-circle-nodes text-[8px] animate-pulse"></i>
                                                ${ '{{ app()->getLocale() }}' === 'ar' ? 'النشاط الحالي' : 'Live Activity' }
                                            </p>
                                            <p class="text-white text-xs leading-relaxed font-medium relative z-10">
                                                ${ ('{{ app()->getLocale() }}' === 'ar' ? pin.activity_description_ar : pin.activity_description_en) || ('{{ app()->getLocale() }}' === 'ar' ? 'جاري تنفيذ العمليات الميدانية وتوزيع الإغاثة...' : 'Field operations and relief delivery in progress...') }
                                            </p>
                                        </div>

                                        <div class="space-y-2 mt-2">
                                            <p class="text-[10px] text-stone-500 uppercase font-bold tracking-wider flex items-center gap-1.5">
                                                <i class="fa-solid fa-clipboard-list text-[10px] text-orange-400/50"></i>
                                                ${ '{{ app()->getLocale() }}' === 'ar' ? 'ملفات التدقيق' : 'Audit Logs' }
                                            </p>
                                            ${pin.audit_logs && pin.audit_logs.length > 0 ? pin.audit_logs.map(log => `
                                                <div class="bg-white/5 border border-white/10 p-2 rounded-xl">
                                                    <div class="text-[10px] text-stone-400 flex items-center gap-1.5 mb-2">
                                                        <i class="fa-solid fa-calendar-day text-orange-400/50"></i> 
                                                        <span dir="ltr">${log.start_date || '---'}</span> <span class="opacity-30">→</span> <span dir="ltr">${log.end_date || '---'}</span>
                                                    </div>
                                                    <div class="flex gap-2">
                                                        <a href="${log.file_path}" target="_blank" rel="noopener noreferrer" type="application/pdf" class="text-[10px] flex-1 inline-flex justify-center items-center gap-1 bg-white/5 hover:bg-white/10 border border-white/10 py-1.5 rounded-lg transition-all font-medium text-stone-300">
                                                            <i class="fa-solid fa-eye text-[9px]"></i> {{ __('massage.view') }}
                                                        </a>
                                                        <a href="${log.file_path}" download="${log.file_path.split('/').pop()}" type="application/pdf" class="text-[10px] flex-1 inline-flex justify-center items-center gap-1 bg-orange-500 hover:bg-orange-600 text-white border border-orange-600/20 py-1.5 rounded-lg transition-all font-medium">
                                                            <i class="fa-solid fa-download text-[9px]"></i> {{ __('massage.download') }}
                                                        </a>
                                                    </div>
                                                </div>
                                            `).join('') : `
                                                <p class="text-[10px] text-stone-600 italic py-2 text-center border border-dashed border-white/5 rounded-lg">
                                                    ${ '{{ app()->getLocale() }}' === 'ar' ? 'لا توجد ملفات حالياً' : 'No logs available' }
                                                </p>
                                            `}
                                        </div>
                                    </div>
                                </div>
                            `;

                            const marker = L.marker([pin.latitude, pin.longitude], {icon: icon})
                             .addTo(markersGroup)
                             .bindPopup(popupContent, {
                                 closeButton: true,
                                 className: 'glass-popup',
                                 maxWidth: 300,
                                 minWidth: 260
                             });
                        }
                    });
                },

                filterMarkers() {
                    const filteredPins = this.allPins.map(pin => {
                        // Create a shallow copy of the pin and a filtered copy of its audit_logs
                        const filteredLogs = (pin.audit_logs || []).filter(log => {
                            if (this.selectedYear === 'all') return true;
                            if (!log.start_date) return false;
                            return new Date(log.start_date).getFullYear().toString() === this.selectedYear;
                        });
                        
                        return { ...pin, audit_logs: filteredLogs };
                    }).filter(pin => {
                        // Show all pins if 'all' is selected, otherwise only show pins with matching logs
                        if (this.selectedYear === 'all') return true;
                        return pin.audit_logs.length > 0;
                    });
                    
                    const orangeIcon = L.divIcon({
                        className: 'custom-icon',
                        html: `<div class="w-12 h-12 flex items-center justify-center group pointer-events-auto cursor-pointer">
                                 <div class="w-4 h-4 rounded-full bg-orange-500 border border-stone-900 shadow-[0_0_20px_rgba(249,115,22,0.7)] relative transition-transform duration-300 group-hover:scale-150 group-hover:bg-orange-400">
                                     <div class="absolute inset-0 rounded-full animate-ping bg-orange-400 opacity-30 pointer-events-none" style="animation-duration: 2s;"></div>
                                 </div>
                               </div>`,
                        iconSize: [48, 48],
                        iconAnchor: [24, 24]
                    });

                    this.renderMarkers(filteredPins, orangeIcon);
                }
            }));
        });
        
        // Redraw Sankey on window resize to maintain responsiveness
        window.addEventListener('resize', function() {
            if (Alpine.store('transparencyDashboard') || true) {
                // To safely trigger redraw in Alpine context, we rely on the object logic, or just call a global re-init
                // For simplicity, google charts will redraw if called. In Alpine, we could dispatch an event.
            }
        });
    </script>
    
    <style>
        .custom-scrollbar::-webkit-scrollbar { width: 6px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: rgba(255, 255, 255, 0.05); border-radius: 10px; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: rgba(249, 115, 22, 0.3); border-radius: 10px; }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: rgba(249, 115, 22, 0.5); }
    </style>
</body>
</html>
