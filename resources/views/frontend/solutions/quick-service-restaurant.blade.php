@extends('layouts.frontend-master')

@section('content')

{{-- Google Fonts --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@500;600;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Playfair+Display:ital,wght@1,600;1,700&display=swap" rel="stylesheet">

<style>
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
.hd { max-width: 760px; margin: 0 auto 52px; text-align: center; }
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
.card:hover { border-color: rgba(135,96,57,0.3); box-shadow: var(--shadow-md); transform: translateY(-3px); }

.ic { width: 46px; height: 46px; border-radius: 13px; background: var(--bg2); color: var(--br); display: grid; place-items: center; flex: none; border: 1px solid var(--line); transition: .3s ease; }
.ic svg { width: 22px; height: 22px; fill: none; stroke: currentColor; stroke-width: 1.8; stroke-linecap: round; stroke-linejoin: round; }
.card:hover .ic { background: var(--br); color: #fff; border-color: var(--br); }

.win { background: #fff; color: var(--ink); border: 1px solid var(--line); border-radius: 20px; overflow: hidden; box-shadow: var(--shadow-md); font-size: 13px; }

/* Dynamic Flow Pipeline */
.flow-step { flex: 1; min-width: 90px; text-align: center; position: relative; padding: 12px 6px; }
.flow-step .num { width: 28px; height: 28px; border-radius: 50%; background: var(--br-light); color: var(--br); font-weight: 800; font-size: 12px; display: grid; place-items: center; margin: 0 auto 8px; border: 1px solid rgba(135,96,57,0.2); }
.flow-step .lbl { font-size: 11px; font-weight: 800; text-transform: uppercase; color: var(--ink); letter-spacing: 0.04em; }

/* FAQ Accordion */
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

@media (max-width: 640px) {
  .btn { width: 100%; }
}
</style>

<!-- ================= BREADCRUMB ================= -->
<div class="bc">
  <div class="w">
    <a href="{{ route('home') }}">Home</a>
    <span>/</span>
    <span>Solutions</span>
    <span>/</span>
    <span class="cur">Quick Service Restaurant (QSR) Solution</span>
  </div>
</div>

<!-- ================= HERO SECTION ================= -->
<section style="padding: 60px 0 80px; background: linear-gradient(180deg, var(--bg2) 0%, #ffffff 100%); border-bottom: 1px solid var(--line);">
  <div class="w">
    <div class="g2" style="gap: 50px; align-items: center;">
      <!-- Hero Left Text -->
      <div>
        <div class="eb">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
          QUICK SERVICE RESTAURANT SOLUTION
        </div>
        <h1 style="margin-bottom: 20px;">
          Fast Service. Smooth Operations. <br><span class="sf">Happier Customers.</span>
        </h1>
        <p style="font-size: 19px; margin-bottom: 32px; color: var(--mute);">
          Manage orders, tables, menus, kitchen operations, billing and payments from one connected platform built for fast-paced restaurants and QSR outlets.
        </p>
        <div style="display: flex; gap: 16px; align-items: center; flex-wrap: wrap;">
          <a href="{{ route('restaurant_signup') }}" class="btn p" style="padding: 16px 36px; font-size: 16px;">Get Started →</a>
          <a href="{{ route('contact.us') }}" class="btn o" style="padding: 16px 32px; font-size: 16px;">Book a Demo →</a>
        </div>

        <div style="margin-top: 36px; display: flex; align-items: center; gap: 24px; font-size: 13.5px; color: var(--mute); font-weight: 600; flex-wrap: wrap;">
          <div style="display: flex; align-items: center; gap: 8px;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--green)" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
            Instant Counter Billing
          </div>
          <div style="display: flex; align-items: center; gap: 8px;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--green)" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
            Queue Busting Tokens
          </div>
          <div style="display: flex; align-items: center; gap: 8px;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--green)" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
            Live Kitchen Display
          </div>
        </div>
      </div>

      <!-- Hero Right Visual Overlay -->
      <div style="position: relative;">
        <div style="border-radius: 24px; overflow: hidden; box-shadow: var(--shadow-lg); border: 1px solid var(--line); position: relative; background: #241a14;">
          <img src="https://images.unsplash.com/photo-1561758033-d89a9ad46330?auto=format&fit=crop&w=1200&q=80" alt="QSR Counter Operations" style="width: 100%; height: 450px; object-fit: cover; opacity: 0.88; display: block;">
          
          <!-- QSR Live Counter Overlay -->
          <div style="position: absolute; bottom: 20px; left: 20px; right: 20px; background: rgba(255, 255, 255, 0.96); backdrop-filter: blur(12px); border-radius: 16px; padding: 18px; border: 1px solid var(--line); box-shadow: var(--shadow-md);">
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px; border-bottom: 1px solid var(--line); padding-bottom: 10px;">
              <div style="font-weight: 800; font-size: 14px; color: var(--ink); display: flex; align-items: center; gap: 8px;">
                <span style="width: 10px; height: 10px; border-radius: 50%; background: var(--green); display: inline-block;"></span>
                QSR FAST-SERVICE MONITOR
              </div>
              <span style="font-size: 12px; font-weight: 700; color: var(--br);">Order #1048 · Token #48</span>
            </div>
            
            <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 10px; text-align: center;">
              <div style="background: var(--bg2); padding: 8px; border-radius: 10px; border: 1px solid var(--line);">
                <div style="font-size: 11px; font-weight: 700; color: var(--mute);">COUNTER SPEED</div>
                <div style="font-size: 15px; font-weight: 800; color: var(--green-text);">22 sec / bill</div>
              </div>
              <div style="background: var(--bg2); padding: 8px; border-radius: 10px; border: 1px solid var(--line);">
                <div style="font-size: 11px; font-weight: 700; color: var(--mute);">ACTIVE KOT</div>
                <div style="font-size: 15px; font-weight: 800; color: var(--amber);">08 Preparing</div>
              </div>
              <div style="background: var(--bg2); padding: 8px; border-radius: 10px; border: 1px solid var(--line);">
                <div style="font-size: 11px; font-weight: 700; color: var(--mute);">READY TO PICKUP</div>
                <div style="font-size: 15px; font-weight: 800; color: var(--br);">06 Tokens</div>
              </div>
              <div style="background: var(--bg2); padding: 8px; border-radius: 10px; border: 1px solid var(--line);">
                <div style="font-size: 11px; font-weight: 700; color: var(--mute);">TODAY ORDERS</div>
                <div style="font-size: 15px; font-weight: 800; color: var(--ink);">246 Orders</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 1: BUILT FOR QUICK SERVICE RESTAURANTS ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">HIGH-VOLUME ECOSYSTEM</div>
      <h2>Everything Your Fast-Paced Restaurant Needs.</h2>
      <p>Keep your restaurant moving with tools designed to handle high order volumes and faster customer service.</p>
    </div>

    <div class="g3">
      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 16px;">
          <svg viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
        </div>
        <h3 style="font-size: 18px; margin-bottom: 8px;">Digital Menu Management</h3>
        <p style="font-size: 14px;">Keep your menu organized, fast to browse and easy for customers or cashiers to explore.</p>
      </div>

      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 16px;">
          <svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/></svg>
        </div>
        <h3 style="font-size: 18px; margin-bottom: 8px;">Order Management</h3>
        <p style="font-size: 14px;">Keep every counter order visible from placement to preparation and final completion.</p>
      </div>

      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 16px;">
          <svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><line x1="9" y1="3" x2="9" y2="21"/><line x1="15" y1="3" x2="15" y2="21"/></svg>
        </div>
        <h3 style="font-size: 18px; margin-bottom: 8px;">Table Management</h3>
        <p style="font-size: 14px;">Know which dine-in tables are available, occupied or being cleaned for fast seating turnover.</p>
      </div>

      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 16px;">
          <svg viewBox="0 0 24 24"><path d="M6 13.87A4 4 0 017.41 6a5.11 5.11 0 019.18 0A4 4 0 0118 13.87V21H6v-7.13z"/></svg>
        </div>
        <h3 style="font-size: 18px; margin-bottom: 8px;">KOT Management</h3>
        <p style="font-size: 14px;">Keep kitchen order tickets clear, instant and organized for high-speed food prep.</p>
      </div>

      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 16px;">
          <svg viewBox="0 0 24 24"><rect x="2" y="4" width="20" height="16" rx="2"/><line x1="6" y1="8" x2="18" y2="8"/><line x1="6" y1="12" x2="14" y2="12"/></svg>
        </div>
        <h3 style="font-size: 18px; margin-bottom: 8px;">POS & Fast Billing</h3>
        <p style="font-size: 14px;">Process orders, print token numbers and complete payments quickly through one connected POS.</p>
      </div>

      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 16px;">
          <svg viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"/></svg>
        </div>
        <h3 style="font-size: 18px; margin-bottom: 8px;">Inventory Management</h3>
        <p style="font-size: 14px;">Stay aware of buns, patties, fries, sauces, beverages and important stock levels.</p>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 2: DIGITAL MENU ================= -->
<section style="background: var(--bg);">
  <div class="w">
    <div class="g2" style="gap: 50px; align-items: center;">
      <div>
        <div class="eb">FAST-ORDER MENU</div>
        <h2 style="margin-bottom: 18px;">Your Menu. Built for Faster Ordering.</h2>
        <p style="margin-bottom: 24px;">
          Help customers quickly find what they want with a clear, organized digital menu designed for fast touch browsing and counter selection.
        </p>

        <div style="display: flex; gap: 10px; flex-wrap: wrap; margin-bottom: 24px;">
          <span style="background: var(--bg2); padding: 8px 16px; border-radius: 99px; border: 1px solid var(--line); font-size: 13px; font-weight: 700;">🍔 Burgers & Combos</span>
          <span style="background: var(--bg2); padding: 8px 16px; border-radius: 99px; border: 1px solid var(--line); font-size: 13px; font-weight: 700;">🍕 Pizza & Garlic Bread</span>
          <span style="background: var(--bg2); padding: 8px 16px; border-radius: 99px; border: 1px solid var(--line); font-size: 13px; font-weight: 700;">🍗 Fried Chicken</span>
          <span style="background: var(--bg2); padding: 8px 16px; border-radius: 99px; border: 1px solid var(--line); font-size: 13px; font-weight: 700;">🍟 Fries & Shakes</span>
        </div>

        <a href="{{ route('features.menu-management') }}" class="btn p">Explore Menu Management →</a>
      </div>

      <!-- QSR Menu UI Mockup -->
      <div class="win" style="padding: 24px; max-width: 380px; margin: 0 auto;">
        <div style="background: var(--br); color: #fff; padding: 14px; border-radius: 10px; text-align: center; margin-bottom: 14px;">
          <strong style="font-size: 15px;">QSR EXPRESS MENU</strong>
        </div>

        <div style="display: flex; flex-direction: column; gap: 10px;">
          <div style="background: var(--bg2); padding: 12px; border-radius: 10px; border: 1px solid var(--line); display: flex; justify-content: space-between; align-items: center;">
            <div>
              <strong style="color: var(--ink); font-size: 14px; display: block;">Crispy Chicken Burger Combo</strong>
              <span style="font-size: 12px; color: var(--mute);">Burger + Fries + Cold Drink</span>
            </div>
            <span style="font-weight: 800; color: var(--br); font-size: 15px;">₹240</span>
          </div>

          <div style="background: var(--bg2); padding: 12px; border-radius: 10px; border: 1px solid var(--line); display: flex; justify-content: space-between; align-items: center;">
            <div>
              <strong style="color: var(--ink); font-size: 14px; display: block;">Peri Peri Fries (Large)</strong>
              <span style="font-size: 12px; color: var(--mute);">Crispy Seasoned Potato Fries</span>
            </div>
            <span style="font-weight: 800; color: var(--br); font-size: 15px;">₹120</span>
          </div>

          <div style="background: var(--bg2); padding: 12px; border-radius: 10px; border: 1px solid var(--line); display: flex; justify-content: space-between; align-items: center;">
            <div>
              <strong style="color: var(--ink); font-size: 14px; display: block;">Chocolate Milkshake</strong>
              <span style="font-size: 12px; color: var(--mute);">Thick Cold Beverage</span>
            </div>
            <span style="font-weight: 800; color: var(--br); font-size: 15px;">₹140</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 3: ORDER MANAGEMENT ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="g2" style="gap: 50px; align-items: center;">
      <!-- Order Board Visual -->
      <div class="win" style="padding: 24px;">
        <div style="display: flex; justify-content: space-between; border-bottom: 1px solid var(--line); padding-bottom: 10px; margin-bottom: 14px;">
          <div>
            <strong style="font-size: 16px; color: var(--ink);">ORDER #1048</strong>
            <span style="display: block; font-size: 12px; color: var(--mute);">Dine-in · Table T12</span>
          </div>
          <span style="background: var(--amber-bg); color: var(--amber-text); font-size: 11px; font-weight: 800; padding: 4px 10px; border-radius: 99px; height: fit-content;">PREPARING</span>
        </div>

        <div style="display: flex; flex-direction: column; gap: 6px; font-size: 13.5px; margin-bottom: 14px;">
          <div style="display: flex; justify-content: space-between;"><span>Burger Combo × 2</span><strong>₹480</strong></div>
          <div style="display: flex; justify-content: space-between;"><span>French Fries × 2</span><strong>₹240</strong></div>
          <div style="display: flex; justify-content: space-between;"><span>Cold Coffee × 2</span><strong>₹240</strong></div>
        </div>

        <div style="border-top: 1px solid var(--line); padding-top: 10px; display: flex; justify-content: space-between; font-size: 15px; font-weight: 800; color: var(--ink);">
          <span>Order Value:</span>
          <span style="color: var(--br);">₹960</span>
        </div>
      </div>

      <div>
        <div class="eb">ORDER PIPELINE</div>
        <h2 style="margin-bottom: 18px;">Faster Ordering. Fewer Delays.</h2>
        <p style="margin-bottom: 24px;">
          Keep every order organized from placement to counter pickup or table service without manual errors during busy hours.
        </p>
        <a href="{{ route('features.order-management') }}" class="btn p">Explore Order Management →</a>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 5: KITCHEN OPERATIONS ================= -->
<section style="background: var(--bg);">
  <div class="w">
    <div class="hd">
      <div class="eb">KDS & KOT WORKFLOW</div>
      <h2>From Order to Kitchen Without the Confusion.</h2>
      <p>Connect front-of-house orders with kitchen operations through a clear KOT display workflow.</p>
    </div>

    <div class="g3">
      <div class="win" style="padding: 20px; border-top: 4px solid var(--blue);">
        <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
          <strong style="font-size: 15px;">KOT #1048</strong>
          <span style="background: #dbeafe; color: #1e40af; font-size: 11px; font-weight: 800; padding: 2px 8px; border-radius: 99px;">NEW ORDER</span>
        </div>
        <div style="font-size: 13px; color: var(--ink); font-weight: 700; margin-bottom: 6px;">Table T12 · Counter 1</div>
        <p style="font-size: 12.5px; color: var(--mute);">Burger × 2 · Fries × 2 (No Onion)</p>
      </div>

      <div class="win" style="padding: 20px; border-top: 4px solid var(--amber);">
        <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
          <strong style="font-size: 15px;">KOT #1047</strong>
          <span style="background: var(--amber-bg); color: var(--amber-text); font-size: 11px; font-weight: 800; padding: 2px 8px; border-radius: 99px;">PREPARING</span>
        </div>
        <div style="font-size: 13px; color: var(--ink); font-weight: 700; margin-bottom: 6px;">Takeaway · Token #47</div>
        <p style="font-size: 12.5px; color: var(--mute);">Fried Chicken Bucket × 1 · Dip × 2</p>
      </div>

      <div class="win" style="padding: 20px; border-top: 4px solid var(--green);">
        <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
          <strong style="font-size: 15px;">KOT #1046</strong>
          <span style="background: var(--green-bg); color: var(--green-text); font-size: 11px; font-weight: 800; padding: 2px 8px; border-radius: 99px;">READY</span>
        </div>
        <div style="font-size: 13px; color: var(--ink); font-weight: 700; margin-bottom: 6px;">Pickup Counter · Token #46</div>
        <p style="font-size: 12.5px; color: var(--mute);">Pizza Margherita × 1 · Cold Coffee × 2</p>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 7: ORDER TYPES ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">MULTI-CHANNEL SERVICE</div>
      <h2>One Platform. Multiple Ways to Serve.</h2>
      <p>Manage different customer order types from one connected system.</p>
    </div>

    <div class="g4">
      <div class="card" style="padding: 24px; text-align: center;">
        <div style="font-size: 32px; margin-bottom: 12px;">🍽️</div>
        <h3 style="font-size: 18px; margin-bottom: 6px;">DINE-IN</h3>
        <p style="font-size: 13.5px;">Table-based ordering, QR scan & table-side service.</p>
      </div>

      <div class="card" style="padding: 24px; text-align: center;">
        <div style="font-size: 32px; margin-bottom: 12px;">🛍️</div>
        <h3 style="font-size: 18px; margin-bottom: 6px;">TAKEAWAY</h3>
        <p style="font-size: 13.5px;">Quick counter ordering, token display & fast collection.</p>
      </div>

      <div class="card" style="padding: 24px; text-align: center;">
        <div style="font-size: 32px; margin-bottom: 12px;">📦</div>
        <h3 style="font-size: 18px; margin-bottom: 6px;">PICKUP</h3>
        <p style="font-size: 13.5px;">Organized order packing and customer counter retrieval.</p>
      </div>

      <div class="card" style="padding: 24px; text-align: center;">
        <div style="font-size: 32px; margin-bottom: 12px;">🛵</div>
        <h3 style="font-size: 18px; margin-bottom: 6px;">DELIVERY</h3>
        <p style="font-size: 13.5px;">Manage delivery order packing & dispatch from the same POS.</p>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 8: FAST BILLING ================= -->
<section style="background: var(--bg);">
  <div class="w">
    <div class="g2" style="gap: 50px; align-items: center;">
      <!-- POS Receipt Simulation -->
      <div class="win" style="padding: 24px;">
        <div style="text-align: center; border-bottom: 1px dashed var(--line); padding-bottom: 12px; margin-bottom: 14px;">
          <strong style="font-size: 16px; color: var(--ink); display: block;">QSR FAST POS CHECKOUT</strong>
          <span style="font-size: 12px; color: var(--mute);">Token #48 · Cashier Counter 1</span>
        </div>

        <div style="display: flex; flex-direction: column; gap: 6px; font-size: 13px; margin-bottom: 14px;">
          <div style="display: flex; justify-content: space-between;"><span>Burger Combo × 2</span><span>₹480.00</span></div>
          <div style="display: flex; justify-content: space-between;"><span>French Fries × 1</span><span>₹120.00</span></div>
          <div style="display: flex; justify-content: space-between;"><span>Cold Coffee × 2</span><span>₹240.00</span></div>
        </div>

        <div style="border-top: 1px solid var(--line); padding-top: 10px; font-size: 16px; font-weight: 800; color: var(--ink); margin-bottom: 14px; display: flex; justify-content: space-between;">
          <span>Subtotal:</span>
          <span style="color: var(--br);">₹840.00</span>
        </div>

        <div style="display: flex; gap: 8px;">
          <button style="flex:1; background: var(--green-bg); color: var(--green-text); border: 1px solid var(--green); padding: 8px; border-radius: 6px; font-weight: 800; font-size: 12px;">UPI / QR</button>
          <button style="flex:1; background: var(--bg2); color: var(--ink); border: 1px solid var(--line); padding: 8px; border-radius: 6px; font-weight: 700; font-size: 12px;">CASH</button>
          <button style="flex:1; background: var(--bg2); color: var(--ink); border: 1px solid var(--line); padding: 8px; border-radius: 6px; font-weight: 700; font-size: 12px;">CARD</button>
        </div>
      </div>

      <div>
        <div class="eb">FAST CHECKOUT</div>
        <h2 style="margin-bottom: 18px;">Make Checkout Simple.</h2>
        <p style="margin-bottom: 24px;">
          Create bills quickly and move customers through counter checkout with zero friction using 3-click POS billing.
        </p>
        <a href="{{ route('features.pos-management') }}" class="btn p">Explore POS Management →</a>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 11: CONNECTED QSR WORKFLOW ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">END-TO-END WORKFLOW</div>
      <h2>Everything Works Together.</h2>
      <p>Connect every step of your quick service operation through one restaurant management platform.</p>
    </div>

    <div style="display: flex; gap: 8px; align-items: center; justify-content: space-between; overflow-x: auto; padding-bottom: 10px;">
      <div class="flow-step"><div class="num">1</div><div class="lbl">Customer</div></div>
      <div style="color: var(--line); font-weight: 700;">→</div>
      <div class="flow-step"><div class="num">2</div><div class="lbl">Menu</div></div>
      <div style="color: var(--line); font-weight: 700;">→</div>
      <div class="flow-step"><div class="num">3</div><div class="lbl">Order</div></div>
      <div style="color: var(--line); font-weight: 700;">→</div>
      <div class="flow-step"><div class="num">4</div><div class="lbl">KOT</div></div>
      <div style="color: var(--line); font-weight: 700;">→</div>
      <div class="flow-step"><div class="num">5</div><div class="lbl">Kitchen</div></div>
      <div style="color: var(--line); font-weight: 700;">→</div>
      <div class="flow-step"><div class="num">6</div><div class="lbl">Ready</div></div>
      <div style="color: var(--line); font-weight: 700;">→</div>
      <div class="flow-step"><div class="num">7</div><div class="lbl">Serve / Pickup</div></div>
      <div style="color: var(--line); font-weight: 700;">→</div>
      <div class="flow-step"><div class="num">8</div><div class="lbl" style="color: var(--green-text);">Payment</div></div>
    </div>
  </div>
</section>

<!-- ================= SECTION 17: FAQ ================= -->
<section style="background: var(--bg);">
  <div class="w">
    <div class="hd">
      <div class="eb">FREQUENTLY ASKED QUESTIONS</div>
      <h2>Frequently Asked Questions</h2>
      <p>Everything you need to know about Geni Menu for Quick Service Restaurants.</p>
    </div>

    <div class="faq-list">
      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          1. Is Geni Menu suitable for Quick Service Restaurants (QSR)?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Geni Menu is built for high-speed QSR operations, burger joints, pizza outlets, fried chicken shops, and fast casual counters.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          2. Can I manage dine-in, takeaway and pickup orders?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. You can manage dine-in tables, takeaway token numbers, and pickup orders from a single POS system.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          3. How does fast counter billing work?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Cashiers can tap items, apply combo discounts, print GST bills and collect UPI or Cash payments in under 20 seconds.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          4. Can orders be sent directly to the kitchen?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Counter orders generate instant Kitchen Order Tickets (KOT) on thermal printers or kitchen screens.
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= FINAL CTA ================= -->
<section style="background: linear-gradient(135deg, #241a14 0%, #3a2b21 100%); color: #fff; text-align: center; padding: 80px 0;">
  <div class="w" style="max-width: 760px;">
    <h2 style="color: #fff; font-size: clamp(32px, 4vw, 48px); margin-bottom: 20px;">
      Ready to Make Your Quick Service Restaurant <span style="color: var(--br-gold); font-family: 'Playfair Display', Georgia, serif; font-style: italic;">Faster?</span>
    </h2>
    <p style="color: #c7b8a8; font-size: 18px; margin-bottom: 36px; line-height: 1.6;">
      Manage your menu, orders, tables, kitchen, billing, inventory and reports from one connected platform with Geni Menu.
    </p>
    <div style="display: flex; align-items: center; justify-content: center; gap: 16px; flex-wrap: wrap;">
      <a href="{{ route('restaurant_signup') }}" class="btn p" style="padding: 16px 36px; font-size: 16px;">Get Started →</a>
      <a href="{{ route('contact.us') }}" class="btn o" style="padding: 16px 32px; font-size: 16px; background: transparent; color: #fff; border-color: rgba(255,255,255,0.3);">Book a Demo →</a>
    </div>
  </div>
</section>

<script>
function toggleFaq(el) {
  const p = el.parentElement;
  const isOpen = p.classList.contains('open');
  document.querySelectorAll('.faq-item').forEach(i => i.classList.remove('open'));
  if (!isOpen) p.classList.add('open');
}
</script>

@endsection
