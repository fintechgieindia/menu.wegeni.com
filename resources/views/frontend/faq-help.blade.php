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

  .faq-page {
    font-family: 'Inter', sans-serif;
    color: var(--text-main);
    background: #fff;
    overflow-x: hidden;
  }

  /* Typography */
  .faq-title {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-weight: 800;
    line-height: 1.15;
    letter-spacing: -0.02em;
  }
  .faq-badge {
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

  /* Buttons */
  .faq-btn {
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
  .faq-btn-primary { background: var(--br); color: #fff; box-shadow: 0 8px 24px rgba(135,96,57,0.25); }
  .faq-btn-primary:hover { background: var(--br-dark); transform: translateY(-2px); box-shadow: 0 12px 32px rgba(135,96,57,0.35); }
  .faq-btn-outline { background: transparent; color: var(--text-main); border: 1.5px solid #E5E0DA; }
  .faq-btn-outline:hover { border-color: var(--br); color: var(--br); background: var(--br-light); }

  /* Sections */
  .faq-section { padding: 100px 24px; max-width: 1240px; margin: 0 auto; }
  .faq-section-alt { background: var(--bg2); padding: 100px 24px; }
  .faq-section-inner { max-width: 1240px; margin: 0 auto; }
  .faq-section-header { text-align: center; margin-bottom: 64px; max-width: 700px; margin-left: auto; margin-right: auto; }
  .faq-section-header h2 { font-size: clamp(2rem, 3vw, 2.5rem); margin-bottom: 16px; }
  .faq-section-header p { font-size: 17px; color: var(--text-muted); line-height: 1.6; }

  /* 10. FAQ HERO */
  .faq-hero {
    padding: 180px 24px 100px;
    background: linear-gradient(180deg, var(--bg2) 0%, #fff 100%);
    text-align: center;
  }
  .faq-hero-content { max-width: 800px; margin: 0 auto; }
  .faq-hero-content h1 { font-size: clamp(2.5rem, 4vw, 4rem); margin-bottom: 24px; }
  .faq-hero-content p { font-size: 18px; line-height: 1.6; color: var(--text-muted); margin-bottom: 40px; }
  
  .faq-search-box {
    position: relative;
    max-width: 600px;
    margin: 0 auto 30px;
  }
  .faq-search-input {
    width: 100%;
    padding: 18px 24px 18px 56px;
    border-radius: 16px;
    border: 1px solid #E5E0DA;
    font-size: 16px;
    font-family: inherit;
    box-shadow: var(--shadow-sm);
    transition: 0.3s;
    outline: none;
  }
  .faq-search-input:focus {
    border-color: var(--br);
    box-shadow: 0 0 0 4px rgba(135,96,57,0.1);
  }
  .faq-search-icon {
    position: absolute;
    left: 20px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--text-muted);
  }
  
  .faq-hero-btns {
    display: flex; gap: 16px; justify-content: center; flex-wrap: wrap; margin-top: 40px;
  }

  /* 11. HELP CATEGORY GRID */
  .faq-cat-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 20px;
  }
  .faq-cat-card {
    background: #fff;
    border: 1px solid #E5E0DA;
    border-radius: 16px;
    padding: 24px;
    display: flex;
    align-items: flex-start;
    gap: 16px;
    transition: 0.3s;
    cursor: pointer;
  }
  .faq-cat-card:hover {
    border-color: var(--br);
    box-shadow: var(--shadow-md);
    transform: translateY(-2px);
  }
  .faq-cat-icon {
    width: 48px; height: 48px;
    background: var(--bg2);
    color: var(--br);
    border-radius: 12px;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
  }
  .faq-cat-card h3 { font-size: 17px; margin-bottom: 6px; font-weight: 700; }
  .faq-cat-card p { font-size: 14px; color: var(--text-muted); margin: 0; line-height: 1.5; }

  /* 12. FAQ ACCORDION */
  .faq-wrapper {
    display: grid;
    grid-template-columns: 280px 1fr;
    gap: 60px;
    align-items: start;
  }
  .faq-sidebar {
    position: sticky;
    top: 100px;
    display: flex;
    flex-direction: column;
    gap: 8px;
  }
  .faq-tab {
    padding: 12px 16px;
    border-radius: 10px;
    font-weight: 600;
    color: var(--text-muted);
    cursor: pointer;
    transition: 0.2s;
    text-align: left;
    border: none;
    background: transparent;
    font-size: 15px;
  }
  .faq-tab:hover {
    background: var(--bg2);
    color: var(--text-main);
  }
  .faq-tab.active {
    background: var(--br-light);
    color: var(--br);
  }

  .faq-content-area {
    display: flex;
    flex-direction: column;
    gap: 40px;
  }
  .faq-group-title {
    font-size: 20px;
    margin-bottom: 20px;
    padding-bottom: 12px;
    border-bottom: 1px solid #E5E0DA;
  }
  .faq-accordion-item {
    border: 1px solid #E5E0DA;
    border-radius: 12px;
    margin-bottom: 12px;
    background: #fff;
    overflow: hidden;
    transition: 0.3s;
  }
  .faq-accordion-btn {
    width: 100%;
    padding: 20px 24px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: transparent;
    border: none;
    font-size: 16px;
    font-weight: 600;
    color: var(--text-main);
    text-align: left;
    cursor: pointer;
    font-family: inherit;
  }
  .faq-accordion-btn svg {
    transition: transform 0.3s;
    color: var(--br);
    flex-shrink: 0;
  }
  .faq-accordion-item.active .faq-accordion-btn svg {
    transform: rotate(180deg);
  }
  .faq-accordion-body {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease-out;
    background: #fff;
  }
  .faq-accordion-inner {
    padding: 0 24px 24px;
    color: var(--text-muted);
    line-height: 1.6;
    font-size: 15px;
  }
  .faq-no-results {
    text-align: center;
    padding: 40px;
    color: var(--text-muted);
    font-size: 16px;
    display: none;
    background: var(--bg2);
    border-radius: 12px;
  }

  /* 13. SETUP GUIDANCE */
  .faq-guide-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: 20px;
  }
  .faq-guide-card {
    background: #fff;
    padding: 32px 24px;
    border-radius: 16px;
    border: 1px solid #E5E0DA;
    text-align: center;
    transition: 0.3s;
  }
  .faq-guide-card:hover {
    border-color: var(--br);
    box-shadow: var(--shadow-sm);
  }
  .faq-guide-icon {
    width: 56px; height: 56px;
    background: var(--br-light);
    color: var(--br);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 20px;
  }
  .faq-guide-card h3 { font-size: 18px; margin-bottom: 12px; }
  .faq-guide-card p { font-size: 14px; color: var(--text-muted); line-height: 1.5; margin-bottom: 20px; }
  .faq-guide-link { font-weight: 600; color: var(--br); text-decoration: none; font-size: 15px; display: inline-flex; align-items: center; gap: 4px; }
  .faq-guide-link:hover { text-decoration: underline; }

  /* 15. CONTACT SUPPORT */
  .faq-support-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 30px;
  }
  .faq-support-card {
    background: #fff;
    padding: 40px;
    border-radius: 20px;
    border: 1px solid #E5E0DA;
    display: flex;
    align-items: flex-start;
    gap: 24px;
    transition: 0.3s;
  }
  .faq-support-card:hover { box-shadow: var(--shadow-md); border-color: rgba(135,96,57,0.3); }
  .faq-support-icon {
    width: 64px; height: 64px;
    background: var(--bg2);
    color: var(--br);
    border-radius: 16px;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
  }
  .faq-support-icon svg { width: 32px; height: 32px; stroke-width: 1.5; }
  .faq-support-card h3 { font-size: 22px; margin-bottom: 8px; }
  .faq-support-card p { font-size: 15px; color: var(--text-muted); line-height: 1.5; margin-bottom: 24px; }
  
  /* 16. FINAL CTA */
  .faq-cta-box {
    background: var(--br);
    border-radius: 24px;
    padding: 80px 40px;
    text-align: center;
    color: #fff;
    position: relative;
    overflow: hidden;
  }
  .faq-cta-box h2 { font-size: clamp(2rem, 4vw, 3rem); margin-bottom: 20px; color: #fff; }
  .faq-cta-box p { font-size: 18px; opacity: 0.9; max-width: 600px; margin: 0 auto 40px; line-height: 1.6; }
  
  /* Responsive */
  @media (max-width: 991px) {
    .faq-hero { padding: 110px 20px 50px; }
    .faq-hero-content p { font-size: 16px; margin-bottom: 30px; }
    .faq-section, .faq-section-alt { padding: 60px 20px; }
    .faq-wrapper { grid-template-columns: 1fr; gap: 30px; }
    .faq-sidebar { position: static; flex-direction: row; overflow-x: auto; padding-bottom: 10px; -webkit-overflow-scrolling: touch; }
    .faq-tab { white-space: nowrap; font-size: 14px; padding: 10px 14px; }
    .faq-support-grid { grid-template-columns: 1fr; }
    .faq-cat-grid { grid-template-columns: 1fr; }
  }
  @media (max-width: 767px) {
    .faq-hero { padding: 100px 16px 40px; }
    .faq-search-input { padding: 14px 16px 14px 44px; font-size: 14.5px; border-radius: 12px; }
    .faq-search-icon { left: 14px; }
    .faq-section, .faq-section-alt { padding: 50px 16px; }
    .faq-section-header { margin-bottom: 40px; }
    .faq-accordion-btn { padding: 16px 18px; font-size: 15px; }
    .faq-accordion-inner { padding: 0 18px 18px; font-size: 14px; }
    .faq-support-card { flex-direction: column; align-items: center; text-align: center; padding: 28px 18px; }
    .faq-cta-box { padding: 40px 18px; border-radius: 18px; }
    .faq-cta-box p { font-size: 15px; margin-bottom: 24px; }
  }
  @media (max-width: 480px) {
    .faq-hero-btns { flex-direction: column; width: 100%; }
    .faq-hero-btns .faq-btn { width: 100%; }
    .faq-cat-card { padding: 18px; }
  }
</style>

<div class="faq-page">

  <!-- 10. HERO -->
  <section class="faq-hero">
    <div class="faq-hero-content" data-aos="fade-up">
      <div class="faq-badge">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
        GENI MENU HELP CENTER
      </div>
      <h1 class="faq-title">Everything You Need to Get More From Geni Menu.</h1>
      <p>Find answers to common questions, explore setup guidance and get help with your restaurant management system. Whether you're setting up your menu for the first time or looking for help with daily operations, start here.</p>
      
      <div class="faq-search-box">
        <svg class="faq-search-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
        <input type="text" class="faq-search-input" id="faqSearchInput" placeholder="Search for answers, setup guides and help topics...">
      </div>

      <div class="faq-hero-btns">
        <a href="{{ route('contact.us') }}" class="faq-btn faq-btn-primary">Contact Support &rarr;</a>
        <a href="#faqs" class="faq-btn faq-btn-outline">Explore FAQs &darr;</a>
      </div>
    </div>
  </section>

  <!-- 11. HELP CATEGORY GRID -->
  <section class="faq-section-alt">
    <div class="faq-section-inner">
      <div class="faq-section-header" data-aos="fade-up">
        <h2 class="faq-title">Find the Help You Need.</h2>
        <p>Browse help topics to find relevant answers and guidance for your restaurant's daily operations.</p>
      </div>
      <div class="faq-cat-grid">
        <div class="faq-cat-card" data-aos="fade-up" onclick="filterCategory('account')">
          <div class="faq-cat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg></div>
          <div>
            <h3 class="faq-title">Getting Started</h3>
            <p>Business setup, account access and configuration.</p>
          </div>
        </div>
        <div class="faq-cat-card" data-aos="fade-up" data-aos-delay="50" onclick="filterCategory('menu')">
          <div class="faq-cat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg></div>
          <div>
            <h3 class="faq-title">Menu & Products</h3>
            <p>Menu items, categories, prices, images and availability.</p>
          </div>
        </div>
        <div class="faq-cat-card" data-aos="fade-up" data-aos-delay="100" onclick="filterCategory('orders')">
          <div class="faq-cat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg></div>
          <div>
            <h3 class="faq-title">Orders & KOT</h3>
            <p>Order workflows, kitchen tickets and order status.</p>
          </div>
        </div>
        <div class="faq-cat-card" data-aos="fade-up" data-aos-delay="150" onclick="filterCategory('orders')">
          <div class="faq-cat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg></div>
          <div>
            <h3 class="faq-title">POS & Billing</h3>
            <p>Counter billing, payments and transaction management.</p>
          </div>
        </div>
        <div class="faq-cat-card" data-aos="fade-up" data-aos-delay="200" onclick="filterCategory('menu')">
          <div class="faq-cat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg></div>
          <div>
            <h3 class="faq-title">Tables & Res.</h3>
            <p>Table setup, status and reservation management.</p>
          </div>
        </div>
        <div class="faq-cat-card" data-aos="fade-up" data-aos-delay="250" onclick="filterCategory('inventory')">
          <div class="faq-cat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><polyline points="3.27 6.96 12 12.01 20.73 6.96"/><line x1="12" y1="22.08" x2="12" y2="12"/></svg></div>
          <div>
            <h3 class="faq-title">Inventory</h3>
            <p>Stock tracking, movement and stock updates.</p>
          </div>
        </div>
        <div class="faq-cat-card" data-aos="fade-up" data-aos-delay="300" onclick="filterCategory('general')">
          <div class="faq-cat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></div>
          <div>
            <h3 class="faq-title">Staff & Cust.</h3>
            <p>Staff access, customer info and team workflows.</p>
          </div>
        </div>
        <div class="faq-cat-card" data-aos="fade-up" data-aos-delay="350" onclick="filterCategory('inventory')">
          <div class="faq-cat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></div>
          <div>
            <h3 class="faq-title">Reports</h3>
            <p>Business reports, analytics and multi-branch.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 12. FREQUENTLY ASKED QUESTIONS -->
  <section class="faq-section" id="faqs">
    <div class="faq-section-header" data-aos="fade-up">
      <h2 class="faq-title">Frequently Asked Questions.</h2>
      <p>Find answers to common questions about Geni Menu, its features, setup and plans.</p>
    </div>
    
    <div class="faq-wrapper" data-aos="fade-up">
      <!-- Sidebar Tabs -->
      <div class="faq-sidebar">
        <button class="faq-tab active" onclick="filterCategory('all')">All Questions</button>
        <button class="faq-tab" onclick="filterCategory('general')">General</button>
        <button class="faq-tab" onclick="filterCategory('account')">Account & Setup</button>
        <button class="faq-tab" onclick="filterCategory('menu')">Menu & Experience</button>
        <button class="faq-tab" onclick="filterCategory('orders')">Orders, Kitchen & POS</button>
        <button class="faq-tab" onclick="filterCategory('inventory')">Inventory & Reports</button>
        <button class="faq-tab" onclick="filterCategory('pricing')">Pricing & Plans</button>
      </div>

      <!-- Content -->
      <div class="faq-content-area" id="faqAccordionContainer">
        <div class="faq-no-results" id="faqNoResults">
          No matching questions found. Try a different search term.
        </div>

        <!-- GENERAL -->
        <div class="faq-group" data-category="general">
          <h3 class="faq-group-title faq-title">General</h3>
          <div class="faq-accordion-item">
            <button class="faq-accordion-btn">What is Geni Menu? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
            <div class="faq-accordion-body"><div class="faq-accordion-inner">Geni Menu is a restaurant and food-business management platform that brings together menu management, orders, POS, kitchen operations, inventory, customers and reports.</div></div>
          </div>
          <div class="faq-accordion-item">
            <button class="faq-accordion-btn">Which businesses can use Geni Menu? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
            <div class="faq-accordion-body"><div class="faq-accordion-inner">Geni Menu is designed for restaurants, cafés, QSRs, bakeries, sweet shops, juice shops, tea shops, pizzerias, canteens and other food businesses.</div></div>
          </div>
          <div class="faq-accordion-item">
            <button class="faq-accordion-btn">Can I use Geni Menu for a small restaurant? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
            <div class="faq-accordion-body"><div class="faq-accordion-inner">Yes. Geni Menu offers plans for different business sizes and operational requirements. You can choose the features that suit your restaurant.</div></div>
          </div>
          <div class="faq-accordion-item">
            <button class="faq-accordion-btn">Does Geni Menu support multiple branches? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
            <div class="faq-accordion-body"><div class="faq-accordion-inner">Multi-branch capabilities are available in applicable plans. Contact the team to understand the setup for your business.</div></div>
          </div>
        </div>

        <!-- ACCOUNT & SETUP -->
        <div class="faq-group" data-category="account">
          <h3 class="faq-group-title faq-title">Account & Setup</h3>
          <div class="faq-accordion-item">
            <button class="faq-accordion-btn">How do I get started with Geni Menu? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
            <div class="faq-accordion-body"><div class="faq-accordion-inner">Choose a suitable plan or request a demo. The team can guide you through the setup process, including business details, menu configuration and relevant features.</div></div>
          </div>
          <div class="faq-accordion-item">
            <button class="faq-accordion-btn">Can I update my restaurant menu after setup? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
            <div class="faq-accordion-body"><div class="faq-accordion-inner">Yes. Menu management allows you to update menu items, categories, prices and availability.</div></div>
          </div>
          <div class="faq-accordion-item">
            <button class="faq-accordion-btn">Can multiple staff members use the system? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
            <div class="faq-accordion-body"><div class="faq-accordion-inner">Staff management and access capabilities are available according to your plan and configuration.</div></div>
          </div>
          <div class="faq-accordion-item">
            <button class="faq-accordion-btn">What should I do if I cannot log in? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
            <div class="faq-accordion-body"><div class="faq-accordion-inner">Check that you are using the correct login details and account. If you still cannot access your account, contact the Geni Menu support team.</div></div>
          </div>
        </div>

        <!-- MENU & EXPERIENCE -->
        <div class="faq-group" data-category="menu">
          <h3 class="faq-group-title faq-title">Menu & Customer Experience</h3>
          <div class="faq-accordion-item">
            <button class="faq-accordion-btn">Can I add images to menu items? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
            <div class="faq-accordion-body"><div class="faq-accordion-inner">Geni Menu supports menu item information and images where enabled in your configuration.</div></div>
          </div>
          <div class="faq-accordion-item">
            <button class="faq-accordion-btn">Can I mark an item as unavailable? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
            <div class="faq-accordion-body"><div class="faq-accordion-inner">Menu availability can be managed so your team can reflect changes to the items offered.</div></div>
          </div>
          <div class="faq-accordion-item">
            <button class="faq-accordion-btn">Does Geni Menu support QR menus? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
            <div class="faq-accordion-body"><div class="faq-accordion-inner">Geni Menu supports digital menu experiences, including QR menu capabilities where included in your setup.</div></div>
          </div>
          <div class="faq-accordion-item">
            <button class="faq-accordion-btn">Can customers place orders through the menu? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
            <div class="faq-accordion-body"><div class="faq-accordion-inner">Online or QR-based ordering depends on the features enabled for your business. Contact the team to confirm the options available in your plan.</div></div>
          </div>
        </div>

        <!-- ORDERS, KITCHEN & BILLING -->
        <div class="faq-group" data-category="orders">
          <h3 class="faq-group-title faq-title">Orders, Kitchen & Billing</h3>
          <div class="faq-accordion-item">
            <button class="faq-accordion-btn">Can I manage dine-in and takeaway orders? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
            <div class="faq-accordion-body"><div class="faq-accordion-inner">Geni Menu supports restaurant order workflows for applicable service types, including dine-in and takeaway.</div></div>
          </div>
          <div class="faq-accordion-item">
            <button class="faq-accordion-btn">What is KOT management? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
            <div class="faq-accordion-body"><div class="faq-accordion-inner">KOT, or Kitchen Order Ticket, helps communicate order details from the order workflow to the kitchen team.</div></div>
          </div>
          <div class="faq-accordion-item">
            <button class="faq-accordion-btn">Can I manage orders from the POS? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
            <div class="faq-accordion-body"><div class="faq-accordion-inner">The POS and order management features work together to support restaurant billing and order handling, depending on your configuration.</div></div>
          </div>
          <div class="faq-accordion-item">
            <button class="faq-accordion-btn">Does Geni Menu support online payment gateways? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
            <div class="faq-accordion-body"><div class="faq-accordion-inner">Payment gateway integration is available in selected plans and configurations.</div></div>
          </div>
        </div>

        <!-- INVENTORY & REPORTS -->
        <div class="faq-group" data-category="inventory">
          <h3 class="faq-group-title faq-title">Inventory & Reports</h3>
          <div class="faq-accordion-item">
            <button class="faq-accordion-btn">Can I track my restaurant inventory? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
            <div class="faq-accordion-body"><div class="faq-accordion-inner">Inventory management is available in selected plans. It helps businesses monitor stock and inventory activity.</div></div>
          </div>
          <div class="faq-accordion-item">
            <button class="faq-accordion-btn">Can I see my daily sales? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
            <div class="faq-accordion-body"><div class="faq-accordion-inner">Geni Menu reports provide business information such as sales and order activity, depending on the reports enabled in your plan.</div></div>
          </div>
          <div class="faq-accordion-item">
            <button class="faq-accordion-btn">Can I export reports? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
            <div class="faq-accordion-body"><div class="faq-accordion-inner">Export reports are available in applicable plans and configurations.</div></div>
          </div>
        </div>

        <!-- PRICING & PLANS -->
        <div class="faq-group" data-category="pricing">
          <h3 class="faq-group-title faq-title">Pricing & Plans</h3>
          <div class="faq-accordion-item">
            <button class="faq-accordion-btn">What plans are available? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
            <div class="faq-accordion-body"><div class="faq-accordion-inner">Geni Menu offers Standard, Premium and Enterprise plans, with pricing and included features varying by business type.</div></div>
          </div>
          <div class="faq-accordion-item">
            <button class="faq-accordion-btn">Can I change my plan later? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
            <div class="faq-accordion-body"><div class="faq-accordion-inner">You can discuss upgrading your plan as your business requirements change.</div></div>
          </div>
          <div class="faq-accordion-item">
            <button class="faq-accordion-btn">Are monthly and yearly plans available? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
            <div class="faq-accordion-body"><div class="faq-accordion-inner">Monthly and yearly pricing options are available for applicable plans.</div></div>
          </div>
          <div class="faq-accordion-item">
            <button class="faq-accordion-btn">How do I find the right plan? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
            <div class="faq-accordion-body"><div class="faq-accordion-inner">Compare the available plans and included features or contact the sales team for guidance based on your restaurant's needs.</div></div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- 13. SETUP & HARDWARE GUIDANCE -->
  <section class="faq-section-alt">
    <div class="faq-section-inner">
      <div class="faq-section-header" data-aos="fade-up">
        <h2 class="faq-title">Need Help With Your Restaurant Setup?</h2>
        <p>Explore guidance for configuring your restaurant and using supported equipment.</p>
      </div>
      <div class="faq-guide-grid">
        <div class="faq-guide-card" data-aos="fade-up">
          <div class="faq-guide-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg></div>
          <h3 class="faq-title">POS & Counter Setup</h3>
          <p>Learn about setting up your billing workflow and preparing your counter.</p>
          <a href="{{ route('contact.us') }}" class="faq-guide-link">Read Guide &rarr;</a>
        </div>
        <div class="faq-guide-card" data-aos="fade-up" data-aos-delay="50">
          <div class="faq-guide-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 6 2 18 2 18 9"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect x="6" y="14" width="12" height="8"/></svg></div>
          <h3 class="faq-title">Printer & KOT Setup</h3>
          <p>Find guidance for supported printer configurations and kitchen workflows.</p>
          <a href="{{ route('contact.us') }}" class="faq-guide-link">Read Guide &rarr;</a>
        </div>
        <div class="faq-guide-card" data-aos="fade-up" data-aos-delay="100">
          <div class="faq-guide-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="4" y="2" width="16" height="20" rx="2" ry="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg></div>
          <h3 class="faq-title">Tablet & Device Setup</h3>
          <p>Understand how to prepare compatible devices for restaurant operations.</p>
          <a href="{{ route('contact.us') }}" class="faq-guide-link">Read Guide &rarr;</a>
        </div>
        <div class="faq-guide-card" data-aos="fade-up" data-aos-delay="150">
          <div class="faq-guide-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12.55a11 11 0 0 1 14.08 0"/><path d="M1.42 9a16 16 0 0 1 21.16 0"/><path d="M8.53 16.11a6 6 0 0 1 6.95 0"/><line x1="12" y1="20" x2="12.01" y2="20"/></svg></div>
          <h3 class="faq-title">Network & Connectivity</h3>
          <p>Review basic connectivity checks for your restaurant's supported devices.</p>
          <a href="{{ route('contact.us') }}" class="faq-guide-link">Read Guide &rarr;</a>
        </div>
      </div>
    </div>
  </section>

  <!-- 14. TROUBLESHOOTING -->
  <section class="faq-section">
    <div class="faq-section-header" data-aos="fade-up">
      <h2 class="faq-title">Quick Checks for Common Issues.</h2>
      <p>Start with these basic checks for common product and setup questions.</p>
    </div>
    
    <div class="faq-content-area" style="max-width:800px; margin:0 auto;" data-aos="fade-up">
      <div class="faq-accordion-item">
        <button class="faq-accordion-btn">I cannot see a new order. What should I check? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
        <div class="faq-accordion-body">
          <div class="faq-accordion-inner">
            <ul style="margin:0; padding-left:20px; color:var(--text-main);">
              <li style="margin-bottom:8px">Confirm the order was submitted successfully.</li>
              <li style="margin-bottom:8px">Check the relevant order view and filters.</li>
              <li style="margin-bottom:8px">Verify your account access and enabled order workflow.</li>
              <li>Contact support if the order is still missing.</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="faq-accordion-item">
        <button class="faq-accordion-btn">My menu changes are not visible. What should I do? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
        <div class="faq-accordion-body">
          <div class="faq-accordion-inner">
            <ul style="margin:0; padding-left:20px; color:var(--text-main);">
              <li style="margin-bottom:8px">Confirm that the changes were saved.</li>
              <li style="margin-bottom:8px">Check the item or category availability.</li>
              <li style="margin-bottom:8px">Refresh the relevant menu view.</li>
              <li>Contact support if the issue continues.</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="faq-accordion-item">
        <button class="faq-accordion-btn">My printer is not working. What should I check? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
        <div class="faq-accordion-body">
          <div class="faq-accordion-inner">
            <ul style="margin:0; padding-left:20px; color:var(--text-main);">
              <li style="margin-bottom:8px">Confirm the printer is powered on and connected.</li>
              <li style="margin-bottom:8px">Check the device and printer configuration.</li>
              <li style="margin-bottom:8px">Review the supported printer setup instructions.</li>
              <li>Contact support if the issue remains unresolved.</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="faq-accordion-item">
        <button class="faq-accordion-btn">I cannot access a feature. Why? <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
        <div class="faq-accordion-body">
          <div class="faq-accordion-inner">
            <ul style="margin:0; padding-left:20px; color:var(--text-main);">
              <li style="margin-bottom:8px">Check whether the feature is included in your current plan.</li>
              <li style="margin-bottom:8px">Confirm that your account has the required access.</li>
              <li>Contact your administrator or support team for assistance.</li>
            </ul>
          </div>
        </div>
      </div>
      <p style="text-align:center; font-size:14px; color:var(--text-muted); margin-top:20px; font-style:italic;">These are general troubleshooting checks. Follow the product-specific instructions provided for your configuration.</p>
    </div>
  </section>

  <!-- 15. CONTACT SUPPORT -->
  <section class="faq-section-alt">
    <div class="faq-section-inner">
      <div class="faq-section-header" data-aos="fade-up">
        <h2 class="faq-title">Still Need Help?</h2>
        <p>If you can't find the answer you're looking for, reach out to the Geni Menu team for help with setup, product questions or technical issues.</p>
      </div>
      <div class="faq-support-grid">
        <div class="faq-support-card" data-aos="fade-right">
          <div class="faq-support-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg></div>
          <div>
            <div style="font-size:13px; font-weight:700; color:var(--text-muted); text-transform:uppercase; letter-spacing:0.05em; margin-bottom:8px;">Contact Support</div>
            <h3 class="faq-title">Get the Help You Need</h3>
            <p>Get assistance with your existing Geni Menu setup and product-related questions.</p>
            <a href="{{ route('contact.us') }}" class="faq-btn faq-btn-primary">Contact Support &rarr;</a>
          </div>
        </div>
        <div class="faq-support-card" data-aos="fade-left">
          <div class="faq-support-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg></div>
          <div>
            <div style="font-size:13px; font-weight:700; color:var(--text-muted); text-transform:uppercase; letter-spacing:0.05em; margin-bottom:8px;">Book A Demo</div>
            <h3 class="faq-title">See Geni Menu in Action</h3>
            <p>Explore Geni Menu with a guided product walkthrough and discuss your business requirements.</p>
            <a href="{{ route('contact.us') }}" class="faq-btn faq-btn-outline">Book a Demo &rarr;</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 16. FINAL CTA -->
  <section class="faq-section">
    <div class="faq-cta-box" data-aos="fade-up">
      <h2 class="faq-title">Make Restaurant Management Easier With Geni Menu.</h2>
      <p>From your first menu setup to everyday restaurant operations, find the tools and support you need to move forward.</p>
      <div class="faq-hero-btns" style="margin-top:0;">
        <a href="{{ route('features') }}" class="faq-btn faq-btn-primary" style="background:#fff; color:var(--br);">Explore Features &rarr;</a>
        <a href="{{ route('contact.us') }}" class="faq-btn faq-btn-outline" style="color:#fff; border-color:rgba(255,255,255,0.4);">Contact Our Team &rarr;</a>
      </div>
    </div>
  </section>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
  AOS.init({ duration: 800, once: true, offset: 50 });

  // Accordion Logic
  const accBtns = document.querySelectorAll('.faq-accordion-btn');
  accBtns.forEach(btn => {
    btn.addEventListener('click', function() {
      const item = this.parentElement;
      const body = this.nextElementSibling;
      
      // Close others in same group
      const siblings = item.parentElement.querySelectorAll('.faq-accordion-item');
      siblings.forEach(sib => {
        if (sib !== item) {
          sib.classList.remove('active');
          sib.querySelector('.faq-accordion-body').style.maxHeight = null;
        }
      });

      if (item.classList.contains('active')) {
        item.classList.remove('active');
        body.style.maxHeight = null;
      } else {
        item.classList.add('active');
        body.style.maxHeight = body.scrollHeight + "px";
      }
    });
  });

  // Filter Categories
  const tabs = document.querySelectorAll('.faq-tab');
  const groups = document.querySelectorAll('.faq-group');
  const noResults = document.getElementById('faqNoResults');

  function filterCategory(cat) {
    // Scroll to FAQs if clicked from grid
    const faqSection = document.getElementById('faqs');
    const y = faqSection.getBoundingClientRect().top + window.scrollY - 100;
    window.scrollTo({top: y, behavior: 'smooth'});

    tabs.forEach(t => t.classList.remove('active'));
    
    // Find tab and activate
    const targetTab = Array.from(tabs).find(t => 
      (cat === 'all' && t.innerText === 'All Questions') || 
      t.innerText.toLowerCase().includes(cat) ||
      (cat === 'orders' && t.innerText.includes('POS'))
    );
    if(targetTab) targetTab.classList.add('active');

    groups.forEach(g => {
      if (cat === 'all' || g.getAttribute('data-category') === cat) {
        g.style.display = 'block';
        // Reset search visibility
        g.querySelectorAll('.faq-accordion-item').forEach(i => i.style.display = 'block');
      } else {
        g.style.display = 'none';
      }
    });
    
    // Reset Search
    document.getElementById('faqSearchInput').value = '';
    noResults.style.display = 'none';
  }

  // Search functionality
  const searchInput = document.getElementById('faqSearchInput');
  searchInput.addEventListener('input', function(e) {
    const term = e.target.value.toLowerCase();
    let hasResults = false;
    
    // Reset tabs to All Questions when searching
    tabs.forEach(t => t.classList.remove('active'));
    tabs[0].classList.add('active');

    groups.forEach(group => {
      let groupHasResults = false;
      group.style.display = 'block';
      
      const items = group.querySelectorAll('.faq-accordion-item');
      items.forEach(item => {
        const text = item.innerText.toLowerCase();
        if (text.includes(term)) {
          item.style.display = 'block';
          groupHasResults = true;
          hasResults = true;
        } else {
          item.style.display = 'none';
        }
      });
      
      if (!groupHasResults) {
        group.style.display = 'none';
      }
    });

    noResults.style.display = hasResults ? 'none' : 'block';
  });
</script>
@endsection
