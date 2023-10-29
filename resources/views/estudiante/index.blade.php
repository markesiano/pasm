<x-app-layout>


    @livewire('thoughts')

    @livewireScripts

{{-- <div x-data=" { open: true, enough: false }">
    <div  class="grid grid-cols-5 py-3 px-3 gap-4 rounded">
        @foreach ($thoughts as $thought)
        <article class="rounded-2xl w-full h-80 bg-cover bg-center" style="background-color: bisque">
            <div class="w-full h-full px-8 flex flex-col justify-center">
                        <p >
                            {{$thought->pensamiento}}
                        </p>
                </div>
        </article>
        @endforeach


        <article x-show="open" class="rounded-2xl w-full h-80 bg-cover bg-center" style="background-color: bisque" >
        <form method="POST" action="{{ route('thought.store') }} " class="w-full h-full">
            @csrf
            <div class="w-full h-full px-8 flex flex-col justify-center">

                <textarea
                name="pensamiento"
                class="rounded-2xl w-full h-3/4 bg-transparent border-transparent"
                @input="enough = $event.target.value.length > 0"
            ></textarea>
            </div>

            <div class="text-right">

                    <button x-show="enough" type="submit" class="relative inline-flex flex-col items-center text-xs font-medium text-white py-3 px-6 flex-grow">
                        <div class="absolute bottom-5 p-3 rounded-full border-4 border-white bg-gray-600">
                        <svg
                            class="w-5 h-5"
                            fill="currentColor"
                            viewBox="0 0 16 16"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path d="M8.5 6a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V10a.5.5 0 0 0 1 0V8.5H10a.5.5 0 0 0 0-1H8.5V6z"/>
                            <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/>
                        </svg>
                        </div>
                        <span class="sr-only">Chat</span>
                    </button>


            </div>
        </form>
        </article>
    </div>



    <div class="fixed bottom-4 left-1/2 transform -translate-x-1/2 inline-flex left-0 mx-auto justify-between rounded-3xl">


        <a
          class="inline-flex flex-col items-center text-xs font-medium text-gray-400 py-3 px-4 flex-grow"
          href="#"
        >

        </a>
        <span class="sr-only">Upload</span>


        <button x-on:click = "open= !open" type="button" class="relative inline-flex flex-col items-center text-xs font-medium text-white py-3 px-6 flex-grow">
          <div class="absolute bottom-5 p-3 rounded-full border-4 border-white bg-gray-600">
            <svg
            class="w-7 h-7"
            fill="currentColor"
            viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              fill-rule="evenodd"
              d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
              clip-rule="evenodd"
            ></path>
          </svg>
          </div>
          <span class="sr-only">Add</span>
        </button>


      </div>

</div> --}}


</x-app-layout>
