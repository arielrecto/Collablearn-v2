<x-dashboard.student.guild.base :name="$guild->name" :guild="$guild" :cover="$guild->image">

    <div class="flex justify-end w-full sticky top-0">

        @if ($guild->isAuthUserGuildMember())
            <button class="btn btn-primary btn-sm" onclick="add_discussion.showModal()">+ Discussion</button>
            <dialog id="add_discussion" class="modal">
                <div class="modal-box w-11/12 max-w-5xl">
                    <form method="dialog">
                        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                    </form>
                    <h3 class="text-lg font-bold text-primary py-5">Add Discussion</h3>
                    <form action="{{ route('student.guild-post.store') }}" method="post" class="flex flex-col gap-5">
                        @csrf
                        <input type="hidden" name="guild" value="{{ $guild->id }}">
                        <textarea name="content" class="h-64 textarea textarea-bordered"></textarea>
                        <button class="btn btn-primary btn-sm">
                            Submit
                        </button>
                    </form>
                </div>
            </dialog>
        @endif



    </div>

    @foreach ($guildPosts as $post)
        <a href="{{ route('student.guild-post.show', ['guild_post' => $post->id]) }}"
            class="flex flex-col gap-5 p-5 rounded-lg shadow-lg">
            <div class="border-b  py-2  flex items-center gap-2 justify-between">
                <h1 class="text-lg text-primary capitalize">
                    {{ $post->user->name }}
                </h1>
                <p class="text-xs text-gray-400">
                    {{ $post->created_at->format('F d, Y h:s') }}
                </p>
            </div>

            <div class="min-h-32 truncate">
                {{ $post->content }}
            </div>
            <div class="flex items-center text-sm text-gray-600 gap-2">
                {{ $post->comments()->count() }} <i class="fi fi-rr-comment-alt text-xs"></i> Comments
            </div>
        </a>
    @endforeach




</x-dashboard.student.guild.base>
