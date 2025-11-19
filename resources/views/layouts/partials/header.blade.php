
<nav x-data="{ open: false }" class="bg-gray-900 border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ url('/') }}">
                        <x-application-mark class="block h-8 w-auto text-white" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link href="{{ url('/') }}" :active="request()->is('/')">
                        {{ __('Home') }}
                    </x-nav-link>
                    <x-nav-link href="{{ url('/solutions') }}" :active="request()->is('solutions*')">
                        {{ __('Solutions') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('shop.index') }}" :active="request()->routeIs('shop.*')">
                        {{ __('Shop') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('knowledge-base.index') }}" :active="request()->routeIs('knowledge-base.*')">
                        {{ __('Knowledge Base') }}
                    </x-nav-link>
                    <x-nav-link href="{{ url('/contact') }}" :active="request()->is('contact')">
                        {{ __('Contact') }}
                    </x-nav-link>
                    @auth
                        <x-nav-link href="{{ route('learn.dashboard') }}" :active="request()->routeIs('learn.*')">
                            {{ __('Learn') }}
                        </x-nav-link>
                    @endauth
                    <x-nav-link href="{{ url('/blog') }}" :active="request()->is('blog')">
                        {{ __('Blog') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('suppliers.index') }}" :active="request()->routeIs('suppliers.*')">
                        {{ __('Suppliers') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6 gap-6">
                <form action="{{ route('knowledge-base.index') }}" method="GET" class="hidden sm:block">
                    <label for="global-knowledge-search" class="sr-only">{{ __('Search knowledge base') }}</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1010.5 18a7.5 7.5 0 006.15-3.35z" />
                            </svg>
                        </span>
                        <input id="global-knowledge-search" type="search" name="q" value="{{ request()->routeIs('knowledge-base.*') ? request('q') : '' }}" placeholder="{{ __('Search the knowledge base') }}" class="w-64 rounded-lg border border-gray-700 bg-gray-800 py-2 pl-9 pr-3 text-sm text-gray-100 placeholder-gray-400 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                </form>

                <!-- Authentication Links -->
                @auth
                    <!-- User-specific navigation for logged-in users -->
                    <div class="ml-3 relative">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                        <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                    </button>
                                @else
                                    <span class="inline-flex rounded-md">
                                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-gray-900 hover:text-gray-300 focus:outline-none transition">
                                            {{ Auth::user()->name }}

                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                            </svg>
                                        </button>
                                    </span>
                                @endif
                            </x-slot>

                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Manage Account') }}
                                </div>
                                <x-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                @role('admin')
                                <div class="border-t border-gray-200"></div>
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Admin') }}
                                </div>
                                <x-dropdown-link href="{{ route('admin.dashboard') }}">
                                    {{ __('Dashboard') }}
                                </x-dropdown-link>
                                <x-dropdown-link href="{{ route('admin.users.index') }}">
                                    {{ __('Users') }}
                                </x-dropdown-link>
                                <x-dropdown-link href="{{ route('admin.roles.index') }}">
                                    {{ __('Roles') }}
                                </x-dropdown-link>
                                <x-dropdown-link href="{{ route('admin.permissions.index') }}">
                                    {{ __('Permissions') }}
                                </x-dropdown-link>
                                <x-dropdown-link href="{{ route('admin.solutions.index') }}">
                                    {{ __('Solutions') }}
                                </x-dropdown-link>
                                <x-dropdown-link href="{{ route('admin.quizzes.index') }}">
                                    {{ __('Quizzes') }}
                                </x-dropdown-link>
                                <x-dropdown-link href="{{ route('admin.shop.products') }}">
                                    {{ __('Products') }}
                                </x-dropdown-link>
                                <x-dropdown-link href="{{ route('admin.shop.categories') }}">
                                    {{ __('Product Categories') }}
                                </x-dropdown-link>
                                <x-dropdown-link href="{{ route('admin.knowledge-base.categories.index') }}">
                                    {{ __('Knowledge Categories') }}
                                </x-dropdown-link>
                                <x-dropdown-link href="{{ route('admin.knowledge-base.topics.index') }}">
                                    {{ __('Knowledge Topics') }}
                                </x-dropdown-link>
                                <x-dropdown-link href="{{ route('admin.knowledge-base.articles.index') }}">
                                    {{ __('Knowledge Articles') }}
                                </x-dropdown-link>
                                <x-dropdown-link href="{{ route('admin.settings') }}">
                                    {{ __('Settings') }}
                                </x-dropdown-link>
                                <x-dropdown-link href="{{ route('admin.logs') }}">
                                    {{ __('System Logs') }}
                                </x-dropdown-link>
                                @endrole

                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                    <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                        {{ __('API Tokens') }}
                                    </x-dropdown-link>
                                @endif

                                <div class="border-t border-gray-200"></div>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf
                                    <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>

                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                        <div class="ml-3 relative">
                            <x-dropdown align="right" width="60">
                                <x-slot name="trigger">
                                    <span class="inline-flex rounded-md">
                                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-gray-900 hover:text-gray-300 focus:outline-none transition">
                                            {{ Auth::user()->currentTeam->name }}

                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                            </svg>
                                        </button>
                                    </span>
                                </x-slot>
                                <x-slot name="content">
                                    <div class="w-60">
                                        <!-- Team Management -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Manage Team') }}
                                        </div>

                                        <!-- Team Settings -->
                                        <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam) }}">
                                            {{ __('Team Settings') }}
                                        </x-dropdown-link>

                                        @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                            <x-dropdown-link href="{{ route('teams.create') }}">
                                                {{ __('Create New Team') }}
                                            </x-dropdown-link>
                                        @endcan

                                        <div class="border-t border-gray-200"></div>

                                        <!-- Team Switcher -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Switch Teams') }}
                                        </div>

                                        @foreach (Auth::user()->allTeams() as $team)
                                            <x-switchable-team :team="$team" />
                                        @endforeach
                                    </div>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    @endif
                @endauth

                @guest
                    <div class="space-x-4">
                        <x-nav-link href="{{ route('login') }}" class="text-white">
                            {{ __('Log in') }}
                        </x-nav-link>
                        <x-nav-link href="{{ route('register') }}" class="text-white">
                            {{ __('Register') }}
                        </x-nav-link>
                    </div>
                @endguest
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <form action="{{ route('knowledge-base.index') }}" method="GET" class="px-4 pb-3">
                <label for="global-knowledge-search-mobile" class="sr-only">{{ __('Search knowledge base') }}</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1010.5 18a7.5 7.5 0 006.15-3.35z" />
                        </svg>
                    </span>
                    <input id="global-knowledge-search-mobile" type="search" name="q" value="{{ request()->routeIs('knowledge-base.*') ? request('q') : '' }}" placeholder="{{ __('Search the knowledge base') }}" class="w-full rounded-lg border border-gray-700 bg-gray-800 py-2 pl-9 pr-3 text-sm text-gray-100 placeholder-gray-400 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
            </form>
            <x-responsive-nav-link href="{{ url('/') }}" :active="request()->is('/')" class="text-white">
                {{ __('Home') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ url('/solutions') }}" :active="request()->is('solutions*')" class="text-white">
                {{ __('Solutions') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('shop.index') }}" :active="request()->routeIs('shop.*')" class="text-white">
                {{ __('Shop') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('knowledge-base.index') }}" :active="request()->routeIs('knowledge-base.*')" class="text-white">
                {{ __('Knowledge Base') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ url('/contact') }}" :active="request()->is('contact')" class="text-white">
                {{ __('Contact') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ url('/blog') }}" :active="request()->is('blog')" class="text-white">
                {{ __('Blog') }}
            </x-responsive-nav-link>
        </div>

        @auth
            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="flex items-center px-4">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <div class="shrink-0 mr-3">
                            <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </div>
                    @endif

                    <div>
                        <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-400">{{ Auth::user()->email }}</div>
                    </div>
                </div>

                <div class="mt-3 space-y-1">
                    <!-- Account Management -->
                    <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    @role('admin')
                        <div class="border-t border-gray-200"></div>
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Admin') }}
                        </div>
                        <x-responsive-nav-link href="{{ route('admin.dashboard') }}" :active="request()->routeIs('admin.dashboard')">
                            {{ __('Dashboard') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link href="{{ route('admin.users.index') }}" :active="request()->routeIs('admin.users.*')">
                            {{ __('Users') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link href="{{ route('admin.roles.index') }}" :active="request()->routeIs('admin.roles.*')">
                            {{ __('Roles') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link href="{{ route('admin.permissions.index') }}" :active="request()->routeIs('admin.permissions.*')">
                            {{ __('Permissions') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link href="{{ route('admin.solutions.index') }}" :active="request()->routeIs('admin.solutions.*')">
                            {{ __('Solutions') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link href="{{ route('admin.quizzes.index') }}" :active="request()->routeIs('admin.quizzes.*')">
                            {{ __('Quizzes') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link href="{{ route('admin.shop.products') }}" :active="request()->routeIs('admin.shop.products')">
                            {{ __('Products') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link href="{{ route('admin.shop.categories') }}" :active="request()->routeIs('admin.shop.categories')">
                            {{ __('Product Categories') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link href="{{ route('admin.knowledge-base.categories.index') }}" :active="request()->routeIs('admin.knowledge-base.categories.*')">
                            {{ __('Knowledge Categories') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link href="{{ route('admin.knowledge-base.topics.index') }}" :active="request()->routeIs('admin.knowledge-base.topics.*')">
                            {{ __('Knowledge Topics') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link href="{{ route('admin.knowledge-base.articles.index') }}" :active="request()->routeIs('admin.knowledge-base.articles.*')">
                            {{ __('Knowledge Articles') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link href="{{ route('admin.settings') }}" :active="request()->routeIs('admin.settings')">
                            {{ __('Settings') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link href="{{ route('admin.logs') }}" :active="request()->routeIs('admin.logs')">
                            {{ __('System Logs') }}
                        </x-responsive-nav-link>
                    @endrole

                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                            {{ __('API Tokens') }}
                        </x-responsive-nav-link>
                    @endif

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
                        <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>

                    <!-- Team Management -->
                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                        <div class="border-t border-gray-200"></div>

                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Team') }}
                        </div>

                        <!-- Team Settings -->
                        <x-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam) }}" :active="request()->routeIs('teams.show')">
                            {{ __('Team Settings') }}
                        </x-responsive-nav-link>

                        @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                            <x-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                                {{ __('Create New Team') }}
                            </x-responsive-nav-link>
                        @endcan

                        <div class="border-t border-gray-200"></div>

                        <!-- Team Switcher -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Switch Teams') }}
                        </div>

                        @foreach (Auth::user()->allTeams() as $team)
                            <x-switchable-team :team="$team" component="responsive-nav-link" />
                        @endforeach
                    @endif
                </div>
            </div>
        @endauth

        @guest
            <div class="pt-4 pb-1 border-t border-gray-200">
                <x-responsive-nav-link href="{{ route('login') }}" class="text-white">
                    {{ __('Log in') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="{{ route('register') }}" class="text-white">
                    {{ __('Register') }}
                </x-responsive-nav-link>
            </div>
        @endguest
    </div>
</nav>
