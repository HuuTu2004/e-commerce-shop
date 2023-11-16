@extends('layouts.main')
@section('title','Thêm mới sản phẩm')

@section('content')
<div class="box-body">
<h1>Đơn hàng dã hủy</h1>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Stt</th>
                    <th>Tên </th>
                    <th>Giá </th>
                    <th>Ảnh </th>
                    <th>Số Lượng</th>
                    <th>Tổng Tiền</th>
                    <th>Trạng thái</th>
                    <th>Tên khách Hàng</th>
                    <th>Ngày Đặt Hàng</th>
                  
                </tr>
            </thead>
            <tbody>
                @foreach($orderDetail as $ord)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td> {{$ord->product->name}}</td>
                    <td>{{$ord->product->price}}</td>
                    <td><img src="assets/{{$ord->product->image}}" width="60px"></td>
                    <td>{{$ord->quantity}}</td>
                    <td>${{$ord->product->price*$ord->quantity}}</td>
                    @if($ord->status == 2 )
                    <td class="text-danger"><span class="label-danger">Đã bị hủy</span></td>
                   @endif
                    <td>{{$ord->customer->name}}</td>
                    <td>{{$ord->created_at}}</td>
                    <td><a href="{{route('orderDetail.confirmOrder',$ord->order_id)}}" class="btn btn-primary">Khôi phục</a>
                        
                    </td>


                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</div>

@stop