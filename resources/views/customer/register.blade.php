@extends('layouts.site')
@section('content')
<div class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="login-box">
                    @if(Session::has('error'))
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{Session::get('error')}}
                    </div>
                    @endif
                    <div class="login-header text-center ">
                        <h2>Đăng Ký</h2>
                    </div>
                    <form action="" method="post" class="form_style1">
                        @csrf
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Input Name">
                            @error('name')
                            <span id="emailErr">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Input Email">
                            @error('email')
                            <span id="emailErr">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Input Password">
                            @error('password')
                            <span id="emailErr">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="text" class="form-control" name="phone" placeholder="Input Phone">
                            @error('phone')
                            <span id="emailErr">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" class="form-control" name="address" placeholder="Input Address">
                            @error('address')
                            <span id="emailErr">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="login_footer form-group">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="chek-form">
                                        <input type="checkbox" name="checkbox">
                                        <label>I accept the <a href="">Terms of use </a>& <a href=""> Privacy
                                                Policy</a>.</label>

                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-default btn-block">Register</button>
                        </div>
                    </form>
                    <div class="login-social text-center">
                        <h5>Or Loign with social network</h5>
                        <br>
                        <a href=""><i class="fa fa-facebook"></i></a>
                        <a href=""><i class="fa fa-youtube"></i></a>
                        <a href=""><i class="fa fa-twitter"></i></a>
                        <a href=""><i class="fa fa-instagram"></i></a>
                    </div>
                    <br>
                    <div class="text-center">Bạn đã có tài khoản? <a href="{{route ('customer.login')}}">Đăng nhập</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@stop