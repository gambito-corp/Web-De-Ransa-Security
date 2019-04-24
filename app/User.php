<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail{

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $fillable = [
        'role', 'name', 'surname', 'imagen', 'telefono', 'empresa', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Relacion one to Many / uno a muchos
    Public function categorias() {
        return $this->hasMany('App\Categoria');
    }

    //Relacion one to Many / uno a muchos
    Public function imagenes() {
        return $this->hasMany('App\Imagen');
    }

    //Relacion one to Many / uno a muchos
    Public function testimonios() {
        return $this->hasMany('App\Testimonio');
    }

    //Relacion one to Many / uno a muchos
    Public function clientes() {
        return $this->hasMany('App\Cliente');
    }

    //Relacion one to Many / uno a muchos
    Public function incidencias() {
        return $this->hasMany('App\Incidencia');
    }

}
