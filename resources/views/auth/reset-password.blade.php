<x-auth-layout>
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
        <div class="flex flex-col justify-center items-center mb-6">
            <a class="flex gap-2 items-center text-xl font-medium dark:text-white app-logo">
                <img src="{{ global_setting()->logoUrl }}" class="h-8" alt="Logo" />
                @if (global_setting()->show_logo_text)
                    {{ global_setting()->name }}
                @endif
            </a>
        </div>

        <div class="text-center mb-6">
            <h2 class="text-2xl font-bold text-black dark:text-white">Create a New Password.</h2>
            <p class="mt-2 text-sm text-black dark:text-gray-300">Choose a new password to secure your account and get back to using GeniMenu with ease.</p>
        </div>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="block">
                <x-label for="email" value="{{ __('app.email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('app.password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('modules.profile.confirmPassword') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('messages.resetPassword') }}
                </x-button>
            </div>
        </form>
    </div>
</x-auth-layout>
