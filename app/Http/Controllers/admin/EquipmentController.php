<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Equipment;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipments = Equipment::all();
        return view('admin.equipment.index',compact('equipments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.equipment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $equip = Equipment::create($request->all());
        // return redirect()->action(
        //     'EquipmentController@edit', ['id' => $equip->slug]
        // );
        $input = $request->all();
        if($file = $request->file('img')){
           $name = time() . $file->getClientOriginalName();
           $file->move('images/equip', $name);
           $input['img'] = $name;
        }
        $equip = Equipment::create($input);
        session()->flash('status', 'Added Succesfully!');
        return redirect()->action(
            'admin\EquipmentController@edit', ['id' => $equip->slug]
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
        $equip = Equipment::findOrFail($id);
        dd($equip);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $equipment = Equipment::where('slug', $id)->first();
        return view('admin.equipment.edit',compact('equipment'));
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
        $equip = Equipment::find($id);
        $input = $request->all();
        if($file = $request->file('img')){
           $name = time() . $file->getClientOriginalName();
           $file->move('images/equip', $name);
           $input['img'] = $name;
        }
        $equip->update($input);
        session()->flash('status', 'Updated Successfully!');
        return redirect()->action(
            'admin\EquipmentController@edit', ['id' => $equip->slug]
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
        // Equipment::findOrFail($id)->delete();
        // return redirect()->back();
        echo 'tr';
    }

    /**
     * Bulk Delete
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

        Equipment::destroy($request->delCheckBox);
        return redirect()->back();
    }

    public function trash(){
        // $equipments = Equipment::all();
        // foreach ($equipments as $equip) {
        //     echo $equip;
        // }
        // return view('equipment.trash',compact('equipments'));
        $equipments = Equipment::all();
        foreach ($equipments as $t) {
            echo '$t';
        }
    }
}
