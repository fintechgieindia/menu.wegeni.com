@php
    $meta = [
        'title' => 'Geni Menu — Restaurant Management, Made Simple',
        'description' => 'Geni Menu helps you manage your menu, tables, orders, billing, kitchen, staff, inventory and more — simply.',
        'keywords' => 'restaurant billing software, restaurant POS software, restaurant management software, POS for restaurants, QR code menu, digital menu, KOT management, inventory management, restaurant ERP, Geni Menu',
    ];
@endphp

@extends('layouts.frontend-master')

@section('content')
<!-- Import Google Fonts: Outfit (Headings), Plus Jakarta Sans (Body & UI), Playfair Display (Accent) -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@500;600;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Playfair+Display:ital,wght@1,500;1,600;1,700&display=swap" rel="stylesheet">

<style>

:root {
  --br: #876039;
  --br-dark: #6f4e2d;
  --br-light: #f4efe9;
  --br-gold: #b88e56;
  --bg: #ffffff;
  --bg2: #f8f6f1;
  --ink: #241A14;
  --mute: #6F665E;
  --line: rgba(135, 96, 57, 0.14);
  --card: #ffffff;
  --shadow-sm: 0 4px 20px rgba(36, 26, 20, 0.04);
  --shadow-md: 0 16px 40px rgba(36, 26, 20, 0.08);
  --shadow-lg: 0 26px 50px rgba(36, 26, 20, 0.12);
  box-sizing: border-box;
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

/* Typography Hierarchy & Title Styling */
h1, h2, h3, h4 {
  margin: 0;
  font-family: 'Outfit', 'Plus Jakarta Sans', sans-serif;
  font-weight: 800;
  line-height: 1.12;
  letter-spacing: -0.03em;
  color: #241A14;
}
h1 { font-size: clamp(40px, 5.8vw, 70px); font-weight: 800; }
h2 { font-size: clamp(32px, 4.2vw, 50px); font-weight: 800; }
h3 { font-size: 21px; font-weight: 700; color: #241A14; transition: color 0.25s ease; }
.card:hover h3 { color: var(--br); }

p { margin: 0; color: #6F665E; font-size: 16px; }
a { color: inherit; text-decoration: none; }
ul { list-style: none; margin: 0; padding: 0; }

/* Main Title Text — Deep Espresso (#241A14) */
.title-grad {
  color: #241A14;
  background: none;
  -webkit-background-clip: unset;
  -webkit-text-fill-color: initial;
  display: inline-block;
}

/* Highlighted Word / Accent — Brand Brown Gradient */
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

.eb {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  font-size: 12px;
  letter-spacing: .16em;
  font-weight: 800;
  text-transform: uppercase;
  color: var(--br);
  margin-bottom: 14px;
  background: linear-gradient(135deg, #fbf7f2 0%, #f4efe9 100%);
  padding: 7px 18px;
  border-radius: 99px;
  border: 1px solid rgba(135, 96, 57, 0.22);
  box-shadow: 0 2px 10px rgba(135, 96, 57, 0.08);
  font-family: 'Plus Jakarta Sans', sans-serif;
}

.w { max-width: 1240px; margin: auto; padding: 0 24px; position: relative; z-index: 1; }
section { padding: clamp(64px, 9vw, 110px) 0; background: var(--bg); position: relative; overflow: hidden; }
.hd { max-width: 740px; margin: 0 auto 56px; text-align: center; }
.hd p { margin-top: 16px; font-size: 18px; line-height: 1.6; }

/* --- Rich Floating Transparent Restaurant & Food Industry Icons --- */
.food-bg-icon {
  position: absolute;
  pointer-events: none;
  z-index: 0;
  color: var(--br);
  opacity: 0.09;
  transition: opacity 0.4s ease, transform 0.4s ease;
}
.food-bg-icon svg { width: 100%; height: 100%; fill: none; stroke: currentColor; stroke-width: 1.5; stroke-linecap: round; stroke-linejoin: round; }
.food-bg-icon.float-1 { animation: bgFloat1 8s ease-in-out infinite; }
.food-bg-icon.float-2 { animation: bgFloat2 10s ease-in-out infinite; }
.food-bg-icon.float-3 { animation: bgFloat3 12s ease-in-out infinite; }

@keyframes bgFloat1 { 0%, 100% { transform: translateY(0) rotate(0deg); } 50% { transform: translateY(-16px) rotate(8deg); } }
@keyframes bgFloat2 { 0%, 100% { transform: translateY(0) rotate(0deg); } 50% { transform: translateY(18px) rotate(-10deg); } }
@keyframes bgFloat3 { 0%, 100% { transform: scale(1) rotate(0deg); } 50% { transform: scale(1.12) rotate(14deg); } }

/* --- Card Background Translucent Watermark Overlay --- */
.card { position: relative; overflow: hidden; background: var(--card); border: 1px solid var(--line); border-radius: 20px; box-shadow: var(--shadow-sm); transition: transform .3s ease, box-shadow .3s ease, border-color .3s ease; }
.card > * { position: relative; z-index: 2; }
.card:hover { border-color: rgba(135, 96, 57, 0.38); box-shadow: var(--shadow-md); }

.card-wm-icon {
  position: absolute;
  right: -12px;
  bottom: -12px;
  width: 95px;
  height: 95px;
  opacity: 0.07;
  color: var(--br);
  pointer-events: none;
  transform: rotate(-15deg);
  transition: opacity 0.35s ease, transform 0.35s ease;
  z-index: 1 !important;
}
.card-wm-icon svg { width: 100%; height: 100%; fill: none; stroke: currentColor; stroke-width: 1.5; stroke-linecap: round; stroke-linejoin: round; }
.card:hover .card-wm-icon { opacity: 0.18; transform: rotate(-5deg) scale(1.15); }

/* Buttons */
.btn { display: inline-flex; align-items: center; gap: 8px; padding: 14px 28px; border-radius: 12px; font: 700 15px 'Plus Jakarta Sans', sans-serif; border: 1px solid var(--br); transition: .25s ease; cursor: pointer; }
.btn.p { background: linear-gradient(135deg, #876039 0%, #a87646 100%); color: #fff; box-shadow: 0 4px 16px rgba(135, 96, 57, 0.28); }
.btn.p:hover { transform: translateY(-2px); background: linear-gradient(135deg, #6f4e2d 0%, #876039 100%); box-shadow: 0 8px 24px rgba(135, 96, 57, 0.38); }
.btn.o { color: var(--br); background: #fff; }
.btn.o:hover { background: var(--br); color: #fff; transform: translateY(-2px); }
.btn.ow { color: #fff; border-color: #fff; background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(4px); }
.btn.ow:hover { background: #fff; color: #211D19; transform: translateY(-2px); }

/* Reveal Animations */
.r { opacity: 0; transform: translateY(24px); transition: opacity .6s cubic-bezier(0.16, 1, 0.3, 1), transform .6s cubic-bezier(0.16, 1, 0.3, 1); }
.r.in { opacity: 1; transform: none; }

/* Image Photo Frame */
.ph { position: relative; border-radius: 22px; overflow: hidden; background: #e0d5c8; box-shadow: var(--shadow-md); }
.ph img { width: 100%; height: 100%; object-fit: cover; display: block; transition: transform 0.6s ease; }
.ph:hover img { transform: scale(1.04); }
.ph span { position: absolute; bottom: 0; left: 0; right: 0; font-size: 11px; letter-spacing: .12em; text-transform: uppercase; color: #fff; padding: 16px 20px; background: linear-gradient(transparent, rgba(0,0,0,0.8)); z-index: 2; font-weight: 700; display: flex; align-items: center; gap: 8px; }

/* Icon Container */
.ic { width: 46px; height: 46px; border-radius: 13px; background: var(--bg2); color: var(--br); display: grid; place-items: center; flex: none; border: 1px solid var(--line); transition: .3s ease; }
.ic svg { width: 22px; height: 22px; fill: none; stroke: currentColor; stroke-width: 1.8; stroke-linecap: round; stroke-linejoin: round; }
.card:hover .ic { background: var(--br); color: #fff; border-color: var(--br); }

/* Sticky Navbar */
nav { position: fixed; top: env(safe-area-inset-top, 0); left: 0; right: 0; z-index: 999; padding: 14px 16px; }
nav .in { max-width: 1240px; margin: auto; display: flex; align-items: center; justify-content: space-between; padding: 10px 16px 10px 22px; border-radius: 16px; border: 1px solid transparent; transition: .3s; position: relative; background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(12px); box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05); }
nav.s .in { background: rgba(255, 255, 255, 0.98); border-color: var(--line); box-shadow: 0 10px 30px rgba(33, 29, 25, 0.08); }

/* Brand Logo Container */
.lg { display: flex; align-items: center; gap: 10px; text-decoration: none; }
.lg img { height: 42px; width: auto; object-fit: contain; }
.lg-text { font-family: 'Outfit', sans-serif; font-weight: 800; font-size: 20px; letter-spacing: -0.01em; color: var(--ink); display: flex; align-items: center; gap: 6px; }
.lg-text span { color: var(--br); font-weight: 900; }

nav ul.m { display: flex; gap: 30px; font-weight: 600; font-size: 15px; font-family: 'Plus Jakarta Sans', sans-serif; }
nav li { position: relative; padding: 8px 0; }
nav li > a { transition: .2s; color: var(--ink); }
nav li > a:hover { color: var(--br); }

/* Dropdown Menu */
.dm { position: absolute; top: 100%; left: -16px; min-width: 250px; background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 10px; opacity: 0; visibility: hidden; transform: translateY(8px); transition: .25s; box-shadow: var(--shadow-md); z-index: 10; }
.dm.two { display: grid; grid-template-columns: 1fr 1fr; min-width: 450px; }
li:hover > .dm { opacity: 1; visibility: visible; transform: none; }
.dm a { display: flex; align-items: center; gap: 10px; padding: 10px 14px; border-radius: 10px; font-size: 14px; font-weight: 600; color: var(--ink); transition: .2s; }
.dm a:hover { background: var(--bg2); color: var(--br); }
.dm a svg { width: 16px; height: 16px; stroke: currentColor; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }

.nr { display: flex; align-items: center; gap: 20px; font-weight: 600; font-size: 15px; }
.nr .btn { padding: 10px 22px; font-size: 14px; }
.hm { display: none; background: none; border: 0; font-size: 24px; color: var(--ink); cursor: pointer; }

/* Interactive Windows & Widgets */
.win { background: #fff; color: #211D19; border: 1px solid var(--line); border-radius: 18px; overflow: hidden; box-shadow: var(--shadow-md); font-size: 11px; text-align: left; }
.wb { display: flex; align-items: center; gap: 6px; padding: 10px 14px; background: var(--bg2); border-bottom: 1px solid var(--line); }
.wb i { width: 9px; height: 9px; border-radius: 50%; background: #d8c9b8; }
.wb i:nth-child(1) { background: #ff5f56; }
.wb i:nth-child(2) { background: #ffbd2e; }
.wb i:nth-child(3) { background: #27c93f; }
.wb b { margin-left: 8px; color: var(--br); letter-spacing: .06em; font-size: 11px; display: flex; align-items: center; gap: 6px; font-family: 'Outfit', sans-serif; font-weight: 700; }
.wc { padding: 14px; display: grid; gap: 10px; }

.g { display: grid; gap: 8px; }
.g3 { grid-template-columns: repeat(3, 1fr); }
.g4 { grid-template-columns: repeat(4, 1fr); }
.t { border: 1px solid var(--line); border-radius: 10px; padding: 8px 10px; background: #fff; font-weight: 700; transition: .2s; font-family: 'Plus Jakarta Sans', sans-serif; }
.t small { display: block; font-weight: 500; color: var(--mute); margin-top: 2px; }
.t.a { background: var(--br); color: #fff; border-color: var(--br); }
.t.a small { color: #eadbc9; }
.t.b { background: var(--bg2); border-color: rgba(135,96,57,0.18); }
.t.c { background: #F3ECE2; border-color: #E2D4C3; }

.bar { height: 8px; border-radius: 9px; background: var(--bg2); overflow: hidden; }
.bar i { display: block; height: 100%; border-radius: 9px; background: var(--br); }
.row { display: flex; justify-content: space-between; gap: 8px; padding: 6px 0; border-top: 1px solid var(--line); font-size: 12px; }
.row:first-child { border: 0; }

/* Phone Mockup */
.ph1 { width: 235px; aspect-ratio: 9/18.5; border-radius: 36px; background: #1b1714; padding: 9px; box-shadow: 0 24px 48px rgba(33, 29, 25, 0.25); border: 2px solid #3a322b; }
.ph1 > div { height: 100%; border-radius: 28px; background: #fff; color: #211D19; padding: 18px 12px 12px; font-size: 11px; display: flex; flex-direction: column; gap: 7px; overflow: hidden; }
.ph1 .it { display: flex; gap: 8px; align-items: center; padding: 7px; border: 1px solid var(--line); border-radius: 12px; background: #fff; box-shadow: 0 2px 6px rgba(0,0,0,0.02); }
.ph1 u { width: 34px; height: 34px; border-radius: 8px; flex: none; background-size: cover; background-position: center; }
.ph1 .it span { flex: 1; font-weight: 700; color: var(--ink); line-height: 1.2; }
.ph1 em { font-style: normal; color: var(--br); font-weight: 800; font-size: 12px; }
.ph1 .ct { margin-top: auto; background: var(--br); color: #fff; border-radius: 14px; padding: 10px 14px; display: flex; justify-content: space-between; align-items: center; font-weight: 700; box-shadow: 0 4px 12px rgba(135,96,57,0.3); }

/* Floating Cards */
.fl { position: absolute; padding: 12px 16px; font-size: 13px; box-shadow: var(--shadow-md); animation: fy 6s ease-in-out infinite; color: var(--ink); background: #fff; border-radius: 14px; border: 1px solid var(--line); z-index: 10; font-family: 'Plus Jakarta Sans', sans-serif; }
@keyframes fy { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-10px); } }

/* ==========================================================================
   GENI MENU SAAS HERO SECTION
   ========================================================================== */
.hero {
  padding: 60px 0 80px;
  background-color: #FFFFFF;
  position: relative;
  overflow: hidden;
  font-family: 'Plus Jakarta Sans', sans-serif;
}

/* Warm circular gradient behind right visual */
.hero::before {
  content: '';
  position: absolute;
  top: 5%;
  right: -5%;
  width: 780px;
  height: 780px;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(244, 232, 216, 0.45) 0%, rgba(255, 255, 255, 0) 70%);
  pointer-events: none;
  z-index: 0;
}

/* Alternating Section Background (Light Brown / Cream) */
section.alt {
  background-color: #FBF7F1 !important;
}
section.alt .card {
  background-color: #FFFFFF;
}
section.alt .b4 > div,
section.alt .b4 > a {
  background-color: #FFFFFF;
}
section.alt .gr > div,
section.alt .gr .card {
  background-color: #FFFFFF;
}
section.alt .tg > .card,
section.alt .tg > div {
  background-color: #FFFFFF;
}
section.alt .faq .q {
  background-color: #FFFFFF;
}

/* Faint decorative food line illustrations along outer edges */
.hero-line-art {
  position: absolute;
  pointer-events: none;
  opacity: 0.05;
  color: #A85B2B;
  z-index: 0;
}
.hero-line-art.art-1 { top: 10%; left: 2%; width: 110px; height: 110px; }
.hero-line-art.art-2 { bottom: 10%; right: 2%; width: 130px; height: 130px; }
.hero-line-art.art-3 { top: 40%; left: 42%; width: 90px; height: 90px; }

/* Grid container: 45% left, 55% right */
.hg {
  display: grid;
  grid-template-columns: 45% 55%;
  gap: 36px;
  align-items: center;
  position: relative;
  z-index: 1;
}

/* --- Left Column Content --- */
.hero-left-col {
  position: relative;
  z-index: 2;
}

.hero-eyebrow-pill {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: #F4E8D8;
  color: #A85B2B;
  font-family: 'Plus Jakarta Sans', sans-serif;
  font-size: 11px;
  font-weight: 800;
  text-transform: uppercase;
  letter-spacing: 1.2px;
  padding: 7px 16px;
  border-radius: 24px;
  margin-bottom: 22px;
  border: 1px solid rgba(168, 91, 43, 0.22);
}
.hero-eyebrow-pill svg { width: 12px; height: 12px; fill: currentColor; }

.hero-main-title {
  font-family: 'Outfit', 'Plus Jakarta Sans', sans-serif;
  font-weight: 800;
  font-size: clamp(38px, 4.4vw, 56px);
  line-height: 1.1;
  color: #21160F;
  margin: 0 0 4px;
  letter-spacing: -1.5px;
}

.hero-serif-highlight {
  font-family: 'Playfair Display', Georgia, serif;
  font-style: italic;
  font-weight: 700;
  font-size: clamp(42px, 4.8vw, 62px);
  color: #A85B2B;
  display: block;
  line-height: 1.12;
  letter-spacing: -0.5px;
  margin-top: 6px;
}

.hero-lead-text {
  font-size: 16.5px;
  color: #76675D;
  line-height: 1.65;
  margin: 22px 0 32px;
  max-width: 480px;
  font-family: 'Plus Jakarta Sans', sans-serif;
}

.hero-cta-group {
  display: flex;
  align-items: center;
  gap: 16px;
  margin-bottom: 30px;
  flex-wrap: wrap;
}

.hero-btn-primary-demo {
  background: #A85B2B;
  color: #ffffff !important;
  font-family: 'Plus Jakarta Sans', sans-serif;
  font-size: 14.5px;
  font-weight: 700;
  padding: 14px 28px;
  border-radius: 10px;
  text-decoration: none;
  box-shadow: 0 4px 18px rgba(168, 91, 43, 0.32);
  transition: all 0.25s ease;
  display: inline-flex;
  align-items: center;
  gap: 8px;
}
.hero-btn-primary-demo:hover {
  background: #8e4c22;
  transform: translateY(-2px);
  box-shadow: 0 8px 24px rgba(168, 91, 43, 0.42);
  color: #ffffff !important;
}

.hero-btn-secondary-features {
  background: transparent;
  color: #A85B2B !important;
  border: 1.5px solid #A85B2B;
  font-family: 'Plus Jakarta Sans', sans-serif;
  font-size: 14.5px;
  font-weight: 700;
  padding: 13px 26px;
  border-radius: 10px;
  text-decoration: none;
  transition: all 0.25s ease;
  display: inline-flex;
  align-items: center;
}
.hero-btn-secondary-features:hover {
  background: rgba(168, 91, 43, 0.08);
  transform: translateY(-2px);
}

/* Industry Compatibility Row */
.industry-compat-wrap {
  border-top: 1px solid #E7D5C3;
  padding-top: 22px;
  margin-top: 24px;
  max-width: 490px;
}
.industry-compat-label {
  font-size: 11.5px;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.8px;
  color: #8C7C71;
  margin-bottom: 12px;
}
.industry-compat-icons {
  display: flex;
  align-items: center;
  gap: 18px;
  flex-wrap: wrap;
}
.industry-item {
  display: flex;
  align-items: center;
  gap: 6px;
  font-size: 12.5px;
  font-weight: 600;
  color: #5B351D;
}
.industry-item svg {
  width: 15px;
  height: 15px;
  color: #A85B2B;
  stroke-width: 1.8;
  flex-shrink: 0;
}

/* --- Right Column Showcase --- */
.hero-showcase-container {
  position: relative;
  height: 610px;
  width: 100%;
}

/* Blended Restaurant Photography Backdrop */
.hero-photo-backdrop {
  position: absolute;
  top: 10px;
  right: 0;
  width: 94%;
  height: 530px;
  border-radius: 26px;
  overflow: hidden;
  box-shadow: 0 25px 65px rgba(33, 22, 15, 0.16);
  background-image: url('{{ asset("landing/hero-banner.jpg") }}');
  background-size: cover;
  background-position: center;
}
.hero-photo-backdrop::after {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(135deg, rgba(33, 22, 15, 0.3) 0%, rgba(33, 22, 15, 0.72) 100%);
}
.photo-backdrop-badge {
  position: absolute;
  bottom: 16px;
  right: 20px;
  color: rgba(255, 255, 255, 0.85);
  font-size: 9.5px;
  font-weight: 700;
  letter-spacing: 1.5px;
  text-transform: uppercase;
  z-index: 2;
  background: rgba(0, 0, 0, 0.35);
  backdrop-filter: blur(8px);
  padding: 4px 11px;
  border-radius: 20px;
  border: 1px solid rgba(255, 255, 255, 0.2);
}

/* Desktop Monitor Frame */
.desktop-monitor-frame {
  position: absolute;
  top: 20px;
  right: 10px;
  width: 86%;
  background: #181513;
  border-radius: 16px;
  padding: 7px 7px 9px;
  box-shadow: 0 25px 55px rgba(0, 0, 0, 0.26), 0 0 0 1px rgba(255, 255, 255, 0.1);
  z-index: 10;
}
.desktop-screen-bezel {
  background: #FFFFFF;
  border-radius: 10px;
  overflow: hidden;
  display: flex;
  flex-direction: column;
}
.desktop-browser-bar {
  background: #F4ECE3;
  padding: 7px 10px;
  display: flex;
  align-items: center;
  gap: 8px;
  border-bottom: 1px solid #E7D5C3;
}
.browser-window-dots {
  display: flex;
  gap: 4px;
}
.browser-dot {
  width: 7px;
  height: 7px;
  border-radius: 50%;
}
.browser-dot.red { background: #FF5F56; }
.browser-dot.yellow { background: #FFBD2E; }
.browser-dot.green { background: #27C93F; }
.browser-url-pill {
  flex: 1;
  background: #FFFFFF;
  border: 1px solid #E2D4C3;
  border-radius: 5px;
  padding: 2px 8px;
  font-size: 9.5px;
  color: #76675D;
  text-align: center;
  max-width: 190px;
  margin: 0 auto;
}
.desktop-live-tag {
  display: inline-flex;
  align-items: center;
  gap: 4px;
  font-size: 9px;
  font-weight: 700;
  color: #16A34A;
}
.desktop-live-tag::before {
  content: '';
  width: 5px;
  height: 5px;
  background: #16A34A;
  border-radius: 50%;
  animation: pulseGreen 1.5s infinite;
}
@keyframes pulseGreen {
  0%, 100% { opacity: 1; }
  50% { opacity: 0.3; }
}

/* Dashboard UI Layout */
.dashboard-ui-layout {
  display: grid;
  grid-template-columns: 98px 1fr;
  height: 355px;
  background: #FAFAFA;
}
.dashboard-sidebar {
  background: #FFFFFF;
  border-right: 1px solid #EAEAEA;
  padding: 10px 5px;
  display: flex;
  flex-direction: column;
  gap: 3px;
}
.sidebar-logo {
  font-size: 10.5px;
  font-weight: 800;
  color: #21160F;
  padding: 2px 4px 8px;
  display: flex;
  align-items: center;
  gap: 5px;
  border-bottom: 1px solid #F0F0F0;
  margin-bottom: 4px;
}
.sidebar-logo-icon {
  width: 15px;
  height: 15px;
  background: #A85B2B;
  color: #fff;
  border-radius: 4px;
  display: grid;
  place-items: center;
  font-size: 8.5px;
  font-weight: 900;
}
.sidebar-link {
  display: flex;
  align-items: center;
  gap: 5px;
  padding: 5px 6px;
  border-radius: 5px;
  font-size: 9px;
  font-weight: 600;
  color: #6F665E;
  text-decoration: none;
  white-space: nowrap;
}
.sidebar-link svg {
  width: 11px;
  height: 11px;
  color: #8C7C71;
  stroke-width: 1.8;
  flex-shrink: 0;
}
.sidebar-link.active {
  background: #F4E8D8;
  color: #A85B2B;
  font-weight: 700;
}
.sidebar-link.active svg {
  color: #A85B2B;
}

/* Dashboard Main View */
.dashboard-main-view {
  padding: 10px;
  overflow: hidden;
  display: flex;
  flex-direction: column;
  gap: 8px;
}

/* 4 KPI Cards */
.dashboard-kpi-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 6px;
}
.kpi-tile {
  background: #FFFFFF;
  border: 1px solid #EBEBEB;
  border-radius: 7px;
  padding: 7px 8px;
  box-shadow: 0 1px 3px rgba(0,0,0,0.02);
}
.kpi-tile.featured {
  background: linear-gradient(135deg, #FFFDFB 0%, #FBF6EF 100%);
  border-color: rgba(168, 91, 43, 0.28);
}
.kpi-title {
  font-size: 8px;
  font-weight: 700;
  color: #8C7C71;
  text-transform: uppercase;
  letter-spacing: 0.4px;
  display: block;
}
.kpi-number {
  font-size: 13.5px;
  font-weight: 800;
  color: #21160F;
  margin-top: 2px;
  display: block;
  line-height: 1.15;
}
.kpi-tile.featured .kpi-number {
  color: #A85B2B;
}
.kpi-badge-sub {
  font-size: 7.5px;
  color: #16A34A;
  font-weight: 700;
  display: flex;
  align-items: center;
  gap: 2px;
  margin-top: 1px;
}
.kpi-badge-sub.amber { color: #D97706; }
.kpi-badge-sub.blue { color: #2563EB; }

/* Dashboard Detail Cards (Orders table + Chart) */
.dashboard-detail-grid {
  display: grid;
  grid-template-columns: 1.55fr 1fr;
  gap: 7px;
  flex: 1;
}
.dash-panel {
  background: #FFFFFF;
  border: 1px solid #EBEBEB;
  border-radius: 7px;
  padding: 8px;
  display: flex;
  flex-direction: column;
}
.dash-panel-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 6px;
}
.dash-panel-title {
  font-size: 9.5px;
  font-weight: 800;
  color: #21160F;
}
.dash-panel-extra {
  font-size: 7.5px;
  color: #8C7C71;
  font-weight: 600;
}

/* Micro Table */
.mini-order-table {
  width: 100%;
  border-collapse: collapse;
  font-size: 8px;
}
.mini-order-table th {
  text-align: left;
  padding: 2px 3px;
  color: #8C7C71;
  font-weight: 600;
  border-bottom: 1px solid #F0F0F0;
}
.mini-order-table td {
  padding: 4px 3px;
  border-bottom: 1px solid #F6F6F6;
  color: #333;
}
.status-pill {
  display: inline-block;
  padding: 1.5px 5px;
  border-radius: 8px;
  font-size: 7px;
  font-weight: 700;
  text-transform: uppercase;
}
.status-pill.preparing { background: #FEF3C7; color: #D97706; }
.status-pill.ready { background: #DCFCE7; color: #16A34A; }
.status-pill.paid { background: #F4E8D8; color: #A85B2B; }

/* Micro Chart */
.mini-chart-wrap {
  display: flex;
  align-items: flex-end;
  gap: 4px;
  height: 44px;
  margin: 4px 0;
  padding-bottom: 2px;
  border-bottom: 1px solid #EBEBEB;
}
.chart-bar {
  flex: 1;
  background: #E7D5C3;
  border-radius: 2px 2px 0 0;
}
.chart-bar.active {
  background: #A85B2B;
}
.top-item-highlight {
  font-size: 8px;
  color: #6F665E;
  margin-top: auto;
  line-height: 1.25;
}
.top-item-highlight b { color: #21160F; }

/* --- Mobile App Mockup (Overlapping Bottom-Left) --- */
.hero-phone-mockup {
  position: absolute;
  bottom: -20px;
  left: -12px;
  width: 245px;
  background: transparent;
  padding: 0;
  z-index: 30;
  border: none;
  filter: drop-shadow(0 20px 35px rgba(0,0,0,0.38));
  transition: transform 0.3s ease;
}
.hero-phone-mockup:hover {
  transform: translateY(-4px) scale(1.02);
}
.phone-inner-screen {
  background: transparent;
  overflow: visible;
  height: auto;
  display: block;
  position: relative;
}
.phone-inner-screen img {
  width: 100%;
  height: auto;
  display: block;
}
.phone-speaker-pill {
  width: 44px;
  height: 3.5px;
  background: #2A2420;
  border-radius: 4px;
  margin: 6px auto 3px;
}
.phone-app-header {
  padding: 6px 10px 6px;
  background: #FFFFFF;
  border-bottom: 1px solid #F0F0F0;
}
.phone-resto-title-row {
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.phone-resto-name {
  font-size: 11.5px;
  font-weight: 800;
  color: #21160F;
}
.phone-table-tag {
  background: #F4E8D8;
  color: #A85B2B;
  font-size: 8.5px;
  font-weight: 800;
  padding: 2px 7px;
  border-radius: 10px;
}
.phone-resto-sub {
  font-size: 8.5px;
  color: #8C7C71;
  margin-top: 1px;
}

/* Category Tabs */
.phone-category-tabs {
  display: flex;
  gap: 3px;
  margin-top: 6px;
  overflow-x: auto;
}
.phone-tab-btn {
  padding: 2.5px 7px;
  border-radius: 10px;
  font-size: 8px;
  font-weight: 700;
  color: #76675D;
  background: #F8F5F1;
  white-space: nowrap;
}
.phone-tab-btn.active {
  background: #A85B2B;
  color: #FFFFFF;
}

/* Dishes List */
.phone-dishes-list {
  padding: 6px 8px;
  flex: 1;
  overflow-y: auto;
  display: flex;
  flex-direction: column;
  gap: 6px;
}
.phone-dish-item {
  display: flex;
  align-items: center;
  gap: 7px;
  padding: 5px 6px;
  background: #FAFAFA;
  border: 1px solid #EFEFEF;
  border-radius: 8px;
}
.phone-dish-img {
  width: 34px;
  height: 34px;
  border-radius: 7px;
  object-fit: cover;
  flex-shrink: 0;
}
.phone-dish-info {
  flex: 1;
}
.phone-dish-name {
  font-size: 10px;
  font-weight: 700;
  color: #21160F;
  line-height: 1.2;
}
.phone-dish-price {
  font-size: 9px;
  font-weight: 800;
  color: #A85B2B;
  margin-top: 1px;
}
.phone-add-btn {
  background: #FFFFFF;
  border: 1px solid #A85B2B;
  color: #A85B2B;
  font-size: 8px;
  font-weight: 800;
  padding: 3px 7px;
  border-radius: 5px;
  cursor: pointer;
  white-space: nowrap;
}
.phone-add-btn.added {
  background: #A85B2B;
  color: #FFFFFF;
}

/* Phone Cart Summary */
.phone-cart-bar {
  background: #A85B2B;
  color: #FFFFFF;
  margin: 0 8px 8px;
  border-radius: 100px;
  padding: 7px 12px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-size: 10px;
  font-weight: 700;
  box-shadow: 0 3px 12px rgba(168, 91, 43, 0.4);
}
.phone-cart-bar span:last-child {
  font-size: 9px;
  opacity: 0.95;
}

/* Responsive adjustments */
@media (max-width: 1024px) {
  .hg {
    grid-template-columns: 1fr;
    gap: 40px;
  }
  .hero-showcase-container {
    height: 520px;
  }
  .desktop-monitor-frame {
    width: 96%;
  }
}
@media (max-width: 640px) {
  .hero {
    padding: 24px 0 44px;
  }
  .hero-eyebrow-pill {
    font-size: 10px;
    padding: 5px 12px;
    letter-spacing: 0.8px;
    margin-bottom: 14px;
  }
  .hero-main-title {
    font-size: 28px;
    letter-spacing: -0.5px;
    line-height: 1.15;
  }
  .hero-serif-highlight {
    font-size: 30px;
    letter-spacing: -0.3px;
    margin-top: 4px;
  }
  .hero-lead-text {
    font-size: 14.5px;
    margin: 14px 0 22px;
    line-height: 1.55;
  }
  .hero-cta-group {
    flex-direction: column;
    gap: 10px;
    margin-bottom: 22px;
  }
  .hero-btn-primary-demo,
  .hero-btn-secondary-features {
    width: 100%;
    justify-content: center;
    padding: 12px 18px;
    font-size: 14px;
  }
  .industry-compat-wrap {
    padding-top: 16px;
    margin-top: 16px;
  }
  .industry-compat-icons {
    gap: 12px;
  }
  .industry-item {
    font-size: 11.5px;
  }
  .hero-showcase-container {
    height: 340px;
    margin-top: 10px;
  }
  .hero-photo-backdrop {
    width: 100%;
    height: 320px;
    border-radius: 18px;
  }
  .desktop-monitor-frame {
    width: 96%;
    right: 2%;
    top: 10px;
    padding: 5px 5px 7px;
  }
  .hero-phone-mockup {
    width: 140px;
    bottom: -12px;
    left: -6px;
    filter: drop-shadow(0 12px 24px rgba(0,0,0,0.35));
  }
}

@media (max-width: 360px) {
  .hero-showcase-container {
    height: 290px;
  }
  .hero-phone-mockup {
    width: 110px;
    bottom: -5px;
  }
}

/* Grid Sections */
.ig { display: grid; grid-template-columns: 1fr 1.05fr; gap: 56px; align-items: stretch; }
.ig > .ph { min-height: 520px; height: 100%; border-radius: 28px; position: relative; }
.ig > .ph img { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; }
.b4 { display: grid; grid-template-columns: 1fr 1fr; gap: 18px; margin-top: 32px; }
.b4 > div, .b4 > a, .b4 .card {
  padding: 24px;
  border-radius: 18px;
  background: #FFFFFF;
  border: 1px solid var(--line);
  display: flex;
  flex-direction: column;
  text-decoration: none;
  color: inherit;
  transition: transform .3s ease, box-shadow .3s ease, border-color .3s ease;
  box-shadow: var(--shadow-sm);
}
.b4 > div:hover, .b4 > a:hover, .b4 .card:hover {
  transform: translateY(-4px);
  border-color: rgba(135, 96, 57, 0.38);
  box-shadow: var(--shadow-md);
}
.b4 h3 { margin: 14px 0 6px; font-size: 18px; display: flex; align-items: center; gap: 8px; font-family: 'Outfit', sans-serif; font-weight: 800; color: #21160F; }
.b4 p { font-size: 14px; line-height: 1.55; color: var(--mute); }

/* Core Features */
.fg { display: grid; grid-template-columns: repeat(12, 1fr); gap: 20px; }
.fc { padding: 28px; transition: .3s ease; display: flex; flex-direction: column; gap: 12px; grid-column: span 3; background: #fff; border-radius: 20px; border: 1px solid var(--line); box-shadow: var(--shadow-sm); }
.fc:hover { transform: translateY(-5px); border-color: var(--br); box-shadow: var(--shadow-md); }
.fc h3 { font-size: 19px; }
.fc p { font-size: 14px; line-height: 1.55; }
.fc.big {
  grid-column: span 6;
  grid-row: span 2;
  position: relative;
  overflow: hidden;
  border-radius: 24px;
  background-image: url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?q=80&w=1200&auto=format&fit=crop');
  background-size: cover;
  background-position: center;
  border: 1px solid rgba(135, 96, 57, 0.35);
  box-shadow: 0 16px 40px rgba(36, 26, 20, 0.12);
  padding: 32px;
}
.fc.big::before {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(180deg, rgba(20, 14, 10, 0.65) 0%, rgba(20, 14, 10, 0.42) 35%, rgba(20, 14, 10, 0.78) 100%);
  z-index: 1;
  transition: background 0.4s ease;
}
.fc.big:hover::before {
  background: linear-gradient(180deg, rgba(20, 14, 10, 0.55) 0%, rgba(20, 14, 10, 0.35) 35%, rgba(20, 14, 10, 0.7) 100%);
}
.fc.big > * {
  position: relative;
  z-index: 2;
}
.fc.big h3 {
  color: #FFFFFF !important;
  font-size: 22px;
  font-weight: 800;
  text-shadow: 0 2px 8px rgba(0, 0, 0, 0.6);
}
.fc.big:hover h3 {
  color: #FFFFFF !important;
}
.fc.big p {
  color: rgba(255, 255, 255, 0.94) !important;
  font-size: 15px;
  text-shadow: 0 1px 6px rgba(0, 0, 0, 0.5);
}
.fc.big .ic {
  background: rgba(255, 255, 255, 0.96);
  color: var(--br);
  border: 1px solid rgba(255, 255, 255, 0.8);
  box-shadow: 0 4px 14px rgba(0, 0, 0, 0.25);
}
.fc.big:hover .ic {
  background: var(--br);
  color: #FFFFFF;
}
.fc.big .win {
  margin-top: 12px;
  background: rgba(255, 255, 255, 0.98);
  border: 1px solid rgba(255, 255, 255, 0.7);
  box-shadow: 0 10px 28px rgba(0, 0, 0, 0.28);
}
.fc.big .ar {
  color: #FFFFFF !important;
  background: var(--br);
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 10px 22px;
  border-radius: 10px;
  width: fit-content;
  box-shadow: 0 4px 16px rgba(0, 0, 0, 0.35);
  font-weight: 800;
  margin-top: 16px;
  transition: all 0.25s ease;
}
.fc.big:hover .ar {
  background: var(--br-dark);
  transform: translateY(-2px);
  gap: 12px;
}

/* ==========================================================================
   HOW IT WORKS — 5-STEP RESTAURANT WORKFLOW SECTION
   ========================================================================== */
.hiw-section {
  padding: 80px 0 95px;
  background-color: #FBF7F1;
  position: relative;
  overflow: hidden;
  font-family: 'Plus Jakarta Sans', sans-serif;
}

.hiw-header {
  max-width: 780px;
  margin: 0 auto 50px;
  text-align: center;
}

.hiw-eyebrow {
  display: inline-flex;
  align-items: center;
  gap: 7px;
  background: #F4E8D8;
  color: #A85B2B;
  font-family: 'Plus Jakarta Sans', sans-serif;
  font-size: 11px;
  font-weight: 800;
  text-transform: uppercase;
  letter-spacing: 1.4px;
  padding: 7px 18px;
  border-radius: 99px;
  border: 1px solid #E7D5C3;
  margin-bottom: 16px;
  box-shadow: 0 2px 8px rgba(168, 91, 43, 0.06);
}

.hiw-title {
  font-family: 'Plus Jakarta Sans', 'Outfit', sans-serif;
  font-weight: 800;
  font-size: clamp(34px, 4vw, 46px);
  color: #21160F;
  line-height: 1.15;
  letter-spacing: -1px;
  margin: 0;
}

.hiw-title .hiw-serif {
  font-family: 'Playfair Display', Georgia, serif;
  font-style: italic;
  font-weight: 700;
  color: #A85B2B;
  display: inline-block;
}

/* 5 Cards Container Grid with Horizontal Flow */
.hiw-grid {
  display: grid;
  grid-template-columns: repeat(5, 1fr);
  gap: 18px;
  position: relative;
  margin-bottom: 44px;
}

/* Step Card */
.hiw-card {
  background: #FFFFFF;
  border: 1px solid #E7D5C3;
  border-radius: 18px;
  padding: 16px;
  box-shadow: 0 6px 20px rgba(33, 22, 15, 0.04);
  display: flex;
  flex-direction: column;
  position: relative;
  transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
}

.hiw-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 14px 32px rgba(168, 91, 43, 0.12);
  border-color: rgba(168, 91, 43, 0.4);
}

/* Step Number Badge */
.hiw-step-badge {
  display: inline-flex;
  align-items: center;
  gap: 4px;
  background: #F4E8D8;
  color: #A85B2B;
  font-size: 10.5px;
  font-weight: 800;
  letter-spacing: 0.8px;
  padding: 3px 9px;
  border-radius: 6px;
  margin-bottom: 12px;
  align-self: flex-start;
  border: 1px solid rgba(168, 91, 43, 0.18);
}

/* Visual UI Preview Container */
.hiw-preview-box {
  background: #F8F5F0;
  border-radius: 12px;
  border: 1px solid #EBE4D8;
  padding: 8px;
  height: 205px;
  overflow: hidden;
  display: flex;
  flex-direction: column;
  margin-bottom: 14px;
  position: relative;
  transition: transform 0.3s ease;
}

.hiw-card:hover .hiw-preview-box {
  transform: scale(1.02);
}

/* Step Typography */
.hiw-step-title {
  font-family: 'Plus Jakarta Sans', sans-serif;
  font-weight: 800;
  font-size: 13.5px;
  letter-spacing: 0.4px;
  text-transform: uppercase;
  color: #21160F;
  margin: 0 0 5px;
  line-height: 1.3;
}

.hiw-step-desc {
  font-family: 'Nunito Sans', 'Plus Jakarta Sans', sans-serif;
  font-size: 12.5px;
  color: #76675D;
  line-height: 1.5;
  margin: 0;
}

/* Horizontal Connecting Arrows between cards */
.hiw-connector-arrow {
  position: absolute;
  top: 105px;
  right: -12px;
  width: 24px;
  height: 24px;
  background: #FFFFFF;
  border: 1px solid #E7D5C3;
  border-radius: 50%;
  color: #A85B2B;
  display: grid;
  place-items: center;
  font-size: 11px;
  font-weight: 900;
  box-shadow: 0 3px 8px rgba(0,0,0,0.06);
  z-index: 5;
}

/* ==========================================================================
   INTERNAL UI MOCKUP DETAILS FOR EACH STEP
   ========================================================================== */

/* --- Step 01: Mobile Digital Menu Preview --- */
.mock-phone-wrap {
  display: flex;
  gap: 5px;
  align-items: stretch;
  height: 100%;
}
.mock-phone-body {
  flex: 1;
  background: #FFFFFF;
  border-radius: 9px;
  border: 1px solid #E2D9CC;
  padding: 5px 6px;
  display: flex;
  flex-direction: column;
  box-shadow: 0 2px 5px rgba(0,0,0,0.03);
}
.mock-phone-top {
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-size: 7.5px;
  font-weight: 800;
  color: #21160F;
  padding-bottom: 3px;
  border-bottom: 1px solid #F0EAE1;
  margin-bottom: 4px;
}
.mock-phone-table-pill {
  background: #F4E8D8;
  color: #A85B2B;
  font-size: 6.5px;
  font-weight: 800;
  padding: 1.5px 5px;
  border-radius: 10px;
}
.mock-phone-items {
  display: flex;
  flex-direction: column;
  gap: 3.5px;
  flex: 1;
}
.mock-phone-row {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background: #FAFAF8;
  padding: 2.5px 4px;
  border-radius: 4px;
  border: 1px solid #F0ECE4;
}
.mock-phone-item-name {
  font-size: 7.5px;
  font-weight: 700;
  color: #333;
  display: flex;
  align-items: center;
  gap: 3px;
}
.mock-phone-item-name img {
  width: 14px;
  height: 14px;
  border-radius: 3px;
  object-fit: cover;
  flex-shrink: 0;
}
.mock-phone-right {
  display: flex;
  align-items: center;
  gap: 3px;
}
.mock-phone-price {
  font-size: 7px;
  font-weight: 800;
  color: #A85B2B;
}
.mock-phone-plus-btn {
  width: 11px;
  height: 11px;
  background: #A85B2B;
  color: #fff;
  border-radius: 3px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 8px;
  font-weight: 800;
  flex-shrink: 0;
}
.mock-qr-badge {
  width: 44px;
  background: #FFFFFF;
  border: 1px solid #E2D9CC;
  border-radius: 7px;
  padding: 3px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  text-align: center;
  gap: 2px;
}
.mock-qr-badge svg { width: 22px; height: 22px; color: #21160F; }
.mock-qr-badge span { font-size: 6px; font-weight: 800; color: #A85B2B; line-height: 1.1; }

/* --- Step 02: Kitchen Order Dashboard Preview --- */
.mock-kds-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-size: 7.5px;
  font-weight: 800;
  color: #A85B2B;
  text-transform: uppercase;
  margin-bottom: 4px;
  padding-bottom: 2px;
  border-bottom: 1px solid #E7DCCE;
}
.mock-live-pulse {
  display: inline-flex;
  align-items: center;
  gap: 2.5px;
  color: #25834F;
  font-size: 6.5px;
  font-weight: 700;
}
.mock-live-pulse::before {
  content: '';
  width: 4px;
  height: 4px;
  background: #25834F;
  border-radius: 50%;
}
.mock-kds-cards {
  display: flex;
  flex-direction: column;
  gap: 3.5px;
  flex: 1;
}
.mock-kds-order-item {
  background: #FFFFFF;
  border-radius: 5px;
  border: 1px solid #E7DCCE;
  border-left: 2.5px solid #3B82F6;
  padding: 3px 5px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 4px;
}
.mock-kds-order-item.new-order { border-left-color: #F59E0B; }
.mock-kds-order-item.ready-order { border-left-color: #10B981; }
.mock-kds-order-info { flex: 1; min-width: 0; }
.mock-kds-order-info b { font-size: 7px; color: #21160F; display: block; white-space: nowrap; }
.mock-kds-order-info span { font-size: 6px; color: #76675D; display: block; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
.mock-kds-thumb { width: 18px; height: 18px; border-radius: 3px; object-fit: cover; flex-shrink: 0; }
.mock-status-pill {
  font-size: 5.5px;
  font-weight: 800;
  padding: 1.5px 3.5px;
  border-radius: 3px;
  text-transform: uppercase;
  white-space: nowrap;
}
.mock-status-pill.prep { background: #E0F2FE; color: #0284C7; }
.mock-status-pill.new { background: #FEF3C7; color: #D97706; }
.mock-status-pill.ready { background: #DCFCE7; color: #16A34A; }

/* --- Step 03: Live KOT Ticket Display --- */
.mock-kot-wrap {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 4px;
  height: 100%;
}
.mock-kot-ticket {
  background: #FFFFFF;
  border: 1px solid #E4D9CC;
  border-radius: 7px;
  padding: 4px;
  display: flex;
  flex-direction: column;
  font-size: 6.5px;
}
.mock-kot-top {
  display: flex;
  justify-content: space-between;
  font-weight: 800;
  color: #21160F;
  border-bottom: 1px dashed #E0D5C7;
  padding-bottom: 2px;
  margin-bottom: 2px;
}
.mock-kot-dish {
  font-size: 6.2px;
  color: #333;
  margin-bottom: 1px;
  font-weight: 600;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}
.mock-kot-img {
  width: 100%;
  height: 34px;
  object-fit: cover;
  border-radius: 4px;
  margin: 2px 0;
}
.mock-kot-note {
  font-size: 5.5px;
  color: #76675D;
  font-style: italic;
  margin-top: auto;
  padding-top: 1px;
}
.mock-kot-pill-btn {
  text-align: center;
  font-size: 6px;
  font-weight: 800;
  padding: 2px 0;
  border-radius: 3px;
  text-transform: uppercase;
  margin-top: 2px;
}
.mock-kot-pill-btn.prep { background: #E0F2FE; color: #0284C7; }
.mock-kot-pill-btn.ready { background: #DCFCE7; color: #16A34A; }

/* --- Step 04: Digital POS Billing Preview --- */
.mock-bill-card {
  background: #FFFFFF;
  border-radius: 7px;
  border: 1px solid #E2D9CC;
  padding: 5px 6px;
  height: 100%;
  display: flex;
  flex-direction: column;
}
.mock-bill-head {
  display: flex;
  justify-content: space-between;
  font-size: 7.5px;
  font-weight: 800;
  color: #A85B2B;
  border-bottom: 1px solid #EBE4D8;
  padding-bottom: 2px;
  margin-bottom: 3px;
}
.mock-bill-line {
  display: flex;
  justify-content: space-between;
  font-size: 6.8px;
  color: #76675D;
  margin-bottom: 1.5px;
}
.mock-bill-line.total {
  font-weight: 900;
  font-size: 8px;
  color: #21160F;
  border-top: 1px dashed #DDD;
  padding-top: 2px;
  margin-top: 2px;
}
.mock-pay-tags {
  display: flex;
  gap: 2.5px;
  margin-top: auto;
  padding-top: 3px;
}
.mock-pay-pill {
  flex: 1;
  text-align: center;
  font-size: 6px;
  font-weight: 700;
  padding: 2px 0;
  border-radius: 3px;
  background: #F8F5F1;
  color: #5B351D;
  border: 1px solid #E8E0D4;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 1.5px;
}
.mock-pay-pill.active {
  background: #16A34A;
  color: #FFFFFF;
  border-color: #16A34A;
}

/* --- Step 05: Business Analytics Dashboard Preview --- */
.mock-analytics-card {
  background: #FFFFFF;
  border-radius: 7px;
  border: 1px solid #E2D9CC;
  padding: 5px 6px;
  height: 100%;
  display: flex;
  flex-direction: column;
}
.mock-analytics-top {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  margin-bottom: 2px;
}
.mock-analytics-metric small { font-size: 6px; color: #76675D; font-weight: 700; display: block; text-transform: uppercase; }
.mock-analytics-metric b { font-size: 11px; color: #A85B2B; font-weight: 900; }
.mock-analytics-growth { font-size: 6px; color: #25834F; font-weight: 800; }
.mock-analytics-bars-wrap {
  display: flex;
  flex-direction: column;
  margin: 2px 0;
}
.mock-bars-row {
  display: flex;
  align-items: flex-end;
  gap: 3.5px;
  height: 36px;
}
.mock-bar-col {
  flex: 1;
  background: #E8D9C8;
  border-radius: 2px 2px 0 0;
}
.mock-bar-col.peak { background: #A85B2B; }
.mock-bar-labels {
  display: flex;
  justify-content: space-between;
  font-size: 5.5px;
  color: #8C7C71;
  font-weight: 600;
  padding-top: 1.5px;
  border-top: 1px solid #EBE4D8;
}
.mock-top-dish-card {
  display: flex;
  align-items: center;
  justify-content: space-between;
  background: #FAF8F5;
  border: 1px solid #EFEAE2;
  border-radius: 4px;
  padding: 2px 4px;
  margin-top: auto;
}
.mock-top-dish-info small { font-size: 5.5px; color: #A85B2B; font-weight: 700; display: flex; align-items: center; gap: 1.5px; }
.mock-top-dish-info b { font-size: 6.8px; color: #21160F; display: block; }
.mock-top-dish-img { width: 18px; height: 18px; border-radius: 3px; object-fit: cover; }

/* ==========================================================================
   BOTTOM WORKFLOW TIMELINE CONTAINER (7 Stages)
   ========================================================================== */
.hiw-timeline-wrapper {
  background: #FFFFFF;
  border: 1px solid #E7D5C3;
  border-radius: 100px;
  padding: 10px 20px;
  box-shadow: 0 4px 16px rgba(33, 22, 15, 0.04);
  display: flex;
  align-items: center;
  justify-content: space-between;
  max-width: 1080px;
  margin: 0 auto;
}

.hiw-timeline-stage {
  display: flex;
  align-items: center;
  gap: 7px;
}

.hiw-stage-icon-circle {
  width: 32px;
  height: 32px;
  border-radius: 50%;
  background: #F4E8D8;
  color: #A85B2B;
  display: grid;
  place-items: center;
  flex-shrink: 0;
  border: 1px solid rgba(168, 91, 43, 0.15);
  transition: transform 0.25s, background 0.25s, color 0.25s;
}

.hiw-stage-icon-circle svg {
  width: 15px;
  height: 15px;
  stroke: currentColor;
  fill: none;
  stroke-width: 1.8;
}

.hiw-timeline-stage:hover .hiw-stage-icon-circle {
  transform: scale(1.08);
  background: #A85B2B;
  color: #FFFFFF;
}

.hiw-stage-label {
  font-family: 'Plus Jakarta Sans', sans-serif;
  font-size: 12px;
  font-weight: 700;
  color: #21160F;
  white-space: nowrap;
}

.hiw-timeline-arrow {
  color: #A85B2B;
  font-size: 14px;
  font-weight: 900;
  opacity: 0.6;
}

/* Responsive Rules */
@media (max-width: 1100px) {
  .hiw-grid {
    grid-template-columns: repeat(3, 1fr);
  }
  .hiw-connector-arrow {
    display: none;
  }
  .hiw-timeline-wrapper {
    border-radius: 20px;
    flex-wrap: wrap;
    gap: 14px;
    justify-content: center;
  }
}
@media (max-width: 768px) {
  .hiw-grid {
    grid-template-columns: 1fr;
  }
  .hiw-timeline-wrapper {
    flex-direction: column;
    align-items: flex-start;
    border-radius: 18px;
    padding: 16px 20px;
  }
  .hiw-timeline-arrow {
    transform: rotate(90deg);
    margin-left: 8px;
  }
}

/* CX Section */
.cx { display: grid; grid-template-columns: 1fr 1fr; gap: 64px; align-items: center; }
.cxv { position: relative; height: 620px; }
.cxv > .ph { position: absolute; inset: 0 90px 0 0; border-radius: 28px; }
.cx-phone-mockup {
  position: absolute;
  right: 0;
  bottom: -20px;
  width: 265px;
  filter: drop-shadow(0 25px 45px rgba(28, 20, 15, 0.38));
  z-index: 10;
  transition: transform 0.35s ease;
}
.cx-phone-mockup:hover {
  transform: translateY(-6px) scale(1.02);
}
.cx-phone-mockup img {
  width: 100%;
  height: auto;
  display: block;
}
.bl { display: grid; grid-template-columns: 1fr 1fr; gap: 14px 24px; margin: 28px 0 36px; }
.bl li { font-weight: 700; font-size: 15px; display: flex; align-items: center; gap: 10px; color: var(--ink); font-family: 'Plus Jakarta Sans', sans-serif; }
.bl li svg { width: 18px; height: 18px; color: var(--br); stroke-width: 2.5; flex: none; }

/* ==========================================================================
   YOUR TEAM — 5-ROLE RESTAURANT TEAM SECTION
   ========================================================================== */
.team-section {
  padding: 85px 0 100px;
  background-color: #FBF7F1;
  position: relative;
  overflow: hidden;
  font-family: 'Plus Jakarta Sans', sans-serif;
}

.team-header {
  max-width: 820px;
  margin: 0 auto 40px;
  text-align: center;
}

.team-eyebrow {
  display: inline-flex;
  align-items: center;
  gap: 7px;
  background: #F4E8D8;
  color: #A85B2B;
  font-family: 'Plus Jakarta Sans', sans-serif;
  font-size: 11px;
  font-weight: 800;
  text-transform: uppercase;
  letter-spacing: 1.4px;
  padding: 7px 18px;
  border-radius: 99px;
  border: 1px solid #E7D5C3;
  margin-bottom: 16px;
  box-shadow: 0 2px 8px rgba(168, 91, 43, 0.06);
}

.team-title {
  font-family: 'Plus Jakarta Sans', 'Outfit', sans-serif;
  font-weight: 800;
  font-size: clamp(34px, 4.2vw, 48px);
  color: #21160F;
  line-height: 1.15;
  letter-spacing: -1px;
  margin: 0 0 14px;
}

.team-title .team-serif {
  font-family: 'Playfair Display', Georgia, serif;
  font-style: italic;
  font-weight: 700;
  color: #A85B2B;
  display: inline-block;
}

.team-subtitle {
  font-family: 'Nunito Sans', 'Plus Jakarta Sans', sans-serif;
  font-size: 16px;
  color: #76675D;
  max-width: 650px;
  margin: 0 auto;
  line-height: 1.55;
}

/* Floating Icon & Step Flow with Dotted Curved Line */
.team-flow-wrapper {
  position: relative;
  max-width: 1240px;
  margin: 0 auto 32px;
  padding: 0 10px;
}

.team-connector-svg {
  position: absolute;
  top: 22px;
  left: 5%;
  right: 5%;
  width: 90%;
  height: 40px;
  pointer-events: none;
  z-index: 1;
}

.team-flow-steps-grid {
  display: grid;
  grid-template-columns: repeat(5, 1fr);
  gap: 18px;
  position: relative;
  z-index: 2;
}

.team-step-col {
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
}

.team-floating-icon {
  width: 44px;
  height: 44px;
  border-radius: 50%;
  background: #FFFDF9;
  border: 1.5px solid #E7D5C3;
  box-shadow: 0 4px 14px rgba(91, 53, 29, 0.08);
  display: flex;
  align-items: center;
  justify-content: center;
  color: #A85B2B;
  transition: transform 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
  margin-bottom: 9px;
}

.team-floating-icon svg {
  width: 20px;
  height: 20px;
  stroke-width: 1.8;
}

.team-step-col:hover .team-floating-icon {
  transform: scale(1.12);
  border-color: #A85B2B;
  background: #FFFFFF;
  box-shadow: 0 6px 18px rgba(168, 91, 43, 0.2);
}

.team-step-pill {
  background: #A85B2B;
  color: #FFFFFF;
  font-size: 10px;
  font-weight: 800;
  letter-spacing: 0.8px;
  padding: 3.5px 11px;
  border-radius: 20px;
  display: inline-block;
  margin-bottom: 6px;
  box-shadow: 0 2px 6px rgba(168, 91, 43, 0.18);
  text-transform: uppercase;
}

.team-step-name {
  font-family: 'Plus Jakarta Sans', sans-serif;
  font-weight: 800;
  font-size: 13.5px;
  color: #21160F;
  margin: 0 0 3px;
  line-height: 1.25;
}

.team-step-desc {
  font-family: 'Nunito Sans', 'Plus Jakarta Sans', sans-serif;
  font-size: 11.5px;
  color: #76675D;
  margin: 0;
  line-height: 1.35;
  max-width: 175px;
}

/* Grid of 5 Team Device Showcase Cards */
.team-grid {
  display: grid;
  grid-template-columns: repeat(5, 1fr);
  gap: 18px;
  position: relative;
}

.team-card-col {
  display: flex;
  flex-direction: column;
}

.team-card {
  background: #FFFFFF;
  border: 1px solid #E7D5C3;
  border-radius: 20px;
  padding: 12px;
  box-shadow: 0 6px 20px rgba(33, 22, 15, 0.04);
  display: flex;
  flex-direction: column;
  transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
  position: relative;
  height: 100%;
}

.team-card-col:hover .team-card {
  transform: translateY(-6px);
  box-shadow: 0 16px 36px rgba(168, 91, 43, 0.12);
  border-color: rgba(168, 91, 43, 0.4);
}

/* Upper Visual Area with Real Staff Photo + Device Mockup */
.team-card-visual {
  background: #FBF6EE;
  border-radius: 14px;
  border: 1px solid #EBE2D5;
  height: 200px;
  position: relative;
  overflow: hidden;
  margin-bottom: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 0;
}

.team-card-mockup-img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
  transition: transform 0.35s ease;
}

.team-card-col:hover .team-card-mockup-img {
  transform: scale(1.05);
}

/* Bottom Card Role Footer Bar */
.team-card-footer {
  display: flex;
  align-items: center;
  gap: 9px;
  margin-top: auto;
  padding: 4px 2px 2px;
}

.team-role-icon-box {
  width: 36px;
  height: 36px;
  border-radius: 10px;
  background: #A85B2B;
  color: #FFFFFF;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  box-shadow: 0 3px 10px rgba(168, 91, 43, 0.25);
  transition: transform 0.3s ease, background-color 0.3s ease;
}

.team-card-col:hover .team-role-icon-box {
  transform: scale(1.06);
  background: #8e4c22;
}

.team-role-icon-box svg {
  width: 18px;
  height: 18px;
  stroke-width: 2;
}

.team-role-content {
  flex: 1;
  min-width: 0;
}

.team-role-title {
  font-family: 'Plus Jakarta Sans', sans-serif;
  font-weight: 800;
  font-size: 11.5px;
  letter-spacing: 0.5px;
  text-transform: uppercase;
  color: #21160F;
  margin: 0 0 2px;
  line-height: 1.2;
}

.team-role-desc {
  font-family: 'Nunito Sans', 'Plus Jakarta Sans', sans-serif;
  font-size: 10.8px;
  color: #76675D;
  line-height: 1.35;
  margin: 0;
}

.team-role-arrow {
  width: 26px;
  height: 26px;
  border-radius: 50%;
  background: #F4E8D8;
  color: #A85B2B;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 12px;
  font-weight: 800;
  flex-shrink: 0;
  border: 1px solid rgba(168, 91, 43, 0.15);
  transition: transform 0.3s ease, background-color 0.3s ease, color 0.3s ease;
}

.team-card-col:hover .team-role-arrow {
  transform: translateX(3px);
  background: #A85B2B;
  color: #FFFFFF;
}

/* Responsive Breakpoints for Showcase Section */
@media (max-width: 1150px) {
  .team-grid {
    grid-template-columns: repeat(3, 1fr);
  }
  .team-flow-steps-grid {
    grid-template-columns: repeat(3, 1fr);
    gap: 16px;
  }
  .team-connector-svg {
    display: none;
  }
}

@media (max-width: 768px) {
  .team-section {
    padding: 60px 0 70px;
  }
  .team-grid {
    grid-template-columns: 1fr;
    gap: 16px;
  }
  .team-flow-steps-grid {
    grid-template-columns: 1fr;
    gap: 16px;
  }
  .team-connector-svg {
    display: none;
  }
  .team-card-visual {
    height: 210px;
  }
}

/* --- SOLUTIONS INFINITE LOOP CAROUSEL (SINGLE ROW LOOP MODE) --- */
.sol-carousel-wrap {
  width: 100vw;
  position: relative;
  left: 50%;
  right: 50%;
  margin-left: -50vw;
  margin-right: -50vw;
  overflow: hidden;
  padding: 16px 0 24px;
  mask-image: linear-gradient(to right, transparent, black 6%, black 94%, transparent);
  -webkit-mask-image: linear-gradient(to right, transparent, black 6%, black 94%, transparent);
}

.sol-marquee-track {
  display: flex;
  gap: 20px;
  width: max-content;
  animation: solInfiniteLoop 45s linear infinite;
}

.sol-carousel-wrap:hover .sol-marquee-track {
  animation-play-state: paused;
}

@keyframes solInfiniteLoop {
  0% { transform: translateX(0); }
  100% { transform: translateX(-50%); }
}

.so-card {
  width: 280px;
  height: 360px;
  flex: none;
  position: relative;
  border-radius: 22px;
  overflow: hidden;
  background: var(--bg2);
  border: 1px solid var(--line);
  box-shadow: var(--shadow-sm);
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
  padding: 12px;
  transition: transform 0.35s ease, box-shadow 0.35s ease, border-color 0.35s ease;
  cursor: pointer;
}

.so-card:hover {
  transform: translateY(-8px);
  box-shadow: var(--shadow-md);
  border-color: rgba(135, 96, 57, 0.38);
}

.so-card .im {
  position: absolute;
  inset: 0;
  background-size: cover;
  background-position: center;
  transition: transform 0.6s ease;
  z-index: 1;
}

.so-card:hover .im {
  transform: scale(1.06);
}

.so-card::after {
  content: "";
  position: absolute;
  inset: 0;
  background: linear-gradient(180deg, rgba(0, 0, 0, 0.02) 0%, rgba(0, 0, 0, 0.08) 100%);
  z-index: 2;
  pointer-events: none;
}

.so-icon-badge {
  position: absolute;
  top: 14px;
  left: 14px;
  z-index: 4;
}

.so-icon-badge .ic {
  width: 42px;
  height: 42px;
  border-radius: 12px;
  background: rgba(255, 255, 255, 0.92);
  backdrop-filter: blur(10px);
  -webkit-backdrop-filter: blur(10px);
  color: var(--br);
  border: 1px solid rgba(255, 255, 255, 0.8);
  box-shadow: 0 4px 14px rgba(0, 0, 0, 0.08);
  display: grid;
  place-items: center;
  transition: background 0.3s ease, border-color 0.3s ease, color 0.3s ease;
}

.so-card:hover .so-icon-badge .ic {
  background: var(--br);
  color: #fff;
  border-color: var(--br);
}

.so-body {
  position: relative;
  z-index: 4;
  padding: 16px 18px;
  background: rgba(255, 255, 255, 0.94);
  backdrop-filter: blur(16px);
  -webkit-backdrop-filter: blur(16px);
  border-radius: 16px;
  border: 1px solid rgba(255, 255, 255, 0.85);
  box-shadow: 0 8px 24px rgba(33, 29, 25, 0.08);
  display: flex;
  flex-direction: column;
  gap: 6px;
  transition: background 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease;
}

.so-card:hover .so-body {
  background: #ffffff;
  border-color: rgba(135, 96, 57, 0.3);
  box-shadow: 0 12px 28px rgba(33, 29, 25, 0.12);
}

.so-body h3 {
  font-size: 17.5px;
  font-family: 'Outfit', sans-serif;
  font-weight: 800;
  color: var(--ink) !important;
  margin: 0;
  line-height: 1.25;
  text-shadow: none;
  transition: color 0.25s ease;
}

.so-card:hover .so-body h3 {
  color: var(--br) !important;
}

.so-body p {
  font-size: 13px;
  color: var(--mute);
  line-height: 1.45;
  margin: 0;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
  text-shadow: none;
}

.so-body .ar {
  margin-top: 4px;
  color: var(--br);
  font-weight: 700;
  font-size: 13px;
  display: flex;
  align-items: center;
  gap: 5px;
  font-family: 'Outfit', sans-serif;
  transition: gap 0.25s ease, color 0.25s ease;
}

.so-card:hover .so-body .ar {
  gap: 9px;
  color: var(--br-dark);
}

/* Growth Section */
.dots { display: flex; justify-content: center; align-items: center; gap: 14px; margin-bottom: 44px; font-weight: 700; flex-wrap: wrap; font-family: 'Plus Jakarta Sans', sans-serif; }
.dots span { padding: 10px 22px; border-radius: 99px; border: 1px solid var(--br); color: var(--br); background: var(--bg2); font-size: 15px; display: inline-flex; align-items: center; gap: 8px; }
.dots b { color: var(--br); font-size: 18px; }
.gr { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }
.gr > div, .gr .card { padding: 32px; background: #fff; border-radius: 20px; border: 1px solid var(--line); box-shadow: var(--shadow-sm); display: flex; flex-direction: column; transition: transform .3s ease, box-shadow .3s ease, border-color .3s ease; }
.gr > div:hover, .gr .card:hover { transform: translateY(-5px); border-color: rgba(135, 96, 57, 0.38); box-shadow: var(--shadow-md); }
.gr h3 { margin: 16px 0 8px; font-size: 20px; font-family: 'Outfit', sans-serif; font-weight: 800; color: #21160F; }
.gr p { font-size: 14.5px; line-height: 1.55; color: var(--mute); }

/* Reports Section - Clean White Styled */
.dk { background: #FFFFFF; border-top: 1px solid var(--line); border-bottom: 1px solid var(--line); }
.dk h2 { color: var(--ink); }
.dk p { color: var(--mute); }
.dk .hd { margin-bottom: 40px; }
.rp { max-width: 1000px; margin: auto; }
.rp .g3 { gap: 12px; }
.rp .cnt { display: grid; grid-template-columns: 2.2fr 1fr; gap: 16px; margin-top: 14px; }
.tags { display: flex; flex-wrap: wrap; justify-content: center; gap: 10px; margin: 0 0 36px; font-family: 'Plus Jakarta Sans', sans-serif; }
.tags span { padding: 8px 18px; border-radius: 99px; border: 1px solid var(--line); background: #fff; color: var(--ink); font-size: 13px; font-weight: 700; display: inline-flex; align-items: center; gap: 6px; box-shadow: var(--shadow-sm); }

/* Showcase Section */
.sh { display: grid; grid-template-columns: repeat(3, 1fr); gap: 22px; }
.sh .win { font-size: 10px; box-shadow: var(--shadow-sm); border: 1px solid var(--line); }
.sh > div > small { display: block; text-align: center; margin-top: 12px; font-weight: 800; color: var(--br); letter-spacing: .12em; font-size: 12px; font-family: 'Outfit', sans-serif; }
.sh .c2 { grid-column: span 3; max-width: 840px; margin: 0 auto; width: 100%; }

/* Highlights Grid */
.wg { display: grid; grid-template-columns: repeat(3, 1fr); gap: 48px 40px; }
.wg > div { border-top: 2px solid var(--br); padding-top: 24px; }
.wg h3 { font-size: 21px; letter-spacing: -.01em; margin-bottom: 8px; display: flex; align-items: center; gap: 10px; }
.wg h3 svg { color: var(--br); stroke-width: 2.2; }

/* Testimonials & Pricing */
.tg, .pg { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }
.tc { padding: 36px; background: #fff; display: flex; flex-direction: column; border-radius: 20px; border: 1px solid var(--line); box-shadow: var(--shadow-sm); transition: transform .3s ease, box-shadow .3s ease, border-color .3s ease; }
.tc:hover { transform: translateY(-5px); border-color: rgba(135, 96, 57, 0.38); box-shadow: var(--shadow-md); }
.tc h3 { font-size: 17.5px; line-height: 1.5; margin: 12px 0 20px; font-weight: 700; color: var(--ink); font-family: 'Plus Jakarta Sans', sans-serif; }
.tc b { font-family: 'Outfit', sans-serif; font-weight: 700; color: #21160F; font-size: 14.5px; }
.tc small { color: var(--mute); font-size: 13px; }
.qm { font: 72px/0.5 'Playfair Display', serif; color: var(--br); opacity: 0.6; }
.pc { padding: 36px; display: flex; flex-direction: column; gap: 14px; background: #fff; border-radius: 20px; border: 1px solid var(--line); box-shadow: var(--shadow-sm); transition: transform .3s ease, box-shadow .3s ease, border-color .3s ease; }
.pc:hover { transform: translateY(-5px); border-color: rgba(135, 96, 57, 0.38); box-shadow: var(--shadow-md); }
.pc.f { border-color: var(--br); border-width: 2px; box-shadow: var(--shadow-md); position: relative; }
.pc.f::before { content: "MOST POPULAR"; position: absolute; top: -14px; left: 50%; transform: translateX(-50%); background: var(--br); color: #fff; padding: 4px 14px; border-radius: 99px; font-size: 10px; font-weight: 900; letter-spacing: .12em; font-family: 'Plus Jakarta Sans', sans-serif; }
.pc h3 { letter-spacing: .12em; font-size: 15px; color: var(--br); font-family: 'Outfit', sans-serif; font-weight: 800; }
.pc b { font-size: 32px; color: var(--ink); font-family: 'Outfit', sans-serif; }
.pc .btn { justify-content: center; margin-top: 14px; width: 100%; }

/* FAQ Accordion */
.faq { max-width: 840px; margin: auto; display: flex; flex-direction: column; gap: 12px; }
.q { border: 1px solid var(--line); border-radius: 16px; background: #FFFFFF; padding: 0 24px; box-shadow: var(--shadow-sm); transition: border-color .25s ease, box-shadow .25s ease; }
.q:hover { border-color: rgba(135, 96, 57, 0.35); box-shadow: var(--shadow-md); }
.q button { width: 100%; background: none; border: 0; color: var(--ink); font: 700 17.5px 'Plus Jakarta Sans', sans-serif; text-align: left; padding: 22px 0; display: flex; justify-content: space-between; align-items: center; cursor: pointer; gap: 16px; }
.q i { color: var(--br); font-style: normal; font-size: 20px; font-weight: 700; transition: .3s cubic-bezier(0.16, 1, 0.3, 1); flex: none; width: 34px; height: 34px; border-radius: 50%; background: #F8F5F1; display: grid; place-items: center; border: 1px solid rgba(135, 96, 57, 0.15); }
.q.o i { transform: rotate(45deg); background: var(--br); color: #fff; border-color: var(--br); }
.a { display: grid; grid-template-rows: 0fr; transition: grid-template-rows .35s cubic-bezier(0.16, 1, 0.3, 1); }
.q.o .a { grid-template-rows: 1fr; }
.a > div { overflow: hidden; }
.a p { padding: 0 0 22px; color: var(--mute); font-size: 15.5px; line-height: 1.65; border-top: 1px dashed rgba(135, 96, 57, 0.15); padding-top: 16px; }

/* Call to Action Banner */
.cta { position: relative; color: #fff; text-align: center; overflow: hidden; padding: 110px 0; background: #211D19; }
.cta > .ph { position: absolute; inset: 0; border-radius: 0; opacity: 0.35; }
.cta .w { position: relative; z-index: 2; }
.cta h2 { color: #fff; max-width: 760px; margin: 0 auto 18px; }
.cta p { color: rgba(255, 255, 255, 0.88); margin-bottom: 36px; font-size: 19px; }
.cta .bts { justify-content: center; }
.cta small { display: block; margin-top: 32px; color: rgba(255, 255, 255, 0.7); font-size: 14px; }

/* Footer */
footer { padding: 80px 0 32px; background: #ffffff; border-top: 1px solid var(--line); }
.fg2 { display: grid; grid-template-columns: 1.6fr repeat(4, 1fr); gap: 36px; }
footer h4 { font-size: 13px; letter-spacing: .16em; color: var(--br); margin: 0 0 16px; text-transform: uppercase; font-weight: 800; font-family: 'Outfit', sans-serif; }
footer li { margin-bottom: 10px; font-size: 15px; color: var(--mute); }
footer li a:hover { color: var(--br); }
.fb { display: flex; justify-content: space-between; flex-wrap: wrap; gap: 14px; margin-top: 56px; padding-top: 24px; border-top: 1px solid var(--line); font-size: 14px; color: var(--mute); }
.fb a { margin-left: 20px; text-decoration: none; color: var(--mute); }
.fb a:hover { color: var(--br); }

/* Responsive Adjustments */
@media (max-width: 1100px) {
  .st { grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); }
  .sp:after { display: none !important; }
  .fc { grid-column: span 6; }
  .fc.big { grid-column: 1 / -1; }
  .tm { grid-template-columns: repeat(3, 1fr); }
  .tm:before { display: none; }
  .fg2 { grid-template-columns: 1fr 1fr 1fr; }
  .fg2 > div:first-child { grid-column: 1 / -1; }
}
@media (max-width: 900px) {
  .hg, .ig, .cx { grid-template-columns: 1fr; }
  .hv { height: 520px; }
  .ig > .ph { min-height: 360px; }
  .cxv { height: 460px; }
  .gr, .wg, .tg, .pg { grid-template-columns: 1fr; }
  .sh { grid-template-columns: 1fr; }
  .sh .c2 { grid-column: auto; }
  .st { grid-template-columns: 1fr; }
  .sp { display: grid; grid-template-columns: 130px 1fr; gap: 16px; align-items: center; }
  .sp .v { height: 110px; margin: 0; }
  .rp .cnt { grid-template-columns: 1fr; }
}
@media (max-width: 600px) {
  .w { padding: 0 16px; }
  .fc, .fc.big { grid-column: 1 / -1; padding: 20px 16px; }
  .b4, .bl { grid-template-columns: 1fr; gap: 12px; }
  .b4 > div { padding: 18px 16px; border-radius: 14px; }
  .tm { grid-template-columns: 1fr; }
  .fg2 { grid-template-columns: 1fr; }
  .hv .fl { display: none; }
  .hv .win { width: 100%; }
  .cxv { height: 380px; }
  .cxv > .ph { inset: 0; }
  .fl { display: none; }
  .sp { grid-template-columns: 1fr; }
  .hd { margin-bottom: 36px; }
  .hd p { font-size: 15.5px; }
}
</style>

<!-- Hero Section -->
<header class="hero">
  <!-- Faint decorative food-related line illustrations -->
  <div class="hero-line-art art-1">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M18 8h1a4 4 0 0 1 0 8h-1M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8zM6 1v3M10 1v3M14 1v3"/></svg>
  </div>
  <div class="hero-line-art art-2">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M5.5 16h13M2 16h20M12 4v4M12 8a8 8 0 0 0-8 8h16a8 8 0 0 0-8-8zM9 2h6"/></svg>
  </div>
  <div class="hero-line-art art-3">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
  </div>

  <div class="w hg">
    <!-- Left Column Content (45%) -->
    <div class="hero-left-col">
      <div class="hero-eyebrow-pill">
        <svg viewBox="0 0 24 24"><path d="M12 2l8 4v4c0 6-4 10-8 12-4-2-8-6-8-12V6l8-4z"/></svg>
        RESTAURANT OPERATIONS, SIMPLIFIED
      </div>

      <h1 class="hero-main-title">
        Every Part of<br>Your Restaurant.
        <span class="hero-serif-highlight">One Smart System.</span>
      </h1>

      <p class="hero-lead-text">
        Manage your menu, tables, orders, billing, kitchen, staff, inventory and more &mdash; all in one simple platform built for restaurants.
      </p>

      <div class="hero-cta-group">
        <a href="{{ route('restaurant_signup') }}" class="hero-btn-primary-demo">
          Book a Demo &rarr;
        </a>
        <a href="#features" class="hero-btn-secondary-features">
          Explore Features
        </a>
      </div>

      <!-- Industry Compatibility Row -->
      <div class="industry-compat-wrap">
        <div class="industry-compat-label">Built for All Types of Food Businesses</div>
        <div class="industry-compat-icons">
          <div class="industry-item">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M5.5 16h13M2 16h20M12 4v4M12 8a8 8 0 0 0-8 8h16a8 8 0 0 0-8-8z"/></svg>
            Restaurants
          </div>
          <div class="industry-item">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M18 8h1a4 4 0 0 1 0 8h-1M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8zM6 1v3M10 1v3"/></svg>
            Caf&eacute;s
          </div>
          <div class="industry-item">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M4 11a8 8 0 0 1 16 0H4zm-1 3h18M3 17h18a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>
            Bakeries
          </div>
          <div class="industry-item">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><rect x="3" y="4" width="18" height="12" rx="2"/><path d="M7 20h10M12 16v4M7 8h4M7 11h2"/></svg>
            QSRs
          </div>
          <div class="industry-item">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M3 21h18M3 7v14M21 7v14M6 7l6-4 6 4M9 11h2M13 11h2M9 15h2M13 15h2"/></svg>
            Canteens &amp; More
          </div>
        </div>
      </div>
    </div>

    <!-- Right Column Visual Showcase (55%) -->
    <div class="hero-showcase-container">
      <!-- Blended Restaurant Interior Photography Backdrop -->
      <div class="hero-photo-backdrop">
        <div class="photo-backdrop-badge">DINING ROOM &amp; POS OPERATIONS</div>
      </div>

      <!-- Main Desktop Dashboard Mockup (in Laptop/Monitor Bezel) -->
      <div class="desktop-monitor-frame">
        <div class="desktop-screen-bezel">
          <!-- Browser Top Bar -->
          <div class="desktop-browser-bar">
            <div class="browser-window-dots">
              <span class="browser-dot red"></span>
              <span class="browser-dot yellow"></span>
              <span class="browser-dot green"></span>
            </div>
            <div class="browser-url-pill">app.genimenu.com/dashboard</div>
            <div class="desktop-live-tag">LIVE POS</div>
          </div>

          <!-- Real Original Dashboard Image -->
          <div class="dashboard-img-wrap" style="position: relative; width: 100%; overflow: hidden; background: #FAF7F2; border-radius: 0 0 10px 10px;">
            <img src="{{ asset('assets/images/dash.png') }}" alt="Geni Menu Restaurant Management & POS Dashboard" style="width: 100%; height: auto; display: block; object-fit: contain;">
          </div>
        </div>
      </div>

      <!-- Overlapping Smartphone Mobile App Mockup (Bottom Left) -->
      <div class="hero-phone-mockup">
        <div class="phone-inner-screen" style="background: transparent; overflow: hidden; position: relative;">
          <img src="{{ asset('assets/images/geni-mobile-hero.png') }}" alt="Geni Menu Mobile POS Table Ordering" style="width: 100%; height: 100%; display: block; object-fit: cover; border-radius: 24px;">
        </div>
      </div>
    </div>
  </div>
</header>

<!-- Section: Everything You Need -->
<section class="alt">
  <div class="food-bg-icon float-2" style="top: 8%; right: 2%; width: 130px; height: 130px;" title="Gourmet Burger">
    <svg viewBox="0 0 24 24"><path d="M4 11a8 8 0 0 1 16 0H4zm-1 3h18M3 17h18a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>
  </div>
  <div class="food-bg-icon float-1" style="bottom: 12%; left: 2%; width: 110px; height: 110px;" title="QR Code Scanner">
    <svg viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><path d="M14 14h3v3h-3zM17 17h4v4h-4zM14 20h3v1h-3z"/></svg>
  </div>

  <div class="w ig">
    <div class="ph r">
      <img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?q=80&w=1000&auto=format&fit=crop" alt="Warm restaurant dining room ambiance" loading="lazy">
      <span>🍷 Warm Dining Room Ambiance &amp; POS Station</span>
    </div>
    <div class="r">
      <h2><span class="title-grad">Everything You Need to</span> <span class="sf">Run Your Restaurant.</span></h2>
      <p style="margin-top:16px">From taking an order to managing your kitchen, Geni Menu keeps your daily work simple and organised.</p>
      <div class="b4" id="b4"></div>
    </div>
  </div>
</section>

<!-- Section: Features -->
<section id="features">
  <div class="food-bg-icon float-1" style="top: 6%; left: 2%; width: 140px; height: 140px;" title="KOT Order Slip">
    <svg viewBox="0 0 24 24"><path d="M6 3h12v18l-3-2-3 2-3-2-3 2zM9 8h6M9 12h6"/></svg>
  </div>
  <div class="food-bg-icon float-3" style="bottom: 8%; right: 2%; width: 125px; height: 125px;" title="Inventory Box">
    <svg viewBox="0 0 24 24"><path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
  </div>

  <div class="w">
    <div class="hd r">
      <span class="eb"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg> FEATURES</span>
      <h2><span class="title-grad">One System for</span> <span class="sf">Your Daily Work.</span></h2>
      <p>Bring your restaurant's everyday operations together in one simple system.</p>
    </div>
    <div class="fg" id="fg"></div>
  </div>
</section>

<!-- Section: How It Works -->
<section class="hiw-section" id="how-it-works">
  <div class="w">
    <!-- Section Header -->
    <div class="hiw-header r">
      <span class="hiw-eyebrow">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
        HOW IT WORKS
      </span>
      <h2 class="hiw-title">
        From Customer to Kitchen,<br>
        <span class="hiw-serif">Made Simple.</span>
      </h2>
    </div>

    <!-- 5-Step Workflow Cards Grid -->
    <div class="hiw-grid r">
      
      <!-- Step 01: Take the Order -->
      <div class="hiw-card">
        <div class="hiw-step-badge">STEP 01</div>
        <div class="hiw-preview-box">
          <div class="mock-phone-wrap">
            <div class="mock-phone-body">
              <div class="mock-phone-top">
                <span>The Grand Bistro</span>
                <span class="mock-phone-table-pill">Table 12</span>
              </div>
              <div class="mock-phone-items">
                <div class="mock-phone-row">
                  <span class="mock-phone-item-name">
                    <img src="https://images.unsplash.com/photo-1567188040759-fb8a883dc6d8?w=100&auto=format&fit=crop&q=80" alt="Paneer Tikka">
                    Paneer Tikka
                  </span>
                  <div class="mock-phone-right">
                    <span class="mock-phone-price">&#8377;280</span>
                    <span class="mock-phone-plus-btn">+</span>
                  </div>
                </div>
                <div class="mock-phone-row">
                  <span class="mock-phone-item-name">
                    <img src="https://images.unsplash.com/photo-1603133872878-684f208fb84b?w=100&auto=format&fit=crop&q=80" alt="Veg Fried Rice">
                    Fried Rice
                  </span>
                  <div class="mock-phone-right">
                    <span class="mock-phone-price">&#8377;220</span>
                    <span class="mock-phone-plus-btn">+</span>
                  </div>
                </div>
                <div class="mock-phone-row">
                  <span class="mock-phone-item-name">
                    <img src="https://images.unsplash.com/photo-1668236543090-82eba5ee5976?w=100&auto=format&fit=crop&q=80" alt="Masala Dosa">
                    Masala Dosa
                  </span>
                  <div class="mock-phone-right">
                    <span class="mock-phone-price">&#8377;140</span>
                    <span class="mock-phone-plus-btn">+</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="mock-qr-badge">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><path d="M14 14h3v3h-3zM17 17h4v4h-4zM14 20h3v1h-3z"/></svg>
              <span>Scan QR Table 12</span>
            </div>
          </div>
        </div>
        <h3 class="hiw-step-title">TAKE THE ORDER</h3>
        <p class="hiw-step-desc">Take orders from table QR, counter or kiosk.</p>
        <div class="hiw-connector-arrow">&rarr;</div>
      </div>

      <!-- Step 02: Send to Kitchen -->
      <div class="hiw-card">
        <div class="hiw-step-badge">STEP 02</div>
        <div class="hiw-preview-box">
          <div class="mock-kds-header">
            <span>KITCHEN ORDERS</span>
            <span class="mock-live-pulse">LIVE</span>
          </div>
          <div class="mock-kds-cards">
            <div class="mock-kds-order-item">
              <div class="mock-kds-order-info">
                <b>#1024 &bull; Table 4</b>
                <span>1x Paneer Tikka, 2x Naan, 1x Dal Makhani</span>
              </div>
              <img src="https://images.unsplash.com/photo-1546833999-b9f581a1996d?w=100&auto=format&fit=crop&q=80" alt="Food Prep" class="mock-kds-thumb">
              <span class="mock-status-pill prep">IN PREP</span>
            </div>
            <div class="mock-kds-order-item new-order">
              <div class="mock-kds-order-info">
                <b>#1025 &bull; Takeaway #12</b>
                <span>1x Chicken Biryani, 1x Raita</span>
              </div>
              <img src="https://images.unsplash.com/photo-1563379091339-03b21ab4a4f8?w=100&auto=format&fit=crop&q=80" alt="Biryani" class="mock-kds-thumb">
              <span class="mock-status-pill new">NEW</span>
            </div>
            <div class="mock-kds-order-item ready-order">
              <div class="mock-kds-order-info">
                <b>#1026 &bull; Table 9</b>
                <span>1x Fried Rice, 1x Cold Coffee</span>
              </div>
              <img src="https://images.unsplash.com/photo-1603133872878-684f208fb84b?w=100&auto=format&fit=crop&q=80" alt="Fried Rice" class="mock-kds-thumb">
              <span class="mock-status-pill ready">READY</span>
            </div>
          </div>
        </div>
        <h3 class="hiw-step-title">SEND TO KITCHEN</h3>
        <p class="hiw-step-desc">Orders reach the right kitchen station instantly.</p>
        <div class="hiw-connector-arrow">&rarr;</div>
      </div>

      <!-- Step 03: Prepare the Order -->
      <div class="hiw-card">
        <div class="hiw-step-badge">STEP 03</div>
        <div class="hiw-preview-box">
          <div class="mock-kot-wrap">
            <div class="mock-kot-ticket">
              <div class="mock-kot-top">
                <span>KOT #142</span>
                <span style="color:#D97706;">⏱ 03m</span>
              </div>
              <div class="mock-kot-dish">&bull; 2x Paneer Butter</div>
              <div class="mock-kot-dish">&bull; 3x Butter Naan</div>
              <div class="mock-kot-dish">&bull; 1x Dal Makhani</div>
              <img src="https://images.unsplash.com/photo-1546833999-b9f581a1996d?w=240&auto=format&fit=crop&q=80" alt="Paneer Butter" class="mock-kot-img">
              <div class="mock-kot-note">Note: Less Spicy</div>
              <div class="mock-kot-pill-btn prep">PREPARING</div>
            </div>
            <div class="mock-kot-ticket">
              <div class="mock-kot-top">
                <span>KOT #143</span>
                <span style="color:#16A34A;">Ready</span>
              </div>
              <div class="mock-kot-dish">&bull; 1x Biryani</div>
              <div class="mock-kot-dish">&bull; 1x Raita</div>
              <div class="mock-kot-dish">&bull; 1x Salad</div>
              <img src="https://images.unsplash.com/photo-1563379091339-03b21ab4a4f8?w=240&auto=format&fit=crop&q=80" alt="Biryani" class="mock-kot-img">
              <div class="mock-kot-note">Table 2 (Dine-in)</div>
              <div class="mock-kot-pill-btn ready">READY</div>
            </div>
          </div>
        </div>
        <h3 class="hiw-step-title">PREPARE THE ORDER</h3>
        <p class="hiw-step-desc">Your kitchen team sees live order tickets.</p>
        <div class="hiw-connector-arrow">&rarr;</div>
      </div>

      <!-- Step 04: Bill & Collect -->
      <div class="hiw-card">
        <div class="hiw-step-badge">STEP 04</div>
        <div class="hiw-preview-box">
          <div class="mock-bill-card">
            <div class="mock-bill-head">
              <span>Table 4 Bill</span>
              <span>#INV-4821</span>
            </div>
            <div class="mock-bill-line">
              <span>Paneer Tikka</span>
              <b>&#8377;280</b>
            </div>
            <div class="mock-bill-line">
              <span>Butter Naan (2)</span>
              <b>&#8377;90</b>
            </div>
            <div class="mock-bill-line">
              <span>Dal Makhani</span>
              <b>&#8377;160</b>
            </div>
            <div class="mock-bill-line" style="border-top:1px dashed #EAE4DA;padding-top:2px;margin-top:2px;">
              <span>Subtotal (3 items)</span>
              <b>&#8377;530</b>
            </div>
            <div class="mock-bill-line">
              <span>GST &amp; Taxes (5%)</span>
              <b>&#8377;27</b>
            </div>
            <div class="mock-bill-line total">
              <span>Total Amount</span>
              <span style="color:#A85B2B;font-weight:900;">&#8377;557</span>
            </div>
            <div class="mock-pay-tags">
              <div class="mock-pay-pill active">UPI Pay &check;</div>
              <div class="mock-pay-pill">💳 Card</div>
              <div class="mock-pay-pill">💵 Cash</div>
            </div>
          </div>
        </div>
        <h3 class="hiw-step-title">BILL &amp; COLLECT</h3>
        <p class="hiw-step-desc">Generate crisp GST bills and collect payment.</p>
        <div class="hiw-connector-arrow">&rarr;</div>
      </div>

      <!-- Step 05: Track Your Business -->
      <div class="hiw-card">
        <div class="hiw-step-badge">STEP 05</div>
        <div class="hiw-preview-box">
          <div class="mock-analytics-card">
            <div class="mock-analytics-top">
              <div class="mock-analytics-metric">
                <small>TODAY'S SALES</small>
                <b>&#8377;48,200</b>
              </div>
              <span class="mock-analytics-growth">&uarr; +18%</span>
            </div>
            <div class="mock-analytics-bars-wrap">
              <div class="mock-bars-row">
                <span class="mock-bar-col" style="height:45%;"></span>
                <span class="mock-bar-col peak" style="height:75%;"></span>
                <span class="mock-bar-col" style="height:60%;"></span>
                <span class="mock-bar-col peak" style="height:95%;"></span>
                <span class="mock-bar-col" style="height:80%;"></span>
              </div>
              <div class="mock-bar-labels">
                <span>10AM</span>
                <span>12PM</span>
                <span>2PM</span>
                <span>4PM</span>
                <span>6PM</span>
              </div>
            </div>
            <div class="mock-top-dish-card">
              <div class="mock-top-dish-info">
                <small>👑 Top Dish</small>
                <b>Paneer Tikka <span style="color:#76675D;font-weight:500;">(38 sold)</span></b>
              </div>
              <img src="https://images.unsplash.com/photo-1567188040759-fb8a883dc6d8?w=100&auto=format&fit=crop&q=80" alt="Paneer Tikka" class="mock-top-dish-img">
            </div>
          </div>
        </div>
        <h3 class="hiw-step-title">TRACK YOUR BUSINESS</h3>
        <p class="hiw-step-desc">See sales, popular dishes and performance.</p>
      </div>

    </div>

    <!-- 7-Stage Connected Workflow Timeline -->
    <div class="hiw-timeline-wrapper r">
      <!-- Stage 1 -->
      <div class="hiw-timeline-stage">
        <div class="hiw-stage-icon-circle">
          <svg viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><path d="M14 14h3v3h-3zM17 17h4v4h-4zM14 20h3v1h-3z"/></svg>
        </div>
        <span class="hiw-stage-label">Customer Scan</span>
      </div>

      <span class="hiw-timeline-arrow">&rarr;</span>

      <!-- Stage 2 -->
      <div class="hiw-timeline-stage">
        <div class="hiw-stage-icon-circle">
          <svg viewBox="0 0 24 24"><rect x="5" y="2" width="14" height="20" rx="3"/><path d="M12 18h.01M9 6h6M9 10h6"/></svg>
        </div>
        <span class="hiw-stage-label">Waiter / Kiosk</span>
      </div>

      <span class="hiw-timeline-arrow">&rarr;</span>

      <!-- Stage 3 -->
      <div class="hiw-timeline-stage">
        <div class="hiw-stage-icon-circle">
          <svg viewBox="0 0 24 24"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"/><rect x="9" y="3" width="6" height="4" rx="1"/><path d="M9 12l2 2 4-4M9 16h6"/></svg>
        </div>
        <span class="hiw-stage-label">Digital Order</span>
      </div>

      <span class="hiw-timeline-arrow">&rarr;</span>

      <!-- Stage 4 -->
      <div class="hiw-timeline-stage">
        <div class="hiw-stage-icon-circle">
          <svg viewBox="0 0 24 24"><path d="M6 13.8A6 6 0 0112 4a6 6 0 016 9.8V17H6v-3.2zM4 17h16v3H4zM12 4V2"/></svg>
        </div>
        <span class="hiw-stage-label">Kitchen KOT</span>
      </div>

      <span class="hiw-timeline-arrow">&rarr;</span>

      <!-- Stage 5 -->
      <div class="hiw-timeline-stage">
        <div class="hiw-stage-icon-circle">
          <svg viewBox="0 0 24 24"><path d="M18 16A6 6 0 0 0 6 16v1h12v-1zM4 20h16v1H4zM12 3v3"/></svg>
        </div>
        <span class="hiw-stage-label">Food Prep</span>
      </div>

      <span class="hiw-timeline-arrow">&rarr;</span>

      <!-- Stage 6 -->
      <div class="hiw-timeline-stage">
        <div class="hiw-stage-icon-circle">
          <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="12" rx="2"/><path d="M7 20h10M12 16v4M7 8h4M7 11h2"/></svg>
        </div>
        <span class="hiw-stage-label">POS Billing</span>
      </div>

      <span class="hiw-timeline-arrow">&rarr;</span>

      <!-- Stage 7 -->
      <div class="hiw-timeline-stage">
        <div class="hiw-stage-icon-circle">
          <svg viewBox="0 0 24 24"><path d="M23 6l-9.5 9.5-5-5L1 18M17 6h6v6"/></svg>
        </div>
        <span class="hiw-stage-label">Analytics</span>
      </div>
    </div>
  </div>
</section>

<!-- Section: Customer Experience -->
<section>
  <div class="food-bg-icon float-1" style="top: 15%; left: 2%; width: 120px; height: 120px;" title="Wine Glass & Cocktail">
    <svg viewBox="0 0 24 24"><path d="M8 22h8M12 15v7M12 15a7 7 0 0 0 7-7V3H5v5a7 7 0 0 0 7 7z"/></svg>
  </div>
  <div class="food-bg-icon float-2" style="bottom: 15%; right: 3%; width: 100px; height: 100px;" title="Dining Table">
    <svg viewBox="0 0 24 24"><path d="M4 9h16M5 9v10M19 9v10M9 9V5h6v4M7 15h10"/></svg>
  </div>

  <div class="w cx">
    <div class="cxv r" id="cxv">
      <div class="ph">
        <img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?q=80&w=1000&auto=format&fit=crop" alt="Customer dining experience at restaurant" loading="lazy">
        <span>🍷 Seamless Dine-in &amp; Digital Ordering</span>
      </div>
      <div class="cx-phone-mockup">
        <img src="{{ asset('assets/images/geni-mobile-hero.png') }}" alt="Geni Menu Live Smartphone Table Ordering" loading="lazy">
      </div>
    </div>
    <div class="r">
      <span class="eb"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg> CUSTOMER EXPERIENCE</span>
      <h2><span class="title-grad">Make Every Order</span> <span class="sf">Easier &amp; Faster.</span></h2>
      <p style="margin-top:16px">Give your customers a smooth experience from menu to payment.</p>
      <ul class="bl" id="cx_list">
        <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><polyline points="20 6 9 17 4 12"/></svg> Interactive Digital Menu with Photos</li>
        <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><polyline points="20 6 9 17 4 12"/></svg> Instant QR Table Ordering &amp; Reordering</li>
        <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><polyline points="20 6 9 17 4 12"/></svg> One-Tap Waiter Calling &amp; Water Requests</li>
        <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><polyline points="20 6 9 17 4 12"/></svg> Custom Cooking Notes &amp; Add-ons</li>
        <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><polyline points="20 6 9 17 4 12"/></svg> Instant Split Billing &amp; GST Invoicing</li>
        <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><polyline points="20 6 9 17 4 12"/></svg> UPI, Card &amp; Contactless Payments</li>
        <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><polyline points="20 6 9 17 4 12"/></svg> Live Food Prep Status on Guest Phones</li>
        <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><polyline points="20 6 9 17 4 12"/></svg> Multi-Language &amp; Dietary Filter Support</li>
      </ul>
      <a href="{{ route('restaurant_signup') }}" class="btn p">Make Dining Simple →</a>
    </div>
  </div>
</section>

<!-- Section: Your Team -->
<section class="team-section" id="your-team">
  <!-- Subtle decorative background icons -->
  <div class="food-bg-icon float-2" style="bottom: 8%; right: 3%; width: 130px; height: 130px;" title="Waitstaff Bell">
    <svg viewBox="0 0 24 24"><path d="M18 8A6 6 0 0 0 6 8v4h12V8zM3 16h18v2H3zM12 4v2"/></svg>
  </div>
  <div class="food-bg-icon float-1" style="top: 10%; left: 3%; width: 110px; height: 110px;" title="Chef Hat">
    <svg viewBox="0 0 24 24"><path d="M6 13.8A6 6 0 0 1 12 4a6 6 0 0 1 6 9.8V17H6v-3.2zM4 17h16v3H4zM12 4V2"/></svg>
  </div>

  <div class="w">
    <!-- Section Header -->
    <div class="team-header r">
      <span class="team-eyebrow">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
        YOUR TEAM
      </span>
      <h2 class="team-title">
        Make Daily Work Easier for<br>
        <span class="team-serif">Everyone.</span>
      </h2>
      <p class="team-subtitle">
        A simple system that helps every member of your restaurant team work better, faster and together.
      </p>
    </div>

    <!-- Floating Circular Badges & Step Flow with Connecting Curved Wave Line -->
    <div class="team-flow-wrapper r">
      <svg class="team-connector-svg" viewBox="0 0 1200 60" preserveAspectRatio="none">
        <path d="M 120 28 Q 235 6, 360 28 T 600 28 T 840 28 T 1080 28" fill="none" stroke="#D4A574" stroke-width="1.8" stroke-dasharray="5 5" opacity="0.75" />
      </svg>
      <div class="team-flow-steps-grid">
        <!-- Step 01: Table Booking -->
        <div class="team-step-col">
          <div class="team-floating-icon" title="Table Booking">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><rect x="3" y="4" width="18" height="18" rx="3"/><path d="M16 2v4M8 2v4M3 10h18"/><circle cx="8" cy="14" r="1"/><circle cx="12" cy="14" r="1"/><circle cx="16" cy="14" r="1"/><circle cx="8" cy="18" r="1"/><circle cx="12" cy="18" r="1"/></svg>
          </div>
          <span class="team-step-pill">STEP 01</span>
          <h4 class="team-step-name">Table Booking</h4>
          <p class="team-step-desc">Customer's book a table in seconds.</p>
        </div>

        <!-- Step 02: Take Order -->
        <div class="team-step-col">
          <div class="team-floating-icon" title="Take Order">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M18 8A6 6 0 0 0 6 8v4h12V8zM3 16h18v2H3zM12 4v2"/></svg>
          </div>
          <span class="team-step-pill">STEP 02</span>
          <h4 class="team-step-name">Take Order</h4>
          <p class="team-step-desc">Select menu items with images.</p>
        </div>

        <!-- Step 03: Kitchen KOT -->
        <div class="team-step-col">
          <div class="team-floating-icon" title="Kitchen KOT">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M6 13.8A6 6 0 0 1 12 4a6 6 0 0 1 6 9.8V17H6v-3.2zM4 17h16v3H4zM12 4V2"/></svg>
          </div>
          <span class="team-step-pill">STEP 03</span>
          <h4 class="team-step-name">Kitchen KOT</h4>
          <p class="team-step-desc">Orders appear in kitchen instantly.</p>
        </div>

        <!-- Step 04: Billing & Payment -->
        <div class="team-step-col">
          <div class="team-floating-icon" title="Billing & Payment">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><rect x="3" y="4" width="18" height="12" rx="2"/><path d="M7 20h10M12 16v4M7 8h4M7 11h2"/></svg>
          </div>
          <span class="team-step-pill">STEP 04</span>
          <h4 class="team-step-name">Billing &amp; Payment</h4>
          <p class="team-step-desc">Generate bill and collect payment.</p>
        </div>

        <!-- Step 05: Reports -->
        <div class="team-step-col">
          <div class="team-floating-icon" title="Reports">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M18 20V10M12 20V4M6 20v-6M3 20h18"/></svg>
          </div>
          <span class="team-step-pill">STEP 05</span>
          <h4 class="team-step-name">Reports</h4>
          <p class="team-step-desc">Track sales and business performance.</p>
        </div>
      </div>
    </div>

    <!-- 5 Team Device Showcase Cards Grid -->
    <div class="team-grid r">

      <!-- Card 01: Customers -->
      <div class="team-card-col">
        <div class="team-card">
          <div class="team-card-visual">
            <img src="{{ asset('assets/images/team-visual-customer.png') }}" alt="Geni Menu Customer Booking Experience" class="team-card-mockup-img" loading="lazy">
          </div>
          <div class="team-card-footer">
            <div class="team-role-icon-box">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><rect x="3" y="4" width="18" height="18" rx="3"/><path d="M16 2v4M8 2v4M3 10h18"/><circle cx="8" cy="14" r="1"/><circle cx="12" cy="14" r="1"/><circle cx="16" cy="14" r="1"/><circle cx="8" cy="18" r="1"/><circle cx="12" cy="18" r="1"/></svg>
            </div>
            <div class="team-role-content">
              <h3 class="team-role-title">CUSTOMERS</h3>
              <p class="team-role-desc">Book a table with date, people and time slot.</p>
            </div>
            <div class="team-role-arrow">&rarr;</div>
          </div>
        </div>
      </div>

      <!-- Card 02: Waiters -->
      <div class="team-card-col">
        <div class="team-card">
          <div class="team-card-visual">
            <img src="{{ asset('assets/images/team-visual-waiter.png') }}" alt="Geni Menu Waiter Mobile Digital Menu" class="team-card-mockup-img" loading="lazy">
          </div>
          <div class="team-card-footer">
            <div class="team-role-icon-box">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M18 8A6 6 0 0 0 6 8v4h12V8zM3 16h18v2H3zM12 4v2"/></svg>
            </div>
            <div class="team-role-content">
              <h3 class="team-role-title">WAITERS</h3>
              <p class="team-role-desc">Take orders and manage customer calls on mobile.</p>
            </div>
            <div class="team-role-arrow">&rarr;</div>
          </div>
        </div>
      </div>

      <!-- Card 03: Kitchen Team -->
      <div class="team-card-col">
        <div class="team-card">
          <div class="team-card-visual">
            <img src="{{ asset('assets/images/team-visual-kitchen.png') }}" alt="Geni Menu Kitchen KOT Display System" class="team-card-mockup-img" loading="lazy">
          </div>
          <div class="team-card-footer">
            <div class="team-role-icon-box">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M6 13.8A6 6 0 0 1 12 4a6 6 0 0 1 6 9.8V17H6v-3.2zM4 17h16v3H4zM12 4V2"/></svg>
            </div>
            <div class="team-role-content">
              <h3 class="team-role-title">KITCHEN TEAM</h3>
              <p class="team-role-desc">Orders reach the right kitchen station instantly.</p>
            </div>
            <div class="team-role-arrow">&rarr;</div>
          </div>
        </div>
      </div>

      <!-- Card 04: Cashier -->
      <div class="team-card-col">
        <div class="team-card">
          <div class="team-card-visual">
            <img src="{{ asset('assets/images/team-visual-cashier.png') }}" alt="Geni Menu Cashier POS Billing Counter" class="team-card-mockup-img" loading="lazy">
          </div>
          <div class="team-card-footer">
            <div class="team-role-icon-box">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><rect x="3" y="4" width="18" height="12" rx="2"/><path d="M7 20h10M12 16v4M7 8h4M7 11h2"/></svg>
            </div>
            <div class="team-role-content">
              <h3 class="team-role-title">CASHIER</h3>
              <p class="team-role-desc">Handle counter billing, receipts and payment.</p>
            </div>
            <div class="team-role-arrow">&rarr;</div>
          </div>
        </div>
      </div>

      <!-- Card 05: Managers / Owners -->
      <div class="team-card-col">
        <div class="team-card">
          <div class="team-card-visual">
            <img src="{{ asset('assets/images/team-visual-manager.png') }}" alt="Geni Menu Managers and Owners Live Sales Reports" class="team-card-mockup-img" loading="lazy">
          </div>
          <div class="team-card-footer">
            <div class="team-role-icon-box">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M18 20V10M12 20V4M6 20v-6M3 20h18"/></svg>
            </div>
            <div class="team-role-content">
              <h3 class="team-role-title">MANAGERS / OWNERS</h3>
              <p class="team-role-desc">Get real-time sales reports and business insights.</p>
            </div>
            <div class="team-role-arrow">&rarr;</div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- Section: Solutions (Single Row Infinite Loop Carousel Mode) -->
<section id="solutions">
  <div class="food-bg-icon float-1" style="top: 6%; left: 2%; width: 150px; height: 150px;" title="Pizza Slice">
    <svg viewBox="0 0 24 24"><path d="M12 2L2 22h20L12 2zM12 6l6 12H6l6-12z"/><circle cx="12" cy="11" r="1.5"/><circle cx="9" cy="16" r="1.5"/><circle cx="15" cy="16" r="1.5"/></svg>
  </div>
  <div class="food-bg-icon float-3" style="bottom: 5%; right: 2%; width: 140px; height: 140px;" title="Bakery Cake">
    <svg viewBox="0 0 24 24"><path d="M20 21H4a1 1 0 0 1-1-1v-5h18v5a1 1 0 0 1-1 1zM2 15l2-6h16l2 6H2zM12 4v5"/></svg>
  </div>

  <div class="w">
    <div class="hd r">
      <span class="eb"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg> SOLUTIONS</span>
      <h2><span class="title-grad">Works for Different</span> <span class="sf">Food Businesses.</span></h2>
      <p>Whether you run a restaurant, bakery, canteen or QSR, Geni Menu adapts to the way your business works.</p>
    </div>
  </div>

  <!-- Single Row Loop Carousel Container -->
  <div class="sol-carousel-wrap r">
    <div class="sol-marquee-track" id="ind"></div>
  </div>
</section>

<!-- Section: Scale & Growth -->
<section class="alt">
  <div class="food-bg-icon float-2" style="top: 15%; right: 4%; width: 120px; height: 120px;" title="Multi-branch Building">
    <svg viewBox="0 0 24 24"><path d="M3 21h18M3 7v14M21 7v14M6 7l6-4 6 4M9 11h2M13 11h2M9 15h2M13 15h2"/></svg>
  </div>
  <div class="w">
    <div class="hd r">
      <h2><span class="title-grad">Start Small.</span><br><span class="sf">Grow Easily.</span></h2>
      <p>Whether you have one outlet or multiple branches, Geni Menu helps you manage your business as you grow.</p>
    </div>
    <div class="dots r">
      <span>🍽️ One restaurant</span>
      <b>→</b>
      <span>👨‍🍳 Multiple kitchens</span>
      <b>→</b>
      <span>🏢 Multiple branches</span>
    </div>
    <div class="gr" id="gr"></div>
  </div>
</section>

<!-- Section: Reports -->
<section class="dk">
  <div class="food-bg-icon float-3" style="top: 12%; right: 3%; width: 140px; height: 140px;" title="Sales Growth Chart">
    <svg viewBox="0 0 24 24"><path d="M18 20V10M12 20V4M6 20v-6M3 20h18"/></svg>
  </div>
  <div class="food-bg-icon float-1" style="bottom: 10%; left: 3%; width: 125px; height: 125px;" title="Revenue Rupee/Currency Tag">
    <svg viewBox="0 0 24 24"><rect x="2" y="5" width="20" height="14" rx="2"/><line x1="2" y1="10" x2="22" y2="10"/><path d="M7 15h2M13 15h4"/></svg>
  </div>

  <div class="w">
    <div class="hd r">
      <span class="eb"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg> REPORTS &amp; ANALYTICS</span>
      <h2><span class="title-grad">Know How Your</span> <span class="sf">Business Is Doing.</span></h2>
      <p>See the information that matters to you.</p>
    </div>
    <div class="tags">
      <span>💰 Sales</span>
      <span>📦 Orders</span>
      <span>💳 Payments</span>
      <span>🥬 Inventory</span>
      <span>👥 Customers</span>
      <span>🏬 Branch Performance</span>
    </div>
    <div class="rp r" id="rp"></div>
    <p style="text-align:center;margin-top:36px">
      <a href="#contact" class="btn p">Explore Reports →</a>
    </p>
  </div>
</section>

<!-- Section: Live Suite Showcase -->
<section class="alt">
  <div class="food-bg-icon float-2" style="top: 10%; left: 2%; width: 130px; height: 130px;" title="Touch Screen Kiosk">
    <svg viewBox="0 0 24 24"><rect x="5" y="2" width="14" height="20" rx="3"/><path d="M12 18h.01M9 6h6M9 10h6"/></svg>
  </div>
  <div class="w">
    <div class="hd r">
      <h2><span class="title-grad">Everything You Need.</span><br><span class="sf">Right in Front of You.</span></h2>
      <p>One simple system to manage your restaurant from the counter to the kitchen and beyond.</p>
    </div>
    <div class="sh r" id="sh"></div>
  </div>
</section>

<!-- Section: Operational Highlights -->
<section>
  <div class="food-bg-icon float-1" style="bottom: 10%; right: 3%; width: 120px; height: 120px;" title="Speed Timer">
    <svg viewBox="0 0 24 24"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>
  </div>
  <div class="w">
    <div class="hd r">
      <h2><span class="title-grad">Less Work.</span><br><span class="sf">More Control.</span></h2>
    </div>
    <div class="wg" id="wg"></div>
  </div>
</section>

<!-- Section: Testimonials -->
<section class="alt">
  <div class="food-bg-icon float-3" style="top: 10%; left: 3%; width: 110px; height: 110px;" title="Customer Rating Heart">
    <svg viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
  </div>
  <div class="w">
    <div class="hd r">
      <h2><span class="title-grad">Built for Everyday</span> <span class="sf">Restaurant Operations.</span></h2>
    </div>
    <div class="tg" id="tg"></div>
  </div>
</section>

<!-- Section: Pricing -->
<section id="pricing">
  <div class="food-bg-icon float-2" style="top: 12%; right: 2%; width: 125px; height: 125px;" title="Pricing Tag">
    <svg viewBox="0 0 24 24"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"/><line x1="7" y1="7" x2="7.01" y2="7"/></svg>
  </div>
  <div class="w">
    <div class="hd r">
      <span class="eb"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"/><line x1="7" y1="7" x2="7.01" y2="7"/></svg> PRICING</span>
      <h2><span class="title-grad">A Plan for</span> <span class="sf">Every Business.</span></h2>
      <p>Choose what fits your business today and upgrade as you grow.</p>
    </div>
    <div class="pg" id="pg"></div>
    <p style="text-align:center;margin-top:36px">
      <a href="#pricing" style="color:var(--br);font-weight:700">View Detailed Pricing →</a>
    </p>
  </div>
</section>

<!-- Section: FAQ -->
<section class="alt">
  <div class="w">
    <div class="hd r">
      <h2><span class="title-grad">Got Questions?</span> <span class="sf">We Have Answers.</span></h2>
    </div>
    <div class="faq r" id="fq"></div>
  </div>
</section>

<!-- CTA Section -->
<section id="contact" class="cta">
  <div class="food-bg-icon float-1" style="top: 18%; left: 5%; width: 150px; height: 150px; opacity: 0.16; color: #fff;">
    <svg viewBox="0 0 24 24"><path d="M6 13.8A6 6 0 0 1 12 4a6 6 0 0 1 6 9.8V17H6v-3.2zM4 17h16v3H4zM12 4V2"/></svg>
  </div>
  <div class="food-bg-icon float-2" style="bottom: 12%; right: 5%; width: 160px; height: 160px; opacity: 0.16; color: #fff;">
    <svg viewBox="0 0 24 24"><path d="M18 8h1a4 4 0 0 1 0 8h-1M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8zM6 1v3M10 1v3M14 1v3"/></svg>
  </div>

  <div class="ph">
    <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?q=80&w=1600&auto=format&fit=crop" alt="Restaurant Interior background" loading="lazy">
  </div>
  <div class="w r">
    <h2>Ready to Make Restaurant Management Easier?</h2>
    <p>Manage your daily restaurant work with one simple system.</p>
    <div class="bts">
      <a href="{{ route('restaurant_signup') }}" class="btn p">Book a Demo</a>
      <a href="#contact" class="btn ow">Contact Us</a>
    </div>
    <small>Geni Menu — Simple tools for better restaurant management.</small>
  </div>
</section>

<script>
const $raw = i => document.getElementById(i);
// Null-safe $ wrapper — silently ignores assignment when element is missing
const $ = i => $raw(i) || { set innerHTML(v){}, get innerHTML(){ return ''; } };

// Authentic Restaurant & Food Industry Icons dictionary (Clean SVG vectors)
const I = {
  m: '<path d="M4 6h16M4 12h16M4 18h10"/><circle cx="18" cy="18" r="3"/><path d="M18 15v6M15 18h6"/>', // Menu board & items
  o: '<path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"/><rect x="9" y="3" width="6" height="4" rx="1"/><path d="M9 12l2 2 4-4M9 16h6"/>', // Orders notepad
  t: '<path d="M4 9h16M5 9v10M19 9v10M9 9V5h6v4M7 15h10"/>', // Restaurant Table & chairs
  b: '<rect x="3" y="4" width="18" height="12" rx="2"/><path d="M7 20h10M12 16v4M7 8h4M7 11h2"/>', // POS billing machine
  r: '<path d="M18 20V10M12 20V4M6 20v-6M3 20h18"/>', // Reports & chart
  w: '<path d="M18 8A6 6 0 006 8v4h12V8zM3 16h18v2H3zM12 4v2"/>', // Waiter service bell
  k: '<path d="M6 13.8A6 6 0 0112 4a6 6 0 016 9.8V17H6v-3.2zM4 17h16v3H4zM12 4V2"/>', // Chef hat / KOT
  i: '<path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>', // Inventory box
  a: '<path d="M12 2L3 7v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-5.45 9-12V7l-9-5z"/><path d="M12 8v8M8 12h8"/>', // Manager badge
  u: '<path d="M2 4l3 12h14l3-12-5 4-5-6-5 6-5-4z"/><circle cx="12" cy="17" r="2"/>', // Owner Crown
  s: '<path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2M9 11a4 4 0 100-8 4 4 0 000 8zm14 10v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/>', // Team staff
  l: '<path d="M3 21h18M3 7v14M21 7v14M6 7l6-4 6 4M9 11h2M13 11h2M9 15h2M13 15h2"/>', // Multi-branch building
  z: '<path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/>', // Fast speed lightning
  e: '<path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>', // Customer rating heart
  g: '<path d="M23 6l-9.5 9.5-5-5L1 18M17 6h6v6"/>', // Growth trending graph
  kio: '<rect x="5" y="2" width="14" height="20" rx="3"/><path d="M12 18h.01M9 6h6M9 10h6"/>', // Self kiosk tablet
  p: '<rect x="2" y="5" width="20" height="14" rx="2"/><line x1="2" y1="10" x2="22" y2="10"/>', // Payment card
  dish: '<path d="M18 16A6 6 0 0 0 6 16v1h12v-1zM4 20h16v1H4zM12 3v3"/>', // Serving Dish / Cloche
  qr: '<rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><path d="M14 14h3v3h-3zM17 17h4v4h-4zM14 20h3v1h-3z"/>', // QR Code
  dev: '<circle cx="7" cy="17" r="2"/><circle cx="17" cy="17" r="2"/><path d="M5 17h10M9 17V9h5l3 4h2v4M9 12h5"/>' // Delivery Scooter
};

const ic = k => `<span class="ic"><svg viewBox="0 0 24 24">${I[k] || I.m}</svg></span>`;
const wm = k => `<div class="card-wm-icon"><svg viewBox="0 0 24 24">${I[k] || I.m}</svg></div>`;

// Solution imagery mapping with high quality food photos
const SOL_IMGS = [
  'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?q=80&w=600&auto=format&fit=crop', // Family Restaurant
  'https://images.unsplash.com/photo-1550966871-3ed3cdb5ed0c?q=80&w=600&auto=format&fit=crop', // Dine-in Restaurant
  'https://images.unsplash.com/photo-1504674900247-0877df9cc836?q=80&w=600&auto=format&fit=crop', // Multi-Cuisine
  'https://images.unsplash.com/photo-1568901346375-23c9450c58cd?q=80&w=600&auto=format&fit=crop', // QSR
  'https://images.unsplash.com/photo-1526367790999-0150786686a2?q=80&w=600&auto=format&fit=crop', // Takeaway
  'https://images.unsplash.com/photo-1567521464027-f127ff144326?q=80&w=600&auto=format&fit=crop', // College Canteen
  'https://images.unsplash.com/photo-1528605248644-14dd04022da1?q=80&w=600&auto=format&fit=crop', // Office Canteen
  'https://images.unsplash.com/photo-1587314168485-3236d6710814?q=80&w=600&auto=format&fit=crop', // Sweet Shop
  'https://images.unsplash.com/photo-1509440159596-0249088772ff?q=80&w=600&auto=format&fit=crop', // Bakery
  'https://images.unsplash.com/photo-1578985545062-69928b1d9587?q=80&w=600&auto=format&fit=crop', // Cake Shop
  'https://images.unsplash.com/photo-1622483767028-3f66f32aef97?q=80&w=600&auto=format&fit=crop', // Juice Shop
  'https://images.unsplash.com/photo-1570197788417-0e82375c9371?q=80&w=600&auto=format&fit=crop', // Ice Cream Shop
  'https://images.unsplash.com/photo-1601050690597-df0568f70950?q=80&w=600&auto=format&fit=crop', // Chaat Shop
  'https://images.unsplash.com/photo-1576092768241-dec231879fc3?q=80&w=600&auto=format&fit=crop', // Tea Shop
  'https://images.unsplash.com/photo-1514933651103-005eec06c04b?q=80&w=600&auto=format&fit=crop', // Bar & Brewery
  'https://images.unsplash.com/photo-1513104890138-7c749659a591?q=80&w=600&auto=format&fit=crop'  // Pizzeria
];

const tl = (n, s, c = '') => `<div class="t ${c}">${n}<small>${s}</small></div>`;
const win = (t, b, st = '') => `<div class="win" style="${st}"><div class="wb"><i></i><i></i><i></i><b><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>${t}</b></div><div class="wc">${b}</div></div>`;
const bars = (a) => a.map(([n, v]) => `<div><div class="row" style="border:0;padding:2px 0"><span>${n}</span><b>${v}%</b></div><div class="bar"><i style="width:${v}%"></i></div></div>`).join('');

// UI Mockups
const POS = win('POS &amp; BILLING', `<div class="g g3">${tl('Paneer Tikka','₹280') + tl('Butter Naan','₹60') + tl('Filter Coffee','₹90','a') + tl('Biryani','₹320') + tl('Gulab Jamun','₹110') + tl('Masala Dosa','₹140')}</div><div><div class="row"><span>Table 4 · 3 items</span><b>₹430</b></div><div class="row"><span>GST (5%)</span><b>₹22</b></div><div class="row"><b>Total Bill</b><b style="color:var(--br);font-size:13px">₹452</b></div></div>`);
const TAB = win('TABLES', `<div class="g g4">${[['T1','Free','b'],['T2','Serving','a'],['T3','Free','b'],['T4','Occupied','c'],['T5','Occupied','c'],['T6','Reserved',''],['T7','Free','b'],['T8','Serving','a']].map(([n,s,c]) => tl(n,s,c)).join('')}</div>`);
const KOT = win('KOT KITCHEN TRACKER', `<div class="g g3">${tl('KOT #218','Table 2 · 3 items','a') + tl('KOT #219','Takeaway · 2 items') + tl('KOT #220','Table 6 · 4 items','b')}</div>${bars([['Preparing Dishes', 65], ['Ready to Serve', 35]])}`);
const INV = win('INVENTORY STOCK', bars([['Paneer (kg)', 82], ['Basmati Rice (kg)', 55], ['Fresh Milk (L)', 25], ['Tea leaves (kg)', 68]]));
const REP = win('DAILY ANALYTICS', `<div class="g g3">${tl('Sales','₹48,200') + tl('Orders','126') + tl('Avg. Bill','₹382')}</div><div style="display:flex;align-items:flex-end;gap:6px;height:64px;margin-top:4px">${[40,55,35,70,60,85,75].map(h => `<i style="flex:1;height:${h}%;background:var(--br);border-radius:4px 4px 0 0;opacity:${h/100+.15}"></i>`).join('')}</div>`);
const KIO = win('KIOSK SELF-ORDER', `<b>Welcome — Touch screen to start</b><div class="g g3" style="margin-top:6px">${tl('Burgers','Quick food') + tl('Fries &amp; Sides','','a') + tl('Beverages','Cold &amp; Hot')}</div>`);

const phone = `<div class="ph1"><div><div style="display:flex;justify-space-between;align-items:center"><b style="font-size:13px;color:var(--ink)">Your Restaurant</b><small style="color:var(--br);font-weight:700">Table 12</small></div><small style="color:var(--mute);margin-bottom:4px">Scan QR &amp; Place Order</small>${[['Paneer Tikka','₹280','https://images.unsplash.com/photo-1567188040759-fb8a883dc6d8?q=80&w=150&auto=format&fit=crop'],['Wood-fired Pizza','₹360','https://images.unsplash.com/photo-1513104890138-7c749659a591?q=80&w=150&auto=format&fit=crop'],['Cold Coffee','₹190','https://images.unsplash.com/photo-1517701604599-bb29b565090c?q=80&w=150&auto=format&fit=crop']].map(([a,b,c]) => `<div class="it"><u style="background-image:url('${c}')"></u><span>${a}</span><em>${b}</em></div>`).join('')}<div class="ct"><span>2 items · ₹640</span><b>Pay Now →</b></div></div></div>`;

const FL = ['Menu Management','Reservation Management','Waiter Requests','Table Management','POS Management','Order Management','KOT Management','Inventory','Reports'];
const SO = ['Family Restaurant','Dine-in Restaurant','Multi-Cuisine Restaurant','QSR','Takeaway Restaurant','College Canteen','Office Canteen','Sweet Shop','Bakery','Cake Shop','Juice Shop','Ice Cream Shop','Chaat Shop','Tea Shop','Bar &amp; Brewery','Pizzeria'];
const BEN = ['Manage tables, orders and billing easily.','Run dine-in service smoothly.','Handle many cuisines, one kitchen flow.','Keep ordering and billing fast.','Manage takeaway orders with ease.','Serve big crowds quickly.','Simple ordering for busy offices.','Manage products, orders and payments.','Manage bakery products &amp; fresh stock.','Track custom cake orders &amp; delivery.','Fast counter billing for drinks.','Quick billing at the ice cream counter.','Keep fast-moving queues moving.','Serve more cups, faster.','Manage bar orders, KOT and stock.','Manage custom pizza orders &amp; delivery.'];

const dd = (l, h, c) => `<div class="dm ${c||''}">${l.map(x => `<a href="${h}">${ic('m')}${x}</a>`).join('')}</div>`;

// Populate Hero - now rendered directly via Blade HTML
// $('hv').innerHTML = ...;

// Quick 4 features
const B4_DATA = [
  ['m','MENU MANAGEMENT','Manage your items, prices and availability instantly.','{{ route("features.menu-management") }}'],
  ['o','LIVE ORDERS','Take and track dine-in, takeaway &amp; online orders.','{{ route("features.order-management") }}'],
  ['t','TABLE LAYOUT','Know which tables are free, occupied or serving.','{{ route("features.table-management") }}'],
  ['b','POS &amp; BILLING','Create bills and process cash/UPI payments in seconds.','{{ route("features.pos-management") }}']
];
$('b4').innerHTML = B4_DATA.map(([i,t,d,u]) => `<a href="${u}" class="card" style="text-decoration:none;color:inherit;cursor:pointer;">${ic(i)}<h3>${t}</h3><p>${d}</p>${wm(i)}</a>`).join('');

// Core Feature Cards
const F = [
  ['m','Menu Management','Add, edit and manage your digital menu anytime.','{{ route("features.menu-management") }}'],
  ['r','Reservation Management','Manage table bookings without confusion or double booking.','{{ route("features.reservation-management") }}'],
  ['w','Waiter Requests','Help your waiters handle customer calls and service faster.','{{ route("features.waiter-request") }}'],
  ['t','Table Management','Manage tables and live order status from one screen.','{{ route("features.table-management") }}'],
  ['b','POS &amp; Billing','Make counter and table billing quick, accurate and easy.','{{ route("features.pos-management") }}'],
  ['o','Order Management','Keep dine-in, takeaway and online orders organized.','{{ route("features.order-management") }}'],
  ['k','KOT Management','Send orders directly to the kitchen without manual slips.','{{ route("features.kot-management") }}'],
  ['i','Inventory Management','Know what raw materials are available and what needs restocking.','{{ route("features.inventory-management") }}']
];
$('fg').innerHTML = `<a href="{{ route('features.pos-management') }}" class="card fc big r">${ic('b')}<h3>POS &amp; Billing</h3><p>Make billing quick and easy with built-in GST and payment options.</p>${POS}${TAB}<span class="ar">Explore POS Features →</span>${wm('b')}</a>` + F.filter(f => f[1] !== 'POS &amp; Billing').map(([i,t,d,u]) => `<a href="${u}" class="card fc r">${ic(i)}<h3>${t}</h3><p>${d}</p><span class="ar">Learn more →</span>${wm(i)}</a>`).join('');

// Populate Solutions in a SINGLE CONTINUOUS ROW (Loop Mode duplicated for seamless infinite scroll)
const SOL_ROUTES = [
  '{{ route("solutions.family-restaurant") }}',
  '{{ route("solutions.dine-in-restaurant") }}',
  '{{ route("solutions.multi-cuisine-restaurant") }}',
  '{{ route("solutions.qsr-restaurant") }}',
  '{{ route("solutions.takeaway-restaurant") }}',
  '{{ route("solutions.college-canteen") }}',
  '{{ route("solutions.office-canteen") }}',
  '{{ route("solutions.sweet-shop") }}',
  '{{ route("solutions.bakery") }}',
  '{{ route("solutions.bakery") }}',
  '{{ route("solutions.juice-and-snacks") }}',
  '{{ route("solutions.sweet-shop") }}',
  '{{ route("solutions.juice-and-snacks") }}',
  '{{ route("solutions.juice-and-snacks") }}',
  '{{ route("solutions.bars-and-breweries") }}',
  '{{ route("solutions.pizzerias") }}'
];

const solHtml = SO.map((t, i) => {
  const k = ['m','t','o','b','k','i','r','w'][i%8];
  const url = SOL_ROUTES[i] || '{{ route("features") }}';
  return `<a href="${url}" class="so-card" style="text-decoration:none;color:inherit;cursor:pointer;"><div class="im" style="background-image:url('${SOL_IMGS[i]}')"></div><div class="so-icon-badge">${ic(k)}</div><div class="so-body"><h3>${t}</h3><p>${BEN[i]}</p><span class="ar">View Solution →</span></div>${wm(k)}</a>`;
}).join('');

// Duplicate 2x for seamless continuous infinite marquee loop
$('ind').innerHTML = solHtml + solHtml;

// Growth Cards
$('gr').innerHTML = [['t','ONE BRANCH','Manage your complete daily dining and counter operations.'],['k','MULTIPLE KITCHENS','Keep main kitchen, pantry and bar orders organized.'],['l','MULTIPLE BRANCHES','Manage all your restaurant outlets from one central dashboard.']].map(([i,t,d]) => `<div class="card r">${ic(i)}<h3>${t}</h3><p>${d}</p>${wm(i)}</div>`).join('');

// Reports Dashboard Preview
$('rp').innerHTML = win('RESTAURANT PERFORMANCE DASHBOARD', `<div class="g g4">${tl('Today Sales','₹48,200','a') + tl('Total Orders','126') + tl('Collected','₹45,900') + tl('Unique Guests','84')}</div><div class="cnt"><div style="display:flex;align-items:flex-end;gap:8px;height:130px">${[40,55,35,70,60,85,75,90,65,80].map(h => `<i style="flex:1;height:${h}%;background:var(--br);border-radius:4px 4px 0 0;opacity:${h/100+.15}"></i>`).join('')}</div><div>${bars([['Outlet A (Main)', 85], ['Outlet B (Mall)', 62], ['Outlet C (Express)', 48]])}</div></div>`);

// Showcase Section
$('sh').innerHTML = [['POS BILLING SYSTEM', POS],['TABLE MANAGEMENT', TAB],['KITCHEN KOT TRACKER', KOT],['INVENTORY CONTROL', INV],['ORDERING KIOSK', KIO],['GUEST MANAGEMENT', win('CUSTOMER LOYALTY', `<div class="row"><span>Regular Dining Guests</span><b>84</b></div><div class="row"><span>Repeat Visit Rate</span><b>42%</b></div>`)]].map(([n,v]) => `<div>${v}<small>${n}</small></div>`).join('') + `<div class="c2">${REP}<small style="display:block;text-align:center;margin-top:12px;font-weight:800;color:var(--br)">COMPREHENSIVE ANALYTICS &amp; REPORTS</small></div>`;

// Highlights Grid
$('wg').innerHTML = [['EASY TO USE','Simple screens your staff can understand in 5 minutes without technical training.'],['EVERYTHING IN ONE PLACE','No need to manage separate apps for billing, inventory, QR menu and KOT.'],['FASTER SERVICE','Help your team take orders 2x faster and clear tables quickly.'],['BETTER CONTROL','Real-time visibility into stock usage, sales and staff activity.'],['READY TO GROW','Easily add more kitchen display stations and multi-location outlets.'],['ONE PLATFORM FOR EVERYONE','Connect owners, managers, waiters, kitchen chefs and cashiers smoothly.']].map(([t,d]) => `<div class="r"><h3><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><path d="M22 4L12 14.01l-3-3"/></svg>${t}</h3><p>${d}</p></div>`).join('');

// Testimonials
$('tg').innerHTML = [['"Managing our daily restaurant work and kitchen orders is much simpler and faster now. Our staff adapted instantly."','Restaurant Owner — Royal Dine','u'],['"Orders, POS billing and kitchen operations are easy to manage without slip delays. Great for rush hours."','General Manager — Spice Garden','a'],['"Having everything connected from QR menu to accounting saves our team a lot of time every single day."','Business Director — Cafe Mocha Chain','b']].map(([q,n,k]) => `<div class="card tc r"><div class="qm">“</div><h3>${q}</h3><b>— ${n}</b>${wm(k)}</div>`).join('');

// Pricing Plans
$('pg').innerHTML = [['STARTER PLAN','Ideal for small cafes, bakeries and single food outlets.','₹999 / mo','m'],['BUSINESS PLAN','Perfect for growing dine-in restaurants and QSR outlets.','₹1,999 / mo','b'],['ENTERPRISE PLAN','Built for multi-branch chains, large hotels and food courts.','Custom Plan','l']].map(([n,d,p,k], i) => `<div class="card pc r ${i===1?'f':''}"><h3>${n}</h3><p>${d}</p><b style="color:var(--br)">${p}</b><a href="#contact" class="btn ${i===1?'p':'o'}">Book a Demo</a>${wm(k)}</div>`).join('');

// FAQ Accordion
$('fq').innerHTML = [['What can I manage with Geni Menu?','Your menu, tables, reservations, orders, KOT, billing, inventory, staff, customer loyalty and multi-branch reports.'],['Who can use Geni Menu?','Restaurants, cafés, bakeries, QSRs, canteens, sweet shops, bars, food courts and cloud kitchens.'],['Can I manage multiple branches?','Yes. You can manage all your outlets, prices, and consolidated sales reports from one central dashboard.'],['Can I manage multiple kitchen stations?','Yes. Orders automatically route to specific kitchens (e.g. Pantry, Main Kitchen, Bar) instantly.'],['Can my customers order through a self-ordering kiosk?','Yes. Kiosk ordering is fully supported alongside mobile table QR code and counter POS ordering.'],['Can I manage inventory & stock?','Yes. Track raw ingredients, low-stock alerts, and recipe consumption in real-time.'],['Does Geni Menu support GST billing and POS?','Yes. Generate compliant GST bills, split bills, and accept UPI, Cards, Cash, and Online payments.'],['Can I manage table reservations?','Yes. See real-time free, occupied, and reserved table layouts and take bookings online or at counter.']].map(([q,a]) => `<div class="q"><button>${q}<i>+</i></button><div class="a"><div><p>${a}</p></div></div></div>`).join('');

document.querySelectorAll('.q button').forEach(b => b.onclick = () => b.parentNode.classList.toggle('o'));

// Intersection Observer for scroll entrance animations
const io = new IntersectionObserver(e => e.forEach(x => {
  if (x.isIntersecting) {
    x.target.classList.add('in');
    io.unobserve(x.target);
  }
}), { threshold: 0.1 });

document.querySelectorAll('.r').forEach(e => io.observe(e));

</script>
@endsection