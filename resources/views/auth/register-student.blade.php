<x-guest-layout maxWidth="max-w-4xl">
    <div class="mb-8">
        <!-- Badge -->
        <div class="flex flex-wrap items-center justify-between gap-3 pb-4 border-b-2 border-sky-400/30">
            <div class="flex items-center gap-2">
                <span class="px-3.5 py-1 rounded-full text-xs font-black bg-cyan-400 text-slate-950 uppercase tracking-widest shadow">
                    🎓 Student Enrollment
                </span>
                <span class="px-3 py-1 rounded-full text-xs font-black bg-blue-950 text-cyan-300 border border-sky-400/50">
                    J &amp; K Designs Academy
                </span>
            </div>
            <!-- Role Selector Tabs in Landing Page Palette -->
            <div class="inline-flex rounded-xl p-1 bg-[#081538] border-2 border-sky-400/50 text-xs font-black">
                <a href="{{ route('register.student') }}"
                   class="px-4 py-1.5 rounded-lg bg-cyan-400 text-slate-950 shadow-md">
                    Student Registration
                </a>
                <a href="{{ route('register.teacher') }}"
                   class="px-4 py-1.5 rounded-lg text-sky-200 hover:text-white transition">
                    Teacher Registration
                </a>
            </div>
        </div>

        <div class="mt-4">
            <h2 class="text-3xl sm:text-4xl font-black text-white">Student Matriculation Form</h2>
            <p class="text-sm text-sky-200 font-bold mt-1">Please provide complete learner and parent information for official academy enrolment.</p>
        </div>
    </div>

    @if ($errors->any())
        <div class="mb-6 p-4 rounded-2xl bg-red-950/80 border-2 border-red-400 text-white shadow-xl">
            <h4 class="font-black text-sm flex items-center gap-2"><span>⚠️</span> Please resolve the following errors:</h4>
            <ul class="list-disc list-inside text-xs font-semibold text-red-200 mt-1.5 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register.student.store') }}" class="space-y-6">
        @csrf
        <input type="hidden" name="role" value="student">

        <!-- 1. Personal Learner Information -->
        <div class="p-6 bg-[#081538] rounded-2xl border-2 border-sky-400/40 shadow-xl space-y-4">
            <h3 class="text-xs uppercase font-black text-cyan-300 tracking-wider pb-2 border-b border-sky-400/30 flex items-center gap-2">
                <span>👤</span>
                <span>1. Learner Personal Details</span>
            </h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- Names -->
                <div>
                    <label for="first_name" class="block text-xs uppercase font-black text-sky-200 tracking-wider mb-1">First Names <span class="text-red-400">*</span></label>
                    <input id="first_name" type="text" name="first_name" value="{{ old('first_name') }}" required autofocus placeholder="e.g. Thabo"
                           class="w-full bg-[#0a1a47] border-2 border-sky-400 rounded-xl p-3 text-white text-sm font-bold focus:border-cyan-300 focus:ring-2 focus:ring-cyan-300 outline-none">
                </div>

                <!-- Surname -->
                <div>
                    <label for="surname" class="block text-xs uppercase font-black text-sky-200 tracking-wider mb-1">Surname <span class="text-red-400">*</span></label>
                    <input id="surname" type="text" name="surname" value="{{ old('surname') }}" required placeholder="e.g. Dlamini"
                           class="w-full bg-[#0a1a47] border-2 border-sky-400 rounded-xl p-3 text-white text-sm font-bold focus:border-cyan-300 focus:ring-2 focus:ring-cyan-300 outline-none">
                </div>

                <!-- Date of Birth -->
                <div>
                    <label for="dob" class="block text-xs uppercase font-black text-sky-200 tracking-wider mb-1">Date of Birth (DOB) <span class="text-red-400">*</span></label>
                    <input id="dob" type="date" name="dob" value="{{ old('dob') }}" required
                           class="w-full bg-[#0a1a47] border-2 border-sky-400 rounded-xl p-3 text-white text-sm font-bold focus:border-cyan-300 focus:ring-2 focus:ring-cyan-300 outline-none">
                </div>

                <!-- Gender -->
                <div>
                    <label for="gender" class="block text-xs uppercase font-black text-sky-200 tracking-wider mb-1">Gender <span class="text-red-400">*</span></label>
                    <select id="gender" name="gender" required
                            class="w-full bg-[#0a1a47] border-2 border-sky-400 rounded-xl p-3 text-white text-sm font-bold focus:border-cyan-300 focus:ring-2 focus:ring-cyan-300 outline-none">
                        <option value="" disabled {{ old('gender') ? '' : 'selected' }}>Select Gender...</option>
                        <option value="Male" {{ old('gender') === 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ old('gender') === 'Female' ? 'selected' : '' }}>Female</option>
                        <option value="Other" {{ old('gender') === 'Other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>

                <!-- Ethnicity -->
                <div>
                    <label for="ethnicity" class="block text-xs uppercase font-black text-sky-200 tracking-wider mb-1">Ethnicity <span class="text-red-400">*</span></label>
                    <select id="ethnicity" name="ethnicity" required
                            class="w-full bg-[#0a1a47] border-2 border-sky-400 rounded-xl p-3 text-white text-sm font-bold focus:border-cyan-300 focus:ring-2 focus:ring-cyan-300 outline-none">
                        <option value="" disabled {{ old('ethnicity') ? '' : 'selected' }}>Select Ethnicity...</option>
                        <option value="African / Black" {{ old('ethnicity') === 'African / Black' || !old('ethnicity') ? 'selected' : '' }}>African / Black</option>
                        <option value="Coloured" {{ old('ethnicity') === 'Coloured' ? 'selected' : '' }}>Coloured</option>
                        <option value="Indian / Asian" {{ old('ethnicity') === 'Indian / Asian' ? 'selected' : '' }}>Indian / Asian</option>
                        <option value="White" {{ old('ethnicity') === 'White' ? 'selected' : '' }}>White</option>
                        <option value="Other" {{ old('ethnicity') === 'Other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>

                <!-- Marital Status -->
                <div>
                    <label for="marital_status" class="block text-xs uppercase font-black text-sky-200 tracking-wider mb-1">Marital Status</label>
                    <select id="marital_status" name="marital_status"
                            class="w-full bg-[#0a1a47] border-2 border-sky-400 rounded-xl p-3 text-white text-sm font-bold focus:border-cyan-300 focus:ring-2 focus:ring-cyan-300 outline-none">
                        <option value="Single" selected>Single</option>
                        <option value="Married">Married</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <!-- ID Number -->
                <div>
                    <label for="id_number" class="block text-xs uppercase font-black text-sky-200 tracking-wider mb-1">ID Number</label>
                    <input id="id_number" type="text" name="id_number" value="{{ old('id_number') }}" placeholder="National ID number"
                           class="w-full bg-[#0a1a47] border-2 border-sky-400 rounded-xl p-3 text-white text-sm font-mono focus:border-cyan-300 focus:ring-2 focus:ring-cyan-300 outline-none">
                </div>

                <!-- Passport -->
                <div>
                    <label for="passport" class="block text-xs uppercase font-black text-sky-200 tracking-wider mb-1">Passport (If Applicable)</label>
                    <input id="passport" type="text" name="passport" value="{{ old('passport') }}" placeholder="Passport number"
                           class="w-full bg-[#0a1a47] border-2 border-sky-400 rounded-xl p-3 text-white text-sm font-mono focus:border-cyan-300 focus:ring-2 focus:ring-cyan-300 outline-none">
                </div>

                <!-- Grade -->
                <div>
                    <label for="grade" class="block text-xs uppercase font-black text-sky-200 tracking-wider mb-1">Grade Level <span class="text-red-400">*</span></label>
                    <select id="grade" name="grade" required
                            class="w-full bg-[#0a1a47] border-2 border-sky-400 rounded-xl p-3 text-white text-sm font-bold focus:border-cyan-300 focus:ring-2 focus:ring-cyan-300 outline-none">
                        <option value="Grade 8" {{ old('grade') === 'Grade 8' ? 'selected' : '' }}>Grade 8</option>
                        <option value="Grade 9" {{ old('grade') === 'Grade 9' ? 'selected' : '' }}>Grade 9</option>
                        <option value="Grade 10" {{ old('grade') === 'Grade 10' || !old('grade') ? 'selected' : '' }}>Grade 10</option>
                        <option value="Grade 11" {{ old('grade') === 'Grade 11' ? 'selected' : '' }}>Grade 11</option>
                        <option value="Grade 12" {{ old('grade') === 'Grade 12' ? 'selected' : '' }}>Grade 12</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- 2. Parents / Guardian Information (Prominently Pre-Filled as Requested) -->
        <div class="p-6 bg-[#081538] rounded-2xl border-2 border-cyan-400 shadow-xl space-y-4">
            <h3 class="text-xs uppercase font-black text-cyan-300 tracking-wider pb-2 border-b border-cyan-400/40 flex items-center gap-2">
                <span>👨‍👩‍👧</span>
                <span>2. Parent / Legal Guardian Details</span>
            </h3>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <!-- Parents Name -->
                <div>
                    <label for="parent_name" class="block text-xs uppercase font-black text-cyan-300 tracking-wider mb-1">Parents Name <span class="text-red-400">*</span></label>
                    <input id="parent_name" type="text" name="parent_name" value="{{ old('parent_name', 'Mixo Mdaka') }}" required
                           class="w-full bg-[#0a1a47] border-2 border-cyan-400 rounded-xl p-3 text-white text-sm font-black focus:border-cyan-300 focus:ring-2 focus:ring-cyan-300 outline-none shadow-sm">
                </div>

                <!-- Parents Contact Details -->
                <div>
                    <label for="parent_contact" class="block text-xs uppercase font-black text-cyan-300 tracking-wider mb-1">Parents Contact Details <span class="text-red-400">*</span></label>
                    <input id="parent_contact" type="text" name="parent_contact" value="{{ old('parent_contact', '0713998559') }}" required
                           class="w-full bg-[#0a1a47] border-2 border-cyan-400 rounded-xl p-3 text-cyan-300 text-sm font-mono font-black focus:border-cyan-300 focus:ring-2 focus:ring-cyan-300 outline-none shadow-sm">
                </div>

                <!-- Parents Email -->
                <div>
                    <label for="parent_email" class="block text-xs uppercase font-black text-cyan-300 tracking-wider mb-1">Parents Email <span class="text-red-400">*</span></label>
                    <input id="parent_email" type="email" name="parent_email" value="{{ old('parent_email', 'mixomdaka@gmail.com') }}" required
                           class="w-full bg-[#0a1a47] border-2 border-cyan-400 rounded-xl p-3 text-white text-sm font-bold focus:border-cyan-300 focus:ring-2 focus:ring-cyan-300 outline-none shadow-sm">
                </div>
            </div>
        </div>

        <!-- 3. Contact & Address Information -->
        <div class="p-6 bg-[#081538] rounded-2xl border-2 border-sky-400/40 shadow-xl space-y-4">
            <h3 class="text-xs uppercase font-black text-cyan-300 tracking-wider pb-2 border-b border-sky-400/30 flex items-center gap-2">
                <span>📍</span>
                <span>3. Contact &amp; Residential Location</span>
            </h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                <div>
                    <label for="email" class="block text-xs uppercase font-black text-sky-200 tracking-wider mb-1">Student Account Email <span class="text-red-400">*</span></label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="student@example.co.za"
                           class="w-full bg-[#0a1a47] border-2 border-sky-400 rounded-xl p-3 text-white text-sm font-bold focus:border-cyan-300 focus:ring-2 focus:ring-cyan-300 outline-none">
                </div>

                <div>
                    <label for="contact_number" class="block text-xs uppercase font-black text-sky-200 tracking-wider mb-1">Student Cellphone #</label>
                    <input id="contact_number" type="text" name="contact_number" value="{{ old('contact_number') }}" placeholder="0712345678"
                           class="w-full bg-[#0a1a47] border-2 border-sky-400 rounded-xl p-3 text-white text-sm font-mono focus:border-cyan-300 focus:ring-2 focus:ring-cyan-300 outline-none">
                </div>

                <div>
                    <label for="school" class="block text-xs uppercase font-black text-sky-200 tracking-wider mb-1">School Campus</label>
                    <input id="school" type="text" name="school" value="{{ old('school', 'J & K Designs Academy') }}"
                           class="w-full bg-[#0a1a47] border-2 border-sky-400 rounded-xl p-3 text-white text-sm font-bold focus:border-cyan-300 focus:ring-2 focus:ring-cyan-300 outline-none">
                </div>

                <div class="sm:col-span-2 lg:col-span-3">
                    <label for="address" class="block text-xs uppercase font-black text-sky-200 tracking-wider mb-1">Physical Residential Address <span class="text-red-400">*</span></label>
                    <textarea id="address" name="address" rows="2" required placeholder="Full residential street address, suburb and postal code"
                              class="w-full bg-[#0a1a47] border-2 border-sky-400 rounded-xl p-3 text-white text-sm font-medium focus:border-cyan-300 focus:ring-2 focus:ring-cyan-300 outline-none">{{ old('address') }}</textarea>
                </div>
            </div>
        </div>

        <!-- 4. Next of Kin Information -->
        <div class="p-6 bg-[#081538] rounded-2xl border-2 border-sky-400/40 shadow-xl space-y-4">
            <h3 class="text-xs uppercase font-black text-cyan-300 tracking-wider pb-2 border-b border-sky-400/30 flex items-center gap-2">
                <span>🆘</span>
                <span>4. Emergency Next of Kin Contact</span>
            </h3>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label for="next_of_kin_name" class="block text-xs uppercase font-black text-sky-200 tracking-wider mb-1">Next of Kin Full Name</label>
                    <input id="next_of_kin_name" type="text" name="next_of_kin_name" value="{{ old('next_of_kin_name', 'Mixo Mdaka') }}"
                           class="w-full bg-[#0a1a47] border-2 border-sky-400 rounded-xl p-3 text-white text-sm font-bold focus:border-cyan-300 focus:ring-2 focus:ring-cyan-300 outline-none">
                </div>

                <div>
                    <label for="next_of_kin_relationship" class="block text-xs uppercase font-black text-sky-200 tracking-wider mb-1">Relationship</label>
                    <select id="next_of_kin_relationship" name="next_of_kin_relationship"
                            class="w-full bg-[#0a1a47] border-2 border-sky-400 rounded-xl p-3 text-white text-sm font-bold focus:border-cyan-300 focus:ring-2 focus:ring-cyan-300 outline-none">
                        <option value="Parent / Guardian" selected>Parent / Guardian</option>
                        <option value="Mother">Mother</option>
                        <option value="Father">Father</option>
                        <option value="Sibling">Sibling</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <div>
                    <label for="next_of_kin_contact" class="block text-xs uppercase font-black text-sky-200 tracking-wider mb-1">Emergency Contact #</label>
                    <input id="next_of_kin_contact" type="text" name="next_of_kin_contact" value="{{ old('next_of_kin_contact', '0713998559') }}"
                           class="w-full bg-[#0a1a47] border-2 border-sky-400 rounded-xl p-3 text-white text-sm font-mono focus:border-cyan-300 focus:ring-2 focus:ring-cyan-300 outline-none">
                </div>
            </div>
        </div>

        <!-- 5. Account Security Password -->
        <div class="p-6 bg-[#081538] rounded-2xl border-2 border-sky-400/40 shadow-xl space-y-4">
            <h3 class="text-xs uppercase font-black text-cyan-300 tracking-wider pb-2 border-b border-sky-400/30 flex items-center gap-2">
                <span>🔒</span>
                <span>5. Account Password</span>
            </h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="password" class="block text-xs uppercase font-black text-sky-200 tracking-wider mb-1">Create Password <span class="text-red-400">*</span></label>
                    <input id="password" type="password" name="password" required autocomplete="new-password" placeholder="Minimum 8 characters"
                           class="w-full bg-[#0a1a47] border-2 border-sky-400 rounded-xl p-3 text-white text-sm font-bold focus:border-cyan-300 focus:ring-2 focus:ring-cyan-300 outline-none">
                </div>

                <div>
                    <label for="password_confirmation" class="block text-xs uppercase font-black text-sky-200 tracking-wider mb-1">Confirm Password <span class="text-red-400">*</span></label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Repeat your password"
                           class="w-full bg-[#0a1a47] border-2 border-sky-400 rounded-xl p-3 text-white text-sm font-bold focus:border-cyan-300 focus:ring-2 focus:ring-cyan-300 outline-none">
                </div>
            </div>
        </div>

        <!-- Submit and Login Link in Landing Page Palette (Zero White) -->
        <div class="flex flex-col-reverse sm:flex-row items-center justify-between gap-4 pt-4 border-t-2 border-sky-400/30">
            <a class="text-xs text-sky-200 hover:text-cyan-300 font-bold transition flex items-center gap-1.5" href="{{ route('login') }}">
                <span>&larr;</span> Already have an account? <span class="underline decoration-cyan-400 text-white font-black">Log in to Portal</span>
            </a>

            <button type="submit"
                    class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-3.5 bg-gradient-to-r from-cyan-400 via-sky-400 to-blue-500 hover:from-cyan-300 hover:to-blue-400 text-slate-950 font-black text-base uppercase tracking-wider rounded-2xl shadow-2xl transition transform hover:-translate-y-0.5 border-2 border-cyan-300">
                Complete Student Registration &rarr;
            </button>
        </div>
    </form>
</x-guest-layout>
