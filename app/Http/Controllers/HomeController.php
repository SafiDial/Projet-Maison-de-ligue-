<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Collaborateur;

class HomeController extends Controller
{
    public function index()
    {
        //************** Récupère un collaborateur aléatoire différent de l'utilisateur connecté

        $collaborateur = Collaborateur::where('id', '!=', Auth::id())->inRandomOrder()->first();

        //**************  Si l'utilisateur est un admin tt acces
        if (Auth::user()->isAdmin) {
            return view('home', compact('collaborateur')); // Vue admin
        }

        //*************  Sinon, vue utilisateur simple
        return view('home_user', compact('collaborateur'));
    }
}
