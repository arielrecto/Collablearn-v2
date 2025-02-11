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
            <a href="{{ route('student.projects.create') }}" class="btn btn-primary">Create Projects</a>
            <a href="{{ route('student.projects.index') }}" class="btn btn-ghost">Refresh</a>
        </div>
    </div>

    <div class="grid grid-cols-3 grid-flow-row gap-2">
        @forelse($projects as $project)
            <a href="{{ route('student.projects.show', ['project' => $project->id]) }}"
                class="min-h-32 w-full p-5 rounded-lg border border-gray-500 flex gap-2">

                @if ($project->image)
                    <img src="{{ $project->image }}" class="w-1/3 aspect-square rounded-lg object-cover">
                @else
                    <img src="https://robohash.org/{{ $project->name }}.png"
                        class="w-1/3 aspect-square rounded-lg object-cover">
                @endif

                <div class="flex grow flex-col gap-2 text-sm">
                    <h1 class="text-md font-bold">{{ $project->name }}</h1>
                    <p class="text-xs">Owner : {{ $project->user->name }}</p>
                    <p class="text-xs">
                        {{$project->projectParticipants()->count()}} Participants
                    </p>
                    <p class="text-xs">
                        Type: {{ $project->type }}
                    </p>
                </div>
            </a>
        @empty
            <div class="h-32 p-5 rounded-lg border border-gray-500 flex gap-2">
                No projects
            </div>
        @endforelse

    </div>

    {{ $projects->links() }}
</x-dashboard.student.base>
