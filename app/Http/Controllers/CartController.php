<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Common\Cart;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Mail\OrderEmail;
use Auth;
use Mail;

class CartController extends Controller
{
    
    public function view(Cart $cart){
        
        return view('cart.view', compact('cart'));
    }
    function add(Cart $cart, Product $product,Request $req) {
        if($req->only('quantity')){
            $quantity = $req->input('quantity');
        }
        else {
            $quantity = request('quantity',1);
        }

        $cart->add($product, $quantity);
        return redirect()->route('cart.view')->with('ok','Thêm giỏ hàng thành công');
    }

    function remove(Cart $cart,Product $product) {
        $cart->remove($product);
        return redirect()->route('cart.view')->with('ok','Xóa sản phẩm trong giỏ hàng thành công');
    }

    function update(Cart $cart,Product $product) {
        $quantity = request('quantity',1);
        $cart->update($product, $quantity);
        return redirect()->route('cart.view')->with('ok','Cập nhật giỏ hàng thành công');
    }

    function clear(Cart $cart) {
        $cart->clear();
        return redirect()->route('customer.home');
        
    }

    

    public function checkout(Cart $cart){
        $auth = auth('cus')->user();
        return view('cart.checkout', compact('cart', 'auth'));
    }

    public function post_checkout(Cart $cart, Request $req){
        $auth = auth('cus')->user();
        $data = $req->only('name', 'email', 'phone', 'address', 'note');
        $data['customer_id'] = auth('cus')->id();
        $data['token'] = \Str::random(15);
        if($order = Order::Create($data)){
            foreach($cart->items as $item){
                $detail = [
                    'order_id' => $order->id,
                    'product_id' => $item->id,
                    'price' => $item->price,
                    'quantity' => $item->quantity,
                    'customer_id' => auth('cus')->id()
                ];
                OrderDetail::Create($detail);
                // if (!OrderDetail::Create($detail)){
                //     $check = false;
                //     break;
                // }
            }
            $cart->clear();

            $email = $req->email;   
            Mail::to($email)->send(new OrderEmail($order, $auth));
            
            
            // if($check){
            //     // $cart->clear();
            //     $email = $req->email;   
            //     Mail::to($email)->send(new OrderEmail($order, $auth));

            //     return redirect()->route('cart.view')->with('ok', 'Dat Hang Thanh Khong Thanh Cong. Kiem Tra '.$auth->email.'De Xac Nhan');
            // } else {
            //     OrderDetail::where('order_id', $order->id)->delete();
            //     $order->delete();
            //     return redirect()->back()->with('no', 'Dat Hang Khong Thanh Cong');
            // }

            

            
        }
        
        
        return redirect()->route('cart.checkout', compact('cart', 'auth'))->with('ok', 'Dat Hang Thanh Cong. Kiem Tra ' .$auth->email. 'De Xac Nhan Don Hang !');
    }

    public function my_order(){
        return view('cart.my_order');
    }
 
    public function order_detail(Order $order){
        return view('cart.detail', compact('order'));
    }

    public function orderEmail(Order $order){
        return view('cart.orderEmail' , compact('order'));
    }

}