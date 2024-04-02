<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return Inertia::render('Admin/Tables/User', ['users' => $users]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'birth' => 'required|date',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'phone' => 'required|string|max:255|unique:users',
            'card_identity' => 'required|file|mimes:pdf|max:2048',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'domicile_certificate' => 'required|file|mimes:pdf|max:2048',
            'signature' => 'required|string|max:255',
            'role' => 'required|string|max:255',
        ], [
            'phone.unique' => 'Le numéro de téléphone est déjà utilisé.',
            'card_identity.required' => 'Le champ identité de carte est requis.',
            'card_identity.file' => 'Le champ identité de carte doit être un fichier.',
            'card_identity.mimes' => 'Le champ identité de carte doit être un fichier au format PDF.',
            'card_identity.max' => 'Le fichier identité de carte ne doit pas dépasser 2 Mo.',
            'password.min' => 'Le mot de passe doit comporter au moins :min caractères.',
            'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
        ]);

        $domicile = $request->file('domicile_certificate')->store('public/domicile_certificates');
        $card_identity = $request->file('card_identity')->store('public/card_identities');

        User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'birth' => $request->birth,
            'address' => $request->address,
            'city' => $request->city,
            'phone' => $request->phone,
            'card_identity' => str_replace('public/', '', $card_identity),
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'domicile_certificate' => str_replace('public/', '', $domicile),
            'signature' => $request->signature,
            'role' => $request->role,
        ]);

        return response()->json(['message' => 'Inscription réussie'], 200);
    }

    public function show(User $user)
    {
        return Inertia::render('Admin/Tables/PartialUser/UpdateUser', ['user' => $user]);
    }

    public function showPage(User $user)
    {
        return Inertia::render('Admin/Tables/PartialUser/AddUser', ['user' => $user]);
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());

        return Inertia::render('Admin/Tables/PartialUser/UpdateUser', ['user' => $user]);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return Inertia::render('Admin/Tables/User', ['message' => 'User deleted successfully']);
    }
}
