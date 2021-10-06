<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    //Obtener la categoria de la receta via FK

    protected $fillable = [
        'titulo', 'slug', 'preparacion', 'ingredientes', 'imagen', 'categoria_id'
    ];
    
    public function categoria() 
    {
        return $this->belongsTo(CategoriaReceta::class);
    }

    public function autor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes_receta');
    }

    public function getRouteKeyName()
    {
        // return $this->getKeyName();
        return 'slug';
    }
}
