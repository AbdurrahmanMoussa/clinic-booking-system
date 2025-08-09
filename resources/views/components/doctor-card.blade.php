<article
    {{ $attributes->merge([
        'class' => 'bg-white dark:bg-gray-800 border border-gray-100 dark:border-gray-700
                     rounded-2xl p-5 shadow hover:shadow-lg transition-shadow duration-200 hover:scale-[1.02]',
    ]) }}>

    <div class="flex items-start gap-4">
        @if (!empty($avatar))
            <img src="{{ $avatar }}" alt="{{ $name ?? '' }} avatar"
                class="h-12 w-12 rounded-full object-cover ring-2 ring-gray-200 dark:ring-gray-700">
        @else
            <div
                class="h-12 w-12 rounded-full flex items-center justify-center
                        bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-100 font-semibold">
                {{ collect(explode(' ', $name ?? ''))->map(fn($p) => mb_substr($p, 0, 1))->take(2)->implode('') }}
            </div>
        @endif

        <div class="min-w-0">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 truncate">
                @if (!empty($href))
                    <a href="{{ $href }}" class="hover:text-blue-700 dark:hover:text-blue-400">
                        {{ $name ?? '' }}
                    </a>
                @else
                    {{ $name ?? '' }}
                @endif
            </h3>
            <p class="text-sm text-blue-700 dark:text-blue-400">
                {{ $specialty ?? 'General' }}
            </p>
        </div>
    </div>

    <p class="mt-3 text-sm text-gray-700 dark:text-gray-300 line-clamp-4">
        {{ $bio ?? 'No bio available.' }}
    </p>
</article>
