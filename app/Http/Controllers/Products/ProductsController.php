<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\Product;
use Illuminate\Support\Facades\Auth;
use Redirect;
use App\Models\Product\Cart;

class ProductsController extends Controller
{
    public function singleProduct($id) {

        $product = Product::find($id);


        $relatedProducts = Product::where('type',$product->type)
        ->where('id','!=',$id)->take('4')->orderBy('id','desc')->get();
        $checkInCart = Cart::where('pro_id', $id)
        ->where('user_id',Auth::id())
        ->count();

        return view('products.productsingle', compact('product','relatedProducts','checkInCart'));
    }

   
    public function addCart(Request $request, $id) {

        $addCart = Cart::create([
            "pro_id" => $request->pro_id,
            "name" => $request->name,
            "image" => $request->image,
            "price" => $request->price,
            "user_id" => Auth::id(),
            "created_at" => now(),  
            "updated_at" => now(), 
        ]);
    
        return Redirect::route('product.single', $id)
            ->with(['success' => "Product added to cart successfully"]);
    }



    public function cart() {
    
     $cart = Cart::where('user_id', Auth::user()->id)
      ->orderBy('id','desc')
      ->get();

    
        return view('products.cart',compact('cart'));
    }
}