<x-app-layout>
    @if( $userA->type==='guest' )
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <h2>Page reservé aux administrateur</h2>

                    </div>
                </div>
            </div>
        </div>
    @endif
    @if($userA->type==='admin')
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div class="py-6">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

                        <div class="max-w-xl">
                            <form method="POST" action="{{ route('profil.store') }}">
                                @csrf


                                <div>
                                    <x-input-label for="nom" :value="__('Nom')" />

                                    <x-text-input id="nom" class="block mt-1 w-full" type="text" name="nom" :value="old('nom')" required autofocus />

                                    <x-input-error :messages="$errors->get('nom')" class="mt-2" />
                                </div>
                                <div class="mt-4">
                                    <x-input-label for="prenom" :value="__('Prenom')" />

                                    <x-text-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')" required autofocus />

                                    <x-input-error :messages="$errors->get('prenom')" class="mt-2" />
                                </div>
                                <div class="mt-4">
                                    <x-input-label for="date_n" :value="__('Date de naissance')" />

                                    <x-text-input id="date_n" class="block mt-1 w-full" type="text" name="date_n" :value="old('date_n')" required autofocus />

                                    <x-input-error :messages="$errors->get('date_n')" class="mt-2" />
                                </div>


                                <div class="mt-4">
                                    <x-input-label for="email" :value="__('Email')" />

                                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />

                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                                <div class="mt-4">
                                    <x-input-label for="sexe" :value="__('Sexe')" />

                                    <x-text-input id="sexe" class="block mt-1 w-full" type="text" name="sexe" :value="old('sexe')" required autofocus />

                                    <x-input-error :messages="$errors->get('sexe')" class="mt-2" />
                                </div>
                                <div class="mt-4">
                                    <x-input-label for="pays" :value="__('Pays')" />

                                    <x-text-input id="pays" name="pays" type="text" class="mt-1 block w-full" :value="old('pays')" required autofocus/>

                                    <x-input-error :messages="$errors->get('pays')" class="mt-2" />
                                </div>
                                <div class="mt-4">
                                    <x-input-label for="metier" :value="__('Emploi')" />

                                    <select id="metier" name="metier">
                                        <option value="cadre"> Cadre</option>
                                        <option value="employer fonction publique"> Employer fonction publique</option>
                                        <option value="dev">Dev</option>
                                    </select>

                                    <x-input-error :messages="$errors->get('metier')" class="mt-2" />
                                </div>



                                <div class="mt-4">
                                    <x-input-label for="password" :value="__('Mot de passe')" />

                                    <x-text-input id="password" class="block mt-1 w-full"
                                                  type="password"
                                                  name="password"
                                                  required autocomplete="new-password" />

                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>


                                <div class="mt-4">
                                    <x-input-label for="password_confirmation" :value="__('Confirmer le mot de passe')" />

                                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                                  type="password"
                                                  name="password_confirmation" required />

                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>

                                <div class="flex items-center justify-end mt-4">

                                    <x-primary-button class="ml-4" type="submit">
                                        {{ __('Enregistrer') }}
                                    </x-primary-button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>

    </div>
        @endif


</x-app-layout>
