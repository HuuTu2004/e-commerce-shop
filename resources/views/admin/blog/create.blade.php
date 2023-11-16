@extends('layouts.main')
@section('title','Thêm mới sản phẩm')

@section('content')
<div class="row">
    <form action="" method="POST" role="form" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">
            <div class="box-body">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Input field">
                    @error('name')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Price</label>
                    <input type="text" class="form-control" name="price" placeholder="Input field">
                    @error('price')
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

            </div>
        </div>

        <div class="col-md-6">
            <div class="box-body">
                <div class="form-group">
                    <label for="">Sale Price</label>
                    <input type="text" class="form-control" name="sale_price" placeholder="Input field">
                </div>
                <div class="form-group">
                    <label for="">Status</label>

                    <div class="radio">
                        <label>
                            <input type="radio" name="status" id="input" value="1" checked="checked">
                            Full
                        </label>
                        <label>
                            <input type="radio" name="status" id="input" value="0">
                            Empty
                        </label>
                    </div>

                </div>
                <div class="form-group">
                    <label for="">Category Id</label>

                    <select name="category_id" id="input" class="form-control">
                        <option value="">Chose Category</option>
                        @foreach($category as $cat)
                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    </select>
                    @error('category_id')
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
                <a href="{{ route('admin.product.list')}}" class="btn btn-primary">List</a>

            </div>
        </div>

    </form>

</div>

@stop