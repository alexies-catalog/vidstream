<?php

use App\Appearance;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['prefix'=>''],function(){
    Route::get('/','Client\HomeController@index')->name('client-home');
    Route::get('/films','Client\FilmsController@showallquery')->name('client-films');
    Route::get('/films/{film}','Client\FilmsController@show')->name('client-films-show');
    Route::get('/filmData','Client\FilmsController@getFilmData')->name('film-data');
    Route::get('/alumni-members','Client\AlumniMembersController@index')->name('client-alumni-members');
    Route::get('/catalog','Client\CatalogController@index')->name('client-catalog');
    Route::get('/catalogData','Client\CatalogController@getCatalogData')->name('catalog-data');
    // Route::get('/upcoming-events','Client\EventsController@displayUpcoming')->name('client-upcoming-events');
    // Route::get('/past-events','Client\EventsController@displayPast')->name('client-past-events');
    Route::get('/about-us','Client\AboutUsController@index')->name('client-about-us');
    
    Route::get('/aboutFilm','Client\FilmsController@aboutFilm')->name('client-about-film');
    // Route::get('/actors','Client\ActorsController@index')->name('client-actors');
    // Route::get('/actorData','Client\ActorsController@getCastData')->name('cast-data');
    // Route::get('/directors','Client\DirectorsController@index')->name('client-directors');
    // Route::get('/directorData','Client\DirectorsController@getDirectorData')->name('director-data');
    Route::get('/members','Client\ProducersController@index')->name('client-producers');
    Route::get('/producerData','Client\ProducersController@getProducerData')->name('producer-data');
    Route::get('/members/{member}','Client\ProducersController@show')->name('client-member-show');
    Route::get('/singlefilmmember','Client\ProducersController@getsinglefilmmember');
    
    // Route::get('/upcoming_events', 'Client\EventsController@displayUpcoming')->name('client-upcoming-events');
    // Route::get('/past_events', 'Client\EventsController@displayPast')->name('client-past-events');
    
    Route::get('/cameras','Client\EquipsController@dispCam')->name('client-cameras');
    Route::get('/microphones','Client\EquipsController@dispMic')->name('client-microphones');
    Route::get('/props','Client\EquipsController@dispProps')->name('client-props');  

    // Route::get('/events','Client\EventsController@displayPast')->name('client-past-events');
    

    Route::get('contact-us', 'Client\ContactusformController@contactUS')->name('client-contact-us');
    Route::post('contact-us', ['as'=>'contactus.store','uses'=>'Client\ContactusformController@contactUSPost']);

    Route::get('/events', 'admin\EventController@index_client')->name('client_events');
    Route::get('/events/{event}','admin\EventController@show')->name('client-event-show');

    Route::get('/workshops', 'admin\WorkshopController@index_client')->name('client-workshops');
    Route::get('/getWorkshops', 'admin\WorkshopController@getData');
    Route::get('/workshops/{workshop}','admin\WorkshopController@show')->name('client-workshop-show');
    Route::post('/workshops/{slug}/send','admin\WorkshopController@sendComment')->name('client-workshop-send');

});



Route::get('/aboutEvent', function () {
    return view('client/eventDetails');
})->name('client-about-event');

// Route::get('/workshops', function () {
//     return view('client/workshops');
// })->name('client-workshops');


Route::get('/direct', function () {
    return view('client/directors');
})->name('members-single');

Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', 'Client/HomeController@index')->name('home');
// Route::get('/genre/list', 'GenreController@list');

// Route::middleware(['auth'])->group(function () {
Route::group(['namespace' => 'admin' , 'prefix' => 'admin',  'middleware' => 'web'], function(){    
// Route::group(['namespace' => 'admin' , 'prefix' => 'admin'], function(){    

    Route::delete('/delete/genre','GenreController@bulk')->name('genre-bulk');
    Route::resource('films/genre', 'GenreController');
    Route::resource('still', 'StillController');

    Route::delete('/delete/category','CategoryController@bulk')->name('cat-bulk');
    Route::resource('films/category', 'CategoryController');

    Route::delete('/delete/tag','TagController@bulk')->name('tag-bulk');
    Route::resource('films/tag', 'TagController');

    Route::delete('/delete/equipment','EquipmentController@bulk')->name('equip-bulk');
    Route::resource('equipment', 'EquipmentController');

    Route::delete('/delete/producer','ProducerController@bulk')->name('prod-bulk');
    Route::resource('producer', 'ProducerController');

    Route::delete('/delete/director','DirectorController@bulk')->name('direct-bulk');
    Route::resource('director', 'DirectorController');

    Route::delete('/delete/cast','CastController@bulk')->name('cast-bulk');
    Route::resource('cast', 'CastController');

    Route::get('/','DashboardController@index');
    Route::get('/dashboard','DashboardController@index')->name('admin-dashboard');
    Route::get('/contact-us', 'DashboardController@getMessages')->name('admin-contactus');
    Route::resource('appearance', 'AppearanceController');

    Route::resource('/member','MemberController');
    Route::delete('/delete/member','MemberController@bulk')->name('member-bulk');

    Route::get('/profession', 'MemberController@dp')->name('admin-profession');
    
    Route::delete('/delete/film','FilmController@bulk')->name('film-bulk');
    Route::resource('/film', 'FilmController');
    Route::get('/crewprofession', 'FilmController@getCrewProfession');
    Route::get('/getmembers', 'FilmController@getCrewMembers');

    Route::resource('events', 'EventController');

    Route::resource('workshops', 'WorkshopController');
    Route::delete('/delete/workshop','WorkshopController@bulk')->name('workshop-bulk');
});


  
// Route::group(['prefix'=>''],function(){
//     Route::get('/', function () {
//         return view('welcome');
//     });
// });
 //




    //Test Route
    Route::get('/test',function(){
        return view('test');
    });
    // Route::get('/test/events','EventController@index');

    

    Route::get('/test1',function(){
        return view('/sample/test1');
    })->name('totest1');


    Route::post('process', function (Request $request) {
        // cache the file\

        $validation = $request->validate([
            'logo' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048'
            // for multiple file uploads
            // 'photo.*' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048'
        ]);

        $file = $request->file('logo');
    
        // generate a new filename. getClientOriginalExtension() for the file extension
        $filename = 'logo-' . time() . '.' . $file->getClientOriginalExtension();
    
        // save to storage/app/photos as the new $filename
        $path = $file->storeAs('photos', $filename);
    

        //save in database the name
        Appearance::where('name','logo_url')->update([
            'content'=>$filename,
        ]);

    });
// Route::get('/equipments',function(){
//  return   view('genre.equipment');
// });


