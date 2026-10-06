<x-auth-layout>
<style>
  :root {
    --brand-primary: #876039;
    --brand-primary-hover: #6f4e2d;
    --brand-cream: #F8F5EF;
    --brand-cream-light: #FAF4ED;
    --brand-ink: #21160F;
    --brand-mute: #6E6157;
    --brand-border: #E8DFD5;
  }

  .signup-split-page {
    min-height: 100vh;
    display: flex;
    background: #FFFFFF;
    font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
    color: var(--brand-ink);
  }

  /* ---------------- LEFT VISUAL PANEL ---------------- */
  .signup-visual-panel {
    flex: 0 0 45%;
    position: relative;
    background: #1F1610;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding: 48px;
    color: #FFFFFF;
  }

  .signup-visual-bg {
    position: absolute;
    inset: 0;
    background-image: url('https://images.unsplash.com/photo-1555396273-367ea4eb4db5?q=80&w=1400&auto=format&fit=crop');
    background-size: cover;
    background-position: center;
    transform: scale(1.04);
    filter: brightness(0.68) saturate(1.15);
  }

  .signup-visual-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(145deg, rgba(30, 20, 14, 0.85) 0%, rgba(135, 96, 57, 0.72) 100%);
    backdrop-filter: blur(2px);
  }

  .signup-visual-content {
    position: relative;
    z-index: 2;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }

  .signup-visual-badge {
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

  .signup-visual-badge-dot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: #10B981;
    box-shadow: 0 0 8px #10B981;
  }

  /* Center Floating UI Cards */
  .signup-metrics-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 16px;
    margin: auto 0;
    max-width: 440px;
  }

  .signup-metric-card {
    background: rgba(255, 255, 255, 0.12);
    backdrop-filter: blur(14px);
    -webkit-backdrop-filter: blur(14px);
    border: 1px solid rgba(255, 255, 255, 0.22);
    border-radius: 18px;
    padding: 16px 18px;
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.2);
    transition: transform 0.25s ease, background 0.25s ease;
  }

  .signup-metric-card:hover {
    transform: translateY(-3px);
    background: rgba(255, 255, 255, 0.18);
  }

  .signup-metric-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 8px;
  }

  .signup-metric-label {
    font-size: 11px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    color: rgba(255, 255, 255, 0.78);
  }

  .signup-metric-icon {
    width: 26px;
    height: 26px;
    border-radius: 8px;
    background: rgba(255, 255, 255, 0.16);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #FFFFFF;
  }

  .signup-metric-icon svg {
    width: 14px;
    height: 14px;
  }

  .signup-metric-val {
    font-size: 24px;
    font-weight: 600;
    color: #FFFFFF;
    line-height: 1.15;
    margin-bottom: 4px;
  }

  .signup-metric-sub {
    font-size: 11.5px;
    color: rgba(255, 255, 255, 0.78);
    display: flex;
    align-items: center;
    gap: 4px;
  }

  .signup-metric-pill {
    background: rgba(16, 185, 129, 0.22);
    color: #34D399;
    padding: 2px 6px;
    border-radius: 6px;
    font-size: 10.5px;
    font-weight: 600;
  }

  .signup-visual-footer {
    border-top: 1px solid rgba(255, 255, 255, 0.16);
    padding-top: 24px;
  }

  .signup-visual-quote {
    font-size: 15px;
    line-height: 1.5;
    color: #FAF4ED;
    margin: 0 0 6px;
    font-weight: 500;
  }

  .signup-visual-cite {
    font-size: 12px;
    color: rgba(255, 255, 255, 0.65);
  }

  /* ---------------- RIGHT FORM PANEL ---------------- */
  .signup-form-panel {
    flex: 1 1 55%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding: 36px 48px;
    background: #FFFFFF;
    overflow-y: auto;
  }

  .signup-panel-inner {
    max-width: 500px;
    width: 100%;
    margin: 0 auto;
    padding: 10px 0 20px;
  }

  .signup-brand-logo {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    text-decoration: none;
    margin-bottom: 22px;
  }

  .signup-brand-logo img {
    height: 48px;
    width: auto;
    object-fit: contain;
    flex-shrink: 0;
  }

  .signup-brand-text {
    display: flex;
    flex-direction: column;
    line-height: 1.15;
  }

  .signup-brand-name {
    font-family: 'Outfit', 'Plus Jakarta Sans', sans-serif;
    font-size: 22px;
    font-weight: 600;
    color: #21160F;
    letter-spacing: -0.3px;
  }

  .signup-brand-name span {
    color: #876039;
  }

  .signup-brand-tagline {
    font-size: 10px;
    font-weight: 700;
    color: #8B8177;
    letter-spacing: 0.6px;
    text-transform: uppercase;
    margin-top: 1px;
  }

  /* Minimal Footer */
  .signup-panel-footer {
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

  .signup-footer-links {
    display: flex;
    gap: 14px;
  }

  .signup-footer-links a {
    color: #8C7C71;
    text-decoration: none;
  }

  .signup-footer-links a:hover {
    color: var(--brand-primary);
  }

  /* ---------------- RESPONSIVE STYLES ---------------- */
  @media (max-width: 1024px) {
    .signup-visual-panel {
      flex: 0 0 38%;
      padding: 32px;
    }
    .signup-metrics-grid {
      grid-template-columns: 1fr;
      gap: 12px;
    }
    .signup-form-panel {
      padding: 30px 28px;
    }
  }

  @media (max-width: 860px) {
    .signup-split-page {
      flex-direction: column;
    }
    .signup-visual-panel {
      display: none; /* Focus on onboarding form on mobile */
    }
    .signup-form-panel {
      flex: 1 1 auto;
      padding: 32px 20px;
      min-height: 100vh;
    }
    .signup-panel-inner {
      padding: 0;
    }
  }
</style>

<div class="signup-split-page">

  {{-- 1. LEFT VISUAL PANEL (Restaurant Management Showcase) --}}
  <div class="signup-visual-panel">
    <div class="signup-visual-bg"></div>
    <div class="signup-visual-overlay"></div>

    <div class="signup-visual-content">
      {{-- Top Header Pill --}}
      <div>
        <div class="signup-visual-badge">
          <span class="signup-visual-badge-dot"></span>
          <span>RESTAURANT ONBOARDING PLATFORM</span>
        </div>
      </div>

      {{-- Center Floating UI Metrics Cards --}}
      <div class="signup-metrics-grid">
        {{-- Card 1: Sales --}}
        <div class="signup-metric-card">
          <div class="signup-metric-header">
            <span class="signup-metric-label">TODAY'S SALES</span>
            <div class="signup-metric-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
            </div>
          </div>
          <div class="signup-metric-val">&#8377;48,650</div>
          <div class="signup-metric-sub">
            <span class="signup-metric-pill">&uarr; 14.8%</span>
            <span>vs yesterday</span>
          </div>
        </div>

        {{-- Card 2: Orders --}}
        <div class="signup-metric-card">
          <div class="signup-metric-header">
            <span class="signup-metric-label">LIVE ORDERS</span>
            <div class="signup-metric-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"/><rect x="9" y="3" width="6" height="4" rx="1"/><path d="M9 12l2 2 4-4"/></svg>
            </div>
          </div>
          <div class="signup-metric-val">94</div>
          <div class="signup-metric-sub">
            <span>42 Dine-in &bull; 52 Takeaway</span>
          </div>
        </div>

        {{-- Card 3: Tables --}}
        <div class="signup-metric-card">
          <div class="signup-metric-header">
            <span class="signup-metric-label">ACTIVE TABLES</span>
            <div class="signup-metric-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 9h16M5 9v10M19 9v10M9 9V5h6v4M7 15h10"/></svg>
            </div>
          </div>
          <div class="signup-metric-val">18 / 24</div>
          <div class="signup-metric-sub">
            <span class="signup-metric-pill" style="background:rgba(234,179,8,0.22); color:#FCD34D;">75% Occupied</span>
          </div>
        </div>

        {{-- Card 4: Kitchen KOT --}}
        <div class="signup-metric-card">
          <div class="signup-metric-header">
            <span class="signup-metric-label">KITCHEN KOT</span>
            <div class="signup-metric-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 13.8A6 6 0 0112 4a6 6 0 016 9.8V17H6v-3.2zM4 17h16v3H4zM12 4V2"/></svg>
            </div>
          </div>
          <div class="signup-metric-val">12 Active</div>
          <div class="signup-metric-sub">
            <span>Avg preparation: 14 mins</span>
          </div>
        </div>
      </div>

      {{-- Bottom Quote / Message --}}
      <div class="signup-visual-footer">
        <p class="signup-visual-quote">&ldquo;Set up your restaurant in under 3 minutes. From digital QR menu to kitchen KOT and instant POS billing.&rdquo;</p>
        <span class="signup-visual-cite">Powering restaurants, bakeries, cafés &amp; cloud kitchens across India.</span>
      </div>
    </div>
  </div>

  {{-- 2. RIGHT FORM PANEL (Livewire Signup Wizard) --}}
  <div class="signup-form-panel">
    <div class="signup-panel-inner">

      {{-- Logo --}}
      <a href="{{ url('/') }}" class="signup-brand-logo" title="Geni Menu">
        <img src="https://menu.wegeni.com/user-uploads/logo/22afe8e48716500b5a2730bca0ede64a.png"
             onerror="this.src='{{ asset('assets/images/geni-menu-logo-light.png') }}'"
             alt="Geni Menu Logo">
        <span class="signup-brand-text">
          <span class="signup-brand-name">Geni <span>Menu</span></span>
        </span>
      </a>

      {{-- Reactive Livewire Form --}}
      @livewire('forms.restaurantSignup')

      {{-- Minimal Footer --}}
      <div class="signup-panel-footer">
        <span>&copy; {{ date('Y') }} Geni Menu. All rights reserved.</span>
        <div class="signup-footer-links">
          <a href="{{ Route::has('privacy.policy') ? route('privacy.policy') : (Route::has('privacy-and-policy') ? route('privacy-and-policy') : url('/privacy-policy')) }}">Privacy Policy</a>
          <span>&bull;</span>
          <a href="{{ Route::has('terms.conditions') ? route('terms.conditions') : (Route::has('terms-and-conditions') ? route('terms-and-conditions') : url('/terms-and-conditions')) }}">Terms &amp; Conditions</a>
        </div>
      </div>

    </div>
  </div>

</div>
</x-auth-layout>
