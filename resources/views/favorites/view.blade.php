@extends('layouts.site')
@section('content')
<div class="bannershop">
    <h1>Your Favorite</h1>
    <div class="banner-bg"></div>

</div>

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
                            <a href="{{ route('favorites.remove', $item->id)}}" class="btn text-dark"
                               >&times;</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>



    </div>
</div>

@stop