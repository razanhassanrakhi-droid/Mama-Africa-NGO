@props(['setting', 'items'])
<section class="py-16 md:py-24 bg-[#fdf4ef] relative overflow-hidden" id="organizational-journey">
    <!-- Decorative subtle background elements -->
    <div class="absolute top-0 left-0 w-64 h-64 bg-white opacity-40 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2 pointer-events-none"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-[#e8763b] opacity-5 rounded-full blur-3xl translate-x-1/3 translate-y-1/3 pointer-events-none"></div>

    <div class="container mx-auto px-4 md:px-6 lg:px-8 max-w-7xl relative z-10">
        <!-- Section Header -->
        <div class="text-center mb-16 fade-in">
            <span class="text-[#e8763b] font-semibold uppercase tracking-wider text-sm mb-3 block">
                {{ $setting->{'journey_title_' . app()->getLocale()} }}
            </span>
            <h2 class="text-3xl md:text-4xl font-bold text-[#2d3436] font-serif mb-6" style="font-family: 'Merriweather', serif;">
                {{ $setting->{'journey_pos_title_' . app()->getLocale()} }}
            </h2>
        </div>

        <!-- Split Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 md:gap-12">
            
            <!-- Card 1: Positive Experience (Green Accent) -->
            <div class="bg-white rounded-[2rem] p-8 md:p-10 shadow-[0_10px_40px_rgba(0,0,0,0.03)] hover:shadow-[0_15px_50px_rgba(34,197,94,0.08)] transition-all duration-500 hover:-translate-y-2 border border-gray-100 relative overflow-hidden group fade-in">
                <!-- Subtle Gradient Accent Top -->
                <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-green-400 to-green-600"></div>
                
                <div class="flex items-center gap-5 mb-8">
                    <div class="w-16 h-16 rounded-2xl bg-green-50 text-green-600 flex items-center justify-center text-3xl shadow-inner group-hover:scale-110 transition-transform duration-500">
                        <i class="fas fa-seedling"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-[#2d3436] font-serif" style="font-family: 'Merriweather', serif;">
                            {{ app()->getLocale() == 'ar' ? 'التجارب الإيجابية' : 'Positive Experience' }}
                        </h3>
                    </div>
                </div>

                <!-- Simple text block with newlines rendered -->
                <div class="text-gray-600 leading-relaxed text-base whitespace-pre-line font-medium">
                    {!! nl2br(e($setting->{'journey_pos_desc_' . app()->getLocale()})) !!}
                </div>
            </div>

            <!-- Card 2: Challenges Faced (Orange Accent) -->
            <div class="bg-white rounded-[2rem] p-8 md:p-10 shadow-[0_10px_40px_rgba(0,0,0,0.03)] hover:shadow-[0_15px_50px_rgba(232,118,59,0.08)] transition-all duration-500 hover:-translate-y-2 border border-gray-100 relative overflow-hidden group fade-in">
                <!-- Subtle Gradient Accent Top -->
                <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-[#e8763b] to-orange-400"></div>
                
                <div class="flex items-center gap-5 mb-8">
                    <div class="w-16 h-16 rounded-2xl bg-orange-50 text-[#e8763b] flex items-center justify-center text-3xl shadow-inner group-hover:scale-110 transition-transform duration-500">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-[#2d3436] font-serif" style="font-family: 'Merriweather', serif;">
                            {{ $setting->{'journey_neg_title_' . app()->getLocale()} }}
                        </h3>
                    </div>
                </div>

                <!-- Simple text block with newlines rendered -->
                <div class="text-gray-600 leading-relaxed text-base whitespace-pre-line font-medium">
                    {!! nl2br(e($setting->{'journey_neg_desc_' . app()->getLocale()})) !!}
                </div>
            </div>

        </div>
    </div>
</section>
