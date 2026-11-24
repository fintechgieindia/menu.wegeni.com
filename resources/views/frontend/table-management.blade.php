@php
    $meta = [
        'title'       => 'Table Management — Interactive Floor Plan & Seating | Geni Menu',
        'description' => 'Manage your restaurant floor plan in real-time. Track table status, monitor turn times, assign zones, and seat guests seamlessly with Geni Menu\'s live Table Management.',
        'keywords'    => 'restaurant table management, floor plan software, live seating tracker, table turn time, zone management, restaurant POS table status, Geni Menu',
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
.badge.available { background: #D1FAE5; color: #065F46; }
.badge.occupied { background: #876039; color: #FFFFFF; }
.badge.reserved { background: #FEF3C7; color: #92400E; }
.badge.cleaning { background: #E5E7EB; color: #374151; }

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

/* Interactive Floor Plan Grid */
.rm-floor-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 14px;
}
.rm-table-tile {
  padding: 16px 14px;
  border-radius: 16px;
  text-align: left;
  transition: transform 0.2s ease, box-shadow 0.2s ease;
  display: flex;
  flex-direction: column;
  gap: 8px;
}
.rm-table-tile:hover {
  transform: translateY(-4px);
  box-shadow: 0 12px 24px rgba(33, 22, 15, 0.08);
}
.tm-tile-top {
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 6px;
}
.tm-tile-num {
  font-family: 'Outfit', sans-serif;
  font-weight: 700;
  font-size: 16px;
  color: #21160F;
}
.tm-tile-meta {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 6px;
  font-size: 11.5px;
  color: #6E6157;
}
.tm-tile-meta b {
  display: block;
  font-size: 12.5px;
  color: #21160F;
}

/* Zone Rows */
.tm-zone-row {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 13px 15px;
  background: #FAF7F3;
  border: 1px solid rgba(135, 96, 57, 0.14);
  border-radius: 14px;
  margin-bottom: 10px;
}
.tm-zone-ic {
  width: 40px;
  height: 40px;
  border-radius: 11px;
  background: #F3E8DC;
  color: #876039;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}
.tm-zone-pills {
  display: flex;
  gap: 6px;
  flex-wrap: wrap;
}
.tm-zpill {
  font-size: 10.5px;
  font-weight: 700;
  padding: 3px 9px;
  border-radius: 999px;
}
.tm-zpill.green { background: #D1FAE5; color: #065F46; }
.tm-zpill.brown { background: #F3E8DC; color: #876039; }
.tm-zpill.amber { background: #FEF3C7; color: #92400E; }
.tm-zpill.gray { background: #E5E7EB; color: #374151; }

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

/* Editorial Photo Strip */
.tm-photo-strip {
  position: relative;
  border-radius: 18px;
  overflow: hidden;
  height: 148px;
  margin-top: 22px;
  border: 1px solid rgba(135, 96, 57, 0.16);
  box-shadow: var(--shadow-sm);
}
.tm-photo-strip img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}
.tm-photo-strip-scrim {
  position: absolute;
  inset: 0;
  background: linear-gradient(90deg, rgba(33, 22, 15, 0.74) 0%, rgba(33, 22, 15, 0.25) 60%, rgba(33, 22, 15, 0.1) 100%);
}
.tm-photo-strip-caption {
  position: absolute;
  left: 18px;
  bottom: 14px;
  right: 18px;
  color: #FFFFFF;
}

/* Metrics Editorial Banner */
.tm-metrics-banner {
  position: relative;
  border-radius: 24px;
  overflow: hidden;
  padding: 44px 32px;
  box-shadow: var(--shadow-lg);
}
.tm-metrics-banner > img {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  z-index: 0;
}
.tm-metrics-banner-scrim {
  position: absolute;
  inset: 0;
  background: linear-gradient(135deg, rgba(33, 22, 15, 0.90) 0%, rgba(111, 78, 45, 0.84) 100%);
  z-index: 1;
}
.tm-metrics-content {
  position: relative;
  z-index: 2;
}
.tm-metric-card {
  background: rgba(255, 255, 255, 0.10);
  backdrop-filter: blur(12px);
  border: 1px solid rgba(255, 255, 255, 0.18);
  border-radius: 18px;
  padding: 26px 20px;
  text-align: center;
}
.tm-metric-num {
  font-family: 'Outfit', sans-serif;
  font-size: 42px;
  font-weight: 700;
  color: #F4D7B5;
  line-height: 1.05;
  margin-bottom: 8px;
}

/* Crosslinks */
.tm-cross-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 20px;
}
.tm-cross-card {
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
.tm-cross-card:hover {
  transform: translateY(-4px);
  border-color: rgba(135, 96, 57, 0.4);
  box-shadow: 0 14px 32px rgba(135, 96, 57, 0.10);
}

/* Responsive adjustments */
@media (max-width: 1100px) {
  .rm-val-grid { grid-template-columns: repeat(2, 1fr); }
  .rm-floor-grid { grid-template-columns: repeat(3, 1fr); }
  .rm-prog-grid { grid-template-columns: repeat(2, 1fr); }
  .rm-eco-grid { grid-template-columns: repeat(4, 1fr); }
  .rm-ind-grid, .tm-cross-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 900px) {
  .rm-hero-grid, .rm-split { grid-template-columns: 1fr; gap: 32px; }
}
@media (max-width: 768px) {
  .bc { padding: 14px 0 14px; }
  .w { padding: 0 16px; }
  .rm-floor-grid { grid-template-columns: repeat(2, 1fr); }
  .tm-metrics-banner { padding: 32px 20px; }
}
@media (max-width: 600px) {
  .rm-val-grid, .rm-prog-grid, .rm-ind-grid, .tm-cross-grid, .rm-floor-grid { grid-template-columns: 1fr; }
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
    <span>Table Management</span>
  </div>
</div>

<!-- ================= HERO SECTION ================= -->
<section style="background: linear-gradient(180deg, var(--bg2) 0%, #ffffff 100%);">
  <div class="w">
    <div class="rm-hero-grid">
      <!-- Hero Left Copy -->
      <div class="r in">
        <div class="eb">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>
          TABLE MANAGEMENT
        </div>
        <h1>Your Dining Floor,<br>Fully Visible <span class="sf">in Real-Time.</span></h1>
        <p style="margin: 20px 0 32px; font-size: 18px; max-width: 530px;">
          Stop guessing which table is free. Geni Menu gives your front-of-house team a live, colour-coded floor map — every table status, turn time, and guest detail in one glance.
        </p>
        <div style="display: flex; gap: 14px; flex-wrap: wrap;">
          <a href="{{ route('restaurant_signup') }}" class="btn p">Get Started Free →</a>
          <a href="{{ route('contact.us') }}" class="btn o">Book a Demo</a>
        </div>
        <div style="margin-top: 28px; font-size: 14px; color: var(--mute); font-weight: 600; display: flex; align-items: center; gap: 16px; flex-wrap: wrap;">
          <span>✓ No hardware required</span>
          <span>✓ Works on any tablet or display</span>
          <span>✓ Live sync across all devices</span>
          <span>✓ Setup in under 20 minutes</span>
        </div>
      </div>

      <!-- Hero Visual: Editorial Hospitality Photo + Live Floor Overlay -->
      <div class="r in" style="transition-delay: 0.15s; position: relative; display: flex; justify-content: center;">
        <div style="position: relative; width: 100%; max-width: 610px; border-radius: 26px; overflow: hidden; box-shadow: 0 28px 64px rgba(33, 22, 15, 0.16), 0 6px 20px rgba(135, 96, 57, 0.10); border: 1px solid rgba(135, 96, 57, 0.16);">
          <img
            src="{{ asset('assets/images/table-management-hero.jpg') }}"
            alt="Restaurant floor manager viewing live color-coded table status with Geni Menu"
            style="width: 100%; height: auto; display: block; object-fit: cover;"
            loading="eager"
          />
          <div style="position: absolute; inset: 0; background: linear-gradient(180deg, rgba(33,22,15,0.08) 0%, rgba(33,22,15,0) 45%, rgba(33,22,15,0.48) 100%); pointer-events: none;"></div>

          <!-- Top-Left Live Status Pill -->
          <div style="position: absolute; top: 18px; left: 18px; display: inline-flex; align-items: center; gap: 8px; padding: 8px 14px; border-radius: 999px; background: rgba(255, 255, 255, 0.94); backdrop-filter: blur(10px); box-shadow: 0 8px 20px rgba(0,0,0,0.14); font-size: 12px; font-weight: 700; color: #21160F;">
            <span style="width: 8px; height: 8px; border-radius: 50%; background: #16A34A; box-shadow: 0 0 0 3px rgba(22,163,74,0.22);"></span>
            Live Floor • 75% Occupied • 3 Available • 2 Reserved
          </div>

          <!-- Floating Table Status Card -->
          <div style="position: absolute; bottom: 18px; left: 18px; right: 18px; background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(12px); border: 1px solid rgba(135, 96, 57, 0.25); border-radius: 16px; padding: 12px 16px; box-shadow: 0 12px 28px rgba(0,0,0,0.18); display: flex; justify-content: space-between; align-items: center; gap: 12px; flex-wrap: wrap;">
            <div style="display: flex; align-items: center; gap: 12px;">
              <div style="width: 38px; height: 38px; border-radius: 11px; background: #F6EFE7; color: #876039; display: flex; align-items: center; justify-content: center; flex-shrink: 0; font-family: 'Outfit', sans-serif; font-weight: 700; font-size: 13px;">
                T-02
              </div>
              <div>
                <div style="font-size: 10px; font-weight: 700; color: #876039; letter-spacing: 0.06em;">OCCUPIED • INDOOR ZONE</div>
                <div style="font-weight: 700; font-size: 13.5px; color: #21160F;">3 / 4 Guests • 42 min • ₹1,840</div>
                <div style="font-size: 11.5px; color: #6E6157;">Steward: Rajan • Avg Turn: 47 min</div>
              </div>
            </div>
            <span style="background: #876039; color: #fff; padding: 7px 14px; border-radius: 9px; font-weight: 700; font-size: 12px;">Open Bill →</span>
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
            <svg viewBox="0 0 24 24"><polygon points="3 6 9 3 15 6 21 3 21 18 15 21 9 18 3 21"/><line x1="9" x2="9" y1="3" y2="18"/><line x1="15" x2="15" y1="6" y2="21"/></svg>
          </div>
          <span class="rm-val-num">01</span>
        </div>
        <h4>Visual Floor Map</h4>
        <p>See every table's state on a real floor plan, not a boring list.</p>
      </div>

      <div class="rm-val-card">
        <div class="rm-val-top">
          <div class="rm-val-ic">
            <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="3"/></svg>
          </div>
          <span class="rm-val-num">02</span>
        </div>
        <h4>Live Status Colours</h4>
        <p>Green, amber, coffee and grey — status recognised in under a second.</p>
      </div>

      <div class="rm-val-card">
        <div class="rm-val-top">
          <div class="rm-val-ic">
            <svg viewBox="0 0 24 24"><circle cx="12" cy="13" r="8"/><path d="M12 9v4l2 2"/><path d="M10 2h4"/></svg>
          </div>
          <span class="rm-val-num">03</span>
        </div>
        <h4>Turn-Time Alerts</h4>
        <p>Know which tables have been seated longest and are about to free up.</p>
      </div>

      <div class="rm-val-card">
        <div class="rm-val-top">
          <div class="rm-val-ic">
            <svg viewBox="0 0 24 24"><rect width="14" height="20" x="5" y="2" rx="2" ry="2"/><path d="M12 18h.01"/></svg>
          </div>
          <span class="rm-val-num">04</span>
        </div>
        <h4>One-Tap Updates</h4>
        <p>Mark tables cleaning or available from POS, tablet, or floor display.</p>
      </div>
    </div>
  </div>
</section>

<!-- ================= LIVE INTERACTIVE FLOOR PLAN CONSOLE ================= -->
<section>
  <div class="w">
    <div class="hd r">
      <div class="eb">LIVE FLOOR PLAN</div>
      <h2>Every Table, Every Zone — <span class="sf">Updated Live.</span></h2>
      <p>Filter by dining zone to see available tables, active dining timers, live bills, and upcoming reservations in real time.</p>
    </div>

    <div class="rm-win r">
      <div class="rm-win-bar">
        <div class="rm-win-dots"><i></i><i></i><i></i></div>
        <div class="rm-win-ttl">THE SPICE ROUTE — FLOOR PLAN</div>
        <div style="display: flex; gap: 6px; flex-wrap: wrap;">
          <button type="button" class="rm-filter-btn active" onclick="filterFloorZone('all', this)">All Zones</button>
          <button type="button" class="rm-filter-btn" onclick="filterFloorZone('indoor', this)">Indoor</button>
          <button type="button" class="rm-filter-btn" onclick="filterFloorZone('outdoor', this)">Outdoor</button>
          <button type="button" class="rm-filter-btn" onclick="filterFloorZone('vip', this)">VIP</button>
          <button type="button" class="rm-filter-btn" onclick="filterFloorZone('bar', this)">Bar</button>
        </div>
      </div>

      <div class="rm-win-body" style="padding: 22px;">
        <!-- Telemetry Strip -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(130px, 1fr)); gap: 12px; margin-bottom: 20px; padding: 14px 16px; background: #FAF7F3; border-radius: 14px; border: 1px solid rgba(135,96,57,0.14);">
          <div>
            <div style="font-size: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em; color: #76675D;">Total Tables</div>
            <div style="font-family: 'Outfit', sans-serif; font-size: 22px; font-weight: 700; color: #21160F;">12</div>
          </div>
          <div>
            <div style="font-size: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em; color: #76675D;">Occupied</div>
            <div style="font-family: 'Outfit', sans-serif; font-size: 22px; font-weight: 700; color: #876039;">6</div>
          </div>
          <div>
            <div style="font-size: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em; color: #76675D;">Available</div>
            <div style="font-family: 'Outfit', sans-serif; font-size: 22px; font-weight: 700; color: #059669;">3</div>
          </div>
          <div>
            <div style="font-size: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em; color: #76675D;">Reserved</div>
            <div style="font-family: 'Outfit', sans-serif; font-size: 22px; font-weight: 700; color: #D97706;">2</div>
          </div>
          <div>
            <div style="font-size: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em; color: #76675D;">Occupancy</div>
            <div style="font-family: 'Outfit', sans-serif; font-size: 22px; font-weight: 700; color: #876039;">75%</div>
          </div>
          <div>
            <div style="font-size: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em; color: #76675D;">Avg Turn / Tonight</div>
            <div style="font-family: 'Outfit', sans-serif; font-size: 18px; font-weight: 700; color: #21160F;">47m · ₹16,230</div>
          </div>
        </div>

        <!-- 12 Table Cards -->
        <div class="rm-floor-grid" id="tm-floor-grid">
          <div class="rm-table-tile" data-zone="indoor" style="border: 1.5px solid #34D399; background: #ECFDF5;">
            <div class="tm-tile-top"><span class="tm-tile-num">T-01</span><span class="badge available">Available</span></div>
            <div class="tm-tile-meta"><div>Capacity<b>4 seats</b></div><div>Zone<b>Indoor</b></div></div>
            <div style="font-size: 11px; font-weight: 600; color: #065F46;">No guests seated</div>
          </div>

          <div class="rm-table-tile" data-zone="indoor" style="border: 1.5px solid #876039; background: #FAF6F0;">
            <div class="tm-tile-top"><span class="tm-tile-num">T-02</span><span class="badge occupied">Occupied</span></div>
            <div class="tm-tile-meta"><div>Guests<b>3 / 4</b></div><div>Dining<b>42 min</b></div><div>Bill<b>₹1,840</b></div><div>Steward<b>Rajan</b></div></div>
          </div>

          <div class="rm-table-tile" data-zone="vip" style="border: 1.5px solid #FBBF24; background: #FFFBEB;">
            <div class="tm-tile-top"><span class="tm-tile-num">T-03</span><span class="badge reserved">Reserved</span></div>
            <div class="tm-tile-meta"><div>Capacity<b>6 seats</b></div><div>ETA<b>8:30 PM</b></div><div>Guest<b>Mehra fam.</b></div><div>Zone<b>VIP</b></div></div>
          </div>

          <div class="rm-table-tile" data-zone="indoor" style="border: 1.5px solid #876039; background: #FAF6F0;">
            <div class="tm-tile-top"><span class="tm-tile-num">T-04</span><span class="badge occupied">Occupied</span></div>
            <div class="tm-tile-meta"><div>Guests<b>2 / 2</b></div><div>Dining<b>1h 08m</b></div><div>Bill<b>₹3,220</b></div><div>Steward<b>Priya</b></div></div>
          </div>

          <div class="rm-table-tile" data-zone="outdoor" style="border: 1.5px solid #D1D5DB; background: #F9FAFB;">
            <div class="tm-tile-top"><span class="tm-tile-num">T-05</span><span class="badge cleaning">Cleaning</span></div>
            <div class="tm-tile-meta"><div>Capacity<b>4 seats</b></div><div>Last bill<b>₹2,150</b></div></div>
            <div style="font-size: 11px; font-weight: 600; color: #6B7280;">Est. ready in ~3 min</div>
          </div>

          <div class="rm-table-tile" data-zone="outdoor" style="border: 1.5px solid #34D399; background: #ECFDF5;">
            <div class="tm-tile-top"><span class="tm-tile-num">T-06</span><span class="badge available">Available</span></div>
            <div class="tm-tile-meta"><div>Capacity<b>6 seats</b></div><div>Zone<b>Outdoor</b></div></div>
            <div style="font-size: 11px; font-weight: 600; color: #065F46;">Ready to seat</div>
          </div>

          <div class="rm-table-tile" data-zone="outdoor" style="border: 1.5px solid #876039; background: #FAF6F0;">
            <div class="tm-tile-top"><span class="tm-tile-num">T-07</span><span class="badge occupied">Occupied</span></div>
            <div class="tm-tile-meta"><div>Guests<b>5 / 6</b></div><div>Dining<b>28 min</b></div><div>Bill<b>₹4,670</b></div><div>Steward<b>Ankit</b></div></div>
          </div>

          <div class="rm-table-tile" data-zone="bar" style="border: 1.5px solid #FBBF24; background: #FFFBEB;">
            <div class="tm-tile-top"><span class="tm-tile-num">T-08</span><span class="badge reserved">Reserved</span></div>
            <div class="tm-tile-meta"><div>Capacity<b>2 seats</b></div><div>ETA<b>9:00 PM</b></div><div>Guest<b>Priya S.</b></div><div>Zone<b>Bar</b></div></div>
          </div>

          <div class="rm-table-tile" data-zone="indoor" style="border: 1.5px solid #876039; background: #FAF6F0;">
            <div class="tm-tile-top"><span class="tm-tile-num">T-09</span><span class="badge occupied">Occupied</span></div>
            <div class="tm-tile-meta"><div>Guests<b>4 / 4</b></div><div>Dining<b>54 min</b></div><div>Bill<b>₹2,980</b></div><div>Steward<b>Rajan</b></div></div>
          </div>

          <div class="rm-table-tile" data-zone="vip" style="border: 1.5px solid #34D399; background: #ECFDF5;">
            <div class="tm-tile-top"><span class="tm-tile-num">T-10</span><span class="badge available">Available</span></div>
            <div class="tm-tile-meta"><div>Capacity<b>8 seats</b></div><div>Zone<b>VIP</b></div></div>
            <div style="font-size: 11px; font-weight: 600; color: #065F46;">Ready to seat</div>
          </div>

          <div class="rm-table-tile" data-zone="indoor" style="border: 1.5px solid #D1D5DB; background: #F9FAFB;">
            <div class="tm-tile-top"><span class="tm-tile-num">T-11</span><span class="badge cleaning">Cleaning</span></div>
            <div class="tm-tile-meta"><div>Capacity<b>4 seats</b></div><div>Last bill<b>₹1,560</b></div></div>
            <div style="font-size: 11px; font-weight: 600; color: #6B7280;">Est. ready in ~2 min</div>
          </div>

          <div class="rm-table-tile" data-zone="indoor" style="border: 1.5px solid #876039; background: #FAF6F0;">
            <div class="tm-tile-top"><span class="tm-tile-num">T-12</span><span class="badge occupied">Occupied</span></div>
            <div class="tm-tile-meta"><div>Guests<b>2 / 4</b></div><div>Dining<b>18 min</b></div><div>Bill<b>₹760</b></div><div>Steward<b>Priya</b></div></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= ZONE MANAGEMENT SHOWCASE ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="rm-split r">
      <div>
        <div class="eb">ZONE MANAGEMENT</div>
        <h2>One Floor Plan, Four Zones — <span class="sf">Perfectly Organised.</span></h2>
        <p style="margin: 14px 0 22px;">
          Segment your restaurant into Indoor, Outdoor, VIP, and Bar zones. Assign stewards to specific sections, track revenue per zone, and switch views with a single tap during service.
        </p>

        <ul class="rm-feat-list">
          <li class="rm-feat-row"><span class="rm-check-dot">✓</span> Steward Rajan automatically sees only his Indoor tables — no clutter.</li>
          <li class="rm-feat-row"><span class="rm-check-dot">✓</span> VIP zone locks reserved tables until the guest's name is confirmed at the host stand.</li>
          <li class="rm-feat-row"><span class="rm-check-dot">✓</span> Outdoor tables auto-disable during monsoon hours using shift scheduling.</li>
          <li class="rm-feat-row"><span class="rm-check-dot">✓</span> Bar stools tracked separately with quick-turn billing for walk-ins.</li>
          <li class="rm-feat-row"><span class="rm-check-dot">✓</span> Zone summary shows occupancy %, average bill, and active stewards at once.</li>
        </ul>

        <div class="tm-photo-strip">
          <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=800&auto=format&fit=crop&q=80" alt="Restaurant dining zones" loading="lazy">
          <div class="tm-photo-strip-scrim"></div>
          <div class="tm-photo-strip-caption">
            <div style="font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; opacity: 0.85;">Multi-Zone Floor Control</div>
            <div style="font-family: 'Outfit', sans-serif; font-size: 16px; font-weight: 700;">Assign stewards, lock VIP tables, and track zone revenue live</div>
          </div>
        </div>
      </div>

      <!-- Zone Overview Window -->
      <div class="rm-win">
        <div class="rm-win-bar">
          <div class="rm-win-dots"><i></i><i></i><i></i></div>
          <div class="rm-win-ttl">ZONE OVERVIEW — THE SPICE ROUTE</div>
          <span class="badge available">Live</span>
        </div>
        <div class="rm-win-body">
          <div class="tm-zone-row">
            <div class="tm-zone-ic">
              <svg class="gm-theme-icon" viewBox="0 0 24 24"><path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"/><path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"/></svg>
            </div>
            <div style="flex: 1;">
              <div style="font-weight: 700; font-size: 14px; color: #21160F;">Indoor — Main Hall</div>
              <div style="font-size: 12px; color: #6E6157;">Steward: Rajan &amp; Priya · 6 tables</div>
            </div>
            <div class="tm-zone-pills">
              <span class="tm-zpill green">3 free</span>
              <span class="tm-zpill brown">3 occ</span>
            </div>
          </div>

          <div class="tm-zone-row">
            <div class="tm-zone-ic">
              <svg class="gm-theme-icon" viewBox="0 0 24 24"><circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M6.34 17.66l-1.41 1.41M19.07 4.93l-1.41 1.41"/></svg>
            </div>
            <div style="flex: 1;">
              <div style="font-weight: 700; font-size: 14px; color: #21160F;">Outdoor — Garden</div>
              <div style="font-size: 12px; color: #6E6157;">Steward: Ankit · 3 tables</div>
            </div>
            <div class="tm-zone-pills">
              <span class="tm-zpill green">1 free</span>
              <span class="tm-zpill brown">1 occ</span>
              <span class="tm-zpill gray">1 clean</span>
            </div>
          </div>

          <div class="tm-zone-row">
            <div class="tm-zone-ic">
              <svg class="gm-theme-icon" viewBox="0 0 24 24"><path d="m2 4 3 12h14l3-12-6 7-4-7-4 7-6-7zm3 16h14"/></svg>
            </div>
            <div style="flex: 1;">
              <div style="font-weight: 700; font-size: 14px; color: #21160F;">VIP Lounge</div>
              <div style="font-size: 12px; color: #6E6157;">Steward: Rajan · 2 tables</div>
            </div>
            <div class="tm-zone-pills">
              <span class="tm-zpill green">1 free</span>
              <span class="tm-zpill amber">1 rsvd</span>
            </div>
          </div>

          <div class="tm-zone-row" style="margin-bottom: 18px;">
            <div class="tm-zone-ic">
              <svg class="gm-theme-icon" viewBox="0 0 24 24"><path d="M8 22h8"/><path d="M12 11v11"/><path d="m19 3-7 8-7-8Z"/></svg>
            </div>
            <div style="flex: 1;">
              <div style="font-weight: 700; font-size: 14px; color: #21160F;">Bar Counter</div>
              <div style="font-size: 12px; color: #6E6157;">Steward: Priya · 1 table</div>
            </div>
            <div class="tm-zone-pills">
              <span class="tm-zpill amber">1 rsvd</span>
            </div>
          </div>

          <!-- Summary Row -->
          <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 10px; padding: 14px; background: #F6EFE7; border-radius: 14px; border: 1px solid rgba(135,96,57,0.16); text-align: center;">
            <div>
              <div style="font-size: 10px; font-weight: 700; text-transform: uppercase; color: #76675D;">Occupancy</div>
              <div style="font-family: 'Outfit', sans-serif; font-size: 20px; font-weight: 700; color: #876039;">75%</div>
            </div>
            <div>
              <div style="font-size: 10px; font-weight: 700; text-transform: uppercase; color: #76675D;">Avg. Bill</div>
              <div style="font-family: 'Outfit', sans-serif; font-size: 20px; font-weight: 700; color: #21160F;">₹2,712</div>
            </div>
            <div>
              <div style="font-size: 10px; font-weight: 700; text-transform: uppercase; color: #76675D;">Avg. Turn</div>
              <div style="font-family: 'Outfit', sans-serif; font-size: 20px; font-weight: 700; color: #21160F;">47 min</div>
            </div>
            <div>
              <div style="font-size: 10px; font-weight: 700; text-transform: uppercase; color: #76675D;">Active Staff</div>
              <div style="font-family: 'Outfit', sans-serif; font-size: 20px; font-weight: 700; color: #21160F;">3</div>
            </div>
          </div>

          <div style="margin-top: 18px;">
            <a href="{{ route('restaurant_signup') }}" class="btn p" style="width: 100%;">Start Managing Your Floor →</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= HOW IT WORKS (4-STEP PROGRESSION) ================= -->
<section>
  <div class="w">
    <div class="hd r">
      <div class="eb">HOW IT WORKS</div>
      <h2>From Empty Floor to Full House <span class="sf">in 4 Steps.</span></h2>
      <p>Geni Menu's table management fits naturally into how your team already works — no new habits to force.</p>
    </div>

    <div class="rm-prog-grid r">
      <div class="rm-prog-card active">
        <div class="rm-prog-num">1</div>
        <h5>Set Up Your Floor Plan</h5>
        <p>Use the drag-and-drop editor to map your restaurant exactly — place tables, label zones, set capacities, and assign stewards. Takes about 15 minutes once.</p>
      </div>

      <div class="rm-prog-card active">
        <div class="rm-prog-num">2</div>
        <h5>Seat &amp; Link Guests</h5>
        <p>When a guest arrives, tap the table, select their reservation (if any), and confirm seating. The timer starts, the POS opens to their order, and the steward gets notified.</p>
      </div>

      <div class="rm-prog-card active">
        <div class="rm-prog-num">3</div>
        <h5>Monitor in Real-Time</h5>
        <p>Watch your floor plan update live — bill amounts grow, dining timers tick, and alerts fire when a table has been seated past your average turn time of 60 minutes.</p>
      </div>

      <div class="rm-prog-card">
        <div class="rm-prog-num">4</div>
        <h5>Clear &amp; Turnaround</h5>
        <p>After billing, mark the table Cleaning with one tap. It turns grey on the floor plan and alerts housekeeping. Once cleared, flip it to Available — the next guest is ready to be seated.</p>
      </div>
    </div>
  </div>
</section>

<!-- ================= ALL CAPABILITIES (EDITORIAL IMAGE CARDS) ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd r">
      <div class="eb">ALL CAPABILITIES</div>
      <h2>Everything You Need to Run a <span class="sf">Tight Floor.</span></h2>
      <p>Six features that combine into one seamless seating experience — for guests and staff alike.</p>
    </div>

    <div class="rm-ind-grid r">
      <div class="rm-ind-card">
        <div class="rm-ind-media">
          <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=600&auto=format&fit=crop&q=80" alt="Visual Floor Plan Editor" loading="lazy">
          <div class="rm-ind-scrim"></div>
          <span class="rm-ind-badge">01</span>
        </div>
        <div class="rm-ind-body">
          <h4>
            <svg class="gm-theme-icon" viewBox="0 0 24 24"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/></svg>
            Visual Floor Plan Editor
          </h4>
          <p>Drag, drop, and arrange tables on a canvas that mirrors your actual restaurant layout. Add walls, pillars, and section dividers to make it feel real. Supports multi-floor setups.</p>
        </div>
      </div>

      <div class="rm-ind-card">
        <div class="rm-ind-media">
          <img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?w=600&auto=format&fit=crop&q=80" alt="Live Table Status" loading="lazy">
          <div class="rm-ind-scrim"></div>
          <span class="rm-ind-badge">02</span>
        </div>
        <div class="rm-ind-body">
          <h4>
            <svg class="gm-theme-icon" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="3"/></svg>
            Live Table Status
          </h4>
          <p>Four instant states — Available (green), Occupied (coffee), Reserved (amber), Cleaning (grey). Staff see the full picture at a glance without radio-calling the host stand.</p>
        </div>
      </div>

      <div class="rm-ind-card">
        <div class="rm-ind-media">
          <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=600&auto=format&fit=crop&q=80" alt="Turn-Time Tracking" loading="lazy">
          <div class="rm-ind-scrim"></div>
          <span class="rm-ind-badge">03</span>
        </div>
        <div class="rm-ind-body">
          <h4>
            <svg class="gm-theme-icon" viewBox="0 0 24 24"><circle cx="12" cy="13" r="8"/><path d="M12 9v4l2 2"/><path d="M10 2h4"/></svg>
            Turn-Time Tracking
          </h4>
          <p>Each occupied table shows a live dining timer. When a table crosses your average turn time, it highlights in amber so hosts can proactively offer bills or check in with guests.</p>
        </div>
      </div>

      <div class="rm-ind-card">
        <div class="rm-ind-media">
          <img src="https://images.unsplash.com/photo-1514933651103-005eec06c04b?w=600&auto=format&fit=crop&q=80" alt="Zone & Section Management" loading="lazy">
          <div class="rm-ind-scrim"></div>
          <span class="rm-ind-badge">04</span>
        </div>
        <div class="rm-ind-body">
          <h4>
            <svg class="gm-theme-icon" viewBox="0 0 24 24"><path d="M4 20h16a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.93a2 2 0 0 1-1.66-.9l-.82-1.2A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13c0 1.1.9 2 2 2Z"/></svg>
            Zone &amp; Section Management
          </h4>
          <p>Organise tables into Indoor, Outdoor, VIP, and Bar zones. Assign stewards per zone, view zone-level occupancy stats, and generate per-zone revenue reports at end of shift.</p>
        </div>
      </div>

      <div class="rm-ind-card">
        <div class="rm-ind-media">
          <img src="https://images.unsplash.com/photo-1559339352-11d035aa65de?w=600&auto=format&fit=crop&q=80" alt="Guest Linking on Seating" loading="lazy">
          <div class="rm-ind-scrim"></div>
          <span class="rm-ind-badge">05</span>
        </div>
        <div class="rm-ind-body">
          <h4>
            <svg class="gm-theme-icon" viewBox="0 0 24 24"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
            Guest Linking on Seating
          </h4>
          <p>When a reserved guest arrives, tap their name from the reservation list to link it to the table. Their preferences, allergies, and past visit notes appear instantly for the steward.</p>
        </div>
      </div>

      <div class="rm-ind-card">
        <div class="rm-ind-media">
          <img src="https://images.unsplash.com/photo-1554118811-1e0d58224f24?w=600&auto=format&fit=crop&q=80" alt="Instant Status Updates" loading="lazy">
          <div class="rm-ind-scrim"></div>
          <span class="rm-ind-badge">06</span>
        </div>
        <div class="rm-ind-body">
          <h4>
            <svg class="gm-theme-icon" viewBox="0 0 24 24"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
            Instant Status Updates
          </h4>
          <p>Table states sync across POS, the host display, and waiter tablets in under one second. No refresh needed — when Priya marks T-05 clean at the POS, Rajan sees it update at the floor map.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= REAL RESULTS / METRICS BANNER ================= -->
<section>
  <div class="w">
    <div class="tm-metrics-banner r">
      <img src="https://images.unsplash.com/photo-1552566626-52f8b828add9?w=1200&auto=format&fit=crop&q=80" alt="Busy upscale restaurant dining room" loading="lazy">
      <div class="tm-metrics-banner-scrim"></div>
      <div class="tm-metrics-content">
        <div style="text-align: center; max-width: 640px; margin: 0 auto 36px;">
          <div class="eb" style="background: rgba(255,255,255,0.14); color: #fff; border-color: rgba(255,255,255,0.28);">REAL RESULTS</div>
          <h2 style="color: #FFFFFF; margin-bottom: 12px;">Numbers That Move <span class="sf" style="background: linear-gradient(135deg, #fff 0%, #f4efe9 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">the Needle.</span></h2>
          <p style="color: rgba(255,255,255,0.82); font-size: 16px;">Aggregated from Geni Menu restaurants that switched from manual floor sheets to live table management.</p>
        </div>

        <div class="rm-val-grid">
          <div class="tm-metric-card">
            <div class="tm-metric-num">+22%</div>
            <div style="font-size: 14px; font-weight: 700; color: #FFFFFF; margin-bottom: 4px;">More table covers per evening shift</div>
            <div style="font-size: 12px; color: rgba(255,255,255,0.72);">By reducing idle time between seatings</div>
          </div>

          <div class="tm-metric-card">
            <div class="tm-metric-num">11 min</div>
            <div style="font-size: 14px; font-weight: 700; color: #FFFFFF; margin-bottom: 4px;">Average reduction in table turnaround time</div>
            <div style="font-size: 12px; color: rgba(255,255,255,0.72);">After switching from pen-and-paper</div>
          </div>

          <div class="tm-metric-card">
            <div class="tm-metric-num">₹9,400</div>
            <div style="font-size: 14px; font-weight: 700; color: #FFFFFF; margin-bottom: 4px;">Extra revenue per week on a 20-table restaurant</div>
            <div style="font-size: 12px; color: rgba(255,255,255,0.72);">From faster turns &amp; better zone utilisation</div>
          </div>

          <div class="tm-metric-card">
            <div class="tm-metric-num">Zero</div>
            <div style="font-size: 14px; font-weight: 700; color: #FFFFFF; margin-bottom: 4px;">Double-seated table incidents since go-live</div>
            <div style="font-size: 12px; color: rgba(255,255,255,0.72);">Real-time sync eliminates host miscommunication</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= COMPARE SECTION ================= -->
<style>
  .tm-cmp-wrap {
    position: relative;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 32px;
    align-items: stretch;
  }
  .tm-cmp-center-arrow {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    z-index: 20;
    pointer-events: none;
  }
  .tm-center-arrow-circle {
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
  .tm-center-arrow-circle svg { width: 20px; height: 20px; }

  .tm-cmp-card {
    border-radius: 24px;
    padding: 26px;
    position: relative;
    display: flex;
    flex-direction: column;
    box-sizing: border-box;
  }
  .tm-cmp-traditional {
    background: #FFFDFC;
    border: 1.5px solid #FECDD3;
    box-shadow: 0 10px 30px rgba(220, 38, 38, 0.04);
  }
  .tm-cmp-digital {
    background: #FFFFFF;
    border: 1.5px solid rgba(135, 96, 57, 0.28);
    box-shadow: 0 14px 40px rgba(135, 96, 57, 0.08);
  }
  .tm-cmp-header {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 22px;
  }
  .tm-badge-icon {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
  }
  .tm-badge-icon svg { width: 18px; height: 18px; }
  .tm-badge-red { background: #FEE2E2; color: #DC2626; }
  .tm-badge-brown { background: #6F4522; color: #FFFFFF; }

  .tm-cmp-title {
    font-family: 'Outfit', 'Plus Jakarta Sans', sans-serif;
    font-size: 19px;
    font-weight: 700;
    margin: 0 0 2px;
    line-height: 1.2;
  }
  .tm-cmp-title.text-red { color: #991B1B; }
  .tm-cmp-title.text-brown { color: #21160F; }
  .tm-cmp-subtitle { font-size: 12.5px; color: #76675D; margin: 0; }

  .tm-split-body {
    display: grid;
    grid-template-columns: 1fr 1.3fr;
    gap: 16px;
    align-items: stretch;
    flex: 1;
  }
  .tm-cmp-digital .tm-split-body {
    grid-template-columns: 1fr 1.05fr;
    gap: 14px;
  }

  .tm-paper-visual {
    background: #F8F4EE;
    border-radius: 16px;
    border: 1px solid #EADBCE;
    padding: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
  }
  .tm-paper-board {
    width: 100%;
    background: #845A3C;
    border-radius: 12px;
    padding: 10px 8px 8px;
    box-shadow: 0 6px 16px rgba(42, 24, 13, 0.2);
  }
  .tm-paper-clip {
    width: 32px;
    height: 8px;
    background: #C4B5A5;
    border-radius: 3px;
    margin: 0 auto 6px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25);
  }
  .tm-paper-sheet {
    background: #FFFDF9;
    border-radius: 6px;
    padding: 10px 8px;
    font-family: 'Plus Jakarta Sans', sans-serif;
    border: 1px solid #EBE1D3;
  }
  .tm-paper-header {
    font-family: 'Outfit', serif;
    font-weight: 600;
    font-size: 10.5px;
    letter-spacing: 1.4px;
    text-align: center;
    color: #2A1C14;
    border-bottom: 1.5px solid #2A1C14;
    padding-bottom: 4px;
    margin-bottom: 7px;
  }
  .tm-paper-slot-title {
    font-size: 7.5px;
    font-weight: 700;
    color: #876039;
    letter-spacing: 0.6px;
    text-transform: uppercase;
    margin: 6px 0 3px;
  }
  .tm-paper-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 7.5px;
    color: #4A3E38;
    padding: 2.5px 0;
    border-bottom: 1px dashed #EDE4D8;
  }
  .tm-paper-row:last-child { border-bottom: none; }
  .tm-paper-row.struck span { text-decoration: line-through; color: #A89A90; }
  .tm-paper-row .err-tag { color: #DC2626; font-weight: 700; }

  .tm-points-list {
    display: flex;
    flex-direction: column;
    gap: 8px;
    justify-content: space-between;
  }
  .tm-point-card {
    background: #FFFFFF;
    border: 1px solid #FEE2E2;
    border-radius: 12px;
    padding: 9px 12px;
    display: flex;
    align-items: center;
    gap: 10px;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
  }
  .tm-point-card:hover {
    transform: translateX(2px);
    box-shadow: 0 4px 12px rgba(220, 38, 38, 0.08);
  }
  .tm-point-ico {
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
  .tm-point-ico svg { width: 15px; height: 15px; stroke: currentColor; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
  .tm-point-txt { display: flex; flex-direction: column; min-width: 0; }
  .tm-point-txt b { font-size: 13px; font-weight: 700; color: #21160F; line-height: 1.25; }
  .tm-point-txt span { font-size: 11px; color: #76675D; line-height: 1.3; }

  .tm-wf-steps {
    display: flex;
    flex-direction: column;
    justify-content: center;
    gap: 6px;
  }
  .tm-wf-card {
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
  .tm-wf-card:hover { transform: translateY(-2px); border-color: #876039; }
  .tm-wf-ico {
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
  .tm-wf-ico svg { width: 18px; height: 18px; stroke: currentColor; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
  .tm-wf-txt { display: flex; flex-direction: column; min-width: 0; }
  .tm-wf-txt b { font-size: 13px; font-weight: 600; color: #21160F; line-height: 1.25; }
  .tm-wf-txt span { font-size: 11.5px; color: #76675D; line-height: 1.3; }
  .tm-wf-arrow { text-align: center; font-size: 15px; font-weight: 500; color: #876039; line-height: 1; }

  .tm-phone-visual {
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .tm-phone-mockup {
    width: 100%;
    max-width: 224px;
    background: #1C1510;
    border-radius: 28px;
    padding: 7px;
    box-shadow: 0 16px 36px rgba(28, 20, 15, 0.28);
    border: 2px solid #362920;
  }
  .tm-phone-screen {
    background: #FFFFFF;
    border-radius: 22px;
    padding: 10px 9px 12px;
    overflow: hidden;
  }
  .tm-phone-island {
    width: 38px;
    height: 4px;
    background: #1C1510;
    border-radius: 4px;
    margin: 0 auto 6px;
  }
  .tm-phone-header { text-align: center; margin-bottom: 7px; }
  .tm-phone-title { font-family: 'Outfit', sans-serif; font-size: 13.5px; font-weight: 600; color: #21160F; line-height: 1.2; }
  .tm-phone-sub { font-size: 8px; color: #76675D; }
  .tm-phone-tabs {
    display: flex;
    gap: 3.5px;
    margin-bottom: 8px;
    justify-content: center;
  }
  .tm-tab-pill {
    font-size: 7.5px;
    font-weight: 700;
    padding: 2.5px 7px;
    border-radius: 12px;
    background: #FAF7F2;
    color: #6E6157;
    white-space: nowrap;
  }
  .tm-tab-active { background: #875A38; color: #FFFFFF; }

  .tm-mini-floor {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 6px;
  }
  .tm-mini-tbl {
    padding: 7px 6px;
    border-radius: 9px;
    border: 1px solid #EFE8DE;
    background: #FAF8F5;
    text-align: center;
  }
  .tm-mini-tbl b { display: block; font-size: 10px; color: #21160F; margin-bottom: 2px; }
  .tm-mini-tbl span {
    display: inline-block;
    font-size: 6.8px;
    font-weight: 700;
    padding: 1.5px 5px;
    border-radius: 4px;
  }
  .tm-mini-tbl.free span { background: #DCFCE7; color: #16A34A; }
  .tm-mini-tbl.occ span { background: #FEE2E2; color: #DC2626; }
  .tm-mini-tbl.res span { background: #DBEAFE; color: #1D4ED8; }
  .tm-mini-tbl.bill span { background: #FEF3C7; color: #B45309; }

  .tm-bottom-cta {
    margin-top: 16px;
    display: flex;
    justify-content: center;
  }
  .tm-bottom-cta-badge {
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
  .tm-bottom-cta-badge svg { width: 14px; height: 14px; stroke: #FFFFFF; fill: none; stroke-width: 2; }

  @media (max-width: 1080px) {
    .tm-cmp-wrap { grid-template-columns: 1fr; gap: 36px; }
    .tm-cmp-center-arrow { display: none; }
  }
  @media (max-width: 640px) {
    .tm-split-body, .tm-cmp-digital .tm-split-body { grid-template-columns: 1fr; gap: 16px; }
    .tm-paper-visual { max-width: 260px; margin: 0 auto; }
  }
</style>

<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd r">
      <div class="eb">OLD WAY VS. GENI MENU</div>
      <h2>The Host Stand Used to Run on <span class="sf">Guesswork.</span></h2>
      <p>See exactly what changes when you give your front-of-house team a real-time floor plan.</p>
    </div>

    <div class="tm-cmp-wrap r">
      <div class="tm-cmp-center-arrow">
        <div class="tm-center-arrow-circle">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <line x1="5" y1="12" x2="19" y2="12"></line>
            <polyline points="12 5 19 12 12 19"></polyline>
          </svg>
        </div>
      </div>

      <!-- LEFT CARD: Chaos at the Host Stand -->
      <div class="tm-cmp-card tm-cmp-traditional">
        <div class="tm-cmp-header">
          <div class="tm-badge-icon tm-badge-red">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
              <line x1="18" y1="6" x2="6" y2="18"></line>
              <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
          </div>
          <div>
            <h3 class="tm-cmp-title text-red">Chaos at the Host Stand</h3>
            <p class="tm-cmp-subtitle">Without Geni Menu — manual guesswork and floor confusion</p>
          </div>
        </div>

        <div class="tm-split-body">
          <div class="tm-paper-visual">
            <div class="tm-paper-board">
              <div class="tm-paper-clip"></div>
              <div class="tm-paper-sheet">
                <div class="tm-paper-header">SEATING CHART</div>

                <div class="tm-paper-slot-title">Main AC Hall</div>
                <div class="tm-paper-row"><span>T-03 (Couple)</span><span class="err-tag">Double!</span></div>
                <div class="tm-paper-row struck"><span>T-07 (Free?)</span><b>Check</b></div>

                <div class="tm-paper-slot-title">Family Zone</div>
                <div class="tm-paper-row"><span>T-09 (Timer?)</span><span class="err-tag">65m?!</span></div>
                <div class="tm-paper-row"><span>T-11 (Mehra)</span><span class="err-tag">Dirty!</span></div>

                <div class="tm-paper-slot-title">Waitlist</div>
                <div class="tm-paper-row"><span>4 Groups</span><b>No ETA</b></div>
              </div>
            </div>
          </div>

          <div class="tm-points-list">
            <div class="tm-point-card">
              <div class="tm-point-ico">
                <svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
              </div>
              <div class="tm-point-txt">
                <b>Shouting Across the Floor</b>
                <span>Host asks waiters if T-07 is free yet</span>
              </div>
            </div>

            <div class="tm-point-card">
              <div class="tm-point-ico">
                <svg viewBox="0 0 24 24"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/></svg>
              </div>
              <div class="tm-point-txt">
                <b>Scribbled Paper Charts</b>
                <span>Impossible to read during peak rush hour</span>
              </div>
            </div>

            <div class="tm-point-card">
              <div class="tm-point-ico">
                <svg viewBox="0 0 24 24"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"/><path d="M12 9v4"/><path d="M12 17h.01"/></svg>
              </div>
              <div class="tm-point-txt">
                <b>Double-Seated Tables</b>
                <span>Host and waiter both claim T-03 at once</span>
              </div>
            </div>

            <div class="tm-point-card">
              <div class="tm-point-ico">
                <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
              </div>
              <div class="tm-point-txt">
                <b>No Dining Timer Tracking</b>
                <span>No clue how long T-09 has been seated</span>
              </div>
            </div>

            <div class="tm-point-card">
              <div class="tm-point-ico">
                <svg viewBox="0 0 24 24"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
              </div>
              <div class="tm-point-txt">
                <b>Constant Floor Walks</b>
                <span>Manager walks every 15 mins to count seats</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- RIGHT CARD: Total Floor Visibility, Always -->
      <div class="tm-cmp-card tm-cmp-digital">
        <div class="tm-cmp-header">
          <div class="tm-badge-icon tm-badge-brown">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
              <polyline points="20 6 9 17 4 12"></polyline>
            </svg>
          </div>
          <div>
            <h3 class="tm-cmp-title text-brown">Total Floor Visibility, Always</h3>
            <p class="tm-cmp-subtitle">With Geni Menu — real-time color-coded floor control</p>
          </div>
        </div>

        <div class="tm-split-body">
          <div class="tm-wf-steps">
            <div class="tm-wf-card">
              <div class="tm-wf-ico">
                <svg viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>
              </div>
              <div class="tm-wf-txt">
                <b>Live Color-Coded Floor Map</b>
                <span>Available, Occupied, Reserved &amp; Cleaning</span>
              </div>
            </div>

            <div class="tm-wf-arrow">&darr;</div>

            <div class="tm-wf-card">
              <div class="tm-wf-ico">
                <svg viewBox="0 0 24 24"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
              </div>
              <div class="tm-wf-txt">
                <b>1-Tap Lock &amp; Dining Timer</b>
                <span>Zero double-seating + 60m amber alerts</span>
              </div>
            </div>

            <div class="tm-wf-arrow">&darr;</div>

            <div class="tm-wf-card">
              <div class="tm-wf-ico">
                <svg viewBox="0 0 24 24"><line x1="18" x2="18" y1="20" y2="10"/><line x1="12" x2="12" y1="20" y2="4"/><line x1="6" x2="6" y1="20" y2="14"/></svg>
              </div>
              <div class="tm-wf-txt">
                <b>Live Occupancy Dashboard</b>
                <span>Turn time, revenue &amp; VIP ETA — no walks</span>
              </div>
            </div>
          </div>

          <div class="tm-phone-visual">
            <div class="tm-phone-mockup">
              <div class="tm-phone-screen">
                <div class="tm-phone-island"></div>
                <div class="tm-phone-header">
                  <div class="tm-phone-title">Live Floor Plan</div>
                  <div class="tm-phone-sub">Real-time table status</div>
                </div>
                <div class="tm-phone-tabs">
                  <span class="tm-tab-pill tm-tab-active">Main AC</span>
                  <span class="tm-tab-pill">Patio</span>
                  <span class="tm-tab-pill">VIP</span>
                </div>
                <div class="tm-mini-floor">
                  <div class="tm-mini-tbl free">
                    <b>T-01</b>
                    <span>Available</span>
                  </div>
                  <div class="tm-mini-tbl occ">
                    <b>T-02 &bull; 24m</b>
                    <span>Occupied</span>
                  </div>
                  <div class="tm-mini-tbl res">
                    <b>T-03 &bull; 8 PM</b>
                    <span>Reserved</span>
                  </div>
                  <div class="tm-mini-tbl free">
                    <b>T-04</b>
                    <span>Available</span>
                  </div>
                  <div class="tm-mini-tbl bill">
                    <b>T-05 &bull; ₹980</b>
                    <span>Billed</span>
                  </div>
                  <div class="tm-mini-tbl free">
                    <b>T-07</b>
                    <span>Ready</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="tm-bottom-cta">
          <div class="tm-bottom-cta-badge">
            <svg viewBox="0 0 24 24"><path d="m12 3-1.9 5.8a2 2 0 0 1-1.3 1.3L3 12l5.8 1.9a2 2 0 0 1 1.3 1.3L12 21l1.9-5.8a2 2 0 0 1 1.3-1.3L21 12l-5.8-1.9a2 2 0 0 1-1.3-1.3L12 3Z"/></svg>
            <span>Total Floor Visibility, Always!</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= CONNECTED ECOSYSTEM & CROSS-LINKS ================= -->
<section>
  <div class="w">
    <div class="hd r">
      <div class="eb">CONNECTED OPERATIONS</div>
      <h2>Works Seamlessly <span class="sf">With Your Floor.</span></h2>
      <p>Table Management connects directly to reservations, waiter requests, orders, kitchen, and POS billing.</p>
    </div>

    <div class="rm-eco-grid r">
      <div class="rm-eco-step active">
        <span class="rm-eco-num">01</span>
        <img src="{{ asset('assets/images/workflow/step-4-table.png') }}" alt="Table Management" class="rm-eco-img">
        <div class="rm-eco-title">TABLES</div>
      </div>
      <div class="rm-eco-step">
        <span class="rm-eco-num">02</span>
        <img src="{{ asset('assets/images/workflow/step-1-menu.png') }}" alt="Reservations" class="rm-eco-img">
        <div class="rm-eco-title">RESERVATIONS</div>
      </div>
      <div class="rm-eco-step">
        <span class="rm-eco-num">03</span>
        <img src="{{ asset('assets/images/workflow/step-2-order.png') }}" alt="Waiter" class="rm-eco-img">
        <div class="rm-eco-title">WAITER</div>
      </div>
      <div class="rm-eco-step">
        <span class="rm-eco-num">04</span>
        <img src="{{ asset('assets/images/workflow/step-2-order.png') }}" alt="Orders" class="rm-eco-img">
        <div class="rm-eco-title">ORDERS</div>
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
        <img src="{{ asset('assets/images/workflow/step-6-payment.png') }}" alt="Payments" class="rm-eco-img">
        <div class="rm-eco-title">PAYMENTS</div>
      </div>
    </div>

    <!-- Cross-Link Feature Cards -->
    <div class="tm-cross-grid r">
      <a href="{{ route('features.reservation-management') }}" class="tm-cross-card">
        <div class="rm-val-ic">
          <svg viewBox="0 0 24 24"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
        </div>
        <div style="flex: 1;">
          <div style="font-family: 'Outfit', sans-serif; font-weight: 700; font-size: 16px; color: #21160F; margin-bottom: 3px;">Reservation Management</div>
          <div style="font-size: 13px; color: #6E6157;">Link arriving guests to their booked table with one tap.</div>
        </div>
        <span style="color: #876039; font-weight: 700; font-size: 18px;">→</span>
      </a>

      <a href="{{ route('features.waiter-request') }}" class="tm-cross-card">
        <div class="rm-val-ic">
          <svg viewBox="0 0 24 24"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/></svg>
        </div>
        <div style="flex: 1;">
          <div style="font-family: 'Outfit', sans-serif; font-weight: 700; font-size: 16px; color: #21160F; margin-bottom: 3px;">Waiter Request</div>
          <div style="font-size: 13px; color: #6E6157;">Guest buzzer requests show table number from the floor plan.</div>
        </div>
        <span style="color: #876039; font-weight: 700; font-size: 18px;">→</span>
      </a>

      <a href="{{ route('features.pos-management') }}" class="tm-cross-card">
        <div class="rm-val-ic">
          <svg viewBox="0 0 24 24"><rect width="20" height="14" x="2" y="5" rx="2"/><line x1="2" x2="22" y1="10" y2="10"/></svg>
        </div>
        <div style="flex: 1;">
          <div style="font-family: 'Outfit', sans-serif; font-weight: 700; font-size: 16px; color: #21160F; margin-bottom: 3px;">POS &amp; Billing</div>
          <div style="font-size: 13px; color: #6E6157;">Tap a table on the floor plan to open its live bill instantly.</div>
        </div>
        <span style="color: #876039; font-weight: 700; font-size: 18px;">→</span>
      </a>
    </div>
  </div>
</section>

<!-- ================= FAQ ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd r">
      <h2>Common Questions <span class="sf">Answered.</span></h2>
      <p>Everything you need to know before setting up your digital floor plan.</p>
    </div>

    <div class="faq-list r">
      <div class="faq-item open">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>How long does it take to draw my floor plan in Geni Menu?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Most restaurants complete their initial floor plan setup in under 20 minutes using our drag-and-drop editor. You can place tables, label zones, set seating capacities, and assign stewards all in one session. We also offer a guided onboarding call where a Geni Menu specialist sets it up with you.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>Does the floor plan update in real-time across all devices?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Geni Menu uses WebSocket connections to sync table status changes across all logged-in devices — POS terminals, host tablets, waiter handhelds, and the manager dashboard — in under one second. When Priya marks T-05 as Cleaning at her POS, Rajan sees the grey state appear on the floor map immediately.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>Can I manage multiple floors or buildings in one account?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Absolutely. Geni Menu supports multi-floor setups within a single location (Ground Floor, Rooftop, Basement Bar) as well as multiple outlets under one account (e.g. The Spice Route — Bandra and The Spice Route — Powai). Each outlet has its own independent floor plan and team, but management gets a consolidated view from the head office dashboard.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>How does guest linking work when a walk-in arrives without a reservation?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          For walk-ins, you simply tap the table on the floor map, enter the guest count, and optionally add a guest name or phone number. If the guest has visited before, their profile auto-populates from your CRM with past orders and preferences. The seating record is created instantly and tied to the POS session for that table.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>Is there a limit on the number of tables I can add?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          No hard limits. Geni Menu scales from a 5-table café to a 200-seat banquet hall. Larger properties typically split into multiple zones or floors for easier navigation. Our pricing is flat per outlet, not per table, so you never get penalised for growing.
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= FINAL CTA ================= -->
<section id="demo" style="background: linear-gradient(135deg, #876039 0%, #6f4e2d 100%); color: #fff; text-align: center;">
  <div class="w r">
    <div class="eb" style="background: rgba(255,255,255,0.15); color: #fff; border-color: rgba(255,255,255,0.3);">
      GET STARTED TODAY
    </div>
    <h2 style="color: #fff; font-size: clamp(34px, 5vw, 54px);">
      Give Your Team a Floor Plan<br>
      They Can Actually <span class="sf" style="background: linear-gradient(135deg, #fff 0%, #f4efe9 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Trust.</span>
    </h2>
    <p style="color: #f4efe9; max-width: 620px; margin: 20px auto 36px; font-size: 18px;">
      Join restaurants across India that have replaced guesswork with real-time floor intelligence. Setup takes 20 minutes.
    </p>

    <div style="display: flex; gap: 16px; justify-content: center; flex-wrap: wrap;">
      <a href="{{ route('restaurant_signup') }}" class="btn" style="background: #fff; color: var(--br); border-color: #fff; font-size: 16px; padding: 16px 36px; box-shadow: 0 8px 24px rgba(0,0,0,0.2);">Start Free Trial →</a>
      <a href="{{ route('contact.us') }}" class="btn" style="background: transparent; color: #fff; border-color: rgba(255,255,255,0.5); font-size: 16px; padding: 16px 36px;">Book a 15-min Demo</a>
    </div>

    <div style="margin-top: 36px; font-size: 14px; color: #e5d8c8; font-weight: 600; display: flex; justify-content: center; gap: 24px; flex-wrap: wrap;">
      <span>✓ No credit card required</span>
      <span>✓ Free onboarding call</span>
      <span>✓ Live in one service shift</span>
    </div>
  </div>
</section>

<script>
// Interactive Floor Plan Zone Filter
function filterFloorZone(zone, btn) {
  document.querySelectorAll('.rm-filter-btn').forEach(b => b.classList.remove('active'));
  if (btn) btn.classList.add('active');
  document.querySelectorAll('#tm-floor-grid .rm-table-tile').forEach(tile => {
    const tileZone = tile.getAttribute('data-zone');
    if (zone === 'all' || tileZone === zone) {
      tile.style.display = '';
    } else {
      tile.style.display = 'none';
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
