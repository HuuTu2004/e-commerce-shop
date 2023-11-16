<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function list(Category $category, Product $product, Request $req) {
        
        $category = Category::all();
        $product = Product::orderBy('id', 'DESC')->Search()->paginate(10);
        return view('admin.product.list', compact('category', 'product'));
    }

    public function create(Category $category){
        $category = Category::all();
        return view('admin.product.create', compact('category'));
    }
    public function postcreate(Category $category, Product $product, Request $req){
        $req->validate([
            'name' => 'required|unique:product',
            'price' => 'required',
            'category_id' => 'required',
            'image' => 'required',
        ],[
            'name.required' => 'Ten san pham khong duoc de trong', 
            'name.unique' => 'Ten san pham da ton tai', 
            'price.required' => 'Gia san pham khong duoc de trong', 
            'category_id.required' => 'Danh muc san pham khong duoc de trong', 
            'image.required' => 'Anh san pham khong duoc de trong', 
        ]);
        $product = new Product;

        $product->name = $req->name;
        $product->price = $req->price;
        $product->sale_price = $req->sale_price;
        $product->status = $req->status;
        $product->category_id = $req->category_id;
        $product->description = $req->description;

        if($req->hasFile('image')){
            $file = time().'.'.$req->image->extension();
            $req->image->move(public_path('assets'),$file);
            $product->image = $file;
        }
        $product->save();
        return redirect()->route('admin.product.list')->with('ok', 'Them moi thanh cong');
    }

    public function edit(Product $product, Category $category){
        $category = Category::all();
        return view('admin.product.edit', compact('category', 'product'));
    }
    public function update($id, Request $req){
        
        $product = Product::find($id);
        if($product){
            $product->name = $req->name;
            $product->price = $req->price;
            $product->sale_price = $req->sale_price;
            $product->status = $req->status;
            $product->category_id = $req->category_id;
            $product->description = $req->description;
            if(Product::where($product->id)){
                if($req->hasFile('image')){
                    $file = time().'.'.$req->image->extension();
                    $req->image->move(public_path('assets'),$file);
                    $product->image = $file;
                }
            }
        }
        $product->save();
        return redirect()->route('admin.product.list')->with('sua', 'Sua thanh cong');
    }

    

    public function destroy($id){
        $product = Product::find($id);
        if($product){
            $product->delete();
            return redirect()->route('admin.product.list')->with('xoa', 'Xoa thanh cong');
        }
    }
}