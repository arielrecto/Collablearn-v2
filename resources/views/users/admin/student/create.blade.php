<x-dashboard.admin.base>
    <div class="flex justify-between py-5">
        <h1 class="text-lg font-bold text-primary">
            Add Students
        </h1>

        {{-- <a href="" class="btn btn-sm btn-primary">
            Add Task</a> --}}
    </div>

    <form action="{{ route('admin.students.store') }}" method="post" enctype="multipart/form-data"
        class="flex flex-col gap-2">
        @csrf

        <h1 class="text-lg font-bold text-primary py-2 bg-gray-100 px-1">
            Acount information
        </h1>

        <div class="flex flex-col gap-2">
            <div class="flex flex-col gap-2">
                <label for="">Display Name</label>
                <input type="text" name="name" class="input w-full input-bordered">
            </div>
            <div class="flex flex-col gap-2">
                <label for="">Email</label>
                <input type="text" name="email" class="input w-full input-bordered">
            </div>
            <div class="flex flex-col gap-2">
                <label for="">LRN</label>
                <input type="number" name="lrn" class="input w-full input-bordered">
            </div>
            <div class="flex flex-col gap-2">
                <label for="">Password</label>
                <input type="password" name="password" class="input w-full input-bordered">
                @if($errors->has('password'))
                <p class="text-xs text-error">{{$errors->first('password')}}</p>
                @endif
            </div>
            <div class="flex flex-col gap-2">
                <label for="">Confirm Password</label>
                <input type="password" name="password_confirmation" class="input w-full input-bordered">
            </div>
        </div>


        <h1 class="text-lg font-bold text-primary py-2 bg-gray-100 px-1">
            Personal Information
        </h1>
        <div class="flex justify-center items-center">
            <div class="w-1/4" x-data="imagePreview">
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
                            Add Avatar
                        </label>
                    </div>
                </div>
            </div>
        </div>


        <div class="flex flex-col gap-2">
            <div class="grid grid-cols-3 grid-flow-row gap-2">
                <div class="flex flex-col gap-2">
                    <label for="">Last Name</label>
                    <input type="text" name="last_name" class="input w-full input-bordered">
                </div>
                <div class="flex flex-col gap-2">
                    <label for="">First Name</label>
                    <input type="text" name="first_name" class="input w-full input-bordered">
                </div>
                <div class="flex flex-col gap-2">
                    <label for="">Middle Name</label>
                    <input type="text" name="middle_name" class="input w-full input-bordered">
                </div>
            </div>


        </div>
        <button class="btn btn-primary">Submit</button>
    </form>
</x-dashboard.admin.base>
