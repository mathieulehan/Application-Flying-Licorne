@extends('layouts.app')
@section('content')
<table class="table">
    <thead>
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Date</th>
            <th scope="col">Ajouter</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($mots as $mot)
        <tr>
            <td>{{ $mot->name }}</td>
            <td>{{ $mot->created_at->formatLocalized('%A %d %B %Y à %H:%M') }}</td>
            <td>
            <a class="btn btn-success" href="{{ route( 'liste.ajouterMot',['liste'=>$liste,'mot'=>$mot] ) }}"><i class="fa fa-plus"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
 <a class="btn btn-info" href="{{ route('liste.show', $liste->id) }}">Retour</a>
@endsection