@php
$meta = [
    'title' => 'Pizzeria & Specialty Food POS Software | Geni Menu',
    'description' => 'Manage pizzas, burgers, pasta, sandwiches, desserts and specialty food products along with sizes, crusts, toppings, combos, KOTs, tables, billing, inventory and reports from one connected platform.',
    'keywords' => 'pizzeria POS software, pizza shop billing software, pizza topping customization POS, specialty food restaurant POS, pizza KOT system, Geni Menu',
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

.pz-page * { box-sizing: border-box; }
.pz-page {
  font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
  color: var(--ink);
  background: var(--bg);
  -webkit-font-smoothing: antialiased;
  overflow-x: hidden;
}

.pz-page h1, .pz-page h2, .pz-page h3, .pz-page h4 {
  margin: 0;
  font-family: 'Outfit', 'Plus Jakarta Sans', sans-serif;
  font-weight: 500;
  line-height: 1.14;
  letter-spacing: -0.025em;
  color: var(--ink);
}
.pz-page h1 { font-size: clamp(34px, 4.6vw, 56px); }
.pz-page h2 { font-size: clamp(28px, 3.6vw, 44px); }
.pz-page h3 { font-size: 20px; font-weight: 600; }
.pz-page p { margin: 0; color: var(--mute); font-size: 16px; line-height: 1.65; }
.pz-page a { text-decoration: none; color: inherit; }

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
.pz-sec { padding: clamp(56px, 6.5vw, 92px) 0; background: var(--bg); position: relative; overflow: hidden; }
.pz-sec.alt { background: var(--bg2); }
.pz-sec.border-b { border-bottom: 1px solid var(--line); }

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
.rm-hero-scrim { position: absolute; inset: 0; background: linear-gradient(180deg, rgba(33, 22, 15, 0.12) 0%, rgba(33, 22, 15, 0.04) 45%, rgba(33, 22, 15, 0.62) 100%); pointer-events: none; }
.rm-hero-pill { position: absolute; top: 18px; left: 18px; display: inline-flex; align-items: center; gap: 8px; padding: 8px 14px; border-radius: 99px; background: rgba(255, 255, 255, 0.92); backdrop-filter: blur(10px); font-size: 12px; font-weight: 700; color: var(--ink); box-shadow: 0 6px 20px rgba(0, 0, 0, 0.14); }
.rm-live-dot { width: 8px; height: 8px; border-radius: 50%; background: #16A34A; box-shadow: 0 0 0 3px rgba(22, 163, 74, 0.22); }
.rm-hero-float { position: absolute; left: 18px; right: 18px; bottom: 18px; background: rgba(255, 255, 255, 0.94); backdrop-filter: blur(12px); border: 1px solid rgba(135, 96, 57, 0.2); border-radius: 16px; padding: 14px 18px; display: flex; align-items: center; justify-content: space-between; gap: 14px; box-shadow: 0 12px 30px rgba(33, 22, 15, 0.18); }
.rm-hero-float-left { display: flex; align-items: center; gap: 12px; }
.rm-hero-float-ico { width: 40px; height: 40px; border-radius: 11px; background: var(--br-light); color: var(--br); border: 1px solid rgba(135, 96, 57, 0.2); display: grid; place-items: center; flex: none; }
.rm-hero-float-ico svg { width: 20px; height: 20px; fill: none; stroke: currentColor; stroke-width: 2; }
.rm-hero-float-ttl { font-size: 13.5px; font-weight: 700; color: var(--ink); line-height: 1.25; }
.rm-hero-float-sub { font-size: 12px; color: var(--mute); }
.rm-hero-float-tag { font-size: 11px; font-weight: 700; padding: 5px 11px; border-radius: 99px; background: var(--amber-bg); color: var(--amber); white-space: nowrap; }

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

.pz-badge { font-size: 10.5px; font-weight: 700; padding: 4px 10px; border-radius: 99px; text-transform: uppercase; letter-spacing: .04em; display: inline-block; }
.pz-badge.ready { background: var(--green-bg); color: var(--green); }
.pz-badge.preparing { background: var(--amber-bg); color: var(--amber); }
.pz-badge.soldout { background: var(--red-bg); color: var(--red); }

/* Menu Tabs & Grid */
.pz-tabs { display: flex; gap: 10px; justify-content: center; flex-wrap: wrap; margin-bottom: 28px; }
.pz-tab { padding: 9px 18px; border-radius: 99px; border: 1px solid var(--line); background: #fff; color: var(--mute); font: 700 13.5px 'Plus Jakarta Sans', sans-serif; cursor: pointer; transition: .2s ease; }
.pz-tab.active, .pz-tab:hover { background: var(--br); color: #fff; border-color: var(--br); }
.pz-menu-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; margin-bottom: 44px; }
.pz-prod-card { display: flex; align-items: center; gap: 16px; padding: 16px; border: 1px solid var(--line); border-radius: 18px; background: #fff; transition: .25s ease; }
.pz-prod-card:hover { border-color: var(--br); box-shadow: var(--shadow-sm); transform: translateY(-2px); }
.pz-prod-img { width: 88px; height: 88px; border-radius: 14px; object-fit: cover; flex-shrink: 0; }
.pz-prod-ctx { flex: 1; }
.pz-prod-ctx h4 { font-size: 16.5px; font-weight: 700; margin-bottom: 4px; }
.pz-prod-ctx p { font-size: 13px; margin-bottom: 8px; line-height: 1.45; }
.pz-prod-ft { display: flex; justify-content: space-between; align-items: center; }

/* Customizer & Combos */
.pz-split { display: grid; grid-template-columns: 1fr 1fr; gap: 36px; align-items: start; }
.pz-opt-lbl { font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: .07em; color: var(--mute); margin: 14px 0 8px; }
.pz-opt-lbl:first-child { margin-top: 0; }
.pz-opt-row { display: grid; grid-template-columns: repeat(3, 1fr); gap: 8px; }
.pz-opt-btn { padding: 10px 8px; border-radius: 11px; border: 1.5px solid var(--line); background: var(--bg2); color: var(--ink); font: 700 12.5px 'Plus Jakarta Sans', sans-serif; cursor: pointer; text-align: center; transition: .2s ease; }
.pz-opt-btn span { display: block; font-size: 11px; color: var(--mute); font-weight: 600; margin-top: 2px; }
.pz-opt-btn.active { background: var(--br-light); border-color: var(--br); color: var(--br); }
.pz-opt-btn.active span { color: var(--br); }
.pz-custom-total { margin-top: 18px; padding: 14px 16px; border-radius: 14px; background: var(--bg2); border: 1px solid var(--line); display: flex; justify-content: space-between; align-items: center; }
.pz-custom-total strong { font-family: 'Outfit', sans-serif; font-size: 22px; color: var(--br); }

.pz-combo-box { padding: 14px; border: 1.5px dashed rgba(135, 96, 57, 0.35); border-radius: 14px; background: var(--br-light); text-align: center; font-weight: 700; font-size: 15px; color: var(--ink); }
.pz-combo-plus { text-align: center; font-family: 'Outfit', sans-serif; font-size: 18px; font-weight: 700; color: var(--br); margin: 8px 0; }

/* 3-Col POS + Order + KOT */
.pz-trio { display: grid; grid-template-columns: repeat(3, 1fr); gap: 22px; align-items: start; }
.pz-bill-row { display: flex; justify-content: space-between; align-items: center; padding: 9px 0; border-bottom: 1px dashed var(--line); font-size: 13.5px; }
.pz-bill-row small { display: block; font-size: 11.5px; color: var(--mute); }
.pz-bill-total { display: flex; justify-content: space-between; padding: 14px 0 10px; font-family: 'Outfit', sans-serif; font-size: 20px; font-weight: 700; color: var(--br); }
.pz-pay-btn { width: 100%; padding: 12px; border-radius: 10px; background: var(--br); color: #fff; border: none; font: 700 13.5px 'Plus Jakarta Sans', sans-serif; cursor: pointer; transition: .2s ease; }
.pz-pay-btn:hover { background: var(--br-dark); }
.pz-pay-note { margin-top: 10px; font-size: 12px; font-weight: 700; color: var(--green); background: var(--green-bg); padding: 8px 10px; border-radius: 10px; text-align: center; display: none; }

.pz-step-3 { display: grid; grid-template-columns: repeat(3, 1fr); gap: 8px; margin-top: 16px; }
.pz-step-btn { padding: 9px 6px; border-radius: 10px; border: 1px solid var(--line); background: var(--bg2); color: var(--mute); font: 700 11.5px 'Plus Jakarta Sans', sans-serif; cursor: pointer; text-align: center; }
.pz-step-btn.done { background: var(--br-light); border-color: var(--br); color: var(--br); }

.pz-kot-mono { font-family: ui-monospace, SFMono-Regular, Menlo, monospace; font-size: 14px; background: var(--bg2); border: 1px dashed rgba(135, 96, 57, 0.35); border-radius: 12px; padding: 14px; list-style: none; margin: 12px 0 0; }
.pz-kot-mono li { padding: 5px 0; border-bottom: 1px dashed var(--line); }
.pz-kot-mono li:last-child { border-bottom: none; }

/* Service Modes, Rush & Tables */
.pz-sm-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 14px; margin-bottom: 18px; }
.pz-sm-card { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 18px; text-align: center; }
.pz-sm-card h4 { font-size: 15px; font-weight: 700; margin: 10px 0 4px; }
.pz-sm-card p { font-size: 12.5px; }
.pz-rush-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 12px; }
.pz-rush-card { background: #fff; border: 1px solid var(--line); border-radius: 14px; padding: 16px 10px; text-align: center; }
.pz-rush-card strong { display: block; font-family: 'Outfit', sans-serif; font-size: 26px; font-weight: 600; color: var(--br); line-height: 1.15; }
.pz-rush-card span { font-size: 11px; font-weight: 700; color: var(--mute); text-transform: uppercase; }

.pz-table-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px; }
.pz-t-card { background: var(--bg2); border: 1.5px solid var(--line); border-radius: 14px; padding: 16px; }
.pz-t-card.occ { border-color: rgba(185, 28, 28, 0.3); background: #fff; }
.pz-t-card.res { border-color: rgba(180, 83, 9, 0.3); background: #fff; }
.pz-t-card.avl { border-color: rgba(21, 128, 61, 0.3); background: #fff; }
.pz-t-top { display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px; }
.pz-t-meta { display: flex; justify-content: space-between; font-size: 12.5px; color: var(--mute); font-weight: 600; }

/* Availability, Inventory, Customer & Multi-Branch */
.pz-avail-list { display: flex; flex-direction: column; gap: 8px; }
.pz-avail-row { display: flex; justify-content: space-between; align-items: center; padding: 11px 14px; border-radius: 12px; border: 1px solid var(--line); background: #fff; font-size: 14px; font-weight: 600; cursor: pointer; transition: .2s ease; }
.pz-avail-row:hover { border-color: var(--br); }
.pz-avail-row.out { background: var(--red-bg); border-color: rgba(185, 28, 28, 0.22); }

.pz-inv-table { width: 100%; border-collapse: collapse; }
.pz-inv-table th { text-align: left; font-size: 11px; font-weight: 700; color: var(--mute); text-transform: uppercase; letter-spacing: .06em; padding: 10px 12px; background: var(--bg2); border-bottom: 1px solid var(--line); }
.pz-inv-table td { padding: 10px 12px; font-size: 13.5px; border-bottom: 1px solid var(--line); }
.pz-inv-table tr:last-child td { border-bottom: none; }

.pz-mini-card { background: var(--bg2); border: 1px solid var(--line); border-radius: 16px; padding: 18px; margin-top: 18px; }
.pz-mini-list { list-style: none; padding: 0; margin: 10px 0 0; font-size: 13.5px; }
.pz-mini-list li { display: flex; justify-content: space-between; padding: 6px 0; border-bottom: 1px dashed var(--line); }
.pz-mini-list li:last-child { border-bottom: none; }

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
.pz-bars { height: 140px; display: grid; grid-template-columns: repeat(7, 1fr); align-items: end; gap: 14px; padding-bottom: 26px; border-bottom: 1px solid rgba(255, 255, 255, 0.16); }
.pz-bar-col { display: flex; flex-direction: column; align-items: center; justify-content: flex-end; height: 100%; position: relative; }
.pz-bar-fill { width: 100%; max-width: 56px; background: linear-gradient(180deg, #d7ac71 0%, #876039 100%); border-radius: 8px 8px 0 0; }
.pz-bar-lbl { position: absolute; bottom: -22px; font-size: 11px; font-weight: 600; color: rgba(255, 255, 255, 0.72); }

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
.pz-model-pills { display: flex; flex-wrap: wrap; justify-content: center; gap: 10px; }
.pz-model-pill { padding: 9px 16px; border-radius: 99px; background: #fff; border: 1px solid var(--line); font-size: 13px; font-weight: 700; color: var(--ink); }

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
  .rm-hero-grid, .pz-split, .pz-trio { grid-template-columns: 1fr; gap: 32px; }
  .rm-val-grid, .rm-dark-kpis, .rm-ind-grid, .pz-rush-grid { grid-template-columns: repeat(2, 1fr); }
  .rm-ben-grid { grid-template-columns: repeat(2, 1fr); }
  .rm-eco-grid { grid-template-columns: repeat(4, 1fr); }
}
@media (max-width: 640px) {
  .w { padding: 0 16px; }
  .rm-val-grid, .pz-menu-grid, .pz-opt-row, .pz-sm-grid, .pz-table-grid, .pz-rush-grid, .rm-dark-kpis, .rm-ben-grid, .rm-ind-grid { grid-template-columns: 1fr; }
  .rm-eco-grid { grid-template-columns: repeat(2, 1fr); }
  .rm-hero-stats { grid-template-columns: 1fr; gap: 12px; }
  .rm-hero-cta .btn, .rm-cta-btns .btn { width: 100%; }
  .rm-hero-float { flex-direction: column; align-items: flex-start; }
}
</style>

<div class="pz-page">
  {{-- BREADCRUMB --}}
  <nav class="bc" aria-label="Breadcrumb">
    <div class="w">
      <a href="{{ url('/') }}">Home</a>
      <span class="sep">/</span>
      <a href="{{ route('solutions') }}">Solutions</a>
      <span class="sep">/</span>
      <span class="cur">Pizzerias &amp; Specialty Food Shops</span>
    </div>
  </nav>

  {{-- HERO --}}
  <section class="rm-hero">
    <div class="w rm-hero-grid">
      <div>
        <div class="eb">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M15 11h.01"/><path d="M11 15h.01"/><path d="M16 16h.01"/><path d="m2 16 20 6-6-20A20 20 0 0 0 2 16"/></svg>
          PIZZERIA &amp; SPECIALTY FOOD SOLUTION
        </div>
        <h1>Your Specialty Menu. <span class="sf">Your Orders.</span> Your Business.</h1>
        <p class="rm-hero-sub">Manage pizzas, burgers, pasta, sandwiches, desserts and specialty food products, along with orders, billing, customers, inventory and daily operations from one connected platform.</p>
        <div class="rm-hero-cta">
          <a href="{{ route('restaurant_signup') }}" class="btn p">Get Started →</a>
          <a href="{{ route('contact.us') }}" class="btn o">Book a Demo →</a>
        </div>
        <div class="rm-hero-stats">
          <div class="rm-hero-stat">
            <strong>₹86,450</strong>
            <span>Live daily shop sales</span>
          </div>
          <div class="rm-hero-stat">
            <strong>18 Active</strong>
            <span>9 Preparing · 6 Ready</span>
          </div>
          <div class="rm-hero-stat">
            <strong>Margherita</strong>
            <span>Top-selling signature item</span>
          </div>
        </div>
      </div>

      <div class="rm-hero-media">
        <img src="{{ asset('assets/images/pizzerias-hero.jpg') }}" alt="Artisan pizzeria counter with freshly baked Margherita pizza, kraft box, and mounted tablet POS">
        <div class="rm-hero-scrim"></div>
        <div class="rm-hero-pill">
          <span class="rm-live-dot"></span>
          Live · 18 Active Orders · Oven Queue Synced
        </div>
        <div class="rm-hero-float">
          <div class="rm-hero-float-left">
            <div class="rm-hero-float-ico">
              <svg viewBox="0 0 24 24"><path d="M15 11h.01"/><path d="M11 15h.01"/><path d="m2 16 20 6-6-20A20 20 0 0 0 2 16"/></svg>
            </div>
            <div>
              <div class="rm-hero-float-ttl">ORDER #4068 · Takeaway · Priya</div>
              <div class="rm-hero-float-sub">1× Large Farmhouse Pizza, 1× Garlic Bread, 2× Cold Coffee</div>
            </div>
          </div>
          <span class="rm-hero-float-tag">KOT #3056</span>
        </div>
      </div>
    </div>
  </section>

  {{-- VALUE STRIP (01 - 04) --}}
  <section class="pz-sec border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">Built for Specialty Food Businesses</div>
        <h2>Everything Your Specialty Food <span class="sf">Business Needs.</span></h2>
        <p>Manage your products, customer orders, billing, kitchen workflow, inventory and business reports from one connected platform.</p>
      </div>
      <div class="rm-val-grid">
        <div class="rm-val-card r">
          <div class="rm-val-top">
            <div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M15 11h.01"/><path d="M11 15h.01"/><path d="m2 16 20 6-6-20A20 20 0 0 0 2 16"/></svg></div>
            <span class="rm-num">01</span>
          </div>
          <h3>Signature Menu &amp; Options</h3>
          <p>Organize pizzas, burgers, pasta, sizes, crusts, toppings and add-ons with crisp images and live availability.</p>
        </div>
        <div class="rm-val-card r">
          <div class="rm-val-top">
            <div class="rm-ic"><svg viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg></div>
            <span class="rm-num">02</span>
          </div>
          <h3>Combos &amp; Counter POS</h3>
          <p>Build high-value pizza combos and process dine-in, takeaway and pickup bills without queue delays.</p>
        </div>
        <div class="rm-val-card r">
          <div class="rm-val-top">
            <div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg></div>
            <span class="rm-num">03</span>
          </div>
          <h3>KOT &amp; Table Sync</h3>
          <p>Connect every custom pizza order directly to the oven station and keep seated dining tables organized.</p>
        </div>
        <div class="rm-val-card r">
          <div class="rm-val-top">
            <div class="rm-ic"><svg viewBox="0 0 24 24"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></div>
            <span class="rm-num">04</span>
          </div>
          <h3>Stock &amp; Multi-Outlet Reports</h3>
          <p>Track pizza flour, mozzarella, sauces, boxes, repeat customers and branch-wise daily sales performance.</p>
        </div>
      </div>
    </div>
  </section>

  {{-- SIGNATURE MENU + INTERACTIVE CUSTOMIZER & COMBOS --}}
  <section class="pz-sec alt border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">Menu &amp; Product Customization</div>
        <h2>Put Your Signature Products <span class="sf">at the Centre.</span></h2>
        <p>Create a structured digital catalogue around the products your customers come back for — with sizes, crusts, toppings and value combos.</p>
      </div>

      <div class="pz-tabs r" id="pzMenuTabs">
        <button type="button" class="pz-tab active" onclick="filterPzMenu('all', this)">All Items</button>
        <button type="button" class="pz-tab" onclick="filterPzMenu('pizza', this)">Pizza</button>
        <button type="button" class="pz-tab" onclick="filterPzMenu('burger', this)">Burgers</button>
        <button type="button" class="pz-tab" onclick="filterPzMenu('pasta', this)">Pasta</button>
        <button type="button" class="pz-tab" onclick="filterPzMenu('all', this)">Sandwiches &amp; Wraps</button>
        <button type="button" class="pz-tab" onclick="filterPzMenu('all', this)">Sides &amp; Desserts</button>
      </div>

      <div class="pz-menu-grid r" id="pzMenuGrid">
        <div class="pz-prod-card" data-cat="pizza">
          <img class="pz-prod-img" src="https://images.unsplash.com/photo-1574071318508-1cdbab80d002?w=240&q=80" alt="Margherita Pizza" referrerpolicy="no-referrer">
          <div class="pz-prod-ctx">
            <h4>Margherita Pizza</h4>
            <p>Classic delight with 100% real mozzarella cheese and signature tomato sauce.</p>
            <div class="pz-prod-ft">
              <strong style="color:var(--br);">From ₹299</strong>
              <span class="pz-badge ready">Available</span>
            </div>
          </div>
        </div>
        <div class="pz-prod-card" data-cat="pizza">
          <img class="pz-prod-img" src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?w=240&q=80" alt="Farmhouse Pizza" referrerpolicy="no-referrer">
          <div class="pz-prod-ctx">
            <h4>Farmhouse Pizza</h4>
            <p>Loaded with fresh mushrooms, onions, crisp capsicum, and sliced tomatoes.</p>
            <div class="pz-prod-ft">
              <strong style="color:var(--br);">From ₹399</strong>
              <span class="pz-badge ready">Available</span>
            </div>
          </div>
        </div>
        <div class="pz-prod-card" data-cat="burger">
          <img class="pz-prod-img" src="https://images.unsplash.com/photo-1568901346375-23c9450c58cd?w=240&q=80" alt="Signature Chicken Burger" referrerpolicy="no-referrer">
          <div class="pz-prod-ctx">
            <h4>Signature Chicken Burger</h4>
            <p>Juicy chicken patty, fresh lettuce, tomatoes, and our special sauce.</p>
            <div class="pz-prod-ft">
              <strong style="color:var(--br);">₹249</strong>
              <span class="pz-badge ready">Available</span>
            </div>
          </div>
        </div>
        <div class="pz-prod-card" data-cat="pasta">
          <img class="pz-prod-img" src="https://images.unsplash.com/photo-1473093295043-cdd812d0e601?w=240&q=80" alt="Creamy Alfredo Pasta" referrerpolicy="no-referrer">
          <div class="pz-prod-ctx">
            <h4>Creamy Alfredo Pasta</h4>
            <p>Rich and creamy white sauce pasta with bell peppers and olives.</p>
            <div class="pz-prod-ft">
              <strong style="color:var(--br);">₹349</strong>
              <span class="pz-badge ready">Available</span>
            </div>
          </div>
        </div>
      </div>

      {{-- Interactive Customizer + Combo Builder --}}
      <div class="pz-split">
        <div class="rm-win r">
          <div class="rm-win-bar">
            <div class="rm-win-dots"><i></i><i></i><i></i></div>
            <div class="rm-win-ttl">Margherita Pizza · Interactive Builder</div>
          </div>
          <div class="rm-win-body">
            <div class="pz-opt-lbl">1. Select Size</div>
            <div class="pz-opt-row" id="pzSizeRow">
              <button type="button" class="pz-opt-btn" data-price="299" onclick="pickPzSize(this)">Regular<span>₹299</span></button>
              <button type="button" class="pz-opt-btn active" data-price="449" onclick="pickPzSize(this)">Medium<span>₹449</span></button>
              <button type="button" class="pz-opt-btn" data-price="599" onclick="pickPzSize(this)">Large<span>₹599</span></button>
            </div>

            <div class="pz-opt-lbl">2. Select Crust</div>
            <div class="pz-opt-row" id="pzCrustRow">
              <button type="button" class="pz-opt-btn active" data-price="0" onclick="pickPzCrust(this)">Classic Hand Tossed<span>Included</span></button>
              <button type="button" class="pz-opt-btn" data-price="0" onclick="pickPzCrust(this)">Thin Crust<span>Included</span></button>
              <button type="button" class="pz-opt-btn" data-price="80" onclick="pickPzCrust(this)">Cheese Burst<span>+₹80</span></button>
            </div>

            <div class="pz-opt-lbl">3. Toppings &amp; Add-ons (Multi-select)</div>
            <div class="pz-opt-row" id="pzAddonRow">
              <button type="button" class="pz-opt-btn" data-price="60" onclick="togglePzAddon(this)">Extra Cheese<span>+₹60</span></button>
              <button type="button" class="pz-opt-btn" data-price="40" onclick="togglePzAddon(this)">Jalapeño<span>+₹40</span></button>
              <button type="button" class="pz-opt-btn" data-price="149" onclick="togglePzAddon(this)">Garlic Bread<span>+₹149</span></button>
            </div>

            <div class="pz-custom-total">
              <div>
                <div style="font-size:12px; font-weight:700; color:var(--mute);">LIVE CUSTOMIZED PRICE</div>
                <div style="font-size:12.5px; color:var(--ink);" id="pzCustomSummary">Medium · Classic Hand Tossed</div>
              </div>
              <strong id="pzCustomTotal">₹449</strong>
            </div>
            <div style="font-size:11.5px; color:var(--mute); margin-top:10px; text-align:center;">* Illustrative customization options.</div>
          </div>
        </div>

        <div class="rm-win r">
          <div class="rm-win-bar">
            <div class="rm-win-dots"><i></i><i></i><i></i></div>
            <div class="rm-win-ttl">Special Offers · Pizza Combo</div>
            <span class="pz-badge ready">₹699</span>
          </div>
          <div class="rm-win-body">
            <h3 style="margin-bottom:8px;">Build Better Combos Around Your Best Sellers.</h3>
            <p style="font-size:14px; margin-bottom:18px;">Merchandise attractive combos to increase average order value across dine-in and takeaway.</p>
            <div class="pz-combo-box">1 Medium Pizza</div>
            <div class="pz-combo-plus">+</div>
            <div class="pz-combo-box">1 Garlic Bread</div>
            <div class="pz-combo-plus">+</div>
            <div class="pz-combo-box">2 Beverages</div>
            <div style="font-size:11.5px; color:var(--mute); margin-top:16px; text-align:center;">* Combos and discounts depend on product support.</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- SYNCHRONIZED POS + ORDER + KOT --}}
  <section class="pz-sec border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">Counter, Orders &amp; Oven Sync</div>
        <h2>Every Order. Clear From <span class="sf">Start to Finish.</span></h2>
        <p>Keep your billing counter, kitchen oven and order dispatch perfectly synchronized.</p>
      </div>

      <div class="pz-trio r">
        {{-- POS --}}
        <div class="rm-win">
          <div class="rm-win-bar">
            <div class="rm-win-dots"><i></i><i></i><i></i></div>
            <div class="rm-win-ttl">Counter POS · Bill #5092</div>
          </div>
          <div class="rm-win-body">
            <div class="pz-bill-row"><div><strong>Margherita Pizza</strong><small>Medium | Classic</small></div><strong>₹449</strong></div>
            <div class="pz-bill-row"><div><strong>Garlic Bread</strong><small>× 1</small></div><strong>₹149</strong></div>
            <div class="pz-bill-row"><div><strong>Cold Coffee</strong><small>× 2</small></div><strong>₹240</strong></div>
            <div class="pz-bill-row"><div><strong>Brownie</strong><small>× 1</small></div><strong>₹120</strong></div>
            <div class="pz-bill-total"><span>TOTAL</span><span>₹958</span></div>
            <button type="button" class="pz-pay-btn" onclick="pzPayPrint()">Pay &amp; Print</button>
            <div class="pz-pay-note" id="pzPayNote">✓ Bill #5092 settled (₹958) · KOT #3056 fired!</div>
          </div>
        </div>

        {{-- Order --}}
        <div class="rm-win">
          <div class="rm-win-bar">
            <div class="rm-win-dots"><i></i><i></i><i></i></div>
            <div class="rm-win-ttl">ORDER #4068 · Takeaway</div>
            <span class="pz-badge preparing" id="pzOrderBadge">Preparing</span>
          </div>
          <div class="rm-win-body">
            <div style="font-size:13px; color:var(--mute); margin-bottom:12px;">Customer: <strong style="color:var(--ink);">Priya</strong></div>
            <ul style="list-style:none; padding:0; margin:0; font-size:14px;">
              <li style="padding:6px 0; border-bottom:1px dashed var(--line);">1 × Large Farmhouse Pizza</li>
              <li style="padding:6px 0; border-bottom:1px dashed var(--line);">1 × Garlic Bread</li>
              <li style="padding:6px 0;">2 × Cold Coffee</li>
            </ul>
            <div class="pz-step-3" id="pzStepRow">
              <button type="button" class="pz-step-btn done" onclick="setPzStep(1)">1. New</button>
              <button type="button" class="pz-step-btn done" onclick="setPzStep(2)">2. KOT</button>
              <button type="button" class="pz-step-btn" onclick="setPzStep(3)">3. Ready</button>
            </div>
          </div>
        </div>

        {{-- KOT --}}
        <div class="rm-win">
          <div class="rm-win-bar">
            <div class="rm-win-dots"><i></i><i></i><i></i></div>
            <div class="rm-win-ttl">KOT #3056</div>
            <span class="pz-badge preparing">Oven Station</span>
          </div>
          <div class="rm-win-body">
            <div style="font-weight:700; font-size:14px;">ORDER #4068</div>
            <ul class="pz-kot-mono">
              <li>[1] Lrg Farmhouse Pz</li>
              <li>[1] Garlic Bread</li>
            </ul>
            <div style="font-size:11.5px; color:var(--mute); text-align:center; margin-top:16px;">* KOT workflow where supported.</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- SERVICE MODES, RUSH HOURS & TABLES --}}
  <section class="pz-sec alt border-b">
    <div class="w pz-split">
      <div class="r">
        <div class="eb">Service Modes &amp; Peak Rush</div>
        <h2>One Order Flow. <span class="sf">Multiple Ways to Serve.</span></h2>
        <p style="margin:12px 0 22px;">Manage high order volumes easily across dine-in, takeaway and pickup — whether it's lunch hour, evening snacks, or weekend dinner time.</p>

        <div class="pz-sm-grid">
          <div class="pz-sm-card">
            <div class="rm-ic" style="margin:0 auto;"><svg viewBox="0 0 24 24"><path d="M18 8h1a4 4 0 0 1 0 8h-1"/><path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"/></svg></div>
            <h4>Dine-In</h4>
            <p>Connect tables, orders &amp; billing.</p>
          </div>
          <div class="pz-sm-card">
            <div class="rm-ic" style="margin:0 auto;"><svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/></svg></div>
            <h4>Takeaway</h4>
            <p>Organized from creation to pickup.</p>
          </div>
          <div class="pz-sm-card">
            <div class="rm-ic" style="margin:0 auto;"><svg viewBox="0 0 24 24"><circle cx="5.5" cy="17.5" r="3.5"/><circle cx="18.5" cy="17.5" r="3.5"/><path d="M15 6a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-3 11.5V14l-3-3 4-3 2 3h2"/></svg></div>
            <h4>Pickup</h4>
            <p>Track until ready for collection.</p>
          </div>
        </div>

        <div class="pz-rush-grid">
          <div class="pz-rush-card"><strong>18</strong><span>New</span></div>
          <div class="pz-rush-card"><strong>9</strong><span>Preparing</span></div>
          <div class="pz-rush-card"><strong>6</strong><span>Ready</span></div>
          <div class="pz-rush-card"><strong style="color:var(--green);">74</strong><span>Completed</span></div>
        </div>
      </div>

      <div class="rm-win r">
        <div class="rm-win-bar">
          <div class="rm-win-dots"><i></i><i></i><i></i></div>
          <div class="rm-win-ttl">Table Management · Dine-In Floor</div>
        </div>
        <div class="rm-win-body">
          <div class="pz-table-grid">
            <div class="pz-t-card avl">
              <div class="pz-t-top"><strong>Table 01</strong><span class="pz-badge ready">Available</span></div>
              <div class="pz-t-meta"><span>2 Seats</span><span>--</span></div>
            </div>
            <div class="pz-t-card occ">
              <div class="pz-t-top"><strong>Table 02</strong><span class="pz-badge soldout">Occupied</span></div>
              <div class="pz-t-meta"><span>4 Seats</span><strong style="color:var(--ink);">₹958</strong></div>
            </div>
            <div class="pz-t-card res">
              <div class="pz-t-top"><strong>Table 03</strong><span class="pz-badge preparing">Reserved</span></div>
              <div class="pz-t-meta"><span>6 Seats</span><strong style="color:var(--ink);">7:30 PM</strong></div>
            </div>
            <div class="pz-t-card occ">
              <div class="pz-t-top"><strong>Table 04</strong><span class="pz-badge soldout">Occupied</span></div>
              <div class="pz-t-meta"><span>4 Seats</span><strong style="color:var(--ink);">₹1,420</strong></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- AVAILABILITY, INVENTORY, CUSTOMER & MULTI-BRANCH --}}
  <section class="pz-sec border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">Availability, Stock &amp; Multi-Outlet</div>
        <h2>Know What Goes Into <span class="sf">Every Order.</span></h2>
        <p>Keep signature items updated in real time, monitor pizza ingredients and boxes, know repeat customers and track multi-branch sales.</p>
      </div>

      <div class="pz-split">
        <div class="rm-win r">
          <div class="rm-win-bar">
            <div class="rm-win-dots"><i></i><i></i><i></i></div>
            <div class="rm-win-ttl">Menu Availability · Tap to Toggle</div>
          </div>
          <div class="rm-win-body">
            <div class="pz-avail-list">
              <div class="pz-avail-row" onclick="togglePzAvail(this)"><span>Margherita Pizza</span><span class="pz-badge ready">Available</span></div>
              <div class="pz-avail-row" onclick="togglePzAvail(this)"><span>Farmhouse Pizza</span><span class="pz-badge ready">Available</span></div>
              <div class="pz-avail-row" onclick="togglePzAvail(this)"><span>Garlic Bread</span><span class="pz-badge ready">Available</span></div>
              <div class="pz-avail-row out" onclick="togglePzAvail(this)"><span>Cheesecake</span><span class="pz-badge soldout">Sold Out</span></div>
              <div class="pz-avail-row" onclick="togglePzAvail(this)"><span>Chicken Wings</span><span class="pz-badge ready">Available</span></div>
              <div class="pz-avail-row" onclick="togglePzAvail(this)"><span>Cold Coffee</span><span class="pz-badge ready">Available</span></div>
            </div>

            <div class="pz-mini-card">
              <div style="display:flex; justify-content:space-between; align-items:center;">
                <div><strong style="font-size:15.5px; display:block;">Priya Kumar</strong><span style="font-size:12px; color:var(--mute);">Recent Customer Activity</span></div>
                <div style="text-align:right;"><span style="font-size:10.5px; font-weight:700; color:var(--mute); text-transform:uppercase;">Total Orders</span><strong style="display:block; font-size:18px; color:var(--br);">14</strong></div>
              </div>
              <ul class="pz-mini-list">
                <li><span>Farmhouse Pizza</span><strong>Favourite</strong></li>
                <li><span>Garlic Bread</span><strong>Ordered 9×</strong></li>
                <li><span>Brownie</span><strong>Ordered 5×</strong></li>
              </ul>
            </div>
          </div>
        </div>

        <div class="rm-win r">
          <div class="rm-win-bar">
            <div class="rm-win-dots"><i></i><i></i><i></i></div>
            <div class="rm-win-ttl">Ingredients Inventory &amp; Branches</div>
          </div>
          <div class="rm-win-body">
            <table class="pz-inv-table">
              <thead>
                <tr><th>Ingredient</th><th>Stock</th><th>Status</th></tr>
              </thead>
              <tbody>
                <tr><td><strong>Pizza Flour</strong></td><td>45 kg</td><td><span class="pz-badge ready">In Stock</span></td></tr>
                <tr><td><strong>Mozzarella</strong></td><td>18 kg</td><td><span class="pz-badge ready">In Stock</span></td></tr>
                <tr><td><strong>Tomato Sauce</strong></td><td>22 L</td><td><span class="pz-badge ready">In Stock</span></td></tr>
                <tr><td><strong>Chicken</strong></td><td>25 kg</td><td><span class="pz-badge ready">In Stock</span></td></tr>
                <tr><td><strong>Pizza Boxes</strong></td><td>350 pcs</td><td><span class="pz-badge ready">In Stock</span></td></tr>
                <tr><td><strong>Dips</strong></td><td>6 L</td><td><span class="pz-badge soldout">Low</span></td></tr>
              </tbody>
            </table>

            <div class="pz-mini-card">
              <div style="font-size:11.5px; font-weight:700; text-transform:uppercase; letter-spacing:.06em; color:var(--mute);">Multi-Branch Daily Sales</div>
              <ul class="pz-mini-list">
                <li><span>Tiruchengode</span><strong style="color:var(--br);">₹86,450</strong></li>
                <li><span>Namakkal</span><strong style="color:var(--br);">₹74,280</strong></li>
                <li><span>Salem</span><strong style="color:var(--br);">₹1,08,650</strong></li>
              </ul>
              <div style="font-size:11px; color:var(--mute); margin-top:8px;">* Multi-branch capabilities depend on applicable plan.</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- DARK EDITORIAL BUSINESS REPORTS --}}
  <section class="pz-sec alt border-b">
    <div class="w">
      <div class="rm-dark-banner r">
        <div class="rm-dark-top">
          <div>
            <div class="eb" style="background:rgba(255,255,255,0.1); color:#e6c594; border-color:rgba(230,197,148,0.28);">Business Reports</div>
            <h2>Turn Everyday Sales Into <span class="sf" style="-webkit-text-fill-color:#e6c594;">Better Decisions.</span></h2>
            <p>Understand your best sellers, order volume, average ticket size and weekly sales trends from your dashboard or smartphone.</p>
          </div>
          <span class="pz-badge ready" style="background:rgba(22,163,74,0.2); color:#86efac;">● Live Shop Analytics</span>
        </div>

        <div class="rm-dark-kpis">
          <div class="rm-dark-kpi"><strong>₹86,450</strong><span>Today's Sales</span></div>
          <div class="rm-dark-kpi"><strong>94</strong><span>Total Orders</span></div>
          <div class="rm-dark-kpi"><strong>₹920</strong><span>Avg Order Value</span></div>
          <div class="rm-dark-kpi"><strong>Margherita</strong><span>Best Seller</span></div>
        </div>

        <div class="pz-bars">
          <div class="pz-bar-col"><div class="pz-bar-fill" style="height:40%;"></div><span class="pz-bar-lbl">Mon</span></div>
          <div class="pz-bar-col"><div class="pz-bar-fill" style="height:60%;"></div><span class="pz-bar-lbl">Tue</span></div>
          <div class="pz-bar-col"><div class="pz-bar-fill" style="height:85%;"></div><span class="pz-bar-lbl">Wed</span></div>
          <div class="pz-bar-col"><div class="pz-bar-fill" style="height:100%;"></div><span class="pz-bar-lbl">Thu</span></div>
          <div class="pz-bar-col"><div class="pz-bar-fill" style="height:70%;"></div><span class="pz-bar-lbl">Fri</span></div>
          <div class="pz-bar-col"><div class="pz-bar-fill" style="height:50%;"></div><span class="pz-bar-lbl">Sat</span></div>
          <div class="pz-bar-col"><div class="pz-bar-fill" style="height:90%;"></div><span class="pz-bar-lbl">Sun</span></div>
        </div>
        <div style="text-align:center; margin-top:26px; font-size:11.5px; color:rgba(255,255,255,0.48);">* Illustrative demo data shown for weekly sales trend.</div>
      </div>
    </div>
  </section>

  {{-- KEY BENEFITS (01 - 06) --}}
  <section class="pz-sec border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">Key Benefits</div>
        <h2>Built for Businesses With a <span class="sf">Signature Menu.</span></h2>
      </div>
      <div class="rm-ben-grid">
        <div class="rm-ben-card r">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><line x1="3" y1="9" x2="21" y2="9"/></svg></div><span class="rm-num">01</span></div>
          <h3>Flexible Product Management</h3>
          <p>Organize your signature products, categories and availability.</p>
        </div>
        <div class="rm-ben-card r">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4"/></svg></div><span class="rm-num">02</span></div>
          <h3>Product Variations</h3>
          <p>Manage sizes, toppings, add-ons and other options where supported.</p>
        </div>
        <div class="rm-ben-card r">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg></div><span class="rm-num">03</span></div>
          <h3>Faster Billing</h3>
          <p>Process dine-in, takeaway and supported orders efficiently.</p>
        </div>
        <div class="rm-ben-card r">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg></div><span class="rm-num">04</span></div>
          <h3>Kitchen Coordination</h3>
          <p>Connect orders with kitchen workflows where supported.</p>
        </div>
        <div class="rm-ben-card r">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg></div><span class="rm-num">05</span></div>
          <h3>Inventory Visibility</h3>
          <p>Monitor important ingredients and supplies.</p>
        </div>
        <div class="rm-ben-card r">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></div><span class="rm-num">06</span></div>
          <h3>Business Insights</h3>
          <p>Understand product, order and sales performance.</p>
        </div>
      </div>
    </div>
  </section>

  {{-- BUILT FOR FOCUSED FOOD CONCEPTS --}}
  <section class="pz-sec alt border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">Ideal For</div>
        <h2>One Platform. <span class="sf">Different Food Concepts.</span></h2>
      </div>
      <div class="rm-ind-grid r">
        <div class="rm-ind-card">
          <img src="https://images.unsplash.com/photo-1574071318508-1cdbab80d002?auto=format&fit=crop&w=700&q=80" alt="Pizzerias" referrerpolicy="no-referrer">
          <div class="rm-ind-cap"><strong>Pizzerias</strong><span>Pizzas, toppings, crusts, sides &amp; combos</span></div>
        </div>
        <div class="rm-ind-card">
          <img src="https://images.unsplash.com/photo-1568901346375-23c9450c58cd?auto=format&fit=crop&w=700&q=80" alt="Burger & Fast Food" referrerpolicy="no-referrer">
          <div class="rm-ind-cap"><strong>Burger &amp; Fast Food</strong><span>Burgers, sides, takeaway &amp; billing</span></div>
        </div>
        <div class="rm-ind-card">
          <img src="https://images.unsplash.com/photo-1473093295043-cdd812d0e601?auto=format&fit=crop&w=700&q=80" alt="Pasta & Italian" referrerpolicy="no-referrer">
          <div class="rm-ind-cap"><strong>Pasta &amp; Italian</strong><span>Pasta, starters, mains &amp; dine-in</span></div>
        </div>
        <div class="rm-ind-card">
          <img src="https://images.unsplash.com/photo-1528735602780-2552fd46c7af?auto=format&fit=crop&w=700&q=80" alt="Sandwich, Wraps & Dessert Cafes" referrerpolicy="no-referrer">
          <div class="rm-ind-cap"><strong>Sandwiches &amp; Dessert Cafés</strong><span>Quick-service wraps, snacks &amp; desserts</span></div>
        </div>
      </div>
      <div class="pz-model-pills r">
        <span class="pz-model-pill">Pizzerias</span>
        <span class="pz-model-pill">Pizza &amp; Pasta Restaurants</span>
        <span class="pz-model-pill">Burger Shops</span>
        <span class="pz-model-pill">Sandwich Shops</span>
        <span class="pz-model-pill">Wrap &amp; Roll Shops</span>
        <span class="pz-model-pill">Pasta Restaurants</span>
        <span class="pz-model-pill">Fast Food Outlets</span>
        <span class="pz-model-pill">Snack Shops</span>
        <span class="pz-model-pill">Dessert Cafés</span>
        <span class="pz-model-pill">Specialty Cafés</span>
        <span class="pz-model-pill">Casual Dining Concepts</span>
        <span class="pz-model-pill">Multi-Outlet Businesses</span>
      </div>
    </div>
  </section>

  {{-- CONNECTED ECOSYSTEM (7 MODULES) --}}
  <section class="pz-sec border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">Connected Ecosystem</div>
        <h2>Everything Works Better <span class="sf">Together.</span></h2>
        <p>From menu selection and custom toppings to oven KOTs, billing, inventory and daily reports.</p>
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
  <section class="pz-sec alt">
    <div class="w">
      <div class="hd r">
        <div class="eb">Frequently Asked Questions</div>
        <h2>Pizzeria &amp; Specialty Food <span class="sf">FAQ.</span></h2>
      </div>
      <div class="rm-faq-list r">
        <div class="rm-faq-item open">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>1. Can Geni Menu manage a pizzeria?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">Yes. Geni Menu can help manage pizza products, menu categories, orders, billing, inventory and supported restaurant operations.</div>
        </div>
        <div class="rm-faq-item">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>2. Can I manage pizza sizes and toppings?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">Product variations such as sizes, toppings and add-ons can be represented where supported.</div>
        </div>
        <div class="rm-faq-item">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>3. Can I manage burger and pasta menus?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">Yes. Geni Menu can organize different food categories and products within the menu management workflow.</div>
        </div>
        <div class="rm-faq-item">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>4. Can I manage takeaway orders?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">Yes. Takeaway orders can be handled through the supported order-management workflow.</div>
        </div>
        <div class="rm-faq-item">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>5. Can I connect orders with the kitchen?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">KOT and kitchen workflows can connect orders to preparation where supported.</div>
        </div>
        <div class="rm-faq-item">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>6. Can I manage dine-in tables?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">Yes. Table management can help manage table availability, occupancy and associated orders where applicable.</div>
        </div>
        <div class="rm-faq-item">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>7. Can I track ingredients?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">Inventory management can help monitor ingredients, stock levels and stock movement.</div>
        </div>
        <div class="rm-faq-item">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>8. Can I manage multiple outlets?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">Multi-branch functionality is available where supported by the applicable plan.</div>
        </div>
        <div class="rm-faq-item">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>9. Can I view my best-selling products?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">Yes. Supported reports can provide visibility into product and sales performance.</div>
        </div>
      </div>
    </div>
  </section>

  {{-- FINAL CTA --}}
  <section class="rm-cta">
    <div class="w r">
      <h2>Ready to Run Your Specialty Food Business Smarter?</h2>
      <p>Manage your menu, orders, kitchen, billing, customers, inventory and business insights from one connected platform with Geni Menu.</p>
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

function filterPzMenu(cat, btn) {
  document.querySelectorAll('#pzMenuTabs .pz-tab').forEach(b => b.classList.remove('active'));
  btn.classList.add('active');
  document.querySelectorAll('#pzMenuGrid .pz-prod-card').forEach(card => {
    card.style.display = (cat === 'all' || card.dataset.cat === cat) ? 'flex' : 'none';
  });
}

function recalcPzCustom() {
  const sizeBtn = document.querySelector('#pzSizeRow .pz-opt-btn.active');
  const crustBtn = document.querySelector('#pzCrustRow .pz-opt-btn.active');
  const addonBtns = document.querySelectorAll('#pzAddonRow .pz-opt-btn.active');
  let total = Number(sizeBtn?.dataset.price || 449) + Number(crustBtn?.dataset.price || 0);
  const parts = [
    sizeBtn?.childNodes[0]?.textContent?.trim() || 'Medium',
    crustBtn?.childNodes[0]?.textContent?.trim() || 'Classic Hand Tossed'
  ];
  addonBtns.forEach(a => {
    total += Number(a.dataset.price || 0);
    parts.push('+ ' + (a.childNodes[0]?.textContent?.trim() || 'Add-on'));
  });
  const totalEl = document.getElementById('pzCustomTotal');
  const sumEl = document.getElementById('pzCustomSummary');
  if (totalEl) totalEl.textContent = '₹' + total;
  if (sumEl) sumEl.textContent = parts.join(' · ');
}

function pickPzSize(btn) {
  document.querySelectorAll('#pzSizeRow .pz-opt-btn').forEach(b => b.classList.remove('active'));
  btn.classList.add('active');
  recalcPzCustom();
}
function pickPzCrust(btn) {
  document.querySelectorAll('#pzCrustRow .pz-opt-btn').forEach(b => b.classList.remove('active'));
  btn.classList.add('active');
  recalcPzCustom();
}
function togglePzAddon(btn) {
  btn.classList.toggle('active');
  recalcPzCustom();
}

function pzPayPrint() {
  const note = document.getElementById('pzPayNote');
  if (note) note.style.display = 'block';
}

function setPzStep(step) {
  document.querySelectorAll('#pzStepRow .pz-step-btn').forEach((b, i) => b.classList.toggle('done', i < step));
  const badge = document.getElementById('pzOrderBadge');
  if (badge) {
    const map = [
      { txt: 'New', cls: 'pz-badge preparing' },
      { txt: 'Preparing', cls: 'pz-badge preparing' },
      { txt: 'Ready', cls: 'pz-badge ready' }
    ];
    const info = map[step - 1] || map[1];
    badge.className = info.cls;
    badge.textContent = info.txt;
  }
}

function togglePzAvail(row) {
  const badge = row.querySelector('.pz-badge');
  const isOut = row.classList.toggle('out');
  badge.className = isOut ? 'pz-badge soldout' : 'pz-badge ready';
  badge.textContent = isOut ? 'Sold Out' : 'Available';
}

document.addEventListener('DOMContentLoaded', function() {
  const els = document.querySelectorAll('.pz-page .r');
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
