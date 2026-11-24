@php
$meta = [
    'title' => 'Restaurant Inventory Management Software | Geni Menu',
    'description' => 'Track restaurant ingredients, monitor real-time stock levels, log supplier purchases, record spoilage adjustments, and get low-stock alerts with Geni Menu Inventory Management.',
    'keywords' => 'restaurant inventory management, kitchen stock tracking, ingredient management software, low stock alerts, restaurant purchase orders, Geni Menu',
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
  --red: #B91C1C;
  --red-bg: #FEF2F2;
  --gray-bg: #F3F4F6;
  --gray-text: #4B5563;
}

.inv-page * { box-sizing: border-box; }
.inv-page {
  font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
  color: var(--ink);
  background: var(--bg);
  -webkit-font-smoothing: antialiased;
  overflow-x: hidden;
}

.inv-page h1, .inv-page h2, .inv-page h3, .inv-page h4 {
  margin: 0;
  font-family: 'Outfit', 'Plus Jakarta Sans', sans-serif;
  font-weight: 500;
  line-height: 1.14;
  letter-spacing: -0.025em;
  color: var(--ink);
}
.inv-page h1 { font-size: clamp(34px, 4.6vw, 56px); }
.inv-page h2 { font-size: clamp(28px, 3.6vw, 44px); }
.inv-page h3 { font-size: 20px; font-weight: 600; }
.inv-page p { margin: 0; color: var(--mute); font-size: 16px; line-height: 1.65; }
.inv-page a { text-decoration: none; color: inherit; }

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
.inv-sec { padding: clamp(56px, 6.5vw, 92px) 0; background: var(--bg); position: relative; overflow: hidden; }
.inv-sec.alt { background: var(--bg2); }
.inv-sec.border-b { border-bottom: 1px solid var(--line); }

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
.btn.p:hover {
  transform: translateY(-2px);
  background: linear-gradient(135deg, #6f4e2d 0%, #876039 100%);
  box-shadow: 0 8px 24px rgba(135, 96, 57, 0.36);
}
.btn.o { color: var(--br); background: #fff; }
.btn.o:hover { background: var(--br); color: #fff; transform: translateY(-2px); }

/* Breadcrumb */
.bc { padding: 16px 0; background: var(--bg2); border-bottom: 1px solid var(--line); font-size: 13.5px; color: var(--mute); font-weight: 600; }
.bc .w { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; }
.bc a:hover { color: var(--br); }
.bc .sep { opacity: 0.5; }
.bc .cur { color: var(--br); font-weight: 700; }

/* Reveal animation */
.r { opacity: 0; transform: translateY(20px); transition: opacity .65s ease, transform .65s ease; }
.r.on { opacity: 1; transform: none; }

/* ================= HERO ================= */
.rm-hero {
  padding: clamp(48px, 6vw, 84px) 0;
  background: linear-gradient(180deg, var(--bg2) 0%, #ffffff 100%);
  border-bottom: 1px solid var(--line);
}
.rm-hero-grid {
  display: grid;
  grid-template-columns: 1fr 1.12fr;
  gap: 52px;
  align-items: center;
}
.rm-hero-sub {
  font-size: 17.5px;
  margin: 20px 0 30px;
  max-width: 540px;
  color: var(--mute);
}
.rm-hero-cta { display: flex; gap: 14px; flex-wrap: wrap; margin-bottom: 34px; }
.rm-hero-stats {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 18px;
  padding-top: 24px;
  border-top: 1px solid var(--line);
}
.rm-hero-stat strong {
  display: block;
  font-family: 'Outfit', sans-serif;
  font-size: 22px;
  font-weight: 600;
  color: var(--br);
  line-height: 1.2;
}
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
.rm-hero-media img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
  transition: transform 0.6s ease;
}
.rm-hero-media:hover img { transform: scale(1.03); }
.rm-hero-scrim {
  position: absolute;
  inset: 0;
  background: linear-gradient(180deg, rgba(33, 22, 15, 0.14) 0%, rgba(33, 22, 15, 0.04) 45%, rgba(33, 22, 15, 0.62) 100%);
  pointer-events: none;
}
.rm-hero-pill {
  position: absolute;
  top: 18px;
  left: 18px;
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 8px 14px;
  border-radius: 99px;
  background: rgba(255, 255, 255, 0.92);
  backdrop-filter: blur(10px);
  font-size: 12px;
  font-weight: 700;
  color: var(--ink);
  box-shadow: 0 6px 20px rgba(0, 0, 0, 0.14);
}
.rm-live-dot {
  width: 8px;
  height: 8px;
  border-radius: 50%;
  background: #16A34A;
  box-shadow: 0 0 0 3px rgba(22, 163, 74, 0.22);
}
.rm-hero-float {
  position: absolute;
  left: 18px;
  right: 18px;
  bottom: 18px;
  background: rgba(255, 255, 255, 0.94);
  backdrop-filter: blur(12px);
  border: 1px solid rgba(135, 96, 57, 0.2);
  border-radius: 16px;
  padding: 14px 18px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 14px;
  box-shadow: 0 12px 30px rgba(33, 22, 15, 0.18);
}
.rm-hero-float-left { display: flex; align-items: center; gap: 12px; }
.rm-hero-float-ico {
  width: 40px;
  height: 40px;
  border-radius: 11px;
  background: var(--br-light);
  color: var(--br);
  border: 1px solid rgba(135, 96, 57, 0.2);
  display: grid;
  place-items: center;
  flex: none;
}
.rm-hero-float-ico svg { width: 20px; height: 20px; fill: none; stroke: currentColor; stroke-width: 2; }
.rm-hero-float-ttl { font-size: 13.5px; font-weight: 700; color: var(--ink); line-height: 1.25; }
.rm-hero-float-sub { font-size: 12px; color: var(--mute); }
.rm-hero-float-tag {
  font-size: 11px;
  font-weight: 700;
  padding: 5px 11px;
  border-radius: 99px;
  background: var(--red-bg);
  color: var(--red);
  white-space: nowrap;
}

/* ================= VALUE STRIP (01-04) ================= */
.rm-val-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; }
.rm-val-card {
  background: var(--bg2);
  border: 1px solid var(--line);
  border-radius: 18px;
  padding: 24px;
  transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
}
.rm-val-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-md); border-color: rgba(135, 96, 57, 0.32); background: #fff; }
.rm-val-top { display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px; }
.rm-ic {
  width: 46px;
  height: 46px;
  border-radius: 13px;
  background: #fff;
  color: var(--br);
  border: 1px solid var(--line);
  display: grid;
  place-items: center;
  transition: .25s ease;
}
.rm-ic svg { width: 21px; height: 21px; fill: none; stroke: currentColor; stroke-width: 1.9; stroke-linecap: round; stroke-linejoin: round; }
.rm-val-card:hover .rm-ic, .rm-ben-card:hover .rm-ic { background: var(--br); color: #fff; border-color: var(--br); }
.rm-num { font-family: 'Outfit', sans-serif; font-size: 13px; font-weight: 700; color: var(--br); opacity: 0.75; letter-spacing: 0.06em; }
.rm-val-card h3 { font-size: 17.5px; margin-bottom: 8px; }
.rm-val-card p { font-size: 14px; }

/* ================= PROGRESSION GRID (6-COL / 4-COL) ================= */
.rm-prog-grid-6 { display: grid; grid-template-columns: repeat(6, 1fr); gap: 14px; }
.rm-prog-grid-4 { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; }
.rm-prog-card {
  background: #fff;
  border: 1px solid var(--line);
  border-radius: 16px;
  padding: 20px 16px;
  text-align: center;
  transition: transform .25s ease, border-color .25s ease, box-shadow .25s ease;
}
.rm-prog-card:hover { transform: translateY(-4px); border-color: var(--br); box-shadow: var(--shadow-sm); }
.rm-prog-num {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 34px;
  height: 34px;
  border-radius: 10px;
  background: var(--br-light);
  color: var(--br);
  font-family: 'Outfit', sans-serif;
  font-weight: 700;
  font-size: 13px;
  margin-bottom: 12px;
  border: 1px solid rgba(135, 96, 57, 0.2);
}
.rm-prog-card h4 { font-size: 14.5px; font-weight: 700; margin-bottom: 5px; }
.rm-prog-card p { font-size: 12.5px; line-height: 1.45; }

/* ================= WINDOW CHROME & CONSOLE TABLE ================= */
.rm-win {
  background: #fff;
  border: 1px solid var(--line);
  border-radius: 22px;
  overflow: hidden;
  box-shadow: var(--shadow-md);
}
.rm-win-bar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 13px 20px;
  background: var(--bg2);
  border-bottom: 1px solid var(--line);
  gap: 12px;
  flex-wrap: wrap;
}
.rm-win-dots { display: flex; gap: 6px; }
.rm-win-dots i { width: 10px; height: 10px; border-radius: 50%; display: inline-block; }
.rm-win-dots i:nth-child(1) { background: #ff5f56; }
.rm-win-dots i:nth-child(2) { background: #ffbd2e; }
.rm-win-dots i:nth-child(3) { background: #27c93f; }
.rm-win-ttl {
  font-family: 'Outfit', sans-serif;
  font-size: 12px;
  font-weight: 700;
  letter-spacing: 0.08em;
  text-transform: uppercase;
  color: var(--br);
}
.rm-win-body { padding: 24px; }

.rm-filter-bar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  flex-wrap: wrap;
  gap: 12px;
  margin-bottom: 18px;
}
.rm-filter-group { display: flex; gap: 6px; flex-wrap: wrap; }
.rm-filter-btn {
  padding: 7px 14px;
  border-radius: 99px;
  border: 1px solid var(--line);
  background: var(--bg2);
  color: var(--mute);
  font: 700 12.5px 'Plus Jakarta Sans', sans-serif;
  cursor: pointer;
  transition: .2s ease;
}
.rm-filter-btn:hover { border-color: var(--br); color: var(--br); }
.rm-filter-btn.active { background: var(--br); color: #fff; border-color: var(--br); }

.rm-search-input {
  padding: 7px 14px;
  border-radius: 99px;
  border: 1px solid var(--line);
  background: #fff;
  font: 500 12.5px 'Plus Jakarta Sans', sans-serif;
  color: var(--ink);
  outline: none;
  width: 210px;
}
.rm-search-input:focus { border-color: var(--br); }

.rm-table-wrap { border: 1px solid var(--line); border-radius: 14px; overflow-x: auto; }
.rm-table { width: 100%; border-collapse: collapse; text-align: left; font-size: 13.5px; }
.rm-table th {
  background: var(--bg2);
  padding: 12px 16px;
  font-size: 11px;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--mute);
  border-bottom: 1px solid var(--line);
  white-space: nowrap;
}
.rm-table td {
  padding: 13px 16px;
  border-bottom: 1px solid rgba(135, 96, 57, 0.08);
  color: var(--ink);
  vertical-align: middle;
}
.rm-table tr:last-child td { border-bottom: none; }
.rm-table tr:hover td { background: rgba(250, 247, 242, 0.65); }

/* Status Badges */
.st-badge {
  font-size: 11px;
  font-weight: 700;
  padding: 4px 10px;
  border-radius: 99px;
  text-transform: uppercase;
  display: inline-flex;
  align-items: center;
  gap: 5px;
  letter-spacing: .04em;
  white-space: nowrap;
}
.st-badge.instock { background: var(--green-bg); color: var(--green); }
.st-badge.lowstock { background: var(--amber-bg); color: var(--amber); }
.st-badge.critical { background: var(--red-bg); color: var(--red); }
.st-badge.outofstock { background: var(--gray-bg); color: var(--gray-text); }
.st-dot { width: 6px; height: 6px; border-radius: 50%; display: inline-block; background: currentColor; }

.rm-act-btn {
  padding: 5px 10px;
  border-radius: 7px;
  border: 1px solid var(--line);
  background: #fff;
  font-size: 11.5px;
  font-weight: 700;
  color: var(--ink);
  cursor: pointer;
  transition: .2s;
}
.rm-act-btn:hover { border-color: var(--br); color: var(--br); }
.rm-act-btn.primary { border-color: var(--br); background: var(--br-light); color: var(--br); }
.rm-act-btn.primary:hover { background: var(--br); color: #fff; }

/* ================= SPLIT LAYOUT & FEATURE LIST ================= */
.rm-split { display: grid; grid-template-columns: 1fr 1.05fr; gap: 36px; align-items: start; }
.rm-split.center { align-items: center; }

/* ================= EDITORIAL PHOTO CARDS (INGREDIENTS & SCENES) ================= */
.inv-photo-grid-3 { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }
.inv-photo-card {
  background: #fff;
  border: 1px solid var(--line);
  border-radius: 20px;
  overflow: hidden;
  box-shadow: var(--shadow-sm);
  transition: transform .3s ease, box-shadow .3s ease, border-color .3s ease;
}
.inv-photo-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-md); border-color: rgba(135, 96, 57, 0.34); }
.inv-photo-head { height: 155px; position: relative; overflow: hidden; }
.inv-photo-head img { width: 100%; height: 100%; object-fit: cover; transition: transform .5s ease; display: block; }
.inv-photo-card:hover .inv-photo-head img { transform: scale(1.06); }
.inv-photo-head::after {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(180deg, transparent 35%, rgba(33, 22, 15, 0.65) 100%);
}
.inv-photo-badge { position: absolute; top: 12px; right: 12px; z-index: 2; }
.inv-photo-body { padding: 20px 22px; }

/* Editorial Side Photo Frame */
.inv-editorial-frame {
  position: relative;
  border-radius: 20px;
  overflow: hidden;
  border: 1px solid var(--line);
  box-shadow: var(--shadow-sm);
  height: 210px;
  margin-top: 16px;
}
.inv-editorial-frame img { width: 100%; height: 100%; object-fit: cover; display: block; }
.inv-editorial-frame::after {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(180deg, transparent 25%, rgba(33, 22, 15, 0.78) 100%);
}
.inv-editorial-caption {
  position: absolute;
  left: 18px;
  right: 18px;
  bottom: 14px;
  z-index: 2;
  color: #fff;
}
.inv-editorial-caption strong { display: block; font-family: 'Outfit', sans-serif; font-size: 16px; font-weight: 600; color: #fff; }
.inv-editorial-caption span { font-size: 12.5px; color: rgba(255, 255, 255, 0.85); }

/* ================= PEAK SERVICE EDITORIAL BANNER ================= */
.inv-peak-banner {
  position: relative;
  border-radius: 26px;
  overflow: hidden;
  padding: clamp(32px, 4.5vw, 52px);
  color: #fff;
  background: #21160F;
  box-shadow: var(--shadow-lg);
}
.inv-peak-bg {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  opacity: 0.28;
}
.inv-peak-scrim {
  position: absolute;
  inset: 0;
  background: linear-gradient(135deg, rgba(33, 22, 15, 0.9) 0%, rgba(111, 78, 45, 0.78) 100%);
}
.inv-peak-inner { position: relative; z-index: 2; }
.inv-peak-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; margin: 28px 0 24px; }
.inv-peak-stat {
  background: rgba(255, 255, 255, 0.1);
  backdrop-filter: blur(10px);
  border: 1px solid rgba(255, 255, 255, 0.18);
  border-radius: 16px;
  padding: 20px;
  text-align: center;
}
.inv-peak-stat span { display: block; font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; color: rgba(255, 255, 255, 0.78); }
.inv-peak-stat strong { display: block; font-family: 'Outfit', sans-serif; font-size: 34px; font-weight: 600; color: #fff; margin-top: 4px; }

/* ================= BENEFITS GRID (3x2) ================= */
.rm-ben-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 22px; }
.rm-ben-card {
  background: #fff;
  border: 1px solid var(--line);
  border-radius: 18px;
  padding: 26px;
  box-shadow: var(--shadow-sm);
  transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
}
.rm-ben-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-md); border-color: rgba(135, 96, 57, 0.34); }
.rm-ben-head { display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px; }
.rm-ben-card h4 { font-size: 18px; font-weight: 700; margin-bottom: 8px; }
.rm-ben-card p { font-size: 14.5px; }

/* ================= INDUSTRY CARDS (3-COL WITH IMAGE ZOOM) ================= */
.rm-ind-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 22px; }
.rm-ind-card {
  position: relative;
  border-radius: 20px;
  overflow: hidden;
  min-height: 230px;
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
  padding: 22px;
  border: 1px solid var(--line);
  box-shadow: var(--shadow-sm);
  background: #21160F;
}
.rm-ind-card img {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform .55s ease;
}
.rm-ind-card:hover img { transform: scale(1.07); }
.rm-ind-scrim {
  position: absolute;
  inset: 0;
  background: linear-gradient(180deg, rgba(33, 22, 15, 0.14) 0%, rgba(33, 22, 15, 0.86) 100%);
}
.rm-ind-body { position: relative; z-index: 2; }
.rm-ind-body h4 { color: #fff; font-size: 18px; font-weight: 600; margin-bottom: 5px; }
.rm-ind-body p { color: rgba(255, 255, 255, 0.84); font-size: 13.5px; line-height: 1.5; }

/* ================= ECOSYSTEM (7-COL) ================= */
.rm-eco-grid { display: grid; grid-template-columns: repeat(7, 1fr); gap: 12px; }
.rm-eco-card {
  background: #fff;
  border: 1px solid var(--line);
  border-radius: 16px;
  padding: 16px 10px;
  text-align: center;
  transition: .25s ease;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 8px;
}
.rm-eco-card:hover { transform: translateY(-4px); border-color: var(--br); box-shadow: var(--shadow-sm); }
.rm-eco-card.active { background: var(--br); border-color: var(--br); color: #fff; box-shadow: 0 10px 26px rgba(135, 96, 57, 0.3); }
.rm-eco-step { font-size: 10.5px; font-weight: 700; letter-spacing: 0.08em; color: var(--br); }
.rm-eco-card.active .rm-eco-step { color: rgba(255, 255, 255, 0.85); }
.rm-eco-img { width: 44px; height: 44px; border-radius: 12px; background: var(--bg2); padding: 6px; object-fit: contain; }
.rm-eco-card.active .rm-eco-img { background: rgba(255, 255, 255, 0.95); }
.rm-eco-lbl { font-size: 12.5px; font-weight: 700; color: var(--ink); line-height: 1.25; }
.rm-eco-card.active .rm-eco-lbl { color: #fff; }

/* ================= PRESERVED COMPARISON CARDS ================= */
.inv-cmp-wrap {
  position: relative;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 32px;
  align-items: stretch;
}
.inv-cmp-center-arrow {
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  z-index: 20;
  pointer-events: none;
}
.inv-center-arrow-circle {
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
.inv-center-arrow-circle svg { width: 20px; height: 20px; }
.inv-cmp-card {
  border-radius: 24px;
  padding: 26px;
  position: relative;
  display: flex;
  flex-direction: column;
}
.inv-cmp-traditional {
  background: #FFFDFC;
  border: 1.5px solid #FECDD3;
  box-shadow: 0 10px 30px rgba(220, 38, 38, 0.04);
}
.inv-cmp-digital {
  background: #FFFFFF;
  border: 1.5px solid rgba(135, 96, 57, 0.28);
  box-shadow: 0 14px 40px rgba(135, 96, 57, 0.08);
}
.inv-cmp-header { display: flex; align-items: center; gap: 12px; margin-bottom: 22px; }
.inv-badge-icon {
  width: 36px;
  height: 36px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}
.inv-badge-icon svg { width: 18px; height: 18px; }
.inv-badge-red { background: #FEE2E2; color: #DC2626; }
.inv-badge-brown { background: #6F4522; color: #FFFFFF; }
.inv-cmp-title { font-family: 'Outfit', sans-serif; font-size: 19px; font-weight: 700; margin: 0 0 2px; line-height: 1.2; }
.inv-cmp-title.text-red { color: #991B1B; }
.inv-cmp-title.text-brown { color: #21160F; }
.inv-cmp-subtitle { font-size: 12.5px; color: #76675D; margin: 0; }
.inv-split-body { display: grid; grid-template-columns: 1fr 1.3fr; gap: 16px; align-items: stretch; flex: 1; }
.inv-cmp-digital .inv-split-body { grid-template-columns: 1fr 1.05fr; gap: 14px; }
.inv-paper-visual {
  background: #F8F4EE;
  border-radius: 16px;
  border: 1px solid #EADBCE;
  padding: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;
}
.inv-paper-board { width: 100%; background: #845A3C; border-radius: 12px; padding: 10px 8px 8px; box-shadow: 0 6px 16px rgba(42, 24, 13, 0.2); }
.inv-paper-clip { width: 32px; height: 8px; background: #C4B5A5; border-radius: 3px; margin: 0 auto 6px; }
.inv-paper-sheet { background: #FFFDF9; border-radius: 6px; padding: 10px 8px; border: 1px solid #EBE1D3; }
.inv-paper-header { font-family: 'Outfit', serif; font-weight: 600; font-size: 10.5px; letter-spacing: 1.5px; text-align: center; color: #2A1C14; border-bottom: 1.5px solid #2A1C14; padding-bottom: 4px; margin-bottom: 7px; }
.inv-paper-slot-title { font-size: 7.5px; font-weight: 700; color: #876039; letter-spacing: 0.6px; text-transform: uppercase; margin: 6px 0 3px; }
.inv-paper-row { display: flex; justify-content: space-between; align-items: center; font-size: 7.5px; color: #4A3E38; padding: 2.5px 0; border-bottom: 1px dashed #EDE4D8; }
.inv-paper-row:last-child { border-bottom: none; }
.inv-paper-row.struck span { text-decoration: line-through; color: #A89A90; }
.inv-paper-row .err-tag { color: #DC2626; font-weight: 700; }
.inv-points-list { display: flex; flex-direction: column; gap: 8px; justify-content: space-between; }
.inv-point-card { background: #FFFFFF; border: 1px solid #FEE2E2; border-radius: 12px; padding: 9px 12px; display: flex; align-items: center; gap: 10px; }
.inv-point-ico { width: 32px; height: 32px; border-radius: 50%; background: #FEE2E2; color: #DC2626; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
.inv-point-ico svg { width: 15px; height: 15px; stroke: currentColor; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
.inv-point-txt { display: flex; flex-direction: column; min-width: 0; }
.inv-point-txt b { font-size: 13px; font-weight: 700; color: #21160F; line-height: 1.25; }
.inv-point-txt span { font-size: 11px; color: #76675D; line-height: 1.3; }
.inv-wf-steps { display: flex; flex-direction: column; justify-content: center; gap: 6px; }
.inv-wf-card { background: #FFFFFF; border: 1px solid rgba(135, 96, 57, 0.2); border-radius: 14px; padding: 12px 14px; display: flex; align-items: center; gap: 12px; }
.inv-wf-ico { width: 38px; height: 38px; border-radius: 10px; background: #FBF6EE; color: #876039; display: flex; align-items: center; justify-content: center; flex-shrink: 0; border: 1px solid rgba(135, 96, 57, 0.18); }
.inv-wf-ico svg { width: 18px; height: 18px; stroke: currentColor; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
.inv-wf-txt { display: flex; flex-direction: column; min-width: 0; }
.inv-wf-txt b { font-size: 13px; font-weight: 600; color: #21160F; line-height: 1.25; }
.inv-wf-txt span { font-size: 11.5px; color: #76675D; line-height: 1.3; }
.inv-wf-arrow { text-align: center; font-size: 15px; font-weight: 500; color: #876039; line-height: 1; }
.inv-phone-visual { display: flex; align-items: center; justify-content: center; }
.inv-phone-mockup { width: 100%; max-width: 224px; background: #1C1510; border-radius: 28px; padding: 7px; box-shadow: 0 16px 36px rgba(28, 20, 15, 0.28); border: 2px solid #362920; }
.inv-phone-screen { background: #FFFFFF; border-radius: 22px; padding: 10px 9px 12px; overflow: hidden; }
.inv-phone-island { width: 38px; height: 4px; background: #1C1510; border-radius: 4px; margin: 0 auto 6px; }
.inv-phone-header { text-align: center; margin-bottom: 7px; }
.inv-phone-title { font-family: 'Outfit', sans-serif; font-size: 13.5px; font-weight: 600; color: #21160F; line-height: 1.2; }
.inv-phone-sub { font-size: 8px; color: #76675D; }
.inv-phone-tabs { display: flex; gap: 3.5px; margin-bottom: 8px; justify-content: center; }
.inv-tab-pill { font-size: 7.5px; font-weight: 700; padding: 2.5px 7px; border-radius: 12px; background: #FAF7F2; color: #6E6157; white-space: nowrap; }
.inv-tab-active { background: #875A38; color: #FFFFFF; }
.inv-live-list { display: flex; flex-direction: column; gap: 6px; }
.inv-live-row { padding: 6px 7px; background: #FAF8F5; border: 1px solid #EFE8DE; border-radius: 9px; display: flex; flex-direction: column; gap: 3px; }
.inv-lv-top { display: flex; justify-content: space-between; align-items: center; gap: 4px; }
.inv-lv-name { font-size: 9.5px; font-weight: 700; color: #21160F; }
.inv-lv-badge { font-size: 6.5px; font-weight: 700; padding: 1.5px 5px; border-radius: 4px; }
.inv-lv-badge.low { background: #FEF3C7; color: #B45309; }
.inv-lv-badge.ok { background: #DCFCE7; color: #16A34A; }
.inv-lv-badge.crit { background: #FEE2E2; color: #DC2626; }
.inv-lv-meta { display: flex; justify-content: space-between; font-size: 7.5px; color: #76675D; }
.inv-lv-qty { font-weight: 700; color: #876039; }
.inv-bottom-cta { margin-top: 16px; display: flex; justify-content: center; }
.inv-bottom-cta-badge {
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
.inv-bottom-cta-badge svg { width: 14px; height: 14px; stroke: #FFFFFF; fill: none; stroke-width: 2; }

/* ================= FAQ ================= */
.rm-faq-list { max-width: 860px; margin: 0 auto; display: flex; flex-direction: column; gap: 12px; }
.rm-faq-item { background: #fff; border: 1px solid var(--line); border-radius: 16px; overflow: hidden; transition: border-color .2s, box-shadow .2s; }
.rm-faq-item.open { border-color: var(--br); box-shadow: var(--shadow-sm); }
.rm-faq-q {
  padding: 18px 22px;
  font-size: 16px;
  font-weight: 700;
  color: var(--ink);
  cursor: pointer;
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 14px;
  user-select: none;
}
.rm-faq-q svg { width: 18px; height: 18px; stroke: var(--br); transition: transform .25s ease; flex: none; }
.rm-faq-item.open .rm-faq-q svg { transform: rotate(180deg); }
.rm-faq-a { display: none; padding: 0 22px 20px; font-size: 15px; color: var(--mute); line-height: 1.65; border-top: 1px solid rgba(135, 96, 57, 0.08); padding-top: 14px; }
.rm-faq-item.open .rm-faq-a { display: block; }

/* ================= FINAL CTA ================= */
.rm-cta {
  padding: clamp(64px, 7vw, 96px) 0;
  background: linear-gradient(135deg, #876039 0%, #6f4e2d 100%);
  color: #fff;
  text-align: center;
  position: relative;
  overflow: hidden;
}
.rm-cta .eb { background: rgba(255, 255, 255, 0.14); border-color: rgba(255, 255, 255, 0.28); color: #fff; }
.rm-cta h2 { color: #fff; font-size: clamp(30px, 4.2vw, 48px); margin-bottom: 16px; }
.rm-cta p { color: rgba(255, 255, 255, 0.88); max-width: 640px; margin: 0 auto 32px; font-size: 17.5px; }
.rm-cta-btns { display: flex; gap: 14px; justify-content: center; flex-wrap: wrap; }
.rm-cta .btn.white { background: #fff; color: var(--br-dark); border-color: #fff; }
.rm-cta .btn.white:hover { background: var(--br-light); transform: translateY(-2px); }
.rm-cta .btn.ghost { background: transparent; color: #fff; border-color: rgba(255, 255, 255, 0.55); }
.rm-cta .btn.ghost:hover { background: rgba(255, 255, 255, 0.14); transform: translateY(-2px); }

/* ================= RESPONSIVE ================= */
@media (max-width: 1080px) {
  .rm-hero-grid, .rm-split, .inv-cmp-wrap { grid-template-columns: 1fr; gap: 32px; }
  .inv-cmp-center-arrow { display: none; }
  .rm-val-grid, .rm-prog-grid-4, .inv-peak-grid { grid-template-columns: repeat(2, 1fr); }
  .rm-prog-grid-6 { grid-template-columns: repeat(3, 1fr); }
  .rm-eco-grid { grid-template-columns: repeat(4, 1fr); }
}
@media (max-width: 820px) {
  .rm-ben-grid, .rm-ind-grid, .inv-photo-grid-3 { grid-template-columns: 1fr; }
  .rm-prog-grid-6 { grid-template-columns: repeat(2, 1fr); }
  .rm-eco-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 640px) {
  .w { padding: 0 16px; }
  .rm-val-grid, .rm-prog-grid-4, .inv-peak-grid { grid-template-columns: 1fr; }
  .inv-split-body, .inv-cmp-digital .inv-split-body { grid-template-columns: 1fr; }
  .rm-hero-float { flex-direction: column; align-items: flex-start; }
  .rm-hero-cta .btn, .rm-cta-btns .btn { width: 100%; }
}
</style>

<div class="inv-page">

  <!-- ================= BREADCRUMB ================= -->
  <div class="bc">
    <div class="w">
      <a href="{{ route('home') }}">Home</a>
      <span class="sep">/</span>
      <a href="{{ route('features') }}">Features</a>
      <span class="sep">/</span>
      <span class="cur">Inventory Management</span>
    </div>
  </div>

  <!-- ================= 1. HERO SECTION ================= -->
  <section class="rm-hero">
    <div class="w">
      <div class="rm-hero-grid">
        <div>
          <div class="eb">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"/><polyline points="3.27 6.96 12 12.01 20.73 6.96"/><line x1="12" y1="22.08" x2="12" y2="12"/></svg>
            INVENTORY MANAGEMENT
          </div>
          <h1>
            Know What You Have.<br>
            <span class="sf">Know What You Need.</span>
          </h1>
          <p class="rm-hero-sub">
            Track ingredients, monitor stock levels and understand inventory movement so your restaurant team can stay prepared for daily service.
          </p>

          <div class="rm-hero-cta">
            <a href="{{ route('restaurant_signup') }}" onclick="if(typeof openPopup === 'function'){ openPopup(); return false; }" class="btn p">Get Started &rarr;</a>
            <a href="{{ route('contact.us') }}" class="btn o">Book a Demo</a>
          </div>

          <div class="rm-hero-stats">
            <div class="rm-hero-stat">
              <strong>Real-Time</strong>
              <span>Stock Tracking</span>
            </div>
            <div class="rm-hero-stat">
              <strong>Unit-Based</strong>
              <span>kg, L, pcs &amp; Packs</span>
            </div>
            <div class="rm-hero-stat">
              <strong>Alerts</strong>
              <span>Low Stock Warnings</span>
            </div>
          </div>
        </div>

        <div class="rm-hero-media">
          <img src="{{ asset('assets/images/inventory-management-hero.jpg') }}" alt="Restaurant manager tracking kitchen inventory on tablet in warm pantry">
          <div class="rm-hero-scrim"></div>
          <div class="rm-hero-pill">
            <span class="rm-live-dot"></span>
            Live Stock Sync &bull; 186 Items Tracked
          </div>
          <div class="rm-hero-float">
            <div class="rm-hero-float-left">
              <div class="rm-hero-float-ico">
                <svg viewBox="0 0 24 24"><path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
              </div>
              <div>
                <div class="rm-hero-float-ttl">Low Stock Alert &bull; Main Kitchen</div>
                <div class="rm-hero-float-sub">Tomato 3 kg (Critical) &bull; Paneer 5 kg &bull; Chicken 12 kg</div>
              </div>
            </div>
            <span class="rm-hero-float-tag">Reorder Now</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= 2. VALUE STRIP (01-04) ================= -->
  <section class="inv-sec border-b">
    <div class="w">
      <div class="rm-val-grid r">
        <div class="rm-val-card">
          <div class="rm-val-top">
            <div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg></div>
            <span class="rm-num">01</span>
          </div>
          <h3>Stock Visibility</h3>
          <p>Know what ingredients and supplies are available across your kitchen.</p>
        </div>

        <div class="rm-val-card">
          <div class="rm-val-top">
            <div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg></div>
            <span class="rm-num">02</span>
          </div>
          <h3>Low Stock Awareness</h3>
          <p>Identify items that need attention before service shortages occur.</p>
        </div>

        <div class="rm-val-card">
          <div class="rm-val-top">
            <div class="rm-ic"><svg viewBox="0 0 24 24"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg></div>
            <span class="rm-num">03</span>
          </div>
          <h3>Inventory Movement</h3>
          <p>Understand purchases, consumption and adjustments with full history.</p>
        </div>

        <div class="rm-val-card">
          <div class="rm-val-top">
            <div class="rm-ic"><svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg></div>
            <span class="rm-num">04</span>
          </div>
          <h3>Better Kitchen Planning</h3>
          <p>Keep ingredient availability connected to daily restaurant operations.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= 3. INVENTORY LIFECYCLE ================= -->
  <section class="inv-sec alt border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">RESTAURANT INVENTORY LIFECYCLE</div>
        <h2>From Procurement to <span class="sf">Timely Replenishment.</span></h2>
        <p>Every ingredient follows a clear, accountable 6-stage lifecycle inside your kitchen.</p>
      </div>

      <div class="rm-prog-grid-6 r">
        <div class="rm-prog-card">
          <div class="rm-prog-num">01</div>
          <h4>Purchase</h4>
          <p>Create supplier purchase orders with exact units &amp; costs.</p>
        </div>
        <div class="rm-prog-card">
          <div class="rm-prog-num">02</div>
          <h4>Receive</h4>
          <p>Verify incoming deliveries and log partial receipts.</p>
        </div>
        <div class="rm-prog-card">
          <div class="rm-prog-num">03</div>
          <h4>Stock</h4>
          <p>Organize raw materials, dairy, produce &amp; packaging.</p>
        </div>
        <div class="rm-prog-card">
          <div class="rm-prog-num">04</div>
          <h4>Consume</h4>
          <p>Track kitchen prep consumption across daily shifts.</p>
        </div>
        <div class="rm-prog-card">
          <div class="rm-prog-num">05</div>
          <h4>Monitor</h4>
          <p>Watch live status badges &amp; low-stock warnings.</p>
        </div>
        <div class="rm-prog-card">
          <div class="rm-prog-num">06</div>
          <h4>Replenish</h4>
          <p>Reorder critical items before dinner service begins.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= 4. PROBLEM & COMPARISON SECTION ================= -->
  <section class="inv-sec">
    <div class="w">
      <div class="hd r">
        <div class="eb">OPERATIONAL CLARITY</div>
        <h2>Restaurant Inventory <span class="sf">Shouldn’t Be a Guess.</span></h2>
        <p>Traditional paper logs and manual stock checks leave kitchen teams unprepared during rush hours.</p>
      </div>

      <div class="inv-cmp-wrap r">
        <div class="inv-cmp-center-arrow">
          <div class="inv-center-arrow-circle">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
              <line x1="5" y1="12" x2="19" y2="12"></line>
              <polyline points="12 5 19 12 12 19"></polyline>
            </svg>
          </div>
        </div>

        <!-- Left: Traditional Inventory -->
        <div class="inv-cmp-card inv-cmp-traditional">
          <div class="inv-cmp-header">
            <div class="inv-badge-icon inv-badge-red">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
              </svg>
            </div>
            <div>
              <h3 class="inv-cmp-title text-red">Traditional Inventory</h3>
              <p class="inv-cmp-subtitle">Manual stock counts, paper bills &amp; rush shortages</p>
            </div>
          </div>

          <div class="inv-split-body">
            <div class="inv-paper-visual">
              <div class="inv-paper-board">
                <div class="inv-paper-clip"></div>
                <div class="inv-paper-sheet">
                  <div class="inv-paper-header">STOCK LOG</div>
                  <div class="inv-paper-slot-title">Kitchen Store</div>
                  <div class="inv-paper-row"><span>Paneer</span><span class="err-tag">Out!</span></div>
                  <div class="inv-paper-row struck"><span>Chicken 10kg</span><b>Check?</b></div>
                  <div class="inv-paper-slot-title">Dry Store</div>
                  <div class="inv-paper-row"><span>Paper Bills</span><span class="err-tag">Missing</span></div>
                  <div class="inv-paper-row"><span>Spoilage</span><span class="err-tag">Untracked</span></div>
                </div>
              </div>
            </div>

            <div class="inv-points-list">
              <div class="inv-point-card">
                <div class="inv-point-ico"><svg viewBox="0 0 24 24"><rect width="8" height="4" x="8" y="2" rx="1" ry="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/></svg></div>
                <div class="inv-point-txt"><b>Manual Stock Errors</b><span>Hand-counted stock sheets drift from reality</span></div>
              </div>
              <div class="inv-point-card">
                <div class="inv-point-ico"><svg viewBox="0 0 24 24"><path d="M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1Z"/></svg></div>
                <div class="inv-point-txt"><b>Scattered Paper Bills</b><span>Supplier receipts buried in folders &amp; drawers</span></div>
              </div>
              <div class="inv-point-card">
                <div class="inv-point-ico"><svg viewBox="0 0 24 24"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg></div>
                <div class="inv-point-txt"><b>Zero Peak Visibility</b><span>No clarity on live ingredient consumption</span></div>
              </div>
              <div class="inv-point-card">
                <div class="inv-point-ico"><svg viewBox="0 0 24 24"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"/><path d="M12 9v4"/><path d="M12 17h.01"/></svg></div>
                <div class="inv-point-txt"><b>Unexpected Shortages</b><span>Running out of key dishes mid-dinner rush</span></div>
              </div>
              <div class="inv-point-card">
                <div class="inv-point-ico"><svg viewBox="0 0 24 24"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg></div>
                <div class="inv-point-txt"><b>Higher Spoilage Waste</b><span>Untracked expiry &amp; over-ordering hurts margins</span></div>
              </div>
            </div>
          </div>
        </div>

        <!-- Right: Geni Menu Inventory -->
        <div class="inv-cmp-card inv-cmp-digital">
          <div class="inv-cmp-header">
            <div class="inv-badge-icon inv-badge-brown">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="20 6 9 17 4 12"></polyline>
              </svg>
            </div>
            <div>
              <h3 class="inv-cmp-title text-brown">Geni Menu Inventory</h3>
              <p class="inv-cmp-subtitle">Central stock tracking, recipe sync &amp; smart alerts</p>
            </div>
          </div>

          <div class="inv-split-body">
            <div class="inv-wf-steps">
              <div class="inv-wf-card">
                <div class="inv-wf-ico"><svg viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><polyline points="3.27 6.96 12 12.01 20.73 6.96"/><line x1="12" x2="12" y1="22.08" y2="12"/></svg></div>
                <div class="inv-wf-txt"><b>Central Stock &amp; Units</b><span>All ingredients tracked in kg, L &amp; packs</span></div>
              </div>
              <div class="inv-wf-arrow">&darr;</div>
              <div class="inv-wf-card">
                <div class="inv-wf-ico"><svg viewBox="0 0 24 24"><path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"/><path d="M21 3v5h-5"/><path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"/><path d="M8 16H3v5"/></svg></div>
                <div class="inv-wf-txt"><b>Connected Kitchen Sync</b><span>Purchases, receipts &amp; dish usage linked</span></div>
              </div>
              <div class="inv-wf-arrow">&darr;</div>
              <div class="inv-wf-card">
                <div class="inv-wf-ico"><svg viewBox="0 0 24 24"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/></svg></div>
                <div class="inv-wf-txt"><b>Smart Low-Stock Alerts</b><span>Reorder warnings before shortages happen</span></div>
              </div>
            </div>

            <div class="inv-phone-visual">
              <div class="inv-phone-mockup">
                <div class="inv-phone-screen">
                  <div class="inv-phone-island"></div>
                  <div class="inv-phone-header">
                    <div class="inv-phone-title">Stock Monitor</div>
                    <div class="inv-phone-sub">Real-time kitchen inventory</div>
                  </div>
                  <div class="inv-phone-tabs">
                    <span class="inv-tab-pill inv-tab-active">All</span>
                    <span class="inv-tab-pill">Low</span>
                    <span class="inv-tab-pill">In Stock</span>
                  </div>
                  <div class="inv-live-list">
                    <div class="inv-live-row">
                      <div class="inv-lv-top"><span class="inv-lv-name">Fresh Paneer</span><span class="inv-lv-badge low">Low Stock</span></div>
                      <div class="inv-lv-meta"><span>Min: 5.0 kg</span><span class="inv-lv-qty">3.5 kg left</span></div>
                    </div>
                    <div class="inv-live-row">
                      <div class="inv-lv-top"><span class="inv-lv-name">Basmati Rice</span><span class="inv-lv-badge ok">In Stock</span></div>
                      <div class="inv-lv-meta"><span>Min: 15 kg</span><span class="inv-lv-qty">48 kg left</span></div>
                    </div>
                    <div class="inv-live-row">
                      <div class="inv-lv-top"><span class="inv-lv-name">Cooking Oil</span><span class="inv-lv-badge crit">Reorder</span></div>
                      <div class="inv-lv-meta"><span>Min: 10 L</span><span class="inv-lv-qty">4.0 L left</span></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="inv-bottom-cta">
            <div class="inv-bottom-cta-badge">
              <svg viewBox="0 0 24 24"><path d="m12 3-1.9 5.8a2 2 0 0 1-1.3 1.3L3 12l5.8 1.9a2 2 0 0 1 1.3 1.3L12 21l1.9-5.8a2 2 0 0 1 1.3-1.3L21 12l-5.8-1.9a2 2 0 0 1-1.3-1.3L12 3Z"/></svg>
              <span>Know Your Stock Before You Need It!</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= 5. INTERACTIVE INVENTORY CONSOLE ================= -->
  <section class="inv-sec alt">
    <div class="w">
      <div class="hd r">
        <div class="eb">CENTRALIZED CONTROL</div>
        <h2>See Your Restaurant Stock <span class="sf">at a Glance.</span></h2>
        <p>Bring ingredients, stock levels and inventory activity into one clear workspace.</p>
      </div>

      <div class="rm-win r" style="max-width: 1100px; margin: 0 auto;">
        <div class="rm-win-bar">
          <div class="rm-win-dots"><i></i><i></i><i></i></div>
          <div class="rm-win-ttl">GENI MENU INVENTORY DASHBOARD &bull; MAIN KITCHEN</div>
          <input type="text" id="invSearchInput" class="rm-search-input" placeholder="Search ingredient..." oninput="filterInvSearch()">
        </div>

        <div class="rm-win-body">
          <!-- KPI Summary Chips -->
          <div class="rm-prog-grid-4" style="margin-bottom: 20px;">
            <div style="background: var(--bg2); border: 1px solid var(--line); border-radius: 14px; padding: 14px 16px;">
              <div style="font-size: 11px; font-weight: 700; color: var(--mute); text-transform: uppercase;">Total Items</div>
              <div style="font-size: 26px; font-weight: 600; font-family: 'Outfit', sans-serif; color: var(--ink);">186</div>
            </div>
            <div style="background: var(--green-bg); border: 1px solid rgba(21,128,61,0.18); border-radius: 14px; padding: 14px 16px;">
              <div style="font-size: 11px; font-weight: 700; color: var(--green); text-transform: uppercase;">In Stock</div>
              <div style="font-size: 26px; font-weight: 600; font-family: 'Outfit', sans-serif; color: var(--green);">142</div>
            </div>
            <div style="background: var(--amber-bg); border: 1px solid rgba(180,83,9,0.2); border-radius: 14px; padding: 14px 16px;">
              <div style="font-size: 11px; font-weight: 700; color: var(--amber); text-transform: uppercase;">Low Stock</div>
              <div style="font-size: 26px; font-weight: 600; font-family: 'Outfit', sans-serif; color: var(--amber);">28</div>
            </div>
            <div style="background: var(--red-bg); border: 1px solid rgba(185,28,28,0.2); border-radius: 14px; padding: 14px 16px;">
              <div style="font-size: 11px; font-weight: 700; color: var(--red); text-transform: uppercase;">Critical</div>
              <div style="font-size: 26px; font-weight: 600; font-family: 'Outfit', sans-serif; color: var(--red);">16</div>
            </div>
          </div>

          <!-- Filter Tabs & Category Pills -->
          <div class="rm-filter-bar">
            <div class="rm-filter-group">
              <button type="button" class="rm-filter-btn active" onclick="filterInvTable('all', this)">All Items (186)</button>
              <button type="button" class="rm-filter-btn" onclick="filterInvTable('instock', this)">In Stock (142)</button>
              <button type="button" class="rm-filter-btn" onclick="filterInvTable('lowstock', this)">Low Stock (28)</button>
              <button type="button" class="rm-filter-btn" onclick="filterInvTable('critical', this)">Critical (16)</button>
            </div>
            <div style="display: flex; gap: 6px; flex-wrap: wrap;">
              <span style="padding: 5px 11px; border-radius: 99px; background: var(--br-light); color: var(--br); font-size: 11.5px; font-weight: 700;">Raw Materials</span>
              <span style="padding: 5px 11px; border-radius: 99px; background: var(--bg2); color: var(--mute); font-size: 11.5px; font-weight: 600;">Vegetables</span>
              <span style="padding: 5px 11px; border-radius: 99px; background: var(--bg2); color: var(--mute); font-size: 11.5px; font-weight: 600;">Meat</span>
              <span style="padding: 5px 11px; border-radius: 99px; background: var(--bg2); color: var(--mute); font-size: 11.5px; font-weight: 600;">Dairy</span>
              <span style="padding: 5px 11px; border-radius: 99px; background: var(--bg2); color: var(--mute); font-size: 11.5px; font-weight: 600;">Packaging</span>
            </div>
          </div>

          <!-- Table -->
          <div class="rm-table-wrap">
            <table class="rm-table" id="mainInvTable">
              <thead>
                <tr>
                  <th>Ingredient</th>
                  <th>Category</th>
                  <th>Current Stock</th>
                  <th>Unit</th>
                  <th>Status</th>
                  <th style="text-align: right;">Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr data-status="instock">
                  <td><strong>Basmati Rice</strong></td>
                  <td style="color: var(--mute);">Grains &amp; Raw</td>
                  <td><strong>42</strong></td>
                  <td>kg</td>
                  <td><span class="st-badge instock"><i class="st-dot"></i> In Stock</span></td>
                  <td style="text-align: right;"><button type="button" class="rm-act-btn">View</button> <button type="button" class="rm-act-btn primary">Adjust</button></td>
                </tr>
                <tr data-status="lowstock">
                  <td><strong>Chicken</strong></td>
                  <td style="color: var(--mute);">Meat &amp; Poultry</td>
                  <td style="color: var(--amber); font-weight: 700;">12</td>
                  <td>kg</td>
                  <td><span class="st-badge lowstock"><i class="st-dot"></i> Low Stock</span></td>
                  <td style="text-align: right;"><button type="button" class="rm-act-btn">View</button> <button type="button" class="rm-act-btn primary">Adjust</button></td>
                </tr>
                <tr data-status="lowstock">
                  <td><strong>Paneer</strong></td>
                  <td style="color: var(--mute);">Dairy</td>
                  <td style="color: var(--amber); font-weight: 700;">5</td>
                  <td>kg</td>
                  <td><span class="st-badge lowstock"><i class="st-dot"></i> Low Stock</span></td>
                  <td style="text-align: right;"><button type="button" class="rm-act-btn">View</button> <button type="button" class="rm-act-btn primary">Adjust</button></td>
                </tr>
                <tr data-status="critical">
                  <td><strong>Tomato</strong></td>
                  <td style="color: var(--mute);">Vegetables</td>
                  <td style="color: var(--red); font-weight: 700;">3</td>
                  <td>kg</td>
                  <td><span class="st-badge critical"><i class="st-dot"></i> Critical</span></td>
                  <td style="text-align: right;"><button type="button" class="rm-act-btn">View</button> <button type="button" class="rm-act-btn primary">Adjust</button></td>
                </tr>
                <tr data-status="instock">
                  <td><strong>Cooking Oil</strong></td>
                  <td style="color: var(--mute);">Raw Materials</td>
                  <td><strong>18</strong></td>
                  <td>L</td>
                  <td><span class="st-badge instock"><i class="st-dot"></i> In Stock</span></td>
                  <td style="text-align: right;"><button type="button" class="rm-act-btn">View</button> <button type="button" class="rm-act-btn primary">Adjust</button></td>
                </tr>
                <tr data-status="instock">
                  <td><strong>Onion</strong></td>
                  <td style="color: var(--mute);">Vegetables</td>
                  <td><strong>28</strong></td>
                  <td>kg</td>
                  <td><span class="st-badge instock"><i class="st-dot"></i> In Stock</span></td>
                  <td style="text-align: right;"><button type="button" class="rm-act-btn">View</button> <button type="button" class="rm-act-btn primary">Adjust</button></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= 6. STATUS INDICATORS & RAW INGREDIENTS (WITH PHOTOS) ================= -->
  <section class="inv-sec">
    <div class="w">
      <div class="hd r">
        <div class="eb">STATUS INDICATORS &amp; RAW MATERIALS</div>
        <h2>Manage the Ingredients <span class="sf">Behind Every Dish.</span></h2>
        <p>Clear status indicators and unit-based tracking help kitchen managers prioritize restocking across grains, meats, dairy, and produce.</p>
      </div>

      <!-- 4 Status Cards -->
      <div class="rm-prog-grid-4 r" style="margin-bottom: 36px;">
        <div style="background: #fff; padding: 22px; border-radius: 16px; border: 1px solid var(--line); border-top: 4px solid var(--green);">
          <span class="st-badge instock" style="margin-bottom: 10px;"><i class="st-dot"></i> IN STOCK</span>
          <p style="font-size: 14px; color: var(--ink); font-weight: 600;">Enough stock currently available for operational needs.</p>
        </div>
        <div style="background: #fff; padding: 22px; border-radius: 16px; border: 1px solid var(--line); border-top: 4px solid var(--amber);">
          <span class="st-badge lowstock" style="margin-bottom: 10px;"><i class="st-dot"></i> LOW STOCK</span>
          <p style="font-size: 14px; color: var(--ink); font-weight: 600;">Stock is approaching the defined attention threshold.</p>
        </div>
        <div style="background: #fff; padding: 22px; border-radius: 16px; border: 1px solid var(--line); border-top: 4px solid var(--red);">
          <span class="st-badge critical" style="margin-bottom: 10px;"><i class="st-dot"></i> CRITICAL</span>
          <p style="font-size: 14px; color: var(--ink); font-weight: 600;">Stock requires immediate attention before next service.</p>
        </div>
        <div style="background: #fff; padding: 22px; border-radius: 16px; border: 1px solid var(--line); border-top: 4px solid var(--gray-text);">
          <span class="st-badge outofstock" style="margin-bottom: 10px;"><i class="st-dot"></i> OUT OF STOCK</span>
          <p style="font-size: 14px; color: var(--ink); font-weight: 600;">No available stock remaining in the inventory register.</p>
        </div>
      </div>

      <!-- 3 Photo Ingredient Cards -->
      <div class="inv-photo-grid-3 r" style="margin-bottom: 36px;">
        <div class="inv-photo-card">
          <div class="inv-photo-head">
            <img src="https://images.unsplash.com/photo-1586201375761-83865001e31c?auto=format&fit=crop&w=700&q=80" alt="Basmati Rice Grains">
            <span class="st-badge instock inv-photo-badge"><i class="st-dot"></i> In Stock</span>
          </div>
          <div class="inv-photo-body">
            <h4 style="font-size: 19px; margin-bottom: 4px;">Basmati Rice</h4>
            <div style="font-size: 13px; color: var(--mute); margin-bottom: 14px;">Category: Grains &bull; Last updated 09:12 AM</div>
            <div style="display: flex; justify-content: space-between; padding: 11px 14px; background: var(--bg2); border-radius: 10px; font-size: 13px;">
              <span>Current Stock: <strong>42 kg</strong></span>
              <span>Unit: <strong>kg</strong></span>
            </div>
          </div>
        </div>

        <div class="inv-photo-card">
          <div class="inv-photo-head">
            <img src="https://images.unsplash.com/photo-1604503468506-a8da13d82791?auto=format&fit=crop&w=700&q=80" alt="Fresh Chicken Poultry">
            <span class="st-badge lowstock inv-photo-badge"><i class="st-dot"></i> Low Stock</span>
          </div>
          <div class="inv-photo-body">
            <h4 style="font-size: 19px; margin-bottom: 4px;">Chicken</h4>
            <div style="font-size: 13px; color: var(--mute); margin-bottom: 14px;">Category: Meat &bull; Reorder threshold: 15 kg</div>
            <div style="display: flex; justify-content: space-between; padding: 11px 14px; background: var(--amber-bg); border-radius: 10px; font-size: 13px; color: var(--amber);">
              <span>Current Stock: <strong>12 kg</strong></span>
              <span>Action: <strong>Review &amp; Order</strong></span>
            </div>
          </div>
        </div>

        <div class="inv-photo-card">
          <div class="inv-photo-head">
            <img src="https://images.unsplash.com/photo-1592924357228-91a4daadcfea?auto=format&fit=crop&w=700&q=80" alt="Fresh Tomatoes and Dairy Prep">
            <span class="st-badge critical inv-photo-badge"><i class="st-dot"></i> Critical</span>
          </div>
          <div class="inv-photo-body">
            <h4 style="font-size: 19px; margin-bottom: 4px;">Tomato &amp; Paneer</h4>
            <div style="font-size: 13px; color: var(--mute); margin-bottom: 14px;">Vegetables &amp; Dairy &bull; Urgent Pre-Service Check</div>
            <div style="display: flex; justify-content: space-between; padding: 11px 14px; background: var(--red-bg); border-radius: 10px; font-size: 13px; color: var(--red);">
              <span>Tomato: <strong>3 kg</strong></span>
              <span>Paneer: <strong>5 kg</strong></span>
            </div>
          </div>
        </div>
      </div>

      <!-- Menu -> Ingredient Connection Banner -->
      <div class="rm-win r" style="max-width: 1020px; margin: 0 auto;">
        <div class="rm-win-bar">
          <div class="rm-win-dots"><i></i><i></i><i></i></div>
          <div class="rm-win-ttl">MENU &rarr; INGREDIENT &rarr; KITCHEN SYNC</div>
          <span class="st-badge lowstock"><i class="st-dot"></i> Check Stock Before Service</span>
        </div>
        <div class="rm-win-body">
          <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 18px;">
            <div style="flex: 1; min-width: 210px; background: var(--bg2); border: 1px solid var(--line); padding: 18px; border-radius: 14px; text-align: center;">
              <div style="font-size: 11px; font-weight: 700; color: var(--br); text-transform: uppercase;">Menu Item</div>
              <div style="font-size: 20px; font-weight: 600; font-family: 'Outfit', sans-serif; margin-top: 4px;">Chicken Biryani</div>
              <div style="font-size: 15px; font-weight: 700; color: var(--br); margin-top: 2px;">&#8377;280 &bull; Order &times; 5</div>
            </div>
            <div style="font-size: 22px; color: var(--br); font-weight: 700;">&rarr;</div>
            <div style="flex: 1.5; min-width: 250px; background: var(--bg2); border: 1px solid var(--line); padding: 18px; border-radius: 14px; text-align: center;">
              <div style="font-size: 11px; font-weight: 700; color: var(--br); text-transform: uppercase; margin-bottom: 10px;">Ingredients Required</div>
              <div style="display: flex; flex-wrap: wrap; gap: 8px; justify-content: center;">
                <span style="padding: 5px 11px; background: var(--green-bg); color: var(--green); border-radius: 8px; font-size: 12px; font-weight: 700;">Basmati Rice &check;</span>
                <span style="padding: 5px 11px; background: var(--green-bg); color: var(--green); border-radius: 8px; font-size: 12px; font-weight: 700;">Chicken &check;</span>
                <span style="padding: 5px 11px; background: var(--green-bg); color: var(--green); border-radius: 8px; font-size: 12px; font-weight: 700;">Onion &check;</span>
                <span style="padding: 5px 11px; background: var(--red-bg); color: var(--red); border-radius: 8px; font-size: 12px; font-weight: 700;">Tomato (3 kg) !</span>
                <span style="padding: 5px 11px; background: #fff; border: 1px solid var(--line); border-radius: 8px; font-size: 12px; font-weight: 700;">Spices &amp; Oil</span>
              </div>
            </div>
            <div style="font-size: 22px; color: var(--br); font-weight: 700;">&rarr;</div>
            <div style="flex: 1; min-width: 210px; background: var(--br-light); border: 1px solid rgba(135,96,57,0.28); padding: 18px; border-radius: 14px; text-align: center;">
              <div style="font-size: 11px; font-weight: 700; color: var(--br); text-transform: uppercase;">Pre-Service Audit</div>
              <div style="font-size: 14px; font-weight: 700; color: var(--ink); margin-top: 6px;">Review ingredient availability before service.</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= 7. STOCK MOVEMENT, PURCHASES & RECEIVING ================= -->
  <section class="inv-sec alt">
    <div class="w">
      <div class="hd r">
        <div class="eb">PURCHASES &amp; STOCK MOVEMENT</div>
        <h2>Track What Comes In &amp; <span class="sf">Where Your Stock Goes.</span></h2>
        <p>Reconcile opening stock, supplier purchase orders, partial dock deliveries, kitchen consumption, and adjustments in one place.</p>
      </div>

      <!-- Interactive Stock Movement Card -->
      <div class="rm-win r" style="max-width: 980px; margin: 0 auto 36px;">
        <div class="rm-win-bar">
          <div class="rm-win-dots"><i></i><i></i><i></i></div>
          <div class="rm-win-ttl">STOCK RECONCILIATION &bull; BASMATI RICE</div>
          <div class="rm-filter-group">
            <button type="button" class="rm-filter-btn active" onclick="switchMovement('today', this)">Today</button>
            <button type="button" class="rm-filter-btn" onclick="switchMovement('week', this)">This Week</button>
            <button type="button" class="rm-filter-btn" onclick="switchMovement('month', this)">This Month</button>
          </div>
        </div>
        <div class="rm-win-body">
          <div style="display: grid; grid-template-columns: repeat(5, 1fr); gap: 12px; text-align: center; margin-bottom: 18px;">
            <div style="background: var(--bg2); padding: 14px; border-radius: 12px; border: 1px solid var(--line);">
              <div style="font-size: 11px; font-weight: 700; color: var(--mute);">OPENING STOCK</div>
              <div id="mvOpen" style="font-size: 22px; font-weight: 600; font-family: 'Outfit', sans-serif; margin-top: 4px;">50 kg</div>
            </div>
            <div style="background: var(--green-bg); padding: 14px; border-radius: 12px; border: 1px solid rgba(21,128,61,0.18);">
              <div style="font-size: 11px; font-weight: 700; color: var(--green);">PURCHASE</div>
              <div id="mvPurch" style="font-size: 22px; font-weight: 600; font-family: 'Outfit', sans-serif; color: var(--green); margin-top: 4px;">+20 kg</div>
            </div>
            <div style="background: #FFF7ED; padding: 14px; border-radius: 12px; border: 1px solid rgba(194,65,12,0.2);">
              <div style="font-size: 11px; font-weight: 700; color: #C2410C;">CONSUMPTION</div>
              <div id="mvCons" style="font-size: 22px; font-weight: 600; font-family: 'Outfit', sans-serif; color: #C2410C; margin-top: 4px;">-18 kg</div>
            </div>
            <div style="background: var(--red-bg); padding: 14px; border-radius: 12px; border: 1px solid rgba(185,28,28,0.18);">
              <div style="font-size: 11px; font-weight: 700; color: var(--red);">ADJUSTMENT</div>
              <div id="mvAdj" style="font-size: 22px; font-weight: 600; font-family: 'Outfit', sans-serif; color: var(--red); margin-top: 4px;">-2 kg</div>
            </div>
            <div style="background: var(--br-light); padding: 14px; border-radius: 12px; border: 1.5px solid var(--br);">
              <div style="font-size: 11px; font-weight: 700; color: var(--br);">CURRENT STOCK</div>
              <div id="mvCurr" style="font-size: 22px; font-weight: 600; font-family: 'Outfit', sans-serif; color: var(--br); margin-top: 4px;">50 kg</div>
            </div>
          </div>
          <div style="background: var(--bg2); padding: 12px 18px; border-radius: 10px; text-align: center; font-size: 13px; font-weight: 700;">
            OPENING + PURCHASE <span style="color: var(--green);">(+)</span> &minus; CONSUMPTION <span style="color: #C2410C;">(-)</span> &minus; ADJUSTMENT <span style="color: var(--red);">(-)</span> = CURRENT STOCK
          </div>
        </div>
      </div>

      <!-- Purchase Order + Receiving Dock Split -->
      <div class="rm-split r">
        <!-- Left: PO-2048 Receipt Verification -->
        <div class="rm-win">
          <div class="rm-win-bar">
            <div class="rm-win-dots"><i></i><i></i><i></i></div>
            <div class="rm-win-ttl">RECEIVING DOCK &bull; PO-2048</div>
            <span class="st-badge lowstock"><i class="st-dot"></i> Partially Received</span>
          </div>
          <div class="rm-win-body">
            <div style="display: flex; justify-content: space-between; font-size: 13.5px; margin-bottom: 14px; flex-wrap: wrap; gap: 8px;">
              <span>Supplier: <strong>ABC Foods</strong></span>
              <span>Date: <strong>29 Sep 2026</strong></span>
              <span>Total: <strong style="color: var(--br);">&#8377;18,500</strong></span>
            </div>
            <div class="rm-table-wrap" style="margin-bottom: 16px;">
              <table class="rm-table">
                <thead>
                  <tr><th>Expected Item</th><th>Expected</th><th>Received</th><th>Status</th></tr>
                </thead>
                <tbody>
                  <tr><td><strong>Basmati Rice</strong></td><td>50 kg</td><td style="color: var(--green); font-weight: 700;">50 kg</td><td style="color: var(--green); font-weight: 700;">&check; Verified</td></tr>
                  <tr><td><strong>Cooking Oil</strong></td><td>20 L</td><td style="color: var(--green); font-weight: 700;">20 L</td><td style="color: var(--green); font-weight: 700;">&check; Verified</td></tr>
                  <tr><td><strong>Onion</strong></td><td>30 kg</td><td style="color: var(--amber); font-weight: 700;">28 kg</td><td style="color: var(--amber); font-weight: 700;">Short 2 kg</td></tr>
                </tbody>
              </table>
            </div>
            <div style="background: var(--bg2); padding: 12px 16px; border-radius: 10px; font-size: 12.5px; color: var(--mute);">
              Status updated by Kitchen Store Manager: <strong style="color: var(--ink);">Partial delivery logged for PO-2048</strong>
            </div>
          </div>
        </div>

        <!-- Right: Recent Purchase Orders + Editorial Photo -->
        <div>
          <h3 style="margin-bottom: 14px;">Recent Purchase Orders</h3>
          <div style="display: flex; flex-direction: column; gap: 12px;">
            <div style="background: #fff; padding: 16px 18px; border-radius: 14px; border: 1px solid var(--line); display: flex; justify-content: space-between; align-items: center;">
              <div><strong style="font-size: 15px;">PO-2048</strong><div style="font-size: 12.5px; color: var(--mute);">ABC Foods &bull; 29 Sep 2026</div></div>
              <div style="text-align: right;"><strong>&#8377;18,500</strong><div><span class="st-badge instock" style="margin-top: 4px;"><i class="st-dot"></i> Received</span></div></div>
            </div>
            <div style="background: #fff; padding: 16px 18px; border-radius: 14px; border: 1px solid var(--line); display: flex; justify-content: space-between; align-items: center;">
              <div><strong style="font-size: 15px;">PO-2047</strong><div style="font-size: 12.5px; color: var(--mute);">Fresh Farms &bull; 27 Sep 2026</div></div>
              <div style="text-align: right;"><strong>&#8377;12,800</strong><div><span class="st-badge instock" style="margin-top: 4px;"><i class="st-dot"></i> Received</span></div></div>
            </div>
            <div style="background: #fff; padding: 16px 18px; border-radius: 14px; border: 1px solid var(--line); display: flex; justify-content: space-between; align-items: center;">
              <div><strong style="font-size: 15px;">PO-2046</strong><div style="font-size: 12.5px; color: var(--mute);">Dairy Fresh Co. &bull; 25 Sep 2026</div></div>
              <div style="text-align: right;"><strong>&#8377;8,400</strong><div><span class="st-badge instock" style="margin-top: 4px;"><i class="st-dot"></i> Received</span></div></div>
            </div>
          </div>

          <div class="inv-editorial-frame">
            <img src="https://images.unsplash.com/photo-1542838132-92c53300491e?auto=format&fit=crop&w=900&q=80" alt="Fresh restaurant produce and kitchen supply receiving">
            <div class="inv-editorial-caption">
              <strong>Verified Supplier Deliveries</strong>
              <span>Every crate, weight, and invoice logged directly into your central pantry register.</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= 8. ADJUSTMENTS, SPOILAGE & UNITS ================= -->
  <section class="inv-sec">
    <div class="w">
      <div class="hd r">
        <div class="eb">LOSS VISIBILITY &amp; STOCK CORRECTIONS</div>
        <h2>Keep Stock Records Accurate &amp; <span class="sf">Understand Losses.</span></h2>
        <p>Log spoilage, damage, manual corrections, and track ingredients in kg, liters, pieces, or custom packs.</p>
      </div>

      <div class="rm-split r" style="margin-bottom: 42px;">
        <!-- Adjustment Form Mockup -->
        <div class="rm-win">
          <div class="rm-win-bar">
            <div class="rm-win-dots"><i></i><i></i><i></i></div>
            <div class="rm-win-ttl">ADJUST INGREDIENT STOCK &bull; #ADJ-104</div>
          </div>
          <div class="rm-win-body" style="display: flex; flex-direction: column; gap: 14px;">
            <div style="display: flex; justify-content: space-between; padding: 12px 14px; background: var(--bg2); border-radius: 10px; font-size: 14px;">
              <span>ITEM: <strong>Tomato</strong></span>
              <span>Current Stock: <strong>10 kg</strong></span>
            </div>
            <div>
              <label style="display: block; font-weight: 700; font-size: 12.5px; margin-bottom: 6px;">Stock Adjustment Quantity</label>
              <input type="text" value="-2 kg" readonly style="width: 100%; padding: 10px 14px; border-radius: 10px; border: 1px solid var(--line); font-weight: 700; color: var(--red); background: #fff;">
            </div>
            <div>
              <label style="display: block; font-weight: 700; font-size: 12.5px; margin-bottom: 6px;">Reason for Adjustment</label>
              <select style="width: 100%; padding: 10px 14px; border-radius: 10px; border: 1px solid var(--line); font-weight: 600; background: #fff;">
                <option selected>Spoilage</option>
                <option>Damage</option>
                <option>Manual Correction</option>
                <option>Opening Stock</option>
              </select>
            </div>
            <div style="display: flex; justify-content: space-between; padding: 12px 14px; background: var(--br-light); border-radius: 10px; font-weight: 700;">
              <span>Updated Stock Level</span>
              <span style="color: var(--br);">8 kg</span>
            </div>
          </div>
        </div>

        <!-- Loss Breakdown + Audit Trail -->
        <div class="rm-win">
          <div class="rm-win-bar">
            <div class="rm-win-dots"><i></i><i></i><i></i></div>
            <div class="rm-win-ttl">TOMATO LOSS LOG &amp; AUDIT TRAIL</div>
            <span style="font-size: 11.5px; font-weight: 700; color: var(--mute);">Batch #TM-89</span>
          </div>
          <div class="rm-win-body">
            <div style="display: grid; grid-template-columns: repeat(5, 1fr); gap: 8px; text-align: center; margin-bottom: 18px;">
              <div style="background: var(--bg2); padding: 10px 6px; border-radius: 10px;"><div style="font-size: 10px; font-weight: 700; color: var(--mute);">PURCHASED</div><strong style="font-size: 16px;">30 kg</strong></div>
              <div style="background: var(--green-bg); padding: 10px 6px; border-radius: 10px;"><div style="font-size: 10px; font-weight: 700; color: var(--green);">CONSUMED</div><strong style="font-size: 16px; color: var(--green);">24 kg</strong></div>
              <div style="background: var(--red-bg); padding: 10px 6px; border-radius: 10px;"><div style="font-size: 10px; font-weight: 700; color: var(--red);">SPOILED</div><strong style="font-size: 16px; color: var(--red);">2 kg</strong></div>
              <div style="background: var(--bg2); padding: 10px 6px; border-radius: 10px;"><div style="font-size: 10px; font-weight: 700; color: var(--mute);">ADJUSTED</div><strong style="font-size: 16px;">1 kg</strong></div>
              <div style="background: var(--br-light); padding: 10px 6px; border-radius: 10px;"><div style="font-size: 10px; font-weight: 700; color: var(--br);">REMAINING</div><strong style="font-size: 16px; color: var(--br);">3 kg</strong></div>
            </div>

            <div style="display: flex; flex-direction: column; gap: 10px;">
              <div style="display: flex; justify-content: space-between; align-items: center; padding: 10px 12px; background: var(--bg2); border-radius: 10px; font-size: 13px;">
                <span><strong style="color: var(--br);">09:12 AM</strong> &bull; Basmati Rice (PO-2048)</span>
                <strong style="color: var(--green);">+50 kg</strong>
              </div>
              <div style="display: flex; justify-content: space-between; align-items: center; padding: 10px 12px; background: var(--bg2); border-radius: 10px; font-size: 13px;">
                <span><strong style="color: var(--br);">10:25 AM</strong> &bull; Chicken (Prep Room)</span>
                <strong style="color: var(--red);">-5 kg</strong>
              </div>
              <div style="display: flex; justify-content: space-between; align-items: center; padding: 10px 12px; background: var(--bg2); border-radius: 10px; font-size: 13px;">
                <span><strong style="color: var(--br);">11:40 AM</strong> &bull; Tomato (Lunch Batch)</span>
                <strong style="color: var(--amber);">-3 kg</strong>
              </div>
              <div style="display: flex; justify-content: space-between; align-items: center; padding: 10px 12px; background: var(--bg2); border-radius: 10px; font-size: 13px;">
                <span><strong style="color: var(--br);">12:15 PM</strong> &bull; Paneer (Spoilage Logged)</span>
                <strong style="color: var(--red);">-2 kg</strong>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Units of Measurement (3-col) -->
      <div class="rm-ben-grid r">
        <div class="rm-ben-card" style="text-align: center;">
          <div style="font-family: 'Outfit', sans-serif; font-size: 34px; font-weight: 600; color: var(--br); margin-bottom: 6px;">kg</div>
          <h4>Kilograms</h4>
          <p>Basmati Rice, Vegetables, Poultry, Flour</p>
        </div>
        <div class="rm-ben-card" style="text-align: center;">
          <div style="font-family: 'Outfit', sans-serif; font-size: 34px; font-weight: 600; color: var(--br); margin-bottom: 6px;">L</div>
          <h4>Liters</h4>
          <p>Cooking Oil, Milk, Syrups, Juices</p>
        </div>
        <div class="rm-ben-card" style="text-align: center;">
          <div style="font-family: 'Outfit', sans-serif; font-size: 34px; font-weight: 600; color: var(--br); margin-bottom: 6px;">pcs</div>
          <h4>Pieces &amp; Packs</h4>
          <p>Eggs, Burger Buns, Takeaway Boxes, Cans</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= 9. PEAK SERVICE BANNER & MULTI-BRANCH ================= -->
  <section class="inv-sec alt">
    <div class="w">
      <!-- Dark Editorial Peak Banner -->
      <div class="inv-peak-banner r" style="margin-bottom: 48px;">
        <img class="inv-peak-bg" src="https://images.unsplash.com/photo-1556910103-1c02745aae4d?auto=format&fit=crop&w=1400&q=80" alt="Busy restaurant kitchen during dinner service">
        <div class="inv-peak-scrim"></div>
        <div class="inv-peak-inner">
          <div style="text-align: center; max-width: 680px; margin: 0 auto;">
            <div class="eb" style="background: rgba(255,255,255,0.14); border-color: rgba(255,255,255,0.28); color: #fff;">PEAK HOUR VISIBILITY</div>
            <h2 style="color: #fff;">Stay Aware When the <span style="font-family: 'Playfair Display', serif; font-style: italic; color: #F2D3A8;">Kitchen Is Busy.</span></h2>
            <p style="color: rgba(255,255,255,0.85); margin-top: 10px;">Maintain continuous operational awareness over raw materials during peak dining rush across desktop, tablet, and mobile.</p>
          </div>

          <div class="inv-peak-grid">
            <div class="inv-peak-stat"><span>Active Orders</span><strong>18</strong></div>
            <div class="inv-peak-stat"><span>Ingredients Low</span><strong style="color: #FCD34D;">06</strong></div>
            <div class="inv-peak-stat"><span>Critical Items</span><strong style="color: #FCA5A5;">02</strong></div>
            <div class="inv-peak-stat"><span>Total Purchases</span><strong style="color: #86EFAC;">&#8377;48,620</strong></div>
          </div>

          <div style="display: flex; gap: 10px; justify-content: center; flex-wrap: wrap;">
            <span style="padding: 8px 16px; border-radius: 99px; background: rgba(255,255,255,0.14); font-size: 13px; font-weight: 700;">Chicken: 12 kg (Low)</span>
            <span style="padding: 8px 16px; border-radius: 99px; background: rgba(255,255,255,0.14); font-size: 13px; font-weight: 700;">Paneer: 5 kg (Low)</span>
            <span style="padding: 8px 16px; border-radius: 99px; background: rgba(239,68,68,0.32); font-size: 13px; font-weight: 700;">Tomato: 3 kg (Critical)</span>
            <span style="padding: 8px 16px; border-radius: 99px; background: rgba(16,185,129,0.28); font-size: 13px; font-weight: 700;">Basmati Rice: 42 kg (Healthy)</span>
          </div>
        </div>
      </div>

      <!-- Multi-Branch Interactive Comparison -->
      <div class="hd r">
        <div class="eb">MULTI-LOCATION CONTROLS</div>
        <h2>Keep Inventory Visible <span class="sf">Across Locations.</span></h2>
        <p>Compare stock availability and ingredient levels across branch kitchens from a single dashboard.</p>
      </div>

      <div class="rm-win r" style="max-width: 960px; margin: 0 auto;">
        <div class="rm-win-bar">
          <div class="rm-win-dots"><i></i><i></i><i></i></div>
          <div class="rm-win-ttl">MULTI-BRANCH STOCK COMPARISON</div>
          <div class="rm-filter-group">
            <button type="button" class="rm-filter-btn active" onclick="switchBranch('chennai', this)">Chennai</button>
            <button type="button" class="rm-filter-btn" onclick="switchBranch('coimbatore', this)">Coimbatore</button>
            <button type="button" class="rm-filter-btn" onclick="switchBranch('salem', this)">Salem</button>
            <button type="button" class="rm-filter-btn" onclick="switchBranch('tiruchengode', this)">Tiruchengode</button>
          </div>
        </div>
        <div class="rm-win-body">
          <div class="rm-split" style="gap: 20px;">
            <div style="background: var(--bg2); padding: 20px; border-radius: 14px; border: 1px solid var(--line);">
              <div id="branchTitle" style="font-size: 12px; font-weight: 700; color: var(--br); text-transform: uppercase; margin-bottom: 12px;">CHENNAI BRANCH STOCK</div>
              <div style="display: flex; flex-direction: column; gap: 10px; font-size: 14.5px;">
                <div style="display: flex; justify-content: space-between;"><span>Basmati Rice</span><strong id="brRice">120 kg</strong></div>
                <div style="display: flex; justify-content: space-between;"><span>Cooking Oil</span><strong id="brOil">48 L</strong></div>
                <div style="display: flex; justify-content: space-between;"><span>Chicken</span><strong id="brChicken">30 kg</strong></div>
              </div>
            </div>
            <div style="background: #fff; padding: 20px; border-radius: 14px; border: 1px solid var(--line);">
              <div style="font-size: 12px; font-weight: 700; color: var(--mute); text-transform: uppercase; margin-bottom: 12px;">MOBILE STORE ROOM ACCESS</div>
              <p style="font-size: 14px; margin-bottom: 12px;">Store managers can audit shelves, verify deliveries, and log stock adjustments directly from tablets or smartphones.</p>
              <span class="st-badge instock"><i class="st-dot"></i> Desktop, Tablet &amp; Mobile Synced</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= 10. BUSINESS BENEFITS (3x2 NUMBERED) ================= -->
  <section class="inv-sec">
    <div class="w">
      <div class="hd r">
        <div class="eb">OPERATIONAL ADVANTAGES</div>
        <h2>Built for Better <span class="sf">Restaurant Inventory Control.</span></h2>
        <p>Give your kitchen management team clear visibility to operate smoothly during every service.</p>
      </div>

      <div class="rm-ben-grid r">
        <div class="rm-ben-card">
          <div class="rm-ben-head"><div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg></div><span class="rm-num">01</span></div>
          <h4>Stock Visibility</h4>
          <p>Know what raw materials and cooking supplies are currently available.</p>
        </div>
        <div class="rm-ben-card">
          <div class="rm-ben-head"><div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/></svg></div><span class="rm-num">02</span></div>
          <h4>Low Stock Awareness</h4>
          <p>Identify key ingredients that need attention before service rushes.</p>
        </div>
        <div class="rm-ben-card">
          <div class="rm-ben-head"><div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/></svg></div><span class="rm-num">03</span></div>
          <h4>Purchase Visibility</h4>
          <p>Keep incoming stock purchase records and supplier receipts organized.</p>
        </div>
        <div class="rm-ben-card">
          <div class="rm-ben-head"><div class="rm-ic"><svg viewBox="0 0 24 24"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/></svg></div><span class="rm-num">04</span></div>
          <h4>Inventory Movement</h4>
          <p>Understand how ingredient quantities change across kitchen shifts.</p>
        </div>
        <div class="rm-ben-card">
          <div class="rm-ben-head"><div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9"/></svg></div><span class="rm-num">05</span></div>
          <h4>Kitchen Coordination</h4>
          <p>Connect ingredient availability directly with daily food preparation.</p>
        </div>
        <div class="rm-ben-card">
          <div class="rm-ben-head"><div class="rm-ic"><svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/></svg></div><span class="rm-num">06</span></div>
          <h4>Better Planning</h4>
          <p>Give your team clearer stock information for effective daily service.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= 11. INDUSTRIES (3-COL WITH IMAGE ZOOM) ================= -->
  <section class="inv-sec alt">
    <div class="w">
      <div class="hd r">
        <div class="eb">TAILORED FOR FOOD BUSINESSES</div>
        <h2>Inventory Management <span class="sf">for Food Businesses.</span></h2>
        <p>Designed for diverse restaurant concepts, from fine dining kitchens to high-volume bakeries.</p>
      </div>

      <div class="rm-ind-grid r">
        <div class="rm-ind-card">
          <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&w=700&q=80" alt="Fine Dining Restaurants">
          <div class="rm-ind-scrim"></div>
          <div class="rm-ind-body"><h4>Fine Dining Restaurants</h4><p>Track premium kitchen ingredients and daily perishable stock.</p></div>
        </div>
        <div class="rm-ind-card">
          <img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?auto=format&fit=crop&w=700&q=80" alt="Casual Dining">
          <div class="rm-ind-scrim"></div>
          <div class="rm-ind-body"><h4>Casual Dining</h4><p>Maintain steady ingredient visibility across busy menu items.</p></div>
        </div>
        <div class="rm-ind-card">
          <img src="https://images.unsplash.com/photo-1544025162-d76694265947?auto=format&fit=crop&w=700&q=80" alt="Family Restaurants">
          <div class="rm-ind-scrim"></div>
          <div class="rm-ind-body"><h4>Family Restaurants</h4><p>Manage bulk raw materials, vegetables, and cooking oils efficiently.</p></div>
        </div>
        <div class="rm-ind-card">
          <img src="https://images.unsplash.com/photo-1618160702438-9b02ab6515c9?auto=format&fit=crop&w=700&q=80" alt="Multi-Cuisine">
          <div class="rm-ind-scrim"></div>
          <div class="rm-ind-body"><h4>Multi-Cuisine</h4><p>Organize varied spices, specialty sauces, and diverse raw stock.</p></div>
        </div>
        <div class="rm-ind-card">
          <img src="https://images.unsplash.com/photo-1561758033-d89a9ad46330?auto=format&fit=crop&w=700&q=80" alt="QSR / Fast Food">
          <div class="rm-ind-scrim"></div>
          <div class="rm-ind-body"><h4>QSR / Fast Food</h4><p>Monitor high-velocity items, packaging boxes, and frozen stock.</p></div>
        </div>
        <div class="rm-ind-card">
          <img src="https://images.unsplash.com/photo-1501339847302-ac426a4a7cbb?auto=format&fit=crop&w=700&q=80" alt="Cafes">
          <div class="rm-ind-scrim"></div>
          <div class="rm-ind-body"><h4>Caf&eacute;s</h4><p>Keep coffee beans, dairy, beverages, and food supplies visible.</p></div>
        </div>
        <div class="rm-ind-card">
          <img src="https://images.unsplash.com/photo-1509440159596-0249088772ff?auto=format&fit=crop&w=700&q=80" alt="Bakeries">
          <div class="rm-ind-scrim"></div>
          <div class="rm-ind-body"><h4>Bakeries</h4><p>Manage flour, dairy, baking ingredients, and packaging materials.</p></div>
        </div>
        <div class="rm-ind-card">
          <img src="https://images.unsplash.com/photo-1513104890138-7c749659a591?auto=format&fit=crop&w=700&q=80" alt="Pizzerias">
          <div class="rm-ind-scrim"></div>
          <div class="rm-ind-body"><h4>Pizzerias</h4><p>Track cheese, pizza dough ingredients, toppings, and pizza boxes.</p></div>
        </div>
        <div class="rm-ind-card">
          <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=700&q=80" alt="Hotels & Resorts">
          <div class="rm-ind-scrim"></div>
          <div class="rm-ind-body"><h4>Hotels &amp; Resorts</h4><p>Manage restaurant inventory across multiple dining outlets.</p></div>
        </div>
        <div class="rm-ind-card">
          <img src="https://images.unsplash.com/photo-1552566626-52f8b828add9?auto=format&fit=crop&w=700&q=80" alt="Food Courts">
          <div class="rm-ind-scrim"></div>
          <div class="rm-ind-body"><h4>Food Courts</h4><p>Maintain separate store room registers for fast service kiosks.</p></div>
        </div>
        <div class="rm-ind-card">
          <img src="https://images.unsplash.com/photo-1556910103-1c02745aae4d?auto=format&fit=crop&w=700&q=80" alt="Cloud Kitchens">
          <div class="rm-ind-scrim"></div>
          <div class="rm-ind-body"><h4>Cloud Kitchens</h4><p>Organize ingredients across high-volume delivery preparation.</p></div>
        </div>
        <div class="rm-ind-card">
          <img src="https://images.unsplash.com/photo-1576867757603-05b134ebc379?auto=format&fit=crop&w=700&q=80" alt="Canteens">
          <div class="rm-ind-scrim"></div>
          <div class="rm-ind-body"><h4>Canteens</h4><p>Track large batch ingredients for institutional food service.</p></div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= 12. CONNECTED ECOSYSTEM (7-STEP) ================= -->
  <section class="inv-sec">
    <div class="w">
      <div class="hd r">
        <div class="eb">CONNECTED ECOSYSTEM</div>
        <h2>More Than <span class="sf">an Inventory List.</span></h2>
        <p>Geni Menu connects inventory with menus, orders, kitchens, POS and restaurant reporting — bringing stock visibility into the wider restaurant operation.</p>
      </div>

      <div class="rm-eco-grid r">
        <a href="{{ route('features.menu-management') }}" class="rm-eco-card">
          <span class="rm-eco-step">01</span>
          <img class="rm-eco-img" src="{{ asset('assets/images/workflow/step-1-menu.png') }}" alt="Digital Menu">
          <span class="rm-eco-lbl">Digital Menu</span>
        </a>
        <a href="{{ route('features.table-management') }}" class="rm-eco-card">
          <span class="rm-eco-step">02</span>
          <img class="rm-eco-img" src="{{ asset('assets/images/workflow/step-4-table.png') }}" alt="Tables">
          <span class="rm-eco-lbl">Table &amp; Floor</span>
        </a>
        <a href="{{ route('features.order-management') }}" class="rm-eco-card">
          <span class="rm-eco-step">03</span>
          <img class="rm-eco-img" src="{{ asset('assets/images/workflow/step-2-order.png') }}" alt="Orders">
          <span class="rm-eco-lbl">Order Flow</span>
        </a>
        <a href="{{ route('features.kot-management') }}" class="rm-eco-card">
          <span class="rm-eco-step">04</span>
          <img class="rm-eco-img" src="{{ asset('assets/images/workflow/step-3-kitchen.png') }}" alt="KOT">
          <span class="rm-eco-lbl">KOT &amp; Kitchen</span>
        </a>
        <a href="{{ route('features.pos-management') }}" class="rm-eco-card">
          <span class="rm-eco-step">05</span>
          <img class="rm-eco-img" src="{{ asset('assets/images/workflow/step-5-billing.png') }}" alt="POS">
          <span class="rm-eco-lbl">POS Billing</span>
        </a>
        <div class="rm-eco-card active">
          <span class="rm-eco-step">06</span>
          <img class="rm-eco-img" src="{{ asset('assets/images/workflow/step-6-payment.png') }}" alt="Inventory">
          <span class="rm-eco-lbl">Inventory</span>
        </div>
        <a href="{{ route('features.reports') }}" class="rm-eco-card">
          <span class="rm-eco-step">07</span>
          <img class="rm-eco-img" src="{{ asset('assets/images/workflow/step-7-reports.png') }}" alt="Reports">
          <span class="rm-eco-lbl">Reports</span>
        </a>
      </div>
    </div>
  </section>

  <!-- ================= 13. FAQ (ALL 14 PRESERVED) ================= -->
  <section class="inv-sec alt">
    <div class="w">
      <div class="hd r">
        <div class="eb">FREQUENTLY ASKED QUESTIONS</div>
        <h2>Inventory Management <span class="sf">FAQ.</span></h2>
        <p>Everything you need to know about tracking stock, purchases, and ingredients in Geni Menu.</p>
      </div>

      <div class="rm-faq-list r">
        <div class="rm-faq-item open">
          <div class="rm-faq-q" onclick="toggleFaq(this)">1. What is Inventory Management in Geni Menu?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div>
          <div class="rm-faq-a">Inventory Management in Geni Menu is a restaurant-focused workspace that helps food businesses track raw ingredients, monitor stock levels, log purchase receipts, and record inventory adjustments.</div>
        </div>
        <div class="rm-faq-item">
          <div class="rm-faq-q" onclick="toggleFaq(this)">2. Can I track restaurant ingredients?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div>
          <div class="rm-faq-a">Yes. You can catalog raw materials, vegetables, meat, dairy, beverages, and packaging supplies with assigned custom categories.</div>
        </div>
        <div class="rm-faq-item">
          <div class="rm-faq-q" onclick="toggleFaq(this)">3. Can I track stock quantities and units?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div>
          <div class="rm-faq-a">Yes. Stock levels can be defined and audited in standard units such as kilograms (kg), liters (L), pieces (pcs), or custom pack sizes.</div>
        </div>
        <div class="rm-faq-item">
          <div class="rm-faq-q" onclick="toggleFaq(this)">4. Can I see low-stock items?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div>
          <div class="rm-faq-a">Yes. Items reaching predefined thresholds are highlighted with Low Stock or Critical status badges and appear in alert panels for review.</div>
        </div>
        <div class="rm-faq-item">
          <div class="rm-faq-q" onclick="toggleFaq(this)">5. Can I record purchases?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div>
          <div class="rm-faq-a">Yes. Purchase orders and incoming stock receipts can be logged with supplier details, order dates, item quantities, and cost totals.</div>
        </div>
        <div class="rm-faq-item">
          <div class="rm-faq-q" onclick="toggleFaq(this)">6. Can I record stock adjustments?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div>
          <div class="rm-faq-a">Yes. Manual stock adjustments can be entered along with specific reason codes such as Spoilage, Damage, Opening Stock, or Manual Correction.</div>
        </div>
        <div class="rm-faq-item">
          <div class="rm-faq-q" onclick="toggleFaq(this)">7. Can I track inventory movement?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div>
          <div class="rm-faq-a">Yes. Geni Menu maintains a clear movement history showing opening stock, added purchases, recorded consumptions, adjustments, and current balance.</div>
        </div>
        <div class="rm-faq-item">
          <div class="rm-faq-q" onclick="toggleFaq(this)">8. Can inventory be connected with menu items?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div>
          <div class="rm-faq-a">Yes. You can associate dish concepts on your menu with the specific ingredient items stored in your inventory workspace.</div>
        </div>
        <div class="rm-faq-item">
          <div class="rm-faq-q" onclick="toggleFaq(this)">9. Can inventory connect with KOT and kitchen operations?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div>
          <div class="rm-faq-a">Yes. Kitchen Order Tickets and active cooking operations maintain visibility over ingredient availability so kitchen teams stay aligned.</div>
        </div>
        <div class="rm-faq-item">
          <div class="rm-faq-q" onclick="toggleFaq(this)">10. Can I track food waste or spoilage through adjustments?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div>
          <div class="rm-faq-a">Yes. Spoilage and loss events can be recorded via the adjustment entry workflow to keep store room registers accurate.</div>
        </div>
        <div class="rm-faq-item">
          <div class="rm-faq-q" onclick="toggleFaq(this)">11. Can multiple branches manage inventory?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div>
          <div class="rm-faq-a">Yes. Multi-branch restaurant businesses can view and manage distinct store room registers across different location profiles.</div>
        </div>
        <div class="rm-faq-item">
          <div class="rm-faq-q" onclick="toggleFaq(this)">12. Can restaurant staff access inventory from mobile devices?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div>
          <div class="rm-faq-a">Yes. The inventory interface is responsive, allowing store managers to review stock and make adjustment entries via tablets or mobile browsers.</div>
        </div>
        <div class="rm-faq-item">
          <div class="rm-faq-q" onclick="toggleFaq(this)">13. Can inventory data appear in reports?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div>
          <div class="rm-faq-a">Yes. Summary metrics regarding total items, low-stock alerts, and purchase totals are reflected in central reporting.</div>
        </div>
        <div class="rm-faq-item">
          <div class="rm-faq-q" onclick="toggleFaq(this)">14. Is Geni Menu Inventory suitable for small restaurants?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div>
          <div class="rm-faq-a">Yes. Geni Menu Inventory is designed to be straightforward and accessible for small eateries, caf&eacute;s, bakeries, as well as multi-outlet restaurants.</div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= 14. FINAL CTA ================= -->
  <section class="rm-cta">
    <div class="w">
      <div class="eb">READY FOR BETTER INVENTORY CONTROL?</div>
      <h2>Know Your Stock <span style="font-family: 'Playfair Display', serif; font-style: italic; color: #F5E1C8;">Before You Need It.</span></h2>
      <p>Bring ingredients, purchases, stock levels and inventory activity into one connected restaurant workflow with Geni Menu.</p>
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
  const els = document.querySelectorAll('.inv-page .r');
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

// Inventory Console Status Filter
let activeInvStatus = 'all';
function filterInvTable(status, btn) {
  activeInvStatus = status;
  btn.parentElement.querySelectorAll('.rm-filter-btn').forEach(b => b.classList.remove('active'));
  btn.classList.add('active');
  applyInvFilters();
}
function filterInvSearch() {
  applyInvFilters();
}
function applyInvFilters() {
  const q = (document.getElementById('invSearchInput')?.value || '').trim().toLowerCase();
  document.querySelectorAll('#mainInvTable tbody tr').forEach(row => {
    const st = row.getAttribute('data-status');
    const txt = row.textContent.toLowerCase();
    const matchStatus = activeInvStatus === 'all' || st === activeInvStatus;
    const matchSearch = !q || txt.includes(q);
    row.style.display = (matchStatus && matchSearch) ? '' : 'none';
  });
}

// Stock Movement Period Switcher
const mvData = {
  today: { open: '50 kg', purch: '+20 kg', cons: '-18 kg', adj: '-2 kg', curr: '50 kg' },
  week:  { open: '65 kg', purch: '+120 kg', cons: '-128 kg', adj: '-7 kg', curr: '50 kg' },
  month: { open: '80 kg', purch: '+480 kg', cons: '-492 kg', adj: '-18 kg', curr: '50 kg' }
};
function switchMovement(period, btn) {
  btn.parentElement.querySelectorAll('.rm-filter-btn').forEach(b => b.classList.remove('active'));
  btn.classList.add('active');
  const d = mvData[period] || mvData.today;
  document.getElementById('mvOpen').textContent = d.open;
  document.getElementById('mvPurch').textContent = d.purch;
  document.getElementById('mvCons').textContent = d.cons;
  document.getElementById('mvAdj').textContent = d.adj;
  document.getElementById('mvCurr').textContent = d.curr;
}

// Multi-Branch Switcher
const branchData = {
  chennai:      { title: 'CHENNAI BRANCH STOCK', rice: '120 kg', oil: '48 L', chicken: '30 kg' },
  coimbatore:   { title: 'COIMBATORE BRANCH STOCK', rice: '90 kg', oil: '35 L', chicken: '24 kg' },
  salem:        { title: 'SALEM BRANCH STOCK', rice: '74 kg', oil: '28 L', chicken: '19 kg' },
  tiruchengode: { title: 'TIRUCHENGODE BRANCH STOCK', rice: '62 kg', oil: '22 L', chicken: '16 kg' }
};
function switchBranch(key, btn) {
  btn.parentElement.querySelectorAll('.rm-filter-btn').forEach(b => b.classList.remove('active'));
  btn.classList.add('active');
  const b = branchData[key] || branchData.chennai;
  document.getElementById('branchTitle').textContent = b.title;
  document.getElementById('brRice').textContent = b.rice;
  document.getElementById('brOil').textContent = b.oil;
  document.getElementById('brChicken').textContent = b.chicken;
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
