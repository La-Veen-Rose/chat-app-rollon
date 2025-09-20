@extends('components.layouts.app')

@section('content')
<h1 class="text-xl font-bold mb-6">USER DASHBOARD</h1>

<div class="flex flex-col space-y-4">
    <!-- Profile Photo -->
    @if(Auth::user()->profile_photo)
    <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}"
        class="w-20 h-20 rounded-full object-cover" />
    @else
    <div class="w-20 h-20 rounded-full bg-gray-300 flex items-center justify-center">
        <span class="text-gray-600 text-sm">No Photo</span>
    </div>
    @endif

    <!-- User Info -->
    <div class="text-left space-y-1">
        <p class="font-bold text-lg">{{ Auth::user()->name }}</p>
        <p>Email: {{ Auth::user()->email }}</p>
        <p>Contact #: {{ Auth::user()->contact_number }}</p>
        <p>Program: {{ Auth::user()->program }}</p>
        <p>Year: {{ Auth::user()->year_level }}</p>
    </div>

    <!-- Logout Button -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit"
            class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
            Logout
        </button>
    </form>
</div>
@endsection