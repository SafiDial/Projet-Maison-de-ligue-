<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    @vite('resources/css/connexion.css')
    @vite(['resources/js/app.js'])

</head>
<body>
    <header>
        <div class="navbar">
            <div class="logo">
                <img src="{{ asset('images/logo.webp') }}" alt="Logo Maison de Ligue" width="150">
            </div>
            <nav>
                <ul class="nav-links">
                    <li><a href="{{ url('/') }}">Accueil</a></li>
                </ul>
            </nav>
            <div class="burger">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
        </div>
    </header>

    <main class="page-connexion">
        <h1 class="titre">Connexion</h1>
        <div class="formulaire">
            <form action="{{ route('login') }}" method="POST">
                @csrf 
                <input type="email" name="email" placeholder="Identifiant" required>
                <input type="password" name="password" placeholder="Mot de passe" required>
                <button type="submit">Se connecter</button>
            </form>
        </div>
    </main>

    @include('partials.footer')

    @vite(['resources/js/app.js'])
</body>
</html>























