<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonces;

class AnnonceController extends Controller
{
    public function nouveau()
    {


        // Validation des données
        request()->validate([
            'annonce' => ['required'],
            'titre' => ['required'],
            'photo' => ['required', 'image', 'dimensions:min_width=100,min_height=200']
        ]);

        $path = request('photo')->store('annonces/user_' . auth()->user()->id . '/' . request('titre'), 'public');


        // Création d'un message dans la base de données avec Eloquent
        Annonces::create([
            'utilisateur_id' => auth()->id(),
            'contenu' => request('annonce'),
            'titre' => request('titre'),
            'photo' => $path,
            'prix' => request('prix')
        ]);

        // Redirection vers la page de profil avec un message flash.

        flash("Votre message a bien été publié.")->success();
        return back();
    }

    public function changeAnnonce()
    {

        $cetteAnnonce = Annonces::find(request('id'));


        if (request('titre')) {
            $cetteAnnonce->titre = request('titre');
        }
        if (request('prix')) {
            $cetteAnnonce->prix = request('prix');
        }
        if (request('photo')) {
            request()->validate([
                'photo' => ['image', 'dimensions:min_width=100,min_height=200']
            ]);
            $path = request('photo')->store('annonces/user_' . auth()->user()->id . '/' . request('titre'), 'public');
            $cetteAnnonce->photo = $path;

        }
        if (request('annonce')) {
            $cetteAnnonce->contenu = request('annonce');
        }

        $cetteAnnonce->save();


        flash("l'annonce a été mise à jour")->success();
        return back();
    }

    public function deleteAnnonce()
    {
        $cetteAnnonce = Annonces::find(request('id'));
        $cetteAnnonce->delete();

        flash("l'annonce a été supprimée")->success();

        return back();

    }


    public function displayChangeSingle()
    {
        $annonce = Annonces::where('id', request('annonce_id'))->first();
        return view('updateAnnonce', ['annonce' => $annonce]);

    }

    public function displayAll()
    {
        $annonces = Annonces::latest()->get();

        return view('annonces', [
            'annonces' => $annonces
        ]);
    }

    public function displaySingle()
    {
        $annonce_id = request('annonce_id');
        $annonces = Annonces::all();
        $cetteAnnonce = Annonces::where('id', $annonce_id)->first();


        return view('annonce', [
            'annonce' => $cetteAnnonce
        ]);


    }
}
