<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request; 
use App\Docente;
use Log;
use Auth;
class AdminController extends Controller
{
    public function __construct(){
        //Set up admin guard
        //$this->middleware('auth:admin');
    }

    public function index(){
        Log::info("Estoy queriendo entrar como admin");
        Log::info(Auth::user());
        return View('admin.admin');
    }


    public function addCursoView(Request $request){
        $docentes = Docente::all();
        return View("curso.addnewcurso",['docentes' => $docentes]);
    }

    public function cursosCrudView(Request $request){
        return View("curso.crudtable");
    }

    public function addDocenteView(Request $request){
        return View("docente.addnewdocente");
    }

    public function uploadDocente(Request $request){
        //$image = base64_encode(file_get_contents($request->file('image')->pat‌​h()));
        $image = base64_encode(file_get_contents($request->image->path()));
        $docente = new Docente();
        $docente->name = $request->name;
        $docente->bio = $request->bio;
        $docente->profesion = $request->profesion;
        $docente->image = $image;
        $docente->save();
        return View('admin.admin');

    }
    
}
