@extends('layouts.app')
@section('content')
    <h4>Accueil - Professeur</h4></div>
    <div class="panel-body">
        @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <ul class="nav navbar-nav">
        <li><a href="{{ route('liste.index') }}" role="button">Voir les listes</a></li>
        <li><a href="{{ route('liste.uploadZip') }}" role="button">Ajouter une liste via un ZIP / RAR</a></li>
        <li><a href="{{ route('mot.index') }}" role="button">Voir les mots</a></li>
        <li><a href="#" role="button">Voir les classes</a></li></ul>
    </div>
@endsection