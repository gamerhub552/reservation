<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    
    /**
     * Display a listing of the hotel services.
     */
    public function displayHotelServices()
    {
        // Fetch all services from the database
        $services = Service::all();

        return view('hotel.hotelservices', compact('services'));
    }

    public function confirm($id)
{
    $service = Service::findOrFail($id); 
    return view('hotel.hotelservicesconfirm', compact('service'));
}

    /**
     * Display a listing of the services.
     */
    public function index()
    {
        $services = Service::all();
        return view('services.index', compact('services'));
    }

    /**
     * Show the form for creating a new service.
     */
    public function create()
    {
        return view('services.create');
    }

    /**
     * Store a newly created service in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_name' => 'required|string|max:255',
            'service_type' => 'nullable|string|max:255',
            'service_sub_type' => 'nullable|string|max:255',
            'price' => 'nullable|numeric',
            'service_description' => 'nullable|string',
            'service_front_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('service_front_image')) {
            $validated['service_front_image'] = $request->file('service_front_image')->store('services', 'public');
        }

        Service::create($validated);

        return redirect()->route('services.index')->with('success', 'Service created successfully!');
    }

    /**
     * Display the specified service.
     */
    public function show(Service $service)
    {
        return view('services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified service.
     */
    public function edit(Service $service)
    {
        return view('services.edit', compact('service'));
    }

    /**
     * Update the specified service in storage.
     */
    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'service_name' => 'required|string|max:255',
            'service_type' => 'nullable|string|max:255',
            'service_sub_type' => 'nullable|string|max:255',
            'price' => 'nullable|numeric',
            'service_description' => 'nullable|string',
            'service_front_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('service_front_image')) {
            // Delete old image if exists
            if ($service->service_front_image && Storage::disk('public')->exists($service->service_front_image)) {
                Storage::disk('public')->delete($service->service_front_image);
            }
            $validated['service_front_image'] = $request->file('service_front_image')->store('services', 'public');
        }

        $service->update($validated);

        return redirect()->route('services.index')->with('success', 'Service updated successfully!');
    }

    /**
     * Remove the specified service from storage.
     */
    public function destroy(Service $service)
    {
        // Delete service front image if it exists
        if ($service->service_front_image && Storage::disk('public')->exists($service->service_front_image)) {
            Storage::disk('public')->delete($service->service_front_image);
        }
        
        $service->delete();

        return redirect()->route('services.index')->with('success', 'Service deleted successfully!');
    }

    /**
     * Display the hotel menu with different categories.
     */
    public function displayHotelMenu()
    {
        // Get services by their sub-type
        $mains = Service::where('service_sub_type', 'main')->get();
        $desserts = Service::where('service_sub_type', 'dessert')->get();
        $drinks = Service::where('service_sub_type', 'drink')->get();
        
        // Pass these variables to the view
        return view('hotel.hotelservices', compact('mains', 'desserts', 'drinks'));
    }

    public function displayHotelMenuOnHome()
{
    $mains = Service::where('service_sub_type', 'main')->get();
    $desserts = Service::where('service_sub_type', 'dessert')->get();
    $drinks = Service::where('service_sub_type', 'drink')->get();

    
    return view('hotel.hotelhome', compact('mains', 'desserts', 'drinks'));
}


public function orderService(Request $request)
{
    // Validate the incoming data
    $validated = $request->validate([
        'service_id' => 'required|exists:services,id',
        'quantity' => 'required|integer|min:1',
    ]);

    // Get the logged-in user
    $user = auth()->user();
    if (!$user) {
        return back()->with('error', 'You must be logged in.');
    }

    // Get the booking ID from the session
    $bookingId = session('booking_id');
    if (!$bookingId) {
        return back()->with('error', 'No active booking found.');
    }

    // Find the service that the user is ordering
    $service = Service::findOrFail($validated['service_id']);
    
    // Calculate the total price based on the quantity
    $total = $service->price * $validated['quantity'];

    // Create the order in the database
    Order::create([
        'user_id' => $user->id,
        'booking_id' => $bookingId,
        'service_id' => $service->id,
        'customer_name' => $user->name,
        'quantity' => $validated['quantity'],
        'total_price' => $total,
    ]);

    return redirect()->route('hotel.hotelprofile')->with('success_order', 'Order placed successfully!');

    
}



// In your controller
public function submitOrder(Request $request)
{
    // Validate input
    $validated = $request->validate([
        'service_id' => 'required|exists:services,id',
        'quantity' => 'required|integer|min:1',
    ]);

    // Process the order (store it in the database)
    $order = new Order();
    $order->service_id = $validated['service_id'];
    $order->quantity = $validated['quantity'];
    $order->total_price = $this->calculateTotalPrice($validated['service_id'], $validated['quantity']);
    $order->save();

    // Redirect back with success message
    return redirect()->route('service.menu')->with('success', 'Your order has been placed successfully!');
}

// Helper function to calculate the total price
protected function calculateTotalPrice($serviceId, $quantity)
{
    $service = Service::find($serviceId);
    return $service->price * $quantity;
}






    
}
