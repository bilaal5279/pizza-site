<?php
// App\Models\OrderItem.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// Define the OrderItem model which extends Laravel's Eloquent Model class
class OrderItem extends Model
{
    /**
     * The attributes that are mass assignable.
     * This is a security feature of Eloquent which ensures only the listed fields can be bulk assigned.
     */
    protected $fillable = ['order_id', 'pizza_id', 'quantity', 'price', 'size'];

    /**
     * Define an inverse one-to-many relationship with Order.
     * Each OrderItem belongs to one Order.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Define an inverse one-to-many relationship with Pizza.
     * Each OrderItem belongs to one Pizza, which defines the pizza type of the order item.
     */
    public function pizza()
    {
        return $this->belongsTo(Pizza::class);
    }

    /**
     * Define a many-to-many relationship with Topping through a pivot table order_item_toppings.
     * This allows for accessing the toppings associated with this order item.
     * Also specify a pivot field 'added_price' that stores additional price for each topping.
     */
    public function toppings()
    {
        return $this->belongsToMany(Topping::class, 'order_item_toppings')
            ->using(OrderItemTopping::class) // Specify the pivot model to be used
            ->withPivot('added_price'); // Include the 'added_price' field from the pivot table
    }
}
