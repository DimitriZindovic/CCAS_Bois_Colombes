<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use App\Models\Chat;
use App\Models\Room;

class ChatController extends Controller
{
    public function index(Room $room)
    {
        $chats = Chat::where('room_id', $room->id)->with('user')->get();

        return Inertia::render('Chats', [
            'room' => $room,
            'chats' => $chats,
        ]);
    }
    public function create()
    {
        return Inertia::render('Rooms');
    }

    public function store(Request $request, Room $room)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
            // 'image' => 'string|max:2048',
        ], [
            'message.required' => 'Le champ message est requis.',
            // 'image.required' => 'Le champ image est requis.',
            // 'image.file' => 'Le champ image doit être un fichier.',
            // 'image.max' => 'Le fichier image de carte ne doit pas dépasser 2 Mo.',
        ]);

        $image = $request->hasFile('image') ? Storage::put('public/images', $request->file('image')) : null;

        Chat::create([
            'message' => $request->message,
            'image' => str_replace('public/', '', $image),
            'user_id' => auth()->id(),
            'room_id' => $room->id,
        ]);

        return Inertia::render('Admin/Tables/Chat', ['message' => 'Chat created successfully']);
    }

    public function showChat($id)
    {
        $chat = Chat::with('room')->find($id);
        return Inertia::render('Admin/Tables/PartialRoom/Chat', ['chat' => $chat]);
    }

    public function show($id)
    {
        $chat = Chat::with('room')->find($id);
        return Inertia::render('Chat', ['chat' => $chat]);
    }

    public function showMessage(Room $room)
    {
        $chats = $room->chats()->with('user')->get();

        return Inertia::render('Admin/Tables/PartialRoom/Chat', [
            'room' => $room,
            'chats' => $chats,
        ]);
    }

    public function destroy(Room $room, Chat $chat)
    {
        $chat->delete();

        return response()->json(null, 204);
    }
}
