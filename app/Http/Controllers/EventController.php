<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::select('title', 'date', 'id')->get();

        return response()->json([
            'events' => $events
        ]);
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
     * @param  \App\Http\Requests\StoreEventRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventRequest $request)
    {
        $days = $request->input('days');
        $date_from = $request->input('date_from');
        $date_to = $request->input('date_to');

        Event::truncate();
        
        foreach($days as $day){
            $dates = $this->getDateForSpecificDayBetweenDates($date_from, $date_to, $day);

            foreach($dates as $date){
                Event::updateOrCreate([
                    'date' => $date,
                ], [
                    'title' => $request->title,
                ]);
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Event Successfully Saved',
        ]);
    }

    private function getDateForSpecificDayBetweenDates($date_from, $date_to, $day){

        $dates = [];
        $date_to = strtotime($date_to);
        $days = array('1' => 'Monday', '2' => 'Tuesday', '3' => 'Wednesday', '4'=>'Thursday', '5' =>'Friday', '6' => 'Saturday', '7'=>'Sunday');
        for($i = strtotime($days[$day], strtotime($date_from)); $i <= $date_to; $i = strtotime('+1 week', $i)){
            $dates[] = date('Y-m-d',$i);
        }

        return $dates;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEventRequest  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
