<div class="max-w-7xl mx-auto p-6">
    <h1 class="text-3xl font-bold text-blue-600 dark:text-blue-400 mb-6">Our Doctors</h1>

    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        @foreach ($doctors as $u)
            <x-doctor-card :name="trim(($u->first_name ?? '') . ' ' . ($u->last_name ?? ''))" :specialty="$u->doctorProfile->specialty ?? null" :bio="$u->doctorProfile->bio ?? null" class="h-full" />
        @endforeach
    </div>
</div>
