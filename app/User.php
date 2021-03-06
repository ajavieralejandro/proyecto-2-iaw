<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

use Log;
use Auth;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',  'api_token',

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
            return $this->belongsToMany('App\Curso','curso_user','curso_id','user_id');
        }

        public function isSubscripto($curso_id){

            foreach($this->subscripto()->get() as $aux){
                if($aux->id==$curso_id){
                    return true;
                }

            }
            /*
 
            if($this->subscripto()->get()->where('curso_id',$curso_id)->first()){
                Log::info("En hora buena, ya estoy subscirpto al curso");
                return true;
            }
            else
                return false;
                */

        }
        //Un usuario tiene muchos comentarios, en distintos cursos, puede servir
        //agregar esto para funcionalidades futuras
        public function comentarios(){
            return $this->hasMany(ComentarioCurso::class);
        }
}
