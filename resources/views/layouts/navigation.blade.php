@php
    $isDarkTheme = request()->routeIs('student.dashboard', 'teacher.dashboard') || (auth()->check() && (auth()->user()->isStudent() || auth()->user()->isTeacher()) && request()->routeIs('dashboard'));
@endphp

<nav x-data="{ open: false }" class="{{ $isDarkTheme ? 'bg-[#081538] border-b-2 border-slate-700 text-white' : 'bg-white border-b border-gray-100' }}">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current {{ $isDarkTheme ? 'text-sky-300' : 'text-gray-800' }}" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard', 'admin.dashboard', 'teacher.dashboard', 'student.dashboard')"
                                class="{{ $isDarkTheme ? 'text-sky-200 hover:text-white border-sky-400 font-bold' : '' }}">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48" :content-classes="$isDarkTheme ? 'py-1 bg-[#081538] border border-sky-400/40 text-sky-200' : 'py-1 bg-white'">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3.5 py-2 border {{ $isDarkTheme ? 'border-sky-400/40 text-sky-200 bg-[#0a1c47] hover:text-white hover:bg-blue-900' : 'border-transparent text-gray-500 bg-white hover:text-gray-700' }} text-sm leading-4 font-bold rounded-xl focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <span class="ms-2 px-2 py-0.5 text-xs font-semibold rounded uppercase {{ Auth::user()->isAdmin() ? 'bg-red-100 text-red-800' : (Auth::user()->isTeacher() ? 'bg-emerald-600 text-white' : ($isDarkTheme ? 'bg-blue-900 text-sky-300 border border-sky-400/40' : 'bg-blue-100 text-blue-800')) }}">
                                {{ Auth::user()->role }}
                            </span>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4 {{ $isDarkTheme ? 'text-sky-300' : '' }}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="{{ $isDarkTheme ? 'text-sky-200 hover:bg-blue-900 hover:text-white font-bold' : '' }}">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    class="{{ $isDarkTheme ? 'text-sky-200 hover:bg-blue-900 hover:text-white font-bold' : '' }}"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-xl {{ $isDarkTheme ? 'text-sky-300 hover:text-white hover:bg-blue-900 focus:bg-blue-900' : 'text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500' }} transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden {{ $isDarkTheme ? 'bg-[#081538] border-b-2 border-sky-400/30' : '' }}">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard', 'admin.dashboard', 'teacher.dashboard', 'student.dashboard')"
                                   class="{{ $isDarkTheme ? 'text-sky-200 hover:text-white font-bold' : '' }}">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t {{ $isDarkTheme ? 'border-sky-400/30' : 'border-gray-200' }}">
            <div class="px-4">
                <div class="font-bold text-base {{ $isDarkTheme ? 'text-white' : 'text-gray-800' }}">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm {{ $isDarkTheme ? 'text-sky-300' : 'text-gray-500' }}">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="{{ $isDarkTheme ? 'text-sky-200 hover:text-white font-bold' : '' }}">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            class="{{ $isDarkTheme ? 'text-sky-200 hover:text-white font-bold' : '' }}"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
