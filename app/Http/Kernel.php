<?php

 /** ttes_les requêtes que reçoit_l' application . */
namespace App\Http; 

use Illuminate\Foundation\Http\Kernel as HttpKernel; 

class Kernel extends HttpKernel 
{
    /**
     * Stack global de middlewares HTTP de l'application.
     *
     * Ces middlewares s'exécutent pour CHAQUE requête entrante.
     * Ils gèrent les aspects fondamentaux de toutes les requêtes.
     */
    protected $middleware = [
        \App\Http\Middleware\TrustProxies::class, // Gère la confiance envers les serveurs proxy.
        \Illuminate\Http\Middleware\HandleCors::class, // Gère les requêtes cross-origin (CORS).
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class, // Bloque les requêtes si l'application est en mode maintenance.
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class, // Vérifie la taille des données POST.
        \App\Http\Middleware\TrimStrings::class, // Nettoie les chaînes de caractères (supprime les espaces superflus).
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class, // Convertit les chaînes vides en NULL.
    ];

    /**
     * Groupes de middlewares de routes de l'application.
     *
     * Ces groupes permettent d'appliquer un ensemble de middlewares à des catégories spécifiques de routes (web, API).
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class, // Chiffre les cookies.
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class, // Ajoute les cookies à la réponse.
            \Illuminate\Session\Middleware\StartSession::class, // Démarre et gère la session utilisateur.
            \Illuminate\View\Middleware\ShareErrorsFromSession::class, // Partage les erreurs de validation avec les vues.
            \App\Http\Middleware\VerifyCsrfToken::class, // Protection CSRF pour les formulaires.
            \Illuminate\Routing\Middleware\SubstituteBindings::class, // Résout automatiquement les dépendances de routes (ex: {user} devient un objet User).
            \App\Http\Middleware\PreventBackHistory::class, // Empêche le retour en arrière dans l'historique du navigateur (si personnalisé).
        ],
        'api' => [
            \Illuminate\Routing\Middleware\ThrottleRequests::class . ':api', // Limite le nombre de requêtes pour les API.
            \Illuminate\Routing\Middleware\SubstituteBindings::class, // Résout les dépendances de routes pour les API.
        ],
    ];

    /**
     * Alias des middlewares.
     *
     * Ces alias permettent d'assigner facilement des middlewares aux routes en utilisant un nom court.
     */
    protected $middlewareAliases = [
        'auth' => \App\Http\Middleware\Authenticate::class, // Middleware d'authentification.
        'can' => \Illuminate\Auth\Middleware\Authorize::class, // Vérification des permissions (Gates/Policies).
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class, // Redirige si l'utilisateur est déjà authentifié.
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class, // Alias pour la limitation des requêtes.
    ];

    /**
     * Middlewares spécifiques aux routes (souvent pour les middlewares personnalisés).
     */
    protected $routeMiddleware = [
        'admin' => \App\Http\Middleware\AdminMiddleware::class, // Votre middleware personnalisé pour vérifier le rôle d'administrateur.
    ];
}