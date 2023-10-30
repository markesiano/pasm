<x-app-layout>


    <div class="max-w-7x1 mx-auto px-2 sm:px-6 lg:px-8 py-8">
        <header class="bg-white shadow ">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 ">
              <h1 class="text-3xl font-bold tracking-tight text-gray-900 ">Recursos Educativos</h1>
            </div>
        </header>

        <div class="mt-6 py-3 flex max-w-md gap-x-4">
            <label for="buscar" class="sr-only">Buscar</label>
            <input id="buscar" name="buscar" type="text" autocomplete="email" required class="min-w-0 flex-auto rounded-md border-0 bg-white/5 px-3.5 py-2 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6" placeholder="Buscar...">
            <button type="submit" class="flex-none rounded-md bg-indigo-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Buscar</button>
        </div>

        <header class="bg-white shadow ">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 ">
              <h1 class="text-3xl font-bold tracking-tight text-gray-900 ">Artículos</h1>
            </div>
        </header>


        <div class="grid grid-cols-3 py-3 gap-6 rounded">
            @foreach ($posts as $post)

            @if($post->tipo == 'articulo')

            <article class=" rounded-2xl w-full h-80 bg-cover bg-center @if($loop->first) col-span-2 @endif"  style="background-image: url({{ url('storage/' . $post->image->url) }})">


                <div class="w-full h-full px-8 flex flex-col justify-center">
                    <div class="py-3">
                        <a href="" class="inline-block px-3 h-6 bg-gray-200 text-gray rounded">
                            {{$post->tipo}}
                        </a>
                     </div>
                     <h1 class="text-4xl text-white leading-8 font-bold">
                        <a href="">

                            {{$post->name}}
                        </a>
                     </h1>
                     <div class="py-3">
                        <a href="" class="inline-block px-3 h-6 bg-gray-200 text-gray rounded">
                            Visto: {{$post->visitas}} veces
                        </a>
                     </div>
                     <div class="py-3">
                        <a href="" class="inline-block px-3 h-6 bg-gray-200 text-gray rounded">
                            Calificacion: {{$post->calificacion}} ☆
                        </a>
                     </div>
                </div>

            </article>
            @endif
        @endforeach

        </div>

        <header class="bg-white shadow py-3">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
              <h1 class="text-3xl font-bold tracking-tight text-gray-900">Vídeos</h1>
            </div>
        </header>


        <div class="grid grid-cols-3 py-3 gap-6">
            @foreach ($posts as $post)
            @if($post->tipo == 'video')


            <article class=" rounded-2xl w-full h-80 bg-cover bg-center @if($loop->first) col-span-2 @endif"  style="background-image: url({{ url('storage/' . $post->image->url) }})">


                <div class="w-full h-full px-8 flex flex-col justify-center">
                    <div class="py-3">
                        <a href="" class="inline-block px-3 h-6 bg-gray-200 text-gray rounded">
                            {{$post->tipo}}
                        </a>
                     </div>
                     <h1 class="text-4xl text-white leading-8 font-bold">
                        <a href="">

                            {{$post->name}}
                        </a>
                     </h1>
                     <div class="py-3">
                        <a href="" class="inline-block px-3 h-6 bg-gray-200 text-gray rounded">
                            Visto: {{$post->visitas}} veces
                        </a>
                     </div>
                     <div class="py-3">
                        <a href="" class="inline-block px-3 h-6 bg-gray-200 text-gray rounded">
                            Calificacion: {{$post->calificacion}} ☆
                        </a>
                     </div>
                     {{-- Status 1 = Deshabilitado --}}
                     {{-- Status 2 = Habilitado --}}
                     <div class="py-3">
                        <a href="" class="inline-block px-3 h-6 bg-gray-200 text-gray rounded">
                            Status: {{$post->status}} !!
                        </a>
                     </div>
                </div>

            </article>
            @endif
        @endforeach

        </div>

        <header class="bg-white shadow py-3">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
              <h1 class="text-3xl font-bold tracking-tight text-gray-900">Comunidades</h1>
            </div>
        </header>


        <div class="grid grid-cols-3 py-3 gap-6">
            @foreach ($comunities as $comunity)
            <article class=" rounded-2xl w-full h-80 bg-cover bg-center @if($loop->first) col-span-2 @endif"  style="background-image: url({{ url('storage/' . $comunity->image->url) }})">


                <div class="w-full h-full px-8 flex flex-col justify-center">
                     <h1 class="text-4xl text-white leading-8 font-bold">
                        <a href="">
                            {{$comunity->url}}
                        </a>
                     </h1>

                </div>

            </article>
        @endforeach

        </div>




    </div>

</x-app-layout>
