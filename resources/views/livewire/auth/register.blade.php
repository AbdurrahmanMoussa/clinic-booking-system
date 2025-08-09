<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    public string $first_name = '';
    public string $last_name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    public string $date_of_birth = '';
    public string $health_card_number = '';
    public string $gender = '';

    public function register(): void
    {
        $validated = $this->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
            'date_of_birth' => ['required', 'date'],
            'health_card_number' => ['required', 'string', 'unique:patient_profiles,health_card_number'],
            'gender' => ['nullable', 'string'],
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $validated['role'] = 'patient';

        $user = User::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'role' => 'patient',
            'phone_number' => $this->phone_number ?? null,
        ]);

        $user->patientProfile()->create([
            'date_of_birth' => $validated['date_of_birth'],
            'health_card_number' => $validated['health_card_number'],
            'gender' => $validated['gender'],
        ]);
        event(new Registered($user));

        Auth::login($user);

        $this->redirectIntended(route('patient.dashboard', absolute: false), navigate: true);
    }
};
?>

<div class="flex flex-col gap-6">
    <x-auth-header :title="__('Create an account')" :description="__('Enter your details below to create your account')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="register" class="flex flex-col gap-6">
        <!-- Name -->
        <flux:input wire:model="first_name" :label="__('First Name')" type="text" required autofocus
            autocomplete="first_name" :placeholder="__('First name')" />
        <flux:input wire:model="last_name" :label="__('Last Name')" type="text" required autocomplete="last_name"
            :placeholder="__('Last name')" />

        <!-- Email Address -->
        <flux:input wire:model="email" :label="__('Email address')" type="email" required autocomplete="email"
            placeholder="email@example.com" />

        <!-- Password -->
        <flux:input wire:model="password" :label="__('Password')" type="password" required autocomplete="new-password"
            :placeholder="__('Password')" viewable />

        <!-- Confirm Password -->
        <flux:input wire:model="password_confirmation" :label="__('Confirm password')" type="password" required
            autocomplete="new-password" :placeholder="__('Confirm password')" viewable />

        <!-- Health Card Number -->
        <flux:input wire:model="phone_number" :label="__('Phone number')" type="phone" required
            :placeholder="__('e.g. (613) 555-5555')" />
        <!-- Date of Birth -->
        <flux:input wire:model="date_of_birth" :label="__('Date of Birth')" type="date" required autocomplete="bday"
            :placeholder="__('YYYY-MM-DD')" />

        <!-- Health Card Number -->
        <flux:input wire:model="health_card_number" :label="__('Health Card Number')" type="text" required
            :placeholder="__('e.g., A123456789')" />

        <label for="gender" class="block text-sm font-medium text-gray-300">Gender</label>
        <select id="gender" wire:model="gender"
            class=" block w-full rounded-lg bg-zinc-800 border border-zinc-700 text-gray-300 placeholder-gray-500 focus:ring-blue-500 focus:border-blue-500 text-sm px-4 py-2">
            <option value="">Select Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>




        <div class="flex items-center justify-end">
            <flux:button type="submit" variant="primary" class="w-full">
                {{ __('Create account') }}
            </flux:button>
        </div>
    </form>

    <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-600 dark:text-zinc-400">
        <span>{{ __('Already have an account?') }}</span>
        <flux:link :href="route('login')" wire:navigate>{{ __('Log in') }}</flux:link>
    </div>
</div>
