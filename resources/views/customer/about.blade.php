@extends('layouts.site')
@section('content')
<div class="bannershop">
    <h1>About Us</h1>
    <div class="banner-bg"></div>

</div>
<style>

</style>
<div class="counter-wrap">
    <div class="block-18 text-center">
        <div class="text">
            <strong class="number" id="counter">0</strong>
            <span>Happy Customers</span>
        </div>
    </div>
</div>
</div>
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

            <div class="item">
                <div class="card text-left">
                    <img class="card-img-top"
                        src="https://benhvienphusanhaiphong.vn/Images/news/2022/an-oi-co-dep-da-khong.jpg" alt="">
                    <div class="card-body">
                        <h4 class="card-title">Ổi Tứ Quý</h4>
                        <p class="card-text product-detail-text">40.000₫</p>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card text-left">
                    <img class="card-img-top"
                        src="https://benhvienphusanhaiphong.vn/Images/news/2022/an-oi-co-dep-da-khong.jpg" alt="">
                    <div class="card-body">
                        <h4 class="card-title">Ổi Tứ Quý</h4>
                        <p class="card-text product-detail-text">40.000₫</p>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card text-left">
                    <img class="card-img-top"
                        src="https://benhvienphusanhaiphong.vn/Images/news/2022/an-oi-co-dep-da-khong.jpg" alt="">
                    <div class="card-body">
                        <h4 class="card-title">Ổi Tứ Quý</h4>
                        <p class="card-text product-detail-text">40.000₫</p>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card text-left">
                    <img class="card-img-top"
                        src="https://benhvienphusanhaiphong.vn/Images/news/2022/an-oi-co-dep-da-khong.jpg" alt="">
                    <div class="card-body">
                        <h4 class="card-title">Ổi Tứ Quý</h4>
                        <p class="card-text product-detail-text">40.000₫</p>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card text-left">
                    <img class="card-img-top"
                        src="https://benhvienphusanhaiphong.vn/Images/news/2022/an-oi-co-dep-da-khong.jpg" alt="">
                    <div class="card-body">
                        <h4 class="card-title">Ổi Tứ Quý</h4>
                        <p class="card-text product-detail-text">40.000₫</p>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card text-left">
                    <img class="card-img-top"
                        src="https://benhvienphusanhaiphong.vn/Images/news/2022/an-oi-co-dep-da-khong.jpg" alt="">
                    <div class="card-body">
                        <h4 class="card-title">Ổi Tứ Quý</h4>
                        <p class="card-text product-detail-text">40.000₫</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
let count = 0;
const target = 1000; // Số cuối cùng bạn muốn chạy đến
const duration = 20000; // Thời gian chạy (2 giây)

const counterElement = document.getElementById('counter');

const updateCount = () => {
    const increment = target / (duration / 100);
    if (count < target) {
        count += increment;
        counterElement.textContent = Math.round(count);
        setTimeout(updateCount, 10);
    } else {
        counterElement.textContent = target;
    }
};

updateCount();
</script>

@stop