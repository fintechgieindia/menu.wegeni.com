@php
$meta = [
    'title' => 'Family Restaurant POS & Management Software | Geni Menu',
    'description' => 'Everything your family restaurant needs in one place. Manage group seating, digital QR menus, large family orders, KOT kitchen routing, fast POS billing, and reports with Geni Menu.',
    'keywords' => 'family restaurant POS, family restaurant software India, dining floor table management, large group order KOT, restaurant billing software, Geni Menu',
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
  --red: #B91C1C;
  --red-bg: #FEF2F2;
}

.fam-page * { box-sizing: border-box; }
.fam-page {
  font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
  color: var(--ink);
  background: var(--bg);
  -webkit-font-smoothing: antialiased;
  overflow-x: hidden;
}

.fam-page h1, .fam-page h2, .fam-page h3, .fam-page h4 {
  margin: 0;
  font-family: 'Outfit', 'Plus Jakarta Sans', sans-serif;
  font-weight: 500;
  line-height: 1.14;
  letter-spacing: -0.025em;
  color: var(--ink);
}
.fam-page h1 { font-size: clamp(34px, 4.6vw, 56px); }
.fam-page h2 { font-size: clamp(28px, 3.6vw, 44px); }
.fam-page h3 { font-size: 20px; font-weight: 600; }
.fam-page p { margin: 0; color: var(--mute); font-size: 16px; line-height: 1.65; }
.fam-page a { text-decoration: none; color: inherit; }

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
.fam-sec { padding: clamp(56px, 6.5vw, 92px) 0; background: var(--bg); position: relative; overflow: hidden; }
.fam-sec.alt { background: var(--bg2); }
.fam-sec.border-b { border-bottom: 1px solid var(--line); }

.eb {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  font-size: 12px;
  letter-spacing: .14em;
  font-weight: 700;
  text-transform: uppercase;
  color: var(--br);
  margin-bottom: 16px;
  background: var(--br-light);
  padding: 7px 16px;
  border-radius: 99px;
  border: 1px solid rgba(135, 96, 57, 0.22);
}

.hd { max-width: 760px; margin: 0 auto 48px; text-align: center; }
.hd p { margin-top: 14px; font-size: 17px; }

/* Buttons */
.btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  padding: 14px 28px;
  border-radius: 12px;
  font: 700 15px 'Plus Jakarta Sans', sans-serif;
  border: 1.5px solid var(--br);
  transition: .25s ease;
  cursor: pointer;
}
.btn.p {
  background: linear-gradient(135deg, #876039 0%, #a87646 100%);
  color: #fff;
  box-shadow: 0 4px 16px rgba(135, 96, 57, 0.28);
}
.btn.p:hover {
  transform: translateY(-2px);
  background: linear-gradient(135deg, #6f4e2d 0%, #876039 100%);
  box-shadow: 0 8px 24px rgba(135, 96, 57, 0.36);
}
.btn.o { color: var(--br); background: #fff; }
.btn.o:hover { background: var(--br); color: #fff; transform: translateY(-2px); }

/* Breadcrumb */
.bc { padding: 16px 0; background: var(--bg2); border-bottom: 1px solid var(--line); font-size: 13.5px; color: var(--mute); font-weight: 600; }
.bc .w { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; }
.bc a:hover { color: var(--br); }
.bc .sep { opacity: 0.5; }
.bc .cur { color: var(--br); font-weight: 700; }

/* Reveal */
.r { opacity: 0; transform: translateY(20px); transition: opacity .65s ease, transform .65s ease; }
.r.on { opacity: 1; transform: none; }

/* ================= HERO ================= */
.rm-hero {
  padding: clamp(48px, 6vw, 84px) 0;
  background: linear-gradient(180deg, var(--bg2) 0%, #ffffff 100%);
  border-bottom: 1px solid var(--line);
}
.rm-hero-grid {
  display: grid;
  grid-template-columns: 1fr 1.12fr;
  gap: 52px;
  align-items: center;
}
.rm-hero-sub { font-size: 17.5px; margin: 20px 0 30px; max-width: 540px; color: var(--mute); }
.rm-hero-cta { display: flex; gap: 14px; flex-wrap: wrap; margin-bottom: 34px; }
.rm-hero-stats {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 18px;
  padding-top: 24px;
  border-top: 1px solid var(--line);
}
.rm-hero-stat strong {
  display: block;
  font-family: 'Outfit', sans-serif;
  font-size: 22px;
  font-weight: 600;
  color: var(--br);
  line-height: 1.2;
}
.rm-hero-stat span { font-size: 12.5px; font-weight: 600; color: var(--mute); }

.rm-hero-media {
  position: relative;
  border-radius: 26px;
  overflow: hidden;
  box-shadow: var(--shadow-lg);
  border: 1px solid rgba(135, 96, 57, 0.2);
  background: #1C1510;
  aspect-ratio: 4 / 3;
}
.rm-hero-media img { width: 100%; height: 100%; object-fit: cover; display: block; transition: transform 0.6s ease; }
.rm-hero-media:hover img { transform: scale(1.03); }
.rm-hero-scrim {
  position: absolute;
  inset: 0;
  background: linear-gradient(180deg, rgba(33, 22, 15, 0.14) 0%, rgba(33, 22, 15, 0.05) 45%, rgba(33, 22, 15, 0.64) 100%);
  pointer-events: none;
}
.rm-hero-pill {
  position: absolute;
  top: 18px;
  left: 18px;
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 8px 14px;
  border-radius: 99px;
  background: rgba(255, 255, 255, 0.92);
  backdrop-filter: blur(10px);
  font-size: 12px;
  font-weight: 700;
  color: var(--ink);
  box-shadow: 0 6px 20px rgba(0, 0, 0, 0.14);
}
.rm-live-dot { width: 8px; height: 8px; border-radius: 50%; background: #16A34A; box-shadow: 0 0 0 3px rgba(22, 163, 74, 0.22); }
.rm-hero-float {
  position: absolute;
  left: 18px;
  right: 18px;
  bottom: 18px;
  background: rgba(255, 255, 255, 0.94);
  backdrop-filter: blur(12px);
  border: 1px solid rgba(135, 96, 57, 0.2);
  border-radius: 16px;
  padding: 14px 18px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 14px;
  box-shadow: 0 12px 30px rgba(33, 22, 15, 0.18);
}
.rm-hero-float-left { display: flex; align-items: center; gap: 12px; }
.rm-hero-float-ico {
  width: 40px;
  height: 40px;
  border-radius: 11px;
  background: var(--br-light);
  color: var(--br);
  border: 1px solid rgba(135, 96, 57, 0.2);
  display: grid;
  place-items: center;
  flex: none;
}
.rm-hero-float-ico svg { width: 20px; height: 20px; fill: none; stroke: currentColor; stroke-width: 2; }
.rm-hero-float-ttl { font-size: 13.5px; font-weight: 700; color: var(--ink); line-height: 1.25; }
.rm-hero-float-sub { font-size: 12px; color: var(--mute); }
.rm-hero-float-tag {
  font-size: 11px;
  font-weight: 700;
  padding: 5px 11px;
  border-radius: 99px;
  background: var(--green-bg);
  color: var(--green);
  white-space: nowrap;
}

/* ================= VALUE STRIP (01-04) ================= */
.rm-val-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; }
.rm-val-card {
  background: var(--bg2);
  border: 1px solid var(--line);
  border-radius: 18px;
  padding: 24px;
  transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
}
.rm-val-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-md); border-color: rgba(135, 96, 57, 0.32); background: #fff; }
.rm-val-top { display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px; }
.rm-ic {
  width: 46px;
  height: 46px;
  border-radius: 13px;
  background: #fff;
  color: var(--br);
  border: 1px solid var(--line);
  display: grid;
  place-items: center;
  transition: .25s ease;
}
.rm-ic svg { width: 21px; height: 21px; fill: none; stroke: currentColor; stroke-width: 1.9; stroke-linecap: round; stroke-linejoin: round; }
.rm-val-card:hover .rm-ic, .rm-ben-card:hover .rm-ic { background: var(--br); color: #fff; border-color: var(--br); }
.rm-num { font-family: 'Outfit', sans-serif; font-size: 13px; font-weight: 700; color: var(--br); opacity: 0.75; letter-spacing: 0.06em; }
.rm-val-card h3 { font-size: 17.5px; margin-bottom: 8px; }
.rm-val-card p { font-size: 14px; }

/* ================= PROGRESSION GRID ================= */
.rm-prog-grid-4 { display: grid; grid-template-columns: repeat(4, 1fr); gap: 14px; }
.rm-prog-card {
  background: #fff;
  border: 1px solid var(--line);
  border-radius: 16px;
  padding: 18px 14px;
  text-align: center;
  transition: transform .25s ease, border-color .25s ease, box-shadow .25s ease;
}
.rm-prog-card:hover { transform: translateY(-4px); border-color: var(--br); box-shadow: var(--shadow-sm); }
.rm-prog-num {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 32px;
  height: 32px;
  border-radius: 10px;
  background: var(--br-light);
  color: var(--br);
  font-family: 'Outfit', sans-serif;
  font-weight: 700;
  font-size: 12.5px;
  margin-bottom: 10px;
  border: 1px solid rgba(135, 96, 57, 0.2);
}
.rm-prog-card h4 { font-size: 14px; font-weight: 700; margin-bottom: 4px; }
.rm-prog-card p { font-size: 12.5px; line-height: 1.45; }

/* ================= WINDOW CHROME & FLOOR TILES ================= */
.rm-win {
  background: #fff;
  border: 1px solid var(--line);
  border-radius: 22px;
  overflow: hidden;
  box-shadow: var(--shadow-md);
}
.rm-win-bar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 13px 20px;
  background: var(--bg2);
  border-bottom: 1px solid var(--line);
  gap: 12px;
  flex-wrap: wrap;
}
.rm-win-dots { display: flex; gap: 6px; }
.rm-win-dots i { width: 10px; height: 10px; border-radius: 50%; display: inline-block; }
.rm-win-dots i:nth-child(1) { background: #ff5f56; }
.rm-win-dots i:nth-child(2) { background: #ffbd2e; }
.rm-win-dots i:nth-child(3) { background: #27c93f; }
.rm-win-ttl {
  font-family: 'Outfit', sans-serif;
  font-size: 12px;
  font-weight: 700;
  letter-spacing: 0.08em;
  text-transform: uppercase;
  color: var(--br);
}
.rm-win-body { padding: 24px; }

.rm-filter-group { display: flex; gap: 6px; flex-wrap: wrap; }
.rm-filter-btn {
  padding: 6px 13px;
  border-radius: 99px;
  border: 1px solid var(--line);
  background: #fff;
  color: var(--mute);
  font: 700 12px 'Plus Jakarta Sans', sans-serif;
  cursor: pointer;
  transition: .2s ease;
}
.rm-filter-btn:hover { border-color: var(--br); color: var(--br); }
.rm-filter-btn.active { background: var(--br); color: #fff; border-color: var(--br); }

.rm-floor-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 14px; }
.rm-table-tile {
  padding: 18px 14px;
  border-radius: 16px;
  border: 1.5px solid var(--line);
  text-align: center;
  transition: transform .2s ease, box-shadow .2s ease;
}
.rm-table-tile:hover { transform: translateY(-3px); box-shadow: var(--shadow-sm); }
.rm-table-tile.avail { background: var(--green-bg); border-color: rgba(21,128,61,0.3); color: var(--green); }
.rm-table-tile.occ { background: var(--br-light); border-color: rgba(135,96,57,0.45); color: var(--br); }
.rm-table-tile.res { background: var(--amber-bg); border-color: rgba(180,83,9,0.35); color: var(--amber); }
.rm-table-tile strong { display: block; font-family: 'Outfit', sans-serif; font-size: 17px; font-weight: 600; margin-bottom: 4px; }
.rm-table-tile span { font-size: 12px; font-weight: 700; }

.rm-table-wrap { border: 1px solid var(--line); border-radius: 14px; overflow-x: auto; }
.rm-table { width: 100%; border-collapse: collapse; text-align: left; font-size: 13.5px; }
.rm-table th {
  background: var(--bg2);
  padding: 11px 16px;
  font-size: 11px;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--mute);
  border-bottom: 1px solid var(--line);
}
.rm-table td { padding: 12px 16px; border-bottom: 1px solid rgba(135, 96, 57, 0.08); color: var(--ink); }
.rm-table tr:last-child td { border-bottom: none; }

.rm-split { display: grid; grid-template-columns: 1fr 1.05fr; gap: 36px; align-items: center; }
.rm-split.top { align-items: start; }

/* Editorial Photo Frame */
.fam-photo-frame {
  position: relative;
  border-radius: 22px;
  overflow: hidden;
  border: 1px solid var(--line);
  box-shadow: var(--shadow-md);
  aspect-ratio: 4 / 3;
}
.fam-photo-frame img { width: 100%; height: 100%; object-fit: cover; display: block; transition: transform .5s ease; }
.fam-photo-frame:hover img { transform: scale(1.04); }
.fam-photo-frame::after {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(180deg, transparent 40%, rgba(33, 22, 15, 0.78) 100%);
}
.fam-photo-cap { position: absolute; left: 20px; right: 20px; bottom: 18px; z-index: 2; color: #fff; }
.fam-photo-cap strong { display: block; font-family: 'Outfit', sans-serif; font-size: 18px; font-weight: 600; color: #fff; }
.fam-photo-cap span { font-size: 13px; color: rgba(255, 255, 255, 0.85); }

/* Feature Checklist Rows */
.rm-feat-list { display: flex; flex-direction: column; gap: 11px; }
.rm-feat-row {
  display: flex;
  align-items: center;
  gap: 14px;
  padding: 13px 16px;
  background: #fff;
  border: 1px solid var(--line);
  border-radius: 14px;
  transition: border-color .2s ease, transform .2s ease;
}
.rm-feat-row:hover { border-color: var(--br); transform: translateX(4px); }
.rm-feat-num {
  width: 30px;
  height: 30px;
  border-radius: 9px;
  background: var(--br-light);
  color: var(--br);
  font-family: 'Outfit', sans-serif;
  font-weight: 700;
  font-size: 12.5px;
  display: grid;
  place-items: center;
  flex: none;
}

/* Phone Mockup */
.fam-phone {
  max-width: 310px;
  margin: 0 auto;
  background: #1C1510;
  border-radius: 34px;
  padding: 10px;
  box-shadow: var(--shadow-lg);
}
.fam-phone-scr { background: #fff; border-radius: 26px; padding: 16px 14px; }
.fam-phone-notch { width: 54px; height: 4px; background: #E5DDD4; border-radius: 99px; margin: 0 auto 14px; }

/* Peak Hour Dark Editorial Banner */
.fam-peak-banner {
  position: relative;
  border-radius: 26px;
  overflow: hidden;
  padding: clamp(32px, 4.5vw, 52px);
  color: #fff;
  background: #21160F;
  box-shadow: var(--shadow-lg);
}
.fam-peak-bg { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; opacity: 0.28; }
.fam-peak-scrim { position: absolute; inset: 0; background: linear-gradient(135deg, rgba(33, 22, 15, 0.9) 0%, rgba(111, 78, 45, 0.78) 100%); }
.fam-peak-inner { position: relative; z-index: 2; }
.fam-peak-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; margin-top: 28px; }
.fam-peak-stat {
  background: rgba(255, 255, 255, 0.1);
  backdrop-filter: blur(10px);
  border: 1px solid rgba(255, 255, 255, 0.18);
  border-radius: 16px;
  padding: 20px;
  text-align: center;
}
.fam-peak-stat span { display: block; font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; color: rgba(255, 255, 255, 0.8); }
.fam-peak-stat strong { display: block; font-family: 'Outfit', sans-serif; font-size: 32px; font-weight: 600; color: #fff; margin-top: 4px; }

/* Benefits, Formats, Ecosystem, FAQ, CTA */
.rm-ben-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 22px; }
.rm-ben-card {
  background: #fff;
  border: 1px solid var(--line);
  border-radius: 18px;
  padding: 26px;
  box-shadow: var(--shadow-sm);
  transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
}
.rm-ben-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-md); border-color: rgba(135, 96, 57, 0.34); }
.rm-ben-head { display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px; }
.rm-ben-card h4 { font-size: 18px; font-weight: 700; margin-bottom: 8px; }
.rm-ben-card p { font-size: 14.5px; }

.rm-ind-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 22px; }
.rm-ind-card {
  position: relative;
  border-radius: 20px;
  overflow: hidden;
  min-height: 235px;
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
  padding: 22px;
  border: 1px solid var(--line);
  box-shadow: var(--shadow-sm);
  background: #21160F;
}
.rm-ind-card img { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; transition: transform .55s ease; }
.rm-ind-card:hover img { transform: scale(1.07); }
.rm-ind-scrim { position: absolute; inset: 0; background: linear-gradient(180deg, rgba(33, 22, 15, 0.14) 0%, rgba(33, 22, 15, 0.86) 100%); }
.rm-ind-body { position: relative; z-index: 2; }
.rm-ind-body h4 { color: #fff; font-size: 18px; font-weight: 600; margin-bottom: 5px; }
.rm-ind-body p { color: rgba(255, 255, 255, 0.84); font-size: 13.5px; line-height: 1.5; }

.rm-eco-grid { display: grid; grid-template-columns: repeat(7, 1fr); gap: 12px; }
.rm-eco-card {
  background: #fff;
  border: 1px solid var(--line);
  border-radius: 16px;
  padding: 16px 10px;
  text-align: center;
  transition: .25s ease;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 8px;
}
.rm-eco-card:hover { transform: translateY(-4px); border-color: var(--br); box-shadow: var(--shadow-sm); }
.rm-eco-step { font-size: 10.5px; font-weight: 700; letter-spacing: 0.08em; color: var(--br); }
.rm-eco-img { width: 44px; height: 44px; border-radius: 12px; background: var(--bg2); padding: 6px; object-fit: contain; }
.rm-eco-lbl { font-size: 12.5px; font-weight: 700; color: var(--ink); line-height: 1.25; }

.rm-faq-list { max-width: 860px; margin: 0 auto; display: flex; flex-direction: column; gap: 12px; }
.rm-faq-item { background: #fff; border: 1px solid var(--line); border-radius: 16px; overflow: hidden; transition: border-color .2s, box-shadow .2s; }
.rm-faq-item.open { border-color: var(--br); box-shadow: var(--shadow-sm); }
.rm-faq-q { padding: 18px 22px; font-size: 16px; font-weight: 700; color: var(--ink); cursor: pointer; display: flex; justify-content: space-between; align-items: center; gap: 14px; user-select: none; }
.rm-faq-q svg { width: 18px; height: 18px; stroke: var(--br); transition: transform .25s ease; flex: none; }
.rm-faq-item.open .rm-faq-q svg { transform: rotate(180deg); }
.rm-faq-a { display: none; padding: 14px 22px 20px; font-size: 15px; color: var(--mute); line-height: 1.65; border-top: 1px solid rgba(135, 96, 57, 0.08); }
.rm-faq-item.open .rm-faq-a { display: block; }

.rm-cta {
  padding: clamp(64px, 7vw, 96px) 0;
  background: linear-gradient(135deg, #876039 0%, #6f4e2d 100%);
  color: #fff;
  text-align: center;
  position: relative;
  overflow: hidden;
}
.rm-cta .eb { background: rgba(255, 255, 255, 0.14); border-color: rgba(255, 255, 255, 0.28); color: #fff; }
.rm-cta h2 { color: #fff; font-size: clamp(30px, 4.2vw, 48px); margin-bottom: 16px; }
.rm-cta p { color: rgba(255, 255, 255, 0.88); max-width: 640px; margin: 0 auto 32px; font-size: 17.5px; }
.rm-cta-btns { display: flex; gap: 14px; justify-content: center; flex-wrap: wrap; }
.rm-cta .btn.white { background: #fff; color: var(--br-dark); border-color: #fff; }
.rm-cta .btn.white:hover { background: var(--br-light); transform: translateY(-2px); }
.rm-cta .btn.ghost { background: transparent; color: #fff; border-color: rgba(255, 255, 255, 0.55); }
.rm-cta .btn.ghost:hover { background: rgba(255, 255, 255, 0.14); transform: translateY(-2px); }

@media (max-width: 1080px) {
  .rm-hero-grid, .rm-split { grid-template-columns: 1fr; gap: 32px; }
  .rm-val-grid, .rm-prog-grid-4, .fam-peak-grid { grid-template-columns: repeat(2, 1fr); }
  .rm-eco-grid { grid-template-columns: repeat(4, 1fr); }
}
@media (max-width: 820px) {
  .rm-ben-grid, .rm-ind-grid, .rm-floor-grid { grid-template-columns: 1fr; }
  .rm-eco-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 640px) {
  .w { padding: 0 16px; }
  .rm-val-grid, .rm-prog-grid-4, .fam-peak-grid { grid-template-columns: 1fr; }
  .rm-hero-float { flex-direction: column; align-items: flex-start; }
  .rm-hero-cta .btn, .rm-cta-btns .btn { width: 100%; }
}
</style>

<div class="fam-page">

  <!-- ================= BREADCRUMB ================= -->
  <div class="bc">
    <div class="w">
      <a href="{{ route('home') }}">Home</a>
      <span class="sep">/</span>
      <a href="{{ route('solutions') }}">Solutions</a>
      <span class="sep">/</span>
      <span class="cur">Family Restaurant Solution</span>
    </div>
  </div>

  <!-- ================= 1. HERO SECTION ================= -->
  <section class="rm-hero">
    <div class="w">
      <div class="rm-hero-grid">
        <div>
          <div class="eb">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>
            FAMILY RESTAURANT SOLUTION
          </div>
          <h1>
            Everything Your Family Restaurant Needs.<br>
            <span class="sf">In One Place.</span>
          </h1>
          <p class="rm-hero-sub">
            Manage tables, menus, orders, kitchen operations, billing and customer service through one connected restaurant platform.
          </p>

          <div class="rm-hero-cta">
            <a href="{{ route('restaurant_signup') }}" onclick="if(typeof openPopup === 'function'){ openPopup(); return false; }" class="btn p">Get Started &rarr;</a>
            <a href="{{ route('contact.us') }}" class="btn o">Book a Demo</a>
          </div>

          <div class="rm-hero-stats">
            <div class="rm-hero-stat">
              <strong>Floor View</strong>
              <span>Table Seating</span>
            </div>
            <div class="rm-hero-stat">
              <strong>Group Orders</strong>
              <span>Multi-Item Tickets</span>
            </div>
            <div class="rm-hero-stat">
              <strong>Fast POS</strong>
              <span>Billing &amp; Split Payment</span>
            </div>
          </div>
        </div>

        <div class="rm-hero-media">
          <img src="{{ asset('assets/images/family-restaurant-hero.jpg') }}" alt="Indian family dining together at warm walnut restaurant table with waiter taking order on tablet">
          <div class="rm-hero-scrim"></div>
          <div class="rm-hero-pill">
            <span class="rm-live-dot"></span>
            Main Hall &bull; 12 Avail / 08 Occupied
          </div>
          <div class="rm-hero-float">
            <div class="rm-hero-float-left">
              <div class="rm-hero-float-ico">
                <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
              </div>
              <div>
                <div class="rm-hero-float-ttl">18 Active Orders &bull; 06 KOTs Preparing</div>
                <div class="rm-hero-float-sub">Table T08 (6 Guests) &bull; Today’s Sales &#8377;48,620</div>
              </div>
            </div>
            <span class="rm-hero-float-tag">Peak Dinner Live</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= 2. DINING ROOM CHALLENGES (01-04) ================= -->
  <section class="fam-sec border-b">
    <div class="w">
      <div class="hd r">
        <div class="eb">DINING ROOM REALITY</div>
        <h2>Family Restaurants Have More <span class="sf">to Manage Than the Meal.</span></h2>
        <p>A family restaurant needs to balance guests, tables, orders, kitchen coordination, service and billing — often during busy lunch and dinner hours.</p>
      </div>

      <div class="rm-val-grid r">
        <div class="rm-val-card">
          <div class="rm-val-top">
            <div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg></div>
            <span class="rm-num">01</span>
          </div>
          <h3>Busy Tables</h3>
          <p>Manage different table sizes and guest groups across your dining floor.</p>
        </div>
        <div class="rm-val-card">
          <div class="rm-val-top">
            <div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/></svg></div>
            <span class="rm-num">02</span>
          </div>
          <h3>Large Orders</h3>
          <p>Keep multiple dishes, quantities and special requests organized.</p>
        </div>
        <div class="rm-val-card">
          <div class="rm-val-top">
            <div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M6 13.87A4 4 0 017.41 6a5.11 5.11 0 019.18 0A4 4 0 0118 13.87V21H6v-7.13z"/></svg></div>
            <span class="rm-num">03</span>
          </div>
          <h3>Kitchen Coordination</h3>
          <p>Keep orders moving clearly from the dining floor to the kitchen.</p>
        </div>
        <div class="rm-val-card">
          <div class="rm-val-top">
            <div class="rm-ic"><svg viewBox="0 0 24 24"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="M6 8h12M6 12h8"/></svg></div>
            <span class="rm-num">04</span>
          </div>
          <h3>Fast Billing</h3>
          <p>Give your team a simple workflow for preparing bills and completing payments.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= 3. EFFORTLESS FAMILY DINING JOURNEY ================= -->
  <section class="fam-sec alt">
    <div class="w">
      <div class="hd r">
        <div class="eb">EFFORTLESS DINING</div>
        <h2>Make Every Family Visit <span class="sf">Feel Effortless.</span></h2>
        <p>From the first welcome to the final bill, Geni Menu helps your team stay connected throughout the guest journey.</p>
      </div>

      <div class="rm-split r">
        <div class="fam-photo-frame">
          <img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?auto=format&fit=crop&w=900&q=80" alt="Warm family restaurant dining room atmosphere">
          <div class="fam-photo-cap">
            <strong>Connected Step-by-Step Service</strong>
            <span>Every table, dish, kitchen ticket, and payment in one rhythm.</span>
          </div>
        </div>

        <div class="rm-feat-list">
          <div class="rm-feat-row"><span class="rm-feat-num">01</span><div><strong>Table Assignment &amp; Seating</strong><div style="font-size: 13px; color: var(--mute);">Seat couples, 6-guest families, or 10+ celebrations with live floor clarity.</div></div></div>
          <div class="rm-feat-row"><span class="rm-feat-num">02</span><div><strong>Digital Menu Browsing</strong><div style="font-size: 13px; color: var(--mute);">Families explore veg/non-veg categories, photos &amp; prices right from their table.</div></div></div>
          <div class="rm-feat-row"><span class="rm-feat-num">03</span><div><strong>Order Entry &amp; KOT Routing</strong><div style="font-size: 13px; color: var(--mute);">Large multi-dish orders &amp; spice notes route directly to Curry, Tandoor &amp; Bar stations.</div></div></div>
          <div class="rm-feat-row"><span class="rm-feat-num">04</span><div><strong>Kitchen Preparation &amp; Waiter Requests</strong><div style="font-size: 13px; color: var(--mute);">Guests request water, napkins, or the bill without waving across the hall.</div></div></div>
          <div class="rm-feat-row" style="background: var(--br-light); border-color: var(--br);"><span class="rm-feat-num" style="background: var(--br); color: #fff;">05</span><div><strong style="color: var(--br);">Instant POS Billing &amp; Split Payments</strong><div style="font-size: 13px; color: var(--mute);">GST invoices settled via Cash, Card, or UPI in seconds.</div></div></div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= 4. INTERACTIVE FLOOR PLAN & GROUP ORDER ================= -->
  <section class="fam-sec">
    <div class="w">
      <div class="hd r">
        <div class="eb">DINING FLOOR &amp; GROUP ORDERS</div>
        <h2>Seat Every Family &amp; <span class="sf">Keep Large Orders Clear.</span></h2>
        <p>Filter live table availability from 2-seat tables to 10-guest family booths, and keep multi-item group tickets organized.</p>
      </div>

      <div class="rm-split top r">
        <!-- Interactive Floor Plan -->
        <div class="rm-win">
          <div class="rm-win-bar">
            <div class="rm-win-dots"><i></i><i></i><i></i></div>
            <div class="rm-win-ttl">MAIN DINING HALL PLAN</div>
            <div class="rm-filter-group">
              <button type="button" class="rm-filter-btn active" onclick="filterFloor('all', this)">All</button>
              <button type="button" class="rm-filter-btn" onclick="filterFloor('avail', this)">Available</button>
              <button type="button" class="rm-filter-btn" onclick="filterFloor('occ', this)">Occupied</button>
              <button type="button" class="rm-filter-btn" onclick="filterFloor('res', this)">Reserved</button>
            </div>
          </div>
          <div class="rm-win-body">
            <div class="rm-floor-grid" id="famFloorGrid" style="margin-bottom: 20px;">
              <div class="rm-table-tile avail" data-st="avail"><strong>Table T01</strong><span>2 Seats &bull; Available</span></div>
              <div class="rm-table-tile occ" data-st="occ"><strong>Table T02</strong><span>4 Seats &bull; Family Seated</span></div>
              <div class="rm-table-tile res" data-st="res"><strong>Table T03</strong><span>6 Seats &bull; 07:30 PM</span></div>
              <div class="rm-table-tile occ" data-st="occ"><strong>Table T04</strong><span>8 Seats &bull; Occupied</span></div>
              <div class="rm-table-tile avail" data-st="avail"><strong>Table T05</strong><span>4 Seats &bull; Available</span></div>
              <div class="rm-table-tile avail" data-st="avail"><strong>Table T06</strong><span>10 Seats &bull; Large Family</span></div>
            </div>
            <div style="text-align: center;">
              <a href="{{ route('features.table-management') }}" class="btn o" style="padding: 10px 22px; font-size: 13.5px;">Explore Table Management &rarr;</a>
            </div>
          </div>
        </div>

        <!-- Large Family Group Order Card -->
        <div class="rm-win">
          <div class="rm-win-bar">
            <div class="rm-win-dots"><i></i><i></i><i></i></div>
            <div class="rm-win-ttl">ORDER #ORD-2084 &bull; TABLE T08 (6 GUESTS)</div>
            <span style="padding: 4px 10px; border-radius: 99px; background: var(--green-bg); color: var(--green); font-size: 11px; font-weight: 700;">Confirmed &rarr; KOT #1048</span>
          </div>
          <div class="rm-win-body">
            <div class="rm-table-wrap" style="margin-bottom: 14px;">
              <table class="rm-table">
                <thead><tr><th>Item Name</th><th>Qty</th><th style="text-align: right;">Amount</th></tr></thead>
                <tbody>
                  <tr><td><strong>Chicken Biryani</strong></td><td>&times; 2</td><td style="text-align: right; font-weight: 700;">&#8377;560</td></tr>
                  <tr><td><strong>Paneer Tikka</strong></td><td>&times; 2</td><td style="text-align: right; font-weight: 700;">&#8377;440</td></tr>
                  <tr><td><strong>Butter Naan</strong></td><td>&times; 4</td><td style="text-align: right; font-weight: 700;">&#8377;240</td></tr>
                  <tr><td><strong>Fresh Lime Soda</strong></td><td>&times; 3</td><td style="text-align: right; font-weight: 700;">&#8377;270</td></tr>
                  <tr><td><strong>Gulab Jamun</strong></td><td>&times; 2</td><td style="text-align: right; font-weight: 700;">&#8377;160</td></tr>
                </tbody>
              </table>
            </div>
            <div style="background: var(--amber-bg); border-left: 3px solid var(--amber); padding: 11px 14px; border-radius: 8px; font-size: 12.5px; color: var(--amber); font-weight: 700; margin-bottom: 14px;">
              Notes: Less spicy for children &bull; Extra gravy on side &bull; No onion in Paneer Tikka
            </div>
            <div style="display: flex; justify-content: space-between; align-items: center; padding: 12px 14px; background: var(--br-light); border-radius: 10px;">
              <span style="font-weight: 700;">Total Order Value (Curry &amp; Tandoor)</span>
              <strong style="font-size: 18px; color: var(--br);">&#8377;2,180</strong>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= 5. DIGITAL MENU, WAITER REQUESTS & FAST POS ================= -->
  <section class="fam-sec alt">
    <div class="w">
      <div class="hd r">
        <div class="eb">GUEST SERVICE &amp; CHECKOUT</div>
        <h2>Digital Menu, Table Assistance &amp; <span class="sf">Simple Checkout.</span></h2>
        <p>Let families browse dishes easily, call a waiter with one tap, and settle split Cash + UPI bills without waiting.</p>
      </div>

      <div class="rm-ben-grid r">
        <!-- 1. Digital Menu Phone -->
        <div class="rm-ben-card" style="padding: 22px;">
          <div style="font-size: 11.5px; font-weight: 700; color: var(--br); text-transform: uppercase; margin-bottom: 12px;">01 &bull; Digital QR Menu</div>
          <div style="background: var(--bg2); border-radius: 16px; padding: 14px; border: 1px solid var(--line); margin-bottom: 16px;">
            <div style="display: flex; justify-content: space-between; margin-bottom: 10px; font-size: 12px; font-weight: 700;">
              <span style="color: var(--br);">GENI MENU</span><span>TABLE T08</span>
            </div>
            <div style="display: flex; flex-direction: column; gap: 8px; font-size: 12.5px;">
              <div style="display: flex; justify-content: space-between; background: #fff; padding: 8px 10px; border-radius: 8px;"><span><strong>Chicken Biryani</strong></span><span style="color: var(--br); font-weight: 700;">&#8377;280</span></div>
              <div style="display: flex; justify-content: space-between; background: #fff; padding: 8px 10px; border-radius: 8px;"><span><strong>Paneer Butter Masala</strong></span><span style="color: var(--br); font-weight: 700;">&#8377;240</span></div>
              <div style="display: flex; justify-content: space-between; background: #fff; padding: 8px 10px; border-radius: 8px;"><span><strong>Butter Naan</strong></span><span style="color: var(--br); font-weight: 700;">&#8377;60</span></div>
            </div>
          </div>
          <a href="{{ route('features.menu-management') }}" style="font-size: 13px; font-weight: 700; color: var(--br);">Explore Menu Management &rarr;</a>
        </div>

        <!-- 2. Waiter Request Card -->
        <div class="rm-ben-card" style="padding: 22px;">
          <div style="font-size: 11.5px; font-weight: 700; color: var(--br); text-transform: uppercase; margin-bottom: 12px;">02 &bull; Table-Side Requests</div>
          <div style="background: var(--bg2); border-radius: 16px; padding: 14px; border: 1px solid var(--line); margin-bottom: 16px;">
            <div style="font-size: 12px; font-weight: 700; color: var(--ink); margin-bottom: 10px;">TABLE T08 &bull; Need Assistance?</div>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 8px; margin-bottom: 10px; font-size: 12px; font-weight: 700;">
              <div style="background: #fff; padding: 8px 10px; border-radius: 8px; border: 1px solid var(--line);">Call Waiter</div>
              <div style="background: var(--br-light); color: var(--br); padding: 8px 10px; border-radius: 8px; border: 1.5px solid var(--br);">Extra Water</div>
              <div style="background: #fff; padding: 8px 10px; border-radius: 8px; border: 1px solid var(--line);">Request Bill</div>
              <div style="background: #fff; padding: 8px 10px; border-radius: 8px; border: 1px solid var(--line);">Custom Note</div>
            </div>
            <div style="font-size: 11.5px; color: var(--green); font-weight: 700;">&check; Staff Alerted Instantly</div>
          </div>
          <a href="{{ route('features.waiter-request') }}" style="font-size: 13px; font-weight: 700; color: var(--br);">Explore Waiter Requests &rarr;</a>
        </div>

        <!-- 3. Fast POS Checkout -->
        <div class="rm-ben-card" style="padding: 22px;">
          <div style="font-size: 11.5px; font-weight: 700; color: var(--br); text-transform: uppercase; margin-bottom: 12px;">03 &bull; Fast Split Billing</div>
          <div style="background: var(--bg2); border-radius: 16px; padding: 14px; border: 1px solid var(--line); margin-bottom: 16px; font-size: 12.5px;">
            <div style="display: flex; justify-content: space-between; margin-bottom: 8px;"><strong>INV #4092</strong><span style="color: var(--green); font-weight: 700;">PAID &check;</span></div>
            <div style="display: flex; justify-content: space-between; margin-bottom: 4px;"><span>Subtotal</span><span>&#8377;2,180</span></div>
            <div style="display: flex; justify-content: space-between; color: var(--amber); margin-bottom: 4px;"><span>Discount</span><span>-&#8377;100</span></div>
            <div style="display: flex; justify-content: space-between; margin-bottom: 8px;"><span>GST (5%)</span><span>+&#8377;104</span></div>
            <div style="display: flex; justify-content: space-between; padding: 8px 10px; background: var(--br-light); border-radius: 8px; font-weight: 700; color: var(--br);"><span>Cash &#8377;500 + UPI &#8377;1,684</span><span>&#8377;2,184</span></div>
          </div>
          <a href="{{ route('features.pos-management') }}" style="font-size: 13px; font-weight: 700; color: var(--br);">Explore POS Management &rarr;</a>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= 6. PEAK HOUR EDITORIAL BANNER ================= -->
  <section class="fam-sec">
    <div class="w">
      <div class="fam-peak-banner r">
        <img class="fam-peak-bg" src="https://images.unsplash.com/photo-1544025162-d76694265947?auto=format&fit=crop&w=1400&q=80" alt="Busy Indian family restaurant dinner hour">
        <div class="fam-peak-scrim"></div>
        <div class="fam-peak-inner">
          <div style="text-align: center; max-width: 680px; margin: 0 auto;">
            <div class="eb" style="background: rgba(255,255,255,0.14); border-color: rgba(255,255,255,0.28); color: #fff;">PEAK HOUR CALM</div>
            <h2 style="color: #fff;">Stay Organized When the <span style="font-family: 'Playfair Display', serif; font-style: italic; color: #F2D3A8;">Restaurant Gets Busy.</span></h2>
            <p style="color: rgba(255,255,255,0.85); margin-top: 10px;">Maintain calm, transparent operational control during weekend family dinner rushes across desktop, tablet, and mobile.</p>
          </div>

          <div class="fam-peak-grid">
            <div class="fam-peak-stat"><span>Occupied Tables</span><strong>08</strong></div>
            <div class="fam-peak-stat"><span>Active Orders</span><strong>18</strong></div>
            <div class="fam-peak-stat"><span>Kitchen Prep</span><strong style="color: #FCD34D;">06 KOTs</strong></div>
            <div class="fam-peak-stat"><span>Today's Sales</span><strong style="color: #86EFAC;">&#8377;48,620</strong></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= 7. FAMILY DINING FORMATS (3-COL WITH IMAGE ZOOM) ================= -->
  <section class="fam-sec alt">
    <div class="w">
      <div class="hd r">
        <div class="eb">FAMILY DINING FORMATS</div>
        <h2>Built for Different <span class="sf">Family Dining Formats.</span></h2>
        <p>Whether you operate a single Indian family restaurant or a multi-branch casual dining chain.</p>
      </div>

      <div class="rm-ind-grid r">
        <div class="rm-ind-card"><img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&w=700&q=80" alt="Family Restaurants"><div class="rm-ind-scrim"></div><div class="rm-ind-body"><h4>Family Restaurants</h4><p>Manage large dining groups, multi-item tickets, and table seating.</p></div></div>
        <div class="rm-ind-card"><img src="https://images.unsplash.com/photo-1618160702438-9b02ab6515c9?auto=format&fit=crop&w=700&q=80" alt="Multi-Cuisine Restaurants"><div class="rm-ind-scrim"></div><div class="rm-ind-body"><h4>Multi-Cuisine Restaurants</h4><p>Organize varied menus across Indian, Chinese, Tandoori, and Continental.</p></div></div>
        <div class="rm-ind-card"><img src="https://images.unsplash.com/photo-1585937421612-70a008356fbe?auto=format&fit=crop&w=700&q=80" alt="Indian Restaurants"><div class="rm-ind-scrim"></div><div class="rm-ind-body"><h4>Indian Restaurants</h4><p>Handle classic thalis, biryani orders, and special dining requests.</p></div></div>
        <div class="rm-ind-card"><img src="https://images.unsplash.com/photo-1630383249896-424e482df921?auto=format&fit=crop&w=700&q=80" alt="South Indian Restaurants"><div class="rm-ind-scrim"></div><div class="rm-ind-body"><h4>South Indian Restaurants</h4><p>Manage high-turnover tiffins, dosas, and filter coffee orders.</p></div></div>
        <div class="rm-ind-card"><img src="https://images.unsplash.com/photo-1544025162-d76694265947?auto=format&fit=crop&w=700&q=80" alt="North Indian Restaurants"><div class="rm-ind-scrim"></div><div class="rm-ind-body"><h4>North Indian Restaurants</h4><p>Coordinate tandoor bread, curries, and family platter orders.</p></div></div>
        <div class="rm-ind-card"><img src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?auto=format&fit=crop&w=700&q=80" alt="Veg & Non-Veg Outlets"><div class="rm-ind-scrim"></div><div class="rm-ind-body"><h4>Vegetarian &amp; Non-Veg Outlets</h4><p>Maintain separate kitchen order tickets and item indicators.</p></div></div>
      </div>
    </div>
  </section>

  <!-- ================= 8. KEY ADVANTAGES (3x2 NUMBERED) ================= -->
  <section class="fam-sec">
    <div class="w">
      <div class="hd r">
        <div class="eb">KEY ADVANTAGES</div>
        <h2>Built Around the Way <span class="sf">Family Restaurants Work.</span></h2>
        <p>Simple, reliable technology tailored specifically for high-volume dining operations.</p>
      </div>

      <div class="rm-ben-grid r">
        <div class="rm-ben-card">
          <div class="rm-ben-head"><div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/></svg></div><span class="rm-num">01</span></div>
          <h4>Easy for Staff</h4>
          <p>Simple workflows for everyday restaurant staff operations.</p>
        </div>
        <div class="rm-ben-card">
          <div class="rm-ben-head"><div class="rm-ic"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><line x1="9" y1="3" x2="9" y2="21"/></svg></div><span class="rm-num">02</span></div>
          <h4>Better Table Visibility</h4>
          <p>Know what is happening across your entire dining floor.</p>
        </div>
        <div class="rm-ben-card">
          <div class="rm-ben-head"><div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/></svg></div><span class="rm-num">03</span></div>
          <h4>Organized Large Orders</h4>
          <p>Keep family and group orders clear from table to kitchen.</p>
        </div>
        <div class="rm-ben-card">
          <div class="rm-ben-head"><div class="rm-ic"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/></svg></div><span class="rm-num">04</span></div>
          <h4>Connected Operations</h4>
          <p>Bring menu, tables, orders, kitchen and billing together.</p>
        </div>
        <div class="rm-ben-card">
          <div class="rm-ben-head"><div class="rm-ic"><svg viewBox="0 0 24 24"><path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9"/></svg></div><span class="rm-num">05</span></div>
          <h4>Better Guest Experience</h4>
          <p>Make every stage of the family dining journey easier to manage.</p>
        </div>
        <div class="rm-ben-card">
          <div class="rm-ben-head"><div class="rm-ic"><svg viewBox="0 0 24 24"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></div><span class="rm-num">06</span></div>
          <h4>Business Visibility</h4>
          <p>Understand restaurant activity through connected reports.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= 9. CONNECTED ECOSYSTEM (7-STEP) ================= -->
  <section class="fam-sec alt">
    <div class="w">
      <div class="hd r">
        <div class="eb">CONNECTED ECOSYSTEM</div>
        <h2>Your Restaurant Is <span class="sf">More Than a Menu.</span></h2>
        <p>Every table, order, kitchen ticket, payment and customer interaction is part of one dining experience with Geni Menu.</p>
      </div>

      <div class="rm-eco-grid r">
        <a href="{{ route('features.menu-management') }}" class="rm-eco-card"><span class="rm-eco-step">01</span><img class="rm-eco-img" src="{{ asset('assets/images/workflow/step-1-menu.png') }}" alt="Digital Menu"><span class="rm-eco-lbl">Digital Menu</span></a>
        <a href="{{ route('features.table-management') }}" class="rm-eco-card"><span class="rm-eco-step">02</span><img class="rm-eco-img" src="{{ asset('assets/images/workflow/step-4-table.png') }}" alt="Tables"><span class="rm-eco-lbl">Table &amp; Floor</span></a>
        <a href="{{ route('features.order-management') }}" class="rm-eco-card"><span class="rm-eco-step">03</span><img class="rm-eco-img" src="{{ asset('assets/images/workflow/step-2-order.png') }}" alt="Orders"><span class="rm-eco-lbl">Order Flow</span></a>
        <a href="{{ route('features.kot-management') }}" class="rm-eco-card"><span class="rm-eco-step">04</span><img class="rm-eco-img" src="{{ asset('assets/images/workflow/step-3-kitchen.png') }}" alt="KOT"><span class="rm-eco-lbl">KOT &amp; Kitchen</span></a>
        <a href="{{ route('features.pos-management') }}" class="rm-eco-card"><span class="rm-eco-step">05</span><img class="rm-eco-img" src="{{ asset('assets/images/workflow/step-5-billing.png') }}" alt="POS"><span class="rm-eco-lbl">POS Billing</span></a>
        <a href="{{ route('features.inventory-management') }}" class="rm-eco-card"><span class="rm-eco-step">06</span><img class="rm-eco-img" src="{{ asset('assets/images/workflow/step-6-payment.png') }}" alt="Inventory"><span class="rm-eco-lbl">Inventory</span></a>
        <a href="{{ route('features.reports') }}" class="rm-eco-card"><span class="rm-eco-step">07</span><img class="rm-eco-img" src="{{ asset('assets/images/workflow/step-7-reports.png') }}" alt="Reports"><span class="rm-eco-lbl">Reports</span></a>
      </div>
    </div>
  </section>

  <!-- ================= 10. FAQ (ALL 12 PRESERVED) ================= -->
  <section class="fam-sec">
    <div class="w">
      <div class="hd r">
        <div class="eb">FREQUENTLY ASKED QUESTIONS</div>
        <h2>Family Restaurant Solution <span class="sf">FAQ.</span></h2>
        <p>Common questions about managing family restaurants with Geni Menu.</p>
      </div>

      <div class="rm-faq-list r">
        <div class="rm-faq-item open"><div class="rm-faq-q" onclick="toggleFaq(this)">1. Is Geni Menu suitable for family restaurants?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div><div class="rm-faq-a">Yes. Geni Menu is built to handle the operational flow of family restaurants, connecting table management, multi-item order routing, kitchen tickets, and fast POS billing into one system.</div></div>
        <div class="rm-faq-item"><div class="rm-faq-q" onclick="toggleFaq(this)">2. Can family restaurants manage different table sizes?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div><div class="rm-faq-a">Yes. The visual floor plan lets managers configure tables for 2, 4, 6, 8, or 10+ guests with real-time occupancy status.</div></div>
        <div class="rm-faq-item"><div class="rm-faq-q" onclick="toggleFaq(this)">3. Can large family orders be managed?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div><div class="rm-faq-a">Yes. Large orders with multiple dishes, quantities, and preparation notes (like spice levels or gravy preferences) are logged clearly.</div></div>
        <div class="rm-faq-item"><div class="rm-faq-q" onclick="toggleFaq(this)">4. Can dine-in orders be connected to tables?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div><div class="rm-faq-a">Yes. Every order is mapped directly to a specific table ID so staff always know where items should be served.</div></div>
        <div class="rm-faq-item"><div class="rm-faq-q" onclick="toggleFaq(this)">5. Can guests access the digital menu?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div><div class="rm-faq-a">Yes. Guests can scan table QR codes to browse categories, dish images, and prices on their mobile phones.</div></div>
        <div class="rm-faq-item"><div class="rm-faq-q" onclick="toggleFaq(this)">6. Can customers request waiter assistance?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div><div class="rm-faq-a">Yes. Guests can request water, the bill, or general assistance from their table, sending alerts to floor staff.</div></div>
        <div class="rm-faq-item"><div class="rm-faq-q" onclick="toggleFaq(this)">7. Does Geni Menu connect orders with the kitchen?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div><div class="rm-faq-a">Yes. Orders generate Kitchen Order Tickets (KOT) sent instantly to kitchen display monitors or printed receipts.</div></div>
        <div class="rm-faq-item"><div class="rm-faq-q" onclick="toggleFaq(this)">8. Can family restaurants manage billing and payments?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div><div class="rm-faq-a">Yes. POS billing handles discounts, GST tax, invoices, and payment completion via Cash, Card, or UPI.</div></div>
        <div class="rm-faq-item"><div class="rm-faq-q" onclick="toggleFaq(this)">9. Can restaurant owners view sales and order reports?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div><div class="rm-faq-a">Yes. Comprehensive reports display total sales, order volume, peak hours, and top-selling dishes.</div></div>
        <div class="rm-faq-item"><div class="rm-faq-q" onclick="toggleFaq(this)">10. Can Geni Menu support multi-branch family restaurants?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div><div class="rm-faq-a">Yes. Multi-branch restaurants can view sales and performance across different branch locations from a central dashboard.</div></div>
        <div class="rm-faq-item"><div class="rm-faq-q" onclick="toggleFaq(this)">11. Can Geni Menu work for vegetarian and non-vegetarian restaurants?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div><div class="rm-faq-a">Yes. Menus support vegetarian/non-vegetarian tags and separate kitchen routing if required.</div></div>
        <div class="rm-faq-item"><div class="rm-faq-q" onclick="toggleFaq(this)">12. Can Geni Menu be used by small family restaurants?<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg></div><div class="rm-faq-a">Yes. Geni Menu is flexible and straightforward, making it accessible for small family eateries as well as larger dining halls.</div></div>
      </div>
    </div>
  </section>

  <!-- ================= 11. FINAL CTA ================= -->
  <section class="rm-cta">
    <div class="w">
      <div class="eb">READY TO TRANSFORM YOUR RESTAURANT?</div>
      <h2>Run Your Family Restaurant <span style="font-family: 'Playfair Display', serif; font-style: italic; color: #F5E1C8;">With More Clarity.</span></h2>
      <p>Bring your menu, tables, orders, kitchen, billing and restaurant operations together with Geni Menu.</p>
      <div class="rm-cta-btns">
        <a href="{{ route('restaurant_signup') }}" onclick="if(typeof openPopup === 'function'){ openPopup(); return false; }" class="btn white">Get Started &rarr;</a>
        <a href="{{ route('contact.us') }}" class="btn ghost">Book a Demo</a>
      </div>
    </div>
  </section>

</div>

<script>
// Scroll reveal
(function() {
  const els = document.querySelectorAll('.fam-page .r');
  if (!('IntersectionObserver' in window)) {
    els.forEach(el => el.classList.add('on'));
    return;
  }
  const io = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        e.target.classList.add('on');
        io.unobserve(e.target);
      }
    });
  }, { threshold: 0.08 });
  els.forEach(el => io.observe(el));
})();

// Floor Filter
function filterFloor(status, btn) {
  btn.parentElement.querySelectorAll('.rm-filter-btn').forEach(b => b.classList.remove('active'));
  btn.classList.add('active');
  document.querySelectorAll('#famFloorGrid .rm-table-tile').forEach(tile => {
    tile.style.display = (status === 'all' || tile.getAttribute('data-st') === status) ? '' : 'none';
  });
}

// FAQ Accordion
function toggleFaq(el) {
  const item = el.parentElement;
  const isOpen = item.classList.contains('open');
  document.querySelectorAll('.rm-faq-item').forEach(i => i.classList.remove('open'));
  if (!isOpen) item.classList.add('open');
}
</script>

@endsection
