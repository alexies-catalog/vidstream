<?php

use App\Tag;
use App\Cast;
use App\Genre;
use App\Category;
use App\Director;
use App\Producer;
use Faker\Generator as Faker;

$factory->define(App\Film::class, function (Faker $faker) {
    
    // $director = Director::pluck('id')->all();
    // $producer = Producer::pluck('id')->all();
    // $genre = Genre::pluck('id')->all();
    // $category = Category::pluck('id')->all();
    // $tag = Tag::pluck('id')->all();
    // $cast = Cast::pluck('id')->all();

    return [
        //
        // 'title'=>$faker->name;
        'title'=>$faker->name,
        // 'tag_id'=>$faker->randomElement($tag),
        // 'director_id'=>$faker->randomElement($director),
        // 'producer_id'=>$faker->randomElement($producer),
        // 'genre_id'=>$faker->randomElement($genre),
        // 'tag_id'=>$faker->randomElement($tag),
        // 'cast_id'=>$faker->randomElement($cast),
        // 'category_id'=>$faker->randomElement($category),
        'runningtime'=>$faker->time($format = 'H:i:s', $max =10800 ),
        'yearfinish'=>$faker->year($max = 'now', $min=1970), 
        // 'rating'=>$faker->numberBetween($min = 1, $max = 5),
        'award'=>$faker->sentence($nbWords = 6, $variableNbWords = true),
        'photo'=>$faker->numberBetween($min = 1, $max = 25),
        'views'=>$faker->numberBetween($min = 1, $max = 1000000),
        'youtube_url'=> $faker->randomElement([
            'https://www.youtube.com/embed/1Q8fG0TtVAY', 
            'https://www.youtube.com/embed/w0qQkSuWOS8', 
            'https://www.youtube.com/embed/44LdLqgOpjo', 
            'https://www.youtube.com/embed/gbug3zTm3Ws', 
            'https://www.youtube.com/embed/e3Nl_TCQXuw', 
            'https://www.youtube.com/embed/NxhEZG0k9_w']),
        'synopsis'=>$faker->paragraphs($nb = 3, $asText = true),
    ];
});
