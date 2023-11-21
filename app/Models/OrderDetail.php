<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class OrderDetail extends Model
{
    use HasFactory;

    protected $table = 'order_detail';

    protected $fillable = ['order_id', 'product_id', 'price', 'quantity','customer_id'];

    public function product(){
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
    public function customer(){
        return $this->hasOne(Customer::class, 'id', 'customer_id');
    }
    public static function calculateTotal()
    {
        return static::selectRaw('MONTH(created_at) as month, SUM(price * quantity) as total')
            ->where('status', '=', 1)
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->get();
    }
}
