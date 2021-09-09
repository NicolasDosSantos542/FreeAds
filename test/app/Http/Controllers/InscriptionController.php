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

        return redirect('/');
    }
}
