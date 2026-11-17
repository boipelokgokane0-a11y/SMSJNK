<x-guest-layout maxWidth="max-w-3xl">
    <div class="text-center mb-8">
        <div class="flex justify-center mb-3">
            <span class="px-4 py-1.5 rounded-full text-xs font-black bg-cyan-400 text-slate-950 uppercase tracking-widest shadow-md">
                Official Academy Enrolment
            </span>
        </div>
        <h2 class="text-3xl sm:text-4xl font-black text-white">Create Your Academy Account</h2>
        <p class="text-sm text-sky-200 mt-2 font-bold">Select the type of profile you want to register at J &amp; K Designs Academy</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        {{-- Student Card --}}
        <a href="{{ route('register.student') }}"
           class="flex flex-col items-center justify-between p-8 rounded-3xl bg-[#081538] border-2 border-cyan-400 shadow-2xl hover:border-cyan-300 transition transform hover:-translate-y-1 duration-300 text-center group cursor-pointer">
            <div class="w-20 h-20 rounded-2xl bg-cyan-400/20 border-2 border-cyan-400 flex items-center justify-center text-4xl shadow-inner mb-4 group-hover:scale-110 transition">
                🎓
            </div>
            <div class="space-y-2">
                <span class="px-3 py-1 bg-cyan-400 text-slate-950 font-black text-xs rounded-full uppercase tracking-wider inline-block">
                    Learner Profile
                </span>
                <h3 class="text-2xl font-black text-white group-hover:text-cyan-300 transition">Student Registration</h3>
                <p class="text-xs text-sky-200 font-bold leading-relaxed">Enroll as an academy learner. Access timetable, academic grades, subjects, exams, and student support desk.</p>
            </div>
            <span class="mt-6 inline-flex items-center justify-center px-6 py-2.5 bg-cyan-400 group-hover:bg-cyan-300 text-slate-950 font-black text-sm rounded-xl shadow-lg border-2 border-cyan-300 uppercase tracking-wider w-full">
                Register as Student &rarr;
            </span>
        </a>

        {{-- Teacher Card --}}
        <a href="{{ route('register.teacher') }}"
           class="flex flex-col items-center justify-between p-8 rounded-3xl bg-[#081538] border-2 border-emerald-400 shadow-2xl hover:border-emerald-300 transition transform hover:-translate-y-1 duration-300 text-center group cursor-pointer">
            <div class="w-20 h-20 rounded-2xl bg-emerald-500/20 border-2 border-emerald-400 flex items-center justify-center text-4xl shadow-inner mb-4 group-hover:scale-110 transition">
                👩‍🏫
            </div>
            <div class="space-y-2">
                <span class="px-3 py-1 bg-emerald-500 text-slate-950 font-black text-xs rounded-full uppercase tracking-wider inline-block">
                    Faculty Educator
                </span>
                <h3 class="text-2xl font-black text-white group-hover:text-emerald-300 transition">Teacher Registration</h3>
                <p class="text-xs text-emerald-200 font-bold leading-relaxed">Join our certified teaching faculty. Manage classroom rosters, submit marks, track attendance, and upload qualifications.</p>
            </div>
            <span class="mt-6 inline-flex items-center justify-center px-6 py-2.5 bg-emerald-500 group-hover:bg-emerald-400 text-slate-950 font-black text-sm rounded-xl shadow-lg border-2 border-emerald-300 uppercase tracking-wider w-full">
                Register as Teacher &rarr;
            </span>
        </a>
    </div>

    <div class="text-center mt-8 pt-6 border-t border-sky-400/30 text-sm text-sky-200 font-bold">
        Already registered with an academy profile?
        <a href="{{ route('login') }}" class="text-cyan-300 hover:text-white underline decoration-cyan-400 font-black ml-1">
            Log in to Portal &rarr;
        </a>
    </div>
</x-guest-layout>
