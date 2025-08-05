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
    @include('partials.navbar')
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
            <div
                class="bg-gray-100 dark:bg-gray-700 hover:bg-blue-100 dark:hover:bg-[#1A2238] p-6 rounded shadow transition-colors duration-300">
                <div class="flex items-center mb-4 text-blue-600 dark:text-blue-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8 7V3m8 4V3M5 11h14M5 19h14M5 15h14M3 3h18v18H3V3z" />
                    </svg>
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">General Checkups</h3>
                </div>
                <p>
                    Routine health assessments, physicals, and early detection of common medical conditions.
                </p>
            </div>

            <div
                class="bg-gray-100 dark:bg-gray-700 hover:bg-blue-100 dark:hover:bg-[#1A2238] p-6 rounded shadow transition-colors duration-300">
                <div class="flex items-center mb-4 text-blue-600 dark:text-blue-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 12h6m-6 0a3 3 0 01-3 3v3m3-6a3 3 0 00-3-3V3m0 18h.01" />
                    </svg>
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Immunizations</h3>
                </div>
                <p>
                    Stay protected with routine vaccinations for children, adults, and seasonal flu shots.
                </p>
            </div>

            <div
                class="bg-gray-100 dark:bg-gray-700 hover:bg-blue-100 dark:hover:bg-[#1A2238] p-6 rounded shadow transition-colors duration-300">
                <div class="flex items-center mb-4 text-blue-600 dark:text-blue-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 10l4.553 2.276a1 1 0 010 1.448L15 16M4 6h16M4 12h8m-8 6h16" />
                    </svg>
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Virtual Consultations</h3>
                </div>
                <p>
                    Speak to a physician from the comfort of your home via secure video appointments.
                </p>
            </div>
        </div>
    </section>

    @include('partials.footer')
</body>

</html>
