<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/residences-et-etablissements', [ShowController::class, 'index'])
    ->name('residences-et-etablissements');

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    Route::get('/admin/dashboard/users', [UserController::class, 'index'])
        ->name('user');
    Route::delete('/admin/dashboard/users/{user}', [UserController::class, 'destroy'])
        ->name('userDelete');

    Route::get('/admin/dashboard/users/update/{user}', [UserController::class, 'show'])
        ->name('updateUser');
    Route::put('/admin/dashboard/users/update/{user}', [UserController::class, 'update'])
        ->name('updateUser');

    Route::get('/admin/dashboard/users/add', [UserController::class, 'showPage'])
        ->name('addUser');

    Route::post('/admin/dashboard/users/add', [UserController::class, 'store'])
        ->name('addUser');

    Route::get('/admin/dashboard', [AuthenticatedSessionController::class, 'adminDashboard'])
        ->name('admin.dashboard');

    Route::get('/admin/dashboard/events', [EventController::class, 'index'])
        ->name('event');

    Route::get('/events/create', [EventController::class, 'create'])
        ->name('event');

    Route::get('/admin/dashboard/events/add', [EventController::class, 'showPage'])
        ->name('addEvent');

    Route::post('/admin/dashboard/events/add', [EventController::class, 'store'])
        ->name('events.store');

    Route::delete('/admin/dashboard/events/{event}', [EventController::class, 'destroy'])
        ->name('eventDelete');

    Route::get('/admin/dashboard/events/update/{event}', [EventController::class, 'show'])
        ->name('updateEvent');
    Route::put('/admin/dashboard/events/update/{event}', [EventController::class, 'update'])
        ->name('updateEvent');

    Route::get('/admin/dashboard/rooms', [RoomController::class, 'index'])
        ->name('chatRooms');

    Route::get('admin/dashboard/rooms/{room}', [ChatController::class, 'showChat'])
        ->name('roomChat');

    Route::get('admin/dashboard/rooms/{room}', [ChatController::class, 'showMessage'])
        ->name('roomChat');

    Route::delete('admin/dashboard/rooms/{room}/chats/{chat}', [ChatController::class, 'destroy'])
        ->name('messageDelete');
});

Route::get('/admin/dashboard/events', [EventController::class, 'index'])
    ->name('eventsUser');

Route::get('/rooms/create', [RoomController::class, 'create'])
    ->name('rooms');

Route::get('/rooms/{room}', [RoomController::class, 'show'])
    ->name('rooms.show');

Route::post('/rooms', [RoomController::class, 'store'])
    ->name('rooms.store');

Route::get('/rooms/{room}/chats/create', [ChatController::class, 'create'])
    ->name('chats.create');

Route::get('/rooms/{room}/chats', [ChatController::class, 'index'])
    ->name('chats.index');

Route::post('/rooms/{room}/chats', [ChatController::class, 'store'])
    ->name('chats.store');

require __DIR__ . '/auth.php';
