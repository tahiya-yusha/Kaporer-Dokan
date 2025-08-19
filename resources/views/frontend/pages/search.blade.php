@extends('auth')

@section('title', "Searched Products")

@section('content')

<div class="py-3 py-md-5 bg-white">
          <div class="container" style="padding-top: 80px;">
            <div class="row justify-content-center">
              <div class="col-md-10">
                <h4>Search Results</h4>
                <div class=" underline mb-4"></div>
              </div>
              
              
                
                    @forelse ($searchProducts as $productItem)
                    <div class="col-md-10">
                    <div class="product-card">
                        <div class="row">
                            <div class="col-md-3">
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
                                </div>
                            <div class="col-md-9">
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
                                    <p style = "height: 45px; overflow: hidden">
                                        <b>Description: </b> {{ $productItem->description }}
                                    </p>
                                    <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}" class="btn btn-outline-black" style="background:white; color:#000; outline: black 1px">View</a>
                                    <div class="mt-2">
                                        <a href="" class="btn btn1">Add To Cart</a>
                                        <a href = "">  <i style = "color:#000;" class="fa fa-heart"></i> </a>
                                        <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}" class="btn btn1"> View </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>                        
                    @empty
                    <div class="col-md-12 p-2">
                            <h4>No Such Products Found</h4>
                        </div>
                    @endforelse
                    
                    <div class = "col-md-10">
                        {{ $searchProducts->appends(request()->input())->links() }}
                    </div>
              </div>
            </div>
          </div>
        </div>

@endsection