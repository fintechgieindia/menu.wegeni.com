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
.hd { max-width: 760px; margin: 0 auto 52px; text-align: center; }
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
.card:hover { border-color: rgba(135,96,57,0.3); box-shadow: var(--shadow-md); transform: translateY(-3px); }

.ic { width: 46px; height: 46px; border-radius: 13px; background: var(--bg2); color: var(--br); display: grid; place-items: center; flex: none; border: 1px solid var(--line); transition: .3s ease; }
.ic svg { width: 22px; height: 22px; fill: none; stroke: currentColor; stroke-width: 1.8; stroke-linecap: round; stroke-linejoin: round; }
.card:hover .ic { background: var(--br); color: #fff; border-color: var(--br); }

.win { background: #fff; color: var(--ink); border: 1px solid var(--line); border-radius: 20px; overflow: hidden; box-shadow: var(--shadow-md); font-size: 13px; }

/* Dynamic Flow Pipeline */
.flow-step { flex: 1; min-width: 90px; text-align: center; position: relative; padding: 12px 6px; }
.flow-step .num { width: 28px; height: 28px; border-radius: 50%; background: var(--br-light); color: var(--br); font-weight: 500; font-size: 12px; display: grid; place-items: center; margin: 0 auto 8px; border: 1px solid rgba(135,96,57,0.2); }
.flow-step .lbl { font-size: 11px; font-weight: 500; text-transform: uppercase; color: var(--ink); letter-spacing: 0.04em; }

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
  .bc { padding: 14px 0 14px; }
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
    <span class="cur">Dine-in Restaurant Solution</span>
  </div>
</div>

<!-- ================= 3. HERO SECTION ================= -->
<section style="padding: 60px 0 80px; background: linear-gradient(180deg, var(--bg2) 0%, #ffffff 100%); border-bottom: 1px solid var(--line);">
  <div class="w">
    <div class="g2" style="gap: 50px; align-items: center;">
      <!-- Hero Left Text -->
      <div>
        <div class="eb">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M3 21h18M3 10h18M5 6l7-3 7 3M4 10v11M20 10v11"/></svg>
          DINE-IN RESTAURANT SOLUTION
        </div>
        <h1 style="margin-bottom: 20px;">
          Deliver a Better Dine-in Experience. <br><span class="sf">From Table to Payment.</span>
        </h1>
        <p style="font-size: 19px; margin-bottom: 32px; color: var(--mute);">
          Manage your tables, menus, orders, kitchen, waiter requests and billing from one connected restaurant platform built for modern dining rooms.
        </p>
        <div style="display: flex; gap: 16px; align-items: center; flex-wrap: wrap;">
          <a href="{{ route('restaurant_signup') }}" class="btn p" style="padding: 16px 36px; font-size: 16px;">Get Started →</a>
          <a href="{{ route('contact.us') }}" class="btn o" style="padding: 16px 32px; font-size: 16px;">Book a Demo</a>
        </div>

        <div style="margin-top: 36px; display: flex; align-items: center; gap: 24px; font-size: 13.5px; color: var(--mute); font-weight: 600; flex-wrap: wrap;">
          <div style="display: flex; align-items: center; gap: 8px;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--green)" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
            Real-time Floor Plan
          </div>
          <div style="display: flex; align-items: center; gap: 8px;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--green)" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
            Instant KOT Routing
          </div>
          <div style="display: flex; align-items: center; gap: 8px;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--green)" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
            Connected POS Billing
          </div>
        </div>
      </div>

      <!-- Hero Right Visual Overlay -->
      <div style="position: relative;">
        <div style="border-radius: 24px; overflow: hidden; box-shadow: var(--shadow-lg); border: 1px solid var(--line); position: relative; background: #241a14;">
          <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&w=1200&q=80" alt="Dine-in Restaurant Interior" style="width: 100%; height: 440px; object-fit: cover; opacity: 0.88; display: block;">
          
          <!-- Live Operational Overlay -->
          <div style="position: absolute; bottom: 20px; left: 20px; right: 20px; background: rgba(255, 255, 255, 0.96); backdrop-filter: blur(12px); border-radius: 16px; padding: 18px; border: 1px solid var(--line); box-shadow: var(--shadow-md);">
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px; border-bottom: 1px solid var(--line); padding-bottom: 10px;">
              <div style="font-weight: 500; font-size: 14px; color: var(--ink); display: flex; align-items: center; gap: 8px;">
                <span style="width: 10px; height: 10px; border-radius: 50%; background: var(--green); display: inline-block;"></span>
                DINE-IN LIVE FLOOR MONITOR
              </div>
              <span style="font-size: 12px; font-weight: 700; color: var(--br);">Grand Dining Hall</span>
            </div>
            
            <div style="display: grid; grid-template-columns: repeat(5, 1fr); gap: 10px; text-align: center;">
              <div style="background: var(--bg2); padding: 8px; border-radius: 10px; border: 1px solid var(--line);">
                <div style="font-size: 11px; font-weight: 700; color: var(--mute);">TABLES</div>
                <div style="font-size: 16px; font-weight: 500; color: var(--ink);">12 Avail / 08 Occ</div>
              </div>
              <div style="background: var(--bg2); padding: 8px; border-radius: 10px; border: 1px solid var(--line);">
                <div style="font-size: 11px; font-weight: 700; color: var(--mute);">ACTIVE ORDERS</div>
                <div style="font-size: 16px; font-weight: 500; color: var(--br);">18 Active</div>
              </div>
              <div style="background: var(--bg2); padding: 8px; border-radius: 10px; border: 1px solid var(--line);">
                <div style="font-size: 11px; font-weight: 700; color: var(--mute);">KITCHEN</div>
                <div style="font-size: 16px; font-weight: 500; color: var(--amber);">06 Prep</div>
              </div>
              <div style="background: var(--bg2); padding: 8px; border-radius: 10px; border: 1px solid var(--line);">
                <div style="font-size: 11px; font-weight: 700; color: var(--mute);">PAYMENTS</div>
                <div style="font-size: 16px; font-weight: 500; color: var(--blue);">04 Pend</div>
              </div>
              <div style="background: var(--bg2); padding: 8px; border-radius: 10px; border: 1px solid var(--line);">
                <div style="font-size: 11px; font-weight: 700; color: var(--mute);">TODAY SALES</div>
                <div style="font-size: 16px; font-weight: 500; color: var(--green-text);">₹48,620</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 4. HERO VISUAL STORY ================= -->
<section style="background: var(--bg); padding: 50px 0; border-bottom: 1px solid var(--line);">
  <div class="w">
    <div style="text-align: center; max-width: 720px; margin: 0 auto 36px;">
      <h2 style="font-size: 28px;">From the First Seat to the Final Payment.</h2>
      <p style="margin-top: 8px; font-size: 16px;">Keep every stage of your dine-in operation connected with Geni Menu.</p>
    </div>

    <div style="display: flex; gap: 8px; align-items: center; justify-content: space-between; overflow-x: auto; padding-bottom: 10px;">
      <div class="flow-step">
        <div class="num">1</div>
        <div class="lbl">Guest Arrives</div>
      </div>
      <div style="color: var(--line); font-weight: 700;">→</div>
      <div class="flow-step">
        <div class="num">2</div>
        <div class="lbl">Table Assigned</div>
      </div>
      <div style="color: var(--line); font-weight: 700;">→</div>
      <div class="flow-step">
        <div class="num">3</div>
        <div class="lbl">Menu Viewed</div>
      </div>
      <div style="color: var(--line); font-weight: 700;">→</div>
      <div class="flow-step">
        <div class="num">4</div>
        <div class="lbl">Order Placed</div>
      </div>
      <div style="color: var(--line); font-weight: 700;">→</div>
      <div class="flow-step">
        <div class="num">5</div>
        <div class="lbl">KOT Created</div>
      </div>
      <div style="color: var(--line); font-weight: 700;">→</div>
      <div class="flow-step">
        <div class="num">6</div>
        <div class="lbl">Kitchen Prepares</div>
      </div>
      <div style="color: var(--line); font-weight: 700;">→</div>
      <div class="flow-step">
        <div class="num">7</div>
        <div class="lbl">Food Served</div>
      </div>
      <div style="color: var(--line); font-weight: 700;">→</div>
      <div class="flow-step">
        <div class="num">8</div>
        <div class="lbl">Bill Generated</div>
      </div>
      <div style="color: var(--line); font-weight: 700;">→</div>
      <div class="flow-step">
        <div class="num">9</div>
        <div class="lbl" style="color: var(--green-text);">Payment</div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 5. DINE-IN RESTAURANT CHALLENGES ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">FLOOR & SERVICE CHALLENGES</div>
      <h2>Dine-in Service Has Many Moving Parts.</h2>
      <p>Tables, guests, orders, kitchen preparation, service requests and billing all need to work together during every service.</p>
    </div>

    <div class="g4">
      <div class="card" style="padding: 28px;">
        <div class="ic" style="margin-bottom: 20px;">
          <svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><line x1="9" y1="3" x2="9" y2="21"/><line x1="15" y1="3" x2="15" y2="21"/></svg>
        </div>
        <h3 style="font-size: 18px; margin-bottom: 10px;">Table Management</h3>
        <p style="font-size: 14.5px;">Keep your dining floor organized and know which tables are available, reserved or occupied.</p>
      </div>

      <div class="card" style="padding: 28px;">
        <div class="ic" style="margin-bottom: 20px;">
          <svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/></svg>
        </div>
        <h3 style="font-size: 18px; margin-bottom: 10px;">Order Management</h3>
        <p style="font-size: 14.5px;">Keep every table's order clear, including item quantities and special customer requests.</p>
      </div>

      <div class="card" style="padding: 28px;">
        <div class="ic" style="margin-bottom: 20px;">
          <svg viewBox="0 0 24 24"><path d="M6 13.87A4 4 0 017.41 6a5.11 5.11 0 019.18 0A4 4 0 0118 13.87V21H6v-7.13z"/></svg>
        </div>
        <h3 style="font-size: 18px; margin-bottom: 10px;">Kitchen Coordination</h3>
        <p style="font-size: 14.5px;">Move orders clearly from the dining floor to the kitchen without tickets getting lost.</p>
      </div>

      <div class="card" style="padding: 28px;">
        <div class="ic" style="margin-bottom: 20px;">
          <svg viewBox="0 0 24 24"><rect x="2" y="4" width="20" height="16" rx="2"/><line x1="6" y1="8" x2="18" y2="8"/><line x1="6" y1="12" x2="14" y2="12"/></svg>
        </div>
        <h3 style="font-size: 18px; margin-bottom: 10px;">Billing & Payment</h3>
        <p style="font-size: 14.5px;">Bring orders and table billing together for a faster, error-free checkout experience.</p>
      </div>
    </div>
  </div>
</section>

<!-- ================= 6. COMPLETE DINE-IN EXPERIENCE ================= -->
<section style="background: var(--bg);">
  <div class="w">
    <div class="g2" style="gap: 50px; align-items: center;">
      <div>
        <div class="eb">CONNECTED OPERATIONS</div>
        <h2 style="margin-bottom: 20px;">Everything Your Dining Floor Needs.</h2>
        <p style="margin-bottom: 24px; font-size: 17px;">
          Geni Menu connects front-of-house and back-of-house operations so your team can manage the entire dining experience from one platform.
        </p>

        <div style="background: var(--bg2); padding: 20px; border-radius: 16px; border: 1px solid var(--line); display: flex; flex-direction: column; gap: 12px;">
          <div style="display: flex; align-items: center; gap: 12px;">
            <div style="width: 32px; height: 32px; border-radius: 50%; background: var(--br); color: #fff; display: grid; place-items: center; font-weight: 500; font-size: 13px;">✓</div>
            <div>
              <strong style="color: var(--ink); font-size: 15px;">Visually map tables and floor layout</strong>
              <p style="font-size: 13.5px;">Know table occupancy and seating capacity instantly.</p>
            </div>
          </div>
          <div style="display: flex; align-items: center; gap: 12px;">
            <div style="width: 32px; height: 32px; border-radius: 50%; background: var(--br); color: #fff; display: grid; place-items: center; font-weight: 500; font-size: 13px;">✓</div>
            <div>
              <strong style="color: var(--ink); font-size: 15px;">Route orders directly to kitchen screens & KOT</strong>
              <p style="font-size: 13.5px;">Prevent order delays and preparation errors.</p>
            </div>
          </div>
          <div style="display: flex; align-items: center; gap: 12px;">
            <div style="width: 32px; height: 32px; border-radius: 50%; background: var(--br); color: #fff; display: grid; place-items: center; font-weight: 500; font-size: 13px;">✓</div>
            <div>
              <strong style="color: var(--ink); font-size: 15px;">Settle bills quickly at table-side or cashier counter</strong>
              <p style="font-size: 13.5px;">Support UPI, Cash, Cards & split payments smoothly.</p>
            </div>
          </div>
        </div>
      </div>

      <div style="border-radius: 24px; overflow: hidden; box-shadow: var(--shadow-lg); border: 1px solid var(--line);">
        <img src="https://images.unsplash.com/photo-1552566626-52f8b828add9?auto=format&fit=crop&w=1000&q=80" alt="Restaurant Floor Activity" style="width: 100%; height: 420px; object-fit: cover; display: block;">
      </div>
    </div>
  </div>
</section>

<!-- ================= 7. TABLE MANAGEMENT ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">TABLE & SEATING CONTROL</div>
      <h2>Know Every Table. At a Glance.</h2>
      <p>See your dining floor and understand which tables are available, reserved, occupied or being prepared.</p>
    </div>

    <div class="g2" style="gap: 40px; align-items: center;">
      <!-- Interactive Floor Map Simulation -->
      <div class="win" style="padding: 24px;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; border-bottom: 1px solid var(--line); padding-bottom: 12px;">
          <h4 style="font-size: 16px;">MAIN DINING FLOOR PLAN</h4>
          <div style="display: flex; gap: 12px; font-size: 12px; font-weight: 700;">
            <span style="color: var(--green); display: flex; align-items: center; gap: 4px;"><span style="width: 8px; height: 8px; border-radius: 50%; background: var(--green);"></span> Available</span>
            <span style="color: var(--amber); display: flex; align-items: center; gap: 4px;"><span style="width: 8px; height: 8px; border-radius: 50%; background: var(--amber);"></span> Reserved</span>
            <span style="color: var(--br); display: flex; align-items: center; gap: 4px;"><span style="width: 8px; height: 8px; border-radius: 50%; background: var(--br);"></span> Occupied</span>
          </div>
        </div>

        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px;">
          <div style="background: var(--bg2); padding: 16px; border-radius: 12px; border: 1.5px solid var(--green); text-align: center;">
            <strong style="display: block; font-size: 15px; color: var(--ink);">T01</strong>
            <span style="font-size: 12px; color: var(--mute);">2 Seats</span>
            <div style="margin-top: 6px; font-size: 11px; font-weight: 500; color: var(--green-text); background: var(--green-bg); padding: 3px 8px; border-radius: 99px;">AVAILABLE</div>
          </div>
          <div style="background: var(--bg2); padding: 16px; border-radius: 12px; border: 1.5px solid var(--amber); text-align: center;">
            <strong style="display: block; font-size: 15px; color: var(--ink);">T02</strong>
            <span style="font-size: 12px; color: var(--mute);">4 Seats</span>
            <div style="margin-top: 6px; font-size: 11px; font-weight: 500; color: var(--amber-text); background: var(--amber-bg); padding: 3px 8px; border-radius: 99px;">RESERVED</div>
          </div>
          <div style="background: var(--bg2); padding: 16px; border-radius: 12px; border: 1.5px solid var(--br); text-align: center;">
            <strong style="display: block; font-size: 15px; color: var(--ink);">T03</strong>
            <span style="font-size: 12px; color: var(--mute);">6 Seats</span>
            <div style="margin-top: 6px; font-size: 11px; font-weight: 500; color: #fff; background: var(--br); padding: 3px 8px; border-radius: 99px;">OCCUPIED</div>
          </div>
          <div style="background: var(--bg2); padding: 16px; border-radius: 12px; border: 1.5px solid var(--green); text-align: center;">
            <strong style="display: block; font-size: 15px; color: var(--ink);">T04</strong>
            <span style="font-size: 12px; color: var(--mute);">4 Seats</span>
            <div style="margin-top: 6px; font-size: 11px; font-weight: 500; color: var(--green-text); background: var(--green-bg); padding: 3px 8px; border-radius: 99px;">AVAILABLE</div>
          </div>
          <!-- Highlighted T05 -->
          <div style="background: #fff7ef; padding: 16px; border-radius: 12px; border: 2px solid var(--br); text-align: center; box-shadow: 0 4px 12px rgba(135,96,57,0.15);">
            <strong style="display: block; font-size: 16px; color: var(--br);">T05 (Active)</strong>
            <span style="font-size: 12px; font-weight: 700; color: var(--ink);">8 Guests</span>
            <div style="margin-top: 6px; font-size: 11px; font-weight: 500; color: #fff; background: var(--br); padding: 3px 8px; border-radius: 99px;">OCCUPIED</div>
          </div>
          <div style="background: var(--bg2); padding: 16px; border-radius: 12px; border: 1.5px solid var(--green); text-align: center;">
            <strong style="display: block; font-size: 15px; color: var(--ink);">T06</strong>
            <span style="font-size: 12px; color: var(--mute);">6 Seats</span>
            <div style="margin-top: 6px; font-size: 11px; font-weight: 500; color: var(--green-text); background: var(--green-bg); padding: 3px 8px; border-radius: 99px;">AVAILABLE</div>
          </div>
        </div>
      </div>

      <!-- Table Feature Info -->
      <div>
        <h3 style="font-size: 24px; margin-bottom: 14px;">Instant Seat Allocation & Real-time Floor Visibility</h3>
        <p style="margin-bottom: 24px;">
          Eliminate floor confusion during peak hours. Staff can view available seating, assign tables in seconds, track dining duration and prepare tables for arriving guests.
        </p>
        <a href="{{ route('features.table-management') }}" class="btn p" style="padding: 14px 28px;">Explore Table Management →</a>
      </div>
    </div>
  </div>
</section>

<!-- ================= 8. DIGITAL MENU ================= -->
<section style="background: var(--bg);">
  <div class="w">
    <div class="g2" style="gap: 50px; align-items: center;">
      <div>
        <div class="eb">DIGITAL & QR MENU</div>
        <h2 style="margin-bottom: 18px;">Give Guests the Menu at Their Table.</h2>
        <p style="margin-bottom: 24px;">
          Let guests browse dishes, rich categories, pricing, photos and ingredients directly from their smartphones using a dynamic QR code placed on every dining table.
        </p>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 28px;">
          <div style="background: var(--bg2); padding: 14px; border-radius: 12px; border: 1px solid var(--line);">
            <strong style="color: var(--ink); font-size: 14px; display: block; margin-bottom: 4px;">Instant Price Updates</strong>
            <span style="font-size: 13px; color: var(--mute);">Change prices or item availability instantly without reprinting physical menus.</span>
          </div>
          <div style="background: var(--bg2); padding: 14px; border-radius: 12px; border: 1px solid var(--line);">
            <strong style="color: var(--ink); font-size: 14px; display: block; margin-bottom: 4px;">Multi-category Browsing</strong>
            <span style="font-size: 13px; color: var(--mute);">Starters, Biryani, Main Course, Chinese, Desserts & Beverages.</span>
          </div>
        </div>

        <a href="{{ route('features.menu-management') }}" class="btn p">Explore Menu Management →</a>
      </div>

      <!-- Smartphone Menu Preview -->
      <div style="max-width: 340px; margin: 0 auto;" class="win">
        <div style="background: var(--br); color: #fff; padding: 16px; text-align: center;">
          <strong style="font-size: 16px; letter-spacing: .05em;">GENI MENU</strong>
          <div style="font-size: 11px; opacity: 0.9; margin-top: 2px;">TABLE T05 · DIGITAL MENU</div>
        </div>
        <div style="padding: 16px; background: var(--bg2); max-height: 380px; overflow-y: auto;">
          <div style="font-size: 12px; font-weight: 500; color: var(--mute); text-transform: uppercase; margin-bottom: 10px;">POPULAR DISHES</div>
          
          <div style="background: #fff; padding: 12px; border-radius: 10px; border: 1px solid var(--line); margin-bottom: 8px; display: flex; justify-content: space-between; align-items: center;">
            <div>
              <strong style="font-size: 14px; color: var(--ink); display: block;">Chicken Biryani</strong>
              <span style="font-size: 12px; color: var(--mute);">Fragrant Basmati Rice & Spices</span>
            </div>
            <span style="font-weight: 500; color: var(--br); font-size: 14px;">₹280</span>
          </div>

          <div style="background: #fff; padding: 12px; border-radius: 10px; border: 1px solid var(--line); margin-bottom: 8px; display: flex; justify-content: space-between; align-items: center;">
            <div>
              <strong style="font-size: 14px; color: var(--ink); display: block;">Paneer Butter Masala</strong>
              <span style="font-size: 12px; color: var(--mute);">Rich Creamy Tomato Gravy</span>
            </div>
            <span style="font-weight: 500; color: var(--br); font-size: 14px;">₹240</span>
          </div>

          <div style="background: #fff; padding: 12px; border-radius: 10px; border: 1px solid var(--line); margin-bottom: 8px; display: flex; justify-content: space-between; align-items: center;">
            <div>
              <strong style="font-size: 14px; color: var(--ink); display: block;">Butter Naan</strong>
              <span style="font-size: 12px; color: var(--mute);">Fresh Tandoor Flatbread</span>
            </div>
            <span style="font-weight: 500; color: var(--br); font-size: 14px;">₹60</span>
          </div>

          <div style="background: #fff; padding: 12px; border-radius: 10px; border: 1px solid var(--line); display: flex; justify-content: space-between; align-items: center;">
            <div>
              <strong style="font-size: 14px; color: var(--ink); display: block;">Fresh Lime Soda</strong>
              <span style="font-size: 12px; color: var(--mute);">Chilled Refreshing Beverage</span>
            </div>
            <span style="font-weight: 500; color: var(--br); font-size: 14px;">₹90</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 9. ORDER MANAGEMENT ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="g2" style="gap: 50px; align-items: center;">
      <!-- Ticket UI Simulation -->
      <div class="win" style="padding: 24px;">
        <div style="display: flex; justify-content: space-between; border-bottom: 1px solid var(--line); padding-bottom: 12px; margin-bottom: 16px;">
          <div>
            <strong style="font-size: 16px; color: var(--ink);">TABLE T08</strong>
            <span style="display: block; font-size: 12px; color: var(--mute);">4 Guests · Steward: Ramesh</span>
          </div>
          <div style="text-align: right;">
            <strong style="color: var(--br); font-size: 14px;">ORDER #ORD-2084</strong>
            <span style="display: block; font-size: 11px; font-weight: 500; color: var(--green-text);">CONFIRMED</span>
          </div>
        </div>

        <div style="display: flex; flex-direction: column; gap: 8px; margin-bottom: 16px;">
          <div style="display: flex; justify-content: space-between; font-size: 13.5px;">
            <span>Chicken Biryani × 2</span>
            <strong style="color: var(--ink);">₹560</strong>
          </div>
          <div style="display: flex; justify-content: space-between; font-size: 13.5px;">
            <span>Paneer Tikka × 1</span>
            <strong style="color: var(--ink);">₹220</strong>
          </div>
          <div style="display: flex; justify-content: space-between; font-size: 13.5px;">
            <span>Butter Naan × 4</span>
            <strong style="color: var(--ink);">₹240</strong>
          </div>
          <div style="display: flex; justify-content: space-between; font-size: 13.5px;">
            <span>Fresh Lime Soda × 2</span>
            <strong style="color: var(--ink);">₹180</strong>
          </div>
        </div>

        <div style="background: #fff7ef; padding: 10px 14px; border-radius: 8px; border: 1px dashed var(--br); font-size: 12.5px; color: var(--br-dark); margin-bottom: 16px;">
          <strong>Special Note:</strong> Less spicy for Paneer Tikka. Extra lemon with Fresh Lime.
        </div>

        <div style="display: flex; justify-content: space-between; border-top: 1px solid var(--line); padding-top: 12px; font-size: 16px; font-weight: 500; color: var(--ink);">
          <span>Total Order Value:</span>
          <span style="color: var(--br);">₹1,200</span>
        </div>
      </div>

      <div>
        <div class="eb">TABLE ORDER FLOW</div>
        <h2 style="margin-bottom: 18px;">Every Table. Every Order. Clearly Connected.</h2>
        <p style="margin-bottom: 24px;">
          Keep table orders, quantities, seat locations and special preparation notes organized from the moment stewards enter the order until dishes hit the table.
        </p>
        <a href="{{ route('features.order-management') }}" class="btn p">Explore Order Management →</a>
      </div>
    </div>
  </div>
</section>

<!-- ================= 10. KOT & KITCHEN ================= -->
<section style="background: var(--bg);">
  <div class="w">
    <div class="hd">
      <div class="eb">KITCHEN ROUTING</div>
      <h2>Keep the Kitchen in Sync With the Dining Floor.</h2>
      <p>Send clear order information into the kitchen and keep preparation progress visible in real-time.</p>
    </div>

    <div class="g2" style="gap: 30px; margin-bottom: 32px;">
      <!-- Left Confirmed Order -->
      <div class="win" style="padding: 20px; border-left: 4px solid var(--blue);">
        <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
          <strong style="font-size: 15px;">ORDER STATUS</strong>
          <span style="background: #dbeafe; color: #1e40af; font-size: 11px; font-weight: 500; padding: 2px 8px; border-radius: 99px;">CONFIRMED</span>
        </div>
        <div style="font-size: 13px; color: var(--mute); margin-bottom: 8px;">Table T08 · 4 Guests · 5 Items</div>
        <div style="font-size: 13.5px; color: var(--ink); font-weight: 700;">Sent to Kitchen at 07:42 PM</div>
      </div>

      <!-- Right KOT Kitchen Screen -->
      <div class="win" style="padding: 20px; border-left: 4px solid var(--amber);">
        <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
          <strong style="font-size: 15px;">KOT #1048 (KITCHEN SCREEN)</strong>
          <span style="background: var(--amber-bg); color: var(--amber-text); font-size: 11px; font-weight: 500; padding: 2px 8px; border-radius: 99px;">PREPARING</span>
        </div>
        <div style="font-size: 13px; color: var(--mute); margin-bottom: 8px;">Table T08 · Chef Station 1</div>
        <div style="font-size: 13.5px; color: var(--ink); font-weight: 700;">Timer: 08 mins elapsed</div>
      </div>
    </div>

    <div style="text-align: center;">
      <a href="{{ route('features.kot-management') }}" class="btn p">Explore KOT Management →</a>
    </div>
  </div>
</section>

<!-- ================= 11. WAITER REQUESTS ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="g2" style="gap: 50px; align-items: center;">
      <div>
        <div class="eb">TABLE-SIDE SERVICE</div>
        <h2 style="margin-bottom: 18px;">Make Table-side Requests Simple.</h2>
        <p style="margin-bottom: 24px;">
          Give guests a simple way to ask for assistance while helping your floor stewards stay aware of table-side calls without guest frustration.
        </p>

        <div style="display: flex; flex-direction: column; gap: 10px; margin-bottom: 28px;">
          <div style="background: #fff; padding: 12px 16px; border-radius: 10px; border: 1px solid var(--line); display: flex; justify-content: space-between; align-items: center;">
            <span style="font-weight: 700; color: var(--ink); font-size: 14px;">[ Call Waiter ]</span>
            <span style="font-size: 12px; font-weight: 500; color: var(--br);">Notifies Steward Band</span>
          </div>
          <div style="background: #fff; padding: 12px 16px; border-radius: 10px; border: 1px solid var(--line); display: flex; justify-content: space-between; align-items: center;">
            <span style="font-weight: 700; color: var(--ink); font-size: 14px;">[ Request Water ]</span>
            <span style="font-size: 12px; font-weight: 500; color: var(--blue);">Instant Service Push</span>
          </div>
          <div style="background: #fff; padding: 12px 16px; border-radius: 10px; border: 1px solid var(--line); display: flex; justify-content: space-between; align-items: center;">
            <span style="font-weight: 700; color: var(--ink); font-size: 14px;">[ Request Bill ]</span>
            <span style="font-size: 12px; font-weight: 500; color: var(--green-text);">Prepares Cashier Ticket</span>
          </div>
        </div>

        <a href="{{ route('features.waiter-request') }}" class="btn p">Explore Waiter Requests →</a>
      </div>

      <div class="win" style="padding: 24px;">
        <div style="font-size: 12px; font-weight: 500; color: var(--mute); margin-bottom: 12px; text-transform: uppercase;">LIVE STEWARD REQUEST ALERT</div>
        <div style="background: #fff7ef; padding: 16px; border-radius: 12px; border: 1.5px solid var(--br); margin-bottom: 16px;">
          <div style="display: flex; justify-content: space-between; margin-bottom: 6px;">
            <strong style="color: var(--br); font-size: 16px;">TABLE T08</strong>
            <span style="font-size: 11px; font-weight: 500; background: var(--br); color: #fff; padding: 2px 8px; border-radius: 99px;">NEW REQUEST</span>
          </div>
          <div style="font-size: 15px; font-weight: 700; color: var(--ink);">Request: Cold Water & Extra Cutlery</div>
          <div style="font-size: 12px; color: var(--mute); margin-top: 4px;">Requested 1 minute ago</div>
        </div>
        <div style="font-size: 13px; color: var(--mute); text-align: center;">Floor Steward Ramesh notified on mobile POS</div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 12. POS & BILLING ================= -->
<section style="background: var(--bg);">
  <div class="w">
    <div class="g2" style="gap: 50px; align-items: center;">
      <!-- POS Receipt Simulation -->
      <div class="win" style="padding: 24px;">
        <div style="text-align: center; border-bottom: 1px dashed var(--line); padding-bottom: 12px; margin-bottom: 16px;">
          <strong style="font-size: 18px; color: var(--ink); display: block;">GENI RESTAURANT POS</strong>
          <span style="font-size: 12px; color: var(--mute);">Table T08 · Bill #INV-9402</span>
        </div>

        <div style="display: flex; flex-direction: column; gap: 6px; font-size: 13px; margin-bottom: 14px;">
          <div style="display: flex; justify-content: space-between;"><span>Chicken Biryani ×2</span><span>₹560.00</span></div>
          <div style="display: flex; justify-content: space-between;"><span>Paneer Tikka ×1</span><span>₹220.00</span></div>
          <div style="display: flex; justify-content: space-between;"><span>Butter Naan ×4</span><span>₹240.00</span></div>
          <div style="display: flex; justify-content: space-between;"><span>Fresh Lime Soda ×2</span><span>₹180.00</span></div>
        </div>

        <div style="border-top: 1px solid var(--line); padding-top: 10px; margin-bottom: 12px; font-size: 13px;">
          <div style="display: flex; justify-content: space-between; color: var(--mute);"><span>Subtotal</span><span>₹1,200.00</span></div>
          <div style="display: flex; justify-content: space-between; color: var(--mute);"><span>Discount</span><span>-₹50.00</span></div>
          <div style="display: flex; justify-content: space-between; color: var(--mute);"><span>GST (5%)</span><span>₹57.50</span></div>
          <div style="display: flex; justify-content: space-between; font-weight: 500; font-size: 16px; color: var(--ink); margin-top: 6px;">
            <span>Grand Total</span>
            <span style="color: var(--br);">₹1,207.50</span>
          </div>
        </div>

        <div style="background: var(--green-bg); padding: 10px; border-radius: 8px; text-align: center; color: var(--green-text); font-weight: 500; font-size: 13px;">
          PAID VIA UPI (GPay) ✓
        </div>
      </div>

      <div>
        <div class="eb">SMOOTH CHECKOUT</div>
        <h2 style="margin-bottom: 18px;">Make Every Table's Bill Simple.</h2>
        <p style="margin-bottom: 24px;">
          Connect table orders with billing and payments through one seamless restaurant POS workflow. Print GST invoices or send digital receipts instantly.
        </p>
        <a href="{{ route('features.pos-management') }}" class="btn p">Explore POS Management →</a>
      </div>
    </div>
  </div>
</section>

<!-- ================= 13. BUSY DINING HOURS ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="g2" style="gap: 50px; align-items: center;">
      <div>
        <div class="eb">PEAK HOUR CONTROL</div>
        <h2 style="margin-bottom: 18px;">Stay Organized When Every Table Is Active.</h2>
        <p style="margin-bottom: 24px;">
          Keep your floor team connected with clear visibility across tables, orders, kitchen preparation and billing during weekend rushes and peak lunch hours.
        </p>
        <div style="display: flex; gap: 24px; font-size: 14px; font-weight: 700; color: var(--ink);">
          <div>✔ Faster Table Clearance</div>
          <div>✔ Zero Ticket Confusion</div>
          <div>✔ Real-time Floor Status</div>
        </div>
      </div>

      <div style="border-radius: 20px; overflow: hidden; border: 1px solid var(--line); box-shadow: var(--shadow-md);">
        <img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?auto=format&fit=crop&w=1000&q=80" alt="Busy Dining Hour" style="width: 100%; height: 360px; object-fit: cover; display: block;">
      </div>
    </div>
  </div>
</section>

<!-- ================= 15. DINE-IN BUSINESS VISIBILITY ================= -->
<section style="background: var(--bg);">
  <div class="w">
    <div class="hd">
      <div class="eb">REPORTS & ANALYTICS</div>
      <h2>Know What Is Happening Across Your Dining Floor.</h2>
      <p>Understand sales, orders, payments and table activity through connected restaurant reports.</p>
    </div>

    <!-- Analytics Dashboard Mockup -->
    <div class="win" style="padding: 28px; max-width: 1000px; margin: 0 auto 36px;">
      <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; margin-bottom: 28px;">
        <div style="background: var(--bg2); padding: 16px; border-radius: 12px; border: 1px solid var(--line);">
          <div style="font-size: 12px; font-weight: 700; color: var(--mute);">TODAY'S SALES</div>
          <div style="font-size: 22px; font-weight: 500; color: var(--br);">₹48,620</div>
        </div>
        <div style="background: var(--bg2); padding: 16px; border-radius: 12px; border: 1px solid var(--line);">
          <div style="font-size: 12px; font-weight: 700; color: var(--mute);">DINE-IN ORDERS</div>
          <div style="font-size: 22px; font-weight: 500; color: var(--ink);">186</div>
        </div>
        <div style="background: var(--bg2); padding: 16px; border-radius: 12px; border: 1px solid var(--line);">
          <div style="font-size: 12px; font-weight: 700; color: var(--mute);">AVG ORDER VALUE</div>
          <div style="font-size: 22px; font-weight: 500; color: var(--ink);">₹261</div>
        </div>
        <div style="background: var(--bg2); padding: 16px; border-radius: 12px; border: 1px solid var(--line);">
          <div style="font-size: 12px; font-weight: 700; color: var(--mute);">TOTAL PAYMENTS</div>
          <div style="font-size: 22px; font-weight: 500; color: var(--green-text);">₹45,280</div>
        </div>
      </div>

      <div class="g2" style="gap: 24px; align-items: start;">
        <div style="background: var(--bg2); padding: 20px; border-radius: 12px; border: 1px solid var(--line);">
          <h4 style="font-size: 15px; margin-bottom: 12px;">TOP PERFORMING DINE-IN ITEMS</h4>
          <div style="display: flex; flex-direction: column; gap: 8px; font-size: 13.5px;">
            <div style="display: flex; justify-content: space-between;"><span>1. Chicken Biryani</span><strong>142 Orders</strong></div>
            <div style="display: flex; justify-content: space-between;"><span>2. Paneer Butter Masala</span><strong>96 Orders</strong></div>
            <div style="display: flex; justify-content: space-between;"><span>3. Fresh Lime Soda</span><strong>84 Orders</strong></div>
          </div>
        </div>

        <div style="background: var(--bg2); padding: 20px; border-radius: 12px; border: 1px solid var(--line);">
          <h4 style="font-size: 15px; margin-bottom: 12px;">TABLE TURNOVER & ACTIVITY</h4>
          <div style="display: flex; flex-direction: column; gap: 8px; font-size: 13.5px;">
            <div style="display: flex; justify-content: space-between;"><span>Occupied Tables</span><strong style="color: var(--br);">16 Active</strong></div>
            <div style="display: flex; justify-content: space-between;"><span>Available Tables</span><strong style="color: var(--green-text);">05 Tables</strong></div>
            <div style="display: flex; justify-content: space-between;"><span>Reserved Tables</span><strong style="color: var(--amber-text);">03 Tables</strong></div>
          </div>
        </div>
      </div>
    </div>

    <div style="text-align: center;">
      <a href="{{ route('features.reports') }}" class="btn p">Explore Reports →</a>
    </div>
  </div>
</section>

<!-- ================= 16. DINE-IN RESTAURANT TYPES ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">BUILT FOR EVERY FORMAT</div>
      <h2>Built for Different Dine-in Restaurants.</h2>
      <p>Whether you run a casual family restaurant, a fine dining venue or a multi-cuisine hotel dining room, Geni Menu fits your operational workflow.</p>
    </div>

    <div class="g3">
      <div class="card" style="padding: 20px;">
        <h3 style="font-size: 18px; margin-bottom: 6px;">Family Restaurants</h3>
        <p style="font-size: 14px;">Manage large seating arrangements, multi-item family orders and speedy bill settlements.</p>
      </div>

      <div class="card" style="padding: 20px;">
        <h3 style="font-size: 18px; margin-bottom: 6px;">Casual Dining</h3>
        <p style="font-size: 14px;">Quick table allocation, QR menus and fast steward order entry for high guest turnover.</p>
      </div>

      <div class="card" style="padding: 20px;">
        <h3 style="font-size: 18px; margin-bottom: 6px;">Fine Dining Restaurants</h3>
        <p style="font-size: 14px;">Multi-course ordering, table reservations and elegant steward mobility.</p>
      </div>

      <div class="card" style="padding: 20px;">
        <h3 style="font-size: 18px; margin-bottom: 6px;">Multi-Cuisine Restaurants</h3>
        <p style="font-size: 14px;">Route Indian, Chinese and Tandoor items to separate kitchen stations automatically.</p>
      </div>

      <div class="card" style="padding: 20px;">
        <h3 style="font-size: 18px; margin-bottom: 6px;">South & North Indian Restaurants</h3>
        <p style="font-size: 14px;">Handle rapid dish preparation, high order volumes and meal combo modifications.</p>
      </div>

      <div class="card" style="padding: 20px;">
        <h3 style="font-size: 18px; margin-bottom: 6px;">Hotel Restaurants</h3>
        <p style="font-size: 14px;">Connect in-house dining tables, guest room billing and restaurant POS transactions.</p>
      </div>
    </div>
  </div>
</section>

<!-- ================= 17. WHY GENI MENU FOR DINE-IN ================= -->
<section style="background: var(--bg);">
  <div class="w">
    <div class="hd">
      <div class="eb">KEY BENEFITS</div>
      <h2>Built Around the Dine-in Experience.</h2>
    </div>

    <div class="g3">
      <div class="card" style="padding: 24px;">
        <h3 style="font-size: 18px; margin-bottom: 8px;">Better Table Visibility</h3>
        <p style="font-size: 14px;">Know what is happening across your dining floor in real-time.</p>
      </div>

      <div class="card" style="padding: 24px;">
        <h3 style="font-size: 18px; margin-bottom: 8px;">Easy Menu Access</h3>
        <p style="font-size: 14px;">Give guests a simple QR code way to explore your menu.</p>
      </div>

      <div class="card" style="padding: 24px;">
        <h3 style="font-size: 18px; margin-bottom: 8px;">Organized Orders</h3>
        <p style="font-size: 14px;">Keep table orders clear from table-side service to kitchen entry.</p>
      </div>

      <div class="card" style="padding: 24px;">
        <h3 style="font-size: 18px; margin-bottom: 8px;">Connected Kitchen</h3>
        <p style="font-size: 14px;">Keep KOTs and preparation workflows organized without lost paper tickets.</p>
      </div>

      <div class="card" style="padding: 24px;">
        <h3 style="font-size: 18px; margin-bottom: 8px;">Smoother Billing</h3>
        <p style="font-size: 14px;">Connect orders, tables and payments into one billing screen.</p>
      </div>

      <div class="card" style="padding: 24px;">
        <h3 style="font-size: 18px; margin-bottom: 8px;">Business Visibility</h3>
        <p style="font-size: 14px;">Understand daily restaurant performance through connected reports.</p>
      </div>
    </div>
  </div>
</section>

<!-- ================= 22. FAQ ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">FREQUENTLY ASKED QUESTIONS</div>
      <h2>Frequently Asked Questions</h2>
      <p>Everything you need to know about Geni Menu for dine-in restaurants.</p>
    </div>

    <div class="faq-list">
      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          1. Is Geni Menu suitable for dine-in restaurants?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Geni Menu is built specifically for dine-in operations including family restaurants, fine dining, casual dining, and multi-cuisine outlets.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          2. Can I manage restaurant tables and floor plans?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. You can visually arrange your dining floor, set table capacity, and track live table status (available, reserved, occupied, cleaning).
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          3. Can guests access the digital menu from their table?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Every table can have a QR code that lets guests view your digital menu, categories, photos, and prices directly on their mobile phones.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          4. Can dine-in orders be linked to specific tables?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. All orders are strictly linked to table numbers, steward IDs, and seat locations for accurate service and billing.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          5. Can orders be sent to the kitchen through KOT?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Orders generate Kitchen Order Tickets (KOT) that can print automatically in the kitchen or display on thermal printers and KDS screens.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          6. Can guests make table-side waiter requests?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Guests can tap to request water, call a waiter, or ask for the bill, which instantly alerts floor stewards.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          7. Can I track restaurant sales and daily orders?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Comprehensive reports display total sales, order volume, top-selling dishes, payment breakdown, and table turnover.
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 23. FINAL CTA ================= -->
<section style="background: linear-gradient(135deg, #FAF4ED 0%, #EFE4D6 50%, #FAF4ED 100%); color: #21160F; text-align: center; padding: 80px 0; border-top: 1px solid rgba(135, 96, 57, 0.16);">
  <div class="w" style="max-width: 760px;">
    <h2 style="color: #21160F; font-size: clamp(32px, 4vw, 48px); margin-bottom: 20px;">
      Make Every Dine-in Service <span style="color: #876039; font-family: 'Playfair Display', Georgia, serif; font-style: italic;">More Connected.</span>
    </h2>
    <p style="color: #6E6157; font-size: 18px; margin-bottom: 36px; line-height: 1.6;">
      Bring your tables, menu, orders, kitchen, service and billing together with Geni Menu.
    </p>
    <div style="display: flex; align-items: center; justify-content: center; gap: 16px; flex-wrap: wrap;">
      <a href="{{ route('restaurant_signup') }}" class="btn p" style="padding: 16px 36px; font-size: 16px; background: #876039; color: #fff;">Get Started →</a>
      <a href="{{ route('contact.us') }}" class="btn o" style="padding: 16px 32px; font-size: 16px; background: #fff; color: #876039; border: 1.5px solid #876039;">Book a Demo</a>
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
