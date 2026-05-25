@props(['setting', 'items'])
<section class="py-16 md:py-24 bg-white relative overflow-hidden" id="organizational-capacity">
    <!-- Decorative background elements -->
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-[#fdf4ef] opacity-50 rounded-full blur-[100px] translate-x-1/2 -translate-y-1/4 pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-green-50 opacity-50 rounded-full blur-[80px] -translate-x-1/3 translate-y-1/3 pointer-events-none"></div>

    <div class="container mx-auto px-4 md:px-6 lg:px-8 max-w-7xl relative z-10">
        <!-- Section Header -->
        <div class="text-center mb-16 fade-in">
            <span class="text-[#e8763b] font-semibold uppercase tracking-wider text-sm mb-3 block">{{ $setting->{'capacity_subtitle_' . app()->getLocale()} }}</span>
            <h2 class="text-3xl md:text-4xl font-bold text-[#2d3436] font-serif mb-6" style="font-family: 'Merriweather', serif;">
                {{ $setting->{'capacity_title_' . app()->getLocale()} }}
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto text-lg leading-relaxed">
                {{ $setting->{'capacity_desc_' . app()->getLocale()} }}
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 md:gap-12">
            
            <!-- Column 1: Internal Capacities -->
            <div class="space-y-6">
                <div class="flex items-center gap-3 mb-8">
                    <div class="w-10 h-10 rounded-full bg-green-50 text-green-600 flex items-center justify-center text-lg">
                        <i class="fas fa-building"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-[#2d3436] font-serif" style="font-family: 'Merriweather', serif;">{{ $setting->{'capacity_internal_title_' . app()->getLocale()} }}</h3>
                </div>

                @if(isset($items['capacity_internal']))
                    @foreach($items['capacity_internal'] as $bar)
                    <div class="bg-white rounded-2xl p-6 shadow-[0_4px_20px_rgba(0,0,0,0.03)] border border-gray-100 hover:shadow-[0_8px_30px_rgba(0,0,0,0.06)] transition-all duration-300">
                        <div class="flex justify-between items-center mb-3">
                            <div class="flex items-center gap-3">
                                <i class="{{ $bar->icon }} text-green-500 w-5"></i>
                                <span class="font-bold text-[#2d3436]">{{ $bar->{'title_' . app()->getLocale()} }}</span>
                            </div>
                            <span class="font-bold text-green-600">{{ $bar->number_value }}%</span>
                        </div>
                        <div class="w-full bg-gray-100 rounded-full h-2 mb-3 overflow-hidden">
                            <div class="bg-gradient-to-r from-green-400 to-green-600 h-2 rounded-full transition-all duration-1000 w-[{{ $bar->number_value }}%] relative overflow-hidden" style="width: {{ $bar->number_value }}%;">
                                <div class="absolute inset-0 bg-white/20 w-full animate-[shimmer_2s_infinite]"></div>
                            </div>
                        </div>
                        <div class="text-sm font-medium text-gray-500">{{ $bar->{'extra_value_' . app()->getLocale()} }}</div>
                    </div>
                    @endforeach
                @endif
            </div>

            <!-- Column 2: External Environment -->
            <div class="space-y-6">
                <div class="flex items-center gap-3 mb-8">
                    <div class="w-10 h-10 rounded-full bg-orange-50 text-[#e8763b] flex items-center justify-center text-lg">
                        <i class="fas fa-globe-africa"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-[#2d3436] font-serif" style="font-family: 'Merriweather', serif;">{{ $setting->{'capacity_external_title_' . app()->getLocale()} }}</h3>
                </div>

                @if(isset($items['capacity_external']))
                    @foreach($items['capacity_external'] as $bar)
                    <div class="bg-white rounded-2xl p-6 shadow-[0_4px_20px_rgba(0,0,0,0.03)] border border-gray-100 hover:shadow-[0_8px_30px_rgba(0,0,0,0.06)] transition-all duration-300">
                        <div class="flex justify-between items-center mb-3">
                            <div class="flex items-center gap-3">
                                <i class="{{ $bar->icon }} text-[#e8763b] w-5"></i>
                                <span class="font-bold text-[#2d3436]">{{ $bar->{'title_' . app()->getLocale()} }}</span>
                            </div>
                            <span class="font-bold text-[#e8763b]">{{ $bar->number_value }}%</span>
                        </div>
                        <div class="w-full bg-gray-100 rounded-full h-2 mb-3 overflow-hidden">
                            <div class="bg-gradient-to-r from-orange-400 to-[#e8763b] h-2 rounded-full transition-all duration-1000 w-[{{ $bar->number_value }}%] relative overflow-hidden" style="width: {{ $bar->number_value }}%;">
                                <div class="absolute inset-0 bg-white/20 w-full animate-[shimmer_2s_infinite]"></div>
                            </div>
                        </div>
                        <div class="text-sm font-medium text-gray-500">{{ $bar->extra_value_en }}</div>
                    </div>
                    @endforeach
                @endif

                <!-- Minimal Glassmorphism Summary Card -->
                @if($setting->capacity_summary_title_ar || $setting->capacity_summary_title_en)
                <div class="mt-6 bg-[#fdf4ef]/80 backdrop-blur-sm rounded-2xl p-6 border border-[#e8763b]/10 flex gap-4 items-start">
                    <div class="w-12 h-12 rounded-xl bg-white text-[#e8763b] flex items-center justify-center text-xl flex-shrink-0 shadow-sm">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-[#2d3436] mb-1">{{ $setting->{'capacity_summary_title_' . app()->getLocale()} }}</h4>
                        <p class="text-sm text-gray-600 leading-relaxed">
                            {{ $setting->{'capacity_summary_desc_' . app()->getLocale()} }}
                        </p>
                    </div>
                </div>
                @endif

            </div>

        </div>
    </div>

    <style>
        @keyframes shimmer {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }
    </style>
</section>
