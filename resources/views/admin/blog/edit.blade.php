@extends('layouts.main')
@section('content')

<form action="{{ route('admin.product.update', $product->id)}}" method="POST" role="form" enctype="multipart/form-data">
    @csrf @method('PUT')
    <legend>Update Product : {{$product->name}}</legend>

    <div class="form-group">
        <label for="">Name</label>
        <input type="text" class="form-control" value="{{$product->name}}" name="name" placeholder="Input field">
        @error('name')
        <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Price</label>
        <input type="text" class="form-control" value="{{$product->price}}" name="price" placeholder="Input field">
        @error('price')
        <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Sale Price</label>
        <input type="text" class="form-control" value="{{$product->sale_price}}" name="sale_price"
            placeholder="Input field">
    </div>
    <div class="form-group">
        <label for="">Status</label>

        <div class="radio">
            @if($product->status == 1)
            <label>
                <input type="radio" name="status" id="input" value="1" checked="checked">
                Full
            </label>
            <label>
                <input type="radio" name="status" id="input" value="0">
                Empty
            </label>
            @else
            <label>
                <input type="radio" name="status" id="input" value="1">
                Full
            </label>
            <label>
                <input type="radio" name="status" id="input" value="0" checked="checked">
                Empty
            </label>
            @endif
        </div>

    </div>
    <div class="form-group">
        <label for="">Category Id</label>

        <select name="category_id" id="input" class="form-control">
            <option value="">Chose Category</option>
            @foreach($category as $cat)
            <option value="{{$cat->id}}" {{$cat->id == $product->category_id ? 'selected' : ''}}>{{$cat->name}}</option>
            @endforeach
        </select>
        @error('category_id')
        <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Image</label>
        <input type="file" class="form-control" name="image" placeholder="Input field">
        <img src="{{asset('assets')}}/{{$product->image}}" width="200">
    </div>
    <div class="form-group">
        <label for="">Description</label>
        <textarea name="description" id="input" class="form-control" rows="3">{{$product->description}}</textarea>
    </div>



    <button type="submit" class="btn btn-success">Save</button>
    <a href="{{ route('admin.product.list')}}" class="btn btn-primary">List</a>
</form>

@stop