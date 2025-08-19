@extends('layouts.auth')

@section('title', 'Categories')

@section('content')

<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
<style>
  .navbar {
    /* Add appropriate height for your navbar here */
    height: 60px;
    /* Add any other necessary styling for your navbar */
  }

  .hero-section {
    /* Add padding to push the cards below the navbar */
    padding-top: 4000px;
    background-color: #fff; /* You can adjust the value as needed */
    /* Rest of your hero-section styles... */
  }

  :root{
    --background-dark: #fff;
    --text-light: rgba(0,0,0,0.3);
    --text-lighter: rgba(0,0,0,0.5);
    --spacing-s: 8px;
    --spacing-m: 16px;
    --spacing-l: 24px;
    --spacing-xl: 32px;
    --spacing-xxl: 64px;
    --width-container: 1200px;
  }
  
  *{
    border: 0;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  
  html{
    height: 100%;
    font-family: 'Montserrat', sans-serif;
    font-size: 14px;
  }
  
  body{
    height: 100%;
  }
  
  .hero-section{
    align-items: flex-start;
    background-color: #F5F5DC;
    
    display: flex;
    min-height: 100%;
    justify-content: center;
    padding: var(--spacing-xxl) var(--spacing-l);
  }
  
  .card-grid{
    display: grid;
    grid-template-columns: repeat(1, 1fr);
    grid-column-gap: var(--spacing-m);
    grid-row-gap: var(--spacing-m);
    max-width: var(--width-container);
    width: 100%;
  }
  
  @media(min-width: 540px){
    .card-grid{
      grid-template-columns: repeat(2, 1fr);
      grid-column-gap: var(--spacing-l); /* Adjust the horizontal gap for medium screens */
      grid-row-gap: var(--spacing-l); 
    }
  }
  
  @media(min-width: 960px){
    .card-grid{
      grid-template-columns: repeat(4, 1fr);
      grid-column-gap: var(--spacing-xl); /* Adjust the horizontal gap for large screens */
      grid-row-gap: var(--spacing-xl); 
    }
  }
  
  .card{
    list-style: none;
    position: relative;
  }
  
  .card:before{
    content: '';
    display: block;
    padding-bottom: 150%;
    width: 100%;
  }
  
  .card__background{
    background-size: cover;
    background-position: center;
    border-radius: var(--spacing-l);
    bottom: 0;
    filter: brightness(0.75) saturate(1.2) contrast(0.85);
    left: 0;
    position: absolute;
    right: 0;
    top: 0;
    transform-origin: center;
    transform: scale(1) translateZ(0);
    transition: 
      filter 200ms linear,
      transform 200ms linear;
  }
  
  .card:hover .card__background{
    transform: scale(1.05) translateZ(0);
  }
  
  .card-grid:hover > .card:not(:hover) .card__background{
    filter: brightness(0.5) saturate(0) contrast(1.2) blur(20px);
  }
  
  .card__content{
    left: 0;
    padding: var(--spacing-l);
    position: absolute;
    top: 0;
  }
  
  .card__category{
    color: var(--text-light);
    font-size: 0.9rem;
    margin-bottom: var(--spacing-s);
    text-transform: uppercase;
  }
  
  .card__heading{
    color: var(--text-lighter);
    font-size: 1.9rem;
    text-shadow: 2px 2px 20px rgba(0,0,0,0.2);
    line-height: 1.4;
    word-spacing: 100vw;
  }

  .card__image {
    width: 300px; /* Set the desired width */
    height: 200px; /* Set the desired height */
    object-fit: contain;
    
  }
</style>

<body>
    <div>
        
      <main>
        @yield('content')
        

<section class="hero-section" style = "padding-top: 200px; background-color: #fff;">
  <div class="card-grid">
    @forelse ($categories as $categoryItem)
    
    <a class="card" href="{{ url('/collections/'.$categoryItem->slug) }}">
      <div class="card__background" style="background-image">
      <img class="card__image" src="{{ asset($categoryItem->image) }}" alt="">
    </div>
      <div class="card__content">
        <p class="card__category">{{ $categoryItem->name }}</p>
        <h3 class="card__heading">{{ $categoryItem->name }}</h3>
      </div>
    </a>

    @empty
    
    @endforelse
    
    
  <div>
</section>
      </main>
    </div>

</body>

@endsection