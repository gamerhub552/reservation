@extends('layouts.dashboard')

@section('content')
<!-- Page Title -->
<div class="mb-10">
  <h1 class="text-4xl font-bold text-gray-900">🌐 Website Dashboard</h1>
  <p class="text-gray-500 mt-2">Manage all your website content from this dashboard.</p>
</div>

<!-- Navigation Tabs -->
<nav class="mb-12">
  <ul class="flex flex-wrap gap-6 text-gray-600 font-medium border-b">
    <li><a href="/websitehome" class="pb-2 hover:text-blue-600 border-b-2 border-transparent hover:border-blue-500 transition">Home</a></li>
    <li><a href="/websiterooms" class="pb-2 hover:text-blue-600 border-b-2 border-transparent hover:border-blue-500 transition">Rooms</a></li>
    <li><a href="/websiteservices" class="pb-2 hover:text-blue-600 border-b-2 border-transparent hover:border-blue-500 transition">Services</a></li>
    <li><a href="/websiteprofile" class="pb-2 hover:text-blue-600 border-b-2 border-transparent hover:border-blue-500 transition">Profile</a></li>
    <li><a href="/websitecontact" class="pb-2 hover:text-blue-600 border-b-2 border-transparent hover:border-blue-500 transition">Contact</a></li>
    <li><a href="/websiteabout" class="pb-2 hover:text-blue-600 border-b-2 border-transparent hover:border-blue-500 transition">About</a></li>
  </ul>
</nav>

<!-- Sections Container -->
<div class="space-y-16">

  <!-- Section Template -->
  @php
    $sections = ['Landing', 'Welcome', 'Room', 'Photo', 'Menu', 'Services'];
  @endphp

    <!-- Dashboard Content -->
    <div class="text-center">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Manage Room Page</h2>
        <p class="text-lg text-gray-600">Easily manage your website content using the navigation tabs above.</p>
    </div>

</div>
@endsection
