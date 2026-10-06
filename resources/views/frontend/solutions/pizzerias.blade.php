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
  --bg2: #f9f6f0;
  --bg3: #f1ebe5;
  --ink: #241A14;
  --mute: #6F665E;
  --line: rgba(135, 96, 57, 0.14);
  --card: #ffffff;
  --shadow-sm: 0 4px 20px rgba(36, 26, 20, 0.04);
  --shadow-md: 0 16px 40px rgba(36, 26, 20, 0.08);
  --shadow-lg: 0 26px 50px rgba(36, 26, 20, 0.12);
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
.btn.o { color: var(--br); background: transparent; }
.btn.o:hover { background: var(--bg2); transform: translateY(-2px); }

/* Badges */
.badge { font-size: 11px; font-weight: 500; padding: 4px 10px; border-radius: 8px; text-transform: uppercase; display: inline-block; letter-spacing: .04em; }
.badge.ready { background: #d1fae5; color: #047857; }
.badge.preparing { background: #ffedd5; color: #c2410c; }
.badge.new { background: #eff6ff; color: #1d4ed8; }
.badge.soldout { background: #fee2e2; color: #b91c1c; }
.badge.occupied { background: #fee2e2; color: #b91c1c; }
.badge.reserved { background: #ffedd5; color: #c2410c; }
.badge.available { background: #d1fae5; color: #047857; }

/* ---------------- BREADCRUMB ---------------- */
.bc { padding: 18px 0 16px; background: var(--bg); border-bottom: 1px solid var(--line); font-size: 14px; color: var(--mute); font-weight: 600; }
.bc .w { display: flex; align-items: center; gap: 8px; flex-wrap: wrap; }
.bc a { color: var(--mute); transition: color .2s; }
.bc a:hover { color: var(--ink); }
.bc span.cur { color: var(--ink); font-weight: 700; }

/* ---------------- HERO ---------------- */
.hero { padding: 60px 0 90px; }
.hero-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 48px; align-items: center; }
.hero-ctx p { font-size: 18px; margin: 20px 0 32px; max-width: 540px; }
.hero-btns { display: flex; gap: 16px; flex-wrap: wrap; }

.hero-ui { background: #fff; border: 1px solid var(--line); border-radius: 24px; box-shadow: var(--shadow-lg); overflow: hidden; position: relative; }
.hero-ui-hdr { background: var(--bg2); padding: 16px 20px; border-bottom: 1px solid var(--line); display: flex; justify-content: space-between; align-items: center; }
.hero-ui-hdr-title { font-weight: 500; font-size: 14px; color: var(--ink); display: flex; align-items: center; gap: 8px; }
.hero-ui-grid { padding: 20px; display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px; }

.hu-stat { padding: 16px; border-radius: 12px; border: 1px solid var(--line); background: var(--bg); box-shadow: var(--shadow-sm); }
.hu-stat-lbl { font-size: 11px; font-weight: 500; color: var(--mute); text-transform: uppercase; margin-bottom: 4px; }
.hu-stat-val { font-size: 24px; font-weight: 500; color: var(--ink); }

/* ---------------- SECTION 4: FEATURES ---------------- */
.eco-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }
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
.pc-img { width: 100px; height: 100px; border-radius: 12px; object-fit: cover; }
.pc-ctx { flex: 1; }
.pc-ctx h4 { font-size: 16px; margin-bottom: 4px; }
.pc-ctx p { font-size: 13px; color: var(--mute); margin-bottom: 8px; line-height: 1.4; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
.pc-ft { display: flex; justify-content: space-between; align-items: center; }

/* ---------------- SECTION 6 & 17: VARIATIONS & COMBOS ---------------- */
.two-col-flow { display: grid; grid-template-columns: 1fr 1fr; gap: 48px; align-items: start; }
.v-card, .combo-card { background: #fff; border: 1px solid var(--line); border-radius: 20px; overflow: hidden; box-shadow: var(--shadow-md); }
.v-hdr, .combo-hdr { background: var(--bg2); padding: 16px 20px; border-bottom: 1px solid var(--line); font-weight: 500; }
.v-body, .combo-body { padding: 20px; font-size: 14px; }
.v-sec { margin-bottom: 16px; }
.v-sec-title { font-size: 11px; font-weight: 500; color: var(--mute); text-transform: uppercase; margin-bottom: 8px; }
.v-item { display: flex; justify-content: space-between; margin-bottom: 6px; padding: 6px 10px; background: var(--bg2); border-radius: 8px; }
.v-item.act { background: var(--br-light); color: var(--br); font-weight: 700; border: 1px solid rgba(135,96,57,0.2); }

.combo-item { padding: 16px; border: 1px dashed var(--line); border-radius: 12px; margin-bottom: 12px; text-align: center; }
.combo-plus { color: var(--mute); font-weight: 500; font-size: 18px; margin: 8px 0; }

/* ---------------- SECTION 7, 8, 9, 10: POS, ORDERS, KOT, PEAK ---------------- */
.bill-panel, .order-panel, .kot-panel { background: #fff; border: 1px solid var(--line); border-radius: 20px; box-shadow: var(--shadow-md); overflow: hidden; }
.bp-hdr, .op-hdr, .kp-hdr { padding: 16px 20px; background: var(--bg2); border-bottom: 1px solid var(--line); font-weight: 500; font-size: 15px; display: flex; justify-content: space-between; }
.bp-body, .op-body, .kp-body { padding: 20px; }
.bp-item { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 16px; font-size: 14px; }
.bp-item-qty { font-size: 12px; color: var(--mute); display: block; }
.bp-total { display: flex; justify-content: space-between; padding: 16px 0; border-top: 2px dashed var(--line); margin-top: 8px; font-weight: 500; font-size: 20px; color: var(--br); }

.ot-flow { display: flex; gap: 8px; margin-top: 24px; }
.ot-step { flex: 1; text-align: center; font-size: 10px; font-weight: 500; text-transform: uppercase; padding: 8px 4px; border-radius: 6px; background: var(--bg2); color: var(--mute); border: 1px solid var(--line); display: flex; flex-direction: column; align-items: center; gap: 4px; }
.ot-step svg { width: 14px; height: 14px; }
.ot-step.done { background: var(--br-light); color: var(--br); border-color: var(--br); }

.fest-dash { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; }
.fd-card { padding: 20px; background: #fff; border: 1px solid var(--line); border-radius: 16px; text-align: center; box-shadow: var(--shadow-sm); }
.fd-val { font-size: 32px; font-weight: 500; color: var(--br); line-height: 1.2; }
.fd-lbl { font-size: 12px; font-weight: 700; color: var(--mute); text-transform: uppercase; }

/* ---------------- SECTION 11 & 12: SERVICE MODES & TABLES ---------------- */
.sm-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-bottom: 40px; }
.sm-card { padding: 24px; background: #fff; border: 1px solid var(--line); border-radius: 16px; text-align: center; transition: .2s; }
.sm-card:hover { border-color: var(--br); box-shadow: var(--shadow-md); }
.sm-icon { width: 48px; height: 48px; margin: 0 auto 16px; background: var(--bg2); border-radius: 12px; display: grid; place-items: center; color: var(--br); }

.table-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px; }
.t-card { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 20px; }
.t-hdr { display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px; }
.t-name { font-size: 18px; font-weight: 500; color: var(--ink); }
.t-det { font-size: 13px; color: var(--mute); display: flex; justify-content: space-between; margin-bottom: 8px; }

/* ---------------- SECTION 13 & 14: AVAILABILITY & INVENTORY ---------------- */
.avail-list { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 12px; box-shadow: var(--shadow-md); }
.avail-item { display: flex; justify-content: space-between; padding: 12px 16px; border-bottom: 1px solid var(--bg2); font-weight: 600; font-size: 14px; }
.avail-item:last-child { border: none; }

.inv-table { width: 100%; border-collapse: collapse; background: #fff; border-radius: 16px; overflow: hidden; border: 1px solid var(--line); box-shadow: var(--shadow-md); }
.inv-table th { background: var(--bg2); padding: 12px 16px; text-align: left; font-size: 12px; font-weight: 500; color: var(--mute); text-transform: uppercase; border-bottom: 1px solid var(--line); }
.inv-table td { padding: 12px 16px; font-size: 14px; border-bottom: 1px solid var(--bg2); }
.inv-table tr:last-child td { border-bottom: none; }

/* ---------------- SECTION 15, 16, 18: REPORTS & CUSTOMERS ---------------- */
.reports-preview { background: #fff; border: 1px solid var(--line); border-radius: 24px; padding: 36px; box-shadow: var(--shadow-lg); }
.rp-stats { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; margin-bottom: 32px; }
.rp-stat-card { background: var(--bg2); border: 1px solid var(--line); border-radius: 14px; padding: 16px; }
.rp-val { font-size: 24px; font-weight: 500; color: var(--ink); }
.rp-lbl { font-size: 12px; font-weight: 700; color: var(--mute); }

.cust-card { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 20px; box-shadow: var(--shadow-md); }

/* ---------------- SECTION 19: WORKFLOW ---------------- */
.workflow-grid { display: flex; flex-wrap: wrap; justify-content: center; gap: 12px; max-width: 900px; margin: 0 auto; }
.wf-node { display: flex; align-items: center; gap: 8px; font-size: 13px; font-weight: 700; background: #fff; border: 1px solid var(--line); padding: 10px 16px; border-radius: 99px; box-shadow: var(--shadow-sm); }
.wf-node svg { color: var(--br); width: 16px; height: 16px; }
.wf-arrow { color: var(--mute); font-size: 16px; display: flex; align-items: center; }

/* ---------------- SECTION 20: BUILT FOR ---------------- */
.concept-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }
.concept-card { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 24px; }
.concept-icon { font-size: 32px; margin-bottom: 16px; }
.concept-card h3 { font-size: 18px; margin-bottom: 8px; }
.concept-card p { font-size: 14px; }

/* ---------------- SECTION 21: BENEFITS ---------------- */
.benefits-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; }
.b-card { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 24px; }

/* ---------------- SECTION 22 & 23: CUSTOMER & MOBILE ---------------- */
.phone-mockup { max-width: 300px; margin: 0 auto; background: #111; border: 6px solid #222; border-radius: 40px; padding: 12px; box-shadow: var(--shadow-lg); }
.phone-inner { background: #fff; border-radius: 28px; height: 560px; overflow: hidden; position: relative; }
.pi-hdr { background: var(--bg2); padding: 16px; text-align: center; font-weight: 500; border-bottom: 1px solid var(--line); }
.pi-body { padding: 16px; }
.pi-card { background: #fff; border: 1px solid var(--line); border-radius: 12px; padding: 12px; margin-bottom: 12px; box-shadow: var(--shadow-sm); }

/* ---------------- SECTION 24: IDEAL FOR ---------------- */
.industry-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; }
.ind-card { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 16px; text-align: center; font-weight: 700; font-size: 14px; transition: .2s; }
.ind-card:hover { border-color: var(--br); box-shadow: var(--shadow-md); color: var(--br); }

/* ---------------- SECTION 25 & 26: BRANCHES & CONNECTED ---------------- */
.mb-panel { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 24px; box-shadow: var(--shadow-md); }
.mb-row { display: flex; justify-content: space-between; padding: 12px 0; border-bottom: 1px solid var(--line); }
.mb-row:last-child { border-bottom: none; }
.mb-val { font-weight: 500; color: var(--br); }

.conn-grid { display: grid; grid-template-columns: repeat(8, 1fr); gap: 12px; text-align: center; }
.conn-card { background: #fff; border: 1px solid var(--line); border-radius: 12px; padding: 16px 8px; font-size: 11px; font-weight: 700; }
.conn-card svg { margin-bottom: 8px; color: var(--br); }

/* ---------------- FAQ ---------------- */
.faq-list { max-width: 840px; margin: auto; display: flex; flex-direction: column; gap: 16px; }
.faq-item { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 20px 24px; cursor: pointer; transition: .2s; }
.faq-item summary { font-weight: 700; font-size: 16px; display: flex; justify-content: space-between; align-items: center; list-style: none; }
.faq-item summary::-webkit-details-marker { display: none; }
.faq-item p { margin-top: 12px; font-size: 15px; color: var(--mute); }

/* ---------------- CTA ---------------- */
.cta-sec { padding: 100px 0; background: linear-gradient(135deg, #FAF4ED 0%, #EFE4D6 50%, #FAF4ED 100%); color: #21160F; text-align: center; position: relative; overflow: hidden; border-top: 1px solid rgba(135, 96, 57, 0.16); }
.cta-box { position: relative; z-index: 2; max-width: 760px; margin: auto; }
.cta-box h2 { color: #21160F; margin-bottom: 16px; }
.cta-box p { color: #6E6157; }

/* Responsive */
@media (max-width: 1024px) {
  .hero-grid, .two-col-flow { grid-template-columns: 1fr; gap: 48px; }
  .eco-grid, .concept-grid { grid-template-columns: repeat(2, 1fr); }
  .sm-grid, .benefits-grid { grid-template-columns: repeat(2, 1fr); }
  .fest-dash, .rp-stats { grid-template-columns: repeat(2, 1fr); }
  .industry-grid { grid-template-columns: repeat(2, 1fr); }
  .conn-grid { grid-template-columns: repeat(4, 1fr); }
}

@media (max-width: 768px) {
  .bc { padding: 14px 0 14px; }
  .w { padding: 0 16px; }
  .win { min-width: 0 !important; width: 100%; overflow-x: auto; }
}

@media (max-width: 640px) {
  .eco-grid, .concept-grid, .benefits-grid, .industry-grid, .rp-stats { grid-template-columns: 1fr; }
  .sm-grid, .fest-dash { grid-template-columns: 1fr; }
  .menu-grid, .table-grid { grid-template-columns: 1fr; }
  .conn-grid { grid-template-columns: 1fr; }
  .inv-table { display: block; overflow-x: auto; white-space: nowrap; }
  .workflow-grid { flex-direction: column; align-items: center; }
  .wf-arrow { transform: rotate(90deg); }
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
    <span class="cur">Pizzerias & Specialty Food Shops</span>
  </div>
</div>

{{-- HERO --}}
<section class="hero alt">
  <div class="w hero-grid">
    <div class="hero-ctx">
      <div class="eb">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2z"/><path d="M12 2v20"/><path d="M2 12h20"/><path d="M4.93 4.93l14.14 14.14"/><path d="M19.07 4.93L4.93 19.07"/></svg>
        PIZZERIA & SPECIALTY FOOD SOLUTION
      </div>
      <h1>Your Specialty Menu. <span class="sf">Your Orders.</span> Your Business.</h1>
      <p>Manage pizzas, burgers, pasta, sandwiches, desserts and specialty food products, along with orders, billing, customers, inventory and daily operations from one connected platform.</p>
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
          <div class="hu-stat-val">₹86,450</div>
        </div>
        <div class="hu-stat">
          <div class="hu-stat-lbl">Active Orders</div>
          <div class="hu-stat-val">18</div>
        </div>
        <div class="hu-stat">
          <div class="hu-stat-lbl">Preparing</div>
          <div class="hu-stat-val">9</div>
        </div>
        <div class="hu-stat">
          <div class="hu-stat-lbl">Ready</div>
          <div class="hu-stat-val">6</div>
        </div>
        <div class="hu-stat" style="grid-column:1/-1;">
          <div class="hu-stat-lbl">Best Seller</div>
          <div class="hu-stat-val" style="font-size:18px;">Margherita Pizza</div>
        </div>
        <div class="hu-stat" style="grid-column:1/-1;">
          <div class="hu-stat-lbl">Low Stock</div>
          <div class="hu-stat-val" style="font-size:18px; color:var(--red);">4 Items</div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 4: FEATURES --}}
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">Built for Specialty Food Businesses</div>
      <h2>Everything Your Specialty Food Business Needs.</h2>
      <p>Manage your products, customer orders, billing, kitchen workflow, inventory and business reports from one connected platform.</p>
    </div>

    <div class="eco-grid">
      <div class="eco-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg></div>
        <h3>Product & Menu</h3>
        <p>Organize your signature products, categories, prices and availability.</p>
      </div>
      <div class="eco-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/></svg></div>
        <h3>Digital Menu</h3>
        <p>Present products with images, descriptions, pricing and options.</p>
      </div>
      <div class="eco-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/></svg></div>
        <h3>Order Management</h3>
        <p>Track orders from creation to preparation, pickup or service.</p>
      </div>
      <div class="eco-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/></svg></div>
        <h3>POS & Billing</h3>
        <p>Process counter, dine-in and supported takeaway transactions.</p>
      </div>
      <div class="eco-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg></div>
        <h3>KOT Management</h3>
        <p>Connect orders with kitchen preparation where supported.</p>
      </div>
      <div class="eco-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg></div>
        <h3>Table Management</h3>
        <p>Manage table availability and dining service where applicable.</p>
      </div>
      <div class="eco-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg></div>
        <h3>Customers</h3>
        <p>Maintain customer details and order history.</p>
      </div>
      <div class="eco-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg></div>
        <h3>Inventory</h3>
        <p>Track ingredients, supplies and stock movement.</p>
      </div>
      <div class="eco-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></div>
        <h3>Reports</h3>
        <p>Understand sales, orders, product performance and business activity.</p>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 5: MENU --}}
<section class="alt">
  <div class="w">
    <div class="hd">
      <div class="eb">Menu Management</div>
      <h2>Put Your Signature Products at the Centre.</h2>
      <p>Create a structured digital catalogue around the products your customers come back for.</p>
    </div>

    <div class="menu-tabs">
      <div class="menu-tab act">🍕 Pizza</div>
      <div class="menu-tab">🍔 Burgers</div>
      <div class="menu-tab">🍝 Pasta</div>
      <div class="menu-tab">🥪 Sandwiches & Wraps</div>
      <div class="menu-tab">🍟 Sides & Snacks</div>
      <div class="menu-tab">🍰 Desserts</div>
    </div>

    <div class="menu-grid">
      <div class="pc-card">
        <img class="pc-img" src="https://images.unsplash.com/photo-1574071318508-1cdbab80d002?w=200&q=80" alt="Margherita Pizza">
        <div class="pc-ctx">
          <h4>Margherita Pizza</h4>
          <p>Classic delight with 100% real mozzarella cheese and signature tomato sauce.</p>
          <div class="pc-ft">
            <span style="font-weight: 500; color:var(--br);">From ₹299</span>
            <span class="badge ready">Available</span>
          </div>
        </div>
      </div>
      <div class="pc-card">
        <img class="pc-img" src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?w=200&q=80" alt="Farmhouse Pizza">
        <div class="pc-ctx">
          <h4>Farmhouse Pizza</h4>
          <p>Loaded with fresh mushrooms, onions, crisp capsicum, and sliced tomatoes.</p>
          <div class="pc-ft">
            <span style="font-weight: 500; color:var(--br);">From ₹399</span>
            <span class="badge ready">Available</span>
          </div>
        </div>
      </div>
      <div class="pc-card">
        <img class="pc-img" src="https://images.unsplash.com/photo-1568901346375-23c9450c58cd?w=200&q=80" alt="Burger">
        <div class="pc-ctx">
          <h4>Signature Chicken Burger</h4>
          <p>Juicy chicken patty, fresh lettuce, tomatoes, and our special sauce.</p>
          <div class="pc-ft">
            <span style="font-weight: 500; color:var(--br);">₹249</span>
            <span class="badge ready">Available</span>
          </div>
        </div>
      </div>
      <div class="pc-card">
        <img class="pc-img" src="https://images.unsplash.com/photo-1473093295043-cdd812d0e601?w=200&q=80" alt="Pasta">
        <div class="pc-ctx">
          <h4>Creamy Alfredo Pasta</h4>
          <p>Rich and creamy white sauce pasta with bell peppers and olives.</p>
          <div class="pc-ft">
            <span style="font-weight: 500; color:var(--br);">₹349</span>
            <span class="badge ready">Available</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 6 & 17: VARIATIONS & COMBOS --}}
<section>
  <div class="w two-col-flow">
    {{-- Variations --}}
    <div>
      <div class="eb">Product Customization</div>
      <h3 style="font-size:28px; margin-bottom:12px;">Give Customers More Ways to Build Their Order.</h3>
      <p style="margin-bottom:24px;">Manage product sizes, flavours, toppings, add-ons and other options where supported.</p>
      
      <div class="v-card">
        <div class="v-hdr">MARGHERITA PIZZA</div>
        <div class="v-body">
          <div class="v-sec">
            <div class="v-sec-title">Size</div>
            <div class="v-item"><span>Regular</span><span>₹299</span></div>
            <div class="v-item act"><span>Medium</span><span>₹449</span></div>
            <div class="v-item"><span>Large</span><span>₹599</span></div>
          </div>
          <div class="v-sec">
            <div class="v-sec-title">Crust</div>
            <div class="v-item act"><span>Classic Hand Tossed</span></div>
            <div class="v-item"><span>Thin Crust</span></div>
            <div class="v-item"><span>Cheese Burst</span></div>
          </div>
          <div class="v-sec">
            <div class="v-sec-title">Toppings & Add-ons</div>
            <div class="v-item"><span>Extra Cheese</span></div>
            <div class="v-item"><span>Jalapeño</span></div>
            <div class="v-item"><span>Garlic Bread</span></div>
          </div>
          <div style="font-size:11px; color:var(--mute); text-align:center; margin-top:16px;">* Illustrative customization options.</div>
        </div>
      </div>
    </div>

    {{-- Combos --}}
    <div>
      <div class="eb">Special Offers</div>
      <h3 style="font-size:28px; margin-bottom:12px;">Build Better Combos Around Your Best Sellers.</h3>
      <p style="margin-bottom:24px;">Merchandise attractive combos to increase average order value.</p>

      <div class="combo-card">
        <div class="combo-hdr" style="display:flex; justify-content:space-between;">
          <span>PIZZA COMBO</span>
          <span style="color:var(--br);">₹699</span>
        </div>
        <div class="combo-body">
          <div class="combo-item">1 Medium Pizza</div>
          <div class="combo-plus">+</div>
          <div class="combo-item">1 Garlic Bread</div>
          <div class="combo-plus">+</div>
          <div class="combo-item">2 Beverages</div>
          
          <div style="font-size:11px; color:var(--mute); text-align:center; margin-top:24px;">* Combos and discounts depend on product support.</div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 7, 8, 9: POS, ORDERS, KOT --}}
<section class="alt">
  <div class="w">
    <div class="hd">
      <h2>Every Order. Clear From Start to Finish.</h2>
      <p>Keep your billing counter, kitchen and order dispatch perfectly synchronized.</p>
    </div>

    <div style="display:grid; grid-template-columns:1fr 1fr 1fr; gap:24px; align-items:start;">
      
      {{-- POS --}}
      <div class="bill-panel">
        <div class="bp-hdr"><span>Counter POS</span><span>Bill #5092</span></div>
        <div class="bp-body">
          <div class="bp-item">
            <div>Margherita Pizza<span class="bp-item-qty">Medium | Classic</span></div>
            <strong style="color:var(--ink);">₹449</strong>
          </div>
          <div class="bp-item">
            <div>Garlic Bread<span class="bp-item-qty">× 1</span></div>
            <strong style="color:var(--ink);">₹149</strong>
          </div>
          <div class="bp-item">
            <div>Cold Coffee<span class="bp-item-qty">× 2</span></div>
            <strong style="color:var(--ink);">₹240</strong>
          </div>
          <div class="bp-item">
            <div>Brownie<span class="bp-item-qty">× 1</span></div>
            <strong style="color:var(--ink);">₹120</strong>
          </div>
          <div class="bp-total" style="font-size:16px;">
            <span>TOTAL</span>
            <span>₹958</span>
          </div>
          <div style="text-align:center; padding:12px; background:var(--br); color:#fff; font-weight:700; border-radius:8px; margin-top:16px; cursor:pointer;">Pay & Print</div>
        </div>
      </div>

      {{-- Order --}}
      <div class="order-panel">
        <div class="op-hdr">
          <div><span style="display:block;">ORDER #4068</span><span style="font-size:12px; font-weight:600; color:var(--mute);">Takeaway | Priya</span></div>
          <span class="badge preparing">Preparing</span>
        </div>
        <div class="op-body">
          <ul style="font-size:14px; margin-bottom:24px;">
            <li style="margin-bottom:8px;">1 × Large Farmhouse Pizza</li>
            <li style="margin-bottom:8px;">1 × Garlic Bread</li>
            <li style="margin-bottom:8px;">2 × Cold Coffee</li>
          </ul>
          
          <div class="ot-flow">
            <div class="ot-step done"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/></svg> New</div>
            <div class="ot-step done"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg> KOT</div>
            <div class="ot-step"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/></svg> Ready</div>
          </div>
        </div>
      </div>

      {{-- KOT --}}
      <div class="kot-panel">
        <div class="kp-hdr">
          <span style="color:var(--br);">KOT #3056</span>
          <span class="badge preparing">Preparing</span>
        </div>
        <div class="kp-body">
          <div style="font-weight: 500; margin-bottom:12px;">ORDER #4068</div>
          <ul style="font-size:14px; margin-bottom:24px; font-family:monospace; font-size:15px; color:var(--ink);">
            <li style="margin-bottom:8px;">[1] Lrg Farmhouse Pz</li>
            <li style="margin-bottom:8px;">[1] Garlic Bread</li>
          </ul>
          <div style="font-size:11px; color:var(--mute); text-align:center; margin-top:24px;">* KOT workflow where supported.</div>
        </div>
      </div>

    </div>
  </div>
</section>

{{-- SECTION 10: PEAK --}}
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">Peak Hours</div>
      <h2>Stay in Control During the Rush.</h2>
      <p>Manage high order volumes easily, whether it's lunch hour, evening snacks, or weekend dinner time.</p>
    </div>

    <div class="fest-dash">
      <div class="fd-card">
        <div class="fd-val">18</div>
        <div class="fd-lbl">New Orders</div>
      </div>
      <div class="fd-card">
        <div class="fd-val">9</div>
        <div class="fd-lbl">Preparing</div>
      </div>
      <div class="fd-card">
        <div class="fd-val">6</div>
        <div class="fd-lbl">Ready</div>
      </div>
      <div class="fd-card">
        <div class="fd-val" style="color:var(--green);">74</div>
        <div class="fd-lbl">Completed</div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 11 & 12: SERVICE MODES & TABLES --}}
<section class="alt">
  <div class="w">
    <div class="hd">
      <div class="eb">Service Modes</div>
      <h2>One Order Flow. Multiple Ways to Serve.</h2>
    </div>

    <div class="sm-grid">
      <div class="sm-card">
        <div class="sm-icon"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></div>
        <h3 style="margin-bottom:8px;">Dine-In</h3>
        <p style="font-size:14px;">Connect tables, orders and billing for seated guests.</p>
      </div>
      <div class="sm-card">
        <div class="sm-icon"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg></div>
        <h3 style="margin-bottom:8px;">Takeaway</h3>
        <p style="font-size:14px;">Keep takeaway orders organized from creation to pickup.</p>
      </div>
      <div class="sm-card">
        <div class="sm-icon"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></div>
        <h3 style="margin-bottom:8px;">Pickup</h3>
        <p style="font-size:14px;">Track orders until they are ready for customer collection.</p>
      </div>
    </div>

    <div style="max-width:800px; margin:0 auto;">
      <div class="hd" style="margin-bottom:24px;">
        <div class="eb">Table Management</div>
        <h2>Keep Dine-In Service Organized.</h2>
      </div>
      
      <div class="table-grid">
        <div class="t-card" style="border-color:rgba(16,185,129,0.3);">
          <div class="t-hdr"><span class="t-name">Table 01</span><span class="badge available">Available</span></div>
          <div class="t-det"><span>2 Seats</span><span>--</span></div>
        </div>
        <div class="t-card" style="border-color:rgba(185,28,28,0.3);">
          <div class="t-hdr"><span class="t-name">Table 02</span><span class="badge occupied">Occupied</span></div>
          <div class="t-det"><span>4 Seats</span><span>₹958</span></div>
        </div>
        <div class="t-card" style="border-color:rgba(245,158,11,0.3);">
          <div class="t-hdr"><span class="t-name">Table 03</span><span class="badge reserved">Reserved</span></div>
          <div class="t-det"><span>6 Seats</span><span>7:30 PM</span></div>
        </div>
        <div class="t-card" style="border-color:rgba(185,28,28,0.3);">
          <div class="t-hdr"><span class="t-name">Table 04</span><span class="badge occupied">Occupied</span></div>
          <div class="t-det"><span>4 Seats</span><span>₹1,420</span></div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 13 & 14: AVAILABILITY & INVENTORY --}}
<section>
  <div class="w two-col-flow">
    {{-- Availability --}}
    <div>
      <div class="eb">Menu Availability</div>
      <h3 style="font-size:28px; margin-bottom:12px;">Keep Your Signature Products Available.</h3>
      <p style="margin-bottom:24px;">Update product availability in real-time or clearly mark items as sold out.</p>
      
      <div class="avail-list">
        <div class="avail-item"><span>Margherita Pizza</span><span class="badge ready">Available</span></div>
        <div class="avail-item"><span>Farmhouse Pizza</span><span class="badge ready">Available</span></div>
        <div class="avail-item"><span>Garlic Bread</span><span class="badge ready">Available</span></div>
        <div class="avail-item" style="background:#fef2f2;"><span>Cheesecake</span><span class="badge soldout">Sold Out</span></div>
        <div class="avail-item"><span>Chicken Wings</span><span class="badge ready">Available</span></div>
        <div class="avail-item"><span>Cold Coffee</span><span class="badge ready">Available</span></div>
      </div>
    </div>

    {{-- Inventory --}}
    <div>
      <div class="eb">Inventory Management</div>
      <h3 style="font-size:28px; margin-bottom:12px;">Know What Goes Into Every Order.</h3>
      <p style="margin-bottom:24px;">Keep visibility into key ingredients and supplies used across your specialty menu.</p>

      <table class="inv-table">
        <thead>
          <tr>
            <th>Ingredient</th>
            <th>Stock</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <tr><td>Pizza Flour</td><td>45 kg</td><td><span class="badge ready">In Stock</span></td></tr>
          <tr><td>Mozzarella</td><td>18 kg</td><td><span class="badge ready">In Stock</span></td></tr>
          <tr><td>Tomato Sauce</td><td>22 L</td><td><span class="badge ready">In Stock</span></td></tr>
          <tr><td>Chicken</td><td>25 kg</td><td><span class="badge ready">In Stock</span></td></tr>
          <tr><td>Pizza Boxes</td><td>350 pcs</td><td><span class="badge ready">In Stock</span></td></tr>
          <tr><td>Dips</td><td>6 L</td><td><span class="badge low" style="background:#fef2f2; color:#b91c1c;">Low</span></td></tr>
        </tbody>
      </table>
    </div>
  </div>
</section>

{{-- SECTION 15, 16, 18: REPORTS & CUSTOMERS --}}
<section class="alt">
  <div class="w">
    <div class="hd">
      <div class="eb">Business Reports</div>
      <h2>Turn Everyday Sales Into Better Decisions.</h2>
      <p>Understand your best sellers, order volume, and business performance.</p>
    </div>

    <div class="reports-preview">
      <div class="rp-stats">
        <div class="rp-stat-card">
          <div class="rp-lbl">TODAY'S SALES</div>
          <div class="rp-val">₹86,450</div>
        </div>
        <div class="rp-stat-card">
          <div class="rp-lbl">TOTAL ORDERS</div>
          <div class="rp-val">94</div>
        </div>
        <div class="rp-stat-card">
          <div class="rp-lbl">AVG ORDER VALUE</div>
          <div class="rp-val">₹920</div>
        </div>
        <div class="rp-stat-card">
          <div class="rp-lbl">BEST SELLER</div>
          <div class="rp-val" style="font-size:18px; margin-top:6px;">Margherita Pizza</div>
        </div>
      </div>
      
      <div style="display:flex; justify-content:space-between; align-items:flex-end; height:120px; padding:0 20px; border-bottom:1px solid var(--line);">
        <div style="width:40px; background:var(--br); height:40%; border-radius:4px 4px 0 0;"></div>
        <div style="width:40px; background:var(--br); height:60%; border-radius:4px 4px 0 0;"></div>
        <div style="width:40px; background:var(--br); height:85%; border-radius:4px 4px 0 0;"></div>
        <div style="width:40px; background:var(--br); height:100%; border-radius:4px 4px 0 0;"></div>
        <div style="width:40px; background:var(--br); height:70%; border-radius:4px 4px 0 0;"></div>
        <div style="width:40px; background:var(--br); height:50%; border-radius:4px 4px 0 0;"></div>
        <div style="width:40px; background:var(--br); height:90%; border-radius:4px 4px 0 0;"></div>
      </div>
      <div style="text-align:center; font-size:11px; color:var(--mute); margin-top:16px;">* Illustrative demo data shown for weekly sales trend.</div>
    </div>

    <div style="margin-top:64px; max-width:600px; margin-left:auto; margin-right:auto;">
      <div class="hd" style="margin-bottom:24px;">
        <div class="eb">Customer Management</div>
        <h2>Know Your Customers Beyond the Order.</h2>
      </div>
      <div class="cust-card">
        <div style="display:flex; justify-content:space-between; border-bottom:1px solid var(--line); padding-bottom:12px; margin-bottom:12px;">
          <div>
            <strong style="display:block; font-size:18px; color:var(--ink);">Priya Kumar</strong>
          </div>
          <div style="text-align:right;">
            <span style="font-size:11px; font-weight: 500; color:var(--mute);">TOTAL ORDERS</span>
            <strong style="display:block; font-size:18px; color:var(--br);">14</strong>
          </div>
        </div>
        <div style="font-size:12px; font-weight: 500; color:var(--mute); margin-bottom:8px; text-transform:uppercase;">Recent Orders:</div>
        <ul style="font-size:13px; color:var(--ink); font-weight:600;">
          <li style="margin-bottom:4px;">Farmhouse Pizza</li>
          <li style="margin-bottom:4px;">Garlic Bread</li>
          <li style="margin-bottom:4px;">Brownie</li>
        </ul>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 19: WORKFLOW --}}
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">One Connected Workflow</div>
      <h2>From Menu Selection to Completed Order.</h2>
    </div>

    <div class="workflow-grid">
      <div class="wf-node"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg> Menu</div>
      <div class="wf-arrow">→</div>
      <div class="wf-node"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg> Customer</div>
      <div class="wf-arrow">→</div>
      <div class="wf-node"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/></svg> Order</div>
      <div class="wf-arrow">→</div>
      <div class="wf-node"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg> KOT</div>
      <div class="wf-arrow">→</div>
      <div class="wf-node"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg> Kitchen</div>
      <div class="wf-arrow">→</div>
      <div class="wf-node"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/></svg> Ready</div>
      <div class="wf-arrow">→</div>
      <div class="wf-node"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/></svg> Billing</div>
      <div class="wf-arrow">→</div>
      <div class="wf-node"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="4" width="22" height="16" rx="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg> Payment</div>
      <div class="wf-arrow">→</div>
      <div class="wf-node"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12l5 5l10 -10"/></svg> Pickup / Serve</div>
    </div>
  </div>
</section>

{{-- SECTION 20 & 21: CONCEPTS & BENEFITS --}}
<section class="alt">
  <div class="w">
    <div class="hd">
      <h2>One Platform. Different Food Concepts.</h2>
    </div>

    <div class="concept-grid">
      <div class="concept-card">
        <div class="concept-icon">🍕</div>
        <h3>Pizzerias</h3>
        <p>Manage pizzas, toppings, crusts, sides, combos, orders and billing.</p>
      </div>
      <div class="concept-card">
        <div class="concept-icon">🍔</div>
        <h3>Burger & Fast Food</h3>
        <p>Manage burgers, sides, combos, takeaway orders and counter billing.</p>
      </div>
      <div class="concept-card">
        <div class="concept-icon">🍝</div>
        <h3>Pasta & Italian</h3>
        <p>Organize pasta, starters, mains, desserts and dine-in orders.</p>
      </div>
      <div class="concept-card">
        <div class="concept-icon">🥪</div>
        <h3>Sandwich & Wraps</h3>
        <p>Manage quick-service products, variations and takeaway orders.</p>
      </div>
      <div class="concept-card">
        <div class="concept-icon">🍟</div>
        <h3>Snack Shops</h3>
        <p>Manage snacks, sides, beverages and high-volume counter orders.</p>
      </div>
      <div class="concept-card">
        <div class="concept-icon">🍰</div>
        <h3>Dessert Cafés</h3>
        <p>Manage desserts, beverages, customer orders and billing.</p>
      </div>
    </div>

    <div class="hd" style="margin-top:80px;">
      <h2>Built for Businesses With a Signature Menu.</h2>
    </div>
    <div class="benefits-grid">
      <div class="b-card">
        <h3 style="margin-bottom:8px; font-size:16px;">01. Flexible Product Management</h3>
        <p style="font-size:14px;">Organize your signature products, categories and availability.</p>
      </div>
      <div class="b-card">
        <h3 style="margin-bottom:8px; font-size:16px;">02. Product Variations</h3>
        <p style="font-size:14px;">Manage sizes, toppings, add-ons and other options where supported.</p>
      </div>
      <div class="b-card">
        <h3 style="margin-bottom:8px; font-size:16px;">03. Faster Billing</h3>
        <p style="font-size:14px;">Process dine-in, takeaway and supported orders efficiently.</p>
      </div>
      <div class="b-card">
        <h3 style="margin-bottom:8px; font-size:16px;">04. Kitchen Coordination</h3>
        <p style="font-size:14px;">Connect orders with kitchen workflows where supported.</p>
      </div>
      <div class="b-card">
        <h3 style="margin-bottom:8px; font-size:16px;">05. Inventory Visibility</h3>
        <p style="font-size:14px;">Monitor important ingredients and supplies.</p>
      </div>
      <div class="b-card">
        <h3 style="margin-bottom:8px; font-size:16px;">06. Business Insights</h3>
        <p style="font-size:14px;">Understand product, order and sales performance.</p>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 22 & 23: CUSTOMER EXP & MOBILE --}}
<section>
  <div class="w two-col-flow">
    {{-- Customer Exp --}}
    <div style="text-align:center;">
      <div class="eb">Customer Experience</div>
      <h3 style="font-size:28px; margin-bottom:12px;">Make Your Signature Menu Easy to Explore.</h3>
      <p style="margin-bottom:32px;">Browse → Select → Customize → Order</p>
      
      <div class="phone-mockup">
        <div class="phone-inner">
          <div class="pi-hdr">Specialty Menu</div>
          <div class="pi-body">
            <div class="pi-card" style="display:flex; gap:12px; text-align:left;">
              <img src="https://images.unsplash.com/photo-1574071318508-1cdbab80d002?w=100&q=80" style="width:60px; height:60px; border-radius:8px; object-fit:cover;">
              <div>
                <div style="font-weight:700; font-size:14px;">Margherita Pizza</div>
                <div style="font-size:12px; color:var(--mute); margin-bottom:4px;">Classic delight...</div>
                <div style="font-weight: 500; color:var(--br); font-size:13px;">₹299</div>
              </div>
            </div>
            <div class="pi-card" style="display:flex; gap:12px; text-align:left;">
              <img src="https://images.unsplash.com/photo-1568901346375-23c9450c58cd?w=100&q=80" style="width:60px; height:60px; border-radius:8px; object-fit:cover;">
              <div>
                <div style="font-weight:700; font-size:14px;">Signature Burger</div>
                <div style="font-size:12px; color:var(--mute); margin-bottom:4px;">Juicy chicken patty...</div>
                <div style="font-weight: 500; color:var(--br); font-size:13px;">₹249</div>
              </div>
            </div>
            <div style="text-align:center; padding:12px; background:var(--br); color:#fff; border-radius:8px; font-weight:700; font-size:14px; margin-top:24px;">View Cart</div>
          </div>
        </div>
      </div>
    </div>

    {{-- Mobile Admin --}}
    <div style="text-align:center;">
      <div class="eb">Mobile Management</div>
      <h3 style="font-size:28px; margin-bottom:12px;">Your Specialty Food Business at a Glance.</h3>
      <p style="margin-bottom:32px;">Monitor orders, inventory and sales from anywhere.</p>

      <div class="phone-mockup">
        <div class="phone-inner" style="background:var(--bg2);">
          <div class="pi-hdr">Dashboard</div>
          <div class="pi-body">
            <div style="background:#fff; border-radius:12px; padding:16px; margin-bottom:12px; border:1px solid var(--line); text-align:left;">
              <div style="font-size:11px; font-weight:700; color:var(--mute);">TODAY'S SALES</div>
              <div style="font-size:24px; font-weight: 500; color:var(--ink);">₹86,450</div>
            </div>
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px; margin-bottom:12px; text-align:left;">
              <div style="background:#fff; border-radius:12px; padding:12px; border:1px solid var(--line);">
                <div style="font-size:11px; font-weight:700; color:var(--mute);">ORDERS</div>
                <div style="font-size:18px; font-weight: 500;">18</div>
              </div>
              <div style="background:#fff; border-radius:12px; padding:12px; border:1px solid var(--line);">
                <div style="font-size:11px; font-weight:700; color:var(--mute);">PREPARING</div>
                <div style="font-size:18px; font-weight: 500;">9</div>
              </div>
            </div>
            <div style="background:#fff; border-radius:12px; padding:16px; border:1px solid var(--line); text-align:left;">
              <div style="font-size:11px; font-weight:700; color:var(--mute);">LOW STOCK</div>
              <div style="font-size:16px; font-weight: 500; color:var(--red);">4 Items</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 24 & 25: IDEAL FOR & BRANCHES --}}
<section class="alt">
  <div class="w">
    <div class="hd">
      <h2>Built for Focused Food Concepts.</h2>
    </div>

    <div class="industry-grid">
      <div class="ind-card">Pizzerias</div>
      <div class="ind-card">Pizza & Pasta Restaurants</div>
      <div class="ind-card">Burger Shops</div>
      <div class="ind-card">Sandwich Shops</div>
      <div class="ind-card">Wrap & Roll Shops</div>
      <div class="ind-card">Pasta Restaurants</div>
      <div class="ind-card">Fast Food Outlets</div>
      <div class="ind-card">Snack Shops</div>
      <div class="ind-card">Dessert Cafés</div>
      <div class="ind-card">Specialty Cafés</div>
      <div class="ind-card">Casual Dining Concepts</div>
      <div class="ind-card">Multi-Outlet Businesses</div>
    </div>

    <div style="max-width:600px; margin:80px auto 0;">
      <div class="hd" style="margin-bottom:24px;">
        <div class="eb">Multi-Branch Management</div>
        <h2>Growing Beyond One Location? Stay Connected.</h2>
      </div>
      <div class="mb-panel">
        <div style="font-weight: 500; font-size:14px; color:var(--mute); text-transform:uppercase; margin-bottom:12px;">All Locations</div>
        <div class="mb-row"><span>Tiruchengode</span><span class="mb-val">₹86,450</span></div>
        <div class="mb-row"><span>Namakkal</span><span class="mb-val">₹74,280</span></div>
        <div class="mb-row"><span>Salem</span><span class="mb-val">₹1,08,650</span></div>
        <div style="font-size:11px; color:var(--mute); text-align:center; margin-top:16px;">* Multi-branch capabilities depend on applicable plan.</div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 26: CONNECTED FEATURES --}}
<section>
  <div class="w">
    <div class="hd">
      <h2>Everything Works Better Together.</h2>
    </div>

    <div class="conn-grid">
      <div class="conn-card"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/></svg><br>Menu</div>
      <div class="conn-card"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/></svg><br>Orders</div>
      <div class="conn-card"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg><br>KOT</div>
      <div class="conn-card"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/></svg><br>POS</div>
      <div class="conn-card"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg><br>Tables</div>
      <div class="conn-card"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg><br>Customers</div>
      <div class="conn-card"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg><br>Inventory</div>
      <div class="conn-card"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg><br>Reports</div>
    </div>
  </div>
</section>

{{-- SECTION 27: FAQ --}}
<section class="alt">
  <div class="w">
    <div class="hd">
      <h2>Frequently Asked Questions</h2>
    </div>

    <div class="faq-list">
      <details class="faq-item">
        <summary>Can Geni Menu manage a pizzeria? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></summary>
        <p>Yes. Geni Menu can help manage pizza products, menu categories, orders, billing, inventory and supported restaurant operations.</p>
      </details>
      <details class="faq-item">
        <summary>Can I manage pizza sizes and toppings? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></summary>
        <p>Product variations such as sizes, toppings and add-ons can be represented where supported.</p>
      </details>
      <details class="faq-item">
        <summary>Can I manage burger and pasta menus? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></summary>
        <p>Yes. Geni Menu can organize different food categories and products within the menu management workflow.</p>
      </details>
      <details class="faq-item">
        <summary>Can I manage takeaway orders? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></summary>
        <p>Yes. Takeaway orders can be handled through the supported order-management workflow.</p>
      </details>
      <details class="faq-item">
        <summary>Can I connect orders with the kitchen? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></summary>
        <p>KOT and kitchen workflows can connect orders to preparation where supported.</p>
      </details>
      <details class="faq-item">
        <summary>Can I manage dine-in tables? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></summary>
        <p>Yes. Table management can help manage table availability, occupancy and associated orders where applicable.</p>
      </details>
      <details class="faq-item">
        <summary>Can I track ingredients? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></summary>
        <p>Inventory management can help monitor ingredients, stock levels and stock movement.</p>
      </details>
      <details class="faq-item">
        <summary>Can I manage multiple outlets? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></summary>
        <p>Multi-branch functionality is available where supported by the applicable plan.</p>
      </details>
      <details class="faq-item">
        <summary>Can I view my best-selling products? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></summary>
        <p>Yes. Supported reports can provide visibility into product and sales performance.</p>
      </details>
    </div>
  </div>
</section>

{{-- FINAL CTA --}}
<section class="cta-sec">
  <div class="cta-box">
    <h2>Ready to Run Your Specialty Food Business Smarter?</h2>
    <p>Manage your menu, orders, kitchen, billing, customers, inventory and business insights from one connected platform with Geni Menu.</p>
    <div style="display:flex; gap:16px; justify-content:center; flex-wrap:wrap; margin-top:32px;">
      <a href="{{ route('restaurant_signup') }}" class="btn p" style="background:#876039; color:#fff;">Get Started →</a>
      <a href="{{ route('contact.us') }}" class="btn o" style="background:#fff; border-color:#876039; color:#876039;">Book a Demo</a>
    </div>
  </div>
</section>

@endsection
