<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Film;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('client/catalog');
    }

    public function getCatalogData(Request $request){
        $draw = $request->input('draw');
        $search = $request->input('search');
        $field = $request->input('field');
        $data = $request->input('data');
        if ( !empty ( $draw ) ) {
            $query = Film::with('members', 'genres', 'tags')->orderBy($field,$data);
            // dd($query);
            if ($search) {
                $query->where(function($query) use ($search) {
                    $query->where('title', 'like', '%' . $search . '%')
                    ->orWhereHas('members', function($q) use ($search){
                        $q->where('name', 'like', '%' . $search . '%');
                    })
                    ->orWhereHas('genres', function($q) use ($search){
                        $q->where('name', 'like', '%' . $search . '%');
                    })
                    ->orWhereHas('tags', function($q) use ($search){
                        $q->where('name', 'like', '%' . $search . '%');
                    })
                    ->orWhere('yearfinish', 'like', '%' . $search . '%')
                    ->orWhere('award', 'like', '%' . $search . '%');
                });
            }
            $catalog = $query->paginate(10);
            // print_r($catalog);
            return ['data' => $catalog, 'draw' => $draw];
        }

        return abort(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    {
        //
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
