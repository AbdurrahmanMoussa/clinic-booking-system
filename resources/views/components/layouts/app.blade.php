<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Clinic App') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-black dark:bg-gray-900 dark:text-white min-h-screen antialiased">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-100 dark:bg-gray-800 p-4 hidden md:block">
            <div class="mb-8">
                <a href="{{ route(auth()->user()?->role === 'doctor' ? 'doctor.dashboard' : 'patient.dashboard') }}">
                    <x-application-logo class="h-10 w-auto text-gray-700 dark:text-gray-200" />
                </a>
            </div>

            <nav class="space-y-4">
                <x-role-dashboard-link />
                <!-- Add more links below if needed -->
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 overflow-y-auto">
            <header class="bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-700 shadow px-6 py-4">
                <h1 class="text-2xl font-bold">
                    {{ $title ?? 'Dashboard' }}
                </h1>
            </header>

            <main class="p-6">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html>
