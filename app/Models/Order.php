<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';

    protected $fillable = ['name', 'email', 'phone', 'address', 'note', 'token', 'customer_id'];


    public function detail(){
        return $this->hasMany(OrderDetail::class, 'order_id', 'id');
    }


    public function getTotal() {
        $t = 0;

        foreach ($this->detail as $det){
            $t = $det -> quantity * $det -> price;
        }
        return $t;
    }

}
