<?php

namespace App\Http\Controllers;

use App\User;
use App\Docente;
use Illuminate\Http\Request;
use DataTables;



class UserController extends Controller
{
    //
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::latest()->get();
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
}
