<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Film;
use App\Member;
use App\Genre;
use App\Tag;
use App\Category;
use App\Profession;
use App\Still;
use Image;
use DB;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $films = Film::with('members','genres','tags')->get();
        return view('admin.films.film.index', compact('films'));

    }

    public function getCrewProfession()
    {
        $prof = Profession::where('main', 'false')->get();
        return $prof;
    }

    public function getCrewMembers(Request $request)
    {
        $name = $request->get('value');
        $query = Member::with('professions');
                $query->where(function($query) use ($name) {
                    $query->whereHas('professions', function($q) use ($name){
                        $q->where('name', 'like', $name);
                    });
                });

        $member = $query->get();        

        return $member;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $query = Member::with('professions');
                $query->where(function($query) {
                    $query->whereHas('professions', function($q) {
                        $q->where('name', 'director');
                    });
                });
        $members = $query->get();    
        $tags = Tag::all();
        $genres = Genre::all();
        $cats = Category::all();
        return view('admin.films.film.create', compact('members','tags','cats','genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        if($file = $request->file('photo')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images/film/thumbnail', $name);
            Image::make('images/film/thumbnail/'.$name)->resize(285, 437)->save('images/film/thumbnail/'.$name);
            $input['photo'] = $name;
        }
        if($file = $request->file('single_photo')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images/film/singlepage', $name);
            Image::make('images/film/singlepage/'.$name)->resize(1920, 806)->save('images/film/singlepage/'.$name);
            $input['single_photo'] = $name;
        }
        if(!$request->hasFile('photo')){
            // Image::make('images/film/thumbnail/default.jpg')->resize(270, 400)->save('images/film/thumbnail/default.jpg');
            $input['photo'] = 'default.jpg';
        }
        if(!$request->hasFile('single_photo')){
            $input['single_photo'] = 'default.jpg';
        }
        $dir = explode(",",$request->director);
        $writer = $request->writer;
        if(!is_null($writer)){
            $wid = [];
            $wname = [];
            foreach ($writer as $key) {
                $prod = explode(",",$key);
                array_push($wid, $prod[0]);
                array_push($wname, $prod[1]);
            }
        }

        $cast = $request->cast;
        if(!is_null($cast)){

            $cid = [];
            $cname = [];
            foreach ($cast as $key) {
                $prod = explode(",",$key);
                array_push($cid, $prod[0]);
                array_push($cname, $prod[1]);
            }
        }

        $producer = $request->producer;
        if(!is_null($producer)){
            $pid = [];
            $pname = [];
            foreach ($producer as $key) {
                $prod = explode(",",$key);
                array_push($pid, $prod[0]);
                array_push($pname, $prod[1]);
            }
        }

        $otherCrewProfession = $request->profs;
        $otherCrewName = $request->name;
        if(!is_null($otherCrewName)){
            $oid = [];
            $oname = [];
            foreach ($otherCrewName as $key) {
                $prod = explode(",",$key);
                array_push($oid, $prod[0]);
                array_push($oname, $prod[1]);
            }
        }

        $genre = $request->genre;
        $tag = $request->tag;
        $cat = $request->cat;

        $film = Film::create($input);
        // $film->stills()->create($filename);

        if($filename = $request->file('file_name')){
            foreach ($filename as $image) {
                $name = time() . $image->getClientOriginalName();
                $image->move('images/film/stills', $name);
                // $data[] = $name;
                // dd($image);
                $film->stills()->create(['file_name' => $name]);
            }      
            // dd($data);  
            // Image::make('images/director/thumbnail/'.$name)->resize(270, 400)->save('images/director/thumbnail/'.$name);
            // $input['single_photo'] = $name;
        }

        $film->genres()->attach($genre);
        $film->tags()->attach($tag);
        $film->categories()->attach($cat);
        if(!is_null($request->director)){
            $film->members()->attach($dir[0], ['member_profession' => 'Director', 'member_name' => $dir[1]]);
        }

        $index=0;
        if(!is_null($producer)){
            foreach ($pname as $name) {
                $film->members()->attach($pid[$index], ['member_profession' => 'Producer', 'member_name' => $name]);
                $index++;
            }
        }

        $index=0;
        if(!is_null($cast)){
            foreach ($cname as $name) {
                $film->members()->attach($cid[$index], ['member_profession' => 'Actor', 'member_name' => $name]);
                $index++;
            }
        }

        $index=0;
        if(!is_null($writer)){
            foreach ($wname as $name) {
                $film->members()->attach($wid[$index], ['member_profession' => 'Writer', 'member_name' => $name]);
                $index++;
            }
        }

        $index=0;
        if(!is_null($otherCrewProfession)){
            foreach ($otherCrewProfession as $prof) {

                // echo $oid[$index] . $oname[$index];
                $film->members()->attach($oid[$index], ['member_profession' => $prof, 'member_name' => $oname[$index]]);
                $index++;
            }
        }

        session()->flash('status', 'Updated Succesfully!');
        return redirect()->action(
            'admin\FilmController@index'
        );
        
        // dd($input);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function show(Film $film)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $query = Member::with('professions');
                $query->where(function($query) {
                    $query->whereHas('professions', function($q) {
                        $q->where('name', 'director');
                    });
                });
        $members = $query->get();  
        $genres = Genre::all();
        $cats = Category::all();
        $tags = Tag::all();
        $film = Film::where('id', $id)->with('members','genres','tags','categories')->first();
        $stills = Still::where('film_id', $film->id)->get();
        return view('admin.films.film.edit', compact('film','tags','cats','genres','members','stills'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $film = Film::find($id);
        $input = $request->all();
        if($file = $request->file('photo')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images/film/thumbnail', $name);
            Image::make('images/film/thumbnail/'.$name)->resize(285, 437)->save('images/film/thumbnail/'.$name);
            $input['photo'] = $name;
        }
        if($file = $request->file('single_photo')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images/film/singlepage', $name);
            Image::make('images/film/singlepage/'.$name)->resize(1920, 806)->save('images/film/singlepage/'.$name);
            $input['single_photo'] = $name;
        }
        $dir = explode(",",$request->director);
        $writer = $request->writer;
        if(!is_null($writer)){
            $wid = [];
            $wname = [];
            foreach ($writer as $key) {
                $prod = explode(",",$key);
                array_push($wid, $prod[0]);
                array_push($wname, $prod[1]);
            }
        }

        $cast = $request->cast;
        if(!is_null($cast)){

            $cid = [];
            $cname = [];
            foreach ($cast as $key) {
                $prod = explode(",",$key);
                array_push($cid, $prod[0]);
                array_push($cname, $prod[1]);
            }
        }

        $producer = $request->producer;
        if(!is_null($producer)){
            $pid = [];
            $pname = [];
            foreach ($producer as $key) {
                $prod = explode(",",$key);
                array_push($pid, $prod[0]);
                array_push($pname, $prod[1]);
            }
        }
        
        $otherCrewProfession = $request->profs;
        $otherCrewName = $request->name;
        if(!is_null($otherCrewName)){
            $oid = [];
            $oname = [];
            foreach ($otherCrewName as $key) {
                $prod = explode(",",$key);
                array_push($oid, $prod[0]);
                array_push($oname, $prod[1]);
            }
        }

        $genre = $request->genre;
        $tag = $request->tag;
        $cat = $request->cat;

        $film->update($input);

        if($filename = $request->file('file_name')){
            foreach ($filename as $image) {
                $name = time() . $image->getClientOriginalName();
                $image->move('images/film/stills', $name);
                // $data[] = $name;
                // dd($image);
                $film->stills()->create(['file_name' => $name]);
            }      
            // dd($data);  
            // Image::make('images/director/thumbnail/'.$name)->resize(270, 400)->save('images/director/thumbnail/'.$name);
            // $input['single_photo'] = $name;
        }

        $film->genres()->sync($genre);
        $film->tags()->sync($tag);
        $film->categories()->sync($cat);


        if(!is_null($request->director)){

            $result = DB::table('film_member')
            ->where([
                    ['member_profession', '=', 'Director'],
                    ['film_id', '=', $film->id],
                ])
            ->first();

            if($result == null){
                $film->members()->attach($dir[0], ['member_profession' => 'Director', 'member_name' => $dir[1]]);
            }
            else{
                $result = DB::table('film_member')
                ->where('id', $result->id)
                ->update(['member_id' => $dir[0], 'member_name' => $dir[1]]);
            }

        }

        $index=0;
        if(!is_null($producer)){
            foreach ($pname as $name) {
                $film->members()->attach($pid[$index] , ['member_profession' => 'Producer', 'member_name' => $name]);
                $index++;
            }
        }

        $index=0;
        if(!is_null($cast)){
            foreach ($cname as $name) {
                $film->members()->attach($cid[$index] , ['member_profession' => 'Actor', 'member_name' => $name]);
                $index++;
            }
        }

        $index=0;
        if(!is_null($writer)){
            foreach ($wname as $name) {
                $film->members()->attach($wid[$index] , ['member_profession' => 'Writer', 'member_name' => $name]);
                $index++;
            }
        }

        $index=0;
        if(!is_null($otherCrewProfession)){
            foreach ($otherCrewProfession as $prof) {

                $film->members()->attach($oid[$index], ['member_profession' => $prof, 'member_name' => $oname[$index]]);
                $index++;
            }
        }
        session()->flash('status', 'Updated Succesfully!');
        return redirect()->action(
            'admin\FilmController@index'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function destroy(Film $film)
    {
        //
    }
    public function bulk(Request $request)
    {
        Film::destroy($request->delCheckBox);
        return redirect()->back();
    }
}
