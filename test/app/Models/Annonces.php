<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as BasicAuthenticatable;


class Annonces extends Model
{
    use BasicAuthenticatable;
    use HasFactory;
    protected $fillable = ['utilisateur_id', 'contenu', 'titre', 'photo', 'prix'];

}
