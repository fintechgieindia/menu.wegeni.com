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
.badge.received { background: #d1fae5; color: #047857; }
.badge.low { background: #fee2e2; color: #b91c1c; }

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
.hero-ui-grid { padding: 20px; display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px; }

.hu-stat { padding: 16px; border-radius: 12px; border: 1px solid var(--line); background: var(--bg2); }
.hu-stat-lbl { font-size: 11px; font-weight: 500; color: var(--mute); text-transform: uppercase; margin-bottom: 4px; }
.hu-stat-val { font-size: 24px; font-weight: 500; color: var(--ink); }
.hu-stat-val.sm { font-size: 16px; font-weight: 500; }

/* ---------------- SECTION 4: FEATURES ---------------- */
.eco-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }
.eco-card { padding: 28px; background: #fff; border: 1px solid var(--line); border-radius: 20px; transition: .3s; }
.eco-card:hover { transform: translateY(-4px); border-color: var(--br); box-shadow: var(--shadow-md); }
.eco-card h3 { margin: 18px 0 8px; font-size: 18px; }
.eco-card p { font-size: 14px; color: var(--mute); }
.ic { width: 48px; height: 48px; border-radius: 13px; background: var(--bg2); color: var(--br); display: grid; place-items: center; border: 1px solid var(--line); transition: .3s ease; }
.eco-card:hover .ic { background: var(--br); color: #fff; border-color: var(--br); }

/* ---------------- SECTION 5: CATALOGUE TABS ---------------- */
.menu-tabs { display: flex; gap: 12px; margin-bottom: 32px; flex-wrap: wrap; justify-content: center; }
.menu-tab { padding: 10px 24px; border-radius: 99px; font-weight: 700; font-size: 15px; cursor: pointer; border: 1px solid var(--line); background: #fff; color: var(--mute); transition: .2s; }
.menu-tab.act { background: var(--br); color: #fff; border-color: var(--br); }
.menu-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 24px; }
.pc-card { display: flex; align-items: center; gap: 16px; padding: 16px; border: 1px solid var(--line); border-radius: 16px; background: #fff; transition: .2s; }
.pc-card:hover { border-color: var(--br); box-shadow: var(--shadow-sm); }
.pc-img { width: 80px; height: 80px; border-radius: 12px; object-fit: cover; }
.pc-ctx { flex: 1; }
.pc-ctx h4 { font-size: 16px; margin-bottom: 4px; }
.pc-ctx p { font-size: 13px; color: var(--mute); margin-bottom: 8px; line-height: 1.4; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
.pc-ft { display: flex; justify-content: space-between; align-items: center; }

/* ---------------- SECTION 6 & 7: VARIATIONS & BILLING ---------------- */
.two-col-flow { display: grid; grid-template-columns: 1fr 1fr; gap: 48px; align-items: start; }
.var-panel { background: #fff; border: 1px solid var(--line); border-radius: 16px; overflow: hidden; margin-bottom: 24px; }
.var-row { display: flex; justify-content: space-between; padding: 16px; border-bottom: 1px solid var(--line); font-size: 14px; }
.var-row:last-child { border-bottom: none; }
.var-row.h { background: var(--bg2); font-weight: 500; font-size: 12px; color: var(--mute); text-transform: uppercase; }

.bill-panel { background: #fff; border: 1px solid var(--line); border-radius: 20px; box-shadow: var(--shadow-md); overflow: hidden; }
.bp-hdr { padding: 16px 20px; background: var(--bg2); border-bottom: 1px solid var(--line); font-weight: 500; font-size: 15px; }
.bp-body { padding: 20px; }
.bp-item { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 16px; font-size: 14px; }
.bp-item-qty { font-size: 12px; color: var(--mute); display: block; }
.bp-total { display: flex; justify-content: space-between; padding: 16px 0; border-top: 2px dashed var(--line); margin-top: 8px; font-weight: 500; font-size: 20px; color: var(--br); }
.bp-actions { display: grid; grid-template-columns: repeat(2, 1fr); gap: 8px; margin-top: 16px; }
.bp-btn { padding: 12px; border-radius: 8px; border: 1px solid var(--line); background: #fff; font-weight: 700; font-size: 13px; cursor: pointer; }
.bp-btn.p { background: var(--br); color: #fff; border-color: var(--br); }

/* ---------------- SECTION 8 & 9: ORDERS & RUSH ---------------- */
.order-ticket { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 20px; position: relative; }
.ot-hdr { display: flex; justify-content: space-between; margin-bottom: 16px; border-bottom: 1px solid var(--line); padding-bottom: 12px; }
.ot-flow { display: flex; gap: 8px; margin-top: 16px; }
.ot-step { flex: 1; text-align: center; font-size: 10px; font-weight: 500; text-transform: uppercase; padding: 8px 4px; border-radius: 6px; background: var(--bg2); color: var(--mute); border: 1px solid var(--line); display: flex; flex-direction: column; align-items: center; gap: 4px; }
.ot-step svg { width: 14px; height: 14px; }
.ot-step.done { background: var(--br-light); color: var(--br); border-color: var(--br); }

.fest-dash { display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px; margin-bottom: 16px; }
.fd-card { padding: 20px; background: #fff; border: 1px solid var(--line); border-radius: 16px; text-align: center; }
.fd-val { font-size: 32px; font-weight: 500; color: var(--br); line-height: 1.2; }
.fd-lbl { font-size: 12px; font-weight: 700; color: var(--mute); text-transform: uppercase; }

.occ-tags { display: flex; gap: 8px; flex-wrap: wrap; }
.occ-tag { padding: 6px 12px; border-radius: 8px; background: var(--bg2); border: 1px solid var(--line); font-size: 12px; font-weight: 700; color: var(--mute); }

/* ---------------- SECTION 10 & 11: AVAILABILITY & INVENTORY ---------------- */
.avail-list { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 12px; }
.avail-item { display: flex; justify-content: space-between; padding: 12px 16px; border-bottom: 1px solid var(--bg2); font-weight: 600; font-size: 14px; }
.avail-item:last-child { border: none; }

.inv-table { width: 100%; border-collapse: collapse; background: #fff; border-radius: 16px; overflow: hidden; border: 1px solid var(--line); }
.inv-table th { background: var(--bg2); padding: 12px 16px; text-align: left; font-size: 12px; font-weight: 500; color: var(--mute); text-transform: uppercase; border-bottom: 1px solid var(--line); }
.inv-table td { padding: 12px 16px; font-size: 14px; border-bottom: 1px solid var(--bg2); }
.inv-table tr:last-child td { border-bottom: none; }

/* ---------------- SECTION 12 & 13: SEASONAL & CUSTOMER ---------------- */
.cust-card { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 20px; }

/* ---------------- SECTION 14: REPORTS ---------------- */
.reports-preview { background: var(--dark); color: #fff; border-radius: 24px; padding: 36px; box-shadow: var(--shadow-lg); }
.rp-stats { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; margin-bottom: 32px; }
.rp-stat-card { background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 14px; padding: 16px; }
.rp-val { font-size: 24px; font-weight: 500; color: #fff; }
.rp-lbl { font-size: 12px; font-weight: 700; color: rgba(255,255,255,0.6); }

/* ---------------- SECTION 15: WORKFLOW ---------------- */
.workflow-scroll { overflow-x: auto; padding-bottom: 20px; }
.connected-flow { display: flex; justify-content: space-between; align-items: center; min-width: 800px; gap: 10px; background: #fff; padding: 32px; border-radius: 24px; border: 1px solid var(--line); }
.cf-node { text-align: center; width: 75px; }
.cf-icon { width: 48px; height: 48px; border-radius: 14px; background: var(--bg2); color: var(--br); border: 1px solid var(--line); display: grid; place-items: center; margin: 0 auto 10px; }
.cf-arrow { color: var(--mute); opacity: 0.4; }

/* ---------------- SECTION 16: FOUR BUSINESS TYPES ---------------- */
.four-biz-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 24px; }
.biz-card { background: #fff; border: 1px solid var(--line); border-radius: 20px; overflow: hidden; transition: .3s; }
.biz-card:hover { border-color: var(--br); box-shadow: var(--shadow-md); transform: translateY(-4px); }
.biz-img { width: 100%; height: 200px; object-fit: cover; background: var(--bg2); }
.biz-ctx { padding: 24px; }
.biz-ctx h3 { font-size: 20px; margin-bottom: 12px; display: flex; align-items: center; gap: 8px; }
.biz-ctx ul { list-style: none; padding: 0; margin: 0; display: flex; flex-wrap: wrap; gap: 8px; }
.biz-ctx li { font-size: 13px; font-weight: 600; color: var(--mute); background: var(--bg2); padding: 4px 12px; border-radius: 8px; border: 1px solid var(--line); }

/* ---------------- SECTION 17: BENEFITS ---------------- */
.benefits-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; }
.b-card { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 24px; }

/* ---------------- SECTION 18 & 19: CUST EXP & MOBILE ---------------- */
.mob-preview { max-width: 300px; margin: 0 auto; background: #000; border: 4px solid #333; border-radius: 36px; padding: 10px; box-shadow: var(--shadow-lg); }
.mob-inner { background: #fff; border-radius: 26px; height: 500px; overflow: hidden; padding: 16px; position: relative; }

/* ---------------- SECTION 20: IDEAL FOR ---------------- */
.industry-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; }
.ind-card { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 16px; display: flex; align-items: center; gap: 12px; font-weight: 700; font-size: 14px; }

/* ---------------- SECTION 21: MULTI BRANCH ---------------- */
.mb-panel { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 24px; }
.mb-row { display: flex; justify-content: space-between; padding: 12px 0; border-bottom: 1px solid var(--line); }
.mb-row:last-child { border-bottom: none; }
.mb-val { font-weight: 500; color: var(--br); }

/* ---------------- SECTION 22: CONNECTED ---------------- */
.conn-grid { display: grid; grid-template-columns: repeat(7, 1fr); gap: 12px; text-align: center; }
.conn-card { background: #fff; border: 1px solid var(--line); border-radius: 12px; padding: 16px 8px; font-size: 11px; font-weight: 700; }
.conn-card svg { margin-bottom: 8px; color: var(--br); }

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
  .hero-grid, .two-col-flow { grid-template-columns: 1fr; gap: 36px; }
  .eco-grid, .fest-dash, .benefits-grid, .four-biz-grid { grid-template-columns: repeat(2, 1fr); }
  .industry-grid, .rp-stats { grid-template-columns: repeat(2, 1fr); }
  .conn-grid { grid-template-columns: repeat(3, 1fr); }
}

@media (max-width: 768px) {
  .bc { padding: 14px 0 14px; }
  .w { padding: 0 16px; }
  .win { min-width: 0 !important; width: 100%; overflow-x: auto; }
}

@media (max-width: 640px) {
  .eco-grid, .benefits-grid, .industry-grid, .rp-stats, .four-biz-grid { grid-template-columns: 1fr; }
  .menu-grid { grid-template-columns: 1fr; }
  .bp-actions { grid-template-columns: 1fr; }
  .conn-grid { grid-template-columns: 1fr; }
  .inv-table { display: block; overflow-x: auto; white-space: nowrap; }
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
    <span class="cur">Juice & Snack Shops</span>
  </div>
</div>

{{-- HERO --}}
<section class="hero">
  <div class="w hero-grid">
    <div class="hero-ctx">
      <div class="eb">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
        JUICE & SNACK SHOP SOLUTION
      </div>
      <h1>Serve Faster. Sell More. <span class="sf">Keep Every Order Moving.</span></h1>
      <p>Manage your drinks, desserts, snacks, customer orders, billing, inventory and daily shop operations from one connected platform built for juice shops, ice cream parlours, chaat shops and tea shops.</p>
      <div class="hero-btns">
        <a href="{{ route('contact.us') }}" class="btn p">Get Started →</a>
        <a href="{{ route('contact.us') }}" class="btn o">Book a Demo</a>
      </div>
    </div>

    <div class="hero-ui">
      <div class="hero-ui-hdr">
        <div class="hero-ui-hdr-title">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--br)" stroke-width="2.5"><rect x="3" y="3" width="18" height="18" rx="2"/></svg>
          Geni Menu — Shop Dashboard
        </div>
        <span class="badge ready">Live</span>
      </div>
      <div class="hero-ui-grid">
        <div class="hu-stat">
          <div class="hu-stat-lbl">Today's Sales</div>
          <div class="hu-stat-val">₹24,850</div>
        </div>
        <div class="hu-stat">
          <div class="hu-stat-lbl">Active Orders</div>
          <div class="hu-stat-val">14</div>
        </div>
        <div class="hu-stat">
          <div class="hu-stat-lbl">Payments</div>
          <div class="hu-stat-val">₹22,400</div>
        </div>
        <div class="hu-stat">
          <div class="hu-stat-lbl">Best Seller</div>
          <div class="hu-stat-val sm">Mango Juice</div>
        </div>
        <div class="hu-stat">
          <div class="hu-stat-lbl">Low Stock</div>
          <div class="hu-stat-val sm" style="color:var(--red);">Sugar, Milk</div>
        </div>
        <div class="hu-stat">
          <div class="hu-stat-lbl">Product Status</div>
          <div class="hu-stat-val sm" style="font-size:14px;">2 Items Sold Out</div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 4: FEATURES --}}
<section class="alt">
  <div class="w">
    <div class="hd">
      <div class="eb">Built For Fast-Moving Shops</div>
      <h2>Everything Your Shop Needs. In One Place.</h2>
      <p>From a quick cup of tea to a customised juice, sundae or chaat order, Geni Menu helps you manage products, orders, billing, customers and stock from one connected platform.</p>
    </div>

    <div class="eco-grid">
      <div class="eco-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg></div>
        <h3>1. Product & Menu</h3>
        <p>Organize drinks, desserts, snacks and food items effectively.</p>
      </div>
      <div class="eco-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/></svg></div>
        <h3>2. Digital Menu</h3>
        <p>Present products with images, descriptions, pricing and availability.</p>
      </div>
      <div class="eco-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/></svg></div>
        <h3>3. Order Management</h3>
        <p>Keep active and completed orders organized for faster service.</p>
      </div>
      <div class="eco-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/></svg></div>
        <h3>4. POS & Billing</h3>
        <p>Process everyday counter transactions efficiently during rush hours.</p>
      </div>
      <div class="eco-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="4" width="22" height="16" rx="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg></div>
        <h3>5. Payments</h3>
        <p>Keep payment activity connected to individual transactions.</p>
      </div>
      <div class="eco-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></div>
        <h3>6. Customer Management</h3>
        <p>Maintain customer details and order history for regulars.</p>
      </div>
      <div class="eco-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg></div>
        <h3>7. Inventory Management</h3>
        <p>Track important ingredients like milk, sugar, and supplies.</p>
      </div>
      <div class="eco-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg></div>
        <h3>8. Product Availability</h3>
        <p>Keep available and sold-out products updated in real-time.</p>
      </div>
      <div class="eco-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></div>
        <h3>9. Reports & Multi-Branch</h3>
        <p>Understand sales and manage multiple outlets where supported.</p>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 5: SHOWCASE PRODUCTS --}}
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">Catalogue Display</div>
      <h2>Make Every Product Easy to Discover.</h2>
      <p>Create a clear digital catalogue for your complete food and beverage collection with images, prices, and descriptions.</p>
    </div>

    <div class="menu-tabs">
      <div class="menu-tab act">Juice Shop</div>
      <div class="menu-tab">Ice Cream</div>
      <div class="menu-tab">Chaat</div>
      <div class="menu-tab">Tea & Beverages</div>
    </div>

    <div class="menu-grid">
      <div class="pc-card">
        <img class="pc-img" src="https://images.unsplash.com/photo-1621506289937-a8e4df240d0b?w=200&q=80" alt="Mango Juice">
        <div class="pc-ctx">
          <h4>Fresh Mango Juice</h4>
          <p>Freshly blended seasonal mangoes without added sugar.</p>
          <div class="pc-ft">
            <span style="font-weight: 500; color:var(--br);">₹120</span>
            <span class="badge ready">Available</span>
          </div>
        </div>
      </div>
      <div class="pc-card">
        <img class="pc-img" src="https://images.unsplash.com/photo-1558138838-86aaa0bc8b60?w=200&q=80" alt="Watermelon Juice">
        <div class="pc-ctx">
          <h4>Watermelon Splash</h4>
          <p>Refreshing watermelon juice with a hint of mint.</p>
          <div class="pc-ft">
            <span style="font-weight: 500; color:var(--br);">₹90</span>
            <span class="badge ready">Available</span>
          </div>
        </div>
      </div>
      <div class="pc-card">
        <img class="pc-img" src="https://images.unsplash.com/photo-1572490122747-3968b75cc699?w=200&q=80" alt="Chocolate Milkshake">
        <div class="pc-ctx">
          <h4>Thick Chocolate Shake</h4>
          <p>Rich chocolate ice cream blended with premium cocoa.</p>
          <div class="pc-ft">
            <span style="font-weight: 500; color:var(--br);">₹150</span>
            <span class="badge ready">Available</span>
          </div>
        </div>
      </div>
      <div class="pc-card">
        <img class="pc-img" src="https://images.unsplash.com/photo-1623065422902-30a2d299bbe4?w=200&q=80" alt="Fruit Bowl">
        <div class="pc-ctx">
          <h4>Seasonal Fruit Bowl</h4>
          <p>A healthy mix of fresh cut seasonal fruits.</p>
          <div class="pc-ft">
            <span style="font-weight: 500; color:var(--br);">₹180</span>
            <span class="badge ready">Available</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 6 & 7: VARIATIONS & BILLING --}}
<section class="alt">
  <div class="w two-col-flow">
    {{-- Variations --}}
    <div>
      <div class="eb">Product Variations</div>
      <h3 style="font-size:28px; margin-bottom:12px;">One Product. Multiple Choices.</h3>
      <p style="margin-bottom:24px;">Give customers and staff flexibility to manage different sizes, flavours and add-ons where supported.</p>
      
      <div class="var-panel">
        <div class="var-row h"><span>Mango Milkshake - Size</span><span>Price</span></div>
        <div class="var-row"><span>Regular</span><strong>₹120</strong></div>
        <div class="var-row"><span>Large</span><strong>₹160</strong></div>
        <div class="var-row h" style="border-top:1px solid var(--line);"><span>Add-Ons</span><span>Price</span></div>
        <div class="var-row"><span>Ice Cream Scoop</span><strong>+ ₹40</strong></div>
        <div class="var-row"><span>Dry Fruits</span><strong>+ ₹30</strong></div>
      </div>

      <div class="var-panel" style="margin-bottom:0;">
        <div class="var-row h"><span>Vanilla Ice Cream</span><span>Price</span></div>
        <div class="var-row"><span>Single Scoop</span><strong>₹60</strong></div>
        <div class="var-row"><span>Double Scoop</span><strong>₹100</strong></div>
        <div class="var-row"><span>Triple Scoop</span><strong>₹140</strong></div>
      </div>
      <div style="font-size:11px; color:var(--mute); margin-top:12px; text-align:center;">* Illustrative examples of supported feature configurations.</div>
    </div>

    {{-- Billing --}}
    <div>
      <div class="eb">POS & Billing</div>
      <h3 style="font-size:28px; margin-bottom:12px;">From Order to Payment in Seconds.</h3>
      <p style="margin-bottom:24px;">Process everyday purchases quickly with a simple POS experience designed for busy food and beverage counters.</p>

      <div class="bill-panel">
        <div class="bp-hdr">Counter Sale #842</div>
        <div class="bp-body">
          <div class="bp-item">
            <div>Mango Juice<span class="bp-item-qty">Regular × 2</span></div>
            <strong style="color:var(--ink);">₹240</strong>
          </div>
          <div class="bp-item">
            <div>Samosa Chaat<span class="bp-item-qty">Standard × 1</span></div>
            <strong style="color:var(--ink);">₹80</strong>
          </div>
          <div class="bp-item">
            <div>Vanilla Scoop<span class="bp-item-qty">Double × 1</span></div>
            <strong style="color:var(--ink);">₹100</strong>
          </div>
          <div class="bp-item">
            <div>Masala Tea<span class="bp-item-qty">Standard × 2</span></div>
            <strong style="color:var(--ink);">₹60</strong>
          </div>
          
          <div class="bp-total">
            <span>TOTAL</span>
            <span>₹480</span>
          </div>

          <div class="bp-actions">
            <button class="bp-btn">Hold</button>
            <button class="bp-btn p">Pay & Complete</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 8 & 9: ORDERS & RUSH --}}
<section>
  <div class="w two-col-flow">
    {{-- Order Management --}}
    <div>
      <div class="eb">Order Management</div>
      <h3 style="font-size:28px; margin-bottom:12px;">Every Order. Clear From Start to Finish.</h3>
      <p style="margin-bottom:24px;">Keep your active and completed orders organized for faster service during rush hours.</p>
      
      <div class="order-ticket">
        <div class="ot-hdr">
          <span style="font-weight: 500; font-size:16px;">ORDER #2048</span>
          <span class="badge preparing">Preparing</span>
        </div>
        
        <ul style="font-size:14px; margin-bottom:16px;">
          <li style="display:flex; justify-content:space-between; margin-bottom:6px;"><span>2 × Mango Juice</span></li>
          <li style="display:flex; justify-content:space-between; margin-bottom:6px;"><span>1 × Samosa Chaat</span></li>
          <li style="display:flex; justify-content:space-between; margin-bottom:6px;"><span>1 × Vanilla Sundae</span></li>
        </ul>

        <div style="font-size:13px; margin-bottom:16px; background:var(--bg2); padding:12px; border-radius:8px;">
          <div style="display:flex; justify-content:space-between; margin-bottom:4px;"><span>Customer:</span> <strong>Arun</strong></div>
          <div style="display:flex; justify-content:space-between;"><span>Type:</span> <strong>Takeaway</strong></div>
        </div>
        
        <div class="ot-flow">
          <div class="ot-step done"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/></svg> Order</div>
          <div class="ot-step done"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg> Prepare</div>
          <div class="ot-step"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/></svg> Ready</div>
          <div class="ot-step"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12l5 5l10 -10"/></svg> Serve</div>
        </div>
      </div>
    </div>

    {{-- Rush Hour --}}
    <div>
      <div class="eb">Busy-Hour Rush</div>
      <h3 style="font-size:28px; margin-bottom:12px;">Stay in Control When the Crowd Gets Bigger.</h3>
      <p style="margin-bottom:24px;">Keep your team aware of active orders and what needs attention during busy periods.</p>

      <div class="fest-dash">
        <div class="fd-card">
          <div class="fd-val">24</div>
          <div class="fd-lbl">New Orders</div>
        </div>
        <div class="fd-card">
          <div class="fd-val">11</div>
          <div class="fd-lbl">Preparing</div>
        </div>
        <div class="fd-card">
          <div class="fd-val">7</div>
          <div class="fd-lbl">Ready</div>
        </div>
        <div class="fd-card">
          <div class="fd-val" style="color:var(--green);">86</div>
          <div class="fd-lbl">Completed</div>
        </div>
      </div>
      
      <div class="occ-tags">
        <span class="occ-tag">Morning Tea Rush</span>
        <span class="occ-tag">Lunch Break</span>
        <span class="occ-tag">Evening Snacks</span>
        <span class="occ-tag">After-School</span>
        <span class="occ-tag">Weekend Evenings</span>
        <span class="occ-tag">Summer Demand</span>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 10 & 11: AVAILABILITY & INVENTORY --}}
<section class="alt">
  <div class="w two-col-flow">
    {{-- Availability --}}
    <div>
      <div class="eb">Product Availability</div>
      <h3 style="font-size:28px; margin-bottom:12px;">Show What's Available. Hide What's Sold Out.</h3>
      <p style="margin-bottom:24px;">Keep sold-out items off the customer menu instantly to avoid confusion and rejected orders.</p>
      
      <div class="avail-list">
        <div class="avail-item"><span>Mango Juice</span><span class="badge ready">Available</span></div>
        <div class="avail-item"><span>Fresh Lime Soda</span><span class="badge ready">Available</span></div>
        <div class="avail-item"><span>Chocolate Sundae</span><span class="badge ready">Available</span></div>
        <div class="avail-item" style="background:#fef2f2;"><span>Strawberry Ice Cream</span><span class="badge soldout">Sold Out</span></div>
        <div class="avail-item"><span>Pani Puri</span><span class="badge ready">Available</span></div>
        <div class="avail-item"><span>Masala Tea</span><span class="badge ready">Available</span></div>
      </div>
      <div style="margin-top:16px; font-size:13px; font-weight:700; color:var(--mute); display:flex; align-items:center; gap:8px;">
        Update Product → Availability Changes → Menu Updated
      </div>
    </div>

    {{-- Inventory --}}
    <div>
      <div class="eb">Inventory Management</div>
      <h3 style="font-size:28px; margin-bottom:12px;">Know Your Stock Before You Run Out.</h3>
      <p style="margin-bottom:24px;">Track important ingredients and supplies so your team can maintain visibility into stock levels.</p>

      <table class="inv-table">
        <thead>
          <tr>
            <th>Item</th>
            <th>Stock</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <tr><td>Mangoes</td><td>25 kg</td><td><span class="badge ready">In Stock</span></td></tr>
          <tr><td>Milk</td><td>30 L</td><td><span class="badge ready">In Stock</span></td></tr>
          <tr><td>Sugar</td><td>25 kg</td><td><span class="badge ready">In Stock</span></td></tr>
          <tr><td>Ice Cream Base</td><td>15 L</td><td><span class="badge ready">In Stock</span></td></tr>
          <tr><td>Chaat Masala</td><td>5 kg</td><td><span class="badge low">Low</span></td></tr>
          <tr><td>Paper Cups</td><td>500 pcs</td><td><span class="badge ready">In Stock</span></td></tr>
        </tbody>
      </table>
    </div>
  </div>
</section>

{{-- SECTION 12 & 13: SEASONAL & CUSTOMERS --}}
<section>
  <div class="w two-col-flow">
    {{-- Seasonal --}}
    <div>
      <div class="eb">Seasonal Products</div>
      <h3 style="font-size:28px; margin-bottom:12px;">Keep Your Menu Fresh With Every Season.</h3>
      <p style="margin-bottom:24px;">Update your catalogue easily as seasonal products and specials change throughout the year.</p>
      
      <div style="background:#fff; border:1px solid var(--line); border-radius:16px; overflow:hidden;">
        <div style="display:flex; border-bottom:1px solid var(--line); background:var(--bg2);">
          <div style="padding:12px 16px; font-weight: 500; font-size:14px; border-bottom:2px solid var(--br); color:var(--br);">Summer Specials</div>
          <div style="padding:12px 16px; font-weight:600; font-size:14px; color:var(--mute);">Monsoon</div>
          <div style="padding:12px 16px; font-weight:600; font-size:14px; color:var(--mute);">Festive</div>
        </div>
        <div style="padding:16px;">
          <ul style="font-size:14px; color:var(--ink);">
            <li style="padding:8px 0; border-bottom:1px solid var(--bg2);">Watermelon Juice</li>
            <li style="padding:8px 0; border-bottom:1px solid var(--bg2);">Mango Shake</li>
            <li style="padding:8px 0; border-bottom:1px solid var(--bg2);">Tender Coconut</li>
            <li style="padding:8px 0; border-bottom:1px solid var(--bg2);">Cold Coffee</li>
            <li style="padding:8px 0;">Ice Cream Sundaes</li>
          </ul>
        </div>
      </div>
    </div>

    {{-- Customers --}}
    <div>
      <div class="eb">Customer Management</div>
      <h3 style="font-size:28px; margin-bottom:12px;">Turn Everyday Orders Into Better Relationships.</h3>
      <p style="margin-bottom:24px;">Keep customer information and order history organized to understand your regulars.</p>

      <div class="cust-card">
        <div style="display:flex; justify-content:space-between; border-bottom:1px solid var(--line); padding-bottom:12px; margin-bottom:12px;">
          <div>
            <strong style="display:block; font-size:18px;">Arun Kumar</strong>
            <span style="font-size:13px; color:var(--mute);">+91 98765 43210</span>
          </div>
          <div style="text-align:right;">
            <span style="font-size:11px; font-weight: 500; color:var(--mute);">TOTAL ORDERS</span>
            <strong style="display:block; font-size:18px; color:var(--br);">12</strong>
          </div>
        </div>
        <div style="font-size:12px; font-weight: 500; color:var(--mute); margin-bottom:8px; text-transform:uppercase;">Recent Purchases:</div>
        <ul style="font-size:13px; color:var(--ink);">
          <li style="display:flex; justify-content:space-between; margin-bottom:4px;"><span>Mango Juice</span> <strong>× 2</strong></li>
          <li style="display:flex; justify-content:space-between; margin-bottom:4px;"><span>Chocolate Milkshake</span> <strong>× 1</strong></li>
          <li style="display:flex; justify-content:space-between; margin-bottom:4px;"><span>Pani Puri</span> <strong>× 2</strong></li>
        </ul>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 14: REPORTS --}}
<section style="background: var(--dark); color: #fff; padding: 100px 0;">
  <div class="w">
    <div class="hd">
      <div class="eb" style="background:rgba(255,255,255,0.1); color:#fff; border-color:rgba(255,255,255,0.2);">Business Reports</div>
      <h2 style="color:#fff;">Know What Your Customers Buy.</h2>
      <p style="color:rgba(255,255,255,0.7);">Turn everyday sales and order data into clear business insights.</p>
    </div>

    <div class="reports-preview">
      <div class="rp-stats">
        <div class="rp-stat-card">
          <div class="rp-lbl">DAILY SALES</div>
          <div class="rp-val">₹24,850</div>
        </div>
        <div class="rp-stat-card">
          <div class="rp-lbl">TOTAL ORDERS</div>
          <div class="rp-val">156</div>
        </div>
        <div class="rp-stat-card">
          <div class="rp-lbl">TOP CATEGORY</div>
          <div class="rp-val">Juices</div>
        </div>
        <div class="rp-stat-card">
          <div class="rp-lbl">PEAK HOURS</div>
          <div class="rp-val">5PM - 8PM</div>
        </div>
      </div>
      <div style="height:140px; display:flex; align-items:flex-end; gap:16px; border-bottom:1px solid rgba(255,255,255,0.2);">
        <div style="flex:1; background:var(--br); height:90%; border-radius:4px 4px 0 0; position:relative;"><span style="position:absolute; bottom:-24px; left:0; right:0; text-align:center; font-size:10px; color:rgba(255,255,255,0.6);">Juices</span></div>
        <div style="flex:1; background:var(--br); height:70%; border-radius:4px 4px 0 0; position:relative;"><span style="position:absolute; bottom:-24px; left:0; right:0; text-align:center; font-size:10px; color:rgba(255,255,255,0.6);">Shakes</span></div>
        <div style="flex:1; background:var(--br); height:60%; border-radius:4px 4px 0 0; position:relative;"><span style="position:absolute; bottom:-24px; left:0; right:0; text-align:center; font-size:10px; color:rgba(255,255,255,0.6);">Ice Cream</span></div>
        <div style="flex:1; background:var(--br); height:85%; border-radius:4px 4px 0 0; position:relative;"><span style="position:absolute; bottom:-24px; left:0; right:0; text-align:center; font-size:10px; color:rgba(255,255,255,0.6);">Chaat</span></div>
        <div style="flex:1; background:var(--br); height:100%; border-radius:4px 4px 0 0; position:relative;"><span style="position:absolute; bottom:-24px; left:0; right:0; text-align:center; font-size:10px; color:rgba(255,255,255,0.6);">Tea</span></div>
        <div style="flex:1; background:var(--br); height:80%; border-radius:4px 4px 0 0; position:relative;"><span style="position:absolute; bottom:-24px; left:0; right:0; text-align:center; font-size:10px; color:rgba(255,255,255,0.6);">Coffee</span></div>
        <div style="flex:1; background:var(--br); height:40%; border-radius:4px 4px 0 0; position:relative;"><span style="position:absolute; bottom:-24px; left:0; right:0; text-align:center; font-size:10px; color:rgba(255,255,255,0.6);">Snacks</span></div>
      </div>
      <div style="text-align:center; margin-top:32px; font-size:11px; color:rgba(255,255,255,0.4);">* Demo/example data shown for illustrative purposes.</div>
    </div>
  </div>
</section>

{{-- SECTION 15: WORKFLOW --}}
<section>
  <div class="w">
    <div class="hd">
      <h2>From Product Selection to Completed Sale.</h2>
      <p>See how Geni Menu connects your daily shop operations into one smooth workflow.</p>
    </div>

    <div class="workflow-scroll">
      <div class="connected-flow">
        <div class="cf-node"><div class="cf-icon"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/></svg></div><div style="font-size:11px; font-weight:700;">Product<br>Catalogue</div></div>
        <div class="cf-arrow">→</div>
        <div class="cf-node"><div class="cf-icon"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></div><div style="font-size:11px; font-weight:700;">Customer<br>Order</div></div>
        <div class="cf-arrow">→</div>
        <div class="cf-node"><div class="cf-icon"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg></div><div style="font-size:11px; font-weight:700;">Preparation</div></div>
        <div class="cf-arrow">→</div>
        <div class="cf-node"><div class="cf-icon"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/></svg></div><div style="font-size:11px; font-weight:700;">Billing</div></div>
        <div class="cf-arrow">→</div>
        <div class="cf-node"><div class="cf-icon"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="4" width="22" height="16" rx="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg></div><div style="font-size:11px; font-weight:700;">Payment</div></div>
        <div class="cf-arrow">→</div>
        <div class="cf-node"><div class="cf-icon"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12l5 5l10 -10"/></svg></div><div style="font-size:11px; font-weight:700;">Serve /<br>Pickup</div></div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 16: FOUR BUSINESS TYPES --}}
<section class="alt">
  <div class="w">
    <div class="hd">
      <h2>One Platform. Different Food & Beverage Businesses.</h2>
    </div>

    <div class="four-biz-grid">
      <div class="biz-card">
        <img src="https://images.unsplash.com/photo-1621506289937-a8e4df240d0b?w=400&q=80" alt="Juice Shop" class="biz-img">
        <div class="biz-ctx">
          <h3>🥤 Juice Shops</h3>
          <ul>
            <li>Fresh juices</li><li>Shakes</li><li>Smoothies</li><li>Mocktails</li><li>Fruit bowls</li><li>Quick counter orders</li>
          </ul>
        </div>
      </div>
      <div class="biz-card">
        <img src="https://images.unsplash.com/photo-1557142046-c704a3adf364?w=400&q=80" alt="Ice Cream Parlour" class="biz-img">
        <div class="biz-ctx">
          <h3>🍦 Ice Cream Parlours</h3>
          <ul>
            <li>Scoops</li><li>Cups</li><li>Cones</li><li>Sundaes</li><li>Desserts</li><li>Flavours</li><li>Add-ons</li>
          </ul>
        </div>
      </div>
      <div class="biz-card">
        <img src="https://images.unsplash.com/photo-1601050690597-df0568f70950?w=400&q=80" alt="Chaat Shop" class="biz-img">
        <div class="biz-ctx">
          <h3>🌶️ Chaat Shops</h3>
          <ul>
            <li>Pani puri</li><li>Bhel puri</li><li>Sev puri</li><li>Dahi puri</li><li>Samosa chaat</li><li>Aloo tikki</li>
          </ul>
        </div>
      </div>
      <div class="biz-card">
        <img src="https://images.unsplash.com/photo-1544787219-7f47ccb76574?w=400&q=80" alt="Tea Shop" class="biz-img">
        <div class="biz-ctx">
          <h3>☕ Tea Shops</h3>
          <ul>
            <li>Tea</li><li>Masala tea</li><li>Coffee</li><li>Cold coffee</li><li>Snacks</li><li>Beverages</li><li>Takeaway</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 17: WHY GENI MENU --}}
<section>
  <div class="w">
    <div class="hd">
      <h2>Simple Tools for Fast-Moving Businesses.</h2>
    </div>

    <div class="benefits-grid">
      <div class="b-card">
        <h3 style="margin-bottom:8px; font-size:16px;">01. Easy Product Management</h3>
        <p style="font-size:14px;">Organize drinks, desserts, snacks and food items clearly.</p>
      </div>
      <div class="b-card">
        <h3 style="margin-bottom:8px; font-size:16px;">02. Faster Counter Billing</h3>
        <p style="font-size:14px;">Process everyday transactions through a streamlined POS.</p>
      </div>
      <div class="b-card">
        <h3 style="margin-bottom:8px; font-size:16px;">03. Order Visibility</h3>
        <p style="font-size:14px;">Keep active, preparing and completed orders organized.</p>
      </div>
      <div class="b-card">
        <h3 style="margin-bottom:8px; font-size:16px;">04. Product Availability</h3>
        <p style="font-size:14px;">Keep your customer-facing menu aligned with current availability.</p>
      </div>
      <div class="b-card">
        <h3 style="margin-bottom:8px; font-size:16px;">05. Inventory Visibility</h3>
        <p style="font-size:14px;">Monitor important ingredients and supplies easily.</p>
      </div>
      <div class="b-card">
        <h3 style="margin-bottom:8px; font-size:16px;">06. Business Reports</h3>
        <p style="font-size:14px;">Understand sales, orders and product performance.</p>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 18 & 19: CUST EXP & MOBILE --}}
<section class="alt">
  <div class="w two-col-flow">
    <div>
      <div class="eb">Customer Experience</div>
      <h3 style="font-size:28px; margin-bottom:12px;">Make Ordering Simple for Your Customers.</h3>
      <p style="margin-bottom:24px;">Let customers view categories, product images, prices, sizes and availability on a digital menu.</p>
      <div class="mob-preview">
        <div class="mob-inner" style="background:#fdfaf6; padding:0;">
          <img src="https://images.unsplash.com/photo-1621506289937-a8e4df240d0b?w=400&q=80" alt="Juice" style="width:100%; height:200px; object-fit:cover;">
          <div style="padding:16px;">
            <div style="font-size:11px; font-weight: 500; color:var(--br); text-transform:uppercase; margin-bottom:4px;">Fresh Juices</div>
            <h4 style="font-size:18px;">Mango Juice</h4>
            <p style="font-size:13px; margin:4px 0 16px;">Freshly blended seasonal mangoes without added sugar.</p>
            <div style="border:1px solid var(--line); border-radius:12px; padding:12px; margin-bottom:12px; display:flex; justify-content:space-between; align-items:center;">
              <span style="font-weight:700;">Regular</span>
              <span style="color:var(--br); font-weight: 500;">₹120</span>
            </div>
            <button style="width:100%; padding:14px; border-radius:12px; background:var(--br); color:#fff; font-weight: 500; border:none;">Select Options</button>
          </div>
        </div>
      </div>
    </div>

    <div>
      <div class="eb">Mobile Shop Management</div>
      <h3 style="font-size:28px; margin-bottom:12px;">Your Shop at a Glance. Wherever You Are.</h3>
      <p style="margin-bottom:24px;">Keep an eye on sales, orders and stock levels directly from your smartphone.</p>
      <div class="mob-preview">
        <div class="mob-inner">
          <div style="font-weight: 500; font-size:16px; margin-bottom:16px;">Shop Dashboard</div>
          <div style="background:var(--bg2); border:1px solid var(--line); padding:12px; border-radius:12px; margin-bottom:12px;">
            <div style="font-size:11px; font-weight:700; color:var(--mute);">TODAY'S SALES</div>
            <div style="font-size:20px; font-weight: 500; color:var(--br);">₹32,850</div>
          </div>
          <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px; margin-bottom:16px;">
            <div style="background:var(--bg2); border:1px solid var(--line); padding:12px; border-radius:12px;">
              <div style="font-size:11px; font-weight:700; color:var(--mute);">ACTIVE</div>
              <div style="font-size:20px; font-weight: 500; color:var(--ink);">14</div>
            </div>
            <div style="background:var(--bg2); border:1px solid var(--line); padding:12px; border-radius:12px;">
              <div style="font-size:11px; font-weight:700; color:var(--mute);">PAYMENTS</div>
              <div style="font-size:18px; font-weight: 500; color:var(--ink);">₹29.4k</div>
            </div>
          </div>
          <div style="font-weight:700; font-size:13px; margin:16px 0 8px;">Low Stock Alerts</div>
          <div style="font-size:13px; padding:8px; display:flex; justify-content:space-between;"><span>Milk</span><span style="color:var(--red);">4 L</span></div>
          <div style="font-size:13px; padding:8px; display:flex; justify-content:space-between; border-top:1px solid var(--line);"><span>Sugar</span><span style="color:var(--red);">2 kg</span></div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 20: IDEAL FOR --}}
<section>
  <div class="w">
    <div class="hd">
      <h2>Built for Small Shops. Ready for Growing Businesses.</h2>
    </div>

    <div class="industry-grid">
      <div class="ind-card"><span>Juice Centres</span></div>
      <div class="ind-card"><span>Fresh Juice Shops</span></div>
      <div class="ind-card"><span>Juice & Shake Shops</span></div>
      <div class="ind-card"><span>Ice Cream Parlours</span></div>
      <div class="ind-card"><span>Dessert Shops</span></div>
      <div class="ind-card"><span>Chaat Centres</span></div>
      <div class="ind-card"><span>Street Food Shops</span></div>
      <div class="ind-card"><span>Tea Shops</span></div>
      <div class="ind-card"><span>Coffee & Tea Cafés</span></div>
      <div class="ind-card"><span>Beverage Counters</span></div>
      <div class="ind-card"><span>Snack Shops</span></div>
      <div class="ind-card"><span>Multi-Branch Outlets</span></div>
    </div>
  </div>
</section>

{{-- SECTION 21: MULTI BRANCH --}}
<section class="alt">
  <div class="w">
    <div class="hd">
      <div class="eb">Multi-Branch Management</div>
      <h2>Growing to More Locations? Stay Connected.</h2>
      <p>Manage branch-wise sales, orders and inventory where multi-branch capabilities are supported by your Geni Menu plan.</p>
    </div>

    <div class="mb-panel" style="max-width:500px; margin:0 auto;">
      <div style="font-weight: 500; font-size:14px; color:var(--mute); text-transform:uppercase; margin-bottom:12px;">All Branches Sales</div>
      <div class="mb-row"><span>Tiruchengode</span><span class="mb-val">₹32,850</span></div>
      <div class="mb-row"><span>Namakkal</span><span class="mb-val">₹28,420</span></div>
      <div class="mb-row"><span>Salem</span><span class="mb-val">₹41,680</span></div>
      <div style="font-size:11px; color:var(--mute); text-align:center; margin-top:16px;">* Multi-branch functionality depends on applicable plan.</div>
    </div>
  </div>
</section>

{{-- SECTION 22: CONNECTED FEATURES --}}
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">Connected Platform</div>
      <h2>Everything Your Shop Needs. Working Together.</h2>
    </div>

    <div class="conn-grid">
      <div class="conn-card">
        <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/></svg><br>Menu
      </div>
      <div class="conn-card">
        <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/></svg><br>Orders
      </div>
      <div class="conn-card">
        <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/></svg><br>POS
      </div>
      <div class="conn-card">
        <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg><br>Customers
      </div>
      <div class="conn-card">
        <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg><br>Inventory
      </div>
      <div class="conn-card">
        <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="4" width="22" height="16" rx="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg><br>Payments
      </div>
      <div class="conn-card">
        <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg><br>Reports
      </div>
    </div>
  </div>
</section>

{{-- SECTION 23: FAQ --}}
<section class="alt">
  <div class="w">
    <div class="hd">
      <h2>Frequently Asked Questions</h2>
    </div>

    <div class="faq-list">
      <details class="faq-item">
        <summary>Can Geni Menu manage juice shop products? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></summary>
        <p>Yes. You can organize juices, shakes, smoothies, mocktails and other products through the menu and product management features.</p>
      </details>
      <details class="faq-item">
        <summary>Can I manage ice cream flavours and sizes? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></summary>
        <p>Product variations such as flavours and sizes can be managed where supported.</p>
      </details>
      <details class="faq-item">
        <summary>Can I use Geni Menu for chaat shops? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></summary>
        <p>Yes. Geni Menu can help manage chaat products, orders, billing, customers and other supported operations.</p>
      </details>
      <details class="faq-item">
        <summary>Can tea shops use Geni Menu? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></summary>
        <p>Yes. Tea, coffee, snacks and beverage products can be organized and managed through the platform.</p>
      </details>
      <details class="faq-item">
        <summary>Can I manage takeaway orders? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></summary>
        <p>Yes. Takeaway orders can be handled through the supported order-management workflow.</p>
      </details>
      <details class="faq-item">
        <summary>Can I track ingredients? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></summary>
        <p>Inventory management can help track ingredients, stock levels and stock movement.</p>
      </details>
      <details class="faq-item">
        <summary>Can I manage multiple outlets? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></summary>
        <p>Multi-branch functionality is available where supported by the applicable plan.</p>
      </details>
      <details class="faq-item">
        <summary>Can I view sales reports? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></summary>
        <p>Yes. Supported reports provide visibility into sales, orders, products and business activity.</p>
      </details>
    </div>
  </div>
</section>

{{-- FINAL CTA --}}
<section class="cta-sec">
  <div class="w cta-box">
    <h2>Ready to Run Your Shop Smarter?</h2>
    <p>Manage your products, orders, billing, customers, inventory and business insights from one connected platform with Geni Menu.</p>
    <div style="display:flex; gap:16px; justify-content:center; flex-wrap:wrap; margin-top:24px;">
      <a href="{{ route('contact.us') }}" class="btn p">Get Started →</a>
      <a href="{{ route('contact.us') }}" class="btn o">Book a Demo</a>
    </div>
  </div>
</section>

@endsection
