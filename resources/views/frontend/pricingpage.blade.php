@php
    $meta = [
        'title' => 'Restaurant Billing Software Pricing Plans | Geni Menu',
        'description' => 'Compare Geni Menu pricing plans for dine-in, QSR, cafes, bakeries & more. Flexible monthly & yearly restaurant billing software plans starting at ₹1,399.',
        'keywords' => 'restaurant billing software price, restaurant POS pricing India, restaurant software cost, Geni Menu pricing, restaurant ERP pricing plans, cheap restaurant billing software, restaurant software subscription, dine-in POS pricing, QSR billing software price, restaurant management software plans, restaurant billing software monthly plan, restaurant billing software yearly plan, affordable restaurant POS software, restaurant software price India, POS software price for small restaurant, restaurant billing software packages, restaurant software cost comparison, best restaurant POS price, restaurant billing software for cafes price, bakery billing software price, cloud kitchen billing software price, canteen billing software price, restaurant ERP cost India, restaurant software plans comparison, POS system price India, restaurant billing software demo price, custom restaurant software pricing, restaurant software premium plan, restaurant software standard plan, low cost POS software India, Geni Menu plans, Geni Menu subscription cost, Geni Menu monthly price, Geni Menu yearly price, restaurant billing software price list, cheapest restaurant POS software India, restaurant software price per month',
    ];
@endphp

@extends('layouts.frontend-master')

@section('content')
<style>
    .custom-tick svg { fill: #876039; }

    .breadcrumb-section {
        background-color: #FFF7EF;
        padding: 2rem 30px;
    }

    .breadcrumb-container {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        max-width: 1280px;
        margin: 0 auto;
    }

    .breadcrumb-text { flex: 1 1 50%; }
    .breadcrumb-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: #2d2d2d;
        margin-bottom: 0.5rem;
    }

    .breadcrumb { list-style: none; padding: 0; margin: 0; display: flex; font-size: 1rem; }
    .breadcrumb-item { color: #6c757d; }
    .breadcrumb-item a { text-decoration: none; color: #6c757d; }
    .breadcrumb-item + .breadcrumb-item::before { content: "/"; color: #aaa; padding: 0 8px; }

    .text-theme { color: #4a274f; }
    .text-muted { color: #6c757d; }

    .breadcrumb-image-container { flex: 1 1 50%; text-align: right; }
    .breadcrumb-image { max-height: 250px; object-fit: contain; }

    @media (max-width: 768px) {
        .breadcrumb-container { flex-direction: column; text-align: center; }
        .breadcrumb-text, .breadcrumb-image-container { flex: 1 1 100%; margin-bottom: 1rem; }
    }

    /* Toggle & Category Styles */
    .toggle-container {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 1rem;
        margin: 1.5rem 0 2rem;
    }

    .toggle-label {
        font-size: 1rem;
        font-weight: 500;
        transition: all 0.2s;
    }

    .toggle-label.active { color: #876039; font-weight: 600; }

    .category-tabs {
        display: flex;
        flex-wrap: wrap;
        gap: 0.75rem;
        justify-content: center;
        margin-bottom: 2.5rem;
    }

    .category-btn {
        padding: 0.6rem 1.25rem;
        border-radius: 9999px;
        font-size: 0.875rem;
        font-weight: 500;
        transition: all 0.2s;
        border: 1px solid #e5e7eb;
        background: white;
    }

    .category-btn.active {
        background-color: #876039;
        color: white;
        border-color: #876039;
        box-shadow: 0 4px 6px -1px rgba(135, 96, 57, 0.1);
    }

    .category-btn:hover:not(.active) {
        background-color: #f3f4f6;
        border-color: #d1d5db;
    }

    .no-plans-msg {
        text-align: center;
        padding: 4rem 1rem;
        color: #6b7280;
        font-size: 1.125rem;
    }

/* Billing toggle active color */
.billing-toggle span {
    color: #9CA3AF;
    font-weight: 600;
    transition: color 0.2s;
}

.billing-toggle span.active {
    color: #876039;
}
* toggle switch base */
.toggle-switch {
    position: relative;
    transition: background-color 0.25s;
}

/* circle */
.toggle-switch::after {
    content: '';
    position: absolute;
    top: 2px;
    left: 2px;
    height: 24px;
    width: 24px;
    background: white;
    border-radius: 50%;
    transition: transform 0.25s ease;
}

/* active background */
.toggle-container input:checked + .toggle-switch {
    background-color: #876039;
}

/* circle move */
.toggle-container input:checked + .toggle-switch::after {
    transform: translateX(28px);
} transform: translateX(28px);
}
</style>

<div class="breadcrumb-section">
    <div class="breadcrumb-container">
        <div class="breadcrumb-text">
            <h1 class="breadcrumb-title">Pricing</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}" class="text-muted">Home</a>
                    </li>
                    <li class="breadcrumb-item active text-theme" aria-current="page">Pricing</li>
                </ol>
            </nav>
        </div>
        <div class="breadcrumb-image-container">
            <img src="{{ asset('landing/pricingbc.svg') }}" alt="Pricing Illustration" class="breadcrumb-image">
        </div>
    </div>
</div>

<div class="max-w-[85rem] mx-auto px-4 py-10 sm:px-6 lg:px-8 lg:py-14">
    <div class="text-center mb-10">
        <h2 class="text-3xl sm:text-4xl font-bold text-gray-900">
            Let Your Restaurant Run Like a Pro!
        </h2>
        <p class="mt-4 text-lg text-gray-600">
            Geni Fast handles the tech — you focus on the taste!
        </p>
    </div>

    <!-- Billing Toggle -->
    <div class="toggle-container">
        <span class="toggle-label {{ $billingCycle === 'monthly' ? 'active' : '' }}">Monthly</span>
        
        <label class="relative inline-flex items-center cursor-pointer">
            <input type="checkbox" class="sr-only peer" 
                   {{ $billingCycle === 'yearly' ? 'checked' : '' }}
                   onchange="window.location = '{{ url()->current() }}?{{ http_build_query(['category' => $selectedCategory, 'billing' => $billingCycle === 'yearly' ? 'monthly' : 'yearly']) }}'">
        <div class="toggle-switch w-14 h-7 bg-gray-200 rounded-full relative
    after:content-[''] after:absolute after:top-[2px] after:left-[2px] 
    after:bg-white after:rounded-full after:h-6 after:w-6 after:transition-all"></div>
        </label>
        
        <span class="toggle-label {{ $billingCycle === 'yearly' ? 'active' : '' }}">Yearly</span>
    </div>

    <!-- Category Tabs -->
    <div class="category-tabs">
        @foreach($categories as $slug => $name)
            <a href="{{ route('pricing') }}?category={{ $slug }}&billing={{ $billingCycle }}"
               class="category-btn {{ $selectedCategory === $slug ? 'active' : '' }}">
                {{ $name }}
            </a>
        @endforeach
    </div>

    <!-- Pricing Content -->
    @if($packages->isEmpty())
        <div class="no-plans-msg">
            <p>No plans found for this category yet.</p>
            <p class="mt-2 text-sm">Please try another category or contact us for custom pricing.</p>
        </div>
    @else
        @include('frontend.pricing', [
            'packages' => $packages,
            'modules' => $AllModulesWithFeature,
            'billingCycle' => $billingCycle  // ← இது மிக முக்கியம்!
        ])
    @endif

    <div class="text-center mt-12 text-gray-600 text-lg">
        Selective Customization also available – Contact us for best price
    </div>
</div>

<!-- FAQ Section -->
<div class="max-w-[85rem] mx-auto px-4 py-16 sm:px-6 lg:px-8 lg:py-20" id="user-faqs">
    <div class="max-w-2xl mx-auto text-center mb-12">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900">@lang('landing.faqTitle1')</h2>
    </div>
    <div class="max-w-5xl mx-auto">
        <div class="grid sm:grid-cols-2 gap-8 md:gap-12">
            @for($i = 1; $i <= 6; $i++)
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">
                        @lang("landing.faqQues{$i}")
                    </h3>
                    <p class="mt-3 text-gray-600">
                        @lang("landing.faqAns{$i}")
                    </p>
                </div>
            @endfor
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const toggle = document.querySelector('.toggle-container input[type="checkbox"]');
    const monthly = document.querySelector('.toggle-container span:first-child');
    const yearly = document.querySelector('.toggle-container span:last-child');

    if(toggle){
        toggle.addEventListener('change', function () {

            if (toggle.checked) {
                monthly.classList.remove('active');
                yearly.classList.add('active');
            } else {
                yearly.classList.remove('active');
                monthly.classList.add('active');
            }

        });
    }

});
</script>
@endsection