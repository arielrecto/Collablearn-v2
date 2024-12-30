<x-pre-register.base label="Student Details " :step="$preRegister->step">
    <form action="{{ route('pre-register.step-three.store', ['pre_register' => $preRegister->id]) }}" method="POST"
        class="flex flex-col gap-5 w-full">
        @csrf
        <div class="flex flex-col gap-2 capitalize">
            <p class="text-xs  text-gray-600">
                Learners Reference Number
            </p>
            <input type="text" name="lrn" class="input border border-gray-200">
            @if ($errors->has('lrn'))
                <p class="text-xs text-error">
                    {{ $errors->first('lrn') }}
                </p>
            @endif
        </div>
        <div class="flex flex-col gap-2 capitalize">
            <p class="text-xs  text-gray-600">
                Password
            </p>
            <input type="password" name="password" class="input border border-gray-200">
            @if ($errors->has('password'))
                <p class="text-xs text-error">
                    {{ $errors->first('password') }}
                </p>
            @endif
        </div>
        <div class="flex flex-col gap-2 capitalize">
            <p class="text-xs  text-gray-600">
                Confirm Password
            </p>
            <input type="password" name="password_confirmation" class="input border border-gray-200">
            @if ($errors->has('password_confirmation'))
                <p class="text-xs text-error">
                    {{ $errors->first('password_confirmation') }}
                </p>
            @endif
        </div>
        <button class="btn btn-primary text-white">Next</button>


        <p class="text-xs text-center">
            Already have an Account <a href="/" class="link link-primary  font-bold">Login</a>
        </p>

    </form>

</x-pre-register.base>
