<x-guest-layout>
    <div class="text-center mb-8">
        <h2 class="text-2xl font-bold text-gray-800">Create an Account</h2>
        <p class="text-sm text-gray-600 mt-2">Choose the type of account you would like to register</p>
    </div>

    <div class="flex flex-col sm:flex-row gap-6 justify-center items-stretch">
        {{-- Student Card --}}
        <a href="{{ route('register.student') }}"
           class="flex flex-col items-center justify-center gap-4 w-full sm:w-56 px-6 py-10
                  border border-[#19140035] hover:border-[#1915014a] rounded-xl bg-white
                  shadow-sm hover:shadow-md transition text-center group">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14 text-indigo-500 group-hover:text-indigo-600 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16-3.422A12.083 12.083 0 0121 13.5c0 3.314-4.03 6-9 6s-9-2.686-9-6a12.083 12.083 0 012.84-1.922L12 14z" />
            </svg>
            <div>
                <p class="text-base font-semibold text-gray-800 group-hover:text-indigo-600 transition">Student Registration</p>
                <p class="text-xs text-gray-500 mt-1">Register as a student</p>
            </div>
            <span class="mt-2 inline-block px-5 py-1.5 border border-[#19140035] hover:border-[#1915014a] text-sm text-[#1b1b18] rounded-sm leading-normal transition">
                Get Started
            </span>
        </a>

        {{-- Teacher Card --}}
        <a href="{{ route('register.teacher') }}"
           class="flex flex-col items-center justify-center gap-4 w-full sm:w-56 px-6 py-10
                  border border-[#19140035] hover:border-[#1915014a] rounded-xl bg-white
                  shadow-sm hover:shadow-md transition text-center group">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14 text-green-500 group-hover:text-green-600 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
            <div>
                <p class="text-base font-semibold text-gray-800 group-hover:text-green-600 transition">Teacher Registration</p>
                <p class="text-xs text-gray-500 mt-1">Register as an educator</p>
            </div>
            <span class="mt-2 inline-block px-5 py-1.5 border border-[#19140035] hover:border-[#1915014a] text-sm text-[#1b1b18] rounded-sm leading-normal transition">
                Get Started
            </span>
        </a>
    </div>

    <div class="text-center mt-8 text-sm text-gray-600">
        Already have an account?
        <a href="{{ route('login') }}" class="underline underline-offset-4 text-indigo-600 hover:text-indigo-800">Log in</a>
    </div>
</x-guest-layout>
