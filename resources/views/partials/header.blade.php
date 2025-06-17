<header>
    <div class="navbar">
        <div class="logo">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
            <img src="{{ asset('images/logo.webp') }}" alt="Logo">
        </div>

        <nav>
            <div class="burger" id="burger">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>

            <ul class="nav-links" id="nav-links">
                @auth
                    <li><a href="{{ route('home') }}">Accueil</a></li>

                    @if(auth()->user()->isAdmin)
                        <li><a href="{{ route('collaborateurs.index') }}">Collaborateurs</a></li>
                    @else
                        <li><a href="{{ route('collaborateurs.index_user') }}">Collaborateurs</a></li>
                    @endif

                    <li>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Déconnexion</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @else
                    <li><a href="{{ route('login') }}" class="login-btn">Connexion</a></li>
                @endauth
            </ul>
        </nav>

        @auth
        <div class="user-profile-container">
            <input type="checkbox" id="toggle-profile-menu" hidden>
            <label for="toggle-profile-menu" class="overlay"></label>

            <div class="user-profile">
                <label for="toggle-profile-menu" class="profile-avatar">
                    <img
                        src="{{ Auth::user()->photo && file_exists(storage_path('app/public/' . Auth::user()->photo))
                            ? asset('storage/' . Auth::user()->photo)
                            : asset('images/default.webp') }}"
                        alt="Photo de profil"
                        width="60" height="60">
                </label>

                <div class="profile-menu">
                    <a href="{{ route('collaborateurs.edit', Auth::user()->id) }}">Éditer le profil</a>

                    @if(auth()->user()->isAdmin)
                        <form action="{{ route('collaborateurs.destroy', Auth::user()->id) }}" method="POST" onsubmit="return confirm('Confirmer la suppression ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Supprimer le profil</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
        @endauth
    </div>
</header>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        const burger = document.getElementById('burger');
        const navLinks = document.getElementById('nav-links');

        burger.addEventListener('click', function () {
            navLinks.classList.toggle('active');
        });
    });
</script>
