@php
$meta = [
    'title' => 'Takeaway Restaurant POS & Counter Pickup Software | Geni Menu',
    'description' => 'Make every takeaway order fast, simple, and organized. Manage digital menus, takeaway KOTs, live pickup boards, 2-tap counter billing, packaging stock, and takeaway analytics with Geni Menu.',
    'keywords' => 'takeaway restaurant POS, counter pickup board, parcel billing software, takeaway KOT management, food packaging inventory, Geni Menu',
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

.tk-page * { box-sizing: border-box; }
.tk-page {
  font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
  color: var(--ink);
  background: var(--bg);
  -webkit-font-smoothing: antialiased;
  overflow-x: hidden;
}

.tk-page h1, .tk-page h2, .tk-page h3, .tk-page h4 {
  margin: 0;
  font-family: 'Outfit', 'Plus Jakarta Sans', sans-serif;
  font-weight: 500;
  line-height: 1.14;
  letter-spacing: -0.025em;
  color: var(--ink);
}
.tk-page h1 { font-size: clamp(34px, 4.6vw, 56px); }
.tk-page h2 { font-size: clamp(28px, 3.6vw, 44px); }
.tk-page h3 { font-size: 20px; font-weight: 600; }
.tk-page p { margin: 0; color: var(--mute); font-size: 16px; line-height: 1.65; }
.tk-page a { text-decoration: none; color: inherit; }

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
.tk-sec { padding: clamp(56px, 6.5vw, 92px) 0; background: var(--bg); position: relative; overflow: hidden; }
.tk-sec.alt { background: var(--bg2); }
.tk-sec.border-b { border-bottom: 1px solid var(--line); }

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

/* Value Strip & Progression */
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

.rm-prog-grid-6 { display: grid; grid-template-columns: repeat(6, 1fr); gap: 14px; }
.rm-prog-card { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 18px 14px; text-align: center; transition: .25s ease; }
.rm-prog-card:hover { transform: translateY(-4px); border-color: var(--br); box-shadow: var(--shadow-sm); }
.rm-prog-num { display: inline-flex; align-items: center; justify-content: center; width: 32px; height: 32px; border-radius: 10px; background: var(--br-light); color: var(--br); font-family: 'Outfit', sans-serif; font-weight: 700; font-size: 12.5px; margin-bottom: 10px; border: 1px solid rgba(135, 96, 57, 0.2); }
.rm-prog-card h4 { font-size: 14px; font-weight: 700; margin-bottom: 4px; }
.rm-prog-card p { font-size: 12px; line-height: 1.45; }

/* Window Chrome & Pickup Board */
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

.tk-pickup-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 18px; }
.tk-col { background: var(--bg2); border: 1px solid var(--line); border-radius: 18px; padding: 18px; }
.tk-col.ready-col { background: var(--green-bg); border-color: rgba(21,128,61,0.28); }
.tk-col-hdr { display: flex; justify-content: space-between; font-size: 12px; font-weight: 700; letter-spacing: 0.06em; text-transform: uppercase; padding-bottom: 10px; margin-bottom: 12px; border-bottom: 1px solid var(--line); }
.tk-ticket { background: #fff; border: 1px solid var(--line); border-radius: 12px; padding: 12px 14px; margin-bottom: 10px; display: flex; justify-content: space-between; align-items: center; gap: 10px; }
.tk-ticket:last-child { margin-bottom: 0; }

.rm-split { display: grid; grid-template-columns: 1fr 1.05fr; gap: 32px; align-items: start; }

/* Dark Editorial Takeaway Analytics Banner */
.tk-stats-banner { position: relative; border-radius: 26px; overflow: hidden; padding: clamp(32px, 4.5vw, 52px); color: #fff; background: #21160F; box-shadow: var(--shadow-lg); }
.tk-stats-bg { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; opacity: 0.25; }
.tk-stats-scrim { position: absolute; inset: 0; background: linear-gradient(135deg, rgba(33, 22, 15, 0.92) 0%, rgba(111, 78, 45, 0.78) 100%); }
.tk-stats-inner { position: relative; z-index: 2; }
.tk-stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; margin-top: 28px; }
.tk-stat-box { background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.18); border-radius: 16px; padding: 20px; text-align: center; }
.tk-stat-box span { display: block; font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; color: rgba(255, 255, 255, 0.8); }
.tk-stat-box strong { display: block; font-family: 'Outfit', sans-serif; font-size: 30px; font-weight: 600; color: #fff; margin-top: 4px; }

/* Format Image Cards, Benefits, Ecosystem, FAQ, CTA */
.rm-ind-grid-4 { display: grid; grid-template-columns: repeat(4, 1fr); gap: 18px; }
.rm-ind-card { position: relative; border-radius: 20px; overflow: hidden; min-height: 220px; display: flex; flex-direction: column; justify-content: flex-end; padding: 20px; border: 1px solid var(--line); box-shadow: var(--shadow-sm); background: #21160F; }
.rm-ind-card img { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; transition: transform .55s ease; }
.rm-ind-card:hover img { transform: scale(1.07); }
.rm-ind-scrim { position: absolute; inset: 0; background: linear-gradient(180deg, rgba(33, 22, 15, 0.14) 0%, rgba(33, 22, 15, 0.88) 100%); }
.rm-ind-body { position: relative; z-index: 2; }
.rm-ind-body h4 { color: #fff; font-size: 17px; font-weight: 600; margin-bottom: 4px; }
.rm-ind-body p { color: rgba(255, 255, 255, 0.86); font-size: 12.5px; line-height: 1.45; }

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
  .rm-val-grid, .rm-ind-grid-4, .tk-stats-grid { grid-template-columns: repeat(2, 1fr); }
  .rm-prog-grid-6 { grid-template-columns: repeat(3, 1fr); }
  .rm-eco-grid { grid-template-columns: repeat(4, 1fr); }
}
@media (max-width: 820px) {
  .tk-pickup-grid, .rm-ben-grid { grid-template-columns: 1fr; }
  .rm-prog-grid-6, .rm-eco-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 640px) {
  .w { padding: 0 16px; }
  .rm-val-grid, .rm-ind-grid-4, .tk-stats-grid { grid-template-columns: 1fr; }
  .rm-hero-float { flex-direction: column; align-items: flex-start; }
  .rm-hero-cta .btn, .rm-cta-btns .btn { width: 100%; }
}
</style>

<div class="tk-page">

  <!-- ================= BREADCRUMB ================= -->
  <div class="bc">
    <div class="w">
      <a href="{{ route('home') }}">Home</a>
      <span class="sep">/</span>
      <a href="{{ route('solutions') }}">Solutions</a>
      <span class="sep">/</span>
      <span class="cur">Takeaway Restaurants</span>
    </div>
  </div>

  <!-- ================= 1. HERO SECTION ================= -->
  <section class="rm-hero">
    <div class="w">
      <div class="rm-hero-grid">
        <div>
          <div class="eb">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
            TAKEAWAY RESTAURANT SOLUTION
          </div>
          <h1>
            Make Every Takeaway Order<br>
            <span class="sf">Fast, Simple &amp; Organized.</span>
          </h1>
          <p class="rm-hero-sub">
            Manage menus, takeaway orders, kitchen operations, billing, payments and customer pickups from one connected restaurant platform built for high counter volume.
          </p>

          <div class="rm-hero-cta">
            <a href="{{ route('restaurant_signup') }}" onclick="if(typeof openPopup === 'function'){ openPopup(); return false; }" class="btn p">Get Started &rarr;</a>
            <a href="{{ route('contact.us') }}" class="btn o">Book a Demo</a>
          </div>

          <div class="rm-hero-stats">
            <div class="rm-hero-stat"><strong>Live Queue</strong><span>Preparing &rarr; Ready</span></div>
            <div class="rm-hero-stat"><strong>2-Tap POS</strong><span>Token &amp; GST Bill</span></div>
            <div class="rm-hero-stat"><strong>Box Stock</strong><span>Packaging Alerts</span></div>
          </div>
        </div>

        <div class="rm-hero-media">
          <img src="{{ asset('assets/images/takeaway-restaurants-hero.jpg') }}" alt="Takeaway counter staff handing sealed kraft food bag with token slip to customer">
          <div class="rm-hero-scrim"></div>
          <div class="rm-hero-pill">
            <span class="rm-live-dot"></span>
            Live Takeaway Counter &bull; 18 Orders
          </div>
          <div class="rm-hero-float">
            <div class="rm-hero-float-left">
              <div class="rm-hero-float-ico">
                <svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/></svg>
              </div>
              <div>
                <div class="rm-hero-float-ttl">Order #1257 Ready (Box 2) &bull; #1256 Prep</div>
                <div class="rm-hero-float-sub">6 Preparing &bull; 4 Ready for Pickup &bull; Today &#8377;48,920</div>
              </div>
            </div>
            <span class="rm-hero-float-tag">Fast Handover</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= 2. VALUE STRIP (01-04) ================= -->
  <section class="tk-sec border-b">
    <div class="w">
      <div class="rm-val-grid r">
        <div class="rm-val-card">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="16" rx="2"/><path d="M7 8h10M7 12h10"/></svg></div><span class="rm-num">01</span></div>
          <h3>Takeaway Order Queue</h3>
          <p>Keep every takeaway ticket visible from placement to preparation, pickup, and payment.</p>
        </div>
        <div class="rm-val-card">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg></div><span class="rm-num">02</span></div>
          <h3>Instant Takeaway KOT</h3>
          <p>Send clear kitchen tickets with spice notes and packing instructions directly to stations.</p>
        </div>
        <div class="rm-val-card">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/></svg></div><span class="rm-num">03</span></div>
          <h3>2-Tap Counter Billing</h3>
          <p>Process walk-in counter orders, print tokens and collect Cash, Card, or UPI in seconds.</p>
        </div>
        <div class="rm-val-card">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg></div><span class="rm-num">04</span></div>
          <h3>Packaging &amp; Stock Alerts</h3>
          <p>Track takeaway containers, carry bags, and key raw ingredients before rush hours.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= 3. COUNTER WORKFLOW (6 STEPS) ================= -->
  <section class="tk-sec alt border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">COUNTER WORKFLOW</div>
        <h2>A Faster <span class="sf">Counter Experience.</span></h2>
        <p>Streamline every counter touchpoint to serve more takeaway customers per hour during peak rush periods.</p>
      </div>

      <div class="rm-prog-grid-6 r">
        <div class="rm-prog-card"><div class="rm-prog-num">01</div><h4>Select Items</h4><p>Quick category add</p></div>
        <div class="rm-prog-card"><div class="rm-prog-num">02</div><h4>Confirm Order</h4><p>Take customer name</p></div>
        <div class="rm-prog-card"><div class="rm-prog-num">03</div><h4>Generate Bill</h4><p>Instant token print</p></div>
        <div class="rm-prog-card"><div class="rm-prog-num">04</div><h4>Accept Payment</h4><p>Cash, Card or UPI</p></div>
        <div class="rm-prog-card"><div class="rm-prog-num">05</div><h4>Prepare</h4><p>Live KOT in kitchen</p></div>
        <div class="rm-prog-card"><div class="rm-prog-num">06</div><h4>Pickup</h4><p>Fast customer exit</p></div>
      </div>
    </div>
  </section>

  <!-- ================= 4. LIVE COUNTER PICKUP BOARD ================= -->
  <section class="tk-sec">
    <div class="w">
      <div class="hd r">
        <div class="eb">COUNTER PICKUP BOARD</div>
        <h2>Ready Orders. <span class="sf">Faster Handover.</span></h2>
        <p>Give your counter team clear visibility over orders currently being prepared versus those ready for customer collection.</p>
      </div>

      <div class="tk-pickup-grid r" style="margin-bottom: 36px;">
        <div class="tk-col">
          <div class="tk-col-hdr"><span style="color: var(--amber);">Preparing in Kitchen</span><span>(3)</span></div>
          <div class="tk-ticket"><div><strong>#1256 &bull; Arun K.</strong><div style="font-size: 12px; color: var(--mute);">3 items &bull; Est 5 mins</div></div><span style="padding: 3px 9px; border-radius: 99px; background: var(--amber-bg); color: var(--amber); font-size: 11px; font-weight: 700;">Preparing</span></div>
          <div class="tk-ticket"><div><strong>#1260 &bull; Suresh M.</strong><div style="font-size: 12px; color: var(--mute);">2 items &bull; Est 8 mins</div></div><span style="padding: 3px 9px; border-radius: 99px; background: var(--amber-bg); color: var(--amber); font-size: 11px; font-weight: 700;">Preparing</span></div>
          <div class="tk-ticket"><div><strong>#1262 &bull; Rajesh</strong><div style="font-size: 12px; color: var(--mute);">4 items &bull; Est 10 mins</div></div><span style="padding: 3px 9px; border-radius: 99px; background: var(--amber-bg); color: var(--amber); font-size: 11px; font-weight: 700;">Preparing</span></div>
        </div>

        <div class="tk-col ready-col">
          <div class="tk-col-hdr"><span style="color: var(--green);">Ready for Pickup</span><span>(2)</span></div>
          <div class="tk-ticket" style="border-left: 4px solid var(--green);"><div><strong>#1257 &bull; Priya S.</strong><div style="font-size: 12px; color: var(--mute);">Box #2 &bull; Paid</div></div><span style="padding: 3px 9px; border-radius: 99px; background: var(--green-bg); color: var(--green); font-size: 11px; font-weight: 700;">Ready</span></div>
          <div class="tk-ticket" style="border-left: 4px solid var(--green);"><div><strong>#1258 &bull; Vikram R.</strong><div style="font-size: 12px; color: var(--mute);">Box #4 &bull; Paid</div></div><span style="padding: 3px 9px; border-radius: 99px; background: var(--green-bg); color: var(--green); font-size: 11px; font-weight: 700;">Ready</span></div>
        </div>

        <div class="tk-col">
          <div class="tk-col-hdr"><span style="color: var(--mute);">Completed / Picked Up</span><span>(2)</span></div>
          <div class="tk-ticket" style="opacity: 0.78;"><div><strong>#1252 &bull; Ramesh</strong><div style="font-size: 12px; color: var(--mute);">Handed at 7:15 PM</div></div><span style="padding: 3px 9px; border-radius: 99px; background: var(--bg2); color: var(--mute); font-size: 11px; font-weight: 700;">Done</span></div>
          <div class="tk-ticket" style="opacity: 0.78;"><div><strong>#1253 &bull; Kavita</strong><div style="font-size: 12px; color: var(--mute);">Handed at 7:18 PM</div></div><span style="padding: 3px 9px; border-radius: 99px; background: var(--bg2); color: var(--mute); font-size: 11px; font-weight: 700;">Done</span></div>
        </div>
      </div>

      <!-- Billing + Customer Info + Stock Split -->
      <div class="rm-split r">
        <div class="rm-win">
          <div class="rm-win-bar">
            <div class="rm-win-dots"><i></i><i></i><i></i></div>
            <div class="rm-win-ttl">ORDER #1256 &bull; ARUN KUMAR (7:30 PM)</div>
            <span style="padding: 3px 10px; border-radius: 99px; background: var(--green-bg); color: var(--green); font-size: 11px; font-weight: 700;">PAID (UPI)</span>
          </div>
          <div class="rm-win-body" style="display: flex; flex-direction: column; gap: 8px; font-size: 13.5px;">
            <div style="display: flex; justify-content: space-between; padding: 8px 12px; background: var(--bg2); border-radius: 8px;"><span>Chicken Biryani &times; 2 (Less Spicy)</span><strong>&#8377;640</strong></div>
            <div style="display: flex; justify-content: space-between; padding: 8px 12px; background: var(--bg2); border-radius: 8px;"><span>Paneer 65 &times; 1</span><strong>&#8377;220</strong></div>
            <div style="display: flex; justify-content: space-between; padding: 8px 12px; background: var(--bg2); border-radius: 8px;"><span>Fresh Lime Soda &times; 2</span><strong>&#8377;160</strong></div>
            <div style="display: flex; justify-content: space-between; padding: 12px 14px; background: var(--br-light); border-radius: 10px; font-weight: 700; margin-top: 4px;"><span>Total Amount (Cash / Card / UPI)</span><strong style="font-size: 18px; color: var(--br);">&#8377;1,020</strong></div>
          </div>
        </div>

        <div class="rm-win">
          <div class="rm-win-bar">
            <div class="rm-win-dots"><i></i><i></i><i></i></div>
            <div class="rm-win-ttl">PACKAGING &amp; INGREDIENT STOCK</div>
          </div>
          <div class="rm-win-body" style="display: flex; flex-direction: column; gap: 10px; font-size: 13.5px;">
            <div style="display: flex; justify-content: space-between; padding: 10px 14px; background: var(--bg2); border-radius: 10px;"><span>Basmati Rice (Biryani &amp; Meals)</span><strong style="color: var(--green);">25 kg (Sufficient)</strong></div>
            <div style="display: flex; justify-content: space-between; padding: 10px 14px; background: var(--bg2); border-radius: 10px;"><span>Fresh Chicken (Daily Stock)</span><strong style="color: var(--green);">18 kg (Sufficient)</strong></div>
            <div style="display: flex; justify-content: space-between; padding: 10px 14px; background: var(--amber-bg); border: 1px solid rgba(180,83,9,0.28); border-radius: 10px;"><span>Takeaway Containers</span><strong style="color: var(--amber);">42 pcs (Low Stock)</strong></div>
            <div style="margin-top: 6px; display: flex; gap: 10px; flex-wrap: wrap;">
              <a href="{{ route('features.pos-management') }}" class="btn o" style="padding: 9px 18px; font-size: 13px;">Explore POS &rarr;</a>
              <a href="{{ route('features.inventory-management') }}" class="btn p" style="padding: 9px 18px; font-size: 13px;">Explore Inventory &rarr;</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= 5. TAKEAWAY ANALYTICS EDITORIAL BANNER ================= -->
  <section class="tk-sec alt">
    <div class="w">
      <div class="tk-stats-banner r">
        <img class="tk-stats-bg" src="https://images.unsplash.com/photo-1563379091339-03b21ab4a4f8?auto=format&fit=crop&w=1400&q=80" alt="Takeaway food preparation and counter analytics">
        <div class="tk-stats-scrim"></div>
        <div class="tk-stats-inner">
          <div style="text-align: center; max-width: 680px; margin: 0 auto;">
            <div class="eb" style="background: rgba(255,255,255,0.14); border-color: rgba(255,255,255,0.28); color: #fff;">TAKEAWAY ANALYTICS</div>
            <h2 style="color: #fff;">Understand Your <span style="font-family: 'Playfair Display', serif; font-style: italic; color: #F2D3A8;">Takeaway Business.</span></h2>
            <p style="color: rgba(255,255,255,0.85); margin-top: 10px;">Analyze daily takeaway revenue, peak pickup hours, top dishes, and counter performance from desktop or mobile.</p>
          </div>

          <div class="tk-stats-grid">
            <div class="tk-stat-box"><span>Daily Sales</span><strong style="color: #F2D3A8;">&#8377;48,920</strong></div>
            <div class="tk-stat-box"><span>Takeaway Orders</span><strong>142</strong></div>
            <div class="tk-stat-box"><span>Avg Order Value</span><strong style="color: #86EFAC;">&#8377;344</strong></div>
            <div class="tk-stat-box"><span>Peak Pickup Hour</span><strong>7–9 PM</strong></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= 6. SUPPORTED TAKEAWAY FORMATS (4-COL PHOTO CARDS) ================= -->
  <section class="tk-sec">
    <div class="w">
      <div class="hd r">
        <div class="eb">SUPPORTED FORMATS</div>
        <h2>One Platform for Different <span class="sf">Takeaway Businesses.</span></h2>
        <p>Tailored to handle high order volume for biryani counters, burger outlets, pizza shops, and bakeries.</p>
      </div>

      <div class="rm-ind-grid-4 r">
        <div class="rm-ind-card"><img src="https://images.unsplash.com/photo-1563379091339-03b21ab4a4f8?auto=format&fit=crop&w=600&q=80" alt="Biryani Shops"><div class="rm-ind-scrim"></div><div class="rm-ind-body"><h4>Biryani Shops</h4><p>Fast bucket &amp; family pack billing with instant kitchen tokens.</p></div></div>
        <div class="rm-ind-card"><img src="https://images.unsplash.com/photo-1568901346375-23c9450c58cd?auto=format&fit=crop&w=600&q=80" alt="Burger Outlets"><div class="rm-ind-scrim"></div><div class="rm-ind-body"><h4>Burger &amp; Fast Food</h4><p>Combo menus, add-ons, and rapid counter collection.</p></div></div>
        <div class="rm-ind-card"><img src="https://images.unsplash.com/photo-1513104890138-7c749659a591?auto=format&fit=crop&w=600&q=80" alt="Pizza Outlets"><div class="rm-ind-scrim"></div><div class="rm-ind-body"><h4>Pizza Outlets</h4><p>Oven KOT tracking and organized box-number pickup.</p></div></div>
        <div class="rm-ind-card"><img src="https://images.unsplash.com/photo-1509440159596-0249088772ff?auto=format&fit=crop&w=600&q=80" alt="Bakeries and Cafes"><div class="rm-ind-scrim"></div><div class="rm-ind-body"><h4>Bakeries &amp; Caf&eacute;s</h4><p>Quick parcel billing for pastries, coffee, and snacks.</p></div></div>
      </div>
    </div>
  </section>

  <!-- ================= 7. KEY ADVANTAGES (3x2 NUMBERED) ================= -->
  <section class="tk-sec alt">
    <div class="w">
      <div class="hd r">
        <div class="eb">KEY OPERATIONAL ADVANTAGES</div>
        <h2>Built for Faster Orders &amp; <span class="sf">Smoother Pickups.</span></h2>
      </div>

      <div class="rm-ben-grid r">
        <div class="rm-ben-card"><div class="rm-ben-head"><div class="rm-ic"><svg viewBox="0 0 24 24"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg></div><span class="rm-num">01</span></div><h4>Faster Order Handling</h4><p>Keep takeaway orders organized from initial placement to final handover without counter bottlenecks.</p></div>
        <div class="rm-ben-card"><div class="rm-ben-head"><div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/></svg></div><span class="rm-num">02</span></div><h4>Clear Kitchen Operations</h4><p>Give your kitchen staff clear order specifications, item quantities, and special prep requests.</p></div>
        <div class="rm-ben-card"><div class="rm-ben-head"><div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/></svg></div><span class="rm-num">03</span></div><h4>Easy Pickup Management</h4><p>Instantly distinguish orders being prepared in the kitchen from items ready for customer collection.</p></div>
        <div class="rm-ben-card"><div class="rm-ben-head"><div class="rm-ic"><svg viewBox="0 0 24 24"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="M6 8h12M6 12h8"/></svg></div><span class="rm-num">04</span></div><h4>Rapid Counter Billing</h4><p>Complete counter transactions in seconds with flexible payment support including cash and UPI.</p></div>
        <div class="rm-ben-card"><div class="rm-ben-head"><div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg></div><span class="rm-num">05</span></div><h4>Inventory Visibility</h4><p>Maintain complete awareness of key ingredients and takeaway packaging items before peak rush hours.</p></div>
        <div class="rm-ben-card"><div class="rm-ben-head"><div class="rm-ic"><svg viewBox="0 0 24 24"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></div><span class="rm-num">06</span></div><h4>Actionable Business Insights</h4><p>Gain actionable reports on takeaway sales, busiest pickup periods, and item performance.</p></div>
      </div>
    </div>
  </section>

  <!-- ================= 8. CONNECTED ECOSYSTEM (7-STEP) ================= -->
  <section class="tk-sec">
    <div class="w">
      <div class="hd r">
        <div class="eb">CONNECTED ECOSYSTEM</div>
        <h2>Everything From <span class="sf">Order to Pickup.</span></h2>
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

  <!-- ================= 9. FAQ (ALL 8 PRESERVED) ================= -->
  <section class="tk-sec alt">
    <div class="w">
      <div class="hd r">
        <div class="eb">FREQUENTLY ASKED QUESTIONS</div>
        <h2>Takeaway Restaurant <span class="sf">FAQ.</span></h2>
        <p>Common questions about implementing Geni Menu for your takeaway operations.</p>
      </div>

      <div class="rm-faq-list r">
        <div class="rm-faq-item open"><div class="rm-faq-q" onclick="toggleFaq(this)">1. Is Geni Menu suitable for takeaway restaurants?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div><div class="rm-faq-a">Yes. Geni Menu is purpose-built to handle high takeaway order volumes, rapid KOT printing, kitchen tracking, and swift counter collection.</div></div>
        <div class="rm-faq-item"><div class="rm-faq-q" onclick="toggleFaq(this)">2. Can I manage takeaway orders separately from dine-in?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div><div class="rm-faq-a">Yes. Orders are explicitly tagged by type (Takeaway, Dine-in, Pickup) so your counter and kitchen staff handle each workflow appropriately.</div></div>
        <div class="rm-faq-item"><div class="rm-faq-q" onclick="toggleFaq(this)">3. Can customers browse the digital menu before ordering?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div><div class="rm-faq-a">Yes. You can provide a digital menu link or QR code at your counter for customers to explore categories while waiting in line.</div></div>
        <div class="rm-faq-item"><div class="rm-faq-q" onclick="toggleFaq(this)">4. Can I manage KOTs for takeaway orders?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div><div class="rm-faq-a">Yes. Takeaway orders automatically trigger digital KOTs or printed thermal tickets in the kitchen with special preparation notes.</div></div>
        <div class="rm-faq-item"><div class="rm-faq-q" onclick="toggleFaq(this)">5. Can I track orders from preparation to pickup?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div><div class="rm-faq-a">Yes. Geni Menu provides a live status queue showing New, Confirmed, Preparing, Ready for Pickup, and Completed orders.</div></div>
        <div class="rm-faq-item"><div class="rm-faq-q" onclick="toggleFaq(this)">6. Can I manage billing and multiple payment methods?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div><div class="rm-faq-a">Yes. Your cashier can generate bills in seconds and record cash, credit cards, or instant UPI payment transactions.</div></div>
        <div class="rm-faq-item"><div class="rm-faq-q" onclick="toggleFaq(this)">7. Can I track ingredient inventory for takeaway items?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div><div class="rm-faq-a">Yes. Track raw materials and takeaway containers to maintain optimal stock levels before peak rush periods.</div></div>
        <div class="rm-faq-item"><div class="rm-faq-q" onclick="toggleFaq(this)">8. Can I view takeaway sales and order reports?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div><div class="rm-faq-a">Yes. View detailed reports covering daily revenue, average ticket size, top-selling dishes, and peak pickup hours.</div></div>
      </div>
    </div>
  </section>

  <!-- ================= 10. FINAL CTA ================= -->
  <section class="rm-cta">
    <div class="w">
      <div class="eb">STREAMLINE EVERY PARCEL</div>
      <h2>Ready to Make Takeaway <span style="font-family: 'Playfair Display', serif; font-style: italic; color: #F5E1C8;">Simpler?</span></h2>
      <p>Manage your menu, takeaway orders, kitchen operations, counter pickup, billing, inventory, and reports from one connected platform with Geni Menu.</p>
      <div class="rm-cta-btns">
        <a href="{{ route('restaurant_signup') }}" onclick="if(typeof openPopup === 'function'){ openPopup(); return false; }" class="btn white">Get Started &rarr;</a>
        <a href="{{ route('contact.us') }}" class="btn ghost">Book a Demo</a>
      </div>
    </div>
  </section>

</div>

<script>
(function() {
  const els = document.querySelectorAll('.tk-page .r');
  if (!('IntersectionObserver' in window)) { els.forEach(el => el.classList.add('on')); return; }
  const io = new IntersectionObserver((entries) => {
    entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('on'); io.unobserve(e.target); } });
  }, { threshold: 0.08 });
  els.forEach(el => io.observe(el));
})();

function toggleFaq(el) {
  const item = el.parentElement;
  const isOpen = item.classList.contains('open');
  document.querySelectorAll('.rm-faq-item').forEach(i => i.classList.remove('open'));
  if (!isOpen) item.classList.add('open');
}
</script>

@endsection
