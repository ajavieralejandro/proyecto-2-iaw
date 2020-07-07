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
        return View('curso.addmoduloscurso',['curso'=>$curso]);
    
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
                           <a href="editCurso/'.$data->id.'" class="edit btn btn-outline-warning btn-sm">Edit</a>
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
        $curso = Curso::where('id','=', $id)->first();
        if($curso->delete())
            return response(['Message' => 'This request has been deleted'], 200);
        else
            return response(['Message' => 'id error '], 404);
    }
        //En el caso de que no sea una petición ajax
        else 
        return View("curso.crudtable");
    }

    public function getCursosView(Request $request){
        //No le doy acceso a menos que no sea admin
        return View("curso.crudtable");

    }

    public function addModulosCursoView(Request $request){        
        $id = $request->id;
        $curso = Curso::where('id','=', $id)->first();
        return View('curso.addmoduloscurso',['curso'=>$curso]);        
    }

    public function editCursoView(Request $request){
        $id = $request->id;
        $docentes = Docente::all();
        $curso = Curso::where('id','=', $id)->first();
        return View('curso.editcurso',['curso'=>$curso,'docentes'=>$docentes]);        
    }

    public function editCurso(Request $request){
        $curso = Curso::where('id','=',$request->id)->first();
        $curso->name = $request->name;
        $curso->description = $request->descripcion;
        $curso->link = $request->link;
        $curso->youtubelink = $request->youtubelink;
        $curso->docente_id = $request->docente;
        if($request->image){
            $image = base64_encode(file_get_contents($request->image->path()));
            $curso->image = $image;
        }
        $curso->update();
        return View("admin.admin");
        
    }

    

}
