@extends('auth')

@section('title', "KaporerDokan-Home")

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

<style>

/* Product Card */
.product-card{
    background-color: #fff;
    border: 2px solid #000;
    margin-bottom: 24px;
}
.product-card a{
    text-decoration: none;
}
.product-card .stock{
    position: absolute;
    color: #fff;
    border-radius: 4px;
    padding: 2px 12px;
    margin: 8px;
    font-size: 12px;
    
}
.product-card .product-card-img{
    max-height: 260px;
    overflow: hidden;
    border-bottom: 1px solid #000;
    display: flex;
}
.product-card .product-card-img img{
    max-height: 100%; /* Adjust the max height of the image */
    max-width: 100%; /* Maintain aspect ratio */
    object-fit: contain;
    display: block; /* Fit while preserving aspect ratio */

}
.product-card .product-card-body{
    padding: 10px 10px;
}
.product-card .product-card-body .product-brand{
    font-size: 14px;
    font-weight: 400;
    margin-bottom: 4px;
    color: #000;
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
}
.product-card .product-card-body .product-name{
    font-size: 20px;
    font-weight: 600;
    color: #000;
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
}
.product-card .product-card-body .selling-price{
    font-size: 22px;
    color: #000;
    font-weight: 600;
    margin-right: 8px;
}
.product-card .product-card-body .original-price{
    font-size: 18px;
    color: #937979;
    font-weight: 400;
    text-decoration: line-through;
}
.product-card .product-card-body .btn1{
    border: 1px solid;
    margin-right: 3px;
    border-radius: 0px;
    font-size: 12px;
    margin-top: 10px;
}
/* Product Card End */

.underline{
  height: 4px;
  width: 100px;
  background-color: black;
  margin: 10px 0px;
}

.output {
  text-align:center;
  font-family: 'Source Code Pro', monospace;
  color:white;
  
}

/* Cursor Styling */

.cursor::after {
  content:'';
  display:inline-block;
  margin-left:3px;
  background-color:white;
  animation-name:blink;
  animation-duration:0.5s;
  animation-iteration-count: infinite;
}
h1.cursor::after {
  height:24px;
  width:13px;
}
p.cursor::after {
  height:13px;
  width:6px;
}

@keyframes blink {
  0% {
    opacity:1;
  }
  49% {
    opacity:1;
  }
  50% {
    opacity:0;
  }
  100% {
    opacity:0;
  }
}

</style>

    <body>
    
        @include('include.header')
      
      <main style="padding-top: 100px;">
        <div class="container mt-7">
          <div class="row">
            <div class="col-md-12">
            <div id="carouselExampleDark" class="carousel carousel-dark slide">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
              </div>
              <div class="carousel-inner">
                @foreach ($sliders as $key => $sliderItem)
                <div class="carousel-item {{ $key == '0' ? 'active':'' }}" >
                  @if ($sliderItem->image)
                  <img src="{{ asset("$sliderItem->image") }}" class="d-block w-100" alt="...">
                  @endif
                  <div class="carousel-caption d-none d-md-block" style ="color: white;">
                    <h5>{{ $sliderItem->title }}</h5>
                    <p>{{ $sliderItem->description }}</p>
                    <div> <a href="#" class = "btn btn-slider" style="background-color: white; color: black;"> Get Now</a> </div>
                  </div>
                </div>
                @endforeach
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
            </div>
          </div>
        </div>

        

        
        <div class="container py-5">
          <div class="output" id="output" style="color:black;">
            <h1 class="cursor"></h1>
            <p></p>
          </div>
        </div>


        <div class="py-3 bg-white">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <h4>Trending Products</h4>
                <div class=" underline mb-4"></div>
              </div>
              @if($trendingProducts)
              <div class="col-md-12">
              <div class="owl-carousel owl-theme trending-product">
                    @foreach ($trendingProducts as $productItem)
                          <div class="item">
                            <div class="product-card">
                                <div class="product-card-img">
                                    <label class="stock" style="background-color: grey; color: white; border-radius: 4px; padding: 2px 12px; margin: 8px; font-size: 12px;">New</label>

                                    @if($productItem->productImages->count() > 0)
                                    <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}" style="color: black;">
                                    <div>
                                        <img src="{{ asset($productItem->productImages[0]->image) }}" alt="{{ $productItem->name }}" style="width: 100%; height: 100%; object-fit: cover;">
                                    </div>
                                    </a>

                                    @endif

                                </div>
                                <div class="product-card-body">
                                    <p class="product-brand">
                                        @if($productItem->brand)
                                            {{ $productItem->brand }}
                                        @else
                                            Unknown Brand
                                        @endif
                                    </p>
                                    <h5 class="product-name" style = "color: black;">
                                       <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}" style = "color: black;">
                                            {{ $productItem->name }} 
                                       </a>
                                    </h5>
                                    <div>
                                        <span class="selling-price">${{ $productItem->selling_price }}</span>
                                        @if($productItem->original_price > $productItem->selling_price)
                                            <span class="original-price">${{ $productItem->original_price }}</span>
                                        @endif
                                    </div>
                                    <div class="mt-2">
                                        <a href="" class="btn btn1">Add To Cart</a>
                                        <a href = "">  <i style = "color:#000;" class="fa fa-heart"></i> </a>
                                        <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}" class="btn btn1"> View </a>
                                    </div>
                                </div>
                            </div>
                            </div>
                    
                    
                    @endforeach
                    </div>
              </div>
              @else
              <div class="col-md-12">
                        <div class="p-2">
                            <h4>No Products Available</h4>
                        </div>
                    </div>
                    @endif
            </div>
          </div>
        </div>
        

        

</body>


@section('script')
<script>
  $('.trending-product').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
</script>
@endsection

      
    <!-- Include jQuery first -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Then include other JavaScript libraries -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    
    <script>
      // values to keep track of the number of letters typed, which quote to use. etc. Don't change these values.
var i = 0,
    a = 0,
    isBackspacing = false,
    isParagraph = false;

// Typerwrite text content. Use a pipe to indicate the start of the second line "|".  
var textArray = [
  "Welcome to Kaporer Dokan!!",
  "Selling random kapor chopor to get marks in CSE471 Lab"
  
];

// Speed (in milliseconds) of typing.
var speedForward = 100, //Typing Speed
    speedWait = 1000, // Wait between typing and backspacing
    speedBetweenLines = 1000, //Wait between first and second lines
    speedBackspace = 25; //Backspace Speed

//Run the loop
typeWriter("output", textArray);

function typeWriter(id, ar) {
  var element = $("#" + id),
      aString = ar[a],
      eHeader = element.children("h1"), //Header element
      eParagraph = element.children("p"); //Subheader element
  
  // Determine if animation should be typing or backspacing
  if (!isBackspacing) {
    
    // If full string hasn't yet been typed out, continue typing
    if (i < aString.length) {
      
      // If character about to be typed is a pipe, switch to second line and continue.
      if (aString.charAt(i) == "|") {
        isParagraph = true;
        eHeader.removeClass("cursor");
        eParagraph.addClass("cursor");
        i++;
        setTimeout(function(){ typeWriter(id, ar); }, speedBetweenLines);
        
      // If character isn't a pipe, continue typing.
      } else {
        // Type header or subheader depending on whether pipe has been detected
        if (!isParagraph) {
          eHeader.text(eHeader.text() + aString.charAt(i));
        } else {
          eParagraph.text(eParagraph.text() + aString.charAt(i));
        }
        i++;
        setTimeout(function(){ typeWriter(id, ar); }, speedForward);
      }
      
    // If full string has been typed, switch to backspace mode.
    } else if (i == aString.length) {
      
      isBackspacing = true;
      setTimeout(function(){ typeWriter(id, ar); }, speedWait);
      
    }
    
  // If backspacing is enabled
  } else {
    
    // If either the header or the paragraph still has text, continue backspacing
    if (eHeader.text().length > 0 || eParagraph.text().length > 0) {
      
      // If paragraph still has text, continue erasing, otherwise switch to the header.
      if (eParagraph.text().length > 0) {
        eParagraph.text(eParagraph.text().substring(0, eParagraph.text().length - 1));
      } else if (eHeader.text().length > 0) {
        eParagraph.removeClass("cursor");
        eHeader.addClass("cursor");
        eHeader.text(eHeader.text().substring(0, eHeader.text().length - 1));
      }
      setTimeout(function(){ typeWriter(id, ar); }, speedBackspace);
    
    // If neither head or paragraph still has text, switch to next quote in array and start typing.
    } else { 
      
      isBackspacing = false;
      i = 0;
      isParagraph = false;
      a = (a + 1) % ar.length; //Moves to next position in array, always looping back to 0
      setTimeout(function(){ typeWriter(id, ar); }, 50);
      
    }
  }
}
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/w_work.js') }}"></script>
@endsection
