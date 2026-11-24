@php
    $meta = [
        'title'       => 'Order Management Software for Restaurants | Geni Menu',
        'description' => 'Manage dine-in, takeaway, counter and online delivery orders on one live Kanban board. Prevent missed orders, track prep timers, and unify every channel with Geni Menu.',
        'keywords'    => 'restaurant order management, unified order board, dine-in takeaway delivery orders, KOT management, Swiggy Zomato aggregator, order tracking software India',
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

/* Channel & Status Badges */
.badge { font-size: 10px; font-weight: 700; padding: 3px 9px; border-radius: 999px; text-transform: uppercase; display: inline-block; letter-spacing: 0.04em; }
.badge.dinein { background: #EDE9FE; color: #6D28D9; }
.badge.takeaway { background: #DBEAFE; color: #1D4ED8; }
.badge.delivery { background: #FFE4E6; color: #BE123C; }
.badge.counter { background: #F3F4F6; color: #374151; }
.badge.ok { background: #D1FAE5; color: #065F46; }
.badge.warn { background: #FEF3C7; color: #92400E; }

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
  grid-template-columns: 1fr 1.15fr;
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
  align-items: flex-start;
  gap: 12px;
  padding: 12px 14px;
  background: #FAF7F3;
  border: 1px solid rgba(135, 96, 57, 0.12);
  border-radius: 12px;
  font-size: 14px;
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
  margin-top: 2px;
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
  padding: 20px;
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

/* Interactive Kanban Board */
.om-kanban {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 14px;
}
.om-col {
  background: #FAF8F5;
  border: 1px solid rgba(135, 96, 57, 0.14);
  border-radius: 16px;
  overflow: hidden;
  display: flex;
  flex-direction: column;
}
.om-col-head {
  padding: 11px 14px;
  font-family: 'Outfit', sans-serif;
  font-size: 12px;
  font-weight: 700;
  letter-spacing: 0.06em;
  text-transform: uppercase;
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.om-col.inc .om-col-head { background: #FEF3C7; color: #92400E; border-bottom: 1.5px solid #FDE68A; }
.om-col.prep .om-col-head { background: #F3E8DC; color: #6F4E2D; border-bottom: 1.5px solid rgba(135,96,57,0.22); }
.om-col.rdy .om-col-head { background: #D1FAE5; color: #065F46; border-bottom: 1.5px solid #A7F3D0; }
.om-col-body {
  padding: 12px;
  display: flex;
  flex-direction: column;
  gap: 10px;
}
.om-card {
  background: #FFFFFF;
  border: 1px solid rgba(135, 96, 57, 0.14);
  border-radius: 12px;
  padding: 12px;
  transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.om-card:hover {
  transform: translateY(-2px);
  box-shadow: 0 8px 20px rgba(33, 22, 15, 0.06);
}

/* Status Progression Steps */
.rm-prog-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 18px;
}
.rm-prog-card {
  background: #FFFFFF;
  border: 1px solid rgba(135, 96, 57, 0.14);
  border-radius: 18px;
  padding: 24px 18px;
  text-align: center;
  transition: transform 0.25s ease, box-shadow 0.25s ease;
  box-shadow: 0 4px 14px rgba(33, 22, 15, 0.03);
}
.rm-prog-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 12px 28px rgba(135, 96, 57, 0.10);
}
.rm-prog-card.active {
  border-color: rgba(135, 96, 57, 0.35);
}
.rm-prog-num {
  width: 42px;
  height: 42px;
  border-radius: 50%;
  margin: 0 auto 14px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-family: 'Outfit', sans-serif;
  font-size: 15px;
  font-weight: 700;
  background: #F6EFE7;
  color: #876039;
  border: 2px solid #876039;
}
.rm-prog-card.active .rm-prog-num {
  background: #876039;
  color: #FFFFFF;
  box-shadow: 0 6px 16px rgba(135, 96, 57, 0.28);
}
.rm-prog-card h5 {
  font-family: 'Outfit', 'Plus Jakarta Sans', sans-serif;
  font-size: 16px;
  font-weight: 700;
  color: #21160F;
  margin: 0 0 8px;
}
.rm-prog-card p {
  font-size: 13px;
  color: #76675D;
  margin: 0;
  line-height: 1.55;
}

/* Editorial Image Cards */
.rm-ind-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 24px;
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
  height: 168px;
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
  margin: 0 0 8px;
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

/* 7-Step Ecosystem Flow */
.rm-eco-grid {
  display: grid;
  grid-template-columns: repeat(7, 1fr);
  gap: 14px;
  margin-bottom: 44px;
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

/* Metrics Editorial Banner */
.om-metrics-banner {
  position: relative;
  border-radius: 24px;
  overflow: hidden;
  padding: 44px 32px;
  box-shadow: var(--shadow-lg);
}
.om-metrics-banner > img {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  z-index: 0;
}
.om-metrics-scrim {
  position: absolute;
  inset: 0;
  background: linear-gradient(135deg, rgba(33, 22, 15, 0.90) 0%, rgba(111, 78, 45, 0.84) 100%);
  z-index: 1;
}
.om-metrics-content {
  position: relative;
  z-index: 2;
}
.om-metric-card {
  background: rgba(255, 255, 255, 0.10);
  backdrop-filter: blur(12px);
  border: 1px solid rgba(255, 255, 255, 0.18);
  border-radius: 18px;
  padding: 26px 20px;
  text-align: center;
}
.om-metric-num {
  font-family: 'Outfit', sans-serif;
  font-size: 42px;
  font-weight: 700;
  color: #F4D7B5;
  line-height: 1.05;
  margin-bottom: 8px;
}

/* Editorial Photo Strip */
.om-photo-strip {
  position: relative;
  border-radius: 18px;
  overflow: hidden;
  height: 148px;
  margin-top: 22px;
  border: 1px solid rgba(135, 96, 57, 0.16);
  box-shadow: var(--shadow-sm);
}
.om-photo-strip img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}
.om-photo-strip-scrim {
  position: absolute;
  inset: 0;
  background: linear-gradient(90deg, rgba(33, 22, 15, 0.74) 0%, rgba(33, 22, 15, 0.25) 60%, rgba(33, 22, 15, 0.1) 100%);
}
.om-photo-strip-caption {
  position: absolute;
  left: 18px;
  bottom: 14px;
  right: 18px;
  color: #FFFFFF;
}

/* Crosslinks */
.om-cross-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 20px;
}
.om-cross-card {
  background: #FFFFFF;
  border: 1px solid rgba(135, 96, 57, 0.16);
  border-radius: 18px;
  padding: 22px;
  display: flex;
  align-items: center;
  gap: 14px;
  transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
  box-shadow: 0 4px 16px rgba(33, 22, 15, 0.03);
}
.om-cross-card:hover {
  transform: translateY(-4px);
  border-color: rgba(135, 96, 57, 0.4);
  box-shadow: 0 14px 32px rgba(135, 96, 57, 0.10);
}

/* Responsive adjustments */
@media (max-width: 1100px) {
  .rm-val-grid { grid-template-columns: repeat(2, 1fr); }
  .rm-prog-grid { grid-template-columns: repeat(2, 1fr); }
  .rm-eco-grid { grid-template-columns: repeat(4, 1fr); }
  .rm-ind-grid, .om-cross-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 960px) {
  .rm-hero-grid, .rm-split, .om-kanban { grid-template-columns: 1fr; gap: 28px; }
}
@media (max-width: 768px) {
  .bc { padding: 14px 0 14px; }
  .w { padding: 0 16px; }
  .om-metrics-banner { padding: 32px 20px; }
}
@media (max-width: 600px) {
  .rm-val-grid, .rm-prog-grid, .rm-ind-grid, .om-cross-grid { grid-template-columns: 1fr; }
  .rm-eco-grid { grid-template-columns: repeat(2, 1fr); }
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
    <span>Order Management</span>
  </div>
</div>

<!-- ================= HERO SECTION ================= -->
<section style="background: linear-gradient(180deg, var(--bg2) 0%, #ffffff 100%);">
  <div class="w">
    <div class="rm-hero-grid">
      <!-- Hero Left Copy -->
      <div class="r in">
        <div class="eb">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect width="8" height="4" x="8" y="2" rx="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/></svg>
          ORDER MANAGEMENT
        </div>
        <h1>Every Order, Every Channel —<br><span class="sf">One Unified Board.</span></h1>
        <p style="margin: 20px 0 32px; font-size: 18px; max-width: 530px;">
          Dine-in tables, counter takeaways, Swiggy &amp; Zomato deliveries — manage every single order on a live Kanban board so nothing slips through the cracks, ever.
        </p>
        <div style="display: flex; gap: 14px; flex-wrap: wrap;">
          <a href="{{ route('restaurant_signup') }}" class="btn p">Get Started Free →</a>
          <a href="{{ route('contact.us') }}" class="btn o">Book a Demo</a>
        </div>
        <div style="margin-top: 28px; font-size: 14px; color: var(--mute); font-weight: 600; display: flex; align-items: center; gap: 16px; flex-wrap: wrap;">
          <span>✓ Live Order Sync</span>
          <span>✓ Zero Setup Required</span>
          <span>✓ All Channels Unified</span>
          <span>✓ Works on Any Device</span>
        </div>
      </div>

      <!-- Hero Visual: Editorial Hospitality Photo + Live Order Card -->
      <div class="r in" style="transition-delay: 0.15s; position: relative; display: flex; justify-content: center;">
        <div style="position: relative; width: 100%; max-width: 610px; border-radius: 26px; overflow: hidden; box-shadow: 0 28px 64px rgba(33, 22, 15, 0.16), 0 6px 20px rgba(135, 96, 57, 0.10); border: 1px solid rgba(135, 96, 57, 0.16);">
          <img
            src="{{ asset('assets/images/order-management-hero.jpg') }}"
            alt="Restaurant manager tracking dine-in, takeaway and delivery orders live on Geni Menu"
            style="width: 100%; height: auto; display: block; object-fit: cover;"
            loading="eager"
          />
          <div style="position: absolute; inset: 0; background: linear-gradient(180deg, rgba(33,22,15,0.08) 0%, rgba(33,22,15,0) 45%, rgba(33,22,15,0.48) 100%); pointer-events: none;"></div>

          <!-- Top-Left Live Status Pill -->
          <div style="position: absolute; top: 18px; left: 18px; display: inline-flex; align-items: center; gap: 8px; padding: 8px 14px; border-radius: 999px; background: rgba(255, 255, 255, 0.94); backdrop-filter: blur(10px); box-shadow: 0 8px 20px rgba(0,0,0,0.14); font-size: 12px; font-weight: 700; color: #21160F;">
            <span style="width: 8px; height: 8px; border-radius: 50%; background: #16A34A; box-shadow: 0 0 0 3px rgba(22,163,74,0.22);"></span>
            Live Board • 6 Active • 24 Today • ₹28,400
          </div>

          <!-- Floating Order Notification Card -->
          <div style="position: absolute; bottom: 18px; left: 18px; right: 18px; background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(12px); border: 1px solid rgba(135, 96, 57, 0.25); border-radius: 16px; padding: 12px 16px; box-shadow: 0 12px 28px rgba(0,0,0,0.18); display: flex; justify-content: space-between; align-items: center; gap: 12px; flex-wrap: wrap;">
            <div style="display: flex; align-items: center; gap: 12px;">
              <div style="width: 38px; height: 38px; border-radius: 11px; background: #F6EFE7; color: #876039; display: flex; align-items: center; justify-content: center; flex-shrink: 0; font-family: 'Outfit', sans-serif; font-weight: 700; font-size: 12px;">
                #1248
              </div>
              <div>
                <div style="font-size: 10px; font-weight: 700; color: #876039; letter-spacing: 0.06em;">INCOMING • TABLE 07 • DINE-IN</div>
                <div style="font-weight: 700; font-size: 13.5px; color: #21160F;">Butter Chicken ×2, Garlic Naan ×4</div>
                <div style="font-size: 11.5px; color: #6E6157;">₹1,140 • Just now • KOT Ready</div>
              </div>
            </div>
            <span style="background: #876039; color: #fff; padding: 7px 14px; border-radius: 9px; font-weight: 700; font-size: 12px;">Accept →</span>
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
            <svg viewBox="0 0 24 24"><rect width="8" height="4" x="8" y="2" rx="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/></svg>
          </div>
          <span class="rm-val-num">01</span>
        </div>
        <h4>Live Order Board</h4>
        <p>Every order visible in real time, across all channels.</p>
      </div>

      <div class="rm-val-card">
        <div class="rm-val-top">
          <div class="rm-val-ic">
            <svg viewBox="0 0 24 24"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
          </div>
          <span class="rm-val-num">02</span>
        </div>
        <h4>All Channels in One Queue</h4>
        <p>Dine-in, takeaway, Swiggy &amp; Zomato — unified.</p>
      </div>

      <div class="rm-val-card">
        <div class="rm-val-top">
          <div class="rm-val-ic">
            <svg viewBox="0 0 24 24"><circle cx="12" cy="13" r="8"/><path d="M12 9v4l2 2"/><path d="M10 2h4"/></svg>
          </div>
          <span class="rm-val-num">03</span>
        </div>
        <h4>SLA Prep Timers</h4>
        <p>Colour-coded alerts before orders breach time limits.</p>
      </div>

      <div class="rm-val-card">
        <div class="rm-val-top">
          <div class="rm-val-ic">
            <svg viewBox="0 0 24 24"><rect width="14" height="20" x="5" y="2" rx="2" ry="2"/><path d="M12 18h.01"/></svg>
          </div>
          <span class="rm-val-num">04</span>
        </div>
        <h4>Auto Customer Alerts</h4>
        <p>SMS customers the moment their order is ready.</p>
      </div>
    </div>
  </div>
</section>

<!-- ================= LIVE UNIFIED KANBAN CONSOLE ================= -->
<section>
  <div class="w">
    <div class="hd r">
      <div class="eb">LIVE ORDER PIPELINE</div>
      <h2>Your Kitchen &amp; Front-of-House on the <span class="sf">Same Page.</span></h2>
      <p>From the moment a guest places an order — at the table, at the counter, or through Swiggy — it lands instantly on your unified Kanban board.</p>
    </div>

    <div class="rm-win r" style="margin-bottom: 40px;">
      <div class="rm-win-bar">
        <div class="rm-win-dots"><i></i><i></i><i></i></div>
        <div class="rm-win-ttl">GENI ORDER BOARD — LIVE KANBAN</div>
        <div style="display: flex; gap: 6px; flex-wrap: wrap;">
          <button type="button" class="rm-filter-btn active" onclick="filterOrderChannel('all', this)">All Channels</button>
          <button type="button" class="rm-filter-btn" onclick="filterOrderChannel('dinein', this)">Dine-In</button>
          <button type="button" class="rm-filter-btn" onclick="filterOrderChannel('takeaway', this)">Takeaway</button>
          <button type="button" class="rm-filter-btn" onclick="filterOrderChannel('delivery', this)">Delivery</button>
          <button type="button" class="rm-filter-btn" onclick="filterOrderChannel('counter', this)">Counter</button>
        </div>
      </div>

      <div class="rm-win-body">
        <div class="om-kanban" id="om-kanban-board">
          <!-- Incoming -->
          <div class="om-col inc">
            <div class="om-col-head"><span>Incoming</span><span>2</span></div>
            <div class="om-col-body">
              <div class="om-card" data-channel="dinein">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
                  <strong style="font-size: 13px; color: #21160F;">#1248 · Table 07</strong>
                  <span class="badge dinein">Dine-In</span>
                </div>
                <div style="font-size: 12.5px; color: #6E6157; margin-bottom: 8px;">Butter Chicken ×2 · Garlic Naan ×4 · Dal Makhani ×1</div>
                <div style="display: flex; justify-content: space-between; align-items: center;">
                  <strong style="color: #876039;">₹1,140</strong>
                  <span style="font-size: 11px; color: #6E6157;">Just now</span>
                </div>
              </div>

              <div class="om-card" data-channel="takeaway">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
                  <strong style="font-size: 13px; color: #21160F;">#1249 · Takeaway</strong>
                  <span class="badge takeaway">Takeaway</span>
                </div>
                <div style="font-size: 12.5px; color: #6E6157; margin-bottom: 8px;">Paneer Tikka Roll ×1 · Mint Lassi ×1</div>
                <div style="display: flex; justify-content: space-between; align-items: center;">
                  <strong style="color: #876039;">₹340</strong>
                  <span style="font-size: 11px; color: #6E6157;">1 min ago</span>
                </div>
              </div>
            </div>
          </div>

          <!-- Preparing -->
          <div class="om-col prep">
            <div class="om-col-head"><span>Preparing</span><span>2</span></div>
            <div class="om-col-body">
              <div class="om-card" data-channel="dinein">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
                  <strong style="font-size: 13px; color: #21160F;">#1246 · Table 03</strong>
                  <span class="badge dinein">Dine-In</span>
                </div>
                <div style="font-size: 12.5px; color: #6E6157; margin-bottom: 8px;">Truffle Risotto ×1 · Margherita Pizza ×1</div>
                <div style="display: flex; justify-content: space-between; align-items: center;">
                  <strong style="color: #876039;">₹1,480</strong>
                  <span class="badge ok">08:24 / 15:00</span>
                </div>
              </div>

              <div class="om-card" data-channel="delivery">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
                  <strong style="font-size: 13px; color: #21160F;">#1247 · Swiggy</strong>
                  <span class="badge delivery">Delivery</span>
                </div>
                <div style="font-size: 12.5px; color: #6E6157; margin-bottom: 8px;">Veg Biryani ×2 · Raita ×1</div>
                <div style="display: flex; justify-content: space-between; align-items: center;">
                  <strong style="color: #876039;">₹780</strong>
                  <span class="badge warn">04:10 / 12:00</span>
                </div>
              </div>
            </div>
          </div>

          <!-- Ready -->
          <div class="om-col rdy">
            <div class="om-col-head"><span>Ready</span><span>2</span></div>
            <div class="om-col-body">
              <div class="om-card" data-channel="dinein">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
                  <strong style="font-size: 13px; color: #21160F;">#1244 · Table 05</strong>
                  <span class="badge dinein">Dine-In</span>
                </div>
                <div style="font-size: 12.5px; color: #6E6157; margin-bottom: 8px;">Chocolate Fondant ×2 · Cold Coffee ×2</div>
                <div style="display: flex; justify-content: space-between; align-items: center;">
                  <strong style="color: #876039;">₹620</strong>
                  <span class="badge ok">Steward Called</span>
                </div>
              </div>

              <div class="om-card" data-channel="counter">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
                  <strong style="font-size: 13px; color: #21160F;">#1245 · Token #42</strong>
                  <span class="badge counter">Counter</span>
                </div>
                <div style="font-size: 12.5px; color: #6E6157; margin-bottom: 8px;">Masala Chai ×3 · Veg Samosa ×2</div>
                <div style="display: flex; justify-content: space-between; align-items: center;">
                  <strong style="color: #876039;">₹230</strong>
                  <span class="badge takeaway">Counter Ready</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div style="margin-top: 16px; padding-top: 12px; border-top: 1px solid var(--line); display: flex; justify-content: space-between; flex-wrap: wrap; gap: 10px; font-size: 12px; font-weight: 700; color: #6E6157;">
          <span>Last sync: <strong style="color: #21160F;">2 seconds ago</strong></span>
          <span>24 orders today · Revenue: <strong style="color: #876039;">₹28,400</strong> · 6 active now</span>
        </div>
      </div>
    </div>

    <!-- Pipeline Highlights Split -->
    <div class="rm-split r">
      <div>
        <ul class="rm-feat-list">
          <li class="rm-feat-row">
            <span class="rm-check-dot">✓</span>
            <div><strong>Drag-and-Drop Status Updates</strong><div style="font-size: 13px; font-weight: 400; color: #6E6157;">Move orders between Incoming → Preparing → Ready with a single tap — from tablet, phone or desktop.</div></div>
          </li>
          <li class="rm-feat-row">
            <span class="rm-check-dot">✓</span>
            <div><strong>Online Aggregator Pull-In</strong><div style="font-size: 13px; font-weight: 400; color: #6E6157;">Swiggy, Zomato and your own website orders appear automatically — no manual re-entry, ever.</div></div>
          </li>
          <li class="rm-feat-row">
            <span class="rm-check-dot">✓</span>
            <div><strong>Mid-Flow Order Edits</strong><div style="font-size: 13px; font-weight: 400; color: #6E6157;">Guest wants to swap Paneer for Chicken after the KOT fires? Update in the board, kitchen sees it instantly.</div></div>
          </li>
          <li class="rm-feat-row">
            <span class="rm-check-dot">✓</span>
            <div><strong>Steward &amp; Counter Alerts</strong><div style="font-size: 13px; font-weight: 400; color: #6E6157;">When an order moves to Ready, the assigned steward gets a buzz and the customer gets an SMS.</div></div>
          </li>
        </ul>
      </div>

      <div style="position: relative; border-radius: 22px; overflow: hidden; aspect-ratio: 4 / 3; box-shadow: var(--shadow-md); border: 1px solid rgba(135,96,57,0.16);">
        <img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?w=900&auto=format&fit=crop&q=80" alt="Synchronised kitchen pass and dining service" style="width: 100%; height: 100%; object-fit: cover; display: block;" loading="lazy">
        <div style="position: absolute; inset: 0; background: linear-gradient(180deg, rgba(33,22,15,0.05) 35%, rgba(33,22,15,0.82) 100%);"></div>
        <div style="position: absolute; bottom: 20px; left: 20px; right: 20px; color: #fff;">
          <div style="font-size: 11px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; opacity: 0.85;">Single Source of Truth</div>
          <div style="font-family: 'Outfit', sans-serif; font-size: 20px; font-weight: 700; margin: 4px 0 12px;">Zero manual re-entry between POS, Kitchen &amp; Aggregators</div>
          <a href="{{ route('restaurant_signup') }}" class="btn p" style="padding: 10px 20px; font-size: 13px;">See the Board in Action →</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= HOW IT WORKS (4-STEP PROGRESSION) ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd r">
      <div class="eb">HOW IT WORKS</div>
      <h2>From Order Placed to Order <span class="sf">Delivered — in 4 Steps.</span></h2>
      <p>A simple, automated flow that keeps your kitchen and front-of-house perfectly synchronised without any extra effort from your team.</p>
    </div>

    <div class="rm-prog-grid r">
      <div class="rm-prog-card active">
        <div class="rm-prog-num">1</div>
        <h5>Order Arrives</h5>
        <p>A new order — whether placed by a waiter, at the counter, or pulled in from Swiggy/Zomato — instantly appears in the Incoming column with full details.</p>
      </div>

      <div class="rm-prog-card active">
        <div class="rm-prog-num">2</div>
        <h5>KOT Fires to Kitchen</h5>
        <p>With one tap, the KOT is accepted and printed at the relevant kitchen station. A prep timer starts immediately so the team knows the SLA.</p>
      </div>

      <div class="rm-prog-card active">
        <div class="rm-prog-num">3</div>
        <h5>Kitchen Prepares</h5>
        <p>The order moves to Preparing. The timer counts up, turning amber at 70% of the SLA window — alerting the kitchen before it's too late.</p>
      </div>

      <div class="rm-prog-card">
        <div class="rm-prog-num">4</div>
        <h5>Ready &amp; Delivered</h5>
        <p>Kitchen marks it Ready. The steward gets a buzz, the takeaway customer gets an SMS, and the order card moves to the Ready column for confirmation.</p>
      </div>
    </div>
  </div>
</section>

<!-- ================= FEATURES (6 EDITORIAL IMAGE CARDS) ================= -->
<section>
  <div class="w">
    <div class="hd r">
      <div class="eb">FEATURES</div>
      <h2>Everything You Need to <span class="sf">Never Miss an Order.</span></h2>
      <p>Geni Menu's order management packs every tool your team needs into one clean, fast interface — no training manual required.</p>
    </div>

    <div class="rm-ind-grid r">
      <div class="rm-ind-card">
        <div class="rm-ind-media">
          <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=600&auto=format&fit=crop&q=80" alt="Live Order Status Board" loading="lazy">
          <div class="rm-ind-scrim"></div>
          <span class="rm-ind-badge">01</span>
        </div>
        <div class="rm-ind-body">
          <h4><svg class="gm-theme-icon" viewBox="0 0 24 24"><rect width="8" height="4" x="8" y="2" rx="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/></svg> Live Order Status Board</h4>
          <p>Track every order from receipt to delivery on one live Kanban board. Incoming, Preparing, and Ready columns give your whole team instant clarity — no radio calls, no guesswork.</p>
        </div>
      </div>

      <div class="rm-ind-card">
        <div class="rm-ind-media">
          <img src="https://images.unsplash.com/photo-1526367790999-0150786686a2?w=600&auto=format&fit=crop&q=80" alt="Multi-Channel Aggregation" loading="lazy">
          <div class="rm-ind-scrim"></div>
          <span class="rm-ind-badge">02</span>
        </div>
        <div class="rm-ind-body">
          <h4><svg class="gm-theme-icon" viewBox="0 0 24 24"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg> Multi-Channel Aggregation</h4>
          <p>Dine-in tables, takeaway counter, and online delivery platforms (Swiggy, Zomato, your own site) all feed into one unified queue. Eliminate the chaos of juggling separate tablets.</p>
        </div>
      </div>

      <div class="rm-ind-card">
        <div class="rm-ind-media">
          <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=600&auto=format&fit=crop&q=80" alt="Prep Timer Alerts" loading="lazy">
          <div class="rm-ind-scrim"></div>
          <span class="rm-ind-badge">03</span>
        </div>
        <div class="rm-ind-body">
          <h4><svg class="gm-theme-icon" viewBox="0 0 24 24"><circle cx="12" cy="13" r="8"/><path d="M12 9v4l2 2"/><path d="M10 2h4"/></svg> Prep Timer Alerts</h4>
          <p>Every order gets a configurable SLA timer. Colour shifts from green to amber when 70% of prep time has elapsed — so the kitchen acts before a customer complaint happens.</p>
        </div>
      </div>

      <div class="rm-ind-card">
        <div class="rm-ind-media">
          <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=600&auto=format&fit=crop&q=80" alt="Modify Orders Mid-Flow" loading="lazy">
          <div class="rm-ind-scrim"></div>
          <span class="rm-ind-badge">04</span>
        </div>
        <div class="rm-ind-body">
          <h4><svg class="gm-theme-icon" viewBox="0 0 24 24"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/></svg> Modify Orders Mid-Flow</h4>
          <p>Guests change their minds. Add a dish, remove an ingredient, or substitute an item even after the KOT is dispatched. The kitchen sees the update immediately — no confusion.</p>
        </div>
      </div>

      <div class="rm-ind-card">
        <div class="rm-ind-media">
          <img src="https://images.unsplash.com/photo-1554118811-1e0d58224f24?w=600&auto=format&fit=crop&q=80" alt="Token & Queue Management" loading="lazy">
          <div class="rm-ind-scrim"></div>
          <span class="rm-ind-badge">05</span>
        </div>
        <div class="rm-ind-body">
          <h4><svg class="gm-theme-icon" viewBox="0 0 24 24"><path d="M2 9a3 3 0 0 1 0 6v2a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-2a3 3 0 0 1 0-6V7a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z"/></svg> Token &amp; Queue Management</h4>
          <p>Issue digital or printed counter tokens for takeaway customers. The board shows their token number, order status, and triggers a counter display announcement when ready.</p>
        </div>
      </div>

      <div class="rm-ind-card">
        <div class="rm-ind-media">
          <img src="https://images.unsplash.com/photo-1559339352-11d035aa65de?w=600&auto=format&fit=crop&q=80" alt="Customer Notification" loading="lazy">
          <div class="rm-ind-scrim"></div>
          <span class="rm-ind-badge">06</span>
        </div>
        <div class="rm-ind-body">
          <h4><svg class="gm-theme-icon" viewBox="0 0 24 24"><rect width="14" height="20" x="5" y="2" rx="2" ry="2"/><path d="M12 18h.01"/></svg> Customer Notification</h4>
          <p>When a takeaway or delivery order is marked Ready, an auto-SMS goes to the customer's phone instantly — reducing counter crowding and "is my order ready?" calls by over 60%.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= REAL RESULTS BANNER ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="om-metrics-banner r">
      <img src="https://images.unsplash.com/photo-1552566626-52f8b828add9?w=1200&auto=format&fit=crop&q=80" alt="Busy restaurant kitchen and floor" loading="lazy">
      <div class="om-metrics-scrim"></div>
      <div class="om-metrics-content">
        <div style="text-align: center; max-width: 640px; margin: 0 auto 36px;">
          <div class="eb" style="background: rgba(255,255,255,0.14); color: #fff; border-color: rgba(255,255,255,0.28);">REAL RESULTS</div>
          <h2 style="color: #FFFFFF; margin-bottom: 12px;">Numbers Restaurants <span class="sf" style="background: linear-gradient(135deg, #fff 0%, #f4efe9 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Actually See.</span></h2>
          <p style="color: rgba(255,255,255,0.82); font-size: 16px;">Measured across Geni Menu restaurants within 60 days of going live.</p>
        </div>

        <div class="rm-val-grid">
          <div class="om-metric-card">
            <div class="om-metric-num">94%</div>
            <div style="font-size: 14px; font-weight: 700; color: #FFFFFF;">Reduction in missed or delayed orders</div>
          </div>
          <div class="om-metric-card">
            <div class="om-metric-num">3.2×</div>
            <div style="font-size: 14px; font-weight: 700; color: #FFFFFF;">Faster order processing vs paper-based systems</div>
          </div>
          <div class="om-metric-card">
            <div class="om-metric-num">₹14k</div>
            <div style="font-size: 14px; font-weight: 700; color: #FFFFFF;">Saved monthly on order errors &amp; remakes</div>
          </div>
          <div class="om-metric-card">
            <div class="om-metric-num">62%</div>
            <div style="font-size: 14px; font-weight: 700; color: #FFFFFF;">Drop in "order not ready" customer complaints</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= COMPARE — BEFORE VS AFTER ================= -->
<style>
  .ord-cmp-wrap {
    position: relative;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 32px;
    align-items: stretch;
  }
  .ord-cmp-center-arrow {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    z-index: 20;
    pointer-events: none;
  }
  .ord-center-arrow-circle {
    width: 44px;
    height: 44px;
    border-radius: 50%;
    background: #876039;
    color: #FFFFFF;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 18px rgba(135, 96, 57, 0.4);
    border: 3px solid #FFFFFF;
  }
  .ord-center-arrow-circle svg { width: 20px; height: 20px; }

  .ord-cmp-card {
    border-radius: 24px;
    padding: 26px;
    position: relative;
    display: flex;
    flex-direction: column;
    box-sizing: border-box;
  }
  .ord-cmp-traditional {
    background: #FFFDFC;
    border: 1.5px solid #FECDD3;
    box-shadow: 0 10px 30px rgba(220, 38, 38, 0.04);
  }
  .ord-cmp-digital {
    background: #FFFFFF;
    border: 1.5px solid rgba(135, 96, 57, 0.28);
    box-shadow: 0 14px 40px rgba(135, 96, 57, 0.08);
  }
  .ord-cmp-header {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 22px;
  }
  .ord-badge-icon {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
  }
  .ord-badge-icon svg { width: 18px; height: 18px; }
  .ord-badge-red { background: #FEE2E2; color: #DC2626; }
  .ord-badge-brown { background: #6F4522; color: #FFFFFF; }

  .ord-cmp-title {
    font-family: 'Outfit', 'Plus Jakarta Sans', sans-serif;
    font-size: 19px;
    font-weight: 700;
    margin: 0 0 2px;
    line-height: 1.2;
  }
  .ord-cmp-title.text-red { color: #991B1B; }
  .ord-cmp-title.text-brown { color: #21160F; }
  .ord-cmp-subtitle { font-size: 12.5px; color: #76675D; margin: 0; }

  .ord-split-body {
    display: grid;
    grid-template-columns: 1fr 1.3fr;
    gap: 16px;
    align-items: stretch;
    flex: 1;
  }
  .ord-cmp-digital .ord-split-body {
    grid-template-columns: 1fr 1.05fr;
    gap: 14px;
  }

  .ord-paper-visual {
    background: #F8F4EE;
    border-radius: 16px;
    border: 1px solid #EADBCE;
    padding: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
  }
  .ord-paper-board {
    width: 100%;
    background: #845A3C;
    border-radius: 12px;
    padding: 10px 8px 8px;
    box-shadow: 0 6px 16px rgba(42, 24, 13, 0.2);
  }
  .ord-paper-clip {
    width: 32px;
    height: 8px;
    background: #C4B5A5;
    border-radius: 3px;
    margin: 0 auto 6px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25);
  }
  .ord-paper-sheet {
    background: #FFFDF9;
    border-radius: 6px;
    padding: 10px 8px;
    font-family: 'Plus Jakarta Sans', sans-serif;
    border: 1px solid #EBE1D3;
  }
  .ord-paper-header {
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
  .ord-paper-slot-title {
    font-size: 7.5px;
    font-weight: 700;
    color: #876039;
    letter-spacing: 0.6px;
    text-transform: uppercase;
    margin: 6px 0 3px;
  }
  .ord-paper-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 7.5px;
    color: #4A3E38;
    padding: 2.5px 0;
    border-bottom: 1px dashed #EDE4D8;
  }
  .ord-paper-row:last-child { border-bottom: none; }
  .ord-paper-row.struck span { text-decoration: line-through; color: #A89A90; }
  .ord-paper-row .err-tag { color: #DC2626; font-weight: 700; }

  .ord-points-list {
    display: flex;
    flex-direction: column;
    gap: 8px;
    justify-content: space-between;
  }
  .ord-point-card {
    background: #FFFFFF;
    border: 1px solid #FEE2E2;
    border-radius: 12px;
    padding: 9px 12px;
    display: flex;
    align-items: center;
    gap: 10px;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
  }
  .ord-point-card:hover {
    transform: translateX(2px);
    box-shadow: 0 4px 12px rgba(220, 38, 38, 0.08);
  }
  .ord-point-ico {
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
  .ord-point-ico svg { width: 15px; height: 15px; stroke: currentColor; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
  .ord-point-txt { display: flex; flex-direction: column; min-width: 0; }
  .ord-point-txt b { font-size: 13px; font-weight: 700; color: #21160F; line-height: 1.25; }
  .ord-point-txt span { font-size: 11px; color: #76675D; line-height: 1.3; }

  .ord-wf-steps {
    display: flex;
    flex-direction: column;
    justify-content: center;
    gap: 6px;
  }
  .ord-wf-card {
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
  .ord-wf-card:hover { transform: translateY(-2px); border-color: #876039; }
  .ord-wf-ico {
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
  .ord-wf-ico svg { width: 18px; height: 18px; stroke: currentColor; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
  .ord-wf-txt { display: flex; flex-direction: column; min-width: 0; }
  .ord-wf-txt b { font-size: 13px; font-weight: 600; color: #21160F; line-height: 1.25; }
  .ord-wf-txt span { font-size: 11.5px; color: #76675D; line-height: 1.3; }
  .ord-wf-arrow { text-align: center; font-size: 15px; font-weight: 500; color: #876039; line-height: 1; }

  .ord-phone-visual {
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .ord-phone-mockup {
    width: 100%;
    max-width: 224px;
    background: #1C1510;
    border-radius: 28px;
    padding: 7px;
    box-shadow: 0 16px 36px rgba(28, 20, 15, 0.28);
    border: 2px solid #362920;
  }
  .ord-phone-screen {
    background: #FFFFFF;
    border-radius: 22px;
    padding: 10px 9px 12px;
    overflow: hidden;
  }
  .ord-phone-island {
    width: 38px;
    height: 4px;
    background: #1C1510;
    border-radius: 4px;
    margin: 0 auto 6px;
  }
  .ord-phone-header { text-align: center; margin-bottom: 7px; }
  .ord-phone-title { font-family: 'Outfit', sans-serif; font-size: 13.5px; font-weight: 600; color: #21160F; line-height: 1.2; }
  .ord-phone-sub { font-size: 8px; color: #76675D; }
  .ord-phone-tabs {
    display: flex;
    gap: 3.5px;
    margin-bottom: 8px;
    justify-content: center;
  }
  .ord-tab-pill {
    font-size: 7.5px;
    font-weight: 700;
    padding: 2.5px 7px;
    border-radius: 12px;
    background: #FAF7F2;
    color: #6E6157;
    white-space: nowrap;
  }
  .ord-tab-active { background: #875A38; color: #FFFFFF; }
  .ord-live-list {
    display: flex;
    flex-direction: column;
    gap: 6px;
  }
  .ord-live-row {
    padding: 6px 7px;
    background: #FAF8F5;
    border: 1px solid #EFE8DE;
    border-radius: 9px;
    display: flex;
    flex-direction: column;
    gap: 3px;
  }
  .ord-lv-top {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 4px;
  }
  .ord-lv-name { font-size: 9.5px; font-weight: 700; color: #21160F; }
  .ord-lv-badge {
    font-size: 6.5px;
    font-weight: 700;
    padding: 1.5px 5px;
    border-radius: 4px;
  }
  .ord-lv-badge.prep { background: #FEF3C7; color: #B45309; }
  .ord-lv-badge.ready { background: #DCFCE7; color: #16A34A; }
  .ord-lv-badge.del { background: #DBEAFE; color: #1D4ED8; }
  .ord-lv-meta {
    display: flex;
    justify-content: space-between;
    font-size: 7.5px;
    color: #76675D;
  }
  .ord-lv-src { font-weight: 700; color: #876039; }

  .ord-bottom-cta {
    margin-top: 16px;
    display: flex;
    justify-content: center;
  }
  .ord-bottom-cta-badge {
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
  .ord-bottom-cta-badge svg { width: 14px; height: 14px; stroke: #FFFFFF; fill: none; stroke-width: 2; }

  @media (max-width: 1080px) {
    .ord-cmp-wrap { grid-template-columns: 1fr; gap: 36px; }
    .ord-cmp-center-arrow { display: none; }
  }
  @media (max-width: 640px) {
    .ord-split-body, .ord-cmp-digital .ord-split-body { grid-template-columns: 1fr; gap: 16px; }
    .ord-paper-visual { max-width: 260px; margin: 0 auto; }
  }
</style>

<section>
  <div class="w">
    <div class="hd r">
      <div class="eb">BEFORE VS AFTER</div>
      <h2>Running Orders <span class="sf">the Hard Way</span> vs the Geni Way.</h2>
      <p>Most restaurants are still managing multi-channel orders through shouting, paper slips, and separate third-party tablets. Here's what changes.</p>
    </div>

    <div class="ord-cmp-wrap r">
      <div class="ord-cmp-center-arrow">
        <div class="ord-center-arrow-circle">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <line x1="5" y1="12" x2="19" y2="12"></line>
            <polyline points="12 5 19 12 12 19"></polyline>
          </svg>
        </div>
      </div>

      <!-- LEFT CARD: Without Geni Menu -->
      <div class="ord-cmp-card ord-cmp-traditional">
        <div class="ord-cmp-header">
          <div class="ord-badge-icon ord-badge-red">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
              <line x1="18" y1="6" x2="6" y2="18"></line>
              <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
          </div>
          <div>
            <h3 class="ord-cmp-title text-red">Without Geni Menu</h3>
            <p class="ord-cmp-subtitle">Paper KOTs, beeping tablets and kitchen confusion</p>
          </div>
        </div>

        <div class="ord-split-body">
          <div class="ord-paper-visual">
            <div class="ord-paper-board">
              <div class="ord-paper-clip"></div>
              <div class="ord-paper-sheet">
                <div class="ord-paper-header">ORDER SLIPS</div>
                <div class="ord-paper-slot-title">Online Tablets</div>
                <div class="ord-paper-row"><span>Swiggy #401</span><span class="err-tag">Beep!</span></div>
                <div class="ord-paper-row"><span>Zomato #218</span><span class="err-tag">Missed</span></div>
                <div class="ord-paper-slot-title">Kitchen Pass</div>
                <div class="ord-paper-row struck"><span>T-05 KOT</span><b>Lost!</b></div>
                <div class="ord-paper-row"><span>Edit #109</span><span class="err-tag">Wrong!</span></div>
                <div class="ord-paper-slot-title">Counter</div>
                <div class="ord-paper-row"><span>Takeaway</span><b>Waiting</b></div>
              </div>
            </div>
          </div>

          <div class="ord-points-list">
            <div class="ord-point-card">
              <div class="ord-point-ico">
                <svg viewBox="0 0 24 24"><rect width="14" height="20" x="5" y="2" rx="2" ry="2"/><path d="M12 18h.01"/></svg>
              </div>
              <div class="ord-point-txt">
                <b>3 Separate Beeping Tablets</b>
                <span>Swiggy, Zomato &amp; website ringing at once</span>
              </div>
            </div>

            <div class="ord-point-card">
              <div class="ord-point-ico">
                <svg viewBox="0 0 24 24"><path d="M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1Z"/></svg>
              </div>
              <div class="ord-point-txt">
                <b>Handwritten KOTs Lost</b>
                <span>Slips misplaced between waiter &amp; kitchen</span>
              </div>
            </div>

            <div class="ord-point-card">
              <div class="ord-point-ico">
                <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
              </div>
              <div class="ord-point-txt">
                <b>No Prep Time Visibility</b>
                <span>No idea how long orders sit in the kitchen</span>
              </div>
            </div>

            <div class="ord-point-card">
              <div class="ord-point-ico">
                <svg viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/></svg>
              </div>
              <div class="ord-point-txt">
                <b>Takeaway Counter Crowds</b>
                <span>Guests waiting with zero pickup updates</span>
              </div>
            </div>

            <div class="ord-point-card">
              <div class="ord-point-ico">
                <svg viewBox="0 0 24 24"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"/><path d="M12 9v4"/><path d="M12 17h.01"/></svg>
              </div>
              <div class="ord-point-txt">
                <b>Confusing Mid-Flow Edits</b>
                <span>Kitchen prepares outdated order versions</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- RIGHT CARD: With Geni Menu -->
      <div class="ord-cmp-card ord-cmp-digital">
        <div class="ord-cmp-header">
          <div class="ord-badge-icon ord-badge-brown">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
              <polyline points="20 6 9 17 4 12"></polyline>
            </svg>
          </div>
          <div>
            <h3 class="ord-cmp-title text-brown">With Geni Menu</h3>
            <p class="ord-cmp-subtitle">Unified Kanban pipeline, instant KOTs &amp; live alerts</p>
          </div>
        </div>

        <div class="ord-split-body">
          <div class="ord-wf-steps">
            <div class="ord-wf-card">
              <div class="ord-wf-ico">
                <svg viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>
              </div>
              <div class="ord-wf-txt">
                <b>All Channels in One Board</b>
                <span>Dine-in, takeaway, Swiggy &amp; Zomato unified</span>
              </div>
            </div>

            <div class="ord-wf-arrow">&darr;</div>

            <div class="ord-wf-card">
              <div class="ord-wf-ico">
                <svg viewBox="0 0 24 24"><path d="M6 13.87A4 4 0 0 1 7.41 6a5.11 5.11 0 0 1 1.05-1.54 5 5 0 0 1 7.08 0A5.11 5.11 0 0 1 16.59 6 4 4 0 0 1 18 13.87V21H6Z"/><line x1="6" x2="18" y1="17" y2="17"/></svg>
              </div>
              <div class="ord-wf-txt">
                <b>Instant Digital KOT &amp; Timers</b>
                <span>Live edits + amber SLA prep alerts</span>
              </div>
            </div>

            <div class="ord-wf-arrow">&darr;</div>

            <div class="ord-wf-card">
              <div class="ord-wf-ico">
                <svg viewBox="0 0 24 24"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/></svg>
              </div>
              <div class="ord-wf-txt">
                <b>Auto-Alerts &amp; Mobile View</b>
                <span>Ready SMS to guests + live manager phone</span>
              </div>
            </div>
          </div>

          <div class="ord-phone-visual">
            <div class="ord-phone-mockup">
              <div class="ord-phone-screen">
                <div class="ord-phone-island"></div>
                <div class="ord-phone-header">
                  <div class="ord-phone-title">Live Orders</div>
                  <div class="ord-phone-sub">All channels in one pipeline</div>
                </div>
                <div class="ord-phone-tabs">
                  <span class="ord-tab-pill ord-tab-active">All</span>
                  <span class="ord-tab-pill">Prep</span>
                  <span class="ord-tab-pill">Ready</span>
                </div>
                <div class="ord-live-list">
                  <div class="ord-live-row">
                    <div class="ord-lv-top">
                      <span class="ord-lv-name">Order #1240</span>
                      <span class="ord-lv-badge prep">Prep 6m</span>
                    </div>
                    <div class="ord-lv-meta">
                      <span>3 Items &bull; ₹740</span>
                      <span class="ord-lv-src">Table 04</span>
                    </div>
                  </div>

                  <div class="ord-live-row">
                    <div class="ord-lv-top">
                      <span class="ord-lv-name">Order #1241</span>
                      <span class="ord-lv-badge ready">Ready</span>
                    </div>
                    <div class="ord-lv-meta">
                      <span>2 Items &bull; ₹310</span>
                      <span class="ord-lv-src">Takeaway</span>
                    </div>
                  </div>

                  <div class="ord-live-row">
                    <div class="ord-lv-top">
                      <span class="ord-lv-name">Order #1242</span>
                      <span class="ord-lv-badge del">Dispatched</span>
                    </div>
                    <div class="ord-lv-meta">
                      <span>4 Items &bull; ₹920</span>
                      <span class="ord-lv-src">Zomato</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="ord-bottom-cta">
          <div class="ord-bottom-cta-badge">
            <svg viewBox="0 0 24 24"><path d="m12 3-1.9 5.8a2 2 0 0 1-1.3 1.3L3 12l5.8 1.9a2 2 0 0 1 1.3 1.3L12 21l1.9-5.8a2 2 0 0 1 1.3-1.3L21 12l-5.8-1.9a2 2 0 0 1-1.3-1.3L12 3Z"/></svg>
            <span>One Screen, One Team, One Workflow!</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= CONNECTED ECOSYSTEM & RELATED FEATURES ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd r">
      <div class="eb">RELATED FEATURES</div>
      <h2>Works Best With <span class="sf">These Tools.</span></h2>
      <p>Order Management connects every channel straight into your kitchen display, floor plan, and POS billing.</p>
    </div>

    <div class="rm-eco-grid r">
      <div class="rm-eco-step active">
        <span class="rm-eco-num">01</span>
        <img src="{{ asset('assets/images/workflow/step-2-order.png') }}" alt="Order Management" class="rm-eco-img">
        <div class="rm-eco-title">ORDERS</div>
      </div>
      <div class="rm-eco-step">
        <span class="rm-eco-num">02</span>
        <img src="{{ asset('assets/images/workflow/step-1-menu.png') }}" alt="Menu" class="rm-eco-img">
        <div class="rm-eco-title">MENU</div>
      </div>
      <div class="rm-eco-step">
        <span class="rm-eco-num">03</span>
        <img src="{{ asset('assets/images/workflow/step-3-kitchen.png') }}" alt="Kitchen KOT" class="rm-eco-img">
        <div class="rm-eco-title">KOT</div>
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

    <div class="om-cross-grid r">
      <a href="{{ route('features.kot-management') }}" class="om-cross-card">
        <div class="rm-val-ic">
          <svg viewBox="0 0 24 24"><polyline points="6 9 6 2 18 2 18 9"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect width="12" height="8" x="6" y="14"/></svg>
        </div>
        <div style="flex: 1;">
          <div style="font-family: 'Outfit', sans-serif; font-weight: 700; font-size: 16px; color: #21160F; margin-bottom: 3px;">KOT Management</div>
          <div style="font-size: 13px; color: #6E6157;">Auto-print or display kitchen tickets the moment an order is accepted on the board.</div>
        </div>
        <span style="color: #876039; font-weight: 700; font-size: 18px;">→</span>
      </a>

      <a href="{{ route('features.pos-management') }}" class="om-cross-card">
        <div class="rm-val-ic">
          <svg viewBox="0 0 24 24"><path d="M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1Z"/><path d="M16 8h-6"/><path d="M16 12h-6"/></svg>
        </div>
        <div style="flex: 1;">
          <div style="font-family: 'Outfit', sans-serif; font-weight: 700; font-size: 16px; color: #21160F; margin-bottom: 3px;">POS &amp; Billing</div>
          <div style="font-size: 13px; color: #6E6157;">When an order is marked complete, billing flows straight into the POS — no double entry.</div>
        </div>
        <span style="color: #876039; font-weight: 700; font-size: 18px;">→</span>
      </a>

      <a href="{{ route('features.table-management') }}" class="om-cross-card">
        <div class="rm-val-ic">
          <svg viewBox="0 0 24 24"><polygon points="3 6 9 3 15 6 21 3 21 18 15 21 9 18 3 21"/><line x1="9" x2="9" y1="3" y2="18"/><line x1="15" x2="15" y1="6" y2="21"/></svg>
        </div>
        <div style="flex: 1;">
          <div style="font-family: 'Outfit', sans-serif; font-weight: 700; font-size: 16px; color: #21160F; margin-bottom: 3px;">Table Management</div>
          <div style="font-size: 13px; color: #6E6157;">See which tables have active orders on the floor plan, and link order status to table state.</div>
        </div>
        <span style="color: #876039; font-weight: 700; font-size: 18px;">→</span>
      </a>
    </div>
  </div>
</section>

<!-- ================= FAQ ================= -->
<section>
  <div class="w">
    <div class="hd r">
      <h2>Questions About <span class="sf">Order Management.</span></h2>
      <p>Everything you need to know about running unified multi-channel orders on Geni Menu.</p>
    </div>

    <div class="faq-list r">
      <div class="faq-item open">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>Does Geni Menu connect directly with Swiggy and Zomato?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Geni Menu integrates with Swiggy and Zomato via their official merchant APIs. When a customer places an order on either platform, it appears in your Geni Order Board within seconds — no manual entry, no separate tablet to monitor. You manage acceptance, rejection, and prep status directly from the board.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>Can I edit an order after the KOT has been sent to the kitchen?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Absolutely. You can add items, remove items, or substitute ingredients even after the KOT has been dispatched. The kitchen screen (KDS) or kitchen printer receives an instant update notification — clearly flagged as a modification so nothing gets confused with the original ticket.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>How do prep timers work, and can I set different SLAs per dish category?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Each order type (dine-in, takeaway, delivery) can have its own SLA target — for example, 15 minutes for dine-in and 12 minutes for delivery. When an order is accepted, the timer starts. At 70% elapsed, the card turns amber. At 100%, it turns red and a sound alert fires. You can also set category-level timers — so a dessert order has a shorter SLA than a main course.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>What devices can staff use to manage the order board?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          The Geni Order Board runs in any modern browser — Chrome, Safari, Edge — on tablets, phones, and desktops. Most restaurants use a wall-mounted tablet in the kitchen and a phone for the floor manager. No dedicated hardware is required. The interface is fully touch-optimised for smooth drag-and-drop on tablets.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>What happens if the internet goes down mid-service?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Geni Menu has an offline mode for core order functions. Orders already in the board remain visible and editable. New dine-in orders placed through the waiter app queue locally and sync the moment connectivity is restored. Online aggregator orders (Swiggy, Zomato) will auto-accept with a default message when offline, and sync to the board when connectivity returns.
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= FINAL CTA ================= -->
<section style="background: linear-gradient(135deg, #876039 0%, #6f4e2d 100%); color: #fff; text-align: center;">
  <div class="w r">
    <div class="eb" style="background: rgba(255,255,255,0.15); color: #fff; border-color: rgba(255,255,255,0.3);">
      GET STARTED TODAY
    </div>
    <h2 style="color: #fff; font-size: clamp(34px, 5vw, 54px);">
      Stop Losing Orders to<br>
      <span class="sf" style="background: linear-gradient(135deg, #fff 0%, #f4efe9 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Scattered Systems.</span>
    </h2>
    <p style="color: #f4efe9; max-width: 620px; margin: 20px auto 36px; font-size: 18px;">
      Join hundreds of restaurants that run their entire order pipeline — dine-in, takeaway and delivery — on one live board with Geni Menu.
    </p>

    <div style="display: flex; gap: 16px; justify-content: center; flex-wrap: wrap;">
      <a href="{{ route('restaurant_signup') }}" class="btn" style="background: #fff; color: var(--br); border-color: #fff; font-size: 16px; padding: 16px 36px; box-shadow: 0 8px 24px rgba(0,0,0,0.2);">Start Free — No Card Needed →</a>
      <a href="{{ route('contact.us') }}" class="btn" style="background: transparent; color: #fff; border-color: rgba(255,255,255,0.5); font-size: 16px; padding: 16px 36px;">Book a Live Demo</a>
    </div>

    <div style="margin-top: 36px; font-size: 14px; color: #e5d8c8; font-weight: 600; display: flex; justify-content: center; gap: 24px; flex-wrap: wrap;">
      <span>✓ Free 14-day trial</span>
      <span>✓ No credit card required</span>
      <span>✓ Live onboarding support</span>
      <span>✓ Cancel anytime</span>
    </div>
  </div>
</section>

<script>
// Interactive Kanban Channel Filter
function filterOrderChannel(channel, btn) {
  document.querySelectorAll('.rm-filter-btn').forEach(b => b.classList.remove('active'));
  if (btn) btn.classList.add('active');
  document.querySelectorAll('#om-kanban-board .om-card').forEach(card => {
    const ch = card.getAttribute('data-channel');
    if (channel === 'all' || ch === channel) {
      card.style.display = '';
    } else {
      card.style.display = 'none';
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
