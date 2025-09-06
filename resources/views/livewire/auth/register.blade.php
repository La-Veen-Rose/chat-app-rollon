<div class="flex flex-col gap-6">
    <x-auth-header :title="__('Create an account')" :description="__('Enter your details below to create your account')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />
    <form wire:submit.prevent="register" class="flex flex-col gap-6">

        <!-- Profile Photo -->
        <div>
            <label for="profile_photo" class="block text-sm font-medium text-gray-700">
                Profile Picture
            </label>

            <input 
                id="profile_photo"
                type="file"
                wire:model="profile_photo"
                class="mt-1 block w-full text-sm text-gray-500
                    file:mr-4 file:py-2 file:px-4
                    file:rounded-full file:border-0
                    file:text-sm file:font-semibold
                    file:bg-blue-50 file:text-blue-700
                    hover:file:bg-blue-100"
                accept="image/*"
            />

            @if ($profile_photo)
                <img src="{{ $profile_photo->temporaryUrl() }}" class="mt-2 w-20 h-20 rounded-full" />

            @endif

            @error('profile_photo') <span class="text-red-500 text-sm">{{ $message }}</span> 
            @enderror

        </div>




            <!-- Name -->
            <flux:input
                wire:model="name"
                :label="__('Name')"
                type="text"
                required
                autofocus
                autocomplete="name"
                :placeholder="__('Full name')"
            />

            <!-- Email Address -->
            <flux:input
                wire:model="email"
                :label="__('Email address')"
                type="email"
                required
                autocomplete="email"
                placeholder="email@example.com"
            />

            <!-- Contact Number -->
            <flux:input
                wire:model="contact_number"
                :label="__('Contact Number')"
                type="text"
                required
                autocomplete="contact_number"
                placeholder="Contact Number"
            />

            <!-- Program -->
            <flux:input
                wire:model="program"
                :label="__('Program')"
                type="text"
                required
                autocomplete="program"
                placeholder="Program"
            />
            <!-- Year Level -->
            <flux:input
                wire:model="year_level"
                :label="__('Year Level')"
                type="text"
                required
                autocomplete="year level"
                placeholder="year level"
            />

            <!-- Password -->
            <flux:input
                wire:model="password"
                :label="__('Password')"
                type="password"
                required
                autocomplete="new-password"
                :placeholder="__('Password')"
                viewable
            />

            <!-- Confirm Password -->
            <flux:input
                wire:model="password_confirmation"
                :label="__('Confirm password')"
                type="password"
                required
                autocomplete="new-password"
                :placeholder="__('Confirm password')"
                viewable
            />

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
