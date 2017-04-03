    @extends('layouts.app')

    @section('content')

     <div class="container">

            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-primary">
                    <div class="panel-heading">Cadastrar Veiculo</div>
                        <div class="panel-body">
                     <h1>Cadastro</h1>

                      @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif

                            {{ Form::open(
                            array(
                                'method' => 'POST',
                                'route' => array('veiculos.store'),
                                'class' => 'form-horizontal'
                            )
                            ) }}

                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                         <li>   {{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                                    
                                    <div class="form-group">
                                            {{ Form::label('marca', 'Marca:', ['class' => 'col-sm-3 control-label']) }}
                                            <div class="col-sm-9">
                                                {{ Form::text('marca',  null , ['class' => ' form-control']) }}
                                            </div>
                                    </div>


                                    <div class="form-group">

                                         {{ Form::label('modelo', 'Modelo:',  ['class' => 'col-sm-3 control-label']) }}
                                            <div class="col-sm-9">
                                                 {{ Form::text('modelo', null , ['class' =>  'form-control']) }}
                                            </div>
                                    </div>


                                    <div class="form-group">
                                            {{ Form::label('ano', 'Ano:', ['class' => 'col-sm-3 control-label']) }}
                                            <div class="col-sm-9">
                                                {{ Form::text('ano',  null , ['class' => ' form-control']) }}
                                            </div>
                                    </div>

                                    <div class="form-group">
                                            {{ Form::label('placa', 'Placa:', ['class' => 'col-sm-3 control-label']) }}
                                            <div class="col-sm-9">
                                                {{ Form::text('placa',  null , ['class' => ' form-control']) }}
                                            </div>
                                    </div>


                                    <div class="form-group">
                                            {{ Form::label('valor_aluguel', 'Valor da Diaria:', ['class' => 'col-sm-3 control-label']) }}
                                            <div class="col-sm-9">
                                                {{ Form::text('valor_aluguel',  null , ['class' => ' form-control']) }}
                                            </div>
                                    </div>

                                    <div class="form-group">
                                            {{ Form::label('cor', 'Cor:', ['class' => 'col-sm-3 control-label']) }}
                                            <div class="col-sm-9">
                                                {{ Form::text('cor',  null , ['class' => ' form-control']) }}
                                            </div>
                                    </div>

                                    <div class="form-group">
                                      <div class="col-sm-9">
                                        {{ Form::submit('Cadastrar', array('class' => 'btn btn-info')) }}
                                       	<a href="{{route('veiculos.index')}}" class="btn btn-danger">Cancelar</a>
                                      </div>

                                    </div>

                            {{ Form::close() }}
                    </div>
                </div>

        </div>
    </div>

    @endsection
