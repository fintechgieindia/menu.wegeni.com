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

      <!-- Hero Visual: Editorial Restaurant Lifestyle Photo with Floating Live Badges -->
      <div class="r in" style="transition-delay: 0.15s; position: relative; display: flex; justify-content: center; align-items: center;">
        <div style="position: relative; width: 100%; max-width: 610px; border-radius: 26px; overflow: hidden; box-shadow: 0 28px 64px rgba(33, 22, 15, 0.16), 0 6px 20px rgba(135, 96, 57, 0.10); border: 1px solid rgba(135, 96, 57, 0.16);">
          <img
            src="{{ asset('assets/images/menu-management-hero.jpg') }}?v=2"
            alt="Guest browsing Geni Menu digital QR menu at a restaurant table"
            style="width: 100%; height: auto; display: block; object-fit: cover;"
            loading="eager"
          />
          <div style="position: absolute; inset: 0; background: linear-gradient(180deg, rgba(33,22,15,0.06) 0%, rgba(33,22,15,0) 45%, rgba(33,22,15,0.42) 100%); pointer-events: none;"></div>

          <!-- Top-Left Live Sync Glass Pill -->
          <div style="position: absolute; top: 18px; left: 18px; display: inline-flex; align-items: center; gap: 8px; padding: 8px 14px; border-radius: 999px; background: rgba(255, 255, 255, 0.94); backdrop-filter: blur(10px); box-shadow: 0 8px 20px rgba(0,0,0,0.14); font-size: 12px; font-weight: 700; color: #21160F;">
            <span style="width: 8px; height: 8px; border-radius: 50%; background: #16A34A; box-shadow: 0 0 0 3px rgba(22,163,74,0.22);"></span>
            Live QR Menu Sync
          </div>

          <!-- Bottom-Left Menu Stats Floating Card -->
          <div style="position: absolute; bottom: 18px; left: 18px; right: 18px; display: flex; align-items: center; justify-content: space-between; gap: 12px; padding: 12px 16px; border-radius: 16px; background: rgba(255, 255, 255, 0.94); backdrop-filter: blur(12px); box-shadow: 0 12px 28px rgba(0,0,0,0.16); flex-wrap: wrap;">
            <div style="display: flex; align-items: center; gap: 11px;">
              <div style="width: 36px; height: 36px; border-radius: 10px; background: #876039; color: #FFFFFF; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/><path d="M9 8h6"/><path d="M9 12h4"/></svg>
              </div>
              <div>
                <div style="font-size: 13px; font-weight: 700; color: #21160F; line-height: 1.2;">Digital Menu Active</div>
                <div style="font-size: 11.5px; color: #6E6157; margin-top: 2px;">64 Dishes • 6 Categories • Instant Updates</div>
              </div>
            </div>
            <span style="font-size: 11.5px; font-weight: 700; color: #15803D; background: #DCFCE7; padding: 5px 11px; border-radius: 999px;">Updated Now</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= MM REDESIGNED SECTIONS STYLES ================= -->
<style>
  /* 1. Quick Value Strip */
  .mm-val-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
  }
  .mm-val-card {
    background: #FFFFFF;
    border: 1px solid rgba(135, 96, 57, 0.14);
    border-radius: 18px;
    padding: 24px 22px;
    position: relative;
    transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
    box-shadow: 0 4px 16px rgba(33, 22, 15, 0.03);
  }
  .mm-val-card:hover {
    transform: translateY(-4px);
    border-color: rgba(135, 96, 57, 0.35);
    box-shadow: 0 14px 32px rgba(135, 96, 57, 0.10);
  }
  .mm-val-top {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 16px;
  }
  .mm-val-ic {
    width: 44px;
    height: 44px;
    border-radius: 12px;
    background: #F6EFE7;
    color: #876039;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .mm-val-ic svg {
    width: 20px;
    height: 20px;
    stroke: currentColor;
    fill: none;
    stroke-width: 2;
    stroke-linecap: round;
    stroke-linejoin: round;
  }
  .mm-val-num {
    font-family: 'Outfit', sans-serif;
    font-size: 12px;
    font-weight: 700;
    color: #B49A80;
    letter-spacing: 0.06em;
  }
  .mm-val-card h4 {
    font-family: 'Outfit', 'Plus Jakarta Sans', sans-serif;
    font-size: 17px;
    font-weight: 700;
    color: #21160F;
    margin: 0 0 6px;
  }
  .mm-val-card p {
    font-size: 13.5px;
    line-height: 1.55;
    color: #6E6157;
    margin: 0;
  }

  /* Shared 2-Column Split */
  .mm-split {
    display: grid;
    grid-template-columns: 1fr 1.05fr;
    gap: 52px;
    align-items: center;
  }
  .mm-check-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 10px;
    list-style: none;
    padding: 0;
    margin: 0;
  }
  .mm-check-chip {
    display: flex;
    align-items: center;
    gap: 9px;
    background: #FFFFFF;
    border: 1px solid rgba(135, 96, 57, 0.14);
    border-radius: 11px;
    padding: 10px 13px;
    font-size: 13.5px;
    font-weight: 600;
    color: #21160F;
    box-shadow: 0 2px 6px rgba(33, 22, 15, 0.02);
  }
  .mm-check-dot {
    width: 20px;
    height: 20px;
    border-radius: 50%;
    background: #F6EFE7;
    color: #876039;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 11px;
    font-weight: 800;
    flex-shrink: 0;
  }
  .mm-feat-list {
    display: flex;
    flex-direction: column;
    gap: 11px;
    list-style: none;
    padding: 0;
    margin: 0;
  }
  .mm-feat-row {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 11px 14px;
    background: #FAF7F3;
    border: 1px solid rgba(135, 96, 57, 0.12);
    border-radius: 12px;
    font-size: 14px;
    font-weight: 600;
    color: #21160F;
  }
  .mm-feat-ic {
    width: 32px;
    height: 32px;
    border-radius: 9px;
    background: #FFFFFF;
    border: 1px solid rgba(135, 96, 57, 0.16);
    color: #876039;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
  }

  /* Polished Mockup Windows */
  .mm-win {
    background: #FFFFFF;
    border: 1px solid rgba(135, 96, 57, 0.18);
    border-radius: 22px;
    overflow: hidden;
    box-shadow: 0 20px 48px rgba(33, 22, 15, 0.08), 0 2px 8px rgba(135, 96, 57, 0.05);
  }
  .mm-win-bar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 13px 18px;
    background: #FAF6F0;
    border-bottom: 1px solid rgba(135, 96, 57, 0.12);
  }
  .mm-win-bar.dark {
    background: #21160F;
    border-bottom-color: rgba(255, 255, 255, 0.08);
  }
  .mm-win-dots {
    display: flex;
    gap: 6px;
  }
  .mm-win-dots i {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    display: block;
  }
  .mm-win-dots i:nth-child(1) { background: #F87171; }
  .mm-win-dots i:nth-child(2) { background: #FBBF24; }
  .mm-win-dots i:nth-child(3) { background: #34D399; }
  .mm-win-ttl {
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.1em;
    color: #76675D;
    text-transform: uppercase;
  }
  .mm-win-bar.dark .mm-win-ttl { color: #F5EFE8; }
  .mm-win-pill {
    font-size: 11px;
    font-weight: 700;
    padding: 4px 10px;
    border-radius: 999px;
    background: #F3E8DC;
    color: #876039;
  }
  .mm-win-pill.green {
    background: #DCFCE7;
    color: #15803D;
  }
  .mm-win-body {
    padding: 24px;
    background: #FFFFFF;
  }

  /* Category Rows */
  .mm-cat-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 12px 16px;
    border: 1px solid rgba(135, 96, 57, 0.14);
    border-radius: 13px;
    background: #FAF7F3;
    transition: all 0.2s ease;
  }
  .mm-cat-row.active {
    background: #FFFFFF;
    border: 1.5px solid #876039;
    box-shadow: 0 8px 20px rgba(135, 96, 57, 0.14);
    transform: translateX(4px);
  }
  .mm-cat-count {
    font-size: 11.5px;
    font-weight: 700;
    padding: 4px 10px;
    border-radius: 999px;
    background: #FFFFFF;
    color: #6E6157;
    border: 1px solid rgba(135, 96, 57, 0.14);
  }
  .mm-cat-row.active .mm-cat-count {
    background: #876039;
    color: #FFFFFF;
    border-color: #876039;
  }

  /* Price Simulator Channels */
  .mm-sync-channels {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 10px;
    margin-bottom: 16px;
  }
  .mm-chan-box {
    background: #FAF7F3;
    border: 1px solid rgba(135, 96, 57, 0.14);
    border-radius: 12px;
    padding: 11px 12px;
    text-align: center;
  }
  .mm-chan-lbl {
    font-size: 10.5px;
    font-weight: 700;
    color: #76675D;
    text-transform: uppercase;
    letter-spacing: 0.05em;
  }
  .mm-chan-price {
    font-family: 'Outfit', sans-serif;
    font-size: 17px;
    font-weight: 700;
    color: #21160F;
    margin-top: 3px;
  }

  /* Availability Rows */
  .mm-avail-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 13px 16px;
    border: 1px solid rgba(135, 96, 57, 0.14);
    border-radius: 14px;
    background: #FFFFFF;
    transition: all 0.2s ease;
  }
  .mm-avail-row.is-off {
    background: #FFF7F7;
    border-color: #FECDD3;
  }
  .mm-avail-dish {
    display: flex;
    align-items: center;
    gap: 12px;
  }
  .mm-avail-thumb {
    width: 44px;
    height: 44px;
    border-radius: 11px;
    object-fit: cover;
    border: 1px solid rgba(135, 96, 57, 0.12);
    flex-shrink: 0;
  }
  .mm-avail-badge {
    font-size: 12px;
    font-weight: 700;
    padding: 4px 10px;
    border-radius: 999px;
  }
  .mm-avail-badge.on {
    background: #DCFCE7;
    color: #15803D;
  }
  .mm-avail-badge.off {
    background: #FFE4E6;
    color: #BE123C;
  }

  /* Spotlight Cards */
  .mm-spot-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 22px;
  }
  .mm-spot-card {
    background: #FFFFFF;
    border: 1px solid rgba(135, 96, 57, 0.14);
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 8px 24px rgba(33, 22, 15, 0.04);
    transition: transform 0.25s ease, box-shadow 0.25s ease;
    display: flex;
    flex-direction: column;
  }
  .mm-spot-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 18px 38px rgba(135, 96, 57, 0.12);
  }
  .mm-spot-media {
    height: 158px;
    position: relative;
    overflow: hidden;
    background: #F4EFE8;
  }
  .mm-spot-media img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.35s ease;
  }
  .mm-spot-card:hover .mm-spot-media img {
    transform: scale(1.06);
  }
  .mm-spot-tag {
    position: absolute;
    top: 12px;
    left: 12px;
    font-size: 10.5px;
    font-weight: 700;
    padding: 5px 10px;
    border-radius: 999px;
    display: inline-flex;
    align-items: center;
    gap: 5px;
    letter-spacing: 0.04em;
    backdrop-filter: blur(8px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.10);
  }
  .mm-spot-body {
    padding: 18px;
    flex: 1;
    display: flex;
    flex-direction: column;
  }
  .mm-spot-body h4 {
    font-family: 'Outfit', 'Plus Jakarta Sans', sans-serif;
    font-size: 17px;
    font-weight: 700;
    color: #21160F;
    margin: 0 0 5px;
  }
  .mm-spot-desc {
    font-size: 12.5px;
    color: #6E6157;
    line-height: 1.5;
    margin: 0 0 14px;
    flex: 1;
  }
  .mm-spot-foot {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: 12px;
    border-top: 1px solid rgba(135, 96, 57, 0.10);
  }
  .mm-spot-price {
    font-family: 'Outfit', sans-serif;
    font-size: 18px;
    font-weight: 700;
    color: #876039;
  }
  .mm-spot-stat {
    font-size: 11px;
    font-weight: 600;
    color: #76675D;
    background: #FAF6F0;
    padding: 3px 9px;
    border-radius: 999px;
  }

  /* Split Sync Section */
  .mm-sync-grid {
    display: grid;
    grid-template-columns: 1.15fr auto 0.95fr;
    gap: 24px;
    align-items: center;
    max-width: 1060px;
    margin: 0 auto;
  }
  .mm-sync-bridge {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
  }
  .mm-sync-circle {
    width: 54px;
    height: 54px;
    border-radius: 50%;
    background: linear-gradient(135deg, #876039 0%, #6f4e2d 100%);
    color: #FFFFFF;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 10px 26px rgba(135, 96, 57, 0.30);
    border: 4px solid #FFFFFF;
  }
  .mm-sync-caption {
    font-size: 11px;
    font-weight: 700;
    color: #876039;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    white-space: nowrap;
  }
  .mm-live-phone {
    width: 100%;
    max-width: 300px;
    margin: 0 auto;
    background: #1C1917;
    border-radius: 34px;
    padding: 10px;
    box-shadow: 0 24px 52px rgba(28, 25, 23, 0.22);
  }
  .mm-live-phone-inner {
    background: #FFFFFF;
    border-radius: 25px;
    padding: 16px 14px 18px;
  }

  /* Multi-Menu Tabs */
  .mm-tab-bar {
    display: inline-flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 6px;
    background: #FAF6F0;
    border: 1px solid rgba(135, 96, 57, 0.16);
    padding: 6px;
    border-radius: 999px;
    margin: 0 auto 30px;
  }
  .mm-tab-btn {
    border: 0;
    background: transparent;
    color: #6E6157;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13px;
    font-weight: 700;
    padding: 9px 20px;
    border-radius: 999px;
    cursor: pointer;
    transition: all 0.2s ease;
    letter-spacing: 0.03em;
  }
  .mm-tab-btn:hover {
    color: #21160F;
  }
  .mm-tab-btn.active {
    background: #876039;
    color: #FFFFFF;
    box-shadow: 0 6px 16px rgba(135, 96, 57, 0.28);
  }
  .mm-menu-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
    margin-bottom: 22px;
  }
  .mm-menu-dish {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 13px 16px;
    border: 1px solid rgba(135, 96, 57, 0.14);
    border-radius: 13px;
    background: #FAF8F5;
    transition: border-color 0.2s ease, background 0.2s ease;
  }
  .mm-menu-dish:hover {
    border-color: rgba(135, 96, 57, 0.35);
    background: #FFFFFF;
  }

  /* Business Benefits */
  .mm-ben-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 22px;
  }
  .mm-ben-card {
    background: #FFFFFF;
    border: 1px solid rgba(135, 96, 57, 0.14);
    border-radius: 20px;
    padding: 26px 22px;
    box-shadow: 0 8px 24px rgba(33, 22, 15, 0.04);
    transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
  }
  .mm-ben-card:hover {
    transform: translateY(-5px);
    border-color: rgba(135, 96, 57, 0.35);
    box-shadow: 0 18px 36px rgba(135, 96, 57, 0.10);
  }
  .mm-ben-head {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 18px;
  }
  .mm-ben-tag {
    font-size: 11px;
    font-weight: 700;
    color: #876039;
    background: #F6EFE7;
    padding: 4px 10px;
    border-radius: 999px;
  }
  .mm-ben-card h3 {
    font-family: 'Outfit', 'Plus Jakarta Sans', sans-serif;
    font-size: 19px;
    font-weight: 700;
    color: #21160F;
    margin: 0 0 8px;
  }
  .mm-ben-card p {
    font-size: 14px;
    line-height: 1.6;
    color: #6E6157;
    margin: 0;
  }

  /* Industry Cards Upgrade */
  .mm-ind-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 22px;
  }
  .mm-ind-card {
    background: #FFFFFF;
    border: 1px solid rgba(135, 96, 57, 0.14);
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 6px 20px rgba(33, 22, 15, 0.04);
    transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
  }
  .mm-ind-card:hover {
    transform: translateY(-5px);
    border-color: rgba(135, 96, 57, 0.35);
    box-shadow: 0 18px 38px rgba(135, 96, 57, 0.12);
  }
  .mm-ind-media {
    height: 162px;
    position: relative;
    overflow: hidden;
  }
  .mm-ind-media img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
  }
  .mm-ind-card:hover .mm-ind-media img {
    transform: scale(1.07);
  }
  .mm-ind-scrim {
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, rgba(33, 22, 15, 0) 40%, rgba(33, 22, 15, 0.55) 100%);
  }
  .mm-ind-pill {
    position: absolute;
    bottom: 12px;
    left: 12px;
    background: rgba(255, 255, 255, 0.92);
    color: #21160F;
    font-size: 11px;
    font-weight: 700;
    padding: 4px 10px;
    border-radius: 999px;
    backdrop-filter: blur(6px);
  }
  .mm-ind-body {
    padding: 18px;
  }
  .mm-ind-body h4 {
    font-family: 'Outfit', 'Plus Jakarta Sans', sans-serif;
    font-size: 17px;
    font-weight: 700;
    color: #21160F;
    margin: 0 0 6px;
  }
  .mm-ind-body p {
    font-size: 13.5px;
    line-height: 1.55;
    color: #6E6157;
    margin: 0;
  }

  /* Ecosystem Connected 7-Step Flow */
  .mm-eco-grid {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 14px;
    align-items: stretch;
  }
  .mm-eco-step {
    background: #FFFFFF;
    border: 1px solid rgba(135, 96, 57, 0.14);
    border-radius: 18px;
    padding: 16px 10px 18px;
    text-align: center;
    position: relative;
    transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
    box-shadow: 0 4px 14px rgba(33, 22, 15, 0.03);
  }
  .mm-eco-step:hover {
    transform: translateY(-4px);
    border-color: rgba(135, 96, 57, 0.4);
    box-shadow: 0 12px 28px rgba(135, 96, 57, 0.10);
  }
  .mm-eco-step.active {
    background: linear-gradient(180deg, #FFFDF9 0%, #F7EFE5 100%);
    border: 1.5px solid #876039;
    box-shadow: 0 12px 28px rgba(135, 96, 57, 0.14);
  }
  .mm-eco-num {
    display: inline-block;
    font-size: 10px;
    font-weight: 800;
    color: #876039;
    background: #F6EFE7;
    padding: 2px 8px;
    border-radius: 999px;
    margin-bottom: 10px;
  }
  .mm-eco-step.active .mm-eco-num {
    background: #876039;
    color: #FFFFFF;
  }
  .mm-eco-img {
    width: 68px;
    height: 68px;
    object-fit: contain;
    margin: 0 auto 10px;
    display: block;
  }
  .mm-eco-title {
    font-family: 'Outfit', 'Plus Jakarta Sans', sans-serif;
    font-size: 13px;
    font-weight: 700;
    color: #21160F;
    letter-spacing: 0.02em;
  }

  /* Connected Features 3x2 Grid */
  .mm-conn-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 22px;
  }
  .mm-conn-card {
    background: #FFFFFF;
    border: 1px solid rgba(135, 96, 57, 0.14);
    border-radius: 20px;
    padding: 26px 24px;
    display: flex;
    flex-direction: column;
    text-decoration: none;
    transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
    box-shadow: 0 6px 20px rgba(33, 22, 15, 0.03);
  }
  .mm-conn-card:hover {
    transform: translateY(-5px);
    border-color: #876039;
    box-shadow: 0 18px 36px rgba(135, 96, 57, 0.12);
  }
  .mm-conn-card.featured {
    border-color: rgba(135, 96, 57, 0.45);
    background: linear-gradient(180deg, #FFFFFF 0%, #FAF6F0 100%);
  }
  .mm-conn-card h4 {
    font-family: 'Outfit', 'Plus Jakarta Sans', sans-serif;
    font-size: 18px;
    font-weight: 700;
    color: #21160F;
    margin: 0 0 8px;
  }
  .mm-conn-card p {
    font-size: 14px;
    line-height: 1.55;
    color: #6E6157;
    margin: 0 0 18px;
    flex: 1;
  }
  .mm-conn-link {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 13.5px;
    font-weight: 700;
    color: #876039;
    transition: gap 0.2s ease;
  }
  .mm-conn-card:hover .mm-conn-link {
    gap: 10px;
  }

  /* Responsive Breakpoints */
  @media (max-width: 1100px) {
    .mm-val-grid,
    .mm-spot-grid,
    .mm-ben-grid,
    .mm-ind-grid {
      grid-template-columns: repeat(2, 1fr);
    }
    .mm-eco-grid {
      grid-template-columns: repeat(4, 1fr);
    }
    .mm-conn-grid {
      grid-template-columns: repeat(2, 1fr);
    }
  }
  @media (max-width: 900px) {
    .mm-split,
    .mm-sync-grid {
      grid-template-columns: 1fr;
      gap: 32px;
    }
    .mm-sync-bridge {
      flex-direction: row;
      justify-content: center;
    }
  }
  @media (max-width: 600px) {
    .mm-val-grid,
    .mm-spot-grid,
    .mm-ben-grid,
    .mm-ind-grid,
    .mm-conn-grid,
    .mm-check-grid,
    .mm-menu-grid,
    .mm-sync-channels {
      grid-template-columns: 1fr;
    }
    .mm-eco-grid {
      grid-template-columns: repeat(2, 1fr);
    }
  }
</style>

<!-- ================= SECTION 4: QUICK VALUE STRIP ================= -->
<section style="padding: 46px 0; background: var(--bg2); border-top: 1px solid var(--line); border-bottom: 1px solid var(--line);">
  <div class="w">
    <div class="mm-val-grid r in">
      <div class="mm-val-card">
        <div class="mm-val-top">
          <div class="mm-val-ic">
            <svg viewBox="0 0 24 24"><path d="M21.5 2v6h-6"/><path d="M21.34 15.57a10 10 0 1 1-.57-8.38l5.67-5.67"/></svg>
          </div>
          <span class="mm-val-num">01</span>
        </div>
        <h4>Instant Updates</h4>
        <p>Change dishes, prices, and descriptions live in seconds.</p>
      </div>

      <div class="mm-val-card">
        <div class="mm-val-top">
          <div class="mm-val-ic">
            <svg viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h16"/><path d="M8 6v12M16 6v12"/></svg>
          </div>
          <span class="mm-val-num">02</span>
        </div>
        <h4>Easy Organization</h4>
        <p>Keep dishes, categories, and modifiers cleanly structured.</p>
      </div>

      <div class="mm-val-card">
        <div class="mm-val-top">
          <div class="mm-val-ic">
            <svg viewBox="0 0 24 24"><path d="M18.36 6.64a9 9 0 1 1-12.73 0"/><line x1="12" y1="2" x2="12" y2="12"/></svg>
          </div>
          <span class="mm-val-num">03</span>
        </div>
        <h4>Availability Control</h4>
        <p>Toggle sold-out items off instantly during peak rush.</p>
      </div>

      <div class="mm-val-card">
        <div class="mm-val-top">
          <div class="mm-val-ic">
            <svg viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
          </div>
          <span class="mm-val-num">04</span>
        </div>
        <h4>One Central Menu</h4>
        <p>Control dine-in, takeaway, and delivery from one hub.</p>
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
            <span class="cta-sparkle"><svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="m12 3-1.9 5.8a2 2 0 0 1-1.3 1.3L3 12l5.8 1.9a2 2 0 0 1 1.3 1.3L12 21l1.9-5.8a2 2 0 0 1 1.3-1.3L21 12l-5.8-1.9a2 2 0 0 1-1.3-1.3L12 3Z"/></svg></span> Customers See It Instantly on Mobile!
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
    <div class="mm-split r">
      <div>
        <div class="eb">MENU ITEM MANAGEMENT</div>
        <h2>Add. Edit. Organize.</h2>
        <p style="margin: 14px 0 26px;">Create and manage every dish from a single interface effortlessly.</p>

        <ul class="mm-check-grid">
          <li class="mm-check-chip"><span class="mm-check-dot">✓</span> Add new menu items</li>
          <li class="mm-check-chip"><span class="mm-check-dot">✓</span> Edit item names</li>
          <li class="mm-check-chip"><span class="mm-check-dot">✓</span> Update descriptions</li>
          <li class="mm-check-chip"><span class="mm-check-dot">✓</span> Change prices</li>
          <li class="mm-check-chip"><span class="mm-check-dot">✓</span> Add food images</li>
          <li class="mm-check-chip"><span class="mm-check-dot">✓</span> Manage item details</li>
          <li class="mm-check-chip"><span class="mm-check-dot">✓</span> Assign categories</li>
          <li class="mm-check-chip"><span class="mm-check-dot">✓</span> Control availability</li>
        </ul>
      </div>

      <!-- Realistic EDIT MENU ITEM Visual Modal -->
      <div class="mm-win">
        <div class="mm-win-bar">
          <div class="mm-win-dots"><i></i><i></i><i></i></div>
          <div class="mm-win-ttl">EDIT MENU ITEM</div>
          <span class="mm-win-pill green">● Live on QR</span>
        </div>
        <div class="mm-win-body" style="display: flex; flex-direction: column; gap: 15px;">
          <div style="display: flex; gap: 16px; align-items: center; padding: 12px; background: #FAF7F3; border-radius: 14px; border: 1px solid rgba(135,96,57,0.12);">
            <img src="https://images.unsplash.com/photo-1563379091339-03b21ab4a4f8?w=300&auto=format&fit=crop&q=80" alt="Chicken Biryani" style="width: 72px; height: 72px; border-radius: 12px; object-fit: cover; border: 1px solid var(--line); flex: none;">
            <div style="flex: 1;">
              <div style="display: flex; align-items: center; gap: 8px; flex-wrap: wrap;">
                <button type="button" style="background: #FFFFFF; border: 1px solid rgba(135,96,57,0.22); padding: 7px 13px; border-radius: 9px; font-weight: 700; font-size: 12.5px; color: #876039; cursor: pointer; display: inline-flex; align-items: center; gap: 6px;">
                  <svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3z"/><circle cx="12" cy="13" r="3"/></svg>
                  Change Food Image
                </button>
              </div>
              <div style="font-size: 11px; color: #76675D; margin-top: 6px;">High-res PNG or JPG up to 5MB • Auto-optimized for mobile</div>
            </div>
          </div>

          <div>
            <label style="font-weight: 700; font-size: 11.5px; color: #6E6157; text-transform: uppercase; letter-spacing: 0.05em; display: block; margin-bottom: 5px;">Item Name</label>
            <input type="text" value="Chicken Biryani" style="width: 100%; padding: 10px 13px; border: 1px solid rgba(135,96,57,0.2); border-radius: 10px; font-weight: 700; color: #21160F; font-size: 14px; background: #FFFDFB;">
          </div>

          <div>
            <label style="font-weight: 700; font-size: 11.5px; color: #6E6157; text-transform: uppercase; letter-spacing: 0.05em; display: block; margin-bottom: 5px;">Description</label>
            <textarea style="width: 100%; padding: 10px 13px; border: 1px solid rgba(135,96,57,0.2); border-radius: 10px; font-size: 13px; font-weight: 500; color: #4A3D34; height: 58px; resize: none; background: #FFFDFB;">Aromatic basmati rice slow-cooked with tender chicken and traditional Hyderabadi spices.</textarea>
          </div>

          <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
            <div>
              <label style="font-weight: 700; font-size: 11.5px; color: #6E6157; text-transform: uppercase; letter-spacing: 0.05em; display: block; margin-bottom: 5px;">Price (₹)</label>
              <input type="text" value="₹240" style="width: 100%; padding: 10px 13px; border: 1px solid rgba(135,96,57,0.2); border-radius: 10px; font-weight: 700; color: #876039; font-size: 14px; background: #FFFDFB;">
            </div>
            <div>
              <label style="font-weight: 700; font-size: 11.5px; color: #6E6157; text-transform: uppercase; letter-spacing: 0.05em; display: block; margin-bottom: 5px;">Category</label>
              <select style="width: 100%; padding: 10px 13px; border: 1px solid rgba(135,96,57,0.2); border-radius: 10px; font-weight: 600; color: #21160F; font-size: 14px; background: #FFFDFB;">
                <option selected>Biryani</option>
                <option>Starters</option>
                <option>Main Course</option>
              </select>
            </div>
          </div>

          <div style="display: flex; justify-content: space-between; align-items: center; padding-top: 12px; border-top: 1px solid rgba(135,96,57,0.12); flex-wrap: wrap; gap: 10px;">
            <div style="display: inline-flex; align-items: center; gap: 8px; font-size: 13px; font-weight: 700; color: #21160F;">
              Status: <span class="mm-avail-badge on">● Available</span>
            </div>
            <button type="button" class="btn p" style="padding: 10px 22px; font-size: 13px; border-radius: 10px;">Save Changes</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 8: CATEGORY MANAGEMENT ================= -->
<section>
  <div class="w">
    <div class="mm-split r">
      <!-- Copy -->
      <div>
        <div class="eb">CATEGORY MANAGEMENT</div>
        <h2>Keep Every Dish in <span class="sf">the Right Place.</span></h2>
        <p style="margin: 14px 0 24px;">
          Organize your menu into clear categories so customers can discover what they want faster.
        </p>

        <ul class="mm-feat-list">
          <li class="mm-feat-row">
            <span class="mm-feat-ic"><svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M4 20h16a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.93a2 2 0 0 1-1.66-.9l-.82-1.2A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13c0 1.1.9 2 2 2Z"/></svg></span>
            Create custom categories for every course
          </li>
          <li class="mm-feat-row">
            <span class="mm-feat-ic"><svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/></svg></span>
            Rename categories anytime on demand
          </li>
          <li class="mm-feat-row">
            <span class="mm-feat-ic"><svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="m7 15 5 5 5-5"/><path d="m7 9 5-5 5 5"/></svg></span>
            Reorder categories with simple drag &amp; drop
          </li>
          <li class="mm-feat-row">
            <span class="mm-feat-ic"><svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"/><path d="M21 3v5h-5"/><path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"/><path d="M8 16H3v5"/></svg></span>
            Move items between categories seamlessly
          </li>
          <li class="mm-feat-row">
            <span class="mm-feat-ic"><svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="m12 3-1.9 5.8a2 2 0 0 1-1.3 1.3L3 12l5.8 1.9a2 2 0 0 1 1.3 1.3L12 21l1.9-5.8a2 2 0 0 1 1.3-1.3L21 12l-5.8-1.9a2 2 0 0 1-1.3-1.3L12 3Z"/></svg></span>
            Keep the menu structured for fast mobile browsing
          </li>
        </ul>
      </div>

      <!-- Category UI Mockup -->
      <div class="mm-win">
        <div class="mm-win-bar">
          <div class="mm-win-dots"><i></i><i></i><i></i></div>
          <div class="mm-win-ttl">MENU CATEGORIES &amp; REORDERING</div>
          <span class="mm-win-pill">+ New Category</span>
        </div>
        <div class="mm-win-body" style="display: flex; flex-direction: column; gap: 10px;">
          <div class="mm-cat-row">
            <div style="display: flex; align-items: center; gap: 11px; font-weight: 700; color: #21160F;">
              <span style="cursor: grab; color: #A89A8E; letter-spacing: 1px;">⋮⋮</span>
              <svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M4 11h16a1 1 0 0 1 1 1v.5c0 4.5-4 8.5-9 8.5s-9-4-9-8.5V12a1 1 0 0 1 1-1Z"/><path d="M12 3v4"/><path d="M8 5v2"/><path d="M16 5v2"/></svg>
              Starters
            </div>
            <span class="mm-cat-count">12 Items</span>
          </div>

          <div class="mm-cat-row active">
            <div style="display: flex; align-items: center; gap: 11px; font-weight: 700; color: #876039;">
              <span style="cursor: grabbing; color: #876039; letter-spacing: 1px;">⋮⋮</span>
              <svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M4 11h16a1 1 0 0 1 1 1v.5c0 4.5-4 8.5-9 8.5s-9-4-9-8.5V12a1 1 0 0 1 1-1Z"/><path d="M12 3v4"/><path d="M8 5v2"/><path d="M16 5v2"/></svg>
              Main Course
              <span style="font-size: 10px; font-weight: 700; background: #F6EFE7; color: #876039; padding: 2px 7px; border-radius: 99px;">Dragging</span>
            </div>
            <span class="mm-cat-count">18 Items</span>
          </div>

          <div class="mm-cat-row">
            <div style="display: flex; align-items: center; gap: 11px; font-weight: 700; color: #21160F;">
              <span style="cursor: grab; color: #A89A8E; letter-spacing: 1px;">⋮⋮</span>
              <svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M4 11h16a1 1 0 0 1 1 1v.5c0 4.5-4 8.5-9 8.5s-9-4-9-8.5V12a1 1 0 0 1 1-1Z"/><path d="M12 3v4"/><path d="M8 5v2"/><path d="M16 5v2"/></svg>
              Biryani
            </div>
            <span class="mm-cat-count">8 Items</span>
          </div>

          <div class="mm-cat-row">
            <div style="display: flex; align-items: center; gap: 11px; font-weight: 700; color: #21160F;">
              <span style="cursor: grab; color: #A89A8E; letter-spacing: 1px;">⋮⋮</span>
              <svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M4 11h16a1 1 0 0 1 1 1v.5c0 4.5-4 8.5-9 8.5s-9-4-9-8.5V12a1 1 0 0 1 1-1Z"/><path d="M12 3v4"/><path d="M8 5v2"/><path d="M16 5v2"/></svg>
              Noodles &amp; Rice
            </div>
            <span class="mm-cat-count">10 Items</span>
          </div>

          <div class="mm-cat-row">
            <div style="display: flex; align-items: center; gap: 11px; font-weight: 700; color: #21160F;">
              <span style="cursor: grab; color: #A89A8E; letter-spacing: 1px;">⋮⋮</span>
              <svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M8 22h8"/><path d="M12 11v11"/><path d="m19 3-7 8-7-8Z"/></svg>
              Beverages
            </div>
            <span class="mm-cat-count">15 Items</span>
          </div>

          <div class="mm-cat-row">
            <div style="display: flex; align-items: center; gap: 11px; font-weight: 700; color: #21160F;">
              <span style="cursor: grab; color: #A89A8E; letter-spacing: 1px;">⋮⋮</span>
              <svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M20 21v-8a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v8"/><path d="M4 16s.5-1 2-1 2.5 2 4 2 2.5-2 4-2 2.5 2 4 2 2-1 2-1"/><path d="M2 21h20"/><path d="M7 8v3"/><path d="M12 8v3"/><path d="M17 8v3"/></svg>
              Desserts
            </div>
            <span class="mm-cat-count">9 Items</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 9: PRICE MANAGEMENT ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="mm-split r">
      <div>
        <div class="eb">PRICE MANAGEMENT</div>
        <h2>Prices Change. <br><span class="sf">Your Menu Shouldn't Have To.</span></h2>
        <p style="margin: 14px 0 24px;">
          Update prices whenever your business changes — without redesigning or replacing your menu.
        </p>

        <ul class="mm-feat-list">
          <li class="mm-feat-row"><span class="mm-check-dot">✓</span> Update prices quickly in seconds</li>
          <li class="mm-feat-row"><span class="mm-check-dot">✓</span> Keep pricing accurate across all customer touchpoints</li>
          <li class="mm-feat-row"><span class="mm-check-dot">✓</span> Avoid outdated physical menus &amp; sticker patches</li>
          <li class="mm-feat-row"><span class="mm-check-dot">✓</span> Maintain pricing consistency across dine-in, takeout and delivery</li>
        </ul>
      </div>

      <!-- Interactive Price Change Simulator -->
      <div class="mm-win">
        <div class="mm-win-bar">
          <div class="mm-win-dots"><i></i><i></i><i></i></div>
          <div class="mm-win-ttl">LIVE PRICE UPDATE SIMULATOR</div>
          <span class="mm-win-pill">Interactive</span>
        </div>
        <div class="mm-win-body">
          <div style="padding: 18px; border: 1px solid rgba(135,96,57,0.16); border-radius: 16px; background: #FAF7F3; display: flex; justify-content: space-between; align-items: center; gap: 14px; margin-bottom: 16px; flex-wrap: wrap;">
            <div style="display: flex; align-items: center; gap: 14px;">
              <img src="https://images.unsplash.com/photo-1563379091339-03b21ab4a4f8?w=240&auto=format&fit=crop&q=80" alt="Chicken Biryani" style="width: 58px; height: 58px; border-radius: 12px; object-fit: cover; border: 1px solid rgba(135,96,57,0.15);">
              <div>
                <div style="font-size: 11px; font-weight: 700; color: #876039; text-transform: uppercase; letter-spacing: 0.06em;">Biryani • Best Seller</div>
                <div style="font-weight: 700; font-size: 17px; color: #21160F; margin-top: 2px;">Chicken Biryani</div>
                <div id="price-display" style="font-family: 'Outfit', sans-serif; font-size: 24px; font-weight: 700; color: #876039; margin-top: 2px;">₹220</div>
              </div>
            </div>
            <button type="button" id="price-btn" onclick="updatePriceSim()" class="btn p" style="padding: 11px 20px; font-size: 13px; border-radius: 10px;">Edit Price → ₹240</button>
          </div>

          <!-- 3-Channel Live Sync Preview -->
          <div style="font-size: 11px; font-weight: 700; color: #76675D; text-transform: uppercase; letter-spacing: 0.08em; margin-bottom: 10px;">Synced Live Across All Channels</div>
          <div class="mm-sync-channels">
            <div class="mm-chan-box">
              <div class="mm-chan-lbl">QR Dine-In</div>
              <div class="mm-chan-price mm-synced-price">₹220</div>
            </div>
            <div class="mm-chan-box">
              <div class="mm-chan-lbl">Takeaway</div>
              <div class="mm-chan-price mm-synced-price">₹220</div>
            </div>
            <div class="mm-chan-box">
              <div class="mm-chan-lbl">POS Billing</div>
              <div class="mm-chan-price mm-synced-price">₹220</div>
            </div>
          </div>

          <div id="price-toast" style="padding: 12px 15px; background: #ECFDF5; border: 1px solid #A7F3D0; color: #065F46; border-radius: 12px; font-weight: 700; font-size: 13px; opacity: 0; transform: translateY(4px); transition: all 0.25s ease;">
            ✓ Price updated to ₹240 and synced across QR Menu, Takeaway &amp; POS!
          </div>
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
      <p>When an item isn't available, simply toggle its availability. Customers see the exact live menu status immediately.</p>
    </div>

    <!-- Toggle Switches Mockup -->
    <div class="mm-win r" style="max-width: 780px; margin: 0 auto 28px;">
      <div class="mm-win-bar">
        <div class="mm-win-dots"><i></i><i></i><i></i></div>
        <div class="mm-win-ttl">ITEM AVAILABILITY CONTROLS</div>
        <span class="mm-win-pill green" id="avail-summary-pill">3 Available • 1 Sold Out</span>
      </div>
      <div class="mm-win-body" style="display: flex; flex-direction: column; gap: 12px;">

        <div class="mm-avail-row">
          <div class="mm-avail-dish">
            <img src="https://images.unsplash.com/photo-1563379091339-03b21ab4a4f8?w=160&auto=format&fit=crop&q=80" alt="Chicken Biryani" class="mm-avail-thumb">
            <div>
              <div style="font-weight: 700; font-size: 15.5px; color: #21160F;">Chicken Biryani</div>
              <div style="font-size: 12px; color: #76675D;">Biryani • ₹240</div>
            </div>
          </div>
          <div style="display: flex; align-items: center; gap: 14px;">
            <span class="mm-avail-badge on">● Available</span>
            <div class="tgl-sw on" onclick="toggleAvailRow(this)"><div class="tgl-knob"></div></div>
          </div>
        </div>

        <div class="mm-avail-row">
          <div class="mm-avail-dish">
            <img src="https://images.unsplash.com/photo-1631452180519-c014fe946bc7?w=160&auto=format&fit=crop&q=80" alt="Paneer Tikka" class="mm-avail-thumb">
            <div>
              <div style="font-weight: 700; font-size: 15.5px; color: #21160F;">Paneer Tikka</div>
              <div style="font-size: 12px; color: #76675D;">Starters • ₹190</div>
            </div>
          </div>
          <div style="display: flex; align-items: center; gap: 14px;">
            <span class="mm-avail-badge on">● Available</span>
            <div class="tgl-sw on" onclick="toggleAvailRow(this)"><div class="tgl-knob"></div></div>
          </div>
        </div>

        <div class="mm-avail-row is-off">
          <div class="mm-avail-dish">
            <img src="https://images.unsplash.com/photo-1589302168068-964664d93dc0?w=160&auto=format&fit=crop&q=80" alt="Mutton Biryani" class="mm-avail-thumb">
            <div>
              <div style="font-weight: 700; font-size: 15.5px; color: #21160F;">Mutton Biryani</div>
              <div style="font-size: 12px; color: #76675D;">Biryani • ₹340</div>
            </div>
          </div>
          <div style="display: flex; align-items: center; gap: 14px;">
            <span class="mm-avail-badge off">○ Unavailable</span>
            <div class="tgl-sw" onclick="toggleAvailRow(this)"><div class="tgl-knob"></div></div>
          </div>
        </div>

        <div class="mm-avail-row">
          <div class="mm-avail-dish">
            <img src="https://images.unsplash.com/photo-1513558161293-cdaf765ed2fd?w=160&auto=format&fit=crop&q=80" alt="Fresh Lime Soda" class="mm-avail-thumb">
            <div>
              <div style="font-weight: 700; font-size: 15.5px; color: #21160F;">Fresh Lime Soda</div>
              <div style="font-size: 12px; color: #76675D;">Beverages • ₹80</div>
            </div>
          </div>
          <div style="display: flex; align-items: center; gap: 14px;">
            <span class="mm-avail-badge on">● Available</span>
            <div class="tgl-sw on" onclick="toggleAvailRow(this)"><div class="tgl-knob"></div></div>
          </div>
        </div>

      </div>
    </div>

    <div style="text-align: center;" class="r">
      <div style="display: inline-flex; align-items: center; gap: 8px; padding: 11px 22px; background: #FAF6F0; border-radius: 999px; border: 1px solid rgba(135,96,57,0.2); font-size: 13.5px; font-weight: 700; color: #876039;">
        <svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="m12 3-1.9 5.8a2 2 0 0 1-1.3 1.3L3 12l5.8 1.9a2 2 0 0 1 1.3 1.3L12 21l1.9-5.8a2 2 0 0 1 1.3-1.3L21 12l-5.8-1.9a2 2 0 0 1-1.3-1.3L12 3Z"/></svg>
        Click any toggle above — keep your menu accurate even during peak rush hours.
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 11 & 12: FOOD IMAGES & ITEM DETAILS ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd r">
      <h2>Let Your Food <span class="sf">Sell Itself.</span></h2>
      <p>Add high-quality images, portion variants, and add-ons to boost order value effortlessly.</p>
    </div>

    <div class="mm-split r">
      <!-- Customer Card Preview -->
      <div style="background: #FFFFFF; border-radius: 24px; overflow: hidden; max-width: 440px; width: 100%; margin: 0 auto; border: 1px solid rgba(135,96,57,0.16); box-shadow: 0 20px 48px rgba(33,22,15,0.09);">
        <div style="height: 250px; background-image: url('https://images.unsplash.com/photo-1563379091339-03b21ab4a4f8?w=800&auto=format&fit=crop&q=80'); background-size: cover; background-position: center; position: relative;">
          <div style="position: absolute; inset: 0; background: linear-gradient(180deg, rgba(0,0,0,0.15) 0%, rgba(0,0,0,0) 45%, rgba(0,0,0,0.45) 100%);"></div>
          <span style="position: absolute; top: 16px; left: 16px; background: #876039; color: #fff; padding: 5px 12px; border-radius: 999px; font-weight: 700; font-size: 11px; letter-spacing: 0.04em; box-shadow: 0 4px 12px rgba(0,0,0,0.2);">★ TODAY'S SPECIAL</span>
          <span style="position: absolute; top: 16px; right: 16px; background: rgba(255,255,255,0.92); color: #21160F; padding: 4px 10px; border-radius: 999px; font-weight: 700; font-size: 11.5px; backdrop-filter: blur(6px);">4.9 ★ (240+)</span>
        </div>
        <div style="padding: 24px;">
          <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 8px;">
            <div>
              <h3 style="font-size: 22px; margin: 0; color: #21160F;">Chicken Biryani</h3>
              <div style="font-size: 12px; color: #76675D; margin-top: 3px;">Serves 1–2 • Medium Spice • 20 mins</div>
            </div>
            <span style="font-family: 'Outfit', sans-serif; font-size: 22px; font-weight: 700; color: #876039;">₹240</span>
          </div>
          <p style="font-size: 14px; color: #6E6157; line-height: 1.55; margin: 12px 0 20px;">Aromatic long-grain basmati rice layered with tender spiced chicken, saffron, and fried onions.</p>
          <button type="button" class="btn p" style="width: 100%; justify-content: center; border-radius: 12px; padding: 13px;">Add to Order +</button>
        </div>
      </div>

      <!-- Item Variants & Add-ons Details -->
      <div class="mm-win">
        <div class="mm-win-bar">
          <div class="mm-win-dots"><i></i><i></i><i></i></div>
          <div class="mm-win-ttl">ITEM VARIANTS &amp; ADD-ONS</div>
          <span class="mm-win-pill">Customizer</span>
        </div>
        <div class="mm-win-body">
          <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
            <div>
              <h3 style="font-size: 20px; margin: 0 0 4px; color: #21160F;">Chicken Pizza</h3>
              <p style="font-size: 13px; margin: 0; color: #6E6157;">Classic hand-tossed pizza with grilled chicken, mozzarella &amp; herbs.</p>
            </div>
          </div>

          <div style="margin-bottom: 20px;">
            <div style="font-weight: 700; font-size: 11px; letter-spacing: 0.08em; color: #76675D; text-transform: uppercase; margin-bottom: 10px;">Select Size (Required)</div>
            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px;" id="mm-size-group">
              <div class="mm-size-opt" data-price="220" onclick="selectMmSize(this)" style="padding: 12px 10px; border: 1.5px solid rgba(135,96,57,0.18); border-radius: 12px; text-align: center; cursor: pointer; background: #fff; transition: all 0.2s;">
                <div style="font-weight: 700; font-size: 14px; color: #21160F;">Regular</div>
                <div style="color: #876039; font-weight: 700; font-size: 14px; margin-top: 3px;">₹220</div>
              </div>
              <div class="mm-size-opt active" data-price="320" onclick="selectMmSize(this)" style="padding: 12px 10px; border: 2px solid #876039; border-radius: 12px; text-align: center; cursor: pointer; background: #FAF6F0; transition: all 0.2s;">
                <div style="font-weight: 700; font-size: 14px; color: #876039;">Medium</div>
                <div style="color: #876039; font-weight: 700; font-size: 14px; margin-top: 3px;">₹320</div>
              </div>
              <div class="mm-size-opt" data-price="420" onclick="selectMmSize(this)" style="padding: 12px 10px; border: 1.5px solid rgba(135,96,57,0.18); border-radius: 12px; text-align: center; cursor: pointer; background: #fff; transition: all 0.2s;">
                <div style="font-weight: 700; font-size: 14px; color: #21160F;">Large</div>
                <div style="color: #876039; font-weight: 700; font-size: 14px; margin-top: 3px;">₹420</div>
              </div>
            </div>
          </div>

          <div style="margin-bottom: 20px;">
            <div style="font-weight: 700; font-size: 11px; letter-spacing: 0.08em; color: #76675D; text-transform: uppercase; margin-bottom: 10px;">Popular Add-Ons</div>
            <div style="display: flex; flex-direction: column; gap: 9px;">
              <label style="display: flex; justify-content: space-between; align-items: center; padding: 11px 14px; border: 1px solid rgba(135,96,57,0.16); border-radius: 11px; background: #FAF8F5; cursor: pointer; font-weight: 600; font-size: 14px; color: #21160F;">
                <span style="display: inline-flex; align-items: center; gap: 10px;"><input type="checkbox" class="mm-addon-chk" data-price="40" checked onchange="calcMmTotal()" style="accent-color: #876039; width: 16px; height: 16px;"> Extra Mozzarella Cheese</span>
                <span style="font-weight: 700; color: #876039;">+₹40</span>
              </label>
              <label style="display: flex; justify-content: space-between; align-items: center; padding: 11px 14px; border: 1px solid rgba(135,96,57,0.16); border-radius: 11px; background: #FAF8F5; cursor: pointer; font-weight: 600; font-size: 14px; color: #21160F;">
                <span style="display: inline-flex; align-items: center; gap: 10px;"><input type="checkbox" class="mm-addon-chk" data-price="70" checked onchange="calcMmTotal()" style="accent-color: #876039; width: 16px; height: 16px;"> Extra Grilled Chicken</span>
                <span style="font-weight: 700; color: #876039;">+₹70</span>
              </label>
            </div>
          </div>

          <div style="display: flex; justify-content: space-between; align-items: center; padding: 14px 16px; background: #21160F; color: #FFFFFF; border-radius: 13px;">
            <div>
              <div style="font-size: 11px; color: #D5C7B8; text-transform: uppercase; letter-spacing: 0.06em;">Configured Total</div>
              <div id="mm-config-total" style="font-family: 'Outfit', sans-serif; font-size: 20px; font-weight: 700; color: #FFFFFF;">₹430</div>
            </div>
            <span style="background: #876039; color: #FFFFFF; font-size: 12.5px; font-weight: 700; padding: 8px 16px; border-radius: 9px;">Auto-Calculated ✓</span>
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
      <div class="eb">PROMOTIONS &amp; HIGHLIGHTS</div>
      <h2>Put Your Best Sellers <span class="sf">in the Spotlight.</span></h2>
      <p>Highlight signature dishes, today's specials and promotional items so customers notice them first.</p>
    </div>

    <div class="mm-spot-grid r">
      <div class="mm-spot-card">
        <div class="mm-spot-media">
          <img src="https://images.unsplash.com/photo-1563379091339-03b21ab4a4f8?w=500&auto=format&fit=crop&q=80" alt="Chicken Biryani">
          <span class="mm-spot-tag" style="background: rgba(254, 243, 199, 0.95); color: #92400E;">★ TODAY'S SPECIAL</span>
        </div>
        <div class="mm-spot-body">
          <h4>Chicken Biryani</h4>
          <p class="mm-spot-desc">Signature dum-cooked basmati biryani served with raita &amp; salan.</p>
          <div class="mm-spot-foot">
            <span class="mm-spot-price">₹240</span>
            <span class="mm-spot-stat">142 orders today</span>
          </div>
        </div>
      </div>

      <div class="mm-spot-card">
        <div class="mm-spot-media">
          <img src="https://images.unsplash.com/photo-1631452180519-c014fe946bc7?w=500&auto=format&fit=crop&q=80" alt="Paneer Butter Masala">
          <span class="mm-spot-tag" style="background: rgba(219, 234, 254, 0.95); color: #1E40AF;">
            <svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M8.5 14.5A2.5 2.5 0 0 0 11 12c0-1.38-.5-2-1-3-1.072-2.143-.224-4.054 2-6 .5 2.5 2 4.9 4 6.5 2 1.6 3 3.5 3 5.5a7 7 0 1 1-14 0c0-1.153.433-2.294 1-3a2.5 2.5 0 0 0 2.5 2.5z"/></svg>
            BEST SELLER
          </span>
        </div>
        <div class="mm-spot-body">
          <h4>Paneer Butter Masala</h4>
          <p class="mm-spot-desc">Soft cottage cheese simmered in velvety spiced tomato-cashew gravy.</p>
          <div class="mm-spot-foot">
            <span class="mm-spot-price">₹220</span>
            <span class="mm-spot-stat">98 orders today</span>
          </div>
        </div>
      </div>

      <div class="mm-spot-card">
        <div class="mm-spot-media">
          <img src="https://images.unsplash.com/photo-1601050690597-df0568f70950?w=500&auto=format&fit=crop&q=80" alt="Truffle Garlic Naan">
          <span class="mm-spot-tag" style="background: rgba(209, 250, 229, 0.95); color: #065F46;">
            <svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="m12 3-1.9 5.8a2 2 0 0 1-1.3 1.3L3 12l5.8 1.9a2 2 0 0 1 1.3 1.3L12 21l1.9-5.8a2 2 0 0 1 1.3-1.3L21 12l-5.8-1.9a2 2 0 0 1-1.3-1.3L12 3Z"/></svg>
            NEW
          </span>
        </div>
        <div class="mm-spot-body">
          <h4>Truffle Garlic Naan</h4>
          <p class="mm-spot-desc">Tandoor-baked naan brushed with roasted garlic butter &amp; herbs.</p>
          <div class="mm-spot-foot">
            <span class="mm-spot-price">₹110</span>
            <span class="mm-spot-stat">Chef's Pick</span>
          </div>
        </div>
      </div>

      <div class="mm-spot-card">
        <div class="mm-spot-media">
          <img src="https://images.unsplash.com/photo-1546173159-315724a31696?w=500&auto=format&fit=crop&q=80" alt="Mango Lassi">
          <span class="mm-spot-tag" style="background: rgba(252, 231, 243, 0.95); color: #9D174D;">
            <svg class="gm-theme-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="m2 4 3 12h14l3-12-6 7-4-7-4 7-6-7zm3 16h14"/></svg>
            POPULAR
          </span>
        </div>
        <div class="mm-spot-body">
          <h4>Mango Lassi</h4>
          <p class="mm-spot-desc">Chilled Alphonso mango yogurt smoothie with a hint of cardamom.</p>
          <div class="mm-spot-foot">
            <span class="mm-spot-price">₹90</span>
            <span class="mm-spot-stat">Top Add-on</span>
          </div>
        </div>
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

    <div class="mm-sync-grid r">
      <!-- LEFT - ADMIN -->
      <div class="mm-win">
        <div class="mm-win-bar dark">
          <div class="mm-win-dots"><i></i><i></i><i></i></div>
          <div class="mm-win-ttl">ADMIN DASHBOARD</div>
          <span style="font-size: 10.5px; font-weight: 700; color: #E2C094; background: rgba(226,192,148,0.14); padding: 4px 10px; border-radius: 999px;">ADMIN CONTROL</span>
        </div>
        <div class="mm-win-body" style="display: flex; flex-direction: column; gap: 14px;">
          <div style="padding: 15px 16px; border: 1px solid rgba(135,96,57,0.16); border-radius: 14px; background: #FAF8F5;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
              <span style="font-weight: 700; font-size: 15px; color: #21160F;">Chicken Biryani</span>
              <span style="font-size: 11px; font-weight: 700; color: #876039; background: #F3E8DC; padding: 3px 9px; border-radius: 999px;">Price Updated</span>
            </div>
            <div style="display: flex; align-items: center; gap: 10px;">
              <span style="text-decoration: line-through; color: #9E8F84; font-size: 14px; font-weight: 600;">₹220</span>
              <span style="color: #876039; font-weight: 800; font-size: 18px;">→ ₹240</span>
            </div>
          </div>

          <div style="display: flex; justify-content: space-between; align-items: center; padding: 15px 16px; border: 1px solid #FECDD3; border-radius: 14px; background: #FFF7F7;">
            <div>
              <div style="font-weight: 700; font-size: 14.5px; color: #21160F;">Status Toggle</div>
              <div style="font-size: 12px; color: #76675D; margin-top: 2px;">Marked sold out for dinner rush</div>
            </div>
            <span class="mm-avail-badge off">Available → Sold Out</span>
          </div>

          <div style="display: flex; align-items: center; gap: 8px; font-size: 12px; font-weight: 600; color: #15803D; padding: 9px 12px; background: #ECFDF5; border-radius: 10px;">
            <span>●</span> Published to all QR tables &amp; online ordering in &lt; 1 sec
          </div>
        </div>
      </div>

      <!-- CENTER - SYNC CONNECTOR -->
      <div class="mm-sync-bridge">
        <div class="mm-sync-circle" aria-hidden="true">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><polyline points="23 4 23 10 17 10"/><polyline points="1 20 1 14 7 14"/><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"/></svg>
        </div>
        <span class="mm-sync-caption">Instant Sync</span>
      </div>

      <!-- RIGHT - CUSTOMER PHONE -->
      <div class="mm-live-phone">
        <div class="mm-live-phone-inner">
          <div style="width: 56px; height: 5px; background: #E7E0D8; border-radius: 99px; margin: 0 auto 12px;"></div>
          <div style="text-align: center; margin-bottom: 12px;">
            <div style="font-family: 'Outfit', sans-serif; font-size: 14px; font-weight: 700; color: #21160F;">Customer Mobile Menu</div>
            <div style="font-size: 10.5px; color: #76675D;">Table 04 • Live QR View</div>
          </div>

          <div style="display: flex; gap: 5px; justify-content: center; margin-bottom: 12px;">
            <span style="font-size: 9.5px; font-weight: 700; padding: 4px 10px; border-radius: 99px; background: #876039; color: #fff;">All</span>
            <span style="font-size: 9.5px; font-weight: 700; padding: 4px 10px; border-radius: 99px; background: #F4EFEA; color: #6E6157;">Biryani</span>
            <span style="font-size: 9.5px; font-weight: 700; padding: 4px 10px; border-radius: 99px; background: #F4EFEA; color: #6E6157;">Mains</span>
          </div>

          <div style="display: flex; flex-direction: column; gap: 10px;">
            <!-- Synced Unavailable Item -->
            <div style="display: flex; align-items: center; gap: 10px; padding: 10px; border: 1px solid #FECDD3; border-radius: 13px; background: #FFF8F8; opacity: 0.85;">
              <img src="https://images.unsplash.com/photo-1563379091339-03b21ab4a4f8?w=160&auto=format&fit=crop&q=80" alt="Chicken Biryani" style="width: 46px; height: 46px; border-radius: 10px; object-fit: cover; filter: grayscale(35%); flex: none;">
              <div style="flex: 1; min-width: 0;">
                <div style="font-size: 12px; font-weight: 700; color: #21160F;">Chicken Biryani</div>
                <div style="font-size: 11px; font-weight: 700; color: #876039; margin-top: 2px;">₹240</div>
                <span style="display: inline-block; margin-top: 4px; font-size: 9px; font-weight: 700; background: #FFE4E6; color: #BE123C; padding: 2px 7px; border-radius: 99px;">Currently Unavailable</span>
              </div>
            </div>

            <!-- Available Context Item -->
            <div style="display: flex; align-items: center; gap: 10px; padding: 10px; border: 1px solid rgba(135,96,57,0.14); border-radius: 13px; background: #FAF8F5;">
              <img src="https://images.unsplash.com/photo-1631452180519-c014fe946bc7?w=160&auto=format&fit=crop&q=80" alt="Paneer Butter Masala" style="width: 46px; height: 46px; border-radius: 10px; object-fit: cover; flex: none;">
              <div style="flex: 1; min-width: 0;">
                <div style="font-size: 12px; font-weight: 700; color: #21160F;">Paneer Masala</div>
                <div style="font-size: 11px; font-weight: 700; color: #876039; margin-top: 2px;">₹220</div>
                <span style="display: inline-block; margin-top: 4px; font-size: 9px; font-weight: 700; background: #DCFCE7; color: #15803D; padding: 2px 7px; border-radius: 99px;">● Available</span>
              </div>
            </div>
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
      <p>Create and manage separate menus for dine-in, takeaway, delivery, breakfast, or seasonal specials.</p>
    </div>

    <!-- Interactive Menu Selector -->
    <div style="text-align: center;" class="r">
      <div class="mm-tab-bar">
        <button type="button" onclick="switchMenu('dine-in')" class="mm-tab-btn active" id="m-btn-dine-in">DINE-IN</button>
        <button type="button" onclick="switchMenu('takeaway')" class="mm-tab-btn" id="m-btn-takeaway">TAKEAWAY</button>
        <button type="button" onclick="switchMenu('delivery')" class="mm-tab-btn" id="m-btn-delivery">DELIVERY</button>
        <button type="button" onclick="switchMenu('breakfast')" class="mm-tab-btn" id="m-btn-breakfast">BREAKFAST</button>
        <button type="button" onclick="switchMenu('special')" class="mm-tab-btn" id="m-btn-special">SPECIAL</button>
      </div>
    </div>

    <!-- Menu Structure Preview Window -->
    <div class="mm-win r" style="max-width: 840px; margin: auto;">
      <div class="mm-win-bar">
        <div class="mm-win-dots"><i></i><i></i><i></i></div>
        <div class="mm-win-ttl" id="menu-title-display">DINE-IN MENU STRUCTURE</div>
        <span class="mm-win-pill green">● Active Menu</span>
      </div>
      <div class="mm-win-body" id="menu-structure-content">
        <div style="font-weight: 700; color: #876039; font-size: 11.5px; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 10px;">STARTERS</div>
        <div class="mm-menu-grid">
          <div class="mm-menu-dish">
            <div><div style="font-weight: 700; color: #21160F;">Chicken 65</div><div style="font-size: 12px; color: #76675D;">Crispy spiced boneless starter</div></div>
            <span style="font-family: 'Outfit', sans-serif; font-weight: 700; color: #876039; font-size: 16px;">₹180</span>
          </div>
          <div class="mm-menu-dish">
            <div><div style="font-weight: 700; color: #21160F;">Paneer Tikka</div><div style="font-size: 12px; color: #76675D;">Char-grilled smoky cottage cheese</div></div>
            <span style="font-family: 'Outfit', sans-serif; font-weight: 700; color: #876039; font-size: 16px;">₹190</span>
          </div>
        </div>

        <div style="font-weight: 700; color: #876039; font-size: 11.5px; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 10px;">MAIN COURSE</div>
        <div class="mm-menu-grid">
          <div class="mm-menu-dish">
            <div><div style="font-weight: 700; color: #21160F;">Butter Chicken</div><div style="font-size: 12px; color: #76675D;">Creamy tandoori tomato gravy</div></div>
            <span style="font-family: 'Outfit', sans-serif; font-weight: 700; color: #876039; font-size: 16px;">₹260</span>
          </div>
          <div class="mm-menu-dish">
            <div><div style="font-weight: 700; color: #21160F;">Paneer Butter Masala</div><div style="font-size: 12px; color: #76675D;">Rich cashew &amp; butter masala</div></div>
            <span style="font-family: 'Outfit', sans-serif; font-weight: 700; color: #876039; font-size: 16px;">₹220</span>
          </div>
        </div>

        <div style="font-weight: 700; color: #876039; font-size: 11.5px; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 10px;">BIRYANI</div>
        <div class="mm-menu-grid" style="margin-bottom: 0;">
          <div class="mm-menu-dish">
            <div><div style="font-weight: 700; color: #21160F;">Chicken Biryani</div><div style="font-size: 12px; color: #76675D;">Served with raita &amp; mirchi salan</div></div>
            <span style="font-family: 'Outfit', sans-serif; font-weight: 700; color: #876039; font-size: 16px;">₹240</span>
          </div>
          <div class="mm-menu-dish">
            <div><div style="font-weight: 700; color: #21160F;">Mutton Biryani</div><div style="font-size: 12px; color: #76675D;">Slow-cooked tender lamb &amp; saffron</div></div>
            <span style="font-family: 'Outfit', sans-serif; font-weight: 700; color: #876039; font-size: 16px;">₹340</span>
          </div>
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

    <div class="mm-ben-grid r">
      <div class="mm-ben-card">
        <div class="mm-ben-head">
          <div class="mm-val-ic">
            <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
          </div>
          <span class="mm-ben-tag">0 Reprints</span>
        </div>
        <h3>Save Time</h3>
        <p>Make menu changes instantly without rebuilding or reprinting physical menus.</p>
      </div>

      <div class="mm-ben-card">
        <div class="mm-ben-head">
          <div class="mm-val-ic">
            <svg viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
          </div>
          <span class="mm-ben-tag">100% Sync</span>
        </div>
        <h3>Reduce Errors</h3>
        <p>Keep prices, item descriptions, and availability accurate across your restaurant.</p>
      </div>

      <div class="mm-ben-card">
        <div class="mm-ben-head">
          <div class="mm-val-ic">
            <svg viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
          </div>
          <span class="mm-ben-tag">Mobile-First</span>
        </div>
        <h3>Better Guest Experience</h3>
        <p>Give customers clear, visual, always-updated menu information on their phones.</p>
      </div>

      <div class="mm-ben-card">
        <div class="mm-ben-head">
          <div class="mm-val-ic">
            <svg viewBox="0 0 24 24"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
          </div>
          <span class="mm-ben-tag">Higher AOV</span>
        </div>
        <h3>Promote More</h3>
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

    <div class="mm-ind-grid r">
      <div class="mm-ind-card">
        <div class="mm-ind-media">
          <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=600&auto=format&fit=crop&q=80" alt="Restaurants">
          <div class="mm-ind-scrim"></div>
          <span class="mm-ind-pill">Fine &amp; Casual Dining</span>
        </div>
        <div class="mm-ind-body">
          <h4>Restaurants</h4>
          <p>Manage large menus and everyday multi-course operations.</p>
        </div>
      </div>

      <div class="mm-ind-card">
        <div class="mm-ind-media">
          <img src="https://images.unsplash.com/photo-1554118811-1e0d58224f24?w=600&auto=format&fit=crop&q=80" alt="Cafés">
          <div class="mm-ind-scrim"></div>
          <span class="mm-ind-pill">Coffee &amp; Bistro</span>
        </div>
        <div class="mm-ind-body">
          <h4>Cafés</h4>
          <p>Showcase beverages, snacks, specialty coffees and daily specials.</p>
        </div>
      </div>

      <div class="mm-ind-card">
        <div class="mm-ind-media">
          <img src="https://images.unsplash.com/photo-1509440159596-0249088772ff?w=600&auto=format&fit=crop&q=80" alt="Bakeries">
          <div class="mm-ind-scrim"></div>
          <span class="mm-ind-pill">Fresh Daily Batches</span>
        </div>
        <div class="mm-ind-body">
          <h4>Bakeries</h4>
          <p>Present fresh cakes, pastries, breads and seasonal products.</p>
        </div>
      </div>

      <div class="mm-ind-card">
        <div class="mm-ind-media">
          <img src="https://images.unsplash.com/photo-1561758033-d89a9ad46330?w=600&auto=format&fit=crop&q=80" alt="QSR">
          <div class="mm-ind-scrim"></div>
          <span class="mm-ind-pill">Fast Service</span>
        </div>
        <div class="mm-ind-body">
          <h4>QSR</h4>
          <p>Keep high-volume fast food menus simple, clear and quick.</p>
        </div>
      </div>

      <div class="mm-ind-card">
        <div class="mm-ind-media">
          <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?w=600&auto=format&fit=crop&q=80" alt="Hotels">
          <div class="mm-ind-scrim"></div>
          <span class="mm-ind-pill">In-Room &amp; Dining</span>
        </div>
        <div class="mm-ind-body">
          <h4>Hotels</h4>
          <p>Manage extensive in-room dining and hotel restaurant menus.</p>
        </div>
      </div>

      <div class="mm-ind-card">
        <div class="mm-ind-media">
          <img src="https://images.unsplash.com/photo-1556910103-1c02745aae4d?w=600&auto=format&fit=crop&q=80" alt="Cloud Kitchens">
          <div class="mm-ind-scrim"></div>
          <span class="mm-ind-pill">Multi-Brand</span>
        </div>
        <div class="mm-ind-body">
          <h4>Cloud Kitchens</h4>
          <p>Present delivery-focused menus across multiple digital brands.</p>
        </div>
      </div>

      <div class="mm-ind-card">
        <div class="mm-ind-media">
          <img src="https://images.unsplash.com/photo-1513104890138-7c749659a591?w=600&auto=format&fit=crop&q=80" alt="Pizzerias">
          <div class="mm-ind-scrim"></div>
          <span class="mm-ind-pill">Custom Toppings</span>
        </div>
        <div class="mm-ind-body">
          <h4>Pizzerias</h4>
          <p>Show crust sizes, toppings, add-ons and crust customizations.</p>
        </div>
      </div>

      <div class="mm-ind-card">
        <div class="mm-ind-media">
          <img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?w=600&auto=format&fit=crop&q=80" alt="Food Courts">
          <div class="mm-ind-scrim"></div>
          <span class="mm-ind-pill">Multi-Counter</span>
        </div>
        <div class="mm-ind-body">
          <h4>Food Courts</h4>
          <p>Keep multiple food counters &amp; categories organized.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 19 & 20: CONNECTED OPERATIONS & WORKFLOW ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd r">
      <div class="eb">UNIFIED ECOSYSTEM</div>
      <h2>Your Menu <span class="sf">Connects Everything.</span></h2>
      <p>A menu is where every restaurant order begins. Geni Menu connects it with every step of your operations.</p>
    </div>

    <!-- ECOSYSTEM 7-STEP VISUAL FLOW -->
    <div class="mm-eco-grid r">
      <div class="mm-eco-step active">
        <span class="mm-eco-num">01</span>
        <img src="{{ asset('assets/images/workflow/step-1-menu.png') }}" alt="Menu" class="mm-eco-img">
        <div class="mm-eco-title">MENU</div>
      </div>
      <div class="mm-eco-step">
        <span class="mm-eco-num">02</span>
        <img src="{{ asset('assets/images/workflow/step-2-order.png') }}" alt="Orders" class="mm-eco-img">
        <div class="mm-eco-title">ORDERS</div>
      </div>
      <div class="mm-eco-step">
        <span class="mm-eco-num">03</span>
        <img src="{{ asset('assets/images/workflow/step-4-table.png') }}" alt="Tables" class="mm-eco-img">
        <div class="mm-eco-title">TABLES</div>
      </div>
      <div class="mm-eco-step">
        <span class="mm-eco-num">04</span>
        <img src="{{ asset('assets/images/workflow/step-3-kitchen.png') }}" alt="Kitchen" class="mm-eco-img">
        <div class="mm-eco-title">KITCHEN</div>
      </div>
      <div class="mm-eco-step">
        <span class="mm-eco-num">05</span>
        <img src="{{ asset('assets/images/workflow/step-5-billing.png') }}" alt="POS" class="mm-eco-img">
        <div class="mm-eco-title">POS</div>
      </div>
      <div class="mm-eco-step">
        <span class="mm-eco-num">06</span>
        <img src="{{ asset('assets/images/workflow/step-6-payment.png') }}" alt="Payments" class="mm-eco-img">
        <div class="mm-eco-title">PAYMENTS</div>
      </div>
      <div class="mm-eco-step">
        <span class="mm-eco-num">07</span>
        <img src="{{ asset('assets/images/workflow/step-7-reports.png') }}" alt="Reports" class="mm-eco-img">
        <div class="mm-eco-title">REPORTS</div>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 22: FEATURE CONNECTIONS ================= -->
<section>
  <div class="w">
    <div class="hd r">
      <div class="eb">CONNECTED MODULES</div>
      <h2>Seamlessly Connected to <span class="sf">Geni Menu Features.</span></h2>
    </div>

    <div class="mm-conn-grid r">
      <a href="{{ route('features.reservation-management') }}" class="mm-conn-card">
        <div class="mm-val-ic" style="margin-bottom: 16px;">
          <svg viewBox="0 0 24 24"><path d="M16 2v4M8 2v4M3 10h18M5 4h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2z"/></svg>
        </div>
        <h4>Reservation Management</h4>
        <p>Manage table bookings, guest details, and seating schedules effortlessly.</p>
        <span class="mm-conn-link">Explore Feature <span>→</span></span>
      </a>

      <a href="{{ route('features.table-management') }}" class="mm-conn-card">
        <div class="mm-val-ic" style="margin-bottom: 16px;">
          <svg viewBox="0 0 24 24"><rect x="3" y="8" width="18" height="4" rx="1"/><path d="M6 12v7M18 12v7"/></svg>
        </div>
        <h4>Table Management</h4>
        <p>Organize live floor plans, QR table tags, and real-time occupancy statuses.</p>
        <span class="mm-conn-link">Explore Feature <span>→</span></span>
      </a>

      <a href="{{ route('features.order-management') }}" class="mm-conn-card featured">
        <div class="mm-val-ic" style="margin-bottom: 16px; background: #876039; color: #FFFFFF;">
          <svg viewBox="0 0 24 24"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><rect x="8" y="2" width="8" height="4" rx="1"/></svg>
        </div>
        <h4>Order Management</h4>
        <p>Move menu selections directly into a unified dine-in, takeaway &amp; delivery pipeline.</p>
        <span class="mm-conn-link">Explore Feature <span>→</span></span>
      </a>

      <a href="{{ route('features.kot-management') }}" class="mm-conn-card">
        <div class="mm-val-ic" style="margin-bottom: 16px;">
          <svg viewBox="0 0 24 24"><path d="M4 18h16a1 1 0 0 0 1-1A9 9 0 0 0 3 17a1 1 0 0 0 1 1z"/></svg>
        </div>
        <h4>KOT Management</h4>
        <p>Send structured digital kitchen tickets straight to your prep stations &amp; KDS.</p>
        <span class="mm-conn-link">Explore Feature <span>→</span></span>
      </a>

      <a href="{{ route('features.pos-management') }}" class="mm-conn-card">
        <div class="mm-val-ic" style="margin-bottom: 16px;">
          <svg viewBox="0 0 24 24"><rect x="4" y="3" width="16" height="10" rx="2"/><path d="M8 21h8M12 17v4"/></svg>
        </div>
        <h4>POS Management</h4>
        <p>Speed up billing, split checks, and multi-mode checkout with integrated POS.</p>
        <span class="mm-conn-link">Explore Feature <span>→</span></span>
      </a>

      <a href="{{ route('features.inventory-management') }}" class="mm-conn-card">
        <div class="mm-val-ic" style="margin-bottom: 16px;">
          <svg viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg>
        </div>
        <h4>Inventory Management</h4>
        <p>Track recipe ingredients, stock deductions, and automated low-stock alerts.</p>
        <span class="mm-conn-link">Explore Feature <span>→</span></span>
      </a>
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
// Interactive Price Change Simulation (syncs all 3 channels)
function updatePriceSim() {
  const priceDisplay = document.getElementById('price-display');
  const priceToast = document.getElementById('price-toast');
  const priceBtn = document.getElementById('price-btn');
  const syncedEls = document.querySelectorAll('.mm-synced-price');

  if (priceDisplay.innerText === '₹220') {
    priceDisplay.innerText = '₹240';
    syncedEls.forEach(el => { el.innerText = '₹240'; el.style.color = '#876039'; });
    priceToast.style.opacity = '1';
    priceToast.style.transform = 'translateY(0)';
    priceBtn.innerText = 'Reset Price';
  } else {
    priceDisplay.innerText = '₹220';
    syncedEls.forEach(el => { el.innerText = '₹220'; el.style.color = '#21160F'; });
    priceToast.style.opacity = '0';
    priceToast.style.transform = 'translateY(4px)';
    priceBtn.innerText = 'Edit Price → ₹240';
  }
}

// Interactive Availability Row Toggle
function toggleAvailRow(toggleEl) {
  toggleEl.classList.toggle('on');
  const isOn = toggleEl.classList.contains('on');
  const row = toggleEl.closest('.mm-avail-row');
  const badge = row.querySelector('.mm-avail-badge');
  if (isOn) {
    row.classList.remove('is-off');
    badge.className = 'mm-avail-badge on';
    badge.innerText = '● Available';
  } else {
    row.classList.add('is-off');
    badge.className = 'mm-avail-badge off';
    badge.innerText = '○ Unavailable';
  }
  const allRows = document.querySelectorAll('.mm-avail-row');
  let avail = 0;
  allRows.forEach(r => { if (!r.classList.contains('is-off')) avail++; });
  const soldOut = allRows.length - avail;
  const pill = document.getElementById('avail-summary-pill');
  if (pill) pill.innerText = `${avail} Available • ${soldOut} Sold Out`;
}

// Interactive Size & Add-on Total Calculator
function selectMmSize(el) {
  document.querySelectorAll('.mm-size-opt').forEach(opt => {
    opt.classList.remove('active');
    opt.style.border = '1.5px solid rgba(135,96,57,0.18)';
    opt.style.background = '#fff';
    opt.firstElementChild.style.color = '#21160F';
  });
  el.classList.add('active');
  el.style.border = '2px solid #876039';
  el.style.background = '#FAF6F0';
  el.firstElementChild.style.color = '#876039';
  calcMmTotal();
}

function calcMmTotal() {
  const activeSize = document.querySelector('.mm-size-opt.active');
  let total = activeSize ? parseInt(activeSize.dataset.price, 10) : 320;
  document.querySelectorAll('.mm-addon-chk:checked').forEach(chk => {
    total += parseInt(chk.dataset.price, 10);
  });
  const totalEl = document.getElementById('mm-config-total');
  if (totalEl) totalEl.innerText = '₹' + total;
}

// Interactive Menu Selector Switcher
function mmDishCard(name, desc, price) {
  return `<div class="mm-menu-dish">
    <div><div style="font-weight: 700; color: #21160F;">${name}</div><div style="font-size: 12px; color: #76675D;">${desc}</div></div>
    <span style="font-family: 'Outfit', sans-serif; font-weight: 700; color: #876039; font-size: 16px;">${price}</span>
  </div>`;
}

function switchMenu(type) {
  const titleDisplay = document.getElementById('menu-title-display');
  const content = document.getElementById('menu-structure-content');
  const btns = ['dine-in', 'takeaway', 'delivery', 'breakfast', 'special'];

  btns.forEach(b => {
    const btn = document.getElementById('m-btn-' + b);
    if (btn) {
      btn.className = b === type ? 'mm-tab-btn active' : 'mm-tab-btn';
    }
  });

  if (type === 'dine-in') {
    titleDisplay.innerText = 'DINE-IN MENU STRUCTURE';
    content.innerHTML = `
      <div style="font-weight: 700; color: #876039; font-size: 11.5px; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 10px;">STARTERS</div>
      <div class="mm-menu-grid">
        ${mmDishCard('Chicken 65', 'Crispy spiced boneless starter', '₹180')}
        ${mmDishCard('Paneer Tikka', 'Char-grilled smoky cottage cheese', '₹190')}
      </div>
      <div style="font-weight: 700; color: #876039; font-size: 11.5px; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 10px;">MAIN COURSE</div>
      <div class="mm-menu-grid">
        ${mmDishCard('Butter Chicken', 'Creamy tandoori tomato gravy', '₹260')}
        ${mmDishCard('Paneer Butter Masala', 'Rich cashew & butter masala', '₹220')}
      </div>
      <div style="font-weight: 700; color: #876039; font-size: 11.5px; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 10px;">BIRYANI</div>
      <div class="mm-menu-grid" style="margin-bottom: 0;">
        ${mmDishCard('Chicken Biryani', 'Served with raita & mirchi salan', '₹240')}
        ${mmDishCard('Mutton Biryani', 'Slow-cooked tender lamb & saffron', '₹340')}
      </div>`;
  } else if (type === 'takeaway') {
    titleDisplay.innerText = 'TAKEAWAY EXPRESS MENU';
    content.innerHTML = `
      <div style="font-weight: 700; color: #876039; font-size: 11.5px; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 10px;">QUICK COMBO PACKS</div>
      <div class="mm-menu-grid" style="margin-bottom: 0;">
        ${mmDishCard('Biryani Box + Beverage', 'Spill-proof pack with chilled drink', '₹280')}
        ${mmDishCard('Paneer Naan Combo', '2 Butter Naans + Paneer Masala', '₹230')}
      </div>`;
  } else if (type === 'delivery') {
    titleDisplay.innerText = 'ONLINE DELIVERY MENU';
    content.innerHTML = `
      <div style="font-weight: 700; color: #876039; font-size: 11.5px; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 10px;">DELIVERY PACKS</div>
      <div class="mm-menu-grid" style="margin-bottom: 0;">
        ${mmDishCard('Family Biryani Bucket', 'Serves 4 • Includes raita & dessert', '₹850')}
        ${mmDishCard('Party Starter Platter', 'Assorted kebabs & tikka dips', '₹690')}
      </div>`;
  } else if (type === 'breakfast') {
    titleDisplay.innerText = 'MORNING BREAKFAST MENU';
    content.innerHTML = `
      <div style="font-weight: 700; color: #876039; font-size: 11.5px; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 10px;">SOUTH INDIAN SPECIALS</div>
      <div class="mm-menu-grid" style="margin-bottom: 0;">
        ${mmDishCard('Masala Dosa + Filter Coffee', 'Crispy ghee roast with sambar & chutneys', '₹110')}
        ${mmDishCard('Idli Vada Combo', '3 soft idlis, medu vada & filter coffee', '₹80')}
      </div>`;
  } else if (type === 'special') {
    titleDisplay.innerText = 'FESTIVE & SEASONAL SPECIALS';
    content.innerHTML = `
      <div style="font-weight: 700; color: #876039; font-size: 11.5px; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 10px;">CHEF'S SIGNATURE</div>
      <div class="mm-menu-grid" style="margin-bottom: 0;">
        ${mmDishCard('Special Mutton Nalli Nihari', 'Overnight slow-braised royal curry', '₹420')}
        ${mmDishCard('Saffron Badam Kheer', 'Chilled slow-reduced saffron pudding', '₹140')}
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
