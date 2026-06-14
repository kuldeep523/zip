<div>
    
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
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
        <h1>Shipping Policy</h1>
        <p>
            We value your trust. This policy explains how
            <a href="https://www.rrgemsandjewels.com/">rrgemsandjewels.com</a>
            collects, stores, and protects your personal information.
        </p>
    </div>
</section>
{{-- HERO --}}

{{-- HERO BANNER --}}


<div class="pp-page">
    <div class="pp-inner">

    {{-- TABLE OF CONTENTS --}}
    <div class="pp-toc">
        <h2>Contents</h2>
        <ol>
            <li><a href="#domestic">Domestic Shipping</a></li>
            <li><a href="#rates">Shipping Rates</a></li>
            <li><a href="#international">International Shipping</a></li>
            <li><a href="#express">Express Delivery</a></li>
            <li><a href="#safety">Shipping Safety</a></li>
            <li><a href="#tracking">Order Tracking</a></li>
            <li><a href="#customs">Customs & Taxes</a></li>
            <li><a href="#damages">Damages</a></li>
            <li><a href="#cancel">Cancellation Policy</a></li>
            <li><a href="#returns">Return & Refund Policy</a></li>
        </ol>
    </div>

    {{-- DOMESTIC SHIPPING --}}
    <div class="pp-section" id="domestic">
        <div class="pp-section-head">
            <div class="pp-section-icon">
                <i class="fas fa-truck"></i>
            </div>
            <h2>Domestic Shipping</h2>
        </div>

        <div class="pp-cards">

            <div class="pp-card">
                <h4>Loose Gemstones</h4>
                <p>
                    Orders are processed and shipped within
                    1–2 business days.
                </p>
            </div>

            <div class="pp-card">
                <h4>Gemstone With Ring</h4>
                <p>
                    Orders requiring gemstone setting in a ring
                    generally ship within 4–5 business days.
                </p>
            </div>

            <div class="pp-card">
                <h4>Lab Certification</h4>
                <p>
                    Additional laboratory certification may require
                    extra processing time before shipment.
                </p>
            </div>

            <div class="pp-card">
                <h4>Customized Orders</h4>
                <p>
                    Custom-made and pre-order products may require
                    additional manufacturing and shipping time.
                </p>
            </div>

        </div>

        <div class="pp-body" style="margin-top:20px;">
            <p>
                Orders are not shipped on weekends or public holidays.
                During high-volume periods, shipping may be delayed.
                Customers will be notified if significant delays occur.
            </p>
        </div>
    </div>

    <div class="pp-divider"></div>

    {{-- SHIPPING RATES --}}
    <div class="pp-section" id="rates">
        <div class="pp-section-head">
            <div class="pp-section-icon">
                <i class="fas fa-box"></i>
            </div>
            <h2>Shipping Rates & Delivery Estimates</h2>
        </div>

        <div class="pp-cards">

            <div class="pp-card">
                <h4>Free Shipping</h4>
                <p>
                    Free shipping available across India.
                </p>
            </div>

            <div class="pp-card">
                <h4>Delivery Time</h4>
                <p>
                    95%+ serviceable pin codes are delivered within
                    6–7 business days.
                </p>
            </div>

            <div class="pp-card">
                <h4>Maximum Delivery Window</h4>
                <p>
                    If delivery is not completed within 45 days,
                    a refund may be issued.
                </p>
            </div>

            <div class="pp-card">
                <h4>Cash On Delivery</h4>
                <p>
                    COD available for most serviceable pin codes.
                    Additional prepaid charge: ₹500.
                </p>
            </div>

            <div class="pp-card">
                <h4>COD Limit</h4>
                <p>
                    Maximum order value for COD is ₹9,999.
                    Orders above this amount require prepayment.
                </p>
            </div>

            <div class="pp-card">
                <h4>Custom Orders</h4>
                <p>
                    COD facility is not available on customized orders.
                </p>
            </div>

        </div>
    </div>

    <div class="pp-divider"></div>

    {{-- INTERNATIONAL SHIPPING --}}
    <div class="pp-section" id="international">
        <div class="pp-section-head">
            <div class="pp-section-icon">
                <i class="fas fa-globe"></i>
            </div>
            <h2>International Shipping</h2>
        </div>

        <div class="pp-body">
            <p>
                International shipping charges vary depending on the
                destination country and package requirements.
            </p>

            <p>
                Shipping costs will be shared during order placement.
                Customers are advised to contact our support team before
                placing international orders.
            </p>
        </div>
    </div>

    <div class="pp-divider"></div>

    {{-- EXPRESS DELIVERY --}}
    <div class="pp-section" id="express">
        <div class="pp-section-head">
            <div class="pp-section-icon">
                <i class="fas fa-shipping-fast"></i>
            </div>
            <h2>Express / Next Day Delivery</h2>
        </div>

        <div class="pp-cards">

            <div class="pp-card">
                <h4>Availability</h4>
                <p>
                    Available for selected metro cities across India.
                </p>
            </div>

            <div class="pp-card">
                <h4>Extra Charges</h4>
                <p>
                    ₹2,000 additional delivery charge applies.
                </p>
            </div>

            <div class="pp-card">
                <h4>Order Cut-Off</h4>
                <p>
                    Order must be placed before 3 PM on the previous day.
                </p>
            </div>

            <div class="pp-card">
                <h4>Restrictions</h4>
                <p>
                    Not available on Sundays and public holidays.
                </p>
            </div>

        </div>
    </div>

    <div class="pp-divider"></div>

    {{-- SAFETY --}}
    <div class="pp-section" id="safety">
        <div class="pp-section-head">
            <div class="pp-section-icon">
                <i class="fas fa-shield-alt"></i>
            </div>
            <h2>Product Safety During Shipping</h2>
        </div>

        <div class="pp-body">
            <p>
                We partner with trusted logistics providers including
                Delhivery, DTDC, and Blue Dart.
            </p>

            <p>
                Courier partners are selected based on serviceability,
                delivery speed, and operational efficiency.
            </p>

            <p>
                For remote areas, India Post services may be used.
            </p>
        </div>
    </div>

    <div class="pp-divider"></div>

    {{-- TRACKING --}}
    <div class="pp-section" id="tracking">
        <div class="pp-section-head">
            <div class="pp-section-icon">
                <i class="fas fa-map-marker-alt"></i>
            </div>
            <h2>Order Tracking</h2>
        </div>

        <div class="pp-body">
            <p>
                Once your order has been shipped, a shipment
                confirmation email containing the tracking number
                will be sent to you.
            </p>

            <p>
                Tracking details generally become active within
                24 hours.
            </p>
        </div>
    </div>

    <div class="pp-divider"></div>

    {{-- CUSTOMS --}}
    <div class="pp-section" id="customs">
        <div class="pp-section-head">
            <div class="pp-section-icon">
                <i class="fas fa-file-invoice-dollar"></i>
            </div>
            <h2>Customs, Duties & Taxes</h2>
        </div>

        <div class="pp-body">
            <p>
                Domestic Indian orders include all applicable taxes.
                No additional charges are payable on delivery.
            </p>

            <p>
                For international shipments, customs duties,
                import taxes, tariffs, and local government fees
                are the responsibility of the customer.
            </p>
        </div>
    </div>

    <div class="pp-divider"></div>

    {{-- DAMAGES --}}
    <div class="pp-section" id="damages">
        <div class="pp-section-head">
            <div class="pp-section-icon">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <h2>Damages</h2>
        </div>

        <div class="pp-body">
            <p>
                If your order arrives damaged or incorrect,
                please notify us within 3 days of delivery
                with your Order ID and supporting details.
            </p>
        </div>
    </div>

    <div class="pp-divider"></div>

    {{-- CANCELLATION --}}
    <div class="pp-section" id="cancel">
        <div class="pp-section-head">
            <div class="pp-section-icon">
                <i class="fas fa-ban"></i>
            </div>
            <h2>How Do I Cancel My Order?</h2>
        </div>

        <div class="pp-body">
            <p>
                Orders may be cancelled within 6 hours of placement by
                emailing rrgemsandjewels@gmail.com.
            </p>

            <p>
                Orders cancelled before dispatch are eligible for a full refund.
            </p>

            <p>
                Orders cancelled after dispatch will be refunded after
                deducting shipping and return charges.
            </p>
        </div>
    </div>

    <div class="pp-divider"></div>

    {{-- RETURNS --}}
    <div class="pp-section" id="returns">
        <div class="pp-section-head">
            <div class="pp-section-icon">
                <i class="fas fa-undo"></i>
            </div>
            <h2>Exchange, Return & Refund Policy</h2>
        </div>

        <div class="pp-cards">

            <div class="pp-card">
                <h4>Easy Returns</h4>
                <p>
                    Return or exchange requests can be raised via
                    WhatsApp or phone support.
                </p>
            </div>

            <div class="pp-card">
                <h4>Refund Options</h4>
                <p>
                    Refund, replacement, or store credit may be
                    provided depending on customer preference.
                </p>
            </div>

            <div class="pp-card">
                <h4>COD Refunds</h4>
                <p>
                    COD refunds are transferred only to the bank
                    account of the billing customer.
                </p>
            </div>

            <div class="pp-card">
                <h4>Product Appearance</h4>
                <p>
                    Minor differences in appearance may occur due to
                    lighting and display settings.
                </p>
            </div>

        </div>

        <div class="pp-body" style="margin-top:20px;">
            <p>
                Contact: +91-9057021038
                <br>
                Email: rrgemsandjewels@gmail.com
            </p>
        </div>
    </div>

    <div class="pp-footer-note">
        <p>
            For shipping assistance, returns, exchanges or refunds,
            contact us at
            <a href="mailto:rrgemsandjewels@gmail.com">
                rrgemsandjewels@gmail.com
            </a>
            or call
            <a href="tel:+919057021038">
                +91-9057021038
            </a>
        </p>
    </div>

</div>

</div>

</div>