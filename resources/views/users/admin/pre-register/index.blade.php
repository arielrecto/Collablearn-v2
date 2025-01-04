<x-dashboard.admin.base>
    <div class="flex justify-between py-5">
        <h1 class="text-lg font-bold text-primary">
            Pre Register Students
        </h1>


    </div>

    <div class="flex justify-end items-center gap-2">

        @if (request()->has('filter'))
            <a href="{{ route('admin.pre-register.index') }}" class="btn  btn-xs btn-primary">
                clear
            </a>
        @endif

        <form action="{{ route('admin.pre-register.index') }}" method="get">
            <div class="flex gap-2">
                <input type="hidden" name="filter" class="input input-bordered" value="all">
                <button class="btn btn-xs ">
                    Archived
                </button>
            </div>
        </form>
    </div>
    <div class="overflow-x-auto w-full max-w-screen">
        <table class="table-fixed table-xs w-full border-collapse border border-gray-200 text-sm">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-200 p-2 text-left w-16">ID</th>
                    <th class="border border-gray-200 p-2 text-left w-48">Name</th>
                    <th class="border border-gray-200 p-2 text-left w-48">Photo</th>
                    <th class="border border-gray-200 p-2 text-left w-32">Status</th>
                    <th class="border border-gray-200 p-2 text-left w-32">Email</th>
                    <th class="border border-gray-200 p-2 text-left w-32">LRN</th>
                    <th class="border border-gray-200 p-2 text-left w-32">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($preRegisters as $preRegister)
                    <tr>
                        <td class="border border-gray-200 p-2 truncate">PR-{{ $preRegister->id }}</td>
                        <td class="border border-gray-200 p-2 truncate  capitalize">{{ $preRegister->last_name }},
                            {{ $preRegister->first_name }}</td>
                        <td class="border border-gray-200 p-2 flex items-center gap-2 truncate">

                            @if ($preRegister->photo)
                                <img src="{{ $preRegister->photo }}" alt="Avatar" class="w-6 h-6 rounded-full">
                            @else
                                <img src="https://ui-avatars.com/api/?name={{ $preRegister->last_name }} {{ $preRegister->first_name }}"
                                    alt="Avatar" class="w-6 h-6 rounded-full">
                            @endif
                        </td>
                        <td class="border border-gray-200 p-2 truncate">
                            <x-badge :status="$preRegister->status" />
                        </td>
                        <td class="border border-gray-200 p-2 truncate">
                            {{ $preRegister->email }}</td>
                        <td class="border border-gray-200 p-2 truncate text-red-500">
                            {{ $preRegister->lrn }}
                        </td>
                        <td class="border border-gray-200 p-2 truncate ">
                            <x-drawer :title="$preRegister->name" :is-open="false" :width="90">
                                <x-slot name="trigger">
                                    <button class="btn btn-xs  btn-primary">
                                        <i class="fi fi-rr-eye"></i>
                                    </button>
                                </x-slot>
                                <div class="flex justify-between items-center py-2">
                                    <h1 class="font-bold">
                                        PR-{{ $preRegister->id }}
                                    </h1>
                                    <h1>
                                        LRN : {{ $preRegister->lrn }}
                                    </h1>
                                </div>


                                <div class="flex justify-between gap-2">
                                    <x-badge :status="$preRegister->status" />
                                    <div class="flex gap-2">
                                        <form
                                            action="{{ route('admin.pre-register.approve', ['pre_register' => $preRegister->id]) }}"
                                            method="post">
                                            @csrf
                                            <div class="tooltip" data-tip="Approved">
                                                <button class="btn btn-xs btn-success">
                                                    <i class="fi fi-rr-check-circle"></i>
                                                </button>
                                            </div>
                                        </form>
                                        <form
                                            action="{{ route('admin.pre-register.reject', ['pre_register' => $preRegister->id]) }}"
                                            method="post">

                                            @csrf
                                            <div class="tooltip" data-tip="Reject">
                                                <button class="btn btn-xs btn-error">
                                                    <i class="fi fi-rr-cross-circle"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                                <div class="flex items-center justify-center">
                                    @if ($preRegister->photo)
                                        <img src="{{ $preRegister->photo }}" alt="" srcset=""
                                            class="rounded-full w-64 h-64">
                                    @else
                                        <img src="https://ui-avatars.com/api/?name={{ $preRegister->last_name }} {{ $preRegister->first_name }}"
                                            alt="" srcset="" class="rounded-full w-24 h-24">
                                    @endif

                                </div>

                                <div class="grid  grid-cols-3 grid-flow-row gap-2">
                                    <div class="flex flex-col gap-2">
                                        <h1 class="font-bold">Last Name </h1>
                                        <h1>{{ $preRegister->last_name }}</h1>
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <h1 class="font-bold">First Name </h1>
                                        <h1>{{ $preRegister->last_name }}</h1>
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <h1 class="font-bold">Middle Name </h1>
                                        <h1>{{ $preRegister->middle_name }}</h1>
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <h1 class="font-bold">Email </h1>
                                        <h1>{{ $preRegister->email }}</h1>
                                    </div>
                                </div>
                            </x-drawer>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="border border-gray-200 p-2 text-center">
                            No preRegisters
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{ $preRegisters->links() }}
    </div>

</x-dashboard.admin.base>
