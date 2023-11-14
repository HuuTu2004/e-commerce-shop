@extends('layouts.site')
@section('content')

<div class="section">
    
        <div class="container">
            
            
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <div class="login-box">
                        <div class="login-header text-center ">
                            <h2>Đăng Nhập</h2>
            @if(Session::has('error'))                
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{Session::get('error')}}
            </div>
            @endif 
                        </div>
                        <form action="" method="post" name="login" id="loginForm">
                        @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" placeholder="Email">
                               @error('email')
                               <span id="emailErr">{{$message}}</span>
                               @enderror
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="password" name="password" placeholder="Password">
                                @error('password')
                               <span id="passErr">{{$message}}</span>
                               @enderror
                            </div>
                            <div class="login_footer form-group">
                                <div class="row">
                                    <div class="col-md-7"><a href="#">Forgot password?</a></div>
                                    <div class="col-md-5">
                                        <div class="chek-form">
                                            <input type="checkbox" name="checkbox">
                                            <label>Remember me</label>

                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default btn-block">Login</button>
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
                        <div class="text-center">Bạn chưa có tài khoản? <a href="{{route('customer.register')}}">Đăng ký</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop