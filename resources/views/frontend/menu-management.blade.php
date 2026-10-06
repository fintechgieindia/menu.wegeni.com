@php
    $meta = [
        'title' => 'Menu Management — Geni Menu | WeGeni',
        'description' => 'Create, organize and manage your restaurant menu from one simple dashboard. Update dishes, categories, prices, and availability instantly with Geni Menu.',
        'keywords' => 'restaurant menu management, digital menu software, QR code menu, restaurant menu editor, menu availability control, price management, Geni Menu, WeGeni'
    ];
@endphp

@extends('layouts.frontend-master')

@section('content')

{{-- Google Fonts --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@500;600;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Playfair+Display:ital,wght@1,600;1,700&display=swap" rel="stylesheet">

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
  --shadow-lg: 0 26px 50px rgba(33, 22, 15, 0.12);
  --green: #10B981;
  --red: #EF4444;
}

* { box-sizing: border-box; }
html { scroll-behavior: smooth; }
body {
  margin: 0;
  font: 400 16px/1.65 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
  color: var(--ink);
  background: var(--bg) !important;
  overflow-x: hidden;
  -webkit-font-smoothing: antialiased;
}

/* Typography */
h1, h2, h3, h4, h5 {
  margin: 0;
  font-family: 'Outfit', 'Plus Jakarta Sans', sans-serif;
  font-weight: 500;
  line-height: 1.14;
  letter-spacing: -0.02em;
  color: var(--ink);
}
h1 { font-size: clamp(38px, 5.5vw, 64px); font-weight: 500; }
h2 { font-size: clamp(30px, 4vw, 46px); font-weight: 500; }
h3 { font-size: 21px; font-weight: 500; color: var(--ink); }
p { margin: 0; color: var(--mute); font-size: 16px; line-height: 1.65; }
a { color: inherit; text-decoration: none; }
ul { list-style: none; margin: 0; padding: 0; }

.sf {
  font-family: 'Playfair Display', Georgia, serif;
  font-style: italic;
  font-weight: 500;
  background: linear-gradient(135deg, #876039 0%, #b88e56 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  display: inline-block;
  padding-right: 4px;
}

.eb {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  font-size: 12px;
  letter-spacing: .16em;
  font-weight: 500;
  text-transform: uppercase;
  color: var(--br);
  margin-bottom: 16px;
  background: linear-gradient(135deg, #fbf7f2 0%, #f4efe9 100%);
  padding: 7px 18px;
  border-radius: 99px;
  border: 1px solid rgba(135, 96, 57, 0.22);
  box-shadow: 0 2px 10px rgba(135, 96, 57, 0.08);
  font-family: 'Plus Jakarta Sans', sans-serif;
}

.w { max-width: 1240px; margin: auto; padding: 0 24px; position: relative; z-index: 1; }
section { padding: clamp(64px, 8vw, 100px) 0; background: var(--bg); position: relative; overflow: hidden; }
.hd { max-width: 740px; margin: 0 auto 56px; text-align: center; }
.hd p { margin-top: 16px; font-size: 18px; }

/* Buttons */
.btn { display: inline-flex; align-items: center; justify-content: center; gap: 8px; padding: 14px 28px; border-radius: 12px; font: 700 15px 'Plus Jakarta Sans', sans-serif; border: 1px solid var(--br); transition: .25s ease; cursor: pointer; text-decoration: none; }
.btn.p { background: linear-gradient(135deg, #876039 0%, #a87646 100%); color: #fff; box-shadow: 0 4px 16px rgba(135, 96, 57, 0.28); }
.btn.p:hover { transform: translateY(-2px); background: linear-gradient(135deg, #6f4e2d 0%, #876039 100%); box-shadow: 0 8px 24px rgba(135, 96, 57, 0.38); }
.btn.o { color: var(--br); background: #fff; }
.btn.o:hover { background: var(--br); color: #fff; transform: translateY(-2px); }

/* Breadcrumb */
.bc { padding: 18px 0 16px; background: var(--bg2); border-bottom: 1px solid var(--line); font-size: 14px; color: var(--mute); font-weight: 600; }
.bc .w { display: flex; align-items: center; gap: 8px; flex-wrap: wrap; }
.bc a { color: var(--mute); transition: color .2s; }
.bc a:hover { color: var(--br); }
.bc span { color: var(--br); font-weight: 700; }

/* Cards & UI Windows */
.card { position: relative; overflow: hidden; background: var(--card); border: 1px solid var(--line); border-radius: 20px; box-shadow: var(--shadow-sm); transition: transform .3s ease, box-shadow .3s ease, border-color .3s ease; }
.card:hover { border-color: rgba(135, 96, 57, 0.38); box-shadow: var(--shadow-md); }

.ic { width: 46px; height: 46px; border-radius: 13px; background: var(--bg2); color: var(--br); display: grid; place-items: center; flex: none; border: 1px solid var(--line); transition: .3s ease; }
.ic svg { width: 22px; height: 22px; fill: none; stroke: currentColor; stroke-width: 1.8; stroke-linecap: round; stroke-linejoin: round; }
.card:hover .ic { background: var(--br); color: #fff; border-color: var(--br); }

/* Dashboard Window Mockup */
.win { background: #fff; color: #211D19; border: 1px solid var(--line); border-radius: 20px; overflow: hidden; box-shadow: var(--shadow-md); font-size: 13px; max-width: 100%; }
.wb { display: flex; align-items: center; justify-content: space-between; padding: 12px 18px; background: var(--bg2); border-bottom: 1px solid var(--line); flex-wrap: wrap; gap: 6px; }
.wb .dots { display: flex; gap: 6px; }
.wb i { width: 10px; height: 10px; border-radius: 50%; background: #d8c9b8; display: inline-block; }
.wb i:nth-child(1) { background: #ff5f56; }
.wb i:nth-child(2) { background: #ffbd2e; }
.wb i:nth-child(3) { background: #27c93f; }
.wb .ttl { color: var(--br); font-weight: 500; font-family: 'Outfit', sans-serif; letter-spacing: 0.05em; font-size: 13px; text-transform: uppercase; }

/* Mobile Phone Mockup */
.ph-frame { width: 270px; border-radius: 40px; background: #1c1815; padding: 10px; box-shadow: 0 24px 50px rgba(36, 26, 20, 0.3); border: 2px solid #3d342d; flex: none; margin: 0 auto; max-width: 100%; }
.ph-inner { height: 510px; border-radius: 32px; background: #fff; color: var(--ink); padding: 20px 14px 14px; display: flex; flex-direction: column; gap: 10px; overflow: hidden; position: relative; }
.ph-header { text-align: center; padding-bottom: 8px; border-bottom: 1px solid var(--line); }
.ph-header h6 { margin: 0; font-family: 'Outfit', sans-serif; font-size: 15px; font-weight: 500; color: var(--ink); }
.ph-header p { font-size: 11px; color: var(--mute); }
.ph-cats { display: flex; gap: 6px; overflow-x: auto; padding-bottom: 4px; scrollbar-width: none; }
.ph-cat { padding: 5px 12px; border-radius: 20px; font-size: 11px; font-weight: 700; white-space: nowrap; background: var(--bg2); color: var(--mute); border: 1px solid var(--line); }
.ph-cat.act { background: var(--br); color: #fff; border-color: var(--br); }

.ph-item { display: flex; gap: 10px; padding: 8px; border: 1px solid var(--line); border-radius: 14px; background: #fff; align-items: center; }
.ph-img { width: 44px; height: 44px; border-radius: 10px; background-size: cover; background-position: center; flex: none; }
.ph-info { flex: 1; min-width: 0; }
.ph-info h5 { margin: 0; font-size: 13px; font-weight: 700; color: var(--ink); line-height: 1.2; }
.ph-info p { font-size: 11px; color: var(--br); font-weight: 500; margin-top: 2px; }
.ph-badge { font-size: 9px; font-weight: 500; padding: 2px 6px; border-radius: 6px; text-transform: uppercase; }
.ph-badge.avail { background: #d1fae5; color: #065f46; }
.ph-badge.unavail { background: #fee2e2; color: #991b1b; }

/* Reveal Animations */
.r { opacity: 0; transform: translateY(24px); transition: opacity .6s cubic-bezier(0.16, 1, 0.3, 1), transform .6s cubic-bezier(0.16, 1, 0.3, 1); }
.r.in { opacity: 1; transform: none; }

/* Feature Specific Styles */
.hero-split { display: grid; grid-template-columns: 1fr 1.15fr; gap: 40px; align-items: center; }
.hero-combo { display: flex; gap: 20px; align-items: center; }

/* Availability Toggle Switch */
.tgl-sw { width: 44px; height: 24px; background: #cbd5e1; border-radius: 12px; padding: 2px; cursor: pointer; transition: background .3s; display: inline-block; vertical-align: middle; }
.tgl-sw.on { background: var(--green); }
.tgl-sw .tgl-knob { width: 20px; height: 20px; background: #fff; border-radius: 50%; transition: transform .3s; box-shadow: 0 1px 3px rgba(0,0,0,0.2); }
.tgl-sw.on .tgl-knob { transform: translateX(20px); }

/* Industry Grid */
.ind-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; }
.ind-card { border-radius: 18px; overflow: hidden; background: #fff; border: 1px solid var(--line); transition: transform .3s, box-shadow .3s; position: relative; }
.ind-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-md); border-color: rgba(135,96,57,0.3); }
.ind-img { height: 160px; background-size: cover; background-position: center; position: relative; }
.ind-overlay { position: absolute; inset: 0; background: linear-gradient(180deg, transparent 40%, rgba(36, 26, 20, 0.85) 100%); }
.ind-content { padding: 18px; }
.ind-content h4 { font-size: 18px; margin-bottom: 6px; }
.ind-content p { font-size: 14px; }

/* FAQ Accordion */
.faq-list { max-width: 840px; margin: 0 auto; display: flex; flex-direction: column; gap: 14px; }
.faq-item { background: #fff; border: 1px solid var(--line); border-radius: 16px; overflow: hidden; transition: border-color .2s; }
.faq-item.open { border-color: var(--br); }
.faq-q { padding: 20px 24px; font-size: 17px; font-weight: 700; color: var(--ink); cursor: pointer; display: flex; justify-content: space-between; align-items: center; user-select: none; }
.faq-q svg { width: 20px; height: 20px; transition: transform .3s; stroke: var(--br); }
.faq-item.open .faq-q svg { transform: rotate(180deg); }
.faq-a { padding: 0 24px 20px; font-size: 15px; color: var(--mute); display: none; line-height: 1.65; border-top: 1px solid rgba(135,96,57,0.08); padding-top: 16px; }
.faq-item.open .faq-a { display: block; }

/* --- Comparison Section: Traditional Paper Menu vs Geni Menu Digital Workflow --- */
.compare-container {
  position: relative;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 32px;
  align-items: stretch;
}

.compare-center-arrow {
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  z-index: 20;
  pointer-events: none;
}

.center-arrow-circle {
  width: 44px;
  height: 44px;
  border-radius: 50%;
  background: var(--br);
  color: #FFFFFF;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0 4px 18px rgba(168, 91, 43, 0.4);
  border: 3px solid #FFFFFF;
  transition: transform 0.3s ease;
}

.center-arrow-circle svg {
  width: 20px;
  height: 20px;
}

.compare-card {
  border-radius: 24px;
  padding: 26px;
  position: relative;
  display: flex;
  flex-direction: column;
  box-sizing: border-box;
}

.compare-card-traditional {
  background: #FFFDFC;
  border: 1.5px solid #FECDD3;
  box-shadow: 0 10px 30px rgba(220, 38, 38, 0.04);
}

.compare-card-digital {
  background: #FFFFFF;
  border: 1.5px solid rgba(168, 91, 43, 0.28);
  box-shadow: 0 14px 40px rgba(168, 91, 43, 0.08);
}

.compare-card-header {
  display: flex;
  align-items: center;
  gap: 12px;
  margin-bottom: 22px;
}

.compare-badge-icon {
  width: 36px;
  height: 36px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}

.compare-badge-icon svg {
  width: 18px;
  height: 18px;
}

.badge-icon-red {
  background: #FEE2E2;
  color: #DC2626;
}

.badge-icon-brown {
  background: #6F4522;
  color: #FFFFFF;
}

.compare-card-title {
  font-family: 'Outfit', 'Plus Jakarta Sans', sans-serif;
  font-size: 19px;
  font-weight: 700;
  margin: 0 0 2px;
  line-height: 1.2;
}

.compare-card-title.text-red {
  color: #991B1B;
}

.compare-card-title.text-brown {
  color: #21160F;
}

.compare-card-subtitle {
  font-size: 12.5px;
  color: #76675D;
  margin: 0;
}

.compare-split-body {
  display: grid;
  grid-template-columns: 1fr 1.3fr;
  gap: 16px;
  align-items: stretch;
  flex: 1;
}

.compare-card-digital .compare-split-body {
  grid-template-columns: 1fr 1.05fr;
  gap: 14px;
}

/* Traditional Paper Menu Visual */
.traditional-paper-visual {
  background: #F8F4EE;
  border-radius: 16px;
  border: 1px solid #EADBCE;
  padding: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
  position: relative;
  overflow: hidden;
}

.paper-menu-board {
  width: 100%;
  background: #845A3C;
  border-radius: 12px;
  padding: 10px 8px 8px;
  box-shadow: 0 6px 16px rgba(42, 24, 13, 0.2);
  position: relative;
}

.paper-board-clip {
  width: 32px;
  height: 8px;
  background: #C4B5A5;
  border-radius: 3px;
  margin: 0 auto 6px;
  box-shadow: 0 1px 3px rgba(0,0,0,0.25);
}

.paper-sheet {
  background: #FFFDF9;
  border-radius: 6px;
  padding: 10px 8px;
  font-family: 'Plus Jakarta Sans', sans-serif;
  border: 1px solid #EBE1D3;
}

.paper-header {
  font-family: 'Outfit', 'Playfair Display', serif;
  font-weight: 500;
  font-size: 13px;
  letter-spacing: 2px;
  text-align: center;
  color: #2A1C14;
  border-bottom: 1.5px solid #2A1C14;
  padding-bottom: 4px;
  margin-bottom: 6px;
}

.paper-section-title {
  font-size: 8px;
  font-weight: 500;
  color: #876039;
  letter-spacing: 0.8px;
  text-transform: uppercase;
  margin-bottom: 3px;
}

.paper-item-row {
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-size: 7.5px;
  color: #4A3E38;
  padding: 1.5px 0;
}

.paper-item-row span {
  font-weight: 500;
}

.paper-item-row b {
  color: #2A1C14;
  font-weight: 700;
}

/* 5 Traditional Points List */
.traditional-points-list {
  display: flex;
  flex-direction: column;
  gap: 8px;
  justify-content: space-between;
}

.point-item-card {
  background: #FFFFFF;
  border: 1px solid #FEE2E2;
  border-radius: 12px;
  padding: 9px 12px;
  display: flex;
  align-items: center;
  gap: 10px;
  transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.point-item-card:hover {
  transform: translateX(2px);
  box-shadow: 0 4px 12px rgba(220, 38, 38, 0.08);
}

.point-icon-box {
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

.point-icon-box svg {
  width: 16px;
  height: 16px;
}

.point-text-box {
  display: flex;
  flex-direction: column;
  min-width: 0;
}

.point-text-box b {
  font-size: 13px;
  font-weight: 700;
  color: #21160F;
  line-height: 1.25;
}

.point-text-box span {
  font-size: 11px;
  color: #76675D;
  line-height: 1.3;
}

/* Digital Workflow Steps (Left in Right Card) */
.digital-workflow-steps {
  display: flex;
  flex-direction: column;
  justify-content: center;
  gap: 6px;
}

.workflow-step-card {
  background: #FFFFFF;
  border: 1px solid rgba(168, 91, 43, 0.2);
  border-radius: 14px;
  padding: 12px 14px;
  display: flex;
  align-items: center;
  gap: 12px;
  box-shadow: 0 2px 8px rgba(135, 96, 57, 0.04);
  transition: transform 0.2s ease, border-color 0.2s ease;
}

.workflow-step-card:hover {
  transform: translateY(-2px);
  border-color: #876039;
}

.workflow-icon-box {
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

.workflow-icon-box svg {
  width: 18px;
  height: 18px;
}

.workflow-text-box {
  display: flex;
  flex-direction: column;
  min-width: 0;
}

.workflow-text-box b {
  font-size: 13px;
  font-weight: 600;
  color: #21160F;
  line-height: 1.25;
}

.workflow-text-box span {
  font-size: 11.5px;
  color: #76675D;
  line-height: 1.3;
}

.workflow-down-arrow {
  text-align: center;
  font-size: 15px;
  font-weight: 500;
  color: #876039;
  line-height: 1;
}

/* Smartphone Mockup */
.digital-phone-visual {
  display: flex;
  align-items: center;
  justify-content: center;
}

.workflow-phone-mockup {
  width: 100%;
  max-width: 220px;
  background: #1C1510;
  border-radius: 28px;
  padding: 7px;
  box-shadow: 0 16px 36px rgba(28, 20, 15, 0.28);
  border: 2px solid #362920;
}

.wf-phone-screen {
  background: #FFFFFF;
  border-radius: 22px;
  padding: 10px 9px 12px;
  overflow: hidden;
  position: relative;
}

.wf-phone-island {
  width: 38px;
  height: 4px;
  background: #1C1510;
  border-radius: 4px;
  margin: 0 auto 6px;
}

.wf-phone-header {
  text-align: center;
  margin-bottom: 7px;
}

.wf-phone-title {
  font-family: 'Outfit', sans-serif;
  font-size: 13.5px;
  font-weight: 500;
  color: #21160F;
  line-height: 1.2;
}

.wf-phone-sub {
  font-size: 8px;
  color: #76675D;
}

.wf-phone-cats {
  display: flex;
  gap: 3.5px;
  overflow-x: auto;
  margin-bottom: 7px;
  scrollbar-width: none;
}

.wf-cat-pill {
  font-size: 7.5px;
  font-weight: 700;
  padding: 2.5px 7px;
  border-radius: 12px;
  background: #FAF7F2;
  color: #6E6157;
  white-space: nowrap;
}

.wf-cat-active {
  background: #875A38;
  color: #FFFFFF;
}

.wf-dishes-list {
  display: flex;
  flex-direction: column;
  gap: 5px;
}

.wf-dish-card {
  display: flex;
  gap: 6px;
  padding: 5px;
  background: #FFFFFF;
  border: 1px solid #EFE8DE;
  border-radius: 8px;
  align-items: center;
}

.wf-dish-thumb {
  width: 38px;
  height: 38px;
  border-radius: 6px;
  object-fit: cover;
  flex-shrink: 0;
}

.wf-dish-content {
  flex: 1;
  min-width: 0;
}

.wf-dish-name {
  font-size: 9.5px;
  font-weight: 700;
  color: #21160F;
  line-height: 1.15;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

.wf-dish-desc {
  font-size: 7px;
  color: #76675D;
  line-height: 1.2;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  margin: 1px 0 2px;
}

.wf-dish-bottom {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.wf-dish-price {
  font-size: 9px;
  font-weight: 500;
  color: #21160F;
}

.wf-dish-badge {
  font-size: 6.5px;
  font-weight: 700;
  padding: 1px 4.5px;
  border-radius: 4px;
  background: #DCFCE7;
  color: #16A34A;
  text-transform: capitalize;
}

.compare-bottom-cta {
  margin-top: 16px;
  display: flex;
  justify-content: center;
}

.bottom-cta-badge {
  background: linear-gradient(135deg, #6f4e2d 0%, #876039 100%);
  color: #FFFFFF;
  font-size: 11.5px;
  font-weight: 600;
  padding: 6px 18px;
  border-radius: 99px;
  box-shadow: 0 4px 14px rgba(135, 96, 57, 0.3);
  display: inline-flex;
  align-items: center;
  gap: 6px;
}

/* Responsive adjustments */
@media (max-width: 1080px) {
  .hero-split { grid-template-columns: 1fr; gap: 32px; }
  .ind-grid { grid-template-columns: repeat(2, 1fr); }
  .hero-combo { flex-direction: column; }
  .compare-container {
    grid-template-columns: 1fr;
    gap: 36px;
  }
  .compare-center-arrow {
    display: none;
  }
}
@media (max-width: 768px) {
  .bc { padding: 14px 0 14px; }
  .w { padding: 0 16px; }
  .ind-grid { grid-template-columns: 1fr; }
  .hero-combo { width: 100%; }
  .win { min-width: 0 !important; width: 100%; }
}
@media (max-width: 640px) {
  .compare-split-body,
  .compare-card-digital .compare-split-body {
    grid-template-columns: 1fr;
    gap: 16px;
  }
  .traditional-paper-visual {
    max-width: 260px;
    margin: 0 auto;
  }
  .workflow-phone-mockup {
    max-width: 240px;
    margin: 0 auto;
  }
}
@media (max-width: 480px) {
  .btn { width: 100%; }
  .compare-card { padding: 20px 16px; }
}
</style>

<!-- ================= BREADCRUMB ================= -->
<div class="bc">
  <div class="w">
    <a href="{{ route('home') }}">Home</a>
    <span>/</span>
    <a href="{{ route('features') }}">Features</a>
    <span>/</span>
    <span>Menu Management</span>
  </div>
</div>

<!-- ================= SECTION 3: HERO SECTION ================= -->
<section style="background: linear-gradient(180deg, var(--bg2) 0%, #ffffff 100%);">
  <div class="w">
    <div class="hero-split">
      <!-- Hero Left Copy -->
      <div class="r in">
        <div class="eb">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/><path d="M9 8h6"/><path d="M9 12h4"/></svg>
          MENU MANAGEMENT
        </div>
        <h1>Your Entire Menu.<br><span class="sf">One Simple Dashboard.</span></h1>
        <p style="margin: 20px 0 32px; font-size: 18px; max-width: 520px;">
          Create, organize and manage your restaurant menu from one place. Update dishes, categories, prices, availability and more — whenever your business needs it.
        </p>
        <div style="display: flex; gap: 14px; flex-wrap: wrap;">
          <a href="{{ route('restaurant_signup') }}" class="btn p">Get Started →</a>
          <a href="{{ route('contact.us') }}" class="btn o">Book a Demo</a>
        </div>
        <div style="margin-top: 28px; font-size: 14px; color: var(--mute); font-weight: 600; display: flex; align-items: center; gap: 16px;">
          <span>✓ Instant Real-time Sync</span>
          <span>✓ No Re-printing Costs</span>
        </div>
      </div>

      <!-- Hero Visual: Dashboard + Phone Combo -->
      <div class="hero-combo r in" style="transition-delay: 0.15s;">
        <!-- Restaurant Management Dashboard -->
        <div class="win" style="flex: 1; min-width: 320px;">
          <div class="wb">
            <div class="dots"><i></i><i></i><i></i></div>
            <div class="ttl">MENU MANAGEMENT</div>
            <div style="font-size: 11px; background: #e2d5c0; color: var(--ink); padding: 3px 8px; border-radius: 6px; font-weight: 700;">LIVE DEMO</div>
          </div>
          <div style="padding: 16px; background: #fff;">
            <!-- Top Action Bar -->
            <div style="display: flex; justify-content: space-between; gap: 10px; margin-bottom: 14px;">
              <input type="text" placeholder="Search menu items..." style="padding: 7px 12px; border: 1px solid var(--line); border-radius: 8px; font-size: 12px; width: 65%;">
              <button style="background: var(--br); color: #fff; border: 0; padding: 7px 12px; border-radius: 8px; font-weight: 700; font-size: 12px; cursor: pointer;">+ Add Item</button>
            </div>

            <div style="display: grid; grid-template-columns: 110px 1fr; gap: 12px;">
              <!-- Sidebar Categories -->
              <div style="background: var(--bg2); border-radius: 10px; padding: 8px; border: 1px solid var(--line); font-size: 11px; font-weight: 700;">
                <div style="color: var(--mute); font-size: 9px; text-transform: uppercase; margin-bottom: 6px;">Categories</div>
                <div style="padding: 5px 8px; border-radius: 6px; background: var(--br); color: #fff; margin-bottom: 4px;">All Items</div>
                <div style="padding: 5px 8px; color: var(--ink);">Starters</div>
                <div style="padding: 5px 8px; color: var(--ink);">Main Course</div>
                <div style="padding: 5px 8px; color: var(--ink);">Biryani</div>
                <div style="padding: 5px 8px; color: var(--ink);">Beverages</div>
                <div style="padding: 5px 8px; color: var(--ink);">Desserts</div>
              </div>

              <!-- Menu Items List -->
              <div style="display: flex; flex-direction: column; gap: 8px;">
                <div style="font-size: 10px; font-weight: 500; color: var(--mute); letter-spacing: 0.05em;">MENU ITEMS</div>
                
                <div style="display: flex; justify-content: space-between; align-items: center; padding: 8px 10px; border: 1px solid var(--line); border-radius: 8px; background: #fff;">
                  <div>
                    <div style="font-weight: 700; color: var(--ink);">Chicken Biryani</div>
                    <div style="color: var(--br); font-weight: 500;">₹240</div>
                  </div>
                  <div style="color: var(--green); font-size: 11px; font-weight: 700;">● Available</div>
                </div>

                <div style="display: flex; justify-content: space-between; align-items: center; padding: 8px 10px; border: 1px solid var(--line); border-radius: 8px; background: #fff;">
                  <div>
                    <div style="font-weight: 700; color: var(--ink);">Paneer Butter Masala</div>
                    <div style="color: var(--br); font-weight: 500;">₹220</div>
                  </div>
                  <div style="color: var(--green); font-size: 11px; font-weight: 700;">● Available</div>
                </div>

                <div style="display: flex; justify-content: space-between; align-items: center; padding: 8px 10px; border: 1px solid var(--line); border-radius: 8px; background: #fff;">
                  <div>
                    <div style="font-weight: 700; color: var(--ink);">Chicken 65</div>
                    <div style="color: var(--br); font-weight: 500;">₹180</div>
                  </div>
                  <div style="color: var(--green); font-size: 11px; font-weight: 700;">● Available</div>
                </div>

                <div style="display: flex; justify-content: space-between; align-items: center; padding: 8px 10px; border: 1px solid var(--line); border-radius: 8px; background: #fff; opacity: 0.7;">
                  <div>
                    <div style="font-weight: 700; color: var(--ink);">Fresh Lime Soda</div>
                    <div style="color: var(--br); font-weight: 500;">₹80</div>
                  </div>
                  <div style="color: var(--red); font-size: 11px; font-weight: 700;">○ Unavailable</div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Phone Customer Preview -->
        <div class="ph-frame">
          <div class="ph-inner">
            <div class="ph-header">
              <h6>Geni Bistro Menu</h6>
              <p>Scan & Order Online</p>
            </div>
            <div class="ph-cats">
              <div class="ph-cat act">All</div>
              <div class="ph-cat">Biryani</div>
              <div class="ph-cat">Main</div>
              <div class="ph-cat">Drinks</div>
            </div>

            <div class="ph-item">
              <div class="ph-img" style="background-image: url('https://images.unsplash.com/photo-1563379091339-03b21ab4a4f8?w=300&auto=format&fit=crop&q=80');"></div>
              <div class="ph-info">
                <h5>Chicken Biryani</h5>
                <p>₹240</p>
              </div>
              <span class="ph-badge avail">● Available</span>
            </div>

            <div class="ph-item">
              <div class="ph-img" style="background-image: url('https://images.unsplash.com/photo-1631452180519-c014fe946bc7?w=300&auto=format&fit=crop&q=80');"></div>
              <div class="ph-info">
                <h5>Paneer Masala</h5>
                <p>₹220</p>
              </div>
              <span class="ph-badge avail">● Available</span>
            </div>

            <div class="ph-item" style="opacity: 0.6;">
              <div class="ph-img" style="background-image: url('https://images.unsplash.com/photo-1513558161293-cdaf765ed2fd?w=300&auto=format&fit=crop&q=80');"></div>
              <div class="ph-info">
                <h5>Fresh Lime Soda</h5>
                <p>₹80</p>
              </div>
              <span class="ph-badge unavail">Sold Out</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 4: QUICK VALUE STRIP ================= -->
<section style="padding: 40px 0; background: var(--bg2); border-y: 1px solid var(--line);">
  <div class="w">
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 20px;">
      
      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 14px;">
          <svg viewBox="0 0 24 24"><path d="M21.5 2v6h-6"/><path d="M21.34 15.57a10 10 0 1 1-.57-8.38l5.67-5.67"/></svg>
        </div>
        <h4 style="font-size: 17px; margin-bottom: 6px;">Instant Updates</h4>
        <p style="font-size: 14px;">Change menu information whenever you need.</p>
      </div>

      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 14px;">
          <svg viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h16"/><path d="M8 6v12M16 6v12"/></svg>
        </div>
        <h4 style="font-size: 17px; margin-bottom: 6px;">Easy Organization</h4>
        <p style="font-size: 14px;">Keep dishes and categories structured.</p>
      </div>

      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 14px;">
          <svg viewBox="0 0 24 24"><path d="M18.36 6.64a9 9 0 1 1-12.73 0"/><line x1="12" y1="2" x2="12" y2="12"/></svg>
        </div>
        <h4 style="font-size: 17px; margin-bottom: 6px;">Availability Control</h4>
        <p style="font-size: 14px;">Show customers what's currently available.</p>
      </div>

      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 14px;">
          <svg viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
        </div>
        <h4 style="font-size: 17px; margin-bottom: 6px;">One Central Menu</h4>
        <p style="font-size: 14px;">Manage your entire menu from one place.</p>
      </div>

    </div>
  </div>
</section>

<!-- ================= SECTION 5: STILL MANAGING YOUR MENU THE HARD WAY? ================= -->
<section class="menu-compare-section" style="padding: 70px 0 90px; background: #FFFDFC; position: relative; overflow: hidden;">
  <!-- Subtle ambient glow in background -->
  <div style="position: absolute; top: -5%; left: 50%; transform: translateX(-50%); width: 800px; height: 350px; background: radial-gradient(50% 50% at 50% 50%, rgba(251, 246, 238, 0.8) 0%, rgba(255,255,255,0) 100%); pointer-events: none; z-index: 0;"></div>

  <div class="w" style="position: relative; z-index: 1;">
    <!-- Section Header -->
    <div class="hd r in" style="text-align: center; max-width: 760px; margin: 0 auto 50px;">
      <h2 style="font-family: 'Outfit', 'Plus Jakarta Sans', sans-serif; font-size: clamp(34px, 4.4vw, 48px); color: #21160F; font-weight: 500; line-height: 1.15; margin: 0 0 14px;">
        Still Managing Your Menu<br>
        <span class="sf" style="font-family: 'Playfair Display', Georgia, serif; font-style: italic; font-weight: 500; background: linear-gradient(135deg, #876039 0%, #b88e56 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">the Hard Way?</span>
      </h2>
      <p style="font-size: 16px; color: #6E6157; line-height: 1.65; margin: 0;">
        Your menu changes every day. New dishes, price changes, sold-out items and seasonal specials shouldn't mean rebuilding your menu every time.
      </p>
    </div>

    <!-- Comparison Grid Container with Central Connector -->
    <div class="compare-container r in">
      
      <!-- Central Transition Arrow -->
      <div class="compare-center-arrow">
        <div class="center-arrow-circle">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <line x1="5" y1="12" x2="19" y2="12"></line>
            <polyline points="12 5 19 12 12 19"></polyline>
          </svg>
        </div>
      </div>

      <!-- LEFT CARD: Traditional Paper Menu (Red Tint) -->
      <div class="compare-card compare-card-traditional">
        <!-- Card Header -->
        <div class="compare-card-header">
          <div class="compare-badge-icon badge-icon-red">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
              <line x1="18" y1="6" x2="6" y2="18"></line>
              <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
          </div>
          <div>
            <h3 class="compare-card-title text-red">Traditional Paper Menu</h3>
            <p class="compare-card-subtitle">Time consuming, costly and difficult to manage</p>
          </div>
        </div>

        <!-- Card Body Split: Left Paper Visual + Right Pain Points -->
        <div class="compare-split-body">
          <!-- Left: Realistic Paper Menu Board -->
          <div class="traditional-paper-visual">
            <div class="paper-menu-board">
              <div class="paper-board-clip"></div>
              <div class="paper-sheet">
                <div class="paper-header">MENU</div>
                
                <div class="paper-section-title">STARTERS</div>
                <div class="paper-item-row"><span>Tomato Soup</span><b>₹120</b></div>
                <div class="paper-item-row"><span>Chicken Wings</span><b>₹180</b></div>
                <div class="paper-item-row"><span>French Fries</span><b>₹150</b></div>

                <div class="paper-section-title" style="margin-top: 7px;">MAIN COURSE</div>
                <div class="paper-item-row"><span>Chicken Biryani</span><b>₹280</b></div>
                <div class="paper-item-row"><span>Mutton Biryani</span><b>₹320</b></div>
                <div class="paper-item-row"><span>Paneer Butter Masala</span><b>₹260</b></div>

                <div class="paper-section-title" style="margin-top: 7px;">DESSERTS</div>
                <div class="paper-item-row"><span>Gulab Jamun</span><b>₹120</b></div>
                <div class="paper-item-row"><span>Ice Cream</span><b>₹150</b></div>
              </div>
            </div>
          </div>

          <!-- Right: 5 Pain Point Cards -->
          <div class="traditional-points-list">
            <!-- Point 1 -->
            <div class="point-item-card">
              <div class="point-icon-box">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><line x1="10" y1="9" x2="8" y2="9"/></svg>
              </div>
              <div class="point-text-box">
                <b>Printed Paper Menu</b>
                <span>Need to reprint for every change</span>
              </div>
            </div>

            <!-- Point 2 -->
            <div class="point-item-card">
              <div class="point-icon-box">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8"/><line x1="12" y1="6" x2="12" y2="8"/><line x1="12" y1="16" x2="12" y2="18"/></svg>
              </div>
              <div class="point-text-box">
                <b>Price / Item Changes</b>
                <span>Time consuming and error prone</span>
              </div>
            </div>

            <!-- Point 3 -->
            <div class="point-item-card">
              <div class="point-icon-box">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 6 2 18 2 18 9"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect x="6" y="14" width="12" height="8"/></svg>
              </div>
              <div class="point-text-box">
                <b>Expensive Reprinting</b>
                <span>Extra cost for every update</span>
              </div>
            </div>

            <!-- Point 4 -->
            <div class="point-item-card">
              <div class="point-icon-box">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="23 4 23 10 17 10"/><polyline points="1 20 1 14 7 14"/><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"/></svg>
              </div>
              <div class="point-text-box">
                <b>Manual Replacement</b>
                <span>Hard to manage multiple outlets</span>
              </div>
            </div>

            <!-- Point 5 -->
            <div class="point-item-card point-item-highlight">
              <div class="point-icon-box">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
              </div>
              <div class="point-text-box">
                <b>High Cost & Continuous Errors</b>
                <span>Old menus lead to customer confusion</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- RIGHT CARD: Geni Menu Digital Workflow (Theme Brown / Clean White) -->
      <div class="compare-card compare-card-digital">
        <!-- Card Header -->
        <div class="compare-card-header">
          <div class="compare-badge-icon badge-icon-brown">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
              <polyline points="20 6 9 17 4 12"></polyline>
            </svg>
          </div>
          <div>
            <h3 class="compare-card-title text-brown">Geni Menu Digital Workflow</h3>
            <p class="compare-card-subtitle">Update, publish and let your customers see it instantly</p>
          </div>
        </div>

        <!-- Card Body Split: Left 3 Workflow Steps + Right Smartphone Menu -->
        <div class="compare-split-body">
          <!-- Left: 3 Connected Workflow Steps -->
          <div class="digital-workflow-steps">
            <!-- Step 1 -->
            <div class="workflow-step-card">
              <div class="workflow-icon-box">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
              </div>
              <div class="workflow-text-box">
                <b>Update Item / Price / Status</b>
                <span>Make changes in seconds</span>
              </div>
            </div>

            <!-- Down Arrow Connector 1 -->
            <div class="workflow-down-arrow">↓</div>

            <!-- Step 2 -->
            <div class="workflow-step-card">
              <div class="workflow-icon-box">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"/><path d="M12 15l-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"/></svg>
              </div>
              <div class="workflow-text-box">
                <b>Instant 1-Click Publish</b>
                <span>Update goes live immediately</span>
              </div>
            </div>

            <!-- Down Arrow Connector 2 -->
            <div class="workflow-down-arrow">↓</div>

            <!-- Step 3 -->
            <div class="workflow-step-card workflow-step-active">
              <div class="workflow-icon-box">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg>
              </div>
              <div class="workflow-text-box">
                <b>Customers See It Instantly on Mobile!</b>
                <span>Always up-to-date menu</span>
              </div>
            </div>
          </div>

          <!-- Right: Real Smartphone Menu Mockup -->
          <div class="digital-phone-visual">
            <div class="workflow-phone-mockup">
              <!-- Phone Bezel / Screen -->
              <div class="wf-phone-screen">
                <!-- Top Notch / Speaker -->
                <div class="wf-phone-island"></div>

                <!-- Menu Header -->
                <div class="wf-phone-header">
                  <div class="wf-phone-title">Our Menu</div>
                  <div class="wf-phone-sub">Delicious food for every mood</div>
                </div>

                <!-- Categories Row -->
                <div class="wf-phone-cats">
                  <span class="wf-cat-pill wf-cat-active">All</span>
                  <span class="wf-cat-pill">Starters</span>
                  <span class="wf-cat-pill">Main Course</span>
                  <span class="wf-cat-pill">Desserts</span>
                </div>

                <!-- Live Dish List -->
                <div class="wf-dishes-list">
                  <!-- Dish 1: Chicken Biryani -->
                  <div class="wf-dish-card">
                    <img src="https://images.unsplash.com/photo-1563379091339-03b21ab4a4f8?w=160&auto=format&fit=crop&q=80" alt="Chicken Biryani" class="wf-dish-thumb">
                    <div class="wf-dish-content">
                      <div class="wf-dish-name">Chicken Biryani</div>
                      <div class="wf-dish-desc">Aromatic basmati rice with spices and tender chicken</div>
                      <div class="wf-dish-bottom">
                        <span class="wf-dish-price">₹280</span>
                        <span class="wf-dish-badge">Available</span>
                      </div>
                    </div>
                  </div>

                  <!-- Dish 2: Paneer Butter Masala -->
                  <div class="wf-dish-card">
                    <img src="https://images.unsplash.com/photo-1631452180519-c014fe946bc7?w=160&auto=format&fit=crop&q=80" alt="Paneer Butter Masala" class="wf-dish-thumb">
                    <div class="wf-dish-content">
                      <div class="wf-dish-name">Paneer Butter Masala</div>
                      <div class="wf-dish-desc">Rich and creamy tomato gravy</div>
                      <div class="wf-dish-bottom">
                        <span class="wf-dish-price">₹260</span>
                        <span class="wf-dish-badge">Available</span>
                      </div>
                    </div>
                  </div>

                  <!-- Dish 3: Gulab Jamun -->
                  <div class="wf-dish-card">
                    <img src="https://images.unsplash.com/photo-1546833999-b9f581a1996d?w=160&auto=format&fit=crop&q=80" alt="Gulab Jamun" class="wf-dish-thumb">
                    <div class="wf-dish-content">
                      <div class="wf-dish-name">Gulab Jamun</div>
                      <div class="wf-dish-desc">Soft and juicy dessert</div>
                      <div class="wf-dish-bottom">
                        <span class="wf-dish-price">₹120</span>
                        <span class="wf-dish-badge">Available</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Bottom CTA Pill -->
        <div class="compare-bottom-cta">
          <div class="bottom-cta-badge">
            <span class="cta-sparkle">✨</span> Customers See It Instantly on Mobile!
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ================= SECTION 6 & 7: CORE VALUE & MENU ITEM MANAGEMENT ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd r">
      <h2>Everything About Your Menu, <span class="sf">Under Control.</span></h2>
      <p>Bring everyday menu management into one clean workspace.</p>
    </div>

    <!-- ITEM MANAGEMENT SHOWCASE -->
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 48px; align-items: center;" class="r">
      <div>
        <div class="eb">MENU ITEM MANAGEMENT</div>
        <h2>Add. Edit. Organize.</h2>
        <p style="margin: 16px 0 24px;">Create and manage every dish from a single interface effortlessly.</p>

        <ul style="display: grid; grid-template-columns: 1fr 1fr; gap: 14px; font-weight: 600; color: var(--ink);">
          <li style="display: flex; align-items: center; gap: 8px;"><span style="color: var(--br); font-weight: 500;">✓</span> Add new menu items</li>
          <li style="display: flex; align-items: center; gap: 8px;"><span style="color: var(--br); font-weight: 500;">✓</span> Edit item names</li>
          <li style="display: flex; align-items: center; gap: 8px;"><span style="color: var(--br); font-weight: 500;">✓</span> Update descriptions</li>
          <li style="display: flex; align-items: center; gap: 8px;"><span style="color: var(--br); font-weight: 500;">✓</span> Change prices</li>
          <li style="display: flex; align-items: center; gap: 8px;"><span style="color: var(--br); font-weight: 500;">✓</span> Add food images</li>
          <li style="display: flex; align-items: center; gap: 8px;"><span style="color: var(--br); font-weight: 500;">✓</span> Manage item details</li>
          <li style="display: flex; align-items: center; gap: 8px;"><span style="color: var(--br); font-weight: 500;">✓</span> Assign categories</li>
          <li style="display: flex; align-items: center; gap: 8px;"><span style="color: var(--br); font-weight: 500;">✓</span> Control availability</li>
        </ul>
      </div>

      <!-- Realistic EDIT MENU ITEM Visual Modal -->
      <div class="win" style="padding: 0; box-shadow: var(--shadow-lg);">
        <div class="wb">
          <div class="dots"><i></i><i></i><i></i></div>
          <div class="ttl">EDIT MENU ITEM</div>
          <div></div>
        </div>
        <div style="padding: 24px; display: flex; flex-direction: column; gap: 14px; background: #fff;">
          <div style="display: flex; gap: 16px; align-items: center;">
            <div style="width: 80px; height: 80px; border-radius: 14px; background-image: url('https://images.unsplash.com/photo-1563379091339-03b21ab4a4f8?w=300&auto=format&fit=crop&q=80'); background-size: cover; border: 1px solid var(--line); flex: none;"></div>
            <div>
              <button style="background: var(--bg2); border: 1px solid var(--line); padding: 6px 12px; border-radius: 8px; font-weight: 700; color: var(--br); cursor: pointer;">📷 Change Food Image</button>
              <div style="font-size: 11px; color: var(--mute); margin-top: 4px;">PNG, JPG up to 5MB</div>
            </div>
          </div>

          <div>
            <label style="font-weight: 700; font-size: 12px; color: var(--ink); display: block; margin-bottom: 4px;">Item Name</label>
            <input type="text" value="Chicken Biryani" style="width: 100%; padding: 8px 12px; border: 1px solid var(--line); border-radius: 8px; font-weight: 600; color: var(--ink);">
          </div>

          <div>
            <label style="font-weight: 700; font-size: 12px; color: var(--ink); display: block; margin-bottom: 4px;">Description</label>
            <textarea style="width: 100%; padding: 8px 12px; border: 1px solid var(--line); border-radius: 8px; font-size: 12px; font-weight: 500; height: 50px; resize: none;">Aromatic basmati rice with tender chicken and traditional spices.</textarea>
          </div>

          <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
            <div>
              <label style="font-weight: 700; font-size: 12px; color: var(--ink); display: block; margin-bottom: 4px;">Price (₹)</label>
              <input type="text" value="₹240" style="width: 100%; padding: 8px 12px; border: 1px solid var(--line); border-radius: 8px; font-weight: 500; color: var(--br);">
            </div>
            <div>
              <label style="font-weight: 700; font-size: 12px; color: var(--ink); display: block; margin-bottom: 4px;">Category</label>
              <select style="width: 100%; padding: 8px 12px; border: 1px solid var(--line); border-radius: 8px; font-weight: 600;">
                <option selected>Biryani</option>
                <option>Starters</option>
                <option>Main Course</option>
              </select>
            </div>
          </div>

          <div style="display: flex; justify-content: space-between; align-items: center; padding-top: 8px; border-top: 1px solid var(--line);">
            <div style="font-weight: 700;">Availability: <span style="color: var(--green);">● Available</span></div>
            <button class="btn p" style="padding: 8px 18px; font-size: 13px;">Save Changes</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 8: CATEGORY MANAGEMENT ================= -->
<section>
  <div class="w">
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 48px; align-items: center;" class="r">
      <!-- Category UI Mockup -->
      <div class="win" style="order: 2; box-shadow: var(--shadow-lg);">
        <div class="wb">
          <div class="dots"><i></i><i></i><i></i></div>
          <div class="ttl">MENU CATEGORIES & REORDERING</div>
          <div style="color: var(--br); font-weight: 700; font-size: 11px;">+ New Category</div>
        </div>
        <div style="padding: 20px; background: #fff; display: flex; flex-direction: column; gap: 10px;">
          <div style="display: flex; justify-content: space-between; align-items: center; padding: 12px 16px; border: 1px solid var(--line); border-radius: 12px; background: var(--bg2);">
            <div style="display: flex; align-items: center; gap: 10px; font-weight: 700;">
              <span style="cursor: grab; color: var(--mute);">:::</span> 🥗 Starters
            </div>
            <span style="font-size: 11px; background: #fff; padding: 3px 8px; border-radius: 6px; border: 1px solid var(--line);">12 Items</span>
          </div>

          <div style="display: flex; justify-content: space-between; align-items: center; padding: 12px 16px; border: 1px solid var(--br); border-radius: 12px; background: #fff; box-shadow: 0 4px 12px rgba(135,96,57,0.15);">
            <div style="display: flex; align-items: center; gap: 10px; font-weight: 500; color: var(--br);">
              <span style="cursor: grab;">:::</span> 🍛 Main Course
            </div>
            <span style="font-size: 11px; background: var(--br); color: #fff; padding: 3px 8px; border-radius: 6px;">18 Items</span>
          </div>

          <div style="display: flex; justify-content: space-between; align-items: center; padding: 12px 16px; border: 1px solid var(--line); border-radius: 12px; background: var(--bg2);">
            <div style="display: flex; align-items: center; gap: 10px; font-weight: 700;">
              <span style="cursor: grab; color: var(--mute);">:::</span> 🍚 Biryani
            </div>
            <span style="font-size: 11px; background: #fff; padding: 3px 8px; border-radius: 6px; border: 1px solid var(--line);">8 Items</span>
          </div>

          <div style="display: flex; justify-content: space-between; align-items: center; padding: 12px 16px; border: 1px solid var(--line); border-radius: 12px; background: var(--bg2);">
            <div style="display: flex; align-items: center; gap: 10px; font-weight: 700;">
              <span style="cursor: grab; color: var(--mute);">:::</span> 🍜 Noodles & Rice
            </div>
            <span style="font-size: 11px; background: #fff; padding: 3px 8px; border-radius: 6px; border: 1px solid var(--line);">10 Items</span>
          </div>

          <div style="display: flex; justify-content: space-between; align-items: center; padding: 12px 16px; border: 1px solid var(--line); border-radius: 12px; background: var(--bg2);">
            <div style="display: flex; align-items: center; gap: 10px; font-weight: 700;">
              <span style="cursor: grab; color: var(--mute);">:::</span> 🥤 Beverages
            </div>
            <span style="font-size: 11px; background: #fff; padding: 3px 8px; border-radius: 6px; border: 1px solid var(--line);">15 Items</span>
          </div>

          <div style="display: flex; justify-content: space-between; align-items: center; padding: 12px 16px; border: 1px solid var(--line); border-radius: 12px; background: var(--bg2);">
            <div style="display: flex; align-items: center; gap: 10px; font-weight: 700;">
              <span style="cursor: grab; color: var(--mute);">:::</span> 🍨 Desserts
            </div>
            <span style="font-size: 11px; background: #fff; padding: 3px 8px; border-radius: 6px; border: 1px solid var(--line);">9 Items</span>
          </div>
        </div>
      </div>

      <!-- Copy -->
      <div style="order: 1;">
        <div class="eb">CATEGORY MANAGEMENT</div>
        <h2>Keep Every Dish in <span class="sf">the Right Place.</span></h2>
        <p style="margin: 16px 0 24px;">
          Organize your menu into clear categories so customers can discover what they want faster.
        </p>

        <ul style="display: flex; flex-direction: column; gap: 12px; font-weight: 600; color: var(--ink);">
          <li style="display: flex; align-items: center; gap: 10px;"><span style="color: var(--br); font-size: 18px;">📁</span> Create custom categories</li>
          <li style="display: flex; align-items: center; gap: 10px;"><span style="color: var(--br); font-size: 18px;">✏️</span> Rename categories on demand</li>
          <li style="display: flex; align-items: center; gap: 10px;"><span style="color: var(--br); font-size: 18px;">↕️</span> Reorder categories with simple drag & drop</li>
          <li style="display: flex; align-items: center; gap: 10px;"><span style="color: var(--br); font-size: 18px;">🔄</span> Move items between categories seamlessly</li>
          <li style="display: flex; align-items: center; gap: 10px;"><span style="color: var(--br); font-size: 18px;">✨</span> Keep the menu organized for fast customer browsing</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 9: PRICE MANAGEMENT ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 48px; align-items: center;" class="r">
      <div>
        <div class="eb">PRICE MANAGEMENT</div>
        <h2>Prices Change. <br><span class="sf">Your Menu Shouldn't Have To.</span></h2>
        <p style="margin: 16px 0 24px;">
          Update prices whenever your business changes — without redesigning or replacing your menu.
        </p>

        <ul style="display: flex; flex-direction: column; gap: 12px; font-weight: 600;">
          <li style="display: flex; align-items: center; gap: 10px;"><span style="color: var(--br);">✓</span> Update prices quickly in seconds</li>
          <li style="display: flex; align-items: center; gap: 10px;"><span style="color: var(--br);">✓</span> Keep pricing accurate across all customer touchpoints</li>
          <li style="display: flex; align-items: center; gap: 10px;"><span style="color: var(--br);">✓</span> Avoid outdated physical menus</li>
          <li style="display: flex; align-items: center; gap: 10px;"><span style="color: var(--br);">✓</span> Maintain pricing consistency across dine-in, takeout and delivery</li>
        </ul>
      </div>

      <!-- Interactive Price Change Simulator -->
      <div class="card" style="padding: 32px; background: #fff;">
        <div style="font-size: 12px; font-weight: 500; color: var(--br); letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 16px;">LIVE PRICE UPDATE SIMULATOR</div>
        
        <div style="padding: 20px; border: 1px solid var(--line); border-radius: 16px; background: var(--bg2); display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
          <div>
            <div style="font-weight: 500; font-size: 18px;">Chicken Biryani</div>
            <div id="price-display" style="font-size: 24px; font-weight: 500; color: var(--br); margin-top: 4px;">₹220</div>
          </div>
          <button id="price-btn" onclick="updatePriceSim()" class="btn p" style="padding: 10px 18px; font-size: 13px;">Edit Price</button>
        </div>

        <div id="price-toast" style="padding: 12px 16px; background: #d1fae5; border: 1px solid #6ee7b7; color: #065f46; border-radius: 10px; font-weight: 700; font-size: 14px; opacity: 0; transition: opacity .3s;">
          ✓ Price updated successfully to ₹240
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 10: AVAILABILITY MANAGEMENT ================= -->
<section>
  <div class="w">
    <div class="hd r">
      <div class="eb">AVAILABILITY MANAGEMENT</div>
      <h2>Sold Out? <span class="sf">Turn It Off.</span></h2>
      <p>When an item isn't available, simply change its availability. Customers can see the current menu status instantly.</p>
    </div>

    <!-- Toggle Switches Mockup -->
    <div class="win r" style="max-width: 760px; margin: 0 auto 32px; box-shadow: var(--shadow-lg);">
      <div class="wb">
        <div class="dots"><i></i><i></i><i></i></div>
        <div class="ttl">ITEM AVAILABILITY CONTROLS</div>
        <div style="color: var(--green); font-weight: 700;">LIVE CONTROL</div>
      </div>
      <div style="padding: 24px; background: #fff; display: flex; flex-direction: column; gap: 14px;">

        <div style="display: flex; justify-content: space-between; align-items: center; padding: 14px 18px; border: 1px solid var(--line); border-radius: 12px; background: #fff;">
          <div style="font-weight: 700; font-size: 16px;">Chicken Biryani</div>
          <div style="display: flex; align-items: center; gap: 14px;">
            <span style="color: var(--green); font-weight: 500; font-size: 13px;">● Available</span>
            <div class="tgl-sw on" onclick="this.classList.toggle('on')"><div class="tgl-knob"></div></div>
          </div>
        </div>

        <div style="display: flex; justify-content: space-between; align-items: center; padding: 14px 18px; border: 1px solid var(--line); border-radius: 12px; background: #fff;">
          <div style="font-weight: 700; font-size: 16px;">Paneer Tikka</div>
          <div style="display: flex; align-items: center; gap: 14px;">
            <span style="color: var(--green); font-weight: 500; font-size: 13px;">● Available</span>
            <div class="tgl-sw on" onclick="this.classList.toggle('on')"><div class="tgl-knob"></div></div>
          </div>
        </div>

        <div style="display: flex; justify-content: space-between; align-items: center; padding: 14px 18px; border: 1px solid #fca5a5; border-radius: 12px; background: #fff5f5;">
          <div style="font-weight: 700; font-size: 16px; color: var(--ink);">Mutton Biryani</div>
          <div style="display: flex; align-items: center; gap: 14px;">
            <span style="color: var(--red); font-weight: 500; font-size: 13px;">○ Unavailable</span>
            <div class="tgl-sw" onclick="this.classList.toggle('on')"><div class="tgl-knob"></div></div>
          </div>
        </div>

        <div style="display: flex; justify-content: space-between; align-items: center; padding: 14px 18px; border: 1px solid var(--line); border-radius: 12px; background: #fff;">
          <div style="font-weight: 700; font-size: 16px;">Fresh Lime Soda</div>
          <div style="display: flex; align-items: center; gap: 14px;">
            <span style="color: var(--green); font-weight: 500; font-size: 13px;">● Available</span>
            <div class="tgl-sw on" onclick="this.classList.toggle('on')"><div class="tgl-knob"></div></div>
          </div>
        </div>

      </div>
    </div>

    <div style="text-align: center; max-width: 600px; margin: auto; padding: 16px; background: var(--bg2); border-radius: 16px; border: 1px solid var(--line);" class="r">
      <p style="font-weight: 700; color: var(--br);">✨ Keep your menu accurate, even during busy service hours.</p>
    </div>
  </div>
</section>

<!-- ================= SECTION 11 & 12: FOOD IMAGES & ITEM DETAILS ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd r">
      <h2>Let Your Food <span class="sf">Sell Itself.</span></h2>
      <p>Add high-quality images and details to give customers a better idea of what they're ordering.</p>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px; align-items: center;">
      <!-- Customer Card Preview -->
      <div class="card" style="padding: 0; max-width: 440px; margin: auto; box-shadow: var(--shadow-lg);">
        <div style="height: 240px; background-image: url('https://images.unsplash.com/photo-1563379091339-03b21ab4a4f8?w=800&auto=format&fit=crop&q=80'); background-size: cover; background-position: center; position: relative;">
          <span style="position: absolute; top: 16px; left: 16px; background: var(--br); color: #fff; padding: 4px 12px; border-radius: 8px; font-weight: 500; font-size: 11px;">★ TODAY'S SPECIAL</span>
        </div>
        <div style="padding: 24px;">
          <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 8px;">
            <h3 style="font-size: 22px;">Chicken Biryani</h3>
            <span style="font-size: 20px; font-weight: 500; color: var(--br);">₹240</span>
          </div>
          <p style="font-size: 14px; margin-bottom: 20px;">Aromatic basmati rice, tender chicken and traditional spices.</p>
          <button class="btn p" style="width: 100%; justify-content: center;">Add +</button>
        </div>
      </div>

      <!-- Item Variants & Add-ons Details -->
      <div class="win" style="box-shadow: var(--shadow-lg);">
        <div class="wb">
          <div class="dots"><i></i><i></i><i></i></div>
          <div class="ttl">ITEM VARIANTS & ADD-ONS CONFIGURATION</div>
          <div></div>
        </div>
        <div style="padding: 24px; background: #fff;">
          <h3 style="font-size: 20px; margin-bottom: 6px;">Chicken Pizza</h3>
          <p style="font-size: 13px; margin-bottom: 20px;">Classic hand-tossed pizza topped with chicken, mozzarella and herbs.</p>

          <div style="margin-bottom: 20px;">
            <div style="font-weight: 500; font-size: 11px; letter-spacing: 0.1em; color: var(--mute); text-transform: uppercase; margin-bottom: 10px;">SIZE OPTIONS</div>
            <div style="display: flex; gap: 10px;">
              <div style="flex: 1; padding: 10px; border: 1px solid var(--line); border-radius: 10px; text-align: center; cursor: pointer;">
                <div style="font-weight: 700;">Regular</div>
                <div style="color: var(--br); font-weight: 500; margin-top: 2px;">₹220</div>
              </div>
              <div style="flex: 1; padding: 10px; border: 2px solid var(--br); border-radius: 10px; text-align: center; background: var(--bg2); cursor: pointer;">
                <div style="font-weight: 500; color: var(--br);">Medium</div>
                <div style="color: var(--br); font-weight: 500; margin-top: 2px;">₹320</div>
              </div>
              <div style="flex: 1; padding: 10px; border: 1px solid var(--line); border-radius: 10px; text-align: center; cursor: pointer;">
                <div style="font-weight: 700;">Large</div>
                <div style="color: var(--br); font-weight: 500; margin-top: 2px;">₹420</div>
              </div>
            </div>
          </div>

          <div>
            <div style="font-weight: 500; font-size: 11px; letter-spacing: 0.1em; color: var(--mute); text-transform: uppercase; margin-bottom: 10px;">ADD-ONS</div>
            <div style="display: flex; flex-direction: column; gap: 8px;">
              <label style="display: flex; justify-content: space-between; padding: 10px 14px; border: 1px solid var(--line); border-radius: 10px; cursor: pointer;">
                <span><input type="checkbox" checked> Extra Cheese</span>
                <span style="font-weight: 500; color: var(--br);">+₹40</span>
              </label>
              <label style="display: flex; justify-content: space-between; padding: 10px 14px; border: 1px solid var(--line); border-radius: 10px; cursor: pointer;">
                <span><input type="checkbox" checked> Extra Chicken</span>
                <span style="font-weight: 500; color: var(--br);">+₹70</span>
              </label>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 13: SPECIALS & BADGES ================= -->
<section>
  <div class="w">
    <div class="hd r">
      <div class="eb">PROMOTIONS & HIGHLIGHTS</div>
      <h2>Put Your Best Sellers <span class="sf">in the Spotlight.</span></h2>
      <p>Highlight signature dishes, today's specials and promotional items so customers notice them first.</p>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 24px;">
      <div class="card" style="padding: 20px;">
        <span style="background: #fef3c7; color: #92400e; font-size: 11px; font-weight: 500; padding: 4px 10px; border-radius: 6px; text-transform: uppercase;">★ TODAY'S SPECIAL</span>
        <h4 style="font-size: 18px; margin: 12px 0 4px;">Chicken Biryani</h4>
        <p style="font-weight: 500; color: var(--br); font-size: 16px;">₹240</p>
      </div>

      <div class="card" style="padding: 20px;">
        <span style="background: #dbeafe; color: #1e40af; font-size: 11px; font-weight: 500; padding: 4px 10px; border-radius: 6px; text-transform: uppercase;">🔥 BEST SELLER</span>
        <h4 style="font-size: 18px; margin: 12px 0 4px;">Paneer Butter Masala</h4>
        <p style="font-weight: 500; color: var(--br); font-size: 16px;">₹220</p>
      </div>

      <div class="card" style="padding: 20px;">
        <span style="background: #d1fae5; color: #065f46; font-size: 11px; font-weight: 500; padding: 4px 10px; border-radius: 6px; text-transform: uppercase;">✨ NEW</span>
        <h4 style="font-size: 18px; margin: 12px 0 4px;">Truffle Garlic Naan</h4>
        <p style="font-weight: 500; color: var(--br); font-size: 16px;">₹110</p>
      </div>

      <div class="card" style="padding: 20px;">
        <span style="background: #fce7f3; color: #9d174d; font-size: 11px; font-weight: 500; padding: 4px 10px; border-radius: 6px; text-transform: uppercase;">👑 POPULAR</span>
        <h4 style="font-size: 18px; margin: 12px 0 4px;">Mango Lassi</h4>
        <p style="font-weight: 500; color: var(--br); font-size: 16px;">₹90</p>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 14: CUSTOMER EXPERIENCE SPLIT-SCREEN ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd r">
      <h2>One Update. <span class="sf">One Consistent Menu Experience.</span></h2>
      <p>What you manage on your dashboard is immediately reflected on your customer's screen.</p>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 32px; align-items: center;" class="r">
      <!-- LEFT - ADMIN -->
      <div class="win" style="box-shadow: var(--shadow-lg);">
        <div class="wb" style="background: var(--ink); color: #fff;">
          <div class="dots"><i></i><i></i><i></i></div>
          <div class="ttl" style="color: #fff;">ADMIN DASHBOARD</div>
          <div style="color: var(--br-gold);">ADMIN CONTROL</div>
        </div>
        <div style="padding: 24px; background: #fff;">
          <div style="padding: 14px; border: 1px solid var(--line); border-radius: 12px; margin-bottom: 14px;">
            <div style="font-weight: 700; margin-bottom: 4px;">Chicken Biryani</div>
            <div style="display: flex; items-center; gap: 8px;">
              <span style="text-decoration: line-through; color: var(--mute);">₹220</span>
              <span style="color: var(--br); font-weight: 500; font-size: 16px;">₹240</span>
            </div>
          </div>
          <div style="display: flex; justify-content: space-between; align-items: center; padding: 14px; border: 1px solid var(--line); border-radius: 12px;">
            <span style="font-weight: 700;">Status Toggle</span>
            <span style="color: var(--red); font-weight: 500;">Available → Unavailable</span>
          </div>
        </div>
      </div>

      <!-- RIGHT - CUSTOMER -->
      <div class="ph-frame" style="margin: auto; width: 100%; max-width: 320px;">
        <div class="ph-inner" style="height: 280px;">
          <div class="ph-header">
            <h6>CUSTOMER MOBILE MENU</h6>
          </div>
          <div class="ph-item" style="opacity: 0.7;">
            <div class="ph-img" style="background-image: url('https://images.unsplash.com/photo-1563379091339-03b21ab4a4f8?w=300&auto=format&fit=crop&q=80');"></div>
            <div class="ph-info">
              <h5>Chicken Biryani</h5>
              <p>₹240</p>
            </div>
            <span class="ph-badge unavail">Currently Unavailable</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 15 & 16: MENU STRUCTURE & MULTIPLE MENUS ================= -->
<section>
  <div class="w">
    <div class="hd r">
      <div class="eb">MULTI-MENU SUPPORT</div>
      <h2>Different Menus. <span class="sf">One Platform.</span></h2>
      <p>Create and manage menus for different dining experiences, service areas or business requirements.</p>
    </div>

    <!-- Interactive Menu Selector -->
    <div style="display: flex; justify-content: center; gap: 10px; margin-bottom: 32px; flex-wrap: wrap;" class="r">
      <button onclick="switchMenu('dine-in')" class="btn p" id="m-btn-dine-in" style="padding: 10px 20px; font-size: 14px;">DINE-IN</button>
      <button onclick="switchMenu('takeaway')" class="btn o" id="m-btn-takeaway" style="padding: 10px 20px; font-size: 14px;">TAKEAWAY</button>
      <button onclick="switchMenu('delivery')" class="btn o" id="m-btn-delivery" style="padding: 10px 20px; font-size: 14px;">DELIVERY</button>
      <button onclick="switchMenu('breakfast')" class="btn o" id="m-btn-breakfast" style="padding: 10px 20px; font-size: 14px;">BREAKFAST</button>
      <button onclick="switchMenu('special')" class="btn o" id="m-btn-special" style="padding: 10px 20px; font-size: 14px;">SPECIAL</button>
    </div>

    <!-- Menu Structure Preview Window -->
    <div class="win r" style="max-width: 800px; margin: auto; box-shadow: var(--shadow-lg);">
      <div class="wb">
        <div class="dots"><i></i><i></i><i></i></div>
        <div class="ttl" id="menu-title-display">DINE-IN MENU STRUCTURE</div>
        <div></div>
      </div>
      <div style="padding: 28px; background: #fff;" id="menu-structure-content">
        <div style="font-weight: 500; color: var(--br); font-size: 12px; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 12px;">STARTERS</div>
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-bottom: 24px;">
          <div style="padding: 10px; border: 1px solid var(--line); border-radius: 8px; font-weight: 700;">Chicken 65 <span style="float: right; color: var(--br);">₹180</span></div>
          <div style="padding: 10px; border: 1px solid var(--line); border-radius: 8px; font-weight: 700;">Paneer Tikka <span style="float: right; color: var(--br);">₹190</span></div>
        </div>

        <div style="font-weight: 500; color: var(--br); font-size: 12px; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 12px;">MAIN COURSE</div>
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-bottom: 24px;">
          <div style="padding: 10px; border: 1px solid var(--line); border-radius: 8px; font-weight: 700;">Butter Chicken <span style="float: right; color: var(--br);">₹260</span></div>
          <div style="padding: 10px; border: 1px solid var(--line); border-radius: 8px; font-weight: 700;">Paneer Butter Masala <span style="float: right; color: var(--br);">₹220</span></div>
        </div>

        <div style="font-weight: 500; color: var(--br); font-size: 12px; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 12px;">BIRYANI</div>
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
          <div style="padding: 10px; border: 1px solid var(--line); border-radius: 8px; font-weight: 700;">Chicken Biryani <span style="float: right; color: var(--br);">₹240</span></div>
          <div style="padding: 10px; border: 1px solid var(--line); border-radius: 8px; font-weight: 700;">Mutton Biryani <span style="float: right; color: var(--br);">₹340</span></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 17: BUSINESS BENEFITS ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd r">
      <h2>Less Menu Maintenance. <span class="sf">More Time for Your Business.</span></h2>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 24px;">
      <div class="card" style="padding: 28px;">
        <div class="ic" style="margin-bottom: 18px;">
          <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
        </div>
        <h3 style="font-size: 20px; margin-bottom: 8px;">Save Time</h3>
        <p>Make menu changes instantly without rebuilding or reprinting physical menus.</p>
      </div>

      <div class="card" style="padding: 28px;">
        <div class="ic" style="margin-bottom: 18px;">
          <svg viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
        </div>
        <h3 style="font-size: 20px; margin-bottom: 8px;">Reduce Errors</h3>
        <p>Keep prices, item descriptions, and availability accurate across your restaurant.</p>
      </div>

      <div class="card" style="padding: 28px;">
        <div class="ic" style="margin-bottom: 18px;">
          <svg viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
        </div>
        <h3 style="font-size: 20px; margin-bottom: 8px;">Improve Customer Experience</h3>
        <p>Give customers clear, updated, and visual menu information on their phones.</p>
      </div>

      <div class="card" style="padding: 28px;">
        <div class="ic" style="margin-bottom: 18px;">
          <svg viewBox="0 0 24 24"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
        </div>
        <h3 style="font-size: 20px; margin-bottom: 8px;">Promote More</h3>
        <p>Highlight specials, best sellers and new dishes to increase average order value.</p>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 18: RESTAURANT INDUSTRY SECTION ================= -->
<section>
  <div class="w">
    <div class="hd r">
      <div class="eb">BUILT FOR EVERY FOOD BUSINESS</div>
      <h2>Built for the Way <span class="sf">Your Business Serves.</span></h2>
    </div>

    <div class="ind-grid r">
      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=600&auto=format&fit=crop&q=80');">
          <div class="ind-overlay"></div>
        </div>
        <div class="ind-content">
          <h4>Restaurants</h4>
          <p>Manage large menus and everyday multi-course operations.</p>
        </div>
      </div>

      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1554118811-1e0d58224f24?w=600&auto=format&fit=crop&q=80');">
          <div class="ind-overlay"></div>
        </div>
        <div class="ind-content">
          <h4>Cafés</h4>
          <p>Showcase beverages, snacks, specialty coffees and daily specials.</p>
        </div>
      </div>

      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1509440159596-0249088772ff?w=600&auto=format&fit=crop&q=80');">
          <div class="ind-overlay"></div>
        </div>
        <div class="ind-content">
          <h4>Bakeries</h4>
          <p>Present fresh cakes, pastries, breads and seasonal products.</p>
        </div>
      </div>

      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1561758033-d89a9ad46330?w=600&auto=format&fit=crop&q=80');">
          <div class="ind-overlay"></div>
        </div>
        <div class="ind-content">
          <h4>QSR</h4>
          <p>Keep high-volume fast food menus simple, clear and quick.</p>
        </div>
      </div>

      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1566073771259-6a8506099945?w=600&auto=format&fit=crop&q=80');">
          <div class="ind-overlay"></div>
        </div>
        <div class="ind-content">
          <h4>Hotels</h4>
          <p>Manage extensive in-room dining and hotel restaurant menus.</p>
        </div>
      </div>

      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1556910103-1c02745aae4d?w=600&auto=format&fit=crop&q=80');">
          <div class="ind-overlay"></div>
        </div>
        <div class="ind-content">
          <h4>Cloud Kitchens</h4>
          <p>Present delivery-focused menus across multiple digital brands.</p>
        </div>
      </div>

      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1513104890138-7c749659a591?w=600&auto=format&fit=crop&q=80');">
          <div class="ind-overlay"></div>
        </div>
        <div class="ind-content">
          <h4>Pizzerias</h4>
          <p>Show crust sizes, toppings, add-ons and crust customizations.</p>
        </div>
      </div>

      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1555396273-367ea4eb4db5?w=600&auto=format&fit=crop&q=80');">
          <div class="ind-overlay"></div>
        </div>
        <div class="ind-content">
          <h4>Food Courts</h4>
          <p>Keep multiple food counters & categories organized.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 19 & 20: CONNECTED OPERATIONS & WORKFLOW ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd r">
      <h2>Your Menu <span class="sf">Connects Everything.</span></h2>
      <p>A menu is where every restaurant order begins. Geni Menu connects it with the rest of your restaurant operations.</p>
    </div>

    <!-- ECOSYSTEM FLOW -->
    <div style="display: flex; justify-content: center; gap: 12px; flex-wrap: wrap; margin-bottom: 48px;" class="r">
      <div style="padding: 14px 20px; background: var(--br); color: #fff; font-weight: 500; border-radius: 12px; box-shadow: var(--shadow-sm);">MENU</div>
      <div style="align-self: center; color: var(--br); font-size: 20px;">→</div>
      <div style="padding: 14px 20px; background: #fff; border: 1px solid var(--line); font-weight: 700; border-radius: 12px;">ORDERS</div>
      <div style="align-self: center; color: var(--br); font-size: 20px;">→</div>
      <div style="padding: 14px 20px; background: #fff; border: 1px solid var(--line); font-weight: 700; border-radius: 12px;">TABLES</div>
      <div style="align-self: center; color: var(--br); font-size: 20px;">→</div>
      <div style="padding: 14px 20px; background: #fff; border: 1px solid var(--line); font-weight: 700; border-radius: 12px;">KITCHEN</div>
      <div style="align-self: center; color: var(--br); font-size: 20px;">→</div>
      <div style="padding: 14px 20px; background: #fff; border: 1px solid var(--line); font-weight: 700; border-radius: 12px;">POS</div>
      <div style="align-self: center; color: var(--br); font-size: 20px;">→</div>
      <div style="padding: 14px 20px; background: #fff; border: 1px solid var(--line); font-weight: 700; border-radius: 12px;">PAYMENTS</div>
      <div style="align-self: center; color: var(--br); font-size: 20px;">→</div>
      <div style="padding: 14px 20px; background: #fff; border: 1px solid var(--line); font-weight: 700; border-radius: 12px;">REPORTS</div>
    </div>
  </div>
</section>

<!-- ================= SECTION 22: FEATURE CONNECTIONS ================= -->
<section>
  <div class="w">
    <div class="hd r">
      <h2>Seamlessly Connected to <span class="sf">Geni Menu Features.</span></h2>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px;">
      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 14px;">
          <svg viewBox="0 0 24 24"><path d="M16 2v4M8 2v4M3 10h18M5 4h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2z"/></svg>
        </div>
        <h4>Reservation Management</h4>
        <p style="font-size: 14px; margin: 6px 0 14px;">Manage table bookings and seating schedules.</p>
        <a href="{{ route('features.reservation-management') }}" style="color: var(--br); font-weight: 700; font-size: 14px;">Explore →</a>
      </div>

      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 14px;">
          <svg viewBox="0 0 24 24"><rect x="3" y="8" width="18" height="4" rx="1"/><path d="M6 12v7M18 12v7"/></svg>
        </div>
        <h4>Table Management</h4>
        <p style="font-size: 14px; margin: 6px 0 14px;">Organize floor plans and table statuses.</p>
        <a href="{{ route('features.table-management') }}" style="color: var(--br); font-weight: 700; font-size: 14px;">Explore →</a>
      </div>

      <div class="card" style="padding: 24px; border-color: var(--br);">
        <div class="ic" style="margin-bottom: 14px; background: var(--br); color: #fff;">
          <svg viewBox="0 0 24 24"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><rect x="8" y="2" width="8" height="4" rx="1"/></svg>
        </div>
        <h4>Order Management</h4>
        <p style="font-size: 14px; margin: 6px 0 14px;">Move menu selections into an organized order workflow.</p>
        <a href="{{ route('features.order-management') }}" style="color: var(--br); font-weight: 500; font-size: 14px;">Explore →</a>
      </div>

      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 14px;">
          <svg viewBox="0 0 24 24"><path d="M4 18h16a1 1 0 0 0 1-1A9 9 0 0 0 3 17a1 1 0 0 0 1 1z"/></svg>
        </div>
        <h4>KOT Management</h4>
        <p style="font-size: 14px; margin: 6px 0 14px;">Send tickets straight to the kitchen display.</p>
        <a href="{{ route('features.kot-management') }}" style="color: var(--br); font-weight: 700; font-size: 14px;">Explore →</a>
      </div>

      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 14px;">
          <svg viewBox="0 0 24 24"><rect x="4" y="3" width="16" height="10" rx="2"/><path d="M8 21h8M12 17v4"/></svg>
        </div>
        <h4>POS Management</h4>
        <p style="font-size: 14px; margin: 6px 0 14px;">Speed up billing and checkout with integrated POS.</p>
        <a href="{{ route('features.pos-management') }}" style="color: var(--br); font-weight: 700; font-size: 14px;">Explore →</a>
      </div>

      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 14px;">
          <svg viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg>
        </div>
        <h4>Inventory Management</h4>
        <p style="font-size: 14px; margin: 6px 0 14px;">Track recipe ingredients and stock usage.</p>
        <a href="{{ route('features.inventory-management') }}" style="color: var(--br); font-weight: 700; font-size: 14px;">Explore →</a>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 24: FAQ ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd r">
      <h2>Menu Management <span class="sf">FAQs</span></h2>
      <p>Got questions? We've got answers.</p>
    </div>

    <div class="faq-list r">
      <div class="faq-item open">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>Can I update menu prices anytime?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Menu prices can be updated whenever required. Changes are reflected instantly across your digital menu.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>Can I hide unavailable dishes?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. You can control item availability with a single toggle so customers see the exact current menu status.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>Can I create categories?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Organize your menu using custom categories such as starters, main course, biryani, beverages and desserts.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>Can I add food images?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Add high-quality images to menu items to create a visually appealing customer ordering experience.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>Can I add item descriptions?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Add detailed descriptions, ingredient notes, and spice levels to inform your diners.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>Can I manage variants and add-ons?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          If enabled in your Geni Menu configuration, item variations (sizes, portions) and additional options (extra cheese, toppings) can be configured easily.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>Can I manage my entire menu from one dashboard?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Menu items, categories, prices and availability can all be managed from a single centralized dashboard.
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 23: FINAL CTA ================= -->
<section style="background: linear-gradient(135deg, #876039 0%, #6f4e2d 100%); color: #fff; text-align: center;">
  <div class="w r">
    <div class="eb" style="background: rgba(255,255,255,0.15); color: #fff; border-color: rgba(255,255,255,0.3);">
      TAKE CONTROL TODAY
    </div>
    <h2 style="color: #fff; font-size: clamp(34px, 5vw, 54px);">Ready to Take Control <br><span class="sf" style="background: linear-gradient(135deg, #fff 0%, #f4efe9 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">of Your Menu?</span></h2>
    <p style="color: #f4efe9; max-width: 600px; margin: 20px auto 36px; font-size: 18px;">
      Create a smarter menu experience for your restaurant — and keep every item, price and availability detail up to date.
    </p>

    <div style="display: flex; gap: 16px; justify-content: center; flex-wrap: wrap;">
      <a href="{{ route('restaurant_signup') }}" class="btn" style="background: #fff; color: var(--br); border-color: #fff; font-size: 16px; padding: 16px 36px; box-shadow: 0 8px 24px rgba(0,0,0,0.2);">Get Started →</a>
      <a href="{{ route('contact.us') }}" class="btn" style="background: transparent; color: #fff; border-color: rgba(255,255,255,0.5); font-size: 16px; padding: 16px 36px;">Book a Demo</a>
    </div>

    <div style="margin-top: 36px; font-size: 14px; color: #e5d8c8; font-weight: 600;">
      Built for restaurants, cafés, hotels, bakeries, QSRs, cloud kitchens and modern food businesses.
    </div>
  </div>
</section>




<script>
// Interactive Price Change Simulation
function updatePriceSim() {
  const priceDisplay = document.getElementById('price-display');
  const priceToast = document.getElementById('price-toast');
  const priceBtn = document.getElementById('price-btn');

  if (priceDisplay.innerText === '₹220') {
    priceDisplay.innerText = '₹240';
    priceToast.style.opacity = '1';
    priceBtn.innerText = 'Reset Price';
  } else {
    priceDisplay.innerText = '₹220';
    priceToast.style.opacity = '0';
    priceBtn.innerText = 'Edit Price';
  }
}

// Interactive Menu Selector Switcher
function switchMenu(type) {
  const titleDisplay = document.getElementById('menu-title-display');
  const content = document.getElementById('menu-structure-content');
  const btns = ['dine-in', 'takeaway', 'delivery', 'breakfast', 'special'];

  btns.forEach(b => {
    const btn = document.getElementById('m-btn-' + b);
    if (btn) {
      if (b === type) {
        btn.className = 'btn p';
      } else {
        btn.className = 'btn o';
      }
    }
  });

  if (type === 'dine-in') {
    titleDisplay.innerText = 'DINE-IN MENU STRUCTURE';
    content.innerHTML = `
      <div style="font-weight: 500; color: var(--br); font-size: 12px; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 12px;">STARTERS</div>
      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-bottom: 24px;">
        <div style="padding: 10px; border: 1px solid var(--line); border-radius: 8px; font-weight: 700;">Chicken 65 <span style="float: right; color: var(--br);">₹180</span></div>
        <div style="padding: 10px; border: 1px solid var(--line); border-radius: 8px; font-weight: 700;">Paneer Tikka <span style="float: right; color: var(--br);">₹190</span></div>
      </div>
      <div style="font-weight: 500; color: var(--br); font-size: 12px; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 12px;">BIRYANI & MAINS</div>
      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
        <div style="padding: 10px; border: 1px solid var(--line); border-radius: 8px; font-weight: 700;">Chicken Biryani <span style="float: right; color: var(--br);">₹240</span></div>
        <div style="padding: 10px; border: 1px solid var(--line); border-radius: 8px; font-weight: 700;">Paneer Butter Masala <span style="float: right; color: var(--br);">₹220</span></div>
      </div>`;
  } else if (type === 'takeaway') {
    titleDisplay.innerText = 'TAKEAWAY EXPRESS MENU';
    content.innerHTML = `
      <div style="font-weight: 500; color: var(--br); font-size: 12px; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 12px;">QUICK COMBO PACKS</div>
      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-bottom: 24px;">
        <div style="padding: 10px; border: 1px solid var(--line); border-radius: 8px; font-weight: 700;">Biryani Box + Thums Up <span style="float: right; color: var(--br);">₹280</span></div>
        <div style="padding: 10px; border: 1px solid var(--line); border-radius: 8px; font-weight: 700;">Paneer Naan Combo <span style="float: right; color: var(--br);">₹230</span></div>
      </div>`;
  } else if (type === 'delivery') {
    titleDisplay.innerText = 'ONLINE DELIVERY MENU';
    content.innerHTML = `
      <div style="font-weight: 500; color: var(--br); font-size: 12px; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 12px;">DELIVERY PACKS</div>
      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
        <div style="padding: 10px; border: 1px solid var(--line); border-radius: 8px; font-weight: 700;">Family Biryani Pack <span style="float: right; color: var(--br);">₹850</span></div>
        <div style="padding: 10px; border: 1px solid var(--line); border-radius: 8px; font-weight: 700;">Party Starter Platter <span style="float: right; color: var(--br);">₹690</span></div>
      </div>`;
  } else if (type === 'breakfast') {
    titleDisplay.innerText = 'MORNING BREAKFAST MENU';
    content.innerHTML = `
      <div style="font-weight: 500; color: var(--br); font-size: 12px; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 12px;">SOUTH INDIAN SPECIALS</div>
      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
        <div style="padding: 10px; border: 1px solid var(--line); border-radius: 8px; font-weight: 700;">Masala Dosa + Filter Coffee <span style="float: right; color: var(--br);">₹110</span></div>
        <div style="padding: 10px; border: 1px solid var(--line); border-radius: 8px; font-weight: 700;">Idli Vada Combo <span style="float: right; color: var(--br);">₹80</span></div>
      </div>`;
  } else if (type === 'special') {
    titleDisplay.innerText = 'FESTIVE & SEASONAL SPECIALS';
    content.innerHTML = `
      <div style="font-weight: 500; color: var(--br); font-size: 12px; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 12px;">CHEF'S SIGNATURE</div>
      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
        <div style="padding: 10px; border: 1px solid var(--line); border-radius: 8px; font-weight: 700;">Special Mutton Nalli Nihari <span style="float: right; color: var(--br);">₹420</span></div>
        <div style="padding: 10px; border: 1px solid var(--line); border-radius: 8px; font-weight: 700;">Saffron Kheer <span style="float: right; color: var(--br);">₹140</span></div>
      </div>`;
  }
}

// FAQ Accordion Toggle
function toggleFaq(el) {
  const parent = el.parentElement;
  parent.classList.toggle('open');
}

// Scroll Reveal
document.addEventListener('DOMContentLoaded', () => {
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('in');
      }
    });
  }, { threshold: 0.1 });

  document.querySelectorAll('.r').forEach(el => observer.observe(el));
});
</script>

@endsection
