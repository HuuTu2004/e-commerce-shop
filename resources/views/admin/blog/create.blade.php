@extends('layouts.main')
@section('title','Thêm mới sản phẩm')

@section('content')
<div class="row">
    <form action="" method="POST" role="form" enctype="multipart/form-data">
        @csrf
        <div class="col-md-12">
            <div class="box-body">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Input field">
                    @error('title')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" id="input" class="form-control" rows="3"></textarea>
                    @error('description')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" class="form-control" name="image" placeholder="Input field">
                    @error('image')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">Save <i class="fa fa-save"></i></button>
            </div>
            
        </div>

        

    </form>

</div>

@stop