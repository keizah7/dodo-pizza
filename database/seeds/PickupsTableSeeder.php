<?php

use Illuminate\Database\Seeder;

class PickupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Pickup::class, rand(1, 5))->create();
    }
}
