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
        --rr-blue: #1a5fa8;
        --rr-blue-dark: #1e40af;
        --rr-white: #ffffff;
        --rr-text: #1f2937;
        --rr-red: #D0201A;
        --rr-gold: #C9922A;
        --rr-green: #1e7e34;
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
        white-space: nowrap;
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

    /* =========================
       MEGA MENU — GEMSTONES
    ========================== */
    .mega-dropdown-gemstones {
        position: static !important;
    }

    .mega-menu-gemstones {
        position: absolute !important;
        left: 0 !important;
        right: 0 !important;
        width: 100% !important;
        border-top: 3px solid var(--rr-gold) !important;
        border-radius: 0 !important;
        padding: 1.5rem 0 !important;
        box-shadow: 0 12px 40px rgba(0,0,0,.10) !important;
        margin-top: 0 !important;
        z-index: 1050 !important;
    }

    .mega-section-title {
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: #1a1a1a;
        padding-bottom: 8px;
        border-bottom: 2px solid var(--rr-gold);
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .mega-link {
        display: block;
        padding: 4px 0;
        font-size: 13px;
        color: #444;
        text-decoration: none;
        transition: color .2s, padding-left .2s;
        line-height: 1.5;
    }

    .mega-link:hover {
        color: var(--rr-gold);
        padding-left: 6px;
    }

    .mega-view-all {
        display: inline-block;
        margin-top: 12px;
        font-size: 12px;
        font-weight: 700;
        color: var(--rr-blue);
        text-decoration: none;
        letter-spacing: 0.04em;
    }

    .mega-view-all:hover {
        color: var(--rr-gold);
    }

    /* =========================
       MEGA MENU — JEWELLERY (fixed-position two-panel flyout)
    ========================== */

    .mega-dropdown-jewellery {
        position: static !important;
    }

    /* Outer left-panel box — position:fixed, coords set by JS on open */
    .jwl-outer {
        position: fixed !important;
        top: 0;
        left: 0;
        min-width: 220px !important;
        background: #fff !important;
        border: 1px solid #e0e0e0 !important;
        border-top: 3px solid var(--rr-gold) !important;
        border-radius: 0 0 4px 4px !important;
        box-shadow: 4px 8px 28px rgba(0,0,0,.13) !important;
        padding: 4px 0 !important;
        z-index: 9999 !important;
        display: none;
        /* no overflow hidden — sub-panel must escape */
    }

    .jwl-outer.open {
        display: block !important;
    }

    /* Each category row */
    .jwl-cat-row {
        position: relative;
    }

    .jwl-cat-label {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 12px 20px;
        font-size: 14px;
        font-weight: 400;
        color: #222;
        cursor: pointer;
        transition: background .12s, border-color .12s;
        border-left: 3px solid transparent;
        gap: 32px;
        user-select: none;
        white-space: nowrap;
    }

    .jwl-cat-label:hover,
    .jwl-cat-row.active > .jwl-cat-label {
        background: #f7f7f7;
        border-left-color: var(--rr-gold);
    }

    .jwl-arrow {
        font-size: 9px;
        color: #bbb;
        flex-shrink: 0;
        transition: color .12s;
    }

    .jwl-cat-row.active > .jwl-cat-label .jwl-arrow,
    .jwl-cat-label:hover .jwl-arrow {
        color: var(--rr-gold);
    }

    /* Sub-panel — fixed position, coords set by JS */
    .jwl-sub-panel {
        position: fixed !important;
        top: 0;
        left: 0;
        min-width: 250px;
        background: #fff;
        border: 1px solid #e0e0e0;
        border-top: 3px solid var(--rr-gold);
        border-radius: 0 0 4px 4px;
        box-shadow: 6px 8px 28px rgba(0,0,0,.12);
        padding: 4px 0;
        z-index: 10000;
        display: none;
    }

    .jwl-cat-row.active > .jwl-sub-panel {
        display: block;
    }

    .jwl-sub-link {
        display: block;
        padding: 11px 20px;
        font-size: 14px;
        color: #333;
        text-decoration: none;
        transition: background .1s, color .1s;
        white-space: nowrap;
    }

    .jwl-sub-link:hover {
        background: #f7f7f7;
        color: #111;
    }

    /* =========================
       RESPONSIVE — mobile
    ========================== */
    @media (max-width: 991.98px) {

        .mega-menu-gemstones {
            position: relative !important;
            width: 100% !important;
            box-shadow: none !important;
            border-top: none !important;
            border-left: 3px solid var(--rr-gold) !important;
            margin-left: 0.5rem;
        }

        .mega-menu-gemstones .row > [class*="col-"] {
            margin-bottom: 1rem;
        }

        /* On mobile the outer panel is not fixed — it sits inline */
        .jwl-outer {
            position: relative !important;
            top: auto !important;
            left: auto !important;
            width: 100% !important;
            box-shadow: none !important;
            border: none !important;
            border-left: 3px solid var(--rr-gold) !important;
            border-top: none !important;
            margin-left: 0.5rem;
        }

        .jwl-sub-panel {
            position: relative !important;
            top: auto !important;
            left: auto !important;
            width: 100% !important;
            box-shadow: none !important;
            border: none !important;
            border-left: 3px solid #eee !important;
            border-top: none !important;
            padding-left: 0.5rem;
        }
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
  
<nav class="navbar navbar-expand-lg bg-white border-bottom nav-bar-custom p-0 position-relative">
    <div class="container-fluid px-lg-4">

        <button class="navbar-toggler my-2 border" type="button"
            data-bs-toggle="collapse" data-bs-target="#storeNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="storeNavbar">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                {{-- HOME --}}
                <li class="nav-item">
                    <a class="nav-link px-3 py-3 {{ Request::is('/') ? 'active fw-semibold' : '' }}"
                        href="{{ url('/') }}">Home</a>
                </li>

                {{-- GEMSTONES mega menu --}}
                {{-- GEMSTONES mega menu --}}
                @if(isset($gemstonesCategory) && $gemstonesCategory)
                <li class="nav-item dropdown mega-dropdown-gemstones">
                    <a class="nav-link px-3 py-3 dropdown-toggle"
                        href="{{ url('/Gemstone-detailpage?category=' . $gemstonesCategory->slug) }}"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ $gemstonesCategory->name }}
                    </a>

                    <div class="dropdown-menu mega-menu-gemstones">
                        <div class="container-fluid px-lg-4">
                            <div class="row g-0">

                                @foreach($gemstonesCategory->children as $child)
                                <div class="col-6 col-md-3 col-lg p-3">
                                    <div class="mega-section-title">
                                        {{ $child->name }}
                                    </div>
                                    <ul class="list-unstyled mb-0">
                                        @foreach($child->children as $subChild)
                                        <li><a class="mega-link" href="{{ url('/Gemstone-detailpage?category=' . $subChild->slug) }}">{{ $subChild->name }}</a></li>
                                        @endforeach
                                        @if($child->children->isEmpty())
                                        <li><a class="mega-link" href="{{ url('/Gemstone-detailpage?category=' . $child->slug) }}">View {{ $child->name }}</a></li>
                                        @endif
                                    </ul>
                                </div>
                                @endforeach

                            </div>{{-- /row --}}
                        </div>{{-- /container --}}
                    </div>{{-- /mega-menu-gemstones --}}
                </li>
                @endif

                {{-- JEWELLERY two-panel flyout --}}
                @if(isset($jewelleryCategory) && $jewelleryCategory)
                <li class="nav-item mega-dropdown-jewellery" id="jwlDropdown">
                    <a class="nav-link px-3 py-3 dropdown-toggle"
                        href="{{ url('/Gemstone-detailpage?category=' . $jewelleryCategory->slug) }}"
                        id="jwlToggle">
                        {{ $jewelleryCategory->name }}
                    </a>

                    {{-- Outer box: left panel (category list) --}}
                    <div class="jwl-outer" id="jwlOuter">

                        @foreach($jewelleryCategory->children as $child)
                        <div class="jwl-cat-row" data-cat="{{ $child->slug }}">
                            <div class="jwl-cat-label">
                                {{ $child->name }} <span class="jwl-arrow">&#9654;</span>
                            </div>
                            <div class="jwl-sub-panel">
                                @foreach($child->children as $subChild)
                                <a class="jwl-sub-link" href="{{ url('/Gemstone-detailpage?category=' . $subChild->slug) }}">{{ $subChild->name }}</a>
                                @endforeach
                                @if($child->children->isEmpty())
                                <a class="jwl-sub-link" href="{{ url('/Gemstone-detailpage?category=' . $child->slug) }}">View All {{ $child->name }}</a>
                                @endif
                            </div>
                        </div>
                        @endforeach

                    </div>{{-- /jwl-outer --}}
                </li>
                @endif

                {{-- GEMS RECOMMENDATION --}}
                <li class="nav-item">
                    <a class="nav-link px-3 py-3"
                        href="{{ url('/Gems-recommendation') }}">Gems Recommendation</a>
                </li>

                {{-- CONTACT US --}}
                <li class="nav-item">
                    <a class="nav-link px-3 py-3"
                        href="{{ url('/contact-us') }}">Contact Us</a>
                </li>

                {{-- ABOUT US --}}
                <li class="nav-item">
                    <a class="nav-link px-3 py-3"
                        href="{{ url('/About-us') }}">About Us</a>
                </li>

                {{-- BLOGS --}}
                <li class="nav-item">
                    <a class="nav-link px-3 py-3"
                        href="{{ route('storefront.blog') }}">Blogs</a>
                </li>

            </ul>
        </div>{{-- /navbar-collapse --}}
    </div>{{-- /container --}}
</nav>

<script>
document.addEventListener('DOMContentLoaded', function () {

    var isMobile    = window.innerWidth < 992;
    var jwlDropdown = document.getElementById('jwlDropdown');
    var jwlToggle   = document.getElementById('jwlToggle');
    var jwlOuter    = document.getElementById('jwlOuter');
    var catRows     = jwlDropdown ? Array.prototype.slice.call(jwlDropdown.querySelectorAll('.jwl-cat-row')) : [];

    if (!jwlToggle || !jwlOuter) return;

    /* ── Position outer panel using fixed coords from navbar rect ── */
    function positionOuter() {
        if (isMobile) return;
        var rect = jwlToggle.getBoundingClientRect();
        jwlOuter.style.top  = rect.bottom + 'px';
        jwlOuter.style.left = rect.left + 'px';
    }

    /* ── Position sub-panel beside the hovered row ── */
    function positionSubPanel(row) {
        if (isMobile) return;
        var sub  = row.querySelector('.jwl-sub-panel');
        if (!sub) return;
        var outerRect = jwlOuter.getBoundingClientRect();
        var rowRect   = row.getBoundingClientRect();
        sub.style.top  = rowRect.top + 'px';
        sub.style.left = outerRect.right + 'px';
    }

    /* ── Open / close outer panel ── */
    jwlToggle.addEventListener('click', function (e) {
        e.preventDefault();
        var isOpen = jwlOuter.classList.contains('open');
        closeAll();
        if (!isOpen) {
            positionOuter();
            jwlOuter.classList.add('open');
        }
    });

    /* ── Hover rows to show sub-panel ── */
    catRows.forEach(function (row) {
        row.addEventListener('mouseenter', function () {
            if (isMobile) return;
            catRows.forEach(function (r) { r.classList.remove('active'); });
            row.classList.add('active');
            positionSubPanel(row);
        });

        /* Mobile: tap label to toggle sub-panel */
        var label = row.querySelector('.jwl-cat-label');
        if (label) {
            label.addEventListener('click', function (e) {
                if (!isMobile) return;
                e.stopPropagation();
                var wasActive = row.classList.contains('active');
                catRows.forEach(function (r) { r.classList.remove('active'); });
                if (!wasActive) row.classList.add('active');
            });
        }
    });

    /* Keep sub-panel visible while mouse is inside it */
    catRows.forEach(function (row) {
        var sub = row.querySelector('.jwl-sub-panel');
        if (!sub) return;
        sub.addEventListener('mouseenter', function () {
            catRows.forEach(function (r) { r.classList.remove('active'); });
            row.classList.add('active');
        });
        sub.addEventListener('mouseleave', function (e) {
            /* only deactivate if cursor left both sub-panel AND the row */
            var toEl = e.relatedTarget;
            if (toEl && (row.contains(toEl) || sub.contains(toEl))) return;
            row.classList.remove('active');
        });
    });

    /* Remove active when cursor leaves the left panel (but not into a sub-panel) */
    jwlOuter.addEventListener('mouseleave', function (e) {
        if (isMobile) return;
        var toEl = e.relatedTarget;
        /* if moving into a sub-panel, keep active */
        var intoSub = catRows.some(function (r) {
            var s = r.querySelector('.jwl-sub-panel');
            return s && s.contains(toEl);
        });
        if (!intoSub) {
            catRows.forEach(function (r) { r.classList.remove('active'); });
        }
    });

    /* ── Close everything ── */
    function closeAll() {
        jwlOuter.classList.remove('open');
        catRows.forEach(function (r) { r.classList.remove('active'); });
    }

    document.addEventListener('click', function (e) {
        /* ignore clicks inside outer panel or any sub-panel */
        if (jwlDropdown.contains(e.target)) return;
        var inSub = catRows.some(function (r) {
            var s = r.querySelector('.jwl-sub-panel');
            return s && s.contains(e.target);
        });
        if (!inSub) closeAll();
    });

    /* Re-position on scroll/resize so fixed coords stay correct */
    window.addEventListener('scroll', function () {
        if (jwlOuter.classList.contains('open')) {
            positionOuter();
            catRows.forEach(function (r) {
                if (r.classList.contains('active')) positionSubPanel(r);
            });
        }
    }, { passive: true });

    window.addEventListener('resize', function () {
        isMobile = window.innerWidth < 992;
        closeAll();
    });
});
</script>
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