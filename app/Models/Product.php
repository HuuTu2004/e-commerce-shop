<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';

    protected $fillable = ['name', 'price','sale_price', 'status','category_id', 'image'];

    public function scopeSearch( $query){
        if($key = request() -> key){
            $query = $query->where('name','like','%' . $key . '%');
        }
        if($category_id = request() -> category_id){
            $query = $query->where('category_id', $category_id);
        }
        return  $query;
    }
    public function cat(){
        return $this->hasOne(Category::class,'id', 'category_id');
    }
}
