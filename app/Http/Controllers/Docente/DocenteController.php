<?php

namespace App\Http\Controllers\Docente;

use Illuminate\Http\Request;
use App\Docente;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Auth;
use Log;




class DocenteController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function getDocentesDatatables(Request $request){
        if ($request->ajax()) {
            $data = Docente::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
                        $btn = '<div><a href="/docente/'.$data->id.'" class="edit btn btn-outline-success btn-sm">View</a>
                        <a href="editDocente/'.$data->id.'" class="edit btn btn-outline-warning btn-sm">Edit</a>
                        <button name='.$data->name.'  value='.$data->id.' class="delete btn btn-outline-danger btn-sm">Delete</button></div>';

                            return $btn;
                    })
                    ->rawColumns(['action'])          
                    ->make(true);
        }
      

    }

    public function getDocentesView(Request $request){
        //No le doy acceso a menos que no sea admin
        return View("docente.crudtable");

    }

    public function editDocenteView(Request $request){
        
                $id = $request->route('id');
                $docente = Docente::where('id','=', $id)->first();
                return View("docente.editdocente",['docente'=>$docente]);



    }

    public function getDocenteView(Request $request){
        $id = $request->route('id');
        $docente = Docente::where('id','=', $id)->first();
        return View("docente.viewdocente",['docente'=>$docente]);
        //$image = imagecreatefromstring(base64_decode($results->getBase64Image()));

    }

    public function updateDocente(Request $request){
               //Reglas de validación 
               $validator = Validator::make($request->all(), [
                'name' => ['required', 'max:255'],
                'bio' => ['required'],
                'email' => ['required'],
                'profesion' => ['required'],
    
            ]);
            
            if ($validator->fails()) {
                return back()
                            ->withErrors($validator)
                            ->withInput();
            }
        $docente = Docente::where('id','=', $request->id)->first();
        $docente->name = $request->name;
        $docente->bio = $request->bio;
        $docente->profesion = $request->profesion;
        $docente->email = $request->email;
        if($request->image){
            $image = base64_encode(file_get_contents($request->image->path()));
            $docente->image = $image;
        }
        $docente->update();
        return View("admin.admin");
    
    }

    public function deleteDocente(Request $request){
        if($request->ajax()){
            $id = $request->id;
            $docente = Docente::where('id','=', $id)->first();
            $docente->delete();
            return response(['Message' => 'This request has been deleted'], 200);
        }
            else 
            return View("curso.crudtable");

    }

    public function addDocente(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'max:255'],
            'bio' => ['required'],
            'email' => ['required'],
            'profesion' => ['required'],

        ]);
        
        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }
        //$image = base64_encode(file_get_contents($request->file('image')->pat‌​h()));
        $docente = new Docente();
        $docente->name = $request->name;
        $docente->bio = $request->bio;
        $docente->profesion = $request->profesion;
        $docente->email = $request->email;
        if($request->image){
            $image = base64_encode(file_get_contents($request->image->path()));
            $docente->image = $image;
        }
        $docente->save();
        return View('admin.admin');

    }

  
}
