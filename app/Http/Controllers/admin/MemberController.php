<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Member;
use Image;
use App\Profession;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $profes = Profession::all();
        $members = Member::with('professions')->get();
        return view('admin.member.index', compact('members','profes'));
    }

    //Profession List Display
    public function dp(){
        $professions = Profession::all();
        return view('admin.member.profession', compact('professions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $professions = Profession::all();
        // $select = [];
        // foreach($professions as $pro){
        //     $select[$pro->id] = $pro->name;
        // }
        return view('admin.member.create',compact('professions'));
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
        $professions = $request->professions;
        if($file = $request->file('profilepic')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images/member/thumbnail', $name);
            Image::make('images/member/thumbnail/'.$name)->resize(270, 400)->save('images/member/thumbnail/'.$name);
            $input['profilepic'] = $name;
        }
        if($file = $request->file('coverphoto')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images/member/cover', $name);
            Image::make('images/member/cover/'.$name)->resize(1920, 806)->save('images/member/cover/'.$name);
            $input['coverphoto'] = $name;
        }
        if(!$request->hasFile('profilepic')){
            $input['profilepic'] = 'default.png';
        }
        if(!$request->hasFile('coverphoto')){
            $input['coverphoto'] = 'default.jpg';
        }
        // if(!$request->hasFile('coverphoto')){
        //     $input['coverphoto'] = 'default.png';
        // }
        $member = Member::create($input);
        $member->professions()->attach($professions);
        session()->flash('status', 'Added Succesfully!');
        return redirect()->action(
            'admin\MemberController@edit', ['id' => $member->slug]
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
        $profs = Profession::all();
        $member = Member::where('slug', $id)->with('professions')->first();
        return view('admin.member.edit',compact('member','profs'));
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
        $member = Member::find($id);
        $input = $request->all();
        $professions = $request->professions;
        if($file = $request->file('profilepic')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images/member/thumbnail', $name);
            Image::make('images/member/thumbnail/'.$name)->resize(270, 400)->save('images/member/thumbnail/'.$name);
            $input['profilepic'] = $name;
        }
        if($file = $request->file('coverphoto')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images/member/cover', $name);
            Image::make('images/member/cover/'.$name)->resize(1920, 806)->save('images/member/cover/'.$name);
            $input['coverphoto'] = $name;
        }
        $member->update($input);
        $member->professions()->sync($professions);
        session()->flash('status', 'Updated Succesfully!');
        return redirect()->action(
            'admin\MemberController@edit', ['id' => $member->slug]
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

        Member::destroy($request->delCheckBox);
        return redirect()->back();
    }

}
