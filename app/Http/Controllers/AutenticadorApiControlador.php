<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validador;

class AutenticadorApiControlador extends Controller
{
    public function registrar(Request $request){
    
        // Registra um novo usuario, para solicitação de token de acesso
       $request->validate([
            'email'=>'required|unique:users',
            'password'=>'required',
            'password_confirmation'=>'required'
        ]);

       
        $user = new User([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> bcrypt($request->password),
        ],201);
        $user->save();

        return response()->json([
            'resposta'=>'Usuario Criado com sucesso',
            'E-mail'=>$request->email,
             
        ]);
    }


    // realiza o login e devolve um token de acesso
    public function login(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
            
        ]);

        $credenciais=[
            'email'=>$request->email,
            'password'=>$request->password
        ];
       if(!Auth::attempt($credenciais)){
           return response()->json([
               'resposta'=>'Acesso Negado'
           ],401);
        };

           $user = $request->user();
           $token = $user->createToken('Token de Acesso')->accessToken;
           return response()->json([
               'token'=>$token
           ],200);
        ;

    }

    // Rota de Logout
    public function logout(Request $request){
        $request->user()->token()->revoke();
        return response()->json([
            'resposta'=>'Logout com sucesso'
        ]);
    }


   
}
