<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            <div x-data="{ isOpen: false, selectedOption: null, selectedImage: null, selectedFileName: '' }">
                <div>
                    <x-label for="name" value="{{ __('Name') }}" />
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" autofocus autocomplete="name" />
                </div>

                <div class="mt-4">
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" autocomplete="username" />
                </div>

                <input type="hidden" name="rol" x-model="selectedOption">

                <div class="relative mt-4">
                    <button @click="isOpen = !isOpen" type="button" class="relative w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 sm:text-sm sm:leading-6" :aria-expanded="isOpen" aria-haspopup="listbox" aria-labelledby="listbox-label">
                        <span class="flex items-center">
                            <img :src="selectedImage ? selectedImage : 'https://static.vecteezy.com/system/resources/thumbnails/005/439/438/small/exclamation-marks-icon-design-element-logo-element-illustration-exclamation-points-symbol-icon-free-vector.jpg'" alt="" class="h-5 w-5 flex-shrink-0 rounded-full">
                            <span class="ml-3 block truncate" x-text="selectedOption ? selectedOption : 'Seleccione su rol'"></span>
                        </span>
                        <span class="pointer-events-none absolute inset-y-0 right-0 ml-3 flex items-center pr-2">
                            <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10 4.852 7.3 7.76a.75.75 0 01-1.1-1.02l3.25-3.5A.75.75 0 0110 3zm-3.76 9.2a.75.75 0 011.06.04l2.7 2.908 2.7-2.908a.75.75 0 111.1 1.02l-3.25 3.5a.75.75 0 01-1.1 0l-3.25-3.5a.75.75 0 01.04-1.06z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    </button>

                    <ul x-show="isOpen" class="absolute z-10 mt-1 max-h-56 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm" tabindex="-1" role="listbox" aria-labelledby="listbox-label" aria-activedescendant="listbox-option-3">
                        <!-- Opciones de selección -->
                        <li @click="selectedOption = 'Estudiante'; selectedImage = 'https://cdn-icons-png.flaticon.com/512/354/354637.png'; isOpen = false;" class="text-gray-900 relative cursor-pointer select-none py-2 pl-3 pr-9" id="listbox-option-0" role="option">
                            <div class="flex items-center">
                                <img src="https://cdn-icons-png.flaticon.com/512/354/354637.png" alt="" class="h-5 w-5 flex-shrink-0 rounded-full">
                                <span class="font-normal ml-3 block truncate">Estudiante</span>
                            </div>
                            <!-- Checkmark -->
                            <span x-show="selectedOption === 'Estudiante'" class="text-indigo-600 absolute inset-y-0 right-0 flex items-center pr-4">
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </li>

                        <li @click="selectedOption = 'Psicólogo'; selectedImage = 'https://t3.ftcdn.net/jpg/02/68/26/94/360_F_268269471_g3wufBp7sSADYJY3Ayw4aXBs7EhbnkMJ.jpg'; isOpen = false;" class="text-gray-900 relative cursor-pointer select-none py-2 pl-3 pr-9" id="listbox-option-1" role="option">
                            <div class="flex items-center">
                                <img src="https://t3.ftcdn.net/jpg/02/68/26/94/360_F_268269471_g3wufBp7sSADYJY3Ayw4aXBs7EhbnkMJ.jpg" alt="" class="h-5 w-5 flex-shrink-0 rounded-full">
                                <span class="font-normal ml-3 block truncate">Psicólogo</span>
                            </div>
                            <!-- Checkmark -->
                            <span x-show="selectedOption === 'Psicólogo'" class="text-indigo-600 absolute inset-y-0 right-0 flex items-center pr-4">
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </li>
                    </ul>
                </div>

                <div class="col-span-full" x-show="selectedOption==='Psicólogo'">
                    <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">Certificado</label>
                    <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                        <div class="text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                            </svg>
                                <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                    <span>Subir archivo</span>
                                    <input id="file-upload" name="file-upload" type="file" class="sr-only" @change="selectedFileName = $event.target.files[0].name">
                                </label>
                                <p class="pl-1">o arrastra y colocalo</p>
                            </div>
                            <p class="text-xs leading-5 text-gray-600">PDF, PNG, JPG menor de 5MB</p>
                            <p class="text-xs leading-5 text-gray-600" x-text="selectedFileName"></p>

                        </div>
                    </div>
                </div>

            </div>



            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
