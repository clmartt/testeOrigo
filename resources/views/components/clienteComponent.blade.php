
   <div class="container">
          @isset($cliente)
              @component('components.tableClientDetalhes',['cliente'=>$cliente])
                  
              @endcomponent
          @endisset
   </div>

