<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Event;
use App\Models\Room;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with('room')->get();
        return Inertia::render('Admin/Tables/Event', ['events' => $events]);
    }

    public function create()
    {
        return Inertia::render('Admin/Tables/Event');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            // 'image' => 'file|max:2048',

        ], [
            'name.required' => 'Le champ nom est requis.',
            'description.required' => 'Le champ description est requis.',
            'date.required' => 'Le champ date est requis.',
            'location.required' => 'Le champ location est requis.',
            'address.required' => 'Le champ address est requis.',
            // 'image.required' => 'Le champ image est requis.',
            // 'image.file' => 'Le champ image doit être un fichier.',
            // 'image.max' => 'Le fichier image de carte ne doit pas dépasser 2 Mo.',
        ]);
        $event = Event::create([
            'name' => $request->name,
            'description' => $request->description,
            'date' => $request->date,
            'location' => $request->location,
            'address' => $request->address,
            'user_id' => auth()->id(),
        ]);

        Room::create([
            'name' => $event->name,
            'date' => $event->date,
            'user_id' => auth()->id(),
            'event_id' => $event->id,
        ]);
    }

    public function showPage(Event $event)
    {
        return Inertia::render('Admin/Tables/PartialEvent/AddEvent', ['event' => $event]);
    }

    public function show(Event $event)
    {
        return Inertia::render('Admin/Tables/PartialEvent/UpdateEvent', ['event' => $event]);
    }

    public function update(Request $request, Event $event)
    {
        $event->update($request->all());

        return Inertia::render('Admin/Tables/PartialEvent/UpdateEvent', ['event' => $event]);
    }

    public function destroy(Event $event)
    {
        $event->room()->delete();
        $event->delete();

        return Inertia::render('Admin/Tables/Event', ['message' => 'Event deleted successfully']);
    }
}
