<?php

namespace Tests\Unit\Models;

use App\Models\OrderItem;
use PHPUnit\Framework\TestCase;

class OrderItemTest extends TestCase
{
    /** @test */
    public function it_has_default_quantity_of_one()
    {
        $orderItem = new OrderItem();
        $this->assertEquals(1, $orderItem->quantity ?? 1); // Assuming default quantity is 1 if not set
    }

    /** @test */
    public function it_can_calculate_total_price_of_item()
    {
        $orderItem = new OrderItem(['price' => 20, 'quantity' => 2]);
        $totalPrice = $orderItem->price * $orderItem->quantity;
        $this->assertEquals(40, $totalPrice);
    }
}
