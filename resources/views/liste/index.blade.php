@extends('layouts.app')
@section('content')
<table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">État de la liste</th>
                            <th scope="col">Mode</th>
                            <th scope="col">Date de création</th>
                            <th scope="col"><span class="pull-right">
                                <a href="{{ route( 'liste.create' ) }}" class="btn btn-primary" data-original-title=""><i class="fa fa-plus"></i></a>
                            </span></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listes as $liste)
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
                            <td>{{ $liste->created_at->formatLocalized('%A %d %B %Y à %H:%M') }}</td>
                            <td>
                                {!! Form::open(
                                    [
                                    'method' => 'DELETE',
                                    'route' => ['liste.destroy', $liste->id]
                                    ]
                                )!!}
                                <a href="{{ route('liste.show', $liste->id) }}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-primary" href="{{ route( 'liste.edit', $liste->id ) }}"><i class="fa fa-pencil"></i></a>
                                {{ Form::button('<i class="fa fa-times" aria-hidden="true"></i>', ['class' => 'btn btn-danger', 'type' => 'submit']) }}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
@endsection