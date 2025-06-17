<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        // Vérifier si l'utilisateur est connecté et est un administrateur
        if (Auth::check() && Auth::user()->isAdmin) {
            return $next($request);
        }

        // Rediriger vers la page d'accueil avec un message d'erreur
        return redirect('/home')->with('error', 'Accès non autorisé.');
    }
}
