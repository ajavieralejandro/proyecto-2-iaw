<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    //
    protected $primaryKey = 'id';

    public function cursos()
    {
        return $this->hasMany('App\Curso');
    }

}
