<x-dashboard.student.base>
    <div class="flex flex-col gap-2 min-h-screen">

        <div class="py-10 flex items-center gap-2">
            <a href="{{ route('index') }}" class="w-5 p-1 flex rounded-full show-lg aspect-square shadow-lg bg-white">
                <i class="fi fi-rr-angle-small-left"></i>
            </a>
            <p>Back </p>
        </div>

        <div class="p-5 flex flex-col gap-2">
            <div class="flex   flex-col  gap-2">
                <h1 class="text-xl font-bold text-primary capitalize">
                    Edit Profile
                </h1>


                <div class="grid grid-cols-5 grid-flow-row gap-4">

                    <a href="{{ route('student.profile.edit') }}"
                        class="{{ Route::is(['student.profile.edit']) ? 'text-primary link' : '' }} w-full font-bold duration-700">
                        Profile Information
                    </a>

                    <a href="{{ route('student.profile.password-update') }}"
                        class="{{ Route::is(['student.profile.password-update']) ? 'text-primary link ' : '' }} w-full font-bold duration-700">
                        Change Password
                    </a>
                </div>
            </div>
            {{ $slot }}
        </div>

    </div>
</x-dashboard.student.base>
