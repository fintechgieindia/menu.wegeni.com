@php
$meta = [
    'title' => 'Cloud Kitchen POS & Multi-Brand Kitchen Software | Geni Menu',
    'description' => 'Run your cloud kitchen smarter and faster. Manage multi-brand menus, aggregated orders, kitchen workflows (KOTs), delivery billing, shared inventory and daily business insights from one connected platform.',
    'keywords' => 'cloud kitchen POS, ghost kitchen software, multi-brand restaurant management, kitchen order tickets KOT, delivery kitchen software, Geni Menu',
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

.ck-page * { box-sizing: border-box; }
.ck-page {
  font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
  color: var(--ink);
  background: var(--bg);
  -webkit-font-smoothing: antialiased;
  overflow-x: hidden;
}

.ck-page h1, .ck-page h2, .ck-page h3, .ck-page h4 {
  margin: 0;
  font-family: 'Outfit', 'Plus Jakarta Sans', sans-serif;
  font-weight: 500;
  line-height: 1.14;
  letter-spacing: -0.025em;
  color: var(--ink);
}
.ck-page h1 { font-size: clamp(34px, 4.6vw, 56px); }
.ck-page h2 { font-size: clamp(28px, 3.6vw, 44px); }
.ck-page h3 { font-size: 20px; font-weight: 600; }
.ck-page p { margin: 0; color: var(--mute); font-size: 16px; line-height: 1.65; }
.ck-page a { text-decoration: none; color: inherit; }

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
.ck-sec { padding: clamp(56px, 6.5vw, 92px) 0; background: var(--bg); position: relative; overflow: hidden; }
.ck-sec.alt { background: var(--bg2); }
.ck-sec.border-b { border-bottom: 1px solid var(--line); }

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

/* Split Layouts */
.ck-split { display: grid; grid-template-columns: 1fr 1.15fr; gap: 48px; align-items: center; }
.ck-bullets { list-style: none; padding: 0; margin: 22px 0 0; display: flex; flex-direction: column; gap: 12px; }
.ck-bullets li { display: flex; align-items: flex-start; gap: 10px; font-size: 14.5px; font-weight: 600; color: var(--ink); }
.ck-bullets li svg { width: 18px; height: 18px; color: var(--br); flex-shrink: 0; margin-top: 2px; }

/* Multi-Brand Hub */
.ck-brand-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px; margin-bottom: 18px; }
.ck-brand-card { background: var(--bg2); border: 1.5px solid var(--line); border-radius: 15px; padding: 16px; cursor: pointer; transition: .2s ease; }
.ck-brand-card:hover, .ck-brand-card.active { background: #fff; border-color: var(--br); box-shadow: var(--shadow-sm); }
.ck-brand-top { display: flex; align-items: center; justify-content: space-between; margin-bottom: 8px; }
.ck-brand-dot { width: 10px; height: 10px; border-radius: 50%; }
.ck-brand-card h4 { font-size: 15px; font-weight: 700; margin-bottom: 3px; }
.ck-brand-card p { font-size: 12px; }
.ck-brand-meta { margin-top: 8px; font-size: 11.5px; font-weight: 700; color: var(--br); display: flex; align-items: center; justify-content: space-between; }

.ck-menu-list { display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px; padding-top: 16px; border-top: 1px dashed var(--line); }
.ck-menu-item { display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 11px 13px; border-radius: 12px; border: 1px solid var(--line); background: #fff; transition: .2s ease; }
.ck-menu-item.highlight { border-color: var(--br); background: var(--br-light); }
.ck-menu-item h4 { font-size: 13.5px; font-weight: 700; }
.ck-menu-item span { font-size: 11.5px; color: var(--mute); display: block; }
.ck-menu-price { font-family: 'Outfit', sans-serif; font-weight: 700; font-size: 14px; color: var(--br); white-space: nowrap; }

/* Order Sources */
.ck-source-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 18px; }
.ck-source-card { background: #fff; border: 1px solid var(--line); border-radius: 18px; padding: 22px; text-align: center; transition: .25s ease; }
.ck-source-card:hover { transform: translateY(-4px); border-color: var(--br); box-shadow: var(--shadow-md); }
.ck-source-ico { width: 48px; height: 48px; border-radius: 14px; background: var(--br-light); color: var(--br); border: 1px solid rgba(135, 96, 57, 0.2); display: grid; place-items: center; margin: 0 auto 14px; }
.ck-source-card h4 { font-size: 15.5px; font-weight: 700; margin-bottom: 5px; }
.ck-source-card p { font-size: 13px; }
.ck-disclaimer { text-align: center; margin-top: 20px; font-size: 13px; color: var(--mute); }

/* Interactive KOT Queue */
.ck-filter-row { display: flex; gap: 8px; flex-wrap: wrap; }
.ck-filter-btn { padding: 6px 14px; border-radius: 99px; border: 1px solid var(--line); background: #fff; color: var(--mute); font: 700 12px 'Plus Jakarta Sans', sans-serif; cursor: pointer; transition: .2s ease; }
.ck-filter-btn.active, .ck-filter-btn:hover { background: var(--br); color: #fff; border-color: var(--br); }

.ck-kot-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; }
.ck-kot-card { background: var(--bg2); border: 1px solid var(--line); border-radius: 16px; padding: 18px; display: flex; flex-direction: column; justify-content: space-between; transition: .25s ease; border-top: 4px solid var(--br); }
.ck-kot-card[data-status="new"] { border-top-color: var(--blue); }
.ck-kot-card[data-status="preparing"] { border-top-color: var(--amber); }
.ck-kot-card[data-status="ready"] { border-top-color: var(--green); }
.ck-kot-card:hover { background: #fff; box-shadow: var(--shadow-sm); transform: translateY(-3px); }
.ck-kot-hdr { display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px; }
.ck-kot-id { font-family: 'Outfit', sans-serif; font-weight: 700; font-size: 15px; color: var(--ink); }
.ck-badge { font-size: 10.5px; font-weight: 700; padding: 3px 9px; border-radius: 99px; text-transform: uppercase; letter-spacing: .04em; }
.ck-badge.new { background: var(--blue-bg); color: var(--blue); }
.ck-badge.preparing { background: var(--amber-bg); color: var(--amber); }
.ck-badge.ready { background: var(--green-bg); color: var(--green); }
.ck-brand-pill { display: inline-block; font-size: 11px; font-weight: 700; padding: 3px 9px; border-radius: 6px; background: var(--br-light); color: var(--br); border: 1px solid rgba(135, 96, 57, 0.18); margin-bottom: 10px; }
.ck-kot-items { list-style: none; padding: 0; margin: 0 0 14px; font-size: 13px; color: var(--ink); }
.ck-kot-items li { display: flex; justify-content: space-between; padding: 5px 0; border-bottom: 1px dashed var(--line); }
.ck-kot-items li:last-child { border-bottom: none; }
.ck-kot-foot { display: flex; align-items: center; justify-content: space-between; padding-top: 10px; border-top: 1px solid var(--line); font-size: 11.5px; font-weight: 700; color: var(--mute); }
.ck-kot-act { background: none; border: none; color: var(--br); font: 700 11.5px 'Plus Jakarta Sans', sans-serif; cursor: pointer; padding: 2px 6px; border-radius: 6px; }
.ck-kot-act:hover { background: var(--br-light); }

/* 5-Step Delivery Progression */
.ck-prog-5 { display: grid; grid-template-columns: repeat(5, 1fr); gap: 16px; }
.rm-prog-card { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 20px 16px; text-align: center; transition: .25s ease; }
.rm-prog-card:hover { transform: translateY(-4px); border-color: var(--br); box-shadow: var(--shadow-sm); }
.rm-prog-num { display: inline-flex; align-items: center; justify-content: center; width: 34px; height: 34px; border-radius: 10px; background: var(--br-light); color: var(--br); font-family: 'Outfit', sans-serif; font-weight: 700; font-size: 13px; margin-bottom: 12px; border: 1px solid rgba(135, 96, 57, 0.2); }
.rm-prog-card h4 { font-size: 14.5px; font-weight: 700; margin-bottom: 6px; }
.rm-prog-card p { font-size: 12.5px; line-height: 1.45; }

/* Billing & Inventory Split */
.ck-bill-inv { display: grid; grid-template-columns: 0.92fr 1.18fr; gap: 36px; align-items: start; }
.ck-bill-row { display: flex; justify-content: space-between; align-items: center; padding: 10px 0; border-bottom: 1px dashed var(--line); font-size: 14px; }
.ck-bill-row small { display: block; font-size: 12px; color: var(--mute); }
.ck-bill-total { display: flex; justify-content: space-between; align-items: center; padding: 16px 0 12px; font-family: 'Outfit', sans-serif; font-size: 22px; font-weight: 700; color: var(--br); }
.ck-pay-modes { display: grid; grid-template-columns: repeat(3, 1fr); gap: 8px; margin-top: 10px; }
.ck-pay-btn { padding: 10px; border-radius: 10px; border: 1.5px solid var(--line); background: #fff; color: var(--ink); font: 700 13px 'Plus Jakarta Sans', sans-serif; cursor: pointer; transition: .2s ease; }
.ck-pay-btn.active { background: var(--br); color: #fff; border-color: var(--br); }
.ck-pay-status { margin-top: 12px; font-size: 12px; font-weight: 600; color: var(--green); text-align: center; background: var(--green-bg); padding: 8px 12px; border-radius: 10px; }

.ck-inv-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 14px; }
.ck-inv-card { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 18px; transition: .25s ease; }
.ck-inv-card:hover { border-color: var(--br); box-shadow: var(--shadow-sm); }
.ck-inv-top { display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px; font-size: 14px; font-weight: 700; }
.ck-inv-val { font-family: 'Outfit', sans-serif; font-size: 24px; font-weight: 600; color: var(--ink); line-height: 1.15; }
.ck-inv-sub { font-size: 12px; color: var(--mute); margin-top: 4px; }
.ck-inv-bar { height: 5px; border-radius: 99px; background: var(--bg3); margin-top: 10px; overflow: hidden; }
.ck-inv-fill { height: 100%; border-radius: 99px; }

/* Dark Editorial Metrics & Brand Analytics Banner */
.rm-dark-banner { background: linear-gradient(135deg, #21160F 0%, #342318 100%); border-radius: 26px; padding: clamp(28px, 4vw, 48px); color: #fff; box-shadow: var(--shadow-lg); position: relative; overflow: hidden; }
.rm-dark-banner::after { content: ''; position: absolute; right: -80px; top: -80px; width: 280px; height: 280px; border-radius: 50%; background: radial-gradient(circle, rgba(184, 142, 86, 0.24) 0%, transparent 70%); pointer-events: none; }
.rm-dark-top { display: flex; justify-content: space-between; align-items: flex-end; gap: 24px; flex-wrap: wrap; margin-bottom: 28px; padding-bottom: 24px; border-bottom: 1px solid rgba(255, 255, 255, 0.12); }
.rm-dark-top h2 { color: #fff; font-size: clamp(26px, 3vw, 36px); }
.rm-dark-top p { color: rgba(255, 255, 255, 0.72); max-width: 520px; margin-top: 8px; }
.rm-dark-kpis { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; margin-bottom: 20px; }
.rm-dark-kpi { background: rgba(255, 255, 255, 0.06); border: 1px solid rgba(255, 255, 255, 0.12); border-radius: 16px; padding: 18px 20px; }
.rm-dark-kpi strong { display: block; font-family: 'Outfit', sans-serif; font-size: 30px; font-weight: 600; color: #F5EFE6; line-height: 1.15; }
.rm-dark-kpi span { font-size: 12px; font-weight: 600; color: rgba(255, 255, 255, 0.65); text-transform: uppercase; letter-spacing: .06em; }
.ck-brand-stats { display: grid; grid-template-columns: repeat(4, 1fr); gap: 14px; }
.ck-brand-stat { background: rgba(255, 255, 255, 0.04); border: 1px solid rgba(184, 142, 86, 0.25); border-radius: 14px; padding: 16px; }
.ck-brand-stat-lbl { font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: .06em; color: rgba(255, 255, 255, 0.6); margin-bottom: 6px; }
.ck-brand-stat-val { font-family: 'Outfit', sans-serif; font-size: 22px; font-weight: 700; color: #e6c594; }
.ck-brand-stat-sub { font-size: 12px; color: rgba(255, 255, 255, 0.52); margin-top: 4px; }

/* Benefits 3x2 */
.rm-ben-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 22px; }
.rm-ben-card { background: #fff; border: 1px solid var(--line); border-radius: 18px; padding: 26px; transition: .25s ease; }
.rm-ben-card:hover { transform: translateY(-4px); border-color: rgba(135, 96, 57, 0.34); box-shadow: var(--shadow-md); }
.rm-ben-card h3 { font-size: 18px; margin: 16px 0 8px; }
.rm-ben-card p { font-size: 14px; }

/* Photo Cards for Cloud Kitchen Models */
.rm-ind-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 18px; margin-bottom: 22px; }
.rm-ind-card { position: relative; border-radius: 18px; overflow: hidden; aspect-ratio: 4 / 3; border: 1px solid var(--line); box-shadow: var(--shadow-sm); }
.rm-ind-card img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.55s ease; display: block; }
.rm-ind-card:hover img { transform: scale(1.07); }
.rm-ind-card::after { content: ''; position: absolute; inset: 0; background: linear-gradient(180deg, transparent 35%, rgba(24, 16, 10, 0.84) 100%); }
.rm-ind-cap { position: absolute; left: 16px; right: 16px; bottom: 14px; z-index: 2; color: #fff; }
.rm-ind-cap strong { display: block; font-family: 'Outfit', sans-serif; font-size: 16px; font-weight: 600; }
.rm-ind-cap span { font-size: 12px; color: rgba(255, 255, 255, 0.8); }
.ck-model-pills { display: flex; flex-wrap: wrap; justify-content: center; gap: 10px; }
.ck-model-pill { padding: 9px 16px; border-radius: 99px; background: #fff; border: 1px solid var(--line); font-size: 13px; font-weight: 700; color: var(--ink); }

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
  .rm-hero-grid, .ck-split, .ck-bill-inv { grid-template-columns: 1fr; gap: 36px; }
  .rm-val-grid, .ck-source-grid, .ck-kot-grid, .rm-dark-kpis, .ck-brand-stats, .rm-ind-grid { grid-template-columns: repeat(2, 1fr); }
  .ck-prog-5 { grid-template-columns: repeat(3, 1fr); }
  .rm-ben-grid { grid-template-columns: repeat(2, 1fr); }
  .rm-eco-grid { grid-template-columns: repeat(4, 1fr); }
}
@media (max-width: 640px) {
  .w { padding: 0 16px; }
  .rm-val-grid, .ck-source-grid, .ck-kot-grid, .ck-prog-5, .ck-inv-grid, .ck-brand-grid, .ck-menu-list, .rm-dark-kpis, .ck-brand-stats, .rm-ben-grid, .rm-ind-grid { grid-template-columns: 1fr; }
  .rm-eco-grid { grid-template-columns: repeat(2, 1fr); }
  .rm-hero-stats { grid-template-columns: 1fr; gap: 12px; }
  .rm-hero-cta .btn, .rm-cta-btns .btn { width: 100%; }
  .rm-hero-float { flex-direction: column; align-items: flex-start; }
}
</style>

<div class="ck-page">
  {{-- BREADCRUMB --}}
  <nav class="bc" aria-label="Breadcrumb">
    <div class="w">
      <a href="{{ url('/') }}">Home</a>
      <span class="sep">/</span>
      <a href="{{ route('solutions') }}">Solutions</a>
      <span class="sep">/</span>
      <span class="cur">Cloud Kitchen</span>
    </div>
  </nav>

  {{-- HERO --}}
  <section class="rm-hero">
    <div class="w rm-hero-grid">
      <div>
        <div class="eb">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
          CLOUD KITCHEN SOLUTION
        </div>
        <h1>Run Your Cloud Kitchen. <span class="sf">Smarter &amp; Faster.</span></h1>
        <p class="rm-hero-sub">Manage multi-brand menus, aggregated orders, kitchen workflows, delivery billing, inventory and daily business insights from one connected platform built for cloud kitchens and ghost kitchens.</p>
        <div class="rm-hero-cta">
          <a href="{{ route('restaurant_signup') }}" class="btn p">Get Started →</a>
          <a href="{{ route('contact.us') }}" class="btn o">Book a Demo →</a>
        </div>
        <div class="rm-hero-stats">
          <div class="rm-hero-stat">
            <strong>4+ Brands</strong>
            <span>One shared kitchen</span>
          </div>
          <div class="rm-hero-stat">
            <strong>18 min</strong>
            <span>Avg order prep time</span>
          </div>
          <div class="rm-hero-stat">
            <strong>Zero</strong>
            <span>Missed channel orders</span>
          </div>
        </div>
      </div>

      <div class="rm-hero-media">
        <img src="{{ asset('assets/images/cloud-kitchen-hero.jpg') }}" alt="Cloud kitchen manager coordinating multi-brand delivery orders on a kitchen display tablet at a dispatch counter">
        <div class="rm-hero-scrim"></div>
        <div class="rm-hero-pill">
          <span class="rm-live-dot"></span>
          Peak Hour · 4 Active Brands · 12 Live Orders
        </div>
        <div class="rm-hero-float">
          <div class="rm-hero-float-left">
            <div class="rm-hero-float-ico">
              <svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
            </div>
            <div>
              <div class="rm-hero-float-ttl">#CK-4081 · Biryani Palace</div>
              <div class="rm-hero-float-sub">Chicken Biryani × 2, Raita × 2 · Auto-KOT Fired</div>
            </div>
          </div>
          <span class="rm-hero-float-tag">68 Orders Today</span>
        </div>
      </div>
    </div>
  </section>

  {{-- VALUE STRIP (01 - 04) --}}
  <section class="ck-sec border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">Built For Cloud Kitchens</div>
        <h2>Everything Your Cloud Kitchen <span class="sf">Needs.</span></h2>
        <p>Manage multiple brands, incoming orders, kitchen preparation, billing, delivery tracking, inventory and daily performance from one connected platform.</p>
      </div>
      <div class="rm-val-grid">
        <div class="rm-val-card r">
          <div class="rm-val-top">
            <div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2"/><rect x="9" y="3" width="6" height="4" rx="1"/><line x1="9" y1="12" x2="15" y2="12"/><line x1="9" y1="16" x2="13" y2="16"/></svg></div>
            <span class="rm-num">01</span>
          </div>
          <h3>Multi-Brand Menus</h3>
          <p>Organize separate menus, pricing, and item availability for each virtual brand operating from your kitchen facility.</p>
        </div>
        <div class="rm-val-card r">
          <div class="rm-val-top">
            <div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg></div>
            <span class="rm-num">02</span>
          </div>
          <h3>Unified Order Flow</h3>
          <p>Keep all incoming orders organized, tracked and pushed through the kitchen workflow without channel confusion.</p>
        </div>
        <div class="rm-val-card r">
          <div class="rm-val-top">
            <div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg></div>
            <span class="rm-num">03</span>
          </div>
          <h3>Auto-Generated KOTs</h3>
          <p>Auto-generate kitchen tickets for every incoming order to keep cooking stations running in exact sequence.</p>
        </div>
        <div class="rm-val-card r">
          <div class="rm-val-top">
            <div class="rm-ic"><svg viewBox="0 0 24 24"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></div>
            <span class="rm-num">04</span>
          </div>
          <h3>Delivery &amp; Brand Insights</h3>
          <p>Coordinate rider handover, monitor shared stock, and track brand-wise sales and kitchen throughput daily.</p>
        </div>
      </div>
    </div>
  </section>

  {{-- MULTI-BRAND OPERATIONS & MENU MANAGEMENT --}}
  <section class="ck-sec alt border-b">
    <div class="w ck-split">
      <div class="r">
        <div class="eb">Multi-Brand Operations</div>
        <h2>One Kitchen. Multiple Brands. <span class="sf">Zero Confusion.</span></h2>
        <p style="margin-top:14px;">Run multiple virtual restaurant brands from a single kitchen space. Each brand maintains its own menu, branding and product list — all manageable from one platform without affecting other brands.</p>
        <ul class="ck-bullets">
          <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12l5 5l10-10"/></svg> Separate menu catalogues, categories &amp; sub-categories per brand</li>
          <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12l5 5l10-10"/></svg> Separate pricing and instant sold-out toggles per brand</li>
          <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12l5 5l10-10"/></svg> Centralized order view across all virtual brands</li>
          <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12l5 5l10-10"/></svg> Add item images, descriptions, allergen notes &amp; brand-wise reports</li>
        </ul>
      </div>

      <div class="rm-win r">
        <div class="rm-win-bar">
          <div class="rm-win-dots"><i></i><i></i><i></i></div>
          <div class="rm-win-ttl">Multi-Brand Menu Hub · Click a Brand</div>
        </div>
        <div class="rm-win-body">
          <div class="ck-brand-grid" id="ckBrandGrid">
            <div class="ck-brand-card active" data-brand="biryani" onclick="selectCkBrand('biryani', this)">
              <div class="ck-brand-top">
                <span class="ck-brand-dot" style="background:#F97316;"></span>
                <span class="ck-badge ready">Active</span>
              </div>
              <h4>Biryani Palace</h4>
              <p>North Indian · Biryanis &amp; Curries</p>
              <div class="ck-brand-meta"><span>48 items</span><span>28 orders today</span></div>
            </div>
            <div class="ck-brand-card" data-brand="pizza" onclick="selectCkBrand('pizza', this)">
              <div class="ck-brand-top">
                <span class="ck-brand-dot" style="background:#3B82F6;"></span>
                <span class="ck-badge ready">Active</span>
              </div>
              <h4>Pizza Hub</h4>
              <p>Italian · Pizzas &amp; Pastas</p>
              <div class="ck-brand-meta"><span>32 items</span><span>18 orders today</span></div>
            </div>
            <div class="ck-brand-card" data-brand="healthy" onclick="selectCkBrand('healthy', this)">
              <div class="ck-brand-top">
                <span class="ck-brand-dot" style="background:#10B981;"></span>
                <span class="ck-badge ready">Active</span>
              </div>
              <h4>Healthy Bites</h4>
              <p>Health Food · Bowls &amp; Salads</p>
              <div class="ck-brand-meta"><span>24 items</span><span>12 orders today</span></div>
            </div>
            <div class="ck-brand-card" data-brand="burger" onclick="selectCkBrand('burger', this)">
              <div class="ck-brand-top">
                <span class="ck-brand-dot" style="background:#8B5CF6;"></span>
                <span class="ck-badge ready">Active</span>
              </div>
              <h4>Burger Station</h4>
              <p>American · Burgers &amp; Sides</p>
              <div class="ck-brand-meta"><span>28 items</span><span>10 orders today</span></div>
            </div>
          </div>

          <div class="ck-menu-list" id="ckMenuList">
            <div class="ck-menu-item highlight" data-brand="biryani">
              <div><h4>Chicken Biryani</h4><span>Biryani Palace</span></div>
              <div class="ck-menu-price">₹280</div>
            </div>
            <div class="ck-menu-item" data-brand="pizza">
              <div><h4>Margherita Pizza</h4><span>Pizza Hub</span></div>
              <div class="ck-menu-price">₹320</div>
            </div>
            <div class="ck-menu-item" data-brand="healthy">
              <div><h4>Quinoa Bowl</h4><span>Healthy Bites</span></div>
              <div class="ck-menu-price">₹240</div>
            </div>
            <div class="ck-menu-item" data-brand="burger">
              <div><h4>Smash Burger</h4><span>Burger Station</span></div>
              <div class="ck-menu-price">₹260</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- ORDER SOURCES --}}
  <section class="ck-sec border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">Order Sources</div>
        <h2>Orders From Every Channel. <span class="sf">One Kitchen View.</span></h2>
        <p>Whether orders come from online food platforms, phone calls or walk-ins — manage them all from one centralized kitchen dashboard.</p>
      </div>
      <div class="ck-source-grid r">
        <div class="ck-source-card">
          <div class="ck-source-ico"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="14" height="20" x="5" y="2" rx="2"/><path d="M12 18h.01"/></svg></div>
          <h4>Online Aggregators</h4>
          <p>Swiggy, Zomato &amp; others</p>
        </div>
        <div class="ck-source-card">
          <div class="ck-source-ico"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/></svg></div>
          <h4>Direct Website</h4>
          <p>Your own ordering page</p>
        </div>
        <div class="ck-source-card">
          <div class="ck-source-ico"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg></div>
          <h4>Phone Orders</h4>
          <p>Counter-keyed orders</p>
        </div>
        <div class="ck-source-card">
          <div class="ck-source-ico"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></div>
          <h4>Walk-In Orders</h4>
          <p>Direct counter pickup</p>
        </div>
      </div>
      <div class="ck-disclaimer">* Direct platform integrations depend on supported features. Counter-keyed entry is always available.</div>
    </div>
  </section>

  {{-- INTERACTIVE KITCHEN OPERATIONS / KOT QUEUE --}}
  <section class="ck-sec alt border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">Kitchen Operations</div>
        <h2>Keep Every Kitchen Station <span class="sf">Organised.</span></h2>
        <p>Auto-generate Kitchen Order Tickets for every order so your kitchen staff knows exactly what to prepare, in what quantity and for which brand.</p>
      </div>

      <div class="rm-win r">
        <div class="rm-win-bar">
          <div class="rm-win-dots"><i></i><i></i><i></i></div>
          <div class="ck-filter-row" id="ckKotFilters">
            <button type="button" class="ck-filter-btn active" onclick="filterCkKot('all', this)">All Tickets (4)</button>
            <button type="button" class="ck-filter-btn" onclick="filterCkKot('new', this)">New</button>
            <button type="button" class="ck-filter-btn" onclick="filterCkKot('preparing', this)">Preparing</button>
            <button type="button" class="ck-filter-btn" onclick="filterCkKot('ready', this)">Ready</button>
          </div>
          <div class="rm-win-ttl">Live Kitchen Queue</div>
        </div>
        <div class="rm-win-body">
          <div class="ck-kot-grid" id="ckKotGrid">
            <div class="ck-kot-card" data-status="new">
              <div>
                <div class="ck-kot-hdr">
                  <span class="ck-kot-id">#CK-4083</span>
                  <span class="ck-badge new">New</span>
                </div>
                <span class="ck-brand-pill">Pizza Hub</span>
                <ul class="ck-kot-items">
                  <li><span>Margherita (Lg)</span><strong>×1</strong></li>
                  <li><span>Pepperoni Pizza</span><strong>×1</strong></li>
                  <li><span>Garlic Bread</span><strong>×2</strong></li>
                </ul>
              </div>
              <div class="ck-kot-foot">
                <span>Just arrived</span>
                <button type="button" class="ck-kot-act" onclick="advanceCkKot(this)">Start Prep →</button>
              </div>
            </div>

            <div class="ck-kot-card" data-status="preparing">
              <div>
                <div class="ck-kot-hdr">
                  <span class="ck-kot-id">#CK-4081</span>
                  <span class="ck-badge preparing">Preparing</span>
                </div>
                <span class="ck-brand-pill">Biryani Palace</span>
                <ul class="ck-kot-items">
                  <li><span>Chicken Biryani</span><strong>×2</strong></li>
                  <li><span>Raita</span><strong>×2</strong></li>
                  <li><span>Shorba</span><strong>×1</strong></li>
                </ul>
              </div>
              <div class="ck-kot-foot">
                <span>6 min remaining</span>
                <button type="button" class="ck-kot-act" onclick="advanceCkKot(this)">Mark Ready →</button>
              </div>
            </div>

            <div class="ck-kot-card" data-status="ready">
              <div>
                <div class="ck-kot-hdr">
                  <span class="ck-kot-id">#CK-4080</span>
                  <span class="ck-badge ready">Ready</span>
                </div>
                <span class="ck-brand-pill">Healthy Bites</span>
                <ul class="ck-kot-items">
                  <li><span>Quinoa Bowl</span><strong>×1</strong></li>
                  <li><span>Green Smoothie</span><strong>×1</strong></li>
                </ul>
              </div>
              <div class="ck-kot-foot">
                <span style="color:var(--green);">✓ Ready for pickup</span>
                <button type="button" class="ck-kot-act" onclick="advanceCkKot(this)">Reset ↺</button>
              </div>
            </div>

            <div class="ck-kot-card" data-status="ready">
              <div>
                <div class="ck-kot-hdr">
                  <span class="ck-kot-id">#CK-4079</span>
                  <span class="ck-badge ready">Ready</span>
                </div>
                <span class="ck-brand-pill">Burger Station</span>
                <ul class="ck-kot-items">
                  <li><span>Smash Burger</span><strong>×2</strong></li>
                  <li><span>Fries</span><strong>×2</strong></li>
                </ul>
              </div>
              <div class="ck-kot-foot">
                <span style="color:var(--green);">✓ Rider arrived</span>
                <button type="button" class="ck-kot-act" onclick="advanceCkKot(this)">Reset ↺</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- 5-STEP DELIVERY WORKFLOW --}}
  <section class="ck-sec border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">Delivery Operations</div>
        <h2>From Order Placed to <span class="sf">Delivery Done.</span></h2>
        <p>Track every order through a clear status pipeline so your kitchen and dispatch team are always in sync.</p>
      </div>
      <div class="ck-prog-5 r">
        <div class="rm-prog-card">
          <div class="rm-prog-num">01</div>
          <h4>Order Received</h4>
          <p>Order enters the kitchen dashboard</p>
        </div>
        <div class="rm-prog-card">
          <div class="rm-prog-num">02</div>
          <h4>KOT Generated</h4>
          <p>Kitchen ticket sent to cooking station</p>
        </div>
        <div class="rm-prog-card">
          <div class="rm-prog-num">03</div>
          <h4>Food Preparation</h4>
          <p>Kitchen prepares the order items</p>
        </div>
        <div class="rm-prog-card">
          <div class="rm-prog-num">04</div>
          <h4>Order Ready</h4>
          <p>Food packed and ready for pickup</p>
        </div>
        <div class="rm-prog-card">
          <div class="rm-prog-num">05</div>
          <h4>Handed to Delivery</h4>
          <p>Partner picks up and delivers the order</p>
        </div>
      </div>
    </div>
  </section>

  {{-- BILLING & SHARED INVENTORY --}}
  <section class="ck-sec alt border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">Billing &amp; Shared Inventory</div>
        <h2>Fast Billing &amp; Ingredient Control <span class="sf">Across All Brands.</span></h2>
        <p>Generate accurate bills for counter pickups, phone orders or internal deliveries while monitoring shared and brand-specific stock during peak hours.</p>
      </div>

      <div class="ck-bill-inv">
        {{-- Interactive Bill Panel --}}
        <div class="rm-win r">
          <div class="rm-win-bar">
            <div class="rm-win-dots"><i></i><i></i><i></i></div>
            <div class="rm-win-ttl">Order #CK-4081 · Biryani Palace</div>
          </div>
          <div class="rm-win-body">
            <div class="ck-bill-row">
              <div><strong>Chicken Biryani</strong><small>× 2</small></div>
              <strong>₹560</strong>
            </div>
            <div class="ck-bill-row">
              <div><strong>Raita</strong><small>× 2</small></div>
              <strong>₹80</strong>
            </div>
            <div class="ck-bill-row">
              <div><strong>Shorba</strong><small>× 1</small></div>
              <strong>₹60</strong>
            </div>
            <div class="ck-bill-row" style="color:var(--mute);">
              <div>Delivery Charge</div>
              <span>₹40</span>
            </div>
            <div class="ck-bill-total">
              <span>Total</span>
              <span>₹740</span>
            </div>
            <div class="ck-pay-modes" id="ckPayModes">
              <button type="button" class="ck-pay-btn" onclick="selectCkPay('Cash', this)">Cash</button>
              <button type="button" class="ck-pay-btn active" onclick="selectCkPay('UPI', this)">UPI</button>
              <button type="button" class="ck-pay-btn" onclick="selectCkPay('Card', this)">Card</button>
            </div>
            <div class="ck-pay-status" id="ckPayStatus">Ready to settle ₹740 via UPI · Instant receipt</div>
          </div>
        </div>

        {{-- 6 Inventory Cards --}}
        <div class="ck-inv-grid r">
          <div class="ck-inv-card">
            <div class="ck-inv-top"><span>Basmati Rice</span><span style="font-size:11.5px; color:var(--green);">Good</span></div>
            <div class="ck-inv-val">48 kg</div>
            <div class="ck-inv-sub">Shared · All brands</div>
            <div class="ck-inv-bar"><div class="ck-inv-fill" style="width:80%; background:var(--green);"></div></div>
          </div>
          <div class="ck-inv-card">
            <div class="ck-inv-top"><span>Chicken (Boneless)</span><span style="font-size:11.5px; color:var(--amber);">Medium</span></div>
            <div class="ck-inv-val">12 kg</div>
            <div class="ck-inv-sub">Biryani Palace · Burger Station</div>
            <div class="ck-inv-bar"><div class="ck-inv-fill" style="width:40%; background:var(--amber);"></div></div>
          </div>
          <div class="ck-inv-card">
            <div class="ck-inv-top"><span>Pizza Dough</span><span style="font-size:11.5px; color:var(--red);">Low Stock</span></div>
            <div class="ck-inv-val">6 kg</div>
            <div class="ck-inv-sub">Pizza Hub</div>
            <div class="ck-inv-bar"><div class="ck-inv-fill" style="width:20%; background:var(--red);"></div></div>
          </div>
          <div class="ck-inv-card">
            <div class="ck-inv-top"><span>Quinoa</span><span style="font-size:11.5px; color:var(--green);">Good</span></div>
            <div class="ck-inv-val">18 kg</div>
            <div class="ck-inv-sub">Healthy Bites</div>
            <div class="ck-inv-bar"><div class="ck-inv-fill" style="width:70%; background:var(--green);"></div></div>
          </div>
          <div class="ck-inv-card">
            <div class="ck-inv-top"><span>Burger Buns</span><span style="font-size:11.5px; color:var(--amber);">Medium</span></div>
            <div class="ck-inv-val">80 pcs</div>
            <div class="ck-inv-sub">Burger Station</div>
            <div class="ck-inv-bar"><div class="ck-inv-fill" style="width:45%; background:var(--amber);"></div></div>
          </div>
          <div class="ck-inv-card">
            <div class="ck-inv-top"><span>Packaging Boxes</span><span style="font-size:11.5px; color:var(--green);">Good</span></div>
            <div class="ck-inv-val">320 pcs</div>
            <div class="ck-inv-sub">Shared · All brands</div>
            <div class="ck-inv-bar"><div class="ck-inv-fill" style="width:90%; background:var(--green);"></div></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- DARK EDITORIAL PEAK METRICS & BRAND ANALYTICS --}}
  <section class="ck-sec border-b">
    <div class="w">
      <div class="rm-dark-banner r">
        <div class="rm-dark-top">
          <div>
            <div class="eb" style="background:rgba(255,255,255,0.1); color:#e6c594; border-color:rgba(230,197,148,0.28);">Peak Hour &amp; Business Reports</div>
            <h2>Know How Every Brand <span class="sf" style="-webkit-text-fill-color:#e6c594;">is Performing.</span></h2>
            <p>Handle lunch and dinner rushes without missing a beat. View daily revenue, order counts, prep speed and brand-wise sales in one live report.</p>
          </div>
          <span class="ck-badge ready" style="background:rgba(22,163,74,0.2); color:#86efac;">● Live Analytics · Today</span>
        </div>

        <div class="rm-dark-kpis">
          <div class="rm-dark-kpi">
            <strong>₹28,640</strong>
            <span>Total Revenue</span>
          </div>
          <div class="rm-dark-kpi">
            <strong>68</strong>
            <span>Orders Today (12 Active)</span>
          </div>
          <div class="rm-dark-kpi">
            <strong>₹421</strong>
            <span>Avg Order Value</span>
          </div>
          <div class="rm-dark-kpi">
            <strong>18 min</strong>
            <span>Avg Prep Time · 4 Brands</span>
          </div>
        </div>

        <div class="ck-brand-stats">
          <div class="ck-brand-stat">
            <div class="ck-brand-stat-lbl">Biryani Palace</div>
            <div class="ck-brand-stat-val">₹10,280</div>
            <div class="ck-brand-stat-sub">28 orders today</div>
          </div>
          <div class="ck-brand-stat">
            <div class="ck-brand-stat-lbl">Pizza Hub</div>
            <div class="ck-brand-stat-val">₹8,960</div>
            <div class="ck-brand-stat-sub">18 orders today</div>
          </div>
          <div class="ck-brand-stat">
            <div class="ck-brand-stat-lbl">Healthy Bites</div>
            <div class="ck-brand-stat-val">₹5,280</div>
            <div class="ck-brand-stat-sub">12 orders today</div>
          </div>
          <div class="ck-brand-stat">
            <div class="ck-brand-stat-lbl">Burger Station</div>
            <div class="ck-brand-stat-val">₹4,120</div>
            <div class="ck-brand-stat-sub">10 orders today</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- KEY BENEFITS (01 - 06) --}}
  <section class="ck-sec alt border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">Key Benefits</div>
        <h2>Why Cloud Kitchens Choose <span class="sf">Geni Menu.</span></h2>
      </div>
      <div class="rm-ben-grid">
        <div class="rm-ben-card r">
          <div class="rm-val-top">
            <div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg></div>
            <span class="rm-num">01</span>
          </div>
          <h3>Faster Kitchen Throughput</h3>
          <p>Auto-generated KOTs ensure cooking stations stay organized and orders move through preparation without delays.</p>
        </div>
        <div class="rm-ben-card r">
          <div class="rm-val-top">
            <div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg></div>
            <span class="rm-num">02</span>
          </div>
          <h3>No Order Missed</h3>
          <p>Centralized order dashboard means every incoming order is captured and tracked regardless of which channel it came from.</p>
        </div>
        <div class="rm-ben-card r">
          <div class="rm-val-top">
            <div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg></div>
            <span class="rm-num">03</span>
          </div>
          <h3>Smarter Inventory Control</h3>
          <p>Monitor shared and brand-specific ingredients together to prevent stockouts during your busiest service windows.</p>
        </div>
        <div class="rm-ben-card r">
          <div class="rm-val-top">
            <div class="rm-ic"><svg viewBox="0 0 24 24"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></div>
            <span class="rm-num">04</span>
          </div>
          <h3>Brand-Wise Insights</h3>
          <p>Understand which brands are driving revenue and which need attention with clear daily performance reports.</p>
        </div>
        <div class="rm-ben-card r">
          <div class="rm-val-top">
            <div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></div>
            <span class="rm-num">05</span>
          </div>
          <h3>One Team. Many Brands.</h3>
          <p>Your kitchen staff operates from a single interface without the complexity of managing separate systems per brand.</p>
        </div>
        <div class="rm-ben-card r">
          <div class="rm-val-top">
            <div class="rm-ic"><svg viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg></div>
            <span class="rm-num">06</span>
          </div>
          <h3>Scalable for Growth</h3>
          <p>Add new virtual brands or kitchen locations as your cloud kitchen business expands without operational disruption.</p>
        </div>
      </div>
    </div>
  </section>

  {{-- BUILT FOR EVERY CLOUD KITCHEN MODEL --}}
  <section class="ck-sec border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">Ideal For</div>
        <h2>Built for Every Cloud Kitchen <span class="sf">Model.</span></h2>
      </div>
      <div class="rm-ind-grid r">
        <div class="rm-ind-card">
          <img src="https://images.unsplash.com/photo-1556910103-1c02745aae4d?auto=format&fit=crop&w=700&q=80" alt="Multi-brand ghost kitchen chefs preparing orders">
          <div class="rm-ind-cap">
            <strong>Multi-Brand Ghost Kitchens</strong>
            <span>Run 3–10 virtual brands under one roof</span>
          </div>
        </div>
        <div class="rm-ind-card">
          <img src="https://images.unsplash.com/photo-1589302168068-964664d93dc0?auto=format&fit=crop&w=700&q=80" alt="Delivery-only biryani and specialty food kitchen">
          <div class="rm-ind-cap">
            <strong>Delivery-Only Restaurants</strong>
            <span>High-volume online &amp; direct delivery</span>
          </div>
        </div>
        <div class="rm-ind-card">
          <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?auto=format&fit=crop&w=700&q=80" alt="Aggregator-focused virtual pizza and burger concepts">
          <div class="rm-ind-cap">
            <strong>Virtual Restaurant Concepts</strong>
            <span>Fast brand launches &amp; seasonal menus</span>
          </div>
        </div>
        <div class="rm-ind-card">
          <img src="https://images.unsplash.com/photo-1577219491135-ce391730fb2c?auto=format&fit=crop&w=700&q=80" alt="Multi-location dark kitchen chain">
          <div class="rm-ind-cap">
            <strong>Multi-Location Kitchen Chains</strong>
            <span>Unified recipes, stock &amp; analytics</span>
          </div>
        </div>
      </div>
      <div class="ck-model-pills r">
        <span class="ck-model-pill">Single-Brand Cloud Kitchens</span>
        <span class="ck-model-pill">Multi-Brand Ghost Kitchens</span>
        <span class="ck-model-pill">Virtual Restaurant Concepts</span>
        <span class="ck-model-pill">Dark Kitchens</span>
        <span class="ck-model-pill">Delivery-Only Restaurants</span>
        <span class="ck-model-pill">Aggregator-Focused Kitchens</span>
        <span class="ck-model-pill">Home Chef Businesses</span>
        <span class="ck-model-pill">Multi-Location Kitchen Chains</span>
      </div>
    </div>
  </section>

  {{-- CONNECTED ECOSYSTEM (7 MODULES) --}}
  <section class="ck-sec alt border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">Connected Ecosystem</div>
        <h2>Everything Works Better <span class="sf">Together.</span></h2>
        <p>Every cloud kitchen module connects seamlessly — from digital menus and order flow to KOTs, billing, inventory and daily reports.</p>
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
  <section class="ck-sec">
    <div class="w">
      <div class="hd r">
        <div class="eb">Frequently Asked Questions</div>
        <h2>Cloud Kitchen <span class="sf">FAQ.</span></h2>
      </div>
      <div class="rm-faq-list r">
        <div class="rm-faq-item open">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>1. Can Geni Menu manage a cloud kitchen?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">Yes. Geni Menu can help manage orders, kitchen workflows (KOTs), multi-brand menus, billing, inventory and daily business reporting for cloud kitchen operations.</div>
        </div>
        <div class="rm-faq-item">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>2. Can I manage multiple virtual brands from one platform?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">Yes. Multiple virtual restaurant brands can be managed from a single Geni Menu account, each with its own menu, categories and pricing where supported.</div>
        </div>
        <div class="rm-faq-item">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>3. How do orders reach the kitchen?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">Orders can be entered at the counter via the POS interface and automatically trigger kitchen order tickets (KOTs). Platform integrations depend on the supported features of your plan.</div>
        </div>
        <div class="rm-faq-item">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>4. Can I track delivery status within the platform?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">Yes. Order status can be updated through the kitchen workflow (New → Preparing → Ready → Dispatched) giving your team real-time visibility of each order.</div>
        </div>
        <div class="rm-faq-item">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>5. Can I monitor ingredients across all brands?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">Yes. Inventory management can help track shared and brand-specific ingredients, set low-stock alerts and monitor incoming stock purchases.</div>
        </div>
        <div class="rm-faq-item">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>6. Can I view brand-wise sales reports?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">Yes. Supported reports provide visibility into daily revenue, order volumes, top-selling items and overall business performance for your cloud kitchen operations.</div>
        </div>
        <div class="rm-faq-item">
          <button type="button" class="rm-faq-q" onclick="toggleFaq(this)">
            <span>7. Is Geni Menu suitable for a single-brand delivery kitchen?</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          <div class="rm-faq-a">Yes. Whether you operate one brand or multiple virtual concepts, Geni Menu can support your kitchen order management, billing and reporting needs.</div>
        </div>
      </div>
    </div>
  </section>

  {{-- FINAL CTA --}}
  <section class="rm-cta">
    <div class="w r">
      <h2>Ready to Run Your Cloud Kitchen Smarter?</h2>
      <p>Manage your multi-brand menus, kitchen orders, delivery billing, inventory and business insights from one connected platform with Geni Menu.</p>
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

function selectCkBrand(brand, card) {
  document.querySelectorAll('#ckBrandGrid .ck-brand-card').forEach(c => c.classList.remove('active'));
  card.classList.add('active');
  document.querySelectorAll('#ckMenuList .ck-menu-item').forEach(item => {
    item.classList.toggle('highlight', item.dataset.brand === brand);
  });
}

function filterCkKot(status, btn) {
  document.querySelectorAll('#ckKotFilters .ck-filter-btn').forEach(b => b.classList.remove('active'));
  btn.classList.add('active');
  document.querySelectorAll('#ckKotGrid .ck-kot-card').forEach(card => {
    card.style.display = (status === 'all' || card.dataset.status === status) ? 'flex' : 'none';
  });
}

function advanceCkKot(btn) {
  const card = btn.closest('.ck-kot-card');
  const badge = card.querySelector('.ck-badge');
  const footText = card.querySelector('.ck-kot-foot span');
  const current = card.dataset.status;

  if (current === 'new') {
    card.dataset.status = 'preparing';
    badge.className = 'ck-badge preparing';
    badge.textContent = 'Preparing';
    footText.style.color = '';
    footText.textContent = 'Cooking in progress';
    btn.textContent = 'Mark Ready →';
  } else if (current === 'preparing') {
    card.dataset.status = 'ready';
    badge.className = 'ck-badge ready';
    badge.textContent = 'Ready';
    footText.style.color = 'var(--green)';
    footText.textContent = '✓ Ready for pickup';
    btn.textContent = 'Reset ↺';
  } else {
    card.dataset.status = 'new';
    badge.className = 'ck-badge new';
    badge.textContent = 'New';
    footText.style.color = '';
    footText.textContent = 'Just arrived';
    btn.textContent = 'Start Prep →';
  }
}

function selectCkPay(mode, btn) {
  document.querySelectorAll('#ckPayModes .ck-pay-btn').forEach(b => b.classList.remove('active'));
  btn.classList.add('active');
  const status = document.getElementById('ckPayStatus');
  if (status) {
    status.textContent = 'Ready to settle ₹740 via ' + mode + ' · Instant receipt';
  }
}

document.addEventListener('DOMContentLoaded', function() {
  const els = document.querySelectorAll('.ck-page .r');
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
