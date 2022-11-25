<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Validation\Rules;


class ListProfilController extends Controller
{
    function index(Request $request){
        $users = User::all();
        $users = $users->sortBy('pays');
        return view('profilList', [
            'users' => $users,
            'userA' => $request->user(),
        ]);

}
    function edit(Request $request, $id){
        $user = User::find($id);
        return view('updateProfil', ['user' => $user, 'userA' => $request->user()]);



    }
    function update(Request $request, $id){
        $user = User::find($id);
        $this->validate(
            $request,
            [
                'nom' => 'required',
                'prenom' => 'required',
                'date_n' =>'required',
                'email' =>'required',
                'sexe' =>'required',
                'pays' =>'required',
                'metier' =>'required',

            ]
        );


        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->date_n = $request->date_n;
        $user->email = $request->email;
        $user->sexe = $request->sexe;
        $user->pays = $request->pays;
        $user->metier = $request->metier;


        $user->save();
        return redirect()->route('profil.index');

    }
    public function create(Request $request){
        return view('profilCreate', ['userA' => $request->user()]);
    }
    public function store(Request $request){
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'date_n' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'sexe' => ['required', 'string', 'max:255'],
            'pays' => ['required', 'string', 'max:255'],

            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'date_n' => $request->date_n,
            'email' => $request->email,
            'sexe' =>$request->sexe,
            'pays' =>$request->pays,
            'metier' =>$request->metier,
            'password' => Hash::make($request->password),
            'type' => 'guest',
        ]);

        event(new Registered($user));

        $email_data = array(
            'name' => $request->name,
            'email' => $request->email,
        );

        // send email with the template
        Mail::send('mail.welcome', $email_data, function ($message) use ($email_data) {
            $message->to($email_data['email'], $email_data['name'])
                ->subject('Bienvenue Test')
                ->from('testlaravel59@gmail.com', 'testlaravel');
        });

        $user->save();
        return redirect()->route('profil.index');

    }


    public
    function destroy(Request $request, $id)
    {

        if ($request->delete == 'valide') {
            $user = User::find($id);
            $user->delete();


        }

        return redirect()->route('profil.index');
    }


}
