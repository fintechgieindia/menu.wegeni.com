@php
    $meta = [
        'title' => 'Restaurant Billing Software Features | Geni Menu POS, KOT, Inventory',
        'description' => 'Explore Geni Menu features: POS billing, KOT, table & reservation management, inventory, staff roles, multi-branch, kiosk ordering & real-time reports.',
        'keywords' => 'restaurant ERP features, restaurant POS features, KOT software, kitchen order ticket software, table management software, reservation management software, restaurant inventory software, restaurant staff management software, multi-branch restaurant software, kiosk ordering software, restaurant CRM features, restaurant reporting software, QR code menu ordering, restaurant billing features list, restaurant software modules, kitchen display system software, waiter app for restaurants, table reservation system software, restaurant stock management software, restaurant staff scheduling software, restaurant payment gateway integration, restaurant delivery management software, self ordering kiosk software, restaurant menu management system, restaurant order tracking software, multi kitchen management software, restaurant expense tracking software, customer management software for restaurants, restaurant sales report software, restaurant billing software with GST, restaurant software with WhatsApp integration, cash register software for restaurants, restaurant floor plan software, contactless ordering software, restaurant software features comparison, POS features for cafes and restaurants, Geni Menu features, Geni Menu KOT system, Geni Menu inventory management, Geni Menu table management, Geni Menu staff login, Geni Menu multi branch, Geni Menu kiosk ordering, restaurant software feature list India',
    ];
@endphp

@extends('layouts.frontend-master')



@section('content')

{{-- AOS Animation CSS --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">

{{-- Tailwind CSS CDN --}}
<script src="https://cdn.tailwindcss.com"></script>

<style>
   
    .custom-tick svg{
        fill: #876039  
    }
    .breadcrumb-section {
    background-color: #FFF7EF;
    padding-top: 2rem;
    padding-left: 30px;
    padding-right: 30px;

    }

    .breadcrumb-container {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
    margin: auto;
    padding: 0 15px;
    }

    .breadcrumb-text {
    text-align: left;
    flex: 1 1 50%;
    }

    .breadcrumb-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #2d2d2d;
    margin-bottom: 10px;
    }

    .breadcrumb {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    font-size: 1rem;
    }

    .breadcrumb-item {
    color: #6c757d;
    }

    .breadcrumb-item a {
    text-decoration: none;
    color: #6c757d;
    }

    .breadcrumb-item + .breadcrumb-item::before {
    content: "/";
    color: #aaa;
    padding: 0 8px;
    }

    .text-theme {
    color: #4a274f;
    }

    .text-muted {
    color: #6c757d;
    }

    .breadcrumb-image-container {
    text-align: right;
    flex: 1 1 50%;
    }

    .breadcrumb-image {
    max-height: 250px;
    object-fit: contain;
      justify-self: right;
    }

    /* Responsive */
    @media (max-width: 768px) {
    .breadcrumb-container {
        flex-direction: column;
        text-align: center;
    }

    .breadcrumb-text {
        flex: 1 1 100%;
        text-align: center;
        margin-bottom: 1rem;
    }

    .breadcrumb-image-container {
        flex: 1 1 100%;
        text-align: center;
    }
    }


</style>
<div class="breadcrumb-section">
  <div class="breadcrumb-container max-w-7xl">
    
    <!-- Left Column -->
    <div class="breadcrumb-text">
      <h1 class="breadcrumb-title">Features</h1>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{url('/')}}" class="text-muted">Home</a>
          </li>
          <li class="breadcrumb-item active text-theme" aria-current="page">Features</li>
        </ol>
      </nav>
    </div>

    <!-- Right Column -->
    <div class="breadcrumb-image-container">
      <img src="{{asset('landing/featurebc.svg')}}" alt="Features Illustration" class="breadcrumb-image">
    </div>

  </div>
</div>

<section class="py-16">
    <div class="max-w-6xl mx-auto px-4">
        @php
            $features = [
                [
                    'title' => 'Menu Management',
                    'description' => 'Easily manage your entire menu from a single interface. Update items, categories, prices, and availability in real time.',
                    'points' => [
                        'Keep menu items, categories, and prices updated instantly.',
                        'Control availability and item details from one place.'
                    ],
                    'image' => 'landing/menu-management.svg',
                    'reverse' => false
                ],
                [
                    'title' => 'Reservation Management',
                    'description' => 'Handle all reservations from one screen. View, update, and allocate tables to guests with ease.',
                    'points' => [
                        'Track and manage all upcoming reservations in real time.',
                        'Assign tables quickly to reduce waiting times.'
                    ],
                    'image' => 'landing/reservations.svg',
                    'reverse' => true
                ],
                [
                    'title' => 'Waiter Requests',
                    'description' => 'Monitor and respond to service requests instantly. Improve customer satisfaction with faster response times.',
                    'points' => [
                        'View live requests from each table and area.',
                        'Mark requests as attended to streamline service.'
                    ],
                    'image' => 'landing/waiter-requests.svg',
                    'reverse' => false
                ],
                [
                    'title' => 'Table Management',
                    'description' => 'View and manage all tables in one dashboard. Track availability, occupancy, and special table layouts.',
                    'points' => [
                        'Monitor table status across all seating areas.',
                        'Add, update, or rearrange tables effortlessly.'
                    ],
                    'image' => 'landing/table-management.svg',
                    'reverse' => true
                ],
                [
                    'title' => 'POS Management',
                    'description' => 'Process dine-in, delivery, and pickup orders from one screen. Ensure fast, accurate billing for every customer.',
                    'points' => [
                        'Add items, apply variations, and generate bills instantly.',
                        'Manage all order types from a single interface.'
                    ],
                    'image' => 'landing/pos.svg',
                    'reverse' => false
                ],
                [
                    'title' => 'Order Management',
                    'description' => 'Track every order from placement to completion. Coordinate between service staff and kitchen efficiently.',
                    'points' => [
                        'View all active and completed orders in real time.',
                        'Update order status to keep workflow organized.'
                    ],
                    'image' => 'landing/order-management.svg',
                    'reverse' => true
                ],
                [
                    'title' => 'KOT (Kitchen Order Ticket) Management',
                    'description' => 'Send orders directly to the kitchen instantly. Reduce errors and improve preparation speed.',
                    'points' => [
                        'Print or display KOTs for faster kitchen service.',
                        'Keep kitchen staff updated on all incoming orders.'
                    ],
                    'image' => 'landing/kot.svg',
                    'reverse' => false
                ],
                [
                    'title' => 'Delivery Executive Management',
                    'description' => 'Assign and monitor delivery staff from one dashboard. Track performance and ensure timely deliveries.',
                    'points' => [
                        'View available delivery executives in real time.',
                        'Assign orders and monitor completion status.'
                    ],
                    'image' => 'landing/delivery-executive.svg',
                    'reverse' => true
                ],
                [
                    'title' => 'Customer Management',
                    'description' => 'Maintain a complete record of customer information. Track order history and preferences for better service.',
                    'points' => [
                        'Search and update customer details instantly.',
                        'Build loyalty with personalized promotions.'
                    ],
                    'image' => 'landing/customer-management.svg',
                    'reverse' => false
                ],
                [
                    'title' => 'Payments Management',
                    'description' => 'Track all transactions from a single screen. Filter by amount, method, or date for quick access.',
                    'points' => [
                        'Monitor all payment records in real time.',
                        'Export data for financial tracking and audits.'
                    ],
                    'image' => 'landing/payments-management.svg',
                    'reverse' => true
                ],
                [
                    'title' => 'Staff Management',
                    'description' => 'Manage staff roles, permissions, and contact details. Keep your team organized and accountable.',
                    'points' => [
                        'Assign specific roles and update permissions easily.',
                        'Store and update staff contact information securely.'
                    ],
                    'image' => 'landing/staff-management.svg',
                    'reverse' => false
                ],
                [
                    'title' => 'Reports',
                    'description' => 'Generate detailed reports on sales, items, and categories. Use data to improve business decisions.',
                    'points' => [
                        'Export reports for sharing or deeper analysis.',
                        'View trends to track business performance.'
                    ],
                    'image' => 'landing/reports.svg',
                    'reverse' => true
                ],
                [
                    'title' => 'Customized Settings',
                    'description' => 'Adjust system settings to fit your business needs. Control everything from taxes to theme colors.',
                    'points' => [
                        'Update restaurant details, payment settings, and taxes.',
                        'Customize the interface to match your brand.'
                    ],
                    'image' => 'landing/customized-settings.svg',
                    'reverse' => false
                ],

[
    'title' => 'Inventory Management',
    'description' => 'Track stock levels and manage ingredients efficiently to avoid shortages and reduce wastage.',
    'points' => [
        'Monitor ingredient stock levels in real time.',
        'Get alerts when stock is running low.'
    ],
    'image' => 'landing/inventory-management.svg',
    'reverse' => true
],
[
    'title' => 'Multiple Kitchen',
    'description' => 'Manage orders across multiple kitchen stations for faster and more organized food preparation.',
    'points' => [
        'Send orders to the correct kitchen section automatically.',
        'Improve coordination between kitchen teams.'
    ],
    'image' => 'landing/multiple-kitchen.svg',
    'reverse' => false
],
[
    'title' => 'Multiple Branch',
    'description' => 'Easily manage multiple restaurant branches from a single system dashboard.',
    'points' => [
        'Switch between branches instantly.',
        'Track orders, staff, and sales per branch.'
    ],
    'image' => 'landing/multiple-branch.svg',
    'reverse' => true
],
[
    'title' => 'Kiosk Ordering',
    'description' => 'Enable self-service kiosk ordering so customers can place orders quickly without waiting.',
    'points' => [
        'Customers can browse menu and place orders directly.',
        'Reduce queue time and improve order accuracy.'
    ],
    'image' => 'landing/kiosk-ordering.svg',
    'reverse' => false
],
            ];
        @endphp

        @foreach ($features as $feature)
            <div class="flex flex-col md:flex-row {{ $feature['reverse'] ? 'md:flex-row-reverse' : '' }} items-center mb-16">
                <div class="w-full md:w-1/2" data-aos="fade-up">
                    <img src="{{ asset($feature['image']) }}" alt="{{ $feature['title'] }}" class="rounded-lg shadow-xl w-full" style="background-color: #FFF7EF;">
                </div>
                <div class="w-full md:w-1/2 mt-6 md:mt-0 md:px-12" data-aos="fade-up" data-aos-delay="200">
                    <h3 class="text-2xl font-bold mb-4">{{ $feature['title'] }}</h3>
                    <p class="text-gray-600 mb-4">{{ $feature['description'] }}</p>
                    <ul class="space-y-2 list-none">
                        @foreach ($feature['points'] as $point)
                           <li class="relative mr-2 text-gray-700 custom-tick" style="display: flex;align-items: center;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill mr-2" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                </svg>{{ $point }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endforeach
    </div>
</section>

{{-- AOS JS --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
    AOS.init({
        duration: 1000,
        once: true
    });
</script>
@endsection
