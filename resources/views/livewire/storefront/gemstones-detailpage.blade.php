<div>
<div>
    <style>
        /* ─── Reset ─────────────────────────────────────────── */
        body {
            font-family: 'DM Sans', sans-serif;
            background: #f5f4f0;
            color: #1a1a1a;
        }

        /* ─── Page wrapper ───────────────────────────────────── */
        .page {
            width: min(98%, 1750px);
            margin: 30px auto;
            background: #fff;
            border: none;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0, 0, 0, .05);
        }

        .hero {
            display: grid;
            grid-template-columns: 58% 42%;
            min-height: 580px;
            background: #faf9f6;
            border-bottom: 1px solid #ebe7e1;
        }

        .hero-content {
            padding: 70px 80px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .hero-media {
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            background:
                radial-gradient(circle at center,
                    rgba(184, 50, 37, .08),
                    transparent 70%);
        }

        .breadcrumb {
            font-size: 13px;
            color: #888;
            margin-bottom: 30px;
        }

        .breadcrumb span {
            margin: 0 8px;
        }

        h1 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 64px;
            font-weight: 600;
            line-height: 1;
            letter-spacing: -2px;
            margin-bottom: 25px;
        }

        h1 em {
            color: #B83225;
            font-style: normal;
            font-size: 48px;
            display: block;
            margin-top: 10px;
        }

        .desc {
            max-width: 760px;
            font-size: 18px;
            line-height: 2;
            color: #555;
        }

        .media-box {
            width: 100%;
            height: 100%;
            min-height: 580px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: transparent;
            position: relative;
        }

        .hero-img {
            width: 100%;
            max-width: 620px;
            object-fit: contain;
            transition: .4s;
        }

        .hero-img:hover {
            transform: scale(1.03);
        }

        .hero-vid {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* ─── Utility ────────────────────────────────────────── */
        .sr-only {
            position: absolute;
            width: 1px;
            height: 1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
        }


        .breadcrumb {
            font-size: 11px;
            color: #888;
            margin-bottom: 1rem;
            letter-spacing: 0.04em;
        }

        .breadcrumb span {
            margin: 0 4px;
            opacity: 0.5;
        }

        h1 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 34px;
            font-weight: 600;
            letter-spacing: -0.02em;
            line-height: 1.15;
            margin-bottom: 1rem;
        }

        h1 em {
            color: #B83225;
            font-style: normal;
        }

        .desc {
            font-size: 13px;
            line-height: 1.8;
            color: #555;
        }

        .desc p+p {
            margin-top: 0.6rem;
        }

        /* Media box */
        .media-box {
            width: 100%;
            height: 100%;
            min-height: 340px;
            background: #faf9f7;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 10px;
            overflow: hidden;
            position: relative;
        }

        .media-box i {
            font-size: 36px;
            color: #ccc;
        }

        .media-box .placeholder-label {
            font-size: 12px;
            color: #bbb;
        }

        .media-box video {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .change-video-btn {
            position: absolute;
            bottom: 12px;
            right: 12px;
            font-size: 11px;
            padding: 5px 12px;
            border: 0.5px solid rgba(255, 255, 255, 0.6);
            border-radius: 20px;
            color: #fff;
            cursor: pointer;
            background: rgba(0, 0, 0, 0.45);
            transition: background .15s;
            display: none;
        }

        .change-video-btn:hover {
            background: rgba(0, 0, 0, 0.65);
        }

        /* ─── Tabs ───────────────────────────────────────────── */
        .tabs {
            display: flex;
            overflow-x: auto;
            border-bottom: 0.5px solid #e0ddd8;
            scrollbar-width: none;
        }

        .tabs::-webkit-scrollbar {
            display: none;
        }

        .tab-btn {
            flex-shrink: 0;
            font-size: 11px;
            font-weight: 500;
            letter-spacing: 0.07em;
            text-transform: uppercase;
            padding: 12px 15px;
            cursor: pointer;
            border: none;
            border-bottom: 2px solid transparent;
            background: transparent;
            color: #888;
            font-family: 'DM Sans', sans-serif;
            transition: color .18s, border-color .18s;
            white-space: nowrap;
        }

        .tab-btn:hover {
            color: #1a1a1a;
        }

        .tab-btn.active {
            color: #B83225;
            border-bottom-color: #B83225;
        }

        /* ─── Tab panels ─────────────────────────────────────── */
        .tab-panel {
            display: none;
            padding: 1.75rem 2rem;
            border-bottom: 0.5px solid #e0ddd8;
        }

        .tab-panel.open {
            display: block;
        }

        .tc-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 22px;
            font-weight: 500;
            margin-bottom: 1rem;
            color: #1a1a1a;
        }

        .tc-body {
            font-size: 13px;
            line-height: 1.8;
            color: #555;
        }

        .tc-body p+p {
            margin-top: 0.7rem;
        }

        .tc-body ul {
            padding-left: 1.2rem;
            margin-top: 0.5rem;
        }

        .tc-body li {
            margin-bottom: 3px;
        }

        /* ─── Benefits grid ──────────────────────────────────── */
        .b-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(170px, 1fr));
            gap: 10px;
            margin-top: 1rem;
        }

        .b-card {
            background: #faf9f7;
            border: 0.5px solid #e0ddd8;
            border-radius: 8px;
            padding: 13px 15px;
            display: flex;
            gap: 10px;
            align-items: flex-start;
        }

        .b-card i {
            font-size: 18px;
            color: #B83225;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .b-card .b-title {
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 3px;
            color: #1a1a1a;
        }

        .b-card .b-text {
            font-size: 12px;
            color: #666;
            line-height: 1.5;
        }

        /* ─── Who should wear grid ───────────────────────────── */
        .who-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            margin-top: 1rem;
        }

        .who-card {
            background: #faf9f7;
            border: 0.5px solid #e0ddd8;
            border-radius: 8px;
            padding: 13px 15px;
        }

        .who-label {
            font-size: 10px;
            font-weight: 500;
            letter-spacing: 0.09em;
            text-transform: uppercase;
            color: #aaa;
            margin-bottom: 6px;
        }

        .who-card p {
            font-size: 13px;
            line-height: 1.65;
            color: #555;
        }

        /* ─── Steps ──────────────────────────────────────────── */
        .steps {
            display: grid;
            gap: 10px;
            margin-top: 1rem;
        }

        .step {
            display: flex;
            gap: 14px;
            padding: 13px 15px;
            background: #faf9f7;
            border: 0.5px solid #e0ddd8;
            border-radius: 8px;
        }

        .step-num {
            width: 26px;
            height: 26px;
            border-radius: 50%;
            background: #B83225;
            color: #fff;
            font-size: 11px;
            font-weight: 500;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            margin-top: 1px;
        }

        .step-title {
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 3px;
            color: #1a1a1a;
        }

        .step-text {
            font-size: 12.5px;
            color: #666;
            line-height: 1.6;
        }

        /* ─── Price table ────────────────────────────────────── */
        .price-tbl {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
            font-size: 13px;
            table-layout: fixed;
        }

        .price-tbl th {
            text-align: left;
            padding: 8px 10px;
            font-size: 10px;
            font-weight: 500;
            letter-spacing: 0.07em;
            text-transform: uppercase;
            color: #aaa;
            border-bottom: 0.5px solid #ccc;
        }

        .price-tbl td {
            padding: 10px 10px;
            border-bottom: 0.5px solid #e0ddd8;
            color: #555;
            vertical-align: top;
        }

        .price-tbl tr:last-child td {
            border-bottom: none;
        }

        .price-tbl td:first-child {
            color: #1a1a1a;
            font-weight: 500;
        }

        .cert-note {
            margin-top: 1rem;
            padding: 10px 13px;
            background: #faf9f7;
            border-left: 3px solid #B83225;
            border-radius: 0;
            font-size: 12.5px;
            color: #555;
            line-height: 1.65;
        }

        /* ─── Warnings ───────────────────────────────────────── */
        .warn-list {
            display: grid;
            gap: 8px;
            margin-top: 1rem;
        }

        .warn-item {
            display: flex;
            gap: 12px;
            padding: 11px 13px;
            border: 0.5px solid #e0ddd8;
            border-left: 3px solid #B83225;
            font-size: 13px;
            line-height: 1.65;
            color: #555;
        }

        .warn-item i {
            font-size: 16px;
            color: #B83225;
            flex-shrink: 0;
            margin-top: 2px;
        }

        /* ─── FAQ ────────────────────────────────────────────── */
        .faq-list {
            display: grid;
            gap: 8px;
            margin-top: 1rem;
        }

        .faq-item {
            border: 0.5px solid #e0ddd8;
            border-radius: 8px;
            overflow: hidden;
        }

        .faq-q {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 15px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 500;
            background: none;
            border: none;
            width: 100%;
            text-align: left;
            color: #1a1a1a;
            font-family: 'DM Sans', sans-serif;
            gap: 12px;
            transition: background .15s;
        }

        .faq-q:hover {
            background: #faf9f7;
        }

        .faq-q i {
            font-size: 15px;
            color: #aaa;
            flex-shrink: 0;
            transition: transform .22s;
        }

        .faq-q.open i {
            transform: rotate(180deg);
        }

        .faq-a {
            max-height: 0;
            overflow: hidden;
            transition: max-height .3s ease;
        }

        .faq-a.open {
            max-height: 300px;
        }

        .faq-a p {
            font-size: 13px;
            line-height: 1.75;
            color: #555;
            padding: 0 15px 13px;
        }

        /* ─── Filter section ─────────────────────────────────── */
        .filter-bar {
            padding: 1.25rem 2rem 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .filter-toggle-btn {
            display: flex;
            align-items: center;
            gap: 7px;
            padding: 8px 15px;
            background: #fff;
            border: 0.5px solid #ccc;
            border-radius: 8px;
            cursor: pointer;
            font-size: 12.5px;
            font-weight: 500;
            color: #555;
            font-family: 'DM Sans', sans-serif;
            transition: background .15s, border-color .15s;
        }

        .filter-toggle-btn:hover {
            background: #faf9f7;
            border-color: #999;
        }

        .filter-toggle-btn i {
            font-size: 15px;
            color: #B83225;
        }

        .filter-badge {
            font-size: 11px;
            background: #B83225;
            color: #fff;
            border-radius: 20px;
            padding: 2px 8px;
            font-weight: 500;
            display: none;
        }

        .filter-panel {
            overflow: hidden;
            max-height: 0;
            transition: max-height .4s ease;
            padding: 0 2rem;
        }

        .filter-panel.open {
            max-height: 2000px;
        }

        .filter-body {
            background: #faf9f7;
            border: 0.5px solid #e0ddd8;
            border-radius: 12px;
            padding: 1.5rem;
            margin-top: 1rem;
            display: grid;
            gap: 1.25rem;
        }

        .fg-label {
            font-size: 10px;
            font-weight: 500;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: #aaa;
            padding-bottom: 6px;
            border-bottom: 0.5px solid #e0ddd8;
            margin-bottom: 6px;
        }

        .chips {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
        }

        .chip {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 12px;
            padding: 5px 11px;
            border-radius: 20px;
            border: 0.5px solid #ccc;
            cursor: pointer;
            background: #fff;
            color: #555;
            font-family: 'DM Sans', sans-serif;
            transition: all .15s;
            user-select: none;
        }

        .chip:hover {
            border-color: #B83225;
            color: #B83225;
        }

        .chip.sel {
            background: #B83225;
            border-color: #B83225;
            color: #fff;
        }

        .chip .dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            display: inline-block;
            flex-shrink: 0;
        }

        .two-col {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.25rem;
        }

        .range-row {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 1rem;
        }

        .range-grp label {
            font-size: 11px;
            color: #aaa;
            display: block;
            margin-bottom: 5px;
        }

        .minmax {
            display: flex;
            gap: 6px;
            align-items: center;
        }

        .minmax input {
            width: 90px;
            padding: 6px 8px;
            border: 0.5px solid #ccc;
            border-radius: 6px;
            font-size: 12px;
            background: #fff;
            color: #1a1a1a;
            font-family: 'DM Sans', sans-serif;
        }

        .minmax span {
            font-size: 11px;
            color: #aaa;
        }

        .filter-actions {
            display: flex;
            gap: 10px;
            padding-top: 0.5rem;
            border-top: 0.5px solid #e0ddd8;
        }

        .btn-apply {
            padding: 8px 20px;
            background: #B83225;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            font-family: 'DM Sans', sans-serif;
            transition: opacity .15s;
        }

        .btn-apply:hover {
            opacity: 0.88;
        }

        .btn-clear {
            padding: 8px 16px;
            background: transparent;
            color: #555;
            border: 0.5px solid #ccc;
            border-radius: 8px;
            font-size: 13px;
            cursor: pointer;
            font-family: 'DM Sans', sans-serif;
            transition: background .15s;
        }

        .btn-clear:hover {
            background: #fff;
        }

        .spacer {
            height: 1.5rem;
        }
    </style>

    <h2 class="sr-only">{{ $currentCategory->name ?? 'Gemstone' }} ({{ $currentCategory->name ?? 'Gemstone' }}) — product page with tabs and filters</h2>



    <!-- {{ $currentCategory->name ?? 'Gemstone' }}  Intro Section -->
    <section class="gemstone-intro" style="padding: 30px;">
        <div class="container">

            <div class="row align-items-center g-lg-5 g-4">

                <!-- Content -->
                <div class="col-lg-6">
                    <div class="gem-content">

                        <div class="gem-breadcrumb">
                            <a href="#">Home</a>
                            <span>/</span>
                            <a href="#">Gemstones</a>
                            <span>/</span>
                            <span>{{ $currentCategory->name ?? 'Gemstone' }}</span>
                        </div>

                        <h1>
                            {{ $currentCategory->name ?? 'Gemstone' }}
                            <span>({{ $currentCategory->name ?? 'Gemstone' }})</span>
                        </h1>

                        <p>
                            {{ $currentCategory->name ?? 'Gemstone' }} , known as {{ $currentCategory->name ?? 'Gemstone' }} in Vedic Astrology, is one of the most
                            admired gemstones in the world. Its rich red color symbolizes
                            confidence, leadership, success, and vitality.
                        </p>

                        <p>
                            Associated with the Sun, {{ $currentCategory->name ?? 'Gemstone' }}  is believed to enhance personal
                            power, attract recognition, and bring positive energy into life.
                            It remains one of the most sought-after gemstones for both its
                            beauty and astrological significance.
                        </p>

                        <div class="gem-features">
                            <div class="feature">
                                Leadership
                            </div>

                            <div class="feature">
                                Confidence
                            </div>

                            <div class="feature">
                                Success
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Video -->
                <div class="col-lg-6">
                    <div class="video-card">

                        <video
                            autoplay
                            muted
                            loop
                            playsinline
                            preload="auto"
                            class="gem-video">

                            <source src="{{ asset('images/WhatsApp Video 2026-06-04 at 5.31.13 PM.MP4') }}" type="video/mp4">

                        </video>

                    </div>
                </div>

            </div>

              <!-- ── Tabs ──────────────────────────────────────────── -->
    <div class="tabs mt-5" role="tablist">
        <button class="tab-btn" role="tab" aria-controls="panel-0" onclick="switchTab(0, this)">About</button>
        <button class="tab-btn" role="tab" aria-controls="panel-1" onclick="switchTab(1, this)">Benefits</button>
        <button class="tab-btn" role="tab" aria-controls="panel-2" onclick="switchTab(2, this)">Who should wear</button>
        <button class="tab-btn" role="tab" aria-controls="panel-3" onclick="switchTab(3, this)">How to wear</button>
        <button class="tab-btn" role="tab" aria-controls="panel-4" onclick="switchTab(4, this)">Price & quality</button>
        <button class="tab-btn" role="tab" aria-controls="panel-5" onclick="switchTab(5, this)">Buyer beware</button>
        <button class="tab-btn" role="tab" aria-controls="panel-6" onclick="switchTab(6, this)">FAQ</button>
    </div>




     <!-- About -->
    <div id="panel-0" class="tab-panel" role="tabpanel">
        <div class="tc-title">About {{ $currentCategory->name ?? 'Gemstone' }}  ({{ $currentCategory->name ?? 'Gemstone' }} stone)</div>
        <div class="tc-body">
            <p>{{ $currentCategory->name ?? 'Gemstone' }} , known as {{ $currentCategory->name ?? 'Gemstone' }} in Hindi, is a variety of the mineral corundum (aluminum oxide) and gets its stunning red color from chromium. It is one of the four precious gemstones alongside diamond, emerald, and sapphire.</p>
            <p>In Vedic astrology, {{ $currentCategory->name ?? 'Gemstone' }}  is the gemstone of the Sun (Surya) and is worn to strengthen the Sun's position in the birth chart. A strong Sun brings leadership, confidence, and vitality.</p>
            <p>Natural rubies are found worldwide, with the most prized specimens from Burma (Myanmar), known for their "pigeon blood" red color. Other sources include Sri Lanka, Thailand, Mozambique, and Madagascar.</p>
            <ul>
                <li>Hardness: 9 on the Mohs scale — second only to diamond</li>
                <li>Refractive index: 1.762 – 1.778</li>
                <li>Specific gravity: 3.97 – 4.05</li>
                <li>Chemical formula: Al₂O₃ with Cr³⁺ impurities</li>
            </ul>
        </div>
    </div>

    <!-- Benefits -->
    <div id="panel-1" class="tab-panel" role="tabpanel">
        <div class="tc-title">Benefits of wearing {{ $currentCategory->name ?? 'Gemstone' }} </div>
        <div class="tc-body">
            <p>{{ $currentCategory->name ?? 'Gemstone' }}  is believed to bring physical, emotional, and spiritual benefits to its wearer when worn correctly.</p>
        </div>
        <div class="b-grid">
            <div class="b-card"><i class="ti ti-sun" aria-hidden="true"></i>
                <div>
                    <div class="b-title">Sun energy</div>
                    <div class="b-text">Strengthens the Sun's influence, boosting authority and leadership.</div>
                </div>
            </div>
            <div class="b-card"><i class="ti ti-heart-rate-monitor" aria-hidden="true"></i>
                <div>
                    <div class="b-title">Health & vitality</div>
                    <div class="b-text">Believed to improve blood circulation and heart health.</div>
                </div>
            </div>
            <div class="b-card"><i class="ti ti-mood-smile" aria-hidden="true"></i>
                <div>
                    <div class="b-title">Confidence</div>
                    <div class="b-text">Removes self-doubt and brings positivity and self-assurance.</div>
                </div>
            </div>
            <div class="b-card"><i class="ti ti-currency-rupee" aria-hidden="true"></i>
                <div>
                    <div class="b-title">Prosperity</div>
                    <div class="b-text">Attracts wealth, success, and financial stability.</div>
                </div>
            </div>
            <div class="b-card"><i class="ti ti-shield" aria-hidden="true"></i>
                <div>
                    <div class="b-title">Protection</div>
                    <div class="b-text">Guards against negative energies, evil eye, and misfortune.</div>
                </div>
            </div>
            <div class="b-card"><i class="ti ti-friends" aria-hidden="true"></i>
                <div>
                    <div class="b-title">Relationships</div>
                    <div class="b-text">Strengthens love, passion, and commitment in relationships.</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Who should wear -->
    <div id="panel-2" class="tab-panel" role="tabpanel">
        <div class="tc-title">Who should wear {{ $currentCategory->name ?? 'Gemstone' }} ?</div>
        <div class="tc-body">
            <p>{{ $currentCategory->name ?? 'Gemstone' }}  is primarily recommended for people with a weak or afflicted Sun in their birth chart. Always consult a qualified astrologer before wearing.</p>
        </div>
        <div class="who-grid">
            <div class="who-card">
                <div class="who-label">Recommended zodiac</div>
                <p>Leo (Simha Rashi) — the Sun is the ruling planet of Leo, making {{ $currentCategory->name ?? 'Gemstone' }}  the ideal gemstone.</p>
            </div>
            <div class="who-card">
                <div class="who-label">Also suitable for</div>
                <p>Aries, Scorpio, and Sagittarius ascendants may benefit when Sun is favorably placed.</p>
            </div>
            <div class="who-card">
                <div class="who-label">Professions</div>
                <p>Politicians, government officers, doctors, administrators, and those in leadership roles.</p>
            </div>
            <div class="who-card">
                <div class="who-label">Avoid if</div>
                <p>Sun is lord of the 3rd, 8th, or 12th house. Taurus and Libra ascendants should generally avoid {{ $currentCategory->name ?? 'Gemstone' }} .</p>
            </div>
        </div>
    </div>

    <!-- How to wear -->
    <div id="panel-3" class="tab-panel" role="tabpanel">
        <div class="tc-title">How to wear {{ $currentCategory->name ?? 'Gemstone' }} </div>
        <div class="tc-body">
            <p>For maximum astrological benefit, {{ $currentCategory->name ?? 'Gemstone' }}  must be worn following the correct ritual procedure.</p>
        </div>
        <div class="steps">
            <div class="step">
                <div class="step-num">1</div>
                <div>
                    <div class="step-title">Choose the right metal</div>
                    <div class="step-text">{{ $currentCategory->name ?? 'Gemstone' }}  should be set in gold (preferably 22kt). Silver or panchdhatu can also be used as alternatives.</div>
                </div>
            </div>
            <div class="step">
                <div class="step-num">2</div>
                <div>
                    <div class="step-title">Pick the right finger</div>
                    <div class="step-text">Wear on the ring finger (Anamika) of the right hand for men; left hand for women.</div>
                </div>
            </div>
            <div class="step">
                <div class="step-num">3</div>
                <div>
                    <div class="step-title">Best day & time</div>
                    <div class="step-text">Wear on Sunday morning between 5 AM – 7 AM during Shukla Paksha (waxing moon phase).</div>
                </div>
            </div>
            <div class="step">
                <div class="step-num">4</div>
                <div>
                    <div class="step-title">Energize the stone</div>
                    <div class="step-text">Dip the ring in raw cow milk, Ganga jal, or honey for 20 minutes to cleanse before wearing.</div>
                </div>
            </div>
            <div class="step">
                <div class="step-num">5</div>
                <div>
                    <div class="step-title">Chant the mantra</div>
                    <div class="step-text">Recite "Om Hraam Hreem Hraum Sah Suryaya Namah" 108 times while wearing the ring.</div>
                </div>
            </div>
            <div class="step">
                <div class="step-num">6</div>
                <div>
                    <div class="step-title">Minimum weight</div>
                    <div class="step-text">The {{ $currentCategory->name ?? 'Gemstone' }}  should weigh at least 3 carats (approx. 3.3 ratti) for noticeable astrological effects.</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Price & quality -->
    <div id="panel-4" class="tab-panel" role="tabpanel">
        <div class="tc-title">Price & quality</div>
        <div class="tc-body">
            <p>{{ $currentCategory->name ?? 'Gemstone' }}  price depends on color, clarity, cut, carat, origin, and treatment. "Pigeon blood" rubies from Burma command the highest prices.</p>
        </div>
        <table class="price-tbl">
            <thead>
                <tr>
                    <th>Grade</th>
                    <th>Origin</th>
                    <th>Price per carat</th>
                    <th>Key feature</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Premium (Pigeon Blood)</td>
                    <td>Burma (Myanmar)</td>
                    <td>₹25,000 – 50,000+</td>
                    <td>Unheated, vivid red, GRS certified</td>
                </tr>
                <tr>
                    <td>Fine quality</td>
                    <td>Sri Lanka / Mozambique</td>
                    <td>₹10,000 – 25,000</td>
                    <td>Slight heat treatment, good clarity</td>
                </tr>
                <tr>
                    <td>Good quality</td>
                    <td>Thailand / Madagascar</td>
                    <td>₹4,000 – 10,000</td>
                    <td>Heated, minor inclusions</td>
                </tr>
                <tr>
                    <td>Commercial grade</td>
                    <td>Africa / Vietnam</td>
                    <td>₹2,000 – 4,000</td>
                    <td>Visible inclusions, strong treatment</td>
                </tr>
            </tbody>
        </table>
        <div class="cert-note">Always insist on a certificate from GIA, GRS, Gubelin, or IGITL when purchasing high-value rubies.</div>
    </div>

    <!-- Buyer beware -->
    <div id="panel-5" class="tab-panel" role="tabpanel">
        <div class="tc-title">Buyer beware</div>
        <div class="tc-body">
            <p>The {{ $currentCategory->name ?? 'Gemstone' }}  market has many imitations and treated stones sold as natural. Watch out for these common issues.</p>
        </div>
        <div class="warn-list">
            <div class="warn-item"><i class="ti ti-alert-circle" aria-hidden="true"></i>
                <p>Synthetic rubies (lab-grown) are chemically identical to natural ones but worth far less. Always ask for a lab certificate.</p>
            </div>
            <div class="warn-item"><i class="ti ti-alert-circle" aria-hidden="true"></i>
                <p>Glass-filled rubies have fractures filled with lead glass to improve transparency. These are low-quality and damage easily.</p>
            </div>
            <div class="warn-item"><i class="ti ti-alert-circle" aria-hidden="true"></i>
                <p>Spinel and garnet are commonly sold as {{ $currentCategory->name ?? 'Gemstone' }} . Both are red gemstones but have very different properties and values.</p>
            </div>
            <div class="warn-item"><i class="ti ti-alert-circle" aria-hidden="true"></i>
                <p>Heavily heated rubies are worth significantly less than unheated stones. A "no heat" certificate adds substantial value.</p>
            </div>
            <div class="warn-item"><i class="ti ti-alert-circle" aria-hidden="true"></i>
                <p>Always buy from reputed, certified dealers and insist on a lab certificate before any high-value purchase.</p>
            </div>
        </div>
    </div>

    <!-- FAQ -->
    <div id="panel-6" class="tab-panel" role="tabpanel">
        <div class="tc-title">Frequently asked questions</div>
        <div class="faq-list">
            <div class="faq-item">
                <button class="faq-q" onclick="toggleFaq(this)">Can I wear {{ $currentCategory->name ?? 'Gemstone' }}  without consulting an astrologer?<i class="ti ti-chevron-down" aria-hidden="true"></i></button>
                <div class="faq-a">
                    <p>It is strongly advised to consult a qualified Vedic astrologer before wearing {{ $currentCategory->name ?? 'Gemstone' }} . Wearing it with a malefic Sun can amplify negative effects rather than positive ones.</p>
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-q" onclick="toggleFaq(this)">How do I know if my {{ $currentCategory->name ?? 'Gemstone' }}  is real?<i class="ti ti-chevron-down" aria-hidden="true"></i></button>
                <div class="faq-a">
                    <p>The most reliable way is to get a certificate from GIA, GRS, or Gubelin. Real rubies have a hardness of 9 and will not scratch easily. A UV lamp test can also help identify glass-filled stones.</p>
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-q" onclick="toggleFaq(this)">How long does {{ $currentCategory->name ?? 'Gemstone' }}  take to show its effects?<i class="ti ti-chevron-down" aria-hidden="true"></i></button>
                <div class="faq-a">
                    <p>Most people begin to notice effects within 30 to 90 days of wearing {{ $currentCategory->name ?? 'Gemstone' }}  correctly. The stone should ideally be worn continuously for at least one year for full astrological benefit.</p>
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-q" onclick="toggleFaq(this)">Can {{ $currentCategory->name ?? 'Gemstone' }}  be worn with other gemstones?<i class="ti ti-chevron-down" aria-hidden="true"></i></button>
                <div class="faq-a">
                    <p>{{ $currentCategory->name ?? 'Gemstone' }}  should not be combined with blue sapphire, hessonite (gomed), or cat's eye, as these belong to planets that are enemies of the Sun. Pearl and red coral are generally compatible.</p>
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-q" onclick="toggleFaq(this)">How do I clean and maintain my {{ $currentCategory->name ?? 'Gemstone' }} ?<i class="ti ti-chevron-down" aria-hidden="true"></i></button>
                <div class="faq-a">
                    <p>Clean with warm soapy water and a soft brush once a month. Avoid ultrasonic cleaners if your stone is glass-filled. Remove the ring before heavy physical work, swimming, or applying chemicals.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- ── Filter section ─────────────────────────────────── -->
    <div class="filter-bar">
        <button class="filter-toggle-btn" id="ftoggle" onclick="toggleFilter()">
            <i class="ti ti-adjustments-horizontal" aria-hidden="true"></i>
            <span id="ftxt">Show filters</span>
        </button>
        <span class="filter-badge" id="fbadge"></span>
    </div>

    <div class="filter-panel" id="fpanel">
        <div class="filter-body">

            <div>
                <div class="fg-label">Origin</div>
                <div class="chips">
                    <button class="chip" onclick="tog(this)">Africa</button>
                    <button class="chip" onclick="tog(this)">Burma</button>
                    <button class="chip" onclick="tog(this)">Kenya</button>
                    <button class="chip" onclick="tog(this)">Madagascar</button>
                    <button class="chip" onclick="tog(this)">Mozambique</button>
                    <button class="chip" onclick="tog(this)">Sri Lanka (Ceylon)</button>
                    <button class="chip" onclick="tog(this)">Tajikistan</button>
                    <button class="chip" onclick="tog(this)">Tanzania</button>
                    <button class="chip" onclick="tog(this)">Thailand</button>
                    <button class="chip" onclick="tog(this)">Vietnam</button>
                </div>
            </div>

            <div>
                <div class="fg-label">Color</div>
                <div class="chips">
                    <button class="chip" onclick="tog(this)"><span class="dot" style="background:#C00020"></span>Intense Red</button>
                    <button class="chip" onclick="tog(this)"><span class="dot" style="background:#8B1A2A"></span>Pigeon Blood</button>
                    <button class="chip" onclick="tog(this)"><span class="dot" style="background:#F472B6"></span>Pink</button>
                    <button class="chip" onclick="tog(this)"><span class="dot" style="background:#E87BA0"></span>Pinkish Red</button>
                    <button class="chip" onclick="tog(this)"><span class="dot" style="background:#B05080"></span>Purplish Pink</button>
                    <button class="chip" onclick="tog(this)"><span class="dot" style="background:#8B3060"></span>Purplish Red</button>
                    <button class="chip" onclick="tog(this)"><span class="dot" style="background:#E02020"></span>Red</button>
                    <button class="chip" onclick="tog(this)"><span class="dot" style="background:#D85070"></span>Vivid Pinkish-Red</button>
                </div>
            </div>

            <div>
                <div class="fg-label">Certificate</div>
                <div class="chips">
                    <button class="chip" onclick="tog(this)">AGR</button>
                    <button class="chip" onclick="tog(this)">C.Dunaigre</button>
                    <button class="chip" onclick="tog(this)">GIA</button>
                    <button class="chip" onclick="tog(this)">GII</button>
                    <button class="chip" onclick="tog(this)">GJEPC</button>
                    <button class="chip" onclick="tog(this)">GRS</button>
                    <button class="chip" onclick="tog(this)">Gubelin</button>
                    <button class="chip" onclick="tog(this)">ICA</button>
                    <button class="chip" onclick="tog(this)">IGITL</button>
                    <button class="chip" onclick="tog(this)">IGTLJ</button>
                    <button class="chip" onclick="tog(this)">ITLGJ</button>
                    <button class="chip" onclick="tog(this)">ITLGR</button>
                </div>
            </div>

            <div class="two-col">
                <div>
                    <div class="fg-label">Shape</div>
                    <div class="chips">
                        <button class="chip" onclick="tog(this)">Cushion</button>
                        <button class="chip" onclick="tog(this)">Heart</button>
                        <button class="chip" onclick="tog(this)">Octagon</button>
                        <button class="chip" onclick="tog(this)">Oval</button>
                        <button class="chip" onclick="tog(this)">Pear</button>
                        <button class="chip" onclick="tog(this)">Round</button>
                    </div>
                </div>
                <div>
                    <div class="fg-label">Treatment</div>
                    <div class="chips">
                        <button class="chip" onclick="tog(this)">Heated</button>
                        <button class="chip" onclick="tog(this)">No heat</button>
                    </div>
                    <div class="fg-label" style="margin-top:1rem">Cut</div>
                    <div class="chips">
                        <button class="chip" onclick="tog(this)">Cabochon</button>
                        <button class="chip" onclick="tog(this)">Faceted</button>
                    </div>
                    <div class="fg-label" style="margin-top:1rem">Product type</div>
                    <div class="chips">
                        <button class="chip" onclick="tog(this)">Single stone</button>
                        <button class="chip" onclick="tog(this)">Pair</button>
                        <button class="chip" onclick="tog(this)">Gemstone set</button>
                    </div>
                </div>
            </div>

            <div>
                <div class="fg-label">Weight in carat</div>
                <div class="chips">
                    <button class="chip" onclick="tog(this)">0 – 2.49 cts</button>
                    <button class="chip" onclick="tog(this)">2.50 – 4.99 cts</button>
                    <button class="chip" onclick="tog(this)">5.00 – 7.49 cts</button>
                    <button class="chip" onclick="tog(this)">7.50 – 9.99 cts</button>
                    <button class="chip" onclick="tog(this)">10+ cts</button>
                </div>
            </div>

            <div>
                <div class="fg-label">Weight in ratti</div>
                <div class="chips">
                    <button class="chip" onclick="tog(this)">0 – 2.49 rt</button>
                    <button class="chip" onclick="tog(this)">2.50 – 4.99 rt</button>
                    <button class="chip" onclick="tog(this)">5.00 – 7.49 rt</button>
                    <button class="chip" onclick="tog(this)">7.50 – 9.99 rt</button>
                    <button class="chip" onclick="tog(this)">10+ rt</button>
                </div>
            </div>

            <div>
                <div class="fg-label">Range inputs</div>
                <div class="range-row">
                    <div class="range-grp">
                        <label for="price-min">Price range (INR)</label>
                        <div class="minmax">
                            <input id="price-min" type="number" value="0" min="0">
                            <span>–</span>
                            <input id="price-max" type="number" value="999399" min="0">
                        </div>
                    </div>
                    <div class="range-grp">
                        <label for="ct-min">Weight in carat</label>
                        <div class="minmax">
                            <input id="ct-min" type="number" value="0" min="0" step="0.1">
                            <span>–</span>
                            <input id="ct-max" type="number" value="36" min="0" step="0.1">
                        </div>
                    </div>
                    <div class="range-grp">
                        <label for="rt-min">Weight in ratti</label>
                        <div class="minmax">
                            <input id="rt-min" type="number" value="0" min="0" step="0.1">
                            <span>–</span>
                            <input id="rt-max" type="number" value="39" min="0" step="0.1">
                        </div>
                    </div>
                </div>
            </div>

            <div class="filter-actions">
                <button class="btn-apply" onclick="applyFilters()">Apply filters</button>
                <button class="btn-clear" onclick="clearAll()">Clear all</button>
            </div>

        </div>
    </div>

    <div class="spacer"></div>
        </div>

    </section>

    <style>
        .gemstone-intro {
            background: #f8f7f5;
            padding: 60px 0;
        }

        /* Equal Left & Right Space */
        .gemstone-intro .container {
            max-width: 1320px;
        }

        .gem-breadcrumb {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 22px;
            font-size: 14px;
            color: #888;
        }

        .gem-breadcrumb a {
            color: #666;
            text-decoration: none;
        }

        .gem-content h1 {
            font-size: 42px;
            font-weight: 700;
            line-height: 1.2;
            color: #111;
            margin-bottom: 20px;
        }

        .gem-content h1 span {
            color: #b01e3a;
        }

        .gem-content p {
            font-size: 16px;
            line-height: 1.9;
            color: #555;
            margin-bottom: 18px;
        }

        .gem-features {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 25px;
        }

        .feature {
            padding: 10px 18px;
            background: #fff;
            border: 1px solid #ececec;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 500;
            box-shadow: 0 4px 12px rgba(0, 0, 0, .04);
        }

        .video-card {
            height: 400px;
            border-radius: 20px;
            overflow: hidden;
            position: relative;
            box-shadow: 0 20px 50px rgba(0, 0, 0, .08);
        }

        .gem-video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .video-card::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg,
                    rgba(0, 0, 0, .05),
                    rgba(0, 0, 0, 0));
            pointer-events: none;
        }

        @media(max-width:991px) {

            .gemstone-intro {
                padding: 50px 0;
            }

            .gem-content {
                text-align: center;
            }

            .gem-content h1 {
                font-size: 34px;
            }

            .gem-features {
                justify-content: center;
            }

            .video-card {
                height: 320px;
            }

            .gem-breadcrumb {
                justify-content: center;
                flex-wrap: wrap;
            }
        }
    </style>

 
</div><!-- /.page -->






<section class="products-section">
    <div class="container">

        

        <div class="products-grid">

            @foreach($products as $product)

            <div class="product-card">

                <div class="product-image">

                    <img src="{{ $product->primaryImage() ? asset('storage/' . $product->primaryImage()->path) : asset('images/placeholder.jpg') }}"
                         alt="{{ $product->name }}">

                </div>

                <div class="product-actions">

                    <button class="action-btn">
                        <i class="fas fa-eye"></i>
                    </button>

                    <button class="action-btn">
                        <i class="far fa-heart"></i>
                    </button>

                    <button class="action-btn">
                        <i class="fas fa-shopping-bag"></i>
                    </button>

                </div>

                <div class="product-info">

                    <h3>
                        {{ $product->name }}
                        - {{ $product->weight }} Carat
                    </h3>

                    <p>
                        SKU:
                        {{ $product->sku ?? 'N/A' }}
                    </p>

                    <p>
                        Origin :
                        {{ $product->origin ?? 'N/A' }}
                    </p>

                    <div class="price">
                        ₹{{ number_format($product->price,2) }}
                    </div>

                </div>

            </div>

            @endforeach

        </div>

           <div class="products-grid">

            @foreach($products as $product)

            <div class="product-card">

                <div class="product-image">

                    <img src="{{ $product->primaryImage() ? asset('storage/' . $product->primaryImage()->path) : asset('images/placeholder.jpg') }}"
                         alt="{{ $product->name }}">

                </div>

                <div class="product-actions">

                    <button class="action-btn">
                        <i class="fas fa-eye"></i>
                    </button>

                    <button class="action-btn">
                        <i class="far fa-heart"></i>
                    </button>

                    <button class="action-btn">
                        <i class="fas fa-shopping-bag"></i>
                    </button>

                </div>

                <div class="product-info">

                    <h3>
                        {{ $product->name }}
                        - {{ $product->weight }} Carat
                    </h3>

                    <p>
                        SKU:
                        {{ $product->sku ?? 'N/A' }}
                    </p>

                    <p>
                        Origin :
                        {{ $product->origin ?? 'N/A' }}
                    </p>

                    <div class="price">
                        ₹{{ number_format($product->price,2) }}
                    </div>

                </div>

            </div>

            @endforeach

        </div>

    </div>
</section>


<style>
    .products-section{
    padding:60px 0;
    background:#fafafa;
}

.products-grid{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:30px;
}

.product-card{
    background:#fff;
    border-radius:18px;
    padding:20px;
    text-align:center;
    transition:.35s;
    border:1px solid #eee;
}

.product-card:hover{
    transform:translateY(-8px);
    box-shadow:0 20px 40px rgba(0,0,0,.08);
}

.product-image{
    height:240px;
    display:flex;
    align-items:center;
    justify-content:center;
}

.product-image img{
    max-width:100%;
    max-height:210px;
    object-fit:contain;
    transition:.4s;
}

.product-card:hover img{
    transform:scale(1.05);
}

.product-actions{
    display:flex;
    justify-content:center;
    gap:10px;
    margin:18px 0;
}

.action-btn{
    width:38px;
    height:38px;
    border:none;
    border-radius:50%;
    background:#f5f5f5;
    cursor:pointer;
    transition:.3s;
}

.action-btn:hover{
    background:#111;
    color:#fff;
}

.product-info h3{
    font-size:16px;
    margin-bottom:8px;
    line-height:1.5;
}

.product-info p{
    margin:4px 0;
    color:#666;
    font-size:14px;
}

.price{
    font-size:22px;
    font-weight:700;
    margin-top:10px;
}

/* Modal */

.quick-view-overlay{
    position:fixed;
    inset:0;
    background:rgba(0,0,0,.6);
    z-index:9999;
    display:flex;
    align-items:center;
    justify-content:center;
}

.quick-view-modal{
    width:950px;
    max-width:95%;
    background:#fff;
    border-radius:20px;
    padding:35px;
    position:relative;
}

.close-btn{
    position:absolute;
    right:20px;
    top:15px;
    border:none;
    background:none;
    font-size:30px;
    cursor:pointer;
}

.modal-grid{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:40px;
}

.modal-left{
    display:flex;
    justify-content:center;
    align-items:center;
}

.modal-left img{
    max-width:100%;
    max-height:420px;
    object-fit:contain;
}

.modal-right h2{
    font-size:34px;
    margin-bottom:10px;
}

.sku{
    color:#777;
    margin-bottom:15px;
}

.modal-price{
    font-size:36px;
    font-weight:700;
    margin-bottom:20px;
}

.description{
    color:#555;
    line-height:1.8;
    margin-bottom:25px;
}

.qty-box{
    display:flex;
    width:150px;
    margin-top:10px;
}

.qty-box button{
    width:45px;
    border:none;
    background:#f1f1f1;
}

.qty-box input{
    width:60px;
    text-align:center;
    border:1px solid #ddd;
}

.add-cart-btn{
    margin-top:25px;
    background:#2d3748;
    color:#fff;
    border:none;
    padding:14px 35px;
    border-radius:8px;
    font-weight:600;
}

.delivery-time{
    margin-top:20px;
    color:#666;
}

.delivery-time span{
    color:#dc3545;
}

@media(max-width:991px){

    .products-grid{
        grid-template-columns:repeat(2,1fr);
    }

    .modal-grid{
        grid-template-columns:1fr;
    }

}

@media(max-width:576px){

    .products-grid{
        grid-template-columns:1fr;
    }

}
</style>

<script>
    /* ── Tab toggle ───────────────────────────────────────── */
    var activeTab = -1;

    function switchTab(i, btn) {
        var panels = document.querySelectorAll('.tab-panel');
        var btns = document.querySelectorAll('.tab-btn');

        if (activeTab === i) {
            // Same tab clicked — close it
            activeTab = -1;
            panels[i].classList.remove('open');
            btn.classList.remove('active');
        } else {
            // Close previously open panel
            if (activeTab !== -1) panels[activeTab].classList.remove('open');
            // Open new panel
            activeTab = i;
            panels[i].classList.add('open');
            btns.forEach(function(b, idx) {
                b.classList.toggle('active', idx === i);
            });
        }
    }

    /* ── Filter toggle ────────────────────────────────────── */
    function toggleFilter() {
        var panel = document.getElementById('fpanel');
        var open = panel.classList.toggle('open');
        document.getElementById('ftxt').textContent = open ? 'Hide filters' : 'Show filters';
    }

    /* ── Chip select ──────────────────────────────────────── */
    function tog(el) {
        el.classList.toggle('sel');
        updateBadge();
    }

    function updateBadge() {
        var count = document.querySelectorAll('.chip.sel').length;
        var badge = document.getElementById('fbadge');
        badge.style.display = count > 0 ? 'inline-block' : 'none';
        badge.textContent = count + ' active';
    }

    /* ── Clear all chips ─────────────────────────────────── */
    function clearAll() {
        document.querySelectorAll('.chip.sel').forEach(function(c) {
            c.classList.remove('sel');
        });
        updateBadge();
    }

    /* ── Apply filters (log selected to console) ─────────── */
    function applyFilters() {
        var sel = Array.from(document.querySelectorAll('.chip.sel'))
            .map(function(c) {
                return c.textContent.trim();
            });
        console.log('Active filters:', sel);
        // Hook up to your product listing API here
    }

    /* ── FAQ accordion ───────────────────────────────────── */
    function toggleFaq(btn) {
        var ans = btn.nextElementSibling;
        var isOpen = ans.classList.toggle('open');
        btn.classList.toggle('open', isOpen);
    }

    /* ═══════════════════════════════════════════════════════
       SET HERO MEDIA FROM CODE
       ─────────────────────────────────────────────────────
       For image: setHeroMedia('https://cdn.com/{{ $currentCategory->name ?? 'Gemstone' }} .jpg');
       For video: setHeroMedia('https://cdn.com/{{ $currentCategory->name ?? 'Gemstone' }} .mp4');
       Or just paste the URL in the variable below:
    ═══════════════════════════════════════════════════════ */

    var HERO_MEDIA_URL = ''; // ← paste image or video URL here

    function setHeroMedia(url) {
        if (!url) return;
        var box = document.getElementById('vbox');
        var isVid = /\.(mp4|webm|ogg|mov)$/i.test(url) || url.includes('video');

        // Remove old media
        var old = box.querySelector('img.hero-img, video.hero-vid');
        if (old) old.remove();

        // Hide placeholder
        document.getElementById('mediaPlaceholder').style.display = 'none';

        if (isVid) {
            var vid = document.createElement('video');
            vid.src = url;
            vid.autoplay = true;
            vid.muted = true;
            vid.loop = true;
            vid.playsInline = true;
            vid.className = 'hero-vid';
            box.insertBefore(vid, box.querySelector('.change-video-btn'));
        } else {
            var img = document.createElement('img');
            img.src = url;
            img.alt = '{{ $currentCategory->name ?? 'Gemstone' }}  stone';
            img.className = 'hero-img';
            box.insertBefore(img, box.querySelector('.change-video-btn'));
        }

        document.getElementById('changeMediaBtn').style.display = 'inline-flex';
        document.getElementById('changeMediaBtn').style.alignItems = 'center';
        document.getElementById('changeMediaBtn').style.gap = '4px';
    }

    if (HERO_MEDIA_URL) setHeroMedia(HERO_MEDIA_URL);

    /* ── Fallback: local file picker ────────────────────── */
    document.getElementById('mediaFile').addEventListener('change', function() {
        if (!this.files[0]) return;
        setHeroMedia(URL.createObjectURL(this.files[0]));
    });
</script>


</div>

</div>