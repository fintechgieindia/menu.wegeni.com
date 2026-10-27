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
  --dark: #18120e;
  --dark2: #22180f;
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
  --orange: #F97316;
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
.badge.new { background: #eff6ff; color: #1d4ed8; }
.badge.preparing { background: #ffedd5; color: #c2410c; }
.badge.ready { background: #d1fae5; color: #047857; }
.badge.out { background: #fee2e2; color: #b91c1c; }

.ic { width: 48px; height: 48px; border-radius: 13px; background: var(--bg2); color: var(--br); display: grid; place-items: center; border: 1px solid var(--line); transition: .3s ease; flex-shrink: 0; }

/* ---------------- HERO ---------------- */
.hero { padding: 60px 0 90px; background: linear-gradient(180deg, var(--bg2) 0%, #fff 100%); }
.hero-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 48px; align-items: center; }
.hero-ctx p { font-size: 18px; margin: 20px 0 32px; max-width: 540px; }
.hero-btns { display: flex; gap: 16px; flex-wrap: wrap; }

.hero-ui { background: #fff; border: 1px solid var(--line); border-radius: 24px; box-shadow: var(--shadow-lg); overflow: hidden; }
.hero-ui-hdr { background: var(--bg2); padding: 16px 20px; border-bottom: 1px solid var(--line); display: flex; justify-content: space-between; align-items: center; }
.hero-ui-hdr-title { font-weight: 500; font-size: 14px; color: var(--ink); display: flex; align-items: center; gap: 8px; }

.order-queue { padding: 16px; display: flex; flex-direction: column; gap: 10px; }
.oq-item { display: flex; align-items: center; gap: 12px; padding: 12px 14px; border: 1px solid var(--line); border-radius: 12px; background: #fff; }
.oq-platform { width: 32px; height: 32px; border-radius: 8px; display: grid; place-items: center; font-size: 14px; flex-shrink: 0; }
.oq-platform.sw { background: #fef3c7; }
.oq-platform.zo { background: #fff1f2; }
.oq-platform.di { background: #eff6ff; }
.oq-platform.wh { background: #d1fae5; }
.oq-info { flex: 1; }
.oq-name { font-weight: 700; font-size: 13px; }
.oq-detail { font-size: 11px; color: var(--mute); }
.oq-time { font-size: 11px; font-weight: 700; color: var(--br); }

/* ---------------- SECTION 1: ECOSYSTEM ---------------- */
.eco-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }
.eco-card { padding: 28px; background: #fff; border: 1px solid var(--line); border-radius: 20px; transition: .3s; }
.eco-card:hover { transform: translateY(-4px); border-color: var(--br); box-shadow: var(--shadow-md); }
.eco-card h3 { margin: 18px 0 8px; font-size: 18px; }
.eco-card p { font-size: 14px; color: var(--mute); }
.eco-card:hover .ic { background: var(--br); color: #fff; border-color: var(--br); }

/* ---------------- SECTION 2: MULTI-BRAND ---------------- */
.two-col-flow { display: grid; grid-template-columns: 1fr 1fr; gap: 48px; align-items: center; }
.brand-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px; }
.brand-card { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 18px; }
.brand-dot { width: 10px; height: 10px; border-radius: 50%; margin-bottom: 10px; }
.brand-card h4 { font-size: 14px; font-weight: 700; margin-bottom: 4px; }
.brand-card p { font-size: 12px; color: var(--mute); }

/* ---------------- SECTION 3: ORDER AGGREGATION ---------------- */
.platform-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; }
.plat-card { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 20px; text-align: center; transition: .2s; }
.plat-card:hover { border-color: var(--br); box-shadow: var(--shadow-sm); transform: translateY(-2px); }
.plat-icon { width: 48px; height: 48px; border-radius: 12px; display: grid; place-items: center; margin: 0 auto 12px; font-size: 22px; }
.plat-name { font-size: 13px; font-weight: 700; }
.plat-note { font-size: 11px; color: var(--mute); margin-top: 4px; }

/* ---------------- SECTION 4: KITCHEN OPS ---------------- */
.kot-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; }
.kot-card { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 20px; }
.kot-card.new-ord { border-top: 4px solid var(--blue); }
.kot-card.prep-ord { border-top: 4px solid var(--amber); }
.kot-card.ready-ord { border-top: 4px solid var(--green); }
.kot-hdr { display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px; }
.kot-id { font-weight: 700; font-size: 14px; }
.kot-timer { font-size: 11px; font-weight: 700; color: var(--br); }
.kot-items { font-size: 13px; color: var(--mute); }
.kot-items li { padding: 4px 0; border-bottom: 1px dashed var(--line); display: flex; justify-content: space-between; }
.kot-items li:last-child { border-bottom: none; }
.kot-source { font-size: 11px; margin-top: 10px; font-weight: 700; display: inline-block; padding: 3px 8px; border-radius: 6px; }

/* ---------------- SECTION 5: PEAK METRICS ---------------- */
.fest-dash { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; }
.fd-card { padding: 20px; background: #fff; border: 1px solid var(--line); border-radius: 16px; text-align: center; }
.fd-val { font-size: 32px; font-weight: 500; color: var(--br); line-height: 1.2; }
.fd-lbl { font-size: 12px; font-weight: 700; color: var(--mute); text-transform: uppercase; letter-spacing: .05em; margin-top: 4px; }

/* ---------------- SECTION 6: MENU MANAGEMENT ---------------- */
.menu-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px; }
.mc-card { display: flex; align-items: center; gap: 14px; padding: 14px; border: 1px solid var(--line); border-radius: 14px; background: #fff; }
.mc-img { width: 56px; height: 56px; border-radius: 10px; object-fit: cover; flex-shrink: 0; }
.mc-ctx h4 { font-size: 14px; font-weight: 700; margin-bottom: 2px; }
.mc-ctx .wt { font-size: 11px; color: var(--mute); }
.mc-ctx .pr { font-size: 13px; font-weight: 700; color: var(--br); }

/* ---------------- SECTION 7: DELIVERY OPS ---------------- */
.delivery-flow { display: flex; gap: 0; border: 1px solid var(--line); border-radius: 16px; overflow: hidden; background: #fff; }
.df-step { flex: 1; padding: 20px 16px; text-align: center; border-right: 1px solid var(--line); }
.df-step:last-child { border-right: none; }
.df-icon { width: 44px; height: 44px; border-radius: 12px; background: var(--bg2); color: var(--br); border: 1px solid var(--line); display: grid; place-items: center; margin: 0 auto 10px; }
.df-step h4 { font-size: 13px; font-weight: 700; margin-bottom: 4px; }
.df-step p { font-size: 11px; color: var(--mute); }

/* ---------------- SECTION 8: BILLING ---------------- */
.bill-panel { background: #fff; border: 1px solid var(--line); border-radius: 20px; max-width: 520px; margin: 0 auto; box-shadow: var(--shadow-md); overflow: hidden; }
.bp-hdr { padding: 16px 20px; background: var(--bg2); border-bottom: 1px solid var(--line); font-weight: 700; font-size: 15px; display: flex; justify-content: space-between; }
.bp-body { padding: 20px; }
.bp-item { display: flex; justify-content: space-between; margin-bottom: 14px; font-size: 14px; }
.bp-item-qty { font-size: 12px; color: var(--mute); display: block; }
.bp-total { display: flex; justify-content: space-between; padding: 16px 0; border-top: 2px dashed var(--line); margin-top: 8px; font-weight: 500; font-size: 20px; color: var(--br); }

/* ---------------- SECTION 9: INVENTORY ---------------- */
.inv-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; }
.inv-card { background: #fff; border: 1px solid var(--line); border-radius: 14px; padding: 18px; }
.inv-hdr { display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px; font-size: 14px; font-weight: 700; }
.inv-val { font-size: 22px; font-weight: 500; color: var(--ink); }
.inv-bar { height: 4px; border-radius: 4px; background: var(--line); margin-top: 10px; overflow: hidden; }
.inv-bar-fill { height: 100%; border-radius: 4px; background: var(--green); }
.inv-bar-fill.low { background: var(--red); }

/* ---------------- SECTION 10: REPORTS ---------------- */
.reports-preview { background: var(--dark); border-radius: 24px; padding: 36px; box-shadow: var(--shadow-lg); color: #fff; }
.rp-stats { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; margin-bottom: 28px; }
.rp-stat-card { background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.1); border-radius: 14px; padding: 16px; }
.rp-val { font-size: 24px; font-weight: 500; color: #fff; }
.rp-lbl { font-size: 12px; font-weight: 700; color: rgba(255,255,255,0.5); text-transform: uppercase; }

/* ---------------- SECTION 11: BENEFITS ---------------- */
.benefits-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; }
.b-card { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 24px; }
.b-card h3 { font-size: 16px; margin: 14px 0 6px; }
.b-card p { font-size: 14px; }

/* ---------------- SECTION 12: IDEAL FOR ---------------- */
.industry-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; }
.ind-card { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 16px; display: flex; align-items: center; gap: 12px; font-weight: 700; font-size: 14px; transition: .2s; }
.ind-card:hover { border-color: var(--br); transform: translateY(-2px); box-shadow: var(--shadow-sm); }

/* ---------------- SECTION 13: CONNECTED PLATFORM ---------------- */
.conn-grid { display: grid; grid-template-columns: repeat(8, 1fr); gap: 12px; text-align: center; }
.conn-card { background: #fff; border: 1px solid var(--line); border-radius: 12px; padding: 16px 8px; font-size: 11px; font-weight: 700; }
.conn-card svg { margin-bottom: 8px; color: var(--br); }

/* ---------------- SECTION 14: WORKFLOW ---------------- */
.wf-grid { display: flex; justify-content: space-between; align-items: center; gap: 8px; background: #fff; border: 1px solid var(--line); border-radius: 20px; padding: 28px 32px; overflow-x: auto; }
.wf-node { text-align: center; min-width: 70px; }
.wf-icon { width: 48px; height: 48px; border-radius: 14px; background: var(--bg2); color: var(--br); border: 1px solid var(--line); display: grid; place-items: center; margin: 0 auto 10px; }
.wf-arrow { color: var(--mute); opacity: 0.4; font-size: 18px; }
.wf-lbl { font-size: 11px; font-weight: 700; color: var(--ink); }

/* ---------------- SECTION 15: MOBILE ---------------- */
.mob-preview { max-width: 300px; margin: 0 auto; background: #000; border: 4px solid #333; border-radius: 36px; padding: 10px; box-shadow: var(--shadow-lg); }
.mob-inner { background: var(--dark2); color: #fff; border-radius: 26px; height: 500px; overflow: hidden; padding: 16px; }

/* ---------------- SECTION 16: SHOWCASE ---------------- */
.showcase-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; }
.showcase-card { border-radius: 16px; overflow: hidden; position: relative; height: 180px; }
.showcase-card img { width: 100%; height: 100%; object-fit: cover; }
.showcase-card div { position: absolute; bottom: 0; left: 0; right: 0; padding: 16px 12px 10px; background: linear-gradient(0deg, rgba(0,0,0,0.8), transparent); color: #fff; font-weight: 700; font-size: 14px; }

/* ---------------- FAQ ---------------- */
.faq-list { max-width: 840px; margin: auto; display: flex; flex-direction: column; gap: 16px; }
.faq-item { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 20px 24px; cursor: pointer; transition: .2s; }
.faq-item summary { font-weight: 700; font-size: 16px; display: flex; justify-content: space-between; align-items: center; list-style: none; }
.faq-item summary::-webkit-details-marker { display: none; }
.faq-item p { margin-top: 12px; font-size: 15px; color: var(--mute); }

/* ---------------- CTA ---------------- */
.cta-sec { padding: 100px 0; background: linear-gradient(135deg, #FAF4ED 0%, #EFE4D6 50%, #FAF4ED 100%); text-align: center; position: relative; overflow: hidden; border-top: 1px solid rgba(135, 96, 57, 0.16); }
.cta-box { max-width: 760px; margin: auto; position: relative; z-index: 2; }
.cta-box h2 { color: #21160F; margin-bottom: 16px; }

/* Responsive */
@media (max-width: 1024px) {
  .hero-grid, .two-col-flow { grid-template-columns: 1fr; gap: 40px; }
  .eco-grid, .benefits-grid, .kot-grid, .inv-grid { grid-template-columns: repeat(2, 1fr); }
  .platform-grid, .industry-grid, .rp-stats { grid-template-columns: repeat(2, 1fr); }
  .conn-grid { grid-template-columns: repeat(4, 1fr); }
  .fest-dash { grid-template-columns: repeat(2, 1fr); }
  .delivery-flow { flex-direction: column; }
  .df-step { border-right: none; border-bottom: 1px solid var(--line); }
  .df-step:last-child { border-bottom: none; }
}
@media (max-width: 768px) {
  .bc { padding: 14px 0; }
  .w { padding: 0 16px; }
}
@media (max-width: 640px) {
  .eco-grid, .benefits-grid, .kot-grid, .inv-grid, .platform-grid, .industry-grid, .rp-stats, .showcase-grid { grid-template-columns: 1fr; }
  .conn-grid { grid-template-columns: repeat(2, 1fr); }
  .fest-dash, .brand-grid, .menu-grid { grid-template-columns: 1fr; }
  .hero-btns { flex-direction: column; }
  .hero-btns .btn { width: 100%; }
  .wf-grid { flex-direction: column; align-items: center; gap: 16px; }
  .wf-arrow { transform: rotate(90deg); }
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
    <span class="cur">Cloud Kitchen</span>
  </div>
</div>

{{-- HERO --}}
<section class="hero">
  <div class="w hero-grid">
    <div class="hero-ctx">
      <div class="eb">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
        CLOUD KITCHEN SOLUTION
      </div>
      <h1>Run Your Cloud Kitchen. <span class="sf">Smarter & Faster.</span></h1>
      <p>Manage multi-brand menus, aggregated orders, kitchen workflows, delivery billing, inventory and daily business insights from one connected platform built for cloud kitchens and ghost kitchens.</p>
      <div class="hero-btns">
        <a href="{{ route('contact.us') }}" class="btn p">Get Started →</a>
        <a href="{{ route('contact.us') }}" class="btn o">Book a Demo →</a>
      </div>
    </div>

    <div class="hero-ui">
      <div class="hero-ui-hdr">
        <div class="hero-ui-hdr-title">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--br)" stroke-width="2.5"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>
          Cloud Kitchen — Order Dashboard
        </div>
        <span class="badge preparing">Peak Hour</span>
      </div>
      <div class="order-queue">
        <div class="oq-item">
          <div class="oq-platform sw">🌟</div>
          <div class="oq-info">
            <div class="oq-name">#CK-4081 · Biryani Palace</div>
            <div class="oq-detail">Chicken Biryani × 2, Raita × 2</div>
          </div>
          <span class="badge new">New</span>
          <div class="oq-time">2 min</div>
        </div>
        <div class="oq-item">
          <div class="oq-platform zo">🍕</div>
          <div class="oq-info">
            <div class="oq-name">#CK-4082 · Pizza Hub</div>
            <div class="oq-detail">Margherita × 1, Garlic Bread × 2</div>
          </div>
          <span class="badge preparing">Prep</span>
          <div class="oq-time">8 min</div>
        </div>
        <div class="oq-item">
          <div class="oq-platform di">🥗</div>
          <div class="oq-info">
            <div class="oq-name">#CK-4080 · Healthy Bites</div>
            <div class="oq-detail">Quinoa Bowl × 1, Green Smoothie × 1</div>
          </div>
          <span class="badge ready">Ready</span>
          <div class="oq-time">12 min</div>
        </div>
        <div class="oq-item">
          <div class="oq-platform wh">🍔</div>
          <div class="oq-info">
            <div class="oq-name">#CK-4079 · Burger Station</div>
            <div class="oq-detail">Smash Burger × 2, Fries × 2</div>
          </div>
          <span class="badge ready">Ready</span>
          <div class="oq-time">14 min</div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 1: ECOSYSTEM --}}
<section class="alt">
  <div class="w">
    <div class="hd">
      <div class="eb">Built For Cloud Kitchens</div>
      <h2>Everything Your Cloud Kitchen Needs.</h2>
      <p>Manage multiple brands, incoming orders, kitchen preparation, billing, delivery tracking, inventory and daily performance from one connected platform.</p>
    </div>

    <div class="eco-grid">
      <div class="eco-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2"/><rect x="9" y="3" width="6" height="4" rx="1"/><line x1="9" y1="12" x2="15" y2="12"/><line x1="9" y1="16" x2="13" y2="16"/></svg></div>
        <h3>1. Multi-Brand Menu Management</h3>
        <p>Organize separate menus for each virtual brand operating from your kitchen facility.</p>
      </div>
      <div class="eco-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg></div>
        <h3>2. Order Management</h3>
        <p>Keep all incoming orders organized, tracked and pushed through the kitchen workflow without confusion.</p>
      </div>
      <div class="eco-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg></div>
        <h3>3. Kitchen Order Tickets (KOT)</h3>
        <p>Auto-generate kitchen tickets for every incoming order to keep cooking stations running in sequence.</p>
      </div>
      <div class="eco-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2z"/><path d="M12 6v6l4 2"/></svg></div>
        <h3>4. Delivery Workflow</h3>
        <p>Track order readiness and coordinate handover with delivery partners from within the kitchen interface.</p>
      </div>
      <div class="eco-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg></div>
        <h3>5. Counter POS & Billing</h3>
        <p>Generate bills quickly for walk-in, direct phone orders or internal order management at the counter.</p>
      </div>
      <div class="eco-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg></div>
        <h3>6. Inventory Management</h3>
        <p>Monitor shared ingredients and brand-specific raw materials across all your kitchen operations.</p>
      </div>
      <div class="eco-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></div>
        <h3>7. Customer Management</h3>
        <p>Keep customer and order records organized for repeat business and customer service.</p>
      </div>
      <div class="eco-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="4" width="22" height="16" rx="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg></div>
        <h3>8. Payment Management</h3>
        <p>Record and manage cash, online and payment gateway transactions across your kitchen orders.</p>
      </div>
      <div class="eco-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></div>
        <h3>9. Reports & Analytics</h3>
        <p>Understand brand-wise sales, order volumes, kitchen throughput and business performance each day.</p>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 2: MULTI-BRAND --}}
<section>
  <div class="w two-col-flow">
    <div>
      <div class="eb">Multi-Brand Operations</div>
      <h2>One Kitchen. Multiple Brands. Zero Confusion.</h2>
      <p style="margin-top:14px; margin-bottom:28px;">Run multiple virtual restaurant brands from a single kitchen space. Each brand maintains its own menu, branding and product list — all manageable from one platform.</p>
      <ul style="display:flex; flex-direction:column; gap:12px;">
        <li style="display:flex; align-items:center; gap:12px; font-size:14px; font-weight:700;"><span style="width:8px; height:8px; border-radius:50%; background:var(--br); flex-shrink:0;"></span>Separate menu catalogues per brand</li>
        <li style="display:flex; align-items:center; gap:12px; font-size:14px; font-weight:700;"><span style="width:8px; height:8px; border-radius:50%; background:var(--br); flex-shrink:0;"></span>Separate pricing and item availability per brand</li>
        <li style="display:flex; align-items:center; gap:12px; font-size:14px; font-weight:700;"><span style="width:8px; height:8px; border-radius:50%; background:var(--br); flex-shrink:0;"></span>Centralized order view across all brands</li>
        <li style="display:flex; align-items:center; gap:12px; font-size:14px; font-weight:700;"><span style="width:8px; height:8px; border-radius:50%; background:var(--br); flex-shrink:0;"></span>Brand-wise performance reports</li>
      </ul>
    </div>
    <div class="brand-grid">
      <div class="brand-card">
        <div class="brand-dot" style="background:#F97316;"></div>
        <h4>Biryani Palace</h4>
        <p>North Indian · Biryanis & Curries</p>
        <div style="margin-top:10px; font-size:12px; color:var(--br); font-weight:700;">48 items · Active</div>
      </div>
      <div class="brand-card">
        <div class="brand-dot" style="background:#3B82F6;"></div>
        <h4>Pizza Hub</h4>
        <p>Italian · Pizzas & Pastas</p>
        <div style="margin-top:10px; font-size:12px; color:var(--br); font-weight:700;">32 items · Active</div>
      </div>
      <div class="brand-card">
        <div class="brand-dot" style="background:#10B981;"></div>
        <h4>Healthy Bites</h4>
        <p>Health Food · Bowls & Salads</p>
        <div style="margin-top:10px; font-size:12px; color:var(--br); font-weight:700;">24 items · Active</div>
      </div>
      <div class="brand-card">
        <div class="brand-dot" style="background:#8B5CF6;"></div>
        <h4>Burger Station</h4>
        <p>American · Burgers & Sides</p>
        <div style="margin-top:10px; font-size:12px; color:var(--br); font-weight:700;">28 items · Active</div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 3: ORDER SOURCES --}}
<section class="alt">
  <div class="w">
    <div class="hd">
      <div class="eb">Order Sources</div>
      <h2>Orders From Every Channel. One Kitchen View.</h2>
      <p>Whether orders come from online food platforms, phone calls or walk-ins — manage them all from one centralized kitchen dashboard.</p>
    </div>
    <div class="platform-grid">
      <div class="plat-card">
        <div class="plat-icon" style="background:#fef3c7; font-size:24px;">📱</div>
        <div class="plat-name">Online Aggregators</div>
        <div class="plat-note">Swiggy, Zomato & others</div>
      </div>
      <div class="plat-card">
        <div class="plat-icon" style="background:#eff6ff; font-size:24px;">🌐</div>
        <div class="plat-name">Direct Website</div>
        <div class="plat-note">Your own ordering page</div>
      </div>
      <div class="plat-card">
        <div class="plat-icon" style="background:#d1fae5; font-size:24px;">📞</div>
        <div class="plat-name">Phone Orders</div>
        <div class="plat-note">Counter-keyed orders</div>
      </div>
      <div class="plat-card">
        <div class="plat-icon" style="background:#ede9fe; font-size:24px;">🚶</div>
        <div class="plat-name">Walk-In Orders</div>
        <div class="plat-note">Direct counter pickup</div>
      </div>
    </div>
    <div style="text-align:center; margin-top:20px; font-size:13px; color:var(--mute);">* Direct platform integrations depend on supported features. Counter-keyed entry is always available.</div>
  </div>
</section>

{{-- SECTION 4: KITCHEN OPS --}}
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">Kitchen Operations</div>
      <h2>Keep Every Kitchen Station Organised.</h2>
      <p>Auto-generate Kitchen Order Tickets for every order so your kitchen staff knows exactly what to prepare, in what quantity and for which brand.</p>
    </div>
    <div class="kot-grid">
      <div class="kot-card new-ord">
        <div class="kot-hdr">
          <span class="kot-id">#CK-4083</span>
          <span class="badge new">New</span>
        </div>
        <span class="kot-source" style="background:#eff6ff; color:#1d4ed8;">Pizza Hub</span>
        <ul class="kot-items" style="margin-top:10px;">
          <li><span>Margherita (Lg)</span><span>×1</span></li>
          <li><span>Pepperoni Pizza</span><span>×1</span></li>
          <li><span>Garlic Bread</span><span>×2</span></li>
        </ul>
        <div class="kot-timer" style="margin-top:12px;">Just arrived</div>
      </div>
      <div class="kot-card prep-ord">
        <div class="kot-hdr">
          <span class="kot-id">#CK-4081</span>
          <span class="badge preparing">Preparing</span>
        </div>
        <span class="kot-source" style="background:#fef3c7; color:#92400e;">Biryani Palace</span>
        <ul class="kot-items" style="margin-top:10px;">
          <li><span>Chicken Biryani</span><span>×2</span></li>
          <li><span>Raita</span><span>×2</span></li>
          <li><span>Shorba</span><span>×1</span></li>
        </ul>
        <div class="kot-timer" style="margin-top:12px;">⏱ 6 min remaining</div>
      </div>
      <div class="kot-card ready-ord">
        <div class="kot-hdr">
          <span class="kot-id">#CK-4080</span>
          <span class="badge ready">Ready</span>
        </div>
        <span class="kot-source" style="background:#d1fae5; color:#065f46;">Healthy Bites</span>
        <ul class="kot-items" style="margin-top:10px;">
          <li><span>Quinoa Bowl</span><span>×1</span></li>
          <li><span>Green Smoothie</span><span>×1</span></li>
        </ul>
        <div class="kot-timer" style="margin-top:12px; color:var(--green);">✓ Ready for pickup</div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 5: PEAK METRICS --}}
<section class="alt">
  <div class="w">
    <div class="hd">
      <div class="eb">Peak Hour Operations</div>
      <h2>Handle Order Surges Without Missing a Beat.</h2>
      <p>Cloud kitchens experience heavy order volumes during lunch and dinner rushes. Stay on top of operations across all brands simultaneously.</p>
    </div>
    <div class="fest-dash">
      <div class="fd-card">
        <div class="fd-val">68</div>
        <div class="fd-lbl">Orders Today</div>
      </div>
      <div class="fd-card">
        <div class="fd-val">12</div>
        <div class="fd-lbl">Active Orders</div>
      </div>
      <div class="fd-card">
        <div class="fd-val">4</div>
        <div class="fd-lbl">Active Brands</div>
      </div>
      <div class="fd-card">
        <div class="fd-val">18<span style="font-size:18px;">min</span></div>
        <div class="fd-lbl">Avg Prep Time</div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 6: MENU MANAGEMENT --}}
<section>
  <div class="w two-col-flow">
    <div>
      <div class="eb">Menu Management</div>
      <h2>Build and Update Every Brand Menu With Ease.</h2>
      <p style="margin:14px 0 24px;">Keep your food items, prices and availability up to date for each brand without affecting other brands running from the same kitchen.</p>
      <ul style="display:flex; flex-direction:column; gap:10px;">
        <li style="display:flex; align-items:center; gap:12px; font-size:14px;"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--green)" stroke-width="2.5"><path d="M5 12l5 5l10-10"/></svg> Add, update or remove items per brand</li>
        <li style="display:flex; align-items:center; gap:12px; font-size:14px;"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--green)" stroke-width="2.5"><path d="M5 12l5 5l10-10"/></svg> Organize by categories and sub-categories</li>
        <li style="display:flex; align-items:center; gap:12px; font-size:14px;"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--green)" stroke-width="2.5"><path d="M5 12l5 5l10-10"/></svg> Mark items as available or sold out instantly</li>
        <li style="display:flex; align-items:center; gap:12px; font-size:14px;"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--green)" stroke-width="2.5"><path d="M5 12l5 5l10-10"/></svg> Add item images, descriptions and allergen notes</li>
      </ul>
    </div>
    <div>
      <div class="menu-grid">
        <div class="mc-card">
          <div style="width:56px; height:56px; border-radius:10px; background:#fef3c7; display:grid; place-items:center; font-size:24px; flex-shrink:0;">🍗</div>
          <div class="mc-ctx">
            <h4>Chicken Biryani</h4>
            <div class="pr">₹280</div>
            <div class="wt">Biryani Palace</div>
          </div>
        </div>
        <div class="mc-card">
          <div style="width:56px; height:56px; border-radius:10px; background:#eff6ff; display:grid; place-items:center; font-size:24px; flex-shrink:0;">🍕</div>
          <div class="mc-ctx">
            <h4>Margherita Pizza</h4>
            <div class="pr">₹320</div>
            <div class="wt">Pizza Hub</div>
          </div>
        </div>
        <div class="mc-card">
          <div style="width:56px; height:56px; border-radius:10px; background:#d1fae5; display:grid; place-items:center; font-size:24px; flex-shrink:0;">🥗</div>
          <div class="mc-ctx">
            <h4>Quinoa Bowl</h4>
            <div class="pr">₹240</div>
            <div class="wt">Healthy Bites</div>
          </div>
        </div>
        <div class="mc-card">
          <div style="width:56px; height:56px; border-radius:10px; background:#ede9fe; display:grid; place-items:center; font-size:24px; flex-shrink:0;">🍔</div>
          <div class="mc-ctx">
            <h4>Smash Burger</h4>
            <div class="pr">₹260</div>
            <div class="wt">Burger Station</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 7: DELIVERY WORKFLOW --}}
<section class="alt">
  <div class="w">
    <div class="hd">
      <div class="eb">Delivery Operations</div>
      <h2>From Order Placed to Delivery Done.</h2>
      <p>Track every order through a clear status pipeline so your kitchen and dispatch team are always in sync.</p>
    </div>
    <div class="delivery-flow">
      <div class="df-step">
        <div class="df-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg></div>
        <h4>Order Received</h4>
        <p>Order enters the kitchen dashboard</p>
      </div>
      <div class="df-step">
        <div class="df-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg></div>
        <h4>KOT Generated</h4>
        <p>Kitchen ticket sent to cooking station</p>
      </div>
      <div class="df-step">
        <div class="df-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2z"/><path d="M12 6v6l4 2"/></svg></div>
        <h4>Food Preparation</h4>
        <p>Kitchen prepares the order items</p>
      </div>
      <div class="df-step">
        <div class="df-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12l5 5l10-10"/></svg></div>
        <h4>Order Ready</h4>
        <p>Food packed and ready for pickup</p>
      </div>
      <div class="df-step">
        <div class="df-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 17H3a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11a2 2 0 0 1 2 2v3"/><rect x="9" y="11" width="14" height="10" rx="1"/><circle cx="12" cy="21" r="1"/><circle cx="20" cy="21" r="1"/></svg></div>
        <h4>Handed to Delivery</h4>
        <p>Partner picks up and delivers the order</p>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 8: BILLING --}}
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">Billing & Payments</div>
      <h2>Fast Billing for Every Order Type.</h2>
      <p>Generate accurate bills for every order — whether it's a counter pickup, a phone order or an internally managed delivery.</p>
    </div>
    <div class="bill-panel">
      <div class="bp-hdr">
        <span>Order #CK-4081 — Biryani Palace</span>
        <span class="badge preparing">Preparing</span>
      </div>
      <div class="bp-body">
        <div class="bp-item">
          <div>Chicken Biryani<span class="bp-item-qty">× 2</span></div>
          <strong>₹560</strong>
        </div>
        <div class="bp-item">
          <div>Raita<span class="bp-item-qty">× 2</span></div>
          <strong>₹80</strong>
        </div>
        <div class="bp-item">
          <div>Shorba<span class="bp-item-qty">× 1</span></div>
          <strong>₹60</strong>
        </div>
        <div class="bp-item" style="color:var(--mute); font-size:13px;">
          <div>Delivery Charge</div>
          <span>₹40</span>
        </div>
        <div class="bp-total">
          <span>Total</span>
          <span>₹740</span>
        </div>
        <div style="display:grid; grid-template-columns:1fr 1fr 1fr; gap:8px; margin-top:16px;">
          <div style="padding:10px; border-radius:8px; border:1px solid var(--line); background:#fff; font-weight:700; font-size:12px; text-align:center; cursor:pointer;">Cash</div>
          <div style="padding:10px; border-radius:8px; background:var(--br); color:#fff; font-weight:700; font-size:12px; text-align:center; cursor:pointer;">UPI</div>
          <div style="padding:10px; border-radius:8px; border:1px solid var(--line); background:#fff; font-weight:700; font-size:12px; text-align:center; cursor:pointer;">Card</div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 9: INVENTORY --}}
<section class="alt">
  <div class="w">
    <div class="hd">
      <div class="eb">Inventory Management</div>
      <h2>Monitor Ingredients Across All Brands.</h2>
      <p>Track shared and brand-specific ingredients to ensure your kitchen never runs out of key stock during peak hours.</p>
    </div>
    <div class="inv-grid">
      <div class="inv-card">
        <div class="inv-hdr"><span>Basmati Rice</span><span style="font-size:11px; color:var(--green); font-weight:700;">Good</span></div>
        <div class="inv-val">48 kg</div>
        <div style="font-size:12px; color:var(--mute); margin-top:4px;">Shared · All brands</div>
        <div class="inv-bar"><div class="inv-bar-fill" style="width:80%;"></div></div>
      </div>
      <div class="inv-card">
        <div class="inv-hdr"><span>Chicken (Boneless)</span><span style="font-size:11px; color:var(--amber); font-weight:700;">Medium</span></div>
        <div class="inv-val">12 kg</div>
        <div style="font-size:12px; color:var(--mute); margin-top:4px;">Biryani Palace · Burger Station</div>
        <div class="inv-bar"><div class="inv-bar-fill" style="width:40%; background:var(--amber);"></div></div>
      </div>
      <div class="inv-card">
        <div class="inv-hdr"><span>Pizza Dough</span><span style="font-size:11px; color:var(--red); font-weight:700;">Low</span></div>
        <div class="inv-val">6 kg</div>
        <div style="font-size:12px; color:var(--mute); margin-top:4px;">Pizza Hub</div>
        <div class="inv-bar"><div class="inv-bar-fill low" style="width:20%;"></div></div>
      </div>
      <div class="inv-card">
        <div class="inv-hdr"><span>Quinoa</span><span style="font-size:11px; color:var(--green); font-weight:700;">Good</span></div>
        <div class="inv-val">18 kg</div>
        <div style="font-size:12px; color:var(--mute); margin-top:4px;">Healthy Bites</div>
        <div class="inv-bar"><div class="inv-bar-fill" style="width:70%;"></div></div>
      </div>
      <div class="inv-card">
        <div class="inv-hdr"><span>Burger Buns</span><span style="font-size:11px; color:var(--amber); font-weight:700;">Medium</span></div>
        <div class="inv-val">80 pcs</div>
        <div style="font-size:12px; color:var(--mute); margin-top:4px;">Burger Station</div>
        <div class="inv-bar"><div class="inv-bar-fill" style="width:45%; background:var(--amber);"></div></div>
      </div>
      <div class="inv-card">
        <div class="inv-hdr"><span>Packaging Boxes</span><span style="font-size:11px; color:var(--green); font-weight:700;">Good</span></div>
        <div class="inv-val">320 pcs</div>
        <div style="font-size:12px; color:var(--mute); margin-top:4px;">Shared · All brands</div>
        <div class="inv-bar"><div class="inv-bar-fill" style="width:90%;"></div></div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 10: REPORTS --}}
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">Business Reports</div>
      <h2>Know How Every Brand is Performing.</h2>
      <p>View daily sales, order counts, top-selling items and brand-wise performance to make better business decisions for your cloud kitchen.</p>
    </div>
    <div class="reports-preview">
      <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:24px; border-bottom:1px solid rgba(255,255,255,0.1); padding-bottom:16px;">
        <div style="font-weight:700; font-size:16px;">Cloud Kitchen Analytics — Today</div>
        <span class="badge" style="background:rgba(255,255,255,0.1); color:#fff;">Live</span>
      </div>
      <div class="rp-stats">
        <div class="rp-stat-card">
          <div class="rp-lbl">Total Revenue</div>
          <div class="rp-val">₹28,640</div>
        </div>
        <div class="rp-stat-card">
          <div class="rp-lbl">Total Orders</div>
          <div class="rp-val">68</div>
        </div>
        <div class="rp-stat-card">
          <div class="rp-lbl">Avg Order Value</div>
          <div class="rp-val">₹421</div>
        </div>
        <div class="rp-stat-card">
          <div class="rp-lbl">Active Brands</div>
          <div class="rp-val">4</div>
        </div>
      </div>
      <div style="display:grid; grid-template-columns:repeat(4,1fr); gap:12px;">
        <div style="background:rgba(255,255,255,0.05); border:1px solid rgba(255,255,255,0.1); border-radius:12px; padding:14px;">
          <div style="font-size:11px; font-weight:700; color:rgba(255,255,255,0.5); text-transform:uppercase; margin-bottom:6px;">Biryani Palace</div>
          <div style="font-size:18px; font-weight:700; color:#e6c594;">₹10,280</div>
          <div style="font-size:11px; color:rgba(255,255,255,0.4); margin-top:4px;">28 orders</div>
        </div>
        <div style="background:rgba(255,255,255,0.05); border:1px solid rgba(255,255,255,0.1); border-radius:12px; padding:14px;">
          <div style="font-size:11px; font-weight:700; color:rgba(255,255,255,0.5); text-transform:uppercase; margin-bottom:6px;">Pizza Hub</div>
          <div style="font-size:18px; font-weight:700; color:#e6c594;">₹8,960</div>
          <div style="font-size:11px; color:rgba(255,255,255,0.4); margin-top:4px;">18 orders</div>
        </div>
        <div style="background:rgba(255,255,255,0.05); border:1px solid rgba(255,255,255,0.1); border-radius:12px; padding:14px;">
          <div style="font-size:11px; font-weight:700; color:rgba(255,255,255,0.5); text-transform:uppercase; margin-bottom:6px;">Healthy Bites</div>
          <div style="font-size:18px; font-weight:700; color:#e6c594;">₹5,280</div>
          <div style="font-size:11px; color:rgba(255,255,255,0.4); margin-top:4px;">12 orders</div>
        </div>
        <div style="background:rgba(255,255,255,0.05); border:1px solid rgba(255,255,255,0.1); border-radius:12px; padding:14px;">
          <div style="font-size:11px; font-weight:700; color:rgba(255,255,255,0.5); text-transform:uppercase; margin-bottom:6px;">Burger Station</div>
          <div style="font-size:18px; font-weight:700; color:#e6c594;">₹4,120</div>
          <div style="font-size:11px; color:rgba(255,255,255,0.4); margin-top:4px;">10 orders</div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 11: BENEFITS --}}
<section class="alt">
  <div class="w">
    <div class="hd">
      <div class="eb">Key Benefits</div>
      <h2>Why Cloud Kitchens Choose Geni Menu.</h2>
    </div>
    <div class="benefits-grid">
      <div class="b-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg></div>
        <h3>Faster Kitchen Throughput</h3>
        <p>Auto-generated KOTs ensure cooking stations stay organized and orders move through preparation without delays.</p>
      </div>
      <div class="b-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg></div>
        <h3>No Order Missed</h3>
        <p>Centralized order dashboard means every incoming order is captured and tracked regardless of which channel it came from.</p>
      </div>
      <div class="b-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg></div>
        <h3>Smarter Inventory Control</h3>
        <p>Monitor shared and brand-specific ingredients together to prevent stockouts during your busiest service windows.</p>
      </div>
      <div class="b-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></div>
        <h3>Brand-Wise Insights</h3>
        <p>Understand which brands are driving revenue and which need attention with clear daily performance reports.</p>
      </div>
      <div class="b-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></div>
        <h3>One Team. Many Brands.</h3>
        <p>Your kitchen staff operates from a single interface without the complexity of managing separate systems per brand.</p>
      </div>
      <div class="b-card">
        <div class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg></div>
        <h3>Scalable for Growth</h3>
        <p>Add new virtual brands or kitchen locations as your cloud kitchen business expands without operational disruption.</p>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 12: WORKFLOW --}}
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">Order Workflow</div>
      <h2>From Order Received to Delivered. Seamlessly.</h2>
    </div>
    <div class="wf-grid">
      <div class="wf-node">
        <div class="wf-icon"><svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg></div>
        <div class="wf-lbl">Order<br>Received</div>
      </div>
      <div class="wf-arrow">→</div>
      <div class="wf-node">
        <div class="wf-icon"><svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg></div>
        <div class="wf-lbl">KOT<br>Generated</div>
      </div>
      <div class="wf-arrow">→</div>
      <div class="wf-node">
        <div class="wf-icon"><svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2z"/><path d="M12 6v6l4 2"/></svg></div>
        <div class="wf-lbl">Food<br>Prepared</div>
      </div>
      <div class="wf-arrow">→</div>
      <div class="wf-node">
        <div class="wf-icon"><svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12l5 5l10-10"/></svg></div>
        <div class="wf-lbl">Order<br>Ready</div>
      </div>
      <div class="wf-arrow">→</div>
      <div class="wf-node">
        <div class="wf-icon"><svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg></div>
        <div class="wf-lbl">Bill<br>Generated</div>
      </div>
      <div class="wf-arrow">→</div>
      <div class="wf-node">
        <div class="wf-icon"><svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 17H3a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11a2 2 0 0 1 2 2v3"/><rect x="9" y="11" width="14" height="10" rx="1"/><circle cx="12" cy="21" r="1"/><circle cx="20" cy="21" r="1"/></svg></div>
        <div class="wf-lbl">Delivered</div>
      </div>
    </div>
  </div>
</section>

{{-- SECTION 13: IDEAL FOR --}}
<section class="alt">
  <div class="w">
    <div class="hd">
      <h2>Built for Every Cloud Kitchen Model.</h2>
    </div>
    <div class="industry-grid">
      <div class="ind-card"><span>Single-Brand Cloud Kitchens</span></div>
      <div class="ind-card"><span>Multi-Brand Ghost Kitchens</span></div>
      <div class="ind-card"><span>Virtual Restaurant Concepts</span></div>
      <div class="ind-card"><span>Dark Kitchens</span></div>
      <div class="ind-card"><span>Delivery-Only Restaurants</span></div>
      <div class="ind-card"><span>Aggregator-Focused Kitchens</span></div>
      <div class="ind-card"><span>Home Chef Businesses</span></div>
      <div class="ind-card"><span>Multi-Location Kitchen Chains</span></div>
    </div>
  </div>
</section>

{{-- SECTION 14: CONNECTED PLATFORM --}}
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">Connected Platform</div>
      <h2>Everything Works Better Together.</h2>
    </div>
    <div class="conn-grid">
      <div class="conn-card"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2"/><rect x="9" y="3" width="6" height="4" rx="1"/><line x1="9" y1="12" x2="15" y2="12"/><line x1="9" y1="16" x2="13" y2="16"/></svg><br>Menu</div>
      <div class="conn-card"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg><br>Orders</div>
      <div class="conn-card"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg><br>KOT</div>
      <div class="conn-card"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg><br>POS</div>
      <div class="conn-card"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="4" width="22" height="16" rx="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg><br>Payments</div>
      <div class="conn-card"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg><br>Customers</div>
      <div class="conn-card"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg><br>Inventory</div>
      <div class="conn-card"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg><br>Reports</div>
    </div>
  </div>
</section>

{{-- SECTION 15: FAQ --}}
<section class="alt">
  <div class="w">
    <div class="hd">
      <h2>Frequently Asked Questions</h2>
    </div>
    <div class="faq-list">
      <details class="faq-item">
        <summary>Can Geni Menu manage a cloud kitchen? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></summary>
        <p>Yes. Geni Menu can help manage orders, kitchen workflows (KOTs), multi-brand menus, billing, inventory and daily business reporting for cloud kitchen operations.</p>
      </details>
      <details class="faq-item">
        <summary>Can I manage multiple virtual brands from one platform? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></summary>
        <p>Yes. Multiple virtual restaurant brands can be managed from a single Geni Menu account, each with its own menu, categories and pricing where supported.</p>
      </details>
      <details class="faq-item">
        <summary>How do orders reach the kitchen? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></summary>
        <p>Orders can be entered at the counter via the POS interface and automatically trigger kitchen order tickets (KOTs). Platform integrations depend on the supported features of your plan.</p>
      </details>
      <details class="faq-item">
        <summary>Can I track delivery status within the platform? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></summary>
        <p>Yes. Order status can be updated through the kitchen workflow (New → Preparing → Ready → Dispatched) giving your team real-time visibility of each order.</p>
      </details>
      <details class="faq-item">
        <summary>Can I monitor ingredients across all brands? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></summary>
        <p>Yes. Inventory management can help track shared and brand-specific ingredients, set low-stock alerts and monitor incoming stock purchases.</p>
      </details>
      <details class="faq-item">
        <summary>Can I view brand-wise sales reports? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></summary>
        <p>Yes. Supported reports provide visibility into daily revenue, order volumes, top-selling items and overall business performance for your cloud kitchen operations.</p>
      </details>
      <details class="faq-item">
        <summary>Is Geni Menu suitable for a single-brand delivery kitchen? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></summary>
        <p>Yes. Whether you operate one brand or multiple virtual concepts, Geni Menu can support your kitchen order management, billing and reporting needs.</p>
      </details>
    </div>
  </div>
</section>

{{-- FINAL CTA --}}
<section class="cta-sec">
  <div class="w cta-box">
    <h2>Ready to Run Your Cloud Kitchen Smarter?</h2>
    <p style="color:#6E6157; max-width:600px; margin:0 auto 28px;">Manage your multi-brand menus, kitchen orders, delivery billing, inventory and business insights from one connected platform with Geni Menu.</p>
    <div style="display:flex; gap:16px; justify-content:center; flex-wrap:wrap;">
      <a href="{{ route('restaurant_signup') }}" class="btn p">Get Started →</a>
      <a href="{{ route('contact.us') }}" class="btn o">Book a Demo →</a>
    </div>
  </div>
</section>

@endsection
