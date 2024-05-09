<?php

namespace Tests\Unit\Models;

use App\Models\Order;
use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
    /** @test */
    public function it_initializes_with_zero_total_price()
    {
        $order = new Order();
        $this->assertEquals(0, $order->total_price);
    }

    /** @test */
    public function it_can_add_to_total_price()
    {
        $order = new Order(['total_price' => 100]);
        $order->total_price += 50;  // Simulating adding to the order total
        $this->assertEquals(150, $order->total_price);
    }
}
