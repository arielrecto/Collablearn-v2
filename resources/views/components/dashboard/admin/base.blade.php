@php

    $links = [
        [
            'label' => 'Menu',
            'items' => [
                [
                    'url' => 'admin.dashboard',
                    'name' => 'Home',
                    'icon' => '<i class="fi fi-rr-border-all"></i>',
                    'badgeTotal' => 0,
                ],
                [
                    'url' => 'admin.students.index',
                    'name' => 'Students',
                    'icon' => '<i class="fi fi-rr-users-alt"></i>',
                    'badgeTotal' => 0,
                ],
                [
                    'url' => 'admin.pre-register.index',
                    'name' => 'Pre-Registered Students',
                    'icon' => '<i class="fi fi-rr-student"></i>',
                    'badgeTotal' => 0,
                ],
                [
                    'url' => 'admin.learning-modules.index',
                    'name' => 'Learning Modules',
                    'icon' => '<i class="fi fi-rr-books"></i>',
                    'badgeTotal' => 0,
                ],
            ],
        ],
        // [
        //     'label' => 'My Tasks',
        //     'items' => [
        //         [
        //             'url' => null,
        //             'name' => 'Recent',
        //             'icon' => '<i class="fi fi-rr-border-all"></i>',
        //             'badgeTotal' => 0,
        //         ],
        //         [
        //             'url' => 'student.guilds.my.guilds',
        //             'name' => 'Joined Guilds',
        //             'icon' => '<i class="fi fi-rr-users-alt"></i>',
        //             'badgeTotal' => 0,
        //         ],
        //         [
        //             'url' => 'student.projects.my.projects',
        //             'name' => 'Joined Projects',
        //             'icon' => '<i class="fi fi-rr-edit-alt"></i>',
        //             'badgeTotal' => 0,
        //         ],
        //     ],
        // ],
        // [
        //     'label' => 'Lesson Activities',
        //     'items' => [
        //         [
        //             'url' => null,
        //             'name' => 'Catch-up Friday',
        //             'icon' => '<i class="fi fi-rr-border-all"></i>',
        //             'badgeTotal' => 0,
        //         ],
        //         [
        //             'url' => null,
        //             'name' => 'Lesson Material ',
        //             'icon' => '<i class="fi fi-rr-users-alt"></i>',
        //             'badgeTotal' => 0,
        //         ],
        //     ],
        // ],
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

@endphp


<x-app-layout>
    <div class="flex gap-2 w-full 4xl:max-w-5/6 min-h-screen">
        <x-dashboard.sidebar :links="$links" />
        <div class="flex flex-col gap-2 p-5 w-2/3">
            <x-flash-notification />
            @if (Route::is('admin.dashboard'))
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
                <img
                    @click="open = !open"
                    src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}"
                    alt="Profile Image"
                    class="h-12 w-12 rounded-full object-cover cursor-pointer">
            </div>

            <!-- Dropdown Menu -->
            <div
                x-show="open"
                @click.outside="open = false"
                class="absolute right-0 mt-2 w-64 bg-red-700 text-white rounded-lg shadow-lg z-50">
                <!-- User Information -->
                <div class="p-4 border-b border-red-600">
                    <h3 class="text-lg font-semibold">{{ Auth::user()->name }}</h3>
                    <p class="text-sm">LRN No.: {{ Auth::user()->lrn }}</p>
                </div>

                <!-- Menu Items -->
                <div class="py-2">
                    <a href="#" class="flex items-center gap-2 px-4 py-2 hover:bg-red-600">
                        <span class="material-icons">edit</span>
                        Edit Profile
                    </a>
                    <a href="#" class="flex items-center gap-2 px-4 py-2 hover:bg-red-600">
                        <span class="material-icons">notifications</span>
                        Notifications
                    </a>
                    <a href="#" class="flex items-center gap-2 px-4 py-2 hover:bg-red-600">
                        <span class="material-icons">feedback</span>
                        Give Feedback
                    </a>
                    <a href="{{route('privacy-policy')}}" class="flex items-center gap-2 px-4 py-2 hover:bg-red-600">
                        <span class="material-icons">privacy_tip</span>
                        Privacy Policy
                    </a>
                    <a href="#" class="flex items-center gap-2 px-4 py-2 hover:bg-red-600">
                        <span class="material-icons">gavel</span>
                        Terms of Service
                    </a>
                    <form action="{{route('logout')}}" method="POST" class="flex items-center gap-2 px-4 py-2 hover:bg-red-600">
                        @csrf
                        <button>
                            Sign Out
                         </button>

                    </forma>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
