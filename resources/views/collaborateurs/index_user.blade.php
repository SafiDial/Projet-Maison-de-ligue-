<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

@vite(['resources/css/colaborateur.css'])

@extends('layouts.layout')

@include('partials.header')

@section('title', 'Liste des Collaborateurs')

@section('content')
<div class="collaborateurs-container">
    <h1>Tous les Collaborateurs</h1>

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    @if(session('error'))
        <p style="color: red">{{ session('error') }}</p>
    @endif

    <div class="filter-section">
        <input type="text" id="filterName" placeholder="Filtrer par nom" class="filter-input">
        <input type="text" id="filterService" placeholder="Filtrer par service" class="filter-input">
        <input type="text" id="filterCountry" placeholder="Filtrer par pays" class="filter-input">
    </div>
    
    {{-- **************** Grille d'affichage des collaborateurs ************* --}}

    <div class="collaborateurs-grid" id="collaborateursGrid">

        {{--************* Parcours de la liste des collaborateurs ************--}}

     @foreach($collaborateurs as $collaborateur)
        <div class="collaborateur">

            {{-- ************ Affichage de la photo du collaborateur ou d'une image par défaut ********** --}}
            <img
                src="{{ $collaborateur->photo && file_exists(storage_path('app/public/' . $collaborateur->photo))
                    ? asset('storage/' . $collaborateur->photo)
                    : asset('images/default.webp') }}"
                alt="{{ $collaborateur->name }}"
                class="collaborateur-image">

            {{--********** Informations principales du collaborateur ********--}}
            <div class="collaborateur-info">
                <p><i class="fas fa-user"></i> Nom: {{ $collaborateur->name }}</p>
                <p><i class="fas fa-briefcase"></i> Service: {{ $collaborateur->service }}</p>
                <p><i class="fas fa-city"></i> Ville: {{ $collaborateur->city }}</p>
                <p><i class="fas fa-flag"></i> Pays: {{ $collaborateur->country }}</p>
            </div>
        </div>
     @endforeach
    </div>
</div>
@endsection

@vite(['resources/js/app.js'])
<script>


</SCript>

<Style>

.collaborateur.hidden {
    display: none;
}

/* Style global */
.filter-section {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 20px;
    margin-bottom: 30px;
    flex-wrap: wrap; /* Permet aux éléments de passer à la ligne sur les petits écrans */
}

.filter-input {
    padding: 12px 20px;
    border: 2px solid #d0a0e0; /* Violet léger */
    border-radius: 30px;
    width: 250px;
    font-size: 16px;
    background-color: rgba(255, 255, 255, 0.2); /* Transparent avec fond blanc léger */
    color: #4c2a72; /* Violet foncé */
    transition: all 0.3s ease;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    outline: none;
}

.filter-input:focus {
    border-color: #ff66b2; /* Rose lumineux */
    background-color: rgba(255, 255, 255, 0.4); /* Fond légèrement plus opaque quand le champ est actif */
    box-shadow: 0 0 10px rgba(255, 102, 178, 0.5); /* Effet lumineux rose */
}

.filter-section input::placeholder {
    color: #d0a0e0; /* Violet pâle pour les placeholders */
    font-style: italic;
}

.filter-section .filter-input {
    text-align: center;
    font-weight: 500;
}

.filter-section .filter-input:hover {
    border-color: #6a4c9c; /* Violet moyen */
    background-color: rgba(255, 255, 255, 0.3); /* Légèrement plus opaque au survol */
}

.filter-section .filter-input:focus::placeholder {
    color: #ff66b2; /* Rose lumineux pour le placeholder */
}

/* Style du bouton d'ajout avec icône */
.add-button {
    background-color: #6a4c9c; /* Violet moyen */
    color: white;
    font-size: 24px;
    width: 50px;
    height: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    text-align: center;
    text-decoration: none;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.add-button:hover {
    background-color: #ff66b2; /* Rose lumineux au survol */
    box-shadow: 0 6px 8px rgba(255, 102, 178, 0.2); /* Effet lumineux rose */
}

/* Optionnel : Modifier la taille de l'icône à l'intérieur du bouton */
.add-button i {
    font-size: 24px;
}

/* MEDIA QUERIES POUR RENDRE LE DESIGN RESPONSIVE */

/* Sur les écrans plus petits, les éléments se réorganisent */
@media (max-width: 768px) {
    .filter-section {
        justify-content: flex-start; /* Aligne les éléments à gauche */
        gap: 10px;
    }

    .filter-input {
        width: 200px; /* Réduit la taille des champs de filtrage */
        font-size: 14px;
    }

    .add-button {
        font-size: 22px;
        width: 45px;
        height: 45px;
    }
}

/* Sur les écrans très petits, on empile les éléments */
@media (max-width: 480px) {
    .filter-section {
        justify-content: center; /* Centrer les éléments sur les petits écrans */
        flex-direction: column; /* Empiler les éléments verticalement */
        gap: 15px;
    }

    .filter-input {
        width: 100%; /* Les champs de filtre prennent toute la largeur */
        max-width: 300px; /* Limite la largeur à 300px */
        font-size: 14px;
    }

    .add-button {
        font-size: 20px;
        width: 40px;
        height: 40px;
    }
}


</Style>