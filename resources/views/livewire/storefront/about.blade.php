<div>
    <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>About Us – RR Gems & Jewels</title>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

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

  /* ── HERO BANNER ── */
  .hero {
    position: relative;
    height: 480px;
    background: url('https://images.unsplash.com/photo-1611652022419-a9419f74343d?w=1600&q=80') center/cover no-repeat;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
  }
  .hero::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(160deg, rgba(26,22,16,.72) 0%, rgba(160,120,48,.45) 100%);
  }
  .hero-inner {
    position: relative;
    z-index: 2;
    padding: 0 20px;
  }
  .hero-eyebrow {
    display: inline-block;
    font-size: 11px;
    letter-spacing: 5px;
    font-weight: 600;
    color: var(--gold-light);
    text-transform: uppercase;
    margin-bottom: 18px;
  }
  .hero h1 {
    font-family: 'Cormorant Garamond', serif;
    font-size: clamp(42px, 6vw, 72px);
    font-weight: 700;
    color: #fff;
    line-height: 1.1;
    margin-bottom: 20px;
  }
  .hero p {
    font-size: 17px;
    color: rgba(255,255,255,.82);
    max-width: 620px;
    margin: auto;
    line-height: 1.8;
  }

  /* ── SHARED UTILITIES ── */
  .container { max-width: 1160px; margin: auto; padding: 0 24px; }
  .section { padding: 96px 0; }
  .section-alt { background: var(--cream); }

  .eyebrow {
    display: inline-block;
    font-size: 11px;
    letter-spacing: 4px;
    font-weight: 600;
    color: var(--gold);
    text-transform: uppercase;
    margin-bottom: 14px;
  }
  .section-title {
    font-family: 'Cormorant Garamond', serif;
    font-size: clamp(32px, 4vw, 48px);
    font-weight: 700;
    color: var(--ink);
    line-height: 1.15;
    margin-bottom: 18px;
  }
  .section-body {
    font-size: 16px;
    color: var(--stone);
    line-height: 1.9;
    margin-bottom: 16px;
  }

  .two-col {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 72px;
    align-items: center;
  }
  .two-col.reversed .col-img { order: 1; }
  .two-col.reversed .col-text { order: 2; }

  .img-frame {
    border-radius: 20px;
    overflow: hidden;
    box-shadow: var(--shadow);
  }
  .img-frame img {
    width: 100%;
    height: 580px;
    object-fit: cover;
    display: block;
    transition: transform .6s ease;
  }
  .img-frame:hover img { transform: scale(1.04); }

  /* ── WHY US CARDS ── */
  .why-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    gap: 28px;
    margin-top: 40px;
  }
  .why-card {
    background: var(--white);
    border: 1px solid rgba(196,154,69,.2);
    border-radius: 16px;
    padding: 32px 28px;
    transition: .3s;
  }
  .why-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 16px 40px rgba(196,154,69,.14);
    border-color: var(--gold);
  }
  .why-icon {
    width: 44px; height: 44px;
    background: linear-gradient(135deg, var(--gold), var(--gold-dark));
    border-radius: 12px;
    display: flex; align-items: center; justify-content: center;
    font-size: 20px;
    margin-bottom: 18px;
  }
  .why-card h4 {
    font-family: 'Cormorant Garamond', serif;
    font-size: 20px; font-weight: 700;
    color: var(--ink);
    margin-bottom: 8px;
  }
  .why-card p { font-size: 14px; color: var(--stone); line-height: 1.7; }

  /* ── TIMELINE ── */
  .timeline-section { background: var(--ink); padding: 96px 0; }
  .timeline-section .section-title { color: var(--white); }
  .timeline-section .eyebrow { color: var(--gold-light); }
  .timeline-section .section-body { color: rgba(255,255,255,.6); }

  .timeline {
    position: relative;
    margin-top: 56px;
  }
  .timeline::before {
    content: '';
    position: absolute;
    left: 50%;
    top: 0; bottom: 0;
    width: 2px;
    background: linear-gradient(to bottom, var(--gold), transparent);
    transform: translateX(-50%);
  }
  .tl-item {
    display: grid;
    grid-template-columns: 1fr 60px 1fr;
    align-items: start;
    gap: 0;
    margin-bottom: 56px;
  }
  .tl-item:last-child { margin-bottom: 0; }
  .tl-content {
    background: rgba(255,255,255,.06);
    border: 1px solid rgba(196,154,69,.2);
    border-radius: 14px;
    padding: 28px 32px;
    transition: .3s;
  }
  .tl-content:hover { background: rgba(196,154,69,.08); border-color: var(--gold); }
  .tl-content h4 {
    font-family: 'Cormorant Garamond', serif;
    font-size: 22px; font-weight: 700;
    color: var(--gold-light);
    margin-bottom: 10px;
  }
  .tl-content p { font-size: 14px; color: rgba(255,255,255,.65); line-height: 1.8; }
  .tl-center {
    display: flex; align-items: flex-start; justify-content: center;
    padding-top: 28px;
  }
  .tl-dot {
    width: 18px; height: 18px;
    border-radius: 50%;
    background: var(--gold);
    border: 3px solid var(--ink);
    box-shadow: 0 0 0 3px var(--gold);
    position: relative; z-index: 1;
  }
  /* left-aligned items */
  .tl-item.left .tl-right { visibility: hidden; }
  .tl-item.right .tl-left { visibility: hidden; }

  /* ── STATS ── */
  .stats-strip {
    background: linear-gradient(135deg, var(--gold-dark) 0%, var(--gold) 100%);
    padding: 64px 0;
  }
  .stats-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 40px;
    text-align: center;
  }
  .stat-num {
    font-family: 'Cormorant Garamond', serif;
    font-size: 52px;
    font-weight: 700;
    color: #fff;
    line-height: 1;
    margin-bottom: 8px;
  }
  .stat-label {
    font-size: 13px;
    font-weight: 500;
    color: rgba(255,255,255,.8);
    letter-spacing: 1px;
  }

  /* ── EXPERTISE FEATURES ── */
  .feat-list {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    margin-top: 32px;
  }
  .feat-item {
    display: flex;
    gap: 14px;
    align-items: flex-start;
  }
  .feat-check {
    width: 34px; height: 34px; min-width: 34px;
    background: linear-gradient(135deg, var(--gold), var(--gold-dark));
    border-radius: 50%;
    color: #fff;
    display: flex; align-items: center; justify-content: center;
    font-size: 14px; font-weight: 700;
  }
  .feat-item h6 { font-size: 15px; font-weight: 600; margin-bottom: 3px; }
  .feat-item p { font-size: 13px; color: var(--stone); margin: 0; }

  /* ── TRUST BADGES ── */
  .trust-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 24px;
    margin-top: 40px;
  }
  .trust-card {
    background: var(--white);
    border-radius: 16px;
    padding: 28px 24px;
    box-shadow: var(--shadow);
    transition: .3s;
    text-align: center;
  }
  .trust-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 24px 50px rgba(0,0,0,.12);
  }
  .trust-card h5 {
    font-family: 'Cormorant Garamond', serif;
    font-size: 28px; font-weight: 700;
    color: var(--gold);
    margin-bottom: 6px;
  }
  .trust-card span { font-size: 14px; color: var(--stone); }

  /* ── RESPONSIVE ── */
  @media (max-width: 991px) {
    .two-col { grid-template-columns: 1fr; gap: 40px; }
    .two-col.reversed .col-img { order: unset; }
    .two-col.reversed .col-text { order: unset; }
    .img-frame img { height: 380px; }
    .timeline::before { left: 28px; }
    .tl-item { grid-template-columns: 60px 1fr; }
    .tl-item.left .tl-right,
    .tl-item.right .tl-left { display: none; }
    .tl-item.left .tl-content,
    .tl-item.right .tl-content { grid-column: 2; }
    .tl-center { padding-top: 28px; }
    .stats-grid { grid-template-columns: 1fr 1fr; gap: 24px; }
    .feat-list { grid-template-columns: 1fr; }
  }
  @media (max-width: 560px) {
    .hero { height: 400px; }
    .stats-grid { grid-template-columns: 1fr 1fr; }
    .stat-num { font-size: 38px; }
  }
</style>
</head>
<body>

<!-- ═══════════════════ HERO ═══════════════════ -->
<section class="hero">
  <div class="hero-inner">
    <span class="hero-eyebrow">Established 1960 · Ajmer, India</span>
    <h1>A Legacy Carved<br>in Precious Stone</h1>
    <p>For over six decades, RR Gems & Jewels has been the trusted name for authentic, certified gemstones — sourced directly, verified in-house, and delivered with integrity.</p>
  </div>
</section>

<!-- ═══════════════════ STATS ═══════════════════ -->
<div class="stats-strip">
  <div class="container">
    <div class="stats-grid">
      <div>
        <div class="stat-num">1960</div>
        <div class="stat-label">Year Established</div>
      </div>
      <div>
        <div class="stat-num">65+</div>
        <div class="stat-label">Years of Expertise</div>
      </div>
      <div>
        <div class="stat-num">100%</div>
        <div class="stat-label">Authentic Gemstones</div>
      </div>
      <div>
        <div class="stat-num">Global</div>
        <div class="stat-label">USA · UK · Australia & More</div>
      </div>
    </div>
  </div>
</div>

<!-- ═══════════════════ OUR STORY ═══════════════════ -->
<section class="section">
  <div class="container">
    <div class="two-col">
      <div class="col-text">
        <span class="eyebrow">Our Story</span>
        <h2 class="section-title">A Family Passion Turned Into a Trusted Legacy</h2>
        <p class="section-body">
          RR Gems & Jewels is a subsidiary of a Gold, Gemstones & Jewelry group established in <strong>1960</strong>. What began at a silver and gold jewelry shop — where a young boy watched his father help customers and grew fascinated by the gems set in every piece — evolved into one of India's most trusted gemstone houses.
        </p>
        <p class="section-body">
          That curiosity led to a formal degree in Gemology and, eventually, the founding of RR Gems: a showroom built on passion, precision, and an unwavering promise to sell only the real thing at a real price.
        </p>
        <p class="section-body">
          Today we serve Jewelers, jewelry designers, astrologers, antique collectors, and retail customers across India and internationally — providing astrological precious & semi-precious gemstones and Rudraksha with the same integrity we started with.
        </p>
      </div>
      <div class="col-img">
        <div class="img-frame">
          <img src="https://t4.ftcdn.net/jpg/06/52/60/47/360_F_652604708_tMBuxc04rBW4jp8CICtcR1sYtYS6Pplg.jpg" alt="RR Gems Story">
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════ WHY RR GEMS ═══════════════════ -->
<section class="section section-alt">
  <div class="container">
    <div style="text-align:center; max-width:660px; margin:auto;">
      <span class="eyebrow">Why Choose Us</span>
      <h2 class="section-title">We Are the Difference Between Real and Imitation</h2>
      <p class="section-body">We deal directly with customers, which means no middlemen, no inflated prices — just genuine gemstones at the best real value of your money.</p>
    </div>
    <div class="why-grid">
      <div class="why-card">
        <h4>In-House Testing Lab</h4>
        <p>Our own Vishwas Gem Testing Lab & Institute verifies every stone. We are not dependent on any external lab.</p>
      </div>
      <div class="why-card">
        <h4>Natural vs Synthetic — We Know</h4>
        <p>We are the ones who differentiate between Natural, Synthetic, and Artificial gemstones — every single time.</p>
      </div>
      <div class="why-card">
        <h4>Direct Customer Dealing</h4>
        <p>No middlemen. We work directly with you, ensuring transparency and the best price at every step.</p>
      </div>
      <div class="why-card">
        <h4>Budget for Everyone</h4>
        <p>We offer gemstones within every budget and expectation — from first-time buyers to serious collectors.</p>
      </div>
      <div class="why-card">
        <h4>R&D Backed Selection</h4>
        <p>Our in-house Research & Development team constantly evaluates gemstone quality, authenticity, and value.</p>
      </div>
      <div class="why-card">
        <h4>Worldwide Service</h4>
        <p>Trusted customers across USA, UK, Australia, and many more countries trust RR Gems for certified stones.</p>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════ TIMELINE ═══════════════════ -->
<section class="timeline-section">
  <div class="container">
    <div style="text-align:center; max-width:600px; margin:auto;">
      <span class="eyebrow">Our Journey</span>
      <h2 class="section-title">From a Family Shop to a Global Name</h2>
      <p class="section-body">Every milestone in our story reflects the same commitment: real gemstones, real value, real trust.</p>
    </div>

    <div class="timeline">

      <div class="tl-item left">
        <div class="tl-left tl-content">
          <h4>1960 — The Foundation</h4>
          <p>The family business begins — a silver and gold jewelry shop where a young founder first discovers his lifelong passion for gems and stones.</p>
        </div>
        <div class="tl-center"><div class="tl-dot"></div></div>
        <div class="tl-right"></div>
      </div>

      <div class="tl-item right">
        <div class="tl-left"></div>
        <div class="tl-center"><div class="tl-dot"></div></div>
        <div class="tl-right tl-content">
          <h4>2017 — RR Gems Launches</h4>
          <p>We opened our showroom with a traditional approach: heirloom-quality jewelry designed in-house using the finest alloys, gems, and stones.</p>
        </div>
      </div>

      <div class="tl-item left">
        <div class="tl-left tl-content">
          <h4>2018 — Collection Expands</h4>
          <p>We expanded our gemstone selection with vibrant hues and connected with prominent wholesale gemstone dealers, curating bold and expressive jewelry designs.</p>
        </div>
        <div class="tl-center"><div class="tl-dot"></div></div>
        <div class="tl-right"></div>
      </div>

      <div class="tl-item right">
        <div class="tl-left"></div>
        <div class="tl-center"><div class="tl-dot"></div></div>
        <div class="tl-right tl-content">
          <h4>2019 — Going Online</h4>
          <p>We launched our online platform so customers anywhere could purchase natural, certified, original gemstones at real prices — with confidence and convenience.</p>
        </div>
      </div>

      <div class="tl-item left">
        <div class="tl-left tl-content">
          <h4>2020 — Digital Growth</h4>
          <p>We focused on building our digital presence and welcoming more people into the RR Gems family — strengthening service, trust, and reach.</p>
        </div>
        <div class="tl-center"><div class="tl-dot"></div></div>
        <div class="tl-right"></div>
      </div>

      <div class="tl-item right">
        <div class="tl-left"></div>
        <div class="tl-center"><div class="tl-dot"></div></div>
        <div class="tl-right tl-content">
          <h4>2021–22 — Around the Clock</h4>
          <p>With surging demand and growing orders, RR Gems became a full-time, round-the-clock business — a true milestone in our journey.</p>
        </div>
      </div>

      <div class="tl-item left">
        <div class="tl-left tl-content">
          <h4>2022–25 — Global Expansion</h4>
          <p>We now serve customers in the USA, UK, Australia, and beyond. By working directly with cutting factories and trusted sources, we deliver premium gemstones and diamonds at competitive prices worldwide.</p>
        </div>
        <div class="tl-center"><div class="tl-dot"></div></div>
        <div class="tl-right"></div>
      </div>

    </div>
  </div>
</section>

<!-- ═══════════════════ SELECTION EXPERTISE ═══════════════════ -->
<section class="section">
  <div class="container">
    <div class="two-col reversed">
      <div class="col-img">
        <div class="img-frame">
          <img src="https://img.freepik.com/premium-photo/couple-purchasing-jewellery-man-woman-jewelry-store-luxury-jewellery-shopping_162695-12552.jpg" alt="Gemstone Selection">
        </div>
      </div>
      <div class="col-text">
        <span class="eyebrow">Our Expertise</span>
        <h2 class="section-title">Every Stone is Examined Before It Reaches You</h2>
        <p class="section-body">
          At RR Gems, gemstone selection is a meticulous process driven by expertise, precision, and passion. Our specialists — backed by the Vishwas Gem Testing Lab — evaluate every stone for color, clarity, cut, and brilliance.
        </p>
        <p class="section-body">
          From vibrant sapphires and precious rubies to rare astrological stones, only those that pass our exacting standards become part of our collection.
        </p>
        <div class="feat-list">
          <div class="feat-item">
            <div class="feat-check">✓</div>
            <div>
              <h6>Natural Origin</h6>
              <p>Carefully sourced from trusted origins.</p>
            </div>
          </div>
          <div class="feat-item">
            <div class="feat-check">✓</div>
            <div>
              <h6>In-House Testing</h6>
              <p>Our own lab, no external dependency.</p>
            </div>
          </div>
          <div class="feat-item">
            <div class="feat-check">✓</div>
            <div>
              <h6>Premium Quality Only</h6>
              <p>Only exceptional stones pass our check.</p>
            </div>
          </div>
          <div class="feat-item">
            <div class="feat-check">✓</div>
            <div>
              <h6>Full Transparency</h6>
              <p>What you see is exactly what you get.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════ COMMITMENT ═══════════════════ -->
<section class="section section-alt">
  <div class="container">
    <div class="two-col">
      <div class="col-text">
        <span class="eyebrow">Our Commitment</span>
        <h2 class="section-title">Trust Built on Authenticity & Transparency</h2>
        <p class="section-body">
          At RR Gems, authenticity is not just a promise — it is the foundation of everything we do. Our primary objective is simple: <em>REAL Gemstones with the REAL Value of Money.</em>
        </p>
        <p class="section-body">
          Our team follows strict quality standards and verification processes from sourcing to final inspection. Every gemstone is checked, documented, and certified before it reaches our customer — whether they are buying for jewelry, astrology, investment, or collection.
        </p>
        <p class="section-body">
          This dedication has helped us build lasting relationships with customers across India and around the world who return to us time and again for confidence, quality, and care.
        </p>
        <div class="trust-grid" style="margin-top:32px;">
          <div class="trust-card">
            <h5>100%</h5>
            <span>Authentic Gemstones</span>
          </div>
          <div class="trust-card">
            <h5>Lab</h5>
            <span>In-House Verification</span>
          </div>
          <div class="trust-card">
            <h5>Direct</h5>
            <span>No Middlemen</span>
          </div>
          <div class="trust-card">
            <h5>Global</h5>
            <span>Worldwide Trusted</span>
          </div>
        </div>
      </div>
      <div class="col-img">
        <div class="img-frame">
          <img src="https://img.freepik.com/premium-photo/jewelry-store-salesman-showing-expensive-watches-female-customer_641010-67701.jpg" alt="Authentic Gemstones">
        </div>
      </div>
    </div>
  </div>
</section>

</body>
</html>

</div>