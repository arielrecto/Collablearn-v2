<x-app-layout>
    <div class="flex items-center justify-center gap-2 min-h-screen w-full">
        <div class="w-4/6 flex items-center gap-2 justify-between">
            <div class="flex flex-col gap-2">
                <h1 class="text-5xl text-primary">
                    Change your password
                </h1>
                <p class="text-xl font-thin whitespace-pre-line">
                    Your password must be at least six characters and should include a combination of numbers, letters, and special characters.
                </p>
            </div>
            <form action="{{ route('password.store') }}" method="POST"
                class="flex flex-col gap-5 p-5 shadow-lg bg-white rounded-lg w-1/2">

                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                @csrf
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                        type="password"
                                        name="password_confirmation" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
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
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
