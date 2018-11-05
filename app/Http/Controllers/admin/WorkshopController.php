<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Workshop;
use Image;
use Carbon\Carbon;
use App\Mail\SendInquiryEmail;
use Mail;

class WorkshopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workshops = Workshop::all();
        if(!is_null($workshops)){
            foreach ($workshops as $key) {
                $key->start_date = Carbon::parse($key->start_date)->subDay()->format('F d Y h:i a');
                $key->end_date = Carbon::parse($key->end_date)->subDay()->format('F d Y h:i a');
            }
        }
        return view('admin.workshop.index', compact('workshops'));
    }

    public function index_client()
    {
        return view('client.workshops');
    }

    public function getData(Request $request)
    {
        $draw = $request->input('draw');

        if ( !empty ( $draw ) ){
            $search = $request->input('search');
            $filter = $request->input('filter');
            $field = $request->input('field');
            $data = $request->input('data');

            $date = Carbon::now()->toDateString();

            $query = Workshop::orderBy($field,$data);

            if($filter == 'upcoming'){
                $query->whereDate('start_date', '>', $date);
            }

            if($filter == 'past'){
                $query->whereDate('end_date', '<', $date);
            }

            if($search){
                $query->where('name', 'like', '%' . $search . '%');
            }

            $workshops = $query->paginate(5);

            foreach ($workshops as $key => $workshop) {
                $workshop->description = strip_tags($workshop->description);
                $workshop->description = str_limit($workshop->description, 165);
                $workshop->start_date = Carbon::parse($workshop->start_date)->subDay()->format('F d Y h:i a');
                $workshop->end_date = Carbon::parse($workshop->end_date)->subDay()->format('F d Y h:i a');
            }
            // return $workshops;
            return ['data' => $workshops, 'draw' => $draw];
        }
            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.workshop.create');
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
        if($file = $request->file('workshopimg')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images/workshop', $name);
            Image::make('images/workshop/'.$name)->resize(870, 470)->save('images/workshop/'.$name);
            Image::make('images/workshop/'.$name)->resize(230, 180)->save('images/workshop/thumbnail/'.$name);
            $input['workshopimg'] = $name;
        }
        if(!$request->hasFile('workshopimg')){
            $input['workshopimg'] = 'default.jpg';
        }
        $workshop = Workshop::create($input);
        session()->flash('status', 'Added Succesfully!');
        return redirect()->action(
            'admin\WorkshopController@edit', ['id' => $workshop->id]
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
        $workshop = Workshop::where('slug', $id)->first();
        if($workshop != null){
            $start = Carbon::parse($workshop->start_date)->toDateString($workshop->start_date);
            $end = Carbon::parse($workshop->end_date)->toDateString($workshop->end_date);
            if($start == $end){
                $workshop->end_date = Carbon::parse($workshop->end_date)->subDay()->format('h:i a');
                $workshop->start_date = Carbon::parse($workshop->start_date)->subDay()->format('F d Y - h:i a');
            }
            else{
                $workshop->start_date = Carbon::parse($workshop->start_date)->subDay()->format('F d Y - h:i a');
                $workshop->end_date = Carbon::parse($workshop->end_date)->subDay()->format('F d Y - h:i a');
            }

            return view('client.workshopDetail', compact('workshop'));
        }
        return abort(404);
    }

    public function sendComment(Request $request, $id){
        // dd($request);
        Mail::send('email',
        [
            'name' => $request->name,
            'email' => $request->email,
            'user_message' => $request->message
        ], function ($mail) use ($request, $id)
        {
            $mail->from($request->email, $request->name);

            $mail->to('s.cmanawit@gmail.com', 'Admin')->subject($id.' Workshop - Inquiry');
        });


        return back()->with('success', 'Thanks for contacting us!');
        // session()->flash('status', 'Your message has been sent!');

        // return redirect()->back();
        // return back()->with('success', 'Thanks for contacting us!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $workshop = Workshop::find($id);
        return view('admin.workshop.edit', compact('workshop'));
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
        $input = $request->all();
        $workshop = Workshop::find($id);
        if($file = $request->file('workshopimg')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images/workshop', $name);
            Image::make('images/workshop/'.$name)->resize(870, 470)->save('images/workshop/'.$name);
            $input['workshopimg'] = $name;
        }
        $workshop->update($input);

        session()->flash('status', 'Added Succesfully!');
        return redirect()->action(
            'admin\WorkshopController@edit', ['id' => $workshop->id]
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

        Workshop::destroy($request->delCheckBox);
        return redirect()->back();
    }
}
