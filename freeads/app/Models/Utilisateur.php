<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as BasicAuthenticatable;

class Utilisateur extends Model implements Authenticatable{

    use BasicAuthenticatable;
    /**
     * @var array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\Request|mixed|string|null
     */
    protected $fillable = ['email', 'password', 'name'];

    public function getRememberTokenName(){
        return '' ;
    }
}
