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
  font-weight: 500;
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
  font-weight: 500;
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
section.hero { overflow: visible; padding-top: 130px !important; }

@media (max-width: 768px) {
  section.hero { padding-top: 110px !important; }
}

.hd { max-width: 760px; margin: 0 auto 40px; text-align: center; }
.hd p { margin-top: 14px; font-size: 17px; }

/* Buttons */
.btn { display: inline-flex; align-items: center; justify-content: center; gap: 8px; padding: 13px 26px; border-radius: 12px; font: 700 15px 'Plus Jakarta Sans', sans-serif; border: 1.5px solid var(--br); transition: all .25s ease; cursor: pointer; text-decoration: none; box-sizing: border-box; }
.btn.p { background: linear-gradient(135deg, #876039 0%, #a87646 100%); color: #fff; box-shadow: 0 4px 16px rgba(135,96,57,0.28); border-color: transparent; }
.btn.p:hover { transform: translateY(-2px); background: linear-gradient(135deg, #6f4e2d 0%, #876039 100%); box-shadow: 0 8px 24px rgba(135,96,57,0.38); }
.btn.o { color: var(--br); background: #ffffff; border-color: rgba(135, 96, 57, 0.35); }
.btn.o:hover { background: #FAF5EF; border-color: var(--br); transform: translateY(-2px); color: var(--br-dark); }

[x-cloak] { display: none !important; }

/* Billing Toggle (Tab Bar) */
.billing-toggle-wrap { display: flex; justify-content: center; align-items: center; margin-top: 32px; }
.billing-toggle { display: inline-flex; align-items: center; background: #f4efe9; border: 1px solid rgba(135, 96, 57, 0.2); border-radius: 999px; padding: 5px; box-shadow: inset 0 2px 4px rgba(36, 26, 20, 0.05); gap: 4px; }
.bt-btn { padding: 9px 24px; border-radius: 999px; font-size: 14px; font-weight: 700; color: var(--mute); cursor: pointer; transition: all 0.25s ease; user-select: none; border: none; background: transparent; display: inline-flex; align-items: center; gap: 8px; font-family: 'Plus Jakarta Sans', sans-serif; }
.bt-btn:hover:not(.act) { color: var(--ink); }
.bt-btn.act { background: var(--br); color: #fff; box-shadow: 0 4px 14px rgba(135, 96, 57, 0.28); }
.bt-badge { font-size: 11px; font-weight: 800; letter-spacing: .02em; padding: 3px 9px; border-radius: 999px; transition: all 0.25s ease; display: inline-flex; align-items: center; }
.bt-btn.act .bt-badge { background: rgba(255, 255, 255, 0.22); color: #ffffff; }
.bt-btn:not(.act) .bt-badge { background: #d1fae5; color: #065f46; }

/* Billing Trust Strip */
.billing-trust-strip { display: flex; align-items: center; justify-content: center; gap: 24px; margin-top: 18px; font-size: 13px; color: var(--mute); font-weight: 600; flex-wrap: wrap; }
.billing-trust-item { display: inline-flex; align-items: center; gap: 6px; }
.billing-trust-item svg { color: var(--br); flex-shrink: 0; }

/* Main Pricing Cards */
.pricing-sec { padding-top: 20px !important; padding-bottom: 50px !important; overflow: visible !important; }
.pricing-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 26px; max-width: 1160px; margin: 24px auto 0; align-items: stretch; position: relative; }
.pr-card { background: #ffffff; border: 1.5px solid rgba(135, 96, 57, 0.16); border-radius: 24px; padding: 36px 30px; display: flex; flex-direction: column; transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1); position: relative; box-shadow: 0 4px 20px rgba(36, 26, 20, 0.04); height: 100%; box-sizing: border-box; }
.pr-card:hover { border-color: var(--br); box-shadow: 0 16px 36px rgba(135, 96, 57, 0.12); transform: translateY(-5px); }
.pr-card.popular { border: 2px solid var(--br); background: linear-gradient(180deg, #FDFBF8 0%, #FFFFFF 220px); box-shadow: 0 16px 42px rgba(135, 96, 57, 0.15); }
.pr-card.popular:hover { box-shadow: 0 24px 52px rgba(135, 96, 57, 0.22); transform: translateY(-6px); }

/* Most Popular Top Bar / Badge */
.pr-badge { position: absolute; top: -15px; left: 50%; transform: translateX(-50%); background: linear-gradient(135deg, #876039 0%, #aa7746 100%); color: #ffffff; font-size: 11.5px; font-weight: 800; text-transform: uppercase; letter-spacing: .08em; padding: 6px 20px; border-radius: 999px; box-shadow: 0 6px 18px rgba(135, 96, 57, 0.35); border: 2.5px solid #ffffff; display: inline-flex; align-items: center; gap: 7px; white-space: nowrap; z-index: 20; }
.pr-badge svg { color: #FDE047; }

.pr-header { margin-bottom: 18px; }
.pr-tier-pill { display: inline-flex; align-items: center; gap: 6px; padding: 4px 12px; border-radius: 999px; font-size: 11px; font-weight: 800; letter-spacing: .08em; text-transform: uppercase; background: rgba(135, 96, 57, 0.08); color: var(--br); margin-bottom: 12px; font-family: 'Outfit', sans-serif; }
.pr-tier-pill.popular-tier-pill { background: rgba(135, 96, 57, 0.15); color: #6f4e2d; }
.pr-sub { font-size: 20px; font-weight: 700; color: var(--ink); margin-bottom: 8px; line-height: 1.25; }
.pr-desc { font-size: 13.5px; color: var(--mute); line-height: 1.55; min-height: 42px; margin-bottom: 0; }

/* Target / Best for Box */
.pr-target-box { display: flex; align-items: flex-start; gap: 8px; background: #fbf9f6; border: 1px solid rgba(135, 96, 57, 0.12); border-radius: 12px; padding: 9px 12px; font-size: 12.5px; line-height: 1.45; color: #4A3E36; margin-top: 14px; margin-bottom: 12px; }
.pr-target-box svg { flex-shrink: 0; color: var(--br); margin-top: 2px; }
.pr-card.popular .pr-target-box { background: #fdf5ec; border-color: rgba(135, 96, 57, 0.22); color: #372b22; }

/* Spec Line */
.pr-spec-line { display: flex; align-items: center; gap: 6px; font-size: 11.5px; font-weight: 700; color: var(--mute); margin-bottom: 16px; flex-wrap: wrap; }
.pr-spec-line span { display: inline-flex; align-items: center; gap: 4px; background: #f5f2ed; padding: 3px 8px; border-radius: 6px; color: #5a4b41; }
.pr-card.popular .pr-spec-line span { background: #f8ecdd; color: #6f4e2d; }

/* Feature Chips */
.pr-chips { display: flex; flex-wrap: wrap; gap: 6px; margin-top: 12px; margin-bottom: 20px; }
.pr-chip { font-size: 11px; font-weight: 700; padding: 3px 10px; border-radius: 999px; background: #f4efe9; color: #5c4e43; }
.pr-chip.p-chip { background: #f5e7d8; color: #6f4e2d; }

.pr-price-box { margin-bottom: 20px; padding-top: 14px; border-top: 1px solid rgba(135, 96, 57, 0.08); }
.pr-price { font-size: 38px; font-weight: 700; color: var(--ink); line-height: 1.1; margin-bottom: 6px; font-family: 'Outfit', sans-serif; }
.pr-price span { font-size: 15px; font-weight: 600; color: var(--mute); }
.pr-custom-price { font-size: 32px; font-weight: 700; color: var(--ink); margin-bottom: 6px; line-height: 1.2; font-family: 'Outfit', sans-serif; }
.pr-freq { font-size: 13px; color: var(--mute); font-weight: 600; min-height: 22px; display: flex; align-items: center; gap: 6px; }
.pr-save-tag { background: #d1fae5; color: #065f46; font-weight: 700; padding: 2px 7px; border-radius: 6px; font-size: 12px; }

.pr-features { margin-top: 24px; padding-top: 22px; border-top: 1px dashed rgba(135, 96, 57, 0.16); flex: 1; }
.pr-feat-title { font-size: 12px; font-weight: 700; color: var(--ink); text-transform: uppercase; letter-spacing: .08em; margin-bottom: 16px; font-family: 'Outfit', sans-serif; }
.pr-feat-item { display: flex; align-items: flex-start; gap: 11px; margin-bottom: 13px; font-size: 13.5px; color: #372b22; line-height: 1.45; }
.pr-feat-icon { flex-shrink: 0; width: 20px; height: 20px; border-radius: 50%; background: rgba(135, 96, 57, 0.1); color: var(--br); display: inline-flex; align-items: center; justify-content: center; margin-top: 1px; }
.pr-card.popular .pr-feat-icon { background: rgba(135, 96, 57, 0.15); color: #6f4e2d; }
.pr-feat-icon svg { width: 12px; height: 12px; }

/* Positioning Strip */
.pos-strip { display: grid; grid-template-columns: repeat(3, 1fr); gap: 26px; margin-top: 50px; max-width: 1140px; margin-left: auto; margin-right: auto; text-align: center; }
.pos-item { padding: 18px 20px; background: rgba(135, 96, 57, 0.03); border: 1px dashed rgba(135, 96, 57, 0.14); border-radius: 16px; }
.pos-item h4 { font-size: 16px; font-weight: 700; margin-bottom: 6px; color: var(--ink); }
.pos-item p { font-size: 13.5px; color: var(--mute); margin: 0; }

/* Industry Selector */
.ind-tabs { display: flex; gap: 10px; margin-bottom: 36px; flex-wrap: wrap; justify-content: center; }
.ind-tab { padding: 10px 22px; border-radius: 999px; font-weight: 700; font-size: 13.5px; cursor: pointer; border: 1px solid var(--line); background: #fff; color: var(--mute); transition: all .2s; }
.ind-tab:hover:not(.act) { border-color: var(--br); color: var(--ink); background: #FAF5EF; }
.ind-tab.act { background: var(--br); color: #fff; border-color: var(--br); box-shadow: 0 4px 14px rgba(135,96,57,0.25); }

/* Compact Cards */
.c-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; }
.c-card { background: #fff; border: 1px solid var(--line); border-radius: 20px; padding: 24px; box-shadow: var(--shadow-sm); }
.c-label { font-size: 12px; font-weight: 500; color: var(--mute); text-transform: uppercase; margin-bottom: 12px; }
.c-price { font-size: 28px; font-weight: 500; color: var(--ink); margin-bottom: 16px; }
.c-price span { font-size: 13px; font-weight: 600; color: var(--mute); }
.c-feat { font-size: 14px; line-height: 1.6; color: var(--ink); }

/* Comparison Table */
.comp-wrapper { overflow-x: auto; -webkit-overflow-scrolling: touch; background: #fff; border-radius: 20px; border: 1px solid var(--line); box-shadow: var(--shadow-md); margin-top: 32px; }
.comp-table { width: 100%; border-collapse: collapse; min-width: 700px; }
.comp-table th { padding: 16px 18px; text-align: center; font-size: 14px; font-weight: 500; border-bottom: 1px solid var(--line); background: #fff; position: sticky; top: 0; z-index: 10; }
.comp-table th:first-child { text-align: left; }
.comp-table td { padding: 14px 18px; text-align: center; border-bottom: 1px solid var(--bg2); font-size: 13.5px; }
.comp-table td:first-child { text-align: left; font-weight: 600; color: var(--ink); }
.comp-group { background: var(--bg2); font-weight: 500; text-transform: uppercase; font-size: 12px; letter-spacing: .05em; color: var(--mute); text-align: left !important; padding: 14px 18px !important; }
.check { color: var(--br); }
.dash { color: #d1d5db; }

/* Visual Stages */
.stage-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; text-align: center; }
.stage-card { padding: 32px 24px; background: #fff; border: 1px solid var(--line); border-radius: 20px; position: relative; }
.stage-card::after { content: '→'; position: absolute; right: -20px; top: 50%; transform: translateY(-50%); font-size: 24px; color: var(--mute); z-index: 2; }
.stage-card:last-child::after { display: none; }
.stage-lbl { font-size: 12px; font-weight: 500; color: var(--br); margin-bottom: 16px; letter-spacing: .1em; }
.stage-card h3 { margin-bottom: 8px; }

/* FAQ */
.faq-list { max-width: 840px; margin: auto; display: flex; flex-direction: column; gap: 16px; }
.faq-item { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 20px 24px; cursor: pointer; transition: .2s; }
.faq-item summary { font-weight: 700; font-size: 16px; display: flex; justify-content: space-between; align-items: center; list-style: none; }
.faq-item summary::-webkit-details-marker { display: none; }
.faq-item p { margin-top: 12px; font-size: 15px; color: var(--mute); line-height: 1.6; }

/* CTA */
.cta-sec { padding: 90px 0; background: linear-gradient(135deg, #FAF4ED 0%, #EFE4D6 50%, #FAF4ED 100%); color: #21160F; text-align: center; position: relative; overflow: hidden; border-top: 1px solid rgba(135, 96, 57, 0.16); }
.cta-box { position: relative; z-index: 2; max-width: 760px; margin: auto; }
.cta-box h2 { color: #21160F; margin-bottom: 16px; }
.cta-box p { color: #6E6157; font-size: 16.5px; line-height: 1.6; }
.cta-flow { display: flex; justify-content: center; gap: 16px; align-items: center; margin-top: 36px; font-size: 13px; font-weight: 600; letter-spacing: .05em; color: #8C7C71; flex-wrap: wrap; }
.cta-flow span { color: #876039; }

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
  .pr-card { padding: 28px 20px; border-radius: 20px; }
  .pr-price { font-size: 32px; }
  .billing-toggle { width: 100%; max-width: 340px; }
  .bt-btn { flex: 1; padding: 8px 14px; font-size: 13px; justify-content: center; gap: 6px; }
  .bt-badge { font-size: 10px; padding: 2px 6px; }
  .ind-tabs { gap: 8px; }
  .ind-tab { padding: 8px 14px; font-size: 12.5px; }
  .faq-item { padding: 16px 18px; }
  .faq-item summary { font-size: 15px; }
}
</style>

<div x-data="pricing()">
    
    {{-- 3. HERO SECTION --}}
    <section class="hero" style="padding-top:130px; padding-bottom:10px; overflow:visible;">
        <div class="w hd">
            <div class="eb">Geni Menu Pricing</div>
            <h1>Plans That Grow With Your Business</h1>
            <p>Choose the right Geni Menu plan for your business — from essential daily operations to advanced multi-branch management.</p>
            
            <div class="billing-toggle-wrap">
                <div class="billing-toggle">
                    <button type="button" class="bt-btn" :class="billing === 'monthly' ? 'act' : ''" @click="billing = 'monthly'">
                        <span>Monthly</span>
                    </button>
                    <button type="button" class="bt-btn" :class="billing === 'yearly' ? 'act' : ''" @click="billing = 'yearly'">
                        <span>Yearly</span>
                        <span class="bt-badge">Save 20%</span>
                    </button>
                </div>
            </div>

            <div class="billing-trust-strip">
                <span class="billing-trust-item"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg> 14-Day Free Trial</span>
                <span class="billing-trust-item"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="20 6 9 17 4 12"/></polyline></svg> No Setup Fees</span>
                <span class="billing-trust-item"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></polyline></svg> Cancel Anytime</span>
            </div>
        </div>
    </section>

    {{-- 4. MAIN PRICING CARDS & 5. POSITIONING STRIP --}}
    <section class="pricing-sec">
        <div class="w">
            <div class="pricing-grid">
                
                {{-- STANDARD --}}
                <div class="pr-card">
                    <div class="pr-header">
                        <span class="pr-tier-pill">Starter Tier</span>
                        <div class="pr-sub">Essential Operations</div>
                        <div class="pr-desc">Core setup to run fast POS counter billing, QR menu, and everyday sales operations smoothly.</div>
                        
                        <div class="pr-target-box">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                            <div><strong>Best for:</strong> Cafes, QSR, Takeaway & Small Outlets</div>
                        </div>

                        <div class="pr-spec-line">
                            <span>⚡ 1 Counter POS</span>
                            <span>👥 Up to 5 Staff</span>
                            <span>🧾 Unlimited Orders</span>
                        </div>

                        <div class="pr-chips">
                            <span class="pr-chip">POS Billing</span>
                            <span class="pr-chip">Digital Menu QR</span>
                            <span class="pr-chip">Sales Reports</span>
                        </div>
                    </div>
                    
                    <div class="pr-price-box">
                        <div class="pr-price" x-show="billing === 'monthly'">₹799 <span>/ mo</span></div>
                        <div class="pr-price" x-show="billing === 'yearly'" x-cloak>₹639 <span>/ mo</span></div>
                        <div class="pr-freq" x-show="billing === 'monthly'">Billed monthly • Cancel anytime</div>
                        <div class="pr-freq" x-show="billing === 'yearly'" x-cloak><span class="pr-save-tag">₹7,668 / yr</span> • Save ₹1,920</div>
                    </div>
                    
                    <a href="{{ route('restaurant_signup', ['plan' => 'standard']) }}" class="btn o" style="width:100%;">Get Started Free &rarr;</a>
                    
                    <div class="pr-features">
                        <div class="pr-feat-title">WHAT'S INCLUDED</div>
                        <div class="pr-feat-item"><span class="pr-feat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6L9 17l-5-5"/></svg></span>Menu Management</div>
                        <div class="pr-feat-item"><span class="pr-feat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6L9 17l-5-5"/></svg></span>Menu Categories</div>
                        <div class="pr-feat-item"><span class="pr-feat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6L9 17l-5-5"/></svg></span>Product Management</div>
                        <div class="pr-feat-item"><span class="pr-feat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6L9 17l-5-5"/></svg></span>Order Management</div>
                        <div class="pr-feat-item"><span class="pr-feat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6L9 17l-5-5"/></svg></span>POS / Billing</div>
                        <div class="pr-feat-item"><span class="pr-feat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6L9 17l-5-5"/></svg></span>Payment Management</div>
                        <div class="pr-feat-item"><span class="pr-feat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6L9 17l-5-5"/></svg></span>Basic Customer Management</div>
                        <div class="pr-feat-item"><span class="pr-feat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6L9 17l-5-5"/></svg></span>Basic Reports</div>
                        <div class="pr-feat-item"><span class="pr-feat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6L9 17l-5-5"/></svg></span>Product Availability</div>
                        <div class="pr-feat-item"><span class="pr-feat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6L9 17l-5-5"/></svg></span>Basic Settings</div>
                    </div>
                </div>

                {{-- PREMIUM --}}
                <div class="pr-card popular">
                    <div class="pr-badge">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l2.4 7.4H22l-6 4.6 2.3 7-6.3-4.6-6.3 4.6 2.3-7-6-4.6h7.6z"/></svg>
                        <span>MOST POPULAR CHOICE</span>
                    </div>
                    <div class="pr-header">
                        <span class="pr-tier-pill popular-tier-pill">Growth & Kitchen Operations</span>
                        <div class="pr-sub">Complete Business Management</div>
                        <div class="pr-desc">End-to-end automation connecting kitchen displays, table layout, live stock inventory, and customer orders.</div>
                        
                        <div class="pr-target-box">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                            <div><strong>Best for:</strong> Dine-in Restaurants, Bars & Busy Cloud Kitchens</div>
                        </div>

                        <div class="pr-spec-line">
                            <span>🍳 Kitchen + Tables</span>
                            <span>👥 Unlimited Staff</span>
                            <span>📦 Live Stock Alerts</span>
                        </div>

                        <div class="pr-chips">
                            <span class="pr-chip p-chip">Live KOT Screen</span>
                            <span class="pr-chip p-chip">Table Layout</span>
                            <span class="pr-chip p-chip">Inventory</span>
                            <span class="pr-chip p-chip">Online Gateway</span>
                        </div>
                    </div>
                    
                    <div class="pr-price-box">
                        <div class="pr-price" x-show="billing === 'monthly'">₹1,999 <span>/ mo</span></div>
                        <div class="pr-price" x-show="billing === 'yearly'" x-cloak>₹1,599 <span>/ mo</span></div>
                        <div class="pr-freq" x-show="billing === 'monthly'">Billed monthly • Cancel anytime</div>
                        <div class="pr-freq" x-show="billing === 'yearly'" x-cloak><span class="pr-save-tag">₹19,188 / yr</span> • Save ₹4,800</div>
                    </div>
                    
                    <a href="{{ route('restaurant_signup', ['plan' => 'premium']) }}" class="btn p" style="width:100%;">Start Premium Free &rarr;</a>
                    
                    <div class="pr-features">
                        <div class="pr-feat-title">EVERYTHING IN STANDARD, PLUS:</div>
                        <div class="pr-feat-item"><span class="pr-feat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6L9 17l-5-5"/></svg></span>Kitchen Management</div>
                        <div class="pr-feat-item"><span class="pr-feat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6L9 17l-5-5"/></svg></span>KOT Management</div>
                        <div class="pr-feat-item"><span class="pr-feat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6L9 17l-5-5"/></svg></span>Table Management</div>
                        <div class="pr-feat-item"><span class="pr-feat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6L9 17l-5-5"/></svg></span>Reservation Management</div>
                        <div class="pr-feat-item"><span class="pr-feat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6L9 17l-5-5"/></svg></span>Customer & Staff Management</div>
                        <div class="pr-feat-item"><span class="pr-feat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6L9 17l-5-5"/></svg></span>Inventory & Stock Management</div>
                        <div class="pr-feat-item"><span class="pr-feat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6L9 17l-5-5"/></svg></span>Expense Management</div>
                        <div class="pr-feat-item"><span class="pr-feat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6L9 17l-5-5"/></svg></span>Advanced & Export Reports</div>
                        <div class="pr-feat-item"><span class="pr-feat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6L9 17l-5-5"/></svg></span>Payment Gateway Integration</div>
                        <div class="pr-feat-item"><span class="pr-feat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6L9 17l-5-5"/></svg></span>Waiter Requests</div>
                        <div class="pr-feat-item"><span class="pr-feat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6L9 17l-5-5"/></svg></span>Delivery Executive Management</div>
                    </div>
                </div>

                {{-- ENTERPRISE --}}
                <div class="pr-card">
                    <div class="pr-header">
                        <span class="pr-tier-pill">Enterprise Tier</span>
                        <div class="pr-sub">Advanced & Multi-Branch Operations</div>
                        <div class="pr-desc">Centralized multi-location control, unified brand reporting, franchise rights, and custom POS workflows.</div>
                        
                        <div class="pr-target-box">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                            <div><strong>Best for:</strong> Restaurant Chains, Franchises & Multi-Outlets</div>
                        </div>

                        <div class="pr-spec-line">
                            <span>🌐 Multi-Branch Sync</span>
                            <span>📱 Self-Order Kiosks</span>
                            <span>🔒 Custom Roles</span>
                        </div>

                        <div class="pr-chips">
                            <span class="pr-chip">Central Menu</span>
                            <span class="pr-chip">Chain Analytics</span>
                            <span class="pr-chip">Dedicated Manager</span>
                        </div>
                    </div>
                    
                    <div class="pr-price-box">
                        <div class="pr-custom-price">Custom Pricing</div>
                        <div class="pr-freq">Tailored to your branch network & hardware</div>
                    </div>
                    
                    <a href="{{ route('contact.us') }}" class="btn o" style="width:100%;">Talk to Sales &rarr;</a>
                    
                    <div class="pr-features">
                        <div class="pr-feat-title">EVERYTHING IN PREMIUM, PLUS:</div>
                        <div class="pr-feat-item"><span class="pr-feat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6L9 17l-5-5"/></svg></span>Multi-Branch Management</div>
                        <div class="pr-feat-item"><span class="pr-feat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6L9 17l-5-5"/></svg></span>Branch-Wise Operations</div>
                        <div class="pr-feat-item"><span class="pr-feat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6L9 17l-5-5"/></svg></span>Centralized Management</div>
                        <div class="pr-feat-item"><span class="pr-feat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6L9 17l-5-5"/></svg></span>Advanced Analytics</div>
                        <div class="pr-feat-item"><span class="pr-feat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6L9 17l-5-5"/></svg></span>Branch-Wise Reports</div>
                        <div class="pr-feat-item"><span class="pr-feat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6L9 17l-5-5"/></svg></span>Kiosk Management</div>
                        <div class="pr-feat-item"><span class="pr-feat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6L9 17l-5-5"/></svg></span>Advanced User & Staff Controls</div>
                        <div class="pr-feat-item"><span class="pr-feat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6L9 17l-5-5"/></svg></span>Theme Customization</div>
                        <div class="pr-feat-item"><span class="pr-feat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6L9 17l-5-5"/></svg></span>Enterprise Reporting</div>
                        <div class="pr-feat-item"><span class="pr-feat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6L9 17l-5-5"/></svg></span>Extended Payment Integrations</div>
                        <div class="pr-feat-item"><span class="pr-feat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6L9 17l-5-5"/></svg></span>Multi-Location Inventory</div>
                        <div class="pr-feat-item"><span class="pr-feat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6L9 17l-5-5"/></svg></span>Dedicated Account Setup & Support</div>
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
                <a href="{{ route('restaurant_signup') }}" class="btn p">Get Started &rarr;</a>
                <a href="{{ route('restaurant_signup') }}" class="btn o" style="background:transparent; border:1.5px solid #876039; color:#876039;">Book a Demo &rarr;</a>
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