<?php

namespace App\Http\Controllers\admin;

use App\Producer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

class ProducerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producers = Producer::all();
        return view('admin.producer.index',compact('producers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.producer.create');
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
        if (!$request->hasFile('profilepic')) {
            $input['profilepic'] = 'default.jpg';
        }
        if($file = $request->file('profilepic')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images/producer/thumbnail', $name);
            Image::make('images/producer/thumbnail/'.$name)->resize(270, 400)->save('images/producer/thumbnail/'.$name);
            $input['profilepic'] = $name;
        }
        if(empty($input['profilepic'])){
            $input['profilepic'] = 'http://placehold.it/270x400';
        }
        $producer = Producer::create($input);
        session()->flash('status', 'Added Succesfully!');
        return redirect()->action(
            'admin\ProducerController@edit', ['id' => $producer->slug]
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
        $producer = Producer::findOrFail($id);
        dd($producer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producer = Producer::where('slug', $id)->first();
        return view('admin.producer.edit',compact('producer'));
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
        $producer = Producer::find($id);
        $input = $request->all();
        if($file = $request->file('profilepic')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images/producer/thumbnail', $name);
            Image::make('images/producer/thumbnail/'.$name)->resize(270, 400)->save('images/producer/thumbnail/'.$name);
            $input['profilepic'] = $name;
        }
        $producer->update($input);
        session()->flash('status', 'Updated Succesfully!');
        return redirect()->action(
            'admin\ProducerController@edit', ['id' => $producer->slug]
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

        Producer::destroy($request->delCheckBox);
        return redirect()->back();
    }
}
