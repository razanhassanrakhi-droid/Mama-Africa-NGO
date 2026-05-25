<!-- FOOTER -->
<footer class="text-stone-400 py-10 text-center" style="background-color:#363636; ">

    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4 mb-4">
                <div class="flex items-center gap-3">
                    <img src="{{ isset($siteHero) && $siteHero->logo ? url('/media/'.$siteHero->logo) : asset('images/favicon-org.png') }}"
                        class="w-[60px]" alt="Organization Logo" />
                    <span class="text-xl font-bold text-white font-['Inknut_Antiqua']" data-i18n="footer.brand">
                        {{ app()->getLocale() === 'ar' ? ($siteHero->org_name_ar ?? __('massage.brand')) : ($siteHero->org_name_en ?? __('massage.brand')) }}
                    </span>
                </div>
                <p class="text-white small mt-3" data-i18n="footer.desc">
                    {{ app()->getLocale() == 'ar' ? ($contact->footer_desc_ar ?? __('massage.footer.desc')) : ($contact->footer_desc_en ?? __('massage.footer.desc')) }}
                </p>
            </div>

            <div class="col-lg-2 col-md-4 mb-4 d-flex flex-column align-items-center align-items-lg-start">
                <h6 class="fw-bold mb-3 text-white w-fit" data-i18n="footer.quick">{{ __('massage.footer.quick') }}</h6>
                <ul class="list-unstyled text-white d-inline-block text-start">
                    <li class="mb-2"><a href="{{ route('home') }}" class="footer-link d-flex align-items-center gap-2"><i
                                class="fa-solid fa-house fa-fw fa-xs"></i>{{ __('massage.homeLink') }}</a></li>
                    <li class="mb-2"><a href="{{ route('home') }}#projects" class="footer-link d-flex align-items-center gap-2"><i
                                class="fa-solid fa-diagram-project fa-fw fa-xs"></i>{{ __('massage.projects') }}</a></li>
                    <li class="mb-2"><a href="{{ route('home') }}#Impacts" class="footer-link d-flex align-items-center gap-2"><i
                                class="fa-solid fa-chart-line fa-fw fa-xs"></i>{{ __('massage.impacts') }}</a></li>
                    <li class="mb-2"><a href="{{ route('home') }}#lastnews" class="footer-link d-flex align-items-center gap-2"><i
                                class="fa-solid fa-newspaper fa-fw fa-xs"></i>{{ __('massage.news') }}</a></li>
                    <li class="mb-2"><a href="{{ route('home') }}#transparency" class="footer-link d-flex align-items-center gap-2"><i
                                class="fa-solid fa-magnifying-glass fa-fw fa-xs"></i>{{ __('massage.trans') }}</a></li>
                    <li class="mb-2"><a href="{{ route('home') }}#members" class="footer-link d-flex align-items-center gap-2"><i
                                class="fa-solid fa-users fa-fw fa-xs"></i>{{ __('massage.members') }}</a></li>
                    <li class="mb-2"><a href="{{ route('home') }}#locations-section" class="footer-link d-flex align-items-center gap-2"><i
                                class="fa-solid fa-map-location-dot fa-fw fa-xs"></i>{{ app()->getLocale() === 'ar' ? 'أماكن عملنا' : 'Locations' }}</a>
                    </li>
                    <li class="mb-2"><a href="{{ route('home') }}#about" class="footer-link d-flex align-items-center gap-2"><i
                                class="fa-solid fa-circle-info fa-fw fa-xs"></i>{{ __('massage.ab') }}</a></li>
                    <li class="mb-2"><a href="{{ route('home') }}#contact" class="footer-link d-flex align-items-center gap-2"><i
                                class="fa-solid fa-envelope fa-fw fa-xs"></i>{{ __('massage.conta') }}</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-4 mb-4">
                <h6 class="fw-bold mb-3 text-white" data-i18n="footer.contact">{{ __('massage.conta') }}</h6>
                <ul class="list-unstyled text-muted small">
                    <li class="mb-2 text-white d-flex align-items-center justify-content-center justify-content-lg-start"><i
                            class="fas fa-map-marker-alt {{ app()->getLocale() == 'ar' ? 'ms-2' : 'me-2' }}"></i>
                        <span>{{ app()->getLocale() == 'ar' ? ($contact->location_ar ?? 'الخرطوم، السودان') : ($contact->location_en ?? 'Khartoum, Sudan') }}</span>
                    </li>
                    <li class="mb-2 text-white d-flex align-items-center justify-content-center justify-content-lg-start"><i
                            class="fas fa-envelope {{ app()->getLocale() == 'ar' ? 'ms-2' : 'me-2' }}"></i> <a
                            href="mailto:{{ $contact->email ?? 'mamaafricamao@gmail.com' }}"
                            class="text-white text-decoration-none">{{ $contact->email ?? 'mamaafricamao@gmail.com' }}</a>
                    </li>
                    @if(isset($contact->phone_number))
                    <li class="mb-2 text-white d-flex align-items-center justify-content-center justify-content-lg-start"><i
                            class="fas fa-phone {{ app()->getLocale() == 'ar' ? 'ms-2' : 'me-2' }}"></i><a
                            href="tel:{{ $contact->phone_number ?? '' }}" class="text-white text-decoration-none"
                            dir="ltr">{{ $contact->phone_number ?? '+0000000000' }}</a></li>
                    @endif
                </ul>
            </div>
        </div>

        <hr class="my-4 border-secondary">
        <div class=" text-center ">
            <p class="mb-0 small text-white">&copy; <span
                    data-i18n="footer.copyright">{{ __('massage.footer.copyright') }}</span></p>
        </div>
        <div class="row align-items-center text-center text-md-start">

            <!-- Privacy -->
            <div class="col-md-4 mb-3 mb-md-0 mt-3 flex gap-4 justify-center md:justify-start">
                <a href="{{ route('privacy') }}" class="footer-link small text-white" data-i18n="footer.privacy">
                    {{ __('massage.footer.privacy') }}
                </a>
                <a href="{{ route('terms') }}" class="footer-link small text-white" data-i18n="footer.privacy">
                    {{ __('massage.footer.terms') }}
                </a>
            </div>

            <!-- Social Icons -->
            <div class="col-md-4 d-flex justify-content-center flex-nowrap gap-2 mb-3 mb-md-0 overflow-hidden mt-3" dir="ltr">

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

            <!-- Empty column for layout balance -->
            <div class="col-md-4 text-md-end hidden md:block">
            </div>
        </div>

        @if(!empty($contact->developer_name_ar) || !empty($contact->developer_logo))
        <hr class="border-secondary mt-4 mb-4 opacity-25">

        <!-- Developer Credit Styles -->
        <style>
            .footer-credit {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                font-size: 14px;
                color: #888;
                letter-spacing: 0.5px;
                text-align: center;
                padding: 20px;
            }
            .brand-name {
                font-weight: bold;
                cursor: pointer;
                transition: opacity 0.3s;
            }
            .brand-name:hover {
                opacity: 0.8;
            }
            .brand-name-blue { color: #00bcd4; }
            .brand-name-pink { color: #e91e63; }
        </style>

        <!-- Developer Credit -->
        <div class="row">
            <div class="col-12 footer-credit d-flex flex-column align-items-center justify-content-center gap-0">
                @php
                    $devName = app()->getLocale() == 'ar' ? ($contact->developer_name_ar ?? $contact->developer_name_en) : ($contact->developer_name_en ?? $contact->developer_name_ar);
                    $devName = trim($devName) ?: 'Digital Age Tech Solutions'; // Fallback if empty
                    
                    $prefixName = '';
                    $suffixName = '';
                    $coreNameHtml = '';

                    $searchPhrase = '';
                    // Check for English first, then Arabic variants (including Hamzas)
                    $variants = ['Digital Age', 'ديجيتال إيدج', 'ديجيتال ايدج', 'ديجيتال أيج', 'ديجيتال ايج', 'ديجتال أيج', 'ديجتال ايج'];
                    foreach ($variants as $variant) {
                        if (stripos($devName, $variant) !== false) {
                            $searchPhrase = $variant;
                            break;
                        }
                    }

                    if ($searchPhrase) {
                        $pos = stripos($devName, $searchPhrase);
                        $prefixName = trim(substr($devName, 0, $pos));
                        $suffixName = trim(substr($devName, $pos + strlen($searchPhrase)));
                        
                        // Apply Company to Solutions replacement
                        if (!empty($suffixName)) {
                            $suffixName = str_ireplace('company', 'Solutions', $suffixName);
                        }
                        if (!empty($prefixName)) {
                            $prefixName = str_ireplace('company', 'Solutions', $prefixName);
                            $prefixName = trim(str_replace(['شركة', 'الشركة'], '', $prefixName));
                        }

                        if (stripos($searchPhrase, 'Digital Age') !== false) {
                            $coreNameHtml = '<span class="brand-name"><span class="brand-name-blue">Digital</span> <span class="brand-name-pink">Age</span></span>';
                        } else {
                            $parts = explode(' ', $searchPhrase);
                            $first = $parts[0] ?? 'ديجيتال';
                            $second = $parts[1] ?? 'أيج';
                            $coreNameHtml = '<span class="brand-name"><span class="brand-name-blue">' . htmlspecialchars($first) . '</span> <span class="brand-name-pink">' . htmlspecialchars($second) . '</span></span>';
                        }
                    } else {
                        $coreNameHtml = '<span class="brand-name">' . htmlspecialchars($devName) . '</span>';
                    }
                @endphp

                <!-- Top Row: Logo -->
                @if(!empty($contact->developer_logo))
                    <div class="d-flex justify-content-center">
                        @if(!empty($contact->developer_link))
                            <a href="{{ $contact->developer_link }}" target="_blank" class="text-decoration-none" style="transition: opacity 0.3s;" onmouseover="this.style.opacity='0.8'" onmouseout="this.style.opacity='1'">
                        @endif
                            <svg width="0" height="0" class="d-none" aria-hidden="true">
                                <filter id="remove-white-bg" color-interpolation-filters="sRGB">
                                    <feColorMatrix in="SourceGraphic" type="matrix" values="
                                        1 0 0 0 0
                                        0 1 0 0 0
                                        0 0 1 0 0
                                        -1.5 -1.5 -1.5 1 2.5
                                    " result="alpha" />
                                    <feComponentTransfer in="alpha" result="sharpAlpha">
                                        <feFuncA type="table" tableValues="0 0 1 1 1 1" />
                                    </feComponentTransfer>
                                    <feComposite in="SourceGraphic" in2="sharpAlpha" operator="in" />
                                </filter>
                            </svg>
                            <img src="{{ url('/media/' . $contact->developer_logo) }}" alt="Developer Logo"
                                style="max-width: 45px; height: auto; max-height: 45px; object-fit: contain; filter: url(#remove-white-bg);">
                        @if(!empty($contact->developer_link))
                            </a>
                        @endif
                    </div>
                @endif
                
                <!-- Bottom Row: Copyright + Name + Suffix all in one line perfectly balanced -->
                <div class="d-flex flex-row align-items-center justify-content-center w-100 mt-1 gap-1">
                    <!-- Left Side: Copyright + Prefix -->
                    <div style="flex: 1; display: flex; justify-content: flex-end;">
                        <div class="d-flex align-items-center gap-1">
                            @if(app()->getLocale() == 'ar')
                                <span dir="ltr">| {{ strtr(date('Y'), ['0'=>'٠','1'=>'١','2'=>'٢','3'=>'٣','4'=>'٤','5'=>'٥','6'=>'٦','7'=>'٧','8'=>'٨','9'=>'٩']) }} &copy;</span>
                            @else
                                <span dir="ltr">&copy; {{ date('Y') }} |</span>
                            @endif
                            @if(!empty($prefixName))
                                <span>{{ $prefixName }}</span>
                            @endif
                        </div>
                    </div>
                    
                    <!-- Center: Core Name -->
                    <div class="text-center" style="white-space: nowrap;">
                        <span>
                            @if(!empty($contact->developer_link))
                                <a href="{{ $contact->developer_link }}" target="_blank" class="text-decoration-none text-reset">
                            @endif
                            
                            {!! $coreNameHtml !!}
                            
                            @if(!empty($contact->developer_link))
                                </a>
                            @endif
                        </span>
                    </div>

                    <!-- Right Side: Suffix -->
                    <div style="flex: 1; display: flex; justify-content: flex-start;">
                        @if(!empty($suffixName))
                            <span>{{ $suffixName }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endif

    </div>
</footer>


