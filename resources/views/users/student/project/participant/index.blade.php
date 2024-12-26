<x-dashboard.student.project.base :project="$project">

    <div class="justify-end flex">


        <x-newModal title="Add Participant">
            <x-slot name="trigger">
                <button class="btn btn-sm btn-primary" @click="open = true">+ Add Participant</button>
            </x-slot>
            <form action="{{route('student.projects.participant.add')}}" method="POST" class="flex  flex-col gap-2">
                @csrf
                <input type="hidden" name="projectID" value="{{ $project->id }}">
                <p class="text-sm text-gray-500">
                    Select Perticipant
                </p>
                <select name="participant" class="select select-bordered">
                    <option disabled selected>Participants</option>
                    @foreach ($nonParticipants as $nonParticipant)
                        <option value="{{ $nonParticipant->id }}">{{ $nonParticipant->name }}</option>
                    @endforeach


                </select>


                <div class="flex gap-5  justify-end">
                    <button class="btn btn-sm btn-primary"> Add</button>
                    <button @click="open =  false" type="button" class="btn btn-sm"> Cancel </button>
                </div>
            </form>

        </x-newModal>
    </div>
    <div class="grid grid-cols-3 grid-flow-row gap-2">
        @forelse ($participants as $participant)
            <div
                class="h-32 w-full border rounded-lg p-5 hover:shadow-lg bg-white flex flex-col justify-between duration-700">
                <div class="flex flex-col gap-2 w-full">
                    <h1 class="text-lg font-bold text-primary capitalize flex items-center gap-5 border-b">
                        <span>
                            {{ $participant->user->name }}
                        </span>
                        <span class="text-xs text-gray-400"> LRN {{ $participant->user->lrn }}</span>
                    </h1>
                    <h1 class="text-sm font-semibold">
                        {{ $participant->user->email }}
                    </h1>
                </div>

                <p class="text-xs text-gray-400 text-end">
                    {{ $participant->created_at->format('F d, Y h:s') }}
                </p>
            </div>
        @empty
            <div>
                <h1 class="text-lg font-bold">No participants</h1>
            </div>
        @endforelse
    </div>
</x-dashboard.student.project.base>
