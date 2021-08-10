@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div >
            <div class="card">
                <div class="card-header">Lista de Clientes</div>

                <div class="card-body">
                   @isset($clientes)

                   
                   <div class="table-responsive table-sm">

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nome</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Telefone</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Cidade</th>
                                <th scope="col">Nascimento</th>
                              
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($clientes as $c)
                                    
                                    <tr>
                                        <th ><a href="{{route('detalhes.cliente',$c->id)}}" class="btn btn-link">{{$c->id}}</a></th>
                                        <th >{{$c->nome}}</th>
                                        <td>{{$c->email}}</td>
                                        <td>{{$c->telefone}}</td>
                                        <td>{{$c->estado}}</td>
                                        <td>{{$c->cidade}}</td>
                                        <td>{{date('d-m-Y',strtotime($c->data_nascimento))}}</td>
                                        
                                       
                                    </tr>

                                  
                                @endforeach
                            
                        
                            </tbody>
                        </table>
                     
                        
                   </div>
                   @endisset

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
