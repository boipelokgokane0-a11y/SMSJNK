<x-guest-layout maxWidth="max-w-6xl">
    @php
        $portal = request()->query('portal', 'teacher');
        $isStudent = in_array($portal, ['student', 'learner']);
        $isAdmin = in_array($portal, ['admin', 'administrator']);
        $isTeacher = !$isStudent && !$isAdmin;
    @endphp

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Split-Screen Fun, Captivating & Portal Theme (Bold Blue & Light Blue, Zero White) -->
    <div class="grid grid-cols-1 lg:grid-cols-12 min-h-[660px] bg-[#0f286b] text-white">

        <!-- LEFT COLUMN: CAPTIVATING PICTURES (STUDENTS STUDY / TEACHERS WORKSHOPS / ADMIN GOVERNANCE) -->
        <div class="lg:col-span-6 p-6 sm:p-8 md:p-10 bg-gradient-to-br from-[#081538] via-[#0d225c] to-[#0a1a47] border-b-2 lg:border-b-0 lg:border-r-2 border-sky-400/40 flex flex-col justify-between relative overflow-hidden">
            <!-- Ambient Light Blue Glows -->
            <div class="absolute -top-20 -left-20 w-64 h-64 bg-cyan-400/15 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute -bottom-20 -right-20 w-64 h-64 bg-sky-400/15 rounded-full blur-3xl pointer-events-none"></div>

            <div class="relative z-10 space-y-6">
                <!-- Portal Welcome Pill -->
                <div class="flex flex-wrap items-center gap-2">
                    <span class="inline-flex items-center gap-1.5 px-4 py-1.5 rounded-full text-xs font-black bg-cyan-400 text-slate-950 uppercase tracking-wider shadow-lg shadow-cyan-400/30">
                        @if($isStudent)
                            <span>🎓</span> OFFICIAL STUDENT PORTAL
                        @elseif($isTeacher)
                            <span>👩‍🏫</span> OFFICIAL TEACHER PORTAL
                        @else
                            <span>🛡️</span> OFFICIAL ADMINISTRATOR PORTAL
                        @endif
                    </span>
                    <span class="inline-flex items-center px-3.5 py-1 rounded-full text-xs font-black bg-blue-950 text-cyan-300 border-2 border-sky-400/50">
                        J &amp; K Designs Academy
                    </span>
                </div>

                <!-- Big and Bold Heading -->
                <div>
                    @if($isStudent)
                        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white leading-tight tracking-tight drop-shadow-md">
                            WELCOME <span class="text-cyan-300 underline decoration-cyan-400 decoration-4 underline-offset-4">STUDENT</span>, UNLOCK YOUR FUTURE!
                        </h2>
                        <p class="text-sm sm:text-base text-sky-200 font-bold mt-2.5 leading-relaxed">
                            Welcome Student! Step into an empowering educational journey with dynamic digital tools, supportive teachers, and collaborative learning.
                        </p>
                    @elseif($isTeacher)
                        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white leading-tight tracking-tight drop-shadow-md">
                            INSPIRING <span class="text-cyan-300 underline decoration-cyan-400 decoration-4 underline-offset-4">TEACHERS</span>, EMPOWERING MINDS!
                        </h2>
                        <p class="text-sm sm:text-base text-sky-200 font-bold mt-2.5 leading-relaxed">
                            Dedicated educators shape the future. Participate in faculty workshops and deliver world-class classroom instruction!
                        </p>
                    @else
                        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white leading-tight tracking-tight drop-shadow-md">
                            ACADEMY <span class="text-cyan-300 underline decoration-cyan-400 decoration-4 underline-offset-4">LEADERSHIP</span> &amp; GOVERNANCE
                        </h2>
                        <p class="text-sm sm:text-base text-sky-200 font-bold mt-2.5 leading-relaxed">
                            Empowering leadership and institutional excellence. Oversee enrollment, academic performance, faculty assignments, and academy operations.
                        </p>
                    @endif
                </div>

                <!-- 2 CAPTIVATING PICTURES -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                    @if($isStudent)
                        <!-- Picture 1: Collaborative Learning & Study -->
                        <div class="group relative rounded-2xl overflow-hidden border-2 border-sky-400 shadow-xl bg-[#081538] transition transform hover:-translate-y-1 duration-300">
                            <div class="h-48 sm:h-52 w-full overflow-hidden relative">
                                <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=800&q=80"
                                     alt="Collaborative Study"
                                     class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-[#081538] via-transparent to-transparent"></div>
                                <span class="absolute top-2.5 left-2.5 px-3 py-1 rounded-full text-xs font-black bg-cyan-400 text-slate-950 uppercase tracking-wider shadow-md">
                                    📚 Collaborative Study
                                </span>
                            </div>
                            <div class="p-3.5 bg-[#081538]">
                                <p class="text-sm font-black text-cyan-300 uppercase tracking-wide">ACTIVE STUDY GROUPS</p>
                                <p class="text-xs text-sky-100 mt-1 font-bold leading-tight">Students collaborating, solving problems and reaching academic excellence.</p>
                            </div>
                        </div>

                        <!-- Picture 2: Innovation & Group Thinking -->
                        <div class="group relative rounded-2xl overflow-hidden border-2 border-sky-400 shadow-xl bg-[#081538] transition transform hover:-translate-y-1 duration-300">
                            <div class="h-48 sm:h-52 w-full overflow-hidden relative">
                                <img src="https://images.unsplash.com/photo-1571260899304-425eee4c7efc?auto=format&fit=crop&w=800&q=80"
                                     alt="Group Thinking"
                                     class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-[#081538] via-transparent to-transparent"></div>
                                <span class="absolute top-2.5 left-2.5 px-3 py-1 rounded-full text-xs font-black bg-cyan-400 text-slate-950 uppercase tracking-wider shadow-md">
                                    💡 Group Thinking
                                </span>
                            </div>
                            <div class="p-3.5 bg-[#081538]">
                                <p class="text-sm font-black text-cyan-300 uppercase tracking-wide">INNOVATIVE MINDS</p>
                                <p class="text-xs text-sky-100 mt-1 font-bold leading-tight">Critical thinking, curiosity and future leadership in every classroom.</p>
                            </div>
                        </div>
                    @elseif($isTeacher)
                        <!-- Picture 1: Teachers Workshops -->
                        <div class="group relative rounded-2xl overflow-hidden border-2 border-sky-400 shadow-xl bg-[#081538] transition transform hover:-translate-y-1 duration-300">
                            <div class="h-48 sm:h-52 w-full overflow-hidden relative">
                                <img src="https://images.unsplash.com/photo-1517048676732-d65bc937f952?auto=format&fit=crop&w=800&q=80"
                                     alt="Teachers Workshops"
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

                        <!-- Picture 2: Teachers in Class -->
                        <div class="group relative rounded-2xl overflow-hidden border-2 border-sky-400 shadow-xl bg-[#081538] transition transform hover:-translate-y-1 duration-300">
                            <div class="h-48 sm:h-52 w-full overflow-hidden relative">
                                <img src="https://images.unsplash.com/photo-1577896851231-70ef18881754?auto=format&fit=crop&w=800&q=80"
                                     alt="Teachers in Class"
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
                    @else
                        <!-- Picture 1: Campus Administration / Operations -->
                        <div class="group relative rounded-2xl overflow-hidden border-2 border-sky-400 shadow-xl bg-[#081538] transition transform hover:-translate-y-1 duration-300">
                            <div class="h-48 sm:h-52 w-full overflow-hidden relative">
                                <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=800&q=80"
                                     alt="Campus Administration"
                                     class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-[#081538] via-transparent to-transparent"></div>
                                <span class="absolute top-2.5 left-2.5 px-3 py-1 rounded-full text-xs font-black bg-cyan-400 text-slate-950 uppercase tracking-wider shadow-md">
                                    🏛️ Campus Operations
                                </span>
                            </div>
                            <div class="p-3.5 bg-[#081538]">
                                <p class="text-sm font-black text-cyan-300 uppercase tracking-wide">CAMPUS ADMINISTRATION</p>
                                <p class="text-xs text-sky-100 mt-1 font-bold leading-tight">Institutional governance, faculty coordination and academic oversight.</p>
                            </div>
                        </div>

                        <!-- Picture 2: Executive Leadership & Strategy -->
                        <div class="group relative rounded-2xl overflow-hidden border-2 border-sky-400 shadow-xl bg-[#081538] transition transform hover:-translate-y-1 duration-300">
                            <div class="h-48 sm:h-52 w-full overflow-hidden relative">
                                <img src="https://images.unsplash.com/photo-1557804506-669a67965ba0?auto=format&fit=crop&w=800&q=80"
                                     alt="Executive Leadership"
                                     class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-[#081538] via-transparent to-transparent"></div>
                                <span class="absolute top-2.5 left-2.5 px-3 py-1 rounded-full text-xs font-black bg-cyan-400 text-slate-950 uppercase tracking-wider shadow-md">
                                    📊 Leadership &amp; Analytics
                                </span>
                            </div>
                            <div class="p-3.5 bg-[#081538]">
                                <p class="text-sm font-black text-cyan-300 uppercase tracking-wide">STRATEGIC OVERSIGHT</p>
                                <p class="text-xs text-sky-100 mt-1 font-bold leading-tight">Performance metrics, curriculum audits and system administration.</p>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Big & Bold Badges -->
                <div class="flex flex-wrap items-center gap-2 pt-2">
                    @if($isStudent)
                        <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-xl text-xs font-black bg-[#081538] text-cyan-300 border-2 border-sky-400/50 shadow">
                            <span>🎯</span> ACADEMIC MASTERY
                        </span>
                        <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-xl text-xs font-black bg-[#081538] text-cyan-300 border-2 border-sky-400/50 shadow">
                            <span>💡</span> CRITICAL THINKING
                        </span>
                        <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-xl text-xs font-black bg-[#081538] text-emerald-400 border-2 border-emerald-400/50 shadow">
                            <span>⭐</span> 100% STUDENT DEDICATION
                        </span>
                    @elseif($isTeacher)
                        <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-xl text-xs font-black bg-[#081538] text-cyan-300 border-2 border-sky-400/50 shadow">
                            <span>🎯</span> PEDAGOGICAL MASTERY
                        </span>
                        <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-xl text-xs font-black bg-[#081538] text-cyan-300 border-2 border-sky-400/50 shadow">
                            <span>🤝</span> FACULTY COLLABORATION
                        </span>
                        <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-xl text-xs font-black bg-[#081538] text-emerald-400 border-2 border-emerald-400/50 shadow">
                            <span>⭐</span> 100% EDUCATOR PASSION
                        </span>
                    @else
                        <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-xl text-xs font-black bg-[#081538] text-cyan-300 border-2 border-sky-400/50 shadow">
                            <span>🏛️</span> ACADEMY GOVERNANCE
                        </span>
                        <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-xl text-xs font-black bg-[#081538] text-cyan-300 border-2 border-sky-400/50 shadow">
                            <span>📊</span> ACADEMIC ANALYTICS
                        </span>
                        <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-xl text-xs font-black bg-[#081538] text-emerald-400 border-2 border-emerald-400/50 shadow">
                            <span>🔒</span> 100% SECURE PORTAL
                        </span>
                    @endif
                </div>
            </div>

            <div class="mt-6 pt-4 border-t-2 border-sky-400/30 text-xs text-sky-200 font-bold">
                @if($isStudent)
                    &ldquo;Education is the most powerful weapon which you can use to change the world.&rdquo; &bull; <strong class="text-cyan-300 font-black">Nelson Mandela</strong>
                @elseif($isTeacher)
                    &ldquo;Teaching is the profession that teaches all the other professions.&rdquo; &bull; <strong class="text-cyan-300 font-black">J &amp; K Designs Academy</strong>
                @else
                    &ldquo;Leadership and learning are indispensable to each other.&rdquo; &bull; <strong class="text-cyan-300 font-black">John F. Kennedy</strong>
                @endif
            </div>
        </div>

        <!-- RIGHT COLUMN: CAPTIVATING LOGIN PORTAL (DASHBOARD BLUE & LIGHT BLUE, ZERO WHITE) -->
        <div class="lg:col-span-6 p-6 sm:p-8 md:p-10 flex flex-col justify-between bg-[#0f286b] relative">
            <div>
                <!-- Digital Binary Code Header Ribbon (Dashboard Blue & Light) -->
                <div class="mb-5 p-3.5 bg-blue-50/10 border-2 border-sky-400/50 rounded-2xl text-center shadow-lg">
                    <div class="font-mono text-xs font-black text-blue-600 text-sky-300 tracking-widest">
                        01001010 01001011 &bull; 01010011 01010011 &bull; 2026/2027
                    </div>
                    <div class="font-mono text-[10px] uppercase tracking-wider text-cyan-300 font-black mt-0.5">
                        @if($isStudent)
                            // J &amp; K DESIGNS ACADEMY &bull; SECURE STUDENT GATEWAY
                        @elseif($isTeacher)
                            // J &amp; K DESIGNS ACADEMY &bull; SECURE TEACHER GATEWAY
                        @else
                            // J &amp; K DESIGNS ACADEMY &bull; SECURE ADMINISTRATOR GATEWAY
                        @endif
                    </div>
                </div>

                <!-- 3 Portal Selector Tabs (Student, Teacher, Admin) -->
                <div class="grid grid-cols-3 gap-2 mb-4">
                    <a href="{{ route('login', ['portal' => 'student']) }}"
                       class="text-center py-2.5 px-2 rounded-xl text-xs font-black uppercase tracking-wider transition border-2 {{ $isStudent ? 'bg-cyan-400 text-slate-950 border-cyan-300 shadow-lg shadow-cyan-400/30 ring-2 ring-cyan-300/50' : 'bg-[#081538] text-sky-200 border-sky-400/40 hover:text-white hover:border-sky-300' }}">
                        🎓 Student
                    </a>
                    <a href="{{ route('login', ['portal' => 'teacher']) }}"
                       class="text-center py-2.5 px-2 rounded-xl text-xs font-black uppercase tracking-wider transition border-2 {{ $isTeacher ? 'bg-cyan-400 text-slate-950 border-cyan-300 shadow-lg shadow-cyan-400/30 ring-2 ring-cyan-300/50' : 'bg-[#081538] text-sky-200 border-sky-400/40 hover:text-white hover:border-sky-300' }}">
                        👩‍🏫 Teacher
                    </a>
                    <a href="{{ route('login', ['portal' => 'admin']) }}"
                       class="text-center py-2.5 px-2 rounded-xl text-xs font-black uppercase tracking-wider transition border-2 {{ $isAdmin ? 'bg-cyan-400 text-slate-950 border-cyan-300 shadow-lg shadow-cyan-400/30 ring-2 ring-cyan-300/50' : 'bg-[#081538] text-sky-200 border-sky-400/40 hover:text-white hover:border-sky-300' }}">
                        🛡️ Admin
                    </a>
                </div>

                <!-- Friendly & Bold Welcome Title for Portal -->
                <div class="mb-5">
                    <div class="flex items-center gap-2">
                        <span class="text-3xl">
                            @if($isStudent) 🎓 @elseif($isTeacher) 👩‍🏫 @else 🛡️ @endif
                        </span>
                        <span class="px-3 py-1 rounded-full text-xs font-black bg-blue-950 text-cyan-300 border border-sky-400/50 uppercase tracking-widest">
                            @if($isStudent)
                                STUDENT AUTHENTICATION
                            @elseif($isTeacher)
                                TEACHER AUTHENTICATION
                            @else
                                ADMINISTRATOR AUTHENTICATION
                            @endif
                        </span>
                    </div>
                    @if($isStudent)
                        <h3 class="text-3xl sm:text-4xl font-black text-white tracking-tight mt-2">
                            WELCOME BACK, <span class="text-cyan-300">STUDENT!</span>
                        </h3>
                        <p class="text-sm font-bold text-sky-200 mt-1">
                            Welcome Student! Sign in to access your classes, timetable, enrolled subjects, marks and learning portal.
                        </p>
                    @elseif($isTeacher)
                        <h3 class="text-3xl sm:text-4xl font-black text-white tracking-tight mt-2">
                            WELCOME BACK, <span class="text-cyan-300">TEACHER!</span>
                        </h3>
                        <p class="text-sm font-bold text-sky-200 mt-1">
                            Sign in to access your classes, mark registers, capture assessment grades and view timetables.
                        </p>
                    @else
                        <h3 class="text-3xl sm:text-4xl font-black text-white tracking-tight mt-2">
                            WELCOME BACK, <span class="text-cyan-300">ADMINISTRATOR!</span>
                        </h3>
                        <p class="text-sm font-bold text-sky-200 mt-1">
                            Sign in to access student registers, manage faculty, generate academic reports, and oversee system operations.
                        </p>
                    @endif
                </div>

                <!-- Binary Metrics Grid in Dashboard Blue & Light Blue -->
                <div class="grid grid-cols-3 gap-2 p-3.5 bg-[#081538] rounded-2xl border-2 border-sky-400/60 text-center mb-5 shadow-xl">
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
                <form method="POST" action="{{ route('login') }}" class="space-y-4">
                    @csrf

                    <!-- Email Address / Identifier -->
                    <div>
                        <label for="email" class="block font-black text-sm uppercase tracking-wider text-cyan-300 mb-2">
                            @if($isStudent)
                                EMAIL ADDRESS OR STUDENT NUMBER <span class="text-cyan-400">*</span>
                            @elseif($isTeacher)
                                EMAIL ADDRESS OR PERSAL NUMBER <span class="text-cyan-400">*</span>
                            @else
                                ADMINISTRATOR EMAIL ADDRESS <span class="text-cyan-400">*</span>
                            @endif
                        </label>
                        <div class="relative">
                            <input id="email"
                                   type="text"
                                   name="email"
                                   value="{{ old('email') }}"
                                   required
                                   autofocus
                                   autocomplete="username"
                                   placeholder="{{ $isStudent ? 'student@jkdesignsacademy.co.za or STU-2026-0001' : ($isTeacher ? 'teacher@jkdesignsacademy.co.za or PER-8899' : 'admin@jkdesignsacademy.co.za') }}"
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
                    <div class="pt-2">
                        <button type="submit"
                                class="w-full inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-cyan-400 via-sky-400 to-blue-500 hover:from-cyan-300 hover:to-blue-400 active:from-cyan-500 active:to-blue-600 text-slate-950 font-black text-lg sm:text-xl tracking-wider rounded-2xl shadow-2xl shadow-cyan-400/40 border-2 border-cyan-300 transition transform hover:-translate-y-1 hover:shadow-cyan-400/60 focus:outline-none focus:ring-4 focus:ring-cyan-400">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                            </svg>
                            Log in
                        </button>
                    </div>
                </form>

                <!-- Quick-Fill Given Credentials Helper (Click to Auto-Fill & Test Instantly) -->
                <div class="mt-5 p-3.5 rounded-2xl bg-[#081538] border-2 border-sky-400/40 shadow-inner">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-xs font-black text-cyan-300 uppercase tracking-wider flex items-center gap-1.5">
                            <span>🔑</span> Given Credentials Quick-Fill
                        </span>
                        <span class="text-[10px] font-mono text-sky-300 bg-sky-950 px-2 py-0.5 rounded-md border border-sky-500/40">
                            Click to auto-fill
                        </span>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 text-xs">
                        <!-- Student Button -->
                        <button type="button"
                                onclick="fillCredentials('student@jkdesignsacademy.co.za', 'password', 'student')"
                                class="p-2 rounded-xl text-left border border-sky-400/30 hover:border-cyan-300 bg-[#0d225c] hover:bg-[#122e7a] transition group">
                            <div class="font-black text-cyan-300 group-hover:text-white flex items-center justify-between">
                                <span>🎓 Student</span>
                                <span class="text-[10px] text-sky-300 font-mono">Fill &rarr;</span>
                            </div>
                            <div class="text-[11px] text-sky-200 truncate mt-0.5 font-mono">student@jkdesignsacademy.co.za</div>
                            <div class="text-[10px] text-sky-300 font-mono">Pass: password</div>
                        </button>

                        <!-- Teacher Button -->
                        <button type="button"
                                onclick="fillCredentials('teacher@jkdesignsacademy.co.za', 'password', 'teacher')"
                                class="p-2 rounded-xl text-left border border-sky-400/30 hover:border-cyan-300 bg-[#0d225c] hover:bg-[#122e7a] transition group">
                            <div class="font-black text-cyan-300 group-hover:text-white flex items-center justify-between">
                                <span>👩‍🏫 Teacher</span>
                                <span class="text-[10px] text-sky-300 font-mono">Fill &rarr;</span>
                            </div>
                            <div class="text-[11px] text-sky-200 truncate mt-0.5 font-mono">teacher@jkdesignsacademy.co.za</div>
                            <div class="text-[10px] text-sky-300 font-mono">Pass: password</div>
                        </button>

                        <!-- Admin Button -->
                        <button type="button"
                                onclick="fillCredentials('admin@jkdesignsacademy.co.za', 'password', 'admin')"
                                class="p-2 rounded-xl text-left border border-sky-400/30 hover:border-cyan-300 bg-[#0d225c] hover:bg-[#122e7a] transition group">
                            <div class="font-black text-cyan-300 group-hover:text-white flex items-center justify-between">
                                <span>🛡️ Admin</span>
                                <span class="text-[10px] text-sky-300 font-mono">Fill &rarr;</span>
                            </div>
                            <div class="text-[11px] text-sky-200 truncate mt-0.5 font-mono">admin@jkdesignsacademy.co.za</div>
                            <div class="text-[10px] text-sky-300 font-mono">Pass: password</div>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Footer: Register Link in Dashboard Light Blue & Cyan -->
            <div class="text-center mt-5 pt-4 border-t-2 border-sky-400/30 text-xs sm:text-sm text-sky-200 font-bold">
                New student or educator?
                <a href="{{ route('register') }}" class="underline font-black text-cyan-300 hover:text-white ml-2 transition">
                    Create an Account &rarr;
                </a>
            </div>
        </div>

    </div>

    <!-- Script for Quick-Fill Credentials -->
    <script>
        function fillCredentials(email, password, portal) {
            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('password');
            if (emailInput) {
                emailInput.value = email;
                emailInput.focus();
            }
            if (passwordInput) {
                passwordInput.value = password;
            }
        }
    </script>
</x-guest-layout>
