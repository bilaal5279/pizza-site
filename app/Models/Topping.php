<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topping extends Model
{
    protected $fillable = ['name']; 

    public function orderItems()
    {
        return $this->belongsToMany(OrderItem::class, 'order_item_toppings')
                    ->using(OrderItemTopping::class)
                    ->withPivot('added_price');
    }
}
