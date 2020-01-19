<?php

use Illuminate\Database\Seeder;

class ProductIngredientsTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\ProductIngredient::class, rand(1, 15))->create();
    }
}
