@extends('layouts.site')
@section('content')<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container my-5 py-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 text-center text-lg-start">
                <h1 class="display-3 text-white animated slideInLeft">Wellcome<br>Shop foods</h1>
                <p class="text-white animated slideInLeft mb-4 pb-2">Tempor erat elitr rebum at clita. Diam dolor diam
                    ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita
                    duo justo magna dolore erat amet</p>

            </div>
            <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                <img class="img-fluid" src="site/img/hero.png" alt="">
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
<div class="container">
    <div class="row g-5 align-items-center">
        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s"
            style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
            <div class="about-img position-relative overflow-hidden p-5 pe-0">
                <img class="img-fluid w-100" src="site/img/veg.jpg">
            </div>
        </div>
        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s"
            style="visibility: visible; animation-delay: 0.5s; animation-name: fadeIn;">
            <h1 class="display-5 mb-4">Best Organic Fruits And Vegetables</h1>
            <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos.
                Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
            <p><i class="fa fa-check text-success me-3"></i> Tempor erat elitr rebum at clita</p>
            <p><i class="fa fa-check text-success me-3"></i> Aliqu diam amet diam et eos</p>
            <p><i class="fa fa-check text-success me-3"></i> Clita duo justo magna dolore erat amet</p>
            <a class="btn btn-success rounded-pill py-3 px-5 mt-3" href="">Read More</a>
        </div>
    </div>
</div>
<br>
<br>
<br>



<div class="container">
    <div class="flash-box">
        <div class="flash-sale  d-flex flex-row">
            <img src="site/img/flash.png" alt="">
            <div class="timer">
                <span id="hours" class="bg-dark">00</span>
                <span class="text-dark">:</span>
                <span id="minutes" class="bg-dark">00</span>
                <span class="text-dark">:</span>
                <span id="seconds" class="bg-dark">00</span>
            </div>



        </div>
        <div class="owl-carousel">
            @foreach($sale as $sl)
            <div class="item-sale">
                <a href="{{ route('comment.view', $sl->id) }}">
                    <div class="card text-left">
                        <img class="card-img-top" src="assets/{{ $sl->image }}" alt="">
                        <div class="card-body">
                            <h4 class="card-title text-center text-dark">{{ $sl->name }}</h4>


                            <p class="card-text text-center">
                                <s class="price">${{ $sl->price }}</s>
                                <span class="sale_price"> ${{ $sl->sale_price }}</span> <span
                                    class="discount-badge">{{number_format(($sl->price - $sl->sale_price) / $sl->price * 100,0) }}%</span>
                            </p>
                        </div>
                    </div>
                </a>
            </div>

            @endforeach

        </div>
    </div>

</div>

<br>
<br>
<br>
<br>
<br>
<div class="container prod" id="product">
    <h1 class="text-center">Our Product</h1>

    <ul class="filters_menu">
        <li class="list active" data-filter="all">
            <div class="a">All</div>
        </li>
        @foreach($category as $cat)
        <li class="list" data-filter="{{$cat->id}}">
            <div class="a">{{$cat->name}}</div>
        </li>
        @endforeach
    </ul>


    <div>
        <div>
            <div class="row mt-5">
                @foreach($product as $prd)
                <div class=" item {{$prd->category_id}} col-md-3 mt-3">
                    <div class="featured__item">
                        <div class="featured__item__pic  set-bg" data-setbg="assets/{{$prd->image}}"
                            style="background-image: url(&quot;assets/{{$prd->image}}&quot;);">
                            <ul class="featured__item__pic__hover">
                                @php
                                $existingFavorite = App\Models\Favorites::where('customer_id', auth('cus')->id())
                                ->where('product_id', $prd ->id)
                                ->first();
                                @endphp
                                @if($existingFavorite)
                                <li><a href="{{route('favorites.remove', $prd->id)}}"><i class="fa fa-heart text-danger"></i></a></li>
                                @else
                                <li><a href="{{route('favorites.add', $prd ->id)}}"><i class="fa fa-heart"></i></a></li>
                                @endif
                                <li><a href="{{route('comment.view', $prd ->id)}}"><i class="fa fa-eye"></i></a></li>
                                <li><a href="{{route('cart.add', $prd ->id)}}"><i class="fa fa-shopping-cart"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">{{$prd->name}}</a></h6>
                            <h5>${{$prd->price}}</h5>
                        </div>
                    </div>



                </div>


                @endforeach
            </div>
        </div>
    </div>
    <a href="{{ route('customer.product')}}#pro" class="btn btn-product text-center d-block mx-auto mt-5">More
        Product&nbsp;<i class="fa fa-arrow-right"></i></a>

</div>




<br>
<br>

<div class="container ">
    <h1 class="text-center">Contact Us</h1>
    <div class="row">
        <div class="col-md-6">


            <div>
                <form action="" method="POST" role="form">
                    @csrf
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Input Name">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Input Email">
                    </div>
                    <div class="form-group">
                        <label for="">Phone</label>
                        <input type="text" class="form-control" name="phone" placeholder="Input Phone">
                    </div>
                    <div class="form-group">
                        <label for="">Note</label>
                        <textarea name="note" id="input" class="form-control" rows="3"></textarea>
                    </div>

                    <br>

                    <button type="submit" class="btn btn-primary">Send</button>

                </form>

            </div>
            <br>
        </div>

        <div class="col-md-6">
            <img src="site/img/contact-us.png" width="100%">
        </div>
    </div>

</div>

@if($isTimeGreaterThanZero)

<script>
document.addEventListener("DOMContentLoaded", function() {

    let hoursLeft = {{ $time -> hour}};
    let minutesLeft = {{   $time -> minute}};
    let secondsLeft ={{  $time -> second}}; // Đặt lại thành 0 để thử nghiệm
    document.querySelector(".flash-box").classList.add("flashblock")
    // Kiểm tra xem liệu đã có trạng thái trước đó được lưu trong Local Storage hay chưa
    const savedState = JSON.parse(localStorage.getItem("countdownState"));
    if (savedState) {
        hoursLeft = savedState.hoursLeft;
        minutesLeft = savedState.minutesLeft;
        secondsLeft = savedState.secondsLeft;
    }

    const timerInterval = setInterval(function() {
        if (hoursLeft === 0 && minutesLeft === 0 && secondsLeft === 0) {
            // Thời gian đã về 0, bạn có thể ẩn thanh Flash Sale ở đây
            document.querySelector(".flash-box").classList.add("hidden");

            // Dừng đồng hồ đếm
            clearInterval(timerInterval);

            // Xóa trạng thái đồng hồ đếm khỏi Local Storage
            localStorage.removeItem("countdownState");
        } else {
            if (secondsLeft === 0) {
                secondsLeft = 59;
                if (minutesLeft === 0) {
                    minutesLeft = 59;
                    if (hoursLeft > 0) {
                        hoursLeft--;
                    }
                } else {
                    minutesLeft--;
                }
            } else {
                secondsLeft--;
            }

            // Cập nhật thời gian trên giao diện
            document.getElementById("hours").innerText = hoursLeft.toString().padStart(2, "0");
            document.getElementById("minutes").innerText = minutesLeft.toString().padStart(2, "0");
            document.getElementById("seconds").innerText = secondsLeft.toString().padStart(2, "0");

            // Lưu trạng thái hiện tại vào Local Storage
            localStorage.setItem("countdownState", JSON.stringify({
                hoursLeft,
                minutesLeft,
                secondsLeft
            }));
        }
    }, 1000);
});
</script>

@endif

@stop