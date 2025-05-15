<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Casa Leticia Boutique Hotel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=|Roboto+Sans:400,700|Playfair+Display:400,700">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/fancybox.min.css">
    
    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
<header class="site-header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-6 col-lg-4 site-logo">
                <a href="">
                    <img src="{{ asset('images/casalogo.jpg') }}" alt="Casa Leticia Boutique Hotel Logo" width="200" height="auto">
                </a>
            </div>
            <div class="col-6 col-lg-8">
                <nav role="navigation">
                    <div class="nav-links">
                        <a href="/hotelhome">Home</a>
                        <a href="/hotelrooms">Rooms</a>
                        <a href="/hotelservices">Services</a>

                        <!-- Profile Button with Conditional Logic -->
                        @if(Auth::check())
                            <a href="/hotelprofile">Profile</a>
                        @else
                            <a href="#" data-toggle="modal" data-target="#authModal" onclick="alert('Please log in first to view your profile')">Profile</a>
                        @endif

                        <a href="/contact">Contact</a>
                        <a href="/about">About</a>

                        <!-- Log In Button -->
                        @if(Auth::check())
                            <a href="/logout">Log Out</a>
                        @else
                            <a href="#" data-toggle="modal" data-target="#authModal">Log In</a>
                        @endif
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>


    <section class="site-hero overlay" style="background-image: url(images/hero_4a.jpg)" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row site-hero-inner justify-content-center align-items-center">
          <div class="col-md-10 text-center" data-aos="fade-up">
            <h1 class="heading">Where Comfort and Warmth Meet</h1>
            <span class="custom-caption text-uppercase text-white d-block  mb-3">Welcome To Casa Leticia Boutique Hotel <span class="fa fa-star text-primary"></span> <br>Pelayo St, Poblacion, Davao City, Philippines, 8000 </span>
          </div>
        </div>
      </div>

      <a class="mouse smoothscroll" href="#next">
        <div class="mouse-icon">
          <span class="mouse-wheel"></span>
        </div>
      </a>
    </section>

    <section class="py-5 bg-light">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-12 col-lg-7 ml-auto order-lg-2 position-relative mb-5" data-aos="fade-up">
            <figure class="img-absolute">
              <img src="images/food-1.jpg" alt="Image" class="img-fluid">
            </figure>
            <img src="images/hero_4b.jpg" alt="Image" class="img-fluid rounded">
          
          </div>
          <div class="col-md-12 col-lg-4 order-lg-1" data-aos="fade-up">
    <h2 class="heading">Welcome!</h2>
    <p class="mb-4">"Nestled in the heart of the city, our cozy hotel offers a peaceful retreat with warm rooms, soft bedding, and a welcoming atmosphere. Relax by the fireplace or enjoy personalized service that makes you feel right at home." </p>
    <p>
        <a href="" class="btn btn-primary text-white py-2 mr-3" data-toggle="modal" data-target="#mapModal">View Map</a>
        <span class="mr-3 font-family-serif"><em>|</em></span>
        <a href="https://www.youtube.com/watch?v=wTUUln5M8vA" data-fancybox class="text-uppercase letter-spacing-1">See video</a>
    </p>
</div>

        </div>
      </div>
    </section>

    <section class="section" id="next">

<div class="row justify-content-center text-center mb-5">
          <div class="col-md-7">
            <h2 class="heading" data-aos="fade-up">Room and Suites</h2>
            <p data-aos="fade-up" data-aos-delay="100">We offer cozy and affordable suites and rooms. With great service, we strive to create a memorable and relaxing stay for every guest. Located in the heart of Davao City, we provide easy access to local attractions and business centers, making us the perfect choice for both leisure and business travelers.</p>
          </div>
    
        
  <div class="container">

    <div class="row">
      @foreach($rooms->take(3) as $room) 
      <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up">
      <div class="room">
          <figure class="img-wrap" style="width: 100%; height: 250px; overflow: hidden;">
            <img src="{{ asset('storage/' . $room->room_front_image) }}" alt="{{ $room->room_name }}" style="width: 100%; height: 100%; object-fit: cover;">
          </figure>
          <h3>{{ $room->room_name }}</h3>
          <span class="text-uppercase letter-spacing-1">₱{{ number_format($room->room_rate, 2) }} / per night</span><br>
          <span class="text-lowercase letter-spacing-1" style="color: black;">{{ $room->room_description }}</span>

          <div class="d-flex justify-content-center mt-2">
          <a href ="/hotelrooms">View Our Rooms Now!</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

    
    <section class="section slider-section bg-light">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-7">
            <h2 class="heading" data-aos="fade-up">Photos</h2>
            <p data-aos="fade-up" data-aos-delay="100">Junjuntani</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="home-slider major-caousel owl-carousel mb-5" data-aos="fade-up" data-aos-delay="200">
              <div class="slider-item">
                <a href="images/slider-1.jpg" data-fancybox="images" data-caption="Caption for this image"><img src="images/slider-1.jpg" alt="Image placeholder" class="img-fluid"></a>
              </div>
              <div class="slider-item">
                <a href="images/slider-2.jpg" data-fancybox="images" data-caption="Caption for this image"><img src="images/slider-2.jpg" alt="Image placeholder" class="img-fluid"></a>
              </div>
              <div class="slider-item">
                <a href="images/slider-3.jpg" data-fancybox="images" data-caption="Caption for this image"><img src="images/slider-3.jpg" alt="Image placeholder" class="img-fluid"></a>
              </div>
              <div class="slider-item">
                <a href="images/slider-4.jpg" data-fancybox="images" data-caption="Caption for this image"><img src="images/slider-4.jpg" alt="Image placeholder" class="img-fluid"></a>
              </div>
              <div class="slider-item">
                <a href="images/slider-5.jpg" data-fancybox="images" data-caption="Caption for this image"><img src="images/slider-5.jpg" alt="Image placeholder" class="img-fluid"></a>
              </div>
              <div class="slider-item">
                <a href="images/slider-6.jpg" data-fancybox="images" data-caption="Caption for this image"><img src="images/slider-6.jpg" alt="Image placeholder" class="img-fluid"></a>
              </div>
              <div class="slider-item">
                <a href="images/slider-7.jpg" data-fancybox="images" data-caption="Caption for this image"><img src="images/slider-7.jpg" alt="Image placeholder" class="img-fluid"></a>
              </div>
            </div>
          </div>
        
        </div>
      </div>
    </section>
    
    <section class="section bg-image overlay" style="background-image: url('images/hero_3.jpg');">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-7">
            <h2 class="heading text-white" data-aos="fade">Our Restaurant Menu</h2>
            <p class="text-white" data-aos="fade" data-aos-delay="100">Click Services to acccess more details and to order on our restuarant</p>
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
                @forelse($mains as $main)
                <div class="col-md-6">
                    <div class="food-menu mb-5">
                        <div>
                            <span class="d-block text-primary h4 mb-1">₱{{ $main->price }}</span>
                            <h3 class="text-white" style="margin: 0;"><a href="#" class="text-white">{{ $main->service_name }}</a></h3>
                        </div>
                        <p class="text-white text-opacity-7 mt-3">{{ $main->service_description }}</p>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <p class="text-white">Nothing Listed</p>
                </div>
                @endforelse
            </div>
        </div>

        {{-- Desserts --}}
        <div class="tab-pane fade text-left" id="desserts" role="tabpanel">
            <div class="row">
                @forelse($desserts as $dessert)
                <div class="col-md-6">
                    <div class="food-menu mb-5">
                        <span class="d-block text-primary h4 mb-1">₱{{ $dessert->price }}</span>
                        <h3 class="text-white"><a href="#" class="text-white">{{ $dessert->service_name }}</a></h3>
                        <p class="text-white text-opacity-7">{{ $dessert->service_description }}</p>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <p class="text-white">Nothing Listed</p>
                </div>
                @endforelse
            </div>
        </div>

        {{-- Drinks --}}
        <div class="tab-pane fade text-left" id="drinks" role="tabpanel">
            <div class="row">
                @forelse($drinks as $drink)
                <div class="col-md-6">
                    <div class="food-menu mb-5">
                        <span class="d-block text-primary h4 mb-1">₱{{ $drink->price }}</span>
                        <h3 class="text-white"><a href="#" class="text-white">{{ $drink->service_name }}</a></h3>
                        <p class="text-white text-opacity-7">{{ $drink->service_description }}</p>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <p class="text-white">Nothing Listed</p>
                </div>
                @endforelse
            </div>
        </div>

    </div>
</div>

    </section>

    <section class="section blog-post-entry bg-light" id="next">
    <h2 class="heading text-black" style="text-align: center;" data-aos="fade">Services</h2>
      
    <div class="container">

        <div class="row">

          <div class="col-lg-4 col-md-6 col-sm-6 col-12 post mb-5" data-aos="fade-up" data-aos-delay="100">

            <div class="media media-custom d-block mb-4 h-100">
              <a href="#" class="mb-4 d-block"><img src="images/img_1.jpg" alt="Image placeholder" class="img-fluid"></a>
              <div class="media-body">
                <h2 class="mt-0 mb-3"><a href="#">Location and Accessibility</a></h2>
                <p>Located in the heart of Davao City <br> Inside city center (Pin icon) <br> 910 meters to public transportation (Bus icon)</p>

              </div>
            </div>

          </div>
          <div class="col-lg-4 col-md-6 col-sm-6 col-12 post mb-5" data-aos="fade-up" data-aos-delay="200">
            <div class="media media-custom d-block mb-4 h-100">
              <a href="#" class="mb-4 d-block"><img src="images/img_2.jpg" alt="Image placeholder" class="img-fluid"></a>
              <div class="media-body">
                <h2 class="mt-0 mb-3"><a href="#">Key Amenities/Services</a></h2>
                <p>Front desk [24-hour] <br> Great Breakfast </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6 col-12 post mb-5" data-aos="fade-up" data-aos-delay="300">
            <div class="media media-custom d-block mb-4 h-100">
              <a href="#" class="mb-4 d-block"><img src="images/img_3.jpg" alt="Image placeholder" class="img-fluid"></a>
              <div class="media-body">
                <h2 class="mt-0 mb-3"><a href="#">Core Inclusions</a></h2>
                <p>Free Wi-Fi <br> Free parking | Breakfast <br> Front desk [24-hour] | Room service <br> Restaurant | Business center <br> Luggage storage</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 col-sm-6 col-12 post mb-5" data-aos="fade-up" data-aos-delay="100">

            <div class="media media-custom d-block mb-4 h-100">
              <a href="#" class="mb-4 d-block"><img src="images/img_4.jpg" alt="Image placeholder" class="img-fluid"></a>
              <div class="media-body">
                <h2 class="mt-0 mb-3"><a href="#"> Additional Amenities </a></h2>
                <p>Hair Dryer,
Non-Smoking Facility,
Restaurant,
Room Service,
Refrigerator,
Cable/Satellite TV,
In room safe,
Internet Access - Free Public Access,
Daily Housekeeping,
Hygiene Certification,
Meeting/Banquet Facilities,
Newspapers,
Seating Area,
Ironing Amenities,
Separate Shower/Bathtub, </p>
              </div>
            </div>

          </div>
          <div class="col-lg-4 col-md-6 col-sm-6 col-12 post mb-5" data-aos="fade-up" data-aos-delay="200">
            <div class="media media-custom d-block mb-4 h-100">
              <a href="#" class="mb-4 d-block"><img src="images/img_1.jpg" alt="Image placeholder" class="img-fluid"></a>
              <div class="media-body">
                <h2 class="mt-0 mb-3"><a href="#">And More Amenities</a></h2>
                <p>
Air Conditioning,
Breakfast - Free,
Facilities For Disabled Guests Available,
Luggage Storage & Lockers,
Desk/Workspace Available,
Elevator,
First Aid Kit Available,
Tour Services,
Parking - Free,
Smoke Alarms,
Toiletries Provided,
Non-Smoking Rooms Available,
Parking - On-Site,
Telephone,
CCTV security in common areas,
Room Towels Provided.
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6 col-12 post mb-5" data-aos="fade-up" data-aos-delay="300">
            <div class="media media-custom d-block mb-4 h-100">
              <a href="#" class="mb-4 d-block"><img src="images/img_2.jpg" alt="Image placeholder" class="img-fluid"></a>
              <div class="media-body">
                <h2 class="mt-0 mb-3"><a href="#">Convenience and Emphasis on Accessibility and Safety:</a></h2>
                <p>
Facilities For Disabled Guests Available <br>
First Aid Kit Available <br>
Smoke Alarms <br>
CCTV security in common areas <br>
Telephone <br>
Room Towels Provided <br>
</p>
              </div>
            </div>
          </div>
        </div>
        </div>
        </section>
    

    <footer class="section footer-section">
      
    <div class="container">
        <div class="row mb-4">
          <div class="col-md-3 mb-5">
            <ul class="list-unstyled link">
              <li><a href="#">About Us</a></li>
              <li><a href="#">Terms &amp; Conditions</a></li>
              <li><a href="#">Privacy Policy</a></li>
             <li><a href="#">Rooms</a></li>
            </ul>
          </div>
          <div class="col-md-3 mb-5">
            <ul class="list-unstyled link">
              <li><a href="#">The Rooms &amp; Suites</a></li>
              <li><a href="#">About Us</a></li>
              <li><a href="#">Contact Us</a></li>
              <li><a href="#">Restaurant</a></li>
            </ul>
          </div>
          <div class="col-md-3 mb-5 pr-md-5 contact-info">

            <p><span class="d-block"><span class="ion-ios-location h5 mr-3 text-primary"></span>Address:</span> <span> Pelayo St, Poblacion, Davao City, Philippines, 8000 </span></p>
            <p><span class="d-block"><span class="ion-ios-telephone h5 mr-3 text-primary"></span>Phone:</span> <span> (+63) 945403210</span></p>
            <p><span class="d-block"><span class="ion-ios-email h5 mr-3 text-primary"></span>Email:</span> <span> info@domain.com</span></p>
          </div>
          <div class="col-md-3 mb-5">
            <p>Sign up for our newsletter</p>
            <form action="#" class="footer-newsletter">
              <div class="form-group">
                <input type="email" class="form-control" placeholder="Email...">
                <button type="submit" class="btn"><span class="fa fa-paper-plane"></span></button>
              </div>
            </form>
          </div>
        </div>
        <div class="row pt-5">
          <p class="col-md-6 text-left">
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Bring Duterte Back </a>
          </p>
            
          <p class="col-md-6 text-right social">
            <a href="#"><span class="fa fa-facebook"></span></a>
            <a href="#"><span class="fa fa-twitter"></span></a>
            <a href="#"><span class="fa fa-linkedin"></span></a>
          </p>
        </div>
      </div>
</footer>


<div class="modal fade" id="bookingModal" tabindex="-1" role="dialog" aria-labelledby="mapModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Book now</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <br><br><br><br>
            </div>

            <form action="{{ route('bookings.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <section class="section pb-4">
                        <div class="container">
                            <div class="row check-availabilty" id="next">
                                <div class="block-32" data-aos="fade-up" data-aos-offset="-200">
                                    <div class="row">
                                        <div class="col-md-6 mb-3 col-lg-3">
                                            <label for="CheckIn" class="font-weight-bold text-black">Check In</label>
                                            <div class="field-icon-wrap">
                                                <div class="icon"><span class="icon-calendar"></span></div>
                                                <input type="date" name="CheckIn" id="CheckIn" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3 col-lg-3">
                                            <label for="CheckOut" class="font-weight-bold text-black">Check Out</label>
                                            <div class="field-icon-wrap">
                                                <div class="icon"><span class="icon-calendar"></span></div>
                                                <input type="date" name="CheckOut" id="CheckOut" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3 col-lg-3">
                                            <label for="Pax" class="font-weight-bold text-black">Number Of Guest</label>
                                            <div class="field-icon-wrap">
                                                <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                                <input type="number" name="Pax" id="Pax" class="form-control" value="1" min="1" step="1" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3 col-lg-3">
                                            <label for="GuestName" class="font-weight-bold text-black">Guest Name</label>
                                            <input type="text" name="GuestName" id="GuestName" class="form-control" required>
                                        </div>

                                        <input type="hidden" name="RoomID" value="1">
                                        <input type="hidden" name="RoomNumber" value="101">
                                        @if (auth()->user())
                                        <input type="hidden" name="ID" value="{{ auth()->user()->id }}">
                                        @else
                                        <input type="hidden" name="ID" value="0">
                                        <p style="color:red;">Please login first before booking.</p>
                                        @endif
                                        <input type="hidden" name="BookingDate" value="{{ date('Y-m-d') }}">
                                        <input type="hidden" name="PaymentStatus" value="Pending">


                                        <div class="col-12 mt-3">
                                            <button type="submit" class="btn btn-primary btn-block text-white">Book Now</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

                <div class="modal-footer"></div>
            </form>
        </div>
    </div>
</div>




<div class="modal fade" id="mapModal" tabindex="-1" role="dialog" aria-labelledby="mapModalLabel" aria-hidden="true" style="position: fixed; center: 0; top: 0; bottom: 0; margin: auto;">
  <div class="modal-dialog" role="document" style="max-width: 650px; transform: none; margin: 20px; height: 100%;">
    <div class="modal-content" style="height: 80%;">
      <div class="modal-header">
        <h2 class="modal-title" id="mapModalLabel">Hotel Location</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3470.340314371844!2d106.54823124599453!3d29.564700017981735!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x369334a6e8b14277%3A0xfb9a45aba5d39f0b!2sIntercontinental%20Chongqing%20Raffles%20City!5e0!3m2!1sen!2sph!4v1744347867294!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="authModal" tabindex="-1" role="dialog" aria-labelledby="authModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 720px; width: 100%;">
        <div class="modal-content" style="max-height: none;">
            <div class="modal-header">
                <h2 class="modal-title" id="authModalLabel">Login</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeAuthModal()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="authModalBody">
                <div id="registrationForm" style="display: none;">
                    @if(session()->has("register_success"))
                        <div class="alert alert-success">
                            {{ session()->get("register_success") }}
                        </div>
                    @endif

                    @if(session()->has("register_error"))
                        <div class="alert alert-danger">
                            {{ session()->get("register_error") }}
                        </div>
                    @endif
                    <div class="register-header">
                        <img src="{{ asset('images/CASA-LETICIA-BOUTIQUE-HOTEL.jpg') }}" alt="Logo" class="register-logo" style="max-width: 70px; height: auto; margin-bottom: 10px;">
                        <h4>Register</h4>
                    </div>
                    <form method="POST" action="{{ route('register.post') }}">
                        @csrf
                        <div class="form-group">
                            <label for="register_name">Name</label>
                            <input type="text" name="name" id="register_name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="register_email">Email</label>
                            <input type="email" name="email" id="register_email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="register_password">Password</label>
                            <input type="password" name="password" id="register_password" class="form-control @error('password') is-invalid @enderror" required>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="register_password_confirmation">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="register_password_confirmation" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <div class="form-links text-center">
                            <a href="#" onclick="showLogin()">Already have an account? Login</a>
                        </div>
                    </form>
                </div>

                <div id="loginForm">
                    @if(session()->has("login_success"))
                        <div class="alert alert-success">
                            {{ session()->get("login_success") }}
                        </div>
                    @endif

                    @if(session()->has("login_error"))
                        <div class="alert alert-danger">
                            {{ session()->get("login_error") }}
                        </div>
                    @endif
                    <div class="login-header">
                        <img src="{{ asset('images/lo.jpg') }}" alt="Logo" class="login-logo" style="max-width: 70px; height: auto; margin-bottom: 10px;">
                        <h4>Login</h4>
                    </div>
                    <form method="POST" action="{{ route('login.post') }}">
                        @csrf
                        <div class="form-group">
                            <label for="login_email">Email</label>
                            <input type="email" name="email" id="login_email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="login_password">Password</label>
                            <input type="password" name="password" id="login_password" class="form-control @error('password') is-invalid @enderror" required>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                        <div class="form-links text-center">
                            <a href="#" onclick="$('#authModal').modal('hide'); $('#registerModal').modal('show'); return false;">Don't have an account? Register</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 720px; width: 100%; margin-top: 0vh;">
    <div class="modal-content" style="max-height: none;">
      <div class="modal-header">
                <h2 class="modal-title">Register Now</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="modal-body" id="authModalBody" style="max-height: 70vh; overflow-y: auto;">
                    <div id="registrationForm">
                        @if(session()->has("register_success"))
                            <div class="alert alert-success">
                                {{ session()->get("register_success") }}
                            </div>
                        @endif

                        @if(session()->has("register_error"))
                            <div class="alert alert-danger">
                                {{ session()->get("register_error") }}
                            </div>
                        @endif
                        <div class="register-header">
                            <img src="{{ asset('images/lo.jpg') }}" alt="Logo" class="register-logo" style="max-width: 70px; height: auto; margin-bottom: 10px;">
                            <h4>Register</h4>
                        </div>
                        <form method="POST" action="{{ route('register.post') }}">
                            @csrf
                            <div class="form-group">
                                <label for="register_name">Name</label>
                                <input type="text" name="name" id="register_name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="register_email">Email</label>
                                <input type="email" name="email" id="register_email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="register_password">Password</label>
                                <input type="password" name="password" id="register_password" class="form-control @error('password') is-invalid @enderror" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="register_password_confirmation">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="register_password_confirmation" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Register</button>
                            </div>
                        </form>
                    </div>

                    <div id="loginForm" style="display: none;">
                        @if(session()->has("login_success"))
                            <div class="alert alert-success">
                                {{ session()->get("login_success") }}
                            </div>
                        @endif

                        @if(session()->has("login_error"))
                            <div class="alert alert-danger">
                                {{ session()->get("login_error") }}
                            </div>
                        @endif
                        <div class="login-header">
                            <img src="{{ asset('images/Casa logo.png') }}" alt="Logo" class="login-logo" style="max-width: 100px; height: auto; margin-bottom: 10px;">
                            <h4>Login</h4>
                        </div>
                        <form method="POST" action="{{ route('login.post') }}">
                            @csrf
                            <div class="form-group">
                                <label for="login_email">Email</label>
                                <input type="email" name="email" id="login_email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="login_password">Password</label>
                                <input type="password" name="password" id="login_password" class="form-control @error('password') is-invalid @enderror" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                            </div>
                            <div class="form-links text-center">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    
    
    <script src="js/aos.js"></script>
    
    <script src="js/bootstrap-datepicker.js"></script> 
    <script src="js/jquery.timepicker.min.js"></script> 

    <script src="js/main.js"></script>

    <script>

    

$(document).ready(function() {
        $('#mapModal').on('shown.bs.modal', function () {
        
          
        });
    });


    </script>
    <script src="js/main.js"></script>
  </body>
</html>