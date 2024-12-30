<x-pre-register.base label="basic Information">
    <form action="{{ route('pre-register.step-one.store') }}" method="POST" class="flex flex-col gap-5 w-full">
        @csrf
        <div class="flex flex-col gap-2 capitalize">
            <p class="text-xs  text-gray-600">
                First Name
            </p>
            <input type="text" name="first_name" class="input border border-gray-200">
            @if ($errors->has('first_name'))
                <p class="text-xs text-error">
                    {{ $errors->first('first_name') }}
                </p>
            @endif
        </div>
        <div class="flex flex-col gap-2 capitalize">
            <p class="text-xs  text-gray-600">
                Last Name
            </p>
            <input type="text" name="last_name" class="input border border-gray-200">
            @if ($errors->has('last_name'))
                <p class="text-xs text-error">
                    {{ $errors->first('last_name') }}
                </p>
            @endif
        </div>
        <div class="flex flex-col gap-2 capitalize">
            <p class="text-sm text-gray-600">
                Email
            </p>
            <input type="email" name="email" class="input border border-gray-200">
            @if ($errors->has('email'))
                <p class="text-xs text-error">
                    {{ $errors->first('email') }}
                </p>
            @endif
        </div>

        <button class="btn btn-primary text-white">Next</button>


        <p  class="text-xs text-center">
            Already have an Account  <a href="/" class="link link-primary  font-bold">Login</a>
        </p>

    </form>

</x-pre-register.base>
