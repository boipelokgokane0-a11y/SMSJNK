<section class="p-6 bg-[#0f286b] text-white rounded-2xl border-2 border-sky-400/50 shadow-xl mb-6">
    <div class="flex items-center justify-between pb-4 border-b border-sky-400/30 mb-6">
        <div>
            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-black bg-cyan-400 text-slate-950 uppercase tracking-wider">
                Student Profile
            </span>
            <h2 class="text-xl font-black text-white mt-2">Student &amp; Parent Information</h2>
        </div>
        <span class="font-mono text-xs px-3 py-1 bg-[#081538] text-cyan-300 rounded-lg border border-sky-400/50 font-bold">
            {{ $user->student_number }}
        </span>
    </div>

    <div class="space-y-6">
        <!-- Student Details -->
        <div>
            <h3 class="text-xs uppercase font-black text-sky-300 tracking-wider mb-3">Academic &amp; Personal Details</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 text-sm">
                <div class="p-3.5 bg-[#081538] rounded-xl border border-sky-400/40">
                    <span class="block text-xs font-bold text-sky-300 uppercase">Full Name</span>
                    <span class="font-black text-white mt-0.5 block text-base">{{ $user->name }}</span>
                </div>
                <div class="p-3.5 bg-[#081538] rounded-xl border border-sky-400/40">
                    <span class="block text-xs font-bold text-sky-300 uppercase">Student Number</span>
                    <span class="font-mono font-black text-cyan-300 mt-0.5 block text-base">{{ $user->student_number }}</span>
                </div>
                <div class="p-3.5 bg-[#081538] rounded-xl border border-sky-400/40">
                    <span class="block text-xs font-bold text-sky-300 uppercase">Class Allocation</span>
                    <span class="font-black text-white mt-0.5 block">{{ $user->class_allocation ?? 'Grade 10 - Class A' }}</span>
                </div>
                <div class="p-3.5 bg-[#081538] rounded-xl border border-sky-400/40">
                    <span class="block text-xs font-bold text-sky-300 uppercase">Grade Level</span>
                    <span class="font-black text-amber-300 mt-0.5 block">{{ $user->grade ?? 'Grade 10' }}</span>
                </div>
                <div class="p-3.5 bg-[#081538] rounded-xl border border-sky-400/40">
                    <span class="block text-xs font-bold text-sky-300 uppercase">Student Email</span>
                    <span class="font-bold text-white mt-0.5 block truncate">{{ $user->email }}</span>
                </div>
                <div class="p-3.5 bg-[#081538] rounded-xl border border-sky-400/40">
                    <span class="block text-xs font-bold text-sky-300 uppercase">Student Contact</span>
                    <span class="font-mono font-bold text-white mt-0.5 block">{{ $user->contact_number ?? 'Not specified' }}</span>
                </div>
                <div class="p-3.5 bg-[#081538] rounded-xl border border-sky-400/40 sm:col-span-2 lg:col-span-3">
                    <span class="block text-xs font-bold text-sky-300 uppercase">Residential Address</span>
                    <span class="font-medium text-white mt-0.5 block">{{ $user->address ?? 'Not specified' }}</span>
                </div>
            </div>
        </div>

        <!-- Parent & Guardian Details -->
        <div class="pt-4 border-t border-sky-400/30">
            <h3 class="text-xs uppercase font-black text-sky-300 tracking-wider mb-3">Parent / Guardian Information</h3>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-sm">
                <div class="p-3.5 bg-[#081538] rounded-xl border border-cyan-400/60 shadow-sm">
                    <span class="block text-xs font-bold text-cyan-300 uppercase">Parent Full Name</span>
                    <span class="font-black text-white mt-0.5 block text-base">{{ $user->parent_name ?: 'Mixo Mdaka' }}</span>
                </div>
                <div class="p-3.5 bg-[#081538] rounded-xl border border-cyan-400/60 shadow-sm">
                    <span class="block text-xs font-bold text-cyan-300 uppercase">Parent Contact Details</span>
                    <span class="font-mono font-black text-cyan-300 mt-0.5 block text-base">{{ $user->parent_contact ?: '0713998559' }}</span>
                </div>
                <div class="p-3.5 bg-[#081538] rounded-xl border border-cyan-400/60 shadow-sm">
                    <span class="block text-xs font-bold text-cyan-300 uppercase">Parent Email Address</span>
                    <span class="font-bold text-white mt-0.5 block text-sm break-all">{{ $user->parent_email ?: 'mixomdaka@gmail.com' }}</span>
                </div>
            </div>
        </div>
    </div>
</section>
