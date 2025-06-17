@vite(['resources/css/editer.css'])

@extends('layouts.layout')

@include('partials.header')

@section('content')
    <h1>Éditer Collaborateur</h1>

    @if (session('error'))
        <div style="color: red;">{{ session('error') }}</div>
    @endif

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('collaborateurs.update', $collaborateur->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Nom</label>
            <input type="text" name="name" id="name" value="{{ old('name', $collaborateur->name) }}" required>
        </div>

        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $collaborateur->email) }}" required>
        </div>

        <div>
            <label for="phone">Téléphone</label>
            <input type="text" name="phone" id="phone" value="{{ old('phone', $collaborateur->phone) }}" pattern="\+?[0-9]{10,15}">
            <small>Format : +1234567890 ou 0123456789</small>
        </div>

        <div>
            <label for="birthdate">Date de naissance</label>
            <input type="date" name="birthdate" id="birthdate" value="{{ old('birthdate', $collaborateur->birthdate) }}">
        </div>

        <div>
            <label for="city">Ville</label>
            <input type="text" name="city" id="city" value="{{ old('city', $collaborateur->city) }}">
        </div>

        <div>
            <label for="country">Pays</label>
            <input type="text" name="country" id="country" value="{{ old('country', $collaborateur->country) }}">
        </div>

        <div>
            <label for="service">Service</label>
            <input type="text" name="service" id="service" value="{{ old('service', $collaborateur->service) }}" required>
        </div>
 
        <div>
            <label for="photo">Photo <span title="Télécharger une photo">⬇️</span></label>
            <input type="file" name="photo" id="photo" class= "dowload" >
        @if ($collaborateur->photo)
                <div>
                    <img src="{{ asset('storage/' . $collaborateur->photo) }}" alt="Photo actuelle" width="100">
                </div>
        @endif
        </div>

        <div>
            <label for="password">Mot de passe (laisser vide si inchangé)</label>
            <input type="password" name="password" id="password">
        </div>

    @if (auth()->user()->isAdmin == 1) 
    <div>
        <label for="isAdmin">Administrateur ?</label>
        <select name="isAdmin" id="isAdmin">
            <option value="0" {{ old('isAdmin', $collaborateur->isAdmin) == 0 ? 'selected' : '' }}>Non</option>
            <option value="1" {{ old('isAdmin', $collaborateur->isAdmin) == 1 ? 'selected' : '' }}>Oui</option>
        </select>
    </div>
@endif

<div class="button-group">
    <button type="submit" class="button-styled">Mettre à jour</button>
    <a href="{{ auth()->user()->isAdmin == 1 ? route('collaborateurs.index') : route('collaborateurs.index_user') }}" class="button-styled">Annuler</a>
</div>

        

    </form>
@endsection

@vite(['resources/js/app.js'])