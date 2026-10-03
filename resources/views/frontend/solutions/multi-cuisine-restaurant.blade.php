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
    <span class="cur">Multi-Cuisine Restaurant Solution</span>
  </div>
</div>

<!-- ================= HERO SECTION ================= -->
<section style="padding: 60px 0 80px; background: linear-gradient(180deg, var(--bg2) 0%, #ffffff 100%); border-bottom: 1px solid var(--line);">
  <div class="w">
    <div class="g2" style="gap: 50px; align-items: center;">
      <!-- Hero Left Text -->
      <div>
        <div class="eb">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
          MULTI-CUISINE RESTAURANT SOLUTION
        </div>
        <h1 style="margin-bottom: 20px;">
          One Restaurant. Many Cuisines. <br><span class="sf">One Connected Platform.</span>
        </h1>
        <p style="font-size: 19px; margin-bottom: 32px; color: var(--mute);">
          Manage diverse menus, table orders, kitchen workflows, billing and restaurant operations from one powerful platform built for multi-cuisine dining rooms.
        </p>
        <div style="display: flex; gap: 16px; align-items: center; flex-wrap: wrap;">
          <a href="{{ route('restaurant_signup') }}" class="btn p" style="padding: 16px 36px; font-size: 16px;">Get Started →</a>
          <a href="{{ route('contact.us') }}" class="btn o" style="padding: 16px 32px; font-size: 16px;">Book a Demo →</a>
        </div>

        <!-- Multi-cuisine pill badges -->
        <div style="margin-top: 32px; display: flex; gap: 10px; flex-wrap: wrap;">
          <span style="background: var(--bg3); border: 1px solid var(--line); color: var(--br-dark); font-size: 12px; font-weight: 800; padding: 6px 14px; border-radius: 99px;">🇮🇳 Indian & Tandoor</span>
          <span style="background: var(--bg3); border: 1px solid var(--line); color: var(--br-dark); font-size: 12px; font-weight: 800; padding: 6px 14px; border-radius: 99px;">🥢 Chinese & Asian</span>
          <span style="background: var(--bg3); border: 1px solid var(--line); color: var(--br-dark); font-size: 12px; font-weight: 800; padding: 6px 14px; border-radius: 99px;">🍕 Italian & Continental</span>
          <span style="background: var(--bg3); border: 1px solid var(--line); color: var(--br-dark); font-size: 12px; font-weight: 800; padding: 6px 14px; border-radius: 99px;">🍹 Mocktails & Desserts</span>
        </div>
      </div>

      <!-- Hero Right Visual Overlay -->
      <div style="position: relative;">
        <div style="border-radius: 24px; overflow: hidden; box-shadow: var(--shadow-lg); border: 1px solid var(--line); position: relative; background: #241a14;">
          <img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?auto=format&fit=crop&w=1200&q=80" alt="Multi Cuisine Restaurant Operations" style="width: 100%; height: 450px; object-fit: cover; opacity: 0.88; display: block;">
          
          <!-- Multi-Cuisine Live Dashboard Overlay -->
          <div style="position: absolute; bottom: 20px; left: 20px; right: 20px; background: rgba(255, 255, 255, 0.96); backdrop-filter: blur(12px); border-radius: 16px; padding: 18px; border: 1px solid var(--line); box-shadow: var(--shadow-md);">
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px; border-bottom: 1px solid var(--line); padding-bottom: 10px;">
              <div style="font-weight: 800; font-size: 14px; color: var(--ink); display: flex; align-items: center; gap: 8px;">
                <span style="width: 10px; height: 10px; border-radius: 50%; background: var(--green); display: inline-block;"></span>
                MULTI-CUISINE OPERATIONS MONITOR
              </div>
              <span style="font-size: 12px; font-weight: 700; color: var(--br);">Table T08 · 6 Guests</span>
            </div>
            
            <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 10px; text-align: center;">
              <div style="background: var(--bg2); padding: 8px; border-radius: 10px; border: 1px solid var(--line);">
                <div style="font-size: 11px; font-weight: 700; color: var(--mute);">INDIAN KITCHEN</div>
                <div style="font-size: 14px; font-weight: 800; color: var(--br);">04 Items Prep</div>
              </div>
              <div style="background: var(--bg2); padding: 8px; border-radius: 10px; border: 1px solid var(--line);">
                <div style="font-size: 11px; font-weight: 700; color: var(--mute);">CHINESE WOK</div>
                <div style="font-size: 14px; font-weight: 800; color: var(--amber);">02 Items Prep</div>
              </div>
              <div style="background: var(--bg2); padding: 8px; border-radius: 10px; border: 1px solid var(--line);">
                <div style="font-size: 11px; font-weight: 700; color: var(--mute);">PIZZA STATION</div>
                <div style="font-size: 14px; font-weight: 800; color: var(--green-text);">01 Item Ready</div>
              </div>
              <div style="background: var(--bg2); padding: 8px; border-radius: 10px; border: 1px solid var(--line);">
                <div style="font-size: 11px; font-weight: 700; color: var(--mute);">BAR & DESSERTS</div>
                <div style="font-size: 14px; font-weight: 800; color: var(--blue);">03 Items Ready</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 1: BUILT FOR MULTI-CUISINE OPERATIONS ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">ENTERPRISE CONTROL</div>
      <h2>Manage Every Cuisine With Clarity.</h2>
      <p>From menu organization to table service, kitchen coordination and billing, Geni Menu brings your entire multi-cuisine operation into one connected workspace.</p>
    </div>

    <div class="g4">
      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 16px;">
          <svg viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
        </div>
        <h3 style="font-size: 17px; margin-bottom: 8px;">Multi-Cuisine Menu</h3>
        <p style="font-size: 13.5px;">Organize dishes across cuisines, categories, prices and availability without menu confusion.</p>
      </div>

      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 16px;">
          <svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><line x1="9" y1="3" x2="9" y2="21"/><line x1="15" y1="3" x2="15" y2="21"/></svg>
        </div>
        <h3 style="font-size: 17px; margin-bottom: 8px;">Table Management</h3>
        <p style="font-size: 13.5px;">Know which tables are available, reserved, occupied or being cleaned across all dining areas.</p>
      </div>

      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 16px;">
          <svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/></svg>
        </div>
        <h3 style="font-size: 17px; margin-bottom: 8px;">Order Management</h3>
        <p style="font-size: 13.5px;">Keep orders from different cuisines organized in one single table order workspace.</p>
      </div>

      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 16px;">
          <svg viewBox="0 0 24 24"><path d="M6 13.87A4 4 0 017.41 6a5.11 5.11 0 019.18 0A4 4 0 0118 13.87V21H6v-7.13z"/></svg>
        </div>
        <h3 style="font-size: 17px; margin-bottom: 8px;">KOT Management</h3>
        <p style="font-size: 14.5px;">Keep kitchen order tickets clear, routed and easy for preparation teams to follow.</p>
      </div>

      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 16px;">
          <svg viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
        </div>
        <h3 style="font-size: 17px; margin-bottom: 8px;">Kitchen Operations</h3>
        <p style="font-size: 13.5px;">Keep different kitchen station workflows organized during busy lunch and dinner rushes.</p>
      </div>

      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 16px;">
          <svg viewBox="0 0 24 24"><rect x="2" y="4" width="20" height="16" rx="2"/><line x1="6" y1="8" x2="18" y2="8"/><line x1="6" y1="12" x2="14" y2="12"/></svg>
        </div>
        <h3 style="font-size: 17px; margin-bottom: 8px;">POS & Billing</h3>
        <p style="font-size: 13.5px;">Handle complex multi-cuisine bills, discounts and taxes from one connected POS terminal.</p>
      </div>

      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 16px;">
          <svg viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"/></svg>
        </div>
        <h3 style="font-size: 17px; margin-bottom: 8px;">Inventory Management</h3>
        <p style="font-size: 13.5px;">Keep track of diverse raw ingredients and stock levels across all your food preparation counters.</p>
      </div>

      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 16px;">
          <svg viewBox="0 0 24 24"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
        </div>
        <h3 style="font-size: 17px; margin-bottom: 8px;">Reports & Insights</h3>
        <p style="font-size: 13.5px;">Understand revenue breakdown, top-selling cuisines and category performance with live reports.</p>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 2: ONE MENU. EVERY CUISINE. ================= -->
<section style="background: var(--bg);">
  <div class="w">
    <div class="hd">
      <div class="eb">MULTI-CUISINE MENU EXPERIENCE</div>
      <h2>One Menu. Every Cuisine.</h2>
      <p>Give customers an easy way to explore everything your restaurant offers without making the menu feel complicated.</p>
    </div>

    <!-- Cuisine Tabs Preview -->
    <div class="win" style="padding: 28px; max-width: 1060px; margin: 0 auto;">
      <div style="display: flex; gap: 12px; border-bottom: 1px solid var(--line); padding-bottom: 16px; margin-bottom: 24px; overflow-x: auto;">
        <span style="background: var(--br); color: #fff; font-size: 13px; font-weight: 800; padding: 8px 18px; border-radius: 99px;">🇮🇳 Indian</span>
        <span style="background: var(--bg2); color: var(--ink); font-size: 13px; font-weight: 700; padding: 8px 18px; border-radius: 99px; border: 1px solid var(--line);">🥢 Chinese</span>
        <span style="background: var(--bg2); color: var(--ink); font-size: 13px; font-weight: 700; padding: 8px 18px; border-radius: 99px; border: 1px solid var(--line);">🍕 Italian</span>
        <span style="background: var(--bg2); color: var(--ink); font-size: 13px; font-weight: 700; padding: 8px 18px; border-radius: 99px; border: 1px solid var(--line);">🥗 Continental</span>
        <span style="background: var(--bg2); color: var(--ink); font-size: 13px; font-weight: 700; padding: 8px 18px; border-radius: 99px; border: 1px solid var(--line);">🍹 Beverages</span>
        <span style="background: var(--bg2); color: var(--ink); font-size: 13px; font-weight: 700; padding: 8px 18px; border-radius: 99px; border: 1px solid var(--line);">🍰 Desserts</span>
      </div>

      <div class="g3">
        <div style="background: var(--bg2); border-radius: 14px; padding: 16px; border: 1px solid var(--line);">
          <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 8px;">
            <strong style="font-size: 16px; color: var(--ink);">Chicken Dum Biryani</strong>
            <span style="font-weight: 800; color: var(--br); font-size: 15px;">₹320</span>
          </div>
          <p style="font-size: 12.5px; color: var(--mute);">Aromatic Basmati rice slow-cooked with tender chicken and authentic spices.</p>
          <div style="margin-top: 12px; display: flex; justify-content: space-between; align-items: center;">
            <span style="font-size: 11px; font-weight: 800; color: var(--green-text); background: var(--green-bg); padding: 2px 8px; border-radius: 99px;">INDIAN MAIN</span>
            <span style="font-size: 12px; font-weight: 700; color: var(--br);">In Stock</span>
          </div>
        </div>

        <div style="background: var(--bg2); border-radius: 14px; padding: 16px; border: 1px solid var(--line);">
          <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 8px;">
            <strong style="font-size: 16px; color: var(--ink);">Veg Hakka Noodles</strong>
            <span style="font-weight: 800; color: var(--br); font-size: 15px;">₹240</span>
          </div>
          <p style="font-size: 12.5px; color: var(--mute);">Wok-tossed noodles with crisp bell peppers, cabbage and Indo-Chinese sauces.</p>
          <div style="margin-top: 12px; display: flex; justify-content: space-between; align-items: center;">
            <span style="font-size: 11px; font-weight: 800; color: var(--amber-text); background: var(--amber-bg); padding: 2px 8px; border-radius: 99px;">CHINESE WOK</span>
            <span style="font-size: 12px; font-weight: 700; color: var(--br);">In Stock</span>
          </div>
        </div>

        <div style="background: var(--bg2); border-radius: 14px; padding: 16px; border: 1px solid var(--line);">
          <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 8px;">
            <strong style="font-size: 16px; color: var(--ink);">Margherita Pizza</strong>
            <span style="font-weight: 800; color: var(--br); font-size: 15px;">₹380</span>
          </div>
          <p style="font-size: 12.5px; color: var(--mute);">Wood-fired thin crust topped with fresh mozzarella, San Marzano tomato sauce & basil.</p>
          <div style="margin-top: 12px; display: flex; justify-content: space-between; align-items: center;">
            <span style="font-size: 11px; font-weight: 800; color: #1e40af; background: #dbeafe; padding: 2px 8px; border-radius: 99px;">ITALIAN PIZZA</span>
            <span style="font-size: 12px; font-weight: 700; color: var(--br);">In Stock</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 3: ORGANIZE YOUR MENU ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="g2" style="gap: 50px; align-items: center;">
      <div>
        <div class="eb">STRUCTURED HIERARCHY</div>
        <h2 style="margin-bottom: 18px;">Keep Every Dish Easy to Find.</h2>
        <p style="margin-bottom: 24px;">
          Geni Menu structures complex menus logically so stewards and guests never get confused by large food selections.
        </p>

        <!-- Hierarchy Diagram -->
        <div style="background: #fff; padding: 20px; border-radius: 14px; border: 1px solid var(--line); display: flex; flex-direction: column; gap: 10px; font-size: 14px;">
          <div style="display: flex; align-items: center; gap: 10px; color: var(--br); font-weight: 800;">
            <span>CUISINE</span>
            <span style="color: var(--mute);">→</span>
            <span>CATEGORY</span>
            <span style="color: var(--mute);">→</span>
            <span>DISH</span>
            <span style="color: var(--mute);">→</span>
            <span>PRICE & AVAILABILITY</span>
          </div>
          <div style="border-top: 1px dashed var(--line); padding-top: 8px; font-size: 13px; color: var(--mute);">
            Example: Indian → Main Course → Chicken Biryani → ₹320 → Available
          </div>
          <div style="font-size: 13px; color: var(--mute);">
            Example: Chinese → Noodles → Veg Hakka Noodles → ₹240 → Available
          </div>
        </div>
      </div>

      <div class="win" style="padding: 24px;">
        <h4 style="font-size: 15px; margin-bottom: 14px; border-bottom: 1px solid var(--line); padding-bottom: 10px;">MENU MANAGEMENT DASHBOARD</h4>
        <div style="display: flex; flex-direction: column; gap: 10px;">
          <div style="display: flex; justify-content: space-between; align-items: center; background: var(--bg2); padding: 10px 14px; border-radius: 8px;">
            <span>🇮🇳 Indian · Main Course</span>
            <strong style="color: var(--green-text);">18 Dishes Active</strong>
          </div>
          <div style="display: flex; justify-content: space-between; align-items: center; background: var(--bg2); padding: 10px 14px; border-radius: 8px;">
            <span>🥢 Chinese · Wok & Starters</span>
            <strong style="color: var(--green-text);">14 Dishes Active</strong>
          </div>
          <div style="display: flex; justify-content: space-between; align-items: center; background: var(--bg2); padding: 10px 14px; border-radius: 8px;">
            <span>🍕 Italian · Wood-fired Pizza</span>
            <strong style="color: var(--green-text);">10 Dishes Active</strong>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 4: TABLE MANAGEMENT ================= -->
<section style="background: var(--bg);">
  <div class="w">
    <div class="g2" style="gap: 50px; align-items: center;">
      <!-- Floor Plan Mockup -->
      <div class="win" style="padding: 24px;">
        <div style="display: flex; justify-content: space-between; margin-bottom: 16px; border-bottom: 1px solid var(--line); padding-bottom: 10px;">
          <strong style="font-size: 15px;">DINING FLOOR OVERVIEW</strong>
          <span style="font-size: 12px; font-weight: 700; color: var(--br);">8 Tables Active</span>
        </div>
        <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 12px;">
          <div style="background: var(--bg2); padding: 12px; text-align: center; border-radius: 8px; border: 1px solid var(--green);"><strong style="font-size: 14px;">T01</strong><span style="display:block; font-size:11px; color:var(--green-text);">Avail</span></div>
          <div style="background: var(--bg2); padding: 12px; text-align: center; border-radius: 8px; border: 1px solid var(--amber);"><strong style="font-size: 14px;">T02</strong><span style="display:block; font-size:11px; color:var(--amber-text);">Rsvd</span></div>
          <div style="background: var(--bg2); padding: 12px; text-align: center; border-radius: 8px; border: 1px solid var(--br);"><strong style="font-size: 14px;">T03</strong><span style="display:block; font-size:11px; color:var(--br);">Occ</span></div>
          <div style="background: var(--bg2); padding: 12px; text-align: center; border-radius: 8px; border: 1px solid var(--green);"><strong style="font-size: 14px;">T04</strong><span style="display:block; font-size:11px; color:var(--green-text);">Avail</span></div>
          <div style="background: var(--bg2); padding: 12px; text-align: center; border-radius: 8px; border: 1px solid var(--green);"><strong style="font-size: 14px;">T05</strong><span style="display:block; font-size:11px; color:var(--green-text);">Avail</span></div>
          <div style="background: #fff7ef; padding: 12px; text-align: center; border-radius: 8px; border: 2px solid var(--br);"><strong style="font-size: 14px; color:var(--br);">T06*</strong><span style="display:block; font-size:11px; font-weight:800; color:var(--br);">Active</span></div>
          <div style="background: var(--bg2); padding: 12px; text-align: center; border-radius: 8px; border: 1px solid var(--br);"><strong style="font-size: 14px;">T07</strong><span style="display:block; font-size:11px; color:var(--br);">Occ</span></div>
          <div style="background: var(--bg2); padding: 12px; text-align: center; border-radius: 8px; border: 1px solid var(--amber);"><strong style="font-size: 14px;">T08</strong><span style="display:block; font-size:11px; color:var(--amber-text);">Rsvd</span></div>
        </div>
      </div>

      <div>
        <div class="eb">TABLE VISIBILITY</div>
        <h2 style="margin-bottom: 18px;">One Dining Floor. Different Guest Preferences.</h2>
        <p style="margin-bottom: 24px;">
          Manage every dining table clearly while guests seated together choose dishes from completely different cuisine menus.
        </p>
        <a href="{{ route('features.table-management') }}" class="btn p">Explore Table Management →</a>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 5: DIVERSE ORDERS ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="g2" style="gap: 50px; align-items: center;">
      <div>
        <div class="eb">MULTI-ITEM ORDERS</div>
        <h2 style="margin-bottom: 18px;">Different Cuisines. One Clear Order.</h2>
        <p style="margin-bottom: 24px;">
          Keep every item together even when guests at the same table choose completely different cuisines during a family dinner or group celebration.
        </p>
        <a href="{{ route('features.order-management') }}" class="btn p">Explore Order Management →</a>
      </div>

      <!-- Complex Table Order Card -->
      <div class="win" style="padding: 24px;">
        <div style="display: flex; justify-content: space-between; border-bottom: 1px solid var(--line); padding-bottom: 10px; margin-bottom: 14px;">
          <strong style="font-size: 16px; color: var(--ink);">TABLE T08 (6 Guests)</strong>
          <strong style="color: var(--br);">ORDER #ORD-9402</strong>
        </div>

        <div style="display: flex; flex-direction: column; gap: 8px; font-size: 13.5px; margin-bottom: 16px;">
          <div style="display: flex; justify-content: space-between;">
            <span><span style="color: var(--br); font-weight: 800;">[Indian]</span> Chicken Biryani × 2</span>
            <strong>₹640</strong>
          </div>
          <div style="display: flex; justify-content: space-between;">
            <span><span style="color: var(--br); font-weight: 800;">[Indian]</span> Paneer Tikka × 1</span>
            <strong>₹280</strong>
          </div>
          <div style="display: flex; justify-content: space-between;">
            <span><span style="color: var(--amber-text); font-weight: 800;">[Chinese]</span> Veg Hakka Noodles × 2</span>
            <strong>₹480</strong>
          </div>
          <div style="display: flex; justify-content: space-between;">
            <span><span style="color: #1e40af; font-weight: 800;">[Italian]</span> Margherita Pizza × 1</span>
            <strong>₹380</strong>
          </div>
          <div style="display: flex; justify-content: space-between;">
            <span><span style="color: var(--mute); font-weight: 800;">[Beverages]</span> Fresh Lime Soda × 3</span>
            <strong>₹270</strong>
          </div>
          <div style="display: flex; justify-content: space-between;">
            <span><span style="color: var(--mute); font-weight: 800;">[Desserts]</span> Brownie × 2</span>
            <strong>₹410</strong>
          </div>
        </div>

        <div style="display: flex; justify-content: space-between; border-top: 1px solid var(--line); padding-top: 10px; font-size: 16px; font-weight: 800; color: var(--ink);">
          <span>Total Order Value:</span>
          <span style="color: var(--br);">₹2,460</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 6: MULTIPLE KITCHEN WORKFLOWS ================= -->
<section style="background: var(--bg);">
  <div class="w">
    <div class="hd">
      <div class="eb">KITCHEN STATIONS</div>
      <h2>Keep Every Kitchen Workflow Organized.</h2>
      <p>When different cuisines require different preparation areas, keep orders clearly organized for the right kitchen workflow.</p>
    </div>

    <div class="g3">
      <div class="card" style="padding: 24px; border-top: 4px solid var(--br);">
        <h3 style="font-size: 17px; margin-bottom: 8px;">MAIN INDIAN KITCHEN</h3>
        <p style="font-size: 13px; color: var(--mute); margin-bottom: 12px;">Tandoor, Biryani & Curries Station</p>
        <div style="background: var(--bg2); padding: 10px; border-radius: 8px; font-size: 13px; font-weight: 700; color: var(--ink);">
          Chicken Biryani × 2 · Paneer Tikka × 1
        </div>
      </div>

      <div class="card" style="padding: 24px; border-top: 4px solid var(--amber);">
        <h3 style="font-size: 17px; margin-bottom: 8px;">CHINESE WOK STATION</h3>
        <p style="font-size: 13px; color: var(--mute); margin-bottom: 12px;">Noodles, Fried Rice & Starters</p>
        <div style="background: var(--bg2); padding: 10px; border-radius: 8px; font-size: 13px; font-weight: 700; color: var(--ink);">
          Veg Hakka Noodles × 2
        </div>
      </div>

      <div class="card" style="padding: 24px; border-top: 4px solid var(--blue);">
        <h3 style="font-size: 17px; margin-bottom: 8px;">PIZZA & PASTA OVEN</h3>
        <p style="font-size: 13px; color: var(--mute); margin-bottom: 12px;">Wood-Fired Pizza & Grills</p>
        <div style="background: var(--bg2); padding: 10px; border-radius: 8px; font-size: 13px; font-weight: 700; color: var(--ink);">
          Margherita Pizza × 1
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 7: KOT MANAGEMENT ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="g2" style="gap: 50px; align-items: center;">
      <!-- KOT Ticket Visual -->
      <div class="win" style="padding: 24px;">
        <div style="display: flex; justify-content: space-between; border-bottom: 1px solid var(--line); padding-bottom: 10px; margin-bottom: 14px;">
          <strong style="font-size: 16px; color: var(--br);">KOT #1048</strong>
          <span style="font-size: 12px; font-weight: 800; color: var(--amber-text); background: var(--amber-bg); padding: 2px 8px; border-radius: 99px;">PREPARING</span>
        </div>
        <div style="font-size: 13px; color: var(--mute); margin-bottom: 12px;">Table T08 · 4 Items Routed</div>
        
        <div style="font-size: 13.5px; font-weight: 700; color: var(--ink); margin-bottom: 12px;">
          • Chicken Biryani × 2<br>
          • Paneer Tikka × 1 (Less Spicy)<br>
          • Veg Hakka Noodles × 2
        </div>
        
        <div style="background: #fff7ef; padding: 8px 12px; border-radius: 6px; font-size: 12px; color: var(--br-dark);">
          Special Note: Less spicy for Paneer Tikka
        </div>
      </div>

      <div>
        <div class="eb">KITCHEN TICKETS</div>
        <h2 style="margin-bottom: 18px;">Clear KOTs for Every Cuisine.</h2>
        <p style="margin-bottom: 24px;">
          Give your kitchen team clear order information so preparation stays organized during busy service without lost paper tickets.
        </p>
        <a href="{{ route('features.kot-management') }}" class="btn p">Explore KOT Management →</a>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 9: BILLING ================= -->
<section style="background: var(--bg);">
  <div class="w">
    <div class="g2" style="gap: 50px; align-items: center;">
      <div>
        <div class="eb">POS & BILLING</div>
        <h2 style="margin-bottom: 18px;">Simple Billing for Complex Orders.</h2>
        <p style="margin-bottom: 24px;">
          One Bill. Multiple Cuisines. Print single combined GST invoices or split bills easily for multi-cuisine dining groups.
        </p>
        <a href="{{ route('features.pos-management') }}" class="btn p">Explore POS Management →</a>
      </div>

      <!-- Itemized POS Billing Visual -->
      <div class="win" style="padding: 24px;">
        <div style="border-bottom: 1px dashed var(--line); padding-bottom: 10px; margin-bottom: 14px; text-align: center;">
          <strong style="font-size: 16px; color: var(--ink); display: block;">GENI RESTAURANT POS</strong>
          <span style="font-size: 12px; color: var(--mute);">Table T08 · Bill #INV-9402</span>
        </div>

        <div style="display: flex; flex-direction: column; gap: 6px; font-size: 13px; margin-bottom: 14px;">
          <div style="display: flex; justify-content: space-between; font-weight: 700; color: var(--br);"><span>[Indian]</span><span></span></div>
          <div style="display: flex; justify-content: space-between;"><span>Chicken Biryani × 2</span><span>₹640</span></div>
          <div style="display: flex; justify-content: space-between;"><span>Paneer Tikka × 1</span><span>₹280</span></div>
          
          <div style="display: flex; justify-content: space-between; font-weight: 700; color: var(--amber-text); margin-top: 4px;"><span>[Chinese]</span><span></span></div>
          <div style="display: flex; justify-content: space-between;"><span>Veg Hakka Noodles × 2</span><span>₹480</span></div>
          
          <div style="display: flex; justify-content: space-between; font-weight: 700; color: #1e40af; margin-top: 4px;"><span>[Italian]</span><span></span></div>
          <div style="display: flex; justify-content: space-between;"><span>Margherita Pizza × 1</span><span>₹380</span></div>
        </div>

        <div style="border-top: 1px solid var(--line); padding-top: 10px; display: flex; justify-content: space-between; font-size: 16px; font-weight: 800; color: var(--ink);">
          <span>Grand Total</span>
          <span style="color: var(--br);">₹2,460.00</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 10: INVENTORY ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="g2" style="gap: 50px; align-items: center;">
      <!-- Inventory Dashboard Visual -->
      <div class="win" style="padding: 24px;">
        <h4 style="font-size: 15px; margin-bottom: 14px; border-bottom: 1px solid var(--line); padding-bottom: 10px;">MULTI-CUISINE INGREDIENT TRACKER</h4>
        
        <div style="display: flex; flex-direction: column; gap: 10px; font-size: 13px;">
          <div style="display: flex; justify-content: space-between; align-items: center; background: var(--bg2); padding: 8px 12px; border-radius: 6px;">
            <span>Basmati Rice (Indian)</span><strong style="color: var(--green-text);">45 kg (Healthy)</strong>
          </div>
          <div style="display: flex; justify-content: space-between; align-items: center; background: var(--bg2); padding: 8px 12px; border-radius: 6px;">
            <span>Noodles & Soy Sauce (Chinese)</span><strong style="color: var(--green-text);">28 kg (Healthy)</strong>
          </div>
          <div style="display: flex; justify-content: space-between; align-items: center; background: #fef3c7; padding: 8px 12px; border-radius: 6px; border: 1px solid var(--amber);">
            <span>Mozzarella Cheese (Italian)</span><strong style="color: var(--amber-text);">4.5 kg (Low Stock)</strong>
          </div>
          <div style="display: flex; justify-content: space-between; align-items: center; background: var(--bg2); padding: 8px 12px; border-radius: 6px;">
            <span>Coffee Beans & Lime (Beverages)</span><strong style="color: var(--green-text);">12 kg (Healthy)</strong>
          </div>
        </div>
      </div>

      <div>
        <div class="eb">STOCK CONTROL</div>
        <h2 style="margin-bottom: 18px;">Keep Inventory Connected to Restaurant Operations.</h2>
        <p style="margin-bottom: 24px;">
          Monitor ingredients and stock levels across all cuisine counters so your team can stay aware of what is available and what needs replenishment.
        </p>
        <a href="{{ route('features.inventory-management') }}" class="btn p">Explore Inventory Management →</a>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 11: REPORTS & INSIGHTS ================= -->
<section style="background: var(--bg);">
  <div class="w">
    <div class="hd">
      <div class="eb">CUISINE ANALYTICS</div>
      <h2>Know What Your Customers Order.</h2>
      <p>Understand which dishes, cuisines and categories are driving your restaurant's sales and activity.</p>
    </div>

    <div class="win" style="padding: 28px; max-width: 960px; margin: 0 auto 32px;">
      <h4 style="font-size: 15px; margin-bottom: 16px;">REVENUE BREAKDOWN BY CUISINE (DEMO DATA)</h4>
      
      <div style="display: flex; flex-direction: column; gap: 14px;">
        <div>
          <div style="display: flex; justify-content: space-between; font-size: 13px; font-weight: 700; margin-bottom: 4px;">
            <span>🇮🇳 Indian & Tandoor (42%)</span>
            <span>₹20,420</span>
          </div>
          <div style="height: 10px; background: var(--bg2); border-radius: 5px; overflow: hidden;">
            <div style="width: 42%; height: 100%; background: var(--br);"></div>
          </div>
        </div>

        <div>
          <div style="display: flex; justify-content: space-between; font-size: 13px; font-weight: 700; margin-bottom: 4px;">
            <span>🥢 Chinese & Asian (28%)</span>
            <span>₹13,610</span>
          </div>
          <div style="height: 10px; background: var(--bg2); border-radius: 5px; overflow: hidden;">
            <div style="width: 28%; height: 100%; background: var(--amber);"></div>
          </div>
        </div>

        <div>
          <div style="display: flex; justify-content: space-between; font-size: 13px; font-weight: 700; margin-bottom: 4px;">
            <span>🍕 Italian & Grills (18%)</span>
            <span>₹8,750</span>
          </div>
          <div style="height: 10px; background: var(--bg2); border-radius: 5px; overflow: hidden;">
            <div style="width: 18%; height: 100%; background: #1e40af;"></div>
          </div>
        </div>

        <div>
          <div style="display: flex; justify-content: space-between; font-size: 13px; font-weight: 700; margin-bottom: 4px;">
            <span>🍹 Beverages & Desserts (12%)</span>
            <span>₹5,840</span>
          </div>
          <div style="height: 10px; background: var(--bg2); border-radius: 5px; overflow: hidden;">
            <div style="width: 12%; height: 100%; background: var(--green-text);"></div>
          </div>
        </div>
      </div>
    </div>

    <div style="text-align: center;">
      <a href="{{ route('features.reports') }}" class="btn p">Explore Reports →</a>
    </div>
  </div>
</section>

<!-- ================= SECTION 13: WHY GENI MENU FOR MULTI-CUISINE ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">KEY ADVANTAGES</div>
      <h2>Built Around the Way Multi-Cuisine Restaurants Work.</h2>
    </div>

    <div class="g3">
      <div class="card" style="padding: 24px;">
        <h3 style="font-size: 18px; margin-bottom: 8px;">Organized Multi-Cuisine Menu</h3>
        <p style="font-size: 14px;">Keep different cuisines structured, categorized and easy to manage.</p>
      </div>

      <div class="card" style="padding: 24px;">
        <h3 style="font-size: 18px; margin-bottom: 8px;">Clear Table Orders</h3>
        <p style="font-size: 14px;">Handle diverse customer orders without losing track of items.</p>
      </div>

      <div class="card" style="padding: 24px;">
        <h3 style="font-size: 18px; margin-bottom: 8px;">Connected Kitchen</h3>
        <p style="font-size: 14px;">Keep front-of-house and kitchen station preparation aligned.</p>
      </div>

      <div class="card" style="padding: 24px;">
        <h3 style="font-size: 18px; margin-bottom: 8px;">Simplified Billing</h3>
        <p style="font-size: 14px;">Process complex multi-item orders through one billing workflow.</p>
      </div>

      <div class="card" style="padding: 24px;">
        <h3 style="font-size: 18px; margin-bottom: 8px;">Inventory Visibility</h3>
        <p style="font-size: 14px;">Stay aware of important ingredients and stock levels across stations.</p>
      </div>

      <div class="card" style="padding: 24px;">
        <h3 style="font-size: 18px; margin-bottom: 8px;">Business Insights</h3>
        <p style="font-size: 14px;">Understand sales, orders, menu performance and category revenue.</p>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 17: FAQ ================= -->
<section style="background: var(--bg);">
  <div class="w">
    <div class="hd">
      <div class="eb">FREQUENTLY ASKED QUESTIONS</div>
      <h2>Frequently Asked Questions</h2>
      <p>Everything you need to know about Geni Menu for multi-cuisine restaurants.</p>
    </div>

    <div class="faq-list">
      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          1. Is Geni Menu suitable for multi-cuisine restaurants?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Geni Menu is designed to handle multi-cuisine dining rooms, helping organize diverse menus, table orders, KOT routing, billing and reports.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          2. Can I manage different cuisines in one single menu?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. You can structure your menu by Cuisine (e.g. Indian, Chinese, Italian) and sub-categories (Starters, Main Course, Desserts) for clear browsing.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          3. Can dine-in table orders contain items from multiple cuisines?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Guests seated at the same table can order Biryani, Noodles, Pizza and Desserts under a single unified table order ticket.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          4. Can orders be routed to different kitchen preparation stations?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. KOT tickets can route specific items to the Main Indian Kitchen, Chinese Wok, or Pizza Oven printers/screens.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          5. How does POS billing handle multi-cuisine orders?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          The POS generates one itemized GST invoice listing all dishes by category or cuisine with single-click checkout.
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= FINAL CTA ================= -->
<section style="background: linear-gradient(135deg, #241a14 0%, #3a2b21 100%); color: #fff; text-align: center; padding: 80px 0;">
  <div class="w" style="max-width: 760px;">
    <h2 style="color: #fff; font-size: clamp(32px, 4vw, 48px); margin-bottom: 20px;">
      Bring Every Cuisine <span style="color: var(--br-gold); font-family: 'Playfair Display', Georgia, serif; font-style: italic;">Together.</span>
    </h2>
    <p style="color: #c7b8a8; font-size: 18px; margin-bottom: 36px; line-height: 1.6;">
      Manage your menus, tables, orders, kitchens, billing, inventory and reports from one connected restaurant platform with Geni Menu.
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
