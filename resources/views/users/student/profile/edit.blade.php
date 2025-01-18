<x-dashboard.student.edit-profile.base>
    <form action="{{ route('student.profile.update') }}" method="post" class="flex flex-col gap-2"
        enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="w-full flex justify-center">
            <div class="w-1/3" x-data="imagePreview">
                <div class="flex flex-col gap-2">
                    <template x-if="!imgSrc">
                        <img src="{{ $profile->avatar }}"
                            class="w-full aspect-square bg-gray-500 rounded-lg object-cover max-w-96">
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
            </div>
        </div>


        <div class="grid grid-cols-2 grid-flow-row gap-2">
            <div class="flex flex-col gap-2">
                <label for="">First Name</label>
                <input type="text" name="first_name" value="{{ $profile->first_name }}"
                    class="input w-full input-bordered">
            </div>
            <div class="flex flex-col gap-2">
                <label for="">Last Name</label>
                <input type="text" name="last_name" value="{{ $profile->last_name }}"
                    class="input w-full input-bordered">
            </div>
        </div>
        <div class="flex flex-col gap-2">
            <label for="">Email</label>
            <input type="text" name="email" value="{{ $user->email }}" class="input w-full input-bordered">
        </div>
        <div class="flex flex-col gap-2">
            <label for="">LRN</label>
            <input type="text" disabled name="lrn" value="{{ $user->lrn }}"
                class="input w-full input-bordered">
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
