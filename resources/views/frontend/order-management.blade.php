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
  --amber: #F59E0B;
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

/* ===================== CARDS & KANBAN COMPONENTS ===================== */
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

.badge { font-size: 11px; font-weight: 800; padding: 4px 10px; border-radius: 8px; text-transform: uppercase; display: inline-block; letter-spacing: .04em; }
.badge.new { background: #fef3c7; color: #92400e; }
.badge.preparing { background: #dbeafe; color: #1e40af; }
.badge.ready { background: #d1fae5; color: #065f46; }
.badge.completed { background: #f3e8ff; color: #6b21a8; }
.badge.dinein { background: var(--br-light); color: var(--br); }
.badge.takeaway { background: #ffedd5; color: #c2410c; }
.badge.delivery { background: #e0f2fe; color: #0369a1; }
.badge.pickup { background: #fce7f3; color: #9d174d; }

/* Kanban Board Layout */
.kb-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; }
.kb-col { background: var(--bg2); border: 1px solid var(--line); border-radius: 16px; padding: 16px; display: flex; flex-direction: column; gap: 12px; }
.kb-head { display: flex; justify-content: space-between; align-items: center; font-family: 'Outfit', sans-serif; font-weight: 800; font-size: 13px; text-transform: uppercase; letter-spacing: .05em; padding-bottom: 8px; border-bottom: 1px solid var(--line); color: var(--ink); }
.kb-card { background: #fff; border: 1px solid var(--line); border-radius: 12px; padding: 14px; box-shadow: var(--shadow-sm); transition: transform .2s, box-shadow .2s; }
.kb-card:hover { transform: translateY(-2px); box-shadow: var(--shadow-md); border-color: rgba(135,96,57,0.3); }

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
  .g2, .g3, .g4, .ind-grid, .kb-grid { grid-template-columns: 1fr !important; gap: 24px !important; }
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
    <span class="cur">Order Management</span>
  </div>
</div>

<!-- ================= HERO SECTION ================= -->
<section style="padding: 60px 0 80px; background: linear-gradient(180deg, #f9f6f0 0%, #ffffff 100%);">
  <div class="w">
    <div style="text-align: center; max-width: 820px; margin: 0 auto 48px;">
      <div class="eb">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/></svg>
        ORDER MANAGEMENT
      </div>
      <h1 style="margin-bottom: 20px;">
        Every Order. <br><span class="sf">Clear From Start to Finish.</span>
      </h1>
      <p style="font-size: 19px; max-width: 720px; margin: 0 auto 32px; color: var(--mute);">
        Manage dine-in, takeaway, pickup and delivery orders from one connected workspace — from the moment an order is created until it is served or dispatched.
      </p>
      <div style="display: flex; align-items: center; justify-content: center; gap: 16px; flex-wrap: wrap;">
        <a href="{{ route('restaurant_signup') }}" class="btn p" style="padding: 16px 36px; font-size: 16px;">Get Started →</a>
        <a href="{{ route('contact.us') }}" class="btn o" style="padding: 16px 32px; font-size: 16px;">Book a Demo</a>
      </div>
    </div>

    <!-- Hero Visual: Realistic Order Management Kanban Board -->
    <div class="win" style="border: 1.5px solid var(--line); box-shadow: 0 26px 60px rgba(36,26,20,0.14);">
      <div class="wb">
        <div class="dots"><i></i><i></i><i></i></div>
        <div class="ttl">GENI MENU — CENTRAL RESTAURANT ORDER BOARD</div>
        <div style="display: flex; gap: 12px; align-items: center;">
          <span style="font-size: 12px; font-weight: 700; color: var(--br);">LIVE ORDERS: 18</span>
          <span style="width: 8px; height: 8px; border-radius: 50%; background: var(--green);"></span>
        </div>
      </div>

      <div style="padding: 24px; background: #faf8f5;">
        <div class="kb-grid">
          <!-- Column 1: NEW -->
          <div class="kb-col">
            <div class="kb-head">
              <span>NEW (05)</span>
              <span class="badge new">New Order</span>
            </div>

            <div class="kb-card">
              <div style="display: flex; justify-content: space-between; margin-bottom: 6px;">
                <strong style="font-size: 14px;">#ORD-2084</strong>
                <span class="badge dinein">Table T08</span>
              </div>
              <div style="font-size: 12.5px; color: var(--mute); margin-bottom: 10px;">3 Items · ₹1,050</div>
              <div style="display: flex; justify-content: space-between; align-items: center; font-size: 11px; color: var(--mute);">
                <span>12:42 PM</span>
                <span style="color: var(--br); font-weight: 700;">Confirm →</span>
              </div>
            </div>

            <div class="kb-card">
              <div style="display: flex; justify-content: space-between; margin-bottom: 6px;">
                <strong style="font-size: 14px;">#ORD-2088</strong>
                <span class="badge takeaway">Takeaway</span>
              </div>
              <div style="font-size: 12.5px; color: var(--mute); margin-bottom: 10px;">2 Items · ₹480</div>
              <div style="display: flex; justify-content: space-between; align-items: center; font-size: 11px; color: var(--mute);">
                <span>12:51 PM</span>
                <span style="color: var(--br); font-weight: 700;">Confirm →</span>
              </div>
            </div>
          </div>

          <!-- Column 2: PREPARING -->
          <div class="kb-col">
            <div class="kb-head">
              <span>PREPARING (07)</span>
              <span class="badge preparing">In Kitchen</span>
            </div>

            <div class="kb-card">
              <div style="display: flex; justify-content: space-between; margin-bottom: 6px;">
                <strong style="font-size: 14px;">#ORD-2085</strong>
                <span class="badge takeaway">Takeaway</span>
              </div>
              <div style="font-size: 12.5px; color: var(--mute); margin-bottom: 10px;">5 Items · ₹820</div>
              <div style="display: flex; justify-content: space-between; align-items: center; font-size: 11px; color: var(--mute);">
                <span>12:45 PM · 12 min</span>
                <span style="color: var(--blue); font-weight: 700;">Cooking</span>
              </div>
            </div>

            <div class="kb-card">
              <div style="display: flex; justify-content: space-between; margin-bottom: 6px;">
                <strong style="font-size: 14px;">#ORD-2087</strong>
                <span class="badge delivery">Delivery</span>
              </div>
              <div style="font-size: 12.5px; color: var(--mute); margin-bottom: 10px;">6 Items · ₹1,680</div>
              <div style="display: flex; justify-content: space-between; align-items: center; font-size: 11px; color: var(--mute);">
                <span>12:53 PM · 8 min</span>
                <span style="color: var(--blue); font-weight: 700;">Cooking</span>
              </div>
            </div>
          </div>

          <!-- Column 3: READY -->
          <div class="kb-col">
            <div class="kb-head">
              <span>READY (04)</span>
              <span class="badge ready">Pass / Counter</span>
            </div>

            <div class="kb-card">
              <div style="display: flex; justify-content: space-between; margin-bottom: 6px;">
                <strong style="font-size: 14px;">#ORD-2086</strong>
                <span class="badge dinein">Table T04</span>
              </div>
              <div style="font-size: 12.5px; color: var(--mute); margin-bottom: 10px;">4 Items · ₹1,240</div>
              <div style="display: flex; justify-content: space-between; align-items: center; font-size: 11px; color: var(--mute);">
                <span>12:49 PM</span>
                <span style="color: var(--green); font-weight: 800;">Serve Now ✓</span>
              </div>
            </div>

            <div class="kb-card">
              <div style="display: flex; justify-content: space-between; margin-bottom: 6px;">
                <strong style="font-size: 14px;">#ORD-2083</strong>
                <span class="badge pickup">Pickup</span>
              </div>
              <div style="font-size: 12.5px; color: var(--mute); margin-bottom: 10px;">3 Items · ₹640</div>
              <div style="display: flex; justify-content: space-between; align-items: center; font-size: 11px; color: var(--mute);">
                <span>12:38 PM</span>
                <span style="color: var(--green); font-weight: 800;">Handover ✓</span>
              </div>
            </div>
          </div>

          <!-- Column 4: COMPLETED -->
          <div class="kb-col">
            <div class="kb-head">
              <span>COMPLETED (42)</span>
              <span class="badge completed">Done</span>
            </div>

            <div class="kb-card" style="opacity: 0.8;">
              <div style="display: flex; justify-content: space-between; margin-bottom: 6px;">
                <strong style="font-size: 14px;">#ORD-2080</strong>
                <span class="badge dinein">Table T02</span>
              </div>
              <div style="font-size: 12.5px; color: var(--mute); margin-bottom: 10px;">3 Items · ₹760</div>
              <div style="display: flex; justify-content: space-between; align-items: center; font-size: 11px; color: var(--mute);">
                <span>12:22 PM</span>
                <span style="color: #6b21a8; font-weight: 700;">Billed & Paid</span>
              </div>
            </div>
          </div>
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
        <div style="font-family: 'Outfit', sans-serif; font-size: 28px; font-weight: 900; color: var(--br-gold); line-height: 1;">01</div>
        <div>
          <h4 style="font-size: 16px; margin-bottom: 4px;">One Order View</h4>
          <p style="font-size: 13.5px; line-height: 1.5;">Keep restaurant orders visible in one central workspace.</p>
        </div>
      </div>

      <div style="display: flex; gap: 16px; align-items: flex-start;">
        <div style="font-family: 'Outfit', sans-serif; font-size: 28px; font-weight: 900; color: var(--br-gold); line-height: 1;">02</div>
        <div>
          <h4 style="font-size: 16px; margin-bottom: 4px;">Clear Order Status</h4>
          <p style="font-size: 13.5px; line-height: 1.5;">Know what is new, preparing, ready or completed instantly.</p>
        </div>
      </div>

      <div style="display: flex; gap: 16px; align-items: flex-start;">
        <div style="font-family: 'Outfit', sans-serif; font-size: 28px; font-weight: 900; color: var(--br-gold); line-height: 1;">03</div>
        <div>
          <h4 style="font-size: 16px; margin-bottom: 4px;">Better Team Coordination</h4>
          <p style="font-size: 13.5px; line-height: 1.5;">Connect front-of-house service staff with kitchen workflows.</p>
        </div>
      </div>

      <div style="display: flex; gap: 16px; align-items: flex-start;">
        <div style="font-family: 'Outfit', sans-serif; font-size: 28px; font-weight: 900; color: var(--br-gold); line-height: 1;">04</div>
        <div>
          <h4 style="font-size: 16px; margin-bottom: 4px;">Multiple Order Types</h4>
          <p style="font-size: 13.5px; line-height: 1.5;">Manage dine-in, takeaway, pickup and delivery in one system.</p>
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
      <h2>Restaurant Orders Shouldn’t <span class="sf">Get Lost in the Rush.</span></h2>
      <p>During peak meal hours, paper ticket slips get misplaced and verbal kitchen updates cause guest delays. Compare traditional handling with Geni Menu.</p>
    </div>

    <div class="g2">
      <!-- Traditional Order Handling -->
      <div class="card" style="padding: 32px; background: #fff5f5; border-color: rgba(239, 68, 68, 0.2);">
        <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 20px;">
          <div style="width: 40px; height: 40px; border-radius: 10px; background: #fee2e2; color: #dc2626; display: grid; place-items: center; font-weight: 800;">✕</div>
          <div>
            <h3 style="color: #991b1b;">Traditional Order Handling</h3>
            <p style="font-size: 13px; color: #b91c1c;">Paper Slips & Fragmented Communication</p>
          </div>
        </div>

        <ul style="display: flex; flex-direction: column; gap: 14px;">
          <li style="display: flex; gap: 12px; font-size: 14px; color: #7f1d1d;">
            <span style="color: #dc2626; font-weight: 800;">•</span> Orders spread across notepad slips, WhatsApp and separate channels
          </li>
          <li style="display: flex; gap: 12px; font-size: 14px; color: #7f1d1d;">
            <span style="color: #dc2626; font-weight: 800;">•</span> Difficult status visibility—staff repeatedly running to kitchen to check
          </li>
          <li style="display: flex; gap: 12px; font-size: 14px; color: #7f1d1d;">
            <span style="color: #dc2626; font-weight: 800;">•</span> Manual follow-ups leading to missed item modifiers and guest complaints
          </li>
          <li style="display: flex; gap: 12px; font-size: 14px; color: #7f1d1d;">
            <span style="color: #dc2626; font-weight: 800;">•</span> Chaotic peak-hour coordination at the food pickup counter
          </li>
        </ul>
      </div>

      <!-- Geni Menu Order Management -->
      <div class="card" style="padding: 32px; background: #f0fdf4; border-color: rgba(16, 185, 129, 0.3);">
        <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 20px;">
          <div style="width: 40px; height: 40px; border-radius: 10px; background: #d1fae5; color: #059669; display: grid; place-items: center; font-weight: 800;">✓</div>
          <div>
            <h3 style="color: #065f46;">Geni Menu Order Management</h3>
            <p style="font-size: 13px; color: #047857;">Central Digital Order Workspace</p>
          </div>
        </div>

        <ul style="display: flex; flex-direction: column; gap: 14px;">
          <li style="display: flex; gap: 12px; font-size: 14px; color: #064e3b;">
            <span style="color: #10b981; font-weight: 800;">✓</span> Single order board tracking dine-in, takeaway, pickup and delivery
          </li>
          <li style="display: flex; gap: 12px; font-size: 14px; color: #064e3b;">
            <span style="color: #10b981; font-weight: 800;">✓</span> Real-time status stages (New → Preparing → Ready → Completed)
          </li>
          <li style="display: flex; gap: 12px; font-size: 14px; color: #064e3b;">
            <span style="color: #10b981; font-weight: 800;">✓</span> Direct integration with Kitchen Display (KOT) & POS cashier
          </li>
          <li style="display: flex; gap: 12px; font-size: 14px; color: #064e3b;">
            <span style="color: #10b981; font-weight: 800;">✓</span> Clear item notes, variations, and automatic bill calculation
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ================= ORDER DASHBOARD SHOWCASE ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">DASHBOARD WORKSPACE</div>
      <h2>See Every Order <span class="sf">at a Glance.</span></h2>
      <p>Give your restaurant team one clear view of active orders, their status and where each order needs to go next.</p>
    </div>

    <!-- Filter & Search Control Bar -->
    <div style="background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 16px; margin-bottom: 24px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 14px;">
      <div style="display: flex; gap: 10px; flex-wrap: wrap;">
        <button style="padding: 8px 18px; border-radius: 10px; border: 1.5px solid var(--br); background: var(--br); color: #fff; font-weight: 800; font-size: 13px; cursor: pointer;">All Orders (18)</button>
        <button style="padding: 8px 18px; border-radius: 10px; border: 1px solid var(--line); background: #fff; color: var(--ink); font-weight: 600; font-size: 13px; cursor: pointer;">🍽️ Dine-in (11)</button>
        <button style="padding: 8px 18px; border-radius: 10px; border: 1px solid var(--line); background: #fff; color: var(--ink); font-weight: 600; font-size: 13px; cursor: pointer;">🛍️ Takeaway (04)</button>
        <button style="padding: 8px 18px; border-radius: 10px; border: 1px solid var(--line); background: #fff; color: var(--ink); font-weight: 600; font-size: 13px; cursor: pointer;">📦 Pickup (01)</button>
        <button style="padding: 8px 18px; border-radius: 10px; border: 1px solid var(--line); background: #fff; color: var(--ink); font-weight: 600; font-size: 13px; cursor: pointer;">🛵 Delivery (02)</button>
      </div>

      <input type="text" placeholder="🔍 Search by Order # or Table..." value="" style="padding: 8px 16px; border-radius: 10px; border: 1px solid var(--line); font-size: 13px; width: 220px;">
    </div>

    <!-- Interactive-feel Order Board -->
    <div class="card" style="padding: 24px; background: #fff;">
      <div class="g4">
        <!-- New -->
        <div style="background: var(--bg2); padding: 14px; border-radius: 12px; border: 1px solid var(--line);">
          <div style="font-weight: 800; font-size: 12px; color: #92400e; margin-bottom: 12px;">● NEW ORDERS (2)</div>
          <div style="background: #fff; padding: 12px; border-radius: 10px; border: 1px solid var(--line); margin-bottom: 10px;">
            <div style="font-weight: 800; font-size: 14px;">#ORD-2084</div>
            <div style="font-size: 12px; color: var(--mute);">Table T08 · 3 Items</div>
            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 8px;">
              <span style="font-weight: 800; color: var(--br);">₹1,050</span>
              <span class="badge new">Confirm Order</span>
            </div>
          </div>
        </div>

        <!-- Preparing -->
        <div style="background: var(--bg2); padding: 14px; border-radius: 12px; border: 1px solid var(--line);">
          <div style="font-weight: 800; font-size: 12px; color: #1e40af; margin-bottom: 12px;">● PREPARING (3)</div>
          <div style="background: #fff; padding: 12px; border-radius: 10px; border: 1px solid var(--line); margin-bottom: 10px;">
            <div style="font-weight: 800; font-size: 14px;">#ORD-2082</div>
            <div style="font-size: 12px; color: var(--mute);">Table T04 · 5 Items</div>
            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 8px;">
              <span style="font-weight: 800; color: var(--br);">₹1,240</span>
              <span class="badge preparing">Cooking</span>
            </div>
          </div>
        </div>

        <!-- Ready -->
        <div style="background: var(--bg2); padding: 14px; border-radius: 12px; border: 1px solid var(--line);">
          <div style="font-weight: 800; font-size: 12px; color: #065f46; margin-bottom: 12px;">● READY (2)</div>
          <div style="background: #fff; padding: 12px; border-radius: 10px; border: 1px solid var(--line); margin-bottom: 10px;">
            <div style="font-weight: 800; font-size: 14px;">#ORD-2081</div>
            <div style="font-size: 12px; color: var(--mute);">Table T06 · 4 Items</div>
            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 8px;">
              <span style="font-weight: 800; color: var(--br);">₹920</span>
              <span class="badge ready">Serve Now ✓</span>
            </div>
          </div>
        </div>

        <!-- Completed -->
        <div style="background: var(--bg2); padding: 14px; border-radius: 12px; border: 1px solid var(--line);">
          <div style="font-weight: 800; font-size: 12px; color: #6b21a8; margin-bottom: 12px;">● COMPLETED</div>
          <div style="background: #fff; padding: 12px; border-radius: 10px; border: 1px solid var(--line); opacity: 0.8;">
            <div style="font-weight: 800; font-size: 14px;">#ORD-2079</div>
            <div style="font-size: 12px; color: var(--mute);">Table T02 · 3 Items</div>
            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 8px;">
              <span style="font-weight: 800; color: var(--br);">₹760</span>
              <span class="badge completed">Billed & Paid</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= ORDER TYPES ================= -->
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">MULTI-CHANNEL ORDERING</div>
      <h2>One Workspace. <span class="sf">Different Order Types.</span></h2>
      <p>Whether guests are eating in your dining hall, grabbing a quick takeaway, or receiving a delivery, keep every order organized.</p>
    </div>

    <div class="g4">
      <div class="card" style="padding: 24px; text-align: center;">
        <div class="ic" style="margin: 0 auto 16px; width: 56px; height: 56px;"><svg viewBox="0 0 24 24"><path d="M4 19h16M4 15h16M4 11h16M8 7v4M16 7v4"/></svg></div>
        <h3 style="font-size: 18px; margin-bottom: 8px;">Dine-in</h3>
        <p style="font-size: 13.5px;">Linked directly to table numbers and waiter service zones.</p>
      </div>

      <div class="card" style="padding: 24px; text-align: center;">
        <div class="ic" style="margin: 0 auto 16px; width: 56px; height: 56px;"><svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 01-8 0"/></svg></div>
        <h3 style="font-size: 18px; margin-bottom: 8px;">Takeaway</h3>
        <p style="font-size: 13.5px;">Counter pickup orders prepared and packed for immediate customer handover.</p>
      </div>

      <div class="card" style="padding: 24px; text-align: center;">
        <div class="ic" style="margin: 0 auto 16px; width: 56px; height: 56px;"><svg viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"/></svg></div>
        <h3 style="font-size: 18px; margin-bottom: 8px;">Pickup</h3>
        <p style="font-size: 13.5px;">Pre-placed collection orders scheduled for specific pickup times.</p>
      </div>

      <div class="card" style="padding: 24px; text-align: center;">
        <div class="ic" style="margin: 0 auto 16px; width: 56px; height: 56px;"><svg viewBox="0 0 24 24"><rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg></div>
        <h3 style="font-size: 18px; margin-bottom: 8px;">Delivery</h3>
        <p style="font-size: 13.5px;">Home delivery orders tracked from kitchen dispatch to customer door.</p>
      </div>
    </div>
  </div>
</section>

<!-- ================= ORDER DETAIL PANEL & MODIFICATIONS ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">INSPECTOR & CUSTOMIZATION</div>
      <h2>Keep Order Details <span class="sf">Clear & Precise.</span></h2>
      <p>View complete itemization, special dietary notes, prices, and status updates for any active order.</p>
    </div>

    <div class="g2">
      <!-- Order Detail Card -->
      <div class="card" style="padding: 28px;">
        <div style="display: flex; justify-content: space-between; align-items: flex-start; padding-bottom: 16px; border-bottom: 1px solid var(--line); margin-bottom: 20px;">
          <div>
            <h3 style="font-size: 22px;">Order #ORD-2084</h3>
            <div style="font-size: 13px; color: var(--mute); margin-top: 2px;">Dine-in · Table T08 · 3 Guests · Created 12:42 PM</div>
          </div>
          <span class="badge preparing">Preparing</span>
        </div>

        <div style="display: flex; flex-direction: column; gap: 12px; margin-bottom: 20px;">
          <div style="display: flex; justify-content: space-between; align-items: center; font-size: 14px;">
            <div>
              <strong style="color: var(--ink);">Chicken Biryani × 2</strong>
              <div style="font-size: 12px; color: var(--br); font-weight: 700;">Note: "Extra Raita, Medium Spicy"</div>
            </div>
            <div style="font-weight: 800; color: var(--ink);">₹560.00</div>
          </div>

          <div style="display: flex; justify-content: space-between; align-items: center; font-size: 14px;">
            <div>
              <strong style="color: var(--ink);">Paneer Tikka × 1</strong>
              <div style="font-size: 12px; color: var(--mute);">Starter · Mint Dip</div>
            </div>
            <div style="font-weight: 800; color: var(--ink);">₹220.00</div>
          </div>

          <div style="display: flex; justify-content: space-between; align-items: center; font-size: 14px;">
            <div>
              <strong style="color: var(--ink);">Fresh Lime Soda × 2</strong>
              <div style="font-size: 12px; color: var(--br); font-weight: 700;">Note: "No Ice, Less Sugar"</div>
            </div>
            <div style="font-weight: 800; color: var(--ink);">₹160.00</div>
          </div>
        </div>

        <div style="padding-top: 14px; border-top: 1px dashed var(--line); display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
          <span style="font-size: 15px; font-weight: 700; color: var(--mute);">Total Order Value</span>
          <span style="font-size: 22px; font-weight: 900; color: var(--br);">₹940.00</span>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 8px;">
          <button class="btn p" style="padding: 10px; font-size: 12px;">Mark Ready</button>
          <button class="btn o" style="padding: 10px; font-size: 12px;">View KOT</button>
          <button class="btn o" style="padding: 10px; font-size: 12px;">Print Receipt</button>
        </div>
      </div>

      <!-- Connected Workflow Card -->
      <div class="card" style="padding: 28px; background: #fff;">
        <h3 style="font-size: 20px; margin-bottom: 16px;">Order Connections</h3>
        <p style="font-size: 14px; margin-bottom: 24px;">Order Management links every order directly to menu items, kitchen tickets, tables, and POS billing.</p>

        <div style="display: flex; flex-direction: column; gap: 14px;">
          <div style="display: flex; align-items: center; gap: 12px; background: var(--bg2); padding: 12px 16px; border-radius: 12px; border: 1px solid var(--line);">
            <span style="font-weight: 800; color: var(--br);">MENU LINK</span>
            <span style="font-size: 13px;">Items & modifier prices selected directly from menu</span>
          </div>

          <div style="display: flex; align-items: center; gap: 12px; background: var(--bg2); padding: 12px 16px; border-radius: 12px; border: 1px solid var(--line);">
            <span style="font-weight: 800; color: var(--br);">TABLE LINK</span>
            <span style="font-size: 13px;">Dine-in orders attached to Table T08 tab</span>
          </div>

          <div style="display: flex; align-items: center; gap: 12px; background: var(--bg2); padding: 12px 16px; border-radius: 12px; border: 1px solid var(--line);">
            <span style="font-weight: 800; color: var(--br);">KOT LINK</span>
            <span style="font-size: 13px;">Triggers KOT #KOT-1048 on Kitchen Display</span>
          </div>

          <div style="display: flex; align-items: center; gap: 12px; background: var(--bg2); padding: 12px 16px; border-radius: 12px; border: 1px solid var(--line);">
            <span style="font-weight: 800; color: var(--br);">POS LINK</span>
            <span style="font-size: 13px;">Bill INV-2048 ready for single-click payment</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= ORDER STATUS WORKFLOW ================= -->
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">6-STEP ORDER WORKFLOW</div>
      <h2>Know Exactly Where <span class="sf">Every Order Stands.</span></h2>
      <p>Follow every order through clear, transparent status updates from placement to payment completion.</p>
    </div>

    <!-- 6 Step Horizontal Process -->
    <div style="display: grid; grid-template-columns: repeat(6, 1fr); gap: 12px;">
      <div style="background: var(--bg2); border: 1px solid var(--line); border-radius: 14px; padding: 16px; text-align: center;">
        <div style="font-weight: 900; font-size: 11px; color: var(--amber);">STEP 01</div>
        <div style="font-weight: 800; font-size: 13.5px; margin-top: 4px;">New Order</div>
      </div>

      <div style="background: var(--bg2); border: 1px solid var(--line); border-radius: 14px; padding: 16px; text-align: center;">
        <div style="font-weight: 900; font-size: 11px; color: var(--br);">STEP 02</div>
        <div style="font-weight: 800; font-size: 13.5px; margin-top: 4px;">Confirmed</div>
      </div>

      <div style="background: var(--bg2); border: 1px solid var(--line); border-radius: 14px; padding: 16px; text-align: center;">
        <div style="font-weight: 900; font-size: 11px; color: var(--blue);">STEP 03</div>
        <div style="font-weight: 800; font-size: 13.5px; margin-top: 4px;">Preparing</div>
      </div>

      <div style="background: var(--bg2); border: 1px solid var(--line); border-radius: 14px; padding: 16px; text-align: center;">
        <div style="font-weight: 900; font-size: 11px; color: var(--green);">STEP 04</div>
        <div style="font-weight: 800; font-size: 13.5px; margin-top: 4px;">Order Ready</div>
      </div>

      <div style="background: var(--bg2); border: 1px solid var(--line); border-radius: 14px; padding: 16px; text-align: center;">
        <div style="font-weight: 900; font-size: 11px; color: var(--br-gold);">STEP 05</div>
        <div style="font-weight: 800; font-size: 13.5px; margin-top: 4px;">Served / Dispatched</div>
      </div>

      <div style="background: var(--br); color: #fff; border-radius: 14px; padding: 16px; text-align: center; box-shadow: 0 4px 14px rgba(135,96,57,0.3);">
        <div style="font-weight: 900; font-size: 11px; color: var(--br-gold);">STEP 06</div>
        <div style="font-weight: 800; font-size: 13.5px; margin-top: 4px; color: #fff;">Completed</div>
      </div>
    </div>
  </div>
</section>

<!-- ================= KITCHEN COORDINATION & TIMELINE ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">KITCHEN & SERVICE SYNC</div>
      <h2>Keep Front of House and Kitchen <span class="sf">in Sync.</span></h2>
      <p>Waiters and floor managers can monitor cooking progress without repeatedly walking into the kitchen.</p>
    </div>

    <div class="g2">
      <!-- Order Timeline UI -->
      <div class="card" style="padding: 28px;">
        <h3 style="font-size: 18px; margin-bottom: 20px;">Order Activity Timeline (#ORD-2084)</h3>

        <div style="display: flex; flex-direction: column; gap: 16px; position: relative; padding-left: 20px; border-left: 2px solid var(--line);">
          <div>
            <div style="font-size: 11px; font-weight: 800; color: var(--br);">12:42 PM</div>
            <strong style="font-size: 14px;">Order Created</strong>
            <p style="font-size: 12.5px;">Order placed by Waiter Ankit for Table T08</p>
          </div>

          <div>
            <div style="font-size: 11px; font-weight: 800; color: var(--br);">12:43 PM</div>
            <strong style="font-size: 14px;">Order Confirmed & KOT Generated</strong>
            <p style="font-size: 12.5px;">Ticket #KOT-1048 sent to Main Kitchen Display</p>
          </div>

          <div>
            <div style="font-size: 11px; font-weight: 800; color: var(--blue);">12:45 PM</div>
            <strong style="font-size: 14px;">Kitchen Started Preparation</strong>
            <p style="font-size: 12.5px;">Chef accepted ticket and began cooking</p>
          </div>

          <div>
            <div style="font-size: 11px; font-weight: 800; color: var(--green);">12:58 PM</div>
            <strong style="font-size: 14px;">Order Marked Ready</strong>
            <p style="font-size: 12.5px;">Food placed at pickup counter pass</p>
          </div>

          <div>
            <div style="font-size: 11px; font-weight: 800; color: #065f46;">01:01 PM</div>
            <strong style="font-size: 14px;">Food Served to Table T08</strong>
            <p style="font-size: 12.5px;">Waiter delivered dishes to guests</p>
          </div>
        </div>
      </div>

      <!-- Peak Hour Live Statistics -->
      <div class="card" style="padding: 28px; background: #fff;">
        <h3 style="font-size: 18px; margin-bottom: 20px;">Peak Rush Order Metrics</h3>
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 20px;">
          <div style="background: var(--bg2); padding: 16px; border-radius: 12px; border: 1px solid var(--line);">
            <div style="font-size: 12px; color: var(--mute);">Orders Today</div>
            <div style="font-size: 30px; font-weight: 900; color: var(--br); margin-top: 4px;">186</div>
          </div>
          <div style="background: var(--bg2); padding: 16px; border-radius: 12px; border: 1px solid var(--line);">
            <div style="font-size: 12px; color: var(--mute);">Active Orders</div>
            <div style="font-size: 30px; font-weight: 900; color: var(--ink); margin-top: 4px;">18</div>
          </div>
          <div style="background: var(--bg2); padding: 16px; border-radius: 12px; border: 1px solid var(--line);">
            <div style="font-size: 12px; color: var(--mute);">Avg Prep Time</div>
            <div style="font-size: 30px; font-weight: 900; color: var(--green); margin-top: 4px;">14 min</div>
          </div>
          <div style="background: var(--bg2); padding: 16px; border-radius: 12px; border: 1px solid var(--line);">
            <div style="font-size: 12px; color: var(--mute);">Avg Order Value</div>
            <div style="font-size: 30px; font-weight: 900; color: var(--ink); margin-top: 4px;">₹640</div>
          </div>
        </div>

        <div style="font-size: 13px; color: var(--mute); text-align: center;">
          ⚡ All order updates automatically sync across staff tablets and kitchen displays.
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= RESTAURANT INDUSTRIES ================= -->
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">MULTI-FORMAT COMPATIBILITY</div>
      <h2>Built for Different <span class="sf">Restaurant Workflows.</span></h2>
      <p>Whether you run a high-volume QSR counter, a fine dining room, a café, or a cloud kitchen, Geni Menu adapts to your kitchen and order flow.</p>
    </div>

    <div class="ind-grid">
      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&w=600&q=80');">
          <div class="ind-overlay"></div>
          <div class="ind-icon"><svg viewBox="0 0 24 24"><path d="M4 19h16M4 15h16M4 11h16M8 7v4M16 7v4"/></svg></div>
        </div>
        <div class="ind-content">
          <h4>Fine Dining</h4>
          <p>Keep table orders, course timing, and waiter requests organized.</p>
        </div>
      </div>

      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1555396273-367ea4eb4db5?auto=format&fit=crop&w=600&q=80');">
          <div class="ind-overlay"></div>
          <div class="ind-icon"><svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/></svg></div>
        </div>
        <div class="ind-content">
          <h4>QSR & Fast Food</h4>
          <p>Manage high-volume counter order tickets and fast turnarounds.</p>
        </div>
      </div>

      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1526367790999-0150786686a2?auto=format&fit=crop&w=600&q=80');">
          <div class="ind-overlay"></div>
          <div class="ind-icon"><svg viewBox="0 0 24 24"><rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg></div>
        </div>
        <div class="ind-content">
          <h4>Cloud Kitchens</h4>
          <p>Keep incoming multi-channel delivery orders clear from preparation to dispatch.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= CONNECTED RESTAURANT ECOSYSTEM ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">CONNECTED PLATFORM</div>
      <h2>Order Management Connects <span class="sf">the Entire Restaurant.</span></h2>
      <p>Geni Menu Order Management acts as the operational bridge between customer menu choices, kitchen tickets, tables, and POS payments.</p>
    </div>

    <div class="card" style="padding: 40px; text-align: center; background: linear-gradient(180deg, #ffffff 0%, #faf8f5 100%);">
      <div style="display: inline-block; padding: 14px 28px; background: var(--br); color: #fff; border-radius: 16px; font-weight: 900; font-size: 20px; font-family: 'Outfit', sans-serif; box-shadow: 0 8px 24px rgba(135,96,57,0.3); margin-bottom: 32px;">
        CENTRAL ORDER MANAGEMENT ENGINE
      </div>

      <div class="g4" style="text-align: left;">
        <div style="background: #fff; border: 1px solid var(--line); border-radius: 14px; padding: 16px;">
          <h4 style="font-size: 15px; margin-bottom: 4px; color: var(--br);">Menu Management</h4>
          <p style="font-size: 12.5px;">Orders pull exact item prices, variations & modifier add-ons.</p>
        </div>

        <div style="background: #fff; border: 1px solid var(--line); border-radius: 14px; padding: 16px;">
          <h4 style="font-size: 15px; margin-bottom: 4px; color: var(--br);">Table Management</h4>
          <p style="font-size: 12.5px;">Dine-in orders attach directly to active table floor tabs.</p>
        </div>

        <div style="background: #fff; border: 1px solid var(--line); border-radius: 14px; padding: 16px;">
          <h4 style="font-size: 15px; margin-bottom: 4px; color: var(--br);">KOT Management</h4>
          <p style="font-size: 12.5px;">Order creation automatically prints or displays kitchen tickets.</p>
        </div>

        <div style="background: #fff; border: 1px solid var(--line); border-radius: 14px; padding: 16px;">
          <h4 style="font-size: 15px; margin-bottom: 4px; color: var(--br);">POS & Billing</h4>
          <p style="font-size: 12.5px;">Completed orders feed into final tax invoicing & payments.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= FAQ SECTION ================= -->
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">GOT QUESTIONS?</div>
      <h2>Frequently Asked <span class="sf">Questions.</span></h2>
      <p>Everything you need to know about Geni Menu Order Management.</p>
    </div>

    <div class="faq-list">
      <div class="faq-item open">
        <div class="faq-q" onclick="faq(this)">
          1. What is Order Management in Geni Menu?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Order Management in Geni Menu is a central digital workspace that tracks dine-in, takeaway, pickup, and delivery orders across clear workflow stages from order creation to final fulfillment.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="faq(this)">
          2. Can dine-in orders be linked directly to table numbers?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Dine-in orders link directly to specific table numbers on your floor plan, allowing staff to add items to open table tabs.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="faq(this)">
          3. How does Order Management connect with the kitchen (KOT)?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          When an order is confirmed, it generates a Kitchen Order Ticket (KOT) on kitchen display screens or thermal printers.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="faq(this)">
          4. Can takeaway, pickup, and delivery orders be managed?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. You can manage all non-dine-in order types with clear badges, customer contact details, and fulfillment statuses.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="faq(this)">
          5. Can staff add custom order notes or item instructions?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Staff can append special dietary preferences, spice levels, or modification notes (e.g. "Less spicy", "No ice") to individual items.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="faq(this)">
          6. Can staff manage orders from mobile devices or tablets?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Geni Menu Order Management is accessible via mobile web browsers, handheld tablets, and desktop POS counters.
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= FINAL CTA ================= -->
<section style="padding: 96px 0; background: linear-gradient(135deg, #1e140e 0%, #2e2017 100%); color: #fff;">
  <div class="w" style="text-align: center; max-width: 800px;">
    <div class="eb" style="background: rgba(255,255,255,0.08); border-color: rgba(255,255,255,0.18); color: var(--br-gold);">TRANSFORM YOUR ORDER FLOW</div>
    <h2 style="color: #fff; font-size: clamp(32px, 4vw, 48px); margin-bottom: 20px;">
      Bring Every Restaurant Order Into <span style="color: var(--br-gold); font-family: 'Playfair Display', Georgia, serif; font-style: italic;">One Clear Workflow.</span>
    </h2>
    <p style="color: #c7b8a8; font-size: 18px; margin-bottom: 36px; line-height: 1.6;">
      From the first order to the final handoff, keep your restaurant team connected with Geni Menu Order Management.
    </p>
    <div style="display: flex; align-items: center; justify-content: center; gap: 16px; flex-wrap: wrap;">
      <a href="{{ route('restaurant_signup') }}" class="btn p" style="padding: 16px 36px; font-size: 16px;">Get Started →</a>
      <a href="{{ route('contact.us') }}" class="btn o" style="padding: 16px 32px; font-size: 16px; background: transparent; color: #fff; border-color: rgba(255,255,255,0.3);">Book a Demo</a>
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
