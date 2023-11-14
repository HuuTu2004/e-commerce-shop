@extends('layouts.main')
@section('content')
<div class="box-body">
 
<div class="table-responsive">

    <form action="" method="GET" class="form-inline" role="form">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" name="key" placeholder="Input field">
        </div>

        <button type="submit" class="btn btn-success"> Search</button>
    </form>
    <br>
    @if(session()->has('ok'))
    <div class="alert alert-success">{{session()->get('ok')}}</div>
    @endif
    @if(session()->has('sua'))
    <div class="alert alert-success">{{session()->get('sua')}}</div>
    @endif
    @if(session()->has('xoa'))
    <div class="alert alert-danger">{{session()->get('xoa')}}</div>
    @endif
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
                <td>

                    <form action="{{ route('admin.product.destroy', $prd->id)}}" method="POST" role="form">
                        @csrf @method('DELETE')


                        <a href="{{ route('admin.product.edit', $prd->id)}}" class="btn btn-primary">Edit</a>
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Ban co chac muon xoa san pham ?')">Delete</button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$product->links()}}
</div>
</div>

@stop