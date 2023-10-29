
<div x-data=" {enough: false }">
            <div  class="grid grid-cols-5 py-3 px-3 gap-4 rounded">
                <article  class="rounded-2xl w-full h-80 bg-cover bg-center" style="background-color: bisque" >
                    <form wire:submit="save" class="w-full h-full">
                        <div class="w-full h-full px-8 flex flex-col justify-center">
                            <textarea
                                id="pensamientosArea"
                                wire:model="pensa"
                                class="rounded-2xl w-full h-3/4 bg-transparent border-transparent"
                                @input="enough = $event.target.value.length > 0"
                            ></textarea>
                        </div>
                        <div>
                            <div class="text-right">
                                <button x-show="enough" @click="enough = false; document.getElementById('pensamientosArea').value = ''" class="relative inline-flex flex-col items-center text-xs font-medium text-white py-3 px-5 flex-grow">
                                    <div class="absolute bottom-5 p-3 rounded-full border-4 border-white bg-gray-600">
                                    <svg
                                        class="w-3 h-3"
                                        fill="currentColor"
                                        viewBox="0 0 16 16"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path d="M8.5 6a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V10a.5.5 0 0 0 1 0V8.5H10a.5.5 0 0 0 0-1H8.5V6z"/>
                                        <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/>
                                    </svg>
                                    </div>
                                    <span class="sr-only">Add</span>
                                </button>
                            </div>
                        </div>

                    </form>
                </article>

                @foreach ($thoughts as $thought)
                <article class="rounded-2xl w-full h-80 bg-cover bg-center" style="background-color: bisque" x-data="{ editando: false }">

                    <div class="w-full h-full px-8 py-3 flex flex-col justify-center">


                                <textarea id="textarea{{$thought->id}}" class="rounded-2xl  py-1 w-full h-5/6 bg-transparent border-transparent "
                                @input="editando = true"
                                >{{$thought->pensamiento}}</textarea>
                                <p class="text-center text-xs h-1/6">
                                    {{$thought->updated_at}}
                                </p>

                    </div>

                    <div class="grid grid-cols-3 py-3 px-3 gap-4 rounded">
                        <div class="text-left">
                            <button wire:click="delete({{ $thought->id }})" class="relative inline-flex flex-col items-center text-xs font-medium text-white py-3 px-5 flex-grow">
                                <div class="absolute bottom-5 p-3 rounded-full border-4 border-white bg-gray-600 ">
                                <svg
                                    class="w-3 h-3"
                                    fill="currentColor"
                                    viewBox="0 0 16 16"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                </svg>
                                </div>
                                <span class="sr-only ">Delete</span>
                            </button>
                        </div>

                        <div class="text-center">
                            <button x-show="editando" @click="editando = false; document.getElementById('textarea{{$thought->id}}').value = '{{$thought->pensamiento}}'"  class="relative inline-flex flex-col items-center text-xs font-medium text-white py-3 px-5 flex-grow">
                                <div class="absolute bottom-5 p-3 rounded-full border-4 border-white bg-gray-600 ">
                                <svg
                                    class="w-3 h-3"
                                    fill="currentColor"
                                    viewBox="0 0 16 16"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>

                                </svg>
                                </div>
                                <span class="sr-only ">Cancelar</span>
                            </button>
                        </div>

                        <div class="text-right">
                            <button x-show="editando" @click="editando = false"  wire:click="update({{ $thought->id }}, document.getElementById('textarea{{$thought->id}}').value)" class="relative inline-flex flex-col items-center text-xs font-medium text-white py-3 px-5 flex-grow">
                                <div class="absolute bottom-5 p-3 rounded-full border-4 border-white bg-gray-600 ">
                                <svg
                                    class="w-3 h-3"
                                    fill="currentColor"
                                    viewBox="0 0 16 16"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>

                                </svg>
                                </div>
                                <span class="sr-only ">Delete</span>
                            </button>
                        </div>
                    </div>

                </article>
                @endforeach
            </div>
</div>
