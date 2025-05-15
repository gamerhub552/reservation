@extends('layouts.dashboard')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-8 shadow rounded-lg mt-10">

    <h1 class="text-2xl font-bold mb-6">➕ Add New Service</h1>

    <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div>
            <label class="block font-semibold">Service Name</label>
            <input type="text" name="service_name" class="w-full border border-gray-300 rounded px-3 py-2 mt-1" required>
        </div>

        <div class="grid grid-cols-2 gap-6">
            <div>
                <label class="block font-semibold">Service Type</label>
                <select name="service_type" id="service_type" class="w-full border rounded px-3 py-2" onchange="updateSubType()" required>
                    <option value="">Select Type</option>
                    <option value="Restaurant">Restaurant</option>
                    <option value="Inclusion">Inclusion</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div>
                <label class="block font-semibold">Service Sub Type</label>
                <div id="subtype-container">
                    <input type="text" name="service_sub_type" id="service_sub_type" class="w-full border rounded px-3 py-2" placeholder="Enter Sub Type">
                </div>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-6">
            <div>
                <label class="block font-semibold">Price (₱)</label>
                <input type="number" step="0.01" name="price" class="w-full border rounded px-3 py-2" required>
            </div>
            <div>
                <label class="block font-semibold">Active</label>
                <select name="is_active" class="w-full border rounded px-3 py-2" required>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
        </div>

        <div>
            <label class="block font-semibold">Service Description</label>
            <textarea name="service_description" class="w-full border rounded px-3 py-2"></textarea>
        </div>

        <div>
            <label class="block font-semibold">Service Image</label>
            <input type="file" name="service_front_image" class="w-full border rounded px-3 py-2">
        </div>

        <div class="flex justify-end mt-4">
            <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-md shadow hover:bg-blue-700 transition">
                Save Service
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
</script>
@endsection
