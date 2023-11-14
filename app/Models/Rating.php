<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $table = 'ratings';

    protected $fillable = ['customer_id', 'product_id','rateStar'];
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    public function product(){
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
  
}
