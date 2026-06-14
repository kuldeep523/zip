<div>
    
<style>
    :root {
        --gold:       #C49A45;
        --gold-dark:  #A07830;
        --gold-light: #EDD898;
        --cream:      #FAF8F3;
        --ink:        #1A1610;
        --stone:      #6B6458;
        --white:      #FFFFFF;
        --shadow:     0 20px 60px rgba(26,22,16,.10);
    }

    /* ── HERO ── */
    .pp-hero-banner {
        position: relative;
        background: linear-gradient(135deg, var(--ink) 0%, #2e2416 100%);
        padding: 80px 0 60px;
        text-align: center;
        overflow: hidden;
    }
    .pp-hero-banner::before {
        content: '';
        position: absolute;
        inset: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" width="60" height="60"><circle cx="30" cy="30" r="1.5" fill="%23C49A45" opacity="0.15"/></svg>') repeat;
    }
    .pp-hero-banner .overlay-text {
        position: relative;
        z-index: 2;
    }
    .pp-hero-banner .eyebrow {
        display: inline-block;
        font-size: 11px;
        letter-spacing: 5px;
        font-weight: 600;
        color: var(--gold-light);
        text-transform: uppercase;
        margin-bottom: 14px;
    }
    .pp-hero-banner h1 {
        font-family: 'Cormorant Garamond', serif;
        font-size: clamp(36px, 5vw, 60px);
        font-weight: 700;
        color: #fff;
        margin-bottom: 14px;
        line-height: 1.1;
    }
    .pp-hero-banner p {
        font-size: 15px;
        color: rgba(255,255,255,.65);
        max-width: 560px;
        margin: 0 auto;
        line-height: 1.8;
    }
    .pp-hero-banner p a {
        color: var(--gold-light);
        text-decoration: none;
    }

    /* ── PAGE WRAPPER ── */
    .pp-page {
        background: var(--cream);
        padding: 64px 0 96px;
    }
    .pp-inner {
        max-width: 900px;
        margin: 0 auto;
        padding: 0 24px;
    }

    /* ── TABLE OF CONTENTS ── */
    .pp-toc {
        background: var(--white);
        border: 1px solid rgba(196,154,69,.2);
        border-left: 4px solid var(--gold);
        border-radius: 0 16px 16px 0;
        padding: 28px 32px;
        margin-bottom: 48px;
    }
    .pp-toc h2 {
        font-size: 12px;
        font-weight: 600;
        letter-spacing: 3px;
        text-transform: uppercase;
        color: var(--gold-dark);
        margin-bottom: 16px;
    }
    .pp-toc ol {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 6px 32px;
        margin: 0;
        padding: 0 0 0 20px;
    }
    .pp-toc ol li {
        font-size: 14px;
        color: var(--stone);
        line-height: 1.8;
    }
    .pp-toc ol li a {
        color: var(--stone);
        text-decoration: none;
        transition: color .2s;
    }
    .pp-toc ol li a:hover {
        color: var(--gold);
    }

    /* ── SECTIONS ── */
    .pp-section {
        margin-bottom: 48px;
        scroll-margin-top: 24px;
    }
    .pp-section-head {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 20px;
        padding-bottom: 16px;
        border-bottom: 1px solid rgba(196,154,69,.2);
    }
    .pp-section-icon {
        width: 42px;
        height: 42px;
        min-width: 42px;
        border-radius: 12px;
        background: linear-gradient(135deg, var(--gold), var(--gold-dark));
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        color: #fff;
    }
    .pp-section-head h2 {
        font-family: 'Cormorant Garamond', serif;
        font-size: 26px;
        font-weight: 700;
        color: var(--ink);
        margin: 0;
    }
    .pp-body {
        font-size: 15px;
        color: var(--stone);
        line-height: 1.9;
    }
    .pp-body p {
        margin-bottom: 12px;
    }
    .pp-body p:last-child {
        margin-bottom: 0;
    }

    /* ── CARDS GRID ── */
    .pp-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 16px;
        margin-top: 20px;
    }
    .pp-card {
        background: var(--white);
        border: 1px solid rgba(196,154,69,.15);
        border-radius: 14px;
        padding: 20px 22px;
        transition: .3s;
    }
    .pp-card:hover {
        border-color: var(--gold);
        box-shadow: 0 8px 28px rgba(196,154,69,.12);
        transform: translateY(-3px);
    }
    .pp-card h4 {
        font-size: 15px;
        font-weight: 600;
        color: var(--ink);
        margin-bottom: 6px;
    }
    .pp-card p {
        font-size: 13px;
        color: var(--stone);
        margin: 0;
        line-height: 1.7;
    }
    .pp-card a {
        color: var(--gold);
        font-size: 13px;
        text-decoration: none;
    }
    .pp-card a:hover {
        text-decoration: underline;
    }

    /* ── COOKIES TABLE ── */
    .pp-cookie-group-label {
        font-size: 12px;
        font-weight: 600;
        letter-spacing: 2px;
        text-transform: uppercase;
        color: var(--gold-dark);
        margin: 20px 0 8px;
    }
    .pp-cookie-row {
        display: flex;
        gap: 16px;
        align-items: flex-start;
        padding: 12px 0;
        border-bottom: 1px solid rgba(196,154,69,.1);
        font-size: 14px;
    }
    .pp-cookie-row:last-child {
        border-bottom: none;
    }
    .pp-cookie-name {
        font-family: 'Courier New', monospace;
        font-size: 13px;
        color: var(--gold-dark);
        background: rgba(196,154,69,.1);
        border-radius: 6px;
        padding: 3px 10px;
        white-space: nowrap;
        min-width: fit-content;
    }
    .pp-cookie-desc {
        color: var(--stone);
        flex: 1;
    }

    /* ── BADGE ── */
    .pp-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 12px;
        font-weight: 600;
        padding: 5px 12px;
        border-radius: 20px;
        background: rgba(22,163,74,.1);
        color: #15803d;
        margin-left: 12px;
        vertical-align: middle;
    }

    /* ── EXTERNAL LINKS ── */
    .pp-ext-links {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-top: 14px;
    }
    .pp-ext-links a {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 14px;
        color: var(--gold-dark);
        background: rgba(196,154,69,.1);
        border: 1px solid rgba(196,154,69,.25);
        border-radius: 8px;
        padding: 6px 14px;
        text-decoration: none;
        transition: .2s;
    }
    .pp-ext-links a:hover {
        background: var(--gold);
        color: #fff;
        border-color: var(--gold);
    }

    /* ── DIVIDER ── */
    .pp-divider {
        height: 1px;
        background: rgba(196,154,69,.15);
        margin: 0 0 48px;
    }

    /* ── FOOTER NOTE ── */
    .pp-footer-note {
        text-align: center;
        padding: 28px 32px;
        background: var(--ink);
        border-radius: 20px;
        margin-top: 48px;
    }
    .pp-footer-note p {
        color: rgba(255,255,255,.65);
        font-size: 14px;
        margin: 0;
    }
    .pp-footer-note a {
        color: var(--gold-light);
        text-decoration: none;
    }

    /* ── RESPONSIVE ── */
    @media (max-width: 640px) {
        .pp-toc ol {
            grid-template-columns: 1fr;
        }
        .pp-cards {
            grid-template-columns: 1fr;
        }
        .pp-hero-banner {
            padding: 60px 20px 48px;
        }
    }
</style>

{{-- ═══════ HERO BANNER ═══════ --}}
<section class="pp-hero-banner">
    <div class="overlay-text">
        <span class="eyebrow">RR Gems & Jewels</span>
        <h1>Privacy Policy</h1>
        <p>
            We value your trust. This policy explains how
            <a href="https://www.rrgemsandjewels.com/">rrgemsandjewels.com</a>
            collects, stores, and protects your personal information.
        </p>
    </div>
</section>
{{-- HERO --}}



<div class="pp-page">
    <div class="pp-inner">

   
    {{-- INTRODUCTION --}}
    <div class="pp-section" id="intro">
        <div class="pp-section-head">
            <div class="pp-section-icon">📖</div>
            <h2>Introduction</h2>
        </div>
        <div class="pp-body">
            <p>
                Website URL: https://www.rrgemsandjewels.com/
                appreciates your business and trust. Please read this
                Privacy Policy carefully to understand how we collect,
                use, and protect your information when using our services.
            </p>
        </div>
    </div>

    <div class="pp-divider"></div>

    {{-- DATA COLLECTED --}}
    <div class="pp-section" id="data-collected">
        <div class="pp-section-head">
            <div class="pp-section-icon">🗄️</div>
            <h2>Data Collected</h2>
        </div>

        <div class="pp-cards">

            <div class="pp-card">
                <h4>🌍 Data Storage Location</h4>
                <p>
                    Our web servers are hosted in Germany through
                    Hetzner Online GmbH and comply with GDPR standards.
                </p>
            </div>

            <div class="pp-card">
                <h4>👤 Registration Data</h4>
                <p>
                    We store usernames, email addresses, and profile
                    information provided during registration.
                </p>
            </div>

            <div class="pp-card">
                <h4>🛒 Purchase Data</h4>
                <p>
                    Purchase-related information is stored to process
                    orders, downloads, customer support, and services.
                </p>
            </div>

            <div class="pp-card">
                <h4>💬 Support Data</h4>
                <p>
                    Information submitted through support requests is
                    used only for resolving customer issues.
                </p>
            </div>

            <div class="pp-card">
                <h4>📝 Comments</h4>
                <p>
                    When visitors leave comments, we collect comment
                    data, IP address, and browser details for spam
                    detection purposes.
                </p>
            </div>

            <div class="pp-card">
                <h4>📧 Contact Form</h4>
                <p>
                    Information submitted through contact forms is used
                    solely for communication purposes and not shared for
                    marketing.
                </p>
            </div>

            <div class="pp-card">
                <h4>📊 Google Analytics</h4>
                <p>
                    Anonymous analytics data may be collected to improve
                    website performance and user experience.
                </p>
            </div>

        </div>
    </div>

    <div class="pp-divider"></div>

    {{-- USE CASES --}}
    <div class="pp-section" id="use-cases">
        <div class="pp-section-head">
            <div class="pp-section-icon">⚙️</div>
            <h2>How We Use Your Data</h2>
        </div>

        <div class="pp-cards">

            <div class="pp-card">
                <h4>Verification</h4>
                <p>User identification and account verification.</p>
            </div>

            <div class="pp-card">
                <h4>Technical Support</h4>
                <p>Providing customer support and issue resolution.</p>
            </div>

            <div class="pp-card">
                <h4>Critical Updates</h4>
                <p>Sending important service notifications.</p>
            </div>

            <div class="pp-card">
                <h4>Security</h4>
                <p>Fraud prevention and website protection.</p>
            </div>

            <div class="pp-card">
                <h4>Customization</h4>
                <p>Improving and personalizing user experience.</p>
            </div>

            <div class="pp-card">
                <h4>Administration</h4>
                <p>Website management and performance monitoring.</p>
            </div>

        </div>
    </div>

    <div class="pp-divider"></div>

    {{-- EMBEDDED CONTENT --}}
    <div class="pp-section" id="embedded">
        <div class="pp-section-head">
            <div class="pp-section-icon">▶️</div>
            <h2>Embedded Content</h2>
        </div>

        <div class="pp-body">
            <p>
                Pages may contain embedded content such as videos,
                social media feeds, or external widgets. Embedded
                content behaves as if you visited the source website
                directly and may collect data according to their own
                privacy policies.
            </p>
        </div>
    </div>

    <div class="pp-divider"></div>

    {{-- COOKIES --}}
    <div class="pp-section" id="cookies">
        <div class="pp-section-head">
            <div class="pp-section-icon">🍪</div>
            <h2>Cookies</h2>
        </div>

        <div class="pp-body">
            <p>
                We use cookies to improve browsing experience,
                maintain sessions, remember preferences, and analyze
                website traffic.
            </p>
        </div>

        <div class="pp-cookie-row">
            <span class="pp-cookie-name">cfduid</span>
            <span class="pp-cookie-desc">
                Cloudflare CDN identity cookie.
            </span>
        </div>

        <div class="pp-cookie-row">
            <span class="pp-cookie-name">PHPSESSID</span>
            <span class="pp-cookie-desc">
                Unique session identifier.
            </span>
        </div>

        <div class="pp-cookie-row">
            <span class="pp-cookie-name">wordpress_logged_in</span>
            <span class="pp-cookie-desc">
                Stores logged-in session information.
            </span>
        </div>
    </div>

    <div class="pp-divider"></div>

    {{-- ACCESS --}}
    <div class="pp-section" id="access">
        <div class="pp-section-head">
            <div class="pp-section-icon">👥</div>
            <h2>Who Has Access To Your Data</h2>
        </div>

        <div class="pp-body">
            <p>
                Personal information is accessible only to authorized
                administrators and support personnel when required for
                customer service and operational purposes.
            </p>
        </div>
    </div>

    <div class="pp-divider"></div>

    {{-- THIRD PARTY --}}
    <div class="pp-section" id="third-party">
        <div class="pp-section-head">
            <div class="pp-section-icon">🤝</div>
            <h2>Third Party Access</h2>
        </div>

        <div class="pp-body">
            <p>
                We do not sell your personal information. Limited
                information may be shared with service providers when
                necessary for operating our business and fulfilling
                services.
            </p>
        </div>
    </div>

    <div class="pp-divider"></div>

    {{-- RETENTION --}}
    <div class="pp-section" id="retention">
        <div class="pp-section-head">
            <div class="pp-section-icon">🕐</div>
            <h2>How Long We Retain Your Data</h2>
        </div>

        <div class="pp-body">
            <p>
                Support records, comments, and account information are
                retained until deletion is requested or no longer
                necessary for legitimate business purposes.
            </p>
        </div>
    </div>

    <div class="pp-divider"></div>

    {{-- SECURITY --}}
    <div class="pp-section" id="security">
        <div class="pp-section-head">
            <div class="pp-section-icon">🔒</div>
            <h2>Security Measures</h2>
        </div>

        <div class="pp-body">
            <p>
                We use SSL/HTTPS encryption and industry-standard
                security measures to protect your information.
            </p>
        </div>
    </div>

    <div class="pp-divider"></div>

    {{-- RIGHTS --}}
    <div class="pp-section" id="rights">
        <div class="pp-section-head">
            <div class="pp-section-icon">📋</div>
            <h2>Your Rights</h2>
        </div>

        <div class="pp-body">
            <p>
                You may request access, correction, export, or deletion
                of your personal data. We also support applicable GDPR
                rights for eligible users.
            </p>
        </div>
    </div>

    <div class="pp-divider"></div>

    {{-- LEGAL --}}
    <div class="pp-section" id="legal">
        <div class="pp-section-head">
            <div class="pp-section-icon">⚖️</div>
            <h2>Legal Disclosure</h2>
        </div>

        <div class="pp-body">
            <p>
                We may disclose information if required by law, court
                order, legal process, or when necessary to protect our
                rights, users, or business operations.
            </p>
        </div>
    </div>

    <div class="pp-footer-note">
        <p>
            Questions about this Privacy Policy?
            Contact us at
            <a href="mailto:info@rrgemsandjewels.com">
                info@rrgemsandjewels.com
            </a>
            or visit
            <a href="https://www.rrgemsandjewels.com/">
                www.rrgemsandjewels.com
            </a>
        </p>
    </div>

</div>
</div>
</div>