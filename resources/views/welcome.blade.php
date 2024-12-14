<x-app-layout>
    <div class="flex items-center justify-center gap-2 min-h-screen w-full">
        <div class="w-4/6 flex items-center gap-2 justify-between">
            <div class="flex flex-col gap-2">
                <h1 class="text-5xl text-primary">
                    Collab Learn
                </h1>
                <p class="text-xl font-thin whitespace-pre-line">
                    Learn, Grow, Collaborate.
                    Elevate Your Knowledge Journey!
                </p>
            </div>
            <form action="{{ route('login') }}" method="POST"
                class="flex flex-col gap-5 p-5 shadow-lg bg-white rounded-lg w-1/2">
                @csrf
                <input type="text" name="login" class="input border border-gray-200"
                    placeholder="Learners Reference Number | Email">
                <input type="password" name="password" class="input border border-gray-200" placeholder="Password">


                <button class="btn btn-primary text-white">Login</button>

                <a class="text-xs link text-center">Forgot Password</a>
            </form>
        </div>
    </div>
</x-app-layout>
