<?php

namespace App\Http\Controllers;

use App\Event;
use App\Role;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events=Event::all();
        Event::checkActiveEvent($events);

        return view('event.index')->with(['events' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('adm-ware-view') && Gate::denies('warehouse-view')){
            return redirect(route('home'));
        }
        $users = User::where('id','>',1)->get();
        $events = Event::all();

        return view('event.create')->with([
            'events' => $events,
            'users' => $users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $events = new Event;
        $events->name = $request->name;
        $events->description = $request->description;
        $events->status = $request->status;
        $events->start_date = $request->start_date;
        $events->end_date = $request->end_date;

        //Pegar nos id's
        $user = User::find($request->user_id);
        $event_id = User::find($request->event_id);

        //atribuir valores dos id's
        $events->users()->sync([]);
        //gravar e fazer attach
        $events->save();
        $events->users()->attach($user);
        $events->users()->attach($event_id);

        return redirect()->route('event.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $users = User::where('id','>',1)->get();

        return view('event.edit')->with(['event' => $event, 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //declarar requests
        $event->name = $request->name;
        $event->description = $request->description;
        $event->status = $request->status;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;

        //Pegar nos id's
        $user = User::find($request->user_id);
        $event_id = User::find($request->event_id);

        //atribuir valores dos id's
        $event->users()->sync([]);//limpa os id's
        $event->save();
        $event->users()->attach($user);
        $event->users()->attach($event_id);

        return redirect()->route('event.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event = Event::findOrFail($event->id);
        $event->delete();
        return redirect()->route('event.index');
    }
}
