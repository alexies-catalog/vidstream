<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(GenresTableSeeder::class);
        $this->call(AppearanceTableSeeder::class);
        $this->call(TagTableSeeder::class);
        // $this->call(ProducersTableSeeder::class);
        $this->call(equipmentsTableSeeder::class);
        // $this->call(DirectorTableSeeder::class);
        // $this->call(CastTableSeeder::class);
        // $this->call(FilmsTableSeeder::class);
        $this->call(ProfessionTableSeeder::class);
    }
}
