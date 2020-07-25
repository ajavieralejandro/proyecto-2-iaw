<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Validator;
use Log;
use App\Curso;

class UserController extends Controller
{
    //
    public function viewUser(Request $request){
        
        return View('user.user');

    }

    public function editUser(Request $request){
        return View('user.edit');
    }

    public function addCurso(Request $request){
        Log::Info("hola empezo el metodo add curso");
        $user = Auth::user();
        Log::info("Llego acá sin errores 1");
        $curso = Curso::where('id','=', $request->id)->first();
        Log::info("Llego acá sin errores 2");
        if(!$user->subscripto()->get()->where('curso_id',$curso->id)->first()){
            Log::info("Voy a subscribir al usuario : ");
            $user->subscripto()->attach($curso->id);
        
        }
        else
        Log::info("El usuario ya está inscripto. ");

    
 
        Log::info("Finalizo sin errores");
        return back();
    }

    public function editUserPut(Request $request){
              //Reglas de validación 
              Log::info("Hola pepe");
              $user = Auth::user();

         $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:users,name,'.$user->id,
            'email' => 'required|email|unique:users,email,'.$user->id,    
            ]);
            
            if ($validator->fails()) {
                return back()
                            ->withErrors($validator)
                            ->withInput();
            }
        Log::info("Llego acá sin errores 1");

        if($user->id != $request->id){
            Log::info("Estoy entrando aquí");
            Log::info($user->id);
            Log::info($request->id);



            return back()
            ->withErrors("Los ids no coinciden")
           ->withInput();

        }
        Log::info("Llego acá sin errores 2");
        $user->name = $request->name;
        Log::info("Llego acá sin errores 3");
        $user->email = $request->email;

        if($request->hasFile('avatar')){
            $image = base64_encode(file_get_contents($request->file('avatar')->path()));
            $user->avatar = $image;
        }
        Log::info("Llego acá sin errores 4");
        $user->update();
        Log::info("Llego acá sin errores 5");
            return View('user.user');

    }

    public function getUserCursosView(Request $request){
        $user = Auth::user();
        $cursos = $user->subscripto()->get();
        return View('curso.cursosuser',['cursos'=>$cursos]);
    }


}
