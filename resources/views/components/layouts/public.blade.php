<!DOCTYPE html>
<html lang="en" x-data x-bind:class="{ 'dark': $flux.appearance === 'dark' }"
    class="transition-colors duration-500 scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <title>{{ $title ?? 'RAS Clinic' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('partials.head')
</head>

<body
    class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 transition-colors duration-500 min-h-screen flex flex-col">
    @include('partials.navbar')

    <main class="flex-grow py-16 px-4">
        {{ $slot }}
    </main>

    @include('partials.footer')
</body>

</html>
