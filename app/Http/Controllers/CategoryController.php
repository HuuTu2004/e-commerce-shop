<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\OrderDetail;
use App\Models\Customer;

class CategoryController extends Controller
{
    public function home() {
        $newOrder = OrderDetail::count();
        $cus = Customer::count();
        $pro = Product::count();
        return view('admin.home',compact('newOrder','cus','pro'));
    }
    public function list(Category $category, Request $req) {
        $key = $req->key;
        $category = Category::orderBy('id', 'DESC')->where('name' , 'LIKE' , '%'.$key.'%')->paginate(2);
        return view('admin.category.list',compact('category'));
    }
    public function create(){
        return view('admin.category.create');
    }
    public function postlist(Category $category, Request $req) {
        $req->validate([
            'name' => 'required|unique:category',
        ],[
            'name.required' => 'Ten danh muc khong duoc de trong',
            'name.unique' => 'Ten danh muc da ton tai',
        ]);
        $data = $req->only('name');
        Category::create($data);
        return redirect()->route('admin.category.list')->with('ok', 'Them moi thanh cong');
    }

    public function edit(Category $category) {
        return view('admin.category.edit', compact('category'));
    }
    public function update(Category $category, Request $req) {
        $req->validate([
            'name' => 'required',
        ],[
            'name.required' => 'Ten danh muc khong duoc de trong',
        ]);
        $data = $req->only('name');
        $category->update($data);
        return redirect()->route('admin.category.list')->with('sua', 'Sua thanh cong');
    }

    public function destroy(Category $category,Product $product, Request $req) {
        if(Product::where('category_id',$category->id)->count() == 0){
            $category->delete();
            return redirect()->route('admin.category.list')->with('xoa', 'Xoa thanh cong');
        } else {
            abort(403);
        }
    }

    

}
