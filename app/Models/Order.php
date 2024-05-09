<?php

// App\Models\Order.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'total_price',
        'delivery_type',
        'delivery_charge',
        'is_submitted',  // Ensure this is listed if you are using $fillable
    ];
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
