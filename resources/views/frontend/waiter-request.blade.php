@php
    $meta = [
        'title' => 'Waiter Requests — Geni Menu | WeGeni',
        'description' => 'Give guests an easier way to ask for assistance while helping your service team respond faster. Geni Menu connects table-side requests directly with your restaurant team.',
        'keywords' => 'waiter request system, restaurant table call button, digital waiter call, table-side service software, restaurant service requests, Geni Menu, WeGeni'
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
.badge { font-size: 11px; font-weight: 700; padding: 4px 10px; border-radius: 8px; text-transform: uppercase; display: inline-block; letter-spacing: 0.03em; }
.badge.confirmed { background: #d1fae5; color: #065f46; }
.badge.pending { background: #fef3c7; color: #92400e; }
.badge.cancelled { background: #fee2e2; color: #991b1b; }
.badge.seated { background: #dbeafe; color: #1e40af; }

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
.rm-val-card:hover .rm-val-ic,
.rm-ben-card:hover .rm-val-ic {
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
  gap: 12px;
}
.rm-table-tile {
  padding: 16px 10px;
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
  margin: 0 0 6px;
}
.rm-prog-card p {
  font-size: 13px;
  color: #76675D;
  margin: 0;
}

/* Split Experience Visual Cards */
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
  height: 156px;
  position: relative;
  overflow: hidden;
}
.rm-exp-banner img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}
.rm-exp-banner-scrim {
  position: absolute;
  inset: 0;
  background: linear-gradient(180deg, rgba(33, 22, 15, 0.15) 0%, rgba(33, 22, 15, 0.74) 100%);
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
  padding: 22px;
  display: flex;
  flex-direction: column;
  gap: 9px;
}

/* Industry & Editorial Image Cards */
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

/* Guest Phone Mockup */
.ph-wrap {
  width: 268px;
  border-radius: 38px;
  background: #1C1510;
  padding: 9px;
  box-shadow: 0 24px 52px rgba(33, 22, 15, 0.28), 0 0 0 2px #3A2F25;
  flex: none;
}
.ph-in {
  height: 520px;
  border-radius: 30px;
  background: #fff;
  overflow: hidden;
  display: flex;
  flex-direction: column;
}
.ph-top {
  background: linear-gradient(135deg, #876039 0%, #6f4e2d 100%);
  padding: 18px 16px 14px;
  color: #fff;
}
.ph-title { font-weight: 700; font-size: 15px; font-family: 'Outfit', sans-serif; }
.ph-sub { font-size: 11px; opacity: .85; margin-top: 2px; }
.ph-body { flex: 1; overflow-y: auto; padding: 13px; display: flex; flex-direction: column; gap: 9px; scrollbar-width: none; }
.ph-tbl { background: var(--br-light); border: 1px solid var(--line); border-radius: 12px; padding: 10px 12px; text-align: center; margin-bottom: 4px; }
.ph-tbl-lbl { font-size: 10px; font-weight: 700; color: var(--br); letter-spacing: .1em; text-transform: uppercase; }
.ph-tbl-num { font-size: 24px; font-weight: 700; font-family: 'Outfit', sans-serif; color: var(--ink); line-height: 1.1; }
.ph-help { font-size: 11px; font-weight: 600; color: var(--mute); margin-bottom: 4px; text-align: center; }
.ph-btn {
  width: 100%;
  padding: 10px 14px;
  border-radius: 11px;
  border: 1px solid var(--line);
  background: #fff;
  font-weight: 700;
  font-size: 12.5px;
  color: var(--ink);
  display: flex;
  align-items: center;
  gap: 9px;
  cursor: pointer;
  transition: .18s;
}
.ph-btn:hover { border-color: var(--br); background: var(--br-light); }
.ph-btn svg { width: 15px; height: 15px; stroke: var(--br); fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; flex: none; }

/* Editorial Photo Strip Card (for Split Sections) */
.wr-photo-strip {
  position: relative;
  border-radius: 18px;
  overflow: hidden;
  height: 148px;
  margin-top: 22px;
  border: 1px solid rgba(135, 96, 57, 0.16);
  box-shadow: var(--shadow-sm);
}
.wr-photo-strip img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}
.wr-photo-strip-scrim {
  position: absolute;
  inset: 0;
  background: linear-gradient(90deg, rgba(33, 22, 15, 0.72) 0%, rgba(33, 22, 15, 0.25) 60%, rgba(33, 22, 15, 0.1) 100%);
}
.wr-photo-strip-caption {
  position: absolute;
  left: 18px;
  bottom: 14px;
  right: 18px;
  color: #FFFFFF;
}

/* Responsive adjustments */
@media (max-width: 1100px) {
  .rm-val-grid { grid-template-columns: repeat(2, 1fr); }
  .rm-floor-grid { grid-template-columns: repeat(3, 1fr); }
  .rm-prog-grid { grid-template-columns: repeat(2, 1fr); }
  .rm-eco-grid { grid-template-columns: repeat(4, 1fr); }
  .rm-ind-grid, .rm-ben-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 900px) {
  .rm-hero-grid, .rm-split { grid-template-columns: 1fr; gap: 32px; }
}
@media (max-width: 768px) {
  .bc { padding: 14px 0 14px; }
  .w { padding: 0 16px; }
  .ph-wrap { width: 100%; max-width: 300px; margin: 0 auto; }
}
@media (max-width: 600px) {
  .rm-val-grid, .rm-prog-grid, .rm-ind-grid, .rm-ben-grid { grid-template-columns: 1fr; }
  .rm-floor-grid { grid-template-columns: repeat(2, 1fr); }
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
    <span>Waiter Requests</span>
  </div>
</div>

<!-- ================= HERO SECTION ================= -->
<section style="background: linear-gradient(180deg, var(--bg2) 0%, #ffffff 100%);">
  <div class="w">
    <div class="rm-hero-grid">
      <!-- Hero Left Copy -->
      <div class="r in">
        <div class="eb">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9M13.73 21a2 2 0 0 1-3.46 0"/></svg>
          WAITER REQUESTS
        </div>
        <h1>Every Table.<br>Every Request.<br><span class="sf">Right on Time.</span></h1>
        <p style="margin: 20px 0 32px; font-size: 18px; max-width: 530px;">
          Give guests an easier way to ask for assistance while helping your service team respond faster. Geni Menu connects table-side requests directly with your restaurant team.
        </p>
        <div style="display: flex; gap: 14px; flex-wrap: wrap;">
          <a href="{{ route('restaurant_signup') }}" class="btn p">Get Started →</a>
          <a href="{{ route('contact.us') }}" class="btn o">Book a Demo</a>
        </div>
        <div style="margin-top: 28px; font-size: 14px; color: var(--mute); font-weight: 600; display: flex; align-items: center; gap: 16px; flex-wrap: wrap;">
          <span>✓ Real-time Request Tracking</span>
          <span>✓ Table-linked Visibility</span>
          <span>✓ Smoother Table-side Service</span>
        </div>
      </div>

      <!-- Hero Visual: Editorial Hospitality Photo + Live Waiter Request Card -->
      <div class="r in" style="transition-delay: 0.15s; position: relative; display: flex; justify-content: center;">
        <div style="position: relative; width: 100%; max-width: 610px; border-radius: 26px; overflow: hidden; box-shadow: 0 28px 64px rgba(33, 22, 15, 0.16), 0 6px 20px rgba(135, 96, 57, 0.10); border: 1px solid rgba(135, 96, 57, 0.16);">
          <img
            src="{{ asset('assets/images/waiter-request-hero.jpg') }}"
            alt="Restaurant waiter responding to live table-side requests with Geni Menu"
            style="width: 100%; height: auto; display: block; object-fit: cover;"
            loading="eager"
          />
          <div style="position: absolute; inset: 0; background: linear-gradient(180deg, rgba(33,22,15,0.08) 0%, rgba(33,22,15,0) 45%, rgba(33,22,15,0.48) 100%); pointer-events: none;"></div>

          <!-- Top-Left Live Status Pill -->
          <div style="position: absolute; top: 18px; left: 18px; display: inline-flex; align-items: center; gap: 8px; padding: 8px 14px; border-radius: 999px; background: rgba(255, 255, 255, 0.94); backdrop-filter: blur(10px); box-shadow: 0 8px 20px rgba(0,0,0,0.14); font-size: 12px; font-weight: 700; color: #21160F;">
            <span style="width: 8px; height: 8px; border-radius: 50%; background: #16A34A; box-shadow: 0 0 0 3px rgba(22,163,74,0.22);"></span>
            Today • 08 New • 05 In Progress • 24 Completed
          </div>

          <!-- Floating Notification Card -->
          <div style="position: absolute; bottom: 18px; left: 18px; right: 18px; background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(12px); border: 1px solid rgba(135, 96, 57, 0.25); border-radius: 16px; padding: 12px 16px; box-shadow: 0 12px 28px rgba(0,0,0,0.18); display: flex; justify-content: space-between; align-items: center; gap: 12px; flex-wrap: wrap;">
            <div style="display: flex; align-items: center; gap: 12px;">
              <div style="width: 38px; height: 38px; border-radius: 11px; background: #F6EFE7; color: #876039; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                <svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/></svg>
              </div>
              <div>
                <div style="font-size: 10px; font-weight: 700; color: #876039; letter-spacing: 0.06em;">NEW REQUEST</div>
                <div style="font-weight: 700; font-size: 13.5px; color: #21160F;">Table 08 — Call Waiter</div>
                <div style="font-size: 11.5px; color: #6E6157;">Just now • Dining Hall</div>
              </div>
            </div>
            <span style="background: #876039; color: #fff; padding: 7px 14px; border-radius: 9px; font-weight: 700; font-size: 12px;">Respond →</span>
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
            <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
          </div>
          <span class="rm-val-num">01</span>
        </div>
        <h4>Faster Response</h4>
        <p>Help staff see customer requests without constantly checking every table.</p>
      </div>

      <div class="rm-val-card">
        <div class="rm-val-top">
          <div class="rm-val-ic">
            <svg viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>
          </div>
          <span class="rm-val-num">02</span>
        </div>
        <h4>Clear Table Requests</h4>
        <p>Know exactly which table needs attention and what the guest needs.</p>
      </div>

      <div class="rm-val-card">
        <div class="rm-val-top">
          <div class="rm-val-ic">
            <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
          </div>
          <span class="rm-val-num">03</span>
        </div>
        <h4>Better Guest Experience</h4>
        <p>Reduce unnecessary waiting and make service feel more responsive.</p>
      </div>

      <div class="rm-val-card">
        <div class="rm-val-top">
          <div class="rm-val-ic">
            <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg>
          </div>
          <span class="rm-val-num">04</span>
        </div>
        <h4>Smoother Team Coordination</h4>
        <p>Keep waiter requests visible to the right restaurant team members.</p>
      </div>
    </div>
  </div>
</section>

<!-- ================= PROBLEM SECTION (COMPARISON) ================= -->
<style>
  .wr-compare-container {
    position: relative;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 32px;
    align-items: stretch;
  }

  .wr-compare-center-arrow {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    z-index: 20;
    pointer-events: none;
  }

  .wr-center-arrow-circle {
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

  .wr-center-arrow-circle svg {
    width: 20px;
    height: 20px;
  }

  .wr-compare-card {
    border-radius: 24px;
    padding: 26px;
    position: relative;
    display: flex;
    flex-direction: column;
    box-sizing: border-box;
  }

  .wr-compare-traditional {
    background: #FFFDFC;
    border: 1.5px solid #FECDD3;
    box-shadow: 0 10px 30px rgba(220, 38, 38, 0.04);
  }

  .wr-compare-digital {
    background: #FFFFFF;
    border: 1.5px solid rgba(135, 96, 57, 0.28);
    box-shadow: 0 14px 40px rgba(135, 96, 57, 0.08);
  }

  .wr-compare-header {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 22px;
  }

  .wr-badge-icon {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
  }

  .wr-badge-icon svg { width: 18px; height: 18px; }
  .wr-badge-red { background: #FEE2E2; color: #DC2626; }
  .wr-badge-brown { background: #6F4522; color: #FFFFFF; }

  .wr-compare-title {
    font-family: 'Outfit', 'Plus Jakarta Sans', sans-serif;
    font-size: 19px;
    font-weight: 700;
    margin: 0 0 2px;
    line-height: 1.2;
  }
  .wr-compare-title.text-red { color: #991B1B; }
  .wr-compare-title.text-brown { color: #21160F; }

  .wr-compare-subtitle {
    font-size: 12.5px;
    color: #76675D;
    margin: 0;
  }

  .wr-split-body {
    display: grid;
    grid-template-columns: 1fr 1.3fr;
    gap: 16px;
    align-items: stretch;
    flex: 1;
  }

  .wr-compare-digital .wr-split-body {
    grid-template-columns: 1fr 1.05fr;
    gap: 14px;
  }

  .wr-paper-visual {
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

  .wr-paper-board {
    width: 100%;
    background: #845A3C;
    border-radius: 12px;
    padding: 10px 8px 8px;
    box-shadow: 0 6px 16px rgba(42, 24, 13, 0.2);
  }

  .wr-paper-clip {
    width: 32px;
    height: 8px;
    background: #C4B5A5;
    border-radius: 3px;
    margin: 0 auto 6px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25);
  }

  .wr-paper-sheet {
    background: #FFFDF9;
    border-radius: 6px;
    padding: 10px 8px;
    font-family: 'Plus Jakarta Sans', sans-serif;
    border: 1px solid #EBE1D3;
  }

  .wr-paper-header {
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

  .wr-paper-slot-title {
    font-size: 7.5px;
    font-weight: 700;
    color: #876039;
    letter-spacing: 0.6px;
    text-transform: uppercase;
    margin: 6px 0 3px;
  }

  .wr-paper-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 7.5px;
    color: #4A3E38;
    padding: 2.5px 0;
    border-bottom: 1px dashed #EDE4D8;
  }
  .wr-paper-row:last-child { border-bottom: none; }
  .wr-paper-row .err-tag { color: #DC2626; font-weight: 700; }

  .wr-points-list {
    display: flex;
    flex-direction: column;
    gap: 8px;
    justify-content: space-between;
  }

  .wr-point-card {
    background: #FFFFFF;
    border: 1px solid #FEE2E2;
    border-radius: 12px;
    padding: 9px 12px;
    display: flex;
    align-items: center;
    gap: 10px;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
  }
  .wr-point-card:hover {
    transform: translateX(2px);
    box-shadow: 0 4px 12px rgba(220, 38, 38, 0.08);
  }

  .wr-point-ico {
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
  .wr-point-ico svg { width: 15px; height: 15px; stroke: currentColor; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }

  .wr-point-txt { display: flex; flex-direction: column; min-width: 0; }
  .wr-point-txt b { font-size: 13px; font-weight: 700; color: #21160F; line-height: 1.25; }
  .wr-point-txt span { font-size: 11px; color: #76675D; line-height: 1.3; }

  .wr-wf-steps {
    display: flex;
    flex-direction: column;
    justify-content: center;
    gap: 6px;
  }

  .wr-wf-card {
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
  .wr-wf-card:hover { transform: translateY(-2px); border-color: #876039; }

  .wr-wf-ico {
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
  .wr-wf-ico svg { width: 18px; height: 18px; stroke: currentColor; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }

  .wr-wf-txt { display: flex; flex-direction: column; min-width: 0; }
  .wr-wf-txt b { font-size: 13px; font-weight: 600; color: #21160F; line-height: 1.25; }
  .wr-wf-txt span { font-size: 11.5px; color: #76675D; line-height: 1.3; }

  .wr-wf-arrow {
    text-align: center;
    font-size: 15px;
    font-weight: 500;
    color: #876039;
    line-height: 1;
  }

  .wr-phone-visual {
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .wr-phone-mockup {
    width: 100%;
    max-width: 224px;
    background: #1C1510;
    border-radius: 28px;
    padding: 7px;
    box-shadow: 0 16px 36px rgba(28, 20, 15, 0.28);
    border: 2px solid #362920;
  }

  .wr-phone-screen {
    background: #FFFFFF;
    border-radius: 22px;
    padding: 10px 9px 12px;
    overflow: hidden;
  }

  .wr-phone-island {
    width: 38px;
    height: 4px;
    background: #1C1510;
    border-radius: 4px;
    margin: 0 auto 6px;
  }

  .wr-phone-header { text-align: center; margin-bottom: 7px; }
  .wr-phone-title { font-family: 'Outfit', sans-serif; font-size: 13.5px; font-weight: 600; color: #21160F; line-height: 1.2; }
  .wr-phone-sub { font-size: 8px; color: #76675D; }

  .wr-phone-tabs {
    display: flex;
    gap: 3.5px;
    margin-bottom: 8px;
    justify-content: center;
  }
  .wr-tab-pill {
    font-size: 7.5px;
    font-weight: 700;
    padding: 2.5px 7px;
    border-radius: 12px;
    background: #FAF7F2;
    color: #6E6157;
    white-space: nowrap;
  }
  .wr-tab-active { background: #875A38; color: #FFFFFF; }

  .wr-req-list {
    display: flex;
    flex-direction: column;
    gap: 6px;
  }

  .wr-req-row {
    padding: 6px 7px;
    background: #FAF8F5;
    border: 1px solid #EFE8DE;
    border-radius: 9px;
    display: flex;
    flex-direction: column;
    gap: 3px;
  }

  .wr-rq-top {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 4px;
  }
  .wr-rq-name { font-size: 9.5px; font-weight: 700; color: #21160F; }
  .wr-rq-badge {
    font-size: 6.5px;
    font-weight: 700;
    padding: 1.5px 5px;
    border-radius: 4px;
  }
  .wr-rq-badge.new { background: #FEF3C7; color: #B45309; }
  .wr-rq-badge.ip { background: #DBEAFE; color: #1D4ED8; }
  .wr-rq-badge.done { background: #DCFCE7; color: #16A34A; }

  .wr-rq-meta {
    display: flex;
    justify-content: space-between;
    font-size: 7.5px;
    color: #76675D;
  }
  .wr-rq-tbl { font-weight: 700; color: #876039; }

  .wr-bottom-cta {
    margin-top: 16px;
    display: flex;
    justify-content: center;
  }

  .wr-bottom-cta-badge {
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
  .wr-bottom-cta-badge svg {
    width: 14px;
    height: 14px;
    stroke: #FFFFFF;
    fill: none;
    stroke-width: 2;
  }

  @media (max-width: 1080px) {
    .wr-compare-container {
      grid-template-columns: 1fr;
      gap: 36px;
    }
    .wr-compare-center-arrow {
      display: none;
    }
  }

  @media (max-width: 640px) {
    .wr-split-body,
    .wr-compare-digital .wr-split-body {
      grid-template-columns: 1fr;
      gap: 16px;
    }
    .wr-paper-visual {
      max-width: 260px;
      margin: 0 auto;
    }
  }
</style>

<section>
  <div class="w">
    <div class="hd r">
      <h2>Stop Making Guests Wait<br>for <span class="sf">Attention.</span></h2>
      <p>In a busy restaurant, guests may need a waiter, water, extra cutlery, the bill or assistance — but staff may not immediately notice. Geni Menu makes it easier to connect table-side needs with the team.</p>
    </div>

    <div class="wr-compare-container r">
      <!-- Center Transition Arrow -->
      <div class="wr-compare-center-arrow">
        <div class="wr-center-arrow-circle">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <line x1="5" y1="12" x2="19" y2="12"></line>
            <polyline points="12 5 19 12 12 19"></polyline>
          </svg>
        </div>
      </div>

      <!-- LEFT CARD: Traditional Service -->
      <div class="wr-compare-card wr-compare-traditional">
        <div class="wr-compare-header">
          <div class="wr-badge-icon wr-badge-red">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
              <line x1="18" y1="6" x2="6" y2="18"></line>
              <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
          </div>
          <div>
            <h3 class="wr-compare-title text-red">Traditional Service</h3>
            <p class="wr-compare-subtitle">Waving hands, missed signals and slow table response</p>
          </div>
        </div>

        <div class="wr-split-body">
          <div class="wr-paper-visual">
            <div class="wr-paper-board">
              <div class="wr-paper-clip"></div>
              <div class="wr-paper-sheet">
                <div class="wr-paper-header">FLOOR CALLS</div>

                <div class="wr-paper-slot-title">Dining Hall</div>
                <div class="wr-paper-row"><span>Table 03 — Water</span><span class="err-tag">8m wait</span></div>
                <div class="wr-paper-row"><span>Table 07 — Bill</span><span class="err-tag">Missed!</span></div>

                <div class="wr-paper-slot-title">Family Section</div>
                <div class="wr-paper-row"><span>Table 11 — Help</span><b>No staff</b></div>
                <div class="wr-paper-row"><span>Table 14 — Cutlery</span><span class="err-tag">Delayed</span></div>

                <div class="wr-paper-slot-title">Outdoor</div>
                <div class="wr-paper-row"><span>Table 18 — Order</span><span class="err-tag">Ignored!</span></div>
              </div>
            </div>
          </div>

          <div class="wr-points-list">
            <div class="wr-point-card">
              <div class="wr-point-ico">
                <svg viewBox="0 0 24 24"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
              </div>
              <div class="wr-point-txt">
                <b>Guest Looks Around</b>
                <span>Trying to spot a free waiter across the room</span>
              </div>
            </div>

            <div class="wr-point-card">
              <div class="wr-point-ico">
                <svg viewBox="0 0 24 24"><path d="M18 8h1a4 4 0 0 1 0 8h-1"/><path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"/></svg>
              </div>
              <div class="wr-point-txt">
                <b>Tries to Get Attention</b>
                <span>Awkward hand waving during busy dinner rush</span>
              </div>
            </div>

            <div class="wr-point-card">
              <div class="wr-point-ico">
                <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
              </div>
              <div class="wr-point-txt">
                <b>Waits While Staff Are Busy</b>
                <span>Team is occupied at other tables or counter</span>
              </div>
            </div>

            <div class="wr-point-card">
              <div class="wr-point-ico">
                <svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
              </div>
              <div class="wr-point-txt">
                <b>Verbal Follow-ups Missed</b>
                <span>Requests forgotten between kitchen &amp; floor</span>
              </div>
            </div>

            <div class="wr-point-card">
              <div class="wr-point-ico">
                <svg viewBox="0 0 24 24"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"/><path d="M12 9v4"/><path d="M12 17h.01"/></svg>
              </div>
              <div class="wr-point-txt">
                <b>Handled After a Delay</b>
                <span>Slow response lowers guest satisfaction</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- RIGHT CARD: With Geni Menu -->
      <div class="wr-compare-card wr-compare-digital">
        <div class="wr-compare-header">
          <div class="wr-badge-icon wr-badge-brown">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
              <polyline points="20 6 9 17 4 12"></polyline>
            </svg>
          </div>
          <div>
            <h3 class="wr-compare-title text-brown">With Geni Menu</h3>
            <p class="wr-compare-subtitle">Instant table alerts, faster response and happier guests</p>
          </div>
        </div>

        <div class="wr-split-body">
          <div class="wr-wf-steps">
            <div class="wr-wf-card">
              <div class="wr-wf-ico">
                <svg viewBox="0 0 24 24"><rect width="14" height="20" x="5" y="2" rx="2" ry="2"/><path d="M12 18h.01"/></svg>
              </div>
              <div class="wr-wf-txt">
                <b>Guest Sends Table Request</b>
                <span>1-tap call for water, bill or waiter</span>
              </div>
            </div>

            <div class="wr-wf-arrow">&darr;</div>

            <div class="wr-wf-card">
              <div class="wr-wf-ico">
                <svg viewBox="0 0 24 24"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/></svg>
              </div>
              <div class="wr-wf-txt">
                <b>Team Receives Live Alert</b>
                <span>Exact table number pops up instantly</span>
              </div>
            </div>

            <div class="wr-wf-arrow">&darr;</div>

            <div class="wr-wf-card">
              <div class="wr-wf-ico">
                <svg viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
              </div>
              <div class="wr-wf-txt">
                <b>Staff Responds &amp; Completes</b>
                <span>Tracked until marked done in real time</span>
              </div>
            </div>
          </div>

          <div class="wr-phone-visual">
            <div class="wr-phone-mockup">
              <div class="wr-phone-screen">
                <div class="wr-phone-island"></div>
                <div class="wr-phone-header">
                  <div class="wr-phone-title">Waiter Requests</div>
                  <div class="wr-phone-sub">Live table-side alerts</div>
                </div>
                <div class="wr-phone-tabs">
                  <span class="wr-tab-pill wr-tab-active">All</span>
                  <span class="wr-tab-pill">New</span>
                  <span class="wr-tab-pill">Done</span>
                </div>
                <div class="wr-req-list">
                  <div class="wr-req-row">
                    <div class="wr-rq-top">
                      <span class="wr-rq-name">Need Water Bottle</span>
                      <span class="wr-rq-badge new">New</span>
                    </div>
                    <div class="wr-rq-meta">
                      <span>Just now &bull; Floor 1</span>
                      <span class="wr-rq-tbl">Table 04</span>
                    </div>
                  </div>

                  <div class="wr-req-row">
                    <div class="wr-rq-top">
                      <span class="wr-rq-name">Request Final Bill</span>
                      <span class="wr-rq-badge ip">On Way</span>
                    </div>
                    <div class="wr-rq-meta">
                      <span>1m ago &bull; AC Hall</span>
                      <span class="wr-rq-tbl">Table 08</span>
                    </div>
                  </div>

                  <div class="wr-req-row">
                    <div class="wr-rq-top">
                      <span class="wr-rq-name">Extra Cutlery Set</span>
                      <span class="wr-rq-badge done">Done</span>
                    </div>
                    <div class="wr-rq-meta">
                      <span>3m ago &bull; Patio</span>
                      <span class="wr-rq-tbl">Table 12</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="wr-bottom-cta">
          <div class="wr-bottom-cta-badge">
            <svg viewBox="0 0 24 24"><path d="m12 3-1.9 5.8a2 2 0 0 1-1.3 1.3L3 12l5.8 1.9a2 2 0 0 1 1.3 1.3L12 21l1.9-5.8a2 2 0 0 1 1.3-1.3L21 12l-5.8-1.9a2 2 0 0 1-1.3-1.3L12 3Z"/></svg>
            <span>Smooth, Organized Table-Side Service!</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= REQUEST DASHBOARD CONSOLE ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd r">
      <h2>See Every Request.<br>From <span class="sf">One Place.</span></h2>
      <p>Give your service team a clear view of table-side requests so nothing gets overlooked during busy service.</p>
    </div>

    <div class="rm-win r">
      <div class="rm-win-bar">
        <div class="rm-win-dots"><i></i><i></i><i></i></div>
        <div class="rm-win-ttl">WAITER REQUESTS CONSOLE</div>
        <div style="display: flex; gap: 6px; flex-wrap: wrap;">
          <button type="button" class="rm-filter-btn active" onclick="filterWrConsole('all', this)">All</button>
          <button type="button" class="rm-filter-btn" onclick="filterWrConsole('new', this)">New</button>
          <button type="button" class="rm-filter-btn" onclick="filterWrConsole('in-progress', this)">In Progress</button>
          <button type="button" class="rm-filter-btn" onclick="filterWrConsole('completed', this)">Completed</button>
        </div>
      </div>

      <div class="rm-win-body" style="padding: 20px;">
        <!-- Live Summary Strip -->
        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 14px; margin-bottom: 20px;">
          <div style="padding: 14px 16px; background: #FFFBEB; border: 1px solid #FDE68A; border-radius: 14px; display: flex; justify-content: space-between; align-items: center;">
            <span style="font-size: 12.5px; font-weight: 700; color: #92400E;">New Requests</span>
            <span style="font-family: 'Outfit', sans-serif; font-size: 24px; font-weight: 700; color: #92400E;">08</span>
          </div>
          <div style="padding: 14px 16px; background: #EFF6FF; border: 1px solid #BFDBFE; border-radius: 14px; display: flex; justify-content: space-between; align-items: center;">
            <span style="font-size: 12.5px; font-weight: 700; color: #1E40AF;">In Progress</span>
            <span style="font-family: 'Outfit', sans-serif; font-size: 24px; font-weight: 700; color: #1E40AF;">05</span>
          </div>
          <div style="padding: 14px 16px; background: #ECFDF5; border: 1px solid #A7F3D0; border-radius: 14px; display: flex; justify-content: space-between; align-items: center;">
            <span style="font-size: 12.5px; font-weight: 700; color: #065F46;">Completed</span>
            <span style="font-family: 'Outfit', sans-serif; font-size: 24px; font-weight: 700; color: #065F46;">24</span>
          </div>
        </div>

        <div style="overflow-x: auto;">
          <table class="rm-table" id="wr-console-table">
            <thead>
              <tr>
                <th>Table</th>
                <th>Request Type</th>
                <th>Requested</th>
                <th>Assigned Staff</th>
                <th>Status</th>
                <th style="text-align: right;">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr data-status="new">
                <td>
                  <div style="display: flex; align-items: center; gap: 10px;">
                    <span class="rm-avatar">T08</span>
                    <span style="font-weight: 700; color: #21160F;">Table 08</span>
                  </div>
                </td>
                <td style="font-weight: 700; color: #21160F;">Call Waiter</td>
                <td style="font-weight: 700; color: #876039;">2 min ago</td>
                <td>Waiter 03</td>
                <td><span class="badge pending">New</span></td>
                <td style="text-align: right;"><button type="button" style="border: 1px solid #876039; background: #876039; color: #fff; padding: 6px 13px; border-radius: 8px; font-weight: 700; font-size: 12px; cursor: pointer;">Respond</button></td>
              </tr>

              <tr data-status="in-progress">
                <td>
                  <div style="display: flex; align-items: center; gap: 10px;">
                    <span class="rm-avatar">T14</span>
                    <span style="font-weight: 700; color: #21160F;">Table 14</span>
                  </div>
                </td>
                <td style="font-weight: 700; color: #21160F;">Extra Water</td>
                <td style="font-weight: 700; color: #876039;">4 min ago</td>
                <td>Waiter 01</td>
                <td><span class="badge seated">In Progress</span></td>
                <td style="text-align: right;"><button type="button" style="border: 1px solid rgba(135,96,57,0.22); background: #FAF6F0; color: #21160F; padding: 6px 13px; border-radius: 8px; font-weight: 700; font-size: 12px; cursor: pointer;">View</button></td>
              </tr>

              <tr data-status="completed">
                <td>
                  <div style="display: flex; align-items: center; gap: 10px;">
                    <span class="rm-avatar">T05</span>
                    <span style="font-weight: 700; color: #21160F;">Table 05</span>
                  </div>
                </td>
                <td style="font-weight: 700; color: #21160F;">Request Bill</td>
                <td style="font-weight: 700; color: #876039;">7 min ago</td>
                <td>Waiter 02</td>
                <td><span class="badge confirmed">Completed</span></td>
                <td style="text-align: right;"><button type="button" style="border: 1px solid #A7F3D0; background: #ECFDF5; color: #065F46; padding: 6px 13px; border-radius: 8px; font-weight: 700; font-size: 12px; cursor: pointer;">Done ✓</button></td>
              </tr>

              <tr data-status="new">
                <td>
                  <div style="display: flex; align-items: center; gap: 10px;">
                    <span class="rm-avatar">T21</span>
                    <span style="font-weight: 700; color: #21160F;">Table 21</span>
                  </div>
                </td>
                <td style="font-weight: 700; color: #21160F;">Extra Spoon</td>
                <td style="font-weight: 700; color: #876039;">9 min ago</td>
                <td>Waiter 04</td>
                <td><span class="badge pending">New</span></td>
                <td style="text-align: right;"><button type="button" style="border: 1px solid #876039; background: #876039; color: #fff; padding: 6px 13px; border-radius: 8px; font-weight: 700; font-size: 12px; cursor: pointer;">Respond</button></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= COMMON REQUESTS (EDITORIAL IMAGE CARDS) ================= -->
<section>
  <div class="w">
    <div class="hd r">
      <div class="eb">REQUEST TYPES</div>
      <h2>Simple Requests. <span class="sf">Clear Actions.</span></h2>
      <p>Restaurant guests can send common table-side requests directly through Geni Menu.</p>
    </div>

    <div class="rm-ind-grid r">
      <div class="rm-ind-card">
        <div class="rm-ind-media" style="height: 155px;">
          <img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?w=600&auto=format&fit=crop&q=80" alt="Call Waiter" loading="lazy">
          <div class="rm-ind-scrim"></div>
          <span class="rm-ind-badge">01</span>
        </div>
        <div class="rm-ind-body">
          <h4>
            <svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9M13.73 21a2 2 0 0 1-3.46 0"/></svg>
            Call Waiter
          </h4>
          <p>Guest needs general assistance from staff.</p>
        </div>
      </div>

      <div class="rm-ind-card">
        <div class="rm-ind-media" style="height: 155px;">
          <img src="https://images.unsplash.com/photo-1548839140-29a749e1cf4d?w=600&auto=format&fit=crop&q=80" alt="Request Water" loading="lazy">
          <div class="rm-ind-scrim"></div>
          <span class="rm-ind-badge">02</span>
        </div>
        <div class="rm-ind-body">
          <h4>
            <svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"/></svg>
            Request Water
          </h4>
          <p>Guest needs drinking water brought to the table.</p>
        </div>
      </div>

      <div class="rm-ind-card">
        <div class="rm-ind-media" style="height: 155px;">
          <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=600&auto=format&fit=crop&q=80" alt="Request Bill" loading="lazy">
          <div class="rm-ind-scrim"></div>
          <span class="rm-ind-badge">03</span>
        </div>
        <div class="rm-ind-body">
          <h4>
            <svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><rect x="5" y="2" width="14" height="20" rx="2"/><line x1="12" y1="18" x2="12.01" y2="18"/><path d="M9 7h6M9 11h4"/></svg>
            Request Bill
          </h4>
          <p>Guest is ready to check out and needs the bill.</p>
        </div>
      </div>

      <div class="rm-ind-card">
        <div class="rm-ind-media" style="height: 155px;">
          <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=600&auto=format&fit=crop&q=80" alt="Extra Cutlery" loading="lazy">
          <div class="rm-ind-scrim"></div>
          <span class="rm-ind-badge">04</span>
        </div>
        <div class="rm-ind-body">
          <h4>
            <svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2"/><path d="M7 2v20"/><path d="M21 15V2"/><path d="M18 15h3"/><path d="M15 2h6v6h-6z"/></svg>
            Extra Cutlery
          </h4>
          <p>Request additional spoons, forks or knives for the table.</p>
        </div>
      </div>

      <div class="rm-ind-card">
        <div class="rm-ind-media" style="height: 155px;">
          <img src="https://images.unsplash.com/photo-1559339352-11d035aa65de?w=600&auto=format&fit=crop&q=80" alt="Extra Items" loading="lazy">
          <div class="rm-ind-scrim"></div>
          <span class="rm-ind-badge">05</span>
        </div>
        <div class="rm-ind-body">
          <h4>
            <svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
            Extra Items
          </h4>
          <p>Napkins, plates, glasses or other table items.</p>
        </div>
      </div>

      <div class="rm-ind-card">
        <div class="rm-ind-media" style="height: 155px;">
          <img src="https://images.unsplash.com/photo-1554118811-1e0d58224f24?w=600&auto=format&fit=crop&q=80" alt="Custom Request" loading="lazy">
          <div class="rm-ind-scrim"></div>
          <span class="rm-ind-badge">06</span>
        </div>
        <div class="rm-ind-body">
          <h4>
            <svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
            Custom Request
          </h4>
          <p>Guest communicates another specific requirement.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= TABLE-LINKED REQUESTS ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="rm-split r">
      <div>
        <div class="eb">TABLE-LINKED VISIBILITY</div>
        <h2>Know Exactly Which Table <span class="sf">Needs You.</span></h2>
        <p style="margin: 14px 0 24px;">
          Every request is connected to the table that created it, giving your team the context they need to respond quickly.
        </p>

        <ul class="rm-feat-list">
          <li class="rm-feat-row"><span class="rm-check-dot">✓</span> Table number attached to every request</li>
          <li class="rm-feat-row"><span class="rm-check-dot">✓</span> Request type and time visible at a glance</li>
          <li class="rm-feat-row"><span class="rm-check-dot">✓</span> Status updates tracked per table request</li>
        </ul>

        <div class="wr-photo-strip">
          <img src="https://images.unsplash.com/photo-1514933651103-005eec06c04b?w=800&auto=format&fit=crop&q=80" alt="Restaurant floor table service" loading="lazy">
          <div class="wr-photo-strip-scrim"></div>
          <div class="wr-photo-strip-caption">
            <div style="font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; opacity: 0.85;">Live Floor Sync</div>
            <div style="font-family: 'Outfit', sans-serif; font-size: 16px; font-weight: 700;">Every table alert maps directly to your floor plan</div>
          </div>
        </div>
      </div>

      <!-- Floor Plan Window -->
      <div class="rm-win">
        <div class="rm-win-bar">
          <div class="rm-win-dots"><i></i><i></i><i></i></div>
          <div class="rm-win-ttl">RESTAURANT FLOOR — REQUEST VIEW</div>
          <span class="rm-win-pill">Live Floor</span>
        </div>
        <div class="rm-win-body" style="padding: 22px;">
          <div class="rm-floor-grid">
            <div class="rm-table-tile" style="border: 1.5px solid rgba(135,96,57,0.18); background: #FAF8F5;">
              <div style="font-family: 'Outfit', sans-serif; font-weight: 700; font-size: 15px; color: #21160F;">T01</div>
              <div style="margin-top: 8px; font-weight: 700; font-size: 10px; color: #6E6157; background: #EFE8DE; padding: 3px 8px; border-radius: 999px; display: inline-block;">FREE</div>
            </div>
            <div class="rm-table-tile" style="border: 1.5px solid rgba(135,96,57,0.18); background: #FAF8F5;">
              <div style="font-family: 'Outfit', sans-serif; font-weight: 700; font-size: 15px; color: #21160F;">T02</div>
              <div style="margin-top: 8px; font-weight: 700; font-size: 10px; color: #6E6157; background: #EFE8DE; padding: 3px 8px; border-radius: 999px; display: inline-block;">FREE</div>
            </div>
            <div class="rm-table-tile" style="border: 1.5px solid rgba(135,96,57,0.18); background: #FAF8F5;">
              <div style="font-family: 'Outfit', sans-serif; font-weight: 700; font-size: 15px; color: #21160F;">T03</div>
              <div style="margin-top: 8px; font-weight: 700; font-size: 10px; color: #6E6157; background: #EFE8DE; padding: 3px 8px; border-radius: 999px; display: inline-block;">FREE</div>
            </div>
            <div class="rm-table-tile" style="border: 1.5px solid #FBBF24; background: #FFFBEB;" title="Call Waiter">
              <div style="font-family: 'Outfit', sans-serif; font-weight: 700; font-size: 15px; color: #21160F;">T04</div>
              <div style="margin-top: 8px; font-weight: 700; font-size: 10px; color: #92400E; background: #FEF3C7; padding: 3px 8px; border-radius: 999px; display: inline-block;">CALL WAITER</div>
            </div>
            <div class="rm-table-tile" style="border: 1.5px solid rgba(135,96,57,0.18); background: #FAF8F5;">
              <div style="font-family: 'Outfit', sans-serif; font-weight: 700; font-size: 15px; color: #21160F;">T05</div>
              <div style="margin-top: 8px; font-weight: 700; font-size: 10px; color: #6E6157; background: #EFE8DE; padding: 3px 8px; border-radius: 999px; display: inline-block;">FREE</div>
            </div>
            <div class="rm-table-tile" style="border: 1.5px solid rgba(135,96,57,0.18); background: #FAF8F5;">
              <div style="font-family: 'Outfit', sans-serif; font-weight: 700; font-size: 15px; color: #21160F;">T06</div>
              <div style="margin-top: 8px; font-weight: 700; font-size: 10px; color: #6E6157; background: #EFE8DE; padding: 3px 8px; border-radius: 999px; display: inline-block;">FREE</div>
            </div>
            <div class="rm-table-tile" style="border: 1.5px solid rgba(135,96,57,0.18); background: #FAF8F5;">
              <div style="font-family: 'Outfit', sans-serif; font-weight: 700; font-size: 15px; color: #21160F;">T07</div>
              <div style="margin-top: 8px; font-weight: 700; font-size: 10px; color: #6E6157; background: #EFE8DE; padding: 3px 8px; border-radius: 999px; display: inline-block;">FREE</div>
            </div>
            <div class="rm-table-tile" style="border: 1.5px solid #FBBF24; background: #FFFBEB;" title="Extra Water">
              <div style="font-family: 'Outfit', sans-serif; font-weight: 700; font-size: 15px; color: #21160F;">T08</div>
              <div style="margin-top: 8px; font-weight: 700; font-size: 10px; color: #92400E; background: #FEF3C7; padding: 3px 8px; border-radius: 999px; display: inline-block;">WATER</div>
            </div>
            <div class="rm-table-tile" style="border: 1.5px solid rgba(135,96,57,0.18); background: #FAF8F5;">
              <div style="font-family: 'Outfit', sans-serif; font-weight: 700; font-size: 15px; color: #21160F;">T09</div>
              <div style="margin-top: 8px; font-weight: 700; font-size: 10px; color: #6E6157; background: #EFE8DE; padding: 3px 8px; border-radius: 999px; display: inline-block;">FREE</div>
            </div>
            <div class="rm-table-tile" style="border: 1.5px solid rgba(135,96,57,0.18); background: #FAF8F5;">
              <div style="font-family: 'Outfit', sans-serif; font-weight: 700; font-size: 15px; color: #21160F;">T10</div>
              <div style="margin-top: 8px; font-weight: 700; font-size: 10px; color: #6E6157; background: #EFE8DE; padding: 3px 8px; border-radius: 999px; display: inline-block;">FREE</div>
            </div>
            <div class="rm-table-tile" style="border: 1.5px solid #34D399; background: #ECFDF5;" title="Bill Completed">
              <div style="font-family: 'Outfit', sans-serif; font-weight: 700; font-size: 15px; color: #21160F;">T11</div>
              <div style="margin-top: 8px; font-weight: 700; font-size: 10px; color: #065F46; background: #D1FAE5; padding: 3px 8px; border-radius: 999px; display: inline-block;">DONE ✓</div>
            </div>
            <div class="rm-table-tile" style="border: 1.5px solid rgba(135,96,57,0.18); background: #FAF8F5;">
              <div style="font-family: 'Outfit', sans-serif; font-weight: 700; font-size: 15px; color: #21160F;">T12</div>
              <div style="margin-top: 8px; font-weight: 700; font-size: 10px; color: #6E6157; background: #EFE8DE; padding: 3px 8px; border-radius: 999px; display: inline-block;">FREE</div>
            </div>
            <div class="rm-table-tile" style="border: 1.5px solid rgba(135,96,57,0.18); background: #FAF8F5;">
              <div style="font-family: 'Outfit', sans-serif; font-weight: 700; font-size: 15px; color: #21160F;">T13</div>
              <div style="margin-top: 8px; font-weight: 700; font-size: 10px; color: #6E6157; background: #EFE8DE; padding: 3px 8px; border-radius: 999px; display: inline-block;">FREE</div>
            </div>
            <div class="rm-table-tile" style="border: 1.5px solid #FBBF24; background: #FFFBEB;" title="Request Bill">
              <div style="font-family: 'Outfit', sans-serif; font-weight: 700; font-size: 15px; color: #21160F;">T14</div>
              <div style="margin-top: 8px; font-weight: 700; font-size: 10px; color: #92400E; background: #FEF3C7; padding: 3px 8px; border-radius: 999px; display: inline-block;">REQ. BILL</div>
            </div>
            <div class="rm-table-tile" style="border: 1.5px solid rgba(135,96,57,0.18); background: #FAF8F5;">
              <div style="font-family: 'Outfit', sans-serif; font-weight: 700; font-size: 15px; color: #21160F;">T15</div>
              <div style="margin-top: 8px; font-weight: 700; font-size: 10px; color: #6E6157; background: #EFE8DE; padding: 3px 8px; border-radius: 999px; display: inline-block;">FREE</div>
            </div>
          </div>

          <!-- Legend -->
          <div style="margin-top: 18px; padding-top: 14px; border-top: 1px solid var(--line); display: flex; gap: 16px; flex-wrap: wrap; font-size: 11.5px; font-weight: 700; color: #4A3D34;">
            <span style="display: inline-flex; align-items: center; gap: 6px;"><i style="width: 9px; height: 9px; border-radius: 50%; background: var(--yellow); display: inline-block;"></i> Active Request</span>
            <span style="display: inline-flex; align-items: center; gap: 6px;"><i style="width: 9px; height: 9px; border-radius: 50%; background: var(--green); display: inline-block;"></i> Completed</span>
            <span style="display: inline-flex; align-items: center; gap: 6px;"><i style="width: 9px; height: 9px; border-radius: 50%; background: #D6C7B8; display: inline-block;"></i> Free</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= STATUS WORKFLOW ================= -->
<section>
  <div class="w">
    <div class="hd r">
      <h2>From Request <span class="sf">to Resolution.</span></h2>
      <p>A simple, clear status path keeps your team informed from the moment a request is created to when it's completed.</p>
    </div>

    <div class="rm-prog-grid r">
      <div class="rm-prog-card active">
        <div class="rm-prog-num">1</div>
        <h5>Request Created</h5>
        <p>Guest sends a request from the table.</p>
      </div>

      <div class="rm-prog-card active">
        <div class="rm-prog-num">2</div>
        <h5>Team Notified</h5>
        <p>Restaurant team sees the request.</p>
      </div>

      <div class="rm-prog-card active">
        <div class="rm-prog-num">3</div>
        <h5>Staff Responds</h5>
        <p>The appropriate staff member handles it.</p>
      </div>

      <div class="rm-prog-card">
        <div class="rm-prog-num">4</div>
        <h5>Request Completed</h5>
        <p>The request is marked complete.</p>
      </div>
    </div>
  </div>
</section>

<!-- ================= REQUEST DETAILS UI ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="rm-split r">
      <!-- Detail Window -->
      <div class="rm-win">
        <div class="rm-win-bar">
          <div class="rm-win-dots"><i></i><i></i><i></i></div>
          <div class="rm-win-ttl">REQUEST DETAIL</div>
          <span class="badge pending">NEW</span>
        </div>
        <div class="rm-win-body">
          <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 18px; padding-bottom: 16px; border-bottom: 1px solid var(--line);">
            <div>
              <div style="font-size: 10.5px; font-weight: 700; color: var(--mute); letter-spacing: .08em; text-transform: uppercase; margin-bottom: 4px;">REQUEST ID</div>
              <div style="font-size: 20px; font-weight: 700; font-family: 'Outfit', sans-serif; color: var(--br);">#REQ-1048</div>
            </div>
            <span class="badge pending">New</span>
          </div>

          <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; font-size: 13.5px; margin-bottom: 14px;">
            <div style="padding: 12px 14px; background: #FAF7F3; border-radius: 12px; border: 1px solid rgba(135,96,57,0.14);">
              <div style="font-size: 10.5px; font-weight: 700; color: var(--mute); text-transform: uppercase; letter-spacing: .06em; margin-bottom: 4px;">Table</div>
              <div style="font-weight: 700; color: var(--br); font-size: 17px;">T08</div>
            </div>
            <div style="padding: 12px 14px; background: #FAF7F3; border-radius: 12px; border: 1px solid rgba(135,96,57,0.14);">
              <div style="font-size: 10.5px; font-weight: 700; color: var(--mute); text-transform: uppercase; letter-spacing: .06em; margin-bottom: 4px;">Created</div>
              <div style="font-weight: 700; color: var(--ink); font-size: 15px;">12:42 PM</div>
            </div>
            <div style="padding: 12px 14px; background: #FAF7F3; border-radius: 12px; border: 1px solid rgba(135,96,57,0.14); grid-column: 1 / -1;">
              <div style="font-size: 10.5px; font-weight: 700; color: var(--mute); text-transform: uppercase; letter-spacing: .06em; margin-bottom: 4px;">Request Type</div>
              <div style="font-weight: 700; color: var(--ink); font-size: 15px;">Extra Water</div>
            </div>
          </div>

          <div style="padding: 12px 14px; background: #FFFBEB; border: 1px solid #FDE68A; border-radius: 12px; margin-bottom: 14px;">
            <div style="font-size: 10.5px; font-weight: 700; color: #92400E; text-transform: uppercase; letter-spacing: .06em; margin-bottom: 4px;">Guest Note</div>
            <div style="font-weight: 600; color: #78350F; font-size: 13.5px; font-style: italic;">"Please bring two bottles."</div>
          </div>

          <div style="display: flex; justify-content: space-between; align-items: center; padding: 11px 14px; background: #FAF7F3; border-radius: 12px; border: 1px solid rgba(135,96,57,0.14); margin-bottom: 16px;">
            <span style="font-size: 13px; font-weight: 700; color: var(--mute);">Assigned Staff</span>
            <span style="font-weight: 700; color: var(--ink); font-size: 13.5px;">Waiter 03</span>
          </div>

          <div style="display: flex; flex-direction: column; gap: 8px;">
            <button type="button" class="btn p" style="padding: 11px; font-size: 13px; border-radius: 10px;">Accept Request</button>
            <button type="button" class="btn o" style="padding: 11px; font-size: 13px; border-radius: 10px;">Mark In Progress</button>
            <button type="button" style="width: 100%; padding: 11px; border-radius: 10px; border: 1.5px solid var(--green); background: #ECFDF5; color: #065F46; font: 700 13px 'Plus Jakarta Sans', sans-serif; cursor: pointer;">Complete Request ✓</button>
          </div>
        </div>
      </div>

      <!-- Content -->
      <div>
        <div class="eb">REQUEST DETAILS</div>
        <h2>Help Your Team Respond <span class="sf">With Context.</span></h2>
        <p style="margin: 14px 0 24px;">
          Staff can see all the information they need to act on each request without any confusion about which table or what is required.
        </p>

        <ul class="rm-feat-list">
          <li class="rm-feat-row"><span class="rm-check-dot">✓</span> Table number and request type</li>
          <li class="rm-feat-row"><span class="rm-check-dot">✓</span> Time of request creation</li>
          <li class="rm-feat-row"><span class="rm-check-dot">✓</span> Additional notes from the guest</li>
          <li class="rm-feat-row"><span class="rm-check-dot">✓</span> Current status and assigned staff</li>
          <li class="rm-feat-row"><span class="rm-check-dot">✓</span> Clear action buttons to accept or complete</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ================= PEAK-HOUR MANAGEMENT ================= -->
<section>
  <div class="w">
    <div class="rm-split r">
      <div>
        <div class="eb">PEAK-HOUR MANAGEMENT</div>
        <h2>Stay Organized When the Dining Room <span class="sf">Gets Busy.</span></h2>
        <p style="margin: 14px 0 26px;">
          During peak service periods, multiple requests arrive simultaneously. Having them all visible in one place helps your team stay on top of every table.
        </p>

        <div style="display: flex; flex-direction: column; gap: 12px; background: #FFFFFF; padding: 22px; border-radius: 18px; border: 1px solid rgba(135,96,57,0.14); box-shadow: 0 8px 24px rgba(33,22,15,0.04);">
          <div style="display: flex; align-items: center; justify-content: space-between; font-size: 13px; font-weight: 700;">
            <span style="width: 112px; color: #4A3D34;">11:00 AM</span>
            <div style="flex: 1; margin: 0 14px; height: 11px; background: #F1E7DB; border-radius: 99px; overflow: hidden;"><div style="width: 18%; height: 100%; background: #B88E56; border-radius: 99px;"></div></div>
            <span style="width: 72px; text-align: right; color: #6E6157;">2 req</span>
          </div>

          <div style="display: flex; align-items: center; justify-content: space-between; font-size: 13px; font-weight: 700;">
            <span style="width: 112px; color: #4A3D34;">12:00 PM</span>
            <div style="flex: 1; margin: 0 14px; height: 11px; background: #F1E7DB; border-radius: 99px; overflow: hidden;"><div style="width: 48%; height: 100%; background: #A27646; border-radius: 99px;"></div></div>
            <span style="width: 72px; text-align: right; color: #6E6157;">5 req</span>
          </div>

          <div style="display: flex; align-items: center; justify-content: space-between; font-size: 13px; font-weight: 700;">
            <span style="width: 112px; color: #4A3D34;">1:00 PM</span>
            <div style="flex: 1; margin: 0 14px; height: 11px; background: #F1E7DB; border-radius: 99px; overflow: hidden;"><div style="width: 70%; height: 100%; background: #876039; border-radius: 99px;"></div></div>
            <span style="width: 72px; text-align: right; color: #21160F;">8 req</span>
          </div>

          <div style="display: flex; align-items: center; justify-content: space-between; font-size: 13px; font-weight: 700;">
            <span style="width: 112px; color: #4A3D34;">3:00 PM</span>
            <div style="flex: 1; margin: 0 14px; height: 11px; background: #F1E7DB; border-radius: 99px; overflow: hidden;"><div style="width: 28%; height: 100%; background: #B88E56; border-radius: 99px;"></div></div>
            <span style="width: 72px; text-align: right; color: #6E6157;">3 req</span>
          </div>

          <div style="display: flex; align-items: center; justify-content: space-between; font-size: 13px; font-weight: 700;">
            <span style="width: 112px; color: #4A3D34;">7:00 PM</span>
            <div style="flex: 1; margin: 0 14px; height: 11px; background: #F1E7DB; border-radius: 99px; overflow: hidden;"><div style="width: 88%; height: 100%; background: #876039; border-radius: 99px;"></div></div>
            <span style="width: 72px; text-align: right; color: #21160F;">10 req</span>
          </div>

          <div style="display: flex; align-items: center; justify-content: space-between; font-size: 13px; font-weight: 700; padding-top: 6px; border-top: 1px dashed rgba(135,96,57,0.2);">
            <span style="width: 112px; color: #876039;">8:00 PM (Peak)</span>
            <div style="flex: 1; margin: 0 14px; height: 12px; background: #F1E7DB; border-radius: 99px; overflow: hidden;"><div style="width: 100%; height: 100%; background: linear-gradient(90deg, #876039 0%, #6f4e2d 100%); border-radius: 99px;"></div></div>
            <span style="width: 72px; text-align: right; color: #876039;">12 req</span>
          </div>
        </div>
      </div>

      <!-- Editorial Busy Service Photo + Live Overlay -->
      <div style="position: relative; border-radius: 24px; overflow: hidden; aspect-ratio: 4 / 3; box-shadow: 0 24px 52px rgba(33, 22, 15, 0.14); border: 1px solid rgba(135, 96, 57, 0.16);">
        <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=900&auto=format&fit=crop&q=80" alt="Busy restaurant dinner service" style="width: 100%; height: 100%; object-fit: cover; display: block;" loading="lazy">
        <div style="position: absolute; inset: 0; background: linear-gradient(180deg, rgba(20,14,10,0.08) 0%, rgba(20,14,10,0.84) 100%);"></div>

        <div style="position: absolute; top: 18px; left: 18px; right: 18px;">
          <div style="background: rgba(255,255,255,0.95); backdrop-filter: blur(12px); border-radius: 16px; padding: 14px 16px; border: 1px solid rgba(135,96,57,0.2); box-shadow: 0 10px 24px rgba(0,0,0,0.14);">
            <div style="font-size: 10.5px; font-weight: 700; color: var(--br); letter-spacing: .1em; text-transform: uppercase; margin-bottom: 10px;">LIVE REQUEST STATUS</div>
            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 8px;">
              <div style="text-align: center;">
                <div style="font-size: 24px; font-weight: 700; font-family: 'Outfit', sans-serif; color: #92400E; line-height: 1.1;">12</div>
                <div style="font-size: 11px; font-weight: 700; color: var(--mute); margin-top: 2px;">Active</div>
              </div>
              <div style="text-align: center;">
                <div style="font-size: 24px; font-weight: 700; font-family: 'Outfit', sans-serif; color: var(--yellow); line-height: 1.1;">08</div>
                <div style="font-size: 11px; font-weight: 700; color: var(--mute); margin-top: 2px;">New</div>
              </div>
              <div style="text-align: center;">
                <div style="font-size: 24px; font-weight: 700; font-family: 'Outfit', sans-serif; color: var(--blue); line-height: 1.1;">04</div>
                <div style="font-size: 11px; font-weight: 700; color: var(--mute); margin-top: 2px;">In Progress</div>
              </div>
            </div>
          </div>
        </div>

        <div style="position: absolute; bottom: 20px; left: 20px; right: 20px; color: #fff;">
          <div style="font-weight: 700; font-size: 19px; font-family: 'Outfit', sans-serif; margin-bottom: 4px;">Peak Dinner Service — 8 PM</div>
          <div style="font-size: 13.5px; opacity: .88;">12 requests across multiple tables, all visible from one dashboard</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= GUEST EXPERIENCE ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd r">
      <div class="eb">GUEST-FACING INTERFACE</div>
      <h2>A Simpler Way for Guests <span class="sf">to Ask for Help.</span></h2>
      <p>Guests send requests directly from their table through a clean, mobile-friendly interface — and the restaurant team receives them instantly.</p>
    </div>

    <div class="rm-split r" style="align-items: center;">
      <!-- Phone Mockup -->
      <div style="display: flex; justify-content: center;">
        <div class="ph-wrap">
          <div class="ph-in">
            <div class="ph-top">
              <div style="font-size: 10px; font-weight: 700; opacity: .78; letter-spacing: .12em; text-transform: uppercase; margin-bottom: 6px;">GENI MENU</div>
              <div class="ph-title">How can we help?</div>
              <div class="ph-sub">Table 08 · Tap to send a request</div>
            </div>
            <div class="ph-body">
              <div class="ph-tbl">
                <div class="ph-tbl-lbl">YOUR TABLE</div>
                <div class="ph-tbl-num">08</div>
              </div>
              <div class="ph-help">Select a request type below</div>
              <button type="button" class="ph-btn">
                <svg viewBox="0 0 24 24"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9M13.73 21a2 2 0 0 1-3.46 0"/></svg>
                Call Waiter
              </button>
              <button type="button" class="ph-btn">
                <svg viewBox="0 0 24 24"><path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"/></svg>
                Request Water
              </button>
              <button type="button" class="ph-btn">
                <svg viewBox="0 0 24 24"><rect x="5" y="2" width="14" height="20" rx="2"/><path d="M9 7h6M9 11h4"/></svg>
                Request Bill
              </button>
              <button type="button" class="ph-btn">
                <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                Extra Items
              </button>
              <button type="button" class="ph-btn">
                <svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                Custom Request
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Journey Card with Editorial Banner -->
      <div class="rm-exp-card featured">
        <div class="rm-exp-banner">
          <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=800&auto=format&fit=crop&q=80" alt="Guest dining experience" loading="lazy">
          <div class="rm-exp-banner-scrim"></div>
          <h3 class="rm-exp-banner-title">THE REQUEST JOURNEY</h3>
        </div>
        <div class="rm-exp-body">
          <div style="padding: 12px 15px; background: #FAF7F3; border-radius: 12px; border: 1px solid rgba(135,96,57,0.14);">
            <div style="font-weight: 700; color: #21160F; font-size: 14px;">1. Guest Needs Help</div>
            <div style="font-size: 12.5px; color: #6E6157;">Guest is seated at Table 08 and needs assistance.</div>
          </div>
          <div style="text-align: center; color: #876039; font-weight: 700; line-height: 1;">↓</div>
          <div style="padding: 12px 15px; background: #FAF7F3; border-radius: 12px; border: 1px solid rgba(135,96,57,0.14);">
            <div style="font-weight: 700; color: #21160F; font-size: 14px;">2. Guest Sends Request</div>
            <div style="font-size: 12.5px; color: #6E6157;">Guest selects "Call Waiter" from the menu interface.</div>
          </div>
          <div style="text-align: center; color: #876039; font-weight: 700; line-height: 1;">↓</div>
          <div style="padding: 12px 15px; background: #FAF7F3; border-radius: 12px; border: 1px solid rgba(135,96,57,0.14);">
            <div style="font-weight: 700; color: #21160F; font-size: 14px;">3. Team Sees the Request</div>
            <div style="font-size: 12.5px; color: #6E6157;">Restaurant dashboard shows Table 08 — Call Waiter, New.</div>
          </div>
          <div style="text-align: center; color: #876039; font-weight: 700; line-height: 1;">↓</div>
          <div style="padding: 12px 15px; background: #FAF7F3; border-radius: 12px; border: 1px solid rgba(135,96,57,0.14);">
            <div style="font-weight: 700; color: #21160F; font-size: 14px;">4. Staff Responds</div>
            <div style="font-size: 12.5px; color: #6E6157;">Waiter heads to Table 08 and marks request in progress.</div>
          </div>
          <div style="text-align: center; color: #876039; font-weight: 700; line-height: 1;">↓</div>
          <div style="padding: 13px 15px; background: linear-gradient(135deg, #876039 0%, #6f4e2d 100%); color: #FFFFFF; border-radius: 12px; box-shadow: 0 8px 20px rgba(135,96,57,0.25);">
            <div style="font-weight: 700; font-size: 14px;">5. Request Completed</div>
            <div style="font-size: 12.5px; opacity: 0.9;">Staff marks it complete. Guest is helped. Table cleared.</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= BENEFITS (3x2 NUMBERED GRID) ================= -->
<section>
  <div class="w">
    <div class="hd r">
      <h2>Built for Better <span class="sf">Table-Side Service.</span></h2>
    </div>

    <div class="rm-ben-grid r">
      <div class="rm-ben-card">
        <div class="rm-val-top">
          <div class="rm-val-ic">
            <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
          </div>
          <span class="rm-val-num">01</span>
        </div>
        <h3>Faster Response</h3>
        <p>Staff see requests as they arrive and can respond without delay.</p>
      </div>

      <div class="rm-ben-card">
        <div class="rm-val-top">
          <div class="rm-val-ic">
            <svg viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>
          </div>
          <span class="rm-val-num">02</span>
        </div>
        <h3>Better Visibility</h3>
        <p>Know which table needs attention without walking the floor.</p>
      </div>

      <div class="rm-ben-card">
        <div class="rm-val-top">
          <div class="rm-val-ic">
            <svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
          </div>
          <span class="rm-val-num">03</span>
        </div>
        <h3>Less Confusion</h3>
        <p>Give staff clear request information so nothing is misunderstood.</p>
      </div>

      <div class="rm-ben-card">
        <div class="rm-val-top">
          <div class="rm-val-ic">
            <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg>
          </div>
          <span class="rm-val-num">04</span>
        </div>
        <h3>Improved Coordination</h3>
        <p>Keep front-of-house teams aligned during every service period.</p>
      </div>

      <div class="rm-ben-card">
        <div class="rm-val-top">
          <div class="rm-val-ic">
            <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
          </div>
          <span class="rm-val-num">05</span>
        </div>
        <h3>Better Guest Experience</h3>
        <p>Make it easier for guests to ask for help without feeling ignored.</p>
      </div>

      <div class="rm-ben-card">
        <div class="rm-val-top">
          <div class="rm-val-ic">
            <svg viewBox="0 0 24 24"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
          </div>
          <span class="rm-val-num">06</span>
        </div>
        <h3>More Organized Service</h3>
        <p>Keep requests visible and tracked until they are completed.</p>
      </div>
    </div>
  </div>
</section>

<!-- ================= INDUSTRIES (3-COL EDITORIAL CARDS) ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd r">
      <div class="eb">WORKS FOR EVERY VENUE</div>
      <h2>Made for Every Kind of <span class="sf">Dining Experience.</span></h2>
    </div>

    <div class="rm-ind-grid r">
      <div class="rm-ind-card">
        <div class="rm-ind-media">
          <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=600&auto=format&fit=crop&q=80" alt="Fine Dining" loading="lazy">
          <div class="rm-ind-scrim"></div>
        </div>
        <div class="rm-ind-body">
          <h4><svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M8 22h8"/><path d="M12 11v11"/><path d="m19 3-7 8-7-8Z"/></svg> Fine Dining</h4>
          <p>Discreet, elegant request management.</p>
        </div>
      </div>

      <div class="rm-ind-card">
        <div class="rm-ind-media">
          <img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?w=600&auto=format&fit=crop&q=80" alt="Casual Dining" loading="lazy">
          <div class="rm-ind-scrim"></div>
        </div>
        <div class="rm-ind-body">
          <h4><svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2"/><path d="M7 2v20"/><path d="M21 15V2v0a5 5 0 0 0-5 5v6c0 1.1.9 2 2 2h3Zm0 0v7"/></svg> Casual Dining</h4>
          <p>Keep everyday service organized during rush hours.</p>
        </div>
      </div>

      <div class="rm-ind-card">
        <div class="rm-ind-media">
          <img src="https://images.unsplash.com/photo-1559339352-11d035aa65de?w=600&auto=format&fit=crop&q=80" alt="Family Restaurants" loading="lazy">
          <div class="rm-ind-scrim"></div>
        </div>
        <div class="rm-ind-body">
          <h4><svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg> Family Restaurants</h4>
          <p>Handle multiple tables and larger group requests.</p>
        </div>
      </div>

      <div class="rm-ind-card">
        <div class="rm-ind-media">
          <img src="https://images.unsplash.com/photo-1554118811-1e0d58224f24?w=600&auto=format&fit=crop&q=80" alt="Cafés" loading="lazy">
          <div class="rm-ind-scrim"></div>
        </div>
        <div class="rm-ind-body">
          <h4><svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M17 8h1a4 4 0 1 1 0 8h-1"/><path d="M3 8h14v9a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4Z"/><line x1="6" x2="6" y1="2" y2="4"/><line x1="10" x2="10" y1="2" y2="4"/><line x1="14" x2="14" y1="2" y2="4"/></svg> Cafés</h4>
          <p>Manage requests during busy brunch and coffee hours.</p>
        </div>
      </div>

      <div class="rm-ind-card">
        <div class="rm-ind-media">
          <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?w=600&auto=format&fit=crop&q=80" alt="QSR / Fast Food" loading="lazy">
          <div class="rm-ind-scrim"></div>
        </div>
        <div class="rm-ind-body">
          <h4><svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg> QSR / Fast Food</h4>
          <p>Handle quick requests efficiently during high-volume service.</p>
        </div>
      </div>

      <div class="rm-ind-card">
        <div class="rm-ind-media">
          <img src="https://images.unsplash.com/photo-1514933651103-005eec06c04b?w=600&auto=format&fit=crop&q=80" alt="Multi-Cuisine" loading="lazy">
          <div class="rm-ind-scrim"></div>
        </div>
        <div class="rm-ind-body">
          <h4><svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M4 11h16a1 1 0 0 1 1 1v.5c0 4.5-4 8.5-9 8.5s-9-4-9-8.5V12a1 1 0 0 1 1-1Z"/><path d="M12 3v4"/><path d="M8 5v2"/><path d="M16 5v2"/></svg> Multi-Cuisine</h4>
          <p>Manage requests across different sections and floors.</p>
        </div>
      </div>

      <div class="rm-ind-card">
        <div class="rm-ind-media">
          <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?w=600&auto=format&fit=crop&q=80" alt="Hotels & Resorts" loading="lazy">
          <div class="rm-ind-scrim"></div>
        </div>
        <div class="rm-ind-body">
          <h4><svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><rect width="16" height="20" x="4" y="2" rx="2" ry="2"/><path d="M9 22v-4h6v4"/><path d="M8 6h.01"/><path d="M16 6h.01"/><path d="M12 6h.01"/><path d="M12 10h.01"/><path d="M12 14h.01"/></svg> Hotels &amp; Resorts</h4>
          <p>Connect dining requests within hotel hospitality operations.</p>
        </div>
      </div>

      <div class="rm-ind-card">
        <div class="rm-ind-media">
          <img src="https://images.unsplash.com/photo-1552566626-52f8b828add9?w=600&auto=format&fit=crop&q=80" alt="Food Courts" loading="lazy">
          <div class="rm-ind-scrim"></div>
        </div>
        <div class="rm-ind-body">
          <h4><svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg> Food Courts</h4>
          <p>Track requests across multiple stalls and seating areas.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= ECOSYSTEM 7-STEP FLOW ================= -->
<section>
  <div class="w">
    <div class="hd r">
      <h2>Waiter Requests. <span class="sf">Connected to Your Restaurant.</span></h2>
      <p>A request is part of the guest experience. Geni Menu connects service activity with the wider restaurant operation.</p>
    </div>

    <div class="rm-eco-grid r">
      <div class="rm-eco-step active">
        <span class="rm-eco-num">01</span>
        <img src="{{ asset('assets/images/workflow/step-1-menu.png') }}" alt="Waiter Requests" class="rm-eco-img">
        <div class="rm-eco-title">WAITER REQUESTS</div>
      </div>
      <div class="rm-eco-step">
        <span class="rm-eco-num">02</span>
        <img src="{{ asset('assets/images/workflow/step-4-table.png') }}" alt="Table Management" class="rm-eco-img">
        <div class="rm-eco-title">TABLE MGMT</div>
      </div>
      <div class="rm-eco-step">
        <span class="rm-eco-num">03</span>
        <img src="{{ asset('assets/images/workflow/step-2-order.png') }}" alt="Order Management" class="rm-eco-img">
        <div class="rm-eco-title">ORDER MGMT</div>
      </div>
      <div class="rm-eco-step">
        <span class="rm-eco-num">04</span>
        <img src="{{ asset('assets/images/workflow/step-3-kitchen.png') }}" alt="Kitchen" class="rm-eco-img">
        <div class="rm-eco-title">KITCHEN</div>
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

    <!-- Full Restaurant Service Journey -->
    <div class="rm-win r" style="max-width: 960px; margin: 0 auto;">
      <div class="rm-win-bar">
        <div class="rm-win-dots"><i></i><i></i><i></i></div>
        <div class="rm-win-ttl">FULL RESTAURANT SERVICE JOURNEY</div>
        <span class="rm-win-pill">Connected Flow</span>
      </div>
      <div class="rm-win-body" style="padding: 24px;">
        <div style="display: flex; flex-wrap: wrap; justify-content: center; align-items: center; gap: 10px;">
          <div style="padding: 10px 14px; background: #FAF7F3; border: 1px solid rgba(135,96,57,0.16); border-radius: 12px; font-size: 12.5px; font-weight: 700; color: #21160F;">Guest Arrives</div>
          <span style="color: #876039; font-weight: 700;">→</span>
          <div style="padding: 10px 14px; background: #FAF7F3; border: 1px solid rgba(135,96,57,0.16); border-radius: 12px; font-size: 12.5px; font-weight: 700; color: #21160F;">Table Assigned</div>
          <span style="color: #876039; font-weight: 700;">→</span>
          <div style="padding: 10px 14px; background: #FAF7F3; border: 1px solid rgba(135,96,57,0.16); border-radius: 12px; font-size: 12.5px; font-weight: 700; color: #21160F;">Menu Viewed</div>
          <span style="color: #876039; font-weight: 700;">→</span>
          <div style="padding: 10px 14px; background: #FAF7F3; border: 1px solid rgba(135,96,57,0.16); border-radius: 12px; font-size: 12.5px; font-weight: 700; color: #21160F;">Order Placed</div>
          <span style="color: #876039; font-weight: 700;">→</span>
          <div style="padding: 10px 16px; background: linear-gradient(135deg, #876039 0%, #6f4e2d 100%); color: #FFFFFF; border-radius: 12px; font-size: 12.5px; font-weight: 700; box-shadow: 0 6px 16px rgba(135,96,57,0.28);">Waiter Request</div>
          <span style="color: #876039; font-weight: 700;">→</span>
          <div style="padding: 10px 14px; background: #FAF7F3; border: 1px solid rgba(135,96,57,0.16); border-radius: 12px; font-size: 12.5px; font-weight: 700; color: #21160F;">Staff Responds</div>
          <span style="color: #876039; font-weight: 700;">→</span>
          <div style="padding: 10px 14px; background: #FAF7F3; border: 1px solid rgba(135,96,57,0.16); border-radius: 12px; font-size: 12.5px; font-weight: 700; color: #21160F;">Bill &amp; Payment</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= FAQ ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd r">
      <h2>Frequently Asked <span class="sf">Questions</span></h2>
      <p>Everything you need to know about Waiter Requests in Geni Menu.</p>
    </div>

    <div class="faq-list r">
      <div class="faq-item open">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>What are Waiter Requests in Geni Menu?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Waiter Requests is a feature that allows restaurant guests to send service requests from their table — such as calling a waiter, requesting water, asking for the bill, or making a custom request. Restaurant staff can view, manage, and respond to these requests from a central dashboard.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>How does a customer send a waiter request?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Guests can send requests through the Geni Menu interface linked to their table. They select the type of assistance they need and submit the request, which is then visible to the restaurant team immediately.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>Can requests be linked to specific tables?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Each request is associated with the specific table from which it was created. Staff can immediately see which table needs attention, the request type, and how long ago it was submitted.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>What types of requests can customers send?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Guests can send common request types including Call Waiter, Request Water, Request Bill, Extra Cutlery, Extra Items, and Custom Requests where they can type a specific requirement.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>Can restaurant staff track request status?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Requests have status states — New, In Progress, and Completed — that staff can update as they handle each request. This keeps the dashboard organized during busy service.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>Can staff see which table created the request?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. The table number is always displayed alongside the request type and time, giving staff immediate context on where to go and what is needed.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>Can guests make custom requests?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. In addition to predefined request types, guests can submit a custom request with their own specific message or requirement.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>Does Waiter Requests work with Table Management?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Where Geni Menu Table Management is enabled, Waiter Requests are connected to the corresponding table, allowing your team to see request activity alongside table status information.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>Does it connect with Order Management?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Geni Menu is built as a connected restaurant platform. Where Order Management is active, service activity including waiter requests forms part of the overall guest experience at the table.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>Is Geni Menu suitable for small and large restaurants?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Geni Menu is designed for restaurants of different sizes — from small cafés and single-location restaurants to multi-branch operations and hotel dining rooms.
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= FINAL CTA ================= -->
<section style="background: linear-gradient(135deg, #876039 0%, #6f4e2d 100%); color: #fff; text-align: center;">
  <div class="w r">
    <div class="eb" style="background: rgba(255,255,255,0.15); color: #fff; border-color: rgba(255,255,255,0.3);">
      TABLE-SIDE SERVICE
    </div>
    <h2 style="color: #fff; font-size: clamp(34px, 5vw, 54px);">
      Give Every Guest an Easier Way<br>
      <span class="sf" style="background: linear-gradient(135deg, #fff 0%, #f4efe9 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">to Ask for Help.</span>
    </h2>
    <p style="color: #f4efe9; max-width: 620px; margin: 20px auto 36px; font-size: 18px;">
      Bring table-side requests into one connected restaurant workflow with Geni Menu.
    </p>

    <div style="display: flex; gap: 16px; justify-content: center; flex-wrap: wrap;">
      <a href="{{ route('restaurant_signup') }}" class="btn" style="background: #fff; color: var(--br); border-color: #fff; font-size: 16px; padding: 16px 36px; box-shadow: 0 8px 24px rgba(0,0,0,0.2);">Get Started →</a>
      <a href="{{ route('contact.us') }}" class="btn" style="background: transparent; color: #fff; border-color: rgba(255,255,255,0.5); font-size: 16px; padding: 16px 36px;">Book a Demo</a>
    </div>

    <div style="margin-top: 36px; font-size: 14px; color: #e5d8c8; font-weight: 600;">
      Built for restaurants, cafés, hotels, QSRs and modern food businesses across India.
    </div>
  </div>
</section>

<script>
// Interactive Console Table Filter
function filterWrConsole(filter, btn) {
  document.querySelectorAll('.rm-filter-btn').forEach(b => b.classList.remove('active'));
  if (btn) btn.classList.add('active');
  document.querySelectorAll('#wr-console-table tbody tr').forEach(row => {
    const status = row.getAttribute('data-status');
    if (filter === 'all' || status === filter) {
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
