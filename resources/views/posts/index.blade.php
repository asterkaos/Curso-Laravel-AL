<x-app-layout>

    <div class="container py-8">

        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($posts as $post)
                <article class="w-full h-80 bg-cover bg-center @if($loop->first) md:col-span-2 @endif" style="background-image: url(@if($post->image){{Storage::url($post->image->url)}}@else https://static.wikia.nocookie.net/gen-impact/images/e/e5/Carta_de_personaje_Paimon.png/revision/latest/top-crop/width/360/height/450?cb=20201020225735&path-prefix=es @endif) ">
                   <div class="flex flex-col justify-center w-full h-full px-8">
                        <div>
                            @foreach ($post->tags as $tag)
                            <a href="{{route('posts.tag', $tag)}}" class="inline-block px-3 h-6 bg-{{$tag->color}}-600 text-white rounded-full">
                                {{$tag->name}}
                            </a>
                            @endforeach
                            </div>
                        <h1 class="mt-2 text-4xl font-bold leading-8 text-white">
                            <a href="{{route('post.show', $post)}}">
                                {{$post->name}}
                            </a>
                        </h1>
                   </div>
                </article>
            @endforeach
        </div>

        <div class="mt-4">
            {{$post->links}}
        </div>

    </div>

</x-app-layout>