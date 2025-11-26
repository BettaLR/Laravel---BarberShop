<nav x-data="{ open: false }" class="border-b bg-barber-black border-barber-gray">
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center shrink-0">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block w-auto h-9 fill-current text-barber-gold" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                        class="text-white hover:text-barber-gold focus:text-barber-gold">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    @if(Auth::user()->isStaff())
                        <x-nav-link :href="route('admin.services.index')" :active="request()->routeIs('admin.services.*')"
                            class="text-white hover:text-barber-gold focus:text-barber-gold">
                            {{ __('Services') }}
                        </x-nav-link>
                    @endif

                    @if(Auth::user()->isAdmin())
                        <x-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.*')"
                            class="text-white hover:text-barber-gold focus:text-barber-gold">
                            {{ __('Users') }}
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 transition duration-150 ease-in-out border border-transparent rounded-md text-barber-gold bg-barber-black hover:text-white focus:outline-none">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')"
                            class="text-white bg-barber-gray hover:bg-barber-black hover:text-barber-gold">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                class="text-white bg-barber-gray hover:bg-barber-black hover:text-barber-gold">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="flex items-center -me-2 sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 transition duration-150 ease-in-out rounded-md text-barber-gold hover:text-white hover:bg-barber-gray focus:outline-none focus:bg-barber-gray focus:text-white">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                class="text-white hover:text-barber-gold hover:bg-barber-gray focus:text-barber-gold focus:bg-barber-gray">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            @if(Auth::user()->isStaff())
                <x-responsive-nav-link :href="route('admin.services.index')"
                    :active="request()->routeIs('admin.services.*')"
                    class="text-white hover:text-barber-gold hover:bg-barber-gray focus:text-barber-gold focus:bg-barber-gray">
                    {{ __('Services') }}
                </x-responsive-nav-link>
            @endif

            @if(Auth::user()->isAdmin())
                <x-responsive-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.*')"
                    class="text-white hover:text-barber-gold hover:bg-barber-gray focus:text-barber-gold focus:bg-barber-gray">
                    {{ __('Users') }}
                </x-responsive-nav-link>
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-barber-gray">
            <div class="px-4">
                <div class="text-base font-medium text-barber-gold">{{ Auth::user()->name }}</div>
                <div class="text-sm font-medium text-gray-400">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')"
                    class="text-white hover:text-barber-gold hover:bg-barber-gray">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();"
                        class="text-white hover:text-barber-gold hover:bg-barber-gray">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>