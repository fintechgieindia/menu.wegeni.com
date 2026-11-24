@php
$meta = [
    'title' => 'Dine-in Restaurant POS & Table Management Software | Geni Menu',
    'description' => 'Deliver a better dine-in experience from table to payment. Manage visual floor plans, table QR menus, dine-in orders, KOT kitchen sync, waiter requests, and POS billing with Geni Menu.',
    'keywords' => 'dine-in restaurant POS, table management software, restaurant floor plan, QR digital menu, KOT kitchen display, restaurant billing India, Geni Menu',
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
  --blue: #0369A1;
  --blue-bg: #E0F2FE;
}

.din-page * { box-sizing: border-box; }
.din-page {
  font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
  color: var(--ink);
  background: var(--bg);
  -webkit-font-smoothing: antialiased;
  overflow-x: hidden;
}

.din-page h1, .din-page h2, .din-page h3, .din-page h4 {
  margin: 0;
  font-family: 'Outfit', 'Plus Jakarta Sans', sans-serif;
  font-weight: 500;
  line-height: 1.14;
  letter-spacing: -0.025em;
  color: var(--ink);
}
.din-page h1 { font-size: clamp(34px, 4.6vw, 56px); }
.din-page h2 { font-size: clamp(28px, 3.6vw, 44px); }
.din-page h3 { font-size: 20px; font-weight: 600; }
.din-page p { margin: 0; color: var(--mute); font-size: 16px; line-height: 1.65; }
.din-page a { text-decoration: none; color: inherit; }

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
.din-sec { padding: clamp(56px, 6.5vw, 92px) 0; background: var(--bg); position: relative; overflow: hidden; }
.din-sec.alt { background: var(--bg2); }
.din-sec.border-b { border-bottom: 1px solid var(--line); }

.eb {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  font-size: 12px;
  letter-spacing: .14em;
  font-weight: 700;
  text-transform: uppercase;
  color: var(--br);
  margin-bottom: 16px;
  background: var(--br-light);
  padding: 7px 16px;
  border-radius: 99px;
  border: 1px solid rgba(135, 96, 57, 0.22);
}

.hd { max-width: 760px; margin: 0 auto 48px; text-align: center; }
.hd p { margin-top: 14px; font-size: 17px; }

/* Buttons */
.btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  padding: 14px 28px;
  border-radius: 12px;
  font: 700 15px 'Plus Jakarta Sans', sans-serif;
  border: 1.5px solid var(--br);
  transition: .25s ease;
  cursor: pointer;
}
.btn.p {
  background: linear-gradient(135deg, #876039 0%, #a87646 100%);
  color: #fff;
  box-shadow: 0 4px 16px rgba(135, 96, 57, 0.28);
}
.btn.p:hover { transform: translateY(-2px); background: linear-gradient(135deg, #6f4e2d 0%, #876039 100%); box-shadow: 0 8px 24px rgba(135, 96, 57, 0.36); }
.btn.o { color: var(--br); background: #fff; }
.btn.o:hover { background: var(--br); color: #fff; transform: translateY(-2px); }

/* Breadcrumb */
.bc { padding: 16px 0; background: var(--bg2); border-bottom: 1px solid var(--line); font-size: 13.5px; color: var(--mute); font-weight: 600; }
.bc .w { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; }
.bc a:hover { color: var(--br); }
.bc .sep { opacity: 0.5; }
.bc .cur { color: var(--br); font-weight: 700; }

/* Reveal */
.r { opacity: 0; transform: translateY(20px); transition: opacity .65s ease, transform .65s ease; }
.r.on { opacity: 1; transform: none; }

/* ================= HERO ================= */
.rm-hero {
  padding: clamp(48px, 6vw, 84px) 0;
  background: linear-gradient(180deg, var(--bg2) 0%, #ffffff 100%);
  border-bottom: 1px solid var(--line);
}
.rm-hero-grid { display: grid; grid-template-columns: 1fr 1.12fr; gap: 52px; align-items: center; }
.rm-hero-sub { font-size: 17.5px; margin: 20px 0 30px; max-width: 540px; color: var(--mute); }
.rm-hero-cta { display: flex; gap: 14px; flex-wrap: wrap; margin-bottom: 34px; }
.rm-hero-stats { display: grid; grid-template-columns: repeat(3, 1fr); gap: 18px; padding-top: 24px; border-top: 1px solid var(--line); }
.rm-hero-stat strong { display: block; font-family: 'Outfit', sans-serif; font-size: 21px; font-weight: 600; color: var(--br); line-height: 1.2; }
.rm-hero-stat span { font-size: 12.5px; font-weight: 600; color: var(--mute); }

.rm-hero-media {
  position: relative;
  border-radius: 26px;
  overflow: hidden;
  box-shadow: var(--shadow-lg);
  border: 1px solid rgba(135, 96, 57, 0.2);
  background: #1C1510;
  aspect-ratio: 4 / 3;
}
.rm-hero-media img { width: 100%; height: 100%; object-fit: cover; display: block; transition: transform 0.6s ease; }
.rm-hero-media:hover img { transform: scale(1.03); }
.rm-hero-scrim { position: absolute; inset: 0; background: linear-gradient(180deg, rgba(33, 22, 15, 0.14) 0%, rgba(33, 22, 15, 0.05) 45%, rgba(33, 22, 15, 0.64) 100%); pointer-events: none; }
.rm-hero-pill {
  position: absolute; top: 18px; left: 18px;
  display: inline-flex; align-items: center; gap: 8px;
  padding: 8px 14px; border-radius: 99px;
  background: rgba(255, 255, 255, 0.92); backdrop-filter: blur(10px);
  font-size: 12px; font-weight: 700; color: var(--ink);
  box-shadow: 0 6px 20px rgba(0, 0, 0, 0.14);
}
.rm-live-dot { width: 8px; height: 8px; border-radius: 50%; background: #16A34A; box-shadow: 0 0 0 3px rgba(22, 163, 74, 0.22); }
.rm-hero-float {
  position: absolute; left: 18px; right: 18px; bottom: 18px;
  background: rgba(255, 255, 255, 0.94); backdrop-filter: blur(12px);
  border: 1px solid rgba(135, 96, 57, 0.2); border-radius: 16px;
  padding: 14px 18px; display: flex; align-items: center; justify-content: space-between; gap: 14px;
  box-shadow: 0 12px 30px rgba(33, 22, 15, 0.18);
}
.rm-hero-float-left { display: flex; align-items: center; gap: 12px; }
.rm-hero-float-ico { width: 40px; height: 40px; border-radius: 11px; background: var(--br-light); color: var(--br); border: 1px solid rgba(135, 96, 57, 0.2); display: grid; place-items: center; flex: none; }
.rm-hero-float-ico svg { width: 20px; height: 20px; fill: none; stroke: currentColor; stroke-width: 2; }
.rm-hero-float-ttl { font-size: 13.5px; font-weight: 700; color: var(--ink); line-height: 1.25; }
.rm-hero-float-sub { font-size: 12px; color: var(--mute); }
.rm-hero-float-tag { font-size: 11px; font-weight: 700; padding: 5px 11px; border-radius: 99px; background: var(--green-bg); color: var(--green); white-space: nowrap; }

/* ================= VALUE STRIP (01-04) ================= */
.rm-val-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; }
.rm-val-card {
  background: var(--bg2); border: 1px solid var(--line); border-radius: 18px; padding: 24px;
  transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
}
.rm-val-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-md); border-color: rgba(135, 96, 57, 0.32); background: #fff; }
.rm-val-top { display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px; }
.rm-ic { width: 46px; height: 46px; border-radius: 13px; background: #fff; color: var(--br); border: 1px solid var(--line); display: grid; place-items: center; transition: .25s ease; }
.rm-ic svg { width: 21px; height: 21px; fill: none; stroke: currentColor; stroke-width: 1.9; stroke-linecap: round; stroke-linejoin: round; }
.rm-val-card:hover .rm-ic, .rm-ben-card:hover .rm-ic { background: var(--br); color: #fff; border-color: var(--br); }
.rm-num { font-family: 'Outfit', sans-serif; font-size: 13px; font-weight: 700; color: var(--br); opacity: 0.75; letter-spacing: 0.06em; }
.rm-val-card h3 { font-size: 17.5px; margin-bottom: 8px; }
.rm-val-card p { font-size: 14px; }

/* ================= WINDOW CHROME & FLOOR TILES ================= */
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

.rm-floor-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 14px; }
.rm-table-tile { padding: 18px 14px; border-radius: 16px; border: 1.5px solid var(--line); text-align: center; transition: transform .2s ease, box-shadow .2s ease; }
.rm-table-tile:hover { transform: translateY(-3px); box-shadow: var(--shadow-sm); }
.rm-table-tile.avail { background: var(--green-bg); border-color: rgba(21,128,61,0.3); color: var(--green); }
.rm-table-tile.occ { background: var(--br-light); border-color: rgba(135,96,57,0.45); color: var(--br); }
.rm-table-tile.res { background: var(--amber-bg); border-color: rgba(180,83,9,0.35); color: var(--amber); }
.rm-table-tile strong { display: block; font-family: 'Outfit', sans-serif; font-size: 17px; font-weight: 600; margin-bottom: 4px; }
.rm-table-tile span { font-size: 12px; font-weight: 700; }

.rm-split { display: grid; grid-template-columns: 1fr 1.05fr; gap: 36px; align-items: center; }
.rm-split.top { align-items: start; }

.din-photo-frame {
  position: relative; border-radius: 22px; overflow: hidden;
  border: 1px solid var(--line); box-shadow: var(--shadow-md); aspect-ratio: 4 / 3;
}
.din-photo-frame img { width: 100%; height: 100%; object-fit: cover; display: block; transition: transform .5s ease; }
.din-photo-frame:hover img { transform: scale(1.04); }
.din-photo-frame::after { content: ''; position: absolute; inset: 0; background: linear-gradient(180deg, transparent 40%, rgba(33, 22, 15, 0.78) 100%); }
.din-photo-cap { position: absolute; left: 20px; right: 20px; bottom: 18px; z-index: 2; color: #fff; }
.din-photo-cap strong { display: block; font-family: 'Outfit', sans-serif; font-size: 18px; font-weight: 600; color: #fff; }
.din-photo-cap span { font-size: 13px; color: rgba(255, 255, 255, 0.85); }

.rm-feat-list { display: flex; flex-direction: column; gap: 12px; }
.rm-feat-row { display: flex; align-items: flex-start; gap: 14px; padding: 14px 16px; background: #fff; border: 1px solid var(--line); border-radius: 14px; transition: border-color .2s, transform .2s; }
.rm-feat-row:hover { border-color: var(--br); transform: translateX(4px); }
.rm-feat-num { width: 30px; height: 30px; border-radius: 9px; background: var(--br-light); color: var(--br); font-family: 'Outfit', sans-serif; font-weight: 700; font-size: 12.5px; display: grid; place-items: center; flex: none; }

/* Peak Hour Dark Editorial Banner */
.din-peak-banner {
  position: relative; border-radius: 26px; overflow: hidden;
  padding: clamp(32px, 4.5vw, 52px); color: #fff; background: #21160F; box-shadow: var(--shadow-lg);
}
.din-peak-bg { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; opacity: 0.28; }
.din-peak-scrim { position: absolute; inset: 0; background: linear-gradient(135deg, rgba(33, 22, 15, 0.9) 0%, rgba(111, 78, 45, 0.78) 100%); }
.din-peak-inner { position: relative; z-index: 2; }
.din-peak-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; margin-top: 28px; }
.din-peak-stat { background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.18); border-radius: 16px; padding: 20px; text-align: center; }
.din-peak-stat span { display: block; font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; color: rgba(255, 255, 255, 0.8); }
.din-peak-stat strong { display: block; font-family: 'Outfit', sans-serif; font-size: 32px; font-weight: 600; color: #fff; margin-top: 4px; }

/* Benefits, Formats, Ecosystem, FAQ, CTA */
.rm-ben-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 22px; }
.rm-ben-card { background: #fff; border: 1px solid var(--line); border-radius: 18px; padding: 26px; box-shadow: var(--shadow-sm); transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease; }
.rm-ben-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-md); border-color: rgba(135, 96, 57, 0.34); }
.rm-ben-head { display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px; }
.rm-ben-card h4 { font-size: 18px; font-weight: 700; margin-bottom: 8px; }
.rm-ben-card p { font-size: 14.5px; }

.rm-ind-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 22px; }
.rm-ind-card {
  position: relative; border-radius: 20px; overflow: hidden; min-height: 235px;
  display: flex; flex-direction: column; justify-content: flex-end; padding: 22px;
  border: 1px solid var(--line); box-shadow: var(--shadow-sm); background: #21160F;
}
.rm-ind-card img { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; transition: transform .55s ease; }
.rm-ind-card:hover img { transform: scale(1.07); }
.rm-ind-scrim { position: absolute; inset: 0; background: linear-gradient(180deg, rgba(33, 22, 15, 0.14) 0%, rgba(33, 22, 15, 0.86) 100%); }
.rm-ind-body { position: relative; z-index: 2; }
.rm-ind-body h4 { color: #fff; font-size: 18px; font-weight: 600; margin-bottom: 5px; }
.rm-ind-body p { color: rgba(255, 255, 255, 0.84); font-size: 13.5px; line-height: 1.5; }

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
  .rm-val-grid, .din-peak-grid { grid-template-columns: repeat(2, 1fr); }
  .rm-eco-grid { grid-template-columns: repeat(4, 1fr); }
}
@media (max-width: 820px) {
  .rm-ben-grid, .rm-ind-grid, .rm-floor-grid { grid-template-columns: 1fr; }
  .rm-eco-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 640px) {
  .w { padding: 0 16px; }
  .rm-val-grid, .din-peak-grid { grid-template-columns: 1fr; }
  .rm-hero-float { flex-direction: column; align-items: flex-start; }
  .rm-hero-cta .btn, .rm-cta-btns .btn { width: 100%; }
}
</style>

<div class="din-page">

  <!-- ================= BREADCRUMB ================= -->
  <div class="bc">
    <div class="w">
      <a href="{{ route('home') }}">Home</a>
      <span class="sep">/</span>
      <a href="{{ route('solutions') }}">Solutions</a>
      <span class="sep">/</span>
      <span class="cur">Dine-in Restaurant Solution</span>
    </div>
  </div>

  <!-- ================= 1. HERO SECTION ================= -->
  <section class="rm-hero">
    <div class="w">
      <div class="rm-hero-grid">
        <div>
          <div class="eb">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M3 21h18M3 10h18M5 6l7-3 7 3M4 10v11M20 10v11"/></svg>
            DINE-IN RESTAURANT SOLUTION
          </div>
          <h1>
            Deliver a Better Dine-in Experience.<br>
            <span class="sf">From Table to Payment.</span>
          </h1>
          <p class="rm-hero-sub">
            Manage your tables, menus, orders, kitchen, waiter requests and billing from one connected restaurant platform built for modern dining rooms.
          </p>

          <div class="rm-hero-cta">
            <a href="{{ route('restaurant_signup') }}" onclick="if(typeof openPopup === 'function'){ openPopup(); return false; }" class="btn p">Get Started &rarr;</a>
            <a href="{{ route('contact.us') }}" class="btn o">Book a Demo</a>
          </div>

          <div class="rm-hero-stats">
            <div class="rm-hero-stat"><strong>Floor Plan</strong><span>Real-Time Tables</span></div>
            <div class="rm-hero-stat"><strong>KOT Sync</strong><span>Instant Kitchen Routing</span></div>
            <div class="rm-hero-stat"><strong>POS Billing</strong><span>Cash, Card &amp; UPI</span></div>
          </div>
        </div>

        <div class="rm-hero-media">
          <img src="{{ asset('assets/images/dine-in-restaurant-hero.jpg') }}" alt="Server delivering gourmet dine-in meal at warm walnut table with QR menu">
          <div class="rm-hero-scrim"></div>
          <div class="rm-hero-pill">
            <span class="rm-live-dot"></span>
            Grand Dining Hall &bull; 12 Avail / 08 Occ
          </div>
          <div class="rm-hero-float">
            <div class="rm-hero-float-left">
              <div class="rm-hero-float-ico">
                <svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><line x1="9" y1="3" x2="9" y2="21"/><line x1="15" y1="3" x2="15" y2="21"/></svg>
              </div>
              <div>
                <div class="rm-hero-float-ttl">18 Active Orders &bull; 06 KOTs Preparing</div>
                <div class="rm-hero-float-sub">04 Payments Pending &bull; Today’s Sales &#8377;48,620</div>
              </div>
            </div>
            <span class="rm-hero-float-tag">Live Floor Sync</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= 2. DINE-IN CHALLENGES (01-04) ================= -->
  <section class="din-sec border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">FLOOR &amp; SERVICE CHALLENGES</div>
        <h2>Dine-in Service Has <span class="sf">Many Moving Parts.</span></h2>
        <p>Tables, guests, orders, kitchen preparation, service requests and billing all need to work together during every service.</p>
      </div>

      <div class="rm-val-grid r">
        <div class="rm-val-card">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><line x1="9" y1="3" x2="9" y2="21"/><line x1="15" y1="3" x2="15" y2="21"/></svg></div><span class="rm-num">01</span></div>
          <h3>Table Management</h3>
          <p>Keep your dining floor organized and know which tables are available, reserved or occupied.</p>
        </div>
        <div class="rm-val-card">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/></svg></div><span class="rm-num">02</span></div>
          <h3>Order Management</h3>
          <p>Keep every table's order clear, including item quantities and special customer requests.</p>
        </div>
        <div class="rm-val-card">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M6 13.87A4 4 0 017.41 6a5.11 5.11 0 019.18 0A4 4 0 0118 13.87V21H6v-7.13z"/></svg></div><span class="rm-num">03</span></div>
          <h3>Kitchen Coordination</h3>
          <p>Move orders clearly from the dining floor to the kitchen without tickets getting lost.</p>
        </div>
        <div class="rm-val-card">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><rect x="2" y="4" width="20" height="16" rx="2"/><line x1="6" y1="8" x2="18" y2="8"/><line x1="6" y1="12" x2="14" y2="12"/></svg></div><span class="rm-num">04</span></div>
          <h3>Billing &amp; Payment</h3>
          <p>Bring orders and table billing together for a faster, error-free checkout experience.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= 3. COMPLETE DINE-IN EXPERIENCE ================= -->
  <section class="din-sec alt">
    <div class="w">
      <div class="rm-split r">
        <div>
          <div class="eb">CONNECTED OPERATIONS</div>
          <h2 style="margin-bottom: 16px;">Everything Your <span class="sf">Dining Floor Needs.</span></h2>
          <p style="margin-bottom: 24px;">Geni Menu connects front-of-house and back-of-house operations so your team can manage the entire dining experience from the first seat to the final payment.</p>

          <div class="rm-feat-list">
            <div class="rm-feat-row">
              <span class="rm-feat-num">01</span>
              <div><strong>Visually map tables and floor layout</strong><div style="font-size: 13.5px; color: var(--mute);">Know table occupancy and seating capacity instantly.</div></div>
            </div>
            <div class="rm-feat-row">
              <span class="rm-feat-num">02</span>
              <div><strong>Route orders directly to kitchen screens &amp; KOT</strong><div style="font-size: 13.5px; color: var(--mute);">Prevent order delays and preparation errors during rush hours.</div></div>
            </div>
            <div class="rm-feat-row">
              <span class="rm-feat-num">03</span>
              <div><strong>Settle bills quickly at table-side or cashier counter</strong><div style="font-size: 13.5px; color: var(--mute);">Support UPI, Cash, Cards &amp; split payments smoothly.</div></div>
            </div>
          </div>
        </div>

        <div class="din-photo-frame">
          <img src="https://images.unsplash.com/photo-1552566626-52f8b828add9?auto=format&fit=crop&w=1000&q=80" alt="Modern full-service dine-in restaurant floor">
          <div class="din-photo-cap">
            <strong>Seamless Front-of-House to Kitchen Flow</strong>
            <span>Guest arrives &rarr; Table seated &rarr; QR Menu &rarr; Order &rarr; KOT &rarr; Served &rarr; Paid</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= 4. INTERACTIVE FLOOR PLAN & TABLE ORDER ================= -->
  <section class="din-sec">
    <div class="w">
      <div class="hd r">
        <div class="eb">TABLE &amp; ORDER CONTROL</div>
        <h2>Know Every Table &amp; <span class="sf">Every Order at a Glance.</span></h2>
        <p>Filter live table statuses across your dining floor and keep steward orders linked directly to each table and KOT screen.</p>
      </div>

      <div class="rm-split top r">
        <!-- Interactive Floor Plan -->
        <div class="rm-win">
          <div class="rm-win-bar">
            <div class="rm-win-dots"><i></i><i></i><i></i></div>
            <div class="rm-win-ttl">MAIN DINING FLOOR PLAN</div>
            <div class="rm-filter-group">
              <button type="button" class="rm-filter-btn active" onclick="filterDinFloor('all', this)">All</button>
              <button type="button" class="rm-filter-btn" onclick="filterDinFloor('avail', this)">Available</button>
              <button type="button" class="rm-filter-btn" onclick="filterDinFloor('res', this)">Reserved</button>
              <button type="button" class="rm-filter-btn" onclick="filterDinFloor('occ', this)">Occupied</button>
            </div>
          </div>
          <div class="rm-win-body">
            <div class="rm-floor-grid" id="dinFloorGrid" style="margin-bottom: 20px;">
              <div class="rm-table-tile avail" data-st="avail"><strong>T01</strong><span>2 Seats &bull; Available</span></div>
              <div class="rm-table-tile res" data-st="res"><strong>T02</strong><span>4 Seats &bull; Reserved</span></div>
              <div class="rm-table-tile occ" data-st="occ"><strong>T03</strong><span>6 Seats &bull; Occupied</span></div>
              <div class="rm-table-tile avail" data-st="avail"><strong>T04</strong><span>4 Seats &bull; Available</span></div>
              <div class="rm-table-tile occ" data-st="occ"><strong>T05 (Active)</strong><span>8 Guests &bull; Occupied</span></div>
              <div class="rm-table-tile avail" data-st="avail"><strong>T06</strong><span>6 Seats &bull; Available</span></div>
            </div>
            <div style="text-align: center;">
              <a href="{{ route('features.table-management') }}" class="btn o" style="padding: 10px 22px; font-size: 13.5px;">Explore Table Management &rarr;</a>
            </div>
          </div>
        </div>

        <!-- Table Order + KOT Sync -->
        <div class="rm-win">
          <div class="rm-win-bar">
            <div class="rm-win-dots"><i></i><i></i><i></i></div>
            <div class="rm-win-ttl">TABLE T08 &bull; ORDER #ORD-2084</div>
            <span style="padding: 4px 10px; border-radius: 99px; background: var(--amber-bg); color: var(--amber); font-size: 11px; font-weight: 700;">KOT #1048 &bull; 08m</span>
          </div>
          <div class="rm-win-body">
            <div style="font-size: 12.5px; color: var(--mute); margin-bottom: 12px;">4 Guests &bull; Steward: <strong style="color: var(--ink);">Ramesh</strong> &bull; Sent to Kitchen at 07:42 PM</div>
            <div style="display: flex; flex-direction: column; gap: 8px; font-size: 13.5px; margin-bottom: 14px;">
              <div style="display: flex; justify-content: space-between; padding: 8px 12px; background: var(--bg2); border-radius: 8px;"><span>Chicken Biryani &times; 2</span><strong>&#8377;560</strong></div>
              <div style="display: flex; justify-content: space-between; padding: 8px 12px; background: var(--bg2); border-radius: 8px;"><span>Paneer Tikka &times; 1</span><strong>&#8377;220</strong></div>
              <div style="display: flex; justify-content: space-between; padding: 8px 12px; background: var(--bg2); border-radius: 8px;"><span>Butter Naan &times; 4</span><strong>&#8377;240</strong></div>
              <div style="display: flex; justify-content: space-between; padding: 8px 12px; background: var(--bg2); border-radius: 8px;"><span>Fresh Lime Soda &times; 2</span><strong>&#8377;180</strong></div>
            </div>
            <div style="background: var(--amber-bg); border-left: 3px solid var(--amber); padding: 10px 14px; border-radius: 8px; font-size: 12.5px; color: var(--amber); font-weight: 700; margin-bottom: 14px;">
              Special Note: Less spicy for Paneer Tikka. Extra lemon with Fresh Lime.
            </div>
            <div style="display: flex; justify-content: space-between; align-items: center; padding: 12px 14px; background: var(--br-light); border-radius: 10px;">
              <span style="font-weight: 700;">Total Order Value</span>
              <strong style="font-size: 18px; color: var(--br);">&#8377;1,200</strong>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= 5. QR MENU, WAITER REQUESTS & POS BILLING ================= -->
  <section class="din-sec alt">
    <div class="w">
      <div class="hd r">
        <div class="eb">TABLE-SIDE EXPERIENCE</div>
        <h2>QR Menu, Instant Requests &amp; <span class="sf">Smooth Checkout.</span></h2>
        <p>Give dine-in guests effortless digital menu browsing, one-tap steward calls, and fast GST receipt checkout.</p>
      </div>

      <div class="rm-ben-grid r">
        <!-- QR Menu -->
        <div class="rm-ben-card" style="padding: 22px;">
          <div style="font-size: 11.5px; font-weight: 700; color: var(--br); text-transform: uppercase; margin-bottom: 12px;">01 &bull; Table T05 QR Menu</div>
          <div style="background: var(--bg2); border-radius: 14px; padding: 14px; border: 1px solid var(--line); margin-bottom: 14px; display: flex; flex-direction: column; gap: 8px; font-size: 12.5px;">
            <div style="display: flex; justify-content: space-between; background: #fff; padding: 8px 10px; border-radius: 8px;"><span><strong>Chicken Biryani</strong></span><span style="color: var(--br); font-weight: 700;">&#8377;280</span></div>
            <div style="display: flex; justify-content: space-between; background: #fff; padding: 8px 10px; border-radius: 8px;"><span><strong>Paneer Butter Masala</strong></span><span style="color: var(--br); font-weight: 700;">&#8377;240</span></div>
            <div style="display: flex; justify-content: space-between; background: #fff; padding: 8px 10px; border-radius: 8px;"><span><strong>Butter Naan</strong></span><span style="color: var(--br); font-weight: 700;">&#8377;60</span></div>
          </div>
          <a href="{{ route('features.menu-management') }}" style="font-size: 13px; font-weight: 700; color: var(--br);">Explore Menu Management &rarr;</a>
        </div>

        <!-- Waiter Requests -->
        <div class="rm-ben-card" style="padding: 22px;">
          <div style="font-size: 11.5px; font-weight: 700; color: var(--br); text-transform: uppercase; margin-bottom: 12px;">02 &bull; Live Steward Alert</div>
          <div style="background: var(--br-light); border: 1.5px solid var(--br); border-radius: 14px; padding: 14px; margin-bottom: 14px;">
            <div style="display: flex; justify-content: space-between; margin-bottom: 6px; font-size: 12.5px;"><strong style="color: var(--br);">TABLE T08</strong><span style="background: var(--br); color: #fff; padding: 2px 8px; border-radius: 99px; font-size: 10px; font-weight: 700;">NEW</span></div>
            <div style="font-size: 14px; font-weight: 700; color: var(--ink);">Cold Water &amp; Extra Cutlery</div>
            <div style="font-size: 12px; color: var(--mute); margin-top: 4px;">Steward Ramesh notified on mobile POS</div>
          </div>
          <a href="{{ route('features.waiter-request') }}" style="font-size: 13px; font-weight: 700; color: var(--br);">Explore Waiter Requests &rarr;</a>
        </div>

        <!-- POS Receipt -->
        <div class="rm-ben-card" style="padding: 22px;">
          <div style="font-size: 11.5px; font-weight: 700; color: var(--br); text-transform: uppercase; margin-bottom: 12px;">03 &bull; Bill #INV-9402</div>
          <div style="background: var(--bg2); border-radius: 14px; padding: 14px; border: 1px solid var(--line); margin-bottom: 14px; font-size: 12.5px;">
            <div style="display: flex; justify-content: space-between; margin-bottom: 4px;"><span>Subtotal</span><span>&#8377;1,200.00</span></div>
            <div style="display: flex; justify-content: space-between; color: var(--amber); margin-bottom: 4px;"><span>Discount</span><span>-&#8377;50.00</span></div>
            <div style="display: flex; justify-content: space-between; margin-bottom: 8px;"><span>GST (5%)</span><span>&#8377;57.50</span></div>
            <div style="display: flex; justify-content: space-between; padding: 8px 10px; background: var(--green-bg); color: var(--green); border-radius: 8px; font-weight: 700;"><span>PAID VIA UPI (GPay) &check;</span><span>&#8377;1,207.50</span></div>
          </div>
          <a href="{{ route('features.pos-management') }}" style="font-size: 13px; font-weight: 700; color: var(--br);">Explore POS Management &rarr;</a>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= 6. PEAK HOUR DARK EDITORIAL BANNER ================= -->
  <section class="din-sec">
    <div class="w">
      <div class="din-peak-banner r">
        <img class="din-peak-bg" src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?auto=format&fit=crop&w=1400&q=80" alt="Busy dine-in restaurant evening service">
        <div class="din-peak-scrim"></div>
        <div class="din-peak-inner">
          <div style="text-align: center; max-width: 700px; margin: 0 auto;">
            <div class="eb" style="background: rgba(255,255,255,0.14); border-color: rgba(255,255,255,0.28); color: #fff;">PEAK HOUR CONTROL &amp; ANALYTICS</div>
            <h2 style="color: #fff;">Stay Organized When <span style="font-family: 'Playfair Display', serif; font-style: italic; color: #F2D3A8;">Every Table Is Active.</span></h2>
            <p style="color: rgba(255,255,255,0.85); margin-top: 10px;">Faster table clearance, zero ticket confusion, and real-time floor turnover visibility during peak lunch and weekend rushes.</p>
          </div>

          <div class="din-peak-grid">
            <div class="din-peak-stat"><span>Today's Sales</span><strong style="color: #F2D3A8;">&#8377;48,620</strong></div>
            <div class="din-peak-stat"><span>Dine-in Orders</span><strong>186</strong></div>
            <div class="din-peak-stat"><span>Avg Order Value</span><strong>&#8377;261</strong></div>
            <div class="din-peak-stat"><span>Active Tables</span><strong style="color: #86EFAC;">16 / 24</strong></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= 7. DINE-IN RESTAURANT FORMATS (3-COL WITH IMAGE ZOOM) ================= -->
  <section class="din-sec alt">
    <div class="w">
      <div class="hd r">
        <div class="eb">BUILT FOR EVERY FORMAT</div>
        <h2>Built for Different <span class="sf">Dine-in Restaurants.</span></h2>
        <p>Whether you run a casual family restaurant, a fine dining venue or a multi-cuisine hotel dining room, Geni Menu fits your operational workflow.</p>
      </div>

      <div class="rm-ind-grid r">
        <div class="rm-ind-card"><img src="https://images.unsplash.com/photo-1544025162-d76694265947?auto=format&fit=crop&w=700&q=80" alt="Family Restaurants"><div class="rm-ind-scrim"></div><div class="rm-ind-body"><h4>Family Restaurants</h4><p>Manage large seating arrangements, multi-item family orders and speedy bill settlements.</p></div></div>
        <div class="rm-ind-card"><img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?auto=format&fit=crop&w=700&q=80" alt="Casual Dining"><div class="rm-ind-scrim"></div><div class="rm-ind-body"><h4>Casual Dining</h4><p>Quick table allocation, QR menus and fast steward order entry for high guest turnover.</p></div></div>
        <div class="rm-ind-card"><img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&w=700&q=80" alt="Fine Dining"><div class="rm-ind-scrim"></div><div class="rm-ind-body"><h4>Fine Dining Restaurants</h4><p>Multi-course ordering, table reservations and elegant steward mobility.</p></div></div>
        <div class="rm-ind-card"><img src="https://images.unsplash.com/photo-1618160702438-9b02ab6515c9?auto=format&fit=crop&w=700&q=80" alt="Multi-Cuisine"><div class="rm-ind-scrim"></div><div class="rm-ind-body"><h4>Multi-Cuisine Restaurants</h4><p>Route Indian, Chinese and Tandoor items to separate kitchen stations automatically.</p></div></div>
        <div class="rm-ind-card"><img src="https://images.unsplash.com/photo-1585937421612-70a008356fbe?auto=format&fit=crop&w=700&q=80" alt="South & North Indian"><div class="rm-ind-scrim"></div><div class="rm-ind-body"><h4>South &amp; North Indian Restaurants</h4><p>Handle rapid dish preparation, high order volumes and meal combo modifications.</p></div></div>
        <div class="rm-ind-card"><img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=700&q=80" alt="Hotel Restaurants"><div class="rm-ind-scrim"></div><div class="rm-ind-body"><h4>Hotel Restaurants</h4><p>Connect in-house dining tables, guest room billing and restaurant POS transactions.</p></div></div>
      </div>
    </div>
  </section>

  <!-- ================= 8. KEY BENEFITS (3x2 NUMBERED) ================= -->
  <section class="din-sec">
    <div class="w">
      <div class="hd r">
        <div class="eb">KEY BENEFITS</div>
        <h2>Built Around the <span class="sf">Dine-in Experience.</span></h2>
      </div>

      <div class="rm-ben-grid r">
        <div class="rm-ben-card"><div class="rm-ben-head"><div class="rm-ic"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><line x1="9" y1="3" x2="9" y2="21"/></svg></div><span class="rm-num">01</span></div><h4>Better Table Visibility</h4><p>Know what is happening across your dining floor in real-time.</p></div>
        <div class="rm-ben-card"><div class="rm-ben-head"><div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h10"/></svg></div><span class="rm-num">02</span></div><h4>Easy Menu Access</h4><p>Give guests a simple QR code way to explore your menu.</p></div>
        <div class="rm-ben-card"><div class="rm-ben-head"><div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/></svg></div><span class="rm-num">03</span></div><h4>Organized Orders</h4><p>Keep table orders clear from table-side service to kitchen entry.</p></div>
        <div class="rm-ben-card"><div class="rm-ben-head"><div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M6 13.87A4 4 0 017.41 6a5.11 5.11 0 019.18 0A4 4 0 0118 13.87V21H6v-7.13z"/></svg></div><span class="rm-num">04</span></div><h4>Connected Kitchen</h4><p>Keep KOTs and preparation workflows organized without lost paper tickets.</p></div>
        <div class="rm-ben-card"><div class="rm-ben-head"><div class="rm-ic"><svg viewBox="0 0 24 24"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="M6 8h12M6 12h8"/></svg></div><span class="rm-num">05</span></div><h4>Smoother Billing</h4><p>Connect orders, tables and payments into one billing screen.</p></div>
        <div class="rm-ben-card"><div class="rm-ben-head"><div class="rm-ic"><svg viewBox="0 0 24 24"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></div><span class="rm-num">06</span></div><h4>Business Visibility</h4><p>Understand daily restaurant performance through connected reports.</p></div>
      </div>
    </div>
  </section>

  <!-- ================= 9. CONNECTED ECOSYSTEM (7-STEP) ================= -->
  <section class="din-sec alt">
    <div class="w">
      <div class="hd r">
        <div class="eb">CONNECTED ECOSYSTEM</div>
        <h2>One Platform for <span class="sf">Full-Service Dining.</span></h2>
        <p>Every dine-in module works together seamlessly — from table QR scan to end-of-day reports.</p>
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

  <!-- ================= 10. FAQ (ALL 7 PRESERVED) ================= -->
  <section class="din-sec">
    <div class="w">
      <div class="hd r">
        <div class="eb">FREQUENTLY ASKED QUESTIONS</div>
        <h2>Dine-in Restaurant <span class="sf">FAQ.</span></h2>
        <p>Everything you need to know about Geni Menu for dine-in restaurants.</p>
      </div>

      <div class="rm-faq-list r">
        <div class="rm-faq-item open"><div class="rm-faq-q" onclick="toggleFaq(this)">1. Is Geni Menu suitable for dine-in restaurants?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div><div class="rm-faq-a">Yes. Geni Menu is built specifically for dine-in operations including family restaurants, fine dining, casual dining, and multi-cuisine outlets.</div></div>
        <div class="rm-faq-item"><div class="rm-faq-q" onclick="toggleFaq(this)">2. Can I manage restaurant tables and floor plans?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div><div class="rm-faq-a">Yes. You can visually arrange your dining floor, set table capacity, and track live table status (available, reserved, occupied, cleaning).</div></div>
        <div class="rm-faq-item"><div class="rm-faq-q" onclick="toggleFaq(this)">3. Can guests access the digital menu from their table?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div><div class="rm-faq-a">Yes. Every table can have a QR code that lets guests view your digital menu, categories, photos, and prices directly on their mobile phones.</div></div>
        <div class="rm-faq-item"><div class="rm-faq-q" onclick="toggleFaq(this)">4. Can dine-in orders be linked to specific tables?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div><div class="rm-faq-a">Yes. All orders are strictly linked to table numbers, steward IDs, and seat locations for accurate service and billing.</div></div>
        <div class="rm-faq-item"><div class="rm-faq-q" onclick="toggleFaq(this)">5. Can orders be sent to the kitchen through KOT?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div><div class="rm-faq-a">Yes. Orders generate Kitchen Order Tickets (KOT) that can print automatically in the kitchen or display on thermal printers and KDS screens.</div></div>
        <div class="rm-faq-item"><div class="rm-faq-q" onclick="toggleFaq(this)">6. Can guests make table-side waiter requests?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div><div class="rm-faq-a">Yes. Guests can tap to request water, call a waiter, or ask for the bill, which instantly alerts floor stewards.</div></div>
        <div class="rm-faq-item"><div class="rm-faq-q" onclick="toggleFaq(this)">7. Can I track restaurant sales and daily orders?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div><div class="rm-faq-a">Yes. Comprehensive reports display total sales, order volume, top-selling dishes, payment breakdown, and table turnover.</div></div>
      </div>
    </div>
  </section>

  <!-- ================= 11. FINAL CTA ================= -->
  <section class="rm-cta">
    <div class="w">
      <div class="eb">UPGRADE YOUR DINING ROOM</div>
      <h2>Make Every Dine-in Service <span style="font-family: 'Playfair Display', serif; font-style: italic; color: #F5E1C8;">More Connected.</span></h2>
      <p>Bring your tables, menu, orders, kitchen, service and billing together with Geni Menu.</p>
      <div class="rm-cta-btns">
        <a href="{{ route('restaurant_signup') }}" onclick="if(typeof openPopup === 'function'){ openPopup(); return false; }" class="btn white">Get Started &rarr;</a>
        <a href="{{ route('contact.us') }}" class="btn ghost">Book a Demo</a>
      </div>
    </div>
  </section>

</div>

<script>
// Scroll reveal
(function() {
  const els = document.querySelectorAll('.din-page .r');
  if (!('IntersectionObserver' in window)) {
    els.forEach(el => el.classList.add('on'));
    return;
  }
  const io = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        e.target.classList.add('on');
        io.unobserve(e.target);
      }
    });
  }, { threshold: 0.08 });
  els.forEach(el => io.observe(el));
})();

// Floor Filter
function filterDinFloor(status, btn) {
  btn.parentElement.querySelectorAll('.rm-filter-btn').forEach(b => b.classList.remove('active'));
  btn.classList.add('active');
  document.querySelectorAll('#dinFloorGrid .rm-table-tile').forEach(tile => {
    tile.style.display = (status === 'all' || tile.getAttribute('data-st') === status) ? '' : 'none';
  });
}

// FAQ Accordion
function toggleFaq(el) {
  const item = el.parentElement;
  const isOpen = item.classList.contains('open');
  document.querySelectorAll('.rm-faq-item').forEach(i => i.classList.remove('open'));
  if (!isOpen) item.classList.add('open');
}
</script>

@endsection
