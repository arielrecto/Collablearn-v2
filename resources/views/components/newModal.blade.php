<div x-data="{ open: false }" {{ $attributes }}>
    <!-- Trigger button -->
    @isset($trigger)
        <div @click="open = true">
            {{ $trigger }}
        </div>
    @endisset

    <!-- Modal -->
    <div x-show="open" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" x-cloak>
        <div class="bg-white rounded-lg shadow-lg w-1/3 max-w-md">
            <div class="p-5 border-b border-gray-200 flex justify-between items-center">
                <h2 class="text-lg font-semibold text-gray-700">
                    {{ $title ?? 'Modal Title' }}
                </h2>

                <button @click="open = false"
                    class="btn btn-xs btn-primary">
x
                </button>

            </div>
            <div class="p-5">
                {{ $slot }}
            </div>

        </div>
    </div>
</div>
