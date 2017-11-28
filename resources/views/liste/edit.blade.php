@extends('layouts.app')
@section('content')
<div class="panel-heading"><h4>Éditer la liste </h4></div>
<div class="panel-body">
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <ul class="nav navbar-nav">
        {!! Form::model($liste, array('route' => array('liste.update', $liste->id), 'files' => true, 'method' => 'PUT')) !!}
        <div class="form-group">
            {!! Form::label('Nom de la liste') !!}
            {!! Form::text('name', null,
            array('required',
            'class'=>'form-control',
            'placeholder'=>'Entrer le nom')) !!}
        </div>
        <div class="form-group">
            <label for="isPublic">Liste publique</label>
            <input type="hidden" name="isPublic" value="0" />
            <input type="checkbox" name="isPublic" value="1" />
        </div>
        <div class="form-group">
            {!! Form::label('Mode') !!}
            {{ Form::select('mode', [
            '1' => 'Apprentissage guidé',
            '2' => 'Apprentissage non guidé',
            '3' => 'Contrôle']
            ) }}
        </div>
        <div class="form-group">
            <a class="btn btn-info" href="{{ route( 'liste.index') }}">Retour</a>
            {!! Form::submit('Éditer!', ['class' => 'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
    @endsection