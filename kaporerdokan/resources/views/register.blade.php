@extends('auth')
@section('title', 'Register')
@section('content')

<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

<div class="wrapper">
  <div class="container">
    <div class="sign-up-container">
      <!-- Error Messages -->
      <div class="error">
        @if($errors->any())
          <div class="error-message">
            @foreach($errors->all() as $error)
              <div class="popup" id="signup_popup">
                <img src="{{ asset('error.png') }}">
                <h2>Error Occurred</h2>
                <p>{{ $error }}</p>
                <button type="button" onclick="closePopup()">OK</button>
              </div>
            @endforeach
          </div>
        @endif

        @if(session()->has('error'))
          <div class="error-message">
            <div class="popup" id="signup_popup">
              <img src="{{ asset('error.png') }}">
              <h2>Error Occurred</h2>
              <p>{{ session('error') }}</p>
              <button type="button" onclick="closePopup()">OK</button>
            </div>
          </div>
        @endif

        @if(session()->has('success'))
          <div class="error-message">
            <div class="popup" id="signup_popup">
              <img src="{{ asset('tick.png') }}">
              <h2>Successfully Signed Up</h2>
              <p>{{ session('success') }}</p>
              <button type="button" onclick="closePopup()">OK</button>
            </div>
          </div>
        @endif
      </div>

      <form action="{{ route('register.post') }}" method="POST">
        @csrf
        <h1>Create Account</h1> 
        <input type="text" class="form-control" placeholder="Name" name="name">
        <input type="email" class="form-control" placeholder="Email" name="email">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <button class="form_btn" onclick="openPopup()" type="submit">Sign Up</button>
      </form>
    </div>

    <div class="sign-in-container">
      <div class="error">
        @if($errors->any())
          <div class="error-message">
            @foreach($errors->all() as $error)
              <div class="popup" id="signup_popup">
                <img src="{{ asset('error.png') }}">
                <h2>Error Occurred</h2>
                <p>{{ $error }}</p>
                <button type="button" onclick="closePopup()">OK</button>
              </div>
            @endforeach
          </div>
        @endif

        @if(session()->has('error'))
          <div class="error-message">
            <div class="popup" id="signup_popup">
              <img src="{{ asset('error.png') }}">
              <h2>Error Occurred</h2>
              <p>{{ session('error') }}</p>
              <button type="button" onclick="closePopup()">OK</button>
            </div>
          </div>
        @endif

        @if(session()->has('success'))
          <div class="error-message">
            <div class="popup" id="signup_popup">
              <img src="{{ asset('tick.png') }}">
              <h2>Successfully Signed Up</h2>
              <p>{{ session('success') }}</p>
              <button type="button" onclick="closePopup()">OK</button>
            </div>
          </div>
        @endif
      </div>

      <form action="{{ route('login.post') }}" method="POST">
        @csrf
        <h1>Sign In</h1>
        <span>To use your account</span>
        <input type="email" placeholder="Email" class="form-control" name="email">
        <input type="password" placeholder="Password" class="form-control" name="password">

        <!-- Add Remember Me -->
        <div class="remember-me-container">
          <input type="checkbox" id="remember-me" name="remember">
          <label for="remember-me">Remember Me</label>
        </div>

        <!-- Add Forgot Password -->
        <a href="{{ route('forgot.password') }}" class="forgotpassword">Forgot Password?</a>

        <button class="form_btn" onclick="openPopup()" type="submit">Sign In</button>

        <div class="popup" id="login_popup">
          <img src="{{ asset('tick.png') }}">
          <h2>Successfully Logged In</h2>
          <p>Browse through our website to get amazing products!</p>
          <button type="button" onclick="closePopup()">OK</button>
        </div>
      </form>
    </div>

    <div class="overlay-container">
      <div class="overlay-left">
        <h1>Welcome Back</h1>
        <p>To stay connected with us, please login with your personal info</p>
        <button id="signIn" class="overlay_btn">Sign In</button>
      </div>
      <div class="overlay-right">
        <h1>Hello, Friend</h1>
        <p>Enter your personal details and start your journey with us</p>
        <button id="signUp" class="overlay_btn">Sign Up</button>
      </div>
    </div>
  </div>
</div>

<script src="{{ asset('assets/js/work.js') }}"></script>

@endsection
