<nav x-data="{ open: false }" class="bg-transparent backdrop-blur-md border-b border-cyan-500/20">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="text-2xl font-bold" style="font-family: 'Orbitron', sans-serif; background: linear-gradient(135deg, #00f3ff, #ff006e); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;">
                        PRODUCT MGMT
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="nav-link-cyber">
                        {{ __('Products') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Demo label -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <span class="inline-flex items-center px-4 py-2 border border-cyan-500/30 text-sm leading-4 font-medium rounded-md text-cyan-400 bg-black/20" style="font-family: 'Outfit', sans-serif;">
                    Demo Mode
                </span>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-cyan-400 hover:text-cyan-300 hover:bg-cyan-500/10 focus:outline-none focus:bg-cyan-500/20 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-black/20 backdrop-blur-md">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-gray-300 hover:text-cyan-400">
                {{ __('Products') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive demo label -->
        <div class="pt-4 pb-1 border-t border-cyan-500/20">
            <div class="px-4">
                <div class="font-medium text-base text-cyan-400" style="font-family: 'Outfit', sans-serif;">Demo Mode</div>
                <div class="font-medium text-sm text-gray-400">Database-free deployment</div>
            </div>
        </div>
    </div>
</nav>

<style>
    /* Custom nav link styles */
    .nav-link-cyber {
        color: rgba(255, 255, 255, 0.7);
        transition: all 0.3s ease;
        position: relative;
        font-family: 'Outfit', sans-serif;
    }

    .nav-link-cyber::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 2px;
        background: #00f3ff;
        transition: width 0.3s ease;
        box-shadow: 0 0 10px #00f3ff;
    }

    .nav-link-cyber:hover {
        color: #00f3ff;
    }

    .nav-link-cyber:hover::after {
        width: 100%;
    }
</style>
