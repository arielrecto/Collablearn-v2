<x-pre-register.base label="Enter the 6 Digit to {{ $preRegister->email }}" :step="$preRegister->step">
    <form action="{{ route('pre-register.step-two.store', ['pre_register' => $preRegister->id]) }}" method="POST"
        class="flex flex-col gap-5 w-full">
        @csrf
        @if ($errors->has('token'))
            <p class="text-xs text-error">
                {{ $errors->first('token') }}
            </p>
        @endif

        <div class="flex justify-between gap-2" x-ref="fields" x-data="emailVerification">

            <template x-for="(value, index) in inputs" :key="index">
                <input type="text" maxlength="1"
                    class="w-12 h-12 border border-gray-300 rounded-lg text-center text-xl focus:outline-none focus:ring-2 focus:ring-red-700"
                    x-model="inputs[index]" @input="inputs[index] = $event.target.value">
            </template>

            <input type="hidden" name="token" x-model="JSON.stringify(inputs)">
        </div>
        <button class="btn btn-primary text-white">Next</button>


        <p class="text-xs text-center">
            Already have an Account <a href="/" class="link link-primary  font-bold">Login</a>
        </p>

    </form>


    @push('js')
        <script>
            const emailVerification = () => ({

                token: [],
                inputs: ['', '', '', '', '', ''],

                init() {
                    const params = new URLSearchParams(window.location.search);
                    const tokenParam = params.get('token') || '';


                    if (tokenParam) {
                        this.token = tokenParam.split('');
                        this.token.forEach((char, index) => {
                            this.inputs[index] = char;
                        });
                    }

                    console.log('Initialized inputs:', this.inputs);
                },

                updateCode() {
                    return this.inputs.join('');
                },
            })
        </script>
    @endpush

</x-pre-register.base>
