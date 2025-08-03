<div
    class="rounded-2xl border border-zinc-200 dark:border-zinc-700 bg-white dark:bg-zinc-900 p-4 shadow transition hover:shadow-lg cursor-pointer">
    <a href="{{ $route }}" class="flex items-center space-x-4">
        <div class="text-3xl text-blue-600 dark:text-blue-400">
            <i class="{{ $icon }}"></i>
        </div>
        <div>
            <h2 class="text-xl font-semibold text-zinc-800 dark:text-zinc-100">{{ $title }}</h2>
            <p class="text-sm text-zinc-600 dark:text-zinc-400">{{ $description }}</p>
        </div>
    </a>
</div>
