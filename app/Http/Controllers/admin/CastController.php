<?php

namespace App\Http\Controllers\admin;

use App\Cast;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

class CastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $casts = Cast::all();
        return view('admin.cast.index',compact('casts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cast.create');
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
            $file->move('images/cast/thumbnail', $name);
            Image::make('images/cast/thumbnail/'.$name)->resize(270, 400)->save('images/cast/thumbnail/'.$name);
            $input['profilepic'] = $name;
        }
        if(empty($input['profilepic'])){
            $input['profilepic'] = 'http://placehold.it/270x400';
        }
        $cast = Cast::create($input);
        session()->flash('status', 'Added Succesfully!');
        return redirect()->action(
            'admin\CastController@edit', ['id' => $cast->slug]
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cast = Cast::where('slug', $id)->first();
        return view('admin.cast.edit',compact('cast'));
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
        $cast = Cast::find($id);
        $input = $request->all();
        if($file = $request->file('profilepic')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images/cast/thumbnail', $name);
            Image::make('images/cast/thumbnail/'.$name)->resize(270, 400)->save('images/cast/thumbnail/'.$name);
            $input['profilepic'] = $name;
        }
        $cast->update($input);
        session()->flash('status', 'Updated Succesfully!');
        return redirect()->action(
            'admin\CastController@edit', ['id' => $cast->slug]
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

        Cast::destroy($request->delCheckBox);
        return redirect()->back();
    }

    public function trash(){
        // $equipments = Producer::onlyTrashed()->get();
        // return view('equipment.trash',compact('equipments'));
    }
}
