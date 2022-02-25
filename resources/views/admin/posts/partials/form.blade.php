<div class="form-group">
                
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Ingrese el nombre del Post']) !!}
    @error('name')
    <small class="text-danger">{{$message}}</small> 
    @enderror
</div>

<div class="form-group">
    {!! Form::label('sluh', 'Slug') !!}
    {!! Form::text('slug', null, ['class'=>'form-control', 'placeholder'=>'Ingrese el slug del Post'],'readonly') !!}

    @error('slug')
    <small class="text-danger">{{$message}}</small> 
    @enderror
</div>
<div class="form-group">
    {!! Form::label('category_id', 'Categoria') !!}
    {!! Form::text('category_id', $categories, ['class'=>'form-control']) !!}

    @error('category_id')
    <small class="text-danger">{{$message}}</small> 
    @enderror
</div>
<div class="form-group">
   <p class="font-weight-bold">Etiquetas </p>

   @foreach ($tags as $tag)
       <label class="mr-2" >
           {!! Form::checkbox('tags[]', $tag->id, null) !!}
           {{$tag->name}}
       </label>
   @endforeach

       

   @error('tags')
   <br>
   <small class="text-danger">{{$message}}</small> 
   @enderror

</div>

<div class="form_group">
<p class="font-weight-bold">Estado </p>

<label>
    {!! Form::radio('status', 1, true) !!}
    Borrador
</label>
<label>
    {!! Form::radio('status', 2, true) !!}
    Publicado
</label>

@error('status')
   <br>
   <small class="text-danger">{{$message}}</small> 
   @enderror


</div>
<div class="row mb-3">
   <div class="col">
       <div class="image-wrapper">
        @isset($post->image)
            <img id="picture" src="{{Storage::url($post->image->url)}}">
            
        @else
            <img id="picture" src="https://static.wikia.nocookie.net/gen-impact/images/e/e5/Carta_de_personaje_Paimon.png/revision/latest/top-crop/width/360/height/450?cb=20201020225735&path-prefix=es">
        @endisset
       </div>
   </div>
   <div class="col">
        <div class="form-group">
           {!! Form::label('file', 'Imagen que se mostrara en el post') !!}
            {!! Form::file('file', ['class'=> 'form-control-file','accept'=>'image/*']) !!}
        </div>
        @error('file')
        <br>
        <span class="text-danger">{{$message}}</span> 
        @enderror
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corrupti aliquam eveniet neque velit perferendis tenetur, quam fugit doloribus eius nemo dignissimos, ipsa dolorum? Saepe eaque ea quisquam molestias? Vero, quia?</p>

   </div>
</div>
<div class="form-group">
   {!! Form::label('extract', 'Extracto') !!}
   {!! Form::textarea('extract', null, ['class'=>'form-control']) !!}

   @error('extract')
        <small class="text-danger">{{$message}}</small> 
   @enderror

</div>
<div class="form-group">
    {!! Form::label('body', 'Cuerpo del Post') !!}
    {!! Form::textarea('body', null, ['class'=>'form-control']) !!}

    @error('body')
        <small class="text-danger">{{$message}}</small> 
    @enderror
</div>
