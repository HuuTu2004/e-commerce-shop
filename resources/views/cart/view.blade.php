@extends('layouts.site')
@section('content')
<div class="bannershop">
    <h1>Your shopping cart</h1>
    <div class="banner-bg"></div>

</div>

<div class="p-t-140 ">
    <div class="container ">

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

                            <form action="{{ route('cart.update', $item->id) }}" method="get">
                                <div class="row">
                                    <div class="col-md-8">
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
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-sm btn-success">
                                            Update
                                        </button>
                                    </div>
                                </div>


                            </form>
                        </td>
                        <td>{{$item->quantity * $item->price}}</td>
                        <td>
                            <a href="{{ route('cart.remove', $item->id)}}" class="btn text-dark"
                                onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này ?')">&times;</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <div class="text-center p-b-25">
            <div class="row">
                <div class="col-md-6">
<br>
<br>
                    <a href="{{ route('customer.home') }}#product-box" class="mt-3 btn cart-btn">Tiếp tục mua
                        hàng</a>
                    <a href="{{ route('cart.clear') }}" class="mt-3 btn cart-btn-danger"
                        onclick="return confirm('Bạn có chắc khống?')">Xóa giỏ hàng</a>

                </div>
                <div class="col-md-6">
                    <div class="checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Total Quantity: <span>{{$cart->totalQuantity}}</span></li>
                            <li>Total Price :<span>${{ number_format($cart->totalPrice) }}</span></li>

                        </ul>
                        <a href="{{route('cart.checkout')}}" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

@stop