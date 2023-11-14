@extends('layouts.main')
@section('content')

<div class="row">
    <div class="col-md-12">

        <div class="box-body">
        <form action="{{ route('admin.category.update', $category->id)}}" method="POST" role="form">
            @csrf @method('PUT')
            <legend>Update Category : {{$category->name}}</legend>

            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" value="{{$category->name}}" name="name"
                    placeholder="Input field">
                @error('name')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>



            <button type="submit" class="btn btn-success">Save</button>
        </form>
        </div>

    </div>
    @stop