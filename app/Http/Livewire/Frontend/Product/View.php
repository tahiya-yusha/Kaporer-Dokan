<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Cart;
use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class View extends Component
{
    public $category, $product, $prodColorSelectedQuantity, $quantityCount = 1, $productColorId;

    public function addToWishList($productId){
        if(Auth::check())
        {
            if(Wishlist::where('user_id', auth()->user()->id)->where('product_id',$productId)->exists())
            {
                
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Already Added to Wishlist!',
                    'type' => 'info',
                    'status' => 401
                ]);
                return false;
            }
            else
            {
                Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId
                ]);

                $this->emit('wishlistAddedUpdated');
                
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Added to Wishlist!',
                    'type' => 'info',
                    'status' => 401
                ]);
            }
        }
        else
        {
            
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please Login to Continue',
                'type' => 'info',
                'status' => 401
            ]);
            return false;
        }
    }
    
    public function colorSelected($productColorId)
    {
        $this->productColorId = $productColorId;
        $productColor = $this->product->productColors()->where('id', $productColorId)->first();
        $this->prodColorSelectedQuantity = $productColor->quantity;

        

        if($this->prodColorSelectedQuantity == 0){
            $this->prodColorSelectedQuantity = 'outOfStock';
        }
    }

    public function incrementQuantity()
    {
        if($this->quantityCount < 10){
        $this->quantityCount++;
        }
    }

    public function decrementQuantity()
    {
        if($this->quantityCount > 1)
        {
        $this->quantityCount--;
        }
    }

    public function addToCart(int $productId)
    {
        if($this->product->where('id',$productId)->where('status', '0')->exists())
        {
            // Check for product color quantity and insert to cart
            if($this->product->productColors()->count() >1)
            {
                if($this->prodColorSelectedQuantity != NULL)
                {
                    if(Cart::where('user_id', auth()->user()->id)
                    ->where('product_id', $productId)
                    ->where('product_color_id', $this->productColorId)
                    ->exists())
                    {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Product Already Added to Cart',
                            'type' => 'notify',
                            'status' => 401
                                ]);
                    }
                    else
                    {
                        $productColor = $this->product->productColors()->where('id', $this->productColorId)->first();
                        if($productColor->quantity >0)
                        {
                            if($productColor->quantity > $this->quantityCount)
                            {
                                Cart::create([
                                    'user_id' => auth()->user()->id,
                                    'product_id' => $productId,
                                    'product_color_id' => $this->productColorId,
                                    'quantity' => $this->quantityCount
                                ]);
                                $this->emit('CartAddedUpdated');
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Added to Cart!',
                                    'type' => 'notify',
                                    'status' => 401
                                ]);
                            }
                            else
                            {
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Only '.$productColor->quantity.' Quantity Available',
                                    'type' => 'notify',
                                    'status' => 401
                                ]);
                            }
                        }
                        else
                        {
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Out of Stock',
                                'type' => 'notify',
                                'status' => 401
                            ]);
                        }
                    }
                }
                else
                {
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Select your Product Color',
                        'type' => 'notify',
                        'status' => 401
                    ]);
                }
            }
            else
            {
                if(Cart::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists())
                {
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Product Already Added to Cart',
                        'type' => 'notify',
                        'status' => 401
                            ]);
                }
                else
                {

                
                    if($this->product->quantity > 0)
                    {
                    if($this->product->quantity > $this->quantityCount)
                        {
                            Cart::create([
                                'user_id' => auth()->user()->id,
                                'product_id' => $productId,
                                'quantity' => $this->quantityCount
                            ]);
                            $this->emit('CartAddedUpdated');
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Added to Cart!',
                                'type' => 'notify',
                                'status' => 401
                            ]);

                        }
                    else
                    {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Only '.$this->product->quantity.' Quantity Available',
                            'type' => 'notify',
                            'status' => 401
                        ]);
                    }
                    }
                    else
                    {
                        $this->dispatchBrowserEvent('message', [
                        'text' => 'Out of Stock',
                        'type' => 'notify',
                        'status' => 401
                            ]);
                    }   
                }               
            }
        }
        else
        {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Product does not exist',
                'type' => 'notify',
                'status' => 401
            ]);
        }
    }
   

    public function mount($category, $product)
    {
        $this->category =$category;
        $this->product =$product;
    }

    public function render()
    {
        return view('livewire.frontend.product.view',[
            'category' => $this->category,
            'product' => $this->product
        ]);
    }
    
}
