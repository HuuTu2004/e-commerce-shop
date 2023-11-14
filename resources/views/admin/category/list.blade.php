@extends('layouts.main')
@section('content')
<div class="row">

    <div class="col-md-4">
        <div class="box-body">
        <form action="" method="POST" role="form">
            @csrf
            <legend>Create Category</legend>

            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Input field">
                @error('name')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>



            <button type="submit" class="btn btn-success">Save</button>
        </form>
        </div>
        

    </div>
    <div class="col-md-8">
        <div class="box-body">
        <form method="GET" class="form-inline" role="form">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" name="key" placeholder="Search Name">
            </div>

            <button type="submit" class="btn btn-success">Search</button>
        </form>
        <br>

        <div class="table-responsive">
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
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($category as $cat)
                    <tr>
                        <td>{{$cat->id}}</td>
                        <td>{{$cat->name}}</td>
                        <td class="text-right">
                            <form action="{{ route('admin.category.destroy', $cat->id)}}" method="post">
                                @csrf @method('DELETE')
                                <a href="{{ route('admin.category.edit', $cat->id)}}"
                                    class="btn btn-sm btn-primary">Edit</a>
                                <button href="" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Ban co chac muon xoa danh muc ?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$category->links()}}

        </div>
        </div>
        
    </div>
</div>


@stop