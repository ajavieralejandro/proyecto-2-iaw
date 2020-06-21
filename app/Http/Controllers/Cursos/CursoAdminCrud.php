<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Datatables;

class CursoAdminCrud extends Controller
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
    

    public function index(Request $request){
        $cursos = User::All();
        return View("curso.crudtable",["cursos"=>$cursos]);
    }
}
