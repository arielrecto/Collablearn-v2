<x-dashboard.admin.base>
    <div class="flex justify-between py-5">
        <h1 class="text-lg font-bold text-primary">
            Upload Learning Modules
        </h1>

        {{-- <a href="" class="btn btn-sm btn-primary">
            Add Task</a> --}}
    </div>

    <form action="{{ route('admin.learning-modules.store') }}" method="post" enctype="multipart/form-data"
        class="flex flex-col gap-2">
        @csrf

        <h1 class="text-lg font-bold text-primary py-2 bg-gray-100 px-1">
            Acount information
        </h1>

        <div class="flex flex-col gap-2">
            <div class="flex flex-col gap-2">
                <label for="">Title</label>
                <input type="text" name="title" class="input w-full input-bordered">
                @if ($errors->has('title'))
                    <p class="text-xs text-error">{{ $errors->first('title') }}</p>
                @endif
            </div>
        </div>

        <div class="flex flex-col gap-2">
            <label for="">Description</label>
            <textarea name="description" class="textarea textarea-bordered min-h-64"></textarea>
        </div>



        <div x-data="fileUploadHandler" class="flex flex-col gap-4">
            <!-- File Upload Button -->
            <label for="fileInput"
                class="flex items-center justify-center w-12 h-12 text-lg font-bold text-white bg-primary rounded-full cursor-pointer">
                +
            </label>
            <input type="file" id="fileInput" name="attachments[]" class="hidden" multiple @change="handleFiles($event)">
            <!-- Preview Section -->
            <template x-if="files.length">
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3">
                    <template x-for="(file, index) in files" :key="index">
                        <div class="flex items-center gap-2 p-4 border rounded-md">
                            <img x-show="file.type.startsWith('image/')" :src="file.url" alt="Preview"
                                class="w-16 h-16 rounded">
                            <template x-if="file.type === 'application/pdf'">
                                <img src="/pdf.png" alt="PDF Icon" class="w-16 h-16">
                            </template>
                            <div>
                                <p class="text-sm font-medium truncate w-36" x-text="file.name"></p>
                                <p class="text-xs text-gray-500" x-text="(file.size / 1024).toFixed(2) + ' KB'"></p>
                            </div>
                            <button @click="removeFile(index)" class="text-red-500 hover:text-red-700">
                                &times;
                            </button>
                        </div>
                    </template>
                </div>
            </template>
        </div>
        <button class="btn btn-primary">Submit</button>
    </form>
</x-dashboard.admin.base>
