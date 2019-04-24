<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonio extends Model {

    protected $table = 'testimonios';
    protected $fillable = [
        'user_id', 'nombre', 'cargo', 'descripcion', 'imagen', 'empresa', 'url_empresa', 'aprobado'
    ];

    //Relacion Many to one / muchos a uno
    public function users() {
        return $this->belongsTo('App\User', 'user_id');
    }

}
