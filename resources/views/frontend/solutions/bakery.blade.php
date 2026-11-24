@php
$meta = [
    'title' => 'Bakery & Cake Shop POS Software | Geni Menu',
    'description' => 'Bake better, sell smarter, and grow your bakery. Manage bakery products, custom cake orders, cake variations, counter POS billing, ingredient inventory, purchases, and daily sales reports with Geni Menu.',
    'keywords' => 'bakery POS software, cake shop billing software, custom cake order management, bakery inventory software, pastry shop POS, Geni Menu',
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

.bk-page * { box-sizing: border-box; }
.bk-page {
  font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
  color: var(--ink);
  background: var(--bg);
  -webkit-font-smoothing: antialiased;
  overflow-x: hidden;
}

.bk-page h1, .bk-page h2, .bk-page h3, .bk-page h4 {
  margin: 0;
  font-family: 'Outfit', 'Plus Jakarta Sans', sans-serif;
  font-weight: 500;
  line-height: 1.14;
  letter-spacing: -0.025em;
  color: var(--ink);
}
.bk-page h1 { font-size: clamp(34px, 4.6vw, 56px); }
.bk-page h2 { font-size: clamp(28px, 3.6vw, 44px); }
.bk-page h3 { font-size: 20px; font-weight: 600; }
.bk-page p { margin: 0; color: var(--mute); font-size: 16px; line-height: 1.65; }
.bk-page a { text-decoration: none; color: inherit; }

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
.bk-sec { padding: clamp(56px, 6.5vw, 92px) 0; background: var(--bg); position: relative; overflow: hidden; }
.bk-sec.alt { background: var(--bg2); }
.bk-sec.border-b { border-bottom: 1px solid var(--line); }

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

/* Window Chrome */
.rm-win { background: #fff; border: 1px solid var(--line); border-radius: 22px; overflow: hidden; box-shadow: var(--shadow-md); }
.rm-win-bar { display: flex; align-items: center; justify-content: space-between; padding: 13px 20px; background: var(--bg2); border-bottom: 1px solid var(--line); gap: 12px; flex-wrap: wrap; }
.rm-win-dots { display: flex; gap: 6px; }
.rm-win-dots i { width: 10px; height: 10px; border-radius: 50%; display: inline-block; }
.rm-win-dots i:nth-child(1) { background: #ff5f56; }
.rm-win-dots i:nth-child(2) { background: #ffbd2e; }
.rm-win-dots i:nth-child(3) { background: #27c93f; }
.rm-win-ttl { font-family: 'Outfit', sans-serif; font-size: 12px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; color: var(--br); }
.rm-win-body { padding: 24px; }

/* Badges */
.bk-badge { font-size: 10.5px; font-weight: 700; padding: 4px 10px; border-radius: 99px; text-transform: uppercase; letter-spacing: .04em; display: inline-block; }
.bk-badge.ready { background: var(--green-bg); color: var(--green); }
.bk-badge.preparing { background: var(--amber-bg); color: var(--amber); }
.bk-badge.soldout { background: var(--red-bg); color: var(--red); }

/* Split Layouts */
.bk-split { display: grid; grid-template-columns: 1fr 1.08fr; gap: 44px; align-items: start; }
.bk-tag-row { display: flex; gap: 8px; flex-wrap: wrap; margin-top: 20px; }
.bk-tag { padding: 6px 12px; border-radius: 99px; background: #fff; border: 1px solid var(--line); font-size: 12px; font-weight: 700; color: var(--mute); }

/* Catalogue Cards */
.bk-prod-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 14px; margin-top: 24px; }
.bk-prod-card { display: flex; align-items: center; gap: 13px; padding: 12px; border: 1px solid var(--line); border-radius: 16px; background: #fff; transition: .25s ease; }
.bk-prod-card:hover { border-color: var(--br); transform: translateY(-2px); box-shadow: var(--shadow-sm); }
.bk-prod-img { width: 64px; height: 64px; border-radius: 12px; object-fit: cover; flex-shrink: 0; }
.bk-prod-card h4 { font-size: 14.5px; font-weight: 700; margin-bottom: 3px; }
.bk-prod-price { font-family: 'Outfit', sans-serif; font-weight: 700; color: var(--br); font-size: 14px; }
.bk-prod-wt { font-size: 11px; color: var(--mute); background: var(--bg2); padding: 2px 8px; border-radius: 6px; display: inline-block; margin-left: 6px; font-weight: 600; }

/* Custom Cake Order & Size Selector */
.bk-cake-quote { font-family: 'Playfair Display', serif; font-size: 19px; font-style: italic; color: var(--br); text-align: center; padding: 14px 16px; border: 1.5px dashed rgba(135, 96, 57, 0.35); border-radius: 12px; background: var(--br-light); margin: 14px 0; }
.bk-cake-meta { list-style: none; padding: 0; margin: 0 0 18px; display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px; }
.bk-cake-meta li { background: var(--bg2); border: 1px solid var(--line); border-radius: 10px; padding: 10px 12px; font-size: 12px; color: var(--mute); }
.bk-cake-meta strong { display: block; font-size: 13px; color: var(--ink); margin-top: 2px; }

.bk-var-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 8px; margin-top: 10px; }
.bk-var-btn { padding: 10px 8px; border-radius: 12px; border: 1.5px solid var(--line); background: #fff; cursor: pointer; text-align: center; transition: .2s ease; font-family: 'Plus Jakarta Sans', sans-serif; }
.bk-var-btn span { display: block; font-size: 12px; font-weight: 700; color: var(--mute); }
.bk-var-btn strong { display: block; font-family: 'Outfit', sans-serif; font-size: 15px; color: var(--ink); margin-top: 2px; }
.bk-var-btn.active, .bk-var-btn:hover { border-color: var(--br); background: var(--br-light); }
.bk-var-btn.active strong { color: var(--br); }

/* Counter Billing & Order Ticket */
.bk-bill-row { display: flex; justify-content: space-between; align-items: center; padding: 10px 0; border-bottom: 1px dashed var(--line); font-size: 14px; }
.bk-bill-row small { display: block; font-size: 12px; color: var(--mute); }
.bk-bill-total { display: flex; justify-content: space-between; align-items: center; padding: 16px 0 12px; font-family: 'Outfit', sans-serif; font-size: 22px; font-weight: 700; color: var(--br); }
.bk-bill-actions { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-top: 10px; }
.bk-act-btn { padding: 12px; border-radius: 10px; border: 1.5px solid var(--line); background: #fff; color: var(--ink); font: 700 13.5px 'Plus Jakarta Sans', sans-serif; cursor: pointer; transition: .2s ease; }
.bk-act-btn.primary { background: var(--br); color: #fff; border-color: var(--br); }
.bk-act-btn:hover { transform: translateY(-1px); }
.bk-bill-msg { margin-top: 12px; font-size: 12px; font-weight: 700; color: var(--green); background: var(--green-bg); padding: 8px 12px; border-radius: 10px; text-align: center; display: none; }

.bk-step-row { display: grid; grid-template-columns: repeat(5, 1fr); gap: 6px; margin-top: 14px; }
.bk-step-pill { padding: 9px 4px; border-radius: 10px; border: 1px solid var(--line); background: var(--bg2); color: var(--mute); font-size: 11px; font-weight: 700; text-align: center; cursor: pointer; transition: .2s ease; }
.bk-step-pill.done { background: var(--br-light); color: var(--br); border-color: var(--br); }
.bk-peak-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 10px; margin-top: 18px; padding-top: 18px; border-top: 1px dashed var(--line); }
.bk-peak-box { background: var(--bg2); border: 1px solid var(--line); border-radius: 12px; padding: 12px 8px; text-align: center; }
.bk-peak-box strong { display: block; font-family: 'Outfit', sans-serif; font-size: 22px; font-weight: 600; color: var(--br); line-height: 1.15; }
.bk-peak-box span { font-size: 10.5px; font-weight: 700; color: var(--mute); text-transform: uppercase; }

/* Availability, Inventory, PO & Customer */
.bk-avail-list { display: flex; flex-direction: column; gap: 8px; }
.bk-avail-row { display: flex; justify-content: space-between; align-items: center; padding: 11px 14px; border-radius: 12px; border: 1px solid var(--line); background: #fff; font-size: 14px; font-weight: 600; cursor: pointer; transition: .2s ease; }
.bk-avail-row:hover { border-color: var(--br); }
.bk-avail-row.out { background: var(--red-bg); border-color: rgba(185, 28, 28, 0.22); }

.bk-inv-table { width: 100%; border-collapse: collapse; }
.bk-inv-table th { text-align: left; font-size: 11px; font-weight: 700; color: var(--mute); text-transform: uppercase; letter-spacing: .06em; padding: 10px 12px; background: var(--bg2); border-bottom: 1px solid var(--line); }
.bk-inv-table td { padding: 11px 12px; font-size: 13.5px; border-bottom: 1px solid var(--line); }
.bk-inv-table tr:last-child td { border-bottom: none; }

.bk-mini-card { background: var(--bg2); border: 1px solid var(--line); border-radius: 16px; padding: 18px; margin-top: 18px; }
.bk-mini-list { list-style: none; padding: 0; margin: 10px 0 0; font-size: 13.5px; }
.bk-mini-list li { display: flex; justify-content: space-between; padding: 5px 0; border-bottom: 1px dashed var(--line); }
.bk-mini-list li:last-child { border-bottom: none; }

/* Dark Editorial Bakery Reports Banner */
.rm-dark-banner { background: linear-gradient(135deg, #21160F 0%, #342318 100%); border-radius: 26px; padding: clamp(28px, 4vw, 48px); color: #fff; box-shadow: var(--shadow-lg); position: relative; overflow: hidden; }
.rm-dark-banner::after { content: ''; position: absolute; right: -80px; top: -80px; width: 280px; height: 280px; border-radius: 50%; background: radial-gradient(circle, rgba(184, 142, 86, 0.24) 0%, transparent 70%); pointer-events: none; }
.rm-dark-top { display: flex; justify-content: space-between; align-items: flex-end; gap: 24px; flex-wrap: wrap; margin-bottom: 28px; padding-bottom: 24px; border-bottom: 1px solid rgba(255, 255, 255, 0.12); }
.rm-dark-top h2 { color: #fff; font-size: clamp(26px, 3vw, 36px); }
.rm-dark-top p { color: rgba(255, 255, 255, 0.72); max-width: 520px; margin-top: 8px; }
.rm-dark-kpis { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; margin-bottom: 28px; }
.rm-dark-kpi { background: rgba(255, 255, 255, 0.06); border: 1px solid rgba(255, 255, 255, 0.12); border-radius: 16px; padding: 18px 20px; }
.rm-dark-kpi strong { display: block; font-family: 'Outfit', sans-serif; font-size: 28px; font-weight: 600; color: #F5EFE6; line-height: 1.15; }
.rm-dark-kpi span { font-size: 11.5px; font-weight: 700; color: rgba(255, 255, 255, 0.65); text-transform: uppercase; letter-spacing: .06em; }
.bk-bars { height: 150px; display: grid; grid-template-columns: repeat(6, 1fr); align-items: end; gap: 14px; padding-bottom: 26px; border-bottom: 1px solid rgba(255, 255, 255, 0.16); }
.bk-bar-col { display: flex; flex-direction: column; align-items: center; justify-content: flex-end; height: 100%; position: relative; }
.bk-bar-fill { width: 100%; max-width: 64px; background: linear-gradient(180deg, #d7ac71 0%, #876039 100%); border-radius: 8px 8px 0 0; }
.bk-bar-lbl { position: absolute; bottom: -22px; font-size: 11px; font-weight: 600; color: rgba(255, 255, 255, 0.72); }

/* 6-Step Bakery Progression */
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

/* Photo Cards for Bakery Formats */
.rm-ind-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 18px; margin-bottom: 22px; }
.rm-ind-card { position: relative; border-radius: 18px; overflow: hidden; aspect-ratio: 4 / 3; border: 1px solid var(--line); box-shadow: var(--shadow-sm); }
.rm-ind-card img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.55s ease; display: block; }
.rm-ind-card:hover img { transform: scale(1.07); }
.rm-ind-card::after { content: ''; position: absolute; inset: 0; background: linear-gradient(180deg, transparent 35%, rgba(24, 16, 10, 0.84) 100%); }
.rm-ind-cap { position: absolute; left: 16px; right: 16px; bottom: 14px; z-index: 2; color: #fff; }
.rm-ind-cap strong { display: block; font-family: 'Outfit', sans-serif; font-size: 16px; font-weight: 600; }
.rm-ind-cap span { font-size: 12px; color: rgba(255, 255, 255, 0.8); }
.bk-model-pills { display: flex; flex-wrap: wrap; justify-content: center; gap: 10px; }
.bk-model-pill { padding: 9px 16px; border-radius: 99px; background: #fff; border: 1px solid var(--line); font-size: 13px; font-weight: 700; color: var(--ink); }

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
  .rm-hero-grid, .bk-split { grid-template-columns: 1fr; gap: 36px; }
  .rm-val-grid, .rm-dark-kpis, .rm-ind-grid { grid-template-columns: repeat(2, 1fr); }
  .rm-prog-grid-6 { grid-template-columns: repeat(3, 1fr); }
  .rm-ben-grid { grid-template-columns: repeat(2, 1fr); }
  .rm-eco-grid { grid-template-columns: repeat(4, 1fr); }
}
@media (max-width: 640px) {
  .w { padding: 0 16px; }
  .rm-val-grid, .bk-prod-grid, .bk-cake-meta, .bk-var-grid, .bk-peak-grid, .rm-dark-kpis, .rm-prog-grid-6, .rm-ben-grid, .rm-ind-grid { grid-template-columns: 1fr; }
  .bk-step-row { grid-template-columns: repeat(2, 1fr); }
  .rm-eco-grid { grid-template-columns: repeat(2, 1fr); }
  .rm-hero-stats { grid-template-columns: 1fr; gap: 12px; }
  .rm-hero-cta .btn, .rm-cta-btns .btn { width: 100%; }
  .rm-hero-float { flex-direction: column; align-items: flex-start; }
}
</style>

<div class="bk-page">
  {{-- BREADCRUMB --}}
  <nav class="bc" aria-label="Breadcrumb">
    <div class="w">
      <a href="{{ url('/') }}">Home</a>
      <span class="sep">/</span>
      <a href="{{ route('solutions') }}">Solutions</a>
      <span class="sep">/</span>
      <span class="cur">Bakeries &amp; Cake Shops</span>
    </div>
  </nav>

  {{-- HERO --}}
  <section class="rm-hero">
    <div class="w rm-hero-grid">
      <div>
        <div class="eb">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M20 21v-8a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v8"/><path d="M4 16s.5-1 2-1 2.5 2 4 2 2.5-2 4-2 2.5 2 4 2 2-1 2-1"/><path d="M2 21h20"/><path d="M7 8v3"/><path d="M12 8v3"/><path d="M17 8v3"/></svg>
          BAKERY &amp; CAKE SHOP SOLUTION
        </div>
        <h1>Bake Better. <span class="sf">Sell Smarter.</span> Grow Your Bakery.</h1>
        <p class="rm-hero-sub">Manage your bakery products, cakes, customer orders, billing, inventory and daily shop operations from one connected platform built for modern bakeries and cake shops.</p>
        <div class="rm-hero-cta">
          <a href="{{ route('restaurant_signup') }}" class="btn p">Get Started →</a>
          <a href="{{ route('contact.us') }}" class="btn o">Book a Demo →</a>
        </div>
        <div class="rm-hero-stats">
          <div class="rm-hero-stat">
            <strong>₹32,450</strong>
            <span>Live daily counter sales</span>
          </div>
          <div class="rm-hero-stat">
            <strong>12 Active</strong>
            <span>Orders &amp; 4 custom cakes</span>
          </div>
          <div class="rm-hero-stat">
            <strong>½ kg – 2 kg+</strong>
            <span>Cake size variations</span>
          </div>
        </div>
      </div>

      <div class="rm-hero-media">
        <img src="{{ asset('assets/images/bakery-hero.jpg') }}" alt="Smiling bakery counter specialist using a tablet POS beside artisanal celebration cakes and pastry showcase">
        <div class="rm-hero-scrim"></div>
        <div class="rm-hero-pill">
          <span class="rm-live-dot"></span>
          Live · 4 Cake Orders · 3 Ready for Pickup
        </div>
        <div class="rm-hero-float">
          <div class="rm-hero-float-left">
            <div class="rm-hero-float-ico">
              <svg viewBox="0 0 24 24"><path d="M20 21v-8a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v8"/><path d="M2 21h20"/><path d="M12 4v4"/></svg>
            </div>
            <div>
              <div class="rm-hero-float-ttl">ORDER #3048 · Chocolate Truffle Cake (2 kg)</div>
              <div class="rm-hero-float-sub">“Happy Birthday Arun!” · Priya Kumar · Pickup 5:30 PM</div>
            </div>
          </div>
          <span class="rm-hero-float-tag">Preparing</span>
        </div>
      </div>
    </div>
  </section>

  {{-- VALUE STRIP (01 - 04) --}}
  <section class="bk-sec border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">Built For Bakeries</div>
        <h2>Everything Your Bakery Needs. <span class="sf">Connected in One Place.</span></h2>
        <p>From product management to customer orders, billing and inventory, Geni Menu brings your everyday bakery operations together in one simple platform.</p>
      </div>
      <div class="rm-val-grid">
        <div class="rm-val-card r">
          <div class="rm-val-top">
            <div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg></div>
            <span class="rm-num">01</span>
          </div>
          <h3>Digital Cake Catalogue</h3>
          <p>Organize cakes, pastries, breads, savouries, desserts and beverages with clear images, prices and availability.</p>
        </div>
        <div class="rm-val-card r">
          <div class="rm-val-top">
            <div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg></div>
            <span class="rm-num">02</span>
          </div>
          <h3>Custom Cake Orders</h3>
          <p>Capture cake weights, flavours, themes, custom messages and pickup times so every special order is prepared accurately.</p>
        </div>
        <div class="rm-val-card r">
          <div class="rm-val-top">
            <div class="rm-ic"><svg viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg></div>
            <span class="rm-num">03</span>
          </div>
          <h3>Fast Counter POS</h3>
          <p>Process everyday pastries, puffs, breads and cake bills quickly with Hold Bill and connected payment tracking.</p>
        </div>
        <div class="rm-val-card r">
          <div class="rm-val-top">
            <div class="rm-ic"><svg viewBox="0 0 24 24"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></div>
            <span class="rm-num">04</span>
          </div>
          <h3>Stock, Purchases &amp; Reports</h3>
          <p>Track flour, cocoa, eggs, cake boxes, supplier purchase orders, repeat customers and daily sales insights.</p>
        </div>
      </div>
    </div>
  </section>

  {{-- DIGITAL CATALOGUE + CUSTOM CAKE ORDER & VARIATIONS --}}
  <section class="bk-sec alt border-b">
    <div class="w bk-split">
      <div class="r">
        <div class="eb">Bakery Catalogue</div>
        <h2>Turn Your Bakery Collection Into a <span class="sf">Beautiful Digital Catalogue.</span></h2>
        <p style="margin-top:12px;">Present your bakery products clearly with organized categories, product images, pricing and availability.</p>

        <div class="bk-tag-row">
          <span class="bk-tag">Birthday Cakes</span>
          <span class="bk-tag">Wedding Cakes</span>
          <span class="bk-tag">Custom Cakes</span>
          <span class="bk-tag">Pastries</span>
          <span class="bk-tag">Cupcakes</span>
          <span class="bk-tag">Brownies</span>
          <span class="bk-tag">Cookies</span>
          <span class="bk-tag">Breads</span>
          <span class="bk-tag">Puffs &amp; Savouries</span>
        </div>

        <div class="bk-prod-grid">
          <div class="bk-prod-card">
            <img class="bk-prod-img" src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=200&q=80" alt="Chocolate Truffle Cake" referrerpolicy="no-referrer">
            <div>
              <h4>Chocolate Truffle</h4>
              <span class="bk-prod-price">₹950</span><span class="bk-prod-wt">1 kg</span>
            </div>
          </div>
          <div class="bk-prod-card">
            <img class="bk-prod-img" src="https://images.unsplash.com/photo-1614707267537-b85aaf00c4b7?w=200&q=80" alt="Red Velvet Cake" referrerpolicy="no-referrer">
            <div>
              <h4>Red Velvet Cake</h4>
              <span class="bk-prod-price">₹1,100</span><span class="bk-prod-wt">1 kg</span>
            </div>
          </div>
          <div class="bk-prod-card">
            <img class="bk-prod-img" src="https://images.unsplash.com/photo-1576618148400-f54bed99fcfd?w=200&q=80" alt="Blueberry Cupcake" referrerpolicy="no-referrer">
            <div>
              <h4>Blueberry Cupcake</h4>
              <span class="bk-prod-price">₹80</span><span class="bk-prod-wt">1 pc</span>
            </div>
          </div>
          <div class="bk-prod-card">
            <img class="bk-prod-img" src="https://images.unsplash.com/photo-1509440159596-0249088772ff?w=200&q=80" alt="Sourdough Bread" referrerpolicy="no-referrer">
            <div>
              <h4>Sourdough Bread</h4>
              <span class="bk-prod-price">₹180</span><span class="bk-prod-wt">Loaf</span>
            </div>
          </div>
        </div>
      </div>

      {{-- Interactive Custom Cake Order & Weight Variations --}}
      <div class="rm-win r">
        <div class="rm-win-bar">
          <div class="rm-win-dots"><i></i><i></i><i></i></div>
          <div class="rm-win-ttl">Custom Cake Order · #3048</div>
          <span class="bk-badge preparing">Preparing</span>
        </div>
        <div class="rm-win-body">
          <div style="display:flex; justify-content:space-between; align-items:center; gap:12px;">
            <div>
              <h3 style="font-size:19px;">Chocolate Truffle Cake</h3>
              <p style="font-size:13px;" id="bkCakeSelectedMeta">Selected size: 2 kg · ₹1,850</p>
            </div>
            <span class="bk-badge ready">Custom Note</span>
          </div>

          <div class="bk-cake-quote">“Happy Birthday Arun!”</div>

          <ul class="bk-cake-meta">
            <li>Theme<strong>Blue &amp; Gold</strong></li>
            <li>Customer<strong>Priya Kumar</strong></li>
            <li>Pickup<strong>Today, 5:30 PM</strong></li>
          </ul>

          <div style="font-size:12px; font-weight:700; text-transform:uppercase; letter-spacing:.06em; color:var(--mute);">Select Cake Size &amp; Variations</div>
          <div class="bk-var-grid" id="bkVarGrid">
            <button type="button" class="bk-var-btn" onclick="selectCakeSize('½ kg', '₹550', this)"><span>½ kg</span><strong>₹550</strong></button>
            <button type="button" class="bk-var-btn" onclick="selectCakeSize('1 kg', '₹950', this)"><span>1 kg</span><strong>₹950</strong></button>
            <button type="button" class="bk-var-btn" onclick="selectCakeSize('1.5 kg', '₹1,400', this)"><span>1.5 kg</span><strong>₹1,400</strong></button>
            <button type="button" class="bk-var-btn active" onclick="selectCakeSize('2 kg', '₹1,850', this)"><span>2 kg</span><strong>₹1,850</strong></button>
          </div>

          <div class="bk-tag-row" style="margin-top:14px;">
            <span class="bk-tag">Flavour</span>
            <span class="bk-tag">Size</span>
            <span class="bk-tag">Filling</span>
            <span class="bk-tag">Toppings</span>
            <span class="bk-tag">Custom Message</span>
          </div>
          <div style="font-size:11.5px; color:var(--mute); margin-top:12px;">* Illustrative example of supported features.</div>
        </div>
      </div>
    </div>
  </section>

  {{-- COUNTER BILLING + ORDER TRACKING & PEAK OCCASIONS --}}
  <section class="bk-sec border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">Counter POS &amp; Peak Occasions</div>
        <h2>Faster Billing &amp; Clear Order Tracking <span class="sf">Even on Busiest Days.</span></h2>
        <p>Process everyday bakery purchases quickly at the counter while staying ready for birthdays, weddings, anniversaries and festive order surges.</p>
      </div>

      <div class="bk-split">
        {{-- Interactive Counter Billing --}}
        <div class="rm-win r">
          <div class="rm-win-bar">
            <div class="rm-win-dots"><i></i><i></i><i></i></div>
            <div class="rm-win-ttl">Counter Sale #142</div>
            <span class="bk-badge ready">POS Ready</span>
          </div>
          <div class="rm-win-body">
            <div class="bk-bill-row">
              <div><strong>Chocolate Pastry</strong><small>× 2</small></div>
              <strong>₹180</strong>
            </div>
            <div class="bk-bill-row">
              <div><strong>Chicken Puff</strong><small>× 2</small></div>
              <strong>₹100</strong>
            </div>
            <div class="bk-bill-row">
              <div><strong>Blueberry Cupcake</strong><small>× 2</small></div>
              <strong>₹160</strong>
            </div>
            <div class="bk-bill-row">
              <div><strong>Cold Coffee</strong><small>× 1</small></div>
              <strong>₹120</strong>
            </div>
            <div class="bk-bill-total">
              <span>TOTAL</span>
              <span>₹560</span>
            </div>
            <div class="bk-bill-actions">
              <button type="button" class="bk-act-btn" onclick="bakeryBillAction('hold')">Hold Bill</button>
              <button type="button" class="bk-act-btn primary" onclick="bakeryBillAction('pay')">Pay &amp; Complete</button>
            </div>
            <div class="bk-bill-msg" id="bkBillMsg"></div>
          </div>
        </div>

        {{-- Live Order Ticket & Peak Occasion Dashboard --}}
        <div class="rm-win r">
          <div class="rm-win-bar">
            <div class="rm-win-dots"><i></i><i></i><i></i></div>
            <div class="rm-win-ttl">Order #3048 · Priya · Pickup 6:00 PM</div>
            <span class="bk-badge ready" id="bkOrderBadge">Ready</span>
          </div>
          <div class="rm-win-body">
            <div style="display:flex; justify-content:space-between; flex-wrap:wrap; gap:8px; font-size:13.5px; color:var(--ink); margin-bottom:6px;">
              <strong>2kg Chocolate Cake</strong>
              <span>6 Cupcakes · 1 Box Brownies</span>
            </div>
            <p style="font-size:12.5px;">Click any stage below to update order progress:</p>
            <div class="bk-step-row" id="bkStepRow">
              <button type="button" class="bk-step-pill done" onclick="setBakeryStep(1)">1. Order</button>
              <button type="button" class="bk-step-pill done" onclick="setBakeryStep(2)">2. Prepare</button>
              <button type="button" class="bk-step-pill done" onclick="setBakeryStep(3)">3. Pack</button>
              <button type="button" class="bk-step-pill done" onclick="setBakeryStep(4)">4. Bill</button>
              <button type="button" class="bk-step-pill" onclick="setBakeryStep(5)">5. Pickup</button>
            </div>

            <div class="bk-peak-grid">
              <div class="bk-peak-box"><strong>18</strong><span>New Orders</span></div>
              <div class="bk-peak-box"><strong>12</strong><span>Preparing</span></div>
              <div class="bk-peak-box"><strong>8</strong><span>Ready</span></div>
              <div class="bk-peak-box"><strong style="color:var(--green);">96</strong><span>Completed</span></div>
            </div>

            <div class="bk-tag-row" style="margin-top:14px;">
              <span class="bk-tag">Birthdays</span>
              <span class="bk-tag">Weddings</span>
              <span class="bk-tag">Anniversaries</span>
              <span class="bk-tag">Festivals</span>
              <span class="bk-tag">Corporate Events</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- AVAILABILITY, INVENTORY, PURCHASES & CUSTOMER HISTORY --}}
  <section class="bk-sec alt border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">Stock, Purchases &amp; Customers</div>
        <h2>Know What You Have. <span class="sf">Know What You Need.</span></h2>
        <p>Keep product availability current, monitor core baking ingredients and purchase orders, and maintain repeat customer order history in one place.</p>
      </div>

      <div class="bk-split">
        {{-- Availability + Customer History --}}
        <div class="rm-win r">
          <div class="rm-win-bar">
            <div class="rm-win-dots"><i></i><i></i><i></i></div>
            <div class="rm-win-ttl">Product Availability · Tap to Toggle</div>
          </div>
          <div class="rm-win-body">
            <div class="bk-avail-list">
              <div class="bk-avail-row" onclick="toggleAvail(this)"><span>Chocolate Truffle Cake</span><span class="bk-badge ready">Available</span></div>
              <div class="bk-avail-row" onclick="toggleAvail(this)"><span>Red Velvet Cake</span><span class="bk-badge ready">Available</span></div>
              <div class="bk-avail-row" onclick="toggleAvail(this)"><span>Black Forest Pastry</span><span class="bk-badge ready">Available</span></div>
              <div class="bk-avail-row out" onclick="toggleAvail(this)"><span>Blueberry Cheesecake</span><span class="bk-badge soldout">Sold Out</span></div>
              <div class="bk-avail-row" onclick="toggleAvail(this)"><span>Chicken Puff</span><span class="bk-badge ready">Available</span></div>
              <div class="bk-avail-row" onclick="toggleAvail(this)"><span>Croissant</span><span class="bk-badge ready">Available</span></div>
            </div>

            <div class="bk-mini-card">
              <div style="display:flex; justify-content:space-between; align-items:center;">
                <div>
                  <strong style="font-size:15.5px; display:block;">Priya Kumar</strong>
                  <span style="font-size:12px; color:var(--mute);">Repeat Bakery Customer</span>
                </div>
                <div style="text-align:right;">
                  <span style="font-size:10.5px; font-weight:700; color:var(--mute); text-transform:uppercase;">Total Orders</span>
                  <strong style="display:block; font-size:18px; color:var(--br);">8</strong>
                </div>
              </div>
              <ul class="bk-mini-list">
                <li><span>Chocolate Truffle Cake</span><strong>2 kg</strong></li>
                <li><span>Red Velvet Cake</span><strong>1 kg</strong></li>
                <li><span>Cupcakes</span><strong>12 pcs</strong></li>
              </ul>
            </div>
          </div>
        </div>

        {{-- Inventory Table + Purchase Order --}}
        <div class="rm-win r">
          <div class="rm-win-bar">
            <div class="rm-win-dots"><i></i><i></i><i></i></div>
            <div class="rm-win-ttl">Bakery Inventory &amp; Purchases</div>
          </div>
          <div class="rm-win-body">
            <table class="bk-inv-table">
              <thead>
                <tr>
                  <th>Ingredient</th>
                  <th>Stock</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <tr><td><strong>Flour</strong></td><td>50 kg</td><td><span class="bk-badge ready">In Stock</span></td></tr>
                <tr><td><strong>Sugar</strong></td><td>40 kg</td><td><span class="bk-badge ready">In Stock</span></td></tr>
                <tr><td><strong>Cocoa Powder</strong></td><td>10 kg</td><td><span class="bk-badge soldout">Low</span></td></tr>
                <tr><td><strong>Eggs</strong></td><td>600 pcs</td><td><span class="bk-badge ready">In Stock</span></td></tr>
                <tr><td><strong>Cake Boxes</strong></td><td>300 pcs</td><td><span class="bk-badge ready">In Stock</span></td></tr>
              </tbody>
            </table>

            <div class="bk-mini-card">
              <div style="display:flex; justify-content:space-between; align-items:center;">
                <div>
                  <strong style="font-size:15px; display:block;">PO-2056</strong>
                  <span style="font-size:12px; color:var(--mute);">Supplier: BakeSupplies Inc</span>
                </div>
                <span class="bk-badge ready">Received</span>
              </div>
              <ul class="bk-mini-list">
                <li><span>Flour</span><strong>50 kg</strong></li>
                <li><span>Butter</span><strong>20 kg</strong></li>
                <li><span>Sugar</span><strong>40 kg</strong></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- DARK EDITORIAL BAKERY BUSINESS REPORTS --}}
  <section class="bk-sec border-b">
    <div class="w">
      <div class="rm-dark-banner r">
        <div class="rm-dark-top">
          <div>
            <div class="eb" style="background:rgba(255,255,255,0.1); color:#e6c594; border-color:rgba(230,197,148,0.28);">Bakery Business Reports</div>
            <h2>Understand What <span class="sf" style="-webkit-text-fill-color:#e6c594;">Is Selling.</span></h2>
            <p>Turn everyday bakery sales and order data into clear business insights — directly from your counter or smartphone.</p>
          </div>
          <span class="bk-badge ready" style="background:rgba(22,163,74,0.2); color:#86efac;">● Live Sales Summary</span>
        </div>

        <div class="rm-dark-kpis">
          <div class="rm-dark-kpi"><strong>₹48,650</strong><span>Daily Sales</span></div>
          <div class="rm-dark-kpi"><strong>124</strong><span>Total Orders</span></div>
          <div class="rm-dark-kpi"><strong>Cakes</strong><span>Top Category</span></div>
          <div class="rm-dark-kpi"><strong>4PM – 7PM</strong><span>Peak Hours</span></div>
        </div>

        <div class="bk-bars">
          <div class="bk-bar-col"><div class="bk-bar-fill" style="height:100%;"></div><span class="bk-bar-lbl">Cakes</span></div>
          <div class="bk-bar-col"><div class="bk-bar-fill" style="height:60%;"></div><span class="bk-bar-lbl">Pastries</span></div>
          <div class="bk-bar-col"><div class="bk-bar-fill" style="height:80%;"></div><span class="bk-bar-lbl">Breads</span></div>
          <div class="bk-bar-col"><div class="bk-bar-fill" style="height:50%;"></div><span class="bk-bar-lbl">Savouries</span></div>
          <div class="bk-bar-col"><div class="bk-bar-fill" style="height:40%;"></div><span class="bk-bar-lbl">Cookies</span></div>
          <div class="bk-bar-col"><div class="bk-bar-fill" style="height:30%;"></div><span class="bk-bar-lbl">Beverages</span></div>
        </div>
        <div style="text-align:center; margin-top:26px; font-size:11.5px; color:rgba(255,255,255,0.48);">* Demo/example data shown for illustrative purposes.</div>
      </div>
    </div>
  </section>

  {{-- 6-STEP BAKERY WORKFLOW --}}
  <section class="bk-sec alt border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">Bakery Workflow</div>
        <h2>One Connected Workflow. <span class="sf">From Product to Pickup.</span></h2>
        <p>Geni Menu connects different parts of your bakery operations so everything works together smoothly.</p>
      </div>
      <div class="rm-prog-grid-6 r">
        <div class="rm-prog-card"><div class="rm-prog-num">01</div><h4>Product Catalogue</h4><p>Browse cakes, pastries &amp; breads</p></div>
        <div class="rm-prog-card"><div class="rm-prog-num">02</div><h4>Customer Order</h4><p>Capture sizes &amp; custom notes</p></div>
        <div class="rm-prog-card"><div class="rm-prog-num">03</div><h4>Preparation</h4><p>Bake &amp; decorate on schedule</p></div>
        <div class="rm-prog-card"><div class="rm-prog-num">04</div><h4>Packing</h4><p>Box with cake labels &amp; add-ons</p></div>
        <div class="rm-prog-card"><div class="rm-prog-num">05</div><h4>Billing &amp; Payment</h4><p>Quick counter checkout</p></div>
        <div class="rm-prog-card"><div class="rm-prog-num">06</div><h4>Pickup / Handover</h4><p>On-time customer delivery</p></div>
      </div>
    </div>
  </section>

  {{-- WHY BAKERIES CHOOSE GENI MENU (01 - 06) --}}
  <section class="bk-sec border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">Key Benefits</div>
        <h2>Why Bakeries Choose <span class="sf">Geni Menu.</span></h2>
      </div>
      <div class="rm-ben-grid">
        <div class="rm-ben-card r">
          <div class="rm-val-top">
            <div class="rm-ic"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="M21 15l-5-5L5 21"/></svg></div>
            <span class="rm-num">01</span>
          </div>
          <h3>Beautiful Product Catalogue</h3>
          <p>Showcase cakes, pastries, breads and bakery products professionally.</p>
        </div>
        <div class="rm-ben-card r">
          <div class="rm-val-top">
            <div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M20 21v-8a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v8"/><path d="M2 21h20"/><path d="M12 4v4"/></svg></div>
            <span class="rm-num">02</span>
          </div>
          <h3>Custom Cake Order Management</h3>
          <p>Keep special cake requirements and customer instructions organized where supported.</p>
        </div>
        <div class="rm-ben-card r">
          <div class="rm-val-top">
            <div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg></div>
            <span class="rm-num">03</span>
          </div>
          <h3>Faster Counter Billing</h3>
          <p>Process everyday bakery transactions quickly.</p>
        </div>
        <div class="rm-ben-card r">
          <div class="rm-val-top">
            <div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg></div>
            <span class="rm-num">04</span>
          </div>
          <h3>Inventory Visibility</h3>
          <p>Monitor ingredients, supplies and stock levels.</p>
        </div>
        <div class="rm-ben-card r">
          <div class="rm-val-top">
            <div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></div>
            <span class="rm-num">05</span>
          </div>
          <h3>Customer Management</h3>
          <p>Keep customer information and order history organized.</p>
        </div>
        <div class="rm-ben-card r">
          <div class="rm-val-top">
            <div class="rm-ic"><svg viewBox="0 0 24 24"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></div>
            <span class="rm-num">06</span>
          </div>
          <h3>Business Insights</h3>
          <p>Understand sales, orders, products and bakery performance.</p>
        </div>
      </div>
    </div>
  </section>

  {{-- BUILT FOR EVERY KIND OF BAKERY BUSINESS --}}
  <section class="bk-sec alt border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">Ideal For</div>
        <h2>Built for Every Kind of <span class="sf">Bakery Business.</span></h2>
      </div>
      <div class="rm-ind-grid r">
        <div class="rm-ind-card">
          <img src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?auto=format&fit=crop&w=700&q=80" alt="Custom Cake Studios" referrerpolicy="no-referrer">
          <div class="rm-ind-cap"><strong>Custom Cake Studios</strong><span>Celebration, wedding &amp; theme cakes</span></div>
        </div>
        <div class="rm-ind-card">
          <img src="https://images.unsplash.com/photo-1555507036-ab1f4038808a?auto=format&fit=crop&w=700&q=80" alt="Artisan Bakeries & Pastry Shops" referrerpolicy="no-referrer">
          <div class="rm-ind-cap"><strong>Pastry &amp; Croissant Shops</strong><span>Fast counter billing &amp; fresh batches</span></div>
        </div>
        <div class="rm-ind-card">
          <img src="https://images.unsplash.com/photo-1509440159596-0249088772ff?auto=format&fit=crop&w=700&q=80" alt="Bread & Bakery Stores" referrerpolicy="no-referrer">
          <div class="rm-ind-cap"><strong>Bread &amp; Bakery Stores</strong><span>Daily loaves, buns &amp; savouries</span></div>
        </div>
        <div class="rm-ind-card">
          <img src="https://images.unsplash.com/photo-1551024601-bec78aea704b?auto=format&fit=crop&w=700&q=80" alt="Café & Dessert Boutiques" referrerpolicy="no-referrer">
          <div class="rm-ind-cap"><strong>Café &amp; Dessert Boutiques</strong><span>Cupcakes, donuts &amp; multi-branch chains</span></div>
        </div>
      </div>
      <div class="bk-model-pills r">
        <span class="bk-model-pill">Bakeries</span>
        <span class="bk-model-pill">Cake Shops</span>
        <span class="bk-model-pill">Custom Cake Studios</span>
        <span class="bk-model-pill">Pastry Shops</span>
        <span class="bk-model-pill">Bread &amp; Bakery Stores</span>
        <span class="bk-model-pill">Dessert Shops</span>
        <span class="bk-model-pill">Cupcake Shops</span>
        <span class="bk-model-pill">Donut Shops</span>
        <span class="bk-model-pill">Café &amp; Bakeries</span>
        <span class="bk-model-pill">Premium Cake Boutiques</span>
        <span class="bk-model-pill">Bakery Chains</span>
        <span class="bk-model-pill">Multi-Branch Bakeries</span>
      </div>
    </div>
  </section>

  {{-- CONNECTED ECOSYSTEM (7 MODULES) --}}
  <section class="bk-sec border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">Connected Ecosystem</div>
        <h2>Everything Works Better <span class="sf">Together.</span></h2>
        <p>Every bakery module works together seamlessly — from digital cake catalogues to counter POS, inventory and reports.</p>
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

  {{-- FAQ --}}
  <section class="bk-sec alt">
    <div class="w">
      <div class="hd r">
        <div class="eb">Frequently Asked Questions</div>
        <h2>Bakery &amp; Cake Shop <span class="sf">FAQ.</span></h2>
      </div>
      <div class="rm-faq-list r">
        <div class="rm-faq-item open">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>1. Can Geni Menu manage bakery products?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">Yes. Geni Menu can help organize bakery products, categories, pricing and availability.</div>
        </div>
        <div class="rm-faq-item">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>2. Can I manage cake orders?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">Yes, cake and customer orders can be organized through the order management workflow, with custom requirements where supported.</div>
        </div>
        <div class="rm-faq-item">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>3. Can I manage cake sizes and variations?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">Product variations such as size, flavour and other options can be represented where supported.</div>
        </div>
        <div class="rm-faq-item">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>4. Can I use Geni Menu for counter billing?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">Yes. The POS and billing workflow is designed to support everyday bakery counter transactions.</div>
        </div>
        <div class="rm-faq-item">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>5. Can I track bakery ingredients?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">Inventory management can help track ingredients, stock levels and stock movement.</div>
        </div>
        <div class="rm-faq-item">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>6. Can I manage multiple bakery branches?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">Multi-branch capabilities can be used where enabled by the applicable Geni Menu plan.</div>
        </div>
        <div class="rm-faq-item">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>7. Can I view bakery sales reports?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">Yes. Reports can provide visibility into sales, orders, products and other supported business metrics.</div>
        </div>
      </div>
    </div>
  </section>

  {{-- FINAL CTA --}}
  <section class="rm-cta">
    <div class="w r">
      <h2>Ready to Run Your Bakery Smarter?</h2>
      <p>Manage products, cakes, orders, billing, customers, inventory and reports from one connected platform with Geni Menu.</p>
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

function selectCakeSize(weight, price, btn) {
  document.querySelectorAll('#bkVarGrid .bk-var-btn').forEach(b => b.classList.remove('active'));
  btn.classList.add('active');
  const meta = document.getElementById('bkCakeSelectedMeta');
  if (meta) meta.textContent = 'Selected size: ' + weight + ' · ' + price;
}

function bakeryBillAction(type) {
  const msg = document.getElementById('bkBillMsg');
  if (!msg) return;
  msg.style.display = 'block';
  if (type === 'hold') {
    msg.style.background = 'var(--amber-bg)';
    msg.style.color = 'var(--amber)';
    msg.textContent = 'Counter Sale #142 placed on Hold — ready to resume anytime.';
  } else {
    msg.style.background = 'var(--green-bg)';
    msg.style.color = 'var(--green)';
    msg.textContent = '✓ Payment of ₹560 completed · Receipt ready to print.';
  }
}

function setBakeryStep(stepIdx) {
  const pills = document.querySelectorAll('#bkStepRow .bk-step-pill');
  pills.forEach((p, idx) => p.classList.toggle('done', idx < stepIdx));
  const badge = document.getElementById('bkOrderBadge');
  if (badge) {
    const labels = ['Order Placed', 'Preparing', 'Packed', 'Ready', 'Picked Up'];
    badge.textContent = labels[stepIdx - 1] || 'Ready';
  }
}

function toggleAvail(row) {
  const badge = row.querySelector('.bk-badge');
  const isOut = row.classList.toggle('out');
  if (isOut) {
    badge.className = 'bk-badge soldout';
    badge.textContent = 'Sold Out';
  } else {
    badge.className = 'bk-badge ready';
    badge.textContent = 'Available';
  }
}

document.addEventListener('DOMContentLoaded', function() {
  const els = document.querySelectorAll('.bk-page .r');
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
