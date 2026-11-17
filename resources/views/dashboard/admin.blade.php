<x-app-layout>
    <x-slot name="header">
        <!-- Bold Blue & Light Blue Header Bar matching Student Portal -->
        <div class="bg-[#081538] px-4 sm:px-6 lg:px-8 py-6 border-b-2 border-sky-400/40">
            <div class="max-w-7xl mx-auto flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div>
                    <div class="flex flex-wrap items-center gap-2">
                        <span class="inline-flex items-center px-3.5 py-1 rounded-full text-xs font-black bg-blue-950 text-cyan-300 border-2 border-sky-400/50 shadow-sm">
                            J &amp; K Designs Academy
                        </span>
                        <span class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full text-xs font-black bg-emerald-950 text-emerald-400 border-2 border-emerald-400 shadow-md">
                            <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 animate-ping"></span>
                            ADMIN ACCESS: ACTIVE
                        </span>
                        <span class="inline-flex items-center px-3.5 py-1 rounded-full text-xs font-black bg-cyan-400 text-slate-950 uppercase tracking-wider shadow">
                            🛡️ OFFICIAL ADMINISTRATOR PORTAL
                        </span>
                    </div>
                    <h2 class="font-black text-2xl sm:text-3xl text-white leading-tight mt-2">
                        Administrator Control Dashboard
                    </h2>
                    <p class="text-sm text-sky-200 mt-1">
                        Welcome Administrator <strong class="text-white font-black">{{ $user->name }}</strong> &bull; Complete Academy Governance &amp; Student Operations
                    </p>
                </div>

                <!-- Prominent Bold Logout Button -->
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

    <!-- Canvas in Bold Blue & Light Blue Theme (Matching Student Login Portal) -->
    <div class="bg-[#0b1d4d] min-h-screen py-8 text-slate-100"
         x-data="{
             showStudentModal: false,
             showTeacherModal: false,
             showClassModal: false,
             showReportModal: false,
             reportType: 'summary'
         }">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

            <!-- Flash Success Alert -->
            @if (session('admin_success'))
                <div class="bg-gradient-to-r from-emerald-600 via-teal-600 to-emerald-700 text-white rounded-2xl p-5 shadow-2xl flex items-start gap-4 border-2 border-emerald-300">
                    <span class="p-2.5 bg-white/20 rounded-xl text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                        </svg>
                    </span>
                    <div>
                        <h4 class="font-black text-lg">Action Successfully Executed!</h4>
                        <p class="text-sm text-emerald-100 mt-0.5">{{ session('admin_success') }}</p>
                    </div>
                </div>
            @endif

            @if (isset($errors) && $errors->any())
                <div class="bg-red-950/90 border-2 border-red-400 text-white rounded-2xl p-5 shadow-2xl">
                    <h4 class="font-black text-lg flex items-center gap-2">
                        <span>⚠️</span> Please correct the following errors:
                    </h4>
                    <ul class="list-disc list-inside mt-2 text-sm text-red-200 font-semibold space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- 1. HERO BANNER IN BOLD BLUE & LIGHT BLUE (EXACT LOGIN PORTAL STYLING) -->
            <div class="bg-gradient-to-br from-[#081538] via-[#0d225c] to-[#0a1a47] rounded-3xl shadow-2xl p-6 sm:p-8 text-white relative overflow-hidden border-2 border-sky-400/50">
                <!-- Ambient Glows -->
                <div class="absolute -top-20 -left-20 w-64 h-64 bg-cyan-400/15 rounded-full blur-3xl pointer-events-none"></div>
                <div class="absolute -bottom-20 -right-20 w-64 h-64 bg-sky-400/15 rounded-full blur-3xl pointer-events-none"></div>

                <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-6 relative z-10">
                    <div class="space-y-3">
                        <div class="flex flex-wrap items-center gap-2">
                            <span class="inline-block px-3.5 py-1 bg-cyan-400 text-slate-950 text-xs font-black rounded-full uppercase tracking-wider shadow-md">
                                Academy Leadership &amp; Governance
                            </span>
                            <span class="inline-block px-3.5 py-1 bg-blue-950 text-cyan-300 text-xs font-black rounded-full border border-sky-400/50">
                                Session 2026/2027
                            </span>
                        </div>

                        <h1 class="text-3xl sm:text-5xl font-black tracking-tight text-white drop-shadow-md">
                            WELCOME <span class="text-cyan-300 underline decoration-cyan-400 decoration-4 underline-offset-4">{{ strtoupper($user->name) }}</span>
                        </h1>
                        <p class="text-sky-200 max-w-2xl text-sm sm:text-base leading-relaxed font-bold">
                            Oversee student matriculation, faculty assignments, class schedules, and institutional reports with full operational governance.
                        </p>
                    </div>

                    <!-- Fast Quick Access Pill -->
                    <div class="bg-[#081538]/90 backdrop-blur-md p-4 rounded-2xl border-2 border-sky-400/60 shadow-xl self-stretch lg:self-auto text-center lg:text-left">
                        <span class="text-xs uppercase font-black tracking-wider text-sky-300">Live Academy Status</span>
                        <div class="flex items-center justify-center lg:justify-start gap-2 mt-1">
                            <span class="w-3 h-3 rounded-full bg-emerald-400 animate-ping"></span>
                            <span class="text-lg font-black text-emerald-400">All Systems Operational</span>
                        </div>
                        <span class="text-[11px] font-bold text-sky-200 mt-0.5 block">Attendance Rate: {{ $attendanceToday }}</span>
                    </div>
                </div>

                <!-- 4 CORE QUICK ACTION BUTTONS (CLICKABLE & 100% FUNCTIONAL) -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mt-8 pt-6 border-t-2 border-sky-400/30 relative z-10">
                    <!-- 1. Register Students Option -->
                    <button type="button"
                            @click="showStudentModal = true"
                            id="btn-register-students"
                            class="inline-flex items-center justify-center gap-3 px-5 py-4 bg-cyan-400 hover:bg-cyan-300 text-slate-950 font-black text-sm uppercase tracking-wider rounded-2xl shadow-xl transition transform hover:-translate-y-1 border-2 border-cyan-300 focus:outline-none focus:ring-4 focus:ring-cyan-300 cursor-pointer">
                        <svg class="w-6 h-6 text-slate-950" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                        <span>Register Students</span>
                    </button>

                    <!-- 2. Add Teacher Option -->
                    <button type="button"
                            @click="showTeacherModal = true"
                            id="btn-add-teacher"
                            class="inline-flex items-center justify-center gap-3 px-5 py-4 bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-black text-sm uppercase tracking-wider rounded-2xl shadow-xl transition transform hover:-translate-y-1 border-2 border-emerald-400 focus:outline-none focus:ring-4 focus:ring-emerald-400 cursor-pointer">
                        <svg class="w-6 h-6 text-slate-950" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                        <span>Add Teacher</span>
                    </button>

                    <!-- 3. Create Class Option -->
                    <button type="button"
                            @click="showClassModal = true"
                            id="btn-create-class"
                            class="inline-flex items-center justify-center gap-3 px-5 py-4 bg-purple-500 hover:bg-purple-400 text-white font-black text-sm uppercase tracking-wider rounded-2xl shadow-xl transition transform hover:-translate-y-1 border-2 border-purple-400 focus:outline-none focus:ring-4 focus:ring-purple-400 cursor-pointer">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                        <span>Create Class</span>
                    </button>

                    <!-- 4. Generate Report Option -->
                    <button type="button"
                            @click="showReportModal = true"
                            id="btn-generate-report"
                            class="inline-flex items-center justify-center gap-3 px-5 py-4 bg-amber-400 hover:bg-amber-300 text-slate-950 font-black text-sm uppercase tracking-wider rounded-2xl shadow-xl transition transform hover:-translate-y-1 border-2 border-amber-300 focus:outline-none focus:ring-4 focus:ring-amber-300 cursor-pointer">
                        <svg class="w-6 h-6 text-slate-950" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <span>Generate Report</span>
                    </button>
                </div>
            </div>

            <!-- 2. STATS OVERVIEW CARDS (BOLD BLUE & LIGHT BLUE, ZERO PLAIN WHITE) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                <!-- Total Students -->
                <div class="bg-[#0f286b] rounded-2xl p-6 border-2 border-sky-400/50 shadow-xl flex items-center justify-between">
                    <div>
                        <p class="text-xs uppercase font-black text-sky-300 tracking-wider">Total Students</p>
                        <p class="text-4xl sm:text-5xl font-black text-cyan-300 mt-2 font-mono">{{ $totalStudents }}</p>
                        <span class="text-xs font-bold text-sky-200 mt-1 block">Active Learners Enrolled</span>
                    </div>
                    <div class="w-14 h-14 bg-[#081538] text-cyan-300 rounded-2xl flex items-center justify-center border-2 border-sky-400/50 text-2xl shadow-inner">
                        🎓
                    </div>
                </div>

                <!-- Total Teachers -->
                <div class="bg-[#0f286b] rounded-2xl p-6 border-2 border-emerald-400 shadow-xl flex items-center justify-between">
                    <div>
                        <p class="text-xs uppercase font-black text-emerald-300 tracking-wider">Total Teachers</p>
                        <p class="text-4xl sm:text-5xl font-black text-emerald-400 mt-2 font-mono">{{ $totalTeachers }}</p>
                        <span class="text-xs font-bold text-emerald-200 mt-1 block">Faculty Educators Assigned</span>
                    </div>
                    <div class="w-14 h-14 bg-[#081538] text-emerald-400 rounded-2xl flex items-center justify-center border-2 border-emerald-400 text-2xl shadow-inner">
                        👩‍🏫
                    </div>
                </div>

                <!-- Total Classes -->
                <div class="bg-[#0f286b] rounded-2xl p-6 border-2 border-purple-400 shadow-xl flex items-center justify-between">
                    <div>
                        <p class="text-xs uppercase font-black text-purple-300 tracking-wider">Total Classes</p>
                        <p class="text-4xl sm:text-5xl font-black text-purple-300 mt-2 font-mono">{{ $totalClasses }}</p>
                        <span class="text-xs font-bold text-purple-200 mt-1 block">Active Academic Sections</span>
                    </div>
                    <div class="w-14 h-14 bg-[#081538] text-purple-300 rounded-2xl flex items-center justify-center border-2 border-purple-400 text-2xl shadow-inner">
                        🏫
                    </div>
                </div>

                <!-- Attendance Today -->
                <div class="bg-[#0f286b] rounded-2xl p-6 border-2 border-amber-400 shadow-xl flex items-center justify-between">
                    <div>
                        <p class="text-xs uppercase font-black text-amber-300 tracking-wider">Attendance Today</p>
                        <p class="text-4xl sm:text-5xl font-black text-amber-300 mt-2 font-mono">{{ $attendanceToday }}</p>
                        <span class="text-xs font-bold text-amber-200 mt-1 block">Academy High Standing</span>
                    </div>
                    <div class="w-14 h-14 bg-[#081538] text-amber-300 rounded-2xl flex items-center justify-center border-2 border-amber-400 text-2xl shadow-inner">
                        📈
                    </div>
                </div>
            </div>

            <!-- 3. RECENT ACTIVITIES & SYSTEM FEED -->
            <div class="bg-[#0f286b] rounded-3xl p-6 sm:p-7 border-2 border-sky-400/40 shadow-xl">
                <div class="flex justify-between items-center pb-4 border-b-2 border-sky-400/30">
                    <div>
                        <h3 class="text-xl font-black text-white flex items-center gap-2">
                            <span>⚡</span>
                            <span>Recent Operational Activities</span>
                        </h3>
                        <p class="text-xs text-sky-200 mt-0.5">Real-time log of registrations, allocations, and administrative events</p>
                    </div>
                    <span class="px-3 py-1 rounded-full text-xs font-black bg-[#081538] text-cyan-300 border border-sky-400/50">
                        {{ count($recentActivities) }} Events Logged
                    </span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-6">
                    @forelse($recentActivities as $activity)
                        <div class="p-4 bg-[#081538] rounded-2xl border-2 border-sky-400/30 hover:border-sky-300 transition shadow flex items-start gap-3">
                            <span class="p-2 rounded-xl bg-blue-950 text-cyan-300 border border-sky-400/40 text-sm font-black">
                                &check;
                            </span>
                            <div class="flex-1">
                                <p class="text-sm font-black text-white leading-snug">{{ $activity['message'] }}</p>
                                <div class="flex items-center justify-between mt-2 text-xs">
                                    <span class="font-bold text-emerald-400 uppercase tracking-wider text-[11px]">{{ ucfirst($activity['status']) }}</span>
                                    <span class="text-sky-300 font-semibold">{{ $activity['time'] ?? 'Recently' }}</span>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-sm text-sky-200 italic p-4">No recent activities recorded.</p>
                    @endforelse
                </div>
            </div>

            <!-- 4. ACTIVE ACADEMIC CLASSES SECTION -->
            <div class="bg-[#0f286b] rounded-3xl border-2 border-purple-400/40 shadow-xl overflow-hidden">
                <div class="px-6 py-5 bg-[#081538] border-b-2 border-sky-400/30 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3">
                    <div>
                        <h3 class="font-black text-lg sm:text-xl text-white flex items-center gap-2">
                            <span>🏫</span>
                            <span>Active Academic Classes</span>
                        </h3>
                        <p class="text-xs text-sky-200 font-bold">Classrooms, grade allocations and educator assignments</p>
                    </div>
                    <button type="button" @click="showClassModal = true"
                            class="px-4 py-2 bg-purple-500 hover:bg-purple-400 text-white font-black text-xs uppercase tracking-wider rounded-xl shadow border border-purple-300">
                        + New Class
                    </button>
                </div>

                <div class="p-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        @forelse($classes as $c)
                            <div class="p-5 bg-[#081538] rounded-2xl border-2 border-sky-400/40 hover:border-cyan-300 transition shadow">
                                <div class="flex items-center justify-between">
                                    <span class="px-3 py-1 rounded-lg text-xs font-black bg-blue-950 text-cyan-300 border border-sky-400/50">
                                        {{ $c->grade }}
                                    </span>
                                    <span class="text-xs font-mono font-bold text-amber-300">Max: {{ $c->capacity }} Students</span>
                                </div>
                                <h4 class="text-lg font-black text-white mt-2">{{ $c->name }}</h4>
                                <div class="text-xs font-bold text-sky-200 mt-2 space-y-1">
                                    <p>📍 Room: <strong class="text-cyan-300">{{ $c->room ?? 'Unassigned' }}</strong></p>
                                    <p>👨‍🏫 Educator: <strong class="text-white">{{ $c->teacher_name ?? 'Faculty' }}</strong></p>
                                    <p>📅 Academic Session: <strong class="text-slate-300">{{ $c->academic_year }}</strong></p>
                                </div>
                            </div>
                        @empty
                            <p class="text-sm text-sky-200 italic p-4">No classes created yet. Click "Create Class" above.</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- 5. RECENTLY REGISTERED TEACHERS TABLE -->
            <div class="bg-[#0f286b] rounded-3xl border-2 border-emerald-400/40 shadow-xl overflow-hidden">
                <div class="px-6 py-5 bg-[#081538] border-b-2 border-sky-400/30 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3">
                    <div>
                        <h3 class="font-black text-lg sm:text-xl text-white flex items-center gap-2">
                            <span>👩‍🏫</span>
                            <span>Recently Registered Teachers</span>
                        </h3>
                        <p class="text-xs text-sky-200 font-bold">Faculty educators registered in the academic system</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="px-3 py-1 bg-emerald-950 text-emerald-400 text-xs font-black rounded-full border border-emerald-400">
                            {{ $recentTeachers->count() }} Records
                        </span>
                        <button type="button" @click="showTeacherModal = true"
                                class="px-4 py-2 bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-black text-xs uppercase tracking-wider rounded-xl shadow border border-emerald-300">
                            + Add Teacher
                        </button>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-slate-200">
                        <thead class="text-xs text-cyan-300 uppercase bg-[#0a1a47] border-b border-sky-400/30 font-black">
                            <tr>
                                <th class="px-6 py-4">Teacher Name &amp; Email</th>
                                <th class="px-6 py-4">Subject</th>
                                <th class="px-6 py-4">School</th>
                                <th class="px-6 py-4">Percel #</th>
                                <th class="px-6 py-4">Contact</th>
                                <th class="px-6 py-4">Qualifications</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-sky-400/20 bg-[#081538]/70">
                            @forelse($recentTeachers as $teacher)
                                <tr class="hover:bg-[#122863] transition">
                                    <td class="px-6 py-4">
                                        <div class="font-black text-white text-base">{{ $teacher->name }}</div>
                                        <div class="text-xs text-sky-200">{{ $teacher->email }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="px-3 py-1 bg-emerald-950 text-emerald-300 border border-emerald-400/60 text-xs font-black rounded-lg">
                                            {{ $teacher->subject_to_be_taught ?? 'General Studies' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 font-bold text-white">
                                        {{ $teacher->school ?? 'J & K Designs Academy' }}
                                    </td>
                                    <td class="px-6 py-4 font-mono text-xs text-cyan-300 font-bold">
                                        {{ $teacher->percel_number ?? 'PRC-N/A' }}
                                    </td>
                                    <td class="px-6 py-4 text-xs font-mono text-slate-200">
                                        {{ $teacher->contact_number ?? 'Not specified' }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @if($teacher->qualifications_document)
                                            <a href="{{ route('teacher.qualifications.download', $teacher) }}"
                                               class="inline-flex items-center text-xs font-black text-cyan-300 hover:text-white underline">
                                                <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                                </svg>
                                                Download Doc
                                            </a>
                                        @else
                                            <span class="text-xs text-slate-400 italic">None uploaded</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-8 text-center text-sky-200 italic">
                                        No teachers registered yet.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- 6. RECENTLY REGISTERED STUDENTS TABLE -->
            <div class="bg-[#0f286b] rounded-3xl border-2 border-sky-400/50 shadow-xl overflow-hidden">
                <div class="px-6 py-5 bg-[#081538] border-b-2 border-sky-400/30 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3">
                    <div>
                        <h3 class="font-black text-lg sm:text-xl text-white flex items-center gap-2">
                            <span>🎓</span>
                            <span>Recently Registered Students</span>
                        </h3>
                        <p class="text-xs text-sky-200 font-bold">Learners matriculated into the academy with parent records</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="px-3 py-1 bg-blue-950 text-cyan-300 text-xs font-black rounded-full border border-sky-400">
                            {{ $recentStudents->count() }} Records
                        </span>
                        <button type="button" @click="showStudentModal = true"
                                class="px-4 py-2 bg-cyan-400 hover:bg-cyan-300 text-slate-950 font-black text-xs uppercase tracking-wider rounded-xl shadow border border-cyan-200">
                            + Register Student
                        </button>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-slate-200">
                        <thead class="text-xs text-cyan-300 uppercase bg-[#0a1a47] border-b border-sky-400/30 font-black">
                            <tr>
                                <th class="px-6 py-4">Student Details</th>
                                <th class="px-6 py-4">Student No</th>
                                <th class="px-6 py-4">Grade &amp; Class</th>
                                <th class="px-6 py-4">Parent / Guardian</th>
                                <th class="px-6 py-4">Parent Contact</th>
                                <th class="px-6 py-4">ID Number</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-sky-400/20 bg-[#081538]/70">
                            @forelse($recentStudents as $student)
                                <tr class="hover:bg-[#122863] transition">
                                    <td class="px-6 py-4">
                                        <div class="font-black text-white text-base">{{ $student->name }}</div>
                                        <div class="text-xs text-sky-200">{{ $student->email }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="font-mono text-cyan-300 font-black bg-blue-950 px-2.5 py-1 rounded-lg border border-sky-400/40 text-xs">
                                            {{ $student->student_number }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="font-black text-amber-300 text-xs">{{ $student->grade ?? 'Grade 10' }}</div>
                                        <div class="text-[11px] text-sky-200 font-semibold">{{ $student->class_allocation ?? 'Class A' }}</div>
                                    </td>
                                    <td class="px-6 py-4 text-xs">
                                        <div class="font-bold text-white">{{ $student->parent_name ?: 'Mixo Mdaka' }}</div>
                                        <div class="text-[11px] text-sky-200">{{ $student->parent_email ?: 'mixomdaka@gmail.com' }}</div>
                                    </td>
                                    <td class="px-6 py-4 font-mono text-xs text-cyan-300 font-bold">
                                        {{ $student->parent_contact ?: '0713998559' }}
                                    </td>
                                    <td class="px-6 py-4 font-mono text-xs text-slate-300">
                                        {{ $student->id_number ?: ($student->passport ?: 'N/A') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-8 text-center text-sky-200 italic">
                                        No students registered yet.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- 7. ADMINISTRATOR INFORMATION SECTION (MOVED TO THE BUTTOM AS REQUESTED) -->
            <div id="admin-info-section" class="pt-4">
                @include('dashboard.partials.admin-info')
            </div>

            <!-- 8. BOTTOM LOGOUT & SESSION BANNER (MATCHING STUDENT DASHBOARD) -->
            <div class="bg-gradient-to-r from-[#091845] via-[#0f286b] to-[#091845] rounded-3xl p-6 sm:p-8 text-white shadow-2xl border-2 border-red-400 flex flex-col sm:flex-row justify-between items-center gap-6">
                <div class="flex items-center gap-4">
                    <div class="w-14 h-14 rounded-2xl bg-red-600/30 border-2 border-red-400 text-red-400 flex items-center justify-center text-2xl font-black shadow-lg">
                        JK
                    </div>
                    <div>
                        <h4 class="text-lg sm:text-xl font-black text-white">End Administrative Work Session?</h4>
                        <p class="text-xs sm:text-sm text-sky-200 font-bold">Always securely sign out when administrative tasks, reports and allocations are finalized.</p>
                    </div>
                </div>

                <div class="flex items-center gap-3 w-full sm:w-auto">
                    <a href="{{ route('profile.edit') }}"
                       class="px-5 py-3 rounded-xl border-2 border-sky-400 text-white font-black text-sm hover:bg-blue-900/60 transition text-center w-full sm:w-auto">
                        Admin Settings
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
                            LOG OUT OF ADMIN ACCOUNT
                        </button>
                    </form>
                </div>
            </div>

        </div>

        <!-- ========================================================================= -->
        <!-- MODAL 1: REGISTER STUDENTS (FULLY WORKING) -->
        <!-- ========================================================================= -->
        <div x-show="showStudentModal"
             x-cloak
             class="fixed inset-0 z-50 overflow-y-auto bg-black/80 backdrop-blur-sm flex items-center justify-center p-4">
            <div @click.away="showStudentModal = false"
                 class="bg-[#0f286b] rounded-3xl border-2 border-cyan-400 shadow-2xl max-w-2xl w-full text-white p-6 sm:p-8 space-y-6 relative max-h-[90vh] overflow-y-auto">
                <div class="flex items-center justify-between pb-4 border-b-2 border-sky-400/30">
                    <div>
                        <span class="px-3 py-1 bg-cyan-400 text-slate-950 font-black text-xs rounded-full uppercase tracking-wider">
                            Enrollment Desk
                        </span>
                        <h3 class="text-2xl font-black text-white mt-1">Register New Student</h3>
                    </div>
                    <button type="button" @click="showStudentModal = false" class="text-sky-300 hover:text-white text-2xl font-black">&times;</button>
                </div>

                <form method="POST" action="{{ route('admin.students.store') }}" class="space-y-4">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs uppercase font-black text-sky-200 mb-1">Student Full Name <span class="text-red-400">*</span></label>
                            <input type="text" name="name" required placeholder="e.g. Sipho Sithole"
                                   class="w-full bg-[#081538] border-2 border-sky-400 rounded-xl p-3 text-white text-sm focus:border-cyan-300 focus:ring-0">
                        </div>
                        <div>
                            <label class="block text-xs uppercase font-black text-sky-200 mb-1">Student Email <span class="text-red-400">*</span></label>
                            <input type="email" name="email" required placeholder="e.g. sipho@jnkdesignsacademy.co.za"
                                   class="w-full bg-[#081538] border-2 border-sky-400 rounded-xl p-3 text-white text-sm focus:border-cyan-300 focus:ring-0">
                        </div>
                        <div>
                            <label class="block text-xs uppercase font-black text-sky-200 mb-1">Grade Level <span class="text-red-400">*</span></label>
                            <select name="grade" required class="w-full bg-[#081538] border-2 border-sky-400 rounded-xl p-3 text-white text-sm focus:border-cyan-300 focus:ring-0">
                                <option value="Grade 8">Grade 8</option>
                                <option value="Grade 9">Grade 9</option>
                                <option value="Grade 10" selected>Grade 10</option>
                                <option value="Grade 11">Grade 11</option>
                                <option value="Grade 12">Grade 12</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs uppercase font-black text-sky-200 mb-1">Class Allocation</label>
                            <input type="text" name="class_allocation" placeholder="e.g. Grade 10 - Class A"
                                   class="w-full bg-[#081538] border-2 border-sky-400 rounded-xl p-3 text-white text-sm focus:border-cyan-300 focus:ring-0">
                        </div>
                        <div>
                            <label class="block text-xs uppercase font-black text-sky-200 mb-1">Student ID / Passport</label>
                            <input type="text" name="id_number" placeholder="e.g. 0604125890081"
                                   class="w-full bg-[#081538] border-2 border-sky-400 rounded-xl p-3 text-white text-sm focus:border-cyan-300 focus:ring-0">
                        </div>
                        <div>
                            <label class="block text-xs uppercase font-black text-sky-200 mb-1">Student Contact #</label>
                            <input type="text" name="contact_number" placeholder="e.g. 0712345678"
                                   class="w-full bg-[#081538] border-2 border-sky-400 rounded-xl p-3 text-white text-sm focus:border-cyan-300 focus:ring-0">
                        </div>
                    </div>

                    <!-- Parents Info Pre-filled with Requested Details -->
                    <div class="pt-3 border-t border-sky-400/30">
                        <h4 class="text-xs uppercase font-black text-cyan-300 mb-2">Parents / Guardian Details</h4>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                            <div>
                                <label class="block text-xs font-bold text-sky-200 mb-1">Parents Name</label>
                                <input type="text" name="parent_name" value="Mixo Mdaka"
                                       class="w-full bg-[#081538] border-2 border-cyan-400 rounded-xl p-2.5 text-white text-sm focus:ring-0">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-sky-200 mb-1">Parents Contact</label>
                                <input type="text" name="parent_contact" value="0713998559"
                                       class="w-full bg-[#081538] border-2 border-cyan-400 rounded-xl p-2.5 text-white text-sm focus:ring-0">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-sky-200 mb-1">Parents Email</label>
                                <input type="email" name="parent_email" value="mixomdaka@gmail.com"
                                       class="w-full bg-[#081538] border-2 border-cyan-400 rounded-xl p-2.5 text-white text-sm focus:ring-0">
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end gap-3 pt-4 border-t border-sky-400/30">
                        <button type="button" @click="showStudentModal = false"
                                class="px-5 py-2.5 rounded-xl border border-sky-400 text-sky-200 hover:text-white font-bold text-sm">
                            Cancel
                        </button>
                        <button type="submit"
                                class="px-6 py-2.5 bg-cyan-400 hover:bg-cyan-300 text-slate-950 font-black text-sm rounded-xl shadow-lg border-2 border-cyan-300">
                            Register Student Now
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- ========================================================================= -->
        <!-- MODAL 2: ADD TEACHER (FULLY WORKING) -->
        <!-- ========================================================================= -->
        <div x-show="showTeacherModal"
             x-cloak
             class="fixed inset-0 z-50 overflow-y-auto bg-black/80 backdrop-blur-sm flex items-center justify-center p-4">
            <div @click.away="showTeacherModal = false"
                 class="bg-[#0f286b] rounded-3xl border-2 border-emerald-400 shadow-2xl max-w-2xl w-full text-white p-6 sm:p-8 space-y-6 relative max-h-[90vh] overflow-y-auto">
                <div class="flex items-center justify-between pb-4 border-b-2 border-sky-400/30">
                    <div>
                        <span class="px-3 py-1 bg-emerald-400 text-slate-950 font-black text-xs rounded-full uppercase tracking-wider">
                            Faculty Appointment
                        </span>
                        <h3 class="text-2xl font-black text-white mt-1">Add Faculty Teacher</h3>
                    </div>
                    <button type="button" @click="showTeacherModal = false" class="text-sky-300 hover:text-white text-2xl font-black">&times;</button>
                </div>

                <form method="POST" action="{{ route('admin.teachers.store') }}" class="space-y-4">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs uppercase font-black text-sky-200 mb-1">Teacher Full Name <span class="text-red-400">*</span></label>
                            <input type="text" name="name" required placeholder="e.g. Dr. K. Mokoena"
                                   class="w-full bg-[#081538] border-2 border-emerald-400 rounded-xl p-3 text-white text-sm focus:border-cyan-300 focus:ring-0">
                        </div>
                        <div>
                            <label class="block text-xs uppercase font-black text-sky-200 mb-1">Teacher Email <span class="text-red-400">*</span></label>
                            <input type="email" name="email" required placeholder="e.g. teacher@jkdesignsacademy.co.za"
                                   class="w-full bg-[#081538] border-2 border-emerald-400 rounded-xl p-3 text-white text-sm focus:border-cyan-300 focus:ring-0">
                        </div>
                        <div>
                            <label class="block text-xs uppercase font-black text-sky-200 mb-1">Subject to be Taught <span class="text-red-400">*</span></label>
                            <input type="text" name="subject_to_be_taught" required placeholder="e.g. Physical Sciences & Mechanics"
                                   class="w-full bg-[#081538] border-2 border-emerald-400 rounded-xl p-3 text-white text-sm focus:border-cyan-300 focus:ring-0">
                        </div>
                        <div>
                            <label class="block text-xs uppercase font-black text-sky-200 mb-1">School / Branch</label>
                            <input type="text" name="school" value="J & K Designs Academy"
                                   class="w-full bg-[#081538] border-2 border-emerald-400 rounded-xl p-3 text-white text-sm focus:border-cyan-300 focus:ring-0">
                        </div>
                        <div>
                            <label class="block text-xs uppercase font-black text-sky-200 mb-1">Percel / Employee #</label>
                            <input type="text" name="percel_number" placeholder="e.g. PRC-9842"
                                   class="w-full bg-[#081538] border-2 border-emerald-400 rounded-xl p-3 text-white text-sm focus:border-cyan-300 focus:ring-0">
                        </div>
                        <div>
                            <label class="block text-xs uppercase font-black text-sky-200 mb-1">Contact Phone #</label>
                            <input type="text" name="contact_number" placeholder="e.g. 0823456789"
                                   class="w-full bg-[#081538] border-2 border-emerald-400 rounded-xl p-3 text-white text-sm focus:border-cyan-300 focus:ring-0">
                        </div>
                    </div>

                    <div class="flex justify-end gap-3 pt-4 border-t border-sky-400/30">
                        <button type="button" @click="showTeacherModal = false"
                                class="px-5 py-2.5 rounded-xl border border-sky-400 text-sky-200 hover:text-white font-bold text-sm">
                            Cancel
                        </button>
                        <button type="submit"
                                class="px-6 py-2.5 bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-black text-sm rounded-xl shadow-lg border-2 border-emerald-400">
                            Add Teacher Now
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- ========================================================================= -->
        <!-- MODAL 3: CREATE CLASS (FULLY WORKING) -->
        <!-- ========================================================================= -->
        <div x-show="showClassModal"
             x-cloak
             class="fixed inset-0 z-50 overflow-y-auto bg-black/80 backdrop-blur-sm flex items-center justify-center p-4">
            <div @click.away="showClassModal = false"
                 class="bg-[#0f286b] rounded-3xl border-2 border-purple-400 shadow-2xl max-w-2xl w-full text-white p-6 sm:p-8 space-y-6 relative max-h-[90vh] overflow-y-auto">
                <div class="flex items-center justify-between pb-4 border-b-2 border-sky-400/30">
                    <div>
                        <span class="px-3 py-1 bg-purple-400 text-slate-950 font-black text-xs rounded-full uppercase tracking-wider">
                            Curriculum Timetable
                        </span>
                        <h3 class="text-2xl font-black text-white mt-1">Create Academic Class</h3>
                    </div>
                    <button type="button" @click="showClassModal = false" class="text-sky-300 hover:text-white text-2xl font-black">&times;</button>
                </div>

                <form method="POST" action="{{ route('admin.classes.store') }}" class="space-y-4">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs uppercase font-black text-sky-200 mb-1">Class Name <span class="text-red-400">*</span></label>
                            <input type="text" name="name" required placeholder="e.g. Grade 11 - Class A"
                                   class="w-full bg-[#081538] border-2 border-purple-400 rounded-xl p-3 text-white text-sm focus:border-cyan-300 focus:ring-0">
                        </div>
                        <div>
                            <label class="block text-xs uppercase font-black text-sky-200 mb-1">Grade Level <span class="text-red-400">*</span></label>
                            <select name="grade" required class="w-full bg-[#081538] border-2 border-purple-400 rounded-xl p-3 text-white text-sm focus:border-cyan-300 focus:ring-0">
                                <option value="Grade 8">Grade 8</option>
                                <option value="Grade 9">Grade 9</option>
                                <option value="Grade 10">Grade 10</option>
                                <option value="Grade 11" selected>Grade 11</option>
                                <option value="Grade 12">Grade 12</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs uppercase font-black text-sky-200 mb-1">Room / Venue</label>
                            <input type="text" name="room" placeholder="e.g. Room 14C / Math Studio"
                                   class="w-full bg-[#081538] border-2 border-purple-400 rounded-xl p-3 text-white text-sm focus:border-cyan-300 focus:ring-0">
                        </div>
                        <div>
                            <label class="block text-xs uppercase font-black text-sky-200 mb-1">Class Capacity (Learners)</label>
                            <input type="number" name="capacity" value="35" min="5" max="60"
                                   class="w-full bg-[#081538] border-2 border-purple-400 rounded-xl p-3 text-white text-sm focus:border-cyan-300 focus:ring-0">
                        </div>
                        <div>
                            <label class="block text-xs uppercase font-black text-sky-200 mb-1">Assigned Teacher</label>
                            <input type="text" name="teacher_name" placeholder="e.g. Mrs. S. Smith"
                                   class="w-full bg-[#081538] border-2 border-purple-400 rounded-xl p-3 text-white text-sm focus:border-cyan-300 focus:ring-0">
                        </div>
                        <div>
                            <label class="block text-xs uppercase font-black text-sky-200 mb-1">Academic Year</label>
                            <input type="text" name="academic_year" value="2026/2027"
                                   class="w-full bg-[#081538] border-2 border-purple-400 rounded-xl p-3 text-white text-sm focus:border-cyan-300 focus:ring-0">
                        </div>
                        <div class="sm:col-span-2">
                            <label class="block text-xs uppercase font-black text-sky-200 mb-1">Class Description</label>
                            <textarea name="description" rows="2" placeholder="Academic focus and specialized subject stream..."
                                      class="w-full bg-[#081538] border-2 border-purple-400 rounded-xl p-3 text-white text-sm focus:border-cyan-300 focus:ring-0"></textarea>
                        </div>
                    </div>

                    <div class="flex justify-end gap-3 pt-4 border-t border-sky-400/30">
                        <button type="button" @click="showClassModal = false"
                                class="px-5 py-2.5 rounded-xl border border-sky-400 text-sky-200 hover:text-white font-bold text-sm">
                            Cancel
                        </button>
                        <button type="submit"
                                class="px-6 py-2.5 bg-purple-500 hover:bg-purple-400 text-white font-black text-sm rounded-xl shadow-lg border-2 border-purple-400">
                            Create Class Now
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- ========================================================================= -->
        <!-- MODAL 4: GENERATE REPORT (FULLY WORKING) -->
        <!-- ========================================================================= -->
        <div x-show="showReportModal"
             x-cloak
             class="fixed inset-0 z-50 overflow-y-auto bg-black/80 backdrop-blur-sm flex items-center justify-center p-4">
            <div @click.away="showReportModal = false"
                 class="bg-[#0f286b] rounded-3xl border-2 border-amber-400 shadow-2xl max-w-2xl w-full text-white p-6 sm:p-8 space-y-6 relative max-h-[90vh] overflow-y-auto">
                <div class="flex items-center justify-between pb-4 border-b-2 border-sky-400/30">
                    <div>
                        <span class="px-3 py-1 bg-amber-400 text-slate-950 font-black text-xs rounded-full uppercase tracking-wider">
                            Analytics &amp; Compliance
                        </span>
                        <h3 class="text-2xl font-black text-white mt-1">Generate Academy Reports</h3>
                    </div>
                    <button type="button" @click="showReportModal = false" class="text-sky-300 hover:text-white text-2xl font-black">&times;</button>
                </div>

                <div class="space-y-4">
                    <p class="text-sm text-sky-200 font-bold">Select an official academic report to generate and download in real-time CSV spreadsheet format:</p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <!-- Report 1: Students Roster -->
                        <div class="p-4 bg-[#081538] rounded-2xl border-2 border-sky-400/50 hover:border-cyan-300 transition flex flex-col justify-between">
                            <div>
                                <span class="text-xl">🎓</span>
                                <h4 class="font-black text-white text-base mt-1">Student Enrollment Roster</h4>
                                <p class="text-xs text-sky-200 mt-1">Complete student list with parent contacts, grade levels, and status.</p>
                            </div>
                            <a href="{{ route('admin.reports.export', ['type' => 'students']) }}"
                               class="mt-4 inline-flex items-center justify-center px-4 py-2 bg-cyan-400 hover:bg-cyan-300 text-slate-950 font-black text-xs uppercase tracking-wider rounded-xl shadow transition">
                                Download CSV &darr;
                            </a>
                        </div>

                        <!-- Report 2: Teachers Allocation -->
                        <div class="p-4 bg-[#081538] rounded-2xl border-2 border-emerald-400/50 hover:border-emerald-300 transition flex flex-col justify-between">
                            <div>
                                <span class="text-xl">👩‍🏫</span>
                                <h4 class="font-black text-white text-base mt-1">Teacher Faculty Roster</h4>
                                <p class="text-xs text-sky-200 mt-1">Registered educators, subjects taught, schools and percel numbers.</p>
                            </div>
                            <a href="{{ route('admin.reports.export', ['type' => 'teachers']) }}"
                               class="mt-4 inline-flex items-center justify-center px-4 py-2 bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-black text-xs uppercase tracking-wider rounded-xl shadow transition">
                                Download CSV &darr;
                            </a>
                        </div>

                        <!-- Report 3: Classes Overview -->
                        <div class="p-4 bg-[#081538] rounded-2xl border-2 border-purple-400/50 hover:border-purple-300 transition flex flex-col justify-between">
                            <div>
                                <span class="text-xl">🏫</span>
                                <h4 class="font-black text-white text-base mt-1">Class Allocation Report</h4>
                                <p class="text-xs text-sky-200 mt-1">All academic sections, assigned venues, educator heads, and capacities.</p>
                            </div>
                            <a href="{{ route('admin.reports.export', ['type' => 'classes']) }}"
                               class="mt-4 inline-flex items-center justify-center px-4 py-2 bg-purple-500 hover:bg-purple-400 text-white font-black text-xs uppercase tracking-wider rounded-xl shadow transition">
                                Download CSV &darr;
                            </a>
                        </div>

                        <!-- Report 4: Executive System Summary -->
                        <div class="p-4 bg-[#081538] rounded-2xl border-2 border-amber-400/50 hover:border-amber-300 transition flex flex-col justify-between">
                            <div>
                                <span class="text-xl">📊</span>
                                <h4 class="font-black text-white text-base mt-1">Executive Summary Report</h4>
                                <p class="text-xs text-sky-200 mt-1">Overall academy metrics, enrollment figures, attendance and users.</p>
                            </div>
                            <a href="{{ route('admin.reports.export', ['type' => 'summary']) }}"
                               class="mt-4 inline-flex items-center justify-center px-4 py-2 bg-amber-400 hover:bg-amber-300 text-slate-950 font-black text-xs uppercase tracking-wider rounded-xl shadow transition">
                                Download CSV &darr;
                            </a>
                        </div>
                    </div>

                    <div class="flex justify-end pt-4 border-t border-sky-400/30">
                        <button type="button" @click="showReportModal = false"
                                class="px-5 py-2.5 rounded-xl border border-sky-400 text-sky-200 hover:text-white font-bold text-sm">
                            Close Report Desk
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
