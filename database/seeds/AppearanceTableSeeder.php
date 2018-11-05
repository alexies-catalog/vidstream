<?php

use Illuminate\Database\Seeder;

class AppearanceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        App\Appearance::create([
            'logo_url'=>'mfilogo.png',
            'about'=>"<p>Man Down debuted simultaneously on digital platforms in the U.K., meaning it was never going to be a big earner in theaters. But no one expected only one ticket sale. As of Tuesday, the Reel Cinema in Burnley was still carrying Man Down, which also stars Gary Oldman, Jai Courtney and Kate Mara.</p>
            <p>It's a somewhat surprising, but welcome move, given that Whedon has taken a long break to write something original, but has now pivoted to focus on developing the Batgirl project. First appearing in 1967 in Gardner Fox and Carmine Infantino's story run The Million Dollar Debut Of Batgirl, she's the superhero alias of Barbara Gordon, daughter of Gotham City Police Commissioner James Gordon. So we can likely expect J.K. Simmons' take on Gordon to appear along with other Bat-related characters.</p>
            <!--<p><img style='float: right;' src='/images/mfifeaturedimg.jpg' alt='' /></p>-->
            <p>Arterton is next set to play Vita Sackville-West in Vita and Virginia about her relationship with Virginia Woolf. She spoke to Variety about working with female directors, remarkable women, and why she shies away from the term &ldquo;strong female character.&rdquo;&nbsp;<br />I&rsquo;m friends with the producer who I worked with on Byzantium and he sent it to me. I read the book as well, which is fantastic. You&rsquo;re always looking for untold stories and many times they&rsquo;re women&rsquo;s stories. What surprised me is that it centers around a woman who&rsquo;s really quite timid. I guess she&rsquo;s allowed to be because all of the other characters.</p>
            <p>Based on Lissa Evans&rsquo; novel &ldquo;Their Finest Hour and a Half&rdquo; and directed by Lone Scherfig (&ldquo;An Education&rdquo;), the film is set in London during World War II when the British ministry was utilizing propaganda films to boost morale. Arterton plays Catrin Cole, a scriptwriter who is brought on to handle the women&rsquo;s dialogue &mdash; commonly referred to as &ldquo;the nausea.&rdquo; The film, opening this week, features an outstanding ensemble, including Bill Nighy as a washed-up actor and Sam Claflin as Catrin&rsquo;s fellow writer and sparring partner.</p>
            <p>In the film, LaBeouf stars as a war veteran suffering from PTSD following his return from Afghanistan. The indie project, reuniting the star with A Guide to Recognizing Your Saints director Dito Montile, made its world premiere at the 2016 Venice Film Festival before making making a stop at the Toronto International Film Festival.</p>",
            'fb_link'=>'https://facebook.com',
            'tw_link'=>'https://twitter.com',
            'insta_link'=>'https://instagram.com',
            'gmail_link'=>'https://google.com'
        ]);
    }
}
