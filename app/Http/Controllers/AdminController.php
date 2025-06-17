<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collaborateur;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function addCollaborateur()
    {
        return view('admin.addCollaborateur');
    }

    public function storeCollaborateur(Request $request)
    {
        // Valider les données d'entrée
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:collaborateurs',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'nullable|string|max:20',
            'birthdate' => 'nullable|date',
            'city' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'photo' => 'nullable|string|max:255',
            'service' => 'nullable|string|max:255',
        ]);

        // Hasher le mot de passe avant de l'enregistrer
        Collaborateur::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'birthdate' => $request->birthdate,
            'city' => $request->city,
            'country' => $request->country,
            'photo' => $request->photo,
            'service' => $request->service,
            'isAdmin' => $request->has('isAdmin') ? true : false,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Collaborateur ajouté avec succès.');
    }

    public function deleteCollaborateur($id)
    {
        $collaborateur = Collaborateur::findOrFail($id);
        $collaborateur->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Collaborateur supprimé avec succès.');
    }
}
