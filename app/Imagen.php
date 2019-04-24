<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model {

    protected $table = 'imagenes';
    protected $fillable = [
        'user_id', 'categoria_id', 'imagen', 'titulo', 'descripcion', 'empresa'
    ];

    //Relacion Many to one / muchos a uno
    public function users() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function categorias() {
        return $this->belongsTo('App\Categoria', 'categoria_id');
    }

}
