<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
@vite(['resources/css/app.css'])

<body>
    <header>
        <div class="navbar">
            <div class="logo">
                <img src="{{ asset('images/logo.webp') }}" alt="Logo Maison de Ligue">
            </div>

            <nav>
                <ul class="nav-links" id="nav-links">
                    <li><a href="{{ route('login') }}" class="login-btn">Connexion</a></li>
                </ul>
            </nav>

            <div class="burger" id="burger">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
        </div>
    </header>

    <main>
        <div class="hero">
            <h1>Bienvenue sur l'intranet</h1>
            <p>La plateforme qui vous permet de retrouver tous vos collaborateurs.</p>
            <a href="{{ route('login') }}" class="cta-btn">Accéder à l'intranet</a>
            <a href="{{ url('/collaborateurs/create') }}" class="cta-btn">Créer un Collaborateur</a>
        </div>
    </main>

    @include('partials.footer')

    @vite(['resources/js/app.js'])

</body>
</html>
