<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comment';

    protected $fillable = ['customer_id', 'product_id','comment'];
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    public function product(){
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
  
}
