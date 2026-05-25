@extends('layouts.app')

@section('title', __('massage.donation_success.title'))

@section('content')
<style>
    .success-icon {
        font-size: 5rem;
        color: #81B29A;
        margin-bottom: 1.5rem;
    }
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
</style>

<div class="container py-5 mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
            <div class="card shadow border-0 rounded-4">
                <div class="card-body p-4 p-md-5">
                    <div class="success-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h2 class="fw-bold mb-3">{{ __('massage.donation_success.title') }}</h2>
                    <p class="lead text-muted mb-4">
                        {{ __('massage.donation_success.message') }}
                    </p>
                    
                    <div class="alert alert-success d-inline-block px-4 py-3 mb-5">
                        <i class="fas fa-heart me-2 text-danger"></i>
                        <strong>{{ __('massage.donation_success.generosity') }}</strong>
                    </div>

                    <div class="mt-2 text-center">
                        <h5 class="fw-bold mb-3">{{ __('massage.donation_success.share_message') }}</h5>
                        <div class="d-flex justify-content-center flex-wrap gap-2">
                            @if(!empty($contact->facebook_url))
                                <a href="{{ $contact->facebook_url }}" target="_blank" class="btn btn-outline-primary btn-sm rounded-pill px-3">
                                    <i class="fab fa-facebook-f me-2"></i> {{ __('massage.donation_success.facebook') }}
                                </a>
                            @endif
                            @if(!empty($contact->x_url))
                                <a href="{{ $contact->x_url }}" target="_blank" class="btn btn-outline-dark btn-sm rounded-pill px-3">
                                    <i class="fab fa-x-twitter me-2"></i> {{ __('massage.donation_success.twitter') }}
                                </a>
                            @endif
                            @if(!empty($contact->instagram_url))
                                <a href="{{ $contact->instagram_url }}" target="_blank" class="btn btn-outline-danger btn-sm rounded-pill px-3">
                                    <i class="fab fa-instagram me-2"></i> {{ __('massage.donation_success.instagram') }}
                                </a>
                            @endif
                            @if(!empty($contact->whatsapp_url))
                                <a href="{{ $contact->whatsapp_url }}" target="_blank" class="btn btn-outline-success btn-sm rounded-pill px-3">
                                    <i class="fab fa-whatsapp me-2"></i> {{ __('massage.donation_success.whatsapp') }}
                                </a>
                            @endif
                            @if(!empty($contact->linkedin_url))
                                <a href="{{ $contact->linkedin_url }}" target="_blank" class="btn btn-outline-primary btn-sm rounded-pill px-3">
                                    <i class="fab fa-linkedin-in me-2"></i> {{ __('massage.donation_success.linkedin') }}
                                </a>
                            @endif
                            @if(!empty($contact->tiktok_url))
                                <a href="{{ $contact->tiktok_url }}" target="_blank" class="btn btn-outline-dark btn-sm rounded-pill px-3">
                                    <i class="fab fa-tiktok me-2"></i> {{ __('massage.donation_success.tiktok') }}
                                </a>
                            @endif
                            @if(!empty($contact->telegram_url))
                                <a href="{{ $contact->telegram_url }}" target="_blank" class="btn btn-outline-info btn-sm rounded-pill px-3">
                                    <i class="fab fa-telegram-plane me-2"></i> {{ __('massage.donation_success.telegram') }}
                                </a>
                            @endif
                        </div>
                    </div>

                    <hr class="my-5">
                    
                    <a href="{{ route('home') }}" class="btn btn-primary-ngo btn-lg px-4 rounded-pill">
                        {{ __('massage.donation_success.return_home') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
