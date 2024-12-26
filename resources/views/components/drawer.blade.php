<div x-data="{ isOpen: @json($isOpen ?? false) }" class="relative">

    @isset($trigger)
        <div @click="isOpen = true">
            {{ $trigger }}
        </div>
    @endisset

    <div x-show="isOpen" @keydown.escape.window="isOpen = false" class="fixed inset-0 z-50 flex justify-end"  x-cloak>


        <div @click="isOpen = false" class="fixed inset-0 bg-gray-800 bg-opacity-50">
        </div>


        <div class="relative bg-white w-[30rem] h-full shadow-lg transform transition-transform duration-300 ease-in-out"
            x-bind:class="{ '-translate-x-full': !isOpen, 'translate-x-0': isOpen }">

            <button @click="isOpen = false"
                class="absolute top-4 right-4 btn btn-xs btn-error">
                &times;
            </button>


            <div class="p-4 border-b">
                <h2 class="text-xl font-bold">{{ $title ?? 'Drawer Title' }}</h2>
            </div>


            <div class="p-4 flex flex-col gap-5">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
