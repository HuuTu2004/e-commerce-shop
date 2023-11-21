<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Comment;
use App\Models\Reply;
use App\Models\Rating;

class ProductDetailController extends Controller
{
    //
    public function view(Product $product){
        
        $comments = Comment::where('product_id', $product->id)->paginate(4);
        $reply = Reply::all();
        $reviews = Rating::where("product_id",$product->id)->count();
        $ratingAvg = Rating::where('product_id', $product->id)->avg('rateStar');
        if(auth('cus')->check()){
            $userRating = Rating::where('product_id',  $product->id)
            ->where('customer_id',auth('cus')->user()->id)
            ->value('rateStar');
        }else {
            $userRating = 0;
        }
       
        
        
        return view('product-detail.view',compact('product',"comments","reply","ratingAvg","reviews",'userRating'));
    }
    public function add(Request $req,$product){
        $req -> validate([
            "comment" => 'required'
        ]);
        $data = [
            'customer_id' => $req->customer_id,
            'comment' => $req->comment,
            'product_id' => $req->product_id,
            
        ];
        Comment::create($data);
        
      
        return redirect()->route('comment.view',$product)->with('success','Bình luận thành công');
      
    }
    public function remove(Request $req,Comment $product){

        if(auth('cus')->user()->id == $product->customer_id){
           
            $product->delete();
            return redirect()->route('comment.view',$product->product_id)->with('success','Xóa bình luận thành công');
        }
        return redirect()->back()->with('error','Xóa bình luận ko thành công');
      
    }
    public function reply(Request $req){
        $req->validate([
            'reply_text' => 'required',
        ]);
        $data = [
            'comment_id' => $req->comment_id,
            'name_reply' => $req->name_reply,
            'user_comment' => $req->user_comment,
            'reply_text' => $req->reply_text,
        ];
        Reply::create($data);
        return redirect()->back()->with('success','Trả lời thành công');
      
    }
    public function reply_remove(Request $req,reply $reply_id){
        $reply_id->delete();
        return redirect()->back()->with('success','Xóa bình luận thành công');
      
    }
    public function rate(Request $req){
        $ratingExits = Rating::where($req->only('customer_id','product_id'))->first();
        if($ratingExits) {
            Rating::where($req->only('customer_id','product_id'))
                        ->update($req->only('rateStar'));
           
        } else {
            Rating::create($req->only('customer_id','product_id',"rateStar"));
        }
        return redirect()->back();
    }
   
}
