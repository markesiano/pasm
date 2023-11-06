<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-10  shadow-xl sm:rounded-lg">
                <div class="mt-10 px-5">
                    {{-- INICIO FORM  --}}
                    <div class="md:flex flex-col md:justify-center md:gap-10 md:items-center">


                        <div class="bg-white w-full p-10 rounded-lg shadow-xl">
                            <div class="mb-10">
                                <h2 class="text-black-500 font-bold text-3xl">Crear nuevo post </h2>
                            </div>
                            <form action="{{ route('post.store') }}" method="post" class="w-full" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="user_id" value="{{ $user_id }}">


                                {{-- CAMPO NOMBRE --}}

                                <div class="mb-2">
                                    <label for="" class="mb-2 block uppercase text-black-500 font-bold">
                                        Nombre

                                    </label>

                                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                                        class="border p-3 w-full text-gray-500 font-bold rounded-lg
                                        @error('name')
                                            border-red-500
                                        @enderror">


                                    @error('name')
                                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                            {{ $message }}</p>
                                    @enderror
                                </div>
                                {{-- FIN CAMPO NOMBRE --}}

                                {{-- CAMPO SLUG --}}

                                <div class="mb-2">
                                    <label for="" class="mb-2 block uppercase text-black-500 font-bold">
                                        Slug

                                    </label>

                                    <input type="text" id="slug" name="slug" value="{{ old('slug') }}"
                                        class="border p-3 w-full text-gray-500 font-bold rounded-lg
                                        @error('slug')
                                            border-red-500
                                        @enderror">


                                    @error('slug')
                                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                            {{ $message }}</p>
                                    @enderror
                                </div>
                                {{-- FIN CAMPO SLUG --}}


                                {{-- CAMPO CATEGORY --}}
                                <div class="mb-5">

                                    <label for=""
                                        class="mb-2 block uppercase text-black-500 font-bold">Categoria</label>
                                    <select id="estadosSelect" class="border-2 border-sky-500 rounded-lg p-2"
                                        name="category_id">
                                        <option value="" disabled>Seleccione una categoria</option>
                                        @foreach ($categories as $categoria)
                                            <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- FIN CAMPO CATEGORY --}}


                                {{-- CAMPO ESTADO --}}
                                <div class="mb-7">
                                    <label for=""
                                        class="mb-2 block uppercase text-black-500 font-bold">Estado</label>

                                    <div class="flex gap-8">

                                        <div>
                                            <input class="cursor-pointer" type="radio" id="check-masc" name="status"
                                                value="1" checked>
                                            <label for="check-masc">Borrador</label>
                                        </div>

                                        <div>
                                            <input class="cursor-pointer" type="radio" id="check-fem" name="status"
                                                value="2">
                                            <label for="check-fem">Publicado</label>
                                        </div>



                                    </div>


                                </div>
                                {{-- FIN CAMPOS ESTADO --}}




                                {{-- CAMPO IMAGEN --}}

                                <div class="mb-7">

                                    <div class="flex gap-2">
                                        <div class="w-1/2">
                                            <img id="picture" src="https://cdn.pixabay.com/photo/2017/01/30/02/20/mental-health-2019924_1280.jpg" alt="">
                                        </div>
                                        <div class="w-1/2">
                                            <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                                <div class="text-center">
                                                    <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                                                    </svg>
                                                        <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                                        <label for="file" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                                            <span>Subir archivo</span>
                                                            <input id="file" name="file" type="file" class="sr-only">
                                                        </label>
                                                        <p class="pl-1">o arrastra y colocalo</p>
                                                    </div>
                                                    <p class="text-xs leading-5 text-gray-600">PDF, PNG, JPG menor de 5MB</p>
                                                    <p class="text-xs leading-5 text-gray-600" x-text="selectedFileName"></p>

                                                </div>
                                            </div>
                                        </div>
                                      </div>
                                </div>


                                {{-- FIN CAMPO IMAGEN --}}




                                <div x-data="{ isOpen: false, selectedOption: {{ old('postable_type') ? "'" . old('postable_type') . "'" : 'null' }}, selectedImage: null, selectedFileName: '' }">
                                    <label for="tipo"
                                        class="mb-2 block uppercase text-black-500 font-bold">Tipo</label>
                                    <input type="hidden" name="postable_type" x-model="selectedOption">

                                    <div class="relative mt-4">
                                        <button @click="isOpen = !isOpen" type="button"
                                            class="relative w-72 cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 border-2 border-sky-500 p-2"
                                            :aria-expanded="isOpen" aria-haspopup="listbox"
                                            aria-labelledby="listbox-label">
                                            <span class="flex items-center">
                                                <img :src="selectedImage ? selectedImage :
                                                    'https://static.vecteezy.com/system/resources/thumbnails/005/439/438/small/exclamation-marks-icon-design-element-logo-element-illustration-exclamation-points-symbol-icon-free-vector.jpg'"
                                                    alt="" class="h-5 w-5 flex-shrink-0 rounded-full">
                                                <span class="ml-3 block truncate"
                                                    x-text="selectedOption ? selectedOption : 'Seleccione el tipo de post'"></span>
                                            </span>
                                            <span
                                                class="pointer-events-none absolute inset-y-0 right-0 ml-3 flex items-center pr-2">
                                                <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10 4.852 7.3 7.76a.75.75 0 01-1.1-1.02l3.25-3.5A.75.75 0 0110 3zm-3.76 9.2a.75.75 0 011.06.04l2.7 2.908 2.7-2.908a.75.75 0 111.1 1.02l-3.25 3.5a.75.75 0 01-1.1 0l-3.25-3.5a.75.75 0 01.04-1.06z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </span>
                                        </button>

                                        <ul x-show="isOpen"
                                            class="absolute z-10 mt-1 max-h-56 w-72 overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
                                            tabindex="-1" role="listbox" aria-labelledby="listbox-label"
                                            aria-activedescendant="listbox-option-3">
                                            <!-- Opciones de selección -->
                                            <li @click="selectedOption = 'Video'; selectedImage = 'https://cdn-icons-png.flaticon.com/512/354/354637.png'; isOpen = false;"
                                                class="text-gray-900 relative cursor-pointer select-none py-2 pl-3 pr-9"
                                                id="listbox-option-0" role="option">
                                                <div class="flex items-center">
                                                    <img src="https://cdn-icons-png.flaticon.com/512/354/354637.png"
                                                        alt="" class="h-5 w-5 flex-shrink-0 rounded-full">
                                                    <span class="font-normal ml-3 block truncate">Video</span>
                                                </div>
                                                <!-- Checkmark -->
                                                <span x-show="selectedOption === 'Video'"
                                                    class="text-indigo-600 absolute inset-y-0 right-0 flex items-center pr-4">
                                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"
                                                        aria-hidden="true">
                                                        <path fill-rule="evenodd"
                                                            d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </span>
                                            </li>
                                            <li @click="selectedOption = 'Articulo'; selectedImage = 'https://t3.ftcdn.net/jpg/02/68/26/94/360_F_268269471_g3wufBp7sSADYJY3Ayw4aXBs7EhbnkMJ.jpg'; isOpen = false;"
                                                class="text-gray-900 relative cursor-pointer select-none py-2 pl-3 pr-9"
                                                id="listbox-option-1" role="option">
                                                <div class="flex items-center">
                                                    <img src="https://t3.ftcdn.net/jpg/02/68/26/94/360_F_268269471_g3wufBp7sSADYJY3Ayw4aXBs7EhbnkMJ.jpg"
                                                        alt="" class="h-5 w-5 flex-shrink-0 rounded-full">
                                                    <span class="font-normal ml-3 block truncate">Articulo</span>
                                                </div>
                                                <!-- Checkmark -->
                                                <span x-show="selectedOption === 'Articulo'"
                                                    class="text-indigo-600 absolute inset-y-0 right-0 flex items-center pr-4">
                                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"
                                                        aria-hidden="true">
                                                        <path fill-rule="evenodd"
                                                            d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>

                                    {{-- DESPLEGABLE DE TEXTAREA BODY Y EXTRACT --}}

                                    <div class="col-span-full" x-show="selectedOption==='Articulo'">
                                        <label for="cover-photo" <div class="mt-2  rounded-lg border">
                                            {{-- CAMPO EXTRACT --}}

                                            <div class="mb-2 max-w-3xl">
                                                <label for=""
                                                    class="mb-2 block uppercase text-black-500 font-bold">Extract</label>
                                                <textarea name="extract" id="extract"
                                                    class="border-2 rounded-lg p-3
                                                    @error('extract')
                                                    border-red-500
                                                    @enderror"
                                                    >

                                                </textarea>


                                                @error('extract')
                                                    <p
                                                        class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                                        {{ $message }}</p>
                                                @enderror

                                            </div>

                                            {{-- FIN CAMPO EXTRACT --}}


                                            {{-- CAMPO BODY --}}

                                            <div class="mb-5">
                                                <label for="body"
                                                    class="mb-2 block uppercase text-black-500 font-bold">Body</label>
                                                <textarea name="body" id="body"
                                                    class="border-2 rounded-lg p-3 w-full
                                                @error('body')
                                                border-red-500
                                                @enderror"
                                            >

                                        </textarea>


                                                @error('body')
                                                    <p
                                                        class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                                        {{ $message }}</p>
                                                @enderror

                                            </div>

                                            {{-- FIN CAMPO BODY --}}


                                    </div>

                                    {{-- FIN DESPLEGABLE --}}


                                    {{-- DESPLEGABLE DE TEXTAREA DESCRIPCION Y SUBIDA DE VIDEO --}}

                                    <div class="col-span-full" x-show="selectedOption==='Video'">
                                        <label for="cover-photo" <div class="mt-2  rounded-lg border">
                                            {{-- CAMPO DESCRIPCION --}}

                                            <div class="mb-2">
                                                <label for=""
                                                    class="mb-2 block uppercase text-black-500 font-bold">Descripcion</label>
                                                <textarea name="descripcion" id="descripcion"
                                                    class="border-2 rounded-lg p-3 w-full
                                                    @error('descripcion')
                                                    border-red-500
                                                    @enderror"
                                                    id="">

                                                </textarea>


                                                @error('descripcion')
                                                    <p
                                                        class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                                        {{ $message }}</p>
                                                @enderror

                                            </div>

                                            {{-- FIN CAMPO DESCRIPCION --}}



                                            {{-- CAMPO SUBIDA DE VIDEO --}}
                                            <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                                <div class="text-center">
                                                    <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                                                    </svg>
                                                        <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                                        <label for="video_url" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                                            <span>Subir Video</span>
                                                            <input id="video_url" name="video_url" type="file" class="sr-only" @change="selectedFileName = $event.target.files[0].name">
                                                        </label>
                                                    </div>
                                                    <p class="text-xs leading-5 text-gray-600">mp4, ogx, oga, ogv, ogg, webm</p>
                                                    <p class="text-xs leading-5 text-gray-600" x-text="selectedFileName"></p>

                                                </div>
                                            </div>

                                            {{-- FIN CAMPO VIDEO --}}


                                    </div>

                                    {{-- FIN DESPLEGABLE --}}



                                </div>

                        </div>

                        <div class="mb-2">


                            <div class="md:flex md:justify-between">
                                <input type="submit" value="Registrar"
                                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold  p-2 text-white rounded-lg">
                            </div>

                        </div>

                        </form>



                    </div>



                </div>
                {{-- FIN FORM  --}}
            </div>
        </div>
    </div>
    </div>
</x-app-layout>


<script src="{{ asset('jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        $("#name").stringToSlug({
            setEvets: 'keyup keydown blur',
            getPut: '#slug',
            space: '-'
        })
    })

    ClassicEditor
        .create(document.querySelector('#extract'))
        .catch(error => {
            console.error(error);
        });

        ClassicEditor
        .create(document.querySelector('#body'))
        .catch(error => {
            console.error(error);
        });


        ClassicEditor
        .create(document.querySelector('#descripcion'))
        .catch(error => {
            console.error(error);
        });

        // CAMBIAR LA IMAGEN

        $(document).ready(function(){

            $('#file').change(function(e){

            let file= e.target.files[0];

            let reader= new FileReader();

            reader.onload= (event) => {

            $('#picture').attr('src', event.target.result)

            };

            reader.readAsDataURL(file);

            })

        });

</script>
