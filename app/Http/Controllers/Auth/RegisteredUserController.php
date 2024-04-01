<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use App\Models\User;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return Inertia::render('Auth/Register');
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
            'signature' => 'required',
            'domicile_certificate' => 'required|file|mimes:pdf|max:2048',
        ], [
            'phone.unique' => 'Le numéro de téléphone est déjà utilisé.',
            'card_identity.required' => 'Le champ identité de carte est requis.',
            'card_identity.file' => 'Le champ identité de carte doit être un fichier.',
            'card_identity.mimes' => 'Le champ identité de carte doit être un fichier au format PDF.',
            'card_identity.max' => 'Le fichier identité de carte ne doit pas dépasser 2 Mo.',
            'password.min' => 'Le mot de passe doit comporter au moins :min caractères.',
            'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
        ]);

        $signature = $request->input('signature');
        $signature = str_replace('data:image/png;base64,', '', $signature);
        $signature = str_replace(' ', '+', $signature);
        $signatureData = base64_decode($signature);
        $path = 'signatures/' . uniqid() . '.png';
        Storage::disk('public')->put($path, $signatureData);

        User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'birth' => $request->birth,
            'address' => $request->address,
            'city' => $request->city,
            'phone' => $request->phone,
            'card_identity' => $request->file('card_identity')->store('card_identities'),
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'signature' => $path,
            'domicile_certificate' => $request->file('domicile_certificate')->store('domicile_certificates'),
        ]);

        return response()->json(['message' => 'Inscription réussie'], 200);
    }
}
