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
<div class="container">
    <div class="row">
        <div class="col-md-4 col-xs-6">
            <div class="shop">
                <div class="shop-img">
                    <img src="site/img/banner/banner-3.jpg" alt="">
                </div>
                <div class="shop-body">
                    <h3>Orange<br>Fruit</h3>
                    <a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-xs-6">
            <div class="shop">
                <div class="shop-img">
                    <img src="site/img/banner/banner-4.jpg" alt="">
                </div>
                <div class="shop-body">
                    <h3>Apple<br>Fruit</h3>
                    <a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-xs-6">
            <div class="shop">
                <div class="shop-img">
                    <img src="site/img/banner/banner-5.jpg" alt="">
                </div>
                <div class="shop-body">
                    <h3>Kiwi<br>Fruit</h3>
                    <a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- product -->
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
                            style="background-image: url(&quot;assets/{{$prd->image}}&quot;);background-size: 100% ;">
                            <ul class="featured__item__pic__hover">
                                @php
                                $existingFavorite = App\Models\Favorites::where('customer_id', auth('cus')->id())
                                ->where('product_id', $prd ->id)
                                ->first();
                                @endphp
                                @if($existingFavorite)
                                <li><a href="{{route('favorites.remove', $prd->id)}}"><i
                                            class="fa fa-heart text-danger"></i></a></li>
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

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="banner-product">
                <a href="">
                    <img src="site/img/banner/banner-1.jpg" alt="">
                </a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="banner-product">
                <a href="">
                    <img src="site/img/banner/banner-2.jpg" alt="">
                </a>
            </div>
        </div>
    </div>

</div>

<br>




<!-- new blog -->
<div class="container blog-box">
    <h1 class="text-center">New Blog </h1>
    <br>
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="blog-item">
                <div class="blog-img">
                    <img src="site/img/blog/blog-1.jpg" alt="">
                </div>
                <div class="blog-text">
                    <ul>
                        <li><i class="fa fa-calendar-o"></i> Nov 15,2023</li>
                        <li><i class="fa fa-comment-o"></i> 5</li>
                    </ul>
                    <h5><a href="#">Bí quyết bảo quản nho đen trong tủ lạnh tươi lâu hơn</a></h5>
                    <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="blog-item">
                <div class="blog-img">
                    <img src="site/img/blog/blog-2.jpg" alt="">
                </div>
                <div class="blog-text">
                    <ul>
                        <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                        <li><i class="fa fa-comment-o"></i> 5</li>
                    </ul>
                    <h5><a href="#">Cooking tips make cooking simple</a></h5>
                    <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="blog-item">
                <div class="blog-img">
                    <img src="site/img/blog/blog-3.jpg" alt="">
                </div>
                <div class="blog-text">
                    <ul>
                        <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                        <li><i class="fa fa-comment-o"></i> 5</li>
                    </ul>
                    <h5><a href="#">Cooking tips make cooking simple</a></h5>
                    <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                </div>
            </div>
        </div>

    </div>
</div>
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

@stop