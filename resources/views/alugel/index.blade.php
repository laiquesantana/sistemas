@extends('layouts.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
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
                  {{ Form::label('marca', 'Marca :', ['class' => 'col-sm-3 control-label']) }}
                   <div class="col-md-5">
                    <select class="form-control input-sm"  name="marcaoi" id="marcaoi">
                       @foreach($marcas as $marcaoi)
                             <option value="{{$marcaoi->id}}">{{$marcaoi->marca}}</option>
                       @endforeach
                        </select>
                       </div>              
            </div>
               <div class="form-group">
                 {{ Form::label('modelo', 'Marca :', ['class' => 'col-sm-3 control-label']) }}
                   <div class="col-md-5">
                    <select class="form-control input-sm " name="modelo" id="modelo" >
                        <option value=""></option>
                        </select>
                       </div>              
            </div>

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
            {{ Form::label('idVeiculo', 'Veiculos :', ['class' => 'col-sm-3 control-label']) }}
            <div class="col-sm-3">
                {{ Form::select('idVeiculo', App\Veiculo::todosVeiculos(), null, ['class' => 'form-control', 'placeholder'=> 'selecione..']) }}
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


<script type="text/javascript">
    $('#marcaoi').on('change',function(e){
        console.log(e);
        var cat_id = e.target.value;
        //ajax
         $.get("{{route('alugeis.index')}}",{id:$(this).val()}, function(data){

           $('#modelo').empty();
           $.each(data, function(index, subcatObj){
                $('#modelo').append('<option value = "'+subcatObj.id+'">'+subcatObj.name+'</option>');

           });

        });

    });

</script>