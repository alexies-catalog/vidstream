<?php

use App\Director;
use Illuminate\Database\Seeder;

class DirectorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

App\Director::create([
'id'=>'1',
'name'=>'Raymond Red',
// 'awards'=>["2000 Palme d'Or","2010 Gawad Urian Award", "2009 Tokyo Grand Prix"],
'awards'=>["2000 Palme d'Or","2010 Gawad Urian Award", "2009 Tokyo Grand Prix"],
'about'=>
'Born: 1965 (age 53 years), Quezon CitySpouse: Sheila Nicolas
Children: Mikhail Red 
He studied painting and photography at the Philippine High School for the Arts. He furthered his studies at the UP Film Centre, debuting his first short film on Super-8 in 1992.',
'halloffame'=>'test.com' ,
'profilepic'=>'1.jpg',
]);

App\Director::create([
'id'=>'2',
'name'=>'Roxlee',
// 'awards'=>["2000 Palme d'Or","2010 Gawad Urian Award", "2009 Tokyo Grand Prix"],
'awards'=>["2010 - Lifetime Achievement Award - Animahenasyon - Animation Council of the Philippines Incorporated (ACPI)","2008 - a Tribute at .MOV Digital Film Festival","2006 - Daluyan Awardee (progressive leaders and pioneers in the independent film community in the Philippines) - Philippine Independent Filmmakers' Multi-purpose Cooperative (IFC) and Robinsons Galleria Movieworld ",
"Juan Gapang - Best Experimental Short Film - Gawad Urian Awards","1988 - Best Student Film - Film Academy of the Philippines",
"1987 to 1992 - Annually won at Gawad CCP (Cultural Center of the Phils.' Short Film Contest)","1986 - Honorable Mention - Experimental Short Film - Kelibia Short Film Festival, Tunisia",
"1982 to 1985 - Annually won at Experimental Cinema of the Phils. (ECP)"],
'about'=>'',
'halloffame'=>'test.com' ,
'profilepic'=>'2.jpg',
]);

App\Director::create([
'id'=>'3',
'name'=>'Nick Deocampo',
'awards'=>["Ten Outstanding Young Men of the Philippines in 1992.","One of the Ten Outstanding Young Persons of the World in 1993", "Lifetime Achievement Award from the Filipino Academy of Movie Arts and Sciences Awards (FAMAS)","Lamberto Avellana Award from the Film Academy of the Philippines"],
'about'=>
'Born: 1959, Mina, Iloilo
Multi-awarded Filipino filmmaker, film historian, film literacy advocate, film producer, author and the director of the Center for New Cinema, and currently an Associate Professor at the U.P. Film Institute College of Mass Communication at U.P. Diliman
Graduated cum laude with a bachelors degree in Theater Arts at the University of the Philippines (UP) in 1981
Under a Fulbright Scholarship Grant, Deocampo earned his Master of Arts degree in Cinema Studies at the New York University in 1989',
'halloffame'=>'' ,
'profilepic'=>'',
]);


        // factory(Director::class,5)->create();
    }
}
