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

  /* Petpooja-style Clean 2-Column Outlet Types / Solutions Dropdown */
  .geni-pos-nav .nav-menu-item.solutions-item > .nav-menu-btn {
    padding: 8px 13px;
    border-radius: 8px;
    margin: 0 -6px;
    transition: background 0.18s ease, color 0.18s ease;
  }

  .geni-pos-nav .nav-menu-item.solutions-item:hover > .nav-menu-btn,
  .geni-pos-nav .nav-menu-item.solutions-item:focus-within > .nav-menu-btn {
    background: #FAF3EB;
    color: #876039;
  }

  .geni-pos-nav .nav-dropdown.dropdown-solutions {
    width: 560px;
    padding: 20px 22px;
    left: 50%;
    border-radius: 16px;
    border: 1px solid rgba(135, 96, 57, 0.16);
    box-shadow: 0 20px 48px rgba(33, 22, 15, 0.12), 0 4px 14px rgba(33, 22, 15, 0.05);
    transform: translateX(-50%) translateY(8px);
  }

  .geni-pos-nav .nav-menu-item:hover .nav-dropdown.dropdown-solutions,
  .geni-pos-nav .nav-menu-item:focus-within .nav-dropdown.dropdown-solutions {
    transform: translateX(-50%) translateY(4px);
  }

  .geni-pos-nav .outlet-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    column-gap: 20px;
    row-gap: 6px;
  }

  .geni-pos-nav .outlet-item {
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 9px 12px;
    border-radius: 10px;
    text-decoration: none;
    color: #21160F;
    transition: background 0.16s ease, color 0.16s ease, transform 0.16s ease;
  }

  .geni-pos-nav .outlet-item:hover {
    background: #FAF6F0;
    color: #876039;
    transform: translateX(2px);
  }

  .geni-pos-nav .outlet-illus {
    width: 38px;
    height: 38px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
  }

  .geni-pos-nav .outlet-illus svg {
    width: 34px;
    height: 34px;
    display: block;
    transition: transform 0.18s ease;
  }

  .geni-pos-nav .outlet-item:hover .outlet-illus svg {
    transform: scale(1.07);
  }

  .geni-pos-nav .outlet-label {
    font-size: 14.5px;
    font-weight: 600;
    letter-spacing: -0.01em;
    line-height: 1.25;
    color: inherit;
  }

  .geni-pos-nav .outlet-item.outlet-all {
    background: #FBF6EE;
    border: 1px dashed rgba(135, 96, 57, 0.28);
    color: #876039;
  }

  .geni-pos-nav .outlet-item.outlet-all:hover {
    background: #F4E9D8;
    border-style: solid;
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

        <!-- 2. Solutions ⌵ (Petpooja-style 2-Column Illustrated Outlet Menu) -->
        <li class="nav-menu-item solutions-item">
          <button type="button" class="nav-menu-btn" aria-haspopup="true">
            <span>Solutions</span>
            <svg class="chevron-icon" viewBox="0 0 10 6" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
              <path d="M1 1L5 5L9 1"/>
            </svg>
          </button>
          <div class="nav-dropdown dropdown-solutions">
            <div class="outlet-grid">
              <!-- 1. Dine-in Restaurant -->
              <a href="{{ route('solutions.dine-in-restaurant') }}" class="outlet-item">
                <span class="outlet-illus">
                  <svg viewBox="0 0 36 36" fill="none">
                    <path d="M8 22C8 16.5 12.5 12 18 12C23.5 12 28 16.5 28 22H8Z" fill="#EAD5BC"/>
                    <path d="M5 25H31L29 30H7L5 25Z" fill="#21160F"/>
                    <path d="M8 22C8 16.5 12.5 12 18 12C23.5 12 28 16.5 28 22M5 22H31M18 12V9M16 9H20" stroke="#21160F" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9 7V11M7.5 7H10.5M27 7V11M25.5 7H28.5" stroke="#876039" stroke-width="1.6" stroke-linecap="round"/>
                  </svg>
                </span>
                <span class="outlet-label">Dine-in Restaurant</span>
              </a>

              <!-- 2. Quick Service (QSR) -->
              <a href="{{ route('solutions.qsr-restaurant') }}" class="outlet-item">
                <span class="outlet-illus">
                  <svg viewBox="0 0 36 36" fill="none">
                    <path d="M7 16C7 10.8 11.9 7 18 7C24.1 7 29 10.8 29 16H7Z" fill="#EAD5BC" stroke="#21160F" stroke-width="1.8" stroke-linejoin="round"/>
                    <rect x="6" y="19" width="24" height="4" rx="2" fill="#876039" stroke="#21160F" stroke-width="1.7"/>
                    <path d="M8 26H28C28 28.2 26.2 30 24 30H12C9.8 30 8 28.2 8 26Z" fill="#F5E8D7" stroke="#21160F" stroke-width="1.8"/>
                    <circle cx="14" cy="12" r="1" fill="#21160F"/><circle cx="18" cy="10.5" r="1" fill="#21160F"/><circle cx="22" cy="12" r="1" fill="#21160F"/>
                  </svg>
                </span>
                <span class="outlet-label">Quick Service (QSR)</span>
              </a>

              <!-- 3. Cloud Kitchen -->
              <a href="{{ route('solutions.cloud-kitchen') }}" class="outlet-item">
                <span class="outlet-illus">
                  <svg viewBox="0 0 36 36" fill="none">
                    <path d="M11 22H25V28H11V22Z" fill="#EAD5BC" stroke="#21160F" stroke-width="1.8"/>
                    <path d="M11 22C8.2 21.5 6.5 19 6.5 16.2C6.5 13 9 10.5 12.2 10.5C13.3 8.2 15.5 6.8 18 6.8C20.5 6.8 22.7 8.2 23.8 10.5C27 10.5 29.5 13 29.5 16.2C29.5 19 27.8 21.5 25 22" fill="#FAF3EB" stroke="#21160F" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M11 28H25V30H11V28Z" fill="#21160F"/>
                    <path d="M15 22V25M18 22V25M21 22V25" stroke="#876039" stroke-width="1.5" stroke-linecap="round"/>
                  </svg>
                </span>
                <span class="outlet-label">Cloud Kitchen</span>
              </a>

              <!-- 4. Family Restaurant -->
              <a href="{{ route('solutions.family-restaurant') }}" class="outlet-item">
                <span class="outlet-illus">
                  <svg viewBox="0 0 36 36" fill="none">
                    <circle cx="18" cy="19" r="9" fill="#EAD5BC" stroke="#21160F" stroke-width="1.8"/>
                    <circle cx="18" cy="19" r="5.5" fill="#FAF3EB" stroke="#876039" stroke-width="1.4"/>
                    <path d="M6 12V18C6 19.5 7 20.5 8 20.5V28M8 12V18M29 12C27.5 12 26.5 14.5 26.5 18.5H29V28" stroke="#21160F" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                </span>
                <span class="outlet-label">Family Restaurant</span>
              </a>

              <!-- 5. Multi-Cuisine -->
              <a href="{{ route('solutions.multi-cuisine-restaurant') }}" class="outlet-item">
                <span class="outlet-illus">
                  <svg viewBox="0 0 36 36" fill="none">
                    <path d="M7 19H29C28.5 25 23.8 29 18 29C12.2 29 7.5 25 7 19Z" fill="#EAD5BC" stroke="#21160F" stroke-width="1.8" stroke-linejoin="round"/>
                    <path d="M5 19H31" stroke="#21160F" stroke-width="1.8" stroke-linecap="round"/>
                    <path d="M14 19L24 7M17 19L27 9" stroke="#876039" stroke-width="1.8" stroke-linecap="round"/>
                    <path d="M11 13C11 11.5 12 10.5 12 9" stroke="#21160F" stroke-width="1.5" stroke-linecap="round"/>
                  </svg>
                </span>
                <span class="outlet-label">Multi-Cuisine</span>
              </a>

              <!-- 6. Takeaway Restaurant -->
              <a href="{{ route('solutions.takeaway-restaurant') }}" class="outlet-item">
                <span class="outlet-illus">
                  <svg viewBox="0 0 36 36" fill="none">
                    <path d="M9 13H27L25.5 29H10.5L9 13Z" fill="#EAD5BC" stroke="#21160F" stroke-width="1.8" stroke-linejoin="round"/>
                    <path d="M14 13V10C14 7.8 15.8 6 18 6C20.2 6 22 7.8 22 10V13" stroke="#21160F" stroke-width="1.8" stroke-linecap="round"/>
                    <rect x="14" y="18" width="8" height="6" rx="1.5" fill="#FAF3EB" stroke="#876039" stroke-width="1.5"/>
                  </svg>
                </span>
                <span class="outlet-label">Takeaway Restaurant</span>
              </a>

              <!-- 7. Bakeries & Cake Shops -->
              <a href="{{ route('solutions.bakery') }}" class="outlet-item">
                <span class="outlet-illus">
                  <svg viewBox="0 0 36 36" fill="none">
                    <path d="M8 17C8 12.5 11.5 10 16 10H24C27.5 10 30 12.5 30 16.5V26H10L8 17Z" fill="#21160F"/>
                    <path d="M6 18C6 13.8 9 11.5 13 11.5C17 11.5 19.5 13.8 19.5 18V27H6V18Z" fill="#FAF3EB" stroke="#21160F" stroke-width="1.8" stroke-linejoin="round"/>
                    <path d="M9.5 17C10.5 15.5 14.5 15.5 16 17" stroke="#C89659" stroke-width="1.6" stroke-linecap="round"/>
                  </svg>
                </span>
                <span class="outlet-label">Bakery &amp; Cake Shop</span>
              </a>

              <!-- 8. Pizzerias & Specialty -->
              <a href="{{ route('solutions.pizzerias') }}" class="outlet-item">
                <span class="outlet-illus">
                  <svg viewBox="0 0 36 36" fill="none">
                    <path d="M7 27L23 8C26.5 10.5 28.8 14 29.5 18.5L7 27Z" fill="#FAF3EB" stroke="#21160F" stroke-width="1.8" stroke-linejoin="round"/>
                    <path d="M23 8C26.8 10.5 29.2 14.2 30 19L26.5 20.3C25.8 16.3 23.8 13.2 20.6 10.8L23 8Z" fill="#EAD5BC" stroke="#21160F" stroke-width="1.7" stroke-linejoin="round"/>
                    <circle cx="18" cy="19" r="2" fill="#876039"/><circle cx="22" cy="16" r="1.6" fill="#21160F"/><circle cx="14" cy="22" r="1.5" fill="#21160F"/>
                  </svg>
                </span>
                <span class="outlet-label">Pizzeria &amp; Specialty</span>
              </a>

              <!-- 9. Bars & Breweries -->
              <a href="{{ route('solutions.bars-and-breweries') }}" class="outlet-item">
                <span class="outlet-illus">
                  <svg viewBox="0 0 36 36" fill="none">
                    <rect x="9" y="13" width="14" height="16" rx="2" fill="#EAD5BC" stroke="#21160F" stroke-width="1.8"/>
                    <path d="M23 16H26.5C27.9 16 29 17.1 29 18.5V23.5C29 24.9 27.9 26 26.5 26H23" stroke="#21160F" stroke-width="1.8" stroke-linecap="round"/>
                    <path d="M8 13C8 10.5 10 9 12 9.5C13 7.8 15.5 7.2 17.5 8.5C19.5 7.5 22 8.5 22.5 10.5C24 11 24.5 12.2 23.5 13.5H8Z" fill="#FAF3EB" stroke="#21160F" stroke-width="1.7" stroke-linejoin="round"/>
                    <path d="M13.5 18V25M18.5 18V25" stroke="#876039" stroke-width="1.6" stroke-linecap="round"/>
                  </svg>
                </span>
                <span class="outlet-label">Bar &amp; Brewery</span>
              </a>

              <!-- 10. Sweet Shop -->
              <a href="{{ route('solutions.sweet-shop') }}" class="outlet-item">
                <span class="outlet-illus">
                  <svg viewBox="0 0 36 36" fill="none">
                    <path d="M8 19C8 14 12.5 11 18 11C23.5 11 28 14 28 19V27C28 28.1 27.1 29 26 29H10C8.9 29 8 28.1 8 27V19Z" fill="#EAD5BC" stroke="#21160F" stroke-width="1.8"/>
                    <path d="M8 19C10.5 21 12.5 17 15 19C17.5 21 19.5 17 22 19C24.5 21 26 18 28 19" stroke="#21160F" stroke-width="1.8" stroke-linecap="round"/>
                    <circle cx="18" cy="9.5" r="2.5" fill="#876039" stroke="#21160F" stroke-width="1.6"/>
                  </svg>
                </span>
                <span class="outlet-label">Sweet &amp; Mithai Shop</span>
              </a>

              <!-- 11. Juice & Snack Shops -->
              <a href="{{ route('solutions.juice-and-snacks') }}" class="outlet-item">
                <span class="outlet-illus">
                  <svg viewBox="0 0 36 36" fill="none">
                    <path d="M11 13H25L23 29H13L11 13Z" fill="#EAD5BC" stroke="#21160F" stroke-width="1.8" stroke-linejoin="round"/>
                    <path d="M9.5 13H26.5L25.5 10H10.5L9.5 13Z" fill="#21160F"/>
                    <circle cx="18" cy="21" r="3.2" fill="#FAF3EB" stroke="#876039" stroke-width="1.5"/>
                    <path d="M19 10L21.5 5H24.5" stroke="#21160F" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                </span>
                <span class="outlet-label">Juice &amp; Snack Shop</span>
              </a>

              <!-- 12. College Canteen (Last Group) -->
              <a href="{{ route('solutions.college-canteen') }}" class="outlet-item">
                <span class="outlet-illus">
                  <svg viewBox="0 0 36 36" fill="none">
                    <path d="M5 14L18 8L31 14L18 20L5 14Z" fill="#EAD5BC" stroke="#21160F" stroke-width="1.8" stroke-linejoin="round"/>
                    <path d="M10 17V24C10 26.5 13.6 28.5 18 28.5C22.4 28.5 26 26.5 26 24V17" fill="#FAF3EB" stroke="#21160F" stroke-width="1.8" stroke-linecap="round"/>
                    <path d="M29 15V22" stroke="#876039" stroke-width="1.8" stroke-linecap="round"/>
                  </svg>
                </span>
                <span class="outlet-label">College Canteen</span>
              </a>

              <!-- 13. Office Canteen (Last) -->
              <a href="{{ route('solutions.office-canteen') }}" class="outlet-item">
                <span class="outlet-illus">
                  <svg viewBox="0 0 36 36" fill="none">
                    <rect x="9" y="7" width="18" height="22" rx="2" fill="#EAD5BC" stroke="#21160F" stroke-width="1.8"/>
                    <rect x="15" y="23" width="6" height="6" fill="#21160F"/>
                    <rect x="13" y="11" width="3" height="3" rx="0.5" fill="#FAF3EB" stroke="#21160F" stroke-width="1.3"/>
                    <rect x="20" y="11" width="3" height="3" rx="0.5" fill="#FAF3EB" stroke="#21160F" stroke-width="1.3"/>
                    <rect x="13" y="17" width="3" height="3" rx="0.5" fill="#FAF3EB" stroke="#21160F" stroke-width="1.3"/>
                    <rect x="20" y="17" width="3" height="3" rx="0.5" fill="#FAF3EB" stroke="#21160F" stroke-width="1.3"/>
                  </svg>
                </span>
                <span class="outlet-label">Office Canteen</span>
              </a>

              <!-- 14. Explore All Outlet Types -->
              <a href="{{ route('solutions') }}" class="outlet-item outlet-all">
                <span class="outlet-illus">
                  <svg viewBox="0 0 36 36" fill="none">
                    <rect x="7" y="9" width="22" height="19" rx="2.5" fill="#EAD5BC" stroke="#21160F" stroke-width="1.8"/>
                    <path d="M5 14L8 9H28L31 14C31 15.8 29.5 17 28 17C26.5 17 25.2 15.8 25 14.5C24.8 15.8 23.5 17 22 17C20.5 17 19.2 15.8 19 14.5C18.8 15.8 17.5 17 16 17C14.5 17 13.2 15.8 13 14.5C12.8 15.8 11.5 17 10 17C8.5 17 5 15.8 5 14Z" fill="#21160F"/>
                    <rect x="14" y="20" width="8" height="8" fill="#FAF3EB" stroke="#876039" stroke-width="1.6"/>
                  </svg>
                </span>
                <span class="outlet-label">All Outlet Types &rarr;</span>
              </a>
            </div>
          </div>
        </li>

        <!-- 3. Pricing -->
        <li class="nav-menu-item">
          <a href="{{ route('pricing') }}" class="nav-menu-link">Pricing</a>
        </li>

        <!-- 4. Contact -->
        <li class="nav-menu-item">
          <a href="{{ route('contact.us') }}" class="nav-menu-link {{ request()->routeIs('contact.us') ? 'nav-active' : '' }}">Contact</a>
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

      <li class="mobile-list-item" id="mobItemSolutions">
        <button type="button" class="mobile-accordion-btn" onclick="toggleMobSubmenu('mobItemSolutions')">
          <span>Solutions</span>
          <svg class="mobile-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
        </button>
        <div class="mobile-sub-menu">
          <a href="{{ route('solutions') }}" class="mobile-sub-link" onclick="closeGeniMobile()" style="font-weight: 600; color: #9C6F3E;"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"/><polyline points="13 2 13 9 20 9"/></svg> Explore All Solutions &rarr;</a>
          <a href="{{ route('solutions.dine-in-restaurant') }}" class="mobile-sub-link" onclick="closeGeniMobile()"><svg viewBox="0 0 24 24"><path d="M4 9h16M5 9v10M19 9v10M9 9V5h6v4M7 15h10"/></svg> Dine-in Restaurant</a>
          <a href="{{ route('solutions.qsr-restaurant') }}" class="mobile-sub-link" onclick="closeGeniMobile()"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg> Quick Service (QSR)</a>
          <a href="{{ route('solutions.cloud-kitchen') }}" class="mobile-sub-link" onclick="closeGeniMobile()"><svg viewBox="0 0 24 24"><path d="M18 10h-1.26A8 8 0 1 0 9 20h9a5 5 0 0 0 0-10z"/></svg> Cloud Kitchen</a>
          <a href="{{ route('solutions.family-restaurant') }}" class="mobile-sub-link" onclick="closeGeniMobile()"><svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg> Family Restaurant</a>
          <a href="{{ route('solutions.multi-cuisine-restaurant') }}" class="mobile-sub-link" onclick="closeGeniMobile()"><svg viewBox="0 0 24 24"><path d="M3 18h18M5 12h14v6H5zM12 4v8"/></svg> Multi-Cuisine Restaurant</a>
          <a href="{{ route('solutions.takeaway-restaurant') }}" class="mobile-sub-link" onclick="closeGeniMobile()"><svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/></svg> Takeaway Restaurant</a>
          <a href="{{ route('solutions.bakery') }}" class="mobile-sub-link" onclick="closeGeniMobile()"><svg viewBox="0 0 24 24"><path d="M18 8h1a4 4 0 0 1 0 8h-1"/><path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"/></svg> Bakeries & Cake Shops</a>
          <a href="{{ route('solutions.pizzerias') }}" class="mobile-sub-link" onclick="closeGeniMobile()"><svg viewBox="0 0 24 24"><path d="M21.21 15.89A10 10 0 1 1 8 2.83M22 12A10 10 0 0 0 12 2v10z"/></svg> Pizzerias & Specialty Food</a>
          <a href="{{ route('solutions.bars-and-breweries') }}" class="mobile-sub-link" onclick="closeGeniMobile()"><svg viewBox="0 0 24 24"><path d="M8 22h8M12 11v11"/></svg> Bars & Breweries</a>
          <a href="{{ route('solutions.sweet-shop') }}" class="mobile-sub-link" onclick="closeGeniMobile()"><svg viewBox="0 0 24 24"><polyline points="20 12 20 22 4 22 4 12"/><rect x="2" y="7" width="20" height="5"/></svg> Sweet Shop</a>
          <a href="{{ route('solutions.juice-and-snacks') }}" class="mobile-sub-link" onclick="closeGeniMobile()"><svg viewBox="0 0 24 24"><path d="M17 3v3H7V3M9 6v15M15 6v15"/></svg> Juice & Snack Shops</a>
          <a href="{{ route('solutions.college-canteen') }}" class="mobile-sub-link" onclick="closeGeniMobile()"><svg viewBox="0 0 24 24"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/></svg> College Canteen</a>
          <a href="{{ route('solutions.office-canteen') }}" class="mobile-sub-link" onclick="closeGeniMobile()"><svg viewBox="0 0 24 24"><rect x="4" y="2" width="16" height="20" rx="2" ry="2"/></svg> Office Canteen</a>
        </div>
      </li>

      <li class="mobile-list-item">
        <a href="{{ route('pricing') }}" class="mobile-direct-link" onclick="closeGeniMobile()">
          <span>Pricing</span>
          <span style="font-size: 13px; color: #9C6F3E;">&rarr;</span>
        </a>
      </li>

      <li class="mobile-list-item">
        <a href="{{ route('contact.us') }}" class="mobile-direct-link {{ request()->routeIs('contact.us') ? 'nav-active' : '' }}" onclick="closeGeniMobile()">
          <span>Contact</span>
          <span style="font-size: 13px; color: #9C6F3E;">&rarr;</span>
        </a>
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
