<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>
<!DOCTYPE html>
<html lang="en" x-data x-bind:class="{ 'dark': $flux.appearance === 'dark' }"
    class="transition-colors duration-500">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RAS Clinic</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('partials.head')
</head>

<body
    class="bg-gray-50 text-gray-900 dark:bg-gray-900 dark:text-gray-100 transition-colors duration-500 min-h-screen flex flex-col">
    <header
        class="bg-white dark:bg-gray-800 border-b-2 border-white border-gray-200 dark:border-gray-700 shadow transition-colors duration-500">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <div class="text-2xl font-bold text-blue-600 dark:text-blue-400">RAS Clinic</div>
            <nav class="flex items-center space-x-4">
                <a href="#"
                    class="text-gray-700 dark:text-gray-200 hover:text-blue-500 transition-colors">Services</a>
                <a href="{{ route('contact') }}"
                    class="text-gray-700 dark:text-gray-200 hover:text-blue-500 transition-colors">Contact Us</a>
                <a href="{{ route('login') }}"
                    class="text-blue-600 dark:text-blue-400 font-semibold hover:underline transition-colors">Login</a>
                <span>|</span>
                <a href="{{ route('register') }}"
                    class="text-blue-600 dark:text-blue-400 font-semibold hover:underline transition-colors">Register</a>
            </nav>
        </div>
    </header>

    <main class="flex-grow bg-cover bg-center bg-no-repeat bg-fixed text-white py-32"
        style="background-image: url('https://static.wixstatic.com/media/7d6360_38f4150bda1c46229e409b5c51b41bf9~mv2.jpg');">
        <div class="max-w-4xl mx-auto text-center px-4">
            <h1 class="text-4xl md:text-5xl font-bold text-white">Welcome to RAS Medical Clinic</h1>
            <p class="mt-4 text-lg text-white max-w-xl mx-auto">
                Compassionate care. Modern solutions. Your health, our priority.
            </p>
            <div class="mt-8 space-x-4">
                <a href="{{ route('login') }}"
                    class="px-6 py-3 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors inline-block">
                    Book Appointment
                </a>
                <a href="#"
                    class="px-6 py-3 border border-blue-600 text-blue-300 rounded hover:bg-blue-700 transition-colors inline-block">
                    Learn More
                </a>
            </div>
        </div>
    </main>

    <section class="bg-white text-sm text-gray-700 dark:bg-gray-900 dark:text-gray-300">
        <div class="max-w-6xl mx-auto px-4 py-8 grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-gray-100 dark:bg-gray-700 hover:bg-blue-100 dark:hover:bg-[#1A2238] p-6 rounded shadow">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-2">Card Title 1</h3>
                <p>Short description for the first card.</p>
            </div>
            <div class="bg-gray-100 dark:bg-gray-700 hover:bg-blue-100 dark:hover:bg-[#1A2238] p-6 rounded shadow">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-2">Card Title 2</h3>
                <p>Another description for the second card.</p>
            </div>
            <div class="bg-gray-100 dark:bg-gray-700 hover:bg-blue-100 dark:hover:bg-[#1A2238] p-6 rounded shadow">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-2">Card Title 3</h3>
                <p>Details for the third card.</p>
            </div>
        </div>
    </section>

    <footer
        class="bg-white dark:bg-gray-800 text-center text-sm text-gray-500 dark:text-gray-400 py-6 border-t border-gray-200 dark:border-gray-700">
        © {{ date('Y') }} RAS Medical Clinic. All rights reserved.
    </footer>
</body>

</html>
