<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\DB;
class OrderDetailController extends Controller
{
    //
    public function index (){
        $deleteOrder =OrderDetail::where('status',2)->paginate(10);

        $confirm =OrderDetail::where('status',1)->paginate(10);
        $orderDetail = OrderDetail::where('status',0)->paginate(10);
        return view('admin.detail.index',compact('orderDetail','confirm','deleteOrder'));
    } 
    public function confirmOrder($order_id){
        //  Query Builder 
        DB::table('order_detail')
        ->where('order_id', $order_id)
        ->update(['status' => 1]);
        return redirect()->back()->with('success','Xác nhận đơn hàng thành công');
    } 
    public function deleteOrder($order_id){
        //  Query Builder 
        DB::table('order_detail')
        ->where('order_id', $order_id)
        ->update(['status' => 2]);
        return redirect()->back()->with('err','Hủy đơn hàng thành công');
    } 
    public function trash(){
        $orderDetail = OrderDetail::where('status',2)->paginate(10);
        return view('admin.detail.trash',compact('orderDetail'));
    }
}
