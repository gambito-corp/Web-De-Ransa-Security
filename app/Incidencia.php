<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model {

    protected $table = 'incidencias';
    protected $fillable = [
        'user_id', 'cliente_id', 'prioridad', 'descripcion'
    ];

    //Relacion Many to one / muchos a uno
    public function users() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function clientes() {
        return $this->belongsTo('App\Cliente', 'cliente_id');
    }

}
