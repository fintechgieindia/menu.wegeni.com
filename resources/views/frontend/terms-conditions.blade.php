@php
    $meta = [
        'title' => 'Terms & Conditions | Geni Menu Restaurant Billing Software',
        'description' => 'Review the terms and conditions for using Geni Menu\'s restaurant billing, POS, and management software provided by WeGeni.',
        'keywords' => 'Geni Menu terms and conditions, WeGeni terms of service, restaurant software terms, Geni Menu usage terms, restaurant billing software legal terms, WeGeni service agreement, Geni Menu user agreement, restaurant POS software terms',
    ];
@endphp

@extends('layouts.frontend-master')


@section('content')
<div style="padding-top: 104px; padding-bottom: 60px;" class="px-4 sm:px-6">
    <div class="mx-auto max-w-4xl bg-white rounded-2xl p-6 sm:p-10 shadow-sm border border-gray-100">
        <header class="mb-8">
            <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4 text-center">Terms and Conditions - Geni Fast</h1>
            <p class="text-xl text-gray-600"></p>
            <p class="text-sm text-gray-500 mt-2 text-center">Last updated: {{ date('F j, Y') }}</p>
        </header>

        <section class="mb-8">
            <h2 class="text-2xl font-semibold text-gray-900 mb-4">Introduction</h2>
            <p class="mb-4">
                These Terms of Service (the "Terms") define your legal rights and responsibilities related to your access and use of <a href="https://restaurant.wegeni.com" class="text-blue-600 underline" style="color: #b39271;" target="_blank" rel="noopener">https://restaurant.wegeni.com</a> (the "Site") and any related desktop, mobile, or software applications (collectively, the "App") developed and operated by WeGeni IT Services and Consulting (OPC) Private Limited ("Geni Fast", "We", "Us", or "Our").
            </p>
            <p class="mb-4">
                By downloading, installing, or using the App or Website, you agree to be bound by these Terms, our Privacy Policy, and, where applicable, any End User License Agreement (EULA). If you do not agree to these Terms, please do not use the App or Website.
            </p>
        </section>

        <section class="mb-8">
            <h2 class="text-2xl font-semibold text-gray-900 mb-4">Definitions</h2>
            <div class="mb-4">
                <p class="mb-4">
                    <strong>"Services"</strong> refers to the restaurant ERP modules provided by Geni Fast, including PoS (Billing), Order Ticketing, Table Management, Menu Management, Kitchen Display Systems (KOT), Payments (UPI/Card), Table Reservations, Sales Reports, QR Code Scanning, and other related features.
                </p>
                <p class="mb-4">
                    <strong>"Content"</strong> means proprietary content created and made available by Geni Fast in connection with the Services, including but not limited to software, designs, UI, analytics, dashboards, reports, icons, and visual elements.
                </p>
                <p class="mb-4">
                    <strong>"Your Content"</strong> or <strong>"User Content"</strong> means the data you upload or transmit through the Services, including restaurant menu items, customer data, billing data, QR setups, images, tables, order details, reviews, and configuration settings.
                </p>
            </div>
        </section>

        <section class="mb-8">
            <h2 class="text-2xl font-semibold text-gray-900 mb-4">General Rules Relating to Conduct</h2>
            <p class="mb-4">
                You are granted a personal, limited, non-exclusive, and non-transferable license to use the Services strictly in accordance with these Terms.
            </p>
            <p class="mb-4">You agree not to:</p>
            <ul class="list-disc list-inside mb-4 space-y-2">
                <li>Use the App for any illegal or unauthorized purpose</li>
                <li>Copy, modify, reverse engineer, or distribute any part of the Services</li>
                <li>Attempt unauthorized access to our systems or third-party integrations</li>
                <li>Upload viruses, malware, or harmful code</li>
                <li>Violate any applicable Indian or international laws while using the Services</li>
            </ul>
            <p class="mb-4">
                You agree to indemnify WeGeni from any legal claims, costs, damages, or liabilities resulting from your violation of these Terms.
            </p>
        </section>

        <section class="mb-8">
            <h2 class="text-2xl font-semibold text-gray-900 mb-4">Intellectual Property Rights and Content</h2>
            <p class="mb-4">
                All content, trademarks, logos, software, and designs provided via the Geni Fast are the sole property of WeGeni IT Services and Consulting (OPC) Private Limited. No rights, title, or interest shall be transferred to you except as expressly permitted under these Terms.
            </p>
            <p class="mb-4">You agree not to:</p>
            <ul class="list-disc list-inside mb-4 space-y-2">
                <li>Use our name, logo, or branding without written permission</li>
                <li>Reproduce or use our proprietary software or designs for commercial purposes</li>
                <li>Share or disclose confidential system architecture or dashboard designs</li>
            </ul>
            <p class="mb-4">
                By submitting User Content (like menu data, order details, and configuration), you grant us a perpetual, royalty-free, non-exclusive license to use such data for delivering and improving the Services. We do not claim ownership of your business or customer data.
            </p>
        </section>

        <section class="mb-8">
            <h2 class="text-2xl font-semibold text-gray-900 mb-4">Free Trial and Fees</h2>
            <p class="mb-4">
                We may offer a free trial of the Services for a limited period (typically 7 days), after which subscription charges apply as per our plan.
            </p>
            <ul class="list-disc list-inside mb-4 space-y-2">
                <li>Paid services will be billed in advance, annually or monthly, through integrated payment gateways (UPI/Credit/Debit/Net Banking).</li>
                <li>No refunds are issued for partial usage or cancellation unless explicitly stated.</li>
                <li>You can cancel your plan at any time through the billing dashboard or by contacting support.</li>
                <li>We reserve the right to revise pricing and plans, with prior notice to users.</li>
            </ul>
        </section>

        <section class="mb-8">
            <h2 class="text-2xl font-semibold text-gray-900 mb-4">Razorpay Usage</h2>
            <h3 class="text-lg font-semibold text-gray-900 mb-3">Free Trial and Fees / Billing & Payments</h3>
            <p class="mb-4">
                Payments for subscriptions or other services offered via Geni Fast are processed securely through Razorpay. By making a payment, you agree to the terms and conditions of Razorpay's services, including their payment processing terms.
            </p>
            <p class="mb-4">
                You are responsible for ensuring that your payment information is accurate and up to date. Failed or unauthorized payments may result in temporary suspension or cancellation of your access.
            </p>
        </section>

        <section class="mb-8">
            <h2 class="text-2xl font-semibold text-gray-900 mb-4">Privacy Policy</h2>
            <p class="mb-4">
                We are committed to protecting your privacy. Your data will be collected, stored, and processed in accordance with the <a href="{{ route('privacy_policy') }}" class="text-blue-600 underline" style="color: #b39271;">Geni Fast Privacy Policy</a>. By using our Services, you agree to the terms outlined therein.
            </p>
        </section>

        <section class="mb-8">
            <h2 class="text-2xl font-semibold text-gray-900 mb-4">Third-Party Services</h2>
            <p class="mb-4">
                The App may integrate third-party APIs and services including (but not limited to) payment gateways, analytics tools, SMS providers, and printers. Your use of these services is subject to their respective Terms of Use and Privacy Policies.
            </p>
            <p class="mb-4">
                We do not control or endorse third-party content or functionality and disclaim responsibility for their accuracy, performance, or legality.
            </p>
        </section>

        <section class="mb-8">
            <h2 class="text-2xl font-semibold text-gray-900 mb-4">Disclaimer / Liability</h2>
            <p class="mb-4">
                Use of the App is at your own risk. The App and Services are provided on an "as is" and "as available" basis. To the fullest extent permitted by law:
            </p>
            <p class="mb-4">
                WeGeni disclaims all warranties—express or implied—including merchantability and fitness for a particular purpose.
            </p>
            <p class="mb-4">We are not responsible for:</p>
            <ul class="list-disc list-inside mb-4 space-y-2">
                <li>Data loss due to system outages</li>
                <li>Downtime caused by external providers (e.g., payment gateways)</li>
                <li>Errors resulting from user misuse or incorrect setup</li>
                <li>Equipment damage or loss of profits due to app issues</li>
            </ul>
            <p class="mb-4">
                In no case shall WeGeni's total liability exceed the amount paid by you in the previous 3 months prior to a claim.
            </p>
        </section>

        <section class="mb-8">
            <h2 class="text-2xl font-semibold text-gray-900 mb-4">Service Suspension</h2>
            <p class="mb-4">We reserve the right to suspend or permanently terminate any user account:</p>
            <ul class="list-disc list-inside mb-4 space-y-2">
                <li>For violation of these Terms</li>
                <li>If required by law or regulation</li>
                <li>Due to security or technical reasons</li>
                <li>In case of unpaid subscriptions beyond the grace period</li>
            </ul>
            <p class="mb-4">
                WeGeni is not liable for any loss or damage resulting from suspension or termination.
            </p>
        </section>

        <section class="mb-8">
            <h2 class="text-2xl font-semibold text-gray-900 mb-4">Advertisers in the App</h2>
            <p class="mb-4">
                We do not endorse or accept responsibility for third-party advertisements or offers shown via the App. Any transactions between you and advertisers are solely between you and the third party.
            </p>
        </section>

        <section class="mb-8">
            <h2 class="text-2xl font-semibold text-gray-900 mb-4">Changes to Terms</h2>
            <p class="mb-4">
                We may update or modify these Terms from time to time. All changes will be posted on <a href="https://restaurant.wegeni.com" class="text-blue-600 underline" style="color: #b39271;" target="_blank" rel="noopener">https://restaurant.wegeni.com</a> and may also be communicated via email or in-app notifications.
            </p>
            <p class="mb-4">
                Continued use of the App after any update constitutes acceptance of the new Terms.
            </p>
        </section>

        <section class="mb-8">
            <h2 class="text-2xl font-semibold text-gray-900 mb-4">Governing Law</h2>
            <p class="mb-4">
                These Terms shall be governed by and construed in accordance with the laws of India. All disputes arising from or relating to the Services or these Terms shall be subject to the exclusive jurisdiction of the courts in Namakkal District, Tamil Nadu.
            </p>
        </section>

        <section class="mb-8">
            <h2 class="text-2xl font-semibold text-gray-900 mb-4">Contact Information</h2>
            <p class="mb-4">If you have any queries or wish to raise a concern, please contact:</p>
            
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Grievance Officer</h3>
                <p class="mb-2"><strong>Name:</strong> Mr. Kishorekumar Chandresekaran</p>
                <p class="mb-2"><strong>Email:</strong> <a href="mailto:ceo@wegeni.com" class="text-blue-600 underline" style="color: #b39271;">ceo@wegeni.com</a></p>
                <p class="mb-4"><strong>Address:</strong> 13/9, 2nd Floor, HDFC Bank Upstairs, West Car Street, Tiruchengode, Tamil Nadu – 637211</p>
            </div>

            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Customer Support</h3>
                <p class="mb-2"><strong>Email:</strong> <a href="mailto:we@wegeni.com" class="text-blue-600 underline" style="color: #b39271;">we@wegeni.com</a></p>
                <p class="mb-4"><strong>Phone:</strong> <a href="tel:+919047755506" class="text-blue-600 underline" style="color: #b39271;">+91 90477555066</a></p>
            </div>
        </section>

        <footer class="border-t pt-6 mt-8 mb-3">
            <div class="bg-green-50 border border-green-200 rounded-lg p-6">
                <p class="text-green-800 font-medium mb-2">
                    By using the Geni Fast App or Services, you agree to be bound by these Terms and Conditions.
                </p>
                <p class="text-green-600 text-sm">
                    For questions or concerns about these terms, please contact us using the information provided above.
                </p>
            </div>
        </footer>
    </div>
</div>
@endsection
