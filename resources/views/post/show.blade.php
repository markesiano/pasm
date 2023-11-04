<x-app-layout>

    <div class="container py-8 mx-auto">

        <h1 class="text-4xl font-bold text-gray-600">{{ $post->name }}</h1>

        <div class="text-lg text-gray-500 mb-2">
            {{ $post->extract }}
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- CONTENIDO PRINCIPAL --}}
            <div class="lg:col-span-2">
                <figure>
                    <img class="w-full h-80 object-cover object-center" src="" alt="">
                </figure>

                <div class="text-base text-gray-500 mt-4">
                    {{ $post->body }}
                </div>

            </div>

            {{-- CONTENIDO RELACIONADO --}}
            <aside>
                <h2 class="text-2xl font-bold text-gray-600 mb-4">Más en {{ $post->category->name }} </h2>

                <ul>
                    @foreach ($similares as $similar)
                        <li class="mb-4">
                            <a class="flex" href="{{ route('post.show', $similar) }}">
                                <img class="w-36 h-20 object-cover object-center" src="" alt="">
                                <span class="ml-2 text-gray-600">{{ $similar->name }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </aside>

        </div>

    </div>


    <section class="bg-white mx-auto rounded-2xl px-5  container  transition duration-500">

        <div class="py-10 ">
            <h2 class="text-2xl font-bold text-black-600">Comentarios</h2>
        </div>

        <!-- Mostrar los comentarios existentes -->

        <div class="container mx-auto">
            <div>

                <div class="">

                    @foreach ($post->comments as $comment)
                        <div
                            class="bg-white max-w-2xl rounded-2xl px-10  mt-4 shadow-lg hover:shadow-2xl transition duration-500">
                            <div class="mt-4">
                                <div class="flex justify-between items-center">
                                    <div class="mt-4 flex items-center space-x-4 py-6">
                                        <div class="">
                                            <img class="w-12 h-12 rounded-full"
                                                src="{{ $comment->user->profile_photo_url }}"
                                                alt="" />
                                        </div>
                                        <div class="text-sm font-semibold">{{ $comment->user->name }}  • <span class="font-normal">Publicado el {{$comment->created_at->format('d/m/Y') }}</span>
                                            
                                        </div>
                                        <span class="text-sm font-semibold">(hace {{ $comment->created_at->diffForHumans() }})</span>
                                    </div>
                                    
                                </div>

                                <div>{{ $comment->body }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>

        </div>









        @if (auth()->check())
            <div class="container mx-auto">
                <!-- comment form -->
                <div class="flex items-center justify-center shadow-lg mt-20 mb-4 max-w-lg">
                    <form class="w-full max-w-xl bg-white rounded-lg px-4 pt-2" method="post"
                        action="{{ route('comment.store', $post) }}">
                        @csrf
                        <!-- Control de Calificación con Estrellas -->
                        <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
                        <label for="calificacion">Califica el contenido</label>
                        <p class="clasificacion" id="calificacion" data-post-id="{{ $post->id }}">
                            <input id="radio5" type="radio" name="estrellas" value="5" class="hidden">
                            <label for="radio5" class="text-xl cursor-pointer">&#9733;</label>
                            <input id="radio4" type="radio" name="estrellas" value="4" class="hidden">
                            <label for="radio4" class="text-xl cursor-pointer">&#9733;</label>
                            <input id="radio3" type="radio" name="estrellas" value="3" class="hidden">
                            <label for="radio3" class="text-xl cursor-pointer">&#9733;</label>
                            <input id="radio2" type="radio" name="estrellas" value="2" class="hidden">
                            <label for="radio2" class="text-xl cursor-pointer">&#9733;</label>
                            <input id="radio1" type="radio" name="estrellas" value="1" class="hidden">
                            <label for="radio1" class="text-xl cursor-pointer">&#9733;</label>
                        </p>
                        <!-- Fin del Control de Calificación con Estrellas -->
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Agregar un nuevo comentario</h2>
                            <div class="w-full md:w-full px-3 mb-2 mt-2">
                                <textarea
                                    class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"
                                    name="body" placeholder='Escribe un comentario' required></textarea>
                            </div>
                            <div class="w-full md:w-full flex items-start px-3">
                                <div class="flex items-start w-1/2 text-gray-700 px-2 mr-auto">
                                    <svg fill="none" class="w-5 h-5 text-gray-600 mr-1" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="-mr-1">
                                    <input type='submit'
                                        class="flex-none rounded-md bg-indigo-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500"
                                        value='Enviar'>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        @endif


    </section>
</x-app-layout>
