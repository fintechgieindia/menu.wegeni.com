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
  --br-light: #f4efe9;
  --br-gold: #b88e56;
  --bg: #ffffff;
  --bg2: #f9f6f0;
  --bg3: #f3ece1;
  --dark: #1b1511;
  --dark-card: #27201b;
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
  --purple: #8B5CF6;
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
  line-height: 1.14;
  letter-spacing: -0.03em;
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
.hd { max-width: 760px; margin: 0 auto 52px; text-align: center; }
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

/* Cards & Windows */
.card { position: relative; overflow: hidden; background: var(--card); border: 1px solid var(--line); border-radius: 20px; box-shadow: var(--shadow-sm); transition: transform .3s ease, box-shadow .3s ease, border-color .3s ease; }
.card:hover { border-color: rgba(135,96,57,0.3); box-shadow: var(--shadow-md); }

.ic { width: 48px; height: 48px; border-radius: 13px; background: var(--bg2); color: var(--br); display: grid; place-items: center; flex: none; border: 1px solid var(--line); transition: .3s ease; }
.ic svg { width: 24px; height: 24px; fill: none; stroke: currentColor; stroke-width: 1.8; stroke-linecap: round; stroke-linejoin: round; }
.card:hover .ic { background: var(--br); color: #fff; border-color: var(--br); }

.win { background: #fff; color: var(--ink); border: 1px solid var(--line); border-radius: 20px; overflow: hidden; box-shadow: var(--shadow-md); font-size: 13px; }
.wb { display: flex; align-items: center; justify-content: space-between; padding: 12px 18px; background: var(--bg2); border-bottom: 1px solid var(--line); flex-wrap: wrap; gap: 8px; }
.wb .dots { display: flex; gap: 6px; }
.wb i { width: 10px; height: 10px; border-radius: 50%; display: inline-block; }
.wb i:nth-child(1) { background: #ff5f56; }
.wb i:nth-child(2) { background: #ffbd2e; }
.wb i:nth-child(3) { background: #27c93f; }
.wb .ttl { color: var(--br); font-weight: 500; font-family: 'Outfit', sans-serif; letter-spacing: 0.05em; font-size: 12px; text-transform: uppercase; }

.badge { font-size: 11px; font-weight: 500; padding: 4px 10px; border-radius: 8px; text-transform: uppercase; display: inline-block; letter-spacing: .04em; }
.badge.new { background: #eff6ff; color: #1d4ed8; }
.badge.confirmed { background: #fef3c7; color: #b45309; }
.badge.preparing { background: #ffedd5; color: #c2410c; }
.badge.ready { background: #d1fae5; color: #047857; }
.badge.soldout { background: #fee2e2; color: #b91c1c; }

/* ---------------- HERO SECTION ---------------- */
.hero { padding: 60px 0 90px; background: linear-gradient(180deg, var(--bg2) 0%, #ffffff 100%); position: relative; }
.hero-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 48px; align-items: center; }
.hero-ctx h1 { margin-bottom: 20px; }
.hero-ctx p { font-size: 18px; margin-bottom: 32px; max-width: 540px; }
.hero-btns { display: flex; gap: 16px; flex-wrap: wrap; }

.hero-ui-wrap { position: relative; }
.hero-dashboard { background: #ffffff; border: 1px solid var(--line); border-radius: 24px; box-shadow: var(--shadow-lg); overflow: hidden; }
.hero-hdr { background: var(--bg2); padding: 16px 20px; border-bottom: 1px solid var(--line); display: flex; align-items: center; justify-content: space-between; }
.hero-status-pills { display: flex; gap: 8px; }
.pill { padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 700; background: #fff; border: 1px solid var(--line); color: var(--mute); }
.pill.act { background: var(--br); color: #fff; border-color: var(--br); }

.hero-orders-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px; padding: 16px; background: #faf8f5; }
.order-mini-card { background: #fff; border: 1px solid var(--line); border-radius: 14px; padding: 12px 14px; box-shadow: 0 2px 8px rgba(0,0,0,0.03); }
.om-hdr { display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px; }
.om-id { font-weight: 500; font-size: 13px; color: var(--ink); }
.om-cust { font-size: 12px; font-weight: 600; color: var(--mute); }
.om-items { font-size: 12px; color: var(--ink); margin-bottom: 8px; font-weight: 500; }
.om-ftr { display: flex; justify-content: space-between; align-items: center; border-top: 1px dashed var(--line); padding-top: 6px; font-size: 11px; color: var(--mute); }

/* Floating Campus Badges */
.food-float-tag { position: absolute; background: #ffffff; border: 1px solid var(--line); border-radius: 99px; padding: 6px 14px; font-size: 12px; font-weight: 700; color: var(--ink); box-shadow: var(--shadow-md); display: flex; align-items: center; gap: 8px; z-index: 3; animation: floatAnim 4s ease-in-out infinite alternate; }
.food-float-tag img { width: 24px; height: 24px; border-radius: 50%; object-fit: cover; }
.fft-1 { top: -14px; left: -14px; }
.fft-2 { bottom: 20px; right: -20px; animation-delay: 1.5s; }

@keyframes floatAnim {
  0% { transform: translateY(0); }
  100% { transform: translateY(-8px); }
}

/* ---------------- SECTION 1: FEATURE ECOSYSTEM ---------------- */
.eco-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }
.eco-card { padding: 28px; background: #fff; border: 1px solid var(--line); border-radius: 20px; transition: .3s; }
.eco-card:hover { transform: translateY(-4px); border-color: var(--br); box-shadow: var(--shadow-md); }
.eco-card h3 { margin: 18px 0 8px; font-size: 18px; }
.eco-card p { font-size: 14px; color: var(--mute); }

/* ---------------- SECTION 2: DIGITAL MENU ---------------- */
.menu-sec-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 48px; align-items: center; }
.cat-tabs { display: flex; gap: 8px; overflow-x: auto; padding-bottom: 12px; margin-bottom: 20px; border-bottom: 1px solid var(--line); scrollbar-width: none; }
.cat-tab { padding: 8px 16px; border-radius: 10px; font-size: 13px; font-weight: 700; white-space: nowrap; background: var(--bg2); color: var(--mute); border: 1px solid var(--line); cursor: pointer; }
.cat-tab.act { background: var(--br); color: #fff; border-color: var(--br); }

.menu-items-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 12px; }
.campus-food-card { background: #fff; border: 1px solid var(--line); border-radius: 14px; overflow: hidden; font-size: 13px; }
.campus-food-card img { width: 100%; height: 90px; object-fit: cover; }
.cfc-ctx { padding: 10px; }
.cfc-hdr { font-weight: 700; font-size: 14px; margin-bottom: 2px; }
.cfc-price { font-weight: 500; color: var(--br); font-size: 13px; }
.cfc-btn { width: 100%; margin-top: 8px; padding: 6px; border-radius: 6px; background: var(--br-light); color: var(--br); font-weight: 500; font-size: 12px; border: none; cursor: pointer; }

/* ---------------- SECTION 3: BUSY BREAK TIME ---------------- */
.busy-metrics-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-bottom: 32px; }
.bm-card { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 20px; text-align: center; }
.bm-val { font-size: 36px; font-weight: 500; color: var(--br); line-height: 1; margin-bottom: 6px; }
.bm-lbl { font-size: 13px; font-weight: 700; color: var(--mute); text-transform: uppercase; letter-spacing: .05em; }

/* ---------------- SECTION 5: KITCHEN OPERATIONS ---------------- */
.kot-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; }
.kot-card { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 20px; position: relative; }
.kot-card.prep { border-top: 4px solid var(--amber); }
.kot-card.ready { border-top: 4px solid var(--green); }
.kot-card.new { border-top: 4px solid var(--blue); }
.kot-hdr { display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px; }
.kot-items { font-size: 14px; margin-bottom: 14px; }
.kot-items li { display: flex; justify-content: space-between; padding: 4px 0; border-bottom: 1px dashed #eee; }

/* ---------------- SECTION 6: MULTIPLE FOOD COUNTERS ---------------- */
.counters-grid { display: grid; grid-template-columns: repeat(5, 1fr); gap: 16px; }
.counter-card { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 20px 14px; text-align: center; }
.counter-ic { width: 44px; height: 44px; border-radius: 12px; background: var(--bg2); color: var(--br); display: grid; place-items: center; margin: 0 auto 12px; }

/* ---------------- SECTION 7 & 8: AVAILABILITY & BILLING ---------------- */
.two-col-demo { display: grid; grid-template-columns: 1fr 1fr; gap: 32px; }

.avail-row { display: flex; justify-content: space-between; align-items: center; padding: 12px; background: #fff; border: 1px solid var(--line); border-radius: 12px; margin-bottom: 8px; font-weight: 700; font-size: 14px; }

/* ---------------- SECTION 9 & 10: INVENTORY & REPORTS ---------------- */
.inv-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; }
.inv-card { background: #fff; border: 1px solid var(--line); border-radius: 14px; padding: 18px; }
.inv-hdr { display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px; }

.reports-preview { background: var(--dark); color: #fff; border-radius: 24px; padding: 36px; box-shadow: var(--shadow-lg); }
.rp-hdr { display: flex; justify-content: space-between; align-items: center; margin-bottom: 28px; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 16px; }
.rp-stats { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; margin-bottom: 28px; }
.rp-stat-card { background: var(--dark-card); border: 1px solid rgba(255,255,255,0.08); border-radius: 14px; padding: 16px; }
.rp-stat-val { font-size: 24px; font-weight: 500; color: #fff; margin-top: 4px; }

/* ---------------- SECTION 11: CONNECTED WORKFLOW ---------------- */
.connected-flow { display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px; background: var(--bg2); padding: 32px; border-radius: 24px; border: 1px solid var(--line); margin-top: 36px; }
.cf-node { text-align: center; width: 85px; }
.cf-icon { width: 50px; height: 50px; border-radius: 16px; background: #fff; color: var(--br); border: 1px solid var(--line); display: grid; place-items: center; margin: 0 auto 10px; box-shadow: var(--shadow-sm); }
.cf-arrow { color: var(--br); opacity: 0.6; }

/* ---------------- SECTION 12 & 13: BENEFITS & IDEAL FOR ---------------- */
.benefits-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }
.b-card { background: #fff; border: 1px solid var(--line); border-radius: 20px; padding: 28px; }

.industry-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; }
.ind-card { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 20px; display: flex; align-items: center; gap: 14px; transition: .25s; }
.ind-card:hover { border-color: var(--br); transform: translateY(-2px); box-shadow: var(--shadow-sm); }

/* ---------------- SECTION 14 & 15: STUDENT & MOBILE ---------------- */
.mob-preview-box { max-width: 320px; margin: auto; background: #000; border-radius: 40px; padding: 12px; border: 4px solid #333; box-shadow: var(--shadow-lg); }
.mob-inner { background: #fff; border-radius: 30px; overflow: hidden; min-height: 520px; padding: 16px; font-size: 12px; }

/* ---------------- SECTION 16: CAMPUS SHOWCASE ---------------- */
.biz-types-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; }
.biz-card { background: #fff; border: 1px solid var(--line); border-radius: 18px; overflow: hidden; }
.biz-card img { width: 100%; height: 140px; object-fit: cover; }
.biz-ctx { padding: 16px; text-align: center; font-weight: 500; font-size: 15px; }

/* ---------------- FAQ ---------------- */
.faq-list { max-width: 840px; margin: auto; display: flex; flex-direction: column; gap: 16px; }
.faq-item { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 20px 24px; cursor: pointer; transition: .2s; }
.faq-item summary { font-weight: 700; font-size: 17px; display: flex; justify-content: space-between; align-items: center; list-style: none; }
.faq-item summary::-webkit-details-marker { display: none; }
.faq-item p { margin-top: 12px; font-size: 15px; color: var(--mute); }

/* ---------------- FINAL CTA ---------------- */
.cta-sec { padding: 90px 0; background: linear-gradient(135deg, var(--dark) 0%, #32251c 100%); color: #fff; text-align: center; }
.cta-box { max-width: 760px; margin: auto; }
.cta-box h2 { color: #fff; margin-bottom: 16px; }
.cta-box p { color: rgba(255,255,255,0.8); font-size: 18px; margin-bottom: 36px; }

/* Responsiveness */
@media (max-width: 1024px) {
  .hero-grid, .menu-sec-grid, .two-col-demo { grid-template-columns: 1fr; gap: 36px; }
  .eco-grid, .kot-grid, .benefits-grid, .inv-grid { grid-template-columns: repeat(2, 1fr); }
  .counters-grid { grid-template-columns: repeat(3, 1fr); }
  .industry-grid, .biz-types-grid { grid-template-columns: repeat(2, 1fr); }
  .busy-metrics-grid { grid-template-columns: repeat(2, 1fr); }
  .rp-stats { grid-template-columns: repeat(2, 1fr); }
}

@media (max-width: 768px) {
  .bc { padding: 14px 0 14px; }
  .w { padding: 0 16px; }
  .food-float-tag { display: none; }
  .win { min-width: 0 !important; width: 100%; overflow-x: auto; }
}

@media (max-width: 640px) {
  .eco-grid, .kot-grid, .benefits-grid, .inv-grid, .industry-grid, .biz-types-grid, .counters-grid { grid-template-columns: 1fr; }
  .busy-metrics-grid, .rp-stats { grid-template-columns: 1fr; }
  .hero-orders-grid { grid-template-columns: 1fr; }
  .menu-items-grid { grid-template-columns: 1fr; }
  .connected-flow { justify-content: center; gap: 20px; }
  .cf-arrow { display: none; }
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
    <span class="cur">College Canteen</span>
  </div>
</div>

{{-- HERO SECTION --}}
<section class="hero">
  <div class="w hero-grid">
    <div class="hero-ctx">
      <div class="eb">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
        COLLEGE CANTEEN SOLUTION
      </div>
      <h1>Smarter Canteen Operations. <span class="sf">Better Student</span> Experience.</h1>
      <p>Manage menus, food orders, billing, kitchen operations, inventory and daily canteen activity from one connected platform built for colleges and educational institutions.</p>
      <div class="hero-btns">
        <a href="{{ route('contact.us') }}" class="btn p">Get Started →</a>
        <a href="{{ route('contact.us') }}" class="btn o">Book a Demo →</a>
      </div>
    </div>

    <div class="hero-ui-wrap">
      {{-- Floating Campus Badges --}}
      <div class="food-float-tag fft-1">
        <img src="https://images.unsplash.com/photo-1589301760014-d929f3979dbc?w=80&q=80" alt="Dosa">
        <span>Masala Dosa • Counter 01</span>
      </div>
      <div class="food-float-tag fft-2">
        <img src="https://images.unsplash.com/photo-1601050690597-df0568f70950?w=80&q=80" alt="Samosa">
        <span>Hot Samosa • Snack Counter</span>
      </div>

      <div class="hero-dashboard">
        <div class="hero-hdr">
          <div style="font-weight: 500; font-size:14px; color:var(--ink); display:flex; align-items:center; gap:8px;">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--br)" stroke-width="2.5"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
            Campus Canteen Operations
          </div>
          <div class="hero-status-pills">
            <span class="pill act">Break Rush</span>
            <span class="pill">Active KOTs (12)</span>
          </div>
        </div>

        <div class="hero-orders-grid">
          <div class="order-mini-card">
            <div class="om-hdr">
              <span class="om-id">#2048</span>
              <span class="badge preparing">Preparing</span>
            </div>
            <div class="om-cust">Student Token • Counter 02</div>
            <div class="om-items">Veg Meals × 2, Fresh Lime × 2</div>
            <div class="om-ftr">
              <span>Main Meals Wok</span>
              <span style="font-weight:700; color:var(--br);">₹240</span>
            </div>
          </div>

          <div class="order-mini-card">
            <div class="om-hdr">
              <span class="om-id">#2049</span>
              <span class="badge ready">Ready</span>
            </div>
            <div class="om-cust">Faculty Mess • Counter 01</div>
            <div class="om-items">Masala Dosa × 1, Filter Coffee × 1</div>
            <div class="om-ftr">
              <span>South Counter</span>
              <span style="font-weight:700; color:var(--br);">₹110</span>
            </div>
          </div>

          <div class="order-mini-card">
            <div class="om-hdr">
              <span class="om-id">#2050</span>
              <span class="badge ready">Ready</span>
            </div>
            <div class="om-cust">Student Token • Snack Bar</div>
            <div class="om-items">Samosa × 3, Tea × 2</div>
            <div class="om-ftr">
              <span>Snack Counter</span>
              <span style="font-weight:700; color:var(--br);">₹90</span>
            </div>
          </div>

          <div class="order-mini-card">
            <div class="om-hdr">
              <span class="om-id">#2051</span>
              <span class="badge new">New</span>
            </div>
            <div class="om-cust">Hostel Mess • Counter 03</div>
            <div class="om-items">Paneer Roll × 2, Mango Juice × 1</div>
            <div class="om-ftr">
              <span>Juice Counter</span>
              <span style="font-weight:700; color:var(--br);">₹180</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 1: BUILT FOR COLLEGE CANTEENS --}}
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">Campus Canteen Ecosystem</div>
      <h2>Everything Your Campus Canteen Needs.</h2>
      <p>Keep everyday food service organized across students, staff, counters and kitchen operations.</p>
    </div>

    <div class="eco-grid">
      <div class="eco-card">
        <div class="ic"><svg viewBox="0 0 24 24"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg></div>
        <h3>1. Digital Menu Management</h3>
        <p>Keep your daily food menu structured and easy for students and faculty to explore on mobile or kiosk screens.</p>
      </div>

      <div class="eco-card">
        <div class="ic"><svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="16" rx="2"/><path d="M7 8h10"/><path d="M7 12h10"/><path d="M7 16h6"/></svg></div>
        <h3>2. Food Order Management</h3>
        <p>Keep student and staff orders visible from initial placement to kitchen prep, token generation, and handover.</p>
      </div>

      <div class="eco-card">
        <div class="ic"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg></div>
        <h3>3. Counter Ordering</h3>
        <p>Make busy counter operations fast and painless for cashiers handling massive break-hour crowds.</p>
      </div>

      <div class="eco-card">
        <div class="ic"><svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/></svg></div>
        <h3>4. KOT Management</h3>
        <p>Send clear kitchen order tickets directly to specific food stations without paper loss or confusion.</p>
      </div>

      <div class="eco-card">
        <div class="ic"><svg viewBox="0 0 24 24"><path d="M6 13.87A8 8 0 0 1 17.64 6.11a8 8 0 0 1 3.11 11.41"/></svg></div>
        <h3>5. Kitchen Operations</h3>
        <p>Give cooks and preparation staff an organized live view of batch item quantities and special notes.</p>
      </div>

      <div class="eco-card">
        <div class="ic"><svg viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/></svg></div>
        <h3>6. POS & Billing</h3>
        <p>Process quick counter tokens and payments through one connected point-of-sale interface.</p>
      </div>

      <div class="eco-card">
        <div class="ic"><svg viewBox="0 0 24 24"><rect x="1" y="4" width="22" height="16" rx="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg></div>
        <h3>7. Payments Management</h3>
        <p>Accept daily payments seamlessly via cash, campus prepaid cards, or instant UPI QR scans.</p>
      </div>

      <div class="eco-card">
        <div class="ic"><svg viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg></div>
        <h3>8. Inventory Management</h3>
        <p>Stay aware of essential raw ingredients, milk, tea, coffee powder, and snack stock levels.</p>
      </div>

      <div class="eco-card">
        <div class="ic"><svg viewBox="0 0 24 24"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></div>
        <h3>9. Canteen Analytics</h3>
        <p>Track daily canteen sales, peak break times, top student snacks, and category revenue.</p>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 2: DIGITAL CAMPUS MENU --}}
<section>
  <div class="w menu-sec-grid">
    <div>
      <div class="eb">Digital Menu</div>
      <h2>Make Campus Food Ordering Easier.</h2>
      <p>Give students and staff a simple way to explore available food and quickly find what they want during short break intervals.</p>
      
      <div style="margin-top:24px; display:flex; flex-direction:column; gap:12px;">
        <div style="display:flex; gap:12px; align-items:center;">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--br)" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
          <span style="font-weight:700;">Categorized by Breakfast, Meals, Snacks & Juices</span>
        </div>
        <div style="display:flex; gap:12px; align-items:center;">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--br)" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
          <span style="font-weight:700;">Live sold-out toggles to avoid student disappointment</span>
        </div>
        <div style="display:flex; gap:12px; align-items:center;">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--br)" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
          <span style="font-weight:700;">Clear pricing with student-friendly combo deals</span>
        </div>
      </div>
    </div>

    <div class="win" style="padding:20px;">
      <div class="cat-tabs">
        <span class="cat-tab act">Breakfast</span>
        <span class="cat-tab">Meals</span>
        <span class="cat-tab">Snacks</span>
        <span class="cat-tab">South Indian</span>
        <span class="cat-tab">Beverages</span>
      </div>

      <div class="menu-items-grid">
        <div class="campus-food-card">
          <img src="https://images.unsplash.com/photo-1589301760014-d929f3979dbc?w=200&q=80" alt="Idli & Dosa">
          <div class="cfc-ctx">
            <div class="cfc-hdr">Masala Dosa</div>
            <div class="cfc-price">₹60</div>
            <button class="cfc-btn">+ ADD</button>
          </div>
        </div>

        <div class="campus-food-card">
          <img src="https://images.unsplash.com/photo-1601050690597-df0568f70950?w=200&q=80" alt="Samosa">
          <div class="cfc-ctx">
            <div class="cfc-hdr">Hot Samosa</div>
            <div class="cfc-price">₹20</div>
            <button class="cfc-btn">+ ADD</button>
          </div>
        </div>

        <div class="campus-food-card">
          <img src="https://images.unsplash.com/photo-1546833999-b9f581a1996d?w=200&q=80" alt="Veg Meals">
          <div class="cfc-ctx">
            <div class="cfc-hdr">South Veg Meal</div>
            <div class="cfc-price">₹90</div>
            <button class="cfc-btn">+ ADD</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 3: BUSY BREAK TIME --}}
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">Peak Hour Operations</div>
      <h2>Keep Orders Moving When the Campus Gets Busy.</h2>
      <p>College canteens often experience sudden order surges during break times, lunch hours, and campus events. Keep operations smooth under pressure.</p>
    </div>

    <div class="busy-metrics-grid">
      <div class="bm-card">
        <div class="bm-val">24</div>
        <div class="bm-lbl">New Orders</div>
      </div>
      <div class="bm-card">
        <div class="bm-val">18</div>
        <div class="bm-lbl">Preparing</div>
      </div>
      <div class="bm-card">
        <div class="bm-val">12</div>
        <div class="bm-lbl">Ready for Token</div>
      </div>
      <div class="bm-card">
        <div class="bm-val">146</div>
        <div class="bm-lbl">Served Today</div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 4: COUNTER ORDERING --}}
<section>
  <div class="w menu-sec-grid">
    <div class="win" style="padding:28px;">
      <div class="eb" style="margin-bottom:12px;">Counter POS</div>
      <h3>Make Every Counter Faster.</h3>
      <p style="font-size:14px; margin-bottom:20px;">Give canteen staff a simple interface for quickly creating orders, generating tokens, and completing cash/UPI checkout.</p>

      <div style="background:var(--bg2); padding:16px; border-radius:12px; margin-bottom:20px; font-size:14px;">
        <div style="display:flex; justify-content:space-between; margin-bottom:8px;">
          <span>South Veg Meals × 2</span>
          <strong>₹180</strong>
        </div>
        <div style="display:flex; justify-content:space-between; margin-bottom:8px;">
          <span>Hot Samosa × 3</span>
          <strong>₹60</strong>
        </div>
        <div style="display:flex; justify-content:space-between; margin-bottom:12px;">
          <span>Fresh Lime Soda × 2</span>
          <strong>₹80</strong>
        </div>
        <div style="border-top:2px solid var(--line); padding-top:10px; display:flex; justify-content:space-between; font-weight: 500; font-size:16px; color:var(--br);">
          <span>Total Amount</span>
          <span>₹320</span>
        </div>
      </div>

      <div style="display:flex; gap:10px;">
        <button style="padding:10px 16px; background:var(--br); color:#fff; border:none; border-radius:8px; font-weight:700; cursor:pointer;">Generate Token</button>
        <button style="padding:10px 16px; background:var(--bg2); color:var(--ink); border:1px solid var(--line); border-radius:8px; font-weight:700; cursor:pointer;">Accept UPI</button>
      </div>
    </div>

    <div>
      <div class="eb">Cashier Efficiency</div>
      <h2>Zero Queue Congestion at Cash Counters.</h2>
      <p>Reduce waiting times at main canteen counters with fast-touch order entry and instant thermal token printing.</p>
      
      <div style="margin-top:24px; display:flex; flex-direction:column; gap:12px;">
        <div style="display:flex; gap:12px; align-items:center;">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--br)" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
          <span style="font-weight:700;">2-tap order creation for high-frequency snacks</span>
        </div>
        <div style="display:flex; gap:12px; align-items:center;">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--br)" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
          <span style="font-weight:700;">Instant token receipt printing for kitchen pickup</span>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 5: KITCHEN OPERATIONS --}}
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">Kitchen & KOT Display</div>
      <h2>Keep the Kitchen Organized.</h2>
      <p>Connect canteen food orders directly with KOT displays so preparation cooks know exact item quantities for batch cooking.</p>
    </div>

    <div class="kot-grid">
      <div class="kot-card prep">
        <div class="kot-hdr">
          <div>
            <span style="font-weight: 500; font-size:16px;">KOT #2048</span>
            <div style="font-size:11px; font-weight:700; color:var(--mute);">COUNTER 02 • Student</div>
          </div>
          <span class="badge preparing">Preparing</span>
        </div>
        <ul class="kot-items">
          <li><span>South Veg Meals</span> <strong>× 2</strong></li>
          <li><span>Fresh Lime Soda</span> <strong>× 2</strong></li>
        </ul>
        <div style="background:#fff7ed; color:#c2410c; padding:8px 12px; border-radius:8px; font-size:12px; font-weight:700;">
          Note: Less Spicy for Meals
        </div>
      </div>

      <div class="kot-card ready">
        <div class="kot-hdr">
          <div>
            <span style="font-weight: 500; font-size:16px;">KOT #2049</span>
            <div style="font-size:11px; font-weight:700; color:var(--mute);">COUNTER 01 • Faculty</div>
          </div>
          <span class="badge ready">Ready</span>
        </div>
        <ul class="kot-items">
          <li><span>Masala Dosa</span> <strong>× 1</strong></li>
          <li><span>Filter Coffee</span> <strong>× 1</strong></li>
        </ul>
        <div style="background:#ecfdf5; color:#047857; padding:8px 12px; border-radius:8px; font-size:12px; font-weight:700;">
          Ready at Counter 01
        </div>
      </div>

      <div class="kot-card new">
        <div class="kot-hdr">
          <div>
            <span style="font-weight: 500; font-size:16px;">KOT #2051</span>
            <div style="font-size:11px; font-weight:700; color:var(--mute);">JUICE BAR • Student</div>
          </div>
          <span class="badge new">New</span>
        </div>
        <ul class="kot-items">
          <li><span>Paneer Roll</span> <strong>× 2</strong></li>
          <li><span>Mango Juice</span> <strong>× 1</strong></li>
        </ul>
        <div style="background:#eff6ff; color:#1d4ed8; padding:8px 12px; border-radius:8px; font-size:12px; font-weight:700;">
          Just Received
        </div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 6: MULTIPLE FOOD COUNTERS --}}
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">Multi-Counter Management</div>
      <h2>One Campus. Different Food Counters.</h2>
      <p>Keep different campus food-service areas organized while maintaining central administrative visibility across all sales.</p>
    </div>

    <div class="counters-grid">
      <div class="counter-card">
        <div class="counter-ic"><svg viewBox="0 0 24 24"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg></div>
        <h4 style="font-size:15px; margin-bottom:4px;">Main Canteen</h4>
        <p style="font-size:12px; color:var(--mute);">Meals, Biryani & South Indian</p>
      </div>

      <div class="counter-card">
        <div class="counter-ic"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/></svg></div>
        <h4 style="font-size:15px; margin-bottom:4px;">Snack Counter</h4>
        <p style="font-size:12px; color:var(--mute);">Samosa, Puffs & Sandwiches</p>
      </div>

      <div class="counter-card">
        <div class="counter-ic"><svg viewBox="0 0 24 24"><path d="M18 8h1a4 4 0 0 1 0 8h-1"/></svg></div>
        <h4 style="font-size:15px; margin-bottom:4px;">Juice Bar</h4>
        <p style="font-size:12px; color:var(--mute);">Fresh Juices & Milkshakes</p>
      </div>

      <div class="counter-card">
        <div class="counter-ic"><svg viewBox="0 0 24 24"><path d="M17 8h1a4 4 0 0 1 0 8h-1"/></svg></div>
        <h4 style="font-size:15px; margin-bottom:4px;">Coffee Corner</h4>
        <p style="font-size:12px; color:var(--mute);">Tea, Filter Coffee & Snacks</p>
      </div>

      <div class="counter-card">
        <div class="counter-ic"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/></svg></div>
        <h4 style="font-size:15px; margin-bottom:4px;">Fast Food Wok</h4>
        <p style="font-size:12px; color:var(--mute);">Rolls, Noodles & Burgers</p>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 7 & 8: FOOD AVAILABILITY & BILLING --}}
<section style="background: var(--bg2);">
  <div class="w two-col-demo">
    {{-- Food Availability --}}
    <div class="win" style="padding:28px;">
      <div class="eb" style="margin-bottom:12px;">Item Availability</div>
      <h3>Show Students What’s Available.</h3>
      <p style="font-size:14px; margin-bottom:20px;">Toggle item stock status instantly so students know what can be prepared right now.</p>

      <div class="avail-row">
        <span>South Veg Meal</span>
        <span style="color:var(--green);">✓ AVAILABLE</span>
      </div>
      <div class="avail-row">
        <span>Chicken Biryani</span>
        <span style="color:var(--green);">✓ AVAILABLE</span>
      </div>
      <div class="avail-row">
        <span>Hot Samosa</span>
        <span style="color:var(--green);">✓ AVAILABLE</span>
      </div>
      <div class="avail-row" style="background:#fef2f2; border-color:#fecaca;">
        <span>Paneer Roll</span>
        <span style="color:var(--red);">✕ SOLD OUT</span>
      </div>
    </div>

    {{-- Billing & Payments --}}
    <div class="win" style="padding:28px;">
      <div class="eb" style="margin-bottom:12px;">Student Payments</div>
      <h3>Simple Payments for Campus Orders.</h3>
      <p style="font-size:14px; margin-bottom:20px;">Process checkout transactions quickly with support for modern campus payment modes.</p>

      <div style="background:var(--bg2); padding:16px; border-radius:12px; margin-bottom:20px; font-size:14px;">
        <div style="display:flex; justify-content:space-between; margin-bottom:6px;">
          <span>Veg Meal × 1</span>
          <span>₹80</span>
        </div>
        <div style="display:flex; justify-content:space-between; margin-bottom:6px;">
          <span>Fresh Lime × 1</span>
          <span>₹40</span>
        </div>
        <div style="display:flex; justify-content:space-between; margin-bottom:10px;">
          <span>Samosa × 2</span>
          <span>₹40</span>
        </div>
        <div style="border-top:2px solid var(--line); padding-top:8px; display:flex; justify-content:space-between; font-weight: 500; font-size:16px; color:var(--br);">
          <span>TOTAL</span>
          <span>₹160</span>
        </div>
      </div>

      <div style="display:flex; gap:10px;">
        <span style="padding:8px 16px; background:#fff; border:1px solid var(--line); border-radius:8px; font-weight:700; font-size:13px; color:var(--green);">✓ Cash</span>
        <span style="padding:8px 16px; background:#fff; border:1px solid var(--line); border-radius:8px; font-weight:700; font-size:13px; color:var(--purple);">✓ UPI QR</span>
        <span style="padding:8px 16px; background:#fff; border:1px solid var(--line); border-radius:8px; font-weight:700; font-size:13px; color:var(--blue);">✓ Campus Card</span>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 9: INVENTORY MANAGEMENT --}}
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">Stock Control</div>
      <h2>Know What You Have Before the Lunch Rush.</h2>
      <p>Monitor raw ingredients, vegetables, cooking oil, and milk to keep your canteen kitchen ready for heavy daily demand.</p>
    </div>

    <div class="inv-grid">
      <div class="inv-card">
        <div class="inv-hdr">
          <strong style="font-size:15px;">Rice Stock</strong>
          <span style="color:var(--green); font-weight: 500; font-size:12px;">Sufficient</span>
        </div>
        <div style="font-size:24px; font-weight: 500; color:var(--ink);">40 kg</div>
        <div style="font-size:12px; color:var(--mute); margin-top:4px;">Main meals kitchen</div>
      </div>

      <div class="inv-card">
        <div class="inv-hdr">
          <strong style="font-size:15px;">Fresh Vegetables</strong>
          <span style="color:var(--green); font-weight: 500; font-size:12px;">Sufficient</span>
        </div>
        <div style="font-size:24px; font-weight: 500; color:var(--ink);">25 kg</div>
        <div style="font-size:12px; color:var(--mute); margin-top:4px;">Daily fresh delivery</div>
      </div>

      <div class="inv-card" style="border-color:var(--amber);">
        <div class="inv-hdr">
          <strong style="font-size:15px;">Fresh Milk</strong>
          <span style="color:var(--amber); font-weight: 500; font-size:12px;">Low Stock</span>
        </div>
        <div style="font-size:24px; font-weight: 500; color:var(--amber);">15 L</div>
        <div style="font-size:12px; color:var(--mute); margin-top:4px;">Tea & Coffee section</div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 10: REPORTS & ADMINISTRATION --}}
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">Canteen Intelligence</div>
      <h2>Understand Your Canteen Performance.</h2>
      <p>Analyze daily sales, total student orders, popular food items, and peak break hour activity.</p>
    </div>

    <div class="reports-preview">
      <div class="rp-hdr">
        <div>
          <h3 style="color:#fff; font-size:20px;">Daily Canteen Report</h3>
          <span style="font-size:13px; color:rgba(255,255,255,0.6);">Campus management analytics</span>
        </div>
        <span style="padding:6px 14px; background:rgba(255,255,255,0.1); border-radius:8px; font-size:13px; font-weight:700;">Today's Summary</span>
      </div>

      <div class="rp-stats">
        <div class="rp-stat-card">
          <div style="font-size:12px; color:rgba(255,255,255,0.6);">DAILY REVENUE</div>
          <div class="rp-stat-val">₹38,450</div>
        </div>
        <div class="rp-stat-card">
          <div style="font-size:12px; color:rgba(255,255,255,0.6);">TOTAL ORDERS</div>
          <div class="rp-stat-val">412</div>
        </div>
        <div class="rp-stat-card">
          <div style="font-size:12px; color:rgba(255,255,255,0.6);">TOP SNACK</div>
          <div class="rp-stat-val">Samosa</div>
        </div>
        <div class="rp-stat-card">
          <div style="font-size:12px; color:rgba(255,255,255,0.6);">PEAK RUSH</div>
          <div class="rp-stat-val">1:00 - 2:00 PM</div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 11: CONNECTED CAMPUS CANTEEN WORKFLOW --}}
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">Campus Canteen Flow</div>
      <h2>Everything From Menu to Service.</h2>
      <p>Connect student food ordering, counter tokens, kitchen preparation, and administration in one platform.</p>
    </div>

    <div class="connected-flow">
      <div class="cf-node">
        <div class="cf-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg></div>
        <span style="font-size:12px; font-weight: 500;">Student / Staff</span>
      </div>
      <div class="cf-arrow">→</div>

      <div class="cf-node">
        <div class="cf-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg></div>
        <span style="font-size:12px; font-weight: 500;">Menu</span>
      </div>
      <div class="cf-arrow">→</div>

      <div class="cf-node">
        <div class="cf-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="16" rx="2"/></svg></div>
        <span style="font-size:12px; font-weight: 500;">Order</span>
      </div>
      <div class="cf-arrow">→</div>

      <div class="cf-node">
        <div class="cf-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/></svg></div>
        <span style="font-size:12px; font-weight: 500;">KOT</span>
      </div>
      <div class="cf-arrow">→</div>

      <div class="cf-node">
        <div class="cf-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 13.87A8 8 0 0 1 17.64 6.11a8 8 0 0 1 3.11 11.41"/></svg></div>
        <span style="font-size:12px; font-weight: 500;">Kitchen</span>
      </div>
      <div class="cf-arrow">→</div>

      <div class="cf-node">
        <div class="cf-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg></div>
        <span style="font-size:12px; font-weight: 500;">Ready</span>
      </div>
      <div class="cf-arrow">→</div>

      <div class="cf-node">
        <div class="cf-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/></svg></div>
        <span style="font-size:12px; font-weight: 500;">Serve / Token</span>
      </div>
      <div class="cf-arrow">→</div>

      <div class="cf-node">
        <div class="cf-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></div>
        <span style="font-size:12px; font-weight: 500;">Reports</span>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 12: WHY GENI MENU FOR COLLEGE CANTEENS --}}
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">Key Benefits</div>
      <h2>Built for Busy Campus Food Service.</h2>
      <p>Streamline canteen operations, reduce student queue times, and eliminate cash handling friction.</p>
    </div>

    <div class="benefits-grid">
      <div class="b-card">
        <h3>1. Faster Ordering</h3>
        <p>Keep food orders moving rapidly during short campus break intervals and lunch rushes.</p>
      </div>

      <div class="b-card">
        <h3>2. Simpler Counter Operations</h3>
        <p>Make everyday checkout and token generation simple for canteen cashier staff.</p>
      </div>

      <div class="b-card">
        <h3>3. Clear Kitchen Workflow</h3>
        <p>Keep food preparation staff organized with live KOT displays for batch cooking.</p>
      </div>

      <div class="b-card">
        <h3>4. Better Food Availability</h3>
        <p>Keep students informed in real time about available items and sold-out dishes.</p>
      </div>

      <div class="b-card">
        <h3>5. Inventory Visibility</h3>
        <p>Maintain awareness of essential raw ingredients and milk stock before peak demand.</p>
      </div>

      <div class="b-card">
        <h3>6. Canteen Insights</h3>
        <p>Gain actionable reports on daily canteen revenue, student volume, and top menu items.</p>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 13: IDEAL FOR --}}
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">Educational Institution Fit</div>
      <h2>Designed for Different Campus Food Environments.</h2>
      <p>Tailored specifically for colleges, universities, and student dining facilities.</p>
    </div>

    <div class="industry-grid">
      <div class="ind-card">
        <div class="ic"><svg viewBox="0 0 24 24"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg></div>
        <span style="font-weight:700;">College Canteens</span>
      </div>

      <div class="ind-card">
        <div class="ic"><svg viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg></div>
        <span style="font-weight:700;">University Canteens</span>
      </div>

      <div class="ind-card">
        <div class="ic"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/></svg></div>
        <span style="font-weight:700;">Student Food Courts</span>
      </div>

      <div class="ind-card">
        <div class="ic"><svg viewBox="0 0 24 24"><path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg></div>
        <span style="font-weight:700;">Hostel Messes</span>
      </div>

      <div class="ind-card">
        <div class="ic"><svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg></div>
        <span style="font-weight:700;">Faculty Cafeterias</span>
      </div>

      <div class="ind-card">
        <div class="ic"><svg viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5z"/></svg></div>
        <span style="font-weight:700;">Staff Canteens</span>
      </div>

      <div class="ind-card">
        <div class="ic"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/></svg></div>
        <span style="font-weight:700;">Engineering Colleges</span>
      </div>

      <div class="ind-card">
        <div class="ic"><svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></div>
        <span style="font-weight:700;">Medical Colleges</span>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 14 & 15: STUDENT & MOBILE ADMIN EXPERIENCE --}}
<section style="background: var(--bg2);">
  <div class="w menu-sec-grid">
    <div>
      <div class="eb">Mobile Management</div>
      <h2>Your Campus Canteen. Within Reach.</h2>
      <p>Stay connected to your canteen operations, track break-hour sales, and monitor stock levels directly from your smartphone.</p>
      
      <div style="margin-top:24px; display:flex; flex-direction:column; gap:12px;">
        <div style="display:flex; gap:12px; align-items:center;">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--br)" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
          <span style="font-weight:700;">Real-time canteen revenue & token counters</span>
        </div>
        <div style="display:flex; gap:12px; align-items:center;">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--br)" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
          <span style="font-weight:700;">Instant notifications for kitchen KOT delays</span>
        </div>
        <div style="display:flex; gap:12px; align-items:center;">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--br)" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
          <span style="font-weight:700;">Update item availability with a single tap</span>
        </div>
      </div>
    </div>

    <div class="mob-preview-box">
      <div class="mob-inner">
        <div style="text-align:center; font-weight: 500; border-bottom:1px solid #eee; padding-bottom:8px; margin-bottom:12px;">Geni Canteen Admin</div>
        <div style="background:var(--bg2); border-radius:10px; padding:10px; margin-bottom:10px;">
          <div style="font-size:10px; color:var(--mute);">BREAK RUSH SALES</div>
          <div style="font-size:18px; font-weight: 500; color:var(--br);">₹38,450</div>
        </div>
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:8px; margin-bottom:10px;">
          <div style="background:#eff6ff; padding:8px; border-radius:8px;">
            <div style="font-size:9px; color:#1d4ed8;">ACTIVE KOTS</div>
            <div style="font-size:14px; font-weight: 500;">18 Orders</div>
          </div>
          <div style="background:#ecfdf5; padding:8px; border-radius:8px;">
            <div style="font-size:9px; color:#047857;">READY TOKENS</div>
            <div style="font-size:14px; font-weight: 500;">12 Tokens</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 16: CAMPUS SHOWCASE --}}
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">Campus Showcase</div>
      <h2>One Platform. Different Campus Needs.</h2>
      <p>Purpose-built for high order volume across college canteens, hostels, and cafeterias.</p>
    </div>

    <div class="biz-types-grid">
      <div class="biz-card">
        <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=400&q=80" alt="College Campus">
        <div class="biz-ctx">Engineering Canteens</div>
      </div>
      <div class="biz-card">
        <img src="https://images.unsplash.com/photo-1541339907198-e08756dedf3f?w=400&q=80" alt="University Cafeteria">
        <div class="biz-ctx">University Food Courts</div>
      </div>
      <div class="biz-card">
        <img src="https://images.unsplash.com/photo-1567521464027-f127ff144326?w=400&q=80" alt="Campus Cafeteria">
        <div class="biz-ctx">Hostel Messes</div>
      </div>
      <div class="biz-card">
        <img src="https://images.unsplash.com/photo-1589301760014-d929f3979dbc?w=400&q=80" alt="South Indian Meal">
        <div class="biz-ctx">Faculty Cafeterias</div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 17: FAQ --}}
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">Frequently Asked Questions</div>
      <h2>Everything You Need to Know.</h2>
      <p>Common questions about implementing Geni Menu for your college canteen.</p>
    </div>

    <div class="faq-list">
      <details class="faq-item" open>
        <summary>1. Is Geni Menu suitable for college canteens? <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg></summary>
        <p>Yes. Geni Menu is designed to handle high-volume break-hour surges, multi-counter ordering, kitchen KOTs, and rapid token printing for campus canteens.</p>
      </details>

      <details class="faq-item">
        <summary>2. Can students browse the digital menu on their phones? <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg></summary>
        <p>Yes. Students can scan QR codes placed around the canteen or campus to view current food items, pricing, and availability.</p>
      </details>

      <details class="faq-item">
        <summary>3. Can canteen staff manage food availability and sold-out items? <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg></summary>
        <p>Yes. Staff can toggle items as AVAILABLE or SOLD OUT with a single tap to keep students accurately informed.</p>
      </details>

      <details class="faq-item">
        <summary>4. Can I manage multiple food counters under one system? <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg></summary>
        <p>Yes. Separate counters such as Meals, Snacks, Juice Bar, and Coffee Corner can operate independently while feeding into central reporting.</p>
      </details>

      <details class="faq-item">
        <summary>5. Can I manage KOTs for kitchen stations? <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg></summary>
        <p>Yes. Orders automatically trigger kitchen order tickets or display on digital KDS screens for kitchen staff.</p>
      </details>

      <details class="faq-item">
        <summary>6. Can I manage canteen billing and cash/UPI payments? <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg></summary>
        <p>Yes. Cashiers can complete bills in seconds and record cash, credit cards, or instant UPI payment transactions.</p>
      </details>

      <details class="faq-item">
        <summary>7. Can I track daily canteen inventory? <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg></summary>
        <p>Yes. Monitor essential stock items such as rice, vegetables, cooking oil, and milk to prepare for peak break rushes.</p>
      </details>

      <details class="faq-item">
        <summary>8. Can I view daily sales and canteen reports? <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg></summary>
        <p>Yes. Canteen administrators can review daily revenue, total orders, top-selling snacks, and peak sales hours.</p>
      </details>
    </div>
  </div>
</section>

{{-- FINAL CTA --}}
<section class="cta-sec">
  <div class="w cta-box">
    <h2>Ready to Make Your College Canteen Smarter?</h2>
    <p>Manage your menu, food orders, multi-counter operations, kitchen, billing, inventory and reports from one connected platform with Geni Menu.</p>
    <div style="display:flex; justify-content:center; gap:16px; flex-wrap:wrap;">
      <a href="{{ route('contact.us') }}" class="btn p" style="background:#fff; color:var(--br); border-color:#fff;">Get Started →</a>
      <a href="{{ route('contact.us') }}" class="btn o" style="color:#fff; border-color:#fff; background:transparent;">Book a Demo →</a>
    </div>
  </div>
</section>

@endsection
