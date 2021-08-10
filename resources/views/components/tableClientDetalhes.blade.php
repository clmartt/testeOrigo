@isset($cliente)


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
            <th scope="col">Editar</th>
            <th scope="col">Excluir</th>

          </tr>
        </thead>
        <tbody>
         
                                    
            <tr>
                <td >{{$cliente->id}}</td>
                <td >{{$cliente->nome}}</td>
                <td>{{$cliente->email}}</td>
                <td>{{$cliente->telefone}}</td>
                <td>{{$cliente->estado}}</td>
                <td>{{$cliente->cidade}}</td>
                <td>{{date('d-m-Y',strtotime($cliente->data_nascimento))}}</td>
                <td class="text-center"><button class="btn btn-link" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="{{asset('img/edit.jpg')}}" alt="Editar" width="30px" height="30px"></button></td>
                <td class="text-center"><button class="btn btn-link"><img src="{{asset('img/excluir.png')}}" alt="Editar" width="30px" height="30px"></button></td>
                
               
            </tr>
       
            
        </tbody>
      </table>
  </div>
 
  <br>

  <nav class="navbar navbar-light bg-light">
    <div class="container-fluid ">
      <a class="navbar-brand" href="#">Planos Contratados</a>
     
    </div>
  </nav>
  <hr>

  @foreach ($cliente->planos as $p)
     <b> Plano</b> :{{$p->plano}} = <b>Mensalidade : </b>{{$p->mensalidade}}<br>
     
  @endforeach
@endisset
<div class="text-center"><a href="{{route('lista.cliente')}}" class="btn btn-secondary"> Retornar</a></div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('atualizar.cliente',['id'=>$cliente->id])}}">
          @method('PUT')
          @csrf
          <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="nome" class="form-control" id="nomeCLiente" name="nomeCLiente" required value="{{$cliente->nome}}">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="emailCLiente" name="emailCLiente" required value="{{$cliente->email}}">
          </div>
          <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" class="form-control" id="telefoneCLiente" name="telefoneCLiente" required value="{{$cliente->telefone}}">
          </div>
          <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <input type="text" class="form-control" id="estado" name="estado" required value="{{$cliente->estado}}">
          </div>
          <div class="mb-3">
            <label for="cidade" class="form-label">Cidade</label>
            <input type="text" class="form-control" id="cidade" name="cidade" required value="{{$cliente->cidade}}">
          </div>
          <div class="mb-3">
            <label for="nascimento" class="form-label">Data Nascimento</label>
            <input type="text" class="form-control" id="nascimento" name="nascimento" required value="{{date('d-m-Y',strtotime($cliente->data_nascimento))}}">
          </div>
        
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            <button type="submit" class="btn btn-primary">Atualizar</button>
          </div>
        </form>
      </div>
      
    </div>
  </div>
</div>