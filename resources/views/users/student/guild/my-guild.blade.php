<x-dashboard.student.base>
    <div class="flex justify-between items-center  pb-10">
        <label class="input input-bordered flex items-center gap-2">
            <input type="text" class="grow input border-none" placeholder="Search" />
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="h-4 w-4 opacity-70">
                <path fill-rule="evenodd"
                    d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                    clip-rule="evenodd" />
            </svg>
        </label>

        <div class="flex items-center gap-5">
            <a href="{{ route('student.guilds.create') }}" class="btn btn-primary">Create Guild</a>
            <a href="{{ route('student.guilds.index') }}" class="btn btn-ghost">Refresh</a>
        </div>
    </div>

    <div class="grid grid-cols-3 grid-flow-row gap-2">
        @forelse($guilds as $guild)
            <a href="{{ route('student.guilds.show', ['guild' => $guild->id]) }}"
                class="h-32 p-5 rounded-lg border border-gray-500 flex gap-2">

                @if ($guild->image)
                    <img src="{{ $guild->image }}" class="w-1/3 aspect-square rounded-lg object-cover">
                @else
                    <img src="https://robohash.org/{{ $guild->name }}.png"
                        class="w-1/3 aspect-square rounded-lg object-cover">
                @endif

                <div class="flex grow flex-col gap-2">
                    <h1 class="text-lg font-bold">{{ $guild->name }}</h1>
                    <p class="text-xs">Owner : {{ $guild->user->name }}</p>
                    <p class="text-xs">
                        {{$guild->guildMembers()->count()}} Members
                    </p>
                </div>
            </a>
        @empty
            <div class="h-32 p-5 rounded-lg border border-gray-500 flex gap-2">
                No Guilds
            </div>
        @endforelse

    </div>

    {{ $guilds->links() }}
</x-dashboard.student.base>
