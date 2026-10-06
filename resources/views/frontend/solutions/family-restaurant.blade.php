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
    <a href="{{ route('features') }}">Solutions</a>
    <span>/</span>
    <span class="cur">Family Restaurant Solution</span>
  </div>
</div>

<!-- ================= 3. HERO SECTION ================= -->
<section style="padding: 60px 0 80px; background: linear-gradient(180deg, var(--bg2) 0%, #ffffff 100%); border-bottom: 1px solid var(--line);">
  <div class="w">
    <div class="g2" style="gap: 50px; align-items: center;">
      <!-- Hero Left Text -->
      <div>
        <div class="eb">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>
          FAMILY RESTAURANT SOLUTION
        </div>
        <h1 style="margin-bottom: 20px;">
          Everything Your Family Restaurant Needs. <br>
          <span class="sf">In One Place.</span>
        </h1>
        <p style="font-size: 18px; margin-bottom: 32px; max-width: 540px; color: var(--mute);">
          Manage tables, menus, orders, kitchen operations, billing and customer service through one connected restaurant platform.
        </p>

        <div style="display: flex; gap: 16px; flex-wrap: wrap; margin-bottom: 36px;">
          <a href="{{ route('restaurant_signup') }}" onclick="if(typeof openPopup === 'function'){ openPopup(); return false; }" class="btn p">Get Started →</a>
          <a href="{{ route('contact.us') }}" class="btn o">Book a Demo</a>
        </div>

        <!-- Factual highlights -->
        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; padding-top: 24px; border-top: 1px solid var(--line);">
          <div>
            <div style="font-size: 22px; font-weight: 500; color: var(--br); font-family: 'Outfit', sans-serif;">Floor View</div>
            <div style="font-size: 12px; font-weight: 600; color: var(--mute);">Table Seating</div>
          </div>
          <div>
            <div style="font-size: 22px; font-weight: 500; color: var(--br); font-family: 'Outfit', sans-serif;">Group Orders</div>
            <div style="font-size: 12px; font-weight: 600; color: var(--mute);">Multi-Item Tickets</div>
          </div>
          <div>
            <div style="font-size: 22px; font-weight: 500; color: var(--br); font-family: 'Outfit', sans-serif;">Fast POS</div>
            <div style="font-size: 12px; font-weight: 600; color: var(--mute);">Billing & Split Payment</div>
          </div>
        </div>
      </div>

      <!-- Hero Right Visual: Warm Indian Family Restaurant Image + Floating Dashboard UI -->
      <div style="position: relative;">
        <!-- Warm Image Card -->
        <div style="border-radius: 24px; overflow: hidden; border: 1px solid var(--line); box-shadow: var(--shadow-lg); position: relative;">
          <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&w=800&q=80" alt="Indian Family Restaurant Dining" style="width: 100%; height: 440px; object-fit: cover; display: block;">
          <div style="position: absolute; inset: 0; background: linear-gradient(180deg, rgba(36,26,20,0.2) 0%, rgba(36,26,20,0.65) 100%);"></div>
          
          <div style="position: absolute; bottom: 20px; left: 20px; right: 20px; color: #fff;">
            <div style="font-size: 12px; font-weight: 500; letter-spacing: 0.1em; color: var(--br-gold); text-transform: uppercase;">FAMILY DINING ROOM</div>
            <div style="font-size: 18px; font-weight: 500; font-family: 'Outfit', sans-serif;">Main Hall • Peak Dinner Hour</div>
          </div>
        </div>

        <!-- Floating Live Operations Overlay -->
        <div style="position: absolute; top: -16px; right: -16px; background: rgba(255,255,255,0.96); backdrop-filter: blur(12px); border: 1.5px solid var(--br); border-radius: 18px; padding: 14px 18px; box-shadow: var(--shadow-md); min-width: 240px; z-index: 2;">
          <div style="font-size: 10px; font-weight: 500; color: var(--br); letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 8px;">LIVE OPERATIONS (DEMO)</div>
          <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 8px; font-size: 11px;">
            <div style="background: var(--bg2); padding: 6px 8px; border-radius: 6px;">Tables: <strong>12 Avail / 08 Occ</strong></div>
            <div style="background: var(--bg2); padding: 6px 8px; border-radius: 6px;">Orders: <strong>18 Active</strong></div>
            <div style="background: var(--amber-bg); color: var(--amber-text); padding: 6px 8px; border-radius: 6px;">Kitchen: <strong>06 Prep</strong></div>
            <div style="background: var(--br-light); color: var(--br); padding: 6px 8px; border-radius: 6px;">Sales: <strong>₹48,620</strong></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 4. HERO VISUAL STORY ================= -->
<section style="padding: 40px 0; background: var(--bg2); border-bottom: 1px solid var(--line);">
  <div class="w">
    <div style="text-align: center; margin-bottom: 16px;">
      <div style="font-size: 12px; font-weight: 500; letter-spacing: 0.15em; color: var(--br); text-transform: uppercase;">CONNECTED FAMILY DINING JOURNEY</div>
      <h3 style="font-size: 22px; margin-top: 4px;">From the First Welcome to the Final Bill.</h3>
      <p style="font-size: 15px; margin-top: 4px;">Keep every stage of the family dining experience connected with Geni Menu.</p>
    </div>
    
    <div style="display: flex; align-items: center; justify-content: space-between; max-width: 1040px; margin: 24px auto 0; flex-wrap: wrap; gap: 8px; font-size: 11.5px; font-weight: 500; text-align: center;">
      <div style="background: #fff; padding: 10px 14px; border-radius: 10px; border: 1px solid var(--line);">1. GUEST ARRIVES</div>
      <div style="color: var(--br);">→</div>
      <div style="background: #fff; padding: 10px 14px; border-radius: 10px; border: 1px solid var(--line);">2. TABLE ASSIGNED</div>
      <div style="color: var(--br);">→</div>
      <div style="background: #fff; padding: 10px 14px; border-radius: 10px; border: 1px solid var(--line);">3. MENU VIEWED</div>
      <div style="color: var(--br);">→</div>
      <div style="background: #fff; padding: 10px 14px; border-radius: 10px; border: 1px solid var(--line);">4. ORDER PLACED</div>
      <div style="color: var(--br);">→</div>
      <div style="background: #fff; padding: 10px 14px; border-radius: 10px; border: 1px solid var(--line);">5. KITCHEN PREPARES</div>
      <div style="color: var(--br);">→</div>
      <div style="background: #fff; padding: 10px 14px; border-radius: 10px; border: 1px solid var(--line);">6. FOOD SERVED</div>
      <div style="color: var(--br);">→</div>
      <div style="background: #fff; padding: 10px 14px; border-radius: 10px; border: 1px solid var(--line);">7. BILL GENERATED</div>
      <div style="color: var(--br);">→</div>
      <div style="background: var(--br); color: #fff; padding: 10px 14px; border-radius: 10px;">8. PAYMENT & REPORT</div>
    </div>
  </div>
</section>

<!-- ================= 5. FAMILY RESTAURANT CHALLENGE ================= -->
<section style="background: #ffffff;">
  <div class="w">
    <div class="hd">
      <div class="eb">DINING ROOM REALITY</div>
      <h2>Family Restaurants Have More <span class="sf">to Manage Than the Meal.</span></h2>
      <p>A family restaurant needs to balance guests, tables, orders, kitchen coordination, service and billing — often during busy lunch and dinner hours.</p>
    </div>

    <div class="g4">
      <!-- Challenge 1 -->
      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 14px;">
          <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>
        </div>
        <h4 style="font-size: 18px; margin-bottom: 6px;">Busy Tables</h4>
        <p style="font-size: 14px;">Manage different table sizes and guest groups across your dining floor.</p>
      </div>

      <!-- Challenge 2 -->
      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 14px;">
          <svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/></svg>
        </div>
        <h4 style="font-size: 18px; margin-bottom: 6px;">Large Orders</h4>
        <p style="font-size: 14px;">Keep multiple dishes, quantities and special requests organized.</p>
      </div>

      <!-- Challenge 3 -->
      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 14px;">
          <svg viewBox="0 0 24 24"><path d="M6 13.87A4 4 0 017.41 6a5.11 5.11 0 019.18 0A4 4 0 0118 13.87V21H6v-7.13z"/></svg>
        </div>
        <h4 style="font-size: 18px; margin-bottom: 6px;">Kitchen Coordination</h4>
        <p style="font-size: 14px;">Keep orders moving clearly from the dining floor to the kitchen.</p>
      </div>

      <!-- Challenge 4 -->
      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 14px;">
          <svg viewBox="0 0 24 24"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="M6 8h12M6 12h8"/></svg>
        </div>
        <h4 style="font-size: 18px; margin-bottom: 6px;">Fast Billing</h4>
        <p style="font-size: 14px;">Give your team a simple workflow for preparing bills and completing payments.</p>
      </div>
    </div>
  </div>
</section>

<!-- ================= 6. FAMILY DINING EXPERIENCE ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">EFFORTLESS DINING</div>
      <h2>Make Every Family Visit <span class="sf">Feel Effortless.</span></h2>
      <p>Geni Menu helps your team stay connected throughout the guest journey while keeping the experience simple for customers.</p>
    </div>

    <!-- Family Dining Lifestyle Showcase -->
    <div class="g2" style="gap: 36px; align-items: center;">
      <div style="border-radius: 20px; overflow: hidden; border: 1px solid var(--line); box-shadow: var(--shadow-md);">
        <img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?auto=format&fit=crop&w=800&q=80" alt="Family Dining Table Experience" style="width: 100%; height: 360px; object-fit: cover; display: block;">
      </div>

      <!-- Flow Banner -->
      <div style="background: #fff; padding: 32px; border-radius: 20px; border: 1px solid var(--line);">
        <div style="font-size: 12px; font-weight: 500; color: var(--br); margin-bottom: 14px;">CONNECTED STEP-BY-STEP SERVICE</div>
        <div style="display: flex; flex-direction: column; gap: 12px; font-size: 14px; font-weight: 700;">
          <div style="display: flex; align-items: center; gap: 12px; padding: 10px 14px; background: var(--bg2); border-radius: 10px;">
            <span style="color: var(--br); font-weight: 500;">01</span> TABLE ASSIGNMENT & SEATING
          </div>
          <div style="display: flex; align-items: center; gap: 12px; padding: 10px 14px; background: var(--bg2); border-radius: 10px;">
            <span style="color: var(--br); font-weight: 500;">02</span> DIGITAL MENU BROWSING
          </div>
          <div style="display: flex; align-items: center; gap: 12px; padding: 10px 14px; background: var(--bg2); border-radius: 10px;">
            <span style="color: var(--br); font-weight: 500;">03</span> ORDER ENTRY & KOT ROUTING
          </div>
          <div style="display: flex; align-items: center; gap: 12px; padding: 10px 14px; background: var(--bg2); border-radius: 10px;">
            <span style="color: var(--br); font-weight: 500;">04</span> KITCHEN PREPARATION & SERVICE
          </div>
          <div style="display: flex; align-items: center; gap: 12px; padding: 10px 14px; background: var(--br-light); border-radius: 10px; color: var(--br);">
            <span style="font-weight: 500;">05</span> INSTANT POS BILLING & PAYMENT
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 7. TABLE MANAGEMENT ================= -->
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">DINING FLOOR OPTIMIZATION</div>
      <h2>Seat Every Family <span class="sf">With Confidence.</span></h2>
      <p>From couples to large family groups, keep your dining floor organized with a clear view of table availability and occupancy.</p>
    </div>

    <!-- Floor Plan Visual Card -->
    <div class="win" style="max-width: 960px; margin: 0 auto; padding: 32px;">
      <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; flex-wrap: wrap; gap: 12px;">
        <div>
          <div style="font-size: 12px; font-weight: 500; color: var(--br);">MAIN DINING HALL PLAN</div>
          <h3 style="font-size: 22px;">Table Seating Status</h3>
        </div>
        <div style="display: flex; gap: 12px; font-size: 12px; font-weight: 700;">
          <span style="color: var(--green); display: flex; align-items: center; gap: 4px;"><i style="width:8px; height:8px; border-radius:50%; background:var(--green);"></i> Available</span>
          <span style="color: var(--amber); display: flex; align-items: center; gap: 4px;"><i style="width:8px; height:8px; border-radius:50%; background:var(--amber);"></i> Reserved</span>
          <span style="color: var(--br); display: flex; align-items: center; gap: 4px;"><i style="width:8px; height:8px; border-radius:50%; background:var(--br);"></i> Occupied</span>
          <span style="color: var(--red); display: flex; align-items: center; gap: 4px;"><i style="width:8px; height:8px; border-radius:50%; background:var(--red);"></i> Cleaning</span>
        </div>
      </div>

      <!-- Floor Plan Grid -->
      <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; margin-bottom: 24px;">
        <div style="padding: 16px; background: var(--green-bg); border-radius: 12px; border: 1px solid rgba(16,185,129,0.3); text-align: center;">
          <div style="font-weight: 500; font-size: 16px; color: var(--green-text);">Table T01</div>
          <div style="font-size: 12px; color: var(--green-text);">2 Seats • Available</div>
        </div>

        <div style="padding: 16px; background: var(--br-light); border-radius: 12px; border: 1.5px solid var(--br); text-align: center;">
          <div style="font-weight: 500; font-size: 16px; color: var(--br);">Table T02</div>
          <div style="font-size: 12px; color: var(--br);">4 Seats • Occupied (Family)</div>
        </div>

        <div style="padding: 16px; background: var(--amber-bg); border-radius: 12px; border: 1px solid rgba(245,158,11,0.3); text-align: center;">
          <div style="font-weight: 500; font-size: 16px; color: var(--amber-text);">Table T03</div>
          <div style="font-size: 12px; color: var(--amber-text);">6 Seats • Reserved (07:30 PM)</div>
        </div>

        <div style="padding: 16px; background: var(--br-light); border-radius: 12px; border: 1.5px solid var(--br); text-align: center;">
          <div style="font-weight: 500; font-size: 16px; color: var(--br);">Table T04</div>
          <div style="font-size: 12px; color: var(--br);">8 Seats • Occupied</div>
        </div>

        <div style="padding: 16px; background: var(--green-bg); border-radius: 12px; border: 1px solid rgba(16,185,129,0.3); text-align: center;">
          <div style="font-weight: 500; font-size: 16px; color: var(--green-text);">Table T05</div>
          <div style="font-size: 12px; color: var(--green-text);">4 Seats • Available</div>
        </div>

        <!-- Highlighted Table T06 -->
        <div style="padding: 16px; background: var(--green-bg); border-radius: 12px; border: 2px solid var(--green); text-align: center; box-shadow: 0 4px 14px rgba(16,185,129,0.2);">
          <div style="font-weight: 500; font-size: 16px; color: var(--green-text);">Table T06 (10 Guests)</div>
          <div style="font-size: 12px; font-weight: 500; color: var(--green-text);">10 Seats • Available (Large Family)</div>
        </div>
      </div>

      <div style="text-align: center;">
        <a href="{{ route('features.table-management') }}" class="btn o" style="font-size: 14px; padding: 10px 24px;">Explore Table Management →</a>
      </div>
    </div>
  </div>
</section>

<!-- ================= 8. MENU EXPERIENCE ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">DIGITAL DISCOVERY</div>
      <h2>Make Your Menu Easy <span class="sf">for Every Guest.</span></h2>
      <p>Give families a simple way to explore dishes, prices and available choices from their table.</p>
    </div>

    <!-- Phone Interface Preview -->
    <div class="g2" style="gap: 40px; align-items: center;">
      <!-- Mobile Phone Mockup -->
      <div style="max-width: 320px; margin: 0 auto; background: #fff; border: 5px solid var(--ink); border-radius: 32px; padding: 20px 16px; box-shadow: var(--shadow-lg);">
        <div style="width: 50px; height: 4px; background: #ccc; border-radius: 2px; margin: 0 auto 16px;"></div>
        
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 14px; border-bottom: 1px solid var(--line); padding-bottom: 10px;">
          <div style="font-size: 14px; font-weight: 500; color: var(--br);">GENI MENU</div>
          <span style="font-size: 10px; font-weight: 500; background: var(--br-light); color: var(--br); padding: 3px 8px; border-radius: 6px;">TABLE T08</span>
        </div>

        <!-- Categories Pill Scroll -->
        <div style="display: flex; gap: 6px; overflow-x: auto; padding-bottom: 10px; margin-bottom: 12px; font-size: 11px; font-weight: 700;">
          <span style="padding: 4px 10px; background: var(--br); color: #fff; border-radius: 12px; flex: none;">Biryani</span>
          <span style="padding: 4px 10px; background: var(--bg2); color: var(--mute); border-radius: 12px; flex: none;">Main Course</span>
          <span style="padding: 4px 10px; background: var(--bg2); color: var(--mute); border-radius: 12px; flex: none;">Starters</span>
          <span style="padding: 4px 10px; background: var(--bg2); color: var(--mute); border-radius: 12px; flex: none;">Desserts</span>
        </div>

        <!-- Food items list -->
        <div style="display: flex; flex-direction: column; gap: 10px; font-size: 12px;">
          <div style="padding: 10px; background: var(--bg2); border-radius: 10px; display: flex; justify-content: space-between; align-items: center;">
            <div>
              <div style="font-weight: 700;">Chicken Biryani</div>
              <div style="color: var(--br); font-weight: 500;">₹280</div>
            </div>
            <button style="padding: 4px 10px; background: var(--br); color: #fff; border: none; border-radius: 6px; font-size: 11px; font-weight: 700;">+ Add</button>
          </div>

          <div style="padding: 10px; background: var(--bg2); border-radius: 10px; display: flex; justify-content: space-between; align-items: center;">
            <div>
              <div style="font-weight: 700;">Paneer Butter Masala</div>
              <div style="color: var(--br); font-weight: 500;">₹240</div>
            </div>
            <button style="padding: 4px 10px; background: var(--br); color: #fff; border: none; border-radius: 6px; font-size: 11px; font-weight: 700;">+ Add</button>
          </div>

          <div style="padding: 10px; background: var(--bg2); border-radius: 10px; display: flex; justify-content: space-between; align-items: center;">
            <div>
              <div style="font-weight: 700;">Butter Naan</div>
              <div style="color: var(--br); font-weight: 500;">₹60</div>
            </div>
            <button style="padding: 4px 10px; background: var(--br); color: #fff; border: none; border-radius: 6px; font-size: 11px; font-weight: 700;">+ Add</button>
          </div>
        </div>
      </div>

      <!-- Left Text & Categories -->
      <div>
        <h3 style="font-size: 28px; margin-bottom: 16px;">Multi-Category Menu Organization</h3>
        <p style="margin-bottom: 24px;">Organize starters, biryanis, bread, gravies, beverages, and kids items with high-resolution dish pictures and vegetarian indicators.</p>

        <div style="display: flex; flex-wrap: wrap; gap: 8px; margin-bottom: 28px;">
          <span style="padding: 6px 14px; background: #fff; border: 1px solid var(--line); border-radius: 8px; font-size: 13px; font-weight: 700;">Starters</span>
          <span style="padding: 6px 14px; background: #fff; border: 1px solid var(--line); border-radius: 8px; font-size: 13px; font-weight: 700;">Soups</span>
          <span style="padding: 6px 14px; background: #fff; border: 1px solid var(--line); border-radius: 8px; font-size: 13px; font-weight: 700;">Biryani</span>
          <span style="padding: 6px 14px; background: #fff; border: 1px solid var(--line); border-radius: 8px; font-size: 13px; font-weight: 700;">Main Course</span>
          <span style="padding: 6px 14px; background: #fff; border: 1px solid var(--line); border-radius: 8px; font-size: 13px; font-weight: 700;">Indian & Tandoor</span>
          <span style="padding: 6px 14px; background: #fff; border: 1px solid var(--line); border-radius: 8px; font-size: 13px; font-weight: 700;">Desserts</span>
        </div>

        <a href="{{ route('features.menu-management') }}" class="btn p">Explore Menu Management →</a>
      </div>
    </div>
  </div>
</section>

<!-- ================= 9. LARGE FAMILY ORDERS ================= -->
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">GROUP ORDER ACCURACY</div>
      <h2>More Guests. More Items. <span class="sf">One Clear Order.</span></h2>
      <p>Keep larger family orders organized from the dining table directly to the kitchen line.</p>
    </div>

    <!-- Realistic Order Dashboard Card -->
    <div class="win" style="max-width: 860px; margin: 0 auto; padding: 28px; border: 1.5px solid var(--br);">
      <div style="display: flex; justify-content: space-between; align-items: center; padding-bottom: 16px; border-bottom: 1px solid var(--line); margin-bottom: 20px;">
        <div>
          <span style="font-size: 12px; font-weight: 500; color: var(--br);">TABLE T08 • 6 GUESTS</span>
          <h3 style="font-size: 22px;">ORDER #ORD-2084</h3>
        </div>
        <span class="st-badge instock" style="background: var(--green-bg); color: var(--green-text); font-weight: 500; padding: 6px 12px; border-radius: 8px;">Order Confirmed</span>
      </div>

      <!-- Items List -->
      <table class="inv-tbl" style="margin-bottom: 20px;">
        <thead>
          <tr><th>Item Name</th><th>Qty</th><th style="text-align: right;">Amount</th></tr>
        </thead>
        <tbody>
          <tr><td style="font-weight:700;">Chicken Biryani</td><td>× 2</td><td style="text-align: right; font-weight: 500;">₹560</td></tr>
          <tr><td style="font-weight:700;">Paneer Tikka</td><td>× 2</td><td style="text-align: right; font-weight: 500;">₹440</td></tr>
          <tr><td style="font-weight:700;">Butter Naan</td><td>× 4</td><td style="text-align: right; font-weight: 500;">₹240</td></tr>
          <tr><td style="font-weight:700;">Fresh Lime Soda</td><td>× 3</td><td style="text-align: right; font-weight: 500;">₹270</td></tr>
          <tr><td style="font-weight:700;">Gulab Jamun</td><td>× 2</td><td style="text-align: right; font-weight: 500;">₹160</td></tr>
        </tbody>
      </table>

      <!-- Special Notes -->
      <div style="background: var(--amber-bg); border-left: 3px solid var(--amber); padding: 12px 16px; border-radius: 8px; font-size: 13px; color: var(--amber-text); font-weight: 700; margin-bottom: 20px;">
        Special Preparation Notes: <strong>Less spicy for children • Extra gravy on side • No onion in Paneer Tikka</strong>
      </div>

      <div style="display: flex; justify-content: space-between; align-items: center; padding-top: 14px; border-top: 1px solid var(--line); font-size: 18px; font-weight: 500;">
        <div>Total Order Value:</div>
        <div style="color: var(--br);">₹2,180</div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 10. KITCHEN COORDINATION ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">KITCHEN ROUTING</div>
      <h2>Keep the Kitchen Moving <span class="sf">With the Dining Room.</span></h2>
      <p>Give your service and kitchen teams a connected view of restaurant orders.</p>
    </div>

    <!-- Split Screen Product Visual -->
    <div class="g2" style="gap: 28px;">
      <!-- Left: Order Management -->
      <div class="win" style="padding: 24px;">
        <div style="font-size: 12px; font-weight: 500; color: var(--br); margin-bottom: 8px;">ORDER MANAGEMENT</div>
        <h4 style="font-size: 18px; margin-bottom: 12px;">Table T08 • 6 Guests</h4>
        <div style="padding: 10px; background: var(--bg2); border-radius: 8px; font-size: 13px; margin-bottom: 12px;">
          8 Items Confirmed • Order #ORD-2084
        </div>
        <span style="padding: 4px 12px; border-radius: 6px; background: var(--green-bg); color: var(--green-text); font-size: 12px; font-weight: 500;">Status: Confirmed</span>
      </div>

      <!-- Right: KOT Management -->
      <div class="win" style="padding: 24px; border: 1.5px solid var(--br);">
        <div style="font-size: 12px; font-weight: 500; color: var(--br); margin-bottom: 8px;">KOT KITCHEN DISPLAY</div>
        <h4 style="font-size: 18px; margin-bottom: 12px;">KOT #1048 • Station: Curry & Tandoor</h4>
        <div style="padding: 10px; background: var(--amber-bg); border-radius: 8px; font-size: 13px; color: var(--amber-text); margin-bottom: 12px;">
          8 Items Preparing • Timer: 08:45 min
        </div>
        <span style="padding: 4px 12px; border-radius: 6px; background: var(--br); color: #fff; font-size: 12px; font-weight: 500;">Status: Preparing → Ready</span>
      </div>
    </div>

    <div style="text-align: center; margin-top: 36px;">
      <a href="{{ route('features.kot-management') }}" class="btn p">Explore KOT Management →</a>
    </div>
  </div>
</section>

<!-- ================= 11. WAITER REQUESTS ================= -->
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">TABLE-SIDE ASSISTANCE</div>
      <h2>Make It Easier for Guests <span class="sf">to Ask for Help.</span></h2>
      <p>Give guests a simple way to request assistance while helping your team stay aware of table-side needs.</p>
    </div>

    <div class="g2" style="gap: 36px; align-items: center;">
      <!-- Customer Phone UI -->
      <div style="max-width: 300px; margin: 0 auto; background: #fff; border: 4px solid var(--ink); border-radius: 28px; padding: 18px 14px; box-shadow: var(--shadow-md);">
        <div style="font-size: 12px; font-weight: 500; color: var(--br); margin-bottom: 10px; text-transform: uppercase;">TABLE T08 • NEED ASSISTANCE?</div>
        
        <div style="display: flex; flex-direction: column; gap: 8px;">
          <button style="padding: 10px; border-radius: 8px; border: 1px solid var(--line); background: var(--bg2); font-weight: 700; font-size: 12px; text-align: left; cursor: pointer;">🔔 Call Waiter</button>
          <button style="padding: 10px; border-radius: 8px; border: 1.5px solid var(--br); background: var(--br-light); color: var(--br); font-weight: 500; font-size: 12px; text-align: left; cursor: pointer;">💧 Request Water</button>
          <button style="padding: 10px; border-radius: 8px; border: 1px solid var(--line); background: var(--bg2); font-weight: 700; font-size: 12px; text-align: left; cursor: pointer;">🧾 Request Bill</button>
          <button style="padding: 10px; border-radius: 8px; border: 1px solid var(--line); background: var(--bg2); font-weight: 700; font-size: 12px; text-align: left; cursor: pointer;">💬 Custom Request</button>
        </div>
      </div>

      <!-- Staff Receive Alert Card -->
      <div class="win" style="padding: 28px;">
        <div style="font-size: 12px; font-weight: 500; color: var(--br); margin-bottom: 8px;">STAFF NOTIFICATION REGISTER</div>
        <h3 style="font-size: 20px; margin-bottom: 14px;">TABLE T08 Request Log</h3>

        <div style="padding: 14px; background: var(--br-light); border-left: 4px solid var(--br); border-radius: 8px; font-size: 14px; font-weight: 700; margin-bottom: 16px;">
          Request: <strong style="color: var(--br);">Extra Water</strong> • Status: <span style="color: var(--green-text);">New Alert</span>
        </div>

        <div style="display: flex; gap: 10px; font-size: 12px; font-weight: 500; text-transform: uppercase; color: var(--mute);">
          <span>1. Request</span> <span>→</span>
          <span>2. Notify</span> <span>→</span>
          <span>3. Respond</span> <span>→</span>
          <span style="color: var(--green-text);">4. Complete</span>
        </div>

        <div style="margin-top: 24px;">
          <a href="{{ route('features.waiter-request') }}" class="btn o" style="font-size: 13px; padding: 8px 20px;">Explore Waiter Requests →</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 12. POS & BILLING ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">FAST CHECKOUT</div>
      <h2>Make Checkout Simple <span class="sf">for Every Table.</span></h2>
      <p>Bring orders, tables and billing together so your team can prepare clear bills and complete payments smoothly.</p>
    </div>

    <!-- Realistic POS Interface Card -->
    <div class="win" style="max-width: 680px; margin: 0 auto; padding: 28px; border: 1.5px solid var(--br);">
      <div style="display: flex; justify-content: space-between; align-items: center; padding-bottom: 14px; border-bottom: 1px solid var(--line); margin-bottom: 16px;">
        <div>
          <span style="font-size: 12px; font-weight: 500; color: var(--br);">TABLE T08 • 6 GUESTS</span>
          <h3 style="font-size: 20px;">INVOICE #INV-4092</h3>
        </div>
        <span style="padding: 6px 14px; border-radius: 8px; background: var(--green-bg); color: var(--green-text); font-weight: 500; font-size: 13px;">PAID ✓</span>
      </div>

      <div style="display: flex; flex-direction: column; gap: 8px; font-size: 13.5px; margin-bottom: 16px;">
        <div style="display: flex; justify-content: space-between;"><span>Items Subtotal:</span> <strong>₹2,180</strong></div>
        <div style="display: flex; justify-content: space-between; color: var(--amber-text);"><span>Discount Applied:</span> <strong>-₹100</strong></div>
        <div style="display: flex; justify-content: space-between;"><span>Tax (GST 5%):</span> <strong>+₹104</strong></div>
      </div>

      <div style="display: flex; justify-content: space-between; align-items: center; padding: 14px; background: var(--br-light); border-radius: 10px; font-size: 18px; font-weight: 500; margin-bottom: 16px;">
        <div>Final Paid Amount:</div>
        <div style="color: var(--br);">₹2,184</div>
      </div>

      <div style="display: flex; gap: 8px; justify-content: center; font-size: 12px; font-weight: 700;">
        <span style="padding: 6px 14px; background: #fff; border: 1px solid var(--line); border-radius: 6px;">Cash: ₹500</span>
        <span style="padding: 6px 14px; background: #fff; border: 1px solid var(--line); border-radius: 6px;">UPI / QR: ₹1,684</span>
      </div>

      <div style="text-align: center; margin-top: 24px;">
        <a href="{{ route('features.pos-management') }}" class="btn p" style="font-size: 14px;">Explore POS Management →</a>
      </div>
    </div>
  </div>
</section>

<!-- ================= 13. RESTAURANT OPERATIONS ================= -->
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">SUITE MODULES</div>
      <h2>One Platform for Your <span class="sf">Everyday Restaurant Needs.</span></h2>
      <p>Connect every essential module required to run a successful family restaurant.</p>
    </div>

    <div class="g3">
      <!-- 1 -->
      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 14px;">
          <svg viewBox="0 0 24 24"><path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9"/></svg>
        </div>
        <h4 style="font-size: 18px; margin-bottom: 6px;">Menu Management</h4>
        <p style="font-size: 14px;">Keep dishes, prices, categories and availability updated.</p>
      </div>

      <!-- 2 -->
      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 14px;">
          <svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><line x1="9" y1="3" x2="9" y2="21"/></svg>
        </div>
        <h4 style="font-size: 18px; margin-bottom: 6px;">Table Management</h4>
        <p style="font-size: 14px;">Know which tables are available, reserved or occupied.</p>
      </div>

      <!-- 3 -->
      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 14px;">
          <svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/></svg>
        </div>
        <h4 style="font-size: 18px; margin-bottom: 6px;">Order Management</h4>
        <p style="font-size: 14px;">Manage restaurant orders from one connected workspace.</p>
      </div>

      <!-- 4 -->
      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 14px;">
          <svg viewBox="0 0 24 24"><path d="M6 13.87A4 4 0 017.41 6a5.11 5.11 0 019.18 0A4 4 0 0118 13.87V21H6v-7.13z"/></svg>
        </div>
        <h4 style="font-size: 18px; margin-bottom: 6px;">KOT Management</h4>
        <p style="font-size: 14px;">Keep kitchen orders clear and connected to cooking stations.</p>
      </div>

      <!-- 5 -->
      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 14px;">
          <svg viewBox="0 0 24 24"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="M6 8h12M6 12h8"/></svg>
        </div>
        <h4 style="font-size: 18px; margin-bottom: 6px;">POS Management</h4>
        <p style="font-size: 14px;">Manage fast billing, GST calculations, and split payments.</p>
      </div>

      <!-- 6 -->
      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 14px;">
          <svg viewBox="0 0 24 24"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
        </div>
        <h4 style="font-size: 18px; margin-bottom: 6px;">Reports</h4>
        <p style="font-size: 14px;">Understand sales, orders, payments and restaurant activity.</p>
      </div>
    </div>
  </div>
</section>

<!-- ================= 14. BUSY FAMILY RESTAURANT ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">PEAK HOUR CALM</div>
      <h2>Stay Organized When the <span class="sf">Restaurant Gets Busy.</span></h2>
      <p>Maintain calm, transparent operational control during weekend dinner rushes.</p>
    </div>

    <!-- Busy Atmosphere Showcase -->
    <div style="position: relative; max-width: 1000px; margin: 0 auto;">
      <div style="border-radius: 24px; overflow: hidden; border: 1px solid var(--line); box-shadow: var(--shadow-md);">
        <img src="https://images.unsplash.com/photo-1544025162-d76694265947?auto=format&fit=crop&w=1000&q=80" alt="Busy Indian Family Restaurant Dinner Hour" style="width: 100%; height: 400px; object-fit: cover; display: block;">
      </div>

      <!-- Overlay Operational Dashboard -->
      <div style="position: absolute; bottom: 24px; left: 24px; right: 24px; background: rgba(255,255,255,0.95); backdrop-filter: blur(12px); border-radius: 16px; padding: 18px 24px; border: 1px solid var(--line); box-shadow: var(--shadow-md);">
        <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 14px; text-align: center;">
          <div>
            <div style="font-size: 11px; font-weight: 500; color: var(--mute);">OCCUPIED TABLES</div>
            <div style="font-size: 24px; font-weight: 500; color: var(--ink); margin-top: 2px;">08</div>
          </div>
          <div>
            <div style="font-size: 11px; font-weight: 500; color: var(--mute);">ACTIVE ORDERS</div>
            <div style="font-size: 24px; font-weight: 500; color: var(--br); margin-top: 2px;">18</div>
          </div>
          <div>
            <div style="font-size: 11px; font-weight: 500; color: var(--amber-text);">KITCHEN PREP</div>
            <div style="font-size: 24px; font-weight: 500; color: var(--amber-text); margin-top: 2px;">06 KOTs</div>
          </div>
          <div>
            <div style="font-size: 11px; font-weight: 500; color: var(--green-text);">PAYMENTS PENDING</div>
            <div style="font-size: 24px; font-weight: 500; color: var(--green-text); margin-top: 2px;">04</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 15. COMPLETE WORKFLOW ================= -->
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">END-TO-END PIPELINE</div>
      <h2>Connect Every Step of the <span class="sf">Dining Experience.</span></h2>
      <p>Geni Menu serves as the single unified platform connecting all guest and kitchen interactions.</p>
    </div>

    <!-- Complete Workflow Grid -->
    <div class="win" style="max-width: 1040px; margin: 0 auto; padding: 32px;">
      <div style="display: flex; flex-direction: column; gap: 16px;">
        <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 10px; font-size: 12px; font-weight: 500; text-align: center;">
          <span style="padding: 10px 14px; background: var(--bg2); border-radius: 8px;">1. GUEST ARRIVES</span>
          <span style="color: var(--br);">→</span>
          <span style="padding: 10px 14px; background: var(--bg2); border-radius: 8px;">2. TABLE ASSIGNED</span>
          <span style="color: var(--br);">→</span>
          <span style="padding: 10px 14px; background: var(--bg2); border-radius: 8px;">3. MENU VIEWED</span>
          <span style="color: var(--br);">→</span>
          <span style="padding: 10px 14px; background: var(--bg2); border-radius: 8px;">4. ORDER PLACED</span>
        </div>

        <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 10px; font-size: 12px; font-weight: 500; text-align: center;">
          <span style="padding: 10px 14px; background: var(--bg2); border-radius: 8px;">5. KOT CREATED</span>
          <span style="color: var(--br);">→</span>
          <span style="padding: 10px 14px; background: var(--bg2); border-radius: 8px;">6. KITCHEN PREPARES</span>
          <span style="color: var(--br);">→</span>
          <span style="padding: 10px 14px; background: var(--bg2); border-radius: 8px;">7. FOOD SERVED</span>
          <span style="color: var(--br);">→</span>
          <span style="padding: 10px 14px; background: var(--bg2); border-radius: 8px;">8. WAITER REQUEST</span>
        </div>

        <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 10px; font-size: 12px; font-weight: 500; text-align: center;">
          <span style="padding: 10px 14px; background: var(--bg2); border-radius: 8px;">9. BILL GENERATED</span>
          <span style="color: var(--br);">→</span>
          <span style="padding: 10px 14px; background: var(--green-bg); color: var(--green-text); border-radius: 8px;">10. PAYMENT COMPLETED</span>
          <span style="color: var(--br);">→</span>
          <span style="padding: 10px 14px; background: var(--br); color: #fff; border-radius: 8px;">11. CENTRAL REPORT</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 16. BUSINESS VISIBILITY ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">BUSINESS REPORTS</div>
      <h2>Know What Is Happening <span class="sf">Across Your Restaurant.</span></h2>
      <p>Understand sales, orders, payments and menu activity from one connected reporting view.</p>
    </div>

    <!-- Reports Dashboard Card -->
    <div class="win" style="max-width: 960px; margin: 0 auto; padding: 28px;">
      <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 12px; margin-bottom: 24px; text-align: center;">
        <div style="background: #fff; padding: 14px; border-radius: 12px; border: 1px solid var(--line);">
          <div style="font-size: 10px; font-weight: 500; color: var(--mute);">TODAY'S SALES</div>
          <div style="font-size: 22px; font-weight: 500; color: var(--br); font-family: 'Outfit', sans-serif; margin-top: 2px;">₹48,620</div>
        </div>
        <div style="background: #fff; padding: 14px; border-radius: 12px; border: 1px solid var(--line);">
          <div style="font-size: 10px; font-weight: 500; color: var(--mute);">ORDERS</div>
          <div style="font-size: 22px; font-weight: 500; color: var(--ink); font-family: 'Outfit', sans-serif; margin-top: 2px;">186</div>
        </div>
        <div style="background: #fff; padding: 14px; border-radius: 12px; border: 1px solid var(--line);">
          <div style="font-size: 10px; font-weight: 500; color: var(--mute);">AVG ORDER</div>
          <div style="font-size: 22px; font-weight: 500; color: var(--ink); font-family: 'Outfit', sans-serif; margin-top: 2px;">₹261</div>
        </div>
        <div style="background: #fff; padding: 14px; border-radius: 12px; border: 1px solid var(--line);">
          <div style="font-size: 10px; font-weight: 500; color: var(--mute);">PAYMENTS</div>
          <div style="font-size: 22px; font-weight: 500; color: var(--green-text); font-family: 'Outfit', sans-serif; margin-top: 2px;">₹45,280</div>
        </div>
      </div>

      <!-- Top Items & Channel Split -->
      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; font-size: 13px;">
        <div style="background: #fff; padding: 16px; border-radius: 12px; border: 1px solid var(--line);">
          <div style="font-size: 11px; font-weight: 500; color: var(--br); margin-bottom: 8px;">TOP DISHES TODAY</div>
          <div>Chicken Biryani: <strong>142 Orders</strong></div>
          <div>Margherita Pizza: <strong>96 Orders</strong></div>
          <div>Cold Coffee: <strong>84 Orders</strong></div>
        </div>

        <div style="background: #fff; padding: 16px; border-radius: 12px; border: 1px solid var(--line);">
          <div style="font-size: 11px; font-weight: 500; color: var(--br); margin-bottom: 8px;">ORDER TYPES</div>
          <div>Dine-in: <strong>58%</strong> | Takeaway: <strong>22%</strong></div>
          <div>Delivery: <strong>14%</strong> | Pickup: <strong>6%</strong></div>
        </div>
      </div>

      <div style="text-align: center; margin-top: 24px;">
        <a href="{{ route('features.reports') }}" class="btn p" style="font-size: 14px;">Explore Reports →</a>
      </div>
    </div>
  </div>
</section>

<!-- ================= 17. RESTAURANT FORMATS ================= -->
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">FAMILY DINING FORMATS</div>
      <h2>Built for Different <span class="sf">Family Dining Formats.</span></h2>
      <p>Whether you operate a single Indian family restaurant or a multi-branch casual dining chain.</p>
    </div>

    <div class="ind-grid">
      <!-- 1 -->
      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&w=600&q=80');">
          <div class="ind-overlay"></div>
          <div class="ind-icon"><svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/></svg></div>
        </div>
        <div class="ind-content">
          <h4>Family Restaurants</h4>
          <p>Manage large dining groups, multi-item tickets, and table seating.</p>
        </div>
      </div>

      <!-- 2 -->
      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1618160702438-9b02ab6515c9?auto=format&fit=crop&w=600&q=80');">
          <div class="ind-overlay"></div>
          <div class="ind-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"/></svg></div>
        </div>
        <div class="ind-content">
          <h4>Multi-Cuisine Restaurants</h4>
          <p>Organize varied menus across Indian, Chinese, Tandoori, and Continental.</p>
        </div>
      </div>

      <!-- 3 -->
      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1585937421612-70a008356fbe?auto=format&fit=crop&w=600&q=80');">
          <div class="ind-overlay"></div>
          <div class="ind-icon"><svg viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg></div>
        </div>
        <div class="ind-content">
          <h4>Indian Restaurants</h4>
          <p>Handle classic thalis, biryani orders, and special dining requests.</p>
        </div>
      </div>

      <!-- 4 -->
      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1630383249896-424e482df921?auto=format&fit=crop&w=600&q=80');">
          <div class="ind-overlay"></div>
          <div class="ind-icon"><svg viewBox="0 0 24 24"><path d="M12 2a10 10 0 100 20 10 10 0 000-20z"/></svg></div>
        </div>
        <div class="ind-content">
          <h4>South Indian Restaurants</h4>
          <p>Manage high-turnover tiffins, dosas, and filter coffee orders.</p>
        </div>
      </div>

      <!-- 5 -->
      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1544025162-d76694265947?auto=format&fit=crop&w=600&q=80');">
          <div class="ind-overlay"></div>
          <div class="ind-icon"><svg viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/></svg></div>
        </div>
        <div class="ind-content">
          <h4>North Indian Restaurants</h4>
          <p>Coordinate tandoor bread, curries, and family platter orders.</p>
        </div>
      </div>

      <!-- 6 -->
      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1512621776951-a57141f2eefd?auto=format&fit=crop&w=600&q=80');">
          <div class="ind-overlay"></div>
          <div class="ind-icon"><svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></div>
        </div>
        <div class="ind-content">
          <h4>Vegetarian & Non-Veg Outlets</h4>
          <p>Maintain separate kitchen order tickets and item indicators.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 18. WHY GENI MENU ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">KEY ADVANTAGES</div>
      <h2>Built Around the Way <span class="sf">Family Restaurants Work.</span></h2>
      <p>Simple, reliable technology tailored specifically for high-volume dining operations.</p>
    </div>

    <div class="g3">
      <!-- 1 -->
      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 14px;"><svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/></svg></div>
        <h4 style="font-size: 18px; margin-bottom: 6px;">Easy for Staff</h4>
        <p style="font-size: 14px;">Simple workflows for everyday restaurant staff operations.</p>
      </div>

      <!-- 2 -->
      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 14px;"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><line x1="9" y1="3" x2="9" y2="21"/></svg></div>
        <h4 style="font-size: 18px; margin-bottom: 6px;">Better Table Visibility</h4>
        <p style="font-size: 14px;">Know what is happening across your entire dining floor.</p>
      </div>

      <!-- 3 -->
      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 14px;"><svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/></svg></div>
        <h4 style="font-size: 18px; margin-bottom: 6px;">Organized Large Orders</h4>
        <p style="font-size: 14px;">Keep family and group orders clear from table to kitchen.</p>
      </div>

      <!-- 4 -->
      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 14px;"><svg viewBox="0 0 24 24"><path d="M12 2a10 10 0 100 20 10 10 0 000-20z"/></svg></div>
        <h4 style="font-size: 18px; margin-bottom: 6px;">Connected Operations</h4>
        <p style="font-size: 14px;">Bring menu, tables, orders, kitchen and billing together.</p>
      </div>

      <!-- 5 -->
      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 14px;"><svg viewBox="0 0 24 24"><path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9"/></svg></div>
        <h4 style="font-size: 18px; margin-bottom: 6px;">Better Guest Experience</h4>
        <p style="font-size: 14px;">Make every stage of the family dining journey easier to manage.</p>
      </div>

      <!-- 6 -->
      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 14px;"><svg viewBox="0 0 24 24"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></div>
        <h4 style="font-size: 18px; margin-bottom: 6px;">Business Visibility</h4>
        <p style="font-size: 14px;">Understand restaurant activity through connected reports.</p>
      </div>
    </div>
  </div>
</section>

<!-- ================= 19. CONNECTED ECOSYSTEM ================= -->
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">CONNECTED ECOSYSTEM</div>
      <h2>The Connected <span class="sf">Restaurant Platform.</span></h2>
      <p>Geni Menu brings together your menu, tables, orders, kitchen display, billing, inventory, and analytics.</p>
    </div>

    <!-- Node Diagram -->
    <div style="max-width: 900px; margin: 0 auto; background: var(--bg2); padding: 40px 24px; border-radius: 24px; border: 1px solid var(--line); text-align: center;">
      <div style="width: 180px; height: 180px; border-radius: 50%; background: linear-gradient(135deg, #876039 0%, #a87646 100%); color: #fff; display: flex; flex-direction: column; align-items: center; justify-content: center; margin: 0 auto 36px; box-shadow: 0 10px 30px rgba(135,96,57,0.3); border: 4px solid #fff;">
        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
        <div style="font-size: 14px; font-weight: 500; margin-top: 6px;">FAMILY</div>
        <div style="font-size: 10px; opacity: 0.9;">RESTAURANT PLATFORM</div>
      </div>

      <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 12px; font-size: 12.5px; font-weight: 700;">
        <div style="background: #fff; padding: 12px; border-radius: 12px; border: 1px solid var(--line);">Menu Management</div>
        <div style="background: #fff; padding: 12px; border-radius: 12px; border: 1px solid var(--line);">Table Management</div>
        <div style="background: #fff; padding: 12px; border-radius: 12px; border: 1px solid var(--line);">Reservations</div>
        <div style="background: #fff; padding: 12px; border-radius: 12px; border: 1px solid var(--line);">Waiter Requests</div>
        <div style="background: #fff; padding: 12px; border-radius: 12px; border: 1px solid var(--line);">Order Management</div>
        <div style="background: #fff; padding: 12px; border-radius: 12px; border: 1px solid var(--line);">KOT Management</div>
        <div style="background: #fff; padding: 12px; border-radius: 12px; border: 1px solid var(--line);">POS Billing</div>
        <div style="background: #fff; padding: 12px; border-radius: 12px; border: 1px solid var(--line);">Reports & Analytics</div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 21. MOBILE EXPERIENCE ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">RESPONSIVE ACCESSIBILITY</div>
      <h2>Restaurant Management <span class="sf">Wherever You Work.</span></h2>
      <p>Monitor dining room tables, active tickets, and payments from your mobile device or tablet.</p>
    </div>

    <!-- Responsive Device Showcase -->
    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 32px; align-items: center; max-width: 1040px; margin: 0 auto;">
      <!-- Desktop Dashboard View -->
      <div class="win" style="padding: 20px;">
        <div class="wb" style="margin: -20px -20px 16px; padding: 10px 16px;">
          <div class="dots"><i></i><i></i><i></i></div>
          <div class="ttl">DESKTOP MANAGEMENT WORKSPACE</div>
        </div>
        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px; font-size: 12px; text-align: center;">
          <div style="background: var(--bg2); padding: 10px; border-radius: 8px;">Tables: <strong>12 Avail / 08 Occ</strong></div>
          <div style="background: var(--bg2); padding: 10px; border-radius: 8px;">Active Orders: <strong>18</strong></div>
          <div style="background: var(--bg2); padding: 10px; border-radius: 8px;">Pending Bills: <strong>04</strong></div>
        </div>
      </div>

      <!-- Mobile UI View -->
      <div style="background: #fff; border: 4px solid var(--ink); border-radius: 28px; padding: 18px 14px; box-shadow: var(--shadow-md);">
        <div style="width: 50px; height: 4px; background: #ccc; border-radius: 2px; margin: 0 auto 14px;"></div>
        <div style="font-size: 11px; font-weight: 500; color: var(--br); margin-bottom: 8px; text-transform: uppercase;">MOBILE FLOOR STATUS</div>

        <div style="display: flex; flex-direction: column; gap: 8px; font-size: 12px;">
          <div style="padding: 8px 10px; background: var(--green-bg); color: var(--green-text); border-radius: 6px; font-weight: 700;">T01 • Available (2 Seats)</div>
          <div style="padding: 8px 10px; background: var(--br-light); color: var(--br); border-radius: 6px; font-weight: 700;">T02 • Occupied (4 Guests)</div>
          <div style="padding: 8px 10px; background: var(--amber-bg); color: var(--amber-text); border-radius: 6px; font-weight: 700;">T03 • Reserved (6 Guests)</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 22. FINAL VALUE SECTION ================= -->
<section>
  <div class="w">
    <div style="max-width: 900px; margin: 0 auto; background: var(--bg2); border: 1.5px solid var(--br); border-radius: 24px; padding: 40px 32px; text-align: center;">
      <h2 style="font-size: 32px; margin-bottom: 16px;">Your Restaurant Is More Than a Menu.</h2>
      <p style="font-size: 17px; max-width: 680px; margin: 0 auto 28px;">
        Every table, order, kitchen ticket, payment and customer interaction is part of one dining experience. Geni Menu helps bring those operations together.
      </p>

      <div style="display: flex; gap: 12px; justify-content: center; flex-wrap: wrap; font-size: 14px; font-weight: 500; color: var(--br); margin-bottom: 28px;">
        <span>MENU</span> <span>+</span>
        <span>TABLES</span> <span>+</span>
        <span>ORDERS</span> <span>+</span>
        <span>KITCHEN</span> <span>+</span>
        <span>BILLING</span> <span>+</span>
        <span>REPORTS</span>
      </div>

      <a href="{{ route('restaurant_signup') }}" onclick="if(typeof openPopup === 'function'){ openPopup(); return false; }" class="btn p" style="padding: 14px 32px; font-size: 16px;">Run Your Restaurant Smarter →</a>
    </div>
  </div>
</section>

<!-- ================= 23. FAQ ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">FREQUENTLY ASKED QUESTIONS</div>
      <h2>Family Restaurant Solution <span class="sf">FAQ.</span></h2>
      <p>Common questions about managing family restaurants with Geni Menu.</p>
    </div>

    <div class="faq-list">
      <!-- Q1 -->
      <div class="faq-item open">
        <div class="faq-q" onclick="toggleFaq(this)">
          1. Is Geni Menu suitable for family restaurants?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Geni Menu is built to handle the operational flow of family restaurants, connecting table management, multi-item order routing, kitchen tickets, and fast POS billing into one system.
        </div>
      </div>

      <!-- Q2 -->
      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          2. Can family restaurants manage different table sizes?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. The visual floor plan lets managers configure tables for 2, 4, 6, 8, or 10+ guests with real-time occupancy status.
        </div>
      </div>

      <!-- Q3 -->
      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          3. Can large family orders be managed?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Large orders with multiple dishes, quantities, and preparation notes (like spice levels or gravy preferences) are logged clearly.
        </div>
      </div>

      <!-- Q4 -->
      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          4. Can dine-in orders be connected to tables?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Every order is mapped directly to a specific table ID so staff always know where items should be served.
        </div>
      </div>

      <!-- Q5 -->
      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          5. Can guests access the digital menu?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Guests can scan table QR codes to browse categories, dish images, and prices on their mobile phones.
        </div>
      </div>

      <!-- Q6 -->
      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          6. Can customers request waiter assistance?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Guests can request water, the bill, or general assistance from their table, sending alerts to floor staff.
        </div>
      </div>

      <!-- Q7 -->
      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          7. Does Geni Menu connect orders with the kitchen?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Orders generate Kitchen Order Tickets (KOT) sent instantly to kitchen display monitors or printed receipts.
        </div>
      </div>

      <!-- Q8 -->
      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          8. Can family restaurants manage billing and payments?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. POS billing handles discounts, GST tax, invoices, and payment completion via Cash, Card, or UPI.
        </div>
      </div>

      <!-- Q9 -->
      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          9. Can restaurant owners view sales and order reports?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Comprehensive reports display total sales, order volume, peak hours, and top-selling dishes.
        </div>
      </div>

      <!-- Q10 -->
      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          10. Can Geni Menu support multi-branch family restaurants?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Multi-branch restaurants can view sales and performance across different branch locations from a central dashboard.
        </div>
      </div>

      <!-- Q11 -->
      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          11. Can Geni Menu work for vegetarian and non-vegetarian restaurants?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Menus support vegetarian/non-vegetarian tags and separate kitchen routing if required.
        </div>
      </div>

      <!-- Q12 -->
      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          12. Can Geni Menu be used by small family restaurants?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Geni Menu is flexible and straightforward, making it accessible for small family eateries as well as larger dining halls.
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 24. FINAL CTA ================= -->
<section style="padding: 100px 0; background: linear-gradient(135deg, #FAF4ED 0%, #EFE4D6 50%, #FAF4ED 100%); color: #21160F; position: relative; overflow: hidden; border-top: 1px solid rgba(135, 96, 57, 0.16);">
  <div style="position: absolute; inset: 0; background: radial-gradient(circle at right center, rgba(135,96,57,0.12) 0%, transparent 60%); pointer-events: none;"></div>

  <div class="w" style="text-align: center; position: relative; z-index: 1;">
    <div class="eb" style="background: rgba(135, 96, 57, 0.1); border-color: rgba(135, 96, 57, 0.2); color: #876039; margin-bottom: 24px;">
      READY TO TRANSFORM YOUR RESTAURANT?
    </div>

    <h2 style="color: #21160F; font-size: clamp(32px, 4.5vw, 52px); margin-bottom: 20px;">
      Run Your Family Restaurant <span style="color: #876039; font-family: 'Playfair Display', serif; font-style: italic;">With More Clarity.</span>
    </h2>

    <p style="color: #6E6157; font-size: 18px; max-width: 640px; margin: 0 auto 36px;">
      Bring your menu, tables, orders, kitchen, billing and restaurant operations together with Geni Menu.
    </p>

    <div style="display: flex; gap: 16px; justify-content: center; flex-wrap: wrap;">
      <a href="{{ route('restaurant_signup') }}" onclick="if(typeof openPopup === 'function'){ openPopup(); return false; }" class="btn p" style="padding: 16px 36px; font-size: 16px; background: #876039; color: #fff;">Get Started →</a>
      <a href="{{ route('contact.us') }}" class="btn o" style="padding: 16px 36px; font-size: 16px; background: #fff; color: #876039; border: 1.5px solid #876039;">Book a Demo</a>
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
