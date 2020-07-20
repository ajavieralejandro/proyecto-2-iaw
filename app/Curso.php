<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    //
       /**
     * Get the phone record associated with the user.
     */
    public function docente()
    {
        return $this->belongsTo('App\Docente','docente_id');
    }
         //Un curso tiene muchos usuarios subscriptos 
         public function subscriptores(){
            return $this->belongsToMany('App\User','curso_user','curso_id','user_id');
        }
        //Un curso tiene muchos comentarios
        public function comentarios(){
            return $this->hasMany(ComentarioCurso::class);
        }

               //Un curso tiene muchos comentarios
        public function modulos(){
                return $this->hasMany(ModuloCurso::class);
            }
}
