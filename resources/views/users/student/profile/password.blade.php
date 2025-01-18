<x-dashboard.student.edit-profile.base>
    <form action="{{ route('student.profile.update') }}" method="post" class="flex flex-col gap-2"
        enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="flex flex-col gap-2">
            <label for="">Current Password</label>
            <input type="password" name="current_password" class="input w-full input-bordered"
                placeholder="*********************">
        </div>

        <div class="flex flex-col gap-2">
            <label for="">Password</label>
            <div class="relative" x-data="{ show: false }">
                <input :type="show ? 'text' : 'password'" id="password" name="password"
                    class="input w-full input-bordered pr-10" placeholder="*********************">
                <button type="button" @click="show = !show" class="absolute inset-y-0 right-0 px-3 text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path
                            :d="show ?
                                'M15 12a3 3 0 11-6 0 3 3 0 016 0zm-3 8c-5 0-9-4-9-8s4-8 9-8 9 4 9 8-4 8-9 8zM3.05 3.05L20.95 20.95' :
                                'M15 12a3 3 0 11-6 0 3 3 0 016 0zm-3 8c-5 0-9-4-9-8s4-8 9-8 9 4 9 8-4 8-9 8z'"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                    </svg>
                </button>
            </div>
            <div class="flex flex-col gap-2">
                <label for="">Confirm Password</label>
                <div class="relative" x-data="{ show: false }">
                    <input :type="show ? 'text' : 'password'" id="password" name="password_confirmation"
                        class="input w-full input-bordered pr-10" placeholder="*********************">
                    <button type="button" @click="show = !show" class="absolute inset-y-0 right-0 px-3 text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path
                                :d="show ?
                                    'M15 12a3 3 0 11-6 0 3 3 0 016 0zm-3 8c-5 0-9-4-9-8s4-8 9-8 9 4 9 8-4 8-9 8zM3.05 3.05L20.95 20.95' :
                                    'M15 12a3 3 0 11-6 0 3 3 0 016 0zm-3 8c-5 0-9-4-9-8s4-8 9-8 9 4 9 8-4 8-9 8z'"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="flex justify-start gap-2">
                <a href="{{ route('index') }}" type="button" class="btn btn-outline">
                    Cancel
                </a>
                <button class="btn btn-primary">
                    Save Changes
                </button>
            </div>
    </form>
</x-dashboard.student.edit-profile.base>
