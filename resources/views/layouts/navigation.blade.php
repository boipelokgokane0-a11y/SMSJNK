<nav x-data="{ open: false }" class="bg-[#081538] border-b-2 border-sky-400/40 text-white shadow-xl relative z-40">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-18 py-2 items-center">
            <div class="flex items-center gap-6">
                <!-- Logo with landing page badge -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 text-decoration-none group">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-cyan-400 to-sky-600 flex items-center justify-center font-black text-slate-950 border-2 border-cyan-300 shadow-md group-hover:scale-105 transition">
                            JK
                        </div>
                        <div>
                            <span class="font-black text-base text-white block leading-tight">J &amp; K Designs</span>
                            <span class="text-[10px] font-black text-cyan-300 uppercase tracking-widest block">Academy Portal</span>
                        </div>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-4 sm:-my-px sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard', 'admin.dashboard', 'teacher.dashboard', 'student.dashboard')"
                                class="text-sky-200 hover:text-cyan-300 border-cyan-400 font-black text-sm">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    @if(auth()->user()->isAdmin())
                        <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')"
                                    class="text-sky-200 hover:text-cyan-300 border-cyan-400 font-black text-sm">
                            {{ __('Admin Control') }}
                        </x-nav-link>
                    @endif

                    <a href="/" target="_blank"
                       class="inline-flex items-center px-3 py-2 text-xs font-black text-cyan-300 hover:text-white bg-blue-950/70 border border-sky-400/40 rounded-xl transition">
                        <span class="mr-1.5">🌐</span> Landing Page
                    </a>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48" :content-classes="'py-2 bg-[#081538] border-2 border-sky-400/60 rounded-2xl shadow-2xl text-white'">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 border-2 border-sky-400/50 text-sky-200 bg-[#0a1c47] hover:text-white hover:bg-blue-900 text-sm leading-4 font-black rounded-xl focus:outline-none transition ease-in-out duration-150 shadow-md">
                            <div>{{ Auth::user()->name }}</div>
                            <span class="ms-2 px-2.5 py-0.5 text-xs font-black rounded-full uppercase {{ Auth::user()->isAdmin() ? 'bg-cyan-400 text-slate-950 shadow' : (Auth::user()->isTeacher() ? 'bg-emerald-500 text-slate-950 shadow' : 'bg-blue-900 text-cyan-300 border border-sky-400/50') }}">
                                {{ Auth::user()->role }}
                            </span>

                            <div class="ms-1.5">
                                <svg class="fill-current h-4 w-4 text-cyan-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="text-sky-200 hover:bg-[#0f286b] hover:text-cyan-300 font-bold px-4 py-2">
                            {{ __('My Account Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    class="text-red-400 hover:bg-red-950/60 hover:text-red-300 font-black px-4 py-2 border-t border-sky-400/20"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger for Mobile -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-xl text-cyan-300 hover:text-white hover:bg-blue-900 focus:bg-blue-900 transition duration-150 ease-in-out border border-sky-400/40">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-[#081538] border-b-2 border-sky-400/40">
        <div class="pt-2 pb-3 space-y-1 px-4">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard', 'admin.dashboard', 'teacher.dashboard', 'student.dashboard')"
                                   class="text-sky-200 hover:text-cyan-300 font-bold">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <a href="/" target="_blank" class="block py-2 text-cyan-300 font-black text-sm">
                🌐 Visit Landing Page
            </a>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-3 border-t border-sky-400/30 px-4">
            <div class="font-black text-base text-white">{{ Auth::user()->name }}</div>
            <div class="font-medium text-xs text-sky-300">{{ Auth::user()->email }}</div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="text-sky-200 hover:text-cyan-300 font-bold">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            class="text-red-400 hover:text-red-300 font-black"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
