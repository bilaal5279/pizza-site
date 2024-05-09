<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    protected $fillable = ['name', 'description']; 

    public function toppings()
    {
        return $this->belongsToMany(Topping::class);
    }

    public function sizes()
    {
        return $this->hasMany(Size::class);
    }
}
