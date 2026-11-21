@php
$meta = [
    'title'       => 'Order Management Software for Restaurants | Geni Menu',
    'description' => 'Manage dine-in, takeaway, counter and online delivery orders on one live Kanban board. Prevent missed orders, track prep timers, and unify every channel with Geni Menu.',
    'keywords'    => 'restaurant order management, unified order board, dine-in takeaway delivery orders, KOT management, Swiggy Zomato aggregator, order tracking software India',
];
@endphp

@extends('layouts.frontend-master')

@section('content')

{{-- ═══════════════════════════════════════════════════════════════
     GOOGLE FONTS + AOS
═══════════════════════════════════════════════════════════════ --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,wght@1,400;1,700&family=Outfit:wght@400;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">

<style>
/* ─── CSS VARIABLES ───────────────────────────────────────────── */
:root {
    --bg-page:       #FAF6EF;
    --bg-card:       #FFFFFF;
    --bg-surface:    #F5EFEB;
    --ink:           #21160F;
    --ink-soft:      #63584E;
    --ink-faint:     #8E8277;
    --coffee:        #876039;
    --coffee-dark:   #6F4E2D;
    --coffee-light:  #F4EFEA;
    --coffee-border: rgba(135,96,57,0.16);
    --green:         #15803D;
    --green-bg:      #DCFCE7;
    --amber:         #B45309;
    --amber-bg:      #FEF3C7;
    --red:           #DC2626;
    --red-bg:        #FEE2E2;
    --line:          rgba(135,96,57,0.12);
}

/* ─── BASE ────────────────────────────────────────────────────── */
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

body {
    background: var(--bg-page);
    font-family: 'Plus Jakarta Sans', sans-serif;
    color: var(--ink-soft);
    line-height: 1.65;
}

h1, h2, h3, h4, h5 {
    font-family: 'Outfit', sans-serif;
    color: var(--ink);
    line-height: 1.2;
    letter-spacing: -0.025em;
}

.italic-serif {
    font-family: 'Fraunces', Georgia, serif;
    font-style: italic;
    color: var(--coffee);
}

.container {
    max-width: 1240px;
    margin: 0 auto;
    padding: 0 24px;
}

/* ─── BREADCRUMB ──────────────────────────────────────────────── */
.breadcrumb {
    padding: 18px 0 0;
    font-size: 13px;
    color: var(--ink-faint);
}
.breadcrumb a {
    color: var(--coffee);
    text-decoration: none;
    font-weight: 600;
}
.breadcrumb a:hover { text-decoration: underline; }
.breadcrumb span { margin: 0 6px; }

/* ─── EYEBROW ─────────────────────────────────────────────────── */
.sec-eyebrow {
    display: inline-block;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 1.6px;
    text-transform: uppercase;
    color: var(--coffee);
    background: var(--coffee-light);
    border: 1px solid var(--coffee-border);
    padding: 6px 16px;
    border-radius: 9999px;
    margin-bottom: 18px;
}

/* ─── BUTTONS ─────────────────────────────────────────────────── */
.btn-primary {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: var(--coffee);
    color: #fff;
    border: none;
    border-radius: 9999px;
    padding: 13px 30px;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 15px;
    font-weight: 700;
    cursor: pointer;
    text-decoration: none;
    transition: background 0.2s, transform 0.15s, box-shadow 0.2s;
    box-shadow: 0 4px 18px rgba(135,96,57,0.28);
}
.btn-primary:hover {
    background: var(--coffee-dark);
    transform: translateY(-1px);
    box-shadow: 0 8px 24px rgba(135,96,57,0.32);
}

.btn-outline {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: #fff;
    color: var(--coffee);
    border: 1px solid rgba(135,96,57,0.22);
    border-radius: 9999px;
    padding: 12px 28px;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 15px;
    font-weight: 700;
    cursor: pointer;
    text-decoration: none;
    transition: border-color 0.2s, background 0.2s, transform 0.15s;
}
.btn-outline:hover {
    background: var(--coffee-light);
    border-color: var(--coffee);
    transform: translateY(-1px);
}

/* ─── HERO ────────────────────────────────────────────────────── */
.hero {
    padding: 60px 0 80px;
    background: var(--bg-page);
    overflow: hidden;
    position: relative;
}

.hero::before {
    content: '';
    position: absolute;
    top: -120px; right: -200px;
    width: 700px; height: 700px;
    background: radial-gradient(circle, rgba(135,96,57,0.07) 0%, transparent 65%);
    pointer-events: none;
}

.hero-inner {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    align-items: center;
}

.hero-copy h1 {
    font-size: clamp(38px, 5vw, 58px);
    font-weight: 800;
    margin-bottom: 20px;
    letter-spacing: -0.03em;
}

.hero-copy p {
    font-size: 18px;
    color: var(--ink-soft);
    max-width: 500px;
    margin-bottom: 32px;
    line-height: 1.7;
}

.hero-ctas {
    display: flex;
    flex-wrap: wrap;
    gap: 14px;
    margin-bottom: 36px;
}

.hero-badges {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.hero-badge {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    font-size: 12.5px;
    font-weight: 600;
    color: var(--ink-soft);
    background: #fff;
    border: 1px solid var(--line);
    border-radius: 9999px;
    padding: 6px 14px;
}
.hero-badge .badge-dot {
    width: 8px; height: 8px;
    border-radius: 50%;
    background: var(--green);
}

/* ─── DEVICE WINDOW ───────────────────────────────────────────── */
.device-window {
    background: #fff;
    border-radius: 20px;
    border: 1px solid var(--line);
    box-shadow: 0 24px 60px rgba(33,22,15,0.10);
    overflow: hidden;
}

.window-bar {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 18px;
    background: #F9F5F0;
    border-bottom: 1px solid var(--line);
}

.win-dots {
    display: flex;
    gap: 6px;
}
.win-dot {
    width: 11px; height: 11px;
    border-radius: 50%;
}
.win-dot.r { background: #FC5F57; }
.win-dot.y { background: #FDBC2C; }
.win-dot.g { background: #34C749; }

.win-url {
    flex: 1;
    background: #EDEAE6;
    border-radius: 6px;
    font-size: 11.5px;
    color: var(--ink-faint);
    padding: 4px 12px;
    font-family: monospace;
}

.win-status {
    font-size: 11px;
    font-weight: 700;
    background: var(--green-bg);
    color: var(--green);
    border-radius: 9999px;
    padding: 3px 10px;
}

/* ─── KANBAN BOARD ────────────────────────────────────────────── */
.kanban-board {
    padding: 16px;
    background: #F9F4EE;
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 12px;
}

.kanban-header-bar {
    padding: 10px 16px;
    background: #fff;
    border-radius: 12px 12px 0 0;
    border-bottom: 1px solid var(--line);
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 0;
}

.kanban-col {
    border-radius: 14px;
    overflow: hidden;
    background: #fff;
    border: 1px solid var(--line);
}

.kanban-col-head {
    padding: 10px 14px;
    font-family: 'Outfit', sans-serif;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 0.8px;
    text-transform: uppercase;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.col-incoming .kanban-col-head { background: var(--amber-bg); color: var(--amber); border-bottom: 2px solid #FDE68A; }
.col-preparing .kanban-col-head { background: var(--coffee-light); color: var(--coffee-dark); border-bottom: 2px solid var(--coffee-border); }
.col-ready .kanban-col-head { background: var(--green-bg); color: var(--green); border-bottom: 2px solid #86EFAC; }

.col-badge {
    font-size: 11px;
    font-weight: 700;
    padding: 2px 8px;
    border-radius: 9999px;
}
.col-incoming .col-badge { background: #FDE68A; color: var(--amber); }
.col-preparing .col-badge { background: var(--coffee-light); color: var(--coffee); border: 1px solid var(--coffee-border); }
.col-ready .col-badge { background: #86EFAC; color: var(--green); }

.kanban-cards {
    padding: 10px;
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.k-card {
    background: #FDFBF8;
    border: 1px solid var(--line);
    border-radius: 10px;
    padding: 10px 12px;
    font-size: 11.5px;
    position: relative;
}

.k-card-top {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 6px;
}

.k-order-id {
    font-family: 'Outfit', sans-serif;
    font-weight: 700;
    font-size: 12px;
    color: var(--ink);
}

.k-type-badge {
    font-size: 10px;
    font-weight: 700;
    padding: 2px 7px;
    border-radius: 6px;
    text-transform: uppercase;
    letter-spacing: 0.4px;
}
.type-dinein { background: #EDE9FE; color: #6D28D9; }
.type-takeaway { background: #DBEAFE; color: #1D4ED8; }
.type-delivery { background: #FFE4E6; color: #BE123C; }
.type-counter { background: #F3F4F6; color: #374151; }

.k-items {
    color: var(--ink-soft);
    font-size: 11px;
    margin-bottom: 6px;
    line-height: 1.5;
}

.k-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.k-price {
    font-family: 'Outfit', sans-serif;
    font-weight: 700;
    font-size: 12px;
    color: var(--ink);
}

.k-time {
    font-size: 10.5px;
    color: var(--ink-faint);
}

.k-timer {
    font-size: 11px;
    font-weight: 700;
    padding: 2px 8px;
    border-radius: 6px;
}
.timer-ok { background: var(--green-bg); color: var(--green); }
.timer-warn { background: var(--amber-bg); color: var(--amber); }

.k-status-pill {
    font-size: 10.5px;
    font-weight: 700;
    padding: 3px 9px;
    border-radius: 9999px;
}
.status-called { background: var(--green-bg); color: var(--green); }
.status-counter { background: #E0F2FE; color: #0369A1; }

.kanban-summary {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 16px;
    background: #fff;
    border-top: 1px solid var(--line);
    font-size: 11.5px;
    color: var(--ink-soft);
}

.summary-stat {
    display: flex;
    align-items: center;
    gap: 5px;
    font-weight: 600;
}
.summary-stat .dot { width: 7px; height: 7px; border-radius: 50%; background: var(--green); }
.summary-stat .rev { color: var(--coffee); font-family: 'Outfit', sans-serif; font-weight: 700; }

/* ─── VALUE STRIP ─────────────────────────────────────────────── */
.value-strip {
    padding: 32px 0;
    border-top: 1px solid var(--line);
    border-bottom: 1px solid var(--line);
    background: #fff;
}

.value-strip-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 0;
}

.value-item {
    padding: 20px 28px;
    display: flex;
    align-items: flex-start;
    gap: 14px;
    border-right: 1px solid var(--line);
}
.value-item:last-child { border-right: none; }

.value-icon {
    width: 42px; height: 42px;
    border-radius: 12px;
    background: var(--coffee-light);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    flex-shrink: 0;
}

.value-text h4 {
    font-size: 14px;
    font-weight: 700;
    color: var(--ink);
    margin-bottom: 3px;
}
.value-text p {
    font-size: 12.5px;
    color: var(--ink-faint);
    line-height: 1.45;
}

/* ─── SECTION SHARED ──────────────────────────────────────────── */
.section { padding: 100px 0; }
.section-alt {
    padding: 100px 0;
    background: var(--bg-surface);
    border-top: 1px solid var(--line);
    border-bottom: 1px solid var(--line);
}

.section-header {
    text-align: center;
    max-width: 680px;
    margin: 0 auto 60px;
}
.section-header h2 {
    font-size: clamp(30px, 4vw, 44px);
    font-weight: 800;
    margin-bottom: 16px;
}
.section-header p {
    font-size: 17px;
    color: var(--ink-soft);
    line-height: 1.7;
}

/* ─── DEEP FEATURE SHOWCASE ───────────────────────────────────── */
.showcase-wrapper {
    display: grid;
    grid-template-columns: 1fr 520px;
    gap: 64px;
    align-items: center;
}

.showcase-copy h2 {
    font-size: clamp(28px, 3.5vw, 40px);
    font-weight: 800;
    margin-bottom: 18px;
}

.showcase-copy p {
    font-size: 16.5px;
    color: var(--ink-soft);
    margin-bottom: 28px;
    line-height: 1.7;
}

.showcase-points {
    display: flex;
    flex-direction: column;
    gap: 16px;
    margin-bottom: 32px;
}

.showcase-point {
    display: flex;
    align-items: flex-start;
    gap: 14px;
}

.sp-icon {
    width: 36px; height: 36px;
    border-radius: 10px;
    background: var(--coffee-light);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    flex-shrink: 0;
    border: 1px solid var(--coffee-border);
}

.sp-text h4 {
    font-size: 14.5px;
    font-weight: 700;
    color: var(--ink);
    margin-bottom: 2px;
}
.sp-text p {
    font-size: 13.5px;
    color: var(--ink-faint);
    line-height: 1.5;
    margin: 0;
}

/* Large Kanban for showcase */
.showcase-kanban {
    background: #fff;
    border-radius: 20px;
    border: 1px solid var(--line);
    box-shadow: 0 24px 60px rgba(33,22,15,0.10);
    overflow: hidden;
}

.sk-topbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 12px 18px;
    background: #F9F5F0;
    border-bottom: 1px solid var(--line);
}

.sk-topbar-left {
    display: flex;
    align-items: center;
    gap: 10px;
}

.sk-title {
    font-family: 'Outfit', sans-serif;
    font-size: 13px;
    font-weight: 700;
    color: var(--ink);
}

.sk-live-dot {
    display: flex;
    align-items: center;
    gap: 5px;
    font-size: 11px;
    font-weight: 700;
    color: var(--green);
}
.sk-live-dot::before {
    content: '';
    display: block;
    width: 7px; height: 7px;
    border-radius: 50%;
    background: var(--green);
    animation: pulse 1.4s infinite;
}

@keyframes pulse {
    0%, 100% { opacity: 1; transform: scale(1); }
    50% { opacity: 0.5; transform: scale(1.3); }
}

.sk-stats {
    display: flex;
    gap: 14px;
}
.sk-stat {
    font-size: 11px;
    color: var(--ink-faint);
    font-weight: 600;
}
.sk-stat strong {
    color: var(--ink);
    font-family: 'Outfit', sans-serif;
}

.sk-board {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 0;
}

.sk-col {
    padding: 0;
    border-right: 1px solid var(--line);
}
.sk-col:last-child { border-right: none; }

.sk-col-head {
    padding: 10px 14px;
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.sk-incoming .sk-col-head { background: var(--amber-bg); color: var(--amber); border-bottom: 2px solid #FDE68A; }
.sk-preparing .sk-col-head { background: var(--coffee-light); color: var(--coffee-dark); border-bottom: 2px solid var(--coffee-border); }
.sk-ready .sk-col-head { background: var(--green-bg); color: var(--green); border-bottom: 2px solid #86EFAC; }

.sk-count {
    font-size: 11px;
    font-weight: 800;
    padding: 2px 8px;
    border-radius: 9999px;
}
.sk-incoming .sk-count { background: #FDE68A; }
.sk-preparing .sk-count { background: rgba(135,96,57,0.15); }
.sk-ready .sk-count { background: #86EFAC; }

.sk-cards {
    padding: 10px;
    display: flex;
    flex-direction: column;
    gap: 8px;
    min-height: 240px;
}

.sk-card {
    background: #FEFCFA;
    border: 1px solid var(--line);
    border-radius: 10px;
    padding: 10px 12px;
    font-size: 11px;
}

.sk-card-top {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 5px;
}

.sk-order-num {
    font-family: 'Outfit', sans-serif;
    font-weight: 700;
    font-size: 12px;
    color: var(--ink);
}

.sk-items {
    color: var(--ink-soft);
    font-size: 11px;
    line-height: 1.45;
    margin-bottom: 7px;
}

.sk-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.sk-price {
    font-family: 'Outfit', sans-serif;
    font-weight: 700;
    font-size: 12px;
    color: var(--ink);
}

.sk-bot {
    padding: 10px 14px;
    background: #F9F5F0;
    border-top: 1px solid var(--line);
    display: flex;
    justify-content: space-between;
    font-size: 11px;
    color: var(--ink-faint);
    font-weight: 600;
}

/* ─── HOW IT WORKS ────────────────────────────────────────────── */
.how-steps {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 28px;
    position: relative;
}

.how-steps::before {
    content: '';
    position: absolute;
    top: 28px;
    left: calc(12.5% + 16px);
    right: calc(12.5% + 16px);
    height: 2px;
    background: linear-gradient(90deg, var(--coffee-border), var(--coffee), var(--coffee-border));
    z-index: 0;
}

.how-step {
    background: #fff;
    border-radius: 20px;
    border: 1px solid var(--line);
    padding: 28px 22px;
    text-align: center;
    position: relative;
    z-index: 1;
    transition: box-shadow 0.2s, transform 0.2s;
}
.how-step:hover {
    box-shadow: 0 16px 40px rgba(33,22,15,0.09);
    transform: translateY(-4px);
}

.how-step-num {
    width: 52px; height: 52px;
    border-radius: 50%;
    background: var(--coffee);
    color: #fff;
    font-family: 'Outfit', sans-serif;
    font-size: 20px;
    font-weight: 800;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 18px;
    box-shadow: 0 6px 20px rgba(135,96,57,0.30);
}

.how-step h4 {
    font-size: 16px;
    font-weight: 700;
    margin-bottom: 10px;
}
.how-step p {
    font-size: 13.5px;
    color: var(--ink-faint);
    line-height: 1.6;
}

.how-step-icon {
    font-size: 24px;
    margin-bottom: 12px;
}

/* ─── FEATURE GRID ────────────────────────────────────────────── */
.feature-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
}

.feature-card {
    background: #fff;
    border-radius: 20px;
    border: 1px solid var(--line);
    padding: 30px 26px;
    transition: box-shadow 0.2s, transform 0.2s;
}
.feature-card:hover {
    box-shadow: 0 16px 40px rgba(33,22,15,0.09);
    transform: translateY(-4px);
}

.fc-icon {
    width: 52px; height: 52px;
    border-radius: 14px;
    background: var(--coffee-light);
    border: 1px solid var(--coffee-border);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
    margin-bottom: 18px;
}

.feature-card h3 {
    font-size: 17px;
    font-weight: 700;
    margin-bottom: 10px;
}
.feature-card p {
    font-size: 14px;
    color: var(--ink-soft);
    line-height: 1.65;
}

/* ─── METRICS STRIP ───────────────────────────────────────────── */
.metrics-strip {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 0;
}

.metric-item {
    padding: 40px 32px;
    text-align: center;
    border-right: 1px solid rgba(255,255,255,0.12);
    position: relative;
}
.metric-item:last-child { border-right: none; }

.metric-value {
    font-family: 'Outfit', sans-serif;
    font-size: 44px;
    font-weight: 800;
    color: #fff;
    line-height: 1;
    margin-bottom: 8px;
}

.metric-label {
    font-size: 14px;
    color: rgba(255,255,255,0.72);
    line-height: 1.45;
}

.metrics-section {
    background: linear-gradient(135deg, #3D1F07 0%, #6F4E2D 50%, #876039 100%);
    padding: 0;
    border-radius: 0;
    overflow: hidden;
    position: relative;
}

.metrics-section::before {
    content: '';
    position: absolute;
    inset: 0;
    background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}

.metrics-header {
    text-align: center;
    padding: 60px 0 20px;
    position: relative;
}
.metrics-header h2 {
    font-size: 34px;
    font-weight: 800;
    color: #fff;
    margin-bottom: 10px;
}
.metrics-header p {
    color: rgba(255,255,255,0.70);
    font-size: 15px;
}

/* ─── COMPARE ─────────────────────────────────────────────────── */
.compare-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 28px;
    max-width: 900px;
    margin: 0 auto;
}

.compare-col {
    border-radius: 22px;
    padding: 32px;
    border: 1px solid var(--line);
}

.compare-col.old {
    background: #FFF8F8;
    border-color: rgba(220,38,38,0.15);
}
.compare-col.new {
    background: #F0FDF4;
    border-color: rgba(21,128,61,0.18);
}

.compare-col-head {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 24px;
}

.compare-icon {
    width: 42px; height: 42px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
}
.old .compare-icon { background: #FEE2E2; }
.new .compare-icon { background: var(--green-bg); }

.compare-col-head h3 {
    font-size: 16px;
    font-weight: 700;
}
.old .compare-col-head h3 { color: var(--red); }
.new .compare-col-head h3 { color: var(--green); }

.compare-list {
    list-style: none;
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.compare-list li {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    font-size: 14px;
    color: var(--ink-soft);
    line-height: 1.5;
}

.compare-list li::before {
    content: attr(data-icon);
    font-size: 15px;
    flex-shrink: 0;
    margin-top: 1px;
}

/* ─── FAQ ─────────────────────────────────────────────────────── */
.faq-list {
    max-width: 760px;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    gap: 14px;
}

.faq-item {
    background: #fff;
    border: 1px solid var(--line);
    border-radius: 16px;
    overflow: hidden;
}

.faq-q {
    width: 100%;
    text-align: left;
    padding: 20px 24px;
    background: none;
    border: none;
    cursor: pointer;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 16px;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 15.5px;
    font-weight: 700;
    color: var(--ink);
    transition: background 0.15s;
}
.faq-q:hover { background: var(--coffee-light); }

.faq-chevron {
    width: 28px; height: 28px;
    border-radius: 50%;
    background: var(--coffee-light);
    border: 1px solid var(--coffee-border);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    transition: transform 0.25s, background 0.2s;
    color: var(--coffee);
    font-size: 14px;
}

.faq-item.open .faq-chevron {
    transform: rotate(180deg);
    background: var(--coffee);
    color: #fff;
    border-color: var(--coffee);
}

.faq-a {
    display: none;
    padding: 0 24px 20px;
    font-size: 14.5px;
    color: var(--ink-soft);
    line-height: 1.7;
    border-top: 1px solid var(--line);
    padding-top: 16px;
}
.faq-item.open .faq-a { display: block; }

/* ─── CTA SECTION ─────────────────────────────────────────────── */
.cta-section {
    background: linear-gradient(135deg, #21160F 0%, #3D2410 60%, #5A3520 100%);
    padding: 100px 0;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.cta-section::before {
    content: '';
    position: absolute;
    top: -100px; left: 50%;
    transform: translateX(-50%);
    width: 600px; height: 600px;
    background: radial-gradient(circle, rgba(135,96,57,0.25) 0%, transparent 65%);
    pointer-events: none;
}

.cta-inner { position: relative; z-index: 1; }

.cta-section h2 {
    font-size: clamp(30px, 4.5vw, 50px);
    font-weight: 800;
    color: #fff;
    margin-bottom: 18px;
    letter-spacing: -0.03em;
}

.cta-section p {
    font-size: 18px;
    color: rgba(255,255,255,0.70);
    margin-bottom: 36px;
    max-width: 540px;
    margin-left: auto;
    margin-right: auto;
    line-height: 1.7;
}

.cta-btns {
    display: flex;
    justify-content: center;
    gap: 16px;
    flex-wrap: wrap;
    margin-bottom: 36px;
}

.btn-white {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: #fff;
    color: var(--coffee-dark);
    border: none;
    border-radius: 9999px;
    padding: 13px 30px;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 15px;
    font-weight: 700;
    cursor: pointer;
    text-decoration: none;
    transition: background 0.2s, transform 0.15s;
    box-shadow: 0 4px 18px rgba(0,0,0,0.20);
}
.btn-white:hover { background: var(--coffee-light); transform: translateY(-1px); }

.btn-ghost {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: transparent;
    color: rgba(255,255,255,0.85);
    border: 1px solid rgba(255,255,255,0.25);
    border-radius: 9999px;
    padding: 12px 28px;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 15px;
    font-weight: 700;
    cursor: pointer;
    text-decoration: none;
    transition: border-color 0.2s, background 0.2s;
}
.btn-ghost:hover { border-color: rgba(255,255,255,0.55); background: rgba(255,255,255,0.06); }

.cta-trust {
    display: flex;
    justify-content: center;
    gap: 24px;
    flex-wrap: wrap;
}

.cta-trust-item {
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: 13px;
    color: rgba(255,255,255,0.60);
    font-weight: 500;
}
.cta-trust-item svg { opacity: 0.7; }

/* ─── CROSS LINKS ─────────────────────────────────────────────── */
.cross-links { padding: 60px 0; }
.cross-links-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
}
.cross-card {
    background: #fff;
    border: 1px solid var(--line);
    border-radius: 18px;
    padding: 24px;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 16px;
    transition: box-shadow 0.2s, transform 0.2s, border-color 0.2s;
}
.cross-card:hover {
    box-shadow: 0 12px 32px rgba(33,22,15,0.08);
    transform: translateY(-3px);
    border-color: var(--coffee-border);
}
.cross-icon {
    width: 46px; height: 46px;
    border-radius: 12px;
    background: var(--coffee-light);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    flex-shrink: 0;
}
.cross-text h4 {
    font-size: 14.5px;
    font-weight: 700;
    color: var(--ink);
    margin-bottom: 3px;
}
.cross-text p {
    font-size: 12.5px;
    color: var(--ink-faint);
    line-height: 1.4;
}

/* ─── RESPONSIVE ──────────────────────────────────────────────── */
@media (max-width: 1024px) {
    .hero-inner { grid-template-columns: 1fr; gap: 40px; }
    .hero-copy { text-align: center; }
    .hero-copy p { max-width: 100%; margin-left: auto; margin-right: auto; }
    .hero-ctas { justify-content: center; }
    .hero-badges { justify-content: center; }
    .showcase-wrapper { grid-template-columns: 1fr; gap: 40px; }
    .value-strip-grid { grid-template-columns: repeat(2, 1fr); }
    .value-item:nth-child(2) { border-right: none; }
    .value-item:nth-child(3) { border-top: 1px solid var(--line); }
    .how-steps { grid-template-columns: repeat(2, 1fr); }
    .how-steps::before { display: none; }
    .feature-grid { grid-template-columns: repeat(2, 1fr); }
    .metrics-strip { grid-template-columns: repeat(2, 1fr); }
    .metric-item:nth-child(2) { border-right: none; }
    .kanban-board { grid-template-columns: 1fr; gap: 10px; }
    .sk-board { grid-template-columns: 1fr; }
    .cross-links-grid { grid-template-columns: 1fr; }
}

@media (max-width: 640px) {
    .feature-grid { grid-template-columns: 1fr; }
    .compare-grid { grid-template-columns: 1fr; }
    .how-steps { grid-template-columns: 1fr; }
    .value-strip-grid { grid-template-columns: 1fr; }
    .value-item { border-right: none; border-bottom: 1px solid var(--line); }
    .value-item:last-child { border-bottom: none; }
    .metrics-strip { grid-template-columns: repeat(2, 1fr); }
    .metric-item { border-right: none; border-bottom: 1px solid rgba(255,255,255,0.10); }
}
</style>

{{-- ───────────────────────────────────────────────────────────────
     BREADCRUMB
─────────────────────────────────────────────────────────────── --}}
<div class="container">
    <div class="breadcrumb">
        <a href="{{ route('features') }}">← All Features</a>
        <span>/</span>
        <span>Order Management</span>
    </div>
</div>

{{-- ═══════════════════════════════════════════════════════════════
     HERO SECTION
═══════════════════════════════════════════════════════════════ --}}
<section class="hero">
    <div class="container">
        <div class="hero-inner">

            {{-- Copy --}}
            <div class="hero-copy" data-aos="fade-right" data-aos-duration="700">
                <div class="sec-eyebrow">Order Management</div>
                <h1>Every Order, Every Channel —<br><span class="italic-serif">One Unified Board</span></h1>
                <p>Dine-in tables, counter takeaways, Swiggy & Zomato deliveries — manage every single order on a live Kanban board so nothing slips through the cracks, ever.</p>
                <div class="hero-ctas">
                    <a href="{{ route('restaurant_signup') }}" class="btn-primary">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>
                        Get Started Free
                    </a>
                    <a href="{{ route('restaurant_signup') }}" class="btn-outline">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
                        Book a Demo
                    </a>
                </div>
                <div class="hero-badges">
                    <div class="hero-badge">
                        <div class="badge-dot"></div>
                        Live Order Sync
                    </div>
                    <div class="hero-badge">
                        <div class="badge-dot"></div>
                        Zero Setup Required
                    </div>
                    <div class="hero-badge">
                        <div class="badge-dot"></div>
                        All Channels Unified
                    </div>
                    <div class="hero-badge">
                        <div class="badge-dot"></div>
                        Works on Any Device
                    </div>
                </div>
            </div>

            {{-- Hero Visual — Kanban Device Window --}}
            <div data-aos="fade-left" data-aos-duration="800" data-aos-delay="100">
                <div class="device-window">
                    <div class="window-bar">
                        <div class="win-dots">
                            <div class="win-dot r"></div>
                            <div class="win-dot y"></div>
                            <div class="win-dot g"></div>
                        </div>
                        <div class="win-url">app.genimenu.com/orders/live</div>
                        <div class="win-status">● LIVE</div>
                    </div>

                    <div class="kanban-board">
                        {{-- Column: Incoming --}}
                        <div class="kanban-col col-incoming">
                            <div class="kanban-col-head">
                                <span><svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M5 22h14"/><path d="M5 2h14"/><path d="M17 22v-4.172a2 2 0 0 0-.586-1.414L12 12l-4.414 4.414A2 2 0 0 0 7 17.828V22"/><path d="M7 2v4.172a2 2 0 0 0 .586 1.414L12 12l4.414-4.414A2 2 0 0 0 17 6.172V2"/></svg> Incoming</span>
                                <span class="col-badge">2</span>
                            </div>
                            <div class="kanban-cards">
                                <div class="k-card">
                                    <div class="k-card-top">
                                        <span class="k-order-id">#1248 · Table 07</span>
                                        <span class="k-type-badge type-dinein">Dine-In</span>
                                    </div>
                                    <div class="k-items">Butter Chicken ×2<br>Garlic Naan ×4</div>
                                    <div class="k-footer">
                                        <span class="k-price">₹1,140</span>
                                        <span class="k-time">Just now</span>
                                    </div>
                                </div>
                                <div class="k-card">
                                    <div class="k-card-top">
                                        <span class="k-order-id">#1249 · Takeaway</span>
                                        <span class="k-type-badge type-takeaway">Takeaway</span>
                                    </div>
                                    <div class="k-items">Paneer Tikka Roll ×1<br>Mint Lassi ×1</div>
                                    <div class="k-footer">
                                        <span class="k-price">₹340</span>
                                        <span class="k-time">1 min ago</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Column: Preparing --}}
                        <div class="kanban-col col-preparing">
                            <div class="kanban-col-head">
                                <span><svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M8.5 14.5A2.5 2.5 0 0 0 11 12c0-1.38-.5-2-1-3-1.072-2.143-.224-4.054 2-6 .5 2.5 2 4.9 4 6.5 2 1.6 3 3.5 3 5.5a7 7 0 1 1-14 0c0-1.153.433-2.294 1-3a2.5 2.5 0 0 0 2.5 2.5z"/></svg> Preparing</span>
                                <span class="col-badge">2</span>
                            </div>
                            <div class="kanban-cards">
                                <div class="k-card">
                                    <div class="k-card-top">
                                        <span class="k-order-id">#1246 · Table 03</span>
                                        <span class="k-type-badge type-dinein">Dine-In</span>
                                    </div>
                                    <div class="k-items">Truffle Risotto ×1<br>Margherita Pizza ×1</div>
                                    <div class="k-footer">
                                        <span class="k-price">₹1,480</span>
                                        <span class="k-timer timer-ok">08:24 / 15:00</span>
                                    </div>
                                </div>
                                <div class="k-card">
                                    <div class="k-card-top">
                                        <span class="k-order-id">#1247 · Swiggy</span>
                                        <span class="k-type-badge type-delivery">Delivery</span>
                                    </div>
                                    <div class="k-items">Veg Biryani ×2<br>Raita ×1</div>
                                    <div class="k-footer">
                                        <span class="k-price">₹780</span>
                                        <span class="k-timer timer-warn">04:10 / 12:00</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Column: Ready --}}
                        <div class="kanban-col col-ready">
                            <div class="kanban-col-head">
                                <span><svg class="gm-theme-icon gm-ok" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg> Ready</span>
                                <span class="col-badge">2</span>
                            </div>
                            <div class="kanban-cards">
                                <div class="k-card">
                                    <div class="k-card-top">
                                        <span class="k-order-id">#1244 · Table 05</span>
                                        <span class="k-type-badge type-dinein">Dine-In</span>
                                    </div>
                                    <div class="k-items">Chocolate Fondant ×2<br>Cold Coffee ×2</div>
                                    <div class="k-footer">
                                        <span class="k-price">₹620</span>
                                        <span class="k-status-pill status-called">Steward Called</span>
                                    </div>
                                </div>
                                <div class="k-card">
                                    <div class="k-card-top">
                                        <span class="k-order-id">#1245 · Token #42</span>
                                        <span class="k-type-badge type-counter">Counter</span>
                                    </div>
                                    <div class="k-items">Masala Chai ×3<br>Samosa ×2</div>
                                    <div class="k-footer">
                                        <span class="k-price">₹230</span>
                                        <span class="k-status-pill status-counter">Counter Ready</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="kanban-summary">
                        <div class="summary-stat">
                            <div class="dot"></div>
                            <span>24 orders today</span>
                        </div>
                        <div class="summary-stat">
                            Revenue today: <span class="rev">₹28,400</span>
                        </div>
                        <div class="summary-stat">
                            <span style="color:var(--amber);font-weight:700;">● 6 active now</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════
     VALUE STRIP
═══════════════════════════════════════════════════════════════ --}}
<div class="value-strip">
    <div class="container">
        <div class="value-strip-grid">
            <div class="value-item" data-aos="fade-up" data-aos-delay="0">
                <div class="value-icon"><svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><rect width="8" height="4" x="8" y="2" rx="1" ry="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/></svg></div>
                <div class="value-text">
                    <h4>Live Order Board</h4>
                    <p>Every order visible in real time, across all channels</p>
                </div>
            </div>
            <div class="value-item" data-aos="fade-up" data-aos-delay="80">
                <div class="value-icon"><svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg></div>
                <div class="value-text">
                    <h4>All Channels in One Queue</h4>
                    <p>Dine-in, takeaway, Swiggy & Zomato — unified</p>
                </div>
            </div>
            <div class="value-item" data-aos="fade-up" data-aos-delay="160">
                <div class="value-icon"><svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="13" r="8"/><path d="M12 9v4l2 2"/><path d="M10 2h4"/></svg>️</div>
                <div class="value-text">
                    <h4>SLA Prep Timers</h4>
                    <p>Colour-coded alerts before orders breach time limits</p>
                </div>
            </div>
            <div class="value-item" data-aos="fade-up" data-aos-delay="240">
                <div class="value-icon"><svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><rect width="14" height="20" x="5" y="2" rx="2" ry="2"/><path d="M12 18h.01"/></svg></div>
                <div class="value-text">
                    <h4>Auto Customer Alerts</h4>
                    <p>SMS customers the moment their order is ready</p>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ═══════════════════════════════════════════════════════════════
     DEEP FEATURE SHOWCASE
═══════════════════════════════════════════════════════════════ --}}
<section class="section">
    <div class="container">
        <div class="showcase-wrapper">

            {{-- Copy Side --}}
            <div data-aos="fade-right" data-aos-duration="700">
                <div class="sec-eyebrow">Live Order Pipeline</div>
                <h2>Your kitchen and front-of-house on the <span class="italic-serif">same page</span>, always</h2>
                <p>The Geni Menu order board gives your team a single source of truth. From the moment a guest places an order — whether at the table, at the counter, or through Swiggy — it lands instantly in the board and flows through to completion.</p>

                <div class="showcase-points">
                    <div class="showcase-point">
                        <div class="sp-icon"><svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/></svg></div>
                        <div class="sp-text">
                            <h4>Drag-and-Drop Status Updates</h4>
                            <p>Move orders between Incoming → Preparing → Ready with a single tap — from tablet, phone or desktop.</p>
                        </div>
                    </div>
                    <div class="showcase-point">
                        <div class="sp-icon"><svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/></svg></div>
                        <div class="sp-text">
                            <h4>Online Aggregator Pull-In</h4>
                            <p>Swiggy, Zomato and your own website orders appear automatically — no manual re-entry, ever.</p>
                        </div>
                    </div>
                    <div class="showcase-point">
                        <div class="sp-icon"><svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/></svg>️</div>
                        <div class="sp-text">
                            <h4>Mid-Flow Order Edits</h4>
                            <p>Guest wants to swap Paneer for Chicken after the KOT fires? Update in the board, kitchen sees it instantly.</p>
                        </div>
                    </div>
                    <div class="showcase-point">
                        <div class="sp-icon"><svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/></svg></div>
                        <div class="sp-text">
                            <h4>Steward & Counter Alerts</h4>
                            <p>When an order moves to Ready, the assigned steward gets a buzz and the customer gets an SMS.</p>
                        </div>
                    </div>
                </div>

                <a href="{{ route('restaurant_signup') }}" class="btn-primary">
                    See the Board in Action →
                </a>
            </div>

            {{-- Large Kanban Visual --}}
            <div data-aos="fade-left" data-aos-duration="800" data-aos-delay="100">
                <div class="showcase-kanban">
                    <div class="sk-topbar">
                        <div class="sk-topbar-left">
                            <div class="sk-title"><svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2"/><path d="M7 2v20"/><path d="M21 15V2v0a5 5 0 0 0-5 5v6c0 1.1.9 2 2 2h3Zm0 0v7"/></svg>️ Geni Order Board</div>
                            <div class="sk-live-dot">LIVE</div>
                        </div>
                        <div class="sk-stats">
                            <div class="sk-stat">Active: <strong>6</strong></div>
                            <div class="sk-stat">Today: <strong>24</strong></div>
                            <div class="sk-stat">Rev: <strong style="color:var(--coffee)">₹28.4k</strong></div>
                        </div>
                    </div>

                    <div class="sk-board">
                        {{-- Incoming --}}
                        <div class="sk-col sk-incoming">
                            <div class="sk-col-head">
                                <span><svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M5 22h14"/><path d="M5 2h14"/><path d="M17 22v-4.172a2 2 0 0 0-.586-1.414L12 12l-4.414 4.414A2 2 0 0 0 7 17.828V22"/><path d="M7 2v4.172a2 2 0 0 0 .586 1.414L12 12l4.414-4.414A2 2 0 0 0 17 6.172V2"/></svg> Incoming</span>
                                <span class="sk-count">2</span>
                            </div>
                            <div class="sk-cards">
                                <div class="sk-card">
                                    <div class="sk-card-top">
                                        <span class="sk-order-num">#1248 · Table 07</span>
                                        <span class="k-type-badge type-dinein">Dine-In</span>
                                    </div>
                                    <div class="sk-items">Butter Chicken ×2 · Garlic Naan ×4<br>Dal Makhani ×1</div>
                                    <div class="sk-footer">
                                        <span class="sk-price">₹1,140</span>
                                        <span style="font-size:10px;color:var(--ink-faint)">Just now</span>
                                    </div>
                                </div>
                                <div class="sk-card">
                                    <div class="sk-card-top">
                                        <span class="sk-order-num">#1249 · Takeaway</span>
                                        <span class="k-type-badge type-takeaway">Takeaway</span>
                                    </div>
                                    <div class="sk-items">Paneer Tikka Roll ×1 · Mint Lassi ×1</div>
                                    <div class="sk-footer">
                                        <span class="sk-price">₹340</span>
                                        <span style="font-size:10px;color:var(--ink-faint)">1 min ago</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Preparing --}}
                        <div class="sk-col sk-preparing">
                            <div class="sk-col-head">
                                <span><svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M8.5 14.5A2.5 2.5 0 0 0 11 12c0-1.38-.5-2-1-3-1.072-2.143-.224-4.054 2-6 .5 2.5 2 4.9 4 6.5 2 1.6 3 3.5 3 5.5a7 7 0 1 1-14 0c0-1.153.433-2.294 1-3a2.5 2.5 0 0 0 2.5 2.5z"/></svg> Preparing</span>
                                <span class="sk-count">2</span>
                            </div>
                            <div class="sk-cards">
                                <div class="sk-card">
                                    <div class="sk-card-top">
                                        <span class="sk-order-num">#1246 · Table 03</span>
                                        <span class="k-type-badge type-dinein">Dine-In</span>
                                    </div>
                                    <div class="sk-items">Truffle Risotto ×1 · Margherita Pizza ×1</div>
                                    <div class="sk-footer">
                                        <span class="sk-price">₹1,480</span>
                                        <span class="k-timer timer-ok">08:24 / 15:00</span>
                                    </div>
                                </div>
                                <div class="sk-card">
                                    <div class="sk-card-top">
                                        <span class="sk-order-num">#1247 · Swiggy</span>
                                        <span class="k-type-badge type-delivery">Delivery</span>
                                    </div>
                                    <div class="sk-items">Veg Biryani ×2 · Raita ×1</div>
                                    <div class="sk-footer">
                                        <span class="sk-price">₹780</span>
                                        <span class="k-timer timer-warn">04:10 / 12:00</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Ready --}}
                        <div class="sk-col sk-ready">
                            <div class="sk-col-head">
                                <span><svg class="gm-theme-icon gm-ok" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg> Ready</span>
                                <span class="sk-count">2</span>
                            </div>
                            <div class="sk-cards">
                                <div class="sk-card">
                                    <div class="sk-card-top">
                                        <span class="sk-order-num">#1244 · Table 05</span>
                                        <span class="k-type-badge type-dinein">Dine-In</span>
                                    </div>
                                    <div class="sk-items">Chocolate Fondant ×2 · Cold Coffee ×2</div>
                                    <div class="sk-footer">
                                        <span class="sk-price">₹620</span>
                                        <span class="k-status-pill status-called">Steward Called</span>
                                    </div>
                                </div>
                                <div class="sk-card">
                                    <div class="sk-card-top">
                                        <span class="sk-order-num">#1245 · Token #42</span>
                                        <span class="k-type-badge type-counter">Counter</span>
                                    </div>
                                    <div class="sk-items">Masala Chai ×3 · Veg Samosa ×2</div>
                                    <div class="sk-footer">
                                        <span class="sk-price">₹230</span>
                                        <span class="k-status-pill status-counter">Counter Ready</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="sk-bot">
                        <span>Last sync: <strong>2 seconds ago</strong></span>
                        <span>Channels active: Dine-In · Takeaway · Swiggy · Counter</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════
     HOW IT WORKS
═══════════════════════════════════════════════════════════════ --}}
<section class="section-alt">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <div class="sec-eyebrow">How It Works</div>
            <h2>From order placed to order <span class="italic-serif">delivered</span> — in four steps</h2>
            <p>A simple, automated flow that keeps your kitchen and front-of-house perfectly synchronised without any extra effort from your team.</p>
        </div>

        <div class="how-steps">
            <div class="how-step" data-aos="fade-up" data-aos-delay="0">
                <div class="how-step-num">1</div>
                <div class="how-step-icon"><svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"/><path d="M5.45 5.11 2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"/></svg></div>
                <h4>Order Arrives</h4>
                <p>A new order — whether placed by a waiter, at the counter, or pulled in from Swiggy/Zomato — instantly appears in the <strong>Incoming</strong> column with full details.</p>
            </div>
            <div class="how-step" data-aos="fade-up" data-aos-delay="100">
                <div class="how-step-num">2</div>
                <div class="how-step-icon"><svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><polyline points="6 9 6 2 18 2 18 9"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect width="12" height="8" x="6" y="14"/></svg>️</div>
                <h4>KOT Fires to Kitchen</h4>
                <p>With one tap, the KOT is accepted and printed at the relevant kitchen station. A prep timer starts immediately so the team knows the SLA.</p>
            </div>
            <div class="how-step" data-aos="fade-up" data-aos-delay="200">
                <div class="how-step-num">3</div>
                <div class="how-step-icon"><svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M8.5 14.5A2.5 2.5 0 0 0 11 12c0-1.38-.5-2-1-3-1.072-2.143-.224-4.054 2-6 .5 2.5 2 4.9 4 6.5 2 1.6 3 3.5 3 5.5a7 7 0 1 1-14 0c0-1.153.433-2.294 1-3a2.5 2.5 0 0 0 2.5 2.5z"/></svg></div>
                <h4>Kitchen Prepares</h4>
                <p>The order moves to <strong>Preparing</strong>. The timer counts up, turning amber at 70% of the SLA window — alerting the kitchen before it's too late.</p>
            </div>
            <div class="how-step" data-aos="fade-up" data-aos-delay="300">
                <div class="how-step-num">4</div>
                <div class="how-step-icon"><svg class="gm-theme-icon gm-ok" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg></div>
                <h4>Ready & Delivered</h4>
                <p>Kitchen marks it Ready. The steward gets a buzz, the takeaway customer gets an SMS, and the order card moves to the <strong>Ready</strong> column for confirmation.</p>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════
     FEATURE GRID
═══════════════════════════════════════════════════════════════ --}}
<section class="section">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <div class="sec-eyebrow">Features</div>
            <h2>Everything you need to <span class="italic-serif">never miss</span> an order</h2>
            <p>Geni Menu's order management packs every tool your team needs into one clean, fast interface — no training manual required.</p>
        </div>

        <div class="feature-grid">
            <div class="feature-card" data-aos="fade-up" data-aos-delay="0">
                <div class="fc-icon"><svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><rect width="8" height="4" x="8" y="2" rx="1" ry="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/></svg></div>
                <h3>Live Order Status Board</h3>
                <p>Track every order from receipt to delivery on one live Kanban board. Incoming, Preparing, and Ready columns give your whole team instant clarity — no radio calls, no guesswork.</p>
            </div>
            <div class="feature-card" data-aos="fade-up" data-aos-delay="80">
                <div class="fc-icon"><svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg></div>
                <h3>Multi-Channel Aggregation</h3>
                <p>Dine-in tables, takeaway counter, and online delivery platforms (Swiggy, Zomato, your own site) all feed into one unified queue. Eliminate the chaos of juggling separate tablets.</p>
            </div>
            <div class="feature-card" data-aos="fade-up" data-aos-delay="160">
                <div class="fc-icon"><svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="13" r="8"/><path d="M12 9v4l2 2"/><path d="M10 2h4"/></svg>️</div>
                <h3>Prep Timer Alerts</h3>
                <p>Every order gets a configurable SLA timer. Colour shifts from green to amber when 70% of prep time has elapsed — so the kitchen acts before a customer complaint happens.</p>
            </div>
            <div class="feature-card" data-aos="fade-up" data-aos-delay="240">
                <div class="fc-icon"><svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/></svg>️</div>
                <h3>Modify Orders Mid-Flow</h3>
                <p>Guests change their minds. Add a dish, remove an ingredient, or substitute an item even after the KOT is dispatched. The kitchen sees the update immediately — no confusion.</p>
            </div>
            <div class="feature-card" data-aos="fade-up" data-aos-delay="320">
                <div class="fc-icon"><svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M2 9a3 3 0 0 1 0 6v2a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-2a3 3 0 0 1 0-6V7a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z"/><path d="M13 5v2"/><path d="M13 17v2"/><path d="M13 11v2"/></svg></div>
                <h3>Token & Queue Management</h3>
                <p>Issue digital or printed counter tokens for takeaway customers. The board shows their token number, order status, and triggers a counter display announcement when ready.</p>
            </div>
            <div class="feature-card" data-aos="fade-up" data-aos-delay="400">
                <div class="fc-icon"><svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><rect width="14" height="20" x="5" y="2" rx="2" ry="2"/><path d="M12 18h.01"/></svg></div>
                <h3>Customer Notification</h3>
                <p>When a takeaway or delivery order is marked Ready, an auto-SMS goes to the customer's phone instantly — reducing counter crowding and "is my order ready?" calls by over 60%.</p>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════
     METRICS / RESULTS STRIP
═══════════════════════════════════════════════════════════════ --}}
<section class="metrics-section">
    <div class="container">
        <div class="metrics-header" data-aos="fade-up">
            <div class="sec-eyebrow" style="background:rgba(255,255,255,0.12);border-color:rgba(255,255,255,0.2);color:#FDE68A;">Real Results</div>
            <h2>Numbers restaurants <span class="italic-serif" style="color:#F4EFEA;">actually see</span></h2>
            <p>Measured across Geni Menu restaurants within 60 days of going live.</p>
        </div>
        <div class="metrics-strip" style="position:relative;z-index:1;">
            <div class="metric-item" data-aos="zoom-in" data-aos-delay="0">
                <div class="metric-value">94%</div>
                <div class="metric-label">Reduction in missed<br>or delayed orders</div>
            </div>
            <div class="metric-item" data-aos="zoom-in" data-aos-delay="100">
                <div class="metric-value">3.2×</div>
                <div class="metric-label">Faster order processing<br>vs paper-based systems</div>
            </div>
            <div class="metric-item" data-aos="zoom-in" data-aos-delay="200">
                <div class="metric-value">₹14k</div>
                <div class="metric-label">Saved monthly on<br>order errors & remakes</div>
            </div>
            <div class="metric-item" data-aos="zoom-in" data-aos-delay="300">
                <div class="metric-value">62%</div>
                <div class="metric-label">Drop in "order not ready"<br>customer complaints</div>
            </div>
        </div>
        <div style="padding-bottom:60px;"></div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════
     COMPARE — OLD WAY vs GENI WAY
═══════════════════════════════════════════════════════════════ --}}
<section class="section-alt">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <div class="sec-eyebrow">Before vs After</div>
            <h2>Running orders <span class="italic-serif">the hard way</span> vs the Geni way</h2>
            <p>Most restaurants are still managing multi-channel orders through shouting, paper slips, and separate third-party tablets. Here's what changes.</p>
        </div>

        <style>
          /* --- Comparison Section: Running Orders the Hard Way vs Geni Way (matching Menu/Reservation/Waiter/Table/POS UI) --- */
          .ord-cmp-wrap {
            position: relative;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 32px;
            align-items: stretch;
          }

          .ord-cmp-center-arrow {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            z-index: 20;
            pointer-events: none;
          }

          .ord-center-arrow-circle {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: #876039;
            color: #FFFFFF;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 18px rgba(135, 96, 57, 0.4);
            border: 3px solid #FFFFFF;
          }
          .ord-center-arrow-circle svg { width: 20px; height: 20px; }

          .ord-cmp-card {
            border-radius: 24px;
            padding: 26px;
            position: relative;
            display: flex;
            flex-direction: column;
            box-sizing: border-box;
          }
          .ord-cmp-traditional {
            background: #FFFDFC;
            border: 1.5px solid #FECDD3;
            box-shadow: 0 10px 30px rgba(220, 38, 38, 0.04);
          }
          .ord-cmp-digital {
            background: #FFFFFF;
            border: 1.5px solid rgba(135, 96, 57, 0.28);
            box-shadow: 0 14px 40px rgba(135, 96, 57, 0.08);
          }

          .ord-cmp-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 22px;
          }
          .ord-badge-icon {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
          }
          .ord-badge-icon svg { width: 18px; height: 18px; }
          .ord-badge-red { background: #FEE2E2; color: #DC2626; }
          .ord-badge-brown { background: #6F4522; color: #FFFFFF; }

          .ord-cmp-title {
            font-family: 'Outfit', 'Plus Jakarta Sans', sans-serif;
            font-size: 19px;
            font-weight: 700;
            margin: 0 0 2px;
            line-height: 1.2;
          }
          .ord-cmp-title.text-red { color: #991B1B; }
          .ord-cmp-title.text-brown { color: #21160F; }
          .ord-cmp-subtitle { font-size: 12.5px; color: #76675D; margin: 0; }

          .ord-split-body {
            display: grid;
            grid-template-columns: 1fr 1.3fr;
            gap: 16px;
            align-items: stretch;
            flex: 1;
          }
          .ord-cmp-digital .ord-split-body {
            grid-template-columns: 1fr 1.05fr;
            gap: 14px;
          }

          /* Left: Paper Order Slips Clipboard */
          .ord-paper-visual {
            background: #F8F4EE;
            border-radius: 16px;
            border: 1px solid #EADBCE;
            padding: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
          }
          .ord-paper-board {
            width: 100%;
            background: #845A3C;
            border-radius: 12px;
            padding: 10px 8px 8px;
            box-shadow: 0 6px 16px rgba(42, 24, 13, 0.2);
          }
          .ord-paper-clip {
            width: 32px;
            height: 8px;
            background: #C4B5A5;
            border-radius: 3px;
            margin: 0 auto 6px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25);
          }
          .ord-paper-sheet {
            background: #FFFDF9;
            border-radius: 6px;
            padding: 10px 8px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            border: 1px solid #EBE1D3;
          }
          .ord-paper-header {
            font-family: 'Outfit', serif;
            font-weight: 600;
            font-size: 10.5px;
            letter-spacing: 1.5px;
            text-align: center;
            color: #2A1C14;
            border-bottom: 1.5px solid #2A1C14;
            padding-bottom: 4px;
            margin-bottom: 7px;
          }
          .ord-paper-slot-title {
            font-size: 7.5px;
            font-weight: 700;
            color: #876039;
            letter-spacing: 0.6px;
            text-transform: uppercase;
            margin: 6px 0 3px;
          }
          .ord-paper-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 7.5px;
            color: #4A3E38;
            padding: 2.5px 0;
            border-bottom: 1px dashed #EDE4D8;
          }
          .ord-paper-row:last-child { border-bottom: none; }
          .ord-paper-row.struck span { text-decoration: line-through; color: #A89A90; }
          .ord-paper-row .err-tag { color: #DC2626; font-weight: 700; }

          /* 5 Pain Point Cards */
          .ord-points-list {
            display: flex;
            flex-direction: column;
            gap: 8px;
            justify-content: space-between;
          }
          .ord-point-card {
            background: #FFFFFF;
            border: 1px solid #FEE2E2;
            border-radius: 12px;
            padding: 9px 12px;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
          }
          .ord-point-card:hover {
            transform: translateX(2px);
            box-shadow: 0 4px 12px rgba(220, 38, 38, 0.08);
          }
          .ord-point-ico {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: #FEE2E2;
            color: #DC2626;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
          }
          .ord-point-ico svg { width: 15px; height: 15px; stroke: currentColor; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
          .ord-point-txt { display: flex; flex-direction: column; min-width: 0; }
          .ord-point-txt b { font-size: 13px; font-weight: 700; color: #21160F; line-height: 1.25; }
          .ord-point-txt span { font-size: 11px; color: #76675D; line-height: 1.3; }

          /* Right Card: 3 Workflow Steps */
          .ord-wf-steps {
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 6px;
          }
          .ord-wf-card {
            background: #FFFFFF;
            border: 1px solid rgba(135, 96, 57, 0.2);
            border-radius: 14px;
            padding: 12px 14px;
            display: flex;
            align-items: center;
            gap: 12px;
            box-shadow: 0 2px 8px rgba(135, 96, 57, 0.04);
            transition: transform 0.2s ease, border-color 0.2s ease;
          }
          .ord-wf-card:hover { transform: translateY(-2px); border-color: #876039; }
          .ord-wf-ico {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: #FBF6EE;
            color: #876039;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            border: 1px solid rgba(135, 96, 57, 0.18);
          }
          .ord-wf-ico svg { width: 18px; height: 18px; stroke: currentColor; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
          .ord-wf-txt { display: flex; flex-direction: column; min-width: 0; }
          .ord-wf-txt b { font-size: 13px; font-weight: 600; color: #21160F; line-height: 1.25; }
          .ord-wf-txt span { font-size: 11.5px; color: #76675D; line-height: 1.3; }
          .ord-wf-arrow { text-align: center; font-size: 15px; font-weight: 500; color: #876039; line-height: 1; }

          /* Right Card: Smartphone Live Order Pipeline Mockup */
          .ord-phone-visual {
            display: flex;
            align-items: center;
            justify-content: center;
          }
          .ord-phone-mockup {
            width: 100%;
            max-width: 224px;
            background: #1C1510;
            border-radius: 28px;
            padding: 7px;
            box-shadow: 0 16px 36px rgba(28, 20, 15, 0.28);
            border: 2px solid #362920;
          }
          .ord-phone-screen {
            background: #FFFFFF;
            border-radius: 22px;
            padding: 10px 9px 12px;
            overflow: hidden;
          }
          .ord-phone-island {
            width: 38px;
            height: 4px;
            background: #1C1510;
            border-radius: 4px;
            margin: 0 auto 6px;
          }
          .ord-phone-header { text-align: center; margin-bottom: 7px; }
          .ord-phone-title { font-family: 'Outfit', sans-serif; font-size: 13.5px; font-weight: 600; color: #21160F; line-height: 1.2; }
          .ord-phone-sub { font-size: 8px; color: #76675D; }
          .ord-phone-tabs {
            display: flex;
            gap: 3.5px;
            margin-bottom: 8px;
            justify-content: center;
          }
          .ord-tab-pill {
            font-size: 7.5px;
            font-weight: 700;
            padding: 2.5px 7px;
            border-radius: 12px;
            background: #FAF7F2;
            color: #6E6157;
            white-space: nowrap;
          }
          .ord-tab-active { background: #875A38; color: #FFFFFF; }

          .ord-live-list {
            display: flex;
            flex-direction: column;
            gap: 6px;
          }
          .ord-live-row {
            padding: 6px 7px;
            background: #FAF8F5;
            border: 1px solid #EFE8DE;
            border-radius: 9px;
            display: flex;
            flex-direction: column;
            gap: 3px;
          }
          .ord-lv-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 4px;
          }
          .ord-lv-name { font-size: 9.5px; font-weight: 700; color: #21160F; }
          .ord-lv-badge {
            font-size: 6.5px;
            font-weight: 700;
            padding: 1.5px 5px;
            border-radius: 4px;
          }
          .ord-lv-badge.prep { background: #FEF3C7; color: #B45309; }
          .ord-lv-badge.ready { background: #DCFCE7; color: #16A34A; }
          .ord-lv-badge.del { background: #DBEAFE; color: #1D4ED8; }
          .ord-lv-meta {
            display: flex;
            justify-content: space-between;
            font-size: 7.5px;
            color: #76675D;
          }
          .ord-lv-src { font-weight: 700; color: #876039; }

          .ord-bottom-cta {
            margin-top: 16px;
            display: flex;
            justify-content: center;
          }
          .ord-bottom-cta-badge {
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
          .ord-bottom-cta-badge svg { width: 14px; height: 14px; stroke: #FFFFFF; fill: none; stroke-width: 2; }

          @media (max-width: 1080px) {
            .ord-cmp-wrap { grid-template-columns: 1fr; gap: 36px; }
            .ord-cmp-center-arrow { display: none; }
          }
          @media (max-width: 640px) {
            .ord-split-body, .ord-cmp-digital .ord-split-body { grid-template-columns: 1fr; gap: 16px; }
            .ord-paper-visual { max-width: 260px; margin: 0 auto; }
          }
        </style>

        <div class="ord-cmp-wrap" data-aos="fade-up" data-aos-delay="100">
            <!-- Center Transition Arrow -->
            <div class="ord-cmp-center-arrow">
                <div class="ord-center-arrow-circle">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </div>
            </div>

            {{-- LEFT CARD: Without Geni Menu --}}
            <div class="ord-cmp-card ord-cmp-traditional">
                <div class="ord-cmp-header">
                    <div class="ord-badge-icon ord-badge-red">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </div>
                    <div>
                        <h3 class="ord-cmp-title text-red">Without Geni Menu</h3>
                        <p class="ord-cmp-subtitle">Paper KOTs, beeping tablets and kitchen confusion</p>
                    </div>
                </div>

                <div class="ord-split-body">
                    <!-- Left: Paper KOT Slips Clipboard -->
                    <div class="ord-paper-visual">
                        <div class="ord-paper-board">
                            <div class="ord-paper-clip"></div>
                            <div class="ord-paper-sheet">
                                <div class="ord-paper-header">ORDER SLIPS</div>

                                <div class="ord-paper-slot-title">Online Tablets</div>
                                <div class="ord-paper-row"><span>Swiggy #401</span><span class="err-tag">Beep!</span></div>
                                <div class="ord-paper-row"><span>Zomato #218</span><span class="err-tag">Missed</span></div>

                                <div class="ord-paper-slot-title">Kitchen Pass</div>
                                <div class="ord-paper-row struck"><span>T-05 KOT</span><b>Lost!</b></div>
                                <div class="ord-paper-row"><span>Edit #109</span><span class="err-tag">Wrong!</span></div>

                                <div class="ord-paper-slot-title">Counter</div>
                                <div class="ord-paper-row"><span>Takeaway</span><b>Waiting</b></div>
                            </div>
                        </div>
                    </div>

                    <!-- Right: 5 Pain Points -->
                    <div class="ord-points-list">
                        <div class="ord-point-card">
                            <div class="ord-point-ico">
                                <svg viewBox="0 0 24 24"><rect width="14" height="20" x="5" y="2" rx="2" ry="2"/><path d="M12 18h.01"/></svg>
                            </div>
                            <div class="ord-point-txt">
                                <b>3 Separate Beeping Tablets</b>
                                <span>Swiggy, Zomato &amp; website ringing at once</span>
                            </div>
                        </div>

                        <div class="ord-point-card">
                            <div class="ord-point-ico">
                                <svg viewBox="0 0 24 24"><path d="M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1Z"/></svg>
                            </div>
                            <div class="ord-point-txt">
                                <b>Handwritten KOTs Lost</b>
                                <span>Slips misplaced between waiter &amp; kitchen</span>
                            </div>
                        </div>

                        <div class="ord-point-card">
                            <div class="ord-point-ico">
                                <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                            </div>
                            <div class="ord-point-txt">
                                <b>No Prep Time Visibility</b>
                                <span>No idea how long orders sit in the kitchen</span>
                            </div>
                        </div>

                        <div class="ord-point-card">
                            <div class="ord-point-ico">
                                <svg viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/></svg>
                            </div>
                            <div class="ord-point-txt">
                                <b>Takeaway Counter Crowds</b>
                                <span>Guests waiting with zero pickup updates</span>
                            </div>
                        </div>

                        <div class="ord-point-card">
                            <div class="ord-point-ico">
                                <svg viewBox="0 0 24 24"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"/><path d="M12 9v4"/><path d="M12 17h.01"/></svg>
                            </div>
                            <div class="ord-point-txt">
                                <b>Confusing Mid-Flow Edits</b>
                                <span>Kitchen prepares outdated order versions</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- RIGHT CARD: With Geni Menu --}}
            <div class="ord-cmp-card ord-cmp-digital">
                <div class="ord-cmp-header">
                    <div class="ord-badge-icon ord-badge-brown">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                    </div>
                    <div>
                        <h3 class="ord-cmp-title text-brown">With Geni Menu</h3>
                        <p class="ord-cmp-subtitle">Unified Kanban pipeline, instant KOTs &amp; live alerts</p>
                    </div>
                </div>

                <div class="ord-split-body">
                    <!-- Left: 3 Connected Workflow Steps -->
                    <div class="ord-wf-steps">
                        <div class="ord-wf-card">
                            <div class="ord-wf-ico">
                                <svg viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>
                            </div>
                            <div class="ord-wf-txt">
                                <b>All Channels in One Board</b>
                                <span>Dine-in, takeaway, Swiggy &amp; Zomato unified</span>
                            </div>
                        </div>

                        <div class="ord-wf-arrow">&darr;</div>

                        <div class="ord-wf-card">
                            <div class="ord-wf-ico">
                                <svg viewBox="0 0 24 24"><path d="M6 13.87A4 4 0 0 1 7.41 6a5.11 5.11 0 0 1 1.05-1.54 5 5 0 0 1 7.08 0A5.11 5.11 0 0 1 16.59 6 4 4 0 0 1 18 13.87V21H6Z"/><line x1="6" x2="18" y1="17" y2="17"/></svg>
                            </div>
                            <div class="ord-wf-txt">
                                <b>Instant Digital KOT &amp; Timers</b>
                                <span>Live edits + amber SLA prep alerts</span>
                            </div>
                        </div>

                        <div class="ord-wf-arrow">&darr;</div>

                        <div class="ord-wf-card">
                            <div class="ord-wf-ico">
                                <svg viewBox="0 0 24 24"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/></svg>
                            </div>
                            <div class="ord-wf-txt">
                                <b>Auto-Alerts &amp; Mobile View</b>
                                <span>Ready SMS to guests + live manager phone</span>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Smartphone Live Order Pipeline Mockup -->
                    <div class="ord-phone-visual">
                        <div class="ord-phone-mockup">
                            <div class="ord-phone-screen">
                                <div class="ord-phone-island"></div>
                                <div class="ord-phone-header">
                                    <div class="ord-phone-title">Live Orders</div>
                                    <div class="ord-phone-sub">All channels in one pipeline</div>
                                </div>
                                <div class="ord-phone-tabs">
                                    <span class="ord-tab-pill ord-tab-active">All</span>
                                    <span class="ord-tab-pill">Prep</span>
                                    <span class="ord-tab-pill">Ready</span>
                                </div>
                                <div class="ord-live-list">
                                    <div class="ord-live-row">
                                        <div class="ord-lv-top">
                                            <span class="ord-lv-name">Order #1240</span>
                                            <span class="ord-lv-badge prep">Prep 6m</span>
                                        </div>
                                        <div class="ord-lv-meta">
                                            <span>3 Items &bull; ₹740</span>
                                            <span class="ord-lv-src">Table 04</span>
                                        </div>
                                    </div>

                                    <div class="ord-live-row">
                                        <div class="ord-lv-top">
                                            <span class="ord-lv-name">Order #1241</span>
                                            <span class="ord-lv-badge ready">Ready</span>
                                        </div>
                                        <div class="ord-lv-meta">
                                            <span>2 Items &bull; ₹310</span>
                                            <span class="ord-lv-src">Takeaway</span>
                                        </div>
                                    </div>

                                    <div class="ord-live-row">
                                        <div class="ord-lv-top">
                                            <span class="ord-lv-name">Order #1242</span>
                                            <span class="ord-lv-badge del">Dispatched</span>
                                        </div>
                                        <div class="ord-lv-meta">
                                            <span>4 Items &bull; ₹920</span>
                                            <span class="ord-lv-src">Zomato</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ord-bottom-cta">
                    <div class="ord-bottom-cta-badge">
                        <svg viewBox="0 0 24 24"><path d="m12 3-1.9 5.8a2 2 0 0 1-1.3 1.3L3 12l5.8 1.9a2 2 0 0 1 1.3 1.3L12 21l1.9-5.8a2 2 0 0 1 1.3-1.3L21 12l-5.8-1.9a2 2 0 0 1-1.3-1.3L12 3Z"/></svg>
                        <span>One Screen, One Team, One Workflow!</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════
     FAQ ACCORDION
═══════════════════════════════════════════════════════════════ --}}
<section class="section">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <div class="sec-eyebrow">FAQ</div>
            <h2>Questions about <span class="italic-serif">Order Management</span></h2>
        </div>

        <div class="faq-list">
            <div class="faq-item" data-aos="fade-up" data-aos-delay="0">
                <button class="faq-q" onclick="toggleFaq(this)">
                    Does Geni Menu connect directly with Swiggy and Zomato?
                    <div class="faq-chevron">▾</div>
                </button>
                <div class="faq-a">
                    Yes. Geni Menu integrates with Swiggy and Zomato via their official merchant APIs. When a customer places an order on either platform, it appears in your Geni Order Board within seconds — no manual entry, no separate tablet to monitor. You manage acceptance, rejection, and prep status directly from the board.
                </div>
            </div>

            <div class="faq-item" data-aos="fade-up" data-aos-delay="60">
                <button class="faq-q" onclick="toggleFaq(this)">
                    Can I edit an order after the KOT has been sent to the kitchen?
                    <div class="faq-chevron">▾</div>
                </button>
                <div class="faq-a">
                    Absolutely. You can add items, remove items, or substitute ingredients even after the KOT has been dispatched. The kitchen screen (KDS) or kitchen printer receives an instant update notification — clearly flagged as a modification so nothing gets confused with the original ticket.
                </div>
            </div>

            <div class="faq-item" data-aos="fade-up" data-aos-delay="120">
                <button class="faq-q" onclick="toggleFaq(this)">
                    How do prep timers work, and can I set different SLAs per dish category?
                    <div class="faq-chevron">▾</div>
                </button>
                <div class="faq-a">
                    Each order type (dine-in, takeaway, delivery) can have its own SLA target — for example, 15 minutes for dine-in and 12 minutes for delivery. When an order is accepted, the timer starts. At 70% elapsed, the card turns amber. At 100%, it turns red and a sound alert fires. You can also set category-level timers — so a dessert order has a shorter SLA than a main course.
                </div>
            </div>

            <div class="faq-item" data-aos="fade-up" data-aos-delay="180">
                <button class="faq-q" onclick="toggleFaq(this)">
                    What devices can staff use to manage the order board?
                    <div class="faq-chevron">▾</div>
                </button>
                <div class="faq-a">
                    The Geni Order Board runs in any modern browser — Chrome, Safari, Edge — on tablets, phones, and desktops. Most restaurants use a wall-mounted tablet in the kitchen and a phone for the floor manager. No dedicated hardware is required. The interface is fully touch-optimised for smooth drag-and-drop on tablets.
                </div>
            </div>

            <div class="faq-item" data-aos="fade-up" data-aos-delay="240">
                <button class="faq-q" onclick="toggleFaq(this)">
                    What happens if the internet goes down mid-service?
                    <div class="faq-chevron">▾</div>
                </button>
                <div class="faq-a">
                    Geni Menu has an offline mode for core order functions. Orders already in the board remain visible and editable. New dine-in orders placed through the waiter app queue locally and sync the moment connectivity is restored. Online aggregator orders (Swiggy, Zomato) will auto-accept with a default message when offline, and sync to the board when connectivity returns.
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════
     CROSS LINKS — RELATED FEATURES
═══════════════════════════════════════════════════════════════ --}}
<div class="cross-links" style="background:#fff;border-top:1px solid var(--line);border-bottom:1px solid var(--line);">
    <div class="container">
        <div style="text-align:center;margin-bottom:36px;" data-aos="fade-up">
            <p style="font-size:13px;font-weight:700;color:var(--ink-faint);text-transform:uppercase;letter-spacing:1.2px;">Related Features</p>
            <h3 style="font-size:24px;font-weight:800;color:var(--ink);margin-top:8px;">Works best with these tools</h3>
        </div>
        <div class="cross-links-grid">
            <a href="{{ route('features.kot-management') }}" class="cross-card" data-aos="fade-up" data-aos-delay="0">
                <div class="cross-icon"><svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><polyline points="6 9 6 2 18 2 18 9"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect width="12" height="8" x="6" y="14"/></svg>️</div>
                <div class="cross-text">
                    <h4>KOT Management</h4>
                    <p>Auto-print or display kitchen tickets the moment an order is accepted on the board.</p>
                </div>
            </a>
            <a href="{{ route('features.pos-management') }}" class="cross-card" data-aos="fade-up" data-aos-delay="80">
                <div class="cross-icon"><svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1Z"/><path d="M16 8h-6"/><path d="M16 12h-6"/><path d="M12 16h-2"/></svg></div>
                <div class="cross-text">
                    <h4>POS & Billing</h4>
                    <p>When an order is marked complete, billing flows straight into the POS — no double entry.</p>
                </div>
            </a>
            <a href="{{ route('features.table-management') }}" class="cross-card" data-aos="fade-up" data-aos-delay="160">
                <div class="cross-icon"><svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><polygon points="3 6 9 3 15 6 21 3 21 18 15 21 9 18 3 21"/><line x1="9" x2="9" y1="3" y2="18"/><line x1="15" x2="15" y1="6" y2="21"/></svg>️</div>
                <div class="cross-text">
                    <h4>Table Management</h4>
                    <p>See which tables have active orders on the floor plan, and link order status to table state.</p>
                </div>
            </a>
        </div>
    </div>
</div>

{{-- ═══════════════════════════════════════════════════════════════
     FINAL CTA SECTION
═══════════════════════════════════════════════════════════════ --}}
<section class="cta-section">
    <div class="container">
        <div class="cta-inner" data-aos="fade-up">
            <div class="sec-eyebrow" style="background:rgba(255,255,255,0.12);border-color:rgba(255,255,255,0.2);color:#FDE68A;margin-bottom:24px;">Get Started Today</div>
            <h2>Stop losing orders to<br><span class="italic-serif" style="color:#F4EFEA;">scattered systems</span></h2>
            <p>Join hundreds of restaurants that run their entire order pipeline — dine-in, takeaway and delivery — on one live board with Geni Menu.</p>
            <div class="cta-btns">
                <a href="{{ route('restaurant_signup') }}" class="btn-white">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>
                    Start Free — No Card Needed
                </a>
                <a href="{{ route('restaurant_signup') }}" class="btn-ghost">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
                    Book a Live Demo
                </a>
            </div>
            <div class="cta-trust">
                <div class="cta-trust-item">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                    Free 14-day trial
                </div>
                <div class="cta-trust-item">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                    No credit card required
                </div>
                <div class="cta-trust-item">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                    Live onboarding support
                </div>
                <div class="cta-trust-item">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                    Cancel anytime
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════
     SCRIPTS — AOS + FAQ
═══════════════════════════════════════════════════════════════ --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
    // AOS Init
    AOS.init({
        once: true,
        offset: 60,
        duration: 650,
        easing: 'ease-out-cubic',
    });

    // FAQ Accordion
    function toggleFaq(btn) {
        const item = btn.closest('.faq-item');
        const isOpen = item.classList.contains('open');

        // Close all
        document.querySelectorAll('.faq-item.open').forEach(function(el) {
            el.classList.remove('open');
        });

        // Open clicked (if it wasn't already open)
        if (!isOpen) {
            item.classList.add('open');
        }
    }
</script>

@endsection
