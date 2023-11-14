<?php

namespace App\Http\Controllers;
use App\Models\Favorites;
use App\Models\Product;

use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function view(){
        if( auth('cus')->user()->id) {

            $favorites = Favorites::where('customer_id',  auth('cus')->user()->id)->with('product')->get();
        }
        else{
            $favorites = Favorites::all();
        }
        return view('favorites.view',compact('favorites'));
    }
    public function add($product_id){
       
            $data =[
                'product_id' => $product_id,
                'customer_id' => auth('cus')->user()->id
            ];
            Favorites::create($data);
            return redirect()->route('customer.home');
        
        
     
    }
    public function remove($product_id){
        $product_id = Favorites::where('product_id',$product_id)->where('customer_id',  auth('cus')->user()->id);
       $product_id ->delete(); 
       return redirect()->route('customer.home');
    }
}