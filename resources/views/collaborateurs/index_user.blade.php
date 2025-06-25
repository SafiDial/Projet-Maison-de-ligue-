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

    @livewire('collaborateurs-list')


</div>
@endsection

 @vite(['resources/js/app.js']) 