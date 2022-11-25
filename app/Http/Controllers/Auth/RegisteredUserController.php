<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\WelcomeMailController;
use App\Mail\Welcome;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;
use Stevebauman\Location\Facades\Location;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        $userIp=$request->getClientIp();
        $position = Location::get('userIp');
        if ($position = Location::get()) {
            // Successfully retrieved position.
        }
        return view('auth.register', ['location'=>$position->countryName]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
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
        $admin = User::find(1);

        event(new Registered($user));
        $email_data = array(
            'user' => $user,
            'email' => $request['email'],
        );

        Mail::send('emails.mail', $email_data, function ($message) use ($email_data) {
            $message->to($email_data['email'], $email_data['user'])
                ->subject('Bienvenue sur mon apli')
                ->from('testlaravel59@gmail.com', 'testlaravel');
        });
        $email_data = array(
            'user' => $user,
            'email' => $admin['email'],
        );
        Mail::send('emails.mail', $email_data, function ($message) use ($email_data) {
            $message->to($email_data['email'], $email_data['user'])
                ->subject('Bienvenue sur mon apli')
                ->from('testlaravel59@gmail.com', 'testlaravel');
        });






        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
