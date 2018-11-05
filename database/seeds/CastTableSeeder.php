<?php

use App\Cast;
use Illuminate\Database\Seeder;

class CastTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Cast::class,10)->create();
    }
}
