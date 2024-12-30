@props(['step' => 1, 'label' => 'Sample Label', 'title' => 'Create Account'])

<x-app-layout>
    <div class="flex items-center justify-center gap-2 min-h-screen w-full">
        <div class="flex flex-col w-1/3 ">

            <div class="flex items-center justify-center">
                <img src="{{ asset('logo.png') }}" alt="" srcset=""
                    class="w-24 h-24 aspect-square object-cover">
            </div>

            <div class="flex flex-col gap-2 p-5 shadow-lg bg-white rounded-lg w-full">
                <p class="capitalize text-sm text-gray-600">
                    step {{ $step }} / 5
                </p>
                <h1 class="text-lg font-bold text-primary">

                    {{ $title }}
                </h1>

                <p class="text-sm text-gray-600">
                    {{ $label }}
                </p>
                {{ $slot }}
            </div>


        </div>
    </div>
</x-app-layout>
