@php
    $meta = [
        'title' => 'Contact Geni Menu | Book a Restaurant Software Demo',
        'description' => 'Get in touch with Geni Menu for a free demo of our restaurant billing software. Talk to our team via call or WhatsApp for pricing and support.',
        'keywords' => 'contact Geni Menu, restaurant software demo, book restaurant POS demo, Geni Menu support, restaurant billing software contact, WeGeni contact, restaurant software customer support, restaurant ERP demo request, restaurant software free demo, restaurant POS demo booking, restaurant software helpline, restaurant billing software enquiry, restaurant software sales contact, get restaurant software quote, restaurant management software demo, restaurant software WhatsApp contact, restaurant software phone number, restaurant billing software support team, restaurant software onboarding help, request restaurant software callback, restaurant software Tamil Nadu contact, WeGeni customer care, restaurant POS software inquiry, restaurant software live demo, Geni Menu phone number, Geni Menu WhatsApp, Geni Menu demo booking, Geni Menu customer care, restaurant billing software contact number India',
    ];
@endphp
@extends('layouts.frontend-master')



@section('content')

  <style>
    .custom-tick svg {
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

    .breadcrumb-item+.breadcrumb-item::before {
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
        <h1 class="breadcrumb-title">Contact Us</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{url('/')}}" class="text-muted">Home</a>
            </li>
            <li class="breadcrumb-item active text-theme" aria-current="page">Contact Us</li>
          </ol>
        </nav>
      </div>

      <!-- Right Column -->
      <div class="breadcrumb-image-container">
        <img src="{{asset('landing/contactbc.svg')}}" alt="Features Illustration" class="breadcrumb-image">
      </div>

    </div>
  </div>

  <section id="contact-us" class="mt-10 mb-10">
    <div class="max-w-4xl mx-auto px-4 py-8">
      <!-- Header Section -->


      <!-- Main Content Area - Changed to single column layout -->
      <div class="space-y-8"> {{-- Removed grid md:grid-cols-2 --}}
        <!-- Contact Form -->
        <div class="bg-white rounded-lg shadow-lg p-8">
          <h2 class="text-2xl font-semibold text-gray-900 mb-6 text-center">Send Us a Message</h2>

          @if (session('success'))
            <div class="rounded-lg p-4 mb-6" style="background-color: #FFF7EF; border: 1px solid rgba(135, 96, 57, 0.3);">
              <div class="flex">
                <div class="flex-shrink-0">
                  <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" style="color: #876039;">
                    <path fill-rule="evenodd"
                      d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                      clip-rule="evenodd" />
                  </svg>
                </div>
                <div class="ml-3">
                  <p class="text-sm font-medium" style="color: #876039;">
                    {{ session('success') }}
                  </p>
                </div>
              </div>
            </div>
          @endif

          @if ($errors->any())
            <div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-6">
              <div class="flex">
                <div class="flex-shrink-0">
                  <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                      d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                      clip-rule="evenodd" />
                  </svg>
                </div>
                <div class="ml-3">
                  <h3 class="text-sm font-medium text-red-800">Please fix the following errors:</h3>
                  <ul class="mt-2 text-sm text-red-700 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>
          @endif

          <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
            @csrf

            <div class="grid md:grid-cols-2 gap-4">
              <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                  Full Name <span class="text-red-500">*</span>
                </label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required
                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 transition-colors"
                  style="--tw-ring-color: #876039; --tw-border-opacity: 1; border-color: rgba(179, 146, 113, var(--tw-border-opacity));"
                  placeholder="Enter your full name">
              </div>

              <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                  Email Address <span class="text-red-500">*</span>
                </label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 transition-colors"
                  style="--tw-ring-color: #876039; --tw-border-opacity: 1; border-color: rgba(179, 146, 113, var(--tw-border-opacity));"
                  placeholder="Enter your email address">
              </div>
            </div>

            <div class="grid md:grid-cols-2 gap-4">
              <div>
                <label for="company" class="block text-sm font-medium text-gray-700 mb-2">
                  Restaurant Name <span class="text-red-500">*</span>
                </label>
                <input type="text" id="company" name="company" value="{{ old('company') }}"
                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 transition-colors"
                  style="--tw-ring-color: #876039; --tw-border-opacity: 1; border-color: rgba(179, 146, 113, var(--tw-border-opacity));"
                  placeholder="Enter your company name">
              </div>

              <div>
                <label for="designation" class="block text-sm font-medium text-gray-700 mb-2">
                  Designation/Role <span class="text-red-500">*</span>
                </label>
                <input id="designation" name="designation" value="{{ old('designation') }}"
                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 transition-colors"
                  style="--tw-ring-color: #876039; --tw-border-opacity: 1; border-color: rgba(179, 146, 113, var(--tw-border-opacity));"
                  placeholder="Enter your Designation">
                {{-- <option value="">Select your role</option>
                <option value="Owner" {{ old('designation')=='Owner' ? 'selected' : '' }}>Restaurant Owner</option>
                <option value="Manager" {{ old('designation')=='Manager' ? 'selected' : '' }}>Manager</option>
                <option value="Chef" {{ old('designation')=='Chef' ? 'selected' : '' }}>Chef</option>
                <option value="Operations Manager" {{ old('designation')=='Operations Manager' ? 'selected' : '' }}>
                  Operations Manager</option>
                <option value="IT Manager" {{ old('designation')=='IT Manager' ? 'selected' : '' }}>IT Manager</option>
                <option value="Franchise Owner" {{ old('designation')=='Franchise Owner' ? 'selected' : '' }}>Franchise
                  Owner</option>
                <option value="Business Development" {{ old('designation')=='Business Development' ? 'selected' : '' }}>
                  Business Development</option>
                <option value="Other" {{ old('designation')=='Other' ? 'selected' : '' }}>Other</option> --}}

              </div>

            </div>
            <div class="grid md:grid-cols-2 gap-4">
              <div>
                <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                  Phone Number <span class="text-red-500">*</span>
                </label>
                <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" required
                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 transition-colors"
                  style="--tw-ring-color: #876039; --tw-border-opacity: 1; border-color: rgba(179, 146, 113, var(--tw-border-opacity));"
                  placeholder="+91 XXXXX XXXXX" pattern="[+]?[0-9\s\-]+">
              </div>

              <div>
                <label for="address" class="block text-sm font-medium text-gray-700 mb-2">
                  Address <span class="text-red-500">*</span>
                </label>
                <input id="address" name="address" value="{{ old('address') }}"
                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 transition-colors"
                  style="--tw-ring-color: #876039; --tw-border-opacity: 1; border-color: rgba(179, 146, 113, var(--tw-border-opacity));"
                  placeholder="Enter your complete address">
              </div>
            </div>

            <div>
              <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">
                Subject <span class="text-red-500">*</span>
              </label>
              <select id="subject" name="subject" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 transition-colors"
                style="--tw-ring-color: #876039; --tw-border-opacity: 1; border-color: rgba(179, 146, 113, var(--tw-border-opacity));">
                <option value="">Select inquiry type</option>
                <option value="Product Demo" {{ old('subject') == 'Product Demo' ? 'selected' : '' }}>Product Demo Request
                </option>
                <option value="Pricing Inquiry" {{ old('subject') == 'Pricing Inquiry' ? 'selected' : '' }}>Pricing Inquiry
                </option>
                <option value="Technical Support" {{ old('subject') == 'Technical Support' ? 'selected' : '' }}>Technical
                  Support</option>
                <option value="Feature Request" {{ old('subject') == 'Feature Request' ? 'selected' : '' }}>Feature Request
                </option>
                <option value="Partnership" {{ old('subject') == 'Partnership' ? 'selected' : '' }}>Partnership Opportunity
                </option>
                <option value="General Inquiry" {{ old('subject') == 'General Inquiry' ? 'selected' : '' }}>General Inquiry
                </option>
                <option value="Bug Report" {{ old('subject') == 'Bug Report' ? 'selected' : '' }}>Bug Report</option>
                <option value="Other" {{ old('subject') == 'Other' ? 'selected' : '' }}>Other</option>
              </select>
            </div>

            <div>
              <label for="message" class="block text-sm font-medium text-gray-700 mb-2">
                Message <span class="text-red-500">*</span>
              </label>
              <textarea id="message" name="message" rows="3" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 transition-colors"
                style="--tw-ring-color: #876039;  border-color: rgba(179, 146, 113, var(--tw-border-opacity));"
                placeholder="Please describe your inquiry in detail...">{{ old('message') }}</textarea>
            </div>
            <div class="flex justify-center">

              <button type="submit"
                class="  text-white py-3 px-6 rounded-lg font-medium focus:ring-2 focus:ring-offset-2 transition-colors"
                style="background-color: #876039; --tw-ring-color: #876039; width:50%;">
                Send Message
              </button>
            </div>
          </form>

        </div>

        <!-- Contact Information -->

      </div>



    </div>


  </section>

  <header class="text-center mt-4">
    <p class="text-4xl font-bold text-gray-900 mb-4">Get in Touch</p>
    <p class="text-gray-500">We're here to help you with your restaurant management needs</p>
  </header>
  <!-- Contact -->
  <div class="max-w-7xl px-4 lg:px-8 py-10 lg:py-15 mx-auto" style="margin-bottom: 60px;">
    <div class="mb-6 sm:mb-10 max-w-2xl text-center mx-auto">
      <h2 class="font-medium text-black text-2xl sm:text-4xl dark:text-white">
        {{-- @lang('landing.contactTitle')--}}
      </h2>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 lg:items-center gap-6 md:gap-8 lg:gap-12">
      <!-- Left Image -->
      <div class="aspect-w-16  overflow-hidden bg-gray-100 rounded-2xl dark:bg-neutral-800">
        <img
          class="group-hover:scale-105 group-focus:scale-105 transition-transform duration-500 ease-in-out object-cover rounded-2xl"
          src="{{asset('landing/contact.jpg')}}" alt="Contacts Image"
          style="height: 300px; width: 600px; object-fit: cover;">
      </div>
      <!-- End Left Image -->

      <!-- Right Content -->
      <div class="space-y-8 lg:space-y-16">
        <div>
          {{--<h3 class="mb-5 font-semibold text-black dark:text-white">
            @lang('landing.addressTitle')
          </h3>--}}

          <!-- Contact Info -->
          <div class="grid gap-2 sm:gap-6 md:gap-8 lg:gap-12">
            <!-- Address -->
            <div class="flex gap-2" style="align-items: center">
              <svg class="shrink-0 size-5 text-gray-500 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg"
                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                stroke-linecap="round" stroke-linejoin="round" style="color:#876039;">
                <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path>
                <circle cx="12" cy="10" r="3"></circle>
              </svg>
              <div class="grow">
                <p class=" text-black-600 dark:text-neutral-400">
                  @lang('landing.contactCompany')
                </p>
                <address class="mt-1 text-black not-italic dark:text-white justify-text">
                  @lang('landing.contactAddress')
                </address>
              </div>
            </div>

            <!-- Email -->
            <div class="flex gap-2">
              <svg class="shrink-0 size-5 text-gray-500 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" style="color:#876039;">
                <path
                  d="M21.2 8.4c.5.38.8.97.8 1.6v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V10a2 2 0 0 1 .8-1.6l8-6a2 2 0 0 1 2.4 0l8 6Z" />
                <path d="m22 10-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 10" />
              </svg>
              <div class="grow">
                <p class=" text-black-600 dark:text-neutral-400">business@wegeni.com</p>
              </div>
            </div>

            <!-- Phone -->
            <div class="flex gap-2">
              <svg class="shrink-0 size-5 text-gray-500 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" style="color:#876039;">
                <path
                  d="M22 16.92v3a2 2 0 0 1-2.18 2A19.86 19.86 0 0 1 3 5.18 2 2 0 0 1 5 3h3a2 2 0 0 1 2 1.72c.13 1.12.46 2.2.98 3.2a2 2 0 0 1-.45 2.18L9.1 11.1a16 16 0 0 0 5.9 5.9l1.1-1.1a2 2 0 0 1 2.18-.45c1 .52 2.08.85 3.2.98a2 2 0 0 1 1.72 2z" />
              </svg>
              <div class="grow">
                <p class="text-black-600 dark:text-neutral-400">@lang('landing.phone')</p>
              </div>
            </div>
          </div>
          <!-- End Contact Info -->
        </div>
      </div>
      <!-- End Right Content -->
    </div>
  </div>
  <!-- End Contact -->
@endsection