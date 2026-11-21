@php
    $meta = [
        'title' => 'Contact Geni Menu | Restaurant Management Software Support & Sales',
        'description' => 'Contact Geni Menu to discuss your restaurant software requirements, request a product demo, or get support for your existing setup.',
        'keywords' => 'contact Geni Menu, restaurant software demo, restaurant POS sales, Geni Menu support, restaurant billing software contact',
    ];
@endphp
@extends('layouts.frontend-master')

@section('content')

<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<style>
:root {
  --br: #876039;
  --br-dark: #6f4e2d;
  --br-light: #FAF6EF;
  --bg: #ffffff;
  --bg2: #FAF7F2;
  --ink: #21160F;
  --mute: #6E6157;
  --line: rgba(135, 96, 57, 0.16);
  --shadow-sm: 0 4px 20px rgba(33, 22, 15, 0.04);
  --shadow-md: 0 16px 40px rgba(33, 22, 15, 0.08);
  --shadow-lg: 0 26px 50px rgba(33, 22, 15, 0.12);
  --green: #10B981;
}

* { box-sizing: border-box; }
html { scroll-behavior: smooth; }
body {
  margin: 0;
  font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
  font-size: 15.5px;
  line-height: 1.65;
  color: var(--ink);
  background: var(--bg) !important;
  overflow-x: hidden;
  -webkit-font-smoothing: antialiased;
}

h1, h2, h3, h4, h5 {
  margin: 0;
  font-family: 'Outfit', 'Plus Jakarta Sans', sans-serif;
  font-weight: 600;
  line-height: 1.18;
  letter-spacing: -0.02em;
  color: var(--ink);
}
h1 { font-size: clamp(34px, 4.8vw, 52px); font-weight: 600; }
h2 { font-size: clamp(26px, 3.6vw, 40px); font-weight: 600; }
h3 { font-size: 20px; font-weight: 600; }
h4 { font-size: 17px; font-weight: 600; }
p { margin: 0; color: var(--mute); font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif; font-size: 15.5px; line-height: 1.65; }
a { color: inherit; text-decoration: none; }
ul { list-style: none; margin: 0; padding: 0; }

.eb {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  font-family: 'Plus Jakarta Sans', sans-serif;
  font-size: 12px;
  letter-spacing: .14em;
  font-weight: 600;
  text-transform: uppercase;
  color: var(--br);
  margin-bottom: 16px;
  background: linear-gradient(135deg, #fbf7f2 0%, #f4efe9 100%);
  padding: 7px 18px;
  border-radius: 99px;
  border: 1px solid rgba(135, 96, 57, 0.22);
  box-shadow: 0 2px 10px rgba(135, 96, 57, 0.08);
}

.w { max-width: 1240px; margin: auto; padding: 0 24px; position: relative; z-index: 1; }
section { padding: clamp(60px, 7vw, 96px) 0; background: var(--bg); position: relative; overflow: hidden; }
section.alt { background: var(--bg2); }

.hd { max-width: 760px; margin: 0 auto 52px; text-align: center; }
.hd p { margin-top: 14px; font-size: 17px; }
.hd.left { text-align: left; margin-left: 0; max-width: 600px; }

/* Buttons */
.btn { display: inline-flex; align-items: center; justify-content: center; gap: 8px; padding: 14px 28px; border-radius: 12px; font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 600; font-size: 15px; border: 1px solid var(--br); transition: .25s ease; cursor: pointer; text-decoration: none; }
.btn.p { background: linear-gradient(135deg, #876039 0%, #a87646 100%); color: #fff; box-shadow: 0 4px 16px rgba(135,96,57,0.28); }
.btn.p:hover { transform: translateY(-2px); background: linear-gradient(135deg, #6f4e2d 0%, #876039 100%); box-shadow: 0 8px 24px rgba(135,96,57,0.38); }
.btn.o { color: var(--br); background: transparent; }
.btn.o:hover { background: var(--bg2); transform: translateY(-2px); }

/* SVG Icons */
.icon-svg { width: 24px; height: 24px; stroke: currentColor; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; display: inline-block; vertical-align: middle; flex-shrink: 0; }

/* 3. HERO */
.hero { padding: 64px 0 54px; position: relative; }
.hero-grid { display: grid; grid-template-columns: 1.15fr 0.85fr; gap: 48px; align-items: center; }
.hero-content { text-align: left; }
.hero-content h1 { text-align: left; font-size: clamp(32px, 3.8vw, 48px); line-height: 1.18; margin-top: 14px; margin-bottom: 0; font-family: 'Outfit', sans-serif; font-weight: 700; color: var(--ink); }
.hero-content p { text-align: left; margin: 18px 0 28px; font-size: 16.5px; line-height: 1.6; color: var(--muted); }
.hero-btns { display: flex; gap: 14px; justify-content: flex-start; margin-top: 0; flex-wrap: wrap; }
.hero-trust { display: flex; flex-wrap: wrap; gap: 12px; margin-top: 32px; padding-top: 24px; border-top: 1px solid rgba(135, 96, 57, 0.15); }
.trust-item { display: inline-flex; align-items: center; gap: 8px; font-size: 13.5px; font-weight: 600; color: #4A3E36; background: rgba(255, 255, 255, 0.8); padding: 7px 14px; border-radius: 999px; border: 1px solid rgba(135, 96, 57, 0.14); }

.hero-visual { position: relative; display: flex; justify-content: center; }
.hero-img-card { position: relative; width: 100%; max-width: 480px; border-radius: 24px; box-shadow: 0 24px 50px -12px rgba(135, 96, 57, 0.22), 0 0 0 1px rgba(135, 96, 57, 0.12); background: #fff; }
.hero-img-card img { width: 100%; height: 380px; object-fit: cover; border-radius: 24px; display: block; }
.hero-badge { position: absolute; background: rgba(255, 255, 255, 0.96); backdrop-filter: blur(12px); padding: 10px 16px; border-radius: 14px; box-shadow: 0 12px 28px rgba(33, 22, 15, 0.12); border: 1px solid rgba(135, 96, 57, 0.15); display: flex; align-items: center; gap: 12px; z-index: 2; }
.badge-top { top: 20px; left: -20px; }
.badge-bottom { bottom: 20px; right: -16px; }
.badge-dot { width: 10px; height: 10px; border-radius: 50%; background: #10B981; box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.25); }
.badge-icon { width: 34px; height: 34px; border-radius: 10px; background: rgba(135, 96, 57, 0.1); color: var(--br); display: flex; align-items: center; justify-content: center; flex-shrink: 0; }

/* 4 & 5. MAIN CONTACT & FORM */
.contact-wrap { max-width: 900px; margin: 0 auto; }
.c-form-box { background: #fff; border: 1px solid var(--line); border-radius: 24px; padding: 48px; box-shadow: var(--shadow-lg); width: 100%; }
.c-form-box h2 { font-size: 28px; margin-bottom: 8px; }
.c-form-box p { font-size: 15px; }

.fm-grp { margin-bottom: 20px; }
.fm-grp label { display: block; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 14px; font-weight: 600; color: var(--ink); margin-bottom: 8px; }
.fm-grp label span { color: #EF4444; }
.fm-grp input, .fm-grp select, .fm-grp textarea { width: 100%; padding: 14px 16px; border: 1px solid var(--line); border-radius: 12px; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 15px; color: var(--ink); background: var(--bg); transition: .2s; }
.fm-grp input:focus, .fm-grp select:focus, .fm-grp textarea:focus { outline: none; border-color: var(--br); box-shadow: 0 0 0 4px rgba(135,96,57,0.1); }
.fm-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }

.chk-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 14px; }
.chk-item { display: flex; align-items: center; gap: 10px; font-size: 14.5px; color: var(--ink); cursor: pointer; user-select: none; }
.chk-item input[type="checkbox"] {
    appearance: none;
    -webkit-appearance: none;
    width: 20px;
    height: 20px;
    border-radius: 6px;
    border: 1.5px solid rgba(135, 96, 57, 0.35);
    background-color: #fff;
    cursor: pointer;
    margin: 0;
    flex-shrink: 0;
    transition: all .2s ease;
    color: var(--br) !important;
    accent-color: var(--br) !important;
}
.chk-item input[type="checkbox"]:hover {
    border-color: var(--br);
}
.chk-item input[type="checkbox"]:checked {
    background-color: var(--br) !important;
    border-color: var(--br) !important;
    background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3cpath d='M12.207 4.793a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0l-2-2a1 1 0 011.414-1.414L6.5 9.086l4.293-4.293a1 1 0 011.414 0z'/%3e%3c/svg%3e") !important;
    background-size: 100% 100%;
    background-position: center;
    background-repeat: no-repeat;
}
.chk-item input[type="checkbox"]:focus {
    outline: none !important;
    border-color: var(--br) !important;
    box-shadow: 0 0 0 3px rgba(135, 96, 57, 0.2) !important;
}

.fm-submit { width: 100%; margin-top: 12px; }
.fm-note { font-size: 13px; color: var(--mute); text-align: center; margin-top: 16px; }

/* Form States */
.alert-success { background: #d1fae5; color: #065f46; padding: 16px; border-radius: 12px; margin-bottom: 24px; font-weight: 600; font-size: 15px; border: 1px solid #10B981; }
.alert-error { background: #fee2e2; color: #991b1b; padding: 16px; border-radius: 12px; margin-bottom: 24px; font-size: 14px; border: 1px solid #EF4444; }
.alert-error ul { margin-top: 8px; padding-left: 20px; list-style: disc; }

/* 6. BOOK A DEMO SECTION */
.demo-wrap { display: grid; grid-template-columns: 1.2fr 1fr; gap: 60px; align-items: center; }
.demo-img-box { position: relative; }
.demo-img-box img { width: 100%; border-radius: 24px; border: 1px solid var(--line); box-shadow: var(--shadow-lg); }
.demo-feat { display: flex; gap: 16px; margin-bottom: 24px; }
.demo-feat .ic { width: 32px; height: 32px; border-radius: 8px; background: var(--bg2); color: var(--br); display: grid; place-items: center; flex-shrink: 0; }
.demo-feat h4 { font-size: 16px; margin-bottom: 4px; }
.demo-feat p { font-size: 14px; }

/* 7. WHY TALK TO US */
.why-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 24px; }
.why-card { background: #fff; border: 1px solid var(--line); border-radius: 20px; padding: 24px; text-align: center; }
.why-card .ic { width: 48px; height: 48px; background: var(--bg2); border-radius: 12px; color: var(--br); display: grid; place-items: center; margin: 0 auto 16px; }
.why-card h4 { font-size: 16px; margin-bottom: 8px; }
.why-card p { font-size: 14px; }

/* 8. BUSINESS TYPES */
.ind-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }
.ind-card { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 24px; transition: .2s; }
.ind-card:hover { border-color: var(--br); box-shadow: var(--shadow-md); transform: translateY(-2px); }
.ind-card .ind-ic { width: 48px; height: 48px; border-radius: 12px; background: var(--bg2); color: var(--br); display: grid; place-items: center; margin-bottom: 16px; }
.ind-card .ind-ic svg { width: 24px; height: 24px; stroke: currentColor; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
.ind-card h4 { font-size: 18px; margin-bottom: 8px; }
.ind-card p { font-size: 14px; margin-bottom: 16px; min-height: 44px; }
.ind-link { font-size: 13px; font-weight: 500; color: var(--br); }

/* 9. CONTACT INFORMATION CARDS - REDESIGNED */
.touch-grid { max-width: 860px; margin: 0 auto; display: grid; grid-template-columns: repeat(2, 1fr); gap: 28px; }
.touch-card {
    background: #ffffff;
    border: 1.5px solid rgba(135, 96, 57, 0.16);
    border-radius: 20px;
    padding: 32px 28px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    box-shadow: 0 8px 24px rgba(33, 22, 15, 0.04);
    transition: all .25s ease;
    position: relative;
    overflow: hidden;
}
.touch-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #876039, #c18a55);
    opacity: 0;
    transition: opacity .25s ease;
}
.touch-card:hover {
    transform: translateY(-4px);
    border-color: rgba(135, 96, 57, 0.4);
    box-shadow: 0 18px 40px rgba(135, 96, 57, 0.12);
}
.touch-card:hover::before {
    opacity: 1;
}
.touch-top {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 20px;
}
.touch-ic {
    width: 52px;
    height: 52px;
    border-radius: 14px;
    background: linear-gradient(135deg, #FAF4ED 0%, #F4EAE0 100%);
    border: 1px solid rgba(135, 96, 57, 0.2);
    color: #876039;
    display: grid;
    place-items: center;
    flex-shrink: 0;
}
.touch-badge {
    font-size: 11px;
    font-weight: 700;
    letter-spacing: .08em;
    text-transform: uppercase;
    color: #876039;
    background: rgba(135, 96, 57, 0.08);
    padding: 5px 12px;
    border-radius: 99px;
}
.touch-title {
    font-size: 13px;
    font-weight: 600;
    color: #6E6157;
    text-transform: uppercase;
    letter-spacing: .06em;
    margin-bottom: 6px;
}
.touch-val {
    font-size: 22px;
    font-weight: 700;
    color: #21160F;
    font-family: 'Outfit', sans-serif;
    margin-bottom: 10px;
    line-height: 1.25;
    word-break: break-all;
}
.touch-val a {
    color: #21160F;
    transition: color .2s;
}
.touch-val a:hover {
    color: #876039;
}
.touch-desc {
    font-size: 14px;
    color: #6E6157;
    line-height: 1.55;
    margin-bottom: 24px;
}
.touch-actions {
    display: flex;
    gap: 10px;
    margin-top: auto;
}
.touch-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 10px 18px;
    border-radius: 10px;
    font-size: 14px;
    font-weight: 600;
    text-decoration: none;
    transition: .2s ease;
    flex: 1;
    text-align: center;
}
.touch-btn.primary {
    background: linear-gradient(135deg, #876039 0%, #a87646 100%);
    color: #ffffff;
    box-shadow: 0 4px 12px rgba(135, 96, 57, 0.2);
}
.touch-btn.primary:hover {
    background: linear-gradient(135deg, #6f4e2d 0%, #876039 100%);
    transform: translateY(-1px);
}
.touch-btn.secondary {
    background: #FAF7F2;
    color: #876039;
    border: 1px solid rgba(135, 96, 57, 0.22);
}
.touch-btn.secondary:hover {
    background: #f4eee6;
    border-color: #876039;
}

/* 10. OFFICE LOCATION */
.office-wrap { display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center; }
.map-box { height: 400px; border-radius: 24px; overflow: hidden; border: 1px solid var(--line); background: var(--bg2); }

/* 12. FAQ */
.faq-list { max-width: 840px; margin: auto; display: flex; flex-direction: column; gap: 16px; }
.faq-item { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 20px 24px; cursor: pointer; transition: .2s; }
.faq-item summary { font-weight: 700; font-size: 16px; display: flex; justify-content: space-between; align-items: center; list-style: none; }
.faq-item summary::-webkit-details-marker { display: none; }
.faq-item p { margin-top: 12px; font-size: 15px; color: var(--mute); line-height: 1.6; }

/* 13. FINAL CTA */
.cta-sec { padding: 90px 0; background: linear-gradient(135deg, #FAF4ED 0%, #EFE4D6 50%, #FAF4ED 100%); color: #21160F; text-align: center; position: relative; overflow: hidden; border-top: 1px solid rgba(135, 96, 57, 0.16); }
.cta-box { position: relative; z-index: 2; max-width: 760px; margin: auto; }
.cta-box h2 { color: #21160F; margin-bottom: 16px; }
.cta-box p { color: #6E6157; font-size: 16.5px; line-height: 1.6; }

/* Responsive */
@media (max-width: 1024px) {
  .hero-grid { grid-template-columns: 1fr; gap: 40px; }
  .hero-content { text-align: center; }
  .hero-content h1, .hero-content p { text-align: center; }
  .hero-btns { justify-content: center; }
  .hero-trust { justify-content: center; }
  .badge-top { left: 12px; top: 12px; }
  .badge-bottom { right: 12px; bottom: 12px; }
  .demo-wrap, .office-wrap { grid-template-columns: 1fr; gap: 36px; }
  .why-grid, .ind-grid, .touch-grid { grid-template-columns: repeat(2, 1fr); }
}

@media (max-width: 640px) {
  .w { padding: 0 16px; }
  .hero { padding: 40px 0 30px; }
  .hero-img-card img { height: 260px; }
  .hero-badge { position: static; margin: 10px 0; width: fit-content; }
  .hero-visual { flex-direction: column; align-items: center; }
  .fm-grid, .chk-grid { grid-template-columns: 1fr; }
  .why-grid, .ind-grid, .touch-grid { grid-template-columns: 1fr; }
  .touch-actions { flex-direction: column; }
  .hero-btns { flex-direction: column; }
  .hero-btns .btn { width: 100%; }
  .c-form-box { padding: 24px 18px; border-radius: 16px; }
  .map-box { height: 260px; }
  .faq-item { padding: 16px; }
  .faq-item summary { font-size: 14.5px; }
}
</style>

{{-- 3. HERO --}}
<section class="hero alt">
    <div class="w">
        <div class="hero-grid">
            <div class="hero-content">
                <div class="eb">Contact Geni Menu</div>
                <h1>Let’s Build a <span style="color: var(--br);">Smarter Restaurant</span> Business.</h1>
                <p>Have questions about Geni Menu, pricing, features or the right solution for your business? Talk to our team and discover how Geni Menu can help you manage your restaurant operations more efficiently.</p>
                <div class="hero-btns">
                    <a href="https://wa.me/918667205661?text=Hi%2C%20I%20would%20like%20to%20book%20a%20demo%20for%20Geni%20Menu." target="_blank" rel="noopener" class="btn p">Book a Demo &rarr;</a>
                    <a href="#form" class="btn o" style="background:#fff;">Talk to Sales &darr;</a>
                </div>
                
                <div class="hero-trust">
                    <div class="trust-item">
                        <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" style="color:var(--br);"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>
                        <span>15-Min Live Demo</span>
                    </div>
                    <div class="trust-item">
                        <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" style="color:var(--br);"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                        <span>Direct Call & WhatsApp</span>
                    </div>
                    <div class="trust-item">
                        <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" style="color:var(--br);"><path d="M3 21h18M3 7v14M21 7v14M9 3h6v4H9zM9 11h2M9 15h2M13 11h2M13 15h2"/></svg>
                        <span>Single & Multi-Outlet</span>
                    </div>
                </div>
            </div>

            <div class="hero-visual">
                <div class="hero-img-card">
                    <img src="https://images.unsplash.com/photo-1525182008055-f88b95ff7980?auto=format&fit=crop&w=1000&q=80" alt="Contact Geni Menu Support & Sales Team">
                    
                    <div class="hero-badge badge-top">
                        <span class="badge-dot"></span>
                        <div>
                            <strong style="display:block; font-size:13.5px; color:#21160F; font-family:'Outfit', sans-serif;">Support & Sales Active</strong>
                            <small style="color:#64748B; font-size:11px;">Direct Team Assistance</small>
                        </div>
                    </div>

                    <div class="hero-badge badge-bottom">
                        <div class="badge-icon">
                            <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                        </div>
                        <div>
                            <small style="color: #64748B; font-size: 11px; font-weight: 500; display: block;">Quick Call</small>
                            <a href="tel:+918667205661" style="color: #21160F; font-weight: 700; font-size: 14.5px; text-decoration: none;">+91 86672 05661</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- 4 & 5. MAIN CONTACT & FORM --}}
<section id="form">
    <div class="w contact-wrap">
        <div class="hd" style="text-align: center; margin-bottom: 36px;">
            <h2 style="font-size: clamp(28px, 3.5vw, 40px); margin-bottom: 12px;">We’re Here to Help</h2>
            <p style="font-size: 16px; max-width: 680px; margin: 0 auto; color: var(--muted); line-height: 1.6;">Whether you are starting a new restaurant, managing an existing outlet or growing into multiple branches, our team can help you find the right Geni Menu setup.</p>
        </div>

        <div class="c-form-box">

            @if (session('success'))
                <div class="alert-success">
                    <h2>Thanks for Reaching Out.</h2>
                    <div style="font-weight:400; margin-top:8px;">Your enquiry has been received. Our team will get in touch with you soon.</div>
                    <a href="{{ url('/') }}" style="color:#065f46; font-weight: 500; display:inline-block; margin-top:16px;">Back to Geni Menu →</a>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert-error">
                    <strong>Please fix the following errors:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('contact.submit') }}" method="POST">
                @csrf
                
                {{-- Anti-Spam Honeypots & Time-trap --}}
                <div style="display:none !important; visibility:hidden !important; position:absolute; left:-9999px;">
                    <input type="text" name="last_name_check" value="" autocomplete="off" tabindex="-1">
                    <input type="text" name="middle_name_check" value="" autocomplete="off" tabindex="-1">
                    <input type="text" name="website_hp" value="" autocomplete="off" tabindex="-1">
                    <input type="hidden" name="_form_time" value="{{ \App\Services\AntiSpamService::generateTimeToken() }}">
                </div>
                
                <div class="fm-grp">
                    <label>Full Name <span>*</span></label>
                    <input type="text" name="name" value="{{ old('name') }}" required placeholder="Enter your name">
                </div>

                <div class="fm-grid">
                    <div class="fm-grp">
                        <label>Business Name <span>*</span></label>
                        <input type="text" name="company" value="{{ old('company') }}" required placeholder="Enter your restaurant / business name">
                    </div>
                    <div class="fm-grp">
                        <label>Mobile Number <span>*</span></label>
                        <input type="tel" name="phone" value="{{ old('phone') }}" required placeholder="Enter your phone number">
                    </div>
                </div>

                <div class="fm-grp">
                    <label>Email Address <span>*</span></label>
                    <input type="email" name="email" value="{{ old('email') }}" required placeholder="Enter your email address">
                </div>

                <div class="fm-grid">
                    <div class="fm-grp">
                        <label>Business Type <span>*</span></label>
                        <select name="subject" required>
                            <option value="">Select your business type</option>
                            <option value="Restaurant">Restaurant</option>
                            <option value="Dine-in Restaurant">Dine-in Restaurant</option>
                            <option value="Multi-Cuisine Restaurant">Multi-Cuisine Restaurant</option>
                            <option value="QSR">QSR</option>
                            <option value="Takeaway Restaurant">Takeaway Restaurant</option>
                            <option value="Bakery / Cake Shop">Bakery / Cake Shop</option>
                            <option value="Sweet Shop">Sweet Shop</option>
                            <option value="Juice Shop">Juice Shop</option>
                            <option value="Ice Cream Shop">Ice Cream Shop</option>
                            <option value="Chaat Shop">Chaat Shop</option>
                            <option value="Tea Shop">Tea Shop</option>
                            <option value="Bar / Brewery">Bar / Brewery</option>
                            <option value="Pizzeria">Pizzeria</option>
                            <option value="Café">Café</option>
                            <option value="College Canteen">College Canteen</option>
                            <option value="Office Canteen">Office Canteen</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="fm-grp">
                        <label>Number of Outlets</label>
                        <select name="designation">
                            <option value="1 Outlet">1 Outlet</option>
                            <option value="2-5 Outlets">2–5 Outlets</option>
                            <option value="6-10 Outlets">6–10 Outlets</option>
                            <option value="10+ Outlets">10+ Outlets</option>
                        </select>
                    </div>
                </div>

                <div class="fm-grp" style="margin-bottom:24px;">
                    <label>What Are You Looking For?</label>
                    <div class="chk-grid">
                        <label class="chk-item"><input type="checkbox" name="requirements[]" value="Digital Menu"> Digital Menu</label>
                        <label class="chk-item"><input type="checkbox" name="requirements[]" value="POS & Billing"> POS & Billing</label>
                        <label class="chk-item"><input type="checkbox" name="requirements[]" value="Order Management"> Order Management</label>
                        <label class="chk-item"><input type="checkbox" name="requirements[]" value="Kitchen / KOT"> Kitchen / KOT</label>
                        <label class="chk-item"><input type="checkbox" name="requirements[]" value="Table Management"> Table Management</label>
                        <label class="chk-item"><input type="checkbox" name="requirements[]" value="Inventory"> Inventory</label>
                        <label class="chk-item"><input type="checkbox" name="requirements[]" value="Reports"> Reports</label>
                        <label class="chk-item"><input type="checkbox" name="requirements[]" value="Multi-Branch Management"> Multi-Branch Management</label>
                        <label class="chk-item" style="grid-column:1/-1;"><input type="checkbox" name="requirements[]" value="Complete Restaurant Management"> Complete Restaurant Management</label>
                    </div>
                </div>

                <div class="fm-grp">
                    <label>Message</label>
                    <textarea name="message" rows="3" placeholder="Tell us a little about your requirements...">{{ old('message') }}</textarea>
                </div>

                <button type="submit" class="btn p fm-submit">Send Enquiry →</button>
                <div class="fm-note">Our team will review your enquiry and get in touch with you.</div>
            </form>
        </div>
    </div>
</section>

{{-- 6. BOOK A DEMO SECTION --}}
<section class="alt" id="demo">
    <div class="w demo-wrap">
        <div>
            <div class="eb">See Geni Menu in Action</div>
            <h2 style="margin-bottom:16px;">See How Geni Menu Fits Your Business.</h2>
            <p style="margin-bottom:40px;">A quick product walkthrough can help you understand how Geni Menu can fit into your everyday restaurant operations.</p>
            
            <div class="demo-feat">
                <div class="ic"><svg viewBox="0 0 24 24" class="icon-svg"><polygon points="5 3 19 12 5 21 5 3"/></svg></div>
                <div>
                    <h4>Explore the Platform</h4>
                    <p>See the key Geni Menu modules.</p>
                </div>
            </div>
            <div class="demo-feat">
                <div class="ic"><svg viewBox="0 0 24 24" class="icon-svg"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg></div>
                <div>
                    <h4>Understand Your Workflow</h4>
                    <p>See how different operations connect.</p>
                </div>
            </div>
            <div class="demo-feat">
                <div class="ic"><svg viewBox="0 0 24 24" class="icon-svg"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><line x1="3" y1="9" x2="21" y2="9"/><line x1="9" y1="21" x2="9" y2="9"/></svg></div>
                <div>
                    <h4>Explore Plans</h4>
                    <p>Understand Standard, Premium and Enterprise options.</p>
                </div>
            </div>
            <div class="demo-feat">
                <div class="ic"><svg viewBox="0 0 24 24" class="icon-svg"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg></div>
                <div>
                    <h4>Ask Your Questions</h4>
                    <p>Discuss your specific business requirements with the team.</p>
                </div>
            </div>
            
            <div style="margin-top:40px;">
                <a href="https://wa.me/918667205661?text=Hi%2C%20I%20would%20like%20to%20book%20a%20demo%20for%20Geni%20Menu." target="_blank" rel="noopener" class="btn p">Book a Demo →</a>
            </div>
        </div>

        <div class="demo-img-box">
            <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?auto=format&fit=crop&w=800&q=80" alt="Geni Menu Walkthrough Demo">
        </div>
    </div>
</section>

{{-- 7. WHY TALK TO US / CONSULTATION CTA --}}
<section>
    <div class="w" style="text-align: center;">
        <div class="hd" style="margin-bottom: 28px;">
            <h2>Not Sure Which Geni Menu Setup You Need?</h2>
            <p>Tell us about your business and we can help you understand the available solution and features.</p>
        </div>

        <div style="display: flex; justify-content: center; gap: 16px; flex-wrap: wrap;">
            <a href="https://wa.me/918667205661?text=Hi%2C%20I%20am%20not%20sure%20which%20Geni%20Menu%20setup%20I%20need.%20Can%20you%20help%20me%3F" target="_blank" rel="noopener" class="btn p" style="display: inline-flex; align-items: center; gap: 10px;">
                <svg style="width: 20px; height: 20px; fill: currentColor;" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                Chat on WhatsApp →
            </a>
        </div>
    </div>
</section>

{{-- 9. CONTACT INFORMATION --}}
<section class="alt">
    <div class="w">
        <div class="hd" style="margin-bottom: 44px;">
            <h2>Get in Touch</h2>
            <p>Connect with our team directly for product queries, demos or corporate partnerships.</p>
        </div>

        <div class="touch-grid">
            <div class="touch-card">
                <div>
                    <div class="touch-top">
                        <div class="touch-ic">
                            <svg viewBox="0 0 24 24" class="icon-svg" style="width:22px; height:22px;"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                        </div>
                        <span class="touch-badge">Sales & Enquiries</span>
                    </div>
                    <div class="touch-title">Phone & WhatsApp</div>
                    <div class="touch-val">
                        <a href="tel:+918667205661">+91 86672 05661</a>
                    </div>
                    <p class="touch-desc">Speak directly with our solutions team to discuss features, pricing, or to schedule a live product demo.</p>
                </div>
                <div class="touch-actions">
                    <a href="tel:+918667205661" class="touch-btn primary">
                        <svg viewBox="0 0 24 24" style="width:16px; height:16px;" class="icon-svg"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                        Call Now
                    </a>
                    <a href="https://wa.me/918667205661?text=Hi%2C%20I%20would%20like%20to%20connect%20regarding%20Geni%20Menu." target="_blank" rel="noopener" class="touch-btn secondary">
                        <svg style="width:16px; height:16px; fill:currentColor;" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                        WhatsApp
                    </a>
                </div>
            </div>

            <div class="touch-card">
                <div>
                    <div class="touch-top">
                        <div class="touch-ic">
                            <svg viewBox="0 0 24 24" class="icon-svg" style="width:22px; height:22px;"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                        </div>
                        <span class="touch-badge">Business Enquiries</span>
                    </div>
                    <div class="touch-title">Email Correspondence</div>
                    <div class="touch-val">
                        <a href="mailto:business@wegeni.com">business@wegeni.com</a>
                    </div>
                    <p class="touch-desc">For strategic collaborations, franchise enquiries, partner integrations, or general corporate discussions.</p>
                </div>
                <div class="touch-actions">
                    <a href="mailto:business@wegeni.com" class="touch-btn primary" style="width: 100%;">
                        <svg viewBox="0 0 24 24" style="width:16px; height:16px;" class="icon-svg"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                        Send Email →
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- 10. OFFICE LOCATION --}}
<section class="alt">
    <div class="w office-wrap">
        <div>
            <h2 style="margin-bottom:16px;">Visit Our Office</h2>
            <p style="margin-bottom:32px;">Connect with the WeGeni team for business discussions, product conversations and other enquiries.</p>
            
            <div style="font-size:16px; color:var(--ink); font-weight:600; line-height:1.6; margin-bottom:32px; padding-left:16px; border-left:4px solid var(--br);">
                WeGeni - IT Services & Consulting Pvt. Ltd<br>
                13/9, 2nd Floor, HDFC Bank Upstairs,<br>
                West Car Street, Tiruchengode,<br>
                Namakkal, Tamil Nadu - 637211, India.
            </div>

            <a href="https://maps.app.goo.gl/n4vo5sQQGKr5a3tj8" target="_blank" class="btn p">Get Directions →</a>
        </div>
        
        <div class="map-box">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3914.5!2d77.9029516!3d11.3917385!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba961e00ee90727%3A0x7f1340cb36ef4c5b!2sWeGeni%20-%20IT%20Services%20%26%20Consulting%20(OPC)%20Private%20Limited!5e0!3m2!1sen!2sin!4v1700000000000!5m2!1sen!2sin" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>

{{-- 12. FAQ --}}
<section class="alt">
    <div class="w">
        <div class="hd">
            <h2>Frequently Asked Questions</h2>
        </div>

        <div class="faq-list">
            <details class="faq-item">
                <summary>What is Geni Menu? <svg viewBox="0 0 24 24" class="icon-svg"><path d="M6 9l6 6 6-6"/></svg></summary>
                <p>Geni Menu is a restaurant and food-business management platform that brings menu, orders, billing, kitchen, inventory, customers and reports together.</p>
            </details>
            <details class="faq-item">
                <summary>Can I get a product demo? <svg viewBox="0 0 24 24" class="icon-svg"><path d="M6 9l6 6 6-6"/></svg></summary>
                <p>Yes. You can request a demo to explore Geni Menu and understand how it fits your business.</p>
            </details>
            <details class="faq-item">
                <summary>Which businesses can use Geni Menu? <svg viewBox="0 0 24 24" class="icon-svg"><path d="M6 9l6 6 6-6"/></svg></summary>
                <p>Geni Menu is designed for restaurants, QSRs, cafés, bakeries, sweet shops, juice shops, ice cream shops, tea shops, pizzerias, canteens and other food businesses.</p>
            </details>
            <details class="faq-item">
                <summary>How do I choose the right plan? <svg viewBox="0 0 24 24" class="icon-svg"><path d="M6 9l6 6 6-6"/></svg></summary>
                <p>You can compare Standard, Premium and Enterprise plans based on your business requirements and the features you need.</p>
            </details>
            <details class="faq-item">
                <summary>Can Geni Menu support multiple branches? <svg viewBox="0 0 24 24" class="icon-svg"><path d="M6 9l6 6 6-6"/></svg></summary>
                <p>Multi-branch capabilities are available in applicable plans.</p>
            </details>
            <details class="faq-item">
                <summary>Can I contact the team for pricing? <svg viewBox="0 0 24 24" class="icon-svg"><path d="M6 9l6 6 6-6"/></svg></summary>
                <p>Yes. Contact the sales team to discuss your business requirements and applicable pricing.</p>
            </details>
            <details class="faq-item">
                <summary>How can I get technical support? <svg viewBox="0 0 24 24" class="icon-svg"><path d="M6 9l6 6 6-6"/></svg></summary>
                <p>Existing customers can contact the designated Geni Menu support channel for assistance.</p>
            </details>
        </div>
    </div>
</section>

{{-- 13. FINAL CTA --}}
<section class="cta-sec">
    <div class="cta-box">
        <h2>Your Restaurant. Smarter by Design.</h2>
        <p>Ready to simplify your restaurant operations? Talk to the Geni Menu team and find the right solution for your business.</p>
        <div style="display:flex; gap:16px; justify-content:center; flex-wrap:wrap; margin-top:32px;">
            <a href="https://wa.me/918667205661?text=Hi%2C%20I%20would%20like%20to%20book%20a%20demo%20for%20Geni%20Menu." target="_blank" rel="noopener" class="btn p">Book a Demo →</a>
            <a href="#form" class="btn o" style="background:transparent; border:1.5px solid #876039; color:#876039;">Get Started →</a>
        </div>
    </div>
</section>

@endsection