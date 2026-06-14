<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('meta_title', $siteSeo?->site_title ?? $page_title_suffix ?? 'RR Gems Udaipur | Astro Gemstones & Fine Jewelry')</title>
    @if($siteSeo?->site_description ?? false)
    <meta name="description" content="{{ $siteSeo->site_description }}">
    @endif
    @if($siteSeo?->site_keywords ?? false)
    <meta name="keywords" content="{{ $siteSeo->site_keywords }}">
    @endif

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <!-- Fonts (Fallback / Preconnect) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">

    <!-- Vite Styles and Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body x-data="{ cartOpen: false }" @toggle-cart.window="cartOpen = !cartOpen">

    {{-- RR GEMS & JEWELS — Header | Bootstrap-first, minimal custom CSS --}}

    <style>
        :root {
            --rr-orange: #f59e0b;
            --rr-orange-dark: #ea580c;
            --rr-blue: #2563eb;
            --rr-blue-dark: #1e40af;
            --rr-white: #ffffff;
            --rr-text: #1f2937;
            --rr-red: #D0201A;
            --rr-gold: #e8a800;
            --rr-green: #1e7e34;
            --rr-blue: #1a5fa8;
        }

        /* =========================
       ANNOUNCEMENT BAR
    ========================== */
        .rr-announcement-bar {
            background: linear-gradient(135deg,
                    var(--rr-blue-dark) 0%,
                    var(--rr-blue) 55%,
                    var(--rr-orange) 100%);
            position: relative;
            overflow: hidden;
        }

        .rr-announcement-bar::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(120deg,
                    rgba(255, 255, 255, .18),
                    rgba(255, 255, 255, .05),
                    transparent);
            pointer-events: none;
        }

        .rr-announcement-bar a,
        .rr-announcement-bar span {
            position: relative;
            z-index: 2;
        }

        .rr-announcement-bar a {
            color: #fff;
            text-decoration: none;
            transition: .3s;
        }

        .rr-announcement-bar a:hover {
            opacity: .85;
        }

        /* =========================
       NAVBAR COLORS
    ========================== */

        .nav-bar-custom .nav-link {
            color: var(--rr-text) !important;
            font-size: .82rem;
            transition: all .25s ease;
        }

        .nav-bar-custom .nav-link:hover,
        .nav-bar-custom .nav-link.active {
            color: var(--rr-blue) !important;
        }

        .nav-bar-custom .nav-link.active {
            border-bottom: 2px solid var(--rr-orange);
        }

        /* Search Focus */
        .rr-search-group:focus-within {
            border-color: var(--rr-blue) !important;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, .12) !important;
        }

        /* Mega Menu */
        .mega-menu-dropdown {
            border-top: 3px solid var(--rr-orange) !important;
            box-shadow: 0 10px 35px rgba(0, 0, 0, .08);
        }

        .mega-title {
            color: var(--rr-blue);
            font-size: .72rem;
            letter-spacing: .15em;
            text-transform: uppercase;
            border-bottom: 1px solid #e5e7eb;
            padding-bottom: 6px;
            margin-bottom: 10px;
            font-weight: 700;
        }

        .mega-list a {
            font-size: .85rem;
            color: #4b5563;
            transition: .25s ease;
        }

        .mega-list a:hover {
            color: var(--rr-blue);
            padding-left: 4px;
        }

        .mega-new-tag {
            font-size: .6rem;
            background: linear-gradient(135deg,
                    var(--rr-orange),
                    var(--rr-orange-dark));
            color: #fff;
            padding: 2px 6px;
            border-radius: 4px;
            margin-left: 5px;
            vertical-align: middle;
        }

        /* Premium Top Stripe */
        .rr-rainbow {
            height: 4px;
            background: linear-gradient(90deg,
                    var(--rr-blue-dark) 0%,
                    var(--rr-blue) 50%,
                    var(--rr-orange) 100%);
        }

        /* Logo */
        .logo-svg {
            width: 40px;
            height: 36px;
            flex-shrink: 0;
        }

        /* Mobile Toggle */
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='%232563eb' stroke-width='2' stroke-linecap='round' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e") !important;
        }

        .mega-menu {
            width: 700px;
            border-top: 2px solid #C9922A !important;
            border-radius: 0;
            padding: 1.5rem 2rem;
        }

        .mega-heading {
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: #333;
            padding-bottom: 8px;
            border-bottom: 1px solid #e5e5e5;
            margin-bottom: 12px;
        }

        .mega-link {
            display: block;
            padding: 5px 0;
            font-size: 13px;
            color: #555;
            text-decoration: none;
        }

        .mega-link:hover {
            color: #C9922A;
        }

        .mega-view-all {
            display: inline-block;
            margin-top: 10px;
            font-size: 12px;
            font-weight: 600;
            color: #C9922A;
            text-decoration: none;
        }
    </style>

    <!-- PREMIUM TOP STRIPE -->
    <div class="rr-rainbow"></div>

    <!-- ANNOUNCEMENT BAR -->
    <div class="rr-announcement-bar py-2 small">
        <div class="container d-flex flex-wrap justify-content-between align-items-center">

            <span class="text-white">
                <i class="bi bi-patch-check-fill me-1"></i>
                {{ $announcementText }}
            </span>

            <div class="d-none d-md-flex align-items-center gap-3">

                <a href="tel:{{ $phoneTel }}">
                    <i class="bi bi-telephone-fill me-1"></i>
                    {{ $phone }}
                </a>

                <span class="text-white-50">|</span>

                <a href="https://wa.me/{{ $whatsapp }}" target="_blank">
                    <i class="bi bi-whatsapp me-1"></i>
                    Gem Expert Consultation
                </a>

            </div>

        </div>
    </div>

    {{-- ── MIDDLE HEADER ── --}}
    <header class="bg-white border-bottom py-3 sticky-top shadow-sm">
        <div class="container">
            <div class="row align-items-center g-3">

                {{-- Logo --}}
                <div class="col-md-3 col-6">
                    <a href="{{ url('/') }}" class="text-decoration-none d-flex align-items-center gap-2">
                        <svg class="logo-svg" viewBox="0 0 48 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <polygon points="24,2 36,14 24,14 12,14" fill="#D0201A" />
                            <polygon points="36,14 44,14 24,44" fill="#1a5fa8" />
                            <polygon points="12,14 4,14 24,44" fill="#1a5fa8" />
                            <polygon points="24,14 36,14 24,44" fill="#e8a800" />
                            <polygon points="12,14 24,14 24,44" fill="#1e7e34" />
                            <polygon points="24,2 12,14 18,14" fill="#e8a800" />
                            <polygon points="24,2 36,14 30,14" fill="#e8a800" />
                        </svg>
                        <div>
                            <h1 class="h5 fw-bold mb-0 text-rr-red">{{ $siteName }}</h1>
                            <small class="text-uppercase text-muted fw-semibold" style="font-size:.58rem;letter-spacing:.18em">{{ $siteTagline }}</small>
                        </div>
                    </a>
                </div>

                {{-- Search Bar --}}
                <div class="col-md-6 col-12 order-md-2 order-3">
                    <form action="{{ url('/shop') }}" method="GET">
                        <div class="input-group border rounded rr-search-group overflow-hidden">
                            <span class="input-group-text bg-light border-0 text-muted">
                                <i class="bi bi-search"></i>
                            </span>
                            <input type="text" name="search" class="form-control border-0 shadow-none"
                                placeholder="Search Certified Ruby, Emerald, Neelam, Pukhraj..."
                                value="{{ request('search') }}">
                            <button class="btn bg-rr-red text-white px-4 rounded-0 border-0" type="submit">Search</button>
                        </div>
                    </form>
                </div>

                {{-- Actions --}}
                <div class="col-md-3 col-6 order-md-3 order-2 d-flex justify-content-end align-items-center gap-2">
                    <a href="{{ url('/') }}#astro-finder"
                        class="btn btn-sm border border-rr-gold text-rr-gold d-none d-lg-inline-flex align-items-center gap-1 fw-semibold">
                        <i class="bi bi-stars"></i> Astro Finder
                    </a>

                    {{-- Cart button — position-relative so the badge sits on top of the icon --}}
                    <button class="btn btn-danger position-relative py-1 px-3 d-flex align-items-center gap-2" @click="cartOpen = true">
                        <i class="bi bi-bag-fill text-warning"></i>
                        <span class="d-none d-md-inline">Cart</span>
                        @livewire('storefront.cart-badge')
                    </button>
                </div>

            </div>
        </div>
    </header>

    {{-- 4-colour brand stripe --}}
    <div class="rr-rainbow"></div>

    {{-- ── MAIN NAVIGATION ── --}}
    <nav class="navbar navbar-expand-lg bg-white border-bottom nav-bar-custom p-0">
        <div class="container">
            <button class="navbar-toggler my-2 border" type="button"
                data-bs-toggle="collapse" data-bs-target="#storeNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="storeNavbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link px-3 py-3 {{ Request::is('/') ? 'active fw-semibold' : '' }}"
                            href="{{ url('/') }}">Home</a>
                    </li>

                    <li class="nav-item dropdown position-static">
                        <a class="nav-link dropdown-toggle px-3 py-3" href="#"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Gemstone Jewellery
                        </a>
                        <div class="dropdown-menu w-100 mega-menu-dropdown border-0 shadow rounded-0 p-4">
                            <div class="container">
                                <div class="mb-3 border-bottom pb-2">
                                    <a href="{{ url('/Gemstone-detailpage?category=jewellery') }}" class="fw-bold text-navy text-decoration-none">View All Jewellery &rarr;</a>
                                </div>
                                <div class="row g-0">
                                    @php 
                                        $jewelleryCat = \App\Models\Category::where('name', 'Jewellery')->with('children.children')->first(); 
                                    @endphp
                                    @if($jewelleryCat)
                                        @foreach($jewelleryCat->children as $child)
                                        <div class="col-md-3 p-2">
                                            <h6 class="mega-title fw-semibold"><a href="{{ url('/Gemstone-detailpage?category='.$child->slug) }}" class="text-dark text-decoration-none">{{ $child->name }}</a></h6>
                                            @if($child->children->count())
                                            <ul class="list-unstyled mega-list mt-2">
                                                @foreach($child->children as $subChild)
                                                <li class="mb-1">
                                                    <a href="{{ url('/Gemstone-detailpage?category='.$subChild->slug) }}" class="text-decoration-none">{{ $subChild->name }}</a>
                                                </li>
                                                @endforeach
                                            </ul>
                                            @endif
                                        </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link px-3 py-3"
                            href="{{ url('/Gems-recommendation') }}">Gems recommendation</a>
                    </li>

                    <li class="nav-item dropdown mega-dropdown">
                        <a class="nav-link px-3 py-3 dropdown-toggle"
                            href="#" id="gemsDropdown"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Gemstones
                        </a>

                        <div class="dropdown-menu mega-menu p-4" aria-labelledby="gemsDropdown">
                            <div class="row">

                                {{-- Column 1: By Navratna --}}
                                <div class="col-md-4 mega-col">
                                    <h6 class="mega-heading"><a href="{{ url('/Gemstone-detailpage?category=gemstones') }}" class="text-dark text-decoration-none">View All Gemstones &rarr;</a></h6>
                                    <ul class="list-unstyled">
                                        @php 
                                            $gemstoneCat = \App\Models\Category::where('name', 'Gemstones')->with('children')->first(); 
                                        @endphp
                                        @if($gemstoneCat)
                                            @foreach($gemstoneCat->children as $child)
                                            <li><a class="mega-link" href="{{ url('/Gemstone-detailpage?category='.$child->slug) }}">{{ $child->name }}</a></li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>


                            </div>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link px-3 py-3"
                            href="{{ url('/contact-us') }}">Contact us</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link px-3 py-3"
                            href="{{ url('/About-us') }}">About us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 py-3"
                            href="{{ url('/Privacy-Policy') }}">Privacy Policy</a>
                    </li>

                      <li class="nav-item">
                        <a class="nav-link px-3 py-3"
                            href="{{ url('/Shipping-Policy') }}"> Shipping Policy</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link px-3 py-3"
                            href="{{ route('storefront.blog') }}">Blogs</a>
                    </li>

                </ul>

                <!-- <div class="d-none d-lg-flex align-items-center gap-3 small text-muted">
                <span><i class="bi bi-truck text-rr-gold me-1"></i>{{ $navShippingText }}</span>
                <span><i class="bi bi-shield-check text-rr-green me-1"></i>{{ $navSecureText }}</span>
            </div> -->
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>

    <!-- Livewire Cart Slide Drawer -->
    @livewire('storefront.cart')

    <!-- Footer -->
    <footer class="bg-dark text-white pt-5 mt-5 border-top border-warning border-3">
        <div class="container">
            <div class="row g-4 mb-4">
                <!-- Brand Info -->
                @php
                $footerBrand = $footerSections->firstWhere('key', 'brand');
                $footerShop = $footerSections->firstWhere('key', 'shop_gemstones');
                $footerAstro = $footerSections->firstWhere('key', 'astro_wearing');
                $footerContact = $footerSections->firstWhere('key', 'contact');
                @endphp
                <div class="col-lg-4 col-md-6">
                    <h2 class="h5 text-warning mb-3 cinzel-font">{{ $footerBrandTitle }}</h2>
                    <p class="text-white-50 small leading-relaxed">
                        {{ $footerBrandText }}
                    </p>
                    <div class="d-flex gap-3 mt-4">
                        @foreach($socialLinks as $social)
                        <a href="{{ $social->url }}" class="btn btn-outline-light btn-sm rounded-circle" target="_blank"><i class="bi {{ $social->icon }}"></i></a>
                        @endforeach
                    </div>
                </div>

                <!-- Quick Categories -->
                <div class="col-lg-2 col-md-6">
                    <h3 class="h6 text-white text-uppercase tracking-wider mb-3">{{ $footerShop?->title ?? 'Shop Gemstones' }}</h3>
                    <ul class="list-unstyled">
                        @foreach($footerShop?->links ?? [] as $link)
                        <li class="mb-2"><a href="{{ url($link->url) }}" class="text-white-50 text-decoration-none hover-white">{{ $link->title }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <!-- Astro Planetary Info -->
                @if($footerAstro?->content)
                <div class="col-lg-3 col-md-6">
                    <h3 class="h6 text-white text-uppercase tracking-wider mb-3">{{ $footerAstro->title }}</h3>
                    <div class="text-white-50 small">{!! $footerAstro->content !!}</div>
                </div>
                @endif

                <!-- Contact Info -->
                <div class="col-lg-3 col-md-6">
                    <h3 class="h6 text-white text-uppercase tracking-wider mb-3">{{ $footerContact?->title ?? 'Visit Store' }}</h3>
                    <address class="text-white-50 small leading-relaxed">
                        <p class="mb-2"><i class="bi bi-geo-alt-fill text-warning me-2"></i> {{ $address }}</p>
                        <p class="mb-2"><i class="bi bi-telephone-fill text-warning me-2"></i> {{ $phone }}</p>
                        <p class="mb-2"><i class="bi bi-envelope-fill text-warning me-2"></i> {{ $email }}</p>
                    </address>
                </div>
            </div>

            <!-- Footer Bottom -->
            <hr class="border-secondary">
            <div class="row py-3 align-items-center text-center text-md-start">
                <div class="col-md-6 text-white-50 small">
                    &copy; {{ date('Y') }} RR Gems Udaipur. All Rights Reserved. Designed by Antigravity.
                </div>
                <div class="col-md-6 text-md-end text-center mt-3 mt-md-0">
                    <span class="text-white-50 small me-3">We Accept:</span>
                    <i class="bi bi-credit-card-2-back fs-4 text-white-50 me-2" title="Cards"></i>
                    <i class="bi bi-wallet2 fs-4 text-white-50 me-2" title="UPI / NetBanking"></i>
                    <i class="bi bi-cash-stack fs-4 text-white-50" title="Cash on Delivery"></i>
                </div>
            </div>
        </div>
    </footer>

    <!-- WhatsApp Floating Action Button -->
    <a href="https://wa.me/{{ $whatsapp }}?text={{ urlencode($whatsappMessage) }}" target="_blank" class="whatsapp-float">
        <i class="bi bi-whatsapp"></i>
    </a>

    <!-- Bootstrap 5 Bundle with Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @livewireScripts
</body>

</html>