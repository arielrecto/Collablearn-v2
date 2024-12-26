<x-dashboard.student.base>
    <x-page-title :back_url="route('student.projects.index')" label="Create Project" sub_label="Start Collaborating to your co-peers through guild" />

    <form action="{{ route('student.projects.store') }}" method="POST" class="flex gap-5 py-10"
        enctype="multipart/form-data">

        @csrf
        <div class="w-1/3" x-data="imagePreview">
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
                        Add Guild Photo
                    </label>
                </div>
            </div>
        </div>

        <div class="flex flex-col gap-2 grow">
            <div class="flex flex-col gap-2">
                <label for="">Project Name</label>
                <input type="text" name="name" class="input w-full input-bordered">
            </div>
            <div class="flex flex-col gap-2">
                <label for="">Description</label>
                <textarea name="description" class="textarea textarea-bordered min-h-64"></textarea>
            </div>

            <div class="flex items-center justify-between" x-data="{ open: false }">
                <div class="flex flex-col gap-2">
                    <label for="">Type</label>
                    <div class="flex items-center gap-2">
                        <div class="flex items-center gap-2">
                            <p class="text-xs">Personal</p>
                            <input type="radio" name="type" @click="open = false" class="radio radio-primary"
                                value="Personal" checked="checked" />
                        </div>

                        <div class="flex items-center gap-2">
                            <p class="text-xs">Guild</p>
                            <input type="radio" name="type" @click="open = true " class="radio radio-primary"
                                value="Guild" />
                        </div>
                    </div>
                </div>

                <template x-if="open">
                    <div class="flex flex-col gap-2">
                        <label for="">Guild</label>
                        <select name="guild" class="select select-primary w-full">
                            <option disabled selected>Select Guild</option>
                            @foreach ($guilds as $guild)
                                <option>{{ $guild->name }}</option>
                            @endforeach


                        </select>
                    </div>

                </template>

            </div>
            <div class="flex items-center justify-between">
                <div class="flex flex-col gap-2">
                    <label for="">Visibility</label>
                    <div class="flex items-center gap-2">
                        <div class="flex items-center gap-2">
                            <p class="text-xs">Public</p>
                            <input type="radio" name="visibility" class="radio radio-primary" value="true"
                                checked="checked" />
                        </div>

                        <div class="flex items-center gap-2">
                            <p class="text-xs">Private</p>
                            <input type="radio" name="visibility" class="radio radio-primary" value="false" />
                        </div>
                    </div>
                </div>

                <div class="flex flex-col gap-2">
                    <label for="">MAX USer</label>
                    <input type="number" name="max_users" class="input w-full input-bordered">
                </div>

            </div>
            <div>
                <button class="btn btn-primary">Create</button>
            </div>
        </div>
    </form>
</x-dashboard.student.base>
