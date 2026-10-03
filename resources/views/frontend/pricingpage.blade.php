@php
    $meta = [
        'title' => 'Pricing Plans | Geni Menu',
        'description' => 'Compare Geni Menu pricing plans for your food business. Choose from Standard, Premium, or Enterprise plans with monthly and yearly billing options.',
        'keywords' => 'Geni Menu pricing, restaurant software plans, restaurant POS pricing, Geni Menu cost'
    ];
@endphp

@extends('layouts.frontend-master')

@section('content')

{{-- Google Fonts --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@500;600;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Playfair+Display:ital,wght@1,600;1,700&display=swap" rel="stylesheet">
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<style>
:root {
  --br: #876039;
  --br-dark: #6f4e2d;
  --br-light: #fbf7f2;
  --bg: #ffffff;
  --bg2: #f9f6f0;
  --ink: #241A14;
  --mute: #6F665E;
  --line: rgba(135, 96, 57, 0.14);
  --shadow-sm: 0 4px 20px rgba(36, 26, 20, 0.04);
  --shadow-md: 0 16px 40px rgba(36, 26, 20, 0.08);
  --shadow-lg: 0 26px 50px rgba(36, 26, 20, 0.12);
  --green: #10B981;
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
  line-height: 1.15;
  letter-spacing: -0.02em;
  color: var(--ink);
}
h1 { font-size: clamp(32px, 4.8vw, 56px); }
h2 { font-size: clamp(26px, 3.6vw, 44px); }
h3 { font-size: 20px; font-weight: 700; }
p { margin: 0; color: var(--mute); font-size: 16px; line-height: 1.65; }
a { color: inherit; text-decoration: none; }
ul { list-style: none; margin: 0; padding: 0; }

.eb {
  display: inline-flex;
  align-items: center;
  gap: 8px;
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
}

.w { max-width: 1240px; margin: auto; padding: 0 24px; position: relative; z-index: 1; }
section { padding: clamp(48px, 6vw, 84px) 0; background: var(--bg); position: relative; overflow: hidden; }
section.alt { background: var(--bg2); }

.hd { max-width: 760px; margin: 0 auto 40px; text-align: center; }
.hd p { margin-top: 14px; font-size: 17px; }

/* Buttons */
.btn { display: inline-flex; align-items: center; justify-content: center; gap: 8px; padding: 14px 28px; border-radius: 12px; font: 700 15px 'Plus Jakarta Sans', sans-serif; border: 1px solid var(--br); transition: .25s ease; cursor: pointer; text-decoration: none; }
.btn.p { background: linear-gradient(135deg, #876039 0%, #a87646 100%); color: #fff; box-shadow: 0 4px 16px rgba(135,96,57,0.28); }
.btn.p:hover { transform: translateY(-2px); background: linear-gradient(135deg, #6f4e2d 0%, #876039 100%); box-shadow: 0 8px 24px rgba(135,96,57,0.38); }
.btn.o { color: var(--br); background: transparent; }
.btn.o:hover { background: var(--bg2); transform: translateY(-2px); }

/* Billing Toggle */
.billing-toggle { display: inline-flex; align-items: center; justify-content: center; background: #fff; border: 1px solid var(--line); border-radius: 99px; padding: 6px; box-shadow: var(--shadow-sm); margin: 0 auto; gap: 4px; }
.bt-btn { padding: 10px 24px; border-radius: 99px; font-size: 14px; font-weight: 700; color: var(--mute); cursor: pointer; transition: .2s; user-select: none; border: none; background: transparent; }
.bt-btn.act { background: var(--br); color: #fff; box-shadow: 0 4px 12px rgba(135,96,57,0.2); }
.bt-save { font-size: 13px; font-weight: 800; color: var(--green); margin-left: 12px; padding: 4px 12px; background: #d1fae5; border-radius: 99px; display: inline-block; vertical-align: middle; }

/* Main Pricing Cards */
.pricing-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; max-width: 1100px; margin: 0 auto; align-items: start; }
.pr-card { background: #fff; border: 1px solid var(--line); border-radius: 24px; padding: 32px; display: flex; flex-direction: column; transition: .3s; position: relative; box-shadow: var(--shadow-sm); }
.pr-card:hover { border-color: var(--br); box-shadow: var(--shadow-md); transform: translateY(-4px); }
.pr-card.popular { border: 2px solid var(--br); box-shadow: var(--shadow-lg); transform: scale(1.02); }
.pr-card.popular:hover { transform: scale(1.02) translateY(-4px); }
.pr-badge { position: absolute; top: -14px; left: 50%; transform: translateX(-50%); background: var(--br); color: #fff; font-size: 11px; font-weight: 800; padding: 6px 16px; border-radius: 99px; letter-spacing: .05em; box-shadow: 0 4px 10px rgba(135,96,57,0.3); }
.pr-label { font-size: 13px; font-weight: 800; color: var(--mute); text-transform: uppercase; letter-spacing: .1em; margin-bottom: 8px; }
.pr-sub { font-size: 18px; font-weight: 800; color: var(--ink); margin-bottom: 12px; }
.pr-desc { font-size: 14px; color: var(--mute); margin-bottom: 24px; line-height: 1.5; min-height: 42px; }
.pr-price { font-size: 36px; font-weight: 900; color: var(--ink); margin-bottom: 8px; }
.pr-price span { font-size: 14px; font-weight: 600; color: var(--mute); }
.pr-freq { font-size: 13px; color: var(--mute); margin-bottom: 32px; font-weight: 600; }
.pr-custom-price { font-size: 32px; font-weight: 900; color: var(--ink); margin-bottom: 8px; line-height: 1.2; padding-bottom: 18px; }
.pr-features { margin-top: 32px; margin-bottom: 32px; flex: 1; }
.pr-feat-item { display: flex; align-items: flex-start; gap: 12px; margin-bottom: 14px; font-size: 14px; color: var(--ink); }
.pr-feat-icon { flex-shrink: 0; color: var(--br); }

/* Positioning Strip */
.pos-strip { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; margin-top: 60px; max-width: 1100px; margin-left: auto; margin-right: auto; text-align: center; }
.pos-item h4 { font-size: 18px; margin-bottom: 8px; color: var(--ink); }
.pos-item p { font-size: 14px; }

/* Industry Selector */
.ind-tabs { display: flex; gap: 10px; margin-bottom: 36px; flex-wrap: wrap; justify-content: center; }
.ind-tab { padding: 10px 20px; border-radius: 99px; font-weight: 700; font-size: 13.5px; cursor: pointer; border: 1px solid var(--line); background: #fff; color: var(--mute); transition: .2s; }
.ind-tab.act { background: var(--br); color: #fff; border-color: var(--br); box-shadow: 0 4px 12px rgba(135,96,57,0.2); }

/* Compact Cards */
.c-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; }
.c-card { background: #fff; border: 1px solid var(--line); border-radius: 20px; padding: 24px; box-shadow: var(--shadow-sm); }
.c-label { font-size: 12px; font-weight: 800; color: var(--mute); text-transform: uppercase; margin-bottom: 12px; }
.c-price { font-size: 28px; font-weight: 900; color: var(--ink); margin-bottom: 16px; }
.c-price span { font-size: 13px; font-weight: 600; color: var(--mute); }
.c-feat { font-size: 14px; line-height: 1.6; color: var(--ink); }

/* Comparison Table */
.comp-wrapper { overflow-x: auto; -webkit-overflow-scrolling: touch; background: #fff; border-radius: 20px; border: 1px solid var(--line); box-shadow: var(--shadow-md); margin-top: 32px; }
.comp-table { width: 100%; border-collapse: collapse; min-width: 700px; }
.comp-table th { padding: 16px 18px; text-align: center; font-size: 14px; font-weight: 800; border-bottom: 1px solid var(--line); background: #fff; position: sticky; top: 0; z-index: 10; }
.comp-table th:first-child { text-align: left; }
.comp-table td { padding: 14px 18px; text-align: center; border-bottom: 1px solid var(--bg2); font-size: 13.5px; }
.comp-table td:first-child { text-align: left; font-weight: 600; color: var(--ink); }
.comp-group { background: var(--bg2); font-weight: 800; text-transform: uppercase; font-size: 12px; letter-spacing: .05em; color: var(--mute); text-align: left !important; padding: 14px 18px !important; }
.check { color: var(--br); }
.dash { color: #d1d5db; }

/* Visual Stages */
.stage-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; text-align: center; }
.stage-card { padding: 32px 24px; background: #fff; border: 1px solid var(--line); border-radius: 20px; position: relative; }
.stage-card::after { content: '→'; position: absolute; right: -20px; top: 50%; transform: translateY(-50%); font-size: 24px; color: var(--mute); z-index: 2; }
.stage-card:last-child::after { display: none; }
.stage-lbl { font-size: 12px; font-weight: 800; color: var(--br); margin-bottom: 16px; letter-spacing: .1em; }
.stage-card h3 { margin-bottom: 8px; }

/* FAQ */
.faq-list { max-width: 840px; margin: auto; display: flex; flex-direction: column; gap: 16px; }
.faq-item { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 20px 24px; cursor: pointer; transition: .2s; }
.faq-item summary { font-weight: 700; font-size: 16px; display: flex; justify-content: space-between; align-items: center; list-style: none; }
.faq-item summary::-webkit-details-marker { display: none; }
.faq-item p { margin-top: 12px; font-size: 15px; color: var(--mute); line-height: 1.6; }

/* CTA */
.cta-sec { padding: 80px 0; background: #1a1512; color: #fff; text-align: center; position: relative; overflow: hidden; }
.cta-box { position: relative; z-index: 2; max-width: 760px; margin: auto; }
.cta-box h2 { color: #fff; margin-bottom: 16px; }
.cta-box p { color: rgba(255,255,255,0.7); }
.cta-flow { display: flex; justify-content: center; gap: 16px; align-items: center; margin-top: 40px; font-size: 13px; font-weight: 800; letter-spacing: .05em; color: rgba(255,255,255,0.5); flex-wrap: wrap; }
.cta-flow span { color: #b88e56; }

/* Responsive */
@media (max-width: 1024px) {
  .pricing-grid { grid-template-columns: 1fr; max-width: 520px; }
  .pr-card.popular { transform: none; }
  .pr-card.popular:hover { transform: translateY(-4px); }
  .pos-strip { grid-template-columns: 1fr; gap: 20px; }
  .c-grid { grid-template-columns: 1fr; }
  .stage-grid { grid-template-columns: 1fr; }
  .stage-card::after { content: '↓'; right: auto; bottom: -20px; top: auto; left: 50%; transform: translateX(-50%); }
}

@media (max-width: 640px) {
  .w { padding: 0 16px; }
  .pr-card { padding: 24px 18px; border-radius: 18px; }
  .pr-price { font-size: 30px; }
  .billing-toggle { width: 100%; max-width: 320px; }
  .bt-btn { flex: 1; padding: 8px 16px; font-size: 13px; }
  .bt-save { display: block; margin: 8px auto 0; text-align: center; }
  .ind-tabs { gap: 8px; }
  .ind-tab { padding: 8px 14px; font-size: 12.5px; }
  .faq-item { padding: 16px 18px; }
  .faq-item summary { font-size: 15px; }
}
</style>

<div x-data="pricing()">
    
    {{-- 3. HERO SECTION --}}
    <section class="hero" style="padding-top:40px; padding-bottom:30px;">
        <div class="w hd">
            <div class="eb">Geni Menu Pricing</div>
            <h1>Plans That Grow With Your Business</h1>
            <p>Choose the right Geni Menu plan for your business — from essential daily operations to advanced multi-branch management.</p>
            
            <div style="margin-top:30px;">
                <div class="billing-toggle">
                    <button class="bt-btn" :class="billing === 'monthly' ? 'act' : ''" @click="billing = 'monthly'">Monthly</button>
                    <button class="bt-btn" :class="billing === 'yearly' ? 'act' : ''" @click="billing = 'yearly'">Yearly</button>
                </div>
                <div x-show="billing === 'yearly'" class="bt-save" x-transition>Save with yearly billing</div>
            </div>
        </div>
    </section>

    {{-- 4. MAIN PRICING CARDS & 5. POSITIONING STRIP --}}
    <section style="padding-top:0;">
        <div class="w">
            <div class="pricing-grid">
                
                {{-- STANDARD --}}
                <div class="pr-card">
                    <div class="pr-label">STANDARD</div>
                    <div class="pr-sub">Essential Operations</div>
                    <div class="pr-desc">For small restaurants and food businesses that need the essentials to manage daily sales and operations.</div>
                    
                    <div>
                        <div class="pr-price">₹799 <span>/ mo</span></div>
                        <div class="pr-freq">Starting price • Yearly plans available</div>
                    </div>
                    
                    <a href="{{ route('contact.us') }}" class="btn o" style="width:100%;">Get Started →</a>
                    
                    <div class="pr-features">
                        <div style="font-size:13px; font-weight:800; color:var(--ink); margin-bottom:16px;">INCLUDED</div>
                        <div class="pr-feat-item"><svg class="pr-feat-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg>Menu Management</div>
                        <div class="pr-feat-item"><svg class="pr-feat-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg>Menu Categories</div>
                        <div class="pr-feat-item"><svg class="pr-feat-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg>Product Management</div>
                        <div class="pr-feat-item"><svg class="pr-feat-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg>Order Management</div>
                        <div class="pr-feat-item"><svg class="pr-feat-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg>POS / Billing</div>
                        <div class="pr-feat-item"><svg class="pr-feat-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg>Payment Management</div>
                        <div class="pr-feat-item"><svg class="pr-feat-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg>Basic Customer Management</div>
                        <div class="pr-feat-item"><svg class="pr-feat-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg>Basic Reports</div>
                        <div class="pr-feat-item"><svg class="pr-feat-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg>Product Availability</div>
                        <div class="pr-feat-item"><svg class="pr-feat-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg>Basic Settings</div>
                    </div>
                </div>

                {{-- PREMIUM --}}
                <div class="pr-card popular">
                    <div class="pr-badge">MOST POPULAR</div>
                    <div class="pr-label">PREMIUM</div>
                    <div class="pr-sub">Complete Business Management</div>
                    <div class="pr-desc">For growing restaurants and food businesses that need connected kitchen, inventory, customer and operational management.</div>
                    
                    <div>
                        <div class="pr-price">₹1,999 <span>/ mo</span></div>
                        <div class="pr-freq">Starting price • Yearly plans available</div>
                    </div>
                    
                    <a href="{{ route('contact.us') }}" class="btn p" style="width:100%;">Start Premium →</a>
                    
                    <div class="pr-features">
                        <div style="font-size:13px; font-weight:800; color:var(--ink); margin-bottom:16px;">EVERYTHING IN STANDARD, PLUS:</div>
                        <div class="pr-feat-item"><svg class="pr-feat-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg>Kitchen Management</div>
                        <div class="pr-feat-item"><svg class="pr-feat-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg>KOT Management</div>
                        <div class="pr-feat-item"><svg class="pr-feat-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg>Table Management</div>
                        <div class="pr-feat-item"><svg class="pr-feat-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg>Reservation Management</div>
                        <div class="pr-feat-item"><svg class="pr-feat-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg>Customer & Staff Management</div>
                        <div class="pr-feat-item"><svg class="pr-feat-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg>Inventory & Stock Management</div>
                        <div class="pr-feat-item"><svg class="pr-feat-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg>Expense Management</div>
                        <div class="pr-feat-item"><svg class="pr-feat-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg>Advanced & Export Reports</div>
                        <div class="pr-feat-item"><svg class="pr-feat-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg>Payment Gateway Integration</div>
                        <div class="pr-feat-item"><svg class="pr-feat-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg>Waiter Requests</div>
                        <div class="pr-feat-item"><svg class="pr-feat-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg>Delivery Executive Management</div>
                    </div>
                </div>

                {{-- ENTERPRISE --}}
                <div class="pr-card">
                    <div class="pr-label">ENTERPRISE</div>
                    <div class="pr-sub">Advanced & Multi-Branch Operations</div>
                    <div class="pr-desc">For established businesses, restaurant chains and growing businesses managing multiple locations.</div>
                    
                    <div>
                        <div class="pr-custom-price">Custom Pricing</div>
                        <div class="pr-freq" style="margin-bottom:12px;">Built around your business requirements</div>
                    </div>
                    
                    <a href="{{ route('contact.us') }}" class="btn o" style="width:100%;">Talk to Sales →</a>
                    
                    <div class="pr-features">
                        <div style="font-size:13px; font-weight:800; color:var(--ink); margin-bottom:16px;">EVERYTHING IN PREMIUM, PLUS:</div>
                        <div class="pr-feat-item"><svg class="pr-feat-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg>Multi-Branch Management</div>
                        <div class="pr-feat-item"><svg class="pr-feat-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg>Branch-Wise Operations</div>
                        <div class="pr-feat-item"><svg class="pr-feat-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg>Centralized Management</div>
                        <div class="pr-feat-item"><svg class="pr-feat-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg>Advanced Analytics</div>
                        <div class="pr-feat-item"><svg class="pr-feat-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg>Branch-Wise Reports</div>
                        <div class="pr-feat-item"><svg class="pr-feat-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg>Kiosk Management</div>
                        <div class="pr-feat-item"><svg class="pr-feat-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg>Advanced User & Staff Controls</div>
                        <div class="pr-feat-item"><svg class="pr-feat-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg>Theme Customization</div>
                        <div class="pr-feat-item"><svg class="pr-feat-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg>Enterprise Reporting</div>
                        <div class="pr-feat-item"><svg class="pr-feat-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg>Extended Payment Integrations</div>
                        <div class="pr-feat-item"><svg class="pr-feat-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg>Multi-Location Inventory</div>
                        <div class="pr-feat-item"><svg class="pr-feat-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg>Dedicated Business Setup / Support where applicable</div>
                    </div>
                </div>

            </div>

            <div class="pos-strip">
                <div class="pos-item">
                    <h4>Run Your Daily Operations</h4>
                    <p>Essential tools for everyday business management.</p>
                </div>
                <div class="pos-item">
                    <h4>Manage Your Business End-to-End</h4>
                    <p>Connected tools for growing food businesses.</p>
                </div>
                <div class="pos-item">
                    <h4>Scale Across Locations</h4>
                    <p>Advanced controls for multi-branch and larger operations.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- 6 & 7: INDUSTRY-SPECIFIC PRICING --}}
    <section class="alt" id="industry-pricing">
        <div class="w">
            <div class="hd">
                <h2>Choose Your Business Type</h2>
                <p>Plans are tailored to the operational needs of different food and hospitality businesses.</p>
            </div>

            <div class="ind-tabs">
                <template x-for="(data, key) in industries" :key="key">
                    <button class="ind-tab" :class="ind === key ? 'act' : ''" @click="ind = key" x-text="data.name"></button>
                </template>
            </div>

            <div class="c-grid">
                {{-- Standard --}}
                <div class="c-card">
                    <div class="c-label">STANDARD</div>
                    <div class="c-price" x-text="formatPrice(industries[ind].s[billing])"></div>
                    <div class="c-feat" x-html="industries[ind].s.feat"></div>
                </div>
                {{-- Premium --}}
                <div class="c-card" style="border-color:var(--br); box-shadow:var(--shadow-md);">
                    <div class="c-label" style="color:var(--br);">PREMIUM</div>
                    <div class="c-price" x-text="formatPrice(industries[ind].p[billing])"></div>
                    <div class="c-feat" x-html="industries[ind].p.feat"></div>
                </div>
                {{-- Enterprise --}}
                <div class="c-card">
                    <div class="c-label">ENTERPRISE</div>
                    <div class="c-price" x-text="formatPrice(industries[ind].e[billing])"></div>
                    <div class="c-feat" x-html="industries[ind].e.feat"></div>
                </div>
            </div>
        </div>
    </section>

    {{-- 19: FEATURE COMPARISON --}}
    <section>
        <div class="w">
            <div class="hd">
                <h2>Compare Plans & Features</h2>
                <p>See exactly what's included in each plan to find the right fit for your operations.</p>
            </div>

            <div class="comp-wrapper">
                <table class="comp-table">
                    <thead>
                        <tr>
                            <th style="width:40%;">Feature</th>
                            <th style="width:20%;">Standard</th>
                            <th style="width:20%;">Premium</th>
                            <th style="width:20%;">Enterprise</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Menu & Products --}}
                        <tr><td colspan="4" class="comp-group">Menu & Products</td></tr>
                        <tr><td>Menu Management</td><td><span class="check">✓</span></td><td><span class="check">✓</span></td><td><span class="check">✓</span></td></tr>
                        <tr><td>Menu Categories</td><td><span class="check">✓</span></td><td><span class="check">✓</span></td><td><span class="check">✓</span></td></tr>
                        <tr><td>Product Management</td><td><span class="check">✓</span></td><td><span class="check">✓</span></td><td><span class="check">✓</span></td></tr>
                        <tr><td>Product Availability</td><td><span class="check">✓</span></td><td><span class="check">✓</span></td><td><span class="check">✓</span></td></tr>
                        <tr><td>Product Variations</td><td><span class="dash">—</span></td><td><span class="check">✓</span></td><td><span class="check">✓</span></td></tr>

                        {{-- Orders & Service --}}
                        <tr><td colspan="4" class="comp-group">Orders & Service</td></tr>
                        <tr><td>Order Management</td><td><span class="check">✓</span></td><td><span class="check">✓</span></td><td><span class="check">✓</span></td></tr>
                        <tr><td>KOT Management</td><td><span class="dash">—</span></td><td><span class="check">✓</span></td><td><span class="check">✓</span></td></tr>
                        <tr><td>Kitchen Management</td><td><span class="dash">—</span></td><td><span class="check">✓</span></td><td><span class="check">✓</span></td></tr>
                        <tr><td>Waiter Requests</td><td><span class="dash">—</span></td><td><span class="check">✓</span></td><td><span class="check">✓</span></td></tr>
                        <tr><td>Delivery Executive Management</td><td><span class="dash">—</span></td><td><span class="check">✓</span></td><td><span class="check">✓</span></td></tr>

                        {{-- Tables & Reservations --}}
                        <tr><td colspan="4" class="comp-group">Tables & Reservations</td></tr>
                        <tr><td>Table Management</td><td><span class="dash">—</span></td><td><span class="check">✓</span></td><td><span class="check">✓</span></td></tr>
                        <tr><td>Reservation Management</td><td><span class="dash">—</span></td><td><span class="check">✓</span></td><td><span class="check">✓</span></td></tr>
                        <tr><td>Area Management</td><td><span class="dash">—</span></td><td><span class="check">✓</span></td><td><span class="check">✓</span></td></tr>

                        {{-- Customers & Staff --}}
                        <tr><td colspan="4" class="comp-group">Customers & Staff</td></tr>
                        <tr><td>Customer Management</td><td>Basic</td><td><span class="check">✓</span></td><td><span class="check">✓</span></td></tr>
                        <tr><td>Staff Management</td><td><span class="dash">—</span></td><td><span class="check">✓</span></td><td><span class="check">✓</span></td></tr>
                        <tr><td>Customer History</td><td><span class="dash">—</span></td><td><span class="check">✓</span></td><td><span class="check">✓</span></td></tr>

                        {{-- Billing & Payments --}}
                        <tr><td colspan="4" class="comp-group">Billing & Payments</td></tr>
                        <tr><td>POS</td><td><span class="check">✓</span></td><td><span class="check">✓</span></td><td><span class="check">✓</span></td></tr>
                        <tr><td>Billing</td><td><span class="check">✓</span></td><td><span class="check">✓</span></td><td><span class="check">✓</span></td></tr>
                        <tr><td>Payments</td><td><span class="check">✓</span></td><td><span class="check">✓</span></td><td><span class="check">✓</span></td></tr>
                        <tr><td>Payment Gateway</td><td><span class="dash">—</span></td><td>Add-on</td><td><span class="check">✓</span></td></tr>
                        <tr><td>Payment Reports</td><td>Basic</td><td><span class="check">✓</span></td><td><span class="check">✓</span></td></tr>

                        {{-- Inventory --}}
                        <tr><td colspan="4" class="comp-group">Inventory</td></tr>
                        <tr><td>Inventory Management</td><td><span class="dash">—</span></td><td><span class="check">✓</span></td><td><span class="check">✓</span></td></tr>
                        <tr><td>Stock Management</td><td><span class="dash">—</span></td><td><span class="check">✓</span></td><td><span class="check">✓</span></td></tr>
                        <tr><td>Stock Movement</td><td><span class="dash">—</span></td><td><span class="check">✓</span></td><td><span class="check">✓</span></td></tr>
                        <tr><td>Multi-Location Inventory</td><td><span class="dash">—</span></td><td><span class="dash">—</span></td><td><span class="check">✓</span></td></tr>

                        {{-- Business Management --}}
                        <tr><td colspan="4" class="comp-group">Business Management</td></tr>
                        <tr><td>Expense Management</td><td><span class="dash">—</span></td><td><span class="check">✓</span></td><td><span class="check">✓</span></td></tr>
                        <tr><td>Reports</td><td>Basic</td><td>Advanced</td><td>Enterprise</td></tr>
                        <tr><td>Export Reports</td><td><span class="dash">—</span></td><td><span class="check">✓</span></td><td><span class="check">✓</span></td></tr>
                        <tr><td>Advanced Analytics</td><td><span class="dash">—</span></td><td><span class="dash">—</span></td><td><span class="check">✓</span></td></tr>
                        <tr><td>Branch Management</td><td><span class="dash">—</span></td><td><span class="dash">—</span></td><td><span class="check">✓</span></td></tr>

                        {{-- Advanced --}}
                        <tr><td colspan="4" class="comp-group">Advanced</td></tr>
                        <tr><td>Kiosk</td><td><span class="dash">—</span></td><td><span class="dash">—</span></td><td><span class="check">✓</span></td></tr>
                        <tr><td>Multi-Branch</td><td><span class="dash">—</span></td><td><span class="dash">—</span></td><td><span class="check">✓</span></td></tr>
                        <tr><td>Branch-Wise Reports</td><td><span class="dash">—</span></td><td><span class="dash">—</span></td><td><span class="check">✓</span></td></tr>
                        <tr><td>Theme Settings</td><td><span class="dash">—</span></td><td><span class="dash">—</span></td><td><span class="check">✓</span></td></tr>
                        <tr><td>Advanced Settings</td><td><span class="dash">—</span></td><td><span class="dash">—</span></td><td><span class="check">✓</span></td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    {{-- 20: WHY CHOOSE --}}
    <section class="alt">
        <div class="w">
            <div class="hd">
                <h2>A Plan for Every Stage of Growth</h2>
            </div>
            <div class="stage-grid">
                <div class="stage-card">
                    <div class="stage-lbl">STANDARD</div>
                    <h3>Start Simple</h3>
                    <p>Manage the essential operations of your food business.</p>
                </div>
                <div class="stage-card">
                    <div class="stage-lbl" style="color:var(--ink);">PREMIUM</div>
                    <h3>Grow With Confidence</h3>
                    <p>Connect your kitchen, customers, inventory and daily operations.</p>
                </div>
                <div class="stage-card">
                    <div class="stage-lbl" style="color:var(--mute);">ENTERPRISE</div>
                    <h3>Scale Without Complexity</h3>
                    <p>Manage multiple locations, advanced reporting and centralized operations.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- 21: FAQ --}}
    <section>
        <div class="w">
            <div class="hd">
                <h2>Frequently Asked Questions</h2>
            </div>

            <div class="faq-list">
                <details class="faq-item">
                    <summary>Are monthly and yearly plans available? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></summary>
                    <p>Yes. Geni Menu provides both monthly and yearly billing options.</p>
                </details>
                <details class="faq-item">
                    <summary>Can I upgrade my plan later? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></summary>
                    <p>Yes. You can move to a higher plan as your operational requirements grow.</p>
                </details>
                <details class="faq-item">
                    <summary>What is the difference between Standard and Premium? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></summary>
                    <p>Standard focuses on essential daily operations, while Premium adds deeper kitchen, inventory, customer and operational capabilities.</p>
                </details>
                <details class="faq-item">
                    <summary>What is Enterprise designed for? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></summary>
                    <p>Enterprise is designed for businesses that need advanced controls, multi-branch operations and larger-scale management.</p>
                </details>
                <details class="faq-item">
                    <summary>Does every industry have the same pricing? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></summary>
                    <p>No. Pricing varies by business type based on the operational requirements of each solution.</p>
                </details>
                <details class="faq-item">
                    <summary>Is payment gateway included in every plan? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></summary>
                    <p>No. Payment gateway functionality is included in selected Premium or Enterprise configurations depending on the business solution.</p>
                </details>
                <details class="faq-item">
                    <summary>Can I manage multiple branches? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></summary>
                    <p>Multi-branch functionality is available in applicable Enterprise plans.</p>
                </details>
                <details class="faq-item">
                    <summary>Can I manage inventory? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></summary>
                    <p>Inventory capabilities are available in selected Premium and Enterprise plans depending on the industry solution.</p>
                </details>
                <details class="faq-item">
                    <summary>Can I change my plan later? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></summary>
                    <p>Yes. Businesses can upgrade as their needs change.</p>
                </details>
            </div>
        </div>
    </section>

    {{-- 22: FINAL CTA --}}
    <section class="cta-sec">
        <div class="cta-box">
            <h2>Choose the Plan That Fits Your Business.</h2>
            <p>Start with the essentials, unlock more capabilities as your business grows, and scale to advanced multi-branch operations when you need them.</p>
            <div class="cta-flow">
                STANDARD <span>→</span> PREMIUM <span>→</span> ENTERPRISE
            </div>
            <div style="display:flex; gap:16px; justify-content:center; flex-wrap:wrap; margin-top:32px;">
                <a href="{{ route('contact.us') }}" class="btn p">Get Started →</a>
                <a href="{{ route('contact.us') }}" class="btn o" style="background:transparent; border-color:rgba(255,255,255,0.2); color:#fff;">Book a Demo →</a>
            </div>
        </div>
    </section>

</div>

<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('pricing', () => ({
        billing: 'monthly',
        ind: 'restaurant',
        formatPrice(val) {
            return new Intl.NumberFormat('en-IN', { style: 'currency', currency: 'INR', maximumFractionDigits: 0 }).format(val) + (this.billing === 'monthly' ? ' / mo' : ' / yr');
        },
        industries: {
            'restaurant': {
                name: 'Restaurants',
                s: { monthly: 1499, yearly: 14999, feat: 'Core Setup, Orders, KOT, Payments, Basic Reports.' },
                p: { monthly: 2499, yearly: 24999, feat: 'Everything in Standard + Kitchen, Tables, Reservations, Customers, Staff, Inventory.' },
                e: { monthly: 3499, yearly: 34999, feat: 'Everything in Premium + Payment Gateway, Multi-Branch, Expenses, Advanced Reports, Kiosk, Theme.' }
            },
            'dine-in': {
                name: 'Dine-in',
                s: { monthly: 1399, yearly: 13999, feat: 'Menu, Tables, Orders, KOT, Payments, Reports.' },
                p: { monthly: 2299, yearly: 22999, feat: 'Everything in Standard + Kitchen, Reservations, Customers, Staff, Inventory.' },
                e: { monthly: 3299, yearly: 32999, feat: 'Everything in Premium + Multi-Branch, Gateway, Expenses, Kiosk, Export Reports.' }
            },
            'multi-cuisine': {
                name: 'Multi-Cuisine',
                s: { monthly: 1999, yearly: 19999, feat: 'Menu Categories, Orders, KOT, Payments, Reports.' },
                p: { monthly: 2999, yearly: 29999, feat: 'Everything in Standard + Area, Tables, Kitchen, Customers, Inventory.' },
                e: { monthly: 3999, yearly: 39999, feat: 'Everything in Premium + Multi-Branch, Gateway, Expenses, Kiosk, Advanced Analytics.' }
            },
            'qsr': {
                name: 'QSR',
                s: { monthly: 999, yearly: 9999, feat: 'POS Orders, Menu, Payments, Reports.' },
                p: { monthly: 1499, yearly: 14999, feat: 'Everything in Standard + KOT, Kitchen, Customers, Inventory.' },
                e: { monthly: 2499, yearly: 24999, feat: 'Everything in Premium + Online Payment Gateway, Kiosk, Multi-Branch.' }
            },
            'takeaway': {
                name: 'Takeaway',
                s: { monthly: 1299, yearly: 12999, feat: 'Orders, Menu, Payments, Reports.' },
                p: { monthly: 1999, yearly: 19999, feat: 'Everything in Standard + Kitchen, KOT, Customers, Inventory.' },
                e: { monthly: 2999, yearly: 29999, feat: 'Everything in Premium + Gateway, Delivery Executive, Multi-Branch.' }
            },
            'college': {
                name: 'College Canteens',
                s: { monthly: 999, yearly: 9999, feat: 'Menu, Orders, Payments, Reports.' },
                p: { monthly: 1499, yearly: 14999, feat: 'Everything in Standard + Kitchen, KOT, Inventory.' },
                e: { monthly: 2499, yearly: 24999, feat: 'Everything in Premium + Payment Gateway, Expenses, Branch Management.' }
            },
            'office': {
                name: 'Office Canteens',
                s: { monthly: 1499, yearly: 14999, feat: 'Menu, Orders, Payments, Reports.' },
                p: { monthly: 2499, yearly: 24999, feat: 'Everything in Standard + Kitchen, Staff, Inventory.' },
                e: { monthly: 3499, yearly: 34999, feat: 'Everything in Premium + Gateway, Expenses, Multi-Branch.' }
            },
            'sweet': {
                name: 'Sweet Shops',
                s: { monthly: 1299, yearly: 12999, feat: 'Menu, Orders, Payments, Reports.' },
                p: { monthly: 1999, yearly: 19999, feat: 'Everything in Standard + Inventory, Customers, KOT.' },
                e: { monthly: 2999, yearly: 29999, feat: 'Everything in Premium + Gateway, Expenses, Multi-Branch.' }
            },
            'bakery': {
                name: 'Bakeries / Cake Shops',
                s: { monthly: 1299, yearly: 12999, feat: 'Menu, Orders, Payments.' },
                p: { monthly: 1999, yearly: 19999, feat: 'Everything in Standard + Inventory, Customers, Kitchen.' },
                e: { monthly: 2999, yearly: 29999, feat: 'Everything in Premium + Gateway, Expenses, Multi-Branch.' }
            },
            'juice': {
                name: 'Juice / Ice Cream / Chaat / Tea',
                s: { monthly: 799, yearly: 7999, feat: 'POS Orders, Menu, Payments.' },
                p: { monthly: 1299, yearly: 12999, feat: 'Everything in Standard + Inventory, Reports, Customers.' },
                e: { monthly: 1999, yearly: 19999, feat: 'Everything in Premium + Gateway, Kiosk, Multi-Branch.' }
            },
            'bar': {
                name: 'Bars & Breweries',
                s: { monthly: 1999, yearly: 19999, feat: 'Menu, Orders, Payments, Reports.' },
                p: { monthly: 2999, yearly: 29999, feat: 'Everything in Standard + Kitchen, Inventory, Staff.' },
                e: { monthly: 3999, yearly: 39999, feat: 'Everything in Premium + Gateway, Expenses, Multi-Branch.' }
            },
            'pizza': {
                name: 'Pizzerias & Others',
                s: { monthly: 1499, yearly: 14999, feat: 'Menu, Orders, Payments.' },
                p: { monthly: 2499, yearly: 24999, feat: 'Everything in Standard + Kitchen, KOT, Inventory.' },
                e: { monthly: 3499, yearly: 34999, feat: 'Everything in Premium + Gateway, Multi-Branch, Analytics.' }
            }
        }
    }));
});
</script>

@endsection