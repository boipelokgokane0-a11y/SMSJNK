<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                    Student Welcome Dashboard
                </h2>
                <p class="text-sm text-gray-600">Welcome, Student {{ $user->name }}!</p>
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
            <div class="bg-gradient-to-r from-blue-600 to-indigo-800 rounded-2xl shadow-lg p-6 sm:p-8 text-white">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                    <div>
                        <span class="inline-block px-3 py-1 bg-blue-500/30 text-blue-100 text-xs font-semibold rounded-full uppercase tracking-wider mb-2">
                            Student Portal
                        </span>
                        <h1 class="text-3xl font-extrabold tracking-tight">Welcome, {{ $user->name }}!</h1>
                        <p class="text-blue-100 mt-1 max-w-2xl">
                            You are enrolled in <strong class="underline decoration-blue-300">{{ $user->grade ?? 'your grade' }}</strong> at <strong class="underline decoration-blue-300">{{ $user->school ?? 'your school' }}</strong>.
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

            <!-- Student Highlights -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <!-- Grade -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <p class="text-xs uppercase font-semibold text-gray-500 tracking-wider">Current Grade</p>
                    <p class="text-2xl font-extrabold text-blue-600 mt-2">{{ $user->grade ?? 'Not assigned' }}</p>
                    <p class="text-xs text-gray-500 mt-1">Academic grade level</p>
                </div>

                <!-- School -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <p class="text-xs uppercase font-semibold text-gray-500 tracking-wider">Enrolled School</p>
                    <p class="text-xl font-bold text-gray-800 mt-2">{{ $user->school ?? 'Not specified' }}</p>
                    <p class="text-xs text-gray-500 mt-1">Attending educational institution</p>
                </div>

                <!-- Contact # -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <p class="text-xs uppercase font-semibold text-gray-500 tracking-wider">Contact Phone</p>
                    <p class="text-xl font-mono font-bold text-gray-800 mt-2">{{ $user->contact_number ?? 'Not provided' }}</p>
                    <p class="text-xs text-gray-500 mt-1">Registered phone contact</p>
                </div>
            </div>

            <!-- Full Student Profile Information Card -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                    <h3 class="text-lg font-bold text-gray-800">Your Student Profile Information</h3>
                    <p class="text-xs text-gray-500">All registered student details and next of kin information</p>
                </div>

                <div class="p-6 space-y-6">
                    <!-- 1. Personal Information -->
                    <div>
                        <h4 class="text-sm font-semibold uppercase text-blue-800 border-b border-gray-100 pb-1 mb-3">
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
                                <dt class="text-xs text-gray-500">Grade Level</dt>
                                <dd class="font-semibold text-indigo-700 mt-1">{{ $user->grade ?? 'N/A' }}</dd>
                            </div>
                        </dl>
                    </div>

                    <!-- 2. Academic & Contact Details -->
                    <div>
                        <h4 class="text-sm font-semibold uppercase text-blue-800 border-b border-gray-100 pb-1 mb-3">
                            2. Academic & Contact Details
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
                                <dt class="text-xs text-gray-500">School</dt>
                                <dd class="font-semibold text-gray-900 mt-1">{{ $user->school ?? 'N/A' }}</dd>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-lg sm:col-span-3">
                                <dt class="text-xs text-gray-500">Residential Address</dt>
                                <dd class="font-medium text-gray-900 mt-1">{{ $user->address ?? 'N/A' }}</dd>
                            </div>
                        </dl>
                    </div>

                    <!-- 3. Next of Kin Information -->
                    <div>
                        <h4 class="text-sm font-semibold uppercase text-blue-800 border-b border-gray-100 pb-1 mb-3">
                            3. Next of Kin Details
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
                        Log Out of Student Account
                    </button>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
