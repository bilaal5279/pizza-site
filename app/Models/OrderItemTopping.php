<?php

// App\Models\OrderItemTopping.php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderItemTopping extends Pivot
{
    protected $fillable = ['order_item_id', 'topping_id', 'added_price'];
}
