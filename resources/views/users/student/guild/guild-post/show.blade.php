@php
    $guild = $guildPost->guild;
@endphp

<x-dashboard.student.guild.base :guild="$guild" :name="$guild->name" :cover="$guild->image">
    <div class="flex flex-col gap-5">
        <div class="border-b  py-2  flex items-center gap-2 justify-between">
            <div class="flex items-center gap-2">
                <a href="{{ route('student.guilds.show', ['guild' => $guild->id]) }}"
                    class="btn btn-sm btn-primary text-white">
                    <i class="fi fi-rr-arrow-small-left"></i>
                </a>
                <h1 class="text-3xl font-bold text-primary ">
                    {{ $guildPost->user->name }}
                </h1>
            </div>

            <p class="text-xs text-gray-400">
                {{ $guildPost->created_at->format('F d, Y h:s') }}
            </p>
        </div>

        <div class="min-h-32 truncate">
            {{ $guildPost->content }}
        </div>
        <div class="flex flex-col text-sm text-gray-600 gap-2 border-y py-2" x-data="{ isOpen: false }">

            @if ($guild->isAuthUserGuildMember())
                <button @click ="isOpen = !isOpen">
                    {{ $guildPost->comments()->count() }} <i class="fi fi-rr-comment-alt text-xs"></i> Comments
                </button>


                <form action="{{ route('student.guild-post-comments.store') }}" method="post" x-show="isOpen"
                    class="flex flex-col gap-2">
                    @csrf
                    <input type="hidden" name="guildPost" value="{{ $guildPost->id }}">
                    <textarea name="content" id="" cols="20" rows="5" class="textarea textarea-bordered"></textarea>
                    <button class="btn btn-primary btn-sm">Comment</button>
                </form>
            @else
                <p>
                    {{ $guildPost->comments()->count() }} <i class="fi fi-rr-comment-alt text-xs"></i> Comments
                </p>
            @endif
        </div>

        @forelse ($guildPost->comments as $comment)
            <div class="bg-gray-100 rounded-lg py-5 px-2 flex  flex-col gap-2">
                <div class="flex items-center justify-between">
                    <h1 class="text-lg font-bold text-primary py-2">{{ $comment->user->name }}</h1>
                    <p class="text-xs text-gray-100">
                        {{ $comment->created_at->format('F d, Y h:s') }}
                    </p>
                </div>

                <p>
                    {{ $comment->content }}
                </p>
            </div>
        @empty
        @endforelse
    </div>
</x-dashboard.student.guild.base>
