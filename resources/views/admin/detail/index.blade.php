@extends('layouts.main')
@section('title','Quản lý đơn hàng')

@section('content')
<div class="box-body">
    @if(Session::has('success'))
    
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{Session::get('success')}}
    </div>
    @endif
    @if(Session::has('err'))
    
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{Session::get('err')}}
    </div>
    @endif
    <h1>Đơn hàng chưa xác nhận</h1>
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
                    <th></th>
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
                    @if($ord->status == 0 )
                    <td>Chưa Xác Nhận</td>
                    @else
                    <td>Đã Xác Nhận</td>
                    @endif
                    <td>{{$ord->customer->name}}</td>
                    <td>{{$ord->created_at}}</td>
                    <td><a href="{{route('orderDetail.confirmOrder',$ord->order_id)}}" class="btn btn-primary">Xác
                            Nhận</a>
                        <a href="{{route('orderDetail.deleteOrder',$ord->order_id)}}" class="btn btn-danger">Hủy</a>
                    </td>


                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    {{$orderDetail->links()}}

</div>
</div>

<div class="box-footer">
    <h1>Đơn hàng đã xác nhận</h1>
    <div class="col-md-12">
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
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($confirm as $cf)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td> {{$cf->product->name}}</td>
                        <td>{{$cf->product->price}}</td>
                        <td><img src="assets/{{$cf->product->image}}" width="60px"></td>
                        <td>{{$cf->quantity}}</td>
                        <td>${{$cf->product->price*$cf->quantity}}</td>
                        @if($cf->status == 0 )
                        <td>Chưa Xác Nhận</td>
                        @else
                        <td class="text-success"><span class="label-success">Đã Xác Nhận</span> </td>
                        @endif
                        <td>{{$cf->customer->name}}</td>
                        <td>{{$cf->created_at}}</td>

                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        {{$confirm ->links()}}
    </div>
  


</div>
</div>
</div>

@stop