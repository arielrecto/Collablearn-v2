@props([
    'cover' => null,
    'name' => 'sample',
    'is_public' => true,
])

<x-dashboard.student.base>

    @if (!$cover)
        <img src="{{ asset('banner/family.png') }}" class="w-full h-64 rounded-lg object-contain bg-gray-100">
    @else
        <img src="{{ $cover }}" class="w-full h-32 rounded-lg ">
    @endif

    <div class="flex justify-between items-end">
        <div class="flex flex-col gap-2 text-xs text-gray-500">
            <h1 class="text-2xl font-bold text-primary capitalize">
                {{ $name }}
            </h1>
            <div class="flex items-center gap-2">
                <p>
                    {{ $is_public ? 'Public' : 'Private' }} Group
                </p>
                |
                <span>3 Members</span>
            </div>

        </div>
    </div>

    <div class="grid grid-cols-5 grid-flow-row gap-2 py-5">
        <a href="" class="w-full hover:font-bold hover:link duration-700">
            Discussion
        </a>
        <a href="" class="w-full hover:font-bold hover:link duration-700">
            Feed
        </a>
        <a href="" class="w-full hover:font-bold hover:link duration-700">
            Members
        </a>
        <a href="" class="w-full hover:font-bold hover:link duration-700">
            About
        </a>
        <a href="" class="w-full hover:font-bold hover:link duration-700">
            File Attachment
        </a>
    </div>

</x-dashboard.student.base>
