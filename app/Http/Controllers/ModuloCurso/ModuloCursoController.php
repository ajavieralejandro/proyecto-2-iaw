<?php

namespace App\Http\Controllers\ModuloCurso;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Curso;
use App\ModuloCurso;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Log;




class ModuloCursoController extends Controller
{
    //

 
    public function addModulo(Request $request){
        //Reglas de validación 
        $validator = Validator::make($request->all(), [
            'title' => ['required', 'max:255'],
            'description' => ['required'],
        ]);
        
        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $modulo = new ModuloCurso();
        $modulo->curso_id = $request->id;
        $modulo->title = $request->title;
        $modulo->description = $request->description;
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
        //$data = ModuloCurso::where('curso_id','=', $request->id)->get();
        return View('modulos.crudtable',['id'=> $request->id]);
        
    }

    public function editModuloView(Request $request){
        
        $data = ModuloCurso::where('id','=', $request->id)->first();
        
        return View('modulos.editmodulo',['modulo' => $data]);

    }

    public function editModulo(Request $request){
            //Reglas de validación 
            $validator = Validator::make($request->all(), [
                'title' => ['required', 'max:255'],
                'descripcion' => ['required'],
            ]);
            
            if ($validator->fails()) {
                return back()
                            ->withErrors($validator)
                            ->withInput();
            }
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

    public function getModulosTables(Request $request){
        if ($request->ajax()) {
            //Log::info('This is some useful information.');
            //Log::info($request->id);
            $data = ModuloCurso::where('curso_id','=',  $request->id)->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
                           $btn = '<div><a href="/modulo/'.$data->id.'" class="edit btn btn-outline-success btn-sm">View</a>
                           <a href="/editmodulo/'.$data->id.'" class="edit btn btn-outline-warning btn-sm">Edit</a>
                           <button name='.$data->title.'  value='.$data->id.' class="delete btn btn-outline-danger btn-sm">Delete</button></div>';
                            return $btn;
                    })
                    ->rawColumns(['action'])          
                    ->make(true);
        }
      

    }
}