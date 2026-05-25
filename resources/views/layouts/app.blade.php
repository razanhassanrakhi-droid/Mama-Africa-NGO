<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
  <meta charset="UTF-8" />
  <title>@yield('title', app()->getLocale() == 'ar' ? ($settings['site_name_ar'] ?? 'ماما أفريكا') : ($settings['site_name_en'] ?? 'Mama Africa NGO'))</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" href="{{ isset($siteHero) && $siteHero->logo ? url('/media/'.$siteHero->logo) : asset('images/favicon-org.png') }}">
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Cairo:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
  <!-- GSAP -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
  <!-- Tailwind -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="{{ asset('global.css') }}">
  
  <style>
    /* Global Styles from index */
    .custom-nav .nav-link::after { content: ""; position: absolute; width: 0; height: 2px; bottom: -6px; left: 0; background-color: #f97316; transition: width 0.3s ease; }
    .custom-nav .nav-link:hover { color: #f97316; }
    .custom-nav .nav-link:hover::after { width: 100%; }
    .lang-icon { font-size: 20px; color: #ffffff; cursor: pointer; transition: transform 0.3s ease, color 0.3s ease; }
    .lang-icon:hover { color: #f97316; transform: rotate(20deg); }
    .btn-login { border: 1px solid #ffffff; color: #ffffff; padding: 6px 18px; border-radius: 30px; background: transparent; transition: all 0.3s ease; }
    .btn-login:hover { background-color: #f97316; border-color: #f97316; color: #fff; }
    .section-bg { background-color: #fef9f5; padding: 80px 0; min-height: 100vh; }
    
    /* Navbar Styles */
    :root { --nav-accent: #E8882A; --nav-brand: #FFF5E6; --nav-tagline: #D4A96A; --nav-link: rgba(255,245,230,0.88); --nav-bg-scroll: rgba(36,20,10,0.93); --font-en: 'Poppins', sans-serif; --font-ar: 'Cairo', sans-serif; }
    #ma-navbar { position: fixed; top: 0; inset-inline-start: 0; width: 100%; z-index: 1000; transition: background 0.35s ease, backdrop-filter 0.35s ease, box-shadow 0.35s ease; background: var(--nav-bg-scroll); } /* Force background for internal pages */
    #ma-navbar.scrolled { background: var(--nav-bg-scroll) !important; backdrop-filter: blur(14px); box-shadow: 0 2px 20px rgba(0,0,0,0.35); }
    .ma-nav-inner { max-width: 1280px; margin: 0 auto; padding: 0 1rem; height: 80px; display: flex; align-items: center; justify-content: flex-start; gap: 1.5rem; }
    .ma-logo-wrap { display: flex; align-items: center; gap: 0.75rem; text-decoration: none; flex-shrink: 0; }
    .ma-logo-img { width: 58px; height: 58px; border-radius: 50%; object-fit: cover; flex-shrink: 0; filter: drop-shadow(0 2px 8px rgba(0,0,0,0.35)); transition: transform 0.3s ease; }
    .ma-logo-wrap:hover .ma-logo-img { transform: scale(1.05); }
    .ma-brand-block { display: flex; flex-direction: column; justify-content: center; line-height: 1.15; position: relative; }
    .ma-brand-name { font-family: var(--font-en); font-weight: 700; font-size: 1.3rem; color: var(--nav-brand); letter-spacing: 0.01em; }
    [dir="rtl"] .ma-brand-name { font-family: var(--font-ar); font-size: 1.25rem; }
    .ma-tagline { font-family: var(--font-en); font-style: italic; font-weight: 400; font-size: 0.68rem; color: var(--nav-tagline); letter-spacing: 0.02em; margin-top: 1px; white-space: nowrap; position: absolute; top: 100%; inset-inline-start: 0; }
    [dir="rtl"] .ma-tagline { font-family: var(--font-ar); font-style: normal; font-size: 0.72rem; }
    .ma-nav-links { display: flex; align-items: center; gap: 0.05rem; list-style: none; margin: 0; padding: 0; }
    .ma-nav-links a { font-family: var(--font-en); font-weight: 500; font-size: 0.75rem; color: var(--nav-link); text-decoration: none; padding: 0.25rem 0.4rem; border-radius: 6px; position: relative; transition: color 0.2s; display: flex; align-items: center; gap: 0.2rem; white-space: nowrap; }
    [dir="rtl"] .ma-nav-links a { font-family: var(--font-ar); font-size: 0.85rem; }
    .ma-nav-links a::after { content: ""; position: absolute; bottom: -2px; inset-inline-start: 0; width: 0; height: 2px; background: var(--nav-accent); border-radius: 2px; transition: width 0.3s ease; }
    .ma-nav-links a:hover { color: var(--nav-accent); }
    .ma-nav-links a:hover::after { width: 100%; }
    .ma-lang-btn { display: flex; align-items: center; gap: 0.3rem; background: rgba(255,245,230,0.12); border: 1px solid rgba(255,245,230,0.25); color: var(--nav-brand); font-family: var(--font-en); font-size: 0.85rem; font-weight: 600; padding: 0.35rem 0.8rem; border-radius: 999px; cursor: pointer; transition: background 0.2s, border-color 0.2s; white-space: nowrap; flex-shrink: 0; }
    .ma-lang-btn:hover { background: rgba(232,136,42,0.2); border-color: var(--nav-accent); color: #fff; }
    .ma-donate-btn { display: inline-flex; align-items: center; justify-content: center; gap: 0.3rem; background-color: #E63946; color: #fff !important; font-family: var(--font-en); font-size: 0.9rem; font-weight: 600; padding: 0.4rem 0.9rem; border-radius: 999px; text-decoration: none !important; transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); box-shadow: 0 4px 12px rgba(230, 57, 70, 0.25); white-space: nowrap; }
    [dir="rtl"] .ma-donate-btn { font-family: var(--font-ar); font-size: 0.95rem; }
    .ma-donate-btn:hover { background-color: #d62839; transform: translateY(-2px) scale(1.05); box-shadow: 0 6px 16px rgba(230, 57, 70, 0.35); color: #fff !important; }
    .ma-donate-btn:active { transform: translateY(0) scale(0.98); }
    #ma-mobile-menu .ma-donate-btn { width: 100%; margin-top: 0.5rem; margin-bottom: 0.5rem; padding: 0.75rem 1rem; }
    .ma-hamburger { display: none; background: none; border: none; color: var(--nav-brand); font-size: 1.6rem; cursor: pointer; padding: 0.25rem; line-height: 1; }
    #ma-mobile-menu { display: none; background: var(--nav-bg-scroll); backdrop-filter: blur(12px); padding: 1rem 1.5rem 1.5rem; border-top: 1px solid rgba(255,245,230,0.08); }
    #ma-mobile-menu.open { display: block; }
    #ma-mobile-menu a { display: flex; align-items: center; gap: 0.6rem; padding: 0.65rem 0.75rem; border-radius: 8px; color: var(--nav-link); font-family: var(--font-en); font-weight: 500; font-size: 0.9rem; text-decoration: none; transition: background 0.2s, color 0.2s; }
    [dir="rtl"] #ma-mobile-menu a { font-family: var(--font-ar); }
    #ma-mobile-menu a:hover { background: rgba(232,136,42,0.15); color: var(--nav-accent); }
    .ma-mobile-lang { margin-top: 0.75rem; padding-top: 0.75rem; border-top: 1px solid rgba(255,245,230,0.1); }
    @media (max-width: 1023px) { .ma-nav-links { display: none; } .ma-hamburger { display: block; } }
    @media (max-width: 639px) {
      .ma-btn-text { display: none; }
      .ma-donate-btn, .ma-lang-btn { padding-left: 0.75rem; padding-right: 0.75rem; gap: 0; }
      .ma-donate-btn i, .ma-lang-btn svg { margin: 0; }
    }
    @media (max-width: 480px) {
      .ma-nav-inner { padding: 0 0.75rem; gap: 0.5rem; }
      .ma-brand-name { font-size: 1.05rem; }
      .ma-tagline { display: none; }
      .ma-logo-img { width: 48px; height: 48px; }
      .ma-hamburger { font-size: 1.4rem; }
    }
  </style>
  @yield('styles')
</head>
<body class="bg-stone-50 text-stone-900 font-sans antialiased">

  <nav id="ma-navbar" aria-label="Primary Navigation">
    <div class="ma-nav-inner">
      <a href="{{ route('home') }}" class="ma-logo-wrap" aria-label="Mama Africa Home">
        <img src="{{ isset($siteHero) && $siteHero->logo ? url('/media/'.$siteHero->logo) : asset('images/favicon-org.png') }}" class="ma-logo-img" alt="Organization Logo" />
        <div class="ma-brand-block">
          <span class="ma-brand-name">{{ app()->getLocale() === 'ar' ? ($siteHero->org_name_ar ?? ($settings['site_name_ar'] ?? __('massage.brand'))) : ($siteHero->org_name_en ?? ($settings['site_name_en'] ?? __('massage.brand'))) }}</span>
          <span class="ma-tagline">{{ app()->getLocale() === 'ar' ? ($siteHero->tagline_ar ?? 'نُمكّن المجتمعات في أفريقيا') : ($siteHero->tagline_en ?? 'Empowering Communities Across Africa') }}</span>
        </div>
      </a>
      <ul class="ma-nav-links" role="menubar">
        <li><a href="{{ route('home') }}" role="menuitem"><i class="fa-solid fa-house fa-xs" aria-hidden="true"></i> {{ __('massage.homeLink') }}</a></li>
        <li><a href="{{ route('home') }}#about" role="menuitem"><i class="fa-solid fa-circle-info fa-xs" aria-hidden="true"></i> {{ __('massage.ab') }}</a></li>
        <li><a href="{{ route('home') }}#locations-section" role="menuitem"><i class="fa-solid fa-map-location-dot fa-xs" aria-hidden="true"></i> {{ app()->getLocale() === 'ar' ? 'أماكن عملنا' : 'Locations' }}</a></li>
        <li><a href="{{ route('home') }}#projects" role="menuitem"><i class="fa-solid fa-diagram-project fa-xs" aria-hidden="true"></i> {{ __('massage.projects') }}</a></li>
        <li><a href="{{ route('home') }}#members" role="menuitem"><i class="fa-solid fa-users fa-xs" aria-hidden="true"></i> {{ __('massage.members') }}</a></li>
        <li><a href="{{ route('home') }}#transparency" role="menuitem"><i class="fa-solid fa-magnifying-glass fa-xs" aria-hidden="true"></i> {{ __('massage.trans') }}</a></li>
        <li><a href="{{ route('home') }}#Impacts" role="menuitem"><i class="fa-solid fa-comment-dots fa-xs" aria-hidden="true"></i> {{ __('massage.impacts') }}</a></li>
        <li><a href="{{ route('home') }}#lastnews" role="menuitem"><i class="fa-solid fa-newspaper fa-xs" aria-hidden="true"></i> {{ __('massage.news') }}</a></li>
        <li><a href="{{ route('home') }}#partners" role="menuitem"><i class="fa-solid fa-handshake fa-xs" aria-hidden="true"></i> {{ app()->getLocale() == 'ar' ? 'الشركاء' : 'Partners' }}</a></li>
        <li><a href="{{ route('home') }}#funding-network" role="menuitem"><i class="fa-solid fa-network-wired fa-xs" aria-hidden="true"></i> {{ app()->getLocale() == 'ar' ? 'الشبكة الداعمة' : 'Support Network' }}</a></li>
        <li><a href="{{ route('home') }}#contact" role="menuitem"><i class="fa-solid fa-envelope fa-xs" aria-hidden="true"></i> {{ __('massage.conta') }}</a></li>
      </ul>
      <div style="display:flex;align-items:center;gap:0.3rem;flex-shrink:0;margin-inline-start: auto;">
        <a href="{{ route('donate') }}" class="ma-donate-btn" aria-label="{{ __('massage.donate_now') }}">
          <i class="fa-solid fa-heart-pulse"></i> <span class="ma-btn-text">{{ __('massage.donate_now') }}</span>
        </a>
        <button onclick="toggleLanguage()" class="ma-lang-btn" aria-label="Toggle Language">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 3v18M3 12h18M5.6 5.6C8.1 7.1 9 12 9 12s.9 4.9 3.4 6.4M18.4 5.6c-2.5 1.5-3.4 6.4-3.4 6.4s-.9 4.9-3.4 6.4"/></svg>
          <span class="ma-btn-text">{{ app()->getLocale() === 'ar' ? 'English' : 'العربية' }}</span>
        </button>
        <button class="ma-hamburger ms-1" onclick="maMobileToggle()" aria-label="Toggle menu" aria-expanded="false" aria-controls="ma-mobile-menu">&#9776;</button>
      </div>
    </div>
    <div id="ma-mobile-menu" role="menu" aria-label="Mobile Navigation">
      <a href="{{ route('home') }}" role="menuitem"><i class="fa-solid fa-house fa-sm"></i> {{ __('massage.homeLink') }}</a>
      <a href="{{ route('home') }}#about" role="menuitem"><i class="fa-solid fa-circle-info fa-sm"></i> {{ __('massage.ab') }}</a>
      <a href="{{ route('home') }}#locations-section" role="menuitem"><i class="fa-solid fa-map-location-dot fa-sm"></i> {{ app()->getLocale() === 'ar' ? 'أماكن عملنا' : 'Locations' }}</a>
      <a href="{{ route('home') }}#projects" role="menuitem"><i class="fa-solid fa-diagram-project fa-sm"></i> {{ __('massage.projects') }}</a>
      <a href="{{ route('home') }}#members" role="menuitem"><i class="fa-solid fa-users fa-sm"></i> {{ __('massage.members') }}</a>
      <a href="{{ route('home') }}#transparency" role="menuitem"><i class="fa-solid fa-magnifying-glass fa-sm"></i> {{ __('massage.trans') }}</a>
      <a href="{{ route('home') }}#Impacts" role="menuitem"><i class="fa-solid fa-comment-dots fa-sm"></i> {{ __('massage.impacts') }}</a>
      <a href="{{ route('home') }}#lastnews" role="menuitem"><i class="fa-solid fa-newspaper fa-sm"></i> {{ __('massage.news') }}</a>
      <a href="{{ route('home') }}#partners" role="menuitem"><i class="fa-solid fa-handshake fa-sm"></i> {{ app()->getLocale() == 'ar' ? 'الشركاء' : 'Partners' }}</a>
      <a href="{{ route('home') }}#funding-network" role="menuitem"><i class="fa-solid fa-network-wired fa-sm"></i> {{ app()->getLocale() == 'ar' ? 'الشبكة الداعمة' : 'Support Network' }}</a>
      <a href="{{ route('home') }}#contact" role="menuitem"><i class="fa-solid fa-envelope fa-sm"></i> {{ __('massage.conta') }}</a>
      <a href="{{ route('donate') }}" class="ma-donate-btn" role="menuitem"><i class="fa-solid fa-heart-pulse"></i> {{ __('massage.donate_now') }}</a>
      <div class="ma-mobile-lang">
        <button onclick="toggleLanguage()" class="ma-lang-btn">
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="9"/><path d="M12 3v18M3 12h18"/></svg>
          {{ app()->getLocale() === 'ar' ? 'English' : 'العربية' }}
        </button>
      </div>
    </div>
  </nav>

  <script>
    // Enable smooth scrolling globally
    document.documentElement.style.scrollBehavior = 'smooth';

    (function(){
      var nav = document.getElementById('ma-navbar');
      function onScroll(){ nav.classList.toggle('scrolled', window.scrollY > 30); }
      window.addEventListener('scroll', onScroll, {passive:true});
      onScroll();
    })();

    function maMobileToggle(){
      var m = document.getElementById('ma-mobile-menu');
      var btn = document.querySelector('.ma-hamburger');
      var open = m.classList.toggle('open');
      btn.setAttribute('aria-expanded', open);
    }

    // Close mobile menu when a link is clicked
    document.querySelectorAll('#ma-mobile-menu a').forEach(link => {
      link.addEventListener('click', () => {
        var m = document.getElementById('ma-mobile-menu');
        var btn = document.querySelector('.ma-hamburger');
        if (m && m.classList.contains('open')) {
          m.classList.remove('open');
          if (btn) btn.setAttribute('aria-expanded', 'false');
        }
      });
    });
  </script>

  <main style="padding-top: 80px; min-height: 60vh;">
    @yield('content')
  </main>

  @include('layouts.footer')

  <script>
    function changeLanguage(lang){ window.location = "/change-language/" + lang; }
    function toggleLanguage(){
      let currentLang = "{{ app()->getLocale() }}";
      if(currentLang === 'ar'){ changeLanguage('en'); } else { changeLanguage('ar'); }
    }
  </script>
  @yield('scripts')
</body>
</html>

