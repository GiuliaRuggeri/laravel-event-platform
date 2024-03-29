<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        $tags = Tag::all();


        return view('admin.events.index', compact('events', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();

        return view('admin.events.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEventRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventRequest $request)
    {
        $validated_data = $request->validated();
        $user = auth()->user()->id;
        $validated_data['user_id'] = $user;
        $path = Storage::disk("public")->put('/uploads', $request['photo']);
        $validated_data["photo"] = $path;

        $newEvent = new Event();
        $newEvent->fill($validated_data);
        $newEvent->save();

        if ($request->tags) {
            $newEvent->tags()->attach($request->tags);
        }


        return redirect()->route("admin.events.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('admin.events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {

        $tags = Tag::all();

        return view('admin.events.edit', compact('event', 'tags'));
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
        $validated_data = $request->validated();
        $event->update($validated_data);
        if($request->hasFile("photo")){

            if ($event ->photo){

                Storage::disk("public")->delete($event->photo);

            }
            $path = Storage::disk("public")->put('/uploads', $request['photo']);
            $validated_data ["photo"] = $path;

        }

        return redirect()->route('admin.events.show', $event->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('admin.events.index');
    }
}
