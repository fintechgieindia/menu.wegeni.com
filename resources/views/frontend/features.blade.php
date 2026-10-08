@php
    $meta = [
        'title' => 'Features Overview | Geni Menu Restaurant Operations Platform',
        'description' => 'Explore the complete Geni Menu feature suite: POS billing, kitchen KOT, table & reservation management, inventory tracking, staff controls, multi-branch, and real-time reports.',
        'keywords' => 'restaurant ERP features, restaurant POS features, KOT software, kitchen order ticket software, table management software, reservation management software, restaurant inventory software, restaurant staff management software, multi-branch restaurant software, kiosk ordering software, restaurant CRM features, restaurant reporting software, QR code menu ordering, restaurant billing features list, restaurant software modules, Geni Menu features, Geni Menu KOT system, Geni Menu inventory management, restaurant software feature list India',
    ];
@endphp

@extends('layouts.frontend-master')

@section('content')

{{-- Google Fonts --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Caveat:wght@600;700&family=Fraunces:opsz,wght@9..144,400;9..144,500;9..144,600&family=Outfit:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

{{-- AOS Animation Library --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">

<style>
  :root {
    --br: #876039;
    --br-dark: #6f4e2d;
    --br-light: #f4efe9;
    --br-faint: #fcf9f5;
    --cream: #FAF6EF;
    --cream-deep: #F1E8D9;
    --ink: #21160F;
    --ink-soft: #645B51;
    --ink-faint: #8B8177;
    --gold: #C79A61;
    --gold-soft: #DCB98A;
    --gold-deep: #9C6F3E;
    --brown: #4A3524;
    --line: #E8DFD4;
    --white: #FFFFFF;
    --green: #15803d;
    --green-light: #dcfce7;
    --amber: #b45309;
    --amber-light: #fef3c7;
    --blue: #1d4ed8;
    --blue-light: #dbeafe;
    --purple: #6d28d9;
    --purple-light: #ede9fe;
    --shadow-sm: 0 4px 20px rgba(33, 22, 15, 0.04);
    --shadow-md: 0 16px 36px rgba(33, 22, 15, 0.08);
    --shadow-lg: 0 24px 50px rgba(33, 22, 15, 0.12);
    --max: 1200px;
  }

  * { box-sizing: border-box; }

  .ft-page {
    background: var(--cream);
    color: var(--ink);
    font-family: 'Plus Jakarta Sans', 'Inter', sans-serif;
    font-size: 15px;
    line-height: 1.6;
    overflow-x: hidden;
  }

  /* Typography */
  .ft-page h1, .ft-page h2, .ft-page h3, .ft-page h4 {
    font-family: 'Outfit', 'Fraunces', serif;
    color: var(--ink);
    line-height: 1.2;
    margin: 0;
    font-weight: 600;
  }

  .ft-page p {
    color: var(--ink-soft);
    margin: 0;
    font-weight: 400;
  }

  .w {
    max-width: var(--max);
    margin: 0 auto;
    padding: 0 24px;
    width: 100%;
  }

  .section {
    padding: 90px 0;
    position: relative;
  }

  .section.alt {
    background: #F4EFEA;
    border-top: 1px solid var(--line);
    border-bottom: 1px solid var(--line);
  }

  .section.dark {
    background: #1A130E;
    color: #F8F5EF;
  }
  .section.dark h2, .section.dark h3, .section.dark h4 { color: #FFF; }
  .section.dark p { color: #B3A89F; }

  /* Eyebrows & Headers */
  .sec-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: 12px;
    font-weight: 600;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: var(--br);
    background: var(--br-light);
    border: 1px solid rgba(135,96,57,0.18);
    padding: 6px 14px;
    border-radius: 999px;
    margin-bottom: 14px;
  }

  .sec-header {
    text-align: center;
    max-width: 780px;
    margin: 0 auto 56px;
  }

  .sec-header h2 {
    font-size: 38px;
    margin-bottom: 14px;
    letter-spacing: -0.02em;
  }

  .sec-header p {
    font-size: 17px;
    line-height: 1.65;
  }

  /* Buttons */
  .btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 13px 26px;
    border-radius: 10px;
    font: 600 14.5px 'Plus Jakarta Sans', sans-serif;
    text-decoration: none;
    transition: all 0.25s ease;
    cursor: pointer;
    border: 1.5px solid transparent;
  }

  .btn.p {
    background: var(--br);
    color: #fff;
    box-shadow: 0 4px 16px rgba(135,96,57,0.25);
  }
  .btn.p:hover {
    background: var(--br-dark);
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(135,96,57,0.35);
  }

  .btn.o {
    background: #fff;
    color: var(--br);
    border-color: rgba(135,96,57,0.3);
  }
  .btn.o:hover {
    background: var(--br-light);
    border-color: var(--br);
    color: var(--br-dark);
    transform: translateY(-2px);
  }

  /* ===================== HERO SECTION ===================== */
  .ft-hero {
    padding: 110px 0 70px;
    background: linear-gradient(180deg, #FBF8F3 0%, #FAF6EF 100%);
    position: relative;
    overflow: hidden;
  }

  .ft-hero-grid {
    display: grid;
    grid-template-columns: 1.05fr 1fr;
    gap: 48px;
    align-items: center;
  }

  .ft-hero h1 {
    font-size: 48px;
    line-height: 1.15;
    margin-bottom: 20px;
    letter-spacing: -0.03em;
  }

  .ft-hero h1 .highlight {
    color: var(--br);
    display: inline-block;
  }

  .ft-hero p.lead {
    font-size: 17.5px;
    color: var(--ink-soft);
    line-height: 1.65;
    margin-bottom: 32px;
  }

  .ft-hero-cta-group {
    display: flex;
    gap: 14px;
    flex-wrap: wrap;
    margin-bottom: 36px;
  }

  /* Realistic Hero Dashboard Visual */
  .hero-dash-container {
    background: #fff;
    border-radius: 18px;
    box-shadow: var(--shadow-lg);
    border: 1px solid var(--line);
    overflow: hidden;
    position: relative;
  }

  .hero-dash-topbar {
    background: #231B15;
    padding: 10px 16px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: #FAF5F0;
  }

  .window-dots {
    display: flex;
    gap: 6px;
  }
  .dot { width: 9px; height: 9px; border-radius: 50%; }
  .dot.r { background: #ef4444; }
  .dot.y { background: #f59e0b; }
  .dot.g { background: #10b981; }

  .dash-body {
    padding: 22px;
    background: #FAF7F2;
  }

  .dash-metrics-row {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 12px;
    margin-bottom: 16px;
  }

  .dash-metric-card {
    background: #fff;
    border-radius: 10px;
    padding: 14px;
    border: 1px solid var(--line);
  }
  .dash-metric-lbl { font-size: 11px; text-transform: uppercase; color: var(--ink-faint); font-weight: 600; }
  .dash-metric-val { font-size: 20px; font-weight: 700; color: var(--ink); margin-top: 4px; }
  .dash-metric-sub { font-size: 11px; color: var(--green); margin-top: 2px; }

  .dash-main-split {
    display: grid;
    grid-template-columns: 1.5fr 1fr;
    gap: 12px;
  }

  .dash-sub-panel {
    background: #fff;
    border-radius: 10px;
    padding: 14px;
    border: 1px solid var(--line);
    font-size: 12px;
  }
  .dash-panel-title { font-weight: 600; font-size: 13px; color: var(--ink); margin-bottom: 8px; border-bottom: 1px solid #f0eae1; padding-bottom: 6px; }

  .dash-table-row {
    display: flex;
    justify-content: space-between;
    padding: 6px 0;
    border-bottom: 1px solid #f7f3ec;
  }
  .dash-table-row:last-child { border-bottom: none; }

  /* Floating UI Badges */
  .hero-float-badge {
    position: absolute;
    background: #fff;
    padding: 10px 14px;
    border-radius: 12px;
    box-shadow: var(--shadow-md);
    border: 1px solid rgba(135,96,57,0.15);
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 13px;
    font-weight: 600;
    color: var(--ink);
    z-index: 5;
    animation: heroFloat 4s ease-in-out infinite alternate;
  }
  .hero-float-badge.f-1 { top: -14px; left: -14px; }
  .hero-float-badge.f-2 { bottom: -14px; right: -14px; animation-delay: 1.5s; }
  .hero-float-badge.f-3 { bottom: 30px; left: -22px; animation-delay: 2.5s; }

  @keyframes heroFloat {
    0% { transform: translateY(0); }
    100% { transform: translateY(-8px); }
  }

  .f-icon-box {
    width: 32px;
    height: 32px;
    border-radius: 8px;
    display: grid;
    place-items: center;
    flex-shrink: 0;
  }
  .f-icon-box svg { width: 17px; height: 17px; stroke: currentColor; fill: none; stroke-width: 2.2; }
  .f-icon-box.br { background: var(--br-light); color: var(--br); }
  .f-icon-box.gr { background: var(--green-light); color: var(--green); }
  .f-icon-box.am { background: var(--amber-light); color: var(--amber); }

  /* ===================== STICKY CATEGORY NAV ===================== */
  .ft-cat-nav-sticky {
    position: sticky;
    top: 70px;
    z-index: 40;
    background: rgba(250, 246, 239, 0.96);
    backdrop-filter: blur(10px);
    border-bottom: 1px solid var(--line);
    padding: 14px 0;
    box-shadow: 0 4px 16px rgba(33, 22, 15, 0.03);
  }

  .ft-cat-nav-scroll-wrap {
    position: relative;
  }

  /* Scroll fade hints — left */
  .ft-cat-nav-scroll-wrap::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: 32px;
    background: linear-gradient(to right, rgba(250,246,239,0.96), transparent);
    z-index: 2;
    pointer-events: none;
    opacity: 0;
    transition: opacity 0.2s;
  }

  /* Scroll fade hints — right */
  .ft-cat-nav-scroll-wrap::after {
    content: '';
    position: absolute;
    right: 0;
    top: 0;
    bottom: 0;
    width: 32px;
    background: linear-gradient(to left, rgba(250,246,239,0.96), transparent);
    z-index: 2;
    pointer-events: none;
    opacity: 0;
    transition: opacity 0.2s;
  }

  .ft-cat-nav-row {
    display: flex;
    gap: 8px;
    justify-content: center;
    flex-wrap: wrap;
    padding: 2px 4px;
  }

  .ft-cat-link {
    white-space: nowrap;
    padding: 9px 20px;
    border-radius: 999px;
    font-size: 13.5px;
    font-weight: 600;
    color: var(--ink-soft);
    background: #fff;
    border: 1px solid var(--line);
    text-decoration: none;
    transition: all 0.2s ease;
    flex-shrink: 0;
  }

  .ft-cat-link:hover {
    background: var(--br-light);
    color: var(--br);
    border-color: var(--br);
  }

  .ft-cat-link.active {
    background: var(--br);
    color: #fff;
    border-color: var(--br);
    box-shadow: 0 2px 8px rgba(135,96,57,0.2);
  }

  /* Mobile: single-line horizontal scroll */
  @media (max-width: 900px) {
    .ft-cat-nav-row {
      flex-wrap: nowrap;
      justify-content: flex-start;
      overflow-x: auto;
      scrollbar-width: none;
      -webkit-overflow-scrolling: touch;
      padding: 2px 16px;
    }
    .ft-cat-nav-row::-webkit-scrollbar { display: none; }

    .ft-cat-nav-scroll-wrap::after {
      opacity: 1;
    }

    .ft-cat-link {
      padding: 8px 16px;
      font-size: 13px;
    }
  }

  /* ===================== ECOSYSTEM FLOW ===================== */
  .eco-flow-card {
    background: #fff;
    border-radius: 20px;
    padding: 36px 28px;
    border: 1px solid var(--line);
    box-shadow: var(--shadow-sm);
    margin-bottom: 40px;
  }

  .eco-flow-spine {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 10px;
    flex-wrap: wrap;
    margin-bottom: 28px;
  }

  .eco-flow-node {
    flex: 1;
    min-width: 140px;
    background: #FAF7F2;
    border: 1.5px solid var(--line);
    border-radius: 12px;
    padding: 16px 12px;
    text-align: center;
    transition: all 0.25s ease;
  }
  .eco-flow-node:hover {
    background: var(--br-light);
    border-color: var(--br);
    transform: translateY(-2px);
  }
  .eco-flow-icon {
    width: 36px;
    height: 36px;
    border-radius: 8px;
    background: #fff;
    color: var(--br);
    display: grid;
    place-items: center;
    margin: 0 auto 8px;
    box-shadow: var(--shadow-sm);
  }
  .eco-flow-icon svg { width: 18px; height: 18px; stroke: currentColor; fill: none; stroke-width: 2; }
  .eco-flow-name { font-weight: 600; font-size: 14px; color: var(--ink); }

  .eco-flow-arr {
    color: var(--gold-deep);
    font-size: 18px;
    font-weight: 700;
  }

  .eco-satellites-row {
    display: flex;
    justify-content: center;
    gap: 12px;
    flex-wrap: wrap;
    padding-top: 20px;
    border-top: 1px solid #F0E8DF;
  }

  .eco-pill {
    background: #FAF7F2;
    border: 1px solid rgba(135,96,57,0.18);
    color: var(--brown);
    font-size: 13px;
    font-weight: 500;
    padding: 6px 14px;
    border-radius: 999px;
    display: inline-flex;
    align-items: center;
    gap: 6px;
  }

  /* ===================== FEATURE SHOWCASE CARDS ===================== */
  .ft-grid-2 {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 32px;
  }

  .ft-grid-3 {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 28px;
  }

  .ft-grid-4 {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
  }

  .ft-card {
    background: #fff;
    border-radius: 18px;
    overflow: hidden;
    border: 1px solid var(--line);
    box-shadow: var(--shadow-sm);
    display: flex;
    flex-direction: column;
    transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
  }

  .ft-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-md);
    border-color: rgba(135,96,57,0.3);
  }

  .ft-card-media {
    position: relative;
    height: 200px;
    overflow: hidden;
    background: #231B15;
  }

  .ft-card-media img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
  }

  .ft-card:hover .ft-card-media img {
    transform: scale(1.04);
  }

  .ft-card-tag {
    position: absolute;
    top: 14px;
    left: 14px;
    background: rgba(33, 22, 15, 0.85);
    backdrop-filter: blur(6px);
    color: #fff;
    font-size: 11px;
    font-weight: 600;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    padding: 4px 10px;
    border-radius: 6px;
    border: 1px solid rgba(255,255,255,0.15);
  }

  .ft-card-body {
    padding: 24px;
    display: flex;
    flex-direction: column;
    flex: 1;
  }

  .ft-card-title {
    font-size: 21px;
    margin-bottom: 8px;
  }

  .ft-card-desc {
    font-size: 14px;
    color: var(--ink-soft);
    line-height: 1.55;
    margin-bottom: 18px;
  }

  .ft-features-list {
    list-style: none;
    padding: 0;
    margin: 0 0 20px;
    display: grid;
    grid-template-columns: 1fr;
    gap: 8px;
  }

  .ft-feature-item {
    font-size: 13px;
    color: var(--ink);
    display: flex;
    align-items: center;
    gap: 8px;
  }
  .ft-feature-item svg {
    width: 14px;
    height: 14px;
    stroke: var(--br);
    stroke-width: 2.5;
    fill: none;
    flex-shrink: 0;
  }

  .ft-workflow-strip {
    background: #FAF7F2;
    border-radius: 8px;
    padding: 10px 14px;
    font-size: 12px;
    font-weight: 500;
    color: var(--brown);
    margin-bottom: 20px;
    border: 1px solid rgba(135,96,57,0.12);
  }

  .ft-card-footer {
    margin-top: auto;
    padding-top: 16px;
    border-top: 1px solid #F0E9DF;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .ft-card-link {
    font-size: 14px;
    font-weight: 600;
    color: var(--br);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    transition: gap 0.2s ease;
  }
  .ft-card-link:hover {
    color: var(--br-dark);
    gap: 10px;
  }

  /* ===================== FEATURE SEARCH & FILTER ===================== */
  .ft-search-box {
    background: #fff;
    border-radius: 18px;
    padding: 24px;
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--line);
    margin-bottom: 48px;
  }

  .ft-search-field-wrap {
    position: relative;
    margin-bottom: 18px;
  }

  .ft-search-field-wrap svg {
    position: absolute;
    left: 16px;
    top: 50%;
    transform: translateY(-50%);
    width: 20px;
    height: 20px;
    stroke: var(--ink-faint);
    fill: none;
    stroke-width: 2;
    pointer-events: none;
  }

  .ft-search-input {
    width: 100%;
    padding: 14px 16px 14px 48px;
    border-radius: 10px;
    border: 1px solid var(--line);
    background: #FAF8F5;
    font-size: 15px;
    font-family: inherit;
    color: var(--ink);
    transition: all 0.2s ease;
  }
  .ft-search-input:focus {
    outline: none;
    border-color: var(--br);
    background: #fff;
    box-shadow: 0 0 0 3px rgba(135,96,57,0.12);
  }

  .ft-filter-chips {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
  }

  .ft-chip-btn {
    padding: 7px 16px;
    border-radius: 999px;
    border: 1px solid var(--line);
    background: #FAF7F2;
    color: var(--ink-soft);
    font-size: 13px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s ease;
  }
  .ft-chip-btn:hover {
    border-color: var(--br);
    color: var(--br);
  }
  .ft-chip-btn.active {
    background: var(--br);
    color: #fff;
    border-color: var(--br);
  }

  /* ===================== DIRECTORY SECTION ===================== */
  .ft-dir-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 28px;
  }

  .ft-dir-group {
    background: #fff;
    border-radius: 16px;
    padding: 24px;
    border: 1px solid var(--line);
    box-shadow: var(--shadow-sm);
  }

  .ft-dir-group-title {
    font-size: 16px;
    font-weight: 600;
    color: var(--br);
    border-bottom: 1.5px solid var(--br-light);
    padding-bottom: 10px;
    margin-bottom: 14px;
    display: flex;
    align-items: center;
    gap: 8px;
  }

  .ft-dir-list {
    list-style: none;
    padding: 0;
    margin: 0;
  }

  .ft-dir-list li {
    margin-bottom: 10px;
  }

  .ft-dir-list a {
    font-size: 14px;
    color: var(--ink-soft);
    text-decoration: none;
    display: flex;
    align-items: center;
    justify-content: space-between;
    transition: color 0.2s ease;
  }

  .ft-dir-list a:hover {
    color: var(--br);
  }

  /* ===================== MOBILE DASHBOARD MOCKUP ===================== */
  .mobile-mock-card {
    background: #231B15;
    border-radius: 36px;
    padding: 28px 20px;
    max-width: 320px;
    margin: 0 auto;
    color: #fff;
    box-shadow: var(--shadow-lg);
    border: 4px solid #3F332A;
  }

  .mobile-mock-notch {
    width: 100px;
    height: 18px;
    background: #17110D;
    border-radius: 0 0 12px 12px;
    margin: -28px auto 20px;
  }

  .mobile-mock-screen {
    background: #FAF7F2;
    border-radius: 20px;
    padding: 16px;
    color: var(--ink);
  }

  /* ===================== FAQ ACCORDION ===================== */
  .faq-wrap {
    max-width: 820px;
    margin: 0 auto;
  }

  .faq-card {
    background: #fff;
    border-radius: 14px;
    border: 1px solid var(--line);
    margin-bottom: 14px;
    overflow: hidden;
  }

  .faq-trigger {
    width: 100%;
    padding: 20px 24px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: none;
    border: none;
    text-align: left;
    font-size: 16.5px;
    font-weight: 600;
    color: var(--ink);
    cursor: pointer;
    font-family: inherit;
  }

  .faq-trigger svg {
    width: 20px;
    height: 20px;
    stroke: var(--br);
    fill: none;
    stroke-width: 2.2;
    transition: transform 0.25s ease;
    flex-shrink: 0;
  }

  .faq-card.open .faq-trigger svg {
    transform: rotate(180deg);
  }

  .faq-answer {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease, padding 0.3s ease;
    padding: 0 24px;
    color: var(--ink-soft);
    font-size: 14.5px;
    line-height: 1.65;
  }

  .faq-card.open .faq-answer {
    padding: 0 24px 22px;
    max-height: 220px;
  }

  /* ===================== FINAL CTA ===================== */
  .final-cta-box {
    background: linear-gradient(135deg, #FAF4ED 0%, #EFE4D6 50%, #FAF4ED 100%);
    border-radius: 28px;
    padding: 72px 48px;
    color: #21160F;
    text-align: center;
    box-shadow: 0 16px 40px rgba(135, 96, 57, 0.08);
    border: 1.5px solid rgba(135, 96, 57, 0.22);
    position: relative;
    overflow: hidden;
  }

  .final-cta-box h2 {
    color: #21160F;
    font-size: 42px;
    margin-bottom: 16px;
  }

  .final-cta-box p {
    color: #6E6157;
    font-size: 17px;
    max-width: 640px;
    margin: 0 auto 36px;
  }

  .final-cta-buttons {
    display: flex;
    justify-content: center;
    gap: 16px;
    flex-wrap: wrap;
  }

  /* Responsive Adjustments */
  @media (max-width: 1024px) {
    .ft-hero-grid { grid-template-columns: 1fr; gap: 40px; }
    .ft-grid-3, .ft-grid-4 { grid-template-columns: repeat(2, 1fr); }
    .ft-dir-grid { grid-template-columns: repeat(2, 1fr); }
  }

  @media (max-width: 768px) {
    .section { padding: 60px 0; }
    .ft-hero { padding: 60px 0 40px; }
    .ft-hero h1 { font-size: 32px; }
    .ft-grid-2, .ft-grid-3, .ft-grid-4 { grid-template-columns: 1fr; }
    .ft-dir-grid { grid-template-columns: 1fr; }
    .final-cta-box { padding: 48px 24px; }
    .final-cta-box h2 { font-size: 28px; }
  }
</style>

<div class="ft-page">

  {{-- 1. HERO SECTION --}}
  <section class="ft-hero">
    <div class="w">
      <div class="ft-hero-grid">
        <div data-aos="fade-right">
          <div class="sec-eyebrow">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
            GENI MENU FEATURES
          </div>
          <h1>Everything Your Restaurant Needs. <span class="highlight">Connected in One Platform.</span></h1>
          <p class="lead">From digital menus and orders to kitchen operations, billing, inventory and business reports, Geni Menu brings your essential restaurant operations together in one connected platform.</p>
          
          <div class="ft-hero-cta-group">
            <a href="{{ route('restaurant_signup') }}" class="btn p">Get Started &rarr;</a>
            <button type="button" onclick="openPopup('Book a Demo - Geni Menu Features')" class="btn o">Book a Demo &rarr;</button>
          </div>
        </div>

        {{-- Realistic Hero Dashboard Visual --}}
        <div class="hero-dash-container" data-aos="fade-left">
          <div class="hero-dash-topbar">
            <div class="window-dots">
              <span class="dot r"></span><span class="dot y"></span><span class="dot g"></span>
            </div>
            <div style="font-size:11px; font-family:monospace; opacity:0.8;">Live Restaurant Manager &bull; Geni Fast ERP</div>
          </div>

          <div class="dash-body">
            <div class="dash-metrics-row">
              <div class="dash-metric-card">
                <div class="dash-metric-lbl">Today's Sales</div>
                <div class="dash-metric-val">&#8377;86,450</div>
                <div class="dash-metric-sub">&uarr; +18% vs yesterday</div>
              </div>
              <div class="dash-metric-card">
                <div class="dash-metric-lbl">Active Orders</div>
                <div class="dash-metric-val">18 Orders</div>
                <div class="dash-metric-sub" style="color:var(--amber);">12 Preparing</div>
              </div>
              <div class="dash-metric-card">
                <div class="dash-metric-lbl">Tables Seated</div>
                <div class="dash-metric-val">88% Capacity</div>
                <div class="dash-metric-sub" style="color:var(--blue);">14 / 16 Seated</div>
              </div>
            </div>

            <div class="dash-main-split">
              <div class="dash-sub-panel">
                <div class="dash-panel-title">Active Kitchen &amp; Counter Orders</div>
                <div class="dash-table-row">
                  <div><strong>#1240 &bull; Table 4</strong><br><span style="font-size:11px; color:var(--ink-soft);">Butter Chicken, Garlic Naan (x2)</span></div>
                  <div style="text-align:right;"><span style="color:var(--amber); font-weight:600;">KOT Dispatched</span><br>&#8377;740</div>
                </div>
                <div class="dash-table-row">
                  <div><strong>#1241 &bull; Takeaway</strong><br><span style="font-size:11px; color:var(--ink-soft);">Paneer Tikka Roll, Masala Chai</span></div>
                  <div style="text-align:right;"><span style="color:var(--green); font-weight:600;">Ready for Pickup</span><br>&#8377;310</div>
                </div>
              </div>

              <div class="dash-sub-panel">
                <div class="dash-panel-title">Inventory Alerts</div>
                <div style="margin-bottom:8px;">
                  <span style="color:var(--amber); font-weight:600;">&bull; Paneer:</span> 3.5 kg remaining
                </div>
                <div style="margin-bottom:8px;">
                  <span style="color:var(--green); font-weight:600;">&bull; Basmati Rice:</span> 48 kg in stock
                </div>
                <div style="font-size:11px; color:var(--ink-soft); margin-top:10px;">
                  Auto stock tracking active
                </div>
              </div>
            </div>
          </div>

          {{-- Floating UI Badges --}}
          <div class="hero-float-badge f-1">
            <div class="f-icon-box br"><svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg></div>
            <div>
              <div style="font-size:10px; color:var(--ink-faint);">KITCHEN KOT</div>
              <div style="font-size:12.5px;">KOT #3048 &bull; Station 1</div>
            </div>
          </div>

          <div class="hero-float-badge f-2">
            <div class="f-icon-box gr"><svg viewBox="0 0 24 24"><rect x="2" y="5" width="20" height="14" rx="2"/><line x1="2" y1="10" x2="22" y2="10"/></svg></div>
            <div>
              <div style="font-size:10px; color:var(--ink-faint);">PAYMENT RECEIVED</div>
              <div style="font-size:12.5px; color:var(--green);">&#8377;1,480 &bull; UPI QR</div>
            </div>
          </div>

          <div class="hero-float-badge f-3">
            <div class="f-icon-box am"><svg viewBox="0 0 24 24"><path d="M4 9h16M5 9v10M19 9v10M9 9V5h6v4M7 15h10"/></svg></div>
            <div>
              <div style="font-size:10px; color:var(--ink-faint);">TABLE STATUS</div>
              <div style="font-size:12.5px;">Table 12 &bull; Occupied</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- 2. STICKY CATEGORY NAVIGATION --}}
  <div class="ft-cat-nav-sticky">
    <div class="w">
      <div class="ft-cat-nav-scroll-wrap">
        <div class="ft-cat-nav-row">
          <a href="#all-features" class="ft-cat-link active">All Features</a>
          <a href="#sec-menu" class="ft-cat-link">Menu &amp; Customers</a>
          <a href="#sec-orders" class="ft-cat-link">Orders &amp; Kitchen</a>
          <a href="#sec-tables" class="ft-cat-link">Tables &amp; Reservations</a>
          <a href="#sec-pos" class="ft-cat-link">POS &amp; Payments</a>
          <a href="#sec-inventory" class="ft-cat-link">Inventory &amp; Operations</a>
          <a href="#sec-staff" class="ft-cat-link">Customers &amp; Staff</a>
          <a href="#sec-reports" class="ft-cat-link">Reports &amp; Business</a>
        </div>
      </div>
    </div>
  </div>

  {{-- 3. INTRODUCTION & VISUAL ECOSYSTEM --}}
  <section class="section" id="all-features">
    <div class="w">
      <div class="sec-header" data-aos="fade-up">
        <div class="sec-eyebrow">UNIFIED PLATFORM</div>
        <h2>One Platform. Every Part of Your Restaurant.</h2>
        <p>Geni Menu connects front-of-house, back-of-house and business operations so your team can manage everyday restaurant activities from one connected platform.</p>
      </div>

      <div class="eco-flow-card" data-aos="fade-up">
        <div class="eco-flow-spine">
          <div class="eco-flow-node">
            <div class="eco-flow-icon"><svg viewBox="0 0 24 24"><line x1="18" y1="2" x2="18" y2="22"/><path d="M14 2v7a3 3 0 0 0 6 0V2"/><path d="M6 2v4a2 2 0 0 0 4 0V2"/><line x1="8" y1="8" x2="8" y2="22"/></svg></div>
            <div class="eco-flow-name">Menu</div>
            <div style="font-size:11px; color:var(--ink-soft);">Categories &amp; Items</div>
          </div>
          <span class="eco-flow-arr">&rarr;</span>
          <div class="eco-flow-node">
            <div class="eco-flow-icon"><svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/></svg></div>
            <div class="eco-flow-name">Orders</div>
            <div style="font-size:11px; color:var(--ink-soft);">Table &amp; Counter</div>
          </div>
          <span class="eco-flow-arr">&rarr;</span>
          <div class="eco-flow-node">
            <div class="eco-flow-icon"><svg viewBox="0 0 24 24"><path d="M6 13.87A4 4 0 0 1 7.41 6a5.11 5.11 0 0 1 1.05-1.54 5 5 0 0 1 7.08 0A5.11 5.11 0 0 1 16.59 6 4 4 0 0 1 18 13.87V21H6Z"/></svg></div>
            <div class="eco-flow-name">Kitchen KOT</div>
            <div style="font-size:11px; color:var(--ink-soft);">Live Prep Routing</div>
          </div>
          <span class="eco-flow-arr">&rarr;</span>
          <div class="eco-flow-node">
            <div class="eco-flow-icon"><svg viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="14" rx="2"/><line x1="3" y1="10" x2="21" y2="10"/><line x1="7" y1="15" x2="11" y2="15"/></svg></div>
            <div class="eco-flow-name">Billing POS</div>
            <div style="font-size:11px; color:var(--ink-soft);">3-Click Checkout</div>
          </div>
          <span class="eco-flow-arr">&rarr;</span>
          <div class="eco-flow-node">
            <div class="eco-flow-icon"><svg viewBox="0 0 24 24"><path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg></div>
            <div class="eco-flow-name">Inventory</div>
            <div style="font-size:11px; color:var(--ink-soft);">Recipe Stock Sync</div>
          </div>
          <span class="eco-flow-arr">&rarr;</span>
          <div class="eco-flow-node">
            <div class="eco-flow-icon"><svg viewBox="0 0 24 24"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></div>
            <div class="eco-flow-name">Reports</div>
            <div style="font-size:11px; color:var(--ink-soft);">Sales &amp; Margins</div>
          </div>
        </div>

        <div class="eco-satellites-row">
          <span class="eco-pill">&#9679; Table Management</span>
          <span class="eco-pill">&#9679; Reservations</span>
          <span class="eco-pill">&#9679; Waiter Requests</span>
          <span class="eco-pill">&#9679; Customer CRM</span>
          <span class="eco-pill">&#9679; Staff Roles &amp; Access</span>
          <span class="eco-pill">&#9679; Multi-Branch HQ</span>
        </div>
      </div>
    </div>
  </section>

  {{-- 4. MENU & CUSTOMER EXPERIENCE --}}
  <section class="section alt" id="sec-menu">
    <div class="w">
      <div class="sec-header" data-aos="fade-up">
        <div class="sec-eyebrow">MENU &amp; CUSTOMER EXPERIENCE</div>
        <h2>Create Better Customer Experiences From the First Click.</h2>
        <p>Manage your menu, products and customer interactions from one connected system.</p>
      </div>

      <div class="ft-grid-3">
        {{-- Card: Menu Management --}}
        <div class="ft-card" data-aos="fade-up">
          <div class="ft-card-media">
            <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?q=80&w=900&auto=format&fit=crop" alt="Menu Management" loading="lazy">
            <span class="ft-card-tag">Core Menu</span>
          </div>
          <div class="ft-card-body">
            <h3 class="ft-card-title">Menu Management</h3>
            <p class="ft-card-desc">Create, organize and update your restaurant menu from one simple dashboard.</p>
            <ul class="ft-features-list">
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Menu categories &amp; sub-items</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Pricing, variations &amp; addons where supported</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Real-time availability &amp; 86-ing</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Digital QR menu instant publishing</li>
            </ul>
            <div class="ft-card-footer">
              <a href="{{ route('features.menu-management') }}" class="ft-card-link">Explore Menu Management &rarr;</a>
            </div>
          </div>
        </div>

        {{-- Card: Customer Management --}}
        <div class="ft-card" data-aos="fade-up" data-aos-delay="50">
          <div class="ft-card-media">
            <img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?q=80&w=900&auto=format&fit=crop" alt="Customer Management" loading="lazy">
            <span class="ft-card-tag">Guest Retention</span>
          </div>
          <div class="ft-card-body">
            <h3 class="ft-card-title">Customer Management (CRM)</h3>
            <p class="ft-card-desc">Keep customer information, visit counts and order history organized to drive repeat dining.</p>
            <ul class="ft-features-list">
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Centralized guest directory &amp; phone contacts</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Full visit logs &amp; past dining receipts</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Customer-linked orders for fast billing</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Birthday and anniversary engagement</li>
            </ul>
            <div class="ft-card-footer">
              <a href="{{ route('restaurant_signup') }}" class="ft-card-link">Explore Customer Management &rarr;</a>
            </div>
          </div>
        </div>

        {{-- Card: Kiosk Ordering --}}
        <div class="ft-card" data-aos="fade-up" data-aos-delay="100">
          <div class="ft-card-media">
            <img src="https://images.unsplash.com/photo-1556742049-0a67e5572293?q=80&w=900&auto=format&fit=crop" alt="Kiosk Ordering" loading="lazy">
            <span class="ft-card-tag">Self-Service</span>
          </div>
          <div class="ft-card-body">
            <h3 class="ft-card-title">Kiosk Ordering</h3>
            <p class="ft-card-desc">Make self-service ordering intuitive and queue-free with interactive touch kiosk mode.</p>
            <ul class="ft-features-list">
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Digital visual product browsing</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Self-order creation directly to kitchen KOT</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Smart upselling combos &amp; beverage prompts</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Supported contactless counter payment</li>
            </ul>
            <div class="ft-card-footer">
              <a href="{{ route('features.order-management') }}" class="ft-card-link">Explore Kiosk Ordering &rarr;</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- 5. ORDERS & KITCHEN --}}
  <section class="section" id="sec-orders">
    <div class="w">
      <div class="sec-header" data-aos="fade-up">
        <div class="sec-eyebrow">ORDERS &amp; KITCHEN</div>
        <h2>From Customer Order to Kitchen Preparation.</h2>
        <p>Keep orders organized and give your kitchen team a clear view of what needs to be prepared without confusion.</p>
      </div>

      <div class="ft-grid-2">
        {{-- Card: Order Management --}}
        <div class="ft-card" data-aos="fade-up">
          <div class="ft-card-media">
            <img src="https://images.unsplash.com/photo-1552566626-52f8b828add9?q=80&w=900&auto=format&fit=crop" alt="Order Management" loading="lazy">
            <span class="ft-card-tag">Order Pipeline</span>
          </div>
          <div class="ft-card-body">
            <h3 class="ft-card-title">Order Management</h3>
            <p class="ft-card-desc">Manage dine-in, takeaway and supported order types from one unified workspace.</p>
            <ul class="ft-features-list">
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Live order status (Pending, Cooking, Ready, Completed)</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Table-linked orders &amp; takeaway parcel tags</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Item modifications, cooking instructions &amp; special notes</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Direct dispatch into kitchen prep queues</li>
            </ul>
            <div class="ft-card-footer">
              <a href="{{ route('features.order-management') }}" class="ft-card-link">Explore Order Management &rarr;</a>
            </div>
          </div>
        </div>

        {{-- Card: KOT Management --}}
        <div class="ft-card" data-aos="fade-up" data-aos-delay="50">
          <div class="ft-card-media">
            <img src="https://images.unsplash.com/photo-1578474846511-04ba529f0b88?q=80&w=900&auto=format&fit=crop" alt="KOT Management" loading="lazy">
            <span class="ft-card-tag">Kitchen Tickets</span>
          </div>
          <div class="ft-card-body">
            <h3 class="ft-card-title">KOT (Kitchen Order Ticket) Management</h3>
            <p class="ft-card-desc">Use Kitchen Order Tickets to communicate order details accurately to the kitchen staff.</p>
            <ul class="ft-features-list">
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Instant digital &amp; thermal KOT ticket dispatch</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Item-level preparation notes &amp; allergy highlights</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Multi-station kitchen routing where supported</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Elimination of verbal misunderstandings in the kitchen</li>
            </ul>
            <div class="ft-card-footer">
              <a href="{{ route('features.kot-management') }}" class="ft-card-link">Explore KOT Management &rarr;</a>
            </div>
          </div>
        </div>

        {{-- Card: Kitchen Management --}}
        <div class="ft-card" data-aos="fade-up">
          <div class="ft-card-media">
            <img src="https://images.unsplash.com/photo-1556910103-1c02745aae4d?q=80&w=900&auto=format&fit=crop" alt="Kitchen Operations" loading="lazy">
            <span class="ft-card-tag">Kitchen Operations</span>
          </div>
          <div class="ft-card-body">
            <h3 class="ft-card-title">Kitchen Operations Management</h3>
            <p class="ft-card-desc">Manage active kitchen orders, preparation activity and coordination between cook stations.</p>
            <ul class="ft-features-list">
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Real-time view of all preparing dishes</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Order prioritization during rush dining hours</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Ready notification handover to serving staff</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Multi-course dining coordination where supported</li>
            </ul>
            <div class="ft-card-footer">
              <a href="{{ route('features.kot-management') }}" class="ft-card-link">Explore Kitchen Management &rarr;</a>
            </div>
          </div>
        </div>

        {{-- Card: Waiter Requests --}}
        <div class="ft-card" data-aos="fade-up" data-aos-delay="50">
          <div class="ft-card-media">
            <img src="https://images.unsplash.com/photo-1590846406792-0adc7f938f1d?q=80&w=900&auto=format&fit=crop" alt="Waiter Requests" loading="lazy">
            <span class="ft-card-tag">Table Calls</span>
          </div>
          <div class="ft-card-body">
            <h3 class="ft-card-title">Waiter Requests</h3>
            <p class="ft-card-desc">Help floor teams respond to guest calls and table service requests faster and without shouting.</p>
            <div class="ft-workflow-strip">
              <strong>Workflow:</strong> Request &rarr; Staff Notify &rarr; Respond &rarr; Complete
            </div>
            <ul class="ft-features-list">
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> One-tap QR call waiter, water refill, and bill request</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Real-time notifications on assigned waiter devices</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Live table-linked request tracking &amp; resolution timers</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Higher table turnover &amp; improved diner satisfaction</li>
            </ul>
            <div class="ft-card-footer">
              <a href="{{ route('features.waiter-request') }}" class="ft-card-link">Explore Waiter Requests &rarr;</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- 6. TABLES & RESERVATIONS --}}
  <section class="section alt" id="sec-tables">
    <div class="w">
      <div class="sec-header" data-aos="fade-up">
        <div class="sec-eyebrow">TABLES &amp; RESERVATIONS</div>
        <h2>Know Every Table. Manage Every Booking.</h2>
        <p>Keep your dining floor organized and connect reservations directly with table operations.</p>
      </div>

      <div class="ft-grid-2">
        {{-- Card: Table Management --}}
        <div class="ft-card" data-aos="fade-up">
          <div class="ft-card-media">
            <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?q=80&w=900&auto=format&fit=crop" alt="Table Management" loading="lazy">
            <span class="ft-card-tag">Dining Floor</span>
          </div>
          <div class="ft-card-body">
            <h3 class="ft-card-title">Table Management</h3>
            <p class="ft-card-desc">Visual floor plans with live color-coded dining status to manage seatings effortlessly.</p>
            <ul class="ft-features-list">
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Interactive visual restaurant floor map</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Live status indicators (Available, Occupied, Billed)</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Multi-zone seating (AC Hall, Garden, Rooftop)</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Table-linked orders &amp; instant waiter assignment</li>
            </ul>
            <div class="ft-card-footer">
              <a href="{{ route('features.table-management') }}" class="ft-card-link">Explore Table Management &rarr;</a>
            </div>
          </div>
        </div>

        {{-- Card: Reservation Management --}}
        <div class="ft-card" data-aos="fade-up" data-aos-delay="50">
          <div class="ft-card-media">
            <img src="https://images.unsplash.com/photo-1544025162-d76694265947?q=80&w=900&auto=format&fit=crop" alt="Reservation Management" loading="lazy">
            <span class="ft-card-tag">Guest Bookings</span>
          </div>
          <div class="ft-card-body">
            <h3 class="ft-card-title">Reservation Management</h3>
            <p class="ft-card-desc">Manage guest bookings, seating capacity and arrival status from one synchronized calendar.</p>
            <ul class="ft-features-list">
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Advance table booking creation &amp; guest contact storage</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Reservation calendar with time slot allocation</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Prevention of double-bookings during peak hours</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Direct connection to table allocation upon arrival</li>
            </ul>
            <div class="ft-card-footer">
              <a href="{{ route('features.reservation-management') }}" class="ft-card-link">Explore Reservation Management &rarr;</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- 7. POS & PAYMENTS --}}
  <section class="section" id="sec-pos">
    <div class="w">
      <div class="sec-header" data-aos="fade-up">
        <div class="sec-eyebrow">POS &amp; PAYMENTS</div>
        <h2>Faster Billing. Smoother Restaurant Operations.</h2>
        <p>Process orders, print thermal receipts and collect payments through a restaurant-focused POS workflow.</p>
      </div>

      <div class="ft-grid-3">
        {{-- Card: POS Management --}}
        <div class="ft-card" data-aos="fade-up">
          <div class="ft-card-media">
            <img src="https://images.unsplash.com/photo-1556740738-b6a63e27c4df?q=80&w=900&auto=format&fit=crop" alt="POS Management" loading="lazy">
            <span class="ft-card-tag">Fast Billing</span>
          </div>
          <div class="ft-card-body">
            <h3 class="ft-card-title">POS Management</h3>
            <p class="ft-card-desc">Lightning-fast billing built for high-volume lunch rushes and counter operations.</p>
            <div class="ft-workflow-strip">
              <strong>Workflow:</strong> Select &rarr; Order &rarr; Bill &rarr; Pay &rarr; Complete
            </div>
            <ul class="ft-features-list">
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> 3-click bill generation with barcode support</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Split bills, custom discounts &amp; GST compliance</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Dine-in, takeaway, delivery &amp; counter modes</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Thermal receipt &amp; digital e-bill printing</li>
            </ul>
            <div class="ft-card-footer">
              <a href="{{ route('features.pos-management') }}" class="ft-card-link">Explore POS Management &rarr;</a>
            </div>
          </div>
        </div>

        {{-- Card: Payments Management --}}
        <div class="ft-card" data-aos="fade-up" data-aos-delay="50">
          <div class="ft-card-media">
            <img src="https://images.unsplash.com/photo-1559526324-4b87b5e36e44?q=80&w=900&auto=format&fit=crop" alt="Payments Management" loading="lazy">
            <span class="ft-card-tag">Payment Records</span>
          </div>
          <div class="ft-card-body">
            <h3 class="ft-card-title">Payments Management</h3>
            <p class="ft-card-desc">Frictionless payment acceptance and automated day-end cash reconciliation.</p>
            <ul class="ft-features-list">
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Cash, Dynamic UPI QR, Card &amp; Net Banking</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Transaction logs with cashier timestamp audit</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Automated daily closing register reconciliation</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Zero revenue leakage across multiple payment modes</li>
            </ul>
            <div class="ft-card-footer">
              <a href="{{ route('features.pos-management') }}" class="ft-card-link">Explore Payments &rarr;</a>
            </div>
          </div>
        </div>

        {{-- Card: Payment Gateway Integration --}}
        <div class="ft-card" data-aos="fade-up" data-aos-delay="100">
          <div class="ft-card-media">
            <img src="https://images.unsplash.com/photo-1563013544-824ae1b704d3?q=80&w=900&auto=format&fit=crop" alt="Payment Gateway" loading="lazy">
            <span class="ft-card-tag">Online Gateway</span>
          </div>
          <div class="ft-card-body">
            <h3 class="ft-card-title">Payment Gateway</h3>
            <p class="ft-card-desc">Connect modern digital payment gateways for online ordering and contactless checkout.</p>
            <ul class="ft-features-list">
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Gateway integration support where available</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Online payment status verification</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Digital transaction records and settlement logs</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Available in applicable subscription plans</li>
            </ul>
            <div class="ft-card-footer">
              <a href="{{ route('features.pos-management') }}" class="ft-card-link">Explore Gateways &rarr;</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- 8. INVENTORY & OPERATIONS --}}
  <section class="section alt" id="sec-inventory">
    <div class="w">
      <div class="sec-header" data-aos="fade-up">
        <div class="sec-eyebrow">INVENTORY &amp; OPERATIONS</div>
        <h2>Stay Ready for Every Service.</h2>
        <p>Monitor stock, raw materials, expenses and operational activity to keep your restaurant prepared.</p>
      </div>

      <div class="ft-grid-2">
        {{-- Card: Inventory Management --}}
        <div class="ft-card" data-aos="fade-up">
          <div class="ft-card-media">
            <img src="https://images.unsplash.com/photo-1542838132-92c53300491e?q=80&w=900&auto=format&fit=crop" alt="Inventory Management" loading="lazy">
            <span class="ft-card-tag">Stock Control</span>
          </div>
          <div class="ft-card-body">
            <h3 class="ft-card-title">Inventory Management</h3>
            <p class="ft-card-desc">Real-time raw material tracking, low-stock alerts, and wastage control for lower food costs.</p>
            <div class="ft-workflow-strip">
              <strong>Workflow:</strong> Purchase &rarr; Stock &rarr; Consume &rarr; Monitor &rarr; Replenish
            </div>
            <ul class="ft-features-list">
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Ingredient stock levels, units (kg, liters, pcs)</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Low-stock automated alerts before ingredients run out</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Vendor purchase records where supported</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Stock movement &amp; manual adjustment logs</li>
            </ul>
            <div class="ft-card-footer">
              <a href="{{ route('features.inventory-management') }}" class="ft-card-link">Explore Inventory &rarr;</a>
            </div>
          </div>
        </div>

        {{-- Card: Expense Management --}}
        <div class="ft-card" data-aos="fade-up" data-aos-delay="50">
          <div class="ft-card-media">
            <img src="https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?q=80&w=900&auto=format&fit=crop" alt="Expense Management" loading="lazy">
            <span class="ft-card-tag">Expense Tracking</span>
          </div>
          <div class="ft-card-body">
            <h3 class="ft-card-title">Expense Management</h3>
            <p class="ft-card-desc">Keep operational expenses visible across categories like ingredients, utilities, and maintenance.</p>
            <ul class="ft-features-list">
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Categorized expense vouchers (Kitchen, Staff, Maintenance)</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Date-based expense tracking &amp; petty cash records</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Net profit vs. operating cost comparisons</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Instant export for accounting and audits</li>
            </ul>
            <div class="ft-card-footer">
              <a href="{{ route('features.inventory-management') }}" class="ft-card-link">Explore Expenses &rarr;</a>
            </div>
          </div>
        </div>

        {{-- Card: Multiple Kitchen --}}
        <div class="ft-card" data-aos="fade-up">
          <div class="ft-card-media">
            <img src="https://images.unsplash.com/photo-1556910103-1c02745aae4d?q=80&w=900&auto=format&fit=crop" alt="Multiple Kitchens" loading="lazy">
            <span class="ft-card-tag">Kitchen Stations</span>
          </div>
          <div class="ft-card-body">
            <h3 class="ft-card-title">Multiple Kitchen Management</h3>
            <p class="ft-card-desc">Organize multiple preparation stations like Grill, Pizza Oven, Bakery, and Beverage Bar seamlessly.</p>
            <ul class="ft-features-list">
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Station-specific item routing (Grill, Bar, Bakery)</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Independent station printers or digital screens where supported</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Reduced chaos and cross-kitchen congestion</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Available in applicable multi-station plans</li>
            </ul>
            <div class="ft-card-footer">
              <a href="{{ route('features.kot-management') }}" class="ft-card-link">Explore Multiple Kitchens &rarr;</a>
            </div>
          </div>
        </div>

        {{-- Card: Multiple Branch --}}
        <div class="ft-card" data-aos="fade-up" data-aos-delay="50">
          <div class="ft-card-media">
            <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?q=80&w=900&auto=format&fit=crop" alt="Multi-Branch Management" loading="lazy">
            <span class="ft-card-tag">Multi-Outlet</span>
          </div>
          <div class="ft-card-body">
            <h3 class="ft-card-title">Multiple Branch Management</h3>
            <p class="ft-card-desc">Control multiple restaurant locations and franchise outlets from a single head-office workspace.</p>
            <ul class="ft-features-list">
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> 1-click branch switching from master admin</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Branch-wise sales comparisons &amp; revenue leaderboards</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Centralized menu catalog with outlet-level pricing</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Inter-branch stock tracking where enabled</li>
            </ul>
            <div class="ft-card-footer">
              <a href="{{ route('features') }}" class="ft-card-link">Explore Multi-Branch &rarr;</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- 9. CUSTOMERS & STAFF --}}
  <section class="section" id="sec-staff">
    <div class="w">
      <div class="sec-header" data-aos="fade-up">
        <div class="sec-eyebrow">CUSTOMERS &amp; STAFF</div>
        <h2>Give Your Team the Right Tools.</h2>
        <p>Set clear roles, safeguard billing permissions, and coordinate staff with ease.</p>
      </div>

      <div class="ft-grid-2">
        {{-- Card: Staff Management --}}
        <div class="ft-card" data-aos="fade-up">
          <div class="ft-card-media">
            <img src="https://images.unsplash.com/photo-1600565193348-f74bd3c7ccdf?q=80&w=900&auto=format&fit=crop" alt="Staff Management" loading="lazy">
            <span class="ft-card-tag">Team Permissions</span>
          </div>
          <div class="ft-card-body">
            <h3 class="ft-card-title">Staff Management</h3>
            <p class="ft-card-desc">Granular roles and permission controls to manage cashiers, waiters, chefs, and store managers.</p>
            <ul class="ft-features-list">
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Role-based security for Admin, Cashier, Waiter, and Chef</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Protection against unauthorized bill edits and discounts</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Waiter table assignment &amp; order punching logging</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Complete accountability for staff actions</li>
            </ul>
            <div class="ft-card-footer">
              <a href="{{ route('restaurant_signup') }}" class="ft-card-link">Explore Staff Management &rarr;</a>
            </div>
          </div>
        </div>

        {{-- Card: Delivery Executive Management --}}
        <div class="ft-card" data-aos="fade-up" data-aos-delay="50">
          <div class="ft-card-media">
            <img src="https://images.unsplash.com/photo-1526367790999-0150786686a2?q=80&w=900&auto=format&fit=crop" alt="Delivery Management" loading="lazy">
            <span class="ft-card-tag">Rider Operations</span>
          </div>
          <div class="ft-card-body">
            <h3 class="ft-card-title">Delivery Executive Management</h3>
            <p class="ft-card-desc">Keep takeaway delivery operations organized and assign orders to delivery personnel where supported.</p>
            <ul class="ft-features-list">
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Delivery executive profiles &amp; contact logs</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Order assignment workflow where supported</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Delivery dispatch and handover status</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Cash-on-delivery tracking in applicable plans</li>
            </ul>
            <div class="ft-card-footer">
              <a href="{{ route('features.order-management') }}" class="ft-card-link">Explore Delivery Management &rarr;</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- 10. REPORTS & BUSINESS --}}
  <section class="section alt" id="sec-reports">
    <div class="w">
      <div class="sec-header" data-aos="fade-up">
        <div class="sec-eyebrow">REPORTS &amp; BUSINESS</div>
        <h2>Turn Restaurant Data Into Better Decisions.</h2>
        <p>Understand sales, orders, payments, products, inventory and business activity through clear reports.</p>
      </div>

      <div class="ft-grid-3">
        {{-- Card: Reports & Analytics --}}
        <div class="ft-card" data-aos="fade-up">
          <div class="ft-card-body">
            <span class="sec-eyebrow" style="margin-bottom:8px;">ANALYTICS ENGINE</span>
            <h3 class="ft-card-title">Reports &amp; Analytics</h3>
            <p class="ft-card-desc">Real-time revenue, item popularity, and peak sales hour intelligence.</p>
            
            <div style="background:#FAF7F2; border-radius:10px; padding:14px; border:1px solid var(--line); margin-bottom:18px; font-size:12.5px;">
              <div style="display:flex; justify-content:space-between; margin-bottom:6px;"><span>Today's Sales:</span> <strong>&#8377;86,450</strong></div>
              <div style="display:flex; justify-content:space-between; margin-bottom:6px;"><span>Total Orders:</span> <strong>94</strong></div>
              <div style="display:flex; justify-content:space-between; margin-bottom:6px;"><span>Average Order Value:</span> <strong>&#8377;920</strong></div>
              <div style="display:flex; justify-content:space-between;"><span>Best Seller:</span> <strong>Margherita Pizza</strong></div>
              <div style="font-size:10px; color:var(--ink-faint); margin-top:8px; text-align:right;">*Sample demo data</div>
            </div>

            <div class="ft-card-footer">
              <a href="{{ route('features.reports') }}" class="ft-card-link">Explore Reports &rarr;</a>
            </div>
          </div>
        </div>

        {{-- Card: Export Reports --}}
        <div class="ft-card" data-aos="fade-up" data-aos-delay="50">
          <div class="ft-card-body">
            <span class="sec-eyebrow" style="margin-bottom:8px;">DATA EXPORT</span>
            <h3 class="ft-card-title">Export Reports</h3>
            <p class="ft-card-desc">Take your business data with you for tax filing, audits, or external spreadsheets.</p>
            <ul class="ft-features-list">
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Date-filtered sales revenue reports</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Item-wise order summaries &amp; quantities</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Payment breakdown (Cash, UPI, Card)</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Inventory consumption &amp; wastage logs</li>
            </ul>
            <div class="ft-card-footer">
              <a href="{{ route('features.reports') }}" class="ft-card-link">Explore Exports &rarr;</a>
            </div>
          </div>
        </div>

        {{-- Card: Customized Settings --}}
        <div class="ft-card" data-aos="fade-up" data-aos-delay="100">
          <div class="ft-card-body">
            <span class="sec-eyebrow" style="margin-bottom:8px;">CONFIGURATION</span>
            <h3 class="ft-card-title">Customized Settings</h3>
            <p class="ft-card-desc">Configure taxes, receipts, currencies, and dining operational preferences to match your brand.</p>
            <ul class="ft-features-list">
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Custom receipt headers, footers &amp; logos</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Flexible GST, VAT, service charges &amp; tips</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Operational preferences &amp; currency controls</li>
              <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> User settings where supported</li>
            </ul>
            <div class="ft-card-footer">
              <a href="{{ route('restaurant_signup') }}" class="ft-card-link">Explore Settings &rarr;</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- 11. FEATURE FINDER --}}
  <section class="section">
    <div class="w">
      <div class="sec-header" data-aos="fade-up">
        <div class="sec-eyebrow">FEATURE SEARCH</div>
        <h2>Looking for Something Specific?</h2>
        <p>Search across our platform modules or filter by operational category.</p>
      </div>

      <div class="ft-search-box" data-aos="fade-up">
        <div class="ft-search-field-wrap">
          <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
          <input type="text" id="featureSearchInput" class="ft-search-input" placeholder="Search features (e.g., KOT, split bill, reservations, inventory, multi-branch, kiosk)...">
        </div>

        <div class="ft-filter-chips">
          <button type="button" class="ft-chip-btn active" data-filter="all">All</button>
          <button type="button" class="ft-chip-btn" data-filter="menu">Menu</button>
          <button type="button" class="ft-chip-btn" data-filter="orders">Orders</button>
          <button type="button" class="ft-chip-btn" data-filter="kitchen">Kitchen</button>
          <button type="button" class="ft-chip-btn" data-filter="tables">Tables</button>
          <button type="button" class="ft-chip-btn" data-filter="reservations">Reservations</button>
          <button type="button" class="ft-chip-btn" data-filter="pos">POS</button>
          <button type="button" class="ft-chip-btn" data-filter="payments">Payments</button>
          <button type="button" class="ft-chip-btn" data-filter="inventory">Inventory</button>
          <button type="button" class="ft-chip-btn" data-filter="staff">Staff</button>
          <button type="button" class="ft-chip-btn" data-filter="reports">Reports</button>
          <button type="button" class="ft-chip-btn" data-filter="branches">Branches</button>
        </div>
      </div>

      {{-- 12. COMPACT FEATURE DIRECTORY --}}
      <div class="ft-dir-grid" data-aos="fade-up">
        <div class="ft-dir-group searchable-feature-group" data-tags="menu customers kiosk">
          <div class="ft-dir-group-title">&#128214; Menu &amp; Customer Experience</div>
          <ul class="ft-dir-list">
            <li><a href="{{ route('features.menu-management') }}">Menu Management <span>&rarr;</span></a></li>
            <li><a href="{{ route('restaurant_signup') }}">Customer CRM <span>&rarr;</span></a></li>
            <li><a href="{{ route('features.order-management') }}">Kiosk Ordering <span>&rarr;</span></a></li>
          </ul>
        </div>

        <div class="ft-dir-group searchable-feature-group" data-tags="orders kitchen kot waiter">
          <div class="ft-dir-group-title">&#128104;&#8205;&#127859; Orders &amp; Kitchen</div>
          <ul class="ft-dir-list">
            <li><a href="{{ route('features.order-management') }}">Order Management <span>&rarr;</span></a></li>
            <li><a href="{{ route('features.kot-management') }}">KOT Management <span>&rarr;</span></a></li>
            <li><a href="{{ route('features.kot-management') }}">Kitchen Operations <span>&rarr;</span></a></li>
            <li><a href="{{ route('features.waiter-request') }}">Waiter Requests <span>&rarr;</span></a></li>
          </ul>
        </div>

        <div class="ft-dir-group searchable-feature-group" data-tags="tables reservations floor">
          <div class="ft-dir-group-title">&#129681; Tables &amp; Reservations</div>
          <ul class="ft-dir-list">
            <li><a href="{{ route('features.table-management') }}">Table Management <span>&rarr;</span></a></li>
            <li><a href="{{ route('features.reservation-management') }}">Reservation Calendar <span>&rarr;</span></a></li>
          </ul>
        </div>

        <div class="ft-dir-group searchable-feature-group" data-tags="pos payments billing gateway">
          <div class="ft-dir-group-title">&#128179; POS &amp; Payments</div>
          <ul class="ft-dir-list">
            <li><a href="{{ route('features.pos-management') }}">POS &amp; Fast Billing <span>&rarr;</span></a></li>
            <li><a href="{{ route('features.pos-management') }}">Payments Management <span>&rarr;</span></a></li>
            <li><a href="{{ route('features.pos-management') }}">Online Gateway Integration <span>&rarr;</span></a></li>
          </ul>
        </div>

        <div class="ft-dir-group searchable-feature-group" data-tags="inventory operations stock expenses branches">
          <div class="ft-dir-group-title">&#128230; Inventory &amp; Operations</div>
          <ul class="ft-dir-list">
            <li><a href="{{ route('features.inventory-management') }}">Inventory &amp; Stock <span>&rarr;</span></a></li>
            <li><a href="{{ route('features.inventory-management') }}">Expense Management <span>&rarr;</span></a></li>
            <li><a href="{{ route('features.kot-management') }}">Multiple Kitchen Stations <span>&rarr;</span></a></li>
            <li><a href="{{ route('features') }}">Multiple Branch HQ <span>&rarr;</span></a></li>
          </ul>
        </div>

        <div class="ft-dir-group searchable-feature-group" data-tags="reports analytics exports settings staff">
          <div class="ft-dir-group-title">&#128202; Business &amp; Staff</div>
          <ul class="ft-dir-list">
            <li><a href="{{ route('features.reports') }}">Reports &amp; Analytics <span>&rarr;</span></a></li>
            <li><a href="{{ route('features.reports') }}">Export Reports <span>&rarr;</span></a></li>
            <li><a href="{{ route('restaurant_signup') }}">Staff Roles &amp; Permissions <span>&rarr;</span></a></li>
            <li><a href="{{ route('restaurant_signup') }}">Customized Settings <span>&rarr;</span></a></li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  {{-- 13. WHY GENI MENU? (BENEFITS) --}}
  <section class="section alt">
    <div class="w">
      <div class="sec-header" data-aos="fade-up">
        <div class="sec-eyebrow">THE OPERATIONAL DIFFERENCE</div>
        <h2>More Than a Menu. A Complete Restaurant Operations Platform.</h2>
        <p>A unified suite built around actual hospitality daily operations.</p>
      </div>

      <div class="ft-grid-4" data-aos="fade-up">
        <div style="background:#fff; border-radius:16px; padding:26px 20px; border:1px solid var(--line);">
          <div class="f-icon-box br" style="margin-bottom:16px;"><svg viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg></div>
          <h4 style="font-size:18px; margin-bottom:8px;">Connected Operations</h4>
          <p style="font-size:13.5px;">Your menu, orders, kitchen, billing, inventory and reports work within one connected ecosystem.</p>
        </div>

        <div style="background:#fff; border-radius:16px; padding:26px 20px; border:1px solid var(--line);">
          <div class="f-icon-box gr" style="margin-bottom:16px;"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 14 14"/></svg></div>
          <h4 style="font-size:18px; margin-bottom:8px;">Faster Service</h4>
          <p style="font-size:13.5px;">Give restaurant teams the tools they need to punch orders, clear tables, and process bills in seconds.</p>
        </div>

        <div style="background:#fff; border-radius:16px; padding:26px 20px; border:1px solid var(--line);">
          <div class="f-icon-box am" style="margin-bottom:16px;"><svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg></div>
          <h4 style="font-size:18px; margin-bottom:8px;">Better Visibility</h4>
          <p style="font-size:13.5px;">Get a clearer view of sales, orders, ingredient inventory and business activity from anywhere.</p>
        </div>

        <div style="background:#fff; border-radius:16px; padding:26px 20px; border:1px solid var(--line);">
          <div class="f-icon-box br" style="margin-bottom:16px;"><svg viewBox="0 0 24 24"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg></div>
          <h4 style="font-size:18px; margin-bottom:8px;">Built to Grow</h4>
          <p style="font-size:13.5px;">Start with essential features and expand into advanced and multi-branch capabilities as your business grows.</p>
        </div>
      </div>
    </div>
  </section>

  {{-- 14. MOBILE MANAGEMENT SHOWCASE --}}
  <section class="section">
    <div class="w">
      <div style="display:grid; grid-template-columns:1fr 1fr; gap:48px; align-items:center;">
        <div data-aos="fade-right">
          <div class="sec-eyebrow">MOBILE MANAGEMENT</div>
          <h2 style="font-size:36px; margin-bottom:16px;">Your Restaurant. At a Glance.</h2>
          <p style="font-size:16.5px; line-height:1.65; margin-bottom:24px;">Keep an eye on important restaurant activity through a mobile-friendly management experience where supported.</p>
          <ul class="ft-features-list" style="margin-bottom:32px;">
            <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Live revenue updates from anywhere</li>
            <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Active kitchen order monitoring</li>
            <li class="ft-feature-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Low-stock alerts right in your hand</li>
          </ul>
          <a href="{{ route('restaurant_signup') }}" class="btn p">Get Started on Mobile &rarr;</a>
        </div>

        <div data-aos="fade-left">
          <div class="mobile-mock-card">
            <div class="mobile-mock-notch"></div>
            <div class="mobile-mock-screen">
              <div style="font-size:11px; text-transform:uppercase; color:var(--ink-faint); margin-bottom:4px;">Today's Sales</div>
              <div style="font-size:22px; font-weight:700; color:var(--ink); margin-bottom:14px;">&#8377;86,450</div>
              
              <div style="background:#fff; border-radius:10px; padding:12px; margin-bottom:10px; border:1px solid var(--line); font-size:12px;">
                <div style="display:flex; justify-content:space-between;"><span>Active Orders:</span> <strong>18</strong></div>
                <div style="display:flex; justify-content:space-between; margin-top:4px;"><span>Preparing:</span> <strong style="color:var(--amber);">9</strong></div>
              </div>

              <div style="background:#fff; border-radius:10px; padding:12px; border:1px solid var(--line); font-size:12px;">
                <div style="display:flex; justify-content:space-between;"><span>Low Stock:</span> <strong style="color:var(--amber);">4 Items</strong></div>
                <div style="display:flex; justify-content:space-between; margin-top:4px;"><span>Best Seller:</span> <strong>Margherita Pizza</strong></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- 15. INDUSTRY-SPECIFIC FEATURES --}}
  <section class="section alt">
    <div class="w">
      <div class="sec-header" data-aos="fade-up">
        <div class="sec-eyebrow">TAILORED INDUSTRY SUITES</div>
        <h2>Features That Adapt to Your Business.</h2>
        <p>Explore configured feature sets for different food and hospitality concepts.</p>
      </div>

      <div class="ft-grid-4" data-aos="fade-up">
        <div style="background:#fff; border-radius:14px; padding:20px; border:1px solid var(--line);">
          <h4 style="font-size:17px; margin-bottom:6px; color:var(--br);">Restaurants</h4>
          <p style="font-size:13px;">Menu, orders, POS, tables, kitchen and reports.</p>
        </div>

        <div style="background:#fff; border-radius:14px; padding:20px; border:1px solid var(--line);">
          <h4 style="font-size:17px; margin-bottom:6px; color:var(--br);">QSRs</h4>
          <p style="font-size:13px;">Fast ordering, POS, KOT and high-volume operations.</p>
        </div>

        <div style="background:#fff; border-radius:14px; padding:20px; border:1px solid var(--line);">
          <h4 style="font-size:17px; margin-bottom:6px; color:var(--br);">Bakeries &amp; Cakes</h4>
          <p style="font-size:13px;">Products, orders, customers, inventory and billing.</p>
        </div>

        <div style="background:#fff; border-radius:14px; padding:20px; border:1px solid var(--line);">
          <h4 style="font-size:17px; margin-bottom:6px; color:var(--br);">Sweet Shops</h4>
          <p style="font-size:13px;">Product catalogue, orders, POS and inventory.</p>
        </div>

        <div style="background:#fff; border-radius:14px; padding:20px; border:1px solid var(--line);">
          <h4 style="font-size:17px; margin-bottom:6px; color:var(--br);">Juice &amp; Beverage</h4>
          <p style="font-size:13px;">Fast counter orders, products, payments and inventory.</p>
        </div>

        <div style="background:#fff; border-radius:14px; padding:20px; border:1px solid var(--line);">
          <h4 style="font-size:17px; margin-bottom:6px; color:var(--br);">Pizzerias</h4>
          <p style="font-size:13px;">Product variations, orders, KOT, kitchen and billing.</p>
        </div>

        <div style="background:#fff; border-radius:14px; padding:20px; border:1px solid var(--line);">
          <h4 style="font-size:17px; margin-bottom:6px; color:var(--br);">Caf&eacute;s</h4>
          <p style="font-size:13px;">Menu, table service, orders, POS and payments.</p>
        </div>

        <div style="background:#fff; border-radius:14px; padding:20px; border:1px solid var(--line);">
          <h4 style="font-size:17px; margin-bottom:6px; color:var(--br);">Canteens</h4>
          <p style="font-size:13px;">Counter orders, kitchen, inventory and reports.</p>
        </div>
      </div>

      <div style="text-align:center; margin-top:32px;">
        <a href="{{ route('solutions') }}" class="btn p">Explore Industries &rarr;</a>
      </div>
    </div>
  </section>

  {{-- 16. PLAN CTA --}}
  <section class="section">
    <div class="w">
      <div class="sec-header" data-aos="fade-up">
        <div class="sec-eyebrow">FLEXIBLE PLANS</div>
        <h2>Choose the Features Your Business Needs.</h2>
        <p>Start with essential operations and unlock more capabilities as your restaurant grows.</p>
      </div>

      <div style="display:flex; justify-content:center; align-items:center; gap:20px; flex-wrap:wrap; margin-bottom:36px;" data-aos="fade-up">
        <div style="background:#fff; padding:18px 24px; border-radius:12px; border:1px solid var(--line); text-align:center; min-width:200px;">
          <strong style="color:var(--br);">STANDARD</strong>
          <div style="font-size:13px; color:var(--ink-soft); margin-top:4px;">Essential Operations</div>
        </div>
        <span style="font-size:22px; color:var(--gold);">&rarr;</span>
        <div style="background:#fff; padding:18px 24px; border-radius:12px; border:1.5px solid var(--br); text-align:center; min-width:200px; box-shadow:var(--shadow-sm);">
          <strong style="color:var(--br);">PREMIUM</strong>
          <div style="font-size:13px; color:var(--ink-soft); margin-top:4px;">Complete Business Suite</div>
        </div>
        <span style="font-size:22px; color:var(--gold);">&rarr;</span>
        <div style="background:#fff; padding:18px 24px; border-radius:12px; border:1px solid var(--line); text-align:center; min-width:200px;">
          <strong style="color:var(--br);">ENTERPRISE</strong>
          <div style="font-size:13px; color:var(--ink-soft); margin-top:4px;">Advanced &amp; Multi-Branch</div>
        </div>
      </div>

      <div style="text-align:center;">
        <a href="{{ route('pricing') }}" class="btn p">Compare Plans &rarr;</a>
      </div>
    </div>
  </section>

  {{-- 17. FAQ ACCORDION --}}
  <section class="section alt">
    <div class="w">
      <div class="sec-header" data-aos="fade-up">
        <div class="sec-eyebrow">QUESTIONS &amp; ANSWERS</div>
        <h2>Questions About Geni Menu Features?</h2>
        <p>Learn more about how features are packaged and deployed for your business.</p>
      </div>

      <div class="faq-wrap" data-aos="fade-up">
        <div class="faq-card open">
          <button type="button" class="faq-trigger">
            <span>What features does Geni Menu include?</span>
            <svg viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg>
          </button>
          <div class="faq-answer">
            <p>Geni Menu includes menu management, order management, POS, KOT, kitchen, table management, reservations, inventory, customers, staff and reports, with availability depending on your plan and configuration.</p>
          </div>
        </div>

        <div class="faq-card">
          <button type="button" class="faq-trigger">
            <span>Can I use only the features I need?</span>
            <svg viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg>
          </button>
          <div class="faq-answer">
            <p>Feature availability depends on your selected plan and business configuration. You can start with basic counter billing and activate kitchen or inventory modules as needed.</p>
          </div>
        </div>

        <div class="faq-card">
          <button type="button" class="faq-trigger">
            <span>Can I upgrade my features later?</span>
            <svg viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg>
          </button>
          <div class="faq-answer">
            <p>Yes. You can move to a higher plan as your business requirements grow without losing any of your existing products, customers, or historical reports.</p>
          </div>
        </div>

        <div class="faq-card">
          <button type="button" class="faq-trigger">
            <span>Does Geni Menu support multiple branches?</span>
            <svg viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg>
          </button>
          <div class="faq-answer">
            <p>Multi-branch capabilities with central head-office reporting, outlet switching, and branch-level inventory are available in applicable plans and enterprise configurations.</p>
          </div>
        </div>

        <div class="faq-card">
          <button type="button" class="faq-trigger">
            <span>Can I manage inventory?</span>
            <svg viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg>
          </button>
          <div class="faq-answer">
            <p>Yes. Real-time ingredient tracking, low-stock visibility, and wastage adjustments are available in selected subscription plans.</p>
          </div>
        </div>

        <div class="faq-card">
          <button type="button" class="faq-trigger">
            <span>Does Geni Menu support KOT?</span>
            <svg viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg>
          </button>
          <div class="faq-answer">
            <p>Yes, Kitchen Order Ticket (KOT) generation, digital preparation tracking, and thermal KOT printing are available in applicable configurations.</p>
          </div>
        </div>

        <div class="faq-card">
          <button type="button" class="faq-trigger">
            <span>Can I manage restaurant reservations?</span>
            <svg viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg>
          </button>
          <div class="faq-answer">
            <p>Yes, reservation management, time slot booking, and table allocation are available for applicable dine-in restaurant setups.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- 18. FINAL CTA --}}
  <section class="section" style="padding-top:0;">
    <div class="w">
      <div class="final-cta-box" data-aos="fade-up">
        <h2>Everything Your Restaurant Needs. One Connected Platform.</h2>
        <p>From your first menu item to your latest business report, Geni Menu brings your restaurant operations together.</p>
        
        <div class="final-cta-buttons">
          <a href="{{ route('restaurant_signup') }}" class="btn p" style="background:#876039; color:#fff; border-radius:9999px; padding:12px 28px; font-weight:600; text-decoration:none; display:inline-flex; align-items:center; gap:6px;">Get Started &rarr;</a>
          <button type="button" onclick="openPopup('Book a Demo - Geni Menu Features')" class="btn o" style="background:transparent; border:1.5px solid #876039; color:#876039; border-radius:9999px; padding:12px 28px; font-weight:600; cursor:pointer; display:inline-flex; align-items:center; gap:6px;">Book a Demo &rarr;</button>
        </div>
      </div>
    </div>
  </section>

</div>

{{-- AOS & Page Interactive Scripts --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
  // 1. Initialize AOS
  if (typeof AOS !== 'undefined') {
    AOS.init({ duration: 600, once: true, offset: 40 });
  }

  // 2. Feature Search & Filter Chips
  var searchInput = document.getElementById('featureSearchInput');
  var chipButtons = document.querySelectorAll('.ft-chip-btn');
  var dirGroups = document.querySelectorAll('.searchable-feature-group');

  var currentFilter = 'all';
  var currentSearch = '';

  function filterFeatures() {
    var query = currentSearch.trim().toLowerCase();

    dirGroups.forEach(function(group) {
      var tags = (group.getAttribute('data-tags') || '').toLowerCase();
      var text = group.textContent.toLowerCase();

      var matchesSearch = query === '' || text.indexOf(query) > -1 || tags.indexOf(query) > -1;
      var matchesFilter = currentFilter === 'all' || tags.indexOf(currentFilter) > -1;

      if (matchesSearch && matchesFilter) {
        group.style.display = '';
      } else {
        group.style.display = 'none';
      }
    });
  }

  chipButtons.forEach(function(btn) {
    btn.addEventListener('click', function() {
      chipButtons.forEach(function(b) { b.classList.remove('active'); });
      this.classList.add('active');
      currentFilter = this.getAttribute('data-filter') || 'all';
      filterFeatures();
    });
  });

  if (searchInput) {
    searchInput.addEventListener('input', function() {
      currentSearch = this.value;
      filterFeatures();
    });
  }

  // 3. FAQ Accordion Toggle
  var faqCards = document.querySelectorAll('.faq-card');
  faqCards.forEach(function(card) {
    var trigger = card.querySelector('.faq-trigger');
    if (trigger) {
      trigger.addEventListener('click', function() {
        var isOpen = card.classList.contains('open');
        faqCards.forEach(function(c) { c.classList.remove('open'); });
        if (!isOpen) {
          card.classList.add('open');
        }
      });
    }
  });

  // 4. Sticky Nav Active Indicator on Scroll
  var navLinks = document.querySelectorAll('.ft-cat-link');
  var sections = document.querySelectorAll('section[id]');

  window.addEventListener('scroll', function() {
    var scrollY = window.pageYOffset;
    sections.forEach(function(sec) {
      var top = sec.offsetTop - 120;
      var height = sec.offsetHeight;
      var id = sec.getAttribute('id');
      if (scrollY >= top && scrollY < top + height) {
        navLinks.forEach(function(link) {
          link.classList.remove('active');
          if (link.getAttribute('href') === '#' + id) {
            link.classList.add('active');
          }
        });
      }
    });
  });
});
</script>

@endsection
