@php
$meta = [
    'title' => 'Restaurant Reports & Analytics Software | Geni Menu',
    'description' => 'Turn restaurant data into better decisions. View real-time sales reports, order volume, top-selling dishes, payment reconciliation, peak hours, and multi-branch analytics with Geni Menu.',
    'keywords' => 'restaurant reports, restaurant analytics software, daily sales report POS, multi-branch restaurant reporting, payment reconciliation, Geni Menu',
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
  --blue: #0369A1;
  --blue-bg: #E0F2FE;
}

.rpt-page * { box-sizing: border-box; }
.rpt-page {
  font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
  color: var(--ink);
  background: var(--bg);
  -webkit-font-smoothing: antialiased;
  overflow-x: hidden;
}

.rpt-page h1, .rpt-page h2, .rpt-page h3, .rpt-page h4 {
  margin: 0;
  font-family: 'Outfit', 'Plus Jakarta Sans', sans-serif;
  font-weight: 500;
  line-height: 1.14;
  letter-spacing: -0.025em;
  color: var(--ink);
}
.rpt-page h1 { font-size: clamp(34px, 4.6vw, 56px); }
.rpt-page h2 { font-size: clamp(28px, 3.6vw, 44px); }
.rpt-page h3 { font-size: 20px; font-weight: 600; }
.rpt-page p { margin: 0; color: var(--mute); font-size: 16px; line-height: 1.65; }
.rpt-page a { text-decoration: none; color: inherit; }

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
.rpt-sec { padding: clamp(56px, 6.5vw, 92px) 0; background: var(--bg); position: relative; overflow: hidden; }
.rpt-sec.alt { background: var(--bg2); }
.rpt-sec.border-b { border-bottom: 1px solid var(--line); }

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

/* Reveal */
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
.rm-hero-sub { font-size: 17.5px; margin: 20px 0 30px; max-width: 540px; color: var(--mute); }
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
.rm-hero-media img { width: 100%; height: 100%; object-fit: cover; display: block; transition: transform 0.6s ease; }
.rm-hero-media:hover img { transform: scale(1.03); }
.rm-hero-scrim {
  position: absolute;
  inset: 0;
  background: linear-gradient(180deg, rgba(33, 22, 15, 0.14) 0%, rgba(33, 22, 15, 0.05) 45%, rgba(33, 22, 15, 0.64) 100%);
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
.rm-live-dot { width: 8px; height: 8px; border-radius: 50%; background: #16A34A; box-shadow: 0 0 0 3px rgba(22, 163, 74, 0.22); }
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
  background: var(--green-bg);
  color: var(--green);
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

/* ================= PROGRESSION GRID (5-COL / 4-COL) ================= */
.rm-prog-grid-5 { display: grid; grid-template-columns: repeat(5, 1fr); gap: 16px; }
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

/* ================= WINDOW CHROME & CHARTS ================= */
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

.rm-filter-group { display: flex; gap: 6px; flex-wrap: wrap; }
.rm-filter-btn {
  padding: 6px 13px;
  border-radius: 99px;
  border: 1px solid var(--line);
  background: #fff;
  color: var(--mute);
  font: 700 12px 'Plus Jakarta Sans', sans-serif;
  cursor: pointer;
  transition: .2s ease;
}
.rm-filter-btn:hover { border-color: var(--br); color: var(--br); }
.rm-filter-btn.active { background: var(--br); color: #fff; border-color: var(--br); }

.chart-bar-group {
  display: flex;
  align-items: flex-end;
  justify-content: space-between;
  gap: 12px;
  height: 155px;
  padding-top: 24px;
  border-bottom: 1px solid var(--line);
}
.chart-bar {
  flex: 1;
  background: linear-gradient(180deg, var(--br) 0%, rgba(135, 96, 57, 0.58) 100%);
  border-radius: 8px 8px 0 0;
  position: relative;
  transition: height .4s ease, background .2s ease;
}
.chart-bar:hover { background: var(--br-dark); }
.chart-bar .val {
  position: absolute;
  top: -22px;
  left: 50%;
  transform: translateX(-50%);
  font-size: 10.5px;
  font-weight: 700;
  color: var(--br);
  white-space: nowrap;
}

.rm-table-wrap { border: 1px solid var(--line); border-radius: 14px; overflow-x: auto; }
.rm-table { width: 100%; border-collapse: collapse; text-align: left; font-size: 13.5px; }
.rm-table th {
  background: var(--bg2);
  padding: 11px 16px;
  font-size: 11px;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--mute);
  border-bottom: 1px solid var(--line);
}
.rm-table td { padding: 12px 16px; border-bottom: 1px solid rgba(135, 96, 57, 0.08); color: var(--ink); }
.rm-table tr:last-child td { border-bottom: none; }

.rm-split { display: grid; grid-template-columns: 1fr 1.05fr; gap: 32px; align-items: start; }

/* Ranked Dish Row with Thumbnail */
.rpt-dish-row {
  background: #fff;
  padding: 13px 16px;
  border-radius: 15px;
  border: 1px solid var(--line);
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 14px;
  transition: transform .2s ease, border-color .2s ease, box-shadow .2s ease;
}
.rpt-dish-row:hover { transform: translateX(3px); border-color: var(--br); box-shadow: var(--shadow-sm); }
.rpt-dish-thumb {
  width: 48px;
  height: 48px;
  border-radius: 12px;
  object-fit: cover;
  flex: none;
  border: 1px solid var(--line);
}

/* ================= PEAK HOURS DARK EDITORIAL BANNER ================= */
.rpt-peak-banner {
  position: relative;
  border-radius: 26px;
  overflow: hidden;
  padding: clamp(32px, 4.5vw, 52px);
  color: #fff;
  background: #21160F;
  box-shadow: var(--shadow-lg);
}
.rpt-peak-bg { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; opacity: 0.25; }
.rpt-peak-scrim { position: absolute; inset: 0; background: linear-gradient(135deg, rgba(33, 22, 15, 0.92) 0%, rgba(111, 78, 45, 0.78) 100%); }
.rpt-peak-inner { position: relative; z-index: 2; }
.rpt-heat-grid { display: grid; grid-template-columns: repeat(8, 1fr); gap: 10px; margin: 28px 0 24px; }
.rpt-heat-cell {
  border-radius: 14px;
  padding: 14px 8px;
  text-align: center;
  border: 1px solid rgba(255, 255, 255, 0.16);
  background: rgba(255, 255, 255, 0.08);
  backdrop-filter: blur(8px);
}
.rpt-heat-cell.med { background: rgba(245, 158, 11, 0.22); border-color: rgba(252, 211, 77, 0.35); }
.rpt-heat-cell.high { background: rgba(184, 142, 86, 0.38); border-color: rgba(245, 225, 200, 0.45); }
.rpt-heat-cell.peak { background: #876039; border-color: #F2D3A8; box-shadow: 0 8px 22px rgba(0, 0, 0, 0.28); }
.rpt-heat-cell span { display: block; font-size: 11px; font-weight: 700; opacity: 0.85; }
.rpt-heat-cell strong { display: block; font-size: 12.5px; margin-top: 5px; color: #fff; }

/* ================= PRESERVED COMPARISON CARDS ================= */
.rpt-cmp-wrap { position: relative; display: grid; grid-template-columns: 1fr 1fr; gap: 32px; align-items: stretch; }
.rpt-center-arrow {
  position: absolute; left: 50%; top: 50%; transform: translate(-50%, -50%);
  width: 44px; height: 44px; border-radius: 50%; background: #876039; color: #fff;
  display: flex; align-items: center; justify-content: center; font-size: 18px; font-weight: 700;
  box-shadow: 0 8px 24px rgba(135, 96, 57, 0.35); z-index: 10; border: 3px solid #fff;
}
.rpt-card { border-radius: 24px; padding: 28px; display: flex; flex-direction: column; text-align: left; }
.rpt-card-bad { background: #FFFDFC; border: 1.5px solid #FECDD3; box-shadow: 0 12px 32px rgba(225, 29, 72, 0.04); }
.rpt-card-good { background: #FFFFFF; border: 1.5px solid rgba(135, 96, 57, 0.28); box-shadow: 0 12px 32px rgba(135, 96, 57, 0.07); }
.rpt-card-head { display: flex; align-items: center; gap: 14px; margin-bottom: 22px; }
.rpt-head-icon { width: 34px; height: 34px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 14px; font-weight: 800; flex-shrink: 0; }
.rpt-card-bad .rpt-head-icon { background: #FFE4E6; color: #E11D48; }
.rpt-card-good .rpt-head-icon { background: #876039; color: #FFFFFF; }
.rpt-head-title { font-family: 'Outfit', sans-serif; font-size: 18px; font-weight: 700; margin: 0; }
.rpt-card-bad .rpt-head-title { color: #881337; }
.rpt-card-good .rpt-head-title { color: #1F1813; }
.rpt-head-sub { font-size: 12.5px; color: #76675D; margin-top: 2px; }
.rpt-bad-split { display: grid; grid-template-columns: 1fr 1.3fr; gap: 18px; align-items: center; flex: 1; }
.rpt-paper-visual { background: #FAF6F0; border-radius: 16px; padding: 16px 12px; display: flex; align-items: center; justify-content: center; border: 1px solid rgba(135, 96, 57, 0.12); height: 100%; }
.rpt-clipboard { width: 100%; background: #FFFDF9; border: 6px solid #876039; border-radius: 12px; padding: 12px 10px; box-shadow: 0 8px 20px rgba(33, 22, 15, 0.1); }
.rpt-clipboard-clip { width: 48px; height: 10px; background: #6E4E2E; border-radius: 4px; margin: -20px auto 8px; border: 2px solid #FFFDF9; }
.rpt-clip-title { text-align: center; font-size: 10.5px; font-weight: 800; letter-spacing: 0.12em; color: #21160F; padding-bottom: 5px; margin-bottom: 7px; border-bottom: 1.5px solid #21160F; }
.rpt-clip-cat { font-size: 8px; font-weight: 800; letter-spacing: 0.08em; color: #876039; margin: 7px 0 3px; }
.rpt-clip-row { display: flex; justify-content: space-between; font-size: 9px; color: #4A3D34; padding: 2px 0; border-bottom: 1px dotted #E6DDD3; }
.rpt-clip-row span:last-child { font-weight: 700; color: #E11D48; }
.rpt-clip-row.struck span:first-child { text-decoration: line-through; color: #A09388; }
.rpt-pain-list { display: flex; flex-direction: column; gap: 9px; }
.rpt-pain-item { background: #FFFFFF; border: 1px solid #FFE4E6; border-radius: 12px; padding: 9px 11px; display: flex; align-items: center; gap: 10px; }
.rpt-pain-icon { width: 28px; height: 28px; border-radius: 8px; background: #FFF1F2; color: #E11D48; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
.rpt-pain-title { font-size: 12.5px; font-weight: 700; color: #21160F; }
.rpt-pain-desc { font-size: 11px; color: #76675D; margin-top: 1px; }
.rpt-good-split { display: grid; grid-template-columns: 1fr 1.05fr; gap: 16px; align-items: center; flex: 1; }
.rpt-steps { display: flex; flex-direction: column; align-items: center; gap: 6px; }
.rpt-step-card { width: 100%; background: #FFFFFF; border: 1px solid #EAE0D5; border-radius: 12px; padding: 11px 12px; display: flex; align-items: center; gap: 10px; }
.rpt-step-icon { width: 32px; height: 32px; border-radius: 9px; background: #F6EFE7; color: #876039; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
.rpt-step-title { font-size: 12.5px; font-weight: 700; color: #21160F; }
.rpt-step-desc { font-size: 11px; color: #76675D; margin-top: 1px; }
.rpt-step-arrow { color: #A08B76; font-size: 13px; font-weight: 700; }
.rpt-phone-wrap { display: flex; justify-content: center; }
.rpt-phone { width: 100%; max-width: 226px; background: #1C1917; border-radius: 26px; padding: 8px; box-shadow: 0 16px 34px rgba(28, 25, 23, 0.22); }
.rpt-phone-screen { background: #FFFFFF; border-radius: 20px; padding: 11px 9px 13px; }
.rpt-phone-notch { width: 50px; height: 4px; background: #E7E0D8; border-radius: 99px; margin: 0 auto 8px; }
.rpt-phone-head { text-align: center; margin-bottom: 7px; }
.rpt-phone-title { font-family: 'Outfit', sans-serif; font-size: 13px; font-weight: 700; color: #21160F; }
.rpt-phone-sub { font-size: 9px; color: #76675D; }
.rpt-phone-tabs { display: flex; gap: 4px; justify-content: center; margin-bottom: 8px; }
.rpt-phone-tab { font-size: 8px; font-weight: 700; padding: 3px 8px; border-radius: 99px; background: #F4EFEA; color: #6E6157; }
.rpt-phone-tab.active { background: #876039; color: #FFFFFF; }
.rpt-phone-list { display: flex; flex-direction: column; gap: 6px; }
.rpt-phone-item { display: flex; align-items: center; gap: 8px; padding: 7px 8px; background: #FAF7F3; border: 1px solid #EFE7DE; border-radius: 10px; }
.rpt-phone-badge { width: 26px; height: 26px; border-radius: 7px; background: #F3E8DC; color: #876039; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
.rpt-phone-meta { flex: 1; min-width: 0; }
.rpt-phone-name { font-size: 10px; font-weight: 700; color: #21160F; }
.rpt-phone-detail { font-size: 8px; color: #76675D; }
.rpt-phone-foot { display: flex; justify-content: space-between; align-items: center; margin-top: 3px; }
.rpt-phone-val { font-size: 9.5px; font-weight: 800; color: #21160F; }
.rpt-status-pill { font-size: 7.5px; font-weight: 700; padding: 2px 6px; border-radius: 99px; }
.rpt-status-ok { background: #DCFCE7; color: #15803D; }
.rpt-status-live { background: #FEF3C7; color: #B45309; }
.rpt-bottom-cta { margin-top: 18px; display: flex; justify-content: center; }
.rpt-cta-pill { display: inline-flex; align-items: center; gap: 7px; background: #876039; color: #FFFFFF; font-size: 12.5px; font-weight: 700; padding: 9px 20px; border-radius: 999px; box-shadow: 0 8px 20px rgba(135, 96, 57, 0.28); }

/* ================= BENEFITS, INDUSTRIES, ECOSYSTEM, FAQ, CTA ================= */
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
.rm-ind-card img { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; transition: transform .55s ease; }
.rm-ind-card:hover img { transform: scale(1.07); }
.rm-ind-scrim { position: absolute; inset: 0; background: linear-gradient(180deg, rgba(33, 22, 15, 0.14) 0%, rgba(33, 22, 15, 0.86) 100%); }
.rm-ind-body { position: relative; z-index: 2; }
.rm-ind-body h4 { color: #fff; font-size: 18px; font-weight: 600; margin-bottom: 5px; }
.rm-ind-body p { color: rgba(255, 255, 255, 0.84); font-size: 13.5px; line-height: 1.5; }

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

.rm-faq-list { max-width: 860px; margin: 0 auto; display: flex; flex-direction: column; gap: 12px; }
.rm-faq-item { background: #fff; border: 1px solid var(--line); border-radius: 16px; overflow: hidden; transition: border-color .2s, box-shadow .2s; }
.rm-faq-item.open { border-color: var(--br); box-shadow: var(--shadow-sm); }
.rm-faq-q { padding: 18px 22px; font-size: 16px; font-weight: 700; color: var(--ink); cursor: pointer; display: flex; justify-content: space-between; align-items: center; gap: 14px; user-select: none; }
.rm-faq-q svg { width: 18px; height: 18px; stroke: var(--br); transition: transform .25s ease; flex: none; }
.rm-faq-item.open .rm-faq-q svg { transform: rotate(180deg); }
.rm-faq-a { display: none; padding: 14px 22px 20px; font-size: 15px; color: var(--mute); line-height: 1.65; border-top: 1px solid rgba(135, 96, 57, 0.08); }
.rm-faq-item.open .rm-faq-a { display: block; }

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

@media (max-width: 1080px) {
  .rm-hero-grid, .rm-split, .rpt-cmp-wrap { grid-template-columns: 1fr; gap: 32px; }
  .rpt-center-arrow { display: none; }
  .rm-val-grid, .rm-prog-grid-4 { grid-template-columns: repeat(2, 1fr); }
  .rm-prog-grid-5 { grid-template-columns: repeat(3, 1fr); }
  .rpt-heat-grid { grid-template-columns: repeat(4, 1fr); }
  .rm-eco-grid { grid-template-columns: repeat(4, 1fr); }
}
@media (max-width: 820px) {
  .rm-ben-grid, .rm-ind-grid { grid-template-columns: 1fr; }
  .rm-prog-grid-5, .rm-eco-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 640px) {
  .w { padding: 0 16px; }
  .rm-val-grid, .rm-prog-grid-4, .rpt-heat-grid { grid-template-columns: repeat(2, 1fr); }
  .rpt-bad-split, .rpt-good-split { grid-template-columns: 1fr; }
  .rm-hero-float { flex-direction: column; align-items: flex-start; }
  .rm-hero-cta .btn, .rm-cta-btns .btn { width: 100%; }
}
</style>

<div class="rpt-page">

  <!-- ================= BREADCRUMB ================= -->
  <div class="bc">
    <div class="w">
      <a href="{{ route('home') }}">Home</a>
      <span class="sep">/</span>
      <a href="{{ route('features') }}">Features</a>
      <span class="sep">/</span>
      <span class="cur">Reports &amp; Analytics</span>
    </div>
  </div>

  <!-- ================= 1. HERO SECTION ================= -->
  <section class="rm-hero">
    <div class="w">
      <div class="rm-hero-grid">
        <div>
          <div class="eb">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
            REPORTS &amp; ANALYTICS
          </div>
          <h1>
            Turn Restaurant Data<br>
            <span class="sf">Into Better Decisions.</span>
          </h1>
          <p class="rm-hero-sub">
            Bring sales, orders, payments, menu performance and restaurant activity into one clear reporting experience.
          </p>

          <div class="rm-hero-cta">
            <a href="{{ route('restaurant_signup') }}" onclick="if(typeof openPopup === 'function'){ openPopup(); return false; }" class="btn p">Get Started &rarr;</a>
            <a href="{{ route('contact.us') }}" class="btn o">Book a Demo</a>
          </div>

          <div class="rm-hero-stats">
            <div class="rm-hero-stat">
              <strong>Real-Time</strong>
              <span>Sales &amp; Order Activity</span>
            </div>
            <div class="rm-hero-stat">
              <strong>Multi-Channel</strong>
              <span>Dine-in, Takeaway, Delivery</span>
            </div>
            <div class="rm-hero-stat">
              <strong>Filterable</strong>
              <span>Date &amp; Category Drilldowns</span>
            </div>
          </div>
        </div>

        <div class="rm-hero-media">
          <img src="{{ asset('assets/images/reports-hero.jpg') }}" alt="Restaurant owner reviewing live sales and analytics reports on tablet">
          <div class="rm-hero-scrim"></div>
          <div class="rm-hero-pill">
            <span class="rm-live-dot"></span>
            Live Metrics &bull; Today &#8377;48,620
          </div>
          <div class="rm-hero-float">
            <div class="rm-hero-float-left">
              <div class="rm-hero-float-ico">
                <svg viewBox="0 0 24 24"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg>
              </div>
              <div>
                <div class="rm-hero-float-ttl">186 Orders Completed &bull; AOV &#8377;261</div>
                <div class="rm-hero-float-sub">Cash &#8377;18,400 &bull; UPI &#8377;14,080 &bull; Card &#8377;12,800</div>
              </div>
            </div>
            <span class="rm-hero-float-tag">&uarr; +14% vs Yesterday</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= 2. VALUE STRIP (01-04) ================= -->
  <section class="rpt-sec border-b">
    <div class="w">
      <div class="rm-val-grid r">
        <div class="rm-val-card">
          <div class="rm-val-top">
            <div class="rm-ic"><svg viewBox="0 0 24 24"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/></svg></div>
            <span class="rm-num">01</span>
          </div>
          <h3>Sales Visibility</h3>
          <p>Understand how the restaurant is performing across revenue channels.</p>
        </div>

        <div class="rm-val-card">
          <div class="rm-val-top">
            <div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/></svg></div>
            <span class="rm-num">02</span>
          </div>
          <h3>Order Insights</h3>
          <p>See order volume, peak preparation times, and dining channels.</p>
        </div>

        <div class="rm-val-card">
          <div class="rm-val-top">
            <div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9"/></svg></div>
            <span class="rm-num">03</span>
          </div>
          <h3>Menu Performance</h3>
          <p>Identify popular dishes and top-performing menu categories.</p>
        </div>

        <div class="rm-val-card">
          <div class="rm-val-top">
            <div class="rm-ic"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><line x1="9" y1="3" x2="9" y2="21"/><line x1="15" y1="3" x2="15" y2="21"/></svg></div>
            <span class="rm-num">04</span>
          </div>
          <h3>Operational Reporting</h3>
          <p>Understand payments, tables, and kitchen inventory activity.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= 3. DATA-TO-DECISION PIPELINE ================= -->
  <section class="rpt-sec alt border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">DATA TO DECISION PIPELINE</div>
        <h2>From Restaurant Activity <span class="sf">to Business Insight.</span></h2>
        <p>“Everything happening in the restaurant can be understood from one reporting workspace.”</p>
      </div>

      <div class="rm-prog-grid-5 r">
        <div class="rm-prog-card"><div class="rm-prog-num">01</div><h4>Restaurant Activity</h4><p>Dine-in, takeaway, delivery &amp; POS billing captured live.</p></div>
        <div class="rm-prog-card"><div class="rm-prog-num">02</div><h4>Data Organized</h4><p>Orders, taxes, discounts &amp; payments synced automatically.</p></div>
        <div class="rm-prog-card"><div class="rm-prog-num">03</div><h4>Reports Generated</h4><p>Clear daily, weekly &amp; monthly views ready anytime.</p></div>
        <div class="rm-prog-card"><div class="rm-prog-num">04</div><h4>Trends Understood</h4><p>Spot peak hours, best-selling dishes &amp; channel growth.</p></div>
        <div class="rm-prog-card"><div class="rm-prog-num">05</div><h4>Business Action</h4><p>Refine staffing, prep lists &amp; menu pricing with confidence.</p></div>
      </div>
    </div>
  </section>

  <!-- ================= 4. PROBLEM & COMPARISON SECTION ================= -->
  <section class="rpt-sec">
    <div class="w">
      <div class="hd r">
        <div class="eb">BUSINESS CLARITY</div>
        <h2>Running a Restaurant <span class="sf">on Guesswork Is Hard.</span></h2>
        <p>Scattered bills, separate payment slips, and paper logbooks leave owners uncertain about real daily metrics.</p>
      </div>

      <div class="rpt-cmp-wrap r">
        <div class="rpt-center-arrow" aria-hidden="true">&rarr;</div>

        <!-- Left Card: Scattered Information -->
        <div class="rpt-card rpt-card-bad">
          <div class="rpt-card-head">
            <div class="rpt-head-icon">&times;</div>
            <div>
              <h3 class="rpt-head-title">Scattered Information</h3>
              <div class="rpt-head-sub">Manual tallies, paper slips and delayed closing</div>
            </div>
          </div>

          <div class="rpt-bad-split">
            <div class="rpt-paper-visual">
              <div class="rpt-clipboard">
                <div class="rpt-clipboard-clip"></div>
                <div class="rpt-clip-title">DAILY TALLY</div>
                <div class="rpt-clip-cat">SALES SLIPS</div>
                <div class="rpt-clip-row"><span>Dine-in Bills</span><span>&#8377;28,400?</span></div>
                <div class="rpt-clip-row struck"><span>Online Orders</span><span>Not synced</span></div>
                <div class="rpt-clip-row"><span>Cash Drawer</span><span>-&#8377;640 short</span></div>
                <div class="rpt-clip-cat">PAYMENTS</div>
                <div class="rpt-clip-row"><span>Card Slips</span><span>Pending</span></div>
                <div class="rpt-clip-row struck"><span>UPI Log</span><span>Manual</span></div>
                <div class="rpt-clip-cat">CLOSING</div>
                <div class="rpt-clip-row"><span>Tax &amp; Net</span><span>Calc late</span></div>
              </div>
            </div>

            <div class="rpt-pain-list">
              <div class="rpt-pain-item">
                <div class="rpt-pain-icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg></div>
                <div><div class="rpt-pain-title">Paper Sales Tallies</div><div class="rpt-pain-desc">Paper sales records requiring manual tallies</div></div>
              </div>
              <div class="rpt-pain-item">
                <div class="rpt-pain-icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg></div>
                <div><div class="rpt-pain-title">Unconnected Order Totals</div><div class="rpt-pain-desc">Dine-in and online order totals tracked separately</div></div>
              </div>
              <div class="rpt-pain-item">
                <div class="rpt-pain-icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><rect x="2" y="5" width="20" height="14" rx="2"/><line x1="2" y1="10" x2="22" y2="10"/></svg></div>
                <div><div class="rpt-pain-title">Split Payment Reconciliation</div><div class="rpt-pain-desc">Separate payment machine slips &amp; cash counts</div></div>
              </div>
              <div class="rpt-pain-item">
                <div class="rpt-pain-icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg></div>
                <div><div class="rpt-pain-title">Untracked Stock Consumption</div><div class="rpt-pain-desc">No link between dish sales and ingredient usage</div></div>
              </div>
              <div class="rpt-pain-item">
                <div class="rpt-pain-icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></div>
                <div><div class="rpt-pain-title">Slow End-of-Day Closing</div><div class="rpt-pain-desc">Time-consuming manual calculations every night</div></div>
              </div>
            </div>
          </div>
        </div>

        <!-- Right Card: Geni Menu Reports -->
        <div class="rpt-card rpt-card-good">
          <div class="rpt-card-head">
            <div class="rpt-head-icon">&check;</div>
            <div>
              <h3 class="rpt-head-title">Geni Menu Reports</h3>
              <div class="rpt-head-sub">Live sales, payment &amp; branch insights in one view</div>
            </div>
          </div>

          <div class="rpt-good-split">
            <div class="rpt-steps">
              <div class="rpt-step-card">
                <div class="rpt-step-icon"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.1"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg></div>
                <div><div class="rpt-step-title">Centralized Workspace</div><div class="rpt-step-desc">Connected data from POS, orders &amp; tables</div></div>
              </div>
              <div class="rpt-step-arrow">&darr;</div>
              <div class="rpt-step-card">
                <div class="rpt-step-icon"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.1"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></div>
                <div><div class="rpt-step-title">Gross, Net &amp; Tax Clarity</div><div class="rpt-step-desc">Instant sales, discount &amp; payment breakdowns</div></div>
              </div>
              <div class="rpt-step-arrow">&darr;</div>
              <div class="rpt-step-card">
                <div class="rpt-step-icon"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.1"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg></div>
                <div><div class="rpt-step-title">Hourly &amp; Branch Filters</div><div class="rpt-step-desc">Visual peak trends filtered by date &amp; outlet</div></div>
              </div>
            </div>

            <div class="rpt-phone-wrap">
              <div class="rpt-phone">
                <div class="rpt-phone-screen">
                  <div class="rpt-phone-notch"></div>
                  <div class="rpt-phone-head">
                    <div class="rpt-phone-title">Daily Reports</div>
                    <div class="rpt-phone-sub">Live sales &amp; payment summary</div>
                  </div>
                  <div class="rpt-phone-tabs">
                    <span class="rpt-phone-tab active">Today</span>
                    <span class="rpt-phone-tab">Week</span>
                    <span class="rpt-phone-tab">Month</span>
                  </div>
                  <div class="rpt-phone-list">
                    <div class="rpt-phone-item">
                      <div class="rpt-phone-badge"><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg></div>
                      <div class="rpt-phone-meta">
                        <div class="rpt-phone-name">Net Sales Today</div>
                        <div class="rpt-phone-detail">186 orders &bull; All channels</div>
                        <div class="rpt-phone-foot"><span class="rpt-phone-val">&#8377;48,620</span><span class="rpt-status-pill rpt-status-ok">+14%</span></div>
                      </div>
                    </div>
                    <div class="rpt-phone-item">
                      <div class="rpt-phone-badge"><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><rect x="2" y="5" width="20" height="14" rx="2"/><line x1="2" y1="10" x2="22" y2="10"/></svg></div>
                      <div class="rpt-phone-meta">
                        <div class="rpt-phone-name">Payments Synced</div>
                        <div class="rpt-phone-detail">Cash &bull; Card &bull; UPI</div>
                        <div class="rpt-phone-foot"><span class="rpt-phone-val">&#8377;45,280</span><span class="rpt-status-pill rpt-status-ok">Matched</span></div>
                      </div>
                    </div>
                    <div class="rpt-phone-item">
                      <div class="rpt-phone-badge"><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/></svg></div>
                      <div class="rpt-phone-meta">
                        <div class="rpt-phone-name">Peak Hour (8 PM)</div>
                        <div class="rpt-phone-detail">44 orders &bull; Top: Biryani</div>
                        <div class="rpt-phone-foot"><span class="rpt-phone-val">&#8377;10,600</span><span class="rpt-status-pill rpt-status-live">Live</span></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="rpt-bottom-cta">
            <div class="rpt-cta-pill">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><polyline points="20 6 9 17 4 12"/></svg>
              Every Number Clear at a Glance!
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= 5. INTERACTIVE EXECUTIVE DASHBOARD ================= -->
  <section class="rpt-sec alt">
    <div class="w">
      <div class="hd r">
        <div class="eb">EXECUTIVE WORKSPACE</div>
        <h2>See Your Restaurant <span class="sf">at a Glance.</span></h2>
        <p>Filter by date to inspect gross sales, discounts, GST taxes, net revenue, hourly trends, and payment reconciliation.</p>
      </div>

      <div class="rm-win r" style="max-width: 1100px; margin: 0 auto;">
        <div class="rm-win-bar">
          <div class="rm-win-dots"><i></i><i></i><i></i></div>
          <div class="rm-win-ttl">REPORTS DASHBOARD &bull; <span id="rptPeriodLbl">TODAY</span></div>
          <div class="rm-filter-group">
            <button type="button" class="rm-filter-btn active" onclick="switchReportPeriod('today', this)">Today</button>
            <button type="button" class="rm-filter-btn" onclick="switchReportPeriod('yesterday', this)">Yesterday</button>
            <button type="button" class="rm-filter-btn" onclick="switchReportPeriod('week', this)">This Week</button>
            <button type="button" class="rm-filter-btn" onclick="switchReportPeriod('month', this)">This Month</button>
          </div>
        </div>

        <div class="rm-win-body">
          <!-- 4 Top KPIs -->
          <div class="rm-prog-grid-4" style="margin-bottom: 22px;">
            <div style="background: var(--br-light); border: 1.5px solid var(--br); border-radius: 14px; padding: 16px;">
              <div style="font-size: 11px; font-weight: 700; color: var(--br); text-transform: uppercase;">Net Sales</div>
              <div id="kpiSales" style="font-size: 26px; font-weight: 600; font-family: 'Outfit', sans-serif; color: var(--br); margin-top: 2px;">&#8377;48,620</div>
              <div id="kpiTrend" style="font-size: 11.5px; font-weight: 700; color: var(--green); margin-top: 2px;">&uarr; +14% vs Yesterday</div>
            </div>
            <div style="background: var(--bg2); border: 1px solid var(--line); border-radius: 14px; padding: 16px;">
              <div style="font-size: 11px; font-weight: 700; color: var(--mute); text-transform: uppercase;">Orders</div>
              <div id="kpiOrders" style="font-size: 26px; font-weight: 600; font-family: 'Outfit', sans-serif; margin-top: 2px;">186</div>
              <div style="font-size: 11.5px; color: var(--mute); margin-top: 2px;">Dine-in, Takeaway, Delivery</div>
            </div>
            <div style="background: var(--bg2); border: 1px solid var(--line); border-radius: 14px; padding: 16px;">
              <div style="font-size: 11px; font-weight: 700; color: var(--mute); text-transform: uppercase;">Avg Order Value</div>
              <div id="kpiAov" style="font-size: 26px; font-weight: 600; font-family: 'Outfit', sans-serif; margin-top: 2px;">&#8377;261</div>
              <div style="font-size: 11.5px; color: var(--mute); margin-top: 2px;">Per Completed Ticket</div>
            </div>
            <div style="background: var(--green-bg); border: 1px solid rgba(21,128,61,0.18); border-radius: 14px; padding: 16px;">
              <div style="font-size: 11px; font-weight: 700; color: var(--green); text-transform: uppercase;">Payments Collected</div>
              <div id="kpiPay" style="font-size: 26px; font-weight: 600; font-family: 'Outfit', sans-serif; color: var(--green); margin-top: 2px;">&#8377;45,280</div>
              <div style="font-size: 11.5px; color: var(--green); margin-top: 2px;">Cash, Card &amp; UPI</div>
            </div>
          </div>

          <!-- Financial Breakdown + Hourly Chart -->
          <div class="rm-split" style="gap: 24px;">
            <div style="background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 18px;">
              <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
                <span style="font-size: 12px; font-weight: 700; color: var(--br); text-transform: uppercase;">Hourly Sales Trend</span>
                <span style="font-size: 11px; color: var(--mute); font-weight: 600;">Peak: 8 PM (&#8377;10.6k)</span>
              </div>
              <div class="chart-bar-group">
                <div class="chart-bar" style="height: 38%;"><span class="val">&#8377;4.2k</span></div>
                <div class="chart-bar" style="height: 52%;"><span class="val">&#8377;5.1k</span></div>
                <div class="chart-bar" style="height: 65%;"><span class="val">&#8377;6.4k</span></div>
                <div class="chart-bar" style="height: 80%;"><span class="val">&#8377;8.2k</span></div>
                <div class="chart-bar" style="height: 100%;"><span class="val">&#8377;10.6k</span></div>
                <div class="chart-bar" style="height: 86%;"><span class="val">&#8377;9.1k</span></div>
              </div>
              <div style="display: flex; justify-content: space-between; font-size: 11px; font-weight: 700; color: var(--mute); margin-top: 8px;">
                <span>12 PM</span><span>2 PM</span><span>4 PM</span><span>6 PM</span><span>8 PM</span><span>10 PM</span>
              </div>
            </div>

            <div style="display: flex; flex-direction: column; gap: 14px;">
              <div style="background: var(--bg2); border: 1px solid var(--line); border-radius: 14px; padding: 16px;">
                <div style="font-size: 11.5px; font-weight: 700; color: var(--br); text-transform: uppercase; margin-bottom: 10px;">Revenue &amp; Tax Reconciliation</div>
                <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 8px; text-align: center;">
                  <div style="background: #fff; padding: 10px; border-radius: 10px; border: 1px solid var(--line);"><div style="font-size: 10px; color: var(--mute); font-weight: 700;">GROSS</div><strong id="revGross" style="font-size: 15px;">&#8377;52,400</strong></div>
                  <div style="background: var(--amber-bg); padding: 10px; border-radius: 10px;"><div style="font-size: 10px; color: var(--amber); font-weight: 700;">DISCOUNTS</div><strong id="revDisc" style="font-size: 15px; color: var(--amber);">-&#8377;2,100</strong></div>
                  <div style="background: #fff; padding: 10px; border-radius: 10px; border: 1px solid var(--line);"><div style="font-size: 10px; color: var(--mute); font-weight: 700;">GST TAX</div><strong id="revTax" style="font-size: 15px;">+&#8377;2,620</strong></div>
                </div>
              </div>

              <div style="background: #fff; border: 1px solid var(--line); border-radius: 14px; padding: 16px;">
                <div style="font-size: 11.5px; font-weight: 700; color: var(--br); text-transform: uppercase; margin-bottom: 10px;">Payment Method Split</div>
                <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 8px; text-align: center;">
                  <div style="background: var(--bg2); padding: 10px; border-radius: 10px;"><div style="font-size: 10px; color: var(--mute); font-weight: 700;">CASH</div><strong id="payCash" style="font-size: 15px;">&#8377;18,400</strong></div>
                  <div style="background: var(--bg2); padding: 10px; border-radius: 10px;"><div style="font-size: 10px; color: var(--mute); font-weight: 700;">CARD</div><strong id="payCard" style="font-size: 15px;">&#8377;12,800</strong></div>
                  <div style="background: var(--bg2); padding: 10px; border-radius: 10px;"><div style="font-size: 10px; color: var(--mute); font-weight: 700;">UPI / QR</div><strong id="payUpi" style="font-size: 15px;">&#8377;14,080</strong></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= 6. TOP DISHES (WITH PHOTOS) & CATEGORY / CHANNEL SPLIT ================= -->
  <section class="rpt-sec">
    <div class="w">
      <div class="hd r">
        <div class="eb">MENU POPULARITY &amp; CHANNEL SPLIT</div>
        <h2>Know What Customers <span class="sf">Order Most.</span></h2>
        <p>Identify top revenue-generating dishes, compare menu categories, and track dine-in, takeaway, delivery, and pickup ratios.</p>
      </div>

      <div class="rm-split r">
        <!-- Left: Top 5 Ranked Dishes with Food Photos -->
        <div style="display: flex; flex-direction: column; gap: 12px;">
          <div class="rpt-dish-row">
            <div style="display: flex; align-items: center; gap: 12px;">
              <img class="rpt-dish-thumb" src="https://images.unsplash.com/photo-1563379091339-03b21ab4a4f8?auto=format&fit=crop&w=200&q=80" alt="Chicken Biryani">
              <div><strong style="font-size: 15.5px;">1. Chicken Biryani</strong><div style="font-size: 12.5px; color: var(--mute);">Main Course &bull; Biryani</div></div>
            </div>
            <div style="text-align: right;"><strong style="color: var(--br); font-size: 16px;">&#8377;39,760</strong><div style="font-size: 12px; color: var(--mute); font-weight: 700;">142 Orders</div></div>
          </div>

          <div class="rpt-dish-row">
            <div style="display: flex; align-items: center; gap: 12px;">
              <img class="rpt-dish-thumb" src="https://images.unsplash.com/photo-1513104890138-7c749659a591?auto=format&fit=crop&w=200&q=80" alt="Margherita Pizza">
              <div><strong style="font-size: 15.5px;">2. Margherita Pizza</strong><div style="font-size: 12.5px; color: var(--mute);">Italian &bull; Pizza</div></div>
            </div>
            <div style="text-align: right;"><strong style="font-size: 16px;">&#8377;30,720</strong><div style="font-size: 12px; color: var(--mute); font-weight: 700;">96 Orders</div></div>
          </div>

          <div class="rpt-dish-row">
            <div style="display: flex; align-items: center; gap: 12px;">
              <img class="rpt-dish-thumb" src="https://images.unsplash.com/photo-1461023058943-07fcbe16d735?auto=format&fit=crop&w=200&q=80" alt="Cold Coffee">
              <div><strong style="font-size: 15.5px;">3. Cold Coffee</strong><div style="font-size: 12.5px; color: var(--mute);">Beverages &bull; Cold</div></div>
            </div>
            <div style="text-align: right;"><strong style="font-size: 16px;">&#8377;13,440</strong><div style="font-size: 12px; color: var(--mute); font-weight: 700;">84 Orders</div></div>
          </div>

          <div class="rpt-dish-row">
            <div style="display: flex; align-items: center; gap: 12px;">
              <img class="rpt-dish-thumb" src="https://images.unsplash.com/photo-1567188040759-fb8a883dc6d8?auto=format&fit=crop&w=200&q=80" alt="Paneer Tikka">
              <div><strong style="font-size: 15.5px;">4. Paneer Tikka</strong><div style="font-size: 12.5px; color: var(--mute);">Starters &bull; Tandoor</div></div>
            </div>
            <div style="text-align: right;"><strong style="font-size: 16px;">&#8377;15,840</strong><div style="font-size: 12px; color: var(--mute); font-weight: 700;">72 Orders</div></div>
          </div>

          <div class="rpt-dish-row">
            <div style="display: flex; align-items: center; gap: 12px;">
              <img class="rpt-dish-thumb" src="https://images.unsplash.com/photo-1630383249896-424e482df921?auto=format&fit=crop&w=200&q=80" alt="Masala Dosa">
              <div><strong style="font-size: 15.5px;">5. Masala Dosa</strong><div style="font-size: 12.5px; color: var(--mute);">South Indian &bull; Tiffin</div></div>
            </div>
            <div style="text-align: right;"><strong style="font-size: 16px;">&#8377;10,880</strong><div style="font-size: 12px; color: var(--mute); font-weight: 700;">68 Orders</div></div>
          </div>
        </div>

        <!-- Right: Category Bars + Order Channel Donut -->
        <div style="display: flex; flex-direction: column; gap: 20px;">
          <div class="rm-win">
            <div class="rm-win-bar">
              <div class="rm-win-dots"><i></i><i></i><i></i></div>
              <div class="rm-win-ttl">CATEGORY REVENUE SUMMARY</div>
            </div>
            <div class="rm-win-body" style="display: flex; flex-direction: column; gap: 12px;">
              <div>
                <div style="display: flex; justify-content: space-between; font-size: 13px; font-weight: 700; margin-bottom: 5px;"><span>Biryani</span><span>&#8377;42,500 (158)</span></div>
                <div style="height: 10px; background: var(--bg2); border-radius: 6px; overflow: hidden;"><div style="width: 100%; height: 100%; background: var(--br);"></div></div>
              </div>
              <div>
                <div style="display: flex; justify-content: space-between; font-size: 13px; font-weight: 700; margin-bottom: 5px;"><span>Main Course</span><span>&#8377;36,200 (132)</span></div>
                <div style="height: 10px; background: var(--bg2); border-radius: 6px; overflow: hidden;"><div style="width: 85%; height: 100%; background: var(--br);"></div></div>
              </div>
              <div>
                <div style="display: flex; justify-content: space-between; font-size: 13px; font-weight: 700; margin-bottom: 5px;"><span>Pizza</span><span>&#8377;31,400 (104)</span></div>
                <div style="height: 10px; background: var(--bg2); border-radius: 6px; overflow: hidden;"><div style="width: 74%; height: 100%; background: var(--br-gold);"></div></div>
              </div>
              <div>
                <div style="display: flex; justify-content: space-between; font-size: 13px; font-weight: 700; margin-bottom: 5px;"><span>Beverages</span><span>&#8377;18,800 (140)</span></div>
                <div style="height: 10px; background: var(--bg2); border-radius: 6px; overflow: hidden;"><div style="width: 44%; height: 100%; background: var(--br-gold);"></div></div>
              </div>
              <div>
                <div style="display: flex; justify-content: space-between; font-size: 13px; font-weight: 700; margin-bottom: 5px;"><span>Desserts</span><span>&#8377;14,600 (88)</span></div>
                <div style="height: 10px; background: var(--bg2); border-radius: 6px; overflow: hidden;"><div style="width: 34%; height: 100%; background: var(--br-gold);"></div></div>
              </div>
            </div>
          </div>

          <div class="rm-win">
            <div class="rm-win-body" style="display: flex; align-items: center; gap: 22px; flex-wrap: wrap;">
              <div style="width: 124px; height: 124px; border-radius: 50%; background: conic-gradient(var(--br) 0% 58%, #b88e56 58% 80%, #3b82f6 80% 94%, #10b981 94% 100%); display: grid; place-items: center; flex: none;">
                <div style="width: 78px; height: 78px; border-radius: 50%; background: #fff; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                  <strong style="font-size: 18px;">186</strong><span style="font-size: 9px; font-weight: 700; color: var(--mute);">ORDERS</span>
                </div>
              </div>
              <div style="flex: 1; min-width: 180px; display: grid; grid-template-columns: 1fr 1fr; gap: 8px; font-size: 12.5px;">
                <div style="padding: 8px 10px; background: var(--bg2); border-radius: 8px;">Dine-in: <strong>58% (108)</strong></div>
                <div style="padding: 8px 10px; background: var(--bg2); border-radius: 8px;">Takeaway: <strong>22% (42)</strong></div>
                <div style="padding: 8px 10px; background: var(--bg2); border-radius: 8px;">Delivery: <strong>14% (24)</strong></div>
                <div style="padding: 8px 10px; background: var(--bg2); border-radius: 8px;">Pickup: <strong>6% (12)</strong></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= 7. PEAK HOURS BANNER & OPERATIONAL AUDIT ================= -->
  <section class="rpt-sec alt">
    <div class="w">
      <!-- Dark Editorial Peak Hours Banner -->
      <div class="rpt-peak-banner r" style="margin-bottom: 48px;">
        <img class="rpt-peak-bg" src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&w=1400&q=80" alt="Upscale restaurant dining room during peak dinner service">
        <div class="rpt-peak-scrim"></div>
        <div class="rpt-peak-inner">
          <div style="text-align: center; max-width: 680px; margin: 0 auto;">
            <div class="eb" style="background: rgba(255,255,255,0.14); border-color: rgba(255,255,255,0.28); color: #fff;">SERVICE PATTERNS &amp; FULFILLMENT</div>
            <h2 style="color: #fff;">Understand Your <span style="font-family: 'Playfair Display', serif; font-style: italic; color: #F2D3A8;">Busy Hours.</span></h2>
            <p style="color: rgba(255,255,255,0.85); margin-top: 10px;">Use hourly dining rush heatmaps to plan kitchen prep, staffing shifts, and table turns.</p>
          </div>

          <div class="rpt-heat-grid">
            <div class="rpt-heat-cell"><span>12 PM</span><strong>Low</strong></div>
            <div class="rpt-heat-cell med"><span>1 PM</span><strong>Medium</strong></div>
            <div class="rpt-heat-cell high"><span>2 PM</span><strong>High</strong></div>
            <div class="rpt-heat-cell med"><span>6 PM</span><strong>Medium</strong></div>
            <div class="rpt-heat-cell high"><span>7 PM</span><strong>High</strong></div>
            <div class="rpt-heat-cell peak"><span>8 PM</span><strong>Very High</strong></div>
            <div class="rpt-heat-cell high"><span>9 PM</span><strong>High</strong></div>
            <div class="rpt-heat-cell med"><span>10 PM</span><strong>Medium</strong></div>
          </div>

          <div style="display: flex; gap: 12px; justify-content: center; flex-wrap: wrap; font-size: 13px; font-weight: 700;">
            <span style="padding: 8px 16px; border-radius: 99px; background: rgba(16,185,129,0.28);">Completed: 158</span>
            <span style="padding: 8px 16px; border-radius: 99px; background: rgba(245,158,11,0.28);">Preparing: 12</span>
            <span style="padding: 8px 16px; border-radius: 99px; background: rgba(59,130,246,0.28);">Pending: 08</span>
            <span style="padding: 8px 16px; border-radius: 99px; background: rgba(239,68,68,0.28);">Cancelled: 08</span>
          </div>
        </div>
      </div>

      <!-- Floor, Inventory, Staff & Export Split -->
      <div class="rm-split r">
        <!-- Left: Floor + Inventory Sync -->
        <div style="display: flex; flex-direction: column; gap: 20px;">
          <div class="rm-win">
            <div class="rm-win-bar">
              <div class="rm-win-dots"><i></i><i></i><i></i></div>
              <div class="rm-win-ttl">DINING FLOOR &amp; INVENTORY SYNC</div>
            </div>
            <div class="rm-win-body">
              <div style="font-size: 11.5px; font-weight: 700; color: var(--br); margin-bottom: 10px; text-transform: uppercase;">Dining Floor Occupancy (T01 – T08)</div>
              <div class="rm-prog-grid-4" style="margin-bottom: 18px;">
                <div style="background: var(--bg2); padding: 12px; border-radius: 10px; text-align: center;"><div style="font-size: 11px; color: var(--br); font-weight: 700;">Occupied</div><strong style="font-size: 20px;">16</strong></div>
                <div style="background: var(--green-bg); padding: 12px; border-radius: 10px; text-align: center;"><div style="font-size: 11px; color: var(--green); font-weight: 700;">Available</div><strong style="font-size: 20px; color: var(--green);">05</strong></div>
                <div style="background: var(--amber-bg); padding: 12px; border-radius: 10px; text-align: center;"><div style="font-size: 11px; color: var(--amber); font-weight: 700;">Reserved</div><strong style="font-size: 20px; color: var(--amber);">03</strong></div>
                <div style="background: var(--red-bg); padding: 12px; border-radius: 10px; text-align: center;"><div style="font-size: 11px; color: var(--red); font-weight: 700;">Cleaning</div><strong style="font-size: 20px; color: var(--red);">02</strong></div>
              </div>

              <div style="font-size: 11.5px; font-weight: 700; color: var(--br); margin-bottom: 10px; text-transform: uppercase;">Pantry Reconciliation</div>
              <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 8px; text-align: center;">
                <div style="background: var(--bg2); padding: 10px 6px; border-radius: 10px;"><div style="font-size: 10px; color: var(--mute); font-weight: 700;">ITEMS</div><strong>186</strong></div>
                <div style="background: var(--amber-bg); padding: 10px 6px; border-radius: 10px;"><div style="font-size: 10px; color: var(--amber); font-weight: 700;">LOW</div><strong style="color: var(--amber);">28</strong></div>
                <div style="background: var(--red-bg); padding: 10px 6px; border-radius: 10px;"><div style="font-size: 10px; color: var(--red); font-weight: 700;">CRITICAL</div><strong style="color: var(--red);">06</strong></div>
                <div style="background: var(--br-light); padding: 10px 6px; border-radius: 10px;"><div style="font-size: 10px; color: var(--br); font-weight: 700;">PURCHASES</div><strong style="color: var(--br);">&#8377;18.5k</strong></div>
              </div>
            </div>
          </div>

          <!-- Multi-Branch Interactive Summary -->
          <div class="rm-win">
            <div class="rm-win-bar">
              <div class="rm-win-dots"><i></i><i></i><i></i></div>
              <div class="rm-win-ttl">MULTI-BRANCH OVERVIEW</div>
              <div class="rm-filter-group">
                <button type="button" class="rm-filter-btn active" onclick="switchRptBranch('all', this)">All</button>
                <button type="button" class="rm-filter-btn" onclick="switchRptBranch('chennai', this)">Chennai</button>
                <button type="button" class="rm-filter-btn" onclick="switchRptBranch('coimbatore', this)">Coimbatore</button>
                <button type="button" class="rm-filter-btn" onclick="switchRptBranch('salem', this)">Salem</button>
              </div>
            </div>
            <div class="rm-win-body" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 12px; text-align: center;">
              <div style="background: var(--br-light); padding: 14px; border-radius: 12px;"><div style="font-size: 10.5px; color: var(--br); font-weight: 700;">SALES</div><strong id="mbSales" style="font-size: 20px; color: var(--br);">&#8377;1,86,420</strong></div>
              <div style="background: var(--bg2); padding: 14px; border-radius: 12px;"><div style="font-size: 10.5px; color: var(--mute); font-weight: 700;">ORDERS</div><strong id="mbOrders" style="font-size: 20px;">642</strong></div>
              <div style="background: var(--green-bg); padding: 14px; border-radius: 12px;"><div style="font-size: 10.5px; color: var(--green); font-weight: 700;">BRANCHES</div><strong id="mbCount" style="font-size: 20px; color: var(--green);">04</strong></div>
            </div>
          </div>
        </div>

        <!-- Right: Staff Activity + Export Card -->
        <div style="display: flex; flex-direction: column; gap: 20px;">
          <div class="rm-win">
            <div class="rm-win-bar">
              <div class="rm-win-dots"><i></i><i></i><i></i></div>
              <div class="rm-win-ttl">STAFF OPERATIONAL ACTIVITY</div>
            </div>
            <div class="rm-win-body" style="padding: 0;">
              <table class="rm-table">
                <thead><tr><th>Role</th><th>Staff ID</th><th>Activity Log</th></tr></thead>
                <tbody>
                  <tr><td style="font-weight: 700; color: var(--br);">Waiter</td><td><strong>Waiter 01</strong></td><td>42 Orders Served</td></tr>
                  <tr><td style="font-weight: 700; color: var(--br);">Waiter</td><td><strong>Waiter 02</strong></td><td>38 Orders Served</td></tr>
                  <tr><td style="font-weight: 700; color: var(--br);">Cashier</td><td><strong>Cashier 01</strong></td><td>76 Bills Generated</td></tr>
                  <tr><td style="font-weight: 700; color: var(--br);">Store Manager</td><td><strong>Manager</strong></td><td>Operations &amp; Store Audit</td></tr>
                </tbody>
              </table>
            </div>
          </div>

          <div class="rm-win">
            <div class="rm-win-bar">
              <div class="rm-win-dots"><i></i><i></i><i></i></div>
              <div class="rm-win-ttl">EXPORT &amp; SHARING</div>
            </div>
            <div class="rm-win-body" style="text-align: center;">
              <h3 style="margin-bottom: 12px;">Sales &amp; Tax Report &bull; Ready to Export</h3>
              <div style="display: flex; gap: 10px; justify-content: center; flex-wrap: wrap; margin-bottom: 16px;">
                <label style="padding: 8px 16px; border-radius: 10px; border: 1.5px solid var(--br); background: var(--br-light); color: var(--br); font-size: 13px; font-weight: 700; cursor: pointer;"><input type="radio" name="fmt" checked style="accent-color: var(--br);"> PDF Format</label>
                <label style="padding: 8px 16px; border-radius: 10px; border: 1px solid var(--line); background: #fff; font-size: 13px; font-weight: 700; cursor: pointer;"><input type="radio" name="fmt" style="accent-color: var(--br);"> CSV Data</label>
                <label style="padding: 8px 16px; border-radius: 10px; border: 1px solid var(--line); background: #fff; font-size: 13px; font-weight: 700; cursor: pointer;"><input type="radio" name="fmt" style="accent-color: var(--br);"> Excel Sheet</label>
              </div>
              <button type="button" onclick="alert('Demo Mode: Report export simulated successfully.')" class="btn p" style="width: 100%;">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                Export Report
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= 8. BUSINESS BENEFITS (3x2 NUMBERED) ================= -->
  <section class="rpt-sec">
    <div class="w">
      <div class="hd r">
        <div class="eb">OPERATIONAL ADVANTAGES</div>
        <h2>Built for Clearer <span class="sf">Restaurant Visibility.</span></h2>
        <p>Give your management team transparent metrics to operate with confidence.</p>
      </div>

      <div class="rm-ben-grid r">
        <div class="rm-ben-card">
          <div class="rm-ben-head"><div class="rm-ic"><svg viewBox="0 0 24 24"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/></svg></div><span class="rm-num">01</span></div>
          <h4>Sales Visibility</h4>
          <p>Understand restaurant gross and net sales activity across shifts.</p>
        </div>
        <div class="rm-ben-card">
          <div class="rm-ben-head"><div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/></svg></div><span class="rm-num">02</span></div>
          <h4>Order Insights</h4>
          <p>See total order volume breakdown across dine-in, delivery, and takeaway.</p>
        </div>
        <div class="rm-ben-card">
          <div class="rm-ben-head"><div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9"/></svg></div><span class="rm-num">03</span></div>
          <h4>Menu Performance</h4>
          <p>Understand top item order counts and popular menu categories.</p>
        </div>
        <div class="rm-ben-card">
          <div class="rm-ben-head"><div class="rm-ic"><svg viewBox="0 0 24 24"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="M6 8h12M6 12h8"/></svg></div><span class="rm-num">04</span></div>
          <h4>Payment Visibility</h4>
          <p>Review payment transaction summaries across Cash, Card, and UPI.</p>
        </div>
        <div class="rm-ben-card">
          <div class="rm-ben-head"><div class="rm-ic"><svg viewBox="0 0 24 24"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></div><span class="rm-num">05</span></div>
          <h4>Operational Reporting</h4>
          <p>Bring restaurant operational data into one connected reporting view.</p>
        </div>
        <div class="rm-ben-card">
          <div class="rm-ben-head"><div class="rm-ic"><svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/></svg></div><span class="rm-num">06</span></div>
          <h4>Multi-Period Analysis</h4>
          <p>Compare daily, weekly, and monthly reporting views with ease.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= 9. INDUSTRIES (3-COL WITH IMAGE ZOOM) ================= -->
  <section class="rpt-sec alt">
    <div class="w">
      <div class="hd r">
        <div class="eb">TAILORED FOR FOOD BUSINESSES</div>
        <h2>Reports for <span class="sf">Every Food Business.</span></h2>
        <p>Designed for diverse restaurant business models, from fine dining kitchens to multi-outlet cloud kitchens.</p>
      </div>

      <div class="rm-ind-grid r">
        <div class="rm-ind-card"><img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&w=700&q=80" alt="Fine Dining"><div class="rm-ind-scrim"></div><div class="rm-ind-body"><h4>Fine Dining Restaurants</h4><p>Understand sales, order volume, and dining floor activity.</p></div></div>
        <div class="rm-ind-card"><img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?auto=format&fit=crop&w=700&q=80" alt="Casual Dining"><div class="rm-ind-scrim"></div><div class="rm-ind-body"><h4>Casual Dining</h4><p>Analyze peak hours, popular menu items, and revenue channels.</p></div></div>
        <div class="rm-ind-card"><img src="https://images.unsplash.com/photo-1544025162-d76694265947?auto=format&fit=crop&w=700&q=80" alt="Family Restaurants"><div class="rm-ind-scrim"></div><div class="rm-ind-body"><h4>Family Restaurants</h4><p>Track large order receipts, payment modes, and category trends.</p></div></div>
        <div class="rm-ind-card"><img src="https://images.unsplash.com/photo-1618160702438-9b02ab6515c9?auto=format&fit=crop&w=700&q=80" alt="Multi-Cuisine"><div class="rm-ind-scrim"></div><div class="rm-ind-body"><h4>Multi-Cuisine</h4><p>Compare performance across diverse culinary menu sections.</p></div></div>
        <div class="rm-ind-card"><img src="https://images.unsplash.com/photo-1561758033-d89a9ad46330?auto=format&fit=crop&w=700&q=80" alt="QSR"><div class="rm-ind-scrim"></div><div class="rm-ind-body"><h4>QSR / Fast Food</h4><p>Monitor high-volume ticket activity and fast counter billing.</p></div></div>
        <div class="rm-ind-card"><img src="https://images.unsplash.com/photo-1501339847302-ac426a4a7cbb?auto=format&fit=crop&w=700&q=80" alt="Cafes"><div class="rm-ind-scrim"></div><div class="rm-ind-body"><h4>Caf&eacute;s</h4><p>Understand beverage sales patterns and snack item popularity.</p></div></div>
        <div class="rm-ind-card"><img src="https://images.unsplash.com/photo-1509440159596-0249088772ff?auto=format&fit=crop&w=700&q=80" alt="Bakeries"><div class="rm-ind-scrim"></div><div class="rm-ind-body"><h4>Bakeries</h4><p>Track product sales and daily baked item performance.</p></div></div>
        <div class="rm-ind-card"><img src="https://images.unsplash.com/photo-1513104890138-7c749659a591?auto=format&fit=crop&w=700&q=80" alt="Pizzerias"><div class="rm-ind-scrim"></div><div class="rm-ind-body"><h4>Pizzerias</h4><p>Monitor takeout vs dine-in ratios and top pizza size orders.</p></div></div>
        <div class="rm-ind-card"><img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=700&q=80" alt="Hotels"><div class="rm-ind-scrim"></div><div class="rm-ind-body"><h4>Hotels &amp; Resorts</h4><p>Bring restaurant reporting into hospitality dining operations.</p></div></div>
        <div class="rm-ind-card"><img src="https://images.unsplash.com/photo-1552566626-52f8b828add9?auto=format&fit=crop&w=700&q=80" alt="Food Courts"><div class="rm-ind-scrim"></div><div class="rm-ind-body"><h4>Food Courts</h4><p>Track counter sales across fast-paced dining stall locations.</p></div></div>
        <div class="rm-ind-card"><img src="https://images.unsplash.com/photo-1556910103-1c02745aae4d?auto=format&fit=crop&w=700&q=80" alt="Cloud Kitchens"><div class="rm-ind-scrim"></div><div class="rm-ind-body"><h4>Cloud Kitchens</h4><p>Understand incoming delivery orders and sales channel mix.</p></div></div>
        <div class="rm-ind-card"><img src="https://images.unsplash.com/photo-1576867757603-05b134ebc379?auto=format&fit=crop&w=700&q=80" alt="Canteens"><div class="rm-ind-scrim"></div><div class="rm-ind-body"><h4>Canteens</h4><p>Track high-volume meal sales and daily billing summaries.</p></div></div>
      </div>
    </div>
  </section>

  <!-- ================= 10. CONNECTED ECOSYSTEM (7-STEP) ================= -->
  <section class="rpt-sec">
    <div class="w">
      <div class="hd r">
        <div class="eb">INTEGRATED VISIBILITY</div>
        <h2>More Than <span class="sf">a Sales Dashboard.</span></h2>
        <p>Geni Menu brings together data from your menu, tables, orders, kitchen, POS, payments and inventory so restaurant teams can understand their operations from one connected platform.</p>
      </div>

      <div class="rm-eco-grid r">
        <a href="{{ route('features.menu-management') }}" class="rm-eco-card"><span class="rm-eco-step">01</span><img class="rm-eco-img" src="{{ asset('assets/images/workflow/step-1-menu.png') }}" alt="Digital Menu"><span class="rm-eco-lbl">Digital Menu</span></a>
        <a href="{{ route('features.table-management') }}" class="rm-eco-card"><span class="rm-eco-step">02</span><img class="rm-eco-img" src="{{ asset('assets/images/workflow/step-4-table.png') }}" alt="Tables"><span class="rm-eco-lbl">Table &amp; Floor</span></a>
        <a href="{{ route('features.order-management') }}" class="rm-eco-card"><span class="rm-eco-step">03</span><img class="rm-eco-img" src="{{ asset('assets/images/workflow/step-2-order.png') }}" alt="Orders"><span class="rm-eco-lbl">Order Flow</span></a>
        <a href="{{ route('features.kot-management') }}" class="rm-eco-card"><span class="rm-eco-step">04</span><img class="rm-eco-img" src="{{ asset('assets/images/workflow/step-3-kitchen.png') }}" alt="KOT"><span class="rm-eco-lbl">KOT &amp; Kitchen</span></a>
        <a href="{{ route('features.pos-management') }}" class="rm-eco-card"><span class="rm-eco-step">05</span><img class="rm-eco-img" src="{{ asset('assets/images/workflow/step-5-billing.png') }}" alt="POS"><span class="rm-eco-lbl">POS Billing</span></a>
        <a href="{{ route('features.inventory-management') }}" class="rm-eco-card"><span class="rm-eco-step">06</span><img class="rm-eco-img" src="{{ asset('assets/images/workflow/step-6-payment.png') }}" alt="Inventory"><span class="rm-eco-lbl">Inventory</span></a>
        <div class="rm-eco-card active"><span class="rm-eco-step">07</span><img class="rm-eco-img" src="{{ asset('assets/images/workflow/step-7-reports.png') }}" alt="Reports"><span class="rm-eco-lbl">Reports</span></div>
      </div>
    </div>
  </section>

  <!-- ================= 11. FAQ (ALL 14 PRESERVED) ================= -->
  <section class="rpt-sec alt">
    <div class="w">
      <div class="hd r">
        <div class="eb">FREQUENTLY ASKED QUESTIONS</div>
        <h2>Reports &amp; Analytics <span class="sf">FAQ.</span></h2>
        <p>Everything you need to know about understanding sales, orders, and operational metrics in Geni Menu.</p>
      </div>

      <div class="rm-faq-list r">
        <div class="rm-faq-item open"><div class="rm-faq-q" onclick="toggleFaq(this)">1. What types of reports are available in Geni Menu?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div><div class="rm-faq-a">Geni Menu provides comprehensive operational reports covering daily sales, order volume, item popularities, category summaries, payment method breakdowns, and table occupancy activity.</div></div>
        <div class="rm-faq-item"><div class="rm-faq-q" onclick="toggleFaq(this)">2. Can I view daily sales reports?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div><div class="rm-faq-a">Yes. You can review gross sales, applied discounts, collected tax amounts, and net sales totals for any selected day or date range.</div></div>
        <div class="rm-faq-item"><div class="rm-faq-q" onclick="toggleFaq(this)">3. Can I see order reports?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div><div class="rm-faq-a">Yes. Order reports display total completed tickets, average order values, and fulfillment status counts across dine-in, takeaway, delivery, and pickup channels.</div></div>
        <div class="rm-faq-item"><div class="rm-faq-q" onclick="toggleFaq(this)">4. Can I see top-selling menu items?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div><div class="rm-faq-a">Yes. The menu performance section lists top-selling dishes ranked by order quantity and total revenue generated.</div></div>
        <div class="rm-faq-item"><div class="rm-faq-q" onclick="toggleFaq(this)">5. Can I view category performance?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div><div class="rm-faq-a">Yes. You can examine sales figures and order counts grouped by menu categories such as Main Course, Biryani, Pizza, Beverages, and Desserts.</div></div>
        <div class="rm-faq-item"><div class="rm-faq-q" onclick="toggleFaq(this)">6. Can I view payment summaries?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div><div class="rm-faq-a">Yes. Payment reports break down total collections by cash, credit/debit cards, and UPI payment methods.</div></div>
        <div class="rm-faq-item"><div class="rm-faq-q" onclick="toggleFaq(this)">7. Can I filter reports by date?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div><div class="rm-faq-a">Yes. Filter options allow you to switch views between Today, Yesterday, This Week, This Month, or custom date periods.</div></div>
        <div class="rm-faq-item"><div class="rm-faq-q" onclick="toggleFaq(this)">8. Can I filter reports by order type?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div><div class="rm-faq-a">Yes. You can isolate reporting data specifically for Dine-in, Takeaway, Delivery, or Pickup orders.</div></div>
        <div class="rm-faq-item"><div class="rm-faq-q" onclick="toggleFaq(this)">9. Can Reports connect with Inventory Management?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div><div class="rm-faq-a">Yes. Reports presents inventory metrics including total items, low-stock alerts, and store room purchase totals alongside sales figures.</div></div>
        <div class="rm-faq-item"><div class="rm-faq-q" onclick="toggleFaq(this)">10. Can Reports connect with POS?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div><div class="rm-faq-a">Yes. Sales transactions completed at the POS counter populate the central reports dashboard in real time.</div></div>
        <div class="rm-faq-item"><div class="rm-faq-q" onclick="toggleFaq(this)">11. Can I view branch-wise reports?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div><div class="rm-faq-a">Yes. Multi-branch restaurants can compare sales volume and order metrics across different branch locations from one central view.</div></div>
        <div class="rm-faq-item"><div class="rm-faq-q" onclick="toggleFaq(this)">12. Can I export reports?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div><div class="rm-faq-a">Yes. Reports can be exported into standard file formats like PDF, CSV, and Excel for accounting records.</div></div>
        <div class="rm-faq-item"><div class="rm-faq-q" onclick="toggleFaq(this)">13. Can restaurant managers access reports on mobile?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div><div class="rm-faq-a">Yes. The Geni Menu reporting interface is fully responsive, enabling owners to check sales and order stats from smartphones and tablets.</div></div>
        <div class="rm-faq-item"><div class="rm-faq-q" onclick="toggleFaq(this)">14. Is Geni Menu Reports suitable for small restaurants?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div><div class="rm-faq-a">Yes. Geni Menu Reports is clean, intuitive, and designed to provide clear visibility for small caf&eacute;s and food outlets as well as multi-location operations.</div></div>
      </div>
    </div>
  </section>

  <!-- ================= 12. FINAL CTA ================= -->
  <section class="rm-cta">
    <div class="w">
      <div class="eb">READY FOR CLEAR RESTAURANT VISIBILITY?</div>
      <h2>Understand Your Restaurant <span style="font-family: 'Playfair Display', serif; font-style: italic; color: #F5E1C8;">Beyond the Counter.</span></h2>
      <p>Bring sales, orders, payments, menu activity and restaurant operations into one connected reporting experience with Geni Menu.</p>
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
  const els = document.querySelectorAll('.rpt-page .r');
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

// Period Filter Switcher
const rptPeriods = {
  today:     { lbl: 'TODAY', sales: '₹48,620', trend: '↑ +14% vs Yesterday', orders: '186', aov: '₹261', pay: '₹45,280', gross: '₹52,400', disc: '-₹2,100', tax: '+₹2,620', cash: '₹18,400', card: '₹12,800', upi: '₹14,080' },
  yesterday: { lbl: 'YESTERDAY', sales: '₹42,650', trend: '↑ +8% vs Prior Day', orders: '164', aov: '₹260', pay: '₹40,120', gross: '₹46,100', disc: '-₹1,850', tax: '+₹2,300', cash: '₹16,200', card: '₹11,400', upi: '₹12,520' },
  week:      { lbl: 'THIS WEEK', sales: '₹3,18,900', trend: '↑ +19% vs Last Week', orders: '1,214', aov: '₹263', pay: '₹3,04,500', gross: '₹3,42,000', disc: '-₹12,400', tax: '+₹17,100', cash: '₹1,18,000', card: '₹88,500', upi: '₹98,000' },
  month:     { lbl: 'THIS MONTH', sales: '₹13,48,200', trend: '↑ +22% vs Last Month', orders: '5,110', aov: '₹264', pay: '₹12,92,400', gross: '₹14,50,000', disc: '-₹52,800', tax: '+₹72,500', cash: '₹4,95,000', card: '₹3,72,400', upi: '₹4,25,000' }
};
function switchReportPeriod(key, btn) {
  btn.parentElement.querySelectorAll('.rm-filter-btn').forEach(b => b.classList.remove('active'));
  btn.classList.add('active');
  const d = rptPeriods[key] || rptPeriods.today;
  document.getElementById('rptPeriodLbl').textContent = d.lbl;
  document.getElementById('kpiSales').textContent = d.sales;
  document.getElementById('kpiTrend').textContent = d.trend;
  document.getElementById('kpiOrders').textContent = d.orders;
  document.getElementById('kpiAov').textContent = d.aov;
  document.getElementById('kpiPay').textContent = d.pay;
  document.getElementById('revGross').textContent = d.gross;
  document.getElementById('revDisc').textContent = d.disc;
  document.getElementById('revTax').textContent = d.tax;
  document.getElementById('payCash').textContent = d.cash;
  document.getElementById('payCard').textContent = d.card;
  document.getElementById('payUpi').textContent = d.upi;
}

// Multi-Branch Switcher
const rptBranches = {
  all:        { sales: '₹1,86,420', orders: '642', count: '04' },
  chennai:    { sales: '₹68,200',   orders: '238', count: '01' },
  coimbatore: { sales: '₹52,840',   orders: '184', count: '01' },
  salem:      { sales: '₹38,900',   orders: '132', count: '01' }
};
function switchRptBranch(key, btn) {
  btn.parentElement.querySelectorAll('.rm-filter-btn').forEach(b => b.classList.remove('active'));
  btn.classList.add('active');
  const b = rptBranches[key] || rptBranches.all;
  document.getElementById('mbSales').textContent = b.sales;
  document.getElementById('mbOrders').textContent = b.orders;
  document.getElementById('mbCount').textContent = b.count;
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
