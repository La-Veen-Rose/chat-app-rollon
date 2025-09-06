@extends('components.layouts.app')

@section('content')

    <h1 class="text-xl font-bold mb-6">Edit Profile</h1>

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <!--Profile Photo-->
        <div class="mb-4">
            <label class="block text-sm font-medium">Profile Photo</label>
            @if($user->profile_photo)
                <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="Profile Photo" class="w-20 h-20 rounded-full mb-2">
            @else
                <p>No profile photo uploaded.</p>
            @endif
            <input type="file" name="profile_photo" class="w-full border rounded p-2">
        </div>

        <!-- Name -->
        <input type="text" name="name" value="{{ old('name', $user->name) }}" 
               class="border p-2 w-full" placeholder="Full Name">

        <!-- Email -->
        <input type="email" name="email" value="{{ old('email', $user->email) }}" 
               class="border p-2 w-full" placeholder="Email">

        <!-- Contact -->
        <input type="text" name="contact_number" value="{{ old('contact_number', $user->contact_number) }}" 
               class="border p-2 w-full" placeholder="Contact Number">

        <!-- Program -->
        <input type="text" name="program" value="{{ old('program', $user->program) }}" 
               class="border p-2 w-full" placeholder="Program">

        <!-- Year Level -->
        <input type="text" name="year_level" value="{{ old('year_level', $user->year_level) }}" 
               class="border p-2 w-full" placeholder="Year Level">

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
            Update Profile
        </button>
    </form>
@endsection
