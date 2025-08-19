@extends('auth')
@section('content')
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,700" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/f_style.css') }}" rel="stylesheet">

<div class="wrapper">
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
      
  <div class="container">
    <div class="reset-password-container">
      <form action="{{ route('forgot.password.post') }}" method="POST">
        @csrf  
        <h1>Reset Your Password</h1>
        <p>We will send you an email to reset your password. Enter your email below:</p>
        <input type="email" class="form-control" name="email">
        <button type="submit" class="form_btn">Reset Password</button>
      </form>
    </div>
  </div>
</div>

@endsection
