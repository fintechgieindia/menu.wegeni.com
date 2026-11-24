@php
$meta = [
    'title' => 'Multi-Cuisine Restaurant POS & Kitchen Routing Software | Geni Menu',
    'description' => 'One restaurant, many cuisines, one connected platform. Manage Indian, Chinese, Italian & Continental menus, multi-station KOT routing, combined GST billing, inventory, and cuisine analytics with Geni Menu.',
    'keywords' => 'multi-cuisine restaurant POS, multi-station KOT routing, Indian Chinese Italian restaurant software, combined table billing, restaurant inventory software, Geni Menu',
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

.mc-page * { box-sizing: border-box; }
.mc-page {
  font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
  color: var(--ink);
  background: var(--bg);
  -webkit-font-smoothing: antialiased;
  overflow-x: hidden;
}

.mc-page h1, .mc-page h2, .mc-page h3, .mc-page h4 {
  margin: 0;
  font-family: 'Outfit', 'Plus Jakarta Sans', sans-serif;
  font-weight: 500;
  line-height: 1.14;
  letter-spacing: -0.025em;
  color: var(--ink);
}
.mc-page h1 { font-size: clamp(34px, 4.6vw, 56px); }
.mc-page h2 { font-size: clamp(28px, 3.6vw, 44px); }
.mc-page h3 { font-size: 20px; font-weight: 600; }
.mc-page p { margin: 0; color: var(--mute); font-size: 16px; line-height: 1.65; }
.mc-page a { text-decoration: none; color: inherit; }

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
.mc-sec { padding: clamp(56px, 6.5vw, 92px) 0; background: var(--bg); position: relative; overflow: hidden; }
.mc-sec.alt { background: var(--bg2); }
.mc-sec.border-b { border-bottom: 1px solid var(--line); }

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
.rm-hero-cta { display: flex; gap: 14px; flex-wrap: wrap; margin-bottom: 28px; }
.mc-cuisine-pills { display: flex; gap: 8px; flex-wrap: wrap; padding-top: 20px; border-top: 1px solid var(--line); }
.mc-pill { padding: 6px 14px; border-radius: 99px; background: var(--bg2); border: 1px solid var(--line); font-size: 12.5px; font-weight: 700; color: var(--br-dark); }

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

/* Window Chrome & Dish Cards */
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

.mc-dish-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; }
.mc-dish-card { background: var(--bg2); border: 1px solid var(--line); border-radius: 18px; overflow: hidden; transition: transform .25s ease, box-shadow .25s ease; }
.mc-dish-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-md); background: #fff; }
.mc-dish-img { height: 155px; width: 100%; object-fit: cover; display: block; }
.mc-dish-body { padding: 16px 18px; }

.rm-split { display: grid; grid-template-columns: 1fr 1.05fr; gap: 36px; align-items: start; }
.rm-split.center { align-items: center; }

/* Dark Editorial Revenue Banner */
.mc-rev-banner { position: relative; border-radius: 26px; overflow: hidden; padding: clamp(32px, 4.5vw, 52px); color: #fff; background: #21160F; box-shadow: var(--shadow-lg); }
.mc-rev-bg { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; opacity: 0.25; }
.mc-rev-scrim { position: absolute; inset: 0; background: linear-gradient(135deg, rgba(33, 22, 15, 0.92) 0%, rgba(111, 78, 45, 0.78) 100%); }
.mc-rev-inner { position: relative; z-index: 2; }
.mc-rev-bars { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; margin-top: 28px; }
.mc-rev-card { background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.18); border-radius: 16px; padding: 20px; }
.mc-rev-card span { display: block; font-size: 11px; font-weight: 700; letter-spacing: 0.06em; text-transform: uppercase; color: rgba(255, 255, 255, 0.8); }
.mc-rev-card strong { display: block; font-family: 'Outfit', sans-serif; font-size: 28px; font-weight: 600; color: #fff; margin: 4px 0 8px; }
.mc-rev-track { height: 6px; background: rgba(255, 255, 255, 0.18); border-radius: 99px; overflow: hidden; }
.mc-rev-fill { height: 100%; background: #F2D3A8; border-radius: 99px; }

/* Station Cards, Benefits, Ecosystem, FAQ, CTA */
.rm-ind-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 22px; }
.rm-ind-card { position: relative; border-radius: 20px; overflow: hidden; min-height: 235px; display: flex; flex-direction: column; justify-content: flex-end; padding: 22px; border: 1px solid var(--line); box-shadow: var(--shadow-sm); background: #21160F; }
.rm-ind-card img { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; transition: transform .55s ease; }
.rm-ind-card:hover img { transform: scale(1.07); }
.rm-ind-scrim { position: absolute; inset: 0; background: linear-gradient(180deg, rgba(33, 22, 15, 0.16) 0%, rgba(33, 22, 15, 0.88) 100%); }
.rm-ind-body { position: relative; z-index: 2; }
.rm-ind-body h4 { color: #fff; font-size: 18px; font-weight: 600; margin-bottom: 5px; }
.rm-ind-body p { color: rgba(255, 255, 255, 0.86); font-size: 13.5px; line-height: 1.5; }

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
  .rm-val-grid, .mc-rev-bars { grid-template-columns: repeat(2, 1fr); }
  .rm-eco-grid { grid-template-columns: repeat(4, 1fr); }
}
@media (max-width: 820px) {
  .mc-dish-grid, .rm-ind-grid, .rm-ben-grid { grid-template-columns: 1fr; }
  .rm-eco-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 640px) {
  .w { padding: 0 16px; }
  .rm-val-grid, .mc-rev-bars { grid-template-columns: 1fr; }
  .rm-hero-float { flex-direction: column; align-items: flex-start; }
  .rm-hero-cta .btn, .rm-cta-btns .btn { width: 100%; }
}
</style>

<div class="mc-page">

  <!-- ================= BREADCRUMB ================= -->
  <div class="bc">
    <div class="w">
      <a href="{{ route('home') }}">Home</a>
      <span class="sep">/</span>
      <a href="{{ route('solutions') }}">Solutions</a>
      <span class="sep">/</span>
      <span class="cur">Multi-Cuisine Restaurant Solution</span>
    </div>
  </div>

  <!-- ================= 1. HERO SECTION ================= -->
  <section class="rm-hero">
    <div class="w">
      <div class="rm-hero-grid">
        <div>
          <div class="eb">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
            MULTI-CUISINE RESTAURANT SOLUTION
          </div>
          <h1>
            One Restaurant. Many Cuisines.<br>
            <span class="sf">One Connected Platform.</span>
          </h1>
          <p class="rm-hero-sub">
            Manage diverse menus, table orders, kitchen workflows, billing and restaurant operations from one powerful platform built for multi-cuisine dining rooms.
          </p>

          <div class="rm-hero-cta">
            <a href="{{ route('restaurant_signup') }}" onclick="if(typeof openPopup === 'function'){ openPopup(); return false; }" class="btn p">Get Started &rarr;</a>
            <a href="{{ route('contact.us') }}" class="btn o">Book a Demo</a>
          </div>

          <div class="mc-cuisine-pills">
            <span class="mc-pill">Indian &amp; Tandoor</span>
            <span class="mc-pill">Chinese &amp; Asian Wok</span>
            <span class="mc-pill">Italian &amp; Continental</span>
            <span class="mc-pill">Mocktails &amp; Desserts</span>
          </div>
        </div>

        <div class="rm-hero-media">
          <img src="{{ asset('assets/images/multi-cuisine-restaurant-hero.jpg') }}" alt="Multi-cuisine restaurant table with Indian biryani, pizza, noodles and server with tablet">
          <div class="rm-hero-scrim"></div>
          <div class="rm-hero-pill">
            <span class="rm-live-dot"></span>
            Table T08 &bull; 4 Kitchen Stations Synced
          </div>
          <div class="rm-hero-float">
            <div class="rm-hero-float-left">
              <div class="rm-hero-float-ico">
                <svg viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
              </div>
              <div>
                <div class="rm-hero-float-ttl">Indian (4) &bull; Chinese Wok (2) &bull; Pizza (1)</div>
                <div class="rm-hero-float-sub">Auto-split KOTs &bull; Combined Table Bill &#8377;2,460</div>
              </div>
            </div>
            <span class="rm-hero-float-tag">Auto-Routed</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= 2. VALUE STRIP (01-04) ================= -->
  <section class="mc-sec border-b">
    <div class="w">
      <div class="rm-val-grid r">
        <div class="rm-val-card">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h16"/></svg></div><span class="rm-num">01</span></div>
          <h3>Multi-Cuisine Menu</h3>
          <p>Organize dishes across cuisines, categories, prices and availability without menu confusion.</p>
        </div>
        <div class="rm-val-card">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M6 13.87A4 4 0 017.41 6a5.11 5.11 0 019.18 0A4 4 0 0118 13.87V21H6v-7.13z"/></svg></div><span class="rm-num">02</span></div>
          <h3>Multi-Station KOT</h3>
          <p>Route Indian, Wok, Tandoor, Pizza &amp; Bar items automatically to the right kitchen screen.</p>
        </div>
        <div class="rm-val-card">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><rect x="2" y="4" width="20" height="16" rx="2"/><line x1="6" y1="8" x2="18" y2="8"/><line x1="6" y1="12" x2="14" y2="12"/></svg></div><span class="rm-num">03</span></div>
          <h3>Combined POS Billing</h3>
          <p>Handle complex multi-cuisine bills, discounts and GST from one connected POS terminal.</p>
        </div>
        <div class="rm-val-card">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"/></svg></div><span class="rm-num">04</span></div>
          <h3>Station Inventory</h3>
          <p>Track diverse raw ingredients and stock levels across all cuisine preparation counters.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= 3. INTERACTIVE MULTI-CUISINE MENU ================= -->
  <section class="mc-sec alt">
    <div class="w">
      <div class="hd r">
        <div class="eb">MULTI-CUISINE MENU EXPERIENCE</div>
        <h2>One Menu. <span class="sf">Every Cuisine.</span></h2>
        <p>Structure your menu by Cuisine &rarr; Category &rarr; Dish so guests and stewards browse large selections effortlessly.</p>
      </div>

      <div class="rm-win r" style="max-width: 1080px; margin: 0 auto;">
        <div class="rm-win-bar">
          <div class="rm-win-dots"><i></i><i></i><i></i></div>
          <div class="rm-win-ttl">MULTI-CUISINE DIGITAL MENU</div>
          <div class="rm-filter-group">
            <button type="button" class="rm-filter-btn active" onclick="filterCuisine('all', this)">All Cuisines</button>
            <button type="button" class="rm-filter-btn" onclick="filterCuisine('indian', this)">Indian</button>
            <button type="button" class="rm-filter-btn" onclick="filterCuisine('chinese', this)">Chinese</button>
            <button type="button" class="rm-filter-btn" onclick="filterCuisine('italian', this)">Italian</button>
          </div>
        </div>
        <div class="rm-win-body">
          <div class="mc-dish-grid" id="mcDishGrid">
            <div class="mc-dish-card" data-c="indian">
              <img class="mc-dish-img" src="https://images.unsplash.com/photo-1563379091339-03b21ab4a4f8?auto=format&fit=crop&w=600&q=80" alt="Chicken Dum Biryani">
              <div class="mc-dish-body">
                <div style="display: flex; justify-content: space-between; margin-bottom: 6px;"><strong>Chicken Dum Biryani</strong><strong style="color: var(--br);">&#8377;320</strong></div>
                <p style="font-size: 13px; margin-bottom: 10px;">Aromatic Basmati rice slow-cooked with tender chicken and authentic spices.</p>
                <span style="font-size: 11px; font-weight: 700; color: var(--green); background: var(--green-bg); padding: 3px 10px; border-radius: 99px;">INDIAN MAIN &bull; In Stock</span>
              </div>
            </div>
            <div class="mc-dish-card" data-c="chinese">
              <img class="mc-dish-img" src="https://images.unsplash.com/photo-1585032226651-759b368d7246?auto=format&fit=crop&w=600&q=80" alt="Veg Hakka Noodles">
              <div class="mc-dish-body">
                <div style="display: flex; justify-content: space-between; margin-bottom: 6px;"><strong>Veg Hakka Noodles</strong><strong style="color: var(--br);">&#8377;240</strong></div>
                <p style="font-size: 13px; margin-bottom: 10px;">Wok-tossed noodles with crisp bell peppers, cabbage and Indo-Chinese sauces.</p>
                <span style="font-size: 11px; font-weight: 700; color: var(--amber); background: var(--amber-bg); padding: 3px 10px; border-radius: 99px;">CHINESE WOK &bull; In Stock</span>
              </div>
            </div>
            <div class="mc-dish-card" data-c="italian">
              <img class="mc-dish-img" src="https://images.unsplash.com/photo-1513104890138-7c749659a591?auto=format&fit=crop&w=600&q=80" alt="Margherita Pizza">
              <div class="mc-dish-body">
                <div style="display: flex; justify-content: space-between; margin-bottom: 6px;"><strong>Margherita Pizza</strong><strong style="color: var(--br);">&#8377;380</strong></div>
                <p style="font-size: 13px; margin-bottom: 10px;">Wood-fired thin crust topped with fresh mozzarella, San Marzano tomato sauce &amp; basil.</p>
                <span style="font-size: 11px; font-weight: 700; color: var(--blue); background: var(--blue-bg); padding: 3px 10px; border-radius: 99px;">ITALIAN PIZZA &bull; In Stock</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= 4. MULTI-STATION KITCHEN ROUTING (PHOTO CARDS) ================= -->
  <section class="mc-sec">
    <div class="w">
      <div class="hd r">
        <div class="eb">KITCHEN STATIONS</div>
        <h2>Keep Every Kitchen Workflow <span class="sf">Organized.</span></h2>
        <p>When guests at the same table order from different cuisines, Geni Menu routes each dish automatically to the right preparation station.</p>
      </div>

      <div class="rm-ind-grid r" style="margin-bottom: 36px;">
        <div class="rm-ind-card">
          <img src="https://images.unsplash.com/photo-1585937421612-70a008356fbe?auto=format&fit=crop&w=700&q=80" alt="Main Indian Kitchen">
          <div class="rm-ind-scrim"></div>
          <div class="rm-ind-body">
            <h4>Main Indian Kitchen</h4>
            <p>Tandoor, Biryani &amp; Curries &bull; Chicken Biryani &times; 2, Paneer Tikka &times; 1</p>
          </div>
        </div>
        <div class="rm-ind-card">
          <img src="https://images.unsplash.com/photo-1552611052-33e04de081de?auto=format&fit=crop&w=700&q=80" alt="Chinese Wok Station">
          <div class="rm-ind-scrim"></div>
          <div class="rm-ind-body">
            <h4>Chinese Wok Station</h4>
            <p>Noodles, Fried Rice &amp; Starters &bull; Veg Hakka Noodles &times; 2</p>
          </div>
        </div>
        <div class="rm-ind-card">
          <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?auto=format&fit=crop&w=700&q=80" alt="Pizza and Pasta Oven">
          <div class="rm-ind-scrim"></div>
          <div class="rm-ind-body">
            <h4>Pizza &amp; Pasta Oven</h4>
            <p>Wood-Fired Pizza &amp; Grills &bull; Margherita Pizza &times; 1</p>
          </div>
        </div>
      </div>

      <!-- Combined Order + Inventory Split -->
      <div class="rm-split r">
        <div class="rm-win">
          <div class="rm-win-bar">
            <div class="rm-win-dots"><i></i><i></i><i></i></div>
            <div class="rm-win-ttl">ONE BILL &bull; TABLE T08 (#ORD-9402)</div>
            <span style="font-size: 11px; font-weight: 700; color: var(--br);">6 Guests</span>
          </div>
          <div class="rm-win-body" style="display: flex; flex-direction: column; gap: 8px; font-size: 13.5px;">
            <div style="display: flex; justify-content: space-between; padding: 8px 12px; background: var(--bg2); border-radius: 8px;"><span><strong style="color: var(--br);">[Indian]</strong> Chicken Biryani &times; 2</span><strong>&#8377;640</strong></div>
            <div style="display: flex; justify-content: space-between; padding: 8px 12px; background: var(--bg2); border-radius: 8px;"><span><strong style="color: var(--br);">[Indian]</strong> Paneer Tikka &times; 1 (Less Spicy)</span><strong>&#8377;280</strong></div>
            <div style="display: flex; justify-content: space-between; padding: 8px 12px; background: var(--bg2); border-radius: 8px;"><span><strong style="color: var(--amber);">[Chinese]</strong> Veg Hakka Noodles &times; 2</span><strong>&#8377;480</strong></div>
            <div style="display: flex; justify-content: space-between; padding: 8px 12px; background: var(--bg2); border-radius: 8px;"><span><strong style="color: var(--blue);">[Italian]</strong> Margherita Pizza &times; 1</span><strong>&#8377;380</strong></div>
            <div style="display: flex; justify-content: space-between; padding: 8px 12px; background: var(--bg2); border-radius: 8px;"><span><strong style="color: var(--mute);">[Bar &amp; Desserts]</strong> Lime Soda &times; 3, Brownie &times; 2</span><strong>&#8377;680</strong></div>
            <div style="display: flex; justify-content: space-between; padding: 12px 14px; background: var(--br-light); border-radius: 10px; font-weight: 700; margin-top: 6px;"><span>Combined GST Grand Total</span><strong style="font-size: 18px; color: var(--br);">&#8377;2,460.00</strong></div>
          </div>
        </div>

        <div class="rm-win">
          <div class="rm-win-bar">
            <div class="rm-win-dots"><i></i><i></i><i></i></div>
            <div class="rm-win-ttl">MULTI-CUISINE INGREDIENT TRACKER</div>
          </div>
          <div class="rm-win-body" style="display: flex; flex-direction: column; gap: 10px; font-size: 13.5px;">
            <div style="display: flex; justify-content: space-between; padding: 10px 14px; background: var(--bg2); border-radius: 10px;"><span>Basmati Rice (Indian)</span><strong style="color: var(--green);">45 kg (Healthy)</strong></div>
            <div style="display: flex; justify-content: space-between; padding: 10px 14px; background: var(--bg2); border-radius: 10px;"><span>Noodles &amp; Soy Sauce (Chinese)</span><strong style="color: var(--green);">28 kg (Healthy)</strong></div>
            <div style="display: flex; justify-content: space-between; padding: 10px 14px; background: var(--amber-bg); border: 1px solid rgba(180,83,9,0.28); border-radius: 10px;"><span>Mozzarella Cheese (Italian)</span><strong style="color: var(--amber);">4.5 kg (Low Stock)</strong></div>
            <div style="display: flex; justify-content: space-between; padding: 10px 14px; background: var(--bg2); border-radius: 10px;"><span>Coffee Beans &amp; Lime (Beverages)</span><strong style="color: var(--green);">12 kg (Healthy)</strong></div>
            <div style="margin-top: 8px; display: flex; gap: 10px; flex-wrap: wrap;">
              <a href="{{ route('features.kot-management') }}" class="btn o" style="padding: 9px 18px; font-size: 13px;">Explore KOT &rarr;</a>
              <a href="{{ route('features.inventory-management') }}" class="btn p" style="padding: 9px 18px; font-size: 13px;">Explore Inventory &rarr;</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= 5. CUISINE REVENUE EDITORIAL BANNER ================= -->
  <section class="mc-sec alt">
    <div class="w">
      <div class="mc-rev-banner r">
        <img class="mc-rev-bg" src="https://images.unsplash.com/photo-1618160702438-9b02ab6515c9?auto=format&fit=crop&w=1400&q=80" alt="Multi-cuisine signature dishes">
        <div class="mc-rev-scrim"></div>
        <div class="mc-rev-inner">
          <div style="text-align: center; max-width: 680px; margin: 0 auto;">
            <div class="eb" style="background: rgba(255,255,255,0.14); border-color: rgba(255,255,255,0.28); color: #fff;">CUISINE ANALYTICS</div>
            <h2 style="color: #fff;">Know Which Cuisines <span style="font-family: 'Playfair Display', serif; font-style: italic; color: #F2D3A8;">Drive Revenue.</span></h2>
            <p style="color: rgba(255,255,255,0.85); margin-top: 10px;">Understand which dishes, cuisines and categories are driving your restaurant's daily sales.</p>
          </div>

          <div class="mc-rev-bars">
            <div class="mc-rev-card"><span>Indian &amp; Tandoor (42%)</span><strong>&#8377;20,420</strong><div class="mc-rev-track"><div class="mc-rev-fill" style="width: 84%;"></div></div></div>
            <div class="mc-rev-card"><span>Chinese &amp; Asian (28%)</span><strong>&#8377;13,610</strong><div class="mc-rev-track"><div class="mc-rev-fill" style="width: 56%;"></div></div></div>
            <div class="mc-rev-card"><span>Italian &amp; Grills (18%)</span><strong>&#8377;8,750</strong><div class="mc-rev-track"><div class="mc-rev-fill" style="width: 36%;"></div></div></div>
            <div class="mc-rev-card"><span>Beverages &amp; Desserts (12%)</span><strong>&#8377;5,840</strong><div class="mc-rev-track"><div class="mc-rev-fill" style="width: 24%;"></div></div></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= 6. KEY ADVANTAGES (3x2 NUMBERED) ================= -->
  <section class="mc-sec">
    <div class="w">
      <div class="hd r">
        <div class="eb">KEY ADVANTAGES</div>
        <h2>Built Around the Way <span class="sf">Multi-Cuisine Restaurants Work.</span></h2>
      </div>

      <div class="rm-ben-grid r">
        <div class="rm-ben-card"><div class="rm-ben-head"><div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h16"/></svg></div><span class="rm-num">01</span></div><h4>Organized Multi-Cuisine Menu</h4><p>Keep different cuisines structured, categorized and easy to manage.</p></div>
        <div class="rm-ben-card"><div class="rm-ben-head"><div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/></svg></div><span class="rm-num">02</span></div><h4>Clear Table Orders</h4><p>Handle diverse customer orders without losing track of items.</p></div>
        <div class="rm-ben-card"><div class="rm-ben-head"><div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M6 13.87A4 4 0 017.41 6a5.11 5.11 0 019.18 0A4 4 0 0118 13.87V21H6v-7.13z"/></svg></div><span class="rm-num">03</span></div><h4>Connected Kitchen</h4><p>Keep front-of-house and kitchen station preparation aligned.</p></div>
        <div class="rm-ben-card"><div class="rm-ben-head"><div class="rm-ic"><svg viewBox="0 0 24 24"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="M6 8h12M6 12h8"/></svg></div><span class="rm-num">04</span></div><h4>Simplified Billing</h4><p>Process complex multi-item orders through one billing workflow.</p></div>
        <div class="rm-ben-card"><div class="rm-ben-head"><div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"/></svg></div><span class="rm-num">05</span></div><h4>Inventory Visibility</h4><p>Stay aware of important ingredients and stock levels across stations.</p></div>
        <div class="rm-ben-card"><div class="rm-ben-head"><div class="rm-ic"><svg viewBox="0 0 24 24"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></div><span class="rm-num">06</span></div><h4>Business Insights</h4><p>Understand sales, orders, menu performance and category revenue.</p></div>
      </div>
    </div>
  </section>

  <!-- ================= 7. CONNECTED ECOSYSTEM (7-STEP) ================= -->
  <section class="mc-sec alt">
    <div class="w">
      <div class="hd r">
        <div class="eb">CONNECTED ECOSYSTEM</div>
        <h2>One Platform for <span class="sf">Every Cuisine &amp; Counter.</span></h2>
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

  <!-- ================= 8. FAQ (ALL 5 PRESERVED) ================= -->
  <section class="mc-sec">
    <div class="w">
      <div class="hd r">
        <div class="eb">FREQUENTLY ASKED QUESTIONS</div>
        <h2>Multi-Cuisine <span class="sf">FAQ.</span></h2>
        <p>Everything you need to know about Geni Menu for multi-cuisine restaurants.</p>
      </div>

      <div class="rm-faq-list r">
        <div class="rm-faq-item open"><div class="rm-faq-q" onclick="toggleFaq(this)">1. Is Geni Menu suitable for multi-cuisine restaurants?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div><div class="rm-faq-a">Yes. Geni Menu is designed to handle multi-cuisine dining rooms, helping organize diverse menus, table orders, KOT routing, billing and reports.</div></div>
        <div class="rm-faq-item"><div class="rm-faq-q" onclick="toggleFaq(this)">2. Can I manage different cuisines in one single menu?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div><div class="rm-faq-a">Yes. You can structure your menu by Cuisine (e.g. Indian, Chinese, Italian) and sub-categories (Starters, Main Course, Desserts) for clear browsing.</div></div>
        <div class="rm-faq-item"><div class="rm-faq-q" onclick="toggleFaq(this)">3. Can dine-in table orders contain items from multiple cuisines?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div><div class="rm-faq-a">Yes. Guests seated at the same table can order Biryani, Noodles, Pizza and Desserts under a single unified table order ticket.</div></div>
        <div class="rm-faq-item"><div class="rm-faq-q" onclick="toggleFaq(this)">4. Can orders be routed to different kitchen preparation stations?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div><div class="rm-faq-a">Yes. KOT tickets can route specific items to the Main Indian Kitchen, Chinese Wok, or Pizza Oven printers/screens.</div></div>
        <div class="rm-faq-item"><div class="rm-faq-q" onclick="toggleFaq(this)">5. How does POS billing handle multi-cuisine orders?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div><div class="rm-faq-a">The POS generates one itemized GST invoice listing all dishes by category or cuisine with single-click checkout.</div></div>
      </div>
    </div>
  </section>

  <!-- ================= 9. FINAL CTA ================= -->
  <section class="rm-cta">
    <div class="w">
      <div class="eb">UNIFY EVERY KITCHEN STATION</div>
      <h2>Bring Every Cuisine <span style="font-family: 'Playfair Display', serif; font-style: italic; color: #F5E1C8;">Together.</span></h2>
      <p>Manage your menus, tables, orders, kitchens, billing, inventory and reports from one connected restaurant platform with Geni Menu.</p>
      <div class="rm-cta-btns">
        <a href="{{ route('restaurant_signup') }}" onclick="if(typeof openPopup === 'function'){ openPopup(); return false; }" class="btn white">Get Started &rarr;</a>
        <a href="{{ route('contact.us') }}" class="btn ghost">Book a Demo</a>
      </div>
    </div>
  </section>

</div>

<script>
(function() {
  const els = document.querySelectorAll('.mc-page .r');
  if (!('IntersectionObserver' in window)) { els.forEach(el => el.classList.add('on')); return; }
  const io = new IntersectionObserver((entries) => {
    entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('on'); io.unobserve(e.target); } });
  }, { threshold: 0.08 });
  els.forEach(el => io.observe(el));
})();

function filterCuisine(cuisine, btn) {
  btn.parentElement.querySelectorAll('.rm-filter-btn').forEach(b => b.classList.remove('active'));
  btn.classList.add('active');
  document.querySelectorAll('#mcDishGrid .mc-dish-card').forEach(card => {
    card.style.display = (cuisine === 'all' || card.getAttribute('data-c') === cuisine) ? '' : 'none';
  });
}

function toggleFaq(el) {
  const item = el.parentElement;
  const isOpen = item.classList.contains('open');
  document.querySelectorAll('.rm-faq-item').forEach(i => i.classList.remove('open'));
  if (!isOpen) item.classList.add('open');
}
</script>

@endsection
