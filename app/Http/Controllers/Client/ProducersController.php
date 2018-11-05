<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Member;
use App\Film;

class ProducersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('client.allProducers')->with('producers',Producer::all());
        return view('client.allProducers');
    }

    public function getProducerData(Request $request){
        $draw = $request->input('draw');
        $search = $request->input('search');
        $field = $request->input('field');
        $data = $request->input('data');
        $pro = $request->input('pro');
        if ( !empty ( $draw ) ) {
            $query = Member::with('professions')->orderBy($field,$data);
            // dd($query);
            if($pro){
                $query->whereHas('professions', function($query) use ($pro){
                    $query->where('slug', $pro);
                });
            }
            
            if ($search) {
                $query->where(function($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                });
            }
            $producer = $query->paginate(9);
            // print_r($catalog);
            return ['data' => $producer, 'draw' => $draw];
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
        $member = Member::with('professions', 'ufilms.stills')->where('slug', $id)->first();
        if($member != null){
            return view('client.director',compact('member'));
        }
        return abort(404);
        // dd($member);
    }

    public function getsinglefilmmember(Request $request){

        $slug = $request->input('name');
        $field = $request->input('field');
        $data = $request->input('data');
        $query = Film::with('members')->orderBy($field,$data);;

        $query->where(function($query) use ($slug) {
                    $query->whereHas('members', function($q) use ($slug){
                        $q->where('slug', $slug);
                    });
                });
        $member = $query->paginate(10);

        return $member;
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
