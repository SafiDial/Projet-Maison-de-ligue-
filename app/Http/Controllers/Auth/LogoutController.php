<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        //************ Déconnecter l'utilisateur
        Auth::logout();

        //***********  Détruire la session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        //*********** Rediriger vers la page d'accueil ou une autre page
        return redirect('/');
    }
}
