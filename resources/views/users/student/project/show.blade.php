@php
    use Illuminate\Support\Carbon;
@endphp
<x-dashboard.student.project.base :project="$project">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 p-6">

        <div class="border rounded-lg p-4 shadow-md">
            <h2 class="text-lg font-semibold">Complete Tasks</h2>
            <div class="flex justify-center items-center h-full">
                <div class="flex items-center justify-center h-full">
                    <div class="text-4xl font-bold text-yellow-500">{{ $percentTotalTasks }}%</div>
                </div>
            </div>
        </div>


        <div class="border rounded-lg p-4 shadow-md flex flex-col gap-2">
            <h2 class="text-lg font-semibold">Task Status</h2>



            <div x-data="pieChart" class="h-64 w-auto aspect-square mx-auto mt-10">
                <canvas x-ref="chart" x-init="update({{ $taskCounts }})"></canvas>
            </div>



        </div>


        <div class="border rounded-lg p-4 shadow-md">
            <h2 class="text-lg font-semibold">Overdue Work Items</h2>
            <ul class="space-y-2">

                @foreach ($overdueTasks as $overdueTask)
                    <li class="flex justify-between text-sm">
                        <span>{{ $overdueTask->name }}</span>
                        <span class="text-error">late by
                            {{ Carbon::parse($overdueTask->due_date)->diffInDays() }}</span>
                    </li>
                @endforeach


            </ul>
        </div>


        <div class="border rounded-lg p-4 shadow-md">
            <h2 class="text-lg font-semibold">Upcoming Work Items</h2>
            <ul class="space-y-2">


                @foreach ($upcomingTasks as $upcomingTask)
                    <li class="flex justify-between text-sm">
                        <span>{{ $upcomingTask->name }}</span>
                        <span class="text-green-500">{{ Carbon::parse($upcomingTask->start_date)->diffInDays() }} day
                            left</span>
                    </li>
                @endforeach


            </ul>
        </div>


        <div class="border rounded-lg p-4 shadow-md lg:col-span-2 flex flex-col items-center">
            <h2 class="text-lg font-semibold mb-4">Today's Work Items</h2>

            @forelse ($todayTasks as $todayTask)
                <div class="flex justify-between text-sm">
                    <span>{{ $todayTask->name }}</span>
                    <span class="text-xs">Due Date : {{ $todayTask->due_date }}</span>
                </div>
            @empty
                <div class="flex flex-col items-center text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mb-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m2 0a2 2 0 100-4H7a2 2 0 100 4m3 8H6a2 2 0 01-2-2V6a2 2 0 012-2h12a2 2 0 012 2v10a2 2 0 01-2 2h-6l-2 2z" />
                    </svg>
                    <p>No work items for today!</p>
                </div>
            @endforelse

        </div>
    </div>

</x-dashboard.student.project.base>
