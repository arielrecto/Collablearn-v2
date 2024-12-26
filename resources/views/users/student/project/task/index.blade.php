@php
    use App\Enums\TaskStatus;
@endphp

<x-dashboard.student.project.base :project="$project">
    <div class="flex justify-between py-5">
        <h1 class="text-lg font-bold text-primary">
            Tasks
        </h1>

        <a href="{{ route('student.projects.create.task', ['project' => $project->id]) }}" class="btn btn-sm btn-primary">
            Add Task</a>
    </div>
    <div class="overflow-x-auto max-w-[45rem]">
        <table class="table-fixed table-xs w-full border-collapse border border-gray-200 text-sm">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-200 p-2 text-left w-16">ID</th>
                    <th class="border border-gray-200 p-2 text-left w-48">Task Name</th>
                    <th class="border border-gray-200 p-2 text-left w-48">Assignee</th>
                    <th class="border border-gray-200 p-2 text-left w-32">Status</th>
                    <th class="border border-gray-200 p-2 text-left w-32">Start Date</th>
                    <th class="border border-gray-200 p-2 text-left w-32">Due Date</th>
                    <th class="border border-gray-200 p-2 text-left w-32">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tasks as $task)
                    <tr>
                        <td class="border border-gray-200 p-2 truncate">CL-{{ $task->id }}</td>
                        <td class="border border-gray-200 p-2 truncate">{{ $task->name }}</td>
                        <td class="border border-gray-200 p-2 flex items-center gap-2 truncate">

                            @if ($task->assig)
                                <img src="https://via.placeholder.com/24" alt="Avatar" class="w-6 h-6 rounded-full">
                                <span> No Assignee</span>
                            @else
                                <img src="https://ui-avatars.com/api/?name={{ $task->assign->name }}" alt="Avatar"
                                    class="w-6 h-6 rounded-full">
                                <span>{{ $task->assign->name }}</span>
                            @endif
                        </td>
                        <td class="border border-gray-200 p-2 truncate">
                            <x-badge :status="$task->status" />
                        </td>
                        <td class="border border-gray-200 p-2 truncate">
                            {{ date('n-d-y', strtotime($task->start_date)) }}</td>
                        <td class="border border-gray-200 p-2 truncate text-red-500">
                            {{ date('n-d-y', strtotime($task->due_date)) }}
                        </td>
                        <td class="border border-gray-200 p-2 truncate ">
                            <x-drawer :title="$task->name" :is-open="false" :width="90">
                                <x-slot name="trigger">
                                    <button class="btn btn-xs  btn-primary">
                                        <i class="fi fi-rr-eye"></i>
                                    </button>
                                </x-slot>
                                <div class="flex justify-between items-center py-2">
                                    <h1 class="font-bold">
                                        CL-{{ $task->id }}
                                    </h1>
                                    <div x-data="{ open: false }">
                                        <button x-ref="button" @click="open = ! open">
                                            <x-badge :status="$task->status" />
                                        </button>

                                        <div x-show="open" x-anchor="$refs.button" @click.outside="open = false"
                                            class="p-2 rouded-lg show-lg bg-white show-lg">
                                            <form
                                                action="{{ route('student.projects.task.update.status', ['project_task' => $task->id]) }}"
                                                method="POST" class="p-2 flex flex-col gap-2">
                                                @csrf
                                                <select name="status" id=""
                                                    class="select select-sm text-sm select-bordered">

                                                    @foreach (TaskStatus::cases() as $status)
                                                        <option value="{{ $status->value }}">
                                                            <p>
                                                                <x-badge :status="$status->value" />
                                                            </p>

                                                        </option>
                                                    @endforeach

                                                </select>

                                                <button class="btn btn-sm btn-primary">Update</button>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                                <div class="grid grid-cols-2 grid-flow-row gap-2 capitalize">

                                    <div class="flex  flex-col gap-2">
                                        <p class="text-gray-500">
                                            start date
                                        </p>
                                        <p>
                                            {{ date('F d', strtotime($task->start_date)) }}
                                        </p>
                                    </div>
                                    <div class="flex  flex-col gap-2">
                                        <p class="text-gray-500">
                                            due date
                                        </p>
                                        <p>
                                            {{ date('F d', strtotime($task->due_date)) }}
                                        </p>
                                    </div>
                                </div>


                                <div class="min-h-32">
                                    {{ $task->description }}
                                </div>



                                <div class="flex  flex-col gap-2">
                                    <p class="text-gray-500">
                                        Assign To :
                                    </p>
                                    <p>
                                        {{ $task->assign->name ?? 'No Assign' }}
                                    </p>
                                </div>

                                {{-- <div class="flex  justify-end ">
                                    <div class="flex flex-col gap-2">
                                        <p class="text-gray-500"> Created By:</p>
                                        <p>
                                            {{ $task->createdBy->name }}
                                        </p>
                                    </div>
                                </div> --}}
                            </x-drawer>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="border border-gray-200 p-2 text-center">
                            No Tasks
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{$tasks->links()}}
    </div>

</x-dashboard.student.project.base>
