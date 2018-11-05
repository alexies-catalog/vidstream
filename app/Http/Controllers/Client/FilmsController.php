<?php

namespace App\Http\Controllers\Client;

use App\Film;
use App\Genre;
use App\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FilmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('client.allFilms');
    }

    public function showallquery(Request $request)
    {
        // $search = $request->get('search');
        // $genre = $request->get('genre');
        // $director = $request->get('director');
        // $cast = $request->get('cast');
        // return $director;
        // return $genre;
        // $projects =$projects->orderBy($field, $sort)->where('title', 'like', '%' . $search . '%')->paginate(4)->withPath('$search='.$search.'$sort='.$sort);
        // $films =$films->where('title', 'like', '%' . $search . '%');

        //->with('films',Film::where('title', 'LIKE', '%'.$search.'%')->where('genre_id', 'LIKE', '%'.$genre.'%')->where('director_id', 'LIKE', '%2%')->get());

        // return view('client.allFilms')
        //             ->with('films',Film::all())
        //             ->with('genres',Genre::all())
        //             ->with('directors',Director::all())
        //             ->with('casts',Cast::all())
        //             ->with('films',Film::where('title', 'LIKE', '%'.$search.'%')
        //             ->where('genre_id', 'LIKE', '%'.$genre.'%')
        //             ->where('director_id', 'LIKE', '%'.$director.'%')
        //             ->where('cast_id', 'LIKE', '%'.$cast.'%')->orderBy('views', 'DESC')->get());
   
        // dd($films);
        return view('client.allFilms');
    }

    public function getFilmData(Request $request){
        $draw = $request->input('draw');
        $search = $request->input('search');
        $director = $request->input('searchD');
        $cast = $request->input('searchC');
        $genre = $request->input('searchG');
        $field = $request->input('field');
        $data = $request->input('data');
        if ( !empty ( $draw ) ) {
            $query = Film::with('members', 'genres', 'tags');
            // dd($query);
            if ($search) {
                $query->where(function($query) use ($search) {
                    $query->where('title', 'like', '%' . $search . '%');
                });
            }

            if($genre){
                $query->where(function($query) use ($genre) {
                    $query->whereHas('genres', function($q) use ($genre){
                        $q->where('name', 'like', '%' . $genre . '%');
                    });
                });
            }
            if($director){
                $query->where(function($query) use ($director) {
                    $query->whereHas('members', function($q) use ($director){
                        $q->where('name', 'like', '%' . $director . '%');
                    });
                });
            }
            if($cast){
                $query->where(function($query) use ($cast) {
                    $query->whereHas('members', function($q) use ($cast){
                        $q->where('name', 'like', '%' . $cast . '%');
                    });
                });
            }
            $catalog = $query->paginate(16);
            $genre = Genre::all();
            $direct = Member::with('professions')->whereHas('professions', function($direct){
                $direct->where('slug', 'director');
            });
            $direct = $direct->get();

            $c = Member::with('professions')->whereHas('professions', function($c) {
                $c->where('slug', 'director');
            });
            $c = $c->get();

            // print_r($catalog);
            return ['data' => $catalog, 'draw' => $draw, 'genre' => $genre, 'director' => $direct, 'cast' => $c];
        }

        return abort(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function aboutFilm(){
        return view('client.aboutFilm');
     }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   $genres = [];
        $cats = [];
        $tags = [];
        $film = Film::with('members', 'genres', 'categories', 'tags')->where('slug', $id)->first();
        if($film !=null){
            foreach ($film->genres as $genre) {
                array_push($genres, $genre->name);
            }
            foreach ($film->categories as $cat) {
                array_push($cats, $cat->name);
            }
            foreach ($film->tags as $tag) {
                array_push($tags, $tag->name);
            }
            // echo $film->id;
            $relatedfilms = Film::with('members','genres')->whereNotIn('id',[$film->id])
                                ->where(function($query) use ($genres, $cats, $tags) {
                                    $query->whereHas('genres', function($q) use ($genres){
                                        $q->whereIn('name', $genres);
                                    })
                                    ->orWhereHas('categories', function($q) use ($cats){
                                        $q->whereIn('name', $cats);
                                    })
                                    ->orWhereHas('tags', function($q) use ($tags){
                                        $q->whereIn('name', $tags);
                                    });
                                })->inRandomOrder()->limit(10)->get();
            // print_r($query);
            return view('client.aboutFilm2', compact('film','relatedfilms'));
        }

        return abort(404);
        
        
        
        // dd($film);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
