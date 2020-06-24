<?php

namespace App\Http\Controllers\Docente;

use Illuminate\Http\Request;
use App\Docente;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;



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
                           <a href="editDocente/'.$data->id.'" class="edit btn btn-outline-success btn-sm">Edit</a>
                           <a href="javascript:void(0)" class="edit btn btn-outline-success btn-sm">Delete</a></div>';

                            return $btn;
                    })
                    ->rawColumns(['action'])          
                    ->make(true);
        }
      

    }

    public function getDocentesView(Request $request){
        //No le doy acceso a menos que no sea admin
        $this->middleware('auth:admin');
        return View("docente.crudtable");

    }

    public function editDocenteView(Request $request){
                //No le doy acceso a menos que no sea admin
                $this->middleware('auth:admin');
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
        dd($request);
    }

  
}
