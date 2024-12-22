<x-dashboard.student.project.base :project="$project">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 p-6">

        <div class="border rounded-lg p-4 shadow-md">
            <h2 class="text-lg font-semibold">Complete Tasks</h2>
            <div class="flex justify-center items-center h-32">
                <div class="text-center">
                    <div class="text-4xl font-bold text-yellow-500">0%</div>
                </div>
            </div>
        </div>


        <div class="border rounded-lg p-4 shadow-md">
            <h2 class="text-lg font-semibold">Task Status</h2>
            <div class="flex justify-center items-center h-32">
                <div class="relative">
                    <svg class="w-24 h-24" viewBox="0 0 36 36">
                        <circle cx="18" cy="18" r="15" stroke-width="4" class="text-gray-200 fill-none" />
                        <circle cx="18" cy="18" r="15" stroke-width="4" class="text-blue-500 fill-none"
                            stroke-dasharray="90" stroke-dashoffset="0" stroke-linecap="round" />
                    </svg>
                    <div class="absolute inset-0 flex justify-center items-center text-2xl font-bold">4</div>
                </div>
            </div>
            <p class="text-center text-sm text-gray-600">In progress - 4</p>
        </div>


        <div class="border rounded-lg p-4 shadow-md">
            <h2 class="text-lg font-semibold">Overdue Work Items</h2>
            <ul class="space-y-2">
                <li class="flex justify-between text-sm">
                    <span>Manuscripts</span>
                    <span class="text-red-500">late by 1 day</span>
                </li>
                <li class="flex justify-between text-sm">
                    <span>Client Visit</span>
                    <span class="text-red-500">late by 3 days</span>
                </li>
            </ul>
        </div>


        <div class="border rounded-lg p-4 shadow-md">
            <h2 class="text-lg font-semibold">Upcoming Work Items</h2>
            <ul class="space-y-2">
                <li class="flex justify-between text-sm">
                    <span>System UI Design</span>
                    <span class="text-green-500">2 weeks left</span>
                </li>
                <li class="flex justify-between text-sm">
                    <span>Interviews and Surveys</span>
                    <span class="text-green-500">1 day left</span>
                </li>
            </ul>
        </div>


        <div class="border rounded-lg p-4 shadow-md lg:col-span-2 flex flex-col items-center">
            <h2 class="text-lg font-semibold mb-4">Today's Work Items</h2>
            <div class="flex flex-col items-center text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mb-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m2 0a2 2 0 100-4H7a2 2 0 100 4m3 8H6a2 2 0 01-2-2V6a2 2 0 012-2h12a2 2 0 012 2v10a2 2 0 01-2 2h-6l-2 2z" />
                </svg>
                <p>No work items for today!</p>
            </div>
        </div>
    </div>

</x-dashboard.student.project.base>
