@php
$meta = [
    'title' => 'Juice Shop, Ice Cream, Chaat & Tea Shop POS Software | Geni Menu',
    'description' => 'Serve faster, sell more, and keep every order moving. Manage fresh juices, shakes, ice cream scoops, chaat, tea, counter POS billing, stock and multi-branch reports from one connected platform.',
    'keywords' => 'juice shop POS software, ice cream parlour billing, chaat shop POS, tea shop billing software, snack counter POS, Geni Menu',
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

.js-page * { box-sizing: border-box; }
.js-page {
  font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
  color: var(--ink);
  background: var(--bg);
  -webkit-font-smoothing: antialiased;
  overflow-x: hidden;
}

.js-page h1, .js-page h2, .js-page h3, .js-page h4 {
  margin: 0;
  font-family: 'Outfit', 'Plus Jakarta Sans', sans-serif;
  font-weight: 500;
  line-height: 1.14;
  letter-spacing: -0.025em;
  color: var(--ink);
}
.js-page h1 { font-size: clamp(34px, 4.6vw, 56px); }
.js-page h2 { font-size: clamp(28px, 3.6vw, 44px); }
.js-page h3 { font-size: 20px; font-weight: 600; }
.js-page p { margin: 0; color: var(--mute); font-size: 16px; line-height: 1.65; }
.js-page a { text-decoration: none; color: inherit; }

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
.js-sec { padding: clamp(56px, 6.5vw, 92px) 0; background: var(--bg); position: relative; overflow: hidden; }
.js-sec.alt { background: var(--bg2); }
.js-sec.border-b { border-bottom: 1px solid var(--line); }

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

.js-badge { font-size: 10.5px; font-weight: 700; padding: 4px 10px; border-radius: 99px; text-transform: uppercase; letter-spacing: .04em; display: inline-block; }
.js-badge.ready { background: var(--green-bg); color: var(--green); }
.js-badge.preparing { background: var(--amber-bg); color: var(--amber); }
.js-badge.soldout { background: var(--red-bg); color: var(--red); }

/* Tabs & Catalogue Grid */
.js-tabs { display: flex; gap: 10px; justify-content: center; flex-wrap: wrap; margin-bottom: 28px; }
.js-tab { padding: 9px 18px; border-radius: 99px; border: 1px solid var(--line); background: #fff; color: var(--mute); font: 700 13.5px 'Plus Jakarta Sans', sans-serif; cursor: pointer; transition: .2s ease; }
.js-tab.active, .js-tab:hover { background: var(--br); color: #fff; border-color: var(--br); }
.js-menu-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; margin-bottom: 40px; }
.js-prod-card { display: flex; align-items: center; gap: 16px; padding: 16px; border: 1px solid var(--line); border-radius: 18px; background: #fff; transition: .25s ease; }
.js-prod-card:hover { border-color: var(--br); box-shadow: var(--shadow-sm); transform: translateY(-2px); }
.js-prod-img { width: 84px; height: 84px; border-radius: 14px; object-fit: cover; flex-shrink: 0; }
.js-prod-ctx { flex: 1; }
.js-prod-ctx h4 { font-size: 16.5px; font-weight: 700; margin-bottom: 4px; }
.js-prod-ctx p { font-size: 13px; margin-bottom: 8px; line-height: 1.45; }
.js-prod-ft { display: flex; justify-content: space-between; align-items: center; }

/* Split Layouts, Variations & Billing */
.js-split { display: grid; grid-template-columns: 1fr 1fr; gap: 36px; align-items: start; }
.js-var-sec { margin-bottom: 16px; padding-bottom: 16px; border-bottom: 1px dashed var(--line); }
.js-var-sec:last-of-type { border-bottom: none; margin-bottom: 0; padding-bottom: 0; }
.js-var-hdr { font-size: 13px; font-weight: 700; color: var(--ink); margin-bottom: 8px; display: flex; justify-content: space-between; }
.js-var-opts { display: grid; grid-template-columns: repeat(3, 1fr); gap: 8px; }
.js-var-btn { padding: 10px 8px; border-radius: 10px; border: 1.5px solid var(--line); background: var(--bg2); cursor: pointer; text-align: center; font: 700 12px 'Plus Jakarta Sans', sans-serif; color: var(--ink); transition: .2s ease; }
.js-var-btn strong { display: block; font-family: 'Outfit', sans-serif; font-size: 14.5px; color: var(--br); margin-top: 2px; }
.js-var-btn.active, .js-var-btn:hover { background: var(--br-light); border-color: var(--br); }

.js-bill-row { display: flex; justify-content: space-between; align-items: center; padding: 9px 0; border-bottom: 1px dashed var(--line); font-size: 14px; }
.js-bill-row small { display: block; font-size: 12px; color: var(--mute); }
.js-bill-total { display: flex; justify-content: space-between; align-items: center; padding: 14px 0 10px; font-family: 'Outfit', sans-serif; font-size: 22px; font-weight: 700; color: var(--br); }
.js-bill-actions { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-top: 10px; }
.js-act-btn { padding: 12px; border-radius: 10px; border: 1.5px solid var(--line); background: #fff; color: var(--ink); font: 700 13.5px 'Plus Jakarta Sans', sans-serif; cursor: pointer; }
.js-act-btn.primary { background: var(--br); color: #fff; border-color: var(--br); }
.js-bill-msg { margin-top: 10px; font-size: 12px; font-weight: 700; padding: 8px 10px; border-radius: 10px; text-align: center; display: none; }

/* Order Flow & Rush */
.js-step-4 { display: grid; grid-template-columns: repeat(4, 1fr); gap: 6px; margin-top: 14px; }
.js-step-pill { padding: 8px 4px; border-radius: 10px; border: 1px solid var(--line); background: var(--bg2); color: var(--mute); font: 700 11px 'Plus Jakarta Sans', sans-serif; cursor: pointer; text-align: center; }
.js-step-pill.done { background: var(--br-light); color: var(--br); border-color: var(--br); }

.js-rush-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 10px; margin-bottom: 16px; }
.js-rush-box { background: #fff; border: 1px solid var(--line); border-radius: 14px; padding: 16px 8px; text-align: center; }
.js-rush-box strong { display: block; font-family: 'Outfit', sans-serif; font-size: 26px; font-weight: 600; color: var(--br); line-height: 1.15; }
.js-rush-box span { font-size: 10.5px; font-weight: 700; color: var(--mute); text-transform: uppercase; }
.js-tag-row { display: flex; gap: 8px; flex-wrap: wrap; }
.js-tag { padding: 6px 12px; border-radius: 99px; background: #fff; border: 1px solid var(--line); font-size: 12px; font-weight: 700; color: var(--mute); }

/* Availability, Seasonal, Inventory, Customer & Multi-Branch */
.js-avail-list { display: flex; flex-direction: column; gap: 8px; }
.js-avail-row { display: flex; justify-content: space-between; align-items: center; padding: 11px 14px; border-radius: 12px; border: 1px solid var(--line); background: #fff; font-size: 14px; font-weight: 600; cursor: pointer; }
.js-avail-row.out { background: var(--red-bg); border-color: rgba(185, 28, 28, 0.22); }

.js-inv-table { width: 100%; border-collapse: collapse; }
.js-inv-table th { text-align: left; font-size: 11px; font-weight: 700; color: var(--mute); text-transform: uppercase; letter-spacing: .06em; padding: 10px 12px; background: var(--bg2); border-bottom: 1px solid var(--line); }
.js-inv-table td { padding: 10px 12px; font-size: 13.5px; border-bottom: 1px solid var(--line); }
.js-inv-table tr:last-child td { border-bottom: none; }

.js-mini-card { background: var(--bg2); border: 1px solid var(--line); border-radius: 16px; padding: 18px; margin-top: 18px; }
.js-mini-list { list-style: none; padding: 0; margin: 10px 0 0; font-size: 13.5px; }
.js-mini-list li { display: flex; justify-content: space-between; padding: 5px 0; border-bottom: 1px dashed var(--line); }
.js-mini-list li:last-child { border-bottom: none; }

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
.js-bars { height: 140px; display: grid; grid-template-columns: repeat(7, 1fr); align-items: end; gap: 12px; padding-bottom: 26px; border-bottom: 1px solid rgba(255, 255, 255, 0.16); }
.js-bar-col { display: flex; flex-direction: column; align-items: center; justify-content: flex-end; height: 100%; position: relative; }
.js-bar-fill { width: 100%; max-width: 56px; background: linear-gradient(180deg, #e6c594 0%, #876039 100%); border-radius: 8px 8px 0 0; }
.js-bar-lbl { position: absolute; bottom: -22px; font-size: 10.5px; font-weight: 600; color: rgba(255, 255, 255, 0.72); white-space: nowrap; }

/* 6-Step Workflow */
.rm-prog-grid-6 { display: grid; grid-template-columns: repeat(6, 1fr); gap: 14px; }
.rm-prog-card { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 18px 14px; text-align: center; transition: .25s ease; }
.rm-prog-card:hover { transform: translateY(-4px); border-color: var(--br); box-shadow: var(--shadow-sm); }
.rm-prog-num { display: inline-flex; align-items: center; justify-content: center; width: 32px; height: 32px; border-radius: 10px; background: var(--br-light); color: var(--br); font-family: 'Outfit', sans-serif; font-weight: 700; font-size: 12.5px; margin-bottom: 10px; border: 1px solid rgba(135, 96, 57, 0.2); }
.rm-prog-card h4 { font-size: 14px; font-weight: 700; margin-bottom: 4px; }
.rm-prog-card p { font-size: 12px; line-height: 1.45; }

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
.rm-ind-card::after { content: ''; position: absolute; inset: 0; background: linear-gradient(180deg, transparent 30%, rgba(24, 16, 10, 0.86) 100%); }
.rm-ind-cap { position: absolute; left: 16px; right: 16px; bottom: 14px; z-index: 2; color: #fff; }
.rm-ind-cap strong { display: block; font-family: 'Outfit', sans-serif; font-size: 16px; font-weight: 600; }
.rm-ind-cap span { font-size: 11.5px; color: rgba(255, 255, 255, 0.82); line-height: 1.35; display: block; margin-top: 2px; }
.js-model-pills { display: flex; flex-wrap: wrap; justify-content: center; gap: 10px; }
.js-model-pill { padding: 9px 16px; border-radius: 99px; background: #fff; border: 1px solid var(--line); font-size: 13px; font-weight: 700; color: var(--ink); }

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
  .rm-hero-grid, .js-split { grid-template-columns: 1fr; gap: 36px; }
  .rm-val-grid, .rm-dark-kpis, .rm-ind-grid { grid-template-columns: repeat(2, 1fr); }
  .rm-prog-grid-6 { grid-template-columns: repeat(3, 1fr); }
  .rm-ben-grid { grid-template-columns: repeat(2, 1fr); }
  .rm-eco-grid { grid-template-columns: repeat(4, 1fr); }
}
@media (max-width: 640px) {
  .w { padding: 0 16px; }
  .rm-val-grid, .js-menu-grid, .js-var-opts, .js-rush-grid, .rm-dark-kpis, .rm-prog-grid-6, .rm-ben-grid, .rm-ind-grid { grid-template-columns: 1fr; }
  .js-step-4 { grid-template-columns: repeat(2, 1fr); }
  .rm-eco-grid { grid-template-columns: repeat(2, 1fr); }
  .rm-hero-stats { grid-template-columns: 1fr; gap: 12px; }
  .rm-hero-cta .btn, .rm-cta-btns .btn { width: 100%; }
  .rm-hero-float { flex-direction: column; align-items: flex-start; }
}
</style>

<div class="js-page">
  {{-- BREADCRUMB --}}
  <nav class="bc" aria-label="Breadcrumb">
    <div class="w">
      <a href="{{ url('/') }}">Home</a>
      <span class="sep">/</span>
      <a href="{{ route('solutions') }}">Solutions</a>
      <span class="sep">/</span>
      <span class="cur">Juice &amp; Snack Shops</span>
    </div>
  </nav>

  {{-- HERO --}}
  <section class="rm-hero">
    <div class="w rm-hero-grid">
      <div>
        <div class="eb">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M17 3v3H7V3M9 6v15M15 6v15"/><path d="M6 3h12l-2 18H8z"/></svg>
          JUICE &amp; SNACK SHOP SOLUTION
        </div>
        <h1>Serve Faster. Sell More. <span class="sf">Keep Every Order Moving.</span></h1>
        <p class="rm-hero-sub">Manage your drinks, desserts, snacks, customer orders, billing, inventory and daily shop operations from one connected platform built for juice shops, ice cream parlours, chaat shops and tea shops.</p>
        <div class="rm-hero-cta">
          <a href="{{ route('restaurant_signup') }}" class="btn p">Get Started →</a>
          <a href="{{ route('contact.us') }}" class="btn o">Book a Demo →</a>
        </div>
        <div class="rm-hero-stats">
          <div class="rm-hero-stat">
            <strong>₹24,850</strong>
            <span>Live daily shop sales</span>
          </div>
          <div class="rm-hero-stat">
            <strong>14 Active</strong>
            <span>Rush-hour counter orders</span>
          </div>
          <div class="rm-hero-stat">
            <strong>Mango Juice</strong>
            <span>#1 Best-selling drink</span>
          </div>
        </div>
      </div>

      <div class="rm-hero-media">
        <img src="{{ asset('assets/images/juice-and-snacks-hero.jpg') }}" alt="Fresh juice and snack shop counter with mango juice, smoothies, samosas, fresh fruit bowls and tablet POS">
        <div class="rm-hero-scrim"></div>
        <div class="rm-hero-pill">
          <span class="rm-live-dot"></span>
          Live · 14 Active Orders · Fast Counter Sync
        </div>
        <div class="rm-hero-float">
          <div class="rm-hero-float-left">
            <div class="rm-hero-float-ico">
              <svg viewBox="0 0 24 24"><path d="M17 3v3H7V3M6 3h12l-2 18H8z"/></svg>
            </div>
            <div>
              <div class="rm-hero-float-ttl">ORDER #2048 · Arun · Takeaway</div>
              <div class="rm-hero-float-sub">2× Mango Juice, 1× Samosa Chaat, 1× Vanilla Sundae</div>
            </div>
          </div>
          <span class="rm-hero-float-tag">₹480</span>
        </div>
      </div>
    </div>
  </section>

  {{-- VALUE STRIP (01 - 04) --}}
  <section class="js-sec border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">Built For Fast-Moving Shops</div>
        <h2>Everything Your Shop Needs. <span class="sf">In One Place.</span></h2>
        <p>From a quick cup of tea to a customised juice, sundae or chaat order, Geni Menu helps you manage products, orders, billing, customers and stock from one connected platform.</p>
      </div>
      <div class="rm-val-grid">
        <div class="rm-val-card r">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/></svg></div><span class="rm-num">01</span></div>
          <h3>Drinks &amp; Snacks Menu</h3>
          <p>Present juices, shakes, ice cream scoops, chaat and tea with crisp images, sizes and add-ons.</p>
        </div>
        <div class="rm-val-card r">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/></svg></div><span class="rm-num">02</span></div>
          <h3>Seconds-Fast Counter POS</h3>
          <p>Process morning tea rushes, lunch breaks and evening snack crowds without queue bottlenecks.</p>
        </div>
        <div class="rm-val-card r">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/></svg></div><span class="rm-num">03</span></div>
          <h3>Live Seasonal Availability</h3>
          <p>Update seasonal specials (summer mangoes, monsoon snacks) and hide sold-out flavours instantly.</p>
        </div>
        <div class="rm-val-card r">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></div><span class="rm-num">04</span></div>
          <h3>Stock &amp; Multi-Outlet View</h3>
          <p>Track milk, fruits, sugar, paper cups, regular buyers and branch-wise sales from anywhere.</p>
        </div>
      </div>
    </div>
  </section>

  {{-- CATALOGUE DISPLAY + VARIATIONS & COUNTER BILLING --}}
  <section class="js-sec alt border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">Catalogue &amp; Variations</div>
        <h2>Make Every Product <span class="sf">Easy to Discover.</span></h2>
        <p>Create a clear digital catalogue for your complete food and beverage collection with sizes, scoops and add-ons.</p>
      </div>

      <div class="js-tabs r" id="jsMenuTabs">
        <button type="button" class="js-tab active" onclick="filterJsMenu('all', this)">All Items</button>
        <button type="button" class="js-tab" onclick="filterJsMenu('juice', this)">Juice Shop</button>
        <button type="button" class="js-tab" onclick="filterJsMenu('icecream', this)">Ice Cream</button>
        <button type="button" class="js-tab" onclick="filterJsMenu('all', this)">Chaat</button>
        <button type="button" class="js-tab" onclick="filterJsMenu('all', this)">Tea &amp; Beverages</button>
      </div>

      <div class="js-menu-grid r" id="jsMenuGrid">
        <div class="js-prod-card" data-cat="juice">
          <img class="js-prod-img" src="https://images.unsplash.com/photo-1621506289937-a8e4df240d0b?w=240&q=80" alt="Fresh Mango Juice" referrerpolicy="no-referrer">
          <div class="js-prod-ctx">
            <h4>Fresh Mango Juice</h4>
            <p>Freshly blended seasonal mangoes without added sugar.</p>
            <div class="js-prod-ft"><strong style="color:var(--br);">₹120</strong><span class="js-badge ready">Available</span></div>
          </div>
        </div>
        <div class="js-prod-card" data-cat="juice">
          <img class="js-prod-img" src="https://images.unsplash.com/photo-1589733955941-5eeaf752f6dd?w=240&q=80" alt="Watermelon Splash" referrerpolicy="no-referrer">
          <div class="js-prod-ctx">
            <h4>Watermelon Splash</h4>
            <p>Refreshing watermelon juice with a hint of mint.</p>
            <div class="js-prod-ft"><strong style="color:var(--br);">₹90</strong><span class="js-badge ready">Available</span></div>
          </div>
        </div>
        <div class="js-prod-card" data-cat="icecream">
          <img class="js-prod-img" src="https://images.unsplash.com/photo-1572490122747-3968b75cc699?w=240&q=80" alt="Thick Chocolate Shake" referrerpolicy="no-referrer">
          <div class="js-prod-ctx">
            <h4>Thick Chocolate Shake</h4>
            <p>Rich chocolate ice cream blended with premium cocoa.</p>
            <div class="js-prod-ft"><strong style="color:var(--br);">₹150</strong><span class="js-badge ready">Available</span></div>
          </div>
        </div>
        <div class="js-prod-card" data-cat="juice">
          <img class="js-prod-img" src="https://images.unsplash.com/photo-1623065422902-30a2d299bbe4?w=240&q=80" alt="Seasonal Fruit Bowl" referrerpolicy="no-referrer">
          <div class="js-prod-ctx">
            <h4>Seasonal Fruit Bowl</h4>
            <p>A healthy mix of fresh cut seasonal fruits.</p>
            <div class="js-prod-ft"><strong style="color:var(--br);">₹180</strong><span class="js-badge ready">Available</span></div>
          </div>
        </div>
      </div>

      <div class="js-split">
        {{-- Variations --}}
        <div class="rm-win r">
          <div class="rm-win-bar">
            <div class="rm-win-dots"><i></i><i></i><i></i></div>
            <div class="rm-win-ttl">One Product · Multiple Choices</div>
          </div>
          <div class="rm-win-body">
            <div class="js-var-sec">
              <div class="js-var-hdr"><span>Mango Milkshake — Size &amp; Add-Ons</span></div>
              <div class="js-var-opts">
                <button type="button" class="js-var-btn active" onclick="pickJsVar(this)">Regular<strong>₹120</strong></button>
                <button type="button" class="js-var-btn" onclick="pickJsVar(this)">Large<strong>₹160</strong></button>
                <button type="button" class="js-var-btn" onclick="this.classList.toggle('active')">+ Scoop / Nuts<strong>+₹40</strong></button>
              </div>
            </div>
            <div class="js-var-sec">
              <div class="js-var-hdr"><span>Vanilla Ice Cream — Scoops</span></div>
              <div class="js-var-opts">
                <button type="button" class="js-var-btn" onclick="pickJsVar(this)">Single Scoop<strong>₹60</strong></button>
                <button type="button" class="js-var-btn active" onclick="pickJsVar(this)">Double Scoop<strong>₹100</strong></button>
                <button type="button" class="js-var-btn" onclick="pickJsVar(this)">Triple Scoop<strong>₹140</strong></button>
              </div>
            </div>
            <div style="font-size:11.5px; color:var(--mute); margin-top:12px; text-align:center;">* Illustrative examples of supported feature configurations.</div>
          </div>
        </div>

        {{-- Fast Counter Sale --}}
        <div class="rm-win r">
          <div class="rm-win-bar">
            <div class="rm-win-dots"><i></i><i></i><i></i></div>
            <div class="rm-win-ttl">Counter Sale #842</div>
            <span class="js-badge ready">POS Ready</span>
          </div>
          <div class="rm-win-body">
            <div class="js-bill-row"><div><strong>Mango Juice</strong><small>Regular × 2</small></div><strong>₹240</strong></div>
            <div class="js-bill-row"><div><strong>Samosa Chaat</strong><small>Standard × 1</small></div><strong>₹80</strong></div>
            <div class="js-bill-row"><div><strong>Vanilla Scoop</strong><small>Double × 1</small></div><strong>₹100</strong></div>
            <div class="js-bill-row"><div><strong>Masala Tea</strong><small>Standard × 2</small></div><strong>₹60</strong></div>
            <div class="js-bill-total"><span>TOTAL</span><span>₹480</span></div>
            <div class="js-bill-actions">
              <button type="button" class="js-act-btn" onclick="jsBillAction('hold')">Hold</button>
              <button type="button" class="js-act-btn primary" onclick="jsBillAction('pay')">Pay &amp; Complete</button>
            </div>
            <div class="js-bill-msg" id="jsBillMsg"></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- ORDER TRACKING & BUSY-HOUR RUSH --}}
  <section class="js-sec border-b">
    <div class="w js-split">
      <div class="rm-win r">
        <div class="rm-win-bar">
          <div class="rm-win-dots"><i></i><i></i><i></i></div>
          <div class="rm-win-ttl">ORDER #2048 · Arun · Takeaway</div>
          <span class="js-badge preparing" id="jsOrderBadge">Preparing</span>
        </div>
        <div class="rm-win-body">
          <div style="font-size:14px; color:var(--ink); margin-bottom:10px;">
            <strong>2 × Mango Juice</strong> · 1 × Samosa Chaat · 1 × Vanilla Sundae
          </div>
          <p style="font-size:12.5px;">Tap any step below to advance order status:</p>
          <div class="js-step-4" id="jsStepRow">
            <button type="button" class="js-step-pill done" onclick="setJsStep(1)">1. Order</button>
            <button type="button" class="js-step-pill done" onclick="setJsStep(2)">2. Prepare</button>
            <button type="button" class="js-step-pill" onclick="setJsStep(3)">3. Ready</button>
            <button type="button" class="js-step-pill" onclick="setJsStep(4)">4. Serve</button>
          </div>
        </div>
      </div>

      <div class="r">
        <div class="eb">Busy-Hour Rush</div>
        <h2>Stay in Control When <span class="sf">the Crowd Gets Bigger.</span></h2>
        <p style="margin:10px 0 18px;">Keep your team aware of active orders and what needs attention during peak snack and beverage periods.</p>
        <div class="js-rush-grid">
          <div class="js-rush-box"><strong>24</strong><span>New Orders</span></div>
          <div class="js-rush-box"><strong>11</strong><span>Preparing</span></div>
          <div class="js-rush-box"><strong>7</strong><span>Ready</span></div>
          <div class="js-rush-box"><strong style="color:var(--green);">86</strong><span>Completed</span></div>
        </div>
        <div class="js-tag-row">
          <span class="js-tag">Morning Tea Rush</span>
          <span class="js-tag">Lunch Break</span>
          <span class="js-tag">Evening Snacks</span>
          <span class="js-tag">After-School</span>
          <span class="js-tag">Weekend Evenings</span>
          <span class="js-tag">Summer Demand</span>
        </div>
      </div>
    </div>
  </section>

  {{-- AVAILABILITY, SEASONAL MENU, INVENTORY, CUSTOMERS & MULTI-BRANCH --}}
  <section class="js-sec alt border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">Availability, Stock &amp; Multi-Outlet</div>
        <h2>Know Your Stock <span class="sf">Before You Run Out.</span></h2>
        <p>Hide sold-out items instantly, rotate seasonal specials, track fruits, milk and paper cups, and monitor regular buyers across branches.</p>
      </div>

      <div class="js-split">
        <div class="rm-win r">
          <div class="rm-win-bar">
            <div class="rm-win-dots"><i></i><i></i><i></i></div>
            <div class="rm-win-ttl">Product Availability · Tap to Toggle</div>
          </div>
          <div class="rm-win-body">
            <div class="js-avail-list">
              <div class="js-avail-row" onclick="toggleJsAvail(this)"><span>Mango Juice</span><span class="js-badge ready">Available</span></div>
              <div class="js-avail-row" onclick="toggleJsAvail(this)"><span>Fresh Lime Soda</span><span class="js-badge ready">Available</span></div>
              <div class="js-avail-row" onclick="toggleJsAvail(this)"><span>Chocolate Sundae</span><span class="js-badge ready">Available</span></div>
              <div class="js-avail-row out" onclick="toggleJsAvail(this)"><span>Strawberry Ice Cream</span><span class="js-badge soldout">Sold Out</span></div>
              <div class="js-avail-row" onclick="toggleJsAvail(this)"><span>Pani Puri</span><span class="js-badge ready">Available</span></div>
              <div class="js-avail-row" onclick="toggleJsAvail(this)"><span>Masala Tea</span><span class="js-badge ready">Available</span></div>
            </div>

            <div class="js-mini-card">
              <div style="display:flex; justify-content:space-between; align-items:center;">
                <div><strong style="font-size:15.5px; display:block;">Arun Kumar</strong><span style="font-size:12px; color:var(--mute);">+91 98765 43210 · Regular</span></div>
                <div style="text-align:right;"><span style="font-size:10.5px; font-weight:700; color:var(--mute); text-transform:uppercase;">Total Orders</span><strong style="display:block; font-size:18px; color:var(--br);">12</strong></div>
              </div>
              <ul class="js-mini-list">
                <li><span>Mango Juice</span><strong>× 2</strong></li>
                <li><span>Chocolate Milkshake</span><strong>× 1</strong></li>
                <li><span>Pani Puri</span><strong>× 2</strong></li>
              </ul>
            </div>
          </div>
        </div>

        <div class="rm-win r">
          <div class="rm-win-bar">
            <div class="rm-win-dots"><i></i><i></i><i></i></div>
            <div class="rm-win-ttl">Inventory, Seasonal &amp; Branches</div>
          </div>
          <div class="rm-win-body">
            <table class="js-inv-table">
              <thead>
                <tr><th>Item</th><th>Stock</th><th>Status</th></tr>
              </thead>
              <tbody>
                <tr><td><strong>Mangoes</strong></td><td>25 kg</td><td><span class="js-badge ready">In Stock</span></td></tr>
                <tr><td><strong>Milk</strong></td><td>30 L</td><td><span class="js-badge ready">In Stock</span></td></tr>
                <tr><td><strong>Sugar</strong></td><td>25 kg</td><td><span class="js-badge ready">In Stock</span></td></tr>
                <tr><td><strong>Ice Cream Base</strong></td><td>15 L</td><td><span class="js-badge ready">In Stock</span></td></tr>
                <tr><td><strong>Chaat Masala</strong></td><td>5 kg</td><td><span class="js-badge soldout">Low</span></td></tr>
                <tr><td><strong>Paper Cups</strong></td><td>500 pcs</td><td><span class="js-badge ready">In Stock</span></td></tr>
              </tbody>
            </table>

            <div class="js-mini-card">
              <div style="font-size:11.5px; font-weight:700; text-transform:uppercase; letter-spacing:.06em; color:var(--mute);">All Branches Sales</div>
              <ul class="js-mini-list">
                <li><span>Tiruchengode</span><strong style="color:var(--br);">₹32,850</strong></li>
                <li><span>Namakkal</span><strong style="color:var(--br);">₹28,420</strong></li>
                <li><span>Salem</span><strong style="color:var(--br);">₹41,680</strong></li>
              </ul>
              <div style="font-size:11px; color:var(--mute); margin-top:8px;">* Multi-branch functionality depends on applicable plan.</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- DARK EDITORIAL BUSINESS REPORTS --}}
  <section class="js-sec border-b">
    <div class="w">
      <div class="rm-dark-banner r">
        <div class="rm-dark-top">
          <div>
            <div class="eb" style="background:rgba(255,255,255,0.1); color:#e6c594; border-color:rgba(230,197,148,0.28);">Business Reports</div>
            <h2>Know What Your <span class="sf" style="-webkit-text-fill-color:#e6c594;">Customers Buy.</span></h2>
            <p>Turn everyday sales and order data into clear business insights — at the counter or on your smartphone.</p>
          </div>
          <span class="js-badge ready" style="background:rgba(22,163,74,0.2); color:#86efac;">● Live Sales Insights</span>
        </div>

        <div class="rm-dark-kpis">
          <div class="rm-dark-kpi"><strong>₹24,850</strong><span>Daily Sales</span></div>
          <div class="rm-dark-kpi"><strong>156</strong><span>Total Orders</span></div>
          <div class="rm-dark-kpi"><strong>Juices</strong><span>Top Category</span></div>
          <div class="rm-dark-kpi"><strong>5PM – 8PM</strong><span>Peak Hours</span></div>
        </div>

        <div class="js-bars">
          <div class="js-bar-col"><div class="js-bar-fill" style="height:90%;"></div><span class="js-bar-lbl">Juices</span></div>
          <div class="js-bar-col"><div class="js-bar-fill" style="height:70%;"></div><span class="js-bar-lbl">Shakes</span></div>
          <div class="js-bar-col"><div class="js-bar-fill" style="height:60%;"></div><span class="js-bar-lbl">Ice Cream</span></div>
          <div class="js-bar-col"><div class="js-bar-fill" style="height:85%;"></div><span class="js-bar-lbl">Chaat</span></div>
          <div class="js-bar-col"><div class="js-bar-fill" style="height:100%;"></div><span class="js-bar-lbl">Tea</span></div>
          <div class="js-bar-col"><div class="js-bar-fill" style="height:80%;"></div><span class="js-bar-lbl">Coffee</span></div>
          <div class="js-bar-col"><div class="js-bar-fill" style="height:40%;"></div><span class="js-bar-lbl">Snacks</span></div>
        </div>
        <div style="text-align:center; margin-top:26px; font-size:11.5px; color:rgba(255,255,255,0.48);">* Demo/example data shown for illustrative purposes.</div>
      </div>
    </div>
  </section>

  {{-- 6-STEP WORKFLOW --}}
  <section class="js-sec alt border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">Connected Workflow</div>
        <h2>From Product Selection to <span class="sf">Completed Sale.</span></h2>
        <p>See how Geni Menu connects your daily shop operations into one smooth workflow.</p>
      </div>
      <div class="rm-prog-grid-6 r">
        <div class="rm-prog-card"><div class="rm-prog-num">01</div><h4>Product Catalogue</h4><p>Juices, shakes, chaat &amp; tea</p></div>
        <div class="rm-prog-card"><div class="rm-prog-num">02</div><h4>Customer Order</h4><p>Choose size, scoop &amp; add-ons</p></div>
        <div class="rm-prog-card"><div class="rm-prog-num">03</div><h4>Preparation</h4><p>Blend, plate &amp; pack fresh</p></div>
        <div class="rm-prog-card"><div class="rm-prog-num">04</div><h4>Billing</h4><p>Fast counter POS entry</p></div>
        <div class="rm-prog-card"><div class="rm-prog-num">05</div><h4>Payment</h4><p>Instant UPI, cash or card</p></div>
        <div class="rm-prog-card"><div class="rm-prog-num">06</div><h4>Serve / Pickup</h4><p>Quick counter handover</p></div>
      </div>
    </div>
  </section>

  {{-- KEY BENEFITS (01 - 06) --}}
  <section class="js-sec border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">Key Benefits</div>
        <h2>Simple Tools for <span class="sf">Fast-Moving Businesses.</span></h2>
      </div>
      <div class="rm-ben-grid">
        <div class="rm-ben-card r">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/></svg></div><span class="rm-num">01</span></div>
          <h3>Easy Product Management</h3>
          <p>Organize drinks, desserts, snacks and food items clearly.</p>
        </div>
        <div class="rm-ben-card r">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg></div><span class="rm-num">02</span></div>
          <h3>Faster Counter Billing</h3>
          <p>Process everyday transactions through a streamlined POS.</p>
        </div>
        <div class="rm-ben-card r">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/></svg></div><span class="rm-num">03</span></div>
          <h3>Order Visibility</h3>
          <p>Keep active, preparing and completed orders organized.</p>
        </div>
        <div class="rm-ben-card r">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M9 12l2 2 4-4"/></svg></div><span class="rm-num">04</span></div>
          <h3>Product Availability</h3>
          <p>Keep your customer-facing menu aligned with current availability.</p>
        </div>
        <div class="rm-ben-card r">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg></div><span class="rm-num">05</span></div>
          <h3>Inventory Visibility</h3>
          <p>Monitor important ingredients and supplies easily.</p>
        </div>
        <div class="rm-ben-card r">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></div><span class="rm-num">06</span></div>
          <h3>Business Reports</h3>
          <p>Understand sales, orders and product performance.</p>
        </div>
      </div>
    </div>
  </section>

  {{-- FOUR BUSINESS TYPES + 12 SHOP FORMATS --}}
  <section class="js-sec alt border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">Ideal For</div>
        <h2>One Platform. Different <span class="sf">Food &amp; Beverage Businesses.</span></h2>
      </div>
      <div class="rm-ind-grid r">
        <div class="rm-ind-card">
          <img src="https://images.unsplash.com/photo-1621506289937-a8e4df240d0b?auto=format&fit=crop&w=700&q=80" alt="Juice Shops" referrerpolicy="no-referrer">
          <div class="rm-ind-cap"><strong>Juice Shops</strong><span>Fresh juices · Shakes · Smoothies · Fruit bowls</span></div>
        </div>
        <div class="rm-ind-card">
          <img src="https://images.unsplash.com/photo-1557142046-c704a3adf364?auto=format&fit=crop&w=700&q=80" alt="Ice Cream Parlours" referrerpolicy="no-referrer">
          <div class="rm-ind-cap"><strong>Ice Cream Parlours</strong><span>Scoops · Cones · Sundaes · Flavours &amp; Add-ons</span></div>
        </div>
        <div class="rm-ind-card">
          <img src="https://images.unsplash.com/photo-1601050690597-df0568f70950?auto=format&fit=crop&w=700&q=80" alt="Chaat Shops" referrerpolicy="no-referrer">
          <div class="rm-ind-cap"><strong>Chaat Shops</strong><span>Pani puri · Bhel puri · Sev puri · Samosa chaat</span></div>
        </div>
        <div class="rm-ind-card">
          <img src="https://images.unsplash.com/photo-1544787219-7f47ccb76574?auto=format&fit=crop&w=700&q=80" alt="Tea Shops" referrerpolicy="no-referrer">
          <div class="rm-ind-cap"><strong>Tea &amp; Coffee Shops</strong><span>Masala tea · Cold coffee · Snacks &amp; Takeaway</span></div>
        </div>
      </div>
      <div class="js-model-pills r">
        <span class="js-model-pill">Juice Centres</span>
        <span class="js-model-pill">Fresh Juice Shops</span>
        <span class="js-model-pill">Juice &amp; Shake Shops</span>
        <span class="js-model-pill">Ice Cream Parlours</span>
        <span class="js-model-pill">Dessert Shops</span>
        <span class="js-model-pill">Chaat Centres</span>
        <span class="js-model-pill">Street Food Shops</span>
        <span class="js-model-pill">Tea Shops</span>
        <span class="js-model-pill">Coffee &amp; Tea Cafés</span>
        <span class="js-model-pill">Beverage Counters</span>
        <span class="js-model-pill">Snack Shops</span>
        <span class="js-model-pill">Multi-Branch Outlets</span>
      </div>
    </div>
  </section>

  {{-- CONNECTED ECOSYSTEM (7 MODULES) --}}
  <section class="js-sec border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">Connected Ecosystem</div>
        <h2>Everything Your Shop Needs. <span class="sf">Working Together.</span></h2>
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

  {{-- FAQ (ALL 8 ITEMS) --}}
  <section class="js-sec alt">
    <div class="w">
      <div class="hd r">
        <div class="eb">Frequently Asked Questions</div>
        <h2>Juice &amp; Snack Shop <span class="sf">FAQ.</span></h2>
      </div>
      <div class="rm-faq-list r">
        <div class="rm-faq-item open">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>1. Can Geni Menu manage juice shop products?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">Yes. You can organize juices, shakes, smoothies, mocktails and other products through the menu and product management features.</div>
        </div>
        <div class="rm-faq-item">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>2. Can I manage ice cream flavours and sizes?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">Product variations such as flavours and sizes can be managed where supported.</div>
        </div>
        <div class="rm-faq-item">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>3. Can I use Geni Menu for chaat shops?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">Yes. Geni Menu can help manage chaat products, orders, billing, customers and other supported operations.</div>
        </div>
        <div class="rm-faq-item">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>4. Can tea shops use Geni Menu?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">Yes. Tea, coffee, snacks and beverage products can be organized and managed through the platform.</div>
        </div>
        <div class="rm-faq-item">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>5. Can I manage takeaway orders?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">Yes. Takeaway orders can be handled through the supported order-management workflow.</div>
        </div>
        <div class="rm-faq-item">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>6. Can I track ingredients?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">Inventory management can help track ingredients, stock levels and stock movement.</div>
        </div>
        <div class="rm-faq-item">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>7. Can I manage multiple outlets?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">Multi-branch functionality is available where supported by the applicable plan.</div>
        </div>
        <div class="rm-faq-item">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>8. Can I view sales reports?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">Yes. Supported reports provide visibility into sales, orders, products and business activity.</div>
        </div>
      </div>
    </div>
  </section>

  {{-- FINAL CTA --}}
  <section class="rm-cta">
    <div class="w r">
      <h2>Ready to Run Your Shop Smarter?</h2>
      <p>Manage your products, orders, billing, customers, inventory and business insights from one connected platform with Geni Menu.</p>
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

function filterJsMenu(cat, btn) {
  document.querySelectorAll('#jsMenuTabs .js-tab').forEach(b => b.classList.remove('active'));
  btn.classList.add('active');
  document.querySelectorAll('#jsMenuGrid .js-prod-card').forEach(card => {
    card.style.display = (cat === 'all' || card.dataset.cat === cat) ? 'flex' : 'none';
  });
}

function pickJsVar(btn) {
  const group = btn.closest('.js-var-opts');
  group.querySelectorAll('.js-var-btn').forEach(b => b.classList.remove('active'));
  btn.classList.add('active');
}

function jsBillAction(type) {
  const msg = document.getElementById('jsBillMsg');
  if (!msg) return;
  msg.style.display = 'block';
  if (type === 'hold') {
    msg.style.background = 'var(--amber-bg)';
    msg.style.color = 'var(--amber)';
    msg.textContent = 'Counter Sale #842 held — ready to resume anytime.';
  } else {
    msg.style.background = 'var(--green-bg)';
    msg.style.color = 'var(--green)';
    msg.textContent = '✓ Sale #842 settled (₹480) · Receipt ready!';
  }
}

function setJsStep(step) {
  document.querySelectorAll('#jsStepRow .js-step-pill').forEach((p, idx) => p.classList.toggle('done', idx < step));
  const badge = document.getElementById('jsOrderBadge');
  if (badge) {
    const map = ['Ordered', 'Preparing', 'Ready', 'Served'];
    badge.textContent = map[step - 1] || 'Preparing';
    badge.className = step >= 3 ? 'js-badge ready' : 'js-badge preparing';
  }
}

function toggleJsAvail(row) {
  const badge = row.querySelector('.js-badge');
  const isOut = row.classList.toggle('out');
  badge.className = isOut ? 'js-badge soldout' : 'js-badge ready';
  badge.textContent = isOut ? 'Sold Out' : 'Available';
}

document.addEventListener('DOMContentLoaded', function() {
  const els = document.querySelectorAll('.js-page .r');
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
