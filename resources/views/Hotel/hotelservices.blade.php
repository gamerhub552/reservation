@extends('layouts.hotel')

@section('content')

<section class="site-hero inner-page overlay" style="background-image: url(images/hero_4.jpg)" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row site-hero-inner justify-content-center align-items-center">
            <div class="col-md-10 text-center" data-aos="fade">
                <h1 class="heading mb-3">Services</h1>
                <ul class="custom-breadcrumbs mb-4">
                    <li><a href="/hotelhome">Home</a></li>
                    <li>&bullet;</li>
                    <li>Services</li>
                </ul>
            </div>
        </div>
    </div>
    <a class="mouse smoothscroll" href="#next">
        <div class="mouse-icon">
            <span class="mouse-wheel"></span>
        </div>
    </a>
</section>

<section class="section bg-image overlay" style="background-image: url('images/hero_3.jpg');">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-md-7">
                <h2 class="heading text-white" data-aos="fade">Our Restaurant Menu</h2>
                <p class="text-white" data-aos="fade" data-aos-delay="100">Click Services to access more details and to order on our restaurant</p>
            </div>
        </div>

        <div class="food-menu-tabs" data-aos="fade">
            <ul class="nav nav-tabs mb-5" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active letter-spacing-2" id="mains-tab" data-toggle="tab" href="#mains" role="tab">Mains</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link letter-spacing-2" id="desserts-tab" data-toggle="tab" href="#desserts" role="tab">Desserts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link letter-spacing-2" id="drinks-tab" data-toggle="tab" href="#drinks" role="tab">Drinks</a>
                </li>
            </ul>

            <div class="tab-content py-5" id="myTabContent">
                {{-- Mains --}}
                <div class="tab-pane fade show active text-left" id="mains" role="tabpanel">
                    <div class="row">
                        @foreach($mains as $main)
                            <div class="col-md-6">
                                <div class="food-menu mb-5">
                                    <img src="{{ asset('storage/' . $main->service_front_image) }}" alt="{{ $main->service_name }}" class="img-fluid" style="width: 250px; height: 250px; object-fit: cover;">
                                    <div>
                                        <span class="d-block text-primary h4 mb-1">₱{{ $main->price }}</span>
                                        <h3 class="text-white">{{ $main->service_name }}</h3>
                                        <p class="d-block mb-2">{{ $main->service_description }}</p>
                                        <button type="button" class="text-center btn btn-sm btn-primary" onclick="showOrderModal({{ $main->id }}, '{{ $main->service_name }}', '{{ $main->service_description }}', '{{ $main->price }}')">Order</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Desserts --}}
                <div class="tab-pane fade text-left" id="desserts" role="tabpanel">
                    <div class="row">
                        @foreach($desserts as $dessert)
                            <div class="col-md-6">
                                <div class="food-menu mb-5">
                                    <img src="{{ asset('storage/' . $dessert->service_front_image) }}" alt="{{ $dessert->service_name }}" class="img-fluid" style="width: 250px; height: 250px; object-fit: cover;">
                                    <div>
                                        <span class="d-block text-primary h4 mb-1">₱{{ $dessert->price }}</span>
                                        <h3 class="text-white">{{ $dessert->service_name }}</h3>
                                        <p class="d-block mb-2">{{ $dessert->service_description }}</p>
                                        <button type="button" class="text-center btn btn-sm btn-primary" onclick="showOrderModal({{ $dessert->id }}, '{{ $dessert->service_name }}', '{{ $dessert->service_description }}', '{{ $dessert->price }}')">Order</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Drinks --}}
                <div class="tab-pane fade text-left" id="drinks" role="tabpanel">
                    <div class="row">
                        @foreach($drinks as $drink)
                            <div class="col-md-6">
                                <div class="food-menu mb-5">
                                    <img src="{{ asset('storage/' . $drink->service_front_image) }}" alt="{{ $drink->service_name }}" class="img-fluid" style="width: 250px; height: 250px; object-fit: cover;">
                                    <div>
                                        <span class="d-block text-primary h4 mb-1">₱{{ $drink->price }}</span>
                                        <h3 class="text-white">{{ $drink->service_name }}</h3>
                                        <p class="d-block mb-2">{{ $drink->service_description }}</p>
                                        <button type="button" class="text-center btn btn-sm btn-primary" onclick="showOrderModal({{ $drink->id }}, '{{ $drink->service_name }}', '{{ $drink->service_description }}', '{{ $drink->price }}')">Order</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Order Modal -->
<div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="orderModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderModalLabel">Order Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <h2 id="orderName">Service Name</h2>
                    <p id="orderDescription">Service Description</p>
                    <p id="orderPrice">₱0</p>

                    <form action="{{ route('order.submit') }}" method="POST">
                        @csrf
                        <input type="hidden" name="service_id" id="serviceId">
                        <input type="number" name="quantity" id="quantity" value="1" min="1" required>
                        <button type="submit" class="btn btn-primary btn-block">Confirm Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Function to set the modal content dynamically
    function showOrderModal(serviceId, serviceName, serviceDescription, servicePrice) {
        // Set the modal content
        document.getElementById('orderName').innerText = serviceName;
        document.getElementById('orderDescription').innerText = serviceDescription;
        document.getElementById('orderPrice').innerText = '₱' + servicePrice;
        document.getElementById('serviceId').value = serviceId;

        // Show the modal
        $('#orderModal').modal('show');
    }
</script>

@endsection
