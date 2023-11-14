@extends('layouts.site')
@section('content')


<div class="p-t-140">
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-5">

                <form action="" method="POST" role="form">
                    @csrf
                    <h1>Thông tin đặt hàng</h1>

                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" value="{{$auth->name}}" placeholder="Input field">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" value="{{$auth->email}}" placeholder="Input field">
                    </div>
                    <div class="form-group">
                        <label for="">Phone</label>
                        <input type="number" class="form-control" name="phone" value="{{$auth->phone}}" placeholder="Input field">
                    </div>
                    <div class="form-group">
                        <label for="">Address</label>
                        <input type="text" class="form-control" name="address" value="{{$auth->address}}" placeholder="Input field">
                    </div>
                    <div class="form-group">
                        <label for="">Ghi Chu Don Hang</label>

                        <textarea name="note" id="input" class="form-control" rows="3" ></textarea>

                    </div>


                    <a href="{{route('cart.view')}}" class="mt-3 btn btn-primary">Back</a>

                    <button type="submit" class=" mt-3 btn btn-success">Đặt hàng</button>
                </form>

            </div>
            <div class="col-md-7">

                <h2>Your shopping cart</h2>
                @if (Session::has('ok'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{Session::get('ok')}}
                </div>
                @endif

                @if (Session::has('no'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{Session::get('no')}}
                </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Ảnh</th>
                                <th>Tên SP</th>
                                <th>Giá SP</th>
                                <th>Số lượng SP</th>
                                <th>Thành tiền</th>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cart->items as $item)
                            <tr>
                                <td>{{$loop->index + 1}}</td>
                                <td>
                                    <img src="{{asset('assets')}}/{{$item->image}}" width="60px">
                                </td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->price}}</td>
                                <td>
                                    {{$item->quantity}}
                                    <!-- <form action="{{ route('cart.update', $item->id) }}" method="get">
                                        <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                            <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-minus"></i>
                                            </div>

                                            <input name="quantity" class="mtext-104 cl3 txt-center num-product"
                                                type="number" name="num-product" value="{{$item->quantity}}">

                                            <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-plus"></i>
                                            </div>
                                        </div>
                                    </form> -->
                                </td>
                                <td>{{$item->quantity * $item->price}}</td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>



                <hr>
                <hr>
                <div class="text-center p-b-25">
                    <h2>Tổng tiền: ${{ number_format($cart->totalPrice) }}</h2>


                    <!-- <a href="{{route('cart.checkout')}}" class="mt-3 btn btn-success">Đặt hàng</a> -->
                </div>

            </div>
        </div>
    </div>
</div>

@stop