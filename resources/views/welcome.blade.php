<!DOCTYPE html>
<html lang="en" class="transition-colors duration-500">
<head>
    <meta charset="UTF-8" />
    <title>RAS Clinic</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        html, body {
            transition: background-color 0.5s, color 0.5s;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-900 dark:bg-gray-900 dark:text-gray-100 transition-colors duration-500 min-h-screen flex flex-col">

    <!-- Navbar -->
    <header class="bg-white dark:bg-gray-800 border-b-2 border-white border-gray-200 dark:border-gray-700 shadow transition-colors duration-500">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <div class="text-2xl font-bold text-blue-600 dark:text-blue-400">RAS Clinic</div>
            <nav class="flex items-center space-x-4">
                <a href="#" class="text-gray-700 dark:text-gray-200 hover:text-blue-500 transition-colors">Services</a>
                <a href="{{ route('contact') }}" class="text-gray-700 dark:text-gray-200 hover:text-blue-500 transition-colors">Contact Us</a>
                <a href="{{ route('login') }}" class="text-blue-600 dark:text-blue-400 font-semibold hover:underline transition-colors">Login </a> <p>|</p>
                <a href="{{ route('register') }}" class="text-blue-600 dark:text-blue-400 font-semibold hover:underline transition-colors">Register</a>
                <!-- Theme Toggle -->
                <button id="theme-toggle" class="text-gray-600 dark:text-gray-300 hover:text-blue-600 transition duration-300">
                    <svg id="sun-icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hidden transition-transform duration-300 transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4V2m0 20v-2m10-10h-2M4 12H2m15.536-7.536l-1.414 1.414M6.879 17.121l-1.414 1.414M17.121 17.121l1.414 1.414M6.879 6.879L5.464 5.464"/>
                    </svg>
                    <svg id="moon-icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hidden transition-transform duration-300 transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 12.79A9 9 0 1111.21 3a7 7 0 0010.13 9.79z"/>
                    </svg>
                </button>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <main class="flex-grow bg-cover bg-center bg-no-repeat bg-fixed text-white py-32 transition-colors duration-500" style="background-image: url('https://static.wixstatic.com/media/7d6360_38f4150bda1c46229e409b5c51b41bf9~mv2.jpg');">
        <div class="max-w-4xl mx-auto text-center px-4">
            <div>
                <h1 class="text-4xl md:text-5xl font-bold text-white transition-colors">Welcome to RAS Medical Clinic</h1>
                <p class="mt-4 text-lg text-white transition-colors max-w-xl mx-auto">
                    Compassionate care. Modern solutions. Your health, our priority.
                </p>
                <div class="mt-8 space-x-4">
                    <a href="{{ route('login') }}" class="px-6 py-3 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors inline-block">
                        Book Appointment
                    </a>
                    <a href="#" class="px-6 py-3 border border-blue-600 text-blue-300 rounded hover:bg-blue-700 transition-colors inline-block">
                        Learn More
                    </a>
                </div>
            </div>
        </div>
    </main>

    <!-- Info Cards Section -->
    <section class="bg-white text-sm text-gray-700 transition-colors duration-500">
        <div class="max-w-6xl mx-auto px-4 py-8 grid grid-cols-1 md:grid-cols-3 gap-6 text-left">
            <div class="bg-gray-100 dark:bg-gray-700 hover:bg-blue-100 dark:hover:bg-[#1A2238] dark:hover:shadow-lg p-6 rounded shadow transition duration-300 ease-in-out">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-2">Card Title 1</h3>
                <p class="text-gray-600 dark:text-gray-300">Short description for the first card. This is placeholder text.</p>
            </div>
            <div class="bg-gray-100 dark:bg-gray-700 hover:bg-blue-100 dark:hover:bg-[#1A2238] dark:hover:shadow-lg p-6 rounded shadow transition duration-300 ease-in-out">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-2">Card Title 2</h3>
                <p class="text-gray-600 dark:text-gray-300">Another description for the second card. Placeholder content here.</p>
            </div>
            <div class="bg-gray-100 dark:bg-gray-700 hover:bg-blue-100 dark:hover:bg-[#1A2238] dark:hover:shadow-lg p-6 rounded shadow transition duration-300 ease-in-out">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-2">Card Title 3</h3>
                <p class="text-gray-600 dark:text-gray-300">Details for the third card. Content can be updated as needed.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white dark:bg-gray-800 text-center text-sm text-gray-500 dark:text-gray-400 py-6 border-t-2 border-white transition-colors duration-500">
        © {{ date('Y') }} RAS Medical Clinic. All rights reserved.
    </footer>

    <!-- Theme Toggle Script -->
    <script>
        const themeToggle = document.getElementById('theme-toggle');
        const sunIcon = document.getElementById('sun-icon');
        const moonIcon = document.getElementById('moon-icon');

        function setTheme(isDark) {
            document.documentElement.classList.toggle('dark', isDark);
            localStorage.setItem('theme', isDark ? 'dark' : 'light');
            sunIcon.classList.toggle('hidden', isDark);
            moonIcon.classList.toggle('hidden', !isDark);
        }

        // Initialize theme
        const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        const storedTheme = localStorage.getItem('theme');
        const isDark = storedTheme === 'dark' || (!storedTheme && prefersDark);
        setTheme(isDark);

        // Toggle on click
        themeToggle.addEventListener('click', () => {
            setTheme(!document.documentElement.classList.contains('dark'));
        });
    </script>

</body>
</html>
