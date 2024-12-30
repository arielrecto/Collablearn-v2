<x-pre-register.base label="Facial  Identity" :step="$preRegister->step">

    <form method="POST" action="{{ route('pre-register.step-four.store', ['pre_register' => $preRegister->id]) }}"
        class="flex flex-col gap-2 items-center" x-data="webCamera">
        @csrf
        <div x-show="image">
            <img class="bg-gray-500 rounded-full w-64 h-64" :src="image">
            <input type="hidden" name="image"
                x-bind:value="JSON.stringify({
                    'image': image
                })">

        </div>
        <div x-show="!image">
            <div class="w-auto h-auto" x-show="isStart">
                <video x-ref="webCam" autoplay playsinline width="320" height="320" class="rounded-full"></video>
                <canvas x-ref="canvas" class="d-none hidden"></canvas>
                <audio x-ref="snapSound" src="{{ asset('snap.mp3') }}" preload="auto" class="hidden"></audio>
            </div>

            <div class="bg-gray-500 rounded-full w-64 h-64" x-show="!isStart">

            </div>
        </div>

        <div class="flex items-center gap-2">
            <button type="button" class="btn btn-sm  btn-primary" @click="start" x-show="!isStart & !image">
                Start</button>
            <div class="flex items-center gap-2" x-show="image">
                <button type="button" class="btn btn-sm  " @click="reset"> Reset</button>
                <button class="btn btn-sm  btn-primary"> Upload </button>

            </div>
            <div class="flex items-center gap-2" x-show="isStart">
                <button type="button" class="btn btn-sm  btn-primary" @click="stop"> Stop</button>
                <button type="button" class="btn btn-sm " @click="capture"> Capture</button>
            </div>


        </div>
    </form>


</x-pre-register.base>
