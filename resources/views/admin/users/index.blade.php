@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    
    <a class="btn btn-secondary btn-sm float-right" href="{{routes('admin.users.create')}}">Nuevo Post</a>
    
    <h1>Listado de Usuarios</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    
    @livewire('admin.users-index')
@stop
