@php
    $meta = [
        'title' => 'POS Management — Fast Restaurant Billing & Payments | Geni Menu',
        'description' => 'Manage orders, bills, payments and restaurant transactions from one connected POS built around the way your team actually works with Geni Menu.',
        'keywords' => 'restaurant POS system, restaurant billing software, GST invoicing POS, split payment POS, dine-in takeaway POS, Geni Menu, WeGeni'
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
.badge.paid { background: #D1FAE5; color: #065F46; }
.badge.pending { background: #FEF3C7; color: #92400E; }
.badge.partial { background: #DBEAFE; color: #1E40AF; }
.badge.failed { background: #FEE2E2; color: #991B1B; }
.badge.dinein { background: #F3E8FF; color: #6B21A8; }
.badge.takeaway { background: #FFEDD5; color: #C2410C; }

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
  gap: 48px;
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
  padding: 24px;
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

/* POS Workspace Layout */
.pos-workspace-grid {
  display: grid;
  grid-template-columns: 1fr 360px;
}
.pos-items-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 14px;
}
.pos-item-tile {
  border: 1px solid rgba(135, 96, 57, 0.16);
  border-radius: 14px;
  padding: 14px;
  background: #FFFFFF;
  transition: transform 0.2s ease, border-color 0.2s ease;
}
.pos-item-tile.selected {
  border: 1.5px solid #876039;
  background: #FAF6F0;
}
.pos-item-tile:hover {
  transform: translateY(-2px);
  border-color: #876039;
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
  height: 175px;
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
  font-size: 18px;
  font-weight: 700;
  color: #21160F;
  margin: 0 0 6px;
  display: flex;
  align-items: center;
  gap: 8px;
}
.rm-ind-body p {
  font-size: 14px;
  line-height: 1.55;
  color: #6E6157;
  margin: 0;
}

/* Status Progression Steps (10-Step Grid) */
.rm-prog-grid-5 {
  display: grid;
  grid-template-columns: repeat(5, 1fr);
  gap: 14px;
}
.rm-prog-card {
  background: #FFFFFF;
  border: 1px solid rgba(135, 96, 57, 0.14);
  border-radius: 16px;
  padding: 18px 14px;
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
  width: 34px;
  height: 34px;
  border-radius: 50%;
  margin: 0 auto 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-family: 'Outfit', sans-serif;
  font-size: 13px;
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
  font-size: 14px;
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

/* Editorial Photo Strip */
.pos-photo-strip {
  position: relative;
  border-radius: 18px;
  overflow: hidden;
  height: 156px;
  margin-top: 22px;
  border: 1px solid rgba(135, 96, 57, 0.16);
  box-shadow: var(--shadow-sm);
}
.pos-photo-strip img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}
.pos-photo-strip-scrim {
  position: absolute;
  inset: 0;
  background: linear-gradient(90deg, rgba(33, 22, 15, 0.76) 0%, rgba(33, 22, 15, 0.28) 65%, rgba(33, 22, 15, 0.12) 100%);
}
.pos-photo-strip-caption {
  position: absolute;
  left: 18px;
  bottom: 14px;
  right: 18px;
  color: #FFFFFF;
}

/* Peak Hour Editorial Banner */
.pos-peak-banner {
  position: relative;
  border-radius: 24px;
  overflow: hidden;
  padding: 40px 30px;
  box-shadow: var(--shadow-lg);
}
.pos-peak-banner > img {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  z-index: 0;
}
.pos-peak-scrim {
  position: absolute;
  inset: 0;
  background: linear-gradient(135deg, rgba(33, 22, 15, 0.90) 0%, rgba(111, 78, 45, 0.84) 100%);
  z-index: 1;
}
.pos-peak-content {
  position: relative;
  z-index: 2;
}
.pos-peak-stat {
  background: rgba(255, 255, 255, 0.11);
  backdrop-filter: blur(12px);
  border: 1px solid rgba(255, 255, 255, 0.18);
  border-radius: 16px;
  padding: 20px;
  text-align: center;
}
.pos-stream-card {
  background: rgba(255, 255, 255, 0.96);
  border-radius: 16px;
  padding: 18px;
  border: 1px solid rgba(135, 96, 57, 0.18);
}

/* Responsive adjustments */
@media (max-width: 1100px) {
  .rm-val-grid, .rm-ind-grid-4 { grid-template-columns: repeat(2, 1fr); }
  .rm-prog-grid-5 { grid-template-columns: repeat(3, 1fr); }
  .rm-eco-grid { grid-template-columns: repeat(4, 1fr); }
  .rm-ind-grid { grid-template-columns: repeat(2, 1fr); }
  .pos-workspace-grid { grid-template-columns: 1fr; }
}
@media (max-width: 900px) {
  .rm-hero-grid, .rm-split { grid-template-columns: 1fr; gap: 32px; }
  .pos-items-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 768px) {
  .bc { padding: 14px 0 14px; }
  .w { padding: 0 16px; }
  .pos-peak-banner { padding: 28px 18px; }
}
@media (max-width: 600px) {
  .rm-val-grid, .rm-ind-grid, .rm-ind-grid-4, .pos-items-grid { grid-template-columns: 1fr; }
  .rm-prog-grid-5, .rm-eco-grid { grid-template-columns: repeat(2, 1fr); }
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
    <span>POS Management</span>
  </div>
</div>

<!-- ================= HERO SECTION ================= -->
<section style="background: linear-gradient(180deg, var(--bg2) 0%, #ffffff 100%);">
  <div class="w">
    <div class="rm-hero-grid">
      <!-- Hero Left Copy -->
      <div class="r in">
        <div class="eb">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="M6 8h12M6 12h8M6 16h4"/></svg>
          POS MANAGEMENT
        </div>
        <h1>Faster Billing.<br><span class="sf">Smoother Restaurant Operations.</span></h1>
        <p style="margin: 20px 0 32px; font-size: 18px; max-width: 530px;">
          Manage orders, bills, payments and restaurant transactions from one connected POS built around the way your team actually works.
        </p>
        <div style="display: flex; gap: 14px; flex-wrap: wrap;">
          <a href="{{ route('restaurant_signup') }}" class="btn p">Get Started →</a>
          <a href="{{ route('contact.us') }}" class="btn o">Book a Demo</a>
        </div>
        <div style="margin-top: 28px; font-size: 14px; color: var(--mute); font-weight: 600; display: flex; align-items: center; gap: 16px; flex-wrap: wrap;">
          <span>✓ 3-Click Checkout</span>
          <span>✓ Cash, Card &amp; UPI QR</span>
          <span>✓ Instant GST Invoicing</span>
        </div>
      </div>

      <!-- Hero Visual: Editorial Hospitality Counter Photo + Live POS Card -->
      <div class="r in" style="transition-delay: 0.15s; position: relative; display: flex; justify-content: center;">
        <div style="position: relative; width: 100%; max-width: 610px; border-radius: 26px; overflow: hidden; box-shadow: 0 28px 64px rgba(33, 22, 15, 0.16), 0 6px 20px rgba(135, 96, 57, 0.10); border: 1px solid rgba(135, 96, 57, 0.16);">
          <img
            src="{{ asset('assets/images/pos-management-hero.jpg') }}"
            alt="Restaurant cashier operating modern Geni Menu POS billing terminal"
            style="width: 100%; height: auto; display: block; object-fit: cover;"
            loading="eager"
          />
          <div style="position: absolute; inset: 0; background: linear-gradient(180deg, rgba(33,22,15,0.08) 0%, rgba(33,22,15,0) 45%, rgba(33,22,15,0.48) 100%); pointer-events: none;"></div>

          <!-- Top-Left Live Status Pill -->
          <div style="position: absolute; top: 18px; left: 18px; display: inline-flex; align-items: center; gap: 8px; padding: 8px 14px; border-radius: 999px; background: rgba(255, 255, 255, 0.94); backdrop-filter: blur(10px); box-shadow: 0 8px 20px rgba(0,0,0,0.14); font-size: 12px; font-weight: 700; color: #21160F;">
            <span style="width: 8px; height: 8px; border-radius: 50%; background: #16A34A; box-shadow: 0 0 0 3px rgba(22,163,74,0.22);"></span>
            Terminal #01 • Live • ₹48,620 Today
          </div>

          <!-- Floating POS Order Card -->
          <div style="position: absolute; bottom: 18px; left: 18px; right: 18px; background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(12px); border: 1px solid rgba(135, 96, 57, 0.25); border-radius: 16px; padding: 12px 16px; box-shadow: 0 12px 28px rgba(0,0,0,0.18); display: flex; justify-content: space-between; align-items: center; gap: 12px; flex-wrap: wrap;">
            <div style="display: flex; align-items: center; gap: 12px;">
              <div style="width: 38px; height: 38px; border-radius: 11px; background: #F6EFE7; color: #876039; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                <svg class="gm-theme-icon" viewBox="0 0 24 24"><rect x="2" y="5" width="20" height="14" rx="2"/><line x1="2" y1="10" x2="22" y2="10"/></svg>
              </div>
              <div>
                <div style="font-size: 10px; font-weight: 700; color: #876039; letter-spacing: 0.06em;">ORDER #POS-4092 • TABLE T08</div>
                <div style="font-weight: 700; font-size: 13.5px; color: #21160F;">Total Due: ₹1,050 (incl. 5% GST)</div>
                <div style="font-size: 11.5px; color: #6E6157;">5 Items • 3 Guests • Ready for Checkout</div>
              </div>
            </div>
            <span style="background: #876039; color: #fff; padding: 7px 14px; border-radius: 9px; font-weight: 700; font-size: 12px;">Pay Now →</span>
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
            <svg viewBox="0 0 24 24"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
          </div>
          <span class="rm-val-num">01</span>
        </div>
        <h4>Faster Billing</h4>
        <p>Create and process restaurant bills with a focused POS workflow.</p>
      </div>

      <div class="rm-val-card">
        <div class="rm-val-top">
          <div class="rm-val-ic">
            <svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M9 9h6M9 13h6M9 17h4"/></svg>
          </div>
          <span class="rm-val-num">02</span>
        </div>
        <h4>One Order View</h4>
        <p>Keep selected items, quantities and totals visible in one place.</p>
      </div>

      <div class="rm-val-card">
        <div class="rm-val-top">
          <div class="rm-val-ic">
            <svg viewBox="0 0 24 24"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"/><path d="M3 6h18"/></svg>
          </div>
          <span class="rm-val-num">03</span>
        </div>
        <h4>Multiple Order Types</h4>
        <p>Support dine-in, takeaway and delivery workflows seamlessly.</p>
      </div>

      <div class="rm-val-card">
        <div class="rm-val-top">
          <div class="rm-val-ic">
            <svg viewBox="0 0 24 24"><rect x="2" y="5" width="20" height="14" rx="2"/><line x1="2" y1="10" x2="22" y2="10"/></svg>
          </div>
          <span class="rm-val-num">04</span>
        </div>
        <h4>Connected Payments</h4>
        <p>Connect billing with payment processing and transaction records.</p>
      </div>
    </div>
  </div>
</section>

<!-- ================= PROBLEM VS SOLUTION SECTION ================= -->
<style>
  .pos-cmp-wrap {
    position: relative;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 32px;
    align-items: stretch;
  }
  .pos-cmp-center-arrow {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    z-index: 20;
    pointer-events: none;
  }
  .pos-center-arrow-circle {
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
  .pos-center-arrow-circle svg { width: 20px; height: 20px; }

  .pos-cmp-card {
    border-radius: 24px;
    padding: 26px;
    position: relative;
    display: flex;
    flex-direction: column;
    box-sizing: border-box;
  }
  .pos-cmp-traditional {
    background: #FFFDFC;
    border: 1.5px solid #FECDD3;
    box-shadow: 0 10px 30px rgba(220, 38, 38, 0.04);
  }
  .pos-cmp-digital {
    background: #FFFFFF;
    border: 1.5px solid rgba(135, 96, 57, 0.28);
    box-shadow: 0 14px 40px rgba(135, 96, 57, 0.08);
  }
  .pos-cmp-header {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 22px;
  }
  .pos-badge-icon {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
  }
  .pos-badge-icon svg { width: 18px; height: 18px; }
  .pos-badge-red { background: #FEE2E2; color: #DC2626; }
  .pos-badge-brown { background: #6F4522; color: #FFFFFF; }

  .pos-cmp-title {
    font-family: 'Outfit', 'Plus Jakarta Sans', sans-serif;
    font-size: 19px;
    font-weight: 700;
    margin: 0 0 2px;
    line-height: 1.2;
  }
  .pos-cmp-title.text-red { color: #991B1B; }
  .pos-cmp-title.text-brown { color: #21160F; }
  .pos-cmp-subtitle { font-size: 12.5px; color: #76675D; margin: 0; }

  .pos-split-body {
    display: grid;
    grid-template-columns: 1fr 1.3fr;
    gap: 16px;
    align-items: stretch;
    flex: 1;
  }
  .pos-cmp-digital .pos-split-body {
    grid-template-columns: 1fr 1.05fr;
    gap: 14px;
  }

  .pos-paper-visual {
    background: #F8F4EE;
    border-radius: 16px;
    border: 1px solid #EADBCE;
    padding: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
  }
  .pos-paper-board {
    width: 100%;
    background: #845A3C;
    border-radius: 12px;
    padding: 10px 8px 8px;
    box-shadow: 0 6px 16px rgba(42, 24, 13, 0.2);
  }
  .pos-paper-clip {
    width: 32px;
    height: 8px;
    background: #C4B5A5;
    border-radius: 3px;
    margin: 0 auto 6px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25);
  }
  .pos-paper-sheet {
    background: #FFFDF9;
    border-radius: 6px;
    padding: 10px 8px;
    font-family: 'Plus Jakarta Sans', sans-serif;
    border: 1px solid #EBE1D3;
  }
  .pos-paper-header {
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
  .pos-paper-slot-title {
    font-size: 7.5px;
    font-weight: 700;
    color: #876039;
    letter-spacing: 0.6px;
    text-transform: uppercase;
    margin: 6px 0 3px;
  }
  .pos-paper-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 7.5px;
    color: #4A3E38;
    padding: 2.5px 0;
    border-bottom: 1px dashed #EDE4D8;
  }
  .pos-paper-row:last-child { border-bottom: none; }
  .pos-paper-row.struck span { text-decoration: line-through; color: #A89A90; }
  .pos-paper-row .err-tag { color: #DC2626; font-weight: 700; }

  .pos-points-list {
    display: flex;
    flex-direction: column;
    gap: 8px;
    justify-content: space-between;
  }
  .pos-point-card {
    background: #FFFFFF;
    border: 1px solid #FEE2E2;
    border-radius: 12px;
    padding: 9px 12px;
    display: flex;
    align-items: center;
    gap: 10px;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
  }
  .pos-point-card:hover {
    transform: translateX(2px);
    box-shadow: 0 4px 12px rgba(220, 38, 38, 0.08);
  }
  .pos-point-ico {
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
  .pos-point-ico svg { width: 15px; height: 15px; stroke: currentColor; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
  .pos-point-txt { display: flex; flex-direction: column; min-width: 0; }
  .pos-point-txt b { font-size: 13px; font-weight: 700; color: #21160F; line-height: 1.25; }
  .pos-point-txt span { font-size: 11px; color: #76675D; line-height: 1.3; }

  .pos-wf-steps {
    display: flex;
    flex-direction: column;
    justify-content: center;
    gap: 6px;
  }
  .pos-wf-card {
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
  .pos-wf-card:hover { transform: translateY(-2px); border-color: #876039; }
  .pos-wf-ico {
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
  .pos-wf-ico svg { width: 18px; height: 18px; stroke: currentColor; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
  .pos-wf-txt { display: flex; flex-direction: column; min-width: 0; }
  .pos-wf-txt b { font-size: 13px; font-weight: 600; color: #21160F; line-height: 1.25; }
  .pos-wf-txt span { font-size: 11.5px; color: #76675D; line-height: 1.3; }
  .pos-wf-arrow { text-align: center; font-size: 15px; font-weight: 500; color: #876039; line-height: 1; }

  .pos-phone-visual {
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .pos-phone-mockup {
    width: 100%;
    max-width: 224px;
    background: #1C1510;
    border-radius: 28px;
    padding: 7px;
    box-shadow: 0 16px 36px rgba(28, 20, 15, 0.28);
    border: 2px solid #362920;
  }
  .pos-phone-screen {
    background: #FFFFFF;
    border-radius: 22px;
    padding: 10px 9px 12px;
    overflow: hidden;
  }
  .pos-phone-island {
    width: 38px;
    height: 4px;
    background: #1C1510;
    border-radius: 4px;
    margin: 0 auto 6px;
  }
  .pos-phone-header { text-align: center; margin-bottom: 7px; }
  .pos-phone-title { font-family: 'Outfit', sans-serif; font-size: 13.5px; font-weight: 600; color: #21160F; line-height: 1.2; }
  .pos-phone-sub { font-size: 8px; color: #76675D; }
  .pos-phone-tabs {
    display: flex;
    gap: 3.5px;
    margin-bottom: 8px;
    justify-content: center;
  }
  .pos-tab-pill {
    font-size: 7.5px;
    font-weight: 700;
    padding: 2.5px 7px;
    border-radius: 12px;
    background: #FAF7F2;
    color: #6E6157;
    white-space: nowrap;
  }
  .pos-tab-active { background: #875A38; color: #FFFFFF; }
  .pos-bill-card {
    background: #FAF8F5;
    border: 1px solid #EFE8DE;
    border-radius: 10px;
    padding: 8px;
    display: flex;
    flex-direction: column;
    gap: 4px;
    margin-bottom: 7px;
  }
  .pos-bill-row {
    display: flex;
    justify-content: space-between;
    font-size: 8.5px;
    color: #4A3E38;
  }
  .pos-bill-row.total {
    margin-top: 3px;
    padding-top: 5px;
    border-top: 1px dashed #D8C9B8;
    font-weight: 700;
    font-size: 10px;
    color: #21160F;
  }
  .pos-paid-pill {
    background: #DCFCE7;
    color: #16A34A;
    font-size: 8.5px;
    font-weight: 700;
    text-align: center;
    padding: 5px;
    border-radius: 8px;
  }
  .pos-bottom-cta {
    margin-top: 16px;
    display: flex;
    justify-content: center;
  }
  .pos-bottom-cta-badge {
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
  .pos-bottom-cta-badge svg { width: 14px; height: 14px; stroke: #FFFFFF; fill: none; stroke-width: 2; }

  @media (max-width: 1080px) {
    .pos-cmp-wrap { grid-template-columns: 1fr; gap: 36px; }
    .pos-cmp-center-arrow { display: none; }
  }
  @media (max-width: 640px) {
    .pos-split-body, .pos-cmp-digital .pos-split-body { grid-template-columns: 1fr; gap: 16px; }
    .pos-paper-visual { max-width: 260px; margin: 0 auto; }
  }
</style>

<section>
  <div class="w">
    <div class="hd r">
      <div class="eb">OPERATIONAL COMPARISON</div>
      <h2>Restaurant Billing Shouldn’t <span class="sf">Slow Down Service.</span></h2>
      <p>During peak lunch and dinner rush hours, manual billing calculations create bottleneck queues at your counter. Compare traditional billing against Geni Menu POS.</p>
    </div>

    <div class="pos-cmp-wrap r">
      <div class="pos-cmp-center-arrow">
        <div class="pos-center-arrow-circle">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <line x1="5" y1="12" x2="19" y2="12"></line>
            <polyline points="12 5 19 12 12 19"></polyline>
          </svg>
        </div>
      </div>

      <!-- LEFT CARD: Traditional Billing -->
      <div class="pos-cmp-card pos-cmp-traditional">
        <div class="pos-cmp-header">
          <div class="pos-badge-icon pos-badge-red">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
              <line x1="18" y1="6" x2="6" y2="18"></line>
              <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
          </div>
          <div>
            <h3 class="pos-cmp-title text-red">Traditional Billing</h3>
            <p class="pos-cmp-subtitle">Manual &amp; fragmented cash counter workflow</p>
          </div>
        </div>

        <div class="pos-split-body">
          <div class="pos-paper-visual">
            <div class="pos-paper-board">
              <div class="pos-paper-clip"></div>
              <div class="pos-paper-sheet">
                <div class="pos-paper-header">BILL PAD</div>
                <div class="pos-paper-slot-title">Table 06 Slip</div>
                <div class="pos-paper-row"><span>Biryani x2</span><b>₹560?</b></div>
                <div class="pos-paper-row struck"><span>Naan x3</span><b>₹120</b></div>
                <div class="pos-paper-row"><span>Naan x4</span><b>₹160</b></div>
                <div class="pos-paper-slot-title">Manual Tax</div>
                <div class="pos-paper-row"><span>GST 5%</span><span class="err-tag">Calc?</span></div>
                <div class="pos-paper-row"><span>Split Bill</span><span class="err-tag">Error!</span></div>
              </div>
            </div>
          </div>

          <div class="pos-points-list">
            <div class="pos-point-card">
              <div class="pos-point-ico">
                <svg viewBox="0 0 24 24"><rect x="4" y="2" width="16" height="20" rx="2"/><line x1="8" y1="6" x2="16" y2="6"/><line x1="8" y1="10" x2="16" y2="10"/><line x1="8" y1="14" x2="12" y2="14"/></svg>
              </div>
              <div class="pos-point-txt">
                <b>Manual Price Calculations</b>
                <span>Paper notepad item counting &amp; tax errors</span>
              </div>
            </div>

            <div class="pos-point-card">
              <div class="pos-point-ico">
                <svg viewBox="0 0 24 24"><path d="M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1Z"/></svg>
              </div>
              <div class="pos-point-txt">
                <b>Disconnected Order Slips</b>
                <span>Kitchen tickets detached from cash counter</span>
              </div>
            </div>

            <div class="pos-point-card">
              <div class="pos-point-ico">
                <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
              </div>
              <div class="pos-point-txt">
                <b>Slow Bill Preparation</b>
                <span>Long queues frustrate guests at exit</span>
              </div>
            </div>

            <div class="pos-point-card">
              <div class="pos-point-ico">
                <svg viewBox="0 0 24 24"><rect width="20" height="14" x="2" y="5" rx="2"/><line x1="2" x2="22" y1="10" y2="10"/></svg>
              </div>
              <div class="pos-point-txt">
                <b>Split Payment Confusion</b>
                <span>Errors mixing Cash, Card &amp; UPI totals</span>
              </div>
            </div>

            <div class="pos-point-card">
              <div class="pos-point-ico">
                <svg viewBox="0 0 24 24"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"/><path d="M12 9v4"/><path d="M12 17h.01"/></svg>
              </div>
              <div class="pos-point-txt">
                <b>Zero Live Sales Visibility</b>
                <span>No real-time view of daily tabs or revenue</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- RIGHT CARD: Geni Menu POS -->
      <div class="pos-cmp-card pos-cmp-digital">
        <div class="pos-cmp-header">
          <div class="pos-badge-icon pos-badge-brown">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
              <polyline points="20 6 9 17 4 12"></polyline>
            </svg>
          </div>
          <div>
            <h3 class="pos-cmp-title text-brown">Geni Menu POS</h3>
            <p class="pos-cmp-subtitle">Connected &amp; instant billing workspace</p>
          </div>
        </div>

        <div class="pos-split-body">
          <div class="pos-wf-steps">
            <div class="pos-wf-card">
              <div class="pos-wf-ico">
                <svg viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>
              </div>
              <div class="pos-wf-txt">
                <b>Unified Touch POS Grid</b>
                <span>Menus, tables &amp; modifiers synced live</span>
              </div>
            </div>

            <div class="pos-wf-arrow">&darr;</div>

            <div class="pos-wf-card">
              <div class="pos-wf-ico">
                <svg viewBox="0 0 24 24"><path d="M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1Z"/><path d="M16 8h-6"/><path d="M16 12h-6"/></svg>
              </div>
              <div class="pos-wf-txt">
                <b>Auto Tax, Discount &amp; Split</b>
                <span>Instant GST &amp; split-bill calculation</span>
              </div>
            </div>

            <div class="pos-wf-arrow">&darr;</div>

            <div class="pos-wf-card">
              <div class="pos-wf-ico">
                <svg viewBox="0 0 24 24"><line x1="18" x2="18" y1="20" y2="10"/><line x1="12" x2="12" y1="20" y2="4"/><line x1="6" x2="6" y1="20" y2="14"/></svg>
              </div>
              <div class="pos-wf-txt">
                <b>Multi-Pay &amp; Live Reports</b>
                <span>Cash, Card, UPI QR &amp; auto reconciliation</span>
              </div>
            </div>
          </div>

          <div class="pos-phone-visual">
            <div class="pos-phone-mockup">
              <div class="pos-phone-screen">
                <div class="pos-phone-island"></div>
                <div class="pos-phone-header">
                  <div class="pos-phone-title">POS Checkout</div>
                  <div class="pos-phone-sub">Table 06 &bull; Invoice #4082</div>
                </div>
                <div class="pos-phone-tabs">
                  <span class="pos-tab-pill pos-tab-active">UPI QR</span>
                  <span class="pos-tab-pill">Card</span>
                  <span class="pos-tab-pill">Cash</span>
                </div>
                <div class="pos-bill-card">
                  <div class="pos-bill-row"><span>Butter Chicken</span><b>₹380</b></div>
                  <div class="pos-bill-row"><span>Garlic Naan x2</span><b>₹120</b></div>
                  <div class="pos-bill-row"><span>GST (5%)</span><b>₹25</b></div>
                  <div class="pos-bill-row total"><span>Grand Total</span><span>₹525</span></div>
                </div>
                <div class="pos-paid-pill">✓ Paid via UPI &bull; Receipt Sent</div>
              </div>
            </div>
          </div>
        </div>

        <div class="pos-bottom-cta">
          <div class="pos-bottom-cta-badge">
            <svg viewBox="0 0 24 24"><path d="m12 3-1.9 5.8a2 2 0 0 1-1.3 1.3L3 12l5.8 1.9a2 2 0 0 1 1.3 1.3L12 21l1.9-5.8a2 2 0 0 1 1.3-1.3L21 12l-5.8-1.9a2 2 0 0 1-1.3-1.3L12 3Z"/></svg>
            <span>3-Click Checkout &amp; Live Sales Sync!</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= CORE POS WORKSPACE CONSOLE ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd r">
      <div class="eb">CORE POS WORKSPACE</div>
      <h2>Everything Your <span class="sf">Cash Counter Needs.</span></h2>
      <p>Give your billing team one focused workspace for creating orders, managing bills and completing payments with maximum speed.</p>
    </div>

    <div class="rm-win r">
      <div class="rm-win-bar">
        <div class="rm-win-dots"><i></i><i></i><i></i></div>
        <div class="rm-win-ttl">GENI MENU POS — COUNTER #1 · CASHIER: RAHUL M.</div>
        <div style="display: flex; gap: 6px; flex-wrap: wrap;">
          <button type="button" class="rm-filter-btn active" onclick="filterPosCategory('all', this)">All Items</button>
          <button type="button" class="rm-filter-btn" onclick="filterPosCategory('main', this)">Main Course</button>
          <button type="button" class="rm-filter-btn" onclick="filterPosCategory('starters', this)">Starters</button>
          <button type="button" class="rm-filter-btn" onclick="filterPosCategory('beverages', this)">Beverages</button>
          <button type="button" class="rm-filter-btn" onclick="filterPosCategory('desserts', this)">Desserts</button>
        </div>
      </div>

      <div class="pos-workspace-grid">
        <!-- Left Menu Grid -->
        <div style="padding: 22px; background: #FFFFFF; border-right: 1px solid var(--line);">
          <div style="display: flex; gap: 8px; flex-wrap: wrap; margin-bottom: 18px; padding-bottom: 14px; border-bottom: 1px solid var(--line);">
            <span style="padding: 7px 14px; border-radius: 10px; background: #F3E8DC; border: 1.5px solid #876039; color: #876039; font-weight: 700; font-size: 12.5px;">Dine-in (T08)</span>
            <span style="padding: 7px 14px; border-radius: 10px; background: #FAF7F3; border: 1px solid var(--line); color: #6E6157; font-weight: 600; font-size: 12.5px;">Takeaway</span>
            <span style="padding: 7px 14px; border-radius: 10px; background: #FAF7F3; border: 1px solid var(--line); color: #6E6157; font-weight: 600; font-size: 12.5px;">Delivery</span>
            <span style="padding: 7px 14px; border-radius: 10px; background: #FAF7F3; border: 1px solid var(--line); color: #6E6157; font-weight: 600; font-size: 12.5px;">Pickup</span>
          </div>

          <div class="pos-items-grid" id="pos-menu-grid">
            <div class="pos-item-tile selected" data-cat="main">
              <div style="font-weight: 700; font-size: 14.5px; color: #21160F; margin-bottom: 3px;">Chicken Biryani</div>
              <div style="font-size: 12px; color: #6E6157;">Main Course · Dum</div>
              <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 12px;">
                <span style="font-weight: 700; color: #876039; font-size: 15px;">₹280</span>
                <span style="background: #876039; color: #fff; padding: 3px 10px; border-radius: 999px; font-weight: 700; font-size: 11px;">2 Added</span>
              </div>
            </div>

            <div class="pos-item-tile selected" data-cat="starters">
              <div style="font-weight: 700; font-size: 14.5px; color: #21160F; margin-bottom: 3px;">Paneer Tikka</div>
              <div style="font-size: 12px; color: #6E6157;">Starters · Tandoori</div>
              <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 12px;">
                <span style="font-weight: 700; color: #876039; font-size: 15px;">₹220</span>
                <span style="background: #876039; color: #fff; padding: 3px 10px; border-radius: 999px; font-weight: 700; font-size: 11px;">1 Added</span>
              </div>
            </div>

            <div class="pos-item-tile selected" data-cat="beverages">
              <div style="font-weight: 700; font-size: 14.5px; color: #21160F; margin-bottom: 3px;">Lime Soda</div>
              <div style="font-size: 12px; color: #6E6157;">Beverages · Fresh</div>
              <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 12px;">
                <span style="font-weight: 700; color: #876039; font-size: 15px;">₹80</span>
                <span style="background: #876039; color: #fff; padding: 3px 10px; border-radius: 999px; font-weight: 700; font-size: 11px;">2 Added</span>
              </div>
            </div>

            <div class="pos-item-tile" data-cat="main">
              <div style="font-weight: 700; font-size: 14.5px; color: #21160F; margin-bottom: 3px;">Garlic Naan</div>
              <div style="font-size: 12px; color: #6E6157;">Breads · Butter</div>
              <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 12px;">
                <span style="font-weight: 700; color: #876039; font-size: 15px;">₹60</span>
                <span style="border: 1px solid #876039; color: #876039; padding: 3px 10px; border-radius: 999px; font-weight: 700; font-size: 11px;">+ Add</span>
              </div>
            </div>

            <div class="pos-item-tile" data-cat="main">
              <div style="font-weight: 700; font-size: 14.5px; color: #21160F; margin-bottom: 3px;">Dal Makhani</div>
              <div style="font-size: 12px; color: #6E6157;">Main Course · Curry</div>
              <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 12px;">
                <span style="font-weight: 700; color: #876039; font-size: 15px;">₹210</span>
                <span style="border: 1px solid #876039; color: #876039; padding: 3px 10px; border-radius: 999px; font-weight: 700; font-size: 11px;">+ Add</span>
              </div>
            </div>

            <div class="pos-item-tile" data-cat="desserts">
              <div style="font-weight: 700; font-size: 14.5px; color: #21160F; margin-bottom: 3px;">Brownie Ice Cream</div>
              <div style="font-size: 12px; color: #6E6157;">Desserts · Sizzling</div>
              <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 12px;">
                <span style="font-weight: 700; color: #876039; font-size: 15px;">₹190</span>
                <span style="border: 1px solid #876039; color: #876039; padding: 3px 10px; border-radius: 999px; font-weight: 700; font-size: 11px;">+ Add</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Right Order Summary -->
        <div style="background: #FAF7F3; padding: 22px; display: flex; flex-direction: column; justify-content: space-between;">
          <div>
            <div style="display: flex; justify-content: space-between; align-items: center; padding-bottom: 14px; border-bottom: 1px solid var(--line); margin-bottom: 14px;">
              <div>
                <h4 style="font-size: 16px; font-weight: 700; color: #21160F;">Current Order</h4>
                <div style="font-size: 12px; color: #6E6157;">3 Guests · Server: Ankit K.</div>
              </div>
              <span class="badge dinein">Table T08</span>
            </div>

            <div style="display: flex; flex-direction: column; gap: 12px; margin-bottom: 18px;">
              <div style="display: flex; justify-content: space-between; font-size: 13.5px;">
                <div>
                  <div style="font-weight: 700; color: #21160F;">Chicken Biryani × 2</div>
                  <div style="font-size: 11px; color: #6E6157;">Extra Raita (+₹30)</div>
                </div>
                <strong style="color: #21160F;">₹560</strong>
              </div>
              <div style="display: flex; justify-content: space-between; font-size: 13.5px;">
                <div>
                  <div style="font-weight: 700; color: #21160F;">Paneer Tikka × 1</div>
                  <div style="font-size: 11px; color: #6E6157;">Medium Spicy</div>
                </div>
                <strong style="color: #21160F;">₹220</strong>
              </div>
              <div style="display: flex; justify-content: space-between; font-size: 13.5px;">
                <div>
                  <div style="font-weight: 700; color: #21160F;">Lime Soda × 2</div>
                  <div style="font-size: 11px; color: #6E6157;">Sweet &amp; Salt</div>
                </div>
                <strong style="color: #21160F;">₹160</strong>
              </div>
            </div>
          </div>

          <div>
            <div style="padding-top: 12px; border-top: 1px solid var(--line); display: flex; flex-direction: column; gap: 6px; margin-bottom: 16px;">
              <div style="display: flex; justify-content: space-between; font-size: 13px; color: #6E6157;"><span>Subtotal</span><strong style="color: #21160F;">₹940</strong></div>
              <div style="display: flex; justify-content: space-between; font-size: 13px; color: #6E6157;"><span>GST (5%)</span><strong style="color: #21160F;">₹47</strong></div>
              <div style="display: flex; justify-content: space-between; font-size: 18px; font-weight: 700; color: #21160F; padding-top: 8px; border-top: 1px dashed var(--line);">
                <span>Total</span><span style="color: #876039;">₹987</span>
              </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 8px; margin-bottom: 8px;">
              <button type="button" class="btn o" style="padding: 9px; font-size: 12.5px; border-radius: 10px;">Save Order</button>
              <button type="button" class="btn o" style="padding: 9px; font-size: 12.5px; border-radius: 10px;">Hold Bill</button>
            </div>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 8px;">
              <button type="button" class="btn o" style="padding: 9px; font-size: 12.5px; border-radius: 10px;">Print Bill</button>
              <button type="button" class="btn p" style="padding: 9px; font-size: 12.5px; border-radius: 10px;">Pay →</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= ORDER TYPES (EDITORIAL IMAGE CARDS) ================= -->
<section>
  <div class="w">
    <div class="hd r">
      <div class="eb">FLEXIBLE RESTAURANT POS</div>
      <h2>One POS. <span class="sf">Different Restaurant Orders.</span></h2>
      <p>Whether guests dine in at your tables or order takeaway at the counter, process every order type with speed and precision.</p>
    </div>

    <div class="rm-ind-grid-4 r">
      <div class="rm-ind-card">
        <div class="rm-ind-media" style="height: 155px;">
          <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=600&auto=format&fit=crop&q=80" alt="Dine-in POS" loading="lazy">
          <div class="rm-ind-scrim"></div>
          <span class="rm-ind-badge">01</span>
        </div>
        <div class="rm-ind-body">
          <h4>Dine-in</h4>
          <p>Connect the order directly with a dining table number and keep track of open table tabs.</p>
        </div>
      </div>

      <div class="rm-ind-card">
        <div class="rm-ind-media" style="height: 155px;">
          <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=600&auto=format&fit=crop&q=80" alt="Takeaway POS" loading="lazy">
          <div class="rm-ind-scrim"></div>
          <span class="rm-ind-badge">02</span>
        </div>
        <div class="rm-ind-body">
          <h4>Takeaway</h4>
          <p>Process counter orders for customers collecting packed food with quick payment options.</p>
        </div>
      </div>

      <div class="rm-ind-card">
        <div class="rm-ind-media" style="height: 155px;">
          <img src="https://images.unsplash.com/photo-1526367790999-0150786686a2?w=600&auto=format&fit=crop&q=80" alt="Delivery POS" loading="lazy">
          <div class="rm-ind-scrim"></div>
          <span class="rm-ind-badge">03</span>
        </div>
        <div class="rm-ind-body">
          <h4>Delivery</h4>
          <p>Manage delivery order bills with customer addresses and rider assignment tracking.</p>
        </div>
      </div>

      <div class="rm-ind-card">
        <div class="rm-ind-media" style="height: 155px;">
          <img src="https://images.unsplash.com/photo-1554118811-1e0d58224f24?w=600&auto=format&fit=crop&q=80" alt="Pickup POS" loading="lazy">
          <div class="rm-ind-scrim"></div>
          <span class="rm-ind-badge">04</span>
        </div>
        <div class="rm-ind-body">
          <h4>Pickup</h4>
          <p>Keep self-collection orders identified and ready for immediate handover upon arrival.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= MENU-TO-POS & TABLE CONNECTION ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd r">
      <div class="eb">INTEGRATED MENU &amp; FLOOR DATA</div>
      <h2>Your Menu, Tables &amp; POS <span class="sf">Work Together.</span></h2>
      <p>Item prices, modifiers, and live dining tables sync directly to your POS billing screen in real time.</p>
    </div>

    <!-- Menu Modifier + Table Bill Split -->
    <div class="rm-split r" style="margin-bottom: 32px;">
      <div class="rm-win">
        <div class="rm-win-bar">
          <div class="rm-win-dots"><i></i><i></i><i></i></div>
          <div class="rm-win-ttl">POS MODIFIER DIALOG</div>
          <span class="rm-win-pill">Live Menu Sync</span>
        </div>
        <div class="rm-win-body">
          <h3 style="font-size: 20px; font-weight: 700; margin-bottom: 4px;">Chicken Biryani</h3>
          <p style="font-size: 13.5px; margin-bottom: 16px;">Base Price: ₹280</p>

          <div style="margin-bottom: 16px;">
            <div style="font-weight: 700; font-size: 12px; color: #76675D; text-transform: uppercase; letter-spacing: 0.06em; margin-bottom: 8px;">Portion Size</div>
            <div style="display: flex; gap: 10px;">
              <span style="padding: 8px 16px; border-radius: 10px; border: 1px solid var(--line); background: #fff; font-size: 13px; font-weight: 600;">Regular</span>
              <span style="padding: 8px 16px; border-radius: 10px; border: 1.5px solid #876039; background: #F3E8DC; color: #876039; font-size: 13px; font-weight: 700;">Large (+₹50) ✓</span>
            </div>
          </div>

          <div style="margin-bottom: 18px; display: flex; flex-direction: column; gap: 8px;">
            <div style="font-weight: 700; font-size: 12px; color: #76675D; text-transform: uppercase; letter-spacing: 0.06em;">Add-ons</div>
            <div class="rm-feat-row"><span class="rm-check-dot">✓</span> Extra Egg (+₹20)</div>
            <div class="rm-feat-row"><span class="rm-check-dot">✓</span> Extra Raita (+₹30)</div>
          </div>

          <button type="button" class="btn p" style="width: 100%; padding: 12px; font-size: 14px;">Add to Order (₹380)</button>
        </div>
      </div>

      <div class="rm-win">
        <div class="rm-win-bar">
          <div class="rm-win-dots"><i></i><i></i><i></i></div>
          <div class="rm-win-ttl">TABLE T04 — ACTIVE BILL</div>
          <span class="badge dinein">Selected ✓</span>
        </div>
        <div class="rm-win-body">
          <!-- Mini Floor Selector -->
          <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 8px; margin-bottom: 18px;">
            <div style="padding: 10px; border-radius: 10px; border: 1.5px solid #34D399; background: #ECFDF5; text-align: center; font-size: 12px; font-weight: 700; color: #065F46;">T01 · Free</div>
            <div style="padding: 10px; border-radius: 10px; border: 1.5px solid #60A5FA; background: #EFF6FF; text-align: center; font-size: 12px; font-weight: 700; color: #1E40AF;">T02 · Occ</div>
            <div style="padding: 10px; border-radius: 10px; border: 1.5px solid #876039; background: #F3E8DC; text-align: center; font-size: 12px; font-weight: 700; color: #876039;">T04 ✓ Active</div>
          </div>

          <div style="display: flex; flex-direction: column; gap: 10px; margin-bottom: 16px; padding: 14px; background: #FAF7F3; border-radius: 12px; border: 1px solid rgba(135,96,57,0.14);">
            <div style="display: flex; justify-content: space-between; font-size: 13.5px;"><span>Chicken Biryani × 2</span><strong>₹560</strong></div>
            <div style="display: flex; justify-content: space-between; font-size: 13.5px;"><span>Margherita Pizza × 1</span><strong>₹320</strong></div>
            <div style="display: flex; justify-content: space-between; font-size: 13.5px;"><span>Fresh Juice × 2</span><strong>₹160</strong></div>
            <div style="display: flex; justify-content: space-between; padding-top: 10px; border-top: 1px dashed var(--line); font-size: 16px; font-weight: 700;">
              <span>Table Bill Total</span><span style="color: #876039;">₹1,040</span>
            </div>
          </div>

          <a href="#billing-workspace" class="btn p" style="width: 100%; padding: 12px; font-size: 14px;">View Bill &amp; Collect Payment →</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= BILLING WORKSPACE & SPLIT PAYMENTS ================= -->
<section id="billing-workspace">
  <div class="w">
    <div class="hd r">
      <div class="eb">PRINT &amp; DIGITAL INVOICING</div>
      <h2>Make Every Bill Clear. <span class="sf">Finish Smoothly.</span></h2>
      <p>Generate compliant GST invoices, apply flat or percentage discounts, and collect Cash, Card, or UPI split payments cleanly.</p>
    </div>

    <div class="rm-split r" style="margin-bottom: 36px;">
      <!-- GST Invoice Window -->
      <div class="rm-win">
        <div class="rm-win-bar">
          <div class="rm-win-dots"><i></i><i></i><i></i></div>
          <div class="rm-win-ttl">TAX INVOICE #INV-2048</div>
          <span class="badge pending">Pending</span>
        </div>
        <div class="rm-win-body">
          <div style="text-align: center; padding-bottom: 16px; border-bottom: 1.5px dashed var(--line); margin-bottom: 16px;">
            <div style="font-family: 'Outfit', sans-serif; font-weight: 700; font-size: 20px; color: #21160F;">SPICE GARDEN BISTRO</div>
            <div style="font-size: 12px; color: #6E6157;">GSTIN: 33AAAAA0000A1Z5 · MG Road, Indiranagar, Bengaluru</div>
          </div>

          <div style="display: flex; justify-content: space-between; font-size: 12.5px; color: #6E6157; margin-bottom: 14px;">
            <div>Table: <strong style="color: #21160F;">T08 (Dine-in)</strong></div>
            <div>29 Sep 2026 · <strong style="color: #21160F;">08:42 PM</strong></div>
          </div>

          <div style="display: flex; flex-direction: column; gap: 8px; font-size: 13.5px; padding: 12px 14px; background: #FAF7F3; border-radius: 12px; margin-bottom: 14px;">
            <div style="display: flex; justify-content: space-between;"><span>Chicken Biryani × 2</span><strong>₹560.00</strong></div>
            <div style="display: flex; justify-content: space-between;"><span>Paneer Tikka × 1</span><strong>₹220.00</strong></div>
            <div style="display: flex; justify-content: space-between;"><span>Lime Soda × 2</span><strong>₹160.00</strong></div>
          </div>

          <div style="display: flex; flex-direction: column; gap: 6px; font-size: 13px; color: #6E6157; margin-bottom: 16px;">
            <div style="display: flex; justify-content: space-between;"><span>Subtotal</span><strong style="color: #21160F;">₹940.00</strong></div>
            <div style="display: flex; justify-content: space-between; color: #059669;"><span>Discount (Promo 5%)</span><strong>-₹50.00</strong></div>
            <div style="display: flex; justify-content: space-between;"><span>CGST (2.5%) + SGST (2.5%)</span><strong style="color: #21160F;">₹44.50</strong></div>
            <div style="display: flex; justify-content: space-between; font-size: 18px; font-weight: 700; color: #21160F; padding-top: 8px; border-top: 1.5px dashed var(--line);">
              <span>Grand Total</span><span style="color: #876039;">₹934.50</span>
            </div>
          </div>

          <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
            <button type="button" class="btn p" style="padding: 10px; font-size: 13px;">Collect Payment</button>
            <button type="button" class="btn o" style="padding: 10px; font-size: 13px;">Save / Print</button>
          </div>
        </div>
      </div>

      <!-- Discounts + Split Payment Stack -->
      <div style="display: flex; flex-direction: column; gap: 20px;">
        <div class="rm-win">
          <div class="rm-win-bar">
            <div class="rm-win-dots"><i></i><i></i><i></i></div>
            <div class="rm-win-ttl">DISCOUNTS &amp; SPLIT PAYMENT</div>
            <span class="badge paid">PAID ✓</span>
          </div>
          <div class="rm-win-body" style="display: flex; flex-direction: column; gap: 14px;">
            <div style="padding: 12px 14px; background: #FAF7F3; border-radius: 12px; border: 1px solid rgba(135,96,57,0.14);">
              <div style="font-size: 11px; font-weight: 700; color: #876039; text-transform: uppercase; margin-bottom: 6px;">Discounts &amp; Offers (10% Applied)</div>
              <div style="font-size: 13px; color: #4A3D34;">Subtotal: ₹1,200 · Discount: -₹120 · Tax: ₹54 · <strong>Final: ₹1,134</strong></div>
            </div>

            <div style="display: flex; flex-direction: column; gap: 8px; font-size: 13.5px;">
              <div style="display: flex; justify-content: space-between; padding: 10px 14px; background: #FAF7F3; border-radius: 10px;">
                <span>Cash Received</span><strong>₹500.00</strong>
              </div>
              <div style="display: flex; justify-content: space-between; padding: 10px 14px; background: #FAF7F3; border-radius: 10px;">
                <span>UPI / QR Transfer</span><strong>₹655.00</strong>
              </div>
              <div style="display: flex; justify-content: space-between; padding: 11px 14px; background: #ECFDF5; border: 1px solid #A7F3D0; border-radius: 10px; color: #065F46; font-weight: 700;">
                <span>Total Paid (Transaction Completed)</span><span>₹1,155.00 ✓</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Payment Status Strip -->
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
          <div class="rm-val-card" style="padding: 16px; border-top: 3px solid var(--green);">
            <span class="badge paid" style="margin-bottom: 6px;">PAID ✓</span>
            <h4 style="font-size: 14.5px;">Transaction Completed</h4>
            <p style="font-size: 12px;">Payment fully received &amp; receipt issued.</p>
          </div>
          <div class="rm-val-card" style="padding: 16px; border-top: 3px solid var(--yellow);">
            <span class="badge pending" style="margin-bottom: 6px;">PENDING</span>
            <h4 style="font-size: 14.5px;">Payment Awaiting</h4>
            <p style="font-size: 12px;">Bill generated; awaiting cash/UPI settlement.</p>
          </div>
          <div class="rm-val-card" style="padding: 16px; border-top: 3px solid var(--blue);">
            <span class="badge partial" style="margin-bottom: 6px;">PARTIAL</span>
            <h4 style="font-size: 14.5px;">Partial Payment</h4>
            <p style="font-size: 12px;">Deposit or advance received on bill.</p>
          </div>
          <div class="rm-val-card" style="padding: 16px; border-top: 3px solid var(--red);">
            <span class="badge failed" style="margin-bottom: 6px;">FAILED</span>
            <h4 style="font-size: 14.5px;">Requires Attention</h4>
            <p style="font-size: 12px;">Declined digital payment attempt.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= CRM & PEAK-HOUR PERFORMANCE ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="rm-split r" style="margin-bottom: 56px;">
      <!-- Customer Profile Window -->
      <div class="rm-win">
        <div class="rm-win-bar">
          <div class="rm-win-dots"><i></i><i></i><i></i></div>
          <div class="rm-win-ttl">CRM GUEST PROFILE</div>
          <span class="rm-win-pill">VIP Regular</span>
        </div>
        <div class="rm-win-body">
          <div style="display: flex; gap: 14px; align-items: center; margin-bottom: 18px;">
            <div style="width: 52px; height: 52px; border-radius: 50%; background: #876039; color: #FFFFFF; font-family: 'Outfit', sans-serif; font-weight: 700; font-size: 18px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">PK</div>
            <div>
              <h3 style="font-size: 20px; font-weight: 700; margin: 0 0 2px;">Priya Kumar</h3>
              <p style="font-size: 13px;">+91 98765 43210 · VIP Regular Guest</p>
            </div>
          </div>

          <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px; background: #FAF7F3; padding: 14px; border-radius: 12px; border: 1px solid rgba(135,96,57,0.14); text-align: center; margin-bottom: 14px;">
            <div><div style="font-size: 11px; color: #6E6157;">Total Visits</div><strong style="font-size: 18px; color: #21160F;">08</strong></div>
            <div><div style="font-size: 11px; color: #6E6157;">Last Visit</div><strong style="font-size: 15px; color: #21160F;">29 Sep</strong></div>
            <div><div style="font-size: 11px; color: #6E6157;">Avg Spend</div><strong style="font-size: 16px; color: #876039;">₹1,150</strong></div>
          </div>

          <div style="font-size: 13px; color: #6E6157;">Current Active Order: <strong style="color: #21160F;">#ORD-2084 (Table T08)</strong></div>
        </div>
      </div>

      <!-- Connected Customer Journey Copy + Editorial Strip -->
      <div>
        <div class="eb">CRM &amp; ORDER HISTORY</div>
        <h2>Keep Customer Info <span class="sf">Connected to Orders.</span></h2>
        <p style="margin: 14px 0 20px;">
          Every time a bill is generated, Geni Menu connects customer preferences, repeat orders, and total spending into your analytics database.
        </p>

        <div style="display: flex; gap: 10px; align-items: center; font-weight: 700; font-size: 13px; flex-wrap: wrap;">
          <span style="background: #fff; padding: 9px 14px; border-radius: 10px; border: 1px solid var(--line);">CUSTOMER</span>
          <span style="color: var(--br);">→</span>
          <span style="background: #fff; padding: 9px 14px; border-radius: 10px; border: 1px solid var(--line);">ORDER</span>
          <span style="color: var(--br);">→</span>
          <span style="background: #fff; padding: 9px 14px; border-radius: 10px; border: 1px solid var(--line);">BILL</span>
          <span style="color: var(--br);">→</span>
          <span style="background: #876039; color: #fff; padding: 9px 14px; border-radius: 10px;">PAYMENT</span>
        </div>

        <div class="pos-photo-strip">
          <img src="https://images.unsplash.com/photo-1559339352-11d035aa65de?w=800&auto=format&fit=crop&q=80" alt="Warm restaurant guest hospitality" loading="lazy">
          <div class="pos-photo-strip-scrim"></div>
          <div class="pos-photo-strip-caption">
            <div style="font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; opacity: 0.85;">Guest Recognition</div>
            <div style="font-family: 'Outfit', sans-serif; font-size: 16px; font-weight: 700;">Recognize VIP regulars and order history right at checkout</div>
          </div>
        </div>
      </div>
    </div>

    <!-- Peak-Hour Performance Banner -->
    <div class="pos-peak-banner r">
      <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=1200&auto=format&fit=crop&q=80" alt="Busy restaurant dinner counter" loading="lazy">
      <div class="pos-peak-scrim"></div>
      <div class="pos-peak-content">
        <div style="text-align: center; max-width: 640px; margin: 0 auto 30px;">
          <div class="eb" style="background: rgba(255,255,255,0.14); color: #fff; border-color: rgba(255,255,255,0.28);">HIGH VOLUME PERFORMANCE</div>
          <h2 style="color: #FFFFFF; margin-bottom: 10px;">Built for <span class="sf" style="background: linear-gradient(135deg, #fff 0%, #f4efe9 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Busy Restaurant Counters.</span></h2>
          <p style="color: rgba(255,255,255,0.82); font-size: 16px;">Handle high dinner-rush order volumes with live status counters and instant table order tracking.</p>
        </div>

        <div class="rm-ind-grid" style="margin-bottom: 20px;">
          <div class="pos-peak-stat">
            <div style="font-size: 11px; font-weight: 700; color: rgba(255,255,255,0.75); text-transform: uppercase;">Active Live Orders</div>
            <div style="font-family: 'Outfit', sans-serif; font-size: 38px; font-weight: 700; color: #F4D7B5; margin-top: 4px;">18</div>
          </div>
          <div class="pos-peak-stat">
            <div style="font-size: 11px; font-weight: 700; color: rgba(255,255,255,0.75); text-transform: uppercase;">Pending Payments</div>
            <div style="font-family: 'Outfit', sans-serif; font-size: 38px; font-weight: 700; color: #FDE68A; margin-top: 4px;">04</div>
          </div>
          <div class="pos-peak-stat">
            <div style="font-size: 11px; font-weight: 700; color: rgba(255,255,255,0.75); text-transform: uppercase;">Completed Bills Today</div>
            <div style="font-family: 'Outfit', sans-serif; font-size: 38px; font-weight: 700; color: #6EE7B7; margin-top: 4px;">42</div>
          </div>
        </div>

        <div class="rm-ind-grid">
          <div class="pos-stream-card">
            <div style="display: flex; justify-content: space-between; margin-bottom: 6px;"><strong style="color: #21160F;">#ORD-2088</strong><span class="badge dinein">Table T12</span></div>
            <div style="font-size: 12.5px; color: #6E6157; margin-bottom: 10px;">4 Items · KOT Sent</div>
            <div style="display: flex; justify-content: space-between; font-size: 12px; font-weight: 700; color: #B45309;"><span>Preparing in Kitchen</span><span>₹840</span></div>
          </div>

          <div class="pos-stream-card">
            <div style="display: flex; justify-content: space-between; margin-bottom: 6px;"><strong style="color: #21160F;">#ORD-2089</strong><span class="badge takeaway">Takeaway</span></div>
            <div style="font-size: 12.5px; color: #6E6157; margin-bottom: 10px;">3 Items · Packed</div>
            <div style="display: flex; justify-content: space-between; font-size: 12px; font-weight: 700; color: #059669;"><span>Ready for Handover</span><span>₹460</span></div>
          </div>

          <div class="pos-stream-card">
            <div style="display: flex; justify-content: space-between; margin-bottom: 6px;"><strong style="color: #21160F;">#ORD-2090</strong><span class="badge dinein">Table T06</span></div>
            <div style="font-size: 12.5px; color: #6E6157; margin-bottom: 10px;">5 Items · Bill Printed</div>
            <div style="display: flex; justify-content: space-between; font-size: 12px; font-weight: 700; color: #876039;"><span>Payment Pending</span><span>₹1,280</span></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 10-STEP SERVICE JOURNEY & SALES ANALYTICS ================= -->
<section>
  <div class="w">
    <div class="hd r">
      <div class="eb">END-TO-END RESTAURANT FLOW</div>
      <h2>From Order to <span class="sf">Payment.</span></h2>
      <p>See how Geni Menu POS fits seamlessly into your entire dining room service workflow.</p>
    </div>

    <div class="rm-prog-grid-5 r" style="margin-bottom: 24px;">
      <div class="rm-prog-card"><div class="rm-prog-num">01</div><h5>Guest Arrives</h5></div>
      <div class="rm-prog-card"><div class="rm-prog-num">02</div><h5>Table Assigned</h5></div>
      <div class="rm-prog-card"><div class="rm-prog-num">03</div><h5>Menu Viewed</h5></div>
      <div class="rm-prog-card"><div class="rm-prog-num">04</div><h5>Order Created</h5></div>
      <div class="rm-prog-card"><div class="rm-prog-num">05</div><h5>KOT Sent</h5></div>
      <div class="rm-prog-card"><div class="rm-prog-num">06</div><h5>Kitchen Prepares</h5></div>
      <div class="rm-prog-card"><div class="rm-prog-num">07</div><h5>Food Served</h5></div>
      <div class="rm-prog-card active"><div class="rm-prog-num">08</div><h5>Bill Generated</h5></div>
      <div class="rm-prog-card active"><div class="rm-prog-num">09</div><h5>Payment Completed</h5></div>
      <div class="rm-prog-card"><div class="rm-prog-num">10</div><h5>Table Available</h5></div>
    </div>

    <div style="text-align: center; font-size: 16px; font-weight: 700; color: var(--br); margin-bottom: 64px;">
      “POS is where restaurant orders become completed transactions.”
    </div>

    <!-- Sales Analytics Split -->
    <div class="rm-split r">
      <div class="rm-win">
        <div class="rm-win-bar">
          <div class="rm-win-dots"><i></i><i></i><i></i></div>
          <div class="rm-win-ttl">TODAY'S SALES SUMMARY</div>
          <span class="rm-win-pill">Live Data</span>
        </div>
        <div class="rm-win-body">
          <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 14px;">
            <div style="background: #FAF7F3; padding: 16px; border-radius: 14px; border: 1px solid rgba(135,96,57,0.14);">
              <div style="font-size: 12px; color: #6E6157;">Total Gross Revenue</div>
              <div style="font-family: 'Outfit', sans-serif; font-size: 26px; font-weight: 700; color: #876039; margin-top: 4px;">₹48,620</div>
            </div>
            <div style="background: #FAF7F3; padding: 16px; border-radius: 14px; border: 1px solid rgba(135,96,57,0.14);">
              <div style="font-size: 12px; color: #6E6157;">Total Orders</div>
              <div style="font-family: 'Outfit', sans-serif; font-size: 26px; font-weight: 700; color: #21160F; margin-top: 4px;">186</div>
            </div>
            <div style="background: #FAF7F3; padding: 16px; border-radius: 14px; border: 1px solid rgba(135,96,57,0.14);">
              <div style="font-size: 12px; color: #6E6157;">Avg Order Value</div>
              <div style="font-family: 'Outfit', sans-serif; font-size: 26px; font-weight: 700; color: #21160F; margin-top: 4px;">₹261</div>
            </div>
            <div style="background: #ECFDF5; padding: 16px; border-radius: 14px; border: 1px solid #A7F3D0;">
              <div style="font-size: 12px; color: #065F46;">Collected Paid</div>
              <div style="font-family: 'Outfit', sans-serif; font-size: 26px; font-weight: 700; color: #059669; margin-top: 4px;">₹45,280</div>
            </div>
          </div>
        </div>
      </div>

      <!-- Sales by Hour Progress Bars -->
      <div style="background: #FFFFFF; padding: 24px; border-radius: 20px; border: 1px solid rgba(135,96,57,0.16); box-shadow: var(--shadow-sm);">
        <h3 style="font-size: 19px; font-weight: 700; margin-bottom: 18px;">Sales Distribution by Hour</h3>
        <div style="display: flex; flex-direction: column; gap: 13px;">
          <div style="display: flex; align-items: center; font-size: 13px; font-weight: 700;">
            <span style="width: 82px; color: #4A3D34;">12:00 PM</span>
            <div style="flex: 1; margin: 0 14px; height: 11px; background: #F1E7DB; border-radius: 99px; overflow: hidden;"><div style="width: 45%; height: 100%; background: #B88E56; border-radius: 99px;"></div></div>
            <span style="width: 72px; text-align: right; color: #6E6157;">₹4,200</span>
          </div>
          <div style="display: flex; align-items: center; font-size: 13px; font-weight: 700;">
            <span style="width: 82px; color: #4A3D34;">2:00 PM</span>
            <div style="flex: 1; margin: 0 14px; height: 11px; background: #F1E7DB; border-radius: 99px; overflow: hidden;"><div style="width: 75%; height: 100%; background: #A27646; border-radius: 99px;"></div></div>
            <span style="width: 72px; text-align: right; color: #21160F;">₹8,900</span>
          </div>
          <div style="display: flex; align-items: center; font-size: 13px; font-weight: 700;">
            <span style="width: 82px; color: #4A3D34;">4:00 PM</span>
            <div style="flex: 1; margin: 0 14px; height: 11px; background: #F1E7DB; border-radius: 99px; overflow: hidden;"><div style="width: 30%; height: 100%; background: #B88E56; border-radius: 99px;"></div></div>
            <span style="width: 72px; text-align: right; color: #6E6157;">₹2,800</span>
          </div>
          <div style="display: flex; align-items: center; font-size: 13px; font-weight: 700;">
            <span style="width: 82px; color: #876039;">8:00 PM</span>
            <div style="flex: 1; margin: 0 14px; height: 12px; background: #F1E7DB; border-radius: 99px; overflow: hidden;"><div style="width: 95%; height: 100%; background: linear-gradient(90deg, #876039 0%, #6f4e2d 100%); border-radius: 99px;"></div></div>
            <span style="width: 72px; text-align: right; color: #876039;">₹14,500</span>
          </div>
          <div style="display: flex; align-items: center; font-size: 13px; font-weight: 700;">
            <span style="width: 82px; color: #4A3D34;">10:00 PM</span>
            <div style="flex: 1; margin: 0 14px; height: 11px; background: #F1E7DB; border-radius: 99px; overflow: hidden;"><div style="width: 60%; height: 100%; background: #876039; border-radius: 99px;"></div></div>
            <span style="width: 72px; text-align: right; color: #21160F;">₹7,200</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= ROLE-BASED WORKSPACES ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd r">
      <div class="eb">ROLE-BASED WORKSPACES</div>
      <h2>Give Every Team Member the <span class="sf">Right Workspace.</span></h2>
      <p>Customized POS views for Cashiers, Waiters, Managers and Restaurant Admins.</p>
    </div>

    <div class="rm-val-grid r">
      <div class="rm-val-card">
        <div class="rm-val-top">
          <div class="rm-val-ic"><svg viewBox="0 0 24 24"><rect x="2" y="5" width="20" height="14" rx="2"/><line x1="2" y1="10" x2="22" y2="10"/></svg></div>
          <span class="rm-val-num">01</span>
        </div>
        <h4>Cashier</h4>
        <p style="margin-bottom: 12px;">Focused on speed billing and cash collection.</p>
        <ul style="font-size: 13px; display: flex; flex-direction: column; gap: 5px; color: #21160F; font-weight: 600;">
          <li>✓ Create fast orders</li>
          <li>✓ Generate bill invoices</li>
          <li>✓ Process cash/UPI payments</li>
        </ul>
      </div>

      <div class="rm-val-card">
        <div class="rm-val-top">
          <div class="rm-val-ic"><svg viewBox="0 0 24 24"><rect width="14" height="20" x="5" y="2" rx="2" ry="2"/><path d="M12 18h.01"/></svg></div>
          <span class="rm-val-num">02</span>
        </div>
        <h4>Waiter</h4>
        <p style="margin-bottom: 12px;">Mobile table-side order entry.</p>
        <ul style="font-size: 13px; display: flex; flex-direction: column; gap: 5px; color: #21160F; font-weight: 600;">
          <li>✓ Table order creation</li>
          <li>✓ Add item modifiers</li>
          <li>✓ View open table tabs</li>
        </ul>
      </div>

      <div class="rm-val-card">
        <div class="rm-val-top">
          <div class="rm-val-ic"><svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg></div>
          <span class="rm-val-num">03</span>
        </div>
        <h4>Manager</h4>
        <p style="margin-bottom: 12px;">Floor supervision and void/discount approvals.</p>
        <ul style="font-size: 13px; display: flex; flex-direction: column; gap: 5px; color: #21160F; font-weight: 600;">
          <li>✓ Monitor live sales</li>
          <li>✓ Review register totals</li>
          <li>✓ Manage active orders</li>
        </ul>
      </div>

      <div class="rm-val-card">
        <div class="rm-val-top">
          <div class="rm-val-ic"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg></div>
          <span class="rm-val-num">04</span>
        </div>
        <h4>Admin</h4>
        <p style="margin-bottom: 12px;">Complete business configuration.</p>
        <ul style="font-size: 13px; display: flex; flex-direction: column; gap: 5px; color: #21160F; font-weight: 600;">
          <li>✓ Configure POS settings</li>
          <li>✓ Review sales reports</li>
          <li>✓ Manage tax/pricing rules</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ================= INDUSTRIES & ECOSYSTEM ================= -->
<section>
  <div class="w">
    <div class="hd r">
      <div class="eb">MULTI-FORMAT COMPATIBILITY</div>
      <h2>POS Built for <span class="sf">Different Food Businesses.</span></h2>
      <p>Whether you run a fast-paced QSR, a fine dining restaurant, a cozy café or a bakery, Geni Menu adapts to your operational style.</p>
    </div>

    <div class="rm-ind-grid r" style="margin-bottom: 72px;">
      <div class="rm-ind-card">
        <div class="rm-ind-media">
          <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=600&auto=format&fit=crop&q=80" alt="Fine Dining" loading="lazy">
          <div class="rm-ind-scrim"></div>
        </div>
        <div class="rm-ind-body">
          <h4><svg class="gm-theme-icon" viewBox="0 0 24 24"><path d="M8 22h8"/><path d="M12 11v11"/><path d="m19 3-7 8-7-8Z"/></svg> Fine Dining</h4>
          <p>Table-side ordering, course management, and elegant split billing.</p>
        </div>
      </div>

      <div class="rm-ind-card">
        <div class="rm-ind-media">
          <img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?w=600&auto=format&fit=crop&q=80" alt="QSR & Fast Food" loading="lazy">
          <div class="rm-ind-scrim"></div>
        </div>
        <div class="rm-ind-body">
          <h4><svg class="gm-theme-icon" viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/></svg> QSR &amp; Fast Food</h4>
          <p>Ultra-fast counter ordering with direct printer receipt generation.</p>
        </div>
      </div>

      <div class="rm-ind-card">
        <div class="rm-ind-media">
          <img src="https://images.unsplash.com/photo-1501339847302-ac426a4a7cbb?w=600&auto=format&fit=crop&q=80" alt="Cafés & Bakeries" loading="lazy">
          <div class="rm-ind-scrim"></div>
        </div>
        <div class="rm-ind-body">
          <h4><svg class="gm-theme-icon" viewBox="0 0 24 24"><path d="M17 8h1a4 4 0 1 1 0 8h-1"/><path d="M3 8h14v9a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4Z"/></svg> Cafés &amp; Bakeries</h4>
          <p>Quick beverage selection, cake customization add-ons, and instant checkout.</p>
        </div>
      </div>
    </div>

    <!-- Connected Ecosystem -->
    <div class="hd r">
      <div class="eb">CONNECTED PLATFORM</div>
      <h2>Your POS Is Connected to the <span class="sf">Rest of Your Restaurant.</span></h2>
      <p>Geni Menu POS acts as the central engine connecting every digital workflow in your establishment.</p>
    </div>

    <div class="rm-eco-grid r">
      <div class="rm-eco-step active">
        <span class="rm-eco-num">01</span>
        <img src="{{ asset('assets/images/workflow/step-5-billing.png') }}" alt="POS Billing" class="rm-eco-img">
        <div class="rm-eco-title">POS BILLING</div>
      </div>
      <div class="rm-eco-step">
        <span class="rm-eco-num">02</span>
        <img src="{{ asset('assets/images/workflow/step-1-menu.png') }}" alt="Menu" class="rm-eco-img">
        <div class="rm-eco-title">MENU</div>
      </div>
      <div class="rm-eco-step">
        <span class="rm-eco-num">03</span>
        <img src="{{ asset('assets/images/workflow/step-4-table.png') }}" alt="Tables" class="rm-eco-img">
        <div class="rm-eco-title">TABLES</div>
      </div>
      <div class="rm-eco-step">
        <span class="rm-eco-num">04</span>
        <img src="{{ asset('assets/images/workflow/step-2-order.png') }}" alt="Orders" class="rm-eco-img">
        <div class="rm-eco-title">ORDERS</div>
      </div>
      <div class="rm-eco-step">
        <span class="rm-eco-num">05</span>
        <img src="{{ asset('assets/images/workflow/step-3-kitchen.png') }}" alt="Kitchen KOT" class="rm-eco-img">
        <div class="rm-eco-title">KOT</div>
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
        <h4 style="color: #876039;">Menu Management</h4>
        <p>Prices, stock &amp; item variants update automatically on POS.</p>
      </div>
      <div class="rm-val-card">
        <h4 style="color: #876039;">Table Management</h4>
        <p>Live table status &amp; occupied bills sync instantly.</p>
      </div>
      <div class="rm-val-card">
        <h4 style="color: #876039;">KOT Management</h4>
        <p>Orders created on POS trigger immediate kitchen tickets.</p>
      </div>
      <div class="rm-val-card">
        <h4 style="color: #876039;">Reports &amp; Analytics</h4>
        <p>Completed billing feeds real-time sales and revenue reporting.</p>
      </div>
    </div>
  </div>
</section>

<!-- ================= FAQ ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd r">
      <h2>Frequently Asked <span class="sf">Questions.</span></h2>
      <p>Everything you need to know about Geni Menu POS Management.</p>
    </div>

    <div class="faq-list r">
      <div class="faq-item open">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>1. What is POS Management in Geni Menu?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          POS Management in Geni Menu is the central restaurant billing and transaction workspace connecting menu items, tables, orders, discounts, and payments into one fast cash counter system.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>2. Can I create restaurant orders directly from the POS?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Cashiers and staff can select menu items, choose portion sizes or add-ons, assign table numbers or order types, and create instant bills from the POS.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>3. Does the POS connect automatically with my menu?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Any prices, categories, item availability, or modifier changes updated in Menu Management sync immediately to the POS screen.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>4. Can POS orders be linked directly to table numbers?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. For dine-in service, POS orders connect to specific tables, allowing staff to add items to an open table tab and settle the bill when guests finish dining.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>5. Does the POS support takeaway and delivery orders?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. You can switch between Dine-in, Takeaway, Delivery, and Pickup order modes with one click on the POS interface.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>6. How are taxes and discounts handled on the bill?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Geni Menu POS automatically calculates configured GST taxes and lets staff apply percentage or flat discount vouchers prior to payment collection.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>7. What payment methods are recorded in the POS?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          The POS records Cash, Card, UPI QR transfers, and split payment totals to ensure accurate end-of-day register balancing.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>8. Does POS data feed into business reports?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Every settled bill updates your sales dashboard, revenue reports, item performance analytics, and payment collection breakdown in real time.
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= FINAL CTA ================= -->
<section style="background: linear-gradient(135deg, #876039 0%, #6f4e2d 100%); color: #fff; text-align: center;">
  <div class="w r">
    <div class="eb" style="background: rgba(255,255,255,0.15); color: #fff; border-color: rgba(255,255,255,0.3);">
      TRANSFORM YOUR BILLING COUNTER
    </div>
    <h2 style="color: #fff; font-size: clamp(34px, 5vw, 54px);">
      Bring Orders, Billing and<br>
      <span class="sf" style="background: linear-gradient(135deg, #fff 0%, #f4efe9 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Payments Together.</span>
    </h2>
    <p style="color: #f4efe9; max-width: 620px; margin: 20px auto 36px; font-size: 18px;">
      Give your restaurant team a connected POS built around real restaurant service — from order creation to completed payment.
    </p>

    <div style="display: flex; gap: 16px; justify-content: center; flex-wrap: wrap;">
      <a href="{{ route('restaurant_signup') }}" class="btn" style="background: #fff; color: var(--br); border-color: #fff; font-size: 16px; padding: 16px 36px; box-shadow: 0 8px 24px rgba(0,0,0,0.2);">Get Started →</a>
      <a href="{{ route('contact.us') }}" class="btn" style="background: transparent; color: #fff; border-color: rgba(255,255,255,0.5); font-size: 16px; padding: 16px 36px;">Book a Demo</a>
    </div>

    <div style="margin-top: 36px; font-size: 14px; color: #e5d8c8; font-weight: 600;">
      Built for restaurants, cafés, hotels, QSRs and modern food businesses.
    </div>
  </div>
</section>

<script>
// Interactive POS Category Filter
function filterPosCategory(cat, btn) {
  document.querySelectorAll('.rm-filter-btn').forEach(b => b.classList.remove('active'));
  if (btn) btn.classList.add('active');
  document.querySelectorAll('#pos-menu-grid .pos-item-tile').forEach(item => {
    const itemCat = item.getAttribute('data-cat');
    if (cat === 'all' || itemCat === cat) {
      item.style.display = '';
    } else {
      item.style.display = 'none';
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
