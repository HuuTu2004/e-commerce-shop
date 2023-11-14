@extends('layouts.main')
@section('title','Quản lý flashsale')

@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="box-body">
            <h3>Quản lý thời gian sale</h3>
            <form action="{{ route('flash-sales.update',1) }}" method="POST" id="myForm">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="hour">Giờ:</label>
                    <input type="number"  class="form-control" name="hour" id="hour" value="0">
                    @error('hour')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="minute">Phút:</label>
                    <input type="number"  class="form-control" name="minute" id="minute"  value="0">
                    @error('minute')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="second">Giây:</label>
                    <input type="number"  class="form-control" name="second" id="second" value="0" >
                    @error('second')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>

                <button type="submit">Thêm Flash Sale</button>
            </form>

        </div>
    </div>
    <div class="col-md-9">
        
        <table class="table table-hover">
        <h3>Thời gian đang sale</h3>
            <thead>
                <tr>
                    <th>Giờ </th>
                    <th>Phút</th>
                    <th>Giây</th>
                    <th></th>
                    
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$time->hour}}</td>
                    <td>{{$time->minute}}</td>
                    <td>{{$time->second}}</td>
                    
                </tr>
            </tbody>
        </table>
        
    </div>
    <div class="col-md-12">
        <div class="box-body">
            <h3>Sản phẩm đang được sale</h3>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Sale Price</th>
                        <th>Status</th>
                        <th>Category Name</th>
                        <th>Image</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($product as $prd)
                    <tr>
                        <td>{{$prd->id}}</td>
                        <td>{{$prd->name}}</td>
                        @if($prd->sale_price > 0)
                        <td style="text-decoration: line-through;">{{$prd->price}}</td>
                        <td>{{$prd->sale_price}}</td>
                        @else
                        <td>{{$prd-> price}}</td>
                        <td></td>
                        @endif
                        <td>{{$prd->status == 1 ? 'Full' : 'Empty'}}</td>
                        <td>{{$prd->cat->name}}</td>
                        <td>
                            <img src="{{asset('assets')}}/{{$prd->image}}" width="60">
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@stop

@section('js')
@if($isTimeGreaterThanZero)
<script>
var hours = {{$time->hour}};
var minutes = {{$time->minute}};
var seconds = {{$time->second}};
var totalSeconds = hours * 3600 + minutes * 60 + seconds;

var formSubmitted = false;

setTimeout(function () {
    if (!formSubmitted) {
        formSubmitted = true; // Đánh dấu biểu mẫu đã được gửi
        document.getElementById("myForm").submit();
    }
}, totalSeconds * 1000);
</script>
@endif
@stop