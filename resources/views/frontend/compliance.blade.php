@php
    $meta = [
        'title' => 'Compliance | Geni Menu Restaurant Billing Software',
        'description' => 'Learn about Geni Menu\'s compliance standards, including GST, data security, and regulatory practices followed across our restaurant software platform.',
        'keywords' => 'Geni Menu compliance, WeGeni compliance policy, GST compliant restaurant software, restaurant software regulatory compliance, data compliance restaurant software, Geni Menu legal compliance, restaurant billing software compliance India, Geni Menu regulatory standards',
    ];
@endphp

@extends('layouts.frontend-master')


@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <div style="padding-top: 104px; padding-bottom: 60px;" class="px-4 sm:px-6">
        <div class="mx-auto max-w-4xl bg-white rounded-2xl p-6 sm:p-10 shadow-sm border border-gray-100">
            <header class="mb-8">
                <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4 text-center">Compliance - Geni Fast</h1>
                <p class="text-xl text-gray-600"></p>
                <p class="text-sm text-gray-500 mt-2 text-center">Last updated: {{ date('F j, Y') }}</p>
            </header>

            <section class="mb-8">
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 mb-6">
                    <h3 class="text-lg font-semibold text-blue-900 mb-3">Entity Information</h3>
                    <div class="space-y-2 text-blue-800">
                        <p><strong>Entity:</strong> WeGeni IT Services and Consulting (OPC) Private Limited</p>
                        <p><strong>Product:</strong> Geni Fast – Restaurant ERP, Billing & Management Software</p>
                        <p><strong>Website:</strong> <a href="https://restaurant.wegeni.com" style="color: #b39271;"
                                class="underline" target="_blank" rel="noopener">https://restaurant.wegeni.com</a></p>
                    </div>
                </div>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-semibold text-gray-900 mb-4">Our Commitment to Compliance</h2>
                <p class="mb-4">
                    At WeGeni IT Services and Consulting (OPC) Private Limited, we understand that restaurants rely on
                    technology partners who respect data, security, and privacy. Our product, Geni Fast, is built with these
                    principles at its core. While we are not currently certified under international compliance frameworks
                    such as SOC 2 or ISO/IEC 27001, we implement strong internal practices that reflect key pillars of these
                    standards.
                </p>
                <p class="mb-4">
                    Our commitment to secure service delivery is backed by responsible data handling policies, user privacy
                    practices, and adherence to Indian regulations.
                </p>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-semibold text-gray-900 mb-4">Applicable Indian Regulations</h2>
                <p class="mb-4">Geni Fast operates in full compliance with the following Indian legal standards:</p>

                <div class="space-y-4">
                    <div class="bg-green-50 border-l-4 border-green-400 p-4">
                        <h3 class="font-semibold text-green-900 mb-2">✅ Information Technology Act, 2000</h3>
                        <p class="text-green-700 text-sm">
                            We ensure our digital services align with India's IT Act, including requirements around
                            electronic records, authentication, and digital communication safety.
                        </p>
                    </div>

                    <div class="bg-green-50 border-l-4 border-green-400 p-4">
                        <h3 class="font-semibold text-green-900 mb-2">✅ IT Rules, 2011 – Reasonable Security Practices and
                            Sensitive Personal Data</h3>
                        <p class="text-green-700 text-sm">
                            WeGeni adheres to the principles of safe collection, secure storage, and limited disclosure of
                            sensitive personal data, as defined under Indian IT Rules.
                        </p>
                    </div>
                </div>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-semibold text-gray-900 mb-4">Security & Data Protection</h2>
                <p class="mb-4">
                    We have taken proactive steps to safeguard both business and customer data shared on the Geni Fast
                    platform:
                </p>

                <div class="space-y-4">
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h3 class="font-semibold text-gray-900 mb-2">
                            <i class="bi bi-shield-lock-fill text-primary me-2"></i> Encryption
                        </h3>
                        <p class="text-gray-700 text-sm">
                            All data transmitted via the platform is protected using SSL/TLS encryption.
                        </p>
                    </div>

                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h3 class="font-semibold text-gray-900 mb-2">
                            <i class="bi bi-lock-fill text-primary me-2"></i> Authentication
                        </h3>
                        <p class="text-gray-700 text-sm">
                            Strong login systems and access controls are implemented at the user level.
                        </p>
                    </div>

                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h3 class="font-semibold text-gray-900 mb-2">
                            <i class="bi bi-cloud-check-fill text-primary me-2"></i> Infrastructure
                        </h3>
                        <p class="text-gray-700 text-sm">
                            The platform is hosted on secure cloud environments with uptime and backup protections.
                        </p>
                    </div>

                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h3 class="font-semibold text-gray-900 mb-2">
                            <i class="bi bi-people-fill text-primary me-2"></i> Internal Controls
                        </h3>
                        <p class="text-gray-700 text-sm">
                            Access to customer data is limited to authorized personnel only, under strict policies.
                        </p>
                    </div>
                </div>


                <p class="mt-4">
                    We apply "privacy by design" practices during development, ensuring data minimization and secure
                    engineering.
                </p>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-semibold text-gray-900 mb-4">Customer Data Privacy</h2>
                <p class="mb-4">Geni Fast may collect limited business and operational data such as:</p>

                <ul class="list-disc list-inside mb-4 space-y-2">
                    <li>Restaurant profile (name, contact info)</li>
                    <li>Menu and billing configurations</li>
                    <li>Staff login and access data</li>
                    <li>Customer transaction records (when configured)</li>
                </ul>

                <p class="mb-4">
                    We do not collect sensitive personal information such as Aadhaar numbers, bank account details,
                    passwords, or health data unless explicitly configured by you and legally permitted.
                </p>

                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                    <p class="text-blue-800 text-sm">
                        Please review our full Privacy Policy:
                        <a href="{{ route('privacy.policy') }}" class="underline font-medium">Privacy Policy</a>
                    </p>
                </div>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-semibold text-gray-900 mb-4">Third-Party Compliance</h2>
                <p class="mb-4">Geni Fast integrates with trusted third-party tools for:</p>

                <ul class="list-disc list-inside mb-4 space-y-2">
                    <li>Payment gateways (Razorpay)</li>
                    <li>Printing systems</li>
                </ul>

                <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-4">
                    <h3 class="font-semibold text-yellow-900 mb-2">Payment Processing Compliance</h3>
                    <p class="text-yellow-800 text-sm mb-2">
                        We integrate with Razorpay, a PCI-DSS and ISO 27001-compliant payment gateway, for processing all
                        financial transactions. Razorpay handles all cardholder and UPI data with the highest level of
                        security.
                    </p>
                    <p class="text-yellow-700 text-sm">
                        We do not store sensitive payment data such as credit card numbers or CVV on our servers. All such
                        information is securely transmitted to and processed by Razorpay according to industry standards.
                    </p>
                </div>

                <p class="mb-4">
                    Each of these vendors operates under their own privacy and security policies. We ensure only essential,
                    minimal data is shared through secure APIs.
                </p>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-semibold text-gray-900 mb-4">Limitations of Liability</h2>
                <p class="mb-4">Geni Fast is not currently certified under:</p>

                <ul class="list-disc list-inside mb-4 space-y-2">
                    <li>SOC 2 (Service Organization Controls)</li>
                    <li>ISO/IEC 27001 (Information Security Management Systems)</li>
                    <li>GDPR, HIPAA, or CCPA compliance frameworks</li>
                </ul>

                <div class="bg-red-50 border-l-4 border-red-400 p-4">
                    <p class="text-red-800 text-sm">
                        <strong>Important:</strong> If your business falls under highly regulated industries such as
                        banking, insurance, or healthcare, we recommend conducting an internal risk assessment before using
                        our Services.
                    </p>
                </div>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-semibold text-gray-900 mb-4">Ongoing Compliance Efforts</h2>
                <p class="mb-4">
                    We are working to strengthen our legal and operational readiness. As part of our roadmap, we are
                    exploring:
                </p>

                <ul class="list-disc list-inside mb-4 space-y-2">
                    <li>Internal audits and secure coding practices</li>
                    <li>Documented business continuity and incident response plans</li>
                    <li>Potential alignment with ISO 27001 controls</li>
                    <li>Optional NDAs and service-level clauses for enterprise customers</li>
                </ul>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-semibold text-gray-900 mb-4">Your Responsibilities</h2>
                <p class="mb-4">As a restaurant/business owner using Geni Fast, you are responsible for:</p>

                <ul class="list-disc list-inside mb-4 space-y-2">
                    <li>Ensuring that customer and staff data entered into the system complies with Indian privacy laws</li>
                    <li>Only using our system for lawful and permitted activities</li>
                    <li>Protecting access credentials to prevent misuse of your account</li>
                </ul>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-semibold text-gray-900 mb-4">Contact for Compliance Inquiries</h2>

                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Grievance Officer</h3>
                    <p class="mb-2"><strong>Name:</strong> Mr. Kishorekumar Chandresekaran</p>
                    <p class="mb-2"><strong>Email:</strong> <a href="mailto:ceo@wegeni.com" class="text-blue-600 underline"
                            style="color: #b39271;">ceo@wegeni.com</a></p>
                    <p class="mb-4"><strong>Address:</strong> 13/9, 2nd Floor, HDFC Bank Upstairs, West Car Street,
                        Tiruchengode, Tamil Nadu – 637211</p>
                </div>

                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Support Contact</h3>
                    <p class="mb-2"><strong>Email:</strong> <a href="mailto:we@wegeni.com" class="text-blue-600 underline"
                            style="color: #b39271;">we@wegeni.com</a></p>
                    <p class="mb-4"><strong>Phone:</strong> <a href="tel:+919047755506" class="text-blue-600 underline"
                            style="color: #b39271;">+91 90477555066</a></p>
                </div>
            </section>

            <footer class="border-t pt-6 mt-8 mb-3">
                <div class="bg-indigo-50 border border-indigo-200 rounded-lg p-6">
                    <p class="text-indigo-800 font-medium mb-2">
                        By continuing to use Geni Fast, you confirm your understanding of and agreement to our compliance
                        approach and security practices.
                    </p>
                    <p class="text-indigo-600 text-sm">
                        For compliance-related questions or concerns, please contact us using the information provided
                        above.
                    </p>
                </div>
            </footer>
        </div>
    </div>
@endsection