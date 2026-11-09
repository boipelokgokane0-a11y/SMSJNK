<x-guest-layout maxWidth="max-w-6xl">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Split-Screen Fun, Captivating & Teacher-Friendly Dashboard Theme (Bold Blue & Light Blue, Zero White) -->
    <div class="grid grid-cols-1 lg:grid-cols-12 min-h-[660px] bg-[#0f286b] text-white">

        <!-- LEFT COLUMN: CAPTIVATING TEACHERS WORKSHOPS & TEACHERS IN CLASS PICTURES -->
        <div class="lg:col-span-6 p-6 sm:p-8 md:p-10 bg-gradient-to-br from-[#081538] via-[#0d225c] to-[#0a1a47] border-b-2 lg:border-b-0 lg:border-r-2 border-sky-400/40 flex flex-col justify-between relative overflow-hidden">
            <!-- Ambient Light Blue Glows -->
            <div class="absolute -top-20 -left-20 w-64 h-64 bg-cyan-400/15 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute -bottom-20 -right-20 w-64 h-64 bg-sky-400/15 rounded-full blur-3xl pointer-events-none"></div>

            <div class="relative z-10 space-y-6">
                <!-- Teacher-Friendly Welcome Pill -->
                <div class="flex flex-wrap items-center gap-2">
                    <span class="inline-flex items-center gap-1.5 px-4 py-1.5 rounded-full text-xs font-black bg-cyan-400 text-slate-950 uppercase tracking-wider shadow-lg shadow-cyan-400/30">
                        <span>👩‍🏫</span> OFFICIAL TEACHER PORTAL
                    </span>
                    <span class="inline-flex items-center px-3.5 py-1 rounded-full text-xs font-black bg-blue-950 text-cyan-300 border-2 border-sky-400/50">
                        J &amp; K Designs Academy
                    </span>
                </div>

                <!-- Big and Bold Heading -->
                <div>
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white leading-tight tracking-tight drop-shadow-md">
                        INSPIRING <span class="text-cyan-300 underline decoration-cyan-400 decoration-4 underline-offset-4">TEACHERS</span>, EMPOWERING MINDS!
                    </h2>
                    <p class="text-sm sm:text-base text-sky-200 font-bold mt-2.5 leading-relaxed">
                        Dedicated educators shape the future. Participate in faculty workshops and deliver world-class classroom instruction!
                    </p>
                </div>

                <!-- 2 CAPTIVATING PICTURES: TEACHERS WORKSHOPS & TEACHERS IN CLASS -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                    <!-- Picture 1: Teachers Workshops (Professional Development & Collaboration) -->
                    <div class="group relative rounded-2xl overflow-hidden border-2 border-sky-400 shadow-xl bg-[#081538] transition transform hover:-translate-y-1 duration-300">
                        <div class="h-48 sm:h-52 w-full overflow-hidden relative">
                            <img src="https://images.unsplash.com/photo-1517048676732-d65bc937f952?auto=format&fit=crop&w=800&q=80"
                                 alt="Teachers Workshops and professional training"
                                 class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-[#081538] via-transparent to-transparent"></div>
                            <span class="absolute top-2.5 left-2.5 px-3 py-1 rounded-full text-xs font-black bg-cyan-400 text-slate-950 uppercase tracking-wider shadow-md">
                                📚 Teachers Workshops
                            </span>
                        </div>
                        <div class="p-3.5 bg-[#081538]">
                            <p class="text-sm font-black text-cyan-300 uppercase tracking-wide">FACULTY WORKSHOPS</p>
                            <p class="text-xs text-sky-100 mt-1 font-bold leading-tight">Continuous pedagogical training, curriculum planning and collaboration.</p>
                        </div>
                    </div>

                    <!-- Picture 2: Teachers in Class (Instruction, Guidance & Classroom Energy) -->
                    <div class="group relative rounded-2xl overflow-hidden border-2 border-sky-400 shadow-xl bg-[#081538] transition transform hover:-translate-y-1 duration-300">
                        <div class="h-48 sm:h-52 w-full overflow-hidden relative">
                            <img src="https://images.unsplash.com/photo-1577896851231-70ef18881754?auto=format&fit=crop&w=800&q=80"
                                 alt="Teachers in Class actively instructing"
                                 class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-[#081538] via-transparent to-transparent"></div>
                            <span class="absolute top-2.5 left-2.5 px-3 py-1 rounded-full text-xs font-black bg-cyan-400 text-slate-950 uppercase tracking-wider shadow-md">
                                👩‍🏫 Teachers in Class
                            </span>
                        </div>
                        <div class="p-3.5 bg-[#081538]">
                            <p class="text-sm font-black text-cyan-300 uppercase tracking-wide">CLASSROOM INSTRUCTION</p>
                            <p class="text-xs text-sky-100 mt-1 font-bold leading-tight">Inspiring active learning, student mentorship and academic breakthroughs.</p>
                        </div>
                    </div>
                </div>

                <!-- Big & Bold Educator Badges -->
                <div class="flex flex-wrap items-center gap-2 pt-2">
                    <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-xl text-xs font-black bg-[#081538] text-cyan-300 border-2 border-sky-400/50 shadow">
                        <span>🎯</span> PEDAGOGICAL MASTERY
                    </span>
                    <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-xl text-xs font-black bg-[#081538] text-cyan-300 border-2 border-sky-400/50 shadow">
                        <span>🤝</span> FACULTY COLLABORATION
                    </span>
                    <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-xl text-xs font-black bg-[#081538] text-emerald-400 border-2 border-emerald-400/50 shadow">
                        <span>⭐</span> 100% EDUCATOR PASSION
                    </span>
                </div>
            </div>

            <div class="mt-6 pt-4 border-t-2 border-sky-400/30 text-xs text-sky-200 font-bold">
                &ldquo;Teaching is the profession that teaches all the other professions.&rdquo; &bull; <strong class="text-cyan-300 font-black">J &amp; K Designs Academy</strong>
            </div>
        </div>

        <!-- RIGHT COLUMN: CAPTIVATING TEACHER LOGIN PORTAL (DASHBOARD BLUE & LIGHT BLUE, ZERO WHITE) -->
        <div class="lg:col-span-6 p-6 sm:p-8 md:p-10 flex flex-col justify-between bg-[#0f286b] relative">
            <div>
                <!-- Digital Binary Code Header Ribbon (Dashboard Blue & Light) -->
                <div class="mb-5 p-3.5 bg-blue-50/10 border-2 border-sky-400/50 rounded-2xl text-center shadow-lg">
                    <div class="font-mono text-xs font-black text-blue-600 text-sky-300 tracking-widest">
                        01001010 01001011 &bull; 01010011 01001101 01010011
                    </div>
                    <div class="font-mono text-[10px] uppercase tracking-wider text-cyan-300 font-black mt-0.5">
                        // J &amp; K DESIGNS ACADEMY &bull; SECURE TEACHER GATEWAY
                    </div>
                </div>

                <!-- Friendly & Bold Welcome Title for Teacher -->
                <div class="mb-5">
                    <div class="flex items-center gap-2">
                        <span class="text-3xl">👋</span>
                        <span class="px-3 py-1 rounded-full text-xs font-black bg-blue-950 text-cyan-300 border border-sky-400/50 uppercase tracking-widest">
                            PORTAL AUTHENTICATION
                        </span>
                    </div>
                    <h3 class="text-3xl sm:text-4xl font-black text-white tracking-tight mt-2">
                        WELCOME BACK, <span class="text-cyan-300">TEACHER!</span>
                    </h3>
                    <p class="text-sm font-bold text-sky-200 mt-1">
                        Sign in to access your classes, mark registers, capture assessment grades and view timetables.
                    </p>
                </div>

                <!-- Binary Metrics Grid in Dashboard Blue & Light Blue -->
                <div class="grid grid-cols-3 gap-2 p-3.5 bg-[#081538] rounded-2xl border-2 border-sky-400/60 text-center mb-6 shadow-xl">
                    <div class="p-1">
                        <div class="font-mono text-[10px] font-black text-blue-600 text-sky-400">BIN // 0001</div>
                        <div class="text-2xl font-black text-cyan-300 mt-0.5">500+</div>
                        <div class="text-[10px] font-black text-sky-200 uppercase tracking-wide">Students</div>
                    </div>
                    <div class="p-1 border-x-2 border-sky-400/40">
                        <div class="font-mono text-[10px] font-black text-blue-600 text-sky-400">BIN // 0010</div>
                        <div class="text-2xl font-black text-emerald-400 mt-0.5">98%</div>
                        <div class="text-[10px] font-black text-sky-200 uppercase tracking-wide">Pass Rate</div>
                    </div>
                    <div class="p-1">
                        <div class="font-mono text-[10px] font-black text-blue-600 text-sky-400">BIN // 0011</div>
                        <div class="text-2xl font-black text-cyan-300 mt-0.5">40+</div>
                        <div class="text-[10px] font-black text-sky-200 uppercase tracking-wide">Faculty</div>
                    </div>
                </div>

                <!-- Big & Bold Form with Zero White Background -->
                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block font-black text-sm uppercase tracking-wider text-cyan-300 mb-2">
                            EMAIL ADDRESS <span class="text-cyan-400">*</span>
                        </label>
                        <div class="relative">
                            <input id="email"
                                   type="email"
                                   name="email"
                                   value="{{ old('email') }}"
                                   required
                                   autofocus
                                   autocomplete="username"
                                   placeholder="teacher@jkdesignsacademy.co.za"
                                   class="block w-full rounded-2xl bg-[#081538] border-2 border-sky-400 focus:border-cyan-300 focus:ring-4 focus:ring-cyan-400/40 text-base font-black text-white placeholder-sky-300/40 p-4 shadow-inner transition">
                        </div>
                        @if ($errors->has('email'))
                            <p class="text-xs font-black text-red-400 mt-2 flex items-center gap-1">
                                <span>⚠️</span> {{ $errors->first('email') }}
                            </p>
                        @endif
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block font-black text-sm uppercase tracking-wider text-cyan-300 mb-2">
                            PASSWORD <span class="text-cyan-400">*</span>
                        </label>
                        <div class="relative">
                            <input id="password"
                                   type="password"
                                   name="password"
                                   required
                                   autocomplete="current-password"
                                   placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;"
                                   class="block w-full rounded-2xl bg-[#081538] border-2 border-sky-400 focus:border-cyan-300 focus:ring-4 focus:ring-cyan-400/40 text-base font-black text-white placeholder-sky-300/40 p-4 shadow-inner transition">
                        </div>
                        @if ($errors->has('password'))
                            <p class="text-xs font-black text-red-400 mt-2 flex items-center gap-1">
                                <span>⚠️</span> {{ $errors->first('password') }}
                            </p>
                        @endif
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between text-xs pt-1">
                        <label for="remember_me" class="inline-flex items-center cursor-pointer">
                            <input id="remember_me"
                                   type="checkbox"
                                   name="remember"
                                   class="w-5 h-5 rounded-lg bg-[#081538] border-2 border-sky-400 text-cyan-400 focus:ring-cyan-400 focus:ring-offset-0">
                            <span class="ms-2.5 text-sky-100 font-black text-sm">{{ __('Remember me') }}</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="underline text-cyan-300 hover:text-white font-black text-xs transition" href="{{ route('password.request') }}">
                                {{ __('Forgot password?') }}
                            </a>
                        @endif
                    </div>

                    <!-- Log in Button (Big, Bold, Captivating & Electric) -->
                    <div class="pt-3">
                        <button type="submit"
                                class="w-full inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-cyan-400 via-sky-400 to-blue-500 hover:from-cyan-300 hover:to-blue-400 active:from-cyan-500 active:to-blue-600 text-slate-950 font-black text-lg sm:text-xl tracking-wider rounded-2xl shadow-2xl shadow-cyan-400/40 border-2 border-cyan-300 transition transform hover:-translate-y-1 hover:shadow-cyan-400/60 focus:outline-none focus:ring-4 focus:ring-cyan-400">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                            </svg>
                            Log in
                        </button>
                    </div>
                </form>
            </div>

            <!-- Footer: Register Link in Dashboard Light Blue & Cyan -->
            <div class="text-center mt-6 pt-5 border-t-2 border-sky-400/30 text-xs sm:text-sm text-sky-200 font-bold">
                New student or educator?
                <a href="{{ route('register') }}" class="underline font-black text-cyan-300 hover:text-white ml-2 transition">
                    Create an Account &rarr;
                </a>
            </div>
        </div>

    </div>
</x-guest-layout>
