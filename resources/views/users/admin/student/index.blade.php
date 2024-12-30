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
            <a href="{{ route('admin.students.create') }}" class="btn btn-primary">Add New Student</a>
            {{-- <a href="{{ route('student.projects.index') }}" class="btn btn-ghost">Refresh</a> --}}
        </div>
    </div>

    <div class="overflow-x-auto max-w-[45rem]">
        <table class="table-fixed table-xs w-full border-collapse border border-gray-200 text-sm">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-200 p-2 text-left w-16">LRN</th>
                    <th class="border border-gray-200 p-2 text-left w-48">Name</th>
                    <th class="border border-gray-200 p-2 text-left w-48">Email</th>
                    <th class="border border-gray-200 p-2 text-left w-32">Created At</th>
                    <th class="border border-gray-200 p-2 text-left w-32">Action</th>
                </tr>
            </thead>
            <tbody>


                @forelse ($students as $student)
                    <tr>
                        <td class="border border-gray-200 p-2 truncate">{{ $student->lrn }}</td>
                        <td class="border border-gray-200 p-2 truncate">

                            <div class="flex items-center gap-2">
                                @if ($student->profile->avatar)
                                    <img src="{{ $student->profile->avatar }}" alt="Avatar"
                                        class="w-6 h-6 rounded-full">
                                    <span>{{ $student->name }}</span>
                                @else
                                    <img src="https://ui-avatars.com/api/?name={{ $student->name }}" alt="Avatar"
                                        class="w-6 h-6 rounded-full">
                                    <span>{{ $student->name }}</span>
                                @endif
                            </div>

                        </td>
                        <td class="border border-gray-200 p-2 truncate">
                            {{ $student->email }}
                        </td>
                        <td class="border border-gray-200 p-2 truncate">
                            {{ $student->created_at->format('F d, Y') }}
                        </td>

                        <td class="border border-gray-200 p-2 truncate ">
                            <x-drawer :title="$student->name" :is-open="false" :width="90">
                                <x-slot name="trigger">
                                    <button class="btn btn-xs  btn-primary">
                                        <i class="fi fi-rr-eye"></i>
                                    </button>
                                </x-slot>


                                <div class="w-full flex flex-col gap-2">

                                    <div class="flex  justify-center">
                                        @if ($student->profile->avatar)
                                            <img src="{{ $student->profile->avatar }}" alt="Avatar"
                                                class="w-24 h-24 rounded-full object-cover">
                                        @else
                                            <img src="https://ui-avatars.com/api/?name={{ $student->name }}"
                                                alt="Avatar" class="w-24 h-24 rounded-full  object-cover">
                                        @endif
                                    </div>


                                    <h1 class="py-4 px-2 bg-gray-100 border-y w-full font-bold">
                                        Account Information
                                    </h1>

                                    <div class="flex flex-col gap-2 capitalize">
                                        <label for="" class="text-xs text-gray-600">Display Name </label>
                                        <p class="font-bold">
                                            {{ $student->name }}
                                        </p>
                                    </div>
                                    <div class="flex flex-col gap-2 capitalize">
                                        <label for="" class="text-xs text-gray-600">Email</label>
                                        <p class="font-bold">
                                            {{ $student->email }}
                                        </p>
                                    </div>
                                    <div class="flex flex-col gap-2 capitalize">
                                        <label for="" class="text-xs text-gray-600">LRN</label>
                                        <p class="font-bold">
                                            {{ $student->lrn }}
                                        </p>
                                    </div>



                                    <h1 class="py-4 px-2 bg-gray-100 border-y w-full font-bold">
                                        Profile Information
                                    </h1>

                                    <div class="grid grid-cols-3 grid-flow-row  gap-2">
                                        <div class="flex flex-col gap-2 capitalize">
                                            <label for="" class="text-xs text-gray-600">Last Name</label>
                                            <p class="font-bold">
                                                {{ $student->profile->last_name }}
                                            </p>
                                        </div>
                                        <div class="flex flex-col gap-2 capitalize">
                                            <label for="" class="text-xs text-gray-600">First Name</label>
                                            <p class="font-bold">
                                                {{ $student->profile->first_name }}
                                            </p>
                                        </div>
                                        <div class="flex flex-col gap-2 capitalize">
                                            <label for="" class="text-xs text-gray-600">Middle Name</label>
                                            <p class="font-bold">
                                                {{ $student->profile->middle_name }}
                                            </p>
                                        </div>

                                    </div>
                                </div>

                            </x-drawer>

                        </td>
                    </tr>
                @empty

                    <tr>
                        <td colspan="7" class="border border-gray-200 p-2 text-center">
                            No $students
                        </td>
                    </tr>
                @endforelse


            </tbody>
        </table>
        {{ $students->links() }}
    </div>
</x-dashboard.admin.base>
