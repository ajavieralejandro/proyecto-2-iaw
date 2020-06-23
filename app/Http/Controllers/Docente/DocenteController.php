<?php

namespace App\Http\Controllers\Docente;

use Illuminate\Http\Request;
use App\Docente;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;


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
                    ->addColumn('action', function($row){
                           $btn = '<div><a href="javascript:void(0)" class="edit btn btn-outline-success btn-sm">View</a>
                           <a href="javascript:void(0)" class="edit btn btn-outline-success btn-sm">Edit</a>
                           <a href="javascript:void(0)" class="edit btn btn-outline-success btn-sm">Delete</a></div>';

                            return $btn;
                    })
                    ->rawColumns(['action'])          
                    ->make(true);
        }
      

    }

    public function getDocentesView(Request $request){
        return View("docente.crudtable");

    }
}
