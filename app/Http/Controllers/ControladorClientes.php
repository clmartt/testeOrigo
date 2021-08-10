<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Clientes;
use App\Models\ClientesPlanos;
use App\Models\User;


use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ControladorClientes extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       return Clientes::all()->toJson();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
              
       $request->validate([
            'nome' => 'required',
            'email'=> 'required|email|unique:users',
            'telefone'=> 'required',
            'estado'=> 'required',
            'cidade'=> 'required',
            'nascimento'=> 'required'
        ]);

        try {

            $cliente = new Clientes([
                "nome" => $request->nome,
                "email" => $request->email,
                "telefone" => $request->telefone,
                "estado" => $request->estado,
                "cidade" => $request->cidade,
                "data_nascimento" => $request->nascimento
            ]);
            
            $cliente->save();

            return response()->json([
                "Resposta"=> "Cliente criado com sucesso! ",
                "Id Cliente"=> $cliente->id
            ],201);

        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                "Erro "=> $th,
            ],500);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {        
        $cliente = Clientes::find($id);
         return $cliente->toJson();
              
    }

  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request,[
             'nome' => 'required',
             'email'=> 'required|email|unique:users',
             'telefone'=> 'required',
             'estado'=> 'required',
             'cidade'=> 'required',
             'nascimento'=> 'required'
         ]);

         $up = Clientes::find($id)->update([
             'nome' => $request->nome,
             'email' => $request->email,
             'telefone' => $request->telefone,
             'estado' => $request->estado,
             'cidade' => $request->cidade,
             'data_nascimento' => date('Y-m-d',strtotime($request->nascimento))
             
         ]);
         
         if($up){
             return response()->json([
                 "Update" =>"Atualização realizada com sucesso"
             ],200);
         }else{
            return response()->json([
                "Update" =>"Erro na Atualização dos Dados"
            ],304);
         }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * @return App\Models\Clientes
     */


    public function destroy($id)
    {
        $cliente = Clientes::find($id);
        foreach ($cliente->planos as $p) {
           if($p->plano == 'Free'){
               return response()->json([
                "Plano" =>$p->plano,
                "Negado" => "Clientes com plano Free não podem ser deletados"
               ]);
           }
           
        }
        $cliente->delete(); // softDelete 
        return response()->json([
            "Cliente"=> $cliente->id,
            "nome"=> $cliente->nome,
            "Plano"=> $cliente->planos,
            "Delete"=> $cliente->delete()
        ]);
        
    }

    public function apiLogin(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            
        ]);
    
        $user = User::where('email', $request->email)->first();
    
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
    
        return $user->createToken($request->email)->plainTextToken;
    }


    public function registro(Request $request){
        //nome email senha
        $request->validate([
            'name'=>'require|string',
            'email'=>'require|string|unique:users',
            'password'=>'require|string|confirmed',

        ]);

        $user = new User([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> bcrypt($request->password),
        ]);
       
        $user->save();
        return response()->json([
            'resposta'=>'Usuario Criado com sucesso'
        ],201);
    }
}
