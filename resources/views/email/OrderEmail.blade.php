<div>
    <h4>Thông Tin Đơn Hàng</h4>
    <h2>Khách Hàng : {{$customer->name}}</h2>
    <h4>Mã ĐH : {{$order->id}}</h4>
    <h4>Ngày Đặt : {{$order->created_at->format('d/m/Y')}}</h4>



    <div class="table-responsive">
        <table border="1" class="table table-hover">
            <thead>
                <tr>
                    <th>Stt</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Hình Ảnh</th>
                    <th>Giá</th>
                    <th>Số Lượng</th>
                    <th>Thành Tiền</th>

                </tr>
            </thead>
            <tbody>
                @foreach($order->detail as $det)
                <tr>
                    <td>{{$loop -> index + 1}}</td>
                    <td>{{$det -> product -> name}}</td>
                    <td>{{$det -> product -> name}}</td>
                    <td>{{$det -> price}}</td>
                    <td>{{$det -> quantity}}</td>
                    <td>{{$det -> quantity * $det -> price}}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <h4>Tổng Giá Trị Hóa Đơn : {{$order->getTotal()}}</h4>
    <a href="{{route('cart.orderEmail', $order->token)}}"
        style="border-radius: 10px ; padding: 10px 10px; border:2px solid #000; background-color:  rgb(79, 246, 79); color: black; text-decoration: none;">Xác
        Nhận</a>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>




</div>