<?php

namespace App\Http\Controllers\Token;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Str;
use Auth;
use App\User;
class TokenController extends Controller
{
    //
    public function redirect(Request $request){
        dd(Auth::user());
        $tokenResult = $user->createToken('Personal Access Token');

        $request->session()->put('state', $state = Str::random(40));

        $query = http_build_query([
            'client_id' => 'client-id',
            'redirect_uri' => 'http://localhost:8000/callback',
            'response_type' => 'code',
            'scope' => '',
            'state' => $state,
        ]);
    
        return redirect('http://localhost:8000/oauth/authorize?'.$query);

    }

    public function getSPA(Request $request){
        //to change on deploy
        $token = Auth::user()->createToken('api')->accessToken;
        return View('spa.spa',['token' => $token]);
    }

    public function getApiToken(Request $request){
        if($request->email){
            $user = User::whereEmail($request->email)->first();
        }
        else $user = null;
        if(!Auth::user())  return response()->json([
           'message'=>'no access',
        ]);
        $token = $user->createToken('api')->accessToken;
        return response()->json([
            'user'=>$user,
            'token'=>$token
        ]);
    }
}
