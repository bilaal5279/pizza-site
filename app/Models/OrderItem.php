<?php
// App\Models\OrderItem.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    // Add 'size' to the fillable array
    protected $fillable = ['order_id', 'pizza_id', 'quantity', 'price', 'size'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function pizza()
    {
        return $this->belongsTo(Pizza::class);
    }

    public function toppings()
    {
        return $this->belongsToMany(Topping::class, 'order_item_toppings')
        ->using(OrderItemTopping::class)
        ->withPivot('added_price');
    }
}
