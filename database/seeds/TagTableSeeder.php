<?php

use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        App\Tag::create([
            'name'=>'kpop',
        ]);
        App\Tag::create([
            'name'=>'tagalog',
        ]);
        App\Tag::create([
            'name'=>'english',
        ]);
        App\Tag::create([
            'name'=>'marvel',
        ]);
        App\Tag::create([
            'name'=>'millenials',
        ]);
        App\Tag::create([
            'name'=>'Christmas',
        ]);
        App\Tag::create([
            'name'=>'funny',
        ]);
    }
}
