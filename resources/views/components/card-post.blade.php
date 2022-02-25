@props(['post'])

<article class="mb-8 overflow-hidden bg-white rounded-lg shadow-lg">

    @if($post->image)
        <img class="object-cover object-center w-full h-72" src="{{Storage::url($post->image->url)}}" alt="">

    @else
        <img class="object-cover object-center w-full h-72" src="https://static.wikia.nocookie.net/gen-impact/images/e/e5/Carta_de_personaje_Paimon.png/revision/latest/top-crop/width/360/height/450?cb=20201020225735&path-prefix=es" alt="">

    @endif

    <div class="px-6 py-8 ">
        <h1 class="mb-2 text-xl font-bold">
            <a href="{{route('posts.show',$post)}}">{{$post->name}}</a>
        </h1>
        <div class="text-base text-gray-700">
            {!!$post->extract!!}
        </div>

        <div class="px-6 pt-4 pb-2">
            @foreach($post->tags as $tag)
                <a href="{{route('posts.tag', $tag)}}" class="inline-block px-3 py-1 mr-2 text-sm text-gray-700 bg-gray-200 rounded-full">{{$tag->name}}</a>
            @endforeach
        </div>
    </div>
</article>
            
