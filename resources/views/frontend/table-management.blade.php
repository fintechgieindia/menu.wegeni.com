@extends('layouts.frontend-master')

@section('content')

{{-- Google Fonts --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@500;600;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Playfair+Display:ital,wght@1,600;1,700&display=swap" rel="stylesheet">

<style>
/* Hide legacy default header/footer if present in master layout */
/* Master header and footer active */

:root {
  --br: #876039;
  --br-dark: #6f4e2d;
  --br-light: #f4efe9;
  --br-gold: #b88e56;
  --bg: #ffffff;
  --bg2: #f9f6f0;
  --bg3: #f3ece1;
  --ink: #241A14;
  --mute: #6F665E;
  --line: rgba(135, 96, 57, 0.14);
  --card: #ffffff;
  --shadow-sm: 0 4px 20px rgba(36, 26, 20, 0.04);
  --shadow-md: 0 16px 40px rgba(36, 26, 20, 0.08);
  --shadow-lg: 0 26px 50px rgba(36, 26, 20, 0.12);
  --green: #10B981;
  --blue: #3B82F6;
  --yellow: #F59E0B;
  --amber: #f59e0b;
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

h1, h2, h3, h4, h5 {
  margin: 0;
  font-family: 'Outfit', 'Plus Jakarta Sans', sans-serif;
  font-weight: 500;
  line-height: 1.14;
  letter-spacing: -0.03em;
  color: var(--ink);
}
h1 { font-size: clamp(34px, 4.8vw, 58px); }
h2 { font-size: clamp(28px, 3.6vw, 44px); }
h3 { font-size: 20px; font-weight: 700; }
p { margin: 0; color: var(--mute); font-size: 16px; line-height: 1.65; }
a { color: inherit; text-decoration: none; }
ul { list-style: none; margin: 0; padding: 0; }

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
section { padding: clamp(56px, 7vw, 96px) 0; background: var(--bg); position: relative; overflow: hidden; }
.hd { max-width: 740px; margin: 0 auto 52px; text-align: center; }
.hd p { margin-top: 14px; font-size: 17px; }

/* ===================== BUTTONS ===================== */
.btn { display: inline-flex; align-items: center; justify-content: center; gap: 8px; padding: 14px 28px; border-radius: 12px; font: 700 15px 'Plus Jakarta Sans', sans-serif; border: 1.5px solid var(--br); transition: .25s ease; cursor: pointer; text-decoration: none; }
.btn.p { background: linear-gradient(135deg, #876039 0%, #a87646 100%); color: #fff; box-shadow: 0 4px 16px rgba(135,96,57,0.28); }
.btn.p:hover { transform: translateY(-2px); background: linear-gradient(135deg, #6f4e2d 0%, #876039 100%); box-shadow: 0 8px 24px rgba(135,96,57,0.38); }
.btn.o { color: var(--br); background: #fff; }
.btn.o:hover { background: var(--br); color: #fff; transform: translateY(-2px); }

/* ===================== BREADCRUMB ===================== */
.bc { padding: 18px 0 16px; background: var(--bg2); border-bottom: 1px solid var(--line); font-size: 14px; color: var(--mute); font-weight: 600; }
.bc .w { display: flex; align-items: center; gap: 8px; flex-wrap: wrap; }
.bc a { color: var(--mute); transition: color .2s; }
.bc a:hover { color: var(--br); }
.bc span.cur { color: var(--br); font-weight: 700; }

/* ===================== CARDS & FLOOR MAP COMPONENTS ===================== */
.card { position: relative; overflow: hidden; background: var(--card); border: 1px solid var(--line); border-radius: 20px; box-shadow: var(--shadow-sm); transition: transform .3s ease, box-shadow .3s ease, border-color .3s ease; }
.card:hover { border-color: rgba(135,96,57,0.3); box-shadow: var(--shadow-md); }

.ic { width: 46px; height: 46px; border-radius: 13px; background: var(--bg2); color: var(--br); display: grid; place-items: center; flex: none; border: 1px solid var(--line); transition: .3s ease; }
.ic svg { width: 22px; height: 22px; fill: none; stroke: currentColor; stroke-width: 1.8; stroke-linecap: round; stroke-linejoin: round; }
.card:hover .ic { background: var(--br); color: #fff; border-color: var(--br); }

.win { background: #fff; color: var(--ink); border: 1px solid var(--line); border-radius: 20px; overflow: hidden; box-shadow: var(--shadow-md); font-size: 13px; }
.wb { display: flex; align-items: center; justify-content: space-between; padding: 12px 18px; background: var(--bg2); border-bottom: 1px solid var(--line); flex-wrap: wrap; gap: 8px; }
.wb .dots { display: flex; gap: 6px; }
.wb i { width: 10px; height: 10px; border-radius: 50%; display: inline-block; }
.wb i:nth-child(1) { background: #ff5f56; }
.wb i:nth-child(2) { background: #ffbd2e; }
.wb i:nth-child(3) { background: #27c93f; }
.wb .ttl { color: var(--br); font-weight: 500; font-family: 'Outfit', sans-serif; letter-spacing: 0.05em; font-size: 12px; text-transform: uppercase; }

.badge { font-size: 11px; font-weight: 500; padding: 4px 10px; border-radius: 8px; text-transform: uppercase; display: inline-block; letter-spacing: .04em; }
.badge.avail { background: #d1fae5; color: #065f46; }
.badge.reserved { background: var(--br-light); color: var(--br); }
.badge.occupied { background: #dbeafe; color: #1e40af; }
.badge.cleaning { background: #fef3c7; color: #92400e; }

/* Table Map Element Styles */
.t-node { border-radius: 14px; border: 2px solid; padding: 14px; text-align: center; position: relative; transition: transform .2s, box-shadow .2s; cursor: pointer; }
.t-node:hover { transform: translateY(-3px); box-shadow: var(--shadow-md); }
.t-node.avail { border-color: var(--green); background: #ecfdf5; }
.t-node.reserved { border-color: var(--br); background: var(--br-light); }
.t-node.occupied { border-color: var(--blue); background: #eff6ff; }
.t-node.cleaning { border-color: var(--amber); background: #fffbeb; }

.t-num { font-weight: 500; font-size: 16px; font-family: 'Outfit', sans-serif; color: var(--ink); }
.t-sub { font-size: 11px; color: var(--mute); margin-top: 2px; }
.t-tag { font-size: 10px; font-weight: 500; text-transform: uppercase; padding: 2px 8px; border-radius: 4px; margin-top: 6px; display: inline-block; }
.t-node.avail .t-tag { background: #d1fae5; color: #065f46; }
.t-node.reserved .t-tag { background: var(--br); color: #fff; }
.t-node.occupied .t-tag { background: #dbeafe; color: #1e40af; }
.t-node.cleaning .t-tag { background: #fef3c7; color: #92400e; }

/* Chairs representation */
.t-chairs { display: flex; justify-content: center; gap: 4px; margin-top: 8px; }
.t-chair { width: 7px; height: 7px; border-radius: 50%; background: currentColor; opacity: 0.5; }

/* Industry Grid */
.ind-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }
.ind-card { border-radius: 18px; overflow: hidden; background: #fff; border: 1px solid var(--line); transition: transform .3s, box-shadow .3s; }
.ind-card:hover { transform: translateY(-5px); box-shadow: var(--shadow-md); border-color: rgba(135,96,57,0.3); }
.ind-img { height: 180px; background-size: cover; background-position: center; position: relative; }
.ind-overlay { position: absolute; inset: 0; background: linear-gradient(180deg, transparent 30%, rgba(36,26,20,0.88) 100%); }
.ind-icon { position: absolute; bottom: 14px; left: 16px; width: 36px; height: 36px; border-radius: 10px; background: rgba(255,255,255,0.18); backdrop-filter: blur(8px); display: grid; place-items: center; color: #fff; border: 1px solid rgba(255,255,255,0.25); }
.ind-icon svg { width: 18px; height: 18px; fill: none; stroke: currentColor; stroke-width: 2; }
.ind-content { padding: 20px; }
.ind-content h4 { font-size: 18px; margin-bottom: 6px; }
.ind-content p { font-size: 14px; }

/* FAQ */
.faq-list { max-width: 860px; margin: 0 auto; display: flex; flex-direction: column; gap: 14px; }
.faq-item { background: #fff; border: 1px solid var(--line); border-radius: 16px; overflow: hidden; transition: border-color .2s, box-shadow .2s; }
.faq-item.open { border-color: var(--br); box-shadow: 0 4px 20px rgba(135,96,57,0.1); }
.faq-q { padding: 20px 24px; font-size: 17px; font-weight: 700; color: var(--ink); cursor: pointer; display: flex; justify-content: space-between; align-items: center; user-select: none; gap: 12px; }
.faq-q svg { width: 20px; height: 20px; transition: transform .3s; stroke: var(--br); flex: none; }
.faq-item.open .faq-q svg { transform: rotate(180deg); }
.faq-a { padding: 0 24px; max-height: 0; overflow: hidden; transition: max-height .4s ease, padding .3s; font-size: 15px; color: var(--mute); line-height: 1.65; }
.faq-item.open .faq-a { max-height: 240px; padding: 16px 24px 20px; border-top: 1px solid rgba(135,96,57,0.08); }

/* Bar Chart */
.bar-chart { display: flex; flex-direction: column; gap: 14px; }
.bar-row { display: flex; align-items: center; gap: 14px; font-size: 13px; font-weight: 700; }
.bar-label { width: 70px; color: var(--mute); font-size: 12px; text-align: right; flex: none; }
.bar-track { flex: 1; height: 12px; background: #e2d5c0; border-radius: 6px; overflow: hidden; }
.bar-fill { height: 100%; background: linear-gradient(90deg, #876039 0%, #a87646 100%); border-radius: 6px; transition: width 1.2s cubic-bezier(0.16, 1, 0.3, 1); width: 0; }
.bar-count { width: 80px; font-size: 12px; color: var(--ink); font-weight: 700; flex: none; }

/* Responsive Grid helpers */
.g2 { display: grid; grid-template-columns: 1fr 1fr; gap: 40px; align-items: center; }
.g3 { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }
.g4 { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; }

@media (max-width: 992px) {
  .g2, .g3, .g4, .ind-grid { grid-template-columns: 1fr !important; gap: 24px !important; }
}
@media (max-width: 768px) {
  .bc { padding: 14px 0 14px; }
  .w { padding: 0 16px; }
  .win { min-width: 0 !important; width: 100%; overflow-x: auto; }
}
@media (max-width: 480px) {
  .btn { width: 100%; }
}
</style>



<!-- ================= BREADCRUMB ================= -->
<div class="bc">
  <div class="w">
    <a href="{{ route('home') }}">Home</a>
    <span>/</span>
    <a href="{{ route('features') }}">Features</a>
    <span>/</span>
    <span class="cur">Table Management</span>
  </div>
</div>

<!-- ================= HERO SECTION ================= -->
<section style="padding: 60px 0 80px; background: linear-gradient(180deg, #f9f6f0 0%, #ffffff 100%);">
  <div class="w">
    <div style="text-align: center; max-width: 820px; margin: 0 auto 48px;">
      <div class="eb">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect x="3" y="3" width="18" height="18" rx="2"/><line x1="9" y1="3" x2="9" y2="21"/><line x1="15" y1="3" x2="15" y2="21"/></svg>
        TABLE MANAGEMENT
      </div>
      <h1 style="margin-bottom: 20px;">
        Know Every Table. <br><span class="sf">Manage Every Seat.</span>
      </h1>
      <p style="font-size: 19px; max-width: 720px; margin: 0 auto 32px; color: var(--mute);">
        Visualize your restaurant floor, track table availability and manage seating with a clear, connected table management system built for modern restaurants.
      </p>
      <div style="display: flex; align-items: center; justify-content: center; gap: 16px; flex-wrap: wrap;">
        <a href="{{ route('restaurant_signup') }}" class="btn p" style="padding: 16px 36px; font-size: 16px;">Get Started →</a>
        <a href="{{ route('contact.us') }}" class="btn o" style="padding: 16px 32px; font-size: 16px;">Book a Demo</a>
      </div>
    </div>

    <!-- Hero Visual: Realistic Digital Restaurant Floor Plan -->
    <div class="win" style="border: 1.5px solid var(--line); box-shadow: 0 26px 60px rgba(36,26,20,0.14);">
      <!-- App Header Bar -->
      <div class="wb">
        <div class="dots"><i></i><i></i><i></i></div>
        <div class="ttl">GENI MENU — DINING ROOM FLOOR PLAN</div>
        <div style="display: flex; gap: 12px; align-items: center;">
          <span style="font-size: 12px; font-weight: 700; color: var(--br);">MAIN DINING HALL</span>
          <span style="width: 8px; height: 8px; border-radius: 50%; background: var(--green);"></span>
        </div>
      </div>

      <!-- Floor Plan Summary Header Bar -->
      <div style="background: #1e140e; color: #fff; padding: 14px 24px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 16px;">
        <div style="display: flex; align-items: center; gap: 20px; font-size: 13.5px; font-weight: 700;">
          <span>12 Tables Total</span>
          <span style="color: #6ee7b7;">• 05 Available</span>
          <span style="color: #93c5fd;">• 03 Occupied</span>
          <span style="color: #fcd34d;">• 02 Reserved</span>
          <span style="color: #fdba74;">• 02 Cleaning</span>
        </div>
        <div style="display: flex; gap: 8px;">
          <button style="background: rgba(255,255,255,0.12); color: #fff; border: 1px solid rgba(255,255,255,0.2); padding: 5px 12px; border-radius: 6px; font-size: 12px; font-weight: 700; cursor: pointer;">+ Add Table</button>
          <button style="background: var(--br); color: #fff; border: 0; padding: 5px 12px; border-radius: 6px; font-size: 12px; font-weight: 700; cursor: pointer;">Filter View ▾</button>
        </div>
      </div>

      <!-- Live Floor Plan Grid View -->
      <div style="padding: 32px; background: #faf8f5;">
        <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-bottom: 24px;">
          <!-- T01 -->
          <div class="t-node avail">
            <div class="t-num">T01</div>
            <div class="t-sub">2 Seats · Window</div>
            <span class="t-tag">Available</span>
            <div class="t-chairs"><i class="t-chair"></i><i class="t-chair"></i></div>
          </div>

          <!-- T02 -->
          <div class="t-node reserved">
            <div class="t-num">T02</div>
            <div class="t-sub">4 Seats · 7:30 PM</div>
            <span class="t-tag">Reserved</span>
            <div class="t-chairs"><i class="t-chair"></i><i class="t-chair"></i><i class="t-chair"></i><i class="t-chair"></i></div>
          </div>

          <!-- T03 -->
          <div class="t-node occupied">
            <div class="t-num">T03</div>
            <div class="t-sub">4 Guests Seated</div>
            <span class="t-tag">Occupied</span>
            <div class="t-chairs"><i class="t-chair"></i><i class="t-chair"></i><i class="t-chair"></i><i class="t-chair"></i></div>
          </div>

          <!-- T04 -->
          <div class="t-node cleaning">
            <div class="t-num">T04</div>
            <div class="t-sub">4 Seats · Busser</div>
            <span class="t-tag">Cleaning</span>
            <div class="t-chairs"><i class="t-chair"></i><i class="t-chair"></i><i class="t-chair"></i><i class="t-chair"></i></div>
          </div>

          <!-- T05 -->
          <div class="t-node avail">
            <div class="t-num">T05</div>
            <div class="t-sub">6 Seats · Family</div>
            <span class="t-tag">Available</span>
            <div class="t-chairs"><i class="t-chair"></i><i class="t-chair"></i><i class="t-chair"></i><i class="t-chair"></i><i class="t-chair"></i><i class="t-chair"></i></div>
          </div>

          <!-- T06 -->
          <div class="t-node occupied">
            <div class="t-num">T06</div>
            <div class="t-sub">2 Guests Seated</div>
            <span class="t-tag">Occupied</span>
            <div class="t-chairs"><i class="t-chair"></i><i class="t-chair"></i></div>
          </div>

          <!-- T07 -->
          <div class="t-node avail">
            <div class="t-num">T07</div>
            <div class="t-sub">4 Seats · Center</div>
            <span class="t-tag">Available</span>
            <div class="t-chairs"><i class="t-chair"></i><i class="t-chair"></i><i class="t-chair"></i><i class="t-chair"></i></div>
          </div>

          <!-- T08 -->
          <div class="t-node reserved">
            <div class="t-num">T08</div>
            <div class="t-sub">6 Seats · 8:15 PM</div>
            <span class="t-tag">Reserved</span>
            <div class="t-chairs"><i class="t-chair"></i><i class="t-chair"></i><i class="t-chair"></i><i class="t-chair"></i><i class="t-chair"></i><i class="t-chair"></i></div>
          </div>

          <!-- T09 -->
          <div class="t-node occupied">
            <div class="t-num">T09</div>
            <div class="t-sub">3 Guests · Order #2048</div>
            <span class="t-tag">Occupied</span>
            <div class="t-chairs"><i class="t-chair"></i><i class="t-chair"></i><i class="t-chair"></i></div>
          </div>

          <!-- T10 -->
          <div class="t-node avail">
            <div class="t-num">T10</div>
            <div class="t-sub">2 Seats · Booth</div>
            <span class="t-tag">Available</span>
            <div class="t-chairs"><i class="t-chair"></i><i class="t-chair"></i></div>
          </div>

          <!-- T11 -->
          <div class="t-node cleaning">
            <div class="t-num">T11</div>
            <div class="t-sub">2 Seats · Resetting</div>
            <span class="t-tag">Cleaning</span>
            <div class="t-chairs"><i class="t-chair"></i><i class="t-chair"></i></div>
          </div>

          <!-- T12 -->
          <div class="t-node avail">
            <div class="t-num">T12</div>
            <div class="t-sub">8 Seats · Large Oval</div>
            <span class="t-tag">Available</span>
            <div class="t-chairs"><i class="t-chair"></i><i class="t-chair"></i><i class="t-chair"></i><i class="t-chair"></i><i class="t-chair"></i><i class="t-chair"></i><i class="t-chair"></i><i class="t-chair"></i></div>
          </div>
        </div>

        <!-- Legend Footer Bar -->
        <div style="display: flex; justify-content: center; gap: 24px; font-size: 13px; font-weight: 700; color: var(--mute); border-top: 1px dashed var(--line); padding-top: 16px;">
          <span style="display: flex; align-items: center; gap: 6px;"><i style="width: 10px; height: 10px; border-radius: 50%; background: var(--green); display: inline-block;"></i> Available</span>
          <span style="display: flex; align-items: center; gap: 6px;"><i style="width: 10px; height: 10px; border-radius: 50%; background: var(--br); display: inline-block;"></i> Reserved</span>
          <span style="display: flex; align-items: center; gap: 6px;"><i style="width: 10px; height: 10px; border-radius: 50%; background: var(--blue); display: inline-block;"></i> Occupied</span>
          <span style="display: flex; align-items: center; gap: 6px;"><i style="width: 10px; height: 10px; border-radius: 50%; background: var(--amber); display: inline-block;"></i> Cleaning</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= VALUE STRIP ================= -->
<section style="padding: 40px 0; background: var(--bg2); border-y: 1px solid var(--line);">
  <div class="w">
    <div class="g4">
      <div style="display: flex; gap: 16px; align-items: flex-start;">
        <div style="font-family: 'Outfit', sans-serif; font-size: 28px; font-weight: 500; color: var(--br-gold); line-height: 1;">01</div>
        <div>
          <h4 style="font-size: 16px; margin-bottom: 4px;">Live Table Visibility</h4>
          <p style="font-size: 13.5px; line-height: 1.5;">See your restaurant tables and their current status at a glance.</p>
        </div>
      </div>

      <div style="display: flex; gap: 16px; align-items: flex-start;">
        <div style="font-family: 'Outfit', sans-serif; font-size: 28px; font-weight: 500; color: var(--br-gold); line-height: 1;">02</div>
        <div>
          <h4 style="font-size: 16px; margin-bottom: 4px;">Smarter Seating</h4>
          <p style="font-size: 13.5px; line-height: 1.5;">Assign guests to suitable tables based on availability and seating.</p>
        </div>
      </div>

      <div style="display: flex; gap: 16px; align-items: flex-start;">
        <div style="font-family: 'Outfit', sans-serif; font-size: 28px; font-weight: 500; color: var(--br-gold); line-height: 1;">03</div>
        <div>
          <h4 style="font-size: 16px; margin-bottom: 4px;">Better Floor Control</h4>
          <p style="font-size: 13.5px; line-height: 1.5;">Keep your dining areas organized throughout lunch and dinner service.</p>
        </div>
      </div>

      <div style="display: flex; gap: 16px; align-items: flex-start;">
        <div style="font-family: 'Outfit', sans-serif; font-size: 28px; font-weight: 500; color: var(--br-gold); line-height: 1;">04</div>
        <div>
          <h4 style="font-size: 16px; margin-bottom: 4px;">Connected Operations</h4>
          <p style="font-size: 13.5px; line-height: 1.5;">Connect tables with reservations, orders, billing and restaurant operations.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= PROBLEM SECTION ================= -->
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">OPERATIONAL COMPARISON</div>
      <h2>Your Dining Room Should <span class="sf">Never Feel Unorganized.</span></h2>
      <p>During peak evening hours, manual floor checks cause seating bottlenecks at your entrance. Compare traditional table management against Geni Menu.</p>
    </div>

    <div class="g2">
      <!-- Traditional Table Management -->
      <div class="card" style="padding: 32px; background: #fff5f5; border-color: rgba(239, 68, 68, 0.2);">
        <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 20px;">
          <div style="width: 40px; height: 40px; border-radius: 10px; background: #fee2e2; color: #dc2626; display: grid; place-items: center; font-weight: 500;">✕</div>
          <div>
            <h3 style="color: #991b1b;">Traditional Table Management</h3>
            <p style="font-size: 13px; color: #b91c1c;">Manual & Paper-Based Floor Operations</p>
          </div>
        </div>

        <ul style="display: flex; flex-direction: column; gap: 14px;">
          <li style="display: flex; gap: 12px; font-size: 14px; color: #7f1d1d;">
            <span style="color: #dc2626; font-weight: 500;">•</span> Staff physically walking across dining hall to check open tables
          </li>
          <li style="display: flex; gap: 12px; font-size: 14px; color: #7f1d1d;">
            <span style="color: #dc2626; font-weight: 500;">•</span> Reservation confusion with double-booked or misplaced tables
          </li>
          <li style="display: flex; gap: 12px; font-size: 14px; color: #7f1d1d;">
            <span style="color: #dc2626; font-weight: 500;">•</span> Limited visibility between host stand, waiters, and kitchen
          </li>
          <li style="display: flex; gap: 12px; font-size: 14px; color: #7f1d1d;">
            <span style="color: #dc2626; font-weight: 500;">•</span> Difficult peak-hour seating coordination causing long guest wait times
          </li>
        </ul>
      </div>

      <!-- With Geni Menu -->
      <div class="card" style="padding: 32px; background: #f0fdf4; border-color: rgba(16, 185, 129, 0.3);">
        <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 20px;">
          <div style="width: 40px; height: 40px; border-radius: 10px; background: #d1fae5; color: #059669; display: grid; place-items: center; font-weight: 500;">✓</div>
          <div>
            <h3 style="color: #065f46;">With Geni Menu</h3>
            <p style="font-size: 13px; color: #047857;">Real-time Connected Floor Map</p>
          </div>
        </div>

        <ul style="display: flex; flex-direction: column; gap: 14px;">
          <li style="display: flex; gap: 12px; font-size: 14px; color: #064e3b;">
            <span style="color: #10b981; font-weight: 500;">✓</span> Digital floor plan updated live across tablets and staff devices
          </li>
          <li style="display: flex; gap: 12px; font-size: 14px; color: #064e3b;">
            <span style="color: #10b981; font-weight: 500;">✓</span> Clear table status badges (Available, Reserved, Occupied, Cleaning)
          </li>
          <li style="display: flex; gap: 12px; font-size: 14px; color: #064e3b;">
            <span style="color: #10b981; font-weight: 500;">✓</span> Automatic reservation sync ensuring booked tables stay reserved
          </li>
          <li style="display: flex; gap: 12px; font-size: 14px; color: #064e3b;">
            <span style="color: #10b981; font-weight: 500;">✓</span> Effortless guest seating coordination during peak dining rushes
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ================= RESTAURANT FLOOR PLAN SHOWCASE ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">DIGITAL FLOOR MAP</div>
      <h2>See Your Entire Dining Floor <span class="sf">at a Glance.</span></h2>
      <p>Turn your restaurant layout into a clear digital floor plan so your team can understand table availability and occupancy without confusion.</p>
    </div>

    <!-- Area Filter Tabs -->
    <div style="display: flex; justify-content: center; gap: 12px; margin-bottom: 32px; flex-wrap: wrap;">
      <button style="padding: 10px 24px; border-radius: 12px; border: 1.5px solid var(--br); background: var(--br); color: #fff; font-weight: 500; font-size: 14px; cursor: pointer;">Main Dining (18 Tables)</button>
      <button style="padding: 10px 24px; border-radius: 12px; border: 1px solid var(--line); background: #fff; color: var(--ink); font-weight: 600; font-size: 14px; cursor: pointer;">Outdoor Patio (08 Tables)</button>
      <button style="padding: 10px 24px; border-radius: 12px; border: 1px solid var(--line); background: #fff; color: var(--ink); font-weight: 600; font-size: 14px; cursor: pointer;">Private Dining (04 Tables)</button>
      <button style="padding: 10px 24px; border-radius: 12px; border: 1px solid var(--line); background: #fff; color: var(--ink); font-weight: 600; font-size: 14px; cursor: pointer;">Bar & Lounge (06 Tables)</button>
    </div>

    <!-- Layout Grid Showcase -->
    <div class="card" style="padding: 32px;">
      <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px;">
        <div class="t-node avail">
          <div class="t-num">T01</div>
          <div class="t-sub">Square · 2 Seats</div>
          <span class="t-tag">Available</span>
        </div>

        <div class="t-node occupied">
          <div class="t-num">T02</div>
          <div class="t-sub">Round · 4 Guests</div>
          <span class="t-tag">Occupied</span>
        </div>

        <div class="t-node reserved">
          <div class="t-num">T03</div>
          <div class="t-sub">Booth · 6 Seats</div>
          <span class="t-tag">Reserved</span>
        </div>

        <div class="t-node avail">
          <div class="t-num">T04</div>
          <div class="t-sub">Square · 4 Seats</div>
          <span class="t-tag">Available</span>
        </div>

        <div class="t-node cleaning">
          <div class="t-num">T05</div>
          <div class="t-sub">Rectangular · 6 Seats</div>
          <span class="t-tag">Cleaning</span>
        </div>

        <div class="t-node occupied">
          <div class="t-num">T06</div>
          <div class="t-sub">Window · 2 Guests</div>
          <span class="t-tag">Occupied</span>
        </div>

        <div class="t-node avail">
          <div class="t-num">T07</div>
          <div class="t-sub">Center · 4 Seats</div>
          <span class="t-tag">Available</span>
        </div>

        <div class="t-node reserved">
          <div class="t-num">T08</div>
          <div class="t-sub">Oval · 8 Seats</div>
          <span class="t-tag">Reserved</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= TABLE STATUS & DETAILS PANEL ================= -->
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">TABLE STATUS & INSPECTOR</div>
      <h2>Know What’s Happening at <span class="sf">Every Table.</span></h2>
      <p>Click on any table to view occupancy details, seated duration, active order number, and guest preferences.</p>
    </div>

    <!-- 4 Status Cards -->
    <div class="g4" style="margin-bottom: 48px;">
      <div class="card" style="padding: 24px; border-top: 4px solid var(--green);">
        <span class="badge avail" style="margin-bottom: 12px;">AVAILABLE ●</span>
        <h3 style="font-size: 18px; margin-bottom: 6px;">Ready for Guests</h3>
        <p style="font-size: 13.5px;">Cleaned, reset, and immediately ready to seat arriving walk-in diners.</p>
      </div>

      <div class="card" style="padding: 24px; border-top: 4px solid var(--br);">
        <span class="badge reserved" style="margin-bottom: 12px;">RESERVED ●</span>
        <h3 style="font-size: 18px; margin-bottom: 6px;">Upcoming Booking</h3>
        <p style="font-size: 13.5px;">Assigned to a confirmed guest reservation for a specific arrival time.</p>
      </div>

      <div class="card" style="padding: 24px; border-top: 4px solid var(--blue);">
        <span class="badge occupied" style="margin-bottom: 12px;">OCCUPIED ●</span>
        <h3 style="font-size: 18px; margin-bottom: 6px;">Currently Seated</h3>
        <p style="font-size: 13.5px;">Guests are seated, dining, or reviewing the digital menu for their order.</p>
      </div>

      <div class="card" style="padding: 24px; border-top: 4px solid var(--amber);">
        <span class="badge cleaning" style="margin-bottom: 12px;">CLEANING ●</span>
        <h3 style="font-size: 18px; margin-bottom: 6px;">Turnaround Mode</h3>
        <p style="font-size: 13.5px;">Busser staff are clearing dishes and sanitizing the table for the next seating.</p>
      </div>
    </div>

    <!-- Table Details Panel Simulation -->
    <div class="g2">
      <!-- Left: Table Selection -->
      <div class="card" style="padding: 28px;">
        <div style="font-size: 12px; font-weight: 500; color: var(--br); text-transform: uppercase; letter-spacing: .08em; margin-bottom: 8px;">Interactive Inspector</div>
        <h3 style="font-size: 22px; margin-bottom: 20px;">Selected Table: T08</h3>

        <div style="background: var(--bg2); border: 1px solid var(--line); border-radius: 14px; padding: 20px; display: flex; flex-direction: column; gap: 12px; margin-bottom: 20px;">
          <div style="display: flex; justify-content: space-between; font-size: 14px;">
            <span style="color: var(--mute);">Current Status:</span>
            <span class="badge occupied">Occupied</span>
          </div>
          <div style="display: flex; justify-content: space-between; font-size: 14px;">
            <span style="color: var(--mute);">Seating Capacity:</span>
            <strong style="color: var(--ink);">4 Guests</strong>
          </div>
          <div style="display: flex; justify-content: space-between; font-size: 14px;">
            <span style="color: var(--mute);">Current Guests:</span>
            <strong style="color: var(--ink);">3 Seated</strong>
          </div>
          <div style="display: flex; justify-content: space-between; font-size: 14px;">
            <span style="color: var(--mute);">Dining Area:</span>
            <strong style="color: var(--ink);">Main Dining</strong>
          </div>
          <div style="display: flex; justify-content: space-between; font-size: 14px;">
            <span style="color: var(--mute);">Seated Time:</span>
            <strong style="color: var(--ink);">7:42 PM (38 mins ago)</strong>
          </div>
          <div style="display: flex; justify-content: space-between; font-size: 14px;">
            <span style="color: var(--mute);">Booking Type:</span>
            <strong style="color: var(--ink);">Walk-in Guest</strong>
          </div>
          <div style="display: flex; justify-content: space-between; font-size: 14px;">
            <span style="color: var(--mute);">Active Order:</span>
            <strong style="color: var(--br);">#ORD-2084</strong>
          </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
          <button class="btn p" style="padding: 10px; font-size: 13px;">View Order Tab</button>
          <button class="btn o" style="padding: 10px; font-size: 13px;">Change Status ▾</button>
        </div>
      </div>

      <!-- Right: Connected Workflow Diagram -->
      <div class="card" style="padding: 28px; background: #faf8f5;">
        <h3 style="font-size: 20px; margin-bottom: 16px;">Connected Operational Chain</h3>
        <p style="font-size: 14px; margin-bottom: 24px;">See how table occupancy links directly to orders, kitchen tickets and final POS billing.</p>

        <div style="display: flex; flex-direction: column; gap: 14px;">
          <div style="display: flex; align-items: center; gap: 14px; background: #fff; border: 1px solid var(--line); border-radius: 12px; padding: 14px;">
            <div style="width: 32px; height: 32px; border-radius: 8px; background: var(--br-light); color: var(--br); display: grid; place-items: center; font-weight: 500;">1</div>
            <div>
              <div style="font-weight: 500; font-size: 14px;">TABLE T08 SEATED</div>
              <div style="font-size: 12px; color: var(--mute);">Host assigns table to 3 guests</div>
            </div>
          </div>

          <div style="display: flex; align-items: center; gap: 14px; background: #fff; border: 1px solid var(--line); border-radius: 12px; padding: 14px;">
            <div style="width: 32px; height: 32px; border-radius: 8px; background: var(--br-light); color: var(--br); display: grid; place-items: center; font-weight: 500;">2</div>
            <div>
              <div style="font-weight: 500; font-size: 14px;">ORDER #ORD-2084 PLACED</div>
              <div style="font-weight: 700; font-size: 12px; color: var(--br);">2 Biryani · 1 Pasta · 2 Coffee</div>
            </div>
          </div>

          <div style="display: flex; align-items: center; gap: 14px; background: #fff; border: 1px solid var(--line); border-radius: 12px; padding: 14px;">
            <div style="width: 32px; height: 32px; border-radius: 8px; background: var(--br-light); color: var(--br); display: grid; place-items: center; font-weight: 500;">3</div>
            <div>
              <div style="font-weight: 500; font-size: 14px;">KOT SENT TO KITCHEN</div>
              <div style="font-size: 12px; color: var(--mute);">Chef receives ticket for Table T08</div>
            </div>
          </div>

          <div style="display: flex; align-items: center; gap: 14px; background: #fff; border: 1px solid var(--line); border-radius: 12px; padding: 14px;">
            <div style="width: 32px; height: 32px; border-radius: 8px; background: var(--br-light); color: var(--br); display: grid; place-items: center; font-weight: 500;">4</div>
            <div>
              <div style="font-weight: 500; font-size: 14px;">POS BILL SETTLED</div>
              <div style="font-size: 12px; color: var(--mute);">Cashier collects payment & frees table</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= CREATE / EDIT TABLE ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">FLOOR PLAN EDITOR</div>
      <h2>Build Your Restaurant <span class="sf">Layout.</span></h2>
      <p>Easily add new tables, set seating capacities, assign table shapes, and group tables into custom dining zones.</p>
    </div>

    <div class="g2">
      <!-- Form UI -->
      <div class="card" style="padding: 28px;">
        <h3 style="font-size: 20px; margin-bottom: 20px;">Add / Edit Table Properties</h3>

        <div style="display: flex; flex-direction: column; gap: 14px; margin-bottom: 20px;">
          <div>
            <label style="display: block; font-size: 12.5px; font-weight: 700; margin-bottom: 4px; color: var(--ink);">Table Number</label>
            <input type="text" value="T12" style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid var(--line); font-size: 14px;">
          </div>

          <div>
            <label style="display: block; font-size: 12.5px; font-weight: 700; margin-bottom: 4px; color: var(--ink);">Table Name / Label</label>
            <input type="text" value="Window Oval Table" style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid var(--line); font-size: 14px;">
          </div>

          <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
            <div>
              <label style="display: block; font-size: 12.5px; font-weight: 700; margin-bottom: 4px; color: var(--ink);">Seating Capacity</label>
              <select style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid var(--line); font-size: 14px;">
                <option>2 Guests</option>
                <option>4 Guests</option>
                <option>6 Guests</option>
                <option selected>8 Guests</option>
              </select>
            </div>

            <div>
              <label style="display: block; font-size: 12.5px; font-weight: 700; margin-bottom: 4px; color: var(--ink);">Dining Area</label>
              <select style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid var(--line); font-size: 14px;">
                <option selected>Main Dining</option>
                <option>Outdoor Patio</option>
                <option>Private Room</option>
              </select>
            </div>
          </div>

          <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
            <div>
              <label style="display: block; font-size: 12.5px; font-weight: 700; margin-bottom: 4px; color: var(--ink);">Table Shape</label>
              <select style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid var(--line); font-size: 14px;">
                <option>Square</option>
                <option>Round</option>
                <option selected>Oval / Rectangular</option>
              </select>
            </div>

            <div>
              <label style="display: block; font-size: 12.5px; font-weight: 700; margin-bottom: 4px; color: var(--ink);">Initial Status</label>
              <select style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid var(--line); font-size: 14px;">
                <option selected>Available</option>
                <option>Reserved</option>
              </select>
            </div>
          </div>
        </div>

        <div style="display: flex; gap: 10px;">
          <button class="btn p" style="flex: 1; padding: 12px;">Save Table Configuration</button>
          <button class="btn o" style="padding: 12px;">Cancel</button>
        </div>
      </div>

      <!-- Drag & Move Visual -->
      <div class="card" style="padding: 28px; text-align: center; background: #fff;">
        <div style="font-size: 12px; font-weight: 500; color: var(--br); text-transform: uppercase; letter-spacing: .08em; margin-bottom: 8px;">Visual Placement</div>
        <h3 style="font-size: 20px; margin-bottom: 16px;">Drag, Arrange & Resize</h3>
        <p style="font-size: 14px; margin-bottom: 24px;">Drag tables across your screen to mirror your physical dining room layout.</p>

        <div style="border: 2px dashed var(--br); border-radius: 16px; padding: 40px 20px; background: var(--bg2); position: relative;">
          <div style="display: inline-block; padding: 16px 24px; border-radius: 14px; background: #fff; border: 2px solid var(--br); box-shadow: var(--shadow-md);">
            <div style="font-weight: 500; font-size: 18px; color: var(--br);">Table T12</div>
            <div style="font-size: 12px; color: var(--mute);">8 Seats · Oval</div>
            <div style="margin-top: 8px; font-size: 10px; font-weight: 500; color: var(--br); text-transform: uppercase;">⚡ Positioning Active</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= TABLE ASSIGNMENT & RESERVATION CONNECTION ================= -->
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">SMART SEATING & RESERVATIONS</div>
      <h2>Reservations Meet the <span class="sf">Floor Plan.</span></h2>
      <p>Connect reservation information with table availability so your team can see upcoming bookings alongside the dining floor.</p>
    </div>

    <div class="g2">
      <!-- Reservations List -->
      <div class="card" style="padding: 28px;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
          <h3 style="font-size: 20px;">Upcoming Bookings</h3>
          <span class="badge reserved">3 Confirmed</span>
        </div>

        <div style="display: flex; flex-direction: column; gap: 12px;">
          <div style="background: var(--bg2); border: 1px solid var(--line); border-radius: 12px; padding: 14px; display: flex; justify-content: space-between; align-items: center;">
            <div>
              <strong style="font-size: 15px; color: var(--ink);">7:00 PM · Mr. Kumar</strong>
              <div style="font-size: 12px; color: var(--mute);">4 Guests · Confirmed</div>
            </div>
            <span class="badge reserved">Table T02</span>
          </div>

          <div style="background: var(--bg2); border: 1px solid var(--line); border-radius: 12px; padding: 14px; display: flex; justify-content: space-between; align-items: center;">
            <div>
              <strong style="font-size: 15px; color: var(--ink);">7:30 PM · Priya Sharma</strong>
              <div style="font-size: 12px; color: var(--mute);">2 Guests · Confirmed</div>
            </div>
            <span class="badge avail">Assign Table →</span>
          </div>

          <div style="background: var(--bg2); border: 1px solid var(--line); border-radius: 12px; padding: 14px; display: flex; justify-content: space-between; align-items: center;">
            <div>
              <strong style="font-size: 15px; color: var(--ink);">8:00 PM · Arun V.</strong>
              <div style="font-size: 12px; color: var(--mute);">6 Guests · Confirmed</div>
            </div>
            <span class="badge reserved">Table T08</span>
          </div>
        </div>
      </div>

      <!-- Matching Tables -->
      <div class="card" style="padding: 28px; background: #faf8f5;">
        <h3 style="font-size: 20px; margin-bottom: 12px;">Seating Matcher (Party of 4)</h3>
        <p style="font-size: 13.5px; margin-bottom: 20px;">Instantly filter tables matching guest group size.</p>

        <div style="display: flex; flex-direction: column; gap: 10px;">
          <div style="background: #fff; border: 1.5px solid var(--green); border-radius: 12px; padding: 14px; display: flex; justify-content: space-between; align-items: center;">
            <div>
              <strong style="font-size: 15px;">T04 — 4 Seats (Center)</strong>
              <div style="font-size: 11px; color: var(--green); font-weight: 700;">Available Now</div>
            </div>
            <button class="btn p" style="padding: 6px 14px; font-size: 12px;">Seat Party</button>
          </div>

          <div style="background: #fff; border: 1px solid var(--line); border-radius: 12px; padding: 14px; display: flex; justify-content: space-between; align-items: center;">
            <div>
              <strong style="font-size: 15px;">T07 — 4 Seats (Window)</strong>
              <div style="font-size: 11px; color: var(--green); font-weight: 700;">Available Now</div>
            </div>
            <button class="btn o" style="padding: 6px 14px; font-size: 12px;">Select</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= TABLE LIFECYCLE ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">7-STAGE DINING CYCLE</div>
      <h2>From Empty Table to <span class="sf">Ready Again.</span></h2>
      <p>Follow the complete lifecycle of a restaurant table from arrival to turnaround.</p>
    </div>

    <!-- 7 Stage Horizontal Workflow -->
    <div style="display: grid; grid-template-columns: repeat(7, 1fr); gap: 10px;">
      <div style="background: #fff; border: 1px solid var(--line); border-radius: 14px; padding: 16px; text-align: center;">
        <div style="font-weight: 500; font-size: 11px; color: var(--green);">STAGE 01</div>
        <div style="font-weight: 500; font-size: 13px; margin-top: 4px;">Available</div>
      </div>

      <div style="background: #fff; border: 1px solid var(--line); border-radius: 14px; padding: 16px; text-align: center;">
        <div style="font-weight: 500; font-size: 11px; color: var(--br);">STAGE 02</div>
        <div style="font-weight: 500; font-size: 13px; margin-top: 4px;">Reserved</div>
      </div>

      <div style="background: #fff; border: 1px solid var(--line); border-radius: 14px; padding: 16px; text-align: center;">
        <div style="font-weight: 500; font-size: 11px; color: var(--blue);">STAGE 03</div>
        <div style="font-weight: 500; font-size: 13px; margin-top: 4px;">Occupied</div>
      </div>

      <div style="background: #fff; border: 1px solid var(--line); border-radius: 14px; padding: 16px; text-align: center;">
        <div style="font-weight: 500; font-size: 11px; color: var(--ink);">STAGE 04</div>
        <div style="font-weight: 500; font-size: 13px; margin-top: 4px;">Ordering</div>
      </div>

      <div style="background: #fff; border: 1px solid var(--line); border-radius: 14px; padding: 16px; text-align: center;">
        <div style="font-weight: 500; font-size: 11px; color: var(--br-gold);">STAGE 05</div>
        <div style="font-weight: 500; font-size: 13px; margin-top: 4px;">Billing</div>
      </div>

      <div style="background: #fff; border: 1px solid var(--line); border-radius: 14px; padding: 16px; text-align: center;">
        <div style="font-weight: 500; font-size: 11px; color: var(--amber);">STAGE 06</div>
        <div style="font-weight: 500; font-size: 13px; margin-top: 4px;">Cleaning</div>
      </div>

      <div style="background: var(--br); color: #fff; border-radius: 14px; padding: 16px; text-align: center; box-shadow: 0 4px 14px rgba(135,96,57,0.3);">
        <div style="font-weight: 500; font-size: 11px; color: var(--br-gold);">STAGE 07</div>
        <div style="font-weight: 500; font-size: 13px; margin-top: 4px; color: #fff;">Available</div>
      </div>
    </div>
  </div>
</section>

<!-- ================= BUSY-HOUR MANAGEMENT & UTILIZATION ================= -->
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">PEAK RUSH & ANALYTICS</div>
      <h2>Stay In Control When <span class="sf">Every Table Matters.</span></h2>
      <p>Keep your host stand informed during peak dinner rush with live alerts and table turnaround analytics.</p>
    </div>

    <div class="g2">
      <!-- Live Notifications Panel -->
      <div class="card" style="padding: 28px;">
        <h3 style="font-size: 18px; margin-bottom: 20px;">Live Dining Floor Alerts</h3>
        <div style="display: flex; flex-direction: column; gap: 12px;">
          <div style="background: #ecfdf5; border: 1px solid var(--green); border-radius: 12px; padding: 14px; display: flex; align-items: center; gap: 12px;">
            <div style="width: 10px; height: 10px; border-radius: 50%; background: var(--green);"></div>
            <div style="font-size: 13.5px; font-weight: 700; color: #065f46;">Table T14 is ready for seating (Busser finished cleaning)</div>
          </div>

          <div style="background: #fffbeb; border: 1px solid var(--amber); border-radius: 12px; padding: 14px; display: flex; align-items: center; gap: 12px;">
            <div style="width: 10px; height: 10px; border-radius: 50%; background: var(--amber);"></div>
            <div style="font-size: 13.5px; font-weight: 700; color: #92400e;">Reservation arriving in 10 min — Table T08 (6 Guests)</div>
          </div>

          <div style="background: #eff6ff; border: 1px solid var(--blue); border-radius: 12px; padding: 14px; display: flex; align-items: center; gap: 12px;">
            <div style="width: 10px; height: 10px; border-radius: 50%; background: var(--blue);"></div>
            <div style="font-size: 13.5px; font-weight: 700; color: #1e40af;">Table T03 bill printed (Payment pending)</div>
          </div>
        </div>
      </div>

      <!-- Occupancy Chart -->
      <div class="card" style="padding: 28px;">
        <h3 style="font-size: 18px; margin-bottom: 20px;">Table Occupancy by Hour</h3>
        <div class="bar-chart">
          <div class="bar-row">
            <div class="bar-label">12 PM</div>
            <div class="bar-track"><div class="bar-fill" style="width: 50%;"></div></div>
            <div class="bar-count">12 / 24 Tables</div>
          </div>
          <div class="bar-row">
            <div class="bar-label">2 PM</div>
            <div class="bar-track"><div class="bar-fill" style="width: 80%;"></div></div>
            <div class="bar-count">19 / 24 Tables</div>
          </div>
          <div class="bar-row">
            <div class="bar-label">4 PM</div>
            <div class="bar-track"><div class="bar-fill" style="width: 35%;"></div></div>
            <div class="bar-count">08 / 24 Tables</div>
          </div>
          <div class="bar-row">
            <div class="bar-label">8 PM</div>
            <div class="bar-track"><div class="bar-fill" style="width: 95%;"></div></div>
            <div class="bar-count">23 / 24 Tables</div>
          </div>
          <div class="bar-row">
            <div class="bar-label">10 PM</div>
            <div class="bar-track"><div class="bar-fill" style="width: 65%;"></div></div>
            <div class="bar-count">15 / 24 Tables</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= RESTAURANT INDUSTRIES ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">MULTI-FORMAT FLEXIBILITY</div>
      <h2>Built for Every <span class="sf">Dining Environment.</span></h2>
      <p>Whether you run a high-end fine dining room, a busy family restaurant, a café or a resort dining hall.</p>
    </div>

    <div class="ind-grid">
      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&w=600&q=80');">
          <div class="ind-overlay"></div>
          <div class="ind-icon"><svg viewBox="0 0 24 24"><path d="M4 19h16M4 15h16M4 11h16M8 7v4M16 7v4"/></svg></div>
        </div>
        <div class="ind-content">
          <h4>Fine Dining</h4>
          <p>Manage premium dining layouts, course timing, and VIP table assignments.</p>
        </div>
      </div>

      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1555396273-367ea4eb4db5?auto=format&fit=crop&w=600&q=80');">
          <div class="ind-overlay"></div>
          <div class="ind-icon"><svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg></div>
        </div>
        <div class="ind-content">
          <h4>Family Restaurants</h4>
          <p>Easily seat large family groups and merge adjoining table layouts.</p>
        </div>
      </div>

      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1501339847302-ac426a4a7cbb?auto=format&fit=crop&w=600&q=80');">
          <div class="ind-overlay"></div>
          <div class="ind-icon"><svg viewBox="0 0 24 24"><path d="M18 8h1a4 4 0 010 8h-1M2 8h16v9a4 4 0 01-4 4H6a4 4 0 01-4-4V8z"/></svg></div>
        </div>
        <div class="ind-content">
          <h4>Cafés & Bistros</h4>
          <p>Keep smaller seating spaces and patio layouts simple and organized.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= CONNECTED ECOSYSTEM ================= -->
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">CONNECTED PLATFORM</div>
      <h2>Table Management Is Part of the <span class="sf">Bigger Picture.</span></h2>
      <p>Tables are the operational connection point between guests, waiters, kitchen tickets and POS billing.</p>
    </div>

    <div class="card" style="padding: 40px; text-align: center; background: linear-gradient(180deg, #ffffff 0%, #faf8f5 100%);">
      <div style="display: inline-block; padding: 14px 28px; background: var(--br); color: #fff; border-radius: 16px; font-weight: 500; font-size: 20px; font-family: 'Outfit', sans-serif; box-shadow: 0 8px 24px rgba(135,96,57,0.3); margin-bottom: 32px;">
        CENTRAL TABLE ENGINE
      </div>

      <div class="g4" style="text-align: left;">
        <div style="background: #fff; border: 1px solid var(--line); border-radius: 14px; padding: 16px;">
          <h4 style="font-size: 15px; margin-bottom: 4px; color: var(--br);">Reservation Management</h4>
          <p style="font-size: 12.5px;">Bookings reserve tables automatically on the floor map.</p>
        </div>

        <div style="background: #fff; border: 1px solid var(--line); border-radius: 14px; padding: 16px;">
          <h4 style="font-size: 15px; margin-bottom: 4px; color: var(--br);">Waiter Requests</h4>
          <p style="font-size: 12.5px;">Table-side calls display table numbers on staff devices.</p>
        </div>

        <div style="background: #fff; border: 1px solid var(--line); border-radius: 14px; padding: 16px;">
          <h4 style="font-size: 15px; margin-bottom: 4px; color: var(--br);">POS Management</h4>
          <p style="font-size: 12.5px;">Bills link directly to table numbers for easy checkout.</p>
        </div>

        <div style="background: #fff; border: 1px solid var(--line); border-radius: 14px; padding: 16px;">
          <h4 style="font-size: 15px; margin-bottom: 4px; color: var(--br);">KOT Management</h4>
          <p style="font-size: 12.5px;">Orders created at tables send instant kitchen tickets.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= FAQ SECTION ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">GOT QUESTIONS?</div>
      <h2>Frequently Asked <span class="sf">Questions.</span></h2>
      <p>Everything you need to know about Geni Menu Table Management.</p>
    </div>

    <div class="faq-list">
      <div class="faq-item open">
        <div class="faq-q" onclick="faq(this)">
          1. What is Table Management in Geni Menu?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Table Management in Geni Menu is a digital floor plan system that helps restaurant teams view live table status (Available, Reserved, Occupied, Cleaning), manage seating, and connect dining tables to orders and billing.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="faq(this)">
          2. Can I design my own restaurant floor plan layout?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. You can add tables, configure table capacities, select table shapes, and arrange tables visually to match your real dining floor layout.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="faq(this)">
          3. Can tables be organized by different dining areas?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. You can organize tables into custom dining sections such as Main Dining, Outdoor Patio, Private Dining Rooms, or Rooftop Lounges.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="faq(this)">
          4. Does Table Management connect with Reservation Management?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Confirmed guest reservations automatically show on the floor plan, reserving designated tables prior to guest arrival.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="faq(this)">
          5. Does Table Management connect with POS and Billing?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Selecting an occupied table on the POS screen pulls up its active order tab for quick item additions or payment settlement.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="faq(this)">
          6. Can staff manage table status from tablets or mobile phones?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Host stand staff and waiters can view and update table status in real time from mobile devices or handheld tablets.
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= FINAL CTA ================= -->
<section style="padding: 96px 0; background: linear-gradient(135deg, #FAF4ED 0%, #EFE4D6 50%, #FAF4ED 100%); color: #21160F; border-top: 1px solid rgba(135, 96, 57, 0.16);">
  <div class="w" style="text-align: center; max-width: 800px;">
    <div class="eb" style="background: rgba(135, 96, 57, 0.1); border-color: rgba(135, 96, 57, 0.2); color: #876039;">TRANSFORM YOUR DINING FLOOR</div>
    <h2 style="color: #21160F; font-size: clamp(32px, 4vw, 48px); margin-bottom: 20px;">
      Bring Your Restaurant Floor <span style="color: #876039; font-family: 'Playfair Display', Georgia, serif; font-style: italic;">Under Control.</span>
    </h2>
    <p style="color: #6E6157; font-size: 18px; margin-bottom: 36px; line-height: 1.6;">
      Manage tables, seating and dining areas with a connected table management experience built for modern restaurants.
    </p>
    <div style="display: flex; align-items: center; justify-content: center; gap: 16px; flex-wrap: wrap;">
      <a href="{{ route('restaurant_signup') }}" class="btn p" style="padding: 16px 36px; font-size: 16px; background: #876039; color: #fff;">Get Started →</a>
      <a href="{{ route('contact.us') }}" class="btn o" style="padding: 16px 32px; font-size: 16px; background: #fff; color: #876039; border: 1.5px solid #876039;">Book a Demo</a>
    </div>
  </div>
</section>



<script>
function faq(el) {
  const p = el.parentElement, was = p.classList.contains('open');
  document.querySelectorAll('.faq-item.open').forEach(i => i.classList.remove('open'));
  if (!was) p.classList.add('open');
}

const nb = document.getElementById('nb');
window.addEventListener('scroll', () => nb.classList.toggle('s', window.scrollY > 60), { passive: true });

const hmb = document.getElementById('hmb'), mnv = document.getElementById('mnav');
if (hmb && mnv) {
  hmb.addEventListener('click', () => mnv.classList.add('open'));
  mnv.addEventListener('click', e => { if (e.target === mnv) mnv.classList.remove('open'); });
}
</script>

@endsection
