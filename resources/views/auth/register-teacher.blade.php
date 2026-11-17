<x-guest-layout maxWidth="max-w-4xl">
    <div class="mb-8">
        <!-- Badge -->
        <div class="flex flex-wrap items-center justify-between gap-3 pb-4 border-b-2 border-emerald-400/30">
            <div class="flex items-center gap-2">
                <span class="px-3.5 py-1 rounded-full text-xs font-black bg-emerald-500 text-slate-950 uppercase tracking-widest shadow">
                    👩‍🏫 Faculty Onboarding
                </span>
                <span class="px-3 py-1 rounded-full text-xs font-black bg-blue-950 text-cyan-300 border border-sky-400/50">
                    J &amp; K Designs Academy
                </span>
            </div>
            <!-- Role Selector Tabs in Landing Page Palette -->
            <div class="inline-flex rounded-xl p-1 bg-[#081538] border-2 border-sky-400/50 text-xs font-black">
                <a href="{{ route('register.student') }}"
                   class="px-4 py-1.5 rounded-lg text-sky-200 hover:text-white transition">
                    Student Registration
                </a>
                <a href="{{ route('register.teacher') }}"
                   class="px-4 py-1.5 rounded-lg bg-emerald-500 text-slate-950 shadow-md">
                    Teacher Registration
                </a>
            </div>
        </div>

        <div class="mt-4">
            <h2 class="text-3xl sm:text-4xl font-black text-white">Educator Appointment &amp; Registration</h2>
            <p class="text-sm text-sky-200 font-bold mt-1">Join our certified teaching team. Enter personal credentials, subject specialization and qualifications.</p>
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

    <form method="POST" action="{{ route('register.teacher.store') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <input type="hidden" name="role" value="teacher">

        <!-- 1. Educator Personal Details -->
        <div class="p-6 bg-[#081538] rounded-2xl border-2 border-emerald-400/40 shadow-xl space-y-4">
            <h3 class="text-xs uppercase font-black text-emerald-300 tracking-wider pb-2 border-b border-emerald-400/30 flex items-center gap-2">
                <span>👤</span>
                <span>1. Educator Personal Information</span>
            </h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- Names -->
                <div>
                    <label for="first_name" class="block text-xs uppercase font-black text-sky-200 tracking-wider mb-1">First Names <span class="text-red-400">*</span></label>
                    <input id="first_name" type="text" name="first_name" value="{{ old('first_name') }}" required autofocus placeholder="e.g. David"
                           class="w-full bg-[#0a1a47] border-2 border-emerald-400/60 rounded-xl p-3 text-white text-sm font-bold focus:border-emerald-300 focus:ring-2 focus:ring-emerald-300 outline-none">
                </div>

                <!-- Surname -->
                <div>
                    <label for="surname" class="block text-xs uppercase font-black text-sky-200 tracking-wider mb-1">Surname <span class="text-red-400">*</span></label>
                    <input id="surname" type="text" name="surname" value="{{ old('surname') }}" required placeholder="e.g. Ndlovu"
                           class="w-full bg-[#0a1a47] border-2 border-emerald-400/60 rounded-xl p-3 text-white text-sm font-bold focus:border-emerald-300 focus:ring-2 focus:ring-emerald-300 outline-none">
                </div>

                <!-- Date of Birth -->
                <div>
                    <label for="dob" class="block text-xs uppercase font-black text-sky-200 tracking-wider mb-1">Date of Birth (DOB) <span class="text-red-400">*</span></label>
                    <input id="dob" type="date" name="dob" value="{{ old('dob') }}" required
                           class="w-full bg-[#0a1a47] border-2 border-emerald-400/60 rounded-xl p-3 text-white text-sm font-bold focus:border-emerald-300 focus:ring-2 focus:ring-emerald-300 outline-none">
                </div>

                <!-- Gender -->
                <div>
                    <label for="gender" class="block text-xs uppercase font-black text-sky-200 tracking-wider mb-1">Gender <span class="text-red-400">*</span></label>
                    <select id="gender" name="gender" required
                            class="w-full bg-[#0a1a47] border-2 border-emerald-400/60 rounded-xl p-3 text-white text-sm font-bold focus:border-emerald-300 focus:ring-2 focus:ring-emerald-300 outline-none">
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
                            class="w-full bg-[#0a1a47] border-2 border-emerald-400/60 rounded-xl p-3 text-white text-sm font-bold focus:border-emerald-300 focus:ring-2 focus:ring-emerald-300 outline-none">
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
                            class="w-full bg-[#0a1a47] border-2 border-emerald-400/60 rounded-xl p-3 text-white text-sm font-bold focus:border-emerald-300 focus:ring-2 focus:ring-emerald-300 outline-none">
                        <option value="Single" {{ old('marital_status') === 'Single' ? 'selected' : '' }}>Single</option>
                        <option value="Married" {{ old('marital_status') === 'Married' || !old('marital_status') ? 'selected' : '' }}>Married</option>
                        <option value="Divorced" {{ old('marital_status') === 'Divorced' ? 'selected' : '' }}>Divorced</option>
                        <option value="Widowed" {{ old('marital_status') === 'Widowed' ? 'selected' : '' }}>Widowed</option>
                    </select>
                </div>

                <!-- ID Number -->
                <div>
                    <label for="id_number" class="block text-xs uppercase font-black text-sky-200 tracking-wider mb-1">National ID Number</label>
                    <input id="id_number" type="text" name="id_number" value="{{ old('id_number') }}" placeholder="South African ID number"
                           class="w-full bg-[#0a1a47] border-2 border-emerald-400/60 rounded-xl p-3 text-white text-sm font-mono focus:border-emerald-300 focus:ring-2 focus:ring-emerald-300 outline-none">
                </div>

                <!-- Passport -->
                <div>
                    <label for="passport" class="block text-xs uppercase font-black text-sky-200 tracking-wider mb-1">Passport (If Applicable)</label>
                    <input id="passport" type="text" name="passport" value="{{ old('passport') }}" placeholder="Passport number"
                           class="w-full bg-[#0a1a47] border-2 border-emerald-400/60 rounded-xl p-3 text-white text-sm font-mono focus:border-emerald-300 focus:ring-2 focus:ring-emerald-300 outline-none">
                </div>

                <!-- Contact Number -->
                <div>
                    <label for="contact_number" class="block text-xs uppercase font-black text-sky-200 tracking-wider mb-1">Educator Phone / Cell <span class="text-red-400">*</span></label>
                    <input id="contact_number" type="text" name="contact_number" value="{{ old('contact_number') }}" required placeholder="0721234567"
                           class="w-full bg-[#0a1a47] border-2 border-emerald-400/60 rounded-xl p-3 text-white text-sm font-mono focus:border-emerald-300 focus:ring-2 focus:ring-emerald-300 outline-none">
                </div>
            </div>
        </div>

        <!-- 2. Academic Appointment & Specialization -->
        <div class="p-6 bg-[#081538] rounded-2xl border-2 border-emerald-400/40 shadow-xl space-y-4">
            <h3 class="text-xs uppercase font-black text-emerald-300 tracking-wider pb-2 border-b border-emerald-400/30 flex items-center gap-2">
                <span>📚</span>
                <span>2. Teaching Specialization &amp; Campus Assignment</span>
            </h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- Subject to be Taught -->
                <div>
                    <label for="subject_to_be_taught" class="block text-xs uppercase font-black text-emerald-300 tracking-wider mb-1">Subject Specialization <span class="text-red-400">*</span></label>
                    <select id="subject_to_be_taught" name="subject_to_be_taught" required
                            class="w-full bg-[#0a1a47] border-2 border-emerald-400/60 rounded-xl p-3 text-white text-sm font-bold focus:border-emerald-300 focus:ring-2 focus:ring-emerald-300 outline-none">
                        <option value="Mathematics & Calculus" {{ old('subject_to_be_taught') === 'Mathematics & Calculus' ? 'selected' : '' }}>Mathematics &amp; Calculus</option>
                        <option value="English Language & Literature" {{ old('subject_to_be_taught') === 'English Language & Literature' ? 'selected' : '' }}>English Language &amp; Literature</option>
                        <option value="Physical Sciences & Mechanics" {{ old('subject_to_be_taught') === 'Physical Sciences & Mechanics' ? 'selected' : '' }}>Physical Sciences &amp; Mechanics</option>
                        <option value="Life Sciences & Genetics" {{ old('subject_to_be_taught') === 'Life Sciences & Genetics' ? 'selected' : '' }}>Life Sciences &amp; Genetics</option>
                        <option value="Geography & Geospatial Studies" {{ old('subject_to_be_taught') === 'Geography & Geospatial Studies' ? 'selected' : '' }}>Geography &amp; Geospatial Studies</option>
                        <option value="Life Orientation & Leadership" {{ old('subject_to_be_taught') === 'Life Orientation & Leadership' ? 'selected' : '' }}>Life Orientation &amp; Leadership</option>
                        <option value="Computer Applications & Tech" {{ old('subject_to_be_taught') === 'Computer Applications & Tech' ? 'selected' : '' }}>Computer Applications &amp; Tech</option>
                    </select>
                </div>

                <!-- School -->
                <div>
                    <label for="school" class="block text-xs uppercase font-black text-sky-200 tracking-wider mb-1">Assigned School Campus</label>
                    <input id="school" type="text" name="school" value="{{ old('school', 'J & K Designs Academy') }}"
                           class="w-full bg-[#0a1a47] border-2 border-emerald-400/60 rounded-xl p-3 text-white text-sm font-bold focus:border-emerald-300 focus:ring-2 focus:ring-emerald-300 outline-none">
                </div>

                <!-- Percel Number -->
                <div>
                    <label for="percel_number" class="block text-xs uppercase font-black text-sky-200 tracking-wider mb-1">Staff / Percel Number</label>
                    <input id="percel_number" type="text" name="percel_number" value="{{ old('percel_number') }}" placeholder="e.g. PER-MTH-01"
                           class="w-full bg-[#0a1a47] border-2 border-emerald-400/60 rounded-xl p-3 text-cyan-300 text-sm font-mono font-bold focus:border-emerald-300 focus:ring-2 focus:ring-emerald-300 outline-none">
                </div>

                <!-- Qualifications Document -->
                <div class="sm:col-span-2 lg:col-span-3">
                    <label for="qualifications_document" class="block text-xs uppercase font-black text-sky-200 tracking-wider mb-1">SACE / Academic Qualifications Document (PDF, DOC, DOCX - Max 5MB)</label>
                    <input id="qualifications_document" type="file" name="qualifications_document" accept=".pdf,.doc,.docx"
                           class="w-full bg-[#0a1a47] border-2 border-emerald-400/60 rounded-xl p-2.5 text-xs text-sky-200 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-black file:bg-emerald-500 file:text-slate-950 hover:file:bg-emerald-400">
                </div>

                <!-- Physical Address -->
                <div class="sm:col-span-2 lg:col-span-3">
                    <label for="address" class="block text-xs uppercase font-black text-sky-200 tracking-wider mb-1">Residential Address <span class="text-red-400">*</span></label>
                    <textarea id="address" name="address" rows="2" required placeholder="Full physical residential address"
                              class="w-full bg-[#0a1a47] border-2 border-emerald-400/60 rounded-xl p-3 text-white text-sm font-medium focus:border-emerald-300 focus:ring-2 focus:ring-emerald-300 outline-none">{{ old('address') }}</textarea>
                </div>
            </div>
        </div>

        <!-- 3. Account Credentials -->
        <div class="p-6 bg-[#081538] rounded-2xl border-2 border-emerald-400/40 shadow-xl space-y-4">
            <h3 class="text-xs uppercase font-black text-emerald-300 tracking-wider pb-2 border-b border-emerald-400/30 flex items-center gap-2">
                <span>🔒</span>
                <span>3. Teacher Account Credentials</span>
            </h3>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label for="email" class="block text-xs uppercase font-black text-sky-200 tracking-wider mb-1">Official Academy Email <span class="text-red-400">*</span></label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="educator@jkdesignsacademy.co.za"
                           class="w-full bg-[#0a1a47] border-2 border-emerald-400/60 rounded-xl p-3 text-white text-sm font-bold focus:border-emerald-300 focus:ring-2 focus:ring-emerald-300 outline-none">
                </div>

                <div>
                    <label for="password" class="block text-xs uppercase font-black text-sky-200 tracking-wider mb-1">Create Password <span class="text-red-400">*</span></label>
                    <input id="password" type="password" name="password" required autocomplete="new-password" placeholder="Minimum 8 characters"
                           class="w-full bg-[#0a1a47] border-2 border-emerald-400/60 rounded-xl p-3 text-white text-sm font-bold focus:border-emerald-300 focus:ring-2 focus:ring-emerald-300 outline-none">
                </div>

                <div>
                    <label for="password_confirmation" class="block text-xs uppercase font-black text-sky-200 tracking-wider mb-1">Confirm Password <span class="text-red-400">*</span></label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Repeat password"
                           class="w-full bg-[#0a1a47] border-2 border-emerald-400/60 rounded-xl p-3 text-white text-sm font-bold focus:border-emerald-300 focus:ring-2 focus:ring-emerald-300 outline-none">
                </div>
            </div>
        </div>

        <!-- Submit and Login Link in Landing Page Palette (Zero White) -->
        <div class="flex flex-col-reverse sm:flex-row items-center justify-between gap-4 pt-4 border-t-2 border-emerald-400/30">
            <a class="text-xs text-sky-200 hover:text-emerald-300 font-bold transition flex items-center gap-1.5" href="{{ route('login') }}">
                <span>&larr;</span> Already registered as an educator? <span class="underline decoration-emerald-400 text-white font-black">Log in to Portal</span>
            </a>

            <button type="submit"
                    class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-3.5 bg-gradient-to-r from-emerald-500 via-teal-500 to-cyan-500 hover:from-emerald-400 hover:to-cyan-400 text-slate-950 font-black text-base uppercase tracking-wider rounded-2xl shadow-2xl transition transform hover:-translate-y-0.5 border-2 border-emerald-300">
                Register Educator Profile &rarr;
            </button>
        </div>
    </form>
</x-guest-layout>
