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
.bc { padding: 104px 0 16px; background: var(--bg2); border-bottom: 1px solid var(--line); font-size: 14px; color: var(--mute); font-weight: 600; }
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
.wb .ttl { color: var(--br); font-weight: 800; font-family: 'Outfit', sans-serif; letter-spacing: 0.05em; font-size: 12px; text-transform: uppercase; }

.badge { font-size: 11px; font-weight: 800; padding: 4px 10px; border-radius: 8px; text-transform: uppercase; display: inline-block; letter-spacing: .04em; }
.badge.new { background: #eff6ff; color: #1d4ed8; }
.badge.confirmed { background: #fef3c7; color: #b45309; }
.badge.preparing { background: #ffedd5; color: #c2410c; }
.badge.ready { background: #d1fae5; color: #047857; }
.badge.picked { background: #f3e8ff; color: #6b21a8; }

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
.om-id { font-weight: 800; font-size: 13px; color: var(--ink); }
.om-cust { font-size: 12px; font-weight: 600; color: var(--mute); }
.om-items { font-size: 12px; color: var(--ink); margin-bottom: 8px; font-weight: 500; }
.om-ftr { display: flex; justify-content: space-between; align-items: center; border-top: 1px dashed var(--line); padding-top: 6px; font-size: 11px; color: var(--mute); }

/* Floating Food Overlay Badges */
.food-float-tag { position: absolute; background: #ffffff; border: 1px solid var(--line); border-radius: 99px; padding: 6px 14px; font-size: 12px; font-weight: 700; color: var(--ink); box-shadow: var(--shadow-md); display: flex; align-items: center; gap: 8px; z-index: 3; animation: floatAnim 4s ease-in-out infinite alternate; }
.food-float-tag img { width: 24px; height: 24px; border-radius: 50%; object-fit: cover; }
.fft-1 { top: -14px; left: -14px; }
.fft-2 { bottom: 20px; right: -20px; animation-delay: 1.5s; }
.fft-3 { top: 40%; left: -24px; animation-delay: 2.5s; }

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

.menu-items-list { display: flex; flex-direction: column; gap: 12px; }
.menu-item-row { display: flex; align-items: center; justify-content: space-between; padding: 12px; background: #fff; border: 1px solid var(--line); border-radius: 14px; gap: 14px; }
.menu-item-row img { width: 60px; height: 60px; border-radius: 12px; object-fit: cover; }
.mi-details h4 { font-size: 15px; font-weight: 700; margin-bottom: 2px; }
.mi-details span { font-size: 13px; font-weight: 800; color: var(--br); }
.mi-add-btn { padding: 6px 14px; border-radius: 8px; background: var(--br-light); color: var(--br); font-weight: 800; font-size: 13px; border: 1px solid rgba(135,96,57,0.2); }

/* ---------------- SECTION 3: ORDER LIFECYCLE ---------------- */
.lifecycle-bar { display: flex; justify-content: space-between; align-items: center; background: var(--bg2); padding: 16px 24px; border-radius: 16px; border: 1px solid var(--line); margin-top: 24px; flex-wrap: wrap; gap: 12px; }
.lc-step { display: flex; align-items: center; gap: 8px; font-weight: 800; font-size: 13px; color: var(--mute); }
.lc-step.act { color: var(--br); }
.lc-dot { width: 10px; height: 10px; border-radius: 50%; background: #ccc; }
.lc-step.act .lc-dot { background: var(--br); box-shadow: 0 0 0 4px rgba(135,96,57,0.2); }

.order-detail-card { background: #fff; border: 1px solid var(--line); border-radius: 20px; padding: 24px; box-shadow: var(--shadow-md); margin-top: 24px; }
.odc-hdr { display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid var(--line); padding-bottom: 16px; margin-bottom: 16px; }

/* ---------------- SECTION 4: KITCHEN & KOT ---------------- */
.kot-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; }
.kot-card { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 20px; position: relative; }
.kot-card.prep { border-top: 4px solid var(--amber); }
.kot-card.ready { border-top: 4px solid var(--green); }
.kot-card.new { border-top: 4px solid var(--blue); }
.kot-hdr { display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px; }
.kot-items { font-size: 14px; margin-bottom: 14px; }
.kot-items li { display: flex; justify-content: space-between; padding: 4px 0; border-bottom: 1px dashed #eee; }

/* ---------------- SECTION 5: PICKUP DASHBOARD ---------------- */
.pickup-cols { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; }
.pickup-col { background: var(--bg2); border: 1px solid var(--line); border-radius: 18px; padding: 20px; }
.pcol-hdr { display: flex; justify-content: space-between; align-items: center; font-weight: 800; font-size: 14px; margin-bottom: 16px; padding-bottom: 8px; border-bottom: 2px solid var(--line); }
.pickup-ticket { background: #fff; border: 1px solid var(--line); border-radius: 12px; padding: 12px 16px; margin-bottom: 10px; display: flex; justify-content: space-between; align-items: center; }

/* ---------------- SECTION 6: COUNTER OPERATIONS Workflow ---------------- */
.workflow-flow-grid { display: grid; grid-template-columns: repeat(6, 1fr); gap: 12px; text-align: center; position: relative; margin-top: 40px; }
.wf-step-box { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 20px 10px; box-shadow: var(--shadow-sm); }
.wf-step-num { width: 28px; height: 28px; border-radius: 50%; background: var(--br-light); color: var(--br); font-weight: 800; font-size: 12px; display: grid; place-items: center; margin: 0 auto 10px; }

/* ---------------- SECTION 7 & 8: BILLING & CUSTOMER ---------------- */
.two-col-demo { display: grid; grid-template-columns: 1fr 1fr; gap: 32px; }

/* ---------------- SECTION 9 & 10: INVENTORY & REPORTS ---------------- */
.inv-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; }
.inv-card { background: #fff; border: 1px solid var(--line); border-radius: 14px; padding: 18px; }
.inv-hdr { display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px; }

.reports-preview { background: var(--dark); color: #fff; border-radius: 24px; padding: 36px; box-shadow: var(--shadow-lg); }
.rp-hdr { display: flex; justify-content: space-between; align-items: center; margin-bottom: 28px; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 16px; }
.rp-stats { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; margin-bottom: 28px; }
.rp-stat-card { background: var(--dark-card); border: 1px solid rgba(255,255,255,0.08); border-radius: 14px; padding: 16px; }
.rp-stat-val { font-size: 24px; font-weight: 800; color: #fff; margin-top: 4px; }

/* ---------------- SECTION 11: CONNECTED WORKFLOW ---------------- */
.connected-flow { display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 12px; background: var(--bg2); padding: 32px; border-radius: 24px; border: 1px solid var(--line); margin-top: 36px; }
.cf-node { text-align: center; width: 90px; }
.cf-icon { width: 52px; height: 52px; border-radius: 16px; background: #fff; color: var(--br); border: 1px solid var(--line); display: grid; place-items: center; margin: 0 auto 10px; box-shadow: var(--shadow-sm); }
.cf-arrow { color: var(--br); opacity: 0.6; }

/* ---------------- SECTION 12 & 13: BENEFITS & IDEAL FOR ---------------- */
.benefits-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }
.b-card { background: #fff; border: 1px solid var(--line); border-radius: 20px; padding: 28px; }

.industry-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; }
.ind-card { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 20px; display: flex; align-items: center; gap: 14px; transition: .25s; }
.ind-card:hover { border-color: var(--br); transform: translateY(-2px); box-shadow: var(--shadow-sm); }

/* ---------------- SECTION 14 & 15: CUSTOMER EXPERIENCE & MOBILE ---------------- */
.mob-preview-box { max-width: 320px; margin: auto; background: #000; border-radius: 40px; padding: 12px; border: 4px solid #333; box-shadow: var(--shadow-lg); }
.mob-inner { background: #fff; border-radius: 30px; overflow: hidden; min-height: 520px; padding: 16px; font-size: 12px; }

/* ---------------- SECTION 16: BUSINESS TYPES ---------------- */
.biz-types-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; }
.biz-card { background: #fff; border: 1px solid var(--line); border-radius: 18px; overflow: hidden; }
.biz-card img { width: 100%; height: 140px; object-fit: cover; }
.biz-ctx { padding: 16px; text-align: center; font-weight: 800; font-size: 15px; }

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
  .eco-grid, .kot-grid, .pickup-cols, .benefits-grid, .inv-grid { grid-template-columns: repeat(2, 1fr); }
  .industry-grid, .biz-types-grid { grid-template-columns: repeat(2, 1fr); }
  .workflow-flow-grid { grid-template-columns: repeat(3, 1fr); }
  .rp-stats { grid-template-columns: repeat(2, 1fr); }
}

@media (max-width: 768px) {
  .bc { padding: 85px 0 14px; }
  .w { padding: 0 16px; }
  .food-float-tag { display: none; }
  .win { min-width: 0 !important; width: 100%; overflow-x: auto; }
}

@media (max-width: 640px) {
  .eco-grid, .kot-grid, .pickup-cols, .benefits-grid, .inv-grid, .industry-grid, .biz-types-grid { grid-template-columns: 1fr; }
  .workflow-flow-grid { grid-template-columns: 1fr; }
  .rp-stats { grid-template-columns: 1fr; }
  .hero-orders-grid { grid-template-columns: 1fr; }
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
    <span class="cur">Takeaway Restaurants</span>
  </div>
</div>

{{-- HERO SECTION --}}
<section class="hero">
  <div class="w hero-grid">
    <div class="hero-ctx">
      <div class="eb">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
        TAKEAWAY RESTAURANT SOLUTION
      </div>
      <h1>Make Every Takeaway Order <span class="sf">Fast, Simple</span> & Organized.</h1>
      <p>Manage menus, takeaway orders, kitchen operations, billing, payments and customer pickups from one connected restaurant platform built for high counter volume.</p>
      <div class="hero-btns">
        <a href="{{ route('contact.us') }}" class="btn p">Get Started →</a>
        <a href="{{ route('contact.us') }}" class="btn o">Book a Demo →</a>
      </div>
    </div>

    <div class="hero-ui-wrap">
      {{-- Floating Food Overlay Badges --}}
      <div class="food-float-tag fft-1">
        <img src="https://images.unsplash.com/photo-1563379091339-03b21ab4a4f8?w=80&q=80" alt="Biryani">
        <span>Hyderabadi Biryani</span>
      </div>
      <div class="food-float-tag fft-2">
        <img src="https://images.unsplash.com/photo-1568901346375-23c9450c58cd?w=80&q=80" alt="Burger">
        <span>Crispy Burger</span>
      </div>

      <div class="hero-dashboard">
        <div class="hero-hdr">
          <div style="font-weight:800; font-size:14px; color:var(--ink); display:flex; align-items:center; gap:8px;">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--br)" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
            Live Takeaway Counter
          </div>
          <div class="hero-status-pills">
            <span class="pill act">All (18)</span>
            <span class="pill">Preparing (6)</span>
            <span class="pill">Ready (4)</span>
          </div>
        </div>

        <div class="hero-orders-grid">
          <div class="order-mini-card">
            <div class="om-hdr">
              <span class="om-id">#1256</span>
              <span class="badge preparing">Preparing</span>
            </div>
            <div class="om-cust">Arun Kumar • 7:30 PM</div>
            <div class="om-items">Chicken Biryani ×2, Paneer 65 ×1</div>
            <div class="om-ftr">
              <span>Takeaway Counter</span>
              <span style="font-weight:700; color:var(--br);">₹1,020</span>
            </div>
          </div>

          <div class="order-mini-card">
            <div class="om-hdr">
              <span class="om-id">#1257</span>
              <span class="badge ready">Ready</span>
            </div>
            <div class="om-cust">Priya S. • 7:25 PM</div>
            <div class="om-items">Butter Chicken Meal ×1, Naan ×3</div>
            <div class="om-ftr">
              <span>Pickup Box 2</span>
              <span style="font-weight:700; color:var(--br);">₹540</span>
            </div>
          </div>

          <div class="order-mini-card">
            <div class="om-hdr">
              <span class="om-id">#1258</span>
              <span class="badge ready">Ready</span>
            </div>
            <div class="om-cust">Vikram R. • 7:28 PM</div>
            <div class="om-items">Zinger Burger Combo ×2</div>
            <div class="om-ftr">
              <span>Pickup Box 4</span>
              <span style="font-weight:700; color:var(--br);">₹480</span>
            </div>
          </div>

          <div class="order-mini-card">
            <div class="om-hdr">
              <span class="om-id">#1259</span>
              <span class="badge preparing">Preparing</span>
            </div>
            <div class="om-cust">Deepak K. • 7:35 PM</div>
            <div class="om-items">Veg Hakka Noodles ×2, Manchurian</div>
            <div class="om-ftr">
              <span>Kitchen Wok</span>
              <span style="font-weight:700; color:var(--br);">₹620</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 1: BUILT FOR TAKEAWAY RESTAURANTS --}}
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">Built for Takeaway Operations</div>
      <h2>Everything You Need to Keep Orders Moving.</h2>
      <p>Manage your entire takeaway business from one single interface without switching between fragmented systems.</p>
    </div>

    <div class="eco-grid">
      <div class="eco-card">
        <div class="ic"><svg viewBox="0 0 24 24"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg></div>
        <h3>1. Digital Menu Management</h3>
        <p>Keep your takeaway menu structured, updated in real time, and clear for quick customer browsing.</p>
      </div>

      <div class="eco-card">
        <div class="ic"><svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="16" rx="2"/><path d="M7 8h10"/><path d="M7 12h10"/><path d="M7 16h6"/></svg></div>
        <h3>2. Takeaway Order Management</h3>
        <p>Keep every takeaway ticket visible from placement to preparation, pickup, and payment.</p>
      </div>

      <div class="eco-card">
        <div class="ic"><svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg></div>
        <h3>3. KOT Management</h3>
        <p>Send clear kitchen order tickets directly to preparation stations without paper loss or miscommunication.</p>
      </div>

      <div class="eco-card">
        <div class="ic"><svg viewBox="0 0 24 24"><path d="M6 13.87A8 8 0 0 1 17.64 6.11a8 8 0 0 1 3.11 11.41M12 2v4M2 12h4"/></svg></div>
        <h3>4. Kitchen Operations</h3>
        <p>Give your kitchen staff an organized live view of item quantities, preparation time, and special notes.</p>
      </div>

      <div class="eco-card">
        <div class="ic"><svg viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg></div>
        <h3>5. POS & Counter Billing</h3>
        <p>Process walk-in counter orders and swift checkout transactions in just two taps.</p>
      </div>

      <div class="eco-card">
        <div class="ic"><svg viewBox="0 0 24 24"><rect x="1" y="4" width="22" height="16" rx="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg></div>
        <h3>6. Payments Management</h3>
        <p>Accept payments effortlessly via cash, credit cards, or instant UPI QR code scanners.</p>
      </div>

      <div class="eco-card">
        <div class="ic"><svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg></div>
        <h3>7. Customer Management</h3>
        <p>Keep customer records, contact numbers, and order histories linked for fast re-ordering.</p>
      </div>

      <div class="eco-card">
        <div class="ic"><svg viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg></div>
        <h3>8. Inventory Management</h3>
        <p>Track essential takeaway packaging, boxes, and raw ingredients to prevent stockouts.</p>
      </div>

      <div class="eco-card">
        <div class="ic"><svg viewBox="0 0 24 24"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></div>
        <h3>9. Takeaway Analytics</h3>
        <p>Analyze daily takeaway volume, peak pickup hours, top-selling items, and counter revenue.</p>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 2: DIGITAL MENU --}}
<section>
  <div class="w menu-sec-grid">
    <div>
      <div class="eb">Fast Digital Menu</div>
      <h2>Your Menu. Ready for Quick Ordering.</h2>
      <p>Help customers browse items, combos, and beverages quickly with an intuitive digital menu designed for fast scanning and ordering.</p>
      
      <div style="margin-top:24px; display:flex; flex-direction:column; gap:12px;">
        <div style="display:flex; gap:12px; align-items:center;">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--br)" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
          <span style="font-weight:700;">Instant category filtering & search</span>
        </div>
        <div style="display:flex; gap:12px; align-items:center;">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--br)" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
          <span style="font-weight:700;">Clear item availability & out-of-stock toggles</span>
        </div>
        <div style="display:flex; gap:12px; align-items:center;">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--br)" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
          <span style="font-weight:700;">High-resolution food photos to boost order value</span>
        </div>
      </div>
    </div>

    <div class="win" style="padding:20px;">
      <div class="cat-tabs">
        <span class="cat-tab act">Biryani</span>
        <span class="cat-tab">Rice & Noodles</span>
        <span class="cat-tab">Burgers</span>
        <span class="cat-tab">Pizza</span>
        <span class="cat-tab">Combos</span>
        <span class="cat-tab">Beverages</span>
      </div>

      <div class="menu-items-list">
        <div class="menu-item-row">
          <img src="https://images.unsplash.com/photo-1563379091339-03b21ab4a4f8?w=120&q=80" alt="Biryani">
          <div class="mi-details">
            <h4>Hyderabadi Chicken Biryani</h4>
            <span>₹320</span>
          </div>
          <button class="mi-add-btn">+ ADD</button>
        </div>

        <div class="menu-item-row">
          <img src="https://images.unsplash.com/photo-1603894584373-5ac82b2ae398?w=120&q=80" alt="Paneer 65">
          <div class="mi-details">
            <h4>Paneer 65 Starter</h4>
            <span>₹220</span>
          </div>
          <button class="mi-add-btn">+ ADD</button>
        </div>

        <div class="menu-item-row">
          <img src="https://images.unsplash.com/photo-1513104890138-7c749659a591?w=120&q=80" alt="Pizza">
          <div class="mi-details">
            <h4>Paneer Tikka Pizza (8")</h4>
            <span>₹290</span>
          </div>
          <button class="mi-add-btn">+ ADD</button>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 3: ORDER LIFECYCLE --}}
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">Takeaway Order Tracking</div>
      <h2>From Order Placed to Pickup — Stay in Control.</h2>
      <p>Track every customer ticket seamlessly across all stages of preparation and counter handover.</p>
    </div>

    <div class="win" style="max-width: 900px; margin: auto; padding: 28px;">
      <div class="odc-hdr">
        <div>
          <span style="font-weight:800; font-size:18px; color:var(--ink);">ORDER #1256</span>
          <span class="badge preparing" style="margin-left:10px;">Preparing</span>
        </div>
        <div style="font-weight:700; color:var(--mute); font-size:14px;">
          Pickup Time: <span style="color:var(--br);">7:30 PM</span>
        </div>
      </div>

      <div style="display:grid; grid-template-columns: repeat(3, 1fr); gap: 16px; margin-bottom: 20px; font-size: 14px;">
        <div><strong>Customer:</strong> Arun Kumar</div>
        <div><strong>Phone:</strong> +91 98*** **321</div>
        <div><strong>Payment:</strong> <span style="color:var(--green); font-weight:800;">PAID (UPI)</span></div>
      </div>

      <div style="background:var(--bg2); padding:16px; border-radius:12px; margin-bottom:20px;">
        <div style="font-weight:800; font-size:13px; margin-bottom:8px; color:var(--mute);">ORDER ITEMS</div>
        <div style="display:flex; justify-content:space-between; margin-bottom:4px; font-weight:600;">
          <span>Chicken Biryani × 2</span>
          <span>₹640</span>
        </div>
        <div style="display:flex; justify-content:space-between; margin-bottom:4px; font-weight:600;">
          <span>Paneer 65 × 1</span>
          <span>₹220</span>
        </div>
        <div style="display:flex; justify-content:space-between; font-weight:600;">
          <span>Fresh Lime Soda × 2</span>
          <span>₹160</span>
        </div>
      </div>

      <div class="lifecycle-bar">
        <div class="lc-step act"><span class="lc-dot"></span> NEW</div>
        <div class="lc-step act"><span class="lc-dot"></span> CONFIRMED</div>
        <div class="lc-step act"><span class="lc-dot"></span> PREPARING</div>
        <div class="lc-step"><span class="lc-dot"></span> READY</div>
        <div class="lc-step"><span class="lc-dot"></span> PICKED UP</div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 4: KITCHEN & KOT --}}
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">Kitchen Display & KOT</div>
      <h2>Prepare Orders Without Confusion.</h2>
      <p>Connect takeaway counter orders directly to kitchen tickets so staff prepare exact items with zero delay.</p>
    </div>

    <div class="kot-grid">
      <div class="kot-card prep">
        <div class="kot-hdr">
          <div>
            <span style="font-weight:900; font-size:16px;">KOT #1256</span>
            <div style="font-size:11px; font-weight:700; color:var(--mute);">TAKEAWAY • Arun</div>
          </div>
          <span class="badge preparing">Preparing</span>
        </div>
        <ul class="kot-items">
          <li><span>Chicken Biryani</span> <strong>× 2</strong></li>
          <li><span>Paneer 65</span> <strong>× 1</strong></li>
          <li><span>Fresh Lime</span> <strong>× 2</strong></li>
        </ul>
        <div style="background:#fff7ed; color:#c2410c; padding:8px 12px; border-radius:8px; font-size:12px; font-weight:700;">
          Note: Less Spicy for Biryani
        </div>
      </div>

      <div class="kot-card ready">
        <div class="kot-hdr">
          <div>
            <span style="font-weight:900; font-size:16px;">KOT #1257</span>
            <div style="font-size:11px; font-weight:700; color:var(--mute);">TAKEAWAY • Priya</div>
          </div>
          <span class="badge ready">Ready</span>
        </div>
        <ul class="kot-items">
          <li><span>Butter Chicken Meal</span> <strong>× 1</strong></li>
          <li><span>Butter Naan</span> <strong>× 3</strong></li>
        </ul>
        <div style="background:#ecfdf5; color:#047857; padding:8px 12px; border-radius:8px; font-size:12px; font-weight:700;">
          Packed in Box 2
        </div>
      </div>

      <div class="kot-card new">
        <div class="kot-hdr">
          <div>
            <span style="font-weight:900; font-size:16px;">KOT #1260</span>
            <div style="font-size:11px; font-weight:700; color:var(--mute);">TAKEAWAY • Suresh</div>
          </div>
          <span class="badge new">New</span>
        </div>
        <ul class="kot-items">
          <li><span>Mutton Biryani</span> <strong>× 1</strong></li>
          <li><span>Chicken 65</span> <strong>× 1</strong></li>
        </ul>
        <div style="background:#eff6ff; color:#1d4ed8; padding:8px 12px; border-radius:8px; font-size:12px; font-weight:700;">
          Just Received
        </div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 5: PICKUP MANAGEMENT DASHBOARD --}}
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">Counter Pickup Board</div>
      <h2>Ready Orders. Faster Handover.</h2>
      <p>Give your counter team clear visibility over orders currently being prepared versus those ready for customer collection.</p>
    </div>

    <div class="pickup-cols">
      <div class="pickup-col">
        <div class="pcol-hdr">
          <span style="color:#c2410c;">PREPARING IN KITCHEN</span>
          <span>(3)</span>
        </div>
        <div class="pickup-ticket">
          <div>
            <strong style="font-size:15px;">#1256</strong> • Arun K.
            <div style="font-size:12px; color:var(--mute);">3 items • Est 5 mins</div>
          </div>
          <span class="badge preparing">Preparing</span>
        </div>
        <div class="pickup-ticket">
          <div>
            <strong style="font-size:15px;">#1260</strong> • Suresh M.
            <div style="font-size:12px; color:var(--mute);">2 items • Est 8 mins</div>
          </div>
          <span class="badge preparing">Preparing</span>
        </div>
        <div class="pickup-ticket">
          <div>
            <strong style="font-size:15px;">#1262</strong> • Rajesh
            <div style="font-size:12px; color:var(--mute);">4 items • Est 10 mins</div>
          </div>
          <span class="badge preparing">Preparing</span>
        </div>
      </div>

      <div class="pickup-col" style="background:#f0fdf4; border-color:#bbf7d0;">
        <div class="pcol-hdr" style="color:#047857; border-color:#86efac;">
          <span>READY FOR PICKUP</span>
          <span>(2)</span>
        </div>
        <div class="pickup-ticket" style="border-left:4px solid var(--green);">
          <div>
            <strong style="font-size:15px;">#1257</strong> • Priya S.
            <div style="font-size:12px; color:var(--mute);">Box #2 • Paid</div>
          </div>
          <span class="badge ready">Ready</span>
        </div>
        <div class="pickup-ticket" style="border-left:4px solid var(--green);">
          <div>
            <strong style="font-size:15px;">#1258</strong> • Vikram R.
            <div style="font-size:12px; color:var(--mute);">Box #4 • Paid</div>
          </div>
          <span class="badge ready">Ready</span>
        </div>
      </div>

      <div class="pickup-col">
        <div class="pcol-hdr">
          <span style="color:var(--mute);">COMPLETED / PICKED UP</span>
          <span>(2)</span>
        </div>
        <div class="pickup-ticket" style="opacity: 0.7;">
          <div>
            <strong style="font-size:15px;">#1252</strong> • Ramesh
            <div style="font-size:12px; color:var(--mute);">Handed at 7:15 PM</div>
          </div>
          <span class="badge picked">Completed</span>
        </div>
        <div class="pickup-ticket" style="opacity: 0.7;">
          <div>
            <strong style="font-size:15px;">#1253</strong> • Kavita
            <div style="font-size:12px; color:var(--mute);">Handed at 7:18 PM</div>
          </div>
          <span class="badge picked">Completed</span>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 6: COUNTER OPERATIONS WORKFLOW --}}
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">Counter Workflow</div>
      <h2>A Faster Counter Experience.</h2>
      <p>Streamline every counter touchpoint to serve more takeaway customers per hour during rush periods.</p>
    </div>

    <div class="workflow-flow-grid">
      <div class="wf-step-box">
        <div class="wf-step-num">1</div>
        <h4 style="font-size:14px; margin-bottom:4px;">Select Items</h4>
        <p style="font-size:12px;">Quick category add</p>
      </div>

      <div class="wf-step-box">
        <div class="wf-step-num">2</div>
        <h4 style="font-size:14px; margin-bottom:4px;">Confirm Order</h4>
        <p style="font-size:12px;">Take customer name</p>
      </div>

      <div class="wf-step-box">
        <div class="wf-step-num">3</div>
        <h4 style="font-size:14px; margin-bottom:4px;">Generate Bill</h4>
        <p style="font-size:12px;">Instant token print</p>
      </div>

      <div class="wf-step-box">
        <div class="wf-step-num">4</div>
        <h4 style="font-size:14px; margin-bottom:4px;">Accept Payment</h4>
        <p style="font-size:12px;">Cash, Card or UPI</p>
      </div>

      <div class="wf-step-box">
        <div class="wf-step-num">5</div>
        <h4 style="font-size:14px; margin-bottom:4px;">Prepare</h4>
        <p style="font-size:12px;">Live KOT in kitchen</p>
      </div>

      <div class="wf-step-box">
        <div class="wf-step-num">6</div>
        <h4 style="font-size:14px; margin-bottom:4px;">Pickup</h4>
        <p style="font-size:12px;">Fast customer exit</p>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 7 & 8: BILLING & CUSTOMER INFORMATION --}}
<section style="background: var(--bg2);">
  <div class="w two-col-demo">
    {{-- POS Billing --}}
    <div class="win" style="padding:28px;">
      <div class="eb" style="margin-bottom:12px;">POS & Billing</div>
      <h3>Quick Orders Deserve Quick Checkout.</h3>
      <p style="font-size:14px; margin-bottom:20px;">Process takeaway bills with absolute clarity and instant item calculation.</p>

      <div style="background:var(--bg2); padding:16px; border-radius:12px; margin-bottom:20px; font-size:14px;">
        <div style="display:flex; justify-content:space-between; margin-bottom:8px;">
          <span>Chicken Biryani × 2</span>
          <strong>₹640</strong>
        </div>
        <div style="display:flex; justify-content:space-between; margin-bottom:8px;">
          <span>Paneer 65 × 1</span>
          <strong>₹220</strong>
        </div>
        <div style="display:flex; justify-content:space-between; margin-bottom:12px;">
          <span>Fresh Lime × 2</span>
          <strong>₹160</strong>
        </div>
        <div style="border-top:2px solid var(--line); padding-top:10px; display:flex; justify-content:space-between; font-weight:800; font-size:16px; color:var(--br);">
          <span>Total Amount</span>
          <span>₹1,020</span>
        </div>
      </div>

      <div style="font-weight:700; font-size:13px; margin-bottom:8px;">SUPPORTED PAYMENT METHODS</div>
      <div style="display:flex; gap:10px;">
        <span style="padding:8px 16px; background:#fff; border:1px solid var(--line); border-radius:8px; font-weight:700; font-size:13px; color:var(--green);">✓ Cash</span>
        <span style="padding:8px 16px; background:#fff; border:1px solid var(--line); border-radius:8px; font-weight:700; font-size:13px; color:var(--blue);">✓ Card</span>
        <span style="padding:8px 16px; background:#fff; border:1px solid var(--line); border-radius:8px; font-weight:700; font-size:13px; color:var(--purple);">✓ UPI / QR</span>
      </div>
    </div>

    {{-- Customer Info Panel --}}
    <div class="win" style="padding:28px;">
      <div class="eb" style="margin-bottom:12px;">Customer Details</div>
      <h3>Keep Every Customer Order Organized.</h3>
      <p style="font-size:14px; margin-bottom:20px;">Access customer names, phone numbers, and takeaway preferences instantly.</p>

      <div style="background:#fff; border:1px solid var(--line); border-radius:14px; padding:20px;">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px; border-bottom:1px solid var(--line); padding-bottom:12px;">
          <div>
            <h4 style="font-size:16px; margin:0;">Arun Kumar</h4>
            <span style="font-size:12px; color:var(--mute);">+91 98*** **321</span>
          </div>
          <span class="badge confirmed">Regular Customer</span>
        </div>

        <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px; font-size:13px;">
          <div><strong>Order #:</strong> 1256</div>
          <div><strong>Order Type:</strong> Takeaway</div>
          <div><strong>Pickup Time:</strong> 7:30 PM</div>
          <div><strong>Payment Status:</strong> Paid (UPI)</div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 9: INVENTORY MANAGEMENT --}}
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">Stock & Ingredient Control</div>
      <h2>Know What You Need Before the Rush Begins.</h2>
      <p>Monitor essential ingredients, stock levels, and takeaway packaging materials to keep your counter operating without interruption.</p>
    </div>

    <div class="inv-grid">
      <div class="inv-card">
        <div class="inv-hdr">
          <strong style="font-size:15px;">Basmati Rice</strong>
          <span style="color:var(--green); font-weight:800; font-size:12px;">Sufficient</span>
        </div>
        <div style="font-size:24px; font-weight:800; color:var(--ink);">25 kg</div>
        <div style="font-size:12px; color:var(--mute); margin-top:4px;">Used for Biryani & Meals</div>
      </div>

      <div class="inv-card">
        <div class="inv-hdr">
          <strong style="font-size:15px;">Fresh Chicken</strong>
          <span style="color:var(--green); font-weight:800; font-size:12px;">Sufficient</span>
        </div>
        <div style="font-size:24px; font-weight:800; color:var(--ink);">18 kg</div>
        <div style="font-size:12px; color:var(--mute); margin-top:4px;">Daily fresh stock</div>
      </div>

      <div class="inv-card" style="border-color:var(--amber);">
        <div class="inv-hdr">
          <strong style="font-size:15px;">Takeaway Containers</strong>
          <span style="color:var(--amber); font-weight:800; font-size:12px;">Low Stock</span>
        </div>
        <div style="font-size:24px; font-weight:800; color:var(--amber);">42 pcs</div>
        <div style="font-size:12px; color:var(--mute); margin-top:4px;">Reorder suggested</div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 10: REPORTS & ANALYTICS --}}
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">Takeaway Analytics</div>
      <h2>Understand Your Takeaway Business.</h2>
      <p>Analyze revenue, peak order hours, top takeaway dishes, and customer purchasing patterns.</p>
    </div>

    <div class="reports-preview">
      <div class="rp-hdr">
        <div>
          <h3 style="color:#fff; font-size:20px;">Daily Takeaway Performance</h3>
          <span style="font-size:13px; color:rgba(255,255,255,0.6);">Real-time counter business intelligence</span>
        </div>
        <span style="padding:6px 14px; background:rgba(255,255,255,0.1); border-radius:8px; font-size:13px; font-weight:700;">Today's Summary</span>
      </div>

      <div class="rp-stats">
        <div class="rp-stat-card">
          <div style="font-size:12px; color:rgba(255,255,255,0.6);">DAILY SALES</div>
          <div class="rp-stat-val">₹48,920</div>
        </div>
        <div class="rp-stat-card">
          <div style="font-size:12px; color:rgba(255,255,255,0.6);">TAKEAWAY ORDERS</div>
          <div class="rp-stat-val">142</div>
        </div>
        <div class="rp-stat-card">
          <div style="font-size:12px; color:rgba(255,255,255,0.6);">AVG ORDER VALUE</div>
          <div class="rp-stat-val">₹344</div>
        </div>
        <div class="rp-stat-card">
          <div style="font-size:12px; color:rgba(255,255,255,0.6);">PEAK PICKUP HOUR</div>
          <div class="rp-stat-val">7-9 PM</div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 11: CONNECTED TAKEAWAY WORKFLOW --}}
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">End-to-End Workflow</div>
      <h2>Everything From Order to Pickup.</h2>
      <p>Connect every single step of your takeaway restaurant through one unified management platform.</p>
    </div>

    <div class="connected-flow">
      <div class="cf-node">
        <div class="cf-icon"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></div>
        <span style="font-size:12px; font-weight:800;">Customer</span>
      </div>
      <div class="cf-arrow">→</div>

      <div class="cf-node">
        <div class="cf-icon"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg></div>
        <span style="font-size:12px; font-weight:800;">Menu</span>
      </div>
      <div class="cf-arrow">→</div>

      <div class="cf-node">
        <div class="cf-icon"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="16" rx="2"/></svg></div>
        <span style="font-size:12px; font-weight:800;">Order</span>
      </div>
      <div class="cf-arrow">→</div>

      <div class="cf-node">
        <div class="cf-icon"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/></svg></div>
        <span style="font-size:12px; font-weight:800;">KOT</span>
      </div>
      <div class="cf-arrow">→</div>

      <div class="cf-node">
        <div class="cf-icon"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 13.87A8 8 0 0 1 17.64 6.11a8 8 0 0 1 3.11 11.41"/></svg></div>
        <span style="font-size:12px; font-weight:800;">Kitchen</span>
      </div>
      <div class="cf-arrow">→</div>

      <div class="cf-node">
        <div class="cf-icon"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg></div>
        <span style="font-size:12px; font-weight:800;">Ready</span>
      </div>
      <div class="cf-arrow">→</div>

      <div class="cf-node">
        <div class="cf-icon"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/></svg></div>
        <span style="font-size:12px; font-weight:800;">Pickup</span>
      </div>
      <div class="cf-arrow">→</div>

      <div class="cf-node">
        <div class="cf-icon"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></div>
        <span style="font-size:12px; font-weight:800;">Reports</span>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 12: WHY GENI MENU FOR TAKEAWAY RESTAURANTS --}}
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">Key Operational Advantages</div>
      <h2>Built for Faster Orders and Smoother Pickups.</h2>
      <p>Empower your restaurant counter to serve more customers with total operational control.</p>
    </div>

    <div class="benefits-grid">
      <div class="b-card">
        <h3>1. Faster Order Handling</h3>
        <p>Keep takeaway orders organized from initial placement to final handover without counter bottlenecks.</p>
      </div>

      <div class="b-card">
        <h3>2. Clear Kitchen Operations</h3>
        <p>Give your kitchen staff clear order specifications, item quantities, and special prep requests.</p>
      </div>

      <div class="b-card">
        <h3>3. Easy Pickup Management</h3>
        <p>Instantly distinguish orders being prepared in the kitchen from items ready for customer collection.</p>
      </div>

      <div class="b-card">
        <h3>4. Rapid Counter Billing</h3>
        <p>Complete counter transactions in seconds with flexible payment support including cash and UPI.</p>
      </div>

      <div class="b-card">
        <h3>5. Inventory Visibility</h3>
        <p>Maintain complete awareness of key ingredients and takeaway packaging items before peak rush hours.</p>
      </div>

      <div class="b-card">
        <h3>6. Actionable Business Insights</h3>
        <p>Gain actionable reports on takeaway sales, busiest pickup periods, and item performance.</p>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 13: IDEAL FOR --}}
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">Industry Fit</div>
      <h2>Designed for Businesses Built Around Takeaway.</h2>
      <p>Tailored specifically for high-speed counter service across various food business models.</p>
    </div>

    <div class="industry-grid">
      <div class="ind-card">
        <div class="ic"><svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/></svg></div>
        <span style="font-weight:700;">Takeaway Outlets</span>
      </div>

      <div class="ind-card">
        <div class="ic"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg></div>
        <span style="font-weight:700;">Biryani Counters</span>
      </div>

      <div class="ind-card">
        <div class="ic"><svg viewBox="0 0 24 24"><path d="M18 8h1a4 4 0 0 1 0 8h-1"/><path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"/></svg></div>
        <span style="font-weight:700;">Burger & Fast Food</span>
      </div>

      <div class="ind-card">
        <div class="ic"><svg viewBox="0 0 24 24"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg></div>
        <span style="font-weight:700;">Pizza Outlets</span>
      </div>

      <div class="ind-card">
        <div class="ic"><svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/></svg></div>
        <span style="font-weight:700;">Cloud Kitchens</span>
      </div>

      <div class="ind-card">
        <div class="ic"><svg viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5z"/></svg></div>
        <span style="font-weight:700;">Bakeries & Cafés</span>
      </div>

      <div class="ind-card">
        <div class="ic"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/></svg></div>
        <span style="font-weight:700;">Food Counters</span>
      </div>

      <div class="ind-card">
        <div class="ic"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/></svg></div>
        <span style="font-weight:700;">Multi-Branch Outlets</span>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 14 & 15: MOBILE RESTAURANT MANAGEMENT --}}
<section style="background: var(--bg2);">
  <div class="w menu-sec-grid">
    <div>
      <div class="eb">Mobile Command</div>
      <h2>Your Takeaway Business. Within Reach.</h2>
      <p>Stay updated on counter activity, pending orders, and total revenue directly from your mobile smartphone.</p>
      
      <div style="margin-top:24px; display:flex; flex-direction:column; gap:12px;">
        <div style="display:flex; gap:12px; align-items:center;">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--br)" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
          <span style="font-weight:700;">Real-time counter sales monitoring</span>
        </div>
        <div style="display:flex; gap:12px; align-items:center;">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--br)" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
          <span style="font-weight:700;">Instant notifications for pending kitchen KOTs</span>
        </div>
        <div style="display:flex; gap:12px; align-items:center;">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--br)" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
          <span style="font-weight:700;">Manage menu availability on the go</span>
        </div>
      </div>
    </div>

    <div class="mob-preview-box">
      <div class="mob-inner">
        <div style="text-align:center; font-weight:800; border-bottom:1px solid #eee; padding-bottom:8px; margin-bottom:12px;">Geni Menu Takeaway</div>
        <div style="background:var(--bg2); border-radius:10px; padding:10px; margin-bottom:10px;">
          <div style="font-size:10px; color:var(--mute);">TODAY'S SALES</div>
          <div style="font-size:18px; font-weight:800; color:var(--br);">₹48,920</div>
        </div>
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:8px; margin-bottom:10px;">
          <div style="background:#eff6ff; padding:8px; border-radius:8px;">
            <div style="font-size:9px; color:#1d4ed8;">PREPARING</div>
            <div style="font-size:14px; font-weight:800;">6 Orders</div>
          </div>
          <div style="background:#ecfdf5; padding:8px; border-radius:8px;">
            <div style="font-size:9px; color:#047857;">READY</div>
            <div style="font-size:14px; font-weight:800;">4 Orders</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 16: TAKEAWAY BUSINESS TYPES --}}
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">Supported Formats</div>
      <h2>One Platform for Different Takeaway Businesses.</h2>
      <p>Tailored to handle high order volume for various fast food and counter business models.</p>
    </div>

    <div class="biz-types-grid">
      <div class="biz-card">
        <img src="https://images.unsplash.com/photo-1563379091339-03b21ab4a4f8?w=400&q=80" alt="Biryani Outlet">
        <div class="biz-ctx">Biryani Shops</div>
      </div>
      <div class="biz-card">
        <img src="https://images.unsplash.com/photo-1568901346375-23c9450c58cd?w=400&q=80" alt="Burger Shop">
        <div class="biz-ctx">Burger Outlets</div>
      </div>
      <div class="biz-card">
        <img src="https://images.unsplash.com/photo-1513104890138-7c749659a591?w=400&q=80" alt="Pizza Shop">
        <div class="biz-ctx">Pizza Outlets</div>
      </div>
      <div class="biz-card">
        <img src="https://images.unsplash.com/photo-1509440159596-0249088772ff?w=400&q=80" alt="Bakery">
        <div class="biz-ctx">Bakeries & Cafés</div>
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
      <p>Common questions about implementing Geni Menu for your takeaway operations.</p>
    </div>

    <div class="faq-list">
      <details class="faq-item" open>
        <summary>1. Is Geni Menu suitable for takeaway restaurants? <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg></summary>
        <p>Yes. Geni Menu is purpose-built to handle high takeaway order volumes, rapid KOT printing, kitchen tracking, and swift counter collection.</p>
      </details>

      <details class="faq-item">
        <summary>2. Can I manage takeaway orders separately from dine-in? <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg></summary>
        <p>Yes. Orders are explicitly tagged by type (Takeaway, Dine-in, Pickup) so your counter and kitchen staff handle each workflow appropriately.</p>
      </details>

      <details class="faq-item">
        <summary>3. Can customers browse the digital menu before ordering? <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg></summary>
        <p>Yes. You can provide a digital menu link or QR code at your counter for customers to explore categories while waiting in line.</p>
      </details>

      <details class="faq-item">
        <summary>4. Can I manage KOTs for takeaway orders? <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg></summary>
        <p>Yes. Takeaway orders automatically trigger digital KOTs or printed thermal tickets in the kitchen with special preparation notes.</p>
      </details>

      <details class="faq-item">
        <summary>5. Can I track orders from preparation to pickup? <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg></summary>
        <p>Yes. Geni Menu provides a live status queue showing New, Confirmed, Preparing, Ready for Pickup, and Completed orders.</p>
      </details>

      <details class="faq-item">
        <summary>6. Can I manage billing and multiple payment methods? <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg></summary>
        <p>Yes. Your cashier can generate bills in seconds and record cash, credit cards, or instant UPI payment transactions.</p>
      </details>

      <details class="faq-item">
        <summary>7. Can I track ingredient inventory for takeaway items? <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg></summary>
        <p>Yes. Track raw materials and takeaway containers to maintain optimal stock levels before peak rush periods.</p>
      </details>

      <details class="faq-item">
        <summary>8. Can I view takeaway sales and order reports? <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg></summary>
        <p>Yes. View detailed reports covering daily revenue, average ticket size, top-selling dishes, and peak pickup hours.</p>
      </details>
    </div>
  </div>
</section>

{{-- FINAL CTA --}}
<section class="cta-sec">
  <div class="w cta-box">
    <h2>Ready to Make Takeaway Simpler?</h2>
    <p>Manage your menu, takeaway orders, kitchen operations, counter pickup, billing, inventory, and reports from one connected platform with Geni Menu.</p>
    <div style="display:flex; justify-content:center; gap:16px; flex-wrap:wrap;">
      <a href="{{ route('contact.us') }}" class="btn p" style="background:#fff; color:var(--br); border-color:#fff;">Get Started →</a>
      <a href="{{ route('contact.us') }}" class="btn o" style="color:#fff; border-color:#fff; background:transparent;">Book a Demo →</a>
    </div>
  </div>
</section>

@endsection
