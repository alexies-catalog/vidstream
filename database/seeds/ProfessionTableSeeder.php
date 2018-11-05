<?php

use Illuminate\Database\Seeder;

class ProfessionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        App\Profession::create([
            'name'=>'Actor',
            'main'=>'true'
        ]);
        App\Profession::create([
            'name'=>'Writer',
            'main'=>'true'
        ]);
        App\Profession::create([
            'name'=>'Director',
            'main'=>'true'
        ]);
        App\Profession::create([
            'name'=>'Producer',
            'main'=>'true'
        ]);
        App\Profession::create([
            'name'=>'Animator',
            'main'=>'false'
        ]);
        App\Profession::create([
            'name'=>'Assistant Director',
            'main'=>'false'
        ]);
        App\Profession::create([
            'name'=>'Cinematographer',
            'main'=>'false'
        ]);
        App\Profession::create([
            'name'=>'Graphic Designer',
            'main'=>'false'
        ]);
        App\Profession::create([
            'name'=>'Illustrator',
            'main'=>'false'
        ]);
        App\Profession::create([
            'name'=>'Music',
            'main'=>'false'
        ]);
        App\Profession::create([
            'name'=>'Photographer',
            'main'=>'false'
        ]);
        
        App\Profession::create([
            'name'=>'Editor',
            'main'=>'false'
        ]);
        App\Profession::create([
            'name'=>'Production Designer',
            'main'=>'false'
        ]);
        App\Profession::create([
            'name'=>'Production Manager',
            'main'=>'false'
        ]);
        App\Profession::create([
            'name'=>'Sound',
            'main'=>'false'
        ]);
        App\Profession::create([
            'name'=>'Visual Artist',
            'main'=>'false'
        ]);
    }
}
