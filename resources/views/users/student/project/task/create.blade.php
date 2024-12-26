<x-dashboard.student.project.base :project="$project">
    <div class="flex justify-between py-5">
        <h1 class="text-lg font-bold text-primary">
            Create Task
        </h1>

        {{-- <a href="" class="btn btn-sm btn-primary">
            Add Task</a> --}}
    </div>
    <form action="{{ route('student.projects.store.task') }}" method="POST" class="flex gap-5"
        enctype="multipart/form-data">

        @csrf
        {{-- <div class="w-1/3" x-data="imagePreview">
            <div class="flex flex-col gap-2">
                <template x-if="!imgSrc">
                    <div class="w-full aspect-square bg-gray-500 rounded-lg">

                    </div>
                </template>
                <template x-if="imgSrc">
                    <div class="flex flex-col gap-2 w-auto">
                        <img :src="imgSrc"
                            class="w-full aspect-square bg-gray-500 rounded-lg object-cover max-w-96">
                        <div class="flex justify-center">
                            <button @click="imgSrc = null" class="btn btn-primary btn-sm">Change Image</button>
                        </div>
                    </div>

                </template>


                <div class="text-center">
                    <input type="file" name="image" @change="imagePreviewHandler($event)" id="guildPhoto"
                        class="hidden" />
                    <label for="guildPhoto" class="text-red-600 underline cursor-pointer">
                        Add Guild Photo
                    </label>
                </div>
            </div>
        </div> --}}

        <div class="flex flex-col gap-2 grow">
            <div class="flex flex-col gap-2">
                <label for="">Name</label>
                <input type="text" name="name" class="input w-full input-bordered">
            </div>
            <div class="flex flex-col gap-2">
                <label for="">Description</label>
                <textarea name="description" class="textarea textarea-bordered min-h-64"></textarea>
            </div>
            <div class="grid grid-cols-2 grid-flow-row gap-2">
                <div class="flex flex-col gap-2">
                    <label for="">Start Date</label>
                    <input type="date" name="start_date" class="input w-full input-bordered">
                </div>
                <div class="flex flex-col gap-2">
                    <label for="">Due Date</label>
                    <input type="date" name="due_date" class="input w-full input-bordered">
                </div>
            </div>

            <div class="flex flex-col gap-2">
                <label for="">Assign to</label>
                <select name="assign_to" class="select select-bordered w-full ">
                    <option disabled selected>Select Participant</option>

                    @forelse ($participants as $participant)
                        <option value="{{ $participant->user->id }}">{{ $participant->user->name }}</option>
                    @empty
                        <option disabled>No Participants</option>
                    @endforelse

                </select>
            </div>

            <input type="hidden" name="project" value="{{ $project->id }}">
            <div>
                <button class="btn btn-primary">Create</button>
            </div>
        </div>
    </form>
</x-dashboard.student.project.base>
