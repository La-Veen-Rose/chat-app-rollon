@extends('components.layouts.app')

@section('content')

<h1 class="text-xl font-bold mb-6">Edit Profile</h1>

<form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf

    <!-- Profile Photo -->
    <div class="mb-4">
        <label class="block text-sm font-medium">Profile Photo</label>

        <img id="preview"
            src="{{ $user->profile_photo ? asset('storage/' . $user->profile_photo) : '' }}"
            alt="Profile Photo"
            class="w-20 h-20 rounded-full mb-2 {{ $user->profile_photo ? '' : 'hidden' }}">

        @unless($user->profile_photo)
        <p id="no-photo-text">No profile photo uploaded.</p>
        @endunless

        <!-- File input styled -->
        <input type="file" name="profile_photo" id="profile_photo"
            class="form-control border rounded p-2 file:bg-green-300 file:border-0 file:rounded file:px-4 file:py-2 file:mr-3 file:text-black cursor-pointer">
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

<script>
    document.getElementById('profile_photo').addEventListener('change', function(e) {
        let preview = document.getElementById('preview');
        let noPhotoText = document.getElementById('no-photo-text');

        if (this.files && this.files[0]) {
            let reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
                if (noPhotoText) noPhotoText.classList.add('hidden');
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
</script>

@endsection