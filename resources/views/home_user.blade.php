<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    @vite(['resources/css/login.css'])
</head>
<body>
    
    @include('partials.header')

    <section class="accueil-section">
        <div class="accueil-content">
            <h1>BIENVENUE SUR L'INTRANET</h1>
            <p>Bonjour <strong>{{ Auth::user()->name }}</strong>, la plateforme de l'entreprise vous permet de retrouver tous vos collaborateurs.</p>
        </div>
    </section>

    <!--******************* Section user Bonjour *****************-->

    @if($collaborateur)
    <section class="welcome-section">
        <div class="user-greeting">
            <p>Avez-vous dit bonjour à</p>
            <div class="user-info">
                <div class="user-image">
                    <img 
                        src="{{ $collaborateur->photo && file_exists(storage_path('app/public/' . $collaborateur->photo)) 
                            ? asset('storage/' . $collaborateur->photo) 
                            : asset('images/default.webp') }}" 
                        alt="Photo de {{ $collaborateur->name }}" 
                        width="120" height="120" 
                        style="border-radius: 10px;">
                </div>
                <div class="user-details">
                    <p><strong>Nom :</strong> {{ $collaborateur->name }}</p>
                    <p><strong>Service :</strong> {{ $collaborateur->service }}</p>
                    <p><strong>Ville :</strong> {{ $collaborateur->city }}</p>
                    <p><strong>Pays :</strong> {{ $collaborateur->country }}</p>
                </div>
            </div>
            <div class="user-actions">
                <button class="say-hello">Dire bonjour</button>

                <!--*********** lien en fonction du rôle ***********-->
                
                <a href="{{ auth()->user()->isAdmin ? route('collaborateurs.index') : route('collaborateurs.index_user') }}">
                    <button class="say-hello-other">Dire bonjour à quelqu'un d'autre</button>
                </a>
            </div>
        </div>
    </section>
    @endif

    @include('partials.footer')

</body>
</html>
