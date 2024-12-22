<x-dashboard.student.project.base :project="$project">
    <div class="flex justify-between py-5">
        <h1 class="text-lg font-bold text-primary">
            Tasks
        </h1>

        <a href="{{ route('student.projects.create.task', ['project' => $project->id]) }}" class="btn btn-sm btn-primary">
            Add Task</a>
    </div>
    <div class="overflow-x-auto">
        <table class="table-auto w-full border-collapse border border-gray-200 text-sm">
            <thead>
                <tr class="bg-gray-100">
                    {{-- <th class="border border-gray-200 p-2 text-left">
                        <input type="checkbox" class="form-checkbox">
                    </th> --}}
                    <th class="border border-gray-200 p-2 text-left">ID</th>
                    <th class="border border-gray-200 p-2 text-left">Task Name</th>
                    <th class="border border-gray-200 p-2 text-left">Assignee</th>
                    <th class="border border-gray-200 p-2 text-left">Status</th>
                    <th class="border border-gray-200 p-2 text-left">Start Date</th>
                    <th class="border border-gray-200 p-2 text-left">Due Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tasks as $task)
                    <tr>
                        {{-- <td class="border border-gray-200 p-2">
                    <input type="checkbox" class="form-checkbox">
                </td> --}}
                        <td class="border border-gray-200 p-2">CL-{{ $task->id }}</td>
                        <td class="border border-gray-200 p-2">{{ $task->anme }}</td>
                        <td class="border border-gray-200 p-2 flex items-center gap-2">
                            <img src="https://via.placeholder.com/24" alt="Avatar" class="w-6 h-6 rounded-full">
                            <span>{{ $task->assign->name ?? 'No Assignee' }}</span>
                        </td>
                        <td class="border border-gray-200 p-2">
                            <x-badge :status="$task->status" />
                        </td>
                        <td class="border border-gray-200 p-2">{{ date('n-d-y', strtotime($task->start_date)) }}</td>
                        <td class="border border-gray-200 p-2 text-red-500">
                            {{ date('n-d-y', strtotime($task->due_date)) }}</td>
                    </tr>

                @empty
                    <tr>
                        <td>
                            No Task
                        </td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>

</x-dashboard.student.project.base>
