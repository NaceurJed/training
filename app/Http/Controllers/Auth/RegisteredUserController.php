<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Competiteur;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // return view('auth.register');
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
            'nom'             => 'required|string|max:255',
            'prenom'          => 'required|string|max:255',
            'pseudo'          => 'required|string|max:255',
            'date_naissance'  => 'required',
            'email'           => 'required|string|email|max:255|unique:competiteurs',
            'poids'           => 'required|Numeric',
            'sport'           => 'string|max:255',
            'password'        => 'required|confirmed'
        ]);
        //dd($request->nom);

        $competiteur = Competiteur::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'pseudo' => $request->pseudo,
            'date_naissance' => $request->date_naissance,
            'email' => $request->email,
            'poids' => $request->poids,
            'sport' => $request->sport,
            'password' => Hash::make($request->password),
        ]);

        //event(new Registered($competiteur));

        Auth::login($competiteur);

        return redirect(RouteServiceProvider::HOME);
    }
}
