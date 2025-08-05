<header
    class="bg-white dark:bg-gray-800 border-b-2 border-white border-gray-200 dark:border-gray-700 shadow transition-colors duration-500">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
        <div class="flex items-center space-x-2">
            <x-app-logo-icon class="w-8 h-8 text-blue-600 dark:text-blue-400" />
            <span class="text-2xl font-bold text-blue-600 dark:text-blue-400">RAS Clinic</span>
        </div>
        <nav class="flex items-center space-x-4">
            <a href="{{ url('/') }}"
                class="text-gray-700 dark:text-gray-200 hover:text-blue-500 transition-colors">Home</a>
            <a href="{{ route('contact') }}"
                class="text-gray-700 dark:text-gray-200 hover:text-blue-500 transition-colors">Contact Us</a>
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
                <a href="{{ route('login') }}"
                    class="text-blue-600 dark:text-blue-400 font-semibold hover:underline transition-colors">Login</a>
                <span>|</span>
                <a href="{{ route('register') }}"
                    class="text-blue-600 dark:text-blue-400 font-semibold hover:underline transition-colors">Register</a>
            @endauth
        </nav>
    </div>
</header>
