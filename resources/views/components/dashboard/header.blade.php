<div class="flex items-center justify-between">
    <di class="flex flex-col gap-2">
        <p>
            <span>{{ now()->format('l') }}</span>,
            <span>{{ now()->format('F d') }}</span>
        </p>
        <h1 class="text-2xl font-bold text-primary">
            Hi {{ Auth::user()->name }}!
        </h1>
    </di>
</div>
