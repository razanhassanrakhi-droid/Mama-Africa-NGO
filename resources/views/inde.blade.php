<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
  <meta charset="UTF-8" />
  <title>Mama Africa</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" href="{{ asset('images/favicon-org.png') }}" />
    
  <!-- Performance Optimization: Hero Preload -->
  @if(isset($hero) && $hero->image)
    <link rel="preload" as="image" href="{{ url('/media/' . $hero->image) }}" fetchpriority="high">
  @else
    <link rel="preload" as="image" href="{{ asset('images/ray.png') }}" fetchpriority="high">
  @endif
  <!-- Bootstrap 5 CSS -->


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Cairo:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&family=Inter:wght@300;400;500;600&display=swap"
    rel="stylesheet">


  <!-- GSAP -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
  <!-- Tailwind -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <link rel="stylesheet" href="global.css">
  <style>
    /* Specific section anchors adjustment */
    /* خط تحت اللينك عند الهوفر */
    .custom-nav .nav-link::after {
      content: "";
      position: absolute;
      width: 0;
      height: 2px;
      bottom: -6px;
      left: 0;
      background-color: #f97316;
      transition: width 0.3s ease;
    }

    .custom-nav .nav-link:hover {
      color: #f97316;
    }

    .custom-nav .nav-link:hover::after {
      width: 100%;
    }

    /* أيقونة اللغة */
    .lang-icon {
      font-size: 20px;
      color: #ffffff;
      cursor: pointer;
      transition: transform 0.3s ease, color 0.3s ease;
    }

    .lang-icon:hover {
      color: #f97316;
      transform: rotate(20deg);
    }

    /* زر تسجيل الدخول */
    .btn-login {
      border: 1px solid #ffffff;
      color: #ffffff;
      padding: 6px 18px;
      border-radius: 30px;
      background: transparent;
      transition: all 0.3s ease;
    }

    .btn-login:hover {
      background-color: #f97316;
      border-color: #f97316;
      color: #fff;
    }

    .section-bg {
      background-color: #fef9f5;
      padding: 80px 0;
      min-height: 100vh;
    }

    .program-card {
      background-color: #ffffff;
      border-radius: 30px;
      border: 1px solid rgba(0,0,0,0.03);
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.04);
      padding: 25px;
      height: 100%;
      transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
      display: flex;
      flex-direction: column;
      position: relative;
      overflow: hidden;
    }

    .program-card:hover {
      transform: translateY(-10px) scale(1.02);
      box-shadow: 0 20px 60px rgba(249, 115, 22, 0.12);
      border-color: rgba(249, 115, 22, 0.2);
    }

    .card-header-area {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
    }

    .icon-circle {
      /* If the icon needs a background, uncomment below. The reference usually implies a simple icon or icon in shape. 
               I will keep it simple as requested: "An icon at the top left" */
      font-size: 24px;
      color: #333;
      margin-right: 15px;
      width: 40px;
      text-align: center;
    }

    .card-title {
      font-weight: 700;
      font-size: 1.5rem;
      margin: 0;
      color: #212529;
    }

    .card-img-wrapper {
      margin-bottom: 20px;
      border-radius: 15px;
      overflow: hidden;
      height: 220px;
    }

    .card-img-wrapper img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.5s ease;
    }

    .program-card:hover .card-img-wrapper img {
      transform: scale(1.05);
    }

    .progress-wrapper {
      margin-bottom: 25px;
      position: relative;
    }

    .custom-progress {
      height: 16px;
      background-color: #ffe4e6;
      /* Light pink background */
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
    }

    .progress-label {
      font-size: 12px;
      font-weight: 700;
      color: #555;
      z-index: 2;
    }

    .card-actions {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: auto;
      /* Pushes footer to bottom if content varies */
    }

    .read-more {
      color: #0d6efd;
      /* Blue */
      text-decoration: none;
      font-weight: 500;
      font-size: 0.95rem;
    }

    .read-more:hover {
      text-decoration: underline;
    }

    /* ===== Transparency (High-Fidelity) ===== */
    .transparency-hero-inner{
      position: relative;
      border-radius: 20px;
      overflow: hidden;
      background: rgba(255,255,255,0.06);
      isolation: isolate;
    }
    .transparency-hero-inner::before{
      content:"";
      position:absolute; inset:0;
      background:
        linear-gradient( to bottom right, rgba(0,0,0,0.3), rgba(0,0,0,0.45) ),
        url('{{ asset("public/images/last1.jpeg") }}') center/cover no-repeat;
      opacity:.18;
      z-index:-1;
    }
    .donut-wrap{
      display:flex; align-items:center; justify-content:center;
      min-height: 280px;
    }
    .donut{
      width: 240px; height: 240px;
      transform: rotate(-90deg);
    }
    .donut .track{
      stroke: #e5e7eb; stroke-width: 22; fill: none;
    }
    .donut .ring{
      stroke: var(--accent); stroke-width: 22; fill: none;
      stroke-linecap: round; transition: stroke-dasharray .6s ease;
    }
    .donut-legend{
      display:flex; gap:14px; flex-wrap:wrap; margin-top: 10px;
    }
    .donut-legend .item{ display:flex; align-items:center; gap:8px; font-weight:600; color:#fff; }
    .donut-legend .swatch{ width:12px; height:12px; border-radius:3px; background: var(--accent); }
    .donut-legend .swatch.secondary{ background:#374151; }
    .reports-grid{
      display:grid; grid-template-columns: repeat( auto-fit, minmax(220px, 1fr) );
      gap:16px;
    }
    .report-card{
      background:#fff; border:1px solid #e5e7eb; border-radius:14px; padding:18px;
      box-shadow: 0 10px 22px rgba(0,0,0,0.06);
      display:flex; align-items:center; gap:12px; justify-content:space-between;
    }
    .report-card .meta{ display:flex; align-items:center; gap:12px; }
    .report-card i{ color:#EF4444; }
    .impact-timeline{
      position:relative; padding-top: 18px; margin-top: 8px;
    }
    .impact-timeline::before{
      content:""; position:absolute; top:0; left:0; right:0; height:4px;
      background: linear-gradient(90deg, var(--accent), rgba(249,115,22,0.2));
      border-radius: 999px;
    }
    .impact-timeline .counter-box{
      background:#fff; position:relative;
    }
    @media (max-width: 767.98px){
      .donut{ width: 200px; height:200px; }
    }
    /* Glassmorphism card */
    .glass-card{
      background: rgba(255,255,255,0.55);
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      border: 1px solid rgba(229,231,235,0.7);
      border-radius: 16px;
      box-shadow: 0 12px 30px rgba(0,0,0,0.08);
    }
    /* Category minimalist cards */
    .cat-grid{ display:grid; grid-template-columns: repeat( auto-fit, minmax(140px,1fr) ); gap:14px; }
    .cat-card{
      background:#fff; border:1px solid #e5e7eb; border-radius:14px; padding:16px;
      display:flex; flex-direction:column; align-items:center; gap:10px; text-decoration:none;
      transition: transform .2s ease, box-shadow .2s ease, border-color .2s ease;
    }
    .cat-card i{ color:#374151; opacity:.9; }
    .cat-card span{ color:#111827; font-weight:600; font-size:.95rem; text-align:center; }
    .cat-card:hover{
      transform: translateY(-4px);
      border-color: rgba(249,115,22,0.45);
      box-shadow: 0 10px 24px rgba(0,0,0,0.06);
    }
    .trust-seal{
      display:inline-flex; align-items:center; gap:8px;
      background:#fff; border:1px solid #e5e7eb; color:#111827;
      padding:8px 12px; border-radius:10px; box-shadow:0 8px 18px rgba(0,0,0,.05);
      position:absolute; inset-inline-end:16px; top:16px;
    }
    .btn-donate {
      background-color: #ff9800;
      /* Orange */
      color: #000;
      /* Dark text */
      border: none;
      border-radius: 20px;
      padding: 8px 24px;
      font-weight: 600;
      font-size: 0.95rem;
      transition: background-color 0.2s ease;
    }

    .btn-donate:hover {
      background-color: #e68900;
    }

    /* Specific alignment tweaks */
    .header-title-wrapper {
      display: flex;
      flex-direction: column;
      justify-content: center;
    }





    .header-title-wrapper {
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    /* sm */
    @media (min-width: 768px) {
    }

    /* md */
    @media (min-width: 1024px) {
    }

    /* lg */

    /* تمييز السطر الأخير */
    .highlight {
      font-weight: 600;
      display: block;
      margin-top: 0.5rem;
    }

    .about-section-wrapper {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }


    .section-eyebrow {
      letter-spacing: 0.1em;
      font-size: 30px;
      font-weight: bold;
      color: rgb(0, 0, 0);
    }

    .section-title {
      font-family: var(--heading-font);
      font-weight: 600;
      font-size: clamp(1.9rem, 2.4vw, 2.3rem);
      letter-spacing: 0.03em;
    }

    .section-subtitle {
      font-size: 0.98rem;
      color: var(--text-muted-soft);
      max-width: 520px;
    }

    .about-card {
      border-radius: var(--card-radius);
      background-color: #ffffff;
      border: none;
      box-shadow: 0 18px 45px rgba(0, 0, 0, 0.04);
      padding: 1.75rem 1.7rem 1.7rem;
      height: 100%;
      display: flex;
      flex-direction: column;
      min-height: 560px;

    }

    .about-card-title {
      font-family: var(--heading-font);
      font-size: 1.2rem;
      margin-bottom: 0.75rem;
      letter-spacing: 0.08em;
      text-transform: uppercase;
      color: rgb(0, 0, 0);
    }

    .im img {
      background: radial-gradient(circle at top left, #fdf2e3 0, #f3d3a7 32%, #f5e2c5 55%, #ffffff 100%);
      border-radius: 15px;
      width: 100%;
      height: 220px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 1.1rem;
      object-fit: cover;
    }

    .ima img {
      background: radial-gradient(circle at top left, #fdf2e3 0, #f3d3a7 32%, #f5e2c5 55%, #ffffff 100%);
      border-radius: 15px;
      width: 100%;
      height: 220px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 1.1rem;
      object-fit: cover;
    }

    .about-text {
      font-size: 0.9rem;
      line-height: 1.7;
      color: rgb(0, 0, 0);
    }

    .value-item {
      display: flex;
      align-items: flex-start;
      gap: 0.8rem;
      font-size: 0.9rem;
      color: #4f453a;
    }

    .value-item-icon {
      width: 40px;
      height: 40px;
      border-radius: 999px;
      background-color: #fdf2e3;
      display: flex;
      align-items: center;
      justify-content: center;
      color: rgb(0, 0, 0);
      flex-shrink: 0;
    }

    .value-item+.value-item {
      margin-top: 0.7rem;
    }

    .value-label {
      font-weight: 600;
      margin-bottom: 0.05rem;
      color: rgb(0, 0, 0);
    }

    .muted-caption {
      font-size: 0.78rem;
      text-transform: uppercase;
      letter-spacing: 0.12em;
      color: #9c8d7d;
    }

    .history-placeholder {
      flex: 1;
      display: flex;
      border-radius: 10px;
      border: 1px dashed rgba(176, 153, 128, 0.5);
      color: rgb(0, 0, 0);
      font-size: 0.85rem;
      padding: 1.5rem 1rem;
    }

    @media (max-width: 991.98px) {
      .about-section-wrapper {
        padding-top: 2.5rem;
      }

      .about-card {
        padding: 1.5rem 1.4rem 1.4rem;
      }
    }

    @media (max-width: 575.98px) {
      .about-card {
        border-radius: 20px;
      }


    }

    .news-header {
      display: inline-block;
      background: var(--accent);
      color: #fff;
      padding: 14px 26px;
      font-weight: 800;
      letter-spacing: .2px;
      font-size: clamp(1.2rem, 2.2vw, 1.8rem);
      line-height: 1;
      clip-path: polygon(0% 0%, 94% 0%, 100% 50%, 94% 100%, 0% 100%, 4% 50%);
      border-radius: 12px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, .08);
      margin-bottom: 20px;
    }

    /* News Static Grid */
    .news-static-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 30px;
      margin-top: 40px;
    }

    .news-card {
      background: #ffffff;
      border: 1px solid #e5e7eb;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      display: flex;
      flex-direction: column;
      height: 100%;
    }

    .news-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
    }

    .news-img-container {
      position: relative;
      width: 100%;
      aspect-ratio: 16 / 9;
      overflow: hidden;
      background: #f3f4f6;
    }

    .news-img-container img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.5s ease;
    }

    .news-card:hover .news-img-container img {
      transform: scale(1.1);
    }

    .news-content {
      padding: 24px;
      display: flex;
      flex-direction: column;
      flex-grow: 1;
    }

    .news-meta {
      font-size: 0.85rem;
      color: #71717a;
      margin-bottom: 10px;
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .news-category {
      color: #f97316;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      position: relative;
    }

    .news-category::before {
      content: "•";
      margin-right: 8px;
      color: #d1d5db;
    }

    [dir="rtl"] .news-category::before {
      margin-right: 0;
      margin-left: 8px;
    }

    .news-title {
      font-size: 1.35rem;
      font-weight: 800;
      color: #111827;
      margin-bottom: 12px;
      line-height: 1.4;
    }

    .news-excerpt {
      font-size: 0.95rem;
      color: #4b5563;
      line-height: 1.6;
      display: -webkit-box;
      -webkit-line-clamp: 3;
      -webkit-box-orient: vertical;
      overflow: hidden;
      margin-bottom: 24px;
    }

    .news-footer {
      margin-top: auto;
    }

    .read-more-btn {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 10px 22px;
      background-color: #f97316;
      color: white !important;
      border-radius: 12px;
      font-weight: 700;
      text-decoration: none !important;
      transition: all 0.3s ease;
      font-size: 0.9rem;
      box-shadow: 0 4px 12px rgba(249, 115, 22, 0.2);
    }
    .read-more-btn:hover {
      background-color: #ea580c;
      transform: translateX(5px);
      box-shadow: 0 6px 16px rgba(249, 115, 22, 0.4);
    }
    [dir="rtl"] .read-more-btn:hover { transform: translateX(-5px); }

    /* ── Navbar Glass Effect ── */
    #ma-navbar {
      transition: all 0.4s ease;
    }
    #ma-navbar.scrolled {
      background: rgba(28, 25, 23, 0.85) !important;
      backdrop-filter: blur(12px) !important;
      -webkit-backdrop-filter: blur(12px) !important;
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    /* ── 3D & Interactive Skills ── */
    #programs .row, .news-static-grid {
      perspective: 1000px; /* Enables 3D space for cards */
    }

    .program-card, .news-card {
      position: relative;
      transform-style: preserve-3d;
      will-change: transform;
      transition: box-shadow 0.3s ease;
    }

    /* Dynamic Glare Overlay */
    .ma-glare {
      position: absolute;
      inset: 0;
      pointer-events: none;
      background: radial-gradient(circle at var(--x) var(--y), rgba(255,255,255,0.15) 0%, rgba(255,255,255,0) 80%);
      opacity: 0;
      transition: opacity 0.3s ease;
      z-index: 10;
      border-radius: inherit;
    }
    .program-card:hover .ma-glare, .news-card:hover .ma-glare {
      opacity: 1;
    }

    /* ── News Card Skill ── */
    .news-card {
      background: #fff;
      border-radius: 16px;
      overflow: hidden;
      border: 1px solid rgba(0,0,0,0.05);
    }
    .news-card:hover {
      box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
    }
    .news-card:hover .news-img-container img {
      transform: scale(1.08);
    }

    /* ── Reveal Classes ── */
    .reveal-item { opacity: 0; transform: translateY(50px); filter: blur(5px); }

    /* ── Pulse Animation (Donate Button) ── */
    @keyframes ma-heartbeat {
      0% { transform: scale(1); box-shadow: 0 0 0 0 rgba(230, 57, 70, 0.5); }
      50% { transform: scale(1.05); box-shadow: 0 0 0 12px rgba(230, 57, 70, 0); }
      100% { transform: scale(1); box-shadow: 0 0 0 0 rgba(230, 57, 70, 0); }
    }
    .ma-donate-btn {
      animation: ma-heartbeat 2.5s infinite ease-in-out;
    }
    .ma-donate-btn:hover {
      animation: none; /* Stop pulsing on hover for focus */
    }

    .read-more-btn:hover {
      background-color: #ea580c;
      transform: translateX(5px);
      box-shadow: 0 6px 16px rgba(249, 115, 22, 0.3);
    }

    [dir="rtl"] .read-more-btn:hover {
      transform: translateX(-5px);
    }

    /* Mobile Responsive */
    @media (max-width: 1024px) {
      .news-static-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
      }
    }

    @media (max-width: 768px) {
      .news-static-grid {
        grid-template-columns: 1fr;
        gap: 25px;
      }
    }

    .custom-navbar {
      /* اجعل الخلفية شفافة مع نسبة بسيطة من اللون الأبيض أو الرمادي لظهور تأثير الـ Blur */
      background-color: hsla(0, 0%, 100%, 0.1);

      /* تفعيل التغبيش */
      backdrop-filter: blur(10px);

      /* الانتقالات السلسة */
      transition: background-color 0.4s ease, backdrop-filter 0.4s ease;
    }

    .custom-navbar.scrolled {
      background-color: rgba(0, 0, 0, 0.85);
      backdrop-filter: blur(10px);
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
    }

    .custom-navbar .nav-link {
      color: #ffffff !important;
      /* أبيض عشان تبان فوق الهيرو */
      font-weight: 500;
      position: relative;
    }

    .custom-navbar .nav-link:hover {
      color: #f97316 !important;
    }

    .contact-form-section {
      background-color: #ffffff !important;
    }

    .contact-info-section {
      background-color: #f15a24 !important;
      color: white !important;
    }

    .contact-info-section h5,
    .contact-info-section p,
    .contact-info-section a {
      color: white !important;
    }

    .contact-info-section .social-icons a {
      color: white !important;
      opacity: 0.8;
      transition: opacity 0.3s;
    }

    .contact-info-section .social-icons a:hover {
      opacity: 1;
    }

    /* Form input styling */
    .form-control,
    .form-select {
      background-color: #f8f9fa !important;
      border: 1px solid #dee2e6 !important;
      padding: 0.75rem 1rem;
    }

    .form-control:focus,
    .form-select:focus {
      background-color: #f8f9fa !important;
      border-color: #86b7fe !important;
      box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25) !important;
    }

    /* Green button styling */
    .btn-green {
      background-color: #10b981 !important;
      border-color: #10b981 !important;
      color: white !important;
      border-radius: 0.5rem !important;
      padding: 0.75rem 1.5rem;
      transition: background-color 0.3s;
    }

    .btn-green:hover {
      background-color: #4a6b60 !important;
      border-color: #0ea572 !important;
      color: white !important;
    }

    .contact-card {
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1) !important;
    }

    /* Responsive adjustments */
    @media (max-width: 767.98px) {
      .contact-card {
        border-radius: 1rem !important;
      }
    }
    /* Partnerships Section */
    .partners-section {
        padding: 6rem 0;
        background: white;
        position: relative;
        overflow: hidden;
    }

    .partners-section::before {
        content: '';
        position: absolute;
        top: -50px;
        right: -50px;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(42, 157, 143, 0.04) 0%, transparent 70%);
        border-radius: 50%;
    }
    
    [dir="rtl"] .partners-section::before {
        right: auto;
        left: -50px;
    }

    .partner-category-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1a3c2f;
        margin-bottom: 2.5rem;
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .partner-category-title i {
        width: 45px;
        height: 45px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
    }

    .partner-card {
        background: white;
        border: 1px solid rgba(0,0,0,0.05);
        border-radius: 16px;
        padding: 2.5rem 1.5rem;
        text-align: center;
        box-shadow: 0 5px 20px rgba(0,0,0,0.02);
        height: 100%;
        transition: all 0.4s ease;
        position: relative;
        z-index: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 1.2rem;
    }

    .partner-card.ngo:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 35px rgba(249, 115, 22, 0.08);
        border-color: rgba(249, 115, 22, 0.2);
    }
    
    .partner-card.gov:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 35px rgba(45, 122, 95, 0.08);
        border-color: rgba(45, 122, 95, 0.2);
    }

    .partner-icon-placeholder {
        width: 75px;
        height: 75px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.2rem;
        transition: all 0.4s ease;
    }
    
    .partner-card.ngo .partner-icon-placeholder {
        background: rgba(249, 115, 22, 0.05);
        color: #f97316;
    }
    
    .partner-card.gov .partner-icon-placeholder {
        background: rgba(45, 122, 95, 0.05);
        color: #2d7a5f;
    }

    .partner-card.ngo:hover .partner-icon-placeholder {
        transform: scale(1.1);
        background: #f97316;
        color: white;
    }
    
    .partner-card.gov:hover .partner-icon-placeholder {
        transform: scale(1.1);
        background: #2d7a5f;
        color: white;
    }

    .partner-name {
        font-size: 1.15rem;
        font-weight: 700;
        color: #1a3c2f;
        margin: 0;
        line-height: 1.5;
    }
  </style>
</head>

<body>

  <!-- NAV -->
  <style>
    /* ===== MAMA AFRICA HEADER ===== */
    :root {
      --nav-accent:   #E8882A;
      --nav-brand:    #FFF5E6;
      --nav-tagline:  #D4A96A;
      --nav-link:     rgba(255,245,230,0.88);
      --nav-bg-scroll: rgba(36,20,10,0.93);
      --font-en: 'Poppins', sans-serif;
      --font-ar: 'Cairo', sans-serif;
    }
    #ma-navbar {
      position: fixed;
      top: 0; inset-inline-start: 0;
      width: 100%;
      z-index: 1000;
      transition: background 0.35s ease, backdrop-filter 0.35s ease, box-shadow 0.35s ease;
    }
    #ma-navbar.scrolled {
      background: var(--nav-bg-scroll) !important;
      backdrop-filter: blur(14px);
      box-shadow: 0 2px 20px rgba(0,0,0,0.35);
    }
    .ma-nav-inner {
      max-width: 1280px;
      margin: 0 auto;
      padding: 0 1rem;
      height: 80px;
      display: flex;
      align-items: center;
      justify-content: flex-start;
      gap: 1.5rem;
    }
    /* ── Logo area ── */
    .ma-logo-wrap {
      display: flex;
      align-items: center;
      gap: 0.75rem;
      text-decoration: none;
      flex-shrink: 0;
    }
    .ma-logo-img {
      width: 58px;
      height: 58px;
      border-radius: 50%;
      object-fit: cover;
      flex-shrink: 0;
      filter: drop-shadow(0 2px 8px rgba(0,0,0,0.35));
      transition: transform 0.3s ease;
    }
    .ma-logo-wrap:hover .ma-logo-img { transform: scale(1.05); }
    .ma-brand-block {
      display: flex;
      flex-direction: column;
      justify-content: center;
      line-height: 1.15;
      position: relative;
    }
    .ma-brand-name {
      font-family: var(--font-en);
      font-weight: 700;
      font-size: 1.3rem;
      color: var(--nav-brand);
      letter-spacing: 0.01em;
    }
    [dir="rtl"] .ma-brand-name { font-family: var(--font-ar); font-size: 1.25rem; }
    .ma-tagline {
      font-family: var(--font-en);
      font-style: italic;
      font-weight: 400;
      font-size: 0.68rem;
      color: var(--nav-tagline);
      letter-spacing: 0.02em;
      margin-top: 1px;
      white-space: nowrap;
      position: absolute;
      top: 100%;
      inset-inline-start: 0;
    }
    [dir="rtl"] .ma-tagline {
      font-family: var(--font-ar);
      font-style: normal;
      font-size: 0.72rem;
    }
    /* ── Desktop nav links ── */
    .ma-nav-links {
      display: flex;
      align-items: center;
      gap: 0.05rem;
      list-style: none;
      margin: 0; padding: 0;
    }
    .ma-nav-links a {
      font-family: var(--font-en);
      font-weight: 500;
      font-size: 0.75rem;
      color: var(--nav-link);
      text-decoration: none;
      padding: 0.25rem 0.4rem;
      border-radius: 6px;
      position: relative;
      transition: color 0.2s;
      display: flex;
      align-items: center;
      gap: 0.2rem;
      white-space: nowrap;
    }
    [dir="rtl"] .ma-nav-links a { font-family: var(--font-ar); font-size: 0.85rem; }
    .ma-nav-links a::after {
      content: "";
      position: absolute;
      bottom: -2px;
      inset-inline-start: 0;
      width: 0;
      height: 2px;
      background: var(--nav-accent);
      border-radius: 2px;
      transition: width 0.3s ease;
    }
    .ma-nav-links a:hover { color: var(--nav-accent); }
    .ma-nav-links a:hover::after { width: 100%; }
    /* ── Language switcher ── */
    .ma-lang-btn {
      display: flex;
      align-items: center;
      gap: 0.4rem;
      background: rgba(255,245,230,0.12);
      border: 1px solid rgba(255,245,230,0.25);
      color: var(--nav-brand);
      font-family: var(--font-en);
      font-size: 0.78rem;
      font-weight: 600;
      padding: 0.35rem 1rem;
      border-radius: 999px;
      cursor: pointer;
      transition: background 0.2s, border-color 0.2s;
      white-space: nowrap;
      flex-shrink: 0;
    }
    .ma-lang-btn:hover {
      background: rgba(232,136,42,0.2);
      border-color: var(--nav-accent);
      color: #fff;
    }
    /* ── Donate button ── */
    .ma-donate-btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
      background-color: #E63946;
      color: #fff !important;
      font-family: var(--font-en);
      font-size: 0.85rem;
      font-weight: 700;
      padding: 0.45rem 1.25rem;
      border-radius: 999px;
      text-decoration: none !important;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      box-shadow: 0 4px 12px rgba(230, 57, 70, 0.25);
      white-space: nowrap;
      animation: pulse-red 3s infinite;
    }
    @keyframes pulse-red {
      0% { box-shadow: 0 0 0 0 rgba(230, 57, 70, 0.4); }
      70% { box-shadow: 0 0 0 10px rgba(230, 57, 70, 0); }
      100% { box-shadow: 0 0 0 0 rgba(230, 57, 70, 0); }
    }
    [dir="rtl"] .ma-donate-btn { font-family: var(--font-ar); font-size: 0.95rem; }
    .ma-donate-btn:hover {
      background-color: #d62839;
      transform: translateY(-2px) scale(1.05);
      box-shadow: 0 6px 16px rgba(230, 57, 70, 0.35);
      color: #fff !important;
      animation: none;
    }
    .ma-donate-btn:active {
      transform: translateY(0) scale(0.98);
    }
    #ma-mobile-menu .ma-donate-btn {
      width: 100%;
      margin-top: 0.5rem;
      margin-bottom: 0.5rem;
      padding: 0.75rem 1rem;
    }
    /* ── Mobile hamburger ── */
    .ma-hamburger {
      display: none;
      background: none;
      border: none;
      color: var(--nav-brand);
      font-size: 1.6rem;
      cursor: pointer;
      padding: 0.25rem;
      line-height: 1;
    }
    /* ── Mobile menu ── */
    #ma-mobile-menu {
      display: none;
      background: var(--nav-bg-scroll);
      backdrop-filter: blur(12px);
      padding: 1rem 1.5rem 1.5rem;
      border-top: 1px solid rgba(255,245,230,0.08);
    }
    #ma-mobile-menu.open { display: block; }
    #ma-mobile-menu a {
      display: flex;
      align-items: center;
      gap: 0.6rem;
      padding: 0.65rem 0.75rem;
      border-radius: 8px;
      color: var(--nav-link);
      font-family: var(--font-en);
      font-weight: 500;
      font-size: 0.9rem;
      text-decoration: none;
      transition: background 0.2s, color 0.2s;
    }
    [dir="rtl"] #ma-mobile-menu a { font-family: var(--font-ar); }
    #ma-mobile-menu a:hover { background: rgba(232,136,42,0.15); color: var(--nav-accent); }
    .ma-mobile-lang {
      margin-top: 0.75rem;
      padding-top: 0.75rem;
      border-top: 1px solid rgba(255,245,230,0.1);
    }
    @media (max-width: 1023px) {
      .ma-nav-links { display: none; }
      .ma-hamburger { display: block; }
    }
    @media (max-width: 639px) {
      .ma-btn-text { display: none; }
      .ma-donate-btn, .ma-lang-btn { 
        padding-left: 0.75rem;
        padding-right: 0.75rem;
        gap: 0;
      }
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

  <nav id="ma-navbar" aria-label="Primary Navigation">
    <div class="ma-nav-inner">

      <!-- ── Logo ── -->
      <a href="{{ route('home') }}" class="ma-logo-wrap" aria-label="Mama Africa Home">
        <img src="{{ isset($hero) && $hero->logo ? url('/media/'.$hero->logo) : asset('images/favicon-org.png') }}" class="ma-logo-img" alt="Organization Logo" />
        <div class="ma-brand-block">
          <span class="ma-brand-name">{{ app()->getLocale() === 'ar' ? ($hero->org_name_ar ?? ($settings['site_name_ar'] ?? __('massage.brand'))) : ($hero->org_name_en ?? ($settings['site_name_en'] ?? __('massage.brand'))) }}</span>
          <span class="ma-tagline">
            {{ app()->getLocale() === 'ar'
              ? ($hero->tagline_ar ?? 'نُمكّن المجتمعات في أفريقيا')
              : ($hero->tagline_en ?? 'Empowering Communities Across Africa') }}
          </span>
        </div>
      </a>

      <!-- ── Desktop Nav Links ── -->
      <ul class="ma-nav-links" role="menubar">
        <li><a href="{{ route('home') }}" role="menuitem"><i class="fa-solid fa-house fa-xs" aria-hidden="true"></i> {{ __('massage.homeLink') }}</a></li>
        <li><a href="#about" role="menuitem"><i class="fa-solid fa-circle-info fa-xs" aria-hidden="true"></i> {{ __('massage.ab') }}</a></li>
        <li><a href="#locations-section" role="menuitem"><i class="fa-solid fa-map-location-dot fa-xs" aria-hidden="true"></i> {{ __('massage.locations') }}</a></li>
        <li><a href="#projects" role="menuitem"><i class="fa-solid fa-diagram-project fa-xs" aria-hidden="true"></i> {{ __('massage.projects') }}</a></li>
        <li><a href="#members" role="menuitem"><i class="fa-solid fa-users fa-xs" aria-hidden="true"></i> {{ __('massage.members') }}</a></li>
        <li><a href="#transparency" role="menuitem"><i class="fa-solid fa-magnifying-glass fa-xs" aria-hidden="true"></i> {{ __('massage.trans') }}</a></li>
        <li><a href="#Impacts" role="menuitem"><i class="fa-solid fa-comment-dots fa-xs" aria-hidden="true"></i> {{ __('massage.impacts') }}</a></li>
        <li><a href="#lastnews" role="menuitem"><i class="fa-solid fa-newspaper fa-xs" aria-hidden="true"></i> {{ __('massage.news') }}</a></li>
        <li><a href="#partners" role="menuitem"><i class="fa-solid fa-handshake fa-xs" aria-hidden="true"></i> {{ app()->getLocale() == 'ar' ? 'الشركاء' : 'Partners' }}</a></li>
        <li><a href="#contact" role="menuitem"><i class="fa-solid fa-envelope fa-xs" aria-hidden="true"></i> {{ __('massage.conta') }}</a></li>
      </ul>

      <div style="display:flex;align-items:center;gap:0.4rem;flex-shrink:0;margin-inline-start: auto;">
        <!-- Donate Button -->
        <a href="{{ route('donate') }}" class="ma-donate-btn" aria-label="{{ __('massage.donate_now') }}">
          <i class="fa-solid fa-heart-pulse"></i>
          <span class="ma-btn-text">{{ __('massage.donate_now') }}</span>
        </a>
        <!-- Language Button -->
        <button onclick="toggleLanguage()" class="ma-lang-btn" aria-label="Toggle Language">
          <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 3v18M3 12h18M5.6 5.6C8.1 7.1 9 12 9 12s.9 4.9 3.4 6.4M18.4 5.6c-2.5 1.5-3.4 6.4-3.4 6.4s-.9 4.9-3.4 6.4"/></svg>
          <span class="ma-btn-text">{{ app()->getLocale() === 'ar' ? 'English' : 'العربية' }}</span>
        </button>
        <!-- Hamburger -->
        <button class="ma-hamburger" onclick="maMobileToggle()" aria-label="Toggle menu" aria-expanded="false" aria-controls="ma-mobile-menu">
          <i class="fa-solid fa-bars"></i>
        </button>
      </div>

    </div>

    <!-- ── Mobile Menu ── -->
    <div id="ma-mobile-menu" role="menu" aria-label="Mobile Navigation">
      <a href="{{ route('home') }}" role="menuitem"><i class="fa-solid fa-house fa-sm"></i> {{ __('massage.homeLink') }}</a>
      <a href="{{ route('home') }}#about" role="menuitem"><i class="fa-solid fa-circle-info fa-sm"></i> {{ __('massage.ab') }}</a>
      <a href="{{ route('home') }}#locations-section" role="menuitem"><i class="fa-solid fa-map-location-dot fa-sm"></i> {{ __('massage.locations') }}</a>
      <a href="{{ route('home') }}#projects" role="menuitem"><i class="fa-solid fa-diagram-project fa-sm"></i> {{ __('massage.projects') }}</a>
      <a href="{{ route('home') }}#members" role="menuitem"><i class="fa-solid fa-users fa-sm"></i> {{ __('massage.members') }}</a>
      <a href="{{ route('home') }}#transparency" role="menuitem"><i class="fa-solid fa-magnifying-glass fa-sm"></i> {{ __('massage.trans') }}</a>
      <a href="{{ route('home') }}#Impacts" role="menuitem"><i class="fa-solid fa-comment-dots fa-sm"></i> {{ __('massage.impacts') }}</a>
      <a href="{{ route('home') }}#lastnews" role="menuitem"><i class="fa-solid fa-newspaper fa-sm"></i> {{ __('massage.news') }}</a>
      <a href="{{ route('home') }}#partners" role="menuitem"><i class="fa-solid fa-handshake fa-sm"></i> {{ app()->getLocale() == 'ar' ? 'الشركاء' : 'Partners' }}</a>
      <a href="{{ route('home') }}#contact" role="menuitem"><i class="fa-solid fa-envelope fa-sm"></i> {{ __('massage.conta') }}</a>
      <a href="{{ route('donate') }}" class="ma-donate-btn" role="menuitem">
        <i class="fa-solid fa-heart-pulse"></i>
        {{ __('massage.donate_now') }}
      </a>
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
    
    // ── Navbar scroll effect ──
    (function(){
      var nav = document.getElementById('ma-navbar');
      function onScroll(){ nav.classList.toggle('scrolled', window.scrollY > 30); }
      window.addEventListener('scroll', onScroll, {passive:true});
      onScroll();
    })();
    
    // ── Mobile menu toggle ──
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


  <!-- HERO -->
  <section class="relative min-h-[100svh] flex items-center justify-center overflow-hidden bg-stone-950" aria-label="Hero Section">
    <!-- Background Image -->
    <img src="{{ isset($hero) && $hero->image ? url('/media/' . $hero->image) : asset('images/ray.png') }}" 
         alt="Hero background showing Mama Africa's work in Darfur" 
         class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000"
         style="opacity: 0;"
         onload="this.style.opacity = 1"
         id="hero-bg-img"
         loading="eager"
         fetchpriority="high"
         decoding="async">
    <script>
      (function(){
        var img = document.getElementById('hero-bg-img');
        if (img && img.complete) { img.style.opacity = 1; }
      })();
    </script>
    
    <!-- Dark Gradient Overlay for better contrast -->
    <div class="absolute inset-0 bg-gradient-to-t from-stone-900/90 via-stone-900/60 to-stone-900/40" aria-hidden="true"></div>

    <!-- Content Container -->
    <div class="relative z-10 w-full max-w-7xl mx-auto px-6 lg:px-8 py-24 md:py-32 hero flex flex-col items-start gap-8 mt-16">
      <!-- Main Title -->
      <h1 class="text-white font-bold text-2xl sm:text-5xl lg:text-7xl leading-tight max-w-3xl drop-shadow-md" data-i18n="home.hero.title">
        {{ isset($hero) && $hero->{'title_' . app()->getLocale()} ? $hero->{'title_' . app()->getLocale()} : __('massage.hero_title') }}
      </h1>
      
      <!-- Subtitle -->
      <div class="w-full max-w-2xl border-s-4 border-[#F59E0B] ps-4 sm:ps-6 py-1 bg-stone-900/30 backdrop-blur-sm rounded-e-lg shadow-sm">
        <p class="font-medium text-base sm:text-lg md:text-xl leading-relaxed max-w-[65ch]" style="color: #FFB347; text-shadow: 1px 1px 3px rgba(0,0,0,0.8), 0 0 10px rgba(0,0,0,0.5);" data-i18n="home.hero.desc">
            {{ isset($hero) && $hero->{'description_' . app()->getLocale()} ? $hero->{'description_' . app()->getLocale()} : __('massage.hero_desc') }}
        </p>
      </div>

      <!-- Action Button (Optional/Commented Out but ready) -->
      <!-- <div class="mt-4">
          <button onclick="scrollTo('#programs')" class="bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 px-8 rounded-full shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all duration-300 focus:ring-2 focus:ring-orange-400 focus:outline-none" aria-label="Donate Now" data-i18n="nav.donate">
            Donate Now
          </button>
      </div> -->

    </div>
  </section>


  <section id="about" style="scroll-margin-top: 80px;">



    <main class="about-section-wrapper py-2">
      <div class="container mb-5 pb-lg-5">
        <div class="row justify-content-center mb-4">
          <div class="col-12">
            <div class="section-eyebrow text-center reveal-item" data-i18n="about.title">{{ __('massage.about.title') }}</div>
          </div>
        </div>

        <div class="row g-4">
          <!-- Column 1: Our Vision -->
          <div class="col-12 col-sm-6 col-lg-3 reveal-item">
            <article class="about-card h-100">
              <header class="mb-1 text-center">
                <h2 class="about-card-title mb-3" data-i18n="about.vision.title">{{ isset($about) && $about->{'vision_title_' . app()->getLocale()} ? $about->{'vision_title_' . app()->getLocale()} : __('massage.about.vision.title') }}</h2>
              </header>
              <div class="im">
                <img src="{{ isset($about) && $about->vision_image ? url('/media/' . $about->vision_image) : asset('images/1.jpg') }}" alt="">
              </div>
              <p class="about-text mb-0" data-i18n="about.vision.desc">
{{ isset($about) && $about->{'vision_desc_' . app()->getLocale()} ? $about->{'vision_desc_' . app()->getLocale()} : __('massage.about.vision.desc') }}              </p>
            </article>
          </div>

          <!-- Column 2: Our Value -->
          <div class="col-12 col-sm-6 col-lg-3">
            <article class="about-card h-100">
              <header class="mb-1 text-center">
                <h2 class="about-card-title mb-3" data-i18n="about.value.title">{{ isset($about) && $about->{'value_title_' . app()->getLocale()} ? $about->{'value_title_' . app()->getLocale()} : __('massage.about.value.title') }}</h2>
              </header>
              <div class="ima mb-3">
                <img src="{{ isset($about) && $about->value_image ? url('/media/' . $about->value_image) : asset('images/3.jpg') }}" alt="" style="width:100%;height:220px;object-fit:cover;border-radius:15px;">
              </div>

              <div class="d-flex flex-column gap-2 mt-1">
                <div class="value-item">
                  <div class="value-item-icon">
                    <i class="bi bi-people-fill"></i>
                  </div>
                  <div>
                    <div class="value-label" data-i18n="about.value.participation">{{ isset($about) && $about->{'value_participation_' . app()->getLocale()} ? $about->{'value_participation_' . app()->getLocale()} : __('massage.about.value.participation') }}</div>
                    <div data-i18n="about.value.participation.desc">{{ isset($about) && $about->{'value_participation_desc_' . app()->getLocale()} ? $about->{'value_participation_desc_' . app()->getLocale()} : __('massage.about.value.participation_desc') }}</div>
                     </div>              
                </div>

                <div class="value-item">
                  <div class="value-item-icon">
                    <i class="fas fa-handshake"></i>
                  </div>
                  <div>
                    <div class="value-label" data-i18n="about.value.integrity">{{ isset($about) && $about->{'value_integrity_' . app()->getLocale()} ? $about->{'value_integrity_' . app()->getLocale()} : __('massage.about.value.integrity') }}</div>
                    <div data-i18n="about.value.integrity.desc">{{ isset($about) && $about->{'value_integrity_desc_' . app()->getLocale()} ? $about->{'value_integrity_desc_' . app()->getLocale()} : __('massage.about.value.integrity_desc') }}</div>
                  </div>
                </div>

                <div class="value-item">
                  <div class="value-item-icon">
                    <i class="bi bi-eye-fill"></i>
                  </div>
                  <div>
                    <div class="value-label" data-i18n="about.value.transparency">{{ isset($about) && $about->{'value_transparency_' . app()->getLocale()} ? $about->{'value_transparency_' . app()->getLocale()} : __('massage.about.value.transparency') }}</div>
                    <div data-i18n="about.value.transparency.desc"> {{ isset($about) && $about->{'value_transparency_desc_' . app()->getLocale()} ? $about->{'value_transparency_desc_' . app()->getLocale()} : __('massage.about.value.transparency_desc') }}</div>
                  </div>
                </div>

                <div class="value-item">
                  <div class="value-item-icon">
                    <i class="bi bi-check-circle-fill"></i>
                  </div>
                  <div>
                    <div class="value-label" data-i18n="about.value.accountability">{{ isset($about) && $about->{'value_accountability_' . app()->getLocale()} ? $about->{'value_accountability_' . app()->getLocale()} : __('massage.about.value.accountability') }}</div>
                    <div data-i18n="about.value.accountability.desc">{{ isset($about) && $about->{'value_accountability_desc_' . app()->getLocale()} ? $about->{'value_accountability_desc_' . app()->getLocale()} : __('massage.about.value.accountability_desc') }}</div>
                  </div>
                </div>


              </div>
            </article>
          </div>

          <!-- Column 3: Our Mission -->
          <div class="col-12 col-sm-6 col-lg-3">
            <article class="about-card h-100">
              <header class="mb-1 text-center">
                <h2 class="about-card-title mb-3" data-i18n="about.mission.title">{{ isset($about) && $about->{'mission_title_' . app()->getLocale()} ? $about->{'mission_title_' . app()->getLocale()} : __('massage.about.mission.title') }}</h2>
              </header>
              <div class="ima">
                <img src="{{ isset($about) && $about->mission_image ? url('/media/' . $about->mission_image) : asset('images/2.jpg') }}" alt="">
              </div>

              <p class="about-text mb-0" data-i18n="about.mission.desc">
{{ isset($about) && $about->{'mission_desc_' . app()->getLocale()} ? $about->{'mission_desc_' . app()->getLocale()} : __('massage.about.mission.desc') }}              </p>
            </article>
          </div>

          <!-- Column 4: Our History -->
          <div class="col-12 col-sm-6 col-lg-3">
            <article class="about-card h-100">
              <header class="mb-1 text-center">
                <h2 class="about-card-title mb-3" data-i18n="about.history.title">{{ isset($about) && $about->{'history_title_' . app()->getLocale()} ? $about->{'history_title_' . app()->getLocale()} : __('massage.about.history.title') }}</h2>
              </header>
              <div class="ima mb-3">
                <img src="{{ isset($about) && $about->history_image ? url('/media/' . $about->history_image) : asset('images/last2.jpeg') }}" alt="" style="width:100%;height:220px;object-fit:cover;border-radius:15px;">
              </div>
              <div class="history-placeholder" data-i18n="about.history.desc">
{{ isset($about) && $about->{'history_desc_' . app()->getLocale()} ? $about->{'history_desc_' . app()->getLocale()} : __('massage.about.history.desc') }}              </div>
            </article>
          </div>

        </div>
        
        <div class="text-center mt-5">
            <a href="{{ route('organization.profile') }}" class="btn px-5 py-3 rounded-3 fw-bold text-white d-inline-flex align-items-center justify-content-center gap-2" style="background: linear-gradient(135deg, #e8763b, #f97316); border: none; box-shadow: 0 4px 15px rgba(232, 118, 59, 0.3); transition: transform 0.3s ease;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
                <i class="fas fa-building"></i> 
                <span>{{ app()->getLocale() == 'ar' ? 'عرض الملف التعريفي للمنظمة' : 'View Organization Profile' }}</span>
                <i class="fas {{ app()->getLocale() == 'ar' ? 'fa-arrow-left' : 'fa-arrow-right' }}" style="font-size: 0.9em; opacity: 0.9;"></i>
            </a>
        </div>
      </div>
      </div>
    </main>
  </section>
  <section class="section-bg" id="projects">
  <div class="container my-5">

    <div class="row justify-content-center g-4">
      <div class="col-12 text-center">
        <h2 class="display-5 fw-bold mb-3"> {{ __('massage.program.title') }}</h2>
        <p class="text-muted mx-auto" style="max-width: 600px;">
  {{ __('massage.sectors_desc') }}        </p>
      </div>
    </div>

    <div class="row g-4">

      @foreach($projects as $project)
        <div class="col-12 col-md-6 col-lg-6">
          <div class="program-card reveal-item">

            <div class="card-header-area">
              <div class="icon-circle">
                <i class="fa-solid fa-book"></i>
              </div>
              <h3 class="card-title">
                {{ $project->name }}
              </h3>
            </div>

            <div class="card-img-wrapper">
              @if($project->image && Storage::disk('public')->exists($project->image))
                <img src="{{ url('/media/' . $project->image) }}" alt="{{ $project->name }}" onerror="this.onerror=null;this.src='{{ $project->fallback_image }}';">
              @else
                <img src="{{ $project->fallback_image }}" alt="{{ $project->name }}" class="object-cover w-full h-full">
              @endif
            </div>

            <div class="card-actions">
              <a href="{{ route('projects.show', $project->id) }}" class="read-more-btn">
               {{ __('massage.read_more') }}
               <i class="fas {{ app()->getLocale() == 'ar' ? 'fa-arrow-left' : 'fa-arrow-right' }}"></i>
              </a>

              <!-- <button class="btn-donate">Donate</button> -->
            </div>
          </div>
        </div>
      @endforeach

    </div>
  </div>
</section>

  <section id="transparency" class="w-100 p-0 m-0 reveal-item" style="background-color: #1c1917; position: relative; overflow: visible; scroll-margin-top: 80px; min-height: 800px;">
      <iframe src="{{ Request::root() }}/transparency" width="100%" height="800px" style="border:none; width: 100%; min-height: 800px; display: block;" title="Transparency Dashboard" id="transparencyIframe"></iframe>
  </section>
  
  <script>
    // Simple script to adjust iframe height if possible
    window.addEventListener('message', function(e) {
      if (e.data.type === 'resizeTransparency') {
        document.getElementById('transparencyIframe').style.height = e.data.height + 'px';
      }
    });
  </script>
  <!--donate-->
  <!-- <section id="donate" class="py-5 bg-light"> 
    <div class="container py-5">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class=" rounded-4 shadow-lg p-4 p-md-5">
            <div class="text-center mb-5">
              <h2 class="fw-bold" data-i18n="donate.title">Make a Donation</h2>
              <p class="text-muted" data-i18n="donate.desc">Your contribution can save lives. Choose an amount below.
              </p>
            </div>

            <form id="donationForm" novalidate>
           
              <div class="mb-4">
                <label class="form-label fw-semibold mb-3" data-i18n="donate.amount">Select Amount</label>
                <div class="row g-3" id="amountOptions">
                  <div class="col-6 col-md-3">
                    <button type="button" class="amount-btn" data-amount="10"
                      data-i18n-impact="donate.impact.meal">$10</button>
                  </div>
                  <div class="col-6 col-md-3">
                    <button type="button" class="amount-btn active" data-amount="50"
                      data-i18n-impact="donate.impact.medicine">$50</button>
                  </div>
                  <div class="col-6 col-md-3">
                    <button type="button" class="amount-btn" data-amount="100"
                      data-i18n-impact="donate.impact.water">$100</button>
                  </div>
                  <div class="col-6 col-md-3">
                    <button type="button" class="amount-btn" data-amount="500"
                      data-i18n-impact="donate.impact.school">$500</button>
                  </div>
                </div>
                <input type="hidden" id="selectedAmount" value="50" required>
              </div>

             
              <div class="alert alert-success mb-4 text-center" id="impactDisplay">
                <i class="fas fa-check-circle me-2"></i> <span data-i18n="donate.impact">Your donation will
                  provide:</span> <strong>1 week of medicine</strong>
              </div>

              <div class="mb-4">
                <label class="form-label" data-i18n="donate.custom">Type of program</label>
                <div class="input-group">
                
                  <select class="form-select" id="programType">
                    <option value="program0" data-i18n="donate.program.select">Select program</option>
                    <option value="program1" data-i18n="donate.program.training">Training workshops</option>
                    <option value="program2" data-i18n="donate.program.water">Clean Water</option>
                    <option value="program3" data-i18n="donate.program.protection">Protection</option>
                    <option value="program4" data-i18n="donate.program.livelihood">Livelihood ways</option>
                    <option value="program5" data-i18n="donate.program.environmental">Environmental sanitation</option>
                    <option value="program6" data-i18n="donate.program.nutrition">Nutrition</option>
                  </select>

                </div>
              </div>


              <div class="row g-3 mb-4">
                <div class="col-md-6">
                  <label class="form-label" data-i18n="donate.fname">First Name</label>
                  <input type="text" class="form-control form-control-lg" required data-i18n="donate.fname.placeholder"
                    placeholder="John">
                  <div class="invalid-feedback" data-i18n="donate.fname.invalid">Please enter your first name.</div>
                </div>
                <div class="col-md-6">
                  <label class="form-label" data-i18n="donate.lname">Last Name</label>
                  <input type="text" class="form-control form-control-lg" required data-i18n="donate.lname.placeholder"
                    placeholder="Doe">
                  <div class="invalid-feedback" data-i18n="donate.lname.invalid">Please enter your last name.</div>
                </div>
                <div class="col-12">
                  <label class="form-label" data-i18n="donate.email">Email Address</label>
                  <input type="email" class="form-control form-control-lg" required data-i18n="donate.email.placeholder"
                    placeholder="john@example.com">
                  <div class="invalid-feedback" data-i18n="donate.email.invalid">Please enter a valid email.</div>
                </div>
              </div>

              <div class="mb-4">
                <label class="form-label" data-i18n="donate.payment">Payment Method</label>
                <div class="d-flex flex-wrap gap-3">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="paymentMethod" id="card" value="card" checked>
                    <label class="form-check-label" for="card" data-i18n="donate.payment.card">
                      <i class="fas fa-credit-card me-1"></i> Card
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="paymentMethod" id="bank" value="bank">
                    <label class="form-check-label" for="bank" data-i18n="donate.payment.bank">
                      <i class="fas fa-university me-1"></i> Bank
                    </label>
                  </div>
                </div>
              </div>

              <button type="submit" class="btn btn-healing-green btn-lg w-100 py-3 rounded-pill shadow">
                <i class="fas fa-lock me-2"></i> <span data-i18n="donate.submit">Donate Now</span>
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
-->





  <section id="lastnews" style="scroll-margin-top: 80px; min-height: 800px;">
    <main class="py-5">
        <section class="container">

            <div class="d-flex justify-content-center">
                <div class="news-header">{{ __('massage.latest_news') }}</div>
            </div>

            <div class="news-static-grid">
                @forelse($news as $item)
                    <article class="news-card reveal-item">
                        <div class="news-img-container">
                            <img src="{{ $item->image ? url('/media/'.$item->image) : $item->fallback_image }}" 
                                 onerror="this.onerror=null;this.src='{{ $item->fallback_image }}';"
                                 alt="{{ $item->title }}"
                                 loading="lazy">
                        </div>
                        <div class="news-content">
                            <div class="news-meta">
                                <span class="news-date">
                                    <i class="far fa-calendar-alt me-1"></i>
                                    {{ ($item->published_at ?? $item->created_at)->translatedFormat('d F Y') }}
                                </span>
                                @if($item->project)
                                    <span class="news-category">
                                        {{ $item->project->name }}
                                    </span>
                                @endif
                            </div>
                            
                            <h3 class="news-title">
                                {{ $item->title }}
                            </h3>
                            
                            <p class="news-excerpt">
                                {{ \Illuminate\Support\Str::limit(strip_tags($item->details), 120) }}
                            </p>
                            
                            <div class="news-footer">
                                <a href="{{ route('dnews.show', $item->id) }}" class="read-more-btn">
                                    {{ __('massage.read_more') }}
                                    <i class="fas {{ app()->getLocale() == 'ar' ? 'fa-arrow-left' : 'fa-arrow-right' }}"></i>
                                </a>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="col-12">
                        <p class="text-center text-muted py-5">No news available</p>
                    </div>
                @endforelse
            </div>

        </section>
    </main>
</section>

  <!--voices & stats-->
  <section id="Impacts" style="background: #fdf6f0; scroll-margin-top: 80px; padding-bottom: 0;">

    <!-- Section Title -->
    <div class="text-center pt-4 pb-1">
      <h2 class="fw-bold mb-1" style="font-size: clamp(1.6rem, 3vw, 2.2rem); color: #1c1917;">
        {{ app()->getLocale() === 'ar' ? 'شهادات المستفيدين وأصواتهم' : 'Beneficiary Testimonials & Voices' }}
      </h2>
      <p class="text-muted mb-2" style="font-size: 0.95rem;">
        {{ app()->getLocale() === 'ar' ? 'قصص حقيقية من مستفيدين حقيقيين' : 'Real stories from real beneficiaries' }}
      </p>
    </div>

    <!-- Testimonials Carousel -->
    <div class="container pb-4">
      <div id="voicesCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          @foreach($testimonials as $key => $testimonial)
          <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
            <div class="d-flex justify-content-center">
              <div class="testimonial-card text-center p-3 shadow-xl rounded-4 w-100"
                   style="max-width: 1100px; min-height: 220px;">
                @if($testimonial->image)
                  <img src="{{ url('/media/'.$testimonial->image) }}"
                       class="testimonial-avatar mb-2 rounded-circle border border-3 border-orange-500 mx-auto d-block"
                       style="width:110px; height:110px; object-fit:cover;">
                @elseif(!$testimonial->video_link)
                  <img src="{{ asset('images/male-icon-vector.jpg') }}"
                       class="testimonial-avatar mb-2 rounded-circle border border-3 border-orange-500 mx-auto d-block"
                       style="width:110px; height:110px; object-fit:cover;">
                @endif
                <h5 class="fw-bold mb-2">{{ $testimonial->name }}</h5>
                <p class="lead fst-italic text-gray-600 px-5">"{{ $testimonial->comment }}"</p>
                @if($testimonial->video_link)
                  <div class="mt-3">
                    <button type="button" 
                       class="btn btn-sm btn-outline-orange px-4 rounded-pill transition-all watch-video-btn"
                       style="border-color: #f97316; color: #f97316;"
                       data-video-url="{{ $testimonial->video_link }}">
                      <i class="fas fa-play-circle me-1"></i> {{ __('massage.program.watch') ?? 'Watch Video' }}
                    </button>
                  </div>
                @endif
              </div>
            </div>
          </div>
          @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#voicesCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bg-dark rounded-circle p-3 shadow-lg"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#voicesCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon bg-dark rounded-circle p-3 shadow-lg"></span>
        </button>
      </div>
    </div><!-- end carousel container -->

    <!-- Statistics Grid -->
    <div style="background: linear-gradient(135deg, #1c1917 0%, #292524 100%); padding: 30px 0 40px;">
      <div class="container">
        <div class="row g-4 text-center">

          <div class="col-6 col-md-3">
            <div style="background: rgba(255,255,255,0.06); border: 1px solid rgba(249,115,22,0.3); border-radius: 16px; padding: 16px 12px;">
              <div class="counter-value" style="font-size: 1.9rem; font-weight: 800; color: #f97316; line-height: 1; margin-bottom: 6px;" 
                   data-target="{{ (isset($statistic) && $statistic->cleanwater_value) ? (int)preg_replace('/[^0-9]/', '', $statistic->cleanwater_value) : 1250 }}">
                0
              </div>
              <div style="font-size: 0.82rem; color: #d4c5b0; font-weight: 500;">
                {{ isset($statistic) && $statistic->{'cleanwater_text_' . app()->getLocale()} ? $statistic->{'cleanwater_text_' . app()->getLocale()} : __('massage.stats.cleanwater_text') }}
              </div>
            </div>
          </div>

          <div class="col-6 col-md-3">
            <div style="background: rgba(255,255,255,0.06); border: 1px solid rgba(249,115,22,0.3); border-radius: 16px; padding: 16px 12px;">
              <div class="counter-value" style="font-size: 1.9rem; font-weight: 800; color: #f97316; line-height: 1; margin-bottom: 6px;" 
                   data-target="{{ (isset($statistic) && $statistic->education_value) ? (int)preg_replace('/[^0-9]/', '', $statistic->education_value) : 850 }}">
                0
              </div>
              <div style="font-size: 0.82rem; color: #d4c5b0; font-weight: 500;">
                {{ isset($statistic) && $statistic->{'education_text_' . app()->getLocale()} ? $statistic->{'education_text_' . app()->getLocale()} : __('massage.stats.education_text') }}
              </div>
            </div>
          </div>

          <div class="col-6 col-md-3">
            <div style="background: rgba(255,255,255,0.06); border: 1px solid rgba(249,115,22,0.3); border-radius: 16px; padding: 16px 12px;">
              <div class="counter-value" style="font-size: 1.9rem; font-weight: 800; color: #f97316; line-height: 1; margin-bottom: 6px;" data-target="{{ isset($statistic) && $statistic->villages_value ? (int)preg_replace('/[^0-9]/', '', $statistic->villages_value) : 0 }}">
                0
              </div>
              <div style="font-size: 0.82rem; color: #d4c5b0; font-weight: 500;">
                {{ isset($statistic) && $statistic->{'villages_text_' . app()->getLocale()} ? $statistic->{'villages_text_' . app()->getLocale()} : __('massage.stats.villages_text') }}
              </div>
            </div>
          </div>

          <div class="col-6 col-md-3">
            <div style="background: rgba(255,255,255,0.06); border: 1px solid rgba(249,115,22,0.3); border-radius: 16px; padding: 16px 12px;">
              <div class="counter-value" style="font-size: 1.9rem; font-weight: 800; color: #f97316; line-height: 1; margin-bottom: 6px;" data-target="{{ isset($statistic) && $statistic->funds_value ? (int)preg_replace('/[^0-9]/', '', $statistic->funds_value) : 0 }}">
                0
              </div>
              <div style="font-size: 0.82rem; color: #d4c5b0; font-weight: 500;">
                {{ isset($statistic) && $statistic->{'funds_text_' . app()->getLocale()} ? $statistic->{'funds_text_' . app()->getLocale()} : __('massage.stats.funds_text') }}
              </div>
            </div>
          </div>

        </div>
      </div>
    </div><!-- end statistics -->

  </section><!-- end #Impacts -->
  
  <!-- Video Modal -->
  <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content bg-stone-900 border-orange-500/30">
        <div class="modal-header border-orange-500/20">
          <h5 class="modal-title text-white" id="videoModalLabel">{{ __('massage.program.watch') ?? 'Watch Video' }}</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-0">
          <div class="ratio ratio-16x9">
            <iframe id="videoIframe" src="" title="Video Player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>






    {{-- Unified Activity Interactive Map Section --}}
    @php
        $locations = clone $locationSettings;
        $isArabic = app()->getLocale() === 'ar';
        $hasLocations = $locations && $locations->count() > 0;
        
        // If no locations exist yet, provide a dummy center
        $defaultLat = 15.5007; // Sudan
        $defaultLng = 32.5599;
    @endphp

    <section class="py-5" style="background: linear-gradient(135deg, #f8f9fa 0%, #e8f4f0 100%); scroll-margin-top: 80px;" id="locations-section">
        <div class="container">

            {{-- Section Header --}}
            <div class="text-center mb-5">
                <span class="badge rounded-pill px-4 py-2 mb-3 fw-semibold shadow-sm"
                      style="background:#e8f4f0; color:#2d7a5f; font-size:0.85rem; letter-spacing:0.5px;">
                    <i class="fas fa-map-marker-alt me-2"></i>
                    {{ $isArabic ? 'مواقعنا' : 'Our Locations' }}
                </span>
                <h2 class="fw-bold" style="color:#1a3c2f;">
                    {{ $isArabic ? 'أماكن عملنا' : 'Our Work Locations' }}
                </h2>
                <div class="mx-auto mt-2" style="width:60px;height:4px;border-radius:2px;background:linear-gradient(90deg,#2d7a5f,#4caf85);"></div>
                <p class="text-muted mt-3">
                    {{ $isArabic ? 'انقر على العلامات في الخريطة لمعرفة تفاصيل نشاطنا في كل موقع.' : 'Click on the map markers to view our activity details in each location.' }}
                </p>
            </div>

            <div class="row justify-content-center g-4">
                {{-- Colorful Location Cards --}}
                <div class="col-lg-12">
                    <div class="row g-3 justify-content-center">
                        @php
                            function getCardColors($index) {
                                $colors = [
                                    ['bg' => '#e8f5e9', 'icon' => '#2e7d32', 'border' => '#c8e6c9'], // Green
                                    ['bg' => '#e3f2fd', 'icon' => '#1565c0', 'border' => '#bbdefb'], // Blue
                                    ['bg' => '#fff3e0', 'icon' => '#ef6c00', 'border' => '#ffe0b2'], // Orange
                                    ['bg' => '#f3e5f5', 'icon' => '#7b1fa2', 'border' => '#e1bee7'], // Purple
                                    ['bg' => '#ffebee', 'icon' => '#c62828', 'border' => '#ffcdd2'], // Red
                                    ['bg' => '#e0f7fa', 'icon' => '#00838f', 'border' => '#b2ebf2'], // Cyan
                                ];
                                return $colors[$index % count($colors)];
                            }
                        @endphp

                        @foreach($locations as $index => $loc)
                            @if($loc->latitude && $loc->longitude)
                                @php 
                                    $palette = getCardColors($index); 
                                    $locName = $isArabic ? $loc->name_ar : $loc->name_en;
                                    $locDesc = $isArabic ? $loc->description_ar : $loc->description_en;
                                @endphp
                                <div class="col-md-4 col-sm-6">
                                    <div class="card h-100 rounded-4 shadow-sm" 
                                         title="{{ $locDesc }}"
                                         style="cursor: pointer; transition: 0.3s; background-color: {{ $palette['bg'] }}; border: 1px solid {{ $palette['border'] }};"
                                         onclick="openMapModal({{ $loc->latitude }}, {{ $loc->longitude }}, {{ \Illuminate\Support\Js::from($locName) }})"
                                         onmouseover="this.style.transform='translateY(-3px)'; this.classList.add('shadow');"
                                         onmouseout="this.style.transform='translateY(0)'; this.classList.remove('shadow');">
                                        <div class="card-body d-flex align-items-center gap-3 p-3">
                                            <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" 
                                                 style="width:45px; height:45px; background-color: rgba(255,255,255,0.7); color: {{ $palette['icon'] }};">
                                                <i class="fas fa-map-marker-alt fs-5"></i>
                                            </div>
                                            <div>
                                                <h6 class="fw-bold mb-1" style="color: {{ $palette['icon'] }};">{{ $locName }}</h6>
                                                <span class="small" style="color: #666;"><i class="fas fa-location-arrow me-1"></i> {{ __('massage.view_on_map') !== 'massage.view_on_map' ? __('massage.view_on_map') : ($isArabic ? 'شاهد على الخريطة' : 'View on map') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </section>

    {{-- Map Modal --}}
    <div class="modal fade" id="locationMapModal" tabindex="-1" aria-labelledby="locationMapModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content rounded-4 border-0 shadow-lg overflow-hidden">
                <div class="modal-header border-bottom-0 py-3" style="background: linear-gradient(135deg, #2d7a5f, #4caf85); color: white;">
                    <h5 class="modal-title fw-bold" id="locationMapModalLabel">
                        <i class="fas fa-globe-africa me-2"></i> <span id="modalLocName">Map</span>
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0" style="background: #e9ecef;">
                    <iframe id="modalMapIframe" width="100%" height="450" frameborder="0" style="border:0; display:block;" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openMapModal(lat, lng, name) {
            document.getElementById('modalLocName').innerText = name;
            // Generate Google Maps embed URL using coordinates
            let mapUrl = `https://maps.google.com/maps?q=${lat},${lng}&t=&z=6&ie=UTF8&iwloc=&output=embed`;
            document.getElementById('modalMapIframe').src = mapUrl;
            
            var mapModal = new bootstrap.Modal(document.getElementById('locationMapModal'));
            mapModal.show();
        }
        
        // Clear iframe source on close to stop loading over and over and avoid carrying over to next click
        document.addEventListener('DOMContentLoaded', function() {
            var myModalEl = document.getElementById('locationMapModal');
            myModalEl.addEventListener('hidden.bs.modal', function (event) {
                document.getElementById('modalMapIframe').src = '';
            });
        });
    </script>

<section class="py-5" id="members" style="scroll-margin-top: 80px;">
  <div class="container py-5">

    <!-- العنوان -->
    <div class="row mb-5 text-center">
      <div class="col-lg-8 mx-auto">
        <h2 class="fw-bold mb-3">
          {{ app()->getLocale() == 'ar' ? ($teamSetting->title_ar ?? __('massage.team_title')) : ($teamSetting->title_en ?? __('massage.team_title')) }}
        </h2>
        <p class="text-muted">
          {{ app()->getLocale() == 'ar' ? ($teamSetting->desc_ar ?? __('massage.team_desc')) : ($teamSetting->desc_en ?? __('massage.team_desc')) }}
        </p>
      </div>
    </div>

    <div class="row g-4 justify-content-center">
      @foreach($members as $member)
      <div class="col-12 col-md-6 col-lg-4">
        <!-- الكارت -->
        <div class="testimonial-card text-center p-5 shadow-xl rounded-4 h-100 bg-white"
             style="min-height: 420px;">

          <div class="mx-auto d-block mb-4 overflow-hidden rounded-circle border border-3 border-orange-500" style="width: 200px; height: 200px;">
            <img src="{{ url('/media/'.$member->image) }}" class="w-100 h-100" style="object-fit:cover; object-position: top;">
          </div>

          @if($member->getTranslation('message', app()->getLocale(), false))
          <div class="mb-4 text-muted fst-italic position-relative px-4">
             <i class="fas fa-quote-left text-orange-400 opacity-50 position-absolute top-0 start-0 translate-middle" style="font-size: 1.5rem;"></i>
             <p class="mb-0 lh-lg" style="font-size: 1.1rem;">"{{ $member->getTranslation('message', app()->getLocale()) }}"</p>
             <i class="fas fa-quote-right text-orange-400 opacity-50 position-absolute bottom-0 end-0 translate-middle" style="font-size: 1.5rem;"></i>
          </div>
          @endif

          <h5 class="fw-bold mb-3">
            {{ $member->name }}
          </h5>
          <h6 class="fw-semibold text-muted mb-3">
            {{ $member->position }}
          </h6>
          <p class="lead fst-italic text-gray-600 px-3">
            "{{ $member->role }}"
          </p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- Our Partnerships Section -->
<section id="partners" class="partners-section" style="scroll-margin-top: 80px;">
    <div class="container" style="position: relative; z-index: 10;">
        <div class="text-center mb-5 pb-3">
            <span class="badge rounded-pill px-4 py-2 mb-3 fw-semibold shadow-sm" style="background:#e8f4f0; color:#2d7a5f; font-size:0.85rem; letter-spacing:0.5px;">
                <i class="fas fa-handshake me-2"></i>
                {{ app()->getLocale() == 'ar' ? 'شبكة شركائنا' : 'Partnership Network' }}
            </span>
            <h2 class="fw-bold" style="color:#1a3c2f;">
                {{ app()->getLocale() == 'ar' ? 'شراكاتنا' : 'Our Partnerships' }}
            </h2>
            <div class="mx-auto mt-2" style="width:60px;height:4px;border-radius:2px;background:linear-gradient(90deg,#2d7a5f,#4caf85);"></div>
            <p class="text-muted mt-3 mx-auto" style="max-width: 800px; font-size: 1.1rem; line-height: 1.6;">
                {{ app()->getLocale() == 'ar' ? 'التعاون الاستراتيجي مع المنظمات المحلية والمؤسسات الحكومية لتقديم تأثير إنساني مستدام وتنمية مجتمعية شاملة.' : 'Collaborating with local organizations and institutions to deliver sustainable humanitarian impact and community development.' }}
            </p>
        </div>

        @php
            $partnerships = \App\Models\TransparencyPartnership::all();
            $localNgos = $partnerships->filter(fn($p) => in_array(strtolower($p->category_en), ['local ngos', 'local ngo', 'ngo']));
            $govInstitutions = $partnerships->filter(fn($p) => in_array(strtolower($p->category_en), ['government & local institutions', 'government institutions', 'gov']));
        @endphp

        <div class="row g-5">
            <!-- Local NGOs -->
            @if($localNgos->isNotEmpty())
            <div class="col-12">
                <h3 class="partner-category-title justify-content-center">
                    <i class="fas fa-hands-helping" style="color: #f97316; background: rgba(249, 115, 22, 0.1);"></i>
                    {{ app()->getLocale() == 'ar' ? 'المنظمات غير الحكومية المحلية' : 'Local NGOs' }}
                </h3>
                <div class="row g-4 justify-content-center">
                    @foreach($localNgos as $partner)
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="partner-card ngo">
                            <div class="partner-icon-placeholder"><i class="fa-solid {{ $partner->icon ?? 'fa-dove' }}"></i></div>
                            <h4 class="partner-name">{{ app()->getLocale() == 'ar' ? $partner->name_ar : $partner->name_en }}</h4>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Government Institutions -->
            @if($govInstitutions->isNotEmpty())
            <div class="col-12 mt-5">
                <h3 class="partner-category-title justify-content-center">
                    <i class="fas fa-university" style="color: #2d7a5f; background: rgba(45, 122, 95, 0.1);"></i>
                    {{ app()->getLocale() == 'ar' ? 'المؤسسات الحكومية والمحلية' : 'Government & Local Institutions' }}
                </h3>
                <div class="row g-4 justify-content-center">
                    @foreach($govInstitutions as $partner)
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="partner-card gov">
                            <div class="partner-icon-placeholder"><i class="fa-solid {{ $partner->icon ?? 'fa-university' }}"></i></div>
                            <h4 class="partner-name">{{ app()->getLocale() == 'ar' ? $partner->name_ar : $partner->name_en }}</h4>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</section>

 <!-- Contact Section -->
  <section id="contact" style="scroll-margin-top: 80px; padding-bottom: 80px;">
    <section class="py-5">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-12">
            <!-- Main Card -->
            <div class="card contact-card rounded-4">
              <div class="row g-0">
                <!-- Left Side: Contact Form -->
                <div class="col-md-7 contact-form-section p-4 p-md-5 pb-5">
                  <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="h3 fw-bold mb-0" data-i18n="contact.title">    {{ __('massage.contact.title') }}
</h2>
                    <span class="badge bg-dark rounded-pill px-3 py-2" data-i18n="contact.badge"> {{ __('massage.contact.badge') }}  </span>
                  </div>
@if(session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
@endif
<form action="{{ route('inquiry.store') }}" method="POST">
    @csrf                 
       <div class="row g-3">
                      <!-- Full Name and Email in one row on desktop -->
                      <div class="col-md-6">
                        <label for="fullName" class="form-label fw-medium" data-i18n="contact.name">{{ __('massage.contact.name') }}</label>
                        <input  name="full_name"type="text" class="form-control" id="fullName" placeholder="{{ __('massage.contact.placeholder.name') }}"
                          data-i18n="contact.placeholder.name">
                      </div>
                      <div class="col-md-6">
                        <label for="email" class="form-label fw-medium" data-i18n="donate.email">{{ __('massage.contact.email') }}</label>
                        <input name="email" type="email" class="form-control" id="email" placeholder="{{ __('massage.contact.placeholder.email') }}"
                          data-i18n="contact.placeholder.email">
                      </div>

                      <!-- Subject -->
                     <div class="col-12">
  <label for="message" class="form-label fw-medium" data-i18n="donate.email">
  {{ __('massage.contact.message') }}
  </label>
  <textarea 
    class="form-control" name="message"
    id="message" 
    rows="5" 
    placeholder=" {{ __('massage.contact.placeholder.message') }}"
    data-i18n="contact.placeholder.message">
  </textarea>
</div>


                      <!-- Submit Button -->
                      <div class="col-12 mt-2">
                        <button type="submit"
                          class="btn btn-green w-100 d-flex align-items-center justify-content-center gap-2">
                          <i class="fas fa-paper-plane"></i>
                          <span data-i18n="contact.submit">{{ __('massage.contact.submit') }}</span>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>

                <!-- Right Side: Info Box -->
                <div class="col-md-5 contact-info-section p-4 p-md-5 pb-5 d-flex flex-column">
                  <div class="mb-4">
                    <h3 class="h4 fw-bold mb-3" data-i18n="contact.info.title">{{ __('massage.contact.info.title') }}</h3>
                    <p class="mb-4 opacity-90" data-i18n="contact.info.desc">{{ __('massage.contact.info.desc') }}</p>

                    <!-- Contact Details -->
                    <div class="d-flex align-items-start mb-3">
                      <div class="bg-white bg-opacity-10 rounded-circle p-2 me-3 flex-shrink-0"
                        style="width: 40px; height: 40px;">
                        <i class="fas fa-envelope"></i>
                      </div>
                      <div>
                        <h6 class="fw-bold mb-1" data-i18n="contact.info.email">{{ __('massage.contact.info.email') }}</h6>
                        <p class="mb-0 small opacity-90">{{ $contact->email ?? 'mamaafricamao@gmail.com' }}</p>

                      </div>
                    </div>

                    <div class="d-flex align-items-start mb-3">
                      <div class="bg-white bg-opacity-10 rounded-circle p-2 me-3 flex-shrink-0"
                        style="width: 40px; height: 40px;">
                        <i class="fas fa-phone"></i>
                      </div>
                      <div>
                        <h6 class="fw-bold mb-1" data-i18n="contact.info.phone"><h6>{{ __('massage.contact.info.phone') }}</h6>
                        <p class="mb-0 small opacity-90">{{ $contact->phone_number ?? '+0000000000' }}</p>

                      </div>
                    </div>

                    <div class="d-flex align-items-start mb-4">
                      <div class="bg-white bg-opacity-10 rounded-circle p-2 me-3 flex-shrink-0"
                        style="width: 40px; height: 40px;">
                        <i class="fas fa-location-dot"></i>
                      </div>
                      <div>
                        <h6 class="fw-bold mb-1" data-i18n="contact.info.visit">{{ __('massage.contact.info.visit') }}</h6>
                        <p class="mb-0 small opacity-90">{{ app()->getLocale() == 'ar' ? ($contact->location_ar ?? 'الخرطوم، السودان') : ($contact->location_en ?? 'Khartoum, Sudan') }}</p>
                      </div>
                    </div>
                  </div>

                  <!-- Social Media Section -->
                  <div class="mt-auto">
                    <h6 class="fw-bold mb-3" data-i18n="contact.info.follow">{{ __('massage.contact.info.follow') }}</h6>
                    <div class="social-icons d-flex flex-wrap gap-2 mt-3" dir="ltr">
                        @if(!empty($contact->facebook_url))
                        <a href="{{ $contact->facebook_url }}" target="_blank" rel="noopener noreferrer"
                            class="d-inline-flex align-items-center justify-content-center rounded-circle flex-shrink-0 bg-white bg-opacity-10 text-decoration-none"
                            style="width:36px; height:36px; transition: all 0.3s ease;"
                            onmouseover="this.classList.replace('bg-opacity-10', 'bg-opacity-25')"
                            onmouseout="this.classList.replace('bg-opacity-25', 'bg-opacity-10')" aria-label="Facebook">
                            <i class="fab fa-facebook-f" style="color: #1877f2; font-size: 1.1rem;"></i>
                        </a>
                        @endif

                        @if(!empty($contact->whatsapp_url))
                        <a href="{{ $contact->whatsapp_url }}" target="_blank" rel="noopener noreferrer"
                            class="d-inline-flex align-items-center justify-content-center rounded-circle flex-shrink-0 bg-white bg-opacity-10 text-decoration-none"
                            style="width:36px; height:36px; transition: all 0.3s ease;"
                            onmouseover="this.classList.replace('bg-opacity-10', 'bg-opacity-25')"
                            onmouseout="this.classList.replace('bg-opacity-25', 'bg-opacity-10')" aria-label="WhatsApp">
                            <i class="fab fa-whatsapp" style="color: #25d366; font-size: 1.1rem;"></i>
                        </a>
                        @endif

                        @if(!empty($contact->instagram_url))
                        <a href="{{ $contact->instagram_url }}" target="_blank" rel="noopener noreferrer"
                            class="d-inline-flex align-items-center justify-content-center rounded-circle flex-shrink-0 bg-white bg-opacity-10 text-decoration-none"
                            style="width:36px; height:36px; transition: all 0.3s ease;"
                            onmouseover="this.classList.replace('bg-opacity-10', 'bg-opacity-25')"
                            onmouseout="this.classList.replace('bg-opacity-25', 'bg-opacity-10')" aria-label="Instagram">
                            <i class="fab fa-instagram" style="color: #e1306c; font-size: 1.1rem;"></i>
                        </a>
                        @endif

                        @if(!empty($contact->x_url))
                        <a href="{{ $contact->x_url }}" target="_blank" rel="noopener noreferrer"
                            class="d-inline-flex align-items-center justify-content-center rounded-circle flex-shrink-0 bg-white bg-opacity-10 text-decoration-none"
                            style="width:36px; height:36px; transition: all 0.3s ease;"
                            onmouseover="this.classList.replace('bg-opacity-10', 'bg-opacity-25')"
                            onmouseout="this.classList.replace('bg-opacity-25', 'bg-opacity-10')" aria-label="X (Twitter)">
                            <i class="fab fa-x-twitter" style="color: #ffffff; font-size: 1.1rem;"></i>
                        </a>
                        @endif

                        @if(!empty($contact->tiktok_url))
                        <a href="{{ $contact->tiktok_url }}" target="_blank" rel="noopener noreferrer"
                            class="d-inline-flex align-items-center justify-content-center rounded-circle flex-shrink-0 bg-white bg-opacity-10 text-decoration-none"
                            style="width:36px; height:36px; transition: all 0.3s ease;"
                            onmouseover="this.classList.replace('bg-opacity-10', 'bg-opacity-25')"
                            onmouseout="this.classList.replace('bg-opacity-25', 'bg-opacity-10')" aria-label="TikTok">
                            <i class="fab fa-tiktok" style="color: #ffffff; font-size: 1.1rem;"></i>
                        </a>
                        @endif

                        @if(!empty($contact->linkedin_url))
                        <a href="{{ $contact->linkedin_url }}" target="_blank" rel="noopener noreferrer"
                            class="d-inline-flex align-items-center justify-content-center rounded-circle flex-shrink-0 bg-white bg-opacity-10 text-decoration-none"
                            style="width:36px; height:36px; transition: all 0.3s ease;"
                            onmouseover="this.classList.replace('bg-opacity-10', 'bg-opacity-25')"
                            onmouseout="this.classList.replace('bg-opacity-25', 'bg-opacity-10')" aria-label="LinkedIn">
                            <i class="fab fa-linkedin-in" style="color: #0a66c2; font-size: 1.1rem;"></i>
                        </a>
                        @endif

                        @if(!empty($contact->telegram_url))
                        <a href="{{ $contact->telegram_url }}" target="_blank" rel="noopener noreferrer"
                            class="d-inline-flex align-items-center justify-content-center rounded-circle flex-shrink-0 bg-white bg-opacity-10 text-decoration-none"
                            style="width:36px; height:36px; transition: all 0.3s ease;"
                            onmouseover="this.classList.replace('bg-opacity-10', 'bg-opacity-25')"
                            onmouseout="this.classList.replace('bg-opacity-25', 'bg-opacity-10')" aria-label="Telegram">
                            <i class="fab fa-telegram-plane" style="color: #2481cc; font-size: 1.1rem;"></i>
                        </a>
                        @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </section>


    <!-- FOOTER -->
    @include('layouts.footer')

    <!-- JS -->
    <script>
      // Enable native browser scroll restoration for instant back navigation
      if ('scrollRestoration' in history) {
        history.scrollRestoration = 'auto';
      }



      function toggleMenu() {
        document.getElementById("mobileMenu").classList.toggle("hidden");
      }

      // lucide.createIcons();
      // ── Modular GSAP Engine (Mama Africa Expert Edition) ──
      document.addEventListener('DOMContentLoaded', function() {
          if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
              gsap.registerPlugin(ScrollTrigger);
              console.log("MAMA AFRICA: Expert Engine Initialized");

              // 1. HERO - Cinematic Ken Burns & Text Entrance
              const heroBg = document.getElementById('hero-bg-img');
              if (heroBg) {
                  gsap.fromTo(heroBg, 
                      { scale: 1.1 }, 
                      { scale: 1, duration: 2.5, ease: "power2.out" }
                  );
              }
              
              gsap.to(".hero h1, .hero p, .hero .ma-donate-btn", {
                y: 0,
                opacity: 1,
                stagger: 0.2,
                duration: 1.8,
                ease: "power3.out",
                delay: 0.5
              });

              // 2. 3D CARD ENGINE (Tilt & Glare)
              const cards = document.querySelectorAll('.program-card, .news-card');
              cards.forEach(card => {
                  // Inject dynamic glare overlay
                  const glare = document.createElement('div');
                  glare.className = 'ma-glare';
                  card.appendChild(glare);

                  card.addEventListener('mousemove', e => {
                      const rect = card.getBoundingClientRect();
                      const x = e.clientX - rect.left;
                      const y = e.clientY - rect.top;
                      
                      // Calculate rotation (-15 to 15 degrees)
                      const xRotation = 30 * ((y - rect.height / 2) / rect.height);
                      const yRotation = -30 * ((x - rect.width / 2) / rect.width);
                      
                      gsap.to(card, {
                          rotateX: xRotation,
                          rotateY: yRotation,
                          duration: 0.5,
                          ease: "power2.out",
                          overwrite: "auto"
                      });

                      // Update Glare position
                      card.style.setProperty('--x', `${x}px`);
                      card.style.setProperty('--y', `${y}px`);
                  });

                  card.addEventListener('mouseleave', () => {
                      gsap.to(card, {
                          rotateX: 0,
                          rotateY: 0,
                          duration: 0.8,
                          ease: "elastic.out(1, 0.3)"
                      });
                  });
              });

              // 3. GLOBAL STAGGERED REVEAL
              const sections = ['#about', '#locations-section', '#projects', '#members', '#transparency', '#Impacts', '#lastnews'];
              sections.forEach(sel => {
                  // Select the trigger itself if it has the class, AND any reveal-items inside it
                  const triggerEl = document.querySelector(sel);
                  if (!triggerEl) return;

                  const items = triggerEl.classList.contains('reveal-item') 
                                ? [triggerEl, ...triggerEl.querySelectorAll('.reveal-item')] 
                                : triggerEl.querySelectorAll('.reveal-item');

                  if (items.length) {
                      gsap.to(items, {
                          scrollTrigger: {
                              trigger: sel,
                              start: "top 85%",
                              toggleActions: "play none none none"
                          },
                          y: 0,
                          opacity: 1,
                          filter: "blur(0px)",
                          duration: 1.2,
                          stagger: 0.2,
                          ease: "power2.out"
                      });
                  }
              });

              // 4. SMART COUNTER ENGINE
              const counters = document.querySelectorAll('.counter-value');
              counters.forEach(counter => {
                  const targetValue = +counter.getAttribute('data-target');
                  gsap.to(counter, {
                      scrollTrigger: {
                          trigger: counter,
                          start: "top 95%",
                      },
                      innerText: targetValue,
                      duration: 2,
                      snap: { innerText: 1 },
                      ease: "power2.out"
                  });
              });
          }
      });

      function scrollTo(id) {
        try {
            const target = document.querySelector(id);
            if (target) {
                target.scrollIntoView({ behavior: "smooth" });
            }
        } catch (error) {
            console.warn("Smooth scroll skipped for invalid selector:", id);
        }
      }
 </script>
<script>
function changeLanguage(lang){
    let currentPath = window.location.pathname;
    let currentQuery = window.location.search;
    let currentHash = window.location.hash;
    window.location.href = "/change-language/" + lang + "?redirect=" + encodeURIComponent(currentPath + currentQuery + currentHash);
}

function toggleLanguage(){
    let currentLang = "{{ app()->getLocale() }}";

    if(currentLang === 'ar'){
        changeLanguage('en');
    }else{
        changeLanguage('ar');
    }
}

// ── Video Modal Logic ──
document.addEventListener('DOMContentLoaded', function() {
  const videoModal = document.getElementById('videoModal');
  const videoIframe = document.getElementById('videoIframe');
  
  function getYouTubeID(url) {
    if (!url) return null;
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

  // Handle click on testimonial video buttons
  document.querySelectorAll('.watch-video-btn').forEach(btn => {
    btn.addEventListener('click', function() {
      const videoUrl = this.getAttribute('data-video-url');
      const videoId = getYouTubeID(videoUrl);
      
      if(videoId) {
        videoIframe.src = `https://www.youtube.com/embed/${videoId}?autoplay=1`;
        const modal = new bootstrap.Modal(videoModal);
        modal.show();
      } else if (videoUrl) {
        // Fallback for non-youtube links if any
        window.open(videoUrl, '_blank');
      }
    });
  });

  // Stop video when modal is closed
  videoModal?.addEventListener('hidden.bs.modal', function () {
    videoIframe.src = "";
  });
});
</script>
   
</body>

</html>


