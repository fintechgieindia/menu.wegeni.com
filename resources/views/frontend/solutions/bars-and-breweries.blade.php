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
  --bg2: #f8f6f4;
  --bg3: #f1ebe5;
  --dark: #1a1512;
  --dark2: #241d19;
  --ink: #2c221c;
  --mute: #7a6a60;
  --line: rgba(135, 96, 57, 0.15);
  --line-dark: rgba(255, 255, 255, 0.1);
  --card: #ffffff;
  --shadow-sm: 0 4px 20px rgba(26, 21, 18, 0.06);
  --shadow-md: 0 16px 40px rgba(26, 21, 18, 0.12);
  --shadow-lg: 0 26px 50px rgba(26, 21, 18, 0.18);
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
  font-weight: 800;
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
  background: linear-gradient(135deg, #c89659 0%, #a87646 50%, #876039 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  display: inline-block;
  padding-right: 4px;
}
.dark-sec .sf {
  background: linear-gradient(135deg, #e6c594 0%, #c89659 50%, #a87646 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

.eb {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  font-size: 12px;
  letter-spacing: .16em;
  font-weight: 800;
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
.dark-sec .eb {
  background: rgba(255, 255, 255, 0.08);
  border-color: rgba(255, 255, 255, 0.15);
  color: #e6c594;
  box-shadow: none;
}

.w { max-width: 1240px; margin: auto; padding: 0 24px; position: relative; z-index: 1; }
section { padding: clamp(60px, 7vw, 96px) 0; background: var(--bg); position: relative; overflow: hidden; }
section.alt { background: var(--bg2); }
section.dark-sec { background: var(--dark); color: #fff; }
section.dark-sec h1, section.dark-sec h2, section.dark-sec h3, section.dark-sec h4 { color: #fff; }
section.dark-sec p { color: rgba(255, 255, 255, 0.7); }

.hd { max-width: 760px; margin: 0 auto 52px; text-align: center; }
.hd.left { text-align: left; margin: 0 0 40px; }
.hd p { margin-top: 14px; font-size: 18px; }

/* Buttons */
.btn { display: inline-flex; align-items: center; justify-content: center; gap: 8px; padding: 14px 28px; border-radius: 12px; font: 700 15px 'Plus Jakarta Sans', sans-serif; border: 1px solid var(--br); transition: .25s ease; cursor: pointer; text-decoration: none; }
.btn.p { background: linear-gradient(135deg, #876039 0%, #a87646 100%); color: #fff; box-shadow: 0 4px 16px rgba(135,96,57,0.28); }
.btn.p:hover { transform: translateY(-2px); background: linear-gradient(135deg, #6f4e2d 0%, #876039 100%); box-shadow: 0 8px 24px rgba(135,96,57,0.38); }
.btn.o { color: var(--br); background: #fff; }
.btn.o:hover { background: var(--br); color: #fff; transform: translateY(-2px); }

/* Badges */
.badge { font-size: 11px; font-weight: 800; padding: 4px 10px; border-radius: 8px; text-transform: uppercase; display: inline-block; letter-spacing: .04em; }
.badge.ready { background: #d1fae5; color: #047857; }
.badge.preparing { background: #ffedd5; color: #c2410c; }
.badge.new { background: #eff6ff; color: #1d4ed8; }
.badge.soldout { background: #fee2e2; color: #b91c1c; }
.badge.occupied { background: #fee2e2; color: #b91c1c; }
.badge.reserved { background: #ffedd5; color: #c2410c; }
.badge.available { background: #d1fae5; color: #047857; }

/* ---------------- BREADCRUMB ---------------- */
.bc { padding: 104px 0 16px; background: var(--dark); border-bottom: 1px solid rgba(255,255,255,0.1); font-size: 14px; color: rgba(255,255,255,0.6); font-weight: 600; }
.bc .w { display: flex; align-items: center; gap: 8px; flex-wrap: wrap; }
.bc a { color: rgba(255,255,255,0.6); transition: color .2s; }
.bc a:hover { color: #fff; }
.bc span.cur { color: #fff; font-weight: 700; }

/* ---------------- HERO ---------------- */
.hero { padding: 60px 0 90px; }
.hero-grid { display: grid; grid-template-columns: 1.1fr 0.9fr; gap: 48px; align-items: center; }
.hero-ctx p { font-size: 18px; margin: 20px 0 32px; max-width: 540px; }
.hero-btns { display: flex; gap: 16px; flex-wrap: wrap; }

.hero-ui { background: var(--dark2); border: 1px solid var(--line-dark); border-radius: 24px; box-shadow: var(--shadow-lg); overflow: hidden; position: relative; }
.hero-ui-hdr { background: rgba(0,0,0,0.2); padding: 16px 20px; border-bottom: 1px solid var(--line-dark); display: flex; justify-content: space-between; align-items: center; }
.hero-ui-hdr-title { font-weight: 800; font-size: 14px; color: #fff; display: flex; align-items: center; gap: 8px; }
.hero-ui-grid { padding: 20px; display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px; }

.hu-stat { padding: 16px; border-radius: 12px; border: 1px solid var(--line-dark); background: rgba(255,255,255,0.03); }
.hu-stat-lbl { font-size: 11px; font-weight: 800; color: rgba(255,255,255,0.5); text-transform: uppercase; margin-bottom: 4px; }
.hu-stat-val { font-size: 24px; font-weight: 900; color: #fff; }

/* ---------------- SECTION 4: FEATURES ---------------- */
.eco-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 24px; }
.eco-card { padding: 28px; background: #fff; border: 1px solid var(--line); border-radius: 20px; transition: .3s; }
.eco-card:hover { transform: translateY(-4px); border-color: var(--br); box-shadow: var(--shadow-md); }
.eco-card h3 { margin: 18px 0 8px; font-size: 16px; }
.eco-card p { font-size: 14px; color: var(--mute); }
.ic { width: 48px; height: 48px; border-radius: 13px; background: var(--bg2); color: var(--br); display: grid; place-items: center; border: 1px solid var(--line); transition: .3s ease; }
.eco-card:hover .ic { background: var(--br); color: #fff; border-color: var(--br); }

/* ---------------- SECTION 5: MENU ---------------- */
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

/* ---------------- SECTION 6: TABLES ---------------- */
.two-col-flow { display: grid; grid-template-columns: 1fr 1fr; gap: 48px; align-items: start; }
.table-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px; }
.t-card { background: var(--dark2); border: 1px solid var(--line-dark); border-radius: 16px; padding: 20px; }
.t-hdr { display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px; }
.t-name { font-size: 18px; font-weight: 800; color: #fff; }
.t-det { font-size: 13px; color: rgba(255,255,255,0.6); display: flex; justify-content: space-between; margin-bottom: 8px; }

/* ---------------- SECTION 7 & 8: TABLE ORDERS & POS ---------------- */
.order-ticket { background: var(--dark2); border: 1px solid var(--line-dark); border-radius: 16px; padding: 20px; position: relative; color: #fff; }
.ot-hdr { display: flex; justify-content: space-between; margin-bottom: 16px; border-bottom: 1px solid var(--line-dark); padding-bottom: 12px; }
.bill-panel { background: #fff; border: 1px solid var(--line); border-radius: 20px; box-shadow: var(--shadow-md); overflow: hidden; }
.bp-hdr { padding: 16px 20px; background: var(--bg2); border-bottom: 1px solid var(--line); font-weight: 800; font-size: 15px; display: flex; justify-content: space-between; }
.bp-body { padding: 20px; }
.bp-item { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 16px; font-size: 14px; }
.bp-item-qty { font-size: 12px; color: var(--mute); display: block; }
.bp-total { display: flex; justify-content: space-between; padding: 16px 0; border-top: 2px dashed var(--line); margin-top: 8px; font-weight: 800; font-size: 20px; color: var(--br); }
.bp-actions { display: grid; grid-template-columns: repeat(2, 1fr); gap: 8px; margin-top: 16px; }
.bp-btn { padding: 12px; border-radius: 8px; border: 1px solid var(--line); background: #fff; font-weight: 700; font-size: 13px; cursor: pointer; text-align: center; }
.bp-btn.p { background: var(--br); color: #fff; border-color: var(--br); }

/* ---------------- SECTION 9 & 10: ORDERS & KOT ---------------- */
.ot-flow { display: flex; gap: 8px; margin-top: 16px; }
.ot-step { flex: 1; text-align: center; font-size: 10px; font-weight: 800; text-transform: uppercase; padding: 8px 4px; border-radius: 6px; background: rgba(255,255,255,0.05); color: rgba(255,255,255,0.5); border: 1px solid var(--line-dark); display: flex; flex-direction: column; align-items: center; gap: 4px; }
.ot-step svg { width: 14px; height: 14px; }
.ot-step.done { background: rgba(135,96,57,0.2); color: #e6c594; border-color: rgba(135,96,57,0.5); }

/* ---------------- SECTION 11 & 12: PEAK & RESERVATIONS ---------------- */
.fest-dash { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; margin-bottom: 16px; }
.fd-card { padding: 20px; background: #fff; border: 1px solid var(--line); border-radius: 16px; text-align: center; }
.fd-val { font-size: 32px; font-weight: 900; color: var(--br); line-height: 1.2; }
.fd-lbl { font-size: 12px; font-weight: 700; color: var(--mute); text-transform: uppercase; }

.res-list { background: #fff; border: 1px solid var(--line); border-radius: 16px; overflow: hidden; }
.res-item { display: flex; justify-content: space-between; align-items: center; padding: 16px; border-bottom: 1px solid var(--line); }
.res-item:last-child { border-bottom: none; }
.res-time { font-weight: 800; color: var(--br); width: 80px; }
.res-name { font-weight: 700; flex: 1; }
.res-guests { color: var(--mute); font-size: 14px; width: 80px; text-align: right; }

/* ---------------- SECTION 13 & 14: AVAILABILITY & INVENTORY ---------------- */
.avail-list { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 12px; }
.avail-item { display: flex; justify-content: space-between; padding: 12px 16px; border-bottom: 1px solid var(--bg2); font-weight: 600; font-size: 14px; }
.avail-item:last-child { border: none; }

.inv-table { width: 100%; border-collapse: collapse; background: #fff; border-radius: 16px; overflow: hidden; border: 1px solid var(--line); }
.inv-table th { background: var(--bg2); padding: 12px 16px; text-align: left; font-size: 12px; font-weight: 800; color: var(--mute); text-transform: uppercase; border-bottom: 1px solid var(--line); }
.inv-table td { padding: 12px 16px; font-size: 14px; border-bottom: 1px solid var(--bg2); }
.inv-table tr:last-child td { border-bottom: none; }

/* ---------------- SECTION 15 & 16: REPORTS & CUSTOMERS ---------------- */
.reports-preview { background: var(--dark2); color: #fff; border: 1px solid var(--line-dark); border-radius: 24px; padding: 36px; box-shadow: var(--shadow-lg); }
.rp-stats { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; margin-bottom: 32px; }
.rp-stat-card { background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 14px; padding: 16px; }
.rp-val { font-size: 24px; font-weight: 800; color: #fff; }
.rp-lbl { font-size: 12px; font-weight: 700; color: rgba(255,255,255,0.6); }

.cust-card { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 20px; }

/* ---------------- SECTION 17 & 18: KITCHENS & BRANCHES ---------------- */
.kit-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px; }
.k-card { background: var(--dark2); border: 1px solid var(--line-dark); border-radius: 16px; padding: 20px; color: #fff; }

.mb-panel { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 24px; }
.mb-row { display: flex; justify-content: space-between; padding: 12px 0; border-bottom: 1px solid var(--line); }
.mb-row:last-child { border-bottom: none; }
.mb-val { font-weight: 800; color: var(--br); }

/* ---------------- SECTION 19: BENEFITS ---------------- */
.benefits-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; }
.b-card { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 24px; }

/* ---------------- SECTION 20 & 21: JOURNEY & MOBILE ---------------- */
.journey-flow { display: flex; justify-content: space-between; align-items: center; min-width: 800px; gap: 10px; background: #fff; padding: 32px; border-radius: 24px; border: 1px solid var(--line); overflow-x: auto; margin-bottom: 40px; }
.jf-node { text-align: center; width: 75px; }
.jf-icon { width: 48px; height: 48px; border-radius: 14px; background: var(--bg2); color: var(--br); border: 1px solid var(--line); display: grid; place-items: center; margin: 0 auto 10px; }
.jf-arrow { color: var(--mute); opacity: 0.4; }

.mob-preview { max-width: 300px; margin: 0 auto; background: #000; border: 4px solid #333; border-radius: 36px; padding: 10px; box-shadow: var(--shadow-lg); }
.mob-inner { background: var(--dark2); color: #fff; border-radius: 26px; height: 500px; overflow: hidden; padding: 16px; position: relative; }

/* ---------------- SECTION 22: IDEAL FOR ---------------- */
.industry-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; }
.ind-card { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 16px; display: flex; align-items: center; gap: 12px; font-weight: 700; font-size: 14px; }

/* ---------------- SECTION 23: CONNECTED ---------------- */
.conn-grid { display: grid; grid-template-columns: repeat(9, 1fr); gap: 12px; text-align: center; }
.conn-card { background: #fff; border: 1px solid var(--line); border-radius: 12px; padding: 16px 8px; font-size: 11px; font-weight: 700; }
.conn-card svg { margin-bottom: 8px; color: var(--br); }

/* ---------------- FAQ ---------------- */
.faq-list { max-width: 840px; margin: auto; display: flex; flex-direction: column; gap: 16px; }
.faq-item { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 20px 24px; cursor: pointer; transition: .2s; }
.faq-item summary { font-weight: 700; font-size: 16px; display: flex; justify-content: space-between; align-items: center; list-style: none; }
.faq-item summary::-webkit-details-marker { display: none; }
.faq-item p { margin-top: 12px; font-size: 15px; color: var(--mute); }

/* ---------------- CTA ---------------- */
.cta-sec { padding: 120px 0; position: relative; }
.cta-bg { position: absolute; inset: 0; background: url('https://images.unsplash.com/photo-1514933651103-005eec06c04b?q=80&w=1920') center/cover; }
.cta-overlay { position: absolute; inset: 0; background: linear-gradient(180deg, rgba(26,21,18,0.9) 0%, rgba(26,21,18,0.95) 100%); }
.cta-box { max-width: 760px; margin: auto; position: relative; z-index: 2; text-align: center; }
.cta-box h2 { color: #fff; margin-bottom: 16px; }

/* Responsive */
@media (max-width: 1024px) {
  .hero-grid, .two-col-flow { grid-template-columns: 1fr; gap: 48px; }
  .eco-grid { grid-template-columns: repeat(2, 1fr); }
  .fest-dash, .benefits-grid, .kit-grid { grid-template-columns: repeat(2, 1fr); }
  .industry-grid, .rp-stats { grid-template-columns: repeat(2, 1fr); }
  .conn-grid { grid-template-columns: repeat(3, 1fr); }
}

@media (max-width: 768px) {
  .bc { padding: 85px 0 14px; }
  .w { padding: 0 16px; }
}

@media (max-width: 640px) {
  .eco-grid, .benefits-grid, .industry-grid, .rp-stats, .kit-grid { grid-template-columns: 1fr; }
  .menu-grid, .table-grid { grid-template-columns: 1fr; }
  .bp-actions { grid-template-columns: 1fr; }
  .conn-grid { grid-template-columns: repeat(2, 1fr); }
  .inv-table { display: block; overflow-x: auto; white-space: nowrap; }
  .fest-dash { grid-template-columns: 1fr; }
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
    <span class="cur">Bars & Breweries</span>
  </div>
</div>

{{-- HERO --}}
<section class="hero dark-sec">
  <div class="w hero-grid">
    <div class="hero-ctx">
      <div class="eb">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/></svg>
        BAR & BREWERY SOLUTION
      </div>
      <h1>Run Every Table. <span class="sf">Every Order.</span> Every Shift.</h1>
      <p>Manage menus, table service, orders, billing, payments, inventory and daily operations from one connected platform built for modern bars, pubs and breweries.</p>
      <div class="hero-btns">
        <a href="{{ route('contact.us') }}" class="btn p">Get Started →</a>
        <a href="{{ route('contact.us') }}" class="btn o" style="background:transparent; border-color:rgba(255,255,255,0.2); color:#fff;">Book a Demo</a>
      </div>
    </div>

    <div class="hero-ui">
      <div class="hero-ui-hdr">
        <div class="hero-ui-hdr-title">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#e6c594" stroke-width="2.5"><rect x="3" y="3" width="18" height="18" rx="2"/></svg>
          Geni Menu — Bar Dashboard
        </div>
        <span class="badge ready" style="background:rgba(16,185,129,0.2); color:#34d399;">Live</span>
      </div>
      <div class="hero-ui-grid">
        <div class="hu-stat">
          <div class="hu-stat-lbl">Today's Sales</div>
          <div class="hu-stat-val">₹1,84,650</div>
        </div>
        <div class="hu-stat">
          <div class="hu-stat-lbl">Active Tables</div>
          <div class="hu-stat-val">18</div>
        </div>
        <div class="hu-stat">
          <div class="hu-stat-lbl">Open Orders</div>
          <div class="hu-stat-val">24</div>
        </div>
        <div class="hu-stat">
          <div class="hu-stat-lbl">Kitchen Orders</div>
          <div class="hu-stat-val">11</div>
        </div>
        <div class="hu-stat">
          <div class="hu-stat-lbl">Payments</div>
          <div class="hu-stat-val" style="font-size:18px;">₹1,62,400</div>
        </div>
        <div class="hu-stat">
          <div class="hu-stat-lbl">Low Stock</div>
          <div class="hu-stat-val" style="font-size:18px; color:#ef4444;">6 Items</div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 4: FEATURES --}}
<section class="alt">
  <div class="w">
    <div class="hd">
      <div class="eb">Built For Bars & Breweries</div>
      <h2>Everything Your Bar Needs. Connected in One Place.</h2>
      <p>From table orders and food service to billing, inventory and business reports, Geni Menu helps bring your bar operations together in one connected platform.</p>
    </div>

    <div class="eco-grid">
      <div class="eco-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg></div>
        <h3>1. Menu Management</h3>
        <p>Organize food, beverages, snacks, desserts and other menu items.</p>
      </div>
      <div class="eco-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/></svg></div>
        <h3>2. Table Management</h3>
        <p>Know table availability, occupancy and current service status.</p>
      </div>
      <div class="eco-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/></svg></div>
        <h3>3. Order Management</h3>
        <p>Track orders from creation through preparation and service.</p>
      </div>
      <div class="eco-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/></svg></div>
        <h3>4. POS & Billing</h3>
        <p>Manage dine-in billing and everyday transactions.</p>
      </div>
      <div class="eco-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg></div>
        <h3>5. KOT Management</h3>
        <p>Send food orders to the appropriate kitchen workflow where supported.</p>
      </div>
      <div class="eco-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="4" width="22" height="16" rx="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg></div>
        <h3>6. Payments</h3>
        <p>Track payment activity across supported payment methods.</p>
      </div>
      <div class="eco-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg></div>
        <h3>7. Inventory</h3>
        <p>Monitor ingredients, supplies and stock movement.</p>
      </div>
      <div class="eco-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></div>
        <h3>8. Customers</h3>
        <p>Maintain customer details and order history.</p>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 5: MENU --}}
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">Menu Management</div>
      <h2>One Menu. Every Part of the Experience.</h2>
      <p>Organize food, bar snacks, non-alcoholic beverages and other items into a clean digital menu structure.</p>
    </div>

    <div class="menu-tabs">
      <div class="menu-tab act">Bar Snacks</div>
      <div class="menu-tab">Main Course</div>
      <div class="menu-tab">Beverages</div>
      <div class="menu-tab">Desserts</div>
    </div>

    <div class="menu-grid">
      <div class="pc-card">
        <img class="pc-img" src="https://images.unsplash.com/photo-1541592106381-b31e9677c0e5?w=200&q=80" alt="Fries">
        <div class="pc-ctx">
          <h4>Loaded Fries</h4>
          <p>Crispy fries topped with melted cheese, jalapeños and signature sauce.</p>
          <div class="pc-ft">
            <span style="font-weight:800; color:var(--br);">₹280</span>
            <span class="badge ready">Available</span>
          </div>
        </div>
      </div>
      <div class="pc-card">
        <img class="pc-img" src="https://images.unsplash.com/photo-1513456852971-30c0b8199d4d?w=200&q=80" alt="Nachos">
        <div class="pc-ctx">
          <h4>Classic Nachos</h4>
          <p>Tortilla chips with salsa, sour cream, guacamole and cheese.</p>
          <div class="pc-ft">
            <span style="font-weight:800; color:var(--br);">₹320</span>
            <span class="badge ready">Available</span>
          </div>
        </div>
      </div>
      <div class="pc-card">
        <img class="pc-img" src="https://images.unsplash.com/photo-1564834724105-918b73d1b9e0?w=200&q=80" alt="Wings">
        <div class="pc-ctx">
          <h4>Spicy BBQ Wings</h4>
          <p>Chicken wings tossed in our house-made spicy BBQ sauce.</p>
          <div class="pc-ft">
            <span style="font-weight:800; color:var(--br);">₹380</span>
            <span class="badge ready">Available</span>
          </div>
        </div>
      </div>
      <div class="pc-card">
        <img class="pc-img" src="https://images.unsplash.com/photo-1555507036-ab1f40ce88cb?w=200&q=80" alt="Mocktail">
        <div class="pc-ctx">
          <h4>Virgin Mojito</h4>
          <p>Classic refreshing mocktail with mint, lime and soda.</p>
          <div class="pc-ft">
            <span style="font-weight:800; color:var(--br);">₹220</span>
            <span class="badge ready">Available</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 6 & 7: TABLES & ORDERS --}}
<section class="dark-sec">
  <div class="w two-col-flow">
    {{-- Tables --}}
    <div>
      <div class="eb">Table Management</div>
      <h3 style="font-size:28px; margin-bottom:12px;">Know Every Table. Keep Service Moving.</h3>
      <p style="margin-bottom:24px;">Track table availability, occupancy and service status across your floor plan.</p>
      
      <div class="table-grid">
        <div class="t-card" style="border-color:rgba(185,28,28,0.5);">
          <div class="t-hdr"><span class="t-name">Table 01</span><span class="badge occupied">Occupied</span></div>
          <div class="t-det"><span>4 Seats</span><span>₹1,840</span></div>
        </div>
        <div class="t-card" style="border-color:rgba(16,185,129,0.5);">
          <div class="t-hdr"><span class="t-name">Table 02</span><span class="badge available">Available</span></div>
          <div class="t-det"><span>2 Seats</span><span>--</span></div>
        </div>
        <div class="t-card" style="border-color:rgba(245,158,11,0.5);">
          <div class="t-hdr"><span class="t-name">Table 03</span><span class="badge reserved">Reserved</span></div>
          <div class="t-det"><span>6 Seats</span><span>7:30 PM</span></div>
        </div>
        <div class="t-card" style="border-color:rgba(185,28,28,0.5);">
          <div class="t-hdr"><span class="t-name">Table 04</span><span class="badge occupied">Occupied</span></div>
          <div class="t-det"><span>4 Seats</span><span>₹3,420</span></div>
        </div>
      </div>
    </div>

    {{-- Orders --}}
    <div>
      <div class="eb">Table Orders</div>
      <h3 style="font-size:28px; margin-bottom:12px;">Every Table. Every Order. Clearly Connected.</h3>
      <p style="margin-bottom:24px;">Connect orders to specific tables so your staff and kitchen stay perfectly synced.</p>

      <div class="order-ticket">
        <div class="ot-hdr">
          <span style="font-weight:900; font-size:16px;">TABLE 08</span>
          <span class="badge preparing">Preparing</span>
        </div>
        
        <div style="font-size:13px; color:rgba(255,255,255,0.6); margin-bottom:12px;">Guests: 4</div>
        <ul style="font-size:14px; margin-bottom:16px;">
          <li style="display:flex; justify-content:space-between; margin-bottom:6px;"><span>2 × Grilled Chicken</span></li>
          <li style="display:flex; justify-content:space-between; margin-bottom:6px;"><span>1 × Loaded Nachos</span></li>
          <li style="display:flex; justify-content:space-between; margin-bottom:6px;"><span>2 × Mocktail</span></li>
          <li style="display:flex; justify-content:space-between; margin-bottom:6px;"><span>1 × Dessert</span></li>
        </ul>
        
        <div style="font-size:11px; font-weight:700; color:rgba(255,255,255,0.4); text-align:center; margin-top:20px;">
          Table → Order → Kitchen → Billing
        </div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 8 & 9: POS & WORKFLOW --}}
<section class="alt">
  <div class="w two-col-flow">
    {{-- Billing --}}
    <div>
      <div class="eb">POS & Billing</div>
      <h3 style="font-size:28px; margin-bottom:12px;">Fast Billing for Busy Service Hours.</h3>
      <p style="margin-bottom:24px;">Manage dine-in billing easily, with table selection, product additions and tax calculations.</p>

      <div class="bill-panel">
        <div class="bp-hdr"><span>TABLE 08</span><span>Bill #4092</span></div>
        <div class="bp-body">
          <div class="bp-item">
            <div>Grilled Chicken<span class="bp-item-qty">× 2</span></div>
            <strong style="color:var(--ink);">₹760</strong>
          </div>
          <div class="bp-item">
            <div>Loaded Nachos<span class="bp-item-qty">× 1</span></div>
            <strong style="color:var(--ink);">₹320</strong>
          </div>
          <div class="bp-item">
            <div>Mocktail<span class="bp-item-qty">× 2</span></div>
            <strong style="color:var(--ink);">₹440</strong>
          </div>
          <div class="bp-item">
            <div>Dessert<span class="bp-item-qty">× 1</span></div>
            <strong style="color:var(--ink);">₹320</strong>
          </div>
          
          <div style="border-top:1px solid var(--line); margin-top:12px; padding-top:12px; font-size:13px; color:var(--mute);">
            <div style="display:flex; justify-content:space-between; margin-bottom:4px;"><span>Subtotal</span><span>₹1,840</span></div>
            <div style="display:flex; justify-content:space-between;"><span>Taxes & Charges</span><span>₹331</span></div>
          </div>

          <div class="bp-total">
            <span>TOTAL</span>
            <span>₹2,171</span>
          </div>
          <div style="font-size:11px; color:var(--mute); text-align:center; margin-bottom:12px;">* Illustrative data. Taxes depend on local configuration.</div>

          <div class="bp-actions">
            <div class="bp-btn">Split Bill</div>
            <div class="bp-btn p">Settle Payment</div>
          </div>
        </div>
      </div>
    </div>

    {{-- Orders Workflow --}}
    <div>
      <div class="eb">Order Management</div>
      <h3 style="font-size:28px; margin-bottom:12px;">Every Order. Clear From Start to Finish.</h3>
      <p style="margin-bottom:24px;">Track orders from creation through preparation, service and billing.</p>

      <div class="order-ticket" style="background:#fff; color:var(--ink); border-color:var(--line);">
        <div class="ot-hdr" style="border-color:var(--line);">
          <div>
            <span style="font-weight:900; font-size:16px; display:block;">ORDER #5082</span>
            <span style="font-size:13px; color:var(--mute);">Table 08</span>
          </div>
          <span class="badge preparing">Preparing</span>
        </div>
        
        <div style="font-size:14px; font-weight:700; margin-bottom:16px;">4 Items</div>
        
        <div class="ot-flow">
          <div class="ot-step done" style="background:var(--br-light); color:var(--br); border-color:var(--br);"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/></svg> Order</div>
          <div class="ot-step done" style="background:var(--br-light); color:var(--br); border-color:var(--br);"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg> KOT</div>
          <div class="ot-step" style="background:var(--bg2); color:var(--mute); border-color:var(--line);"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/></svg> Ready</div>
          <div class="ot-step" style="background:var(--bg2); color:var(--mute); border-color:var(--line);"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12l5 5l10 -10"/></svg> Serve</div>
          <div class="ot-step" style="background:var(--bg2); color:var(--mute); border-color:var(--line);"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/></svg> Bill</div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 10, 11 & 12: KOT, PEAK, RESERVATIONS --}}
<section>
  <div class="w">
    <div class="hd">
      <h2>Stay in Control When the Floor Gets Busy.</h2>
      <p>Keep your front-of-house staff and kitchen in sync, even during peak service hours.</p>
    </div>

    <div class="fest-dash">
      <div class="fd-card">
        <div class="fd-val">18</div>
        <div class="fd-lbl">Occupied Tables</div>
      </div>
      <div class="fd-card">
        <div class="fd-val">24</div>
        <div class="fd-lbl">Open Orders</div>
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
        <div class="fd-val">9</div>
        <div class="fd-lbl">Reservations</div>
      </div>
      <div class="fd-card">
        <div class="fd-val" style="color:var(--green);">86</div>
        <div class="fd-lbl">Completed Bills</div>
      </div>
    </div>

    <div style="display:grid; grid-template-columns:1fr 1fr; gap:24px; margin-top:40px;">
      {{-- KOT --}}
      <div class="order-ticket" style="background:var(--bg2); border-color:var(--line); color:var(--ink);">
        <div class="eb">KOT Management</div>
        <h3 style="margin-bottom:16px;">Keep the Kitchen in Sync.</h3>
        <div style="background:#fff; padding:16px; border-radius:12px; border:1px solid var(--line);">
          <div style="display:flex; justify-content:space-between; border-bottom:1px dashed var(--line); padding-bottom:8px; margin-bottom:12px;">
            <span style="font-weight:800;">KOT #3098</span>
            <span style="font-weight:800; color:var(--br);">TABLE 08</span>
          </div>
          <ul style="font-size:14px; margin-bottom:12px;">
            <li style="display:flex; justify-content:space-between; margin-bottom:4px;"><span>2 × Grilled Chicken</span></li>
            <li style="display:flex; justify-content:space-between; margin-bottom:4px;"><span>1 × Loaded Nachos</span></li>
            <li style="display:flex; justify-content:space-between; margin-bottom:4px;"><span>1 × French Fries</span></li>
          </ul>
          <span class="badge preparing">Preparing</span>
        </div>
      </div>

      {{-- Reservations --}}
      <div class="res-list">
        <div style="padding:20px; background:var(--dark); color:#fff;">
          <div class="eb" style="background:rgba(255,255,255,0.1); border-color:rgba(255,255,255,0.2); color:#e6c594; box-shadow:none;">Reservation Management</div>
          <h3 style="margin:0; color:#fff;">Plan the Evening Before Guests Arrive.</h3>
        </div>
        <div class="res-item">
          <div class="res-time">7:00 PM</div>
          <div class="res-name">Arun</div>
          <div class="res-guests">4 Guests</div>
        </div>
        <div class="res-item">
          <div class="res-time">7:30 PM</div>
          <div class="res-name">Priya</div>
          <div class="res-guests">6 Guests</div>
        </div>
        <div class="res-item">
          <div class="res-time">8:00 PM</div>
          <div class="res-name">Karthik</div>
          <div class="res-guests">2 Guests</div>
        </div>
        <div class="res-item">
          <div class="res-time">8:30 PM</div>
          <div class="res-name">Meena</div>
          <div class="res-guests">8 Guests</div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 13 & 14: AVAILABILITY & INVENTORY --}}
<section class="alt">
  <div class="w two-col-flow">
    {{-- Availability --}}
    <div>
      <div class="eb">Menu Availability</div>
      <h3 style="font-size:28px; margin-bottom:12px;">Keep Your Menu Current Throughout the Day.</h3>
      <p style="margin-bottom:24px;">Update product availability to keep your customer-facing menu accurate where supported.</p>
      
      <div class="avail-list">
        <div class="avail-item"><span>Grilled Chicken</span><span class="badge ready">Available</span></div>
        <div class="avail-item"><span>Loaded Nachos</span><span class="badge ready">Available</span></div>
        <div class="avail-item"><span>Classic Burger</span><span class="badge ready">Available</span></div>
        <div class="avail-item" style="background:#fef2f2;"><span>Cheesecake</span><span class="badge soldout">Sold Out</span></div>
        <div class="avail-item"><span>Fresh Lime Soda</span><span class="badge ready">Available</span></div>
      </div>
    </div>

    {{-- Inventory --}}
    <div>
      <div class="eb">Inventory Management</div>
      <h3 style="font-size:28px; margin-bottom:12px;">Know What You Have. Know What Needs Attention.</h3>
      <p style="margin-bottom:24px;">Monitor food ingredients, kitchen supplies and packaging inventory.</p>

      <table class="inv-table">
        <thead>
          <tr>
            <th>Item</th>
            <th>Stock</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <tr><td>Chicken</td><td>24 kg</td><td><span class="badge ready">In Stock</span></td></tr>
          <tr><td>Cheese</td><td>12 kg</td><td><span class="badge ready">In Stock</span></td></tr>
          <tr><td>Potatoes</td><td>35 kg</td><td><span class="badge ready">In Stock</span></td></tr>
          <tr><td>Fresh Vegetables</td><td>18 kg</td><td><span class="badge ready">In Stock</span></td></tr>
          <tr><td>Cooking Oil</td><td>20 L</td><td><span class="badge ready">In Stock</span></td></tr>
          <tr><td>Sauces</td><td>8 L</td><td><span class="badge low">Low</span></td></tr>
          <tr><td>Food Packaging</td><td>400 pcs</td><td><span class="badge ready">In Stock</span></td></tr>
        </tbody>
      </table>
    </div>
  </div>
</section>

{{-- SECTION 15 & 16: REPORTS & CUSTOMERS --}}
<section class="dark-sec">
  <div class="w">
    <div class="hd">
      <div class="eb">Business Reports</div>
      <h2>See How Your Business Is Performing.</h2>
      <p>Turn everyday sales, table and order data into clear business insights.</p>
    </div>

    <div class="reports-preview">
      <div class="rp-stats">
        <div class="rp-stat-card">
          <div class="rp-lbl">TODAY'S SALES</div>
          <div class="rp-val">₹1,84,650</div>
        </div>
        <div class="rp-stat-card">
          <div class="rp-lbl">TOTAL ORDERS</div>
          <div class="rp-val">126</div>
        </div>
        <div class="rp-stat-card">
          <div class="rp-lbl">AVG ORDER VALUE</div>
          <div class="rp-val">₹1,465</div>
        </div>
        <div class="rp-stat-card">
          <div class="rp-lbl">OCCUPIED TABLES</div>
          <div class="rp-val">18</div>
        </div>
      </div>
      <div style="height:140px; display:flex; align-items:flex-end; gap:16px; border-bottom:1px solid rgba(255,255,255,0.2);">
        <div style="flex:1; background:#e6c594; height:90%; border-radius:4px 4px 0 0; position:relative;"><span style="position:absolute; bottom:-24px; left:0; right:0; text-align:center; font-size:10px; color:rgba(255,255,255,0.6);">Starters</span></div>
        <div style="flex:1; background:#e6c594; height:100%; border-radius:4px 4px 0 0; position:relative;"><span style="position:absolute; bottom:-24px; left:0; right:0; text-align:center; font-size:10px; color:rgba(255,255,255,0.6);">Mains</span></div>
        <div style="flex:1; background:#e6c594; height:80%; border-radius:4px 4px 0 0; position:relative;"><span style="position:absolute; bottom:-24px; left:0; right:0; text-align:center; font-size:10px; color:rgba(255,255,255,0.6);">Snacks</span></div>
        <div style="flex:1; background:#e6c594; height:60%; border-radius:4px 4px 0 0; position:relative;"><span style="position:absolute; bottom:-24px; left:0; right:0; text-align:center; font-size:10px; color:rgba(255,255,255,0.6);">Beverages</span></div>
        <div style="flex:1; background:#e6c594; height:40%; border-radius:4px 4px 0 0; position:relative;"><span style="position:absolute; bottom:-24px; left:0; right:0; text-align:center; font-size:10px; color:rgba(255,255,255,0.6);">Desserts</span></div>
      </div>
      <div style="text-align:center; margin-top:32px; font-size:11px; color:rgba(255,255,255,0.4);">* Illustrative demo data shown for category performance.</div>
    </div>

    <div style="margin-top:64px; max-width:600px; margin-left:auto; margin-right:auto;">
      <div class="hd" style="margin-bottom:24px;">
        <div class="eb">Customer Management</div>
        <h2>Know Your Guests. Build Better Experiences.</h2>
      </div>
      <div class="cust-card" style="background:var(--dark2); border-color:var(--line-dark);">
        <div style="display:flex; justify-content:space-between; border-bottom:1px solid var(--line-dark); padding-bottom:12px; margin-bottom:12px;">
          <div>
            <strong style="display:block; font-size:18px; color:#fff;">Arun Kumar</strong>
          </div>
          <div style="text-align:right;">
            <span style="font-size:11px; font-weight:800; color:rgba(255,255,255,0.5);">TOTAL ORDERS</span>
            <strong style="display:block; font-size:18px; color:#e6c594;">18</strong>
          </div>
        </div>
        <div style="font-size:12px; font-weight:800; color:rgba(255,255,255,0.5); margin-bottom:8px; text-transform:uppercase;">Recent Visits:</div>
        <ul style="font-size:13px; color:rgba(255,255,255,0.8);">
          <li style="display:flex; justify-content:space-between; margin-bottom:4px;"><span>Dinner — Table 08</span></li>
          <li style="display:flex; justify-content:space-between; margin-bottom:4px;"><span>Lunch — Table 12</span></li>
          <li style="display:flex; justify-content:space-between; margin-bottom:4px;"><span>Dinner — Table 05</span></li>
        </ul>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 17 & 18: KITCHENS & BRANCHES --}}
<section class="alt">
  <div class="w two-col-flow">
    {{-- Kitchens --}}
    <div>
      <div class="eb">Multiple Kitchens</div>
      <h3 style="font-size:28px; margin-bottom:12px;">Coordinate Multiple Kitchen Stations.</h3>
      <p style="margin-bottom:24px;">Route orders to the appropriate preparation station where supported.</p>
      
      <div class="kit-grid">
        <div class="k-card">
          <h4 style="font-size:14px; margin-bottom:8px; color:#e6c594;">Main Kitchen</h4>
          <span style="font-size:20px; font-weight:800;">12</span> <span style="font-size:13px; color:rgba(255,255,255,0.6);">Orders</span>
        </div>
        <div class="k-card">
          <h4 style="font-size:14px; margin-bottom:8px; color:#e6c594;">Grill Station</h4>
          <span style="font-size:20px; font-weight:800;">7</span> <span style="font-size:13px; color:rgba(255,255,255,0.6);">Orders</span>
        </div>
        <div class="k-card">
          <h4 style="font-size:14px; margin-bottom:8px; color:#e6c594;">Snacks Station</h4>
          <span style="font-size:20px; font-weight:800;">8</span> <span style="font-size:13px; color:rgba(255,255,255,0.6);">Orders</span>
        </div>
        <div class="k-card">
          <h4 style="font-size:14px; margin-bottom:8px; color:#e6c594;">Dessert Station</h4>
          <span style="font-size:20px; font-weight:800;">4</span> <span style="font-size:13px; color:rgba(255,255,255,0.6);">Orders</span>
        </div>
      </div>
      <div style="font-size:12px; font-weight:700; color:var(--mute); text-align:center; margin-top:16px;">Order → Station → Preparation → Ready</div>
    </div>

    {{-- Branches --}}
    <div>
      <div class="eb">Multi-Branch Management</div>
      <h3 style="font-size:28px; margin-bottom:12px;">One View Across Every Location.</h3>
      <p style="margin-bottom:24px;">Monitor branch sales, tables, orders and inventory where multi-branch functionality is enabled.</p>

      <div class="mb-panel">
        <div style="font-weight:800; font-size:14px; color:var(--mute); text-transform:uppercase; margin-bottom:12px;">All Locations</div>
        <div class="mb-row"><span>Tiruchengode</span><span class="mb-val">₹1,84,650</span></div>
        <div class="mb-row"><span>Namakkal</span><span class="mb-val">₹1,42,300</span></div>
        <div class="mb-row"><span>Salem</span><span class="mb-val">₹2,08,450</span></div>
        <div style="font-size:11px; color:var(--mute); text-align:center; margin-top:16px;">* Multi-branch functionality depends on applicable plan.</div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 19: BENEFITS --}}
<section>
  <div class="w">
    <div class="hd">
      <h2>Built Around the Way Hospitality Businesses Operate.</h2>
    </div>

    <div class="benefits-grid">
      <div class="b-card">
        <h3 style="margin-bottom:8px; font-size:16px;">01. Table-Centric Operations</h3>
        <p style="font-size:14px;">Connect tables, orders and billing in one workflow.</p>
      </div>
      <div class="b-card">
        <h3 style="margin-bottom:8px; font-size:16px;">02. Faster POS & Billing</h3>
        <p style="font-size:14px;">Keep counter and table billing organized.</p>
      </div>
      <div class="b-card">
        <h3 style="margin-bottom:8px; font-size:16px;">03. Kitchen Coordination</h3>
        <p style="font-size:14px;">Connect front-of-house orders with kitchen workflows where supported.</p>
      </div>
      <div class="b-card">
        <h3 style="margin-bottom:8px; font-size:16px;">04. Real-Time Order Visibility</h3>
        <p style="font-size:14px;">Know what is new, preparing, ready or completed.</p>
      </div>
      <div class="b-card">
        <h3 style="margin-bottom:8px; font-size:16px;">05. Inventory Visibility</h3>
        <p style="font-size:14px;">Monitor food ingredients and operational supplies.</p>
      </div>
      <div class="b-card">
        <h3 style="margin-bottom:8px; font-size:16px;">06. Business Insights</h3>
        <p style="font-size:14px;">Understand sales, orders, tables and overall performance.</p>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 20 & 21: JOURNEY & MOBILE --}}
<section class="alt">
  <div class="w">
    <div class="hd">
      <div class="eb">Customer Experience</div>
      <h2>A Better Experience From Arrival to Checkout.</h2>
    </div>

    <div class="journey-flow">
      <div class="jf-node"><div class="jf-icon"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg></div><div style="font-size:11px; font-weight:700;">Discover<br>Menu</div></div>
      <div class="jf-arrow">→</div>
      <div class="jf-node"><div class="jf-icon"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg></div><div style="font-size:11px; font-weight:700;">Reserve /<br>Arrive</div></div>
      <div class="jf-arrow">→</div>
      <div class="jf-node"><div class="jf-icon"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/></svg></div><div style="font-size:11px; font-weight:700;">Get<br>Seated</div></div>
      <div class="jf-arrow">→</div>
      <div class="jf-node"><div class="jf-icon"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></div><div style="font-size:11px; font-weight:700;">Place<br>Order</div></div>
      <div class="jf-arrow">→</div>
      <div class="jf-node"><div class="jf-icon"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg></div><div style="font-size:11px; font-weight:700;">Food<br>Prep</div></div>
      <div class="jf-arrow">→</div>
      <div class="jf-node"><div class="jf-icon"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12l5 5l10 -10"/></svg></div><div style="font-size:11px; font-weight:700;">Serve</div></div>
      <div class="jf-arrow">→</div>
      <div class="jf-node"><div class="jf-icon"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/></svg></div><div style="font-size:11px; font-weight:700;">Bill &<br>Payment</div></div>
    </div>

    <div class="hd" style="margin-top:80px;">
      <div class="eb">Mobile Management</div>
      <h2>Keep Your Business Within Reach.</h2>
      <p>Monitor your floor activity and key metrics on the go.</p>
    </div>

    <div class="mob-preview">
      <div class="mob-inner">
        <div style="font-weight:800; font-size:16px; margin-bottom:16px; color:#e6c594;">Bar Dashboard</div>
        <div style="background:rgba(255,255,255,0.05); border:1px solid var(--line-dark); padding:12px; border-radius:12px; margin-bottom:12px;">
          <div style="font-size:11px; font-weight:700; color:rgba(255,255,255,0.5);">TODAY'S SALES</div>
          <div style="font-size:20px; font-weight:800; color:#fff;">₹1,84,650</div>
        </div>
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px; margin-bottom:16px;">
          <div style="background:rgba(255,255,255,0.05); border:1px solid var(--line-dark); padding:12px; border-radius:12px;">
            <div style="font-size:11px; font-weight:700; color:rgba(255,255,255,0.5);">ACTIVE TABLES</div>
            <div style="font-size:20px; font-weight:800; color:#fff;">18</div>
          </div>
          <div style="background:rgba(255,255,255,0.05); border:1px solid var(--line-dark); padding:12px; border-radius:12px;">
            <div style="font-size:11px; font-weight:700; color:rgba(255,255,255,0.5);">OPEN ORDERS</div>
            <div style="font-size:20px; font-weight:800; color:#fff;">24</div>
          </div>
          <div style="background:rgba(255,255,255,0.05); border:1px solid var(--line-dark); padding:12px; border-radius:12px;">
            <div style="font-size:11px; font-weight:700; color:rgba(255,255,255,0.5);">RESERVATIONS</div>
            <div style="font-size:20px; font-weight:800; color:#fff;">9</div>
          </div>
          <div style="background:rgba(255,255,255,0.05); border:1px solid var(--line-dark); padding:12px; border-radius:12px;">
            <div style="font-size:11px; font-weight:700; color:rgba(255,255,255,0.5);">LOW STOCK</div>
            <div style="font-size:20px; font-weight:800; color:#ef4444;">6</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 22: IDEAL FOR --}}
<section>
  <div class="w">
    <div class="hd">
      <h2>Built for Modern Hospitality Businesses.</h2>
    </div>

    <div class="industry-grid">
      <div class="ind-card"><span>Bars</span></div>
      <div class="ind-card"><span>Pubs</span></div>
      <div class="ind-card"><span>Breweries</span></div>
      <div class="ind-card"><span>Brewpubs</span></div>
      <div class="ind-card"><span>Restobars</span></div>
      <div class="ind-card"><span>Lounge Bars</span></div>
      <div class="ind-card"><span>Sports Bars</span></div>
      <div class="ind-card"><span>Gastro Pubs</span></div>
      <div class="ind-card"><span>Rooftop Dining & Bars</span></div>
      <div class="ind-card"><span>Hotel Bars</span></div>
      <div class="ind-card" style="grid-column:span 2;"><span>Multi-Outlet Hospitality Businesses</span></div>
    </div>
  </div>
</section>

{{-- SECTION 23: CONNECTED FEATURES --}}
<section class="alt">
  <div class="w">
    <div class="hd">
      <div class="eb">Connected Platform</div>
      <h2>Everything Works Better Together.</h2>
    </div>

    <div class="conn-grid">
      <div class="conn-card"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/></svg><br>Menu</div>
      <div class="conn-card"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg><br>Reservations</div>
      <div class="conn-card"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/></svg><br>Tables</div>
      <div class="conn-card"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/></svg><br>Orders</div>
      <div class="conn-card"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg><br>KOT</div>
      <div class="conn-card"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/></svg><br>POS</div>
      <div class="conn-card"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="4" width="22" height="16" rx="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg><br>Payments</div>
      <div class="conn-card"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg><br>Inventory</div>
      <div class="conn-card"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg><br>Reports</div>
    </div>
  </div>
</section>

{{-- SECTION 24: FAQ --}}
<section>
  <div class="w">
    <div class="hd">
      <h2>Frequently Asked Questions</h2>
    </div>

    <div class="faq-list">
      <details class="faq-item">
        <summary>Can Geni Menu manage bar and pub menus? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></summary>
        <p>Yes. Geni Menu can help organize food, beverage and other supported menu items with pricing and availability.</p>
      </details>
      <details class="faq-item">
        <summary>Can I manage tables? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></summary>
        <p>Yes. Table management can help track table availability, occupancy and service status.</p>
      </details>
      <details class="faq-item">
        <summary>Can I connect orders to tables? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></summary>
        <p>Yes. Table-linked order management can connect customer orders with specific tables where supported.</p>
      </details>
      <details class="faq-item">
        <summary>Can I manage restaurant reservations? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></summary>
        <p>Yes. Reservation management can help organize guest bookings, party sizes and table allocation.</p>
      </details>
      <details class="faq-item">
        <summary>Can I manage kitchen orders? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></summary>
        <p>Yes. Order and KOT workflows can connect front-of-house orders with kitchen operations where supported.</p>
      </details>
      <details class="faq-item">
        <summary>Can I manage billing? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></summary>
        <p>Yes. POS and billing functionality supports restaurant transactions and payments.</p>
      </details>
      <details class="faq-item">
        <summary>Can I manage inventory? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></summary>
        <p>Yes. Inventory management can help track food ingredients, supplies and stock movement.</p>
      </details>
      <details class="faq-item">
        <summary>Can I manage multiple branches? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></summary>
        <p>Multi-branch management is available where supported by the applicable Geni Menu plan.</p>
      </details>
      <details class="faq-item">
        <summary>Can I view business reports? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></summary>
        <p>Yes. Supported reports provide visibility into sales, orders, tables and other business metrics.</p>
      </details>
    </div>
  </div>
</section>

{{-- FINAL CTA --}}
<section class="cta-sec">
  <div class="cta-bg"></div>
  <div class="cta-overlay"></div>
  <div class="w cta-box">
    <h2>Ready to Run Your Hospitality Business Smarter?</h2>
    <p style="color:rgba(255,255,255,0.7); max-width:600px; margin:0 auto;">Manage menus, tables, reservations, orders, billing, inventory and business insights from one connected platform with Geni Menu.</p>
    <div style="display:flex; gap:16px; justify-content:center; flex-wrap:wrap; margin-top:24px;">
      <a href="{{ route('contact.us') }}" class="btn p">Get Started →</a>
      <a href="{{ route('contact.us') }}" class="btn o" style="background:transparent; border-color:rgba(255,255,255,0.2); color:#fff;">Book a Demo</a>
    </div>
  </div>
</section>

@endsection
