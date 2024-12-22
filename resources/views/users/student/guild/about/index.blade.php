<x-dashboard.student.guild.base :guild="$guild" :name="$guild->name" :cover="$guild->image">
    <h1 class="text-3xl font-bold text-primary">About</h1>

    <p class="min-h-96 py-5 px-2 rounded-lg bg-gray-100">
        {{$guild->description}}
    </p>
</x-dashboard.student.guild.base>
