@extends('layouts.site')
@section('content')

<div class="bannershop">
    <h1>Our Product</h1>
    <div class="banner-bg"></div>

</div>


<div class="container product text-center" id="menu">

    <form action="" method="get" class="form-inline" role="form" >

        <div class="form-group">
            @csrf

            <input type="text" class="form-control" name="key" placeholder="Input Search Product" >

        </div>



        <button type="submit" class="btn btn-success" href="#pro"><i class="fa fa-search"></i></button>
    </form>

    <br>


    <div class="container prod">
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
                <div class="modal fade" id="{{$prd->id}}">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <!-- <a href="" class="ml-3" style="font-size: xx-large; color: red;"><i
                                                    class="fa fa-heart-o"></i>
                                            </a> -->
                                <h3 class="modal-title">
                                    <p> Thông tin chi tiết sản phẩm</p>
                                </h3>
                                <button type="button" class="btn btn-default" data-dismiss="modal"><i
                                        class="fa fa-times" aria-hidden="true"></i></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="image">
                                            <img src="assets/{{$prd->image}}">
                                        </div>
                                        <br>

                                    </div>
                                    <div class="col-md-5">
                                        <h3 class="pt-2 py-2">{{$prd->name}}</h3>
                                        <div class="product-detail-ratting pt-2 py-2">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                            <span class="text-danger">(18 reviews)</span>
                                        </div>
                                        <div class="product-detail-text mt-2 mb-4">
                                            ${{$prd->price}}
                                        </div>
                                        <p><span class="prd-text">Despcription</span> : Lorem, ipsum dolor sit amet
                                            consectetur adipisicing elit. Aliquid
                                            laboriosam commodi tempora veniam omnis, voluptas cum, impedit
                                            in tenetur sapiente ea voluptates provident quaerat, ratione
                                            quam autem dignissimos? Sint, provident!</p>
                                        <div class="btn-cart">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <input type="number" value="1" width="60px">
                                                </div>
                                                <div class="col-md-9">
                                                    <a href="" class="btn">ADD TO CART</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="prd-text">
                                    Information:
                                </div>
                                <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Pellentesque in
                                    ipsum id orci porta dapibus. Proin eget tortor risus. Vivamus suscipit tortor eget
                                    felis porttitor volutpat. Vestibulum ac diam sit amet quam vehicula elementum sed
                                    sit amet dui. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget
                                    felis porttitor volutpat. Curabitur arcu erat, accumsan id imperdiet et, porttitor
                                    at sem. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.
                                    Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum
                                    ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec
                                    velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Proin eget
                                    tortor risus.</p>
                            </div>

                        </div>
                    </div>
                </div>

                @endforeach
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous">
    </script>

    <script type="text/javascript">
    $(document).ready(function() {
        $('.list').click(function() {
            const pro = $(this).attr('data-filter');
            if (pro == 'all') {
                $('.item').show('1000');
            } else {
                $('.item').not('.' + pro).hide('1000');
                $('.item').filter('.' + pro).show('1000');
            }
        })

    })


    $(window).on('load', function() {
        $('.filters_menu li').click(function() {
            $('.filters_menu li').removeClass('active');
            $(this).addClass('active');

            var data = $(this).attr('data-filter');
            $grid.isotope({
                filter: data
            })
        });

        var $grid = $(".grid").isotope({
            itemSelector: ".all",
            percentPosition: false,
            masonry: {
                columnWidth: ".all"
            }
        })
    });
    </script>



</div>

@stop