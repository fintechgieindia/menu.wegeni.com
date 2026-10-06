@extends('layouts.landing')

@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@1,600;1,700&family=Poppins:wght@400;500;600;700;800;900&display=swap');

    .hero-wrap {
        background: #FAF6F1;
        font-family: 'Poppins', sans-serif;
        position: relative;
        overflow: hidden;
        min-height: 88vh;
        display: flex;
        align-items: center;
    }

    .hero-wrap::before {
        content: '';
        position: absolute;
        inset: 0;
        background:
            radial-gradient(ellipse 60% 70% at 0% 50%, rgba(255,240,220,0.65) 0%, transparent 70%),
            radial-gradient(ellipse 50% 60% at 100% 0%, rgba(240,224,200,0.45) 0%, transparent 60%);
        pointer-events: none;
        z-index: 0;
    }

    .hero-inner {
        max-width: 1320px;
        margin: 0 auto;
        padding: 80px 40px;
        display: grid;
        grid-template-columns: 48% 52%;
        gap: 48px;
        align-items: center;
        position: relative;
        z-index: 1;
        width: 100%;
    }

    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(160,116,75,0.1);
        border: 1px solid rgba(160,116,75,0.25);
        color: #8B5E3C;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        padding: 7px 16px;
        border-radius: 100px;
        margin-bottom: 28px;
    }

    .hero-badge-dot {
        width: 6px; height: 6px;
        background: #A0744B;
        border-radius: 50%;
        animation: pulse-dot 2s ease-in-out infinite;
    }

    @keyframes pulse-dot {
        0%,100%{opacity:1;transform:scale(1);}
        50%{opacity:0.5;transform:scale(0.75);}
    }

    .hero-headline {
        font-size: 56px;
        font-weight: 500;
        color: #1E1810;
        line-height: 1.08;
        letter-spacing: -2px;
        margin: 0 0 4px;
    }

    .hero-headline-italic {
        font-family: 'Playfair Display', serif;
        font-style: italic;
        font-weight: 700;
        font-size: 60px;
        color: #A0744B;
        display: block;
        line-height: 1.1;
        letter-spacing: -1px;
        margin-top: 6px;
    }

    .hero-desc {
        font-size: 16px;
        color: #6B6059;
        line-height: 1.7;
        margin: 26px 0 34px;
        max-width: 430px;
    }

    .hero-cta-row {
        display: flex;
        gap: 14px;
        margin-bottom: 34px;
        flex-wrap: wrap;
        align-items: center;
    }

    .h-btn-fill {
        background: #A0744B;
        color: #fff;
        font-size: 14px;
        font-weight: 700;
        padding: 15px 30px;
        border-radius: 10px;
        text-decoration: none;
        transition: all 0.25s;
        box-shadow: 0 6px 20px rgba(160,116,75,0.35);
        display: inline-block;
    }
    .h-btn-fill:hover {
        background: #8b623d;
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 10px 28px rgba(160,116,75,0.4);
    }

    .h-btn-outline {
        background: transparent;
        color: #A0744B;
        font-size: 14px;
        font-weight: 600;
        padding: 14px 28px;
        border-radius: 10px;
        border: 1.5px solid #A0744B;
        text-decoration: none;
        transition: all 0.25s;
        display: inline-block;
    }
    .h-btn-outline:hover {
        background: rgba(160,116,75,0.07);
        color: #8b623d;
    }

    .h-trust { display: flex; flex-direction: column; gap: 8px; }
    .h-trust-item {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 13px;
        color: #6B6059;
        font-weight: 500;
    }
    .h-trust-item svg { flex-shrink: 0; color: #A0744B; }

    /* RIGHT VISUAL */
    .hero-right {
        position: relative;
        height: 600px;
    }

    .hero-photo-card {
        position: absolute;
        inset: 0;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 32px 70px rgba(0,0,0,0.18);
    }
    .hero-photo-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center top;
    }
    .hero-photo-card::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(30,24,16,0.5) 0%, rgba(20,14,6,0.1) 55%, transparent 100%);
    }

    /* POS Panel */
    .hero-pos-panel {
        position: absolute;
        top: 28px;
        right: 18px;
        width: 252px;
        background: rgba(255,255,255,0.97);
        backdrop-filter: blur(18px);
        -webkit-backdrop-filter: blur(18px);
        border-radius: 18px;
        box-shadow: 0 20px 50px rgba(0,0,0,0.15), 0 0 0 1px rgba(255,255,255,0.5);
        padding: 18px;
        z-index: 20;
        animation: float-up 3.5s ease-in-out infinite alternate;
    }
    @keyframes float-up {
        0%{transform:translateY(0);}
        100%{transform:translateY(-8px);}
    }

    .pos-ph { display:flex;align-items:center;justify-content:space-between;margin-bottom:14px; }
    .pos-ph-title { display:flex;align-items:center;gap:6px;font-size:10.5px;font-weight: 500;color:#A0744B;text-transform:uppercase;letter-spacing:0.8px; }
    .pos-ph-live { font-size:9px;font-weight:700;color:#22c55e;display:flex;align-items:center;gap:4px; }
    .pos-live-dot { width:7px;height:7px;background:#22c55e;border-radius:50%;animation:blink 1.5s ease-in-out infinite; }
    @keyframes blink{0%,100%{opacity:1;}50%{opacity:0.3;}}

    .pos-grid { display:grid;grid-template-columns:repeat(3,1fr);gap:7px;margin-bottom:12px; }
    .pos-ic { background:#F8F4EF;border-radius:9px;padding:9px 7px;text-align:center;border:1.5px solid transparent; }
    .pos-ic.sel { background:#A0744B;border-color:#A0744B; }
    .pos-ic-n { font-size:9.5px;font-weight:700;color:#333;margin-bottom:3px; }
    .pos-ic.sel .pos-ic-n,.pos-ic.sel .pos-ic-p { color:#fff; }
    .pos-ic-p { font-size:9px;color:#888; }
    .pos-ic.sel .pos-ic-p { color:rgba(255,255,255,0.85); }

    .pos-div { border:none;border-top:1px dashed #D9D0C5;margin:10px 0; }
    .pos-bl { display:flex;justify-content:space-between;font-size:10px;color:#666;margin-bottom:5px; }
    .pos-bl.tot { font-weight: 500;font-size:13px;color:#1E1810;padding-top:7px;border-top:1px solid #eee;margin-top:5px; }

    /* Mobile */
    .hero-mobile-frame {
        position: absolute;
        bottom: 24px;
        left: -18px;
        width: 178px;
        background: #1A1A1A;
        border-radius: 32px;
        padding: 9px;
        box-shadow: -12px 24px 55px rgba(0,0,0,0.32);
        z-index: 30;
        animation: float-dn 4s ease-in-out infinite alternate;
    }
    @keyframes float-dn {
        0%{transform:translateY(0) rotate(-2deg);}
        100%{transform:translateY(-10px) rotate(-2deg);}
    }
    .hmob-screen { background:#fff;border-radius:24px;overflow:hidden;display:flex;flex-direction:column;height:348px; }
    .hmob-top { background:#A0744B;padding:12px 13px 9px;color:#fff; }
    .hmob-top-t { font-size:12px;font-weight: 500; }
    .hmob-top-s { font-size:9px;opacity:0.85;margin-top:1px; }
    .hmob-list { flex:1;padding:9px;overflow:hidden; }
    .hmob-item { display:flex;align-items:center;gap:7px;padding:7px;border-radius:9px;margin-bottom:7px;background:#fafafa;border:1px solid #f0f0f0; }
    .hmob-img { width:32px;height:32px;border-radius:7px;object-fit:cover;flex-shrink:0; }
    .hmob-n { font-size:10px;font-weight:700;color:#222; }
    .hmob-p { font-size:9px;color:#888; }
    .hmob-pay { background:#A0744B;margin:0 9px 9px;border-radius:100px;padding:10px 13px;display:flex;justify-content:space-between;align-items:center;color:#fff;font-size:10px;font-weight: 500; }

    /* Notification Badges */
    .h-notif { position:absolute;background:#fff;border-radius:13px;padding:9px 14px;box-shadow:0 8px 28px rgba(0,0,0,0.12);z-index:35;font-family:'Poppins',sans-serif;min-width:155px; }
    .h-notif.nk { top:18px;left:18px;animation:fn1 3s ease-in-out infinite alternate; }
    .h-notif.ns { bottom:28px;right:28px;animation:fn2 3.5s ease-in-out infinite alternate; }
    @keyframes fn1{0%{transform:translateY(0);}100%{transform:translateY(-6px);}}
    @keyframes fn2{0%{transform:translateY(0);}100%{transform:translateY(-8px);}}
    .nh { display:flex;align-items:center;gap:5px;font-size:9px;font-weight:700;color:#A0744B;text-transform:uppercase;letter-spacing:0.5px;margin-bottom:4px; }
    .nt { font-size:12px;font-weight: 500;color:#1E1810; }
    .ns2 { font-size:9.5px;color:#888;margin-top:1px; }

    /* Responsive */
    @media(max-width:1023px){
        .hero-inner{grid-template-columns:1fr;padding:60px 24px;}
        .hero-headline{font-size:40px;}
        .hero-headline-italic{font-size:44px;}
        .hero-right{height:460px;}
    }
    @media(max-width:639px){
        .hero-headline{font-size:32px;}
        .hero-headline-italic{font-size:36px;}
        .hero-right{height:360px;}
        .hero-mobile-frame{display:none;}
        .hero-pos-panel{width:195px;right:8px;}
    }
</style>

<section class="hero-wrap">
    <div class="hero-inner">
        <!-- LEFT -->
        <div>
            <div class="hero-badge">
                <span class="hero-badge-dot"></span>
                RESTAURANT OPERATIONS, SIMPLIFIED
            </div>
            <h1 class="hero-headline">
                Every Part of<br>Your Restaurant.
                <span class="hero-headline-italic">One Smart System.</span>
            </h1>
            <p class="hero-desc">
                Manage your menu, tables, orders, billing, kitchen, staff, inventory and more &mdash; all in one simple platform built for restaurants.
            </p>
            <div class="hero-cta-row">
                <a href="{{ route('restaurant_signup') }}" class="h-btn-fill">Book a Demo &rarr;</a>
                <a href="{{ route('features') }}" class="h-btn-outline">Explore Features</a>
            </div>
            <div class="h-trust">
                <div class="h-trust-item">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                    For Restaurants, Caf&eacute;s, Bakeries, QSRs &amp; Canteens
                </div>
                <div class="h-trust-item">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                    Zero commission &middot; No hidden charges &middot; Free setup
                </div>
                <div class="h-trust-item">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                    Trusted by 1,200+ restaurants across India
                </div>
            </div>
        </div>

        <!-- RIGHT -->
        <div class="hero-right">
            <div class="hero-photo-card">
                <img src="{{ asset('landing/hero-restaurant-photo.png') }}" alt="Restaurant powered by Geni Menu">
            </div>

            <!-- POS Panel -->
            <div class="hero-pos-panel">
                <div class="pos-ph">
                    <div class="pos-ph-title">
                        <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                        POS &amp; Billing
                    </div>
                    <div class="pos-ph-live"><span class="pos-live-dot"></span>LIVE</div>
                </div>
                <div class="pos-grid">
                    <div class="pos-ic"><div class="pos-ic-n">Paneer Tikka</div><div class="pos-ic-p">&#8377;280</div></div>
                    <div class="pos-ic"><div class="pos-ic-n">Butter Naan</div><div class="pos-ic-p">&#8377;60</div></div>
                    <div class="pos-ic sel"><div class="pos-ic-n">Filter Coffee</div><div class="pos-ic-p">&#8377;90</div></div>
                    <div class="pos-ic"><div class="pos-ic-n">Veg Biryani</div><div class="pos-ic-p">&#8377;240</div></div>
                    <div class="pos-ic"><div class="pos-ic-n">Gulab Jamun</div><div class="pos-ic-p">&#8377;110</div></div>
                    <div class="pos-ic"><div class="pos-ic-n">Masala Dosa</div><div class="pos-ic-p">&#8377;140</div></div>
                </div>
                <hr class="pos-div">
                <div class="pos-bl"><span>Subtotal</span><span>&#8377;430</span></div>
                <div class="pos-bl"><span>CGST + SGST</span><span>&#8377;22</span></div>
                <div class="pos-bl tot"><span>Total</span><span>&#8377;452</span></div>
            </div>

            <!-- Mobile -->
            <div class="hero-mobile-frame">
                <div class="hmob-screen">
                    <div class="hmob-top">
                        <div class="hmob-top-t">Your Restaurant</div>
                        <div class="hmob-top-s">Table 12 &middot; Scan QR &amp; Order</div>
                    </div>
                    <div class="hmob-list">
                        <div class="hmob-item">
                            <img class="hmob-img" src="https://images.unsplash.com/photo-1599487405270-86430b8e611b?w=80&q=80" alt="">
                            <div><div class="hmob-n">Paneer Tikka</div><div class="hmob-p">&#8377;280</div></div>
                        </div>
                        <div class="hmob-item">
                            <img class="hmob-img" src="https://images.unsplash.com/photo-1513104890138-7c749659a591?w=80&q=80" alt="">
                            <div><div class="hmob-n">Wood-fired Pizza</div><div class="hmob-p">&#8377;360</div></div>
                        </div>
                        <div class="hmob-item">
                            <img class="hmob-img" src="https://images.unsplash.com/photo-1461023058943-0708e5223f03?w=80&q=80" alt="">
                            <div><div class="hmob-n">Cold Coffee</div><div class="hmob-p">&#8377;190</div></div>
                        </div>
                    </div>
                    <div class="hmob-pay"><span>2 items &middot; &#8377;640</span><span>Pay Now &rarr;</span></div>
                </div>
            </div>

            <!-- Notification Badges -->
            <div class="h-notif nk">
                <div class="nh">&#9889; Live Kitchen Alert</div>
                <div class="nt">Table 4 &rarr; KOT Sent</div>
                <div class="ns2">Kitchen confirmed &middot; 2 min ago</div>
            </div>
            <div class="h-notif ns">
                <div class="nh">&#128200; Today's Performance</div>
                <div class="nt">126 orders &middot; &#8377;48,200</div>
                <div class="ns2">&#8593; 18% vs yesterday</div>
            </div>
        </div>
    </div>
</section>
<!-- Features -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto space-y-8">

        <!-- Title -->
        <div class="mx-auto mb-8 lg:mb-14 text-center">
            <h2 class="text-3xl lg:text-4xl text-gray-800 font-bold dark:text-neutral-200">
                @lang('landing.featureSection1')
            </h2>
        </div>
        <!-- End Title -->

        <!-- Grid -->
        <div class="md:grid md:grid-cols-2 md:items-center md:gap-12 xl:gap-32">
            <div>
                <img class="rounded-xl border border-gray-100 shadow" src="{{ asset('landing/order-management.png') }}"
                    alt="order management">
            </div>
            <!-- End Col -->

            <div class="mt-5 sm:mt-10 lg:mt-0">
                <div class="space-y-6 sm:space-y-8">
                    <!-- Title -->
                    <div class="space-y-2 md:space-y-4">
                        <h2 class="font-bold text-3xl lg:text-4xl text-gray-800 dark:text-neutral-200">
                            @lang('landing.featureTitle1')
                        </h2>
                        <p class="text-gray-500 dark:text-neutral-500">
                            @lang('landing.featureDescription1')
                        </p>
                    </div>
                    <!-- End Title -->

                </div>
            </div>
            <!-- End Col -->
        </div>
        <!-- End Grid -->

        <!-- Grid -->
        <div class="md:grid md:grid-cols-2 md:items-center md:gap-12 xl:gap-32">

            <div class="mt-5 sm:mt-10 lg:mt-0">
                <div class="space-y-6 sm:space-y-8">
                    <!-- Title -->
                    <div class="space-y-2 md:space-y-4">
                        <h2 class="font-bold text-3xl lg:text-4xl text-gray-800 dark:text-neutral-200">
                            @lang('landing.featureTitle2')
                        </h2>
                        <p class="text-gray-500 dark:text-neutral-500">
                            @lang('landing.featureDescription2')
                        </p>
                    </div>
                    <!-- End Title -->

                </div>
            </div>
            <!-- End Col -->
            <div>
                <img class="rounded-xl border border-gray-100 shadow" src="{{ asset('landing/table-reservation.png') }}"
                    alt="order management">
            </div>
            <!-- End Col -->

        </div>
        <!-- End Grid -->

        <!-- Grid -->
        <div class="md:grid md:grid-cols-2 md:items-center md:gap-12 xl:gap-32">
            <div>
                <img class="rounded-xl border border-gray-100 shadow" src="{{ asset('landing/menu-management.png') }}"
                    alt="order management">
            </div>
            <!-- End Col -->

            <div class="mt-5 sm:mt-10 lg:mt-0">
                <div class="space-y-6 sm:space-y-8">
                    <!-- Title -->
                    <div class="space-y-2 md:space-y-4">
                        <h2 class="font-bold text-3xl lg:text-4xl text-gray-800 dark:text-neutral-200">
                            @lang('landing.featureTitle3')
                        </h2>
                        <p class="text-gray-500 dark:text-neutral-500">
                            @lang('landing.featureDescription3')
                        </p>
                    </div>
                    <!-- End Title -->

                </div>
            </div>
            <!-- End Col -->
        </div>
        <!-- End Grid -->

    </div>
    <!-- End Features -->

    <!-- Icon Blocks -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto" id="icon-features">

        <!-- Title -->
        <div class="mx-auto  mb-8 lg:mb-14 text-center">
            <h2 class="text-3xl lg:text-4xl text-gray-800 font-bold dark:text-neutral-200">
                @lang('landing.featureSection2')
            </h2>
        </div>
        <!-- End Title -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-12">

            <!-- Icon Block 1: QR Code Menu -->
            <div>
                <div
                    class="relative flex justify-center items-center size-12 bg-white rounded-xl before:absolute before:-inset-px before:-z-[1] before:bg-gradient-to-br before:from-gray-700 before:via-transparent before:to-gray-600 before:rounded-xl dark:bg-neutral-900">
                    <svg class="size-6 text-skin-base dark:text-skin-base" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/>
                        <path d="M9 8h6"/>
                        <path d="M9 12h4"/>
                    </svg>
                </div>
                <div class="mt-5">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">@lang('landing.iconFeature1')</h3>
                    <p class="mt-1 text-gray-600 dark:text-neutral-400">@lang('landing.iconFeatureDesc1')</p>
                </div>
            </div>
            <!-- End Icon Block -->

            <!-- Icon Block 2: Payment Gateway Integration -->
            <div>
                <div
                    class="relative flex justify-center items-center size-12 bg-white rounded-xl before:absolute before:-inset-px before:-z-[1] before:bg-gradient-to-br before:from-gray-700 before:via-transparent before:to-gray-600 before:rounded-xl dark:bg-neutral-900">
                    <svg class="size-6 text-skin-base dark:text-skin-base" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect width="20" height="14" x="2" y="5" rx="2"/>
                        <line x1="2" x2="22" y1="10" y2="10"/>
                        <path d="M6 15h4"/>
                        <circle cx="16" cy="15" r="1"/>
                    </svg>
                </div>
                <div class="mt-5">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">@lang('landing.iconFeature2')</h3>
                    <p class="mt-1 text-gray-600 dark:text-neutral-400">@lang('landing.iconFeatureDesc2')</p>
                </div>
            </div>
            <!-- End Icon Block -->

            <!-- Icon Block 3: Staff Management -->
            <div>
                <div
                    class="relative flex justify-center items-center size-12 bg-white rounded-xl before:absolute before:-inset-px before:-z-[1] before:bg-gradient-to-br before:from-gray-700 before:via-transparent before:to-gray-600 before:rounded-xl dark:bg-neutral-900">
                    <svg class="size-6 text-skin-base dark:text-skin-base" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M6 13.87A6 6 0 0 1 7.41 2a6 6 0 0 1 9.18 0A6 6 0 0 1 18 13.87V21H6z"/>
                        <line x1="6" y1="17" x2="18" y2="17"/>
                    </svg>
                </div>
                <div class="mt-5">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">@lang('landing.iconFeature3')</h3>
                    <p class="mt-1 text-gray-600 dark:text-neutral-400">@lang('landing.iconFeatureDesc3')</p>
                </div>
            </div>
            <!-- End Icon Block -->

            <!-- Icon Block 4: POS -->
            <div>
                <div
                    class="relative flex justify-center items-center size-12 bg-white rounded-xl before:absolute before:-inset-px before:-z-[1] before:bg-gradient-to-br before:from-gray-700 before:via-transparent before:to-gray-600 before:rounded-xl dark:bg-neutral-900">
                    <svg class="size-6 text-skin-base dark:text-skin-base" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="4" y="3" width="16" height="10" rx="2"/>
                        <path d="M4 17h16"/>
                        <path d="M8 21h8"/>
                        <path d="M12 17v4"/>
                        <path d="M8 7h3"/>
                        <circle cx="15" cy="7" r="1"/>
                    </svg>
                </div>
                <div class="mt-5">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">@lang('landing.iconFeature4')</h3>
                    <p class="mt-1 text-gray-600 dark:text-neutral-400">@lang('landing.iconFeatureDesc4')</p>
                </div>
            </div>
            <!-- End Icon Block -->

            <!-- Icon Block 5: Custom Floor Plans -->
            <div>
                <div
                    class="relative flex justify-center items-center size-12 bg-white rounded-xl before:absolute before:-inset-px before:-z-[1] before:bg-gradient-to-br before:from-gray-700 before:via-transparent before:to-gray-600 before:rounded-xl dark:bg-neutral-900">
                    <svg class="size-6 text-skin-base dark:text-skin-base" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="8" width="18" height="4" rx="1"/>
                        <path d="M6 12v7"/>
                        <path d="M18 12v7"/>
                        <path d="M8 4a2 2 0 0 0-2 2v2h4V6a2 2 0 0 0-2-2z"/>
                        <path d="M16 4a2 2 0 0 0-2 2v2h4V6a2 2 0 0 0-2-2z"/>
                    </svg>
                </div>
                <div class="mt-5">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">@lang('landing.iconFeature5')</h3>
                    <p class="mt-1 text-gray-600 dark:text-neutral-400">@lang('landing.iconFeatureDesc5')</p>
                </div>
            </div>
            <!-- End Icon Block -->

            <!-- Icon Block 6: Kitchen Order Tickets (KOT) -->
            <div>
                <div
                    class="relative flex justify-center items-center size-12 bg-white rounded-xl before:absolute before:-inset-px before:-z-[1] before:bg-gradient-to-br before:from-gray-700 before:via-transparent before:to-gray-600 before:rounded-xl dark:bg-neutral-900">
                    <svg class="size-6 text-skin-base dark:text-skin-base" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 18h16a1 1 0 0 0 1-1A9 9 0 0 0 3 17a1 1 0 0 0 1 1z"/>
                        <path d="M12 4a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                        <line x1="2" y1="20" x2="22" y2="20"/>
                    </svg>
                </div>
                <div class="mt-5">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">@lang('landing.iconFeature6')</h3>
                    <p class="mt-1 text-gray-600 dark:text-neutral-400">@lang('landing.iconFeatureDesc6')</p>
                </div>
            </div>
            <!-- End Icon Block -->

            <!-- Icon Block 7: Bill Printing -->
            <div>
                <div
                    class="relative flex justify-center items-center size-12 bg-white rounded-xl before:absolute before:-inset-px before:-z-[1] before:bg-gradient-to-br before:from-gray-700 before:via-transparent before:to-gray-600 before:rounded-xl dark:bg-neutral-900">
                    <svg class="size-6 text-skin-base dark:text-skin-base" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 2v20l3-2 3 2 3-2 3 2 3-2 3 2V2l-3 2-3-2-3 2-3-2-3 2z"/>
                        <line x1="8" y1="7" x2="16" y2="7"/>
                        <line x1="8" y1="11" x2="16" y2="11"/>
                        <line x1="8" y1="15" x2="13" y2="15"/>
                    </svg>
                </div>
                <div class="mt-5">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">@lang('landing.iconFeature7')</h3>
                    <p class="mt-1 text-gray-600 dark:text-neutral-400">@lang('landing.iconFeatureDesc7')</p>
                </div>
            </div>
            <!-- End Icon Block -->

            <!-- Icon Block 8: Reports -->
            <div>
                <div
                    class="relative flex justify-center items-center size-12 bg-white rounded-xl before:absolute before:-inset-px before:-z-[1] before:bg-gradient-to-br before:from-gray-700 before:via-transparent before:to-gray-600 before:rounded-xl dark:bg-neutral-900">
                    <svg class="size-6 text-skin-base dark:text-skin-base" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="20" x2="18" y2="10"/>
                        <line x1="12" y1="20" x2="12" y2="4"/>
                        <line x1="6" y1="20" x2="6" y2="14"/>
                        <line x1="2" y1="20" x2="22" y2="20"/>
                    </svg>
                </div>
                <div class="mt-5">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">@lang('landing.iconFeature8')</h3>
                    <p class="mt-1 text-gray-600 dark:text-neutral-400">@lang('landing.iconFeatureDesc8')</p>
                </div>
            </div>
            <!-- End Icon Block -->

        </div>
    </div>
    <!-- End Icon Blocks -->

    <!-- Testimonials -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">

        <!-- Title -->
        <div class="mx-auto  mb-8 lg:mb-14 text-center">
            <h2 class="text-3xl lg:text-4xl text-gray-800 font-bold dark:text-neutral-200">
                @lang('landing.testimonialSection1')
            </h2>
        </div>
        <!-- End Title -->

        <!-- Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Card -->
            <div
                class="flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700">
                <div class="flex-auto p-4 md:p-6">


                    <p class="text-base text-gray-800 md:text-xl dark:text-white"><em>
                            " @lang('landing.testimonial1') "
                        </em></p>
                </div>

                <div class="p-4 rounded-b-xl md:px-6">
                    <h3 class="text-sm font-semibold text-gray-800 sm:text-base dark:text-neutral-200">
                        @lang('landing.testimonialName1')
                    </h3>
                    <p class="text-sm text-gray-500 dark:text-neutral-500">
                        @lang('landing.testimonialDesignation1')
                    </p>
                </div>
            </div>
            <!-- End Card -->

            <!-- Card -->
            <div
                class="flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700">
                <div class="flex-auto p-4 md:p-6">


                    <p class="text-base text-gray-800 md:text-xl dark:text-white"><em>
                            " @lang('landing.testimonial2') "
                        </em></p>
                </div>

                <div class="p-4 rounded-b-xl md:px-6">
                    <h3 class="text-sm font-semibold text-gray-800 sm:text-base dark:text-neutral-200">
                        @lang('landing.testimonialName2')
                    </h3>
                    <p class="text-sm text-gray-500 dark:text-neutral-500">
                        @lang('landing.testimonialDesignation2')
                    </p>
                </div>
            </div>
            <!-- End Card -->

            <!-- Card -->
            <div
                class="flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700">
                <div class="flex-auto p-4 md:p-6">


                    <p class="text-base text-gray-800 md:text-xl dark:text-white"><em>
                            " @lang('landing.testimonial3') "
                        </em></p>
                </div>

                <div class="p-4 rounded-b-xl md:px-6">
                    <h3 class="text-sm font-semibold text-gray-800 sm:text-base dark:text-neutral-200">
                        @lang('landing.testimonialName3')
                    </h3>
                    <p class="text-sm text-gray-500 dark:text-neutral-500">
                        @lang('landing.testimonialDesignation3')
                    </p>
                </div>
            </div>
            <!-- End Card -->
        </div>
        <!-- End Grid -->
    </div>
    <!-- End Testimonials -->


    <!-- Features -->
    <div class="overflow-hidden" id="simple-pricing">
        <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
            <!-- Title -->
            <div class="mx-auto mb-8 lg:mb-14 text-center">
                <h2 class="text-3xl lg:text-4xl text-gray-800 font-bold dark:text-neutral-200">
                    @lang('landing.pricingTitle1')
                </h2>
                <p class="my-5 font-light text-gray-500 sm:text-xl dark:text-gray-400">
                    @lang('landing.pricingSubTitle1')
                </p>
            </div>
            <!-- End Title -->
            @include('landing.pricing', ['packages' => $packages, 'modules' => $AllModulesWithFeature])

        </div>
    </div>
    <!-- End Features -->

    <!-- FAQ -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto" id="user-faqs">
        <!-- Title -->
        <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
            <h2 class="text-2xl font-bold md:text-4xl md:leading-tight dark:text-white">@lang('landing.faqTitle1')</h2>
            <p class="mt-1 text-gray-600 dark:text-neutral-400">@lang('landing.faqSubTitle1')</p>
        </div>
        <!-- End Title -->

        <div class="max-w-5xl mx-auto">
            <!-- Grid -->
            <div class="grid sm:grid-cols-2 gap-6 md:gap-12">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                        @lang('landing.faqQues1')
                    </h3>
                    <p class="mt-2 text-gray-600 dark:text-neutral-400">
                        @lang('landing.faqAns1')
                    </p>
                </div>
                <!-- End Col -->

                <div>
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                        @lang('landing.faqQues2')
                    </h3>
                    <p class="mt-2 text-gray-600 dark:text-neutral-400">
                        @lang('landing.faqAns2')
                    </p>
                </div>
                <!-- End Col -->

                <div>
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                        @lang('landing.faqQues3')
                    </h3>
                    <p class="mt-2 text-gray-600 dark:text-neutral-400">
                        @lang('landing.faqAns3')
                    </p>
                </div>
                <!-- End Col -->


                <div>
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                        @lang('landing.faqQues4')
                    </h3>
                    <p class="mt-2 text-gray-600 dark:text-neutral-400">
                        @lang('landing.faqAns4')
                    </p>
                </div>
                <!-- End Col -->

                <div>
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                        @lang('landing.faqQues5')
                    </h3>
                    <p class="mt-2 text-gray-600 dark:text-neutral-400">
                        @lang('landing.faqAns5')
                    </p>
                </div>
                <!-- End Col -->


                <div>
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                        @lang('landing.faqQues6')
                    </h3>
                    <p class="mt-2 text-gray-600 dark:text-neutral-400">
                        @lang('landing.faqAns6')
                    </p>
                </div>
                <!-- End Col -->

            </div>
            <!-- End Grid -->
        </div>

    </div>
    <!-- End FAQ -->

    <!-- Contact -->
    <div class="max-w-7xl px-4 lg:px-8 py-12 lg:py-24 mx-auto">
        <div class="mb-6 sm:mb-10 max-w-2xl text-center mx-auto">
            <h2 class="font-medium text-black text-2xl sm:text-4xl dark:text-white">
                @lang('landing.contactTitle')
            </h2>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 lg:items-center gap-6 md:gap-8 lg:gap-12">
            <div class="aspect-w-16 aspect-h-6 lg:aspect-h-14 overflow-hidden bg-gray-100 rounded-2xl dark:bg-neutral-800">
                <img class="group-hover:scale-105 group-focus:scale-105 transition-transform duration-500 ease-in-out object-cover rounded-2xl"
                    src="https://images.unsplash.com/photo-1572021335469-31706a17aaef?q=80&w=560&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    alt="Contacts Image">
            </div>
            <!-- End Col -->

            <div class="space-y-8 lg:space-y-16">
                <div>
                    <h3 class="mb-5 font-semibold text-black dark:text-white">
                        @lang('landing.addressTitle')
                    </h3>

                    <!-- Grid -->
                    <div class="grid gap-4 sm:gap-6 md:gap-8 lg:gap-12">
                        <div class="flex gap-4">
                            <svg class="shrink-0 size-5" style="color: #876039;"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>

                            <div class="grow">
                                <p class="text-sm text-gray-600 dark:text-neutral-400">
                                    @lang('landing.contactCompany')
                                </p>
                                <address class="mt-1 text-black not-italic dark:text-white">
                                    @lang('landing.contactAddress')
                                </address>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <svg class="shrink-0 size-5" style="color: #876039;"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M21.2 8.4c.5.38.8.97.8 1.6v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V10a2 2 0 0 1 .8-1.6l8-6a2 2 0 0 1 2.4 0l8 6Z">
                                </path>
                                <path d="m22 10-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 10"></path>
                            </svg>

                            <div class="grow">
                                <p class="text-sm text-gray-600 dark:text-neutral-400">
                                    @lang('landing.emailTitle')
                                </p>
                                <p>
                                    <a class="relative inline-block font-medium text-black before:absolute before:bottom-0.5 before:start-0 before:-z-[1] before:w-full before:h-1 before:bg-skin-base hover:before:bg-black focus:outline-none focus:before:bg-black dark:text-white dark:hover:before:bg-white dark:focus:before:bg-white"
                                        href="mailto:@lang('landing.contactEmail')">
                                        @lang('landing.contactEmail')
                                    </a>
                                </p>
                            </div>
                        </div>

                    </div>
                    <!-- End Grid -->
                </div>

            </div>
            <!-- End Col -->
        </div>
    </div>

    <footer style="background-color: #fff7ef;" class="dark:bg-gray-900 border-t border-gray-200 dark:border-gray-800 mt-16">
        <div class="max-w-[85rem] mx-auto px-4 py-8 sm:px-6 lg:px-8">

            <!-- Flex Container: Copyright Left, Links Right -->
            <div class=" flex flex-col md:flex-row justify-between items-center gap-4">

                <!-- Copyright - Left Side -->
                <div class="text-center md:text-left">
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        © {{ date('Y') }} {{ config('app.name', 'Geni Restaurant') }}. All rights reserved.
                    </p>
                </div>

                <!-- Policy Links - Right Side with Separators -->
                <div class="flex flex-wrap justify-center md:justify-end items-center gap-x-4 gap-y-2 text-sm">
                    <a href="{{ route('privacy.policy') }}"
                        class="text-gray-600 hover:text-skin-base dark:text-gray-400 dark:hover:text-skin-base transition-colors duration-200">
                        Privacy Policy
                    </a>

                    <span class="text-gray-300 dark:text-gray-700">|</span>

                    <a href="{{ route('terms.conditions') }}"
                        class="text-gray-600 hover:text-skin-base dark:text-gray-400 dark:hover:text-skin-base transition-colors duration-200">
                        Terms & Conditions
                    </a>

                    <span class="text-gray-300 dark:text-gray-700">|</span>

                    <a href="{{ route('compliances') }}"
                        class="text-gray-600 hover:text-skin-base dark:text-gray-400 dark:hover:text-skin-base transition-colors duration-200">
                        Compliances
                    </a>

                    <span class="text-gray-300 dark:text-gray-700">|</span>

                    <a href="{{ route('terms.of.use') }}"
                        class="text-gray-600 hover:text-skin-base dark:text-gray-400 dark:hover:text-skin-base transition-colors duration-200">
                        Terms of Use
                    </a>

                    <span class="text-gray-300 dark:text-gray-700">|</span>

                    <a href="{{ route('cancellation.refund.policy') }}"
                        class="text-gray-600 hover:text-skin-base dark:text-gray-400 dark:hover:text-skin-base transition-colors duration-200">
                        Cancellation & Refund Policy
                    </a>

                    <span class="text-gray-300 dark:text-gray-700">|</span>

                    <a href="{{ route('service.delivery.policy') }}"
                        class="text-gray-600 hover:text-skin-base dark:text-gray-400 dark:hover:text-skin-base transition-colors duration-200">
                        Service Delivery Policy
                    </a>


                </div>

            </div>

        </div>
    </footer>
    <!-- End Contact -->

@endsection