@extends('layouts.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
@section('content')

  {{ Form::open(
        array(
            'method' => 'POST',
            'route' => array('alugeis.store'),
            'class' => 'form-horizontal'
        )
     ) 
    }}


 <div class="container">
     <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                    <div class="panel-heading">Locação de Veículos</div>
                        <div class="panel-body">
                           @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                           @endif

        <div class="form-group">
                  {{ Form::label('idCliente', 'Clientes :', ['class' => 'col-sm-3 control-label']) }}
                   <div class="col-md-5">
                    <select name="idCliente" id="idCliente" class="form-control input-sm">
                        <option value="">Escolha o Cliente</option>
                        @foreach($Clientes as $cliente)
                            <option value="{{$cliente->id}}">{{ $cliente->nome}}</option>
                        @endforeach
                       </select>
                       </div>
                </label>
            </div>

            <div class="form-group">
                  {{ Form::label('marca', 'Marca :', ['class' => 'col-sm-3 control-label'])}}
                   <div class="col-md-5">
                    <select class="marcas"  name="marcaoi" id="marcaoi" >
                       @foreach($marcas as $marcaoi)
                             <option value="{{$marcaoi->marca}}">{{$marcaoi->marca}}</option>
                       @endforeach
                     </select>
                    </div>              
            </div>
               <div class="form-group">
                 {{ Form::label('modelo', 'Modelo :', ['class' => 'col-sm-3 control-label']) }}
                   <div class="col-md-5">
                    <select class="form-control" name="modelo" id="modelo" >
                        <option value=""></option>
                        </select>
                       </div>              
            </div>

           <!--  <div class="form-group">
                  {{ Form::label('idCliente', 'Clientes :', ['class' => 'col-sm-3 control-label']) }}
                   <div class="col-md-5">
                    <select name="idCliente" id="idCliente" class="form-control input-sm">
                        <option value="">Escolha o Cliente</option>
                        @foreach($Clientes as $cliente)
                            <option value="{{$cliente->id}}">{{ $cliente->nome}}</option>
                        @endforeach
                       </select>
                       </div>
                </label>
            </div> -->

       <!--  <div class="form-group">
            {{ Form::label('idVeiculo', 'Veiculos :', ['class' => 'col-sm-3 control-label']) }}
            <div class="col-sm-3">
                {{ Form::select('idVeiculo', App\Veiculo::todosVeiculos(), null, ['class' => 'form-control', 'placeholder'=> 'selecione..']) }}
            </div>
        </div>
 -->
        <div class="form-group">
            {{ Form::label('cor', 'Cor :', ['class' => 'col-sm-3 control-label']) }}
            <div class="col-sm-3">
                {{ Form::text('cor', null, ['class' => 'form-control']) }}
            </div>
        </div>  
        <div class="form-group">
            {{ Form::label('placa', 'Placa :', ['class' => 'col-sm-3 control-label']) }}
            <div class="col-sm-3">
                {{ Form::text('placa', null, ['class' => 'form-control']) }}
            </div>
        </div> 
        <div class="form-group">
            {{ Form::label('ano', 'Ano :', ['class' => 'col-sm-3 control-label']) }}
            <div class="col-sm-3">
                {{ Form::text('ano', null, ['class' => 'form-control']) }}
            </div>
        </div> 

        <div class="form-group">
            {{ Form::label('dataLocacao', 'Data de Locação :', ['class' => 'col-sm-3 control-label']) }}
            <div class="col-sm-3">
                {{ Form::date('dataLocacao', null, ['class' => 'form-control']) }}
            </div>
        </div>	
         <div class="form-group">
            {{ Form::label('dataDevolucao', 'Data de Devolução :', ['class' => 'col-sm-3 control-label']) }}
            <div class="col-sm-3">
                {{ Form::date('dataDevolucao', null, ['class' => 'form-control']) }}
            </div>
        </div>   
 

        <div class="form-group">
            {{ Form::label('pagamento', 'Valor Diaria :', ['class' => 'col-sm-3 control-label']) }}
            <div class="col-sm-3">
                {{ Form::text('pagamento', null, ['class' => 'form-control']) }}
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                {{ Form::submit('Atualizar', ['class' => 'btn btn-primary']) }}
            </div>
        </div>
      </div>
    </div>
   </div>
 </div>

{{ Form::close() }}

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">
   $(document).ready(function(){

    $(document).on('change','marcasoi', function(){
        console.log("change");
    });

   });

</script>