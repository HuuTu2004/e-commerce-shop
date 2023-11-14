<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Flashsale;

class FlashSaleController extends Controller
{
    public function list(){
        
       
        $time = Flashsale::find(1);
        $product =  Product::where('sale_price', '>', 0)->get();
        $isTimeGreaterThanZero = $time->hour > 0 || $time->minute > 0 || $time->second > 0;
        return view('admin.flashsale.list',compact('product','time','isTimeGreaterThanZero'));
    }
    public function update(Flashsale $time ,Request $req){
        $req ->validate ([
            'hour' => 'required|integer|between:0,23', 
        'minute' => 'required|integer|between:0,59', 
        'second' => 'required|integer|between:0,59'
        ]);
        $data = $req->only('hour','minute','second');
        $time->update($data);
        return redirect()->route('flash-sales.list')->with('sua', 'Sua thanh cong');
    }
}
