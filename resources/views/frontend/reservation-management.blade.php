@php
    $meta = [
        'title' => 'Reservation Management — Geni Menu | WeGeni',
        'description' => 'Manage restaurant reservations, guest details, table allocation and booking status from one simple dashboard with Geni Menu.',
        'keywords' => 'restaurant reservation software, table booking system, restaurant table allocation, guest reservation software, table status tracking, Geni Menu, WeGeni'
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

/* Cards & UI Windows */
.card { position: relative; overflow: hidden; background: var(--card); border: 1px solid var(--line); border-radius: 20px; box-shadow: var(--shadow-sm); transition: transform .3s ease, box-shadow .3s ease, border-color .3s ease; }
.card:hover { border-color: rgba(135, 96, 57, 0.38); box-shadow: var(--shadow-md); }

.ic { width: 46px; height: 46px; border-radius: 13px; background: var(--bg2); color: var(--br); display: grid; place-items: center; flex: none; border: 1px solid var(--line); transition: .3s ease; }
.ic svg { width: 22px; height: 22px; fill: none; stroke: currentColor; stroke-width: 1.8; stroke-linecap: round; stroke-linejoin: round; }
.card:hover .ic { background: var(--br); color: #fff; border-color: var(--br); }

/* Dashboard Window Mockup */
.win { background: #fff; color: #211D19; border: 1px solid var(--line); border-radius: 20px; overflow: hidden; box-shadow: var(--shadow-md); font-size: 13px; }
.wb { display: flex; align-items: center; justify-content: space-between; padding: 12px 18px; background: var(--bg2); border-bottom: 1px solid var(--line); flex-wrap: wrap; gap: 6px; }
.wb .dots { display: flex; gap: 6px; }
.wb i { width: 10px; height: 10px; border-radius: 50%; background: #d8c9b8; display: inline-block; }
.wb i:nth-child(1) { background: #ff5f56; }
.wb i:nth-child(2) { background: #ffbd2e; }
.wb i:nth-child(3) { background: #27c93f; }
.wb .ttl { color: var(--br); font-weight: 500; font-family: 'Outfit', sans-serif; letter-spacing: 0.05em; font-size: 13px; text-transform: uppercase; }

/* Status Badges */
.badge { font-size: 11px; font-weight: 500; padding: 4px 10px; border-radius: 8px; text-transform: uppercase; display: inline-block; }
.badge.confirmed { background: #d1fae5; color: #065f46; }
.badge.pending { background: #fef3c7; color: #92400e; }
.badge.cancelled { background: #fee2e2; color: #991b1b; }
.badge.seated { background: #dbeafe; color: #1e40af; }

/* Timeline Component */
.timeline { display: flex; justify-content: space-between; position: relative; margin: 40px 0; }
.timeline::before { content: ""; position: absolute; top: 20px; left: 0; right: 0; height: 3px; background: var(--line); z-index: 0; }
.t-step { position: relative; z-index: 1; text-align: center; background: #fff; padding: 0 10px; }
.t-icon { width: 42px; height: 42px; border-radius: 50%; background: var(--bg2); border: 2px solid var(--br); color: var(--br); display: grid; place-items: center; margin: 0 auto 10px; font-weight: 500; font-size: 14px; transition: .3s; }
.t-step.active .t-icon { background: var(--br); color: #fff; box-shadow: 0 4px 12px rgba(135,96,57,0.3); }
.t-step h5 { font-size: 14px; font-weight: 700; color: var(--ink); margin: 0 0 2px; }
.t-step p { font-size: 12px; color: var(--mute); }

/* Industry Grid */
.ind-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }
.ind-card { border-radius: 18px; overflow: hidden; background: #fff; border: 1px solid var(--line); transition: transform .3s, box-shadow .3s; position: relative; }
.ind-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-md); border-color: rgba(135,96,57,0.3); }
.ind-img { height: 180px; background-size: cover; background-position: center; position: relative; }
.ind-overlay { position: absolute; inset: 0; background: linear-gradient(180deg, transparent 40%, rgba(36, 26, 20, 0.85) 100%); }
.ind-content { padding: 20px; }
.ind-content h4 { font-size: 18px; margin-bottom: 6px; display: flex; align-items: center; gap: 8px; }

/* FAQ Accordion */
.faq-list { max-width: 840px; margin: 0 auto; display: flex; flex-direction: column; gap: 14px; }
.faq-item { background: #fff; border: 1px solid var(--line); border-radius: 16px; overflow: hidden; transition: border-color .2s; }
.faq-item.open { border-color: var(--br); }
.faq-q { padding: 20px 24px; font-size: 17px; font-weight: 700; color: var(--ink); cursor: pointer; display: flex; justify-content: space-between; align-items: center; user-select: none; }
.faq-q svg { width: 20px; height: 20px; transition: transform .3s; stroke: var(--br); }
.faq-item.open .faq-q svg { transform: rotate(180deg); }
.faq-a { padding: 0 24px 20px; font-size: 15px; color: var(--mute); display: none; line-height: 1.65; border-top: 1px solid rgba(135,96,57,0.08); padding-top: 16px; }
.faq-item.open .faq-a { display: block; }

/* Reveal Animations */
.r { opacity: 0; transform: translateY(24px); transition: opacity .6s cubic-bezier(0.16, 1, 0.3, 1), transform .6s cubic-bezier(0.16, 1, 0.3, 1); }
.r.in { opacity: 1; transform: none; }

/* Responsive adjustments */
@media (max-width: 1024px) {
  .hero-split { grid-template-columns: 1fr; gap: 32px; }
  .ind-grid { grid-template-columns: repeat(2, 1fr); }
  .timeline { flex-direction: column; gap: 20px; }
  .timeline::before { display: none; }
  .t-step { text-align: left; display: flex; align-items: center; gap: 16px; }
  .t-icon { margin: 0; }
}
@media (max-width: 768px) {
  .bc { padding: 14px 0 14px; }
  .w { padding: 0 16px; }
  .ind-grid { grid-template-columns: 1fr; }
  .win { min-width: 0 !important; width: 100%; overflow-x: auto; }
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
    <span>Reservation Management</span>
  </div>
</div>

<!-- ================= RM REDESIGNED SECTIONS STYLES ================= -->
<style>
  /* Hero Split */
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

  /* Console Table */
  .rm-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 13.5px;
    text-align: left;
  }
  .rm-table th {
    padding: 12px 14px;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.06em;
    text-transform: uppercase;
    color: #76675D;
    border-bottom: 1.5px solid rgba(135, 96, 57, 0.14);
    background: #FAF8F5;
  }
  .rm-table td {
    padding: 14px;
    border-bottom: 1px solid rgba(135, 96, 57, 0.10);
    color: #4A3D34;
    vertical-align: middle;
  }
  .rm-table tbody tr:last-child td { border-bottom: 0; }
  .rm-table tbody tr:hover { background: #FDFBF8; }
  .rm-avatar {
    width: 34px;
    height: 34px;
    border-radius: 50%;
    background: #F3E8DC;
    color: #876039;
    font-weight: 700;
    font-size: 12px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
  }

  /* Floor Plan Grid */
  .rm-floor-grid {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 16px;
  }
  .rm-table-tile {
    padding: 20px 14px;
    border-radius: 16px;
    text-align: center;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
  }
  .rm-table-tile:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 24px rgba(33, 22, 15, 0.08);
  }

  /* Status Progression Steps */
  .rm-prog-grid {
    display: grid;
    grid-template-columns: repeat(6, 1fr);
    gap: 14px;
  }
  .rm-prog-card {
    background: #FFFFFF;
    border: 1px solid rgba(135, 96, 57, 0.14);
    border-radius: 18px;
    padding: 20px 14px;
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
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin: 0 auto 12px;
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
    font-size: 14.5px;
    font-weight: 700;
    color: #21160F;
    margin: 0 0 4px;
  }
  .rm-prog-card p {
    font-size: 12px;
    color: #76675D;
    margin: 0;
  }

  /* Split Experience Visual Cards */
  .rm-exp-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 28px;
  }
  .rm-exp-card {
    background: #FFFFFF;
    border: 1px solid rgba(135, 96, 57, 0.16);
    border-radius: 22px;
    overflow: hidden;
    box-shadow: 0 12px 32px rgba(33, 22, 15, 0.06);
  }
  .rm-exp-card.featured {
    border: 1.5px solid #876039;
    box-shadow: 0 16px 40px rgba(135, 96, 57, 0.12);
  }
  .rm-exp-banner {
    height: 150px;
    position: relative;
    overflow: hidden;
  }
  .rm-exp-banner img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
  .rm-exp-banner-scrim {
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, rgba(33, 22, 15, 0.15) 0%, rgba(33, 22, 15, 0.72) 100%);
  }
  .rm-exp-banner-title {
    position: absolute;
    bottom: 14px;
    left: 20px;
    color: #FFFFFF;
    font-family: 'Outfit', sans-serif;
    font-size: 17px;
    font-weight: 700;
    letter-spacing: 0.06em;
    margin: 0;
  }
  .rm-exp-body {
    padding: 24px;
    display: flex;
    flex-direction: column;
    gap: 10px;
  }

  /* Industry Cards Upgrade */
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
    height: 185px;
    position: relative;
    overflow: hidden;
  }
  .rm-ind-media img {
    width: 100%;
    height: 100%;
    object-fit: cover;
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

  /* 7-Step Ecosystem Flow */
  .rm-eco-grid {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 14px;
    margin-bottom: 52px;
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

  /* 6 Benefits 3x2 Grid */
  .rm-ben-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 22px;
  }
  .rm-ben-card {
    background: #FFFFFF;
    border: 1px solid rgba(135, 96, 57, 0.14);
    border-radius: 20px;
    padding: 26px 24px;
    box-shadow: 0 6px 20px rgba(33, 22, 15, 0.03);
    transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
  }
  .rm-ben-card:hover {
    transform: translateY(-5px);
    border-color: rgba(135, 96, 57, 0.36);
    box-shadow: 0 16px 36px rgba(135, 96, 57, 0.10);
  }
  .rm-ben-card h3 {
    font-family: 'Outfit', 'Plus Jakarta Sans', sans-serif;
    font-size: 19px;
    font-weight: 700;
    color: #21160F;
    margin: 0 0 8px;
  }
  .rm-ben-card p {
    font-size: 14px;
    line-height: 1.6;
    color: #6E6157;
    margin: 0;
  }

  @media (max-width: 1100px) {
    .rm-val-grid { grid-template-columns: repeat(2, 1fr); }
    .rm-floor-grid { grid-template-columns: repeat(3, 1fr); }
    .rm-prog-grid { grid-template-columns: repeat(3, 1fr); }
    .rm-eco-grid { grid-template-columns: repeat(4, 1fr); }
    .rm-ind-grid, .rm-ben-grid { grid-template-columns: repeat(2, 1fr); }
  }
  @media (max-width: 900px) {
    .rm-hero-grid, .rm-split, .rm-exp-grid { grid-template-columns: 1fr; gap: 32px; }
  }
  @media (max-width: 600px) {
    .rm-val-grid, .rm-floor-grid, .rm-prog-grid, .rm-ind-grid, .rm-ben-grid { grid-template-columns: 1fr; }
    .rm-eco-grid { grid-template-columns: repeat(2, 1fr); }
  }
</style>

<!-- ================= SECTION 4: HERO SECTION ================= -->
<section style="background: linear-gradient(180deg, var(--bg2) 0%, #ffffff 100%);">
  <div class="w">
    <div class="rm-hero-grid">
      <!-- Hero Left Copy -->
      <div class="r in">
        <div class="eb">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M16 2v4M8 2v4M3 10h18M5 4h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2z"/></svg>
          RESERVATION MANAGEMENT
        </div>
        <h1>Manage Every Reservation.<br><span class="sf">Keep Every Table Ready.</span></h1>
        <p style="margin: 20px 0 32px; font-size: 18px; max-width: 530px;">
          Manage reservations, guest details, table allocation and booking status from one simple dashboard. Give your team a clear view of what's booked, what's available and who's arriving next.
        </p>
        <div style="display: flex; gap: 14px; flex-wrap: wrap;">
          <a href="{{ route('restaurant_signup') }}" class="btn p">Get Started →</a>
          <a href="{{ route('contact.us') }}" class="btn o">Book a Demo</a>
        </div>
        <div style="margin-top: 28px; font-size: 14px; color: var(--mute); font-weight: 600; display: flex; align-items: center; gap: 16px; flex-wrap: wrap;">
          <span>✓ Real-time Table Status</span>
          <span>✓ Zero Booking Overlaps</span>
        </div>
      </div>

      <!-- Hero Visual: Editorial Hospitality Photo + Live Reservation Card -->
      <div class="r in" style="transition-delay: 0.15s; position: relative; display: flex; justify-content: center;">
        <div style="position: relative; width: 100%; max-width: 610px; border-radius: 26px; overflow: hidden; box-shadow: 0 28px 64px rgba(33, 22, 15, 0.16), 0 6px 20px rgba(135, 96, 57, 0.10); border: 1px solid rgba(135, 96, 57, 0.16);">
          <img
            src="{{ asset('assets/images/reservation-management-hero.jpg') }}"
            alt="Restaurant host managing live table reservations with Geni Menu"
            style="width: 100%; height: auto; display: block; object-fit: cover;"
            loading="eager"
          />
          <div style="position: absolute; inset: 0; background: linear-gradient(180deg, rgba(33,22,15,0.08) 0%, rgba(33,22,15,0) 45%, rgba(33,22,15,0.48) 100%); pointer-events: none;"></div>

          <!-- Top-Left Live Status Pill -->
          <div style="position: absolute; top: 18px; left: 18px; display: inline-flex; align-items: center; gap: 8px; padding: 8px 14px; border-radius: 999px; background: rgba(255, 255, 255, 0.94); backdrop-filter: blur(10px); box-shadow: 0 8px 20px rgba(0,0,0,0.14); font-size: 12px; font-weight: 700; color: #21160F;">
            <span style="width: 8px; height: 8px; border-radius: 50%; background: #16A34A; box-shadow: 0 0 0 3px rgba(22,163,74,0.22);"></span>
            Today • 12 Available • 8 Reserved
          </div>

          <!-- Floating Notification Card (Original Content Preserved) -->
          <div style="position: absolute; bottom: 18px; left: 18px; right: 18px; background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(12px); border: 1px solid rgba(135, 96, 57, 0.25); border-radius: 16px; padding: 12px 16px; box-shadow: 0 12px 28px rgba(0,0,0,0.18); display: flex; justify-content: space-between; align-items: center; gap: 12px; flex-wrap: wrap;">
            <div style="display: flex; align-items: center; gap: 12px;">
              <div style="width: 38px; height: 38px; border-radius: 11px; background: #F6EFE7; color: #876039; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                <svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/></svg>
              </div>
              <div>
                <div style="font-size: 10px; font-weight: 700; color: #876039; letter-spacing: 0.06em;">NEW RESERVATION</div>
                <div style="font-weight: 700; font-size: 13.5px; color: #21160F;">Rahul Kumar • 4 Guests</div>
                <div style="font-size: 11.5px; color: #6E6157;">7:30 PM • Table T12</div>
              </div>
            </div>
            <span style="background: #876039; color: #fff; padding: 7px 14px; border-radius: 9px; font-weight: 700; font-size: 12px;">Confirm →</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 6: VALUE STRIP ================= -->
<section style="padding: 46px 0; background: var(--bg2); border-top: 1px solid var(--line); border-bottom: 1px solid var(--line);">
  <div class="w">
    <div class="rm-val-grid r in">
      <div class="rm-val-card">
        <div class="rm-val-top">
          <div class="rm-val-ic">
            <svg viewBox="0 0 24 24"><path d="M16 2v4M8 2v4M3 10h18M5 4h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2z"/></svg>
          </div>
          <span class="rm-val-num">01</span>
        </div>
        <h4>One Reservation View</h4>
        <p>See upcoming bookings from one place.</p>
      </div>

      <div class="rm-val-card">
        <div class="rm-val-top">
          <div class="rm-val-ic">
            <svg viewBox="0 0 24 24"><rect x="3" y="8" width="18" height="4" rx="1"/><path d="M6 12v7M18 12v7"/></svg>
          </div>
          <span class="rm-val-num">02</span>
        </div>
        <h4>Faster Table Allocation</h4>
        <p>Assign suitable tables quickly.</p>
      </div>

      <div class="rm-val-card">
        <div class="rm-val-top">
          <div class="rm-val-ic">
            <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
          </div>
          <span class="rm-val-num">03</span>
        </div>
        <h4>Better Preparation</h4>
        <p>Know who's arriving and when.</p>
      </div>

      <div class="rm-val-card">
        <div class="rm-val-top">
          <div class="rm-val-ic">
            <svg viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
          </div>
          <span class="rm-val-num">04</span>
        </div>
        <h4>Smoother Service</h4>
        <p>Keep your team prepared before guests arrive.</p>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 7: PROBLEM SECTION ================= -->
<style>
  /* --- Comparison Section: Manual Register vs Geni Menu Smart Reservations (matching Menu Management UI) --- */
  .res-compare-container {
    position: relative;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 32px;
    align-items: stretch;
  }

  .res-compare-center-arrow {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    z-index: 20;
    pointer-events: none;
  }

  .res-center-arrow-circle {
    width: 44px;
    height: 44px;
    border-radius: 50%;
    background: var(--br);
    color: #FFFFFF;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 18px rgba(135, 96, 57, 0.4);
    border: 3px solid #FFFFFF;
  }

  .res-center-arrow-circle svg {
    width: 20px;
    height: 20px;
  }

  .res-compare-card {
    border-radius: 24px;
    padding: 26px;
    position: relative;
    display: flex;
    flex-direction: column;
    box-sizing: border-box;
  }

  .res-compare-traditional {
    background: #FFFDFC;
    border: 1.5px solid #FECDD3;
    box-shadow: 0 10px 30px rgba(220, 38, 38, 0.04);
  }

  .res-compare-digital {
    background: #FFFFFF;
    border: 1.5px solid rgba(135, 96, 57, 0.28);
    box-shadow: 0 14px 40px rgba(135, 96, 57, 0.08);
  }

  .res-compare-header {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 22px;
  }

  .res-badge-icon {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
  }

  .res-badge-icon svg {
    width: 18px;
    height: 18px;
  }

  .res-badge-red { background: #FEE2E2; color: #DC2626; }
  .res-badge-brown { background: #6F4522; color: #FFFFFF; }

  .res-compare-title {
    font-family: 'Outfit', 'Plus Jakarta Sans', sans-serif;
    font-size: 19px;
    font-weight: 700;
    margin: 0 0 2px;
    line-height: 1.2;
  }
  .res-compare-title.text-red { color: #991B1B; }
  .res-compare-title.text-brown { color: #21160F; }

  .res-compare-subtitle {
    font-size: 12.5px;
    color: #76675D;
    margin: 0;
  }

  .res-split-body {
    display: grid;
    grid-template-columns: 1fr 1.3fr;
    gap: 16px;
    align-items: stretch;
    flex: 1;
  }

  .res-compare-digital .res-split-body {
    grid-template-columns: 1fr 1.05fr;
    gap: 14px;
  }

  /* Left: Handwritten Reservation Register Clipboard */
  .res-paper-visual {
    background: #F8F4EE;
    border-radius: 16px;
    border: 1px solid #EADBCE;
    padding: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    overflow: hidden;
  }

  .res-paper-board {
    width: 100%;
    background: #845A3C;
    border-radius: 12px;
    padding: 10px 8px 8px;
    box-shadow: 0 6px 16px rgba(42, 24, 13, 0.2);
  }

  .res-paper-clip {
    width: 32px;
    height: 8px;
    background: #C4B5A5;
    border-radius: 3px;
    margin: 0 auto 6px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25);
  }

  .res-paper-sheet {
    background: #FFFDF9;
    border-radius: 6px;
    padding: 10px 8px;
    font-family: 'Plus Jakarta Sans', sans-serif;
    border: 1px solid #EBE1D3;
  }

  .res-paper-header {
    font-family: 'Outfit', serif;
    font-weight: 600;
    font-size: 11px;
    letter-spacing: 1.5px;
    text-align: center;
    color: #2A1C14;
    border-bottom: 1.5px solid #2A1C14;
    padding-bottom: 4px;
    margin-bottom: 7px;
  }

  .res-paper-slot-title {
    font-size: 7.5px;
    font-weight: 700;
    color: #876039;
    letter-spacing: 0.6px;
    text-transform: uppercase;
    margin: 6px 0 3px;
  }

  .res-paper-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 7.5px;
    color: #4A3E38;
    padding: 2.5px 0;
    border-bottom: 1px dashed #EDE4D8;
  }
  .res-paper-row:last-child { border-bottom: none; }
  .res-paper-row.struck span { text-decoration: line-through; color: #A89A90; }
  .res-paper-row .err-tag { color: #DC2626; font-weight: 700; }

  /* 5 Traditional Pain Point Cards */
  .res-points-list {
    display: flex;
    flex-direction: column;
    gap: 8px;
    justify-content: space-between;
  }

  .res-point-card {
    background: #FFFFFF;
    border: 1px solid #FEE2E2;
    border-radius: 12px;
    padding: 9px 12px;
    display: flex;
    align-items: center;
    gap: 10px;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
  }
  .res-point-card:hover {
    transform: translateX(2px);
    box-shadow: 0 4px 12px rgba(220, 38, 38, 0.08);
  }

  .res-point-ico {
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
  .res-point-ico svg { width: 15px; height: 15px; stroke: currentColor; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }

  .res-point-txt { display: flex; flex-direction: column; min-width: 0; }
  .res-point-txt b { font-size: 13px; font-weight: 700; color: #21160F; line-height: 1.25; }
  .res-point-txt span { font-size: 11px; color: #76675D; line-height: 1.3; }

  /* Right Card: 3 Digital Workflow Steps */
  .res-wf-steps {
    display: flex;
    flex-direction: column;
    justify-content: center;
    gap: 6px;
  }

  .res-wf-card {
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
  .res-wf-card:hover { transform: translateY(-2px); border-color: #876039; }

  .res-wf-ico {
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
  .res-wf-ico svg { width: 18px; height: 18px; stroke: currentColor; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }

  .res-wf-txt { display: flex; flex-direction: column; min-width: 0; }
  .res-wf-txt b { font-size: 13px; font-weight: 600; color: #21160F; line-height: 1.25; }
  .res-wf-txt span { font-size: 11.5px; color: #76675D; line-height: 1.3; }

  .res-wf-arrow {
    text-align: center;
    font-size: 15px;
    font-weight: 500;
    color: #876039;
    line-height: 1;
  }

  /* Right Card: Smartphone Live Reservation Mockup */
  .res-phone-visual {
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .res-phone-mockup {
    width: 100%;
    max-width: 224px;
    background: #1C1510;
    border-radius: 28px;
    padding: 7px;
    box-shadow: 0 16px 36px rgba(28, 20, 15, 0.28);
    border: 2px solid #362920;
  }

  .res-phone-screen {
    background: #FFFFFF;
    border-radius: 22px;
    padding: 10px 9px 12px;
    overflow: hidden;
  }

  .res-phone-island {
    width: 38px;
    height: 4px;
    background: #1C1510;
    border-radius: 4px;
    margin: 0 auto 6px;
  }

  .res-phone-header { text-align: center; margin-bottom: 7px; }
  .res-phone-title { font-family: 'Outfit', sans-serif; font-size: 13.5px; font-weight: 600; color: #21160F; line-height: 1.2; }
  .res-phone-sub { font-size: 8px; color: #76675D; }

  .res-phone-tabs {
    display: flex;
    gap: 3.5px;
    margin-bottom: 8px;
    justify-content: center;
  }
  .res-tab-pill {
    font-size: 7.5px;
    font-weight: 700;
    padding: 2.5px 7px;
    border-radius: 12px;
    background: #FAF7F2;
    color: #6E6157;
    white-space: nowrap;
  }
  .res-tab-active { background: #875A38; color: #FFFFFF; }

  .res-booking-list {
    display: flex;
    flex-direction: column;
    gap: 6px;
  }

  .res-booking-row {
    padding: 6px 7px;
    background: #FAF8F5;
    border: 1px solid #EFE8DE;
    border-radius: 9px;
    display: flex;
    flex-direction: column;
    gap: 3px;
  }

  .res-bk-top {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 4px;
  }
  .res-bk-name { font-size: 9.5px; font-weight: 700; color: #21160F; }
  .res-bk-badge {
    font-size: 6.5px;
    font-weight: 700;
    padding: 1.5px 5px;
    border-radius: 4px;
  }
  .res-bk-badge.ok { background: #DCFCE7; color: #16A34A; }
  .res-bk-badge.seated { background: #DBEAFE; color: #1D4ED8; }
  .res-bk-badge.vip { background: #FEF3C7; color: #B45309; }

  .res-bk-meta {
    display: flex;
    justify-content: space-between;
    font-size: 7.5px;
    color: #76675D;
  }
  .res-bk-tbl { font-weight: 700; color: #876039; }

  /* Bottom Pill CTA */
  .res-bottom-cta {
    margin-top: 16px;
    display: flex;
    justify-content: center;
  }

  .res-bottom-cta-badge {
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
  .res-bottom-cta-badge svg {
    width: 14px;
    height: 14px;
    stroke: #FFFFFF;
    fill: none;
    stroke-width: 2;
  }

  @media (max-width: 1080px) {
    .res-compare-container {
      grid-template-columns: 1fr;
      gap: 36px;
    }
    .res-compare-center-arrow {
      display: none;
    }
  }

  @media (max-width: 640px) {
    .res-split-body,
    .res-compare-digital .res-split-body {
      grid-template-columns: 1fr;
      gap: 16px;
    }
    .res-paper-visual {
      max-width: 260px;
      margin: 0 auto;
    }
  }
</style>

<section>
  <div class="w">
    <div class="hd r">
      <h2>Reservations Shouldn't Be a <span class="sf">Guessing Game.</span></h2>
      <p>
        Restaurants deal with phone bookings, walk-ins, last-minute changes, table availability and busy service periods every day. Geni Menu brings reservation information together in one clear workspace.
      </p>
    </div>

    <!-- Visual Comparison (Matching Menu Management UI) -->
    <div class="res-compare-container">
      <!-- Center Transition Arrow -->
      <div class="res-compare-center-arrow">
        <div class="res-center-arrow-circle">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <line x1="5" y1="12" x2="19" y2="12"></line>
            <polyline points="12 5 19 12 12 19"></polyline>
          </svg>
        </div>
      </div>

      <!-- LEFT CARD: Manual Reservation Register -->
      <div class="res-compare-card res-compare-traditional">
        <div class="res-compare-header">
          <div class="res-badge-icon res-badge-red">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
              <line x1="18" y1="6" x2="6" y2="18"></line>
              <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
          </div>
          <div>
            <h3 class="res-compare-title text-red">Without Geni Menu</h3>
            <p class="res-compare-subtitle">Manual phone logs, guesswork and double bookings</p>
          </div>
        </div>

        <div class="res-split-body">
          <!-- Left: Handwritten Reservation Register Clipboard -->
          <div class="res-paper-visual">
            <div class="res-paper-board">
              <div class="res-paper-clip"></div>
              <div class="res-paper-sheet">
                <div class="res-paper-header">BOOKINGS</div>

                <div class="res-paper-slot-title">7:30 PM Slot</div>
                <div class="res-paper-row struck"><span>Ravi (4 pax)</span><b>T-04</b></div>
                <div class="res-paper-row"><span>Karthik (6)</span><span class="err-tag">T-04?</span></div>

                <div class="res-paper-slot-title">8:00 PM Slot</div>
                <div class="res-paper-row"><span>Ananya (2)</span><b>Wait?</b></div>
                <div class="res-paper-row struck"><span>Suresh (5)</span><b>Cancel</b></div>

                <div class="res-paper-slot-title">8:30 PM Slot</div>
                <div class="res-paper-row"><span>Deepak (4)</span><span class="err-tag">Overlap!</span></div>
                <div class="res-paper-row"><span>Walk-in (3)</span><b>No seat</b></div>
              </div>
            </div>
          </div>

          <!-- Right: 5 Pain Points -->
          <div class="res-points-list">
            <div class="res-point-card">
              <div class="res-point-ico">
                <svg viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
              </div>
              <div class="res-point-txt">
                <b>Phone Call Interruptions</b>
                <span>Missed calls during peak dinner rush</span>
              </div>
            </div>

            <div class="res-point-card">
              <div class="res-point-ico">
                <svg viewBox="0 0 24 24"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
              </div>
              <div class="res-point-txt">
                <b>Handwritten Notebook</b>
                <span>Messy entries with zero live team sync</span>
              </div>
            </div>

            <div class="res-point-card">
              <div class="res-point-ico">
                <svg viewBox="0 0 24 24"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
              </div>
              <div class="res-point-txt">
                <b>Walk Out to Check Tables</b>
                <span>Manually scanning the floor for free seats</span>
              </div>
            </div>

            <div class="res-point-card">
              <div class="res-point-ico">
                <svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
              </div>
              <div class="res-point-txt">
                <b>Ask Busy Waitstaff</b>
                <span>Disrupting floor service to check tables</span>
              </div>
            </div>

            <div class="res-point-card">
              <div class="res-point-ico">
                <svg viewBox="0 0 24 24"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"/><path d="M12 9v4"/><path d="M12 17h.01"/></svg>
              </div>
              <div class="res-point-txt">
                <b>Double Bookings &amp; Delays</b>
                <span>Overlapping slots frustrate waiting guests</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- RIGHT CARD: Geni Menu Smart Reservations -->
      <div class="res-compare-card res-compare-digital">
        <div class="res-compare-header">
          <div class="res-badge-icon res-badge-brown">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
              <polyline points="20 6 9 17 4 12"></polyline>
            </svg>
          </div>
          <div>
            <h3 class="res-compare-title text-brown">Geni Menu Smart Reservations</h3>
            <p class="res-compare-subtitle">Book, assign tables and sync your floor in real time</p>
          </div>
        </div>

        <div class="res-split-body">
          <!-- Left: 3 Connected Workflow Steps -->
          <div class="res-wf-steps">
            <div class="res-wf-card">
              <div class="res-wf-ico">
                <svg viewBox="0 0 24 24"><rect width="14" height="20" x="5" y="2" rx="2" ry="2"/><path d="M12 18h.01"/></svg>
              </div>
              <div class="res-wf-txt">
                <b>Instant Reservation</b>
                <span>Capture online &amp; phone bookings fast</span>
              </div>
            </div>

            <div class="res-wf-arrow">&darr;</div>

            <div class="res-wf-card">
              <div class="res-wf-ico">
                <svg viewBox="0 0 24 24"><path d="M5 12h14"/><path d="M6 12v8"/><path d="M18 12v8"/><path d="M7 12V6a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v6"/></svg>
              </div>
              <div class="res-wf-txt">
                <b>Live Table Availability</b>
                <span>Real-time floor status at a glance</span>
              </div>
            </div>

            <div class="res-wf-arrow">&darr;</div>

            <div class="res-wf-card">
              <div class="res-wf-ico">
                <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/></svg>
              </div>
              <div class="res-wf-txt">
                <b>Automated Table Assignment</b>
                <span>Zero overlap &amp; instant team sync</span>
              </div>
            </div>
          </div>

          <!-- Right: Smartphone Live Reservation Mockup -->
          <div class="res-phone-visual">
            <div class="res-phone-mockup">
              <div class="res-phone-screen">
                <div class="res-phone-island"></div>
                <div class="res-phone-header">
                  <div class="res-phone-title">Reservations</div>
                  <div class="res-phone-sub">Live table &amp; slot schedule</div>
                </div>
                <div class="res-phone-tabs">
                  <span class="res-tab-pill res-tab-active">All</span>
                  <span class="res-tab-pill">Confirmed</span>
                  <span class="res-tab-pill">Seated</span>
                </div>
                <div class="res-booking-list">
                  <div class="res-booking-row">
                    <div class="res-bk-top">
                      <span class="res-bk-name">Arjun Mehta</span>
                      <span class="res-bk-badge ok">Confirmed</span>
                    </div>
                    <div class="res-bk-meta">
                      <span>7:30 PM &bull; 4 Guests</span>
                      <span class="res-bk-tbl">Table 04</span>
                    </div>
                  </div>

                  <div class="res-booking-row">
                    <div class="res-bk-top">
                      <span class="res-bk-name">Priya Nair</span>
                      <span class="res-bk-badge seated">Seated</span>
                    </div>
                    <div class="res-bk-meta">
                      <span>8:00 PM &bull; 2 Guests</span>
                      <span class="res-bk-tbl">Table 08</span>
                    </div>
                  </div>

                  <div class="res-booking-row">
                    <div class="res-bk-top">
                      <span class="res-bk-name">Vikram Rao</span>
                      <span class="res-bk-badge vip">VIP</span>
                    </div>
                    <div class="res-bk-meta">
                      <span>8:30 PM &bull; 6 Guests</span>
                      <span class="res-bk-tbl">Table 12</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="res-bottom-cta">
          <div class="res-bottom-cta-badge">
            <svg viewBox="0 0 24 24"><path d="m12 3-1.9 5.8a2 2 0 0 1-1.3 1.3L3 12l5.8 1.9a2 2 0 0 1 1.3 1.3L12 21l1.9-5.8a2 2 0 0 1 1.3-1.3L21 12l-5.8-1.9a2 2 0 0 1-1.3-1.3L12 3Z"/></svg>
            <span>Ready for Seamless Service!</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 8: RESERVATION DASHBOARD ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd r">
      <h2>One Screen for <span class="sf">Every Reservation.</span></h2>
      <p>Give your front-of-house team a clear view of reservations, guests, times and table assignments.</p>
    </div>

    <!-- Large Reservation Table Mockup -->
    <div class="rm-win r">
      <div class="rm-win-bar">
        <div class="rm-win-dots"><i></i><i></i><i></i></div>
        <div class="rm-win-ttl">RESERVATION MANAGEMENT CONSOLE</div>
        <div style="display: flex; gap: 6px; flex-wrap: wrap;">
          <button type="button" class="rm-filter-btn active" onclick="filterResConsole('all', this)">All</button>
          <button type="button" class="rm-filter-btn" onclick="filterResConsole('today', this)">Today</button>
          <button type="button" class="rm-filter-btn" onclick="filterResConsole('confirmed', this)">Confirmed</button>
          <button type="button" class="rm-filter-btn" onclick="filterResConsole('pending', this)">Pending</button>
        </div>
      </div>

      <div class="rm-win-body" style="padding: 16px 20px; overflow-x: auto;">
        <table class="rm-table" id="rm-console-table">
          <thead>
            <tr>
              <th>Guest Name</th>
              <th>Party Size</th>
              <th>Time</th>
              <th>Assigned Table</th>
              <th>Status</th>
              <th style="text-align: right;">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr data-status="confirmed">
              <td>
                <div style="display: flex; align-items: center; gap: 10px;">
                  <span class="rm-avatar">RK</span>
                  <span style="font-weight: 700; color: #21160F;">Rahul Kumar</span>
                </div>
              </td>
              <td>4 Guests</td>
              <td style="font-weight: 700; color: #876039;">7:30 PM</td>
              <td style="font-weight: 700; color: #21160F;">Table T12</td>
              <td><span class="badge confirmed">Confirmed</span></td>
              <td style="text-align: right;"><button type="button" style="border: 1px solid rgba(135,96,57,0.22); background: #FAF6F0; color: #21160F; padding: 6px 13px; border-radius: 8px; font-weight: 700; font-size: 12px; cursor: pointer;">Edit</button></td>
            </tr>

            <tr data-status="confirmed">
              <td>
                <div style="display: flex; align-items: center; gap: 10px;">
                  <span class="rm-avatar">PS</span>
                  <span style="font-weight: 700; color: #21160F;">Priya Sharma</span>
                </div>
              </td>
              <td>2 Guests</td>
              <td style="font-weight: 700; color: #876039;">8:00 PM</td>
              <td style="font-weight: 700; color: #21160F;">Table T08</td>
              <td><span class="badge confirmed">Confirmed</span></td>
              <td style="text-align: right;"><button type="button" style="border: 1px solid rgba(135,96,57,0.22); background: #FAF6F0; color: #21160F; padding: 6px 13px; border-radius: 8px; font-weight: 700; font-size: 12px; cursor: pointer;">Edit</button></td>
            </tr>

            <tr data-status="pending">
              <td>
                <div style="display: flex; align-items: center; gap: 10px;">
                  <span class="rm-avatar">AK</span>
                  <span style="font-weight: 700; color: #21160F;">Arun Kumar</span>
                </div>
              </td>
              <td>6 Guests</td>
              <td style="font-weight: 700; color: #876039;">8:30 PM</td>
              <td style="font-weight: 700; color: #21160F;">Table T15</td>
              <td><span class="badge pending">Pending</span></td>
              <td style="text-align: right;"><button type="button" style="border: 1px solid #876039; background: #876039; color: #fff; padding: 6px 13px; border-radius: 8px; font-weight: 700; font-size: 12px; cursor: pointer;">Confirm</button></td>
            </tr>

            <tr data-status="confirmed">
              <td>
                <div style="display: flex; align-items: center; gap: 10px;">
                  <span class="rm-avatar">MF</span>
                  <span style="font-weight: 700; color: #21160F;">Meena Family</span>
                </div>
              </td>
              <td>5 Guests</td>
              <td style="font-weight: 700; color: #876039;">9:00 PM</td>
              <td style="font-weight: 700; color: #21160F;">Table T18</td>
              <td><span class="badge confirmed">Confirmed</span></td>
              <td style="text-align: right;"><button type="button" style="border: 1px solid rgba(135,96,57,0.22); background: #FAF6F0; color: #21160F; padding: 6px 13px; border-radius: 8px; font-weight: 700; font-size: 12px; cursor: pointer;">Edit</button></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 9: CREATE RESERVATION FORM ================= -->
<section>
  <div class="w">
    <div class="rm-split r">
      <div>
        <div class="eb">FAST BOOKING CREATION</div>
        <h2>Create a Reservation <span class="sf">in Seconds.</span></h2>
        <p style="margin: 14px 0 24px;">
          Capture essential booking details without slowing down your front-of-house team during peak hours.
        </p>

        <ul class="rm-feat-list">
          <li class="rm-feat-row"><span class="rm-check-dot">✓</span> Quick guest name &amp; contact lookup</li>
          <li class="rm-feat-row"><span class="rm-check-dot">✓</span> Instant table capacity matching</li>
          <li class="rm-feat-row"><span class="rm-check-dot">✓</span> Record birthday/anniversary special requests</li>
          <li class="rm-feat-row"><span class="rm-check-dot">✓</span> Instant confirmation SMS/WhatsApp trigger</li>
        </ul>
      </div>

      <!-- Form Mockup -->
      <div class="rm-win">
        <div class="rm-win-bar">
          <div class="rm-win-dots"><i></i><i></i><i></i></div>
          <div class="rm-win-ttl">NEW RESERVATION FORM</div>
          <span class="rm-win-pill">Host Desk</span>
        </div>
        <div class="rm-win-body" style="display: flex; flex-direction: column; gap: 14px;">
          <div>
            <label style="font-weight: 700; font-size: 11.5px; color: #6E6157; text-transform: uppercase; letter-spacing: 0.05em; display: block; margin-bottom: 5px;">Guest Name</label>
            <input type="text" value="Rahul Kumar" style="width: 100%; padding: 10px 13px; border: 1px solid rgba(135,96,57,0.2); border-radius: 10px; font-weight: 700; color: #21160F; background: #FFFDFB;">
          </div>

          <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
            <div>
              <label style="font-weight: 700; font-size: 11.5px; color: #6E6157; text-transform: uppercase; letter-spacing: 0.05em; display: block; margin-bottom: 5px;">Phone Number</label>
              <input type="text" value="+91 90475 55066" style="width: 100%; padding: 10px 13px; border: 1px solid rgba(135,96,57,0.2); border-radius: 10px; font-weight: 600; color: #21160F; background: #FFFDFB;">
            </div>
            <div>
              <label style="font-weight: 700; font-size: 11.5px; color: #6E6157; text-transform: uppercase; letter-spacing: 0.05em; display: block; margin-bottom: 5px;">Date</label>
              <input type="text" value="29 September 2026" style="width: 100%; padding: 10px 13px; border: 1px solid rgba(135,96,57,0.2); border-radius: 10px; font-weight: 600; color: #21160F; background: #FFFDFB;">
            </div>
          </div>

          <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 12px;">
            <div>
              <label style="font-weight: 700; font-size: 11.5px; color: #6E6157; text-transform: uppercase; letter-spacing: 0.05em; display: block; margin-bottom: 5px;">Time</label>
              <input type="text" value="7:30 PM" style="width: 100%; padding: 10px 13px; border: 1px solid rgba(135,96,57,0.2); border-radius: 10px; font-weight: 700; color: #876039; background: #FFFDFB;">
            </div>
            <div>
              <label style="font-weight: 700; font-size: 11.5px; color: #6E6157; text-transform: uppercase; letter-spacing: 0.05em; display: block; margin-bottom: 5px;">Guests</label>
              <input type="text" value="4" style="width: 100%; padding: 10px 13px; border: 1px solid rgba(135,96,57,0.2); border-radius: 10px; font-weight: 700; color: #21160F; background: #FFFDFB;">
            </div>
            <div>
              <label style="font-weight: 700; font-size: 11.5px; color: #6E6157; text-transform: uppercase; letter-spacing: 0.05em; display: block; margin-bottom: 5px;">Table</label>
              <select style="width: 100%; padding: 10px 12px; border: 1px solid rgba(135,96,57,0.2); border-radius: 10px; font-weight: 600; color: #21160F; background: #FFFDFB;">
                <option selected>T12 (4 Seats)</option>
                <option>T08 (2 Seats)</option>
              </select>
            </div>
          </div>

          <div>
            <label style="font-weight: 700; font-size: 11.5px; color: #6E6157; text-transform: uppercase; letter-spacing: 0.05em; display: block; margin-bottom: 5px;">Special Request</label>
            <input type="text" value="Birthday celebration" style="width: 100%; padding: 10px 13px; border: 1px solid rgba(135,96,57,0.2); border-radius: 10px; font-weight: 600; color: #21160F; background: #FFFDFB;">
          </div>

          <button type="button" class="btn p" style="margin-top: 6px; justify-content: center; border-radius: 11px;">Confirm Reservation</button>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 10: TABLE ALLOCATION & FLOOR PLAN ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd r">
      <div class="eb">TABLE ALLOCATION</div>
      <h2>Assign the Right Table at <span class="sf">the Right Time.</span></h2>
      <p>See available tables and allocate seating based on your restaurant's floor-plan layout.</p>
    </div>

    <!-- Restaurant Floor Plan Layout UI -->
    <div class="rm-win r" style="max-width: 960px; margin: auto;">
      <div class="rm-win-bar">
        <div class="rm-win-dots"><i></i><i></i><i></i></div>
        <div class="rm-win-ttl">RESTAURANT FLOOR PLAN SEATING</div>
        <div style="display: flex; gap: 12px; font-size: 11.5px; font-weight: 700; flex-wrap: wrap;">
          <span><i style="background: var(--green); width: 8px; height: 8px; border-radius: 50%; display: inline-block; margin-right: 4px;"></i>Available</span>
          <span><i style="background: var(--br); width: 8px; height: 8px; border-radius: 50%; display: inline-block; margin-right: 4px;"></i>Reserved</span>
          <span><i style="background: var(--blue); width: 8px; height: 8px; border-radius: 50%; display: inline-block; margin-right: 4px;"></i>Occupied</span>
          <span><i style="background: var(--yellow); width: 8px; height: 8px; border-radius: 50%; display: inline-block; margin-right: 4px;"></i>Cleaning</span>
        </div>
      </div>
      <div class="rm-win-body" style="padding: 28px;">
        <div class="rm-floor-grid">
          <div class="rm-table-tile" style="border: 1.5px solid #34D399; background: #ECFDF5;">
            <div style="font-family: 'Outfit', sans-serif; font-weight: 700; font-size: 17px; color: #21160F;">TABLE T01</div>
            <div style="font-size: 12.5px; color: #6E6157; margin-top: 3px;">2 Seats</div>
            <div style="margin-top: 12px; font-weight: 700; font-size: 10.5px; color: #065F46; background: #D1FAE5; padding: 4px 10px; border-radius: 999px; display: inline-block;">AVAILABLE</div>
          </div>

          <div class="rm-table-tile" style="border: 1.5px solid #876039; background: #FAF6F0;">
            <div style="font-family: 'Outfit', sans-serif; font-weight: 700; font-size: 17px; color: #21160F;">TABLE T02</div>
            <div style="font-size: 12.5px; color: #6E6157; margin-top: 3px;">4 Seats</div>
            <div style="margin-top: 12px; font-weight: 700; font-size: 10.5px; color: #FFFFFF; background: #876039; padding: 4px 10px; border-radius: 999px; display: inline-block;">RESERVED</div>
          </div>

          <div class="rm-table-tile" style="border: 1.5px solid #34D399; background: #ECFDF5;">
            <div style="font-family: 'Outfit', sans-serif; font-weight: 700; font-size: 17px; color: #21160F;">TABLE T03</div>
            <div style="font-size: 12.5px; color: #6E6157; margin-top: 3px;">6 Seats</div>
            <div style="margin-top: 12px; font-weight: 700; font-size: 10.5px; color: #065F46; background: #D1FAE5; padding: 4px 10px; border-radius: 999px; display: inline-block;">AVAILABLE</div>
          </div>

          <div class="rm-table-tile" style="border: 1.5px solid #60A5FA; background: #EFF6FF;">
            <div style="font-family: 'Outfit', sans-serif; font-weight: 700; font-size: 17px; color: #21160F;">TABLE T04</div>
            <div style="font-size: 12.5px; color: #6E6157; margin-top: 3px;">2 Seats</div>
            <div style="margin-top: 12px; font-weight: 700; font-size: 10.5px; color: #1E40AF; background: #DBEAFE; padding: 4px 10px; border-radius: 999px; display: inline-block;">OCCUPIED</div>
          </div>

          <div class="rm-table-tile" style="border: 1.5px solid #FBBF24; background: #FFFBEB;">
            <div style="font-family: 'Outfit', sans-serif; font-weight: 700; font-size: 17px; color: #21160F;">TABLE T05</div>
            <div style="font-size: 12.5px; color: #6E6157; margin-top: 3px;">4 Seats</div>
            <div style="margin-top: 12px; font-weight: 700; font-size: 10.5px; color: #92400E; background: #FEF3C7; padding: 4px 10px; border-radius: 999px; display: inline-block;">CLEANING</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 11: CALENDAR & TIMELINE ================= -->
<section>
  <div class="w">
    <div class="rm-split r">
      <div>
        <div class="eb">RESERVATION CALENDAR</div>
        <h2>See Your Restaurant's Day <span class="sf">at a Glance.</span></h2>
        <p style="margin: 14px 0 26px;">
          Track guest arrivals across time slots so kitchen and service teams can prepare seamlessly.
        </p>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
          <div class="rm-val-card" style="text-align: center; background: #FAF7F3;">
            <div style="font-family: 'Outfit', sans-serif; font-size: 36px; font-weight: 700; color: #876039; line-height: 1.1;">18</div>
            <div style="font-size: 13.5px; font-weight: 700; color: #21160F; margin-top: 6px;">Today's Reservations</div>
          </div>
          <div class="rm-val-card" style="text-align: center; background: #FAF7F3;">
            <div style="font-family: 'Outfit', sans-serif; font-size: 36px; font-weight: 700; color: #876039; line-height: 1.1;">64</div>
            <div style="font-size: 13.5px; font-weight: 700; color: #21160F; margin-top: 6px;">Guests Expected</div>
          </div>
        </div>
      </div>

      <!-- Calendar & Schedule Mockup -->
      <div class="rm-win">
        <div class="rm-win-bar">
          <div class="rm-win-dots"><i></i><i></i><i></i></div>
          <div class="rm-win-ttl">SEPTEMBER 2026 SCHEDULE</div>
          <span class="rm-win-pill">Date: 29</span>
        </div>
        <div class="rm-win-body" style="display: flex; flex-direction: column; gap: 9px;">
          <div style="display: flex; justify-content: space-between; align-items: center; padding: 11px 14px; border: 1px solid rgba(135,96,57,0.14); border-radius: 11px; background: #FAF8F5;">
            <span style="font-weight: 700; color: #876039; background: #F3E8DC; padding: 3px 10px; border-radius: 999px; font-size: 12px;">10:30 AM</span>
            <span style="font-weight: 600; color: #21160F; font-size: 13.5px;">2 Guests (Table T02)</span>
          </div>
          <div style="display: flex; justify-content: space-between; align-items: center; padding: 11px 14px; border: 1px solid rgba(135,96,57,0.14); border-radius: 11px; background: #FAF8F5;">
            <span style="font-weight: 700; color: #876039; background: #F3E8DC; padding: 3px 10px; border-radius: 999px; font-size: 12px;">12:00 PM</span>
            <span style="font-weight: 600; color: #21160F; font-size: 13.5px;">4 Guests (Table T08)</span>
          </div>
          <div style="display: flex; justify-content: space-between; align-items: center; padding: 11px 14px; border: 1px solid rgba(135,96,57,0.14); border-radius: 11px; background: #FAF8F5;">
            <span style="font-weight: 700; color: #876039; background: #F3E8DC; padding: 3px 10px; border-radius: 999px; font-size: 12px;">1:30 PM</span>
            <span style="font-weight: 600; color: #21160F; font-size: 13.5px;">6 Guests (Table T15)</span>
          </div>
          <div style="display: flex; justify-content: space-between; align-items: center; padding: 11px 14px; border: 1px solid rgba(135,96,57,0.14); border-radius: 11px; background: #FAF8F5;">
            <span style="font-weight: 700; color: #876039; background: #F3E8DC; padding: 3px 10px; border-radius: 999px; font-size: 12px;">7:00 PM</span>
            <span style="font-weight: 600; color: #21160F; font-size: 13.5px;">4 Guests (Table T04)</span>
          </div>
          <div style="display: flex; justify-content: space-between; align-items: center; padding: 11px 14px; border: 1.5px solid #876039; border-radius: 11px; background: #FFFFFF; box-shadow: 0 4px 12px rgba(135,96,57,0.08);">
            <span style="font-weight: 700; color: #FFFFFF; background: #876039; padding: 3px 10px; border-radius: 999px; font-size: 12px;">7:30 PM</span>
            <span style="font-weight: 700; color: #21160F; font-size: 13.5px;">8 Guests (Table T12)</span>
          </div>
          <div style="display: flex; justify-content: space-between; align-items: center; padding: 11px 14px; border: 1px solid rgba(135,96,57,0.14); border-radius: 11px; background: #FAF8F5;">
            <span style="font-weight: 700; color: #876039; background: #F3E8DC; padding: 3px 10px; border-radius: 999px; font-size: 12px;">8:30 PM</span>
            <span style="font-weight: 600; color: #21160F; font-size: 13.5px;">6 Guests (Table T18)</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 12: RESERVATION STATUS TIMELINE ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd r">
      <h2>Know What <span class="sf">Happens Next.</span></h2>
      <p>Clear status progression keeps the host desk and floor staff perfectly synchronized.</p>
    </div>

    <!-- Timeline Cards -->
    <div class="rm-prog-grid r">
      <div class="rm-prog-card active">
        <div class="rm-prog-num">1</div>
        <h5>Reservation Created</h5>
        <p>Booking received</p>
      </div>

      <div class="rm-prog-card active">
        <div class="rm-prog-num">2</div>
        <h5>Pending</h5>
        <p>Awaiting table match</p>
      </div>

      <div class="rm-prog-card active">
        <div class="rm-prog-num">3</div>
        <h5>Confirmed</h5>
        <p>Table allocated</p>
      </div>

      <div class="rm-prog-card active">
        <div class="rm-prog-num">4</div>
        <h5>Guest Arrived</h5>
        <p>Host welcomes guest</p>
      </div>

      <div class="rm-prog-card active">
        <div class="rm-prog-num">5</div>
        <h5>Seated</h5>
        <p>Order flow begins</p>
      </div>

      <div class="rm-prog-card">
        <div class="rm-prog-num">6</div>
        <h5>Completed</h5>
        <p>Table freed &amp; cleaned</p>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 13 & 14: GUEST DETAILS & CHANGES ================= -->
<section>
  <div class="w">
    <div class="rm-split r" style="gap: 32px;">
      <!-- Guest Details UI -->
      <div class="rm-win">
        <div class="rm-win-bar">
          <div class="rm-win-dots"><i></i><i></i><i></i></div>
          <div class="rm-win-ttl">GUEST PROFILE CARD</div>
          <span style="background: #FEF3C7; color: #92400E; padding: 3px 10px; border-radius: 999px; font-weight: 700; font-size: 11px;">4 Visits</span>
        </div>
        <div class="rm-win-body">
          <div style="display: flex; align-items: center; gap: 14px; margin-bottom: 18px;">
            <div style="width: 52px; height: 52px; border-radius: 50%; background: #876039; color: #FFFFFF; font-family: 'Outfit', sans-serif; font-size: 18px; font-weight: 700; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">RK</div>
            <div>
              <h3 style="font-size: 20px; margin: 0 0 3px; color: #21160F;">RAHUL KUMAR</h3>
              <p style="font-size: 13px; color: #6E6157; margin: 0;">Phone: +91 90475 55066 • 12 Previous Reservations</p>
            </div>
          </div>

          <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; background: #FAF7F3; padding: 16px; border-radius: 14px; border: 1px solid rgba(135,96,57,0.14); font-size: 13.5px; color: #21160F;">
            <div><span style="color: #76675D; font-weight: 600;">Guests:</span> <b>4</b></div>
            <div><span style="color: #76675D; font-weight: 600;">Time:</span> <b style="color: #876039;">7:30 PM</b></div>
            <div><span style="color: #76675D; font-weight: 600;">Table:</span> <b>T12</b></div>
            <div><span style="color: #76675D; font-weight: 600;">Request:</span> <b>Birthday</b> <svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M5.8 11.3 2 22l10.7-3.79"/><path d="M4 3h.01"/><path d="M22 8h.01"/><path d="M15 2h.01"/><path d="M22 20h.01"/><path d="m22 2-2.24.75a2.9 2.9 0 0 0-1.96 3.12v0c.1.86-.57 1.63-1.45 1.63h-.38c-.86 0-1.6.6-1.76 1.44L14 10"/><path d="m11 13c1.93 1.93 2.83 4.17 2 5-.83.83-3.07-.07-5-2-1.93-1.93-2.83-4.17-2-5 .83-.83 3.07.07 5 2Z"/></svg></div>
          </div>
        </div>
      </div>

      <!-- Reservation Change UI -->
      <div class="rm-win">
        <div class="rm-win-bar">
          <div class="rm-win-dots"><i></i><i></i><i></i></div>
          <div class="rm-win-ttl">UPDATE RESERVATION #GM1024</div>
          <span class="rm-win-pill">ADAPT BOOKING</span>
        </div>
        <div class="rm-win-body" style="display: flex; flex-direction: column; gap: 11px;">
          <div style="font-weight: 700; font-size: 16px; color: #21160F;">Rahul Kumar</div>

          <div style="display: flex; justify-content: space-between; align-items: center; padding: 10px 14px; background: #FAF7F3; border: 1px solid rgba(135,96,57,0.12); border-radius: 10px; font-size: 13.5px;">
            <span style="color: #6E6157; font-weight: 600;">Guests</span>
            <span style="font-weight: 700; color: #876039;">4 Guests → 6 Guests</span>
          </div>

          <div style="display: flex; justify-content: space-between; align-items: center; padding: 10px 14px; background: #FAF7F3; border: 1px solid rgba(135,96,57,0.12); border-radius: 10px; font-size: 13.5px;">
            <span style="color: #6E6157; font-weight: 600;">Time</span>
            <span style="font-weight: 700; color: #876039;">7:30 PM → 8:00 PM</span>
          </div>

          <div style="display: flex; justify-content: space-between; align-items: center; padding: 10px 14px; background: #FAF7F3; border: 1px solid rgba(135,96,57,0.12); border-radius: 10px; font-size: 13.5px;">
            <span style="color: #6E6157; font-weight: 600;">Table</span>
            <span style="font-weight: 700; color: #876039;">Table T12 → Table T18</span>
          </div>

          <div style="display: flex; gap: 10px; flex-wrap: wrap; margin-top: 6px;">
            <button type="button" class="btn p" style="flex: 1; padding: 10px 16px; font-size: 12.5px; border-radius: 10px;">Update Reservation</button>
            <button type="button" class="btn o" style="padding: 10px 16px; font-size: 12.5px; border-radius: 10px; border-color: #FCA5A5; color: #DC2626;">Cancel</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 15 & 16: TABLE CONNECTION & PEAK-HOUR VISIBILITY ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="rm-split r">
      <div>
        <div class="eb">PEAK-HOUR PREPARATION</div>
        <h2>Prepare Before <span class="sf">the Rush.</span></h2>
        <p style="margin: 14px 0 26px;">
          Understand when reservations are building up so your kitchen and floor team can prepare for busy service periods.
        </p>

        <div style="display: flex; flex-direction: column; gap: 12px; background: #FFFFFF; padding: 22px; border-radius: 18px; border: 1px solid rgba(135,96,57,0.14); box-shadow: 0 8px 24px rgba(33,22,15,0.04);">
          <div style="display: flex; align-items: center; justify-content: space-between; font-size: 13px; font-weight: 700;">
            <span style="width: 112px; color: #4A3D34;">10:00 AM</span>
            <div style="flex: 1; margin: 0 14px; height: 11px; background: #F1E7DB; border-radius: 99px; overflow: hidden;"><div style="width: 20%; height: 100%; background: #B88E56; border-radius: 99px;"></div></div>
            <span style="width: 82px; text-align: right; color: #6E6157;">2 Bookings</span>
          </div>

          <div style="display: flex; align-items: center; justify-content: space-between; font-size: 13px; font-weight: 700;">
            <span style="width: 112px; color: #4A3D34;">12:00 PM</span>
            <div style="flex: 1; margin: 0 14px; height: 11px; background: #F1E7DB; border-radius: 99px; overflow: hidden;"><div style="width: 55%; height: 100%; background: #A27646; border-radius: 99px;"></div></div>
            <span style="width: 82px; text-align: right; color: #6E6157;">5 Bookings</span>
          </div>

          <div style="display: flex; align-items: center; justify-content: space-between; font-size: 13px; font-weight: 700;">
            <span style="width: 112px; color: #4A3D34;">2:00 PM</span>
            <div style="flex: 1; margin: 0 14px; height: 11px; background: #F1E7DB; border-radius: 99px; overflow: hidden;"><div style="width: 35%; height: 100%; background: #B88E56; border-radius: 99px;"></div></div>
            <span style="width: 82px; text-align: right; color: #6E6157;">3 Bookings</span>
          </div>

          <div style="display: flex; align-items: center; justify-content: space-between; font-size: 13px; font-weight: 700;">
            <span style="width: 112px; color: #4A3D34;">6:00 PM</span>
            <div style="flex: 1; margin: 0 14px; height: 11px; background: #F1E7DB; border-radius: 99px; overflow: hidden;"><div style="width: 75%; height: 100%; background: #876039; border-radius: 99px;"></div></div>
            <span style="width: 82px; text-align: right; color: #21160F;">7 Bookings</span>
          </div>

          <div style="display: flex; align-items: center; justify-content: space-between; font-size: 13px; font-weight: 700; padding-top: 6px; border-top: 1px dashed rgba(135,96,57,0.2);">
            <span style="width: 112px; color: #876039;">8:00 PM (Peak)</span>
            <div style="flex: 1; margin: 0 14px; height: 12px; background: #F1E7DB; border-radius: 99px; overflow: hidden;"><div style="width: 95%; height: 100%; background: linear-gradient(90deg, #876039 0%, #6f4e2d 100%); border-radius: 99px;"></div></div>
            <span style="width: 82px; text-align: right; color: #876039;">9 Bookings</span>
          </div>
        </div>
      </div>

      <!-- Flow Visual -->
      <div class="rm-win">
        <div class="rm-win-bar">
          <div class="rm-win-dots"><i></i><i></i><i></i></div>
          <div class="rm-win-ttl">RESERVATION TO TABLE CONNECTION</div>
          <span class="rm-win-pill">Live Flow</span>
        </div>
        <div class="rm-win-body" style="display: flex; flex-direction: column; gap: 10px; text-align: center; font-weight: 700; font-size: 13.5px;">
          <div style="padding: 13px 16px; background: #FAF7F3; border-radius: 12px; border: 1px solid rgba(135,96,57,0.16); color: #21160F;">
            <svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
            RESERVATION: Rahul Kumar (4 Guests, 7:30 PM)
          </div>
          <div style="color: #876039; line-height: 1;">↓</div>
          <div style="padding: 13px 16px; background: #FAF7F3; border-radius: 12px; border: 1px solid rgba(135,96,57,0.16); color: #21160F;">
            <svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h14"/><path d="M6 12v8"/><path d="M18 12v8"/><path d="M7 12V6a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v6"/></svg>
            TABLE ALLOCATION: Table T12 (Reserved)
          </div>
          <div style="color: #876039; line-height: 1;">↓</div>
          <div style="padding: 13px 16px; background: #FAF7F3; border-radius: 12px; border: 1px solid rgba(135,96,57,0.16); color: #21160F;">
            <svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M13 4h3a2 2 0 0 1 2 2v14"/><path d="M2 20h3"/><path d="M13 20h9"/><path d="M10 12v.01"/><path d="M13 4.562v16.157a1 1 0 0 1-1.242.97L5 20V5.562a2 2 0 0 1 1.515-1.94l4-1A2 2 0 0 1 13 4.561Z"/></svg>
            GUEST ARRIVES &amp; SEATED
          </div>
          <div style="color: #876039; line-height: 1;">↓</div>
          <div style="padding: 14px 16px; background: linear-gradient(135deg, #876039 0%, #6f4e2d 100%); color: #fff; border-radius: 12px; box-shadow: 0 8px 20px rgba(135,96,57,0.26);">
            <svg class="gm-theme-icon" style="stroke: #fff;" viewBox="0 0 24 24" aria-hidden="true"><path d="M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2"/><path d="M7 2v20"/><path d="M21 15V2v0a5 5 0 0 0-5 5v6c0 1.1.9 2 2 2h3Zm0 0v7"/></svg>
            SERVICE &amp; ORDERING BEGINS
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 17: CUSTOMER EXPERIENCE SPLIT VISUAL ================= -->
<section>
  <div class="w">
    <div class="hd r">
      <h2>A Better Reservation Experience <span class="sf">Starts Before Arrival.</span></h2>
      <p style="font-size: 20px; font-weight: 600; color: var(--br); margin-top: 12px;">Less Waiting. Better Preparation. Smoother Service.</p>
    </div>

    <div class="rm-exp-grid r">
      <div class="rm-exp-card">
        <div class="rm-exp-banner">
          <img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?w=800&auto=format&fit=crop&q=80" alt="Restaurant team preparing tables">
          <div class="rm-exp-banner-scrim"></div>
          <h3 class="rm-exp-banner-title">RESTAURANT TEAM</h3>
        </div>
        <div class="rm-exp-body">
          <div style="padding: 13px 16px; background: #FAF7F3; border-radius: 12px; border: 1px solid rgba(135,96,57,0.14); font-weight: 700; color: #21160F;">1. Reservation Received</div>
          <div style="text-align: center; color: #876039; font-weight: 700; line-height: 1;">↓</div>
          <div style="padding: 13px 16px; background: #FAF7F3; border-radius: 12px; border: 1px solid rgba(135,96,57,0.14); font-weight: 700; color: #21160F;">2. Table Assigned</div>
          <div style="text-align: center; color: #876039; font-weight: 700; line-height: 1;">↓</div>
          <div style="padding: 13px 16px; background: #FAF7F3; border-radius: 12px; border: 1px solid rgba(135,96,57,0.14); font-weight: 700; color: #21160F;">3. Floor Team Prepared</div>
        </div>
      </div>

      <div class="rm-exp-card featured">
        <div class="rm-exp-banner">
          <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=800&auto=format&fit=crop&q=80" alt="Guests seated seamlessly at restaurant">
          <div class="rm-exp-banner-scrim"></div>
          <h3 class="rm-exp-banner-title">GUEST EXPERIENCE</h3>
        </div>
        <div class="rm-exp-body">
          <div style="padding: 13px 16px; background: #FAF7F3; border-radius: 12px; border: 1px solid rgba(135,96,57,0.14); font-weight: 700; color: #21160F;">1. Reservation Confirmed</div>
          <div style="text-align: center; color: #876039; font-weight: 700; line-height: 1;">↓</div>
          <div style="padding: 13px 16px; background: #FAF7F3; border-radius: 12px; border: 1px solid rgba(135,96,57,0.14); font-weight: 700; color: #21160F;">2. Arrives at Restaurant</div>
          <div style="text-align: center; color: #876039; font-weight: 700; line-height: 1;">↓</div>
          <div style="padding: 14px 16px; background: linear-gradient(135deg, #876039 0%, #6f4e2d 100%); color: #FFFFFF; border-radius: 12px; font-weight: 700; box-shadow: 0 8px 20px rgba(135,96,57,0.25);">3. Table Ready &amp; Seated Instantly</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 19: RESTAURANT TYPES ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd r">
      <div class="eb">BUILT FOR EVERY DINING EXPERIENCE</div>
      <h2>Built for Every <span class="sf">Dining Experience.</span></h2>
    </div>

    <div class="rm-ind-grid r">
      <div class="rm-ind-card">
        <div class="rm-ind-media">
          <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=600&auto=format&fit=crop&q=80" alt="Fine Dining">
          <div class="rm-ind-scrim"></div>
        </div>
        <div class="rm-ind-body">
          <h4><svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M8 22h8"/><path d="M12 11v11"/><path d="m19 3-7 8-7-8Z"/></svg> Fine Dining</h4>
          <p>Manage reservations around premium multi-course table service.</p>
        </div>
      </div>

      <div class="rm-ind-card">
        <div class="rm-ind-media">
          <img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?w=600&auto=format&fit=crop&q=80" alt="Casual Dining">
          <div class="rm-ind-scrim"></div>
        </div>
        <div class="rm-ind-body">
          <h4><svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2"/><path d="M7 2v20"/><path d="M21 15V2v0a5 5 0 0 0-5 5v6c0 1.1.9 2 2 2h3Zm0 0v7"/></svg> Casual Dining</h4>
          <p>Keep everyday bookings organized during busy lunch and dinner hours.</p>
        </div>
      </div>

      <div class="rm-ind-card">
        <div class="rm-ind-media">
          <img src="https://images.unsplash.com/photo-1559339352-11d035aa65de?w=600&auto=format&fit=crop&q=80" alt="Family Restaurants">
          <div class="rm-ind-scrim"></div>
        </div>
        <div class="rm-ind-body">
          <h4><svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg> Family Restaurants</h4>
          <p>Handle larger party sizes, group bookings and flexible table joins.</p>
        </div>
      </div>

      <div class="rm-ind-card">
        <div class="rm-ind-media">
          <img src="https://images.unsplash.com/photo-1554118811-1e0d58224f24?w=600&auto=format&fit=crop&q=80" alt="Cafés">
          <div class="rm-ind-scrim"></div>
        </div>
        <div class="rm-ind-body">
          <h4><svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M17 8h1a4 4 0 1 1 0 8h-1"/><path d="M3 8h14v9a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4Z"/><line x1="6" x2="6" y1="2" y2="4"/><line x1="10" x2="10" y1="2" y2="4"/><line x1="14" x2="14" y1="2" y2="4"/></svg> Cafés</h4>
          <p>Manage reservations during peak weekend brunch and coffee hours.</p>
        </div>
      </div>

      <div class="rm-ind-card">
        <div class="rm-ind-media">
          <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?w=600&auto=format&fit=crop&q=80" alt="Hotels & Resorts">
          <div class="rm-ind-scrim"></div>
        </div>
        <div class="rm-ind-body">
          <h4><svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><rect width="16" height="20" x="4" y="2" rx="2" ry="2"/><path d="M9 22v-4h6v4"/><path d="M8 6h.01"/><path d="M16 6h.01"/><path d="M12 6h.01"/><path d="M12 10h.01"/><path d="M12 14h.01"/><path d="M16 10h.01"/><path d="M16 14h.01"/><path d="M8 10h.01"/><path d="M8 14h.01"/></svg> Hotels &amp; Resorts</h4>
          <p>Coordinate dining reservations within larger hotel hospitality operations.</p>
        </div>
      </div>

      <div class="rm-ind-card">
        <div class="rm-ind-media">
          <img src="https://images.unsplash.com/photo-1514933651103-005eec06c04b?w=600&auto=format&fit=crop&q=80" alt="Multi-Cuisine">
          <div class="rm-ind-scrim"></div>
        </div>
        <div class="rm-ind-body">
          <h4><svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M4 11h16a1 1 0 0 1 1 1v.5c0 4.5-4 8.5-9 8.5s-9-4-9-8.5V12a1 1 0 0 1 1-1Z"/><path d="M12 3v4"/><path d="M8 5v2"/><path d="M16 5v2"/></svg> Multi-Cuisine</h4>
          <p>Manage reservations across different dining sections and floors.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 20 & 21: CONNECTED OPERATIONS & BENEFITS ================= -->
<section>
  <div class="w">
    <div class="hd r">
      <h2>Reservations <span class="sf">Don't Work Alone.</span></h2>
      <p>Connect reservations with the rest of your restaurant operations for a smoother service flow.</p>
    </div>

    <!-- ECOSYSTEM 7-STEP VISUAL FLOW -->
    <div class="rm-eco-grid r">
      <div class="rm-eco-step active">
        <span class="rm-eco-num">01</span>
        <img src="{{ asset('assets/images/workflow/step-1-menu.png') }}" alt="Reservations" class="rm-eco-img">
        <div class="rm-eco-title">RESERVATIONS</div>
      </div>
      <div class="rm-eco-step">
        <span class="rm-eco-num">02</span>
        <img src="{{ asset('assets/images/workflow/step-4-table.png') }}" alt="Tables" class="rm-eco-img">
        <div class="rm-eco-title">TABLES</div>
      </div>
      <div class="rm-eco-step">
        <span class="rm-eco-num">03</span>
        <img src="{{ asset('assets/images/workflow/step-2-order.png') }}" alt="Waiter" class="rm-eco-img">
        <div class="rm-eco-title">WAITER</div>
      </div>
      <div class="rm-eco-step">
        <span class="rm-eco-num">04</span>
        <img src="{{ asset('assets/images/workflow/step-2-order.png') }}" alt="Order" class="rm-eco-img">
        <div class="rm-eco-title">ORDER</div>
      </div>
      <div class="rm-eco-step">
        <span class="rm-eco-num">05</span>
        <img src="{{ asset('assets/images/workflow/step-3-kitchen.png') }}" alt="Kitchen" class="rm-eco-img">
        <div class="rm-eco-title">KITCHEN</div>
      </div>
      <div class="rm-eco-step">
        <span class="rm-eco-num">06</span>
        <img src="{{ asset('assets/images/workflow/step-5-billing.png') }}" alt="POS" class="rm-eco-img">
        <div class="rm-eco-title">POS</div>
      </div>
      <div class="rm-eco-step">
        <span class="rm-eco-num">07</span>
        <img src="{{ asset('assets/images/workflow/step-6-payment.png') }}" alt="Payment" class="rm-eco-img">
        <div class="rm-eco-title">PAYMENT</div>
      </div>
    </div>

    <!-- 6 VISUAL BENEFITS -->
    <div class="rm-ben-grid r">
      <div class="rm-ben-card">
        <div class="rm-val-top">
          <div class="rm-val-ic">
            <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
          </div>
          <span class="rm-val-num">01</span>
        </div>
        <h3>Real-Time Visibility</h3>
        <p>Know what's booked and what's available instantly across all service slots.</p>
      </div>

      <div class="rm-ben-card">
        <div class="rm-val-top">
          <div class="rm-val-ic">
            <svg viewBox="0 0 24 24"><rect x="3" y="8" width="18" height="4" rx="1"/><path d="M6 12v7M18 12v7"/></svg>
          </div>
          <span class="rm-val-num">02</span>
        </div>
        <h3>Faster Table Allocation</h3>
        <p>Assign tables without unnecessary back-and-forth or floor confusion.</p>
      </div>

      <div class="rm-ben-card">
        <div class="rm-val-top">
          <div class="rm-val-ic">
            <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
          </div>
          <span class="rm-val-num">03</span>
        </div>
        <h3>Guest Information</h3>
        <p>Keep essential reservation details and special requests accessible to staff.</p>
      </div>

      <div class="rm-ben-card">
        <div class="rm-val-top">
          <div class="rm-val-ic">
            <svg viewBox="0 0 24 24"><path d="M16 2v4M8 2v4M3 10h18M5 4h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2z"/></svg>
          </div>
          <span class="rm-val-num">04</span>
        </div>
        <h3>Better Preparation</h3>
        <p>Know who's arriving and when, so kitchen and service teams prepare ahead.</p>
      </div>

      <div class="rm-ben-card">
        <div class="rm-val-top">
          <div class="rm-val-ic">
            <svg viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
          </div>
          <span class="rm-val-num">05</span>
        </div>
        <h3>Organized Service</h3>
        <p>Keep front-of-house operations structured during busy service hours.</p>
      </div>

      <div class="rm-ben-card">
        <div class="rm-val-top">
          <div class="rm-val-ic">
            <svg viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
          </div>
          <span class="rm-val-num">06</span>
        </div>
        <h3>Centralized Management</h3>
        <p>Manage all table bookings and reservations from one clean workspace.</p>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 25: FAQ ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd r">
      <h2>Frequently Asked <span class="sf">Questions</span></h2>
      <p>Everything you need to know about Geni Menu Reservation Management.</p>
    </div>

    <div class="faq-list r">
      <div class="faq-item open">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>Can I see all upcoming reservations in one place?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. The reservation dashboard provides a centralized view of upcoming bookings, filterable by date, time, and status.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>Can I assign tables to reservations?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Where table allocation is enabled, reservations can be associated directly with configured tables on your floor plan.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>Can I update a reservation?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Reservation details such as party size, time slot, and table assignment can be updated easily when guest plans change.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>Can I manage guest details?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Essential guest information (name, phone number, special requests, visit history) associated with reservations can be viewed and managed.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>Can I see today's reservations?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. The reservation interface provides a dedicated day-focused view of bookings to keep your host team prepared.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>Can I manage different table sizes?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Table allocation can be based on your configured tables and seating capacity (2-seaters, 4-seaters, 6+ large group tables).
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>Can reservations connect with tables and orders?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Where the corresponding Geni Menu modules are enabled, reservation operations work seamlessly alongside table status, order workflow, and POS billing.
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 24: FINAL CTA ================= -->
<section style="background: linear-gradient(135deg, #876039 0%, #6f4e2d 100%); color: #fff; text-align: center;">
  <div class="w r">
    <div class="eb" style="background: rgba(255,255,255,0.15); color: #fff; border-color: rgba(255,255,255,0.3);">
      TAKE CONTROL OF YOUR FLOOR
    </div>
    <h2 style="color: #fff; font-size: clamp(34px, 5vw, 54px);">Make Every <span class="sf" style="background: linear-gradient(135deg, #fff 0%, #f4efe9 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Reservation Count.</span></h2>
    <p style="color: #f4efe9; max-width: 620px; margin: 20px auto 36px; font-size: 18px;">
      Give your team a simpler way to manage bookings, tables and guests — and create a smoother experience from reservation to seating.
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
// Interactive Console Table Filter
function filterResConsole(filter, btn) {
  document.querySelectorAll('.rm-filter-btn').forEach(b => b.classList.remove('active'));
  if (btn) btn.classList.add('active');
  document.querySelectorAll('#rm-console-table tbody tr').forEach(row => {
    const status = row.getAttribute('data-status');
    if (filter === 'all' || filter === 'today' || status === filter) {
      row.style.display = '';
    } else {
      row.style.display = 'none';
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
