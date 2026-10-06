@extends('layouts.frontend-master')

@section('content')

{{-- Google Fonts --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@500;600;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Playfair+Display:ital,wght@1,600;1,700&display=swap" rel="stylesheet">

<style>
:root {
  --br: #876039;
  --br-dark: #6f4e2d;
  --br-light: #fbf7f2;
  --br-gold: #b88e56;
  --bg: #ffffff;
  --bg2: #fdfaf6;
  --bg3: #f5efe8;
  --dark: #241A14;
  --ink: #30241c;
  --mute: #786a60;
  --line: rgba(135, 96, 57, 0.12);
  --card: #ffffff;
  --shadow-sm: 0 4px 20px rgba(135, 96, 57, 0.05);
  --shadow-md: 0 16px 40px rgba(135, 96, 57, 0.08);
  --shadow-lg: 0 26px 50px rgba(135, 96, 57, 0.12);
  --green: #10B981;
  --blue: #3B82F6;
  --amber: #F59E0B;
  --red: #EF4444;
}

* { box-sizing: border-box; }
html { scroll-behavior: smooth; }
body {
  margin: 0;
  font: 400 16px/1.65 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
  color: var(--ink);
  background: var(--bg) !important;
  overflow-x: hidden;
  -webkit-font-smoothing: antialiased;
}

h1, h2, h3, h4, h5 {
  margin: 0;
  font-family: 'Outfit', 'Plus Jakarta Sans', sans-serif;
  font-weight: 500;
  line-height: 1.15;
  letter-spacing: -0.02em;
  color: var(--ink);
}
h1 { font-size: clamp(36px, 5vw, 62px); }
h2 { font-size: clamp(28px, 3.8vw, 44px); }
h3 { font-size: 20px; font-weight: 700; }
p { margin: 0; color: var(--mute); font-size: 16px; line-height: 1.65; }
a { color: inherit; text-decoration: none; }
ul { list-style: none; margin: 0; padding: 0; }

.sf {
  font-family: 'Playfair Display', Georgia, serif;
  font-style: italic;
  font-weight: 700;
  background: linear-gradient(135deg, #876039 0%, #a87646 50%, #c89659 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  display: inline-block;
  padding-right: 4px;
}

.eb {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  font-size: 12px;
  letter-spacing: .16em;
  font-weight: 500;
  text-transform: uppercase;
  color: var(--br);
  margin-bottom: 16px;
  background: linear-gradient(135deg, #fbf7f2 0%, #f4efe9 100%);
  padding: 7px 18px;
  border-radius: 99px;
  border: 1px solid rgba(135, 96, 57, 0.22);
  box-shadow: 0 2px 10px rgba(135, 96, 57, 0.08);
  font-family: 'Plus Jakarta Sans', sans-serif;
}

.w { max-width: 1240px; margin: auto; padding: 0 24px; position: relative; z-index: 1; }
section { padding: clamp(60px, 7vw, 96px) 0; background: var(--bg); position: relative; overflow: hidden; }
section.alt { background: var(--bg2); }
.hd { max-width: 760px; margin: 0 auto 52px; text-align: center; }
.hd.left { text-align: left; margin: 0 0 40px; }
.hd p { margin-top: 14px; font-size: 18px; }

/* Buttons */
.btn { display: inline-flex; align-items: center; justify-content: center; gap: 8px; padding: 14px 28px; border-radius: 12px; font: 700 15px 'Plus Jakarta Sans', sans-serif; border: 1px solid var(--br); transition: .25s ease; cursor: pointer; text-decoration: none; }
.btn.p { background: linear-gradient(135deg, #876039 0%, #a87646 100%); color: #fff; box-shadow: 0 4px 16px rgba(135,96,57,0.28); }
.btn.p:hover { transform: translateY(-2px); background: linear-gradient(135deg, #6f4e2d 0%, #876039 100%); box-shadow: 0 8px 24px rgba(135,96,57,0.38); }
.btn.o { color: var(--br); background: #fff; }
.btn.o:hover { background: var(--br); color: #fff; transform: translateY(-2px); }

/* Breadcrumb */
.bc { padding: 18px 0 16px; background: var(--bg2); border-bottom: 1px solid var(--line); font-size: 14px; color: var(--mute); font-weight: 600; }
.bc .w { display: flex; align-items: center; gap: 8px; flex-wrap: wrap; }
.bc a { color: var(--mute); transition: color .2s; }
.bc a:hover { color: var(--br); }
.bc span.cur { color: var(--br); font-weight: 700; }

/* Badges */
.badge { font-size: 11px; font-weight: 500; padding: 4px 10px; border-radius: 8px; text-transform: uppercase; display: inline-block; letter-spacing: .04em; }
.badge.ready { background: #d1fae5; color: #047857; }
.badge.preparing { background: #ffedd5; color: #c2410c; }
.badge.new { background: #eff6ff; color: #1d4ed8; }
.badge.soldout { background: #fee2e2; color: #b91c1c; }

/* Win container (simulated UI) */
.win { background: #fff; border: 1px solid var(--line); border-radius: 20px; overflow: hidden; box-shadow: var(--shadow-md); }
.wb { display: flex; align-items: center; justify-content: space-between; padding: 12px 18px; background: var(--bg2); border-bottom: 1px solid var(--line); }
.wb .dots { display: flex; gap: 6px; }
.wb i { width: 10px; height: 10px; border-radius: 50%; display: inline-block; }
.wb i:nth-child(1) { background: #ff5f56; }
.wb i:nth-child(2) { background: #ffbd2e; }
.wb i:nth-child(3) { background: #27c93f; }
.wb .ttl { color: var(--br); font-weight: 500; font-family: 'Outfit', sans-serif; letter-spacing: 0.05em; font-size: 12px; text-transform: uppercase; }

/* ---------------- HERO ---------------- */
.hero { padding: 60px 0 90px; background: linear-gradient(180deg, var(--bg2) 0%, #ffffff 100%); }
.hero-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 48px; align-items: center; }
.hero-ctx p { font-size: 18px; margin: 20px 0 32px; max-width: 540px; }
.hero-btns { display: flex; gap: 16px; flex-wrap: wrap; }

.hero-ui { background: #fff; border: 1px solid var(--line); border-radius: 24px; box-shadow: var(--shadow-lg); overflow: hidden; position: relative; }
.hero-ui-hdr { background: var(--bg2); padding: 16px 20px; border-bottom: 1px solid var(--line); display: flex; justify-content: space-between; align-items: center; }
.hero-ui-hdr-title { font-weight: 500; font-size: 14px; color: var(--ink); display: flex; align-items: center; gap: 8px; }
.hero-ui-grid { display: grid; grid-template-columns: 2fr 1fr; }
.hu-left { padding: 20px; border-right: 1px solid var(--line); }
.hu-right { padding: 20px; background: #faf8f5; }

.hu-cat-tabs { display: flex; gap: 8px; overflow-x: auto; margin-bottom: 16px; scrollbar-width: none; }
.hu-cat { padding: 6px 14px; border-radius: 8px; border: 1px solid var(--line); font-size: 12px; font-weight: 700; background: var(--bg2); white-space: nowrap; }
.hu-cat.act { background: var(--br); color: #fff; border-color: var(--br); }

.hu-prod-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px; }
.hu-prod { border: 1px solid var(--line); border-radius: 12px; overflow: hidden; }
.hu-prod-img { height: 80px; width: 100%; object-fit: cover; }
.hu-prod-ctx { padding: 10px; font-size: 12px; }
.hu-prod-ctx strong { display: block; font-size: 13px; font-weight: 500; margin-bottom: 2px; }
.hu-prod-ctx span { color: var(--br); font-weight: 700; }

.hu-bill-item { display: flex; justify-content: space-between; font-size: 12px; margin-bottom: 8px; padding-bottom: 8px; border-bottom: 1px dashed var(--line); }
.hu-bill-total { display: flex; justify-content: space-between; font-weight: 500; font-size: 15px; color: var(--br); margin-top: 16px; }

/* ---------------- SECTION 1 ---------------- */
.eco-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }
.eco-card { padding: 28px; background: #fff; border: 1px solid var(--line); border-radius: 20px; transition: .3s; }
.eco-card:hover { transform: translateY(-4px); border-color: var(--br); box-shadow: var(--shadow-md); }
.eco-card h3 { margin: 18px 0 8px; font-size: 18px; }
.eco-card p { font-size: 14px; color: var(--mute); }
.ic { width: 48px; height: 48px; border-radius: 13px; background: var(--bg2); color: var(--br); display: grid; place-items: center; border: 1px solid var(--line); transition: .3s ease; }
.eco-card:hover .ic { background: var(--br); color: #fff; border-color: var(--br); }

/* ---------------- SECTION 2 ---------------- */
.cat-sec-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 48px; align-items: center; }
.prod-list { display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px; }
.pc-card { display: flex; align-items: center; gap: 12px; padding: 12px; border: 1px solid var(--line); border-radius: 16px; background: #fff; }
.pc-img { width: 64px; height: 64px; border-radius: 10px; object-fit: cover; }
.pc-ctx h4 { font-size: 14px; margin-bottom: 4px; }
.pc-ctx .wt { font-size: 11px; color: var(--mute); background: var(--bg2); padding: 2px 8px; border-radius: 4px; display: inline-block; }

/* ---------------- SECTION 3: WEIGHT ---------------- */
.wt-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; }
.wt-card { background: #fff; border: 1px solid var(--line); border-radius: 16px; overflow: hidden; }
.wt-hdr { padding: 12px 16px; background: var(--bg2); border-bottom: 1px solid var(--line); font-weight: 500; display: flex; justify-content: space-between; }
.wt-opts { padding: 12px; }
.wt-opt { display: flex; justify-content: space-between; padding: 8px; border: 1px solid transparent; border-radius: 8px; cursor: pointer; transition: .2s; }
.wt-opt:hover { background: var(--br-light); border-color: var(--line); }
.wt-opt strong { color: var(--br); }

/* ---------------- SECTION 4: BILLING ---------------- */
.bill-panel { background: #fff; border: 1px solid var(--line); border-radius: 20px; max-width: 480px; margin: 0 auto; box-shadow: var(--shadow-md); overflow: hidden; }
.bp-hdr { padding: 16px 20px; background: var(--bg2); border-bottom: 1px solid var(--line); font-weight: 500; font-size: 15px; }
.bp-body { padding: 20px; }
.bp-item { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 16px; font-size: 14px; }
.bp-item-qty { font-size: 12px; color: var(--mute); display: block; }
.bp-total { display: flex; justify-content: space-between; padding: 16px 0; border-top: 2px dashed var(--line); margin-top: 8px; font-weight: 500; font-size: 20px; color: var(--br); }
.bp-actions { display: grid; grid-template-columns: repeat(3, 1fr); gap: 8px; margin-top: 16px; }
.bp-btn { padding: 10px; border-radius: 8px; border: 1px solid var(--line); background: #fff; font-weight: 700; font-size: 12px; cursor: pointer; }
.bp-btn.p { background: var(--br); color: #fff; border-color: var(--br); }

/* ---------------- SECTION 5 & 6 ---------------- */
.two-col-flow { display: grid; grid-template-columns: 1fr 1fr; gap: 48px; }
.order-ticket { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 20px; position: relative; }
.ot-hdr { display: flex; justify-content: space-between; margin-bottom: 16px; border-bottom: 1px solid var(--line); padding-bottom: 12px; }
.ot-flow { display: flex; gap: 12px; margin-top: 16px; }
.ot-step { flex: 1; text-align: center; font-size: 10px; font-weight: 500; text-transform: uppercase; padding: 6px; border-radius: 6px; background: var(--bg2); color: var(--mute); border: 1px solid var(--line); }
.ot-step.done { background: var(--br-light); color: var(--br); border-color: var(--br); }

.fest-dash { display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px; }
.fd-card { padding: 20px; background: #fff; border: 1px solid var(--line); border-radius: 16px; text-align: center; position: relative; overflow: hidden; }
.fd-val { font-size: 32px; font-weight: 500; color: var(--br); line-height: 1.2; }
.fd-lbl { font-size: 12px; font-weight: 700; color: var(--mute); text-transform: uppercase; letter-spacing: 0.05em; }

/* ---------------- SECTION 7 & 8 ---------------- */
.avail-list { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 12px; }
.avail-item { display: flex; justify-content: space-between; padding: 12px 16px; border-bottom: 1px solid var(--bg2); font-weight: 600; font-size: 14px; }
.avail-item:last-child { border: none; }

.inv-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; }
.inv-card { background: #fff; border: 1px solid var(--line); border-radius: 14px; padding: 16px; }
.inv-hdr { display: flex; justify-content: space-between; margin-bottom: 8px; font-size: 14px; font-weight: 700; }
.inv-val { font-size: 22px; font-weight: 500; color: var(--ink); }

/* ---------------- SECTION 9 & 10 ---------------- */
.po-card { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 20px; }
.cust-card { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 20px; }

/* ---------------- SECTION 11: REPORTS ---------------- */
.reports-preview { background: var(--dark); color: #fff; border-radius: 24px; padding: 36px; box-shadow: var(--shadow-lg); }
.rp-stats { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; margin-bottom: 32px; }
.rp-stat-card { background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 14px; padding: 16px; }
.rp-val { font-size: 24px; font-weight: 500; color: #fff; }
.rp-lbl { font-size: 12px; font-weight: 700; color: rgba(255,255,255,0.6); }

/* ---------------- SECTION 12: WORKFLOW ---------------- */
.workflow-scroll { overflow-x: auto; padding-bottom: 20px; }
.connected-flow { display: flex; justify-content: space-between; align-items: center; min-width: 800px; gap: 10px; background: #fff; padding: 32px; border-radius: 24px; border: 1px solid var(--line); }
.cf-node { text-align: center; width: 75px; }
.cf-icon { width: 48px; height: 48px; border-radius: 14px; background: var(--bg2); color: var(--br); border: 1px solid var(--line); display: grid; place-items: center; margin: 0 auto 10px; }
.cf-arrow { color: var(--mute); opacity: 0.4; }

/* ---------------- SECTION 13: BENEFITS ---------------- */
.benefits-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; }
.b-card { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 24px; }

/* ---------------- SECTION 14: IDEAL FOR ---------------- */
.industry-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; }
.ind-card { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 16px; display: flex; align-items: center; gap: 12px; font-weight: 700; font-size: 14px; }

/* ---------------- SECTION 15 & 16: CUST EXP & MOBILE ---------------- */
.mob-preview { max-width: 300px; margin: 0 auto; background: #000; border: 4px solid #333; border-radius: 36px; padding: 10px; box-shadow: var(--shadow-lg); }
.mob-inner { background: #fff; border-radius: 26px; height: 500px; overflow: hidden; padding: 16px; }

/* ---------------- SECTION 17: SHOWCASE ---------------- */
.showcase-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; }
.showcase-card { border-radius: 16px; overflow: hidden; position: relative; height: 200px; }
.showcase-card img { width: 100%; height: 100%; object-fit: cover; }
.showcase-card div { position: absolute; bottom: 0; left: 0; right: 0; padding: 20px 16px 12px; background: linear-gradient(0deg, rgba(0,0,0,0.8), transparent); color: #fff; font-weight: 500; font-size: 15px; }

/* ---------------- FAQ ---------------- */
.faq-list { max-width: 840px; margin: auto; display: flex; flex-direction: column; gap: 16px; }
.faq-item { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 20px 24px; cursor: pointer; transition: .2s; }
.faq-item summary { font-weight: 700; font-size: 16px; display: flex; justify-content: space-between; align-items: center; list-style: none; }
.faq-item summary::-webkit-details-marker { display: none; }
.faq-item p { margin-top: 12px; font-size: 15px; color: var(--mute); }

/* ---------------- CTA ---------------- */
.cta-sec { padding: 100px 0; background: var(--bg3); text-align: center; position: relative; }
.cta-box { max-width: 760px; margin: auto; }
.cta-box h2 { color: var(--ink); margin-bottom: 16px; }

/* Responsive */
@media (max-width: 1024px) {
  .hero-grid, .cat-sec-grid, .two-col-flow { grid-template-columns: 1fr; gap: 36px; }
  .eco-grid, .wt-grid, .fest-dash, .inv-grid, .benefits-grid { grid-template-columns: repeat(2, 1fr); }
  .industry-grid, .showcase-grid, .rp-stats { grid-template-columns: repeat(2, 1fr); }
}

@media (max-width: 768px) {
  .bc { padding: 14px 0 14px; }
  .w { padding: 0 16px; }
  .win { min-width: 0 !important; width: 100%; overflow-x: auto; }
}

@media (max-width: 640px) {
  .eco-grid, .wt-grid, .inv-grid, .benefits-grid, .industry-grid, .showcase-grid, .rp-stats { grid-template-columns: 1fr; }
  .prod-list { grid-template-columns: 1fr; }
  .bp-actions { grid-template-columns: 1fr; }
  .hero-btns { flex-direction: column; }
  .hero-btns .btn { width: 100%; }
}

@media (max-width: 480px) {
  .btn { width: 100%; }
}
</style>

{{-- BREADCRUMB --}}
<div class="bc">
  <div class="w">
    <a href="{{ url('/') }}">Home</a>
    <span>/</span>
    <a href="{{ route('features') }}">Solutions</a>
    <span>/</span>
    <span class="cur">Sweet Shop</span>
  </div>
</div>

{{-- HERO --}}
<section class="hero">
  <div class="w hero-grid">
    <div class="hero-ctx">
      <div class="eb">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg>
        SWEET SHOP SOLUTION
      </div>
      <h1>Manage Every Sweet. <span class="sf">Serve Every Customer</span> Better.</h1>
      <p>Manage sweets, snacks, orders, billing, inventory and daily shop operations from one connected platform built for modern sweet shops.</p>
      <div class="hero-btns">
        <a href="{{ route('contact.us') }}" class="btn p">Get Started →</a>
        <a href="{{ route('contact.us') }}" class="btn o">Book a Demo →</a>
      </div>
    </div>

    <div class="hero-ui">
      <div class="hero-ui-hdr">
        <div class="hero-ui-hdr-title">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--br)" stroke-width="2.5"><rect x="3" y="3" width="18" height="18" rx="2"/></svg>
          Geni Menu — Shop POS
        </div>
        <span class="badge ready">Peak Hour</span>
      </div>
      <div class="hero-ui-grid">
        <div class="hu-left">
          <div class="hu-cat-tabs">
            <span class="hu-cat act">Milk Sweets</span>
            <span class="hu-cat">Dry Fruits</span>
            <span class="hu-cat">Savouries</span>
          </div>
          <div class="hu-prod-grid">
            <div class="hu-prod">
              <img class="hu-prod-img" src="https://images.unsplash.com/photo-1625902127814-ff476e33db0c?w=200&q=80" alt="Kaju Katli">
              <div class="hu-prod-ctx">
                <strong>Kaju Katli</strong>
                <span>₹560 / 500g</span>
              </div>
            </div>
            <div class="hu-prod">
              <img class="hu-prod-img" src="https://images.unsplash.com/photo-1605197136015-776263f350da?w=200&q=80" alt="Gulab Jamun">
              <div class="hu-prod-ctx">
                <strong>Gulab Jamun</strong>
                <span>₹240 / 500g</span>
              </div>
            </div>
            <div class="hu-prod">
              <img class="hu-prod-img" src="https://images.unsplash.com/photo-1595209386221-5079a40dd798?w=200&q=80" alt="Mysore Pak">
              <div class="hu-prod-ctx">
                <strong>Mysore Pak</strong>
                <span>₹320 / 500g</span>
              </div>
            </div>
            <div class="hu-prod">
              <img class="hu-prod-img" src="https://images.unsplash.com/photo-1601050690597-df0568f70950?w=200&q=80" alt="Mixture">
              <div class="hu-prod-ctx">
                <strong>Special Mixture</strong>
                <span>₹180 / 500g</span>
              </div>
            </div>
          </div>
        </div>
        <div class="hu-right">
          <div style="font-weight: 500; font-size:13px; margin-bottom:12px; padding-bottom:8px; border-bottom:1px solid var(--line);">Current Bill</div>
          <div class="hu-bill-item">
            <div>Kaju Katli<br><span style="color:var(--mute);">500g</span></div>
            <strong>₹560</strong>
          </div>
          <div class="hu-bill-item">
            <div>Mysore Pak<br><span style="color:var(--mute);">250g</span></div>
            <strong>₹160</strong>
          </div>
          <div class="hu-bill-item">
            <div>Special Mixture<br><span style="color:var(--mute);">500g</span></div>
            <strong>₹180</strong>
          </div>
          <div class="hu-bill-total">
            <span>Total</span>
            <span>₹900</span>
          </div>
          <div style="background:var(--br); color:#fff; text-align:center; padding:10px; border-radius:8px; margin-top:16px; font-weight:700; font-size:13px;">Pay & Print</div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 1: ECOSYSTEM --}}
<section class="alt">
  <div class="w">
    <div class="hd">
      <div class="eb">Built For Sweet Shops</div>
      <h2>Everything Your Sweet Shop Needs.</h2>
      <p>Keep your products, customer orders, billing and stock organized from one connected platform.</p>
    </div>

    <div class="eco-grid">
      <div class="eco-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg></div>
        <h3>1. Sweet & Product Management</h3>
        <p>Organize sweets, savouries, snacks and beverages in one place.</p>
      </div>
      <div class="eco-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/></svg></div>
        <h3>2. Digital Menu / Catalogue</h3>
        <p>Showcase your complete product collection with clear pricing and availability.</p>
      </div>
      <div class="eco-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/></svg></div>
        <h3>3. Order Management</h3>
        <p>Keep customer orders organized from placement to handover.</p>
      </div>
      <div class="eco-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/></svg></div>
        <h3>4. Counter POS</h3>
        <p>Create bills quickly during busy shop hours.</p>
      </div>
      <div class="eco-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="4" width="22" height="16" rx="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg></div>
        <h3>5. Billing & Payments</h3>
        <p>Process everyday transactions through one connected workflow.</p>
      </div>
      <div class="eco-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></div>
        <h3>6. Customer Management</h3>
        <p>Keep customer and order information organized.</p>
      </div>
      <div class="eco-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg></div>
        <h3>7. Inventory Management</h3>
        <p>Track ingredients, packaging and important stock levels.</p>
      </div>
      <div class="eco-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2M9 5a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2M9 5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2"/></svg></div>
        <h3>8. Purchase Tracking</h3>
        <p>Maintain visibility into incoming stock and purchase activity.</p>
      </div>
      <div class="eco-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></div>
        <h3>9. Reports</h3>
        <p>Understand sales, product performance and shop activity.</p>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 2: CATALOGUE --}}
<section>
  <div class="w cat-sec-grid">
    <div>
      <div class="eb">Product Catalogue</div>
      <h2>Every Sweet Deserves to Be Seen.</h2>
      <p>Create an attractive digital catalogue for your complete collection of sweets, savouries and snacks.</p>
      
      <div style="margin-top:24px; display:flex; gap:8px; flex-wrap:wrap;">
        <span class="badge" style="background:var(--bg2); color:var(--mute); border:1px solid var(--line);">Milk Sweets</span>
        <span class="badge" style="background:var(--bg2); color:var(--mute); border:1px solid var(--line);">Bengali Sweets</span>
        <span class="badge" style="background:var(--bg2); color:var(--mute); border:1px solid var(--line);">Dry Fruit Sweets</span>
        <span class="badge" style="background:var(--bg2); color:var(--mute); border:1px solid var(--line);">Halwa & Laddoo</span>
        <span class="badge" style="background:var(--bg2); color:var(--mute); border:1px solid var(--line);">Savouries</span>
        <span class="badge" style="background:var(--bg2); color:var(--mute); border:1px solid var(--line);">Cakes & Desserts</span>
      </div>
    </div>

    <div class="win" style="padding:24px;">
      <div class="prod-list">
        <div class="pc-card">
          <img class="pc-img" src="https://images.unsplash.com/photo-1625902127814-ff476e33db0c?w=150&q=80" alt="Kaju Katli">
          <div class="pc-ctx">
            <h4>Kaju Katli</h4>
            <span style="font-weight: 500; color:var(--br);">₹1,120</span>
            <div class="wt">per kg</div>
          </div>
        </div>
        <div class="pc-card">
          <img class="pc-img" src="https://images.unsplash.com/photo-1595209386221-5079a40dd798?w=150&q=80" alt="Mysore Pak">
          <div class="pc-ctx">
            <h4>Mysore Pak</h4>
            <span style="font-weight: 500; color:var(--br);">₹880</span>
            <div class="wt">per kg</div>
          </div>
        </div>
        <div class="pc-card">
          <img class="pc-img" src="https://images.unsplash.com/photo-1605197136015-776263f350da?w=150&q=80" alt="Gulab Jamun">
          <div class="pc-ctx">
            <h4>Gulab Jamun</h4>
            <span style="font-weight: 500; color:var(--br);">₹250</span>
            <div class="wt">10 pcs</div>
          </div>
        </div>
        <div class="pc-card">
          <img class="pc-img" src="https://images.unsplash.com/photo-1601050690597-df0568f70950?w=150&q=80" alt="Mixture">
          <div class="pc-ctx">
            <h4>Madras Mixture</h4>
            <span style="font-weight: 500; color:var(--br);">₹360</span>
            <div class="wt">per kg</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 3: WEIGHT --}}
<section class="alt">
  <div class="w">
    <div class="hd">
      <div class="eb">Flexible Selling</div>
      <h2>Make Every Sweet Order Easy to Manage.</h2>
      <p>Handle different selling formats through a clear and flexible billing workflow.</p>
    </div>

    <div class="wt-grid">
      <div class="wt-card">
        <div class="wt-hdr">
          <span>Kaju Katli</span>
          <span style="color:var(--mute); font-size:12px; font-weight:600;">₹1,120 / kg</span>
        </div>
        <div class="wt-opts">
          <div class="wt-opt"><span>250 g</span><strong>₹280</strong></div>
          <div class="wt-opt"><span>500 g</span><strong>₹560</strong></div>
          <div class="wt-opt" style="background:var(--br-light); border-color:var(--line);"><span>1 kg</span><strong>₹1,120</strong></div>
        </div>
      </div>

      <div class="wt-card">
        <div class="wt-hdr">
          <span>Mysore Pak</span>
          <span style="color:var(--mute); font-size:12px; font-weight:600;">₹880 / kg</span>
        </div>
        <div class="wt-opts">
          <div class="wt-opt" style="background:var(--br-light); border-color:var(--line);"><span>250 g</span><strong>₹220</strong></div>
          <div class="wt-opt"><span>500 g</span><strong>₹440</strong></div>
          <div class="wt-opt"><span>1 kg</span><strong>₹880</strong></div>
        </div>
      </div>

      <div class="wt-card">
        <div class="wt-hdr">
          <span>Motichoor Laddoo</span>
          <span style="color:var(--mute); font-size:12px; font-weight:600;">Quantity Based</span>
        </div>
        <div class="wt-opts">
          <div class="wt-opt"><span>4 pcs</span><strong>₹160</strong></div>
          <div class="wt-opt" style="background:var(--br-light); border-color:var(--line);"><span>8 pcs</span><strong>₹320</strong></div>
          <div class="wt-opt"><span>12 pcs (Box)</span><strong>₹480</strong></div>
        </div>
      </div>
    </div>
    <div style="text-align:center; margin-top:20px; font-size:12px; color:var(--mute);">* Illustrative concept. Weight-based configuration depends on implemented features.</div>
  </div>
</section>

{{-- SECTION 4: BILLING --}}
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">Counter Billing</div>
      <h2>Serve More Customers During Peak Hours.</h2>
      <p>Create bills quickly during festivals, weekends and busy shopping hours.</p>
    </div>

    <div class="bill-panel">
      <div class="bp-hdr">New Counter Sale</div>
      <div class="bp-body">
        <div class="bp-item">
          <div>Kaju Katli<span class="bp-item-qty">500 g</span></div>
          <strong style="color:var(--ink);">₹560</strong>
        </div>
        <div class="bp-item">
          <div>Mysore Pak<span class="bp-item-qty">250 g</span></div>
          <strong style="color:var(--ink);">₹220</strong>
        </div>
        <div class="bp-item">
          <div>Special Mixture<span class="bp-item-qty">500 g</span></div>
          <strong style="color:var(--ink);">₹180</strong>
        </div>
        <div class="bp-item">
          <div>Badam Milk<span class="bp-item-qty">2 × ₹90</span></div>
          <strong style="color:var(--ink);">₹180</strong>
        </div>
        
        <div class="bp-total">
          <span>TOTAL:</span>
          <span>₹1,140</span>
        </div>

        <div class="bp-actions">
          <button class="bp-btn">Weight / Qty</button>
          <button class="bp-btn">Discount</button>
          <button class="bp-btn">Customer</button>
          <button class="bp-btn" style="grid-column: 1 / span 3; margin-top:8px;" class="p">Complete Sale</button>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 5 & 6: ORDER & FESTIVALS --}}
<section class="alt">
  <div class="w two-col-flow">
    {{-- Order Management --}}
    <div>
      <div class="eb">Order Management</div>
      <h3 style="font-size:28px; margin-bottom:12px;">From Counter Order to Customer Handover.</h3>
      <p style="margin-bottom:24px;">Keep every customer order organized from selection to final handover.</p>
      
      <div class="order-ticket">
        <div class="ot-hdr">
          <span style="font-weight: 500; font-size:16px;">ORDER #2084</span>
          <span class="badge ready">Ready</span>
        </div>
        <div style="font-size:13px; margin-bottom:16px;">
          <strong>Customer:</strong> Priya
        </div>
        <ul style="font-size:14px; margin-bottom:16px;">
          <li style="display:flex; justify-content:space-between; margin-bottom:6px;"><span>Kaju Katli</span> <strong>500 g</strong></li>
          <li style="display:flex; justify-content:space-between; margin-bottom:6px;"><span>Mysore Pak</span> <strong>250 g</strong></li>
          <li style="display:flex; justify-content:space-between; margin-bottom:6px;"><span>Mixture</span> <strong>500 g</strong></li>
          <li style="display:flex; justify-content:space-between; margin-bottom:6px;"><span>Badam Milk</span> <strong>× 2</strong></li>
        </ul>
        
        <div class="ot-flow">
          <div class="ot-step done">Order</div>
          <div class="ot-step done">Pack</div>
          <div class="ot-step done">Bill</div>
          <div class="ot-step">Handover</div>
        </div>
      </div>
    </div>

    {{-- Festival --}}
    <div>
      <div class="eb">Festival Demand</div>
      <h3 style="font-size:28px; margin-bottom:12px;">Stay Organized When Demand Goes Up.</h3>
      <p style="margin-bottom:24px;">Keep your team prepared during festivals, weekends, weddings and high-demand shopping periods.</p>

      <div class="fest-dash">
        <div class="fd-card">
          <div class="fd-val">28</div>
          <div class="fd-lbl">New Orders</div>
        </div>
        <div class="fd-card">
          <div class="fd-val">16</div>
          <div class="fd-lbl">Preparing</div>
        </div>
        <div class="fd-card">
          <div class="fd-val">22</div>
          <div class="fd-lbl">Ready</div>
        </div>
        <div class="fd-card">
          <div class="fd-val" style="color:var(--green);">184</div>
          <div class="fd-lbl">Completed</div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 7 & 8: AVAILABILITY & INVENTORY --}}
<section>
  <div class="w two-col-flow">
    {{-- Availability --}}
    <div>
      <div class="eb">Product Availability</div>
      <h3 style="font-size:28px; margin-bottom:12px;">Know What Is Available.</h3>
      <p style="margin-bottom:24px;">Keep product availability clear for staff and customers.</p>
      
      <div class="avail-list">
        <div class="avail-item"><span>Kaju Katli</span><span style="color:var(--green);">AVAILABLE</span></div>
        <div class="avail-item"><span>Mysore Pak</span><span style="color:var(--green);">AVAILABLE</span></div>
        <div class="avail-item"><span>Gulab Jamun</span><span style="color:var(--green);">AVAILABLE</span></div>
        <div class="avail-item" style="background:#fef2f2;"><span>Rasmalai</span><span style="color:var(--red);">SOLD OUT</span></div>
        <div class="avail-item"><span>Jangiri</span><span style="color:var(--green);">AVAILABLE</span></div>
        <div class="avail-item"><span>Badam Halwa</span><span style="color:var(--green);">AVAILABLE</span></div>
      </div>
    </div>

    {{-- Inventory --}}
    <div>
      <div class="eb">Inventory Management</div>
      <h3 style="font-size:28px; margin-bottom:12px;">Know Your Ingredients. Know Your Stock.</h3>
      <p style="margin-bottom:24px;">Track important raw materials and packaging supplies so your shop stays prepared.</p>

      <div class="inv-grid" style="grid-template-columns: repeat(2, 1fr);">
        <div class="inv-card">
          <div class="inv-hdr"><span>Milk</span></div>
          <div class="inv-val">80 L</div>
        </div>
        <div class="inv-card">
          <div class="inv-hdr"><span>Sugar</span></div>
          <div class="inv-val">50 kg</div>
        </div>
        <div class="inv-card">
          <div class="inv-hdr"><span>Cashew</span></div>
          <div class="inv-val">20 kg</div>
        </div>
        <div class="inv-card">
          <div class="inv-hdr"><span>Ghee</span></div>
          <div class="inv-val">25 L</div>
        </div>
        <div class="inv-card">
          <div class="inv-hdr"><span>Sweet Boxes</span></div>
          <div class="inv-val">500 pcs</div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 9 & 10: PURCHASE & CUSTOMER --}}
<section class="alt">
  <div class="w two-col-flow">
    {{-- Purchase --}}
    <div>
      <div class="eb">Purchase Tracking</div>
      <h3 style="font-size:28px; margin-bottom:12px;">Stay Ready for Tomorrow's Production.</h3>
      <p style="margin-bottom:24px;">Maintain visibility into incoming stock and purchase activity.</p>
      
      <div class="po-card">
        <div style="display:flex; justify-content:space-between; margin-bottom:16px;">
          <div>
            <strong style="display:block;">Supplier: Raj Foods</strong>
            <span style="font-size:12px; color:var(--mute);">PO-1048</span>
          </div>
          <span class="badge ready">Received</span>
        </div>
        <div style="font-size:14px; font-weight:700; margin-bottom:8px;">Items:</div>
        <ul style="font-size:13px; color:var(--mute); margin-bottom:16px;">
          <li style="display:flex; justify-content:space-between; margin-bottom:4px;"><span>Sugar</span> <strong>50 kg</strong></li>
          <li style="display:flex; justify-content:space-between; margin-bottom:4px;"><span>Cashew</span> <strong>20 kg</strong></li>
          <li style="display:flex; justify-content:space-between; margin-bottom:4px;"><span>Ghee</span> <strong>25 L</strong></li>
        </ul>
      </div>
    </div>

    {{-- Customer --}}
    <div>
      <div class="eb">Customer Management</div>
      <h3 style="font-size:28px; margin-bottom:12px;">Keep Every Customer Interaction Organized.</h3>
      <p style="margin-bottom:24px;">Track orders and preferences for your most loyal sweet buyers.</p>

      <div class="cust-card">
        <div style="display:flex; justify-content:space-between; border-bottom:1px solid var(--line); padding-bottom:12px; margin-bottom:12px;">
          <div>
            <span style="font-size:11px; font-weight: 500; color:var(--mute);">CUSTOMER</span>
            <strong style="display:block; font-size:18px;">Priya Kumar</strong>
          </div>
          <div style="text-align:right;">
            <span style="font-size:11px; font-weight: 500; color:var(--mute);">TOTAL ORDERS</span>
            <strong style="display:block; font-size:18px; color:var(--br);">12</strong>
          </div>
        </div>
        <div style="font-size:13px; font-weight:700; margin-bottom:8px;">Recent Order:</div>
        <ul style="font-size:13px; color:var(--mute);">
          <li style="display:flex; justify-content:space-between; margin-bottom:4px;"><span>Kaju Katli</span> <strong>500 g</strong></li>
          <li style="display:flex; justify-content:space-between; margin-bottom:4px;"><span>Mysore Pak</span> <strong>1 kg</strong></li>
          <li style="display:flex; justify-content:space-between; margin-bottom:4px;"><span>Mixture</span> <strong>500 g</strong></li>
        </ul>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 11: REPORTS --}}
<section style="background: var(--dark); color: #fff; padding: 100px 0;">
  <div class="w">
    <div class="hd">
      <div class="eb" style="background:rgba(255,255,255,0.1); color:#fff; border-color:rgba(255,255,255,0.2);">Business Reports</div>
      <h2 style="color:#fff;">Know What Sells.</h2>
      <p style="color:rgba(255,255,255,0.7);">Understand which sweets, savouries and categories are driving your shop's sales.</p>
    </div>

    <div class="reports-preview">
      <div class="rp-stats">
        <div class="rp-stat-card">
          <div class="rp-lbl">DAILY SALES</div>
          <div class="rp-val">₹82,400</div>
        </div>
        <div class="rp-stat-card">
          <div class="rp-lbl">TOTAL ORDERS</div>
          <div class="rp-val">248</div>
        </div>
        <div class="rp-stat-card">
          <div class="rp-lbl">TOP ITEM</div>
          <div class="rp-val">Kaju Katli</div>
        </div>
        <div class="rp-stat-card">
          <div class="rp-lbl">PEAK HOURS</div>
          <div class="rp-val">5PM - 8PM</div>
        </div>
      </div>
      <div style="height:140px; display:flex; align-items:flex-end; gap:16px; border-bottom:1px solid rgba(255,255,255,0.2);">
        <div style="flex:1; background:var(--br); height:80%; border-radius:4px 4px 0 0; position:relative;"><span style="position:absolute; bottom:-24px; left:0; right:0; text-align:center; font-size:10px; color:rgba(255,255,255,0.6);">Traditional</span></div>
        <div style="flex:1; background:var(--br); height:100%; border-radius:4px 4px 0 0; position:relative;"><span style="position:absolute; bottom:-24px; left:0; right:0; text-align:center; font-size:10px; color:rgba(255,255,255,0.6);">Milk Sweets</span></div>
        <div style="flex:1; background:var(--br); height:60%; border-radius:4px 4px 0 0; position:relative;"><span style="position:absolute; bottom:-24px; left:0; right:0; text-align:center; font-size:10px; color:rgba(255,255,255,0.6);">Dry Fruits</span></div>
        <div style="flex:1; background:var(--br); height:90%; border-radius:4px 4px 0 0; position:relative;"><span style="position:absolute; bottom:-24px; left:0; right:0; text-align:center; font-size:10px; color:rgba(255,255,255,0.6);">Laddoo</span></div>
        <div style="flex:1; background:var(--br); height:45%; border-radius:4px 4px 0 0; position:relative;"><span style="position:absolute; bottom:-24px; left:0; right:0; text-align:center; font-size:10px; color:rgba(255,255,255,0.6);">Halwa</span></div>
        <div style="flex:1; background:var(--br); height:75%; border-radius:4px 4px 0 0; position:relative;"><span style="position:absolute; bottom:-24px; left:0; right:0; text-align:center; font-size:10px; color:rgba(255,255,255,0.6);">Savouries</span></div>
        <div style="flex:1; background:var(--br); height:30%; border-radius:4px 4px 0 0; position:relative;"><span style="position:absolute; bottom:-24px; left:0; right:0; text-align:center; font-size:10px; color:rgba(255,255,255,0.6);">Beverages</span></div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 12: WORKFLOW --}}
<section>
  <div class="w">
    <div class="hd">
      <h2>From Product to Payment. Everything Connected.</h2>
      <p>Connect your sweet shop's products, orders, billing, inventory and business data through one platform.</p>
    </div>

    <div class="workflow-scroll">
      <div class="connected-flow">
        <div class="cf-node"><div class="cf-icon"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/></svg></div><div style="font-size:11px; font-weight:700;">Product<br>Catalogue</div></div>
        <div class="cf-arrow">→</div>
        <div class="cf-node"><div class="cf-icon"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></div><div style="font-size:11px; font-weight:700;">Customer<br>Selection</div></div>
        <div class="cf-arrow">→</div>
        <div class="cf-node"><div class="cf-icon"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/></svg></div><div style="font-size:11px; font-weight:700;">Weight /<br>Quantity</div></div>
        <div class="cf-arrow">→</div>
        <div class="cf-node"><div class="cf-icon"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg></div><div style="font-size:11px; font-weight:700;">Packing &<br>Order</div></div>
        <div class="cf-arrow">→</div>
        <div class="cf-node"><div class="cf-icon"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/></svg></div><div style="font-size:11px; font-weight:700;">Counter<br>Billing</div></div>
        <div class="cf-arrow">→</div>
        <div class="cf-node"><div class="cf-icon"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="4" width="22" height="16" rx="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg></div><div style="font-size:11px; font-weight:700;">Payment &<br>Handover</div></div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 13: BENEFITS --}}
<section class="alt">
  <div class="w">
    <div class="hd">
      <h2>Built for the Way Sweet Shops Sell.</h2>
    </div>

    <div class="benefits-grid">
      <div class="b-card">
        <h3 style="margin-bottom:8px;">1. Organized Product Catalogue</h3>
        <p>Keep sweets, savouries and beverages easy to manage.</p>
      </div>
      <div class="b-card">
        <h3 style="margin-bottom:8px;">2. Flexible Selling</h3>
        <p>Manage products by quantity or weight where supported.</p>
      </div>
      <div class="b-card">
        <h3 style="margin-bottom:8px;">3. Faster Billing</h3>
        <p>Speed up counter transactions during busy periods.</p>
      </div>
      <div class="b-card">
        <h3 style="margin-bottom:8px;">4. Inventory Visibility</h3>
        <p>Keep track of ingredients and packaging materials.</p>
      </div>
      <div class="b-card">
        <h3 style="margin-bottom:8px;">5. Customer Management</h3>
        <p>Keep customer and order information organized.</p>
      </div>
      <div class="b-card">
        <h3 style="margin-bottom:8px;">6. Business Insights</h3>
        <p>Understand sales, products and customer activity.</p>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 14: IDEAL FOR --}}
<section>
  <div class="w">
    <div class="hd">
      <h2>Designed for Different Sweet Businesses.</h2>
    </div>

    <div class="industry-grid">
      <div class="ind-card"><span>Traditional Sweet Shops</span></div>
      <div class="ind-card"><span>Modern Mithai Stores</span></div>
      <div class="ind-card"><span>Bengali Sweet Shops</span></div>
      <div class="ind-card"><span>South Indian Sweet Shops</span></div>
      <div class="ind-card"><span>Dry Fruit Stores</span></div>
      <div class="ind-card"><span>Sweet & Savoury Stores</span></div>
      <div class="ind-card"><span>Bakery & Sweet Shops</span></div>
      <div class="ind-card"><span>Multi-Branch Chains</span></div>
    </div>
  </div>
</section>

{{-- SECTION 15 & 16: CUST EXP & MOBILE --}}
<section class="alt">
  <div class="w two-col-flow">
    <div>
      <div class="eb">Customer Experience</div>
      <h3 style="font-size:28px; margin-bottom:12px;">Make Every Sweet Purchase Simple.</h3>
      <p style="margin-bottom:24px;">Browse Categories → View Sweet → Select Quantity / Weight → Review Order → Payment → Handover.</p>
      <div class="mob-preview">
        <div class="mob-inner" style="background:#fdfaf6; padding:0;">
          <img src="https://images.unsplash.com/photo-1625902127814-ff476e33db0c?w=400&q=80" alt="Kaju Katli" style="width:100%; height:200px; object-fit:cover;">
          <div style="padding:16px;">
            <h4 style="font-size:18px;">Premium Kaju Katli</h4>
            <p style="font-size:13px; margin:4px 0 16px;">Rich cashew sweet made with pure ghee.</p>
            <div style="border:1px solid var(--line); border-radius:12px; padding:12px; margin-bottom:12px; display:flex; justify-content:space-between; align-items:center;">
              <span style="font-weight:700;">500 g</span>
              <span style="color:var(--br); font-weight: 500;">₹560</span>
            </div>
            <button style="width:100%; padding:14px; border-radius:12px; background:var(--br); color:#fff; font-weight: 500; border:none;">Add to Order</button>
          </div>
        </div>
      </div>
    </div>

    <div>
      <div class="eb">Mobile Management</div>
      <h3 style="font-size:28px; margin-bottom:12px;">Your Sweet Shop. Within Reach.</h3>
      <p style="margin-bottom:24px;">Stay connected to your shop operations even when you are away from the counter.</p>
      <div class="mob-preview">
        <div class="mob-inner">
          <div style="font-weight: 500; font-size:16px; margin-bottom:16px;">Shop Dashboard</div>
          <div style="background:var(--bg2); border:1px solid var(--line); padding:12px; border-radius:12px; margin-bottom:12px;">
            <div style="font-size:11px; font-weight:700; color:var(--mute);">TODAY'S SALES</div>
            <div style="font-size:20px; font-weight: 500; color:var(--br);">₹82,400</div>
          </div>
          <div style="background:var(--bg2); border:1px solid var(--line); padding:12px; border-radius:12px; margin-bottom:12px;">
            <div style="font-size:11px; font-weight:700; color:var(--mute);">ACTIVE ORDERS</div>
            <div style="font-size:20px; font-weight: 500; color:var(--ink);">16</div>
          </div>
          <div style="font-weight:700; font-size:13px; margin:16px 0 8px;">Low Stock Alerts</div>
          <div style="font-size:13px; padding:8px; border-bottom:1px solid var(--line); display:flex; justify-content:space-between;"><span>Diet Soda</span><span style="color:var(--red);">48 units</span></div>
          <div style="font-size:13px; padding:8px; display:flex; justify-content:space-between;"><span>Sweet Boxes</span><span style="color:var(--mute);">500 pcs</span></div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 17: SHOWCASE --}}
<section>
  <div class="w">
    <div class="hd">
      <h2>Built for Sweet Businesses of Every Size.</h2>
    </div>
    <div class="showcase-grid">
      <div class="showcase-card"><img src="https://images.unsplash.com/photo-1579541591782-b062973752e5?w=400&q=80" alt="Traditional"><div>Traditional Mithai</div></div>
      <div class="showcase-card"><img src="https://images.unsplash.com/photo-1627914856403-d64e9a667104?w=400&q=80" alt="Modern"><div>Modern Sweet Brand</div></div>
      <div class="showcase-card"><img src="https://images.unsplash.com/photo-1528659135069-b3a1a4597bd3?w=400&q=80" alt="Dry Fruits"><div>Premium Dry Fruits</div></div>
      <div class="showcase-card"><img src="https://images.unsplash.com/photo-1509365465994-3e54bc853ebc?w=400&q=80" alt="Bakery"><div>Bakery & Desserts</div></div>
    </div>
  </div>
</section>

{{-- SECTION 18: FAQ --}}
<section class="alt">
  <div class="w">
    <div class="hd">
      <h2>Frequently Asked Questions</h2>
    </div>

    <div class="faq-list">
      <details class="faq-item">
        <summary>Is Geni Menu suitable for sweet shops? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></summary>
        <p>Yes, Geni Menu provides tools to manage product catalogues, busy counter billing, orders, and inventory suited for sweet shops.</p>
      </details>
      <details class="faq-item">
        <summary>Can I manage sweets and savouries in one catalogue? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></summary>
        <p>Absolutely. You can create multiple categories to cleanly separate milk sweets, dry fruits, savouries, and beverages.</p>
      </details>
      <details class="faq-item">
        <summary>Can I manage products by weight or quantity? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></summary>
        <p>Yes, where configured, you can set pricing based on gramage (e.g., 250g, 500g, 1kg) or individual pieces.</p>
      </details>
      <details class="faq-item">
        <summary>Can I create bills quickly at the counter? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></summary>
        <p>Yes, our POS is designed for fast, multi-item billing essential during festivals and peak hours.</p>
      </details>
      <details class="faq-item">
        <summary>Can I track inventory and packaging? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></summary>
        <p>Yes, you can track raw ingredients and packaging materials to ensure you're always stocked up.</p>
      </details>
      <details class="faq-item">
        <summary>Is Geni Menu suitable for multi-branch sweet shops? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></summary>
        <p>Yes, you can manage and view reports for multiple shop locations from a centralized dashboard.</p>
      </details>
    </div>
  </div>
</section>

{{-- FINAL CTA --}}
<section class="cta-sec">
  <div class="w cta-box">
    <h2>Ready to Run Your Sweet Shop Smarter?</h2>
    <p>Manage your products, orders, billing, customers, inventory and reports from one connected platform with Geni Menu.</p>
    <div style="display:flex; gap:16px; justify-content:center; flex-wrap:wrap;">
      <a href="{{ route('contact.us') }}" class="btn p">Get Started →</a>
      <a href="{{ route('contact.us') }}" class="btn o">Book a Demo →</a>
    </div>
  </div>
</section>

@endsection
