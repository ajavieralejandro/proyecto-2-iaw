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
        //dd($request);
        //validator
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'max:255','unique:cursos'],
            'descripcion' => ['required'],
            'price' => 'required|integer|min:0',
            'link' => ['    required'],
            'youtubelink' => ['required'],
            'docente' => ['required'],
            'image' => ['mimes:jpeg,bmp,png']

            
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
        if($request->image && $request->file('image')->getSize()){
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
                           $btn = '<div><a href="/admin/CursoAdmin/'.$data->id.'" class="edit btn btn-outline-success btn-sm">View</a>
                           <a href="/admin/editCurso/'.$data->id.'" class="edit btn btn-outline-warning btn-sm">Edit</a>
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
        if($curso!=null)
        return View("curso.curso",['curso'=>$curso]);
        $curso->youtubelink = Embed::make($curso->youtubelink)->parseUrl();
        if($curso->youtubelink){
            $curso->youtubelink->setAttribute(['width' => 400]);
            $curso->youtubelink = $curso->youtubelink->getHtml();
        }
     
        else
            return back();
    }


    public function apiCursos(Request $request){
        //Log::info("Hola estoy en api cursos");
        //Log::info($request);
        $cursos = Curso::all();
        return response()->json($cursos);
        //return response(['Message' => 'Todo esta andando bien!!'], 200);
    }

    public function apiCursos2(Request $request){
        Log::info("Hola estoy en api cursos");
        
        $name = request('name');
        if($name)
            $name = strtolower($name);
        Log::info($name);
        $cursos = Curso::whereRaw('lower(name) like (?)', ["%{$name}%"])->get();
        return response()->json($cursos);
        //return response(['Message' => 'Todo esta andando bien!!'], 200);
    }

    public function deleteCurso(Request $request){
        if($request->ajax()){
        Log::info("Logging on   e variable: ");
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

            $validator = Validator::make($request->all(), [
                'name' => 'required|string|unique:cursos,name,'.$curso->id,
                'descripcion' => ['required'],
                'price' => 'required|integer|min:0',
                'link' => ['required'],
                'youtubelink' => ['required'],
                'docente' => ['required'],
                'image' => ['mimes:jpeg,bmp,png']
            
            ]);
            if ($validator->fails()) {
                return back()
                            ->withErrors($validator)
                            ->withInput();
            }
    
        $curso->name = $request->name;
        $curso->description = $request->descripcion;
        $curso->link = $request->link;
        $curso->youtubelink = $request->youtubelink;
        $curso->docente_id = $request->docente;
        if($request->image && $request->file('image')->getSize()){
            $image = base64_encode(file_get_contents($request->image->path()));
            $curso->image = $image;
        }
        $curso->update();
        return View("admin.admin");
        
    }


    

}
