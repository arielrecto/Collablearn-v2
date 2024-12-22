@props([
    'project' => null,
])


<x-dashboard.student.base>
    <div class="flex flex-col gap-2 min-h-screen">

        <div class="py-10 flex items-center gap-2">
            <a href="{{route('student.projects.index')}}" class="w-5 p-1 flex rounded-full show-lg aspect-square shadow-lg bg-white">
                <i class="fi fi-rr-angle-small-left"></i>
            </a>
            <p>Back </p>
        </div>

        <div class="p-5 flex flex-col gap-2">
            <div class="flex   flex-col  gap-2">
                <h1 class="text-xl font-bold text-primary">
                    Collab Learn
                </h1>


                <div class="grid grid-cols-5 grid-flow-row gap-4">
                    @if (Route::is(['student.projects.show']))
                        <a href="{{ route('student.projects.show', ['project' => $project->id]) }}"
                            class="w-full font-bold link duration-700">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('student.projects.show', ['project' => $project->id]) }}"
                            class="w-full hover:font-bold hover:link duration-700">
                            Dashboard
                        </a>
                    @endif
                    @if (Route::is(['student.projects.tasks']))
                        <a href="{{ route('student.projects.tasks', ['project' => $project->id]) }}"
                            class="w-full font-bold link duration-700">
                            Task
                        </a>
                    @else
                        <a href="{{ route('student.projects.tasks', ['project' => $project->id]) }}"
                            class="w-full hover:font-bold hover:link duration-700">
                            Task
                        </a>
                    @endif
                </div>
            </div>
            {{ $slot }}
        </div>

    </div>
</x-dashboard.student.base>
