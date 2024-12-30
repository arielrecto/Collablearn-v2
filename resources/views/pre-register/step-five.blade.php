<x-pre-register.base title="Information Review" label="Your student information are now being Reviewed."
    :step="$preRegister->step">

    <div class="flex items-center flex-col">


        <img src="{{ asset('animated-icons/books.gif') }}" alt="" class="w-32 h-32 aspect-square">

        <p class="text-center text-gray-600">
            Your are now being closer to have account.
            please wait <span class="text-primary">1 - 2 days </span>
            to confirm your account
            or <span class="text-primary  font-bold"> Consult Your Teacher</span>
            to Approved your Registration
        </p>


        <a href="/"  class="btn btn-primary  w-full mt-10"> Ok, I got it</a>
    </div>


</x-pre-register.base>
