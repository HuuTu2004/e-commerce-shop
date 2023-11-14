@extends('layouts.site')
@section('content')
<div class="bannershop">
    <h1>Product Detail</h1>
    <div class="banner-bg"></div>

</div>

<div class="p-t-140 ">
    <div class="container ">

        <div class="row">
            <div class="col-md-6">
                <div class="image">
                    <img src="assets/{{$product->image}}">
                </div>
                <br>

            </div>
            <div class="col-md-6 product-detail j">
                <h3 class="pt-2 py-2">Tên Sản Phẩm : {{$product->name}}</h3>
                
                <div class="product-detail-ratting pt-2 py-2">
                    <div class="row">
                        <div class="col-md-5 col-lg-3">
                            <div id="rateYo"></div>
                        </div>
                        <div class="col-md-7 col-lg-9">
                            <span class="text-danger">({{$reviews}} reviews)</span>
                        </div>
                    </div>
                    
                </div>
                <div class="product-detail-text mt-2 mb-4">
                    Giá : {{number_format($product->price*23000)}}₫
                </div>
                <p>*Giá trên đã bao gồm thuế VAT</p>
                <ul>
                    <li><i class="fa fa-check-circle text-success" aria-hidden="true"></i> Đạt chuẩn an toàn Viet Gap
                    </li>
                    <li><i class="fa fa-check-circle text-success" aria-hidden="true"></i> Hàng tươi mới trong ngày</li>
                </ul>
                <br>
                <div class="product__details__quantity">
                    <form action="{{route('cart.add', $product ->id)}}" method="post">
                        @csrf
                        <div class="quantity">
                            <div class="pro-qty">
                                <input type="text" value="1" name="quantity">
                            </div>

                        </div>
                        <div class="button-container">
                            <button type="submit" class="primary-btn">
                                <i class="fa fa-cart-arrow-down" aria-hidden="true"></i> ADD TO CART
                            </button>
                        </div>
                    </form>
                </div>
                <br>
                <div class="fb-like" data-href="http://127.0.0.1:8000/comment/comment/2" data-width="" data-layout=""
                    data-action="" data-size="" data-share="true"></div>

            </div>
            <div class="col-lg-12">

                <div class="product-detail-tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                aria-selected="false">Comment</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                aria-selected="false">Comment with facebook</a>
                        </li>

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Products Infomation</h6>
                                <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                    Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus. Vivamus
                                    suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam sit amet quam
                                    vehicula elementum sed sit amet dui. Donec rutrum congue leo eget malesuada.
                                    Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur arcu erat,
                                    accumsan id imperdiet et, porttitor at sem. Praesent sapien massa, convallis a
                                    pellentesque nec, egestas non nisi. Vestibulum ac diam sit amet quam vehicula
                                    elementum sed sit amet dui. Vestibulum ante ipsum primis in faucibus orci luctus
                                    et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam
                                    vel, ullamcorper sit amet ligula. Proin eget tortor risus.</p>
                                <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Lorem
                                    ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet
                                    elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum
                                    porta. Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus
                                    nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.
                                    Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed
                                    porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum
                                    sed sit amet dui. Proin eget tortor risus.</p>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                            <div class="product__details__tab__desc">

                                <div class="col-md-12">
                                    <h6>Bình luận sản phẩm</h6>
                                    @if(auth('cus')->check())

                                    Bạn đang bình luận bằng tài khoản <p class="text-danger">
                                        {{auth('cus')->user()->email}}</p>
                                    <form action="{{route('rating.rate')}}" method="post" id="rateForm">
                                        @csrf
                                        <p>Đánh Giá Sản Phẩm</p>
                                        <div id="rateYoUser"></div>
                                        <input type="hidden" name="rateStar" id="rateStar">
                                        <input type="hidden" name="customer_id" value="{{auth('cus')->user()->id}}">
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                    </form>
                                    <form action="{{route('comment.add',$product->id)}}" method="POST" role="form">
                                        @csrf


                                        <div class="form-group">
                                           
                                            <input type="hidden" name="product_id" value="{{$product->id}}">
                                            
                                            <input type="hidden" name="customer_id" value="{{auth('cus')->user()->id}}">
                                            <label for="">Note</label>
                                            <textarea name="comment" id="input" class="form-control"
                                                rows="3"></textarea>
                                             
                                            @error('comment')
                                            <div class="text-danger">{{$message}}</div>
                                            @enderror
                                        </div>
                                        <br>

                                        <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"
                                                aria-hidden="true"></i></button>
                                    </form>
                                    @else

                                    <a href="{{route('customer.login')}}">Vui lòng login để comment ?</a>
                                    @endif

                                </div>
                                <hr>
                                @foreach ($comments as $comment)
                                @php
                                $customer = App\Models\Customer::find($comment->customer_id);
                                if(auth('cus')->check()){
                                $checkCus = App\Models\Customer::find(auth('cus')->user()->id);
                                $cusId = $checkCus-> id;
                                }else {

                                $cusId = 0;
                                }
                                $customerName = $customer ? $customer->name : 'Khách hàng không xác định';
                                @endphp
                                <div class="comment-box">

                                    <div class="comment-img">
                                        @if($customer->image)
                                        <img src="assets/{{$customer->image}}" alt="">
                                        @else
                                        <img src="assets/user.jpg" alt="">
                                        @endif
                                    </div>

                                    <div class="comment-body">
                                        <div class="comment-header">

                                            <span class="authorname name-4">{{$customerName}}</span>
                                            <div >{{$comment->rateStar}}</div>
                                            @if($cusId == $comment->customer_id)
                                            <a href="{{route('comment.remove',$comment->id)}}"
                                                class="text-danger pull-right block"
                                                onclick="return confirm('Bạn có chắc muốn xóa bình luận này')"><i
                                                    class="fa fa-close"></i></a>
                                            @else

                                            @endif
                                        </div>
                                        <div class="comment-content">{{$comment->comment}}</div>
                                        <p>{{ $comment ->created_at}}</p>
                                        @if(auth('cus')->check())
                                        <a href="#" class="reply-button"><i class="fa fa-comment"></i> Trả lời</a>
                                        <form action="{{route('comment.reply')}}" method="post" class="reply-form"
                                            style="display: none;">
                                            @csrf
                                            @error('reply_text')
                                            <div class="text-danger">{{$message}}</div>
                                            @enderror
                                            <div class="form-group">

                                                <input type="hidden" name="user_comment"
                                                    value="{{auth('cus')->user()->id}}">
                                                <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                             

                                                <input type="hidden" name="name_reply" value="{{$customerName}}">

                                                <label for="">Nội dung phản hồi</label>
                                                <textarea name="reply_text" id="input" class="form-control"
                                                    rows="3"></textarea>

                                            </div>
                                            <br>
                                            <button type="submit" class="btn btn-success">Gửi</button>
                                        </form>
                                        @else
                                        <a href="{{route('customer.login')}}"><i class="fa fa-comment"></i> Trả lời</a>
                                        @endif
                                        <!-- reply comment -->
                                        @foreach($reply as $ry)

                                        @php
                                        $userComment = App\Models\Customer::find($ry->user_comment);
                                        @endphp
                                        @if($ry->comment_id == $comment->id)
                                        <div class="comment-box">
                                            <div class="comment-img">
                                                @if($userComment->image)
                                                <img src="assets/{{$userComment->image}}" alt="">
                                                @else
                                                <img src="assets/user.jpg" alt="">
                                                @endif
                                            </div>
                                            <div class="comment-body">
                                                <div class="comment-header">
                                                    <span class="authorname name-4">{{$userComment->name}}</span>
                                                    @if($cusId == $userComment->id)
                                                    <a href="{{route('comment.reply_remove',$ry->id)}}"
                                                        class="text-danger pull-right block"
                                                        onclick="return confirm('Bạn có chắc muốn xóa bình luận này')"><i
                                                            class="fa fa-close"></i></a>
                                                    @else

                                                    @endif
                                                </div>
                                                <div class="comment-content">
                                                    <i class="fa fa-mail-forward text-primary">
                                                        {{ $ry -> name_reply}}</i>
                                                    {{ $ry -> reply_text}}
                                                </div>
                                            </div>


                                        </div>
                                        @endif
                                        @endforeach
                                    </div>


                                </div>


                                @endforeach
                                {{ $comments ->links()}}
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8"><div class="fb-comments" data-href="http://127.0.0.1:8000/comment/comment/2" data-width=""
                                data-numposts="20"></div></div>
                                <div class="col-md-2"></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Chọn tất cả các nút "Trả lời" và biểu mẫu tương ứng
    const replyButtons = document.querySelectorAll(".reply-button");
    const replyForms = document.querySelectorAll(".reply-form");

    replyButtons.forEach((button, index) => {
        // Bắt sự kiện click cho nút "Trả lời"
        button.addEventListener("click", function(e) {
            e.preventDefault();
            // Hiển thị biểu mẫu trả lời tương ứng và ẩn các biểu mẫu khác
            replyForms.forEach((form, formIndex) => {
                if (formIndex === index) {
                    form.style.display = "block";
                } else {
                    form.style.display = "none";
                }
            });
        });
    });
});

</script>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v18.0"
    nonce="XVDPi1A9"></script>
@stop

@section('js')
<script>
    $(function () {
        var ratingAvg = '{{$ratingAvg}}';
        var userRating ='{{$userRating}}';
        $("#rateYo").rateYo({
            starWidth: "23px",
            rating    : ratingAvg ? ratingAvg :0,
            spacing   : "5px",
            readOnly: true,
            multiColor: {

                "startColor": "#FF0000", //RED
                "endColor"  : "#f1c40f"  //GREEN
            }
        });
       
        $("#rateYoUser").rateYo({
            starWidth: "23px",
            rating    : userRating?userRating:0,
            spacing   : "5px",
            multiColor: {

                "startColor": "#FF0000", //RED
                "endColor"  : "#f1c40f"  //GREEN
            }
        }).on("rateyo.set",function(e,data){
            $('#rateStar').val(data.rating);
            $('#rateForm').submit();
        });

    });
</script>
@stop