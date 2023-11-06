<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  h-full shadow-xl sm:rounded-lg">


                <div class="w-full">
                    <div class="container mx-auto px-4 sm:px-8">
                        <div class="py-8">
                            <div>
                                <h2 class="text-2xl font-semibold leading-tight">Posts</h2>
                            </div>

                            {{-- PENDIENTE --}}
                            {{-- <div class="my-2 flex sm:flex-row flex-col">
                                <div class="flex flex-row mb-1 sm:mb-0">
                                    <div class="relative">
                                        <select
                                            class="appearance-none h-full rounded-l border block w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                            <option>5</option>
                                            <option>10</option>
                                            <option>20</option>
                                        </select>
                                        <div
                                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="relative">
                                        <select
                                            class="h-full rounded-r border-t sm:rounded-r-none sm:border-r-0 border-r border-b block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500">
                                            <option>All</option>
                                            <option>Active</option>
                                            <option>Inactive</option>
                                        </select>
                                        <div
                                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                            </svg>
                                        </div>
                                    </div>


                                </div>

                                <div class="block relative">
                                    <span class="h-full absolute inset-y-0 left-0 flex items-center pl-2">
                                        <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current text-gray-500">
                                            <path
                                                d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z">
                                            </path>
                                        </svg>
                                    </span>
                                    <input placeholder="Search"
                                        class="appearance-none rounded-r rounded-l sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
                                </div>


                            </div> --}}

                            <div class="mt-10">
                                <a class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold  p-2 text-white rounded-lg"
                                    href="{{ route('post.create') }}">
                                    Crear post
                                </a>
                            </div>
                            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                                <div class="inline-block w-full shadow rounded-lg overflow-hidden">
                                    <table class=" w-full  leading-normal">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                    Nombre
                                                </th>
                                                <th
                                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                    Visitas
                                                </th>
                                                <th
                                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">

                                                    Calificacion
                                                </th>
                                                <th
                                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                    Status
                                                </th>
                                                <th
                                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">

                                                    Acciones
                                                </th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @foreach ($posts as $post)
                                                <tr>
                                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                        <div class="flex items-center">
                                                            <div class="ml-3">
                                                                <p class="text-gray-900 whitespace-no-wrap">
                                                                    {{ $post->name }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                        <p class="text-gray-900 whitespace-no-wrap">{{ $post->visitas }}
                                                        </p>
                                                    </td>

                                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                        <p class="text-gray-900 whitespace-no-wrap">
                                                            {{ $post->calificacion }}
                                                        </p>
                                                    </td>

                                                    <td class="px-5 py-5 border-b  border-gray-200 bg-white text-sm">
                                                        <span
                                                            class="relative inline-block rounded-2xl px-3 py-1 font-semibold leading-tight
                                                            @if ($post->status == 2) bg-green-200 text-green-900
                                                            @elseif($post->status == 1) bg-red-200 text-red-900 @endif">
                                                            <span aria-hidden
                                                                class="absolute inset-0 opacity-50 rounded-full"></span>
                                                            @if ($post->status == 2)
                                                                Publicado
                                                            @elseif($post->status == 1)
                                                                Borrador
                                                            @endif
                                                        </span>
                                                    </td>

                                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">

                                                        <div class="flex gap-3">

                                                            <a href="{{ route('post.edit', $post) }}"
                                                                class="bg-green-600 hover:bg-green-700 transition-colors cursor-pointer font-bold  p-2 text-white rounded-lg text-center">
                                                                Editar
                                                            </a>

                                                            <form action="{{ route('post.destroy', $post) }}"
                                                                method="post"
                                                                class="bg-red-600 hover:bg-red-700 transition-colors cursor-pointer font-bold  p-2 text-white rounded-lg text-center">
                                                                @csrf
                                                                @method('delete')


                                                                <button type="submit" class="">

                                                                    Eliminar</button>
                                                            </form>

                                                            <a href="{{ route('post.show', $post) }}"
                                                                class="bg-green-600 hover:bg-green-700 p-2 transition-colors cursor-pointer  text-white font-bold rounded-lg">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor"
                                                                    class="w-6 h-6 text-black-500 inline font-bold">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9zm3.75 11.625a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                                                </svg>

                                                                Ver</a>

                                                        </div>


                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div
                                        class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between          ">
                                        <span class="text-xs xs:text-sm text-gray-900">
                                            Showing 1 to 4 of 50 Entries
                                        </span>
                                        <div class="inline-flex mt-2 xs:mt-0">
                                            <button
                                                class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-l">
                                                Prev
                                            </button>
                                            <button
                                                class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-r">
                                                Next
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
