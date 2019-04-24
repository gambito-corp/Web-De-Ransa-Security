<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model {

    protected $table = 'categorias';
    protected $fillable = [
        'user_id', 'titulo'
    ];

    //Relacion Many to one / muchos a uno
    public function users() {
        return $this->belongsTo('App\User', 'user_id');
    }

    //Relacion one to Many / uno a muchos
    Public function imagenes() {
        return $this->hasMany('App\Imagen');
    }

}
