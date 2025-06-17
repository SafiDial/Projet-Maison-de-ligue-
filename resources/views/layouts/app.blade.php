<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord</title>
    @vite(['resources/css/app.css'])
</head>
<body>
    <!-- Header -->
    <header>
        <div class="navbar">
            <div class="logo">
                <img src="{{ asset('images/logo.webp') }}" alt="Logo Maison de Ligue">
            </div>
            <nav>
                <ul class="nav-links">
                    <li>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Déconnexion
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Contenu principal -->
    <main>
        <h1>Bienvenue sur votre tableau de bord</h1>
        <p>Vous êtes connecté en tant que {{ Auth::user()->name }}.</p>
    </main>

    <!-- Footer -->
    <footer class="custom-footer">
        <div class="footer-contact">
            <div class="contact-item">Contact: contact@example.com</div>
            <div class="contact-item">Téléphone: +33 1 23 45 67 89</div>
        </div>
        <div class="footer-final">
            &copy; {{ date('Y') }} Maison des ligues - Tous droits réservés
        </div>
    </footer>
</body>
</html>
