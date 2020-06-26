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
        return $this->belongsTo('App\Docente','foreign_key');
    }
}
