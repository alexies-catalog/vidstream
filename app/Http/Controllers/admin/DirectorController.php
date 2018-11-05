<?php

namespace App\Http\Controllers\admin;
use App\Director;
use Image;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\http\Resources\Director as DirectorResource;

class DirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $directors = Director::all();
        return view('admin.director.index',compact('directors'));
    }

    /**
     * Display a listing of the resource specially made for the client with vue single page api.
     *
     * @return \Illuminate\Http\Response
     */
    public function mobileIndex()
    {
        $directors = Director::paginate(5);
        return DirectorResource::Collection($directors);
        // return view('admin.director.index',compact('directors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.director.create');
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
        if($file = $request->file('profilepic')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images/director/thumbnail', $name);
            Image::make('images/director/thumbnail/'.$name)->resize(270, 400)->save('images/director/thumbnail/'.$name);
            $input['profilepic'] = $name;
        }
        if(empty($input['profilepic'])){
            $input['profilepic'] = 'http://placehold.it/270x400';
        }
        $director = Director::create($input);
        session()->flash('status', 'Added Succesfully!');
        return redirect()->action(
            'admin\DirectorController@edit', ['id' => $director->slug]
        );
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
        $director=Director::findOrFail($id);
        return new DirectorResource($director);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $director = Director::where('slug', $id)->first();
        return view('admin.director.edit',compact('director'));
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
        $director = Director::find($id);
        $input = $request->all();
        if($file = $request->file('profilepic')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images/director/thumbnail', $name);
            Image::make('images/director/thumbnail/'.$name)->resize(270, 400)->save('images/director/thumbnail/'.$name);
            $input['profilepic'] = $name;
        }
        $director->update($input);
        session()->flash('status', 'Updated Succesfully!');
        return redirect()->action(
            'admin\DirectorController@edit', ['id' => $director->slug]
        );
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
    public function bulk(Request $request)
    {
        // $equipments = Equipment::findOrFail($request->delCheckBox)->delete();
        // foreach ($equipments as $equip) {
            // echo 'shei';
        // }

        // if(isset($request->delete_one)){
        //     Equipment::findOrFail($request->delete_one)->delete();
        //     return redirect()->back();
        // }

        Director::destroy($request->delCheckBox);
        return redirect()->back();
    }

    public function trash(){
        // $equipments = Producer::onlyTrashed()->get();
        // return view('equipment.trash',compact('equipments'));
    }
}
