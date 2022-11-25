<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des profils') }}
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
    <div class="py-6">    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-primary-button><a href="{{ route('profil.create') }}">{{ __('Ajouter un profil') }}</a></x-primary-button>
        </div>
    </div>

    @foreach($users as $user)
        <div class="py-12">

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        {{$user->id}}<br>
                        <strong>NOM :</strong>{{$user->nom}}<br>
                        <strong>PRENOM :</strong>{{$user->prenom}}<br>
                        <strong>DATE DE NAISSANCE :</strong>{{$user->date_n}}<br>
                        <strong>SEXE :</strong>{{$user->sexe}}<br>
                        <strong>E-MAIL :</strong>{{$user->email}}<br>
                        <strong>PAYS :</strong>{{$user->pays}}<br>
                        <strong>EMPLOIS :</strong>{{$user->metier}}<br>
                    </div>
                </div>


                <form action="{{ route('profil.destroy', $user->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <x-primary-button><a href="{{ route('profil.edit', $user->id) }}">{{ __('Modifier') }}</a></x-primary-button>
                    <x-danger-button class="ml-3" type="submit" name="delete" value="valide" >
                        {{ __('Supprimer le compte') }}
                    </x-danger-button>

                </form>

            </div>
        </div>
    @endforeach
    @endif

</x-app-layout>
