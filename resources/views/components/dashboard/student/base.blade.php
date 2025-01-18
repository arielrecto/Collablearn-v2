@php

    $links = [
        [
            'label' => 'Menu',
            'items' => [
                [
                    'url' => null,
                    'name' => 'Home',
                    'icon' => '<i class="fi fi-rr-border-all"></i>',
                    'badgeTotal' => 0,
                ],
                [
                    'url' => 'student.guilds.index',
                    'name' => 'Guilds',
                    'icon' => '<i class="fi fi-rr-users-alt"></i>',
                    'badgeTotal' => 0,
                ],
                [
                    'url' => 'student.projects.index',
                    'name' => 'Projects',
                    'icon' => '<i class="fi fi-rr-edit-alt"></i>',
                    'badgeTotal' => 0,
                ],
                [
                    'url' => 'student.learning-modules.index',
                    'name' => 'Learning Modules',
                    'icon' => '<i class="fi fi-rr-books"></i>',
                    'badgeTotal' => 0,
                ],
            ],
        ],
        [
            'label' => 'My Tasks',
            'items' => [
                [
                    'url' => null,
                    'name' => 'Recent',
                    'icon' => '<i class="fi fi-rr-border-all"></i>',
                    'badgeTotal' => 0,
                ],
                [
                    'url' => 'student.guilds.my.guilds',
                    'name' => 'Joined Guilds',
                    'icon' => '<i class="fi fi-rr-users-alt"></i>',
                    'badgeTotal' => 0,
                ],
                [
                    'url' => 'student.projects.my.projects',
                    'name' => 'Joined Projects',
                    'icon' => '<i class="fi fi-rr-edit-alt"></i>',
                    'badgeTotal' => 0,
                ],
            ],
        ],
        [
            'label' => 'Lesson Activities',
            'items' => [
                [
                    'url' => null,
                    'name' => 'Catch-up Friday',
                    'icon' => '<i class="fi fi-rr-border-all"></i>',
                    'badgeTotal' => 0,
                ],
                [
                    'url' => null,
                    'name' => 'Lesson Material ',
                    'icon' => '<i class="fi fi-rr-users-alt"></i>',
                    'badgeTotal' => 0,
                ],
            ],
        ],
        // [
        //     'label' => 'Archives',
        //     'items' => [
        //         [
        //             'url' => null,
        //             'name' => 'Archived',
        //             'icon' => '<i class="fi fi-rr-box"></i>',
        //             'badgeTotal' => 0,
        //         ],
        //     ],
        // ],
    ];

    $profile = Auth::user()->profile;

@endphp

<x-app-layout>
    <div class="flex gap-2 w-full 4xl:max-w-5/6 min-h-screen">
        <x-dashboard.sidebar :links="$links" />
        <div class="flex flex-col gap-2 p-5 w-2/3">
            <x-flash-notification />
            @if (Route::is('student.dashboard'))
                <x-dashboard.header />
            @endif

            {{ $slot }}
        </div>

        <div x-data="{ open: false }" class="relative w-1/5 border-l border-gray-200">
            <!-- Top Bar -->
            <div class="flex items-center justify-end gap-5 p-5">
                <!-- Notification Icon -->
                <img src="{{ asset('animated-icons/bell.gif') }}" alt="Notifications" class="w-12 aspect-auto">

                <!-- Profile Image with Dropdown Toggle -->
                @if (!$profile->avatar)
                    <img @click="open = !open" src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}"
                        alt="Profile Image" class="h-12 w-12 rounded-full object-cover cursor-pointer">
                @else
                    <img @click="open = !open" src="{{ $profile->avatar }}" alt="Profile Image"
                        class="h-12 w-12 rounded-full object-cover cursor-pointer">
                @endif

            </div>

            <!-- Dropdown Menu -->
            <div x-show="open" @click.outside="open = false" x-cloak
                class="absolute right-0 mt-2 w-64 bg-red-700 text-white rounded-lg shadow-lg z-50">
                <!-- User Information -->
                <div class="flex items-center w-full px-2">
                    <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" alt="Profile Image"
                        class="h-12 w-12 rounded-full object-cover cursor-pointer">
                    <div class="p-4 border-b border-red-600">
                        <h3 class="text-lg font-semibold">{{ Auth::user()->name }}</h3>
                        <p class="text-sm">LRN No.: {{ Auth::user()->lrn }}</p>
                        <a href="{{ route('student.profile.edit') }}" class="flex items-center gap-2 px-4 py-2">
                            <span class="text-xs text-yellow-400">
                                Edit Profile</span>
                        </a>
                    </div>
                </div>


                <!-- Menu Items -->
                <div class="py-2 text-sm">

                    <a href="#" class="flex items-center gap-2 px-4 py-2 hover:bg-red-600">
                        <i class="fi fi-rr-bell-notification-social-media"></i>
                        Notifications
                    </a>
                    <a href="#" class="flex items-center gap-2 px-4 py-2 hover:bg-red-600">
                        <i class="fi fi-rr-feedback"></i>
                        Give Feedback
                    </a>
                    <a href="{{ route('privacy-policy') }}" class="flex items-center gap-2 px-4 py-2 hover:bg-red-600">
                        <i class="fi fi-rr-eye"></i>
                        Privacy Policy
                    </a>
                    <a href="{{ route('terms-and-conditions') }}"
                        class="flex items-center gap-2 px-4 py-2 hover:bg-red-600">
                        <i class="fi fi-rr-settings"></i>
                        Terms of Service
                    </a>
                    <form action="{{ route('logout') }}" method="POST"
                        class="flex items-center gap-2 px-4 py-2 hover:bg-red-600">
                        @csrf
                        <i class="fi fi-rr-power"></i>
                        <button> Sign Out</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
