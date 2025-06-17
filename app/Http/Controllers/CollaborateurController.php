<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreCollaborateurRequest;
use App\Http\Requests\UpdateCollaborateurRequest;
use App\Models\Collaborateur;

class CollaborateurController extends Controller
{
    //********  Afficher le formulaire de création

    public function create()
    {
        return view('collaborateurs.create');
    }

    //******** Enregistrer un nouveau collaborateur

    public function store(StoreCollaborateurRequest $request)
    {
        try {
            $photoPath = $request->hasFile('photo')
                ? $request->file('photo')->store('photos', 'public')
                : 'photos/default.webp';

            Collaborateur::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'birthdate' => $request->birthdate,
                'city' => $request->city,
                'country' => $request->country,
                'service' => $request->service,
                'photo' => $photoPath,
                'isAdmin' => false, 
                'password' => Hash::make($request->password),
            ]);

            return redirect()->route('collaborateurs.index')->with('success', 'Collaborateur créé avec succès !');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue : ' . $e->getMessage());
        }
    }

    //******** Afficher la liste des collaborateurs selon le rôle (admin ou non-admin)

    public function index(Request $request)
    {
        $query = Collaborateur::query();

        if ($request->filled('search')) {
            $query->where('name', 'LIKE', '%' . $request->input('search') . '%');
        }

        if ($request->filled('service')) {
            $query->where('service', $request->input('service'));
        }

        if ($request->filled('city')) {
            $query->where('city', $request->input('city'));
        }

        if ($request->filled('country')) {
            $query->where('country', $request->input('country'));
        }

        $collaborateurs = $query->paginate(10);

        $services = Collaborateur::distinct()->pluck('service');
        $cities = Collaborateur::distinct()->pluck('city');
        $countries = Collaborateur::distinct()->pluck('country');

        // Vue selon rôle
        if (auth()->user()->isAdmin) {
            return view('collaborateurs.index', compact('collaborateurs', 'services', 'cities', 'countries'));
        } else {
            return view('collaborateurs.index_user', compact('collaborateurs', 'services', 'cities', 'countries'));
        }
    }

    //******** Afficher la liste des collaborateurs pour les utilisateurs non-admins
    public function indexForUsers(Request $request)
    {
        $query = Collaborateur::query();

        if ($request->filled('search')) {
            $query->where('name', 'LIKE', '%' . $request->input('search') . '%');
        }

        if ($request->filled('service')) {
            $query->where('service', $request->input('service'));
        }

        if ($request->filled('city')) {
            $query->where('city', $request->input('city'));
        }

        if ($request->filled('country')) {
            $query->where('country', $request->input('country'));
        }

        $collaborateurs = $query->paginate(10);

        $services = Collaborateur::distinct()->pluck('service');
        $cities = Collaborateur::distinct()->pluck('city');
        $countries = Collaborateur::distinct()->pluck('country');

        // Vue pour les utilisateurs non-admin
        return view('collaborateurs.index_user', compact('collaborateurs', 'services', 'cities', 'countries'));
        
    }

    // Afficher le formulaire d'édition
    public function edit($id)
    {
        $collaborateur = Collaborateur::findOrFail($id);

        // Vérifier si l'utilisateur connecté est celui qui édite ou s'il est administrateur
        if (auth()->user()->id !== $collaborateur->id && !auth()->user()->isAdmin) {
            abort(403, 'Accès interdit');
        }

        return view('collaborateurs.edit', compact('collaborateur'));
    }

    // Mettre à jour un collaborateur
  // Mettre à jour un collaborateur
public function update(UpdateCollaborateurRequest $request, $id)
{
    try {
        $collaborateur = Collaborateur::findOrFail($id);
        $validatedData = $request->validated();

        // Si c'est un utilisateur simple, interdire de modifier le rôle "isAdmin"
        if (!auth()->user()->isAdmin) {
            unset($validatedData['isAdmin']);
        }

        // Gérer la photo
        $photoPath = $request->hasFile('photo')
            ? $request->file('photo')->store('photos', 'public')
            : $collaborateur->photo;

        // Mise à jour des informations
        $collaborateur->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'birthdate' => $validatedData['birthdate'],
            'city' => $validatedData['city'],
            'country' => $validatedData['country'],
            'service' => $validatedData['service'],
            'photo' => $photoPath,
            'isAdmin' => $validatedData['isAdmin'] ?? $collaborateur->isAdmin, // Ne modifie pas le rôle si ce n'est pas un admin
        ]);

        // Si un mot de passe est fourni, le mettre à jour
        if ($request->filled('password')) {
            $collaborateur->update([
                'password' => Hash::make($validatedData['password']),
            ]);
        }

        // Rediriger en fonction du rôle de l'utilisateur connecté
        if (auth()->user()->isAdmin) {
            return redirect()->route('collaborateurs.index')->with('success', 'Collaborateur mis à jour avec succès !');
        } else {
            return redirect()->route('collaborateurs.edit', auth()->user()->id)->with('success', 'Votre profil a été mis à jour !');
        }
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Une erreur est survenue : ' . $e->getMessage());
    }
}


public function destroy($id)
{
    try {
        $collaborateur = Collaborateur::findOrFail($id);

        // Vérification pour empêcher la suppression de l'utilisateur connecté ou d'un administrateur
        if (auth()->user()->id === $collaborateur->id || $collaborateur->isAdmin) {
            return redirect()->back()->with('error', 'Vous ne pouvez pas supprimer cet utilisateur.');
        }

        $collaborateur->delete();
        return redirect()->route('collaborateurs.index')->with('success', 'Collaborateur supprimé avec succès !');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Une erreur est survenue lors de la suppression : ' . $e->getMessage());
    }
}

}
