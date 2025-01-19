<x-app-layout>
    <div class="flex items-center justify-center gap-2 min-h-screen w-full">
        <div class="w-4/6 flex items-center gap-2 justify-between">
            <div class="flex flex-col gap-2">
                <h1 class="text-5xl text-primary">
                    Recover Your Account
                </h1>
                <p class="text-xl font-thin whitespace-pre-line">
                    Enter the email address associated with your account and we’ll send you a link to reset your
                    password.
                </p>
            </div>
            <form action="{{ route('password.email') }}" method="POST"
                class="flex flex-col gap-5 p-5 shadow-lg bg-white rounded-lg w-1/2">
                @csrf
                <input type="email" name="email" class="input border border-gray-200" placeholder="Email">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                {{-- <input type="password" name="password" class="input border border-gray-200" placeholder="Password"> --}}


                <button class="btn btn-primary text-white">Submit</button>

                {{-- <a href="{{route('password.request')}}" class="text-xs link text-center">Forgot Password</a>
                <p class="w-full border-b-2 border-black">

                </p>
                <a href="{{ route('pre-register.step-one.create') }}" class="btn">Create Account</a> --}}
            </form>
        </div>
    </div>
</x-app-layout>



{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
