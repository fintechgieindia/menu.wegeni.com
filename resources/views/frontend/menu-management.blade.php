@php
    $meta = [
        'title' => 'Menu Management — Geni Menu | WeGeni',
        'description' => 'Create, organize and manage your restaurant menu from one simple dashboard. Update dishes, categories, prices, and availability instantly with Geni Menu.',
        'keywords' => 'restaurant menu management, digital menu software, QR code menu, restaurant menu editor, menu availability control, price management, Geni Menu, WeGeni'
    ];
@endphp

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

/* Typography */
h1, h2, h3, h4, h5 {
  margin: 0;
  font-family: 'Outfit', 'Plus Jakarta Sans', sans-serif;
  font-weight: 800;
  line-height: 1.14;
  letter-spacing: -0.03em;
  color: var(--ink);
}
h1 { font-size: clamp(38px, 5.5vw, 64px); font-weight: 800; }
h2 { font-size: clamp(30px, 4vw, 46px); font-weight: 800; }
h3 { font-size: 21px; font-weight: 700; color: var(--ink); }
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
section { padding: clamp(64px, 8vw, 100px) 0; background: var(--bg); position: relative; overflow: hidden; }
.hd { max-width: 740px; margin: 0 auto 56px; text-align: center; }
.hd p { margin-top: 16px; font-size: 18px; }

/* Buttons */
.btn { display: inline-flex; align-items: center; justify-content: center; gap: 8px; padding: 14px 28px; border-radius: 12px; font: 700 15px 'Plus Jakarta Sans', sans-serif; border: 1px solid var(--br); transition: .25s ease; cursor: pointer; text-decoration: none; }
.btn.p { background: linear-gradient(135deg, #876039 0%, #a87646 100%); color: #fff; box-shadow: 0 4px 16px rgba(135, 96, 57, 0.28); }
.btn.p:hover { transform: translateY(-2px); background: linear-gradient(135deg, #6f4e2d 0%, #876039 100%); box-shadow: 0 8px 24px rgba(135, 96, 57, 0.38); }
.btn.o { color: var(--br); background: #fff; }
.btn.o:hover { background: var(--br); color: #fff; transform: translateY(-2px); }

/* Breadcrumb */
.bc { padding: 104px 0 16px; background: var(--bg2); border-bottom: 1px solid var(--line); font-size: 14px; color: var(--mute); font-weight: 600; }
.bc .w { display: flex; align-items: center; gap: 8px; flex-wrap: wrap; }
.bc a { color: var(--mute); transition: color .2s; }
.bc a:hover { color: var(--br); }
.bc span { color: var(--br); font-weight: 700; }

/* Cards & UI Windows */
.card { position: relative; overflow: hidden; background: var(--card); border: 1px solid var(--line); border-radius: 20px; box-shadow: var(--shadow-sm); transition: transform .3s ease, box-shadow .3s ease, border-color .3s ease; }
.card:hover { border-color: rgba(135, 96, 57, 0.38); box-shadow: var(--shadow-md); }

.ic { width: 46px; height: 46px; border-radius: 13px; background: var(--bg2); color: var(--br); display: grid; place-items: center; flex: none; border: 1px solid var(--line); transition: .3s ease; }
.ic svg { width: 22px; height: 22px; fill: none; stroke: currentColor; stroke-width: 1.8; stroke-linecap: round; stroke-linejoin: round; }
.card:hover .ic { background: var(--br); color: #fff; border-color: var(--br); }

/* Dashboard Window Mockup */
.win { background: #fff; color: #211D19; border: 1px solid var(--line); border-radius: 20px; overflow: hidden; box-shadow: var(--shadow-md); font-size: 13px; max-width: 100%; }
.wb { display: flex; align-items: center; justify-content: space-between; padding: 12px 18px; background: var(--bg2); border-bottom: 1px solid var(--line); flex-wrap: wrap; gap: 6px; }
.wb .dots { display: flex; gap: 6px; }
.wb i { width: 10px; height: 10px; border-radius: 50%; background: #d8c9b8; display: inline-block; }
.wb i:nth-child(1) { background: #ff5f56; }
.wb i:nth-child(2) { background: #ffbd2e; }
.wb i:nth-child(3) { background: #27c93f; }
.wb .ttl { color: var(--br); font-weight: 800; font-family: 'Outfit', sans-serif; letter-spacing: 0.05em; font-size: 13px; text-transform: uppercase; }

/* Mobile Phone Mockup */
.ph-frame { width: 270px; border-radius: 40px; background: #1c1815; padding: 10px; box-shadow: 0 24px 50px rgba(36, 26, 20, 0.3); border: 2px solid #3d342d; flex: none; margin: 0 auto; max-width: 100%; }
.ph-inner { height: 510px; border-radius: 32px; background: #fff; color: var(--ink); padding: 20px 14px 14px; display: flex; flex-direction: column; gap: 10px; overflow: hidden; position: relative; }
.ph-header { text-align: center; padding-bottom: 8px; border-bottom: 1px solid var(--line); }
.ph-header h6 { margin: 0; font-family: 'Outfit', sans-serif; font-size: 15px; font-weight: 800; color: var(--ink); }
.ph-header p { font-size: 11px; color: var(--mute); }
.ph-cats { display: flex; gap: 6px; overflow-x: auto; padding-bottom: 4px; scrollbar-width: none; }
.ph-cat { padding: 5px 12px; border-radius: 20px; font-size: 11px; font-weight: 700; white-space: nowrap; background: var(--bg2); color: var(--mute); border: 1px solid var(--line); }
.ph-cat.act { background: var(--br); color: #fff; border-color: var(--br); }

.ph-item { display: flex; gap: 10px; padding: 8px; border: 1px solid var(--line); border-radius: 14px; background: #fff; align-items: center; }
.ph-img { width: 44px; height: 44px; border-radius: 10px; background-size: cover; background-position: center; flex: none; }
.ph-info { flex: 1; min-width: 0; }
.ph-info h5 { margin: 0; font-size: 13px; font-weight: 700; color: var(--ink); line-height: 1.2; }
.ph-info p { font-size: 11px; color: var(--br); font-weight: 800; margin-top: 2px; }
.ph-badge { font-size: 9px; font-weight: 800; padding: 2px 6px; border-radius: 6px; text-transform: uppercase; }
.ph-badge.avail { background: #d1fae5; color: #065f46; }
.ph-badge.unavail { background: #fee2e2; color: #991b1b; }

/* Reveal Animations */
.r { opacity: 0; transform: translateY(24px); transition: opacity .6s cubic-bezier(0.16, 1, 0.3, 1), transform .6s cubic-bezier(0.16, 1, 0.3, 1); }
.r.in { opacity: 1; transform: none; }

/* Feature Specific Styles */
.hero-split { display: grid; grid-template-columns: 1fr 1.15fr; gap: 40px; align-items: center; }
.hero-combo { display: flex; gap: 20px; align-items: center; }

/* Availability Toggle Switch */
.tgl-sw { width: 44px; height: 24px; background: #cbd5e1; border-radius: 12px; padding: 2px; cursor: pointer; transition: background .3s; display: inline-block; vertical-align: middle; }
.tgl-sw.on { background: var(--green); }
.tgl-sw .tgl-knob { width: 20px; height: 20px; background: #fff; border-radius: 50%; transition: transform .3s; box-shadow: 0 1px 3px rgba(0,0,0,0.2); }
.tgl-sw.on .tgl-knob { transform: translateX(20px); }

/* Industry Grid */
.ind-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; }
.ind-card { border-radius: 18px; overflow: hidden; background: #fff; border: 1px solid var(--line); transition: transform .3s, box-shadow .3s; position: relative; }
.ind-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-md); border-color: rgba(135,96,57,0.3); }
.ind-img { height: 160px; background-size: cover; background-position: center; position: relative; }
.ind-overlay { position: absolute; inset: 0; background: linear-gradient(180deg, transparent 40%, rgba(36, 26, 20, 0.85) 100%); }
.ind-content { padding: 18px; }
.ind-content h4 { font-size: 18px; margin-bottom: 6px; }
.ind-content p { font-size: 14px; }

/* FAQ Accordion */
.faq-list { max-width: 840px; margin: 0 auto; display: flex; flex-direction: column; gap: 14px; }
.faq-item { background: #fff; border: 1px solid var(--line); border-radius: 16px; overflow: hidden; transition: border-color .2s; }
.faq-item.open { border-color: var(--br); }
.faq-q { padding: 20px 24px; font-size: 17px; font-weight: 700; color: var(--ink); cursor: pointer; display: flex; justify-content: space-between; align-items: center; user-select: none; }
.faq-q svg { width: 20px; height: 20px; transition: transform .3s; stroke: var(--br); }
.faq-item.open .faq-q svg { transform: rotate(180deg); }
.faq-a { padding: 0 24px 20px; font-size: 15px; color: var(--mute); display: none; line-height: 1.65; border-top: 1px solid rgba(135,96,57,0.08); padding-top: 16px; }
.faq-item.open .faq-a { display: block; }

/* Responsive adjustments */
@media (max-width: 1024px) {
  .hero-split { grid-template-columns: 1fr; gap: 32px; }
  .ind-grid { grid-template-columns: repeat(2, 1fr); }
  .hero-combo { flex-direction: column; }
}
@media (max-width: 768px) {
  .bc { padding: 85px 0 14px; }
  .w { padding: 0 16px; }
  .ind-grid { grid-template-columns: 1fr; }
  .hero-combo { width: 100%; }
  .win { min-width: 0 !important; width: 100%; }
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
    <span>Menu Management</span>
  </div>
</div>

<!-- ================= SECTION 3: HERO SECTION ================= -->
<section style="background: linear-gradient(180deg, var(--bg2) 0%, #ffffff 100%);">
  <div class="w">
    <div class="hero-split">
      <!-- Hero Left Copy -->
      <div class="r in">
        <div class="eb">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/><path d="M9 8h6"/><path d="M9 12h4"/></svg>
          MENU MANAGEMENT
        </div>
        <h1>Your Entire Menu.<br><span class="sf">One Simple Dashboard.</span></h1>
        <p style="margin: 20px 0 32px; font-size: 18px; max-width: 520px;">
          Create, organize and manage your restaurant menu from one place. Update dishes, categories, prices, availability and more — whenever your business needs it.
        </p>
        <div style="display: flex; gap: 14px; flex-wrap: wrap;">
          <a href="{{ route('restaurant_signup') }}" class="btn p">Get Started →</a>
          <a href="{{ route('contact.us') }}" class="btn o">Book a Demo</a>
        </div>
        <div style="margin-top: 28px; font-size: 14px; color: var(--mute); font-weight: 600; display: flex; align-items: center; gap: 16px;">
          <span>✓ Instant Real-time Sync</span>
          <span>✓ No Re-printing Costs</span>
        </div>
      </div>

      <!-- Hero Visual: Dashboard + Phone Combo -->
      <div class="hero-combo r in" style="transition-delay: 0.15s;">
        <!-- Restaurant Management Dashboard -->
        <div class="win" style="flex: 1; min-width: 320px;">
          <div class="wb">
            <div class="dots"><i></i><i></i><i></i></div>
            <div class="ttl">MENU MANAGEMENT</div>
            <div style="font-size: 11px; background: #e2d5c0; color: var(--ink); padding: 3px 8px; border-radius: 6px; font-weight: 700;">LIVE DEMO</div>
          </div>
          <div style="padding: 16px; background: #fff;">
            <!-- Top Action Bar -->
            <div style="display: flex; justify-content: space-between; gap: 10px; margin-bottom: 14px;">
              <input type="text" placeholder="Search menu items..." style="padding: 7px 12px; border: 1px solid var(--line); border-radius: 8px; font-size: 12px; width: 65%;">
              <button style="background: var(--br); color: #fff; border: 0; padding: 7px 12px; border-radius: 8px; font-weight: 700; font-size: 12px; cursor: pointer;">+ Add Item</button>
            </div>

            <div style="display: grid; grid-template-columns: 110px 1fr; gap: 12px;">
              <!-- Sidebar Categories -->
              <div style="background: var(--bg2); border-radius: 10px; padding: 8px; border: 1px solid var(--line); font-size: 11px; font-weight: 700;">
                <div style="color: var(--mute); font-size: 9px; text-transform: uppercase; margin-bottom: 6px;">Categories</div>
                <div style="padding: 5px 8px; border-radius: 6px; background: var(--br); color: #fff; margin-bottom: 4px;">All Items</div>
                <div style="padding: 5px 8px; color: var(--ink);">Starters</div>
                <div style="padding: 5px 8px; color: var(--ink);">Main Course</div>
                <div style="padding: 5px 8px; color: var(--ink);">Biryani</div>
                <div style="padding: 5px 8px; color: var(--ink);">Beverages</div>
                <div style="padding: 5px 8px; color: var(--ink);">Desserts</div>
              </div>

              <!-- Menu Items List -->
              <div style="display: flex; flex-direction: column; gap: 8px;">
                <div style="font-size: 10px; font-weight: 800; color: var(--mute); letter-spacing: 0.05em;">MENU ITEMS</div>
                
                <div style="display: flex; justify-content: space-between; align-items: center; padding: 8px 10px; border: 1px solid var(--line); border-radius: 8px; background: #fff;">
                  <div>
                    <div style="font-weight: 700; color: var(--ink);">Chicken Biryani</div>
                    <div style="color: var(--br); font-weight: 800;">₹240</div>
                  </div>
                  <div style="color: var(--green); font-size: 11px; font-weight: 700;">● Available</div>
                </div>

                <div style="display: flex; justify-content: space-between; align-items: center; padding: 8px 10px; border: 1px solid var(--line); border-radius: 8px; background: #fff;">
                  <div>
                    <div style="font-weight: 700; color: var(--ink);">Paneer Butter Masala</div>
                    <div style="color: var(--br); font-weight: 800;">₹220</div>
                  </div>
                  <div style="color: var(--green); font-size: 11px; font-weight: 700;">● Available</div>
                </div>

                <div style="display: flex; justify-content: space-between; align-items: center; padding: 8px 10px; border: 1px solid var(--line); border-radius: 8px; background: #fff;">
                  <div>
                    <div style="font-weight: 700; color: var(--ink);">Chicken 65</div>
                    <div style="color: var(--br); font-weight: 800;">₹180</div>
                  </div>
                  <div style="color: var(--green); font-size: 11px; font-weight: 700;">● Available</div>
                </div>

                <div style="display: flex; justify-content: space-between; align-items: center; padding: 8px 10px; border: 1px solid var(--line); border-radius: 8px; background: #fff; opacity: 0.7;">
                  <div>
                    <div style="font-weight: 700; color: var(--ink);">Fresh Lime Soda</div>
                    <div style="color: var(--br); font-weight: 800;">₹80</div>
                  </div>
                  <div style="color: var(--red); font-size: 11px; font-weight: 700;">○ Unavailable</div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Phone Customer Preview -->
        <div class="ph-frame">
          <div class="ph-inner">
            <div class="ph-header">
              <h6>Geni Bistro Menu</h6>
              <p>Scan & Order Online</p>
            </div>
            <div class="ph-cats">
              <div class="ph-cat act">All</div>
              <div class="ph-cat">Biryani</div>
              <div class="ph-cat">Main</div>
              <div class="ph-cat">Drinks</div>
            </div>

            <div class="ph-item">
              <div class="ph-img" style="background-image: url('https://images.unsplash.com/photo-1563379091339-03b21ab4a4f8?w=300&auto=format&fit=crop&q=80');"></div>
              <div class="ph-info">
                <h5>Chicken Biryani</h5>
                <p>₹240</p>
              </div>
              <span class="ph-badge avail">● Available</span>
            </div>

            <div class="ph-item">
              <div class="ph-img" style="background-image: url('https://images.unsplash.com/photo-1631452180519-c014fe946bc7?w=300&auto=format&fit=crop&q=80');"></div>
              <div class="ph-info">
                <h5>Paneer Masala</h5>
                <p>₹220</p>
              </div>
              <span class="ph-badge avail">● Available</span>
            </div>

            <div class="ph-item" style="opacity: 0.6;">
              <div class="ph-img" style="background-image: url('https://images.unsplash.com/photo-1513558161293-cdaf765ed2fd?w=300&auto=format&fit=crop&q=80');"></div>
              <div class="ph-info">
                <h5>Fresh Lime Soda</h5>
                <p>₹80</p>
              </div>
              <span class="ph-badge unavail">Sold Out</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 4: QUICK VALUE STRIP ================= -->
<section style="padding: 40px 0; background: var(--bg2); border-y: 1px solid var(--line);">
  <div class="w">
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 20px;">
      
      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 14px;">
          <svg viewBox="0 0 24 24"><path d="M21.5 2v6h-6"/><path d="M21.34 15.57a10 10 0 1 1-.57-8.38l5.67-5.67"/></svg>
        </div>
        <h4 style="font-size: 17px; margin-bottom: 6px;">Instant Updates</h4>
        <p style="font-size: 14px;">Change menu information whenever you need.</p>
      </div>

      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 14px;">
          <svg viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h16"/><path d="M8 6v12M16 6v12"/></svg>
        </div>
        <h4 style="font-size: 17px; margin-bottom: 6px;">Easy Organization</h4>
        <p style="font-size: 14px;">Keep dishes and categories structured.</p>
      </div>

      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 14px;">
          <svg viewBox="0 0 24 24"><path d="M18.36 6.64a9 9 0 1 1-12.73 0"/><line x1="12" y1="2" x2="12" y2="12"/></svg>
        </div>
        <h4 style="font-size: 17px; margin-bottom: 6px;">Availability Control</h4>
        <p style="font-size: 14px;">Show customers what's currently available.</p>
      </div>

      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 14px;">
          <svg viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
        </div>
        <h4 style="font-size: 17px; margin-bottom: 6px;">One Central Menu</h4>
        <p style="font-size: 14px;">Manage your entire menu from one place.</p>
      </div>

    </div>
  </div>
</section>

<!-- ================= SECTION 5: PROBLEM SECTION ================= -->
<section>
  <div class="w">
    <div class="hd r">
      <h2>Still Managing Your Menu <span class="sf">the Hard Way?</span></h2>
      <p>
        Your menu changes every day. New dishes, price changes, sold-out items and seasonal specials shouldn't mean rebuilding your menu every time.
      </p>
    </div>

    <!-- Visual Comparison -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 32px; align-items: stretch;">
      <!-- Traditional Menu Workflow -->
      <div class="card" style="padding: 32px; background: #fff5f5; border-color: #fecdd3;">
        <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 20px;">
          <div style="width: 36px; height: 36px; border-radius: 10px; background: #fee2e2; color: #dc2626; display: grid; place-items: center; font-weight: 800;">✕</div>
          <h3 style="color: #991b1b; font-size: 20px;">Traditional Paper Menu</h3>
        </div>

        <div style="display: flex; flex-direction: column; gap: 12px; text-align: center; font-weight: 700; color: #7f1d1d;">
          <div style="padding: 12px; background: #fff; border-radius: 10px; border: 1px solid #fca5a5;">📄 Printed Paper Menu</div>
          <div style="color: #ef4444; font-size: 18px;">↓</div>
          <div style="padding: 12px; background: #fff; border-radius: 10px; border: 1px solid #fca5a5;">💰 Price / Item Changes</div>
          <div style="color: #ef4444; font-size: 18px;">↓</div>
          <div style="padding: 12px; background: #fff; border-radius: 10px; border: 1px solid #fca5a5;">🖨️ Expensive Reprinting</div>
          <div style="color: #ef4444; font-size: 18px;">↓</div>
          <div style="padding: 12px; background: #fff; border-radius: 10px; border: 1px solid #fca5a5;">🔄 Manual Replacement</div>
          <div style="color: #ef4444; font-size: 18px;">↓</div>
          <div style="padding: 12px; background: #fee2e2; border-radius: 10px; border: 1px solid #dc2626; color: #dc2626;">🔁 High Cost & Continuous Errors</div>
        </div>
      </div>

      <!-- Geni Menu Workflow -->
      <div class="card" style="padding: 32px; background: #fbf7f2; border-color: var(--br); box-shadow: var(--shadow-md);">
        <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 20px;">
          <div style="width: 36px; height: 36px; border-radius: 10px; background: var(--br); color: #fff; display: grid; place-items: center; font-weight: 800;">✓</div>
          <h3 style="color: var(--br); font-size: 20px;">Geni Menu Digital Workflow</h3>
        </div>

        <div style="display: flex; flex-direction: column; gap: 16px; text-align: center; font-weight: 700;">
          <div style="padding: 14px; background: #fff; border-radius: 12px; border: 1px solid var(--line); color: var(--ink); box-shadow: var(--shadow-sm);">
            ⚡ Update Item / Price / Status
          </div>
          <div style="color: var(--br); font-size: 22px;">↓</div>
          <div style="padding: 14px; background: #fff; border-radius: 12px; border: 1px solid var(--line); color: var(--ink); box-shadow: var(--shadow-sm);">
            🚀 Instant 1-Click Publish
          </div>
          <div style="color: var(--br); font-size: 22px;">↓</div>
          <div style="padding: 16px; background: linear-gradient(135deg, #876039 0%, #a87646 100%); border-radius: 12px; color: #fff; box-shadow: 0 4px 16px rgba(135,96,57,0.3);">
            ✨ Customers See It Instantly on Mobile!
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 6 & 7: CORE VALUE & MENU ITEM MANAGEMENT ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd r">
      <h2>Everything About Your Menu, <span class="sf">Under Control.</span></h2>
      <p>Bring everyday menu management into one clean workspace.</p>
    </div>

    <!-- ITEM MANAGEMENT SHOWCASE -->
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 48px; align-items: center;" class="r">
      <div>
        <div class="eb">MENU ITEM MANAGEMENT</div>
        <h2>Add. Edit. Organize.</h2>
        <p style="margin: 16px 0 24px;">Create and manage every dish from a single interface effortlessly.</p>

        <ul style="display: grid; grid-template-columns: 1fr 1fr; gap: 14px; font-weight: 600; color: var(--ink);">
          <li style="display: flex; align-items: center; gap: 8px;"><span style="color: var(--br); font-weight: 900;">✓</span> Add new menu items</li>
          <li style="display: flex; align-items: center; gap: 8px;"><span style="color: var(--br); font-weight: 900;">✓</span> Edit item names</li>
          <li style="display: flex; align-items: center; gap: 8px;"><span style="color: var(--br); font-weight: 900;">✓</span> Update descriptions</li>
          <li style="display: flex; align-items: center; gap: 8px;"><span style="color: var(--br); font-weight: 900;">✓</span> Change prices</li>
          <li style="display: flex; align-items: center; gap: 8px;"><span style="color: var(--br); font-weight: 900;">✓</span> Add food images</li>
          <li style="display: flex; align-items: center; gap: 8px;"><span style="color: var(--br); font-weight: 900;">✓</span> Manage item details</li>
          <li style="display: flex; align-items: center; gap: 8px;"><span style="color: var(--br); font-weight: 900;">✓</span> Assign categories</li>
          <li style="display: flex; align-items: center; gap: 8px;"><span style="color: var(--br); font-weight: 900;">✓</span> Control availability</li>
        </ul>
      </div>

      <!-- Realistic EDIT MENU ITEM Visual Modal -->
      <div class="win" style="padding: 0; box-shadow: var(--shadow-lg);">
        <div class="wb">
          <div class="dots"><i></i><i></i><i></i></div>
          <div class="ttl">EDIT MENU ITEM</div>
          <div></div>
        </div>
        <div style="padding: 24px; display: flex; flex-direction: column; gap: 14px; background: #fff;">
          <div style="display: flex; gap: 16px; align-items: center;">
            <div style="width: 80px; height: 80px; border-radius: 14px; background-image: url('https://images.unsplash.com/photo-1563379091339-03b21ab4a4f8?w=300&auto=format&fit=crop&q=80'); background-size: cover; border: 1px solid var(--line); flex: none;"></div>
            <div>
              <button style="background: var(--bg2); border: 1px solid var(--line); padding: 6px 12px; border-radius: 8px; font-weight: 700; color: var(--br); cursor: pointer;">📷 Change Food Image</button>
              <div style="font-size: 11px; color: var(--mute); margin-top: 4px;">PNG, JPG up to 5MB</div>
            </div>
          </div>

          <div>
            <label style="font-weight: 700; font-size: 12px; color: var(--ink); display: block; margin-bottom: 4px;">Item Name</label>
            <input type="text" value="Chicken Biryani" style="width: 100%; padding: 8px 12px; border: 1px solid var(--line); border-radius: 8px; font-weight: 600; color: var(--ink);">
          </div>

          <div>
            <label style="font-weight: 700; font-size: 12px; color: var(--ink); display: block; margin-bottom: 4px;">Description</label>
            <textarea style="width: 100%; padding: 8px 12px; border: 1px solid var(--line); border-radius: 8px; font-size: 12px; font-weight: 500; height: 50px; resize: none;">Aromatic basmati rice with tender chicken and traditional spices.</textarea>
          </div>

          <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
            <div>
              <label style="font-weight: 700; font-size: 12px; color: var(--ink); display: block; margin-bottom: 4px;">Price (₹)</label>
              <input type="text" value="₹240" style="width: 100%; padding: 8px 12px; border: 1px solid var(--line); border-radius: 8px; font-weight: 800; color: var(--br);">
            </div>
            <div>
              <label style="font-weight: 700; font-size: 12px; color: var(--ink); display: block; margin-bottom: 4px;">Category</label>
              <select style="width: 100%; padding: 8px 12px; border: 1px solid var(--line); border-radius: 8px; font-weight: 600;">
                <option selected>Biryani</option>
                <option>Starters</option>
                <option>Main Course</option>
              </select>
            </div>
          </div>

          <div style="display: flex; justify-content: space-between; align-items: center; padding-top: 8px; border-top: 1px solid var(--line);">
            <div style="font-weight: 700;">Availability: <span style="color: var(--green);">● Available</span></div>
            <button class="btn p" style="padding: 8px 18px; font-size: 13px;">Save Changes</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 8: CATEGORY MANAGEMENT ================= -->
<section>
  <div class="w">
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 48px; align-items: center;" class="r">
      <!-- Category UI Mockup -->
      <div class="win" style="order: 2; box-shadow: var(--shadow-lg);">
        <div class="wb">
          <div class="dots"><i></i><i></i><i></i></div>
          <div class="ttl">MENU CATEGORIES & REORDERING</div>
          <div style="color: var(--br); font-weight: 700; font-size: 11px;">+ New Category</div>
        </div>
        <div style="padding: 20px; background: #fff; display: flex; flex-direction: column; gap: 10px;">
          <div style="display: flex; justify-content: space-between; align-items: center; padding: 12px 16px; border: 1px solid var(--line); border-radius: 12px; background: var(--bg2);">
            <div style="display: flex; align-items: center; gap: 10px; font-weight: 700;">
              <span style="cursor: grab; color: var(--mute);">:::</span> 🥗 Starters
            </div>
            <span style="font-size: 11px; background: #fff; padding: 3px 8px; border-radius: 6px; border: 1px solid var(--line);">12 Items</span>
          </div>

          <div style="display: flex; justify-content: space-between; align-items: center; padding: 12px 16px; border: 1px solid var(--br); border-radius: 12px; background: #fff; box-shadow: 0 4px 12px rgba(135,96,57,0.15);">
            <div style="display: flex; align-items: center; gap: 10px; font-weight: 800; color: var(--br);">
              <span style="cursor: grab;">:::</span> 🍛 Main Course
            </div>
            <span style="font-size: 11px; background: var(--br); color: #fff; padding: 3px 8px; border-radius: 6px;">18 Items</span>
          </div>

          <div style="display: flex; justify-content: space-between; align-items: center; padding: 12px 16px; border: 1px solid var(--line); border-radius: 12px; background: var(--bg2);">
            <div style="display: flex; align-items: center; gap: 10px; font-weight: 700;">
              <span style="cursor: grab; color: var(--mute);">:::</span> 🍚 Biryani
            </div>
            <span style="font-size: 11px; background: #fff; padding: 3px 8px; border-radius: 6px; border: 1px solid var(--line);">8 Items</span>
          </div>

          <div style="display: flex; justify-content: space-between; align-items: center; padding: 12px 16px; border: 1px solid var(--line); border-radius: 12px; background: var(--bg2);">
            <div style="display: flex; align-items: center; gap: 10px; font-weight: 700;">
              <span style="cursor: grab; color: var(--mute);">:::</span> 🍜 Noodles & Rice
            </div>
            <span style="font-size: 11px; background: #fff; padding: 3px 8px; border-radius: 6px; border: 1px solid var(--line);">10 Items</span>
          </div>

          <div style="display: flex; justify-content: space-between; align-items: center; padding: 12px 16px; border: 1px solid var(--line); border-radius: 12px; background: var(--bg2);">
            <div style="display: flex; align-items: center; gap: 10px; font-weight: 700;">
              <span style="cursor: grab; color: var(--mute);">:::</span> 🥤 Beverages
            </div>
            <span style="font-size: 11px; background: #fff; padding: 3px 8px; border-radius: 6px; border: 1px solid var(--line);">15 Items</span>
          </div>

          <div style="display: flex; justify-content: space-between; align-items: center; padding: 12px 16px; border: 1px solid var(--line); border-radius: 12px; background: var(--bg2);">
            <div style="display: flex; align-items: center; gap: 10px; font-weight: 700;">
              <span style="cursor: grab; color: var(--mute);">:::</span> 🍨 Desserts
            </div>
            <span style="font-size: 11px; background: #fff; padding: 3px 8px; border-radius: 6px; border: 1px solid var(--line);">9 Items</span>
          </div>
        </div>
      </div>

      <!-- Copy -->
      <div style="order: 1;">
        <div class="eb">CATEGORY MANAGEMENT</div>
        <h2>Keep Every Dish in <span class="sf">the Right Place.</span></h2>
        <p style="margin: 16px 0 24px;">
          Organize your menu into clear categories so customers can discover what they want faster.
        </p>

        <ul style="display: flex; flex-direction: column; gap: 12px; font-weight: 600; color: var(--ink);">
          <li style="display: flex; align-items: center; gap: 10px;"><span style="color: var(--br); font-size: 18px;">📁</span> Create custom categories</li>
          <li style="display: flex; align-items: center; gap: 10px;"><span style="color: var(--br); font-size: 18px;">✏️</span> Rename categories on demand</li>
          <li style="display: flex; align-items: center; gap: 10px;"><span style="color: var(--br); font-size: 18px;">↕️</span> Reorder categories with simple drag & drop</li>
          <li style="display: flex; align-items: center; gap: 10px;"><span style="color: var(--br); font-size: 18px;">🔄</span> Move items between categories seamlessly</li>
          <li style="display: flex; align-items: center; gap: 10px;"><span style="color: var(--br); font-size: 18px;">✨</span> Keep the menu organized for fast customer browsing</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 9: PRICE MANAGEMENT ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 48px; align-items: center;" class="r">
      <div>
        <div class="eb">PRICE MANAGEMENT</div>
        <h2>Prices Change. <br><span class="sf">Your Menu Shouldn't Have To.</span></h2>
        <p style="margin: 16px 0 24px;">
          Update prices whenever your business changes — without redesigning or replacing your menu.
        </p>

        <ul style="display: flex; flex-direction: column; gap: 12px; font-weight: 600;">
          <li style="display: flex; align-items: center; gap: 10px;"><span style="color: var(--br);">✓</span> Update prices quickly in seconds</li>
          <li style="display: flex; align-items: center; gap: 10px;"><span style="color: var(--br);">✓</span> Keep pricing accurate across all customer touchpoints</li>
          <li style="display: flex; align-items: center; gap: 10px;"><span style="color: var(--br);">✓</span> Avoid outdated physical menus</li>
          <li style="display: flex; align-items: center; gap: 10px;"><span style="color: var(--br);">✓</span> Maintain pricing consistency across dine-in, takeout and delivery</li>
        </ul>
      </div>

      <!-- Interactive Price Change Simulator -->
      <div class="card" style="padding: 32px; background: #fff;">
        <div style="font-size: 12px; font-weight: 800; color: var(--br); letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 16px;">LIVE PRICE UPDATE SIMULATOR</div>
        
        <div style="padding: 20px; border: 1px solid var(--line); border-radius: 16px; background: var(--bg2); display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
          <div>
            <div style="font-weight: 800; font-size: 18px;">Chicken Biryani</div>
            <div id="price-display" style="font-size: 24px; font-weight: 900; color: var(--br); margin-top: 4px;">₹220</div>
          </div>
          <button id="price-btn" onclick="updatePriceSim()" class="btn p" style="padding: 10px 18px; font-size: 13px;">Edit Price</button>
        </div>

        <div id="price-toast" style="padding: 12px 16px; background: #d1fae5; border: 1px solid #6ee7b7; color: #065f46; border-radius: 10px; font-weight: 700; font-size: 14px; opacity: 0; transition: opacity .3s;">
          ✓ Price updated successfully to ₹240
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 10: AVAILABILITY MANAGEMENT ================= -->
<section>
  <div class="w">
    <div class="hd r">
      <div class="eb">AVAILABILITY MANAGEMENT</div>
      <h2>Sold Out? <span class="sf">Turn It Off.</span></h2>
      <p>When an item isn't available, simply change its availability. Customers can see the current menu status instantly.</p>
    </div>

    <!-- Toggle Switches Mockup -->
    <div class="win r" style="max-width: 760px; margin: 0 auto 32px; box-shadow: var(--shadow-lg);">
      <div class="wb">
        <div class="dots"><i></i><i></i><i></i></div>
        <div class="ttl">ITEM AVAILABILITY CONTROLS</div>
        <div style="color: var(--green); font-weight: 700;">LIVE CONTROL</div>
      </div>
      <div style="padding: 24px; background: #fff; display: flex; flex-direction: column; gap: 14px;">

        <div style="display: flex; justify-content: space-between; align-items: center; padding: 14px 18px; border: 1px solid var(--line); border-radius: 12px; background: #fff;">
          <div style="font-weight: 700; font-size: 16px;">Chicken Biryani</div>
          <div style="display: flex; align-items: center; gap: 14px;">
            <span style="color: var(--green); font-weight: 800; font-size: 13px;">● Available</span>
            <div class="tgl-sw on" onclick="this.classList.toggle('on')"><div class="tgl-knob"></div></div>
          </div>
        </div>

        <div style="display: flex; justify-content: space-between; align-items: center; padding: 14px 18px; border: 1px solid var(--line); border-radius: 12px; background: #fff;">
          <div style="font-weight: 700; font-size: 16px;">Paneer Tikka</div>
          <div style="display: flex; align-items: center; gap: 14px;">
            <span style="color: var(--green); font-weight: 800; font-size: 13px;">● Available</span>
            <div class="tgl-sw on" onclick="this.classList.toggle('on')"><div class="tgl-knob"></div></div>
          </div>
        </div>

        <div style="display: flex; justify-content: space-between; align-items: center; padding: 14px 18px; border: 1px solid #fca5a5; border-radius: 12px; background: #fff5f5;">
          <div style="font-weight: 700; font-size: 16px; color: var(--ink);">Mutton Biryani</div>
          <div style="display: flex; align-items: center; gap: 14px;">
            <span style="color: var(--red); font-weight: 800; font-size: 13px;">○ Unavailable</span>
            <div class="tgl-sw" onclick="this.classList.toggle('on')"><div class="tgl-knob"></div></div>
          </div>
        </div>

        <div style="display: flex; justify-content: space-between; align-items: center; padding: 14px 18px; border: 1px solid var(--line); border-radius: 12px; background: #fff;">
          <div style="font-weight: 700; font-size: 16px;">Fresh Lime Soda</div>
          <div style="display: flex; align-items: center; gap: 14px;">
            <span style="color: var(--green); font-weight: 800; font-size: 13px;">● Available</span>
            <div class="tgl-sw on" onclick="this.classList.toggle('on')"><div class="tgl-knob"></div></div>
          </div>
        </div>

      </div>
    </div>

    <div style="text-align: center; max-width: 600px; margin: auto; padding: 16px; background: var(--bg2); border-radius: 16px; border: 1px solid var(--line);" class="r">
      <p style="font-weight: 700; color: var(--br);">✨ Keep your menu accurate, even during busy service hours.</p>
    </div>
  </div>
</section>

<!-- ================= SECTION 11 & 12: FOOD IMAGES & ITEM DETAILS ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd r">
      <h2>Let Your Food <span class="sf">Sell Itself.</span></h2>
      <p>Add high-quality images and details to give customers a better idea of what they're ordering.</p>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px; align-items: center;">
      <!-- Customer Card Preview -->
      <div class="card" style="padding: 0; max-width: 440px; margin: auto; box-shadow: var(--shadow-lg);">
        <div style="height: 240px; background-image: url('https://images.unsplash.com/photo-1563379091339-03b21ab4a4f8?w=800&auto=format&fit=crop&q=80'); background-size: cover; background-position: center; position: relative;">
          <span style="position: absolute; top: 16px; left: 16px; background: var(--br); color: #fff; padding: 4px 12px; border-radius: 8px; font-weight: 800; font-size: 11px;">★ TODAY'S SPECIAL</span>
        </div>
        <div style="padding: 24px;">
          <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 8px;">
            <h3 style="font-size: 22px;">Chicken Biryani</h3>
            <span style="font-size: 20px; font-weight: 900; color: var(--br);">₹240</span>
          </div>
          <p style="font-size: 14px; margin-bottom: 20px;">Aromatic basmati rice, tender chicken and traditional spices.</p>
          <button class="btn p" style="width: 100%; justify-content: center;">Add +</button>
        </div>
      </div>

      <!-- Item Variants & Add-ons Details -->
      <div class="win" style="box-shadow: var(--shadow-lg);">
        <div class="wb">
          <div class="dots"><i></i><i></i><i></i></div>
          <div class="ttl">ITEM VARIANTS & ADD-ONS CONFIGURATION</div>
          <div></div>
        </div>
        <div style="padding: 24px; background: #fff;">
          <h3 style="font-size: 20px; margin-bottom: 6px;">Chicken Pizza</h3>
          <p style="font-size: 13px; margin-bottom: 20px;">Classic hand-tossed pizza topped with chicken, mozzarella and herbs.</p>

          <div style="margin-bottom: 20px;">
            <div style="font-weight: 800; font-size: 11px; letter-spacing: 0.1em; color: var(--mute); text-transform: uppercase; margin-bottom: 10px;">SIZE OPTIONS</div>
            <div style="display: flex; gap: 10px;">
              <div style="flex: 1; padding: 10px; border: 1px solid var(--line); border-radius: 10px; text-align: center; cursor: pointer;">
                <div style="font-weight: 700;">Regular</div>
                <div style="color: var(--br); font-weight: 800; margin-top: 2px;">₹220</div>
              </div>
              <div style="flex: 1; padding: 10px; border: 2px solid var(--br); border-radius: 10px; text-align: center; background: var(--bg2); cursor: pointer;">
                <div style="font-weight: 800; color: var(--br);">Medium</div>
                <div style="color: var(--br); font-weight: 800; margin-top: 2px;">₹320</div>
              </div>
              <div style="flex: 1; padding: 10px; border: 1px solid var(--line); border-radius: 10px; text-align: center; cursor: pointer;">
                <div style="font-weight: 700;">Large</div>
                <div style="color: var(--br); font-weight: 800; margin-top: 2px;">₹420</div>
              </div>
            </div>
          </div>

          <div>
            <div style="font-weight: 800; font-size: 11px; letter-spacing: 0.1em; color: var(--mute); text-transform: uppercase; margin-bottom: 10px;">ADD-ONS</div>
            <div style="display: flex; flex-direction: column; gap: 8px;">
              <label style="display: flex; justify-content: space-between; padding: 10px 14px; border: 1px solid var(--line); border-radius: 10px; cursor: pointer;">
                <span><input type="checkbox" checked> Extra Cheese</span>
                <span style="font-weight: 800; color: var(--br);">+₹40</span>
              </label>
              <label style="display: flex; justify-content: space-between; padding: 10px 14px; border: 1px solid var(--line); border-radius: 10px; cursor: pointer;">
                <span><input type="checkbox" checked> Extra Chicken</span>
                <span style="font-weight: 800; color: var(--br);">+₹70</span>
              </label>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 13: SPECIALS & BADGES ================= -->
<section>
  <div class="w">
    <div class="hd r">
      <div class="eb">PROMOTIONS & HIGHLIGHTS</div>
      <h2>Put Your Best Sellers <span class="sf">in the Spotlight.</span></h2>
      <p>Highlight signature dishes, today's specials and promotional items so customers notice them first.</p>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 24px;">
      <div class="card" style="padding: 20px;">
        <span style="background: #fef3c7; color: #92400e; font-size: 11px; font-weight: 800; padding: 4px 10px; border-radius: 6px; text-transform: uppercase;">★ TODAY'S SPECIAL</span>
        <h4 style="font-size: 18px; margin: 12px 0 4px;">Chicken Biryani</h4>
        <p style="font-weight: 800; color: var(--br); font-size: 16px;">₹240</p>
      </div>

      <div class="card" style="padding: 20px;">
        <span style="background: #dbeafe; color: #1e40af; font-size: 11px; font-weight: 800; padding: 4px 10px; border-radius: 6px; text-transform: uppercase;">🔥 BEST SELLER</span>
        <h4 style="font-size: 18px; margin: 12px 0 4px;">Paneer Butter Masala</h4>
        <p style="font-weight: 800; color: var(--br); font-size: 16px;">₹220</p>
      </div>

      <div class="card" style="padding: 20px;">
        <span style="background: #d1fae5; color: #065f46; font-size: 11px; font-weight: 800; padding: 4px 10px; border-radius: 6px; text-transform: uppercase;">✨ NEW</span>
        <h4 style="font-size: 18px; margin: 12px 0 4px;">Truffle Garlic Naan</h4>
        <p style="font-weight: 800; color: var(--br); font-size: 16px;">₹110</p>
      </div>

      <div class="card" style="padding: 20px;">
        <span style="background: #fce7f3; color: #9d174d; font-size: 11px; font-weight: 800; padding: 4px 10px; border-radius: 6px; text-transform: uppercase;">👑 POPULAR</span>
        <h4 style="font-size: 18px; margin: 12px 0 4px;">Mango Lassi</h4>
        <p style="font-weight: 800; color: var(--br); font-size: 16px;">₹90</p>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 14: CUSTOMER EXPERIENCE SPLIT-SCREEN ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd r">
      <h2>One Update. <span class="sf">One Consistent Menu Experience.</span></h2>
      <p>What you manage on your dashboard is immediately reflected on your customer's screen.</p>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 32px; align-items: center;" class="r">
      <!-- LEFT - ADMIN -->
      <div class="win" style="box-shadow: var(--shadow-lg);">
        <div class="wb" style="background: var(--ink); color: #fff;">
          <div class="dots"><i></i><i></i><i></i></div>
          <div class="ttl" style="color: #fff;">ADMIN DASHBOARD</div>
          <div style="color: var(--br-gold);">ADMIN CONTROL</div>
        </div>
        <div style="padding: 24px; background: #fff;">
          <div style="padding: 14px; border: 1px solid var(--line); border-radius: 12px; margin-bottom: 14px;">
            <div style="font-weight: 700; margin-bottom: 4px;">Chicken Biryani</div>
            <div style="display: flex; items-center; gap: 8px;">
              <span style="text-decoration: line-through; color: var(--mute);">₹220</span>
              <span style="color: var(--br); font-weight: 900; font-size: 16px;">₹240</span>
            </div>
          </div>
          <div style="display: flex; justify-content: space-between; align-items: center; padding: 14px; border: 1px solid var(--line); border-radius: 12px;">
            <span style="font-weight: 700;">Status Toggle</span>
            <span style="color: var(--red); font-weight: 800;">Available → Unavailable</span>
          </div>
        </div>
      </div>

      <!-- RIGHT - CUSTOMER -->
      <div class="ph-frame" style="margin: auto; width: 100%; max-width: 320px;">
        <div class="ph-inner" style="height: 280px;">
          <div class="ph-header">
            <h6>CUSTOMER MOBILE MENU</h6>
          </div>
          <div class="ph-item" style="opacity: 0.7;">
            <div class="ph-img" style="background-image: url('https://images.unsplash.com/photo-1563379091339-03b21ab4a4f8?w=300&auto=format&fit=crop&q=80');"></div>
            <div class="ph-info">
              <h5>Chicken Biryani</h5>
              <p>₹240</p>
            </div>
            <span class="ph-badge unavail">Currently Unavailable</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 15 & 16: MENU STRUCTURE & MULTIPLE MENUS ================= -->
<section>
  <div class="w">
    <div class="hd r">
      <div class="eb">MULTI-MENU SUPPORT</div>
      <h2>Different Menus. <span class="sf">One Platform.</span></h2>
      <p>Create and manage menus for different dining experiences, service areas or business requirements.</p>
    </div>

    <!-- Interactive Menu Selector -->
    <div style="display: flex; justify-content: center; gap: 10px; margin-bottom: 32px; flex-wrap: wrap;" class="r">
      <button onclick="switchMenu('dine-in')" class="btn p" id="m-btn-dine-in" style="padding: 10px 20px; font-size: 14px;">DINE-IN</button>
      <button onclick="switchMenu('takeaway')" class="btn o" id="m-btn-takeaway" style="padding: 10px 20px; font-size: 14px;">TAKEAWAY</button>
      <button onclick="switchMenu('delivery')" class="btn o" id="m-btn-delivery" style="padding: 10px 20px; font-size: 14px;">DELIVERY</button>
      <button onclick="switchMenu('breakfast')" class="btn o" id="m-btn-breakfast" style="padding: 10px 20px; font-size: 14px;">BREAKFAST</button>
      <button onclick="switchMenu('special')" class="btn o" id="m-btn-special" style="padding: 10px 20px; font-size: 14px;">SPECIAL</button>
    </div>

    <!-- Menu Structure Preview Window -->
    <div class="win r" style="max-width: 800px; margin: auto; box-shadow: var(--shadow-lg);">
      <div class="wb">
        <div class="dots"><i></i><i></i><i></i></div>
        <div class="ttl" id="menu-title-display">DINE-IN MENU STRUCTURE</div>
        <div></div>
      </div>
      <div style="padding: 28px; background: #fff;" id="menu-structure-content">
        <div style="font-weight: 800; color: var(--br); font-size: 12px; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 12px;">STARTERS</div>
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-bottom: 24px;">
          <div style="padding: 10px; border: 1px solid var(--line); border-radius: 8px; font-weight: 700;">Chicken 65 <span style="float: right; color: var(--br);">₹180</span></div>
          <div style="padding: 10px; border: 1px solid var(--line); border-radius: 8px; font-weight: 700;">Paneer Tikka <span style="float: right; color: var(--br);">₹190</span></div>
        </div>

        <div style="font-weight: 800; color: var(--br); font-size: 12px; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 12px;">MAIN COURSE</div>
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-bottom: 24px;">
          <div style="padding: 10px; border: 1px solid var(--line); border-radius: 8px; font-weight: 700;">Butter Chicken <span style="float: right; color: var(--br);">₹260</span></div>
          <div style="padding: 10px; border: 1px solid var(--line); border-radius: 8px; font-weight: 700;">Paneer Butter Masala <span style="float: right; color: var(--br);">₹220</span></div>
        </div>

        <div style="font-weight: 800; color: var(--br); font-size: 12px; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 12px;">BIRYANI</div>
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
          <div style="padding: 10px; border: 1px solid var(--line); border-radius: 8px; font-weight: 700;">Chicken Biryani <span style="float: right; color: var(--br);">₹240</span></div>
          <div style="padding: 10px; border: 1px solid var(--line); border-radius: 8px; font-weight: 700;">Mutton Biryani <span style="float: right; color: var(--br);">₹340</span></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 17: BUSINESS BENEFITS ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd r">
      <h2>Less Menu Maintenance. <span class="sf">More Time for Your Business.</span></h2>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 24px;">
      <div class="card" style="padding: 28px;">
        <div class="ic" style="margin-bottom: 18px;">
          <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
        </div>
        <h3 style="font-size: 20px; margin-bottom: 8px;">Save Time</h3>
        <p>Make menu changes instantly without rebuilding or reprinting physical menus.</p>
      </div>

      <div class="card" style="padding: 28px;">
        <div class="ic" style="margin-bottom: 18px;">
          <svg viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
        </div>
        <h3 style="font-size: 20px; margin-bottom: 8px;">Reduce Errors</h3>
        <p>Keep prices, item descriptions, and availability accurate across your restaurant.</p>
      </div>

      <div class="card" style="padding: 28px;">
        <div class="ic" style="margin-bottom: 18px;">
          <svg viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
        </div>
        <h3 style="font-size: 20px; margin-bottom: 8px;">Improve Customer Experience</h3>
        <p>Give customers clear, updated, and visual menu information on their phones.</p>
      </div>

      <div class="card" style="padding: 28px;">
        <div class="ic" style="margin-bottom: 18px;">
          <svg viewBox="0 0 24 24"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
        </div>
        <h3 style="font-size: 20px; margin-bottom: 8px;">Promote More</h3>
        <p>Highlight specials, best sellers and new dishes to increase average order value.</p>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 18: RESTAURANT INDUSTRY SECTION ================= -->
<section>
  <div class="w">
    <div class="hd r">
      <div class="eb">BUILT FOR EVERY FOOD BUSINESS</div>
      <h2>Built for the Way <span class="sf">Your Business Serves.</span></h2>
    </div>

    <div class="ind-grid r">
      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=600&auto=format&fit=crop&q=80');">
          <div class="ind-overlay"></div>
        </div>
        <div class="ind-content">
          <h4>Restaurants</h4>
          <p>Manage large menus and everyday multi-course operations.</p>
        </div>
      </div>

      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1554118811-1e0d58224f24?w=600&auto=format&fit=crop&q=80');">
          <div class="ind-overlay"></div>
        </div>
        <div class="ind-content">
          <h4>Cafés</h4>
          <p>Showcase beverages, snacks, specialty coffees and daily specials.</p>
        </div>
      </div>

      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1509440159596-0249088772ff?w=600&auto=format&fit=crop&q=80');">
          <div class="ind-overlay"></div>
        </div>
        <div class="ind-content">
          <h4>Bakeries</h4>
          <p>Present fresh cakes, pastries, breads and seasonal products.</p>
        </div>
      </div>

      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1561758033-d89a9ad46330?w=600&auto=format&fit=crop&q=80');">
          <div class="ind-overlay"></div>
        </div>
        <div class="ind-content">
          <h4>QSR</h4>
          <p>Keep high-volume fast food menus simple, clear and quick.</p>
        </div>
      </div>

      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1566073771259-6a8506099945?w=600&auto=format&fit=crop&q=80');">
          <div class="ind-overlay"></div>
        </div>
        <div class="ind-content">
          <h4>Hotels</h4>
          <p>Manage extensive in-room dining and hotel restaurant menus.</p>
        </div>
      </div>

      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1556910103-1c02745aae4d?w=600&auto=format&fit=crop&q=80');">
          <div class="ind-overlay"></div>
        </div>
        <div class="ind-content">
          <h4>Cloud Kitchens</h4>
          <p>Present delivery-focused menus across multiple digital brands.</p>
        </div>
      </div>

      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1513104890138-7c749659a591?w=600&auto=format&fit=crop&q=80');">
          <div class="ind-overlay"></div>
        </div>
        <div class="ind-content">
          <h4>Pizzerias</h4>
          <p>Show crust sizes, toppings, add-ons and crust customizations.</p>
        </div>
      </div>

      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1555396273-367ea4eb4db5?w=600&auto=format&fit=crop&q=80');">
          <div class="ind-overlay"></div>
        </div>
        <div class="ind-content">
          <h4>Food Courts</h4>
          <p>Keep multiple food counters & categories organized.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 19 & 20: CONNECTED OPERATIONS & WORKFLOW ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd r">
      <h2>Your Menu <span class="sf">Connects Everything.</span></h2>
      <p>A menu is where every restaurant order begins. Geni Menu connects it with the rest of your restaurant operations.</p>
    </div>

    <!-- ECOSYSTEM FLOW -->
    <div style="display: flex; justify-content: center; gap: 12px; flex-wrap: wrap; margin-bottom: 48px;" class="r">
      <div style="padding: 14px 20px; background: var(--br); color: #fff; font-weight: 800; border-radius: 12px; box-shadow: var(--shadow-sm);">MENU</div>
      <div style="align-self: center; color: var(--br); font-size: 20px;">→</div>
      <div style="padding: 14px 20px; background: #fff; border: 1px solid var(--line); font-weight: 700; border-radius: 12px;">ORDERS</div>
      <div style="align-self: center; color: var(--br); font-size: 20px;">→</div>
      <div style="padding: 14px 20px; background: #fff; border: 1px solid var(--line); font-weight: 700; border-radius: 12px;">TABLES</div>
      <div style="align-self: center; color: var(--br); font-size: 20px;">→</div>
      <div style="padding: 14px 20px; background: #fff; border: 1px solid var(--line); font-weight: 700; border-radius: 12px;">KITCHEN</div>
      <div style="align-self: center; color: var(--br); font-size: 20px;">→</div>
      <div style="padding: 14px 20px; background: #fff; border: 1px solid var(--line); font-weight: 700; border-radius: 12px;">POS</div>
      <div style="align-self: center; color: var(--br); font-size: 20px;">→</div>
      <div style="padding: 14px 20px; background: #fff; border: 1px solid var(--line); font-weight: 700; border-radius: 12px;">PAYMENTS</div>
      <div style="align-self: center; color: var(--br); font-size: 20px;">→</div>
      <div style="padding: 14px 20px; background: #fff; border: 1px solid var(--line); font-weight: 700; border-radius: 12px;">REPORTS</div>
    </div>
  </div>
</section>

<!-- ================= SECTION 22: FEATURE CONNECTIONS ================= -->
<section>
  <div class="w">
    <div class="hd r">
      <h2>Seamlessly Connected to <span class="sf">Geni Menu Features.</span></h2>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px;">
      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 14px;">
          <svg viewBox="0 0 24 24"><path d="M16 2v4M8 2v4M3 10h18M5 4h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2z"/></svg>
        </div>
        <h4>Reservation Management</h4>
        <p style="font-size: 14px; margin: 6px 0 14px;">Manage table bookings and seating schedules.</p>
        <a href="{{ route('features') }}" style="color: var(--br); font-weight: 700; font-size: 14px;">Explore →</a>
      </div>

      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 14px;">
          <svg viewBox="0 0 24 24"><rect x="3" y="8" width="18" height="4" rx="1"/><path d="M6 12v7M18 12v7"/></svg>
        </div>
        <h4>Table Management</h4>
        <p style="font-size: 14px; margin: 6px 0 14px;">Organize floor plans and table statuses.</p>
        <a href="{{ route('features') }}" style="color: var(--br); font-weight: 700; font-size: 14px;">Explore →</a>
      </div>

      <div class="card" style="padding: 24px; border-color: var(--br);">
        <div class="ic" style="margin-bottom: 14px; background: var(--br); color: #fff;">
          <svg viewBox="0 0 24 24"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><rect x="8" y="2" width="8" height="4" rx="1"/></svg>
        </div>
        <h4>Order Management</h4>
        <p style="font-size: 14px; margin: 6px 0 14px;">Move menu selections into an organized order workflow.</p>
        <a href="{{ route('features') }}" style="color: var(--br); font-weight: 800; font-size: 14px;">Explore →</a>
      </div>

      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 14px;">
          <svg viewBox="0 0 24 24"><path d="M4 18h16a1 1 0 0 0 1-1A9 9 0 0 0 3 17a1 1 0 0 0 1 1z"/></svg>
        </div>
        <h4>KOT Management</h4>
        <p style="font-size: 14px; margin: 6px 0 14px;">Send tickets straight to the kitchen display.</p>
        <a href="{{ route('features') }}" style="color: var(--br); font-weight: 700; font-size: 14px;">Explore →</a>
      </div>

      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 14px;">
          <svg viewBox="0 0 24 24"><rect x="4" y="3" width="16" height="10" rx="2"/><path d="M8 21h8M12 17v4"/></svg>
        </div>
        <h4>POS Management</h4>
        <p style="font-size: 14px; margin: 6px 0 14px;">Speed up billing and checkout with integrated POS.</p>
        <a href="{{ route('features') }}" style="color: var(--br); font-weight: 700; font-size: 14px;">Explore →</a>
      </div>

      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 14px;">
          <svg viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg>
        </div>
        <h4>Inventory Management</h4>
        <p style="font-size: 14px; margin: 6px 0 14px;">Track recipe ingredients and stock usage.</p>
        <a href="{{ route('features') }}" style="color: var(--br); font-weight: 700; font-size: 14px;">Explore →</a>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 24: FAQ ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd r">
      <h2>Menu Management <span class="sf">FAQs</span></h2>
      <p>Got questions? We've got answers.</p>
    </div>

    <div class="faq-list r">
      <div class="faq-item open">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>Can I update menu prices anytime?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Menu prices can be updated whenever required. Changes are reflected instantly across your digital menu.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>Can I hide unavailable dishes?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. You can control item availability with a single toggle so customers see the exact current menu status.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>Can I create categories?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Organize your menu using custom categories such as starters, main course, biryani, beverages and desserts.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>Can I add food images?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Add high-quality images to menu items to create a visually appealing customer ordering experience.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>Can I add item descriptions?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Add detailed descriptions, ingredient notes, and spice levels to inform your diners.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>Can I manage variants and add-ons?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          If enabled in your Geni Menu configuration, item variations (sizes, portions) and additional options (extra cheese, toppings) can be configured easily.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>Can I manage my entire menu from one dashboard?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Menu items, categories, prices and availability can all be managed from a single centralized dashboard.
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 23: FINAL CTA ================= -->
<section style="background: linear-gradient(135deg, #876039 0%, #6f4e2d 100%); color: #fff; text-align: center;">
  <div class="w r">
    <div class="eb" style="background: rgba(255,255,255,0.15); color: #fff; border-color: rgba(255,255,255,0.3);">
      TAKE CONTROL TODAY
    </div>
    <h2 style="color: #fff; font-size: clamp(34px, 5vw, 54px);">Ready to Take Control <br><span class="sf" style="background: linear-gradient(135deg, #fff 0%, #f4efe9 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">of Your Menu?</span></h2>
    <p style="color: #f4efe9; max-width: 600px; margin: 20px auto 36px; font-size: 18px;">
      Create a smarter menu experience for your restaurant — and keep every item, price and availability detail up to date.
    </p>

    <div style="display: flex; gap: 16px; justify-content: center; flex-wrap: wrap;">
      <a href="{{ route('restaurant_signup') }}" class="btn" style="background: #fff; color: var(--br); border-color: #fff; font-size: 16px; padding: 16px 36px; box-shadow: 0 8px 24px rgba(0,0,0,0.2);">Get Started →</a>
      <a href="{{ route('contact.us') }}" class="btn" style="background: transparent; color: #fff; border-color: rgba(255,255,255,0.5); font-size: 16px; padding: 16px 36px;">Book a Demo</a>
    </div>

    <div style="margin-top: 36px; font-size: 14px; color: #e5d8c8; font-weight: 600;">
      Built for restaurants, cafés, hotels, bakeries, QSRs, cloud kitchens and modern food businesses.
    </div>
  </div>
</section>




<script>
// Interactive Price Change Simulation
function updatePriceSim() {
  const priceDisplay = document.getElementById('price-display');
  const priceToast = document.getElementById('price-toast');
  const priceBtn = document.getElementById('price-btn');

  if (priceDisplay.innerText === '₹220') {
    priceDisplay.innerText = '₹240';
    priceToast.style.opacity = '1';
    priceBtn.innerText = 'Reset Price';
  } else {
    priceDisplay.innerText = '₹220';
    priceToast.style.opacity = '0';
    priceBtn.innerText = 'Edit Price';
  }
}

// Interactive Menu Selector Switcher
function switchMenu(type) {
  const titleDisplay = document.getElementById('menu-title-display');
  const content = document.getElementById('menu-structure-content');
  const btns = ['dine-in', 'takeaway', 'delivery', 'breakfast', 'special'];

  btns.forEach(b => {
    const btn = document.getElementById('m-btn-' + b);
    if (btn) {
      if (b === type) {
        btn.className = 'btn p';
      } else {
        btn.className = 'btn o';
      }
    }
  });

  if (type === 'dine-in') {
    titleDisplay.innerText = 'DINE-IN MENU STRUCTURE';
    content.innerHTML = `
      <div style="font-weight: 800; color: var(--br); font-size: 12px; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 12px;">STARTERS</div>
      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-bottom: 24px;">
        <div style="padding: 10px; border: 1px solid var(--line); border-radius: 8px; font-weight: 700;">Chicken 65 <span style="float: right; color: var(--br);">₹180</span></div>
        <div style="padding: 10px; border: 1px solid var(--line); border-radius: 8px; font-weight: 700;">Paneer Tikka <span style="float: right; color: var(--br);">₹190</span></div>
      </div>
      <div style="font-weight: 800; color: var(--br); font-size: 12px; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 12px;">BIRYANI & MAINS</div>
      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
        <div style="padding: 10px; border: 1px solid var(--line); border-radius: 8px; font-weight: 700;">Chicken Biryani <span style="float: right; color: var(--br);">₹240</span></div>
        <div style="padding: 10px; border: 1px solid var(--line); border-radius: 8px; font-weight: 700;">Paneer Butter Masala <span style="float: right; color: var(--br);">₹220</span></div>
      </div>`;
  } else if (type === 'takeaway') {
    titleDisplay.innerText = 'TAKEAWAY EXPRESS MENU';
    content.innerHTML = `
      <div style="font-weight: 800; color: var(--br); font-size: 12px; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 12px;">QUICK COMBO PACKS</div>
      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-bottom: 24px;">
        <div style="padding: 10px; border: 1px solid var(--line); border-radius: 8px; font-weight: 700;">Biryani Box + Thums Up <span style="float: right; color: var(--br);">₹280</span></div>
        <div style="padding: 10px; border: 1px solid var(--line); border-radius: 8px; font-weight: 700;">Paneer Naan Combo <span style="float: right; color: var(--br);">₹230</span></div>
      </div>`;
  } else if (type === 'delivery') {
    titleDisplay.innerText = 'ONLINE DELIVERY MENU';
    content.innerHTML = `
      <div style="font-weight: 800; color: var(--br); font-size: 12px; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 12px;">DELIVERY PACKS</div>
      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
        <div style="padding: 10px; border: 1px solid var(--line); border-radius: 8px; font-weight: 700;">Family Biryani Pack <span style="float: right; color: var(--br);">₹850</span></div>
        <div style="padding: 10px; border: 1px solid var(--line); border-radius: 8px; font-weight: 700;">Party Starter Platter <span style="float: right; color: var(--br);">₹690</span></div>
      </div>`;
  } else if (type === 'breakfast') {
    titleDisplay.innerText = 'MORNING BREAKFAST MENU';
    content.innerHTML = `
      <div style="font-weight: 800; color: var(--br); font-size: 12px; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 12px;">SOUTH INDIAN SPECIALS</div>
      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
        <div style="padding: 10px; border: 1px solid var(--line); border-radius: 8px; font-weight: 700;">Masala Dosa + Filter Coffee <span style="float: right; color: var(--br);">₹110</span></div>
        <div style="padding: 10px; border: 1px solid var(--line); border-radius: 8px; font-weight: 700;">Idli Vada Combo <span style="float: right; color: var(--br);">₹80</span></div>
      </div>`;
  } else if (type === 'special') {
    titleDisplay.innerText = 'FESTIVE & SEASONAL SPECIALS';
    content.innerHTML = `
      <div style="font-weight: 800; color: var(--br); font-size: 12px; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 12px;">CHEF'S SIGNATURE</div>
      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
        <div style="padding: 10px; border: 1px solid var(--line); border-radius: 8px; font-weight: 700;">Special Mutton Nalli Nihari <span style="float: right; color: var(--br);">₹420</span></div>
        <div style="padding: 10px; border: 1px solid var(--line); border-radius: 8px; font-weight: 700;">Saffron Kheer <span style="float: right; color: var(--br);">₹140</span></div>
      </div>`;
  }
}

// FAQ Accordion Toggle
function toggleFaq(el) {
  const parent = el.parentElement;
  parent.classList.toggle('open');
}

// Scroll Reveal
document.addEventListener('DOMContentLoaded', () => {
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('in');
      }
    });
  }, { threshold: 0.1 });

  document.querySelectorAll('.r').forEach(el => observer.observe(el));
});
</script>

@endsection
