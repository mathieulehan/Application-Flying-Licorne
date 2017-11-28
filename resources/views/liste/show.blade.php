@extends('layouts.app')
@section('content')
<table class="table">
    <thead>
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">État de la liste</th>
            <th scope="col">Mode</th>
            <th scope="col">Date de création</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $liste->name }}</td>
            <td>
                @if ( $liste->isPublic =='1' )
                    Publique
                @else
                    Privée
                @endif
            </td>
            <td>
                @if ( $liste->mode =='1' )
                    Apprentissage guidé
                @elseif ($liste->mode =='2')
                    Apprentissage non guidé
                @elseif ($liste->mode =='3')
                    Contrôle
                @endif
            </td>
            <td>{{ $liste->created_at->formatLocalized('%A %d, %B %Y à %H:%M') }}</td>
        </tr>
    </tbody>
</table>
<hr>
<h4>Mots contenus dans la liste "{{ $liste->name }}" :</h4>
<hr>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Mot</th>
            <th scope="col">Son</th>
            <th scope="col">Image</th>
            <th scope="col">Actions</th>
            <th><a href="{{ route( 'liste.ajoutMot', $liste->id) }}" class="btn btn-primary" data-original-title=""><i class="fa fa-plus"></i></a></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($liste->mots as $mot)
        <tr>
            <td>{{ $mot->name }}</td>
            <td>
                <a href='{{ asset("sons/$mot->mot_son") }}'>{{ $mot->mot_son }}</a>
            </td>
            <td>
                <a href='{{ asset("images/$mot->mot_image") }}'>{{ $mot->mot_image }}</a>
            </td>
            <td>
                <a class="btn btn-danger" href="{{ route( 'liste.enleverMot',['liste'=>$liste,'mot'=>$mot] ) }}"><i class="fa fa-times"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<a class="btn btn-info" href="{{ route( 'liste.index') }}">Retour</a>
@stop