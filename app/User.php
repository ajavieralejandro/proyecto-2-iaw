<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

        //Un usuario puede estar subscripto a varios cursos 
        public function subscripto(){
            return $this->hasMany(Curso::class);
        }
        //Un usuario tiene muchos comentarios, en distintos cursos, puede servir
        //agregar esto para funcionalidades futuras
        public function comentarios(){
            return $this->hasMany(ComentarioCurso::class);
        }
}
