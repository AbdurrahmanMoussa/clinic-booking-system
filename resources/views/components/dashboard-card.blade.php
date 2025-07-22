<div class="border rounded shadow p-4 hover:shadow-lg transition cursor-pointer">
    <a href="{{ $route }}">
        <div class="flex items-center space-x-4">
            <div class="text-3xl text-blue-600">
                <i class="{{ $icon }}"></i> <!-- Assuming you use FontAwesome or similar -->
            </div>
            <div>
                <h2 class="text-xl font-semibold">{{ $title }}</h2>
                <p class="text-gray-600">{{ $description }}</p>
            </div>
        </div>
    </a>
</div>