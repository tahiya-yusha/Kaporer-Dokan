@extends('layout')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Style -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    @livewireStyles
</head>
<body>
    <div id="app">
         <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                    </ul>
                    <!-- Right Side Of Navbar -->
                     <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                      </ul>
                </div>
            </div>
        </nav>  
<div class="wrapper">
  <div class="container">
    <div class="sign-up-container">
      <form action = "{{login.post}}" method = "POST">
        <h1>Create Account</h1>
        
        <input type="text" class = "form-control" placeholder="Name" name = "name">
        <input type="email" class = "form-control" placeholder="Email" name = "email">
        <input type="password" class = "form-control" placeholder="Password">
        <button class="form_btn">Sign Up</button>
      </form>
    </div>
    <div class="sign-in-container">
      <form action = "{{login.post}}" method = "POST">
        <h1>Sign In</h1>
        
        <span>To use your account</span>
        <input type="email" placeholder="Email">
        <input type="password" placeholder="Password">
        <button class="form_btn">Sign In</button>
      </form>
    </div>
    <div class="overlay-container">
      <div class="overlay-left">
        <h1>Welcome Back</h1>
        <p>To keep connected with us please login with your personal info</p>
        <button id="signIn" class="overlay_btn">Sign In</button>
      </div>
      <div class="overlay-right">
        <h1>Hello, Friend</h1>
        <p>Enter your personal details and start journey with us</p>
        <button id="signUp" class="overlay_btn">Sign Up</button>
      </div>
    </div>
  </div>
</div>
    <!-- Scripts -->
    <script src = "{{ asset('assets/js/jquery-3.5.1.min.js') }}"> </script>
    <script src = "{{ asset('assets/js/bootstrap.bundle.min.js') }}"> </script>
    <script src = "{{ asset('assets/js/work.js') }}"> </script>
    @livewireStyles
</body>
</html>
