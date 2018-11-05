<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        App\Category::create([
            'name'=>'Animation'
        ]);
        App\Category::create([
            'name'=>'Documentary'
        ]);
        App\Category::create([
            'name'=>'Features & Experimental'
        ]);
    }
}
