@php
    $meta = [
        'title' => 'Geni Menu - Best Restaurant Billing Software in India | POS & ERP',
        'description' => 'Geni Menu is India\'s best restaurant billing software with POS, QR code menu, inventory, staff & multi-branch management. Book a free demo today.',
        'keywords' => 'restaurant billing software, restaurant billing software India, restaurant POS software, restaurant management software, restaurant ERP software, cloud restaurant software, POS for restaurants, GST billing software for restaurants, QR code menu software, digital menu software, best restaurant software India, restaurant software Tamil Nadu, restaurant billing app, restaurant management system, POS software for restaurants India, online restaurant billing software, restaurant billing machine software, restaurant software for small business, hotel billing software, restaurant billing software free trial, restaurant order management software, cloud based POS system, restaurant software company India, food billing software, restaurant automation software, smart restaurant software, restaurant tech solutions, all in one restaurant software, restaurant operations software, best POS system for restaurants, restaurant software with inventory, restaurant CRM software, restaurant analytics software, mobile POS app for restaurants, restaurant billing solution, cafe billing software, hotel POS software, restaurant chain management software, Geni Menu software, Geni Menu restaurant billing, Geni Menu POS, Geni Menu app, best billing software for restaurants 2026, restaurant management app India, digital restaurant billing system, restaurant software near me, top restaurant POS software India',
    ];
@endphp

@extends('layouts.frontend-master')



@section('content')
    <style>
        /* Overlay */
        .popup-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.55);
            backdrop-filter: blur(8px);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            animation: fadeOverlay 0.4s ease forwards;
        }

        /* Card */
        .popup-card {
            background: #ffffff;
            width: 90%;
            max-width: 380px;
            padding: 30px 28px;
            border-radius: 16px;
            box-shadow: 0 30px 80px rgba(0, 0, 0, 0.15);
            position: relative;
            transform: translateY(40px) scale(0.95);
            opacity: 0;
            animation: popupEnter 0.5s ease forwards;
        }

        /* Close */
        .popup-close {
            position: absolute;
            top: 14px;
            right: 18px;
            font-size: 22px;
            cursor: pointer;
            color: #aaa;
            transition: 0.3s;
        }

        .popup-close:hover {
            color: #876039;
            transform: rotate(90deg);
        }

        /* Heading */
        .popup-card h2 {
            text-align: center;
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 6px;
        }

        .popup-card p {
            text-align: center;
            font-size: 13px;
            color: #666;
            margin-bottom: 20px;
        }

        .popup-card small {
            text-align: center;
            font-size: 10px;
            color: #818181;
        }

        /* Inputs - Smaller & Minimal */
        .popup-card input {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 12px;
            border-radius: 8px;
            border: 1px solid #eee;
            font-size: 13px;
            transition: 0.3s;
            background: #fafafa;
        }

        .popup-card input:focus {
            border-color: #876039;
            background: #fff;
            box-shadow: 0 0 0 3px rgba(135, 96, 57, 0.15);
            outline: none;
        }

        /* Button */
        .popup-card button {
            width: 100%;
            padding: 11px;
            margin-top: 15px;
            border-radius: 8px;
            border: none;
            background: #876039;
            color: #fff;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: 0.3s;
        }

        .popup-card button:hover {
            background: #6d4b2c;
            box-shadow: 0 8px 20px rgba(135, 96, 57, 0.3);
        }

        /* Success Screen */
        .popup-success {
            text-align: center;
            padding: 20px 15px;
            background: rgba(135, 96, 57, 0.08);
            border-radius: 12px;
            animation: fadeOverlay 0.4s ease forwards;
        }

        .popup-success .tick {
            font-size: 40px;
            color: #876039;
            margin-bottom: 10px;
            animation: popTick 0.4s ease forwards;
        }

        .popup-success h3 {
            font-size: 18px;
            margin-bottom: 6px;
            color: #876039;
        }

        .popup-success p {
            font-size: 13px;
            color: #555;
        }

        .success-icon {
            width: 70px;
            height: 70px;
            margin: 0 auto 15px;
            animation: scaleIn 0.4s ease forwards;
        }

        .success-icon svg {
            width: 100%;
            height: 100%;
        }

        .check-path {
            stroke-dasharray: 50;
            stroke-dashoffset: 50;
            animation: drawCheck 0.6s ease forwards 0.3s;
        }


        .popup-logo {
            text-align: center;
            margin-bottom: 12px;
            animation: fadeOverlay 0.6s ease forwards;
            justify-content: center;
            display: flex;
        }

        .popup-logo img {
            max-width: 140px;
            height: auto;
            opacity: 0;
            animation: logoFade 0.6s ease forwards 0.2s;
        }

        /* Smooth logo fade-in */
        @keyframes logoFade {
            to {
                opacity: 1;
            }
        }


        /* Animation */
        @keyframes drawCheck {
            to {
                stroke-dashoffset: 0;
            }
        }

        @keyframes scaleIn {
            from {
                transform: scale(0);
                opacity: 0;
            }

            to {
                transform: scale(1);
                opacity: 1;
            }
        }


        /* Animations */
        @keyframes popupEnter {
            to {
                transform: translateY(0) scale(1);
                opacity: 1;
            }
        }

        @keyframes fadeOverlay {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes popTick {
            from {
                transform: scale(0);
            }

            to {
                transform: scale(1);
            }
        }
    </style>




    <section class="bg-white ">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12">

            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl lg:text-6xl"
                style="color:#876039;">
                @lang('landing.heroTitle')
            </h1>
            <h1 class="mb-8 text-lg font-normal md:text-5xl lg:text-6xl" style="color:#876039;">
                @lang('landing.heroSubTitle')
            </h1>
            {{-- <div
                class="flex flex-col mb-8 lg:mb-16 space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4 rtl:space-x-reverse">
                <a href="{{ route('restaurant_signup') }}"
                    class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-skin-base hover:bg-skin-base/[0.7] focus:ring-4 focus:ring-skin-base dark:focus:ring-skin-base">
                    @if($trialPackage)
                    @lang('landing.startTrial', ['days' => $trialPackage->trial_days])
                    @else
                    @lang('landing.getStartedFree')
                    @endif
                    <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>

            </div> --}}

            <div class="relative  max-w-screen-lg flex justify-center mx-auto">
                <img src="{{ asset('assets/images/dash.png') }}" alt="Dashboard Image">

                <!-- SVG Element -->
                <div class="hidden md:block absolute top-0 end-0 -translate-y-12 translate-x-20">
                    <svg class="w-16 h-auto text-skin-base" width="400" height="650" viewBox="0 0 100 100" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 16.4754C11.7688 27.4499 21.2452 57.3224 5 89.0164" stroke="currentColor"
                            stroke-width="10" stroke-linecap="round" />
                        <path d="M33.6761 112.104C44.6984 98.1239 74.2618 57.6776 83.4821 5" stroke="currentColor"
                            stroke-width="10" stroke-linecap="round" />
                        <path d="M50.5525 130C68.2064 127.495 110.731 117.541 116 78.0874" stroke="currentColor"
                            stroke-width="10" stroke-linecap="round" />
                    </svg>
                </div>
                <!-- End SVG Element -->

                <!-- SVG Element -->
                <div class="hidden md:block absolute bottom-0 start-0 translate-y-10 -translate-x-32">
                    <svg class="w-40 h-auto theme-color  " width="347" height="188" viewBox="0 0 347 188" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M4 82.4591C54.7956 92.8751 30.9771 162.782 68.2065 181.385C112.642 203.59 127.943 78.57 122.161 25.5053C120.504 2.2376 93.4028 -8.11128 89.7468 25.5053C85.8633 61.2125 130.186 199.678 180.982 146.248L214.898 107.02C224.322 95.4118 242.9 79.2851 258.6 107.02C274.299 134.754 299.315 125.589 309.861 117.539L343 93.4426"
                            stroke="currentColor" stroke-width="7" stroke-linecap="round" />
                    </svg>
                </div>
                <!-- End SVG Element -->
            </div>

        </div>
    </section>

    <!-- Features -->
    {{-- <div class="max-w-7xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto space-y-8">

        <div class="mx-auto mb-8 lg:mb-14 text-center">
            <h2 class="text-3xl lg:text-4xl text-gray-800 font-bold dark:text-neutral-200">
                @lang('landing.featureSection1')
            </h2>
        </div>

        <div class="md:grid md:grid-cols-2 md:items-center md:gap-12 xl:gap-32">
            <div>
                <img class="rounded-xl border border-gray-100 shadow" src="{{ asset('landing/Untitled design (1).png') }}"
                    alt="order management">
            </div>

            <div class="mt-5 sm:mt-10 lg:mt-0">
                <div class="space-y-6 sm:space-y-8">
                    <div class="space-y-2 md:space-y-4">
                        <h2 class="font-bold text-3xl lg:text-4xl text-gray-800 dark:text-neutral-200">
                            @lang('landing.featureTitle1')
                        </h2>
                        <p class="text-gray-500 dark:text-neutral-500">
                            @lang('landing.featureDescription1')
                        </p>
                    </div>

                </div>
            </div>
        </div>

        <div class="md:grid md:grid-cols-2 md:items-center md:gap-12 xl:gap-32">

            <div class="mt-5 sm:mt-10 lg:mt-0">
                <div class="space-y-6 sm:space-y-8">
                    <div class="space-y-2 md:space-y-4">
                        <h2 class="font-bold text-3xl lg:text-4xl text-gray-800 dark:text-neutral-200">
                            @lang('landing.featureTitle2')
                        </h2>
                        <p class="text-gray-500 dark:text-neutral-500">
                            @lang('landing.featureDescription2')
                        </p>
                    </div>

                </div>
            </div>
            <div>
                <img class="rounded-xl border border-gray-100 shadow" src="{{ asset('landing/reservations.png') }}"
                    alt="order management">
            </div>

        </div>

        <div class="md:grid md:grid-cols-2 md:items-center md:gap-12 xl:gap-32">
            <div>
                <img class="rounded-xl border border-gray-100 shadow" src="{{ asset('landing/menu.png') }}"
                    alt="order management">
            </div>

            <div class="mt-5 sm:mt-10 lg:mt-0">
                <div class="space-y-6 sm:space-y-8">
                    <div class="space-y-2 md:space-y-4">
                        <h2 class="font-bold text-3xl lg:text-4xl text-gray-800 dark:text-neutral-200">
                            @lang('landing.featureTitle3')
                        </h2>
                        <p class="text-gray-500 dark:text-neutral-500">
                            @lang('landing.featureDescription3')
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div> --}}
    <!-- End Features -->

    <!-- Icon Blocks -->
    <div class="max-w-7xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto" id="icon-features">

        <!-- Title -->
        <div class="mx-auto  mb-9 lg:mb-14 text-center">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-800">
                @lang('landing.featureSection2')
            </h2>
            <!-- <h2 class="text-3xl lg:text-4xl text-gray-800 font-bold mb-5">
                            @lang('landing.featureSection2.1')
                        </h2> -->
            <p class="text-gray-500 dark:text-neutral-500">
                @lang('landing.featureSection2.2')
            </p>
        </div>
        <!-- End Title -->

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-12">

            <!-- Icon Block -->
            <div>
                <div class="relative flex justify-center  items-center size-12 bg-white rounded-xl before:absolute before:-inset-px before:-z-[1] before:bg-gradient-to-br before:from-gray-700 before:via-transparent before:to-gray-600 before:rounded-xl dark:bg-neutral-900"
                    style="justify-self: center">
                    <img src="{{ asset('assets/images/1.png') }}" alt="icon" class="size-6" />
                </div>

                <div class="mt-5" style="text-align: center;">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white" style="color:#876039;">
                        @lang('landing.iconFeature1')
                    </h3>
                    <p class="mt-1 text-gray-600 dark:text-neutral-400">@lang('landing.iconFeatureDesc1')</p>
                </div>
            </div>
            <!-- End Icon Block -->

            <!-- Icon Block -->
            <div>
                {{-- <div
                    class="relative flex justify-center items-center size-12 bg-white rounded-xl before:absolute before:-inset-px before:-z-[1] before:bg-gradient-to-br before:from-gray-700 before:via-transparent before:to-gray-600 before:rounded-xl dark:bg-neutral-900 "
                    style="justify-self: center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-qr-code-scan text-skin-base dark:text-skin-base size-6" viewBox="0 0 16 16">
                        <path
                            d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm6.226 5.385c-.584 0-.937.164-.937.593 0 .468.607.674 1.36.93 1.228.415 2.844.963 2.851 2.993C11.5 11.868 9.924 13 7.63 13a7.7 7.7 0 0 1-3.009-.626V9.758c.926.506 2.095.88 3.01.88.617 0 1.058-.165 1.058-.671 0-.518-.658-.755-1.453-1.041C6.026 8.49 4.5 7.94 4.5 6.11 4.5 4.165 5.988 3 8.226 3a7.3 7.3 0 0 1 2.734.505v2.583c-.838-.45-1.896-.703-2.734-.703" />
                    </svg>
                </div> --}}
                <div class="relative flex justify-center items-center size-12 bg-white rounded-xl before:absolute before:-inset-px before:-z-[1] before:bg-gradient-to-br before:from-gray-700 before:via-transparent before:to-gray-600 before:rounded-xl dark:bg-neutral-900"
                    style="justify-self: center">
                    <img src="{{ asset('assets/images/2.png') }}" alt="icon" class="size-6" />
                </div>

                <div class="mt-5" style="text-align: center;">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white" style="color:#876039;">
                        @lang('landing.iconFeature2')
                    </h3>
                    <p class="mt-1 text-gray-600 dark:text-neutral-400">@lang('landing.iconFeatureDesc2')</p>
                </div>
            </div>
            <!-- End Icon Block -->

            <!-- Icon Block -->
            <div>
                {{-- <div
                    class="relative flex justify-center items-center size-12 bg-white rounded-xl before:absolute before:-inset-px before:-z-[1] before:bg-gradient-to-br before:from-gray-700 before:via-transparent before:to-gray-600 before:rounded-xl dark:bg-neutral-900"
                    style="justify-self: center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-qr-code-scan text-skin-base dark:text-skin-base size-6" viewBox="0 0 16 16">
                        <path
                            d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4" />
                    </svg>
                </div> --}}
                <div class="relative flex justify-center items-center size-12 bg-white rounded-xl before:absolute before:-inset-px before:-z-[1] before:bg-gradient-to-br before:from-gray-700 before:via-transparent before:to-gray-600 before:rounded-xl dark:bg-neutral-900"
                    style="justify-self: center">
                    <img src="{{ asset('assets/images/3.png') }}" alt="icon" class="size-6" />
                </div>

                <div class="mt-5" style="text-align: center;">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white" style="color:#876039;">
                        @lang('landing.iconFeature3')
                    </h3>
                    <p class="mt-1 text-gray-600 dark:text-neutral-400">@lang('landing.iconFeatureDesc3')</p>
                </div>
            </div>
            <!-- End Icon Block -->

            <!-- Icon Block -->
            <div>
                {{-- <div
                    class="relative flex justify-center items-center size-12 bg-white rounded-xl before:absolute before:-inset-px before:-z-[1] before:bg-gradient-to-br before:from-gray-700 before:via-transparent before:to-gray-600 before:rounded-xl dark:bg-neutral-900"
                    style="justify-self: center">
                    <svg class="size-6 transition duration-75 text-skin-base dark:text-skin-base" fill="currentColor"
                        viewBox="0 -0.5 25 25" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path fill-rule="evenodd"
                                d="M16,6 L20,6 C21.1045695,6 22,6.8954305 22,8 L22,16 C22,17.1045695 21.1045695,18 20,18 L16,18 L16,19.9411765 C16,21.0658573 15.1177541,22 14,22 L4,22 C2.88224586,22 2,21.0658573 2,19.9411765 L2,4.05882353 C2,2.93414267 2.88224586,2 4,2 L14,2 C15.1177541,2 16,2.93414267 16,4.05882353 L16,6 Z M20,11 L16,11 L16,16 L20,16 L20,11 Z M14,19.9411765 L14,4.05882353 C14,4.01396021 13.9868154,4 14,4 L4,4 C4.01318464,4 4,4.01396021 4,4.05882353 L4,19.9411765 C4,19.9860398 4.01318464,20 4,20 L14,20 C13.9868154,20 14,19.9860398 14,19.9411765 Z M5,19 L5,17 L7,17 L7,19 L5,19 Z M8,19 L8,17 L10,17 L10,19 L8,19 Z M11,19 L11,17 L13,17 L13,19 L11,19 Z M5,16 L5,14 L7,14 L7,16 L5,16 Z M8,16 L8,14 L10,14 L10,16 L8,16 Z M11,16 L11,14 L13,14 L13,16 L11,16 Z M13,5 L13,13 L5,13 L5,5 L13,5 Z M7,7 L7,11 L11,11 L11,7 L7,7 Z M20,9 L20,8 L16,8 L16,9 L20,9 Z">
                            </path>
                        </g>
                    </svg>
                </div> --}}
                <div class="relative flex justify-center items-center size-12 bg-white rounded-xl before:absolute before:-inset-px before:-z-[1] before:bg-gradient-to-br before:from-gray-700 before:via-transparent before:to-gray-600 before:rounded-xl dark:bg-neutral-900"
                    style="justify-self: center">
                    <img src="{{ asset('assets/images/4.png') }}" alt="icon" class="size-6" />
                </div>

                <div class="mt-5" style="text-align: center;">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white" style="color:#876039;">
                        @lang('landing.iconFeature4')
                    </h3>
                    <p class="mt-1 text-gray-600 dark:text-neutral-400">@lang('landing.iconFeatureDesc4')</p>
                </div>
            </div>
            <!-- End Icon Block -->

            <!-- Icon Block -->
            <div>
                {{-- <div
                    class="relative flex justify-center items-center size-12 bg-white rounded-xl before:absolute before:-inset-px before:-z-[1] before:bg-gradient-to-br before:from-gray-700 before:via-transparent before:to-gray-600 before:rounded-xl dark:bg-neutral-900"
                    style="justify-self: center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-qr-code-scan text-skin-base dark:text-skin-base size-6" viewBox="0 0 16 16">
                        <path
                            d="M8.235 1.559a.5.5 0 0 0-.47 0l-7.5 4a.5.5 0 0 0 0 .882L3.188 8 .264 9.559a.5.5 0 0 0 0 .882l7.5 4a.5.5 0 0 0 .47 0l7.5-4a.5.5 0 0 0 0-.882L12.813 8l2.922-1.559a.5.5 0 0 0 0-.882zm3.515 7.008L14.438 10 8 13.433 1.562 10 4.25 8.567l3.515 1.874a.5.5 0 0 0 .47 0zM8 9.433 1.562 6 8 2.567 14.438 6z" />
                    </svg>
                </div> --}}
                <div class="relative flex justify-center items-center size-12 bg-white rounded-xl before:absolute before:-inset-px before:-z-[1] before:bg-gradient-to-br before:from-gray-700 before:via-transparent before:to-gray-600 before:rounded-xl dark:bg-neutral-900"
                    style="justify-self: center">
                    <img src="{{ asset('assets/images/5.png') }}" alt="icon" class="size-6" />
                </div>

                <div class="mt-5" style="text-align: center;">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white" style="color:#876039;">
                        @lang('landing.iconFeature5')
                    </h3>
                    <p class="mt-1 text-gray-600 dark:text-neutral-400">@lang('landing.iconFeatureDesc5')</p>
                </div>
            </div>
            <!-- End Icon Block -->

            <!-- Icon Block -->
            <div>
                {{-- <div
                    class="relative flex justify-center items-center size-12 bg-white rounded-xl before:absolute before:-inset-px before:-z-[1] before:bg-gradient-to-br before:from-gray-700 before:via-transparent before:to-gray-600 before:rounded-xl dark:bg-neutral-900"
                    style="justify-self: center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-qr-code-scan text-skin-base dark:text-skin-base size-6" viewBox="0 0 16 16">
                        <path
                            d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5M11.5 4a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1z" />
                        <path
                            d="M2.354.646a.5.5 0 0 0-.801.13l-.5 1A.5.5 0 0 0 1 2v13H.5a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1H15V2a.5.5 0 0 0-.053-.224l-.5-1a.5.5 0 0 0-.8-.13L13 1.293l-.646-.647a.5.5 0 0 0-.708 0L11 1.293l-.646-.647a.5.5 0 0 0-.708 0L9 1.293 8.354.646a.5.5 0 0 0-.708 0L7 1.293 6.354.646a.5.5 0 0 0-.708 0L5 1.293 4.354.646a.5.5 0 0 0-.708 0L3 1.293zm-.217 1.198.51.51a.5.5 0 0 0 .707 0L4 1.707l.646.647a.5.5 0 0 0 .708 0L6 1.707l.646.647a.5.5 0 0 0 .708 0L8 1.707l.646.647a.5.5 0 0 0 .708 0L10 1.707l.646.647a.5.5 0 0 0 .708 0L12 1.707l.646.647a.5.5 0 0 0 .708 0l.509-.51.137.274V15H2V2.118z" />
                    </svg>
                </div> --}}
                <div class="relative flex justify-center items-center size-12 bg-white rounded-xl before:absolute before:-inset-px before:-z-[1] before:bg-gradient-to-br before:from-gray-700 before:via-transparent before:to-gray-600 before:rounded-xl dark:bg-neutral-900"
                    style="justify-self: center">
                    <img src="{{ asset('assets/images/6.png') }}" alt="icon" class="size-6" />
                </div>

                <div class="mt-5" style="text-align: center;">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white" style="color:#876039;">
                        @lang('landing.iconFeature6')
                    </h3>
                    <p class="mt-1 text-gray-600 dark:text-neutral-400">@lang('landing.iconFeatureDesc6')</p>
                </div>
            </div>
            <!-- End Icon Block -->

            <!-- Icon Block -->
            <div>
                {{-- <div
                    class="relative flex justify-center items-center size-12 bg-white rounded-xl before:absolute before:-inset-px before:-z-[1] before:bg-gradient-to-br before:from-gray-700 before:via-transparent before:to-gray-600 before:rounded-xl dark:bg-neutral-900"
                    style="justify-self: center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-qr-code-scan text-skin-base dark:text-skin-base size-6" viewBox="0 0 16 16">
                        <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1" />
                        <path
                            d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1" />
                    </svg>
                </div> --}}
                <div class="relative flex justify-center items-center size-12 bg-white rounded-xl before:absolute before:-inset-px before:-z-[1] before:bg-gradient-to-br before:from-gray-700 before:via-transparent before:to-gray-600 before:rounded-xl dark:bg-neutral-900"
                    style="justify-self: center">
                    <img src="{{ asset('assets/images/7.png') }}" alt="icon" class="size-6" />
                </div>

                <div class="mt-5" style="text-align: center;">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white" style="color:#876039;">
                        @lang('landing.iconFeature7')
                    </h3>
                    <p class="mt-1 text-gray-600 dark:text-neutral-400">@lang('landing.iconFeatureDesc7')</p>
                </div>
            </div>
            <!-- End Icon Block -->

            <!-- Icon Block -->
            <div>
                {{-- <div
                    class="relative flex justify-center items-center size-12 bg-white rounded-xl before:absolute before:-inset-px before:-z-[1] before:bg-gradient-to-br before:from-gray-700 before:via-transparent before:to-gray-600 before:rounded-xl dark:bg-neutral-900"
                    style="justify-self: center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-qr-code-scan text-skin-base dark:text-skin-base size-6" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M0 0h1v15h15v1H0zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5" />
                    </svg>
                </div> --}}
                <div class="relative flex justify-center items-center size-12 bg-white rounded-xl before:absolute before:-inset-px before:-z-[1] before:bg-gradient-to-br before:from-gray-700 before:via-transparent before:to-gray-600 before:rounded-xl dark:bg-neutral-900"
                    style="justify-self: center">
                    <img src="{{ asset('assets/images/8.png') }}" alt="icon" class="size-6" />
                </div>

                <div class="mt-5" style="text-align: center;">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white" style="color:#876039;">
                        @lang('landing.iconFeature8')
                    </h3>
                    <p class="mt-1 text-gray-600 dark:text-neutral-400">@lang('landing.iconFeatureDesc8')</p>
                </div>
            </div>
            <!-- End Icon Block -->

        </div>
    </div>
    <!-- End Icon Blocks -->






    {{-- section icon start--}}
    <div class="px-4 py-10 mx-auto max-w-7xl">
        <h2 class="text-3xl lg:text-4xl text-gray-800 font-bold  text-center mb-3 mt-10">Industry Versatility</h2>
        <p class="text-gray-500 dark:text-neutral-500 text-center mb-12">
            Built for Every Flavor of the Modern Food Business</p>


        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6 mb-5 ">
            <!-- Row 1: Cards 1–5 -->
            <div class="bg-white p-6 rounded-2xl shadow-md text-center">
                <img src="assets/images/icon1.png" alt="Cafe Icon" class="mx-auto mb-4 h-10 w-10 object-contain" />
                <h3 class="text-lg text-gray-700 font-semibold">Fine Dine</h3>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-md text-center">
                <img src="assets/images/icon2.png" alt="Cafe Icon" class="mx-auto mb-4 h-10 w-10 object-contain" />
                <h3 class="text-lg text-gray-700 font-semibold">Cloud Kitchen</h3>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-md text-center">
                <img src="assets/images/icon3.png" alt="Cafe Icon" class="mx-auto mb-4 h-10 w-10 object-contain" />
                <h3 class="text-lg text-gray-700 font-semibold">Dessertery</h3>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-md text-center">
                <img src="assets/images/icon4.png" alt="Cafe Icon" class="mx-auto mb-4 h-10 w-10 object-contain" />
                <h3 class="text-lg  text-gray-700 font-semibold">QSR</h3>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-md text-center">
                <img src="assets/images/icon5.png" alt="Cafe Icon" class="mx-auto mb-4 h-10 w-10 object-contain" />
                <h3 class="text-lg text-gray-700 font-semibold">Bakery</h3>
            </div>

            <!-- Row 2: Cards 6–10 -->
            <div class="bg-white p-6 rounded-2xl shadow-md text-center">
                <img src="assets/images/icon6.png" alt="Cafe Icon" class="mx-auto mb-4 h-10 w-10 object-contain" />
                <h3 class="text-lg  text-gray-700 font-semibold">Cafe</h3>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-md text-center">
                <img src="assets/images/icon7.png" alt="Cafe Icon" class="mx-auto mb-4 h-10 w-10 object-contain" />
                <h3 class="text-lg  text-gray-700 font-semibold">Bar & Brewery</h3>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-md text-center">
                <img src="assets/images/icon8.png" alt="Cafe Icon" class="mx-auto mb-4 h-10 w-10 object-contain" />
                <h3 class="text-lg text-gray-700 font-semibold">Food Court</h3>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-md text-center">
                <img src="assets/images/icon9.png" alt="Cafe Icon" class="mx-auto mb-4 h-10 w-10 object-contain" />
                <h3 class="text-lg text-gray-700 font-semibold">Large Chain</h3>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-md text-center">
                <img src="assets/images/icon10.png" alt="Cafe Icon" class="mx-auto mb-4 h-10 w-10 object-contain" />
                <h3 class="text-lg text-gray-700 font-semibold">Pizzeria</h3>
            </div>
        </div>
    </div>
    {{-- section icon end --}}




    {{-- technical benefits start --}}
    <div class="px-4 py-10 mx-auto max-w-7xl ">
        <h2 class="text-3xl lg:text-4xl text-gray-800 font-bold text-center mb-3 mt-3">
            Technical Benefits
        </h2>
        <p class="text-gray-500 dark:text-neutral-500 text-center mb-12">
            Handles Daily Workflows Faster With Smart Integrations </p>
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <!-- Left: Technical Benefits -->
            <div class="max-w-2xl">


                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- Repeat this block for each item -->
                    <div class="flex items-start space-x-4 p-3">
                        <div class="flex-shrink-0">
                            <img src="{{ asset('assets/images/benefit1.png') }}" alt="Cafe Icon"
                                class="h-12 w-12 object-cover" />
                        </div>
                        <div>
                            <p class="text-gray-600 dark:text-neutral-400">No Need for Local Server Installations</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4 p-3">
                        <div class="flex-shrink-0">
                            <img src="{{ asset('assets/images/benefit2.png') }}" alt="Cafe Icon"
                                class="h-12 w-12 object-cover" />
                        </div>
                        <div>
                            <p class="text-gray-600 dark:text-neutral-400">Accessible Anytime, Anywhere</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4 p-3">
                        <div class="flex-shrink-0">
                            <img src="{{ asset('assets/images/benefit3.png') }}" alt="Cafe Icon"
                                class="h-12 w-12 object-cover" />
                        </div>
                        <div>
                            <p class="text-gray-600 dark:text-neutral-400">Real-Time Data Sync Across Multiple Devices</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4 p-3">
                        <div class="flex-shrink-0">
                            <img src="{{ asset('assets/images/benefit4.png') }}" alt="Cafe Icon"
                                class="h-12 w-12 object-cover" />
                        </div>
                        <div>
                            <p class="text-gray-600 dark:text-neutral-400">Live Order Tracking BTW Kitchen and Front Desk
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4 p-3">
                        <div class="flex-shrink-0">
                            <img src="{{ asset('assets/images/benefit5.png') }}" alt="Cafe Icon"
                                class="h-12 w-12 object-cover" />
                        </div>
                        <div>
                            <p class="text-gray-600 dark:text-neutral-400">Accept UPI, Card, Net Banking, Cash Payments</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4 p-3">
                        <div class="flex-shrink-0">
                            <img src="{{ asset('assets/images/benefit6.png') }}" alt="Cafe Icon"
                                class="h-12 w-12 object-cover" />
                        </div>
                        <div>
                            <p class="text-gray-600 dark:text-neutral-400">Auto-Invoicing and Tax-Ready Receipts</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4 p-3">
                        <div class="flex-shrink-0">
                            <img src="{{ asset('assets/images/benefit7.png') }}" alt="Cafe Icon"
                                class="h-12 w-12 object-cover" />
                        </div>
                        <div>
                            <p class="text-gray-600 dark:text-neutral-400">Mange Multiple Branches in single system</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4 p-3">
                        <div class="flex-shrink-0">
                            <img src="{{ asset('assets/images/benefit8.png') }}" alt="Cafe Icon"
                                class="h-12 w-12 object-cover" />
                        </div>
                        <div>
                            <p class="text-gray-600 dark:text-neutral-400">Track sales, reservations & kitchen status
                                together</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Image -->
            <div class="flex justify-center items-center">
                <img class="rounded-xl border border-gray-100 shadow w-full max-w-5xl"
                    src="{{ asset('landing/techbenifits1.jpg') }}" alt="order management">
            </div>
        </div>
    </div>

    {{-- technical benefits end --}}


    {{-- pricing start --}}
    <div class=" py-3 mb-16 mt-16 rounded-xl  mx-auto max-w-7xl px-4" style="border-color: #876039;">
        <h2 class="text-3xl lg:text-4xl text-gray-800 font-bold text-center mb-3 mt-10">
            Our Pricing Segment
        </h2>
        <p class="text-gray-500 dark:text-neutral-500 text-center mb-12">
            Flexible Plans Designed to Fit Businesses of All Sizes - Pay Only for What You Need.</p>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 mb-3 text-center mt-4 pt-5">
            <div
                class="flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700">
                <div class="flex-auto p-4 md:p-6">
                    <img src="{{ asset('assets/images/price1.png') }}" alt="Cafe Icon"
                        class="mx-auto mb-2 h-10 w-10 object-contain" />
                    <p class="text-lg text-gray-700 font-semibold">Monthly & Yearly Subscriptions</p>
                </div>
            </div>

            <div
                class="flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700">
                <div class="flex-auto p-4 md:p-6">
                    <img src="{{ asset('assets/images/price2.png') }}" alt="Cafe Icon"
                        class="mx-auto mb-2 h-10 w-10 object-contain" />
                    <p class="text-lg text-gray-700 font-semibold">Business based Package Module</p>
                </div>
            </div>

            <div
                class="flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700">
                <div class="flex-auto p-4 md:p-6">
                    <img src="{{ asset('assets/images/price3.png') }}" alt="Cafe Icon"
                        class="mx-auto mb-2 h-10 w-10 object-contain" />
                    <p class="text-lg text-gray-700 font-semibold">Personalized Customization Support</p>
                </div>
            </div>

            <div
                class="flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700">
                <div class="flex-auto p-4 md:p-6">
                    <img src="{{ asset('assets/images/price4.png') }}" alt="Cafe Icon"
                        class="mx-auto mb-2 h-10 w-10 object-contain" />
                    <p class="text-lg text-gray-700 font-semibold">Onetime Payable Premier Package</p>
                </div>
            </div>
        </div>
    </div>
    {{-- pricing end --}}


    <section class="max-w-6xl mx-auto container price-cta"
        style="background-color: #fff7ef; justify-self: center; padding: 30px">
        <div class="text-center">
            <h2 class="font-bold  text-2xl text-gray-700 text-center mb-3">Choose the Right Plan for Your Restaurant</h2>
            <p style="max-width: 800px; margin: 0 auto;" class="text-gray-700 font-semibold py-2">
                Find the perfect pricing option that fits your restaurant’s size and needs. Compare features, explore
                benefits, and get started with a plan that works for you.
            </p>
            <a href="{{route('pricing')}}"
                class="text-white inline-flex items-center bg-skin-base hover:bg-skin-base/[.8] px-4 sm:w-auto dark:bg-skin-base dark:hover:bg-skin-base/[0.7] font-semibold rounded-lg text-sm px-5 py-2.5 text-center ml-2 mt-4">View
                Pricing Plans</a>
        </div>
    </section>




    {{-- top benefits start --}}
    <div class="mt-8 mb-8 max-w-7xl px-4" style="padding-bottom: 80px; padding-top: 60px; justify-self: center;">
        <h2 class="font-bold text-3xl lgtext-4xl text-gray-800 text-center mb-3">
            Top Benefits of Geni Fast
        </h2>
        <p class="text-gray-500 dark:text-neutral-500 text-center mb-12 pb-3">
            Made To Simplify And Improve Restaurants’ Daily Workflow.</p>
        <div class="md:grid md:grid-cols-2 md:items-center md:gap-12 xl:gap-18" style="justify-self: center;">
            <!-- Left Image -->
            <div class="mb-6">
                <img class="w-full mx-auto rounded-xl border border-gray-100 shadow"
                    src="{{ asset('landing/benifits.jpg') }}" alt="order management"
                    style="height: 500px; object-fit: cover;">
            </div>

            <!-- Right Benefits -->
            <div class="mt-5 sm:mt-10 lg:mt-0 space-y-8 mb-6">


                <!-- Benefit Item -->
                <div class="flex items-start gap-6">
                    <img src="{{ asset('assets/images/top1.png') }}" alt="Order Icon" class="h-12 w-12">
                    <div>
                        <h3 class="font-semibold text-xl" style="color:#876039;">
                            Centralized Restaurant Operations
                        </h3>
                        <p class="text-gray-500 dark:text-neutral-500 mt-1">
                            Manage orders, tables, staff, billing, and inventory
                        </p>
                    </div>
                </div>


                <!-- Benefit Item -->
                <div class="flex items-start gap-6">
                    <img src="{{ asset('assets/images/top2.png') }}" alt="Order Icon" class="h-12 w-12">
                    <div>
                        <h3 class="font-semibold text-xl" style="color:#876039;">
                            Real-Time Order Tracking
                        </h3>
                        <p class="text-gray-500 dark:text-neutral-500 mt-1">
                            Eliminate confusion between kitchen and wait staff with live order updates. </p>
                    </div>
                </div>

                <!-- Benefit Item -->
                <div class="flex items-start gap-6">
                    <img src="{{ asset('assets/images/top3.png') }}" alt="Reservation Icon" class="h-12 w-12">
                    <div>
                        <h3 class="font-semibold text-xl" style="color:#876039;">
                            Inventory & Stock Monitoring
                        </h3>
                        <p class="text-gray-500 dark:text-neutral-500 mt-1">
                            Manage your kitchen food items with real-time stock updates.</p>
                    </div>
                </div>

                <!-- Benefit Item -->
                <div class="flex items-start gap-6">
                    <img src="{{ asset('assets/images/top4.png') }}" alt="Billing Icon" class="h-12 w-12">
                    <div>
                        <h3 class="font-semibold text-xl" style="color:#876039;">
                            Time-Saving Automation
                        </h3>
                        <p class="text-gray-500 dark:text-neutral-500 mt-1">
                            Automate tasks like billing, order tracking, and reporting </p>
                    </div>
                </div>

                <!-- Benefit Item -->
                <div class="flex items-start gap-6">
                    <img src="{{ asset('assets/images/top5.png') }}" alt="Feedback Icon" class="h-12 w-12">
                    <div>
                        <h3 class="font-semibold text-xl" style="color:#876039;">
                            Digital Transformation
                        </h3>
                        <p class="text-gray-500 dark:text-neutral-500 mt-1">
                            From smart billing to real-time insights that keeps customers coming back.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- top benefits start --}}

    <!-- Testimonials -->
    {{-- <div class="max-w-7xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto mt-5">

        <div class="mx-auto  mb-8 lg:mb-14 text-center">
            <h2 class="text-3xl lg:text-4xl text-gray-800 font-bold dark:text-neutral-200">
                @lang('landing.testimonialSection1')
            </h2>
        </div>

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
    </div> --}}
    <!-- End Testimonials -->


    <!-- Features -->

    {{-- <div class="overflow-hidden" id="simple-pricing">
        <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
            <div class="mx-auto mb-8 lg:mb-14 text-center">
                <h2 class="text-4xl lg:text-6xl text-gray-800 break-words max-w-xl mx-auto">
                    Let Your Restaurant Run Like a Pro!
                </h2>
                <p class="my-5 font-light text-gray-500 sm:text-xl dark:text-gray-400">
                    Geni Restaurant handles the tech you focus on the taste!
                </p>
            </div>
            @include('landing.pricing', ['packages' => $packages, 'modules' => $modules])
        </div>
    </div> --}}

    <!-- Popup Overlay -->
    <div id="leadPopup" class="popup-overlay">
        <div class="popup-card">
            <span class="popup-close" onclick="closePopup()">×</span>

            <div class="popup-logo">
                <img src="{{ asset('assets/images/genifast.png') }}" alt="GeniFast Logo">
            </div>


            <p>Join us & simplify your restaurant operations.</p>

            <form method="POST" action="{{ route('popup.lead.store') }}">
                @csrf

                <input type="text" name="full_name" placeholder="Full Name" required>
                <input type="tel" name="phone" placeholder="Phone Number" required>
                <input type="text" name="restaurant_name" placeholder="Restaurant Name" required>
                <input type="text" name="city" placeholder="City" required style="margin-bottom: 0px;">
                <small>* We use your info only for communication and relevant updates.</small>

                <button type="submit">Get Started</button>
              	<div style="text-align: center; font-size: 14px; color: #555555; margin-top: 8px;">
                    Quick call / chat : 
                    <a href="https://wa.me/918667205661?text=Hi,%20I%20am%20interested%20in%20Geni%20Menu%20and%20would%20like%20to%20request%20a%20demo." 
                       target="_blank" 
                       style="color: #876039; font-weight: bold; text-decoration: none;">
                       +918667205661
                    </a>
                </div>
              	
            </form>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {

            // Show popup every refresh
            setTimeout(() => {
                document.getElementById("leadPopup").style.display = "flex";
            }, 1500);

            const form = document.querySelector("#leadPopup form");

            form.addEventListener("submit", function (e) {
                e.preventDefault();

                const formData = new FormData(form);

                fetch(form.action, {
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    },
                    body: formData
                })
                    .then(response => response.text())
                    .then(() => {

                        const popupCard = document.querySelector(".popup-card");

                        popupCard.innerHTML = `
                                    <div class="popup-success">
                                        <div class="success-icon">
                                            <svg viewBox="0 0 52 52">
                                                <circle cx="26" cy="26" r="25" fill="#876039" opacity="0.12"/>
                                                <path fill="none" stroke="#876039" stroke-width="4" 
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    d="M14 27 L22 34 L38 18" 
                                                    class="check-path"/>
                                            </svg>
                                        </div>
                                        <h3>Submitted successfully!</h3>
                                        <p>Our team will contact you shortly.</p>
                                    </div>
                                `;

                        // Auto close after 5 seconds
                        setTimeout(() => {
                            closePopup();
                        }, 5000);

                    })
                    .catch(error => {
                        alert("Something went wrong. Please try again.");
                        console.error(error);
                    });
            });
        });

        function closePopup() {
            document.getElementById("leadPopup").style.display = "none";
        }
    </script>



@endsection