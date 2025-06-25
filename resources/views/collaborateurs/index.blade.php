@vite(['resources/css/colaborateur.css'])

@extends('layouts.layout')

@include('partials.header')

@section('title', 'Liste des Collaborateurs')

@livewireStyles 

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
        <a href="{{ route('collaborateurs.create') }}" class="add-button" title="Ajouter un collaborateur">
            <i class="fas fa-plus"></i> 
        </a>
    </div>
    
    <livewire:collaborateurs-list />

</div>
@endsection

@livewireScripts

@vite(['resources/js/app.js']) 