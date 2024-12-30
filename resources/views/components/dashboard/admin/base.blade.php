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
                // [
                //     'url' => 'student.projects.index',
                //     'name' => 'Projects',
                //     'icon' => '<i class="fi fi-rr-edit-alt"></i>',
                //     'badgeTotal' => 0,
                // ],
                [
                    'url' => null,
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

        <div class="w-1/5 border-l border-gray-200">
            <div class="flex items-center justify-end gap-5 p-5">
                <img src="{{ asset('animated-icons/bell.gif') }}" alt="" srcset="" class="w-12 aspect-auto">
                <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" alt="Profile Image"
                    class="h-12 w-12 rounded-full object-cover">
            </div>

        </div>
    </div>

</x-app-layout>
