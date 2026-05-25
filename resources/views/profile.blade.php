@extends('layouts.app')

@section('title', app()->getLocale() == 'ar' ? 'الملف المؤسسي' : 'Institutional Profile')

@section('styles')
<style>
    :root {
        --profile-accent: #e8763b; /* Brand Orange */
        --profile-accent-light: #fdf4ef;
        --profile-bg: #fbfbfa; /* Soft warm background */
        --profile-text: #4a5568;
        --profile-heading: #2d3748;
        --card-shadow: 0 10px 30px rgba(0, 0, 0, 0.04);
        --card-hover-shadow: 0 20px 40px rgba(232, 118, 59, 0.08);
    }

    body {
        background-color: var(--profile-bg);
    }

    /* Hero Section */
    .profile-hero {
        padding: 140px 0 80px;
        background: linear-gradient(135deg, #ffffff 0%, var(--profile-bg) 100%);
        position: relative;
        overflow: hidden;
    }
    
    .profile-hero::after {
        content: '';
        position: absolute;
        top: -100px;
        right: -100px;
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, var(--profile-accent-light) 0%, transparent 70%);
        border-radius: 50%;
        z-index: 0;
    }

    .hero-content {
        position: relative;
        z-index: 1;
        text-align: center;
    }

    .profile-title {
        font-family: 'Playfair Display', serif;
        font-size: 3.5rem;
        font-weight: 700;
        color: var(--profile-heading);
        margin-bottom: 0.5rem;
    }

    [dir="rtl"] .profile-title {
        font-family: 'Cairo', sans-serif;
    }

    .profile-subtitle {
        color: var(--profile-text);
        font-size: 1.2rem;
        max-width: 600px;
        margin: 0 auto;
    }

    .pill-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 1rem;
        margin-top: 2rem;
    }

    .stat-pill {
        background: white;
        color: var(--profile-accent);
        padding: 0.75rem 1.5rem;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.95rem;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        display: flex;
        align-items: center;
        gap: 0.5rem;
        border: 1px solid var(--profile-accent-light);
    }

    /* Core Identity Cards (Goal, Vision, Mission) */
    .core-section {
        padding: 4rem 0;
        position: relative;
        z-index: 2;
        margin-top: -40px;
    }

    .core-card {
        background: white;
        border-radius: 20px;
        padding: 2.5rem;
        height: 100%;
        box-shadow: var(--card-shadow);
        transition: all 0.3s ease;
        border: 1px solid rgba(0,0,0,0.02);
    }

    .core-card:hover {
        transform: translateY(-10px);
        box-shadow: var(--card-hover-shadow);
    }

    .core-icon {
        width: 70px;
        height: 70px;
        background: var(--profile-accent-light);
        color: var(--profile-accent);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        margin-bottom: 1.5rem;
    }

    .core-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--profile-heading);
        margin-bottom: 1rem;
    }

    [dir="rtl"] .core-title {
        font-family: 'Cairo', sans-serif;
    }

    .core-text {
        color: var(--profile-text);
        line-height: 1.7;
    }

    .objective-card:hover {
        transform: translateY(-8px) !important;
        box-shadow: var(--card-hover-shadow) !important;
    }

    /* History Timeline */
    .history-section {
        padding: 5rem 0;
        background: white;
    }

    .section-header {
        text-align: center;
        margin-bottom: 4rem;
    }

    .section-title {
        font-family: 'Playfair Display', serif;
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--profile-heading);
    }

    [dir="rtl"] .section-title {
        font-family: 'Cairo', sans-serif;
    }

    .timeline {
        position: relative;
        max-width: 900px;
        margin: 0 auto;
        padding: 2rem 0;
    }

    .timeline::before {
        content: '';
        position: absolute;
        top: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 3px;
        height: 100%;
        background: rgba(232, 118, 59, 0.2);
        border-radius: 3px;
    }

    .timeline-item {
        margin-bottom: 4rem;
        position: relative;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .timeline-item:nth-child(odd) {
        flex-direction: row-reverse;
    }

    .timeline-dot {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 24px;
        height: 24px;
        background: var(--profile-accent);
        border: 4px solid white;
        border-radius: 50%;
        box-shadow: 0 0 0 4px rgba(232, 118, 59, 0.2), 0 4px 10px rgba(232, 118, 59, 0.3);
        z-index: 1;
        transition: transform 0.3s ease;
    }

    .timeline-item:hover .timeline-dot {
        transform: translate(-50%, -50%) scale(1.2);
    }

    .timeline-content {
        width: 45%;
        background: white;
        padding: 2rem;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        border-left: 5px solid var(--profile-accent);
        position: relative;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    [dir="rtl"] .timeline-content {
        border-left: none;
        border-right: 5px solid var(--profile-accent);
    }

    .timeline-item:hover .timeline-content {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(232, 118, 59, 0.08);
    }

    .timeline-content::before {
        content: '';
        position: absolute;
        top: 50%;
        width: 0;
        height: 0;
        border-top: 10px solid transparent;
        border-bottom: 10px solid transparent;
        transform: translateY(-50%);
    }

    .timeline-item:nth-child(even) .timeline-content::before {
        right: -10px;
        border-left: 10px solid white;
    }
    
    .timeline-item:nth-child(odd) .timeline-content::before {
        left: -10px;
        border-right: 10px solid white;
    }

    [dir="rtl"] .timeline-item:nth-child(even) .timeline-content::before {
        right: auto;
        left: -10px;
        border-left: none;
        border-right: 10px solid white;
    }

    [dir="rtl"] .timeline-item:nth-child(odd) .timeline-content::before {
        left: auto;
        right: -10px;
        border-right: none;
        border-left: 10px solid white;
    }

    .timeline-date {
        color: var(--profile-accent);
        font-weight: 700;
        font-size: 0.95rem;
        margin-bottom: 0.75rem;
        display: inline-block;
        background: rgba(232, 118, 59, 0.1);
        padding: 0.3rem 1rem;
        border-radius: 50px;
    }

    .timeline-text {
        color: var(--profile-heading);
        font-weight: 600;
        font-size: 1.15rem;
        margin: 0;
        line-height: 1.5;
    }

    /* Institutional Profile Snapshot */
    .snapshot-section {
        padding: 5rem 0;
        background: var(--profile-bg);
    }

    .snapshot-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
    }

    .snapshot-card {
        background: white;
        padding: 2rem 1.5rem;
        border-radius: 15px;
        text-align: center;
        box-shadow: var(--card-shadow);
        border-bottom: 4px solid var(--profile-accent);
        transition: transform 0.3s ease;
    }

    .snapshot-card:hover {
        transform: translateY(-5px);
    }

    .snapshot-icon {
        font-size: 2rem;
        color: var(--profile-accent);
        margin-bottom: 1rem;
    }

    .snapshot-label {
        font-size: 0.85rem;
        color: var(--profile-text);
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 0.5rem;
    }

    [dir="rtl"] .snapshot-label {
        letter-spacing: 0;
        font-weight: 600;
    }

    .snapshot-value {
        font-weight: 700;
        color: var(--profile-heading);
        font-size: 1.1rem;
    }

    /* Strengths & Capacity */
    .capacity-section {
        padding: 5rem 0;
        background: white;
    }

    .capacity-card {
        background: var(--profile-bg);
        padding: 2.5rem;
        border-radius: 20px;
        height: 100%;
        border: 1px solid rgba(0,0,0,0.03);
    }

    .capacity-header {
        display: flex;
        align-items: center;
        gap: 1.25rem;
        margin-bottom: 1.5rem;
    }

    .capacity-icon {
        width: 55px;
        height: 55px;
        background: white;
        color: var(--profile-accent);
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        box-shadow: var(--card-shadow);
        flex-shrink: 0;
    }

    .capacity-title {
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--profile-heading);
        margin: 0;
    }

    .capacity-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .capacity-list li {
        position: relative;
        padding-left: 1.5rem;
        margin-bottom: 1rem;
        color: var(--profile-text);
        line-height: 1.6;
    }

    [dir="rtl"] .capacity-list li {
        padding-left: 0;
        padding-right: 1.5rem;
    }

    .capacity-list li::before {
        content: '\f00c'; /* FontAwesome check */
        font-family: 'Font Awesome 6 Free';
        font-weight: 900;
        position: absolute;
        left: 0;
        color: var(--profile-accent);
        font-size: 0.9rem;
        top: 3px;
    }

    [dir="rtl"] .capacity-list li::before {
        left: auto;
        right: 0;
    }

    /* Methodology & Grants Section */
    .methodology-section {
        padding: 6rem 0;
        background: linear-gradient(180deg, white 0%, var(--profile-bg) 100%);
    }

    .how-we-work-card {
        background: white;
        border-radius: 20px;
        padding: 2.5rem 2rem;
        text-align: center;
        box-shadow: 0 10px 30px rgba(0,0,0,0.03);
        border: 1px solid rgba(232, 118, 59, 0.05);
        height: 100%;
        transition: transform 0.4s ease, box-shadow 0.4s ease;
        position: relative;
        overflow: hidden;
    }

    .how-we-work-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: var(--profile-accent);
        transform: scaleX(0);
        transition: transform 0.4s ease;
        transform-origin: left;
    }
    
    [dir="rtl"] .how-we-work-card::before {
        transform-origin: right;
    }

    .how-we-work-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(232, 118, 59, 0.08);
    }

    .how-we-work-card:hover::before {
        transform: scaleX(1);
    }

    .work-icon-wrap {
        width: 80px;
        height: 80px;
        margin: 0 auto 1.5rem;
        background: var(--profile-accent-light);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.2rem;
        color: var(--profile-accent);
        transition: transform 0.4s ease, background 0.4s ease;
    }

    .how-we-work-card:hover .work-icon-wrap {
        transform: scale(1.1) rotate(5deg);
        background: var(--profile-accent);
        color: white;
    }

    .work-title {
        font-size: 1.35rem;
        font-weight: 700;
        color: var(--profile-heading);
        margin-bottom: 1rem;
    }

    .work-desc {
        color: var(--profile-text);
        font-size: 1rem;
        line-height: 1.6;
        margin: 0;
    }

    /* Methodology Infographic Grid */
    .methodology-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
        margin-top: 3rem;
    }

    .methodology-item {
        background: white;
        border-radius: 15px;
        padding: 2rem 1.5rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        box-shadow: 0 5px 20px rgba(0,0,0,0.03);
        border-bottom: 3px solid transparent;
        transition: all 0.3s ease;
    }

    .methodology-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(232, 118, 59, 0.1);
        border-bottom-color: var(--profile-accent);
    }

    .method-icon {
        font-size: 2.5rem;
        color: var(--profile-accent);
        margin-bottom: 1.25rem;
        opacity: 0.9;
    }

    .method-title {
        font-weight: 700;
        color: var(--profile-heading);
        font-size: 1.1rem;
        line-height: 1.4;
        margin: 0;
    }

    /* Who We Serve Section */
    .serve-section {
        padding: 6rem 0;
        background: var(--profile-bg);
    }

    .serve-card {
        background: white;
        border-radius: 15px;
        padding: 2.5rem 2rem;
        text-align: center;
        box-shadow: 0 10px 30px rgba(0,0,0,0.03);
        height: 100%;
        transition: all 0.4s ease;
        position: relative;
        z-index: 1;
        border-bottom: 4px solid transparent;
    }

    .serve-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 40px rgba(232, 118, 59, 0.08);
        border-bottom-color: var(--profile-accent);
    }

    .serve-icon-wrap {
        width: 70px;
        height: 70px;
        margin: 0 auto 1.5rem;
        background: linear-gradient(135deg, rgba(232, 118, 59, 0.1) 0%, rgba(232, 118, 59, 0.02) 100%);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        color: var(--profile-accent);
        transition: all 0.4s ease;
        transform: rotate(-5deg);
    }

    .serve-card:hover .serve-icon-wrap {
        transform: rotate(0) scale(1.1);
        background: var(--profile-accent);
        color: white;
    }

    .serve-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--profile-heading);
        margin-bottom: 0.75rem;
    }

    .serve-desc {
        color: var(--profile-text);
        font-size: 0.95rem;
        line-height: 1.6;
        margin: 0;
    }

    /* Contact Person Section */
    .contact-section {
        padding: 5rem 0 7rem;
        background: linear-gradient(180deg, var(--profile-bg) 0%, white 100%);
    }

    .contact-card-wrapper {
        max-width: 800px;
        margin: 0 auto;
        position: relative;
    }

    .contact-card {
        background: white;
        border-radius: 20px;
        padding: 3rem;
        box-shadow: 0 15px 40px rgba(0,0,0,0.04);
        display: flex;
        align-items: center;
        gap: 3rem;
        position: relative;
        overflow: hidden;
        border: 1px solid rgba(232, 118, 59, 0.05);
        transition: transform 0.4s ease, box-shadow 0.4s ease;
    }

    .contact-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 50px rgba(232, 118, 59, 0.08);
    }

    .contact-card::after {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 150px;
        height: 150px;
        background: radial-gradient(circle, rgba(232, 118, 59, 0.05) 0%, transparent 70%);
        border-radius: 50%;
        transform: translate(50%, -50%);
    }
    
    [dir="rtl"] .contact-card::after {
        right: auto;
        left: 0;
        transform: translate(-50%, -50%);
    }

    .contact-avatar {
        width: 120px;
        height: 120px;
        background: var(--profile-accent-light);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3.5rem;
        color: var(--profile-accent);
        flex-shrink: 0;
        box-shadow: 0 10px 20px rgba(232, 118, 59, 0.1);
        border: 4px solid white;
        position: relative;
        z-index: 2;
        overflow: hidden;
    }

    .contact-info-wrap {
        flex-grow: 1;
        position: relative;
        z-index: 2;
    }

    .contact-name {
        font-size: 1.6rem;
        font-weight: 700;
        color: var(--profile-heading);
        margin-bottom: 0.5rem;
    }

    .contact-position {
        font-size: 1.05rem;
        color: var(--profile-accent);
        font-weight: 600;
        margin-bottom: 1.5rem;
        display: inline-block;
        padding: 0.4rem 1.2rem;
        background: rgba(232, 118, 59, 0.08);
        border-radius: 50px;
    }

    .contact-detail {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1rem;
        color: var(--profile-text);
        font-size: 1.05rem;
    }
    
    .contact-detail:last-child {
        margin-bottom: 0;
    }

    .contact-icon {
        width: 40px;
        height: 40px;
        background: var(--profile-bg);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--profile-accent);
        font-size: 1.1rem;
        flex-shrink: 0;
        transition: background 0.3s ease, color 0.3s ease;
    }
    
    .contact-detail:hover .contact-icon {
        background: var(--profile-accent);
        color: white;
    }

    @media (max-width: 768px) {
        .profile-title { font-size: 2.5rem; }
        
        .contact-card {
            flex-direction: column;
            text-align: center;
            padding: 2.5rem 1.5rem;
            gap: 1.5rem;
        }
        .contact-detail {
            justify-content: center;
        }

        .timeline::before {
            left: 20px;
        }
        [dir="rtl"] .timeline::before {
            left: auto;
            right: 20px;
        }
        .timeline-item, .timeline-item:nth-child(odd) {
            flex-direction: column;
            align-items: flex-start;
            padding-left: 60px;
        }
        [dir="rtl"] .timeline-item, [dir="rtl"] .timeline-item:nth-child(odd) {
            padding-left: 0;
            padding-right: 60px;
            align-items: flex-start;
        }
        .timeline-dot {
            left: 20px;
        }
        [dir="rtl"] .timeline-dot {
            left: auto;
            right: 20px;
        }
        .timeline-content {
            width: 100%;
        }
    }
</style>
@endsection

@section('content')
<!-- Hero Section -->
<section class="profile-hero">
    <div class="container hero-content">
        <h1 class="profile-title">{{ $profileSetting->{'hero_title_' . app()->getLocale()} }}</h1>
        <p class="profile-subtitle">
            {{ $profileSetting->{'hero_subtitle_' . app()->getLocale()} }}
        </p>
        
        <div class="pill-container">
            @if($profileSetting->hero_pill1_text_ar || $profileSetting->hero_pill1_text_en)
            <div class="stat-pill">
                <i class="{{ $profileSetting->hero_pill1_icon ?? 'fas fa-calendar-alt' }}"></i>
                {{ $profileSetting->{'hero_pill1_text_' . app()->getLocale()} }}
            </div>
            @endif
            @if($profileSetting->hero_pill2_text_ar || $profileSetting->hero_pill2_text_en)
            <div class="stat-pill">
                <i class="{{ $profileSetting->hero_pill2_icon ?? 'fas fa-globe-africa' }}"></i>
                {{ $profileSetting->{'hero_pill2_text_' . app()->getLocale()} }}
            </div>
            @endif
            @if($profileSetting->hero_pill3_text_ar || $profileSetting->hero_pill3_text_en)
            <div class="stat-pill">
                <i class="{{ $profileSetting->hero_pill3_icon ?? 'fas fa-users' }}"></i>
                {{ $profileSetting->{'hero_pill3_text_' . app()->getLocale()} }}
            </div>
            @endif
        </div>
    </div>
</section>

<!-- Core Identity (Goal, Vision, Mission) -->
<section class="core-section">
    <div class="container">
        <div class="row g-4">
            <!-- Vision -->
            <div class="col-lg-4 col-md-6">
                <div class="core-card">
                    <div class="core-icon">
                        <i class="fas fa-eye"></i>
                    </div>
                    <h3 class="core-title">{{ isset($about) && $about->{'vision_title_' . app()->getLocale()} ? $about->{'vision_title_' . app()->getLocale()} : (app()->getLocale() == 'ar' ? 'رؤيتنا' : 'Our Vision') }}</h3>
                    <p class="core-text">
                        {{ isset($about) && $about->{'vision_desc_' . app()->getLocale()} ? $about->{'vision_desc_' . app()->getLocale()} : (app()->getLocale() == 'ar' ? 'نتطلع إلى بناء مجتمعات مرنة ومستدامة.' : 'We envision building resilient and sustainable communities.') }}
                    </p>
                </div>
            </div>
            <!-- Mission -->
            <div class="col-lg-4 col-md-6">
                <div class="core-card">
                    <div class="core-icon">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <h3 class="core-title">{{ isset($about) && $about->{'mission_title_' . app()->getLocale()} ? $about->{'mission_title_' . app()->getLocale()} : (app()->getLocale() == 'ar' ? 'رسالتنا' : 'Our Mission') }}</h3>
                    <p class="core-text">
                        {{ isset($about) && $about->{'mission_desc_' . app()->getLocale()} ? $about->{'mission_desc_' . app()->getLocale()} : (app()->getLocale() == 'ar' ? 'تقديم حلول تنموية متكاملة ترفع من جودة الحياة.' : 'Providing integrated development solutions that elevate the quality of life.') }}
                    </p>
                </div>
            </div>
            <!-- Goal -->
            <div class="col-lg-4 col-md-6">
                <div class="core-card">
                    <div class="core-icon">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <h3 class="core-title">{{ isset($about) && $about->{'goal_title_' . app()->getLocale()} ? $about->{'goal_title_' . app()->getLocale()} : (app()->getLocale() == 'ar' ? 'هدفنا' : 'Our Goal') }}</h3>
                    <p class="core-text">
                        {{ isset($about) && $about->{'goal_desc_' . app()->getLocale()} ? $about->{'goal_desc_' . app()->getLocale()} : (app()->getLocale() == 'ar' ? 'استيعاب التنمية الاجتماعية من خلال توفير بناء السلام، الأمن الغذائي، والحماية.' : 'To comprehend social development by providing peace building, food security, and protection.') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Objectives Section -->
<section class="objectives-section py-5" style="background-color: var(--profile-accent-light);">
    <div class="container py-4">
        <div class="section-header text-center mb-5">
            <h2 class="section-title">{{ $profileSetting->{'objectives_title_' . app()->getLocale()} }}</h2>
        </div>
        <div class="row g-4 justify-content-center">
            @if(isset($profileItems['objective']))
                @foreach($profileItems['objective'] as $objective)
                <div class="col-md-6 col-lg-3">
                    <div class="objective-card text-center p-4 bg-white rounded-4 h-100 shadow-sm border-0" style="transition: transform 0.3s ease, box-shadow 0.3s ease;">
                        <div class="obj-icon mb-4 text-center d-flex justify-content-center align-items-center mx-auto" style="width: 70px; height: 70px; background-color: var(--profile-bg); color: var(--profile-accent); border-radius: 50%; font-size: 1.75rem;">
                            <i class="{{ $objective->icon ?? 'fas fa-hand-holding-heart' }}"></i>
                        </div>
                        <p class="mb-0 fw-medium" style="color: var(--profile-heading); font-size: 1.1rem; line-height: 1.6;">
                            {{ $objective->{'value_' . app()->getLocale()} }}
                        </p>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </div>
</section>

<!-- History Timeline -->
<section class="history-section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">{{ $profileSetting->{'timeline_title_' . app()->getLocale()} }}</h2>
        </div>
        
        <div class="timeline">
            @if(isset($profileItems['timeline']))
                @foreach($profileItems['timeline'] as $timeItem)
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <span class="timeline-date">{{ $timeItem->{'extra_value_' . app()->getLocale()} }}</span>
                        <h4 class="timeline-text">{{ $timeItem->{'title_' . app()->getLocale()} }}</h4>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </div>
</section>

<x-organizational-journey :setting="$profileSetting" :items="$profileItems" />
<x-organizational-capacity :setting="$profileSetting" :items="$profileItems" />

<!-- Institutional Snapshot -->
<section class="snapshot-section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">{{ $profileSetting->{'snapshot_title_' . app()->getLocale()} }}</h2>
        </div>
        
        <div class="snapshot-grid">
            @if(isset($profileItems['snapshot']))
                @foreach($profileItems['snapshot'] as $snapItem)
                <div class="snapshot-card">
                    <div class="snapshot-icon"><i class="{{ $snapItem->icon }}"></i></div>
                    <div class="snapshot-label">{{ $snapItem->{'title_' . app()->getLocale()} }}</div>
                    <div class="snapshot-value" style="font-size: 1.1rem;">{{ $snapItem->{'value_' . app()->getLocale()} }}</div>
                </div>
                @endforeach
            @endif
        </div>
    </div>
</section>

<!-- Strengths & Capacity -->
<section class="capacity-section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">{{ $profileSetting->{'swot_title_' . app()->getLocale()} }}</h2>
        </div>
        
        <div class="row g-4">
            <!-- Strengths -->
            <div class="col-md-6">
                <div class="capacity-card">
                    <div class="capacity-header">
                        <div class="capacity-icon"><i class="{{ $profileSetting->swot_strengths_icon }}"></i></div>
                        <h3 class="capacity-title">{{ $profileSetting->{'swot_strengths_title_' . app()->getLocale()} }}</h3>
                    </div>
                    <ul class="capacity-list">
                        @if(isset($profileItems['swot_strength']))
                            @foreach($profileItems['swot_strength'] as $item)
                            <li>{{ $item->{'value_' . app()->getLocale()} }}</li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
            
            <!-- Capacity Needs -->
            <div class="col-md-6">
                <div class="capacity-card">
                    <div class="capacity-header">
                        <div class="capacity-icon" style="color: #f39c12;"><i class="{{ $profileSetting->swot_needs_icon }}"></i></div>
                        <h3 class="capacity-title">{{ $profileSetting->{'swot_needs_title_' . app()->getLocale()} }}</h3>
                    </div>
                    <ul class="capacity-list">
                        @if(isset($profileItems['swot_need']))
                            @foreach($profileItems['swot_need'] as $item)
                            <li>{{ $item->{'value_' . app()->getLocale()} }}</li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
            
            <!-- Opportunities -->
            <div class="col-md-6">
                <div class="capacity-card">
                    <div class="capacity-header">
                        <div class="capacity-icon" style="color: #3498db;"><i class="{{ $profileSetting->swot_opportunities_icon }}"></i></div>
                        <h3 class="capacity-title">{{ $profileSetting->{'swot_opportunities_title_' . app()->getLocale()} }}</h3>
                    </div>
                    <ul class="capacity-list">
                        @if(isset($profileItems['swot_opportunity']))
                            @foreach($profileItems['swot_opportunity'] as $item)
                            <li>{{ $item->{'value_' . app()->getLocale()} }}</li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
            
            <!-- Main Weaknesses -->
            <div class="col-md-6">
                <div class="capacity-card">
                    <div class="capacity-header">
                        <div class="capacity-icon" style="color: #e74c3c;"><i class="{{ $profileSetting->swot_weaknesses_icon }}"></i></div>
                        <h3 class="capacity-title">{{ $profileSetting->{'swot_weaknesses_title_' . app()->getLocale()} }}</h3>
                    </div>
                    <ul class="capacity-list">
                        @if(isset($profileItems['swot_weakness']))
                            @foreach($profileItems['swot_weakness'] as $item)
                            <li>{{ $item->{'value_' . app()->getLocale()} }}</li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Methodology & Grant Support Section -->
<section class="methodology-section">
    <div class="container">
        <div class="section-header text-center mb-5">
            <span class="profile-subtitle d-block mb-2" style="color: var(--profile-accent); font-weight: 600; letter-spacing: 1px; text-transform: uppercase;">{{ $profileSetting->{'methodology_subtitle_' . app()->getLocale()} }}</span>
            <h2 class="section-title">{{ $profileSetting->{'methodology_title_' . app()->getLocale()} }}</h2>
        </div>

        <!-- Grants & M&E -->
        <div class="row g-5 mb-5 pb-4">
            <!-- Grants Support -->
            <div class="col-lg-6">
                <div class="d-flex align-items-center mb-4 justify-content-center justify-content-lg-start">
                    <div class="me-3 ms-lg-0 ms-3" style="width: 50px; height: 50px; background: rgba(232, 118, 59, 0.1); color: var(--profile-accent); border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem;">
                        <i class="{{ $profileSetting->methodology_grants_icon }}"></i>
                    </div>
                    <h3 class="fw-bold mb-0" style="color: var(--profile-heading); font-size: 1.6rem;">{{ $profileSetting->{'methodology_grants_title_' . app()->getLocale()} }}</h3>
                </div>
                
                <div class="row g-4">
                    @if(isset($profileItems['methodology_grant']))
                        @foreach($profileItems['methodology_grant'] as $grant)
                        <div class="col-sm-6">
                            <div class="how-we-work-card p-4">
                                <div class="work-icon-wrap" style="width: 60px; height: 60px; font-size: 1.5rem;">
                                    <i class="{{ $grant->icon }}"></i>
                                </div>
                                <h4 class="work-title" style="font-size: 1.2rem;">{{ $grant->{'title_' . app()->getLocale()} }}</h4>
                                <p class="work-desc" style="font-size: 0.95rem;">{{ $grant->{'value_' . app()->getLocale()} }}</p>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <!-- Monitoring and Evaluation -->
            <div class="col-lg-6">
                <div class="d-flex align-items-center mb-4 justify-content-center justify-content-lg-start">
                    <div class="me-3 ms-lg-0 ms-3" style="width: 50px; height: 50px; background: rgba(232, 118, 59, 0.1); color: var(--profile-accent); border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem;">
                        <i class="{{ $profileSetting->methodology_me_icon }}"></i>
                    </div>
                    <h3 class="fw-bold mb-0" style="color: var(--profile-heading); font-size: 1.6rem;">{{ $profileSetting->{'methodology_me_title_' . app()->getLocale()} }}</h3>
                </div>

                <div class="row g-4">
                    @if(isset($profileItems['methodology_me']))
                        @foreach($profileItems['methodology_me'] as $me)
                        <div class="col-sm-6">
                            <div class="how-we-work-card p-4">
                                <div class="work-icon-wrap" style="width: 60px; height: 60px; font-size: 1.5rem;">
                                    <i class="{{ $me->icon }}"></i>
                                </div>
                                <h4 class="work-title" style="font-size: 1.2rem;">{{ $me->{'title_' . app()->getLocale()} }}</h4>
                                <p class="work-desc" style="font-size: 0.95rem;">{{ $me->{'value_' . app()->getLocale()} }}</p>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <!-- Section 2: Cross Cutting Issues -->
        <div class="mt-5 pt-5" style="border-top: 1px solid rgba(0,0,0,0.06);">
            <h3 class="text-center mb-3 fw-bold" style="color: var(--profile-heading); font-size: 1.8rem;">{{ $profileSetting->{'methodology_cross_title_' . app()->getLocale()} }}</h3>
            <p class="text-center text-muted mx-auto mb-5" style="max-width: 700px; font-size: 1.05rem;">
                {{ $profileSetting->{'methodology_cross_desc_' . app()->getLocale()} }}
            </p>
            
            <div class="methodology-grid">
                @if(isset($profileItems['cross_cutting']))
                    @foreach($profileItems['cross_cutting'] as $cross)
                    <div class="methodology-item">
                        <i class="{{ $cross->icon }} method-icon"></i>
                        <h5 class="method-title">{{ $cross->{'title_' . app()->getLocale()} }}</h5>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Who We Serve Section -->
<section class="serve-section">
    <div class="container">
        <div class="section-header text-center mb-5">
            <span class="profile-subtitle d-block mb-2" style="color: var(--profile-accent); font-weight: 600; letter-spacing: 1px; text-transform: uppercase;">{{ $profileSetting->{'serve_subtitle_' . app()->getLocale()} }}</span>
            <h2 class="section-title">{{ $profileSetting->{'serve_title_' . app()->getLocale()} }}</h2>
            <p class="text-center text-muted mx-auto mt-3" style="max-width: 800px; font-size: 1.1rem; line-height: 1.6;">
                {{ $profileSetting->{'serve_desc_' . app()->getLocale()} }}
            </p>
        </div>

        <div class="row g-4">
            @if(isset($profileItems['serve_audience']))
                @foreach($profileItems['serve_audience'] as $aud)
                <div class="col-md-6 col-lg-4">
                    <div class="serve-card">
                        <div class="serve-icon-wrap">
                            <i class="{{ $aud->icon }}"></i>
                        </div>
                        <h4 class="serve-title">{{ $aud->{'title_' . app()->getLocale()} }}</h4>
                        <p class="serve-desc">{{ $aud->{'value_' . app()->getLocale()} }}</p>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </div>
</section>

<!-- Official Contact Person Section -->
<section class="contact-section">
    <div class="container">
        <div class="section-header text-center mb-5">
            <span class="profile-subtitle d-block mb-2" style="color: var(--profile-accent); font-weight: 600; letter-spacing: 1px; text-transform: uppercase;">{{ $profileSetting->{'contact_subtitle_' . app()->getLocale()} }}</span>
            <h2 class="section-title">{{ $profileSetting->{'contact_title_' . app()->getLocale()} }}</h2>
            <p class="text-center text-muted mx-auto mt-3" style="max-width: 600px; font-size: 1.1rem; line-height: 1.6;">
                {{ $profileSetting->{'contact_desc_' . app()->getLocale()} }}
            </p>
        </div>

        <div class="contact-card-wrapper">
            <div class="contact-card">
                <div class="contact-avatar">
                    @if($profileSetting->contact_photo)
                        <img src="{{ asset($profileSetting->contact_photo) }}" alt="{{ $profileSetting->{'contact_name_' . app()->getLocale()} }}" style="width: 100%; height: 100%; object-fit: cover;">
                    @else
                        <i class="fas fa-user-tie"></i>
                    @endif
                </div>
                <div class="contact-info-wrap">
                    <h3 class="contact-name">{{ $profileSetting->{'contact_name_' . app()->getLocale()} }}</h3>
                    <div class="contact-position">{{ $profileSetting->{'contact_position_' . app()->getLocale()} }}</div>
                    
                    @if($profileSetting->contact_email)
                    <div class="contact-detail">
                        <div class="contact-icon"><i class="far fa-envelope"></i></div>
                        <span dir="ltr">{{ $profileSetting->contact_email }}</span>
                    </div>
                    @endif
                    @if($profileSetting->contact_phone)
                    <div class="contact-detail">
                        <div class="contact-icon"><i class="fas fa-phone-alt"></i></div>
                        <span dir="ltr">{{ $profileSetting->contact_phone }}</span>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
