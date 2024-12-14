@props([
    'label' => 'sample title',
    'sub_label' => null,
    'back_url' => null
])

<div class="flex items-center justify-between">
    <di class="flex gap-2">
        @if ($back_url)
            <a href="{{$back_url}}" class="btn btn-primary btn-sm">
                <i class="fi fi-rr-arrow-left"></i>
            </a>
        @endif
        <div class="flex flex-col gap-2">
            <h1 class="text-2xl font-bold text-primary">
                {{ $label }}
            </h1>
            @if ($sub_label)
                <p class="text-xs">
                    {{$sub_label}}
                </p>
            @endif
        </div>

    </di>
</div>
