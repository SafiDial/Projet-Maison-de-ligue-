<?php

namespace App\Http\Controllers;

use App\Models\Collaborateur;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Afficher tous les collaborateurs
    public function index()
    {
        // Récupérer tous les collaborateurs
        $collaborateurs = Collaborateur::all();

        // Passer les collaborateurs à la vue
        return view('dashboard', compact('collaborateurs'));
    }
}
