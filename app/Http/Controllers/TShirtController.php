<?php

namespace App\Http\Controllers;

use App\Models\ProductColor;
use App\Models\TshirtOrders;
use App\Models\TshirtPrints;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class TShirtController extends Controller
{
    public function store(Request $request)
    {
        // Store TshirtOrder
        $tshirtOrder = new TshirtOrders();
        $tshirtOrder->user_id = auth()->user()->id; // Associate the order with the authenticated user
        $tshirtOrder->tshirt_type = $request->input('tshirt_type');
        $tshirtOrder->tshirt_length = $request->input('tshirt_length');
        $tshirtOrder->color = $request->input('color'); // Update this to match your color field name
        $tshirtOrder->print_positions = implode(',', $request->input('print_position'));
        $tshirtOrder->user_text = $request->input('user_text');
        $tshirtOrder->save();
        
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $uploadPath = 'uploads/customtshirt/';
            $file->move($uploadPath, $filename);
    
            $tshirtPrint = new TshirtPrints();
            $tshirtPrint->tshirtorders_id = $tshirtOrder->id; // Associate the TshirtPrint with the corresponding TshirtOrder
            $tshirtPrint->image = $uploadPath.$filename;
            $tshirtPrint->save();
        }
        


        

        return redirect('/');

        // Redirect or perform additional actions as needed
    }

    public function showForm()
    {
        $productColors = ProductColor::all();
        return view('tshirts.upload', compact('productColors'));
    }
}
