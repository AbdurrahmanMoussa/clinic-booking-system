<flux:header class="bg-white dark:bg-gray-800 border-b-2 dark:border-gray-700 shadow transition-colors duration-500">
    <div class="max-w-7xl mx-auto px-4 py-4 w-full">
        <div class="flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <x-app-logo-icon class="w-8 h-8 text-blue-600 dark:text-blue-400" />
                <a href="/"> <span class="text-2xl font-bold text-blue-600 dark:text-blue-400">RAS Clinic</span></a>
            </div>

            <nav class="hidden md:flex items-center space-x-4">
                <a href="{{ url('/') }}" wire:navigate
                    class="text-gray-700 dark:text-gray-200 hover:text-blue-500 transition-colors">Home</a>
                <a href="{{ route('contact') }}" wire:navigate
                    class="text-gray-700 dark:text-gray-200 hover:text-blue-500 transition-colors">Contact Us</a>
                <a href="{{ route('doctors-list') }}" wire:navigate
                    class="text-gray-700 dark:text-gray-200 hover:text-blue-500 transition-colors">View Doctors</a>
                @auth
                    <span class="text-blue-600 dark:text-blue-400 font-semibold">
                        Hello, {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                    </span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit"
                            class="ml-2 text-gray-700 dark:text-gray-200 hover:text-red-500 transition-colors">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" wire:navigate
                        class="text-blue-600 dark:text-blue-400 font-semibold hover:underline transition-colors">Login</a>
                    <span>|</span>
                    <a href="{{ route('register') }}" wire:navigate
                        class="text-blue-600 dark:text-blue-400 font-semibold hover:underline transition-colors">Register</a>
                @endauth
            </nav>

            <div class="md:hidden">
                <flux:dropdown position="bottom" align="end">
                    <flux:button type="button" variant="ghost" icon="bars-2" class="p-2" />
                    <flux:menu class="min-w-52 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100">
                        <flux:menu.item href="{{ url('/') }}" wire:navigate>Home</flux:menu.item>
                        <flux:menu.item href="{{ route('contact') }}" wire:navigate>Contact Us</flux:menu.item>

                        @auth
                            <flux:menu.item as="span" class="text-gray-500 cursor-default">
                                Hello, {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                            </flux:menu.item>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <flux:menu.item as="button" type="submit">Logout</flux:menu.item>
                            </form>
                        @else
                            <flux:menu.item href="{{ route('login') }}" wire:navigate>Login</flux:menu.item>
                            <flux:menu.item href="{{ route('register') }}" wire:navigate>Register</flux:menu.item>
                        @endauth
                    </flux:menu>
                </flux:dropdown>
            </div>
        </div>
    </div>
</flux:header>
