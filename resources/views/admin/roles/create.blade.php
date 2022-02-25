@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Nuevo Role</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
       {!! Form::open(['routes'=>'admin.roles.store', 'autocomplete'=>'off','files'=>true]) !!}
        
          @include('admin.roles.partials.form')
     
            {!! Form::submit('Crear Role', ['class'=>'btn btn-primary']) !!}
       {!! Form::close() !!}
    </div>
</div>
@stop
