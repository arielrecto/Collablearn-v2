<x-app-layout>
    <div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-md">


        <div class="flex justify-between items-center">
            <div class="flex items-center gap-2">
                <img src="{{ asset('logo.png') }}" alt="" srcset="" class="w-12 h-12 object-cover">
                <h1 class="text-3xl font-bold text-primary mb-4">Terms and Conditions for Collab Learn</h1>
            </div>

            <a href="{{ route('index') }}" class="text-sm text-primary hover:underline">Back to Home</a>

        </div>


        {{-- <p class="text-gray-700 mb-6">Effective Date: [Insert Date]</p> --}}

        <h2 class="text-2xl font-semibold text-primary mb-4">Introduction</h2>
        <p class="text-gray-700 mb-6">Welcome to Collab Learn. By using our platform, you agree to comply with and be
            bound by the following terms and conditions. Please review them carefully. If you do not agree with these
            terms, you must not use our platform.</p>

        <h2 class="text-2xl font-semibold text-primary mb-4">Use of the Platform</h2>
        <p class="text-gray-700 mb-6">Collab Learn grants you a limited, non-exclusive, non-transferable license to use
            the platform for personal, educational purposes. You agree not to:</p>
        <ul class="list-disc list-inside text-gray-700 mb-6">
            <li>Use the platform for any unlawful or prohibited purposes.</li>
            <li>Attempt to gain unauthorized access to the platform or its related systems.</li>
            <li>Interfere with or disrupt the integrity or performance of the platform.</li>
        </ul>

        <h2 class="text-2xl font-semibold text-primary mb-4">User Accounts</h2>
        <p class="text-gray-700 mb-6">To access certain features, you may be required to create an account. You are
            responsible for maintaining the confidentiality of your account credentials and for all activities that
            occur under your account. Notify us immediately of any unauthorized use of your account.</p>

        <h2 class="text-2xl font-semibold text-primary mb-4">Intellectual Property</h2>
        <p class="text-gray-700 mb-6">All content, materials, and features available on Collab Learn, including but not
            limited to text, graphics, logos, and software, are the intellectual property of Collab Learn or its
            licensors. You agree not to reproduce, distribute, or create derivative works based on this content without
            prior written consent.</p>

        <h2 class="text-2xl font-semibold text-primary mb-4">Limitation of Liability</h2>
        <p class="text-gray-700 mb-6">Collab Learn is provided "as is" without warranties of any kind, either express or
            implied. To the fullest extent permitted by law, we shall not be liable for any damages arising from your
            use of the platform, including but not limited to direct, indirect, incidental, or consequential damages.
        </p>

        <h2 class="text-2xl font-semibold text-primary mb-4">Termination</h2>
        <p class="text-gray-700 mb-6">We reserve the right to suspend or terminate your access to Collab Learn at any
            time for violations of these terms or for any other reason at our sole discretion.</p>

        <h2 class="text-2xl font-semibold text-primary mb-4">Governing Law</h2>
        <p class="text-gray-700 mb-6">These terms and conditions are governed by and construed in accordance with the
            laws of [Insert Jurisdiction]. Any disputes arising under these terms shall be subject to the exclusive
            jurisdiction of the courts located in [Insert Jurisdiction].</p>

        <h2 class="text-2xl font-semibold text-primary mb-4">Changes to These Terms</h2>
        <p class="text-gray-700 mb-6">We may update these terms from time to time. Continued use of the platform after
            changes are posted constitutes your acceptance of the revised terms. Please review this page periodically.
        </p>

        <h2 class="text-2xl font-semibold text-primary mb-4">Contact Us</h2>
        <p class="text-gray-700 mb-6">If you have any questions about these terms, please contact us:</p>
        <ul class="text-gray-700 mb-6">
            <li><strong>Email:</strong> <a href="mailto:support@collablearn.com"
                    class="text-primary">support@collablearn.com</a></li>
            <li><strong>Address:</strong> 1234 Learning Lane, Knowledge City, ED 56789</li>
            <li><strong>Phone:</strong> +1 (800) 123-4567</li>
        </ul>

        <p class="text-gray-700">Thank you for using Collab Learn!</p>
    </div>

</x-app-layout>
