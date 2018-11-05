<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Film;
use App\Member;
use App\Event;
use Carbon\Carbon;
use App\Workshop;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $limit = Film::count();
        $featuredfilms = Film::with('genres')->inRandomOrder()->get();;
        $newestfilm = Film::orderBy('created_at', 'desc')->get();
        $featuredalumni = Member::inRandomOrder()->get();
        $date = Carbon::now()->toDateString();
        $now = true;
        $todayevent = Event::whereDate('event_date', $date)->first();
        if(is_null($todayevent)){
            $todayevent = Event::whereDate('event_date', '>', $date)->first();
            $now = false;
        }
        if(!is_null($todayevent)){
            $todayevent->event_date = Carbon::parse($todayevent->event_date)->subDay()->format('F d Y');
        }        
        $pastevents = Event::whereDate('event_date', '<', $date)->take(4)->get();
        if(!is_null($pastevents)){
            foreach ($pastevents as $key) {
                $key->event_date = Carbon::parse($key->event_date)->diffForHumans();
            }
        }
        $workshop = Workshop::whereDate('start_date', '>', $date)->first();
        if(!is_null($workshop)){
            $workshop->start_date = Carbon::parse($workshop->start_date)->subDay()->format('F d Y h:i a');
            //$workshop->end_date = Carbon::parse($workshop->end_date)->subDay()->format('F d Y h:i a');
        }
        return view('client.homepage', compact('featuredfilms','newestfilm','featuredalumni', 'todayevent', 'now','pastevents','workshop'));
        // dd($upcomingevent);
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
