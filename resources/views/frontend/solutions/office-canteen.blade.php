@php
$meta = [
    'title' => 'Office Canteen & Corporate Cafeteria POS Software | Geni Menu',
    'description' => 'Smarter corporate cafeteria and better employee dining experience. Manage workplace menus, multi-counter food orders, 2-tap tokens, KOTs, meal cards, UPI, pantry stock and cafeteria analytics with Geni Menu.',
    'keywords' => 'office canteen POS software, corporate cafeteria management system, employee meal card billing, multi-counter cafeteria POS, IT park food court software, Geni Menu',
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

.oc-page * { box-sizing: border-box; }
.oc-page {
  font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
  color: var(--ink);
  background: var(--bg);
  -webkit-font-smoothing: antialiased;
  overflow-x: hidden;
}

.oc-page h1, .oc-page h2, .oc-page h3, .oc-page h4 {
  margin: 0;
  font-family: 'Outfit', 'Plus Jakarta Sans', sans-serif;
  font-weight: 500;
  line-height: 1.14;
  letter-spacing: -0.025em;
  color: var(--ink);
}
.oc-page h1 { font-size: clamp(34px, 4.6vw, 56px); }
.oc-page h2 { font-size: clamp(28px, 3.6vw, 44px); }
.oc-page h3 { font-size: 20px; font-weight: 600; }
.oc-page p { margin: 0; color: var(--mute); font-size: 16px; line-height: 1.65; }
.oc-page a { text-decoration: none; color: inherit; }

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
.oc-sec { padding: clamp(56px, 6.5vw, 92px) 0; background: var(--bg); position: relative; overflow: hidden; }
.oc-sec.alt { background: var(--bg2); }
.oc-sec.border-b { border-bottom: 1px solid var(--line); }

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

.oc-badge { font-size: 10.5px; font-weight: 700; padding: 4px 10px; border-radius: 99px; text-transform: uppercase; letter-spacing: .04em; display: inline-block; }
.oc-badge.ready { background: var(--green-bg); color: var(--green); }
.oc-badge.preparing { background: var(--amber-bg); color: var(--amber); }
.oc-badge.new { background: var(--blue-bg); color: var(--blue); }
.oc-badge.soldout { background: var(--red-bg); color: var(--red); }

/* Split Layouts, Menu & Counter POS */
.oc-split { display: grid; grid-template-columns: 1fr 1.05fr; gap: 40px; align-items: start; }
.oc-bullets { list-style: none; padding: 0; margin: 18px 0 22px; display: flex; flex-direction: column; gap: 10px; }
.oc-bullets li { display: flex; align-items: center; gap: 10px; font-size: 14.5px; font-weight: 600; color: var(--ink); }
.oc-bullets svg { width: 18px; height: 18px; color: var(--br); flex-shrink: 0; }

.oc-menu-3 { display: grid; grid-template-columns: repeat(3, 1fr); gap: 12px; }
.oc-food-card { background: #fff; border: 1px solid var(--line); border-radius: 14px; overflow: hidden; transition: .25s ease; }
.oc-food-card:hover { border-color: var(--br); transform: translateY(-2px); box-shadow: var(--shadow-sm); }
.oc-food-card img { width: 100%; height: 96px; object-fit: cover; display: block; }
.oc-food-ctx { padding: 11px; }
.oc-food-ctx h4 { font-size: 14px; font-weight: 700; margin-bottom: 3px; }
.oc-food-ctx strong { color: var(--br); font-family: 'Outfit', sans-serif; font-size: 14px; }

.oc-bill-row { display: flex; justify-content: space-between; align-items: center; padding: 10px 0; border-bottom: 1px dashed var(--line); font-size: 14px; }
.oc-bill-total { display: flex; justify-content: space-between; align-items: center; padding: 14px 0 10px; font-family: 'Outfit', sans-serif; font-size: 22px; font-weight: 700; color: var(--br); }
.oc-bill-actions { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-top: 10px; }
.oc-act-btn { padding: 12px; border-radius: 10px; border: 1.5px solid var(--line); background: #fff; color: var(--ink); font: 700 13.5px 'Plus Jakarta Sans', sans-serif; cursor: pointer; }
.oc-act-btn.primary { background: var(--br); color: #fff; border-color: var(--br); }
.oc-bill-msg { margin-top: 10px; font-size: 12px; font-weight: 700; padding: 8px 10px; border-radius: 10px; text-align: center; display: none; }

/* Peak Metrics, KOTs & Multi-Counter */
.oc-rush-4 { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; margin-bottom: 32px; }
.oc-rush-box { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 20px 14px; text-align: center; }
.oc-rush-box strong { display: block; font-family: 'Outfit', sans-serif; font-size: 32px; font-weight: 600; color: var(--br); line-height: 1.15; }
.oc-rush-box span { font-size: 11.5px; font-weight: 700; color: var(--mute); text-transform: uppercase; letter-spacing: .05em; }

.oc-kot-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 18px; margin-bottom: 32px; }
.oc-kot-card { background: #fff; border: 1px solid var(--line); border-radius: 18px; padding: 20px; border-top: 4px solid var(--br); }
.oc-kot-card.prep { border-top-color: var(--amber); }
.oc-kot-card.ready { border-top-color: var(--green); }
.oc-kot-card.new { border-top-color: var(--blue); }
.oc-kot-hdr { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 12px; }
.oc-kot-items { list-style: none; padding: 0; margin: 0 0 12px; font-size: 14px; }
.oc-kot-items li { display: flex; justify-content: space-between; padding: 5px 0; border-bottom: 1px dashed var(--line); }
.oc-kot-items li:last-child { border-bottom: none; }
.oc-kot-note { padding: 8px 12px; border-radius: 10px; font-size: 12px; font-weight: 700; }

.oc-counters-5 { display: grid; grid-template-columns: repeat(5, 1fr); gap: 14px; }
.oc-counter-card { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 18px 12px; text-align: center; transition: .25s ease; }
.oc-counter-card:hover { border-color: var(--br); transform: translateY(-3px); box-shadow: var(--shadow-sm); }
.oc-counter-card h4 { font-size: 14.5px; font-weight: 700; margin: 10px 0 4px; }
.oc-counter-card p { font-size: 12px; }

/* Availability, Payments & Stock */
.oc-avail-list { display: flex; flex-direction: column; gap: 8px; }
.oc-avail-row { display: flex; justify-content: space-between; align-items: center; padding: 11px 14px; border-radius: 12px; border: 1px solid var(--line); background: #fff; font-size: 14px; font-weight: 600; cursor: pointer; }
.oc-avail-row.out { background: var(--red-bg); border-color: rgba(185, 28, 28, 0.22); }

.oc-pay-modes { display: grid; grid-template-columns: repeat(3, 1fr); gap: 8px; margin-top: 12px; }
.oc-pay-pill { padding: 10px; border-radius: 10px; border: 1.5px solid var(--line); background: var(--bg2); font: 700 12.5px 'Plus Jakarta Sans', sans-serif; color: var(--ink); cursor: pointer; text-align: center; }
.oc-pay-pill.active { background: var(--br); color: #fff; border-color: var(--br); }

.oc-inv-3 { display: grid; grid-template-columns: repeat(3, 1fr); gap: 14px; margin-top: 18px; }
.oc-inv-card { background: var(--bg2); border: 1px solid var(--line); border-radius: 14px; padding: 14px; }
.oc-inv-card strong { display: block; font-family: 'Outfit', sans-serif; font-size: 22px; color: var(--ink); margin: 4px 0 2px; }

/* Dark Editorial Cafeteria Analytics Banner */
.rm-dark-banner { background: linear-gradient(135deg, #21160F 0%, #342318 100%); border-radius: 26px; padding: clamp(28px, 4vw, 48px); color: #fff; box-shadow: var(--shadow-lg); position: relative; overflow: hidden; }
.rm-dark-banner::after { content: ''; position: absolute; right: -80px; top: -80px; width: 280px; height: 280px; border-radius: 50%; background: radial-gradient(circle, rgba(184, 142, 86, 0.24) 0%, transparent 70%); pointer-events: none; }
.rm-dark-top { display: flex; justify-content: space-between; align-items: flex-end; gap: 24px; flex-wrap: wrap; margin-bottom: 28px; padding-bottom: 24px; border-bottom: 1px solid rgba(255, 255, 255, 0.12); }
.rm-dark-top h2 { color: #fff; font-size: clamp(26px, 3vw, 36px); }
.rm-dark-top p { color: rgba(255, 255, 255, 0.72); max-width: 520px; margin-top: 8px; }
.rm-dark-kpis { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; margin-bottom: 28px; }
.rm-dark-kpi { background: rgba(255, 255, 255, 0.06); border: 1px solid rgba(255, 255, 255, 0.12); border-radius: 16px; padding: 18px 20px; }
.rm-dark-kpi strong { display: block; font-family: 'Outfit', sans-serif; font-size: 26px; font-weight: 600; color: #F5EFE6; line-height: 1.15; }
.rm-dark-kpi span { font-size: 11.5px; font-weight: 700; color: rgba(255, 255, 255, 0.65); text-transform: uppercase; letter-spacing: .06em; }
.oc-bars { height: 130px; display: grid; grid-template-columns: repeat(5, 1fr); align-items: end; gap: 16px; padding-bottom: 26px; border-bottom: 1px solid rgba(255, 255, 255, 0.16); }
.oc-bar-col { display: flex; flex-direction: column; align-items: center; justify-content: flex-end; height: 100%; position: relative; }
.oc-bar-fill { width: 100%; max-width: 72px; background: linear-gradient(180deg, #e6c594 0%, #876039 100%); border-radius: 8px 8px 0 0; }
.oc-bar-lbl { position: absolute; bottom: -22px; font-size: 11px; font-weight: 600; color: rgba(255, 255, 255, 0.72); }

/* 5-Step Progression & Benefits */
.oc-prog-5 { display: grid; grid-template-columns: repeat(5, 1fr); gap: 14px; }
.rm-prog-card { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 18px 14px; text-align: center; transition: .25s ease; }
.rm-prog-card:hover { transform: translateY(-4px); border-color: var(--br); box-shadow: var(--shadow-sm); }
.rm-prog-num { display: inline-flex; align-items: center; justify-content: center; width: 32px; height: 32px; border-radius: 10px; background: var(--br-light); color: var(--br); font-family: 'Outfit', sans-serif; font-weight: 700; font-size: 12.5px; margin-bottom: 10px; border: 1px solid rgba(135, 96, 57, 0.2); }
.rm-prog-card h4 { font-size: 14px; font-weight: 700; margin-bottom: 4px; }
.rm-prog-card p { font-size: 12px; line-height: 1.45; }

.rm-ben-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 22px; }
.rm-ben-card { background: #fff; border: 1px solid var(--line); border-radius: 18px; padding: 26px; transition: .25s ease; }
.rm-ben-card:hover { transform: translateY(-4px); border-color: rgba(135, 96, 57, 0.34); box-shadow: var(--shadow-md); }
.rm-ben-card h3 { font-size: 18px; margin: 16px 0 8px; }
.rm-ben-card p { font-size: 14px; }

/* Photo Cards */
.rm-ind-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 18px; }
.rm-ind-card { position: relative; border-radius: 18px; overflow: hidden; aspect-ratio: 4 / 3; border: 1px solid var(--line); box-shadow: var(--shadow-sm); }
.rm-ind-card img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.55s ease; display: block; }
.rm-ind-card:hover img { transform: scale(1.07); }
.rm-ind-card::after { content: ''; position: absolute; inset: 0; background: linear-gradient(180deg, transparent 35%, rgba(24, 16, 10, 0.84) 100%); }
.rm-ind-cap { position: absolute; left: 16px; right: 16px; bottom: 14px; z-index: 2; color: #fff; }
.rm-ind-cap strong { display: block; font-family: 'Outfit', sans-serif; font-size: 16px; font-weight: 600; }
.rm-ind-cap span { font-size: 12px; color: rgba(255, 255, 255, 0.8); }

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
  .rm-hero-grid, .oc-split { grid-template-columns: 1fr; gap: 36px; }
  .rm-val-grid, .oc-rush-4, .rm-dark-kpis, .rm-ind-grid { grid-template-columns: repeat(2, 1fr); }
  .oc-kot-grid, .oc-counters-5, .oc-prog-5, .rm-ben-grid { grid-template-columns: repeat(2, 1fr); }
  .rm-eco-grid { grid-template-columns: repeat(4, 1fr); }
}
@media (max-width: 640px) {
  .w { padding: 0 16px; }
  .rm-val-grid, .oc-menu-3, .oc-rush-4, .oc-kot-grid, .oc-counters-5, .oc-inv-3, .oc-prog-5, .rm-dark-kpis, .rm-ben-grid, .rm-ind-grid { grid-template-columns: 1fr; }
  .rm-eco-grid { grid-template-columns: repeat(2, 1fr); }
  .rm-hero-stats { grid-template-columns: 1fr; gap: 12px; }
  .rm-hero-cta .btn, .rm-cta-btns .btn { width: 100%; }
  .rm-hero-float { flex-direction: column; align-items: flex-start; }
}
</style>

<div class="oc-page">
  {{-- BREADCRUMB --}}
  <nav class="bc" aria-label="Breadcrumb">
    <div class="w">
      <a href="{{ url('/') }}">Home</a>
      <span class="sep">/</span>
      <a href="{{ route('solutions') }}">Solutions</a>
      <span class="sep">/</span>
      <span class="cur">Office Canteen</span>
    </div>
  </nav>

  {{-- HERO --}}
  <section class="rm-hero">
    <div class="w rm-hero-grid">
      <div>
        <div class="eb">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><rect x="4" y="2" width="16" height="20" rx="2"/><path d="M9 22v-4h6v4"/></svg>
          OFFICE CANTEEN SOLUTION
        </div>
        <h1>Smarter Corporate Cafeteria. <span class="sf">Better Employee</span> Experience.</h1>
        <p class="rm-hero-sub">Manage menus, food orders, billing, kitchen operations, inventory and daily canteen activity from one connected platform built for modern workplaces.</p>
        <div class="rm-hero-cta">
          <a href="{{ route('restaurant_signup') }}" class="btn p">Get Started →</a>
          <a href="{{ route('contact.us') }}" class="btn o">Book a Demo →</a>
        </div>
        <div class="rm-hero-stats">
          <div class="rm-hero-stat">
            <strong>₹42,500</strong>
            <span>Daily cafeteria revenue</span>
          </div>
          <div class="rm-hero-stat">
            <strong>340+ Served</strong>
            <span>Fast lunch-hour orders</span>
          </div>
          <div class="rm-hero-stat">
            <strong>5 Counters</strong>
            <span>Meals, Cafe, Salad &amp; Pantry</span>
          </div>
        </div>
      </div>

      <div class="rm-hero-media">
        <img src="{{ asset('assets/images/office-canteen-hero.jpg') }}" alt="Modern corporate office cafeteria counter with healthy lunch bowls, espresso coffee, employee pickup and tablet POS">
        <div class="rm-hero-scrim"></div>
        <div class="rm-hero-pill">
          <span class="rm-live-dot"></span>
          Lunch Rush · 24 Active KOTs · Zero Queue Lag
        </div>
        <div class="rm-hero-float">
          <div class="rm-hero-float-left">
            <div class="rm-hero-float-ico">
              <svg viewBox="0 0 24 24"><rect x="4" y="2" width="16" height="20" rx="2"/><path d="M9 22v-4h6v4"/></svg>
            </div>
            <div>
              <div class="rm-hero-float-ttl">#3048 · Employee ID · Counter 02</div>
              <div class="rm-hero-float-sub">Executive Meal × 1, Diet Coke × 1 · Main Kitchen</div>
            </div>
          </div>
          <span class="rm-hero-float-tag">₹220 · Paid</span>
        </div>
      </div>
    </div>
  </section>

  {{-- VALUE STRIP (01 - 04) --}}
  <section class="oc-sec border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">Workplace Ecosystem</div>
        <h2>Everything Your Corporate <span class="sf">Cafeteria Needs.</span></h2>
        <p>Keep daily food service organized across employees, executives, cafeteria counters and kitchen operations.</p>
      </div>
      <div class="rm-val-grid">
        <div class="rm-val-card r">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg></div><span class="rm-num">01</span></div>
          <h3>Workplace Digital Menu</h3>
          <p>Structure daily Breakfast, Executive Lunch, Healthy Bowls and Cafe items on mobile or kiosk screens.</p>
        </div>
        <div class="rm-val-card r">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg></div><span class="rm-num">02</span></div>
          <h3>2-Tap Counter &amp; Tokens</h3>
          <p>Eliminate lunch-hour queue congestion with rapid order entry and instant thermal token printing.</p>
        </div>
        <div class="rm-val-card r">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg></div><span class="rm-num">03</span></div>
          <h3>Multi-Counter KOTs</h3>
          <p>Route thalis, sandwiches, espresso and boardroom high-tea orders straight to each preparation station.</p>
        </div>
        <div class="rm-val-card r">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><rect x="1" y="4" width="22" height="16" rx="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg></div><span class="rm-num">04</span></div>
          <h3>Meal Cards, UPI &amp; Reports</h3>
          <p>Accept employee meal cards, UPI QR and cash while tracking pantry stock and peak lunch traffic.</p>
        </div>
      </div>
    </div>
  </section>

  {{-- DIGITAL WORKPLACE MENU + 2-TAP COUNTER POS --}}
  <section class="oc-sec alt border-b">
    <div class="w oc-split">
      <div class="r">
        <div class="eb">Digital Menu &amp; Cashier Efficiency</div>
        <h2>Zero Queue Congestion <span class="sf">for Employees.</span></h2>
        <p style="margin-top:12px;">Give employees a simple way to explore available food during short lunch breaks while cashiers clear queues in seconds.</p>
        <ul class="oc-bullets">
          <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg> Categorized by Breakfast, Lunch, Snacks &amp; Beverages</li>
          <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg> 2-tap order creation &amp; instant thermal token printing</li>
          <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg> Clear pricing with corporate combo meals &amp; live sold-out status</li>
        </ul>

        <div class="oc-menu-3">
          <div class="oc-food-card">
            <img src="https://images.unsplash.com/photo-1546833999-b9f581a1996d?w=260&q=80" alt="Executive Thali" referrerpolicy="no-referrer">
            <div class="oc-food-ctx"><h4>Executive Thali</h4><strong>₹120</strong></div>
          </div>
          <div class="oc-food-card">
            <img src="https://images.unsplash.com/photo-1550547660-d9450f859349?w=260&q=80" alt="Club Sandwich" referrerpolicy="no-referrer">
            <div class="oc-food-ctx"><h4>Club Sandwich</h4><strong>₹80</strong></div>
          </div>
          <div class="oc-food-card">
            <img src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=260&q=80" alt="Caesar Salad" referrerpolicy="no-referrer">
            <div class="oc-food-ctx"><h4>Caesar Salad</h4><strong>₹150</strong></div>
          </div>
        </div>
      </div>

      <div class="rm-win r">
        <div class="rm-win-bar">
          <div class="rm-win-dots"><i></i><i></i><i></i></div>
          <div class="rm-win-ttl">Counter POS · Fast Token Checkout</div>
          <span class="oc-badge ready">Lunch Shift</span>
        </div>
        <div class="rm-win-body">
          <div class="oc-bill-row"><span><strong>Executive Thali</strong> × 2</span><strong>₹240</strong></div>
          <div class="oc-bill-row"><span><strong>Club Sandwich</strong> × 1</span><strong>₹80</strong></div>
          <div class="oc-bill-row"><span><strong>Cold Coffee</strong> × 2</span><strong>₹120</strong></div>
          <div class="oc-bill-total"><span>Total Amount</span><span>₹440</span></div>
          <div class="oc-bill-actions">
            <button type="button" class="oc-act-btn primary" onclick="ocCounterMsg('✓ Token #T-184 generated & sent to Main Kitchen!')">Generate Token</button>
            <button type="button" class="oc-act-btn" onclick="ocCounterMsg('✓ Paid ₹440 via Employee Meal Card / UPI!')">Meal Card / UPI</button>
          </div>
          <div class="oc-bill-msg" id="ocBillMsg"></div>
        </div>
      </div>
    </div>
  </section>

  {{-- PEAK LUNCH RUSH, KOT DISPLAY & 5 WORKPLACE COUNTERS --}}
  <section class="oc-sec border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">Multi-Counter &amp; KOT Display</div>
        <h2>Keep Orders Moving When <span class="sf">the Office Gets Busy.</span></h2>
        <p>Connect cafeteria counters, healthy bars, corporate cafes and boardroom pantry orders in one real-time kitchen workflow.</p>
      </div>

      <div class="oc-rush-4 r">
        <div class="oc-rush-box"><strong>42</strong><span>New Orders</span></div>
        <div class="oc-rush-box"><strong>28</strong><span>Preparing</span></div>
        <div class="oc-rush-box"><strong>15</strong><span>Ready for Token</span></div>
        <div class="oc-rush-box"><strong style="color:var(--green);">340</strong><span>Served Today</span></div>
      </div>

      <div class="oc-kot-grid r">
        <div class="oc-kot-card prep">
          <div class="oc-kot-hdr">
            <div><strong style="font-size:16px;">KOT #3048</strong><div style="font-size:11px; font-weight:700; color:var(--mute);">MAIN COUNTER · Lunch</div></div>
            <span class="oc-badge preparing">Preparing</span>
          </div>
          <ul class="oc-kot-items">
            <li><span>Executive Thali</span><strong>× 2</strong></li>
            <li><span>Diet Coke</span><strong>× 2</strong></li>
          </ul>
          <div class="oc-kot-note" style="background:var(--amber-bg); color:var(--amber);">Note: No onions</div>
        </div>

        <div class="oc-kot-card ready">
          <div class="oc-kot-hdr">
            <div><strong style="font-size:16px;">KOT #3049</strong><div style="font-size:11px; font-weight:700; color:var(--mute);">CAFE BAR · Break</div></div>
            <span class="oc-badge ready">Ready</span>
          </div>
          <ul class="oc-kot-items">
            <li><span>Cappuccino</span><strong>× 2</strong></li>
            <li><span>Club Sandwich</span><strong>× 1</strong></li>
          </ul>
          <div class="oc-kot-note" style="background:var(--green-bg); color:var(--green);">✓ Ready at Cafe Counter</div>
        </div>

        <div class="oc-kot-card new">
          <div class="oc-kot-hdr">
            <div><strong style="font-size:16px;">KOT #3051</strong><div style="font-size:11px; font-weight:700; color:var(--mute);">PANTRY · Meeting</div></div>
            <span class="oc-badge new">New</span>
          </div>
          <ul class="oc-kot-items">
            <li><span>High Tea Assortment</span><strong>× 5</strong></li>
            <li><span>Filter Coffee Flask</span><strong>× 1</strong></li>
          </ul>
          <div class="oc-kot-note" style="background:var(--blue-bg); color:var(--blue);">Send to Boardroom B</div>
        </div>
      </div>

      <div class="oc-counters-5 r">
        <div class="oc-counter-card">
          <div class="rm-ic" style="margin:0 auto;"><svg viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg></div>
          <h4>Main Cafeteria</h4><p>Thalis, Meals &amp; Buffet</p>
        </div>
        <div class="oc-counter-card">
          <div class="rm-ic" style="margin:0 auto;"><svg viewBox="0 0 24 24"><rect x="3" y="6" width="18" height="12" rx="3"/></svg></div>
          <h4>Sandwich Bar</h4><p>Subs, Paninis &amp; Wraps</p>
        </div>
        <div class="oc-counter-card">
          <div class="rm-ic" style="margin:0 auto;"><svg viewBox="0 0 24 24"><path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2z"/></svg></div>
          <h4>Healthy Corner</h4><p>Salads, Fruits &amp; Cold Press</p>
        </div>
        <div class="oc-counter-card">
          <div class="rm-ic" style="margin:0 auto;"><svg viewBox="0 0 24 24"><path d="M18 8h1a4 4 0 0 1 0 8h-1"/><path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"/></svg></div>
          <h4>Corporate Cafe</h4><p>Espresso, Pastries &amp; Tea</p>
        </div>
        <div class="oc-counter-card">
          <div class="rm-ic" style="margin:0 auto;"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/></svg></div>
          <h4>Executive Dining</h4><p>Premium À La Carte</p>
        </div>
      </div>
    </div>
  </section>

  {{-- AVAILABILITY, EMPLOYEE PAYMENTS & STOCK CONTROL --}}
  <section class="oc-sec alt border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">Availability, Payments &amp; Stock</div>
        <h2>Know What You Have <span class="sf">Before the Lunch Rush.</span></h2>
        <p>Toggle live item availability, accept Meal Cards or UPI QR, and monitor raw ingredients, coffee beans and pantry stock.</p>
      </div>

      <div class="oc-split">
        <div class="rm-win r">
          <div class="rm-win-bar">
            <div class="rm-win-dots"><i></i><i></i><i></i></div>
            <div class="rm-win-ttl">Item Availability · Tap to Toggle</div>
          </div>
          <div class="rm-win-body">
            <div class="oc-avail-list">
              <div class="oc-avail-row" onclick="toggleOcAvail(this)"><span>Executive Thali</span><span class="oc-badge ready">Available</span></div>
              <div class="oc-avail-row" onclick="toggleOcAvail(this)"><span>Grilled Chicken Salad</span><span class="oc-badge ready">Available</span></div>
              <div class="oc-avail-row" onclick="toggleOcAvail(this)"><span>Club Sandwich</span><span class="oc-badge ready">Available</span></div>
              <div class="oc-avail-row out" onclick="toggleOcAvail(this)"><span>Paneer Tikka Wrap</span><span class="oc-badge soldout">Sold Out</span></div>
            </div>
          </div>
        </div>

        <div class="rm-win r">
          <div class="rm-win-bar">
            <div class="rm-win-dots"><i></i><i></i><i></i></div>
            <div class="rm-win-ttl">Employee Payments &amp; Pantry Stock</div>
          </div>
          <div class="rm-win-body">
            <div style="display:flex; justify-content:space-between; font-size:14px; padding-bottom:10px; border-bottom:1px dashed var(--line);">
              <span>Thali × 1 (₹120) · Diet Coke × 1 (₹40) · Fruit Bowl × 1 (₹60)</span>
              <strong style="color:var(--br);">₹220</strong>
            </div>
            <div class="oc-pay-modes" id="ocPayModes">
              <button type="button" class="oc-pay-pill active" onclick="pickOcPay(this)">✓ Meal Card</button>
              <button type="button" class="oc-pay-pill" onclick="pickOcPay(this)">✓ UPI QR</button>
              <button type="button" class="oc-pay-pill" onclick="pickOcPay(this)">✓ Cash</button>
            </div>

            <div class="oc-inv-3">
              <div class="oc-inv-card"><span style="font-size:11.5px; color:var(--green); font-weight:700;">Sufficient</span><strong>12 kg</strong><div style="font-size:12px; color:var(--mute);">Coffee Beans</div></div>
              <div class="oc-inv-card"><span style="font-size:11.5px; color:var(--green); font-weight:700;">Sufficient</span><strong>30 kg</strong><div style="font-size:12px; color:var(--mute);">Fresh Vegetables</div></div>
              <div class="oc-inv-card" style="border-color:rgba(180,83,9,0.35);"><span style="font-size:11.5px; color:var(--amber); font-weight:700;">Low Stock</span><strong>48 units</strong><div style="font-size:12px; color:var(--mute);">Diet Soda Cans</div></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- DARK EDITORIAL CAFETERIA ANALYTICS --}}
  <section class="oc-sec border-b">
    <div class="w">
      <div class="rm-dark-banner r">
        <div class="rm-dark-top">
          <div>
            <div class="eb" style="background:rgba(255,255,255,0.1); color:#e6c594; border-color:rgba(230,197,148,0.28);">Business Intelligence</div>
            <h2>See How the Cafeteria <span class="sf" style="-webkit-text-fill-color:#e6c594;">is Performing.</span></h2>
            <p>Get complete visibility into daily sales, employee preferences, inventory usage, and peak hour traffic.</p>
          </div>
          <span class="oc-badge ready" style="background:rgba(22,163,74,0.2); color:#86efac;">● Live Updates</span>
        </div>

        <div class="rm-dark-kpis">
          <div class="rm-dark-kpi"><strong>₹42,500</strong><span>Total Revenue</span></div>
          <div class="rm-dark-kpi"><strong>340</strong><span>Orders Today</span></div>
          <div class="rm-dark-kpi"><strong>1:00 PM</strong><span>Peak Time</span></div>
          <div class="rm-dark-kpi"><strong>Exec Thali</strong><span>Top Item</span></div>
        </div>

        <div class="oc-bars">
          <div class="oc-bar-col"><div class="oc-bar-fill" style="height:40%;"></div><span class="oc-bar-lbl">9 AM Breakfast</span></div>
          <div class="oc-bar-col"><div class="oc-bar-fill" style="height:70%;"></div><span class="oc-bar-lbl">11 AM Tea</span></div>
          <div class="oc-bar-col"><div class="oc-bar-fill" style="height:100%;"></div><span class="oc-bar-lbl">1 PM Lunch</span></div>
          <div class="oc-bar-col"><div class="oc-bar-fill" style="height:85%;"></div><span class="oc-bar-lbl">4 PM Snacks</span></div>
          <div class="oc-bar-col"><div class="oc-bar-fill" style="height:50%;"></div><span class="oc-bar-lbl">7 PM Shift</span></div>
        </div>
      </div>
    </div>
  </section>

  {{-- 5-STEP WORKFLOW & BENEFITS --}}
  <section class="oc-sec alt border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">Workplace Workflow &amp; Benefits</div>
        <h2>Why Choose Geni Menu <span class="sf">for Your Office?</span></h2>
      </div>

      <div class="oc-prog-5 r" style="margin-bottom:40px;">
        <div class="rm-prog-card"><div class="rm-prog-num">01</div><h4>Employee Order</h4><p>Select meal or beverage</p></div>
        <div class="rm-prog-card"><div class="rm-prog-num">02</div><h4>Counter POS</h4><p>2-tap entry &amp; token print</p></div>
        <div class="rm-prog-card"><div class="rm-prog-num">03</div><h4>Kitchen KOT</h4><p>Direct station routing</p></div>
        <div class="rm-prog-card"><div class="rm-prog-num">04</div><h4>Order Ready</h4><p>Fast tray pickup</p></div>
        <div class="rm-prog-card"><div class="rm-prog-num">05</div><h4>Payment &amp; Reports</h4><p>Meal card, UPI &amp; insights</p></div>
      </div>

      <div class="rm-ben-grid">
        <div class="rm-ben-card r">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg></div><span class="rm-num">01</span></div>
          <h3>Zero Employee Wait Times</h3>
          <p>Speed up the entire ordering and pickup process so employees spend their lunch break relaxing, not waiting in queues.</p>
        </div>
        <div class="rm-ben-card r">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg></div><span class="rm-num">02</span></div>
          <h3>Centralized Control</h3>
          <p>Manage multiple corporate cafeterias, cafes, and executive dining spaces from one unified administrative dashboard.</p>
        </div>
        <div class="rm-ben-card r">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></div><span class="rm-num">03</span></div>
          <h3>Data-Driven Menus</h3>
          <p>Use real analytics to understand what employees love to eat and optimize your daily food purchasing and preparation.</p>
        </div>
      </div>
    </div>
  </section>

  {{-- PERFECT FOR ANY CORPORATE ENVIRONMENT --}}
  <section class="oc-sec border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">Ideal For</div>
        <h2>Perfect For Any <span class="sf">Corporate Environment.</span></h2>
      </div>
      <div class="rm-ind-grid r">
        <div class="rm-ind-card">
          <img src="{{ asset('assets/images/office-canteen-hero.jpg') }}" alt="IT Parks">
          <div class="rm-ind-cap"><strong>IT Parks</strong><span>Multi-counter tech park food courts</span></div>
        </div>
        <div class="rm-ind-card">
          <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=700&q=80" alt="Corporate Offices" referrerpolicy="no-referrer">
          <div class="rm-ind-cap"><strong>Corporate Offices</strong><span>Executive dining, pantry &amp; coffee bars</span></div>
        </div>
        <div class="rm-ind-card">
          <img src="https://images.unsplash.com/photo-1527192491265-7e15c55b1ed2?auto=format&fit=crop&w=700&q=80" alt="Co-working Spaces" referrerpolicy="no-referrer">
          <div class="rm-ind-cap"><strong>Co-working Spaces</strong><span>Cafe counters, snacks &amp; instant UPI</span></div>
        </div>
        <div class="rm-ind-card">
          <img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?auto=format&fit=crop&w=700&q=80" alt="Industrial Canteens" referrerpolicy="no-referrer">
          <div class="rm-ind-cap"><strong>Industrial Canteens</strong><span>High-volume shift meals &amp; batch KOTs</span></div>
        </div>
      </div>
    </div>
  </section>

  {{-- CONNECTED ECOSYSTEM (7 MODULES) --}}
  <section class="oc-sec alt border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">Connected Ecosystem</div>
        <h2>Everything Works Better <span class="sf">Together.</span></h2>
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
  <section class="oc-sec">
    <div class="w">
      <div class="hd r">
        <div class="eb">Frequently Asked Questions</div>
        <h2>Office Canteen <span class="sf">FAQ.</span></h2>
      </div>
      <div class="rm-faq-list r">
        <div class="rm-faq-item open">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>1. Is Geni Menu suitable for corporate office cafeterias and IT parks?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">Yes. Geni Menu is built to handle peak lunch-hour surges, multi-counter food courts, instant token printing, kitchen KOTs, and centralized reporting for corporate workplaces.</div>
        </div>
        <div class="rm-faq-item">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>2. Can I manage multiple cafeteria counters under one account?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">Yes. Main cafeteria counters, sandwich bars, healthy salad corners, corporate coffee bars, and executive dining counters can operate smoothly while feeding into one central dashboard.</div>
        </div>
        <div class="rm-faq-item">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>3. What payment modes can employees use at the counter?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">Cashiers can record employee meal cards, UPI QR scans, cards, or cash transactions through a fast checkout flow.</div>
        </div>
        <div class="rm-faq-item">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>4. Can pantry and meeting-room refreshment orders be tracked?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">Yes. Pantry staff can receive dedicated KOTs with room notes (e.g., Boardroom B high-tea assortment) and track preparation to delivery.</div>
        </div>
        <div class="rm-faq-item">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>5. Can I monitor pantry supplies and daily cafeteria sales?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">Yes. Inventory tracking monitors coffee beans, fresh vegetables, beverages, and supplies, while live reports display daily revenue, total orders, and peak-hour traffic.</div>
        </div>
      </div>
    </div>
  </section>

  {{-- FINAL CTA --}}
  <section class="rm-cta">
    <div class="w r">
      <h2>Ready to Upgrade Your Workplace Cafeteria?</h2>
      <p>Join modern corporate facilities using Geni Menu to provide a seamless, fast dining experience for their employees.</p>
      <div class="rm-cta-btns">
        <a href="{{ route('restaurant_signup') }}" class="btn wht">Get Started →</a>
        <a href="{{ route('contact.us') }}" class="btn ghost-wht">Schedule a Demo Today →</a>
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

function ocCounterMsg(txt) {
  const msg = document.getElementById('ocBillMsg');
  if (!msg) return;
  msg.style.display = 'block';
  msg.style.background = 'var(--green-bg)';
  msg.style.color = 'var(--green)';
  msg.textContent = txt;
}

function toggleOcAvail(row) {
  const badge = row.querySelector('.oc-badge');
  const isOut = row.classList.toggle('out');
  badge.className = isOut ? 'oc-badge soldout' : 'oc-badge ready';
  badge.textContent = isOut ? 'Sold Out' : 'Available';
}

function pickOcPay(btn) {
  document.querySelectorAll('#ocPayModes .oc-pay-pill').forEach(b => b.classList.remove('active'));
  btn.classList.add('active');
}

document.addEventListener('DOMContentLoaded', function() {
  const els = document.querySelectorAll('.oc-page .r');
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
