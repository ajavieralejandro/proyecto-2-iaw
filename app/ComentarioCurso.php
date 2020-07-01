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
        return $this->belongsTo('App\Curso','foreign_key');
    }
    public function usuario()
    {
        return $this->belongsTo('App\User','foreign_key');
    }
}
