<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComentarioCurso extends Model
{
    //
        //
       /**
     * Get the phone record associated with the user.
     */
    public function curso()
    {
        return $this->belongsTo('App\Curso','curso_id');
    }
    public function usuario()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
