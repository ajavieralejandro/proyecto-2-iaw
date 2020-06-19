<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request; 

class AdminController extends Controller
{
    public function __construct(){
        //Set up admin guard
        $this->middleware('auth:admin');
    }

    public function index(){
        return View('admin.admin');
    }
}
