<x-app-layout>

    <div class="w-full mx-auto">

        <div class="max-w-7x1 mx-auto px-2 sm:px-6 lg:px-8 py-8">
            <header class="bg-white shadow ">
                <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 ">
                    <h1 class="text-3xl font-bold tracking-tight text-gray-900 ">Recursos Educativos</h1>
                </div>
            </header>

            <div class="mt-6 mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

                <form class="w-96 flex gap-x-2" method="get" action="{{ url('/buscar') }}">

                    <div class="block relative">
                        <span class="h-full absolute inset-y-0 left-0 flex items-center pl-2">
                            <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current text-gray-500">
                                <path
                                    d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z">
                                </path>
                            </svg>
                        </span>
                        <input placeholder="Buscar" name="buscar" id="buscar" type="search"
                            class="appearance-none rounded-r rounded-l sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
                    </div>
                    <button type="submit"
                        class="flex-none rounded-md bg-indigo-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                        <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current text-black-500">
                            <path
                                d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z">
                            </path>
                        </svg>
                    </button>

                </form>


            </div>




            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <header class="bg-white shadow ">
                    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 ">
                        <h1 class="text-3xl font-bold tracking-tight text-gray-900 ">Artículos</h1>
                    </div>
                </header>
            </div>

            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4 gap-4">

                    @foreach ($posts as $post)
                        @if ($post->postable_type == 'Articulo')
                            <div class="rounded-2xl flex-wrap overflow-hidden  h-80 bg-cover bg-center"
                                style="background-image: url(@if ($post->image) {{ Storage::url($post->image->url) }} @else https://cdn.pixabay.com/photo/2017/01/30/02/20/mental-health-2019924_1280.jpg @endif)">


                                <div class="w-full h-full px-8 flex flex-col justify-center">

                                    <h1 class="text-4xl text-white leading-8 font-bold">
                                        <a href="{{ route('post.show', $post) }}">

                                            {{ $post->name }}
                                        </a>
                                    </h1>
                                    <div class="py-3">
                                        <p class="inline-block px-3 h-6 bg-gray-200 text-gray rounded">
                                            <span class="font-bold text-blue-500 "><i class="fa-solid fa-eye"></i></span>
                                            {{ $post->visitas }}
                                        </p>
                                    </div>
                                    <div class="py-3">
                                        <p class="inline-block px-3 h-6 bg-gray-200 text-gray rounded">
                                            <span class="font-bold text-yellow-500"><i class="fa-solid fa-star"></i></span>
                                            {{ $post->calificacion }}
                                        </p>
                                    </div>
                                    {{-- Status 1 = Deshabilitado --}}
                                    {{-- Status 2 = Habilitado --}}
                                    <div class="py-3">
                                        <div class="inline-block px-3 h-6 bg-gray-200 text-gray rounded">
                                            <a href="{{ route('post.show', $post) }}" class="text-blue-500 hover:underline">Leer más</a>
                                        </div>
                                    </div>

                                    {{-- INICIO FORMULARIO FAVORITO  --}}

                                    @if (auth()->check())
                                        <div class="py-3">
                                            @if (auth()->user()->posts->contains($post))
                                                <!-- El recurso es favorito para el usuario -->
                                                <form action="{{ route('posts.unfavorite', $post) }}" method="POST">
                                                    @csrf
                                                    <div class="inline-block px-3 h-6 bg-gray-200 text-gray rounded">
                                                        <button type="submit" class="text-red-500">Eliminar de favoritos</button>
                                                    </div>
                                                </form>
                                            @else
                                                <!-- El recurso no es favorito para el usuario -->
                                                <form action="{{ route('resources.markAsFavorite', $post) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="submit"
                                                        class="min-w-auto w-7 h-7 bg-yellow-300 p-2 rounded-full hover:bg-yellow-500 transition-colors duration-50 hover:animate-pulse ease-out text-white font-semibold">
                                                        <img src="{{ asset('img/favorito.png') }}" alt="">
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    @endif

                                    {{-- FIN FORMULARIO FAVORITO --}}

                                </div>
                            </div>
                        @endif
                    @endforeach

                </div>
            </div>


        </div>



        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <header class="bg-white shadow ">
                <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 ">
                    <h1 class="text-3xl font-bold tracking-tight text-gray-900 ">Vídeos</h1>
                </div>
            </header>
        </div>


        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4 gap-4">

                @foreach ($posts as $post)
                    @if ($post->postable_type == 'Video')
                        <article
                            class=" rounded-2xl w-full h-80 bg-cover bg-center @if ($loop->first) col-span-2 @endif"
                             style="background-image: url({{ url('storage/' . $post->image->url) }})"  >


                            <div class="w-full h-full px-8 flex flex-col justify-center">

                                <h1 class="text-4xl text-white leading-8 font-bold">
                                    <a href="{{ route('post.show', $post) }}">

                                        {{ $post->name }}

                                    </a>
                                </h1>
                                <div class="py-3">
                                    <p class="inline-block px-3 h-6 bg-gray-200 text-gray rounded">
                                        <span class="font-bold text-blue-500 "><i class="fa-solid fa-eye"></i></span>
                                        {{ $post->visitas }}
                                    </p>
                                </div>
                                <div class="py-3">
                                    <p class="inline-block px-3 h-6 bg-gray-200 text-gray rounded">
                                        <span class="font-bold text-yellow-500"><i class="fa-solid fa-star"></i></span>
                                        {{ $post->calificacion }}
                                    </p>
                                </div>
                                {{-- Status 1 = Deshabilitado --}}
                                {{-- Status 2 = Habilitado --}}
                                <div class="py-3">
                                    <div class="inline-block px-3 h-6 bg-gray-200 text-gray rounded">
                                        <a href="{{ route('post.show', $post) }}" class="text-blue-500 hover:underline">Leer más</a>
                                    </div>
                                </div>

                                {{-- INICIO FORMULARIO FAVORITO  --}}

                                @if (auth()->check())
                                    <div class="py-3">
                                        @if (auth()->user()->posts->contains($post))
                                            <!-- El recurso es favorito para el usuario -->
                                            <form action="{{ route('posts.unfavorite', $post) }}" method="POST">
                                                @csrf
                                                <div class="inline-block px-3 h-6 bg-gray-200 text-gray rounded">
                                                    <button type="submit" class="text-red-500">Eliminar de favoritos</button>
                                                </div>
                                            </form>
                                        @else
                                            <!-- El recurso no es favorito para el usuario -->
                                            <form action="{{ route('resources.markAsFavorite', $post) }}"
                                                method="POST">
                                                @csrf
                                                <button type="submit"
                                                    class="min-w-auto w-7 h-7 bg-yellow-300 p-2 rounded-full hover:bg-yellow-500 transition-colors duration-50 hover:animate-pulse ease-out text-white font-semibold">
                                                    <img src="{{ asset('img/favorito.png') }}" alt="">
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                @endif

                                {{-- FIN FORMULARIO FAVORITO --}}

                            </div>

                        </article>
                    @endif
                @endforeach

            </div>

        </div>




        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <header class="bg-white shadow ">
                <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 ">
                    <h1 class="text-3xl font-bold tracking-tight text-gray-900 ">Comunidades</h1>
                </div>
            </header>
        </div>

        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4 gap-4">
                @foreach ($comunities as $comunity)
                    <article class="rounded-2xl w-full h-80 bg-cover bg-center @if ($loop->first) col-span-2 @endif"
                        style="background-color: rgb(61, 60, 59)">

                        <div class="w-full h-full px-8 flex flex-col justify-center">
                            <h1 class="text-4xl text-white leading-8 font-bold overflow-hidden">
                                <a href="{{ $comunity->url }}" class="hover:underline">{{ $comunity->url }}</a>
                            </h1>
                        </div>

                    </article>
                @endforeach

            </div>

        </div>




    </div>

    </div>



</x-app-layout>
