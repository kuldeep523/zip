<div>
    @php $hero = $sliders->first(); @endphp

    <style>
        .hero-slider {
            position: relative;
            min-height: 520px;
            overflow: hidden;
            display: flex;
            align-items: center;
        }

        .hero-slider .hero-bg {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        /* Dark overlay so text is always readable over any image */
        .hero-slider::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(100deg, rgba(10, 10, 10, .78) 40%, rgba(10, 10, 10, .25) 100%);
        }

        .hero-content {
            position: relative;
            z-index: 2;
            padding-top: 3rem;
            padding-bottom: 3rem;
        }

        /* Gold pill subtitle badge */
        .hero-subtitle-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(232, 168, 0, .18);
            border: 1px solid rgba(232, 168, 0, .5);
            color: var(--rr-gold);
            font-size: .72rem;
            font-weight: 600;
            letter-spacing: .18em;
            text-transform: uppercase;
            padding: 5px 14px;
            border-radius: 50px;
        }

        /* Main heading */
        .hero-title {
            font-size: clamp(1.7rem, 4vw, 2.8rem);
            line-height: 1.2;
            color: #fff;
            font-weight: 700;
        }

        /* Primary CTA — solid gold */
        .btn-hero-primary {
            background: var(--rr-gold);
            color: #1a1000;
            font-weight: 600;
            font-size: .9rem;
            padding: 12px 28px;
            border: 2px solid var(--rr-gold);
            border-radius: 6px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: background .2s, color .2s;
            white-space: nowrap;
        }

        .btn-hero-primary:hover {
            background: #f5c200;
            border-color: #f5c200;
            color: #1a1000;
        }

        /* Secondary CTA — ghost white */
        .btn-hero-secondary {
            background: transparent;
            color: #fff;
            font-weight: 500;
            font-size: .9rem;
            padding: 12px 28px;
            border: 2px solid rgba(255, 255, 255, .55);
            border-radius: 6px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: background .2s, border-color .2s;
            white-space: nowrap;
        }

        .btn-hero-secondary:hover {
            background: rgba(255, 255, 255, .12);
            border-color: rgba(255, 255, 255, .85);
            color: #fff;
        }

        /* Trust badges strip */
        .hero-trust-strip {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid rgba(255, 255, 255, .12);
        }

        .trust-item {
            display: flex;
            align-items: center;
            gap: 7px;
            font-size: .78rem;
            color: rgba(255, 255, 255, .7);
        }

        .trust-item .trust-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            flex-shrink: 0;
        }
    </style>

    <section class="hero-slider">

        {{-- Background image --}}
        <img src="{{ asset($hero?->image ?? 'images/gems/hero_banner.png') }}"
            class="hero-bg"
            alt="Premium Gemstones Banner">

        <div class="container hero-content">
            <div class="row">
                <div class="col-lg-6 col-md-8">

                    {{-- Subtitle badge --}}
                    <span class="hero-subtitle-badge">
                        <i class="bi bi-gem"></i>
                        {{ $hero?->subtitle ?? 'Vedic Astrology Approved' }}
                    </span>

                    {{-- Main heading --}}
                    <h2 class="hero-title mt-3 mb-3">
                        {{ $hero?->title ?? '100% Natural Astrological Gemstones' }}
                    </h2>

                    {{-- Description --}}
                    <p class="mb-4" style="color:rgba(255,255,255,.65);font-size:.95rem;line-height:1.7;max-width:480px">
                        {{ $hero?->description }}
                    </p>

                    {{-- CTA Buttons --}}
                    <div class="d-flex flex-wrap gap-3">
                        <a href="{{ url($hero?->btn_primary_url ?? '/shop') }}" class="btn-hero-primary">
                            {{ $hero?->btn_primary_text ?? 'Explore Store' }}
                            <i class="bi bi-arrow-right"></i>
                        </a>
                        <a href="{{ $hero?->btn_secondary_url ?? '#astro-finder' }}" class="btn-hero-secondary">
                            <i class="bi bi-stars"></i>
                            {{ $hero?->btn_secondary_text ?? 'Gem Finder' }}
                        </a>
                    </div>

                    {{-- Trust strip --}}
                    <div class="hero-trust-strip">
                        <span class="trust-item">
                            <span class="trust-dot" style="background:var(--rr-gold)"></span>
                            GIA / IGI Certified
                        </span>
                        <span class="trust-item">
                            <span class="trust-dot" style="background:var(--rr-green)"></span>
                            100% Natural Gems
                        </span>
                        <span class="trust-item">
                            <span class="trust-dot" style="background:var(--rr-blue)"></span>
                            Free Expert Consultation
                        </span>
                        <span class="trust-item">
                            <span class="trust-dot" style="background:var(--rr-red)"></span>
                            Easy Returns
                        </span>
                    </div>

                </div>
            </div>
        </div>

    </section>

    <!-- Trust Badges Section -->

    <style>
        .trust-card {
            transition: box-shadow .2s, transform .2s;
            cursor: default;
        }

        .trust-card:hover {
            box-shadow: 0 4px 18px rgba(0, 0, 0, .09) !important;
            transform: translateY(-2px);
        }

        .trust-icon-wrap {
            width: 52px;
            height: 52px;
            min-width: 52px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
        }
    </style>

    <section class="py-4 bg-white border-bottom shadow-sm">
        <div class="container">
            <div class="row g-3">
                @foreach($trustBadges as $badge)
                <div class="col-lg-3 col-sm-6 d-flex">
                    <div class="trust-card d-flex align-items-center gap-3 p-3 rounded-3 border w-100 bg-white">
                        <div class="trust-icon-wrap {{ $badge->bg_class ?? 'bg-warning bg-opacity-10' }}">
                            <i class="bi {{ $badge->icon }}" style="color:var({{ $badge->color_var ?? '--rr-gold' }})"></i>
                        </div>
                        <div>
                            <h6 class="mb-1 fw-bold">{{ $badge->title }}</h6>
                            <small class="text-muted">{{ $badge->subtitle }}</small>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>



    <!-- Shop by Gemstone Categories -->


    <section class="lux-section">
        <div class="lux-container">

            <div class="lux-header">
                <div class="lux-eyebrow">
                    <span class="lux-eyebrow-line"></span>
                    <span class="lux-eyebrow-text">
                        {{ $eyebrows['shop_categories'] ?? 'Curated Collections' }}
                    </span>
                    <span class="lux-eyebrow-line"></span>
                </div>
                <h2 class="lux-title">
                    Shop by <em>{{ $sections['shop_categories'] ?? 'Gemstone' }}</em>
                </h2>
            </div>

            <div class="lux-grid">
                @foreach($homeCategories as $index => $cat)

                @php
                $origins = [
                'Burma · Mozambique',
                'Kashmir · Ceylon',
                'Colombia · Zambia',
                'Brazil · Madagascar',
                'Australia · Russia',
                'South Africa · India',
                ];
                $origin = $origins[$index % count($origins)];
                $num = str_pad($index + 1, 2, '0', STR_PAD_LEFT);
                @endphp

                <a href="{{ route('storefront.gemstones.category', $cat->slug) }}" class="lux-card">

                    <div class="lux-img-wrap">
                        <img
                            src="{{ asset($cat->home_image ?? 'images/gems/hero_banner.png') }}"
                            alt="{{ $cat->name }}">
                    </div>

                    <div class="lux-overlay-bottom"></div>



                    <div class="lux-body">
                        <span class="lux-number">{{ $num }}</span>
                        <p class="lux-name">{{ $cat->name }}</p>
                        <p class="lux-origin">{{ $cat->origin ?? $origin }}</p>
                        <div class="lux-divider"></div>
                        <span class="lux-cta">
                            Explore
                            <span class="lux-cta-arrow"></span>
                        </span>
                    </div>

                    <div class="lux-border-wrap"></div>

                </a>
                @endforeach
            </div>

        </div>
    </section>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Jost:wght@300;400;500&display=swap');

        .lux-section {
            background: #f7f3ee;
            padding: 80px 0 90px;
            font-family: 'Jost', sans-serif;
        }

        .lux-container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 28px;
        }

        /* ── Header ── */
        .lux-header {
            text-align: center;
            margin-bottom: 56px;
        }

        .lux-eyebrow {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 14px;
            margin-bottom: 18px;
        }

        .lux-eyebrow-line {
            width: 40px;
            height: 0.5px;
            background: #b8973a;
        }

        .lux-eyebrow-text {
            font-size: 11px;
            font-weight: 400;
            letter-spacing: .28em;
            text-transform: uppercase;
            color: #b8973a;
        }

        .lux-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 44px;
            font-weight: 300;
            color: #1a1108;
            letter-spacing: .03em;
            line-height: 1.15;
            margin: 0;
        }

        .lux-title em {
            font-style: italic;
            color: #9a7420;
        }

        /* ── Grid ── */
        .lux-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        /* ── Card ── */
        .lux-card {
            position: relative;
            display: block;
            text-decoration: none;
            overflow: hidden;
            cursor: pointer;
            background: #fff;
            border-radius: 16px;
            border: 0.5px solid #e5ddd0;
            transition: border-color .4s ease;
        }

        .lux-card:hover {
            border-color: rgba(184, 151, 58, .5);
        }

        /* ── Image ── */
        .lux-img-wrap {
            width: 100%;
            aspect-ratio: 3 / 4;
            overflow: hidden;
        }

        .lux-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform .7s ease;
        }

        .lux-card:hover .lux-img-wrap img {
            transform: scale(1.06);
        }

        /* ── Gradient overlay ── */
        .lux-overlay-bottom {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 58%;
            background: linear-gradient(to top,
                    rgba(255, 255, 255, 1) 0%,
                    rgba(255, 255, 255, 0.59) 45%,
                    transparent 100%);
            pointer-events: none;
        }

        /* ── Diamond accent ── */
        .lux-accent-top {
            position: absolute;
            top: 16px;
            right: 16px;
            width: 30px;
            height: 30px;
            background: rgba(247, 243, 238, .88);
            border: 0.5px solid rgba(184, 151, 58, .5);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .lux-diamond {
            width: 8px;
            height: 8px;
            background: #b8973a;
            transform: rotate(45deg);
        }

        /* ── Body text ── */
        .lux-body {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 20px 22px 26px;
        }

        .lux-number {
            display: block;
            font-family: 'Cormorant Garamond', serif;
            font-size: 11px;
            font-weight: 400;
            color: #b8973a;
            letter-spacing: .22em;
            margin-bottom: 5px;
        }

        .lux-name {
            font-family: 'Cormorant Garamond', serif;
            font-size: 28px;
            font-weight: 300;
            color: #1a1108;
            letter-spacing: .04em;
            line-height: 1.1;
            margin: 0 0 4px;
        }

        .lux-origin {
            font-size: 11px;
            font-weight: 300;
            color: #9a8060;
            letter-spacing: .12em;
            text-transform: uppercase;
            margin: 0 0 16px;
        }

        .lux-divider {
            width: 24px;
            height: 0.5px;
            background: #b8973a;
            margin-bottom: 13px;
            transition: width .4s ease;
        }

        .lux-card:hover .lux-divider {
            width: 48px;
        }

        /* ── CTA ── */
        .lux-cta {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 11px;
            font-weight: 400;
            letter-spacing: .18em;
            text-transform: uppercase;
            color: #9a7420;
            transition: gap .3s ease;
        }

        .lux-card:hover .lux-cta {
            gap: 14px;
        }

        .lux-cta-arrow {
            width: 20px;
            height: 0.5px;
            background: #9a7420;
            position: relative;
            transition: width .3s ease;
        }

        .lux-cta-arrow::after {
            content: '';
            position: absolute;
            right: 0;
            top: -2.5px;
            width: 5px;
            height: 5px;
            border-right: 0.5px solid #9a7420;
            border-top: 0.5px solid #9a7420;
            transform: rotate(45deg);
        }

        .lux-card:hover .lux-cta-arrow {
            width: 32px;
        }

        /* ── Hover border overlay ── */
        .lux-border-wrap {
            position: absolute;
            inset: 0;
            border: 0.5px solid transparent;
            border-radius: 16px;
            transition: border-color .4s ease;
            pointer-events: none;
        }

        .lux-card:hover .lux-border-wrap {
            border-color: rgba(184, 151, 58, .45);
        }

        /* ── Tablet ── */
        @media (max-width: 900px) {
            .lux-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        /* ── Mobile ── */
        @media (max-width: 560px) {
            .lux-grid {
                grid-template-columns: 1fr;
            }

            .lux-title {
                font-size: 32px;
            }

            .lux-section {
                padding: 56px 0 64px;
            }
        }
    </style>




    <!-- Best Sellers / Featured Stock Section -->
    <section class="bs-section">
        <div class="bs-container">

            <div class="bs-header">
                <div class="bs-eyebrow">
                    <span class="bs-eyebrow-line"></span>
                    <span class="bs-eyebrow-text">
                        {{ $eyebrows['best_sellers'] ?? 'Limited Authentic Stocks' }}
                    </span>
                    <span class="bs-eyebrow-line"></span>
                </div>
                <h2 class="bs-title">
                    {{ $sections['best_sellers'] ?? 'Best Seller' }}
                    <em>Vedic Gems</em>
                </h2>
                @if(!empty($descriptions['best_sellers']))
                <p class="bs-desc">{{ $descriptions['best_sellers'] }}</p>
                @endif
            </div>

            <div class="bs-grid">
                @foreach($featuredGems as $gem)
                <div class="bs-card">

                    <div class="bs-img-wrap">
                        <img
                            src="{{ asset($gem->image_path) }}"
                            alt="{{ $gem->name }}">
                        <span class="bs-tag">Certified Natural</span>
                        <span class="bs-weight">
                            {{ $gem->weight }} {{ $gem->weight_unit }}
                        </span>
                    </div>

                    <div class="bs-body">
                        <span class="bs-cat">{{ $gem->category }}</span>
                        <a href="{{ url('/gemstone/' . $gem->slug) }}" class="bs-name">
                            {{ $gem->name }}
                        </a>
                        <div class="bs-meta">
                            <div class="bs-origin">
                                <span>Origin</span>
                                {{ $gem->origin }}
                            </div>
                            <span class="bs-price">₹{{ number_format($gem->price, 2) }}</span>
                        </div>
                        <div class="bs-actions">
                            <button
                                class="bs-btn-cart"
                                wire:click="addToCart({{ $gem->id }})">
                                <svg class="bs-btn-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z" />
                                    <line x1="3" y1="6" x2="21" y2="6" />
                                    <path d="M16 10a4 4 0 01-8 0" />
                                </svg>
                                Add to Cart
                            </button>
                            <a
                                href="https://wa.me/{{ $whatsapp }}?text=Hi! I am interested in buying {{ urlencode($gem->name) }} (Weight: {{ $gem->weight_ratti }} Ratti). Please send video/details."
                                target="_blank"
                                class="bs-btn-wa">
                                <svg class="bs-btn-icon" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                                </svg>
                                Ask on WhatsApp
                            </a>
                        </div>
                    </div>

                </div>
                @endforeach
            </div>

        </div>
    </section>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Jost:wght@300;400;500&display=swap');

        .bs-section {
            background: #f9f7f4;
            padding: 80px 0 90px;
            font-family: 'Jost', sans-serif;
        }

        .bs-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 28px;
        }

        /* ── Header ── */
        .bs-header {
            text-align: center;
            max-width: 600px;
            margin: 0 auto 56px;
        }

        .bs-eyebrow {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            margin-bottom: 14px;
        }

        .bs-eyebrow-line {
            width: 36px;
            height: 0.5px;
            background: #d4610a;
        }

        .bs-eyebrow-text {
            font-size: 11px;
            font-weight: 500;
            letter-spacing: .24em;
            text-transform: uppercase;
            color: #d4610a;
        }

        .bs-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 40px;
            font-weight: 300;
            color: #0d1b3e;
            letter-spacing: .02em;
            line-height: 1.2;
            margin: 0 0 14px;
        }

        .bs-title em {
            font-style: italic;
            color: #d4610a;
        }

        .bs-desc {
            font-size: 14px;
            color: #6b7280;
            line-height: 1.7;
            font-weight: 300;
            margin: 0;
        }

        /* ── Grid ── */
        .bs-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        /* ── Card ── */
        .bs-card {
            background: #fff;
            border-radius: 14px;
            border: 0.5px solid #ede8e0;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: border-color .35s ease, transform .35s ease;
        }

        .bs-card:hover {
            border-color: rgba(212, 97, 10, .4);
            transform: translateY(-4px);
        }

        /* ── Image ── */
        .bs-img-wrap {
            position: relative;
            width: 100%;
            aspect-ratio: 1 / 1;
            overflow: hidden;
            background: #f3ede4;
        }

        .bs-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform .6s ease;
        }

        .bs-card:hover .bs-img-wrap img {
            transform: scale(1.07);
        }

        .bs-tag {
            position: absolute;
            top: 10px;
            left: 10px;
            background: #0d3b8e;
            color: #fff;
            font-size: 9px;
            font-weight: 500;
            letter-spacing: .14em;
            text-transform: uppercase;
            padding: 4px 9px;
            border-radius: 20px;
        }

        .bs-weight {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background: rgba(255, 255, 255, .92);
            border: 0.5px solid #ede8e0;
            color: #0d1b3e;
            font-size: 10px;
            font-weight: 500;
            padding: 3px 9px;
            border-radius: 20px;
            letter-spacing: .06em;
        }

        /* ── Body ── */
        .bs-body {
            padding: 16px 16px 18px;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .bs-cat {
            font-size: 10px;
            font-weight: 500;
            letter-spacing: .18em;
            text-transform: uppercase;
            color: #d4610a;
            margin-bottom: 5px;
        }

        .bs-name {
            font-family: 'Cormorant Garamond', serif;
            font-size: 19px;
            font-weight: 400;
            color: #0d1b3e;
            line-height: 1.25;
            margin-bottom: 12px;
            text-decoration: none;
            display: block;
            transition: color .2s;
        }

        .bs-name:hover {
            color: #d4610a;
        }

        .bs-meta {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 14px;
            padding-bottom: 14px;
            border-bottom: 0.5px solid #f0ebe2;
        }

        .bs-origin {
            font-size: 12px;
            color: #9a8c7a;
            font-weight: 300;
        }

        .bs-origin span {
            display: block;
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: .12em;
            color: #b0a090;
            margin-bottom: 2px;
        }

        .bs-price {
            font-family: 'Cormorant Garamond', serif;
            font-size: 22px;
            font-weight: 400;
            color: #0d3b8e;
            letter-spacing: .01em;
        }

        /* ── Buttons ── */
        .bs-actions {
            display: flex;
            flex-direction: column;
            gap: 8px;
            margin-top: auto;
        }

        .bs-btn-cart {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            padding: 10px 14px;
            border-radius: 8px;
            background: #0d3b8e;
            color: #fff;
            font-family: 'Jost', sans-serif;
            font-size: 12px;
            font-weight: 500;
            letter-spacing: .08em;
            text-transform: uppercase;
            border: none;
            cursor: pointer;
            transition: background .25s ease;
            width: 100%;
        }

        .bs-btn-cart:hover {
            background: #0a2e6e;
        }

        .bs-btn-wa {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            padding: 9px 14px;
            border-radius: 8px;
            background: #fff;
            color: #d4610a;
            font-family: 'Jost', sans-serif;
            font-size: 12px;
            font-weight: 500;
            letter-spacing: .08em;
            text-transform: uppercase;
            border: 0.5px solid #d4610a;
            cursor: pointer;
            text-decoration: none;
            transition: background .25s ease, color .25s ease;
            width: 100%;
        }

        .bs-btn-wa:hover {
            background: #d4610a;
            color: #fff;
        }

        .bs-btn-icon {
            width: 14px;
            height: 14px;
            flex-shrink: 0;
        }

        /* ── Tablet ── */
        @media (max-width: 1024px) {
            .bs-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 768px) {
            .bs-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .bs-title {
                font-size: 32px;
            }
        }

        /* ── Mobile ── */
        @media (max-width: 480px) {
            .bs-grid {
                grid-template-columns: 1fr;
            }

            .bs-section {
                padding: 56px 0 64px;
            }
        }
    </style>



    <section class="bs2-section">
        <div class="bs2-container">

            <div class="bs2-eyebrow">
                <span class="bs2-eyebrow-line"></span>
                <span class="bs2-eyebrow-text">Our Heritage</span>
                <span class="bs2-eyebrow-line"></span>
            </div>

            <h2 class="bs2-title">Our Brand <em>Story</em></h2>
            <p class="bs2-subtitle">Three generations of gemstone wisdom</p>

            <div class="bs2-video-wrap" id="bsVideoWrap">
             <video width="100%" controls autoplay muted loop>
                <source src="{{ asset('images/WhatsApp Video 2026-06-04 at 5.31.13 PM.MP4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
                <div class="bs2-overlay"></div>
                <button class="bs2-play" id="bsPlayBtn" aria-label="Play brand story video">
                    <span class="bs2-play-icon"></span>
                </button>
                <div class="bs2-video-label">
                    <p>Watch our story &nbsp;·&nbsp; 3 min</p>
                </div>
            </div>

            <div class="bs2-divider"></div>

            <p class="bs2-text">
                What began as a humble gem trader's stall in Jaipur's Johari Bazaar has grown into
                one of India's most trusted names in certified Vedic gemstones. Our founder spent
                decades building relationships with miners across Burma, Ceylon, and Colombia.
            </p>
            <p class="bs2-text">
                Every stone we offer passes through our in-house gemologists and receives independent
                laboratory certification — because we believe the right gemstone, chosen with
                intention and authenticity, can truly transform a life.
            </p>

        </div>
    </section>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;1,300;1,400&family=Jost:wght@300;400;500&display=swap');

        .bs2-section {
            background: #fff;
            padding: 80px 0 90px;
            font-family: 'Jost', sans-serif;
            text-align: center;
        }

        .bs2-container {
            max-width: 900px;
            margin: 0 auto;
            padding: 0 28px;
        }

        /* ── Eyebrow ── */
        .bs2-eyebrow {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            margin-bottom: 16px;
        }

        .bs2-eyebrow-line {
            width: 36px;
            height: 0.5px;
            background: #d4610a;
        }

        .bs2-eyebrow-text {
            font-size: 11px;
            font-weight: 500;
            letter-spacing: .24em;
            text-transform: uppercase;
            color: #d4610a;
        }

        /* ── Heading ── */
        .bs2-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 46px;
            font-weight: 300;
            color: #0d1b3e;
            line-height: 1.15;
            margin: 0 0 8px;
        }

        .bs2-title em {
            font-style: italic;
            color: #d4610a;
        }

        .bs2-subtitle {
            font-family: 'Cormorant Garamond', serif;
            font-size: 17px;
            font-style: italic;
            font-weight: 300;
            color: #9a8060;
            margin: 0 0 44px;
            letter-spacing: .02em;
        }

        /* ── Video ── */
        .bs2-video-wrap {
            position: relative;
            width: 100%;
            aspect-ratio: 16 / 9;
            border-radius: 20px;
            overflow: hidden;
            background: #0d1b3e;
            cursor: pointer;
            margin-bottom: 44px;
        }

        .bs2-video-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            opacity: .8;
            transition: opacity .4s ease;
        }

        .bs2-video-wrap:hover img {
            opacity: .92;
        }

        .bs2-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top,
                    rgba(13, 27, 62, .65) 0%,
                    rgba(13, 27, 62, .1) 55%,
                    transparent 100%);
            pointer-events: none;
        }

        .bs2-play {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 72px;
            height: 72px;
            background: rgba(255, 255, 255, .15);
            border: 0.5px solid rgba(255, 255, 255, .55);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background .3s ease, transform .3s ease;
        }

        .bs2-video-wrap:hover .bs2-play {
            background: rgba(255, 255, 255, .28);
            transform: translate(-50%, -50%) scale(1.08);
        }

        .bs2-play-icon {
            width: 0;
            height: 0;
            border-top: 11px solid transparent;
            border-bottom: 11px solid transparent;
            border-left: 19px solid #fff;
            margin-left: 5px;
            pointer-events: none;
        }

        .bs2-video-label {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            white-space: nowrap;
            pointer-events: none;
        }

        .bs2-video-label p {
            font-size: 11px;
            font-weight: 400;
            letter-spacing: .18em;
            text-transform: uppercase;
            color: rgba(255, 255, 255, .7);
        }

        /* ── Text ── */
        .bs2-divider {
            width: 40px;
            height: 0.5px;
            background: #d4610a;
            margin: 0 auto 28px;
        }

        .bs2-text {
            max-width: 680px;
            margin: 0 auto 14px;
            font-size: 15px;
            color: #4b4438;
            line-height: 1.85;
            font-weight: 300;
        }

        .bs2-text:last-child {
            margin-bottom: 0;
        }

        /* ── Tablet ── */
        @media (max-width: 768px) {
            .bs2-title {
                font-size: 36px;
            }
        }

        /* ── Mobile ── */
        @media (max-width: 480px) {
            .bs2-section {
                padding: 56px 0 64px;
            }

            .bs2-title {
                font-size: 28px;
            }

            .bs2-play {
                width: 56px;
                height: 56px;
            }
        }
    </style>

    <script>
        document.getElementById('bsPlayBtn').addEventListener('click', function() {
            const wrap = document.getElementById('bsVideoWrap');

            // ── Replace with your YouTube video ID below ──
            const youtubeId = 'YOUR_YOUTUBE_VIDEO_ID';

            wrap.innerHTML = `
            <iframe
                width="100%"
                height="100%"
                src="https://www.youtube.com/embed/${youtubeId}?autoplay=1"
                frameborder="0"
                allow="autoplay; encrypted-media; fullscreen"
                allowfullscreen
                style="position:absolute;inset:0;border-radius:20px;border:none;">
            </iframe>`;

            wrap.style.position = 'relative';
        });
    </script>





    <style>
        /* ── Reset ── */
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        /* ── Section ── */
        .grs-section {
            background: #f9f7f4;
            padding: 80px 0 90px;
            font-family: 'Jost', sans-serif;
            overflow: hidden;
        }

        .grs-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 28px;
        }

        /* ── Header Row ── */
        .grs-top {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 48px;
        }

        .grs-eyebrow {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 14px;
        }

        .grs-eyebrow-line {
            width: 36px;
            height: 0.5px;
            background: #d4610a;
        }

        .grs-eyebrow-text {
            font-size: 11px;
            font-weight: 500;
            letter-spacing: 0.24em;
            text-transform: uppercase;
            color: #d4610a;
        }

        .grs-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 40px;
            font-weight: 300;
            color: #0d1b3e;
            line-height: 1.15;
        }

        .grs-title em {
            font-style: italic;
            color: #d4610a;
        }

        .grs-subtitle {
            font-size: 13px;
            font-weight: 300;
            color: #9a8060;
            margin-top: 6px;
            letter-spacing: 0.04em;
        }

        /* ── Navigation ── */
        .grs-nav {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-shrink: 0;
        }

        .grs-nav-btn {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            border: 0.5px solid #d4b86a;
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background 0.25s, border-color 0.25s;
        }

        .grs-nav-btn:hover {
            background: #0d3b8e;
            border-color: #0d3b8e;
        }

        .grs-nav-btn:hover svg {
            stroke: #fff;
        }

        .grs-nav-btn svg {
            width: 16px;
            height: 16px;
            stroke: #0d3b8e;
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
            transition: stroke 0.25s;
        }

        .grs-progress {
            font-family: 'Cormorant Garamond', serif;
            font-size: 15px;
            color: #9a8060;
            min-width: 44px;
            text-align: center;
        }

        /* ── Slider Track ── */
        .grs-track-wrap {
            overflow: hidden;
            margin: 0 -28px;
            padding: 0 28px 8px;
        }

        .grs-track {
            display: flex;
            gap: 20px;
            transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            will-change: transform;
        }

        /* ── Cards ── */
        .grs-card {
            flex: 0 0 calc(25% - 15px);
            min-width: 0;
            background: #fff;
            border-radius: 16px;
            border: 0.5px solid #ede8e0;
            overflow: hidden;
            cursor: pointer;
            transition: border-color 0.3s, transform 0.3s;
        }

        .grs-card:hover {
            border-color: rgba(212, 97, 10, 0.4);
            transform: translateY(-4px);
        }

        /* ── Card Image ── */
        .grs-img {
            position: relative;
            width: 100%;
            aspect-ratio: 3 / 4;
            overflow: hidden;
            background: #f3ede4;
        }

        .grs-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s;
        }

        .grs-card:hover .grs-img img {
            transform: scale(1.06);
        }

        /* ── Badges ── */
        .grs-cert-badge {
            position: absolute;
            top: 12px;
            left: 12px;
            background: #0d3b8e;
            color: #fff;
            font-size: 9px;
            font-weight: 500;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            padding: 4px 9px;
            border-radius: 20px;
        }

        .grs-lab-badge {
            position: absolute;
            top: 12px;
            right: 12px;
            background: rgba(247, 243, 238, 0.95);
            border: 0.5px solid #d4b86a;
            color: #7a5c10;
            font-size: 9px;
            font-weight: 500;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            padding: 4px 9px;
            border-radius: 20px;
        }

        .grs-weight {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background: rgba(255, 255, 255, 0.92);
            border: 0.5px solid #ede8e0;
            color: #0d1b3e;
            font-size: 10px;
            font-weight: 500;
            padding: 3px 8px;
            border-radius: 20px;
        }

        /* ── Card Body ── */
        .grs-body {
            padding: 16px 16px 18px;
        }

        .grs-cat {
            font-size: 10px;
            font-weight: 500;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: #d4610a;
            margin-bottom: 5px;
        }

        .grs-name {
            font-family: 'Cormorant Garamond', serif;
            font-size: 18px;
            font-weight: 400;
            color: #0d1b3e;
            line-height: 1.2;
            margin-bottom: 10px;
        }

        .grs-meta {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            padding-top: 10px;
            border-top: 0.5px solid #f0ebe2;
        }

        .grs-origin {
            font-size: 11px;
            color: #9a8060;
            font-weight: 300;
        }

        .grs-origin span {
            display: block;
            font-size: 9px;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            color: #b0a090;
            margin-bottom: 2px;
        }

        .grs-price {
            font-family: 'Cormorant Garamond', serif;
            font-size: 20px;
            font-weight: 400;
            color: #0d3b8e;
        }

        /* ── Dot Indicators ── */
        .grs-dots {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin-top: 32px;
        }

        .grs-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #ddd6cb;
            cursor: pointer;
            transition: background 0.3s, width 0.3s;
            border: none;
        }

        .grs-dot.active {
            background: #d4610a;
            width: 22px;
            border-radius: 3px;
        }

        /* Responsive Media Queries */
        @media (max-width: 1024px) {
            .grs-card { flex: 0 0 calc(33.333% - 13.33px); }
        }
        @media (max-width: 768px) {
            .grs-card { flex: 0 0 calc(50% - 10px); }
            .grs-top { flex-direction: column; align-items: flex-start; gap: 15px; }
            .grs-title { font-size: 32px; }
            .grs-section { padding: 40px 0 50px; }
        }
        @media (max-width: 480px) {
            .grs-card { flex: 0 0 calc(100%); }
            .grs-title { font-size: 28px; }
        }
    </style>

    <section class="grs-section" aria-label="GRS Certified Gemstone Collection">
        <div class="grs-container">

            <!-- Header -->
            <div class="grs-top">
                <div>
                    <div class="grs-eyebrow">
                        <span class="grs-eyebrow-line"></span>
                        <span class="grs-eyebrow-text">GRS Certified</span>
                    </div>
                    <h2 class="grs-title">Premium <em>GRS Collection</em></h2>
                    <p class="grs-subtitle">Lab-certified by Gem Research Swisslab — the world's most trusted gemological authority</p>
                </div>

                <div class="grs-nav">
                    <button class="grs-nav-btn" id="grsPrev" aria-label="Previous slide">
                        <svg viewBox="0 0 24 24">
                            <polyline points="15 18 9 12 15 6" />
                        </svg>
                    </button>
                    <span class="grs-progress" id="grsProgress">1 / 3</span>
                    <button class="grs-nav-btn" id="grsNext" aria-label="Next slide">
                        <svg viewBox="0 0 24 24">
                            <polyline points="9 18 15 12 9 6" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Slider -->
            <div class="grs-track-wrap">
                <div class="grs-track" id="grsTrack">

                    <div class="grs-card">
                        <div class="grs-img">
                            <img src="https://images.unsplash.com/photo-1611652022419-a9419f74343d?w=400&q=80" alt="Burmese Pigeon Blood Ruby">
                            <span class="grs-cert-badge">Certified</span>
                            <span class="grs-lab-badge">GRS</span>
                            <span class="grs-weight">5.25 Ratti</span>
                        </div>
                        <div class="grs-body">
                            <p class="grs-cat">Ruby · Manik</p>
                            <p class="grs-name">Burmese Pigeon Blood Ruby</p>
                            <div class="grs-meta">
                                <div class="grs-origin"><span>Origin</span>Burma</div>
                                <span class="grs-price">₹1,20,000</span>
                            </div>
                        </div>
                    </div>

                    <div class="grs-card">
                        <div class="grs-img">
                            <img src="https://images.unsplash.com/photo-1598300042247-d088f8ab3a91?w=400&q=80" alt="Kashmir Blue Sapphire">
                            <span class="grs-cert-badge">Certified</span>
                            <span class="grs-lab-badge">GRS</span>
                            <span class="grs-weight">6.10 Ratti</span>
                        </div>
                        <div class="grs-body">
                            <p class="grs-cat">Sapphire · Neelam</p>
                            <p class="grs-name">Kashmir Blue Sapphire</p>
                            <div class="grs-meta">
                                <div class="grs-origin"><span>Origin</span>Kashmir</div>
                                <span class="grs-price">₹2,85,000</span>
                            </div>
                        </div>
                    </div>

                    <div class="grs-card">
                        <div class="grs-img">
                            <img src="https://images.unsplash.com/photo-1589128777073-263566ae5e4d?w=400&q=80" alt="Colombian Vivid Emerald">
                            <span class="grs-cert-badge">Certified</span>
                            <span class="grs-lab-badge">GRS</span>
                            <span class="grs-weight">4.80 Ratti</span>
                        </div>
                        <div class="grs-body">
                            <p class="grs-cat">Emerald · Panna</p>
                            <p class="grs-name">Colombian Vivid Emerald</p>
                            <div class="grs-meta">
                                <div class="grs-origin"><span>Origin</span>Colombia</div>
                                <span class="grs-price">₹95,000</span>
                            </div>
                        </div>
                    </div>

                    <div class="grs-card">
                        <div class="grs-img">
                            <img src="https://images.unsplash.com/photo-1506630448388-4e683c67ddb0?w=400&q=80" alt="Ceylon Yellow Sapphire">
                            <span class="grs-cert-badge">Certified</span>
                            <span class="grs-lab-badge">GRS</span>
                            <span class="grs-weight">7.00 Ratti</span>
                        </div>
                        <div class="grs-body">
                            <p class="grs-cat">Yellow Sapphire · Pukhraj</p>
                            <p class="grs-name">Ceylon Yellow Sapphire</p>
                            <div class="grs-meta">
                                <div class="grs-origin"><span>Origin</span>Sri Lanka</div>
                                <span class="grs-price">₹48,000</span>
                            </div>
                        </div>
                    </div>

                    <div class="grs-card">
                        <div class="grs-img">
                            <img src="https://images.unsplash.com/photo-1560942485-d212be198e4a?w=400&q=80" alt="Brazilian Alexandrite">
                            <span class="grs-cert-badge">Certified</span>
                            <span class="grs-lab-badge">GRS</span>
                            <span class="grs-weight">3.50 Ratti</span>
                        </div>
                        <div class="grs-body">
                            <p class="grs-cat">Alexandrite · Lehsunia</p>
                            <p class="grs-name">Brazilian Alexandrite</p>
                            <div class="grs-meta">
                                <div class="grs-origin"><span>Origin</span>Brazil</div>
                                <span class="grs-price">₹3,40,000</span>
                            </div>
                        </div>
                    </div>

                    <div class="grs-card">
                        <div class="grs-img">
                            <img src="https://images.unsplash.com/photo-1573408301185-9519f94816c5?w=400&q=80" alt="Burmese Red Spinel">
                            <span class="grs-cert-badge">Certified</span>
                            <span class="grs-lab-badge">GRS</span>
                            <span class="grs-weight">4.20 Ratti</span>
                        </div>
                        <div class="grs-body">
                            <p class="grs-cat">Red Spinel · Lal</p>
                            <p class="grs-name">Burmese Red Spinel</p>
                            <div class="grs-meta">
                                <div class="grs-origin"><span>Origin</span>Burma</div>
                                <span class="grs-price">₹75,000</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Dots -->
            <div class="grs-dots" id="grsDots"></div>

        </div>
    </section>

    <script>
        (function() {
            const track = document.getElementById('grsTrack');
            const prevBtn = document.getElementById('grsPrev');
            const nextBtn = document.getElementById('grsNext');
            const progress = document.getElementById('grsProgress');
            const dotsWrap = document.getElementById('grsDots');

            const cards = track.querySelectorAll('.grs-card');
            const total = cards.length;
            let current = 0;
            let visible = 4;
            let maxIdx = 0;

            function updateMetrics() {
                if (window.innerWidth <= 480) {
                    visible = 1;
                } else if (window.innerWidth <= 768) {
                    visible = 2;
                } else if (window.innerWidth <= 1024) {
                    visible = 3;
                } else {
                    visible = 4;
                }
                maxIdx = Math.max(0, total - visible);
                if (current > maxIdx) current = maxIdx;
            }

            function getCardWidth() {
                return cards[0].offsetWidth + 20; // card width + gap
            }

            function render() {
                track.style.transform = `translateX(-${current * getCardWidth()}px)`;
                progress.textContent = `${current + 1} / ${maxIdx + 1}`;
                dotsWrap.querySelectorAll('.grs-dot').forEach((dot, i) => {
                    dot.classList.toggle('active', i === current);
                });
            }

            function buildDots() {
                dotsWrap.innerHTML = '';
                for (let i = 0; i <= maxIdx; i++) {
                    const dot = document.createElement('button');
                    dot.className = 'grs-dot' + (i === current ? ' active' : '');
                    dot.setAttribute('aria-label', `Go to slide ${i + 1}`);
                    dot.addEventListener('click', () => {
                        current = i;
                        render();
                    });
                    dotsWrap.appendChild(dot);
                }
            }

            function init() {
                updateMetrics();
                buildDots();
                render();
            }

            window.addEventListener('resize', () => {
                const oldMax = maxIdx;
                updateMetrics();
                if (oldMax !== maxIdx) {
                    buildDots();
                }
                render();
            });

            init();

            prevBtn.addEventListener('click', () => {
                if (current > 0) {
                    current--;
                    render();
                }
            });
            nextBtn.addEventListener('click', () => {
                if (current < maxIdx) {
                    current++;
                    render();
                }
            });
        })();
    </script>


    <!-- ════════════════════════════════════════════
     EXCLUSIVE JEWELLERY SECTION
════════════════════════════════════════════ -->

    <section class="rr-jewellery">

        <div class="rr-container">

            <!-- HEADING -->
            <div class="rr-heading">
                <span>Exclusive Jewellery Collection</span>
                <h2>RR Fine Jewellery</h2>
                <p>
                    Explore timeless handcrafted jewellery including rings, earrings,
                    pendants, bracelets and more — designed for elegance and luxury lifestyle.
                </p>
            </div>

            <!-- ROW 1 -->
            <div class="rr-grid-top">

                <!-- Featured -->
                <div class="rr-card rr-featured">
                    <img src="https://images.unsplash.com/photo-1605100804763-247f67b3557e?w=1200" alt="">
                    <div class="rr-overlay">
                        <span>Featured</span>
                        <h3>Ring Collection</h3>
                        <a href="#">Explore</a>
                    </div>
                </div>

                <!-- Stack -->
                <div class="rr-stack">

                    <div class="rr-card rr-small">
                        <img src="https://tse1.mm.bing.net/th/id/OIP.7fz7nHw3Up_E0dHoHDftMwHaHa?r=0&rs=1&pid=ImgDetMain&o=7&rm=3" alt="">
                        <div class="rr-overlay">
                            <span>Category</span>
                            <h3>Earrings</h3>
                        </div>
                    </div>

                    <div class="rr-card rr-small">
                        <img src="https://images.unsplash.com/photo-1611591437281-460bfbe1220a?w=800" alt="">
                        <div class="rr-overlay">
                            <span>Category</span>
                            <h3>Pendant</h3>
                        </div>
                    </div>

                </div>

            </div>

            <!-- ROW 2 -->
            <div class="rr-grid-bottom">

                <div class="rr-stack">

                    <div class="rr-card rr-small">
                        <img src="https://images.unsplash.com/photo-1602173574767-37ac01994b2a?w=800" alt="">
                        <div class="rr-overlay">
                            <span>Category</span>
                            <h3>Bracelet</h3>
                        </div>
                    </div>

                    <div class="rr-card rr-small">
                        <img src="https://images.stockcake.com/public/9/7/5/9751409c-0116-4ead-a285-3832d6959493_large/elegant-diamond-necklace-stockcake.jpg" alt="">
                        <div class="rr-overlay">
                            <span>Category</span>
                            <h3>Necklace</h3>
                        </div>
                    </div>

                </div>

                <div class="rr-card rr-featured">
                    <img src="https://images.unsplash.com/photo-1583391733956-3750e0ff4e8b?w=1200" alt="">
                    <div class="rr-overlay">
                        <span>Exclusive</span>
                        <h3>Wedding Set</h3>
                        <a href="#">Explore</a>
                    </div>
                </div>

            </div>



            <!-- BUTTON -->
            <div class="rr-btn-wrap">
                <a href="#">View Complete Collection</a>
            </div>

        </div>

    </section>

    <style>
        .rr-jewellery {
            padding: 80px 0;
            background: #f8f5ef;
            font-family: 'Poppins', sans-serif;
        }

        .rr-container {
            max-width: 1200px;
            margin: auto;
            padding: 0 20px;
        }

        /* HEADING */
        .rr-heading {
            text-align: center;
            margin-bottom: 40px;
        }

        .rr-heading span {
            color: #c9a14a;
            font-size: 12px;
            letter-spacing: 3px;
            text-transform: uppercase;
        }

        .rr-heading h2 {
            font-size: 52px;
            margin: 10px 0;
        }

        .rr-heading p {
            max-width: 600px;
            margin: auto;
            color: #777;
            line-height: 1.7;
        }

        /* GRID */
        .rr-grid-top,
        .rr-grid-bottom {
            display: grid;
            grid-template-columns: 1.7fr 1fr;
            gap: 16px;
            margin-bottom: 16px;
        }

        .rr-grid-bottom {
            grid-template-columns: 1fr 1.7fr;
        }

        .rr-stack {
            display: grid;
            gap: 16px;
        }

        /* CARD */
        .rr-card {
            position: relative;
            overflow: hidden;
            border-radius: 18px;
        }

        .rr-featured {
            height: 420px;
        }

        .rr-small {
            height: 200px;
        }

        .rr-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: .6s;
        }

        .rr-card:hover img {
            transform: scale(1.08);
        }

        /* OVERLAY */
        .rr-overlay {
            position: absolute;
            bottom: 20px;
            left: 20px;
            z-index: 2;
        }

        .rr-overlay span {
            color: #d6b36a;
            font-size: 11px;
            text-transform: uppercase;
        }

        .rr-overlay h3 {
            color: #fff;
            font-size: 26px;
            margin: 6px 0;
        }

        .rr-overlay a {
            display: inline-block;
            padding: 8px 16px;
            background: #c9a14a;
            color: #fff;
            border-radius: 50px;
            text-decoration: none;
            font-size: 12px;
        }

        /* BOTTOM GRID */
        .rr-bottom-grid {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 12px;
            margin-top: 18px;
        }

        .rr-bottom-card {
            background: #fff;
            border-radius: 14px;
            overflow: hidden;
            text-align: center;
            transition: .3s;
        }

        .rr-bottom-card:hover {
            transform: translateY(-5px);
        }

        .rr-bottom-card img {
            width: 100%;
            height: 90px;
            object-fit: cover;
        }

        .rr-bottom-card h4 {
            font-size: 13px;
            padding: 8px 0;
        }

        /* BUTTON */
        .rr-btn-wrap {
            text-align: center;
            margin-top: 40px;
        }

        .rr-btn-wrap a {
            display: inline-block;
            padding: 14px 30px;
            background: #111;
            color: #fff;
            border-radius: 50px;
            text-decoration: none;
            transition: .3s;
        }

        .rr-btn-wrap a:hover {
            background: #c9a14a;
        }

        /* RESPONSIVE */
        @media(max-width:900px) {

            .rr-grid-top,
            .rr-grid-bottom {
                grid-template-columns: 1fr;
            }

            .rr-bottom-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .rr-featured {
                height: 320px;
            }
        }
    </style>



    {{-- Featured In Slider Section --}}
    {{-- Place this in your Blade layout/component file --}}
    {{-- Make sure to include the CSS (in your app.css or a <style> tag) and the JS at bottom --}}

    <section class="fi-section">
        <div class="fi-header">
            <div class="fi-eyebrow">as seen in</div>
            <h2 class="fi-title">Featured <span>In</span></h2>
        </div>

        <div class="fi-track-wrap">
            <div class="fi-slider-track" id="fiTrack">

                @php
                $logos = [
                ['initials' => 'TC', 'name' => 'TechCrunch', 'color' => 'orange'],
                ['initials' => 'F', 'name' => 'Forbes', 'color' => 'blue'],
                ['initials' => 'W', 'name' => 'Wired', 'color' => 'orange'],
                ['initials' => 'BB', 'name' => 'Bloomberg', 'color' => 'blue'],
                ['initials' => 'FT', 'name' => 'Financial Times', 'color' => 'orange'],
                ['initials' => 'BI', 'name' => 'Business Insider', 'color' => 'blue'],
                ['initials' => 'INC','name' => 'Inc. Magazine', 'color' => 'orange'],
                ['initials' => 'NYT','name' => 'New York Times', 'color' => 'blue'],
                ];

                // Duplicate for seamless infinite loop
                $logos = array_merge($logos, $logos);
                @endphp

                @foreach ($logos as $logo)
                <div class="fi-logo-card">
                    <div class="fi-logo-icon fi-icon--{{ $logo['color'] }}">
                        {{ $logo['initials'] }}
                    </div>
                    <span class="fi-logo-name">{{ $logo['name'] }}</span>
                </div>
                @endforeach

            </div>
        </div>

        <div class="fi-dots">
            <span class="fi-dot fi-dot--active"></span>
            <span class="fi-dot"></span>
            <span class="fi-dot"></span>
            <span class="fi-dot"></span>
        </div>
    </section>


    {{-- ===================== CSS ===================== --}}
    {{-- Add this to your resources/css/app.css OR inside a @push('styles') stack --}}


    <style>
        @import url('https://fonts.googleapis.com/css2?family=Syne:wght@400;700;800&display=swap');

        /* ── Section wrapper ── */
        .fi-section {
            padding: 4rem 0 2.5rem;
            overflow: hidden;
            font-family: 'Syne', sans-serif;
            background: #ffffff;
        }

        /* ── Header ── */
        .fi-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .fi-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: #E8650A;
            margin-bottom: 0.5rem;
        }

        .fi-eyebrow::before,
        .fi-eyebrow::after {
            content: '';
            display: block;
            width: 28px;
            height: 1.5px;
            background: #E8650A;
            border-radius: 2px;
        }

        .fi-title {
            font-size: 2rem;
            font-weight: 800;
            color: #1a1a1a;
            margin: 0;
            letter-spacing: -0.02em;
        }

        .fi-title span {
            color: #1566C0;
        }

        /* ── Track ── */
        .fi-track-wrap {
            position: relative;
            overflow: hidden;
        }

        .fi-track-wrap::before,
        .fi-track-wrap::after {
            content: '';
            position: absolute;
            top: 0;
            bottom: 0;
            width: 100px;
            z-index: 2;
            pointer-events: none;
        }

        .fi-track-wrap::before {
            left: 0;
            background: linear-gradient(to right, #ffffff, transparent);
        }

        .fi-track-wrap::after {
            right: 0;
            background: linear-gradient(to left, #ffffff, transparent);
        }

        .fi-slider-track {
            display: flex;
            gap: 16px;
            width: max-content;
            animation: fi-slide 30s linear infinite;
        }

        .fi-slider-track:hover {
            animation-play-state: paused;
        }

        @keyframes fi-slide {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        /* ── Cards ── */
        .fi-logo-card {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 0 28px;
            height: 68px;
            min-width: 170px;
            border-radius: 14px;
            border: 1.5px solid rgba(21, 102, 192, 0.15);
            background: #f7f7f7;
            white-space: nowrap;
            cursor: default;
            transition: border-color 0.25s ease, background 0.25s ease, transform 0.2s ease;
            user-select: none;
        }

        .fi-logo-card:hover {
            border-color: #E8650A;
            background: rgba(232, 101, 10, 0.05);
            transform: translateY(-2px);
        }

        /* ── Icon badges ── */
        .fi-logo-icon {
            width: 30px;
            height: 30px;
            border-radius: 7px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            font-weight: 800;
            flex-shrink: 0;
            letter-spacing: 0;
        }

        .fi-icon--orange {
            background: #E8650A;
            color: #ffffff;
        }

        .fi-icon--blue {
            background: #1566C0;
            color: #ffffff;
        }

        /* ── Name text ── */
        .fi-logo-name {
            font-size: 14px;
            font-weight: 700;
            color: #1a1a1a;
            letter-spacing: -0.01em;
        }

        /* ── Dots ── */
        .fi-dots {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 6px;
            margin-top: 1.75rem;
        }

        .fi-dot {
            display: block;
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: rgba(21, 102, 192, 0.2);
            transition: all 0.3s ease;
        }

        .fi-dot--active {
            width: 22px;
            border-radius: 4px;
            background: #E8650A;
        }

        /* ── Dark mode support ── */
        @media (prefers-color-scheme: dark) {
            .fi-section {
                background: #0f0f0f;
            }

            .fi-title {
                color: #f0f0f0;
            }

            .fi-logo-card {
                background: #1c1c1c;
                border-color: rgba(21, 102, 192, 0.25);
            }

            .fi-logo-card:hover {
                background: rgba(232, 101, 10, 0.08);
                border-color: #E8650A;
            }

            .fi-logo-name {
                color: #f0f0f0;
            }

            .fi-track-wrap::before {
                background: linear-gradient(to right, #0f0f0f, transparent);
            }

            .fi-track-wrap::after {
                background: linear-gradient(to left, #0f0f0f, transparent);
            }
        }
    </style>



    {{-- ===================== JS ===================== --}}
    {{-- Optional: animated dot cycling while slider runs --}}


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dots = document.querySelectorAll('.fi-dot');
            const track = document.getElementById('fiTrack');
            let current = 0;

            function rotateDot() {
                dots[current].classList.remove('fi-dot--active');
                current = (current + 1) % dots.length;
                dots[current].classList.add('fi-dot--active');
            }

            // Cycle every 2.5 seconds when slider is running
            let dotInterval = setInterval(rotateDot, 2500);

            // Pause dot cycling when slider is hovered
            track.addEventListener('mouseenter', () => clearInterval(dotInterval));
            track.addEventListener('mouseleave', () => {
                dotInterval = setInterval(rotateDot, 2500);
            });
        });
    </script>



    <section style="padding: 4rem 1.5rem 3.5rem; font-family: 'Syne', sans-serif; background: #f5f7fa;">
        <div style="max-width: 1000px; margin: 0 auto;">

            <!-- Header -->
            <div style="text-align: center; margin-bottom: 3rem;">
                <div style="display: inline-flex; align-items: center; gap: 8px; font-size: 11px; font-weight: 700; letter-spacing: 0.15em; text-transform: uppercase; color: #E8650A; margin-bottom: 10px;">
                    <span style="display:block; width:24px; height:1.5px; background:#E8650A; border-radius:2px;"></span>
                    how it works
                    <span style="display:block; width:24px; height:1.5px; background:#E8650A; border-radius:2px;"></span>
                </div>
                <h2 style="font-size: 2.2rem; font-weight: 800; color: #111; margin: 0; letter-spacing: -0.02em;">
                    Our <span style="color: #1566C0;">Process</span>
                </h2>
            </div>

            <!-- Cards Grid -->
            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 18px;">

                <!-- Card 1 - Orange -->
                <div style="background: #fff; border-radius: 18px; border: 1.5px solid #eee; border-top: 4px solid #E8650A; padding: 26px 20px 22px; display: flex; flex-direction: column; gap: 14px;">
                    <div style="display: flex; align-items: center; justify-content: space-between;">
                        <div style="width: 46px; height: 46px; border-radius: 12px; background: #fff3eb; color: #E8650A; display: flex; align-items: center; justify-content: center; font-size: 20px;">
                            <i class="ti ti-message-circle"></i>
                        </div>
                        <span style="font-size: 13px; font-weight: 800; color: rgba(232,101,10,0.25);">01</span>
                    </div>
                    <div>
                        <p style="font-size: 14px; font-weight: 700; color: #111; margin: 0 0 6px; line-height: 1.4;">Contact Us & Share Demand</p>
                        <p style="font-size: 12px; color: #999; margin: 0 0 10px; line-height: 1.5;">Tell us which gemstone you are looking for</p>
                        <span style="display: inline-flex; align-items: center; font-size: 11px; font-weight: 700; padding: 4px 10px; border-radius: 20px; background: #fff3eb; color: #b84d06;">Get started</span>
                    </div>
                </div>

                <!-- Card 2 - Blue -->
                <div style="background: #fff; border-radius: 18px; border: 1.5px solid #eee; border-top: 4px solid #1566C0; padding: 26px 20px 22px; display: flex; flex-direction: column; gap: 14px;">
                    <div style="display: flex; align-items: center; justify-content: space-between;">
                        <div style="width: 46px; height: 46px; border-radius: 12px; background: #e8f0fc; color: #1566C0; display: flex; align-items: center; justify-content: center; font-size: 20px;">
                            <i class="ti ti-bolt"></i>
                        </div>
                        <span style="font-size: 13px; font-weight: 800; color: rgba(21,102,192,0.25);">02</span>
                    </div>
                    <div>
                        <p style="font-size: 14px; font-weight: 700; color: #111; margin: 0 0 6px; line-height: 1.4;">Receive Quick Response From Sales Team</p>
                        <p style="font-size: 12px; color: #999; margin: 0 0 10px; line-height: 1.5;">Our team replies within a few hours</p>
                        <span style="display: inline-flex; align-items: center; font-size: 11px; font-weight: 700; padding: 4px 10px; border-radius: 20px; background: #e8f0fc; color: #0c447c;">Fast reply</span>
                    </div>
                </div>

                <!-- Card 3 - Orange -->
                <div style="background: #fff; border-radius: 18px; border: 1.5px solid #eee; border-top: 4px solid #E8650A; padding: 26px 20px 22px; display: flex; flex-direction: column; gap: 14px;">
                    <div style="display: flex; align-items: center; justify-content: space-between;">
                        <div style="width: 46px; height: 46px; border-radius: 12px; background: #fff3eb; color: #E8650A; display: flex; align-items: center; justify-content: center; font-size: 20px;">
                            <i class="ti ti-diamond"></i>
                        </div>
                        <span style="font-size: 13px; font-weight: 800; color: rgba(232,101,10,0.25);">03</span>
                    </div>
                    <div>
                        <p style="font-size: 14px; font-weight: 700; color: #111; margin: 0 0 6px; line-height: 1.4;">Select Your Gemstone</p>
                        <p style="font-size: 12px; color: #999; margin: 0 0 10px; line-height: 1.5;">Browse and pick from our curated collection</p>
                        <span style="display: inline-flex; align-items: center; font-size: 11px; font-weight: 700; padding: 4px 10px; border-radius: 20px; background: #fff3eb; color: #b84d06;">Browse now</span>
                    </div>
                </div>

                <!-- Card 4 - Blue -->
                <div style="background: #fff; border-radius: 18px; border: 1.5px solid #eee; border-top: 4px solid #1566C0; padding: 26px 20px 22px; display: flex; flex-direction: column; gap: 14px;">
                    <div style="display: flex; align-items: center; justify-content: space-between;">
                        <div style="width: 46px; height: 46px; border-radius: 12px; background: #e8f0fc; color: #1566C0; display: flex; align-items: center; justify-content: center; font-size: 20px;">
                            <i class="ti ti-eye"></i>
                        </div>
                        <span style="font-size: 13px; font-weight: 800; color: rgba(21,102,192,0.25);">04</span>
                    </div>
                    <div>
                        <p style="font-size: 14px; font-weight: 700; color: #111; margin: 0 0 6px; line-height: 1.4;">Review and Finalize Your Stone</p>
                        <p style="font-size: 12px; color: #999; margin: 0 0 10px; line-height: 1.5;">Check details, certifications & confirm</p>
                        <span style="display: inline-flex; align-items: center; font-size: 11px; font-weight: 700; padding: 4px 10px; border-radius: 20px; background: #e8f0fc; color: #0c447c;">Review</span>
                    </div>
                </div>

                <!-- Card 5 - Orange -->
                <div style="background: #fff; border-radius: 18px; border: 1.5px solid #eee; border-top: 4px solid #E8650A; padding: 26px 20px 22px; display: flex; flex-direction: column; gap: 14px;">
                    <div style="display: flex; align-items: center; justify-content: space-between;">
                        <div style="width: 46px; height: 46px; border-radius: 12px; background: #fff3eb; color: #E8650A; display: flex; align-items: center; justify-content: center; font-size: 20px;">
                            <i class="ti ti-shopping-cart"></i>
                        </div>
                        <span style="font-size: 13px; font-weight: 800; color: rgba(232,101,10,0.25);">05</span>
                    </div>
                    <div>
                        <p style="font-size: 14px; font-weight: 700; color: #111; margin: 0 0 6px; line-height: 1.4;">Place Your Order</p>
                        <p style="font-size: 12px; color: #999; margin: 0 0 10px; line-height: 1.5;">Secure & easy checkout process</p>
                        <span style="display: inline-flex; align-items: center; font-size: 11px; font-weight: 700; padding: 4px 10px; border-radius: 20px; background: #fff3eb; color: #b84d06;">Order now</span>
                    </div>
                </div>

                <!-- Card 6 - Blue -->
                <div style="background: #fff; border-radius: 18px; border: 1.5px solid #eee; border-top: 4px solid #1566C0; padding: 26px 20px 22px; display: flex; flex-direction: column; gap: 14px;">
                    <div style="display: flex; align-items: center; justify-content: space-between;">
                        <div style="width: 46px; height: 46px; border-radius: 12px; background: #e8f0fc; color: #1566C0; display: flex; align-items: center; justify-content: center; font-size: 20px;">
                            <i class="ti ti-package"></i>
                        </div>
                        <span style="font-size: 13px; font-weight: 800; color: rgba(21,102,192,0.25);">06</span>
                    </div>
                    <div>
                        <p style="font-size: 14px; font-weight: 700; color: #111; margin: 0 0 6px; line-height: 1.4;">Your Parcel Will Be at Your Door</p>
                        <p style="font-size: 12px; color: #999; margin: 0 0 10px; line-height: 1.5;">Fast & safe insured delivery worldwide</p>
                        <span style="display: inline-flex; align-items: center; font-size: 11px; font-weight: 700; padding: 4px 10px; border-radius: 20px; background: #e8f0fc; color: #0c447c;">Delivered</span>
                    </div>
                </div>

            </div>
        </div>
    </section>



    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">

    <style>
        .oc-section {
            padding: 4rem 0 3rem;
            font-family: 'Syne', sans-serif;
            background: #f5f7fa;
            overflow: hidden;
        }

        .oc-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .oc-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: #E8650A;
            margin-bottom: 8px;
        }

        .oc-eyebrow::before,
        .oc-eyebrow::after {
            content: '';
            width: 24px;
            height: 1.5px;
            background: #E8650A;
            display: block;
            border-radius: 2px;
        }

        .oc-title {
            font-size: 2rem;
            font-weight: 800;
            color: #111;
            margin: 0;
            letter-spacing: -0.02em;
        }

        .oc-title span {
            color: #1566C0;
        }

        .oc-track-wrap {
            position: relative;
            overflow: hidden;
        }

        .oc-track-wrap::before,
        .oc-track-wrap::after {
            content: '';
            position: absolute;
            top: 0;
            bottom: 0;
            width: 90px;
            z-index: 2;
            pointer-events: none;
        }

        .oc-track-wrap::before {
            left: 0;
            background: linear-gradient(to right, #f5f7fa, transparent);
        }

        .oc-track-wrap::after {
            right: 0;
            background: linear-gradient(to left, #f5f7fa, transparent);
        }

        .oc-track {
            display: flex;
            gap: 20px;
            width: max-content;
            animation: oc-slide 26s linear infinite;
            padding: 8px 0 12px;
        }

        .oc-track:hover {
            animation-play-state: paused;
        }

        @keyframes oc-slide {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        .oc-card {
            width: 220px;
            flex-shrink: 0;
            background: #fff;
            border-radius: 18px;
            border: 1.5px solid #eee;
            padding: 24px 20px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            gap: 12px;
            transition: border-color 0.2s, transform 0.2s;
            cursor: default;
        }

        .oc-card:hover {
            transform: translateY(-4px);
        }

        .oc-card.orange {
            border-top: 4px solid #E8650A;
        }

        .oc-card.blue {
            border-top: 4px solid #1566C0;
        }

        .oc-card.orange:hover {
            border-color: #E8650A;
        }

        .oc-card.blue:hover {
            border-color: #1566C0;
        }

        .oc-badge {
            width: 64px;
            height: 64px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
        }

        .oc-badge.orange {
            background: #fff3eb;
            color: #E8650A;
        }

        .oc-badge.blue {
            background: #e8f0fc;
            color: #1566C0;
        }

        .oc-cert-img {
            width: 100%;
            height: 120px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #eee;
        }

        .oc-cert-name {
            font-size: 14px;
            font-weight: 800;
            color: #111;
            margin: 0;
            line-height: 1.3;
        }

        .oc-cert-sub {
            font-size: 12px;
            color: #999;
            margin: 0;
            line-height: 1.5;
        }

        .oc-pill {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 11px;
            font-weight: 700;
            padding: 4px 12px;
            border-radius: 20px;
        }

        .oc-pill.orange {
            background: #fff3eb;
            color: #b84d06;
        }

        .oc-pill.blue {
            background: #e8f0fc;
            color: #0c447c;
        }

        .oc-dots {
            display: flex;
            justify-content: center;
            gap: 6px;
            margin-top: 1.5rem;
        }

        .oc-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: rgba(21, 102, 192, 0.18);
            display: block;
            transition: all 0.3s;
        }

        .oc-dot.active {
            width: 22px;
            border-radius: 4px;
            background: #E8650A;
        }

        /* Certificate Scroller Responsive Fixes */
        @media (max-width: 768px) {
            .oc-section { padding: 3rem 0 2rem; }
            .oc-track-wrap::before, .oc-track-wrap::after { width: 30px; }
            .oc-card { width: 180px; padding: 16px 14px 14px; gap: 8px; }
            .oc-badge { width: 48px; height: 48px; font-size: 22px; }
            .oc-cert-img { height: 90px; margin-bottom: 8px; }
            .oc-title { font-size: 1.6rem; }
        }
        @media (max-width: 480px) {
            .oc-track-wrap::before, .oc-track-wrap::after { width: 15px; }
        }
    </style>

    <section class="oc-section">
        <div class="oc-header">
            <div class="oc-eyebrow">trusted quality</div>
            <h2 class="oc-title">Our <span>Certifications</span></h2>
        </div>

       <div class="oc-track-wrap">
    <div class="oc-track">

        <!-- Card 1 -->
        <div class="oc-card orange">
            <img src="{{ asset('images/rajrajeswari.jpeg') }}" class="oc-cert-img" alt="GIA Pearl Certificate">
            <div class="oc-badge orange">
                <i class="ti ti-certificate"></i>
            </div>
            <p class="oc-cert-name">GIA Pearl Grading Lab</p>
            <p class="oc-cert-sub">Gemological Institute of America</p>
            <span class="oc-pill orange"><i class="ti ti-check"></i> Certified 2012</span>
        </div>

        <!-- Card 2 -->
        <div class="oc-card blue">
            <img src="{{ asset('images/rajrajeswari1.jpeg') }}" class="oc-cert-img" alt="GIA Diamond Certificate">
            <div class="oc-badge blue">
                <i class="ti ti-award"></i>
            </div>
            <p class="oc-cert-name">GIA Diamond Grading Lab</p>
            <p class="oc-cert-sub">Gemological Institute of America</p>
            <span class="oc-pill blue"><i class="ti ti-check"></i> Certified 2013</span>
        </div>

        <!-- Card 3 -->
        <div class="oc-card orange">
            <img src="{{ asset('images/isi.jpeg') }}" class="oc-cert-img" alt="IGI Certificate">
            <div class="oc-badge orange">
                <i class="ti ti-shield-check"></i>
            </div>
            <p class="oc-cert-name">IGI Certified</p>
            <p class="oc-cert-sub">International Gemological Institute</p>
            <span class="oc-pill orange"><i class="ti ti-check"></i> Verified</span>
        </div>

        <!-- Card 4 -->
        <div class="oc-card blue">
            <img src="{{ asset('images/rajrajeswari.jpeg') }}" class="oc-cert-img" alt="AGS Certificate">
            <div class="oc-badge blue">
                <i class="ti ti-rosette"></i>
            </div>
            <p class="oc-cert-name">AGS Certified</p>
            <p class="oc-cert-sub">American Gem Society</p>
            <span class="oc-pill blue"><i class="ti ti-check"></i> Verified</span>
        </div>

        <!-- Card 5 -->
        <div class="oc-card orange">
            <img src="{{ asset('images/rajrajeswari1.jpeg') }}" class="oc-cert-img" alt="HRD Certificate">
            <div class="oc-badge orange">
                <i class="ti ti-medal"></i>
            </div>
            <p class="oc-cert-name">HRD Certified</p>
            <p class="oc-cert-sub">Hoge Raad voor Diamant</p>
            <span class="oc-pill orange"><i class="ti ti-check"></i> Verified</span>
        </div>

        <!-- Card 6 -->
        <div class="oc-card blue">
            <img src="{{ asset('images/isi.jpeg') }}" class="oc-cert-img" alt="GSI Certificate">
            <div class="oc-badge blue">
                <i class="ti ti-star"></i>
            </div>
            <p class="oc-cert-name">GSI Certified</p>
            <p class="oc-cert-sub">Gemological Science International</p>
            <span class="oc-pill blue"><i class="ti ti-check"></i> Verified</span>
        </div>

        <!-- DUPLICATE FOR INFINITE SLIDER -->
        <div class="oc-card orange">
            <img src="{{ asset('images/rajrajeswari.jpeg') }}" class="oc-cert-img" alt="GIA Pearl Certificate">
            <div class="oc-badge orange"><i class="ti ti-certificate"></i></div>
            <p class="oc-cert-name">GIA Pearl Grading Lab</p>
            <p class="oc-cert-sub">Gemological Institute of America</p>
            <span class="oc-pill orange"><i class="ti ti-check"></i> Certified 2012</span>
        </div>
        <div class="oc-card blue">
            <img src="{{ asset('images/rajrajeswari1.jpeg') }}" class="oc-cert-img" alt="GIA Diamond Certificate">
            <div class="oc-badge blue"><i class="ti ti-award"></i></div>
            <p class="oc-cert-name">GIA Diamond Grading Lab</p>
            <p class="oc-cert-sub">Gemological Institute of America</p>
            <span class="oc-pill blue"><i class="ti ti-check"></i> Certified 2013</span>
        </div>
        <div class="oc-card orange">
            <img src="{{ asset('images/isi.jpeg') }}" class="oc-cert-img" alt="IGI Certificate">
            <div class="oc-badge orange"><i class="ti ti-shield-check"></i></div>
            <p class="oc-cert-name">IGI Certified</p>
            <p class="oc-cert-sub">International Gemological Institute</p>
            <span class="oc-pill orange"><i class="ti ti-check"></i> Verified</span>
        </div>
        <div class="oc-card blue">
            <img src="{{ asset('images/rajrajeswari.jpeg') }}" class="oc-cert-img" alt="AGS Certificate">
            <div class="oc-badge blue"><i class="ti ti-rosette"></i></div>
            <p class="oc-cert-name">AGS Certified</p>
            <p class="oc-cert-sub">American Gem Society</p>
            <span class="oc-pill blue"><i class="ti ti-check"></i> Verified</span>
        </div>
        <div class="oc-card orange">
            <img src="{{ asset('images/rajrajeswari1.jpeg') }}" class="oc-cert-img" alt="HRD Certificate">
            <div class="oc-badge orange"><i class="ti ti-medal"></i></div>
            <p class="oc-cert-name">HRD Certified</p>
            <p class="oc-cert-sub">Hoge Raad voor Diamant</p>
            <span class="oc-pill orange"><i class="ti ti-check"></i> Verified</span>
        </div>
        <div class="oc-card blue">
            <img src="{{ asset('images/isi.jpeg') }}" class="oc-cert-img" alt="GSI Certificate">
            <div class="oc-badge blue"><i class="ti ti-star"></i></div>
            <p class="oc-cert-name">GSI Certified</p>
            <p class="oc-cert-sub">Gemological Science International</p>
            <span class="oc-pill blue"><i class="ti ti-check"></i> Verified</span>
        </div>

    </div>
</div>

        <div class="oc-dots">
            <span class="oc-dot active"></span>
            <span class="oc-dot"></span>
            <span class="oc-dot"></span>
            <span class="oc-dot"></span>
        </div>
    </section>

    <script>
        var dots = document.querySelectorAll('.oc-dot');
        var track = document.getElementById('ocTrack');
        var cur = 0;

        function nextDot() {
            dots[cur].classList.remove('active');
            cur = (cur + 1) % dots.length;
            dots[cur].classList.add('active');
        }

        var iv = setInterval(nextDot, 2000);

        track.addEventListener('mouseenter', function() {
            clearInterval(iv);
        });
        track.addEventListener('mouseleave', function() {
            iv = setInterval(nextDot, 2000);
        });
    </script>






    <!-- FAQs & Guide Section -->
    <section id="faq-section" class="py-5 bg-white border-top scroll-margin">
        <div class="container">
            <div class="text-center max-w-2xl mx-auto mb-5">
                <span class="text-uppercase tracking-wider text-warning fw-bold fs-7">{{ $eyebrows['faq'] ?? 'Buyer Education' }}</span>
                <h2 class="h1 cinzel-font mt-2 text-navy">{{ $sections['faq'] ?? 'Astrology & Gemstone Guide' }}</h2>
                <p class="text-muted">{{ $descriptions['faq'] ??""}}</p>
            </div>

            <div class="row g-4 justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion shadow-sm" id="gemFaq">
                        @foreach($faqs as $faq)
                        <div class="accordion-item border border-light">
                            <h3 class="accordion-header" id="faqHead{{ $loop->iteration }}">
                                <button class="accordion-button fw-bold text-navy {{ $faq->is_expanded ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse{{ $loop->iteration }}">
                                    {{ $faq->question }}
                                </button>
                            </h3>
                            <div id="faqCollapse{{ $loop->iteration }}" class="accordion-collapse collapse {{ $faq->is_expanded ? 'show' : '' }}" data-bs-parent="#gemFaq">
                                <div class="accordion-body text-muted small leading-relaxed">
                                    {!! nl2br(e($faq->answer)) !!}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>