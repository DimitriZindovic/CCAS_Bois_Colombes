<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\User;
use App\Models\Room;
use App\Models\Event;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Login', [
            'canResetPassword' => Route::has('password.request'),
            'status' => session('status'),
        ]);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $user = Auth::user();

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard', absolute: false))->with('user', $user);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function adminDashboard(Request $request): Response
    {
        if ($request->user() && $request->user()->role == 'admin') {
            $users = User::all();
            $rooms = Room::all();
            $events = Event::all();

            return Inertia::render('Admin/Dashboard', [
                'isAdmin' => true,
                'users' => $users,
                'rooms' => $rooms,
                'events' => $events,
            ]);
        }

        return Inertia::render('Dashboard');
    }
}
