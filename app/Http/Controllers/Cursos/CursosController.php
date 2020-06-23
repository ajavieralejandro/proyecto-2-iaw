<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Datatables;

class CursosController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function getCursos(Request $request){
        
        return Datatables::eloquent(App\User::query())->make(true);

        
    }

    public function addCursoView(Request $request){
        return View("curso.addnewcurso");
    }
    

    public function index(Request $request){
        return View("curso.crudtable");
    }
}
