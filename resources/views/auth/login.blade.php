<x-auth-layout>
<style>
  :root {
    --brand-primary: #876039;
    --brand-primary-hover: #6f4e2d;
    --brand-cream: #F8F5EF;
    --brand-ink: #21160F;
    --brand-mute: #6E6157;
    --brand-border: #E8DFD5;
  }

  .login-split-page {
    min-height: 100vh;
    display: flex;
    background: #FFFFFF;
    font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
    color: var(--brand-ink);
  }

  /* ---------------- LEFT VISUAL PANEL ---------------- */
  .login-visual-panel {
    flex: 0 0 46%;
    position: relative;
    background: #1F1610;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding: 48px;
    color: #FFFFFF;
  }

  .login-visual-bg {
    position: absolute;
    inset: 0;
    background-image: url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?q=80&w=1400&auto=format&fit=crop');
    background-size: cover;
    background-position: center;
    transform: scale(1.04);
    filter: brightness(0.72) saturate(1.1);
  }

  .login-visual-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(145deg, rgba(30, 20, 14, 0.82) 0%, rgba(135, 96, 57, 0.72) 100%);
    backdrop-filter: blur(2px);
  }

  .login-visual-content {
    position: relative;
    z-index: 2;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }

  .login-visual-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 6px 14px;
    background: rgba(255, 255, 255, 0.12);
    border: 1px solid rgba(255, 255, 255, 0.22);
    border-radius: 9999px;
    font-size: 11.5px;
    font-weight: 600;
    letter-spacing: 0.6px;
    text-transform: uppercase;
    color: #FAF4ED;
    backdrop-filter: blur(8px);
    width: fit-content;
  }

  .login-visual-badge-dot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: #10B981;
    box-shadow: 0 0 8px #10B981;
  }

  /* Floating Metric Cards Mockup */
  .login-metrics-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 16px;
    margin: auto 0;
    max-width: 440px;
  }

  .login-metric-card {
    background: rgba(255, 255, 255, 0.12);
    backdrop-filter: blur(14px);
    -webkit-backdrop-filter: blur(14px);
    border: 1px solid rgba(255, 255, 255, 0.22);
    border-radius: 18px;
    padding: 16px 18px;
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.2);
    transition: transform 0.25s ease, background 0.25s ease;
  }

  .login-metric-card:hover {
    transform: translateY(-3px);
    background: rgba(255, 255, 255, 0.18);
  }

  .login-metric-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 8px;
  }

  .login-metric-label {
    font-size: 11px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    color: rgba(255, 255, 255, 0.78);
  }

  .login-metric-icon {
    width: 26px;
    height: 26px;
    border-radius: 8px;
    background: rgba(255, 255, 255, 0.16);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #FFFFFF;
  }

  .login-metric-icon svg {
    width: 14px;
    height: 14px;
  }

  .login-metric-val {
    font-size: 24px;
    font-weight: 600;
    color: #FFFFFF;
    line-height: 1.15;
    margin-bottom: 4px;
  }

  .login-metric-sub {
    font-size: 11.5px;
    color: rgba(255, 255, 255, 0.78);
    display: flex;
    align-items: center;
    gap: 4px;
  }

  .login-metric-pill {
    background: rgba(16, 185, 129, 0.22);
    color: #34D399;
    padding: 2px 6px;
    border-radius: 6px;
    font-size: 10.5px;
    font-weight: 600;
  }

  .login-visual-footer {
    border-top: 1px solid rgba(255, 255, 255, 0.16);
    padding-top: 24px;
  }

  .login-visual-quote {
    font-size: 15px;
    line-height: 1.5;
    color: #FAF4ED;
    margin: 0 0 6px;
    font-weight: 500;
  }

  .login-visual-cite {
    font-size: 12px;
    color: rgba(255, 255, 255, 0.65);
  }

  /* ---------------- RIGHT FORM PANEL ---------------- */
  .login-form-panel {
    flex: 1 1 54%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding: 40px 48px;
    background: #FFFFFF;
    overflow-y: auto;
  }

  .login-panel-inner {
    max-width: 440px;
    width: 100%;
    margin: auto;
    padding: 20px 0;
  }

  .login-brand-logo {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    text-decoration: none;
    margin-bottom: 28px;
  }

  .login-brand-logo img {
    height: 48px;
    width: auto;
    object-fit: contain;
    flex-shrink: 0;
  }

  .login-brand-text {
    display: flex;
    flex-direction: column;
    line-height: 1.15;
  }

  .login-brand-name {
    font-family: 'Outfit', 'Plus Jakarta Sans', sans-serif;
    font-size: 22px;
    font-weight: 600;
    color: #21160F;
    letter-spacing: -0.3px;
  }

  .login-brand-name span {
    color: #876039;
  }

  .login-brand-tagline {
    font-size: 10px;
    font-weight: 700;
    color: #8B8177;
    letter-spacing: 0.6px;
    text-transform: uppercase;
    margin-top: 1px;
  }

  .login-heading-area {
    margin-bottom: 28px;
  }

  .login-title {
    font-family: 'Outfit', 'Plus Jakarta Sans', sans-serif;
    font-size: 30px;
    font-weight: 600;
    color: #21160F;
    letter-spacing: -0.4px;
    line-height: 1.2;
    margin: 0 0 8px;
  }

  .login-subtitle {
    font-size: 14px;
    color: #6E6157;
    line-height: 1.55;
    margin: 0;
  }

  .login-subtitle strong {
    color: #21160F;
    font-weight: 600;
  }

  /* Error / Status Alert */
  .login-alert-box {
    background: #FEF2F2;
    border: 1px solid #FCA5A5;
    border-radius: 12px;
    padding: 12px 16px;
    margin-bottom: 22px;
    display: flex;
    align-items: flex-start;
    gap: 10px;
    font-size: 13.5px;
    color: #991B1B;
  }

  .login-alert-box svg {
    width: 18px;
    height: 18px;
    flex-shrink: 0;
    margin-top: 1px;
  }

  .login-status-box {
    background: #ECFDF5;
    border: 1px solid #A7F3D0;
    border-radius: 12px;
    padding: 12px 16px;
    margin-bottom: 22px;
    font-size: 13.5px;
    color: #065F46;
  }

  /* Field Groups */
  .login-field {
    margin-bottom: 20px;
  }

  .login-field label {
    display: block;
    font-size: 13px;
    font-weight: 600;
    color: #21160F;
    margin-bottom: 7px;
  }

  .login-input-wrap {
    position: relative;
    display: flex;
    align-items: center;
  }

  .login-input-icon {
    position: absolute;
    left: 14px;
    color: #9C8E82;
    pointer-events: none;
    width: 18px;
    height: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .login-input {
    width: 100%;
    height: 48px;
    padding: 0 16px 0 44px;
    background: #FFFFFF;
    border: 1.5px solid var(--brand-border);
    border-radius: 12px;
    font-size: 14.5px;
    color: #21160F;
    outline: none;
    transition: all 0.2s ease;
    font-family: inherit;
  }

  .login-input::placeholder {
    color: #9C8E82;
  }

  .login-input:focus {
    border-color: var(--brand-primary);
    box-shadow: 0 0 0 3px rgba(135, 96, 57, 0.15);
  }

  .login-input.has-error {
    border-color: #EF4444;
  }

  /* Password eye toggle */
  .login-pw-toggle {
    position: absolute;
    right: 12px;
    background: transparent;
    border: none;
    padding: 6px;
    cursor: pointer;
    color: #8C7C71;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 6px;
    transition: color 0.18s;
  }

  .login-pw-toggle:hover {
    color: var(--brand-primary);
  }

  .login-pw-toggle svg {
    width: 18px;
    height: 18px;
  }

  /* Remember & Forgot row */
  .login-options-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 24px;
    font-size: 13.5px;
  }

  .login-remember-label {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: #6E6157;
    cursor: pointer;
    user-select: none;
  }

  .login-checkbox {
    width: 17px;
    height: 17px;
    border-radius: 5px;
    border: 1.5px solid var(--brand-border);
    accent-color: var(--brand-primary);
    cursor: pointer;
  }

  .login-forgot-link {
    color: var(--brand-primary);
    font-weight: 600;
    text-decoration: none;
    transition: color 0.18s;
  }

  .login-forgot-link:hover {
    color: var(--brand-primary-hover);
    text-decoration: underline;
  }

  /* Primary Button */
  .login-submit-btn {
    width: 100%;
    height: 50px;
    background: var(--brand-primary);
    color: #FFFFFF;
    border: none;
    border-radius: 12px;
    font-size: 15px;
    font-weight: 600;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    transition: all 0.2s ease;
    box-shadow: 0 4px 14px rgba(135, 96, 57, 0.25);
    font-family: inherit;
  }

  .login-submit-btn:hover:not(:disabled) {
    background: var(--brand-primary-hover);
    transform: translateY(-1px);
    box-shadow: 0 6px 18px rgba(135, 96, 57, 0.35);
  }

  .login-submit-btn:active:not(:disabled) {
    transform: translateY(0);
  }

  .login-submit-btn:disabled {
    opacity: 0.65;
    cursor: not-allowed;
  }

  /* Create Account link */
  .login-register-prompt {
    margin-top: 22px;
    text-align: center;
    font-size: 14px;
    color: #6E6157;
  }

  .login-register-link {
    color: var(--brand-primary);
    font-weight: 600;
    text-decoration: none;
    margin-left: 4px;
    transition: color 0.18s;
  }

  .login-register-link:hover {
    color: var(--brand-primary-hover);
    text-decoration: underline;
  }

  /* Home Link */
  .login-home-row {
    margin-top: 18px;
    text-align: center;
  }

  .login-home-link {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 13px;
    font-weight: 500;
    color: #8C7C71;
    text-decoration: none;
    transition: color 0.18s;
  }

  .login-home-link:hover {
    color: var(--brand-primary);
  }

  /* Trust Message */
  .login-trust-card {
    margin-top: 26px;
    padding: 12px 14px;
    background: var(--brand-cream);
    border: 1px solid rgba(135, 96, 57, 0.14);
    border-radius: 10px;
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 12px;
    color: #6E6157;
    line-height: 1.45;
  }

  .login-trust-icon {
    width: 22px;
    height: 22px;
    color: var(--brand-primary);
    flex-shrink: 0;
  }

  /* Minimal Footer */
  .login-panel-footer {
    margin-top: 32px;
    padding-top: 20px;
    border-top: 1px solid #F1E9DF;
    display: flex;
    align-items: center;
    justify-content: space-between;
    font-size: 12px;
    color: #8C7C71;
    flex-wrap: wrap;
    gap: 10px;
  }

  .login-footer-links {
    display: flex;
    gap: 14px;
  }

  .login-footer-links a {
    color: #8C7C71;
    text-decoration: none;
  }

  .login-footer-links a:hover {
    color: var(--brand-primary);
  }

  /* ---------------- RESPONSIVE STYLES ---------------- */
  @media (max-width: 1024px) {
    .login-visual-panel {
      flex: 0 0 40%;
      padding: 36px;
    }
    .login-metrics-grid {
      grid-template-columns: 1fr;
      gap: 12px;
    }
    .login-form-panel {
      padding: 32px 32px;
    }
  }

  @media (max-width: 860px) {
    .login-split-page {
      flex-direction: column;
    }
    .login-visual-panel {
      display: none; /* Mobile prioritize login form */
    }
    .login-form-panel {
      flex: 1 1 auto;
      padding: 40px 20px;
      min-height: 100vh;
    }
    .login-panel-inner {
      padding: 10px 0;
    }
    .login-mobile-banner {
      display: flex !important;
      align-items: center;
      gap: 12px;
      padding: 14px;
      background: var(--brand-cream);
      border: 1px solid rgba(135, 96, 57, 0.16);
      border-radius: 12px;
      margin-top: 24px;
      font-size: 12.5px;
      color: #6E6157;
    }
  }
</style>

<div class="login-split-page">

  {{-- 1. LEFT VISUAL PANEL (Restaurant Management Showcase) --}}
  <div class="login-visual-panel">
    <div class="login-visual-bg"></div>
    <div class="login-visual-overlay"></div>

    <div class="login-visual-content">
      {{-- Top Header Pill --}}
      <div>
        <div class="login-visual-badge">
          <span class="login-visual-badge-dot"></span>
          <span>RESTAURANT MANAGEMENT PLATFORM</span>
        </div>
      </div>

      {{-- Center Floating UI Metrics Cards --}}
      <div class="login-metrics-grid">
        {{-- Card 1: Sales --}}
        <div class="login-metric-card">
          <div class="login-metric-header">
            <span class="login-metric-label">TODAY'S SALES</span>
            <div class="login-metric-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
            </div>
          </div>
          <div class="login-metric-val">&#8377;48,650</div>
          <div class="login-metric-sub">
            <span class="login-metric-pill">&uarr; 12.4%</span>
            <span>vs yesterday</span>
          </div>
        </div>

        {{-- Card 2: Orders --}}
        <div class="login-metric-card">
          <div class="login-metric-header">
            <span class="login-metric-label">LIVE ORDERS</span>
            <div class="login-metric-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"/><rect x="9" y="3" width="6" height="4" rx="1"/><path d="M9 12l2 2 4-4"/></svg>
            </div>
          </div>
          <div class="login-metric-val">94</div>
          <div class="login-metric-sub">
            <span>42 Dine-in &bull; 52 Takeaway</span>
          </div>
        </div>

        {{-- Card 3: Tables --}}
        <div class="login-metric-card">
          <div class="login-metric-header">
            <span class="login-metric-label">ACTIVE TABLES</span>
            <div class="login-metric-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 9h16M5 9v10M19 9v10M9 9V5h6v4M7 15h10"/></svg>
            </div>
          </div>
          <div class="login-metric-val">18 / 24</div>
          <div class="login-metric-sub">
            <span class="login-metric-pill" style="background:rgba(234,179,8,0.22); color:#FCD34D;">75% Occupied</span>
          </div>
        </div>

        {{-- Card 4: Kitchen KOT --}}
        <div class="login-metric-card">
          <div class="login-metric-header">
            <span class="login-metric-label">KITCHEN KOT</span>
            <div class="login-metric-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 13.8A6 6 0 0112 4a6 6 0 016 9.8V17H6v-3.2zM4 17h16v3H4zM12 4V2"/></svg>
            </div>
          </div>
          <div class="login-metric-val">12 Active</div>
          <div class="login-metric-sub">
            <span>Avg preparation: 14 mins</span>
          </div>
        </div>
      </div>

      {{-- Bottom Quote / Message --}}
      <div class="login-visual-footer">
        <p class="login-visual-quote">&ldquo;Everything connected. From customer orders to kitchen screens, inventory and instant billing.&rdquo;</p>
        <span class="login-visual-cite">Powering restaurants, bakeries, cafés &amp; cloud kitchens across India.</span>
      </div>
    </div>
  </div>

  {{-- 2. RIGHT FORM PANEL --}}
  <div class="login-form-panel">
    <div class="login-panel-inner">

      {{-- Logo --}}
      <a href="{{ url('/') }}" class="login-brand-logo" title="Geni Menu">
        <img src="https://menu.wegeni.com/user-uploads/logo/22afe8e48716500b5a2730bca0ede64a.png"
             onerror="this.src='{{ asset('assets/images/geni-menu-logo-light.png') }}'"
             alt="Geni Menu Logo">
        <span class="login-brand-text">
          <span class="login-brand-name">Geni <span>Menu</span></span>
        </span>
      </a>

      {{-- Heading Area --}}
      <div class="login-heading-area">
        <h1 class="login-title">Welcome Back!</h1>
        <p class="login-subtitle">
          <strong>Let’s get your restaurant moving again.</strong><br>
          Good to see you again. Sign in and get back to managing your business with ease.
        </p>
      </div>

      {{-- Inline Error Message State --}}
      @if (isset($errors) && $errors->any())
        <div class="login-alert-box">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
          <div>
            <strong>Unable to sign in</strong><br>
            <span>The email or password you entered is incorrect. Please check your details and try again.</span>
          </div>
        </div>
      @endif

      {{-- Session Status --}}
      @session('status')
        <div class="login-status-box">
          {{ $value }}
        </div>
      @endsession

      {{-- Login Form --}}
      <form method="POST" action="{{ route('login') }}" id="loginForm">
        @csrf

        {{-- Email Field --}}
        <div class="login-field">
          <label for="email">Email Address</label>
          <div class="login-input-wrap">
            <span class="login-input-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="16" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
            </span>
            <input id="email"
                   class="login-input @error('email') has-error @enderror"
                   type="email"
                   name="email"
                   value="{{ old('email') }}"
                   placeholder="Enter your email"
                   required
                   autofocus
                   autocomplete="username">
          </div>
        </div>

        {{-- Password Field --}}
        <div class="login-field">
          <label for="password">Password</label>
          <div class="login-input-wrap">
            <span class="login-input-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
            </span>
            <input id="password"
                   class="login-input @error('password') has-error @enderror"
                   type="password"
                   name="password"
                   placeholder="Enter your password"
                   required
                   autocomplete="current-password">
            <button type="button"
                    class="login-pw-toggle"
                    id="togglePasswordBtn"
                    aria-label="Toggle password visibility">
              <svg id="pwEyeIcon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
              <svg id="pwEyeOffIcon" style="display:none;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/></svg>
            </button>
          </div>
        </div>

        {{-- Remember Me & Forgot Password --}}
        <div class="login-options-row">
          <label for="remember_me" class="login-remember-label">
            <input type="checkbox" id="remember_me" name="remember" class="login-checkbox">
            <span>Remember me</span>
          </label>

          <a href="{{ route('password.request') }}" class="login-forgot-link">
            Forgot your password?
          </a>
        </div>

        {{-- Submit Button --}}
        <button type="submit" class="login-submit-btn" id="loginSubmitBtn">
          <span id="btnText">Login &rarr;</span>
          <span id="btnLoading" style="display:none; align-items:center; gap:8px;">
            <svg class="animate-spin" style="width:16px; height:16px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
              <circle cx="12" cy="12" r="10" stroke-opacity="0.25"></circle>
              <path d="M12 2a10 10 0 0 1 10 10" stroke-linecap="round"></path>
            </svg>
            <span>Signing in...</span>
          </span>
        </button>

        {{-- Create Account Link --}}
        <div class="login-register-prompt">
          <span>Are you new here?</span>
          <a href="{{ route('restaurant_signup') }}" class="login-register-link">Create an account &rarr;</a>
        </div>

        {{-- Back to Home --}}
        <div class="login-home-row">
          <a href="{{ url('/') }}" class="login-home-link">
            &larr; Go To Home
          </a>
        </div>

        {{-- Mobile Banner Visual --}}
        <div class="login-mobile-banner" style="display:none;">
          <div style="width:32px;height:32px;flex-shrink:0;">
            <svg viewBox="0 0 24 24" fill="none" stroke="#876039" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" style="width:32px;height:32px;">
              <path d="M3 11l1.5-7h15L21 11"/><rect x="2" y="11" width="20" height="4" rx="1"/><path d="M6 15v6M18 15v6M3 21h18M9 7h6M9 4h6"/>
            </svg>
          </div>
          <div>
            <strong style="color:#21160F;">Geni Menu Restaurant OS</strong><br>
            <span>Managing orders, kitchen KOT, tables &amp; billing in one place.</span>
          </div>
        </div>

        {{-- Product Trust Message --}}
        <div class="login-trust-card">
          <svg class="login-trust-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/></svg>
          <span>Manage your menu, orders, POS, kitchen, inventory and reports &mdash; all from one platform.</span>
        </div>

      </form>
    </div>

    {{-- Minimal Footer --}}
    <div class="login-panel-footer">
      <span>&copy; {{ date('Y') }} Geni Menu. All rights reserved.</span>
      <div class="login-footer-links">
        <a href="{{ Route::has('privacy.policy') ? route('privacy.policy') : (Route::has('privacy-and-policy') ? route('privacy-and-policy') : url('/privacy-policy')) }}">Privacy Policy</a>
        <span>&bull;</span>
        <a href="{{ Route::has('terms.conditions') ? route('terms.conditions') : (Route::has('terms-and-conditions') ? route('terms-and-conditions') : url('/terms-and-conditions')) }}">Terms &amp; Conditions</a>
      </div>
    </div>
  </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  // 1. Password Visibility Toggle
  var pwInput = document.getElementById('password');
  var toggleBtn = document.getElementById('togglePasswordBtn');
  var eyeIcon = document.getElementById('pwEyeIcon');
  var eyeOffIcon = document.getElementById('pwEyeOffIcon');

  if (toggleBtn && pwInput) {
    toggleBtn.addEventListener('click', function() {
      if (pwInput.type === 'password') {
        pwInput.type = 'text';
        eyeIcon.style.display = 'none';
        eyeOffIcon.style.display = 'block';
      } else {
        pwInput.type = 'password';
        eyeIcon.style.display = 'block';
        eyeOffIcon.style.display = 'none';
      }
    });
  }

  // 2. Form Submit Loading State & Duplicate Prevention
  var loginForm = document.getElementById('loginForm');
  var submitBtn = document.getElementById('loginSubmitBtn');
  var btnText = document.getElementById('btnText');
  var btnLoading = document.getElementById('btnLoading');

  if (loginForm && submitBtn) {
    loginForm.addEventListener('submit', function(e) {
      var emailField = document.getElementById('email');
      var pwField = document.getElementById('password');

      if (emailField.value && pwField.value) {
        submitBtn.disabled = true;
        btnText.style.display = 'none';
        btnLoading.style.display = 'inline-flex';
      }
    });
  }
});
</script>
</x-auth-layout>
