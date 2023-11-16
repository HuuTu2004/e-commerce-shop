@extends('layouts.site')
@section('content')
<div class="bannershop">
    <h1>Profile</h1>
    <div class="banner-bg"></div>

</div>
<style>
/* Ẩn tất cả các tab-content ban đầu */
.tab-content {
    padding: 0 !important;
    display: none;
}

/* Hiển thị tab-content có class "active" */
.tab-content.active {
    display: block;
}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="account bg-dark">
                @if(is_string(auth('cus')->user()->image))
                <img src="assets/{{auth('cus')->user()->image}}" width="60px">
                @else
                <img src="https://st.nettruyenus.com/data/siteimages/anonymous.png" width="60px">

                @endif

                <figcaption>
                    <div class="title">Tài khoản của</div>
                    <div class="user-name">
                        {{auth('cus')->user()->name}}
                    </div>
                </figcaption>
            </div>
            <br>
            <ul class="account-nav">

                <li data-tab="tab-info" class="hvr-sweep-to-right active"><a href="javascript:void(0);"><i
                            class="fa fa-info-circle"></i>
                        Thông tin tài
                        khoản</a></li>

                <li data-tab="tab-orders" class="hvr-sweep-to-right"><a href="javascript:void(0);" role="tab"><i
                            class="fa fa-list"></i> Đơn Hàng Đã
                        Mua</a></li>
                <li data-tab="tab-comments" class="hvr-sweep-to-right"><a href="javascript:void(0);"><i
                            class="fa fa-comments"></i> Bình
                        luận</a></li>

                <li data-tab="tab-password" class="hvr-sweep-to-right"><a href="javascript:void(0);"><i
                            class="fa fa-lock"></i> Đổi mật
                        khẩu</a></li>
                <li class="hvr-sweep-to-right"><a href="{{route('customer.logout')}}"><i class="fa fa-sign-out"></i> Đăng xuất</a></li>
            </ul>

        </div>
        <div class="col-md-9">

            <div id="tab-info" class="tab-content active">

                <h2 class="text-dark">Thông tin tài Khoản</h2>
                <form action="{{route('customer.update_profile',auth('cus')->user()->id)}}" method="POST" role="form"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-8">
                            @if($errors->has('name'))
                            <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                            @endif
                            @if($errors->has('email'))
                            <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                            @endif
                            @if($errors->has('phone'))
                            <div class="alert alert-danger">{{ $errors->first('phone') }}</div>
                            @endif
                            @if($errors->has('address'))
                            <div class="alert alert-danger">{{ $errors->first('address') }}</div>
                            @endif
                            @if($errors->has('image'))
                            <div class="alert alert-danger">{{ $errors->first('image') }}</div>
                            @endif
                            <div class="form-group">
                                <label for="">Tài Khoản</label>
                                <input type="text" class="form-control" name="name"
                                    value="{{auth('cus')->user()->name}}" placeholder="Input field">

                            </div>
                            <div class="form-group">
                                <label for="">Địa chỉ email</label>
                                <input type="email" class="form-control" name="email"
                                    value="{{auth('cus')->user()->email}}" placeholder="Input field">

                            </div>
                            <div class="form-group">
                                <label for="">Phone</label>
                                <input type="text" class="form-control" name="phone"
                                    value="{{auth('cus')->user()->phone}}" placeholder="Input field">

                            </div>
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" class="form-control" name="address"
                                    value="{{auth('cus')->user()->address}}" placeholder="Input field">

                            </div>
                            <button type="submit" class=" mt-3 btn btn-primary">Update</button>
                        </div>
                        <div class="col-md-4">
                            @if(is_string(auth('cus')->user()->image))
                            <img id="previewImage" src="assets/{{auth('cus')->user()->image}}" width="100%">
                            @else
                            <img id="previewImage"
                                src="data:image/png;base64,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"
                                width="100%">

                            @endif

                            <input type="file" name="image" id="fileInput" accept="image/*">

                        </div>
                    </div>


                </form>
            </div>
            <div id="tab-orders" class="tab-content">
                <!-- Nội dung của tab "Đơn Hàng Đã Mua" -->
                <h2 class="text-dark">Lịch Sử Đơn Hàng Đã Mua</h2>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Stt</th>
                                <th>Tên </th>
                                <th>Giá </th>
                                <th>Số Lượng</th>
                                <th>Tổng Tiền</th>
                                <th>Trạng thái</th>
                                <th>Ngày Đặt Hàng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($history as $hs)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td> <a href="{{route('comment.view',$hs->product_id)}}"
                                        style="text-decoration:none;">{{$hs->product->name}}</a></td>
                                <td>{{$hs->product->price}}</td>
                                <td>{{$hs->quantity}}</td>
                                <td>${{$hs->product->price*$hs->quantity}}</td>
                                @if($hs->status == 0 )
                                <td>Chưa Xác Nhận</td>
                                @elseif($hs->status == 1)
                                <td>Đã Xác Nhận</td>
                                @else
                                <td>Đã Bị Hủy Bởi Người Bán</td>

                                @endif
                                <td>{{$hs->created_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

            </div>
            <div id="tab-comments" class="tab-content">
                <!-- Nội dung của tab "Bình luận" -->
                <h2 class="text-dark">Bình Luận Của Bạn</h2>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Stt</th>
                                <th>Tên sản Phẩm </th>
                                <th>Nội Dung Bình Luận</th>
                                <th>Ngày Tạo</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($comments as $cm)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td> <a href="{{route('comment.view',$cm->product_id)}}"
                                        style="text-decoration:none;">{{$cm->product->name}}</a></td>
                                <td>{{$cm->comment}}</td>
                                <td>{{$cm->created_at}}</td>
                                <td><a href="{{route('comment.remove',$cm->id)}}" class="text-danger pull-right block"
                                        onclick="return confirm('Bạn có chắc muốn xóa bình luận này')"><i
                                            class="fa fa-close"></i></a></td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
            <div id="tab-password" class="tab-content">
                <!-- Nội dung của tab "Đổi mật khẩu" -->
                @if(session()->has('error'))
                <div class="alert alert-danger">{{ session()->get('error') }}</div>
                @endif
                @if(session()->has('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                <form method="POST" action="{{ route('customer.changePassword') }}">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="old_password">Mật khẩu cũ</label>
                        <input type="password" name="old_password" id="old_password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="new_password">Mật khẩu mới</label>
                        <input type="password" name="new_password" id="new_password" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="confirm_password">Xác nhận mật khẩu mới</label>
                        <input type="password" name="confirm_password" id="confirm_password" class="form-control">
                    </div>
                    <br>
                    <button type="submit" class="btn primary-btn">Đổi mật khẩu</button>
                </form>

            </div>

        </div>

    </div>
</div>

@stop

<script>
document.addEventListener("DOMContentLoaded", function() {

    // Lắng nghe sự kiện thay đổi trên thẻ input file
    const fileInput = document.getElementById("fileInput");
    fileInput.addEventListener("change", function() {
        // Kiểm tra xem người dùng đã chọn tệp hình ảnh chưa
        if (fileInput.files.length > 0) {
            // Lấy tệp hình ảnh được chọn
            const selectedImage = fileInput.files[0];

            // Kiểm tra xem tệp được chọn có phải là hình ảnh
            if (selectedImage.type.startsWith("image/")) {
                // Tạo một đối tượng FileReader để đọc tệp
                const reader = new FileReader();

                // Đăng ký sự kiện khi việc đọc hoàn thành
                reader.onload = function(e) {
                    // Gán đường dẫn dữ liệu hình ảnh vào thuộc tính src của thẻ img
                    const previewImage = document.getElementById("previewImage");
                    previewImage.src = e.target.result;
                };

                // Đọc tệp hình ảnh
                reader.readAsDataURL(selectedImage);
            } else {
                // Nếu người dùng chọn tệp không phải là hình ảnh, bạn có thể hiển thị thông báo hoặc xử lý tùy ý.
                alert("Hãy chọn một tệp hình ảnh.");
            }
        }
    });
});
</script>


<script>
document.addEventListener("DOMContentLoaded", function() {
    const tabs = document.querySelectorAll(".account-nav li");

    tabs.forEach((tab) => {
        tab.addEventListener("click", () => {
            // Lấy data-tab từ thẻ li
            const targetTab = tab.getAttribute("data-tab");

            // Ẩn tất cả các tab-content
            const tabContents = document.querySelectorAll(".tab-content");
            tabContents.forEach((content) => {
                content.classList.remove("active");
            });

            // Hiển thị tab-content tương ứng với tab được chọn
            document.getElementById(targetTab).classList.add("active");

            // Loại bỏ class "active" khỏi tất cả các tab
            tabs.forEach((t) => {
                t.classList.remove("active");
            });

            // Thêm class "active" vào tab được chọn
            tab.classList.add("active");
        });
    });
});
</script>