@extends('layouts.hotel')

@section('content')

<section class="site-hero inner-page overlay" style="background-image: url(images/hero_4.jpg)" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row site-hero-inner justify-content-center align-items-center">
          <div class="col-md-10 text-center" data-aos="fade">
            <h1 class="heading mb-3">Rooms</h1>
            <ul class="custom-breadcrumbs mb-4">
              <li><a href="hotelhome">Home</a></li>
              <li>&bullet;</li>
              <li>Rooms</li>
            </ul>

            @if ($errors->has('overlap'))
            <div class="alert alert-danger">
      {{ $errors->first('overlap') }}</div>@endif
          </div>
        </div>
      </div>

  

      <a class="mouse smoothscroll" href="#next">
        <div class="mouse-icon">
          <span class="mouse-wheel"></span>
        </div>
      </a>
    </section>
<!-- Hero Section -->

<!-- Rooms Section -->
<section class="section" id="next">
  <div class="container">
  <div class="row justify-content-center text-center mb-5">
          <div class="col-md-7">
            <h2 class="heading" data-aos="fade-up">Room and Suites</h2>
            <p data-aos="fade-up" data-aos-delay="100">We offer cozy and affordable suites and rooms. With great service, we strive to create a memorable and relaxing stay for every guest. Located in the heart of Davao City, we provide easy access to local attractions and business centers, making us the perfect choice for both leisure and business travelers.</p>
          </div></div>

    <div class="row">
      @foreach($rooms as $room)
      <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up">
      <div class="room">
          <figure class="img-wrap" style="width: 100%; height: 250px; overflow: hidden;">
            <img src="{{ asset('storage/' . $room->room_front_image) }}" alt="{{ $room->room_name }}" style="width: 100%; height: 100%; object-fit: cover;">
          </figure>
          <h3>{{ $room->room_name }}</h3>
          <span class="text-lowercase letter-spacing-1">₱{{ number_format($room->room_rate, 2) }} per night</span><br>
          <p><strong>Room Type: </strong>{{ $room->room_type ?? '-' }}</p>
          <span class="text-lowercase letter-spacing-1" style="color: black;">{{ $room->room_description }}</span>
          <div class="d-flex justify-content-center mt-2">
            <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#roomModal-{{ $room->id }}">
              View More
            </a>
          </div>
        </div>
      </div>

<!-- Modal for this Room -->
<div class="modal fade" id="roomModal-{{ $room->id }}" tabindex="-1" role="dialog"
     aria-labelledby="roomModalLabel-{{ $room->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-height: 900px; max-width: 700px; margin-left: 40px;">
        <div class="modal-content" style="height: 90%;">
            <div class="modal-header">
                <h2 class="modal-title" id="roomModalLabel-{{ $room->id }}">{{ $room->room_name }}</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                @if($room->room_images)
                    <div id="carouselRoomImages-{{ $room->id }}" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach(json_decode($room->room_images) as $index => $img)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <img src="{{ asset('storage/' . $img) }}"
                                         class="d-block w-100"
                                         alt="Room Image {{ $index + 1 }}"
                                         style="height: 400px; object-fit: cover;">
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselRoomImages-{{ $room->id }}" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselRoomImages-{{ $room->id }}" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                @endif

                <div class="mt-3">
                    <p><strong>Rate:</strong> ₱{{ number_format($room->room_rate, 2) }} / per night</p>
                    <p><strong>Room Type:</strong> {{ $room->room_type ?? '-' }}</p>
                    <p>{{ $room->room_description }}</p>
                </div>

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bookingModal-{{ $room->id }}">
                    Book Now
                </button>
            </div>
        </div>
    </div>
</div>


<!-- Booking Modal -->
<div class="modal fade" id="bookingModal-{{ $room->id }}" tabindex="-1" role="dialog"
     aria-labelledby="bookingModalLabel-{{ $room->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 700px; margin-right: 40px;">
        <div class="modal-content" style="height: 90%;">
            <div class="modal-header">
                <h2 class="modal-title" id="bookingModalLabel-{{ $room->id }}">Book Now</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <p class="mt-2 font-italic text-muted">
                    “Every restful escape begins with the right space — welcome to <strong>Casa Leticia Botique Hotel</strong>.”
                </p>
                <p class="text-secondary small">
                    Reminder: Please double-check your check-in and check-out dates, as well as the number of guests before confirming your booking.
                </p>
                <p class="text-primary">Booking For <strong>{{ $room->room_name }}</strong>.</p>
                
                <form action="{{ route('bookings.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Check In</label>
                        <input type="date" name="checkin_date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Check Out</label>
                        <input type="date" name="checkout_date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>How many will be booking?</label>
                        <input 
                            type="number" 
                            name="guests" 
                            class="form-control" 
                            min="1" 
                            max="{{ $room->capacity }}" 
                            placeholder="Maximum: {{ $room->capacity }} guests" 
                            required
                        >
                    </div>
                    <input type="hidden" name="room_id" value="{{ $room->id }}"><br><br>
                    <button type="submit" class="btn btn-success btn-block">Confirm Booking</button>
                </form>
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




      @endforeach
    </div>
  </div>
</section>

<!-- Scripts -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>
