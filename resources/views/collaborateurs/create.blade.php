<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <title>Ajouter un collaborateur</title>
    @vite('resources/css/create.css')
    @include('partials.header')



    <main>
        <h1 class="add-collaborator-title">Ajouter un collaborateur</h1>

        <!--************** Inclusion des messages de notifications / erreurs **************-->
        
        @include('components.messages')

        <section class="welcome-section">
            <div class="image-text-container">
                <img src="{{ asset('images/bienvenu.png') }}" alt="Logo Maison de Ligue">
                <div class="text-container">
                    <h2>Bienvenue !</h2>
                    <p>Nous sommes ravis de vous accueillir. Veuillez remplir le formulaire ci-dessous pour ajouter un nouveau collaborateur.</p>
                </div>
            </div>
        </section>

        <!--******************* Formulaire pour ajouter un collaborateur ********************-->

        <form action="{{ route('collaborateurs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label for="name">Nom :</label>
            <input type="text" name="name" id="name" placeholder="Entrez votre nom" value="{{ old('name') }}" required>

            <label for="email">Email :</label>
            <input type="email" name="email" id="email" placeholder="Entrez votre email" value="{{ old('email') }}" required>

            <label for="phone">Téléphone :</label>
            <input type="text" name="phone" id="phone" placeholder="Entrez votre numéro de téléphone" value="{{ old('phone') }}" required>

            <label for="birthdate">Date de naissance :</label>
            <input type="date" name="birthdate" id="birthdate" value="{{ old('birthdate') }}" required>

            <label for="city">Ville :</label>
            <input type="text" name="city" id="city" placeholder="Entrez votre ville" value="{{ old('city') }}" required>

            <label for="country">Pays :</label>
            <input type="text" name="country" id="country" placeholder="Entrez votre pays" value="{{ old('country') }}" required>

            <label for="service">Service :</label>
            <input type="text" name="service" id="service" placeholder="Entrez votre service" value="{{ old('service') }}" required>

            <label for="photo">Photo :</label>
            <input type="file" name="photo" id="photo" accept="image/*">

            <label for="password">Mot de passe :</label>
            <input type="password" name="password" id="password" placeholder="Entrez votre mot de passe" required>

            <button type="submit" class="btn-ajout">Ajouter le collaborateur</button>
        </form>
    </main>

    @include('partials.footer')

    @vite(['resources/js/app.js'])

</body>
</html>
