<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    public function list (){
        return view('admin.blog.list');
    }
    public function create(){
        return view('admin.blog.create');
    }
}
