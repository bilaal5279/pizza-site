<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PizzaSeeder extends Seeder
{
    public function run()
    {
        $pizzas = [
            ['name' => 'Margherita', 'description' => 'Cheese, tomato sauce'],
            ['name' => 'Gimme the Meat', 'description' => 'Pepperoni, ham, chicken, minced beef, sausage, bacon'],
            ['name' => 'Veggie Delight', 'description' => 'Onions, green peppers, mushrooms, sweetcorn'],
            ['name' => 'Make Mine Hot', 'description' => 'Chicken, onions, green peppers, jalapeno peppers']
        ];

        DB::table('pizzas')->insert($pizzas);
    }
}
