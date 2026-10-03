@extends('layouts.frontend-master')

@section('content')

{{-- Google Fonts --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@500;600;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Playfair+Display:ital,wght@1,600;1,700&display=swap" rel="stylesheet">

<style>
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

/* ===================== CARDS & POS COMPONENTS ===================== */
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
.badge.paid { background: #d1fae5; color: #065f46; }
.badge.pending { background: #fef3c7; color: #92400e; }
.badge.partial { background: #e0f2fe; color: #0369a1; }
.badge.failed { background: #fee2e2; color: #991b1b; }
.badge.dinein { background: #f3e8ff; color: #6b21a8; }
.badge.takeaway { background: #ffedd5; color: #c2410c; }
.badge.delivery { background: #dbeafe; color: #1e40af; }
.badge.pickup { background: #fce7f3; color: #9d174d; }

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
    <span class="cur">POS Management</span>
  </div>
</div>

<!-- ================= HERO SECTION ================= -->
<section style="padding: 60px 0 80px; background: linear-gradient(180deg, #f9f6f0 0%, #ffffff 100%);">
  <div class="w">
    <div style="text-align: center; max-width: 820px; margin: 0 auto 48px;">
      <div class="eb">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="M6 8h12M6 12h8M6 16h4"/></svg>
        POS MANAGEMENT
      </div>
      <h1 style="margin-bottom: 20px;">
        Faster Billing. <br><span class="sf">Smoother Restaurant Operations.</span>
      </h1>
      <p style="font-size: 19px; max-width: 720px; margin: 0 auto 32px; color: var(--mute);">
        Manage orders, bills, payments and restaurant transactions from one connected POS built around the way your team actually works.
      </p>
      <div style="display: flex; align-items: center; justify-content: center; gap: 16px; flex-wrap: wrap;">
        <a href="{{ route('restaurant_signup') }}" class="btn p" style="padding: 16px 36px; font-size: 16px;">Get Started →</a>
        <a href="{{ route('contact.us') }}" class="btn o" style="padding: 16px 32px; font-size: 16px;">Book a Demo</a>
      </div>
    </div>

    <!-- Hero Visual: Realistic Restaurant POS Screen -->
    <div class="win" style="border: 1.5px solid var(--line); box-shadow: 0 26px 60px rgba(36,26,20,0.14);">
      <div class="wb">
        <div class="dots"><i></i><i></i><i></i></div>
        <div class="ttl">GENI MENU POS — CENTRAL RESTAURANT BILLING WORKSPACE</div>
        <div style="display: flex; gap: 12px; align-items: center;">
          <span style="font-size: 12px; font-weight: 700; color: var(--br);">TERMINAL #01</span>
          <span style="width: 8px; height: 8px; border-radius: 50%; background: var(--green);"></span>
        </div>
      </div>

      <div style="display: grid; grid-template-columns: 1fr 340px; min-height: 520px; background: #faf8f5;">
        <!-- Left / Main POS Area -->
        <div style="padding: 24px; border-right: 1px solid var(--line); display: flex; flex-direction: column; gap: 20px;">
          <!-- Categories Bar -->
          <div style="display: flex; gap: 10px; overflow-x: auto; padding-bottom: 6px;">
            <button style="padding: 8px 18px; border-radius: 10px; border: 1px solid var(--br); background: var(--br); color: #fff; font-weight: 700; font-size: 13px; cursor: pointer;">All Items</button>
            <button style="padding: 8px 18px; border-radius: 10px; border: 1px solid var(--line); background: #fff; color: var(--ink); font-weight: 600; font-size: 13px; cursor: pointer;">Starters</button>
            <button style="padding: 8px 18px; border-radius: 10px; border: 1px solid var(--line); background: #fff; color: var(--ink); font-weight: 600; font-size: 13px; cursor: pointer;">Main Course</button>
            <button style="padding: 8px 18px; border-radius: 10px; border: 1px solid var(--line); background: #fff; color: var(--ink); font-weight: 600; font-size: 13px; cursor: pointer;">Biryani</button>
            <button style="padding: 8px 18px; border-radius: 10px; border: 1px solid var(--line); background: #fff; color: var(--ink); font-weight: 600; font-size: 13px; cursor: pointer;">Pizza</button>
            <button style="padding: 8px 18px; border-radius: 10px; border: 1px solid var(--line); background: #fff; color: var(--ink); font-weight: 600; font-size: 13px; cursor: pointer;">Burgers</button>
            <button style="padding: 8px 18px; border-radius: 10px; border: 1px solid var(--line); background: #fff; color: var(--ink); font-weight: 600; font-size: 13px; cursor: pointer;">Beverages</button>
            <button style="padding: 8px 18px; border-radius: 10px; border: 1px solid var(--line); background: #fff; color: var(--ink); font-weight: 600; font-size: 13px; cursor: pointer;">Desserts</button>
          </div>

          <!-- Product Grid -->
          <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(160px, 1fr)); gap: 14px;">
            <div style="background: #fff; border: 1.5px solid var(--br); border-radius: 14px; padding: 14px; box-shadow: 0 4px 14px rgba(135,96,57,0.12); position: relative;">
              <div style="position: absolute; top: 10px; right: 10px; background: var(--br); color: #fff; border-radius: 50%; width: 20px; height: 20px; font-size: 11px; font-weight: 800; display: grid; place-items: center;">2</div>
              <div style="font-weight: 800; font-size: 14px; color: var(--ink); margin-bottom: 6px;">Chicken Biryani</div>
              <div style="font-size: 12px; color: var(--mute); margin-bottom: 10px;">Authentic dum biryani</div>
              <div style="font-weight: 800; font-size: 15px; color: var(--br);">₹280</div>
            </div>

            <div style="background: #fff; border: 1px solid var(--line); border-radius: 14px; padding: 14px;">
              <div style="font-weight: 800; font-size: 14px; color: var(--ink); margin-bottom: 6px;">Paneer Butter Masala</div>
              <div style="font-size: 12px; color: var(--mute); margin-bottom: 10px;">Rich gravy & cottage cheese</div>
              <div style="font-weight: 800; font-size: 15px; color: var(--br);">₹240</div>
            </div>

            <div style="background: #fff; border: 1px solid var(--line); border-radius: 14px; padding: 14px;">
              <div style="font-weight: 800; font-size: 14px; color: var(--ink); margin-bottom: 6px;">Margherita Pizza</div>
              <div style="font-size: 12px; color: var(--mute); margin-bottom: 10px;">Fresh basil & mozzarella</div>
              <div style="font-weight: 800; font-size: 15px; color: var(--br);">₹320</div>
            </div>

            <div style="background: #fff; border: 1px solid var(--line); border-radius: 14px; padding: 14px;">
              <div style="font-weight: 800; font-size: 14px; color: var(--ink); margin-bottom: 6px;">Classic Burger</div>
              <div style="font-size: 12px; color: var(--mute); margin-bottom: 10px;">Grilled patty with cheese</div>
              <div style="font-weight: 800; font-size: 15px; color: var(--br);">₹220</div>
            </div>

            <div style="background: #fff; border: 1.5px solid var(--br); border-radius: 14px; padding: 14px; position: relative;">
              <div style="position: absolute; top: 10px; right: 10px; background: var(--br); color: #fff; border-radius: 50%; width: 20px; height: 20px; font-size: 11px; font-weight: 800; display: grid; place-items: center;">2</div>
              <div style="font-weight: 800; font-size: 14px; color: var(--ink); margin-bottom: 6px;">Cold Coffee</div>
              <div style="font-size: 12px; color: var(--mute); margin-bottom: 10px;">Chilled espresso & milk</div>
              <div style="font-weight: 800; font-size: 15px; color: var(--br);">₹160</div>
            </div>

            <div style="background: #fff; border: 1.5px solid var(--br); border-radius: 14px; padding: 14px; position: relative;">
              <div style="position: absolute; top: 10px; right: 10px; background: var(--br); color: #fff; border-radius: 50%; width: 20px; height: 20px; font-size: 11px; font-weight: 800; display: grid; place-items: center;">1</div>
              <div style="font-weight: 800; font-size: 14px; color: var(--ink); margin-bottom: 6px;">Gulab Jamun</div>
              <div style="font-size: 12px; color: var(--mute); margin-bottom: 10px;">Warm syrup sweet (2pcs)</div>
              <div style="font-weight: 800; font-size: 15px; color: var(--br);">₹120</div>
            </div>
          </div>
        </div>

        <!-- Right Order Panel -->
        <div style="background: #fff; padding: 20px; display: flex; flex-direction: column; justify-content: space-between; border-left: 1px solid var(--line);">
          <div>
            <div style="display: flex; justify-content: space-between; align-items: center; padding-bottom: 14px; border-bottom: 1px solid var(--line); margin-bottom: 16px;">
              <div>
                <h4 style="font-size: 16px; font-weight: 800;">Current Order</h4>
                <div style="font-size: 12px; color: var(--mute);">Order #POS-4092</div>
              </div>
              <div style="display: flex; gap: 8px;">
                <span class="badge dinein">Table: T08</span>
                <span class="badge pending">3 Guests</span>
              </div>
            </div>

            <!-- Items list -->
            <div style="display: flex; flex-direction: column; gap: 12px; margin-bottom: 20px;">
              <div style="display: flex; justify-content: space-between; align-items: center; font-size: 13px;">
                <div>
                  <div style="font-weight: 700; color: var(--ink);">Chicken Biryani</div>
                  <div style="font-size: 11px; color: var(--mute);">2 × ₹280</div>
                </div>
                <div style="font-weight: 800; color: var(--ink);">₹560</div>
              </div>

              <div style="display: flex; justify-content: space-between; align-items: center; font-size: 13px;">
                <div>
                  <div style="font-weight: 700; color: var(--ink);">Cold Coffee</div>
                  <div style="font-size: 11px; color: var(--mute);">2 × ₹160</div>
                </div>
                <div style="font-weight: 800; color: var(--ink);">₹320</div>
              </div>

              <div style="display: flex; justify-content: space-between; align-items: center; font-size: 13px;">
                <div>
                  <div style="font-weight: 700; color: var(--ink);">Gulab Jamun</div>
                  <div style="font-size: 11px; color: var(--mute);">1 × ₹120</div>
                </div>
                <div style="font-weight: 800; color: var(--ink);">₹120</div>
              </div>
            </div>
          </div>

          <!-- Total & CTA -->
          <div style="padding-top: 16px; border-top: 1px dashed var(--line);">
            <div style="display: flex; justify-content: space-between; font-size: 13px; color: var(--mute); margin-bottom: 6px;">
              <span>Subtotal</span>
              <span style="font-weight: 700; color: var(--ink);">₹1,000</span>
            </div>
            <div style="display: flex; justify-content: space-between; font-size: 13px; color: var(--mute); margin-bottom: 12px;">
              <span>Taxes (5% GST)</span>
              <span style="font-weight: 700; color: var(--ink);">₹50</span>
            </div>
            <div style="display: flex; justify-content: space-between; font-size: 18px; font-weight: 800; color: var(--ink); margin-bottom: 18px; padding-top: 10px; border-top: 1px solid var(--line);">
              <span>Total Due</span>
              <span style="color: var(--br);">₹1,050</span>
            </div>

            <button class="btn p" style="width: 100%; padding: 14px; font-size: 15px;">Proceed to Payment →</button>
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
          <h4 style="font-size: 16px; margin-bottom: 4px;">Faster Billing</h4>
          <p style="font-size: 13.5px; line-height: 1.5;">Create and process restaurant bills with a focused POS workflow.</p>
        </div>
      </div>

      <div style="display: flex; gap: 16px; align-items: flex-start;">
        <div style="font-family: 'Outfit', sans-serif; font-size: 28px; font-weight: 900; color: var(--br-gold); line-height: 1;">02</div>
        <div>
          <h4 style="font-size: 16px; margin-bottom: 4px;">One Order View</h4>
          <p style="font-size: 13.5px; line-height: 1.5;">Keep selected items, quantities and totals visible in one place.</p>
        </div>
      </div>

      <div style="display: flex; gap: 16px; align-items: flex-start;">
        <div style="font-family: 'Outfit', sans-serif; font-size: 28px; font-weight: 900; color: var(--br-gold); line-height: 1;">03</div>
        <div>
          <h4 style="font-size: 16px; margin-bottom: 4px;">Multiple Order Types</h4>
          <p style="font-size: 13.5px; line-height: 1.5;">Support dine-in, takeaway and delivery workflows seamlessly.</p>
        </div>
      </div>

      <div style="display: flex; gap: 16px; align-items: flex-start;">
        <div style="font-family: 'Outfit', sans-serif; font-size: 28px; font-weight: 900; color: var(--br-gold); line-height: 1;">04</div>
        <div>
          <h4 style="font-size: 16px; margin-bottom: 4px;">Connected Payments</h4>
          <p style="font-size: 13.5px; line-height: 1.5;">Connect billing with payment processing and transaction records.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= PROBLEM VS SOLUTION SECTION ================= -->
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">OPERATIONAL COMPARISON</div>
      <h2>Restaurant Billing Shouldn’t <span class="sf">Slow Down Service.</span></h2>
      <p>During peak lunch and dinner rush hours, manual billing calculations create bottleneck queues at your counter. Compare traditional billing against Geni Menu POS.</p>
    </div>

    <div class="g2">
      <!-- Traditional Billing -->
      <div class="card" style="padding: 32px; background: #fff5f5; border-color: rgba(239, 68, 68, 0.2);">
        <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 20px;">
          <div style="width: 40px; height: 40px; border-radius: 10px; background: #fee2e2; color: #dc2626; display: grid; place-items: center; font-weight: 800;">✕</div>
          <div>
            <h3 style="color: #991b1b;">Traditional Billing</h3>
            <p style="font-size: 13px; color: #b91c1c;">Manual & Fragmented Cash Counter Workflow</p>
          </div>
        </div>

        <ul style="display: flex; flex-direction: column; gap: 14px;">
          <li style="display: flex; gap: 12px; font-size: 14px; color: #7f1d1d;">
            <span style="color: #dc2626; font-weight: 800;">•</span> Manual price calculations and paper notepad item counting
          </li>
          <li style="display: flex; gap: 12px; font-size: 14px; color: #7f1d1d;">
            <span style="color: #dc2626; font-weight: 800;">•</span> Separate order slips that disconnect kitchen from cash desk
          </li>
          <li style="display: flex; gap: 12px; font-size: 14px; color: #7f1d1d;">
            <span style="color: #dc2626; font-weight: 800;">•</span> Slow bill preparation causing guest frustration at exit
          </li>
          <li style="display: flex; gap: 12px; font-size: 14px; color: #7f1d1d;">
            <span style="color: #dc2626; font-weight: 800;">•</span> Payment confusion during split bills or multiple payment types
          </li>
          <li style="display: flex; gap: 12px; font-size: 14px; color: #7f1d1d;">
            <span style="color: #dc2626; font-weight: 800;">•</span> Zero real-time visibility into daily sales and pending table tabs
          </li>
        </ul>
      </div>

      <!-- Geni Menu POS -->
      <div class="card" style="padding: 32px; background: #f0fdf4; border-color: rgba(16, 185, 129, 0.3);">
        <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 20px;">
          <div style="width: 40px; height: 40px; border-radius: 10px; background: #d1fae5; color: #059669; display: grid; place-items: center; font-weight: 800;">✓</div>
          <div>
            <h3 style="color: #065f46;">Geni Menu POS</h3>
            <p style="font-size: 13px; color: #047857;">Connected & Instant Billing Workspace</p>
          </div>
        </div>

        <ul style="display: flex; flex-direction: column; gap: 14px;">
          <li style="display: flex; gap: 12px; font-size: 14px; color: #064e3b;">
            <span style="color: #10b981; font-weight: 800;">✓</span> Digital menu items automatically connected to POS cashier touch-grid
          </li>
          <li style="display: flex; gap: 12px; font-size: 14px; color: #064e3b;">
            <span style="color: #10b981; font-weight: 800;">✓</span> Orders, tables, and item modifiers unified in one workspace
          </li>
          <li style="display: flex; gap: 12px; font-size: 14px; color: #064e3b;">
            <span style="color: #10b981; font-weight: 800;">✓</span> Instant automatic subtotal, discount, and tax calculation
          </li>
          <li style="display: flex; gap: 12px; font-size: 14px; color: #064e3b;">
            <span style="color: #10b981; font-weight: 800;">✓</span> Clear multi-payment method collection (Cash, Card, UPI)
          </li>
          <li style="display: flex; gap: 12px; font-size: 14px; color: #064e3b;">
            <span style="color: #10b981; font-weight: 800;">✓</span> Live sales reports and instant transaction reconciliation
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ================= MAIN POS DASHBOARD SHOWCASE ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">CORE POS WORKSPACE</div>
      <h2>Everything Your <span class="sf">Cash Counter Needs.</span></h2>
      <p>Give your billing team one focused workspace for creating orders, managing bills and completing payments with maximum speed.</p>
    </div>

    <!-- Interactive-feel Full POS Screen Mockup -->
    <div class="win" style="border: 1px solid var(--line);">
      <!-- App Header Bar -->
      <div style="background: #1e140e; color: #fff; padding: 14px 24px; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px;">
        <div style="display: flex; align-items: center; gap: 14px;">
          <div style="font-family: 'Outfit', sans-serif; font-weight: 800; font-size: 18px; color: var(--br-gold);">Geni Menu POS</div>
          <span style="background: rgba(255,255,255,0.1); padding: 4px 10px; border-radius: 6px; font-size: 11px;">Counter #1</span>
        </div>

        <div style="display: flex; align-items: center; gap: 12px;">
          <input type="text" placeholder="🔍 Search menu items..." value="" style="background: rgba(255,255,255,0.12); border: 1px solid rgba(255,255,255,0.2); border-radius: 8px; padding: 6px 14px; color: #fff; font-size: 13px; width: 220px;">
          <span style="font-size: 13px; font-weight: 600; color: #d5c8bb;">Cashier: Rahul M.</span>
        </div>
      </div>

      <!-- POS Main Grid Body -->
      <div style="display: grid; grid-template-columns: 1fr 380px; background: #fff;">
        <div style="padding: 24px; display: flex; flex-direction: column; gap: 20px;">
          <!-- Order Type Selectors -->
          <div style="display: flex; gap: 12px; border-bottom: 1px solid var(--line); padding-bottom: 16px;">
            <button style="padding: 10px 20px; border-radius: 10px; background: var(--br-light); border: 1.5px solid var(--br); color: var(--br); font-weight: 800; font-size: 13px; cursor: pointer;">🍽️ Dine-in (T08)</button>
            <button style="padding: 10px 20px; border-radius: 10px; background: #fff; border: 1px solid var(--line); color: var(--ink); font-weight: 600; font-size: 13px; cursor: pointer;">🛍️ Takeaway</button>
            <button style="padding: 10px 20px; border-radius: 10px; background: #fff; border: 1px solid var(--line); color: var(--ink); font-weight: 600; font-size: 13px; cursor: pointer;">🛵 Delivery</button>
            <button style="padding: 10px 20px; border-radius: 10px; background: #fff; border: 1px solid var(--line); color: var(--ink); font-weight: 600; font-size: 13px; cursor: pointer;">📦 Pickup</button>
          </div>

          <!-- Product Grid Items -->
          <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 14px;">
            <div style="border: 1.5px solid var(--br); border-radius: 14px; padding: 14px; background: var(--bg2); position: relative;">
              <div style="font-weight: 800; font-size: 15px; margin-bottom: 4px;">Chicken Biryani</div>
              <div style="font-size: 12px; color: var(--mute);">Main Course · Dum</div>
              <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 12px;">
                <span style="font-weight: 800; color: var(--br); font-size: 16px;">₹280</span>
                <span style="background: var(--br); color: #fff; padding: 4px 12px; border-radius: 6px; font-weight: 800; font-size: 12px;">2 Added</span>
              </div>
            </div>

            <div style="border: 1.5px solid var(--br); border-radius: 14px; padding: 14px; background: var(--bg2); position: relative;">
              <div style="font-weight: 800; font-size: 15px; margin-bottom: 4px;">Paneer Tikka</div>
              <div style="font-size: 12px; color: var(--mute);">Starters · Tandoori</div>
              <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 12px;">
                <span style="font-weight: 800; color: var(--br); font-size: 16px;">₹220</span>
                <span style="background: var(--br); color: #fff; padding: 4px 12px; border-radius: 6px; font-weight: 800; font-size: 12px;">1 Added</span>
              </div>
            </div>

            <div style="border: 1.5px solid var(--br); border-radius: 14px; padding: 14px; background: var(--bg2); position: relative;">
              <div style="font-weight: 800; font-size: 15px; margin-bottom: 4px;">Lime Soda</div>
              <div style="font-size: 12px; color: var(--mute);">Beverages · Fresh</div>
              <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 12px;">
                <span style="font-weight: 800; color: var(--br); font-size: 16px;">₹80</span>
                <span style="background: var(--br); color: #fff; padding: 4px 12px; border-radius: 6px; font-weight: 800; font-size: 12px;">2 Added</span>
              </div>
            </div>

            <div style="border: 1px solid var(--line); border-radius: 14px; padding: 14px; background: #fff;">
              <div style="font-weight: 800; font-size: 15px; margin-bottom: 4px;">Garlic Naan</div>
              <div style="font-size: 12px; color: var(--mute);">Breads · Butter</div>
              <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 12px;">
                <span style="font-weight: 800; color: var(--br); font-size: 16px;">₹60</span>
                <button style="border: 1px solid var(--br); color: var(--br); background: #fff; padding: 4px 10px; border-radius: 6px; font-weight: 700; font-size: 12px;">+ Add</button>
              </div>
            </div>

            <div style="border: 1px solid var(--line); border-radius: 14px; padding: 14px; background: #fff;">
              <div style="font-weight: 800; font-size: 15px; margin-bottom: 4px;">Dal Makhani</div>
              <div style="font-size: 12px; color: var(--mute);">Main Course · Curry</div>
              <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 12px;">
                <span style="font-weight: 800; color: var(--br); font-size: 16px;">₹210</span>
                <button style="border: 1px solid var(--br); color: var(--br); background: #fff; padding: 4px 10px; border-radius: 6px; font-weight: 700; font-size: 12px;">+ Add</button>
              </div>
            </div>

            <div style="border: 1px solid var(--line); border-radius: 14px; padding: 14px; background: #fff;">
              <div style="font-weight: 800; font-size: 15px; margin-bottom: 4px;">Brownie Ice Cream</div>
              <div style="font-size: 12px; color: var(--mute);">Desserts · Sizzling</div>
              <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 12px;">
                <span style="font-weight: 800; color: var(--br); font-size: 16px;">₹190</span>
                <button style="border: 1px solid var(--br); color: var(--br); background: #fff; padding: 4px 10px; border-radius: 6px; font-weight: 700; font-size: 12px;">+ Add</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Right Order Summary Panel -->
        <div style="background: #faf8f5; border-left: 1px solid var(--line); padding: 24px; display: flex; flex-direction: column; justify-content: space-between;">
          <div>
            <div style="padding-bottom: 16px; border-bottom: 1px solid var(--line); margin-bottom: 16px;">
              <div style="display: flex; justify-content: space-between; align-items: center;">
                <h4 style="font-size: 17px; font-weight: 800;">Current Order</h4>
                <span class="badge dinein">Table T08</span>
              </div>
              <div style="font-size: 12px; color: var(--mute); margin-top: 4px;">3 Guests · Server: Ankit K.</div>
            </div>

            <!-- Items -->
            <div style="display: flex; flex-direction: column; gap: 14px; margin-bottom: 20px;">
              <div style="display: flex; justify-content: space-between; align-items: center; font-size: 13.5px;">
                <div>
                  <div style="font-weight: 700; color: var(--ink);">Chicken Biryani × 2</div>
                  <div style="font-size: 11px; color: var(--mute);">Extra Raita (+₹30)</div>
                </div>
                <div style="font-weight: 800; color: var(--ink);">₹560</div>
              </div>

              <div style="display: flex; justify-content: space-between; align-items: center; font-size: 13.5px;">
                <div>
                  <div style="font-weight: 700; color: var(--ink);">Paneer Tikka × 1</div>
                  <div style="font-size: 11px; color: var(--mute);">Medium Spicy</div>
                </div>
                <div style="font-weight: 800; color: var(--ink);">₹220</div>
              </div>

              <div style="display: flex; justify-content: space-between; align-items: center; font-size: 13.5px;">
                <div>
                  <div style="font-weight: 700; color: var(--ink);">Lime Soda × 2</div>
                  <div style="font-size: 11px; color: var(--mute);">Sweet & Salt</div>
                </div>
                <div style="font-weight: 800; color: var(--ink);">₹160</div>
              </div>
            </div>
          </div>

          <div>
            <div style="padding-top: 14px; border-top: 1px solid var(--line); display: flex; flex-direction: column; gap: 8px; margin-bottom: 20px;">
              <div style="display: flex; justify-content: space-between; font-size: 13px; color: var(--mute);">
                <span>Subtotal</span>
                <span style="font-weight: 700; color: var(--ink);">₹940</span>
              </div>
              <div style="display: flex; justify-content: space-between; font-size: 13px; color: var(--mute);">
                <span>GST (5%)</span>
                <span style="font-weight: 700; color: var(--ink);">₹47</span>
              </div>
              <div style="display: flex; justify-content: space-between; font-size: 18px; font-weight: 900; color: var(--ink); padding-top: 8px; border-top: 1px dashed var(--line);">
                <span>Total</span>
                <span style="color: var(--br);">₹987</span>
              </div>
            </div>

            <!-- Quick Action Buttons -->
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 8px; margin-bottom: 10px;">
              <button class="btn o" style="padding: 10px; font-size: 13px; text-align: center;">Save Order</button>
              <button class="btn o" style="padding: 10px; font-size: 13px; text-align: center;">Hold Bill</button>
            </div>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 8px;">
              <button class="btn o" style="padding: 10px; font-size: 13px; text-align: center;">Print Bill</button>
              <button class="btn p" style="padding: 10px; font-size: 13px; text-align: center;">Pay →</button>
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
      <div class="eb">FLEXIBLE RESTAURANT POS</div>
      <h2>One POS. <span class="sf">Different Restaurant Orders.</span></h2>
      <p>Whether guests dine in at your tables or order takeaway at the counter, process every order type with speed and precision.</p>
    </div>

    <div class="g4">
      <div class="card" style="padding: 24px; text-align: center;">
        <div class="ic" style="margin: 0 auto 16px; width: 56px; height: 56px;">
          <svg viewBox="0 0 24 24"><path d="M4 19h16M4 15h16M4 11h16M8 7v4M16 7v4"/></svg>
        </div>
        <h3 style="font-size: 18px; margin-bottom: 8px;">Dine-in</h3>
        <p style="font-size: 13.5px;">Connect the order directly with a dining table number and keep track of open table tabs.</p>
      </div>

      <div class="card" style="padding: 24px; text-align: center;">
        <div class="ic" style="margin: 0 auto 16px; width: 56px; height: 56px;">
          <svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4zM3 6h18M16 10a4 4 0 01-8 0"/></svg>
        </div>
        <h3 style="font-size: 18px; margin-bottom: 8px;">Takeaway</h3>
        <p style="font-size: 13.5px;">Process counter orders for customers collecting packed food with quick payment options.</p>
      </div>

      <div class="card" style="padding: 24px; text-align: center;">
        <div class="ic" style="margin: 0 auto 16px; width: 56px; height: 56px;">
          <svg viewBox="0 0 24 24"><rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>
        </div>
        <h3 style="font-size: 18px; margin-bottom: 8px;">Delivery</h3>
        <p style="font-size: 13.5px;">Manage delivery order bills with customer addresses and rider assignment tracking.</p>
      </div>

      <div class="card" style="padding: 24px; text-align: center;">
        <div class="ic" style="margin: 0 auto 16px; width: 56px; height: 56px;">
          <svg viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"/></svg>
        </div>
        <h3 style="font-size: 18px; margin-bottom: 8px;">Pickup</h3>
        <p style="font-size: 13.5px;">Keep self-collection orders identified and ready for immediate handover upon arrival.</p>
      </div>
    </div>
  </div>
</section>

<!-- ================= MENU-TO-POS CONNECTION ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">INTEGRATED MENU DATA</div>
      <h2>Your Menu and POS <span class="sf">Work Together.</span></h2>
      <p>Item prices, categories, portion sizes, and add-on options configured in Menu Management appear instantly on your POS touch-screen.</p>
    </div>

    <!-- Visual Flow Diagram -->
    <div style="display: flex; align-items: center; justify-content: center; gap: 16px; margin-bottom: 48px; flex-wrap: wrap;">
      <div style="background: #fff; border: 1px solid var(--line); border-radius: 12px; padding: 12px 20px; font-weight: 700; font-size: 14px; color: var(--ink);">MENU ITEM</div>
      <span style="color: var(--br); font-weight: 900;">→</span>
      <div style="background: #fff; border: 1px solid var(--line); border-radius: 12px; padding: 12px 20px; font-weight: 700; font-size: 14px; color: var(--ink);">PRICE & MODIFIERS</div>
      <span style="color: var(--br); font-weight: 900;">→</span>
      <div style="background: #fff; border: 1px solid var(--line); border-radius: 12px; padding: 12px 20px; font-weight: 700; font-size: 14px; color: var(--ink);">POS SELECTION</div>
      <span style="color: var(--br); font-weight: 900;">→</span>
      <div style="background: #fff; border: 1px solid var(--line); border-radius: 12px; padding: 12px 20px; font-weight: 700; font-size: 14px; color: var(--ink);">FINAL BILL</div>
    </div>

    <!-- Interactive Modifier Modal Simulation -->
    <div class="g2">
      <div class="card" style="padding: 28px;">
        <div style="font-size: 12px; font-weight: 800; color: var(--br); text-transform: uppercase; letter-spacing: .08em; margin-bottom: 8px;">POS Modifier Dialog</div>
        <h3 style="font-size: 22px; margin-bottom: 6px;">Chicken Biryani</h3>
        <p style="font-size: 14px; color: var(--mute); margin-bottom: 20px;">Base Price: ₹280</p>

        <div style="margin-bottom: 20px;">
          <div style="font-weight: 700; font-size: 13px; margin-bottom: 8px;">Portion Size</div>
          <div style="display: flex; gap: 10px;">
            <span style="padding: 8px 16px; border-radius: 8px; border: 1px solid var(--line); background: #fff; font-size: 13px; font-weight: 600;">Regular</span>
            <span style="padding: 8px 16px; border-radius: 8px; border: 1.5px solid var(--br); background: var(--br-light); color: var(--br); font-size: 13px; font-weight: 800;">Large (+₹50) ✓</span>
          </div>
        </div>

        <div style="margin-bottom: 24px;">
          <div style="font-weight: 700; font-size: 13px; margin-bottom: 8px;">Add-ons</div>
          <div style="display: flex; flex-direction: column; gap: 8px;">
            <label style="display: flex; align-items: center; gap: 10px; font-size: 13.5px;">
              <input type="checkbox" checked style="accent-color: var(--br);"> Extra Egg (+₹20)
            </label>
            <label style="display: flex; align-items: center; gap: 10px; font-size: 13.5px;">
              <input type="checkbox" checked style="accent-color: var(--br);"> Extra Raita (+₹30)
            </label>
          </div>
        </div>

        <button class="btn p" style="width: 100%; padding: 12px; font-size: 14px;">Add to Order (₹380)</button>
      </div>

      <div class="card" style="padding: 28px; background: #faf8f5;">
        <div style="font-size: 12px; font-weight: 800; color: var(--br); text-transform: uppercase; letter-spacing: .08em; margin-bottom: 8px;">Order Panel Result</div>
        <h3 style="font-size: 20px; margin-bottom: 16px;">Live Cart Item View</h3>

        <div style="background: #fff; border: 1px solid var(--line); border-radius: 14px; padding: 16px;">
          <div style="display: flex; justify-content: space-between; align-items: flex-start;">
            <div>
              <div style="font-weight: 800; font-size: 15px;">Chicken Biryani (Large)</div>
              <div style="font-size: 12px; color: var(--mute); margin-top: 4px;">• Extra Egg (+₹20)</div>
              <div style="font-size: 12px; color: var(--mute);">• Extra Raita (+₹30)</div>
            </div>
            <div style="font-weight: 900; font-size: 16px; color: var(--br);">₹620</div>
          </div>
          <div style="margin-top: 12px; padding-top: 10px; border-top: 1px dashed var(--line); font-size: 12px; color: var(--mute);">
            Quantity: <strong>2</strong> × ₹310 each
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= TABLE + POS CONNECTION ================= -->
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">FLOOR PLAN INTEGRATION</div>
      <h2>Every Table Can Connect <span class="sf">Directly to the Bill.</span></h2>
      <p>Select any table from your digital floor map to instantly view its live active bill and add items or complete payment.</p>
    </div>

    <div class="g2">
      <!-- Left: Interactive Floor Map Preview -->
      <div class="card" style="padding: 24px;">
        <div style="font-size: 13px; font-weight: 800; color: var(--br); margin-bottom: 16px; text-transform: uppercase;">Live Dining Floor Layout</div>
        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 14px;">
          <div style="padding: 16px; border-radius: 12px; border: 1px solid var(--green); background: #ecfdf5; text-align: center;">
            <div style="font-weight: 900; font-size: 16px;">T01</div>
            <div style="font-size: 11px; color: #065f46; margin-top: 4px;">Available</div>
          </div>

          <div style="padding: 16px; border-radius: 12px; border: 1px solid var(--blue); background: #eff6ff; text-align: center;">
            <div style="font-weight: 900; font-size: 16px;">T02</div>
            <div style="font-size: 11px; color: #1e40af; margin-top: 4px;">Occupied</div>
          </div>

          <div style="padding: 16px; border-radius: 12px; border: 1px solid var(--br); background: var(--br-light); text-align: center;">
            <div style="font-weight: 900; font-size: 16px;">T03</div>
            <div style="font-size: 11px; color: var(--br); margin-top: 4px;">Reserved</div>
          </div>

          <div style="padding: 16px; border-radius: 14px; border: 2px solid var(--br); background: var(--br-light); text-align: center; box-shadow: 0 4px 14px rgba(135,96,57,0.2);">
            <div style="font-weight: 900; font-size: 16px; color: var(--br);">T04 ✓</div>
            <div style="font-size: 11px; color: var(--br); font-weight: 800; margin-top: 4px;">SELECTED</div>
          </div>

          <div style="padding: 16px; border-radius: 12px; border: 1px solid var(--green); background: #ecfdf5; text-align: center;">
            <div style="font-weight: 900; font-size: 16px;">T05</div>
            <div style="font-size: 11px; color: #065f46; margin-top: 4px;">Available</div>
          </div>

          <div style="padding: 16px; border-radius: 12px; border: 1px solid var(--blue); background: #eff6ff; text-align: center;">
            <div style="font-weight: 900; font-size: 16px;">T06</div>
            <div style="font-size: 11px; color: #1e40af; margin-top: 4px;">Occupied</div>
          </div>
        </div>
      </div>

      <!-- Right: Selected Table Order Card -->
      <div class="card" style="padding: 24px; background: #faf8f5;">
        <div style="display: flex; justify-content: space-between; align-items: center; padding-bottom: 12px; border-bottom: 1px solid var(--line); margin-bottom: 16px;">
          <div>
            <h3 style="font-size: 20px;">Table T04 Details</h3>
            <div style="font-size: 12px; color: var(--mute);">4 Guests Seated · Seated 35 mins ago</div>
          </div>
          <span class="badge dinein">Active Bill</span>
        </div>

        <div style="display: flex; flex-direction: column; gap: 10px; margin-bottom: 20px;">
          <div style="display: flex; justify-content: space-between; font-size: 13.5px;">
            <span>Chicken Biryani × 2</span>
            <span style="font-weight: 700;">₹560</span>
          </div>
          <div style="display: flex; justify-content: space-between; font-size: 13.5px;">
            <span>Margherita Pizza × 1</span>
            <span style="font-weight: 700;">₹320</span>
          </div>
          <div style="display: flex; justify-content: space-between; font-size: 13.5px;">
            <span>Fresh Juice × 2</span>
            <span style="font-weight: 700;">₹160</span>
          </div>
        </div>

        <div style="padding-top: 12px; border-top: 1px dashed var(--line); display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
          <span style="font-size: 14px; font-weight: 600; color: var(--mute);">Table Bill Total</span>
          <span style="font-size: 22px; font-weight: 900; color: var(--br);">₹1,040</span>
        </div>

        <a href="#billing-workspace" class="btn p" style="width: 100%; text-align: center;">View Bill & Collect Payment →</a>
      </div>
    </div>
  </div>
</section>

<!-- ================= BILLING WORKSPACE ================= -->
<section id="billing-workspace" style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">PRINT & DIGITAL INVOICING</div>
      <h2>Make Every <span class="sf">Bill Clear.</span></h2>
      <p>Generate clean, compliant tax invoices with clear itemized pricing, discounts, tax breakdowns and payment status for your guests.</p>
    </div>

    <!-- Bill Invoice Card -->
    <div class="card" style="max-width: 520px; margin: 0 auto; padding: 32px; box-shadow: var(--shadow-lg);">
      <div style="text-align: center; padding-bottom: 20px; border-bottom: 2px dashed var(--line); margin-bottom: 20px;">
        <div style="font-family: 'Outfit', sans-serif; font-weight: 900; font-size: 22px; color: var(--ink);">SPICE GARDEN BISTRO</div>
        <div style="font-size: 12px; color: var(--mute); margin-top: 2px;">GSTIN: 33AAAAA0000A1Z5 · License #10019042000</div>
        <div style="font-size: 12px; color: var(--mute);">MG Road, Indiranagar, Bengaluru</div>
      </div>

      <div style="display: flex; justify-content: space-between; font-size: 12.5px; color: var(--mute); margin-bottom: 16px;">
        <div>
          <div>Bill #: <strong>INV-2048</strong></div>
          <div>Table: <strong>T08 (Dine-in)</strong></div>
        </div>
        <div style="text-align: right;">
          <div>Date: <strong>29 Sep 2026</strong></div>
          <div>Time: <strong>08:42 PM</strong></div>
        </div>
      </div>

      <!-- Item Table -->
      <table style="width: 100%; border-collapse: collapse; font-size: 13px; margin-bottom: 20px;">
        <thead>
          <tr style="border-bottom: 1px solid var(--line); text-align: left; font-size: 11px; text-transform: uppercase; color: var(--mute);">
            <th style="padding: 6px 0;">Item</th>
            <th style="padding: 6px 0; text-align: center;">Qty</th>
            <th style="padding: 6px 0; text-align: right;">Amount</th>
          </tr>
        </thead>
        <tbody>
          <tr style="border-bottom: 1px solid rgba(0,0,0,0.04);">
            <td style="padding: 8px 0; font-weight: 600;">Chicken Biryani</td>
            <td style="padding: 8px 0; text-align: center;">2</td>
            <td style="padding: 8px 0; text-align: right; font-weight: 700;">₹560.00</td>
          </tr>
          <tr style="border-bottom: 1px solid rgba(0,0,0,0.04);">
            <td style="padding: 8px 0; font-weight: 600;">Paneer Tikka</td>
            <td style="padding: 8px 0; text-align: center;">1</td>
            <td style="padding: 8px 0; text-align: right; font-weight: 700;">₹220.00</td>
          </tr>
          <tr style="border-bottom: 1px solid rgba(0,0,0,0.04);">
            <td style="padding: 8px 0; font-weight: 600;">Lime Soda</td>
            <td style="padding: 8px 0; text-align: center;">2</td>
            <td style="padding: 8px 0; text-align: right; font-weight: 700;">₹160.00</td>
          </tr>
        </tbody>
      </table>

      <!-- Calculations -->
      <div style="display: flex; flex-direction: column; gap: 6px; font-size: 13px; color: var(--mute); padding-top: 10px; border-top: 1px solid var(--line); margin-bottom: 16px;">
        <div style="display: flex; justify-content: space-between;">
          <span>Subtotal</span>
          <span style="font-weight: 700; color: var(--ink);">₹940.00</span>
        </div>
        <div style="display: flex; justify-content: space-between; color: #059669;">
          <span>Discount (Promo 5%)</span>
          <span style="font-weight: 700;">-₹50.00</span>
        </div>
        <div style="display: flex; justify-content: space-between;">
          <span>CGST (2.5%)</span>
          <span style="font-weight: 700; color: var(--ink);">₹22.25</span>
        </div>
        <div style="display: flex; justify-content: space-between;">
          <span>SGST (2.5%)</span>
          <span style="font-weight: 700; color: var(--ink);">₹22.25</span>
        </div>
        <div style="display: flex; justify-content: space-between; font-size: 18px; font-weight: 900; color: var(--ink); padding-top: 10px; border-top: 2px dashed var(--line); margin-top: 4px;">
          <span>Grand Total</span>
          <span style="color: var(--br);">₹934.50</span>
        </div>
      </div>

      <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <span style="font-size: 12px; color: var(--mute);">Payment Method</span>
        <span class="badge pending">Pending</span>
      </div>

      <!-- Buttons -->
      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
        <button class="btn p" style="padding: 10px; font-size: 13px;">Collect Payment</button>
        <button class="btn o" style="padding: 10px; font-size: 13px;">Save / Print</button>
      </div>
    </div>
  </div>
</section>

<!-- ================= DISCOUNTS & PAYMENT EXPERIENCE ================= -->
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">BILL ADJUSTMENTS & PAYMENTS</div>
      <h2>Finish Every Transaction <span class="sf">Smoothly.</span></h2>
      <p>Apply percentage or flat discounts, split payment methods, and reconcile completed transactions in real time.</p>
    </div>

    <div class="g2">
      <!-- Discount Panel -->
      <div class="card" style="padding: 28px;">
        <div class="ic" style="margin-bottom: 16px;"><svg viewBox="0 0 24 24"><path d="M20.59 13.41l-7.17 7.17a2 2 0 01-2.83 0L2 12V2h10l8.59 8.59a2 2 0 010 2.82z"/><line x1="7" y1="7" x2="7.01" y2="7"/></svg></div>
        <h3 style="font-size: 20px; margin-bottom: 8px;">Apply Discounts & Offers</h3>
        <p style="font-size: 14px; margin-bottom: 20px;">Easily apply flat amount deductions or percentage discounts before final bill settlement.</p>

        <div style="background: var(--bg2); border: 1px solid var(--line); border-radius: 14px; padding: 16px; margin-bottom: 20px;">
          <div style="display: flex; gap: 10px; margin-bottom: 12px;">
            <button style="flex: 1; padding: 8px; border-radius: 8px; border: 1.5px solid var(--br); background: #fff; font-weight: 800; color: var(--br); font-size: 13px;">Percentage (%)</button>
            <button style="flex: 1; padding: 8px; border-radius: 8px; border: 1px solid var(--line); background: #fff; font-weight: 600; color: var(--ink); font-size: 13px;">Flat Amount (₹)</button>
          </div>

          <div style="display: flex; gap: 10px;">
            <input type="text" value="10%" style="flex: 1; padding: 10px; border-radius: 8px; border: 1px solid var(--line); font-size: 14px; font-weight: 700;">
            <button class="btn p" style="padding: 10px 20px; font-size: 13px;">Apply</button>
          </div>
        </div>

        <div style="font-size: 13px; color: var(--mute);">
          Subtotal: ₹1,200 · Discount: -₹120 · Tax: ₹54 · <strong>Final: ₹1,134</strong>
        </div>
      </div>

      <!-- Multi-Payment Method Selector -->
      <div class="card" style="padding: 28px;">
        <div class="ic" style="margin-bottom: 16px;"><svg viewBox="0 0 24 24"><rect x="2" y="5" width="20" height="14" rx="2"/><line x1="2" y1="10" x2="22" y2="10"/></svg></div>
        <h3 style="font-size: 20px; margin-bottom: 8px;">Split Payment Collection</h3>
        <p style="font-size: 14px; margin-bottom: 20px;">Accept payments across Cash, Cards, UPI QR codes or split payment amounts.</p>

        <div style="background: #fff; border: 1px solid var(--line); border-radius: 14px; padding: 16px; margin-bottom: 20px;">
          <div style="display: flex; justify-content: space-between; margin-bottom: 12px; font-size: 13.5px;">
            <span>💵 Cash Received</span>
            <span style="font-weight: 800;">₹500.00</span>
          </div>
          <div style="display: flex; justify-content: space-between; margin-bottom: 12px; font-size: 13.5px;">
            <span>📱 UPI / QR Transfer</span>
            <span style="font-weight: 800;">₹655.00</span>
          </div>
          <div style="display: flex; justify-content: space-between; padding-top: 10px; border-top: 1px dashed var(--line); font-size: 14px; font-weight: 800;">
            <span>Total Paid</span>
            <span style="color: var(--green);">₹1,155.00 ✓</span>
          </div>
        </div>

        <div style="display: flex; align-items: center; gap: 8px; font-size: 13px; font-weight: 700; color: #065f46; background: #d1fae5; padding: 10px 16px; border-radius: 10px;">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
          Payment Status: PAID (Transaction Completed)
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= PAYMENT STATUS CARDS ================= -->
<section style="padding: 40px 0; background: var(--bg2);">
  <div class="w">
    <div class="g4">
      <div class="card" style="padding: 20px; border-top: 4px solid var(--green);">
        <span class="badge paid" style="margin-bottom: 8px;">PAID ✓</span>
        <h4 style="font-size: 16px; margin-bottom: 4px;">Transaction Completed</h4>
        <p style="font-size: 12.5px;">Payment fully received & receipt issued.</p>
      </div>

      <div class="card" style="padding: 20px; border-top: 4px solid var(--amber);">
        <span class="badge pending" style="margin-bottom: 8px;">PENDING</span>
        <h4 style="font-size: 16px; margin-bottom: 4px;">Payment Awaiting</h4>
        <p style="font-size: 12.5px;">Bill generated; awaiting cash/UPI settlement.</p>
      </div>

      <div class="card" style="padding: 20px; border-top: 4px solid var(--blue);">
        <span class="badge partial" style="margin-bottom: 8px;">PARTIALLY PAID</span>
        <h4 style="font-size: 16px; margin-bottom: 4px;">Partial Payment</h4>
        <p style="font-size: 12.5px;">Deposit or advance received on bill.</p>
      </div>

      <div class="card" style="padding: 20px; border-top: 4px solid var(--red);">
        <span class="badge failed" style="margin-bottom: 8px;">FAILED</span>
        <h4 style="font-size: 16px; margin-bottom: 4px;">Requires Attention</h4>
        <p style="font-size: 12.5px;">Declined digital payment attempt.</p>
      </div>
    </div>
  </div>
</section>

<!-- ================= CUSTOMER CONNECTION ================= -->
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">CRM & ORDER HISTORY</div>
      <h2>Keep Customer Information <span class="sf">Connected to Orders.</span></h2>
      <p>Recognize repeat guests, view their dining history, and attach loyalty notes directly from the POS billing screen.</p>
    </div>

    <div class="g2">
      <!-- Customer Card -->
      <div class="card" style="padding: 28px;">
        <div style="display: flex; gap: 16px; align-items: center; margin-bottom: 20px;">
          <div style="width: 52px; height: 52px; border-radius: 50%; background: var(--br-light); border: 2px solid var(--br); color: var(--br); font-weight: 900; font-size: 20px; display: grid; place-items: center;">PK</div>
          <div>
            <h3 style="font-size: 20px;">Priya Kumar</h3>
            <p style="font-size: 13px; color: var(--mute);">+91 98765 43210 · VIP Regular Guest</p>
          </div>
        </div>

        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 12px; margin-bottom: 20px; background: var(--bg2); padding: 14px; border-radius: 12px; text-align: center;">
          <div>
            <div style="font-size: 11px; color: var(--mute);">Total Visits</div>
            <div style="font-weight: 900; font-size: 18px; color: var(--ink);">08</div>
          </div>
          <div>
            <div style="font-size: 11px; color: var(--mute);">Last Visit</div>
            <div style="font-weight: 900; font-size: 14px; color: var(--ink);">29 Sep</div>
          </div>
          <div>
            <div style="font-size: 11px; color: var(--mute);">Avg Spend</div>
            <div style="font-weight: 900; font-size: 14px; color: var(--br);">₹1,150</div>
          </div>
        </div>

        <div style="font-size: 13px; color: var(--mute); border-top: 1px solid var(--line); padding-top: 12px;">
          Current Active Order: <strong>#ORD-2084</strong> (Table T08)
        </div>
      </div>

      <!-- Flow Link -->
      <div style="display: flex; flex-direction: column; justify-content: center; gap: 20px;">
        <h3 style="font-size: 24px;">Connected Customer Journey</h3>
        <p style="font-size: 15px;">Every time a bill is generated, Geni Menu connects customer preferences, repeat orders, and total spending into your analytics database.</p>

        <div style="display: flex; gap: 12px; align-items: center; font-weight: 700; font-size: 14px; flex-wrap: wrap;">
          <span style="background: #fff; padding: 10px 16px; border-radius: 10px; border: 1px solid var(--line);">CUSTOMER</span>
          <span style="color: var(--br);">→</span>
          <span style="background: #fff; padding: 10px 16px; border-radius: 10px; border: 1px solid var(--line);">ORDER</span>
          <span style="color: var(--br);">→</span>
          <span style="background: #fff; padding: 10px 16px; border-radius: 10px; border: 1px solid var(--line);">BILL</span>
          <span style="color: var(--br);">→</span>
          <span style="background: #fff; padding: 10px 16px; border-radius: 10px; border: 1px solid var(--line);">PAYMENT</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= PEAK-HOUR POS ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">HIGH VOLUME PERFORMANCE</div>
      <h2>Built for <span class="sf">Busy Restaurant Counters.</span></h2>
      <p>Handle high dinner-rush order volumes with live status counters and instant table order tracking.</p>
    </div>

    <!-- Active Counters -->
    <div class="g3" style="margin-bottom: 32px;">
      <div class="card" style="padding: 20px; text-align: center;">
        <div style="font-size: 12px; font-weight: 800; color: var(--mute); text-transform: uppercase;">Active Live Orders</div>
        <div style="font-size: 36px; font-weight: 900; color: var(--br); margin-top: 4px;">18</div>
      </div>

      <div class="card" style="padding: 20px; text-align: center;">
        <div style="font-size: 12px; font-weight: 800; color: var(--mute); text-transform: uppercase;">Pending Payments</div>
        <div style="font-size: 36px; font-weight: 900; color: var(--amber); margin-top: 4px;">04</div>
      </div>

      <div class="card" style="padding: 20px; text-align: center;">
        <div style="font-size: 12px; font-weight: 800; color: var(--mute); text-transform: uppercase;">Completed Bills Today</div>
        <div style="font-size: 36px; font-weight: 900; color: var(--green); margin-top: 4px;">42</div>
      </div>
    </div>

    <!-- Order Stream Cards -->
    <div class="g3">
      <div class="card" style="padding: 20px;">
        <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
          <strong style="font-size: 15px;">#ORD-2088</strong>
          <span class="badge dinein">Table T12</span>
        </div>
        <div style="font-size: 13px; color: var(--mute); margin-bottom: 12px;">4 Items · KOT Sent</div>
        <div style="display: flex; justify-content: space-between; align-items: center; font-size: 12px; font-weight: 700; color: var(--amber);">
          <span>Preparing in Kitchen</span>
          <span>₹840</span>
        </div>
      </div>

      <div class="card" style="padding: 20px;">
        <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
          <strong style="font-size: 15px;">#ORD-2089</strong>
          <span class="badge takeaway">Takeaway</span>
        </div>
        <div style="font-size: 13px; color: var(--mute); margin-bottom: 12px;">3 Items · Packed</div>
        <div style="display: flex; justify-content: space-between; align-items: center; font-size: 12px; font-weight: 700; color: var(--green);">
          <span>Ready for Handover</span>
          <span>₹460</span>
        </div>
      </div>

      <div class="card" style="padding: 20px;">
        <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
          <strong style="font-size: 15px;">#ORD-2090</strong>
          <span class="badge dinein">Table T06</span>
        </div>
        <div style="font-size: 13px; color: var(--mute); margin-bottom: 12px;">5 Items · Bill Printed</div>
        <div style="display: flex; justify-content: space-between; align-items: center; font-size: 12px; font-weight: 700; color: var(--br);">
          <span>Payment Pending</span>
          <span>₹1,280</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= SERVICE JOURNEY ================= -->
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">END-TO-END RESTAURANT FLOW</div>
      <h2>From Order to <span class="sf">Payment.</span></h2>
      <p>See how Geni Menu POS fits seamlessly into your entire dining room service workflow.</p>
    </div>

    <!-- 10 Step Flow Grid -->
    <div class="g5" style="display: grid; grid-template-columns: repeat(5, 1fr); gap: 14px; margin-bottom: 36px;">
      <div style="background: var(--bg2); border: 1px solid var(--line); border-radius: 12px; padding: 14px; text-align: center;">
        <div style="font-weight: 900; color: var(--br); font-size: 12px;">STEP 01</div>
        <div style="font-weight: 800; font-size: 13.5px; margin-top: 4px;">Guest Arrives</div>
      </div>
      <div style="background: var(--bg2); border: 1px solid var(--line); border-radius: 12px; padding: 14px; text-align: center;">
        <div style="font-weight: 900; color: var(--br); font-size: 12px;">STEP 02</div>
        <div style="font-weight: 800; font-size: 13.5px; margin-top: 4px;">Table Assigned</div>
      </div>
      <div style="background: var(--bg2); border: 1px solid var(--line); border-radius: 12px; padding: 14px; text-align: center;">
        <div style="font-weight: 900; color: var(--br); font-size: 12px;">STEP 03</div>
        <div style="font-weight: 800; font-size: 13.5px; margin-top: 4px;">Menu Viewed</div>
      </div>
      <div style="background: var(--bg2); border: 1px solid var(--line); border-radius: 12px; padding: 14px; text-align: center;">
        <div style="font-weight: 900; color: var(--br); font-size: 12px;">STEP 04</div>
        <div style="font-weight: 800; font-size: 13.5px; margin-top: 4px;">Order Created</div>
      </div>
      <div style="background: var(--bg2); border: 1px solid var(--line); border-radius: 12px; padding: 14px; text-align: center;">
        <div style="font-weight: 900; color: var(--br); font-size: 12px;">STEP 05</div>
        <div style="font-weight: 800; font-size: 13.5px; margin-top: 4px;">KOT Sent</div>
      </div>
      <div style="background: var(--bg2); border: 1px solid var(--line); border-radius: 12px; padding: 14px; text-align: center;">
        <div style="font-weight: 900; color: var(--br); font-size: 12px;">STEP 06</div>
        <div style="font-weight: 800; font-size: 13.5px; margin-top: 4px;">Kitchen Prepares</div>
      </div>
      <div style="background: var(--bg2); border: 1px solid var(--line); border-radius: 12px; padding: 14px; text-align: center;">
        <div style="font-weight: 900; color: var(--br); font-size: 12px;">STEP 07</div>
        <div style="font-weight: 800; font-size: 13.5px; margin-top: 4px;">Food Served</div>
      </div>
      <div style="background: var(--br); color: #fff; border-radius: 12px; padding: 14px; text-align: center; box-shadow: 0 4px 14px rgba(135,96,57,0.3);">
        <div style="font-weight: 900; color: var(--br-gold); font-size: 12px;">STEP 08</div>
        <div style="font-weight: 800; font-size: 13.5px; margin-top: 4px; color: #fff;">Bill Generated</div>
      </div>
      <div style="background: var(--br); color: #fff; border-radius: 12px; padding: 14px; text-align: center; box-shadow: 0 4px 14px rgba(135,96,57,0.3);">
        <div style="font-weight: 900; color: var(--br-gold); font-size: 12px;">STEP 09</div>
        <div style="font-weight: 800; font-size: 13.5px; margin-top: 4px; color: #fff;">Payment Completed</div>
      </div>
      <div style="background: var(--bg2); border: 1px solid var(--line); border-radius: 12px; padding: 14px; text-align: center;">
        <div style="font-weight: 900; color: var(--br); font-size: 12px;">STEP 10</div>
        <div style="font-weight: 800; font-size: 13.5px; margin-top: 4px;">Table Available</div>
      </div>
    </div>

    <div style="text-align: center; font-size: 16px; font-weight: 700; color: var(--br);">
      “POS is where restaurant orders become completed transactions.”
    </div>
  </div>
</section>

<!-- ================= BUSINESS VISIBILITY & REPORTING ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">SALES ANALYTICS</div>
      <h2>Every Transaction Becomes <span class="sf">Business Data.</span></h2>
      <p>Turn counter billing activity into real-time operational insights, daily revenue totals and order type distributions.</p>
    </div>

    <div class="g2">
      <!-- Metrics Card -->
      <div class="card" style="padding: 28px;">
        <h3 style="font-size: 18px; margin-bottom: 20px;">Today's Sales Summary</h3>
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
          <div style="background: var(--bg2); padding: 16px; border-radius: 12px; border: 1px solid var(--line);">
            <div style="font-size: 12px; color: var(--mute);">Total Gross Revenue</div>
            <div style="font-size: 26px; font-weight: 900; color: var(--br); margin-top: 4px;">₹48,620</div>
          </div>
          <div style="background: var(--bg2); padding: 16px; border-radius: 12px; border: 1px solid var(--line);">
            <div style="font-size: 12px; color: var(--mute);">Total Orders</div>
            <div style="font-size: 26px; font-weight: 900; color: var(--ink); margin-top: 4px;">186</div>
          </div>
          <div style="background: var(--bg2); padding: 16px; border-radius: 12px; border: 1px solid var(--line);">
            <div style="font-size: 12px; color: var(--mute);">Avg Order Value</div>
            <div style="font-size: 26px; font-weight: 900; color: var(--ink); margin-top: 4px;">₹261</div>
          </div>
          <div style="background: var(--bg2); padding: 16px; border-radius: 12px; border: 1px solid var(--line);">
            <div style="font-size: 12px; color: var(--mute);">Collected Paid</div>
            <div style="font-size: 26px; font-weight: 900; color: var(--green); margin-top: 4px;">₹45,280</div>
          </div>
        </div>
      </div>

      <!-- Sales by Hour Bar Chart -->
      <div class="card" style="padding: 28px;">
        <h3 style="font-size: 18px; margin-bottom: 20px;">Sales Distribution by Hour</h3>
        <div class="bar-chart">
          <div class="bar-row">
            <div class="bar-label">12 PM</div>
            <div class="bar-track"><div class="bar-fill" style="width: 45%;"></div></div>
            <div class="bar-count">₹4,200</div>
          </div>
          <div class="bar-row">
            <div class="bar-label">2 PM</div>
            <div class="bar-track"><div class="bar-fill" style="width: 75%;"></div></div>
            <div class="bar-count">₹8,900</div>
          </div>
          <div class="bar-row">
            <div class="bar-label">4 PM</div>
            <div class="bar-track"><div class="bar-fill" style="width: 30%;"></div></div>
            <div class="bar-count">₹2,800</div>
          </div>
          <div class="bar-row">
            <div class="bar-label">8 PM</div>
            <div class="bar-track"><div class="bar-fill" style="width: 95%;"></div></div>
            <div class="bar-count">₹14,500</div>
          </div>
          <div class="bar-row">
            <div class="bar-label">10 PM</div>
            <div class="bar-track"><div class="bar-fill" style="width: 60%;"></div></div>
            <div class="bar-count">₹7,200</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= ROLE-BASED POS & BENEFITS ================= -->
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">ROLE-BASED WORKSPACES</div>
      <h2>Give Every Team Member the <span class="sf">Right Workspace.</span></h2>
      <p>Customized POS views for Cashiers, Waiters, Managers and Restaurant Admins.</p>
    </div>

    <div class="g4">
      <div class="card" style="padding: 24px;">
        <h3 style="font-size: 18px; margin-bottom: 8px;">Cashier</h3>
        <p style="font-size: 13.5px; color: var(--mute); margin-bottom: 14px;">Focused on speed billing and cash collection.</p>
        <ul style="font-size: 13px; display: flex; flex-direction: column; gap: 6px; color: var(--ink);">
          <li>✓ Create fast orders</li>
          <li>✓ Generate bill invoices</li>
          <li>✓ Process cash/UPI payments</li>
        </ul>
      </div>

      <div class="card" style="padding: 24px;">
        <h3 style="font-size: 18px; margin-bottom: 8px;">Waiter</h3>
        <p style="font-size: 13.5px; color: var(--mute); margin-bottom: 14px;">Mobile table-side order entry.</p>
        <ul style="font-size: 13px; display: flex; flex-direction: column; gap: 6px; color: var(--ink);">
          <li>✓ Table order creation</li>
          <li>✓ Add item modifiers</li>
          <li>✓ View open table tabs</li>
        </ul>
      </div>

      <div class="card" style="padding: 24px;">
        <h3 style="font-size: 18px; margin-bottom: 8px;">Manager</h3>
        <p style="font-size: 13.5px; color: var(--mute); margin-bottom: 14px;">Floor supervision and void/discount approvals.</p>
        <ul style="font-size: 13px; display: flex; flex-direction: column; gap: 6px; color: var(--ink);">
          <li>✓ Monitor live sales</li>
          <li>✓ Review register totals</li>
          <li>✓ Manage active orders</li>
        </ul>
      </div>

      <div class="card" style="padding: 24px;">
        <h3 style="font-size: 18px; margin-bottom: 8px;">Admin</h3>
        <p style="font-size: 13.5px; color: var(--mute); margin-bottom: 14px;">Complete business configuration.</p>
        <ul style="font-size: 13px; display: flex; flex-direction: column; gap: 6px; color: var(--ink);">
          <li>✓ Configure POS settings</li>
          <li>✓ Review sales reports</li>
          <li>✓ Manage tax/pricing rules</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ================= RESTAURANT INDUSTRIES ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd">
      <div class="eb">MULTI-FORMAT COMPATIBILITY</div>
      <h2>POS Built for <span class="sf">Different Food Businesses.</span></h2>
      <p>Whether you run a fast-paced QSR, a fine dining restaurant, a cozy café or a bakery, Geni Menu adapts to your operational style.</p>
    </div>

    <div class="ind-grid">
      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&w=600&q=80');">
          <div class="ind-overlay"></div>
          <div class="ind-icon"><svg viewBox="0 0 24 24"><path d="M4 19h16M4 15h16M4 11h16M8 7v4M16 7v4"/></svg></div>
        </div>
        <div class="ind-content">
          <h4>Fine Dining</h4>
          <p>Table-side ordering, course management, and elegant split billing.</p>
        </div>
      </div>

      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1555396273-367ea4eb4db5?auto=format&fit=crop&w=600&q=80');">
          <div class="ind-overlay"></div>
          <div class="ind-icon"><svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/></svg></div>
        </div>
        <div class="ind-content">
          <h4>QSR & Fast Food</h4>
          <p>Ultra-fast counter ordering with direct printer receipt generation.</p>
        </div>
      </div>

      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1501339847302-ac426a4a7cbb?auto=format&fit=crop&w=600&q=80');">
          <div class="ind-overlay"></div>
          <div class="ind-icon"><svg viewBox="0 0 24 24"><path d="M18 8h1a4 4 0 010 8h-1M2 8h16v9a4 4 0 01-4 4H6a4 4 0 01-4-4V8z"/></svg></div>
        </div>
        <div class="ind-content">
          <h4>Cafés & Bakeries</h4>
          <p>Quick beverage selection, cake customization add-ons, and instant checkout.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= POS + RESTAURANT ECOSYSTEM ================= -->
<section>
  <div class="w">
    <div class="hd">
      <div class="eb">CONNECTED PLATFORM</div>
      <h2>Your POS Is Connected to the <span class="sf">Rest of Your Restaurant.</span></h2>
      <p>Geni Menu POS acts as the central engine connecting every digital workflow in your establishment.</p>
    </div>

    <div class="card" style="padding: 40px; text-align: center; background: linear-gradient(180deg, #ffffff 0%, #faf8f5 100%);">
      <div style="display: inline-block; padding: 14px 28px; background: var(--br); color: #fff; border-radius: 16px; font-weight: 900; font-size: 20px; font-family: 'Outfit', sans-serif; box-shadow: 0 8px 24px rgba(135,96,57,0.3); margin-bottom: 32px;">
        CENTRAL POS ENGINE
      </div>

      <div class="g4" style="text-align: left;">
        <div style="background: #fff; border: 1px solid var(--line); border-radius: 14px; padding: 16px;">
          <h4 style="font-size: 15px; margin-bottom: 4px; color: var(--br);">Menu Management</h4>
          <p style="font-size: 12.5px;">Prices, stock & item variants update automatically on POS.</p>
        </div>

        <div style="background: #fff; border: 1px solid var(--line); border-radius: 14px; padding: 16px;">
          <h4 style="font-size: 15px; margin-bottom: 4px; color: var(--br);">Table Management</h4>
          <p style="font-size: 12.5px;">Live table status & occupied bills sync instantly.</p>
        </div>

        <div style="background: #fff; border: 1px solid var(--line); border-radius: 14px; padding: 16px;">
          <h4 style="font-size: 15px; margin-bottom: 4px; color: var(--br);">KOT Management</h4>
          <p style="font-size: 12.5px;">Orders created on POS trigger immediate kitchen tickets.</p>
        </div>

        <div style="background: #fff; border: 1px solid var(--line); border-radius: 14px; padding: 16px;">
          <h4 style="font-size: 15px; margin-bottom: 4px; color: var(--br);">Reports & Analytics</h4>
          <p style="font-size: 12.5px;">Completed billing feeds real-time sales and revenue reporting.</p>
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
      <p>Everything you need to know about Geni Menu POS Management.</p>
    </div>

    <div class="faq-list">
      <div class="faq-item open">
        <div class="faq-q" onclick="faq(this)">
          1. What is POS Management in Geni Menu?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          POS Management in Geni Menu is the central restaurant billing and transaction workspace connecting menu items, tables, orders, discounts, and payments into one fast cash counter system.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="faq(this)">
          2. Can I create restaurant orders directly from the POS?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Cashiers and staff can select menu items, choose portion sizes or add-ons, assign table numbers or order types, and create instant bills from the POS.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="faq(this)">
          3. Does the POS connect automatically with my menu?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Any prices, categories, item availability, or modifier changes updated in Menu Management sync immediately to the POS screen.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="faq(this)">
          4. Can POS orders be linked directly to table numbers?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. For dine-in service, POS orders connect to specific tables, allowing staff to add items to an open table tab and settle the bill when guests finish dining.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="faq(this)">
          5. Does the POS support takeaway and delivery orders?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. You can switch between Dine-in, Takeaway, Delivery, and Pickup order modes with one click on the POS interface.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="faq(this)">
          6. How are taxes and discounts handled on the bill?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Geni Menu POS automatically calculates configured GST taxes and lets staff apply percentage or flat discount vouchers prior to payment collection.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="faq(this)">
          7. What payment methods are recorded in the POS?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          The POS records Cash, Card, UPI QR transfers, and split payment totals to ensure accurate end-of-day register balancing.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="faq(this)">
          8. Does POS data feed into business reports?
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Every settled bill updates your sales dashboard, revenue reports, item performance analytics, and payment collection breakdown in real time.
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= FINAL CTA ================= -->
<section style="padding: 96px 0; background: linear-gradient(135deg, #1e140e 0%, #2e2017 100%); color: #fff;">
  <div class="w" style="text-align: center; max-width: 800px;">
    <div class="eb" style="background: rgba(255,255,255,0.08); border-color: rgba(255,255,255,0.18); color: var(--br-gold);">TRANSFORM YOUR BILLING COUNTER</div>
    <h2 style="color: #fff; font-size: clamp(32px, 4vw, 48px); margin-bottom: 20px;">
      Bring Orders, Billing and <span style="color: var(--br-gold); font-family: 'Playfair Display', Georgia, serif; font-style: italic;">Payments Together.</span>
    </h2>
    <p style="color: #c7b8a8; font-size: 18px; margin-bottom: 36px; line-height: 1.6;">
      Give your restaurant team a connected POS built around real restaurant service — from order creation to completed payment.
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
