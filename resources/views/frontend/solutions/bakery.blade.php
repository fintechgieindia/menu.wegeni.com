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

/* ---------------- SECTION 3: FEATURES ---------------- */
.eco-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }
.eco-card { padding: 28px; background: #fff; border: 1px solid var(--line); border-radius: 20px; transition: .3s; }
.eco-card:hover { transform: translateY(-4px); border-color: var(--br); box-shadow: var(--shadow-md); }
.eco-card h3 { margin: 18px 0 8px; font-size: 18px; }
.eco-card p { font-size: 14px; color: var(--mute); }
.ic { width: 48px; height: 48px; border-radius: 13px; background: var(--bg2); color: var(--br); display: grid; place-items: center; border: 1px solid var(--line); transition: .3s ease; }
.eco-card:hover .ic { background: var(--br); color: #fff; border-color: var(--br); }

/* ---------------- SECTION 4: CATALOGUE ---------------- */
.cat-sec-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 48px; align-items: center; }
.prod-list { display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px; }
.pc-card { display: flex; align-items: center; gap: 12px; padding: 12px; border: 1px solid var(--line); border-radius: 16px; background: #fff; }
.pc-img { width: 64px; height: 64px; border-radius: 10px; object-fit: cover; }
.pc-ctx h4 { font-size: 14px; margin-bottom: 4px; }
.pc-ctx .wt { font-size: 11px; color: var(--mute); background: var(--bg2); padding: 2px 8px; border-radius: 4px; display: inline-block; }

/* ---------------- SECTION 5 & 6: CUSTOM CAKE & SIZES ---------------- */
.two-col-flow { display: grid; grid-template-columns: 1fr 1fr; gap: 48px; align-items: start; }
.custom-order-panel { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 24px; }
.co-hdr { display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid var(--line); padding-bottom: 16px; margin-bottom: 16px; }
.co-details { background: var(--bg2); border-radius: 12px; padding: 16px; font-size: 14px; margin-bottom: 16px; }
.co-msg { font-family: 'Playfair Display', serif; font-size: 18px; font-style: italic; color: var(--br); text-align: center; padding: 16px; border: 1px dashed var(--br); border-radius: 8px; margin-bottom: 16px; background: #fff; }

.var-panel { background: #fff; border: 1px solid var(--line); border-radius: 16px; overflow: hidden; }
.var-row { display: flex; justify-content: space-between; padding: 16px; border-bottom: 1px solid var(--line); font-size: 14px; }
.var-row:last-child { border-bottom: none; }
.var-row.h { background: var(--bg2); font-weight: 500; font-size: 12px; color: var(--mute); text-transform: uppercase; }

/* ---------------- SECTION 7: BILLING ---------------- */
.bill-panel { background: #fff; border: 1px solid var(--line); border-radius: 20px; max-width: 480px; margin: 0 auto; box-shadow: var(--shadow-md); overflow: hidden; }
.bp-hdr { padding: 16px 20px; background: var(--bg2); border-bottom: 1px solid var(--line); font-weight: 500; font-size: 15px; }
.bp-body { padding: 20px; }
.bp-item { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 16px; font-size: 14px; }
.bp-item-qty { font-size: 12px; color: var(--mute); display: block; }
.bp-total { display: flex; justify-content: space-between; padding: 16px 0; border-top: 2px dashed var(--line); margin-top: 8px; font-weight: 500; font-size: 20px; color: var(--br); }
.bp-actions { display: grid; grid-template-columns: repeat(2, 1fr); gap: 8px; margin-top: 16px; }
.bp-btn { padding: 12px; border-radius: 8px; border: 1px solid var(--line); background: #fff; font-weight: 700; font-size: 13px; cursor: pointer; }
.bp-btn.p { background: var(--br); color: #fff; border-color: var(--br); }

/* ---------------- SECTION 8 & 9: ORDERS & OCCASIONS ---------------- */
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

/* ---------------- SECTION 12 & 13: PURCHASE & CUSTOMER ---------------- */
.po-card { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 20px; }
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

/* ---------------- SECTION 16: BENEFITS ---------------- */
.benefits-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; }
.b-card { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 24px; }

/* ---------------- SECTION 17: IDEAL FOR ---------------- */
.industry-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; }
.ind-card { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 16px; display: flex; align-items: center; gap: 12px; font-weight: 700; font-size: 14px; }

/* ---------------- SECTION 18 & 19: CUST EXP & MOBILE ---------------- */
.mob-preview { max-width: 300px; margin: 0 auto; background: #000; border: 4px solid #333; border-radius: 36px; padding: 10px; box-shadow: var(--shadow-lg); }
.mob-inner { background: #fff; border-radius: 26px; height: 500px; overflow: hidden; padding: 16px; }

/* ---------------- SECTION 20: CONNECTED ---------------- */
.conn-grid { display: grid; grid-template-columns: repeat(6, 1fr); gap: 12px; text-align: center; }
.conn-card { background: #fff; border: 1px solid var(--line); border-radius: 12px; padding: 16px 12px; font-size: 12px; font-weight: 700; }
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
  .hero-grid, .cat-sec-grid, .two-col-flow { grid-template-columns: 1fr; gap: 36px; }
  .eco-grid, .fest-dash, .benefits-grid { grid-template-columns: repeat(2, 1fr); }
  .industry-grid, .rp-stats { grid-template-columns: repeat(2, 1fr); }
  .conn-grid { grid-template-columns: repeat(3, 1fr); }
}

@media (max-width: 768px) {
  .bc { padding: 14px 0 14px; }
  .w { padding: 0 16px; }
  .win { min-width: 0 !important; width: 100%; overflow-x: auto; }
}

@media (max-width: 640px) {
  .eco-grid, .benefits-grid, .industry-grid, .rp-stats { grid-template-columns: 1fr; }
  .prod-list { grid-template-columns: 1fr; }
  .bp-actions { grid-template-columns: 1fr; }
  .conn-grid { grid-template-columns: repeat(2, 1fr); }
  .inv-table { display: block; overflow-x: auto; white-space: nowrap; }
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
    <span class="cur">Bakeries & Cake Shops</span>
  </div>
</div>

{{-- HERO --}}
<section class="hero">
  <div class="w hero-grid">
    <div class="hero-ctx">
      <div class="eb">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><path d="M8 14s1.5 2 4 2 4-2 4-2"/><line x1="9" y1="9" x2="9.01" y2="9"/><line x1="15" y1="9" x2="15.01" y2="9"/></svg>
        BAKERY & CAKE SHOP SOLUTION
      </div>
      <h1>Bake Better. <span class="sf">Sell Smarter.</span> Grow Your Bakery.</h1>
      <p>Manage your bakery products, cakes, customer orders, billing, inventory and daily shop operations from one connected platform built for modern bakeries and cake shops.</p>
      <div class="hero-btns">
        <a href="{{ route('contact.us') }}" class="btn p">Get Started →</a>
        <a href="{{ route('contact.us') }}" class="btn o">Book a Demo</a>
      </div>
    </div>

    <div class="hero-ui">
      <div class="hero-ui-hdr">
        <div class="hero-ui-hdr-title">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--br)" stroke-width="2.5"><rect x="3" y="3" width="18" height="18" rx="2"/></svg>
          Geni Menu — Bakery Dashboard
        </div>
        <span class="badge ready">Live</span>
      </div>
      <div class="hero-ui-grid">
        <div class="hu-stat">
          <div class="hu-stat-lbl">Today's Sales</div>
          <div class="hu-stat-val">₹32,450</div>
        </div>
        <div class="hu-stat">
          <div class="hu-stat-lbl">Active Orders</div>
          <div class="hu-stat-val">12</div>
        </div>
        <div class="hu-stat">
          <div class="hu-stat-lbl">Cake Orders</div>
          <div class="hu-stat-val">4</div>
        </div>
        <div class="hu-stat">
          <div class="hu-stat-lbl">Ready for Pickup</div>
          <div class="hu-stat-val">3</div>
        </div>
        <div class="hu-stat">
          <div class="hu-stat-lbl">Low Stock</div>
          <div class="hu-stat-val" style="color:var(--red);">2 Items</div>
        </div>
        <div class="hu-stat">
          <div class="hu-stat-lbl">Best-Selling</div>
          <div class="hu-stat-val" style="font-size:16px;">Choc Truffle</div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 3: ECOSYSTEM --}}
<section class="alt">
  <div class="w">
    <div class="hd">
      <div class="eb">Built For Bakeries</div>
      <h2>Everything Your Bakery Needs. Connected in One Place.</h2>
      <p>From product management to customer orders, billing and inventory, Geni Menu brings your everyday bakery operations together in one simple platform.</p>
    </div>

    <div class="eco-grid">
      <div class="eco-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg></div>
        <h3>1. Product & Menu Management</h3>
        <p>Organize cakes, pastries, breads, savouries, desserts and beverages.</p>
      </div>
      <div class="eco-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/></svg></div>
        <h3>2. Cake Catalogue</h3>
        <p>Showcase cake images, names, prices, descriptions and available options.</p>
      </div>
      <div class="eco-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/></svg></div>
        <h3>3. Order Management</h3>
        <p>Keep customer orders organized from order creation to pickup or handover.</p>
      </div>
      <div class="eco-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg></div>
        <h3>4. Custom Cake Orders</h3>
        <p>Manage custom cake requirements and special customer instructions where supported.</p>
      </div>
      <div class="eco-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/></svg></div>
        <h3>5. POS & Billing</h3>
        <p>Process counter sales and generate bills quickly.</p>
      </div>
      <div class="eco-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="4" width="22" height="16" rx="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg></div>
        <h3>6. Payments</h3>
        <p>Keep payment activity connected to each transaction.</p>
      </div>
      <div class="eco-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></div>
        <h3>7. Customer Management</h3>
        <p>Maintain customer details and order history.</p>
      </div>
      <div class="eco-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg></div>
        <h3>8. Inventory Management</h3>
        <p>Track important bakery ingredients and stock levels.</p>
      </div>
      <div class="eco-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2M9 5a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2M9 5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2"/></svg></div>
        <h3>9. Purchase Tracking</h3>
        <p>Keep purchase records and incoming stock organized where supported.</p>
      </div>
      <div class="eco-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></div>
        <h3>10. Reports</h3>
        <p>Understand sales, orders, products and business performance.</p>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 4: CATALOGUE --}}
<section>
  <div class="w cat-sec-grid">
    <div>
      <div class="eb">Bakery Catalogue</div>
      <h2>Turn Your Bakery Collection Into a Beautiful Digital Catalogue.</h2>
      <p>Present your bakery products clearly with organized categories, product images, pricing and availability.</p>
      
      <div style="margin-top:24px; display:flex; gap:8px; flex-wrap:wrap;">
        <span class="badge" style="background:var(--bg2); color:var(--mute); border:1px solid var(--line);">Birthday Cakes</span>
        <span class="badge" style="background:var(--bg2); color:var(--mute); border:1px solid var(--line);">Wedding Cakes</span>
        <span class="badge" style="background:var(--bg2); color:var(--mute); border:1px solid var(--line);">Custom Cakes</span>
        <span class="badge" style="background:var(--bg2); color:var(--mute); border:1px solid var(--line);">Pastries</span>
        <span class="badge" style="background:var(--bg2); color:var(--mute); border:1px solid var(--line);">Cupcakes</span>
        <span class="badge" style="background:var(--bg2); color:var(--mute); border:1px solid var(--line);">Brownies</span>
        <span class="badge" style="background:var(--bg2); color:var(--mute); border:1px solid var(--line);">Cookies</span>
        <span class="badge" style="background:var(--bg2); color:var(--mute); border:1px solid var(--line);">Breads</span>
        <span class="badge" style="background:var(--bg2); color:var(--mute); border:1px solid var(--line);">Puffs & Savouries</span>
      </div>
    </div>

    <div class="win" style="padding:24px;">
      <div class="prod-list">
        <div class="pc-card">
          <img class="pc-img" src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=150&q=80" alt="Chocolate Cake">
          <div class="pc-ctx">
            <h4>Chocolate Truffle</h4>
            <span style="font-weight: 500; color:var(--br);">₹950</span>
            <div class="wt">1 kg</div>
          </div>
        </div>
        <div class="pc-card">
          <img class="pc-img" src="https://images.unsplash.com/photo-1614707267537-b85aaf00c4b7?w=150&q=80" alt="Red Velvet">
          <div class="pc-ctx">
            <h4>Red Velvet Cake</h4>
            <span style="font-weight: 500; color:var(--br);">₹1,100</span>
            <div class="wt">1 kg</div>
          </div>
        </div>
        <div class="pc-card">
          <img class="pc-img" src="https://images.unsplash.com/photo-1576618148400-f54bed99fcfd?w=150&q=80" alt="Cupcake">
          <div class="pc-ctx">
            <h4>Blueberry Cupcake</h4>
            <span style="font-weight: 500; color:var(--br);">₹80</span>
            <div class="wt">1 pc</div>
          </div>
        </div>
        <div class="pc-card">
          <img class="pc-img" src="https://images.unsplash.com/photo-1509440159596-0249088772ff?w=150&q=80" alt="Bread">
          <div class="pc-ctx">
            <h4>Sourdough Bread</h4>
            <span style="font-weight: 500; color:var(--br);">₹180</span>
            <div class="wt">Loaf</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 5 & 6: CUSTOM CAKES & VARIATIONS --}}
<section class="alt">
  <div class="w two-col-flow">
    {{-- Custom Cake Orders --}}
    <div>
      <div class="eb">Custom Cake Orders</div>
      <h3 style="font-size:28px; margin-bottom:12px;">Make Every Cake Order Special.</h3>
      <p style="margin-bottom:24px;">Keep important customer requirements organized so your team knows exactly what needs to be prepared.</p>
      
      <div class="custom-order-panel">
        <div class="co-hdr">
          <span style="font-weight: 500; font-size:16px;">ORDER #3048</span>
          <span class="badge preparing">Preparing</span>
        </div>
        
        <div class="co-details">
          <div style="font-weight: 500; font-size:16px; margin-bottom:4px;">Chocolate Truffle Cake</div>
          <div style="color:var(--mute);">2 kg</div>
        </div>

        <div class="co-msg">
          “Happy Birthday Arun!”
        </div>

        <ul style="font-size:14px; margin-bottom:0;">
          <li style="display:flex; justify-content:space-between; margin-bottom:8px;"><span>Theme:</span> <strong>Blue & Gold</strong></li>
          <li style="display:flex; justify-content:space-between; margin-bottom:8px;"><span>Customer:</span> <strong>Priya Kumar</strong></li>
          <li style="display:flex; justify-content:space-between;"><span>Pickup:</span> <strong>Today, 5:30 PM</strong></li>
        </ul>
        <div style="font-size:11px; color:var(--mute); margin-top:16px; text-align:center;">* Illustrative example of supported features.</div>
      </div>
    </div>

    {{-- Cake Variations --}}
    <div>
      <div class="eb">Cake Sizes & Variations</div>
      <h3 style="font-size:28px; margin-bottom:12px;">Manage Cake Sizes & Variations With Ease.</h3>
      <p style="margin-bottom:24px;">Organize different product choices without creating unnecessary duplicate products in your menu.</p>

      <div class="var-panel">
        <div class="var-row h">
          <span>Chocolate Truffle Cake Options</span>
          <span>Price</span>
        </div>
        <div class="var-row"><span>½ kg</span><strong>₹550</strong></div>
        <div class="var-row"><span>1 kg</span><strong>₹950</strong></div>
        <div class="var-row"><span>1.5 kg</span><strong>₹1,400</strong></div>
        <div class="var-row"><span>2 kg</span><strong>₹1,850</strong></div>
      </div>
      
      <div style="margin-top:16px; display:flex; gap:8px; flex-wrap:wrap;">
        <span class="badge" style="background:#fff; border:1px solid var(--line); color:var(--mute);">Flavour</span>
        <span class="badge" style="background:#fff; border:1px solid var(--line); color:var(--mute);">Size</span>
        <span class="badge" style="background:#fff; border:1px solid var(--line); color:var(--mute);">Filling</span>
        <span class="badge" style="background:#fff; border:1px solid var(--line); color:var(--mute);">Toppings</span>
        <span class="badge" style="background:#fff; border:1px solid var(--line); color:var(--mute);">Custom Message</span>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 7: BILLING --}}
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">POS & Billing</div>
      <h2>Faster Billing at the Bakery Counter.</h2>
      <p>Process everyday bakery purchases quickly with a simple POS experience designed for busy counters.</p>
    </div>

    <div class="bill-panel">
      <div class="bp-hdr">Counter Sale #142</div>
      <div class="bp-body">
        <div class="bp-item">
          <div>Chocolate Pastry<span class="bp-item-qty">× 2</span></div>
          <strong style="color:var(--ink);">₹180</strong>
        </div>
        <div class="bp-item">
          <div>Chicken Puff<span class="bp-item-qty">× 2</span></div>
          <strong style="color:var(--ink);">₹100</strong>
        </div>
        <div class="bp-item">
          <div>Blueberry Cupcake<span class="bp-item-qty">× 2</span></div>
          <strong style="color:var(--ink);">₹160</strong>
        </div>
        <div class="bp-item">
          <div>Cold Coffee<span class="bp-item-qty">× 1</span></div>
          <strong style="color:var(--ink);">₹120</strong>
        </div>
        
        <div class="bp-total">
          <span>TOTAL</span>
          <span>₹560</span>
        </div>

        <div class="bp-actions">
          <button class="bp-btn">Hold Bill</button>
          <button class="bp-btn p">Pay & Complete</button>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 8 & 9: ORDERS & OCCASIONS --}}
<section class="alt">
  <div class="w two-col-flow">
    {{-- Order Flow --}}
    <div>
      <div class="eb">Order Management</div>
      <h3 style="font-size:28px; margin-bottom:12px;">Every Order. Clear From Start to Finish.</h3>
      <p style="margin-bottom:24px;">Keep your bakery orders organized and track their progress from creation to pickup.</p>
      
      <div class="order-ticket">
        <div class="ot-hdr">
          <span style="font-weight: 500; font-size:16px;">ORDER #3048</span>
          <span class="badge ready">Ready</span>
        </div>
        
        <ul style="font-size:14px; margin-bottom:16px;">
          <li style="display:flex; justify-content:space-between; margin-bottom:6px;"><span>2kg Chocolate Cake</span></li>
          <li style="display:flex; justify-content:space-between; margin-bottom:6px;"><span>6 Cupcakes</span></li>
          <li style="display:flex; justify-content:space-between; margin-bottom:6px;"><span>1 Box Brownies</span></li>
        </ul>

        <div style="font-size:13px; margin-bottom:16px; background:var(--bg2); padding:12px; border-radius:8px;">
          <div style="display:flex; justify-content:space-between; margin-bottom:4px;"><span>Customer:</span> <strong>Priya</strong></div>
          <div style="display:flex; justify-content:space-between;"><span>Pickup:</span> <strong>6:00 PM</strong></div>
        </div>
        
        <div class="ot-flow">
          <div class="ot-step done"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/></svg> Order</div>
          <div class="ot-step done"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg> Prepare</div>
          <div class="ot-step done"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/></svg> Pack</div>
          <div class="ot-step done"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="4" width="22" height="16" rx="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg> Bill</div>
          <div class="ot-step"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12l5 5l10 -10"/></svg> Pickup</div>
        </div>
      </div>
    </div>

    {{-- Peak Occasion --}}
    <div>
      <div class="eb">Peak Occasion Management</div>
      <h3 style="font-size:28px; margin-bottom:12px;">Stay Ready for Your Busiest Days.</h3>
      <p style="margin-bottom:24px;">Birthdays, weddings, anniversaries and festive seasons can bring a surge of orders. Keep your team aware of what is coming in and what needs attention.</p>

      <div class="fest-dash">
        <div class="fd-card">
          <div class="fd-val">18</div>
          <div class="fd-lbl">New Orders</div>
        </div>
        <div class="fd-card">
          <div class="fd-val">12</div>
          <div class="fd-lbl">Preparing</div>
        </div>
        <div class="fd-card">
          <div class="fd-val">8</div>
          <div class="fd-lbl">Ready</div>
        </div>
        <div class="fd-card">
          <div class="fd-val" style="color:var(--green);">96</div>
          <div class="fd-lbl">Completed</div>
        </div>
      </div>
      
      <div class="occ-tags">
        <span class="occ-tag">Birthdays</span>
        <span class="occ-tag">Weddings</span>
        <span class="occ-tag">Anniversaries</span>
        <span class="occ-tag">Festivals</span>
        <span class="occ-tag">Corporate Events</span>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 10 & 11: AVAILABILITY & INVENTORY --}}
<section>
  <div class="w two-col-flow">
    {{-- Availability --}}
    <div>
      <div class="eb">Product Availability</div>
      <h3 style="font-size:28px; margin-bottom:12px;">Keep Your Product Availability Up to Date.</h3>
      <p style="margin-bottom:24px;">Help prevent customers from selecting unavailable products by keeping your catalogue statuses current.</p>
      
      <div class="avail-list">
        <div class="avail-item"><span>Chocolate Truffle Cake</span><span class="badge ready">Available</span></div>
        <div class="avail-item"><span>Red Velvet Cake</span><span class="badge ready">Available</span></div>
        <div class="avail-item"><span>Black Forest Pastry</span><span class="badge ready">Available</span></div>
        <div class="avail-item" style="background:#fef2f2;"><span>Blueberry Cheesecake</span><span class="badge soldout">Sold Out</span></div>
        <div class="avail-item"><span>Chicken Puff</span><span class="badge ready">Available</span></div>
        <div class="avail-item"><span>Croissant</span><span class="badge ready">Available</span></div>
      </div>
    </div>

    {{-- Inventory --}}
    <div>
      <div class="eb">Bakery Inventory</div>
      <h3 style="font-size:28px; margin-bottom:12px;">Know What You Have. Know What You Need.</h3>
      <p style="margin-bottom:24px;">Keep visibility into important bakery ingredients and supplies so your team can monitor stock and replenish when needed.</p>

      <table class="inv-table">
        <thead>
          <tr>
            <th>Ingredient</th>
            <th>Stock</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <tr><td>Flour</td><td>50 kg</td><td><span class="badge ready">In Stock</span></td></tr>
          <tr><td>Sugar</td><td>40 kg</td><td><span class="badge ready">In Stock</span></td></tr>
          <tr><td>Cocoa Powder</td><td>10 kg</td><td><span class="badge low">Low</span></td></tr>
          <tr><td>Eggs</td><td>600 pcs</td><td><span class="badge ready">In Stock</span></td></tr>
          <tr><td>Cake Boxes</td><td>300 pcs</td><td><span class="badge ready">In Stock</span></td></tr>
        </tbody>
      </table>
    </div>
  </div>
</section>

{{-- SECTION 12 & 13: PURCHASE & CUSTOMER --}}
<section class="alt">
  <div class="w two-col-flow">
    {{-- Purchase --}}
    <div>
      <div class="eb">Purchase Management</div>
      <h3 style="font-size:28px; margin-bottom:12px;">Keep Bakery Purchases Organized.</h3>
      <p style="margin-bottom:24px;">Maintain a clear record of ingredients and supplies coming into your bakery where purchase management is supported.</p>
      
      <div class="po-card">
        <div style="display:flex; justify-content:space-between; margin-bottom:16px;">
          <div>
            <strong style="display:block;">PO-2056</strong>
            <span style="font-size:12px; color:var(--mute);">Supplier: BakeSupplies Inc</span>
          </div>
          <span class="badge received">Received</span>
        </div>
        <ul style="font-size:14px; color:var(--mute); margin-bottom:0;">
          <li style="display:flex; justify-content:space-between; margin-bottom:6px;"><span>Flour</span> <strong>50 kg</strong></li>
          <li style="display:flex; justify-content:space-between; margin-bottom:6px;"><span>Butter</span> <strong>20 kg</strong></li>
          <li style="display:flex; justify-content:space-between; margin-bottom:6px;"><span>Sugar</span> <strong>40 kg</strong></li>
        </ul>
      </div>
    </div>

    {{-- Customer --}}
    <div>
      <div class="eb">Customer Management</div>
      <h3 style="font-size:28px; margin-bottom:12px;">Know Your Customers Beyond the Order.</h3>
      <p style="margin-bottom:24px;">Keep customer information and order history organized to build better relationships.</p>

      <div class="cust-card">
        <div style="display:flex; justify-content:space-between; border-bottom:1px solid var(--line); padding-bottom:12px; margin-bottom:12px;">
          <div>
            <strong style="display:block; font-size:18px;">Priya Kumar</strong>
          </div>
          <div style="text-align:right;">
            <span style="font-size:11px; font-weight: 500; color:var(--mute);">TOTAL ORDERS</span>
            <strong style="display:block; font-size:18px; color:var(--br);">8</strong>
          </div>
        </div>
        <div style="font-size:12px; font-weight: 500; color:var(--mute); margin-bottom:8px; text-transform:uppercase;">Recent Orders:</div>
        <ul style="font-size:13px; color:var(--ink);">
          <li style="display:flex; justify-content:space-between; margin-bottom:4px;"><span>Chocolate Truffle Cake</span> <strong>2 kg</strong></li>
          <li style="display:flex; justify-content:space-between; margin-bottom:4px;"><span>Red Velvet Cake</span> <strong>1 kg</strong></li>
          <li style="display:flex; justify-content:space-between; margin-bottom:4px;"><span>Cupcakes</span> <strong>12 pcs</strong></li>
        </ul>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 14: REPORTS --}}
<section style="background: var(--dark); color: #fff; padding: 100px 0;">
  <div class="w">
    <div class="hd">
      <div class="eb" style="background:rgba(255,255,255,0.1); color:#fff; border-color:rgba(255,255,255,0.2);">Bakery Business Reports</div>
      <h2 style="color:#fff;">Understand What Is Selling.</h2>
      <p style="color:rgba(255,255,255,0.7);">Turn everyday bakery sales and order data into clear business insights.</p>
    </div>

    <div class="reports-preview">
      <div class="rp-stats">
        <div class="rp-stat-card">
          <div class="rp-lbl">DAILY SALES</div>
          <div class="rp-val">₹48,650</div>
        </div>
        <div class="rp-stat-card">
          <div class="rp-lbl">TOTAL ORDERS</div>
          <div class="rp-val">124</div>
        </div>
        <div class="rp-stat-card">
          <div class="rp-lbl">TOP CATEGORY</div>
          <div class="rp-val">Cakes</div>
        </div>
        <div class="rp-stat-card">
          <div class="rp-lbl">PEAK HOURS</div>
          <div class="rp-val">4PM - 7PM</div>
        </div>
      </div>
      <div style="height:140px; display:flex; align-items:flex-end; gap:16px; border-bottom:1px solid rgba(255,255,255,0.2);">
        <div style="flex:1; background:var(--br); height:100%; border-radius:4px 4px 0 0; position:relative;"><span style="position:absolute; bottom:-24px; left:0; right:0; text-align:center; font-size:10px; color:rgba(255,255,255,0.6);">Cakes</span></div>
        <div style="flex:1; background:var(--br); height:60%; border-radius:4px 4px 0 0; position:relative;"><span style="position:absolute; bottom:-24px; left:0; right:0; text-align:center; font-size:10px; color:rgba(255,255,255,0.6);">Pastries</span></div>
        <div style="flex:1; background:var(--br); height:80%; border-radius:4px 4px 0 0; position:relative;"><span style="position:absolute; bottom:-24px; left:0; right:0; text-align:center; font-size:10px; color:rgba(255,255,255,0.6);">Breads</span></div>
        <div style="flex:1; background:var(--br); height:50%; border-radius:4px 4px 0 0; position:relative;"><span style="position:absolute; bottom:-24px; left:0; right:0; text-align:center; font-size:10px; color:rgba(255,255,255,0.6);">Savouries</span></div>
        <div style="flex:1; background:var(--br); height:40%; border-radius:4px 4px 0 0; position:relative;"><span style="position:absolute; bottom:-24px; left:0; right:0; text-align:center; font-size:10px; color:rgba(255,255,255,0.6);">Cookies</span></div>
        <div style="flex:1; background:var(--br); height:30%; border-radius:4px 4px 0 0; position:relative;"><span style="position:absolute; bottom:-24px; left:0; right:0; text-align:center; font-size:10px; color:rgba(255,255,255,0.6);">Beverages</span></div>
      </div>
      <div style="text-align:center; margin-top:32px; font-size:11px; color:rgba(255,255,255,0.4);">* Demo/example data shown for illustrative purposes.</div>
    </div>
  </div>
</section>

{{-- SECTION 15: WORKFLOW --}}
<section>
  <div class="w">
    <div class="hd">
      <h2>One Connected Workflow. From Product to Pickup.</h2>
      <p>Geni Menu connects different parts of your bakery operations so everything works together smoothly.</p>
    </div>

    <div class="workflow-scroll">
      <div class="connected-flow">
        <div class="cf-node"><div class="cf-icon"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/></svg></div><div style="font-size:11px; font-weight:700;">Product<br>Catalogue</div></div>
        <div class="cf-arrow">→</div>
        <div class="cf-node"><div class="cf-icon"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></div><div style="font-size:11px; font-weight:700;">Customer<br>Order</div></div>
        <div class="cf-arrow">→</div>
        <div class="cf-node"><div class="cf-icon"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg></div><div style="font-size:11px; font-weight:700;">Preparation</div></div>
        <div class="cf-arrow">→</div>
        <div class="cf-node"><div class="cf-icon"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/></svg></div><div style="font-size:11px; font-weight:700;">Packing</div></div>
        <div class="cf-arrow">→</div>
        <div class="cf-node"><div class="cf-icon"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/></svg></div><div style="font-size:11px; font-weight:700;">Billing &<br>Payment</div></div>
        <div class="cf-arrow">→</div>
        <div class="cf-node"><div class="cf-icon"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12l5 5l10 -10"/></svg></div><div style="font-size:11px; font-weight:700;">Pickup /<br>Handover</div></div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 16: BENEFITS --}}
<section class="alt">
  <div class="w">
    <div class="hd">
      <h2>Why Bakeries Choose Geni Menu</h2>
    </div>

    <div class="benefits-grid">
      <div class="b-card">
        <h3 style="margin-bottom:8px; font-size:16px;">01. Beautiful Product Catalogue</h3>
        <p style="font-size:14px;">Showcase cakes, pastries, breads and bakery products professionally.</p>
      </div>
      <div class="b-card">
        <h3 style="margin-bottom:8px; font-size:16px;">02. Custom Cake Order Management</h3>
        <p style="font-size:14px;">Keep special cake requirements and customer instructions organized where supported.</p>
      </div>
      <div class="b-card">
        <h3 style="margin-bottom:8px; font-size:16px;">03. Faster Counter Billing</h3>
        <p style="font-size:14px;">Process everyday bakery transactions quickly.</p>
      </div>
      <div class="b-card">
        <h3 style="margin-bottom:8px; font-size:16px;">04. Inventory Visibility</h3>
        <p style="font-size:14px;">Monitor ingredients, supplies and stock levels.</p>
      </div>
      <div class="b-card">
        <h3 style="margin-bottom:8px; font-size:16px;">05. Customer Management</h3>
        <p style="font-size:14px;">Keep customer information and order history organized.</p>
      </div>
      <div class="b-card">
        <h3 style="margin-bottom:8px; font-size:16px;">06. Business Insights</h3>
        <p style="font-size:14px;">Understand sales, orders, products and bakery performance.</p>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 17: IDEAL FOR --}}
<section>
  <div class="w">
    <div class="hd">
      <h2>Built for Every Kind of Bakery Business.</h2>
    </div>

    <div class="industry-grid">
      <div class="ind-card"><span>Bakeries</span></div>
      <div class="ind-card"><span>Cake Shops</span></div>
      <div class="ind-card"><span>Custom Cake Studios</span></div>
      <div class="ind-card"><span>Pastry Shops</span></div>
      <div class="ind-card"><span>Bread & Bakery Stores</span></div>
      <div class="ind-card"><span>Dessert Shops</span></div>
      <div class="ind-card"><span>Cupcake Shops</span></div>
      <div class="ind-card"><span>Donut Shops</span></div>
      <div class="ind-card"><span>Café & Bakeries</span></div>
      <div class="ind-card"><span>Premium Cake Boutiques</span></div>
      <div class="ind-card"><span>Bakery Chains</span></div>
      <div class="ind-card"><span>Multi-Branch Bakeries</span></div>
    </div>
  </div>
</section>

{{-- SECTION 18 & 19: CUST EXP & MOBILE --}}
<section class="alt">
  <div class="w two-col-flow">
    <div>
      <div class="eb">Customer Experience</div>
      <h3 style="font-size:28px; margin-bottom:12px;">A Better Way for Customers to Discover Your Bakery.</h3>
      <p style="margin-bottom:24px;">Give customers a clear way to explore your bakery collection, understand products and choose what they want.</p>
      <div class="mob-preview">
        <div class="mob-inner" style="background:#fdfaf6; padding:0;">
          <img src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=400&q=80" alt="Cake" style="width:100%; height:200px; object-fit:cover;">
          <div style="padding:16px;">
            <h4 style="font-size:18px;">Chocolate Truffle Cake</h4>
            <p style="font-size:13px; margin:4px 0 16px;">Rich chocolate sponge with premium truffle ganache.</p>
            <div style="border:1px solid var(--line); border-radius:12px; padding:12px; margin-bottom:12px; display:flex; justify-content:space-between; align-items:center;">
              <span style="font-weight:700;">1 kg</span>
              <span style="color:var(--br); font-weight: 500;">₹950</span>
            </div>
            <button style="width:100%; padding:14px; border-radius:12px; background:var(--br); color:#fff; font-weight: 500; border:none;">Select Options</button>
          </div>
        </div>
      </div>
    </div>

    <div>
      <div class="eb">Mobile Bakery Management</div>
      <h3 style="font-size:28px; margin-bottom:12px;">Run Your Bakery From Wherever You Are.</h3>
      <p style="margin-bottom:24px;">Keep an eye on sales, orders and stock levels directly from your smartphone.</p>
      <div class="mob-preview">
        <div class="mob-inner">
          <div style="font-weight: 500; font-size:16px; margin-bottom:16px;">Bakery Dashboard</div>
          <div style="background:var(--bg2); border:1px solid var(--line); padding:12px; border-radius:12px; margin-bottom:12px;">
            <div style="font-size:11px; font-weight:700; color:var(--mute);">TODAY'S SALES</div>
            <div style="font-size:20px; font-weight: 500; color:var(--br);">₹48,650</div>
          </div>
          <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px; margin-bottom:16px;">
            <div style="background:var(--bg2); border:1px solid var(--line); padding:12px; border-radius:12px;">
              <div style="font-size:11px; font-weight:700; color:var(--mute);">ACTIVE</div>
              <div style="font-size:20px; font-weight: 500; color:var(--ink);">18</div>
            </div>
            <div style="background:var(--bg2); border:1px solid var(--line); padding:12px; border-radius:12px;">
              <div style="font-size:11px; font-weight:700; color:var(--mute);">CAKES</div>
              <div style="font-size:20px; font-weight: 500; color:var(--ink);">7</div>
            </div>
          </div>
          <div style="font-weight:700; font-size:13px; margin:16px 0 8px;">Low Stock Alerts</div>
          <div style="font-size:13px; padding:8px; display:flex; justify-content:space-between;"><span>Cocoa Powder</span><span style="color:var(--red);">10 kg</span></div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 20: CONNECTED FEATURES --}}
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">Connected Platform</div>
      <h2>Everything Works Better Together.</h2>
    </div>

    <div class="conn-grid">
      <div class="conn-card">
        <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/></svg><br>Menu Management
      </div>
      <div class="conn-card">
        <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/></svg><br>Order Management
      </div>
      <div class="conn-card">
        <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/></svg><br>POS Management
      </div>
      <div class="conn-card">
        <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg><br>Inventory Management
      </div>
      <div class="conn-card">
        <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg><br>Customer Management
      </div>
      <div class="conn-card">
        <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg><br>Reports
      </div>
    </div>
  </div>
</section>

{{-- SECTION 21: FAQ --}}
<section class="alt">
  <div class="w">
    <div class="hd">
      <h2>Frequently Asked Questions</h2>
    </div>

    <div class="faq-list">
      <details class="faq-item">
        <summary>Can Geni Menu manage bakery products? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></summary>
        <p>Yes. Geni Menu can help organize bakery products, categories, pricing and availability.</p>
      </details>
      <details class="faq-item">
        <summary>Can I manage cake orders? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></summary>
        <p>Yes, cake and customer orders can be organized through the order management workflow, with custom requirements where supported.</p>
      </details>
      <details class="faq-item">
        <summary>Can I manage cake sizes and variations? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></summary>
        <p>Product variations such as size, flavour and other options can be represented where supported.</p>
      </details>
      <details class="faq-item">
        <summary>Can I use Geni Menu for counter billing? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></summary>
        <p>Yes. The POS and billing workflow is designed to support everyday bakery counter transactions.</p>
      </details>
      <details class="faq-item">
        <summary>Can I track bakery ingredients? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></summary>
        <p>Inventory management can help track ingredients, stock levels and stock movement.</p>
      </details>
      <details class="faq-item">
        <summary>Can I manage multiple bakery branches? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></summary>
        <p>Multi-branch capabilities can be used where enabled by the applicable Geni Menu plan.</p>
      </details>
      <details class="faq-item">
        <summary>Can I view bakery sales reports? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></summary>
        <p>Yes. Reports can provide visibility into sales, orders, products and other supported business metrics.</p>
      </details>
    </div>
  </div>
</section>

{{-- FINAL CTA --}}
<section class="cta-sec">
  <div class="w cta-box">
    <h2>Ready to Run Your Bakery Smarter?</h2>
    <p>Manage products, cakes, orders, billing, customers, inventory and reports from one connected platform with Geni Menu.</p>
    <div style="display:flex; gap:16px; justify-content:center; flex-wrap:wrap; margin-top:24px;">
      <a href="{{ route('contact.us') }}" class="btn p">Get Started →</a>
      <a href="{{ route('contact.us') }}" class="btn o">Book a Demo</a>
    </div>
  </div>
</section>

@endsection
