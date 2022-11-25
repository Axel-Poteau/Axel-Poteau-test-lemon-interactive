<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <form method="POST" action="{{ route('register') }}">
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

                <x-text-input id="pays" name="pays" type="text" class="mt-1 block w-full" :value="old('pays', $location)" required autofocus autocomplete="pays" />

                <x-input-error :messages="$errors->get('pays')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="metier" :value="__('Emploi')" />

                <select id="metier" name="metier">
                    <option value="cadre"> Cadre</option>
                    <option value="emp_fonction_pub"> Employer fonction publique</option>
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
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Déja inscrit ?') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Enregistrer') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
