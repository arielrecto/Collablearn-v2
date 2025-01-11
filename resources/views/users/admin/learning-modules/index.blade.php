<x-dashboard.admin.base>
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
            <a href="{{ route('admin.learning-modules.create') }}" class="btn btn-primary">Upload Learning Modules</a>
            {{-- <h1>
                Learning modules
            </h1> --}}
        </div>
    </div>


    <div class="grid grid-cols-3 grid-flow-row gap-2">

        @forelse ($learningModules as $learningModule)
            <div class="w-full h-auto bg-white shadow-md rounded-md p-5 flex flex-col gap-2">
                <div class="flex justify-between items-center">
                    <h1 class="text-lg font-semibold w-1/2 truncate">{{ $learningModule->title }}</h1>

                    <p class="text-xs text-gray-400">
                        {{ $learningModule->created_at->diffForHumans() }}
                    </p>
                </div>

                <div class="flex  flex-col gap-2 w-full h-24 overflow-hidden">
                    <p class="text-sm text-gray-500">
                        {{ $learningModule->description }}
                    </p>
                </div>

                <div class="flex gap-2 items-center">
                    <a href="{{ route('admin.learning-modules.show', ['learning_module' => $learningModule->id]) }}"
                        class="btn btn-primary btn-xs">View</a>
                        <a href="{{ route('admin.learning-modules.show', ['learning_module' => $learningModule->id]) }}"
                            class="btn btn-xs">({{$learningModule->attachments()->count()}}) Attachment</a>
                </div>
            </div>
        @empty
            <div class="w-full h-32 bg-white shadow-md rounded-md p-5">
                <div class="flex justify-between items-center">
                    <h1 class="text-lg font-semibold">No Learning Modules</h1>


                </div>
            </div>
        @endforelse

    </div>


    {{ $learningModules->links() }}


</x-dashboard.admin.base>
