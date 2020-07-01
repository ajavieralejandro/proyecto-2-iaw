<?php

namespace App\Http\Controllers\Curso;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Curso;
use App\Docente;
use Log;


class CursoController extends Controller
{
    //
    public function addCurso(Request $request){
        //falta validar

        $curso = new Curso();
        $curso->name = $request->name;
        $curso->description = $request->descripcion;
        $curso->link = $request->link;
        $curso->youtubelink = $request->youtubelink;
        $curso->docente_id = $request->docente;
        $image = base64_encode(file_get_contents($request->image->path()));
        $curso->image = $image;
        $curso->save();
        return View('admin.admin');
    
    }

    public function getCursosDatatables(Request $request){
        if ($request->ajax()) {
            //$output = new Symfony\Component\Console\Output\ConsoleOutput();
            //$output->writeln("Hola, algo esta pasando");
            $data = Curso::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
                           $btn = '<div><a href="/Curso/'.$data->id.'" class="edit btn btn-outline-success btn-sm">View</a>
                           <a href="editDocente/'.$data->id.'" class="edit btn btn-outline-warning btn-sm">Edit</a>
                           <button name='.$data->name.'  value='.$data->id.' class="delete btn btn-outline-danger btn-sm">Delete</button></div>';

                            return $btn;
                    })
                    ->rawColumns(['action'])          
                    ->make(true);
        }
      

    }

    public function viewCurso(Request $request){
        $id = $request->route('id');
        $curso = Curso::where('id','=', $id)->first();
        return View("curso.curso",['curso'=>$curso]);
    }

    public function deleteCurso(Request $request){
        if($request->ajax()){
        Log::info("Logging one variable: ");
        $id = $request->id;
        $curso = Curso::where('id','=', $id)->first()->delete();
        return response(['Message' => 'This request has been deleted'], 200);
    }
        else 
        return View("curso.crudtable");
    }

    public function getCursosView(Request $request){
        //No le doy acceso a menos que no sea admin
        return View("curso.crudtable");

    }

}
