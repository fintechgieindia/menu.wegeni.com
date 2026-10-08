<?php
$meta = [
    'title'       => 'Table Management — Interactive Floor Plan & Seating | Geni Menu',
    'description' => 'Manage your restaurant floor plan in real-time. Track table status, monitor turn times, assign zones, and seat guests seamlessly with Geni Menu\'s live Table Management.',
    'keywords'    => 'restaurant table management, floor plan software, live seating tracker, table turn time, zone management, restaurant POS table status, Geni Menu',
];
?>
@extends('layouts.frontend-master')

@section('content')

{{-- ============================================================
     FONTS & AOS
============================================================ --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@1,9..144,400;1,9..144,600&family=Outfit:wght@400;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">

<style>
/* ============================================================
   CSS CUSTOM PROPERTIES
============================================================ */
:root {
    --bg-page:        #FAF6EF;
    --bg-card:        #FFFFFF;
    --bg-surface:     #F5EFEB;
    --ink:            #21160F;
    --ink-soft:       #63584E;
    --ink-faint:      #8E8277;
    --coffee:         #876039;
    --coffee-dark:    #6F4E2D;
    --coffee-light:   #F4EFEA;
    --coffee-border:  rgba(135,96,57,0.16);
    --green:          #15803D;
    --green-bg:       #DCFCE7;
    --amber:          #B45309;
    --amber-bg:       #FEF3C7;
    --red:            #DC2626;
    --red-bg:         #FEE2E2;
    --gray:           #6B7280;
    --gray-bg:        #F3F4F6;
    --line:           rgba(135,96,57,0.12);
}

/* ============================================================
   GLOBAL RESETS & BASE
============================================================ */
.tm-page * { box-sizing: border-box; margin: 0; padding: 0; }
.tm-page {
    font-family: 'Plus Jakarta Sans', sans-serif;
    background: var(--bg-page);
    color: var(--ink-soft);
    line-height: 1.65;
}
.tm-page h1, .tm-page h2, .tm-page h3, .tm-page h4, .tm-page h5 {
    font-family: 'Outfit', sans-serif;
    font-weight: 700;
    color: var(--ink);
    letter-spacing: -0.025em;
    line-height: 1.18;
}
.tm-page .italic-serif {
    font-family: 'Fraunces', Georgia, serif;
    font-style: italic;
    font-weight: 600;
    color: var(--coffee);
}
.tm-container { max-width: 1240px; margin: 0 auto; padding: 0 24px; }

/* ============================================================
   BREADCRUMB
============================================================ */
.tm-breadcrumb {
    background: var(--bg-card);
    border-bottom: 1px solid var(--line);
    padding: 14px 0;
}
.tm-breadcrumb__inner {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 13px;
    color: var(--ink-faint);
}
.tm-breadcrumb__inner a {
    color: var(--coffee);
    text-decoration: none;
    font-weight: 600;
    transition: opacity .2s;
}
.tm-breadcrumb__inner a:hover { opacity: .75; }
.tm-breadcrumb__sep { color: var(--line); font-size: 16px; }

/* ============================================================
   EYEBROW
============================================================ */
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

/* ============================================================
   BUTTONS
============================================================ */
.btn-primary {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: var(--coffee);
    color: #fff;
    border-radius: 9999px;
    padding: 13px 28px;
    font-family: 'Outfit', sans-serif;
    font-weight: 700;
    font-size: 15px;
    text-decoration: none;
    border: none;
    cursor: pointer;
    transition: background .2s, transform .15s;
}
.btn-primary:hover { background: var(--coffee-dark); transform: translateY(-1px); color: #fff; }
.btn-outline {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: #fff;
    color: var(--coffee);
    border: 1px solid rgba(135,96,57,0.25);
    border-radius: 9999px;
    padding: 12px 26px;
    font-family: 'Outfit', sans-serif;
    font-weight: 700;
    font-size: 15px;
    text-decoration: none;
    cursor: pointer;
    transition: background .2s, border-color .2s, transform .15s;
}
.btn-outline:hover { background: var(--coffee-light); border-color: var(--coffee); transform: translateY(-1px); color: var(--coffee); }

/* ============================================================
   HERO
============================================================ */
.tm-hero {
    background: var(--bg-page);
    padding: 80px 0 0;
    overflow: hidden;
    position: relative;
}
.tm-hero::before {
    content: '';
    position: absolute;
    top: -120px; left: -200px;
    width: 700px; height: 700px;
    background: radial-gradient(circle, rgba(135,96,57,0.07) 0%, transparent 70%);
    pointer-events: none;
}
.tm-hero__inner {
    text-align: center;
    max-width: 760px;
    margin: 0 auto;
    padding: 0 24px;
}
.tm-hero__h1 {
    font-size: clamp(36px, 5vw, 60px);
    margin-bottom: 22px;
}
.tm-hero__sub {
    font-size: 18px;
    color: var(--ink-soft);
    line-height: 1.7;
    margin-bottom: 36px;
    max-width: 580px;
    margin-left: auto;
    margin-right: auto;
}
.tm-hero__ctas {
    display: flex;
    justify-content: center;
    gap: 14px;
    flex-wrap: wrap;
    margin-bottom: 44px;
}
.tm-hero__badges {
    display: flex;
    justify-content: center;
    gap: 20px;
    flex-wrap: wrap;
    margin-bottom: 64px;
}
.tm-hero__badge {
    display: flex;
    align-items: center;
    gap: 7px;
    font-size: 13px;
    font-weight: 600;
    color: var(--ink-soft);
}
.tm-hero__badge-icon {
    width: 22px; height: 22px;
    background: var(--green-bg);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: 12px;
}

/* ============================================================
   DEVICE WINDOW (hero mockup)
============================================================ */
.device-window {
    background: #fff;
    border-radius: 20px;
    border: 1px solid var(--line);
    box-shadow: 0 32px 80px rgba(33,22,15,0.13), 0 4px 16px rgba(33,22,15,0.05);
    overflow: hidden;
    max-width: 1060px;
    margin: 0 auto;
    position: relative;
}
.device-window__bar {
    background: #F7F3EF;
    border-bottom: 1px solid var(--line);
    padding: 12px 18px;
    display: flex;
    align-items: center;
    gap: 12px;
}
.device-window__dots { display: flex; gap: 6px; }
.device-window__dot {
    width: 11px; height: 11px;
    border-radius: 50%;
}
.device-window__dot--red   { background: #FC5F57; }
.device-window__dot--amber { background: #FDBC2C; }
.device-window__dot--green { background: #33C748; }
.device-window__url {
    flex: 1;
    background: #EDEBE6;
    border-radius: 6px;
    padding: 5px 14px;
    font-size: 12px;
    color: var(--ink-faint);
    font-family: 'Plus Jakarta Sans', sans-serif;
}
.device-window__pill {
    font-size: 11px;
    font-weight: 700;
    color: var(--green);
    background: var(--green-bg);
    border-radius: 9999px;
    padding: 3px 10px;
    display: flex; align-items: center; gap: 4px;
}
.device-window__pill::before { content: '●'; font-size: 8px; }

/* ============================================================
   FLOOR PLAN MOCKUP
============================================================ */
.floorplan-ui {
    background: #1C1208;
    min-height: 520px;
    padding: 0;
    display: flex;
    flex-direction: column;
}
.floorplan-ui__topbar {
    background: #261A0E;
    border-bottom: 1px solid rgba(255,255,255,0.07);
    padding: 14px 22px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
    flex-wrap: wrap;
}
.floorplan-ui__title {
    font-family: 'Outfit', sans-serif;
    font-weight: 700;
    color: #FAF6EF;
    font-size: 16px;
    display: flex;
    align-items: center;
    gap: 10px;
}
.floorplan-ui__title-icon {
    width: 30px; height: 30px;
    background: var(--coffee);
    border-radius: 8px;
    display: flex; align-items: center; justify-content: center;
    font-size: 15px;
}
.floorplan-ui__zone-tabs {
    display: flex;
    gap: 6px;
}
.floorplan-ui__zone-tab {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 12px;
    font-weight: 600;
    padding: 5px 14px;
    border-radius: 9999px;
    cursor: pointer;
    color: rgba(250,246,239,0.55);
    border: 1px solid rgba(255,255,255,0.1);
    background: transparent;
    transition: all .2s;
}
.floorplan-ui__zone-tab--active {
    background: var(--coffee);
    color: #fff;
    border-color: var(--coffee);
}
.floorplan-ui__legend {
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
}
.floorplan-ui__legend-item {
    display: flex;
    align-items: center;
    gap: 5px;
    font-size: 11px;
    color: rgba(250,246,239,0.6);
    font-family: 'Plus Jakarta Sans', sans-serif;
}
.floorplan-ui__legend-dot {
    width: 9px; height: 9px;
    border-radius: 50%;
}
.floorplan-ui__legend-dot--green  { background: #22C55E; }
.floorplan-ui__legend-dot--coffee { background: var(--coffee); }
.floorplan-ui__legend-dot--amber  { background: #F59E0B; }
.floorplan-ui__legend-dot--gray   { background: #6B7280; }

/* Table grid */
.floorplan-ui__body {
    padding: 22px;
    flex: 1;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 14px;
}
@media (max-width: 640px) {
    .floorplan-ui__body { grid-template-columns: repeat(2, 1fr); }
}
.table-card {
    background: #2A1D10;
    border-radius: 14px;
    padding: 14px 14px 12px;
    border: 1px solid rgba(255,255,255,0.07);
    display: flex;
    flex-direction: column;
    gap: 8px;
    position: relative;
    transition: transform .2s;
}
.table-card:hover { transform: translateY(-2px); }
.table-card__header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
}
.table-card__num {
    font-family: 'Outfit', sans-serif;
    font-weight: 700;
    font-size: 16px;
    color: #FAF6EF;
}
.table-card__zone-badge {
    font-size: 10px;
    font-weight: 600;
    padding: 2px 8px;
    border-radius: 9999px;
    text-transform: uppercase;
    letter-spacing: .5px;
}
.table-card__status-bar {
    height: 3px;
    border-radius: 9999px;
    margin: 2px 0;
}
.table-card__status-bar--available { background: #22C55E; }
.table-card__status-bar--occupied  { background: var(--coffee); }
.table-card__status-bar--reserved  { background: #F59E0B; }
.table-card__status-bar--cleaning  { background: #6B7280; }

.badge-available { background: rgba(34,197,94,0.15);  color: #22C55E; }
.badge-occupied  { background: rgba(135,96,57,0.25);  color: #D4956A; }
.badge-reserved  { background: rgba(245,158,11,0.15); color: #F59E0B; }
.badge-cleaning  { background: rgba(107,114,128,0.2); color: #9CA3AF; }

.table-card__meta {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4px;
}
.table-card__meta-item {
    font-size: 10.5px;
    color: rgba(250,246,239,0.5);
    display: flex;
    flex-direction: column;
    gap: 1px;
}
.table-card__meta-val {
    font-family: 'Outfit', sans-serif;
    font-weight: 700;
    font-size: 13px;
    color: rgba(250,246,239,0.9);
}
.table-card__guests {
    display: flex;
    gap: 3px;
    flex-wrap: wrap;
}
.table-card__guest-dot {
    width: 18px; height: 18px;
    border-radius: 50%;
    font-size: 9px;
    font-weight: 700;
    display: flex; align-items: center; justify-content: center;
    color: #fff;
}

/* Telemetry bar */
.floorplan-ui__telemetry {
    background: #261A0E;
    border-top: 1px solid rgba(255,255,255,0.07);
    padding: 12px 22px;
    display: flex;
    gap: 28px;
    align-items: center;
    flex-wrap: wrap;
}
.floorplan-ui__tele-item {
    display: flex;
    flex-direction: column;
    gap: 1px;
}
.floorplan-ui__tele-label {
    font-size: 10px;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: rgba(250,246,239,0.4);
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-weight: 600;
}
.floorplan-ui__tele-val {
    font-family: 'Outfit', sans-serif;
    font-weight: 700;
    font-size: 20px;
    color: #FAF6EF;
}
.floorplan-ui__tele-val--green  { color: #22C55E; }
.floorplan-ui__tele-val--amber  { color: #F59E0B; }
.floorplan-ui__tele-val--coffee { color: #D4956A; }
.floorplan-ui__occupancy-bar {
    flex: 1;
    min-width: 120px;
}
.floorplan-ui__occ-bar-track {
    height: 7px;
    background: rgba(255,255,255,0.08);
    border-radius: 9999px;
    overflow: hidden;
    margin-top: 6px;
}
.floorplan-ui__occ-bar-fill {
    height: 100%;
    background: linear-gradient(90deg, var(--coffee), #D4956A);
    border-radius: 9999px;
}

/* ============================================================
   VALUE STRIP
============================================================ */
.tm-value {
    padding: 0 0 0;
    background: var(--bg-page);
}
.tm-value__strip {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 0;
    background: #fff;
    border: 1px solid var(--line);
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 8px 30px rgba(33,22,15,0.05);
    margin-top: -2px;
}
@media (max-width: 768px) {
    .tm-value__strip { grid-template-columns: repeat(2,1fr); }
}
@media (max-width: 480px) {
    .tm-value__strip { grid-template-columns: 1fr; }
}
.tm-value__item {
    padding: 32px 28px;
    border-right: 1px solid var(--line);
    display: flex;
    flex-direction: column;
    gap: 10px;
}
.tm-value__item:last-child { border-right: none; }
.tm-value__icon {
    width: 44px; height: 44px;
    background: var(--coffee-light);
    border-radius: 12px;
    display: flex; align-items: center; justify-content: center;
    font-size: 22px;
}
.tm-value__title {
    font-family: 'Outfit', sans-serif;
    font-weight: 700;
    font-size: 15px;
    color: var(--ink);
}
.tm-value__desc {
    font-size: 13.5px;
    color: var(--ink-faint);
    line-height: 1.55;
}

/* ============================================================
   DEEP FEATURE SHOWCASE (Floor Plan Workflow)
============================================================ */
.tm-showcase {
    padding: 100px 0;
    background: var(--bg-surface);
    border-top: 1px solid var(--line);
    border-bottom: 1px solid var(--line);
}
.tm-showcase__inner {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 64px;
    align-items: center;
}
@media (max-width: 900px) {
    .tm-showcase__inner { grid-template-columns: 1fr; gap: 40px; }
}
.tm-showcase__copy h2 {
    font-size: clamp(28px, 3.5vw, 42px);
    margin-bottom: 18px;
}
.tm-showcase__copy p {
    font-size: 16px;
    color: var(--ink-soft);
    line-height: 1.75;
    margin-bottom: 16px;
}
.tm-showcase__copy ul {
    list-style: none;
    display: flex;
    flex-direction: column;
    gap: 12px;
    margin-bottom: 32px;
}
.tm-showcase__copy li {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    font-size: 15px;
    color: var(--ink-soft);
}
.tm-showcase__copy li .check {
    width: 22px; height: 22px;
    background: var(--green-bg);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: 12px;
    color: var(--green);
    flex-shrink: 0;
    margin-top: 2px;
}
.tm-showcase__visual {
    background: #fff;
    border-radius: 20px;
    border: 1px solid var(--line);
    box-shadow: 0 16px 48px rgba(33,22,15,0.08);
    overflow: hidden;
}
.tm-showcase__visual-header {
    background: var(--coffee-light);
    border-bottom: 1px solid var(--line);
    padding: 14px 18px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.tm-showcase__visual-title {
    font-family: 'Outfit', sans-serif;
    font-weight: 700;
    font-size: 13px;
    color: var(--ink);
    display: flex;
    align-items: center;
    gap: 8px;
}
.tm-showcase__visual-body {
    padding: 18px;
}
.zone-row {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 14px;
    background: var(--bg-surface);
    border-radius: 12px;
    margin-bottom: 10px;
    border: 1px solid var(--line);
}
.zone-row__icon {
    width: 36px; height: 36px;
    border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-size: 18px;
    flex-shrink: 0;
}
.zone-row__name {
    flex: 1;
}
.zone-row__name-title {
    font-family: 'Outfit', sans-serif;
    font-weight: 700;
    font-size: 13px;
    color: var(--ink);
}
.zone-row__name-sub {
    font-size: 11px;
    color: var(--ink-faint);
}
.zone-row__pills {
    display: flex;
    gap: 5px;
}
.zone-pill {
    font-size: 10px;
    font-weight: 700;
    padding: 3px 8px;
    border-radius: 9999px;
}
.zone-pill--green  { background: var(--green-bg);  color: var(--green); }
.zone-pill--coffee { background: rgba(135,96,57,0.12); color: var(--coffee); }
.zone-pill--amber  { background: var(--amber-bg);  color: var(--amber); }
.zone-pill--gray   { background: var(--gray-bg);   color: var(--gray); }

/* ============================================================
   HOW IT WORKS
============================================================ */
.tm-howitworks {
    padding: 100px 0;
    background: var(--bg-page);
}
.tm-howitworks__header {
    text-align: center;
    max-width: 600px;
    margin: 0 auto 60px;
}
.tm-howitworks__header h2 { font-size: clamp(28px, 3.5vw, 42px); margin-bottom: 14px; }
.tm-howitworks__header p { font-size: 16px; color: var(--ink-soft); }
.tm-howitworks__steps {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 24px;
    position: relative;
}
@media (max-width: 900px) {
    .tm-howitworks__steps { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 500px) {
    .tm-howitworks__steps { grid-template-columns: 1fr; }
}
.tm-howitworks__step {
    background: #fff;
    border-radius: 20px;
    border: 1px solid var(--line);
    box-shadow: 0 8px 24px rgba(33,22,15,0.05);
    padding: 32px 26px;
    position: relative;
}
.tm-howitworks__step-num {
    width: 44px; height: 44px;
    background: var(--coffee);
    border-radius: 12px;
    display: flex; align-items: center; justify-content: center;
    font-family: 'Outfit', sans-serif;
    font-weight: 800;
    font-size: 18px;
    color: #fff;
    margin-bottom: 20px;
}
.tm-howitworks__step h3 {
    font-size: 17px;
    margin-bottom: 10px;
    color: var(--ink);
}
.tm-howitworks__step p {
    font-size: 14px;
    color: var(--ink-soft);
    line-height: 1.65;
}
.tm-howitworks__step-icon {
    position: absolute;
    top: 26px; right: 22px;
    font-size: 28px;
    opacity: .18;
}
.tm-howitworks__connector {
    display: none;
}

/* ============================================================
   FEATURE GRID
============================================================ */
.tm-features {
    padding: 100px 0;
    background: var(--bg-surface);
    border-top: 1px solid var(--line);
    border-bottom: 1px solid var(--line);
}
.tm-features__header {
    text-align: center;
    max-width: 600px;
    margin: 0 auto 60px;
}
.tm-features__header h2 { font-size: clamp(28px, 3.5vw, 42px); margin-bottom: 14px; }
.tm-features__header p { font-size: 16px; color: var(--ink-soft); }
.tm-features__grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 22px;
}
@media (max-width: 900px) {
    .tm-features__grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 540px) {
    .tm-features__grid { grid-template-columns: 1fr; }
}
.feat-card {
    background: var(--bg-card);
    border-radius: 20px;
    border: 1px solid var(--line);
    box-shadow: 0 8px 28px rgba(33,22,15,0.05);
    padding: 32px 28px;
    transition: transform .2s, box-shadow .2s;
}
.feat-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 16px 40px rgba(33,22,15,0.09);
}
.feat-card__icon {
    width: 50px; height: 50px;
    background: var(--coffee-light);
    border-radius: 14px;
    display: flex; align-items: center; justify-content: center;
    font-size: 24px;
    margin-bottom: 18px;
}
.feat-card h3 {
    font-size: 18px;
    margin-bottom: 10px;
    color: var(--ink);
}
.feat-card p {
    font-size: 14.5px;
    color: var(--ink-soft);
    line-height: 1.65;
}

/* ============================================================
   METRICS STRIP
============================================================ */
.tm-metrics {
    padding: 80px 0;
    background: #21160F;
}
.tm-metrics__inner {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 24px;
}
@media (max-width: 768px) {
    .tm-metrics__inner { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 420px) {
    .tm-metrics__inner { grid-template-columns: 1fr; }
}
.tm-metric {
    text-align: center;
    padding: 32px 20px;
    background: rgba(255,255,255,0.04);
    border-radius: 20px;
    border: 1px solid rgba(255,255,255,0.08);
}
.tm-metric__num {
    font-family: 'Outfit', sans-serif;
    font-weight: 800;
    font-size: 46px;
    letter-spacing: -0.03em;
    color: #D4956A;
    line-height: 1;
    margin-bottom: 10px;
}
.tm-metric__label {
    font-size: 14px;
    color: rgba(250,246,239,0.6);
    line-height: 1.5;
}
.tm-metric__sub {
    font-size: 12px;
    color: rgba(250,246,239,0.35);
    margin-top: 4px;
}

/* ============================================================
   COMPARE SECTION
============================================================ */
.tm-compare {
    padding: 100px 0;
    background: var(--bg-page);
}
.tm-compare__header {
    text-align: center;
    max-width: 580px;
    margin: 0 auto 60px;
}
.tm-compare__header h2 { font-size: clamp(28px, 3.5vw, 42px); margin-bottom: 14px; }
.tm-compare__header p { font-size: 16px; color: var(--ink-soft); }
.tm-compare__grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 24px;
}
@media (max-width: 720px) {
    .tm-compare__grid { grid-template-columns: 1fr; }
}
.compare-card {
    border-radius: 22px;
    padding: 36px 32px;
    border: 1px solid var(--line);
}
.compare-card--old {
    background: #FEF2F2;
    border-color: rgba(220,38,38,0.14);
}
.compare-card--new {
    background: linear-gradient(135deg, var(--coffee-light) 0%, #fff 100%);
    border-color: var(--coffee-border);
    box-shadow: 0 16px 48px rgba(135,96,57,0.10);
}
.compare-card__label {
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 1.4px;
    text-transform: uppercase;
    margin-bottom: 18px;
    display: flex;
    align-items: center;
    gap: 8px;
}
.compare-card--old .compare-card__label { color: var(--red); }
.compare-card--new .compare-card__label { color: var(--coffee); }
.compare-card__label-icon {
    width: 26px; height: 26px;
    border-radius: 8px;
    display: flex; align-items: center; justify-content: center;
    font-size: 14px;
}
.compare-card--old .compare-card__label-icon { background: var(--red-bg); }
.compare-card--new .compare-card__label-icon { background: var(--coffee-light); }
.compare-card h3 {
    font-size: 20px;
    margin-bottom: 22px;
}
.compare-card--old h3 { color: #991B1B; }
.compare-card--new h3 { color: var(--ink); }
.compare-list { list-style: none; display: flex; flex-direction: column; gap: 12px; }
.compare-list li {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    font-size: 14.5px;
    line-height: 1.55;
}
.compare-card--old .compare-list li { color: #7F1D1D; }
.compare-card--new .compare-list li { color: var(--ink-soft); }
.compare-list__marker {
    width: 20px; height: 20px;
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: 10px;
    flex-shrink: 0;
    margin-top: 2px;
}
.compare-card--old .compare-list__marker { background: var(--red-bg); color: var(--red); }
.compare-card--new .compare-list__marker { background: var(--green-bg); color: var(--green); }

/* ============================================================
   FAQ
============================================================ */
.tm-faq {
    padding: 100px 0;
    background: var(--bg-surface);
    border-top: 1px solid var(--line);
    border-bottom: 1px solid var(--line);
}
.tm-faq__header {
    text-align: center;
    max-width: 560px;
    margin: 0 auto 52px;
}
.tm-faq__header h2 { font-size: clamp(28px, 3.5vw, 38px); margin-bottom: 12px; }
.tm-faq__header p { font-size: 16px; color: var(--ink-soft); }
.faq-list {
    max-width: 760px;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    gap: 14px;
}
.faq-item {
    background: var(--bg-card);
    border-radius: 16px;
    border: 1px solid var(--line);
    overflow: hidden;
    transition: box-shadow .2s;
}
.faq-item.open { box-shadow: 0 8px 28px rgba(135,96,57,0.09); }
.faq-question {
    padding: 22px 24px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
    cursor: pointer;
    font-family: 'Outfit', sans-serif;
    font-weight: 700;
    font-size: 16px;
    color: var(--ink);
    user-select: none;
    -webkit-user-select: none;
}
.faq-question:hover { color: var(--coffee); }
.faq-chevron {
    width: 28px; height: 28px;
    background: var(--coffee-light);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
    font-size: 13px;
    color: var(--coffee);
    transition: transform .3s;
}
.faq-item.open .faq-chevron { transform: rotate(180deg); }
.faq-answer {
    display: none;
    padding: 0 24px 22px;
    font-size: 15px;
    color: var(--ink-soft);
    line-height: 1.75;
}
.faq-item.open .faq-answer { display: block; }

/* ============================================================
   CROSS-LINKS
============================================================ */
.tm-crosslinks {
    padding: 60px 0;
    background: var(--bg-page);
}
.tm-crosslinks__header {
    text-align: center;
    margin-bottom: 36px;
}
.tm-crosslinks__header h3 {
    font-size: 22px;
    color: var(--ink);
    margin-bottom: 8px;
}
.tm-crosslinks__header p { font-size: 15px; color: var(--ink-faint); }
.tm-crosslinks__row {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 18px;
}
@media (max-width: 700px) {
    .tm-crosslinks__row { grid-template-columns: 1fr; }
}
.crosslink-card {
    background: #fff;
    border-radius: 18px;
    border: 1px solid var(--line);
    padding: 24px 22px;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 16px;
    transition: transform .2s, box-shadow .2s;
}
.crosslink-card:hover { transform: translateY(-2px); box-shadow: 0 8px 28px rgba(33,22,15,0.07); }
.crosslink-card__icon {
    width: 44px; height: 44px;
    background: var(--coffee-light);
    border-radius: 12px;
    display: flex; align-items: center; justify-content: center;
    font-size: 22px;
    flex-shrink: 0;
}
.crosslink-card__text {}
.crosslink-card__title {
    font-family: 'Outfit', sans-serif;
    font-weight: 700;
    font-size: 14px;
    color: var(--ink);
    margin-bottom: 3px;
}
.crosslink-card__desc { font-size: 12.5px; color: var(--ink-faint); }
.crosslink-card__arrow { margin-left: auto; color: var(--coffee); font-size: 18px; }

/* ============================================================
   FINAL CTA
============================================================ */
.tm-cta {
    padding: 100px 0;
    background: #21160F;
    position: relative;
    overflow: hidden;
}
.tm-cta::before {
    content: '';
    position: absolute;
    top: -100px; right: -100px;
    width: 500px; height: 500px;
    background: radial-gradient(circle, rgba(135,96,57,0.18) 0%, transparent 65%);
    pointer-events: none;
}
.tm-cta::after {
    content: '';
    position: absolute;
    bottom: -80px; left: -80px;
    width: 380px; height: 380px;
    background: radial-gradient(circle, rgba(135,96,57,0.12) 0%, transparent 65%);
    pointer-events: none;
}
.tm-cta__inner {
    text-align: center;
    position: relative;
    z-index: 1;
}
.tm-cta__eyebrow {
    display: inline-block;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 1.6px;
    text-transform: uppercase;
    color: #D4956A;
    background: rgba(135,96,57,0.15);
    border: 1px solid rgba(135,96,57,0.3);
    padding: 6px 16px;
    border-radius: 9999px;
    margin-bottom: 24px;
}
.tm-cta__h2 {
    font-size: clamp(30px, 4vw, 52px);
    color: #FAF6EF;
    margin-bottom: 18px;
    max-width: 680px;
    margin-left: auto;
    margin-right: auto;
}
.tm-cta__h2 .italic-serif { color: #D4956A; }
.tm-cta__sub {
    font-size: 17px;
    color: rgba(250,246,239,0.6);
    margin-bottom: 40px;
    max-width: 500px;
    margin-left: auto;
    margin-right: auto;
}
.tm-cta__btns {
    display: flex;
    justify-content: center;
    gap: 14px;
    flex-wrap: wrap;
    margin-bottom: 36px;
}
.btn-primary--light {
    background: var(--coffee);
    color: #fff;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    border-radius: 9999px;
    padding: 13px 28px;
    font-family: 'Outfit', sans-serif;
    font-weight: 700;
    font-size: 15px;
    text-decoration: none;
    transition: background .2s, transform .15s;
}
.btn-primary--light:hover { background: #9E6E3F; transform: translateY(-1px); color: #fff; }
.btn-outline--light {
    background: transparent;
    border: 1px solid rgba(250,246,239,0.25);
    color: rgba(250,246,239,0.85);
    display: inline-flex;
    align-items: center;
    gap: 8px;
    border-radius: 9999px;
    padding: 12px 26px;
    font-family: 'Outfit', sans-serif;
    font-weight: 700;
    font-size: 15px;
    text-decoration: none;
    transition: background .2s, border-color .2s, transform .15s;
}
.btn-outline--light:hover { background: rgba(255,255,255,0.08); border-color: rgba(250,246,239,0.5); transform: translateY(-1px); color: rgba(250,246,239,0.9); }
.tm-cta__trust {
    display: flex;
    justify-content: center;
    gap: 28px;
    flex-wrap: wrap;
}
.tm-cta__trust-item {
    display: flex;
    align-items: center;
    gap: 7px;
    font-size: 13px;
    color: rgba(250,246,239,0.45);
}
.tm-cta__trust-item svg { color: rgba(250,246,239,0.35); }

/* ============================================================
   RESPONSIVE TWEAKS
============================================================ */
@media (max-width: 640px) {
    .tm-value__strip { border-radius: 16px; }
    .tm-showcase__inner { gap: 30px; }
}
</style>

{{-- ========================================================
     BREADCRUMB
======================================================== --}}
<div class="tm-page">
<nav class="tm-breadcrumb">
    <div class="tm-container">
        <div class="tm-breadcrumb__inner">
            <a href="{{ route('features') }}">← All Features</a>
            <span class="tm-breadcrumb__sep">/</span>
            <span>Table Management</span>
        </div>
    </div>
</nav>

{{-- ========================================================
     HERO
======================================================== --}}
<section class="tm-hero">
    <div class="tm-container">
        <div class="tm-hero__inner" data-aos="fade-up">
            <div class="sec-eyebrow">Table Management</div>
            <h1 class="tm-hero__h1">
                Your Dining Floor,<br>
                Fully Visible <span class="italic-serif">in Real-Time</span>
            </h1>
            <p class="tm-hero__sub">
                Stop guessing which table is free. Geni Menu gives your front-of-house team a live, colour-coded floor map — every table status, turn time, and guest detail in one glance.
            </p>
            <div class="tm-hero__ctas">
                <a href="{{ route('restaurant_signup') }}" class="btn-primary">
                    Get Started Free &rarr;
                </a>
                <a href="#demo" class="btn-outline">
                    📅 Book a Demo
                </a>
            </div>
            <div class="tm-hero__badges">
                <div class="tm-hero__badge">
                    <div class="tm-hero__badge-icon">✓</div>
                    No hardware required
                </div>
                <div class="tm-hero__badge">
                    <div class="tm-hero__badge-icon">✓</div>
                    Works on any tablet or display
                </div>
                <div class="tm-hero__badge">
                    <div class="tm-hero__badge-icon">✓</div>
                    Live sync across all devices
                </div>
                <div class="tm-hero__badge">
                    <div class="tm-hero__badge-icon">✓</div>
                    Setup in under 20 minutes
                </div>
            </div>
        </div>

        {{-- DEVICE WINDOW --}}
        <div class="device-window" data-aos="fade-up" data-aos-delay="100">
            <div class="device-window__bar">
                <div class="device-window__dots">
                    <div class="device-window__dot device-window__dot--red"></div>
                    <div class="device-window__dot device-window__dot--amber"></div>
                    <div class="device-window__dot device-window__dot--green"></div>
                </div>
                <div class="device-window__url">app.genimenu.com / floor-plan / the-spice-route</div>
                <div class="device-window__pill">Live</div>
            </div>

            {{-- FLOOR PLAN UI --}}
            <div class="floorplan-ui">
                {{-- Top Bar --}}
                <div class="floorplan-ui__topbar">
                    <div class="floorplan-ui__title">
                        <div class="floorplan-ui__title-icon">🏢</div>
                        The Spice Route — Floor Plan
                    </div>
                    <div class="floorplan-ui__zone-tabs">
                        <div class="floorplan-ui__zone-tab floorplan-ui__zone-tab--active">All Zones</div>
                        <div class="floorplan-ui__zone-tab">🪴 Indoor</div>
                        <div class="floorplan-ui__zone-tab">☀️ Outdoor</div>
                        <div class="floorplan-ui__zone-tab">👑 VIP</div>
                        <div class="floorplan-ui__zone-tab">🍸 Bar</div>
                    </div>
                    <div class="floorplan-ui__legend">
                        <div class="floorplan-ui__legend-item">
                            <div class="floorplan-ui__legend-dot floorplan-ui__legend-dot--green"></div>
                            Available
                        </div>
                        <div class="floorplan-ui__legend-item">
                            <div class="floorplan-ui__legend-dot floorplan-ui__legend-dot--coffee"></div>
                            Occupied
                        </div>
                        <div class="floorplan-ui__legend-item">
                            <div class="floorplan-ui__legend-dot floorplan-ui__legend-dot--amber"></div>
                            Reserved
                        </div>
                        <div class="floorplan-ui__legend-item">
                            <div class="floorplan-ui__legend-dot floorplan-ui__legend-dot--gray"></div>
                            Cleaning
                        </div>
                    </div>
                </div>

                {{-- Table Grid --}}
                <div class="floorplan-ui__body">
                    {{-- T1 — Available --}}
                    <div class="table-card">
                        <div class="table-card__header">
                            <div class="table-card__num">T-01</div>
                            <div class="table-card__zone-badge badge-available">Available</div>
                        </div>
                        <div class="table-card__status-bar table-card__status-bar--available"></div>
                        <div class="table-card__meta">
                            <div class="table-card__meta-item">
                                <span>Capacity</span>
                                <span class="table-card__meta-val">4 seats</span>
                            </div>
                            <div class="table-card__meta-item">
                                <span>Zone</span>
                                <span class="table-card__meta-val">Indoor</span>
                            </div>
                        </div>
                        <div class="table-card__guests">
                            <span style="font-size:10px; color:rgba(250,246,239,0.4);">No guests seated</span>
                        </div>
                    </div>

                    {{-- T2 — Occupied --}}
                    <div class="table-card">
                        <div class="table-card__header">
                            <div class="table-card__num">T-02</div>
                            <div class="table-card__zone-badge badge-occupied">Occupied</div>
                        </div>
                        <div class="table-card__status-bar table-card__status-bar--occupied"></div>
                        <div class="table-card__meta">
                            <div class="table-card__meta-item">
                                <span>Guests</span>
                                <span class="table-card__meta-val">3 / 4</span>
                            </div>
                            <div class="table-card__meta-item">
                                <span>Dining</span>
                                <span class="table-card__meta-val">42 min</span>
                            </div>
                            <div class="table-card__meta-item">
                                <span>Bill</span>
                                <span class="table-card__meta-val">₹1,840</span>
                            </div>
                            <div class="table-card__meta-item">
                                <span>Steward</span>
                                <span class="table-card__meta-val">Rajan</span>
                            </div>
                        </div>
                        <div class="table-card__guests">
                            <div class="table-card__guest-dot" style="background:#876039;">A</div>
                            <div class="table-card__guest-dot" style="background:#15803D;">S</div>
                            <div class="table-card__guest-dot" style="background:#B45309;">P</div>
                        </div>
                    </div>

                    {{-- T3 — Reserved --}}
                    <div class="table-card">
                        <div class="table-card__header">
                            <div class="table-card__num">T-03</div>
                            <div class="table-card__zone-badge badge-reserved">Reserved</div>
                        </div>
                        <div class="table-card__status-bar table-card__status-bar--reserved"></div>
                        <div class="table-card__meta">
                            <div class="table-card__meta-item">
                                <span>Capacity</span>
                                <span class="table-card__meta-val">6 seats</span>
                            </div>
                            <div class="table-card__meta-item">
                                <span>ETA</span>
                                <span class="table-card__meta-val">8:30 PM</span>
                            </div>
                            <div class="table-card__meta-item">
                                <span>Guest</span>
                                <span class="table-card__meta-val">Mehra fam.</span>
                            </div>
                            <div class="table-card__meta-item">
                                <span>Zone</span>
                                <span class="table-card__meta-val">VIP</span>
                            </div>
                        </div>
                    </div>

                    {{-- T4 — Occupied --}}
                    <div class="table-card">
                        <div class="table-card__header">
                            <div class="table-card__num">T-04</div>
                            <div class="table-card__zone-badge badge-occupied">Occupied</div>
                        </div>
                        <div class="table-card__status-bar table-card__status-bar--occupied"></div>
                        <div class="table-card__meta">
                            <div class="table-card__meta-item">
                                <span>Guests</span>
                                <span class="table-card__meta-val">2 / 2</span>
                            </div>
                            <div class="table-card__meta-item">
                                <span>Dining</span>
                                <span class="table-card__meta-val">1h 08m</span>
                            </div>
                            <div class="table-card__meta-item">
                                <span>Bill</span>
                                <span class="table-card__meta-val">₹3,220</span>
                            </div>
                            <div class="table-card__meta-item">
                                <span>Steward</span>
                                <span class="table-card__meta-val">Priya</span>
                            </div>
                        </div>
                        <div class="table-card__guests">
                            <div class="table-card__guest-dot" style="background:#6F4E2D;">N</div>
                            <div class="table-card__guest-dot" style="background:#876039;">K</div>
                        </div>
                    </div>

                    {{-- T5 — Cleaning --}}
                    <div class="table-card">
                        <div class="table-card__header">
                            <div class="table-card__num">T-05</div>
                            <div class="table-card__zone-badge badge-cleaning">Cleaning</div>
                        </div>
                        <div class="table-card__status-bar table-card__status-bar--cleaning"></div>
                        <div class="table-card__meta">
                            <div class="table-card__meta-item">
                                <span>Capacity</span>
                                <span class="table-card__meta-val">4 seats</span>
                            </div>
                            <div class="table-card__meta-item">
                                <span>Last bill</span>
                                <span class="table-card__meta-val">₹2,150</span>
                            </div>
                        </div>
                        <div style="font-size:10px;color:rgba(250,246,239,0.4);">Est. ready in ~3 min</div>
                    </div>

                    {{-- T6 — Available --}}
                    <div class="table-card">
                        <div class="table-card__header">
                            <div class="table-card__num">T-06</div>
                            <div class="table-card__zone-badge badge-available">Available</div>
                        </div>
                        <div class="table-card__status-bar table-card__status-bar--available"></div>
                        <div class="table-card__meta">
                            <div class="table-card__meta-item">
                                <span>Capacity</span>
                                <span class="table-card__meta-val">6 seats</span>
                            </div>
                            <div class="table-card__meta-item">
                                <span>Zone</span>
                                <span class="table-card__meta-val">Outdoor</span>
                            </div>
                        </div>
                        <div style="font-size:10px;color:rgba(34,197,94,0.7);">Ready to seat</div>
                    </div>

                    {{-- T7 — Occupied --}}
                    <div class="table-card">
                        <div class="table-card__header">
                            <div class="table-card__num">T-07</div>
                            <div class="table-card__zone-badge badge-occupied">Occupied</div>
                        </div>
                        <div class="table-card__status-bar table-card__status-bar--occupied"></div>
                        <div class="table-card__meta">
                            <div class="table-card__meta-item">
                                <span>Guests</span>
                                <span class="table-card__meta-val">5 / 6</span>
                            </div>
                            <div class="table-card__meta-item">
                                <span>Dining</span>
                                <span class="table-card__meta-val">28 min</span>
                            </div>
                            <div class="table-card__meta-item">
                                <span>Bill</span>
                                <span class="table-card__meta-val">₹4,670</span>
                            </div>
                            <div class="table-card__meta-item">
                                <span>Steward</span>
                                <span class="table-card__meta-val">Ankit</span>
                            </div>
                        </div>
                        <div class="table-card__guests">
                            <div class="table-card__guest-dot" style="background:#15803D;">D</div>
                            <div class="table-card__guest-dot" style="background:#B45309;">R</div>
                            <div class="table-card__guest-dot" style="background:#876039;">S</div>
                            <div class="table-card__guest-dot" style="background:#6F4E2D;">V</div>
                            <div class="table-card__guest-dot" style="background:#9E6E3F;">T</div>
                        </div>
                    </div>

                    {{-- T8 — Reserved --}}
                    <div class="table-card">
                        <div class="table-card__header">
                            <div class="table-card__num">T-08</div>
                            <div class="table-card__zone-badge badge-reserved">Reserved</div>
                        </div>
                        <div class="table-card__status-bar table-card__status-bar--reserved"></div>
                        <div class="table-card__meta">
                            <div class="table-card__meta-item">
                                <span>Capacity</span>
                                <span class="table-card__meta-val">2 seats</span>
                            </div>
                            <div class="table-card__meta-item">
                                <span>ETA</span>
                                <span class="table-card__meta-val">9:00 PM</span>
                            </div>
                            <div class="table-card__meta-item">
                                <span>Guest</span>
                                <span class="table-card__meta-val">Priya S.</span>
                            </div>
                            <div class="table-card__meta-item">
                                <span>Zone</span>
                                <span class="table-card__meta-val">Bar</span>
                            </div>
                        </div>
                    </div>

                    {{-- T9 — Occupied --}}
                    <div class="table-card">
                        <div class="table-card__header">
                            <div class="table-card__num">T-09</div>
                            <div class="table-card__zone-badge badge-occupied">Occupied</div>
                        </div>
                        <div class="table-card__status-bar table-card__status-bar--occupied"></div>
                        <div class="table-card__meta">
                            <div class="table-card__meta-item">
                                <span>Guests</span>
                                <span class="table-card__meta-val">4 / 4</span>
                            </div>
                            <div class="table-card__meta-item">
                                <span>Dining</span>
                                <span class="table-card__meta-val">54 min</span>
                            </div>
                            <div class="table-card__meta-item">
                                <span>Bill</span>
                                <span class="table-card__meta-val">₹2,980</span>
                            </div>
                            <div class="table-card__meta-item">
                                <span>Steward</span>
                                <span class="table-card__meta-val">Rajan</span>
                            </div>
                        </div>
                        <div class="table-card__guests">
                            <div class="table-card__guest-dot" style="background:#876039;">G</div>
                            <div class="table-card__guest-dot" style="background:#B45309;">H</div>
                            <div class="table-card__guest-dot" style="background:#15803D;">I</div>
                            <div class="table-card__guest-dot" style="background:#6F4E2D;">J</div>
                        </div>
                    </div>

                    {{-- T10 — Available --}}
                    <div class="table-card">
                        <div class="table-card__header">
                            <div class="table-card__num">T-10</div>
                            <div class="table-card__zone-badge badge-available">Available</div>
                        </div>
                        <div class="table-card__status-bar table-card__status-bar--available"></div>
                        <div class="table-card__meta">
                            <div class="table-card__meta-item">
                                <span>Capacity</span>
                                <span class="table-card__meta-val">8 seats</span>
                            </div>
                            <div class="table-card__meta-item">
                                <span>Zone</span>
                                <span class="table-card__meta-val">VIP</span>
                            </div>
                        </div>
                        <div style="font-size:10px;color:rgba(34,197,94,0.7);">Ready to seat</div>
                    </div>

                    {{-- T11 — Cleaning --}}
                    <div class="table-card">
                        <div class="table-card__header">
                            <div class="table-card__num">T-11</div>
                            <div class="table-card__zone-badge badge-cleaning">Cleaning</div>
                        </div>
                        <div class="table-card__status-bar table-card__status-bar--cleaning"></div>
                        <div class="table-card__meta">
                            <div class="table-card__meta-item">
                                <span>Capacity</span>
                                <span class="table-card__meta-val">4 seats</span>
                            </div>
                            <div class="table-card__meta-item">
                                <span>Last bill</span>
                                <span class="table-card__meta-val">₹1,560</span>
                            </div>
                        </div>
                        <div style="font-size:10px;color:rgba(250,246,239,0.4);">Est. ready in ~2 min</div>
                    </div>

                    {{-- T12 — Occupied --}}
                    <div class="table-card">
                        <div class="table-card__header">
                            <div class="table-card__num">T-12</div>
                            <div class="table-card__zone-badge badge-occupied">Occupied</div>
                        </div>
                        <div class="table-card__status-bar table-card__status-bar--occupied"></div>
                        <div class="table-card__meta">
                            <div class="table-card__meta-item">
                                <span>Guests</span>
                                <span class="table-card__meta-val">2 / 4</span>
                            </div>
                            <div class="table-card__meta-item">
                                <span>Dining</span>
                                <span class="table-card__meta-val">18 min</span>
                            </div>
                            <div class="table-card__meta-item">
                                <span>Bill</span>
                                <span class="table-card__meta-val">₹760</span>
                            </div>
                            <div class="table-card__meta-item">
                                <span>Steward</span>
                                <span class="table-card__meta-val">Priya</span>
                            </div>
                        </div>
                        <div class="table-card__guests">
                            <div class="table-card__guest-dot" style="background:#9E6E3F;">L</div>
                            <div class="table-card__guest-dot" style="background:#6F4E2D;">M</div>
                        </div>
                    </div>
                </div>

                {{-- Telemetry Bar --}}
                <div class="floorplan-ui__telemetry">
                    <div class="floorplan-ui__tele-item">
                        <div class="floorplan-ui__tele-label">Total Tables</div>
                        <div class="floorplan-ui__tele-val">12</div>
                    </div>
                    <div class="floorplan-ui__tele-item">
                        <div class="floorplan-ui__tele-label">Occupied</div>
                        <div class="floorplan-ui__tele-val tm-tele-val--coffee" style="color:#D4956A;">6</div>
                    </div>
                    <div class="floorplan-ui__tele-item">
                        <div class="floorplan-ui__tele-label">Available</div>
                        <div class="floorplan-ui__tele-val floorplan-ui__tele-val--green">3</div>
                    </div>
                    <div class="floorplan-ui__tele-item">
                        <div class="floorplan-ui__tele-label">Reserved</div>
                        <div class="floorplan-ui__tele-val floorplan-ui__tele-val--amber">2</div>
                    </div>
                    <div class="floorplan-ui__tele-item">
                        <div class="floorplan-ui__tele-label">Cleaning</div>
                        <div class="floorplan-ui__tele-val" style="color:#9CA3AF;">1</div>
                    </div>
                    <div class="floorplan-ui__tele-item floorplan-ui__occupancy-bar" style="flex:1;">
                        <div class="floorplan-ui__tele-label">Occupancy Rate</div>
                        <div style="display:flex;align-items:center;gap:10px;margin-top:4px;">
                            <div class="floorplan-ui__occ-bar-track" style="flex:1;">
                                <div class="floorplan-ui__occ-bar-fill" style="width:75%;"></div>
                            </div>
                            <span style="font-family:'Outfit',sans-serif;font-weight:700;font-size:16px;color:#D4956A;white-space:nowrap;">75%</span>
                        </div>
                    </div>
                    <div class="floorplan-ui__tele-item">
                        <div class="floorplan-ui__tele-label">Avg Turn Time</div>
                        <div class="floorplan-ui__tele-val">47 min</div>
                    </div>
                    <div class="floorplan-ui__tele-item">
                        <div class="floorplan-ui__tele-label">Tonight Revenue</div>
                        <div class="floorplan-ui__tele-val floorplan-ui__tele-val--green">₹16,230</div>
                    </div>
                </div>
            </div>
            {{-- /floor plan --}}
        </div>
        {{-- /device-window --}}

    </div>
</section>

{{-- ========================================================
     VALUE STRIP
======================================================== --}}
<section class="tm-value">
    <div class="tm-container">
        <div class="tm-value__strip" data-aos="fade-up" data-aos-delay="50">
            <div class="tm-value__item">
                <div class="tm-value__icon">🗺️</div>
                <div class="tm-value__title">Visual Floor Map</div>
                <div class="tm-value__desc">See every table's state on a real floor plan, not a boring list.</div>
            </div>
            <div class="tm-value__item">
                <div class="tm-value__icon">🔴</div>
                <div class="tm-value__title">Live Status Colours</div>
                <div class="tm-value__desc">Green, amber, coffee and grey — status recognised in under a second.</div>
            </div>
            <div class="tm-value__item">
                <div class="tm-value__icon">⏱️</div>
                <div class="tm-value__title">Turn-Time Alerts</div>
                <div class="tm-value__desc">Know which tables have been seated longest and are about to free up.</div>
            </div>
            <div class="tm-value__item">
                <div class="tm-value__icon">📲</div>
                <div class="tm-value__title">One-Tap Updates</div>
                <div class="tm-value__desc">Mark tables cleaning or available from POS, tablet, or floor display.</div>
            </div>
        </div>
    </div>
</section>

{{-- ========================================================
     DEEP FEATURE SHOWCASE
======================================================== --}}
<section class="tm-showcase">
    <div class="tm-container">
        <div class="tm-showcase__inner">
            {{-- Copy --}}
            <div class="tm-showcase__copy" data-aos="fade-right">
                <div class="sec-eyebrow">Zone Management</div>
                <h2>One Floor Plan, Four Zones — Perfectly Organised</h2>
                <p>
                    Segment your restaurant into Indoor, Outdoor, VIP, and Bar zones. Assign stewards to specific sections, track revenue per zone, and switch views with a single tap during service.
                </p>
                <ul>
                    <li>
                        <span class="check">✓</span>
                        Steward Rajan automatically sees only his Indoor tables — no clutter.
                    </li>
                    <li>
                        <span class="check">✓</span>
                        VIP zone locks reserved tables until the guest's name is confirmed at the host stand.
                    </li>
                    <li>
                        <span class="check">✓</span>
                        Outdoor tables auto-disable during monsoon hours using shift scheduling.
                    </li>
                    <li>
                        <span class="check">✓</span>
                        Bar stools tracked separately with quick-turn billing for walk-ins.
                    </li>
                    <li>
                        <span class="check">✓</span>
                        Zone summary shows occupancy %, average bill, and active stewards at once.
                    </li>
                </ul>
                <a href="{{ route('restaurant_signup') }}" class="btn-primary">Start Managing Your Floor &rarr;</a>
            </div>

            {{-- Visual --}}
            <div class="tm-showcase__visual" data-aos="fade-left" data-aos-delay="100">
                <div class="tm-showcase__visual-header">
                    <div class="tm-showcase__visual-title">
                        🏢 Zone Overview — The Spice Route
                    </div>
                    <span style="font-size:11px;font-weight:700;color:var(--green);background:var(--green-bg);padding:3px 10px;border-radius:9999px;">Live</span>
                </div>
                <div class="tm-showcase__visual-body">
                    {{-- Indoor --}}
                    <div class="zone-row">
                        <div class="zone-row__icon" style="background:#EFF6FF;">🪴</div>
                        <div class="zone-row__name">
                            <div class="zone-row__name-title">Indoor — Main Hall</div>
                            <div class="zone-row__name-sub">Steward: Rajan &amp; Priya · 6 tables</div>
                        </div>
                        <div class="zone-row__pills">
                            <span class="zone-pill zone-pill--green">3 free</span>
                            <span class="zone-pill zone-pill--coffee">3 occ</span>
                        </div>
                    </div>
                    {{-- Outdoor --}}
                    <div class="zone-row">
                        <div class="zone-row__icon" style="background:#FEF9C3;">☀️</div>
                        <div class="zone-row__name">
                            <div class="zone-row__name-title">Outdoor — Garden</div>
                            <div class="zone-row__name-sub">Steward: Ankit · 3 tables</div>
                        </div>
                        <div class="zone-row__pills">
                            <span class="zone-pill zone-pill--green">1 free</span>
                            <span class="zone-pill zone-pill--coffee">1 occ</span>
                            <span class="zone-pill zone-pill--gray">1 clean</span>
                        </div>
                    </div>
                    {{-- VIP --}}
                    <div class="zone-row">
                        <div class="zone-row__icon" style="background:#FAF6EF;">👑</div>
                        <div class="zone-row__name">
                            <div class="zone-row__name-title">VIP Lounge</div>
                            <div class="zone-row__name-sub">Steward: Rajan · 2 tables</div>
                        </div>
                        <div class="zone-row__pills">
                            <span class="zone-pill zone-pill--green">1 free</span>
                            <span class="zone-pill zone-pill--amber">1 rsvd</span>
                        </div>
                    </div>
                    {{-- Bar --}}
                    <div class="zone-row">
                        <div class="zone-row__icon" style="background:#FDF4FF;">🍸</div>
                        <div class="zone-row__name">
                            <div class="zone-row__name-title">Bar Counter</div>
                            <div class="zone-row__name-sub">Steward: Priya · 1 table</div>
                        </div>
                        <div class="zone-row__pills">
                            <span class="zone-pill zone-pill--amber">1 rsvd</span>
                        </div>
                    </div>

                    {{-- Summary row --}}
                    <div style="margin-top:16px;padding:14px 16px;background:var(--coffee-light);border-radius:12px;border:1px solid var(--coffee-border);display:flex;gap:28px;flex-wrap:wrap;">
                        <div style="display:flex;flex-direction:column;gap:2px;">
                            <span style="font-size:10px;text-transform:uppercase;letter-spacing:1px;color:var(--ink-faint);font-weight:600;">Occupancy</span>
                            <span style="font-family:'Outfit',sans-serif;font-weight:800;font-size:22px;color:var(--coffee);">75%</span>
                        </div>
                        <div style="display:flex;flex-direction:column;gap:2px;">
                            <span style="font-size:10px;text-transform:uppercase;letter-spacing:1px;color:var(--ink-faint);font-weight:600;">Avg. Bill</span>
                            <span style="font-family:'Outfit',sans-serif;font-weight:800;font-size:22px;color:var(--ink);">₹2,712</span>
                        </div>
                        <div style="display:flex;flex-direction:column;gap:2px;">
                            <span style="font-size:10px;text-transform:uppercase;letter-spacing:1px;color:var(--ink-faint);font-weight:600;">Avg. Turn</span>
                            <span style="font-family:'Outfit',sans-serif;font-weight:800;font-size:22px;color:var(--ink);">47 min</span>
                        </div>
                        <div style="display:flex;flex-direction:column;gap:2px;">
                            <span style="font-size:10px;text-transform:uppercase;letter-spacing:1px;color:var(--ink-faint);font-weight:600;">Active Staff</span>
                            <span style="font-family:'Outfit',sans-serif;font-weight:800;font-size:22px;color:var(--ink);">3</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ========================================================
     HOW IT WORKS
======================================================== --}}
<section class="tm-howitworks">
    <div class="tm-container">
        <div class="tm-howitworks__header" data-aos="fade-up">
            <div class="sec-eyebrow">How It Works</div>
            <h2>From Empty Floor to Full House in 4 Steps</h2>
            <p>Geni Menu's table management fits naturally into how your team already works — no new habits to force.</p>
        </div>
        <div class="tm-howitworks__steps">
            <div class="tm-howitworks__step" data-aos="fade-up" data-aos-delay="0">
                <div class="tm-howitworks__step-num">1</div>
                <div class="tm-howitworks__step-icon">🗺️</div>
                <h3>Set Up Your Floor Plan</h3>
                <p>Use the drag-and-drop editor to map your restaurant exactly — place tables, label zones, set capacities, and assign stewards. Takes about 15 minutes once.</p>
            </div>
            <div class="tm-howitworks__step" data-aos="fade-up" data-aos-delay="80">
                <div class="tm-howitworks__step-num">2</div>
                <div class="tm-howitworks__step-icon">🤝</div>
                <h3>Seat &amp; Link Guests</h3>
                <p>When a guest arrives, tap the table, select their reservation (if any), and confirm seating. The timer starts, the POS opens to their order, and the steward gets notified.</p>
            </div>
            <div class="tm-howitworks__step" data-aos="fade-up" data-aos-delay="160">
                <div class="tm-howitworks__step-num">3</div>
                <div class="tm-howitworks__step-icon">📊</div>
                <h3>Monitor in Real-Time</h3>
                <p>Watch your floor plan update live — bill amounts grow, dining timers tick, and alerts fire when a table has been seated past your average turn time of 60 minutes.</p>
            </div>
            <div class="tm-howitworks__step" data-aos="fade-up" data-aos-delay="240">
                <div class="tm-howitworks__step-num">4</div>
                <div class="tm-howitworks__step-icon">✅</div>
                <h3>Clear &amp; Turnaround</h3>
                <p>After billing, mark the table Cleaning with one tap. It turns grey on the floor plan and alerts housekeeping. Once cleared, flip it to Available — the next guest is ready to be seated.</p>
            </div>
        </div>
    </div>
</section>

{{-- ========================================================
     FEATURE GRID
======================================================== --}}
<section class="tm-features">
    <div class="tm-container">
        <div class="tm-features__header" data-aos="fade-up">
            <div class="sec-eyebrow">All Capabilities</div>
            <h2>Everything You Need to Run a Tight Floor</h2>
            <p>Six features that combine into one seamless seating experience — for guests and staff alike.</p>
        </div>
        <div class="tm-features__grid">
            <div class="feat-card" data-aos="fade-up" data-aos-delay="0">
                <div class="feat-card__icon">🖊️</div>
                <h3>Visual Floor Plan Editor</h3>
                <p>Drag, drop, and arrange tables on a canvas that mirrors your actual restaurant layout. Add walls, pillars, and section dividers to make it feel real. Supports multi-floor setups.</p>
            </div>
            <div class="feat-card" data-aos="fade-up" data-aos-delay="60">
                <div class="feat-card__icon">🟢</div>
                <h3>Live Table Status</h3>
                <p>Four instant states — Available (green), Occupied (coffee), Reserved (amber), Cleaning (grey). Staff see the full picture at a glance without radio-calling the host stand.</p>
            </div>
            <div class="feat-card" data-aos="fade-up" data-aos-delay="120">
                <div class="feat-card__icon">⏱️</div>
                <h3>Turn-Time Tracking</h3>
                <p>Each occupied table shows a live dining timer. When a table crosses your average turn time, it highlights in amber so hosts can proactively offer bills or check in with guests.</p>
            </div>
            <div class="feat-card" data-aos="fade-up" data-aos-delay="180">
                <div class="feat-card__icon">🗂️</div>
                <h3>Zone &amp; Section Management</h3>
                <p>Organise tables into Indoor, Outdoor, VIP, and Bar zones. Assign stewards per zone, view zone-level occupancy stats, and generate per-zone revenue reports at end of shift.</p>
            </div>
            <div class="feat-card" data-aos="fade-up" data-aos-delay="240">
                <div class="feat-card__icon">🔗</div>
                <h3>Guest Linking on Seating</h3>
                <p>When a reserved guest arrives, tap their name from the reservation list to link it to the table. Their preferences, allergies, and past visit notes appear instantly for the steward.</p>
            </div>
            <div class="feat-card" data-aos="fade-up" data-aos-delay="300">
                <div class="feat-card__icon">⚡</div>
                <h3>Instant Status Updates</h3>
                <p>Table states sync across POS, the host display, and waiter tablets in under one second. No refresh needed — when Priya marks T-05 clean at the POS, Rajan sees it update at the floor map.</p>
            </div>
        </div>
    </div>
</section>

{{-- ========================================================
     RESULTS / METRICS
======================================================== --}}
<section class="tm-metrics">
    <div class="tm-container">
        <div style="text-align:center;margin-bottom:48px;" data-aos="fade-up">
            <div style="display:inline-block;font-size:12px;font-weight:700;letter-spacing:1.6px;text-transform:uppercase;color:#D4956A;background:rgba(135,96,57,0.15);border:1px solid rgba(135,96,57,0.3);padding:6px 16px;border-radius:9999px;margin-bottom:18px;">Real Results</div>
            <h2 style="font-family:'Outfit',sans-serif;font-weight:700;color:#FAF6EF;font-size:clamp(26px,3.5vw,40px);letter-spacing:-0.025em;margin-bottom:12px;">Numbers That Move the Needle</h2>
            <p style="color:rgba(250,246,239,0.55);font-size:16px;max-width:500px;margin:0 auto;">Aggregated from Geni Menu restaurants that switched from manual floor sheets to live table management.</p>
        </div>
        <div class="tm-metrics__inner" data-aos="fade-up" data-aos-delay="80">
            <div class="tm-metric">
                <div class="tm-metric__num">+22%</div>
                <div class="tm-metric__label">More table covers per evening shift</div>
                <div class="tm-metric__sub">By reducing idle time between seatings</div>
            </div>
            <div class="tm-metric">
                <div class="tm-metric__num">11 min</div>
                <div class="tm-metric__label">Average reduction in table turnaround time</div>
                <div class="tm-metric__sub">After switching from pen-and-paper</div>
            </div>
            <div class="tm-metric">
                <div class="tm-metric__num">₹9,400</div>
                <div class="tm-metric__label">Extra revenue per week on a 20-table restaurant</div>
                <div class="tm-metric__sub">From faster turns &amp; better zone utilisation</div>
            </div>
            <div class="tm-metric">
                <div class="tm-metric__num">Zero</div>
                <div class="tm-metric__label">Double-seated table incidents since go-live</div>
                <div class="tm-metric__sub">Real-time sync eliminates host miscommunication</div>
            </div>
        </div>
    </div>
</section>

{{-- ========================================================
     COMPARE SECTION
======================================================== --}}
<section class="tm-compare">
    <div class="tm-container">
        <div class="tm-compare__header" data-aos="fade-up">
            <div class="sec-eyebrow">Old Way vs. Geni Menu</div>
            <h2>The Host Stand Used to Run on Guesswork</h2>
            <p>See exactly what changes when you give your front-of-house team a real-time floor plan.</p>
        </div>
        <div class="tm-compare__grid">
            {{-- Old --}}
            <div class="compare-card compare-card--old" data-aos="fade-right">
                <div class="compare-card__label">
                    <div class="compare-card__label-icon">😣</div>
                    Without Geni Menu
                </div>
                <h3>Chaos at the Host Stand</h3>
                <ul class="compare-list">
                    <li>
                        <span class="compare-list__marker">✕</span>
                        Rajan shouts across the dining room to ask if T-07 is free yet.
                    </li>
                    <li>
                        <span class="compare-list__marker">✕</span>
                        Paper seating chart is scribbled over — impossible to read during rush hour.
                    </li>
                    <li>
                        <span class="compare-list__marker">✕</span>
                        A couple is double-seated at T-03 because the host and a waiter both claimed it.
                    </li>
                    <li>
                        <span class="compare-list__marker">✕</span>
                        No idea how long T-09 has been occupied — did they even get a bill?
                    </li>
                    <li>
                        <span class="compare-list__marker">✕</span>
                        VIP guest "Mehra family" walks in but the reserved table is still being cleaned — nobody knew.
                    </li>
                    <li>
                        <span class="compare-list__marker">✕</span>
                        Manager walks the floor every 15 minutes just to count available tables.
                    </li>
                </ul>
            </div>

            {{-- New --}}
            <div class="compare-card compare-card--new" data-aos="fade-left" data-aos-delay="80">
                <div class="compare-card__label">
                    <div class="compare-card__label-icon">✨</div>
                    With Geni Menu
                </div>
                <h3>Total Floor Visibility, Always</h3>
                <ul class="compare-list">
                    <li>
                        <span class="compare-list__marker">✓</span>
                        Floor plan updates in real-time — Rajan sees T-07 turn green the moment the bill is settled.
                    </li>
                    <li>
                        <span class="compare-list__marker">✓</span>
                        Digital colour-coded floor map: Available, Occupied, Reserved, Cleaning — crystal clear.
                    </li>
                    <li>
                        <span class="compare-list__marker">✓</span>
                        One tap locks a table to a guest — no double-seating possible.
                    </li>
                    <li>
                        <span class="compare-list__marker">✓</span>
                        Live dining timer on every occupied table; amber alert at 60-minute mark.
                    </li>
                    <li>
                        <span class="compare-list__marker">✓</span>
                        Mehra family reservation linked — host sees cleaning ETA and can hold them at the lounge with a message.
                    </li>
                    <li>
                        <span class="compare-list__marker">✓</span>
                        Manager's dashboard shows occupancy %, avg turn, revenue — no floor walks needed.
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

{{-- ========================================================
     FAQ
======================================================== --}}
<section class="tm-faq">
    <div class="tm-container">
        <div class="tm-faq__header" data-aos="fade-up">
            <div class="sec-eyebrow">FAQ</div>
            <h2>Common Questions Answered</h2>
            <p>Everything you need to know before setting up your digital floor plan.</p>
        </div>
        <div class="faq-list" data-aos="fade-up" data-aos-delay="60">
            <div class="faq-item open">
                <div class="faq-question">
                    How long does it take to draw my floor plan in Geni Menu?
                    <div class="faq-chevron">▾</div>
                </div>
                <div class="faq-answer">
                    Most restaurants complete their initial floor plan setup in under 20 minutes using our drag-and-drop editor. You can place tables, label zones, set seating capacities, and assign stewards all in one session. We also offer a guided onboarding call where a Geni Menu specialist sets it up with you.
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-question">
                    Does the floor plan update in real-time across all devices?
                    <div class="faq-chevron">▾</div>
                </div>
                <div class="faq-answer">
                    Yes. Geni Menu uses WebSocket connections to sync table status changes across all logged-in devices — POS terminals, host tablets, waiter handhelds, and the manager dashboard — in under one second. When Priya marks T-05 as Cleaning at her POS, Rajan sees the grey state appear on the floor map immediately.
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-question">
                    Can I manage multiple floors or buildings in one account?
                    <div class="faq-chevron">▾</div>
                </div>
                <div class="faq-answer">
                    Absolutely. Geni Menu supports multi-floor setups within a single location (Ground Floor, Rooftop, Basement Bar) as well as multiple outlets under one account (e.g. The Spice Route — Bandra and The Spice Route — Powai). Each outlet has its own independent floor plan and team, but management gets a consolidated view from the head office dashboard.
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-question">
                    How does guest linking work when a walk-in arrives without a reservation?
                    <div class="faq-chevron">▾</div>
                </div>
                <div class="faq-answer">
                    For walk-ins, you simply tap the table on the floor map, enter the guest count, and optionally add a guest name or phone number. If the guest has visited before, their profile auto-populates from your CRM with past orders and preferences. The seating record is created instantly and tied to the POS session for that table.
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-question">
                    Is there a limit on the number of tables I can add?
                    <div class="faq-chevron">▾</div>
                </div>
                <div class="faq-answer">
                    No hard limits. Geni Menu scales from a 5-table café to a 200-seat banquet hall. Larger properties typically split into multiple zones or floors for easier navigation. Our pricing is flat per outlet, not per table, so you never get penalised for growing.
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ========================================================
     CROSS-LINKS
======================================================== --}}
<section class="tm-crosslinks">
    <div class="tm-container">
        <div class="tm-crosslinks__header" data-aos="fade-up">
            <h3>Works Seamlessly With</h3>
            <p>Table Management connects directly to these Geni Menu features.</p>
        </div>
        <div class="tm-crosslinks__row" data-aos="fade-up" data-aos-delay="60">
            <a href="{{ route('features.reservation-management') }}" class="crosslink-card">
                <div class="crosslink-card__icon">📅</div>
                <div class="crosslink-card__text">
                    <div class="crosslink-card__title">Reservation Management</div>
                    <div class="crosslink-card__desc">Link arriving guests to their booked table with one tap.</div>
                </div>
                <span class="crosslink-card__arrow">→</span>
            </a>
            <a href="{{ route('features.waiter-request') }}" class="crosslink-card">
                <div class="crosslink-card__icon">🔔</div>
                <div class="crosslink-card__text">
                    <div class="crosslink-card__title">Waiter Request</div>
                    <div class="crosslink-card__desc">Guest buzzer requests show table number from the floor plan.</div>
                </div>
                <span class="crosslink-card__arrow">→</span>
            </a>
            <a href="{{ route('features.pos-management') }}" class="crosslink-card">
                <div class="crosslink-card__icon">💳</div>
                <div class="crosslink-card__text">
                    <div class="crosslink-card__title">POS &amp; Billing</div>
                    <div class="crosslink-card__desc">Tap a table on the floor plan to open its live bill instantly.</div>
                </div>
                <span class="crosslink-card__arrow">→</span>
            </a>
        </div>
    </div>
</section>

{{-- ========================================================
     FINAL CTA
======================================================== --}}
<section class="tm-cta" id="demo">
    <div class="tm-container">
        <div class="tm-cta__inner" data-aos="fade-up">
            <div class="tm-cta__eyebrow">Get Started Today</div>
            <h2 class="tm-cta__h2">
                Give Your Team a Floor Plan<br>They Can Actually <span class="italic-serif">Trust</span>
            </h2>
            <p class="tm-cta__sub">
                Join restaurants across India that have replaced guesswork with real-time floor intelligence. Setup takes 20 minutes.
            </p>
            <div class="tm-cta__btns">
                <a href="{{ route('restaurant_signup') }}" class="btn-primary--light">
                    Start Free Trial &rarr;
                </a>
                <a href="#demo" class="btn-outline--light">
                    📅 Book a 15-min Demo
                </a>
            </div>
            <div class="tm-cta__trust">
                <span class="tm-cta__trust-item">✓ No credit card required</span>
                <span class="tm-cta__trust-item">✓ Free onboarding call</span>
                <span class="tm-cta__trust-item">✓ Live in one service shift</span>
            </div>
        </div>
    </div>
</section>

</div>{{-- /tm-page --}}

{{-- ========================================================
     AOS INIT + FAQ ACCORDION JS
======================================================== --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {

    // AOS
    AOS.init({
        duration: 600,
        once: true,
        offset: 60,
        easing: 'ease-out-cubic'
    });

    // FAQ Accordion
    document.querySelectorAll('.faq-question').forEach(function (question) {
        question.addEventListener('click', function () {
            var item = this.closest('.faq-item');
            var isOpen = item.classList.contains('open');

            // Close all
            document.querySelectorAll('.faq-item').forEach(function (el) {
                el.classList.remove('open');
            });

            // If it wasn't open, open it
            if (!isOpen) {
                item.classList.add('open');
            }
        });
    });
});
</script>

@endsection
