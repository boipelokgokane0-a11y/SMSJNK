<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                    Teacher Welcome Dashboard
                </h2>
                <p class="text-sm text-gray-600">Welcome, Educator {{ $user->name }}!</p>
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

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Welcome Banner -->
            <div class="bg-gradient-to-r from-emerald-600 to-teal-800 rounded-2xl shadow-lg p-6 sm:p-8 text-white">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                    <div>
                        <span class="inline-block px-3 py-1 bg-emerald-500/30 text-emerald-100 text-xs font-semibold rounded-full uppercase tracking-wider mb-2">
                            Teacher Portal
                        </span>
                        <h1 class="text-3xl font-extrabold tracking-tight">Welcome, {{ $user->name }}!</h1>
                        <p class="text-emerald-100 mt-1 max-w-2xl">
                            You are registered as a Teacher at <strong class="underline decoration-emerald-300">{{ $user->school ?? 'your school' }}</strong>.
                        </p>
                    </div>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="inline-flex items-center px-5 py-2.5 bg-white/10 hover:bg-white/20 text-white border border-white/30 font-medium text-sm rounded-xl transition">
                            Log Out
                        </button>
                    </form>
                </div>
            </div>

            <!-- Key Teaching Highlights -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <!-- Subject to be Taught -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <p class="text-xs uppercase font-semibold text-gray-500 tracking-wider">Subject to be Taught</p>
                    <p class="text-xl font-bold text-emerald-700 mt-2">{{ $user->subject_to_be_taught ?? 'Not specified' }}</p>
                    <p class="text-xs text-gray-500 mt-1">Primary instructional discipline</p>
                </div>

                <!-- School Teaching At -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <p class="text-xs uppercase font-semibold text-gray-500 tracking-wider">School Teaching At</p>
                    <p class="text-xl font-bold text-gray-800 mt-2">{{ $user->school ?? 'Not specified' }}</p>
                    <p class="text-xs text-gray-500 mt-1">Current institution assignment</p>
                </div>

                <!-- Percel Number -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <p class="text-xs uppercase font-semibold text-gray-500 tracking-wider">Percel Number</p>
                    <p class="text-xl font-mono font-bold text-gray-800 mt-2">{{ $user->percel_number ?? 'Not assigned' }}</p>
                    <p class="text-xs text-gray-500 mt-1">Official educator reference ID</p>
                </div>
            </div>

            <!-- Full Teacher Profile Information Card -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 bg-gray-50 flex justify-between items-center">
                    <div>
                        <h3 class="text-lg font-bold text-gray-800">Your Teacher Profile Information</h3>
                        <p class="text-xs text-gray-500">All registered credentials and personal details</p>
                    </div>

                    @if($user->qualifications_document)
                        <a href="{{ route('teacher.qualifications.download', $user) }}"
                           class="inline-flex items-center px-3 py-1.5 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-semibold rounded-lg shadow-sm transition">
                            <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            Download Qualifications Document
                        </a>
                    @endif
                </div>

                <div class="p-6 space-y-6">
                    <!-- 1. Personal Information -->
                    <div>
                        <h4 class="text-sm font-semibold uppercase text-emerald-800 border-b border-gray-100 pb-1 mb-3">
                            1. Personal Details
                        </h4>
                        <dl class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 text-sm">
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <dt class="text-xs text-gray-500">Names & Surname</dt>
                                <dd class="font-semibold text-gray-900 mt-1">{{ $user->name }}</dd>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <dt class="text-xs text-gray-500">Date of Birth (DOB)</dt>
                                <dd class="font-semibold text-gray-900 mt-1">{{ $user->dob ? $user->dob->format('Y-m-d') : 'N/A' }}</dd>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <dt class="text-xs text-gray-500">Gender</dt>
                                <dd class="font-semibold text-gray-900 mt-1">{{ $user->gender ?? 'N/A' }}</dd>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <dt class="text-xs text-gray-500">Ethnicity</dt>
                                <dd class="font-semibold text-gray-900 mt-1">{{ $user->ethnicity ?? 'N/A' }}</dd>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <dt class="text-xs text-gray-500">ID Number</dt>
                                <dd class="font-mono font-semibold text-gray-900 mt-1">{{ $user->id_number ?: 'N/A' }}</dd>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <dt class="text-xs text-gray-500">Passport Number</dt>
                                <dd class="font-mono font-semibold text-gray-900 mt-1">{{ $user->passport ?: 'N/A' }}</dd>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <dt class="text-xs text-gray-500">Marital Status</dt>
                                <dd class="font-semibold text-gray-900 mt-1">{{ $user->marital_status ?? 'N/A' }}</dd>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <dt class="text-xs text-gray-500">Qualifications Doc</dt>
                                <dd class="font-semibold text-gray-900 mt-1">
                                    @if($user->qualifications_document)
                                        <span class="text-emerald-600 font-medium">Uploaded</span>
                                    @else
                                        <span class="text-gray-400">Not provided</span>
                                    @endif
                                </dd>
                            </div>
                        </dl>
                    </div>

                    <!-- 2. Professional & Contact Details -->
                    <div>
                        <h4 class="text-sm font-semibold uppercase text-emerald-800 border-b border-gray-100 pb-1 mb-3">
                            2. Professional & Contact Details
                        </h4>
                        <dl class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-sm">
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <dt class="text-xs text-gray-500">Email Address</dt>
                                <dd class="font-semibold text-gray-900 mt-1">{{ $user->email }}</dd>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <dt class="text-xs text-gray-500">Contact #</dt>
                                <dd class="font-semibold text-gray-900 mt-1">{{ $user->contact_number ?? 'N/A' }}</dd>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <dt class="text-xs text-gray-500">School You're Teaching At</dt>
                                <dd class="font-semibold text-gray-900 mt-1">{{ $user->school ?? 'N/A' }}</dd>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-lg sm:col-span-3">
                                <dt class="text-xs text-gray-500">Physical Address</dt>
                                <dd class="font-medium text-gray-900 mt-1">{{ $user->address ?? 'N/A' }}</dd>
                            </div>
                        </dl>
                    </div>

                    <!-- 3. Next of Kin Information -->
                    <div>
                        <h4 class="text-sm font-semibold uppercase text-emerald-800 border-b border-gray-100 pb-1 mb-3">
                            3. Next of Kin Information
                        </h4>
                        <dl class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-sm">
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <dt class="text-xs text-gray-500">Next of Kin Names</dt>
                                <dd class="font-semibold text-gray-900 mt-1">{{ $user->next_of_kin_name ?? 'N/A' }}</dd>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <dt class="text-xs text-gray-500">Relationship to Next of Kin</dt>
                                <dd class="font-semibold text-gray-900 mt-1">{{ $user->next_of_kin_relationship ?? 'N/A' }}</dd>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <dt class="text-xs text-gray-500">Contact of Next of Kin</dt>
                                <dd class="font-semibold text-gray-900 mt-1">{{ $user->next_of_kin_contact ?? 'N/A' }}</dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>

            <!-- Footer Prominent Logout Button -->
            <div class="flex justify-between items-center pt-4">
                <a href="{{ route('profile.edit') }}" class="text-sm text-gray-600 hover:text-gray-900 underline">
                    Edit Account Profile
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="inline-flex items-center px-6 py-2.5 bg-red-600 hover:bg-red-700 text-white font-semibold text-sm rounded-lg shadow transition">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Log Out of Teacher Account
                    </button>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
