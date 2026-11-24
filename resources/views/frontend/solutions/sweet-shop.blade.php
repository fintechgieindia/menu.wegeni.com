@php
$meta = [
    'title' => 'Sweet Shop & Mithai POS Software | Geni Menu',
    'description' => 'Manage every sweet and serve every customer better. Organize milk sweets, dry fruit sweets, savouries, weight & quantity billing (250g, 500g, 1kg), festival orders, stock and daily reports with Geni Menu.',
    'keywords' => 'sweet shop POS software, mithai shop billing software, weight based sweet billing, sweet box inventory, festival order management, Geni Menu',
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

.sw-page * { box-sizing: border-box; }
.sw-page {
  font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
  color: var(--ink);
  background: var(--bg);
  -webkit-font-smoothing: antialiased;
  overflow-x: hidden;
}

.sw-page h1, .sw-page h2, .sw-page h3, .sw-page h4 {
  margin: 0;
  font-family: 'Outfit', 'Plus Jakarta Sans', sans-serif;
  font-weight: 500;
  line-height: 1.14;
  letter-spacing: -0.025em;
  color: var(--ink);
}
.sw-page h1 { font-size: clamp(34px, 4.6vw, 56px); }
.sw-page h2 { font-size: clamp(28px, 3.6vw, 44px); }
.sw-page h3 { font-size: 20px; font-weight: 600; }
.sw-page p { margin: 0; color: var(--mute); font-size: 16px; line-height: 1.65; }
.sw-page a { text-decoration: none; color: inherit; }

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
.sw-sec { padding: clamp(56px, 6.5vw, 92px) 0; background: var(--bg); position: relative; overflow: hidden; }
.sw-sec.alt { background: var(--bg2); }
.sw-sec.border-b { border-bottom: 1px solid var(--line); }

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

.sw-badge { font-size: 10.5px; font-weight: 700; padding: 4px 10px; border-radius: 99px; text-transform: uppercase; letter-spacing: .04em; display: inline-block; }
.sw-badge.ready { background: var(--green-bg); color: var(--green); }
.sw-badge.preparing { background: var(--amber-bg); color: var(--amber); }
.sw-badge.soldout { background: var(--red-bg); color: var(--red); }

/* Split Layouts & Catalogue */
.sw-split { display: grid; grid-template-columns: 1fr 1.08fr; gap: 40px; align-items: start; }
.sw-tag-row { display: flex; gap: 8px; flex-wrap: wrap; margin-top: 18px; }
.sw-tag { padding: 6px 12px; border-radius: 99px; background: #fff; border: 1px solid var(--line); font-size: 12px; font-weight: 700; color: var(--mute); }

.sw-prod-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 14px; margin-top: 22px; }
.sw-prod-card { display: flex; align-items: center; gap: 12px; padding: 12px; border: 1px solid var(--line); border-radius: 16px; background: #fff; transition: .25s ease; }
.sw-prod-card:hover { border-color: var(--br); box-shadow: var(--shadow-sm); transform: translateY(-2px); }
.sw-prod-img { width: 64px; height: 64px; border-radius: 12px; object-fit: cover; flex-shrink: 0; }
.sw-prod-card h4 { font-size: 14.5px; font-weight: 700; margin-bottom: 3px; }
.sw-prod-price { font-family: 'Outfit', sans-serif; font-weight: 700; color: var(--br); font-size: 14px; }
.sw-prod-wt { font-size: 11px; color: var(--mute); background: var(--bg2); padding: 2px 8px; border-radius: 6px; margin-left: 6px; font-weight: 600; }

/* Weight & Quantity Selector */
.sw-wt-group { margin-bottom: 14px; padding-bottom: 14px; border-bottom: 1px dashed var(--line); }
.sw-wt-group:last-of-type { border-bottom: none; margin-bottom: 0; padding-bottom: 0; }
.sw-wt-hdr { display: flex; justify-content: space-between; font-size: 14px; font-weight: 700; margin-bottom: 8px; }
.sw-wt-hdr span:last-child { font-size: 12px; color: var(--mute); }
.sw-wt-opts { display: grid; grid-template-columns: repeat(3, 1fr); gap: 8px; }
.sw-wt-btn { padding: 9px 8px; border-radius: 10px; border: 1.5px solid var(--line); background: var(--bg2); cursor: pointer; text-align: center; font: 700 12px 'Plus Jakarta Sans', sans-serif; color: var(--ink); transition: .2s ease; }
.sw-wt-btn strong { display: block; font-family: 'Outfit', sans-serif; font-size: 14.5px; color: var(--br); margin-top: 2px; }
.sw-wt-btn.active, .sw-wt-btn:hover { background: var(--br-light); border-color: var(--br); }

/* Counter Billing & Festival Rush */
.sw-bill-row { display: flex; justify-content: space-between; align-items: center; padding: 9px 0; border-bottom: 1px dashed var(--line); font-size: 14px; }
.sw-bill-row small { display: block; font-size: 12px; color: var(--mute); }
.sw-bill-total { display: flex; justify-content: space-between; align-items: center; padding: 14px 0 10px; font-family: 'Outfit', sans-serif; font-size: 22px; font-weight: 700; color: var(--br); }
.sw-bill-actions { display: grid; grid-template-columns: repeat(3, 1fr); gap: 8px; margin-top: 10px; }
.sw-act-btn { padding: 10px 8px; border-radius: 10px; border: 1.5px solid var(--line); background: #fff; color: var(--ink); font: 700 12.5px 'Plus Jakarta Sans', sans-serif; cursor: pointer; }
.sw-act-btn.primary { grid-column: 1 / -1; background: var(--br); color: #fff; border-color: var(--br); padding: 12px; font-size: 14px; }
.sw-bill-msg { margin-top: 10px; font-size: 12px; font-weight: 700; color: var(--green); background: var(--green-bg); padding: 8px 10px; border-radius: 10px; text-align: center; display: none; }

.sw-step-4 { display: grid; grid-template-columns: repeat(4, 1fr); gap: 6px; margin-top: 14px; }
.sw-step-pill { padding: 8px 4px; border-radius: 10px; border: 1px solid var(--line); background: var(--bg2); color: var(--mute); font: 700 11px 'Plus Jakarta Sans', sans-serif; cursor: pointer; text-align: center; }
.sw-step-pill.done { background: var(--br-light); color: var(--br); border-color: var(--br); }

.sw-fest-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 10px; margin-top: 18px; padding-top: 18px; border-top: 1px dashed var(--line); }
.sw-fest-box { background: var(--bg2); border: 1px solid var(--line); border-radius: 12px; padding: 12px 8px; text-align: center; }
.sw-fest-box strong { display: block; font-family: 'Outfit', sans-serif; font-size: 22px; font-weight: 600; color: var(--br); line-height: 1.15; }
.sw-fest-box span { font-size: 10.5px; font-weight: 700; color: var(--mute); text-transform: uppercase; }

/* Availability, Stock, PO & Customer */
.sw-avail-list { display: flex; flex-direction: column; gap: 8px; }
.sw-avail-row { display: flex; justify-content: space-between; align-items: center; padding: 11px 14px; border-radius: 12px; border: 1px solid var(--line); background: #fff; font-size: 14px; font-weight: 600; cursor: pointer; }
.sw-avail-row.out { background: var(--red-bg); border-color: rgba(185, 28, 28, 0.22); }

.sw-inv-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px; }
.sw-inv-card { background: var(--bg2); border: 1px solid var(--line); border-radius: 14px; padding: 14px; }
.sw-inv-card span { font-size: 12.5px; font-weight: 700; color: var(--mute); display: block; }
.sw-inv-card strong { font-family: 'Outfit', sans-serif; font-size: 22px; color: var(--ink); }

.sw-mini-card { background: var(--bg2); border: 1px solid var(--line); border-radius: 16px; padding: 18px; margin-top: 18px; }
.sw-mini-list { list-style: none; padding: 0; margin: 10px 0 0; font-size: 13.5px; }
.sw-mini-list li { display: flex; justify-content: space-between; padding: 5px 0; border-bottom: 1px dashed var(--line); }
.sw-mini-list li:last-child { border-bottom: none; }

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
.sw-bars { height: 140px; display: grid; grid-template-columns: repeat(7, 1fr); align-items: end; gap: 12px; padding-bottom: 26px; border-bottom: 1px solid rgba(255, 255, 255, 0.16); }
.sw-bar-col { display: flex; flex-direction: column; align-items: center; justify-content: flex-end; height: 100%; position: relative; }
.sw-bar-fill { width: 100%; max-width: 56px; background: linear-gradient(180deg, #e6c594 0%, #876039 100%); border-radius: 8px 8px 0 0; }
.sw-bar-lbl { position: absolute; bottom: -22px; font-size: 10.5px; font-weight: 600; color: rgba(255, 255, 255, 0.72); white-space: nowrap; }

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
.rm-ind-card::after { content: ''; position: absolute; inset: 0; background: linear-gradient(180deg, transparent 35%, rgba(24, 16, 10, 0.84) 100%); }
.rm-ind-cap { position: absolute; left: 16px; right: 16px; bottom: 14px; z-index: 2; color: #fff; }
.rm-ind-cap strong { display: block; font-family: 'Outfit', sans-serif; font-size: 16px; font-weight: 600; }
.rm-ind-cap span { font-size: 12px; color: rgba(255, 255, 255, 0.8); }
.sw-model-pills { display: flex; flex-wrap: wrap; justify-content: center; gap: 10px; }
.sw-model-pill { padding: 9px 16px; border-radius: 99px; background: #fff; border: 1px solid var(--line); font-size: 13px; font-weight: 700; color: var(--ink); }

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
  .rm-hero-grid, .sw-split { grid-template-columns: 1fr; gap: 36px; }
  .rm-val-grid, .rm-dark-kpis, .rm-ind-grid { grid-template-columns: repeat(2, 1fr); }
  .rm-prog-grid-6 { grid-template-columns: repeat(3, 1fr); }
  .rm-ben-grid { grid-template-columns: repeat(2, 1fr); }
  .rm-eco-grid { grid-template-columns: repeat(4, 1fr); }
}
@media (max-width: 640px) {
  .w { padding: 0 16px; }
  .rm-val-grid, .sw-prod-grid, .sw-wt-opts, .sw-fest-grid, .sw-inv-grid, .rm-dark-kpis, .rm-prog-grid-6, .rm-ben-grid, .rm-ind-grid { grid-template-columns: 1fr; }
  .sw-step-4 { grid-template-columns: repeat(2, 1fr); }
  .rm-eco-grid { grid-template-columns: repeat(2, 1fr); }
  .rm-hero-stats { grid-template-columns: 1fr; gap: 12px; }
  .rm-hero-cta .btn, .rm-cta-btns .btn { width: 100%; }
  .rm-hero-float { flex-direction: column; align-items: flex-start; }
}
</style>

<div class="sw-page">
  {{-- BREADCRUMB --}}
  <nav class="bc" aria-label="Breadcrumb">
    <div class="w">
      <a href="{{ url('/') }}">Home</a>
      <span class="sep">/</span>
      <a href="{{ route('solutions') }}">Solutions</a>
      <span class="sep">/</span>
      <span class="cur">Sweet Shop</span>
    </div>
  </nav>

  {{-- HERO --}}
  <section class="rm-hero">
    <div class="w rm-hero-grid">
      <div>
        <div class="eb">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><polyline points="20 12 20 22 4 22 4 12"/><rect x="2" y="7" width="20" height="5"/><line x1="12" y1="22" x2="12" y2="7"/></svg>
          SWEET SHOP SOLUTION
        </div>
        <h1>Manage Every Sweet. <span class="sf">Serve Every Customer</span> Better.</h1>
        <p class="rm-hero-sub">Manage sweets, snacks, orders, billing, inventory and daily shop operations from one connected platform built for modern sweet shops.</p>
        <div class="rm-hero-cta">
          <a href="{{ route('restaurant_signup') }}" class="btn p">Get Started →</a>
          <a href="{{ route('contact.us') }}" class="btn o">Book a Demo →</a>
        </div>
        <div class="rm-hero-stats">
          <div class="rm-hero-stat">
            <strong>₹82,400</strong>
            <span>Daily mithai &amp; snack sales</span>
          </div>
          <div class="rm-hero-stat">
            <strong>250g – 1kg+</strong>
            <span>Weight &amp; piece billing</span>
          </div>
          <div class="rm-hero-stat">
            <strong>248 Orders</strong>
            <span>Fast festival counter flow</span>
          </div>
        </div>
      </div>

      <div class="rm-hero-media">
        <img src="{{ asset('assets/images/sweet-shop-hero.jpg') }}" alt="Boutique Indian sweet shop counter with mithai showcase, digital weighing scale, gift boxes and tablet POS">
        <div class="rm-hero-scrim"></div>
        <div class="rm-hero-pill">
          <span class="rm-live-dot"></span>
          Peak Hour · 16 Active Orders · Kaju Katli Top Seller
        </div>
        <div class="rm-hero-float">
          <div class="rm-hero-float-left">
            <div class="rm-hero-float-ico">
              <svg viewBox="0 0 24 24"><polyline points="20 12 20 22 4 22 4 12"/><rect x="2" y="7" width="20" height="5"/></svg>
            </div>
            <div>
              <div class="rm-hero-float-ttl">ORDER #2084 · Priya · ₹1,140</div>
              <div class="rm-hero-float-sub">Kaju Katli 500g, Mysore Pak 250g, Mixture 500g</div>
            </div>
          </div>
          <span class="rm-hero-float-tag">Ready to Pack</span>
        </div>
      </div>
    </div>
  </section>

  {{-- VALUE STRIP (01 - 04) --}}
  <section class="sw-sec border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">Built For Sweet Shops</div>
        <h2>Everything Your Sweet Shop <span class="sf">Needs.</span></h2>
        <p>Keep your products, customer orders, billing and stock organized from one connected platform.</p>
      </div>
      <div class="rm-val-grid">
        <div class="rm-val-card r">
          <div class="rm-val-top">
            <div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg></div>
            <span class="rm-num">01</span>
          </div>
          <h3>Mithai &amp; Savoury Catalogue</h3>
          <p>Organize milk sweets, Bengali sweets, dry fruit sweets, halwa, laddoos and savouries clearly.</p>
        </div>
        <div class="rm-val-card r">
          <div class="rm-val-top">
            <div class="rm-ic"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/></svg></div>
            <span class="rm-num">02</span>
          </div>
          <h3>Weight &amp; Box Selling</h3>
          <p>Handle 250g, 500g, 1kg and piece/box formats smoothly through a flexible counter workflow.</p>
        </div>
        <div class="rm-val-card r">
          <div class="rm-val-top">
            <div class="rm-ic"><svg viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg></div>
            <span class="rm-num">03</span>
          </div>
          <h3>Festival Counter POS</h3>
          <p>Create multi-item sweet bills quickly during Diwali, weddings, weekends and peak evening rushes.</p>
        </div>
        <div class="rm-val-card r">
          <div class="rm-val-top">
            <div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg></div>
            <span class="rm-num">04</span>
          </div>
          <h3>Stock, Purchases &amp; Reports</h3>
          <p>Monitor milk, ghee, cashews, sugar, sweet boxes, supplier POs and top-selling categories.</p>
        </div>
      </div>
    </div>
  </section>

  {{-- PRODUCT CATALOGUE + WEIGHT / QUANTITY SELECTOR --}}
  <section class="sw-sec alt border-b">
    <div class="w sw-split">
      <div class="r">
        <div class="eb">Product Catalogue</div>
        <h2>Every Sweet Deserves <span class="sf">to Be Seen.</span></h2>
        <p style="margin-top:12px;">Create an attractive digital catalogue for your complete collection of sweets, savouries and snacks.</p>

        <div class="sw-tag-row">
          <span class="sw-tag">Milk Sweets</span>
          <span class="sw-tag">Bengali Sweets</span>
          <span class="sw-tag">Dry Fruit Sweets</span>
          <span class="sw-tag">Halwa &amp; Laddoo</span>
          <span class="sw-tag">Savouries</span>
          <span class="sw-tag">Cakes &amp; Desserts</span>
        </div>

        <div class="sw-prod-grid">
          <div class="sw-prod-card">
            <img class="sw-prod-img" src="{{ asset('assets/images/dishes/kaju-katli.jpg') }}" alt="Kaju Katli">
            <div><h4>Kaju Katli</h4><span class="sw-prod-price">₹1,120</span><span class="sw-prod-wt">per kg</span></div>
          </div>
          <div class="sw-prod-card">
            <img class="sw-prod-img" src="{{ asset('assets/images/dishes/motichoor-ladoo.jpg') }}" alt="Motichoor Ladoo">
            <div><h4>Motichoor Ladoo</h4><span class="sw-prod-price">₹250</span><span class="sw-prod-wt">10 pcs</span></div>
          </div>
          <div class="sw-prod-card">
            <img class="sw-prod-img" src="{{ asset('assets/images/dishes/pista-barfi.jpg') }}" alt="Pista Barfi">
            <div><h4>Pista Barfi</h4><span class="sw-prod-price">₹880</span><span class="sw-prod-wt">per kg</span></div>
          </div>
          <div class="sw-prod-card">
            <img class="sw-prod-img" src="https://images.unsplash.com/photo-1601050690597-df0568f70950?w=200&q=80" alt="Madras Mixture" referrerpolicy="no-referrer">
            <div><h4>Madras Mixture</h4><span class="sw-prod-price">₹360</span><span class="sw-prod-wt">per kg</span></div>
          </div>
        </div>
      </div>

      {{-- Interactive Weight & Piece Selector --}}
      <div class="rm-win r">
        <div class="rm-win-bar">
          <div class="rm-win-dots"><i></i><i></i><i></i></div>
          <div class="rm-win-ttl">Flexible Selling · Weight &amp; Quantity</div>
        </div>
        <div class="rm-win-body">
          <div class="sw-wt-group">
            <div class="sw-wt-hdr"><span>Kaju Katli</span><span>₹1,120 / kg</span></div>
            <div class="sw-wt-opts">
              <button type="button" class="sw-wt-btn" onclick="pickSwOpt(this)">250 g<strong>₹280</strong></button>
              <button type="button" class="sw-wt-btn" onclick="pickSwOpt(this)">500 g<strong>₹560</strong></button>
              <button type="button" class="sw-wt-btn active" onclick="pickSwOpt(this)">1 kg<strong>₹1,120</strong></button>
            </div>
          </div>
          <div class="sw-wt-group">
            <div class="sw-wt-hdr"><span>Mysore Pak</span><span>₹880 / kg</span></div>
            <div class="sw-wt-opts">
              <button type="button" class="sw-wt-btn active" onclick="pickSwOpt(this)">250 g<strong>₹220</strong></button>
              <button type="button" class="sw-wt-btn" onclick="pickSwOpt(this)">500 g<strong>₹440</strong></button>
              <button type="button" class="sw-wt-btn" onclick="pickSwOpt(this)">1 kg<strong>₹880</strong></button>
            </div>
          </div>
          <div class="sw-wt-group">
            <div class="sw-wt-hdr"><span>Motichoor Laddoo</span><span>Quantity Based</span></div>
            <div class="sw-wt-opts">
              <button type="button" class="sw-wt-btn" onclick="pickSwOpt(this)">4 pcs<strong>₹160</strong></button>
              <button type="button" class="sw-wt-btn active" onclick="pickSwOpt(this)">8 pcs<strong>₹320</strong></button>
              <button type="button" class="sw-wt-btn" onclick="pickSwOpt(this)">12 pcs (Box)<strong>₹480</strong></button>
            </div>
          </div>
          <div style="font-size:11.5px; color:var(--mute); margin-top:14px; text-align:center;">* Illustrative concept. Weight-based configuration depends on implemented features.</div>
        </div>
      </div>
    </div>
  </section>

  {{-- COUNTER BILLING + ORDER HANDOVER & FESTIVAL DEMAND --}}
  <section class="sw-sec border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">Counter Billing &amp; Festival Rush</div>
        <h2>Serve More Customers <span class="sf">During Peak Hours.</span></h2>
        <p>Create multi-weight sweet bills quickly during festivals, weddings and busy weekend shopping hours.</p>
      </div>

      <div class="sw-split">
        <div class="rm-win r">
          <div class="rm-win-bar">
            <div class="rm-win-dots"><i></i><i></i><i></i></div>
            <div class="rm-win-ttl">New Counter Sale</div>
            <span class="sw-badge ready">Fast Checkout</span>
          </div>
          <div class="rm-win-body">
            <div class="sw-bill-row"><div><strong>Kaju Katli</strong><small>500 g</small></div><strong>₹560</strong></div>
            <div class="sw-bill-row"><div><strong>Mysore Pak</strong><small>250 g</small></div><strong>₹220</strong></div>
            <div class="sw-bill-row"><div><strong>Special Mixture</strong><small>500 g</small></div><strong>₹180</strong></div>
            <div class="sw-bill-row"><div><strong>Badam Milk</strong><small>2 × ₹90</small></div><strong>₹180</strong></div>
            <div class="sw-bill-total"><span>TOTAL</span><span>₹1,140</span></div>
            <div class="sw-bill-actions">
              <button type="button" class="sw-act-btn" onclick="swCounterMsg('Weight / Qty selector opened.')">Weight / Qty</button>
              <button type="button" class="sw-act-btn" onclick="swCounterMsg('Festive 5% box discount applied.')">Discount</button>
              <button type="button" class="sw-act-btn" onclick="swCounterMsg('Linked to customer: Priya Kumar.')">Customer</button>
              <button type="button" class="sw-act-btn primary" onclick="swCounterMsg('✓ Sale of ₹1,140 completed · Receipt printed!')">Complete Sale</button>
            </div>
            <div class="sw-bill-msg" id="swBillMsg"></div>
          </div>
        </div>

        <div class="rm-win r">
          <div class="rm-win-bar">
            <div class="rm-win-dots"><i></i><i></i><i></i></div>
            <div class="rm-win-ttl">ORDER #2084 · Customer: Priya</div>
            <span class="sw-badge ready" id="swOrderBadge">Ready</span>
          </div>
          <div class="rm-win-body">
            <div style="font-size:13.5px; color:var(--ink); margin-bottom:6px;">
              <strong>Kaju Katli (500g)</strong> · Mysore Pak (250g) · Mixture (500g) · Badam Milk (×2)
            </div>
            <div class="sw-step-4" id="swStepRow">
              <button type="button" class="sw-step-pill done" onclick="setSwStep(1)">1. Order</button>
              <button type="button" class="sw-step-pill done" onclick="setSwStep(2)">2. Pack</button>
              <button type="button" class="sw-step-pill done" onclick="setSwStep(3)">3. Bill</button>
              <button type="button" class="sw-step-pill" onclick="setSwStep(4)">4. Handover</button>
            </div>

            <div class="sw-fest-grid">
              <div class="sw-fest-box"><strong>28</strong><span>New Orders</span></div>
              <div class="sw-fest-box"><strong>16</strong><span>Preparing</span></div>
              <div class="sw-fest-box"><strong>22</strong><span>Ready</span></div>
              <div class="sw-fest-box"><strong style="color:var(--green);">184</strong><span>Completed</span></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- AVAILABILITY, INVENTORY, PURCHASES & CUSTOMER --}}
  <section class="sw-sec alt border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">Availability, Stock &amp; Purchases</div>
        <h2>Know Your Ingredients. <span class="sf">Know Your Stock.</span></h2>
        <p>Keep sweet availability clear for staff and customers while tracking milk, ghee, cashews, boxes and incoming supplier POs.</p>
      </div>

      <div class="sw-split">
        <div class="rm-win r">
          <div class="rm-win-bar">
            <div class="rm-win-dots"><i></i><i></i><i></i></div>
            <div class="rm-win-ttl">Product Availability · Tap to Toggle</div>
          </div>
          <div class="rm-win-body">
            <div class="sw-avail-list">
              <div class="sw-avail-row" onclick="toggleSwAvail(this)"><span>Kaju Katli</span><span class="sw-badge ready">Available</span></div>
              <div class="sw-avail-row" onclick="toggleSwAvail(this)"><span>Mysore Pak</span><span class="sw-badge ready">Available</span></div>
              <div class="sw-avail-row" onclick="toggleSwAvail(this)"><span>Gulab Jamun</span><span class="sw-badge ready">Available</span></div>
              <div class="sw-avail-row out" onclick="toggleSwAvail(this)"><span>Rasmalai</span><span class="sw-badge soldout">Sold Out</span></div>
              <div class="sw-avail-row" onclick="toggleSwAvail(this)"><span>Jangiri</span><span class="sw-badge ready">Available</span></div>
              <div class="sw-avail-row" onclick="toggleSwAvail(this)"><span>Badam Halwa</span><span class="sw-badge ready">Available</span></div>
            </div>

            <div class="sw-mini-card">
              <div style="display:flex; justify-content:space-between; align-items:center;">
                <div><strong style="font-size:15.5px; display:block;">Priya Kumar</strong><span style="font-size:12px; color:var(--mute);">Loyal Sweet Buyer</span></div>
                <div style="text-align:right;"><span style="font-size:10.5px; font-weight:700; color:var(--mute); text-transform:uppercase;">Total Orders</span><strong style="display:block; font-size:18px; color:var(--br);">12</strong></div>
              </div>
              <ul class="sw-mini-list">
                <li><span>Kaju Katli</span><strong>500 g</strong></li>
                <li><span>Mysore Pak</span><strong>1 kg</strong></li>
                <li><span>Mixture</span><strong>500 g</strong></li>
              </ul>
            </div>
          </div>
        </div>

        <div class="rm-win r">
          <div class="rm-win-bar">
            <div class="rm-win-dots"><i></i><i></i><i></i></div>
            <div class="rm-win-ttl">Raw Materials &amp; Purchase Tracking</div>
          </div>
          <div class="rm-win-body">
            <div class="sw-inv-grid">
              <div class="sw-inv-card"><span>Milk</span><strong>80 L</strong></div>
              <div class="sw-inv-card"><span>Sugar</span><strong>50 kg</strong></div>
              <div class="sw-inv-card"><span>Cashew</span><strong>20 kg</strong></div>
              <div class="sw-inv-card"><span>Ghee</span><strong>25 L</strong></div>
              <div class="sw-inv-card" style="grid-column:1/-1;"><span>Sweet Gift &amp; Packing Boxes</span><strong>500 pcs</strong></div>
            </div>

            <div class="sw-mini-card">
              <div style="display:flex; justify-content:space-between; align-items:center;">
                <div><strong style="font-size:15px; display:block;">Supplier: Raj Foods</strong><span style="font-size:12px; color:var(--mute);">PO-1048</span></div>
                <span class="sw-badge ready">Received</span>
              </div>
              <ul class="sw-mini-list">
                <li><span>Sugar</span><strong>50 kg</strong></li>
                <li><span>Cashew</span><strong>20 kg</strong></li>
                <li><span>Ghee</span><strong>25 L</strong></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- DARK EDITORIAL BUSINESS REPORTS --}}
  <section class="sw-sec border-b">
    <div class="w">
      <div class="rm-dark-banner r">
        <div class="rm-dark-top">
          <div>
            <div class="eb" style="background:rgba(255,255,255,0.1); color:#e6c594; border-color:rgba(230,197,148,0.28);">Business Reports</div>
            <h2>Know What <span class="sf" style="-webkit-text-fill-color:#e6c594;">Sells.</span></h2>
            <p>Understand which sweets, savouries and categories are driving your shop's sales — from counter POS or mobile.</p>
          </div>
          <span class="sw-badge ready" style="background:rgba(22,163,74,0.2); color:#86efac;">● Live Shop Analytics</span>
        </div>

        <div class="rm-dark-kpis">
          <div class="rm-dark-kpi"><strong>₹82,400</strong><span>Daily Sales</span></div>
          <div class="rm-dark-kpi"><strong>248</strong><span>Total Orders</span></div>
          <div class="rm-dark-kpi"><strong>Kaju Katli</strong><span>Top Item</span></div>
          <div class="rm-dark-kpi"><strong>5PM – 8PM</strong><span>Peak Hours</span></div>
        </div>

        <div class="sw-bars">
          <div class="sw-bar-col"><div class="sw-bar-fill" style="height:80%;"></div><span class="sw-bar-lbl">Traditional</span></div>
          <div class="sw-bar-col"><div class="sw-bar-fill" style="height:100%;"></div><span class="sw-bar-lbl">Milk Sweets</span></div>
          <div class="sw-bar-col"><div class="sw-bar-fill" style="height:60%;"></div><span class="sw-bar-lbl">Dry Fruits</span></div>
          <div class="sw-bar-col"><div class="sw-bar-fill" style="height:90%;"></div><span class="sw-bar-lbl">Laddoo</span></div>
          <div class="sw-bar-col"><div class="sw-bar-fill" style="height:45%;"></div><span class="sw-bar-lbl">Halwa</span></div>
          <div class="sw-bar-col"><div class="sw-bar-fill" style="height:75%;"></div><span class="sw-bar-lbl">Savouries</span></div>
          <div class="sw-bar-col"><div class="sw-bar-fill" style="height:30%;"></div><span class="sw-bar-lbl">Beverages</span></div>
        </div>
      </div>
    </div>
  </section>

  {{-- 6-STEP SWEET SHOP WORKFLOW --}}
  <section class="sw-sec alt border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">Connected Workflow</div>
        <h2>From Product to Payment. <span class="sf">Everything Connected.</span></h2>
        <p>Connect your sweet shop's products, orders, billing, inventory and business data through one platform.</p>
      </div>
      <div class="rm-prog-grid-6 r">
        <div class="rm-prog-card"><div class="rm-prog-num">01</div><h4>Product Catalogue</h4><p>Browse mithai &amp; savouries</p></div>
        <div class="rm-prog-card"><div class="rm-prog-num">02</div><h4>Customer Selection</h4><p>Pick sweets &amp; gift assortments</p></div>
        <div class="rm-prog-card"><div class="rm-prog-num">03</div><h4>Weight / Quantity</h4><p>Select 250g, 500g, 1kg or pcs</p></div>
        <div class="rm-prog-card"><div class="rm-prog-num">04</div><h4>Packing &amp; Order</h4><p>Pack fresh boxes cleanly</p></div>
        <div class="rm-prog-card"><div class="rm-prog-num">05</div><h4>Counter Billing</h4><p>Instant multi-item checkout</p></div>
        <div class="rm-prog-card"><div class="rm-prog-num">06</div><h4>Payment &amp; Handover</h4><p>Settle bill &amp; hand over box</p></div>
      </div>
    </div>
  </section>

  {{-- KEY BENEFITS (01 - 06) --}}
  <section class="sw-sec border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">Key Benefits</div>
        <h2>Built for the Way <span class="sf">Sweet Shops Sell.</span></h2>
      </div>
      <div class="rm-ben-grid">
        <div class="rm-ben-card r">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/></svg></div><span class="rm-num">01</span></div>
          <h3>Organized Product Catalogue</h3>
          <p>Keep sweets, savouries and beverages easy to manage.</p>
        </div>
        <div class="rm-ben-card r">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/></svg></div><span class="rm-num">02</span></div>
          <h3>Flexible Selling</h3>
          <p>Manage products by quantity or weight where supported.</p>
        </div>
        <div class="rm-ben-card r">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg></div><span class="rm-num">03</span></div>
          <h3>Faster Billing</h3>
          <p>Speed up counter transactions during busy periods.</p>
        </div>
        <div class="rm-ben-card r">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg></div><span class="rm-num">04</span></div>
          <h3>Inventory Visibility</h3>
          <p>Keep track of ingredients and packaging materials.</p>
        </div>
        <div class="rm-ben-card r">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg></div><span class="rm-num">05</span></div>
          <h3>Customer Management</h3>
          <p>Keep customer and order information organized.</p>
        </div>
        <div class="rm-ben-card r">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></div><span class="rm-num">06</span></div>
          <h3>Business Insights</h3>
          <p>Understand sales, products and customer activity.</p>
        </div>
      </div>
    </div>
  </section>

  {{-- DESIGNED FOR DIFFERENT SWEET BUSINESSES --}}
  <section class="sw-sec alt border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">Ideal For</div>
        <h2>Designed for Different <span class="sf">Sweet Businesses.</span></h2>
      </div>
      <div class="rm-ind-grid r">
        <div class="rm-ind-card">
          <img src="{{ asset('assets/images/sweet-shop-hero.jpg') }}" alt="Traditional Mithai">
          <div class="rm-ind-cap"><strong>Traditional Mithai</strong><span>Milk sweets, laddoos &amp; festive boxes</span></div>
        </div>
        <div class="rm-ind-card">
          <img src="{{ asset('assets/images/dishes/sweet-gift-boxes.jpg') }}" alt="Modern Sweet Brand">
          <div class="rm-ind-cap"><strong>Modern Sweet Brands</strong><span>Boutique mithai &amp; multi-branch chains</span></div>
        </div>
        <div class="rm-ind-card">
          <img src="{{ asset('assets/images/dishes/pista-barfi.jpg') }}" alt="Premium Dry Fruits">
          <div class="rm-ind-cap"><strong>Premium Dry Fruits</strong><span>Weight-based assortments &amp; hampers</span></div>
        </div>
        <div class="rm-ind-card">
          <img src="https://images.unsplash.com/photo-1601050690597-df0568f70950?auto=format&fit=crop&w=700&q=80" alt="Sweet & Savoury Stores" referrerpolicy="no-referrer">
          <div class="rm-ind-cap"><strong>Sweet &amp; Savoury Stores</strong><span>Mixtures, snacks &amp; quick counter bills</span></div>
        </div>
      </div>
      <div class="sw-model-pills r">
        <span class="sw-model-pill">Traditional Sweet Shops</span>
        <span class="sw-model-pill">Modern Mithai Stores</span>
        <span class="sw-model-pill">Bengali Sweet Shops</span>
        <span class="sw-model-pill">South Indian Sweet Shops</span>
        <span class="sw-model-pill">Dry Fruit Stores</span>
        <span class="sw-model-pill">Sweet &amp; Savoury Stores</span>
        <span class="sw-model-pill">Bakery &amp; Sweet Shops</span>
        <span class="sw-model-pill">Multi-Branch Chains</span>
      </div>
    </div>
  </section>

  {{-- CONNECTED ECOSYSTEM (7 MODULES) --}}
  <section class="sw-sec border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">Connected Ecosystem</div>
        <h2>Everything Works Better <span class="sf">Together.</span></h2>
        <p>Every module works together — from digital mithai catalogues to counter POS, stock and daily reports.</p>
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

  {{-- FAQ (ALL 6 ITEMS) --}}
  <section class="sw-sec alt">
    <div class="w">
      <div class="hd r">
        <div class="eb">Frequently Asked Questions</div>
        <h2>Sweet Shop <span class="sf">FAQ.</span></h2>
      </div>
      <div class="rm-faq-list r">
        <div class="rm-faq-item open">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>1. Is Geni Menu suitable for sweet shops?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">Yes, Geni Menu provides tools to manage product catalogues, busy counter billing, orders, and inventory suited for sweet shops.</div>
        </div>
        <div class="rm-faq-item">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>2. Can I manage sweets and savouries in one catalogue?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">Absolutely. You can create multiple categories to cleanly separate milk sweets, dry fruits, savouries, and beverages.</div>
        </div>
        <div class="rm-faq-item">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>3. Can I manage products by weight or quantity?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">Yes, where configured, you can set pricing based on gramage (e.g., 250g, 500g, 1kg) or individual pieces.</div>
        </div>
        <div class="rm-faq-item">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>4. Can I create bills quickly at the counter?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">Yes, our POS is designed for fast, multi-item billing essential during festivals and peak hours.</div>
        </div>
        <div class="rm-faq-item">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>5. Can I track inventory and packaging?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">Yes, you can track raw ingredients and packaging materials to ensure you're always stocked up.</div>
        </div>
        <div class="rm-faq-item">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>6. Is Geni Menu suitable for multi-branch sweet shops?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">Yes, you can manage and view reports for multiple shop locations from a centralized dashboard.</div>
        </div>
      </div>
    </div>
  </section>

  {{-- FINAL CTA --}}
  <section class="rm-cta">
    <div class="w r">
      <h2>Ready to Run Your Sweet Shop Smarter?</h2>
      <p>Manage your products, orders, billing, customers, inventory and reports from one connected platform with Geni Menu.</p>
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

function pickSwOpt(btn) {
  const group = btn.closest('.sw-wt-opts');
  group.querySelectorAll('.sw-wt-btn').forEach(b => b.classList.remove('active'));
  btn.classList.add('active');
}

function swCounterMsg(text) {
  const msg = document.getElementById('swBillMsg');
  if (!msg) return;
  msg.style.display = 'block';
  msg.textContent = text;
}

function setSwStep(step) {
  document.querySelectorAll('#swStepRow .sw-step-pill').forEach((p, idx) => p.classList.toggle('done', idx < step));
  const badge = document.getElementById('swOrderBadge');
  if (badge) {
    const map = ['Ordered', 'Packed', 'Ready', 'Handed Over'];
    badge.textContent = map[step - 1] || 'Ready';
  }
}

function toggleSwAvail(row) {
  const badge = row.querySelector('.sw-badge');
  const isOut = row.classList.toggle('out');
  badge.className = isOut ? 'sw-badge soldout' : 'sw-badge ready';
  badge.textContent = isOut ? 'Sold Out' : 'Available';
}

document.addEventListener('DOMContentLoaded', function() {
  const els = document.querySelectorAll('.sw-page .r');
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
