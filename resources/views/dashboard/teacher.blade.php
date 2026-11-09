<x-app-layout>
    <x-slot name="header">
        <!-- Dark Blue, Red & Orange Teacher Header Bar -->
        <div class="bg-[#081538] px-4 sm:px-6 lg:px-8 py-6 border-b-4 border-orange-500 shadow-2xl text-white">
            <div class="max-w-7xl mx-auto flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div>
                    <div class="flex flex-wrap items-center gap-2">
                        <span class="inline-flex items-center px-3.5 py-1 rounded-full text-xs font-black bg-blue-900 text-cyan-300 border border-cyan-400/50 shadow-sm">
                            J &amp; K Designs Academy
                        </span>
                        <!-- SADTU Union Affiliation Badge (Red & Gold) -->
                        <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full text-xs font-black bg-red-600 text-white shadow-sm border border-red-300">
                            <span class="w-2.5 h-2.5 rounded-full bg-yellow-300 animate-pulse"></span>
                            SADTU AFFILIATED EDUCATOR
                        </span>
                        <span class="inline-flex items-center px-3.5 py-1 rounded-full text-xs font-black bg-orange-500 text-slate-950 shadow-sm border border-orange-300">
                            PERCEL: {{ $user->percel_number ?? 'PRCL-101' }}
                        </span>
                    </div>

                    <h2 class="font-black text-2xl sm:text-3xl text-white leading-tight mt-2">
                        Teacher Welcome Dashboard
                    </h2>
                    <p class="text-sm text-cyan-200 mt-1 font-bold">
                        Welcome Teacher <strong class="text-white font-black">{{ $user->name }}</strong>! &bull; Subject: <span class="text-orange-300 font-black">{{ $user->subject_to_be_taught ?? 'Mathematics' }}</span> &bull; School: <span class="text-cyan-300 font-bold">{{ $user->school ?? 'Oakridge High' }}</span>
                    </p>
                </div>

                <!-- Header Prominent & Bold Logout Button -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            onclick="event.preventDefault(); this.closest('form').submit();"
                            class="inline-flex items-center px-6 py-3 bg-red-600 hover:bg-red-700 active:bg-red-800 text-white font-black text-sm tracking-wider rounded-xl shadow-xl hover:shadow-red-500/40 transition transform hover:-translate-y-0.5 border-2 border-red-400 focus:outline-none focus:ring-4 focus:ring-red-400">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Log Out
                    </button>
                </form>
            </div>
        </div>
    </x-slot>

    <!-- Dark Blue Teacher Dashboard Canvas with Blue, Red & Orange Aesthetic -->
    <div class="py-8 bg-[#071330] min-h-screen text-slate-100"
         x-data="{ activeTab: 'overview' }">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

            <!-- DIGITAL BINARY CODE TICKER & MATRIX RIBBON -->
            <div class="p-3 bg-[#0a1c47] border-2 border-sky-400/40 rounded-2xl flex flex-col sm:flex-row items-center justify-between gap-3 shadow-lg">
                <div class="flex items-center gap-2">
                    <span class="px-2.5 py-0.5 rounded-md bg-blue-900 text-cyan-300 font-mono text-[11px] font-black border border-cyan-400/40">
                        BINARY MATRIX
                    </span>
                    <span class="font-mono text-xs font-black text-cyan-300 tracking-widest">
                        01001010 01001011 &bull; 01010100 01000101 01000001 &bull; 01000100 01000010
                    </span>
                </div>
                <div class="font-mono text-[10px] uppercase tracking-wider text-orange-300 font-bold">
                    // J &amp; K DESIGNS ACADEMY &bull; EDUCATOR TERMINAL &bull; BIN // ONLINE
                </div>
            </div>

            <!-- 1. HERO BANNER IN DARK BLUE, RED & ORANGE WITH SADTU SOLIDARITY -->
            <div class="bg-gradient-to-r from-[#081538] via-[#0d225c] to-[#121c3b] rounded-3xl shadow-2xl p-6 sm:p-8 text-white relative overflow-hidden border-4 border-orange-500">
                <!-- Binary Watermark in Background -->
                <div class="absolute -right-6 -bottom-6 opacity-10 pointer-events-none select-none font-mono text-xs font-black leading-tight text-cyan-300">
                    01001010 01001011 01010011 01001101 01010011<br>
                    01010100 01000101 01000001 01000011 01001000<br>
                    01010011 01000001 01000100 01010100 01010101<br>
                    01001101 01000001 01010100 01010010 01001001
                </div>

                <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-6 relative z-10">
                    <div class="space-y-3 max-w-3xl">
                        <div class="flex flex-wrap items-center gap-2">
                            <span class="inline-block px-3.5 py-1 bg-red-600 text-white text-xs font-black rounded-full uppercase tracking-wider shadow">
                                ✊ SADTU Solidarity in Education
                            </span>
                            <span class="inline-block px-3.5 py-1 bg-orange-500 text-slate-950 text-xs font-black rounded-full uppercase tracking-wider shadow">
                                Friendly Educator Workspace
                            </span>
                            <span class="inline-block px-3 py-1 bg-blue-900/80 text-cyan-300 text-xs font-mono font-bold rounded-full border border-cyan-400/40">
                                BIN // SYS-2026
                            </span>
                        </div>

                        <h1 class="text-3xl sm:text-5xl font-black tracking-tight text-white drop-shadow">
                            Welcome Teacher {{ $user->name }}!
                        </h1>
                        <p class="text-blue-100 text-sm sm:text-base leading-relaxed font-medium">
                            Empowering our future generation every single day at <strong class="underline decoration-orange-400 font-black text-white">{{ $user->school ?? 'Oakridge High' }}</strong>. You are currently mentoring <strong class="text-orange-300 font-black">{{ $totalStudents }} learners</strong> across <strong class="text-cyan-300 font-black">{{ count($myClasses) }} allocated classes</strong>.
                        </p>
                    </div>

                    <!-- Banner Logout & SADTU Union Badge -->
                    <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 w-full lg:w-auto">
                        <div class="bg-red-950/80 border-2 border-red-500 rounded-2xl p-4 text-center sm:text-left shadow-lg">
                            <div class="flex items-center justify-center sm:justify-start gap-2">
                                <span class="w-3 h-3 rounded-full bg-red-400 animate-ping"></span>
                                <p class="text-xs font-black uppercase text-red-200">SADTU Union Branch</p>
                            </div>
                            <p class="text-sm font-black text-white mt-1">Gauteng North &bull; Active Member</p>
                            <p class="text-[11px] text-yellow-300 font-bold mt-0.5">&ldquo;Workers unite for quality education&rdquo;</p>
                        </div>

                        <form method="POST" action="{{ route('logout') }}" class="w-full sm:w-auto">
                            @csrf
                            <button type="submit"
                                    class="w-full inline-flex items-center justify-center px-6 py-4 bg-red-600 hover:bg-red-700 active:bg-red-800 text-white font-black text-sm tracking-wider rounded-2xl shadow-xl transition border-2 border-red-400 transform hover:-translate-y-0.5">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                Log Out
                            </button>
                        </form>
                    </div>
                </div>

                <!-- 4 CORE METRICS WITH BINARY CODES (BLUE, RED & ORANGE IN DARK BLUE) -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-8 pt-6 border-t-2 border-blue-700/60 relative z-10">
                    <!-- Metric 1: Total Number of Students (Blue) -->
                    <div class="bg-[#07173d]/90 backdrop-blur-md rounded-2xl p-4 sm:p-5 border-2 border-blue-400 shadow-xl">
                        <div class="flex items-center justify-between">
                            <span class="font-mono text-xs font-black text-cyan-300">BIN // 0001</span>
                            <span class="text-xs px-2 py-0.5 rounded bg-blue-600 text-white font-black">ENROLLED</span>
                        </div>
                        <p class="text-xs uppercase font-extrabold text-blue-200 mt-2 tracking-wider">Total Number of Students</p>
                        <p class="text-3xl sm:text-4xl font-black font-mono text-white mt-1">{{ $totalStudents }}</p>
                        <span class="inline-block text-[11px] font-bold text-blue-300 mt-0.5">Learners Under Supervision</span>
                    </div>

                    <!-- Metric 2: Attendance Rate (Orange) -->
                    <div class="bg-[#07173d]/90 backdrop-blur-md rounded-2xl p-4 sm:p-5 border-2 border-orange-400 shadow-xl">
                        <div class="flex items-center justify-between">
                            <span class="font-mono text-xs font-black text-orange-300">BIN // 0010</span>
                            <span class="text-xs px-2 py-0.5 rounded bg-orange-500 text-slate-950 font-black">&check; VERIFIED</span>
                        </div>
                        <p class="text-xs uppercase font-extrabold text-orange-200 mt-2 tracking-wider">Attendance Rate</p>
                        <p class="text-3xl sm:text-4xl font-black font-mono text-orange-300 mt-1">{{ $attendance['rate'] }}%</p>
                        <span class="inline-block text-[11px] font-bold text-orange-200 mt-0.5">{{ $attendance['days_present'] }} Present &bull; {{ $attendance['status'] }}</span>
                    </div>

                    <!-- Metric 3: Pending Marks (Red) -->
                    <div class="bg-[#07173d]/90 backdrop-blur-md rounded-2xl p-4 sm:p-5 border-2 border-red-500 shadow-xl">
                        <div class="flex items-center justify-between">
                            <span class="font-mono text-xs font-black text-red-300">BIN // 0011</span>
                            <span class="text-xs px-2 py-0.5 rounded bg-red-600 text-white font-black animate-pulse">ACTION</span>
                        </div>
                        <p class="text-xs uppercase font-extrabold text-red-200 mt-2 tracking-wider">Pending Marks</p>
                        <p class="text-3xl sm:text-4xl font-black font-mono text-red-300 mt-1">{{ $pendingMarksCount }}</p>
                        <span class="inline-block text-[11px] font-bold text-red-200 mt-0.5">Scripts Awaiting Grading</span>
                    </div>

                    <!-- Metric 4: My Classes (Blue) -->
                    <div class="bg-[#07173d]/90 backdrop-blur-md rounded-2xl p-4 sm:p-5 border-2 border-blue-400 shadow-xl">
                        <div class="flex items-center justify-between">
                            <span class="font-mono text-xs font-black text-cyan-300">BIN // 0100</span>
                            <span class="text-xs px-2 py-0.5 rounded bg-blue-600 text-white font-black">ACTIVE</span>
                        </div>
                        <p class="text-xs uppercase font-extrabold text-blue-200 mt-2 tracking-wider">My Classes</p>
                        <p class="text-3xl sm:text-4xl font-black font-mono text-white mt-1">{{ count($myClasses) }} Classes</p>
                        <span class="inline-block text-[11px] font-bold text-blue-300 mt-0.5">Grades 10, 11 &amp; 12</span>
                    </div>
                </div>
            </div>

            <!-- 2. FRIENDLY SADTU & TEACHERS & LEARNERS PICTURE SHOWCASE -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Photo 1: Friendly Teacher and Learners Classroom Interaction -->
                <div class="bg-[#081538] rounded-3xl overflow-hidden shadow-2xl border-2 border-blue-400 group hover:border-blue-300 transition flex flex-col justify-between">
                    <div>
                        <div class="h-48 w-full overflow-hidden relative">
                            <img src="https://images.unsplash.com/photo-1577896851231-70ef18881754?auto=format&fit=crop&w=800&q=80"
                                 alt="Friendly Teacher Helping Learners in Classroom"
                                 class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-[#081538] via-transparent to-transparent"></div>
                            <span class="absolute top-3 left-3 px-3 py-1 rounded-full text-xs font-black bg-blue-600 text-white shadow">
                                👩‍🏫 Teachers &amp; Learners Interaction
                            </span>
                            <span class="absolute top-3 right-3 px-2 py-0.5 rounded bg-black/60 text-cyan-300 font-mono text-[10px] font-bold">
                                BIN // PIC-01
                            </span>
                        </div>
                        <div class="p-5">
                            <h4 class="font-black text-lg text-white">Dedicated Learner Mentorship</h4>
                            <p class="text-xs sm:text-sm text-blue-200 mt-1 leading-relaxed">
                                Nurturing academic curiosity and celebrating every breakthrough in the classroom.
                            </p>
                        </div>
                    </div>
                    <div class="p-5 pt-0">
                        <span class="inline-block px-3 py-1 rounded-xl text-xs font-black bg-blue-900/60 text-cyan-300 border border-blue-400/40">
                            &check; Positive Classroom Culture
                        </span>
                    </div>
                </div>

                <!-- Photo 2: Inspiring Educator Collaborative Learning -->
                <div class="bg-[#081538] rounded-3xl overflow-hidden shadow-2xl border-2 border-orange-400 group hover:border-orange-300 transition flex flex-col justify-between">
                    <div>
                        <div class="h-48 w-full overflow-hidden relative">
                            <img src="https://images.unsplash.com/photo-1524178232363-1fb2b075b655?auto=format&fit=crop&w=800&q=80"
                                 alt="Teacher collaborating with learners"
                                 class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-[#081538] via-transparent to-transparent"></div>
                            <span class="absolute top-3 left-3 px-3 py-1 rounded-full text-xs font-black bg-orange-500 text-slate-950 shadow">
                                💡 Collaborative Thinking
                            </span>
                            <span class="absolute top-3 right-3 px-2 py-0.5 rounded bg-black/60 text-orange-300 font-mono text-[10px] font-bold">
                                BIN // PIC-02
                            </span>
                        </div>
                        <div class="p-5">
                            <h4 class="font-black text-lg text-white">Active Student Engagement</h4>
                            <p class="text-xs sm:text-sm text-orange-100 mt-1 leading-relaxed">
                                Fostering analytical discussion, interactive whiteboard sessions, and team problem-solving.
                            </p>
                        </div>
                    </div>
                    <div class="p-5 pt-0">
                        <span class="inline-block px-3 py-1 rounded-xl text-xs font-black bg-orange-950/60 text-orange-300 border border-orange-400/40">
                            &check; 97.2% Subject Pass Rate
                        </span>
                    </div>
                </div>

                <!-- Photo 3: SADTU Union Support & Teacher Solidarity -->
                <div class="bg-[#081538] rounded-3xl overflow-hidden shadow-2xl border-2 border-red-500 group hover:border-red-400 transition flex flex-col justify-between">
                    <div>
                        <div class="h-48 w-full overflow-hidden relative">
                            <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=800&q=80"
                                 alt="SADTU Union Teachers and Learners Celebration"
                                 class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-[#081538] via-transparent to-transparent"></div>
                            <span class="absolute top-3 left-3 px-3 py-1 rounded-full text-xs font-black bg-red-600 text-white shadow">
                                ✊ SADTU Educator Support
                            </span>
                            <span class="absolute top-3 right-3 px-2 py-0.5 rounded bg-black/60 text-red-300 font-mono text-[10px] font-bold">
                                BIN // PIC-03
                            </span>
                        </div>
                        <div class="p-5">
                            <h4 class="font-black text-lg text-white">Professional Union Solidarity</h4>
                            <p class="text-xs sm:text-sm text-red-200 mt-1 leading-relaxed">
                                Supporting teacher wellness, professional development, and labor rights under SADTU solidarity.
                            </p>
                        </div>
                    </div>
                    <div class="p-5 pt-0">
                        <span class="inline-block px-3 py-1 rounded-xl text-xs font-black bg-red-950/60 text-red-300 border border-red-400/40">
                            &check; Quality Public Education
                        </span>
                    </div>
                </div>
            </div>

            <!-- 3. NAVIGATION TABS IN DARK BLUE (BLUE, RED & ORANGE ACCENTS) -->
            <div class="bg-[#081538] rounded-2xl shadow-xl border-2 border-slate-700 p-2 overflow-x-auto">
                <nav class="flex space-x-2 min-w-max" aria-label="Teacher Dashboard Tools">
                    <button @click="activeTab = 'overview'"
                            :class="activeTab === 'overview' ? 'bg-blue-600 text-white shadow-lg font-black' : 'text-blue-200 hover:text-white hover:bg-blue-900/40 font-bold'"
                            class="px-4 py-2.5 rounded-xl text-sm transition flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Dashboard Overview
                    </button>

                    <button @click="activeTab = 'classes'"
                            :class="activeTab === 'classes' ? 'bg-blue-600 text-white shadow-lg font-black' : 'text-blue-200 hover:text-white hover:bg-blue-900/40 font-bold'"
                            class="px-4 py-2.5 rounded-xl text-sm transition flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                        My Classes ({{ count($myClasses) }})
                    </button>

                    <button @click="activeTab = 'attendance'"
                            :class="activeTab === 'attendance' ? 'bg-orange-500 text-slate-950 shadow-lg font-black' : 'text-orange-300 hover:bg-orange-950/40 font-bold'"
                            class="px-4 py-2.5 rounded-xl text-sm transition flex items-center gap-2 border border-orange-400/40">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Attendance Rate ({{ $attendance['rate'] }}%)
                    </button>

                    <button @click="activeTab = 'assignments'"
                            :class="activeTab === 'assignments' ? 'bg-red-600 text-white shadow-lg font-black' : 'text-red-300 hover:bg-red-950/40 font-bold'"
                            class="px-4 py-2.5 rounded-xl text-sm transition flex items-center gap-2 border border-red-500/40">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                        Assignments and Marks ({{ $pendingMarksCount }} Pending)
                    </button>

                    <button @click="activeTab = 'timetable'"
                            :class="activeTab === 'timetable' ? 'bg-blue-600 text-white shadow-lg font-black' : 'text-blue-200 hover:text-white hover:bg-blue-900/40 font-bold'"
                            class="px-4 py-2.5 rounded-xl text-sm transition flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Timetable
                    </button>

                    <button @click="activeTab = 'performance'"
                            :class="activeTab === 'performance' ? 'bg-orange-500 text-slate-950 shadow-lg font-black' : 'text-orange-300 hover:bg-orange-950/40 font-bold'"
                            class="px-4 py-2.5 rounded-xl text-sm transition flex items-center gap-2 border border-orange-400/40">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                        Student Performance ({{ $studentPerformance['pass_rate'] }}%)
                    </button>

                    <button @click="activeTab = 'profile'"
                            :class="activeTab === 'profile' ? 'bg-red-600 text-white shadow-lg font-black' : 'text-red-300 hover:bg-red-950/40 font-bold'"
                            class="px-4 py-2.5 rounded-xl text-sm transition flex items-center gap-2 border border-red-500/40">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        My Profile (Educator Dossier)
                    </button>
                </nav>
            </div>

            <!-- TAB 1: OVERVIEW IN DARK BLUE -->
            <div x-show="activeTab === 'overview'" class="space-y-6">
                <!-- PENDING MARKS ALERT BANNER (RED & ORANGE) -->
                @if ($pendingMarksCount > 0)
                    <div class="bg-gradient-to-r from-red-600 via-orange-600 to-amber-500 text-white rounded-3xl p-6 shadow-2xl border-2 border-red-300 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                        <div class="flex items-start gap-4">
                            <span class="p-3 bg-black/30 rounded-2xl text-2xl font-black shadow border border-white/20">
                                📝
                            </span>
                            <div>
                                <span class="px-2.5 py-0.5 rounded-full text-xs font-black bg-black/40 text-yellow-200 uppercase tracking-wider">
                                    Grading Attention Needed &bull; BIN // ACT-01
                                </span>
                                <h3 class="text-xl sm:text-2xl font-black mt-1">
                                    You have {{ $pendingMarksCount }} Pending Marks to Grade
                                </h3>
                                <p class="text-xs sm:text-sm text-red-100 font-semibold mt-0.5">
                                    Term 1 Differential Calculus test &amp; Trigonometry assessments require moderation before the final term deadline.
                                </p>
                            </div>
                        </div>

                        <button type="button" @click="activeTab = 'assignments'"
                                class="inline-flex items-center px-6 py-3 bg-white hover:bg-yellow-100 text-red-700 font-black text-sm rounded-xl shadow-lg transition w-full sm:w-auto text-center justify-center transform hover:-translate-y-0.5">
                            Grade Assignments &rarr;
                        </button>
                    </div>
                @endif

                <!-- QUICK SUMMARY GRID (DARK BLUE CARDS WITH BLUE, RED, ORANGE BORDERS) -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- My Classes Quick Card -->
                    <div class="bg-[#081538] rounded-3xl shadow-xl border-2 border-blue-400 p-6 sm:p-7 space-y-4">
                        <div class="flex justify-between items-center pb-3 border-b-2 border-blue-900/60">
                            <div>
                                <div class="flex items-center gap-2">
                                    <span class="font-mono text-[10px] text-cyan-300 font-bold">BIN // CLS-00</span>
                                </div>
                                <h3 class="text-xl font-black text-white">My Classes</h3>
                                <p class="text-xs text-blue-200 font-bold">Allocated instructional divisions</p>
                            </div>
                            <button @click="activeTab = 'classes'" class="text-xs font-black text-cyan-300 hover:text-white uppercase tracking-wider bg-blue-950 px-3 py-1 rounded-xl border border-blue-400/40">
                                View All &rarr;
                            </button>
                        </div>

                        <div class="space-y-3">
                            @foreach ($myClasses as $cls)
                                <div class="p-3.5 rounded-2xl border-2 border-blue-900/60 bg-[#07173d] hover:border-blue-400 transition flex items-center justify-between">
                                    <div>
                                        <span class="px-2.5 py-0.5 rounded text-xs font-black bg-blue-600 text-white">
                                            {{ $cls['grade'] }}
                                        </span>
                                        <p class="font-black text-white text-sm mt-1">{{ $cls['subject'] }}</p>
                                        <p class="text-xs text-blue-300 font-bold">{{ $cls['room'] }}</p>
                                    </div>
                                    <div class="text-right">
                                        <span class="text-xl font-black text-cyan-300 font-mono">{{ $cls['students_count'] }}</span>
                                        <span class="block text-[10px] uppercase font-bold text-slate-400">Learners</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Attendance Rate Overview Card -->
                    <div class="bg-[#081538] rounded-3xl shadow-xl border-2 border-orange-400 p-6 sm:p-7 space-y-4">
                        <div class="flex justify-between items-center pb-3 border-b-2 border-orange-900/60">
                            <div>
                                <div class="flex items-center gap-2">
                                    <span class="font-mono text-[10px] text-orange-300 font-bold">BIN // ATT-00</span>
                                </div>
                                <h3 class="text-xl font-black text-white">Attendance Rate</h3>
                                <p class="text-xs text-orange-200 font-bold">Learner compliance across subjects</p>
                            </div>
                            <span class="text-xs font-black px-2.5 py-0.5 rounded-full bg-orange-950 text-orange-300 border border-orange-400/40">
                                {{ $attendance['status'] }}
                            </span>
                        </div>

                        <div class="p-5 bg-[#07173d] border-2 border-orange-500/50 rounded-2xl text-center">
                            <p class="text-5xl font-black text-orange-400 font-mono">{{ $attendance['rate'] }}%</p>
                            <p class="text-xs font-black uppercase text-orange-200 mt-1">Average Daily Attendance</p>
                            <div class="grid grid-cols-3 gap-2 mt-4 pt-3 border-t border-orange-900/60 text-center text-xs">
                                <div>
                                    <span class="block font-black text-emerald-400 text-lg font-mono">{{ $attendance['days_present'] }}</span>
                                    <span class="text-[10px] font-bold text-slate-400">Present</span>
                                </div>
                                <div>
                                    <span class="block font-black text-orange-400 text-lg font-mono">{{ $attendance['days_late'] }}</span>
                                    <span class="text-[10px] font-bold text-slate-400">Late</span>
                                </div>
                                <div>
                                    <span class="block font-black text-red-400 text-lg font-mono">{{ $attendance['days_absent'] }}</span>
                                    <span class="text-[10px] font-bold text-slate-400">Absent</span>
                                </div>
                            </div>
                        </div>

                        <div class="pt-2">
                            <button @click="activeTab = 'attendance'" class="w-full text-center py-2.5 rounded-xl bg-orange-500 hover:bg-orange-400 text-slate-950 font-black text-xs uppercase tracking-wider shadow">
                                View Daily Class Registers &rarr;
                            </button>
                        </div>
                    </div>

                    <!-- Student Performance Snapshot Card -->
                    <div class="bg-[#081538] rounded-3xl shadow-xl border-2 border-red-500 p-6 sm:p-7 space-y-4">
                        <div class="flex justify-between items-center pb-3 border-b-2 border-red-900/60">
                            <div>
                                <div class="flex items-center gap-2">
                                    <span class="font-mono text-[10px] text-red-300 font-bold">BIN // PRF-00</span>
                                </div>
                                <h3 class="text-xl font-black text-white">Student Performance</h3>
                                <p class="text-xs text-red-200 font-bold">Academic mastery indicators</p>
                            </div>
                            <button @click="activeTab = 'performance'" class="text-xs font-black text-red-300 hover:text-white uppercase tracking-wider bg-red-950 px-3 py-1 rounded-xl border border-red-400/40">
                                Analytics &rarr;
                            </button>
                        </div>

                        <div class="space-y-3">
                            <div class="flex items-center justify-between p-3 rounded-2xl bg-[#07173d] border border-red-500/40">
                                <span class="text-xs font-bold text-slate-200">Overall Subject Pass Rate</span>
                                <span class="text-lg font-black text-red-400 font-mono">{{ $studentPerformance['pass_rate'] }}%</span>
                            </div>
                            <div class="flex items-center justify-between p-3 rounded-2xl bg-[#07173d] border border-orange-500/40">
                                <span class="text-xs font-bold text-slate-200">Distinction Rate (Level 7)</span>
                                <span class="text-lg font-black text-orange-400 font-mono">{{ $studentPerformance['distinction_rate'] }}%</span>
                            </div>
                            <div class="flex items-center justify-between p-3 rounded-2xl bg-[#07173d] border border-blue-500/40">
                                <span class="text-xs font-bold text-slate-200">Class Average Mark</span>
                                <span class="text-lg font-black text-cyan-300 font-mono">{{ $studentPerformance['class_average'] }}%</span>
                            </div>
                        </div>

                        <div class="pt-2">
                            <p class="text-xs font-bold text-slate-300">Top Learner: <strong class="text-white">{{ $studentPerformance['top_achievers'][0]['name'] }}</strong> ({{ $studentPerformance['top_achievers'][0]['score'] }}%)</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TAB 2: MY CLASSES IN DARK BLUE -->
            <div x-show="activeTab === 'classes'" class="space-y-6">
                <div class="bg-[#081538] rounded-3xl shadow-xl border-2 border-blue-400 p-6 sm:p-8">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 pb-6 border-b-2 border-blue-900/60">
                        <div>
                            <span class="px-3 py-1 rounded-full text-xs font-black bg-blue-600 text-white uppercase tracking-wider shadow">
                                Enrolled Teaching Divisions &bull; BIN // CLS
                            </span>
                            <h3 class="text-2xl sm:text-3xl font-black text-white mt-1">My Allocated Classes</h3>
                            <p class="text-sm text-blue-200 font-bold">Managing {{ $totalStudents }} learners across {{ count($myClasses) }} academic sections</p>
                        </div>
                        <span class="inline-flex items-center px-4 py-2 rounded-2xl text-sm font-black bg-[#07173d] text-cyan-300 border border-blue-400/50">
                            Total Number of Students: {{ $totalStudents }}
                        </span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                        @foreach ($myClasses as $c)
                            <div class="rounded-3xl border-2 {{ $c['color'] === 'blue' ? 'border-blue-400 bg-[#07173d]' : ($c['color'] === 'red' ? 'border-red-400 bg-[#07173d]' : 'border-orange-400 bg-[#07173d]') }} p-6 shadow-xl flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center justify-between pb-3 border-b border-slate-700">
                                        <div class="flex items-center gap-2">
                                            <span class="px-3 py-1 rounded-xl text-sm font-black text-white {{ $c['color'] === 'blue' ? 'bg-blue-600' : ($c['color'] === 'red' ? 'bg-red-600' : 'bg-orange-500 text-slate-950') }}">
                                                {{ $c['grade'] }}
                                            </span>
                                            <span class="font-mono text-xs text-cyan-300 font-bold">BIN // {{ str_replace(' ', '', $c['grade']) }}</span>
                                        </div>
                                        <span class="text-xs font-bold text-slate-300">{{ $c['periods_per_week'] }} Periods / Week</span>
                                    </div>

                                    <h4 class="text-xl font-black text-white mt-3">{{ $c['subject'] }}</h4>
                                    <p class="text-xs font-bold text-blue-200 mt-1">Classroom: <strong class="text-white">{{ $c['room'] }}</strong></p>

                                    <div class="grid grid-cols-2 gap-3 mt-4 pt-4 border-t border-slate-700 text-xs">
                                        <div class="p-3 bg-[#081538] rounded-xl shadow-xs border border-slate-700">
                                            <span class="text-[10px] uppercase font-bold text-slate-400 block">Enrolled Learners</span>
                                            <span class="text-2xl font-black text-white font-mono">{{ $c['students_count'] }}</span>
                                        </div>
                                        <div class="p-3 bg-[#081538] rounded-xl shadow-xs border border-slate-700">
                                            <span class="text-[10px] uppercase font-bold text-slate-400 block">Class Average</span>
                                            <span class="text-2xl font-black text-emerald-400 font-mono">{{ $c['average'] }}%</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-5 pt-4 border-t border-slate-700 flex items-center justify-between text-xs font-bold text-slate-300">
                                    <span>Class Representative: <strong class="text-white">{{ $c['class_rep'] }}</strong></span>
                                    <button type="button" @click="activeTab = 'assignments'" class="text-cyan-300 hover:underline">Assessments &rarr;</button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- TAB 3: ATTENDANCE RATE IN DARK BLUE -->
            <div x-show="activeTab === 'attendance'" class="space-y-6">
                <div class="bg-[#081538] rounded-3xl shadow-xl border-2 border-orange-400 p-6 sm:p-8">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 pb-6 border-b-2 border-orange-900/60">
                        <div>
                            <span class="px-3 py-1 rounded-full text-xs font-black bg-orange-500 text-slate-950 uppercase tracking-wider shadow">
                                Class Attendance Register &bull; BIN // ATT
                            </span>
                            <h3 class="text-2xl sm:text-3xl font-black text-white mt-1">Class Attendance Records</h3>
                            <p class="text-sm text-orange-200 font-bold">Real-time attendance rates across all supervised teaching groups</p>
                        </div>
                        <span class="inline-flex items-center px-4 py-2 rounded-2xl text-base font-black bg-orange-500 text-slate-950 shadow">
                            Average Compliance: {{ $attendance['rate'] }}%
                        </span>
                    </div>

                    <!-- Attendance KPI Boxes (Dark Blue with Blue, Red, Orange borders) -->
                    <div class="grid grid-cols-2 lg:grid-cols-4 gap-5 mt-6">
                        <div class="bg-[#07173d] border-2 border-blue-400 rounded-2xl p-5 text-center shadow-lg">
                            <p class="text-xs uppercase font-black text-blue-300 tracking-wider">Total Active Learners</p>
                            <p class="text-4xl sm:text-5xl font-black text-white mt-2 font-mono">{{ $attendance['total_students'] }}</p>
                            <p class="text-xs font-bold text-blue-300 mt-1">Across 4 Classes</p>
                        </div>

                        <div class="bg-[#07173d] border-2 border-emerald-400 rounded-2xl p-5 text-center shadow-lg">
                            <p class="text-xs uppercase font-black text-emerald-300 tracking-wider">Present Today</p>
                            <p class="text-4xl sm:text-5xl font-black text-emerald-400 mt-2 font-mono">{{ $attendance['days_present'] }}</p>
                            <p class="text-xs font-bold text-emerald-300 mt-1">&check; Verified Present</p>
                        </div>

                        <div class="bg-[#07173d] border-2 border-orange-400 rounded-2xl p-5 text-center shadow-lg">
                            <p class="text-xs uppercase font-black text-orange-300 tracking-wider">Late Arrivals</p>
                            <p class="text-4xl sm:text-5xl font-black text-orange-400 mt-2 font-mono">{{ $attendance['days_late'] }}</p>
                            <p class="text-xs font-bold text-orange-300 mt-1">&bull; Logged Tardiness</p>
                        </div>

                        <div class="bg-[#07173d] border-2 border-red-400 rounded-2xl p-5 text-center shadow-lg">
                            <p class="text-xs uppercase font-black text-red-300 tracking-wider">Absences Logged</p>
                            <p class="text-4xl sm:text-5xl font-black text-red-400 mt-2 font-mono">{{ $attendance['days_absent'] }}</p>
                            <p class="text-xs font-bold text-red-300 mt-1">&times; Unexcused Absence</p>
                        </div>
                    </div>

                    <!-- Recent Register Verification Log -->
                    <div class="mt-8">
                        <h4 class="font-black text-lg text-white mb-3 flex items-center justify-between">
                            <span>Recent Class Register Submissions</span>
                            <span class="font-mono text-xs text-orange-300 font-bold">BIN // LOG-ATT</span>
                        </h4>
                        <div class="overflow-x-auto rounded-2xl border-2 border-orange-500/40">
                            <table class="min-w-full divide-y divide-slate-700 text-left text-sm">
                                <thead class="bg-[#07173d] text-xs font-black text-orange-300 uppercase tracking-wider">
                                    <tr>
                                        <th class="px-5 py-3.5">Date</th>
                                        <th class="px-5 py-3.5">Class / Subject</th>
                                        <th class="px-5 py-3.5">Present</th>
                                        <th class="px-5 py-3.5">Absent</th>
                                        <th class="px-5 py-3.5">Class Rate</th>
                                        <th class="px-5 py-3.5">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-700 bg-[#081538]">
                                    @foreach ($attendance['recent_logs'] as $log)
                                        <tr class="hover:bg-blue-900/30 transition">
                                            <td class="px-5 py-3.5 font-bold text-white whitespace-nowrap">{{ $log['date'] }}</td>
                                            <td class="px-5 py-3.5 font-black text-cyan-300">{{ $log['class'] }}</td>
                                            <td class="px-5 py-3.5 font-bold text-emerald-400">{{ $log['present'] }} Learners</td>
                                            <td class="px-5 py-3.5 font-bold text-red-400">{{ $log['absent'] }} Absent</td>
                                            <td class="px-5 py-3.5 font-mono font-black text-white">{{ $log['rate'] }}%</td>
                                            <td class="px-5 py-3.5">
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-black bg-emerald-950 text-emerald-300 border border-emerald-400/40">
                                                    &check; Verified by Educator
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TAB 4: ASSIGNMENTS AND MARKS (WITH PENDING MARKS) -->
            <div x-show="activeTab === 'assignments'" class="space-y-6">
                <div class="bg-[#081538] rounded-3xl shadow-xl border-2 border-red-500 p-6 sm:p-8">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 pb-6 border-b-2 border-red-900/60">
                        <div>
                            <span class="px-3 py-1 rounded-full text-xs font-black bg-red-600 text-white uppercase tracking-wider shadow">
                                Assessment &amp; Grading Desk &bull; BIN // ASG
                            </span>
                            <h3 class="text-2xl sm:text-3xl font-black text-white mt-1">Assignments and Marks</h3>
                            <p class="text-sm text-red-200 font-bold">Capture marks, manage formal tasks and view grading progress</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="inline-flex items-center px-4 py-2 rounded-2xl text-sm font-black bg-red-950 text-red-300 border border-red-400 shadow">
                                ⚠️ {{ $pendingMarksCount }} Pending Marks
                            </span>
                        </div>
                    </div>

                    <!-- Assignments and Marks Table -->
                    <div class="mt-6 overflow-x-auto rounded-2xl border-2 border-red-500/40">
                        <table class="min-w-full divide-y divide-slate-700 text-left text-sm">
                            <thead class="bg-[#07173d] text-xs font-black text-red-300 uppercase tracking-wider">
                                <tr>
                                    <th class="px-5 py-4">Assessment Task Title</th>
                                    <th class="px-5 py-4">Class</th>
                                    <th class="px-5 py-4">Total Marks</th>
                                    <th class="px-5 py-4">Submissions</th>
                                    <th class="px-5 py-4">Grading Progress</th>
                                    <th class="px-5 py-4">Class Average</th>
                                    <th class="px-5 py-4">Status &amp; Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-700 bg-[#081538]">
                                @foreach ($assignments as $a)
                                    <tr class="hover:bg-blue-900/30 transition">
                                        <td class="px-5 py-4">
                                            <div class="font-black text-white text-base">{{ $a['title'] }}</div>
                                            <div class="text-xs text-slate-300 font-bold">Due: {{ $a['due_date'] }}</div>
                                        </td>
                                        <td class="px-5 py-4 font-black text-cyan-300 whitespace-nowrap">{{ $a['class'] }}</td>
                                        <td class="px-5 py-4 font-mono font-black text-white">{{ $a['total_marks'] }} Pts</td>
                                        <td class="px-5 py-4 font-bold text-slate-300">{{ $a['submissions'] }} / {{ $a['total_students'] }}</td>
                                        <td class="px-5 py-4">
                                            <div class="flex items-center gap-2">
                                                <div class="w-24 bg-slate-800 rounded-full h-3 overflow-hidden">
                                                    <div class="h-3 rounded-full {{ $a['pending_count'] > 0 ? 'bg-orange-500' : 'bg-emerald-500' }}"
                                                         style="width: {{ ($a['graded_count'] / $a['total_students']) * 100 }}%"></div>
                                                </div>
                                                <span class="text-xs font-black text-slate-200">{{ $a['graded_count'] }}/{{ $a['total_students'] }}</span>
                                            </div>
                                        </td>
                                        <td class="px-5 py-4 font-mono font-black text-base text-cyan-300">{{ $a['average_score'] }}%</td>
                                        <td class="px-5 py-4">
                                            @if ($a['pending_count'] > 0)
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-black bg-red-600 text-white shadow">
                                                    {{ $a['pending_count'] }} Pending Marks
                                                </span>
                                            @else
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-black bg-emerald-950 text-emerald-300 border border-emerald-400/40">
                                                    &check; Fully Graded
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- TAB 5: TIMETABLE IN DARK BLUE -->
            <div x-show="activeTab === 'timetable'" class="space-y-6" x-data="{ currentDay: 'Monday' }">
                <div class="bg-[#081538] rounded-3xl shadow-xl border-2 border-blue-400 p-6 sm:p-8">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 pb-6 border-b-2 border-blue-900/60">
                        <div>
                            <span class="px-3 py-1 rounded-full text-xs font-black bg-blue-600 text-white uppercase tracking-wider shadow">
                                Educator Schedule &bull; BIN // TBL
                            </span>
                            <h3 class="text-2xl sm:text-3xl font-black text-white mt-1">Weekly Instructional Timetable</h3>
                            <p class="text-sm text-blue-200 font-bold">Term 1 Schedule &bull; Classroom, laboratory &amp; union consultation timeslots</p>
                        </div>

                        <!-- Day Selector Buttons (Blue, Red & Orange) -->
                        <div class="flex flex-wrap gap-1.5 p-2 bg-[#07173d] rounded-2xl border-2 border-slate-700">
                            @foreach (array_keys($timetable) as $idx => $day)
                                @php
                                    $dayColors = ['bg-blue-600 text-white', 'bg-red-600 text-white', 'bg-orange-500 text-slate-950', 'bg-blue-600 text-white', 'bg-red-600 text-white'];
                                    $activeColorClass = $dayColors[$idx % count($dayColors)];
                                @endphp
                                <button type="button" @click="currentDay = '{{ $day }}'"
                                        :class="currentDay === '{{ $day }}' ? '{{ $activeColorClass }} font-black shadow-lg scale-105' : 'text-slate-300 hover:text-white font-bold hover:bg-white/10'"
                                        class="px-4 py-2 rounded-xl text-xs transition-all">
                                    {{ $day }}
                                </button>
                            @endforeach
                        </div>
                    </div>

                    <!-- Daily Slots (Dark Blue with Blue, Red & Orange borders) -->
                    @foreach ($timetable as $day => $slots)
                        <div x-show="currentDay === '{{ $day }}'" class="mt-6 space-y-3">
                            <div class="flex items-center justify-between px-2 mb-2">
                                <h4 class="font-black text-xl text-white flex items-center gap-2">
                                    <span class="w-3.5 h-3.5 rounded-full bg-cyan-400"></span>
                                    {{ $day }} Schedule
                                </h4>
                                <span class="text-xs font-black text-cyan-300 bg-blue-950 px-3 py-1 rounded-full border border-blue-400/40">
                                    {{ count($slots) }} Sessions Scheduled
                                </span>
                            </div>

                            <div class="space-y-3">
                                @foreach ($slots as $slot)
                                    @php
                                        $slotClasses = match($slot['theme'] ?? 'blue') {
                                            'red'    => 'bg-red-950/40 border-red-500 text-red-200',
                                            'orange' => 'bg-orange-950/40 border-orange-400 text-orange-200',
                                            default  => 'bg-blue-950/40 border-blue-400 text-blue-200',
                                        };
                                        $badgeBg = match($slot['theme'] ?? 'blue') {
                                            'red'    => 'bg-red-600 text-white',
                                            'orange' => 'bg-orange-500 text-slate-950',
                                            default  => 'bg-blue-600 text-white',
                                        };
                                    @endphp
                                    <div class="p-4 sm:p-5 rounded-2xl border-2 transition-all hover:scale-[1.01] shadow-md {{ $slotClasses }}">
                                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                                            <div class="flex items-center gap-4">
                                                @if (is_numeric($slot['period']))
                                                    <span class="w-11 h-11 rounded-2xl {{ $badgeBg }} flex items-center justify-center font-black text-sm shadow">
                                                        P{{ $slot['period'] }}
                                                    </span>
                                                @else
                                                    <span class="w-11 h-11 rounded-2xl bg-amber-400 text-amber-950 flex items-center justify-center font-black text-lg shadow">
                                                        ☕
                                                    </span>
                                                @endif

                                                <div>
                                                    <h5 class="text-base sm:text-lg font-black text-white">{{ $slot['subject'] }}</h5>
                                                    <p class="text-xs font-bold text-slate-300">
                                                        Venue: <strong class="text-white">{{ $slot['room'] }}</strong>
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="flex items-center gap-2 sm:self-center">
                                                <span class="px-4 py-1.5 rounded-xl font-mono text-xs font-black bg-black/60 text-white border border-slate-700 shadow-xs">
                                                    {{ $slot['time'] }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- TAB 6: STUDENT PERFORMANCE IN DARK BLUE -->
            <div x-show="activeTab === 'performance'" class="space-y-6">
                <div class="bg-[#081538] rounded-3xl shadow-xl border-2 border-orange-400 p-6 sm:p-8">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 pb-6 border-b-2 border-orange-900/60">
                        <div>
                            <span class="px-3 py-1 rounded-full text-xs font-black bg-orange-500 text-slate-950 uppercase tracking-wider shadow">
                                Academic Mastery Analytics &bull; BIN // PRF
                            </span>
                            <h3 class="text-2xl sm:text-3xl font-black text-white mt-1">Student Performance Insights</h3>
                            <p class="text-sm text-orange-200 font-bold">Comprehensive pass metrics and top academic achievers</p>
                        </div>
                        <span class="inline-flex items-center px-4 py-2 rounded-2xl text-base font-black bg-orange-500 text-slate-950 shadow">
                            Overall Pass Rate: {{ $studentPerformance['pass_rate'] }}%
                        </span>
                    </div>

                    <!-- Top Achievers & Grade Distribution Grid -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">
                        <!-- Top Achievers List -->
                        <div class="p-6 rounded-3xl border-2 border-blue-400 bg-[#07173d]">
                            <h4 class="font-black text-lg text-white mb-4 flex items-center gap-2">
                                <span>🏆</span> Top Academic Achievers (Mathematics)
                            </h4>
                            <div class="space-y-3">
                                @foreach ($studentPerformance['top_achievers'] as $top)
                                    <div class="p-3.5 bg-[#081538] rounded-2xl border border-blue-900 flex items-center justify-between shadow-xs">
                                        <div class="flex items-center gap-3">
                                            <span class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center font-black text-xs">
                                                {{ $loop->iteration }}
                                            </span>
                                            <div>
                                                <p class="font-black text-white text-sm">{{ $top['name'] }}</p>
                                                <p class="text-[11px] font-bold text-slate-400">{{ $top['grade'] }}</p>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <span class="text-lg font-black text-cyan-300 font-mono">{{ $top['score'] }}%</span>
                                            <span class="block text-[10px] font-bold text-emerald-400">{{ $top['distinctions'] }} Distinctions</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Grade Distribution -->
                        <div class="p-6 rounded-3xl border-2 border-orange-400 bg-[#07173d]">
                            <h4 class="font-black text-lg text-white mb-4 flex items-center gap-2">
                                <span>📊</span> Grade Bracket Distribution
                            </h4>
                            <div class="space-y-4">
                                @foreach ($studentPerformance['grade_distribution'] as $b)
                                    <div>
                                        <div class="flex justify-between text-xs font-black text-slate-200 mb-1">
                                            <span>{{ $b['bracket'] }}</span>
                                            <span class="text-cyan-300">{{ $b['count'] }} Learners ({{ $b['percentage'] }}%)</span>
                                        </div>
                                        <div class="w-full bg-slate-800 rounded-full h-3.5 overflow-hidden">
                                            <div class="h-3.5 rounded-full {{ $b['color'] === 'blue' ? 'bg-blue-600' : ($b['color'] === 'orange' ? 'bg-orange-500' : 'bg-red-500') }}"
                                                 style="width: {{ $b['percentage'] }}%"></div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="mt-6 p-4 bg-[#081538] rounded-2xl border border-orange-900/60 text-xs text-orange-200 font-bold">
                                💡 Continuous remediation &amp; peer coaching is provided to support all learners toward achieving Level 5 or higher.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TAB 7: MY PROFILE (COMPLETE EDUCATOR DOSSIER IN DARK BLUE) -->
            <div x-show="activeTab === 'profile'" class="space-y-6">
                <div class="bg-[#081538] rounded-3xl shadow-xl border-2 border-red-500 p-6 sm:p-10">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 pb-6 border-b-2 border-red-900/60">
                        <div>
                            <span class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-black bg-red-600 text-white uppercase tracking-widest shadow">
                                Verified Teacher Dossier &bull; BIN // PROF
                            </span>
                            <h3 class="text-2xl sm:text-4xl font-black text-white mt-2">
                                My Profile (Personal &amp; Professional Info)
                            </h3>
                            <p class="text-sm text-red-200 font-bold mt-1">Official educator records, contact information and employment details</p>
                        </div>

                        <div class="flex items-center gap-3">
                            @if($user->qualifications_document)
                                <a href="{{ route('teacher.qualifications.download', $user) }}"
                                   class="inline-flex items-center px-5 py-2.5 bg-red-600 hover:bg-red-700 text-white text-xs font-black rounded-xl shadow transition transform hover:-translate-y-0.5">
                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    Download Qualifications Document
                                </a>
                            @endif

                            <a href="{{ route('profile.edit') }}"
                               class="inline-flex items-center px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-xs font-black rounded-xl shadow transition">
                                Edit Account
                            </a>
                        </div>
                    </div>

                    <div class="mt-8 space-y-8">
                        <!-- 1. Key Professional Credentials -->
                        <div>
                            <h4 class="text-xs uppercase font-black tracking-widest text-red-300 border-b border-red-900/60 pb-2 mb-4">
                                1. Institutional Identifiers &amp; Teaching Subject
                            </h4>
                            <dl class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 text-sm">
                                <div class="bg-[#07173d] p-4 rounded-2xl border-2 border-red-400">
                                    <dt class="text-xs uppercase font-black text-slate-400">Percel Number</dt>
                                    <dd class="text-xl sm:text-2xl font-black font-mono text-red-400 mt-1">{{ $user->percel_number ?? 'PRCL-101' }}</dd>
                                </div>
                                <div class="bg-[#07173d] p-4 rounded-2xl border-2 border-blue-400">
                                    <dt class="text-xs uppercase font-black text-slate-400">Subject to be Taught</dt>
                                    <dd class="text-xl sm:text-2xl font-black text-cyan-300 mt-1">{{ $user->subject_to_be_taught ?? 'Mathematics' }}</dd>
                                </div>
                                <div class="bg-[#07173d] p-4 rounded-2xl border-2 border-orange-400">
                                    <dt class="text-xs uppercase font-black text-slate-400">School Teaching At</dt>
                                    <dd class="text-lg sm:text-xl font-black text-white mt-1">{{ $user->school ?? 'Oakridge High' }}</dd>
                                </div>
                                <div class="bg-[#07173d] p-4 rounded-2xl border-2 border-red-400">
                                    <dt class="text-xs uppercase font-black text-slate-400">Union Affiliation</dt>
                                    <dd class="text-lg font-black text-red-400 mt-1">SADTU Registered</dd>
                                </div>
                            </dl>
                        </div>

                        <!-- 2. Personal Information -->
                        <div>
                            <h4 class="text-xs uppercase font-black tracking-widest text-red-300 border-b border-red-900/60 pb-2 mb-4">
                                2. Personal Identification Details
                            </h4>
                            <dl class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 text-sm">
                                <div class="bg-[#07173d] p-4 rounded-2xl border border-slate-700">
                                    <dt class="text-xs uppercase font-black text-slate-400">Names &amp; Surname</dt>
                                    <dd class="font-black text-white mt-1 text-base">{{ $user->name }}</dd>
                                </div>
                                <div class="bg-[#07173d] p-4 rounded-2xl border border-slate-700">
                                    <dt class="text-xs uppercase font-black text-slate-400">Date of Birth (DOB)</dt>
                                    <dd class="font-black text-white mt-1">{{ $user->dob ? $user->dob->format('d F Y') : 'N/A' }}</dd>
                                </div>
                                <div class="bg-[#07173d] p-4 rounded-2xl border border-slate-700">
                                    <dt class="text-xs uppercase font-black text-slate-400">Gender</dt>
                                    <dd class="font-black text-white mt-1">{{ $user->gender ?? 'N/A' }}</dd>
                                </div>
                                <div class="bg-[#07173d] p-4 rounded-2xl border border-slate-700">
                                    <dt class="text-xs uppercase font-black text-slate-400">Ethnicity</dt>
                                    <dd class="font-black text-white mt-1">{{ $user->ethnicity ?? 'N/A' }}</dd>
                                </div>
                                <div class="bg-[#07173d] p-4 rounded-2xl border border-slate-700">
                                    <dt class="text-xs uppercase font-black text-slate-400">ID Number</dt>
                                    <dd class="font-mono font-black text-white mt-1">{{ $user->id_number ?: 'N/A' }}</dd>
                                </div>
                                <div class="bg-[#07173d] p-4 rounded-2xl border border-slate-700">
                                    <dt class="text-xs uppercase font-black text-slate-400">Passport Number</dt>
                                    <dd class="font-mono font-black text-white mt-1">{{ $user->passport ?: 'N/A' }}</dd>
                                </div>
                                <div class="bg-[#07173d] p-4 rounded-2xl border border-slate-700">
                                    <dt class="text-xs uppercase font-black text-slate-400">Marital Status</dt>
                                    <dd class="font-black text-white mt-1">{{ $user->marital_status ?? 'Single' }}</dd>
                                </div>
                                <div class="bg-[#07173d] p-4 rounded-2xl border border-slate-700">
                                    <dt class="text-xs uppercase font-black text-slate-400">Qualifications Doc</dt>
                                    <dd class="font-black text-emerald-400 mt-1">
                                        {{ $user->qualifications_document ? 'Verified Document Uploaded' : 'Not Uploaded' }}
                                    </dd>
                                </div>
                            </dl>
                        </div>

                        <!-- 3. Contact Details -->
                        <div>
                            <h4 class="text-xs uppercase font-black tracking-widest text-red-300 border-b border-red-900/60 pb-2 mb-4">
                                3. Contact &amp; Residential Information
                            </h4>
                            <dl class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-sm">
                                <div class="bg-[#07173d] p-4 rounded-2xl border border-slate-700">
                                    <dt class="text-xs uppercase font-black text-slate-400">Email Address</dt>
                                    <dd class="font-black text-white mt-1 break-all">{{ $user->email }}</dd>
                                </div>
                                <div class="bg-[#07173d] p-4 rounded-2xl border border-slate-700">
                                    <dt class="text-xs uppercase font-black text-slate-400">Contact #</dt>
                                    <dd class="font-mono font-black text-white mt-1">{{ $user->contact_number ?? 'N/A' }}</dd>
                                </div>
                                <div class="bg-[#07173d] p-4 rounded-2xl border border-slate-700">
                                    <dt class="text-xs uppercase font-black text-slate-400">School Teaching At</dt>
                                    <dd class="font-black text-white mt-1">{{ $user->school ?? 'Oakridge High' }}</dd>
                                </div>
                                <div class="bg-[#07173d] p-4 rounded-2xl border border-slate-700 sm:col-span-3">
                                    <dt class="text-xs uppercase font-black text-slate-400">Physical Address</dt>
                                    <dd class="font-bold text-slate-200 mt-1">{{ $user->address ?? 'N/A' }}</dd>
                                </div>
                            </dl>
                        </div>

                        <!-- 4. Next of Kin -->
                        <div>
                            <h4 class="text-xs uppercase font-black tracking-widest text-red-300 border-b border-red-900/60 pb-2 mb-4">
                                4. Next of Kin Contact Details
                            </h4>
                            <dl class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-sm">
                                <div class="bg-[#07173d] p-4 rounded-2xl border border-slate-700">
                                    <dt class="text-xs uppercase font-black text-slate-400">Next of Kin Names</dt>
                                    <dd class="font-black text-white mt-1 text-base">{{ $user->next_of_kin_name ?? 'N/A' }}</dd>
                                </div>
                                <div class="bg-[#07173d] p-4 rounded-2xl border border-slate-700">
                                    <dt class="text-xs uppercase font-black text-slate-400">Relationship to Next of Kin</dt>
                                    <dd class="font-black text-white mt-1 text-base">{{ $user->next_of_kin_relationship ?? 'N/A' }}</dd>
                                </div>
                                <div class="bg-[#07173d] p-4 rounded-2xl border border-slate-700">
                                    <dt class="text-xs uppercase font-black text-slate-400">Contact of Next of Kin</dt>
                                    <dd class="font-mono font-black text-white mt-1 text-base">{{ $user->next_of_kin_contact ?? 'N/A' }}</dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 4. BOTTOM LOG OUT BANNER (PROMINENT, BOLD & DARK BLUE/RED/ORANGE) -->
            <div class="bg-gradient-to-r from-[#081538] via-[#0d225c] to-red-950 rounded-3xl p-6 sm:p-8 text-white shadow-2xl border-4 border-orange-500 flex flex-col sm:flex-row justify-between items-center gap-6">
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 rounded-2xl bg-red-600 border-2 border-yellow-300 text-white flex items-center justify-center text-2xl font-black shadow-xl">
                        SADTU
                    </div>
                    <div>
                        <h4 class="text-xl font-black text-white">Finished Your Teaching Session, Teacher {{ $user->name }}?</h4>
                        <p class="text-xs sm:text-sm text-cyan-200 font-bold">Always log out safely from classroom terminals to protect student marks and records.</p>
                    </div>
                </div>

                <div class="flex items-center gap-3 w-full sm:w-auto">
                    <a href="{{ route('profile.edit') }}"
                       class="px-5 py-3 rounded-xl border-2 border-orange-400 text-white font-black text-sm hover:bg-orange-500/20 transition text-center w-full sm:w-auto">
                        Edit Profile
                    </a>

                    <!-- Prominent & Bold Bottom Logout -->
                    <form method="POST" action="{{ route('logout') }}" class="w-full sm:w-auto">
                        @csrf
                        <button type="submit"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                                class="inline-flex items-center justify-center px-8 py-3.5 bg-red-600 hover:bg-red-700 active:bg-red-800 text-white font-black text-sm tracking-wider rounded-xl shadow-2xl transition border-2 border-red-400 w-full sm:w-auto transform hover:-translate-y-0.5 focus:outline-none focus:ring-4 focus:ring-red-400">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Log Out of Teacher Account
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
