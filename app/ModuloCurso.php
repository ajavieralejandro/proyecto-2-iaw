<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModuloCurso extends Model
{
    //
    public function curso()
    {
        return $this->belongsTo('App\Curso','curso_id');
    }
}
