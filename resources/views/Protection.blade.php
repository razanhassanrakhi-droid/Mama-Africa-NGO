<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clean Water Initiative - Hope Foundation</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Merriweather:wght@400;700&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Merriweather:wght@400;700&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=Inter:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        :root {
            --bg-beige: #f5efe8;
            --bg-beige-dark: #ebe3d9;
            --white: #ffffff;
            --orange-primary: #e8763b;
            --orange-hover: #d4682f;
            --orange-light: #fdf4ef;
            --dark-gray: #2d3436;
            --text-gray: #636e72;
            --soft-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
            --card-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-beige);
            color: var(--text-gray);
            line-height: 1.7;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Merriweather', serif;
            color: var(--dark-gray);
        }

        /* Navigation */
        .navbar {
            background-color: var(--white);
            box-shadow: var(--soft-shadow);
            padding: 1rem 0;
        }

        .navbar-brand {
            font-family: 'Merriweather', serif;
            font-weight: 700;
            color: var(--orange-primary) !important;
            font-size: 1.5rem;
        }

        .nav-link {
            color: var(--dark-gray) !important;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: var(--orange-primary) !important;
        }

        /* Buttons */
        .btn-orange {
            background-color: var(--orange-primary);
            color: var(--white);
            border: none;
            padding: 0.75rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(232, 118, 59, 0.3);
        }

        .btn-orange:hover {
            background-color: var(--orange-hover);
            color: var(--white);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(232, 118, 59, 0.4);
        }

        .btn-outline-orange {
            border: 2px solid var(--orange-primary);
            color: var(--orange-primary);
            padding: 0.75rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            background: transparent;
            transition: all 0.3s ease;
        }

        .btn-outline-orange:hover {
            background-color: var(--orange-primary);
            color: var(--white);
        }

        /* Hero Section */
        .hero-section {
            padding: 3rem 0 5rem;
        }

        .btn-outline-secondary {
            border: 2px solid var(--orange-primary);
            color: var(--orange-primary);
            padding: 0.75rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            background: transparent;
            transition: all 0.3s ease;

        }

        .hero-image-wrapper {
            position: relative;
            border-radius: 1.5rem;
            overflow: hidden;
            box-shadow: var(--soft-shadow);
        }

        .hero-image {
            width: 100%;
            height: 450px;
            object-fit: cover;
        }

        .hero-badge {
            position: absolute;
            top: 1.5rem;
            left: 1.5rem;
            background-color: var(--orange-primary);
            color: var(--white);
            padding: 0.5rem 1.25rem;
            border-radius: 50px;
            font-size: 0.875rem;
            font-weight: 600;
        }

        .hero-content {
            padding: 2rem 0;
        }

        .hero-title {
            font-size: 2.75rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }

        .hero-description {
            font-size: 1.125rem;
            color: var(--text-gray);
            margin-bottom: 2rem;
        }

        /* Section Styling */
        .section-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 1rem;
            position: relative;
        }

        .section-subtitle {
            color: var(--orange-primary);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 0.875rem;
            margin-bottom: 0.5rem;
        }

        /* Problem Section */
        .problem-section {
            padding: 5rem 0;
            background-color: var(--white);
        }

        .problem-text p {
            font-size: 1.1rem;
            margin-bottom: 1.5rem;
        }

        .stat-card {
            background: linear-gradient(135deg, var(--orange-light) 0%, var(--white) 100%);
            border: none;
            border-radius: 1rem;
            padding: 1.5rem;
            text-align: center;
            transition: transform 0.3s ease;
            box-shadow: var(--card-shadow);
            height: 100%;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            background-color: var(--orange-primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            color: var(--white);
            font-size: 1.5rem;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--dark-gray);
            line-height: 1;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: var(--text-gray);
            font-size: 0.9rem;
        }

        /* Solution Section */
        .solution-section {
            padding: 5rem 0;
        }

        .solution-card {
            background-color: var(--white);
            border: none;
            border-radius: 1.25rem;
            padding: 2rem;
            height: 100%;
            transition: all 0.3s ease;
            box-shadow: var(--card-shadow);
        }

        .solution-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--soft-shadow);
        }

        .solution-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--orange-primary) 0%, #f5a462 100%);
            border-radius: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            color: var(--white);
            font-size: 2rem;
        }

        .solution-card h4 {
            font-size: 1.25rem;
            margin-bottom: 1rem;
        }

        .solution-card p {
            color: var(--text-gray);
            margin-bottom: 0;
        }

        /* Impact Section */
        .impact-section {
            padding: 5rem 0;
            background-color: var(--white);
        }

        .impact-card {
            background-color: var(--bg-beige);
            border-radius: 1.25rem;
            padding: 2.5rem;
            margin-bottom: 2rem;
        }

        .progress-wrapper {
            margin-bottom: 2rem;
        }

        .progress-label {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.75rem;
            font-weight: 500;
        }

        .progress {
            height: 12px;
            border-radius: 50px;
            background-color: #e0d6ca;
        }

        .progress-bar {
            background: linear-gradient(90deg, var(--orange-primary) 0%, #f5a462 100%);
            border-radius: 50px;
        }

        .counter-card {
            background-color: var(--white);
            border-radius: 1.25rem;
            padding: 2rem;
            text-align: center;
            box-shadow: var(--card-shadow);
            height: 100%;
        }

        .counter-number {
            font-size: 3rem;
            font-weight: 700;
            color: var(--orange-primary);
            line-height: 1;
            margin-bottom: 0.5rem;
        }

        .counter-label {
            color: var(--dark-gray);
            font-weight: 500;
        }

        .counter-icon {
            font-size: 2rem;
            color: var(--orange-primary);
            margin-bottom: 1rem;
            opacity: 0.8;
        }

        /* Gallery Section */
        .gallery-section {
            padding: 5rem 0;
        }

        .gallery-item {
            position: relative;
            border-radius: 1rem;
            overflow: hidden;
            margin-bottom: 1.5rem;
            box-shadow: var(--card-shadow);
        }

        .gallery-item img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.1);
        }

        .gallery-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to top, rgba(45, 52, 54, 0.7) 0%, transparent 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
            display: flex;
            align-items: flex-end;
            padding: 1.5rem;
        }

        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }

        .gallery-overlay span {
            color: var(--white);
            font-weight: 500;
        }

        /* CTA Section */
        .cta-section {
            padding: 5rem 0;
            background: linear-gradient(135deg, var(--orange-primary) 0%, #f5a462 100%);
            position: relative;
            overflow: hidden;
        }

        .cta-section::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 500px;
            height: 500px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .cta-section::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -10%;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .cta-content {
            position: relative;
            z-index: 1;
        }

        .cta-title {
            color: var(--white);
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .cta-text {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.25rem;
            margin-bottom: 2rem;
        }

        .btn-white {
            background-color: var(--white);
            color: var(--orange-primary);
            padding: 1rem 3rem;
            border-radius: 50px;
            font-weight: 700;
            font-size: 1.125rem;
            transition: all 0.3s ease;
            border: none;
        }

        .btn-white:hover {
            background-color: var(--dark-gray);
            color: var(--white);
            transform: translateY(-3px);
        }

        /* Footer */
        footer {
            background-color: var(--dark-gray);
            color: rgba(255, 255, 255, 0.7);
            padding: 3rem 0 1.5rem;
        }

        footer h5 {
            color: var(--white);
            margin-bottom: 1.5rem;
        }

        footer a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        footer a:hover {
            color: var(--orange-primary);
        }

        .social-icons a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            margin-right: 0.75rem;
            transition: all 0.3s ease;
        }

        .social-icons a:hover {
            background-color: var(--orange-primary);
            color: var(--white);
        }

        /* Responsive Adjustments */
        @media (max-width: 991.98px) {
            .hero-title {
                font-size: 2rem;
            }

            .hero-image {
                height: 350px;
            }

            .section-title {
                font-size: 1.75rem;
            }

            .cta-title {
                font-size: 2rem;
            }
        }

        @media (max-width: 767.98px) {
            .hero-title {
                font-size: 1.75rem;
            }

            .hero-image {
                height: 280px;
            }

            .stat-number {
                font-size: 2rem;
            }

            .counter-number {
                font-size: 2.5rem;
            }

            .gallery-item img {
                height: 200px;
            }
        }

        /* Animation Classes */
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        header {
            /* جعل الهيدر ثابت في الأعلى */
            position: fixed;
            top: 20px;
            right: 40px;
            z-index: 9999;
            padding: 0;
        }

        .lang-toggle-custom {
            display: flex;
            align-items: center;
            gap: 8px;

            /* ضبط المسافات الداخلية للزر */
            padding: 10px 16px;

            border-radius: 10px;
            color: white;
            font-weight: 500;

            /* حدود برتقالية نحيفة */
            border: 1px solid #f97316;
            background-color: #f97316;
            cursor: pointer;

            /* تأثير التغبيش */
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);

            /* ظل للزر */
            box-shadow: 0 4px 12px rgba(249, 115, 22, 0.3);

            transition: all 0.4s ease;
        }

        .lang-toggle-custom:hover {
            background-color: #e65c00;
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(249, 115, 22, 0.4);
        }

        .lang-toggle-custom i {
            font-size: 1.1rem;
            color: #ffffff;
        }
    </style>
</head>

<body>
    <header class="header-container">
  <!-- <button onclick="toggleLanguage()" id="langBtn" class="flex items-center gap-2 bg-orange-500 hover:bg-orange-600 text-white text-sm font-semibold py-1.5 px-4 rounded-full border border-orange-600 transition-all shadow-sm"> 
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18ZM12 3v18M3 12h18M5.625 5.625c2.5 1.5 3.375 6.375 3.375 6.375s.875 4.875 3.375 6.375M18.375 5.625c-2.5 1.5-3.375-3.375 6.375-3.375 6.375"/>
      </svg>    
      <span id="langTextDesktop">{{ app()->getLocale() == 'ar' ? 'English' : 'العربية' }}</span>
  </button>-->
    </header>
    <!-- Hero Section -->
     <section class="hero-section">
    <div class="container">
        <div class="row align-items-center">

            <!-- الصورة -->
            <div class="col-lg-7 mb-4 mb-lg-0">
                <div class="hero-image-wrapper">
                    <span class="hero-badge">
                        <i class="bi bi-droplet-fill me-1"></i> {{ $project->name }}
                    </span>
                    <img src="{{ $project->image ? url('/media/' . $project->image) : $project->fallback_image }}" 
                         onerror="this.onerror=null;this.src='{{ $project->fallback_image }}';"
                         alt="{{ $project->name }}" 
                         class="hero-image img-fluid">
                </div>
            </div>

            <!-- المحتوى -->
            <div class="col-lg-5">
                <div class="hero-content ps-lg-4">
                    <span class="section-subtitle">  {{ __('massage.program.details') }}</span>
                    <h1 class="hero-title">{{ $project->name }}</h1>
                    <p class="hero-description">
                        {{ $project->description }}
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <!-- <button class="btn btn-outline-secondary btn-lg">
                            <i class="bi bi-play-circle me-2"></i>Watch Video
                        </button> -->
                        <a href="{{ route('home') }}#projects" onclick="if(window.history.length > 1) { window.history.back(); return false; }" class="btn btn-outline-orange">
                            <i class="bi bi-arrow-left me-2"></i>{{ __('massage.program.back') }}
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

    <!-- Problem Section -->
    <section class="problem-section">
    <div class="container">
        <div class="row align-items-center">

            <!-- النص الرئيسي للتحدي -->
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="problem-text pe-lg-5 fade-in">
                    <span class="section-subtitle"> {{ __('massage.program.challenge') }}</span>
                    <h2 class="section-title mb-4">{{ $project->name }}</h2>
                    <p>
                        {!! nl2br(e($project->challange)) !!}
                    </p>
                </div>
            </div>

            <!-- الإحصائيات (الديناميكية) -->
            <div class="col-lg-6">
                <div class="row g-4 fade-in">
                    <div class="col-6">
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="bi bi-droplet-fill"></i>
                            </div>
                            <div class="stat-number">{{ isset($statistic) && $statistic->cleanwater_value ? $statistic->cleanwater_value : __('massage.stats.cleanwater_value') }}</div>
                            <div class="stat-label">{{ isset($statistic) && $statistic->{'cleanwater_text_' . app()->getLocale()} ? $statistic->{'cleanwater_text_' . app()->getLocale()} : __('massage.stats.cleanwater_text') }}</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="bi bi-book-fill"></i>
                            </div>
                            <div class="stat-number">{{ isset($statistic) && $statistic->education_value ? $statistic->education_value : __('massage.stats.education_value') }}</div>
                            <div class="stat-label">{{ isset($statistic) && $statistic->{'education_text_' . app()->getLocale()} ? $statistic->{'education_text_' . app()->getLocale()} : __('massage.stats.education_text') }}</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="bi bi-house-door-fill"></i>
                            </div>
                            <div class="stat-number">{{ isset($statistic) && $statistic->villages_value ? $statistic->villages_value : __('massage.stats.villages_value') }}</div>
                            <div class="stat-label">{{ isset($statistic) && $statistic->{'villages_text_' . app()->getLocale()} ? $statistic->{'villages_text_' . app()->getLocale()} : __('massage.stats.villages_text') }}</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="bi bi-currency-dollar"></i>
                            </div>
                            <div class="stat-number">{{ isset($statistic) && $statistic->funds_value ? $statistic->funds_value : __('massage.stats.funds_value') }}</div>
                            <div class="stat-label">{{ isset($statistic) && $statistic->{'funds_text_' . app()->getLocale()} ? $statistic->{'funds_text_' . app()->getLocale()} : __('massage.stats.funds_text') }}</div>
                        </div>
                    </div>
                </div>
            </div>
</section>

<!-- Activities & Interventions Section -->
<section class="py-16 bg-[#fdf4ef] relative">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12 fade-in">
            <span class="text-[#e8763b] font-semibold uppercase tracking-wider text-sm mb-2 block">{{ app()->getLocale() == 'ar' ? 'الأنشطة والتدخلات' : 'Activities & Interventions' }}</span>
            <h2 class="text-3xl md:text-4xl font-bold text-[#2d3436] font-serif" style="font-family: 'Merriweather', serif;">{{ app()->getLocale() == 'ar' ? 'برامجنا على أرض الواقع' : 'Our Programs in Action' }}</h2>
        </div>

        @php
            $projectId = $project->id;
            $projectName = $project->getTranslation('name', 'en') ?: $project->name;
            $projectNameLower = strtolower(is_string($projectName) ? $projectName : '');

            $cards = [];

            if (str_contains($projectNameLower, 'health') || str_contains($projectNameLower, 'صحة') || $projectId == 36) {
                // Health Program Cards (including the requested public health assessment card)
                $cards = [
                    [
                        'icon' => 'fas fa-notes-medical',
                        'status_ar' => 'مكتمل',
                        'status_en' => 'Completed',
                        'status_class' => 'bg-gray-100 text-gray-700 border-gray-200',
                        'title_ar' => 'تقييم الصحة العامة للنازحين بالفاشر',
                        'title_en' => 'Public Health Assessment for IDPs',
                        'desc_ar' => 'إجراء التقييم الشامل للصحة العامة للنازحين في الفاشر بتمويل من منظمة الطب الشمولي للشؤون الاجتماعية.',
                        'desc_en' => 'Conducted a public health assessment for IDPs in El Fasher to identify urgent medical needs.',
                        'detail_ar' => 'بتمويل من مؤسسة الطب الشمولي للشؤون الاجتماعية بقيمة 3,000 دولار.',
                        'detail_en' => 'Funded by Holistic Medicine social affairs with amount of 3,000 USD.',
                        'location_ar' => 'الفاشر',
                        'location_en' => 'El Fasher',
                        'date_ar' => 'أبريل – مايو 2024',
                        'date_en' => 'Apr – May 2024',
                        'funded_ar' => 'الطب الشمولي للشؤون الاجتماعية',
                        'funded_en' => 'Holistic Medicine Social Affairs',
                        'amount' => '$3,000'
                    ]
                ];
            } elseif (str_contains($projectNameLower, 'water') || str_contains($projectNameLower, 'sanitation') || str_contains($projectNameLower, 'مياه') || str_contains($projectNameLower, 'صرف') || $projectId == 37) {
                // Water & Sanitation (WASH) Program Cards
                $cards = [
                    [
                        'icon' => 'fas fa-tint',
                        'status_ar' => 'مكتمل',
                        'status_en' => 'Completed',
                        'status_class' => 'bg-gray-100 text-gray-700 border-gray-200',
                        'title_ar' => 'توزيع المياه النقية بريف الفاشر (الشجرة)',
                        'title_en' => 'Distribution of Pure Water in Rural El Fasher (SHAGARA)',
                        'desc_ar' => 'توزيع مياه شرب نقية وصالحة للأسر النازحة بريف الفاشر (منطقة الشجرة) لتأمين الحصول على مياه نظيفة وصحية.',
                        'desc_en' => 'WASH distributed pure water to the rural El fasher (SHAGARA) to ensure access to clean drinking water.',
                        'detail_ar' => 'بتمويل من منظمة بحر الجود للسلام والتنمية بمبلغ إجمالي قدره 500 دولار.',
                        'detail_en' => 'Funded by Jael Sea Organization for peace development with total 500 USD.',
                        'location_ar' => 'ريف الفاشر (الشجرة)، شمال دارفور، السودان',
                        'location_en' => 'Rural El Fasher (SHAGARA), North Darfur, Sudan',
                        'date_ar' => 'مارس – أبريل 2024',
                        'date_en' => 'March – April 2024',
                        'funded_ar' => 'منظمة بحر الجود للسلام والتنمية',
                        'funded_en' => 'Jael Sea Organization for Peace and Development',
                        'amount' => '$500'
                    ],
                    [
                        'icon' => 'fas fa-tint',
                        'status_ar' => 'مستمر',
                        'status_en' => 'Ongoing',
                        'status_class' => 'bg-green-50 text-green-600 border-green-100',
                        'title_ar' => 'حملات النظافة العامة والإصحاح البيئي',
                        'title_en' => 'Environmental Clean-up & Sanitation Campaigns',
                        'desc_ar' => 'إجراء دورات تدريبية وإطلاق حملات تنظيف بيئية مجتمعية لتعزيز الوعي الصحي والإصحاح البيئي بمراكز الإيواء.',
                        'desc_en' => 'WASH conducted training sessions and launched environmental clean-up campaigns to promote hygiene.',
                        'detail_ar' => 'تدريب وبناء قدرات المجتمع على الإصحاح البيئي ومكافحة التلوث.',
                        'detail_en' => 'WASH conducted training through environmental clean-up campaigns.',
                        'location_ar' => 'مراكز الإيواء وأحياء الفاشر، السودان',
                        'location_en' => 'Shelter centers and neighborhoods in El Fasher, Sudan',
                        'date_ar' => '2024 – 2025',
                        'date_en' => '2024 – 2025',
                        'funded_ar' => 'مساهمات مجتمعية ومتطوعين',
                        'funded_en' => 'Community Volunteers',
                        'amount' => 'Voluntary'
                    ]
                ];
            } elseif (str_contains($projectNameLower, 'education') || str_contains($projectNameLower, 'تعليم') || $projectId == 40) {
                // Education Program Cards
                $cards = [
                    [
                        'icon' => 'fas fa-school',
                        'status_ar' => 'مستمر',
                        'status_en' => 'Ongoing',
                        'status_class' => 'bg-green-50 text-green-600 border-green-100',
                        'title_ar' => 'إعادة تأهيل وصيانة المدارس',
                        'title_en' => 'School Rehabilitation & Renovation',
                        'desc_ar' => 'صيانة الفصول الدراسية المتضررة وبناء مرافق صحية للطلاب والطالبات.',
                        'desc_en' => 'Renovating damaged classrooms and building sanitation facilities for students.',
                        'detail_ar' => 'ترميم البنية التحتية التعليمية في المناطق المتضررة من النزاعات.',
                        'detail_en' => 'Restoring educational infrastructure in conflict-affected zones.',
                        'location_ar' => 'مدارس الفاشر',
                        'location_en' => 'El Fasher Schools',
                        'date_ar' => 'يناير – مايو 2025',
                        'date_en' => 'Jan – May 2025',
                        'funded_ar' => 'اليونيسف والطب الشمولي',
                        'funded_en' => 'UNICEF & Holistic Medicine',
                        'amount' => '$14,000'
                    ],
                    [
                        'icon' => 'fas fa-book-reader',
                        'status_ar' => 'مكتمل',
                        'status_en' => 'Completed',
                        'status_class' => 'bg-gray-100 text-gray-700 border-gray-200',
                        'title_ar' => 'توزيع المستلزمات والحقائب المدرسية',
                        'title_en' => 'Educational Supplies Distribution',
                        'desc_ar' => 'توفير الحقائب المدرسية والكتب والقرطاسية والوسائل التعليمية للأطفال النازحين.',
                        'desc_en' => 'Providing school bags, books, stationery, and learning aids to displaced children.',
                        'detail_ar' => 'تجهيز الأطفال المحرومين بالحقائب والأدوات التعليمية اللازمة.',
                        'detail_en' => 'Equipping underprivileged children with necessary educational tools.',
                        'location_ar' => 'مراكز إيواء النازحين',
                        'location_en' => 'Displacement Centers',
                        'date_ar' => 'سبتمبر 2024',
                        'date_en' => 'Sep 2024',
                        'funded_ar' => 'رعاية الطفولة',
                        'funded_en' => 'Save the Children',
                        'amount' => '$5,800'
                    ],
                    [
                        'icon' => 'fas fa-chalkboard-teacher',
                        'status_ar' => 'مستمر',
                        'status_en' => 'Ongoing',
                        'status_class' => 'bg-green-50 text-green-600 border-green-100',
                        'title_ar' => 'تدريب المعلمين والتطوير المهني',
                        'title_en' => 'Teacher Training & Professional Development',
                        'desc_ar' => 'تدريب المعلمين المحليين على أساليب التدريس التفاعلية والدعم النفسي للطلاب.',
                        'desc_en' => 'Training local educators on interactive teaching methods and psychosocial support for kids.',
                        'detail_ar' => 'رفع جودة التعليم وتقديم الرعاية الداعمة للنفسية داخل الفصول.',
                        'detail_en' => 'Enhancing educational quality and classroom trauma-informed care.',
                        'location_ar' => 'المقر الإقليمي',
                        'location_en' => 'Regional HQ',
                        'date_ar' => 'أكتوبر – ديسمبر 2024',
                        'date_en' => 'Oct – Dec 2024',
                        'funded_ar' => 'اليونسكو',
                        'funded_en' => 'UNESCO',
                        'amount' => '$3,200'
                    ]
                ];
            } elseif (str_contains($projectNameLower, 'peace') || str_contains($projectNameLower, 'سلام') || $projectId == 43) {
                // Peace Building Program Cards
                $cards = [
                    [
                        'icon' => 'fas fa-dove',
                        'status_ar' => 'مكتمل',
                        'status_en' => 'Completed',
                        'status_class' => 'bg-gray-100 text-gray-700 border-gray-200',
                        'title_ar' => 'بناء السلام والتعايش السلمي عبر التدريب بالفاشر',
                        'title_en' => 'Peacebuilding through Community Training',
                        'desc_ar' => 'تيسير دورات تدريبية لبناء السلام وحل النزاعات في مخيمات النازحين ومراكز الإيواء وريف الفاشر.',
                        'desc_en' => 'Conducted peacebuilding through training at IDPs camps, shelter center, and El Fasher rural area.',
                        'detail_ar' => 'بتمويل من منظمة جبل سسي للسلام والتنمية بقيمة إجمالية بلغت 500 دولار.',
                        'detail_en' => 'Funded by Jabal Sesae organization for peace and development with total of 500 USD.',
                        'location_ar' => 'مخيمات النازحين وريف الفاشر ومراكز الإيواء، السودان',
                        'location_en' => 'IDPs camps, shelter center, and El Fasher rural area, Sudan',
                        'date_ar' => 'مارس 2024',
                        'date_en' => 'March 2024',
                        'funded_ar' => 'منظمة جبل سسي للسلام والتنمية',
                        'funded_en' => 'Jabal Sesae Organization for Peace and Development',
                        'amount' => '$500'
                    ],
                    [
                        'icon' => 'fas fa-dove',
                        'status_ar' => 'مكتمل',
                        'status_en' => 'Completed',
                        'status_class' => 'bg-gray-100 text-gray-700 border-gray-200',
                        'title_ar' => 'مبادرة بناء السلام وتمكين النساء والفتيات بمراكز الإيواء',
                        'title_en' => 'Peacebuilding Promotion Initiative for Women & Girls',
                        'desc_ar' => 'إطلاق مبادرة بناء السلام وتدريب النساء والفتيات على حل النزاعات والوساطة بمراكز إيواء الفاشر.',
                        'desc_en' => 'Conducted peacebuilding promotion initiative training of women and girls in shelter centers.',
                        'detail_ar' => 'بدعم من منظمة بركتيكال أكشن بمبلغ 500 دولار.',
                        'detail_en' => 'Supported by Practical Action with amount of 500 USD.',
                        'location_ar' => 'مركز الإيواء بالفاشر، شمال دارفور، السودان',
                        'location_en' => 'El Fasher shelter center, North Darfur, Sudan',
                        'date_ar' => 'أبريل 2024',
                        'date_en' => 'April 2024',
                        'funded_ar' => 'منظمة بركتيكال أكشن (عمل عملي)',
                        'funded_en' => 'Practical Action',
                        'amount' => '$500'
                    ],
                    [
                        'icon' => 'fas fa-dove',
                        'status_ar' => 'مكتمل',
                        'status_en' => 'Completed',
                        'status_class' => 'bg-gray-100 text-gray-700 border-gray-200',
                        'title_ar' => 'تدريب متطوعي بناء السلام حول مدونة السلوك',
                        'title_en' => 'Peacebuilding Training for Volunteers (Code of Conduct)',
                        'desc_ar' => 'تدريب متطوعي بناء السلام وتأهيلهم حول مدونات السلوك وأسس العمل الإنساني والتعايش بمراكز إيواء الفاشر.',
                        'desc_en' => 'Conducted peacebuilding training for volunteers on the humanitarian code of conduct.',
                        'detail_ar' => 'بدعم من منظمة الساحل السوداني بمبلغ إجمالي قدره 500 دولار.',
                        'detail_en' => 'Supported by Sahil Sudani organization with total of 500 USD.',
                        'location_ar' => 'مركز الإيواء بالفاشر، شمال دارفور، السودان',
                        'location_en' => 'El Fasher shelter center, North Darfur, Sudan',
                        'date_ar' => '2024',
                        'date_en' => '2024',
                        'funded_ar' => 'منظمة الساحل السوداني',
                        'funded_en' => 'Sahil Sudani Organization',
                        'amount' => '$500'
                    ],
                    [
                        'icon' => 'fas fa-dove',
                        'status_ar' => 'مكتمل',
                        'status_en' => 'Completed',
                        'status_class' => 'bg-gray-100 text-gray-700 border-gray-200',
                        'title_ar' => 'تعزيز بناء السلام عبر الأنشطة الثقافية والاجتماعية بالفاشر',
                        'title_en' => 'Promoting Peacebuilding through Culture & Social Activities',
                        'desc_ar' => 'تعزيز التعايش السلمي والتماسك الاجتماعي من خلال تنظيم فعاليات ثقافية وأنشطة اجتماعية بمراكز الإيواء بالفاشر.',
                        'desc_en' => 'Promoted peacebuilding and social cohesion through cultural events and social activities.',
                        'detail_ar' => 'بدعم من مركز نجوم المستقبل بقيمة إجمالية بلغت 900 دولار.',
                        'detail_en' => 'Supported by Future Stars Center with total amount of 900 USD.',
                        'location_ar' => 'مركز الإيواء بالفاشر، شمال دارفور، السودان',
                        'location_en' => 'El Fasher shelter center, North Darfur, Sudan',
                        'date_ar' => '2024',
                        'date_en' => '2024',
                        'funded_ar' => 'مركز نجوم المستقبل (Future Stars)',
                        'funded_en' => 'Future Stars Center',
                        'amount' => '$900'
                    ]
                ];
            } elseif (str_contains($projectNameLower, 'livelihood') || str_contains($projectNameLower, 'عيش') || $projectId == 34) {
                // Livelihoods Program Cards
                $cards = [
                    [
                        'icon' => 'fas fa-store',
                        'status_ar' => 'مستمر',
                        'status_en' => 'Ongoing',
                        'status_class' => 'bg-green-50 text-green-600 border-green-100',
                        'title_ar' => 'المنح الصغيرة لتمكين رائدات الأعمال',
                        'title_en' => 'Micro-grants for Women Entrepreneurs',
                        'desc_ar' => 'تمويل تأسيس مشاريع صغيرة للأرامل والنساء الأكثر ضعفاً لدعم أسرهن وتأمين دخلهن.',
                        'desc_en' => 'Funding small business setups for widows and vulnerable women to support families and secure income.',
                        'detail_ar' => 'تمكين الأسر التي تعيلها نساء برأس مال لبدء المشاريع.',
                        'detail_en' => 'Empowering female-headed households with starting business capital.',
                        'location_ar' => 'الأسواق المحلية',
                        'location_en' => 'Local Markets',
                        'date_ar' => 'نوفمبر 2024 – الحالي',
                        'date_en' => 'Nov 2024 – Present',
                        'funded_ar' => 'هيئة الأمم المتحدة للمرأة وكوبي',
                        'funded_en' => 'UN Women & COOPI',
                        'amount' => '$9,500'
                    ],
                    [
                        'icon' => 'fas fa-tools',
                        'status_ar' => 'مستمر',
                        'status_en' => 'Ongoing',
                        'status_class' => 'bg-green-50 text-green-600 border-green-100',
                        'title_ar' => 'تدريب المهارات المهنية والتقنية للشباب',
                        'title_en' => 'Vocational Skills Training',
                        'desc_ar' => 'تدريب الشباب على النجارة والخياطة والأعمال الكهربائية للحصول على وظائف ملائمة.',
                        'desc_en' => 'Training youth in carpentry, tailoring, and electrical works for job placement.',
                        'detail_ar' => 'تعزيز فرص العمل من خلال تدريب مهني معتمد.',
                        'detail_en' => 'Fostering employment opportunities through accredited vocational training.',
                        'location_ar' => 'مراكز التدريب المهني',
                        'location_en' => 'Training Hubs',
                        'date_ar' => 'يوليو – ديسمبر 2024',
                        'date_en' => 'Jul – Dec 2024',
                        'funded_ar' => 'منظمة بلان إنترناشيونال',
                        'funded_en' => 'Plan International',
                        'amount' => '$12,000'
                    ],
                    [
                        'icon' => 'fas fa-seedling',
                        'status_ar' => 'مكتمل',
                        'status_en' => 'Completed',
                        'status_class' => 'bg-gray-100 text-gray-700 border-gray-200',
                        'title_ar' => 'دعم الزراعة وتوزيع البذور للمزارعين',
                        'title_en' => 'Agricultural Support & Seeds Distribution',
                        'desc_ar' => 'توفير البذور والأدوات والتدريب الزراعي للمزارعين المتضررين لاستعادة الإنتاج الغذائي.',
                        'desc_en' => 'Providing seeds, tools, and farming training to restore local food production.',
                        'detail_ar' => 'مساعدة صغار المزارعين على إعادة بناء سبل عيشهم وزيادة المحصول.',
                        'detail_en' => 'Assisting smallholder farmers to rebuild livelihoods and increase yield.',
                        'location_ar' => 'القرى الزراعية',
                        'location_en' => 'Farming Villages',
                        'date_ar' => 'مايو – يوليو 2024',
                        'date_en' => 'May – Jul 2024',
                        'funded_ar' => 'منظمة الفاو',
                        'funded_en' => 'FAO',
                        'amount' => '$6,800'
                    ]
                ];
            } elseif (str_contains($projectNameLower, 'protection') || str_contains($projectNameLower, 'حماية') || $projectId == 38) {
                // Protection Program Cards
                $cards = [
                    [
                        'icon' => 'fas fa-shield-alt',
                        'status_ar' => 'مكتمل',
                        'status_en' => 'Completed',
                        'status_class' => 'bg-gray-100 text-gray-700 border-gray-200',
                        'title_ar' => 'حماية النساء والفتيات عبر الدعم النفسي والاجتماعي',
                        'title_en' => 'Women & Girls Protection through Psychosocial Support',
                        'desc_ar' => 'تقديم خدمات الدعم النفسي والاجتماعي المتكامل لتعزيز حماية النساء والفتيات في مراكز إيواء الفاشر.',
                        'desc_en' => 'Women & Girls Protection through psychosocial support services to build resilience.',
                        'detail_ar' => 'بتمويل من مركز مستقبل النجم بمبلغ إجمالي قدره 5,000 دولار.',
                        'detail_en' => 'Funded by Star Future Center during May to July 2024 with total amount 5,000 USD.',
                        'location_ar' => 'مركز الإيواء بالفاشر، شمال دارفور، السودان',
                        'location_en' => 'El Fasher shelter center, North Darfur, Sudan',
                        'date_ar' => 'مايو – يوليو 2024',
                        'date_en' => 'May – July 2024',
                        'funded_ar' => 'مركز مستقبل النجم',
                        'funded_en' => 'Star Future Center',
                        'amount' => '$5,000'
                    ],
                    [
                        'icon' => 'fas fa-shield-alt',
                        'status_ar' => 'مكتمل',
                        'status_en' => 'Completed',
                        'status_class' => 'bg-gray-100 text-gray-700 border-gray-200',
                        'title_ar' => 'تدريب وبناء القدرات في الحماية والدعم النفسي',
                        'title_en' => 'Protection Training & Psychosocial Support',
                        'desc_ar' => 'بناء قدرات المجتمع والعاملين المحليين حول آليات تقديم الدعم النفسي والاجتماعي لتعزيز الحماية بمراكز الإيواء بالفاشر.',
                        'desc_en' => 'Protection training conducted through psychosocial support at shelter centers.',
                        'detail_ar' => 'بتمويل من منظمة أوتاش للتنمية والسلام بقيمة إجمالية بلغت 900 دولار.',
                        'detail_en' => 'Funded by Otash organization for development and peace with total amount 900 USD.',
                        'location_ar' => 'مركز الإيواء بالفاشر، شمال دارفور، السودان',
                        'location_en' => 'El Fasher shelter center, North Darfur, Sudan',
                        'date_ar' => 'أكتوبر 2024',
                        'date_en' => 'October 2024',
                        'funded_ar' => 'منظمة أوتاش للتنمية والسلام',
                        'funded_en' => 'Otash Organization for Development and Peace',
                        'amount' => '$900'
                    ],
                    [
                        'icon' => 'fas fa-shield-alt',
                        'status_ar' => 'مكتمل',
                        'status_en' => 'Completed',
                        'status_class' => 'bg-gray-100 text-gray-700 border-gray-200',
                        'title_ar' => 'دعم الحماية والخدمات النفسية والاجتماعية للنازحين',
                        'title_en' => 'Protection through Psychosocial Support',
                        'desc_ar' => 'توفير آليات الحماية والدعم النفسي والاجتماعي للأسر النازحة بمراكز الإيواء بالفاشر.',
                        'desc_en' => 'Protection through psychosocial support services to support families.',
                        'detail_ar' => 'بتمويل كريم من منظمة أبناء دارفور في سويسرا بمبلغ 1,000 دولار.',
                        'detail_en' => 'Funded by Sons of Darfur organization in Switzerland with total amount 1,000 USD.',
                        'location_ar' => 'مركز الإيواء بالفاشر، السودان',
                        'location_en' => 'El Fasher shelter center, Sudan',
                        'date_ar' => 'ديسمبر 2024',
                        'date_en' => 'December 2024',
                        'funded_ar' => 'منظمة أبناء دارفور في سويسرا',
                        'funded_en' => 'Sons of Darfur Organization in Switzerland',
                        'amount' => '$1,000'
                    ],
                    [
                        'icon' => 'fas fa-shield-alt',
                        'status_ar' => 'مكتمل',
                        'status_en' => 'Completed',
                        'status_class' => 'bg-gray-100 text-gray-700 border-gray-200',
                        'title_ar' => 'تعزيز الحماية والدعم النفسي في منطقة غزن جديد',
                        'title_en' => 'Protection through Psychosocial Support',
                        'desc_ar' => 'تقديم برامج حماية متكاملة وخدمات الدعم النفسي والاجتماعي بمناطق الفاشر (غزن جديد).',
                        'desc_en' => 'Protection through psychosocial support program for displaced communities.',
                        'detail_ar' => 'بتمويل من منظمة سيفروورلد بقيمة إجمالية قدرها 11,000 دولار.',
                        'detail_en' => 'Funded by Safer World at El Fasher (Ghazan Jadeed) with amount 11,000 USD.',
                        'location_ar' => 'الفاشر - غزن جديد - شمال دارفور، السودان',
                        'location_en' => 'El Fasher – Ghazan Jadeed – North Darfur, Sudan',
                        'date_ar' => 'يناير – فبراير 2025',
                        'date_en' => 'Jan – Feb 2025',
                        'funded_ar' => 'منظمة سيفروورلد',
                        'funded_en' => 'Safer World',
                        'amount' => '$11,000'
                    ],
                    [
                        'icon' => 'fas fa-shield-alt',
                        'status_ar' => 'مكتمل',
                        'status_en' => 'Completed',
                        'status_class' => 'bg-gray-100 text-gray-700 border-gray-200',
                        'title_ar' => 'الدعم النفسي والاجتماعي بريف ومراكز إيواء الفاشر',
                        'title_en' => 'Protection through Psychosocial Support Services',
                        'desc_ar' => 'تسيير وإطلاق جلسات وأنشطة حماية مجتمعية ودعم نفسي في ريف الفاشر ومراكز الإيواء.',
                        'desc_en' => 'Protection through psychosocial support conducted in rural areas and shelters.',
                        'detail_ar' => 'بدعم من منظمة ماما أفريقيا للخدمات الإنسانية بمبلغ إجمالي قدره 1,000 دولار.',
                        'detail_en' => 'Conducted by MAMA Africa organization for humanitarian services with total amount 1,000 USD.',
                        'location_ar' => 'ريف الفاشر ومراكز الإيواء، السودان',
                        'location_en' => 'El Fasher Rural area and shelter center, Sudan',
                        'date_ar' => 'مارس 2025',
                        'date_en' => 'March 2025',
                        'funded_ar' => 'منظمة ماما أفريقيا للخدمات الإنسانية',
                        'funded_en' => 'MAMA Africa Organization for Humanitarian Services',
                        'amount' => '$1,000'
                    ],
                    [
                        'icon' => 'fas fa-shield-alt',
                        'status_ar' => 'مكتمل',
                        'status_en' => 'Completed',
                        'status_class' => 'bg-gray-100 text-gray-700 border-gray-200',
                        'title_ar' => 'الحماية والخدمات الاجتماعية للنازحين بالفاشر',
                        'title_en' => 'Protection & Social Services Support',
                        'desc_ar' => 'تعزيز وتنسيق أنشطة الحماية والدعم النفسي والاجتماعي للنازحين داخل مراكز الإيواء بالفاشر.',
                        'desc_en' => 'Protection through psychosocial support conducted at shelter centers.',
                        'detail_ar' => 'بدعم من وزارة الشؤون الاجتماعية بقيمة إجمالية بلغت 2,000 دولار.',
                        'detail_en' => 'Conducted by the Ministry of Social Affairs with total amount 2,000 USD.',
                        'location_ar' => 'مركز الإيواء بالفاشر، شمال دارفور، السودان',
                        'location_en' => 'El Fasher Shelter center, North Darfur, Sudan',
                        'date_ar' => 'مايو 2025',
                        'date_en' => 'May 2025',
                        'funded_ar' => 'وزارة الشؤون الاجتماعية',
                        'funded_en' => 'Ministry of Social Affairs',
                        'amount' => '$2,000'
                    ],
                    [
                        'icon' => 'fas fa-shield-alt',
                        'status_ar' => 'مكتمل',
                        'status_en' => 'Completed',
                        'status_class' => 'bg-gray-100 text-gray-700 border-gray-200',
                        'title_ar' => 'مشروع المساحات الآمنة للحماية ودعم سبل العيش للنساء والفتيات',
                        'title_en' => 'Protection & Livelihood Support: Safe Space for Women & Girls',
                        'desc_ar' => 'تأسيس وتشغيل مساحات آمنة لتقديم برامج حماية متكاملة ودعم سبل كسب العيش للنساء والفتيات بالفاشر.',
                        'desc_en' => 'Protection and livelihood support project: safe space for women and girls.',
                        'detail_ar' => 'بتمويل من DTI بقيمة إجمالية قدرها 19,982 دولار.',
                        'detail_en' => 'Funded by DTI with total 19,982 USD from April to July 2025.',
                        'location_ar' => 'الفاشر، شمال دارفور، السودان',
                        'location_en' => 'El Fasher, North Darfur, Sudan',
                        'date_ar' => 'أبريل – يوليو 2025',
                        'date_en' => 'April – July 2025',
                        'funded_ar' => 'مبادرة الانتقال الديمقراطي (DTI)',
                        'funded_en' => 'Democratic Transition Initiative (DTI)',
                        'amount' => '$19,982'
                    ]
                ];
            } elseif (str_contains($projectNameLower, 'food') || str_contains($projectNameLower, 'غذاء') || $projectId == 39) {
                // Food Security Program Cards
                $cards = [
                    [
                        'icon' => 'fas fa-utensils',
                        'status_ar' => 'مكتمل',
                        'status_en' => 'Completed',
                        'status_class' => 'bg-gray-100 text-gray-700 border-gray-200',
                        'title_ar' => 'توفير مواد الأمن الغذائي (المطابخ المشتركة والسلال الغذائية) للنازحين',
                        'title_en' => 'Provision of Food Security Materials (Communal Kitchen & Food Baskets) to IDPs',
                        'desc_ar' => 'توفير وتوزيع مواد الأمن الغذائي بما في ذلك المطابخ المشتركة وسلال الغذاء للأسر النازحة بمراكز الإيواء بالفاشر.',
                        'desc_en' => 'Provision of food security materials (communal kitchen, foods baskets) to the IDPs.',
                        'detail_ar' => 'بتمويل من منظمة بلان السودان بقيمة إجمالية قدرها 2,000 دولار.',
                        'detail_en' => 'Funded by Plan Sudan with total of 2,000 USD.',
                        'location_ar' => 'مركز الإيواء بالفاشر، شمال دارفور، السودان',
                        'location_en' => 'El Fasher - Shelters center, North Darfur, Sudan',
                        'date_ar' => 'مارس – أبريل 2024',
                        'date_en' => 'March – April 2024',
                        'funded_ar' => 'منظمة بلان السودان',
                        'funded_en' => 'Plan Sudan',
                        'amount' => '$2,000'
                    ],
                    [
                        'icon' => 'fas fa-utensils',
                        'status_ar' => 'مكتمل',
                        'status_en' => 'Completed',
                        'status_class' => 'bg-gray-100 text-gray-700 border-gray-200',
                        'title_ar' => 'تشغيل المطبخ المشترك لتعزيز الأمن الغذائي',
                        'title_en' => 'Food Security through Communal Kitchen',
                        'desc_ar' => 'تشغيل المطابخ المشتركة لتوفير الوجبات اليومية للنازحين في مراكز الإيواء بالفاشر.',
                        'desc_en' => 'Conducted Food security through communal kitchen for displaced people in shelters.',
                        'detail_ar' => 'بتمويل من منظمة أوتاش للتنمية والسلام بقيمة إجمالية بلغت 900 دولار.',
                        'detail_en' => 'Funded by Otash organization for development and peace during Oct 2024.',
                        'location_ar' => 'مركز الإيواء بالفاشر، شمال دارفور، السودان',
                        'location_en' => 'El Fasher shelter center - North Darfur, Sudan',
                        'date_ar' => 'أكتوبر 2024',
                        'date_en' => 'October 2024',
                        'funded_ar' => 'منظمة أوتاش للتنمية والسلام',
                        'funded_en' => 'Otash Organization for Development and Peace',
                        'amount' => '$900'
                    ],
                    [
                        'icon' => 'fas fa-utensils',
                        'status_ar' => 'مكتمل',
                        'status_en' => 'Completed',
                        'status_class' => 'bg-gray-100 text-gray-700 border-gray-200',
                        'title_ar' => 'المطبخ المشترك بتمويل من منظمة أبناء دارفور في سويسرا',
                        'title_en' => 'Communal Kitchen Food Security Support',
                        'desc_ar' => 'تأمين الغذاء وتوفير الوجبات من خلال المطابخ المشتركة لدعم الأسر في مراكز الإيواء بالفاشر.',
                        'desc_en' => 'Conducted Food Security through communal kitchen at El Fasher shelter center.',
                        'detail_ar' => 'بتمويل كريم من منظمة أبناء دارفور في سويسرا بمبلغ 1,000 دولار.',
                        'detail_en' => 'Funded by sons of Darfur organization in Switzerland with total amount 1,000 USD.',
                        'location_ar' => 'مركز الإيواء بالفاشر، السودان',
                        'location_en' => 'El Fasher Shelter center, Sudan',
                        'date_ar' => 'ديسمبر 2024',
                        'date_en' => 'December 2024',
                        'funded_ar' => 'منظمة أبناء دارفور في سويسرا',
                        'funded_en' => 'Sons of Darfur Organization in Switzerland',
                        'amount' => '$1,000'
                    ],
                    [
                        'icon' => 'fas fa-box-open',
                        'status_ar' => 'مستمر',
                        'status_en' => 'Ongoing',
                        'status_class' => 'bg-green-50 text-green-600 border-green-100',
                        'title_ar' => 'توزيع المواد الغذائية وغير الغذائية لدعم الأمن الغذائي',
                        'title_en' => 'Distribution of Food and Non-Food Items',
                        'desc_ar' => 'تعزيز الأمن الغذائي من خلال توزيع سلال غذائية ومواد غير غذائية للنازحين في الفاشر (غزن جديد).',
                        'desc_en' => 'Reinforce Food Security through distributions of food and non-food items.',
                        'detail_ar' => 'بتمويل من منظمة سيفروورلد بقيمة إجمالية قدرها 11,000 دولار.',
                        'detail_en' => 'Funded by Safer World with total amount 11,000 USD.',
                        'location_ar' => 'الفاشر - غزن جديد - شمال دارفور، السودان',
                        'location_en' => 'El Fasher – Ghazan Jadeed – North Darfur, Sudan',
                        'date_ar' => 'يناير – فبراير 2025',
                        'date_en' => 'Jan – Feb 2025',
                        'funded_ar' => 'منظمة سيفروورلد',
                        'funded_en' => 'Safer World',
                        'amount' => '$11,000'
                    ],
                    [
                        'icon' => 'fas fa-hand-holding-usd',
                        'status_ar' => 'مكتمل',
                        'status_en' => 'Completed',
                        'status_class' => 'bg-gray-100 text-gray-700 border-gray-200',
                        'title_ar' => 'برنامج الدعم النقدي مقابل الغذاء',
                        'title_en' => 'Cash for Food Assistance',
                        'desc_ar' => 'تقديم مساعدات مالية مباشرة لدعم قدرة الأسر النازحة على شراء وتأمين احتياجاتها الغذائية.',
                        'desc_en' => 'Conducted Food Security by cash for food to support displaced families.',
                        'detail_ar' => 'بدعم من منظمة ماما أفريقيا للخدمات الإنسانية بمبلغ 1,000 دولار.',
                        'detail_en' => 'Supported by MAMA Africa Organization for humanitarian services.',
                        'location_ar' => 'مركز الإيواء بالفاشر، شمال دارفور، السودان',
                        'location_en' => 'El Fasher Shelter center, North Darfur, Sudan',
                        'date_ar' => 'فبراير 2025',
                        'date_en' => 'February 2025',
                        'funded_ar' => 'منظمة ماما أفريقيا للخدمات الإنسانية',
                        'funded_en' => 'MAMA Africa Organization for Humanitarian Services',
                        'amount' => '$1,000'
                    ],
                    [
                        'icon' => 'fas fa-utensils',
                        'status_ar' => 'مستمر',
                        'status_en' => 'Ongoing',
                        'status_class' => 'bg-green-50 text-green-600 border-green-100',
                        'title_ar' => 'تعزيز الأمن الغذائي عبر المطابخ المشتركة بالفاشر',
                        'title_en' => 'Reinforce Food Security through Communal Kitchen',
                        'desc_ar' => 'تعزيز الأمن الغذائي للنازحين بمراكز الإيواء بالفاشر من خلال تشغيل ودعم المطابخ المشتركة.',
                        'desc_en' => 'Reinforce Food Security through communal kitchen at El Fasher shelters.',
                        'detail_ar' => 'بتمويل من وزارة الشؤون الاجتماعية بقيمة 2,000 دولار.',
                        'detail_en' => 'Funded by Ministry of social affairs with amount of 2,000 USD.',
                        'location_ar' => 'مركز الإيواء بالفاشر، شمال دارفور، السودان',
                        'location_en' => 'El Fasher Shelter center, North Darfur, Sudan',
                        'date_ar' => 'مايو – يونيو 2025',
                        'date_en' => 'May – June 2025',
                        'funded_ar' => 'وزارة الشؤون الاجتماعية',
                        'funded_en' => 'Ministry of Social Affairs',
                        'amount' => '$2,000'
                    ]
                ];
            } else {
                // Fallback / Food Security / Generic Cards
                $cards = [
                    [
                        'icon' => 'fas fa-utensils',
                        'status_ar' => 'مستمر',
                        'status_en' => 'Ongoing',
                        'status_class' => 'bg-green-50 text-green-600 border-green-100',
                        'title_ar' => 'مبادرة المطبخ المشترك للأسر النازحة',
                        'title_en' => 'Communal Kitchen Initiative',
                        'desc_ar' => 'توفير وجبات ساخنة يومية للعائلات النازحة والمجتمعات المتضررة.',
                        'desc_en' => 'Providing daily hot meals to displaced families and affected communities.',
                        'detail_ar' => 'دعم الأسر النازحة من خلال المساعدة الغذائية الطارئة.',
                        'detail_en' => 'Supporting displaced families through emergency food assistance.',
                        'location_ar' => 'إقليم دارفور',
                        'location_en' => 'Darfur Region',
                        'date_ar' => 'مارس – أبريل 2024',
                        'date_en' => 'Mar – Apr 2024',
                        'funded_ar' => 'برنامج الأغذية العالمي وكوبي',
                        'funded_en' => 'WFP & COOPI',
                        'amount' => '$19,982'
                    ],
                    [
                        'icon' => 'fas fa-box-open',
                        'status_ar' => 'استجابة طارئة',
                        'status_en' => 'Emergency Response',
                        'status_class' => 'bg-red-50 text-red-600 border-red-100',
                        'title_ar' => 'توزيع السلال الغذائية للأسر الضعيفة',
                        'title_en' => 'Food Basket Distribution',
                        'desc_ar' => 'توزيع الحصص الغذائية الأساسية لدعم الأسر ذات الدخل المحدود.',
                        'desc_en' => 'Distributing essential food rations to support low-income families.',
                        'detail_ar' => 'توصيل الدعم الغذائي الطارئ للمجتمعات الضعيفة.',
                        'detail_en' => 'Delivering emergency food support to vulnerable communities.',
                        'location_ar' => 'مواقع متعددة',
                        'location_en' => 'Multiple Sites',
                        'date_ar' => 'أكتوبر 2024',
                        'date_en' => 'Oct 2024',
                        'funded_ar' => 'اليونيسف',
                        'funded_en' => 'UNICEF',
                        'amount' => '$11,000'
                    ],
                    [
                        'icon' => 'fas fa-hand-holding-usd',
                        'status_ar' => 'مستمر',
                        'status_en' => 'Ongoing',
                        'status_class' => 'bg-green-50 text-green-600 border-green-100',
                        'title_ar' => 'الدعم النقدي لشراء الغذاء للاجئين والنازحين',
                        'title_en' => 'Cash for Food Support',
                        'desc_ar' => 'تقديم مساعدات مالية مباشرة لتمكين الأسر من تلبية احتياجاتها الأساسية.',
                        'desc_en' => 'Providing direct financial assistance to empower families to meet their needs.',
                        'detail_ar' => 'تمكين الأسر من خلال المساعدات النقدية المباشرة.',
                        'detail_en' => 'Empowering households through direct cash assistance.',
                        'location_ar' => 'المراكز الحضرية',
                        'location_en' => 'Urban Centers',
                        'date_ar' => 'يناير – فبراير 2025',
                        'date_en' => 'Jan – Feb 2025',
                        'funded_ar' => 'منظمة بلان إنترناشيونال',
                    ]
                ];
            }

            // Load dynamic activities from database if they exist for this project
            $dbActivities = $project->activities()->latest()->get();
            if ($dbActivities->isNotEmpty()) {
                $cards = [];
                foreach ($dbActivities as $act) {
                    $cards[] = [
                        'icon' => $act->effective_icon,
                        'status_ar' => $act->getTranslation('status', 'ar') ?: 'مكتمل',
                        'status_en' => $act->getTranslation('status', 'en') ?: 'Completed',
                        'status_class' => 'bg-gray-100 text-gray-700 border-gray-200',
                        'title_ar' => $act->getTranslation('title', 'ar'),
                        'title_en' => $act->getTranslation('title', 'en'),
                        'desc_ar' => $act->getTranslation('description', 'ar'),
                        'desc_en' => $act->getTranslation('description', 'en'),
                        'detail_ar' => $act->getTranslation('detail', 'ar') ?: '',
                        'detail_en' => $act->getTranslation('detail', 'en') ?: '',
                        'location_ar' => $act->getTranslation('location', 'ar'),
                        'location_en' => $act->getTranslation('location', 'en'),
                        'date_ar' => $act->getTranslation('date', 'ar'),
                        'date_en' => $act->getTranslation('date', 'en'),
                        'funded_ar' => $act->getTranslation('funded_by', 'ar'),
                        'funded_en' => $act->getTranslation('funded_by', 'en'),
                        'amount' => $act->amount ?: 'N/A'
                    ];
                }
            }
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 fade-in">
            @foreach($cards as $card)
            <!-- Card -->
            <div class="bg-white rounded-2xl p-6 shadow-[0_4px_20px_rgba(0,0,0,0.04)] hover:shadow-[0_8px_30px_rgba(232,118,59,0.1)] transition-all duration-300 hover:-translate-y-1 group">
                <div class="flex justify-between items-start mb-4">
                    <div class="w-12 h-12 bg-[#fdf4ef] text-[#e8763b] rounded-xl flex items-center justify-center text-xl group-hover:bg-[#e8763b] group-hover:text-white transition-colors">
                        <i class="{{ $card['icon'] }}"></i>
                    </div>
                    <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold {{ $card['status_class'] ?? 'bg-green-50 text-green-600 border border-green-100' }}">
                        {{ app()->getLocale() == 'ar' ? $card['status_ar'] : $card['status_en'] }}
                    </span>
                </div>
                <h3 class="text-lg font-bold text-[#2d3436] mb-2" style="font-family: 'Merriweather', serif;">
                    {{ app()->getLocale() == 'ar' ? $card['title_ar'] : $card['title_en'] }}
                </h3>
                <p class="text-[#636e72] text-sm mb-2">
                    {{ app()->getLocale() == 'ar' ? $card['desc_ar'] : $card['desc_en'] }}
                </p>
                <p class="text-[#2d3436] text-xs font-semibold mb-4 opacity-80">
                    {{ app()->getLocale() == 'ar' ? $card['detail_ar'] : $card['detail_en'] }}
                </p>
                <div class="space-y-2 text-sm text-[#2d3436]">
                    <div class="flex justify-between items-center border-b border-gray-50 pb-2">
                        <span class="text-gray-500"><i class="fas fa-map-marker-alt w-4"></i> {{ app()->getLocale() == 'ar' ? 'الموقع' : 'Location' }}</span>
                        <span class="font-medium">{{ app()->getLocale() == 'ar' ? $card['location_ar'] : $card['location_en'] }}</span>
                    </div>
                    <div class="flex justify-between items-center border-b border-gray-50 pb-2">
                        <span class="text-gray-500"><i class="fas fa-calendar-alt w-4"></i> {{ app()->getLocale() == 'ar' ? 'التاريخ' : 'Date' }}</span>
                        <span class="font-medium">{{ app()->getLocale() == 'ar' ? $card['date_ar'] : $card['date_en'] }}</span>
                    </div>
                    <div class="flex justify-between items-center border-b border-gray-50 pb-2">
                        <span class="text-gray-500"><i class="fas fa-handshake w-4"></i> {{ app()->getLocale() == 'ar' ? 'بتمويل من' : 'Funded By' }}</span>
                        <span class="font-medium text-[#e8763b]">{{ app()->getLocale() == 'ar' ? $card['funded_ar'] : $card['funded_en'] }}</span>
                    </div>
                    <div class="flex justify-between items-center pt-1">
                        <span class="text-gray-500"><i class="fas fa-coins w-4"></i> {{ app()->getLocale() == 'ar' ? 'المبلغ' : 'Amount' }}</span>
                        <span class="font-bold text-[#e8763b]">{{ $card['amount'] }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>



    <!-- 
    <section class="solution-section">
        <div class="container">
            <div class="text-center mb-5 fade-in">
                <span class="section-subtitle">Our Approach</span>
                <h2 class="section-title">How We Create Change</h2>
                <p class="text-muted mx-auto" style="max-width: 600px;">
                    Our comprehensive approach ensures sustainable access to clean water through community-driven solutions.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3 fade-in">
                    <div class="solution-card">
                        <div class="solution-icon">
                            <i class="bi bi-water"></i>
                        </div>
                        <h4>Well Construction</h4>
                        <p>We build deep wells and boreholes that provide reliable, year-round access to clean groundwater for entire communities.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 fade-in">
                    <div class="solution-card">
                        <div class="solution-icon">
                            <i class="bi bi-funnel-fill"></i>
                        </div>
                        <h4>Filtration Systems</h4>
                        <p>Installing advanced water filtration systems that remove harmful bacteria, parasites, and contaminants from water sources.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 fade-in">
                    <div class="solution-card">
                        <div class="solution-icon">
                            <i class="bi bi-book-fill"></i>
                        </div>
                        <h4>Education Programs</h4>
                        <p>Teaching communities about water hygiene, sanitation practices, and the importance of clean water for health.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 fade-in">
                    <div class="solution-card">
                        <div class="solution-icon">
                            <i class="bi bi-tools"></i>
                        </div>
                        <h4>Local Maintenance</h4>
                        <p>Training local technicians to maintain and repair water systems, ensuring long-term sustainability and community ownership.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

 
    <section class="impact-section">
        <div class="container">
            <div class="text-center mb-5 fade-in">
                <span class="section-subtitle">Our Impact</span>
                <h2 class="section-title">Making a Difference Together</h2>
            </div>
            
            <div class="impact-card fade-in">
                <h4 class="mb-4"><i class="bi bi-graph-up-arrow text-warning me-2"></i>2024 Program Goals Progress</h4>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="progress-wrapper">
                            <div class="progress-label">
                                <span>Wells Constructed</span>
                                <span class="text-warning">78 / 100</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 78%" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="progress-wrapper">
                            <div class="progress-label">
                                <span>Communities Reached</span>
                                <span class="text-warning">45 / 60</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="progress-wrapper">
                            <div class="progress-label">
                                <span>Fundraising Goal</span>
                                <span class="text-warning">$847K / $1M</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="progress-wrapper">
                            <div class="progress-label">
                                <span>Local Technicians Trained</span>
                                <span class="text-warning">120 / 150</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4 mt-2 fade-in">
                <div class="col-6 col-lg-3">
                    <div class="counter-card">
                        <i class="bi bi-house-heart counter-icon"></i>
                        <div class="counter-number" data-target="12450">0</div>
                        <div class="counter-label">Families Helped</div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="counter-card">
                        <i class="bi bi-droplet-half counter-icon"></i>
                        <div class="counter-number" data-target="245">0</div>
                        <div class="counter-label">Wells Built</div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="counter-card">
                        <i class="bi bi-globe-americas counter-icon"></i>
                        <div class="counter-number" data-target="18">0</div>
                        <div class="counter-label">Countries Reached</div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="counter-card">
                        <i class="bi bi-person-hearts counter-icon"></i>
                        <div class="counter-number" data-target="5840">0</div>
                        <div class="counter-label">Volunteers Active</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

   
    <section class="gallery-section">
        <div class="container">
            <div class="text-center mb-5 fade-in">
                <span class="section-subtitle">Photo Gallery</span>
                <h2 class="section-title">See Our Work in Action</h2>
            </div>
            <div class="row fade-in">
                <div class="col-md-6 col-lg-4">
                    <div class="gallery-item">
                        <img src="https://images.unsplash.com/photo-1541544537156-7627a7a4aa1c?w=600&h=400&fit=crop" alt="Community well construction">
                        <div class="gallery-overlay">
                            <span><i class="bi bi-geo-alt-fill me-2"></i>Well Construction - Kenya</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="gallery-item">
                        <img src="https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?w=600&h=400&fit=crop" alt="Children with clean water">
                        <div class="gallery-overlay">
                            <span><i class="bi bi-geo-alt-fill me-2"></i>Happy Children - Uganda</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="gallery-item">
                        <img src="https://images.unsplash.com/photo-1593113598332-cd288d649433?w=600&h=400&fit=crop" alt="Water distribution">
                        <div class="gallery-overlay">
                            <span><i class="bi bi-geo-alt-fill me-2"></i>Water Distribution - Ethiopia</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="gallery-item">
                        <img src="https://images.unsplash.com/photo-1532629345422-7515f3d16bb6?w=600&h=400&fit=crop" alt="Community training">
                        <div class="gallery-overlay">
                            <span><i class="bi bi-geo-alt-fill me-2"></i>Community Training - Tanzania</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="gallery-item">
                        <img src="https://images.unsplash.com/photo-1559027615-cd4628902d4a?w=600&h=400&fit=crop" alt="Water pump installation">
                        <div class="gallery-overlay">
                            <span><i class="bi bi-geo-alt-fill me-2"></i>Pump Installation - India</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="gallery-item">
                        <img src="https://images.unsplash.com/photo-1469571486292-0ba58a3f068b?w=600&h=400&fit=crop" alt="Volunteer team">
                        <div class="gallery-overlay">
                            <span><i class="bi bi-geo-alt-fill me-2"></i>Our Volunteer Team</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="cta-section" id="donate">
        <div class="container">
            <div class="cta-content text-center">
                <h2 class="cta-title">Be Part of the Solution</h2>
                <p class="cta-text">
                    Your generosity can transform lives. Just $30 can provide clean water<br class="d-none d-md-block"> to a family for an entire year.
                </p>
                <a href="#" class="btn btn-white">
                    <i class="bi bi-heart-fill me-2"></i>Donate Now & Save Lives
                </a>
                <div class="mt-4">
                    <span class="text-white-50">
                        <i class="bi bi-shield-check me-1"></i>
                        100% of donations go directly to programs
                    </span>
                </div>
            </div>
        </div>
    </section>-->

    <!-- Footer -->
    @include('layouts.footer')

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="js/i18n.js"></script>
   

    <script>
        // Intersection Observer for fade-in animations
        const fadeElements = document.querySelectorAll('.fade-in');

        const fadeObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });

        fadeElements.forEach(element => {
            fadeObserver.observe(element);
        });

        // Counter Animation
        const counterElements = document.querySelectorAll('.counter-number');

        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const target = parseInt(entry.target.getAttribute('data-target'));
                    animateCounter(entry.target, target);
                    counterObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        counterElements.forEach(counter => {
            counterObserver.observe(counter);
        });

        function animateCounter(element, target) {
            let current = 0;
            const increment = target / 60;
            const duration = 2000;
            const stepTime = duration / 60;

            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    element.textContent = formatNumber(target);
                    clearInterval(timer);
                } else {
                    element.textContent = formatNumber(Math.floor(current));
                }
            }, stepTime);
        }

        function formatNumber(num) {
            if (num >= 1000) {
                return num.toLocaleString();
            }
            return num.toString();
        }

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const href = this.getAttribute('href');
                if (href !== '#') {
                    e.preventDefault();
                    const target = document.querySelector(href);
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                }
            });
        });

        // Progress bar animation
        const progressBars = document.querySelectorAll('.progress-bar');

        const progressObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const width = entry.target.style.width;
                    entry.target.style.width = '0';
                    setTimeout(() => {
                        entry.target.style.transition = 'width 1.5s ease-out';
                        entry.target.style.width = width;
                    }, 100);
                    progressObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        progressBars.forEach(bar => {
            progressObserver.observe(bar);
        });
    </script>
    <script>
function changeLanguage(lang){
    window.location = "/change-language/" + lang;
}

function toggleLanguage(){
    let currentLang = "{{ app()->getLocale() }}";

    if(currentLang === 'ar'){
        changeLanguage('en');
    }else{
        changeLanguage('ar');
    }
}
</script>

</body>

</html>

