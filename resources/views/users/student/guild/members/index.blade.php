<x-dashboard.student.guild.base :guild="$guild" :name="$guild->name" :cover="$guild->image">
    <div class="grid grid-cols-3 grid-flow-row gap-2">
        @forelse ($members as $member)
            <div class="h-32 w-full border rounded-lg p-5 hover:shadow-lg bg-white flex flex-col justify-between duration-700">
                <div class="flex flex-col gap-2 w-full">
                    <h1 class="text-lg font-bold text-primary capitalize flex items-center gap-5 border-b">
                        <span>
                            {{ $member->user->name }}
                        </span>
                        <span class="text-xs text-gray-400"> LRN {{ $member->user->lrn }}</span>
                    </h1>
                    <h1 class="text-sm font-semibold">
                        {{ $member->user->email }}
                    </h1>
                </div>

                <p class="text-xs text-gray-400 text-end">
                    {{ $member->created_at->format('F d, Y h:s') }}
                </p>
            </div>
        @empty
            <div>
                <h1 class="text-lg font-bold">No Members</h1>
            </div>
        @endforelse
    </div>
</x-dashboard.student.guild.base>
