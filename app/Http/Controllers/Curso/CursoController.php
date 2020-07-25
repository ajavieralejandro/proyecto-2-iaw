<?php

namespace App\Http\Controllers\Curso;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Curso;
use App\Docente;
use Log;
use Embed;
use Illuminate\Support\Facades\Validator;



class CursoController extends Controller
{
    //
    public function addCurso(Request $request){

        //validator
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'max:255'],
            'descripcion' => ['required'],
            'price' => 'required|integer|min:0',
            'link' => ['required'],
            'youtubelink' => ['required'],
            'docente' => ['required'],            
        ]);
        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }


        $curso = new Curso();
        $curso->name = $request->name;
        $curso->description = $request->descripcion;
        $curso->price = $request->price;
        $curso->link = $request->link;
        $curso->youtubelink = $request->youtubelink;
        $curso->docente_id = $request->docente;
        //la imagen puede ser nula 
        if($request->image){
            $image = base64_encode(file_get_contents($request->image->path()));
            $curso->image = $image;
        }
        else{
            $path = base_path().'/public/images/curso.jpg';
            $curso->image = base64_encode(file_get_contents($path));
        }
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
                           $btn = '<div><a href="/CursoAdmin/'.$data->id.'" class="edit btn btn-outline-success btn-sm">View</a>
                           <a href="editCurso/'.$data->id.'" class="edit btn btn-outline-warning btn-sm">Edit</a>
                           <button name='.$data->name.'  value='.$data->id.' class="delete btn btn-outline-danger btn-sm">Delete</button></div>';

                            return $btn;
                    })
                    ->rawColumns(['action'])          
                    ->make(true);
        }
      

    }

    public function viewCursoAdmin(Request $request){
        $id = $request->route('id');
        $curso = Curso::where('id','=', $id)->first();
        return View("curso.cursoAdmin",['curso'=>$curso]);
    }

    public function viewCurso(Request $request){
        Log::info("Estoy en el metodo de ViewCurso");
        $id = $request->route('id');
        $curso = Curso::where('id','=', $id)->first();
        $curso->youtubelink = Embed::make($curso->youtubelink)->parseUrl();
        if($curso->youtubelink){
            $curso->youtubelink->setAttribute(['width' => 400]);
            $curso->youtubelink = $curso->youtubelink->getHtml();
        }
        if($curso!=null)
            return View("curso.curso",['curso'=>$curso]);
        else
            return back();
    }


    public function apiCursos(){
        Log::info("Hola estoy en api cursos");
        return response(['Message' => 'Todo esta andando bien!!'], 200);
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
            //validator
            $validator = Validator::make($request->all(), [
                'name' => ['required', 'max:255'],
                'descripcion' => ['required'],
                'price' => 'required|integer|min:0',
                'link' => ['required'],
                'youtubelink' => ['required'],
                'docente' => ['required'],            
            ]);
            if ($validator->fails()) {
                return back()
                            ->withErrors($validator)
                            ->withInput();
            }
    
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
