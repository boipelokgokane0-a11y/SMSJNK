<x-app-layout>
<div class="bg-[#0a1f44] min-h-screen py-8 text-white">
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h2 class="font-bold text-2xl text-white leading-tight">
                    Admin Welcome Dashboard
                </h2>
                <p class="text-sm text-gray-600">Welcome, {{ $user->name }}! You have full administrative access.</p>
            </div>

            <!-- Prominent Logout Button -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                        class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-semibold text-sm rounded-lg shadow transition focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    Log Out
                </button>
            </form>
        </div>
    </x-slot>

    <!-- Quick Action Buttons -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 my-6">
        <a href="{{ route('student.dashboard') }}" class="inline-flex items-center justify-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow transition">
            Register Students
        </a>
        <a href="#" class="inline-flex items-center justify-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg shadow transition">
            Create Class
        </a>
        <a href="#" class="inline-flex items-center justify-center px-4 py-2 bg-yellow-600 hover:bg-yellow-700 text-white font-semibold rounded-lg shadow transition">
            Generate Report
        </a>
        <a href="#" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg shadow transition">
            Add Teacher
        </a>
    </div>

    <!-- Stats Overview (Extended) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex items-center justify-between">
            <div>
                <p class="text-xs uppercase font-semibold text-gray-500 tracking-wider">Total Students (Student Management)</p>
                <p class="text-3xl font-extrabold text-indigo-600 mt-2">{{ $totalStudents }}</p>
            </div>
            <div class="w-12 h-12 bg-indigo-50 text-indigo-600 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/></svg>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex items-center justify-between">
            <div>
                <p class="text-xs uppercase font-semibold text-gray-500 tracking-wider">Total Teachers (Teacher Management)</p>
                <p class="text-3xl font-extrabold text-emerald-600 mt-2">{{ $totalTeachers }}</p>
            </div>
            <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1"/></svg>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex items-center justify-between">
            <div>
                <p class="text-xs uppercase font-semibold text-gray-500 tracking-wider">Attendance Today</p>
                <p class="text-3xl font-extrabold text-blue-600 mt-2">{{ $attendanceToday }}</p>
            </div>
            <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex items-center justify-between">
            <div>
                <p class="text-xs uppercase font-semibold text-gray-500 tracking-wider">Total Classes (Class Management)</p>
                <p class="text-3xl font-extrabold text-purple-600 mt-2">{{ $totalClasses }}</p>
            </div>
            <div class="w-12 h-12 bg-purple-50 text-purple-600 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6"/></svg>
            </div>
        </div>
    </div>

    <!-- Reports & Analytics Section -->
    <div class="mt-8">
        <h2 class="text-lg font-bold text-gray-800 mb-4">Reports & Analytics</h2>
        <p class="text-sm text-gray-600">(Placeholder for future analytics charts and reports.)</p>
    </div>

    <!-- Recent Activities -->
    <div class="mt-8">
        <h2 class="text-lg font-bold text-gray-800 mb-4">Recent Activities</h2>
        <ul class="space-y-2">
            @foreach($recentActivities as $activity)
                <li class="flex justify-between items-center bg-gray-50 p-3 rounded">
                    <span class="font-medium">{{ $activity['message'] }}</span>
                    <span class="text-xs {{ $activity['status'] === 'completed' ? 'text-green-600' : 'text-yellow-600' }}">{{ ucfirst($activity['status']) }}</span>
                </li>
            @endforeach
        </ul>
    </div>
    @include('dashboard.partials.admin-info')

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Welcome Banner -->
            <div class="bg-gradient-to-r from-indigo-700 to-indigo-900 rounded-2xl shadow-lg p-6 sm:p-8 text-white">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                    <div>
                        <span class="inline-block px-3 py-1 bg-indigo-500/30 text-indigo-200 text-xs font-semibold rounded-full uppercase tracking-wider mb-2">
                            Administrator Portal
                        </span>
                        <h1 class="text-3xl font-extrabold tracking-tight">Welcome back, {{ $user->name }}!</h1>
                        <p class="text-indigo-200 mt-1 max-w-2xl">
                            Here is an overview of registered teachers, students, and overall system activity.
                        </p>
                    </div>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="inline-flex items-center px-5 py-2.5 bg-white/10 hover:bg-white/20 text-white border border-white/30 font-medium text-sm rounded-xl transition">
                            Log Out Now
                        </button>
                    </form>
                </div>
            </div>

            <!-- Stats Overview -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <!-- Total Students -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex items-center justify-between">
                    <div>
                        <p class="text-xs uppercase font-semibold text-gray-500 tracking-wider">Total Students</p>
                        <p class="text-3xl font-extrabold text-indigo-600 mt-2">{{ $totalStudents }}</p>
                    </div>
                    <div class="w-12 h-12 bg-indigo-50 text-indigo-600 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                        </svg>
                    </div>
                </div>

                <!-- Total Teachers -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex items-center justify-between">
                    <div>
                        <p class="text-xs uppercase font-semibold text-gray-500 tracking-wider">Total Teachers</p>
                        <p class="text-3xl font-extrabold text-emerald-600 mt-2">{{ $totalTeachers }}</p>
                    </div>
                    <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                        </svg>
                    </div>
                </div>

                <!-- Total Users -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex items-center justify-between">
                    <div>
                        <p class="text-xs uppercase font-semibold text-gray-500 tracking-wider">Total Users</p>
                        <p class="text-3xl font-extrabold text-blue-600 mt-2">{{ $totalUsers }}</p>
                    </div>
                    <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Recent Teachers Table -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 bg-gray-50 flex justify-between items-center">
                    <div>
                        <h3 class="font-bold text-lg text-gray-800">Recently Registered Teachers</h3>
                        <p class="text-xs text-gray-500">Educators who registered in the system</p>
                    </div>
                    <span class="px-3 py-1 bg-emerald-100 text-emerald-800 text-xs font-semibold rounded-full">
                        {{ $recentTeachers->count() }} Records
                    </span>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-600">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                            <tr>
                                <th class="px-6 py-3">Teacher Names</th>
                                <th class="px-6 py-3">Subject</th>
                                <th class="px-6 py-3">School</th>
                                <th class="px-6 py-3">Percel #</th>
                                <th class="px-6 py-3">Contact</th>
                                <th class="px-6 py-3">Qualifications Document</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse($recentTeachers as $teacher)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">
                                        <div class="font-semibold text-gray-900">{{ $teacher->name }}</div>
                                        <div class="text-xs text-gray-500">{{ $teacher->email }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="px-2.5 py-1 bg-emerald-50 text-emerald-700 text-xs font-medium rounded-full">
                                            {{ $teacher->subject_to_be_taught ?? 'Not specified' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-800">
                                        {{ $teacher->school ?? 'N/A' }}
                                    </td>
                                    <td class="px-6 py-4 font-mono text-xs">
                                        {{ $teacher->percel_number ?? 'N/A' }}
                                    </td>
                                    <td class="px-6 py-4 text-xs">
                                        {{ $teacher->contact_number ?? 'N/A' }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @if($teacher->qualifications_document)
                                            <a href="{{ route('teacher.qualifications.download', $teacher) }}"
                                               class="inline-flex items-center text-xs font-medium text-indigo-600 hover:text-indigo-900 underline">
                                                <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                                </svg>
                                                Download Doc
                                            </a>
                                        @else
                                            <span class="text-xs text-gray-400 italic">None uploaded</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-8 text-center text-gray-400 italic">
                                        No teachers registered yet.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Recent Students Table -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 bg-gray-50 flex justify-between items-center">
                    <div>
                        <h3 class="font-bold text-lg text-gray-800">Recently Registered Students</h3>
                        <p class="text-xs text-gray-500">Learners registered in the system</p>
                    </div>
                    <span class="px-3 py-1 bg-indigo-100 text-indigo-800 text-xs font-semibold rounded-full">
                        {{ $recentStudents->count() }} Records
                    </span>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-600">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                            <tr>
                                <th class="px-6 py-3">Student Names</th>
                                <th class="px-6 py-3">Grade</th>
                                <th class="px-6 py-3">School</th>
                                <th class="px-6 py-3">Contact</th>
                                <th class="px-6 py-3">Next of Kin</th>
                                <th class="px-6 py-3">ID / Passport</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse($recentStudents as $student)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">
                                        <div class="font-semibold text-gray-900">{{ $student->name }}</div>
                                        <div class="text-xs text-gray-500">{{ $student->email }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="px-2.5 py-1 bg-indigo-50 text-indigo-700 text-xs font-semibold rounded-full">
                                            {{ $student->grade ?? 'N/A' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-800">
                                        {{ $student->school ?? 'N/A' }}
                                    </td>
                                    <td class="px-6 py-4 text-xs">
                                        {{ $student->contact_number ?? 'N/A' }}
                                    </td>
                                    <td class="px-6 py-4 text-xs">
                                        <div class="font-medium text-gray-900">{{ $student->next_of_kin_name ?? 'N/A' }}</div>
                                        <div class="text-gray-500">{{ $student->next_of_kin_relationship ?? '' }} ({{ $student->next_of_kin_contact ?? '' }})</div>
                                    </td>
                                    <td class="px-6 py-4 font-mono text-xs text-gray-500">
                                        {{ $student->id_number ?: ($student->passport ?: 'N/A') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-8 text-center text-gray-400 italic">
                                        No students registered yet.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Footer Actions -->
            <div class="flex justify-end pt-4">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="inline-flex items-center px-6 py-2.5 bg-red-600 hover:bg-red-700 text-white font-semibold text-sm rounded-lg shadow transition">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Sign Out of Admin Account
                    </button>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
</div>
