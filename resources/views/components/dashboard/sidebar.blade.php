@props([
    'links' => [],
])

@php
    $user = Auth::user();
@endphp



<div class="w-64 h-screen flex flex-col bg-white border-r border-gray-200">
    <!-- User Info Section -->
    <div class="flex items-center p-4 border-b border-gray-200">
        <div class="flex items-center gap-3">
            <img src="https://ui-avatars.com/api/?name={{ $user->name }}" alt="Profile Image"
                class="h-12 w-12 rounded-full object-cover">
            <div>
                <h1 class="font-bold text-base text-gray-800 capitalize">{{ $user->name }}</h1>
                @if (Route::is(['student.*']))
                <p class="text-sm text-gray-500">LRN: {{ $user->lrn ?? '---' }}</p>
                @endif

            </div>
        </div>
    </div>

    <!-- Sidebar Links -->
    <div class="p-4 flex flex-col gap-6">
        @foreach ($links as $section)
            <div>
                <h2 class="text-sm font-bold uppercase mb-2">{{ $section['label'] }}</h2>
                <div class="flex flex-col gap-2">
                    @foreach ($section['items'] as $link)
                        <a href="{{ $link['url'] ? route($link['url']) : '#' }}"
                            class="flex items-center text-sm gap-2 p-2 rounded-md
                {{ Route::is($link['url']) ? 'bg-gray-100 font-bold text-gray-800' : 'hover:bg-gray-100 text-gray-600' }}
                ">
                            {!! $link['icon'] !!}
                            <span class="capitalize">{{ $link['name'] }}</span>

                            @if ($link['badgeTotal'] !== 0)
                                <span
                                    class="ml-auto text-xs text-white bg-red-500 rounded-full w-5 h-5 flex items-center justify-center">
                                    {{ $link['badgeTotal'] }}
                                </span>
                            @endif
                        </a>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

    <!-- Logout Section -->
    {{-- <div class="p-4">
        <form method="POST" action="{{ route('logout') }}"
            class="flex items-center text-gray-600 hover:bg-gray-100 p-2 rounded-md">
            @csrf
            <i class="fi fi-rr-sign-out-alt text-lg"></i>
            <button type="submit" class="ml-2 text-sm capitalize">Logout</button>
        </form>
    </div> --}}
</div>
