<div class="card">
    <div class="card-header">
      <input wire:model="search" class="form-control" placeholder="Ingrese el nombre del Post">
    </div>
    @if($posts->count())
        <div class="card-body">
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->name}}</td>
                            <td width="10px">
                                <a clase="btn-primary btn-sm" href="{{route('admin.posts.edit', $post)}}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.post.destroy', $post)}}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{$post->links()}}
        </div> 
    @else
        <div class="card-body">
            <strong>No hay ningun registro...</strong>
        </div>

    @endif
</div>
