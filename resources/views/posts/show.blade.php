<x-app-layout>
    <div class="container py-8">
        <h1 class="text-4xl font-bold text-gray-600">
            {{$post->name}}
        </h1>
        <div class="mb-2 text-lg text-gray-500">
            {!!$post->extract!!}
        </div>
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
            {{-- contenido principal --}}
            <div class="lg:col-span-2">
                <figure>
                  
                    @if($post->image)
                        <img class="object-cover object-center w-full h-80" src="{{Storage::url($post->image->url)}}" alt="">

                    @else
                        <img class="object-cover object-center w-full h-80" src="https://static.wikia.nocookie.net/gen-impact/images/e/e5/Carta_de_personaje_Paimon.png/revision/latest/top-crop/width/360/height/450?cb=20201020225735&path-prefix=es" alt="">

                    @endif
                    
                </figure>
                <div class="mt-4 text-gray-500 tex-base">
                    {!!$post->body!!}
                </div>
            </div>
            {{-- contenido relacionado --}}
            <aside>
                <h1 class="mb-4 font-bold text-gray-600 text 2x1">
                    Mas en {{$post->category->name}}
                </h1>
                <ul>
                    @foreach ($similares as $similar)
                        <li class="mb-4">
                            <a href="{{route('posts.show', $similar)}}">
                                
                                @if($post->image)
                                    <img class="object-cover object-center h-20 w-36" src="{{Storage::url($similar->image)}}" alt="">
        
                                @else
                                    <img class="object-cover object-center h-20 w-36" src="https://static.wikia.nocookie.net/gen-impact/images/e/e5/Carta_de_personaje_Paimon.png/revision/latest/top-crop/width/360/height/450?cb=20201020225735&path-prefix=es" alt="">
        
                                 @endif
                                <span class="ml-2 text-gray-600">{{$similar->name}}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </aside>
        </div>
    </div>
</x-app-layout>