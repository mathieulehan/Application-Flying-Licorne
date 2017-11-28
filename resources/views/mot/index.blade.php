@extends('layouts.app')
@section('content')
<table class="table">
    <thead>
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Date</th>
            <th scope="col">Son</th>
            <th scope="col">Image</th>
            <th scope="col"><span class="pull-right">
                <a href="{{ route( 'mot.create' ) }}" class="btn btn-primary" data-original-title=""><i class="fa fa-plus"></i></a>
            </span></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($mots as $mot)
        <tr>
            <td>{{ $mot->name }}</td>
            <td>{{ $mot->created_at->formatLocalized('%A %d %B %Y à %H:%M') }}</td>
            <td>
                <a href='{{ asset("sons/$mot->mot_son") }}'>{{ $mot->mot_son }}</a>
            </td>
            <td>
                <a href='{{ asset("images/$mot->mot_image") }}'>{{ $mot->mot_image }}</a>
            </td>
            <td>
                {!! Form::open(
                [
                'method' => 'DELETE',
                'route' => ['mot.destroy', $mot->id]
                ]
                )!!}
                <a href="{{ route('mot.show', $mot->id) }}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                <a class="btn btn-primary" href="{{ route( 'mot.edit', $mot->id ) }}"><i class="fa fa-pencil"></i></a>
                {{ Form::button('<i class="fa fa-times" aria-hidden="true"></i>', ['class' => 'btn btn-danger', 'type' => 'submit']) }}
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection