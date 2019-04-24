<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model {

    protected $table = 'clientes';
    protected $fillable = [
        'user_id', 'nombre', 'telefono', 'email', 'cargo', 'imagen'
    ];

    //Relacion Many to one / muchos a uno
    public function users() {
        return $this->belongsTo('App\User', 'user_id');
    }

    //Relacion one to Many / uno a muchos
    Public function incidencias() {
        return $this->hasMany('App\Incidencia');
    }

}
