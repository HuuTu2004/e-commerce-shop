<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Models\Category;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Comment;
use App\Models\OrderDetail;
use App\Models\Favorites;
use App\Mail\Contact;
use Auth;
use Mail;


class CustomerController extends Controller
{
    public function home(Category $category, Product $product){
        $category = Category::all();
        $product = Product::limit(8)->get();
        return view('customer.home', compact('category', 'product'));    
    }

    public function product(Category $category, Product $product, Request $req){
        $key = $req->key;
        $category = Category::all();
        $product = Product::where('name', 'LIKE', '%'.$key.'%')->get();
        return view('customer.product', compact('category', 'product'));    
    }

    public function about(Category $category, Product $product){
        $category = Category::all();
        $product = Product::all();
        return view('customer.about', compact('category', 'product'));    
    }

    public function contact(Request $req){
        $email = $req->email;
        $data = $req->only('name','email', 'phone', 'note');
        Mail::to($email)->send(new Contact($data));

        return redirect()->route('customer.home');
    }
    public function login(Request $req){
       

        return view('customer.login');
    }

    public function check(Request $req){
        $req -> validate([
            'email'=>'required|email',
            'password'=>'required|min:6'         
        ]);
        $data = $req->only( 'email','password');
        $check = auth('cus')->attempt($data);       
        if($check){
            return redirect()->route('customer.home');
        }
        return redirect()->back()->with('error','Đăng nhập không thành công');
    }

    public function logout(){
        auth('cus')->logout();
        return redirect()->route('customer.home');
    }

    public function register(Request $req){
        return view('customer.register');
    }

    public function post_register(Request $req){
        $req->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customer,email,' . auth('cus')->id(),
            'phone' => 'required|string|max:12',
            'address' => 'required|string|max:255',
            'password' => 'required',
     
        ]);
        $data = $req->only('name','email','password', 'phone', 'address');
        if(Customer::Create($data)){
            return redirect()->route('customer.login');
        }
        return redirect()->back()->with('error','Đăng ký không thành công');
    }
    public function profile(){
        $comments = Comment::where('customer_id',  auth('cus')->user()->id)->get();
        $history = OrderDetail::where('customer_id', auth('cus')->user()->id)->get();
        return view('customer.profile',compact('history','comments'));
    }
    public function  update_profile(Request $request){
    
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customer,email,' . auth('cus')->id(),
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        // Kiểm tra xem có lỗi không
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }


        $user = auth('cus')->user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        if ($request->hasFile('image')) {
            $file = $request->file('image')->getClientOriginalName(); // Lấy tên gốc của tệp
            $destinationPath = public_path('assets');
            $filePath = $destinationPath . '/' . $file;
        
            // Kiểm tra xem tệp đã tồn tại trong thư mục "assets" chưa
            if (!file_exists($filePath)) {
                $request->image->move($destinationPath, $file);
                $user->image = $file;
            } else {
                $user->image = $file;
            }
        }
        $user->save();

        return redirect()->back()->with('success', 'Thông tin đã được cập nhật thành công.');

    }

    public function changePassword(Request $request){
        // Kiểm tra mật khẩu cũ
        $customer = Customer::find(auth('cus')->user()->id);
        if (!Hash::check($request->input('old_password'), $customer->password)) {
            return back()->with('error', 'Mật khẩu cũ không đúng.');
        }

        $customer->password = Hash::make($request->input('new_password'));
        $customer->save();

        return back()->with('success', 'Mật khẩu đã được thay đổi thành công.');
    }
   
}