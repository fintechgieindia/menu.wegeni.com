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
  --gray-bg: #f3f4f6;
  --gray-text: #4b5563;
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
.wb .ttl { color: var(--br); font-weight: 500; font-family: 'Outfit', sans-serif; letter-spacing: 0.05em; font-size: 12px; text-transform: uppercase; }

/* Badges & Status */
.st-badge { font-size: 11.5px; font-weight: 500; padding: 4px 10px; border-radius: 8px; text-transform: uppercase; display: inline-flex; align-items: center; gap: 5px; letter-spacing: .03em; }
.st-badge.instock { background: var(--green-bg); color: var(--green-text); }
.st-badge.lowstock { background: var(--amber-bg); color: var(--amber-text); }
.st-badge.critical { background: var(--red-bg); color: var(--red-text); }
.st-badge.outofstock { background: var(--gray-bg); color: var(--gray-text); }
.st-dot { width: 7px; height: 7px; border-radius: 50%; display: inline-block; }
.st-badge.instock .st-dot { background: var(--green); }
.st-badge.lowstock .st-dot { background: var(--amber); }
.st-badge.critical .st-dot { background: var(--red); }
.st-badge.outofstock .st-dot { background: var(--gray-text); }

/* Table styling */
.inv-tbl { width: 100%; border-collapse: collapse; text-align: left; font-size: 13.5px; }
.inv-tbl th { background: var(--bg2); padding: 12px 16px; font-weight: 500; font-size: 11.5px; text-transform: uppercase; letter-spacing: 0.05em; color: var(--mute); border-bottom: 1px solid var(--line); }
.inv-tbl td { padding: 14px 16px; border-bottom: 1px solid rgba(135,96,57,0.08); vertical-align: middle; color: var(--ink); }
.inv-tbl tr:last-child td { border-bottom: none; }
.inv-tbl tr:hover td { background: rgba(249, 246, 240, 0.6); }

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
    <span class="cur">Inventory Management</span>
  </div>
</div>

<!-- ================= 2. PAGE HERO ================= -->
<section style="padding: 60px 0 80px; background: linear-gradient(180deg, var(--bg2) 0%, #ffffff 100%); border-bottom: 1px solid var(--line);">
  <div class="w">
    <div class="g2" style="gap: 50px; align-items: center;">
      <!-- Hero Left Text -->
      <div>
        <div class="eb">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"/><polyline points="3.27 6.96 12 12.01 20.73 6.96"/><line x1="12" y1="22.08" x2="12" y2="12"/></svg>
          INVENTORY MANAGEMENT
        </div>
        <h1 style="margin-bottom: 20px;">
          Know What You Have. <br>
          <span class="sf">Know What You Need.</span>
        </h1>
        <p style="font-size: 18px; margin-bottom: 32px; max-width: 540px; color: var(--mute);">
          Track ingredients, monitor stock levels and understand inventory movement so your restaurant team can stay prepared for daily service.
        </p>

        <div style="display: flex; gap: 16px; flex-wrap: wrap; margin-bottom: 36px;">
          <a href="{{ route('restaurant_signup') }}" onclick="if(typeof openPopup === 'function'){ openPopup(); return false; }" class="btn p">Get Started →</a>
          <a href="{{ route('contact.us') }}" class="btn o">Book a Demo</a>
        </div>

        <!-- Factual highlights -->
        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; padding-top: 24px; border-top: 1px solid var(--line);">
          <div>
            <div style="font-size: 22px; font-weight: 500; color: var(--br); font-family: 'Outfit', sans-serif;">Real-Time</div>
            <div style="font-size: 12px; font-weight: 600; color: var(--mute);">Stock Tracking</div>
          </div>
          <div>
            <div style="font-size: 22px; font-weight: 500; color: var(--br); font-family: 'Outfit', sans-serif;">Unit-Based</div>
            <div style="font-size: 12px; font-weight: 600; color: var(--mute);">kg, L, pcs & Packs</div>
          </div>
          <div>
            <div style="font-size: 22px; font-weight: 500; color: var(--br); font-family: 'Outfit', sans-serif;">Alerts</div>
            <div style="font-size: 12px; font-weight: 600; color: var(--mute);">Low Stock Warnings</div>
          </div>
        </div>
      </div>

      <!-- Hero Right Visual: Restaurant Inventory Dashboard -->
      <div style="position: relative;">
        <!-- Kitchen ambience background accent -->
        <div style="position: absolute; inset: -20px; background: radial-gradient(circle at center, rgba(135,96,57,0.1) 0%, transparent 70%); border-radius: 30px; z-index: 0; pointer-events: none;"></div>
        
        <div class="win" style="position: relative; z-index: 1;">
          <div class="wb">
            <div class="dots"><i></i><i></i><i></i></div>
            <div class="ttl">INVENTORY WORKSPACE • MAIN KITCHEN</div>
            <div style="display:flex; align-items:center; gap:8px; font-size:11px; color:var(--mute); font-weight:700;">
              <span style="width:8px; height:8px; border-radius:50%; background:var(--green); display:inline-block;"></span> LIVE SYNC
            </div>
          </div>

          <div style="padding: 20px; background: #faf8f5;">
            <!-- Stock Overview Stat Chips -->
            <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 10px; margin-bottom: 18px;">
              <div style="background: #fff; border: 1px solid var(--line); border-radius: 12px; padding: 12px 14px;">
                <div style="font-size: 10px; font-weight: 500; color: var(--mute); text-transform: uppercase;">Total Items</div>
                <div style="font-size: 22px; font-weight: 500; color: var(--ink); font-family: 'Outfit', sans-serif;">186</div>
              </div>
              <div style="background: #fff; border: 1px solid var(--line); border-radius: 12px; padding: 12px 14px;">
                <div style="font-size: 10px; font-weight: 500; color: var(--green-text); text-transform: uppercase;">In Stock</div>
                <div style="font-size: 22px; font-weight: 500; color: var(--green); font-family: 'Outfit', sans-serif;">142</div>
              </div>
              <div style="background: #fff; border: 1px solid var(--line); border-radius: 12px; padding: 12px 14px;">
                <div style="font-size: 10px; font-weight: 500; color: var(--amber-text); text-transform: uppercase;">Low Stock</div>
                <div style="font-size: 22px; font-weight: 500; color: var(--amber); font-family: 'Outfit', sans-serif;">28</div>
              </div>
              <div style="background: #fff; border: 1px solid var(--line); border-radius: 12px; padding: 12px 14px;">
                <div style="font-size: 10px; font-weight: 500; color: var(--red-text); text-transform: uppercase;">Critical</div>
                <div style="font-size: 22px; font-weight: 500; color: var(--red); font-family: 'Outfit', sans-serif;">16</div>
              </div>
            </div>

            <!-- Table + Alert Split Grid -->
            <div style="display: grid; grid-template-columns: 2.2fr 1fr; gap: 14px;">
              <!-- Ingredient Table -->
              <div style="background: #fff; border: 1px solid var(--line); border-radius: 14px; overflow: hidden;">
                <table class="inv-tbl">
                  <thead>
                    <tr>
                      <th>Ingredient</th>
                      <th>Stock</th>
                      <th>Unit</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td style="font-weight: 700;">Basmati Rice</td>
                      <td style="font-weight: 500;">42 kg</td>
                      <td>kg</td>
                      <td><span class="st-badge instock"><i class="st-dot"></i> In Stock</span></td>
                    </tr>
                    <tr>
                      <td style="font-weight: 700;">Cooking Oil</td>
                      <td style="font-weight: 500;">18 L</td>
                      <td>L</td>
                      <td><span class="st-badge instock"><i class="st-dot"></i> In Stock</span></td>
                    </tr>
                    <tr>
                      <td style="font-weight: 700;">Chicken</td>
                      <td style="font-weight: 500; color: var(--amber-text);">12 kg</td>
                      <td>kg</td>
                      <td><span class="st-badge lowstock"><i class="st-dot"></i> Low Stock</span></td>
                    </tr>
                    <tr>
                      <td style="font-weight: 700;">Paneer</td>
                      <td style="font-weight: 500; color: var(--amber-text);">5 kg</td>
                      <td>kg</td>
                      <td><span class="st-badge lowstock"><i class="st-dot"></i> Low Stock</span></td>
                    </tr>
                    <tr>
                      <td style="font-weight: 700;">Tomato</td>
                      <td style="font-weight: 500; color: var(--red-text);">3 kg</td>
                      <td>kg</td>
                      <td><span class="st-badge critical"><i class="st-dot"></i> Critical</span></td>
                    </tr>
                    <tr>
                      <td style="font-weight: 700;">Onion</td>
                      <td style="font-weight: 500;">28 kg</td>
                      <td>kg</td>
                      <td><span class="st-badge instock"><i class="st-dot"></i> In Stock</span></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- Small Stock Alert Panel -->
              <div style="background: #fff; border: 1px solid var(--line); border-radius: 14px; padding: 14px; display: flex; flex-direction: column; gap: 10px;">
                <div style="display: flex; align-items: center; justify-content: space-between; padding-bottom: 8px; border-bottom: 1px solid var(--line);">
                  <div style="font-size: 11px; font-weight: 500; color: var(--amber-text); letter-spacing: 0.05em;">LOW STOCK ALERTS</div>
                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="var(--amber)" stroke-width="2.5"><path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
                </div>

                <div style="background: var(--amber-bg); border-left: 3px solid var(--amber); border-radius: 6px; padding: 8px 10px;">
                  <div style="font-weight: 700; font-size: 12px; color: var(--amber-text);">Chicken</div>
                  <div style="font-size: 11px; color: #78350f;">12 kg remaining</div>
                </div>

                <div style="background: var(--amber-bg); border-left: 3px solid var(--amber); border-radius: 6px; padding: 8px 10px;">
                  <div style="font-weight: 700; font-size: 12px; color: var(--amber-text);">Paneer</div>
                  <div style="font-size: 11px; color: #78350f;">5 kg remaining</div>
                </div>

                <div style="background: var(--red-bg); border-left: 3px solid var(--red); border-radius: 6px; padding: 8px 10px;">
                  <div style="font-weight: 700; font-size: 12px; color: var(--red-text);">Tomato</div>
                  <div style="font-size: 11px; color: #7f1d1d;">3 kg remaining (Critical)</div>
                </div>

                <div style="margin-top: auto; padding-top: 8px; text-align: center;">
                  <span style="font-size: 11px; font-weight: 700; color: var(--br); cursor: pointer;">Review Replenishment →</span>
                </div>
              </div>
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
      <div style="font-size: 12px; font-weight: 500; letter-spacing: 0.15em; color: var(--br); text-transform: uppercase;">RESTAURANT INVENTORY LIFECYCLE</div>
    </div>
    
    <div style="display: flex; align-items: center; justify-content: space-between; max-width: 1040px; margin: 0 auto; flex-wrap: wrap; gap: 12px;">
      <div style="text-align: center; flex: 1; min-width: 110px;">
        <div style="width: 44px; height: 44px; border-radius: 50%; background: #fff; border: 1.5px solid var(--br); display: grid; place-items: center; margin: 0 auto 8px; color: var(--br);">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/></svg>
        </div>
        <div style="font-size: 12px; font-weight: 500; color: var(--ink);">1. PURCHASE</div>
      </div>
      <div style="color: var(--br); font-weight: 500; font-size: 18px;">↓</div>

      <div style="text-align: center; flex: 1; min-width: 110px;">
        <div style="width: 44px; height: 44px; border-radius: 50%; background: #fff; border: 1.5px solid var(--br); display: grid; place-items: center; margin: 0 auto 8px; color: var(--br);">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>
        </div>
        <div style="font-size: 12px; font-weight: 500; color: var(--ink);">2. RECEIVE</div>
      </div>
      <div style="color: var(--br); font-weight: 500; font-size: 18px;">↓</div>

      <div style="text-align: center; flex: 1; min-width: 110px;">
        <div style="width: 44px; height: 44px; border-radius: 50%; background: #fff; border: 1.5px solid var(--br); display: grid; place-items: center; margin: 0 auto 8px; color: var(--br);">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"/></svg>
        </div>
        <div style="font-size: 12px; font-weight: 500; color: var(--ink);">3. STOCK</div>
      </div>
      <div style="color: var(--br); font-weight: 500; font-size: 18px;">↓</div>

      <div style="text-align: center; flex: 1; min-width: 110px;">
        <div style="width: 44px; height: 44px; border-radius: 50%; background: #fff; border: 1.5px solid var(--br); display: grid; place-items: center; margin: 0 auto 8px; color: var(--br);">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M6 21h12"/></svg>
        </div>
        <div style="font-size: 12px; font-weight: 500; color: var(--ink);">4. CONSUME</div>
      </div>
      <div style="color: var(--br); font-weight: 500; font-size: 18px;">↓</div>

      <div style="text-align: center; flex: 1; min-width: 110px;">
        <div style="width: 44px; height: 44px; border-radius: 50%; background: #fff; border: 1.5px solid var(--br); display: grid; place-items: center; margin: 0 auto 8px; color: var(--br);">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>
        </div>
        <div style="font-size: 12px; font-weight: 500; color: var(--ink);">5. MONITOR</div>
      </div>
      <div style="color: var(--br); font-weight: 500; font-size: 18px;">↓</div>

      <div style="text-align: center; flex: 1; min-width: 110px;">
        <div style="width: 44px; height: 44px; border-radius: 50%; background: #fff; border: 1.5px solid var(--br); display: grid; place-items: center; margin: 0 auto 8px; color: var(--br);">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21.5 2v6h-6M21.34 15.57a10 10 0 11-.57-8.38l5.67-5.67"/></svg>
        </div>
        <div style="font-size: 12px; font-weight: 500; color: var(--ink);">6. REPLENISH</div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 4. VALUE STRIP ================= -->
<section style="padding: 50px 0; background: #ffffff; border-bottom: 1px solid var(--line);">
  <div class="w">
    <div class="g4">
      <!-- Point 1 -->
      <div style="padding: 20px; background: var(--bg2); border-radius: 16px; border: 1px solid var(--line);">
        <div style="font-size: 12px; font-weight: 500; color: var(--br); margin-bottom: 8px;">01</div>
        <div class="ic" style="margin-bottom: 14px;">
          <svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
        </div>
        <h4 style="font-size: 17px; margin-bottom: 6px;">Stock Visibility</h4>
        <p style="font-size: 14px;">Know what ingredients and supplies are available across your kitchen.</p>
      </div>

      <!-- Point 2 -->
      <div style="padding: 20px; background: var(--bg2); border-radius: 16px; border: 1px solid var(--line);">
        <div style="font-size: 12px; font-weight: 500; color: var(--br); margin-bottom: 8px;">02</div>
        <div class="ic" style="margin-bottom: 14px;">
          <svg viewBox="0 0 24 24"><path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
        </div>
        <h4 style="font-size: 17px; margin-bottom: 6px;">Low Stock Awareness</h4>
        <p style="font-size: 14px;">Identify items that need attention before service shortages occur.</p>
      </div>

      <!-- Point 3 -->
      <div style="padding: 20px; background: var(--bg2); border-radius: 16px; border: 1px solid var(--line);">
        <div style="font-size: 12px; font-weight: 500; color: var(--br); margin-bottom: 8px;">03</div>
        <div class="ic" style="margin-bottom: 14px;">
          <svg viewBox="0 0 24 24"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg>
        </div>
        <h4 style="font-size: 17px; margin-bottom: 6px;">Inventory Movement</h4>
        <p style="font-size: 14px;">Understand purchases, consumption and adjustments with full history.</p>
      </div>

      <!-- Point 4 -->
      <div style="padding: 20px; background: var(--bg2); border-radius: 16px; border: 1px solid var(--line);">
        <div style="font-size: 12px; font-weight: 500; color: var(--br); margin-bottom: 8px;">04</div>
        <div class="ic" style="margin-bottom: 14px;">
          <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
        </div>
        <h4 style="font-size: 17px; margin-bottom: 6px;">Better Kitchen Planning</h4>
        <p style="font-size: 14px;">Keep ingredient availability connected to daily restaurant operations.</p>
      </div>
    </div>
  </div>
</section>

<!-- ================= 5. PROBLEM SECTION ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">OPERATIONAL CLARITY</div>
      <h2>Restaurant Inventory <span class="sf">Shouldn’t Be a Guess.</span></h2>
      <p>Traditional paper logs and manual stock checks leave kitchen teams unprepared during rush hours.</p>
    </div>

    <!-- Traditional Workflow Diagram -->
    <div style="max-width: 900px; margin: 0 auto 48px; background: #fff; padding: 24px; border-radius: 18px; border: 1px solid var(--line);">
      <div style="font-size: 12px; font-weight: 500; color: var(--mute); text-align: center; text-transform: uppercase; letter-spacing: 0.08em; margin-bottom: 16px;">THE TRADITIONAL MANIFEST PROBLEM</div>
      <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 8px; font-size: 12px; font-weight: 700; color: var(--ink);">
        <span>Purchase ingredients</span> <span>→</span>
        <span>Receive stock</span> <span>→</span>
        <span>Store items</span> <span>→</span>
        <span>Use ingredients</span> <span>→</span>
        <span>Manually check stock</span> <span>→</span>
        <span style="color: var(--red);">Discover shortage</span> <span>→</span>
        <span style="color: var(--red);">Rush purchase</span>
      </div>
    </div>

    <!-- Comparison Grid -->
    <div class="g2" style="gap: 28px;">
      <!-- Left: Traditional Inventory -->
      <div style="background: #fff; padding: 32px; border-radius: 20px; border: 1px solid #fee2e2;">
        <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 20px;">
          <div style="width: 38px; height: 38px; border-radius: 10px; background: #fee2e2; color: #dc2626; display: grid; place-items: center; font-weight: 500;">✕</div>
          <h3 style="font-size: 20px; color: #991b1b;">Traditional Inventory</h3>
        </div>
        <ul style="display: flex; flex-direction: column; gap: 14px; font-size: 15px; color: var(--mute);">
          <li style="display: flex; align-items: center; gap: 10px;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#dc2626" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            Manual stock checking causing errors
          </li>
          <li style="display: flex; align-items: center; gap: 10px;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#dc2626" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            Scattered purchase records across paper bills
          </li>
          <li style="display: flex; align-items: center; gap: 10px;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#dc2626" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            Difficult consumption visibility during peak service
          </li>
          <li style="display: flex; align-items: center; gap: 10px;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#dc2626" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            Unexpected shortages during high dish demand
          </li>
          <li style="display: flex; align-items: center; gap: 10px;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#dc2626" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            Higher waste risk from untracked spoilage
          </li>
        </ul>
      </div>

      <!-- Right: Geni Menu Inventory -->
      <div style="background: #fff; padding: 32px; border-radius: 20px; border: 1.5px solid var(--br); box-shadow: var(--shadow-sm);">
        <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 20px;">
          <div style="width: 38px; height: 38px; border-radius: 10px; background: var(--br-light); color: var(--br); display: grid; place-items: center; font-weight: 500;">✓</div>
          <h3 style="font-size: 20px; color: var(--br);">Geni Menu Inventory</h3>
        </div>
        <ul style="display: flex; flex-direction: column; gap: 14px; font-size: 15px; color: var(--ink); font-weight: 600;">
          <li style="display: flex; align-items: center; gap: 10px;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--green)" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
            Central stock view for all ingredients
          </li>
          <li style="display: flex; align-items: center; gap: 10px;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--green)" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
            Clear ingredient tracking in standard units
          </li>
          <li style="display: flex; align-items: center; gap: 10px;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--green)" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
            Purchase visibility and stock receipt logs
          </li>
          <li style="display: flex; align-items: center; gap: 10px;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--green)" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
            Low-stock awareness with clear alert levels
          </li>
          <li style="display: flex; align-items: center; gap: 10px;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--green)" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
            Connected restaurant kitchen operations
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ================= 6. INVENTORY DASHBOARD ================= -->
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">CENTRALIZED CONTROL</div>
      <h2>See Your Restaurant Stock <span class="sf">at a Glance.</span></h2>
      <p>Bring ingredients, stock levels and inventory activity into one clear workspace.</p>
    </div>

    <!-- Interactive Workspace Preview Card -->
    <div class="win" style="max-width: 1080px; margin: 0 auto;">
      <div class="wb">
        <div class="dots"><i></i><i></i><i></i></div>
        <div class="ttl">GENI MENU INVENTORY DASHBOARD</div>
        <div style="display:flex; gap:10px;">
          <input type="text" placeholder="Search inventory..." style="padding: 5px 12px; border-radius: 8px; border: 1px solid var(--line); font-size: 12px; outline: none; width: 180px;">
        </div>
      </div>

      <div style="padding: 24px; background: #fff;">
        <!-- Filters & Category Navigation -->
        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 14px; margin-bottom: 20px;">
          <!-- Status Tabs -->
          <div style="display: flex; gap: 6px; background: var(--bg2); padding: 4px; border-radius: 10px; border: 1px solid var(--line);">
            <button class="dash-tab active" onclick="filterTable('all', this)" style="padding: 6px 14px; border-radius: 7px; border: none; font-size: 12px; font-weight: 700; background: var(--br); color: #fff; cursor: pointer;">All Items (186)</button>
            <button class="dash-tab" onclick="filterTable('instock', this)" style="padding: 6px 14px; border-radius: 7px; border: none; font-size: 12px; font-weight: 700; background: transparent; color: var(--mute); cursor: pointer;">In Stock (142)</button>
            <button class="dash-tab" onclick="filterTable('lowstock', this)" style="padding: 6px 14px; border-radius: 7px; border: none; font-size: 12px; font-weight: 700; background: transparent; color: var(--mute); cursor: pointer;">Low Stock (28)</button>
            <button class="dash-tab" onclick="filterTable('critical', this)" style="padding: 6px 14px; border-radius: 7px; border: none; font-size: 12px; font-weight: 700; background: transparent; color: var(--mute); cursor: pointer;">Critical (16)</button>
          </div>

          <!-- Category Pills -->
          <div style="display: flex; gap: 8px; overflow-x: auto; padding-bottom: 4px;">
            <span style="padding: 5px 12px; border-radius: 20px; background: var(--br-light); color: var(--br); font-size: 12px; font-weight: 700;">Raw Materials</span>
            <span style="padding: 5px 12px; border-radius: 20px; background: var(--bg2); color: var(--mute); font-size: 12px; font-weight: 600;">Vegetables</span>
            <span style="padding: 5px 12px; border-radius: 20px; background: var(--bg2); color: var(--mute); font-size: 12px; font-weight: 600;">Meat</span>
            <span style="padding: 5px 12px; border-radius: 20px; background: var(--bg2); color: var(--mute); font-size: 12px; font-weight: 600;">Dairy</span>
            <span style="padding: 5px 12px; border-radius: 20px; background: var(--bg2); color: var(--mute); font-size: 12px; font-weight: 600;">Beverages</span>
            <span style="padding: 5px 12px; border-radius: 20px; background: var(--bg2); color: var(--mute); font-size: 12px; font-weight: 600;">Packaging</span>
          </div>
        </div>

        <!-- Inventory Table -->
        <div style="border: 1px solid var(--line); border-radius: 12px; overflow: hidden;">
          <table class="inv-tbl" id="mainInvTable">
            <thead>
              <tr>
                <th>ITEM</th>
                <th>CATEGORY</th>
                <th>STOCK</th>
                <th>UNIT</th>
                <th>STATUS</th>
                <th style="text-align: right;">ACTIONS</th>
              </tr>
            </thead>
            <tbody>
              <tr data-status="instock">
                <td style="font-weight: 700; color: var(--ink);">Basmati Rice</td>
                <td style="color: var(--mute); font-size: 12.5px;">Grains & Raw</td>
                <td style="font-weight: 500;">42</td>
                <td>kg</td>
                <td><span class="st-badge instock"><i class="st-dot"></i> In Stock</span></td>
                <td style="text-align: right;">
                  <button style="padding: 4px 10px; border-radius: 6px; border: 1px solid var(--line); background: #fff; font-size: 11px; font-weight: 700; cursor: pointer; color: var(--br);">View</button>
                  <button style="padding: 4px 10px; border-radius: 6px; border: 1px solid var(--line); background: #fff; font-size: 11px; font-weight: 700; cursor: pointer; color: var(--ink);">Edit</button>
                  <button style="padding: 4px 10px; border-radius: 6px; border: 1px solid var(--br); background: var(--br-light); font-size: 11px; font-weight: 700; cursor: pointer; color: var(--br);">Adjust</button>
                </td>
              </tr>
              <tr data-status="lowstock">
                <td style="font-weight: 700; color: var(--ink);">Chicken</td>
                <td style="color: var(--mute); font-size: 12.5px;">Meat & Poultry</td>
                <td style="font-weight: 500; color: var(--amber-text);">12</td>
                <td>kg</td>
                <td><span class="st-badge lowstock"><i class="st-dot"></i> Low Stock</span></td>
                <td style="text-align: right;">
                  <button style="padding: 4px 10px; border-radius: 6px; border: 1px solid var(--line); background: #fff; font-size: 11px; font-weight: 700; cursor: pointer; color: var(--br);">View</button>
                  <button style="padding: 4px 10px; border-radius: 6px; border: 1px solid var(--line); background: #fff; font-size: 11px; font-weight: 700; cursor: pointer; color: var(--ink);">Edit</button>
                  <button style="padding: 4px 10px; border-radius: 6px; border: 1px solid var(--br); background: var(--br-light); font-size: 11px; font-weight: 700; cursor: pointer; color: var(--br);">Adjust</button>
                </td>
              </tr>
              <tr data-status="lowstock">
                <td style="font-weight: 700; color: var(--ink);">Paneer</td>
                <td style="color: var(--mute); font-size: 12.5px;">Dairy</td>
                <td style="font-weight: 500; color: var(--amber-text);">5</td>
                <td>kg</td>
                <td><span class="st-badge lowstock"><i class="st-dot"></i> Low Stock</span></td>
                <td style="text-align: right;">
                  <button style="padding: 4px 10px; border-radius: 6px; border: 1px solid var(--line); background: #fff; font-size: 11px; font-weight: 700; cursor: pointer; color: var(--br);">View</button>
                  <button style="padding: 4px 10px; border-radius: 6px; border: 1px solid var(--line); background: #fff; font-size: 11px; font-weight: 700; cursor: pointer; color: var(--ink);">Edit</button>
                  <button style="padding: 4px 10px; border-radius: 6px; border: 1px solid var(--br); background: var(--br-light); font-size: 11px; font-weight: 700; cursor: pointer; color: var(--br);">Adjust</button>
                </td>
              </tr>
              <tr data-status="critical">
                <td style="font-weight: 700; color: var(--ink);">Tomato</td>
                <td style="color: var(--mute); font-size: 12.5px;">Vegetables</td>
                <td style="font-weight: 500; color: var(--red-text);">3</td>
                <td>kg</td>
                <td><span class="st-badge critical"><i class="st-dot"></i> Critical</span></td>
                <td style="text-align: right;">
                  <button style="padding: 4px 10px; border-radius: 6px; border: 1px solid var(--line); background: #fff; font-size: 11px; font-weight: 700; cursor: pointer; color: var(--br);">View</button>
                  <button style="padding: 4px 10px; border-radius: 6px; border: 1px solid var(--line); background: #fff; font-size: 11px; font-weight: 700; cursor: pointer; color: var(--ink);">Edit</button>
                  <button style="padding: 4px 10px; border-radius: 6px; border: 1px solid var(--br); background: var(--br-light); font-size: 11px; font-weight: 700; cursor: pointer; color: var(--br);">Adjust</button>
                </td>
              </tr>
              <tr data-status="instock">
                <td style="font-weight: 700; color: var(--ink);">Cooking Oil</td>
                <td style="color: var(--mute); font-size: 12.5px;">Raw Materials</td>
                <td style="font-weight: 500;">18</td>
                <td>L</td>
                <td><span class="st-badge instock"><i class="st-dot"></i> In Stock</span></td>
                <td style="text-align: right;">
                  <button style="padding: 4px 10px; border-radius: 6px; border: 1px solid var(--line); background: #fff; font-size: 11px; font-weight: 700; cursor: pointer; color: var(--br);">View</button>
                  <button style="padding: 4px 10px; border-radius: 6px; border: 1px solid var(--line); background: #fff; font-size: 11px; font-weight: 700; cursor: pointer; color: var(--ink);">Edit</button>
                  <button style="padding: 4px 10px; border-radius: 6px; border: 1px solid var(--br); background: var(--br-light); font-size: 11px; font-weight: 700; cursor: pointer; color: var(--br);">Adjust</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 7. STOCK STATUS ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">STATUS INDICATORS</div>
      <h2>Know Which Ingredients <span class="sf">Need Attention.</span></h2>
      <p>Clear, restrained status indicators help kitchen managers prioritize restocking.</p>
    </div>

    <!-- 4 Status Cards -->
    <div class="g4" style="margin-bottom: 32px;">
      <div style="background: #fff; padding: 24px; border-radius: 16px; border: 1px solid var(--line); border-top: 4px solid var(--green);">
        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px;">
          <span class="st-badge instock"><i class="st-dot"></i> IN STOCK</span>
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--green)" stroke-width="2"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
        </div>
        <p style="font-size: 14px; color: var(--ink); font-weight: 600;">Enough stock currently available for operational needs.</p>
      </div>

      <div style="background: #fff; padding: 24px; border-radius: 16px; border: 1px solid var(--line); border-top: 4px solid var(--amber);">
        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px;">
          <span class="st-badge lowstock"><i class="st-dot"></i> LOW STOCK</span>
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--amber)" stroke-width="2"><path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/></svg>
        </div>
        <p style="font-size: 14px; color: var(--ink); font-weight: 600;">Stock is approaching the defined attention threshold.</p>
      </div>

      <div style="background: #fff; padding: 24px; border-radius: 16px; border: 1px solid var(--line); border-top: 4px solid var(--red);">
        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px;">
          <span class="st-badge critical"><i class="st-dot"></i> CRITICAL</span>
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--red)" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
        </div>
        <p style="font-size: 14px; color: var(--ink); font-weight: 600;">Stock requires immediate attention before next service.</p>
      </div>

      <div style="background: #fff; padding: 24px; border-radius: 16px; border: 1px solid var(--line); border-top: 4px solid var(--gray-text);">
        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px;">
          <span class="st-badge outofstock"><i class="st-dot"></i> OUT OF STOCK</span>
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--gray-text)" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="4.93" y1="4.93" x2="19.07" y2="19.07"/></svg>
        </div>
        <p style="font-size: 14px; color: var(--ink); font-weight: 600;">No available stock remaining in the inventory register.</p>
      </div>
    </div>

    <!-- Visual Legend Strip -->
    <div style="display: flex; justify-content: center; align-items: center; gap: 24px; flex-wrap: wrap; background: #fff; padding: 14px 24px; border-radius: 99px; border: 1px solid var(--line); max-width: 680px; margin: 0 auto; font-size: 13px; font-weight: 700;">
      <span>Visual Legend:</span>
      <span style="color: var(--green); display: flex; align-items: center; gap: 6px;"><i style="width:10px; height:10px; border-radius:50%; background:var(--green); display:inline-block;"></i> In Stock</span>
      <span style="color: var(--amber); display: flex; align-items: center; gap: 6px;"><i style="width:10px; height:10px; border-radius:50%; background:var(--amber); display:inline-block;"></i> Low Stock</span>
      <span style="color: var(--red); display: flex; align-items: center; gap: 6px;"><i style="width:10px; height:10px; border-radius:50%; background:var(--red); display:inline-block;"></i> Critical</span>
      <span style="color: var(--gray-text); display: flex; align-items: center; gap: 6px;"><i style="width:10px; height:10px; border-radius:50%; background:var(--gray-text); display:inline-block;"></i> Out of Stock</span>
    </div>
  </div>
</section>

<!-- ================= 8. INGREDIENT MANAGEMENT ================= -->
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">RAW MATERIALS</div>
      <h2>Manage the Ingredients <span class="sf">Behind Every Dish.</span></h2>
      <p>Organize raw materials, dairy, meat, vegetables, and packaging with custom unit definitions.</p>
    </div>

    <div class="g3">
      <!-- Ingredient Card 1 -->
      <div class="card" style="padding: 24px;">
        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 16px;">
          <div>
            <h4 style="font-size: 20px; margin-bottom: 4px;">Basmati Rice</h4>
            <div style="font-size: 13px; color: var(--mute); font-weight: 600;">Category: Grains</div>
          </div>
          <span class="st-badge instock"><i class="st-dot"></i> In Stock</span>
        </div>

        <div style="display: flex; justify-content: space-between; padding: 12px; background: var(--bg2); border-radius: 10px; font-size: 13px; margin-bottom: 16px;">
          <div>Current Stock: <strong style="color: var(--ink); font-size: 15px;">42 kg</strong></div>
          <div>Unit: <strong style="color: var(--ink);">kg</strong></div>
        </div>

        <div style="font-size: 12px; color: var(--mute); display: flex; align-items: center; gap: 6px;">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/></svg>
          Last updated today, 09:12 AM
        </div>
      </div>

      <!-- Ingredient Card 2 -->
      <div class="card" style="padding: 24px;">
        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 16px;">
          <div>
            <h4 style="font-size: 20px; margin-bottom: 4px;">Chicken</h4>
            <div style="font-size: 13px; color: var(--mute); font-weight: 600;">Category: Meat</div>
          </div>
          <span class="st-badge lowstock"><i class="st-dot"></i> Low Stock</span>
        </div>

        <div style="display: flex; justify-content: space-between; padding: 12px; background: var(--amber-bg); border-radius: 10px; font-size: 13px; margin-bottom: 16px;">
          <div>Current Stock: <strong style="color: var(--amber-text); font-size: 15px;">12 kg</strong></div>
          <div>Unit: <strong style="color: var(--amber-text);">kg</strong></div>
        </div>

        <div style="font-size: 12px; color: var(--mute); display: flex; align-items: center; gap: 6px;">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/></svg>
          Reorder threshold: 15 kg
        </div>
      </div>

      <!-- Ingredient Card 3 -->
      <div class="card" style="padding: 24px;">
        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 16px;">
          <div>
            <h4 style="font-size: 20px; margin-bottom: 4px;">Paneer</h4>
            <div style="font-size: 13px; color: var(--mute); font-weight: 600;">Category: Dairy</div>
          </div>
          <span class="st-badge lowstock"><i class="st-dot"></i> Low Stock</span>
        </div>

        <div style="display: flex; justify-content: space-between; padding: 12px; background: var(--amber-bg); border-radius: 10px; font-size: 13px; margin-bottom: 16px;">
          <div>Current Stock: <strong style="color: var(--amber-text); font-size: 15px;">5 kg</strong></div>
          <div>Unit: <strong style="color: var(--amber-text);">kg</strong></div>
        </div>

        <div style="font-size: 12px; color: var(--mute); display: flex; align-items: center; gap: 6px;">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/></svg>
          Reorder threshold: 8 kg
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 9. MENU → INGREDIENT CONNECTION ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">OPERATIONAL CONFLICT PREVENTION</div>
      <h2>Connect Your Menu <span class="sf">to Your Ingredients.</span></h2>
      <p>Understand the direct relationship between what is listed on your menu and what is stocked in your kitchen pantry.</p>
    </div>

    <!-- Visual Relationship Banner -->
    <div class="win" style="max-width: 960px; margin: 0 auto; padding: 32px;">
      <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 24px;">
        <!-- Left: Menu Item -->
        <div style="flex: 1; min-width: 220px; background: #fff; border: 1px solid var(--line); padding: 20px; border-radius: 16px; text-align: center;">
          <div style="font-size: 11px; font-weight: 500; color: var(--br); text-transform: uppercase; margin-bottom: 8px;">MENU ITEM</div>
          <div style="font-size: 20px; font-weight: 500; color: var(--ink);">Chicken Biryani</div>
          <div style="font-size: 16px; font-weight: 700; color: var(--br); margin-top: 4px;">₹280</div>
        </div>

        <div style="font-size: 24px; font-weight: 500; color: var(--br);">→</div>

        <!-- Middle: Ingredients -->
        <div style="flex: 1.5; min-width: 260px; background: #fff; border: 1px solid var(--line); padding: 20px; border-radius: 16px;">
          <div style="font-size: 11px; font-weight: 500; color: var(--br); text-transform: uppercase; margin-bottom: 10px; text-align: center;">INGREDIENTS REQUIRED</div>
          <div style="display: flex; flex-wrap: wrap; gap: 8px; justify-content: center;">
            <span style="padding: 5px 10px; background: var(--bg2); border-radius: 6px; font-size: 12px; font-weight: 700;">Basmati Rice</span>
            <span style="padding: 5px 10px; background: var(--bg2); border-radius: 6px; font-size: 12px; font-weight: 700;">Chicken</span>
            <span style="padding: 5px 10px; background: var(--bg2); border-radius: 6px; font-size: 12px; font-weight: 700;">Onion</span>
            <span style="padding: 5px 10px; background: var(--bg2); border-radius: 6px; font-size: 12px; font-weight: 700;">Tomato</span>
            <span style="padding: 5px 10px; background: var(--bg2); border-radius: 6px; font-size: 12px; font-weight: 700;">Spices</span>
            <span style="padding: 5px 10px; background: var(--bg2); border-radius: 6px; font-size: 12px; font-weight: 700;">Oil</span>
          </div>
        </div>

        <div style="font-size: 24px; font-weight: 500; color: var(--br);">→</div>

        <!-- Right: Inventory Status -->
        <div style="flex: 1; min-width: 220px; background: #fff; border: 1px solid var(--line); padding: 20px; border-radius: 16px; text-align: center;">
          <div style="font-size: 11px; font-weight: 500; color: var(--br); text-transform: uppercase; margin-bottom: 8px;">INVENTORY MONITOR</div>
          <div style="font-size: 14px; font-weight: 700; color: var(--ink);">Stock Levels Active</div>
          <div style="margin-top: 8px;">
            <span class="st-badge lowstock"><i class="st-dot"></i> Check Stock</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 10. STOCK MOVEMENT ================= -->
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">TRANSACTION RECONCILIATION</div>
      <h2>Understand Where <span class="sf">Your Stock Goes.</span></h2>
      <p>Keep track of purchases, kitchen consumption, and manual adjustments in real time.</p>
    </div>

    <!-- Movement Card -->
    <div class="win" style="max-width: 900px; margin: 0 auto; padding: 28px;">
      <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; flex-wrap: wrap; gap: 12px;">
        <div>
          <h3 style="font-size: 22px;">Basmati Rice Movement</h3>
          <div style="font-size: 13px; color: var(--mute);">Stock Reconciliation Summary</div>
        </div>
        <div style="display: flex; gap: 8px;">
          <button style="padding: 6px 12px; border-radius: 6px; border: 1px solid var(--br); background: var(--br-light); font-size: 12px; font-weight: 700; color: var(--br);">Today</button>
          <button style="padding: 6px 12px; border-radius: 6px; border: 1px solid var(--line); background: #fff; font-size: 12px; font-weight: 600; color: var(--mute);">This Week</button>
          <button style="padding: 6px 12px; border-radius: 6px; border: 1px solid var(--line); background: #fff; font-size: 12px; font-weight: 600; color: var(--mute);">This Month</button>
        </div>
      </div>

      <!-- Movement Breakdown Grid -->
      <div style="display: grid; grid-template-columns: repeat(5, 1fr); gap: 12px; margin-bottom: 24px; text-align: center;">
        <div style="background: var(--bg2); padding: 14px; border-radius: 12px; border: 1px solid var(--line);">
          <div style="font-size: 11px; font-weight: 500; color: var(--mute);">OPENING STOCK</div>
          <div style="font-size: 20px; font-weight: 500; color: var(--ink); margin-top: 4px;">50 kg</div>
        </div>
        <div style="background: var(--green-bg); padding: 14px; border-radius: 12px; border: 1px solid rgba(16,185,129,0.2);">
          <div style="font-size: 11px; font-weight: 500; color: var(--green-text);">PURCHASE</div>
          <div style="font-size: 20px; font-weight: 500; color: var(--green-text); margin-top: 4px;">+20 kg</div>
        </div>
        <div style="background: #fff3ed; padding: 14px; border-radius: 12px; border: 1px solid rgba(234,88,12,0.2);">
          <div style="font-size: 11px; font-weight: 500; color: #c2410c;">CONSUMPTION</div>
          <div style="font-size: 20px; font-weight: 500; color: #c2410c; margin-top: 4px;">-18 kg</div>
        </div>
        <div style="background: var(--red-bg); padding: 14px; border-radius: 12px; border: 1px solid rgba(239,68,68,0.2);">
          <div style="font-size: 11px; font-weight: 500; color: var(--red-text);">ADJUSTMENT</div>
          <div style="font-size: 20px; font-weight: 500; color: var(--red-text); margin-top: 4px;">-2 kg</div>
        </div>
        <div style="background: var(--br-light); padding: 14px; border-radius: 12px; border: 1.5px solid var(--br);">
          <div style="font-size: 11px; font-weight: 500; color: var(--br);">CURRENT STOCK</div>
          <div style="font-size: 20px; font-weight: 500; color: var(--br); margin-top: 4px;">50 kg</div>
        </div>
      </div>

      <!-- Formula Visual Banner -->
      <div style="background: var(--bg2); padding: 14px 20px; border-radius: 12px; text-align: center; font-size: 13px; font-weight: 700; color: var(--ink);">
        PURCHASE <span style="color: var(--green);">(+)</span> CONSUMPTION <span style="color: #c2410c;">(-)</span> ADJUSTMENT <span style="color: var(--red);">(-)</span> = CURRENT STOCK
      </div>
    </div>
  </div>
</section>

<!-- ================= 11. PURCHASE MANAGEMENT ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">INCOMING SUPPLIES</div>
      <h2>Track What Comes <span class="sf">Into Your Kitchen.</span></h2>
      <p>Record supplier purchase orders, delivery dates, quantities, and receipt status.</p>
    </div>

    <div class="g2" style="gap: 32px;">
      <!-- Purchase Order Detail Card -->
      <div class="win" style="padding: 24px;">
        <div style="display: flex; justify-content: space-between; align-items: center; padding-bottom: 14px; border-bottom: 1px solid var(--line); margin-bottom: 16px;">
          <div>
            <div style="font-size: 12px; font-weight: 500; color: var(--br);">PURCHASE ORDER</div>
            <h3 style="font-size: 20px;">PO-2048</h3>
          </div>
          <span class="st-badge instock"><i class="st-dot"></i> Received</span>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; font-size: 13px; margin-bottom: 16px;">
          <div>Supplier: <strong style="color: var(--ink);">ABC Foods</strong></div>
          <div>Date: <strong style="color: var(--ink);">29 Sep 2026</strong></div>
        </div>

        <!-- Order items table -->
        <table class="inv-tbl" style="margin-bottom: 16px;">
          <thead>
            <tr>
              <th>Item</th>
              <th>Quantity</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td style="font-weight: 700;">Basmati Rice</td>
              <td>50 kg</td>
            </tr>
            <tr>
              <td style="font-weight: 700;">Cooking Oil</td>
              <td>20 L</td>
            </tr>
            <tr>
              <td style="font-weight: 700;">Onion</td>
              <td>30 kg</td>
            </tr>
          </tbody>
        </table>

        <div style="display: flex; justify-content: space-between; align-items: center; padding-top: 12px; border-top: 1px solid var(--line); font-weight: 500; font-size: 15px;">
          <div>Total Cost:</div>
          <div style="color: var(--br); font-size: 18px;">₹18,500</div>
        </div>
      </div>

      <!-- Recent Purchase List -->
      <div style="display: flex; flex-direction: column; gap: 16px;">
        <h3 style="font-size: 20px; margin-bottom: 4px;">Recent Purchase Orders</h3>

        <div style="background: #fff; padding: 18px; border-radius: 16px; border: 1px solid var(--line); display: flex; justify-content: space-between; align-items: center;">
          <div>
            <div style="font-weight: 500; font-size: 16px; color: var(--ink);">PO-2048</div>
            <div style="font-size: 13px; color: var(--mute);">ABC Foods • 29 Sep 2026</div>
          </div>
          <div style="text-align: right;">
            <div style="font-weight: 500; font-size: 15px; color: var(--ink);">₹18,500</div>
            <span class="st-badge instock" style="margin-top: 4px;"><i class="st-dot"></i> Received</span>
          </div>
        </div>

        <div style="background: #fff; padding: 18px; border-radius: 16px; border: 1px solid var(--line); display: flex; justify-content: space-between; align-items: center;">
          <div>
            <div style="font-weight: 500; font-size: 16px; color: var(--ink);">PO-2047</div>
            <div style="font-size: 13px; color: var(--mute);">Fresh Farms • 27 Sep 2026</div>
          </div>
          <div style="text-align: right;">
            <div style="font-weight: 500; font-size: 15px; color: var(--ink);">₹12,800</div>
            <span class="st-badge instock" style="margin-top: 4px;"><i class="st-dot"></i> Received</span>
          </div>
        </div>

        <div style="background: #fff; padding: 18px; border-radius: 16px; border: 1px solid var(--line); display: flex; justify-content: space-between; align-items: center;">
          <div>
            <div style="font-weight: 500; font-size: 16px; color: var(--ink);">PO-2046</div>
            <div style="font-size: 13px; color: var(--mute);">Dairy Fresh Co. • 25 Sep 2026</div>
          </div>
          <div style="text-align: right;">
            <div style="font-weight: 500; font-size: 15px; color: var(--ink);">₹8,400</div>
            <span class="st-badge instock" style="margin-top: 4px;"><i class="st-dot"></i> Received</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 12. STOCK RECEIVING ================= -->
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">VERIFICATION & VERACITY</div>
      <h2>Keep Incoming Stock <span class="sf">Accounted For.</span></h2>
      <p>Compare expected purchase order quantities against actual delivered items to log partial receipts.</p>
    </div>

    <!-- Stock Receiving UI Card -->
    <div class="win" style="max-width: 900px; margin: 0 auto; padding: 28px;">
      <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <div>
          <div style="font-size: 12px; font-weight: 500; color: var(--br);">RECEIVING DOCK LOG</div>
          <h3 style="font-size: 22px;">PO-2048 Receipt Verification</h3>
        </div>
        <span class="st-badge lowstock"><i class="st-dot"></i> Partially Received</span>
      </div>

      <table class="inv-tbl" style="margin-bottom: 20px;">
        <thead>
          <tr>
            <th>Expected Item</th>
            <th>Expected Quantity</th>
            <th>Received Quantity</th>
            <th>Verification</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td style="font-weight: 700;">Basmati Rice</td>
            <td>50 kg</td>
            <td style="font-weight: 500; color: var(--green-text);">50 kg</td>
            <td><span style="color: var(--green); font-weight: 500;">✓ Verified</span></td>
          </tr>
          <tr>
            <td style="font-weight: 700;">Cooking Oil</td>
            <td>20 L</td>
            <td style="font-weight: 500; color: var(--green-text);">20 L</td>
            <td><span style="color: var(--green); font-weight: 500;">✓ Verified</span></td>
          </tr>
          <tr>
            <td style="font-weight: 700;">Onion</td>
            <td>30 kg</td>
            <td style="font-weight: 500; color: var(--amber-text);">28 kg</td>
            <td><span style="color: var(--amber-text); font-weight: 500;">⚠ Short 2 kg</span></td>
          </tr>
        </tbody>
      </table>

      <div style="background: var(--bg2); padding: 14px 18px; border-radius: 12px; font-size: 13px; color: var(--mute); display: flex; align-items: center; justify-content: space-between;">
        <span>Status updated by Kitchen Store Manager: <strong>Partial delivery logged for PO-2048</strong></span>
        <button style="padding: 6px 14px; border-radius: 8px; background: var(--br); color: #fff; border: none; font-size: 12px; font-weight: 700; cursor: pointer;">Update Register</button>
      </div>
    </div>
  </div>
</section>

<!-- ================= 13. LOW STOCK ALERTS ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">PREPAREDNESS</div>
      <h2>See Low Stock <span class="sf">Before It Becomes a Problem.</span></h2>
      <p>Receive clear notifications so your purchasing team can replenish supplies before dinner service.</p>
    </div>

    <div class="g3">
      <!-- Alert Card 1 -->
      <div class="card" style="padding: 24px; border-top: 4px solid var(--amber);">
        <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 14px;">
          <div style="width: 36px; height: 36px; border-radius: 10px; background: var(--amber-bg); color: var(--amber-text); display: grid; place-items: center; font-weight: 500;">⚠</div>
          <div>
            <h4 style="font-size: 18px; color: var(--amber-text);">Chicken</h4>
            <div style="font-size: 12px; color: var(--mute);">Meat Category</div>
          </div>
        </div>
        <div style="font-size: 22px; font-weight: 500; color: var(--ink); margin-bottom: 12px;">12 kg remaining</div>
        <div style="padding: 10px 14px; background: var(--bg2); border-radius: 8px; font-size: 13px; font-weight: 700; color: var(--br);">
          Recommended Action: Review Stock & Order
        </div>
      </div>

      <!-- Alert Card 2 -->
      <div class="card" style="padding: 24px; border-top: 4px solid var(--amber);">
        <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 14px;">
          <div style="width: 36px; height: 36px; border-radius: 10px; background: var(--amber-bg); color: var(--amber-text); display: grid; place-items: center; font-weight: 500;">⚠</div>
          <div>
            <h4 style="font-size: 18px; color: var(--amber-text);">Paneer</h4>
            <div style="font-size: 12px; color: var(--mute);">Dairy Category</div>
          </div>
        </div>
        <div style="font-size: 22px; font-weight: 500; color: var(--ink); margin-bottom: 12px;">5 kg remaining</div>
        <div style="padding: 10px 14px; background: var(--bg2); border-radius: 8px; font-size: 13px; font-weight: 700; color: var(--br);">
          Recommended Action: Replenish Promptly
        </div>
      </div>

      <!-- Alert Card 3 -->
      <div class="card" style="padding: 24px; border-top: 4px solid var(--red);">
        <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 14px;">
          <div style="width: 36px; height: 36px; border-radius: 10px; background: var(--red-bg); color: var(--red-text); display: grid; place-items: center; font-weight: 500;">🚨</div>
          <div>
            <h4 style="font-size: 18px; color: var(--red-text);">Tomato</h4>
            <div style="font-size: 12px; color: var(--mute);">Vegetables Category</div>
          </div>
        </div>
        <div style="font-size: 22px; font-weight: 500; color: var(--red-text); margin-bottom: 12px;">3 kg remaining</div>
        <div style="padding: 10px 14px; background: var(--red-bg); border-radius: 8px; font-size: 13px; font-weight: 500; color: var(--red-text);">
          Status: Critical • Urgent Purchase
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 14. INVENTORY ADJUSTMENTS ================= -->
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">STOCK CORRECTIONS</div>
      <h2>Keep Stock Records <span class="sf">Accurate.</span></h2>
      <p>Log inventory adjustments due to spoilage, damage, manual corrections, or opening stock updates.</p>
    </div>

    <!-- Adjustment UI Mockup -->
    <div class="win" style="max-width: 640px; margin: 0 auto; padding: 28px; border: 1.5px solid var(--br);">
      <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; padding-bottom: 12px; border-bottom: 1px solid var(--line);">
        <h3 style="font-size: 20px;">Adjust Ingredient Stock</h3>
        <span style="font-size: 12px; font-weight: 700; color: var(--br);">RECORD #ADJ-104</span>
      </div>

      <div style="display: flex; flex-direction: column; gap: 16px; font-size: 14px;">
        <div style="display: flex; justify-content: space-between; padding: 12px; background: var(--bg2); border-radius: 10px;">
          <div>ITEM: <strong style="color: var(--ink);">Tomato</strong></div>
          <div>Current Stock: <strong style="color: var(--ink);">10 kg</strong></div>
        </div>

        <div>
          <label style="display: block; font-weight: 700; margin-bottom: 6px; font-size: 13px;">Stock Adjustment Quantity:</label>
          <input type="text" value="-2 kg" style="width: 100%; padding: 10px 14px; border-radius: 10px; border: 1px solid var(--line); font-weight: 500; color: var(--red-text); outline: none;">
        </div>

        <div>
          <label style="display: block; font-weight: 700; margin-bottom: 6px; font-size: 13px;">Reason for Adjustment:</label>
          <select style="width: 100%; padding: 10px 14px; border-radius: 10px; border: 1px solid var(--line); font-weight: 600; outline: none; background: #fff;">
            <option selected>Spoilage</option>
            <option>Damage</option>
            <option>Manual Correction</option>
            <option>Opening Stock</option>
          </select>
        </div>

        <div style="display: flex; justify-content: space-between; padding: 12px; background: var(--br-light); border-radius: 10px; font-weight: 500;">
          <div>Updated Stock Level:</div>
          <div style="color: var(--br); font-size: 16px;">8 kg</div>
        </div>

        <div style="display: flex; gap: 12px; margin-top: 10px;">
          <button style="flex: 1; padding: 12px; border-radius: 10px; background: var(--br); color: #fff; border: none; font-weight: 700; cursor: pointer;">Save Adjustment</button>
          <button style="padding: 12px 20px; border-radius: 10px; background: #fff; color: var(--mute); border: 1px solid var(--line); font-weight: 700; cursor: pointer;">Cancel</button>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 15. FOOD WASTE / SPOILAGE ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">LOSS VISIBILITY</div>
      <h2>Understand Inventory <span class="sf">Losses.</span></h2>
      <p>Maintain accurate visibility over ingredient consumption, adjustments, and reported spoilage.</p>
    </div>

    <!-- Movement Panel for Tomato -->
    <div class="win" style="max-width: 860px; margin: 0 auto; padding: 28px;">
      <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <div>
          <h3 style="font-size: 20px;">Tomato Movement & Loss Log</h3>
          <div style="font-size: 13px; color: var(--mute);">Weekly Activity Breakdown</div>
        </div>
        <span style="font-size: 12px; font-weight: 700; color: var(--mute);">Batch #TM-89</span>
      </div>

      <div style="display: grid; grid-template-columns: repeat(5, 1fr); gap: 10px; text-align: center; margin-bottom: 24px;">
        <div style="background: #fff; padding: 14px; border-radius: 12px; border: 1px solid var(--line);">
          <div style="font-size: 11px; font-weight: 500; color: var(--mute);">PURCHASED</div>
          <div style="font-size: 18px; font-weight: 500; color: var(--ink); margin-top: 4px;">30 kg</div>
        </div>
        <div style="background: #fff; padding: 14px; border-radius: 12px; border: 1px solid var(--line);">
          <div style="font-size: 11px; font-weight: 500; color: var(--green-text);">CONSUMED</div>
          <div style="font-size: 18px; font-weight: 500; color: var(--green-text); margin-top: 4px;">24 kg</div>
        </div>
        <div style="background: var(--red-bg); padding: 14px; border-radius: 12px; border: 1px solid rgba(239,68,68,0.2);">
          <div style="font-size: 11px; font-weight: 500; color: var(--red-text);">SPOILED</div>
          <div style="font-size: 18px; font-weight: 500; color: var(--red-text); margin-top: 4px;">2 kg</div>
        </div>
        <div style="background: #fff; padding: 14px; border-radius: 12px; border: 1px solid var(--line);">
          <div style="font-size: 11px; font-weight: 500; color: var(--mute);">ADJUSTED</div>
          <div style="font-size: 18px; font-weight: 500; color: var(--ink); margin-top: 4px;">1 kg</div>
        </div>
        <div style="background: var(--br-light); padding: 14px; border-radius: 12px; border: 1px solid var(--br);">
          <div style="font-size: 11px; font-weight: 500; color: var(--br);">REMAINING</div>
          <div style="font-size: 18px; font-weight: 500; color: var(--br); margin-top: 4px;">3 kg</div>
        </div>
      </div>

      <!-- Categories -->
      <div style="display: flex; gap: 12px; justify-content: center; flex-wrap: wrap;">
        <span style="padding: 6px 14px; border-radius: 20px; background: #fff; border: 1px solid var(--line); font-size: 12px; font-weight: 700; color: var(--ink);">● Spoilage</span>
        <span style="padding: 6px 14px; border-radius: 20px; background: #fff; border: 1px solid var(--line); font-size: 12px; font-weight: 700; color: var(--ink);">● Damage</span>
        <span style="padding: 6px 14px; border-radius: 20px; background: #fff; border: 1px solid var(--line); font-size: 12px; font-weight: 700; color: var(--ink);">● Over-preparation</span>
        <span style="padding: 6px 14px; border-radius: 20px; background: #fff; border: 1px solid var(--line); font-size: 12px; font-weight: 700; color: var(--ink);">● Adjustment</span>
      </div>
    </div>
  </div>
</section>

<!-- ================= 16. STOCK UNITS ================= -->
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">FLEXIBLE MEASUREMENTS</div>
      <h2>Track Ingredients in the <span class="sf">Right Units.</span></h2>
      <p>Configure ingredients using appropriate units of measurement for easy store room auditing.</p>
    </div>

    <div class="g3">
      <div class="card" style="padding: 20px; text-align: center;">
        <div style="font-size: 32px; font-weight: 500; color: var(--br); font-family: 'Outfit', sans-serif; margin-bottom: 6px;">kg</div>
        <h4 style="font-size: 18px; margin-bottom: 4px;">Kilograms</h4>
        <p style="font-size: 13px;">Basmati Rice, Vegetables, Poultry, Flour</p>
      </div>

      <div class="card" style="padding: 20px; text-align: center;">
        <div style="font-size: 32px; font-weight: 500; color: var(--br); font-family: 'Outfit', sans-serif; margin-bottom: 6px;">L</div>
        <h4 style="font-size: 18px; margin-bottom: 4px;">Liters</h4>
        <p style="font-size: 13px;">Cooking Oil, Milk, Syrups, Juices</p>
      </div>

      <div class="card" style="padding: 20px; text-align: center;">
        <div style="font-size: 32px; font-weight: 500; color: var(--br); font-family: 'Outfit', sans-serif; margin-bottom: 6px;">pcs</div>
        <h4 style="font-size: 18px; margin-bottom: 4px;">Pieces & Packs</h4>
        <p style="font-size: 13px;">Eggs, Burger Buns, Takeaway Boxes, Cans</p>
      </div>
    </div>
  </div>
</section>

<!-- ================= 17. KITCHEN + INVENTORY CONNECTION ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">INTEGRATED WORKFLOW</div>
      <h2>Connect the Kitchen <span class="sf">to Inventory.</span></h2>
      <p>Maintain continuous alignment between active guest orders, kitchen prep, and ingredient availability.</p>
    </div>

    <!-- Operational Visual Banner -->
    <div style="max-width: 980px; margin: 0 auto; background: #fff; padding: 28px; border-radius: 20px; border: 1px solid var(--line);">
      <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 16px; margin-bottom: 24px;">
        <span style="font-size: 12px; font-weight: 500; color: var(--br); letter-spacing: 0.08em; text-transform: uppercase;">ACTIVE ORDER PIPELINE</span>
        <span class="st-badge instock"><i class="st-dot"></i> Live Sync</span>
      </div>

      <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 14px; font-size: 13px; font-weight: 700; text-align: center;">
        <div style="background: var(--bg2); padding: 12px 18px; border-radius: 10px;">ORDER: Chicken Biryani × 5</div>
        <div style="color: var(--br);">→</div>
        <div style="background: var(--amber-bg); color: var(--amber-text); padding: 12px 18px; border-radius: 10px;">KITCHEN: Preparing</div>
        <div style="color: var(--br);">→</div>
        <div style="background: var(--br-light); color: var(--br); padding: 12px 18px; border-radius: 10px;">INVENTORY: Rice, Chicken, Spices</div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 18. LOW STOCK + MENU AVAILABILITY ================= -->
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">SERVICE READINESS</div>
      <h2>Know When Ingredients <span class="sf">Need Attention.</span></h2>
      <p>Review key ingredient stock levels prior to opening service doors.</p>
    </div>

    <!-- Readiness Check Card -->
    <div class="win" style="max-width: 780px; margin: 0 auto; padding: 28px;">
      <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; padding-bottom: 12px; border-bottom: 1px solid var(--line);">
        <div>
          <h3 style="font-size: 20px;">Pre-Service Readiness Audit</h3>
          <div style="font-size: 13px; color: var(--mute);">Dish: Chicken Biryani</div>
        </div>
        <span class="st-badge lowstock"><i class="st-dot"></i> Attention Required</span>
      </div>

      <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 10px; margin-bottom: 20px;">
        <div style="padding: 10px; background: var(--green-bg); border-radius: 8px; text-align: center; font-size: 12px; font-weight: 700; color: var(--green-text);">Rice ✓</div>
        <div style="padding: 10px; background: var(--green-bg); border-radius: 8px; text-align: center; font-size: 12px; font-weight: 700; color: var(--green-text);">Chicken ✓</div>
        <div style="padding: 10px; background: var(--green-bg); border-radius: 8px; text-align: center; font-size: 12px; font-weight: 700; color: var(--green-text);">Onion ✓</div>
        <div style="padding: 10px; background: var(--red-bg); border-radius: 8px; text-align: center; font-size: 12px; font-weight: 700; color: var(--red-text);">Tomato ⚠ (3 kg)</div>
      </div>

      <div style="background: var(--bg2); padding: 14px; border-radius: 10px; font-size: 14px; font-weight: 700; color: var(--ink); text-align: center;">
        “Review ingredient availability before service.”
      </div>
    </div>
  </div>
</section>

<!-- ================= 19. INVENTORY DURING PEAK SERVICE ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">PEAK HOUR VISIBILITY</div>
      <h2>Stay Aware When the <span class="sf">Kitchen Is Busy.</span></h2>
      <p>Maintain continuous operational awareness over raw materials during peak dining rush.</p>
    </div>

    <!-- Active Stats Grid -->
    <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 18px; max-width: 980px; margin: 0 auto 32px;">
      <div style="background: #fff; padding: 20px; border-radius: 16px; border: 1px solid var(--line); text-align: center;">
        <div style="font-size: 11px; font-weight: 500; color: var(--mute); text-transform: uppercase;">ACTIVE ORDERS</div>
        <div style="font-size: 32px; font-weight: 500; color: var(--ink); font-family: 'Outfit', sans-serif; margin-top: 4px;">18</div>
      </div>
      <div style="background: #fff; padding: 20px; border-radius: 16px; border: 1px solid var(--line); text-align: center;">
        <div style="font-size: 11px; font-weight: 500; color: var(--amber-text); text-transform: uppercase;">INGREDIENTS LOW</div>
        <div style="font-size: 32px; font-weight: 500; color: var(--amber); font-family: 'Outfit', sans-serif; margin-top: 4px;">06</div>
      </div>
      <div style="background: #fff; padding: 20px; border-radius: 16px; border: 1px solid var(--line); text-align: center;">
        <div style="font-size: 11px; font-weight: 500; color: var(--red-text); text-transform: uppercase;">CRITICAL ITEMS</div>
        <div style="font-size: 32px; font-weight: 500; color: var(--red); font-family: 'Outfit', sans-serif; margin-top: 4px;">02</div>
      </div>
      <div style="background: #fff; padding: 20px; border-radius: 16px; border: 1px solid var(--line); text-align: center;">
        <div style="font-size: 11px; font-weight: 500; color: var(--green-text); text-transform: uppercase;">PURCHASES TODAY</div>
        <div style="font-size: 32px; font-weight: 500; color: var(--green); font-family: 'Outfit', sans-serif; margin-top: 4px;">08</div>
      </div>
    </div>

    <!-- Kitchen Ingredient Status Chips -->
    <div style="display: flex; gap: 14px; justify-content: center; flex-wrap: wrap;">
      <span style="padding: 10px 18px; border-radius: 12px; background: #fff; border: 1px solid var(--line); font-size: 13px; font-weight: 700; color: var(--amber-text);">Chicken: 12 kg (Low)</span>
      <span style="padding: 10px 18px; border-radius: 12px; background: #fff; border: 1px solid var(--line); font-size: 13px; font-weight: 700; color: var(--amber-text);">Paneer: 5 kg (Low)</span>
      <span style="padding: 10px 18px; border-radius: 12px; background: #fff; border: 1px solid var(--line); font-size: 13px; font-weight: 700; color: var(--red-text);">Tomato: 3 kg (Critical)</span>
      <span style="padding: 10px 18px; border-radius: 12px; background: #fff; border: 1px solid var(--line); font-size: 13px; font-weight: 700; color: var(--green-text);">Basmati Rice: 42 kg (Healthy)</span>
    </div>
  </div>
</section>

<!-- ================= 20. INVENTORY ACTIVITY TIMELINE ================= -->
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">AUDIT TRAIL</div>
      <h2>See What Changed <span class="sf">in Your Inventory.</span></h2>
      <p>Chronological log of all purchase receipts, kitchen consumptions, and store room adjustments.</p>
    </div>

    <div style="max-width: 720px; margin: 0 auto; display: flex; flex-direction: column; gap: 16px;">
      <!-- Timeline Item 1 -->
      <div style="display: flex; gap: 16px; background: #fff; padding: 18px; border-radius: 14px; border: 1px solid var(--line); align-items: center;">
        <div style="font-size: 13px; font-weight: 500; color: var(--br); width: 80px; flex: none;">09:12 AM</div>
        <div style="flex: 1;">
          <div style="font-weight: 700; color: var(--ink);">Basmati Rice <span style="color: var(--green-text); font-weight: 500;">+50 kg</span></div>
          <div style="font-size: 12px; color: var(--mute);">Purchase Received • PO-2048</div>
        </div>
      </div>

      <!-- Timeline Item 2 -->
      <div style="display: flex; gap: 16px; background: #fff; padding: 18px; border-radius: 14px; border: 1px solid var(--line); align-items: center;">
        <div style="font-size: 13px; font-weight: 500; color: var(--br); width: 80px; flex: none;">10:25 AM</div>
        <div style="flex: 1;">
          <div style="font-weight: 700; color: var(--ink);">Chicken <span style="color: var(--red-text); font-weight: 500;">-5 kg</span></div>
          <div style="font-size: 12px; color: var(--mute);">Stock Adjustment • Prep Room</div>
        </div>
      </div>

      <!-- Timeline Item 3 -->
      <div style="display: flex; gap: 16px; background: #fff; padding: 18px; border-radius: 14px; border: 1px solid var(--line); align-items: center;">
        <div style="font-size: 13px; font-weight: 500; color: var(--br); width: 80px; flex: none;">11:40 AM</div>
        <div style="flex: 1;">
          <div style="font-weight: 700; color: var(--ink);">Tomato <span style="color: var(--amber-text); font-weight: 500;">-3 kg</span></div>
          <div style="font-size: 12px; color: var(--mute);">Kitchen Consumption • Lunch Batch</div>
        </div>
      </div>

      <!-- Timeline Item 4 -->
      <div style="display: flex; gap: 16px; background: #fff; padding: 18px; border-radius: 14px; border: 1px solid var(--line); align-items: center;">
        <div style="font-size: 13px; font-weight: 500; color: var(--br); width: 80px; flex: none;">12:15 PM</div>
        <div style="flex: 1;">
          <div style="font-weight: 700; color: var(--ink);">Paneer <span style="color: var(--red-text); font-weight: 500;">-2 kg</span></div>
          <div style="font-size: 12px; color: var(--mute);">Adjustment • Spoilage Logged</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 21. MOBILE EXPERIENCE ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">RESPONSIVE ACCESSIBILITY</div>
      <h2>Keep Inventory <span class="sf">Within Reach.</span></h2>
      <p>Access inventory status and perform store room audits seamlessly from desktop, tablet, or smartphone.</p>
    </div>

    <!-- Responsive Device Showcase -->
    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 32px; align-items: center; max-width: 1040px; margin: 0 auto;">
      <!-- Desktop View -->
      <div class="win" style="padding: 20px;">
        <div class="wb" style="margin: -20px -20px 16px; padding: 10px 16px;">
          <div class="dots"><i></i><i></i><i></i></div>
          <div class="ttl">DESKTOP INVENTORY DASHBOARD</div>
        </div>
        <table class="inv-tbl">
          <thead>
            <tr><th>ITEM</th><th>STOCK</th><th>STATUS</th></tr>
          </thead>
          <tbody>
            <tr><td>Basmati Rice</td><td>42 kg</td><td><span class="st-badge instock">In Stock</span></td></tr>
            <tr><td>Chicken</td><td>12 kg</td><td><span class="st-badge lowstock">Low Stock</span></td></tr>
            <tr><td>Tomato</td><td>3 kg</td><td><span class="st-badge critical">Critical</span></td></tr>
          </tbody>
        </table>
      </div>

      <!-- Mobile View Mockup -->
      <div style="background: #fff; border: 4px solid var(--ink); border-radius: 28px; padding: 18px 14px; box-shadow: var(--shadow-md);">
        <div style="width: 50px; height: 4px; background: #ccc; border-radius: 2px; margin: 0 auto 16px;"></div>
        <div style="font-size: 12px; font-weight: 500; color: var(--br); margin-bottom: 10px;">MOBILE INVENTORY</div>

        <div style="display: flex; flex-direction: column; gap: 10px;">
          <div style="padding: 10px; background: var(--bg2); border-radius: 10px; font-size: 12px;">
            <div style="font-weight: 700;">Chicken</div>
            <div style="color: var(--amber-text); font-weight: 500;">12 kg • Low Stock</div>
          </div>
          <div style="padding: 10px; background: var(--bg2); border-radius: 10px; font-size: 12px;">
            <div style="font-weight: 700;">Paneer</div>
            <div style="color: var(--amber-text); font-weight: 500;">5 kg • Low Stock</div>
          </div>
          <div style="padding: 10px; background: var(--red-bg); border-radius: 10px; font-size: 12px;">
            <div style="font-weight: 700;">Tomato</div>
            <div style="color: var(--red-text); font-weight: 500;">3 kg • Critical</div>
          </div>
          <div style="padding: 10px; background: var(--green-bg); border-radius: 10px; font-size: 12px;">
            <div style="font-weight: 700;">Rice</div>
            <div style="color: var(--green-text); font-weight: 500;">42 kg • In Stock</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 22. RESTAURANT INDUSTRIES ================= -->
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">TAILORED FOR FOOD BUSINESSES</div>
      <h2>Inventory Management <span class="sf">for Food Businesses.</span></h2>
      <p>Designed for diverse restaurant concepts, from fine dining kitchens to high-volume bakeries.</p>
    </div>

    <div class="ind-grid">
      <!-- 1. Fine Dining -->
      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&w=600&q=80');">
          <div class="ind-overlay"></div>
          <div class="ind-icon">
            <svg viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
          </div>
        </div>
        <div class="ind-content">
          <h4>Fine Dining Restaurants</h4>
          <p>Track premium kitchen ingredients and daily perishable stock.</p>
        </div>
      </div>

      <!-- 2. Casual Dining -->
      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1555396273-367ea4eb4db5?auto=format&fit=crop&w=600&q=80');">
          <div class="ind-overlay"></div>
          <div class="ind-icon">
            <svg viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/></svg>
          </div>
        </div>
        <div class="ind-content">
          <h4>Casual Dining</h4>
          <p>Maintain steady ingredient visibility across busy menu items.</p>
        </div>
      </div>

      <!-- 3. Family Restaurants -->
      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1544025162-d76694265947?auto=format&fit=crop&w=600&q=80');">
          <div class="ind-overlay"></div>
          <div class="ind-icon">
            <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
          </div>
        </div>
        <div class="ind-content">
          <h4>Family Restaurants</h4>
          <p>Manage bulk raw materials, vegetables, and cooking oils efficiently.</p>
        </div>
      </div>

      <!-- 4. Multi-Cuisine -->
      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1618160702438-9b02ab6515c9?auto=format&fit=crop&w=600&q=80');">
          <div class="ind-overlay"></div>
          <div class="ind-icon">
            <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"/></svg>
          </div>
        </div>
        <div class="ind-content">
          <h4>Multi-Cuisine</h4>
          <p>Organize varied spices, specialty sauces, and diverse raw stock.</p>
        </div>
      </div>

      <!-- 5. QSR / Fast Food -->
      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1561758033-d89a9ad46330?auto=format&fit=crop&w=600&q=80');">
          <div class="ind-overlay"></div>
          <div class="ind-icon">
            <svg viewBox="0 0 24 24"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>
          </div>
        </div>
        <div class="ind-content">
          <h4>QSR / Fast Food</h4>
          <p>Monitor high-velocity items, packaging boxes, and frozen stock.</p>
        </div>
      </div>

      <!-- 6. Cafés -->
      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1501339847302-ac426a4a7cbb?auto=format&fit=crop&w=600&q=80');">
          <div class="ind-overlay"></div>
          <div class="ind-icon">
            <svg viewBox="0 0 24 24"><path d="M18 8h1a4 4 0 010 8h-1M2 8h16v9a4 4 0 01-4 4H6a4 4 0 01-4-4V8z"/></svg>
          </div>
        </div>
        <div class="ind-content">
          <h4>Cafés</h4>
          <p>Keep coffee beans, dairy, beverages, and food supplies visible.</p>
        </div>
      </div>

      <!-- 7. Bakeries -->
      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1509440159596-0249088772ff?auto=format&fit=crop&w=600&q=80');">
          <div class="ind-overlay"></div>
          <div class="ind-icon">
            <svg viewBox="0 0 24 24"><path d="M12 2a10 10 0 100 20 10 10 0 000-20z"/></svg>
          </div>
        </div>
        <div class="ind-content">
          <h4>Bakeries</h4>
          <p>Manage flour, dairy, baking ingredients, and packaging materials.</p>
        </div>
      </div>

      <!-- 8. Pizzerias -->
      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1513104890138-7c749659a591?auto=format&fit=crop&w=600&q=80');">
          <div class="ind-overlay"></div>
          <div class="ind-icon">
            <svg viewBox="0 0 24 24"><polygon points="12 2 22 22 2 22 12 2"/></svg>
          </div>
        </div>
        <div class="ind-content">
          <h4>Pizzerias</h4>
          <p>Track cheese, pizza dough ingredients, toppings, and pizza boxes.</p>
        </div>
      </div>

      <!-- 9. Hotels & Resorts -->
      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=600&q=80');">
          <div class="ind-overlay"></div>
          <div class="ind-icon">
            <svg viewBox="0 0 24 24"><path d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16"/></svg>
          </div>
        </div>
        <div class="ind-content">
          <h4>Hotels & Resorts</h4>
          <p>Manage restaurant inventory across multiple dining outlets.</p>
        </div>
      </div>

      <!-- 10. Food Courts -->
      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1552566626-52f8b828add9?auto=format&fit=crop&w=600&q=80');">
          <div class="ind-overlay"></div>
          <div class="ind-icon">
            <svg viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
          </div>
        </div>
        <div class="ind-content">
          <h4>Food Courts</h4>
          <p>Maintain separate store room registers for fast service kiosks.</p>
        </div>
      </div>

      <!-- 11. Cloud Kitchens -->
      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1556910103-1c02745aae4d?auto=format&fit=crop&w=600&q=80');">
          <div class="ind-overlay"></div>
          <div class="ind-icon">
            <svg viewBox="0 0 24 24"><path d="M18 10h-1.26A8 8 0 109 20h9a5 5 0 000-10z"/></svg>
          </div>
        </div>
        <div class="ind-content">
          <h4>Cloud Kitchens</h4>
          <p>Organize ingredients across high-volume delivery preparation.</p>
        </div>
      </div>

      <!-- 12. Canteens -->
      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1576867757603-05b134ebc379?auto=format&fit=crop&w=600&q=80');">
          <div class="ind-overlay"></div>
          <div class="ind-icon">
            <svg viewBox="0 0 24 24"><path d="M3 21h18M5 21V7l8-4 8 4v14"/></svg>
          </div>
        </div>
        <div class="ind-content">
          <h4>Canteens</h4>
          <p>Track large batch ingredients for institutional food service.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 23. MULTIPLE BRANCH INVENTORY ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">MULTI-LOCATION CONTROLS</div>
      <h2>Keep Inventory Visible <span class="sf">Across Locations.</span></h2>
      <p>Compare stock availability and ingredient levels across branch kitchens.</p>
    </div>

    <!-- Branch Stock Comparison -->
    <div class="win" style="max-width: 900px; margin: 0 auto; padding: 28px;">
      <div style="display: flex; gap: 10px; margin-bottom: 24px; border-bottom: 1px solid var(--line); padding-bottom: 14px;">
        <button style="padding: 8px 18px; border-radius: 8px; border: none; background: var(--br); color: #fff; font-size: 13px; font-weight: 700; cursor: pointer;">Chennai Branch</button>
        <button style="padding: 8px 18px; border-radius: 8px; border: 1px solid var(--line); background: #fff; color: var(--mute); font-size: 13px; font-weight: 600; cursor: pointer;">Coimbatore Branch</button>
        <button style="padding: 8px 18px; border-radius: 8px; border: 1px solid var(--line); background: #fff; color: var(--mute); font-size: 13px; font-weight: 600; cursor: pointer;">Salem Branch</button>
        <button style="padding: 8px 18px; border-radius: 8px; border: 1px solid var(--line); background: #fff; color: var(--mute); font-size: 13px; font-weight: 600; cursor: pointer;">Tiruchengode Branch</button>
      </div>

      <div class="g2" style="gap: 20px;">
        <div style="background: #fff; padding: 20px; border-radius: 14px; border: 1px solid var(--line);">
          <div style="font-size: 12px; font-weight: 500; color: var(--br); margin-bottom: 10px;">CHENNAI BRANCH STOCK</div>
          <div style="display: flex; flex-direction: column; gap: 8px; font-size: 14px;">
            <div style="display: justify-content; display: flex; justify-content: space-between;"><span>Rice:</span> <strong>120 kg</strong></div>
            <div style="display: justify-content; display: flex; justify-content: space-between;"><span>Cooking Oil:</span> <strong>48 L</strong></div>
            <div style="display: justify-content; display: flex; justify-content: space-between;"><span>Chicken:</span> <strong>30 kg</strong></div>
          </div>
        </div>

        <div style="background: #fff; padding: 20px; border-radius: 14px; border: 1px solid var(--line);">
          <div style="font-size: 12px; font-weight: 500; color: var(--br); margin-bottom: 10px;">COIMBATORE BRANCH STOCK</div>
          <div style="display: flex; flex-direction: column; gap: 8px; font-size: 14px;">
            <div style="display: justify-content; display: flex; justify-content: space-between;"><span>Rice:</span> <strong>90 kg</strong></div>
            <div style="display: justify-content; display: flex; justify-content: space-between;"><span>Cooking Oil:</span> <strong>35 L</strong></div>
            <div style="display: justify-content; display: flex; justify-content: space-between;"><span>Chicken:</span> <strong>24 kg</strong></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 24. INVENTORY + RESTAURANT ECOSYSTEM ================= -->
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">CONNECTED ECOSYSTEM</div>
      <h2>Inventory Is Connected to the <span class="sf">Rest of Your Restaurant.</span></h2>
      <p>Stock visibility integrates with menus, order routing, kitchen prep, and financial reports.</p>
    </div>

    <!-- Central Node Ecosystem Diagram -->
    <div style="max-width: 900px; margin: 0 auto; background: var(--bg2); padding: 40px 24px; border-radius: 24px; border: 1px solid var(--line); text-align: center;">
      <!-- Central Hub -->
      <div style="width: 180px; height: 180px; border-radius: 50%; background: linear-gradient(135deg, #876039 0%, #a87646 100%); color: #fff; display: flex; flex-direction: column; align-items: center; justify-content: center; margin: 0 auto 36px; box-shadow: 0 10px 30px rgba(135,96,57,0.3); border: 4px solid #fff;">
        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"/></svg>
        <div style="font-size: 14px; font-weight: 500; margin-top: 6px;">INVENTORY</div>
        <div style="font-size: 10px; opacity: 0.9;">MANAGEMENT</div>
      </div>

      <!-- Surrounding Connected Nodes Grid -->
      <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 14px; font-size: 13px; font-weight: 700;">
        <div style="background: #fff; padding: 12px; border-radius: 12px; border: 1px solid var(--line);">Menu Management</div>
        <div style="background: #fff; padding: 12px; border-radius: 12px; border: 1px solid var(--line);">Order Management</div>
        <div style="background: #fff; padding: 12px; border-radius: 12px; border: 1px solid var(--line);">KOT Management</div>
        <div style="background: #fff; padding: 12px; border-radius: 12px; border: 1px solid var(--line);">POS Management</div>
        <div style="background: #fff; padding: 12px; border-radius: 12px; border: 1px solid var(--line);">Table Management</div>
        <div style="background: #fff; padding: 12px; border-radius: 12px; border: 1px solid var(--line);">Purchases Log</div>
        <div style="background: #fff; padding: 12px; border-radius: 12px; border: 1px solid var(--line);">Staff Roles</div>
        <div style="background: #fff; padding: 12px; border-radius: 12px; border: 1px solid var(--line);">Reports & Analytics</div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 25. COMPLETE RESTAURANT INVENTORY JOURNEY ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">END-TO-END FLOW</div>
      <h2>From Purchase to Plate, <span class="sf">Know What Happens to Your Stock.</span></h2>
      <p>Follow your ingredients from initial procurement to daily kitchen consumption.</p>
    </div>

    <!-- Complete Journey Banner -->
    <div class="win" style="max-width: 1040px; margin: 0 auto; padding: 32px;">
      <div style="display: flex; flex-direction: column; gap: 16px;">
        <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px; font-size: 13px; font-weight: 500;">
          <span style="padding: 10px 16px; background: #fff; border-radius: 10px; border: 1px solid var(--line);">1. PURCHASE INGREDIENTS</span>
          <span style="color: var(--br);">→</span>
          <span style="padding: 10px 16px; background: #fff; border-radius: 10px; border: 1px solid var(--line);">2. RECEIVE STOCK</span>
          <span style="color: var(--br);">→</span>
          <span style="padding: 10px 16px; background: #fff; border-radius: 10px; border: 1px solid var(--line);">3. STORE IN PANTRY</span>
          <span style="color: var(--br);">→</span>
          <span style="padding: 10px 16px; background: #fff; border-radius: 10px; border: 1px solid var(--line);">4. PREPARE FOOD</span>
        </div>

        <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px; font-size: 13px; font-weight: 500;">
          <span style="padding: 10px 16px; background: #fff; border-radius: 10px; border: 1px solid var(--line);">5. CONSUME INGREDIENTS</span>
          <span style="color: var(--br);">→</span>
          <span style="padding: 10px 16px; background: #fff; border-radius: 10px; border: 1px solid var(--line);">6. MONITOR STOCK</span>
          <span style="color: var(--br);">→</span>
          <span style="padding: 10px 16px; background: var(--amber-bg); color: var(--amber-text); border-radius: 10px;">7. LOW STOCK WARNING</span>
          <span style="color: var(--br);">→</span>
          <span style="padding: 10px 16px; background: var(--br); color: #fff; border-radius: 10px;">8. REPLENISH ORDER</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 26. INVENTORY REPORTING ================= -->
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">DATA VISIBILITY</div>
      <h2>Turn Inventory Activity <span class="sf">Into Useful Visibility.</span></h2>
      <p>Review key inventory summaries, purchasing metrics, and category distributions.</p>
    </div>

    <!-- Reporting Metrics Grid -->
    <div class="g4" style="margin-bottom: 32px;">
      <div style="background: #fff; padding: 20px; border-radius: 16px; border: 1px solid var(--line); text-align: center;">
        <div style="font-size: 11px; font-weight: 500; color: var(--mute);">TOTAL INVENTORY ITEMS</div>
        <div style="font-size: 32px; font-weight: 500; color: var(--ink); font-family: 'Outfit', sans-serif; margin-top: 4px;">186</div>
      </div>
      <div style="background: #fff; padding: 20px; border-radius: 16px; border: 1px solid var(--line); text-align: center;">
        <div style="font-size: 11px; font-weight: 500; color: var(--amber-text);">LOW STOCK ITEMS</div>
        <div style="font-size: 32px; font-weight: 500; color: var(--amber); font-family: 'Outfit', sans-serif; margin-top: 4px;">28</div>
      </div>
      <div style="background: #fff; padding: 20px; border-radius: 16px; border: 1px solid var(--line); text-align: center;">
        <div style="font-size: 11px; font-weight: 500; color: var(--red-text);">CRITICAL ITEMS</div>
        <div style="font-size: 32px; font-weight: 500; color: var(--red); font-family: 'Outfit', sans-serif; margin-top: 4px;">06</div>
      </div>
      <div style="background: #fff; padding: 20px; border-radius: 16px; border: 1px solid var(--line); text-align: center;">
        <div style="font-size: 11px; font-weight: 500; color: var(--br);">TOTAL PURCHASES</div>
        <div style="font-size: 32px; font-weight: 500; color: var(--br); font-family: 'Outfit', sans-serif; margin-top: 4px;">₹48,620</div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 27. BUSINESS BENEFITS ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">OPERATIONAL ADVANTAGES</div>
      <h2>Built for Better <span class="sf">Restaurant Inventory Control.</span></h2>
      <p>Give your kitchen management team clear visibility to operate smoothly during every service.</p>
    </div>

    <div class="g3">
      <!-- Card 1 -->
      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 14px;">
          <svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
        </div>
        <h4 style="font-size: 18px; margin-bottom: 6px;">Stock Visibility</h4>
        <p style="font-size: 14px;">Know what raw materials and cooking supplies are currently available.</p>
      </div>

      <!-- Card 2 -->
      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 14px;">
          <svg viewBox="0 0 24 24"><path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/></svg>
        </div>
        <h4 style="font-size: 18px; margin-bottom: 6px;">Low Stock Awareness</h4>
        <p style="font-size: 14px;">Identify key ingredients that need attention before service rushes.</p>
      </div>

      <!-- Card 3 -->
      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 14px;">
          <svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/></svg>
        </div>
        <h4 style="font-size: 18px; margin-bottom: 6px;">Purchase Visibility</h4>
        <p style="font-size: 14px;">Keep incoming stock purchase records and supplier receipts organized.</p>
      </div>

      <!-- Card 4 -->
      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 14px;">
          <svg viewBox="0 0 24 24"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/></svg>
        </div>
        <h4 style="font-size: 18px; margin-bottom: 6px;">Inventory Movement</h4>
        <p style="font-size: 14px;">Understand how ingredient quantities change across kitchen shifts.</p>
      </div>

      <!-- Card 5 -->
      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 14px;">
          <svg viewBox="0 0 24 24"><path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9"/></svg>
        </div>
        <h4 style="font-size: 18px; margin-bottom: 6px;">Kitchen Coordination</h4>
        <p style="font-size: 14px;">Connect ingredient availability directly with daily food preparation.</p>
      </div>

      <!-- Card 6 -->
      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 14px;">
          <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/></svg>
        </div>
        <h4 style="font-size: 18px; margin-bottom: 6px;">Better Planning</h4>
        <p style="font-size: 14px;">Give your team clearer stock information for effective daily service.</p>
      </div>
    </div>
  </div>
</section>

<!-- ================= 28. WHY GENI MENU ================= -->
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">THE GENI MENU DIFFERENCE</div>
      <h2>More Than <span class="sf">an Inventory List.</span></h2>
      <p>Geni Menu connects inventory with menus, orders, kitchens, POS and restaurant reporting — bringing stock visibility into the wider restaurant operation.</p>
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
      <span style="padding: 10px 20px; border-radius: 99px; background: var(--br-light); border: 1.5px solid var(--br); font-size: 14px; font-weight: 500; color: var(--br);">Inventory Management</span>
      <span style="padding: 10px 20px; border-radius: 99px; background: var(--bg2); border: 1px solid var(--line); font-size: 14px; font-weight: 700; color: var(--ink);">Payments</span>
      <span style="padding: 10px 20px; border-radius: 99px; background: var(--bg2); border: 1px solid var(--line); font-size: 14px; font-weight: 700; color: var(--ink);">Staff</span>
      <span style="padding: 10px 20px; border-radius: 99px; background: var(--bg2); border: 1px solid var(--line); font-size: 14px; font-weight: 700; color: var(--ink);">Reports</span>
      <span style="padding: 10px 20px; border-radius: 99px; background: var(--bg2); border: 1px solid var(--line); font-size: 14px; font-weight: 700; color: var(--ink);">Multiple Kitchen</span>
      <span style="padding: 10px 20px; border-radius: 99px; background: var(--bg2); border: 1px solid var(--line); font-size: 14px; font-weight: 700; color: var(--ink);">Multiple Branch</span>
    </div>
  </div>
</section>

<!-- ================= 29. FAQ ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">FREQUENTLY ASKED QUESTIONS</div>
      <h2>Inventory Management <span class="sf">FAQ.</span></h2>
      <p>Everything you need to know about tracking stock, purchases, and ingredients in Geni Menu.</p>
    </div>

    <div class="faq-list">
      <!-- Q1 -->
      <div class="faq-item open">
        <div class="faq-q" onclick="toggleFaq(this)">
          1. What is Inventory Management in Geni Menu?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Inventory Management in Geni Menu is a restaurant-focused workspace that helps food businesses track raw ingredients, monitor stock levels, log purchase receipts, and record inventory adjustments.
        </div>
      </div>

      <!-- Q2 -->
      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          2. Can I track restaurant ingredients?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. You can catalog raw materials, vegetables, meat, dairy, beverages, and packaging supplies with assigned custom categories.
        </div>
      </div>

      <!-- Q3 -->
      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          3. Can I track stock quantities and units?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Stock levels can be defined and audited in standard units such as kilograms (kg), liters (L), pieces (pcs), or custom pack sizes.
        </div>
      </div>

      <!-- Q4 -->
      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          4. Can I see low-stock items?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Items reaching predefined thresholds are highlighted with Low Stock or Critical status badges and appear in alert panels for review.
        </div>
      </div>

      <!-- Q5 -->
      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          5. Can I record purchases?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Purchase orders and incoming stock receipts can be logged with supplier details, order dates, item quantities, and cost totals.
        </div>
      </div>

      <!-- Q6 -->
      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          6. Can I record stock adjustments?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Manual stock adjustments can be entered along with specific reason codes such as Spoilage, Damage, Opening Stock, or Manual Correction.
        </div>
      </div>

      <!-- Q7 -->
      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          7. Can I track inventory movement?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Geni Menu maintains a clear movement history showing opening stock, added purchases, recorded consumptions, adjustments, and current balance.
        </div>
      </div>

      <!-- Q8 -->
      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          8. Can inventory be connected with menu items?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. You can associate dish concepts on your menu with the specific ingredient items stored in your inventory workspace.
        </div>
      </div>

      <!-- Q9 -->
      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          9. Can inventory connect with KOT and kitchen operations?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Kitchen Order Tickets and active cooking operations maintain visibility over ingredient availability so kitchen teams stay aligned.
        </div>
      </div>

      <!-- Q10 -->
      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          10. Can I track food waste or spoilage through adjustments?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Spoilage and loss events can be recorded via the adjustment entry workflow to keep store room registers accurate.
        </div>
      </div>

      <!-- Q11 -->
      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          11. Can multiple branches manage inventory?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Multi-branch restaurant businesses can view and manage distinct store room registers across different location profiles.
        </div>
      </div>

      <!-- Q12 -->
      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          12. Can restaurant staff access inventory from mobile devices?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. The inventory interface is responsive, allowing store managers to review stock and make adjustment entries via tablets or mobile browsers.
        </div>
      </div>

      <!-- Q13 -->
      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          13. Can inventory data appear in reports?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Summary metrics regarding total items, low-stock alerts, and purchase totals are reflected in central reporting.
        </div>
      </div>

      <!-- Q14 -->
      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          14. Is Geni Menu Inventory suitable for small restaurants?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Geni Menu Inventory is designed to be straightforward and accessible for small eateries, cafés, bakeries, as well as multi-outlet restaurants.
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 30. FINAL CTA ================= -->
<section style="padding: 100px 0; background: linear-gradient(135deg, #FAF4ED 0%, #EFE4D6 50%, #FAF4ED 100%); color: #21160F; position: relative; overflow: hidden; border-top: 1px solid rgba(135, 96, 57, 0.16);">
  <div class="w" style="text-align: center; position: relative; z-index: 1;">
    <div class="eb" style="background: rgba(135,96,57,0.08); border-color: rgba(135,96,57,0.2); color: #876039; margin-bottom: 24px;">
      READY FOR BETTER INVENTORY CONTROL?
    </div>

    <h2 style="color: #21160F; font-size: clamp(32px, 4.5vw, 52px); margin-bottom: 20px;">
      Know Your Stock <span style="color: #876039; font-family: 'Playfair Display', serif; font-style: italic;">Before You Need It.</span>
    </h2>

    <p style="color: #6E6157; font-size: 18px; max-width: 640px; margin: 0 auto 36px;">
      Bring ingredients, purchases, stock levels and inventory activity into one connected restaurant workflow with Geni Menu.
    </p>

    <div style="display: flex; gap: 16px; justify-content: center; flex-wrap: wrap;">
      <a href="{{ route('restaurant_signup') }}" onclick="if(typeof openPopup === 'function'){ openPopup(); return false; }" class="btn p" style="padding: 16px 36px; font-size: 16px; background: #876039; color: #fff;">Get Started →</a>
      <a href="{{ route('contact.us') }}" class="btn o" style="padding: 16px 36px; font-size: 16px; background: transparent; color: #876039; border: 1.5px solid #876039;">Book a Demo</a>
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

// Dashboard Table Filter Tab Switching
function filterTable(status, btn) {
  const tabs = document.querySelectorAll('.dash-tab');
  tabs.forEach(t => {
    t.style.background = 'transparent';
    t.style.color = 'var(--mute)';
    t.classList.remove('active');
  });

  btn.style.background = 'var(--br)';
  btn.style.color = '#fff';
  btn.classList.add('active');

  const rows = document.querySelectorAll('#mainInvTable tbody tr');
  rows.forEach(row => {
    if (status === 'all') {
      row.style.display = '';
    } else {
      const rowStatus = row.getAttribute('data-status');
      if (rowStatus === status) {
        row.style.display = '';
      } else {
        row.style.display = 'none';
      }
    }
  });
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
