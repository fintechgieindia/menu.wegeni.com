@php
    $meta = [
        'title' => 'Reservation Management — Geni Menu | WeGeni',
        'description' => 'Manage restaurant reservations, guest details, table allocation and booking status from one simple dashboard with Geni Menu.',
        'keywords' => 'restaurant reservation software, table booking system, restaurant table allocation, guest reservation software, table status tracking, Geni Menu, WeGeni'
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
  --br-light: #FBF6EE;
  --br-gold: #b88e56;
  --bg: #ffffff;
  --bg2: #FAF7F2;
  --bg3: #F5EFE6;
  --ink: #21160F;
  --mute: #6E6157;
  --line: rgba(135, 96, 57, 0.16);
  --card: #ffffff;
  --shadow-sm: 0 4px 20px rgba(33, 22, 15, 0.04);
  --shadow-md: 0 16px 40px rgba(33, 22, 15, 0.08);
  --shadow-lg: 0 26px 50px rgba(33, 22, 15, 0.12);
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

/* Typography */
h1, h2, h3, h4, h5 {
  margin: 0;
  font-family: 'Outfit', 'Plus Jakarta Sans', sans-serif;
  font-weight: 500;
  line-height: 1.14;
  letter-spacing: -0.02em;
  color: var(--ink);
}
h1 { font-size: clamp(38px, 5.5vw, 64px); font-weight: 500; }
h2 { font-size: clamp(30px, 4vw, 46px); font-weight: 500; }
h3 { font-size: 21px; font-weight: 500; color: var(--ink); }
p { margin: 0; color: var(--mute); font-size: 16px; line-height: 1.65; }
a { color: inherit; text-decoration: none; }
ul { list-style: none; margin: 0; padding: 0; }

.sf {
  font-family: 'Playfair Display', Georgia, serif;
  font-style: italic;
  font-weight: 500;
  background: linear-gradient(135deg, #876039 0%, #b88e56 100%);
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
.bc { padding: 18px 0 16px; background: var(--bg2); border-bottom: 1px solid var(--line); font-size: 14px; color: var(--mute); font-weight: 600; }
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
.win { background: #fff; color: #211D19; border: 1px solid var(--line); border-radius: 20px; overflow: hidden; box-shadow: var(--shadow-md); font-size: 13px; }
.wb { display: flex; align-items: center; justify-content: space-between; padding: 12px 18px; background: var(--bg2); border-bottom: 1px solid var(--line); flex-wrap: wrap; gap: 6px; }
.wb .dots { display: flex; gap: 6px; }
.wb i { width: 10px; height: 10px; border-radius: 50%; background: #d8c9b8; display: inline-block; }
.wb i:nth-child(1) { background: #ff5f56; }
.wb i:nth-child(2) { background: #ffbd2e; }
.wb i:nth-child(3) { background: #27c93f; }
.wb .ttl { color: var(--br); font-weight: 500; font-family: 'Outfit', sans-serif; letter-spacing: 0.05em; font-size: 13px; text-transform: uppercase; }

/* Status Badges */
.badge { font-size: 11px; font-weight: 500; padding: 4px 10px; border-radius: 8px; text-transform: uppercase; display: inline-block; }
.badge.confirmed { background: #d1fae5; color: #065f46; }
.badge.pending { background: #fef3c7; color: #92400e; }
.badge.cancelled { background: #fee2e2; color: #991b1b; }
.badge.seated { background: #dbeafe; color: #1e40af; }

/* Timeline Component */
.timeline { display: flex; justify-content: space-between; position: relative; margin: 40px 0; }
.timeline::before { content: ""; position: absolute; top: 20px; left: 0; right: 0; height: 3px; background: var(--line); z-index: 0; }
.t-step { position: relative; z-index: 1; text-align: center; background: #fff; padding: 0 10px; }
.t-icon { width: 42px; height: 42px; border-radius: 50%; background: var(--bg2); border: 2px solid var(--br); color: var(--br); display: grid; place-items: center; margin: 0 auto 10px; font-weight: 500; font-size: 14px; transition: .3s; }
.t-step.active .t-icon { background: var(--br); color: #fff; box-shadow: 0 4px 12px rgba(135,96,57,0.3); }
.t-step h5 { font-size: 14px; font-weight: 700; color: var(--ink); margin: 0 0 2px; }
.t-step p { font-size: 12px; color: var(--mute); }

/* Industry Grid */
.ind-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }
.ind-card { border-radius: 18px; overflow: hidden; background: #fff; border: 1px solid var(--line); transition: transform .3s, box-shadow .3s; position: relative; }
.ind-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-md); border-color: rgba(135,96,57,0.3); }
.ind-img { height: 180px; background-size: cover; background-position: center; position: relative; }
.ind-overlay { position: absolute; inset: 0; background: linear-gradient(180deg, transparent 40%, rgba(36, 26, 20, 0.85) 100%); }
.ind-content { padding: 20px; }
.ind-content h4 { font-size: 18px; margin-bottom: 6px; display: flex; align-items: center; gap: 8px; }

/* FAQ Accordion */
.faq-list { max-width: 840px; margin: 0 auto; display: flex; flex-direction: column; gap: 14px; }
.faq-item { background: #fff; border: 1px solid var(--line); border-radius: 16px; overflow: hidden; transition: border-color .2s; }
.faq-item.open { border-color: var(--br); }
.faq-q { padding: 20px 24px; font-size: 17px; font-weight: 700; color: var(--ink); cursor: pointer; display: flex; justify-content: space-between; align-items: center; user-select: none; }
.faq-q svg { width: 20px; height: 20px; transition: transform .3s; stroke: var(--br); }
.faq-item.open .faq-q svg { transform: rotate(180deg); }
.faq-a { padding: 0 24px 20px; font-size: 15px; color: var(--mute); display: none; line-height: 1.65; border-top: 1px solid rgba(135,96,57,0.08); padding-top: 16px; }
.faq-item.open .faq-a { display: block; }

/* Reveal Animations */
.r { opacity: 0; transform: translateY(24px); transition: opacity .6s cubic-bezier(0.16, 1, 0.3, 1), transform .6s cubic-bezier(0.16, 1, 0.3, 1); }
.r.in { opacity: 1; transform: none; }

/* Responsive adjustments */
@media (max-width: 1024px) {
  .hero-split { grid-template-columns: 1fr; gap: 32px; }
  .ind-grid { grid-template-columns: repeat(2, 1fr); }
  .timeline { flex-direction: column; gap: 20px; }
  .timeline::before { display: none; }
  .t-step { text-align: left; display: flex; align-items: center; gap: 16px; }
  .t-icon { margin: 0; }
}
@media (max-width: 768px) {
  .bc { padding: 14px 0 14px; }
  .w { padding: 0 16px; }
  .ind-grid { grid-template-columns: 1fr; }
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
    <span>Reservation Management</span>
  </div>
</div>

<!-- ================= SECTION 4: HERO SECTION ================= -->
<section style="background: linear-gradient(180deg, var(--bg2) 0%, #ffffff 100%);">
  <div class="w">
    <div style="display: grid; grid-template-columns: 1fr 1.2fr; gap: 40px; align-items: center;">
      <!-- Hero Left Copy -->
      <div class="r in">
        <div class="eb">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M16 2v4M8 2v4M3 10h18M5 4h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2z"/></svg>
          RESERVATION MANAGEMENT
        </div>
        <h1>Manage Every Reservation.<br><span class="sf">Keep Every Table Ready.</span></h1>
        <p style="margin: 20px 0 32px; font-size: 18px; max-width: 530px;">
          Manage reservations, guest details, table allocation and booking status from one simple dashboard. Give your team a clear view of what's booked, what's available and who's arriving next.
        </p>
        <div style="display: flex; gap: 14px; flex-wrap: wrap;">
          <a href="{{ route('restaurant_signup') }}" class="btn p">Get Started →</a>
          <a href="{{ route('contact.us') }}" class="btn o">Book a Demo</a>
        </div>
        <div style="margin-top: 28px; font-size: 14px; color: var(--mute); font-weight: 600; display: flex; align-items: center; gap: 16px;">
          <span>✓ Real-time Table Status</span>
          <span>✓ Zero Booking Overlaps</span>
        </div>
      </div>

      <!-- Hero Visual: Reservation Dashboard Mockup -->
      <div class="win r in" style="transition-delay: 0.15s; box-shadow: var(--shadow-lg); position: relative;">
        <div class="wb">
          <div class="dots"><i></i><i></i><i></i></div>
          <div class="ttl">RESERVATIONS DASHBOARD</div>
          <div style="font-size: 11px; background: var(--br-light); color: var(--br); padding: 3px 10px; border-radius: 6px; font-weight: 700;">Today • 29 September</div>
        </div>
        
        <div style="padding: 16px; background: #fff;">
          <!-- Top Action Bar -->
          <div style="display: flex; justify-content: space-between; gap: 10px; margin-bottom: 14px;">
            <input type="text" placeholder="Search guest or reservation..." style="padding: 8px 12px; border: 1px solid var(--line); border-radius: 8px; font-size: 12px; width: 65%;">
            <button style="background: var(--br); color: #fff; border: 0; padding: 8px 14px; border-radius: 8px; font-weight: 700; font-size: 12px; cursor: pointer;">+ New Reservation</button>
          </div>

          <div style="display: grid; grid-template-columns: 1fr 140px; gap: 16px;">
            <!-- Today's Reservations List -->
            <div>
              <div style="font-size: 10px; font-weight: 500; color: var(--mute); letter-spacing: 0.05em; margin-bottom: 8px;">TODAY'S RESERVATIONS</div>
              
              <div style="display: flex; flex-direction: column; gap: 8px;">
                <div style="display: flex; justify-content: space-between; align-items: center; padding: 8px 12px; border: 1px solid var(--line); border-radius: 10px; background: #fff;">
                  <div>
                    <div style="font-weight: 500; color: var(--ink);">Rahul Kumar <span style="font-weight: 600; color: var(--mute); font-size: 11px;">(4 Guests)</span></div>
                    <div style="font-size: 11px; color: var(--br); font-weight: 700;">10:30 AM • Table T12</div>
                  </div>
                  <span class="badge confirmed">Confirmed</span>
                </div>

                <div style="display: flex; justify-content: space-between; align-items: center; padding: 8px 12px; border: 1px solid var(--line); border-radius: 10px; background: #fff;">
                  <div>
                    <div style="font-weight: 500; color: var(--ink);">Priya Sharma <span style="font-weight: 600; color: var(--mute); font-size: 11px;">(2 Guests)</span></div>
                    <div style="font-size: 11px; color: var(--br); font-weight: 700;">12:00 PM • Table T08</div>
                  </div>
                  <span class="badge confirmed">Confirmed</span>
                </div>

                <div style="display: flex; justify-content: space-between; align-items: center; padding: 8px 12px; border: 1px solid var(--line); border-radius: 10px; background: #fff;">
                  <div>
                    <div style="font-weight: 500; color: var(--ink);">Arun Kumar <span style="font-weight: 600; color: var(--mute); font-size: 11px;">(6 Guests)</span></div>
                    <div style="font-size: 11px; color: var(--br); font-weight: 700;">1:30 PM • Table T15</div>
                  </div>
                  <span class="badge pending">Pending</span>
                </div>

                <div style="display: flex; justify-content: space-between; align-items: center; padding: 8px 12px; border: 1px solid var(--line); border-radius: 10px; background: #fff;">
                  <div>
                    <div style="font-weight: 500; color: var(--ink);">Karthik <span style="font-weight: 600; color: var(--mute); font-size: 11px;">(2 Guests)</span></div>
                    <div style="font-size: 11px; color: var(--br); font-weight: 700;">7:30 PM • Table T04</div>
                  </div>
                  <span class="badge confirmed">Confirmed</span>
                </div>
              </div>
            </div>

            <!-- Table Status Side Panel -->
            <div style="background: var(--bg2); border-radius: 12px; padding: 12px; border: 1px solid var(--line); display: flex; flex-direction: column; gap: 10px;">
              <div style="font-size: 10px; font-weight: 500; color: var(--mute); letter-spacing: 0.05em;">TABLE STATUS</div>
              <div style="display: flex; justify-content: space-between; font-size: 12px;"><span>Available</span> <b style="color: var(--green);">12</b></div>
              <div style="display: flex; justify-content: space-between; font-size: 12px;"><span>Reserved</span> <b style="color: var(--br);">8</b></div>
              <div style="display: flex; justify-content: space-between; font-size: 12px;"><span>Occupied</span> <b style="color: var(--blue);">14</b></div>
              <div style="display: flex; justify-content: space-between; font-size: 12px;"><span>Cleaning</span> <b style="color: var(--yellow);">3</b></div>
            </div>
          </div>
        </div>

        <!-- Floating Notification Card -->
        <div style="position: absolute; bottom: 20px; right: 20px; background: #fff; border: 2px solid var(--br); border-radius: 14px; padding: 12px 16px; box-shadow: var(--shadow-lg); font-size: 12px; display: flex; gap: 12px; align-items: center; z-index: 10;">
          <div style="width: 36px; height: 36px; border-radius: 50%; background: var(--br-light); color: var(--br); display: grid; place-items: center; font-weight: 500;">🔔</div>
          <div>
            <div style="font-size: 10px; font-weight: 500; color: var(--br); letter-spacing: 0.05em;">NEW RESERVATION</div>
            <div style="font-weight: 500;">Rahul Kumar • 4 Guests</div>
            <div style="font-size: 11px; color: var(--mute);">7:30 PM • Table T12</div>
          </div>
          <button style="background: var(--br); color: #fff; border: 0; padding: 6px 12px; border-radius: 8px; font-weight: 500; font-size: 11px; cursor: pointer;">Confirm →</button>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 6: VALUE STRIP ================= -->
<section style="padding: 40px 0; background: var(--bg2); border-y: 1px solid var(--line);">
  <div class="w">
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 20px;">
      
      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 14px;">
          <svg viewBox="0 0 24 24"><path d="M16 2v4M8 2v4M3 10h18M5 4h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2z"/></svg>
        </div>
        <h4 style="font-size: 17px; margin-bottom: 6px;">One Reservation View</h4>
        <p style="font-size: 14px;">See upcoming bookings from one place.</p>
      </div>

      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 14px;">
          <svg viewBox="0 0 24 24"><rect x="3" y="8" width="18" height="4" rx="1"/><path d="M6 12v7M18 12v7"/></svg>
        </div>
        <h4 style="font-size: 17px; margin-bottom: 6px;">Faster Table Allocation</h4>
        <p style="font-size: 14px;">Assign suitable tables quickly.</p>
      </div>

      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 14px;">
          <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
        </div>
        <h4 style="font-size: 17px; margin-bottom: 6px;">Better Preparation</h4>
        <p style="font-size: 14px;">Know who's arriving and when.</p>
      </div>

      <div class="card" style="padding: 24px;">
        <div class="ic" style="margin-bottom: 14px;">
          <svg viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
        </div>
        <h4 style="font-size: 17px; margin-bottom: 6px;">Smoother Service</h4>
        <p style="font-size: 14px;">Keep your team prepared before guests arrive.</p>
      </div>

    </div>
  </div>
</section>

<!-- ================= SECTION 7: PROBLEM SECTION ================= -->
<section>
  <div class="w">
    <div class="hd r">
      <h2>Reservations Shouldn't Be a <span class="sf">Guessing Game.</span></h2>
      <p>
        Restaurants deal with phone bookings, walk-ins, last-minute changes, table availability and busy service periods every day. Geni Menu brings reservation information together in one clear workspace.
      </p>
    </div>

    <!-- Visual Comparison -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 32px; align-items: stretch;">
      <!-- Without Geni Menu -->
      <div class="card" style="padding: 32px; background: #fff5f5; border-color: #fecdd3;">
        <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 20px;">
          <div style="width: 36px; height: 36px; border-radius: 10px; background: #fee2e2; color: #dc2626; display: grid; place-items: center; font-weight: 500;">✕</div>
          <h3 style="color: #991b1b; font-size: 20px;">Without Geni Menu</h3>
        </div>

        <div style="display: flex; flex-direction: column; gap: 10px; text-align: center; font-weight: 700; color: #7f1d1d;">
          <div style="padding: 10px; background: #fff; border-radius: 10px; border: 1px solid #fca5a5;">📞 Phone Call</div>
          <div style="color: #ef4444;">↓</div>
          <div style="padding: 10px; background: #fff; border-radius: 10px; border: 1px solid #fca5a5;">📖 Handwritten Notebook</div>
          <div style="color: #ef4444;">↓</div>
          <div style="padding: 10px; background: #fff; border-radius: 10px; border: 1px solid #fca5a5;">👀 Walk Out to Check Tables</div>
          <div style="color: #ef4444;">↓</div>
          <div style="padding: 10px; background: #fff; border-radius: 10px; border: 1px solid #fca5a5;">🗣️ Ask Busy Waitstaff</div>
          <div style="color: #ef4444;">↓</div>
          <div style="padding: 10px; background: #fff; border-radius: 10px; border: 1px solid #fca5a5;">🪑 Assign Table Guessing</div>
          <div style="color: #ef4444;">↓</div>
          <div style="padding: 10px; background: #fee2e2; border-radius: 10px; border: 1px solid #dc2626; color: #dc2626;">❌ Double Bookings & Guest Delays</div>
        </div>
      </div>

      <!-- With Geni Menu -->
      <div class="card" style="padding: 32px; background: #fbf7f2; border-color: var(--br); box-shadow: var(--shadow-md);">
        <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 20px;">
          <div style="width: 36px; height: 36px; border-radius: 10px; background: var(--br); color: #fff; display: grid; place-items: center; font-weight: 500;">✓</div>
          <h3 style="color: var(--br); font-size: 20px;">With Geni Menu</h3>
        </div>

        <div style="display: flex; flex-direction: column; gap: 12px; text-align: center; font-weight: 700;">
          <div style="padding: 12px; background: #fff; border-radius: 10px; border: 1px solid var(--line); color: var(--ink);">
            📱 Instant Reservation
          </div>
          <div style="color: var(--br);">↓</div>
          <div style="padding: 12px; background: #fff; border-radius: 10px; border: 1px solid var(--line); color: var(--ink);">
            👤 Connected Guest Details
          </div>
          <div style="color: var(--br);">↓</div>
          <div style="padding: 12px; background: #fff; border-radius: 10px; border: 1px solid var(--line); color: var(--ink);">
            🪑 Live Table Availability
          </div>
          <div style="color: var(--br);">↓</div>
          <div style="padding: 12px; background: #fff; border-radius: 10px; border: 1px solid var(--line); color: var(--ink);">
            🎯 Automated Table Assignment
          </div>
          <div style="color: var(--br);">↓</div>
          <div style="padding: 14px; background: linear-gradient(135deg, #876039 0%, #a87646 100%); border-radius: 12px; color: #fff; box-shadow: 0 4px 16px rgba(135,96,57,0.3);">
            ✨ Ready for Seamless Service!
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 8: RESERVATION DASHBOARD ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd r">
      <h2>One Screen for <span class="sf">Every Reservation.</span></h2>
      <p>Give your front-of-house team a clear view of reservations, guests, times and table assignments.</p>
    </div>

    <!-- Large Reservation Table Mockup -->
    <div class="win r" style="box-shadow: var(--shadow-lg);">
      <div class="wb">
        <div class="dots"><i></i><i></i><i></i></div>
        <div class="ttl">RESERVATION MANAGEMENT CONSOLE</div>
        <div style="display: flex; gap: 8px;">
          <button style="padding: 4px 10px; border-radius: 6px; border: 1px solid var(--br); background: var(--br); color: #fff; font-size: 11px; font-weight: 700;">All</button>
          <button style="padding: 4px 10px; border-radius: 6px; border: 1px solid var(--line); background: #fff; font-size: 11px; font-weight: 700;">Today</button>
          <button style="padding: 4px 10px; border-radius: 6px; border: 1px solid var(--line); background: #fff; font-size: 11px; font-weight: 700;">Confirmed</button>
          <button style="padding: 4px 10px; border-radius: 6px; border: 1px solid var(--line); background: #fff; font-size: 11px; font-weight: 700;">Pending</button>
        </div>
      </div>

      <div style="padding: 20px; background: #fff; overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse; font-size: 13px; text-align: left;">
          <thead>
            <tr style="border-bottom: 2px solid var(--line); color: var(--mute); font-size: 11px; text-transform: uppercase;">
              <th style="padding: 12px;">Guest Name</th>
              <th style="padding: 12px;">Party Size</th>
              <th style="padding: 12px;">Time</th>
              <th style="padding: 12px;">Assigned Table</th>
              <th style="padding: 12px;">Status</th>
              <th style="padding: 12px; text-align: right;">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr style="border-bottom: 1px solid var(--line);">
              <td style="padding: 14px; font-weight: 500; color: var(--ink);">Rahul Kumar</td>
              <td style="padding: 14px;">4 Guests</td>
              <td style="padding: 14px; font-weight: 700; color: var(--br);">7:30 PM</td>
              <td style="padding: 14px; font-weight: 700;">Table T12</td>
              <td style="padding: 14px;"><span class="badge confirmed">Confirmed</span></td>
              <td style="padding: 14px; text-align: right;"><button style="border: 1px solid var(--line); background: var(--bg2); padding: 4px 10px; border-radius: 6px; font-weight: 700; cursor: pointer;">Edit</button></td>
            </tr>

            <tr style="border-bottom: 1px solid var(--line);">
              <td style="padding: 14px; font-weight: 500; color: var(--ink);">Priya Sharma</td>
              <td style="padding: 14px;">2 Guests</td>
              <td style="padding: 14px; font-weight: 700; color: var(--br);">8:00 PM</td>
              <td style="padding: 14px; font-weight: 700;">Table T08</td>
              <td style="padding: 14px;"><span class="badge confirmed">Confirmed</span></td>
              <td style="padding: 14px; text-align: right;"><button style="border: 1px solid var(--line); background: var(--bg2); padding: 4px 10px; border-radius: 6px; font-weight: 700; cursor: pointer;">Edit</button></td>
            </tr>

            <tr style="border-bottom: 1px solid var(--line);">
              <td style="padding: 14px; font-weight: 500; color: var(--ink);">Arun Kumar</td>
              <td style="padding: 14px;">6 Guests</td>
              <td style="padding: 14px; font-weight: 700; color: var(--br);">8:30 PM</td>
              <td style="padding: 14px; font-weight: 700;">Table T15</td>
              <td style="padding: 14px;"><span class="badge pending">Pending</span></td>
              <td style="padding: 14px; text-align: right;"><button style="border: 1px solid var(--br); background: var(--br); color: #fff; padding: 4px 10px; border-radius: 6px; font-weight: 700; cursor: pointer;">Confirm</button></td>
            </tr>

            <tr>
              <td style="padding: 14px; font-weight: 500; color: var(--ink);">Meena Family</td>
              <td style="padding: 14px;">5 Guests</td>
              <td style="padding: 14px; font-weight: 700; color: var(--br);">9:00 PM</td>
              <td style="padding: 14px; font-weight: 700;">Table T18</td>
              <td style="padding: 14px;"><span class="badge confirmed">Confirmed</span></td>
              <td style="padding: 14px; text-align: right;"><button style="border: 1px solid var(--line); background: var(--bg2); padding: 4px 10px; border-radius: 6px; font-weight: 700; cursor: pointer;">Edit</button></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 9: CREATE RESERVATION FORM ================= -->
<section>
  <div class="w">
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 48px; align-items: center;" class="r">
      <div>
        <div class="eb">FAST BOOKING CREATION</div>
        <h2>Create a Reservation <span class="sf">in Seconds.</span></h2>
        <p style="margin: 16px 0 24px;">
          Capture essential booking details without slowing down your front-of-house team during peak hours.
        </p>

        <ul style="display: flex; flex-direction: column; gap: 12px; font-weight: 600;">
          <li style="display: flex; align-items: center; gap: 10px;"><span style="color: var(--br);">✓</span> Quick guest name & contact lookup</li>
          <li style="display: flex; align-items: center; gap: 10px;"><span style="color: var(--br);">✓</span> Instant table capacity matching</li>
          <li style="display: flex; align-items: center; gap: 10px;"><span style="color: var(--br);">✓</span> Record birthday/anniversary special requests</li>
          <li style="display: flex; align-items: center; gap: 10px;"><span style="color: var(--br);">✓</span> Instant confirmation SMS/WhatsApp trigger</li>
        </ul>
      </div>

      <!-- Form Mockup -->
      <div class="win" style="box-shadow: var(--shadow-lg);">
        <div class="wb">
          <div class="dots"><i></i><i></i><i></i></div>
          <div class="ttl">NEW RESERVATION FORM</div>
          <div></div>
        </div>
        <div style="padding: 24px; background: #fff; display: flex; flex-direction: column; gap: 14px;">
          <div>
            <label style="font-weight: 700; font-size: 12px; display: block; margin-bottom: 4px;">Guest Name</label>
            <input type="text" value="Rahul Kumar" style="width: 100%; padding: 8px 12px; border: 1px solid var(--line); border-radius: 8px; font-weight: 600;">
          </div>

          <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
            <div>
              <label style="font-weight: 700; font-size: 12px; display: block; margin-bottom: 4px;">Phone Number</label>
              <input type="text" value="+91 90475 55066" style="width: 100%; padding: 8px 12px; border: 1px solid var(--line); border-radius: 8px; font-weight: 600;">
            </div>
            <div>
              <label style="font-weight: 700; font-size: 12px; display: block; margin-bottom: 4px;">Date</label>
              <input type="text" value="29 September 2026" style="width: 100%; padding: 8px 12px; border: 1px solid var(--line); border-radius: 8px; font-weight: 600;">
            </div>
          </div>

          <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 12px;">
            <div>
              <label style="font-weight: 700; font-size: 12px; display: block; margin-bottom: 4px;">Time</label>
              <input type="text" value="7:30 PM" style="width: 100%; padding: 8px 12px; border: 1px solid var(--line); border-radius: 8px; font-weight: 600;">
            </div>
            <div>
              <label style="font-weight: 700; font-size: 12px; display: block; margin-bottom: 4px;">Guests</label>
              <input type="text" value="4" style="width: 100%; padding: 8px 12px; border: 1px solid var(--line); border-radius: 8px; font-weight: 600;">
            </div>
            <div>
              <label style="font-weight: 700; font-size: 12px; display: block; margin-bottom: 4px;">Table</label>
              <select style="width: 100%; padding: 8px 12px; border: 1px solid var(--line); border-radius: 8px; font-weight: 600;">
                <option selected>T12 (4 Seats)</option>
                <option>T08 (2 Seats)</option>
              </select>
            </div>
          </div>

          <div>
            <label style="font-weight: 700; font-size: 12px; display: block; margin-bottom: 4px;">Special Request</label>
            <input type="text" value="Birthday celebration" style="width: 100%; padding: 8px 12px; border: 1px solid var(--line); border-radius: 8px; font-weight: 500;">
          </div>

          <button class="btn p" style="margin-top: 6px; justify-content: center;">Confirm Reservation</button>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 10: TABLE ALLOCATION & FLOOR PLAN ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd r">
      <div class="eb">TABLE ALLOCATION</div>
      <h2>Assign the Right Table at <span class="sf">the Right Time.</span></h2>
      <p>See available tables and allocate seating based on your restaurant's floor-plan layout.</p>
    </div>

    <!-- Restaurant Floor Plan Layout UI -->
    <div class="win r" style="box-shadow: var(--shadow-lg); max-width: 900px; margin: auto;">
      <div class="wb">
        <div class="dots"><i></i><i></i><i></i></div>
        <div class="ttl">RESTAURANT FLOOR PLAN SEATING</div>
        <div style="display: flex; gap: 12px; font-size: 11px; font-weight: 700;">
          <span><i style="background: var(--green); width: 8px; height: 8px; border-radius: 50%; display: inline-block;"></i> Available</span>
          <span><i style="background: var(--br); width: 8px; height: 8px; border-radius: 50%; display: inline-block;"></i> Reserved</span>
          <span><i style="background: var(--blue); width: 8px; height: 8px; border-radius: 50%; display: inline-block;"></i> Occupied</span>
          <span><i style="background: var(--yellow); width: 8px; height: 8px; border-radius: 50%; display: inline-block;"></i> Cleaning</span>
        </div>
      </div>
      <div style="padding: 28px; background: #fff;">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 16px;">
          
          <div style="padding: 16px; border: 2px solid var(--green); border-radius: 14px; background: #ecfdf5; text-align: center;">
            <div style="font-weight: 500; font-size: 18px; color: var(--ink);">TABLE T01</div>
            <div style="font-size: 12px; color: var(--mute);">2 Seats</div>
            <div style="margin-top: 8px; font-weight: 500; font-size: 11px; color: #065f46; background: #d1fae5; padding: 3px 8px; border-radius: 6px; display: inline-block;">AVAILABLE</div>
          </div>

          <div style="padding: 16px; border: 2px solid var(--br); border-radius: 14px; background: var(--bg2); text-align: center;">
            <div style="font-weight: 500; font-size: 18px; color: var(--ink);">TABLE T02</div>
            <div style="font-size: 12px; color: var(--mute);">4 Seats</div>
            <div style="margin-top: 8px; font-weight: 500; font-size: 11px; color: #fff; background: var(--br); padding: 3px 8px; border-radius: 6px; display: inline-block;">RESERVED</div>
          </div>

          <div style="padding: 16px; border: 2px solid var(--green); border-radius: 14px; background: #ecfdf5; text-align: center;">
            <div style="font-weight: 500; font-size: 18px; color: var(--ink);">TABLE T03</div>
            <div style="font-size: 12px; color: var(--mute);">6 Seats</div>
            <div style="margin-top: 8px; font-weight: 500; font-size: 11px; color: #065f46; background: #d1fae5; padding: 3px 8px; border-radius: 6px; display: inline-block;">AVAILABLE</div>
          </div>

          <div style="padding: 16px; border: 2px solid var(--blue); border-radius: 14px; background: #eff6ff; text-align: center;">
            <div style="font-weight: 500; font-size: 18px; color: var(--ink);">TABLE T04</div>
            <div style="font-size: 12px; color: var(--mute);">2 Seats</div>
            <div style="margin-top: 8px; font-weight: 500; font-size: 11px; color: #1e40af; background: #dbeafe; padding: 3px 8px; border-radius: 6px; display: inline-block;">OCCUPIED</div>
          </div>

          <div style="padding: 16px; border: 2px solid var(--yellow); border-radius: 14px; background: #fffbeb; text-align: center;">
            <div style="font-weight: 500; font-size: 18px; color: var(--ink);">TABLE T05</div>
            <div style="font-size: 12px; color: var(--mute);">4 Seats</div>
            <div style="margin-top: 8px; font-weight: 500; font-size: 11px; color: #92400e; background: #fef3c7; padding: 3px 8px; border-radius: 6px; display: inline-block;">CLEANING</div>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 11: CALENDAR & TIMELINE ================= -->
<section>
  <div class="w">
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 48px; align-items: center;" class="r">
      <div>
        <div class="eb">RESERVATION CALENDAR</div>
        <h2>See Your Restaurant's Day <span class="sf">at a Glance.</span></h2>
        <p style="margin: 16px 0 24px;">
          Track guest arrivals across time slots so kitchen and service teams can prepare seamlessly.
        </p>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 24px;">
          <div class="card" style="padding: 20px; text-align: center; background: var(--bg2);">
            <div style="font-size: 28px; font-weight: 500; color: var(--br);">18</div>
            <div style="font-size: 13px; font-weight: 700; color: var(--ink);">Today's Reservations</div>
          </div>
          <div class="card" style="padding: 20px; text-align: center; background: var(--bg2);">
            <div style="font-size: 28px; font-weight: 500; color: var(--br);">64</div>
            <div style="font-size: 13px; font-weight: 700; color: var(--ink);">Guests Expected</div>
          </div>
        </div>
      </div>

      <!-- Calendar & Schedule Mockup -->
      <div class="win" style="box-shadow: var(--shadow-lg);">
        <div class="wb">
          <div class="dots"><i></i><i></i><i></i></div>
          <div class="ttl">SEPTEMBER 2026 SCHEDULE</div>
          <div style="color: var(--br); font-weight: 500;">Date: 29</div>
        </div>
        <div style="padding: 20px; background: #fff;">
          <div style="display: flex; flex-direction: column; gap: 8px;">
            <div style="display: flex; justify-content: space-between; padding: 8px 12px; border: 1px solid var(--line); border-radius: 8px;">
              <span style="font-weight: 700; color: var(--br);">10:30 AM</span>
              <span style="font-weight: 600;">2 Guests (Table T02)</span>
            </div>
            <div style="display: flex; justify-content: space-between; padding: 8px 12px; border: 1px solid var(--line); border-radius: 8px;">
              <span style="font-weight: 700; color: var(--br);">12:00 PM</span>
              <span style="font-weight: 600;">4 Guests (Table T08)</span>
            </div>
            <div style="display: flex; justify-content: space-between; padding: 8px 12px; border: 1px solid var(--line); border-radius: 8px;">
              <span style="font-weight: 700; color: var(--br);">1:30 PM</span>
              <span style="font-weight: 600;">6 Guests (Table T15)</span>
            </div>
            <div style="display: flex; justify-content: space-between; padding: 8px 12px; border: 1px solid var(--line); border-radius: 8px;">
              <span style="font-weight: 700; color: var(--br);">7:00 PM</span>
              <span style="font-weight: 600;">4 Guests (Table T04)</span>
            </div>
            <div style="display: flex; justify-content: space-between; padding: 8px 12px; border: 1px solid var(--line); border-radius: 8px;">
              <span style="font-weight: 700; color: var(--br);">7:30 PM</span>
              <span style="font-weight: 600;">8 Guests (Table T12)</span>
            </div>
            <div style="display: flex; justify-content: space-between; padding: 8px 12px; border: 1px solid var(--line); border-radius: 8px;">
              <span style="font-weight: 700; color: var(--br);">8:30 PM</span>
              <span style="font-weight: 600;">6 Guests (Table T18)</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 12: RESERVATION STATUS TIMELINE ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd r">
      <h2>Know What <span class="sf">Happens Next.</span></h2>
      <p>Clear status progression keeps the host desk and floor staff perfectly synchronized.</p>
    </div>

    <!-- Timeline Component -->
    <div class="timeline r">
      <div class="t-step active">
        <div class="t-icon">1</div>
        <h5>Reservation Created</h5>
        <p>Booking received</p>
      </div>

      <div class="t-step active">
        <div class="t-icon">2</div>
        <h5>Pending</h5>
        <p>Awaiting table match</p>
      </div>

      <div class="t-step active">
        <div class="t-icon">3</div>
        <h5>Confirmed</h5>
        <p>Table allocated</p>
      </div>

      <div class="t-step active">
        <div class="t-icon">4</div>
        <h5>Guest Arrived</h5>
        <p>Host welcomes guest</p>
      </div>

      <div class="t-step active">
        <div class="t-icon">5</div>
        <h5>Seated</h5>
        <p>Order flow begins</p>
      </div>

      <div class="t-step">
        <div class="t-icon">6</div>
        <h5>Completed</h5>
        <p>Table freed & cleaned</p>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 13 & 14: GUEST DETAILS & CHANGES ================= -->
<section>
  <div class="w">
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px; align-items: center;" class="r">
      <!-- Guest Details UI -->
      <div class="win" style="box-shadow: var(--shadow-lg);">
        <div class="wb">
          <div class="dots"><i></i><i></i><i></i></div>
          <div class="ttl">GUEST PROFILE CARD</div>
          <div style="background: #fef3c7; color: #92400e; padding: 2px 8px; border-radius: 6px; font-weight: 500;">4 Visits</div>
        </div>
        <div style="padding: 24px; background: #fff;">
          <h3 style="font-size: 20px; margin-bottom: 4px;">RAHUL KUMAR</h3>
          <p style="font-size: 13px; color: var(--mute); margin-bottom: 16px;">Phone: +91 90475 55066 • 12 Previous Reservations</p>

          <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; background: var(--bg2); padding: 14px; border-radius: 12px; border: 1px solid var(--line); font-size: 13px;">
            <div><b>Guests:</b> 4</div>
            <div><b>Time:</b> 7:30 PM</div>
            <div><b>Table:</b> T12</div>
            <div><b>Request:</b> Birthday 🎉</div>
          </div>
        </div>
      </div>

      <!-- Reservation Change UI -->
      <div class="win" style="box-shadow: var(--shadow-lg);">
        <div class="wb">
          <div class="dots"><i></i><i></i><i></i></div>
          <div class="ttl">UPDATE RESERVATION #GM1024</div>
          <div style="color: var(--br); font-weight: 500;">ADAPT BOOKING</div>
        </div>
        <div style="padding: 24px; background: #fff; display: flex; flex-direction: column; gap: 12px;">
          <div style="font-weight: 500; font-size: 16px;">Rahul Kumar</div>
          
          <div style="display: flex; justify-content: space-between; padding: 8px 12px; background: var(--bg2); border-radius: 8px; font-size: 13px;">
            <span>Guests</span>
            <span style="font-weight: 500; color: var(--br);">4 Guests → 6 Guests</span>
          </div>

          <div style="display: flex; justify-content: space-between; padding: 8px 12px; background: var(--bg2); border-radius: 8px; font-size: 13px;">
            <span>Time</span>
            <span style="font-weight: 500; color: var(--br);">7:30 PM → 8:00 PM</span>
          </div>

          <div style="display: flex; justify-content: space-between; padding: 8px 12px; background: var(--bg2); border-radius: 8px; font-size: 13px;">
            <span>Table</span>
            <span style="font-weight: 500; color: var(--br);">Table T12 → Table T18</span>
          </div>

          <div style="display: flex; gap: 8px; flex-wrap: wrap; margin-top: 8px;">
            <button class="btn p" style="flex: 1; padding: 8px 14px; font-size: 12px;">Update Reservation</button>
            <button class="btn o" style="padding: 8px 14px; font-size: 12px; border-color: #fca5a5; color: #dc2626;">Cancel</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 15 & 16: TABLE CONNECTION & PEAK-HOUR VISIBILITY ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div style="display: grid; grid-template-columns: 1.1fr 1fr; gap: 48px; align-items: center;" class="r">
      <div>
        <div class="eb">PEAK-HOUR PREPARATION</div>
        <h2>Prepare Before <span class="sf">the Rush.</span></h2>
        <p style="margin: 16px 0 24px;">
          Understand when reservations are building up so your kitchen and floor team can prepare for busy service periods.
        </p>

        <div style="display: flex; flex-direction: column; gap: 12px;">
          <div style="display: flex; items-center; justify-content: space-between; font-size: 13px; font-weight: 700;">
            <span>10:00 AM</span>
            <div style="flex: 1; margin: 0 16px; height: 12px; background: #e2d5c0; border-radius: 6px; overflow: hidden;"><div style="width: 20%; height: 100%; background: var(--br);"></div></div>
            <span>2 Bookings</span>
          </div>

          <div style="display: flex; items-center; justify-content: space-between; font-size: 13px; font-weight: 700;">
            <span>12:00 PM</span>
            <div style="flex: 1; margin: 0 16px; height: 12px; background: #e2d5c0; border-radius: 6px; overflow: hidden;"><div style="width: 55%; height: 100%; background: var(--br);"></div></div>
            <span>5 Bookings</span>
          </div>

          <div style="display: flex; items-center; justify-content: space-between; font-size: 13px; font-weight: 700;">
            <span>2:00 PM</span>
            <div style="flex: 1; margin: 0 16px; height: 12px; background: #e2d5c0; border-radius: 6px; overflow: hidden;"><div style="width: 35%; height: 100%; background: var(--br);"></div></div>
            <span>3 Bookings</span>
          </div>

          <div style="display: flex; items-center; justify-content: space-between; font-size: 13px; font-weight: 700;">
            <span>6:00 PM</span>
            <div style="flex: 1; margin: 0 16px; height: 12px; background: #e2d5c0; border-radius: 6px; overflow: hidden;"><div style="width: 75%; height: 100%; background: var(--br);"></div></div>
            <span>7 Bookings</span>
          </div>

          <div style="display: flex; items-center; justify-content: space-between; font-size: 13px; font-weight: 700;">
            <span>8:00 PM (Peak)</span>
            <div style="flex: 1; margin: 0 16px; height: 12px; background: #e2d5c0; border-radius: 6px; overflow: hidden;"><div style="width: 95%; height: 100%; background: var(--br);"></div></div>
            <span>9 Bookings</span>
          </div>
        </div>
      </div>

      <!-- Flow Visual -->
      <div class="card" style="padding: 32px; background: #fff;">
        <h3 style="font-size: 20px; margin-bottom: 16px;">Reservation to Table Connection</h3>
        <div style="display: flex; flex-direction: column; gap: 12px; text-align: center; font-weight: 700;">
          <div style="padding: 12px; background: var(--bg2); border-radius: 10px; border: 1px solid var(--line);">📅 RESERVATION: Rahul Kumar (4 Guests, 7:30 PM)</div>
          <div style="color: var(--br);">↓</div>
          <div style="padding: 12px; background: var(--bg2); border-radius: 10px; border: 1px solid var(--line);">🪑 TABLE ALLOCATION: Table T12 (Reserved)</div>
          <div style="color: var(--br);">↓</div>
          <div style="padding: 12px; background: var(--bg2); border-radius: 10px; border: 1px solid var(--line);">🚪 GUEST ARRIVES & SEATED</div>
          <div style="color: var(--br);">↓</div>
          <div style="padding: 14px; background: var(--br); color: #fff; border-radius: 10px; box-shadow: var(--shadow-sm);">🍽️ SERVICE & ORDERING BEGINS</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 17: CUSTOMER EXPERIENCE SPLIT VISUAL ================= -->
<section>
  <div class="w">
    <div class="hd r">
      <h2>A Better Reservation Experience <span class="sf">Starts Before Arrival.</span></h2>
      <p style="font-size: 20px; font-weight: 500; color: var(--br); margin-top: 12px;">Less Waiting. Better Preparation. Smoother Service.</p>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 32px;" class="r">
      <div class="card" style="padding: 32px; background: var(--bg2);">
        <h3 style="color: var(--br); margin-bottom: 16px;">RESTAURANT TEAM</h3>
        <div style="display: flex; flex-direction: column; gap: 12px; font-weight: 700;">
          <div style="padding: 12px; background: #fff; border-radius: 10px; border: 1px solid var(--line);">1. Reservation Received</div>
          <div style="text-align: center; color: var(--br);">↓</div>
          <div style="padding: 12px; background: #fff; border-radius: 10px; border: 1px solid var(--line);">2. Table Assigned</div>
          <div style="text-align: center; color: var(--br);">↓</div>
          <div style="padding: 12px; background: #fff; border-radius: 10px; border: 1px solid var(--line);">3. Floor Team Prepared</div>
        </div>
      </div>

      <div class="card" style="padding: 32px; background: #fff; border-color: var(--br);">
        <h3 style="color: var(--br); margin-bottom: 16px;">GUEST EXPERIENCE</h3>
        <div style="display: flex; flex-direction: column; gap: 12px; font-weight: 700;">
          <div style="padding: 12px; background: var(--bg2); border-radius: 10px; border: 1px solid var(--line);">1. Reservation Confirmed</div>
          <div style="text-align: center; color: var(--br);">↓</div>
          <div style="padding: 12px; background: var(--bg2); border-radius: 10px; border: 1px solid var(--line);">2. Arrives at Restaurant</div>
          <div style="text-align: center; color: var(--br);">↓</div>
          <div style="padding: 14px; background: var(--br); color: #fff; border-radius: 10px;">3. Table Ready & Seated Instantly</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 19: RESTAURANT TYPES ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd r">
      <div class="eb">BUILT FOR EVERY DINING EXPERIENCE</div>
      <h2>Built for Every <span class="sf">Dining Experience.</span></h2>
    </div>

    <div class="ind-grid r">
      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=600&auto=format&fit=crop&q=80');">
          <div class="ind-overlay"></div>
        </div>
        <div class="ind-content">
          <h4>🍷 Fine Dining</h4>
          <p>Manage reservations around premium multi-course table service.</p>
        </div>
      </div>

      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1555396273-367ea4eb4db5?w=600&auto=format&fit=crop&q=80');">
          <div class="ind-overlay"></div>
        </div>
        <div class="ind-content">
          <h4>🍽️ Casual Dining</h4>
          <p>Keep everyday bookings organized during busy lunch and dinner hours.</p>
        </div>
      </div>

      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1559339352-11d035aa65de?w=600&auto=format&fit=crop&q=80');">
          <div class="ind-overlay"></div>
        </div>
        <div class="ind-content">
          <h4>👨‍👩‍👧‍👦 Family Restaurants</h4>
          <p>Handle larger party sizes, group bookings and flexible table joins.</p>
        </div>
      </div>

      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1554118811-1e0d58224f24?w=600&auto=format&fit=crop&q=80');">
          <div class="ind-overlay"></div>
        </div>
        <div class="ind-content">
          <h4>☕ Cafés</h4>
          <p>Manage reservations during peak weekend brunch and coffee hours.</p>
        </div>
      </div>

      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1566073771259-6a8506099945?w=600&auto=format&fit=crop&q=80');">
          <div class="ind-overlay"></div>
        </div>
        <div class="ind-content">
          <h4>🏨 Hotels & Resorts</h4>
          <p>Coordinate dining reservations within larger hotel hospitality operations.</p>
        </div>
      </div>

      <div class="ind-card">
        <div class="ind-img" style="background-image: url('https://images.unsplash.com/photo-1514933651103-005eec06c04b?w=600&auto=format&fit=crop&q=80');">
          <div class="ind-overlay"></div>
        </div>
        <div class="ind-content">
          <h4>🍲 Multi-Cuisine</h4>
          <p>Manage reservations across different dining sections and floors.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 20 & 21: CONNECTED OPERATIONS & BENEFITS ================= -->
<section>
  <div class="w">
    <div class="hd r">
      <h2>Reservations <span class="sf">Don't Work Alone.</span></h2>
      <p>Connect reservations with the rest of your restaurant operations for a smoother service flow.</p>
    </div>

    <!-- ECOSYSTEM FLOW -->
    <div style="display: flex; justify-content: center; gap: 12px; flex-wrap: wrap; margin-bottom: 60px;" class="r">
      <div style="padding: 14px 20px; background: var(--br); color: #fff; font-weight: 500; border-radius: 12px; box-shadow: var(--shadow-sm);">RESERVATIONS</div>
      <div style="align-self: center; color: var(--br); font-size: 20px;">→</div>
      <div style="padding: 14px 20px; background: #fff; border: 1px solid var(--line); font-weight: 700; border-radius: 12px;">TABLES</div>
      <div style="align-self: center; color: var(--br); font-size: 20px;">→</div>
      <div style="padding: 14px 20px; background: #fff; border: 1px solid var(--line); font-weight: 700; border-radius: 12px;">WAITER</div>
      <div style="align-self: center; color: var(--br); font-size: 20px;">→</div>
      <div style="padding: 14px 20px; background: #fff; border: 1px solid var(--line); font-weight: 700; border-radius: 12px;">ORDER</div>
      <div style="align-self: center; color: var(--br); font-size: 20px;">→</div>
      <div style="padding: 14px 20px; background: #fff; border: 1px solid var(--line); font-weight: 700; border-radius: 12px;">KITCHEN</div>
      <div style="align-self: center; color: var(--br); font-size: 20px;">→</div>
      <div style="padding: 14px 20px; background: #fff; border: 1px solid var(--line); font-weight: 700; border-radius: 12px;">POS</div>
      <div style="align-self: center; color: var(--br); font-size: 20px;">→</div>
      <div style="padding: 14px 20px; background: #fff; border: 1px solid var(--line); font-weight: 700; border-radius: 12px;">PAYMENT</div>
    </div>

    <!-- 6 VISUAL BENEFITS -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 24px;" class="r">
      <div class="card" style="padding: 28px;">
        <div class="ic" style="margin-bottom: 18px;">
          <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
        </div>
        <h3 style="font-size: 19px; margin-bottom: 8px;">Real-Time Visibility</h3>
        <p>Know what's booked and what's available instantly across all service slots.</p>
      </div>

      <div class="card" style="padding: 28px;">
        <div class="ic" style="margin-bottom: 18px;">
          <svg viewBox="0 0 24 24"><rect x="3" y="8" width="18" height="4" rx="1"/><path d="M6 12v7M18 12v7"/></svg>
        </div>
        <h3 style="font-size: 19px; margin-bottom: 8px;">Faster Table Allocation</h3>
        <p>Assign tables without unnecessary back-and-forth or floor confusion.</p>
      </div>

      <div class="card" style="padding: 28px;">
        <div class="ic" style="margin-bottom: 18px;">
          <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
        </div>
        <h3 style="font-size: 19px; margin-bottom: 8px;">Guest Information</h3>
        <p>Keep essential reservation details and special requests accessible to staff.</p>
      </div>

      <div class="card" style="padding: 28px;">
        <div class="ic" style="margin-bottom: 18px;">
          <svg viewBox="0 0 24 24"><path d="M16 2v4M8 2v4M3 10h18M5 4h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2z"/></svg>
        </div>
        <h3 style="font-size: 19px; margin-bottom: 8px;">Better Preparation</h3>
        <p>Know who's arriving and when, so kitchen and service teams prepare ahead.</p>
      </div>

      <div class="card" style="padding: 28px;">
        <div class="ic" style="margin-bottom: 18px;">
          <svg viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
        </div>
        <h3 style="font-size: 19px; margin-bottom: 8px;">Organized Service</h3>
        <p>Keep front-of-house operations structured during busy service hours.</p>
      </div>

      <div class="card" style="padding: 28px;">
        <div class="ic" style="margin-bottom: 18px;">
          <svg viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
        </div>
        <h3 style="font-size: 19px; margin-bottom: 8px;">Centralized Management</h3>
        <p>Manage all table bookings and reservations from one clean workspace.</p>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 25: FAQ ================= -->
<section style="background: var(--bg2);">
  <div class="w">
    <div class="hd r">
      <h2>Frequently Asked <span class="sf">Questions</span></h2>
      <p>Everything you need to know about Geni Menu Reservation Management.</p>
    </div>

    <div class="faq-list r">
      <div class="faq-item open">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>Can I see all upcoming reservations in one place?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. The reservation dashboard provides a centralized view of upcoming bookings, filterable by date, time, and status.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>Can I assign tables to reservations?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Where table allocation is enabled, reservations can be associated directly with configured tables on your floor plan.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>Can I update a reservation?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Reservation details such as party size, time slot, and table assignment can be updated easily when guest plans change.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>Can I manage guest details?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. Essential guest information (name, phone number, special requests, visit history) associated with reservations can be viewed and managed.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>Can I see today's reservations?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Yes. The reservation interface provides a dedicated day-focused view of bookings to keep your host team prepared.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>Can I manage different table sizes?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Table allocation can be based on your configured tables and seating capacity (2-seaters, 4-seaters, 6+ large group tables).
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          <span>Can reservations connect with tables and orders?</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="faq-a">
          Where the corresponding Geni Menu modules are enabled, reservation operations work seamlessly alongside table status, order workflow, and POS billing.
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION 24: FINAL CTA ================= -->
<section style="background: linear-gradient(135deg, #876039 0%, #6f4e2d 100%); color: #fff; text-align: center;">
  <div class="w r">
    <div class="eb" style="background: rgba(255,255,255,0.15); color: #fff; border-color: rgba(255,255,255,0.3);">
      TAKE CONTROL OF YOUR FLOOR
    </div>
    <h2 style="color: #fff; font-size: clamp(34px, 5vw, 54px);">Make Every <span class="sf" style="background: linear-gradient(135deg, #fff 0%, #f4efe9 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Reservation Count.</span></h2>
    <p style="color: #f4efe9; max-width: 620px; margin: 20px auto 36px; font-size: 18px;">
      Give your team a simpler way to manage bookings, tables and guests — and create a smoother experience from reservation to seating.
    </p>

    <div style="display: flex; gap: 16px; justify-content: center; flex-wrap: wrap;">
      <a href="{{ route('restaurant_signup') }}" class="btn" style="background: #fff; color: var(--br); border-color: #fff; font-size: 16px; padding: 16px 36px; box-shadow: 0 8px 24px rgba(0,0,0,0.2);">Get Started →</a>
      <a href="{{ route('contact.us') }}" class="btn" style="background: transparent; color: #fff; border-color: rgba(255,255,255,0.5); font-size: 16px; padding: 16px 36px;">Book a Demo</a>
    </div>

    <div style="margin-top: 36px; font-size: 14px; color: #e5d8c8; font-weight: 600;">
      Built for restaurants, cafés, hotels, QSRs and modern food businesses.
    </div>
  </div>
</section>




<script>
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
