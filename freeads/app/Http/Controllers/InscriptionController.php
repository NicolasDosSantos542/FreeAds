<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur;

class InscriptionController extends Controller
{
    function inscrire(){

        request()->validate([
            'name' => ['required', 'min:2', ],
            'email' => ['required', 'email', 'unique:utilisateurs,email'],
            'password' => ['required', 'min:8', 'confirmed'],
            'password_confirmation'=>['required'],

        ]);

        $utilisateur = Utilisateur::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))


        ]);

        $resultat = auth()->attempt([
            'email' => request('email'),
            'password' => request('password')
        ]);
        if ($resultat ){
            flash("Vous êtes maintenant inscrit et connecté")->success();
            return redirect('/');
        }
flash('ca n\'a pas marché');
        return redirect('/');
    }
}
