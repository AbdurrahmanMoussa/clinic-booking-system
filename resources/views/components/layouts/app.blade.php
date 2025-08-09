<x-layouts.app.sidebar :title="$title ?? null">
    <flux:main>
        @auth
            <p class="text-lg text-gray-700 dark:text-gray-300 mb-2">
                Welcome to your dashboard, {{ auth()->user()->first_name }}.
            </p>
        @else
            <p class="text-lg text-gray-700 dark:text-gray-300 mb-2">
                Welcome.
            </p>
        @endauth

        {{ $slot }}
    </flux:main>
</x-layouts.app.sidebar>
