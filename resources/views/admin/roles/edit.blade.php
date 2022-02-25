@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Rol</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
           {!! Form::model($role['routes'=>['admin.roles.update', $post], 'autocomplete'=>'off','files'=>true, 'method'=>'put']) !!}
            
              @include('admin.roles.partials.form')
         
                {!! Form::submit('Actualizar Rol', ['class'=>'btn btn-primary']) !!}
           {!! Form::close() !!}
        </div>
    </div>
@stop
@section('css')
    <style>
        .image-wrapper{
            position: relative;
            padding-bottom: 56.25%;
        }
        .image-wrapper{
            position:absolute;
            object-fit: cover;
            width:100%;
            height:100%;

        }

    </style>
@stop
@section('js')

    
<script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script>
    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    
        ClassicEditor
        .create( document.querySelector( '#extract' ) )
        .catch( error => {
            console.error( error );
        } );
        ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );

        document.getElementById("file").addEventListener('change', cambiarImagen);

        function cambiarImagen(event){
            var file= event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) =>{
                document.getElementById("picture").setAtribute('src', event, target.result);
            };

            reader.readAsDataUrl(file);
        }


    </script>
@endsection