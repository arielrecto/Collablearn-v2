@if (session()->has('success_message'))
    {{-- x-init executes a function when it initializes --}}
    <div x-data ="{ show: true }" x-init="setTimeout(() => show = false, 6000)" x-cloak x-show="show" x-transition.duration.200ms
        class="fixed z-50 flex items-center justify-center px-6 py-3 text-center transform -translate-x-1/2 rounded-md min-w-48 top-10 left-1/2 bg-success gap-x-5">
        <i class="fa-solid fa-circle-check"></i>
        <span>
            {{ session('success_message') }}
        </span>
    </div>
@endif

@if (session()->has('error_message'))
    {{-- x-init executes a function when it initializes --}}
    <div x-data ="{ show: true }" x-init="setTimeout(( => show = false, 6000)" x-cloak x-show="show" x-transition.duration.200ms
        class="fixed z-50 flex items-center justify-center px-6 py-3 text-center transform -translate-x-1/2 rounded-md min-w-48 top-10 left-1/2 bg-error gap-x-5">
        <i class="fa-solid fa-circle-exclamation"></i>
        <span>
            {{ session('error_message') }}
        </span>
    </div>
@endif

@if (session()->has('warning_message'))
    {{-- x-init executes a function when it initializes --}}
    <div x-data ="{ show: true }" x-init="setTimeout(() => show = false, 6000)" x-cloak x-show="show" x-transition.duration.200ms
        class="fixed z-50 flex items-center justify-center px-6 py-3 text-center transform -translate-x-1/2 rounded-md min-w-48 top-10 left-1/2 bg-warning gap-x-5">
        <i class="fa-solid fa-triangle-exclamation"></i>
        <span>
            {{ session('warning_message') }}
        </span>
    </div>
@endif

@if (session()->has('info_message'))
    {{-- x-init executes a function when it initializes --}}
    <div x-data ="{ show: true }" x-init="setTimeout(() => show = false, 6000)" x-cloak x-show="show" x-transition.duration.200ms
        class="fixed z-50 flex items-center justify-center px-6 py-3 text-center transform -translate-x-1/2 rounded-md min-w-48 top-10 left-1/2 bg-info gap-x-5">
        <i class="fa-solid fa-circle-info"></i>
        <span>
            {{ session('info_message') }}
        </span>
    </div>
@endif
