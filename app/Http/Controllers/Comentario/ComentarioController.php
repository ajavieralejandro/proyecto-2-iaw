<?php

namespace App\Http\Controllers\Comentario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ComentarioCurso;
use Log;
use Auth;

class ComentarioController extends Controller
{
    //
    public function addComentario(Request $request){
        $coment = new ComentarioCurso();
        $coment->comentario = $request->comentario;
        $coment->curso_id = $request->id;
        $coment->user_id = Auth::user()->id;
        $coment->save();
        Log::info("Logre cargar el comnetario");
        return back();

    }
}
