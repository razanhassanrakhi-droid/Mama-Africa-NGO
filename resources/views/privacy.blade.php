@extends('layouts.app')

@php
    $privacy = \App\Models\LegalContent::where('page_type', 'privacy')->first();
    $locale = app()->getLocale();
@endphp

@section('title', 'Mama Africa - ' . ($privacy->{'title_'.$locale} ?? __('massage.privacyTitle')))

@section('styles')
<style>
    .par {
        white-space: pre-wrap;
    }
    .icon-circle {
        font-size: 24px;
        color: #333;
        margin-right: 15px;
        width: 40px;
        text-align: center;
    }
</style>
@endsection

@section('content')
<div class="bg-white overflow-x-hidden">
    <main class="pt-12 max-w-5xl mx-auto px-6">
        <h1 class="text-3xl font-bold text-gray-900 flex items-center gap-3">
            <svg class="w-7 h-7 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 11c0 1.1-.9 2-2 2s-2-.9-2-2 .9-2 2-2 2 .9 2 2z"/>
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.2 6.2a9 9 0 1111.6 11.6A9 9 0 016.2 6.2z"/>
            </svg>
            {{ $privacy->{'title_'.$locale} ?? __('massage.privacyTitle') }}
        </h1>

        <p class="text-gray-600 mt-4 leading-relaxed text-[17px]">
            {{ $privacy->{'intro_'.$locale} ?? __('massage.privacyIntro') }}
        </p>
    </main>

    <!-- section -->
    <section class="privacy py-12">
        <div class="max-w-5xl mx-auto px-6 space-y-14">

            @if(!empty($privacy->{'privacy_intro_long_'.$locale}))
            <!-- Intro -->
            <div class="space-y-5">
                <p class="text-gray-700 leading-relaxed text-[17px]">
                    {{ $privacy->{'privacy_intro_long_'.$locale} }}
                </p>
            </div>
            @endif

            <div class="space-y-12">
                @for($i = 1; $i <= 6; $i++)
                    @if(!empty($privacy->{'s'.$i.'_title_'.$locale}) || !empty($privacy->{'s'.$i.'_content_'.$locale}))
                    <div>
                        <h1 class="text-xl font-semibold text-gray-800 flex items-center gap-2">
                            <svg class="w-5 h-5 text-lime-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3"/>
                            </svg>
                            {{ $privacy->{'s'.$i.'_title_'.$locale} }}
                        </h1>
                        <div class="text-gray-600 leading-relaxed text-[17px] par mt-3">{!! nl2br(e($privacy->{'s'.$i.'_content_'.$locale})) !!}</div>
                    </div>
                    @endif
                @endfor

                <div class="border-t pt-8">
                    <h1 class="text-xl font-semibold text-gray-800 flex items-center gap-2">
                        <svg class="w-5 h-5 text-lime-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3"/>
                        </svg>
                        {{ $locale == 'ar' ? 'اتصل بنا' : 'Contact Us' }}
                    </h1>
                    <p class="text-gray-600 leading-relaxed text-[17px] mt-3">
                        {{ $locale == 'ar' ? 'إذا كان لديك أي أسئلة حول سياسة الخصوصية الخاصة بنا، يرجى الاتصال بنا:' : 'If you have any questions about our privacy policy, please contact us:' }}
                    </p>
                    
                    <div class="mt-4 space-y-2">
                        @php
                            $phones = array_filter(explode("\n", str_replace("\r", "", $privacy->phone ?? '+256 783 750109')));
                            $emails = array_filter(explode("\n", str_replace("\r", "", $privacy->email ?? 'mamaafricamao@gmail.com')));
                        @endphp

                        @foreach($phones as $p)
                            <p class="font-semibold text-gray-800">{{ __('massage.phone') }}: <span class="text-gray-600 font-normal inline-block" dir="ltr">{{ trim($p) }}</span></p>
                        @endforeach

                        @foreach($emails as $e)
                            <p class="font-semibold text-gray-800">{{ __('massage.email') }}: 
                                <a href="mailto:{{ trim($e) }}" class="text-blue-600 hover:text-orange-600 underline transition font-normal">
                                    {{ trim($e) }}
                                </a>
                            </p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection