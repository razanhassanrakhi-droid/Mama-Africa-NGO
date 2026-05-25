<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <title>Volunteer Platform | منصة التطوع</title>
    <style>
        :root {
            --primary: #2c3e50;
            --success: #27ae60;
            --warning: #e67e22;
            --light: #f8f9fa;
            --white: #ffffff;
        }

        body {
            font-family: 'Segoe UI', Tahoma, sans-serif;
            margin: 0;
            background-color: var(--light);
            transition: all 0.3s ease;
            line-height: 1.6;
            /* تحسين القراءة على الشاشات الصغيرة */
        }

        /* تحسين زر تبديل اللغة ليناسب اللمس */
        .lang-switcher {
            position: fixed;
            top: 15px;
            left: 15px;
            z-index: 1000;
        }

        #langBtn {
            padding: 8px 16px;
            cursor: pointer;
            background: var(--success);
            color: white;
            border: none;
            border-radius: 25px;
            font-weight: bold;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            font-size: 14px;
        }

        header {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('images/1.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: white;
            width: 100%;
            padding: 100px 20px 120px;
            /* زيادة التباعد العلوي */
            text-align: center;
            box-sizing: border-box;
        }

        header h1 {
            font-size: 2.5rem;
            /* حجم خط مرن */
            margin-bottom: 10px;
        }

        .container {
            max-width: 1100px;
            margin: -50px auto 40px;
            padding: 0 15px;
            /* تباعد جانبي لعدم التصاق المحتوى بالحواف */
            box-sizing: border-box;
        }

        .card {
            background: var(--white);
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            margin-bottom: 25px;
        }

        .grid {
            display: grid;
            /* التعديل السحري للتجاوب: minmax يضمن ألا يقل العرض عن 280px */
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .box,
        .info-box {
            padding: 20px;
            border-radius: 10px;
            border: 1px solid #eee;
            background: #fff;
            transition: transform 0.2s;
        }

        /* تحسين استجابة العناوين */
        h2 {
            font-size: 1.8rem;
            color: var(--primary);
        }

        .box h3 {
            font-size: 1.3rem;
            margin-top: 0;
            color: var(--success);
        }

        .special-skills {
            background: #fff3e0;
            padding: 20px;
            border-radius: 10px;
            border: 1px dashed var(--warning);
            font-weight: 500;
        }

        /* --- استعلامات الوسائط (Media Queries) للهواتف --- */
        @media (max-width: 768px) {
            header {
                padding: 80px 15px 100px;
            }

            header h1 {
                font-size: 1.8rem;
                /* تصغير الخط في الهواتف */
            }

            .container {
                margin-top: -40px;
            }

            .card {
                padding: 20px;
            }

            .lang-switcher {
                top: 10px;
                left: 10px;
            }
        }

        /* ضبط الاتجاه عند تبديل اللغة لـ LTR */
        html[dir="ltr"] .lang-switcher {
            left: auto;
            right: 15px;
        }
    </style>
</head>

<body>
    <!-- Language Toggle Button -->
    <div class="lang-switcher">
        <button id="langBtn" onclick="toggleLanguage()">الإنجليزية</button>
    </div>

    <div id="navbar"></div>

    <header>
        <h1 id="title">انضم إلى فريقنا التطوعي</h1>
        <p id="subtitle">مهاراتك يمكن أن تصنع فرقاً حقيقياً في السودان</p>
    </header>

    <div class="container">
        <section class="card">
            <h2 id="h-tasks">كيف يمكنك المساعدة؟</h2>
            <div class="grid">
                <div class="box">
                    <h3 id="t1-title">📍 ميدانياً (دارفور)</h3>
                    <ul id="t1-list">
                        <li>توزيع الوجبات الغذائية</li>
                        <li>الدعم اللوجستي والميداني</li>
                        <li>التواصل المجتمعي</li>
                    </ul>
                </div>
                <div class="box">
                    <h3 id="t2-title">🎓 التدريبات</h3>
                    <ul id="t2-list">
                        <li>إعداد الحقائب التدريبية</li>
                        <li>تقديم ورش العمل</li>
                        <li>تنظيم القاعات والمتدربين</li>
                    </ul>
                </div>
                <div class="box">
                    <h3 id="t3-title">💻 عن بُعد</h3>
                    <ul id="t3-list">
                        <li>الترجمة وكتابة التقارير</li>
                        <li>إدارة منصات التواصل</li>
                        <li>جمع التبرعات الرقمية</li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="card">
            <h2 id="h-special">مهارات مطلوبة بشدة</h2>
            <div class="special-skills" id="special-text">
                نحتاج دائماً إلى: الكوادر الطبية، مستشاري الصدمات النفسية، والمعلمين.
            </div>
        </section>

        <section class="card">
            <h2 id="h-why">لماذا تنضم إلينا؟</h2>
            <div class="grid">
                <div class="info-box">
                    <strong id="w1-t">تأثير مباشر:</strong>
                    <p id="w1-d">تساهم جهودك مباشرة في تعزيز صمود ورفاهية المجتمع.</p>
                </div>
                <div class="info-box">
                    <strong id="w2-t">شبكة عالمية:</strong>
                    <p id="w2-d">تواصل مع فريق مخصص من الناشطين في العمل الإنساني.</p>
                </div>
                <div class="info-box">
                    <strong id="w3-t">تطوير المهارات:</strong>
                    <p id="w3-d">اكتسب خبرة في إدارة الأزمات والتنمية الدولية.</p>
                </div>
            </div>
        </section>
        <div class="back-nav ">
            <a href="{{ route('home') }}" onclick="if(window.history.length > 1) { window.history.back(); return false; }" id="backBtn">
                <span id="backText">العودة</span> ➔
            </a>
        </div>

    </div>
    @include('layouts.footer')

    <script>
        let currentLang = 'ar';
        const translations = {
            ar: {
                btn: "الإنجليزية",
                title: "انضم إلى فريق المتطوعين",
                subtitle: "مهاراتك يمكن أن تصنع فرقاً حقيقياً في السودان",
                hTasks: "كيف يمكنك المساعدة",
                t1Title: "📍 على الأرض (دارفور)",
                t1List: "<li>توزيع الوجبات</li><li>دعم اللوجستيات</li><li>التواصل المجتمعي</li>",
                t2Title: "🎓 التدريب",
                t2List: "<li>تطوير المناهج</li><li>تقديم ورش العمل</li><li>تنظيم المتدربين</li>",
                t3Title: "💻 عن بعد / عالمياً",
                t3List: "<li>الترجمة والكتابة</li><li>إدارة وسائل التواصل</li><li>جمع التبرعات الرقمية</li>",
                hSpecial: "مهارات مطلوبة بشدة",
                specialText: "نحن بحاجة دائماً إلى: متخصصين طبيين، مستشارين نفسيين، ومعلمين.",
                hWhy: "لماذا تنضم إلينا؟",
                w1T: "تأثير مباشر:",
                w1D: "تساهم جهودك مباشرة في تحسين حياة المجتمع.",
                w2T: "شبكة عالمية:",
                w2D: "تواصل مع فريق مخصص من الناشطين الإنسانيين.",
                w3T: "تطوير المهارات:",
                w3D: "اكتسب خبرة في إدارة الأزمات والتنمية.",
                backText: "رجوع",
            },
            en: {
                btn: "العربية",
                flogo: "Mama Africa",
                title: "Join Our Volunteer Team",
                subtitle: "Your skills can make a real difference in Sudan",
                hTasks: "How You Can Help",
                t1Title: "📍 On the Ground (Darfur)",
                t1List: "<li>Meal Distribution</li><li>Logistics Support</li><li>Community Outreach</li>",
                t2Title: "🎓 Training",
                t2List: "<li>Curriculum Development</li><li>Conducting Workshops</li><li>Organizing Trainees</li>",
                t3Title: "💻 Remote / Global",
                t3List: "<li>Translation & Writing</li><li>Social Media Management</li><li>Digital Fundraising</li>",
                hSpecial: "High Demand Skills",
                specialText: "We are always in need of: Medical professionals, trauma counselors, and educators.",
                hWhy: "Why Join Us?",
                w1T: "Direct Impact:",
                w1D: "Your efforts contribute directly to the well-being of the community.",
                w2T: "Global Network:",
                w2D: "Connect with a dedicated team of humanitarian activists.",
                w3T: "Skill Development:",
                w3D: "Gain experience in crisis management and development.",
                backText: "Back",
            }
        };

        function toggleLanguage() {
            currentLang = currentLang === 'ar' ? 'en' : 'ar';
            const data = translations[currentLang];

            document.getElementById('htmlTag').dir = currentLang === 'ar' ? 'rtl' : 'ltr';
            document.getElementById('htmlTag').lang = currentLang;

            // تحديث محتوى الصفحة الرئيسية
            document.getElementById('langBtn').innerText = data.btn;
            document.getElementById('title').innerText = data.title;
            document.getElementById('subtitle').innerText = data.subtitle;
            document.getElementById('h-tasks').innerText = data.hTasks;
            document.getElementById('t1-title').innerText = data.t1Title;
            document.getElementById('t1-list').innerHTML = data.t1List;
            document.getElementById('t2-title').innerText = data.t2Title;
            document.getElementById('t2-list').innerHTML = data.t2List;
            document.getElementById('t3-title').innerText = data.t3Title;
            document.getElementById('t3-list').innerHTML = data.t3List;
            document.getElementById('h-special').innerText = data.hSpecial;
            document.getElementById('special-text').innerText = data.specialText;
            document.getElementById('h-why').innerText = data.hWhy;
            document.getElementById('w1-t').innerText = data.w1T;
            document.getElementById('w1-d').innerText = data.w1D;
            document.getElementById('w2-t').innerText = data.w2T;
            document.getElementById('w2-d').innerText = data.w2D;
            document.getElementById('w3-t').innerText = data.w3T;
            document.getElementById('w3-d').innerText = data.w3D;
            document.getElementById('backText').innerText = data.backText;

            // تحديث محتوى الـ Footer
            document.getElementById('f-logo').innerText = data.flogo;
        }
    </script>
</body>

</html>