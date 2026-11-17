<section class="p-6 sm:p-8 bg-[#0f286b] rounded-3xl border-2 border-sky-400/50 shadow-2xl text-white">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center pb-4 border-b-2 border-sky-400/30 gap-3 mb-6">
        <div>
            <span class="inline-flex items-center px-3.5 py-1 rounded-full text-xs font-black bg-cyan-400 text-slate-950 uppercase tracking-wider shadow">
                🛡️ System Governance &amp; Security
            </span>
            <h2 class="text-xl sm:text-2xl font-black text-white mt-2">Administrator Credentials &amp; Session Information</h2>
            <p class="text-xs sm:text-sm text-sky-200 font-bold mt-0.5">Active administrative identity, institutional authorization and governance profile</p>
        </div>
        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-black bg-emerald-950 text-emerald-400 border border-emerald-400">
            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
            FULL ACCESS GRANTED
        </span>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 text-sm">
        <div class="p-4 bg-[#081538] rounded-2xl border-2 border-sky-400/40 shadow">
            <span class="text-xs uppercase font-black text-sky-300">Administrator Name</span>
            <span class="text-base font-black text-white mt-1 block">{{ $user->name }}</span>
            <span class="text-[11px] font-bold text-sky-200 mt-1 block">Primary Academy Officer</span>
        </div>
        <div class="p-4 bg-[#081538] rounded-2xl border-2 border-sky-400/40 shadow">
            <span class="text-xs uppercase font-black text-sky-300">Official Email</span>
            <span class="text-sm font-bold text-cyan-300 mt-1 block truncate">{{ $user->email }}</span>
            <span class="text-[11px] font-bold text-sky-200 mt-1 block">Verified Academy System Email</span>
        </div>
        <div class="p-4 bg-[#081538] rounded-2xl border-2 border-sky-400/40 shadow">
            <span class="text-xs uppercase font-black text-sky-300">Access Authority Role</span>
            <span class="text-base font-black text-emerald-400 mt-1 block uppercase">{{ $user->role ?: 'Administrator' }}</span>
            <span class="text-[11px] font-bold text-emerald-300 mt-1 block">Root Administrator Privileges</span>
        </div>
        <div class="p-4 bg-[#081538] rounded-2xl border-2 border-sky-400/40 shadow">
            <span class="text-xs uppercase font-black text-sky-300">Account Registered</span>
            <span class="text-base font-black text-amber-300 mt-1 block">{{ $user->created_at ? $user->created_at->format('d M Y') : 'Active' }}</span>
            <span class="text-[11px] font-bold text-sky-200 mt-1 block">Current Academic Cycle</span>
        </div>
    </div>
</section>
