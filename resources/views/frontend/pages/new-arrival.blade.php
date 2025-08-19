@extends('auth')

@section('title', "New Arrivals")

@section('content')

<div class="py-3 py-md-5 bg-white">
          <div class="container" style="padding-top: 80px;">
            <div class="row">
              <div class="col-md-12">
                <h4>New Arrivals</h4>
                <div class=" underline mb-4"></div>
              </div>
              
              
                
                    @forelse ($newArrivalsProducts as $productItem)
                    <div class="col-md-3">
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
                    @empty
                    <div class="col-md-12 p-2">
                            <h4>No Products Available</h4>
                        </div>
                    @endforelse
                    
                    <div class = "text-center">
                        <a href="{{ url('collections') }}">View More</a>
                    </div>
              </div>
            </div>
          </div>
        </div>

@endsection