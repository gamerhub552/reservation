@extends('layouts.dashboard')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-8 shadow rounded-lg mt-10">

    <h1 class="text-2xl font-bold mb-6">✏️ Edit Service</h1>

    <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-semibold">Service Name</label>
            <input type="text" name="service_name" class="w-full border border-gray-300 rounded px-3 py-2 mt-1" value="{{ old('service_name', $service->service_name) }}" required>
        </div>

        <div class="grid grid-cols-2 gap-6">
            <div>
                <label class="block font-semibold">Service Type</label>
                <select name="service_type" id="service_type" class="w-full border rounded px-3 py-2" onchange="updateSubType()" required>
                    <option value="Restaurant" {{ old('service_type', $service->service_type) == 'Restaurant' ? 'selected' : '' }}>Restaurant</option>
                    <option value="Inclusion" {{ old('service_type', $service->service_type) == 'Inclusion' ? 'selected' : '' }}>Inclusion</option>
                    <option value="Other" {{ old('service_type', $service->service_type) == 'Other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>
            <div>
                <label class="block font-semibold">Service Sub Type</label>
                <div id="subtype-container">
                    @if(old('service_type', $service->service_type) == 'Restaurant')
                        <select name="service_sub_type" class="w-full border rounded px-3 py-2" required>
                            <option value="Main" {{ old('service_sub_type', $service->service_sub_type) == 'Main' ? 'selected' : '' }}>Main</option>
                            <option value="Dessert" {{ old('service_sub_type', $service->service_sub_type) == 'Dessert' ? 'selected' : '' }}>Dessert</option>
                            <option value="Drinks" {{ old('service_sub_type', $service->service_sub_type) == 'Drinks' ? 'selected' : '' }}>Drinks</option>
                        </select>
                    @else
                        <input type="text" name="service_sub_type" class="w-full border rounded px-3 py-2" value="{{ old('service_sub_type', $service->service_sub_type) }}" placeholder="Enter Sub Type">
                    @endif
                </div>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-6">
            <div>
                <label class="block font-semibold">Price (₱)</label>
                <input type="number" step="0.01" name="price" class="w-full border rounded px-3 py-2" value="{{ old('price', $service->price) }}" required>
            </div>
            <div>
                <label class="block font-semibold">Active</label>
                <select name="is_active" class="w-full border rounded px-3 py-2" required>
                    <option value="1" {{ $service->is_active == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ $service->is_active == 0 ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
        </div>

        <div>
            <label class="block font-semibold">Service Description</label>
            <textarea name="service_description" class="w-full border rounded px-3 py-2">{{ old('service_description', $service->service_description) }}</textarea>
        </div>

        <div>
            <label class="block font-semibold">Service Image</label>
            <input type="file" name="service_front_image" class="w-full border rounded px-3 py-2">

            @if ($service->service_front_image)
                <div class="mt-4">
                    <p class="font-semibold mb-2">Current Image:</p>
                    <img src="{{ asset('storage/' . $service->service_front_image) }}" alt="Service Image" class="w-40 h-40 object-cover rounded">
                </div>
            @endif
        </div>

        <div class="flex justify-end mt-4">
            <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-md shadow hover:bg-blue-700 transition">
                Update Service
            </button>
        </div>

    </form>
</div>

<script>
    function updateSubType() {
        const serviceType = document.getElementById('service_type').value;
        const subtypeContainer = document.getElementById('subtype-container');

        if (serviceType === 'Restaurant') {
            subtypeContainer.innerHTML = `
                <select name="service_sub_type" class="w-full border rounded px-3 py-2" required>
                    <option value="Main">Main</option>
                    <option value="Dessert">Dessert</option>
                    <option value="Drinks">Drinks</option>
                </select>
            `;
        } else {
            subtypeContainer.innerHTML = `
                <input type="text" name="service_sub_type" class="w-full border rounded px-3 py-2" placeholder="Enter Sub Type" required>
            `;
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        updateSubType();
    });
</script>
@endsection
