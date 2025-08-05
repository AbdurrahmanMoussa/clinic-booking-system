<x-layouts.app.sidebar :title="$title ?? null">
    <flux:main>

        <p class="text-lg text-gray-700 dark:text-gray-300 mb-2">Welcome to your dashboard,
            {{ auth()->user()->first_name }}.
        </p>
        {{ $slot }}
    </flux:main>
</x-layouts.app.sidebar>
