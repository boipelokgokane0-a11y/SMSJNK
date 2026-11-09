<x-app-layout>
    <x-slot name="header">
        <!-- Bold Blue & Light Blue Header Bar -->
        <div class="bg-[#081538] px-4 sm:px-6 lg:px-8 py-6">
            <div class="max-w-7xl mx-auto flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div>
                    <div class="flex flex-wrap items-center gap-2">
                        <span class="inline-flex items-center px-3.5 py-1 rounded-full text-xs font-black bg-blue-900 text-sky-300 border border-sky-400/50 shadow-sm">
                            J & K Designs Academy
                        </span>
                        <!-- Account status in bold bright colour -->
                        <span class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full text-xs font-black bg-emerald-950 text-emerald-400 border-2 border-emerald-400 shadow-md">
                            <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 animate-ping"></span>
                            ACCOUNT STATUS: {{ strtoupper($user->account_status) }}
                        </span>
                    </div>
                    <h2 class="font-black text-2xl sm:text-3xl text-white leading-tight mt-2">
                        Student Welcome Dashboard
                    </h2>
                    <p class="text-sm text-sky-200 mt-1">
                        Welcome, <strong class="text-white font-black">{{ $user->name }}</strong> &bull; Student No:
                        <span class="text-2xl sm:text-3xl font-black font-mono text-cyan-300 bg-blue-950/90 px-3 py-0.5 rounded-xl border-2 border-sky-400 shadow-inner">
                            {{ $user->student_number }}
                        </span>
                    </p>
                </div>

                <!-- Header Prominent & Bold Logout Button (Never forgotten) -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            onclick="event.preventDefault(); this.closest('form').submit();"
                            class="inline-flex items-center px-6 py-3 bg-red-600 hover:bg-red-700 active:bg-red-800 text-white font-black text-sm tracking-wider rounded-xl shadow-xl hover:shadow-red-500/40 transition transform hover:-translate-y-0.5 border-2 border-red-400 focus:outline-none focus:ring-4 focus:ring-red-400">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        LOG OUT
                    </button>
                </form>
            </div>
        </div>
    </x-slot>

    <!-- Bold Blue and Light Blue Student Dashboard Canvas -->
    <div class="bg-[#0b1d4d] min-h-screen py-8 text-slate-100"
         x-data="{
            activeTab: 'overview',
            theme: localStorage.getItem('student_theme') || 'darkblue',
            setTheme(t) {
                this.theme = t;
                localStorage.setItem('student_theme', t);
            },
            themeGradients: {
                'darkblue': 'from-[#0d2259] via-[#123180] to-[#0a1b47]',
                'cyan': 'from-[#082b4a] via-[#0f4675] to-[#072138]',
                'purple': 'from-[#1e1347] via-[#2f1c6d] to-[#120a2e]',
                'emerald': 'from-[#09332c] via-[#105448] to-[#05211c]',
                'amber': 'from-[#38200a] via-[#5c320d] to-[#241304]'
            },
            countdown: { days: 8, hours: 20, minutes: 48, seconds: 12 },
            initCountdown() {
                const target = new Date('2026-11-18T09:00:00').getTime();
                setInterval(() => {
                    const now = new Date().getTime();
                    const diff = target - now;
                    if (diff > 0) {
                        this.countdown.days = Math.floor(diff / (1000 * 60 * 60 * 24));
                        this.countdown.hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        this.countdown.minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                        this.countdown.seconds = Math.floor((diff % (1000 * 60)) / 1000);
                    }
                }, 1000);
            }
         }"
         x-init="initCountdown()">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            <!-- Flash Success Alert (from Request Desk) -->
            @if (session('request_success'))
                <div class="bg-gradient-to-r from-emerald-600 via-teal-600 to-emerald-700 text-white rounded-2xl p-5 shadow-2xl flex items-start gap-4 border-2 border-emerald-300">
                    <span class="p-2.5 bg-white/20 rounded-xl text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                        </svg>
                    </span>
                    <div>
                        <h4 class="font-black text-lg">Official Request Registered!</h4>
                        <p class="text-sm text-emerald-100 mt-0.5">{{ session('request_success') }}</p>
                    </div>
                </div>
            @endif

            <!-- 1. HERO BANNER IN BOLD BLUE & LIGHT BLUE -->
            <div :class="'bg-gradient-to-r ' + themeGradients[theme]"
                 class="rounded-3xl shadow-2xl p-6 sm:p-8 text-white relative overflow-hidden transition-all duration-500 border-2 border-sky-400/40">

                <div class="absolute -right-8 -bottom-8 opacity-10 pointer-events-none">
                    <svg class="w-80 h-80 text-sky-400" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 3L1 9l11 6 9-4.91V17h2V9L12 3zM3.45 9L12 4.33 20.55 9 12 13.67 3.45 9zM5 13.18v4L12 21l7-3.82v-4L12 17l-7-3.82z" />
                    </svg>
                </div>

                <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-6 relative z-10">
                    <div class="space-y-3">
                        <div class="flex flex-wrap items-center gap-2">
                            <span class="inline-block px-3.5 py-1 bg-sky-500/20 text-cyan-300 text-xs font-black rounded-full uppercase tracking-wider border border-sky-400/50">
                                Official Academy Portal
                            </span>

                            <!-- Option to Change Color (Color Palette Switcher) -->
                            <div class="inline-flex items-center gap-1.5 px-3.5 py-1 bg-black/40 backdrop-blur-md rounded-full border border-sky-400/30 text-xs">
                                <span class="font-bold text-sky-200 mr-1">Dashboard Theme:</span>
                                <button type="button" @click="setTheme('darkblue')" title="Bold Blue (Default)"
                                        :class="theme === 'darkblue' ? 'ring-2 ring-cyan-300 scale-110' : 'opacity-70 hover:opacity-100'"
                                        class="w-4 h-4 rounded-full bg-blue-600 transition shadow"></button>
                                <button type="button" @click="setTheme('cyan')" title="Electric Cyan"
                                        :class="theme === 'cyan' ? 'ring-2 ring-cyan-300 scale-110' : 'opacity-70 hover:opacity-100'"
                                        class="w-4 h-4 rounded-full bg-cyan-400 transition shadow"></button>
                                <button type="button" @click="setTheme('purple')" title="Royal Purple"
                                        :class="theme === 'purple' ? 'ring-2 ring-purple-300 scale-110' : 'opacity-70 hover:opacity-100'"
                                        class="w-4 h-4 rounded-full bg-purple-600 transition shadow"></button>
                                <button type="button" @click="setTheme('emerald')" title="Emerald Academy"
                                        :class="theme === 'emerald' ? 'ring-2 ring-emerald-300 scale-110' : 'opacity-70 hover:opacity-100'"
                                        class="w-4 h-4 rounded-full bg-emerald-500 transition shadow"></button>
                                <button type="button" @click="setTheme('amber')" title="Sunset Amber"
                                        :class="theme === 'amber' ? 'ring-2 ring-amber-300 scale-110' : 'opacity-70 hover:opacity-100'"
                                        class="w-4 h-4 rounded-full bg-amber-500 transition shadow"></button>
                            </div>
                        </div>

                        <h1 class="text-3xl sm:text-5xl font-black tracking-tight text-white drop-shadow">
                            Welcome, {{ $user->name }}!
                        </h1>
                        <p class="text-blue-100 max-w-2xl text-sm sm:text-base leading-relaxed">
                            Academic Journey &bull; Enrolled in <strong class="underline decoration-cyan-400 font-black text-white">{{ $user->grade ?? 'Grade 10' }}</strong> &bull; Class: <strong class="underline decoration-cyan-400 font-black text-white">{{ $user->class_allocation }}</strong> at <strong class="underline decoration-cyan-400 font-black text-white">{{ $user->school ?? 'J & K Designs Academy' }}</strong>.
                        </p>
                    </div>

                    <!-- Header Actions & Bold Logout Button -->
                    <div class="flex flex-wrap sm:flex-nowrap items-center gap-3 w-full sm:w-auto">
                        <button type="button" @click="activeTab = 'request'"
                                class="inline-flex items-center justify-center px-5 py-3 bg-amber-400 hover:bg-amber-300 text-slate-950 font-black text-sm rounded-xl shadow-lg transition w-full sm:w-auto transform hover:-translate-y-0.5">
                            <svg class="w-5 h-5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
                            </svg>
                            Submit Request
                        </button>

                        <form method="POST" action="{{ route('logout') }}" class="w-full sm:w-auto">
                            @csrf
                            <button type="submit"
                                    class="inline-flex items-center justify-center px-6 py-3 bg-red-600 hover:bg-red-700 active:bg-red-800 text-white font-black text-sm tracking-wider rounded-xl shadow-xl transition w-full sm:w-auto border-2 border-red-400 transform hover:-translate-y-0.5">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                LOG OUT
                            </button>
                        </form>
                    </div>
                </div>

                <!-- 4 CORE STUDENT IDENTIFIERS (BIG, BOLD & BRIGHT IN BLUE & LIGHT BLUE) -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mt-8 pt-6 border-t-2 border-sky-400/30 relative z-10">
                    <!-- 1. Student No (Big and Able to Read) -->
                    <div class="bg-[#08173d]/90 backdrop-blur-md rounded-2xl p-5 border-2 border-sky-400 shadow-xl">
                        <div class="flex items-center justify-between">
                            <p class="text-xs uppercase font-black tracking-wider text-sky-300">Student Number</p>
                            <span class="text-xs px-2 py-0.5 rounded bg-sky-500/20 text-cyan-300 font-mono font-bold border border-sky-400/40">ID CARD</span>
                        </div>
                        <p class="text-3xl sm:text-4xl lg:text-5xl font-black font-mono text-cyan-300 mt-2 tracking-wider drop-shadow-md">
                            {{ $user->student_number }}
                        </p>
                        <span class="inline-block text-xs font-bold text-sky-200 mt-1">Official Academy Matriculation</span>
                    </div>

                    <!-- 2. Class Allocation (Big and Bold Letters) -->
                    <div class="bg-[#08173d]/90 backdrop-blur-md rounded-2xl p-5 border-2 border-sky-400/50 shadow-xl">
                        <div class="flex items-center justify-between">
                            <p class="text-xs uppercase font-black tracking-wider text-sky-300">Class Allocation</p>
                            <span class="text-xs px-2 py-0.5 rounded bg-blue-900/60 text-sky-200 font-bold border border-blue-400/40">SECTION</span>
                        </div>
                        <p class="text-2xl sm:text-3xl lg:text-4xl font-black uppercase tracking-wide text-white mt-2 drop-shadow-md">
                            {{ $user->class_allocation }}
                        </p>
                        <span class="inline-block text-xs font-bold text-sky-200 mt-1">Homeroom &amp; Group Allocation</span>
                    </div>

                    <!-- 3. Account Status (Bold & Bright Green Colour) -->
                    <div class="bg-[#08173d]/90 backdrop-blur-md rounded-2xl p-5 border-2 border-emerald-400 shadow-xl">
                        <div class="flex items-center justify-between">
                            <p class="text-xs uppercase font-black tracking-wider text-emerald-300">Account Status</p>
                            <span class="w-3 h-3 rounded-full bg-emerald-400 animate-ping"></span>
                        </div>
                        <div class="flex items-center gap-2 mt-2">
                            <p class="text-2xl sm:text-3xl lg:text-4xl font-black text-emerald-400 drop-shadow-md">
                                {{ strtoupper($user->account_status) }}
                            </p>
                        </div>
                        <span class="inline-block text-xs font-bold text-emerald-300 mt-1">&check; Verified &amp; Active Enrollment</span>
                    </div>

                    <!-- 4. Academic Year (Bold & Bright Colour) -->
                    <div class="bg-[#08173d]/90 backdrop-blur-md rounded-2xl p-5 border-2 border-amber-400/70 shadow-xl">
                        <div class="flex items-center justify-between">
                            <p class="text-xs uppercase font-black tracking-wider text-amber-300">Academic Year</p>
                            <span class="text-xs px-2 py-0.5 rounded bg-amber-950 text-amber-300 font-bold border border-amber-400/40">SESSION</span>
                        </div>
                        <p class="text-2xl sm:text-3xl lg:text-4xl font-black text-amber-300 mt-2 drop-shadow-md">
                            {{ $user->academic_year }}
                        </p>
                        <span class="inline-block text-xs font-bold text-amber-200 mt-1">Full Academic Term Cycle</span>
                    </div>
                </div>
            </div>

            <!-- 2. UPCOMING EXAMS BRIGHT BANNER & REMINDERS ON DASHBOARD -->
            <div class="bg-gradient-to-r from-red-600 via-rose-600 to-amber-500 rounded-3xl shadow-2xl p-5 sm:p-7 text-white border-2 border-amber-300 relative overflow-hidden">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-5">
                    <div class="flex items-start sm:items-center gap-4">
                        <div class="p-3 bg-white/20 rounded-2xl text-white backdrop-blur-sm animate-pulse shadow-md">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <div class="flex flex-wrap items-center gap-2">
                                <span class="px-3 py-0.5 rounded-full bg-black/40 text-amber-200 text-xs font-black uppercase tracking-wider border border-amber-300/40">
                                    ⚡ Examination Alert &bull; Live Reminder
                                </span>
                                <span class="px-2.5 py-0.5 rounded-full bg-yellow-400 text-slate-950 text-[11px] font-black uppercase">
                                    Mandatory
                                </span>
                            </div>
                            <h3 class="text-xl sm:text-2xl font-black mt-1">
                                {{ $upcomingExams[0]['subject'] }}: {{ $upcomingExams[0]['paper'] }}
                            </h3>
                            <p class="text-xs sm:text-sm text-yellow-100 font-semibold mt-0.5">
                                Date: <strong class="text-white">{{ $upcomingExams[0]['date'] }}</strong> ({{ $upcomingExams[0]['time'] }}) &bull; Venue: <strong class="text-white">{{ $upcomingExams[0]['venue'] }}</strong> &bull; Allocated Seat: <strong class="text-yellow-200 font-mono font-black text-sm">{{ $upcomingExams[0]['seat'] }}</strong>
                            </p>
                        </div>
                    </div>

                    <!-- Countdown Live Reminder Boxes in Bright Amber / Yellow -->
                    <div class="flex items-center gap-2 sm:gap-3 bg-black/60 backdrop-blur-md px-5 py-3 rounded-2xl border-2 border-yellow-300 self-stretch md:self-auto justify-center shadow-2xl">
                        <div class="text-center">
                            <span class="block text-2xl sm:text-3xl font-black text-yellow-300 font-mono" x-text="countdown.days">8</span>
                            <span class="text-[10px] font-black uppercase tracking-wider text-slate-200">Days</span>
                        </div>
                        <span class="text-xl font-black text-yellow-300">:</span>
                        <div class="text-center">
                            <span class="block text-2xl sm:text-3xl font-black text-yellow-300 font-mono" x-text="countdown.hours">20</span>
                            <span class="text-[10px] font-black uppercase tracking-wider text-slate-200">Hours</span>
                        </div>
                        <span class="text-xl font-black text-yellow-300">:</span>
                        <div class="text-center">
                            <span class="block text-2xl sm:text-3xl font-black text-yellow-300 font-mono" x-text="countdown.minutes">48</span>
                            <span class="text-[10px] font-black uppercase tracking-wider text-slate-200">Mins</span>
                        </div>
                        <span class="text-xl font-black text-yellow-300">:</span>
                        <div class="text-center">
                            <span class="block text-2xl sm:text-3xl font-black text-yellow-300 font-mono" x-text="countdown.seconds">12</span>
                            <span class="text-[10px] font-black uppercase tracking-wider text-slate-200">Secs</span>
                        </div>
                    </div>
                </div>

                <!-- Exam reminder note on dashboard -->
                <div class="mt-4 pt-3 border-t border-white/20 flex flex-wrap items-center justify-between text-xs text-yellow-100 font-bold gap-2">
                    <span>🔔 REMINDER: Bring your Student ID card & matriculation ticket. Arrive 30 minutes early.</span>
                    <button type="button" @click="activeTab = 'exams'" class="underline text-white font-black hover:text-yellow-200">
                        View Full Exam Schedule &rarr;
                    </button>
                </div>
            </div>

            <!-- 3. NAVIGATION TABS IN BOLD BLUE & LIGHT BLUE -->
            <div class="bg-[#0f286b] rounded-2xl shadow-xl border-2 border-sky-400/40 p-2 overflow-x-auto">
                <nav class="flex space-x-2 min-w-max" aria-label="Student Sections">
                    <button @click="activeTab = 'overview'"
                            :class="activeTab === 'overview' ? 'bg-sky-400 text-slate-950 font-black shadow-lg' : 'text-sky-200 hover:text-white hover:bg-blue-900/60 font-bold'"
                            class="px-4 py-2.5 rounded-xl text-sm transition flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Dashboard Overview
                    </button>

                    <!-- Bold Profile Tab -->
                    <button @click="activeTab = 'profile'"
                            :class="activeTab === 'profile' ? 'bg-sky-400 text-slate-950 font-black shadow-lg' : 'text-sky-200 hover:text-white hover:bg-blue-900/60 font-bold'"
                            class="px-4 py-2.5 rounded-xl text-sm transition flex items-center gap-2 border border-sky-400/40">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        My Profile (Personal Information)
                    </button>

                    <!-- Listed Subjects Tab (No pictures) -->
                    <button @click="activeTab = 'subjects'"
                            :class="activeTab === 'subjects' ? 'bg-sky-400 text-slate-950 font-black shadow-lg' : 'text-sky-200 hover:text-white hover:bg-blue-900/60 font-bold'"
                            class="px-4 py-2.5 rounded-xl text-sm transition flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                        My Enrolled Subjects ({{ count($subjects) }})
                    </button>

                    <!-- Fun Pink and Green Timetable Tab -->
                    <button @click="activeTab = 'timetable'"
                            :class="activeTab === 'timetable' ? 'bg-gradient-to-r from-pink-500 to-emerald-400 text-slate-950 font-black shadow-lg' : 'text-pink-300 hover:text-white hover:bg-pink-950/40 font-bold'"
                            class="px-4 py-2.5 rounded-xl text-sm transition flex items-center gap-2 border border-pink-400/40">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Weekly Timetable (Pink &amp; Green)
                    </button>

                    <!-- Inviting School Announcements Tab -->
                    <button @click="activeTab = 'announcements'"
                            :class="activeTab === 'announcements' ? 'bg-sky-400 text-slate-950 font-black shadow-lg' : 'text-sky-200 hover:text-white hover:bg-blue-900/60 font-bold'"
                            class="px-4 py-2.5 rounded-xl text-sm transition flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                        School Announcements
                    </button>

                    <!-- Bright Upcoming Exams Tab -->
                    <button @click="activeTab = 'exams'"
                            :class="activeTab === 'exams' ? 'bg-amber-400 text-slate-950 font-black shadow-lg' : 'text-amber-300 hover:bg-amber-950/60 font-bold'"
                            class="px-4 py-2.5 rounded-xl text-sm transition flex items-center gap-2 border border-amber-400/40">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                        Upcoming Exams ({{ count($upcomingExams) }})
                    </button>

                    <!-- Bold Attendance Records Tab -->
                    <button @click="activeTab = 'attendance'"
                            :class="activeTab === 'attendance' ? 'bg-emerald-400 text-slate-950 font-black shadow-lg' : 'text-emerald-300 hover:bg-emerald-950/60 font-bold'"
                            class="px-4 py-2.5 rounded-xl text-sm transition flex items-center gap-2 border border-emerald-400/40">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Attendance Records ({{ $attendance['rate'] }}%)
                    </button>

                    <!-- Student Request Desk Tab -->
                    <button @click="activeTab = 'request'"
                            :class="activeTab === 'request' ? 'bg-amber-400 text-slate-950 shadow-lg font-black' : 'text-amber-300 hover:bg-amber-950/60 font-bold'"
                            class="px-4 py-2.5 rounded-xl text-sm transition flex items-center gap-2 border border-amber-400/40">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                        </svg>
                        Request Form (Desk)
                    </button>
                </nav>
            </div>

            <!-- TAB 1: OVERVIEW IN BOLD BLUE & LIGHT BLUE -->
            <div x-show="activeTab === 'overview'" class="space-y-6">
                <!-- BOLD ATTENDANCE & PERFORMANCE SUMMARY (BLUE CARDS WITH LIGHT BLUE ACCENTS) -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                    <div class="bg-[#0f286b] rounded-2xl shadow-xl border-2 border-sky-400/40 p-5">
                        <div class="flex items-center justify-between">
                            <p class="text-xs uppercase font-black text-sky-200 tracking-wider">Attendance Rate</p>
                            <span class="p-2 rounded-xl bg-emerald-950 text-emerald-400 border border-emerald-400 font-black">
                                &check;
                            </span>
                        </div>
                        <p class="text-5xl font-black text-emerald-400 mt-2">{{ $attendance['rate'] }}%</p>
                        <p class="text-xs font-black text-emerald-300 mt-1 uppercase tracking-wide">
                            {{ $attendance['standing'] }}
                        </p>
                    </div>

                    <div class="bg-[#0f286b] rounded-2xl shadow-xl border-2 border-sky-400/40 p-5">
                        <div class="flex items-center justify-between">
                            <p class="text-xs uppercase font-black text-sky-200 tracking-wider">My Subjects</p>
                            <span class="p-2 rounded-xl bg-blue-950 text-cyan-300 border border-sky-400/50 font-black">
                                📚
                            </span>
                        </div>
                        <p class="text-5xl font-black text-cyan-300 mt-2">{{ count($subjects) }}</p>
                        <p class="text-xs font-bold text-sky-200 mt-1 uppercase tracking-wide">
                            Listed Disciplines
                        </p>
                    </div>

                    <div class="bg-[#0f286b] rounded-2xl shadow-xl border-2 border-sky-400/40 p-5">
                        <div class="flex items-center justify-between">
                            <p class="text-xs uppercase font-black text-sky-200 tracking-wider">Next Examination</p>
                            <span class="p-2 rounded-xl bg-red-950 text-red-400 border border-red-500/50 font-black">
                                📝
                            </span>
                        </div>
                        <p class="text-xl font-black text-white mt-2 truncate">{{ $upcomingExams[0]['subject'] }}</p>
                        <p class="text-xs font-bold text-amber-300 mt-1 uppercase tracking-wide">
                            {{ $upcomingExams[0]['date'] }} &bull; {{ $upcomingExams[0]['time'] }}
                        </p>
                    </div>

                    <div class="bg-[#0f286b] rounded-2xl shadow-xl border-2 border-sky-400/40 p-5">
                        <div class="flex items-center justify-between">
                            <p class="text-xs uppercase font-black text-sky-200 tracking-wider">Account Standing</p>
                            <span class="p-2 rounded-xl bg-emerald-950 text-emerald-400 border border-emerald-400 font-black">
                                🟢
                            </span>
                        </div>
                        <p class="text-3xl sm:text-4xl font-black text-emerald-400 mt-2">{{ strtoupper($user->account_status) }}</p>
                        <p class="text-xs font-bold text-sky-200 mt-1 uppercase tracking-wide">
                            Academic Year {{ $user->academic_year }}
                        </p>
                    </div>
                </div>

                <!-- Inviting Announcements Preview & Clean Subject Listing (NO PICTURES) -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Inviting Announcements Preview -->
                    <div class="lg:col-span-2 bg-[#0f286b] rounded-3xl shadow-xl border-2 border-sky-400/40 p-6 sm:p-7">
                        <div class="flex justify-between items-center pb-4 border-b-2 border-sky-400/20">
                            <div>
                                <h3 class="text-xl font-black text-white flex items-center gap-2">
                                    <span>📣</span>
                                    <span>School Announcements</span>
                                </h3>
                                <p class="text-xs text-sky-200 mt-0.5">Stay inspired and in the know with campus news and bulletins</p>
                            </div>
                            <button @click="activeTab = 'announcements'" class="text-xs font-black text-cyan-300 hover:text-white uppercase tracking-wider bg-blue-950 px-3 py-1.5 rounded-xl border border-sky-400/40">
                                View All &rarr;
                            </button>
                        </div>

                        <div class="mt-5 space-y-4">
                            @foreach (array_slice($announcements, 0, 3) as $announcement)
                                <div class="p-4 sm:p-5 rounded-2xl border-2 {{ $announcement['urgent'] ? 'border-red-400 bg-red-950/40' : 'border-sky-400/30 bg-[#0a1b47]' }} hover:border-sky-300 transition shadow">
                                    <div class="flex flex-wrap items-center justify-between gap-2 mb-2">
                                        <div class="flex items-center gap-2">
                                            @if ($announcement['urgent'])
                                                <span class="px-2.5 py-0.5 rounded-full text-xs font-black bg-red-600 text-white uppercase tracking-wider shadow">
                                                    ⚡ High Priority
                                                </span>
                                            @endif
                                            <span class="text-xs font-bold px-3 py-0.5 rounded-full bg-blue-900 text-sky-200 border border-sky-400/40">
                                                {{ $announcement['category'] }}
                                            </span>
                                        </div>
                                        <span class="text-xs font-bold text-sky-300">{{ $announcement['date'] }}</span>
                                    </div>
                                    <h4 class="font-black text-white text-base sm:text-lg">{{ $announcement['title'] }}</h4>
                                    <p class="text-xs sm:text-sm text-blue-100 mt-1 leading-relaxed">{{ $announcement['content'] }}</p>
                                    <p class="text-[11px] font-bold text-sky-300 mt-2">Issued by: {{ $announcement['author'] }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Clean Subject List Preview (NO PICTURES) -->
                    <div class="bg-[#0f286b] rounded-3xl shadow-xl border-2 border-sky-400/40 p-6 sm:p-7 space-y-4">
                        <div class="flex justify-between items-center pb-4 border-b-2 border-sky-400/20">
                            <div>
                                <h3 class="text-xl font-black text-white">Enrolled Subjects</h3>
                                <p class="text-xs text-sky-200">Listed Academic Courses</p>
                            </div>
                            <button @click="activeTab = 'subjects'" class="text-xs font-black text-cyan-300 hover:text-white uppercase tracking-wider bg-blue-950 px-3 py-1.5 rounded-xl border border-sky-400/40">
                                All ({{ count($subjects) }}) &rarr;
                            </button>
                        </div>

                        <!-- Listed subjects without pictures -->
                        <div class="space-y-3">
                            @foreach (array_slice($subjects, 0, 4) as $subj)
                                <div class="p-3.5 rounded-2xl border-2 border-sky-400/30 bg-[#0a1b47] hover:border-sky-300 transition">
                                    <div class="flex items-center justify-between">
                                        <span class="px-2.5 py-0.5 rounded-lg text-xs font-black font-mono bg-blue-950 text-cyan-300 border border-sky-400/40">
                                            {{ $subj['code'] }}
                                        </span>
                                        <span class="text-xs font-bold text-sky-300">{{ $subj['room'] }}</span>
                                    </div>
                                    <h4 class="font-black text-white text-sm mt-1.5">{{ $subj['name'] }}</h4>
                                    <div class="flex items-center justify-between text-xs text-sky-200 mt-1 font-semibold">
                                        <span>{{ $subj['teacher'] }}</span>
                                        <span class="text-[11px] text-amber-300">{{ $subj['periods_per_week'] }} Periods/wk</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- TAB 2: MY PROFILE (BOLD & FULLY READABLE) -->
            <div x-show="activeTab === 'profile'" class="space-y-6">
                <div class="bg-[#0f286b] text-white rounded-3xl shadow-2xl p-6 sm:p-10 border-2 border-sky-400 relative overflow-hidden">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 pb-6 border-b-2 border-sky-400/30">
                        <div>
                            <span class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-black bg-blue-900 text-sky-300 border border-sky-400 uppercase tracking-widest shadow">
                                Verified Student Profile
                            </span>
                            <h3 class="text-2xl sm:text-4xl font-black text-white mt-2 tracking-tight">
                                My Profile (Personal Information)
                            </h3>
                            <p class="text-sm text-sky-200 mt-1 font-bold">Registered student dossier, personal identification and emergency records</p>
                        </div>

                        <a href="{{ route('profile.edit') }}"
                           class="inline-flex items-center px-6 py-3 bg-sky-400 hover:bg-sky-300 text-slate-950 text-sm font-black rounded-xl shadow-lg transition transform hover:-translate-y-0.5">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Edit Account Information
                        </a>
                    </div>

                    <div class="mt-8 space-y-8">
                        <!-- 1. Academic Identification -->
                        <div>
                            <h4 class="text-xs uppercase font-black tracking-widest text-sky-300 border-b border-sky-400/30 pb-2 mb-4">
                                1. Academic Credentials &amp; Identifiers
                            </h4>
                            <dl class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 text-sm">
                                <div class="bg-[#0a1b47] p-5 rounded-2xl border-2 border-sky-400 shadow">
                                    <dt class="text-xs uppercase font-black text-sky-300">Student Number</dt>
                                    <dd class="text-2xl sm:text-3xl font-black font-mono text-cyan-300 mt-1.5">{{ $user->student_number }}</dd>
                                </div>
                                <div class="bg-[#0a1b47] p-5 rounded-2xl border-2 border-sky-400/60 shadow">
                                    <dt class="text-xs uppercase font-black text-sky-300">Class Allocation</dt>
                                    <dd class="text-xl sm:text-2xl font-black text-white mt-1.5">{{ $user->class_allocation }}</dd>
                                </div>
                                <div class="bg-[#0a1b47] p-5 rounded-2xl border-2 border-emerald-400 shadow">
                                    <dt class="text-xs uppercase font-black text-emerald-300">Account Status</dt>
                                    <dd class="mt-1.5">
                                        <span class="inline-flex items-center px-3.5 py-1 rounded-full text-xs font-black bg-emerald-500 text-slate-950 shadow">
                                            &bull; {{ strtoupper($user->account_status) }}
                                        </span>
                                    </dd>
                                </div>
                                <div class="bg-[#0a1b47] p-5 rounded-2xl border-2 border-amber-400 shadow">
                                    <dt class="text-xs uppercase font-black text-amber-300">Academic Year</dt>
                                    <dd class="text-2xl sm:text-3xl font-black text-amber-300 mt-1.5">{{ $user->academic_year }}</dd>
                                </div>
                            </dl>
                        </div>

                        <!-- 2. Personal Details (Bold) -->
                        <div>
                            <h4 class="text-xs uppercase font-black tracking-widest text-sky-300 border-b border-sky-400/30 pb-2 mb-4">
                                2. Personal Identification Details
                            </h4>
                            <dl class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 text-sm">
                                <div class="bg-[#0a1b47] p-4 rounded-2xl border-2 border-sky-400/40">
                                    <dt class="text-xs uppercase font-black text-sky-300">Names &amp; Surname</dt>
                                    <dd class="font-black text-white mt-1 text-base">{{ $user->name }}</dd>
                                </div>
                                <div class="bg-[#0a1b47] p-4 rounded-2xl border-2 border-sky-400/40">
                                    <dt class="text-xs uppercase font-black text-sky-300">Date of Birth (DOB)</dt>
                                    <dd class="font-black text-white mt-1">{{ $user->dob ? $user->dob->format('d F Y') : 'Not specified' }}</dd>
                                </div>
                                <div class="bg-[#0a1b47] p-4 rounded-2xl border-2 border-sky-400/40">
                                    <dt class="text-xs uppercase font-black text-sky-300">Gender</dt>
                                    <dd class="font-black text-white mt-1">{{ $user->gender ?? 'Not specified' }}</dd>
                                </div>
                                <div class="bg-[#0a1b47] p-4 rounded-2xl border-2 border-sky-400/40">
                                    <dt class="text-xs uppercase font-black text-sky-300">Ethnicity</dt>
                                    <dd class="font-black text-white mt-1">{{ $user->ethnicity ?? 'Not specified' }}</dd>
                                </div>
                                <div class="bg-[#0a1b47] p-4 rounded-2xl border-2 border-sky-400/40">
                                    <dt class="text-xs uppercase font-black text-sky-300">ID Number</dt>
                                    <dd class="font-mono font-black text-white mt-1">{{ $user->id_number ?: 'Not specified' }}</dd>
                                </div>
                                <div class="bg-[#0a1b47] p-4 rounded-2xl border-2 border-sky-400/40">
                                    <dt class="text-xs uppercase font-black text-sky-300">Passport Number</dt>
                                    <dd class="font-mono font-black text-white mt-1">{{ $user->passport ?: 'Not specified' }}</dd>
                                </div>
                                <div class="bg-[#0a1b47] p-4 rounded-2xl border-2 border-sky-400/40">
                                    <dt class="text-xs uppercase font-black text-sky-300">Marital Status</dt>
                                    <dd class="font-black text-white mt-1">{{ $user->marital_status ?? 'Single' }}</dd>
                                </div>
                                <div class="bg-[#0a1b47] p-4 rounded-2xl border-2 border-sky-400/40">
                                    <dt class="text-xs uppercase font-black text-sky-300">Grade Level</dt>
                                    <dd class="font-black text-amber-300 mt-1 text-base">{{ $user->grade ?? 'Grade 10' }}</dd>
                                </div>
                            </dl>
                        </div>

                        <!-- 3. Contact Details (Bold) -->
                        <div>
                            <h4 class="text-xs uppercase font-black tracking-widest text-sky-300 border-b border-sky-400/30 pb-2 mb-4">
                                3. Contact &amp; Residential Information
                            </h4>
                            <dl class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-sm">
                                <div class="bg-[#0a1b47] p-4 rounded-2xl border-2 border-sky-400/40">
                                    <dt class="text-xs uppercase font-black text-sky-300">Email Address</dt>
                                    <dd class="font-black text-white mt-1 break-all">{{ $user->email }}</dd>
                                </div>
                                <div class="bg-[#0a1b47] p-4 rounded-2xl border-2 border-sky-400/40">
                                    <dt class="text-xs uppercase font-black text-sky-300">Student Contact #</dt>
                                    <dd class="font-mono font-black text-white mt-1">{{ $user->contact_number ?? 'Not specified' }}</dd>
                                </div>
                                <div class="bg-[#0a1b47] p-4 rounded-2xl border-2 border-sky-400/40">
                                    <dt class="text-xs uppercase font-black text-sky-300">Enrolled School</dt>
                                    <dd class="font-black text-white mt-1">{{ $user->school ?? 'J & K Designs Academy' }}</dd>
                                </div>
                                <div class="bg-[#0a1b47] p-4 rounded-2xl border-2 border-sky-400/40 sm:col-span-3">
                                    <dt class="text-xs uppercase font-black text-sky-300">Physical Residential Address</dt>
                                    <dd class="font-bold text-white mt-1">{{ $user->address ?? 'Not specified' }}</dd>
                                </div>
                            </dl>
                        </div>

                        <!-- 4. Next of Kin (Bold) -->
                        <div>
                            <h4 class="text-xs uppercase font-black tracking-widest text-sky-300 border-b border-sky-400/30 pb-2 mb-4">
                                4. Next of Kin Emergency Contacts
                            </h4>
                            <dl class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-sm">
                                <div class="bg-[#0a1b47] p-4 rounded-2xl border-2 border-sky-400/40">
                                    <dt class="text-xs uppercase font-black text-sky-300">Next of Kin Full Name</dt>
                                    <dd class="font-black text-white mt-1 text-base">{{ $user->next_of_kin_name ?? 'Not specified' }}</dd>
                                </div>
                                <div class="bg-[#0a1b47] p-4 rounded-2xl border-2 border-sky-400/40">
                                    <dt class="text-xs uppercase font-black text-sky-300">Relationship to Student</dt>
                                    <dd class="font-black text-white mt-1 text-base">{{ $user->next_of_kin_relationship ?? 'Not specified' }}</dd>
                                </div>
                                <div class="bg-[#0a1b47] p-4 rounded-2xl border-2 border-sky-400/40">
                                    <dt class="text-xs uppercase font-black text-sky-300">Next of Kin Contact #</dt>
                                    <dd class="font-mono font-black text-white mt-1 text-base">{{ $user->next_of_kin_contact ?? 'Not specified' }}</dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TAB 3: MY SUBJECTS (LISTED & NO PICTURES) -->
            <div x-show="activeTab === 'subjects'" class="space-y-6">
                <div class="bg-[#0f286b] rounded-3xl shadow-xl border-2 border-sky-400/40 p-6 sm:p-8">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 pb-6 border-b-2 border-sky-400/30">
                        <div>
                            <h3 class="text-2xl font-black text-white">My Enrolled Subjects</h3>
                            <p class="text-sm text-sky-200 font-bold">Grade {{ $user->grade ?? '10' }} &bull; Accredited curriculum subject list with assigned educators &amp; rooms</p>
                        </div>
                        <span class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-black bg-blue-950 text-cyan-300 border-2 border-sky-400 shadow">
                            {{ count($subjects) }} Subjects Enrolled
                        </span>
                    </div>

                    <!-- Clean Enrolled Subjects List (NO PICTURES) -->
                    <div class="mt-6 space-y-4">
                        @foreach ($subjects as $subject)
                            <div class="p-5 sm:p-6 rounded-2xl border-2 border-sky-400/40 bg-[#0a1b47] hover:border-sky-300 transition shadow-lg flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                                <div class="space-y-1.5 flex-1">
                                    <div class="flex flex-wrap items-center gap-2">
                                        <span class="px-3 py-1 rounded-lg text-xs font-black font-mono bg-blue-950 text-cyan-300 border border-sky-400/60">
                                            {{ $subject['code'] }}
                                        </span>
                                        <span class="px-3 py-1 rounded-lg text-xs font-black bg-blue-600 text-white shadow">
                                            {{ $subject['badge'] }}
                                        </span>
                                        <span class="text-xs font-bold text-amber-300">
                                            {{ $subject['periods_per_week'] }} Periods/Week &bull; {{ $subject['credits'] }} Academic Credits
                                        </span>
                                    </div>
                                    <h4 class="text-xl font-black text-white pt-1">
                                        {{ $subject['name'] }}
                                    </h4>
                                    <p class="text-xs sm:text-sm text-sky-100 italic">
                                        {{ $subject['caption'] }}
                                    </p>
                                    <div class="flex flex-wrap items-center gap-4 text-xs font-bold text-sky-200 pt-2">
                                        <span>👨‍🏫 Educator: <strong class="text-white">{{ $subject['teacher'] }}</strong></span>
                                        <span>📍 Classroom: <strong class="text-cyan-300">{{ $subject['room'] }}</strong></span>
                                    </div>
                                </div>

                                <div class="w-full md:w-auto flex items-center gap-3">
                                    <a href="mailto:{{ $subject['teacher_email'] }}"
                                       class="inline-flex items-center justify-center px-5 py-2.5 bg-sky-400 hover:bg-sky-300 text-slate-950 font-black text-xs rounded-xl shadow transition w-full md:w-auto">
                                        <svg class="w-3.5 h-3.5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                        Email Educator
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- TAB 4: FUN & BRIGHT TIMETABLE (PINK & GREEN COLOURS) -->
            <div x-show="activeTab === 'timetable'" class="space-y-6" x-data="{ currentDay: 'Monday' }">
                <div class="bg-[#0f286b] rounded-3xl shadow-xl border-2 border-pink-400/50 p-6 sm:p-8">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 pb-6 border-b-2 border-pink-400/30">
                        <div>
                            <div class="flex items-center gap-2">
                                <span class="px-3 py-1 rounded-full text-xs font-black bg-pink-500 text-white shadow-md">
                                    🌸 BRIGHT PINK &amp; GREEN TIMETABLE 🌿
                                </span>
                                <span class="text-xs font-bold text-sky-200">School Hours: 08:00 &ndash; 14:30</span>
                            </div>
                            <h3 class="text-2xl font-black text-white mt-1">Weekly Academic Timetable</h3>
                            <p class="text-sm text-pink-200 font-bold">Class: <strong class="text-white">{{ $user->class_allocation }}</strong> &bull; Have fun and look forward to an energetic week!</p>
                        </div>

                        <!-- Fun Day Selector Tabs (Pink & Green Styling) -->
                        <div class="flex flex-wrap gap-1.5 p-2 bg-[#091845] rounded-2xl border-2 border-pink-400/40">
                            @foreach (array_keys($timetable) as $idx => $day)
                                @php
                                    $isPink = ($idx % 2 === 0);
                                @endphp
                                <button type="button" @click="currentDay = '{{ $day }}'"
                                        :class="currentDay === '{{ $day }}' ? '{{ $isPink ? 'bg-pink-500 text-white shadow-pink-500/50' : 'bg-emerald-400 text-slate-950 shadow-emerald-500/50' }} font-black shadow-lg scale-105' : 'text-slate-200 hover:text-white font-bold hover:bg-white/10'"
                                        class="px-4 py-2 rounded-xl text-xs transition-all">
                                    {{ $day }}
                                </button>
                            @endforeach
                        </div>
                    </div>

                    <!-- Daily Schedule Slots with Fun Pink and Green Cards -->
                    @foreach ($timetable as $day => $periods)
                        <div x-show="currentDay === '{{ $day }}'" class="mt-6 space-y-3">
                            <div class="flex items-center justify-between px-2 mb-2">
                                <h4 class="font-black text-xl text-white flex items-center gap-2">
                                    <span class="w-3.5 h-3.5 rounded-full bg-pink-400 animate-pulse"></span>
                                    {{ $day }} Routine
                                </h4>
                                <span class="text-xs font-black text-emerald-300 bg-emerald-950 px-3 py-1 rounded-full border border-emerald-400">
                                    ✨ Fun Learning Routine
                                </span>
                            </div>

                            <div class="space-y-3">
                                @foreach ($periods as $index => $slot)
                                    @php
                                        $slotTheme = $slot['theme'] ?? ($index % 2 === 0 ? 'pink' : 'green');
                                        $isPinkSlot = ($slotTheme === 'pink');
                                    @endphp
                                    <div class="p-4 sm:p-5 rounded-2xl border-2 transition-all hover:scale-[1.01] shadow-lg {{ $isPinkSlot ? 'bg-pink-950/60 border-pink-400 text-pink-100 shadow-pink-500/10' : 'bg-emerald-950/60 border-emerald-400 text-emerald-100 shadow-emerald-500/10' }}">
                                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                                            <div class="flex items-center gap-4">
                                                @if (is_numeric($slot['period']))
                                                    <span class="w-11 h-11 rounded-2xl {{ $isPinkSlot ? 'bg-pink-500 text-white' : 'bg-emerald-400 text-slate-950' }} flex items-center justify-center font-black text-sm shadow-md">
                                                        P{{ $slot['period'] }}
                                                    </span>
                                                @else
                                                    <span class="w-11 h-11 rounded-2xl bg-amber-400 text-amber-950 flex items-center justify-center font-black text-lg shadow-md">
                                                        ☕
                                                    </span>
                                                @endif

                                                <div>
                                                    <h5 class="text-base sm:text-lg font-black text-white">{{ $slot['subject'] }}</h5>
                                                    <p class="text-xs font-bold {{ $isPinkSlot ? 'text-pink-200' : 'text-emerald-200' }}">
                                                        Venue: <strong class="text-white underline">{{ $slot['room'] }}</strong> &bull; Educator: <strong class="text-white">{{ $slot['teacher'] }}</strong>
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="flex items-center gap-2 sm:self-center">
                                                <span class="px-4 py-1.5 rounded-xl font-mono text-xs font-black bg-black/60 text-white border {{ $isPinkSlot ? 'border-pink-300' : 'border-emerald-300' }}">
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

            <!-- TAB 5: INVITING SCHOOL ANNOUNCEMENTS -->
            <div x-show="activeTab === 'announcements'" class="space-y-6">
                <div class="bg-[#0f286b] rounded-3xl shadow-xl border-2 border-sky-400/40 p-6 sm:p-8">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 pb-6 border-b-2 border-sky-400/30">
                        <div>
                            <div class="flex items-center gap-2">
                                <span class="px-3 py-1 rounded-full text-xs font-black bg-sky-400 text-slate-950 shadow">
                                    🌟 INVITING CAMPUS BULLETIN
                                </span>
                            </div>
                            <h3 class="text-2xl font-black text-white mt-1">School Announcements</h3>
                            <p class="text-sm text-sky-200 font-bold">Stay connected, inspired and fully up to date with academy activities</p>
                        </div>
                        <span class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-black bg-blue-950 text-cyan-300 border-2 border-sky-400">
                            {{ count($announcements) }} Bulletins Active
                        </span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                        @foreach ($announcements as $announcement)
                            <div class="rounded-3xl border-2 {{ $announcement['urgent'] ? 'border-red-400 bg-red-950/30' : 'border-sky-400/40 bg-[#0a1b47]' }} p-6 shadow-xl hover:border-sky-300 transition-all flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center justify-between pb-3 border-b border-sky-400/20">
                                        <div class="flex items-center gap-2">
                                            @if ($announcement['urgent'])
                                                <span class="px-3 py-1 rounded-full text-xs font-black bg-red-600 text-white uppercase tracking-wider shadow">
                                                    ⚡ High Priority
                                                </span>
                                            @endif
                                            <span class="px-3 py-1 rounded-full text-xs font-bold bg-blue-900 text-sky-300 border border-sky-400/40">
                                                {{ $announcement['category'] }}
                                            </span>
                                        </div>
                                        <span class="text-xs font-bold text-sky-300">{{ $announcement['date'] }}</span>
                                    </div>

                                    <h4 class="text-lg font-black text-white mt-4 leading-snug">
                                        {{ $announcement['title'] }}
                                    </h4>
                                    <p class="text-sm text-blue-100 mt-2.5 leading-relaxed font-medium">
                                        {{ $announcement['content'] }}
                                    </p>
                                </div>

                                <div class="mt-5 pt-4 border-t border-sky-400/20 flex items-center justify-between text-xs text-sky-200">
                                    <span>Issued by: <strong class="text-white">{{ $announcement['author'] }}</strong></span>
                                    <span class="font-bold text-cyan-300 hover:underline cursor-pointer">Official Academy Record</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- TAB 6: UPCOMING EXAMINATIONS (BRIGHT COLOURS & REMINDERS) -->
            <div x-show="activeTab === 'exams'" class="space-y-6">
                <div class="bg-[#0f286b] rounded-3xl shadow-xl border-2 border-amber-400/60 p-6 sm:p-8">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 pb-6 border-b-2 border-amber-400/30">
                        <div>
                            <span class="px-3 py-1 rounded-full text-xs font-black bg-red-600 text-white uppercase tracking-wider shadow">
                                Bright Examination Timetable
                            </span>
                            <h3 class="text-2xl font-black text-white mt-1">Upcoming Examinations Timetable</h3>
                            <p class="text-sm text-sky-200 font-bold">Candidate: <strong class="text-white">{{ $user->name }}</strong> &bull; Student No: <span class="font-mono font-black text-cyan-300">{{ $user->student_number }}</span></p>
                        </div>
                        <span class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-black bg-amber-400 text-slate-950 shadow">
                            {{ count($upcomingExams) }} Scheduled Papers
                        </span>
                    </div>

                    <!-- Exam Rules Reminder Alert (Bright Yellow & Red) -->
                    <div class="mt-6 p-5 rounded-2xl bg-amber-950/60 border-2 border-amber-400 flex items-start gap-4 shadow-lg">
                        <span class="p-2.5 bg-amber-400 text-slate-950 rounded-xl text-xl font-black">
                            ⚠️
                        </span>
                        <div class="text-xs sm:text-sm text-amber-200 space-y-1 font-semibold">
                            <p class="font-black text-base text-amber-100">Official Candidate Exam Reminders:</p>
                            <p>1. Present your Student Identification Card at the exam hall entrance.</p>
                            <p>2. Arrive at least 30 minutes before commencement. Late entry is strictly prohibited after 15 minutes.</p>
                            <p>3. Transparent pencil cases only. No cell phones, smartwatches or unauthorized notes.</p>
                        </div>
                    </div>

                    <!-- Examination Table with Bright Status Badges -->
                    <div class="mt-6 overflow-x-auto rounded-2xl border-2 border-sky-400/40">
                        <table class="min-w-full divide-y divide-sky-400/40 text-left text-sm">
                            <thead class="bg-[#091845] text-sky-200 text-xs font-black uppercase tracking-wider">
                                <tr>
                                    <th class="px-5 py-4">Subject &amp; Paper</th>
                                    <th class="px-5 py-4">Date</th>
                                    <th class="px-5 py-4">Time</th>
                                    <th class="px-5 py-4">Duration</th>
                                    <th class="px-5 py-4">Venue</th>
                                    <th class="px-5 py-4">Allocated Seat</th>
                                    <th class="px-5 py-4">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-sky-400/20 bg-[#0a1b47]">
                                @foreach ($upcomingExams as $exam)
                                    <tr class="hover:bg-blue-900/40 transition">
                                        <td class="px-5 py-4">
                                            <div class="font-black text-white text-base">{{ $exam['subject'] }}</div>
                                            <div class="text-xs font-bold text-sky-300">{{ $exam['paper'] }}</div>
                                        </td>
                                        <td class="px-5 py-4 font-black text-amber-300 whitespace-nowrap">{{ $exam['date'] }}</td>
                                        <td class="px-5 py-4 font-mono font-black text-xs text-white whitespace-nowrap">{{ $exam['time'] }}</td>
                                        <td class="px-5 py-4 font-bold text-sky-200">{{ $exam['duration'] }}</td>
                                        <td class="px-5 py-4 font-black text-white">{{ $exam['venue'] }}</td>
                                        <td class="px-5 py-4 font-mono font-black text-base text-cyan-300">{{ $exam['seat'] }}</td>
                                        <td class="px-5 py-4">
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-black bg-red-600 text-white shadow">
                                                {{ $exam['status'] }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- TAB 7: BOLD ATTENDANCE RECORDS (CLEAR & READABLE) -->
            <div x-show="activeTab === 'attendance'" class="space-y-6">
                <div class="bg-[#0f286b] rounded-3xl shadow-xl border-2 border-emerald-400/60 p-6 sm:p-8">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 pb-6 border-b-2 border-emerald-400/30">
                        <div>
                            <span class="px-3 py-1 rounded-full text-xs font-black bg-emerald-500 text-slate-950 uppercase tracking-wider shadow">
                                Official Attendance Register
                            </span>
                            <h3 class="text-2xl font-black text-white mt-1">Attendance Records &amp; Compliance</h3>
                            <p class="text-sm text-sky-200 font-bold">Student: <strong class="text-white">{{ $user->name }}</strong> &bull; Class: <strong class="text-white">{{ $user->class_allocation }}</strong></p>
                        </div>
                        <span class="inline-flex items-center px-5 py-2 rounded-full text-base font-black bg-emerald-500 text-slate-950 shadow-lg">
                            Compliance: {{ $attendance['rate'] }}%
                        </span>
                    </div>

                    <!-- Extra Bold & Highly Readable Attendance KPI Boxes -->
                    <div class="grid grid-cols-2 lg:grid-cols-4 gap-5 mt-6">
                        <div class="bg-[#0a1b47] border-2 border-emerald-400 rounded-2xl p-5 text-center shadow-lg">
                            <p class="text-xs uppercase font-black text-emerald-300 tracking-wider">Days Present</p>
                            <p class="text-5xl sm:text-6xl font-black text-emerald-400 mt-2">{{ $attendance['days_present'] }}</p>
                            <p class="text-xs font-black text-emerald-200 mt-1">&check; Verified Present</p>
                        </div>

                        <div class="bg-[#0a1b47] border-2 border-amber-400 rounded-2xl p-5 text-center shadow-lg">
                            <p class="text-xs uppercase font-black text-amber-300 tracking-wider">Days Late</p>
                            <p class="text-5xl sm:text-6xl font-black text-amber-400 mt-2">{{ $attendance['days_late'] }}</p>
                            <p class="text-xs font-black text-amber-200 mt-1">&bull; Tardiness Logged</p>
                        </div>

                        <div class="bg-[#0a1b47] border-2 border-red-400 rounded-2xl p-5 text-center shadow-lg">
                            <p class="text-xs uppercase font-black text-red-300 tracking-wider">Days Absent</p>
                            <p class="text-5xl sm:text-6xl font-black text-red-400 mt-2">{{ $attendance['days_absent'] }}</p>
                            <p class="text-xs font-black text-red-200 mt-1">&times; Unattended Days</p>
                        </div>

                        <div class="bg-[#0a1b47] border-2 border-sky-400 rounded-2xl p-5 text-center shadow-lg">
                            <p class="text-xs uppercase font-black text-sky-300 tracking-wider">Total School Days</p>
                            <p class="text-5xl sm:text-6xl font-black text-cyan-300 mt-2">{{ $attendance['total_days'] }}</p>
                            <p class="text-xs font-black text-sky-200 mt-1">Full Term to Date</p>
                        </div>
                    </div>

                    <!-- Bold Progress Meter -->
                    <div class="mt-6 p-5 rounded-2xl bg-[#091845] border-2 border-emerald-400/40">
                        <div class="flex justify-between items-center text-xs font-black text-white mb-2">
                            <span>ATTENDANCE STATUS: EXCELLENT STANDING</span>
                            <span class="text-emerald-400 font-black text-base">{{ $attendance['rate'] }}% (Target: 85%)</span>
                        </div>
                        <div class="w-full bg-slate-900 rounded-full h-5 overflow-hidden shadow-inner border border-emerald-400/40">
                            <div class="bg-gradient-to-r from-emerald-500 to-teal-400 h-5 rounded-full transition-all duration-700" style="width: {{ $attendance['rate'] }}%"></div>
                        </div>
                    </div>

                    <!-- Daily History Table -->
                    <div class="mt-6">
                        <h4 class="font-black text-lg text-white mb-3">Recent Register Verification Log</h4>
                        <div class="overflow-x-auto rounded-2xl border-2 border-sky-400/30">
                            <table class="min-w-full divide-y divide-sky-400/30 text-left text-sm">
                                <thead class="bg-[#091845] text-xs font-black text-sky-200 uppercase tracking-wider">
                                    <tr>
                                        <th class="px-5 py-3.5">Date</th>
                                        <th class="px-5 py-3.5">Day</th>
                                        <th class="px-5 py-3.5">Status</th>
                                        <th class="px-5 py-3.5">Check-in Time</th>
                                        <th class="px-5 py-3.5">Official Remarks</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-sky-400/20 bg-[#0a1b47]">
                                    @foreach ($attendance['recent_records'] as $record)
                                        <tr class="hover:bg-blue-900/30">
                                            <td class="px-5 py-3.5 font-black text-white whitespace-nowrap">{{ $record['date'] }}</td>
                                            <td class="px-5 py-3.5 text-sky-200 font-bold">{{ $record['day'] }}</td>
                                            <td class="px-5 py-3.5">
                                                @if ($record['status'] === 'Present')
                                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-black bg-emerald-500 text-slate-950">
                                                        &check; Present
                                                    </span>
                                                @elseif ($record['status'] === 'Late')
                                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-black bg-amber-400 text-slate-950">
                                                        &bull; Late
                                                    </span>
                                                @else
                                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-black bg-blue-500 text-white">
                                                        &bull; {{ $record['status'] }}
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="px-5 py-3.5 font-mono text-xs font-black text-white">{{ $record['check_in'] }}</td>
                                            <td class="px-5 py-3.5 text-xs text-sky-200 font-semibold">{{ $record['remarks'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TAB 8: BOLD & INVITING REQUEST FORM -->
            <div x-show="activeTab === 'request'" class="space-y-6">
                <div class="bg-[#0f286b] rounded-3xl shadow-xl border-2 border-sky-400/40 p-6 sm:p-10">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 pb-6 border-b-2 border-sky-400/30">
                        <div>
                            <span class="px-3 py-1 rounded-full text-xs font-black bg-amber-400 text-slate-950 uppercase tracking-wider shadow">
                                Student Service &amp; Support Desk
                            </span>
                            <h3 class="text-2xl sm:text-3xl font-black text-white mt-1">Submit a Student Request</h3>
                            <p class="text-sm text-sky-200 font-bold">Need academic tutoring, timetable adjustment, excuse letters or special requests? We are here to help!</p>
                        </div>
                        <span class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-black bg-blue-950 text-cyan-300 border border-sky-400">
                            Fast 24h Turnaround
                        </span>
                    </div>

                    <!-- Bold Request Form -->
                    <form method="POST" action="{{ route('student.request.store') }}" class="mt-8 space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <!-- Request Type -->
                            <div>
                                <label for="req_type" class="block text-xs uppercase font-black text-sky-200 tracking-wider mb-2">
                                    Request Category <span class="text-red-400">*</span>
                                </label>
                                <select id="req_type" name="request_type" required
                                        class="block w-full rounded-2xl bg-[#0a1b47] border-2 border-sky-400 focus:border-cyan-300 focus:ring-0 text-sm font-bold text-white p-3.5 shadow-sm">
                                    <option value="">Select your request category...</option>
                                    <option value="Academic Tutoring & Extra Coaching">🎓 Academic Tutoring & Extra Coaching</option>
                                    <option value="Timetable / Schedule Adjustment">🕒 Timetable / Schedule Adjustment</option>
                                    <option value="Examination Paper Re-mark / Query">📝 Examination Paper Re-mark / Query</option>
                                    <option value="Official Enrolment Certificate">📑 Official Enrolment Certificate</option>
                                    <option value="Medical Absence / Excused Leave Note">🏥 Medical Absence / Excused Leave Note</option>
                                    <option value="Sports & Co-Curricular Enrollment">🏆 Sports & Co-Curricular Enrollment</option>
                                    <option value="General Student Support">💡 General Student Support</option>
                                </select>
                            </div>

                            <!-- Subject / Module -->
                            <div>
                                <label for="req_subject" class="block text-xs uppercase font-black text-sky-200 tracking-wider mb-2">
                                    Related Subject (Optional)
                                </label>
                                <select id="req_subject" name="subject"
                                        class="block w-full rounded-2xl bg-[#0a1b47] border-2 border-sky-400 focus:border-cyan-300 focus:ring-0 text-sm font-bold text-white p-3.5 shadow-sm">
                                    <option value="">Select subject (if applicable)...</option>
                                    @foreach ($subjects as $s)
                                        <option value="{{ $s['name'] }}">{{ $s['code'] }} &ndash; {{ $s['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Urgency Level -->
                            <div>
                                <label for="req_urgency" class="block text-xs uppercase font-black text-sky-200 tracking-wider mb-2">
                                    Urgency Level <span class="text-red-400">*</span>
                                </label>
                                <select id="req_urgency" name="urgency" required
                                        class="block w-full rounded-2xl bg-[#0a1b47] border-2 border-sky-400 focus:border-cyan-300 focus:ring-0 text-sm font-bold text-white p-3.5 shadow-sm">
                                    <option value="Standard (Within 48 hours)">Standard (Within 48 hours)</option>
                                    <option value="High Priority (Within 24 hours)">High Priority (Within 24 hours)</option>
                                    <option value="Urgent (Same Day Attention)">Urgent (Same Day Attention)</option>
                                </select>
                            </div>

                            <!-- Student Info Readonly Preview -->
                            <div>
                                <label class="block text-xs uppercase font-black text-sky-200 tracking-wider mb-2">
                                    Applicant Credentials
                                </label>
                                <div class="p-3.5 bg-[#0a1b47] border-2 border-sky-400 rounded-2xl text-xs font-black text-white flex items-center justify-between shadow-sm">
                                    <span>{{ $user->name }}</span>
                                    <span class="font-mono text-cyan-300">{{ $user->student_number }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Request Details -->
                        <div>
                            <label for="req_details" class="block text-xs uppercase font-black text-sky-200 tracking-wider mb-2">
                                Detailed Request Description <span class="text-red-400">*</span>
                            </label>
                            <textarea id="req_details" name="details" rows="4" required
                                      placeholder="Please explain the details of your request so our academic support team can assist you effectively..."
                                      class="block w-full rounded-2xl bg-[#0a1b47] border-2 border-sky-400 focus:border-cyan-300 focus:ring-0 text-sm text-white p-4 shadow-sm font-medium"></textarea>
                        </div>

                        <!-- Action Submit -->
                        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-4 border-t-2 border-sky-400/30">
                            <span class="text-xs text-sky-200 font-bold">
                                All student requests are confidentially reviewed by academy student affairs.
                            </span>

                            <button type="submit"
                                    class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-3.5 bg-gradient-to-r from-amber-400 to-orange-400 hover:from-amber-300 hover:to-orange-300 text-slate-950 font-black text-base rounded-2xl shadow-xl transition transform hover:-translate-y-0.5">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                </svg>
                                SUBMIT OFFICIAL REQUEST
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- 4. BOTTOM LOG OUT BANNER (BOLD & NOT FORGOTTEN) -->
            <div class="bg-gradient-to-r from-[#091845] via-[#0f286b] to-[#091845] rounded-3xl p-6 sm:p-8 text-white shadow-2xl border-2 border-red-400 flex flex-col sm:flex-row justify-between items-center gap-6">
                <div class="flex items-center gap-4">
                    <div class="w-14 h-14 rounded-2xl bg-red-600/30 border-2 border-red-400 text-red-400 flex items-center justify-center text-2xl font-black shadow-lg">
                        JK
                    </div>
                    <div>
                        <h4 class="text-lg sm:text-xl font-black text-white">Finished Your Study Session?</h4>
                        <p class="text-xs sm:text-sm text-sky-200 font-bold">Remember to securely sign out of your student portal on public or shared computers.</p>
                    </div>
                </div>

                <div class="flex items-center gap-3 w-full sm:w-auto">
                    <a href="{{ route('profile.edit') }}"
                       class="px-5 py-3 rounded-xl border-2 border-sky-400 text-white font-black text-sm hover:bg-blue-900/60 transition text-center w-full sm:w-auto">
                        Account Settings
                    </a>

                    <!-- Prominent & Bold Bottom Logout -->
                    <form method="POST" action="{{ route('logout') }}" class="w-full sm:w-auto">
                        @csrf
                        <button type="submit"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                                class="inline-flex items-center justify-center px-8 py-3 bg-red-600 hover:bg-red-700 active:bg-red-800 text-white font-black text-sm tracking-wider rounded-xl shadow-2xl transition border-2 border-red-400 w-full sm:w-auto transform hover:-translate-y-0.5 focus:outline-none focus:ring-4 focus:ring-red-400">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            LOG OUT OF STUDENT ACCOUNT
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
