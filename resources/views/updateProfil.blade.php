<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modification du profil de {{$user->nom}} {{$user->prenom}}
        </h2>
    </x-slot>
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
    <section>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <form method="post" action="{{ route('profil.update',$user->id) }}" class="mt-6 space-y-6">
                            @csrf
                            @method('PUT')

                            <div>
                                <x-input-label for="nom" :value="__('Nom')" />
                                <x-text-input id="nom" name="nom" type="text" class="mt-1 block w-full" :value="old('nom', $user->nom)" required autofocus autocomplete="nom" />
                                <x-input-error class="mt-2" :messages="$errors->get('nom')" />
                            </div>

                            <div>
                                <x-input-label for="prenom" :value="__('Prenom')" />
                                <x-text-input id="prenom" name="prenom" type="text" class="mt-1 block w-full" :value="old('prenom', $user->prenom)" required autofocus autocomplete="prenom" />
                                <x-input-error class="mt-2" :messages="$errors->get('prenom')" />
                            </div>

                            <div>
                                <x-input-label for="date_n" :value="__('Date de naissance')" />
                                <x-text-input id="date_n" name="date_n" type="text" class="mt-1 block w-full" :value="old('date_n', $user->date_n)" required autofocus autocomplete="date_n" />
                                <x-input-error class="mt-2" :messages="$errors->get('date_n')" />
                            </div>

                            <div>
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="email" />
                                <x-input-error class="mt-2" :messages="$errors->get('email')" />

                            </div>

                            <div>
                                <x-input-label for="sexe" :value="__('Sexe')" />
                                <x-text-input id="sexe" name="sexe" type="text" class="mt-1 block w-full" :value="old('sexe', $user->sexe)" required autofocus autocomplete="sexe" />
                                <x-input-error class="mt-2" :messages="$errors->get('sexe')" />
                            </div>
                            <div>
                                <x-input-label for="pays" :value="__('Pays')" />
                                <x-text-input id="pays" name="pays" type="text" class="mt-1 block w-full" :value="old('pays', $user->pays)" required autofocus autocomplete="pays" />
                                <x-input-error class="mt-2" :messages="$errors->get('pays')" />
                            </div>
                            <div>
                                <p>Emploi : {{$user->metier}}</p>
                                <x-input-label for=metier" :value="__('Emploi')" />
                                <select id="metier" name="metier" class="mt-1 block w-full" :value="old('metier', $user->metier)" required autofocus autocomplete="metier">
                                    <option value="cadre"> Cadre</option>
                                    <option value="emp_fonction_pub"> Employer fonction publique</option>
                                    <option value="dev">Dev</option>
                                </select>
                                <x-input-error class="mt-2" :messages="$errors->get('metier')" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Modifier') }}</x-primary-button>

                                @if (session('status') === 'profile-updated')
                                    <p
                                        x-data="{ show: true }"
                                        x-show="show"
                                        x-transition
                                        x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600"
                                    >Saved.</p>
                                @endif
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>



    </section>
    @endif


</x-app-layout>

