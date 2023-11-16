<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <base href="/">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <link rel="stylesheet" href="site/css/font-awesome.min.css">
    <link rel="stylesheet" href="site/css/bootstrap.css">
    <link rel="stylesheet" href="site/css/owl.carousel.css">
    <link rel="stylesheet" href="site/css/main.css">
    <link rel="stylesheet" href="site/css/home.css">
</head>

<body>


    <div class="top-header bg-white">

        <div class="container ">

            <div class="row">

                <div class="col-md-6 header-text-content">
                    <i class="fa  fa-usd"> Wellcome to my page</i>
                </div>


            </div>

        </div>

    </div>
    <nav class=" sticky-top">

        <div class="container">
            <ul class="menu">
                <li class="logo"><a href="{{ route('customer.home')}}"><img src="site/img/logo.png" alt=""></a></li>
                
                <li class="nav">
                    <form action="{{ route('customer.product')}}" method="get" class="form-inline" role="form">
                    
                        <div class="form-group  formSearch">
                            <input type="text" class="form-control inputSearch" name="key" style="z-index: 1;" placeholder="Tìm kiếm sản phẩm">
                            <button type="submit" class="btn btnSearch"><i class="fa fa-search"></i></button>
                        </div>
                        
                    </form>
            
                </li>
                <li class="nav "><a class="nav-link" href="{{ route('customer.about')}}">Contact Us</a></li>
                <li class="nav "><a class="nav-link" href="{{ route('customer.product')}}">Product</a></li>
                <li class="nav"><a class="nav-link" href="{{ route('admin.home')}}">Admin</a></li>
               
                @if(auth('cus')->check())
                <li class="nav"><a class="nav-link text-danger" href="{{route('customer.profile')}}">Hi <i
                            class="fa  fa-user"></i> !</a></li>
                <li class="nav"><a class="nav-link" href="{{route('customer.logout')}}"><i
                            class="fa  fa-sign-out"></i></a></li>
                 

                            <li class="nav">
                    <a class="nav-link" href="javascript:void(0)" data-toggle="modal" data-target="#myModal">
                        <i class="fa fa-heart"></i>
                    </a>
                </li>
                @else
                <li class="nav button"><a class="nav-link" href="{{route('customer.login')}}">Log In</a></li>
                @endif

                <li class="nav button secondary"><a class="nav-link" href="{{route('cart.view')}}"><i
                            class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                <li class="toggle"><span class="bars"></span></li>
                


            </ul>
        </div>
    </nav>


    @yield('content')

@php
if( auth('cus')->check()) {

$favorites = App\Models\Favorites::where('customer_id',  auth('cus')->user()->id)->with('product')->get();

}else {
$favorites ="null";
}
@endphp
<!-- start favorite -->
@if(auth('cus')->check())
<div class="modal" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Sản phẩm đã Yêu Thích</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="p-t-140 ">
                    <div class="container ">


                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Ảnh</th>
                                        <th>Tên SP</th>
                                        <th>Giá SP</th>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($favorites as $item)
                                    <tr>
                                        <td>{{$loop->index + 1}}</td>
                                        <td>
                                            <img src="{{asset('assets')}}/{{$item->product->image}}" width="60px">
                                        </td>
                                        <td>{{$item->product->name}}</td>
                                        <td>{{$item->product->price}}</td>
                                        <td>
                                            <a href="{{ route('favorites.remove', $item->id)}}"
                                                class="btn text-dark">&times;</a>
                                                <a href="{{route('cart.add', $item->product_id)}}"><i class="fa fa-shopping-cart text-dark"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>



                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endif
<!-- end -->


    <br>
    <br>
    <br>
    <footer>
        <div class="top-footer">
            <div class="container ">
                <div class="row ">
                    <div class="col-md-12">
                        <h3>Get our latest news and special sales</h3>
                        <p>You may unsubscribe at any moment. For that purpose, please find our contact info in the
                            legal notice.</p>
                    </div>

                </div>
            </div>


        </div>

        <div class="bottom-footer ">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <h4>YOUR ACCOUNT</h4>
                        <br>
                        <p>Personal info</p>
                        <p>Oders</p>
                        <p>credit slips</p>
                        <p>Addresses</p>
                    </div>
                    <div class="col-md-3">
                        <h4>CUSTOMER SERVICE</h4>
                        <br>
                        <p>Monday to Friday</p>
                        <p>10am - 6.30pm (NewYork time)</p>
                        <p>0332716863</p>
                        <p>nht@hmail.com</p>
                    </div>
                    <div class="col-md-3">
                        <h4>OUR GUARANTEES</h4>
                        <br>
                        <p>Shipping in 3 days</p>
                        <p>Free returns within 14 days</p>
                        <p>Secure payments</p>

                    </div>
                    <div class="col-md-3">
                        <h4>OUR COMPANY</h4>
                        <br>
                        <p>Delivery</p>
                        <p>Legal Notice</p>
                        <p>Contact Us</p>
                        <p>Terms and conditions of use</p>
                    </div>


                </div>

                <div class="row">

                    <div class="col-md-4">
                        <p>© 2023. Powered by Shopify</p>
                    </div>
                    <div class="col-md-4">
                        <img src="site/img/footer1.png" alt="payment">
                    </div>
                    <div class="col-md-4">
                        <a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>
                        <a href="https://www.youtube.com/"><i class="fa fa-youtube"></i></a>
                        <a href="https://www.twitter.com/"><i class="fa fa-twitter"></i></a>
                        <a href="https://www.instagram.com/"><i class="fa fa-instagram"></i></a>
                    </div>

                </div>
            </div>


        </div>


    </footer>



    <!-- Latest compiled and minified JS -->


    <script src="//code.jquery.com/jquery.js"></script>
    <script src="site/js/jquery.rateyo.min.js"></script>
    <script src="site/js/vendor/bootstrap.min.js"></script>
    <script src="site/js/owl.carousel.min.js"></script>
    <script src="site/js/isotope.pkgd.min.js"></script>
    <script src="site/js/main.js"></script>
    <script>
    $(document).ready(function() {
        $(".owl-carousel").owlCarousel({
            items: 5, // Số lượng sản phẩm trên mỗi hàng
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 3000,
            responsive: {
                0: {
                    items: 2 // 1 sản phẩm trên thiết bị có chiều rộng nhỏ hơn 576px
                },
                576: {
                    items: 4 // 2 sản phẩm trên thiết bị có chiều rộng từ 576px trở lên
                },
                768: {
                    items: 4 // 3 sản phẩm trên thiết bị có chiều rộng từ 768px trở lên
                },
                992: {
                    items: 6 // 4 sản phẩm trên thiết bị có chiều rộng từ 992px trở lên
                }
            }
        });
    });
    </script>
    <script>
    $(document).ready(function() {
        var $grid; // Định nghĩa biến $grid trong phạm vi toàn cục

        // Khởi tạo Isotope sau khi trang đã load
        $(window).on('load', function() {
            $grid = $(".grid").isotope({
                itemSelector: ".all",
                percentPosition: false,
                masonry: {
                    columnWidth: ".all"
                }
            });
        });

        // Thêm event listener cho class '.list'
        $('.list').click(function() {
            const pro = $(this).attr('data-filter');
            if (pro == 'all') {
                $('.item').show('1000');
            } else {
                $('.item').not('.' + pro).hide('1000');
                $('.item').filter('.' + pro).show('1000');
            }
        });

        // Thêm event listener cho class '.filters_menu li'
        $('.filters_menu li').click(function() {
            $('.filters_menu li').removeClass('active');
            $(this).addClass('active');

            var data = $(this).attr('data-filter');
            $grid.isotope({
                filter: data
            });
        });
    });
    
    // Tạo event listener cho '.toggle'
    $(function() {
        $(".toggle").on("click", function() {
            if ($(".nav").hasClass("active")) {
                $(".nav").removeClass("active");
            } else {
                $(".nav").addClass("active");
            }
        });
    });

    // Tạo event listener cho '.pro-qty'
    (function($) {
        var proQty = $('.pro-qty');
        proQty.prepend('<span class="dec qtybtn">-</span>');
        proQty.append('<span class="inc qtybtn">+</span>');
        proQty.on('click', '.qtybtn', function() {
            var $button = $(this);
            var oldValue = $button.parent().find('input').val();
            if ($button.hasClass('inc')) {
                var newVal = parseFloat(oldValue) + 1;
            } else {
                // Không cho phép giảm xuống dưới 0
                if (oldValue > 0) {
                    var newVal = parseFloat(oldValue) - 1;
                } else {
                    newVal = 0;
                }
            }
            $button.parent().find('input').val(newVal);
        });
    })(jQuery);
    </script>
    @yield('js')
</body>

</html>