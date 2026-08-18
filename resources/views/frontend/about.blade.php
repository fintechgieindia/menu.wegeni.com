@php
    $meta = [
        'title' => 'About Geni Menu | Restaurant Billing Software by WeGeni',
        'description' => 'Learn how Geni Menu, built by WeGeni, helps restaurants across India run smarter operations with an all-in-one billing, POS, and management platform.',
        'keywords' => 'about Geni Menu, WeGeni restaurant software, restaurant ERP company India, restaurant technology company, restaurant software provider, Geni Menu company, WeGeni Tiruchengode, restaurant software Tamil Nadu, restaurant billing software company, restaurant tech startup India, restaurant SaaS company, restaurant software developers India, WeGeni digital transformation, restaurant management company India, POS software company, restaurant ERP provider Tamil Nadu, restaurant billing software brand, Geni Menu about us, WeGeni products, restaurant software vendor India, cloud kitchen software company, restaurant technology partner, restaurant software solutions provider, trusted restaurant software India, restaurant billing software India company, restaurant management platform company, who made Geni Menu, Geni Menu founders, WeGeni company profile, restaurant software startup Tamil Nadu, best restaurant software company India',
    ];
@endphp

@extends('layouts.frontend-master')



@section('content')

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
     justify-self : right;
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
    /* Main Section */
.profile-section {
  padding: 40px 15px;
  margin-bottom: 40px;
}

.profile-container {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  max-width: 1200px;
  margin: auto;
  gap: 20px;
}

/* Profile Image */
.profile-image {
  flex: 1 1 30%;
  text-align: center;
}

.profile-image img {
  max-width: 100%;
  height: 375px;
  object-fit: cover;
  border-radius: 8px;
}

/* Profile Details */
.profile-details {
  flex: 1 1 65%;
}

.profile-name {
  font-size: 1.5rem;
  font-weight: bold;
  color: #876039;
  margin-bottom: 10px;
}

.tag {
  background-color: #FFF7EF;
  color: #876039;
  border-radius: 20px;
  padding: 4px 15px;
  font-size: 14px;
  display: inline-block;
  margin-bottom: 15px;
}

.profile-description {
  font-size: 1rem;
  line-height: 1.5;
  margin-bottom: 20px;
  color: #333;
}

/* Info Boxes */
.info-grid {
  display: flex;
  flex-wrap: wrap;
  gap: 15px;
  margin-bottom: 20px;
}

.info-box {
  flex: 1 1 calc(50% - 15px);
  display: flex;
  align-items: center;
  background-color: #FFF7EF;
  border-radius: 12px;
  padding: 15px 20px;
}
  .social-grid {
  display: flex;
  flex-wrap: wrap;
  gap: 15px;
  margin-bottom: 20px;
 	justify-content: space-between;
}


.info-icon {
  font-size: 20px;
  color: #876039;
  margin-right: 10px;
}

.info-title {
  font-weight: 600;
  color: #876039;
}

/* Social Icons */
.social-icons {
        display: flex;
        gap: 10px;
        margin-top: 10px;
    }
    .social-icons a {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        border: 1px solid #876039;
        border-radius: 50%;
        color: #876039;
        font-size: 18px;
        transition: all 0.3s ease;
    }
    .social-icons a:hover,
    .social-icons a:active {
        background-color: #876039;
        color: #fff;
    }


/* Responsive */
@media (max-width: 768px) {
  .profile-container {
    flex-direction: column;
    text-align: center;
  }

  .info-grid {
    flex-direction: column;
  }

  .info-box {
    flex: 1 1 100%;
  }
}
.btn__primary_new_outline {
    border-radius: .5rem;
    border-width: 1px;
    display: inline-block;
    --tw-border-opacity: 1;
    border-color: #876039;
    --tw-bg-opacity: 1;
    background-color: rgb(255 255 255/var(--tw-bg-opacity));
    font-size: 1rem;
    font-weight: 500;
    line-height: 1.5rem;
    padding: .5rem 1.5rem;
    --tw-text-opacity: 1;
    color: #876039
}

.btn__primary_new_outline:focus,.btn__primary_new_outline:hover {
    --tw-bg-opacity: 1;
    background-color: #876039;
    color: #fff;
}

.btn__primary_new_outline:focus {
    outline: 2px solid transparent;
    outline-offset: 2px
}
.btn__primary_new_outline:active {
     --tw-bg-opacity: 1;
    background-color: #876039;
    color: #fff;
}


</style>

<div class="breadcrumb-section">
  <div class="breadcrumb-container max-w-7xl">
    
    <!-- Left Column -->
    <div class="breadcrumb-text">
      <h1 class="breadcrumb-title">About Us</h1>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="/" class="text-muted">Home</a>
          </li>
          <li class="breadcrumb-item active text-theme" aria-current="page">About Us</li>
        </ol>
      </nav>
    </div>

    <!-- Right Column -->
    <div class="breadcrumb-image-container">
      <img src="{{asset('landing/aboutbc.svg')}}" alt="About Us Illustration" class="breadcrumb-image">
    </div>

  </div>
</div>

{{-- top benefits start --}}
<div class="mt-10 mb-10 mx-auto max-w-7xl" style="padding-bottom: 30px; padding-top: 60px;">
        <h2 class="font-bold text-3xl lgtext-4xl text-gray-800 text-center mb-3">
            Who We Are
        </h2>
         <p class="text-gray-500 dark:text-neutral-500 text-center mb-12 pb-3">
            WeGeni delivers innovative solutions that turn your goals into achievements and create lasting impact.</p>
        <div class="md:grid md:grid-cols-2 md:items-center md:gap-12 xl:gap-18 px-4 container" style=" justify-self: center;">
            <!-- Right Image -->
            <div class="md:block">
                <img class="w-full mx-auto rounded-xl border border-gray-100 shadow" src="{{ asset('landing/about.jpg') }}"
                    alt="order management" style="height: 500px; object-fit: cover;">
            </div>

            <!-- Right Benefits -->
            <div class="mt-5 sm:mt-10 lg:mt-0 space-y-8">
            
                <!-- Benefit Item -->
                <div class="items-start gap-6">
                    <h3 class="font-bold text-2xl lgtext-3pxl text-gray-800  mb-3" >
                        WeGeni Redefining Restaurants with Next-Level Technology 
                    </h3>
                    <p class="text-gray-500 dark:text-neutral-500" style="text-align: justify;">
                        <i>Founded in 2017, WeGeni delivers premium software solutions that help restaurants, cafés, and food businesses operate with clarity and confidence. We combine technology expertise with industry insights to design tools that improve service, streamline operations, and support sustainable growth. Our commitment is to provide dependable solutions backed by clear communication and measurable results.</i> 
                    </p>        
                </div>

                <div class="flex items-start gap-6">
                    <img src="{{ asset('landing/vision.svg') }}" alt="Billing Icon" class="h-10 w-10">
                    <div>
                        <h3 class="font-semibold text-xl" style="color:#876039;">
                            Vision
                        </h3>
                        <p class="text-gray-500 dark:text-neutral-500 mt-1">
                            To be the most trusted technology partner for restaurants, enabling them to deliver exceptional dining experiences and achieve lasting success.                </p>
                    </div>
                </div>

                <div class="flex items-start gap-6">
                    <img src="{{ asset('landing/mission.svg') }}" alt="Feedback Icon" class="h-10 w-10">
                    <div>
                        <h3 class="font-semibold text-xl" style="color:#876039;">
                        Mission
                        </h3>
                        <p class="text-gray-500 dark:text-neutral-500 mt-1">
                            Our restaurant software is trusted by countless businesses to keep their daily operations running smoothly and enable uninterrupted workflows that support consistent growth and customer satisfaction.</p>
                    </div>
                </div>
            </div>
</div>
</div>

{{-- top benefits end --}}

<!-- Testimonials -->
<div class="max-w-7xl px-4 py-10 sm:px-6 lg:px-8 lg:py-1 mx-auto">

    <div class="mx-auto  mb-8 lg:mb-14 text-center">
        <h2 class="text-3xl lg:text-4xl text-gray-800 font-bold dark:text-neutral-200">
            Why Choose Us
        </h2>
    </div> 

    <!-- Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Card -->
        <div class="flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700">
            <div class="flex-auto p-4 md:p-6">
                <img src="{{ asset('landing/why1.svg') }}" alt="Feedback Icon" class="h-12 w-12 mb-3">
                    <div>
                        <h3 class="font-semibold text-xl" style="color:#876039;">
                        Built for the Restaurant Industry
                        </h3>
                        <p class="text-gray-500 dark:text-neutral-500 mt-1">
                            Our solutions reflect a deep understanding of restaurant operations - from reservations and orders to inventory and performance tracking.</p>
                    </div>
                </div>
            </div>
        <!-- Card -->
        <!-- Card -->
        <div class="flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700">
            <div class="flex-auto p-4 md:p-6">
                <img src="{{ asset('landing/why2.svg') }}" alt="Feedback Icon" class="h-12 w-12 mb-3">
                    <div>
                        <h3 class="font-semibold text-xl" style="color:#876039;">
                        Premium Quality Performance
                        </h3>
                        <p class="text-gray-500 dark:text-neutral-500 mt-1">
                            We build dependable systems for peak hours and adaptable growth, letting you focus on customers, not technical issues.</p>
                    </div>
                </div>
            </div>
        <!-- Card -->
        <!-- Card -->
        <div class="flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700">
            <div class="flex-auto p-4 md:p-6">
                <img src="{{ asset('landing/why3.svg') }}" alt="Feedback Icon" class="h-12 w-12 mb-3">
                    <div>
                        <h3 class="font-semibold text-xl" style="color:#876039;">
                        Long-Term Partnership
                        </h3>
                        <p class="text-gray-500 dark:text-neutral-500 mt-1">
                            We treat every client as a partner, offering ongoing updates, support, and enhancements to keep you ahead.</p>
                    </div>
                </div>
            </div>
        <!-- Card -->
    </div> 
    <!-- End Grid -->
</div>
<!-- End Testimonials -->

<div class="profile-section">
  <div class="profile-container">
    
    <!-- Profile Image -->
    <div class="profile-image">
      <img src="{{asset('landing/ceo_img.png')}}" alt="Profile">
    </div>

    <!-- Details -->
    <div class="profile-details">
      <h2 class="profile-name">Kishorekumar Chandrasekaran</h2>
      <div class="tag">Founder | Serial Entrepreneur | Swifty</div>
      
      <p class="profile-description">
        Kishorekumar Chandrasekaran is not just a visionary entrepreneur and digital transformation leader, he's a man deeply rooted in values, emotions, and purpose. Born with a fire to change the way tier-3 cities think about business, Kishore is the founder behind powerful ventures like FintechGie, Qifi Life, WeGeni and Young Chanakya. But beyond the boardrooms and strategies.
      </p>

      <!-- Info Cards -->
      <div class="info-grid">
        <div class="info-box">
            <div class="info-icon">
                <svg class="shrink-0 size-5 text-gray-500 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" style="color:#876039;">
                <path
                    d="M22 16.92v3a2 2 0 0 1-2.18 2A19.86 19.86 0 0 1 3 5.18 2 2 0 0 1 5 3h3a2 2 0 0 1 2 1.72c.13 1.12.46 2.2.98 3.2a2 2 0 0 1-.45 2.18L9.1 11.1a16 16 0 0 0 5.9 5.9l1.1-1.1a2 2 0 0 1 2.18-.45c1 .52 2.08.85 3.2.98a2 2 0 0 1 1.72 2z" />
                </svg>
            </div>
          <div>
            <div class="info-title">Phone</div>
            <div>+91 8667205661</div>
          </div>
        </div>
        <div class="info-box">
            <div class="info-icon">
                <svg class="shrink-0 size-5 text-gray-500 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" style="color:#876039;">
                <path
                    d="M21.2 8.4c.5.38.8.97.8 1.6v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V10a2 2 0 0 1 .8-1.6l8-6a2 2 0 0 1 2.4 0l8 6Z" />
                <path d="m22 10-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 10" />
                </svg>
            </div>
          <div>
            <div class="info-title">Email</div>
            <div>ceo@wegeni.com</div>
          </div>
        </div>
        </div>
      	<div class="social-grid">
          <div style="align-self:end">
              <a href="https://wegeni.com/ceo" class="btn btn__primary_new_outline text-center w-full !text-xs lg:!text-base" id="demo-bnt1" style="align-self:center">Know More</a>
          </div>
           <!-- Social Icons -->
          <div class="social-icons">
              <a href="https://www.linkedin.com/in/kishorekumarceo/?originalSubdomain=in"><i class="bi bi-linkedin"></i></a>
              <a href="https://www.facebook.com/kishorekumarceo/"><i class="bi bi-facebook"></i></a>
              <a href="https://www.instagram.com/kishorekumarceo/"><i class="bi bi-instagram"></i></a>
              <a href="https://x.com/kishorekumarceo"><i class="bi bi-twitter"></i></a>
              {{-- <a href="https://wegeni.com/ceo"><i class="bi bi-globe"></i></a> --}}
          </div>
       </div>
    </div>
  </div>
</div>


@endsection