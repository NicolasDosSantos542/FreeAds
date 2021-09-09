<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompteController extends Controller
{
    //
    public function accueil()
    {


        return view('mon-compte');
    }

    public function deconnexion()
    {


        auth()->logout();
        flash("vous êtes bien déconnecté")->success();
        return redirect('/connexion');

    }

    public function modificationPassword()
    {

        request()->validate([
            'password' => ['required', 'confirmed', 'min:8'],
            'password_confirmation' => ['required']]);


        auth()->user()->update([
            "password" => bcrypt(request('password'))
        ]);

        flash("Votre mot de passe a été mis à jour")->success();
        return redirect('/utilisateurs/'.auth()->user()->email);
    }

    public function changeName()
    {
        request()->validate([
            'name' => ['required']]);


        auth()->user()->update([
            "name" => request('name')
        ]);
        auth()->user()->save();
        flash("Votre nom a été mis à jour")->success();
         return redirect('/utilisateurs/'.auth()->user()->email);
    }

    public function changeEmail()
    {
        request()->validate([
            'email' => ['required', 'email'],
        ]);


        auth()->user()->update([
            "email" => request('email')
        ]);
        flash("Votre adresse email a été mis à jour")->success();
        return redirect('/utilisateurs/'.auth()->user()->email);
    }
}
