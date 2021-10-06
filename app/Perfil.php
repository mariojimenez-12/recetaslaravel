<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    //Relacion 1-1 de perfilcon usuario

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
}
