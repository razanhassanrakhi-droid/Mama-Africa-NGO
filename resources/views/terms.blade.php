@extends('layouts.app')

@php
    $terms = \App\Models\LegalContent::where('page_type', 'terms')->first();
    $locale = app()->getLocale();
@endphp

@section('title', 'Mama Africa - ' . ($terms->{'title_'.$locale} ?? __('massage.tosTitle')))

@section('styles')
<style>
    .custom-scrollbar::-webkit-scrollbar {
        width: 10px;
    }
    .custom-scrollbar::-webkit-scrollbar-track {
        background: #e5e7eb;
        border-radius: 5px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #f97316;
        border-radius: 5px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #f97316;
    }

    /* RTL helpers */
    html[dir="rtl"] .rtl-pl-10 {
        padding-right: 2.5rem;
        padding-left: 0;
    }
</style>
@endsection

@section('content')
<div class="bg-gradient-to-br from-blue-50 to-slate-100 py-12 px-4 sm:px-6 lg:px-8 flex items-center justify-center">
    <div class="bg-white rounded-2xl shadow-2xl max-w-4xl w-full overflow-hidden">
        <!-- Header -->
        <div class="bg-gradient-to-r from-[#f97316] to-[#f7802b] px-8 py-6">
            <div class="flex items-center justify-between gap-4">
                <div class="flex items-center gap-4">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                    <div>
                        <h1 class="text-3xl font-bold text-white">
                            {{ $terms->{'title_'.$locale} ?? __('massage.tosTitle') }}
                        </h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scrollable Content -->
        <div class="px-8 py-6 max-h-[600px] overflow-y-auto custom-scrollbar" id="contentRoot">
            @for($i = 1; $i <= 6; $i++)
                @if(!empty($terms->{'s'.$i.'_title_'.$locale}) || !empty($terms->{'s'.$i.'_content_'.$locale}))
                <section class="mb-8">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center" aria-hidden="true">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <h2 class="text-xl font-semibold text-gray-800">{{ $terms->{'s'.$i.'_title_'.$locale} }}</h2>
                    </div>
                    <div class="pl-10 rtl-pl-10 space-y-3 text-gray-600 leading-relaxed">
                        {!! nl2br(e($terms->{'s'.$i.'_content_'.$locale})) !!}
                    </div>
                </section>
                @endif
            @endfor

            @php
                $phones = array_filter(explode("\n", str_replace("\r", "", $terms->phone ?? '+256 783 750109')));
                $emails = array_filter(explode("\n", str_replace("\r", "", $terms->email ?? 'mamaafricamao@gmail.com')));
            @endphp

            @if(count($phones) > 0 || count($emails) > 0)
            <section class="mt-12 border-t pt-8">
                <div class="flex items-center gap-2 mb-4">
                    <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center" aria-hidden="true">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h2 class="text-xl font-semibold text-gray-800">{{ $locale == 'ar' ? 'اتصل بنا' : 'Contact Us' }}</h2>
                </div>
                <div class="pl-10 rtl-pl-10 space-y-2 text-gray-600">
                    <p class="mb-4">{{ $locale == 'ar' ? 'إذا كان لديك أي أسئلة حول شروط الخدمة الخاصة بنا، يرجى الاتصال بنا:' : 'If you have any questions about our Terms of Service, please contact us:' }}</p>
                    
                    @foreach($phones as $p)
                        <p class="font-semibold text-gray-800">{{ __('massage.phone') }}: <span class="text-gray-600 font-normal inline-block" dir="ltr">{{ trim($p) }}</span></p>
                    @endforeach

                    @foreach($emails as $e)
                        <p class="font-semibold text-gray-800">{{ __('massage.email') }}: 
                            <a href="mailto:{{ trim($e) }}" class="text-blue-600 hover:text-[#f97316] underline transition font-normal">
                                {{ trim($e) }}
                            </a>
                        </p>
                    @endforeach
                </div>
            </section>
            @endif
        </div>

        <!-- Footer with Accept Button -->
        <div class="px-8 py-6 bg-gray-50 border-t border-gray-200">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" id="agreeCheckbox" class="w-5 h-5 text-[#f97316] rounded border-gray-300 focus:ring-[#f97316]" />
                    <span class="text-gray-600 text-sm"> {{ __('massage.agreeLabel') }}</span>
                </label>
                <div class="flex gap-3">
                    <button id="declineBtn" class="px-6 py-3 text-gray-600 font-medium rounded-lg border border-gray-300 hover:bg-gray-100 transition-colors">
                        {{ __('massage.declineBtn') }}
                    </button>
                    <button id="acceptBtn" disabled class="px-8 py-3 bg-[#f97316] text-white font-semibold rounded-lg hover:bg-[#ea580c] transition-all disabled:opacity-50 disabled:cursor-not-allowed shadow-lg shadow-orange-200/50">
                        {{ __('massage.acceptBtn') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Success Modal -->
<div id="successModal" class="fixed inset-0 bg-black/50 flex items-center justify-center hidden z-[2000]">
    <div class="bg-white rounded-2xl p-8 max-w-md mx-4 text-center transform scale-95 opacity-0 transition-all duration-300" id="modalContent">
        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4" aria-hidden="true">
            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>
        <h3 class="text-2xl font-bold text-gray-800 mb-2">Terms Accepted!</h3>
        <p class="text-gray-600 mb-6">Thank you for accepting our Terms of Service. You can now proceed to use our services.</p>
        <button id="closeModal" class="px-6 py-3 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition-colors">
            Continue
        </button>
    </div>
</div>
@endsection

@section('scripts')
<script>
    const agreeCheckbox = document.getElementById('agreeCheckbox');
    const acceptBtn = document.getElementById('acceptBtn');
    const declineBtn = document.getElementById('declineBtn');
    const successModal = document.getElementById('successModal');
    const modalContent = document.getElementById('modalContent');
    const closeModal = document.getElementById('closeModal');

    if (agreeCheckbox && acceptBtn) {
        agreeCheckbox.addEventListener('change', (e) => {
            acceptBtn.disabled = !e.target.checked;
        });
    }

    if (acceptBtn && successModal && modalContent) {
        acceptBtn.addEventListener('click', () => {
            successModal.classList.remove('hidden');
            setTimeout(() => {
                modalContent.classList.remove('scale-95', 'opacity-0');
                modalContent.classList.add('scale-100', 'opacity-100');
            }, 10);
        });
    }

    if (declineBtn) {
        declineBtn.addEventListener('click', () => {
            const currentLang = document.documentElement.lang || 'en';
            const msg = currentLang === 'en'
                ? 'Are you sure you want to decline? You will not be able to use our services without accepting the Terms of Service.'
                : 'هل أنت متأكد من الرفض؟ لن تتمكن من استخدام خدماتنا دون الموافقة على شروط الخدمة.';
            if (confirm(msg)) {
                window.location.href = "{{ route('home') }}";
            }
        });
    }

    if (closeModal && successModal) {
        closeModal.addEventListener('click', () => {
            window.location.href = "{{ route('home') }}";
        });
    }
</script>
@endsection