<x-auth-layout>
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 overflow-hidden sm:rounded-lg">

        <div class="text-center mb-6">
            <h2 class="text-2xl font-bold text-black dark:text-white">Let’s Get You Started.</h2>
            <p class="mt-2 text-sm text-black dark:text-gray-300">Create your account and take the first step toward managing your business with ease.</p>
        </div>

        <x-validation-errors class="mb-4"/>

        @session('status')
        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ $value }}
        </div>
        @endsession

        @livewire('forms.restaurantSignup')

    </div>

</x-auth-layout>
