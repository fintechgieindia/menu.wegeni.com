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
  --green-bg: #d1fae5;
  --green-text: #065f46;
  --amber: #F59E0B;
  --amber-bg: #fef3c7;
  --amber-text: #92400e;
  --red: #EF4444;
  --red-bg: #fee2e2;
  --red-text: #991b1b;
  --blue: #3B82F6;
  --purple: #8B5CF6;
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
  font-weight: 800;
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
  font-weight: 800;
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
.bc { padding: 104px 0 16px; background: var(--bg2); border-bottom: 1px solid var(--line); font-size: 14px; color: var(--mute); font-weight: 600; }
.bc .w { display: flex; align-items: center; gap: 8px; flex-wrap: wrap; }
.bc a { color: var(--mute); transition: color .2s; }
.bc a:hover { color: var(--br); }
.bc span.cur { color: var(--br); font-weight: 700; }

/* ===================== CARDS & UI COMPONENTS ===================== */
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
.wb .ttl { color: var(--br); font-weight: 800; font-family: 'Outfit', sans-serif; letter-spacing: 0.05em; font-size: 12px; text-transform: uppercase; }

/* Custom SVG Bar Chart / Line Visualization */
.chart-bar-group { display: flex; align-items: flex-end; justify-content: space-between; gap: 12px; height: 160px; padding-top: 20px; border-bottom: 1px solid var(--line); position: relative; }
.chart-bar { flex: 1; background: linear-gradient(180deg, var(--br) 0%, rgba(135,96,57,0.6) 100%); border-radius: 6px 6px 0 0; transition: height 0.6s ease; position: relative; }
.chart-bar:hover { background: var(--br-dark); }
.chart-bar .val { position: absolute; top: -22px; left: 50%; transform: translateX(-50%); font-size: 10.5px; font-weight: 800; color: var(--br); }
.chart-bar-label { text-align: center; font-size: 11px; font-weight: 700; color: var(--mute); margin-top: 6px; }

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
.faq-q { padding: 20px 24px; font-size: 16.5px; font-weight: 700; color: var(--ink); cursor: pointer; display: flex; justify-content: space-between; align-items: center; user-select: none; gap: 12px; }
.faq-q svg { width: 20px; height: 20px; transition: transform .3s; stroke: var(--br); flex: none; }
.faq-item.open .faq-q svg { transform: rotate(180deg); }
.faq-a { padding: 0 24px; max-height: 0; overflow: hidden; transition: max-height .4s ease, padding .3s; font-size: 15px; color: var(--mute); line-height: 1.65; }
.faq-item.open .faq-a { max-height: 280px; padding: 16px 24px 20px; border-top: 1px solid rgba(135,96,57,0.08); }

/* Responsive Grid helpers */
.g2 { display: grid; grid-template-columns: 1fr 1fr; gap: 40px; align-items: center; }
.g3 { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }
.g4 { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; }

@media (max-width: 992px) {
  .g2, .g3, .g4, .ind-grid { grid-template-columns: 1fr !important; gap: 24px !important; }
}
@media (max-width: 768px) {
  .bc { padding: 85px 0 14px; }
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
    <span class="cur">Reports & Analytics</span>
  </div>
</div>

<!-- ================= 2. PAGE HERO ================= -->
<section style="padding: 60px 0 80px; background: linear-gradient(180deg, var(--bg2) 0%, #ffffff 100%); border-bottom: 1px solid var(--line);">
  <div class="w">
    <div class="g2" style="gap: 50px; align-items: center;">
      <!-- Hero Left Text -->
      <div>
        <div class="eb">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
          REPORTS
        </div>
        <h1 style="margin-bottom: 20px;">
          Turn Restaurant Data <br>
          <span class="sf">Into Better Decisions.</span>
        </h1>
        <p style="font-size: 18px; margin-bottom: 32px; max-width: 540px; color: var(--mute);">
          Bring sales, orders, payments, menu performance and restaurant activity into one clear reporting experience.
        </p>

        <div style="display: flex; gap: 16px; flex-wrap: wrap; margin-bottom: 36px;">
          <a href="https://menu.wegeni.com/register" class="btn p">Get Started →</a>
          <a href="{{ route('contact.us') }}" class="btn o">Book a Demo</a>
        </div>

        <!-- Factual highlights -->
        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; padding-top: 24px; border-top: 1px solid var(--line);">
          <div>
            <div style="font-size: 22px; font-weight: 800; color: var(--br); font-family: 'Outfit', sans-serif;">Real-Time</div>
            <div style="font-size: 12px; font-weight: 600; color: var(--mute);">Sales & Order Activity</div>
          </div>
          <div>
            <div style="font-size: 22px; font-weight: 800; color: var(--br); font-family: 'Outfit', sans-serif;">Multi-Channel</div>
            <div style="font-size: 12px; font-weight: 600; color: var(--mute);">Dine-in, Takeaway, Delivery</div>
          </div>
          <div>
            <div style="font-size: 22px; font-weight: 800; color: var(--br); font-family: 'Outfit', sans-serif;">Filterable</div>
            <div style="font-size: 12px; font-weight: 600; color: var(--mute);">Date & Category Drilldowns</div>
          </div>
        </div>
      </div>

      <!-- Hero Right Visual: Realistic Restaurant Reporting Dashboard -->
      <div style="position: relative;">
        <div class="win" style="position: relative; z-index: 1;">
          <div class="wb">
            <div class="dots"><i></i><i></i><i></i></div>
            <div class="ttl">GENI MENU REPORTS • TODAY (DEMO DATA)</div>
            <div style="display:flex; align-items:center; gap:8px; font-size:11px; color:var(--mute); font-weight:700;">
              <span style="width:8px; height:8px; border-radius:50%; background:var(--green); display:inline-block;"></span> LIVE METRICS
            </div>
          </div>

          <div style="padding: 20px; background: #faf8f5;">
            <!-- Top Summary Cards -->
            <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 10px; margin-bottom: 16px;">
              <div style="background: #fff; border: 1px solid var(--line); border-radius: 12px; padding: 12px;">
                <div style="font-size: 10px; font-weight: 800; color: var(--mute); text-transform: uppercase;">Today's Sales</div>
                <div style="font-size: 20px; font-weight: 900; color: var(--br); font-family: 'Outfit', sans-serif; margin-top: 2px;">₹48,620</div>
              </div>
              <div style="background: #fff; border: 1px solid var(--line); border-radius: 12px; padding: 12px;">
                <div style="font-size: 10px; font-weight: 800; color: var(--mute); text-transform: uppercase;">Orders</div>
                <div style="font-size: 20px; font-weight: 900; color: var(--ink); font-family: 'Outfit', sans-serif; margin-top: 2px;">186</div>
              </div>
              <div style="background: #fff; border: 1px solid var(--line); border-radius: 12px; padding: 12px;">
                <div style="font-size: 10px; font-weight: 800; color: var(--mute); text-transform: uppercase;">Avg Order Value</div>
                <div style="font-size: 20px; font-weight: 900; color: var(--ink); font-family: 'Outfit', sans-serif; margin-top: 2px;">₹261</div>
              </div>
              <div style="background: #fff; border: 1px solid var(--line); border-radius: 12px; padding: 12px;">
                <div style="font-size: 10px; font-weight: 800; color: var(--mute); text-transform: uppercase;">Payments</div>
                <div style="font-size: 20px; font-weight: 900; color: var(--green-text); font-family: 'Outfit', sans-serif; margin-top: 2px;">₹45,280</div>
              </div>
            </div>

            <!-- Middle Split: Sales Trend Chart + Top Items & Order Types -->
            <div style="display: grid; grid-template-columns: 1.8fr 1fr; gap: 12px;">
              <!-- Sales Overview Line/Area Chart -->
              <div style="background: #fff; border: 1px solid var(--line); border-radius: 14px; padding: 16px;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
                  <div style="font-size: 11px; font-weight: 800; color: var(--br); letter-spacing: 0.05em;">SALES OVERVIEW</div>
                  <span style="font-size: 10px; font-weight: 700; color: var(--mute);">Hourly Trend</span>
                </div>

                <div class="chart-bar-group">
                  <div class="chart-bar" style="height: 35%;"><span class="val">₹4.2k</span></div>
                  <div class="chart-bar" style="height: 52%;"><span class="val">₹5.1k</span></div>
                  <div class="chart-bar" style="height: 68%;"><span class="val">₹6.4k</span></div>
                  <div class="chart-bar" style="height: 82%;"><span class="val">₹8.2k</span></div>
                  <div class="chart-bar" style="height: 100%;"><span class="val">₹10.6k</span></div>
                  <div class="chart-bar" style="height: 88%;"><span class="val">₹9.1k</span></div>
                </div>

                <div style="display: flex; justify-content: space-between; font-size: 10px; font-weight: 700; color: var(--mute); margin-top: 6px; padding: 0 4px;">
                  <span>12 PM</span>
                  <span>2 PM</span>
                  <span>4 PM</span>
                  <span>6 PM</span>
                  <span>8 PM</span>
                  <span>10 PM</span>
                </div>
              </div>

              <!-- Top Items & Order Types Split -->
              <div style="display: flex; flex-direction: column; gap: 10px;">
                <!-- Top Items -->
                <div style="background: #fff; border: 1px solid var(--line); border-radius: 12px; padding: 12px;">
                  <div style="font-size: 10px; font-weight: 800; color: var(--br); margin-bottom: 8px;">TOP SELLING ITEMS</div>
                  <div style="display: flex; flex-direction: column; gap: 5px; font-size: 11px;">
                    <div style="display: flex; justify-content: space-between;"><span>1. Chicken Biryani</span> <strong>142 orders</strong></div>
                    <div style="display: flex; justify-content: space-between;"><span>2. Margherita Pizza</span> <strong>96 orders</strong></div>
                    <div style="display: flex; justify-content: space-between;"><span>3. Cold Coffee</span> <strong>84 orders</strong></div>
                    <div style="display: flex; justify-content: space-between;"><span>4. Paneer Tikka</span> <strong>72 orders</strong></div>
                  </div>
                </div>

                <!-- Order Types -->
                <div style="background: #fff; border: 1px solid var(--line); border-radius: 12px; padding: 12px;">
                  <div style="font-size: 10px; font-weight: 800; color: var(--br); margin-bottom: 8px;">ORDER TYPES</div>
                  <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 6px; font-size: 11px;">
                    <div style="background: var(--bg2); padding: 5px 8px; border-radius: 6px;">Dine-in: <strong>58%</strong></div>
                    <div style="background: var(--bg2); padding: 5px 8px; border-radius: 6px;">Takeaway: <strong>22%</strong></div>
                    <div style="background: var(--bg2); padding: 5px 8px; border-radius: 6px;">Delivery: <strong>14%</strong></div>
                    <div style="background: var(--bg2); padding: 5px 8px; border-radius: 6px;">Pickup: <strong>6%</strong></div>
                  </div>
                </div>
              </div>
            </div>
            
            <div style="margin-top: 10px; text-align: right; font-size: 10px; color: var(--mute); font-style: italic;">
              * All values represented above utilize sample restaurant demo data.
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 3. HERO VISUAL STORY ================= -->
<section style="padding: 40px 0; background: var(--bg2); border-bottom: 1px solid var(--line);">
  <div class="w">
    <div style="text-align: center; margin-bottom: 24px;">
      <div style="font-size: 12px; font-weight: 800; letter-spacing: 0.15em; color: var(--br); text-transform: uppercase;">DATA TO DECISION PIPELINE</div>
    </div>
    
    <div style="display: flex; align-items: center; justify-content: space-between; max-width: 960px; margin: 0 auto; flex-wrap: wrap; gap: 12px;">
      <div style="text-align: center; flex: 1; min-width: 110px;">
        <div style="width: 44px; height: 44px; border-radius: 50%; background: #fff; border: 1.5px solid var(--br); display: grid; place-items: center; margin: 0 auto 8px; color: var(--br);">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9"/></svg>
        </div>
        <div style="font-size: 11px; font-weight: 800; color: var(--ink);">RESTAURANT ACTIVITY</div>
      </div>
      <div style="color: var(--br); font-weight: 900; font-size: 18px;">↓</div>

      <div style="text-align: center; flex: 1; min-width: 110px;">
        <div style="width: 44px; height: 44px; border-radius: 50%; background: #fff; border: 1.5px solid var(--br); display: grid; place-items: center; margin: 0 auto 8px; color: var(--br);">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/></svg>
        </div>
        <div style="font-size: 11px; font-weight: 800; color: var(--ink);">DATA</div>
      </div>
      <div style="color: var(--br); font-weight: 900; font-size: 18px;">↓</div>

      <div style="text-align: center; flex: 1; min-width: 110px;">
        <div style="width: 44px; height: 44px; border-radius: 50%; background: #fff; border: 1.5px solid var(--br); display: grid; place-items: center; margin: 0 auto 8px; color: var(--br);">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
        </div>
        <div style="font-size: 11px; font-weight: 800; color: var(--ink);">REPORTS</div>
      </div>
      <div style="color: var(--br); font-weight: 900; font-size: 18px;">↓</div>

      <div style="text-align: center; flex: 1; min-width: 110px;">
        <div style="width: 44px; height: 44px; border-radius: 50%; background: #fff; border: 1.5px solid var(--br); display: grid; place-items: center; margin: 0 auto 8px; color: var(--br);">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
        </div>
        <div style="font-size: 11px; font-weight: 800; color: var(--ink);">INSIGHTS</div>
      </div>
      <div style="color: var(--br); font-weight: 900; font-size: 18px;">↓</div>

      <div style="text-align: center; flex: 1; min-width: 110px;">
        <div style="width: 44px; height: 44px; border-radius: 50%; background: #fff; border: 1.5px solid var(--br); display: grid; place-items: center; margin: 0 auto 8px; color: var(--br);">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/></svg>
        </div>
        <div style="font-size: 11px; font-weight: 800; color: var(--ink);">BUSINESS ACTION</div>
      </div>
    </div>

    <div style="text-align: center; margin-top: 16px; font-size: 13.5px; font-weight: 700; color: var(--mute);">
      “Everything happening in the restaurant can be understood from one reporting workspace.”
    </div>
  </div>
</section>

<!-- ================= 4. VALUE STRIP ================= -->
<section style="padding: 50px 0; background: #ffffff; border-bottom: 1px solid var(--line);">
  <div class="w">
    <div class="g4">
      <!-- Point 1 -->
      <div style="padding: 20px; background: var(--bg2); border-radius: 16px; border: 1px solid var(--line);">
        <div style="font-size: 12px; font-weight: 900; color: var(--br); margin-bottom: 8px;">01</div>
        <div class="ic" style="margin-bottom: 14px;">
          <svg viewBox="0 0 24 24"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/></svg>
        </div>
        <h4 style="font-size: 17px; margin-bottom: 6px;">Sales Visibility</h4>
        <p style="font-size: 14px;">Understand how the restaurant is performing across revenue channels.</p>
      </div>

      <!-- Point 2 -->
      <div style="padding: 20px; background: var(--bg2); border-radius: 16px; border: 1px solid var(--line);">
        <div style="font-size: 12px; font-weight: 900; color: var(--br); margin-bottom: 8px;">02</div>
        <div class="ic" style="margin-bottom: 14px;">
          <svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/></svg>
        </div>
        <h4 style="font-size: 17px; margin-bottom: 6px;">Order Insights</h4>
        <p style="font-size: 14px;">See order volume, peak preparation times, and dining channels.</p>
      </div>

      <!-- Point 3 -->
      <div style="padding: 20px; background: var(--bg2); border-radius: 16px; border: 1px solid var(--line);">
        <div style="font-size: 12px; font-weight: 900; color: var(--br); margin-bottom: 8px;">03</div>
        <div class="ic" style="margin-bottom: 14px;">
          <svg viewBox="0 0 24 24"><path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9"/></svg>
        </div>
        <h4 style="font-size: 17px; margin-bottom: 6px;">Menu Performance</h4>
        <p style="font-size: 14px;">Identify popular dishes and top-performing menu categories.</p>
      </div>

      <!-- Point 4 -->
      <div style="padding: 20px; background: var(--bg2); border-radius: 16px; border: 1px solid var(--line);">
        <div style="font-size: 12px; font-weight: 900; color: var(--br); margin-bottom: 8px;">04</div>
        <div class="ic" style="margin-bottom: 14px;">
          <svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><line x1="9" y1="3" x2="9" y2="21"/><line x1="15" y1="3" x2="15" y2="21"/></svg>
        </div>
        <h4 style="font-size: 17px; margin-bottom: 6px;">Operational Reporting</h4>
        <p style="font-size: 14px;">Understand payments, tables, and kitchen inventory activity.</p>
      </div>
    </div>
  </div>
</section>

<!-- ================= 5. PROBLEM SECTION ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">BUSINESS CLARITY</div>
      <h2>Running a Restaurant <span class="sf">on Guesswork Is Hard.</span></h2>
      <p>Scattered bills, separate payment slips, and paper logbooks leave owners uncertain about real daily metrics.</p>
    </div>

    <!-- Traditional Workflow Diagram -->
    <div style="max-width: 900px; margin: 0 auto 48px; background: #fff; padding: 24px; border-radius: 18px; border: 1px solid var(--line);">
      <div style="font-size: 12px; font-weight: 800; color: var(--mute); text-align: center; text-transform: uppercase; letter-spacing: 0.08em; margin-bottom: 16px;">THE TRADITIONAL REPORTING FRICKTION</div>
      <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 8px; font-size: 12px; font-weight: 700; color: var(--ink);">
        <span>Collect information</span> <span>→</span>
        <span>Check records</span> <span>→</span>
        <span>Calculate totals</span> <span>→</span>
        <span>Compare periods</span> <span>→</span>
        <span>Review menu</span> <span>→</span>
        <span style="color: var(--br);">Understand changes</span>
      </div>
    </div>

    <!-- Side by Side Comparison Grid -->
    <div class="g2" style="gap: 28px;">
      <!-- Left: Scattered Information -->
      <div style="background: #fff; padding: 32px; border-radius: 20px; border: 1px solid #fee2e2;">
        <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 20px;">
          <div style="width: 38px; height: 38px; border-radius: 10px; background: #fee2e2; color: #dc2626; display: grid; place-items: center; font-weight: 900;">✕</div>
          <h3 style="font-size: 20px; color: #991b1b;">Scattered Information</h3>
        </div>
        <ul style="display: flex; flex-direction: column; gap: 14px; font-size: 15px; color: var(--mute);">
          <li style="display: flex; align-items: center; gap: 10px;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#dc2626" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            Paper sales records requiring manual tallies
          </li>
          <li style="display: flex; align-items: center; gap: 10px;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#dc2626" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            Unconnected dine-in and online order totals
          </li>
          <li style="display: flex; align-items: center; gap: 10px;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#dc2626" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            Separate payment machine slips & cash reconciliation
          </li>
          <li style="display: flex; align-items: center; gap: 10px;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#dc2626" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            Untracked ingredient stock consumption
          </li>
          <li style="display: flex; align-items: center; gap: 10px;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#dc2626" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            Time-consuming end-of-day calculations
          </li>
        </ul>
      </div>

      <!-- Right: Geni Menu Reports -->
      <div style="background: #fff; padding: 32px; border-radius: 20px; border: 1.5px solid var(--br); box-shadow: var(--shadow-sm);">
        <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 20px;">
          <div style="width: 38px; height: 38px; border-radius: 10px; background: var(--br-light); color: var(--br); display: grid; place-items: center; font-weight: 900;">✓</div>
          <h3 style="font-size: 20px; color: var(--br);">Geni Menu Reports</h3>
        </div>
        <ul style="display: flex; flex-direction: column; gap: 14px; font-size: 15px; color: var(--ink); font-weight: 600;">
          <li style="display: flex; align-items: center; gap: 10px;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--green)" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
            One centralized reporting workspace
          </li>
          <li style="display: flex; align-items: center; gap: 10px;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--green)" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
            Connected data from POS, orders & tables
          </li>
          <li style="display: flex; align-items: center; gap: 10px;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--green)" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
            Clear gross, net sales, and tax breakdowns
          </li>
          <li style="display: flex; align-items: center; gap: 10px;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--green)" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
            Visual hourly trends and peak service hours
          </li>
          <li style="display: flex; align-items: center; gap: 10px;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--green)" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
            Filterable metrics by date range & branch
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ================= 6. BUSINESS DASHBOARD ================= -->
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">EXECUTIVE WORKSPACE</div>
      <h2>See Your Restaurant <span class="sf">at a Glance.</span></h2>
      <p>Bring key restaurant metrics into one dashboard so managers can quickly understand what is happening today.</p>
    </div>

    <!-- Main Dashboard Showcase -->
    <div class="win" style="max-width: 1080px; margin: 0 auto;">
      <div class="wb">
        <div class="dots"><i></i><i></i><i></i></div>
        <div class="ttl">REPORTS DASHBOARD • 29 SEP 2026</div>
        <!-- Date Selector -->
        <div style="display: flex; gap: 6px; background: #fff; padding: 3px; border-radius: 8px; border: 1px solid var(--line);">
          <button class="date-btn active" onclick="selectDateFilter('Today', this)" style="padding: 4px 10px; border-radius: 6px; border: none; font-size: 11px; font-weight: 700; background: var(--br); color: #fff; cursor: pointer;">Today</button>
          <button class="date-btn" onclick="selectDateFilter('Yesterday', this)" style="padding: 4px 10px; border-radius: 6px; border: none; font-size: 11px; font-weight: 600; background: transparent; color: var(--mute); cursor: pointer;">Yesterday</button>
          <button class="date-btn" onclick="selectDateFilter('This Week', this)" style="padding: 4px 10px; border-radius: 6px; border: none; font-size: 11px; font-weight: 600; background: transparent; color: var(--mute); cursor: pointer;">This Week</button>
          <button class="date-btn" onclick="selectDateFilter('This Month', this)" style="padding: 4px 10px; border-radius: 6px; border: none; font-size: 11px; font-weight: 600; background: transparent; color: var(--mute); cursor: pointer;">This Month</button>
        </div>
      </div>

      <div style="padding: 24px; background: #fff;">
        <!-- Top Metrics Cards -->
        <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 14px; margin-bottom: 24px;">
          <div style="background: var(--bg2); border: 1px solid var(--line); border-radius: 14px; padding: 16px;">
            <div style="font-size: 11px; font-weight: 800; color: var(--mute); text-transform: uppercase;">Sales</div>
            <div style="font-size: 26px; font-weight: 900; color: var(--br); font-family: 'Outfit', sans-serif; margin-top: 4px;">₹48,620</div>
            <div style="font-size: 11px; color: var(--green-text); font-weight: 700; margin-top: 4px;">↑ +14% vs Yesterday</div>
          </div>
          <div style="background: var(--bg2); border: 1px solid var(--line); border-radius: 14px; padding: 16px;">
            <div style="font-size: 11px; font-weight: 800; color: var(--mute); text-transform: uppercase;">Orders</div>
            <div style="font-size: 26px; font-weight: 900; color: var(--ink); font-family: 'Outfit', sans-serif; margin-top: 4px;">186</div>
            <div style="font-size: 11px; color: var(--mute); font-weight: 600; margin-top: 4px;">Dine-in, Delivery, Takeaway</div>
          </div>
          <div style="background: var(--bg2); border: 1px solid var(--line); border-radius: 14px; padding: 16px;">
            <div style="font-size: 11px; font-weight: 800; color: var(--mute); text-transform: uppercase;">Average Order Value</div>
            <div style="font-size: 26px; font-weight: 900; color: var(--ink); font-family: 'Outfit', sans-serif; margin-top: 4px;">₹261</div>
            <div style="font-size: 11px; color: var(--mute); font-weight: 600; margin-top: 4px;">Per Completed Ticket</div>
          </div>
          <div style="background: var(--bg2); border: 1px solid var(--line); border-radius: 14px; padding: 16px;">
            <div style="font-size: 11px; font-weight: 800; color: var(--mute); text-transform: uppercase;">Payments Collected</div>
            <div style="font-size: 26px; font-weight: 900; color: var(--green-text); font-family: 'Outfit', sans-serif; margin-top: 4px;">₹45,280</div>
            <div style="font-size: 11px; color: var(--mute); font-weight: 600; margin-top: 4px;">Cash, Card & UPI</div>
          </div>
        </div>

        <!-- 4-Grid Dashboard Content -->
        <div style="display: grid; grid-template-columns: 1.5fr 1fr; gap: 20px;">
          <!-- Left Column: Sales & Orders Charts -->
          <div style="display: flex; flex-direction: column; gap: 20px;">
            <!-- Sales Overview Line Chart -->
            <div style="background: #fff; border: 1px solid var(--line); border-radius: 14px; padding: 18px;">
              <div style="font-size: 12px; font-weight: 800; color: var(--br); margin-bottom: 12px;">SALES OVERVIEW</div>
              <div class="chart-bar-group">
                <div class="chart-bar" style="height: 38%;"><span class="val">₹4,200</span></div>
                <div class="chart-bar" style="height: 55%;"><span class="val">₹5,100</span></div>
                <div class="chart-bar" style="height: 65%;"><span class="val">₹6,400</span></div>
                <div class="chart-bar" style="height: 80%;"><span class="val">₹8,200</span></div>
                <div class="chart-bar" style="height: 100%;"><span class="val">₹10,600</span></div>
                <div class="chart-bar" style="height: 90%;"><span class="val">₹9,120</span></div>
              </div>
              <div style="display: flex; justify-content: space-between; font-size: 11px; font-weight: 700; color: var(--mute); margin-top: 8px;">
                <span>12 PM</span><span>2 PM</span><span>4 PM</span><span>6 PM</span><span>8 PM</span><span>10 PM</span>
              </div>
            </div>

            <!-- Orders Volume Bar Chart -->
            <div style="background: #fff; border: 1px solid var(--line); border-radius: 14px; padding: 18px;">
              <div style="font-size: 12px; font-weight: 800; color: var(--br); margin-bottom: 12px;">ORDERS VOLUME BY HOUR</div>
              <div style="display: flex; align-items: flex-end; justify-content: space-between; gap: 10px; height: 100px; padding-top: 10px; border-bottom: 1px solid var(--line);">
                <div style="flex:1; background: var(--br-light); border-radius: 4px 4px 0 0; height: 40%; position:relative;"><span style="position:absolute; top:-16px; left:30%; font-size:9px; font-weight:800;">18</span></div>
                <div style="flex:1; background: var(--br-light); border-radius: 4px 4px 0 0; height: 60%; position:relative;"><span style="position:absolute; top:-16px; left:30%; font-size:9px; font-weight:800;">24</span></div>
                <div style="flex:1; background: var(--br-light); border-radius: 4px 4px 0 0; height: 70%; position:relative;"><span style="position:absolute; top:-16px; left:30%; font-size:9px; font-weight:800;">30</span></div>
                <div style="flex:1; background: var(--br-light); border-radius: 4px 4px 0 0; height: 85%; position:relative;"><span style="position:absolute; top:-16px; left:30%; font-size:9px; font-weight:800;">38</span></div>
                <div style="flex:1; background: var(--br); border-radius: 4px 4px 0 0; height: 100%; position:relative;"><span style="position:absolute; top:-16px; left:30%; font-size:9px; font-weight:800; color:var(--br);">44</span></div>
                <div style="flex:1; background: var(--br-light); border-radius: 4px 4px 0 0; height: 75%; position:relative;"><span style="position:absolute; top:-16px; left:30%; font-size:9px; font-weight:800;">32</span></div>
              </div>
            </div>
          </div>

          <!-- Right Column: Top Items & Payment Summary -->
          <div style="display: flex; flex-direction: column; gap: 20px;">
            <!-- Top Items Ranked -->
            <div style="background: #fff; border: 1px solid var(--line); border-radius: 14px; padding: 18px;">
              <div style="font-size: 12px; font-weight: 800; color: var(--br); margin-bottom: 12px;">TOP ITEMS</div>
              <div style="display: flex; flex-direction: column; gap: 10px; font-size: 13px;">
                <div style="display: flex; justify-content: space-between; padding-bottom: 6px; border-bottom: 1px solid rgba(135,96,57,0.08);">
                  <div><strong>1. Chicken Biryani</strong></div>
                  <div>142 orders</div>
                </div>
                <div style="display: flex; justify-content: space-between; padding-bottom: 6px; border-bottom: 1px solid rgba(135,96,57,0.08);">
                  <div><strong>2. Margherita Pizza</strong></div>
                  <div>96 orders</div>
                </div>
                <div style="display: flex; justify-content: space-between; padding-bottom: 6px; border-bottom: 1px solid rgba(135,96,57,0.08);">
                  <div><strong>3. Cold Coffee</strong></div>
                  <div>84 orders</div>
                </div>
                <div style="display: flex; justify-content: space-between;">
                  <div><strong>4. Paneer Tikka</strong></div>
                  <div>72 orders</div>
                </div>
              </div>
            </div>

            <!-- Payment Summary -->
            <div style="background: #fff; border: 1px solid var(--line); border-radius: 14px; padding: 18px;">
              <div style="font-size: 12px; font-weight: 800; color: var(--br); margin-bottom: 12px;">PAYMENT SUMMARY</div>
              <div style="display: flex; flex-direction: column; gap: 10px; font-size: 13px;">
                <div style="display: flex; justify-content: space-between; padding: 8px 12px; background: var(--bg2); border-radius: 8px;">
                  <span>Cash</span> <strong style="color: var(--ink);">₹18,400</strong>
                </div>
                <div style="display: flex; justify-content: space-between; padding: 8px 12px; background: var(--bg2); border-radius: 8px;">
                  <span>Card</span> <strong style="color: var(--ink);">₹12,800</strong>
                </div>
                <div style="display: flex; justify-content: space-between; padding: 8px 12px; background: var(--bg2); border-radius: 8px;">
                  <span>UPI</span> <strong style="color: var(--ink);">₹14,080</strong>
                </div>
                <div style="display: flex; justify-content: space-between; padding: 8px 12px; background: var(--bg2); border-radius: 8px;">
                  <span>Other</span> <strong style="color: var(--mute);">₹0</strong>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 7. SALES REPORT ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">FINANCIAL RECONCILIATION</div>
      <h2>Understand Your <span class="sf">Sales.</span></h2>
      <p>Break down gross revenues, applied discounts, collected taxes, and net earnings.</p>
    </div>

    <!-- Sales Report Interface -->
    <div class="win" style="max-width: 960px; margin: 0 auto; padding: 32px;">
      <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; flex-wrap: wrap; gap: 12px;">
        <div>
          <div style="font-size: 12px; font-weight: 800; color: var(--br);">SALES REPORT</div>
          <h3 style="font-size: 22px;">Daily Revenue Breakdown</h3>
        </div>

        <div style="display: flex; gap: 8px;">
          <button style="padding: 6px 14px; border-radius: 6px; border: 1px solid var(--br); background: var(--br-light); color: var(--br); font-size: 12px; font-weight: 700;">Today</button>
          <button style="padding: 6px 14px; border-radius: 6px; border: 1px solid var(--line); background: #fff; color: var(--mute); font-size: 12px; font-weight: 600;">This Week</button>
          <button style="padding: 6px 14px; border-radius: 6px; border: 1px solid var(--line); background: #fff; color: var(--mute); font-size: 12px; font-weight: 600;">This Month</button>
        </div>
      </div>

      <!-- Financial Metrics Grid -->
      <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 12px; margin-bottom: 28px; text-align: center;">
        <div style="background: #fff; padding: 16px; border-radius: 12px; border: 1px solid var(--line);">
          <div style="font-size: 11px; font-weight: 800; color: var(--mute);">GROSS SALES</div>
          <div style="font-size: 22px; font-weight: 900; color: var(--ink); margin-top: 4px;">₹52,400</div>
        </div>
        <div style="background: var(--amber-bg); padding: 16px; border-radius: 12px; border: 1px solid rgba(245,158,11,0.2);">
          <div style="font-size: 11px; font-weight: 800; color: var(--amber-text);">DISCOUNTS</div>
          <div style="font-size: 22px; font-weight: 900; color: var(--amber-text); margin-top: 4px;">-₹2,100</div>
        </div>
        <div style="background: #fff; padding: 16px; border-radius: 12px; border: 1px solid var(--line);">
          <div style="font-size: 11px; font-weight: 800; color: var(--mute);">TAX (GST)</div>
          <div style="font-size: 22px; font-weight: 900; color: var(--ink); margin-top: 4px;">+₹2,620</div>
        </div>
        <div style="background: var(--br-light); padding: 16px; border-radius: 12px; border: 1.5px solid var(--br);">
          <div style="font-size: 11px; font-weight: 800; color: var(--br);">NET SALES</div>
          <div style="font-size: 22px; font-weight: 900; color: var(--br); margin-top: 4px;">₹48,620</div>
        </div>
      </div>

      <!-- Hourly Sales Trend -->
      <div style="background: #fff; padding: 20px; border-radius: 14px; border: 1px solid var(--line);">
        <div style="font-size: 12px; font-weight: 800; color: var(--br); margin-bottom: 14px;">HOURLY SALES REVENUE (₹)</div>
        <div style="display: flex; align-items: flex-end; justify-content: space-between; gap: 14px; height: 120px; border-bottom: 1px solid var(--line);">
          <div style="flex:1; background:var(--br); height:40%; border-radius:4px 4px 0 0; text-align:center;"><span style="font-size:10px; color:#fff; font-weight:800;">4.2k</span></div>
          <div style="flex:1; background:var(--br); height:50%; border-radius:4px 4px 0 0; text-align:center;"><span style="font-size:10px; color:#fff; font-weight:800;">5.1k</span></div>
          <div style="flex:1; background:var(--br); height:65%; border-radius:4px 4px 0 0; text-align:center;"><span style="font-size:10px; color:#fff; font-weight:800;">6.4k</span></div>
          <div style="flex:1; background:var(--br); height:80%; border-radius:4px 4px 0 0; text-align:center;"><span style="font-size:10px; color:#fff; font-weight:800;">8.2k</span></div>
          <div style="flex:1; background:var(--br); height:100%; border-radius:4px 4px 0 0; text-align:center;"><span style="font-size:10px; color:#fff; font-weight:800;">10.6k</span></div>
          <div style="flex:1; background:var(--br); height:90%; border-radius:4px 4px 0 0; text-align:center;"><span style="font-size:10px; color:#fff; font-weight:800;">9.1k</span></div>
        </div>
        <div style="display: flex; justify-content: space-between; font-size: 11px; font-weight: 700; color: var(--mute); margin-top: 8px;">
          <span>12 PM</span><span>2 PM</span><span>4 PM</span><span>6 PM</span><span>8 PM</span><span>10 PM</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 8. ORDER REPORT ================= -->
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">ORDER FLOW VISIBILITY</div>
      <h2>Know How Your Orders <span class="sf">Are Moving.</span></h2>
      <p>Track dine-in, takeaway, delivery, and pickup channels along with real-time order status counts.</p>
    </div>

    <!-- Order Report Card -->
    <div class="win" style="max-width: 960px; margin: 0 auto; padding: 32px;">
      <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
        <h3 style="font-size: 22px;">Order Distribution & Fulfillment</h3>
        <span style="font-size: 12px; font-weight: 800; color: var(--br);">TOTAL ORDERS: 186</span>
      </div>

      <!-- Order Types Chips -->
      <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 12px; margin-bottom: 24px; text-align: center;">
        <div style="background: var(--bg2); padding: 14px; border-radius: 12px; border: 1px solid var(--line);">
          <div style="font-size: 11px; font-weight: 800; color: var(--br);">DINE-IN</div>
          <div style="font-size: 24px; font-weight: 900; color: var(--ink); margin-top: 2px;">108</div>
        </div>
        <div style="background: var(--bg2); padding: 14px; border-radius: 12px; border: 1px solid var(--line);">
          <div style="font-size: 11px; font-weight: 800; color: var(--br);">TAKEAWAY</div>
          <div style="font-size: 24px; font-weight: 900; color: var(--ink); margin-top: 2px;">42</div>
        </div>
        <div style="background: var(--bg2); padding: 14px; border-radius: 12px; border: 1px solid var(--line);">
          <div style="font-size: 11px; font-weight: 800; color: var(--br);">DELIVERY</div>
          <div style="font-size: 24px; font-weight: 900; color: var(--ink); margin-top: 2px;">24</div>
        </div>
        <div style="background: var(--bg2); padding: 14px; border-radius: 12px; border: 1px solid var(--line);">
          <div style="font-size: 11px; font-weight: 800; color: var(--br);">PICKUP</div>
          <div style="font-size: 24px; font-weight: 900; color: var(--ink); margin-top: 2px;">12</div>
        </div>
      </div>

      <!-- Fulfillment Status Grid -->
      <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 12px; font-size: 13px; font-weight: 700;">
        <div style="background: var(--green-bg); padding: 14px; border-radius: 12px; border: 1px solid rgba(16,185,129,0.2); text-align: center;">
          <div style="color: var(--green-text); font-size: 11px; font-weight: 800;">COMPLETED</div>
          <div style="font-size: 22px; font-weight: 900; color: var(--green-text); margin-top: 2px;">158</div>
        </div>
        <div style="background: var(--amber-bg); padding: 14px; border-radius: 12px; border: 1px solid rgba(245,158,11,0.2); text-align: center;">
          <div style="color: var(--amber-text); font-size: 11px; font-weight: 800;">PREPARING</div>
          <div style="font-size: 22px; font-weight: 900; color: var(--amber-text); margin-top: 2px;">12</div>
        </div>
        <div style="background: #e0f2fe; padding: 14px; border-radius: 12px; border: 1px solid rgba(3,105,161,0.2); text-align: center;">
          <div style="color: #0369a1; font-size: 11px; font-weight: 800;">PENDING</div>
          <div style="font-size: 22px; font-weight: 900; color: #0369a1; margin-top: 2px;">08</div>
        </div>
        <div style="background: var(--red-bg); padding: 14px; border-radius: 12px; border: 1px solid rgba(239,68,68,0.2); text-align: center;">
          <div style="color: var(--red-text); font-size: 11px; font-weight: 800;">CANCELLED</div>
          <div style="font-size: 22px; font-weight: 900; color: var(--red-text); margin-top: 2px;">08</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 9. TOP-SELLING ITEMS ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">MENU POPULARITY</div>
      <h2>Know What Customers <span class="sf">Order Most.</span></h2>
      <p>Identify top revenue-generating menu items to refine prep lists and optimize pricing.</p>
    </div>

    <!-- Ranked List Cards -->
    <div style="max-width: 840px; margin: 0 auto; display: flex; flex-direction: column; gap: 14px;">
      <!-- Item 1 -->
      <div style="background: #fff; padding: 18px 24px; border-radius: 16px; border: 1px solid var(--line); display: flex; align-items: center; justify-content: space-between; gap: 16px; box-shadow: var(--shadow-sm);">
        <div style="display: flex; align-items: center; gap: 16px;">
          <div style="width: 36px; height: 36px; border-radius: 10px; background: var(--br); color: #fff; font-weight: 900; display: grid; place-items: center; font-size: 16px;">01</div>
          <div>
            <h4 style="font-size: 18px; margin-bottom: 2px;">Chicken Biryani</h4>
            <div style="font-size: 13px; color: var(--mute);">Main Course • Biryani</div>
          </div>
        </div>
        <div style="text-align: right;">
          <div style="font-size: 18px; font-weight: 900; color: var(--br);">₹39,760</div>
          <div style="font-size: 12px; color: var(--mute); font-weight: 700;">142 Orders</div>
        </div>
      </div>

      <!-- Item 2 -->
      <div style="background: #fff; padding: 18px 24px; border-radius: 16px; border: 1px solid var(--line); display: flex; align-items: center; justify-content: space-between; gap: 16px;">
        <div style="display: flex; align-items: center; gap: 16px;">
          <div style="width: 36px; height: 36px; border-radius: 10px; background: var(--bg2); color: var(--br); font-weight: 900; display: grid; place-items: center; font-size: 16px;">02</div>
          <div>
            <h4 style="font-size: 18px; margin-bottom: 2px;">Margherita Pizza</h4>
            <div style="font-size: 13px; color: var(--mute);">Italian • Pizza</div>
          </div>
        </div>
        <div style="text-align: right;">
          <div style="font-size: 18px; font-weight: 900; color: var(--ink);">₹30,720</div>
          <div style="font-size: 12px; color: var(--mute); font-weight: 700;">96 Orders</div>
        </div>
      </div>

      <!-- Item 3 -->
      <div style="background: #fff; padding: 18px 24px; border-radius: 16px; border: 1px solid var(--line); display: flex; align-items: center; justify-content: space-between; gap: 16px;">
        <div style="display: flex; align-items: center; gap: 16px;">
          <div style="width: 36px; height: 36px; border-radius: 10px; background: var(--bg2); color: var(--br); font-weight: 900; display: grid; place-items: center; font-size: 16px;">03</div>
          <div>
            <h4 style="font-size: 18px; margin-bottom: 2px;">Cold Coffee</h4>
            <div style="font-size: 13px; color: var(--mute);">Beverages • Cold</div>
          </div>
        </div>
        <div style="text-align: right;">
          <div style="font-size: 18px; font-weight: 900; color: var(--ink);">₹13,440</div>
          <div style="font-size: 12px; color: var(--mute); font-weight: 700;">84 Orders</div>
        </div>
      </div>

      <!-- Item 4 -->
      <div style="background: #fff; padding: 18px 24px; border-radius: 16px; border: 1px solid var(--line); display: flex; align-items: center; justify-content: space-between; gap: 16px;">
        <div style="display: flex; align-items: center; gap: 16px;">
          <div style="width: 36px; height: 36px; border-radius: 10px; background: var(--bg2); color: var(--br); font-weight: 900; display: grid; place-items: center; font-size: 16px;">04</div>
          <div>
            <h4 style="font-size: 18px; margin-bottom: 2px;">Paneer Tikka</h4>
            <div style="font-size: 13px; color: var(--mute);">Starters • Tandoor</div>
          </div>
        </div>
        <div style="text-align: right;">
          <div style="font-size: 18px; font-weight: 900; color: var(--ink);">₹15,840</div>
          <div style="font-size: 12px; color: var(--mute); font-weight: 700;">72 Orders</div>
        </div>
      </div>

      <!-- Item 5 -->
      <div style="background: #fff; padding: 18px 24px; border-radius: 16px; border: 1px solid var(--line); display: flex; align-items: center; justify-content: space-between; gap: 16px;">
        <div style="display: flex; align-items: center; gap: 16px;">
          <div style="width: 36px; height: 36px; border-radius: 10px; background: var(--bg2); color: var(--br); font-weight: 900; display: grid; place-items: center; font-size: 16px;">05</div>
          <div>
            <h4 style="font-size: 18px; margin-bottom: 2px;">Masala Dosa</h4>
            <div style="font-size: 13px; color: var(--mute);">South Indian • Tiffin</div>
          </div>
        </div>
        <div style="text-align: right;">
          <div style="font-size: 18px; font-weight: 900; color: var(--ink);">₹10,880</div>
          <div style="font-size: 12px; color: var(--mute); font-weight: 700;">68 Orders</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 10. CATEGORY PERFORMANCE ================= -->
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">CATEGORY ANALYSIS</div>
      <h2>See Which Menu Categories <span class="sf">Drive Orders.</span></h2>
      <p>Compare revenue and order count across your restaurant's main culinary categories.</p>
    </div>

    <!-- Category Performance Visual -->
    <div class="win" style="max-width: 900px; margin: 0 auto; padding: 28px;">
      <div style="font-size: 12px; font-weight: 800; color: var(--br); margin-bottom: 20px;">CATEGORY REVENUE SUMMARY</div>
      
      <div style="display: flex; flex-direction: column; gap: 16px;">
        <!-- Category 1 -->
        <div>
          <div style="display: flex; justify-content: space-between; font-size: 14px; font-weight: 700; margin-bottom: 6px;">
            <span>Biryani</span>
            <span>₹42,500 (158 orders)</span>
          </div>
          <div style="height: 12px; background: var(--bg2); border-radius: 6px; overflow: hidden;">
            <div style="width: 100%; height: 100%; background: var(--br); border-radius: 6px;"></div>
          </div>
        </div>

        <!-- Category 2 -->
        <div>
          <div style="display: flex; justify-content: space-between; font-size: 14px; font-weight: 700; margin-bottom: 6px;">
            <span>Main Course</span>
            <span>₹36,200 (132 orders)</span>
          </div>
          <div style="height: 12px; background: var(--bg2); border-radius: 6px; overflow: hidden;">
            <div style="width: 85%; height: 100%; background: var(--br); border-radius: 6px;"></div>
          </div>
        </div>

        <!-- Category 3 -->
        <div>
          <div style="display: flex; justify-content: space-between; font-size: 14px; font-weight: 700; margin-bottom: 6px;">
            <span>Pizza</span>
            <span>₹31,400 (104 orders)</span>
          </div>
          <div style="height: 12px; background: var(--bg2); border-radius: 6px; overflow: hidden;">
            <div style="width: 74%; height: 100%; background: var(--br); border-radius: 6px;"></div>
          </div>
        </div>

        <!-- Category 4 -->
        <div>
          <div style="display: flex; justify-content: space-between; font-size: 14px; font-weight: 700; margin-bottom: 6px;">
            <span>Beverages</span>
            <span>₹18,800 (140 orders)</span>
          </div>
          <div style="height: 12px; background: var(--bg2); border-radius: 6px; overflow: hidden;">
            <div style="width: 44%; height: 100%; background: var(--br); border-radius: 6px;"></div>
          </div>
        </div>

        <!-- Category 5 -->
        <div>
          <div style="display: flex; justify-content: space-between; font-size: 14px; font-weight: 700; margin-bottom: 6px;">
            <span>Desserts</span>
            <span>₹14,600 (88 orders)</span>
          </div>
          <div style="height: 12px; background: var(--bg2); border-radius: 6px; overflow: hidden;">
            <div style="width: 34%; height: 100%; background: var(--br); border-radius: 6px;"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 11. PEAK HOURS ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">SERVICE PATTERNS</div>
      <h2>Understand Your <span class="sf">Busy Hours.</span></h2>
      <p>Use order activity to understand service patterns and staffing needs throughout the day.</p>
    </div>

    <!-- Heatmap Bar Grid -->
    <div class="win" style="max-width: 900px; margin: 0 auto; padding: 28px;">
      <div style="font-size: 12px; font-weight: 800; color: var(--br); margin-bottom: 20px; text-align: center;">HOURLY DINING RUSH HEATMAP</div>

      <div style="display: grid; grid-template-columns: repeat(8, 1fr); gap: 8px; text-align: center;">
        <div style="background: #fff; padding: 12px 6px; border-radius: 10px; border: 1px solid var(--line);">
          <div style="font-size: 11px; font-weight: 800; color: var(--mute);">12 PM</div>
          <div style="font-size: 12px; font-weight: 800; color: var(--mute); margin-top: 6px;">Low</div>
        </div>
        <div style="background: var(--amber-bg); padding: 12px 6px; border-radius: 10px; border: 1px solid rgba(245,158,11,0.3);">
          <div style="font-size: 11px; font-weight: 800; color: var(--amber-text);">1 PM</div>
          <div style="font-size: 12px; font-weight: 800; color: var(--amber-text); margin-top: 6px;">Medium</div>
        </div>
        <div style="background: var(--br-light); padding: 12px 6px; border-radius: 10px; border: 1.5px solid var(--br);">
          <div style="font-size: 11px; font-weight: 800; color: var(--br);">2 PM</div>
          <div style="font-size: 12px; font-weight: 800; color: var(--br); margin-top: 6px;">High</div>
        </div>
        <div style="background: var(--amber-bg); padding: 12px 6px; border-radius: 10px; border: 1px solid rgba(245,158,11,0.3);">
          <div style="font-size: 11px; font-weight: 800; color: var(--amber-text);">6 PM</div>
          <div style="font-size: 12px; font-weight: 800; color: var(--amber-text); margin-top: 6px;">Medium</div>
        </div>
        <div style="background: var(--br-light); padding: 12px 6px; border-radius: 10px; border: 1.5px solid var(--br);">
          <div style="font-size: 11px; font-weight: 800; color: var(--br);">7 PM</div>
          <div style="font-size: 12px; font-weight: 800; color: var(--br); margin-top: 6px;">High</div>
        </div>
        <div style="background: var(--br); color: #fff; padding: 12px 6px; border-radius: 10px;">
          <div style="font-size: 11px; font-weight: 800;">8 PM</div>
          <div style="font-size: 12px; font-weight: 900; margin-top: 6px;">Very High</div>
        </div>
        <div style="background: var(--br-light); padding: 12px 6px; border-radius: 10px; border: 1.5px solid var(--br);">
          <div style="font-size: 11px; font-weight: 800; color: var(--br);">9 PM</div>
          <div style="font-size: 12px; font-weight: 800; color: var(--br); margin-top: 6px;">High</div>
        </div>
        <div style="background: var(--amber-bg); padding: 12px 6px; border-radius: 10px; border: 1px solid rgba(245,158,11,0.3);">
          <div style="font-size: 11px; font-weight: 800; color: var(--amber-text);">10 PM</div>
          <div style="font-size: 12px; font-weight: 800; color: var(--amber-text); margin-top: 6px;">Medium</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 12. ORDER TYPE REPORT ================= -->
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">CHANNEL SPLIT</div>
      <h2>See Where Your Orders <span class="sf">Come From.</span></h2>
      <p>Analyze revenue and ticket volume across dine-in, takeaway, delivery, and pickup channels.</p>
    </div>

    <!-- Segmented Order Type Visual -->
    <div class="win" style="max-width: 860px; margin: 0 auto; padding: 28px;">
      <div class="g2" style="gap: 24px; align-items: center;">
        <!-- Donut / Progress visual -->
        <div style="text-align: center;">
          <div style="width: 160px; height: 160px; border-radius: 50%; background: conic-gradient(var(--br) 0% 58%, #b88e56 58% 80%, #3b82f6 80% 94%, #10b981 94% 100%); margin: 0 auto 12px; display: flex; align-items: center; justify-content: center; box-shadow: var(--shadow-sm);">
            <div style="width: 100px; height: 100px; border-radius: 50%; background: #fff; display: flex; flex-direction: column; align-items: center; justify-content: center;">
              <span style="font-size: 20px; font-weight: 900; color: var(--ink);">186</span>
              <span style="font-size: 10px; font-weight: 700; color: var(--mute);">ORDERS</span>
            </div>
          </div>
        </div>

        <!-- Breakdown List -->
        <div style="display: flex; flex-direction: column; gap: 10px; font-size: 14px;">
          <div style="display: flex; justify-content: space-between; padding: 10px; background: var(--bg2); border-radius: 8px;">
            <span style="display: flex; align-items: center; gap: 8px;"><i style="width:10px; height:10px; border-radius:50%; background:var(--br); display:inline-block;"></i> Dine-in (58%)</span>
            <strong>108 Orders</strong>
          </div>
          <div style="display: flex; justify-content: space-between; padding: 10px; background: var(--bg2); border-radius: 8px;">
            <span style="display: flex; align-items: center; gap: 8px;"><i style="width:10px; height:10px; border-radius:50%; background:#b88e56; display:inline-block;"></i> Takeaway (22%)</span>
            <strong>42 Orders</strong>
          </div>
          <div style="display: flex; justify-content: space-between; padding: 10px; background: var(--bg2); border-radius: 8px;">
            <span style="display: flex; align-items: center; gap: 8px;"><i style="width:10px; height:10px; border-radius:50%; background:#3b82f6; display:inline-block;"></i> Delivery (14%)</span>
            <strong>24 Orders</strong>
          </div>
          <div style="display: flex; justify-content: space-between; padding: 10px; background: var(--bg2); border-radius: 8px;">
            <span style="display: flex; align-items: center; gap: 8px;"><i style="width:10px; height:10px; border-radius:50%; background:#10b981; display:inline-block;"></i> Pickup (6%)</span>
            <strong>12 Orders</strong>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 13. PAYMENT REPORT ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">PAYMENT AUDIT</div>
      <h2>Understand Your <span class="sf">Payment Activity.</span></h2>
      <p>Review cash collection totals, credit/debit card transactions, and UPI payment methods.</p>
    </div>

    <!-- Payment Summary Card -->
    <div class="win" style="max-width: 900px; margin: 0 auto; padding: 28px;">
      <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h3 style="font-size: 22px;">Payment Method Reconciliation</h3>
        <span style="font-size: 13px; font-weight: 800; color: var(--green-text);">TOTAL COLLECTED: ₹45,280</span>
      </div>

      <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 12px; font-size: 13px;">
        <div style="background: #fff; padding: 16px; border-radius: 12px; border: 1px solid var(--line); text-align: center;">
          <div style="font-size: 11px; font-weight: 800; color: var(--mute);">CASH</div>
          <div style="font-size: 20px; font-weight: 900; color: var(--ink); margin-top: 4px;">₹18,400</div>
        </div>
        <div style="background: #fff; padding: 16px; border-radius: 12px; border: 1px solid var(--line); text-align: center;">
          <div style="font-size: 11px; font-weight: 800; color: var(--mute);">CARD</div>
          <div style="font-size: 20px; font-weight: 900; color: var(--ink); margin-top: 4px;">₹12,800</div>
        </div>
        <div style="background: #fff; padding: 16px; border-radius: 12px; border: 1px solid var(--line); text-align: center;">
          <div style="font-size: 11px; font-weight: 800; color: var(--mute);">UPI / QR</div>
          <div style="font-size: 20px; font-weight: 900; color: var(--ink); margin-top: 4px;">₹14,080</div>
        </div>
        <div style="background: #fff; padding: 16px; border-radius: 12px; border: 1px solid var(--line); text-align: center;">
          <div style="font-size: 11px; font-weight: 800; color: var(--mute);">OTHER</div>
          <div style="font-size: 20px; font-weight: 900; color: var(--mute); margin-top: 4px;">₹0</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 14. TABLE PERFORMANCE / DINING FLOOR ================= -->
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">DINING ROOM ANALYTICS</div>
      <h2>Understand Your <span class="sf">Dining Floor.</span></h2>
      <p>Monitor dining table occupancy status and table activity across your restaurant floor.</p>
    </div>

    <!-- Dining Floor Visual Card -->
    <div class="win" style="max-width: 900px; margin: 0 auto; padding: 28px;">
      <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h3 style="font-size: 20px;">Floor Status (T01 – T08)</h3>
        <span class="st-badge instock"><i class="st-dot"></i> Live Floor Sync</span>
      </div>

      <!-- Table Status Grid -->
      <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 12px; text-align: center; margin-bottom: 24px;">
        <div style="background: var(--bg2); padding: 14px; border-radius: 12px; border: 1px solid var(--line);">
          <div style="font-weight: 800; font-size: 14px; color: var(--br);">Occupied</div>
          <div style="font-size: 22px; font-weight: 900; color: var(--ink); margin-top: 2px;">16</div>
        </div>
        <div style="background: var(--green-bg); padding: 14px; border-radius: 12px; border: 1px solid rgba(16,185,129,0.2);">
          <div style="font-weight: 800; font-size: 14px; color: var(--green-text);">Available</div>
          <div style="font-size: 22px; font-weight: 900; color: var(--green-text); margin-top: 2px;">05</div>
        </div>
        <div style="background: var(--amber-bg); padding: 14px; border-radius: 12px; border: 1px solid rgba(245,158,11,0.2);">
          <div style="font-weight: 800; font-size: 14px; color: var(--amber-text);">Reserved</div>
          <div style="font-size: 22px; font-weight: 900; color: var(--amber-text); margin-top: 2px;">03</div>
        </div>
        <div style="background: var(--red-bg); padding: 14px; border-radius: 12px; border: 1px solid rgba(239,68,68,0.2);">
          <div style="font-weight: 800; font-size: 14px; color: var(--red-text);">Cleaning</div>
          <div style="font-size: 22px; font-weight: 900; color: var(--red-text); margin-top: 2px;">02</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 15. INVENTORY REPORT ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">PANTRY RECONCILIATION</div>
      <h2>Connect Sales With <span class="sf">Inventory Visibility.</span></h2>
      <p>Keep inventory purchases, stock movement, and low-stock alerts aligned with sales reports.</p>
    </div>

    <!-- Inventory Report Card -->
    <div class="win" style="max-width: 900px; margin: 0 auto; padding: 28px;">
      <div style="display: grid; grid-template-columns: repeat(5, 1fr); gap: 10px; text-align: center;">
        <div style="background: #fff; padding: 14px; border-radius: 12px; border: 1px solid var(--line);">
          <div style="font-size: 10px; font-weight: 800; color: var(--mute);">INVENTORY ITEMS</div>
          <div style="font-size: 20px; font-weight: 900; color: var(--ink); margin-top: 4px;">186</div>
        </div>
        <div style="background: var(--amber-bg); padding: 14px; border-radius: 12px; border: 1px solid rgba(245,158,11,0.2);">
          <div style="font-size: 10px; font-weight: 800; color: var(--amber-text);">LOW STOCK</div>
          <div style="font-size: 20px; font-weight: 900; color: var(--amber-text); margin-top: 4px;">28</div>
        </div>
        <div style="background: var(--red-bg); padding: 14px; border-radius: 12px; border: 1px solid rgba(239,68,68,0.2);">
          <div style="font-size: 10px; font-weight: 800; color: var(--red-text);">CRITICAL</div>
          <div style="font-size: 20px; font-weight: 900; color: var(--red-text); margin-top: 4px;">06</div>
        </div>
        <div style="background: #fff; padding: 14px; border-radius: 12px; border: 1px solid var(--line);">
          <div style="font-size: 10px; font-weight: 800; color: var(--mute);">PURCHASES</div>
          <div style="font-size: 20px; font-weight: 900; color: var(--br); margin-top: 4px;">₹18,500</div>
        </div>
        <div style="background: #fff; padding: 14px; border-radius: 12px; border: 1px solid var(--line);">
          <div style="font-size: 10px; font-weight: 800; color: var(--mute);">ADJUSTMENTS</div>
          <div style="font-size: 20px; font-weight: 900; color: var(--ink); margin-top: 4px;">14</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 16. STAFF / ACTIVITY REPORT ================= -->
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">OPERATIONAL AUDIT</div>
      <h2>Understand Restaurant <span class="sf">Activity.</span></h2>
      <p>Operational activity logs showing order counts and cashier billing transactions.</p>
    </div>

    <!-- Staff Activity Table -->
    <div class="win" style="max-width: 780px; margin: 0 auto; overflow: hidden;">
      <table class="inv-tbl">
        <thead>
          <tr>
            <th>Role</th>
            <th>Name / ID</th>
            <th>Activity Log</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td style="font-weight: 700; color: var(--br);">Waiter</td>
            <td style="font-weight: 700;">Waiter 01</td>
            <td>42 Orders Served</td>
          </tr>
          <tr>
            <td style="font-weight: 700; color: var(--br);">Waiter</td>
            <td style="font-weight: 700;">Waiter 02</td>
            <td>38 Orders Served</td>
          </tr>
          <tr>
            <td style="font-weight: 700; color: var(--br);">Cashier</td>
            <td style="font-weight: 700;">Cashier 01</td>
            <td>76 Bills Generated</td>
          </tr>
          <tr>
            <td style="font-weight: 700; color: var(--br);">Store Manager</td>
            <td style="font-weight: 700;">Manager</td>
            <td>Operations & Store Audit</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</section>

<!-- ================= 17. DATE FILTERS ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">DRILL-DOWN FILTERS</div>
      <h2>Filter Data Your Way.</h2>
      <p>Easily filter reporting views by date ranges, payment modes, menu categories, or location profiles.</p>
    </div>

    <!-- Filter Control Panel -->
    <div style="max-width: 860px; margin: 0 auto; background: #fff; padding: 24px; border-radius: 18px; border: 1px solid var(--line); display: flex; flex-wrap: wrap; gap: 14px; justify-content: center; align-items: center;">
      <span style="font-size: 13px; font-weight: 800; color: var(--br);">ACTIVE FILTERS:</span>
      <span style="padding: 6px 14px; border-radius: 20px; background: var(--br-light); color: var(--br); font-size: 12px; font-weight: 700;">Date: Today</span>
      <span style="padding: 6px 14px; border-radius: 20px; background: var(--bg2); color: var(--ink); font-size: 12px; font-weight: 600;">Order Type: All</span>
      <span style="padding: 6px 14px; border-radius: 20px; background: var(--bg2); color: var(--ink); font-size: 12px; font-weight: 600;">Payment: Cash, Card, UPI</span>
      <span style="padding: 6px 14px; border-radius: 20px; background: var(--bg2); color: var(--ink); font-size: 12px; font-weight: 600;">Category: All</span>
    </div>
  </div>
</section>

<!-- ================= 18. REPORT DETAIL VIEW ================= -->
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">DEEP DRILL-DOWN</div>
      <h2>Detailed Report <span class="sf">Interviews.</span></h2>
      <p>Examine granular sales statistics for specific days, hours, and menu categories.</p>
    </div>

    <!-- Detailed Report Card -->
    <div class="win" style="max-width: 900px; margin: 0 auto; padding: 28px;">
      <div style="display: flex; justify-content: space-between; align-items: center; padding-bottom: 16px; border-bottom: 1px solid var(--line); margin-bottom: 20px;">
        <div>
          <div style="font-size: 12px; font-weight: 800; color: var(--br);">DETAILED REPORT STATEMENT</div>
          <h3 style="font-size: 22px;">Sales Report • 29 Sep 2026</h3>
        </div>
        <div style="text-align: right;">
          <div style="font-size: 18px; font-weight: 900; color: var(--br);">Total: ₹48,620</div>
          <div style="font-size: 12px; color: var(--mute);">186 Orders • AOV ₹261</div>
        </div>
      </div>

      <!-- Sales by Hour Grid -->
      <div style="font-size: 12px; font-weight: 800; color: var(--br); margin-bottom: 10px;">SALES BY HOUR BREAKDOWN</div>
      <div style="display: grid; grid-template-columns: repeat(6, 1fr); gap: 10px; text-align: center; margin-bottom: 24px;">
        <div style="background: var(--bg2); padding: 10px; border-radius: 8px;">
          <div style="font-size: 10px; color: var(--mute);">12 PM</div>
          <div style="font-weight: 800; margin-top: 2px;">₹4,200</div>
        </div>
        <div style="background: var(--bg2); padding: 10px; border-radius: 8px;">
          <div style="font-size: 10px; color: var(--mute);">1 PM</div>
          <div style="font-weight: 800; margin-top: 2px;">₹5,100</div>
        </div>
        <div style="background: var(--bg2); padding: 10px; border-radius: 8px;">
          <div style="font-size: 10px; color: var(--mute);">2 PM</div>
          <div style="font-weight: 800; margin-top: 2px;">₹6,400</div>
        </div>
        <div style="background: var(--bg2); padding: 10px; border-radius: 8px;">
          <div style="font-size: 10px; color: var(--mute);">6 PM</div>
          <div style="font-weight: 800; margin-top: 2px;">₹8,200</div>
        </div>
        <div style="background: var(--br-light); padding: 10px; border-radius: 8px; border: 1px solid var(--br);">
          <div style="font-size: 10px; color: var(--br); font-weight: 800;">7 PM</div>
          <div style="font-weight: 900; color: var(--br); margin-top: 2px;">₹10,600</div>
        </div>
        <div style="background: var(--bg2); padding: 10px; border-radius: 8px;">
          <div style="font-size: 10px; color: var(--mute);">8 PM</div>
          <div style="font-weight: 800; margin-top: 2px;">₹9,120</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 20. MULTI-BRANCH REPORTING ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">MULTI-LOCATION OVERVIEW</div>
      <h2>See Business Activity <span class="sf">Across Locations.</span></h2>
      <p>Consolidate sales performance and order activity across branch restaurant outlets.</p>
    </div>

    <!-- Multi-Branch Visual Card -->
    <div class="win" style="max-width: 900px; margin: 0 auto; padding: 28px;">
      <div style="display: flex; gap: 10px; margin-bottom: 24px; border-bottom: 1px solid var(--line); padding-bottom: 14px; flex-wrap: wrap;">
        <button style="padding: 8px 18px; border-radius: 8px; border: none; background: var(--br); color: #fff; font-size: 13px; font-weight: 700;">All Branches</button>
        <button style="padding: 8px 18px; border-radius: 8px; border: 1px solid var(--line); background: #fff; color: var(--mute); font-size: 13px; font-weight: 600;">Chennai</button>
        <button style="padding: 8px 18px; border-radius: 8px; border: 1px solid var(--line); background: #fff; color: var(--mute); font-size: 13px; font-weight: 600;">Coimbatore</button>
        <button style="padding: 8px 18px; border-radius: 8px; border: 1px solid var(--line); background: #fff; color: var(--mute); font-size: 13px; font-weight: 600;">Salem</button>
        <button style="padding: 8px 18px; border-radius: 8px; border: 1px solid var(--line); background: #fff; color: var(--mute); font-size: 13px; font-weight: 600;">Tiruchengode</button>
      </div>

      <!-- All Branches Summary Grid -->
      <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; text-align: center;">
        <div style="background: #fff; padding: 20px; border-radius: 14px; border: 1px solid var(--line);">
          <div style="font-size: 11px; font-weight: 800; color: var(--mute);">COMBINED SALES</div>
          <div style="font-size: 28px; font-weight: 900; color: var(--br); font-family: 'Outfit', sans-serif; margin-top: 4px;">₹1,86,420</div>
        </div>
        <div style="background: #fff; padding: 20px; border-radius: 14px; border: 1px solid var(--line);">
          <div style="font-size: 11px; font-weight: 800; color: var(--mute);">TOTAL ORDERS</div>
          <div style="font-size: 28px; font-weight: 900; color: var(--ink); font-family: 'Outfit', sans-serif; margin-top: 4px;">642</div>
        </div>
        <div style="background: #fff; padding: 20px; border-radius: 14px; border: 1px solid var(--line);">
          <div style="font-size: 11px; font-weight: 800; color: var(--mute);">ACTIVE BRANCHES</div>
          <div style="font-size: 28px; font-weight: 900; color: var(--green-text); font-family: 'Outfit', sans-serif; margin-top: 4px;">04</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 21. REPORT EXPORT ================= -->
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">EXPORT & SHARING</div>
      <h2>Export Reports <span class="sf">With Ease.</span></h2>
      <p>Download daily and monthly sales summaries in standard format options.</p>
    </div>

    <!-- Report Export Card -->
    <div class="win" style="max-width: 600px; margin: 0 auto; padding: 28px; text-align: center;">
      <div style="font-size: 12px; font-weight: 800; color: var(--br); margin-bottom: 6px;">REPORT EXPORT STATEMENT</div>
      <h3 style="font-size: 20px; margin-bottom: 16px;">Sales & Tax Report • 29 Sep 2026</h3>

      <div style="display: flex; gap: 12px; justify-content: center; margin-bottom: 20px;">
        <label style="padding: 10px 18px; border-radius: 10px; border: 1.5px solid var(--br); background: var(--br-light); color: var(--br); font-size: 13px; font-weight: 800; cursor: pointer;">
          <input type="radio" name="fmt" checked style="accent-color: var(--br);"> PDF Format
        </label>
        <label style="padding: 10px 18px; border-radius: 10px; border: 1px solid var(--line); background: #fff; color: var(--ink); font-size: 13px; font-weight: 700; cursor: pointer;">
          <input type="radio" name="fmt" style="accent-color: var(--br);"> CSV Data
        </label>
        <label style="padding: 10px 18px; border-radius: 10px; border: 1px solid var(--line); background: #fff; color: var(--ink); font-size: 13px; font-weight: 700; cursor: pointer;">
          <input type="radio" name="fmt" style="accent-color: var(--br);"> Excel Sheet
        </label>
      </div>

      <button onclick="alert('Demo Mode: Report export simulated successfully.')" class="btn p" style="width: 100%; justify-content: center;">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
        Export Report
      </button>
    </div>
  </div>
</section>

<!-- ================= 22. MOBILE REPORTING ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">RESPONSIVE VISIBILITY</div>
      <h2>Restaurant Insights, <span class="sf">Wherever You Manage.</span></h2>
      <p>Access clean, readable sales and order metrics on desktop, tablet, or smartphone.</p>
    </div>

    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 32px; align-items: center; max-width: 1040px; margin: 0 auto;">
      <!-- Desktop View -->
      <div class="win" style="padding: 20px;">
        <div class="wb" style="margin: -20px -20px 16px; padding: 10px 16px;">
          <div class="dots"><i></i><i></i><i></i></div>
          <div class="ttl">DESKTOP REPORTING DASHBOARD</div>
        </div>
        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px; font-size: 12px; text-align: center;">
          <div style="background: var(--bg2); padding: 10px; border-radius: 8px;">Sales: <strong>₹48,620</strong></div>
          <div style="background: var(--bg2); padding: 10px; border-radius: 8px;">Orders: <strong>186</strong></div>
          <div style="background: var(--bg2); padding: 10px; border-radius: 8px;">AOV: <strong>₹261</strong></div>
        </div>
      </div>

      <!-- Mobile Screen Mockup -->
      <div style="background: #fff; border: 4px solid var(--ink); border-radius: 28px; padding: 18px 14px; box-shadow: var(--shadow-md);">
        <div style="width: 50px; height: 4px; background: #ccc; border-radius: 2px; margin: 0 auto 14px;"></div>
        <div style="font-size: 11px; font-weight: 800; color: var(--br); margin-bottom: 8px; text-transform: uppercase;">TODAY'S SUMMARY</div>

        <div style="display: flex; flex-direction: column; gap: 8px;">
          <div style="padding: 10px; background: var(--bg2); border-radius: 8px; font-size: 12px; display: flex; justify-content: space-between;">
            <span>Sales:</span> <strong style="color: var(--br);">₹48,620</strong>
          </div>
          <div style="padding: 10px; background: var(--bg2); border-radius: 8px; font-size: 12px; display: flex; justify-content: space-between;">
            <span>Orders:</span> <strong>186</strong>
          </div>
          <div style="padding: 10px; background: var(--bg2); border-radius: 8px; font-size: 12px; display: flex; justify-content: space-between;">
            <span>AOV:</span> <strong>₹261</strong>
          </div>
          <div style="padding: 10px; background: var(--br-light); border-radius: 8px; font-size: 11px;">
            <div style="font-weight: 800; color: var(--br);">Top Item:</div>
            <div style="font-weight: 700; color: var(--ink); margin-top: 2px;">Chicken Biryani (142 orders)</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 23. RESTAURANT INDUSTRIES ================= -->
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">TAILORED FOR FOOD BUSINESSES</div>
      <h2>Reports for <span class="sf">Every Food Business.</span></h2>
      <p>Designed for diverse restaurant business models, from fine dining kitchens to multi-outlet cloud kitchens.</p>
    </div>

    <div class="ind-grid">
      <!-- 1. Fine Dining -->
      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&w=600&q=80');">
          <div class="ind-overlay"></div>
          <div class="ind-icon"><svg viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg></div>
        </div>
        <div class="ind-content">
          <h4>Fine Dining Restaurants</h4>
          <p>Understand sales, order volume, and dining floor activity.</p>
        </div>
      </div>

      <!-- 2. Casual Dining -->
      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1555396273-367ea4eb4db5?auto=format&fit=crop&w=600&q=80');">
          <div class="ind-overlay"></div>
          <div class="ind-icon"><svg viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/></svg></div>
        </div>
        <div class="ind-content">
          <h4>Casual Dining</h4>
          <p>Analyze peak hours, popular menu items, and revenue channels.</p>
        </div>
      </div>

      <!-- 3. Family Restaurants -->
      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1544025162-d76694265947?auto=format&fit=crop&w=600&q=80');">
          <div class="ind-overlay"></div>
          <div class="ind-icon"><svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/></svg></div>
        </div>
        <div class="ind-content">
          <h4>Family Restaurants</h4>
          <p>Track large order receipts, payment modes, and category trends.</p>
        </div>
      </div>

      <!-- 4. Multi-Cuisine -->
      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1618160702438-9b02ab6515c9?auto=format&fit=crop&w=600&q=80');">
          <div class="ind-overlay"></div>
          <div class="ind-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"/></svg></div>
        </div>
        <div class="ind-content">
          <h4>Multi-Cuisine</h4>
          <p>Compare performance across diverse culinary menu sections.</p>
        </div>
      </div>

      <!-- 5. QSR / Fast Food -->
      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1561758033-d89a9ad46330?auto=format&fit=crop&w=600&q=80');">
          <div class="ind-overlay"></div>
          <div class="ind-icon"><svg viewBox="0 0 24 24"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg></div>
        </div>
        <div class="ind-content">
          <h4>QSR / Fast Food</h4>
          <p>Monitor high-volume ticket activity and fast counter billing.</p>
        </div>
      </div>

      <!-- 6. Cafés -->
      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1501339847302-ac426a4a7cbb?auto=format&fit=crop&w=600&q=80');">
          <div class="ind-overlay"></div>
          <div class="ind-icon"><svg viewBox="0 0 24 24"><path d="M18 8h1a4 4 0 010 8h-1M2 8h16v9a4 4 0 01-4 4H6a4 4 0 01-4-4V8z"/></svg></div>
        </div>
        <div class="ind-content">
          <h4>Cafés</h4>
          <p>Understand beverage sales patterns and snack item popularity.</p>
        </div>
      </div>

      <!-- 7. Bakeries -->
      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1509440159596-0249088772ff?auto=format&fit=crop&w=600&q=80');">
          <div class="ind-overlay"></div>
          <div class="ind-icon"><svg viewBox="0 0 24 24"><path d="M12 2a10 10 0 100 20 10 10 0 000-20z"/></svg></div>
        </div>
        <div class="ind-content">
          <h4>Bakeries</h4>
          <p>Track product sales and daily baked item performance.</p>
        </div>
      </div>

      <!-- 8. Pizzerias -->
      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1513104890138-7c749659a591?auto=format&fit=crop&w=600&q=80');">
          <div class="ind-overlay"></div>
          <div class="ind-icon"><svg viewBox="0 0 24 24"><polygon points="12 2 22 22 2 22 12 2"/></svg></div>
        </div>
        <div class="ind-content">
          <h4>Pizzerias</h4>
          <p>Monitor takeout vs dine-in ratios and top pizza size orders.</p>
        </div>
      </div>

      <!-- 9. Hotels & Resorts -->
      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=600&q=80');">
          <div class="ind-overlay"></div>
          <div class="ind-icon"><svg viewBox="0 0 24 24"><path d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16"/></svg></div>
        </div>
        <div class="ind-content">
          <h4>Hotels & Resorts</h4>
          <p>Bring restaurant reporting into hospitality dining operations.</p>
        </div>
      </div>

      <!-- 10. Food Courts -->
      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1552566626-52f8b828add9?auto=format&fit=crop&w=600&q=80');">
          <div class="ind-overlay"></div>
          <div class="ind-icon"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg></div>
        </div>
        <div class="ind-content">
          <h4>Food Courts</h4>
          <p>Track counter sales across fast-paced dining stall locations.</p>
        </div>
      </div>

      <!-- 11. Cloud Kitchens -->
      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1556910103-1c02745aae4d?auto=format&fit=crop&w=600&q=80');">
          <div class="ind-overlay"></div>
          <div class="ind-icon"><svg viewBox="0 0 24 24"><path d="M18 10h-1.26A8 8 0 109 20h9a5 5 0 000-10z"/></svg></div>
        </div>
        <div class="ind-content">
          <h4>Cloud Kitchens</h4>
          <p>Understand incoming delivery orders and sales channel mix.</p>
        </div>
      </div>

      <!-- 12. Canteens -->
      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1576867757603-05b134ebc379?auto=format&fit=crop&w=600&q=80');">
          <div class="ind-overlay"></div>
          <div class="ind-icon"><svg viewBox="0 0 24 24"><path d="M3 21h18M5 21V7l8-4 8 4v14"/></svg></div>
        </div>
        <div class="ind-content">
          <h4>Canteens</h4>
          <p>Track high-volume meal sales and daily billing summaries.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 24. REPORTING ECOSYSTEM ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">INTEGRATED VISIBILITY</div>
      <h2>Every Restaurant Action <span class="sf">Can Become Useful Data.</span></h2>
      <p>Reports serves as the central visibility layer connecting all operational modules across Geni Menu.</p>
    </div>

    <!-- Central Node Ecosystem Diagram -->
    <div style="max-width: 900px; margin: 0 auto; background: #fff; padding: 40px 24px; border-radius: 24px; border: 1px solid var(--line); text-align: center;">
      <!-- Central Hub -->
      <div style="width: 180px; height: 180px; border-radius: 50%; background: linear-gradient(135deg, #876039 0%, #a87646 100%); color: #fff; display: flex; flex-direction: column; align-items: center; justify-content: center; margin: 0 auto 36px; box-shadow: 0 10px 30px rgba(135,96,57,0.3); border: 4px solid #fff;">
        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
        <div style="font-size: 14px; font-weight: 900; margin-top: 6px;">REPORTS</div>
        <div style="font-size: 10px; opacity: 0.9;">VISIBILITY LAYER</div>
      </div>

      <!-- Surrounding Connected Nodes Grid -->
      <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 12px; font-size: 12.5px; font-weight: 700;">
        <div style="background: var(--bg2); padding: 12px; border-radius: 12px; border: 1px solid var(--line);">Menu Management</div>
        <div style="background: var(--bg2); padding: 12px; border-radius: 12px; border: 1px solid var(--line);">Order Management</div>
        <div style="background: var(--bg2); padding: 12px; border-radius: 12px; border: 1px solid var(--line);">POS Management</div>
        <div style="background: var(--bg2); padding: 12px; border-radius: 12px; border: 1px solid var(--line);">Table Management</div>
        <div style="background: var(--bg2); padding: 12px; border-radius: 12px; border: 1px solid var(--line);">Reservations</div>
        <div style="background: var(--bg2); padding: 12px; border-radius: 12px; border: 1px solid var(--line);">Waiter Requests</div>
        <div style="background: var(--bg2); padding: 12px; border-radius: 12px; border: 1px solid var(--line);">KOT Management</div>
        <div style="background: var(--bg2); padding: 12px; border-radius: 12px; border: 1px solid var(--line);">Inventory</div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 25. DATA TO DECISION WORKFLOW ================= -->
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">OPERATIONAL INSIGHT WORKFLOW</div>
      <h2>From Restaurant Activity <span class="sf">to Business Insight.</span></h2>
      <p>Transform daily dining transactions into organized operational clarity.</p>
    </div>

    <!-- Workflow Banner -->
    <div class="win" style="max-width: 1000px; margin: 0 auto; padding: 32px;">
      <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 10px; font-size: 12.5px; font-weight: 800; text-align: center;">
        <div style="padding: 10px 14px; background: var(--bg2); border-radius: 10px; border: 1px solid var(--line);">DATA COLLECTED</div>
        <div style="color: var(--br);">→</div>
        <div style="padding: 10px 14px; background: var(--bg2); border-radius: 10px; border: 1px solid var(--line);">DATA ORGANIZED</div>
        <div style="color: var(--br);">→</div>
        <div style="padding: 10px 14px; background: var(--bg2); border-radius: 10px; border: 1px solid var(--line);">REPORT GENERATED</div>
        <div style="color: var(--br);">→</div>
        <div style="padding: 10px 14px; background: var(--bg2); border-radius: 10px; border: 1px solid var(--line);">TREND UNDERSTOOD</div>
        <div style="color: var(--br);">→</div>
        <div style="padding: 10px 14px; background: var(--br); color: #fff; border-radius: 10px;">BUSINESS ACTION</div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 26. BUSINESS BENEFITS ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">OPERATIONAL ADVANTAGES</div>
      <h2>Built for Clearer <span class="sf">Restaurant Visibility.</span></h2>
      <p>Give your management team transparent metrics to operate with confidence.</p>
    </div>

    <div class="g3">
      <!-- Card 1 -->
      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 14px;">
          <svg viewBox="0 0 24 24"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/></svg>
        </div>
        <h4 style="font-size: 18px; margin-bottom: 6px;">Sales Visibility</h4>
        <p style="font-size: 14px;">Understand restaurant gross and net sales activity across shifts.</p>
      </div>

      <!-- Card 2 -->
      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 14px;">
          <svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/></svg>
        </div>
        <h4 style="font-size: 18px; margin-bottom: 6px;">Order Insights</h4>
        <p style="font-size: 14px;">See total order volume breakdown across dine-in, delivery, and takeaway.</p>
      </div>

      <!-- Card 3 -->
      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 14px;">
          <svg viewBox="0 0 24 24"><path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9"/></svg>
        </div>
        <h4 style="font-size: 18px; margin-bottom: 6px;">Menu Performance</h4>
        <p style="font-size: 14px;">Understand top item order counts and popular menu categories.</p>
      </div>

      <!-- Card 4 -->
      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 14px;">
          <svg viewBox="0 0 24 24"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="M6 8h12M6 12h8"/></svg>
        </div>
        <h4 style="font-size: 18px; margin-bottom: 6px;">Payment Visibility</h4>
        <p style="font-size: 14px;">Review payment transaction summaries across Cash, Card, and UPI.</p>
      </div>

      <!-- Card 5 -->
      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 14px;">
          <svg viewBox="0 0 24 24"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
        </div>
        <h4 style="font-size: 18px; margin-bottom: 6px;">Operational Reporting</h4>
        <p style="font-size: 14px;">Bring restaurant operational data into one connected reporting view.</p>
      </div>

      <!-- Card 6 -->
      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 14px;">
          <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/></svg>
        </div>
        <h4 style="font-size: 18px; margin-bottom: 6px;">Multi-Period Analysis</h4>
        <p style="font-size: 14px;">Compare daily, weekly, and monthly reporting views with ease.</p>
      </div>
    </div>
  </div>
</section>

<!-- ================= 27. WHY GENI MENU ================= -->
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">THE GENI MENU DIFFERENCE</div>
      <h2>More Than <span class="sf">a Sales Dashboard.</span></h2>
      <p>Geni Menu brings together data from your menu, tables, orders, kitchen, POS, payments and inventory so restaurant teams can understand their operations from one connected platform.</p>
    </div>

    <!-- Ecosystem Pill Matrix -->
    <div style="display: flex; flex-wrap: wrap; gap: 12px; justify-content: center; max-width: 900px; margin: 0 auto;">
      <span style="padding: 10px 20px; border-radius: 99px; background: var(--bg2); border: 1px solid var(--line); font-size: 14px; font-weight: 700; color: var(--ink);">Digital Menu</span>
      <span style="padding: 10px 20px; border-radius: 99px; background: var(--bg2); border: 1px solid var(--line); font-size: 14px; font-weight: 700; color: var(--ink);">Menu Management</span>
      <span style="padding: 10px 20px; border-radius: 99px; background: var(--bg2); border: 1px solid var(--line); font-size: 14px; font-weight: 700; color: var(--ink);">Table Management</span>
      <span style="padding: 10px 20px; border-radius: 99px; background: var(--bg2); border: 1px solid var(--line); font-size: 14px; font-weight: 700; color: var(--ink);">Reservations</span>
      <span style="padding: 10px 20px; border-radius: 99px; background: var(--bg2); border: 1px solid var(--line); font-size: 14px; font-weight: 700; color: var(--ink);">Waiter Requests</span>
      <span style="padding: 10px 20px; border-radius: 99px; background: var(--bg2); border: 1px solid var(--line); font-size: 14px; font-weight: 700; color: var(--ink);">Order Management</span>
      <span style="padding: 10px 20px; border-radius: 99px; background: var(--bg2); border: 1px solid var(--line); font-size: 14px; font-weight: 700; color: var(--ink);">KOT Management</span>
      <span style="padding: 10px 20px; border-radius: 99px; background: var(--bg2); border: 1px solid var(--line); font-size: 14px; font-weight: 700; color: var(--ink);">POS</span>
      <span style="padding: 10px 20px; border-radius: 99px; background: var(--bg2); border: 1px solid var(--line); font-size: 14px; font-weight: 700; color: var(--ink);">Inventory</span>
      <span style="padding: 10px 20px; border-radius: 99px; background: var(--bg2); border: 1px solid var(--line); font-size: 14px; font-weight: 700; color: var(--ink);">Payments</span>
      <span style="padding: 10px 20px; border-radius: 99px; background: var(--bg2); border: 1px solid var(--line); font-size: 14px; font-weight: 700; color: var(--ink);">Staff</span>
      <span style="padding: 10px 20px; border-radius: 99px; background: var(--br-light); border: 1.5px solid var(--br); font-size: 14px; font-weight: 800; color: var(--br);">Reports & Analytics</span>
      <span style="padding: 10px 20px; border-radius: 99px; background: var(--bg2); border: 1px solid var(--line); font-size: 14px; font-weight: 700; color: var(--ink);">Multiple Kitchen</span>
      <span style="padding: 10px 20px; border-radius: 99px; background: var(--bg2); border: 1px solid var(--line); font-size: 14px; font-weight: 700; color: var(--ink);">Multiple Branch</span>
    </div>
  </div>
</section>

<!-- ================= 28. FAQ ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">FREQUENTLY ASKED QUESTIONS</div>
      <h2>Reports & Analytics <span class="sf">FAQ.</span></h2>
      <p>Everything you need to know about understanding sales, orders, and operational metrics in Geni Menu.</p>
    </div>

    <div class="faq-list">
      <!-- Q1 -->
      <div class="faq-item open">
        <div class="faq-q" onclick="toggleFaq(this)">
          1. What types of reports are available in Geni Menu?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Geni Menu provides comprehensive operational reports covering daily sales, order volume, item popularities, category summaries, payment method breakdowns, and table occupancy activity.
        </div>
      </div>

      <!-- Q2 -->
      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          2. Can I view daily sales reports?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. You can review gross sales, applied discounts, collected tax amounts, and net sales totals for any selected day or date range.
        </div>
      </div>

      <!-- Q3 -->
      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          3. Can I see order reports?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Order reports display total completed tickets, average order values, and fulfillment status counts across dine-in, takeaway, delivery, and pickup channels.
        </div>
      </div>

      <!-- Q4 -->
      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          4. Can I see top-selling menu items?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. The menu performance section lists top-selling dishes ranked by order quantity and total revenue generated.
        </div>
      </div>

      <!-- Q5 -->
      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          5. Can I view category performance?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. You can examine sales figures and order counts grouped by menu categories such as Main Course, Biryani, Pizza, Beverages, and Desserts.
        </div>
      </div>

      <!-- Q6 -->
      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          6. Can I view payment summaries?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Payment reports break down total collections by cash, credit/debit cards, and UPI payment methods.
        </div>
      </div>

      <!-- Q7 -->
      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          7. Can I filter reports by date?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Filter options allow you to switch views between Today, Yesterday, This Week, This Month, or custom date periods.
        </div>
      </div>

      <!-- Q8 -->
      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          8. Can I filter reports by order type?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. You can isolate reporting data specifically for Dine-in, Takeaway, Delivery, or Pickup orders.
        </div>
      </div>

      <!-- Q9 -->
      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          9. Can Reports connect with Inventory Management?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Reports presents inventory metrics including total items, low-stock alerts, and store room purchase totals alongside sales figures.
        </div>
      </div>

      <!-- Q10 -->
      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          10. Can Reports connect with POS?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Sales transactions completed at the POS counter populate the central reports dashboard in real time.
        </div>
      </div>

      <!-- Q11 -->
      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          11. Can I view branch-wise reports?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Multi-branch restaurants can compare sales volume and order metrics across different branch locations from one central view.
        </div>
      </div>

      <!-- Q12 -->
      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          12. Can I export reports?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Reports can be exported into standard file formats like PDF, CSV, and Excel for accounting records.
        </div>
      </div>

      <!-- Q13 -->
      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          13. Can restaurant managers access reports on mobile?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. The Geni Menu reporting interface is fully responsive, enabling owners to check sales and order stats from smartphones and tablets.
        </div>
      </div>

      <!-- Q14 -->
      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          14. Is Geni Menu Reports suitable for small restaurants?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Geni Menu Reports is clean, intuitive, and designed to provide clear visibility for small cafés and food outlets as well as multi-location operations.
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 29. FINAL CTA ================= -->
<section style="padding: 100px 0; background: linear-gradient(135deg, #241A14 0%, #3a2b21 100%); color: #fff; position: relative; overflow: hidden;">
  <!-- Background subtle pattern -->
  <div style="position: absolute; inset: 0; background: radial-gradient(circle at right center, rgba(135,96,57,0.25) 0%, transparent 60%); pointer-events: none;"></div>

  <div class="w" style="text-align: center; position: relative; z-index: 1;">
    <div class="eb" style="background: rgba(255,255,255,0.1); border-color: rgba(255,255,255,0.2); color: #fff; margin-bottom: 24px;">
      READY FOR CLEAR RESTAURANT VISIBILITY?
    </div>

    <h2 style="color: #fff; font-size: clamp(32px, 4.5vw, 52px); margin-bottom: 20px;">
      Understand Your Restaurant <span style="color: #c89659; font-family: 'Playfair Display', serif; font-style: italic;">Beyond the Counter.</span>
    </h2>

    <p style="color: rgba(255,255,255,0.8); font-size: 18px; max-width: 640px; margin: 0 auto 36px;">
      Bring sales, orders, payments, menu activity and restaurant operations into one connected reporting experience with Geni Menu.
    </p>

    <div style="display: flex; gap: 16px; justify-content: center; flex-wrap: wrap;">
      <a href="https://menu.wegeni.com/register" class="btn p" style="padding: 16px 36px; font-size: 16px;">Get Started →</a>
      <a href="{{ route('contact.us') }}" class="btn o" style="padding: 16px 36px; font-size: 16px; background: rgba(255,255,255,0.1); color: #fff; border-color: rgba(255,255,255,0.3);">Book a Demo</a>
    </div>
  </div>
</section>



<!-- JavaScript for Interactivity -->
<script>
// Navbar Shadow State on Scroll
window.addEventListener('scroll', function() {
  const nav = document.getElementById('nb');
  if (window.scrollY > 20) {
    nav.classList.add('s');
  } else {
    nav.classList.remove('s');
  }
});

// Mobile Hamburger Toggle
const hmb = document.getElementById('hmb');
const mnav = document.getElementById('mnav');
if (hmb && mnav) {
  hmb.addEventListener('click', function() {
    mnav.classList.add('open');
  });
}

// Date Selector Filter Simulation
function selectDateFilter(label, btn) {
  const dateBtns = document.querySelectorAll('.date-btn');
  dateBtns.forEach(b => {
    b.style.background = 'transparent';
    b.style.color = 'var(--mute)';
    b.classList.remove('active');
  });

  btn.style.background = 'var(--br)';
  btn.style.color = '#fff';
  btn.classList.add('active');
}

// FAQ Accordion Toggle
function toggleFaq(element) {
  const parent = element.parentElement;
  const isOpen = parent.classList.contains('open');

  document.querySelectorAll('.faq-item').forEach(item => {
    item.classList.remove('open');
  });

  if (!isOpen) {
    parent.classList.add('open');
  }
}
</script>

@endsection
