@php
$meta = [
    'title' => 'College Canteen & Campus Cafeteria POS Software | Geni Menu',
    'description' => 'Smarter canteen operations and better student dining experience. Manage campus menus, multi-counter food orders, 2-tap tokens, KOTs, UPI/campus cards, inventory and daily canteen reports with Geni Menu.',
    'keywords' => 'college canteen POS software, university cafeteria billing, student food court token system, hostel mess management software, campus canteen KOT, Geni Menu',
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

.cc-page * { box-sizing: border-box; }
.cc-page {
  font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
  color: var(--ink);
  background: var(--bg);
  -webkit-font-smoothing: antialiased;
  overflow-x: hidden;
}

.cc-page h1, .cc-page h2, .cc-page h3, .cc-page h4 {
  margin: 0;
  font-family: 'Outfit', 'Plus Jakarta Sans', sans-serif;
  font-weight: 500;
  line-height: 1.14;
  letter-spacing: -0.025em;
  color: var(--ink);
}
.cc-page h1 { font-size: clamp(34px, 4.6vw, 56px); }
.cc-page h2 { font-size: clamp(28px, 3.6vw, 44px); }
.cc-page h3 { font-size: 20px; font-weight: 600; }
.cc-page p { margin: 0; color: var(--mute); font-size: 16px; line-height: 1.65; }
.cc-page a { text-decoration: none; color: inherit; }

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
.cc-sec { padding: clamp(56px, 6.5vw, 92px) 0; background: var(--bg); position: relative; overflow: hidden; }
.cc-sec.alt { background: var(--bg2); }
.cc-sec.border-b { border-bottom: 1px solid var(--line); }

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
.rm-hero-scrim { position: absolute; inset: 0; background: linear-gradient(180deg, rgba(33, 22, 15, 0.14) 0%, rgba(33, 22, 15, 0.05) 45%, rgba(33, 22, 15, 0.65) 100%); pointer-events: none; }
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

.cc-badge { font-size: 10.5px; font-weight: 700; padding: 4px 10px; border-radius: 99px; text-transform: uppercase; letter-spacing: .04em; display: inline-block; }
.cc-badge.ready { background: var(--green-bg); color: var(--green); }
.cc-badge.preparing { background: var(--amber-bg); color: var(--amber); }
.cc-badge.new { background: var(--blue-bg); color: var(--blue); }
.cc-badge.soldout { background: var(--red-bg); color: var(--red); }

/* Split Layouts, Menu & Counter POS */
.cc-split { display: grid; grid-template-columns: 1fr 1.05fr; gap: 40px; align-items: start; }
.cc-bullets { list-style: none; padding: 0; margin: 18px 0 22px; display: flex; flex-direction: column; gap: 10px; }
.cc-bullets li { display: flex; align-items: center; gap: 10px; font-size: 14.5px; font-weight: 600; color: var(--ink); }
.cc-bullets svg { width: 18px; height: 18px; color: var(--br); flex-shrink: 0; }

.cc-menu-3 { display: grid; grid-template-columns: repeat(3, 1fr); gap: 12px; }
.cc-food-card { background: #fff; border: 1px solid var(--line); border-radius: 14px; overflow: hidden; transition: .25s ease; }
.cc-food-card:hover { border-color: var(--br); transform: translateY(-2px); box-shadow: var(--shadow-sm); }
.cc-food-card img { width: 100%; height: 96px; object-fit: cover; display: block; }
.cc-food-ctx { padding: 11px; }
.cc-food-ctx h4 { font-size: 14px; font-weight: 700; margin-bottom: 3px; }
.cc-food-ctx strong { color: var(--br); font-family: 'Outfit', sans-serif; font-size: 14px; }

.cc-bill-row { display: flex; justify-content: space-between; align-items: center; padding: 10px 0; border-bottom: 1px dashed var(--line); font-size: 14px; }
.cc-bill-total { display: flex; justify-content: space-between; align-items: center; padding: 14px 0 10px; font-family: 'Outfit', sans-serif; font-size: 22px; font-weight: 700; color: var(--br); }
.cc-bill-actions { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-top: 10px; }
.cc-act-btn { padding: 12px; border-radius: 10px; border: 1.5px solid var(--line); background: #fff; color: var(--ink); font: 700 13.5px 'Plus Jakarta Sans', sans-serif; cursor: pointer; }
.cc-act-btn.primary { background: var(--br); color: #fff; border-color: var(--br); }
.cc-bill-msg { margin-top: 10px; font-size: 12px; font-weight: 700; padding: 8px 10px; border-radius: 10px; text-align: center; display: none; }

/* Peak Break Rush, KOTs & 5 Counters */
.cc-rush-4 { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; margin-bottom: 32px; }
.cc-rush-box { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 20px 14px; text-align: center; }
.cc-rush-box strong { display: block; font-family: 'Outfit', sans-serif; font-size: 32px; font-weight: 600; color: var(--br); line-height: 1.15; }
.cc-rush-box span { font-size: 11.5px; font-weight: 700; color: var(--mute); text-transform: uppercase; letter-spacing: .05em; }

.cc-kot-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 18px; margin-bottom: 32px; }
.cc-kot-card { background: #fff; border: 1px solid var(--line); border-radius: 18px; padding: 20px; border-top: 4px solid var(--br); }
.cc-kot-card.prep { border-top-color: var(--amber); }
.cc-kot-card.ready { border-top-color: var(--green); }
.cc-kot-card.new { border-top-color: var(--blue); }
.cc-kot-hdr { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 12px; }
.cc-kot-items { list-style: none; padding: 0; margin: 0 0 12px; font-size: 14px; }
.cc-kot-items li { display: flex; justify-content: space-between; padding: 5px 0; border-bottom: 1px dashed var(--line); }
.cc-kot-items li:last-child { border-bottom: none; }
.cc-kot-note { padding: 8px 12px; border-radius: 10px; font-size: 12px; font-weight: 700; }

.cc-counters-5 { display: grid; grid-template-columns: repeat(5, 1fr); gap: 14px; }
.cc-counter-card { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 18px 12px; text-align: center; transition: .25s ease; }
.cc-counter-card:hover { border-color: var(--br); transform: translateY(-3px); box-shadow: var(--shadow-sm); }
.cc-counter-card h4 { font-size: 14.5px; font-weight: 700; margin: 10px 0 4px; }
.cc-counter-card p { font-size: 12px; }

/* Availability, Payments & Stock */
.cc-avail-list { display: flex; flex-direction: column; gap: 8px; }
.cc-avail-row { display: flex; justify-content: space-between; align-items: center; padding: 11px 14px; border-radius: 12px; border: 1px solid var(--line); background: #fff; font-size: 14px; font-weight: 600; cursor: pointer; }
.cc-avail-row.out { background: var(--red-bg); border-color: rgba(185, 28, 28, 0.22); }

.cc-pay-modes { display: grid; grid-template-columns: repeat(3, 1fr); gap: 8px; margin-top: 12px; }
.cc-pay-pill { padding: 10px; border-radius: 10px; border: 1.5px solid var(--line); background: var(--bg2); font: 700 12.5px 'Plus Jakarta Sans', sans-serif; color: var(--ink); cursor: pointer; text-align: center; }
.cc-pay-pill.active { background: var(--br); color: #fff; border-color: var(--br); }

.cc-inv-3 { display: grid; grid-template-columns: repeat(3, 1fr); gap: 14px; margin-top: 18px; }
.cc-inv-card { background: var(--bg2); border: 1px solid var(--line); border-radius: 14px; padding: 14px; }
.cc-inv-card strong { display: block; font-family: 'Outfit', sans-serif; font-size: 22px; color: var(--ink); margin: 4px 0 2px; }

/* Dark Editorial Campus Report Banner */
.rm-dark-banner { background: linear-gradient(135deg, #21160F 0%, #342318 100%); border-radius: 26px; padding: clamp(28px, 4vw, 48px); color: #fff; box-shadow: var(--shadow-lg); position: relative; overflow: hidden; }
.rm-dark-banner::after { content: ''; position: absolute; right: -80px; top: -80px; width: 280px; height: 280px; border-radius: 50%; background: radial-gradient(circle, rgba(184, 142, 86, 0.24) 0%, transparent 70%); pointer-events: none; }
.rm-dark-top { display: flex; justify-content: space-between; align-items: flex-end; gap: 24px; flex-wrap: wrap; margin-bottom: 28px; padding-bottom: 24px; border-bottom: 1px solid rgba(255, 255, 255, 0.12); }
.rm-dark-top h2 { color: #fff; font-size: clamp(26px, 3vw, 36px); }
.rm-dark-top p { color: rgba(255, 255, 255, 0.72); max-width: 520px; margin-top: 8px; }
.rm-dark-kpis { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; }
.rm-dark-kpi { background: rgba(255, 255, 255, 0.06); border: 1px solid rgba(255, 255, 255, 0.12); border-radius: 16px; padding: 18px 20px; }
.rm-dark-kpi strong { display: block; font-family: 'Outfit', sans-serif; font-size: 26px; font-weight: 600; color: #F5EFE6; line-height: 1.15; }
.rm-dark-kpi span { font-size: 11.5px; font-weight: 700; color: rgba(255, 255, 255, 0.65); text-transform: uppercase; letter-spacing: .06em; }

/* 6-Step Workflow & Benefits */
.rm-prog-grid-6 { display: grid; grid-template-columns: repeat(6, 1fr); gap: 14px; }
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

/* Photo Cards & Pills */
.rm-ind-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 18px; margin-bottom: 22px; }
.rm-ind-card { position: relative; border-radius: 18px; overflow: hidden; aspect-ratio: 4 / 3; border: 1px solid var(--line); box-shadow: var(--shadow-sm); }
.rm-ind-card img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.55s ease; display: block; }
.rm-ind-card:hover img { transform: scale(1.07); }
.rm-ind-card::after { content: ''; position: absolute; inset: 0; background: linear-gradient(180deg, transparent 35%, rgba(24, 16, 10, 0.84) 100%); }
.rm-ind-cap { position: absolute; left: 16px; right: 16px; bottom: 14px; z-index: 2; color: #fff; }
.rm-ind-cap strong { display: block; font-family: 'Outfit', sans-serif; font-size: 16px; font-weight: 600; }
.rm-ind-cap span { font-size: 12px; color: rgba(255, 255, 255, 0.8); }
.cc-model-pills { display: flex; flex-wrap: wrap; justify-content: center; gap: 10px; }
.cc-model-pill { padding: 9px 16px; border-radius: 99px; background: #fff; border: 1px solid var(--line); font-size: 13px; font-weight: 700; color: var(--ink); }

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
  .rm-hero-grid, .cc-split { grid-template-columns: 1fr; gap: 36px; }
  .rm-val-grid, .cc-rush-4, .rm-dark-kpis, .rm-ind-grid { grid-template-columns: repeat(2, 1fr); }
  .cc-kot-grid, .cc-counters-5, .rm-prog-grid-6, .rm-ben-grid { grid-template-columns: repeat(2, 1fr); }
  .rm-eco-grid { grid-template-columns: repeat(4, 1fr); }
}
@media (max-width: 640px) {
  .w { padding: 0 16px; }
  .rm-val-grid, .cc-menu-3, .cc-rush-4, .cc-kot-grid, .cc-counters-5, .cc-inv-3, .rm-prog-grid-6, .rm-dark-kpis, .rm-ben-grid, .rm-ind-grid { grid-template-columns: 1fr; }
  .rm-eco-grid { grid-template-columns: repeat(2, 1fr); }
  .rm-hero-stats { grid-template-columns: 1fr; gap: 12px; }
  .rm-hero-cta .btn, .rm-cta-btns .btn { width: 100%; }
  .rm-hero-float { flex-direction: column; align-items: flex-start; }
}
</style>

<div class="cc-page">
  {{-- BREADCRUMB --}}
  <nav class="bc" aria-label="Breadcrumb">
    <div class="w">
      <a href="{{ url('/') }}">Home</a>
      <span class="sep">/</span>
      <a href="{{ route('solutions') }}">Solutions</a>
      <span class="sep">/</span>
      <span class="cur">College Canteen</span>
    </div>
  </nav>

  {{-- HERO --}}
  <section class="rm-hero">
    <div class="w rm-hero-grid">
      <div>
        <div class="eb">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
          COLLEGE CANTEEN SOLUTION
        </div>
        <h1>Smarter Canteen Operations. <span class="sf">Better Student</span> Experience.</h1>
        <p class="rm-hero-sub">Manage menus, food orders, billing, kitchen operations, inventory and daily canteen activity from one connected platform built for colleges and educational institutions.</p>
        <div class="rm-hero-cta">
          <a href="{{ route('restaurant_signup') }}" class="btn p">Get Started →</a>
          <a href="{{ route('contact.us') }}" class="btn o">Book a Demo →</a>
        </div>
        <div class="rm-hero-stats">
          <div class="rm-hero-stat">
            <strong>₹38,450</strong>
            <span>Daily campus canteen sales</span>
          </div>
          <div class="rm-hero-stat">
            <strong>412 Orders</strong>
            <span>Break &amp; lunch-hour rush</span>
          </div>
          <div class="rm-hero-stat">
            <strong>5 Counters</strong>
            <span>Meals, Snacks, Juice &amp; Coffee</span>
          </div>
        </div>
      </div>

      <div class="rm-hero-media">
        <img src="{{ asset('assets/images/college-canteen-hero.jpg') }}" alt="Vibrant college campus cafeteria and student food court serving fresh meals and snacks">
        <div class="rm-hero-scrim"></div>
        <div class="rm-hero-pill">
          <span class="rm-live-dot"></span>
          Break Rush · 18 Active KOTs · 12 Ready Tokens
        </div>
        <div class="rm-hero-float">
          <div class="rm-hero-float-left">
            <div class="rm-hero-float-ico">
              <svg viewBox="0 0 24 24"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/></svg>
            </div>
            <div>
              <div class="rm-hero-float-ttl">#2048 · Student Token · Counter 02</div>
              <div class="rm-hero-float-sub">Veg Meals × 2, Fresh Lime × 2 · Main Meals Wok</div>
            </div>
          </div>
          <span class="rm-hero-float-tag">₹240 · Token Ready</span>
        </div>
      </div>
    </div>
  </section>

  {{-- VALUE STRIP (01 - 04) --}}
  <section class="cc-sec border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">Campus Canteen Ecosystem</div>
        <h2>Everything Your Campus <span class="sf">Canteen Needs.</span></h2>
        <p>Keep everyday food service organized across students, staff, counters and kitchen operations.</p>
      </div>
      <div class="rm-val-grid">
        <div class="rm-val-card r">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg></div><span class="rm-num">01</span></div>
          <h3>Campus QR Digital Menu</h3>
          <p>Let students and faculty scan QR codes to browse Breakfast, Meals, Snacks and Juices with live availability.</p>
        </div>
        <div class="rm-val-card r">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg></div><span class="rm-num">02</span></div>
          <h3>2-Tap Tokens &amp; POS</h3>
          <p>Eliminate break-hour queue congestion with 2-tap snack billing and instant thermal token receipts.</p>
        </div>
        <div class="rm-val-card r">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg></div><span class="rm-num">03</span></div>
          <h3>Multi-Counter KOTs</h3>
          <p>Route student, faculty and hostel mess orders directly to Meals, South Indian, Juice and Wok stations.</p>
        </div>
        <div class="rm-val-card r">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></div><span class="rm-num">04</span></div>
          <h3>UPI, Campus Cards &amp; Stock</h3>
          <p>Accept cash, UPI QR and campus cards while monitoring rice, vegetables, milk and daily revenue.</p>
        </div>
      </div>
    </div>
  </section>

  {{-- DIGITAL CAMPUS MENU + 2-TAP COUNTER POS --}}
  <section class="cc-sec alt border-b">
    <div class="w cc-split">
      <div class="r">
        <div class="eb">Digital Menu &amp; Cashier Efficiency</div>
        <h2>Zero Queue Congestion <span class="sf">at Cash Counters.</span></h2>
        <p style="margin-top:12px;">Give students and staff a simple way to explore available food during short break intervals while cashiers print tokens in seconds.</p>
        <ul class="cc-bullets">
          <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg> Categorized by Breakfast, Meals, Snacks &amp; Juices</li>
          <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg> 2-tap order creation &amp; instant token receipt printing</li>
          <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg> Student-friendly combo deals &amp; live sold-out toggles</li>
        </ul>

        <div class="cc-menu-3">
          <div class="cc-food-card">
            <img src="https://images.unsplash.com/photo-1668236543090-82eba5ee5976?w=260&q=80" alt="Masala Dosa" referrerpolicy="no-referrer">
            <div class="cc-food-ctx"><h4>Masala Dosa</h4><strong>₹60</strong></div>
          </div>
          <div class="cc-food-card">
            <img src="https://images.unsplash.com/photo-1601050690597-df0568f70950?w=260&q=80" alt="Hot Samosa" referrerpolicy="no-referrer">
            <div class="cc-food-ctx"><h4>Hot Samosa</h4><strong>₹20</strong></div>
          </div>
          <div class="cc-food-card">
            <img src="https://images.unsplash.com/photo-1546833999-b9f581a1996d?w=260&q=80" alt="South Veg Meal" referrerpolicy="no-referrer">
            <div class="cc-food-ctx"><h4>South Veg Meal</h4><strong>₹90</strong></div>
          </div>
        </div>
      </div>

      <div class="rm-win r">
        <div class="rm-win-bar">
          <div class="rm-win-dots"><i></i><i></i><i></i></div>
          <div class="rm-win-ttl">Counter POS · Break Rush</div>
          <span class="cc-badge ready">Token Ready</span>
        </div>
        <div class="rm-win-body">
          <div class="cc-bill-row"><span><strong>South Veg Meals</strong> × 2</span><strong>₹180</strong></div>
          <div class="cc-bill-row"><span><strong>Hot Samosa</strong> × 3</span><strong>₹60</strong></div>
          <div class="cc-bill-row"><span><strong>Fresh Lime Soda</strong> × 2</span><strong>₹80</strong></div>
          <div class="cc-bill-total"><span>Total Amount</span><span>₹320</span></div>
          <div class="cc-bill-actions">
            <button type="button" class="cc-act-btn primary" onclick="ccCounterMsg('✓ Student Token #2052 printed & sent to kitchen!')">Generate Token</button>
            <button type="button" class="cc-act-btn" onclick="ccCounterMsg('✓ ₹320 received via UPI QR / Campus Card!')">Accept UPI</button>
          </div>
          <div class="cc-bill-msg" id="ccBillMsg"></div>
        </div>
      </div>
    </div>
  </section>

  {{-- PEAK BREAK RUSH, KOT DISPLAY & 5 CAMPUS COUNTERS --}}
  <section class="cc-sec border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">Multi-Counter &amp; KOT Display</div>
        <h2>Keep Orders Moving When <span class="sf">the Campus Gets Busy.</span></h2>
        <p>Connect canteen food orders directly with KOT displays across student, faculty and hostel counters for smooth batch cooking.</p>
      </div>

      <div class="cc-rush-4 r">
        <div class="cc-rush-box"><strong>24</strong><span>New Orders</span></div>
        <div class="cc-rush-box"><strong>18</strong><span>Preparing</span></div>
        <div class="cc-rush-box"><strong>12</strong><span>Ready for Token</span></div>
        <div class="cc-rush-box"><strong style="color:var(--green);">146</strong><span>Served Today</span></div>
      </div>

      <div class="cc-kot-grid r">
        <div class="cc-kot-card prep">
          <div class="cc-kot-hdr">
            <div><strong style="font-size:16px;">KOT #2048</strong><div style="font-size:11px; font-weight:700; color:var(--mute);">COUNTER 02 · Student</div></div>
            <span class="cc-badge preparing">Preparing</span>
          </div>
          <ul class="cc-kot-items">
            <li><span>South Veg Meals</span><strong>× 2</strong></li>
            <li><span>Fresh Lime Soda</span><strong>× 2</strong></li>
          </ul>
          <div class="cc-kot-note" style="background:var(--amber-bg); color:var(--amber);">Note: Less Spicy for Meals</div>
        </div>

        <div class="cc-kot-card ready">
          <div class="cc-kot-hdr">
            <div><strong style="font-size:16px;">KOT #2049</strong><div style="font-size:11px; font-weight:700; color:var(--mute);">COUNTER 01 · Faculty</div></div>
            <span class="cc-badge ready">Ready</span>
          </div>
          <ul class="cc-kot-items">
            <li><span>Masala Dosa</span><strong>× 1</strong></li>
            <li><span>Filter Coffee</span><strong>× 1</strong></li>
          </ul>
          <div class="cc-kot-note" style="background:var(--green-bg); color:var(--green);">✓ Ready at Counter 01</div>
        </div>

        <div class="cc-kot-card new">
          <div class="cc-kot-hdr">
            <div><strong style="font-size:16px;">KOT #2051</strong><div style="font-size:11px; font-weight:700; color:var(--mute);">JUICE BAR · Student</div></div>
            <span class="cc-badge new">New</span>
          </div>
          <ul class="cc-kot-items">
            <li><span>Paneer Roll</span><strong>× 2</strong></li>
            <li><span>Mango Juice</span><strong>× 1</strong></li>
          </ul>
          <div class="cc-kot-note" style="background:var(--blue-bg); color:var(--blue);">Just Received</div>
        </div>
      </div>

      <div class="cc-counters-5 r">
        <div class="cc-counter-card">
          <div class="rm-ic" style="margin:0 auto;"><svg viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg></div>
          <h4>Main Canteen</h4><p>Meals, Biryani &amp; South Indian</p>
        </div>
        <div class="cc-counter-card">
          <div class="rm-ic" style="margin:0 auto;"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/></svg></div>
          <h4>Snack Counter</h4><p>Samosa, Puffs &amp; Sandwiches</p>
        </div>
        <div class="cc-counter-card">
          <div class="rm-ic" style="margin:0 auto;"><svg viewBox="0 0 24 24"><path d="M17 3v3H7V3M6 3h12l-2 18H8z"/></svg></div>
          <h4>Juice Bar</h4><p>Fresh Juices &amp; Milkshakes</p>
        </div>
        <div class="cc-counter-card">
          <div class="rm-ic" style="margin:0 auto;"><svg viewBox="0 0 24 24"><path d="M18 8h1a4 4 0 0 1 0 8h-1"/><path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"/></svg></div>
          <h4>Coffee Corner</h4><p>Tea, Filter Coffee &amp; Snacks</p>
        </div>
        <div class="cc-counter-card">
          <div class="rm-ic" style="margin:0 auto;"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/></svg></div>
          <h4>Fast Food Wok</h4><p>Rolls, Noodles &amp; Burgers</p>
        </div>
      </div>
    </div>
  </section>

  {{-- AVAILABILITY, STUDENT PAYMENTS & STOCK CONTROL --}}
  <section class="cc-sec alt border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">Availability, Payments &amp; Stock</div>
        <h2>Know What You Have <span class="sf">Before the Lunch Rush.</span></h2>
        <p>Toggle live item availability for students, accept Cash, UPI QR or Campus Cards, and monitor rice, vegetables and milk stock.</p>
      </div>

      <div class="cc-split">
        <div class="rm-win r">
          <div class="rm-win-bar">
            <div class="rm-win-dots"><i></i><i></i><i></i></div>
            <div class="rm-win-ttl">Item Availability · Tap to Toggle</div>
          </div>
          <div class="rm-win-body">
            <div class="cc-avail-list">
              <div class="cc-avail-row" onclick="toggleCcAvail(this)"><span>South Veg Meal</span><span class="cc-badge ready">Available</span></div>
              <div class="cc-avail-row" onclick="toggleCcAvail(this)"><span>Chicken Biryani</span><span class="cc-badge ready">Available</span></div>
              <div class="cc-avail-row" onclick="toggleCcAvail(this)"><span>Hot Samosa</span><span class="cc-badge ready">Available</span></div>
              <div class="cc-avail-row out" onclick="toggleCcAvail(this)"><span>Paneer Roll</span><span class="cc-badge soldout">Sold Out</span></div>
            </div>
          </div>
        </div>

        <div class="rm-win r">
          <div class="rm-win-bar">
            <div class="rm-win-dots"><i></i><i></i><i></i></div>
            <div class="rm-win-ttl">Student Payments &amp; Kitchen Stock</div>
          </div>
          <div class="rm-win-body">
            <div style="display:flex; justify-content:space-between; font-size:14px; padding-bottom:10px; border-bottom:1px dashed var(--line);">
              <span>Veg Meal × 1 (₹80) · Fresh Lime × 1 (₹40) · Samosa × 2 (₹40)</span>
              <strong style="color:var(--br);">₹160</strong>
            </div>
            <div class="cc-pay-modes" id="ccPayModes">
              <button type="button" class="cc-pay-pill" onclick="pickCcPay(this)">✓ Cash</button>
              <button type="button" class="cc-pay-pill active" onclick="pickCcPay(this)">✓ UPI QR</button>
              <button type="button" class="cc-pay-pill" onclick="pickCcPay(this)">✓ Campus Card</button>
            </div>

            <div class="cc-inv-3">
              <div class="cc-inv-card"><span style="font-size:11.5px; color:var(--green); font-weight:700;">Sufficient</span><strong>40 kg</strong><div style="font-size:12px; color:var(--mute);">Rice Stock</div></div>
              <div class="cc-inv-card"><span style="font-size:11.5px; color:var(--green); font-weight:700;">Sufficient</span><strong>25 kg</strong><div style="font-size:12px; color:var(--mute);">Fresh Vegetables</div></div>
              <div class="cc-inv-card" style="border-color:rgba(180,83,9,0.35);"><span style="font-size:11.5px; color:var(--amber); font-weight:700;">Low Stock</span><strong>15 L</strong><div style="font-size:12px; color:var(--mute);">Fresh Milk</div></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- DARK EDITORIAL DAILY CANTEEN REPORT --}}
  <section class="cc-sec border-b">
    <div class="w">
      <div class="rm-dark-banner r">
        <div class="rm-dark-top">
          <div>
            <div class="eb" style="background:rgba(255,255,255,0.1); color:#e6c594; border-color:rgba(230,197,148,0.28);">Canteen Intelligence</div>
            <h2>Understand Your <span class="sf" style="-webkit-text-fill-color:#e6c594;">Canteen Performance.</span></h2>
            <p>Analyze daily sales, total student orders, popular food items and peak break-hour activity — on desktop or mobile.</p>
          </div>
          <span class="cc-badge ready" style="background:rgba(22,163,74,0.2); color:#86efac;">● Today's Summary</span>
        </div>

        <div class="rm-dark-kpis">
          <div class="rm-dark-kpi"><strong>₹38,450</strong><span>Daily Revenue</span></div>
          <div class="rm-dark-kpi"><strong>412</strong><span>Total Orders</span></div>
          <div class="rm-dark-kpi"><strong>Samosa</strong><span>Top Snack</span></div>
          <div class="rm-dark-kpi"><strong>1:00 – 2:00 PM</strong><span>Peak Rush</span></div>
        </div>
      </div>
    </div>
  </section>

  {{-- 6-STEP CAMPUS FLOW & KEY BENEFITS (01 - 06) --}}
  <section class="cc-sec alt border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">Key Benefits</div>
        <h2>Built for Busy <span class="sf">Campus Food Service.</span></h2>
        <p>Streamline canteen operations, reduce student queue times, and eliminate cash handling friction.</p>
      </div>

      <div class="rm-prog-grid-6 r" style="margin-bottom:40px;">
        <div class="rm-prog-card"><div class="rm-prog-num">01</div><h4>Student / Staff</h4><p>Scan QR or visit counter</p></div>
        <div class="rm-prog-card"><div class="rm-prog-num">02</div><h4>Menu &amp; Order</h4><p>Pick meals, snacks or juice</p></div>
        <div class="rm-prog-card"><div class="rm-prog-num">03</div><h4>KOT Fired</h4><p>Routed to food station</p></div>
        <div class="rm-prog-card"><div class="rm-prog-num">04</div><h4>Batch Kitchen</h4><p>Prepared fast &amp; fresh</p></div>
        <div class="rm-prog-card"><div class="rm-prog-num">05</div><h4>Serve / Token</h4><p>Quick token handover</p></div>
        <div class="rm-prog-card"><div class="rm-prog-num">06</div><h4>Daily Reports</h4><p>Sales &amp; stock analytics</p></div>
      </div>

      <div class="rm-ben-grid">
        <div class="rm-ben-card r">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg></div><span class="rm-num">01</span></div>
          <h3>Faster Ordering</h3>
          <p>Keep food orders moving rapidly during short campus break intervals and lunch rushes.</p>
        </div>
        <div class="rm-ben-card r">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/></svg></div><span class="rm-num">02</span></div>
          <h3>Simpler Counter Operations</h3>
          <p>Make everyday checkout and token generation simple for canteen cashier staff.</p>
        </div>
        <div class="rm-ben-card r">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg></div><span class="rm-num">03</span></div>
          <h3>Clear Kitchen Workflow</h3>
          <p>Keep food preparation staff organized with live KOT displays for batch cooking.</p>
        </div>
        <div class="rm-ben-card r">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M9 12l2 2 4-4"/></svg></div><span class="rm-num">04</span></div>
          <h3>Better Food Availability</h3>
          <p>Keep students informed in real time about available items and sold-out dishes.</p>
        </div>
        <div class="rm-ben-card r">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg></div><span class="rm-num">05</span></div>
          <h3>Inventory Visibility</h3>
          <p>Maintain awareness of essential raw ingredients and milk stock before peak demand.</p>
        </div>
        <div class="rm-ben-card r">
          <div class="rm-val-top"><div class="rm-ic"><svg viewBox="0 0 24 24"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></div><span class="rm-num">06</span></div>
          <h3>Canteen Insights</h3>
          <p>Gain actionable reports on daily canteen revenue, student volume, and top menu items.</p>
        </div>
      </div>
    </div>
  </section>

  {{-- CAMPUS SHOWCASE & 8 EDUCATIONAL ENVIRONMENTS --}}
  <section class="cc-sec border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">Educational Institution Fit</div>
        <h2>Designed for Different <span class="sf">Campus Food Environments.</span></h2>
      </div>
      <div class="rm-ind-grid r">
        <div class="rm-ind-card">
          <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=700&q=80" alt="Engineering Canteens" referrerpolicy="no-referrer">
          <div class="rm-ind-cap"><strong>Engineering Canteens</strong><span>High-speed break-hour snacks &amp; meals</span></div>
        </div>
        <div class="rm-ind-card">
          <img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?auto=format&fit=crop&w=700&q=80" alt="University Food Courts" referrerpolicy="no-referrer">
          <div class="rm-ind-cap"><strong>University Food Courts</strong><span>Multi-counter student dining hubs</span></div>
        </div>
        <div class="rm-ind-card">
          <img src="{{ asset('assets/images/college-canteen-hero.jpg') }}" alt="Hostel Messes">
          <div class="rm-ind-cap"><strong>Hostel Messes</strong><span>Batch meal prep &amp; stock visibility</span></div>
        </div>
        <div class="rm-ind-card">
          <img src="https://images.unsplash.com/photo-1546833999-b9f581a1996d?auto=format&fit=crop&w=700&q=80" alt="Faculty Cafeterias" referrerpolicy="no-referrer">
          <div class="rm-ind-cap"><strong>Faculty Cafeterias</strong><span>Dedicated staff dining &amp; filter coffee</span></div>
        </div>
      </div>
      <div class="cc-model-pills r">
        <span class="cc-model-pill">College Canteens</span>
        <span class="cc-model-pill">University Canteens</span>
        <span class="cc-model-pill">Student Food Courts</span>
        <span class="cc-model-pill">Hostel Messes</span>
        <span class="cc-model-pill">Faculty Cafeterias</span>
        <span class="cc-model-pill">Staff Canteens</span>
        <span class="cc-model-pill">Engineering Colleges</span>
        <span class="cc-model-pill">Medical Colleges</span>
      </div>
    </div>
  </section>

  {{-- CONNECTED ECOSYSTEM (7 MODULES) --}}
  <section class="cc-sec alt border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">Connected Ecosystem</div>
        <h2>Everything From Menu <span class="sf">to Service.</span></h2>
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
  <section class="cc-sec">
    <div class="w">
      <div class="hd r">
        <div class="eb">Frequently Asked Questions</div>
        <h2>College Canteen <span class="sf">FAQ.</span></h2>
      </div>
      <div class="rm-faq-list r">
        <div class="rm-faq-item open">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>1. Is Geni Menu suitable for college canteens?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">Yes. Geni Menu is designed to handle high-volume break-hour surges, multi-counter ordering, kitchen KOTs, and rapid token printing for campus canteens.</div>
        </div>
        <div class="rm-faq-item">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>2. Can students browse the digital menu on their phones?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">Yes. Students can scan QR codes placed around the canteen or campus to view current food items, pricing, and availability.</div>
        </div>
        <div class="rm-faq-item">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>3. Can canteen staff manage food availability and sold-out items?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">Yes. Staff can toggle items as AVAILABLE or SOLD OUT with a single tap to keep students accurately informed.</div>
        </div>
        <div class="rm-faq-item">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>4. Can I manage multiple food counters under one system?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">Yes. Separate counters such as Meals, Snacks, Juice Bar, and Coffee Corner can operate independently while feeding into central reporting.</div>
        </div>
        <div class="rm-faq-item">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>5. Can I manage KOTs for kitchen stations?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">Yes. Orders automatically trigger kitchen order tickets or display on digital KDS screens for kitchen staff.</div>
        </div>
        <div class="rm-faq-item">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>6. Can I manage canteen billing and cash/UPI payments?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">Yes. Cashiers can complete bills in seconds and record cash, credit cards, or instant UPI payment transactions.</div>
        </div>
        <div class="rm-faq-item">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>7. Can I track daily canteen inventory?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">Yes. Monitor essential stock items such as rice, vegetables, cooking oil, and milk to prepare for peak break rushes.</div>
        </div>
        <div class="rm-faq-item">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>8. Can I view daily sales and canteen reports?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">Yes. Canteen administrators can review daily revenue, total orders, top-selling snacks, and peak sales hours.</div>
        </div>
      </div>
    </div>
  </section>

  {{-- FINAL CTA --}}
  <section class="rm-cta">
    <div class="w r">
      <h2>Ready to Make Your College Canteen Smarter?</h2>
      <p>Manage your menu, food orders, multi-counter operations, kitchen, billing, inventory and reports from one connected platform with Geni Menu.</p>
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

function ccCounterMsg(txt) {
  const msg = document.getElementById('ccBillMsg');
  if (!msg) return;
  msg.style.display = 'block';
  msg.style.background = 'var(--green-bg)';
  msg.style.color = 'var(--green)';
  msg.textContent = txt;
}

function toggleCcAvail(row) {
  const badge = row.querySelector('.cc-badge');
  const isOut = row.classList.toggle('out');
  badge.className = isOut ? 'cc-badge soldout' : 'cc-badge ready';
  badge.textContent = isOut ? 'Sold Out' : 'Available';
}

function pickCcPay(btn) {
  document.querySelectorAll('#ccPayModes .cc-pay-pill').forEach(b => b.classList.remove('active'));
  btn.classList.add('active');
}

document.addEventListener('DOMContentLoaded', function() {
  const els = document.querySelectorAll('.cc-page .r');
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
