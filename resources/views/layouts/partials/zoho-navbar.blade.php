<!-- Premium Sticky Navbar for Geni Menu -->
<style>
  .geni-pos-nav {
    position: sticky;
    top: 0;
    left: 0;
    right: 0;
    z-index: 9999;
    background: #ffffff;
    border-bottom: 1px solid rgba(135, 96, 57, 0.14);
    box-shadow: 0 4px 16px rgba(33, 22, 15, 0.04);
    font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
    color: #21160F;
    -webkit-font-smoothing: antialiased;
  }

  .geni-pos-nav * {
    box-sizing: border-box;
  }

  .geni-pos-nav .nav-wrap {
    max-width: 1240px;
    margin: 0 auto;
    padding: 0 24px;
    height: 68px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
  }

  /* --- Brand Logo (Geni Menu) --- */
  .geni-pos-nav .nav-brand {
    display: inline-flex;
    align-items: center;
    gap: 11px;
    text-decoration: none;
    flex-shrink: 0;
  }

  .geni-pos-nav .brand-logo-img {
    height: 44px;
    width: auto;
    object-fit: contain;
    display: block;
  }

  .geni-pos-nav .brand-icon-box {
    width: 36px;
    height: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
  }

  .geni-pos-nav .brand-icon-box svg {
    width: 100%;
    height: 100%;
    display: block;
  }

  .geni-pos-nav .brand-name-group {
    display: flex;
    flex-direction: column;
    line-height: 1.15;
  }

  .geni-pos-nav .brand-title {
    font-family: 'Outfit', 'Plus Jakarta Sans', sans-serif;
    font-size: 21px;
    font-weight: 500;
    color: #21160F;
    letter-spacing: -0.3px;
    display: inline-flex;
    align-items: center;
    gap: 4px;
  }

  .geni-pos-nav .brand-highlight {
    color: #876039;
    font-weight: 500;
  }

  .geni-pos-nav .brand-tag {
    font-size: 10px;
    font-weight: 600;
    color: #8B8177;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    margin-top: 1px;
  }

  /* --- Center/Right Navigation Section --- */
  .geni-pos-nav .nav-center {
    display: flex;
    align-items: center;
    gap: 22px;
    margin-left: auto;
    margin-right: 18px;
  }

  /* Toll-free phone */
  .geni-pos-nav .nav-tollfree {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: #21160F;
    text-decoration: none;
    font-size: 14px;
    font-weight: 600;
    transition: color 0.18s ease;
    white-space: nowrap;
    padding-right: 6px;
  }

  .geni-pos-nav .nav-tollfree:hover {
    color: #876039;
  }

  .geni-pos-nav .tollfree-circle {
    width: 26px;
    height: 26px;
    border-radius: 50%;
    border: 1.5px solid #876039;
    color: #876039;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.18s ease;
  }

  .geni-pos-nav .nav-tollfree:hover .tollfree-circle {
    background: #876039;
    color: #FFFFFF;
    border-color: #876039;
  }

  .geni-pos-nav .tollfree-circle svg {
    width: 13px;
    height: 13px;
    fill: currentColor;
  }

  /* Links & Dropdowns */
  .geni-pos-nav .nav-menu {
    display: flex;
    align-items: center;
    gap: 22px;
    list-style: none;
    margin: 0;
    padding: 0;
  }

  .geni-pos-nav .nav-menu-item {
    position: relative;
  }

  .geni-pos-nav .nav-menu-link,
  .geni-pos-nav .nav-menu-btn {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    font-size: 14.5px;
    font-weight: 600;
    color: #21160F;
    text-decoration: none;
    background: transparent;
    border: none;
    padding: 10px 0;
    cursor: pointer;
    white-space: nowrap;
    transition: color 0.18s ease;
  }

  .geni-pos-nav .nav-menu-link:hover,
  .geni-pos-nav .nav-menu-btn:hover,
  .geni-pos-nav .nav-menu-item:hover .nav-menu-btn {
    color: #876039;
  }

  .geni-pos-nav .nav-menu-link.nav-active {
    color: #876039;
    font-weight: 700;
  }

  .geni-pos-nav .chevron-icon {
    width: 9px;
    height: 9px;
    transition: transform 0.2s ease;
    opacity: 0.75;
  }

  .geni-pos-nav .nav-menu-item:hover .chevron-icon {
    transform: rotate(180deg);
    opacity: 1;
    stroke: #876039;
  }

  /* Dropdown panel */
  .geni-pos-nav .nav-dropdown {
    position: absolute;
    top: 100%;
    left: 50%;
    transform: translateX(-50%) translateY(8px);
    background: #ffffff;
    border: 1px solid #ebebeb;
    border-radius: 12px;
    box-shadow: 0 14px 40px rgba(0, 0, 0, 0.1), 0 4px 12px rgba(0, 0, 0, 0.04);
    opacity: 0;
    visibility: hidden;
    pointer-events: none;
    transition: opacity 0.2s cubic-bezier(0.16, 1, 0.3, 1), transform 0.2s cubic-bezier(0.16, 1, 0.3, 1), visibility 0.2s;
    z-index: 100;
    padding: 12px 8px;
  }

  /* Invisible hover bridge */
  .geni-pos-nav .nav-dropdown::before {
    content: "";
    position: absolute;
    top: -12px;
    left: 0;
    right: 0;
    height: 12px;
  }

  .geni-pos-nav .nav-menu-item:hover .nav-dropdown,
  .geni-pos-nav .nav-menu-item:focus-within .nav-dropdown {
    opacity: 1;
    visibility: visible;
    pointer-events: auto;
    transform: translateX(-50%) translateY(2px);
  }

  /* Features mega dropdown centered horizontally relative to its menu item */
  .geni-pos-nav .nav-dropdown.dropdown-features {
    width: 820px;
    padding: 18px;
    left: 50%;
    transform: translateX(-50%) translateY(8px);
  }

  .geni-pos-nav .nav-menu-item:hover .nav-dropdown.dropdown-features,
  .geni-pos-nav .nav-menu-item:focus-within .nav-dropdown.dropdown-features {
    transform: translateX(-50%) translateY(2px);
  }

  /* Rightmost dropdown alignment */
  .geni-pos-nav .nav-menu-item:last-child .nav-dropdown {
    left: auto;
    right: -20px;
    transform: translateY(8px);
  }

  .geni-pos-nav .nav-menu-item:last-child:hover .nav-dropdown,
  .geni-pos-nav .nav-menu-item:last-child:focus-within .nav-dropdown {
    transform: translateY(2px);
  }

  .geni-pos-nav .dropdown-grid {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 12px;
  }

  .geni-pos-nav .dropdown-card {
    display: flex;
    gap: 12px;
    padding: 10px 12px;
    border-radius: 8px;
    text-decoration: none;
    color: inherit;
    transition: background 0.15s ease, transform 0.15s ease;
  }

  .geni-pos-nav .dropdown-card:hover {
    background: #f9f9fb;
    transform: translateX(2px);
  }

  .geni-pos-nav .dropdown-card .card-icon {
    width: 38px;
    height: 38px;
    border-radius: 8px;
    background: #fdfaf6;
    color: #9C6F3E;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    border: 1px solid rgba(156, 111, 62, 0.15);
  }

  .geni-pos-nav .dropdown-card .card-icon svg {
    width: 20px;
    height: 20px;
    fill: none;
    stroke: currentColor;
    stroke-width: 1.8;
    stroke-linecap: round;
    stroke-linejoin: round;
  }

  .geni-pos-nav .dropdown-card .card-title {
    font-size: 14px;
    font-weight: 700;
    color: #21160F;
    margin-bottom: 2px;
  }

  .geni-pos-nav .dropdown-card .card-desc {
    font-size: 12px;
    color: #6E6157;
    line-height: 1.4;
  }

  .geni-pos-nav .dropdown-footer {
    margin-top: 14px;
    padding-top: 12px;
    border-top: 1px solid rgba(135, 96, 57, 0.12);
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .geni-pos-nav .dropdown-footer a {
    font-size: 13px;
    font-weight: 600;
    color: #876039;
    text-decoration: none;
  }

  .geni-pos-nav .dropdown-footer a:hover {
    text-decoration: underline;
  }

  /* Simple dropdown */
  .geni-pos-nav .nav-dropdown.dropdown-simple {
    width: 290px;
    padding: 8px;
    border: 1px solid rgba(135, 96, 57, 0.14);
  }

  .geni-pos-nav .dropdown-link-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 10px 12px;
    border-radius: 8px;
    text-decoration: none;
    color: inherit;
    transition: background 0.15s ease;
  }

  .geni-pos-nav .dropdown-link-item:hover {
    background: #FAF7F2;
  }

  .geni-pos-nav .dropdown-link-item .item-icon {
    width: 36px;
    height: 36px;
    border-radius: 8px;
    background: #FAF7F2;
    color: #876039;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    border: 1px solid rgba(135, 96, 57, 0.18);
  }

  .geni-pos-nav .dropdown-link-item .item-icon svg {
    width: 18px;
    height: 18px;
    fill: none;
    stroke: currentColor;
    stroke-width: 1.8;
    stroke-linecap: round;
    stroke-linejoin: round;
  }

  .geni-pos-nav .dropdown-link-item .item-title {
    font-size: 13.5px;
    font-weight: 600;
    color: #21160F;
    display: block;
  }

  .geni-pos-nav .dropdown-link-item .item-sub {
    font-size: 11.5px;
    color: #6E6157;
    display: block;
    margin-top: 1px;
  }

  /* --- Right CTA Action Group --- */
  .geni-pos-nav .nav-cta-group {
    display: inline-flex;
    align-items: center;
    gap: 16px;
    flex-shrink: 0;
  }

  .geni-pos-nav .btn-signin {
    font-size: 14px;
    font-weight: 600;
    color: #21160F;
    text-decoration: none;
    transition: color 0.18s ease;
  }

  .geni-pos-nav .btn-signin:hover {
    color: #876039;
  }

  /* Geni Menu Sign Up Now pill button */
  .geni-pos-nav .btn-signup-pill {
    background: #876039;
    color: #ffffff !important;
    text-decoration: none;
    padding: 9px 24px;
    border-radius: 9999px;
    font-size: 14px;
    font-weight: 600;
    letter-spacing: -0.1px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border: none;
    cursor: pointer;
    box-shadow: 0 3px 12px rgba(135, 96, 57, 0.28);
    transition: background 0.18s ease, transform 0.18s ease, box-shadow 0.18s ease;
    white-space: nowrap;
  }

  .geni-pos-nav .btn-signup-pill:hover {
    background: #6f4e2d;
    transform: translateY(-1px);
    box-shadow: 0 5px 16px rgba(135, 96, 57, 0.38);
  }

  /* Hamburger for mobile */
  .geni-pos-nav .nav-burger-btn {
    display: none;
    background: transparent;
    border: none;
    cursor: pointer;
    padding: 8px 6px;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 5px;
    width: 38px;
    height: 38px;
    border-radius: 8px;
    transition: background 0.2s ease;
  }

  .geni-pos-nav .nav-burger-btn:hover {
    background: rgba(135, 96, 57, 0.08);
  }

  .geni-pos-nav .nav-burger-btn span {
    display: block;
    width: 22px;
    height: 2px;
    background: #21160F;
    border-radius: 2px;
    transition: transform 0.25s ease, opacity 0.25s ease, background 0.25s ease;
  }

  .geni-pos-nav .nav-burger-btn.is-active span:nth-child(1) {
    transform: translateY(7px) rotate(45deg);
  }

  .geni-pos-nav .nav-burger-btn.is-active span:nth-child(2) {
    opacity: 0;
  }

  .geni-pos-nav .nav-burger-btn.is-active span:nth-child(3) {
    transform: translateY(-7px) rotate(-45deg);
  }

  /* Mobile Drawer */
  .geni-pos-nav .mobile-panel {
    display: none;
    position: fixed;
    top: 68px;
    left: 0;
    right: 0;
    bottom: 0;
    background: #ffffff;
    overflow-y: auto;
    -webkit-overflow-scrolling: touch;
    padding: 20px 20px 40px;
    z-index: 9998;
    border-top: 1px solid rgba(135, 96, 57, 0.12);
    box-shadow: 0 10px 30px rgba(33, 22, 15, 0.1);
  }

  .geni-pos-nav .mobile-panel.is-open {
    display: block;
  }

  .geni-pos-nav .mobile-tollfree {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 12px 16px;
    background: #FAF7F2;
    border: 1px solid rgba(135, 96, 57, 0.18);
    border-radius: 12px;
    font-size: 14px;
    font-weight: 600;
    color: #21160F;
    text-decoration: none;
    margin-bottom: 16px;
  }

  .geni-pos-nav .mobile-list {
    list-style: none;
    margin: 0;
    padding: 0;
  }

  .geni-pos-nav .mobile-list-item {
    border-bottom: 1px solid rgba(135, 96, 57, 0.1);
  }

  .geni-pos-nav .mobile-direct-link,
  .geni-pos-nav .mobile-accordion-btn {
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 100%;
    padding: 14px 4px;
    font-size: 15px;
    font-weight: 600;
    color: #21160F;
    text-decoration: none;
    background: transparent;
    border: none;
    cursor: pointer;
    font-family: inherit;
    text-align: left;
  }

  .geni-pos-nav .mobile-chevron {
    width: 16px;
    height: 16px;
    transition: transform 0.25s ease;
    color: #8C7C71;
  }

  .geni-pos-nav .mobile-list-item.is-expanded .mobile-chevron {
    transform: rotate(90deg);
    color: #876039;
  }

  .geni-pos-nav .mobile-sub-menu {
    display: none;
    padding: 4px 0 14px 8px;
    flex-direction: column;
    gap: 6px;
  }

  .geni-pos-nav .mobile-list-item.is-expanded .mobile-sub-menu {
    display: flex;
  }

  .geni-pos-nav .mobile-sub-link {
    font-size: 13.5px;
    color: #6E6157;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 7px 10px;
    border-radius: 8px;
    transition: background 0.15s ease, color 0.15s ease;
  }

  .geni-pos-nav .mobile-sub-link:active,
  .geni-pos-nav .mobile-sub-link:hover {
    background: #FAF7F2;
    color: #876039;
  }

  .geni-pos-nav .mobile-sub-link svg {
    width: 17px;
    height: 17px;
    fill: none;
    stroke: currentColor;
    stroke-width: 1.8;
    stroke-linecap: round;
    stroke-linejoin: round;
    color: #876039;
    flex-shrink: 0;
  }

  .geni-pos-nav .mobile-actions {
    margin-top: 24px;
    display: flex;
    flex-direction: column;
    gap: 12px;
  }

  /* Responsive queries */
  @media (max-width: 1080px) {
    .geni-pos-nav .nav-center {
      display: none;
    }

    .geni-pos-nav .btn-signin {
      display: none;
    }

    .geni-pos-nav .nav-burger-btn {
      display: flex;
    }
  }

  @media (max-width: 640px) {
    .geni-pos-nav .nav-wrap {
      height: 62px;
      padding: 0 14px;
      gap: 10px;
    }

    .geni-pos-nav .mobile-panel {
      top: 62px;
      padding: 16px 16px 36px;
    }

    .geni-pos-nav .nav-brand .brand-logo-img {
      height: 34px !important;
    }

    .geni-pos-nav .btn-signup-pill {
      padding: 7px 14px;
      font-size: 12.5px;
    }
  }

  @media (max-width: 360px) {
    .geni-pos-nav .nav-wrap {
      padding: 0 10px;
      gap: 6px;
    }

    .geni-pos-nav .nav-brand .brand-logo-img {
      height: 30px !important;
    }

    .geni-pos-nav .btn-signup-pill {
      padding: 6px 10px;
      font-size: 11.5px;
    }
  }
</style>

<header class="geni-pos-nav">
  <div class="nav-wrap">

    <!-- Brand Logo: Geni Menu -->
    <a href="{{ url('/') }}" class="nav-brand" title="Geni Menu">
      <img src="{{ asset('assets/images/geni-menu-logo-light.png') }}"
           onerror="this.onerror=null;this.src='{{ asset('assets/images/geni-menu-logo.png') }}';"
           alt="Geni Menu" class="brand-logo-img" style="height: 44px; width: auto; object-fit: contain;">
    </a>

    <!-- Center Navigation: Support + Links -->
    <div class="nav-center">

      <!-- Support phone link with circle phone icon -->
      <a href="tel:+918667205661" class="nav-tollfree" title="Call support">
        <span class="tollfree-circle">
          <svg viewBox="0 0 24 24">
            <path d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56a.977.977 0 0 0-1.01.24l-1.57 1.97c-2.83-1.44-5.15-3.75-6.59-6.59l1.97-1.57c.28-.28.37-.67.25-1.02A11.36 11.36 0 0 1 8.96 4.3a1 1 0 0 0-1-1H4.21a1 1 0 0 0-1 1c0 9.39 7.63 17.02 17.02 17.02a1 1 0 0 0 1-1v-3.77a1 1 0 0 0-.22-.67z"/>
          </svg>
        </span>
        <span>+91 86672 05661</span>
      </a>

      <!-- Desktop Nav Items -->
      <ul class="nav-menu">

        <!-- 0. Home -->
        <li class="nav-menu-item">
          <a href="{{ url('/') }}" class="nav-menu-link {{ request()->is('/') ? 'nav-active' : '' }}">Home</a>
        </li>

        <!-- 1. Features ⌵ -->
        <li class="nav-menu-item">
          <button type="button" class="nav-menu-btn" aria-haspopup="true">
            <span>Features</span>
            <svg class="chevron-icon" viewBox="0 0 10 6" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
              <path d="M1 1L5 5L9 1"/>
            </svg>
          </button>
          <div class="nav-dropdown dropdown-features">
            <div class="dropdown-grid">
              <a href="{{ route('features.menu-management') }}" class="dropdown-card">
                <div class="card-icon"><svg viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h10"/><circle cx="18" cy="18" r="3"/><path d="M18 15v6M15 18h6"/></svg></div>
                <div>
                  <div class="card-title">Menu Management</div>
                  <div class="card-desc">Digital QR menu & instant category updates</div>
                </div>
              </a>
              <a href="{{ route('features.reservation-management') }}" class="dropdown-card">
                <div class="card-icon"><svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg></div>
                <div>
                  <div class="card-title">Reservation Management</div>
                  <div class="card-desc">Manage table bookings without confusion</div>
                </div>
              </a>
              <a href="{{ route('features.waiter-request') }}" class="dropdown-card">
                <div class="card-icon"><svg viewBox="0 0 24 24"><path d="M18 8A6 6 0 006 8v4h12V8zM3 16h18v2H3zM12 4v2"/></svg></div>
                <div>
                  <div class="card-title">Waiter Requests</div>
                  <div class="card-desc">Help waiters handle customer calls faster</div>
                </div>
              </a>
              <a href="{{ route('features.table-management') }}" class="dropdown-card">
                <div class="card-icon"><svg viewBox="0 0 24 24"><path d="M4 9h16M5 9v10M19 9v10M9 9V5h6v4M7 15h10"/></svg></div>
                <div>
                  <div class="card-title">Table Management</div>
                  <div class="card-desc">Live floor map, seating & status alerts</div>
                </div>
              </a>
              <a href="{{ route('features.pos-management') }}" class="dropdown-card">
                <div class="card-icon"><svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="12" rx="2"/><path d="M7 20h10M12 16v4M7 8h4M7 11h2"/></svg></div>
                <div>
                  <div class="card-title">POS & Fast Billing</div>
                  <div class="card-desc">3-click checkout, split bill & GST print</div>
                </div>
              </a>
              <a href="{{ route('features.order-management') }}" class="dropdown-card">
                <div class="card-icon"><svg viewBox="0 0 24 24"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"/><rect x="9" y="3" width="6" height="4" rx="1"/><path d="M9 12l2 2 4-4M9 16h6"/></svg></div>
                <div>
                  <div class="card-title">Order Management</div>
                  <div class="card-desc">Manage dine-in, takeaway & delivery seats</div>
                </div>
              </a>
              <a href="{{ route('features.kot-management') }}" class="dropdown-card">
                <div class="card-icon"><svg viewBox="0 0 24 24"><path d="M6 13.8A6 6 0 0112 4a6 6 0 016 9.8V17H6v-3.2zM4 17h16v3H4zM12 4V2"/></svg></div>
                <div>
                  <div class="card-title">Kitchen Order Tickets</div>
                  <div class="card-desc">Direct routing to kitchen screens & printers</div>
                </div>
              </a>
              <a href="{{ route('features.inventory-management') }}" class="dropdown-card">
                <div class="card-icon"><svg viewBox="0 0 24 24"><path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg></div>
                <div>
                  <div class="card-title">Inventory Management</div>
                  <div class="card-desc">Real-time raw material stock & recipe tracking</div>
                </div>
              </a>
              <a href="{{ route('features.reports') }}" class="dropdown-card">
                <div class="card-icon"><svg viewBox="0 0 24 24"><path d="M18 20V10M12 20V4M6 20v-6M3 20h18"/></svg></div>
                <div>
                  <div class="card-title">Reports & Analytics</div>
                  <div class="card-desc">Real-time revenue, stock counts & sales</div>
                </div>
              </a>
            </div>
            <div class="dropdown-footer">
              <span style="font-size:12px;color:#9ca3af;">All-in-one platform for modern dining</span>
              <a href="{{ route('features') }}">See all features →</a>
            </div>
          </div>
        </li>

        <!-- 2. Pricing -->
        <li class="nav-menu-item">
          <a href="{{ route('pricing') }}" class="nav-menu-link">Pricing</a>
        </li>

        <!-- 4. Resources ⌵ -->
        <li class="nav-menu-item">
          <button type="button" class="nav-menu-btn" aria-haspopup="true">
            <span>Resources</span>
            <svg class="chevron-icon" viewBox="0 0 10 6" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
              <path d="M1 1L5 5L9 1"/>
            </svg>
          </button>
          <div class="nav-dropdown dropdown-simple">
            <a href="{{ route('how-it-works') }}" class="dropdown-link-item">
              <span class="item-icon"><svg viewBox="0 0 24 24"><circle cx="6" cy="12" r="3"/><circle cx="18" cy="6" r="3"/><circle cx="18" cy="18" r="3"/><path d="M9 10.5l6-3M9 13.5l6 3"/></svg></span>
              <div>
                <span class="item-title">How It Works</span>
                <span class="item-sub">Complete 7-step operational loop</span>
              </div>
            </a>
            <a href="{{ route('faq-help') }}" class="dropdown-link-item">
              <span class="item-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg></span>
              <div>
                <span class="item-title">FAQ & Help</span>
                <span class="item-sub">Setup, printers & hardware guides</span>
              </div>
            </a>
            <a href="{{ route('contact.us') }}" class="dropdown-link-item">
              <span class="item-icon"><svg viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg></span>
              <div>
                <span class="item-title">Contact Support</span>
                <span class="item-sub">Get help from restaurant specialists</span>
              </div>
            </a>
            <a href="{{ route('terms-and-conditions') }}" class="dropdown-link-item">
              <span class="item-icon"><svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg></span>
              <div>
                <span class="item-title">Terms & Privacy</span>
                <span class="item-sub">Cloud security & SLA policies</span>
              </div>
            </a>
          </div>
        </li>

        <!-- 5. Solutions ⌵ -->
        <li class="nav-menu-item">
          <button type="button" class="nav-menu-btn" aria-haspopup="true">
            <span>Solutions</span>
            <svg class="chevron-icon" viewBox="0 0 10 6" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
              <path d="M1 1L5 5L9 1"/>
            </svg>
          </button>
          <div class="nav-dropdown dropdown-features">
            <div class="dropdown-grid">
              <a href="{{ route('solutions.family-restaurant') }}" class="dropdown-card">
                <div class="card-icon"><svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></div>
                <div>
                  <div class="card-title">Family Restaurant</div>
                  <div class="card-desc">Tables, group orders, KOT & POS</div>
                </div>
              </a>
              <a href="{{ route('solutions.dine-in-restaurant') }}" class="dropdown-card">
                <div class="card-icon"><svg viewBox="0 0 24 24"><path d="M4 9h16M5 9v10M19 9v10M9 9V5h6v4M7 15h10"/></svg></div>
                <div>
                  <div class="card-title">Dine-in Restaurant</div>
                  <div class="card-desc">Table service, digital menu, KOT & billing</div>
                </div>
              </a>
              <a href="{{ route('solutions.dine-in-restaurant') }}" class="dropdown-card">
                <div class="card-icon"><svg viewBox="0 0 24 24"><path d="M3 2v7c0 1.1.9 2 2 2h4a2 2 0 002-2V2M7 2v20M21 15V2s-5 2-5 7 5 7 5 7v-1z"/></svg></div>
                <div>
                  <div class="card-title">Fine Dining</div>
                  <div class="card-desc">Table ordering & steward mobility</div>
                </div>
              </a>
              <a href="{{ route('solutions.multi-cuisine-restaurant') }}" class="dropdown-card">
                <div class="card-icon"><svg viewBox="0 0 24 24"><path d="M3 18h18M5 12h14v6H5zM12 4v8"/></svg></div>
                <div>
                  <div class="card-title">Multi-Cuisine Restaurant</div>
                  <div class="card-desc">Indian, Chinese, Italian & multi-station KOT</div>
                </div>
              </a>
              <a href="{{ route('solutions.qsr-restaurant') }}" class="dropdown-card">
                <div class="card-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></div>
                <div>
                  <div class="card-title">Quick Service (QSR)</div>
                  <div class="card-desc">Fast counter bills, tokens & queue busting</div>
                </div>
              </a>
              <a href="{{ route('solutions.takeaway-restaurant') }}" class="dropdown-card">
                <div class="card-icon"><svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg></div>
                <div>
                  <div class="card-title">Takeaway Restaurant</div>
                  <div class="card-desc">Counter orders, KOT & pickup management</div>
                </div>
              </a>
              <a href="{{ route('solutions.college-canteen') }}" class="dropdown-card">
                <div class="card-icon"><svg viewBox="0 0 24 24"><path d="M22 10v6M2 10l10-5 10 5-10 5zM6 12v5c3 3 9 3 12 0v-5"/></svg></div>
                <div>
                  <div class="card-title">College Canteen</div>
                  <div class="card-desc">Campus food service, multi-counter & tokens</div>
                </div>
              </a>
              <a href="{{ route('solutions.office-canteen') }}" class="dropdown-card">
                <div class="card-icon"><svg viewBox="0 0 24 24"><rect x="4" y="2" width="16" height="20" rx="2" ry="2"/><path d="M9 22v-4h6v4M8 6h.01M16 6h.01M12 6h.01M12 10h.01M16 10h.01M8 10h.01M12 14h.01M16 14h.01M8 14h.01"/></svg></div>
                <div>
                  <div class="card-title">Office Canteen</div>
                  <div class="card-desc">Corporate cafeteria, employee orders & counters</div>
                </div>
              </a>
              <a href="{{ route('solutions.sweet-shop') }}" class="dropdown-card">
                <div class="card-icon"><svg viewBox="0 0 24 24"><polyline points="20 12 20 22 4 22 4 12"/><rect x="2" y="7" width="20" height="5"/><line x1="12" y1="22" x2="12" y2="7"/><path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"/><path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"/></svg></div>
                <div>
                  <div class="card-title">Sweet Shop</div>
                  <div class="card-desc">Weight-based billing, packing & inventory</div>
                </div>
              </a>
              <a href="{{ route('solutions.bakery') }}" class="dropdown-card">
                <div class="card-icon"><svg viewBox="0 0 24 24"><path d="M18 8h1a4 4 0 0 1 0 8h-1"/><path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"/><line x1="6" y1="1" x2="6" y2="4"/><line x1="10" y1="1" x2="10" y2="4"/><line x1="14" y1="1" x2="14" y2="4"/></svg></div>
                <div>
                  <div class="card-title">Bakeries & Cake Shops</div>
                  <div class="card-desc">Custom cakes, billing & inventory</div>
                </div>
              </a>
              <a href="{{ route('solutions.juice-and-snacks') }}" class="dropdown-card">
                <div class="card-icon"><svg viewBox="0 0 24 24"><path d="M17 3v3H7V3M9 6v15M15 6v15"/><path d="M6 3h12l-2 18H8z"/><path d="M11 0L10 6"/></svg></div>
                <div>
                  <div class="card-title">Juice & Snack Shops</div>
                  <div class="card-desc">Fast counter billing & orders</div>
                </div>
              </a>
              <a href="{{ route('solutions.bars-and-breweries') }}" class="dropdown-card">
                <div class="card-icon"><svg viewBox="0 0 24 24"><path d="M8 22h8M12 11v11M12 11a7 7 0 0 0 7-7V2H5v2a7 7 0 0 0 7 7z"/></svg></div>
                <div>
                  <div class="card-title">Bars & Breweries</div>
                  <div class="card-desc">Table service & billing</div>
                </div>
              </a>
              <a href="{{ route('solutions.pizzerias') }}" class="dropdown-card">
                <div class="card-icon"><svg viewBox="0 0 24 24"><path d="M21.21 15.89A10 10 0 1 1 8 2.83M22 12A10 10 0 0 0 12 2v10z"/></svg></div>
                <div>
                  <div class="card-title">Pizzerias & Specialty Food</div>
                  <div class="card-desc">Focused menus & fast service</div>
                </div>
              </a>
              <a href="{{ url('/#multibranch') }}" class="dropdown-card">
                <div class="card-icon"><svg viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><polyline points="3.27 6.96 12 12.01 20.73 6.96"/><line x1="12" y1="22.08" x2="12" y2="12"/></svg></div>
                <div>
                  <div class="card-title">Multi-Branch Chains</div>
                  <div class="card-desc">Central recipe, stock & HQ reports</div>
                </div>
              </a>
              <a href="{{ url('/#audience') }}" class="dropdown-card">
                <div class="card-icon"><svg viewBox="0 0 24 24"><rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg></div>
                <div>
                  <div class="card-title">Cloud Kitchens</div>
                  <div class="card-desc">Multi-brand aggregation & dispatch</div>
                </div>
              </a>
            </div>
            <div class="dropdown-footer">
              <span style="font-size:12px;color:#9ca3af;">Tailored solutions for every food business</span>
              <a href="{{ route('solutions') }}">Explore all solutions &rarr;</a>
            </div>
          </div>
        </li>

      </ul>
    </div>

    <!-- Right Side: Sign In + Red "Sign Up Now" Pill -->
    <div class="nav-cta-group">
      <a href="{{ route('login') }}" class="btn-signin">
        @if (user())
          @lang('menu.dashboard')
        @else
          Sign In
        @endif
      </a>

      <a href="{{ route('restaurant_signup') }}"
         class="btn-signup-pill">
        Sign Up Now
      </a>

      <!-- Hamburger toggle for mobile/tablet -->
      <button type="button" class="nav-burger-btn" id="geniNavBurger" aria-label="Toggle Navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
    </div>

  </div>

  <!-- Mobile Drawer Menu -->
  <div class="mobile-panel" id="geniMobilePanel">
    <a href="tel:+918667205661" class="mobile-tollfree">
      <span style="width:20px;height:20px;flex-shrink:0;display:flex;align-items:center;">
        <svg viewBox="0 0 24 24" fill="#876039" style="width:18px;height:18px;">
          <path d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56a.977.977 0 0 0-1.01.24l-1.57 1.97c-2.83-1.44-5.15-3.75-6.59-6.59l1.97-1.57c.28-.28.37-.67.25-1.02A11.36 11.36 0 0 1 8.96 4.3a1 1 0 0 0-1-1H4.21a1 1 0 0 0-1 1c0 9.39 7.63 17.02 17.02 17.02a1 1 0 0 0 1-1v-3.77a1 1 0 0 0-.22-.67z"/>
        </svg>
      </span>
      <span>+91 86672 05661</span>
    </a>

    <ul class="mobile-list">
      <li class="mobile-list-item">
        <a href="{{ url('/') }}" class="mobile-direct-link" onclick="closeGeniMobile()">
          <span>Home</span>
          <span style="font-size: 13px; color: #9C6F3E;">&rarr;</span>
        </a>
      </li>

      <li class="mobile-list-item" id="mobItemFeatures">
        <button type="button" class="mobile-accordion-btn" onclick="toggleMobSubmenu('mobItemFeatures')">
          <span>Features</span>
          <svg class="mobile-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
        </button>
        <div class="mobile-sub-menu">
          <a href="{{ route('features') }}" class="mobile-sub-link" onclick="closeGeniMobile()" style="font-weight: 600; color: #9C6F3E;"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg> View All Features &rarr;</a>
          <a href="{{ route('features.menu-management') }}" class="mobile-sub-link" onclick="closeGeniMobile()"><svg viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h10"/><circle cx="18" cy="18" r="3"/><path d="M18 15v6M15 18h6"/></svg> Menu Management</a>
          <a href="{{ route('features.reservation-management') }}" class="mobile-sub-link" onclick="closeGeniMobile()"><svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg> Reservation Management</a>
          <a href="{{ route('features.waiter-request') }}" class="mobile-sub-link" onclick="closeGeniMobile()"><svg viewBox="0 0 24 24"><path d="M18 8A6 6 0 006 8v4h12V8zM3 16h18v2H3zM12 4v2"/></svg> Waiter Requests</a>
          <a href="{{ route('features.table-management') }}" class="mobile-sub-link" onclick="closeGeniMobile()"><svg viewBox="0 0 24 24"><path d="M4 9h16M5 9v10M19 9v10M9 9V5h6v4M7 15h10"/></svg> Table Management</a>
          <a href="{{ route('features.pos-management') }}" class="mobile-sub-link" onclick="closeGeniMobile()"><svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="12" rx="2"/><path d="M7 20h10M12 16v4M7 8h4M7 11h2"/></svg> POS & Fast Billing</a>
          <a href="{{ route('features.order-management') }}" class="mobile-sub-link" onclick="closeGeniMobile()"><svg viewBox="0 0 24 24"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"/><rect x="9" y="3" width="6" height="4" rx="1"/><path d="M9 12l2 2 4-4M9 16h6"/></svg> Order Management</a>
          <a href="{{ route('features.kot-management') }}" class="mobile-sub-link" onclick="closeGeniMobile()"><svg viewBox="0 0 24 24"><path d="M6 13.8A6 6 0 0112 4a6 6 0 016 9.8V17H6v-3.2zM4 17h16v3H4zM12 4V2"/></svg> Kitchen Order Tickets (KOT)</a>
          <a href="{{ route('features.inventory-management') }}" class="mobile-sub-link" onclick="closeGeniMobile()"><svg viewBox="0 0 24 24"><path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg> Inventory Management</a>
          <a href="{{ route('features.reports') }}" class="mobile-sub-link" onclick="closeGeniMobile()"><svg viewBox="0 0 24 24"><path d="M18 20V10M12 20V4M6 20v-6M3 20h18"/></svg> Reports & Analytics</a>
        </div>
      </li>

      <li class="mobile-list-item">
        <a href="{{ route('pricing') }}" class="mobile-direct-link" onclick="closeGeniMobile()">
          <span>Pricing</span>
          <span style="font-size: 13px; color: #9C6F3E;">&rarr;</span>
        </a>
      </li>

      <li class="mobile-list-item" id="mobItemResources">
        <button type="button" class="mobile-accordion-btn" onclick="toggleMobSubmenu('mobItemResources')">
          <span>Resources</span>
          <svg class="mobile-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
        </button>
        <div class="mobile-sub-menu">
          <a href="{{ route('how-it-works') }}" class="mobile-sub-link" onclick="closeGeniMobile()"><svg viewBox="0 0 24 24"><circle cx="6" cy="12" r="3"/><circle cx="18" cy="6" r="3"/><circle cx="18" cy="18" r="3"/><path d="M9 10.5l6-3M9 13.5l6 3"/></svg> How It Works</a>
          <a href="{{ route('faq-help') }}" class="mobile-sub-link" onclick="closeGeniMobile()"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg> FAQ & Help</a>
          <a href="{{ route('contact.us') }}" class="mobile-sub-link" onclick="closeGeniMobile()"><svg viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg> Contact Support</a>
          <a href="{{ route('terms-and-conditions') }}" class="mobile-sub-link" onclick="closeGeniMobile()"><svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg> Terms & Policies</a>
        </div>
      </li>

      <li class="mobile-list-item" id="mobItemSolutions">
        <button type="button" class="mobile-accordion-btn" onclick="toggleMobSubmenu('mobItemSolutions')">
          <span>Solutions</span>
          <svg class="mobile-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
        </button>
        <div class="mobile-sub-menu">
          <a href="{{ route('solutions') }}" class="mobile-sub-link" onclick="closeGeniMobile()" style="font-weight: 600; color: #9C6F3E;"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"/><polyline points="13 2 13 9 20 9"/></svg> Explore All Solutions &rarr;</a>
          <a href="{{ route('solutions.family-restaurant') }}" class="mobile-sub-link" onclick="closeGeniMobile()"><svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg> Family Restaurant</a>
          <a href="{{ route('solutions.dine-in-restaurant') }}" class="mobile-sub-link" onclick="closeGeniMobile()"><svg viewBox="0 0 24 24"><path d="M4 9h16M5 9v10M19 9v10M9 9V5h6v4M7 15h10"/></svg> Dine-in Restaurant</a>
          <a href="{{ route('solutions.qsr-restaurant') }}" class="mobile-sub-link" onclick="closeGeniMobile()"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg> Quick Service (QSR)</a>
          <a href="{{ route('solutions.bakery') }}" class="mobile-sub-link" onclick="closeGeniMobile()"><svg viewBox="0 0 24 24"><path d="M18 8h1a4 4 0 0 1 0 8h-1"/><path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"/></svg> Bakeries & Cafes</a>
          <a href="{{ route('solutions.takeaway-restaurant') }}" class="mobile-sub-link" onclick="closeGeniMobile()"><svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/></svg> Takeaway Restaurant</a>
          <a href="{{ route('solutions.multi-cuisine-restaurant') }}" class="mobile-sub-link" onclick="closeGeniMobile()"><svg viewBox="0 0 24 24"><path d="M3 18h18M5 12h14v6H5zM12 4v8"/></svg> Multi-Cuisine</a>
          <a href="{{ route('solutions.sweet-shop') }}" class="mobile-sub-link" onclick="closeGeniMobile()"><svg viewBox="0 0 24 24"><polyline points="20 12 20 22 4 22 4 12"/><rect x="2" y="7" width="20" height="5"/></svg> Sweet Shop</a>
          <a href="{{ route('solutions.college-canteen') }}" class="mobile-sub-link" onclick="closeGeniMobile()"><svg viewBox="0 0 24 24"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/></svg> College Canteen</a>
          <a href="{{ route('solutions.office-canteen') }}" class="mobile-sub-link" onclick="closeGeniMobile()"><svg viewBox="0 0 24 24"><rect x="4" y="2" width="16" height="20" rx="2" ry="2"/></svg> Office Canteen</a>
          <a href="{{ route('solutions.bars-and-breweries') }}" class="mobile-sub-link" onclick="closeGeniMobile()"><svg viewBox="0 0 24 24"><path d="M8 22h8M12 11v11"/></svg> Bars & Breweries</a>
        </div>
      </li>
    </ul>

    <div class="mobile-actions">
      <a href="{{ route('restaurant_signup') }}"
         onclick="closeGeniMobile();"
         class="btn-signup-pill" style="width:100%;text-align:center;padding:12px 20px;font-size:14px;">
        Sign Up Now
      </a>

      <a href="{{ route('login') }}" class="btn-signin" style="display:block;text-align:center;padding:12px;font-weight:600;color:#2A2420;">
        @if (user())
          @lang('menu.dashboard')
        @else
          Sign In to Your Restaurant &rarr;
        @endif
      </a>
    </div>
  </div>
</header>

<script>
  function toggleGeniMobile() {
    var panel = document.getElementById('geniMobilePanel');
    var burger = document.getElementById('geniNavBurger');
    if (panel) {
      var isOpen = panel.classList.toggle('is-open');
      if (burger) {
        burger.classList.toggle('is-active', isOpen);
      }
      document.body.style.overflow = isOpen ? 'hidden' : '';
    }
  }

  function closeGeniMobile() {
    var panel = document.getElementById('geniMobilePanel');
    var burger = document.getElementById('geniNavBurger');
    if (panel) {
      panel.classList.remove('is-open');
    }
    if (burger) {
      burger.classList.remove('is-active');
    }
    document.body.style.overflow = '';
  }

  function toggleMobSubmenu(itemId) {
    var item = document.getElementById(itemId);
    if (item) {
      item.classList.toggle('is-expanded');
    }
  }

  document.addEventListener('DOMContentLoaded', function () {
    var burger = document.getElementById('geniNavBurger');
    if (burger) {
      burger.addEventListener('click', toggleGeniMobile);
    }
  });
</script>
