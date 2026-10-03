<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @php
        $lastSegment = last(request()->segments());
        $isHash = preg_match('/^[a-f0-9]{32,}$/', $lastSegment);
    @endphp

    <link rel="manifest" href="{{ asset('manifest.json') }}@if($isHash)?hash={{ $lastSegment }}@endif"
        crossorigin="use-credentials">

    {{--
    <link rel="manifest" href="{{ asset('manifest.json')}}">
    <meta name="theme-color" content="#ffffff">
    <meta name="description" content="{{ global_setting()->name }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/images/geni-favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/images/geni-favicon.png') }}">

    @if (File::exists(public_path('user-uploads/favicons/super-admin/apple-touch-icon.png')))
        <link rel="apple-touch-icon" sizes="180x180"
            href="{{ asset('user-uploads/favicons/super-admin/apple-touch-icon.png') }}">
    @endif
    @if (File::exists(public_path('user-uploads/favicons/super-admin/android-chrome-192x192.png')))
        <link rel="icon" type="image/png" sizes="192x192"
            href="{{ asset('user-uploads/favicons/super-admin/android-chrome-192x192.png') }}">
    @endif
    @if (File::exists(public_path('user-uploads/favicons/super-admin/android-chrome-512x512.png')))
        <link rel="icon" type="image/png" sizes="512x512"
            href="{{ asset('user-uploads/favicons/super-admin/android-chrome-512x512.png') }}">
    @endif
    @if (File::exists(public_path('user-uploads/favicons/super-admin/favicon-16x16.png')))
        <link rel="icon" type="image/png" sizes="16x16"
            href="{{ asset('user-uploads/favicons/super-admin/favicon-16x16.png') }}">
    @endif
    @if (File::exists(public_path('user-uploads/favicons/super-admin/favicon-32x32.png')))
        <link rel="icon" type="image/png" sizes="32x32"
            href="{{ asset('user-uploads/favicons/super-admin/favicon-32x32.png') }}">
    @endif
    @if (File::exists(public_path('user-uploads/favicons/super-admin/favicon.ico')))
        <link rel="shortcut icon" href="{{ asset('user-uploads/favicons/super-admin/favicon.ico') }}">
    @endif
    @if (File::exists(public_path('user-uploads/favicons/super-admin/site.webmanifest')))
        <link rel="manifest" href="{{ asset('user-uploads/favicons/super-admin/site.webmanifest') }}">
    @endif
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ global_setting()->logoUrl }}">
    {{-- @if (global_setting()->meta_keyword)
    <meta name="keyword" content="{{ global_setting()->meta_keyword ?? '' }}">
    @endif
    @if (global_setting()->meta_description)
    <meta name="description" content="{{ global_setting()->meta_description ?? '' }}">
    @endif
    <title>{{ global_setting()->name }}</title> --}}


    <link rel="icon" type="image/png" href="{{ asset('assets/images/geni-favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/images/geni-favicon.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>{{ $meta['title'] ?? 'Geni Menu | All-in-one Restaurant Billing and Management Software' }}</title>
    <meta name="description"
        content="{{ $meta['description'] ?? 'Best Restaurant Billing Software for smooth operations, fast service, and exceptional dining experiences.' }}">
    <meta name="keywords"
        content="{{ $meta['keywords'] ?? 'restaurant ERP software, restaurant billing software, POS for restaurants, inventory management for restaurants, staff scheduling software, restaurant accounting software, Geni Fast ERP, India restaurant ERP, cloud restaurant software, table reservation system, kitchen display system, multi-branch restaurant ERP, GST billing software, digital menu software, restaurant analytics, restaurant CRM, food delivery integration, mobile POS for restaurants, online ordering system, restaurant operations management' }}">
    <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large">
    <link rel="canonical" href="{{ url()->current() }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:title"
        content="{{ $meta['title'] ?? 'Geni Menu | All-in-one Restaurant Billing and Management Software' }}">
    <meta property="og:description"
        content="{{ $meta['description'] ?? 'Best Restaurant Billing Software for smooth operations, fast service, and exceptional dining experiences.' }}">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:site_name" content="Geni Fast">
    <meta property="og:updated_time" content="2025-01-25T12:00:00+05:30">
    <meta property="og:image" content="{{ asset('landing/geni-restaurant-logo.jpg') }}">
    <meta property="og:image:secure_url" content="{{ asset('landing/geni-restaurant-logo.jpg') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">
    <meta property="og:image:alt" content="Geni Menu Logo">
    <meta property="og:image:type" content="image/jpg">


    <!-- Geo‑location metadata -->
    <meta name="geo.region" content="IN-TN">
    <meta name="geo.placename" content="Tiruchengode, Tamil Nadu">
    <meta name="geo.position" content="11.378476;77.894493">
    <meta name="ICBM" content="11.378476, 77.894493">


    <meta name="twitter:card" content="Geni Menu">
    <meta name="twitter:title"
        content="{{ $meta['title'] ?? 'Geni Menu | All-in-one Restaurant Billing and Management Software' }}">
    <meta name="twitter:description"
        content="{{ $meta['keywords'] ?? 'restaurant ERP software, restaurant billing software, POS for restaurants, inventory management for restaurants, staff scheduling software, restaurant accounting software, Geni Fast ERP, India restaurant ERP, cloud restaurant software, table reservation system, kitchen display system, multi-branch restaurant ERP, GST billing software, digital menu software, restaurant analytics, restaurant CRM, food delivery integration, mobile POS for restaurants, online ordering system, restaurant operations management' }}">
    <meta name="twitter:image" content="{{ asset('landing/geni-restaurant-logo') }}">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />



    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-RZEH19E1PJ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'G-RZEH19E1PJ');
    </script>


    <style>
        /* Footer styles */
        .footer {
            background-color: var(--bg2, #f8f6f1);
            padding: 60px 20px 20px;
            border-top: 1px solid var(--line, rgba(135, 96, 57, 0.14));
        }

        @media (min-width: 768px) {
            .footer-container {
                display: flex;
                flex-wrap: wrap;
                max-width: 1240px;
                margin: auto;
                gap: 30px;
                padding-bottom: 40px;
            }
        }

        /* Column widths for desktop */
        .footer-column.col-5 {
            flex: 0 0 33.33%;
        }

        .footer-column.col-2 {
            flex: 0 0 13%;
        }

        .footer-column.col-3 {
            flex: 0 0 16.66%;
        }

        .footer-column.col-4 {
            flex: 0 0 29%;
        }

        /* Logo styling */
        .footer-logo img {
            height: 48px;
            width: auto;
            object-fit: contain;
            margin-bottom: 20px;
        }

        /* Headings */
        .footer h5 {
            color: var(--ink, #241A14);
            font-weight: 700;
            margin-bottom: 20px;
            font-size: 18px;
        }

        /* Text */
        .footer p {
            color: var(--mute, #6F665E);
            font-size: 15px;
            line-height: 1.6;
            margin-bottom: 10px;
        }

        /* Links */
        .footer a {
            text-decoration: none;
            color: var(--mute, #6F665E);
            display: block;
            margin-bottom: 12px;
            transition: color 0.3s ease;
            font-size: 15px;
        }

        .footer a:hover {
            color: var(--br, #876039);
        }

        /* Social icons */
        .social-icons {
            display: flex;
            gap: 12px;
            margin-top: 16px;
        }

        .social-icons a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 42px;
            height: 42px;
            border: 1px solid var(--br, #876039);
            border-radius: 50%;
            color: var(--br, #876039);
            font-size: 18px;
            transition: all 0.3s ease;
        }

        .social-icons a:hover,
        .social-icons a:active {
            background-color: var(--br, #876039);
            color: #fff;
        }
        
        .footer-bottom {
            max-width: 1240px;
            margin: 0 auto;
            padding-top: 24px;
            border-top: 1px solid var(--line, rgba(135, 96, 57, 0.14));
            text-align: center;
        }
        .footer-bottom span {
            color: var(--mute, #6F665E);
            font-size: 14px;
        }
        .footer-bottom a {
            display: inline;
            color: var(--br, #876039);
        }
        .footer-bottom a:hover {
            text-decoration: underline;
        }

        /* Responsive layout */
        @media (max-width: 768px) {
            .footer-container {
                display: flex;
                flex-direction: column;
                gap: 30px;
            }
            .footer-column.col-4,
            .footer-column.col-2,
            .footer-column.col-3,
            .footer-column.col-5 {
                flex: 0 0 100%;
                max-width: 100%;
            }
        }

        .nav-link {
            color: #555;
            /* Default text color */
            text-decoration: none;
            font-weight: normal;
        }

        .nav-link.active {
            color: #876039;
            /* Your theme color */
            font-weight: bold;
        }

        .fnav-link {
            color: #555;
            /* Default text color */
            text-decoration: none;
            font-weight: normal;
        }

        .fnav-link.active {
            color: #876039;
            /* Your theme color */

        }
    </style>

    @include('sections.theme_style', ['baseColor' => global_setting()->theme_rgb, 'baseColorHex' => global_setting()->theme_hex])

</head>

<body class="font-sans antialiased :bg-gray-900">

    <div class="">
        @include('layouts.partials.zoho-navbar')

        <div class="flex overflow-hidden mx-auto :bg-gray-900">
            <div id="main-content" class="w-full h-full overflow-y-auto :bg-gray-900 main-container">
                <main>

                    @yield('content')

                    {{ $slot ?? '' }}
                </main>
            </div>
        </div>

    </div>

    @stack('modals')

    <footer class="footer">
        <div class="footer-container">

            <!-- Logo & Description -->
            <div class="footer-column col-5">
                <div class="footer-logo">
                    <img src="{{ asset('assets/images/geni-menu-logo-light.png') }}" alt="Geni Menu Logo" style="height: 48px; width: auto; object-fit: contain;">
                </div>
                <p style="text-align: justify; padding-right: 30px;">
                    <strong>All-in-one restaurant billing and management software</strong> for handle orders, payments,
                    and reports with ease. Manage daily operations efficiently, improve service quality, and keep
                    customers satisfied.
                </p>
            </div>

            <!-- Useful Links -->
            <div class="footer-column col-2">
                <h5>Useful Links</h5>
                <a href="{{ route('home') }}" class="fnav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
                <a href="{{ route('about.us') }}"
                    class=" fnav-link {{ request()->routeIs('about.us') ? 'active' : '' }}">About Us</a>
                <a href="{{ route('features') }}"
                    class="fnav-link {{ request()->routeIs('features') ? 'active' : '' }}">Features</a>
                <a href="{{ route('pricing') }}"
                    class="fnav-link {{ request()->routeIs('pricing') ? 'active' : '' }}">Pricing</a>
                <a href="{{ route('how-it-works') }}"
                    class="fnav-link {{ request()->routeIs('how-it-works') ? 'active' : '' }}">How It Works</a>
                <a href="{{ route('faq-help') }}"
                    class="fnav-link {{ request()->routeIs('faq-help') ? 'active' : '' }}">FAQ & Help</a>
                <a href="{{ route('contact.us') }}"
                    class="fnav-link {{ request()->routeIs('contact.us') ? 'active' : '' }}">Contact Us</a>
            </div>

            <!-- Policies -->
            <div class="footer-column col-3">
                <h5>Policies</h5>
                <a href="{{ route('privacy-and-policy') }}"
                    class="fnav-link {{ request()->routeIs('privacy-and-policy') ? 'active' : '' }}">Privacy Policy</a>
                <a href="{{ route('terms-and-conditions') }}"
                    class="fnav-link {{ request()->routeIs('terms-and-conditions') ? 'active' : '' }}">Terms &
                    Conditions</a>
                <a href="{{ route('compliance') }}"
                    class="fnav-link {{ request()->routeIs('compliance') ? 'active' : '' }}">Compliances</a>
                <a href="{{ route('terms-of-use') }}"
                    class="fnav-link {{ request()->routeIs('terms-of-use') ? 'active' : '' }}">Terms of Use</a>
                <a href="{{ route('cancellation-and-refund-policy') }}"
                    class="fnav-link {{ request()->routeIs('cancellation-and-refund-policy') ? 'active' : '' }}">Cancelling
                    & Refund Policy</a>
            </div>

            <!-- Follow Us -->
            <div class="footer-column col-4">
                <h5>Follow Us</h5>
                <p>Stay connected with WeGeni and get the latest updates on our services,
                    industry trends, and exciting new projects.</p>
                <div class="social-icons">
                    <a href="https://www.linkedin.com/company/wegeniofficial" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
                    <a href="https://www.facebook.com/wegeniofficial" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                    <a href="https://www.instagram.com/wegeniofficial" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                    <a href="https://x.com/wegeniofficial" aria-label="Twitter"><i class="bi bi-twitter"></i></a>
                    <a href="https://wegeni.com/" aria-label="Website"><i class="bi bi-globe"></i></a>
                </div>
            </div>

        </div>
        <div class="footer-bottom">
            <span>© {{ now()->year }} <a href="{{ route('home') }}">{{ global_setting()->name }}</a>. @lang('landing.rightsReserved')</span>
        </div>
    </footer>
    @livewireScripts
    @include('layouts.update-uri')
    <x-livewire-alert::flash />
    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('{{ asset('service-worker.js') }}')
                    .then(registration => {
                        console.log('Service Worker registered:', registration);
                    })
                    .catch(error => {
                        console.log('Service Worker registration failed:', error);
                    });
            });
        }
    </script>
    <script>

        window.addEventListener('beforeinstallprompt', (event) => {
            event.preventDefault();
            deferredPrompt = event;
            setTimeout(() => {
                const isMobile = /Android|iPhone|iPad|iPod/i.test(navigator.userAgent);
                if (isMobile) {
                    deferredPrompt.prompt(); // This triggers the install prompt
                    deferredPrompt.userChoice.then((choiceResult) => {
                        if (choiceResult.outcome === 'accepted') {
                            console.log('User accepted the A2HS prompt');
                        } else {
                            console.log('User dismissed the A2HS prompt');
                        }
                        deferredPrompt = null;
                    });
                }
            }, 1000);
        });

    </script>


    <!-- Floating Book Demo Button -->
    <button id="floatingDemoBtn" class="floating-demo-btn">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
        <span>Book a Demo</span>
    </button>

    <!-- Popup Lead Modal -->
    <div id="popupLeadModal" class="popup-modal-overlay">
        <div class="popup-modal-content popup-with-image">
            <button class="popup-close-btn" id="closePopupModal">&times;</button>
            <div class="popup-left-side" style="padding: 0; background: none;">
                <img src="{{ asset('landing/popup-side-image.jpg') }}" alt="Geni Menu" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            <div class="popup-right-side">
                <div class="popup-header">
                    <h3>Get Started with Geni Menu</h3>
                    <p>Fill out the form below and our team will get in touch with you shortly.</p>
                </div>
                <form action="{{ route('popup.lead.store') }}" method="POST" class="popup-form">
                    @csrf
                    <div class="form-group">
                        <label>Full Name *</label>
                        <input type="text" name="full_name" required placeholder="John Doe">
                    </div>
                    <div class="form-group">
                        <label>Email Address *</label>
                        <input type="email" name="email" required placeholder="john@example.com">
                    </div>
                    <div class="form-group">
                        <label>Phone Number *</label>
                        <input type="tel" name="phone" required placeholder="+1 234 567 890">
                    </div>
                    <div class="form-group">
                        <label>Restaurant Name *</label>
                        <input type="text" name="restaurant_name" required placeholder="Geni's Cafe">
                    </div>
                    <div class="form-group">
                        <label>City *</label>
                        <input type="text" name="city" required placeholder="New York">
                    </div>
                    <button type="submit" class="submit-btn">Submit Request</button>
                </form>
            </div>
        </div>
    </div>

    <style>
        /* Floating Button */
        .floating-demo-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background-color: #876039;
            color: #fff;
            border: none;
            padding: 14px 24px;
            border-radius: 50px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 600;
            font-size: 15px;
            box-shadow: 0 4px 15px rgba(135, 96, 57, 0.4);
            cursor: pointer;
            z-index: 999;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
        }
        .floating-demo-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(135, 96, 57, 0.5);
            background-color: #72502f;
        }

        @media (max-width: 640px) {
            .floating-demo-btn {
                bottom: 16px;
                right: 16px;
                padding: 10px 16px;
                font-size: 13px;
                border-radius: 40px;
                box-shadow: 0 3px 12px rgba(135, 96, 57, 0.35);
                gap: 6px;
            }
            .floating-demo-btn svg {
                width: 16px;
                height: 16px;
            }
        }

        /* Modal Overlay */
        .popup-modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            z-index: 10000;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
            backdrop-filter: blur(4px);
        }
        .popup-modal-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        /* Modal Content */
        .popup-modal-content {
            background: #fff;
            width: 100%;
            max-width: 450px;
            border-radius: 16px;
            position: relative;
            transform: scale(0.95);
            transition: transform 0.3s ease;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            font-family: 'Inter', sans-serif;
            overflow: hidden;
        }
        .popup-modal-content.popup-with-image {
            max-width: 800px;
            display: flex;
            padding: 0;
        }
        .popup-left-side {
            display: none;
        }
        .popup-right-side {
            padding: 40px 30px;
            flex: 1;
        }
        @media (min-width: 768px) {
            .popup-left-side {
                display: flex;
                flex: 1.1;
                background: linear-gradient(135deg, #876039 0%, #a67c52 100%);
                padding: 40px;
                flex-direction: column;
                justify-content: space-between;
                position: relative;
                color: #fff;
            }
            .popup-brand {
                position: relative;
                z-index: 2;
            }
            .popup-logo-img {
                height: 48px;
                width: auto;
                object-fit: contain;
                margin-bottom: 20px;
            }
            .popup-brand h4 {
                font-family: 'Plus Jakarta Sans', sans-serif;
                font-size: 22px;
                font-weight: 700;
                margin: 0 0 20px;
                line-height: 1.3;
            }
            .popup-features {
                list-style: none;
                padding: 0;
                margin: 0;
            }
            .popup-features li {
                display: flex;
                align-items: center;
                gap: 12px;
                margin-bottom: 12px;
                font-size: 15px;
                font-weight: 500;
                opacity: 0.9;
            }
            .popup-features li svg {
                width: 20px;
                height: 20px;
                color: #fff;
            }
        }
        
        .popup-modal-overlay.active .popup-modal-content {
            transform: scale(1);
        }

        @media (max-width: 767px) {
            .popup-modal-content {
                width: calc(100% - 32px);
                margin: 16px;
                max-height: 90vh;
                overflow-y: auto;
                -webkit-overflow-scrolling: touch;
            }
            .popup-right-side {
                padding: 24px 18px;
            }
            .popup-header h3 {
                font-size: 19px;
            }
            .popup-form input {
                padding: 10px 14px;
                font-size: 14px;
            }
            .popup-form .submit-btn {
                padding: 12px;
                font-size: 15px;
            }
        }

        /* Close Button */
        .popup-close-btn {
            position: absolute;
            top: 15px;
            right: 15px;
            background: rgba(0,0,0,0.05);
            border: none;
            font-size: 20px;
            color: #555;
            cursor: pointer;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.2s, color 0.2s;
            z-index: 10;
        }
        .popup-close-btn:hover {
            color: #111;
            background: rgba(0,0,0,0.1);
        }

        /* Header */
        .popup-header {
            margin-bottom: 24px;
            text-align: left;
        }
        .popup-header h3 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 22px;
            font-weight: 700;
            color: #1a1a1a;
            margin: 0 0 8px;
        }
        .popup-header p {
            font-size: 14px;
            color: #666;
            margin: 0;
            line-height: 1.5;
        }

        /* Form */
        .popup-form .form-group {
            margin-bottom: 16px;
        }
        .popup-form label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #444;
            margin-bottom: 6px;
        }
        .popup-form input {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.2s, box-shadow 0.2s;
            font-family: 'Inter', sans-serif;
            background: #fdfdfd;
        }
        .popup-form input:focus {
            outline: none;
            border-color: #876039;
            box-shadow: 0 0 0 3px rgba(135, 96, 57, 0.1);
            background: #fff;
        }
        
        /* Submit Button */
        .popup-form .submit-btn {
            width: 100%;
            padding: 14px;
            background: #876039;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            font-family: 'Plus Jakarta Sans', sans-serif;
            cursor: pointer;
            margin-top: 10px;
            transition: background 0.2s, transform 0.1s;
        }
        .popup-form .submit-btn:hover {
            background: #72502f;
        }
        .popup-form .submit-btn:active {
            transform: scale(0.98);
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const modal = document.getElementById("popupLeadModal");
            const btn = document.getElementById("floatingDemoBtn");
            const closeBtn = document.getElementById("closePopupModal");

            // Auto show on load (once per session)
            if(modal && !sessionStorage.getItem('geniPopupShown')) {
                setTimeout(() => {
                    modal.classList.add("active");
                    sessionStorage.setItem('geniPopupShown', 'true');
                }, 1500); // 1.5 second delay
            }

            // Open modal on button click
            if(btn && modal) {
                btn.addEventListener("click", () => {
                    modal.classList.add("active");
                });
            }

            // Close modal on close button click
            if(closeBtn && modal) {
                closeBtn.addEventListener("click", () => {
                    modal.classList.remove("active");
                });
            }

            // Close modal on outside click
            if(modal) {
                window.addEventListener("click", (e) => {
                    if(e.target === modal) {
                        modal.classList.remove("active");
                    }
                });
            }

            // Success alert if session has success message
            @if(session('success'))
                alert("{{ session('success') }}");
            @endif
        });
    </script>


    @stack('scripts')
</body>

</html>