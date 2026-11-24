@php
    $meta = [
        'title' => 'KOT Management — Kitchen Order Tickets & KDS | Geni Menu',
        'description' => 'Send clear kitchen order information from the restaurant floor to the right preparation workflow, so your kitchen team knows what to prepare and where every order belongs.',
        'keywords' => 'KOT management, kitchen order ticket system, restaurant KDS, kitchen display system, multi-station kitchen routing, Geni Menu, WeGeni'
    ];
@endphp

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
  --shadow-lg: 0 26px 50px rgba(33, 22, 15, 0.12);
  --green: #10B981;
  --blue: #3B82F6;
  --yellow: #F59E0B;
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

/* Typography */
h1, h2, h3, h4, h5 {
  margin: 0;
  font-family: 'Outfit', 'Plus Jakarta Sans', sans-serif;
  font-weight: 500;
  line-height: 1.14;
  letter-spacing: -0.02em;
  color: var(--ink);
}
h1 { font-size: clamp(38px, 5.5vw, 64px); font-weight: 500; }
h2 { font-size: clamp(30px, 4vw, 46px); font-weight: 500; }
h3 { font-size: 21px; font-weight: 500; color: var(--ink); }
p { margin: 0; color: var(--mute); font-size: 16px; line-height: 1.65; }
a { color: inherit; text-decoration: none; }
ul { list-style: none; margin: 0; padding: 0; }

.sf {
  font-family: 'Playfair Display', Georgia, serif;
  font-style: italic;
  font-weight: 500;
  background: linear-gradient(135deg, #876039 0%, #b88e56 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  display: inline-block;
  padding-right: 4px;
}

.eb {
  display: inline-flex;
  align-items: center;
  gap: 6px;
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
section { padding: clamp(64px, 8vw, 100px) 0; background: var(--bg); position: relative; overflow: hidden; }
.hd { max-width: 740px; margin: 0 auto 56px; text-align: center; }
.hd p { margin-top: 16px; font-size: 18px; }

/* Buttons */
.btn { display: inline-flex; align-items: center; justify-content: center; gap: 8px; padding: 14px 28px; border-radius: 12px; font: 700 15px 'Plus Jakarta Sans', sans-serif; border: 1px solid var(--br); transition: .25s ease; cursor: pointer; text-decoration: none; }
.btn.p { background: linear-gradient(135deg, #876039 0%, #a87646 100%); color: #fff; box-shadow: 0 4px 16px rgba(135, 96, 57, 0.28); }
.btn.p:hover { transform: translateY(-2px); background: linear-gradient(135deg, #6f4e2d 0%, #876039 100%); box-shadow: 0 8px 24px rgba(135, 96, 57, 0.38); }
.btn.o { color: var(--br); background: #fff; }
.btn.o:hover { background: var(--br); color: #fff; transform: translateY(-2px); }

/* Breadcrumb */
.bc { padding: 18px 0 16px; background: var(--bg2); border-bottom: 1px solid var(--line); font-size: 14px; color: var(--mute); font-weight: 600; }
.bc .w { display: flex; align-items: center; gap: 8px; flex-wrap: wrap; }
.bc a { color: var(--mute); transition: color .2s; }
.bc a:hover { color: var(--br); }
.bc span { color: var(--br); font-weight: 700; }

/* Status Badges */
.badge { font-size: 10.5px; font-weight: 700; padding: 4px 10px; border-radius: 999px; text-transform: uppercase; display: inline-block; letter-spacing: 0.04em; }
.badge.new { background: #FEF3C7; color: #92400E; }
.badge.preparing { background: #DBEAFE; color: #1E40AF; }
.badge.ready { background: #D1FAE5; color: #065F46; }
.badge.completed { background: #F3E8FF; color: #6B21A8; }
.badge.dinein { background: #F3E8DC; color: #876039; }
.badge.takeaway { background: #FFEDD5; color: #C2410C; }
.badge.delivery { background: #E0F2FE; color: #0369A1; }

/* Theme Icon Fallback */
.gm-theme-icon {
  width: 18px;
  height: 18px;
  stroke: var(--br);
  fill: none;
  stroke-width: 2;
  stroke-linecap: round;
  stroke-linejoin: round;
  display: inline-block;
  vertical-align: middle;
  flex-shrink: 0;
}

/* FAQ Accordion */
.faq-list { max-width: 840px; margin: 0 auto; display: flex; flex-direction: column; gap: 14px; }
.faq-item { background: #fff; border: 1px solid var(--line); border-radius: 16px; overflow: hidden; transition: border-color .2s; }
.faq-item.open { border-color: var(--br); }
.faq-q { padding: 20px 24px; font-size: 17px; font-weight: 700; color: var(--ink); cursor: pointer; display: flex; justify-content: space-between; align-items: center; user-select: none; gap: 12px; }
.faq-q svg { width: 20px; height: 20px; transition: transform .3s; stroke: var(--br); flex-shrink: 0; }
.faq-item.open .faq-q svg { transform: rotate(180deg); }
.faq-a { padding: 0 24px 20px; font-size: 15px; color: var(--mute); display: none; line-height: 1.65; border-top: 1px solid rgba(135, 96, 57, 0.08); padding-top: 16px; }
.faq-item.open .faq-a { display: block; }

/* Reveal Animations */
.r { opacity: 0; transform: translateY(24px); transition: opacity .6s cubic-bezier(0.16, 1, 0.3, 1), transform .6s cubic-bezier(0.16, 1, 0.3, 1); }
.r.in { opacity: 1; transform: none; }

/* ================= RM DESIGN SYSTEM SECTIONS ================= */
.rm-hero-grid {
  display: grid;
  grid-template-columns: 1fr 1.12fr;
  gap: 44px;
  align-items: center;
}

/* Value Strip */
.rm-val-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 20px;
}
.rm-val-card {
  background: #FFFFFF;
  border: 1px solid rgba(135, 96, 57, 0.14);
  border-radius: 18px;
  padding: 24px 22px;
  transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
  box-shadow: 0 4px 16px rgba(33, 22, 15, 0.03);
}
.rm-val-card:hover {
  transform: translateY(-4px);
  border-color: rgba(135, 96, 57, 0.36);
  box-shadow: 0 14px 32px rgba(135, 96, 57, 0.10);
}
.rm-val-top {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 16px;
}
.rm-val-ic {
  width: 44px;
  height: 44px;
  border-radius: 12px;
  background: #F6EFE7;
  color: #876039;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  transition: background 0.25s ease, color 0.25s ease;
}
.rm-val-card:hover .rm-val-ic {
  background: #876039;
  color: #FFFFFF;
}
.rm-val-ic svg {
  width: 20px;
  height: 20px;
  stroke: currentColor;
  fill: none;
  stroke-width: 2;
  stroke-linecap: round;
  stroke-linejoin: round;
}
.rm-val-num {
  font-family: 'Outfit', sans-serif;
  font-size: 12px;
  font-weight: 700;
  color: #B49A80;
  letter-spacing: 0.06em;
}
.rm-val-card h4 {
  font-family: 'Outfit', 'Plus Jakarta Sans', sans-serif;
  font-size: 17px;
  font-weight: 700;
  color: #21160F;
  margin: 0 0 6px;
}
.rm-val-card p {
  font-size: 13.5px;
  line-height: 1.55;
  color: #6E6157;
  margin: 0;
}

/* Shared 2-Column Split & Feature Rows */
.rm-split {
  display: grid;
  grid-template-columns: 1fr 1.05fr;
  gap: 44px;
  align-items: center;
}
.rm-feat-list {
  display: flex;
  flex-direction: column;
  gap: 11px;
  list-style: none;
  padding: 0;
  margin: 0;
}
.rm-feat-row {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 11px 14px;
  background: #FAF7F3;
  border: 1px solid rgba(135, 96, 57, 0.12);
  border-radius: 12px;
  font-size: 14px;
  font-weight: 600;
  color: #21160F;
}
.rm-check-dot {
  width: 22px;
  height: 22px;
  border-radius: 50%;
  background: #F3E8DC;
  color: #876039;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  font-size: 11px;
  font-weight: 800;
  flex-shrink: 0;
}

/* Polished Mockup Windows */
.rm-win {
  background: #FFFFFF;
  border: 1px solid rgba(135, 96, 57, 0.18);
  border-radius: 22px;
  overflow: hidden;
  box-shadow: 0 20px 48px rgba(33, 22, 15, 0.08), 0 2px 8px rgba(135, 96, 57, 0.05);
}
.rm-win-bar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 13px 18px;
  background: #FAF6F0;
  border-bottom: 1px solid rgba(135, 96, 57, 0.12);
  flex-wrap: wrap;
  gap: 8px;
}
.rm-win-dots {
  display: flex;
  gap: 6px;
}
.rm-win-dots i {
  width: 10px;
  height: 10px;
  border-radius: 50%;
  display: block;
}
.rm-win-dots i:nth-child(1) { background: #F87171; }
.rm-win-dots i:nth-child(2) { background: #FBBF24; }
.rm-win-dots i:nth-child(3) { background: #34D399; }
.rm-win-ttl {
  font-size: 11px;
  font-weight: 700;
  letter-spacing: 0.1em;
  color: #76675D;
  text-transform: uppercase;
}
.rm-win-pill {
  font-size: 11px;
  font-weight: 700;
  padding: 4px 10px;
  border-radius: 999px;
  background: #F3E8DC;
  color: #876039;
}
.rm-win-body {
  padding: 22px;
  background: #FFFFFF;
}

/* Filter Pills */
.rm-filter-btn {
  padding: 5px 12px;
  border-radius: 999px;
  border: 1px solid rgba(135, 96, 57, 0.2);
  background: #FFFFFF;
  color: #6E6157;
  font-size: 11.5px;
  font-weight: 700;
  cursor: pointer;
  transition: all 0.2s ease;
}
.rm-filter-btn.active {
  background: #876039;
  border-color: #876039;
  color: #FFFFFF;
}

/* KDS Ticket Grid */
.kot-kds-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 16px;
}
.kot-ticket {
  background: #FAF8F5;
  border: 1px solid rgba(135, 96, 57, 0.16);
  border-radius: 16px;
  padding: 16px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.kot-ticket:hover {
  transform: translateY(-3px);
  box-shadow: 0 12px 24px rgba(33, 22, 15, 0.08);
}

/* Editorial Image Cards */
.rm-ind-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 24px;
}
.rm-ind-grid-4 {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 20px;
}
.rm-ind-card {
  background: #FFFFFF;
  border: 1px solid rgba(135, 96, 57, 0.14);
  border-radius: 20px;
  overflow: hidden;
  box-shadow: 0 6px 20px rgba(33, 22, 15, 0.04);
  transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
}
.rm-ind-card:hover {
  transform: translateY(-5px);
  border-color: rgba(135, 96, 57, 0.36);
  box-shadow: 0 18px 38px rgba(135, 96, 57, 0.12);
}
.rm-ind-media {
  height: 170px;
  position: relative;
  overflow: hidden;
}
.rm-ind-media img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
  transition: transform 0.4s ease;
}
.rm-ind-card:hover .rm-ind-media img {
  transform: scale(1.07);
}
.rm-ind-scrim {
  position: absolute;
  inset: 0;
  background: linear-gradient(180deg, rgba(33, 22, 15, 0) 40%, rgba(33, 22, 15, 0.58) 100%);
}
.rm-ind-badge {
  position: absolute;
  top: 12px;
  right: 12px;
  background: rgba(255, 255, 255, 0.92);
  backdrop-filter: blur(8px);
  color: #876039;
  font-family: 'Outfit', sans-serif;
  font-size: 11px;
  font-weight: 700;
  padding: 4px 10px;
  border-radius: 999px;
  letter-spacing: 0.06em;
}
.rm-ind-body {
  padding: 20px;
}
.rm-ind-body h4 {
  font-family: 'Outfit', 'Plus Jakarta Sans', sans-serif;
  font-size: 17.5px;
  font-weight: 700;
  color: #21160F;
  margin: 0 0 6px;
  display: flex;
  align-items: center;
  gap: 8px;
}
.rm-ind-body p {
  font-size: 13.5px;
  line-height: 1.55;
  color: #6E6157;
  margin: 0;
}

/* 12-Step Lifecycle Grid */
.rm-prog-grid-6 {
  display: grid;
  grid-template-columns: repeat(6, 1fr);
  gap: 14px;
}
.rm-prog-card {
  background: #FFFFFF;
  border: 1px solid rgba(135, 96, 57, 0.14);
  border-radius: 16px;
  padding: 18px 12px;
  text-align: center;
  transition: transform 0.25s ease, box-shadow 0.25s ease;
  box-shadow: 0 4px 14px rgba(33, 22, 15, 0.03);
}
.rm-prog-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 12px 28px rgba(135, 96, 57, 0.10);
}
.rm-prog-card.active {
  background: linear-gradient(135deg, #876039 0%, #6f4e2d 100%);
  border-color: #876039;
  box-shadow: 0 10px 24px rgba(135, 96, 57, 0.28);
}
.rm-prog-num {
  width: 32px;
  height: 32px;
  border-radius: 50%;
  margin: 0 auto 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-family: 'Outfit', sans-serif;
  font-size: 12px;
  font-weight: 700;
  background: #F6EFE7;
  color: #876039;
  border: 1.5px solid #876039;
}
.rm-prog-card.active .rm-prog-num {
  background: #FFFFFF;
  color: #876039;
  border-color: #FFFFFF;
}
.rm-prog-card h5 {
  font-family: 'Outfit', 'Plus Jakarta Sans', sans-serif;
  font-size: 13.5px;
  font-weight: 700;
  color: #21160F;
  margin: 0;
}
.rm-prog-card.active h5 {
  color: #FFFFFF;
}

/* 7-Step Ecosystem Flow */
.rm-eco-grid {
  display: grid;
  grid-template-columns: repeat(7, 1fr);
  gap: 14px;
  margin-bottom: 40px;
}
.rm-eco-step {
  background: #FFFFFF;
  border: 1px solid rgba(135, 96, 57, 0.14);
  border-radius: 18px;
  padding: 16px 10px 18px;
  text-align: center;
  transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
  box-shadow: 0 4px 14px rgba(33, 22, 15, 0.03);
}
.rm-eco-step:hover {
  transform: translateY(-4px);
  border-color: rgba(135, 96, 57, 0.4);
  box-shadow: 0 12px 28px rgba(135, 96, 57, 0.10);
}
.rm-eco-step.active {
  background: linear-gradient(180deg, #FFFDF9 0%, #F7EFE5 100%);
  border: 1.5px solid #876039;
  box-shadow: 0 12px 28px rgba(135, 96, 57, 0.14);
}
.rm-eco-num {
  display: inline-block;
  font-size: 10px;
  font-weight: 800;
  color: #876039;
  background: #F6EFE7;
  padding: 2px 8px;
  border-radius: 999px;
  margin-bottom: 10px;
}
.rm-eco-step.active .rm-eco-num {
  background: #876039;
  color: #FFFFFF;
}
.rm-eco-img {
  width: 64px;
  height: 64px;
  object-fit: contain;
  margin: 0 auto 10px;
  display: block;
}
.rm-eco-title {
  font-family: 'Outfit', 'Plus Jakarta Sans', sans-serif;
  font-size: 12px;
  font-weight: 700;
  color: #21160F;
  letter-spacing: 0.02em;
}

/* Peak Kitchen Editorial Banner */
.kot-peak-banner {
  position: relative;
  border-radius: 24px;
  overflow: hidden;
  padding: 44px 32px;
  box-shadow: var(--shadow-lg);
}
.kot-peak-banner > img {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  z-index: 0;
}
.kot-peak-scrim {
  position: absolute;
  inset: 0;
  background: linear-gradient(135deg, rgba(33, 22, 15, 0.90) 0%, rgba(111, 78, 45, 0.84) 100%);
  z-index: 1;
}
.kot-peak-content {
  position: relative;
  z-index: 2;
}
.kot-peak-stat {
  background: rgba(255, 255, 255, 0.11);
  backdrop-filter: blur(12px);
  border: 1px solid rgba(255, 255, 255, 0.18);
  border-radius: 18px;
  padding: 24px 18px;
  text-align: center;
}

/* Editorial Photo Strip */
.kot-photo-strip {
  position: relative;
  border-radius: 18px;
  overflow: hidden;
  height: 152px;
  margin-top: 22px;
  border: 1px solid rgba(135, 96, 57, 0.16);
  box-shadow: var(--shadow-sm);
}
.kot-photo-strip img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}
.kot-photo-strip-scrim {
  position: absolute;
  inset: 0;
  background: linear-gradient(90deg, rgba(33, 22, 15, 0.76) 0%, rgba(33, 22, 15, 0.25) 60%, rgba(33, 22, 15, 0.1) 100%);
}
.kot-photo-strip-caption {
  position: absolute;
  left: 18px;
  bottom: 14px;
  right: 18px;
  color: #FFFFFF;
}

/* Responsive adjustments */
@media (max-width: 1100px) {
  .rm-val-grid, .rm-ind-grid-4, .kot-kds-grid { grid-template-columns: repeat(2, 1fr); }
  .rm-prog-grid-6 { grid-template-columns: repeat(3, 1fr); }
  .rm-eco-grid { grid-template-columns: repeat(4, 1fr); }
  .rm-ind-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 900px) {
  .rm-hero-grid, .rm-split { grid-template-columns: 1fr; gap: 32px; }
}
@media (max-width: 768px) {
  .bc { padding: 14px 0 14px; }
  .w { padding: 0 16px; }
  .kot-peak-banner { padding: 32px 20px; }
}
@media (max-width: 600px) {
  .rm-val-grid, .rm-ind-grid, .rm-ind-grid-4, .kot-kds-grid { grid-template-columns: 1fr; }
  .rm-prog-grid-6, .rm-eco-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 480px) {
  .btn { width: 100%; }
}
</style>

<!-- ================= BREADCRUMB ================= -->
<div class="bc">
  <div class="w">
    <a href="{{ route('home') }}">Home</a>
    <span>/</span>
    <a href="{{ route('features') }}">Features</a>
    <span>/</span>
    <span>KOT Management</span>
  </div>
</div>

<!-- ================= HERO SECTION ================= -->
<section style="background: linear-gradient(180deg, var(--bg2) 0%, #ffffff 100%);">
  <div class="w">
    <div class="rm-hero-grid">
      <!-- Hero Left Copy -->
      <div class="r in">
        <div class="eb">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M6 13.87A4 4 0 017.41 6a5.11 5.11 0 019.18 0A4 4 0 0118 13.87V21H6v-7.13z"/></svg>
          KOT MANAGEMENT (KITCHEN ORDER TICKETS)
        </div>
        <h1>From Order to Kitchen.<br><span class="sf">Without the Confusion.</span></h1>
        <p style="margin: 20px 0 32px; font-size: 18px; max-width: 530px;">
          Send clear kitchen order information from the restaurant floor to the right preparation workflow, so your kitchen team knows what to prepare and where every order belongs.
        </p>
        <div style="display: flex; gap: 14px; flex-wrap: wrap;">
          <a href="{{ route('restaurant_signup') }}" class="btn p">Get Started →</a>
          <a href="{{ route('contact.us') }}" class="btn o">Book a Demo</a>
        </div>
        <div style="margin-top: 28px; font-size: 14px; color: var(--mute); font-weight: 600; display: flex; align-items: center; gap: 16px; flex-wrap: wrap;">
          <span>✓ Instant Digital KOTs</span>
          <span>✓ Multi-Station Routing</span>
          <span>✓ Live Prep Timers</span>
        </div>
      </div>

      <!-- Hero Visual: Editorial Kitchen Pass Photo + Floating KOT Card -->
      <div class="r in" style="transition-delay: 0.15s; position: relative; display: flex; justify-content: center;">
        <div style="position: relative; width: 100%; max-width: 610px; border-radius: 26px; overflow: hidden; box-shadow: 0 28px 64px rgba(33, 22, 15, 0.16), 0 6px 20px rgba(135, 96, 57, 0.10); border: 1px solid rgba(135, 96, 57, 0.16);">
          <img
            src="{{ asset('assets/images/kot-management-hero.jpg') }}"
            alt="Head chef reviewing live Kitchen Order Tickets on Geni Menu KDS at the kitchen pass"
            style="width: 100%; height: auto; display: block; object-fit: cover;"
            loading="eager"
          />
          <div style="position: absolute; inset: 0; background: linear-gradient(180deg, rgba(33,22,15,0.08) 0%, rgba(33,22,15,0) 45%, rgba(33,22,15,0.48) 100%); pointer-events: none;"></div>

          <!-- Top-Left Live Status Pill -->
          <div style="position: absolute; top: 18px; left: 18px; display: inline-flex; align-items: center; gap: 8px; padding: 8px 14px; border-radius: 999px; background: rgba(255, 255, 255, 0.94); backdrop-filter: blur(10px); box-shadow: 0 8px 20px rgba(0,0,0,0.14); font-size: 12px; font-weight: 700; color: #21160F;">
            <span style="width: 8px; height: 8px; border-radius: 50%; background: #16A34A; box-shadow: 0 0 0 3px rgba(22,163,74,0.22);"></span>
            Main Pass • 08 Active • 02 New • 04 Cooking • 02 Ready
          </div>

          <!-- Floating KOT Ticket Card -->
          <div style="position: absolute; bottom: 18px; left: 18px; right: 18px; background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(12px); border: 1px solid rgba(135, 96, 57, 0.25); border-radius: 16px; padding: 12px 16px; box-shadow: 0 12px 28px rgba(0,0,0,0.18); display: flex; justify-content: space-between; align-items: center; gap: 12px; flex-wrap: wrap;">
            <div style="display: flex; align-items: center; gap: 12px;">
              <div style="width: 38px; height: 38px; border-radius: 11px; background: #F6EFE7; color: #876039; display: flex; align-items: center; justify-content: center; flex-shrink: 0; font-family: 'Outfit', sans-serif; font-weight: 700; font-size: 11.5px;">
                #1048
              </div>
              <div>
                <div style="font-size: 10px; font-weight: 700; color: #876039; letter-spacing: 0.06em;">NEW KOT • TABLE T08 • DINE-IN</div>
                <div style="font-weight: 700; font-size: 13.5px; color: #21160F;">Chicken Biryani ×2, Paneer Tikka ×1</div>
                <div style="font-size: 11.5px; color: #92400E; font-weight: 600;">Note: "Less spicy, Extra Raita"</div>
              </div>
            </div>
            <span style="background: #876039; color: #fff; padding: 7px 14px; border-radius: 9px; font-weight: 700; font-size: 12px;">Start Prep →</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= VALUE STRIP ================= -->
<section style="padding: 46px 0; background: var(--bg2); border-top: 1px solid var(--line); border-bottom: 1px solid var(--line);">
  <div class="w">
    <div class="rm-val-grid r in">
      <div class="rm-val-card">
        <div class="rm-val-top">
          <div class="rm-val-ic">
            <svg viewBox="0 0 24 24"><path d="M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1Z"/><path d="M16 8h-6"/><path d="M16 12h-6"/></svg>
          </div>
          <span class="rm-val-num">01</span>
        </div>
        <h4>Clear Kitchen Tickets</h4>
        <p>Give kitchen staff clear item, portion and modifier instructions.</p>
      </div>

      <div class="rm-val-card">
        <div class="rm-val-top">
          <div class="rm-val-ic">
            <svg viewBox="0 0 24 24"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
          </div>
          <span class="rm-val-num">02</span>
        </div>
        <h4>Better Order Visibility</h4>
        <p>Know what is waiting, currently preparing and ready at the pass.</p>
      </div>

      <div class="rm-val-card">
        <div class="rm-val-top">
          <div class="rm-val-ic">
            <svg viewBox="0 0 24 24"><path d="M6 13.87A4 4 0 0 1 7.41 6a5.11 5.11 0 0 1 1.05-1.54 5 5 0 0 1 7.08 0A5.11 5.11 0 0 1 16.59 6 4 4 0 0 1 18 13.87V21H6Z"/><line x1="6" x2="18" y1="17" y2="17"/></svg>
          </div>
          <span class="rm-val-num">03</span>
        </div>
        <h4>Organized Kitchen Flow</h4>
        <p>Keep kitchen preparation work clear and visible during dinner rush.</p>
      </div>

      <div class="rm-val-card">
        <div class="rm-val-top">
          <div class="rm-val-ic">
            <svg viewBox="0 0 24 24"><path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"/><path d="M21 3v5h-5"/><path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"/><path d="M8 16H3v5"/></svg>
          </div>
          <span class="rm-val-num">04</span>
        </div>
        <h4>Connected Operations</h4>
        <p>Connect KOT tickets with dining tables, waiters, POS and billing.</p>
      </div>
    </div>
  </div>
</section>

<!-- ================= LIVE INTERACTIVE KDS CONSOLE ================= -->
<section>
  <div class="w">
    <div class="hd r">
      <div class="eb">LIVE KITCHEN DISPLAY (KDS)</div>
      <h2>Every Ticket at the Pass, <span class="sf">Tracked Live.</span></h2>
      <p>Filter kitchen tickets by status so line cooks and expediters always know what to fire next.</p>
    </div>

    <div class="rm-win r">
      <div class="rm-win-bar">
        <div class="rm-win-dots"><i></i><i></i><i></i></div>
        <div class="rm-win-ttl">MAIN KITCHEN PASS — CHEF: SURESH KUMAR</div>
        <div style="display: flex; gap: 6px; flex-wrap: wrap;">
          <button type="button" class="rm-filter-btn active" onclick="filterKotStatus('all', this)">All (4)</button>
          <button type="button" class="rm-filter-btn" onclick="filterKotStatus('new', this)">New</button>
          <button type="button" class="rm-filter-btn" onclick="filterKotStatus('preparing', this)">Preparing</button>
          <button type="button" class="rm-filter-btn" onclick="filterKotStatus('ready', this)">Ready</button>
        </div>
      </div>

      <div class="rm-win-body">
        <div class="kot-kds-grid" id="kot-kds-board">
          <!-- KOT #1048 -->
          <div class="kot-ticket" data-status="new" style="border-top: 4px solid var(--yellow);">
            <div>
              <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
                <strong style="font-family: 'Outfit', sans-serif; font-size: 15px; color: #21160F;">KOT #1048</strong>
                <span class="badge dinein">Table T08</span>
              </div>
              <div style="font-size: 11px; color: #6E6157; margin-bottom: 12px;">#ORD-2084 · 12:42 PM (4m ago)</div>
              <div style="display: flex; flex-direction: column; gap: 6px; font-size: 13px; margin-bottom: 12px;">
                <div style="display: flex; justify-content: space-between; font-weight: 700;"><span>Chicken Biryani</span><span style="color: #876039;">× 2</span></div>
                <div style="display: flex; justify-content: space-between; font-weight: 700;"><span>Paneer Tikka</span><span style="color: #876039;">× 1</span></div>
                <div style="display: flex; justify-content: space-between; font-weight: 700;"><span>Lime Soda</span><span style="color: #876039;">× 2</span></div>
              </div>
              <div style="background: #FFFBEB; border: 1px solid #FDE68A; border-radius: 8px; padding: 7px 9px; font-size: 11.5px; font-weight: 700; color: #92400E; margin-bottom: 12px;">
                Note: "Less spicy, Extra Raita"
              </div>
            </div>
            <button type="button" class="btn p" style="width: 100%; padding: 8px; font-size: 12px; border-radius: 9px;">Start Preparing →</button>
          </div>

          <!-- KOT #1049 -->
          <div class="kot-ticket" data-status="preparing" style="border-top: 4px solid var(--blue);">
            <div>
              <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
                <strong style="font-family: 'Outfit', sans-serif; font-size: 15px; color: #21160F;">KOT #1049</strong>
                <span class="badge dinein">Table T04</span>
              </div>
              <div style="font-size: 11px; color: #6E6157; margin-bottom: 12px;">#ORD-2086 · 12:46 PM (12m cooking)</div>
              <div style="display: flex; flex-direction: column; gap: 6px; font-size: 13px; margin-bottom: 12px;">
                <div style="display: flex; justify-content: space-between; font-weight: 700;"><span>Margherita Pizza</span><span style="color: #876039;">× 1</span></div>
                <div style="display: flex; justify-content: space-between; font-weight: 700;"><span>Penne Pasta</span><span style="color: #876039;">× 2</span></div>
                <div style="display: flex; justify-content: space-between; font-weight: 700;"><span>Garlic Bread</span><span style="color: #876039;">× 1</span></div>
                <div style="display: flex; justify-content: space-between; font-weight: 700;"><span>Cold Coffee</span><span style="color: #876039;">× 1</span></div>
              </div>
            </div>
            <button type="button" class="btn p" style="width: 100%; padding: 8px; font-size: 12px; border-radius: 9px; background: linear-gradient(135deg, #10B981, #059669); border-color: #059669;">Mark Ready ✓</button>
          </div>

          <!-- KOT #1050 -->
          <div class="kot-ticket" data-status="ready" style="border-top: 4px solid var(--green);">
            <div>
              <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
                <strong style="font-family: 'Outfit', sans-serif; font-size: 15px; color: #21160F;">KOT #1050</strong>
                <span class="badge takeaway">Takeaway</span>
              </div>
              <div style="font-size: 11px; color: #6E6157; margin-bottom: 12px;">#ORD-2089 · 12:49 PM (Ready at Pass)</div>
              <div style="display: flex; flex-direction: column; gap: 6px; font-size: 13px; margin-bottom: 12px;">
                <div style="display: flex; justify-content: space-between; font-weight: 700;"><span>Veg Pulao</span><span style="color: #876039;">× 2</span></div>
                <div style="display: flex; justify-content: space-between; font-weight: 700;"><span>Dal Tadka</span><span style="color: #876039;">× 1</span></div>
                <div style="display: flex; justify-content: space-between; font-weight: 700;"><span>Butter Roti</span><span style="color: #876039;">× 4</span></div>
              </div>
              <div style="background: #ECFDF5; border: 1px solid #A7F3D0; border-radius: 8px; padding: 7px 9px; font-size: 11.5px; font-weight: 700; color: #065F46; margin-bottom: 12px;">
                Status: READY FOR PASS
              </div>
            </div>
            <button type="button" class="btn o" style="width: 100%; padding: 8px; font-size: 12px; border-radius: 9px; color: #065F46; border-color: #10B981;">Dispatched ✓</button>
          </div>

          <!-- KOT #1051 -->
          <div class="kot-ticket" data-status="new" style="border-top: 4px solid var(--yellow);">
            <div>
              <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
                <strong style="font-family: 'Outfit', sans-serif; font-size: 15px; color: #21160F;">KOT #1051</strong>
                <span class="badge delivery">Delivery</span>
              </div>
              <div style="font-size: 11px; color: #6E6157; margin-bottom: 12px;">#ORD-2092 · 12:53 PM (Just arrived)</div>
              <div style="display: flex; flex-direction: column; gap: 6px; font-size: 13px; margin-bottom: 12px;">
                <div style="display: flex; justify-content: space-between; font-weight: 700;"><span>Butter Chicken</span><span style="color: #876039;">× 1</span></div>
                <div style="display: flex; justify-content: space-between; font-weight: 700;"><span>Jeera Rice</span><span style="color: #876039;">× 1</span></div>
              </div>
            </div>
            <button type="button" class="btn p" style="width: 100%; padding: 8px; font-size: 12px; border-radius: 9px;">Start Preparing →</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= OPERATIONAL COMPARISON ================= -->
<style>
  .kot-cmp-wrap {
    position: relative;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 32px;
    align-items: stretch;
  }
  .kot-cmp-center-arrow {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    z-index: 20;
    pointer-events: none;
  }
  .kot-center-arrow-circle {
    width: 44px;
    height: 44px;
    border-radius: 50%;
    background: var(--br, #876039);
    color: #FFFFFF;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 18px rgba(135, 96, 57, 0.4);
    border: 3px solid #FFFFFF;
  }
  .kot-center-arrow-circle svg { width: 20px; height: 20px; }

  .kot-cmp-card {
    border-radius: 24px;
    padding: 26px;
    position: relative;
    display: flex;
    flex-direction: column;
    box-sizing: border-box;
  }
  .kot-cmp-traditional {
    background: #FFFDFC;
    border: 1.5px solid #FECDD3;
    box-shadow: 0 10px 30px rgba(220, 38, 38, 0.04);
  }
  .kot-cmp-digital {
    background: #FFFFFF;
    border: 1.5px solid rgba(135, 96, 57, 0.28);
    box-shadow: 0 14px 40px rgba(135, 96, 57, 0.08);
  }
  .kot-cmp-header {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 22px;
  }
  .kot-badge-icon {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
  }
  .kot-badge-icon svg { width: 18px; height: 18px; }
  .kot-badge-red { background: #FEE2E2; color: #DC2626; }
  .kot-badge-brown { background: #6F4522; color: #FFFFFF; }

  .kot-cmp-title {
    font-family: 'Outfit', 'Plus Jakarta Sans', sans-serif;
    font-size: 19px;
    font-weight: 700;
    margin: 0 0 2px;
    line-height: 1.2;
  }
  .kot-cmp-title.text-red { color: #991B1B; }
  .kot-cmp-title.text-brown { color: #21160F; }
  .kot-cmp-subtitle { font-size: 12.5px; color: #76675D; margin: 0; }

  .kot-split-body {
    display: grid;
    grid-template-columns: 1fr 1.3fr;
    gap: 16px;
    align-items: stretch;
    flex: 1;
  }
  .kot-cmp-digital .kot-split-body {
    grid-template-columns: 1fr 1.05fr;
    gap: 14px;
  }

  .kot-paper-visual {
    background: #F8F4EE;
    border-radius: 16px;
    border: 1px solid #EADBCE;
    padding: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
  }
  .kot-paper-board {
    width: 100%;
    background: #845A3C;
    border-radius: 12px;
    padding: 10px 8px 8px;
    box-shadow: 0 6px 16px rgba(42, 24, 13, 0.2);
  }
  .kot-paper-clip {
    width: 32px;
    height: 8px;
    background: #C4B5A5;
    border-radius: 3px;
    margin: 0 auto 6px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25);
  }
  .kot-paper-sheet {
    background: #FFFDF9;
    border-radius: 6px;
    padding: 10px 8px;
    font-family: 'Plus Jakarta Sans', sans-serif;
    border: 1px solid #EBE1D3;
  }
  .kot-paper-header {
    font-family: 'Outfit', serif;
    font-weight: 600;
    font-size: 10.5px;
    letter-spacing: 1.5px;
    text-align: center;
    color: #2A1C14;
    border-bottom: 1.5px solid #2A1C14;
    padding-bottom: 4px;
    margin-bottom: 7px;
  }
  .kot-paper-slot-title {
    font-size: 7.5px;
    font-weight: 700;
    color: #876039;
    letter-spacing: 0.6px;
    text-transform: uppercase;
    margin: 6px 0 3px;
  }
  .kot-paper-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 7.5px;
    color: #4A3E38;
    padding: 2.5px 0;
    border-bottom: 1px dashed #EDE4D8;
  }
  .kot-paper-row:last-child { border-bottom: none; }
  .kot-paper-row.struck span { text-decoration: line-through; color: #A89A90; }
  .kot-paper-row .err-tag { color: #DC2626; font-weight: 700; }

  .kot-points-list {
    display: flex;
    flex-direction: column;
    gap: 8px;
    justify-content: space-between;
  }
  .kot-point-card {
    background: #FFFFFF;
    border: 1px solid #FEE2E2;
    border-radius: 12px;
    padding: 9px 12px;
    display: flex;
    align-items: center;
    gap: 10px;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
  }
  .kot-point-card:hover {
    transform: translateX(2px);
    box-shadow: 0 4px 12px rgba(220, 38, 38, 0.08);
  }
  .kot-point-ico {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: #FEE2E2;
    color: #DC2626;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
  }
  .kot-point-ico svg { width: 15px; height: 15px; stroke: currentColor; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
  .kot-point-txt { display: flex; flex-direction: column; min-width: 0; }
  .kot-point-txt b { font-size: 13px; font-weight: 700; color: #21160F; line-height: 1.25; }
  .kot-point-txt span { font-size: 11px; color: #76675D; line-height: 1.3; }

  .kot-wf-steps {
    display: flex;
    flex-direction: column;
    justify-content: center;
    gap: 6px;
  }
  .kot-wf-card {
    background: #FFFFFF;
    border: 1px solid rgba(135, 96, 57, 0.2);
    border-radius: 14px;
    padding: 12px 14px;
    display: flex;
    align-items: center;
    gap: 12px;
    box-shadow: 0 2px 8px rgba(135, 96, 57, 0.04);
    transition: transform 0.2s ease, border-color 0.2s ease;
  }
  .kot-wf-card:hover { transform: translateY(-2px); border-color: #876039; }
  .kot-wf-ico {
    width: 38px;
    height: 38px;
    border-radius: 10px;
    background: #FBF6EE;
    color: #876039;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    border: 1px solid rgba(135, 96, 57, 0.18);
  }
  .kot-wf-ico svg { width: 18px; height: 18px; stroke: currentColor; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
  .kot-wf-txt { display: flex; flex-direction: column; min-width: 0; }
  .kot-wf-txt b { font-size: 13px; font-weight: 600; color: #21160F; line-height: 1.25; }
  .kot-wf-txt span { font-size: 11.5px; color: #76675D; line-height: 1.3; }
  .kot-wf-arrow { text-align: center; font-size: 15px; font-weight: 500; color: #876039; line-height: 1; }

  .kot-phone-visual {
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .kot-phone-mockup {
    width: 100%;
    max-width: 224px;
    background: #1C1510;
    border-radius: 28px;
    padding: 7px;
    box-shadow: 0 16px 36px rgba(28, 20, 15, 0.28);
    border: 2px solid #362920;
  }
  .kot-phone-screen {
    background: #FFFFFF;
    border-radius: 22px;
    padding: 10px 9px 12px;
    overflow: hidden;
  }
  .kot-phone-island {
    width: 38px;
    height: 4px;
    background: #1C1510;
    border-radius: 4px;
    margin: 0 auto 6px;
  }
  .kot-phone-header { text-align: center; margin-bottom: 7px; }
  .kot-phone-title { font-family: 'Outfit', sans-serif; font-size: 13.5px; font-weight: 600; color: #21160F; line-height: 1.2; }
  .kot-phone-sub { font-size: 8px; color: #76675D; }
  .kot-phone-tabs {
    display: flex;
    gap: 3.5px;
    margin-bottom: 8px;
    justify-content: center;
  }
  .kot-tab-pill {
    font-size: 7.5px;
    font-weight: 700;
    padding: 2.5px 7px;
    border-radius: 12px;
    background: #FAF7F2;
    color: #6E6157;
    white-space: nowrap;
  }
  .kot-tab-active { background: #875A38; color: #FFFFFF; }
  .kot-live-list {
    display: flex;
    flex-direction: column;
    gap: 6px;
  }
  .kot-live-row {
    padding: 6px 7px;
    background: #FAF8F5;
    border: 1px solid #EFE8DE;
    border-radius: 9px;
    display: flex;
    flex-direction: column;
    gap: 3px;
  }
  .kot-lv-top {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 4px;
  }
  .kot-lv-name { font-size: 9.5px; font-weight: 700; color: #21160F; }
  .kot-lv-badge {
    font-size: 6.5px;
    font-weight: 700;
    padding: 1.5px 5px;
    border-radius: 4px;
  }
  .kot-lv-badge.new { background: #DBEAFE; color: #1D4ED8; }
  .kot-lv-badge.prep { background: #FEF3C7; color: #B45309; }
  .kot-lv-badge.ready { background: #DCFCE7; color: #16A34A; }
  .kot-lv-meta {
    display: flex;
    justify-content: space-between;
    font-size: 7.5px;
    color: #76675D;
  }
  .kot-lv-src { font-weight: 700; color: #876039; }

  .kot-bottom-cta {
    margin-top: 16px;
    display: flex;
    justify-content: center;
  }
  .kot-bottom-cta-badge {
    background: linear-gradient(135deg, #6f4e2d 0%, #876039 100%);
    color: #FFFFFF;
    font-size: 11.5px;
    font-weight: 600;
    padding: 7px 20px;
    border-radius: 99px;
    box-shadow: 0 4px 14px rgba(135, 96, 57, 0.3);
    display: inline-flex;
    align-items: center;
    gap: 6px;
  }
  .kot-bottom-cta-badge svg { width: 14px; height: 14px; stroke: #FFFFFF; fill: none; stroke-width: 2; }

  @media (max-width: 1080px) {
    .kot-cmp-wrap { grid-template-columns: 1fr; gap: 36px; }
    .kot-cmp-center-arrow { display: none; }
  }
  @media (max-width: 640px) {
    .kot-split-body, .kot-cmp-digital .kot-split-body { grid-template-columns: 1fr; gap: 16px; }
    .kot-paper-visual { max-width: 260px; margin: 0 auto; }
  }
</style>

<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd r">
      <div class="eb">OPERATIONAL COMPARISON</div>
      <h2>Your Kitchen Needs More Than <span class="sf">an Order Number.</span></h2>
      <p>Paper slips get soaked in kitchen steam, item notes get misread, and waiters constantly interrupt chefs to check order progress. Compare traditional kitchen communication with Geni Menu KOT.</p>
    </div>

    <div class="kot-cmp-wrap r">
      <div class="kot-cmp-center-arrow">
        <div class="kot-center-arrow-circle">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <line x1="5" y1="12" x2="19" y2="12"></line>
            <polyline points="12 5 19 12 12 19"></polyline>
          </svg>
        </div>
      </div>

      <!-- LEFT CARD: Traditional Kitchen Communication -->
      <div class="kot-cmp-card kot-cmp-traditional">
        <div class="kot-cmp-header">
          <div class="kot-badge-icon kot-badge-red">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
              <line x1="18" y1="6" x2="6" y2="18"></line>
              <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
          </div>
          <div>
            <h3 class="kot-cmp-title text-red">Traditional Kitchen Communication</h3>
            <p class="kot-cmp-subtitle">Paper tickets, steam smudges &amp; verbal clarifications</p>
          </div>
        </div>

        <div class="kot-split-body">
          <div class="kot-paper-visual">
            <div class="kot-paper-board">
              <div class="kot-paper-clip"></div>
              <div class="kot-paper-sheet">
                <div class="kot-paper-header">KOT SLIP</div>
                <div class="kot-paper-slot-title">Pass Ticket #88</div>
                <div class="kot-paper-row"><span>Biryani (Spicy?)</span><span class="err-tag">Smudged</span></div>
                <div class="kot-paper-row struck"><span>No Onion</span><b>Misread</b></div>
                <div class="kot-paper-slot-title">Table Info</div>
                <div class="kot-paper-row"><span>Table ??</span><span class="err-tag">Missing</span></div>
                <div class="kot-paper-row"><span>Priority</span><span class="err-tag">Lost!</span></div>
              </div>
            </div>
          </div>

          <div class="kot-points-list">
            <div class="kot-point-card">
              <div class="kot-point-ico"><svg viewBox="0 0 24 24"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/></svg></div>
              <div class="kot-point-txt"><b>Unclear Paper Handwriting</b><span>Misread notes lead to wrong dish prep</span></div>
            </div>
            <div class="kot-point-card">
              <div class="kot-point-ico"><svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg></div>
              <div class="kot-point-txt"><b>Verbal Kitchen Noise</b><span>Waiters shouting &amp; interrupting chefs</span></div>
            </div>
            <div class="kot-point-card">
              <div class="kot-point-ico"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></div>
              <div class="kot-point-txt"><b>Hard Rush Prioritization</b><span>Tickets pile up without clear order age</span></div>
            </div>
            <div class="kot-point-card">
              <div class="kot-point-ico"><svg viewBox="0 0 24 24"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg></div>
              <div class="kot-point-txt"><b>Zero Status Visibility</b><span>Gap between kitchen pass &amp; dining room</span></div>
            </div>
            <div class="kot-point-card">
              <div class="kot-point-ico"><svg viewBox="0 0 24 24"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"/><path d="M12 9v4"/><path d="M12 17h.01"/></svg></div>
              <div class="kot-point-txt"><b>Steam-Damaged Paper Slips</b><span>Tickets torn or soaked near cooking stations</span></div>
            </div>
          </div>
        </div>
      </div>

      <!-- RIGHT CARD: Geni Menu KOT -->
      <div class="kot-cmp-card kot-cmp-digital">
        <div class="kot-cmp-header">
          <div class="kot-badge-icon kot-badge-brown">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
              <polyline points="20 6 9 17 4 12"></polyline>
            </svg>
          </div>
          <div>
            <h3 class="kot-cmp-title text-brown">Geni Menu KOT</h3>
            <p class="kot-cmp-subtitle">Structured digital kitchen order tickets &amp; 2-way sync</p>
          </div>
        </div>

        <div class="kot-split-body">
          <div class="kot-wf-steps">
            <div class="kot-wf-card">
              <div class="kot-wf-ico"><svg viewBox="0 0 24 24"><path d="M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1Z"/><path d="M16 8h-6"/><path d="M16 12h-6"/></svg></div>
              <div class="kot-wf-txt"><b>Clear Digital Tickets</b><span>Exact quantities, variants &amp; chef notes</span></div>
            </div>
            <div class="kot-wf-arrow">&darr;</div>
            <div class="kot-wf-card">
              <div class="kot-wf-ico"><svg viewBox="0 0 24 24"><path d="M6 13.87A4 4 0 0 1 7.41 6a5.11 5.11 0 0 1 1.05-1.54 5 5 0 0 1 7.08 0A5.11 5.11 0 0 1 16.59 6 4 4 0 0 1 18 13.87V21H6Z"/><line x1="6" x2="18" y1="17" y2="17"/></svg></div>
              <div class="kot-wf-txt"><b>Auto Table &amp; Station Routing</b><span>Dine-in &amp; takeaway tagged automatically</span></div>
            </div>
            <div class="kot-wf-arrow">&darr;</div>
            <div class="kot-wf-card">
              <div class="kot-wf-ico"><svg viewBox="0 0 24 24"><path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"/><path d="M21 3v5h-5"/><path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"/><path d="M8 16H3v5"/></svg></div>
              <div class="kot-wf-txt"><b>Live 2-Way Status Sync</b><span>New &rarr; Preparing &rarr; Ready on POS &amp; waiter</span></div>
            </div>
          </div>

          <div class="kot-phone-visual">
            <div class="kot-phone-mockup">
              <div class="kot-phone-screen">
                <div class="kot-phone-island"></div>
                <div class="kot-phone-header">
                  <div class="kot-phone-title">Kitchen KOT</div>
                  <div class="kot-phone-sub">Station 1 &bull; Hot Kitchen</div>
                </div>
                <div class="kot-phone-tabs">
                  <span class="kot-tab-pill kot-tab-active">All</span>
                  <span class="kot-tab-pill">Prep</span>
                  <span class="kot-tab-pill">Ready</span>
                </div>
                <div class="kot-live-list">
                  <div class="kot-live-row">
                    <div class="kot-lv-top"><span class="kot-lv-name">KOT #3048</span><span class="kot-lv-badge prep">Preparing</span></div>
                    <div class="kot-lv-meta"><span>Butter Chicken x2</span><span class="kot-lv-src">Table 04</span></div>
                  </div>
                  <div class="kot-live-row">
                    <div class="kot-lv-top"><span class="kot-lv-name">KOT #3049</span><span class="kot-lv-badge new">New</span></div>
                    <div class="kot-lv-meta"><span>Paneer Roll (Less Spicy)</span><span class="kot-lv-src">Takeaway</span></div>
                  </div>
                  <div class="kot-live-row">
                    <div class="kot-lv-top"><span class="kot-lv-name">KOT #3047</span><span class="kot-lv-badge ready">Ready</span></div>
                    <div class="kot-lv-meta"><span>Masala Dosa x3</span><span class="kot-lv-src">Table 09</span></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="kot-bottom-cta">
          <div class="kot-bottom-cta-badge">
            <svg viewBox="0 0 24 24"><path d="m12 3-1.9 5.8a2 2 0 0 1-1.3 1.3L3 12l5.8 1.9a2 2 0 0 1 1.3 1.3L12 21l1.9-5.8a2 2 0 0 1 1.3-1.3L21 12l-5.8-1.9a2 2 0 0 1-1.3-1.3L12 3Z"/></svg>
            <span>Zero Misreads, Faster Kitchen Service!</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= AUTOMATIC TICKET GENERATION ================= -->
<section>
  <div class="w">
    <div class="hd r">
      <div class="eb">AUTOMATIC TICKET GENERATION</div>
      <h2>Turn Every Order Into a <span class="sf">Clear Kitchen Ticket.</span></h2>
      <p>The moment an order is confirmed by your server or cashier, Geni Menu converts it into a structured KOT for immediate kitchen preparation.</p>
    </div>

    <div class="rm-split r">
      <div class="rm-win">
        <div class="rm-win-bar">
          <div class="rm-win-dots"><i></i><i></i><i></i></div>
          <div class="rm-win-ttl">1. FRONT OF HOUSE ORDER</div>
          <span class="badge dinein">Dine-in</span>
        </div>
        <div class="rm-win-body">
          <h3 style="font-size: 20px; font-weight: 700; margin-bottom: 14px;">Order #ORD-2084</h3>
          <div style="background: #FAF7F3; border: 1px solid rgba(135,96,57,0.14); border-radius: 12px; padding: 14px; margin-bottom: 14px;">
            <div style="font-size: 13.5px; font-weight: 700; color: #21160F;">Table T08 (3 Guests)</div>
            <div style="font-size: 12px; color: #6E6157;">Server: Ankit K. · Time: 12:42 PM</div>
          </div>
          <div style="display: flex; flex-direction: column; gap: 8px; font-size: 14px; margin-bottom: 14px;">
            <div style="display: flex; justify-content: space-between;"><span>Chicken Biryani</span><strong style="color: #876039;">× 2</strong></div>
            <div style="display: flex; justify-content: space-between;"><span>Paneer Tikka</span><strong style="color: #876039;">× 1</strong></div>
            <div style="display: flex; justify-content: space-between;"><span>Lime Soda</span><strong style="color: #876039;">× 2</strong></div>
          </div>
          <div style="background: #FAF7F3; border: 1px dashed var(--line); border-radius: 10px; padding: 10px 12px; font-size: 12.5px; color: #6E6157;">
            Note: "Less spicy, Extra Raita"
          </div>
        </div>
      </div>

      <div class="rm-win" style="border: 1.5px solid #876039;">
        <div class="rm-win-bar">
          <div class="rm-win-dots"><i></i><i></i><i></i></div>
          <div class="rm-win-ttl">2. GENERATED KOT TICKET</div>
          <span class="badge new">New KOT</span>
        </div>
        <div class="rm-win-body">
          <h3 style="font-size: 20px; font-weight: 700; color: #876039; margin-bottom: 14px;">KOT #1048</h3>
          <div style="background: #F3E8DC; border: 1px solid rgba(135,96,57,0.25); border-radius: 12px; padding: 14px; margin-bottom: 14px;">
            <div style="font-size: 14px; font-weight: 700; color: #21160F;">TABLE T08</div>
            <div style="font-size: 12px; color: #6E6157;">Dispatched to Main Kitchen Pass</div>
          </div>
          <div style="display: flex; flex-direction: column; gap: 10px; font-size: 14px; font-weight: 600; color: #21160F; margin-bottom: 16px;">
            <div style="display: flex; justify-content: space-between; padding-bottom: 6px; border-bottom: 1px solid var(--line);"><span>Chicken Biryani (Dum)</span><strong style="color: #876039;">2 Qty</strong></div>
            <div style="display: flex; justify-content: space-between; padding-bottom: 6px; border-bottom: 1px solid var(--line);"><span>Paneer Tikka (Tandoori)</span><strong style="color: #876039;">1 Qty</strong></div>
            <div style="display: flex; justify-content: space-between;"><span>Fresh Lime Soda</span><strong style="color: #876039;">2 Qty</strong></div>
          </div>
          <div style="background: #FFFBEB; border: 1.5px solid #F59E0B; border-radius: 10px; padding: 10px 12px; font-size: 12.5px; font-weight: 700; color: #92400E;">
            CHEF INSTRUCTION: "Less spicy, Extra Raita"
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= KITCHEN STATION ROUTING (EDITORIAL CARDS) ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd r">
      <div class="eb">KITCHEN STATION ROUTING</div>
      <h2>Keep Different Kitchens and <span class="sf">Stations Organized.</span></h2>
      <p>Route appetizers to the tandoor, main courses to curry stations, drinks to the bar, and desserts to the pastry counter.</p>
    </div>

    <div class="rm-ind-grid-4 r">
      <div class="rm-ind-card">
        <div class="rm-ind-media" style="height: 155px;">
          <img src="https://images.unsplash.com/photo-1556910103-1c02745aae4d?w=600&auto=format&fit=crop&q=80" alt="Main Curry Station" loading="lazy">
          <div class="rm-ind-scrim"></div>
          <span class="rm-ind-badge">01</span>
        </div>
        <div class="rm-ind-body">
          <h4>Main Curry Station</h4>
          <p style="margin-bottom: 12px;">Biryanis, gravies, rice items and main courses.</p>
          <span class="badge new">04 Tickets Pending</span>
        </div>
      </div>

      <div class="rm-ind-card">
        <div class="rm-ind-media" style="height: 155px;">
          <img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?w=600&auto=format&fit=crop&q=80" alt="Tandoor and Grill" loading="lazy">
          <div class="rm-ind-scrim"></div>
          <span class="rm-ind-badge">02</span>
        </div>
        <div class="rm-ind-body">
          <h4>Tandoor / Grill</h4>
          <p style="margin-bottom: 12px;">Kebabs, tikkas, naan breads and appetizers.</p>
          <span class="badge preparing">03 Tickets Cooking</span>
        </div>
      </div>

      <div class="rm-ind-card">
        <div class="rm-ind-media" style="height: 155px;">
          <img src="https://images.unsplash.com/photo-1514933651103-005eec06c04b?w=600&auto=format&fit=crop&q=80" alt="Bar and Beverage" loading="lazy">
          <div class="rm-ind-scrim"></div>
          <span class="rm-ind-badge">03</span>
        </div>
        <div class="rm-ind-body">
          <h4>Bar &amp; Beverage</h4>
          <p style="margin-bottom: 12px;">Cold beverages, mocktails, juices and sodas.</p>
          <span class="badge ready">02 Drinks Ready</span>
        </div>
      </div>

      <div class="rm-ind-card">
        <div class="rm-ind-media" style="height: 155px;">
          <img src="https://images.unsplash.com/photo-1554118811-1e0d58224f24?w=600&auto=format&fit=crop&q=80" alt="Dessert Counter" loading="lazy">
          <div class="rm-ind-scrim"></div>
          <span class="rm-ind-badge">04</span>
        </div>
        <div class="rm-ind-body">
          <h4>Dessert Counter</h4>
          <p style="margin-bottom: 12px;">Sweets, ice creams, cakes and desserts.</p>
          <span class="badge new">01 Ticket Pending</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= ITEM-LEVEL CLARITY & HIGH-VOLUME PREPARATION ================= -->
<section>
  <div class="w">
    <div class="rm-split r" style="margin-bottom: 64px;">
      <div>
        <div class="eb">ITEM-LEVEL KITCHEN NOTES</div>
        <h2>Every Item. <span class="sf">Clearly Listed.</span></h2>
        <p style="margin: 14px 0 22px;">
          Large readable typography, clear item quantities, and prominent custom instructions ensure zero confusion for line cooks.
        </p>

        <ul class="rm-feat-list">
          <li class="rm-feat-row"><span class="rm-check-dot">✓</span> Bold item quantities &amp; portion modifiers</li>
          <li class="rm-feat-row"><span class="rm-check-dot">✓</span> Allergy &amp; spice instructions highlighted in red/amber</li>
          <li class="rm-feat-row"><span class="rm-check-dot">✓</span> One-tap Mark Ready or Reprint KOT from any KDS screen</li>
        </ul>

        <div class="kot-photo-strip">
          <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=800&auto=format&fit=crop&q=80" alt="Chef plating dishes accurately" loading="lazy">
          <div class="kot-photo-strip-scrim"></div>
          <div class="kot-photo-strip-caption">
            <div style="font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; opacity: 0.85;">Zero Kitchen Remakes</div>
            <div style="font-family: 'Outfit', sans-serif; font-size: 16px; font-weight: 700;">Every custom note reaches the exact station clearly</div>
          </div>
        </div>
      </div>

      <!-- Ticket Detail Window -->
      <div class="rm-win">
        <div class="rm-win-bar">
          <div class="rm-win-dots"><i></i><i></i><i></i></div>
          <div class="rm-win-ttl">KOT #1052 — MAIN KITCHEN · TABLE T12</div>
          <span class="badge preparing">Cooking (08 min)</span>
        </div>
        <div class="rm-win-body">
          <div style="display: flex; flex-direction: column; gap: 12px; margin-bottom: 20px;">
            <div style="display: flex; justify-content: space-between; align-items: center; background: #FAF7F3; padding: 12px 14px; border-radius: 12px; border: 1px solid rgba(135,96,57,0.12);">
              <div>
                <strong style="font-size: 15px; color: #21160F;">Chicken Biryani (Large Dum)</strong>
                <div style="font-size: 12px; color: #876039; font-weight: 700;">+ Extra Egg (2)</div>
              </div>
              <span style="font-family: 'Outfit', sans-serif; font-weight: 700; font-size: 20px; color: #876039;">× 2</span>
            </div>

            <div style="display: flex; justify-content: space-between; align-items: center; background: #FAF7F3; padding: 12px 14px; border-radius: 12px; border: 1px solid rgba(135,96,57,0.12);">
              <div>
                <strong style="font-size: 15px; color: #21160F;">Paneer Butter Masala</strong>
                <div style="font-size: 12px; color: #DC2626; font-weight: 700;">Instruction: "No Onion, Less Spicy"</div>
              </div>
              <span style="font-family: 'Outfit', sans-serif; font-weight: 700; font-size: 20px; color: #876039;">× 1</span>
            </div>

            <div style="display: flex; justify-content: space-between; align-items: center; background: #FAF7F3; padding: 12px 14px; border-radius: 12px; border: 1px solid rgba(135,96,57,0.12);">
              <div><strong style="font-size: 15px; color: #21160F;">Butter Garlic Naan</strong></div>
              <span style="font-family: 'Outfit', sans-serif; font-weight: 700; font-size: 20px; color: #876039;">× 4</span>
            </div>
          </div>

          <div style="display: flex; gap: 10px;">
            <button type="button" class="btn p" style="flex: 1; padding: 11px; font-size: 13.5px;">Mark KOT Ready ✓</button>
            <button type="button" class="btn o" style="padding: 11px 18px; font-size: 13.5px;">Reprint KOT</button>
          </div>
        </div>
      </div>
    </div>

    <!-- High-Volume Preparation Banner -->
    <div class="kot-peak-banner r">
      <img src="https://images.unsplash.com/photo-1556910103-1c02745aae4d?w=1200&auto=format&fit=crop&q=80" alt="Busy restaurant kitchen service" loading="lazy">
      <div class="kot-peak-scrim"></div>
      <div class="kot-peak-content">
        <div style="text-align: center; max-width: 640px; margin: 0 auto 32px;">
          <div class="eb" style="background: rgba(255,255,255,0.14); color: #fff; border-color: rgba(255,255,255,0.28);">HIGH VOLUME PREPARATION</div>
          <h2 style="color: #FFFFFF; margin-bottom: 10px;">Stay Organized When the <span class="sf" style="background: linear-gradient(135deg, #fff 0%, #f4efe9 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Kitchen Gets Busy.</span></h2>
          <p style="color: rgba(255,255,255,0.82); font-size: 16px;">Keep chefs focused during peak dinner rushes with live ticket status counters and preparation timers.</p>
        </div>

        <div class="rm-val-grid">
          <div class="kot-peak-stat">
            <span class="badge new" style="margin-bottom: 8px;">NEW KOTs</span>
            <div style="font-family: 'Outfit', sans-serif; font-size: 40px; font-weight: 700; color: #FDE68A;">05</div>
            <div style="font-size: 12.5px; color: rgba(255,255,255,0.78); margin-top: 4px;">Awaiting Chef Acceptance</div>
          </div>
          <div class="kot-peak-stat">
            <span class="badge preparing" style="margin-bottom: 8px;">PREPARING</span>
            <div style="font-family: 'Outfit', sans-serif; font-size: 40px; font-weight: 700; color: #93C5FD;">08</div>
            <div style="font-size: 12.5px; color: rgba(255,255,255,0.78); margin-top: 4px;">Currently Cooking</div>
          </div>
          <div class="kot-peak-stat">
            <span class="badge ready" style="margin-bottom: 8px;">READY AT PASS</span>
            <div style="font-family: 'Outfit', sans-serif; font-size: 40px; font-weight: 700; color: #6EE7B7;">05</div>
            <div style="font-size: 12.5px; color: rgba(255,255,255,0.78); margin-top: 4px;">Awaiting Server Pickup</div>
          </div>
          <div class="kot-peak-stat">
            <span class="badge completed" style="margin-bottom: 8px;">COMPLETED</span>
            <div style="font-family: 'Outfit', sans-serif; font-size: 40px; font-weight: 700; color: #F4D7B5;">173</div>
            <div style="font-size: 12.5px; color: rgba(255,255,255,0.78); margin-top: 4px;">Dispatched Today</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 12-STAGE LIFECYCLE ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd r">
      <div class="eb">12-STAGE RESTAURANT LIFECYCLE</div>
      <h2>From Guest Order to <span class="sf">Kitchen Completion.</span></h2>
      <p>KOT Management sits right at the heart of your restaurant operation, bridging servers with line cooks.</p>
    </div>

    <div class="rm-prog-grid-6 r">
      <div class="rm-prog-card"><div class="rm-prog-num">01</div><h5>Guest Arrives</h5></div>
      <div class="rm-prog-card"><div class="rm-prog-num">02</div><h5>Table Seated</h5></div>
      <div class="rm-prog-card"><div class="rm-prog-num">03</div><h5>Menu Choice</h5></div>
      <div class="rm-prog-card"><div class="rm-prog-num">04</div><h5>Order Placed</h5></div>
      <div class="rm-prog-card active"><div class="rm-prog-num">05</div><h5>KOT Created</h5></div>
      <div class="rm-prog-card active"><div class="rm-prog-num">06</div><h5>Kitchen Receives</h5></div>
      <div class="rm-prog-card"><div class="rm-prog-num">07</div><h5>Food Prepared</h5></div>
      <div class="rm-prog-card"><div class="rm-prog-num">08</div><h5>Order Ready</h5></div>
      <div class="rm-prog-card"><div class="rm-prog-num">09</div><h5>Food Served</h5></div>
      <div class="rm-prog-card"><div class="rm-prog-num">10</div><h5>Bill Generated</h5></div>
      <div class="rm-prog-card"><div class="rm-prog-num">11</div><h5>Payment Settled</h5></div>
      <div class="rm-prog-card active"><div class="rm-prog-num">12</div><h5>Table Reset</h5></div>
    </div>
  </div>
</section>

<!-- ================= KITCHEN ENVIRONMENTS & ECOSYSTEM ================= -->
<section>
  <div class="w">
    <div class="hd r">
      <div class="eb">MULTI-FORMAT FLEXIBILITY</div>
      <h2>Built for Different <span class="sf">Kitchen Environments.</span></h2>
      <p>Whether you manage a multi-station fine dining kitchen, a QSR pass, a pizzeria oven counter, or a cloud kitchen.</p>
    </div>

    <div class="rm-ind-grid r" style="margin-bottom: 72px;">
      <div class="rm-ind-card">
        <div class="rm-ind-media">
          <img src="https://images.unsplash.com/photo-1556910103-1c02745aae4d?w=600&auto=format&fit=crop&q=80" alt="Fine Dining Kitchens" loading="lazy">
          <div class="rm-ind-scrim"></div>
        </div>
        <div class="rm-ind-body">
          <h4><svg class="gm-theme-icon" viewBox="0 0 24 24"><path d="M6 13.87A4 4 0 017.41 6a5.11 5.11 0 019.18 0A4 4 0 0118 13.87V21H6v-7.13z"/></svg> Fine Dining Kitchens</h4>
          <p>Multi-course ticket timing and station routing between tandoor, pantry and main stove.</p>
        </div>
      </div>

      <div class="rm-ind-card">
        <div class="rm-ind-media">
          <img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?w=600&auto=format&fit=crop&q=80" alt="QSR & Fast Food" loading="lazy">
          <div class="rm-ind-scrim"></div>
        </div>
        <div class="rm-ind-body">
          <h4><svg class="gm-theme-icon" viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/></svg> QSR &amp; Fast Food</h4>
          <p>Instant digital ticket displays for high-volume counter preparation.</p>
        </div>
      </div>

      <div class="rm-ind-card">
        <div class="rm-ind-media">
          <img src="https://images.unsplash.com/photo-1526367790999-0150786686a2?w=600&auto=format&fit=crop&q=80" alt="Cloud Kitchens" loading="lazy">
          <div class="rm-ind-scrim"></div>
        </div>
        <div class="rm-ind-body">
          <h4><svg class="gm-theme-icon" viewBox="0 0 24 24"><rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg> Cloud Kitchens</h4>
          <p>Centralized ticket display routing orders from online channels to line cooks.</p>
        </div>
      </div>
    </div>

    <!-- Connected Ecosystem -->
    <div class="hd r">
      <div class="eb">CONNECTED PLATFORM</div>
      <h2>KOT Is the Bridge Between <span class="sf">Orders and the Kitchen.</span></h2>
      <p>KOT Management connects your floor servers, dining tables, kitchen displays, and billing counter.</p>
    </div>

    <div class="rm-eco-grid r">
      <div class="rm-eco-step active">
        <span class="rm-eco-num">01</span>
        <img src="{{ asset('assets/images/workflow/step-3-kitchen.png') }}" alt="KOT Kitchen" class="rm-eco-img">
        <div class="rm-eco-title">KOT KITCHEN</div>
      </div>
      <div class="rm-eco-step">
        <span class="rm-eco-num">02</span>
        <img src="{{ asset('assets/images/workflow/step-2-order.png') }}" alt="Orders" class="rm-eco-img">
        <div class="rm-eco-title">ORDERS</div>
      </div>
      <div class="rm-eco-step">
        <span class="rm-eco-num">03</span>
        <img src="{{ asset('assets/images/workflow/step-1-menu.png') }}" alt="Menu" class="rm-eco-img">
        <div class="rm-eco-title">MENU</div>
      </div>
      <div class="rm-eco-step">
        <span class="rm-eco-num">04</span>
        <img src="{{ asset('assets/images/workflow/step-4-table.png') }}" alt="Tables" class="rm-eco-img">
        <div class="rm-eco-title">TABLES</div>
      </div>
      <div class="rm-eco-step">
        <span class="rm-eco-num">05</span>
        <img src="{{ asset('assets/images/workflow/step-5-billing.png') }}" alt="POS" class="rm-eco-img">
        <div class="rm-eco-title">POS</div>
      </div>
      <div class="rm-eco-step">
        <span class="rm-eco-num">06</span>
        <img src="{{ asset('assets/images/workflow/step-6-payment.png') }}" alt="Payments" class="rm-eco-img">
        <div class="rm-eco-title">PAYMENTS</div>
      </div>
      <div class="rm-eco-step">
        <span class="rm-eco-num">07</span>
        <img src="{{ asset('assets/images/workflow/step-7-reports.png') }}" alt="Reports" class="rm-eco-img">
        <div class="rm-eco-title">REPORTS</div>
      </div>
    </div>

    <div class="rm-val-grid r">
      <div class="rm-val-card">
        <h4 style="color: #876039;">Order Management</h4>
        <p>Confirmed floor orders trigger immediate KOT tickets.</p>
      </div>
      <div class="rm-val-card">
        <h4 style="color: #876039;">Table Management</h4>
        <p>Tickets show table number &amp; floor zone for server delivery.</p>
      </div>
      <div class="rm-val-card">
        <h4 style="color: #876039;">POS Management</h4>
        <p>Kitchen-prepared items sync directly to guest bill tabs.</p>
      </div>
      <div class="rm-val-card">
        <h4 style="color: #876039;">Reports &amp; Analytics</h4>
        <p>Track average dish preparation times &amp; peak kitchen throughput.</p>
      </div>
    </div>
  </div>
</section>

<!-- ================= FAQ ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd r">
      <h2>Frequently Asked <span class="sf">Questions.</span></h2>
      <p>Everything you need to know about Geni Menu KOT Management.</p>
    </div>

    <div class="faq-list r">
      <div class="faq-item open">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>1. What is KOT Management in Geni Menu?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          KOT (Kitchen Order Ticket) Management in Geni Menu connects restaurant orders to your kitchen staff, generating digital ticket displays or printed slips that show items, quantities, table numbers, and cooking instructions.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>2. How does an order become a KOT?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          The moment a server takes a table order or a cashier places a counter order, Geni Menu automatically creates a KOT ticket and routes it to the kitchen display or printer.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>3. Can KOTs display table numbers and special instructions?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Every KOT clearly displays the table number (or takeaway order type), item quantities, portion variations, and custom chef instructions (e.g. "Less spicy", "No onion").
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>4. Can kitchen staff update KOT status from digital screens?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Line cooks and head chefs can tap to update status from New → Preparing → Ready, updating waiters instantly.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>5. Can KOTs be routed to multiple kitchen stations?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. You can route specific menu items to separate kitchen stations such as Main Curry, Tandoor, Beverage Bar, or Dessert Counter.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>6. Is KOT Management suitable for small restaurants and cafés?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Whether you operate a single-counter café or a multi-station fine dining establishment, KOT Management streamlines your kitchen communication.
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= FINAL CTA ================= -->
<section style="background: linear-gradient(135deg, #876039 0%, #6f4e2d 100%); color: #fff; text-align: center;">
  <div class="w r">
    <div class="eb" style="background: rgba(255,255,255,0.15); color: #fff; border-color: rgba(255,255,255,0.3);">
      TRANSFORM YOUR KITCHEN PASS
    </div>
    <h2 style="color: #fff; font-size: clamp(34px, 5vw, 54px);">
      Bring Every Order Into a<br>
      <span class="sf" style="background: linear-gradient(135deg, #fff 0%, #f4efe9 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Clear Kitchen Workflow.</span>
    </h2>
    <p style="color: #f4efe9; max-width: 620px; margin: 20px auto 36px; font-size: 18px;">
      Give your kitchen team the visibility they need to move orders from ticket to preparation to ready with Geni Menu.
    </p>

    <div style="display: flex; gap: 16px; justify-content: center; flex-wrap: wrap;">
      <a href="{{ route('restaurant_signup') }}" class="btn" style="background: #fff; color: var(--br); border-color: #fff; font-size: 16px; padding: 16px 36px; box-shadow: 0 8px 24px rgba(0,0,0,0.2);">Get Started →</a>
      <a href="{{ route('contact.us') }}" class="btn" style="background: transparent; color: #fff; border-color: rgba(255,255,255,0.5); font-size: 16px; padding: 16px 36px;">Book a Demo</a>
    </div>

    <div style="margin-top: 36px; font-size: 14px; color: #e5d8c8; font-weight: 600;">
      Built for fine dining kitchens, QSRs, cafés, hotels and cloud kitchens.
    </div>
  </div>
</section>

<script>
// Interactive KDS Ticket Filter
function filterKotStatus(status, btn) {
  document.querySelectorAll('.rm-filter-btn').forEach(b => b.classList.remove('active'));
  if (btn) btn.classList.add('active');
  document.querySelectorAll('#kot-kds-board .kot-ticket').forEach(ticket => {
    const tStatus = ticket.getAttribute('data-status');
    if (status === 'all' || tStatus === status) {
      ticket.style.display = '';
    } else {
      ticket.style.display = 'none';
    }
  });
}

// FAQ Accordion Toggle
function toggleFaq(el) {
  const parent = el.parentElement;
  parent.classList.toggle('open');
}

// Scroll Reveal
document.addEventListener('DOMContentLoaded', () => {
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('in');
      }
    });
  }, { threshold: 0.1 });

  document.querySelectorAll('.r').forEach(el => observer.observe(el));
});
</script>

@endsection
