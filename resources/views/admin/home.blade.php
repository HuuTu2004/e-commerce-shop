@extends('layouts.main')
@section('title','Trang Chủ')

@section('content')
<div class="box-body">
    
@if(Session::has('success'))
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    {{session::get('success')}}
</div>
@endif
</div>

<div class="jumbotron">
        <div class="container">
            <h1>Hello, world!</h1>
            <p>Contents ...</p>
            <p>
                <a class="btn btn-primary btn-lg">Learn more</a>
            </p>
        </div>
</div>
    

@stop