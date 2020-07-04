<?php

namespace App\Http\Controllers\ModuloCurso;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Curso;
use App\ModuloCurso;


class ModuloCursoController extends Controller
{
    //
    public function addModulo(Request $request){
        $modulo = new ModuloCurso();
        $modulo->curso_id = $request->id;
        $modulo->title = $request->title;
        $modulo->description = $request->descripcion;
        $modulo->save();
        $curso = Curso::where('id','=', $request->id)->first();
        return View('curso.addmoduloscurso',['curso'=>$curso]);

    }

    public function addModuloView(Request $request){
        $id = $request->route('id');
        $curso = Curso::where('id','=', $id)->first();
        return View("modulos.addmodulo",['curso'=>$curso]);

    }

    public function getModuloView(Request $request){
        $id = $request->route('id');
        $modulo = ModuloCurso::where('id','=', $id)->first();
        return View('modulos.viewmodulo',['modulo' => $modulo]);

    }


    public function getModulosView(Request $request){
        $data = ModuloCurso::where('curso_id','=', $request->id)->get();
        return View('modulos.crudtable',['modulos' => $data]);
        
    }

    public function editModuloView(Request $request){
        $data = ModuloCurso::where('id','=', $request->id)->first();
        return View('modulos.editmodulo',['modulo' => $data]);

    }

    public function editModulo(Request $request){
        $modulo = ModuloCurso::where('id','=',  $request->id)->first();
        $modulo->title = $request->title;
        $modulo->description = $request->descripcion;
        $modulo->update();
        $curso = Curso::where('id','=', $modulo->curso_id)->first();
        return View('curso.addmoduloscurso',['curso' => $curso]);

    }

    public function deleteModulo(Request $request){
        if($request->ajax()){
            $id = $request->id;
            $curso =  ModuloCurso::where('id','=',  $request->id)->first()->delete();       
            return response(['Message' => 'This request has been deleted'], 200);
        }
            else 
            return View("curso.crudtable");
    }
}
