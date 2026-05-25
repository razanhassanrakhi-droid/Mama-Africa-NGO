@extends('layouts.app')

@section('title', __('massage.donate'))

@section('content')
<style>

    .text-primary-ngo { color: #E07A5F !important; }
    .bg-primary-ngo { background-color: #E07A5F !important; }
    .btn-primary-ngo {
        background-color: #E07A5F;
        border-color: #E07A5F;
        color: white;
    }
    .btn-primary-ngo:hover {
        background-color: #d16b50;
        border-color: #d16b50;
        color: white;
    }
    .donation-amount-btn {
        border: 2px solid #E07A5F;
        color: #E07A5F;
        background: white;
        border-radius: 8px;
        font-weight: bold;
        transition: all 0.3s ease;
    }
    .donation-amount-btn:hover, .donation-amount-btn.active {
        background: #E07A5F;
        color: white;
    }
    .payment-method-card {
        border: 1px solid #ddd;
        border-radius: 8px;
        transition: transform 0.2s, box-shadow 0.2s;
        cursor: pointer;
    }
    .payment-method-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        border-color: #81B29A;
    }
    .payment-method-card.selected {
        border: 2px solid #81B29A;
        background-color: #f4f9f6;
    }
    .secure-badge {
        font-size: 0.85rem;
        color: #81B29A;
    }
</style>

<div class="container pt-4 pb-5">
    <div class="text-center mb-5">
        <h1 class="fw-bold mb-2">
            {{ app()->getLocale() == 'ar' ? ($settings['donation_hero_title_ar'] ?? __('massage.donation_form.hero_title')) : ($settings['donation_hero_title_en'] ?? __('massage.donation_form.hero_title')) }}
        </h1>
        <p class="text-muted lead mx-auto" style="max-width: 700px;">
            {{ app()->getLocale() == 'ar' ? ($settings['donation_hero_subtitle_ar'] ?? ($settings['donation_message_ar'] ?? __('massage.donation_form.hero_subtitle'))) : ($settings['donation_hero_subtitle_en'] ?? ($settings['donation_message_en'] ?? __('massage.donation_form.hero_subtitle'))) }}
        </p>
    </div>
    <form action="{{ route('donate.store') }}" method="POST" id="donationForm">
        @csrf
        <div class="row g-4">
            <!-- Left Column: Donation Details -->
            <div class="col-lg-7">
                <div class="card shadow-sm border-0 rounded-4 h-100">
                    <div class="card-body p-4 p-md-5">
                        @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <!-- 1. Donation Frequency -->
                        <div class="mb-5">
                            <h4 class="fw-bold mb-4 d-flex align-items-center">
                                <span class="bg-primary-ngo text-white rounded-circle d-inline-flex align-items-center justify-content-center me-3" style="width: 32px; height: 32px; font-size: 0.9rem;">1</span>
                                {{ __('massage.donation_type') }}
                            </h4>
                            <div class="d-flex flex-wrap gap-3">
                                <button type="button" class="btn donation-amount-btn flex-grow-1 py-3 active frequency-btn" data-frequency="one-time">
                                    <i class="fas fa-hand-holding-heart me-2"></i> {{ __('massage.one_time') }}
                                </button>
                                <button type="button" class="btn donation-amount-btn flex-grow-1 py-3 frequency-btn" data-frequency="monthly">
                                    <i class="fas fa-calendar-alt me-2"></i> {{ __('massage.monthly') }}
                                </button>
                                <input type="hidden" name="frequency" id="donationFrequency" value="one-time">
                            </div>
                        </div>

                        <!-- 2. Donation Amount -->
                        <div class="mb-5">
                            <h4 class="fw-bold mb-4 d-flex align-items-center">
                                <span class="bg-primary-ngo text-white rounded-circle d-inline-flex align-items-center justify-content-center me-3" style="width: 32px; height: 32px; font-size: 0.9rem;">2</span>
                                {{ app()->getLocale() == 'ar' ? ($settings['donation_form_title_ar'] ?? __('massage.donation_form.step_amount')) : ($settings['donation_form_title_en'] ?? __('massage.donation_form.step_amount')) }}
                            </h4>
                            <div class="row g-3 mb-4">
                                <div class="col-6 col-md-3"><button type="button" class="btn donation-amount-btn w-100 py-3 amount-btn" data-amount="10">$10</button></div>
                                <div class="col-6 col-md-3"><button type="button" class="btn donation-amount-btn w-100 py-3 amount-btn" data-amount="25">$25</button></div>
                                <div class="col-6 col-md-3"><button type="button" class="btn donation-amount-btn w-100 py-3 active amount-btn" data-amount="50">$50</button></div>
                                <div class="col-6 col-md-3"><button type="button" class="btn donation-amount-btn w-100 py-3 amount-btn" data-amount="100">$100</button></div>
                                <div class="col-12">
                                    <button type="button" class="btn donation-amount-btn w-100 py-3 amount-btn" id="customAmountBtn">
                                        <i class="fas fa-edit me-2"></i> {{ __('massage.donation_form.custom_amount') }}
                                    </button>
                                </div>
                            </div>
                            
                            <div class="mb-4" id="customAmountContainer" style="display: none;">
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text bg-light border-end-0">$</span>
                                    <input type="number" name="amount" id="donationAmount" class="form-control border-start-0" value="50" min="1" step="0.01">
                                </div>
                            </div>
                        </div>

                        <!-- 3. Personal Details -->
                        <div>
                            <h4 class="fw-bold mb-4 d-flex align-items-center" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
                                <span class="bg-primary-ngo text-white rounded-circle d-inline-flex align-items-center justify-content-center me-3" style="width: 32px; height: 32px; font-size: 0.9rem;">3</span>
                                {{ app()->getLocale() == 'ar' ? ($settings['donation_form_details_ar'] ?? __('massage.donation_form.step_details')) : ($settings['donation_form_details_en'] ?? __('massage.donation_form.step_details')) }}
                            </h4>
                            <div class="row g-3" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">{{ __('massage.donation_form.full_name') }}</label>
                                    <input type="text" name="donor_name" class="form-control form-control-lg bg-light border-0" required placeholder="{{ __('massage.donation_form.full_name_placeholder') }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">{{ __('massage.donation_form.email_address') }}</label>
                                    <input type="email" name="donor_email" class="form-control form-control-lg bg-light border-0" required placeholder="{{ __('massage.donation_form.email_placeholder') }}" dir="ltr">
                                </div>
                                <div class="col-12">
                                    <label class="form-label small fw-bold">{{ __('massage.donation_form.message') }}</label>
                                    <textarea name="message" class="form-control bg-light border-0" rows="3" placeholder="{{ __('massage.donation_form.message_placeholder') }}"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Payment & Summary -->
            <div class="col-lg-5">
                <div class="sticky-top" style="top: 100px; z-index: 1;">
                    <div class="card shadow-sm border-0 rounded-4 mb-4">
                        <div class="card-body p-4 p-md-5">
                            <!-- 4. Payment Method -->
                            <h4 class="fw-bold mb-4 d-flex align-items-center">
                                <span class="bg-primary-ngo text-white rounded-circle d-inline-flex align-items-center justify-content-center me-3" style="width: 32px; height: 32px; font-size: 0.9rem;">4</span>
                                {{ app()->getLocale() == 'ar' ? ($settings['donation_form_payment_ar'] ?? __('massage.donation_form.step_payment')) : ($settings['donation_form_payment_en'] ?? __('massage.donation_form.step_payment')) }}
                            </h4>
                            <div class="row g-3 mb-4">
                                @forelse($paymentMethods as $method)
                                    <div class="col-12">
                                        <div class="card payment-method-card text-center p-3" onclick="selectPaymentMethod(this, {{ $method->id }}, {{ json_encode($method->getTranslation('instructions', app()->getLocale())) }})">
                                            <input type="radio" name="payment_method_id" value="{{ $method->id }}" id="method_{{ $method->id }}" class="d-none" required>
                                            <div class="d-flex align-items-center">
                                                <div class="fs-2 text-primary-ngo me-3" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                                    @if($method->logo && Storage::disk('public')->exists($method->logo))
                                                        <img src="{{ url('/media/' . $method->logo) }}" class="w-100 h-100 object-contain" alt="{{ $method->getTranslation('name', app()->getLocale()) }}">
                                                    @elseif($method->icon)
                                                        <i class="{{ $method->icon }}"></i>
                                                    @else
                                                        <i class="fas fa-money-bill-wave"></i>
                                                    @endif
                                                </div>
                                                <div class="text-start">
                                                    <h6 class="mb-0 fw-bold">{{ $method->getTranslation('name', app()->getLocale()) }}</h6>
                                                    <p class="text-muted small mb-0">{{ $method->getTranslation('description', app()->getLocale()) }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-12 text-center text-muted">
                                        <p>{{ __('massage.donation_form.no_methods') }}</p>
                                    </div>
                                @endforelse
                            </div>

                            <!-- Instructions -->
                            <div class="alert alert-info d-none mb-4 border-0 shadow-sm" id="paymentInstructions">
                                <h6 class="fw-bold mb-2"><i class="fas fa-info-circle me-2"></i>{{ __('massage.donation_form.payment_instructions') }}</h6>
                                <div id="instructionsContent" class="small"></div>
                            </div>

                            <!-- Reference -->
                            <div class="mb-4 d-none animate__animated animate__fadeIn" id="referenceContainer">
                                <label class="form-label small fw-bold">{{ __('massage.donation_form.transaction_reference') }}</label>
                                <input type="text" name="transaction_reference" id="transaction_reference" class="form-control form-control-lg bg-light border-0" required>
                            </div>

                            <!-- Donation Summary -->
                            <div class="bg-light p-4 rounded-4 mb-4 border border-dashed text-center">
                                <h6 class="text-muted mb-2">{{ __('massage.donation_form.summary_title') }}</h6>
                                <div class="d-flex align-items-center justify-content-center">
                                    <span class="display-5 fw-bold text-primary-ngo" id="summaryAmount">$50</span>
                                    <span class="ms-2 text-muted" id="summaryFrequency">/ {{ __('massage.one_time') }}</span>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary-ngo btn-lg w-100 py-3 fw-bold rounded-pill shadow-sm">
                                {{ __('massage.donation_form.confirm_button') }}
                            </button>

                            <div class="text-center mt-3 small text-muted">
                                <i class="fas fa-lock me-1"></i> {{ __('massage.donation_form.secure_transaction') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    // Update summary in real-time
    function updateSummary() {
        const amount = document.getElementById('donationAmount').value || '0';
        const frequencyBtn = document.querySelector('.frequency-btn.active');
        const frequency = frequencyBtn ? frequencyBtn.innerText.trim() : '';
        
        document.getElementById('summaryAmount').innerText = '$' + amount;
        document.getElementById('summaryFrequency').innerText = '/ ' + frequency;
    }

    // Handle predefined amounts
    document.querySelectorAll('.amount-btn').forEach(button => {
        button.addEventListener('click', function() {
            document.querySelectorAll('.amount-btn').forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            const customContainer = document.getElementById('customAmountContainer');
            const amountInput = document.getElementById('donationAmount');
            
            if(this.id === 'customAmountBtn') {
                customContainer.style.display = 'block';
                amountInput.value = '';
                amountInput.focus();
            } else {
                customContainer.style.display = 'none';
                amountInput.value = this.getAttribute('data-amount');
            }
            updateSummary();
        });
    });

    document.getElementById('donationAmount').addEventListener('input', updateSummary);

    // Handle frequency selection
    document.querySelectorAll('.frequency-btn').forEach(button => {
        button.addEventListener('click', function() {
            document.querySelectorAll('.frequency-btn').forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            document.getElementById('donationFrequency').value = this.getAttribute('data-frequency');
            updateSummary();
        });
    });

    // Handle payment method selection
    function selectPaymentMethod(element, id, instructions) {
        document.getElementById('method_' + id).checked = true;
        document.querySelectorAll('.payment-method-card').forEach(card => card.classList.remove('selected'));
        element.classList.add('selected');
        
        const instructionsDiv = document.getElementById('paymentInstructions');
        const refContainer = document.getElementById('referenceContainer');
        const refInput = document.getElementById('transaction_reference');
        
        // Show reference container whenever a payment method is selected
        refContainer.classList.remove('d-none');
        refInput.setAttribute('required', 'required');

        if (instructions && instructions.trim() !== '') {
            document.getElementById('instructionsContent').innerHTML = instructions;
            instructionsDiv.classList.remove('d-none');
        } else {
            instructionsDiv.classList.add('d-none');
        }
    }

    // Initialize summary
    window.addEventListener('load', updateSummary);
</script>
@endsection


