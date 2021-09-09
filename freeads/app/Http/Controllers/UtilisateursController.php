<?php

namespace App\Http\Controllers;

use App\Models\Annonces;
use App\Models\Utilisateur;
use Illuminate\Http\Request;


class UtilisateursController extends Controller
{
    public function liste(){
        $utilisateurs = Utilisateur::all();
        return view('utilisateurs'  , ['utilisateurs' => $utilisateurs]);
    }
    public function voir(){
        $email = request('email');
        $utilisateur = Utilisateur::where('email',$email)->firstOrFail();
        $annonces= Annonces::where('utilisateur_id', $utilisateur->id)->latest()->get();

        return view('utilisateur',[
            'utilisateur'=> $utilisateur,
            'annonces'=>$annonces
        ]);
    }
}
