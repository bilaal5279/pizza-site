<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $fillable = ['pizza_id', 'size', 'price']; // Fillable fields for mass assignment

    public function pizza()
    {
        return $this->belongsTo(Pizza::class);
    }
}
