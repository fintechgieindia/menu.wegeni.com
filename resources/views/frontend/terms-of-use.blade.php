@php
    $meta = [
        'title' => 'Terms of Use | Geni Menu Restaurant Billing Software',
        'description' => 'Understand the terms of use governing access to Geni Menu\'s website and restaurant billing software services by WeGeni.',
        'keywords' => 'Geni Menu terms of use, WeGeni website terms, restaurant software terms of use, Geni Menu platform usage policy, restaurant billing software access terms, Geni Menu website usage terms',
    ];
@endphp

@extends('layouts.frontend-master')


@section('content')
    <div style="padding-top: 104px; padding-bottom: 60px;" class="px-4 sm:px-6">
        <div class="mx-auto max-w-4xl bg-white rounded-2xl p-6 sm:p-10 shadow-sm border border-gray-100">
            <header class="mb-8">
                <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4 text-center">Terms of Use - Geni Fast</h1>
                <p class="text-xl text-gray-600"></p>
                <p class="text-sm text-gray-500 mt-2 text-center">Last updated: {{ date('F j, Y') }}</p>
            </header>

            <section class="mb-8">
                <div class="bg-red-50 border-l-4 border-red-400 p-6 mb-6">
                    <p class="text-red-800 font-medium">
                        Geni Fast, A SOFTWARE-AS-A-SERVICE (SAAS) FOR RESTAURANT MANAGEMENT, INCLUDING BILLING, POS, MENU,
                        ORDER MANAGEMENT, AND SALES REPORTING, IS PROVIDED TO YOU OR THE ENTITY THAT YOU REPRESENT
                        (HEREINAFTER "YOU" OR "YOUR") BY WEGENI IT SERVICES AND CONSULTING (OPC) PRIVATE LIMITED
                        (HEREINAFTER "WEGENI", "WE", OR "US") SUBJECT TO THE FOLLOWING TERMS AND CONDITIONS (HEREINAFTER
                        "TERMS").
                    </p>
                    <p class="text-red-700 mt-4 font-semibold">
                        USE OF Geni Fast CONSTITUTES ACCEPTANCE OF THESE TERMS. IF YOU DO NOT AGREE TO THE TERMS, YOU MUST
                        NOT USE Geni Fast OR ANY OF ITS FEATURES.
                    </p>
                </div>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-semibold text-gray-900 mb-4">1. The Service</h2>
                <p class="mb-4">
                    Geni Fast is a cloud-based ERP and Point-of-Sale (PoS) solution for restaurants. The Service enables
                    restaurants to manage:
                </p>
                <ul class="list-disc list-inside mb-4 space-y-2">
                    <li>Digital Menu Management</li>
                    <li>Table Reservations with QR-based Access</li>
                    <li>Order Management and Kitchen Order Tickets (KOT)</li>
                    <li>Integrated Billing and Invoicing (PoS)</li>
                    <li>Payment Processing (via UPI, cards, bank integrations)</li>
                    <li>Sales Reports and Analytics</li>
                    <li>Table Management</li>
                    <li>Customer Support Tools</li>
                </ul>
                <p class="mb-4">
                    The Services may be accessed via our web platform at <a href="https://restaurant.wegeni.com"
                        class="text-blue-600 underline" style="color: #b39271;" target="_blank"
                        rel="noopener">https://restaurant.wegeni.com</a>, or via any software, mobile, or API-based
                    extensions we provide.
                </p>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-semibold text-gray-900 mb-4">2. Access and Account</h2>
                <p class="mb-4">
                    You may access the Geni Fast platform by creating a secure account via your organization or as an
                    authorized user under a B2B plan. You are responsible for maintaining the confidentiality of your login
                    credentials and any activity under your account.
                </p>
                <p class="mb-4">
                    Access to certain features may require a paid subscription and is subject to verification by WeGeni.
                </p>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-semibold text-gray-900 mb-4">3. Restrictions on Use</h2>
                <p class="mb-4">By using Geni Fast, you agree not to:</p>
                <ul class="list-disc list-inside mb-4 space-y-2">
                    <li>Use the platform for any unlawful or fraudulent purpose</li>
                    <li>Reproduce, resell, or exploit any portion of the platform without our written consent</li>
                    <li>Reverse engineer, decompile, or attempt to extract the source code</li>
                    <li>Circumvent access controls or attempt unauthorized access to any system or data</li>
                    <li>Use the platform to collect sensitive data like credit card numbers, OTPs, or passwords without
                        authorization</li>
                </ul>
                <p class="mb-4">
                    You are solely responsible for ensuring your data inputs, forms, configurations, and logic are secure,
                    accurate, and in compliance with local laws.
                </p>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-semibold text-gray-900 mb-4">4. Data Ownership and Intellectual Property</h2>
                <p class="mb-4">
                    All rights, title, and interest in the Geni Fast software, interfaces, visual elements, reports, and
                    related technology belong exclusively to WeGeni IT Services and Consulting (OPC) Private Limited.
                </p>
                <p class="mb-4">
                    You retain ownership over your restaurant-specific content (such as menu data, order logs, and customer
                    interactions), but grant us a license to store and process this information in order to provide
                    Services.
                </p>
                <p class="mb-4">
                    You may not remove or alter any proprietary notices or branding.
                </p>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-semibold text-gray-900 mb-4">5. Application Sharing and Usage</h2>
                <p class="mb-4">
                    Each Geni Fast subscription is valid for use by a single restaurant or outlet unless otherwise specified
                    in your plan.
                </p>
                <p class="mb-4">You may not:</p>
                <ul class="list-disc list-inside mb-4 space-y-2">
                    <li>Resell or white-label the Service to others without written consent</li>
                    <li>Use the platform for multiple businesses under a single account unless authorized</li>
                    <li>Publicly share system-generated links or dashboards without access controls</li>
                </ul>
                <p class="mb-4">
                    We may restrict the number of devices, terminals, or users per plan.
                </p>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-semibold text-gray-900 mb-4">6. Usage Limits</h2>
                <p class="mb-4">
                    Your plan may define limits on the number of branches.
                </p>
                <p class="mb-4">
                    We reserve the right to restrict, throttle, or suspend access if you exceed your plan's limits
                    repeatedly or violate fair usage policies.
                </p>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-semibold text-gray-900 mb-4">7. Data Security</h2>
                <p class="mb-4">
                    While we implement reasonable security measures (e.g., encrypted data, HTTPS, role-based access), you
                    are responsible for:
                </p>
                <ul class="list-disc list-inside mb-4 space-y-2">
                    <li>Safeguarding your login credentials</li>
                    <li>Properly configuring user roles and permissions</li>
                    <li>Reviewing logs and audit trails regularly</li>
                </ul>
                <p class="mb-4">
                    We are not responsible for any unauthorized data access resulting from your negligence or third-party
                    integrations you authorize.
                </p>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-semibold text-gray-900 mb-4">8. Phishing, Fraud & Abuse</h2>
                <p class="mb-4">You may not use the Geni Fast platform for:</p>
                <ul class="list-disc list-inside mb-4 space-y-2">
                    <li>Sending phishing links or malicious content</li>
                    <li>Collecting payment credentials or personal data without a legal basis</li>
                    <li>Hosting forms that misrepresent their intent</li>
                </ul>
                <p class="mb-4">
                    We reserve the right to suspend your account immediately if such violations are discovered.
                </p>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-semibold text-gray-900 mb-4">9. Billing and Subscriptions</h2>
                <ul class="list-disc list-inside mb-4 space-y-2">
                    <li>A free trial may be offered (typically 7 days) with limited access to premium features.</li>
                    <li>Subscription fees are payable in advance via supported payment gateways.</li>
                    <li>No refunds will be issued for partial usage, cancellation, or unused time unless required by law.
                    </li>
                    <li>WeGeni may change pricing or plans at any time with prior notice.</li>
                    <li>If payment fails or subscription lapses, your access may be restricted or downgraded.</li>
                </ul>

                <h3 class="text-lg font-semibold text-gray-900 mb-3 mt-6">Payment Processing</h3>
                <p class="mb-4">
                    We use Razorpay to process all online payments securely. Razorpay is a PCI DSS-compliant payment
                    processor. By initiating a payment through our platform, you authorize Razorpay to process the
                    transaction on your behalf.
                </p>
                <p class="mb-4">
                    We do not store your card information on our systems. All transactions are encrypted and securely
                    processed via Razorpay's infrastructure.
                </p>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-semibold text-gray-900 mb-4">10. Custom Modules and Services</h2>
                <p class="mb-4">
                    The Geni Fast platform may offer custom features, integrations, or configurations based on your selected
                    plan or as per a separate service-level agreement. These customizations may incur additional fees and
                    may be governed by specific terms mutually agreed upon between you and WeGeni.
                </p>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-semibold text-gray-900 mb-4">11. Modification of Terms</h2>
                <p class="mb-4">
                    We reserve the right to update these Terms at any time. Any changes will be posted at <a
                        href="https://restaurant.wegeni.com" class="text-blue-600 underline" target="_blank"
                        style="color: #b39271;" rel="noopener">https://restaurant.wegeni.com</a>, and material changes may
                    be communicated via email or app notifications.
                </p>
                <p class="mb-4">
                    Continued use of the Services after an update constitutes your agreement to the revised Terms.
                </p>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-semibold text-gray-900 mb-4">12. Termination and Suspension</h2>
                <p class="mb-4">We may suspend or terminate your account if you:</p>
                <ul class="list-disc list-inside mb-4 space-y-2">
                    <li>Breach these Terms</li>
                    <li>Violate applicable laws</li>
                    <li>Fail to pay subscription dues</li>
                    <li>Pose a threat to system integrity</li>
                </ul>
                <p class="mb-4">
                    Upon termination, your access will be revoked and your data may be retained or deleted as per our
                    Privacy Policy.
                </p>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-semibold text-gray-900 mb-4">13. Disclaimers and Limitations of Liability</h2>
                <ul class="list-disc list-inside mb-4 space-y-2">
                    <li>The Service is provided on an "as is" and "as available" basis.</li>
                    <li>We do not guarantee that the Service will be error-free, secure, or uninterrupted.</li>
                    <li>We are not liable for indirect, incidental, special, or consequential damages, including but not
                        limited to data loss, downtime, or lost profits.</li>
                    <li>Our total liability shall not exceed the amount paid by you in the preceding 6 months.</li>
                </ul>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-semibold text-gray-900 mb-4">14. Governing Law</h2>
                <p class="mb-4">
                    These Terms shall be governed by the laws of India, and any disputes shall be subject to the exclusive
                    jurisdiction of the courts in Namakkal District, Tamil Nadu.
                </p>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-semibold text-gray-900 mb-4">15. Contact Information</h2>
                <p class="mb-4">For any queries or grievances regarding these Terms, please contact:</p>

                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Grievance Officer</h3>
                    <p class="mb-2"><strong>Name:</strong> Mr. Kishorekumar Chandresekaran</p>
                    <p class="mb-2"><strong>Email:</strong> <a href="mailto:ceo@wegeni.com" class="text-blue-600 underline"
                            style="color: #b39271;">ceo@wegeni.com</a></p>
                    <p class="mb-4"><strong>Address:</strong> 13/9, 2nd Floor, HDFC Bank Upstairs, West Car Street,
                        Tiruchengode, Tamil Nadu – 637211</p>
                </div>

                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Customer Support</h3>
                    <p class="mb-2"><strong>Email:</strong> <a href="mailto:we@wegeni.com" class="text-blue-600 underline"
                            style="color: #b39271;">we@wegeni.com</a></p>
                    <p class="mb-4"><strong>Phone:</strong> <a href="tel:+919047755506" class="text-blue-600 underline"
                            style="color: #b39271;">+91 90477555066</a></p>
                </div>
            </section>

            <footer class="border-t pt-6 mt-8 mb-3">
                <div class="bg-purple-50 border border-purple-200 rounded-lg p-6">
                    <p class="text-purple-800 font-medium mb-2">
                        By accessing or using the Geni Fast platform, you confirm that you have read, understood, and agreed
                        to these Terms of Use.
                    </p>
                    <p class="text-purple-600 text-sm">
                        For questions or concerns about these terms, please contact us using the information provided above.
                    </p>
                </div>
            </footer>
        </div>
    </div>
@endsection