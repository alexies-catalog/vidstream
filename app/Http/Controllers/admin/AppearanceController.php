<?php

namespace App\Http\Controllers\admin;

use App\Appearance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppearanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appearance = Appearance::findOrFail(1);

        // dd($appearance);

        return  view('admin.dashboard.appearance' , compact('appearance'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
     * @param  \App\Appearance  $appearance
     * @return \Illuminate\Http\Response
     */
    public function show(Appearance $appearance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Appearance  $appearance
     * @return \Illuminate\Http\Response
     */
    public function edit(Appearance $appearance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Appearance  $appearance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $appearance = Appearance::findOrFail($id);
        $input = $request->all();
        if($file = $request->file('logo_url')){
            $name = 'mfilogo.png';
            $file->move('images', $name);
            $input['logo_url'] = $name;
        }
        $appearance->update($input);
        session()->flash('status', 'Updated Successfully!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Appearance  $appearance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appearance $appearance)
    {
        //
    }
}
