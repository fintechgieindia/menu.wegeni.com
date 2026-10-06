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

/* ===================== CARDS & KITCHEN DISPLAY COMPONENTS ===================== */
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
.badge.new { background: #fef3c7; color: #92400e; }
.badge.preparing { background: #dbeafe; color: #1e40af; }
.badge.ready { background: #d1fae5; color: #065f46; }
.badge.completed { background: #f3e8ff; color: #6b21a8; }
.badge.cancelled { background: #fee2e2; color: #991b1b; }
.badge.dinein { background: var(--br-light); color: var(--br); }
.badge.takeaway { background: #ffedd5; color: #c2410c; }
.badge.delivery { background: #e0f2fe; color: #0369a1; }

/* KOT Ticket Card Layout */
.kot-card { background: #fff; border: 1.5px solid var(--line); border-radius: 14px; padding: 16px; box-shadow: var(--shadow-sm); transition: transform .2s, box-shadow .2s; }
.kot-card:hover { transform: translateY(-2px); box-shadow: var(--shadow-md); border-color: rgba(135,96,57,0.3); }

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
    <span class="cur">KOT Management</span>
  </div>
</div>

<!-- ================= HERO SECTION ================= -->
<section style="padding: 60px 0 80px; background: linear-gradient(180deg, #f9f6f0 0%, #ffffff 100%);">
  <div class="w">
    <div style="text-align: center; max-width: 820px; margin: 0 auto 48px;">
      <div class="eb">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M6 13.87A4 4 0 017.41 6a5.11 5.11 0 019.18 0A4 4 0 0118 13.87V21H6v-7.13z"/></svg>
        KOT MANAGEMENT (KITCHEN ORDER TICKETS)
      </div>
      <h1 style="margin-bottom: 20px;">
        From Order to Kitchen. <br><span class="sf">Without the Confusion.</span>
      </h1>
      <p style="font-size: 19px; max-width: 720px; margin: 0 auto 32px; color: var(--mute);">
        Send clear kitchen order information from the restaurant floor to the right preparation workflow, so your kitchen team knows what to prepare and where every order belongs.
      </p>
      <div style="display: flex; align-items: center; justify-content: center; gap: 16px; flex-wrap: wrap;">
        <a href="{{ route('restaurant_signup') }}" class="btn p" style="padding: 16px 36px; font-size: 16px;">Get Started →</a>
        <a href="{{ route('contact.us') }}" class="btn o" style="padding: 16px 32px; font-size: 16px;">Book a Demo</a>
      </div>
    </div>

    <!-- Hero Visual: Realistic Kitchen Order Display System (KDS) -->
    <div class="win" style="border: 1.5px solid var(--line); box-shadow: 0 26px 60px rgba(36,26,20,0.14);">
      <div class="wb">
        <div class="dots"><i></i><i></i><i></i></div>
        <div class="ttl">GENI MENU — KITCHEN DISPLAY SYSTEM (MAIN PASS SCREEN)</div>
        <div style="display: flex; gap: 12px; align-items: center;">
          <span style="font-size: 12px; font-weight: 700; color: var(--br);">ACTIVE KITCHEN TICKETS: 08</span>
          <span style="width: 8px; height: 8px; border-radius: 50%; background: var(--green);"></span>
        </div>
      </div>

      <!-- KDS Kitchen Header Bar -->
      <div style="background: #1c1510; color: #fff; padding: 14px 24px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 14px;">
        <div style="display: flex; align-items: center; gap: 16px;">
          <div style="font-family: 'Outfit', sans-serif; font-weight: 500; font-size: 16px; color: var(--br-gold);">MAIN KITCHEN PASS</div>
          <span style="background: rgba(255,255,255,0.12); padding: 4px 10px; border-radius: 6px; font-size: 11px;">Chef: Suresh Kumar</span>
        </div>
        <div style="display: flex; gap: 10px; font-size: 12px; font-weight: 700;">
          <span style="color: #fcd34d;">NEW: 02</span>
          <span style="color: #93c5fd;">PREPARING: 04</span>
          <span style="color: #6ee7b7;">READY: 02</span>
        </div>
      </div>

      <!-- KOT Ticket Board -->
      <div style="padding: 24px; background: #faf8f5;">
        <div class="g4">
          <!-- KOT #1048 -->
          <div class="kot-card" style="border-top: 4px solid var(--amber);">
            <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
              <strong style="font-size: 15px; font-family: 'Outfit', sans-serif;">KOT #1048</strong>
              <span class="badge dinein">Table T08</span>
            </div>
            <div style="font-size: 11px; color: var(--mute); margin-bottom: 12px;">Order #ORD-2084 · 12:42 PM (4 min ago)</div>
            
            <div style="display: flex; flex-direction: column; gap: 6px; font-size: 13px; margin-bottom: 14px;">
              <div style="display: flex; justify-content: space-between; font-weight: 700;">
                <span>Chicken Biryani</span>
                <span style="color: var(--br);">× 2</span>
              </div>
              <div style="display: flex; justify-content: space-between; font-weight: 700;">
                <span>Paneer Tikka</span>
                <span style="color: var(--br);">× 1</span>
              </div>
              <div style="display: flex; justify-content: space-between; font-weight: 700;">
                <span>Lime Soda</span>
                <span style="color: var(--br);">× 2</span>
              </div>
            </div>

            <div style="background: #fffbeb; border: 1px solid rgba(245,158,11,0.3); border-radius: 8px; padding: 8px; font-size: 11.5px; font-weight: 700; color: #92400e; margin-bottom: 14px;">
              Note: "Less spicy, Extra Raita"
            </div>

            <button class="btn p" style="width: 100%; padding: 8px; font-size: 12px;">Start Preparing →</button>
          </div>

          <!-- KOT #1049 -->
          <div class="kot-card" style="border-top: 4px solid var(--blue);">
            <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
              <strong style="font-size: 15px; font-family: 'Outfit', sans-serif;">KOT #1049</strong>
              <span class="badge dinein">Table T04</span>
            </div>
            <div style="font-size: 11px; color: var(--mute); margin-bottom: 12px;">Order #ORD-2086 · 12:46 PM (12 min cooking)</div>

            <div style="display: flex; flex-direction: column; gap: 6px; font-size: 13px; margin-bottom: 14px;">
              <div style="display: flex; justify-content: space-between; font-weight: 700;">
                <span>Margherita Pizza</span>
                <span style="color: var(--br);">× 1</span>
              </div>
              <div style="display: flex; justify-content: space-between; font-weight: 700;">
                <span>Penne Pasta</span>
                <span style="color: var(--br);">× 2</span>
              </div>
              <div style="display: flex; justify-content: space-between; font-weight: 700;">
                <span>Garlic Bread</span>
                <span style="color: var(--br);">× 1</span>
              </div>
              <div style="display: flex; justify-content: space-between; font-weight: 700;">
                <span>Cold Coffee</span>
                <span style="color: var(--br);">× 1</span>
              </div>
            </div>

            <button class="btn p" style="width: 100%; padding: 8px; font-size: 12px; background: linear-gradient(135deg, #10b981, #059669); border-color: #059669;">Mark Ready ✓</button>
          </div>

          <!-- KOT #1050 -->
          <div class="kot-card" style="border-top: 4px solid var(--green);">
            <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
              <strong style="font-size: 15px; font-family: 'Outfit', sans-serif;">KOT #1050</strong>
              <span class="badge takeaway">Takeaway</span>
            </div>
            <div style="font-size: 11px; color: var(--mute); margin-bottom: 12px;">Order #ORD-2089 · 12:49 PM (Ready at Pass)</div>

            <div style="display: flex; flex-direction: column; gap: 6px; font-size: 13px; margin-bottom: 14px;">
              <div style="display: flex; justify-content: space-between; font-weight: 700;">
                <span>Veg Pulao</span>
                <span style="color: var(--br);">× 2</span>
              </div>
              <div style="display: flex; justify-content: space-between; font-weight: 700;">
                <span>Dal Tadka</span>
                <span style="color: var(--br);">× 1</span>
              </div>
              <div style="display: flex; justify-content: space-between; font-weight: 700;">
                <span>Butter Roti</span>
                <span style="color: var(--br);">× 4</span>
              </div>
            </div>

            <div style="background: #ecfdf5; border: 1px solid var(--green); border-radius: 8px; padding: 8px; font-size: 11.5px; font-weight: 700; color: #065f46; margin-bottom: 14px;">
              Status: READY FOR PASS
            </div>

            <button class="btn o" style="width: 100%; padding: 8px; font-size: 12px; color: #065f46; border-color: var(--green);">Dispatched ✓</button>
          </div>

          <!-- KOT #1051 -->
          <div class="kot-card" style="border-top: 4px solid var(--amber);">
            <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
              <strong style="font-size: 15px; font-family: 'Outfit', sans-serif;">KOT #1051</strong>
              <span class="badge delivery">Delivery</span>
            </div>
            <div style="font-size: 11px; color: var(--mute); margin-bottom: 12px;">Order #ORD-2092 · 12:53 PM (Just arrived)</div>

            <div style="display: flex; flex-direction: column; gap: 6px; font-size: 13px; margin-bottom: 14px;">
              <div style="display: flex; justify-content: space-between; font-weight: 700;">
                <span>Butter Chicken</span>
                <span style="color: var(--br);">× 1</span>
              </div>
              <div style="display: flex; justify-content: space-between; font-weight: 700;">
                <span>Jeera Rice</span>
                <span style="color: var(--br);">× 1</span>
              </div>
            </div>

            <button class="btn p" style="width: 100%; padding: 8px; font-size: 12px;">Start Preparing →</button>
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
        <div style="font-family: 'Outfit', sans-serif; font-size: 28px; font-weight: 500; color: var(--br-gold); line-height: 1;">01</div>
        <div>
          <h4 style="font-size: 16px; margin-bottom: 4px;">Clear Kitchen Tickets</h4>
          <p style="font-size: 13.5px; line-height: 1.5;">Give kitchen staff clear item, portion and modifier instructions.</p>
        </div>
      </div>

      <div style="display: flex; gap: 16px; align-items: flex-start;">
        <div style="font-family: 'Outfit', sans-serif; font-size: 28px; font-weight: 500; color: var(--br-gold); line-height: 1;">02</div>
        <div>
          <h4 style="font-size: 16px; margin-bottom: 4px;">Better Order Visibility</h4>
          <p style="font-size: 13.5px; line-height: 1.5;">Know what is waiting, currently preparing and ready at the pass.</p>
        </div>
      </div>

      <div style="display: flex; gap: 16px; align-items: flex-start;">
        <div style="font-family: 'Outfit', sans-serif; font-size: 28px; font-weight: 500; color: var(--br-gold); line-height: 1;">03</div>
        <div>
          <h4 style="font-size: 16px; margin-bottom: 4px;">Organized Kitchen Flow</h4>
          <p style="font-size: 13.5px; line-height: 1.5;">Keep kitchen preparation work clear and visible during dinner rush.</p>
        </div>
      </div>

      <div style="display: flex; gap: 16px; align-items: flex-start;">
        <div style="font-family: 'Outfit', sans-serif; font-size: 28px; font-weight: 500; color: var(--br-gold); line-height: 1;">04</div>
        <div>
          <h4 style="font-size: 16px; margin-bottom: 4px;">Connected Operations</h4>
          <p style="font-size: 13.5px; line-height: 1.5;">Connect KOT tickets with dining tables, waiters, POS and billing.</p>
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
      <h2>Your Kitchen Needs More Than <span class="sf">an Order Number.</span></h2>
      <p>Paper slips get soaked in kitchen steam, item notes get misread, and waiters constantly interrupt chefs to check order progress. Compare traditional kitchen communication with Geni Menu KOT.</p>
    </div>

    <div class="g2">
      <!-- Traditional Kitchen Communication -->
      <div class="card" style="padding: 32px; background: #fff5f5; border-color: rgba(239, 68, 68, 0.2);">
        <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 20px;">
          <div style="width: 40px; height: 40px; border-radius: 10px; background: #fee2e2; color: #dc2626; display: grid; place-items: center; font-weight: 500;">✕</div>
          <div>
            <h3 style="color: #991b1b;">Traditional Kitchen Communication</h3>
            <p style="font-size: 13px; color: #b91c1c;">Paper Tickets & Verbal Clarifications</p>
          </div>
        </div>

        <ul style="display: flex; flex-direction: column; gap: 14px;">
          <li style="display: flex; gap: 12px; font-size: 14px; color: #7f1d1d;">
            <span style="color: #dc2626; font-weight: 500;">•</span> Unclear paper ticket handwriting leading to wrong dish preparation
          </li>
          <li style="display: flex; gap: 12px; font-size: 14px; color: #7f1d1d;">
            <span style="color: #dc2626; font-weight: 500;">•</span> Manual verbal communication causing kitchen noise and confusion
          </li>
          <li style="display: flex; gap: 12px; font-size: 14px; color: #7f1d1d;">
            <span style="color: #dc2626; font-weight: 500;">•</span> Difficult ticket prioritization during rush hours
          </li>
          <li style="display: flex; gap: 12px; font-size: 14px; color: #7f1d1d;">
            <span style="color: #dc2626; font-weight: 500;">•</span> Status visibility gaps between kitchen pass and dining room waiters
          </li>
        </ul>
      </div>

      <!-- Geni Menu KOT -->
      <div class="card" style="padding: 32px; background: #f0fdf4; border-color: rgba(16, 185, 129, 0.3);">
        <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 20px;">
          <div style="width: 40px; height: 40px; border-radius: 10px; background: #d1fae5; color: #059669; display: grid; place-items: center; font-weight: 500;">✓</div>
          <div>
            <h3 style="color: #065f46;">Geni Menu KOT</h3>
            <p style="font-size: 13px; color: #047857;">Structured Digital Kitchen Order Tickets</p>
          </div>
        </div>

        <ul style="display: flex; flex-direction: column; gap: 14px;">
          <li style="display: flex; gap: 12px; font-size: 14px; color: #064e3b;">
            <span style="color: #10b981; font-weight: 500;">✓</span> Digital tickets with clear item quantities, sizes, and special notes
          </li>
          <li style="display: flex; gap: 12px; font-size: 14px; color: #064e3b;">
            <span style="color: #10b981; font-weight: 500;">✓</span> Automatic table and order type identification (Dine-in, Takeaway)
          </li>
          <li style="display: flex; gap: 12px; font-size: 14px; color: #064e3b;">
            <span style="color: #10b981; font-weight: 500;">✓</span> Visible preparation status (New → Preparing → Ready)
          </li>
          <li style="display: flex; gap: 12px; font-size: 14px; color: #064e3b;">
            <span style="color: #10b981; font-weight: 500;">✓</span> Seamless 2-way status synchronization with POS and waiter devices
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ================= ORDER TO KOT CONNECTION ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">AUTOMATIC TICKET GENERATION</div>
      <h2>Turn Every Order Into a <span class="sf">Clear Kitchen Ticket.</span></h2>
      <p>The moment an order is confirmed by your server or cashier, Geni Menu converts it into a structured KOT for immediate kitchen preparation.</p>
    </div>

    <!-- Side-by-Side Connection Diagram -->
    <div class="g2">
      <!-- Left: Front of House Order -->
      <div class="card" style="padding: 28px;">
        <div style="font-size: 12px; font-weight: 500; color: var(--br); text-transform: uppercase; letter-spacing: .08em; margin-bottom: 8px;">1. Front of House Order</div>
        <h3 style="font-size: 20px; margin-bottom: 16px;">Order #ORD-2084</h3>
        
        <div style="background: var(--bg2); border: 1px solid var(--line); border-radius: 12px; padding: 16px; margin-bottom: 16px;">
          <div style="display: flex; justify-content: space-between; font-size: 13.5px; margin-bottom: 6px;">
            <span>Table: <strong>T08 (3 Guests)</strong></span>
            <span class="badge dinein">Dine-in</span>
          </div>
          <div style="font-size: 12px; color: var(--mute);">Server: Ankit K. · Time: 12:42 PM</div>
        </div>

        <div style="display: flex; flex-direction: column; gap: 8px; font-size: 13.5px; margin-bottom: 16px;">
          <div style="display: flex; justify-content: space-between;">
            <span>Chicken Biryani</span>
            <strong style="color: var(--br);">× 2</strong>
          </div>
          <div style="display: flex; justify-content: space-between;">
            <span>Paneer Tikka</span>
            <strong style="color: var(--br);">× 1</strong>
          </div>
          <div style="display: flex; justify-content: space-between;">
            <span>Lime Soda</span>
            <strong style="color: var(--br);">× 2</strong>
          </div>
        </div>

        <div style="background: #fff; border: 1px dashed var(--line); border-radius: 8px; padding: 10px; font-size: 12px; color: var(--mute);">
          Note: "Less spicy, Extra Raita"
        </div>
      </div>

      <!-- Right: Generated KOT -->
      <div class="card" style="padding: 28px; background: #fff; border: 2px solid var(--br);">
        <div style="font-size: 12px; font-weight: 500; color: var(--br); text-transform: uppercase; letter-spacing: .08em; margin-bottom: 8px;">2. Generated KOT Ticket</div>
        <h3 style="font-size: 20px; margin-bottom: 16px; color: var(--br);">KOT #1048</h3>

        <div style="background: var(--br-light); border: 1px solid rgba(135,96,57,0.3); border-radius: 12px; padding: 16px; margin-bottom: 16px;">
          <div style="display: flex; justify-content: space-between; font-size: 14px; font-weight: 500; color: var(--ink);">
            <span>TABLE T08</span>
            <span class="badge new">New KOT</span>
          </div>
          <div style="font-size: 12px; color: var(--mute); margin-top: 4px;">Dispatched to Main Kitchen Pass</div>
        </div>

        <div style="display: flex; flex-direction: column; gap: 10px; font-size: 14px; font-weight: 500; color: var(--ink); margin-bottom: 16px;">
          <div style="display: flex; justify-content: space-between; padding-bottom: 6px; border-bottom: 1px solid var(--line);">
            <span>Chicken Biryani (Dum)</span>
            <span style="font-size: 16px; color: var(--br);">2 Qty</span>
          </div>
          <div style="display: flex; justify-content: space-between; padding-bottom: 6px; border-bottom: 1px solid var(--line);">
            <span>Paneer Tikka (Tandoori)</span>
            <span style="font-size: 16px; color: var(--br);">1 Qty</span>
          </div>
          <div style="display: flex; justify-content: space-between; padding-bottom: 6px; border-bottom: 1px solid var(--line);">
            <span>Fresh Lime Soda</span>
            <span style="font-size: 16px; color: var(--br);">2 Qty</span>
          </div>
        </div>

        <div style="background: #fffbeb; border: 1.5px solid var(--amber); border-radius: 8px; padding: 10px; font-size: 12px; font-weight: 500; color: #92400e;">
          ⚠️ CHEF INSTRUCTION: "Less spicy, Extra Raita"
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= MULTIPLE KITCHENS / STATIONS ================= -->
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">KITCHEN STATION ROUTING</div>
      <h2>Keep Different Kitchens and <span class="sf">Stations Organized.</span></h2>
      <p>Route appetizers to the tandoor, main courses to curry stations, drinks to the bar, and desserts to the pastry counter.</p>
    </div>

    <div class="g4">
      <div class="card" style="padding: 20px; text-align: center;">
        <div class="ic" style="margin: 0 auto 12px;"><svg viewBox="0 0 24 24"><path d="M12 2c-4 0-8 4-8 8 0 5 8 12 8 12s8-7 8-12c0-4-4-8-8-8z"/></svg></div>
        <h4 style="font-size: 16px; margin-bottom: 4px;">Main Curry Station</h4>
        <p style="font-size: 12.5px;">Biryanis, gravies, rice items and main courses.</p>
        <span class="badge new" style="margin-top: 10px;">04 Tickets Pending</span>
      </div>

      <div class="card" style="padding: 20px; text-align: center;">
        <div class="ic" style="margin: 0 auto 12px;"><svg viewBox="0 0 24 24"><path d="M12 2l3 7h7l-6 4 2 7-6-4-6 4 2-7-6-4h7z"/></svg></div>
        <h4 style="font-size: 16px; margin-bottom: 4px;">Tandoor / Grill</h4>
        <p style="font-size: 12.5px;">Kebabs, tikkas, naan breads and appetizers.</p>
        <span class="badge preparing" style="margin-top: 10px;">03 Tickets Cooking</span>
      </div>

      <div class="card" style="padding: 20px; text-align: center;">
        <div class="ic" style="margin: 0 auto 12px;"><svg viewBox="0 0 24 24"><path d="M18 8h1a4 4 0 010 8h-1M2 8h16v9a4 4 0 01-4 4H6a4 4 0 01-4-4V8z"/></svg></div>
        <h4 style="font-size: 16px; margin-bottom: 4px;">Bar & Beverage</h4>
        <p style="font-size: 12.5px;">Cold beverages, mocktails, juices and sodas.</p>
        <span class="badge ready" style="margin-top: 10px;">02 Drinks Ready</span>
      </div>

      <div class="card" style="padding: 20px; text-align: center;">
        <div class="ic" style="margin: 0 auto 12px;"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg></div>
        <h4 style="font-size: 16px; margin-bottom: 4px;">Dessert Counter</h4>
        <p style="font-size: 12.5px;">Sweets, ice creams, cakes and desserts.</p>
        <span class="badge new" style="margin-top: 10px;">01 Ticket Pending</span>
      </div>
    </div>
  </div>
</section>

<!-- ================= ITEM-LEVEL CLARITY & SPECIAL INSTRUCTIONS ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">ITEM-LEVEL KITCHEN NOTES</div>
      <h2>Every Item. <span class="sf">Clearly Listed.</span></h2>
      <p>Large readable typography, clear item quantities, and prominent custom instructions ensure zero confusion for line cooks.</p>
    </div>

    <!-- Ticket Detail Card -->
    <div class="card" style="max-width: 600px; margin: 0 auto; padding: 32px; box-shadow: var(--shadow-lg);">
      <div style="display: flex; justify-content: space-between; align-items: center; padding-bottom: 16px; border-bottom: 2px dashed var(--line); margin-bottom: 20px;">
        <div>
          <div style="font-family: 'Outfit', sans-serif; font-weight: 500; font-size: 24px; color: var(--ink);">KOT #1052</div>
          <div style="font-size: 13px; color: var(--mute);">Main Kitchen · Table T12 · 4 Guests</div>
        </div>
        <span class="badge preparing">Cooking (08 min)</span>
      </div>

      <div style="display: flex; flex-direction: column; gap: 14px; margin-bottom: 24px;">
        <div style="display: flex; justify-content: space-between; align-items: center; background: var(--bg2); padding: 12px 16px; border-radius: 10px;">
          <div>
            <strong style="font-size: 16px; color: var(--ink);">Chicken Biryani (Large Dum)</strong>
            <div style="font-size: 12px; color: var(--br); font-weight: 700; margin-top: 2px;">+ Extra Egg (2)</div>
          </div>
          <span style="font-family: 'Outfit', sans-serif; font-weight: 500; font-size: 20px; color: var(--br);">× 2</span>
        </div>

        <div style="display: flex; justify-content: space-between; align-items: center; background: var(--bg2); padding: 12px 16px; border-radius: 10px;">
          <div>
            <strong style="font-size: 16px; color: var(--ink);">Paneer Butter Masala</strong>
            <div style="font-size: 12px; color: #dc2626; font-weight: 500; margin-top: 2px;">⚠️ Instruction: "No Onion, Less Spicy"</div>
          </div>
          <span style="font-family: 'Outfit', sans-serif; font-weight: 500; font-size: 20px; color: var(--br);">× 1</span>
        </div>

        <div style="display: flex; justify-content: space-between; align-items: center; background: var(--bg2); padding: 12px 16px; border-radius: 10px;">
          <div>
            <strong style="font-size: 16px; color: var(--ink);">Butter Garlic Naan</strong>
          </div>
          <span style="font-family: 'Outfit', sans-serif; font-weight: 500; font-size: 20px; color: var(--br);">× 4</span>
        </div>
      </div>

      <div style="display: flex; gap: 12px;">
        <button class="btn p" style="flex: 1; padding: 12px; font-size: 14px;">Mark KOT Ready ✓</button>
        <button class="btn o" style="padding: 12px; font-size: 14px;">Reprint KOT</button>
      </div>
    </div>
  </div>
</section>

<!-- ================= KITCHEN STATUS & PEAK HOUR CONTROL ================= -->
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">HIGH VOLUME PREPARATION</div>
      <h2>Stay Organized When the <span class="sf">Kitchen Gets Busy.</span></h2>
      <p>Keep chefs focused during peak dinner rushes with live ticket status counters and preparation timers.</p>
    </div>

    <!-- Rush Status Badges -->
    <div class="g4" style="margin-bottom: 36px;">
      <div class="card" style="padding: 20px; border-top: 4px solid var(--amber); text-align: center;">
        <span class="badge new" style="margin-bottom: 8px;">NEW KOTs</span>
        <div style="font-size: 32px; font-weight: 500; color: var(--amber);">05</div>
        <p style="font-size: 12px; color: var(--mute); margin-top: 4px;">Awaiting Chef Acceptance</p>
      </div>

      <div class="card" style="padding: 20px; border-top: 4px solid var(--blue); text-align: center;">
        <span class="badge preparing" style="margin-bottom: 8px;">PREPARING</span>
        <div style="font-size: 32px; font-weight: 500; color: var(--blue);">08</div>
        <p style="font-size: 12px; color: var(--mute); margin-top: 4px;">Currently Cooking</p>
      </div>

      <div class="card" style="padding: 20px; border-top: 4px solid var(--green); text-align: center;">
        <span class="badge ready" style="margin-bottom: 8px;">READY AT PASS</span>
        <div style="font-size: 32px; font-weight: 500; color: var(--green);">05</div>
        <p style="font-size: 12px; color: var(--mute); margin-top: 4px;">Awaiting Server Pickup</p>
      </div>

      <div class="card" style="padding: 20px; border-top: 4px solid var(--br); text-align: center;">
        <span class="badge completed" style="margin-bottom: 8px;">COMPLETED</span>
        <div style="font-size: 32px; font-weight: 500; color: var(--br);">173</div>
        <p style="font-size: 12px; color: var(--mute); margin-top: 4px;">Dispatched Today</p>
      </div>
    </div>
  </div>
</section>

<!-- ================= RESTAURANT SERVICE JOURNEY ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">12-STAGE RESTAURANT LIFECYCLE</div>
      <h2>From Guest Order to <span class="sf">Kitchen Completion.</span></h2>
      <p>KOT Management sits right at the heart of your restaurant operation, bridging servers with line cooks.</p>
    </div>

    <!-- 12 Step Flow Grid -->
    <div style="display: grid; grid-template-columns: repeat(6, 1fr); gap: 12px; margin-bottom: 24px;">
      <div style="background: #fff; border: 1px solid var(--line); border-radius: 12px; padding: 12px; text-align: center;">
        <div style="font-weight: 500; color: var(--mute); font-size: 10px;">STEP 01</div>
        <div style="font-weight: 500; font-size: 12.5px; margin-top: 2px;">Guest Arrives</div>
      </div>
      <div style="background: #fff; border: 1px solid var(--line); border-radius: 12px; padding: 12px; text-align: center;">
        <div style="font-weight: 500; color: var(--mute); font-size: 10px;">STEP 02</div>
        <div style="font-weight: 500; font-size: 12.5px; margin-top: 2px;">Table Seated</div>
      </div>
      <div style="background: #fff; border: 1px solid var(--line); border-radius: 12px; padding: 12px; text-align: center;">
        <div style="font-weight: 500; color: var(--mute); font-size: 10px;">STEP 03</div>
        <div style="font-weight: 500; font-size: 12.5px; margin-top: 2px;">Menu Choice</div>
      </div>
      <div style="background: #fff; border: 1px solid var(--line); border-radius: 12px; padding: 12px; text-align: center;">
        <div style="font-weight: 500; color: var(--mute); font-size: 10px;">STEP 04</div>
        <div style="font-weight: 500; font-size: 12.5px; margin-top: 2px;">Order Placed</div>
      </div>
      <div style="background: var(--br-light); border: 1.5px solid var(--br); border-radius: 12px; padding: 12px; text-align: center;">
        <div style="font-weight: 500; color: var(--br); font-size: 10px;">STEP 05</div>
        <div style="font-weight: 500; font-size: 12.5px; margin-top: 2px; color: var(--br);">KOT Created</div>
      </div>
      <div style="background: var(--br-light); border: 1.5px solid var(--br); border-radius: 12px; padding: 12px; text-align: center;">
        <div style="font-weight: 500; color: var(--br); font-size: 10px;">STEP 06</div>
        <div style="font-weight: 500; font-size: 12.5px; margin-top: 2px; color: var(--br);">Kitchen Receives</div>
      </div>
    </div>

    <div style="display: grid; grid-template-columns: repeat(6, 1fr); gap: 12px;">
      <div style="background: #fff; border: 1px solid var(--line); border-radius: 12px; padding: 12px; text-align: center;">
        <div style="font-weight: 500; color: var(--blue); font-size: 10px;">STEP 07</div>
        <div style="font-weight: 500; font-size: 12.5px; margin-top: 2px;">Food Prepared</div>
      </div>
      <div style="background: #fff; border: 1px solid var(--line); border-radius: 12px; padding: 12px; text-align: center;">
        <div style="font-weight: 500; color: var(--green); font-size: 10px;">STEP 08</div>
        <div style="font-weight: 500; font-size: 12.5px; margin-top: 2px;">Order Ready</div>
      </div>
      <div style="background: #fff; border: 1px solid var(--line); border-radius: 12px; padding: 12px; text-align: center;">
        <div style="font-weight: 500; color: var(--mute); font-size: 10px;">STEP 09</div>
        <div style="font-weight: 500; font-size: 12.5px; margin-top: 2px;">Food Served</div>
      </div>
      <div style="background: #fff; border: 1px solid var(--line); border-radius: 12px; padding: 12px; text-align: center;">
        <div style="font-weight: 500; color: var(--mute); font-size: 10px;">STEP 10</div>
        <div style="font-weight: 500; font-size: 12.5px; margin-top: 2px;">Bill Generated</div>
      </div>
      <div style="background: #fff; border: 1px solid var(--line); border-radius: 12px; padding: 12px; text-align: center;">
        <div style="font-weight: 500; color: var(--mute); font-size: 10px;">STEP 11</div>
        <div style="font-weight: 500; font-size: 12.5px; margin-top: 2px;">Payment Settled</div>
      </div>
      <div style="background: var(--br); color: #fff; border-radius: 12px; padding: 12px; text-align: center;">
        <div style="font-weight: 500; color: var(--br-gold); font-size: 10px;">STEP 12</div>
        <div style="font-weight: 500; font-size: 12.5px; margin-top: 2px; color: #fff;">Table Reset</div>
      </div>
    </div>
  </div>
</section>

<!-- ================= RESTAURANT INDUSTRIES ================= -->
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">MULTI-FORMAT FLEXIBILITY</div>
      <h2>Built for Different <span class="sf">Kitchen Environments.</span></h2>
      <p>Whether you manage a multi-station fine dining kitchen, a QSR pass, a pizzeria oven counter, or a cloud kitchen.</p>
    </div>

    <div class="ind-grid">
      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1556910103-1c02745aae4d?auto=format&fit=crop&w=600&q=80');">
          <div class="ind-overlay"></div>
          <div class="ind-icon"><svg viewBox="0 0 24 24"><path d="M6 13.87A4 4 0 017.41 6a5.11 5.11 0 019.18 0A4 4 0 0118 13.87V21H6v-7.13z"/></svg></div>
        </div>
        <div class="ind-content">
          <h4>Fine Dining Kitchens</h4>
          <p>Multi-course ticket timing and station routing between tandoor, pantry and main stove.</p>
        </div>
      </div>

      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1555396273-367ea4eb4db5?auto=format&fit=crop&w=600&q=80');">
          <div class="ind-overlay"></div>
          <div class="ind-icon"><svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/></svg></div>
        </div>
        <div class="ind-content">
          <h4>QSR & Fast Food</h4>
          <p>Instant digital ticket displays for high-volume counter preparation.</p>
        </div>
      </div>

      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1526367790999-0150786686a2?auto=format&fit=crop&w=600&q=80');">
          <div class="ind-overlay"></div>
          <div class="ind-icon"><svg viewBox="0 0 24 24"><rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg></div>
        </div>
        <div class="ind-content">
          <h4>Cloud Kitchens</h4>
          <p>Centralized ticket display routing orders from online channels to line cooks.</p>
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
      <h2>KOT Is the Bridge Between <span class="sf">Orders and the Kitchen.</span></h2>
      <p>KOT Management connects your floor servers, dining tables, kitchen displays, and billing counter.</p>
    </div>

    <div class="card" style="padding: 40px; text-align: center; background: linear-gradient(180deg, #ffffff 0%, #faf8f5 100%);">
      <div style="display: inline-block; padding: 14px 28px; background: var(--br); color: #fff; border-radius: 16px; font-weight: 500; font-size: 20px; font-family: 'Outfit', sans-serif; box-shadow: 0 8px 24px rgba(135,96,57,0.3); margin-bottom: 32px;">
        CENTRAL KOT ENGINE
      </div>

      <div class="g4" style="text-align: left;">
        <div style="background: #fff; border: 1px solid var(--line); border-radius: 14px; padding: 16px;">
          <h4 style="font-size: 15px; margin-bottom: 4px; color: var(--br);">Order Management</h4>
          <p style="font-size: 12.5px;">Confirmed floor orders trigger immediate KOT tickets.</p>
        </div>

        <div style="background: #fff; border: 1px solid var(--line); border-radius: 14px; padding: 16px;">
          <h4 style="font-size: 15px; margin-bottom: 4px; color: var(--br);">Table Management</h4>
          <p style="font-size: 12.5px;">Tickets show table number & floor zone for server delivery.</p>
        </div>

        <div style="background: #fff; border: 1px solid var(--line); border-radius: 14px; padding: 16px;">
          <h4 style="font-size: 15px; margin-bottom: 4px; color: var(--br);">POS Management</h4>
          <p style="font-size: 12.5px;">Kitchen-prepared items sync directly to guest bill tabs.</p>
        </div>

        <div style="background: #fff; border: 1px solid var(--line); border-radius: 14px; padding: 16px;">
          <h4 style="font-size: 15px; margin-bottom: 4px; color: var(--br);">Reports & Analytics</h4>
          <p style="font-size: 12.5px;">Track average dish preparation times & peak kitchen throughput.</p>
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
      <p>Everything you need to know about Geni Menu KOT Management.</p>
    </div>

    <div class="faq-list">
      <div class="faq-item open">
        <div class="faq-q" onclick="faq(this)">
          1. What is KOT Management in Geni Menu?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          KOT (Kitchen Order Ticket) Management in Geni Menu connects restaurant orders to your kitchen staff, generating digital ticket displays or printed slips that show items, quantities, table numbers, and cooking instructions.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="faq(this)">
          2. How does an order become a KOT?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          The moment a server takes a table order or a cashier places a counter order, Geni Menu automatically creates a KOT ticket and routes it to the kitchen display or printer.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="faq(this)">
          3. Can KOTs display table numbers and special instructions?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Every KOT clearly displays the table number (or takeaway order type), item quantities, portion variations, and custom chef instructions (e.g. "Less spicy", "No onion").
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="faq(this)">
          4. Can kitchen staff update KOT status from digital screens?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Line cooks and head chefs can tap to update status from New → Preparing → Ready, updating waiters instantly.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="faq(this)">
          5. Can KOTs be routed to multiple kitchen stations?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. You can route specific menu items to separate kitchen stations such as Main Curry, Tandoor, Beverage Bar, or Dessert Counter.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="faq(this)">
          6. Is KOT Management suitable for small restaurants and cafés?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Whether you operate a single-counter café or a multi-station fine dining establishment, KOT Management streamlines your kitchen communication.
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= FINAL CTA ================= -->
<section style="padding: 96px 0; background: linear-gradient(135deg, #FAF4ED 0%, #EFE4D6 50%, #FAF4ED 100%); color: #21160F; border-top: 1px solid rgba(135, 96, 57, 0.16);">
  <div class="w" style="text-align: center; max-width: 800px;">
    <div class="eb" style="background: rgba(135,96,57,0.08); border-color: rgba(135,96,57,0.2); color: #876039;">TRANSFORM YOUR KITCHEN PASS</div>
    <h2 style="color: #21160F; font-size: clamp(32px, 4vw, 48px); margin-bottom: 20px;">
      Bring Every Order Into a <span style="color: #876039; font-family: 'Playfair Display', Georgia, serif; font-style: italic;">Clear Kitchen Workflow.</span>
    </h2>
    <p style="color: #6E6157; font-size: 18px; margin-bottom: 36px; line-height: 1.6;">
      Give your kitchen team the visibility they need to move orders from ticket to preparation to ready with Geni Menu.
    </p>
    <div style="display: flex; align-items: center; justify-content: center; gap: 16px; flex-wrap: wrap;">
      <a href="{{ route('restaurant_signup') }}" class="btn p" style="padding: 16px 36px; font-size: 16px; background: #876039; color: #fff;">Get Started →</a>
      <a href="{{ route('contact.us') }}" class="btn o" style="padding: 16px 32px; font-size: 16px; background: transparent; color: #876039; border: 1.5px solid #876039;">Book a Demo</a>
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
