<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizeSeeder extends Seeder
{
    public function run()
    {
        $sizes = [
            // Sizes for Margherita Pizza
            ['pizza_id' => 1, 'size' => 'Small', 'price' => 8.00],
            ['pizza_id' => 1, 'size' => 'Medium', 'price' => 9.00],
            ['pizza_id' => 1, 'size' => 'Large', 'price' => 12.00],

            // Sizes for Gimme the Meat Pizza
            ['pizza_id' => 2, 'size' => 'Small', 'price' => 11.00],
            ['pizza_id' => 2, 'size' => 'Medium', 'price' => 14.50],
            ['pizza_id' => 2, 'size' => 'Large', 'price' => 16.50],

            // Sizes for Veggie Delight Pizza
            ['pizza_id' => 3, 'size' => 'Small', 'price' => 10.00],
            ['pizza_id' => 3, 'size' => 'Medium', 'price' => 13.00],
            ['pizza_id' => 3, 'size' => 'Large', 'price' => 15.00],

            // Sizes for Make Mine Hot Pizza
            ['pizza_id' => 4, 'size' => 'Small', 'price' => 11.00],
            ['pizza_id' => 4, 'size' => 'Medium', 'price' => 13.00],
            ['pizza_id' => 4, 'size' => 'Large', 'price' => 15.00],
        ];

        DB::table('sizes')->insert($sizes);
    }
}
