@php
$meta = [
    'title' => 'Bars, Pubs & Breweries POS Software | Geni Menu',
    'description' => 'Run every table, every order, and every shift. Manage bar & pub menus, live floor tables, multi-station KOTs, split-bill POS, reservations, stock and daily reports from one connected platform.',
    'keywords' => 'bar POS software, brewery management system, pub billing software, restobar table management, split bill POS, multi-station KOT, Geni Menu',
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
  --red: #B91C1C;
  --red-bg: #FEF2F2;
}

.bb-page * { box-sizing: border-box; }
.bb-page {
  font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
  color: var(--ink);
  background: var(--bg);
  -webkit-font-smoothing: antialiased;
  overflow-x: hidden;
}

.bb-page h1, .bb-page h2, .bb-page h3, .bb-page h4 {
  margin: 0;
  font-family: 'Outfit', 'Plus Jakarta Sans', sans-serif;
  font-weight: 500;
  line-height: 1.14;
  letter-spacing: -0.025em;
  color: var(--ink);
}
.bb-page h1 { font-size: clamp(34px, 4.6vw, 56px); }
.bb-page h2 { font-size: clamp(28px, 3.6vw, 44px); }
.bb-page h3 { font-size: 20px; font-weight: 600; }
.bb-page p { margin: 0; color: var(--mute); font-size: 16px; line-height: 1.65; }
.bb-page a { text-decoration: none; color: inherit; }

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
.bb-sec { padding: clamp(56px, 6.5vw, 92px) 0; background: var(--bg); position: relative; overflow: hidden; }
.bb-sec.alt { background: var(--bg2); }
.bb-sec.border-b { border-bottom: 1px solid var(--line); }

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
.rm-hero-scrim { position: absolute; inset: 0; background: linear-gradient(180deg, rgba(33, 22, 15, 0.12) 0%, rgba(33, 22, 15, 0.04) 45%, rgba(33, 22, 15, 0.64) 100%); pointer-events: none; }
.rm-hero-pill { position: absolute; top: 18px; left: 18px; display: inline-flex; align-items: center; gap: 8px; padding: 8px 14px; border-radius: 99px; background: rgba(255, 255, 255, 0.92); backdrop-filter: blur(10px); font-size: 12px; font-weight: 700; color: var(--ink); box-shadow: 0 6px 20px rgba(0, 0, 0, 0.14); }
.rm-live-dot { width: 8px; height: 8px; border-radius: 50%; background: #16A34A; box-shadow: 0 0 0 3px rgba(22, 163, 74, 0.22); }
.rm-hero-float { position: absolute; left: 18px; right: 18px; bottom: 18px; background: rgba(255, 255, 255, 0.94); backdrop-filter: blur(12px); border: 1px solid rgba(135, 96, 57, 0.2); border-radius: 16px; padding: 14px 18px; display: flex; align-items: center; justify-content: space-between; gap: 14px; box-shadow: 0 12px 30px rgba(33, 22, 15, 0.18); }
.rm-hero-float-left { display: flex; align-items: center; gap: 12px; }
.rm-hero-float-ico { width: 40px; height: 40px; border-radius: 11px; background: var(--br-light); color: var(--br); border: 1px solid rgba(135, 96, 57, 0.2); display: grid; place-items: center; flex: none; }
.rm-hero-float-ico svg { width: 20px; height: 20px; fill: none; stroke: currentColor; stroke-width: 2; }
.rm-hero-float-ttl { font-size: 13.5px; font-weight: 700; color: var(--ink); line-height: 1.25; }
.rm-hero-float-sub { font-size: 12px; color: var(--mute); }
.rm-hero-float-tag { font-size: 11px; font-weight: 700; padding: 5px 11px; border-radius: 99px; background: var(--green-bg); color: var(--green); white-space: nowrap; }

/* Value Strip */
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

/* Window Chrome & Badges */
.rm-win { background: #fff; border: 1px solid var(--line); border-radius: 22px; overflow: hidden; box-shadow: var(--shadow-md); }
.rm-win-bar { display: flex; align-items: center; justify-content: space-between; padding: 13px 20px; background: var(--bg2); border-bottom: 1px solid var(--line); gap: 12px; flex-wrap: wrap; }
.rm-win-dots { display: flex; gap: 6px; }
.rm-win-dots i { width: 10px; height: 10px; border-radius: 50%; display: inline-block; }
.rm-win-dots i:nth-child(1) { background: #ff5f56; }
.rm-win-dots i:nth-child(2) { background: #ffbd2e; }
.rm-win-dots i:nth-child(3) { background: #27c93f; }
.rm-win-ttl { font-family: 'Outfit', sans-serif; font-size: 12px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; color: var(--br); }
.rm-win-body { padding: 24px; }

.bb-badge { font-size: 10.5px; font-weight: 700; padding: 4px 10px; border-radius: 99px; text-transform: uppercase; letter-spacing: .04em; display: inline-block; }
.bb-badge.ready { background: var(--green-bg); color: var(--green); }
.bb-badge.preparing { background: var(--amber-bg); color: var(--amber); }
.bb-badge.soldout { background: var(--red-bg); color: var(--red); }

/* Menu Tabs & Grid */
.bb-tabs { display: flex; gap: 10px; justify-content: center; flex-wrap: wrap; margin-bottom: 28px; }
.bb-tab { padding: 9px 18px; border-radius: 99px; border: 1px solid var(--line); background: #fff; color: var(--mute); font: 700 13.5px 'Plus Jakarta Sans', sans-serif; cursor: pointer; transition: .2s ease; }
.bb-tab.active, .bb-tab:hover { background: var(--br); color: #fff; border-color: var(--br); }
.bb-menu-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; }
.bb-prod-card { display: flex; align-items: center; gap: 16px; padding: 16px; border: 1px solid var(--line); border-radius: 18px; background: #fff; transition: .25s ease; }
.bb-prod-card:hover { border-color: var(--br); box-shadow: var(--shadow-sm); transform: translateY(-2px); }
.bb-prod-img { width: 84px; height: 84px; border-radius: 14px; object-fit: cover; flex-shrink: 0; }
.bb-prod-ctx { flex: 1; }
.bb-prod-ctx h4 { font-size: 16.5px; font-weight: 700; margin-bottom: 4px; }
.bb-prod-ctx p { font-size: 13px; margin-bottom: 8px; line-height: 1.45; }
.bb-prod-ft { display: flex; justify-content: space-between; align-items: center; }

/* Split Layouts */
.bb-split { display: grid; grid-template-columns: 1fr 1fr; gap: 36px; align-items: start; }

/* Tables, Orders & Split-Bill POS */
.bb-table-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px; margin-bottom: 18px; }
.bb-t-card { background: var(--bg2); border: 1.5px solid var(--line); border-radius: 14px; padding: 15px; }
.bb-t-card.occ { border-color: rgba(185, 28, 28, 0.28); background: #fff; }
.bb-t-card.res { border-color: rgba(180, 83, 9, 0.28); background: #fff; }
.bb-t-card.avl { border-color: rgba(21, 128, 61, 0.28); background: #fff; }
.bb-t-top { display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px; }
.bb-t-meta { display: flex; justify-content: space-between; font-size: 12.5px; color: var(--mute); font-weight: 600; }

.bb-step-row { display: grid; grid-template-columns: repeat(5, 1fr); gap: 6px; margin-top: 12px; }
.bb-step-pill { padding: 8px 4px; border-radius: 10px; border: 1px solid var(--line); background: var(--bg2); color: var(--mute); font: 700 11px 'Plus Jakarta Sans', sans-serif; text-align: center; cursor: pointer; }
.bb-step-pill.done { background: var(--br-light); color: var(--br); border-color: var(--br); }

.bb-bill-row { display: flex; justify-content: space-between; align-items: center; padding: 9px 0; border-bottom: 1px dashed var(--line); font-size: 14px; }
.bb-bill-row small { display: block; font-size: 12px; color: var(--mute); }
.bb-bill-total { display: flex; justify-content: space-between; align-items: center; padding: 14px 0 10px; font-family: 'Outfit', sans-serif; font-size: 22px; font-weight: 700; color: var(--br); }
.bb-bill-actions { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-top: 10px; }
.bb-act-btn { padding: 12px; border-radius: 10px; border: 1.5px solid var(--line); background: #fff; color: var(--ink); font: 700 13.5px 'Plus Jakarta Sans', sans-serif; cursor: pointer; transition: .2s ease; }
.bb-act-btn.primary { background: var(--br); color: #fff; border-color: var(--br); }
.bb-bill-note { margin-top: 12px; font-size: 12.5px; font-weight: 700; padding: 10px 12px; border-radius: 10px; text-align: center; display: none; }

/* Rush Counters, Multi-Station Kitchens & Reservations */
.bb-rush-6 { display: grid; grid-template-columns: repeat(6, 1fr); gap: 12px; margin-bottom: 32px; }
.bb-rush-box { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 18px 10px; text-align: center; }
.bb-rush-box strong { display: block; font-family: 'Outfit', sans-serif; font-size: 28px; font-weight: 600; color: var(--br); line-height: 1.15; }
.bb-rush-box span { font-size: 11px; font-weight: 700; color: var(--mute); text-transform: uppercase; }

.bb-station-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px; margin-bottom: 16px; }
.bb-station-card { background: var(--bg2); border: 1px solid var(--line); border-radius: 14px; padding: 14px; }
.bb-station-card h4 { font-size: 13.5px; font-weight: 700; color: var(--br); margin-bottom: 4px; }
.bb-station-card strong { font-family: 'Outfit', sans-serif; font-size: 22px; color: var(--ink); }

.bb-res-row { display: flex; justify-content: space-between; align-items: center; padding: 12px 0; border-bottom: 1px solid var(--line); font-size: 14px; }
.bb-res-row:last-child { border-bottom: none; }
.bb-res-time { font-weight: 700; color: var(--br); width: 86px; }
.bb-res-name { font-weight: 700; flex: 1; }
.bb-res-guests { font-size: 13px; color: var(--mute); font-weight: 600; }

/* Availability, Inventory, Guest History & Branches */
.bb-avail-list { display: flex; flex-direction: column; gap: 8px; }
.bb-avail-row { display: flex; justify-content: space-between; align-items: center; padding: 11px 14px; border-radius: 12px; border: 1px solid var(--line); background: #fff; font-size: 14px; font-weight: 600; cursor: pointer; transition: .2s ease; }
.bb-avail-row.out { background: var(--red-bg); border-color: rgba(185, 28, 28, 0.22); }

.bb-inv-table { width: 100%; border-collapse: collapse; }
.bb-inv-table th { text-align: left; font-size: 11px; font-weight: 700; color: var(--mute); text-transform: uppercase; letter-spacing: .06em; padding: 10px 12px; background: var(--bg2); border-bottom: 1px solid var(--line); }
.bb-inv-table td { padding: 10px 12px; font-size: 13.5px; border-bottom: 1px solid var(--line); }
.bb-inv-table tr:last-child td { border-bottom: none; }

.bb-mini-card { background: var(--bg2); border: 1px solid var(--line); border-radius: 16px; padding: 18px; margin-top: 18px; }
.bb-mini-list { list-style: none; padding: 0; margin: 10px 0 0; font-size: 13.5px; }
.bb-mini-list li { display: flex; justify-content: space-between; padding: 6px 0; border-bottom: 1px dashed var(--line); }
.bb-mini-list li:last-child { border-bottom: none; }

/* Dark Editorial Business Reports Banner */
.rm-dark-banner { background: linear-gradient(135deg, #21160F 0%, #342318 100%); border-radius: 26px; padding: clamp(28px, 4vw, 48px); color: #fff; box-shadow: var(--shadow-lg); position: relative; overflow: hidden; }
.rm-dark-banner::after { content: ''; position: absolute; right: -80px; top: -80px; width: 280px; height: 280px; border-radius: 50%; background: radial-gradient(circle, rgba(184, 142, 86, 0.24) 0%, transparent 70%); pointer-events: none; }
.rm-dark-top { display: flex; justify-content: space-between; align-items: flex-end; gap: 24px; flex-wrap: wrap; margin-bottom: 28px; padding-bottom: 24px; border-bottom: 1px solid rgba(255, 255, 255, 0.12); }
.rm-dark-top h2 { color: #fff; font-size: clamp(26px, 3vw, 36px); }
.rm-dark-top p { color: rgba(255, 255, 255, 0.72); max-width: 520px; margin-top: 8px; }
.rm-dark-kpis { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; margin-bottom: 28px; }
.rm-dark-kpi { background: rgba(255, 255, 255, 0.06); border: 1px solid rgba(255, 255, 255, 0.12); border-radius: 16px; padding: 18px 20px; }
.rm-dark-kpi strong { display: block; font-family: 'Outfit', sans-serif; font-size: 26px; font-weight: 600; color: #F5EFE6; line-height: 1.15; }
.rm-dark-kpi span { font-size: 11.5px; font-weight: 700; color: rgba(255, 255, 255, 0.65); text-transform: uppercase; letter-spacing: .06em; }
.bb-bars { height: 140px; display: grid; grid-template-columns: repeat(5, 1fr); align-items: end; gap: 16px; padding-bottom: 26px; border-bottom: 1px solid rgba(255, 255, 255, 0.16); }
.bb-bar-col { display: flex; flex-direction: column; align-items: center; justify-content: flex-end; height: 100%; position: relative; }
.bb-bar-fill { width: 100%; max-width: 72px; background: linear-gradient(180deg, #e6c594 0%, #876039 100%); border-radius: 8px 8px 0 0; }
.bb-bar-lbl { position: absolute; bottom: -22px; font-size: 11px; font-weight: 600; color: rgba(255, 255, 255, 0.72); }

/* Benefits 3x2 */
.rm-ben-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 22px; }
.rm-ben-card { background: #fff; border: 1px solid var(--line); border-radius: 18px; padding: 26px; transition: .25s ease; }
.rm-ben-card:hover { transform: translateY(-4px); border-color: rgba(135, 96, 57, 0.34); box-shadow: var(--shadow-md); }
.rm-ben-card h3 { font-size: 18px; margin: 16px 0 8px; }
.rm-ben-card p { font-size: 14px; }

/* Photo Cards & Pills */
.rm-ind-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 18px; margin-bottom: 22px; }
.rm-ind-card { position: relative; border-radius: 18px; overflow: hidden; aspect-ratio: 4 / 3; border: 1px solid var(--line); box-shadow: var(--shadow-sm); }
.rm-ind-card img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.55s ease; display: block; }
.rm-ind-card:hover img { transform: scale(1.07); }
.rm-ind-card::after { content: ''; position: absolute; inset: 0; background: linear-gradient(180deg, transparent 35%, rgba(24, 16, 10, 0.84) 100%); }
.rm-ind-cap { position: absolute; left: 16px; right: 16px; bottom: 14px; z-index: 2; color: #fff; }
.rm-ind-cap strong { display: block; font-family: 'Outfit', sans-serif; font-size: 16px; font-weight: 600; }
.rm-ind-cap span { font-size: 12px; color: rgba(255, 255, 255, 0.8); }
.bb-model-pills { display: flex; flex-wrap: wrap; justify-content: center; gap: 10px; }
.bb-model-pill { padding: 9px 16px; border-radius: 99px; background: #fff; border: 1px solid var(--line); font-size: 13px; font-weight: 700; color: var(--ink); }

/* Connected Ecosystem 7-step */
.rm-eco-grid { display: grid; grid-template-columns: repeat(7, 1fr); gap: 12px; }
.rm-eco-card { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 18px 10px; text-align: center; transition: .25s ease; display: flex; flex-direction: column; align-items: center; gap: 8px; }
.rm-eco-card:hover { transform: translateY(-4px); border-color: var(--br); box-shadow: var(--shadow-sm); }
.rm-eco-num { font-family: 'Outfit', sans-serif; font-size: 11px; font-weight: 700; color: var(--br); opacity: 0.7; }
.rm-eco-ico { width: 44px; height: 44px; border-radius: 12px; background: var(--br-light); display: grid; place-items: center; padding: 7px; }
.rm-eco-ico img { width: 100%; height: 100%; object-fit: contain; }
.rm-eco-lbl { font-size: 12px; font-weight: 700; color: var(--ink); line-height: 1.25; }

/* FAQ Accordion */
.rm-faq-list { max-width: 840px; margin: 0 auto; display: flex; flex-direction: column; gap: 12px; }
.rm-faq-item { background: #fff; border: 1px solid var(--line); border-radius: 16px; overflow: hidden; transition: border-color .2s ease, box-shadow .2s ease; }
.rm-faq-item.open { border-color: var(--br); box-shadow: var(--shadow-sm); }
.rm-faq-q { width: 100%; text-align: left; background: none; border: none; padding: 20px 24px; display: flex; align-items: center; justify-content: space-between; gap: 16px; font: 700 16px 'Plus Jakarta Sans', sans-serif; color: var(--ink); cursor: pointer; }
.rm-faq-q svg { width: 20px; height: 20px; color: var(--br); flex-shrink: 0; transition: transform .25s ease; }
.rm-faq-item.open .rm-faq-q svg { transform: rotate(180deg); }
.rm-faq-a { display: none; padding: 0 24px 20px; font-size: 15px; line-height: 1.65; color: var(--mute); }
.rm-faq-item.open .rm-faq-a { display: block; }

/* Final CTA */
.rm-cta { background: linear-gradient(135deg, #876039 0%, #6f4e2d 100%); padding: clamp(64px, 7vw, 96px) 0; text-align: center; color: #fff; }
.rm-cta h2 { color: #fff; margin-bottom: 14px; }
.rm-cta p { color: rgba(255, 255, 255, 0.86); max-width: 620px; margin: 0 auto 30px; font-size: 17px; }
.rm-cta-btns { display: flex; gap: 14px; justify-content: center; flex-wrap: wrap; }
.btn.wht { background: #fff; color: var(--br-dark); border-color: #fff; }
.btn.wht:hover { background: var(--br-light); transform: translateY(-2px); }
.btn.ghost-wht { background: transparent; color: #fff; border-color: rgba(255, 255, 255, 0.55); }
.btn.ghost-wht:hover { background: rgba(255, 255, 255, 0.14); border-color: #fff; transform: translateY(-2px); }

/* Responsive */
@media (max-width: 1024px) {
  .rm-hero-grid, .bb-split { grid-template-columns: 1fr; gap: 36px; }
  .rm-val-grid, .rm-dark-kpis, .rm-ind-grid { grid-template-columns: repeat(2, 1fr); }
  .bb-rush-6 { grid-template-columns: repeat(3, 1fr); }
  .rm-ben-grid { grid-template-columns: repeat(2, 1fr); }
  .rm-eco-grid { grid-template-columns: repeat(4, 1fr); }
}
@media (max-width: 640px) {
  .w { padding: 0 16px; }
  .rm-val-grid, .bb-menu-grid, .bb-table-grid, .bb-station-grid, .bb-rush-6, .rm-dark-kpis, .rm-ben-grid, .rm-ind-grid { grid-template-columns: 1fr; }
  .bb-step-row { grid-template-columns: repeat(2, 1fr); }
  .rm-eco-grid { grid-template-columns: repeat(2, 1fr); }
  .rm-hero-stats { grid-template-columns: 1fr; gap: 12px; }
  .rm-hero-cta .btn, .rm-cta-btns .btn { width: 100%; }
  .rm-hero-float { flex-direction: column; align-items: flex-start; }
}
</style>

<div class="bb-page">
  {{-- BREADCRUMB --}}
  <nav class="bc" aria-label="Breadcrumb">
    <div class="w">
      <a href="{{ url('/') }}">Home</a>
      <span class="sep">/</span>
      <a href="{{ route('solutions') }}">Solutions</a>
      <span class="sep">/</span>
      <span class="cur">Bars &amp; Breweries</span>
    </div>
  </nav>

  {{-- HERO --}}
  <section class="rm-hero">
    <div class="w rm-hero-grid">
      <div>
        <div class="eb">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M8 22h8M12 11v11M12 11a7 7 0 0 0 7-7V2H5v2a7 7 0 0 0 7 7z"/></svg>
          BAR &amp; BREWERY SOLUTION
        </div>
        <h1>Run Every Table. <span class="sf">Every Order.</span> Every Shift.</h1>
        <p class="rm-hero-sub">Manage menus, table service, orders, billing, payments, inventory and daily operations from one connected platform built for modern bars, pubs and breweries.</p>
        <div class="rm-hero-cta">
          <a href="{{ route('restaurant_signup') }}" class="btn p">Get Started →</a>
          <a href="{{ route('contact.us') }}" class="btn o">Book a Demo →</a>
        </div>
        <div class="rm-hero-stats">
          <div class="rm-hero-stat">
            <strong>₹1,84,650</strong>
            <span>Live daily floor sales</span>
          </div>
          <div class="rm-hero-stat">
            <strong>18 Active</strong>
            <span>Occupied tables · 24 open tabs</span>
          </div>
          <div class="rm-hero-stat">
            <strong>4 Stations</strong>
            <span>Main, Grill, Snacks &amp; Dessert</span>
          </div>
        </div>
      </div>

      <div class="rm-hero-media">
        <img src="{{ asset('assets/images/bars-and-breweries-hero.jpg') }}" alt="Craft brewery and lounge bar counter with gleaming brass beer taps, freshly poured craft beers, and tablet POS">
        <div class="rm-hero-scrim"></div>
        <div class="rm-hero-pill">
          <span class="rm-live-dot"></span>
          Live Shift · 18 Active Tables · 11 Kitchen Orders
        </div>
        <div class="rm-hero-float">
          <div class="rm-hero-float-left">
            <div class="rm-hero-float-ico">
              <svg viewBox="0 0 24 24"><path d="M8 22h8M12 11v11M12 11a7 7 0 0 0 7-7V2H5v2a7 7 0 0 0 7 7z"/></svg>
            </div>
            <div>
              <div class="rm-hero-float-ttl">TABLE 08 · Bill #4092 · 4 Guests</div>
              <div class="rm-hero-float-sub">2× Grilled Chicken, Loaded Nachos, 2× Mocktail</div>
            </div>
          </div>
          <span class="rm-hero-float-tag">₹2,171</span>
        </div>
      </div>
    </div>
  </section>

  {{-- VALUE STRIP (01 - 04) --}}
  <section class="bb-sec border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">Built For Bars &amp; Breweries</div>
        <h2>Everything Your Bar Needs. <span class="sf">Connected in One Place.</span></h2>
        <p>From table orders and food service to billing, inventory and business reports, Geni Menu helps bring your bar operations together in one connected platform.</p>
      </div>
      <div class="rm-val-grid">
        <div class="rm-val-card r">
          <div class="rm-val-top">
            <div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg></div>
            <span class="rm-num">01</span>
          </div>
          <h3>Food &amp; Bar Menu</h3>
          <p>Organize bar snacks, mains, beverages and desserts with real-time pricing and availability.</p>
        </div>
        <div class="rm-val-card r">
          <div class="rm-val-top">
            <div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M20 9V7a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v2"/><path d="M2 11h20"/><path d="M4 11v9h16v-9"/></svg></div>
            <span class="rm-num">02</span>
          </div>
          <h3>Live Floor &amp; Reservations</h3>
          <p>Track occupied tables, open tabs, evening guest reservations and party sizes across the floor.</p>
        </div>
        <div class="rm-val-card r">
          <div class="rm-val-top">
            <div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg></div>
            <span class="rm-num">03</span>
          </div>
          <h3>Multi-Station KOTs</h3>
          <p>Route food items seamlessly across Main Kitchen, Grill, Snacks and Dessert stations.</p>
        </div>
        <div class="rm-val-card r">
          <div class="rm-val-top">
            <div class="rm-ic"><svg viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg></div>
            <span class="rm-num">04</span>
          </div>
          <h3>Split-Bill POS &amp; Stock</h3>
          <p>Settle or split group tabs effortlessly while tracking kitchen supplies, guest visits and branch sales.</p>
        </div>
      </div>
    </div>
  </section>

  {{-- MENU MANAGEMENT --}}
  <section class="bb-sec alt border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">Menu Management</div>
        <h2>One Menu. Every Part of <span class="sf">the Experience.</span></h2>
        <p>Organize food, bar snacks, non-alcoholic beverages and desserts into a clean digital menu structure.</p>
      </div>

      <div class="bb-tabs r" id="bbMenuTabs">
        <button type="button" class="bb-tab active" onclick="filterBbMenu('all', this)">All Items</button>
        <button type="button" class="bb-tab" onclick="filterBbMenu('snacks', this)">Bar Snacks</button>
        <button type="button" class="bb-tab" onclick="filterBbMenu('mains', this)">Main Course</button>
        <button type="button" class="bb-tab" onclick="filterBbMenu('beverages', this)">Beverages</button>
        <button type="button" class="bb-tab" onclick="filterBbMenu('all', this)">Desserts</button>
      </div>

      <div class="bb-menu-grid r" id="bbMenuGrid">
        <div class="bb-prod-card" data-cat="snacks">
          <img class="bb-prod-img" src="https://images.unsplash.com/photo-1541592106381-b31e9677c0e5?w=240&q=80" alt="Loaded Fries" referrerpolicy="no-referrer">
          <div class="bb-prod-ctx">
            <h4>Loaded Fries</h4>
            <p>Crispy fries topped with melted cheese, jalapeños and signature sauce.</p>
            <div class="bb-prod-ft"><strong style="color:var(--br);">₹280</strong><span class="bb-badge ready">Available</span></div>
          </div>
        </div>
        <div class="bb-prod-card" data-cat="snacks">
          <img class="bb-prod-img" src="https://images.unsplash.com/photo-1513456852971-30c0b8199d4d?w=240&q=80" alt="Classic Nachos" referrerpolicy="no-referrer">
          <div class="bb-prod-ctx">
            <h4>Classic Nachos</h4>
            <p>Tortilla chips with salsa, sour cream, guacamole and cheese.</p>
            <div class="bb-prod-ft"><strong style="color:var(--br);">₹320</strong><span class="bb-badge ready">Available</span></div>
          </div>
        </div>
        <div class="bb-prod-card" data-cat="mains">
          <img class="bb-prod-img" src="https://images.unsplash.com/photo-1564834724105-918b73d1b9e0?w=240&q=80" alt="Spicy BBQ Wings" referrerpolicy="no-referrer">
          <div class="bb-prod-ctx">
            <h4>Spicy BBQ Wings</h4>
            <p>Chicken wings tossed in our house-made spicy BBQ sauce.</p>
            <div class="bb-prod-ft"><strong style="color:var(--br);">₹380</strong><span class="bb-badge ready">Available</span></div>
          </div>
        </div>
        <div class="bb-prod-card" data-cat="beverages">
          <img class="bb-prod-img" src="https://images.unsplash.com/photo-1513558161293-cdaf765ed2fd?w=240&q=80" alt="Virgin Mojito" referrerpolicy="no-referrer">
          <div class="bb-prod-ctx">
            <h4>Virgin Mojito</h4>
            <p>Classic refreshing mocktail with mint, lime and soda.</p>
            <div class="bb-prod-ft"><strong style="color:var(--br);">₹220</strong><span class="bb-badge ready">Available</span></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- LIVE FLOOR TABLES + TABLE 08 ORDER & SPLIT-BILL POS --}}
  <section class="bb-sec border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">Tables, Orders &amp; POS Billing</div>
        <h2>Know Every Table. <span class="sf">Keep Service Moving.</span></h2>
        <p>Connect orders to specific tables and settle or split group bills cleanly during busy evening hours.</p>
      </div>

      <div class="bb-split">
        {{-- Live Floor + Table 08 Order --}}
        <div class="rm-win r">
          <div class="rm-win-bar">
            <div class="rm-win-dots"><i></i><i></i><i></i></div>
            <div class="rm-win-ttl">Floor Plan &amp; ORDER #5082 · Table 08</div>
            <span class="bb-badge preparing" id="bbOrderBadge">Preparing</span>
          </div>
          <div class="rm-win-body">
            <div class="bb-table-grid">
              <div class="bb-t-card occ"><div class="bb-t-top"><strong>Table 01</strong><span class="bb-badge soldout">Occupied</span></div><div class="bb-t-meta"><span>4 Seats</span><strong style="color:var(--ink);">₹1,840</strong></div></div>
              <div class="bb-t-card avl"><div class="bb-t-top"><strong>Table 02</strong><span class="bb-badge ready">Available</span></div><div class="bb-t-meta"><span>2 Seats</span><span>--</span></div></div>
              <div class="bb-t-card res"><div class="bb-t-top"><strong>Table 03</strong><span class="bb-badge preparing">Reserved</span></div><div class="bb-t-meta"><span>6 Seats</span><strong style="color:var(--ink);">7:30 PM</strong></div></div>
              <div class="bb-t-card occ"><div class="bb-t-top"><strong>Table 04</strong><span class="bb-badge soldout">Occupied</span></div><div class="bb-t-meta"><span>4 Seats</span><strong style="color:var(--ink);">₹3,420</strong></div></div>
            </div>

            <div style="background:var(--bg2); border:1px solid var(--line); border-radius:14px; padding:14px;">
              <div style="display:flex; justify-content:space-between; font-size:13.5px; font-weight:700; margin-bottom:6px;">
                <span>TABLE 08 · 4 Guests (4 Items)</span>
                <span style="color:var(--br);">KOT #3098</span>
              </div>
              <div style="font-size:13px; color:var(--mute);">2× Grilled Chicken · 1× Loaded Nachos · 2× Mocktail · 1× Dessert</div>
              <div class="bb-step-row" id="bbStepRow">
                <button type="button" class="bb-step-pill done" onclick="setBbStep(1)">Order</button>
                <button type="button" class="bb-step-pill done" onclick="setBbStep(2)">KOT</button>
                <button type="button" class="bb-step-pill" onclick="setBbStep(3)">Ready</button>
                <button type="button" class="bb-step-pill" onclick="setBbStep(4)">Serve</button>
                <button type="button" class="bb-step-pill" onclick="setBbStep(5)">Bill</button>
              </div>
            </div>
          </div>
        </div>

        {{-- Interactive Split-Bill POS --}}
        <div class="rm-win r">
          <div class="rm-win-bar">
            <div class="rm-win-dots"><i></i><i></i><i></i></div>
            <div class="rm-win-ttl">TABLE 08 · Bill #4092</div>
            <span class="bb-badge ready">Dine-In Tab</span>
          </div>
          <div class="rm-win-body">
            <div class="bb-bill-row"><div><strong>Grilled Chicken</strong><small>× 2</small></div><strong>₹760</strong></div>
            <div class="bb-bill-row"><div><strong>Loaded Nachos</strong><small>× 1</small></div><strong>₹320</strong></div>
            <div class="bb-bill-row"><div><strong>Mocktail</strong><small>× 2</small></div><strong>₹440</strong></div>
            <div class="bb-bill-row"><div><strong>Dessert</strong><small>× 1</small></div><strong>₹320</strong></div>
            <div class="bb-bill-row" style="color:var(--mute);"><div>Subtotal</div><span>₹1,840</span></div>
            <div class="bb-bill-row" style="color:var(--mute);"><div>Taxes &amp; Charges</div><span>₹331</span></div>
            <div class="bb-bill-total"><span>TOTAL</span><span>₹2,171</span></div>
            <div style="font-size:11.5px; color:var(--mute); text-align:center; margin-bottom:10px;">* Illustrative data. Taxes depend on local configuration.</div>
            <div class="bb-bill-actions">
              <button type="button" class="bb-act-btn" onclick="bbBillAction('split')">Split Bill (4 Guests)</button>
              <button type="button" class="bb-act-btn primary" onclick="bbBillAction('settle')">Settle Payment</button>
            </div>
            <div class="bb-bill-note" id="bbBillNote"></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- PEAK FLOOR METRICS + MULTI-STATION KITCHENS & RESERVATIONS --}}
  <section class="bb-sec alt border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">Peak Shift &amp; Evening Planning</div>
        <h2>Stay in Control When <span class="sf">the Floor Gets Busy.</span></h2>
        <p>Keep front-of-house staff, reservations and multiple kitchen stations synchronized during peak service hours.</p>
      </div>

      <div class="bb-rush-6 r">
        <div class="bb-rush-box"><strong>18</strong><span>Occupied Tables</span></div>
        <div class="bb-rush-box"><strong>24</strong><span>Open Orders</span></div>
        <div class="bb-rush-box"><strong>11</strong><span>Preparing</span></div>
        <div class="bb-rush-box"><strong>7</strong><span>Ready</span></div>
        <div class="bb-rush-box"><strong>9</strong><span>Reservations</span></div>
        <div class="bb-rush-box"><strong style="color:var(--green);">86</strong><span>Completed Bills</span></div>
      </div>

      <div class="bb-split">
        <div class="rm-win r">
          <div class="rm-win-bar">
            <div class="rm-win-dots"><i></i><i></i><i></i></div>
            <div class="rm-win-ttl">Multiple Kitchen Stations</div>
          </div>
          <div class="rm-win-body">
            <div class="bb-station-grid">
              <div class="bb-station-card"><h4>Main Kitchen</h4><strong>12</strong> <span style="font-size:12px; color:var(--mute);">Orders</span></div>
              <div class="bb-station-card"><h4>Grill Station</h4><strong>7</strong> <span style="font-size:12px; color:var(--mute);">Orders</span></div>
              <div class="bb-station-card"><h4>Snacks Station</h4><strong>8</strong> <span style="font-size:12px; color:var(--mute);">Orders</span></div>
              <div class="bb-station-card"><h4>Dessert Station</h4><strong>4</strong> <span style="font-size:12px; color:var(--mute);">Orders</span></div>
            </div>
            <div style="font-size:12.5px; font-weight:700; color:var(--mute); text-align:center;">Order → Station → Preparation → Ready</div>
          </div>
        </div>

        <div class="rm-win r">
          <div class="rm-win-bar">
            <div class="rm-win-dots"><i></i><i></i><i></i></div>
            <div class="rm-win-ttl">Evening Reservations · Plan Ahead</div>
          </div>
          <div class="rm-win-body">
            <div class="bb-res-row"><span class="bb-res-time">7:00 PM</span><span class="bb-res-name">Arun</span><span class="bb-res-guests">4 Guests</span></div>
            <div class="bb-res-row"><span class="bb-res-time">7:30 PM</span><span class="bb-res-name">Priya</span><span class="bb-res-guests">6 Guests</span></div>
            <div class="bb-res-row"><span class="bb-res-time">8:00 PM</span><span class="bb-res-name">Karthik</span><span class="bb-res-guests">2 Guests</span></div>
            <div class="bb-res-row"><span class="bb-res-time">8:30 PM</span><span class="bb-res-name">Meena</span><span class="bb-res-guests">8 Guests</span></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- AVAILABILITY, INVENTORY, GUEST HISTORY & MULTI-BRANCH --}}
  <section class="bb-sec border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">Menu Availability, Stock &amp; Multi-Branch</div>
        <h2>Know What You Have. <span class="sf">Know What Needs Attention.</span></h2>
        <p>Keep your menu current throughout the shift, monitor kitchen supplies, build guest loyalty and view every branch from one dashboard.</p>
      </div>

      <div class="bb-split">
        <div class="rm-win r">
          <div class="rm-win-bar">
            <div class="rm-win-dots"><i></i><i></i><i></i></div>
            <div class="rm-win-ttl">Menu Availability · Tap to Toggle</div>
          </div>
          <div class="rm-win-body">
            <div class="bb-avail-list">
              <div class="bb-avail-row" onclick="toggleBbAvail(this)"><span>Grilled Chicken</span><span class="bb-badge ready">Available</span></div>
              <div class="bb-avail-row" onclick="toggleBbAvail(this)"><span>Loaded Nachos</span><span class="bb-badge ready">Available</span></div>
              <div class="bb-avail-row" onclick="toggleBbAvail(this)"><span>Classic Burger</span><span class="bb-badge ready">Available</span></div>
              <div class="bb-avail-row out" onclick="toggleBbAvail(this)"><span>Cheesecake</span><span class="bb-badge soldout">Sold Out</span></div>
              <div class="bb-avail-row" onclick="toggleBbAvail(this)"><span>Fresh Lime Soda</span><span class="bb-badge ready">Available</span></div>
            </div>

            <div class="bb-mini-card">
              <div style="display:flex; justify-content:space-between; align-items:center;">
                <div><strong style="font-size:15.5px; display:block;">Arun Kumar</strong><span style="font-size:12px; color:var(--mute);">Regular Guest Profile</span></div>
                <div style="text-align:right;"><span style="font-size:10.5px; font-weight:700; color:var(--mute); text-transform:uppercase;">Total Orders</span><strong style="display:block; font-size:18px; color:var(--br);">18</strong></div>
              </div>
              <ul class="bb-mini-list">
                <li><span>Dinner — Table 08</span><strong>4 Guests</strong></li>
                <li><span>Lunch — Table 12</span><strong>2 Guests</strong></li>
                <li><span>Dinner — Table 05</span><strong>6 Guests</strong></li>
              </ul>
            </div>
          </div>
        </div>

        <div class="rm-win r">
          <div class="rm-win-bar">
            <div class="rm-win-dots"><i></i><i></i><i></i></div>
            <div class="rm-win-ttl">Inventory &amp; Multi-Branch View</div>
          </div>
          <div class="rm-win-body">
            <table class="bb-inv-table">
              <thead>
                <tr><th>Item</th><th>Stock</th><th>Status</th></tr>
              </thead>
              <tbody>
                <tr><td><strong>Chicken</strong></td><td>24 kg</td><td><span class="bb-badge ready">In Stock</span></td></tr>
                <tr><td><strong>Cheese</strong></td><td>12 kg</td><td><span class="bb-badge ready">In Stock</span></td></tr>
                <tr><td><strong>Potatoes</strong></td><td>35 kg</td><td><span class="bb-badge ready">In Stock</span></td></tr>
                <tr><td><strong>Fresh Vegetables</strong></td><td>18 kg</td><td><span class="bb-badge ready">In Stock</span></td></tr>
                <tr><td><strong>Cooking Oil</strong></td><td>20 L</td><td><span class="bb-badge ready">In Stock</span></td></tr>
                <tr><td><strong>Sauces</strong></td><td>8 L</td><td><span class="bb-badge soldout">Low</span></td></tr>
                <tr><td><strong>Food Packaging</strong></td><td>400 pcs</td><td><span class="bb-badge ready">In Stock</span></td></tr>
              </tbody>
            </table>

            <div class="bb-mini-card">
              <div style="font-size:11.5px; font-weight:700; text-transform:uppercase; letter-spacing:.06em; color:var(--mute);">All Locations · Today</div>
              <ul class="bb-mini-list">
                <li><span>Tiruchengode</span><strong style="color:var(--br);">₹1,84,650</strong></li>
                <li><span>Namakkal</span><strong style="color:var(--br);">₹1,42,300</strong></li>
                <li><span>Salem</span><strong style="color:var(--br);">₹2,08,450</strong></li>
              </ul>
              <div style="font-size:11px; color:var(--mute); margin-top:8px;">* Multi-branch functionality depends on applicable plan.</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- DARK EDITORIAL BUSINESS REPORTS --}}
  <section class="bb-sec alt border-b">
    <div class="w">
      <div class="rm-dark-banner r">
        <div class="rm-dark-top">
          <div>
            <div class="eb" style="background:rgba(255,255,255,0.1); color:#e6c594; border-color:rgba(230,197,148,0.28);">Business Reports</div>
            <h2>See How Your Business <span class="sf" style="-webkit-text-fill-color:#e6c594;">Is Performing.</span></h2>
            <p>Turn everyday sales, table and order data into clear business insights — at the bar counter or on your mobile phone.</p>
          </div>
          <span class="bb-badge ready" style="background:rgba(22,163,74,0.2); color:#86efac;">● Live Shift Report</span>
        </div>

        <div class="rm-dark-kpis">
          <div class="rm-dark-kpi"><strong>₹1,84,650</strong><span>Today's Sales</span></div>
          <div class="rm-dark-kpi"><strong>126</strong><span>Total Orders</span></div>
          <div class="rm-dark-kpi"><strong>₹1,465</strong><span>Avg Order Value</span></div>
          <div class="rm-dark-kpi"><strong>18</strong><span>Occupied Tables</span></div>
        </div>

        <div class="bb-bars">
          <div class="bb-bar-col"><div class="bb-bar-fill" style="height:90%;"></div><span class="bb-bar-lbl">Starters</span></div>
          <div class="bb-bar-col"><div class="bb-bar-fill" style="height:100%;"></div><span class="bb-bar-lbl">Mains</span></div>
          <div class="bb-bar-col"><div class="bb-bar-fill" style="height:80%;"></div><span class="bb-bar-lbl">Snacks</span></div>
          <div class="bb-bar-col"><div class="bb-bar-fill" style="height:60%;"></div><span class="bb-bar-lbl">Beverages</span></div>
          <div class="bb-bar-col"><div class="bb-bar-fill" style="height:40%;"></div><span class="bb-bar-lbl">Desserts</span></div>
        </div>
        <div style="text-align:center; margin-top:26px; font-size:11.5px; color:rgba(255,255,255,0.48);">* Illustrative demo data shown for category performance.</div>
      </div>
    </div>
  </section>

  {{-- KEY BENEFITS (01 - 06) --}}
  <section class="bb-sec border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">Key Benefits</div>
        <h2>Built Around the Way <span class="sf">Hospitality Businesses Operate.</span></h2>
      </div>
      <div class="rm-ben-grid">
        <div class="rm-ben-card r">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M20 9V7a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v2"/><path d="M2 11h20"/><path d="M4 11v9h16v-9"/></svg></div><span class="rm-num">01</span></div>
          <h3>Table-Centric Operations</h3>
          <p>Connect tables, orders and billing in one workflow.</p>
        </div>
        <div class="rm-ben-card r">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg></div><span class="rm-num">02</span></div>
          <h3>Faster POS &amp; Billing</h3>
          <p>Keep counter and table billing organized.</p>
        </div>
        <div class="rm-ben-card r">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg></div><span class="rm-num">03</span></div>
          <h3>Kitchen Coordination</h3>
          <p>Connect front-of-house orders with kitchen workflows where supported.</p>
        </div>
        <div class="rm-ben-card r">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></div><span class="rm-num">04</span></div>
          <h3>Real-Time Order Visibility</h3>
          <p>Know what is new, preparing, ready or completed.</p>
        </div>
        <div class="rm-ben-card r">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg></div><span class="rm-num">05</span></div>
          <h3>Inventory Visibility</h3>
          <p>Monitor food ingredients and operational supplies.</p>
        </div>
        <div class="rm-ben-card r">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></div><span class="rm-num">06</span></div>
          <h3>Business Insights</h3>
          <p>Understand sales, orders, tables and overall performance.</p>
        </div>
      </div>
    </div>
  </section>

  {{-- BUILT FOR MODERN HOSPITALITY BUSINESSES --}}
  <section class="bb-sec alt border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">Ideal For</div>
        <h2>Built for Modern <span class="sf">Hospitality Businesses.</span></h2>
      </div>
      <div class="rm-ind-grid r">
        <div class="rm-ind-card">
          <img src="https://images.unsplash.com/photo-1514933651103-005eec06c04b?auto=format&fit=crop&w=700&q=80" alt="Craft Breweries & Brewpubs" referrerpolicy="no-referrer">
          <div class="rm-ind-cap"><strong>Breweries &amp; Brewpubs</strong><span>Table tabs, craft food &amp; multi-station KOT</span></div>
        </div>
        <div class="rm-ind-card">
          <img src="https://images.unsplash.com/photo-1572116469696-31de0f17cc34?auto=format&fit=crop&w=700&q=80" alt="Lounge Bars & Restobars" referrerpolicy="no-referrer">
          <div class="rm-ind-cap"><strong>Restobars &amp; Lounge Bars</strong><span>Evening reservations &amp; split billing</span></div>
        </div>
        <div class="rm-ind-card">
          <img src="https://images.unsplash.com/photo-1543007630-9710e4a00a20?auto=format&fit=crop&w=700&q=80" alt="Pubs & Gastro Pubs" referrerpolicy="no-referrer">
          <div class="rm-ind-cap"><strong>Pubs &amp; Gastro Pubs</strong><span>Fast bar snacks, mains &amp; floor sync</span></div>
        </div>
        <div class="rm-ind-card">
          <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&w=700&q=80" alt="Rooftop Dining & Hotel Bars" referrerpolicy="no-referrer">
          <div class="rm-ind-cap"><strong>Rooftop &amp; Hotel Bars</strong><span>Multi-zone seating &amp; branch analytics</span></div>
        </div>
      </div>
      <div class="bb-model-pills r">
        <span class="bb-model-pill">Bars</span>
        <span class="bb-model-pill">Pubs</span>
        <span class="bb-model-pill">Breweries</span>
        <span class="bb-model-pill">Brewpubs</span>
        <span class="bb-model-pill">Restobars</span>
        <span class="bb-model-pill">Lounge Bars</span>
        <span class="bb-model-pill">Sports Bars</span>
        <span class="bb-model-pill">Gastro Pubs</span>
        <span class="bb-model-pill">Rooftop Dining &amp; Bars</span>
        <span class="bb-model-pill">Hotel Bars</span>
        <span class="bb-model-pill">Multi-Outlet Hospitality Businesses</span>
      </div>
    </div>
  </section>

  {{-- CONNECTED ECOSYSTEM (7 MODULES) --}}
  <section class="bb-sec border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">Connected Ecosystem</div>
        <h2>Everything Works Better <span class="sf">Together.</span></h2>
        <p>A seamless experience from arrival and table seating to kitchen prep, split billing and daily reports.</p>
      </div>
      <div class="rm-eco-grid r">
        <a href="{{ route('features.menu-management') }}" class="rm-eco-card">
          <span class="rm-eco-num">01</span>
          <div class="rm-eco-ico"><img src="{{ asset('assets/images/workflow/step-1-menu.png') }}" alt="Digital Menu"></div>
          <span class="rm-eco-lbl">Digital Menu</span>
        </a>
        <a href="{{ route('features.table-management') }}" class="rm-eco-card">
          <span class="rm-eco-num">02</span>
          <div class="rm-eco-ico"><img src="{{ asset('assets/images/workflow/step-4-table.png') }}" alt="Table &amp; Floor"></div>
          <span class="rm-eco-lbl">Table &amp; Floor</span>
        </a>
        <a href="{{ route('features.order-management') }}" class="rm-eco-card">
          <span class="rm-eco-num">03</span>
          <div class="rm-eco-ico"><img src="{{ asset('assets/images/workflow/step-2-order.png') }}" alt="Order Flow"></div>
          <span class="rm-eco-lbl">Order Flow</span>
        </a>
        <a href="{{ route('features.kot-management') }}" class="rm-eco-card">
          <span class="rm-eco-num">04</span>
          <div class="rm-eco-ico"><img src="{{ asset('assets/images/workflow/step-3-kitchen.png') }}" alt="KOT &amp; Kitchen"></div>
          <span class="rm-eco-lbl">KOT &amp; Kitchen</span>
        </a>
        <a href="{{ route('features.pos-management') }}" class="rm-eco-card">
          <span class="rm-eco-num">05</span>
          <div class="rm-eco-ico"><img src="{{ asset('assets/images/workflow/step-5-billing.png') }}" alt="POS Billing"></div>
          <span class="rm-eco-lbl">POS Billing</span>
        </a>
        <a href="{{ route('features.inventory-management') }}" class="rm-eco-card">
          <span class="rm-eco-num">06</span>
          <div class="rm-eco-ico"><img src="{{ asset('assets/images/workflow/step-6-payment.png') }}" alt="Inventory"></div>
          <span class="rm-eco-lbl">Inventory</span>
        </a>
        <a href="{{ route('features.reports') }}" class="rm-eco-card">
          <span class="rm-eco-num">07</span>
          <div class="rm-eco-ico"><img src="{{ asset('assets/images/workflow/step-7-reports.png') }}" alt="Reports"></div>
          <span class="rm-eco-lbl">Reports</span>
        </a>
      </div>
    </div>
  </section>

  {{-- FAQ (ALL 9 ITEMS) --}}
  <section class="bb-sec alt">
    <div class="w">
      <div class="hd r">
        <div class="eb">Frequently Asked Questions</div>
        <h2>Bars &amp; Breweries <span class="sf">FAQ.</span></h2>
      </div>
      <div class="rm-faq-list r">
        <div class="rm-faq-item open">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>1. Can Geni Menu manage bar and pub menus?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">Yes. Geni Menu can help organize food, beverage and other supported menu items with pricing and availability.</div>
        </div>
        <div class="rm-faq-item">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>2. Can I manage tables?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">Yes. Table management can help track table availability, occupancy and service status.</div>
        </div>
        <div class="rm-faq-item">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>3. Can I connect orders to tables?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">Yes. Table-linked order management can connect customer orders with specific tables where supported.</div>
        </div>
        <div class="rm-faq-item">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>4. Can I manage restaurant reservations?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">Yes. Reservation management can help organize guest bookings, party sizes and table allocation.</div>
        </div>
        <div class="rm-faq-item">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>5. Can I manage kitchen orders?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">Yes. Order and KOT workflows can connect front-of-house orders with kitchen operations where supported.</div>
        </div>
        <div class="rm-faq-item">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>6. Can I manage billing?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">Yes. POS and billing functionality supports restaurant transactions and payments.</div>
        </div>
        <div class="rm-faq-item">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>7. Can I manage inventory?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">Yes. Inventory management can help track food ingredients, supplies and stock movement.</div>
        </div>
        <div class="rm-faq-item">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>8. Can I manage multiple branches?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">Multi-branch management is available where supported by the applicable Geni Menu plan.</div>
        </div>
        <div class="rm-faq-item">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>9. Can I view business reports?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">Yes. Supported reports provide visibility into sales, orders, tables and other business metrics.</div>
        </div>
      </div>
    </div>
  </section>

  {{-- FINAL CTA --}}
  <section class="rm-cta">
    <div class="w r">
      <h2>Ready to Run Your Hospitality Business Smarter?</h2>
      <p>Manage menus, tables, reservations, orders, billing, inventory and business insights from one connected platform with Geni Menu.</p>
      <div class="rm-cta-btns">
        <a href="{{ route('restaurant_signup') }}" class="btn wht">Get Started →</a>
        <a href="{{ route('contact.us') }}" class="btn ghost-wht">Book a Demo →</a>
      </div>
    </div>
  </section>
</div>

<script>
function toggleFaq(btn) {
  const item = btn.closest('.rm-faq-item');
  const isOpen = item.classList.contains('open');
  document.querySelectorAll('.rm-faq-item').forEach(el => el.classList.remove('open'));
  if (!isOpen) item.classList.add('open');
}

function filterBbMenu(cat, btn) {
  document.querySelectorAll('#bbMenuTabs .bb-tab').forEach(b => b.classList.remove('active'));
  btn.classList.add('active');
  document.querySelectorAll('#bbMenuGrid .bb-prod-card').forEach(card => {
    card.style.display = (cat === 'all' || card.dataset.cat === cat) ? 'flex' : 'none';
  });
}

function setBbStep(step) {
  document.querySelectorAll('#bbStepRow .bb-step-pill').forEach((b, i) => b.classList.toggle('done', i < step));
  const badge = document.getElementById('bbOrderBadge');
  if (badge) {
    const labels = ['Ordered', 'Preparing', 'Ready', 'Served', 'Billed'];
    badge.textContent = labels[step - 1] || 'Preparing';
    badge.className = step >= 3 ? 'bb-badge ready' : 'bb-badge preparing';
  }
}

function bbBillAction(mode) {
  const note = document.getElementById('bbBillNote');
  if (!note) return;
  note.style.display = 'block';
  if (mode === 'split') {
    note.style.background = 'var(--amber-bg)';
    note.style.color = 'var(--amber)';
    note.textContent = 'Split equally across 4 guests: ₹542.75 per guest.';
  } else {
    note.style.background = 'var(--green-bg)';
    note.style.color = 'var(--green)';
    note.textContent = '✓ Bill #4092 settled (₹2,171) · Table 08 marked Available.';
  }
}

function toggleBbAvail(row) {
  const badge = row.querySelector('.bb-badge');
  const isOut = row.classList.toggle('out');
  badge.className = isOut ? 'bb-badge soldout' : 'bb-badge ready';
  badge.textContent = isOut ? 'Sold Out' : 'Available';
}

document.addEventListener('DOMContentLoaded', function() {
  const els = document.querySelectorAll('.bb-page .r');
  if ('IntersectionObserver' in window) {
    const obs = new IntersectionObserver((entries) => {
      entries.forEach(e => {
        if (e.isIntersecting) {
          e.target.classList.add('on');
          obs.unobserve(e.target);
        }
      });
    }, { threshold: 0.08 });
    els.forEach(el => obs.observe(el));
  } else {
    els.forEach(el => el.classList.add('on'));
  }
});
</script>

@endsection
