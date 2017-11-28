@extends('layouts.app')

@section('head')
<link rel="stylesheet" href="<?php echo asset('vendor/dropzoner/dropzone/dropzone.min.css'); ?>">
@endsection

@section('content')
<div class="panel-heading"><h4>Créer un mot</h4></div>
<div class="panel-body">
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <ul class="nav navbar-nav">
    {!! Form::open(array('route' => 'upload-files.store','method'=>'POST','files'=>true)) !!}
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Mot:</strong>
                {!! Form::text('name', null, array('placeholder' => 'Mot','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Image:</strong>
                {!! Form::file('mot_image', array('class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Son:</strong>
                {!! Form::file('mot_son', array('class' => 'form-control')) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::submit('Créer le mot !',
            array('class'=>'btn btn-primary')) !!}
        </div>
    </div>
    {!! Form::close() !!}
    @endsection