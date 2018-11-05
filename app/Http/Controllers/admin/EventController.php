<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Calendar;
use Carbon\Carbon;
use Image;
use App\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    //


    public function index()
    {
        //

        $events = Event::all();
        // return view('/sample/events',compact('events'));
        return view('admin.event.index',compact('events'));
    }
    public function index_client()
    {
        //

        $events = Event::all();
        // return view('/sample/events',compact('events'));
        return view('client.events',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.event.create');
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
        // Event::create($request->all());
        $input = $request->all();
        if($file = $request->file('eventimg')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images/events', $name);
            Image::make('images/events/'.$name)->resize(870, 470)->save('images/events/'.$name);
            $input['eventimg'] = $name;
        }
        if(!$request->hasFile('eventimg')){
            $input['eventimg'] = 'default.jpg';
        }
        $events = Event::create($input);
        return redirect()->route('events.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::where('slug', $id)->first();
        if($event != null){
            $event->event_date = Carbon::parse($event->event_date)->subDay()->format('d F Y');
            return view('client.eventDetail', compact('event'));
        }
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        return view('admin.event.edit', compact('event'));
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
        $event = Event::find($id);
        $input = $request->all();
        if($file = $request->file('eventimg')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images/events', $name);
            Image::make('images/events/'.$name)->resize(870, 470)->save('images/events/'.$name);
            $input['eventimg'] = $name;
        }
        $event->update($input);
        return redirect()->route('events.index');
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



