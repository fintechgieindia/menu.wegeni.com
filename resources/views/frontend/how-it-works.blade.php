@extends('layouts.frontend-master')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">

<style>
  :root {
    --br: #876039;
    --br-dark: #6f4e2d;
    --br-light: #f4efe9;
    --bg2: #f9f6f0;
    --text-main: #241A14;
    --text-muted: #645B51;
    --shadow-sm: 0 4px 20px rgba(36, 26, 20, 0.04);
    --shadow-md: 0 16px 40px rgba(36, 26, 20, 0.08);
  }

  .hiw-page {
    font-family: 'Inter', sans-serif;
    color: var(--text-main);
    background: #fff;
    overflow-x: hidden;
  }

  /* Typography helpers */
  .hiw-title {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-weight: 500;
    line-height: 1.15;
    letter-spacing: -0.02em;
  }
  .hiw-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: var(--br-light);
    color: var(--br);
    padding: 6px 14px;
    border-radius: 999px;
    font-size: 13px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    margin-bottom: 24px;
  }
  .hiw-badge svg { width: 14px; height: 14px; stroke-width: 2.5; }

  /* Buttons */
  .hiw-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 14px 28px;
    border-radius: 12px;
    font-weight: 600;
    font-size: 16px;
    transition: all 0.3s ease;
    text-decoration: none;
    cursor: pointer;
    border: none;
  }
  .hiw-btn-primary {
    background: var(--br);
    color: #fff;
    box-shadow: 0 8px 24px rgba(135,96,57,0.25);
  }
  .hiw-btn-primary:hover {
    background: var(--br-dark);
    transform: translateY(-2px);
    box-shadow: 0 12px 32px rgba(135,96,57,0.35);
  }
  .hiw-btn-outline {
    background: transparent;
    color: var(--text-main);
    border: 1.5px solid #E5E0DA;
  }
  .hiw-btn-outline:hover {
    border-color: var(--br);
    color: var(--br);
    background: var(--br-light);
  }

  /* 3. Hero Section */
  .hiw-hero {
    padding: 180px 24px 100px;
    max-width: 1300px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    align-items: center;
  }
  .hiw-hero-content h1 {
    font-size: clamp(2.5rem, 4vw, 4rem);
    margin-bottom: 24px;
  }
  .hiw-hero-content p {
    font-size: 18px;
    line-height: 1.6;
    color: var(--text-muted);
    margin-bottom: 40px;
    max-width: 540px;
  }
  .hiw-hero-btns {
    display: flex;
    gap: 16px;
    flex-wrap: wrap;
  }
  
  /* Hero Dashboard Visual */
  .hiw-hero-visual {
    position: relative;
    width: 100%;
    height: 500px;
    perspective: 1000px;
  }
  .hiw-dash-main {
    position: absolute;
    top: 50%;
    right: 0;
    transform: translateY(-50%) rotateY(-5deg);
    width: 85%;
    height: 80%;
    background: #fff;
    border-radius: 20px;
    box-shadow: var(--shadow-md);
    border: 1px solid #f0f0f0;
    overflow: hidden;
    display: flex;
    flex-direction: column;
  }
  .hiw-dash-header {
    height: 48px;
    background: #FAFAFA;
    border-bottom: 1px solid #F0F0F0;
    display: flex;
    align-items: center;
    padding: 0 20px;
    gap: 8px;
  }
  .hiw-dash-dot { width: 10px; height: 10px; border-radius: 50%; background: #E5E5E5; }
  .hiw-dash-body {
    padding: 24px;
    flex: 1;
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 20px;
    background: #FAFAFA;
  }
  .hiw-dash-card {
    background: #fff;
    border-radius: 12px;
    border: 1px solid #F0F0F0;
    padding: 16px;
  }
  .hiw-dash-skeleton-line { height: 8px; background: #F0F0F0; border-radius: 4px; margin-bottom: 12px; }
  .hiw-dash-skeleton-line.w50 { width: 50%; }
  .hiw-dash-skeleton-line.w80 { width: 80%; }
  .hiw-dash-skeleton-box { height: 60px; background: #F9F6F0; border-radius: 8px; margin-top: auto; }

  /* Floating elements */
  .hiw-float-card {
    position: absolute;
    background: #fff;
    border-radius: 16px;
    padding: 16px;
    box-shadow: var(--shadow-md);
    border: 1px solid #F0F0F0;
    display: flex;
    align-items: center;
    gap: 16px;
    animation: hiwFloat 6s ease-in-out infinite;
  }
  .hiw-float-1 { top: 10%; left: -5%; animation-delay: 0s; }
  .hiw-float-2 { bottom: 10%; left: 5%; animation-delay: 2s; }
  .hiw-float-icon {
    width: 40px; height: 40px; border-radius: 10px; background: var(--br-light); color: var(--br);
    display: flex; align-items: center; justify-content: center;
  }
  
  @keyframes hiwFloat {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-15px); }
  }

  /* Section Styles */
  .hiw-section {
    padding: 100px 24px;
    max-width: 1240px;
    margin: 0 auto;
  }
  .hiw-section-alt {
    background: var(--bg2);
    padding: 100px 24px;
  }
  .hiw-section-inner {
    max-width: 1240px;
    margin: 0 auto;
  }
  .hiw-section-header {
    text-align: center;
    margin-bottom: 64px;
    max-width: 700px;
    margin-left: auto;
    margin-right: auto;
  }
  .hiw-section-header h2 {
    font-size: clamp(2rem, 3vw, 2.5rem);
    margin-bottom: 16px;
  }
  .hiw-section-header p {
    font-size: 17px;
    color: var(--text-muted);
    line-height: 1.6;
  }

  /* 4. Seven-step workflow */
  .hiw-steps {
    position: relative;
    padding-left: 40px;
  }
  .hiw-steps::before {
    content: '';
    position: absolute;
    left: 15px;
    top: 0;
    bottom: 0;
    width: 2px;
    background: #E5E0DA;
  }
  .hiw-step {
    position: relative;
    margin-bottom: 60px;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 40px;
    align-items: center;
  }
  .hiw-step:last-child { margin-bottom: 0; }
  .hiw-step-marker {
    position: absolute;
    left: -40px;
    top: 0;
    width: 32px;
    height: 32px;
    background: #fff;
    border: 2px solid var(--br);
    border-radius: 50%;
    transform: translateX(-50%);
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    color: var(--br);
    font-size: 13px;
    z-index: 2;
  }
  .hiw-step-content h3 {
    font-size: 24px;
    margin-bottom: 12px;
  }
  .hiw-step-content p {
    font-size: 16px;
    color: var(--text-muted);
    margin-bottom: 24px;
    line-height: 1.6;
  }
  .hiw-step-features {
    list-style: none;
    padding: 0;
    margin: 0;
    display: grid;
    gap: 12px;
  }
  .hiw-step-features li {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 15px;
    color: var(--text-main);
    font-weight: 500;
  }
  .hiw-step-features svg {
    color: var(--br);
    flex-shrink: 0;
  }
  .hiw-step-visual {
    background: var(--bg2);
    border-radius: 20px;
    padding: 32px;
    position: relative;
    overflow: hidden;
    height: 340px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid rgba(135,96,57,0.1);
  }
  .hiw-step-visual img, .hiw-step-visual svg {
    max-width: 100%;
    max-height: 100%;
  }

  /* 5. Connected Workflow Diagram */
  .hiw-flow-diagram {
    background: #fff;
    border-radius: 24px;
    padding: 60px 40px;
    box-shadow: var(--shadow-sm);
    border: 1px solid #F0F0F0;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 40px;
    position: relative;
  }
  .hiw-flow-row {
    display: flex;
    gap: 30px;
    justify-content: center;
    flex-wrap: wrap;
    position: relative;
    z-index: 2;
  }
  .hiw-flow-node {
    background: var(--bg2);
    border: 1px solid rgba(135,96,57,0.15);
    padding: 16px 24px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    gap: 12px;
    font-weight: 600;
    color: var(--text-main);
    transition: 0.3s;
  }
  .hiw-flow-node:hover {
    background: var(--br-light);
    border-color: var(--br);
    transform: translateY(-2px);
  }
  .hiw-flow-node svg {
    width: 20px; height: 20px;
    color: var(--br);
    stroke-width: 2;
  }
  .hiw-flow-arrow {
    display: flex;
    align-items: center;
    justify-content: center;
    color: #CCC;
  }
  .hiw-flow-arrow svg { stroke-width: 2; width: 24px; height: 24px; }
  .hiw-flow-note {
    text-align: center;
    font-size: 14px;
    color: var(--text-muted);
    font-style: italic;
    margin-top: 20px;
  }

  /* 6. Built for Different Restaurant Models */
  .hiw-models-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 24px;
  }
  .hiw-model-card {
    background: #fff;
    border: 1px solid #E5E0DA;
    border-radius: 16px;
    padding: 32px 24px;
    text-align: center;
    transition: 0.3s;
  }
  .hiw-model-card:hover {
    border-color: var(--br);
    box-shadow: var(--shadow-sm);
    transform: translateY(-4px);
  }
  .hiw-model-icon {
    width: 56px; height: 56px;
    background: var(--bg2);
    border-radius: 16px;
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 20px;
    color: var(--br);
  }
  .hiw-model-icon svg { width: 28px; height: 28px; stroke-width: 1.5; }
  .hiw-model-card h3 { font-size: 18px; margin-bottom: 12px; }
  .hiw-model-card p { font-size: 14px; color: var(--text-muted); line-height: 1.5; }

  /* 7. Essential Tools */
  .hiw-tools-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
  }
  .hiw-tool-card {
    background: #fff;
    padding: 24px;
    border-radius: 16px;
    box-shadow: var(--shadow-sm);
    border: 1px solid transparent;
    transition: 0.3s;
    display: flex;
    flex-direction: column;
    gap: 16px;
  }
  .hiw-tool-card:hover {
    border-color: rgba(135,96,57,0.2);
    box-shadow: var(--shadow-md);
  }
  .hiw-tool-icon {
    width: 44px; height: 44px;
    background: var(--br-light);
    color: var(--br);
    border-radius: 12px;
    display: flex; align-items: center; justify-content: center;
  }
  .hiw-tool-card h3 { font-size: 17px; margin: 0; }
  .hiw-tool-card p { font-size: 14px; color: var(--text-muted); line-height: 1.5; margin: 0; }

  /* 8. Get Started */
  .hiw-onboarding {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 20px;
    margin-bottom: 50px;
  }
  .hiw-onboard-step {
    position: relative;
    background: #fff;
    padding: 32px 24px;
    border-radius: 16px;
    border: 1px solid #E5E0DA;
    text-align: center;
  }
  .hiw-onboard-num {
    width: 32px; height: 32px;
    background: var(--bg2);
    color: var(--text-main);
    font-weight: 700;
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 16px;
    font-size: 13px;
  }
  .hiw-onboard-step h3 { font-size: 16px; margin-bottom: 10px; }
  .hiw-onboard-step p { font-size: 13px; color: var(--text-muted); line-height: 1.5; }

  /* 9. Final CTA */
  .hiw-cta-box {
    background: var(--br);
    border-radius: 24px;
    padding: 80px 40px;
    text-align: center;
    color: #fff;
    position: relative;
    overflow: hidden;
  }
  .hiw-cta-box::before {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(circle at 100% 0%, rgba(255,255,255,0.1) 0%, transparent 50%);
  }
  .hiw-cta-box h2 {
    font-size: clamp(2rem, 4vw, 3rem);
    margin-bottom: 20px;
    color: #fff;
  }
  .hiw-cta-box p {
    font-size: 18px;
    opacity: 0.9;
    max-width: 600px;
    margin: 0 auto 40px;
    line-height: 1.6;
  }
  .hiw-cta-btns {
    display: flex;
    gap: 16px;
    justify-content: center;
    flex-wrap: wrap;
  }
  .hiw-btn-white {
    background: #fff;
    color: var(--br);
  }
  .hiw-btn-white:hover {
    background: var(--bg2);
    transform: translateY(-2px);
  }
  .hiw-btn-outline-white {
    background: transparent;
    color: #fff;
    border: 1.5px solid rgba(255,255,255,0.4);
  }
  .hiw-btn-outline-white:hover {
    border-color: #fff;
    background: rgba(255,255,255,0.1);
  }

  /* Responsive */
  @media (max-width: 991px) {
    .hiw-hero { grid-template-columns: 1fr; text-align: center; padding: 110px 20px 50px; gap: 40px; }
    .hiw-hero-content p { margin: 0 auto 30px; font-size: 16px; }
    .hiw-hero-btns { justify-content: center; }
    .hiw-hero-visual { max-width: 500px; height: 380px; margin: 0 auto; }
    .hiw-step { grid-template-columns: 1fr; gap: 24px; text-align: left; }
    .hiw-step-features { justify-content: flex-start; }
    .hiw-steps { padding-left: 0; }
    .hiw-steps::before { display: none; }
    .hiw-step-marker { position: static; transform: none; margin: 0 0 14px 0; }
    .hiw-onboarding { grid-template-columns: 1fr 1fr; }
    .hiw-flow-row { flex-direction: column; align-items: center; gap: 16px; width: 100%; }
    .hiw-flow-node { width: 100%; justify-content: center; }
    .hiw-flow-arrow svg { transform: rotate(90deg); }
    .hiw-section, .hiw-section-alt { padding: 60px 0; }
    .hiw-section-inner { padding: 0 20px; }
  }
  @media (max-width: 767px) {
    .hiw-hero { padding: 100px 16px 40px; }
    .hiw-hero-visual { height: 320px; }
    .hiw-float-1 { bottom: 10px; left: 10px; }
    .hiw-float-2 { top: 10px; right: 10px; }
    .hiw-step-visual { height: 220px; padding: 20px; }
    .hiw-flow-diagram { padding: 30px 16px; }
    .hiw-onboarding { grid-template-columns: 1fr; gap: 14px; }
    .hiw-cta-box { padding: 40px 18px; border-radius: 18px; }
    .hiw-cta-box p { font-size: 15px; margin-bottom: 24px; }
    .hiw-section-header { margin-bottom: 40px; }
  }
  @media (max-width: 480px) {
    .hiw-hero-btns, .hiw-cta-btns { flex-direction: column; width: 100%; }
    .hiw-hero-btns .hiw-btn, .hiw-cta-btns .hiw-btn { width: 100%; }
    .hiw-float-card { padding: 8px 12px; }
  }
</style>

<div class="hiw-page">

  <!-- 3. HERO SECTION -->
  <section class="hiw-hero">
    <div class="hiw-hero-content" data-aos="fade-right">
      <div class="hiw-badge">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
        HOW GENI MENU WORKS
      </div>
      <h1 class="hiw-title">From Order to Checkout. Everything Works Together.</h1>
      <p>Run your restaurant with one connected platform. From managing your menu and receiving orders to kitchen coordination, billing and business reports, Geni Menu brings your daily operations into one simple workflow.</p>
      <div class="hiw-hero-btns">
        <a href="{{ route('contact.us') }}" class="hiw-btn hiw-btn-primary">Book a Demo &rarr;</a>
        <a href="{{ route('pricing') }}" class="hiw-btn hiw-btn-outline">Get Started &rarr;</a>
      </div>
    </div>
    <div class="hiw-hero-visual" data-aos="fade-left">
      <!-- Minimal CSS Dashboard Composition -->
      <div class="hiw-dash-main">
        <div class="hiw-dash-header">
          <div class="hiw-dash-dot" style="background:#FF5F56;"></div>
          <div class="hiw-dash-dot" style="background:#FFBD2E;"></div>
          <div class="hiw-dash-dot" style="background:#27C93F;"></div>
          <div style="margin-left:10px; font-size:12px; font-weight:600; color:#999;">Geni Menu Workspace</div>
        </div>
        <div class="hiw-dash-body">
          <div class="hiw-dash-card">
            <div class="hiw-dash-skeleton-line w50"></div>
            <div class="hiw-dash-skeleton-line w80"></div>
            <div class="hiw-dash-skeleton-box" style="margin-top:20px; height:120px;"></div>
          </div>
          <div class="hiw-dash-card" style="display:flex; flex-direction:column; gap:10px;">
            <div class="hiw-dash-skeleton-box" style="margin-top:0; height:40px;"></div>
            <div class="hiw-dash-skeleton-box" style="margin-top:0; height:40px;"></div>
            <div class="hiw-dash-skeleton-box" style="margin-top:0; height:40px;"></div>
          </div>
        </div>
      </div>
      <div class="hiw-float-card hiw-float-1">
        <div class="hiw-float-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
        </div>
        <div>
          <div style="font-weight:700; font-size:14px;">New Order #1042</div>
          <div style="font-size:12px; color:var(--text-muted);">Table 4 • Dine-in</div>
        </div>
      </div>
      <div class="hiw-float-card hiw-float-2">
        <div class="hiw-float-icon" style="background:#E6F7ED; color:#1E7E34;">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><rect x="2" y="5" width="20" height="14" rx="2"/><line x1="2" y1="10" x2="22" y2="10"/></svg>
        </div>
        <div>
          <div style="font-weight:700; font-size:14px;">Payment Received</div>
          <div style="font-size:12px; color:var(--text-muted);">₹ 1,240.00</div>
        </div>
      </div>
    </div>
  </section>

  <!-- 4. SEVEN-STEP RESTAURANT WORKFLOW -->
  <section class="hiw-section-alt">
    <div class="hiw-section-inner">
      <div class="hiw-section-header" data-aos="fade-up">
        <h2 class="hiw-title">One Platform. A Complete Restaurant Workflow.</h2>
        <p>See how Geni Menu connects the essential activities of your restaurant, from menu setup to business reporting.</p>
      </div>

      <div class="hiw-steps">
        <!-- Step 1 -->
        <div class="hiw-step" data-aos="fade-up">
          <div class="hiw-step-marker">01</div>
          <div class="hiw-step-content">
            <h3 class="hiw-title">Your Menu, Organized in One Place.</h3>
            <p>Add menu items, categories, food images, prices and availability. Keep your menu organized and update your offerings whenever needed.</p>
            <ul class="hiw-step-features">
              <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg> Manage menu categories</li>
              <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg> Add and update menu items</li>
              <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg> Maintain pricing and availability</li>
              <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg> Present your menu digitally</li>
            </ul>
          </div>
          <div class="hiw-step-visual">
            <div style="font-size:64px; opacity:0.8;">📱</div>
          </div>
        </div>

        <!-- Step 2 -->
        <div class="hiw-step" data-aos="fade-up">
          <div class="hiw-step-marker">02</div>
          <div class="hiw-step-visual" style="order: -1;">
            <div style="font-size:64px; opacity:0.8;">🛎️</div>
          </div>
          <div class="hiw-step-content">
            <h3 class="hiw-title">Every Order, Clearly Organized.</h3>
            <p>Handle dine-in, takeaway and other supported order types through an organized order management workspace.</p>
            <ul class="hiw-step-features">
              <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg> View incoming orders</li>
              <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg> Organize orders by type</li>
              <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg> Track order status</li>
              <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg> Keep order details accessible</li>
            </ul>
          </div>
        </div>

        <!-- Step 3 -->
        <div class="hiw-step" data-aos="fade-up">
          <div class="hiw-step-marker">03</div>
          <div class="hiw-step-content">
            <h3 class="hiw-title">Keep Your Kitchen in Sync.</h3>
            <p>Use KOT and kitchen management features to communicate order details and coordinate food preparation.</p>
            <ul class="hiw-step-features">
              <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg> View kitchen order tickets</li>
              <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg> Review item-level order details</li>
              <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg> Coordinate preparation</li>
              <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg> Track kitchen order status</li>
            </ul>
          </div>
          <div class="hiw-step-visual">
            <div style="font-size:64px; opacity:0.8;">🍳</div>
          </div>
        </div>

        <!-- Step 4 -->
        <div class="hiw-step" data-aos="fade-up">
          <div class="hiw-step-marker">04</div>
          <div class="hiw-step-visual" style="order: -1;">
            <div style="font-size:64px; opacity:0.8;">💳</div>
          </div>
          <div class="hiw-step-content">
            <h3 class="hiw-title">Billing That Fits Your Workflow.</h3>
            <p>Process bills, manage payment records and keep transactions organized through the POS and payment management features.</p>
            <ul class="hiw-step-features">
              <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg> Handle counter billing</li>
              <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg> Review order totals</li>
              <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg> Manage payment records</li>
              <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg> Keep transactions organized</li>
            </ul>
          </div>
        </div>

        <!-- Step 5 -->
        <div class="hiw-step" data-aos="fade-up">
          <div class="hiw-step-marker">05</div>
          <div class="hiw-step-content">
            <h3 class="hiw-title">Make Every Table Easier to Manage.</h3>
            <p>Manage table assignments, reservations and waiter requests to support a smoother dining experience.</p>
            <ul class="hiw-step-features">
              <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg> View table status</li>
              <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg> Coordinate table assignments</li>
              <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg> Manage reservations</li>
              <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg> Handle waiter requests</li>
            </ul>
          </div>
          <div class="hiw-step-visual">
            <div style="font-size:64px; opacity:0.8;">🪑</div>
          </div>
        </div>

        <!-- Step 6 -->
        <div class="hiw-step" data-aos="fade-up">
          <div class="hiw-step-marker">06</div>
          <div class="hiw-step-visual" style="order: -1;">
            <div style="font-size:64px; opacity:0.8;">📦</div>
          </div>
          <div class="hiw-step-content">
            <h3 class="hiw-title">Stay Prepared for Daily Service.</h3>
            <p>Track stock, review inventory movement and monitor operational activities to help your team stay prepared.</p>
            <ul class="hiw-step-features">
              <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg> Monitor inventory</li>
              <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg> Review stock levels</li>
              <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg> Track inventory activity</li>
              <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg> Support replenishment planning</li>
            </ul>
          </div>
        </div>

        <!-- Step 7 -->
        <div class="hiw-step" data-aos="fade-up">
          <div class="hiw-step-marker">07</div>
          <div class="hiw-step-content">
            <h3 class="hiw-title">Understand Your Restaurant's Performance.</h3>
            <p>Review sales, orders, payments and other business activity through reports that support everyday decisions.</p>
            <ul class="hiw-step-features">
              <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg> Review sales summaries</li>
              <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg> Monitor order activity</li>
              <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg> Understand payment records</li>
              <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg> Explore business reports</li>
            </ul>
          </div>
          <div class="hiw-step-visual">
            <div style="font-size:64px; opacity:0.8;">📊</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 5. CONNECTED RESTAURANT WORKFLOW -->
  <section class="hiw-section">
    <div class="hiw-section-header" data-aos="fade-up">
      <h2 class="hiw-title">See How Every Part of Your Restaurant Connects.</h2>
      <p>Geni Menu brings restaurant activities together so your team can manage the customer experience and daily operations from connected workflows.</p>
    </div>
    
    <div class="hiw-flow-diagram" data-aos="fade-up">
      <div class="hiw-flow-row">
        <div class="hiw-flow-node"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><rect x="4" y="2" width="16" height="20" rx="2" ry="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg> Digital Menu</div>
      </div>
      <div class="hiw-flow-arrow"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><line x1="12" y1="5" x2="12" y2="19"/><polyline points="19 12 12 19 5 12"/></svg></div>
      
      <div class="hiw-flow-row">
        <div class="hiw-flow-node"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg> Customer Orders</div>
        <div class="hiw-flow-node"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg> POS Orders</div>
      </div>
      <div class="hiw-flow-arrow"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><line x1="12" y1="5" x2="12" y2="19"/><polyline points="19 12 12 19 5 12"/></svg></div>

      <div class="hiw-flow-row">
        <div class="hiw-flow-node"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg> Order Management</div>
      </div>
      <div class="hiw-flow-arrow"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><line x1="12" y1="5" x2="12" y2="19"/><polyline points="19 12 12 19 5 12"/></svg></div>

      <div class="hiw-flow-row">
        <div class="hiw-flow-node"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg> KOT & Kitchen</div>
        <div class="hiw-flow-node"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg> Prep & Service</div>
      </div>
      <div class="hiw-flow-arrow"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><line x1="12" y1="5" x2="12" y2="19"/><polyline points="19 12 12 19 5 12"/></svg></div>

      <div class="hiw-flow-row">
        <div class="hiw-flow-node"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><rect x="2" y="5" width="20" height="14" rx="2"/><line x1="2" y1="10" x2="22" y2="10"/></svg> Billing & Payments</div>
      </div>
      <div class="hiw-flow-arrow"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><line x1="12" y1="5" x2="12" y2="19"/><polyline points="19 12 12 19 5 12"/></svg></div>

      <div class="hiw-flow-row">
        <div class="hiw-flow-node"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><polyline points="3.27 6.96 12 12.01 20.73 6.96"/><line x1="12" y1="22.08" x2="12" y2="12"/></svg> Inventory</div>
        <div class="hiw-flow-node"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg> Reports</div>
      </div>

      <p class="hiw-flow-note">The workflow and available connections depend on your enabled features and business configuration.</p>
    </div>
  </section>

  <!-- 6. BUILT FOR DIFFERENT RESTAURANT MODELS -->
  <section class="hiw-section-alt">
    <div class="hiw-section-inner">
      <div class="hiw-section-header" data-aos="fade-up">
        <h2 class="hiw-title">Different Restaurant Types. One Flexible Platform.</h2>
        <p>Explore how Geni Menu can support different food-service workflows and business requirements.</p>
      </div>
      <div class="hiw-models-grid">
        <div class="hiw-model-card" data-aos="fade-up" data-aos-delay="0">
          <div class="hiw-model-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M3 18v-6a9 9 0 0 1 18 0v6"/><path d="M21 19a2 2 0 0 1-2 2h-4a2 2 0 0 1-2-2v-4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2z"/><path d="M3 19a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2z"/></svg></div>
          <h3 class="hiw-title">Dine-in Restaurants</h3>
          <p>Connect tables, orders, kitchen operations and billing.</p>
        </div>
        <div class="hiw-model-card" data-aos="fade-up" data-aos-delay="50">
          <div class="hiw-model-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></div>
          <h3 class="hiw-title">Quick Service</h3>
          <p>Handle fast-moving orders and counter billing.</p>
        </div>
        <div class="hiw-model-card" data-aos="fade-up" data-aos-delay="100">
          <div class="hiw-model-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg></div>
          <h3 class="hiw-title">Takeaway</h3>
          <p>Organize incoming orders, preparation and pickup.</p>
        </div>
        <div class="hiw-model-card" data-aos="fade-up" data-aos-delay="150">
          <div class="hiw-model-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M18 8h1a4 4 0 0 1 0 8h-1"/><path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"/><line x1="6" y1="1" x2="6" y2="4"/><line x1="10" y1="1" x2="10" y2="4"/><line x1="14" y1="1" x2="14" y2="4"/></svg></div>
          <h3 class="hiw-title">Cafés</h3>
          <p>Manage beverages, food menus, counter orders and payments.</p>
        </div>
        <div class="hiw-model-card" data-aos="fade-up" data-aos-delay="200">
          <div class="hiw-model-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><circle cx="12" cy="12" r="10"/><path d="M8 14s1.5 2 4 2 4-2 4-2"/><line x1="9" y1="9" x2="9.01" y2="9"/><line x1="15" y1="9" x2="15.01" y2="9"/></svg></div>
          <h3 class="hiw-title">Bakeries</h3>
          <p>Organize product menus, customer orders and inventory.</p>
        </div>
        <div class="hiw-model-card" data-aos="fade-up" data-aos-delay="250">
          <div class="hiw-model-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><polyline points="3.27 6.96 12 12.01 20.73 6.96"/><line x1="12" y1="22.08" x2="12" y2="12"/></svg></div>
          <h3 class="hiw-title">Multi-Branch</h3>
          <p>Manage branch operations using applicable multi-branch features.</p>
        </div>
      </div>
      <div style="text-align:center; margin-top:40px;">
        <a href="{{ route('features') }}" class="hiw-btn hiw-btn-outline">Explore All Industries &rarr;</a>
      </div>
    </div>
  </section>

  <!-- 7. ESSENTIAL RESTAURANT MANAGEMENT TOOLS -->
  <section class="hiw-section">
    <div class="hiw-section-header" data-aos="fade-up">
      <h2 class="hiw-title">Manage Your Restaurant From One Place.</h2>
      <p>Explore the essential tools that help bring your restaurant's daily activities together.</p>
    </div>
    <div class="hiw-tools-grid">
      <a href="{{ route('features.menu-management') }}" class="hiw-tool-card" style="text-decoration:none; color:inherit;" data-aos="fade-up">
        <div class="hiw-tool-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg></div>
        <h3 class="hiw-title">Menu Management</h3>
        <p>Organize items, categories, pricing and availability.</p>
      </a>
      <a href="{{ route('features.order-management') }}" class="hiw-tool-card" style="text-decoration:none; color:inherit;" data-aos="fade-up" data-aos-delay="50">
        <div class="hiw-tool-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg></div>
        <h3 class="hiw-title">Order Management</h3>
        <p>Keep incoming orders visible and organized.</p>
      </a>
      <a href="{{ route('features.kot-management') }}" class="hiw-tool-card" style="text-decoration:none; color:inherit;" data-aos="fade-up" data-aos-delay="100">
        <div class="hiw-tool-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg></div>
        <h3 class="hiw-title">Kitchen & KOT</h3>
        <p>Coordinate kitchen preparation and order status.</p>
      </a>
      <a href="{{ route('features.pos-management') }}" class="hiw-tool-card" style="text-decoration:none; color:inherit;" data-aos="fade-up" data-aos-delay="150">
        <div class="hiw-tool-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg></div>
        <h3 class="hiw-title">POS & Billing</h3>
        <p>Handle counter transactions and restaurant billing.</p>
      </a>
      <a href="{{ route('features.table-management') }}" class="hiw-tool-card" style="text-decoration:none; color:inherit;" data-aos="fade-up" data-aos-delay="200">
        <div class="hiw-tool-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><line x1="3" y1="9" x2="21" y2="9"/><line x1="9" y1="21" x2="9" y2="9"/></svg></div>
        <h3 class="hiw-title">Table Management</h3>
        <p>View tables and coordinate dining service.</p>
      </a>
      <a href="{{ route('features.reservation-management') }}" class="hiw-tool-card" style="text-decoration:none; color:inherit;" data-aos="fade-up" data-aos-delay="250">
        <div class="hiw-tool-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg></div>
        <h3 class="hiw-title">Reservations</h3>
        <p>Manage restaurant bookings and guest details.</p>
      </a>
      <a href="{{ route('features.inventory-management') }}" class="hiw-tool-card" style="text-decoration:none; color:inherit;" data-aos="fade-up" data-aos-delay="300">
        <div class="hiw-tool-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><polyline points="3.27 6.96 12 12.01 20.73 6.96"/><line x1="12" y1="22.08" x2="12" y2="12"/></svg></div>
        <h3 class="hiw-title">Inventory</h3>
        <p>Monitor stock levels and inventory activity.</p>
      </a>
      <a href="{{ route('features.reports') }}" class="hiw-tool-card" style="text-decoration:none; color:inherit;" data-aos="fade-up" data-aos-delay="350">
        <div class="hiw-tool-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></div>
        <h3 class="hiw-title">Reports</h3>
        <p>Review sales and operational performance.</p>
      </a>
    </div>
  </section>

  <!-- 8. GET STARTED -->
  <section class="hiw-section-alt">
    <div class="hiw-section-inner">
      <div class="hiw-section-header" data-aos="fade-up">
        <h2 class="hiw-title">Set Up Your Restaurant. Start Managing Smarter.</h2>
        <p>Getting started begins with understanding your restaurant's needs and configuring the relevant tools.</p>
      </div>
      <div class="hiw-onboarding">
        <div class="hiw-onboard-step" data-aos="fade-up" data-aos-delay="0">
          <div class="hiw-onboard-num">1</div>
          <h3 class="hiw-title">Choose Your Plan</h3>
          <p>Explore Standard, Premium and Enterprise options.</p>
        </div>
        <div class="hiw-onboard-step" data-aos="fade-up" data-aos-delay="100">
          <div class="hiw-onboard-num">2</div>
          <h3 class="hiw-title">Set Up Your Business</h3>
          <p>Configure details, menu and operational settings.</p>
        </div>
        <div class="hiw-onboard-step" data-aos="fade-up" data-aos-delay="200">
          <div class="hiw-onboard-num">3</div>
          <h3 class="hiw-title">Connect Workflow</h3>
          <p>Enable features that fit your service model.</p>
        </div>
        <div class="hiw-onboard-step" data-aos="fade-up" data-aos-delay="300">
          <div class="hiw-onboard-num">4</div>
          <h3 class="hiw-title">Bring Team Onboard</h3>
          <p>Set up staff access and introduce workflows.</p>
        </div>
        <div class="hiw-onboard-step" data-aos="fade-up" data-aos-delay="400">
          <div class="hiw-onboard-num">5</div>
          <h3 class="hiw-title">Manage & Improve</h3>
          <p>Use reports to support ongoing improvements.</p>
        </div>
      </div>
      <div style="text-align:center;">
        <a href="{{ route('pricing') }}" class="hiw-btn hiw-btn-primary" style="margin-right:12px;">Get Started &rarr;</a>
        <a href="{{ route('contact.us') }}" class="hiw-btn hiw-btn-outline">Book a Demo</a>
      </div>
    </div>
  </section>

  <!-- 9. FINAL CTA -->
  <section class="hiw-section">
    <div class="hiw-cta-box" data-aos="fade-up">
      <h2 class="hiw-title">Ready to See Geni Menu in Action?</h2>
      <p>Explore a connected way to manage your restaurant's menu, orders, kitchen, billing and daily operations.</p>
      <div class="hiw-cta-btns">
        <a href="{{ route('contact.us') }}" class="hiw-btn hiw-btn-white">Book a Demo &rarr;</a>
        <a href="{{ route('features') }}" class="hiw-btn hiw-btn-outline-white">Explore Features &rarr;</a>
      </div>
    </div>
  </section>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
  AOS.init({
    duration: 800,
    once: true,
    offset: 50,
  });
</script>
@endsection
