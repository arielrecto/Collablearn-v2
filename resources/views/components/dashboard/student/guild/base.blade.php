@props([
    'cover' => null,
    'name' => 'sample',
    'is_public' => true,
    'guild' => null,
])

<x-dashboard.student.base>

    @if (!$cover)
        <img src="{{ asset('banner/family.png') }}" class="w-full h-64 rounded-lg object-contain bg-gray-100">
    @else
        <img src="{{ $cover }}" class="w-full h-64 rounded-lg object-cover ">
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
                <span> {{ $guild->guildMembers()->count() }} Members</span>
            </div>
        </div>


        <div class="flex  items-center gap-2">

            @if (!$guild->isAuthUserGuildMember())
                <form action="{{ route('student.guilds.join', ['guild' => $guild->id]) }}" method="post">
                    @csrf
                    <button class="btn btn-ghost btn-sm">+Join</button>
                </form>
            @else
                <div class="dropdown">
                    <div tabindex="0" role="button" class="btn m-1 btn-sm btn-primary">Joined</div>
                    <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
                        <li>
                            <form action="{{ route('student.guilds.leave', ['guild' => $guild->id]) }}" method="post">
                                @csrf
                                <button class="font-bold">Leave Guild</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @endif

        </div>
    </div>

    <div class="grid grid-cols-5 grid-flow-row gap-2 py-5 text-primary">
        @if (Route::is(['student.guilds.show', 'student.guild-post.show']))
            <a href="{{ route('student.guilds.show', ['guild' => $guild->id]) }}"
                class="w-full font-bold link duration-700">
                Discussion
            </a>
        @else
            <a href="{{ route('student.guilds.show', ['guild' => $guild->id]) }}"
                class="w-full hover:font-bold hover:link duration-700">
                Discussion
            </a>
        @endif
        @if ($guild->isAuthUserGuildMember())


            <a href="" class="w-full hover:font-bold hover:link duration-700">
                Feed
            </a>
            @if (Route::is(['student.guilds.members']))
                <a href="{{ route('student.guilds.members', ['guild' => $guild->id]) }}"
                    class="w-full font-bold link duration-700">
                    Members
                </a>
            @else
                <a href="{{ route('student.guilds.members', ['guild' => $guild->id]) }}"
                    class="w-full hover:font-bold hover:link duration-700">
                    Members
                </a>
            @endif

            @if (Route::is(['student.guilds.about']))
                <a href="{{ route('student.guilds.about', ['guild' => $guild->id]) }}"
                    class="w-full font-bold link duration-700">
                    About
                </a>
            @else
                <a href="{{ route('student.guilds.about', ['guild' => $guild->id]) }}"
                    class="w-full hover:font-bold hover:link duration-700">
                    About
                </a>
            @endif
            <a href="" class="w-full hover:font-bold hover:link duration-700">
                File Attachment
            </a>
        @endif

    </div>


    <div class="overflow-y-auto flex flex-col gap-2 min-h-64 max-h-96 py-10 px-5">
        {{ $slot }}
    </div>

</x-dashboard.student.base>
