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


    <div class="filter-section admin-aligned-filters"> 
        <input type="text" id="filterName" placeholder="Filtrer par nom" class="filter-input">
        <input type="text" id="filterService" placeholder="Filtrer par service" class="filter-input">
        <input type="text" id="filterCountry" placeholder="Filtrer par pays" class="filter-input">
        
        <a href="{{ route('collaborateurs.create') }}" class="add-button" title="Ajouter un collaborateur">
            <i class="fas fa-plus"></i> </a>
    </div>
    

    {{-- **************** Grille d'affichage des collaborateurs *************--}}

    <div class="collaborateurs-grid" id="collaborateursGrid">

        {{--************* Parcours de la liste des collaborateurs ************--}}
     @foreach($collaborateurs as $collaborateur)
            <div class="collaborateur">
                <img src="{{ file_exists(public_path('storage/' . $collaborateur->photo))
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

                <div class="collaborateur-actions">
                    
                    <a href="{{ route('collaborateurs.edit', $collaborateur->id) }}" class="edit-button">Éditer</a>
                    <form action="{{ route('collaborateurs.destroy', $collaborateur->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button" onclick="return confirm('Supprimer ce collaborateur ?')">Supprimer</button>
                    </form>
                </div>

            </div>
     @endforeach

    </div>
</div>
@endsection

@vite(['resources/js/app.js'])