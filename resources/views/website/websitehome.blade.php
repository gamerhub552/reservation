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
  
  <!-- Landing Section -->
  <section class="bg-white border border-gray-100 rounded-xl shadow-sm p-6">
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Landing Section</h2>
    <form method="POST" enctype="multipart/form-data" class="space-y-4">
      @csrf
      <input type="text" placeholder="Title for Landing section" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:ring-2 focus:ring-blue-400 focus:outline-none">
      <textarea rows="4" placeholder="Description for Landing section" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:ring-2 focus:ring-blue-400 focus:outline-none"></textarea>
      <label class="block text-sm font-medium text-gray-700">Background Image</label>
      <input type="file" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm text-gray-500">
      <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-md text-sm font-medium transition">Save Changes</button>
    </form>
  </section>

  <!-- Welcome Section -->
  <section class="bg-white border border-gray-100 rounded-xl shadow-sm p-6">
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Welcome Section</h2>
    <form method="POST" enctype="multipart/form-data" class="space-y-4">
      @csrf
      <input type="text" placeholder="Title for Welcome section" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:ring-2 focus:ring-blue-400 focus:outline-none">
      <textarea rows="4" placeholder="Description for Welcome section" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:ring-2 focus:ring-blue-400 focus:outline-none"></textarea>
      
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="block text-sm font-medium text-gray-700">Main Image</label>
          <input type="file" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm text-gray-500">
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700">Supporting Image</label>
          <input type="file" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm text-gray-500">
        </div>
      </div>

      <input type="text" placeholder="Google Maps Embed URL" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:ring-2 focus:ring-blue-400 focus:outline-none">
      <input type="text" placeholder="YouTube Video Embed URL" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:ring-2 focus:ring-blue-400 focus:outline-none">
      <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-md text-sm font-medium transition">Save Changes</button>
    </form>
  </section>

  <!-- Room Section -->
  <section class="bg-white border border-gray-100 rounded-xl shadow-sm p-6">
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Room Section</h2>
    <form method="POST" enctype="multipart/form-data" class="space-y-4">
      @csrf
      <input type="text" placeholder="Title for Room section" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:ring-2 focus:ring-blue-400 focus:outline-none">
      <textarea rows="4" placeholder="Description for Room section" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:ring-2 focus:ring-blue-400 focus:outline-none"></textarea>
      <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-md text-sm font-medium transition">Save Changes</button>
    </form>
  </section>

  <!-- Photo Section -->
  <section class="bg-white border border-gray-100 rounded-xl shadow-sm p-6">
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Photo Section</h2>
    <form method="POST" enctype="multipart/form-data" class="space-y-4">
      @csrf
      <input type="text" placeholder="Title for Photo section" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:ring-2 focus:ring-blue-400 focus:outline-none">
      <textarea rows="4" placeholder="Description for Photo section" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:ring-2 focus:ring-blue-400 focus:outline-none"></textarea>
      <label class="block text-sm font-medium text-gray-700">Carousel Images</label>
      <input type="file" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm text-gray-500">
      <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-md text-sm font-medium transition">Save Changes</button>
    </form>
  </section>

  <!-- Menu Section -->
  <section class="bg-white border border-gray-100 rounded-xl shadow-sm p-6">
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Menu Section</h2>
    <form method="POST" enctype="multipart/form-data" class="space-y-4">
      @csrf
      <input type="text" placeholder="Title for Menu section" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:ring-2 focus:ring-blue-400 focus:outline-none">
      <textarea rows="4" placeholder="Description for Menu section" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:ring-2 focus:ring-blue-400 focus:outline-none"></textarea>
      <label class="block text-sm font-medium text-gray-700">Menu Background Image</label>
      <input type="file" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm text-gray-500">
      <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-md text-sm font-medium transition">Save Changes</button>
    </form>
  </section>

  <!-- Services Section -->
  <section class="bg-white border border-gray-100 rounded-xl shadow-sm p-6">
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Services Section</h2>
    <form method="POST" enctype="multipart/form-data" class="space-y-4">
      @csrf
      <input type="text" placeholder="Title for Services section" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:ring-2 focus:ring-blue-400 focus:outline-none">
      <textarea rows="4" placeholder="Description for Services section" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:ring-2 focus:ring-blue-400 focus:outline-none"></textarea>
      <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-md text-sm font-medium transition">Save Changes</button>
    </form>
  </section>

</div>
@endsection
