<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade'); // Links back to the orders table
            $table->foreignId('pizza_id')->constrained()->onDelete('cascade'); // Links to the pizzas table
            $table->integer('quantity')->default(1); // Quantity of pizzas
            $table->decimal('price', 10, 2); // Price for this order item
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_items');
    }
};
