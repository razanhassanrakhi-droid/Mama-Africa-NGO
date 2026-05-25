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
    <div id="navbar"></div>
    <!-- Hero Section -->
     <section class="hero-section">
    <div class="container">
        <div class="row align-items-center">

            <!-- الصورة -->
            <div class="col-lg-7 mb-4 mb-lg-0">
                <div class="hero-image-wrapper">
                    <span class="hero-badge">
                        <i class="bi bi-droplet-fill me-1"></i> {{ $News->title }}
                    </span>
                    <img src="{{ $News->image ? url('/media/' . $News->image) : $News->fallback_image }}" 
                         onerror="this.onerror=null;this.src='{{ $News->fallback_image }}';"
                         alt="{{ $News->title }}" 
                         class="hero-image img-fluid">
                </div>
            </div>

            <!-- المحتوى -->
            <div class="col-lg-5">
                <div class="hero-content ps-lg-4">
                    <span class="section-subtitle">  {{ __('massage.news_page.details') }}</span>
                    <h1 class="hero-title">{{ $News->title }}</h1>
                    <p class="hero-description">
                        {{ $News->details }}
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="{{ route('home') }}#lastnews" onclick="if(window.history.length > 1) { window.history.back(); return false; }" class="btn btn-outline-orange">
                            <i class="bi bi-arrow-left me-2"></i>{{ __('massage.news_page.back') }}
                        </a>
                        @if($News->youtube_link)
                            <button id="playVideoBtn" class="btn btn-outline-secondary" style="font-size:1rem; padding:0.5rem 1.5rem;">
                                <i class="bi bi-play-circle me-2"></i>{{ __('massage.program.watch') }}
                            </button>


<div id="videoContainer" style="position:relative;width:100%;height:0;padding-bottom:56.25%;margin-top:15px;">
    <!-- الفيديو سيظهر هنا -->
</div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const btn = document.getElementById('playVideoBtn');
            const container = document.getElementById('videoContainer');

            btn.addEventListener('click', function() {
                const youtubeUrl = "{{ $News->youtube_link }}";
                
                function getYouTubeID(url) {
                    let id = null;
                    if(url.includes('youtu.be/')) {
                        id = url.split('youtu.be/')[1].split(/[?&]/)[0];
                    }
                    else if(url.includes('youtube.com/watch')) {
                        const params = new URLSearchParams(url.split('?')[1]);
                        id = params.get('v');
                    }
                    else if(url.includes('youtube.com/embed/')) {
                        id = url.split('embed/')[1].split(/[?&]/)[0];
                    }
                    return id;
                }

                const videoId = getYouTubeID(youtubeUrl);

                if(videoId) {
                    container.innerHTML = `
                        <iframe 
                            src="https://www.youtube.com/embed/${videoId}?autoplay=1" 
                            title="News Video" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen
                            style="position:absolute;top:0;left:0;width:100%;height:100%;">
                        </iframe>
                    `;
                    // btn.style.display = 'none';  <-- السطر ده اتلغي
                } else {
                    alert('Video link not valid!');
                }
            });
        });
    </script>
@endif
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
                    <span class="section-subtitle">{{ __('massage.program.challenge') }}</span>
                    <h2 class="section-title mb-4">{{ $News->title }}</h2>
                    <p>
                        {!! nl2br(e($News->details)) !!}
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

