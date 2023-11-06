<x-app-layout>

    <div class="container mx-auto">

       <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                
        <div class="grid grid-cols-3 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4 gap-4">
            @foreach ($favoritePosts as $post)
                {{-- CARD PARA LOS ARTICULOS BUSCADOS --}}

                <div class="bg-white  rounded-lg border p-4">
                    <form action="{{ route('posts.unfavorite', $post) }}" method="POST">
                        @csrf
                        <button type="submit" class="pb-4"> <span class="text-red-500"><i class="fa-solid fa-circle-xmark fa-xl"></i></button>
                    </form>
                    <img src="https://placehold.co/300x200/d1d4ff/352cb5.png" alt="Placeholder Image"
                        class="w-full h-48 rounded-md object-cover">
                    <div class="px-1 py-4">
                        <div class="font-bold text-xl mb-2">{{ $post->name }}</div>
                        {{-- <p class="text-gray-700 text-base">
                            {!! Str::substr($post->body, 0, 50)  !!}
                        </p> --}}

                        <p class="text-black-700 text-base mt-3">
                            <span class="font-bold text-blue-500"><i class="fa-solid fa-eye"></i></span>
                            {{ $post->visitas }}
                        </p>

                        <p class="text-black-700 text-base mt-3">
                            <span class="font-bold text-yellow-500"><i class="fa-solid fa-star"></i></span>
                            {{ $post->calificacion }}
                        </p>

                        

                    </div>


                    <div class="px-1 py-4">
                        <a href="{{ route('post.show', $post) }}" class="text-blue-500 hover:underline">Leer más</a>
                    </div>
                </div>


                {{-- FIN DEL CARD DE LOS ELEMENTOS --}}
            @endforeach
        </div>
        
    </div>
           
       



    </div>
    



</x-app-layout>
