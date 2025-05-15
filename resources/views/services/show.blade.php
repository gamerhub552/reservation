@extends('layouts.dashboard')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-8 shadow rounded-lg mt-10">

    <h1 class="text-2xl font-bold mb-6">📋 Service Details</h1>

    <div class="space-y-6">
        <div>
            <label class="block font-semibold">Service Name</label>
            <p class="text-lg">{{ $service->service_name }}</p>
        </div>

        <div class="grid grid-cols-2 gap-6">
            <div>
                <label class="block font-semibold">Service Type</label>
                <p class="text-lg">{{ $service->service_type }}</p>
            </div>
            <div>
                <label class="block font-semibold">Service Sub Type</label>
                <p class="text-lg">{{ $service->service_sub_type }}</p>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-6">
            <div>
                <label class="block font-semibold">Price (₱)</label>
                <p class="text-lg">₱{{ number_format($service->price, 2) }}</p>
            </div>
            <div>
                <label class="block font-semibold">Status</label>
                <p class="text-lg">{{ $service->is_active ? 'Active' : 'Inactive' }}</p>
            </div>
        </div>

        <div>
            <label class="block font-semibold">Service Description</label>
            <p class="text-lg">{{ $service->service_description }}</p>
        </div>

        @if($service->service_front_image)
    <div>
        <label class="block font-semibold">Service Image</label>
        <div class="mt-2">
            <img src="{{ asset('storage/' . $service->service_front_image) }}" alt="Service Image" 
                class="rounded-lg shadow-md object-cover" 
                style="width: 300px; height: 200px;">
        </div>
    </div>
    @endif


        <div class="flex justify-end mt-4 space-x-3">
            <a href="{{ route('services.edit', $service->id) }}" class="bg-yellow-500 text-white px-6 py-3 rounded-md shadow hover:bg-yellow-600 transition">
                ✏️ Edit Service
            </a>
            <form action="{{ route('services.destroy', $service->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this service?')" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 text-white px-6 py-3 rounded-md shadow hover:bg-red-700 transition">
                    🗑️ Delete Service
                </button>
            </form>
        </div>

    </div>

</div>
@endsection
