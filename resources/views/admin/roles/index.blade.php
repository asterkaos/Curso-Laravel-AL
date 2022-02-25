@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    
    <a class="btn btn-secondary btn-sm float-right" href="{{routes('admin.roles.create')}}">Nuevo Rol</a>
    
    <h1>Listado de Roles</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
      
        <div class="card-body">
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Role</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{$role->id}}</td>
                            <td>{{$role->name}}</td>
                            <td width="10px">
                                @can('admin.roles.edit')
                                    <a clase="btn-primary btn-sm" href="{{route('admin.roles.edit', $role)}}">Editar</a>

                                @endcan
                            </td>
                            <td width="10px">
                                @can('admin.roles.destroy')
                                    <form action="{{route('admin.roles.destroy', $role)}}" method="POST">
                                        @csrf
                                        @method('delete')

                                        <button type="submit btn-danger btn-sm">Eliminar</button>
                                    </form>
                                @endcan
                            </td>
                        </tr>role
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
