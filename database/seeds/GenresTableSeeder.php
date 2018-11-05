<?php

use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        App\Genre::create([
            'name'=>'Action'
        ]);
        App\Genre::create([
            'name'=>'Adventure'
        ]);
        App\Genre::create([
            'name'=>'Comedy'
        ]);
        App\Genre::create([
            'name'=>'Drama'
        ]);
        App\Genre::create([
            'name'=>'Horror'
        ]);
        App\Genre::create([
            'name'=>'Fantasy'
        ]);
        App\Genre::create([
            'name'=>'Sci-fi'
        ]);
        App\Genre::create([
            'name'=>'Romance'
        ]);
    }
}
