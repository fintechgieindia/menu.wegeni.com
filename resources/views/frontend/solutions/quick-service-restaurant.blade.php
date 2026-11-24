@php
$meta = [
    'title' => 'Quick Service Restaurant (QSR) POS & Fast Billing Software | Geni Menu',
    'description' => 'Fast service, smooth operations, happier customers. Run 20-second counter billing, queue-busting token displays, instant KOT kitchen screens, and multi-channel takeaway & delivery with Geni Menu.',
    'keywords' => 'QSR POS software, quick service restaurant billing, fast food POS India, token display system, counter billing software, Geni Menu',
];
@endphp

@extends('layouts.frontend-master')

@section('content')

{{-- Google Fonts --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Playfair+Display:ital,wght@0,600;1,600;1,700&display=swap" rel="stylesheet">

<style>
:root {
  --br: #876039;
  --br-dark: #6f4e2d;
  --br-light: #FBF6EE;
  --br-gold: #b88e56;
  --bg: #ffffff;
  --bg2: #FAF7F2;
  --bg3: #F5EFE6;
  --ink: #21160F;
  --mute: #6E6157;
  --line: rgba(135, 96, 57, 0.16);
  --card: #ffffff;
  --shadow-sm: 0 4px 20px rgba(33, 22, 15, 0.04);
  --shadow-md: 0 16px 40px rgba(33, 22, 15, 0.08);
  --shadow-lg: 0 24px 54px rgba(33, 22, 15, 0.12);
  --green: #15803D;
  --green-bg: #ECFDF5;
  --amber: #B45309;
  --amber-bg: #FFFBEB;
  --blue: #1D4ED8;
  --blue-bg: #EFF6FF;
}

.qsr-page * { box-sizing: border-box; }
.qsr-page {
  font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
  color: var(--ink);
  background: var(--bg);
  -webkit-font-smoothing: antialiased;
  overflow-x: hidden;
}

.qsr-page h1, .qsr-page h2, .qsr-page h3, .qsr-page h4 {
  margin: 0;
  font-family: 'Outfit', 'Plus Jakarta Sans', sans-serif;
  font-weight: 500;
  line-height: 1.14;
  letter-spacing: -0.025em;
  color: var(--ink);
}
.qsr-page h1 { font-size: clamp(34px, 4.6vw, 56px); }
.qsr-page h2 { font-size: clamp(28px, 3.6vw, 44px); }
.qsr-page h3 { font-size: 20px; font-weight: 600; }
.qsr-page p { margin: 0; color: var(--mute); font-size: 16px; line-height: 1.65; }
.qsr-page a { text-decoration: none; color: inherit; }

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

.w { max-width: 1240px; margin: 0 auto; padding: 0 24px; position: relative; z-index: 1; }
.qsr-sec { padding: clamp(56px, 6.5vw, 92px) 0; background: var(--bg); position: relative; overflow: hidden; }
.qsr-sec.alt { background: var(--bg2); }
.qsr-sec.border-b { border-bottom: 1px solid var(--line); }

.eb {
  display: inline-flex; align-items: center; gap: 8px;
  font-size: 12px; letter-spacing: .14em; font-weight: 700; text-transform: uppercase;
  color: var(--br); margin-bottom: 16px; background: var(--br-light);
  padding: 7px 16px; border-radius: 99px; border: 1px solid rgba(135, 96, 57, 0.22);
}
.hd { max-width: 760px; margin: 0 auto 48px; text-align: center; }
.hd p { margin-top: 14px; font-size: 17px; }

.btn {
  display: inline-flex; align-items: center; justify-content: center; gap: 8px;
  padding: 14px 28px; border-radius: 12px; font: 700 15px 'Plus Jakarta Sans', sans-serif;
  border: 1.5px solid var(--br); transition: .25s ease; cursor: pointer;
}
.btn.p { background: linear-gradient(135deg, #876039 0%, #a87646 100%); color: #fff; box-shadow: 0 4px 16px rgba(135, 96, 57, 0.28); }
.btn.p:hover { transform: translateY(-2px); background: linear-gradient(135deg, #6f4e2d 0%, #876039 100%); box-shadow: 0 8px 24px rgba(135, 96, 57, 0.36); }
.btn.o { color: var(--br); background: #fff; }
.btn.o:hover { background: var(--br); color: #fff; transform: translateY(-2px); }

.bc { padding: 16px 0; background: var(--bg2); border-bottom: 1px solid var(--line); font-size: 13.5px; color: var(--mute); font-weight: 600; }
.bc .w { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; }
.bc a:hover { color: var(--br); }
.bc .sep { opacity: 0.5; }
.bc .cur { color: var(--br); font-weight: 700; }

.r { opacity: 0; transform: translateY(20px); transition: opacity .65s ease, transform .65s ease; }
.r.on { opacity: 1; transform: none; }

/* Hero */
.rm-hero { padding: clamp(48px, 6vw, 84px) 0; background: linear-gradient(180deg, var(--bg2) 0%, #ffffff 100%); border-bottom: 1px solid var(--line); }
.rm-hero-grid { display: grid; grid-template-columns: 1fr 1.12fr; gap: 52px; align-items: center; }
.rm-hero-sub { font-size: 17.5px; margin: 20px 0 30px; max-width: 540px; color: var(--mute); }
.rm-hero-cta { display: flex; gap: 14px; flex-wrap: wrap; margin-bottom: 34px; }
.rm-hero-stats { display: grid; grid-template-columns: repeat(3, 1fr); gap: 18px; padding-top: 24px; border-top: 1px solid var(--line); }
.rm-hero-stat strong { display: block; font-family: 'Outfit', sans-serif; font-size: 21px; font-weight: 600; color: var(--br); line-height: 1.2; }
.rm-hero-stat span { font-size: 12.5px; font-weight: 600; color: var(--mute); }

.rm-hero-media { position: relative; border-radius: 26px; overflow: hidden; box-shadow: var(--shadow-lg); border: 1px solid rgba(135, 96, 57, 0.2); background: #1C1510; aspect-ratio: 4 / 3; }
.rm-hero-media img { width: 100%; height: 100%; object-fit: cover; display: block; transition: transform 0.6s ease; }
.rm-hero-media:hover img { transform: scale(1.03); }
.rm-hero-scrim { position: absolute; inset: 0; background: linear-gradient(180deg, rgba(33, 22, 15, 0.14) 0%, rgba(33, 22, 15, 0.05) 45%, rgba(33, 22, 15, 0.64) 100%); pointer-events: none; }
.rm-hero-pill { position: absolute; top: 18px; left: 18px; display: inline-flex; align-items: center; gap: 8px; padding: 8px 14px; border-radius: 99px; background: rgba(255, 255, 255, 0.92); backdrop-filter: blur(10px); font-size: 12px; font-weight: 700; color: var(--ink); box-shadow: 0 6px 20px rgba(0, 0, 0, 0.14); }
.rm-live-dot { width: 8px; height: 8px; border-radius: 50%; background: #16A34A; box-shadow: 0 0 0 3px rgba(22, 163, 74, 0.22); }
.rm-hero-float { position: absolute; left: 18px; right: 18px; bottom: 18px; background: rgba(255, 255, 255, 0.94); backdrop-filter: blur(12px); border: 1px solid rgba(135, 96, 57, 0.2); border-radius: 16px; padding: 14px 18px; display: flex; align-items: center; justify-content: space-between; gap: 14px; box-shadow: 0 12px 30px rgba(33, 22, 15, 0.18); }
.rm-hero-float-left { display: flex; align-items: center; gap: 12px; }
.rm-hero-float-ico { width: 40px; height: 40px; border-radius: 11px; background: var(--br-light); color: var(--br); border: 1px solid rgba(135, 96, 57, 0.2); display: grid; place-items: center; flex: none; }
.rm-hero-float-ico svg { width: 20px; height: 20px; fill: none; stroke: currentColor; stroke-width: 2; }
.rm-hero-float-ttl { font-size: 13.5px; font-weight: 700; color: var(--ink); line-height: 1.25; }
.rm-hero-float-sub { font-size: 12px; color: var(--mute); }
.rm-hero-float-tag { font-size: 11px; font-weight: 700; padding: 5px 11px; border-radius: 99px; background: var(--green-bg); color: var(--green); white-space: nowrap; }

/* Value Strip & Cards */
.rm-val-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; }
.rm-val-card { background: var(--bg2); border: 1px solid var(--line); border-radius: 18px; padding: 24px; transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease; }
.rm-val-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-md); border-color: rgba(135, 96, 57, 0.32); background: #fff; }
.rm-val-top { display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px; }
.rm-ic { width: 46px; height: 46px; border-radius: 13px; background: #fff; color: var(--br); border: 1px solid var(--line); display: grid; place-items: center; transition: .25s ease; }
.rm-ic svg { width: 21px; height: 21px; fill: none; stroke: currentColor; stroke-width: 1.9; stroke-linecap: round; stroke-linejoin: round; }
.rm-val-card:hover .rm-ic, .rm-ben-card:hover .rm-ic { background: var(--br); color: #fff; border-color: var(--br); }
.rm-num { font-family: 'Outfit', sans-serif; font-size: 13px; font-weight: 700; color: var(--br); opacity: 0.75; letter-spacing: 0.06em; }
.rm-val-card h3 { font-size: 17.5px; margin-bottom: 8px; }
.rm-val-card p { font-size: 14px; }

/* Window Chrome */
.rm-win { background: #fff; border: 1px solid var(--line); border-radius: 22px; overflow: hidden; box-shadow: var(--shadow-md); }
.rm-win-bar { display: flex; align-items: center; justify-content: space-between; padding: 13px 20px; background: var(--bg2); border-bottom: 1px solid var(--line); gap: 12px; flex-wrap: wrap; }
.rm-win-dots { display: flex; gap: 6px; }
.rm-win-dots i { width: 10px; height: 10px; border-radius: 50%; display: inline-block; }
.rm-win-dots i:nth-child(1) { background: #ff5f56; }
.rm-win-dots i:nth-child(2) { background: #ffbd2e; }
.rm-win-dots i:nth-child(3) { background: #27c93f; }
.rm-win-ttl { font-family: 'Outfit', sans-serif; font-size: 12px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; color: var(--br); }
.rm-win-body { padding: 24px; }

.rm-filter-group { display: flex; gap: 6px; flex-wrap: wrap; }
.rm-filter-btn { padding: 6px 13px; border-radius: 99px; border: 1px solid var(--line); background: #fff; color: var(--mute); font: 700 12px 'Plus Jakarta Sans', sans-serif; cursor: pointer; transition: .2s ease; }
.rm-filter-btn:hover { border-color: var(--br); color: var(--br); }
.rm-filter-btn.active { background: var(--br); color: #fff; border-color: var(--br); }

.rm-split { display: grid; grid-template-columns: 1fr 1.05fr; gap: 36px; align-items: start; }

/* KDS Cards */
.qsr-kds-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 18px; }
.qsr-kds-card { background: #fff; border: 1px solid var(--line); border-radius: 18px; padding: 20px; box-shadow: var(--shadow-sm); }
.qsr-kds-card.new { border-top: 4px solid var(--blue); }
.qsr-kds-card.prep { border-top: 4px solid var(--amber); }
.qsr-kds-card.ready { border-top: 4px solid var(--green); }

/* 4-Col Channel Image Cards */
.rm-ind-grid-4 { display: grid; grid-template-columns: repeat(4, 1fr); gap: 18px; }
.rm-ind-card { position: relative; border-radius: 20px; overflow: hidden; min-height: 230px; display: flex; flex-direction: column; justify-content: flex-end; padding: 20px; border: 1px solid var(--line); box-shadow: var(--shadow-sm); background: #21160F; }
.rm-ind-card img { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; transition: transform .55s ease; }
.rm-ind-card:hover img { transform: scale(1.07); }
.rm-ind-scrim { position: absolute; inset: 0; background: linear-gradient(180deg, rgba(33, 22, 15, 0.14) 0%, rgba(33, 22, 15, 0.88) 100%); }
.rm-ind-body { position: relative; z-index: 2; }
.rm-ind-body h4 { color: #fff; font-size: 17px; font-weight: 600; margin-bottom: 4px; }
.rm-ind-body p { color: rgba(255, 255, 255, 0.86); font-size: 13px; line-height: 1.45; }

/* Peak Speed Dark Editorial Banner */
.qsr-speed-banner { position: relative; border-radius: 26px; overflow: hidden; padding: clamp(32px, 4.5vw, 52px); color: #fff; background: #21160F; box-shadow: var(--shadow-lg); }
.qsr-speed-bg { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; opacity: 0.25; }
.qsr-speed-scrim { position: absolute; inset: 0; background: linear-gradient(135deg, rgba(33, 22, 15, 0.92) 0%, rgba(111, 78, 45, 0.78) 100%); }
.qsr-speed-inner { position: relative; z-index: 2; }
.qsr-speed-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; margin-top: 28px; }
.qsr-speed-stat { background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.18); border-radius: 16px; padding: 20px; text-align: center; }
.qsr-speed-stat span { display: block; font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; color: rgba(255, 255, 255, 0.8); }
.qsr-speed-stat strong { display: block; font-family: 'Outfit', sans-serif; font-size: 30px; font-weight: 600; color: #fff; margin-top: 4px; }

/* Benefits, Ecosystem, FAQ, CTA */
.rm-ben-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 22px; }
.rm-ben-card { background: #fff; border: 1px solid var(--line); border-radius: 18px; padding: 26px; box-shadow: var(--shadow-sm); transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease; }
.rm-ben-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-md); border-color: rgba(135, 96, 57, 0.34); }
.rm-ben-head { display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px; }
.rm-ben-card h4 { font-size: 18px; font-weight: 700; margin-bottom: 8px; }
.rm-ben-card p { font-size: 14.5px; }

.rm-eco-grid { display: grid; grid-template-columns: repeat(7, 1fr); gap: 12px; }
.rm-eco-card { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 16px 10px; text-align: center; transition: .25s ease; display: flex; flex-direction: column; align-items: center; gap: 8px; }
.rm-eco-card:hover { transform: translateY(-4px); border-color: var(--br); box-shadow: var(--shadow-sm); }
.rm-eco-step { font-size: 10.5px; font-weight: 700; letter-spacing: 0.08em; color: var(--br); }
.rm-eco-img { width: 44px; height: 44px; border-radius: 12px; background: var(--bg2); padding: 6px; object-fit: contain; }
.rm-eco-lbl { font-size: 12.5px; font-weight: 700; color: var(--ink); line-height: 1.25; }

.rm-faq-list { max-width: 860px; margin: 0 auto; display: flex; flex-direction: column; gap: 12px; }
.rm-faq-item { background: #fff; border: 1px solid var(--line); border-radius: 16px; overflow: hidden; transition: border-color .2s, box-shadow .2s; }
.rm-faq-item.open { border-color: var(--br); box-shadow: var(--shadow-sm); }
.rm-faq-q { padding: 18px 22px; font-size: 16px; font-weight: 700; color: var(--ink); cursor: pointer; display: flex; justify-content: space-between; align-items: center; gap: 14px; user-select: none; }
.rm-faq-q svg { width: 18px; height: 18px; stroke: var(--br); transition: transform .25s ease; flex: none; }
.rm-faq-item.open .rm-faq-q svg { transform: rotate(180deg); }
.rm-faq-a { display: none; padding: 14px 22px 20px; font-size: 15px; color: var(--mute); line-height: 1.65; border-top: 1px solid rgba(135, 96, 57, 0.08); }
.rm-faq-item.open .rm-faq-a { display: block; }

.rm-cta { padding: clamp(64px, 7vw, 96px) 0; background: linear-gradient(135deg, #876039 0%, #6f4e2d 100%); color: #fff; text-align: center; position: relative; overflow: hidden; }
.rm-cta .eb { background: rgba(255, 255, 255, 0.14); border-color: rgba(255, 255, 255, 0.28); color: #fff; }
.rm-cta h2 { color: #fff; font-size: clamp(30px, 4.2vw, 48px); margin-bottom: 16px; }
.rm-cta p { color: rgba(255, 255, 255, 0.88); max-width: 640px; margin: 0 auto 32px; font-size: 17.5px; }
.rm-cta-btns { display: flex; gap: 14px; justify-content: center; flex-wrap: wrap; }
.rm-cta .btn.white { background: #fff; color: var(--br-dark); border-color: #fff; }
.rm-cta .btn.white:hover { background: var(--br-light); transform: translateY(-2px); }
.rm-cta .btn.ghost { background: transparent; color: #fff; border-color: rgba(255, 255, 255, 0.55); }
.rm-cta .btn.ghost:hover { background: rgba(255, 255, 255, 0.14); transform: translateY(-2px); }

@media (max-width: 1080px) {
  .rm-hero-grid, .rm-split { grid-template-columns: 1fr; gap: 32px; }
  .rm-val-grid, .rm-ind-grid-4, .qsr-speed-grid { grid-template-columns: repeat(2, 1fr); }
  .rm-eco-grid { grid-template-columns: repeat(4, 1fr); }
}
@media (max-width: 820px) {
  .qsr-kds-grid, .rm-ben-grid { grid-template-columns: 1fr; }
  .rm-eco-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 640px) {
  .w { padding: 0 16px; }
  .rm-val-grid, .rm-ind-grid-4, .qsr-speed-grid { grid-template-columns: 1fr; }
  .rm-hero-float { flex-direction: column; align-items: flex-start; }
  .rm-hero-cta .btn, .rm-cta-btns .btn { width: 100%; }
}
</style>

<div class="qsr-page">

  <!-- ================= BREADCRUMB ================= -->
  <div class="bc">
    <div class="w">
      <a href="{{ route('home') }}">Home</a>
      <span class="sep">/</span>
      <a href="{{ route('solutions') }}">Solutions</a>
      <span class="sep">/</span>
      <span class="cur">Quick Service Restaurant (QSR) Solution</span>
    </div>
  </div>

  <!-- ================= 1. HERO SECTION ================= -->
  <section class="rm-hero">
    <div class="w">
      <div class="rm-hero-grid">
        <div>
          <div class="eb">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
            QUICK SERVICE RESTAURANT SOLUTION
          </div>
          <h1>
            Fast Service. Smooth Operations.<br>
            <span class="sf">Happier Customers.</span>
          </h1>
          <p class="rm-hero-sub">
            Manage orders, tables, menus, kitchen operations, billing and payments from one connected platform built for fast-paced restaurants and QSR outlets.
          </p>

          <div class="rm-hero-cta">
            <a href="{{ route('restaurant_signup') }}" onclick="if(typeof openPopup === 'function'){ openPopup(); return false; }" class="btn p">Get Started &rarr;</a>
            <a href="{{ route('contact.us') }}" class="btn o">Book a Demo</a>
          </div>

          <div class="rm-hero-stats">
            <div class="rm-hero-stat"><strong>22 sec / bill</strong><span>Instant Counter POS</span></div>
            <div class="rm-hero-stat"><strong>Token Queue</strong><span>Zero Counter Chaos</span></div>
            <div class="rm-hero-stat"><strong>Live KDS</strong><span>Instant Kitchen Prep</span></div>
          </div>
        </div>

        <div class="rm-hero-media">
          <img src="{{ asset('assets/images/quick-service-restaurant-hero.jpg') }}" alt="Quick Service Restaurant counter with cashier on touchscreen POS and customer paying via QR">
          <div class="rm-hero-scrim"></div>
          <div class="rm-hero-pill">
            <span class="rm-live-dot"></span>
            Counter 1 &bull; Order #1048 &bull; Token #48
          </div>
          <div class="rm-hero-float">
            <div class="rm-hero-float-left">
              <div class="rm-hero-float-ico">
                <svg viewBox="0 0 24 24"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
              </div>
              <div>
                <div class="rm-hero-float-ttl">246 Orders Today &bull; 06 Tokens Ready</div>
                <div class="rm-hero-float-sub">08 KOTs Preparing &bull; 3-Click UPI / Cash Checkout</div>
              </div>
            </div>
            <span class="rm-hero-float-tag">22s Avg Bill</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= 2. VALUE STRIP (01-04) ================= -->
  <section class="qsr-sec border-b">
    <div class="w">
      <div class="rm-val-grid r">
        <div class="rm-val-card">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><rect x="2" y="4" width="20" height="16" rx="2"/><line x1="6" y1="8" x2="18" y2="8"/><line x1="6" y1="12" x2="14" y2="12"/></svg></div><span class="rm-num">01</span></div>
          <h3>3-Click Fast Billing</h3>
          <p>Process orders, print token numbers and collect UPI or Cash in under 20 seconds.</p>
        </div>
        <div class="rm-val-card">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M6 13.87A4 4 0 017.41 6a5.11 5.11 0 019.18 0A4 4 0 0118 13.87V21H6v-7.13z"/></svg></div><span class="rm-num">02</span></div>
          <h3>Instant KDS Routing</h3>
          <p>Send counter orders straight to kitchen screens for high-speed burger, fry &amp; drink prep.</p>
        </div>
        <div class="rm-val-card">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/></svg></div><span class="rm-num">03</span></div>
          <h3>Combo &amp; Add-on Menu</h3>
          <p>Organized touch menu for burgers, combos, fries, shakes and quick upsells.</p>
        </div>
        <div class="rm-val-card">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"/></svg></div><span class="rm-num">04</span></div>
          <h3>Fast-Moving Stock</h3>
          <p>Stay aware of buns, patties, fries, sauces, beverages and takeaway box stock.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= 3. EXPRESS MENU & 3-CLICK COUNTER CHECKOUT ================= -->
  <section class="qsr-sec alt">
    <div class="w">
      <div class="hd r">
        <div class="eb">FAST-ORDER MENU &amp; CHECKOUT</div>
        <h2>Your Menu &amp; Counter POS. <span class="sf">Built for Speed.</span></h2>
        <p>Tap combos, apply discounts, print token numbers, and accept UPI, Cash, or Card without slowing down the queue.</p>
      </div>

      <div class="rm-split r">
        <!-- QSR Express Menu -->
        <div class="rm-win">
          <div class="rm-win-bar">
            <div class="rm-win-dots"><i></i><i></i><i></i></div>
            <div class="rm-win-ttl">QSR EXPRESS MENU</div>
          </div>
          <div class="rm-win-body" style="display: flex; flex-direction: column; gap: 10px;">
            <div style="display: flex; justify-content: space-between; align-items: center; padding: 12px 14px; background: var(--bg2); border-radius: 12px; border: 1px solid var(--line);">
              <div><strong style="font-size: 14.5px;">Crispy Chicken Burger Combo</strong><div style="font-size: 12px; color: var(--mute);">Burger + Fries + Cold Drink</div></div>
              <strong style="color: var(--br); font-size: 16px;">&#8377;240</strong>
            </div>
            <div style="display: flex; justify-content: space-between; align-items: center; padding: 12px 14px; background: var(--bg2); border-radius: 12px; border: 1px solid var(--line);">
              <div><strong style="font-size: 14.5px;">Peri Peri Fries (Large)</strong><div style="font-size: 12px; color: var(--mute);">Crispy Seasoned Potato Fries</div></div>
              <strong style="color: var(--br); font-size: 16px;">&#8377;120</strong>
            </div>
            <div style="display: flex; justify-content: space-between; align-items: center; padding: 12px 14px; background: var(--bg2); border-radius: 12px; border: 1px solid var(--line);">
              <div><strong style="font-size: 14.5px;">Chocolate Milkshake</strong><div style="font-size: 12px; color: var(--mute);">Thick Cold Beverage</div></div>
              <strong style="color: var(--br); font-size: 16px;">&#8377;140</strong>
            </div>
            <div style="margin-top: 6px;">
              <a href="{{ route('features.menu-management') }}" class="btn o" style="padding: 9px 20px; font-size: 13px;">Explore Menu Management &rarr;</a>
            </div>
          </div>
        </div>

        <!-- Fast Counter Checkout -->
        <div class="rm-win">
          <div class="rm-win-bar">
            <div class="rm-win-dots"><i></i><i></i><i></i></div>
            <div class="rm-win-ttl">QSR FAST POS &bull; TOKEN #48</div>
            <span style="font-size: 11px; font-weight: 700; color: var(--green);">Counter 1</span>
          </div>
          <div class="rm-win-body">
            <div style="display: flex; flex-direction: column; gap: 8px; font-size: 13.5px; margin-bottom: 14px;">
              <div style="display: flex; justify-content: space-between; padding: 8px 12px; background: var(--bg2); border-radius: 8px;"><span>Burger Combo &times; 2</span><strong>&#8377;480.00</strong></div>
              <div style="display: flex; justify-content: space-between; padding: 8px 12px; background: var(--bg2); border-radius: 8px;"><span>French Fries &times; 1</span><strong>&#8377;120.00</strong></div>
              <div style="display: flex; justify-content: space-between; padding: 8px 12px; background: var(--bg2); border-radius: 8px;"><span>Cold Coffee &times; 2</span><strong>&#8377;240.00</strong></div>
            </div>
            <div style="display: flex; justify-content: space-between; padding: 12px 14px; background: var(--br-light); border-radius: 10px; font-weight: 700; margin-bottom: 14px;">
              <span>Total Payable</span><strong style="font-size: 18px; color: var(--br);">&#8377;840.00</strong>
            </div>
            <div class="rm-filter-group" style="margin-bottom: 14px;">
              <button type="button" class="rm-filter-btn active" onclick="selectQsrPay('UPI / QR Selected — Instant Receipt Ready', this)">UPI / QR</button>
              <button type="button" class="rm-filter-btn" onclick="selectQsrPay('Cash Drawer Triggered — Change Calculated', this)">CASH</button>
              <button type="button" class="rm-filter-btn" onclick="selectQsrPay('Card Terminal Synced — Contactless Tap', this)">CARD</button>
            </div>
            <div id="qsrPayNote" style="font-size: 12.5px; font-weight: 700; color: var(--green);">&check; UPI / QR Selected — Instant Receipt Ready</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= 4. LIVE KDS BOARD & 4-CHANNEL PHOTO CARDS ================= -->
  <section class="qsr-sec">
    <div class="w">
      <div class="hd r">
        <div class="eb">KDS &amp; MULTI-CHANNEL SERVICE</div>
        <h2>From Order to Kitchen <span class="sf">Without the Confusion.</span></h2>
        <p>Manage dine-in, takeaway, pickup and delivery orders on one live kitchen display board.</p>
      </div>

      <div class="qsr-kds-grid r" style="margin-bottom: 42px;">
        <div class="qsr-kds-card new">
          <div style="display: flex; justify-content: space-between; margin-bottom: 8px;"><strong>KOT #1048</strong><span style="background: var(--blue-bg); color: var(--blue); font-size: 11px; font-weight: 700; padding: 2px 9px; border-radius: 99px;">NEW ORDER</span></div>
          <div style="font-size: 13px; font-weight: 700; margin-bottom: 4px;">Table T12 &bull; Counter 1</div>
          <p style="font-size: 13px;">Burger &times; 2 &bull; Fries &times; 2 (No Onion)</p>
        </div>
        <div class="qsr-kds-card prep">
          <div style="display: flex; justify-content: space-between; margin-bottom: 8px;"><strong>KOT #1047</strong><span style="background: var(--amber-bg); color: var(--amber); font-size: 11px; font-weight: 700; padding: 2px 9px; border-radius: 99px;">PREPARING</span></div>
          <div style="font-size: 13px; font-weight: 700; margin-bottom: 4px;">Takeaway &bull; Token #47</div>
          <p style="font-size: 13px;">Fried Chicken Bucket &times; 1 &bull; Dip &times; 2</p>
        </div>
        <div class="qsr-kds-card ready">
          <div style="display: flex; justify-content: space-between; margin-bottom: 8px;"><strong>KOT #1046</strong><span style="background: var(--green-bg); color: var(--green); font-size: 11px; font-weight: 700; padding: 2px 9px; border-radius: 99px;">READY</span></div>
          <div style="font-size: 13px; font-weight: 700; margin-bottom: 4px;">Pickup Counter &bull; Token #46</div>
          <p style="font-size: 13px;">Pizza Margherita &times; 1 &bull; Cold Coffee &times; 2</p>
        </div>
      </div>

      <!-- 4-Channel Editorial Photo Cards -->
      <div class="rm-ind-grid-4 r">
        <div class="rm-ind-card"><img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?auto=format&fit=crop&w=600&q=80" alt="QSR Dine-in"><div class="rm-ind-scrim"></div><div class="rm-ind-body"><h4>Dine-in</h4><p>Table-based ordering, QR scan &amp; fast seating turnover.</p></div></div>
        <div class="rm-ind-card"><img src="https://images.unsplash.com/photo-1561758033-d89a9ad46330?auto=format&fit=crop&w=600&q=80" alt="QSR Takeaway"><div class="rm-ind-scrim"></div><div class="rm-ind-body"><h4>Takeaway</h4><p>Quick counter ordering, token display &amp; fast collection.</p></div></div>
        <div class="rm-ind-card"><img src="https://images.unsplash.com/photo-1513104890138-7c749659a591?auto=format&fit=crop&w=600&q=80" alt="QSR Pickup"><div class="rm-ind-scrim"></div><div class="rm-ind-body"><h4>Pickup</h4><p>Organized order packing and customer counter retrieval.</p></div></div>
        <div class="rm-ind-card"><img src="https://images.unsplash.com/photo-1526367790999-0150786686a2?auto=format&fit=crop&w=600&q=80" alt="QSR Delivery"><div class="rm-ind-scrim"></div><div class="rm-ind-body"><h4>Delivery</h4><p>Manage delivery order packing &amp; dispatch from the same POS.</p></div></div>
      </div>
    </div>
  </section>

  <!-- ================= 5. PEAK SPEED EDITORIAL BANNER ================= -->
  <section class="qsr-sec alt">
    <div class="w">
      <div class="qsr-speed-banner r">
        <img class="qsr-speed-bg" src="https://images.unsplash.com/photo-1550547660-d9450f859349?auto=format&fit=crop&w=1400&q=80" alt="High volume QSR kitchen and counter">
        <div class="qsr-speed-scrim"></div>
        <div class="qsr-speed-inner">
          <div style="text-align: center; max-width: 680px; margin: 0 auto;">
            <div class="eb" style="background: rgba(255,255,255,0.14); border-color: rgba(255,255,255,0.28); color: #fff;">HIGH-VOLUME PERFORMANCE</div>
            <h2 style="color: #fff;">Keep Queues Moving <span style="font-family: 'Playfair Display', serif; font-style: italic; color: #F2D3A8;">During Peak Rush.</span></h2>
            <p style="color: rgba(255,255,255,0.85); margin-top: 10px;">Built for burger joints, pizza outlets, fried chicken shops, food courts, and fast-casual counters.</p>
          </div>

          <div class="qsr-speed-grid">
            <div class="qsr-speed-stat"><span>Counter Speed</span><strong style="color: #86EFAC;">22 sec</strong></div>
            <div class="qsr-speed-stat"><span>Active KOTs</span><strong style="color: #FCD34D;">08</strong></div>
            <div class="qsr-speed-stat"><span>Ready to Pickup</span><strong>06 Tokens</strong></div>
            <div class="qsr-speed-stat"><span>Today's Orders</span><strong style="color: #F2D3A8;">246</strong></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= 6. CONNECTED ECOSYSTEM (7-STEP) ================= -->
  <section class="qsr-sec">
    <div class="w">
      <div class="hd r">
        <div class="eb">CONNECTED ECOSYSTEM</div>
        <h2>Everything Works <span class="sf">Together.</span></h2>
        <p>Connect every step of your quick service operation through one restaurant management platform.</p>
      </div>

      <div class="rm-eco-grid r">
        <a href="{{ route('features.menu-management') }}" class="rm-eco-card"><span class="rm-eco-step">01</span><img class="rm-eco-img" src="{{ asset('assets/images/workflow/step-1-menu.png') }}" alt="Digital Menu"><span class="rm-eco-lbl">Digital Menu</span></a>
        <a href="{{ route('features.table-management') }}" class="rm-eco-card"><span class="rm-eco-step">02</span><img class="rm-eco-img" src="{{ asset('assets/images/workflow/step-4-table.png') }}" alt="Tables"><span class="rm-eco-lbl">Table &amp; Floor</span></a>
        <a href="{{ route('features.order-management') }}" class="rm-eco-card"><span class="rm-eco-step">03</span><img class="rm-eco-img" src="{{ asset('assets/images/workflow/step-2-order.png') }}" alt="Orders"><span class="rm-eco-lbl">Order Flow</span></a>
        <a href="{{ route('features.kot-management') }}" class="rm-eco-card"><span class="rm-eco-step">04</span><img class="rm-eco-img" src="{{ asset('assets/images/workflow/step-3-kitchen.png') }}" alt="KOT"><span class="rm-eco-lbl">KOT &amp; Kitchen</span></a>
        <a href="{{ route('features.pos-management') }}" class="rm-eco-card"><span class="rm-eco-step">05</span><img class="rm-eco-img" src="{{ asset('assets/images/workflow/step-5-billing.png') }}" alt="POS"><span class="rm-eco-lbl">POS Billing</span></a>
        <a href="{{ route('features.inventory-management') }}" class="rm-eco-card"><span class="rm-eco-step">06</span><img class="rm-eco-img" src="{{ asset('assets/images/workflow/step-6-payment.png') }}" alt="Inventory"><span class="rm-eco-lbl">Inventory</span></a>
        <a href="{{ route('features.reports') }}" class="rm-eco-card"><span class="rm-eco-step">07</span><img class="rm-eco-img" src="{{ asset('assets/images/workflow/step-7-reports.png') }}" alt="Reports"><span class="rm-eco-lbl">Reports</span></a>
      </div>
    </div>
  </section>

  <!-- ================= 7. FAQ (ALL 4 PRESERVED) ================= -->
  <section class="qsr-sec alt">
    <div class="w">
      <div class="hd r">
        <div class="eb">FREQUENTLY ASKED QUESTIONS</div>
        <h2>Quick Service (QSR) <span class="sf">FAQ.</span></h2>
        <p>Everything you need to know about Geni Menu for Quick Service Restaurants.</p>
      </div>

      <div class="rm-faq-list r">
        <div class="rm-faq-item open"><div class="rm-faq-q" onclick="toggleFaq(this)">1. Is Geni Menu suitable for Quick Service Restaurants (QSR)?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div><div class="rm-faq-a">Yes. Geni Menu is built for high-speed QSR operations, burger joints, pizza outlets, fried chicken shops, and fast casual counters.</div></div>
        <div class="rm-faq-item"><div class="rm-faq-q" onclick="toggleFaq(this)">2. Can I manage dine-in, takeaway and pickup orders?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div><div class="rm-faq-a">Yes. You can manage dine-in tables, takeaway token numbers, and pickup orders from a single POS system.</div></div>
        <div class="rm-faq-item"><div class="rm-faq-q" onclick="toggleFaq(this)">3. How does fast counter billing work?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div><div class="rm-faq-a">Cashiers can tap items, apply combo discounts, print GST bills and collect UPI or Cash payments in under 20 seconds.</div></div>
        <div class="rm-faq-item"><div class="rm-faq-q" onclick="toggleFaq(this)">4. Can orders be sent directly to the kitchen?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div><div class="rm-faq-a">Yes. Counter orders generate instant Kitchen Order Tickets (KOT) on thermal printers or kitchen screens.</div></div>
      </div>
    </div>
  </section>

  <!-- ================= 8. FINAL CTA ================= -->
  <section class="rm-cta">
    <div class="w">
      <div class="eb">SPEED UP EVERY COUNTER</div>
      <h2>Ready to Make Your Quick Service Restaurant <span style="font-family: 'Playfair Display', serif; font-style: italic; color: #F5E1C8;">Faster?</span></h2>
      <p>Manage your menu, orders, tables, kitchen, billing, inventory and reports from one connected platform with Geni Menu.</p>
      <div class="rm-cta-btns">
        <a href="{{ route('restaurant_signup') }}" onclick="if(typeof openPopup === 'function'){ openPopup(); return false; }" class="btn white">Get Started &rarr;</a>
        <a href="{{ route('contact.us') }}" class="btn ghost">Book a Demo</a>
      </div>
    </div>
  </section>

</div>

<script>
(function() {
  const els = document.querySelectorAll('.qsr-page .r');
  if (!('IntersectionObserver' in window)) { els.forEach(el => el.classList.add('on')); return; }
  const io = new IntersectionObserver((entries) => {
    entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('on'); io.unobserve(e.target); } });
  }, { threshold: 0.08 });
  els.forEach(el => io.observe(el));
})();

function selectQsrPay(note, btn) {
  btn.parentElement.querySelectorAll('.rm-filter-btn').forEach(b => b.classList.remove('active'));
  btn.classList.add('active');
  document.getElementById('qsrPayNote').innerHTML = '&check; ' + note;
}

function toggleFaq(el) {
  const item = el.parentElement;
  const isOpen = item.classList.contains('open');
  document.querySelectorAll('.rm-faq-item').forEach(i => i.classList.remove('open'));
  if (!isOpen) item.classList.add('open');
}
</script>

@endsection
