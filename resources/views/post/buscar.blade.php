<x-app-layout>

    <div class="container mx-auto">

        <div class="">
            <header class="">
                <div class="py-6">
                    <h1 class="text-3xl font-bold tracking-tight text-gray-900">Recursos Educativos</h1>
                </div>
            </header>

            <div class="mt-6 py-3 flex max-w-md gap-x-4">

                <form class="w-full flex gap-x-4" method="get" action="{{ url('/buscar') }}">

                    <label for="buscar" class="sr-only">Buscar</label>
                    <input id="buscar" name="buscar" type="search" autocomplete="email"
                        class="min-w-0 flex-auto rounded-md border-0 bg-white/5 px-3.5 py-2 text-black shadow-md ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6"
                        placeholder="Buscar...">
                    <button type="submit"
                        class="flex-none rounded-md bg-indigo-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500"><i class="fa-solid fa-magnifying-glass"></i></button>

                </form>

            </div>


            <header>
                <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                    <h1 class="text-3xl font-bold tracking-tight text-gray-900 text-center">Encontrados</h1>
                </div>
            </header>


            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                
                <div class="grid grid-cols-3 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4 gap-4">
                    @foreach ($datos as $post)
                        {{-- CARD PARA LOS ARTICULOS BUSCADOS --}}

                        <div class="bg-white  rounded-lg border p-4">
                            @if ($post->image)
                        <img class="w-full h-80 object-cover object-center" src="{{ Storage::url($post->image->url) }}"
                            alt="">
                    @else
                        <img class="w-full h-80 object-cover object-center"
                            src="https://cdn.pixabay.com/photo/2017/01/30/02/20/mental-health-2019924_1280.jpg"
                            alt="">
                    @endif
                            <div class="px-1 py-4">
                                <div class="font-bold text-xl mb-2">{{ $post->name }}</div>
                                {{-- <p class="text-gray-700 text-base">
                                    {!! Str::substr($post->body, 0, 20)   !!}
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
                {{ $datos->links() }}
            </div>



        </div>
    </div>



</x-app-layout>
