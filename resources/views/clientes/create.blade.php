    @extends('layouts.app')

    @section('content')

     <div class="container">

            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-primary">
                    <div class="panel-heading">Cadastrar Cliente</div>
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
                                'route' => array('clientes.store'),
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
                                            {{ Form::label('nome', 'Nome:', ['class' => 'col-sm-3 control-label']) }}
                                            <div class="col-sm-9">
                                                {{ Form::text('nome',  null , ['class' => ' form-control']) }}
                                            </div>
                                    </div>


                                    <div class="form-group">

                                         {{ Form::label('email', 'Email:',  ['class' => 'col-sm-3 control-label']) }}
                                            <div class="col-sm-9">
                                                 {{ Form::text('email', null , ['class' =>  'form-control']) }}
                                            </div>
                                    </div>


                                    <div class="form-group">
                                            {{ Form::label('cpf', 'Cpf:', ['class' => 'col-sm-3 control-label']) }}
                                            <div class="col-sm-9">
                                                {{ Form::text('cpf',  null , ['class' => ' form-control']) }}
                                            </div>
                                    </div>

                                    <div class="form-group">
                                            {{ Form::label('endereco', 'Endereço:', ['class' => 'col-sm-3 control-label']) }}
                                            <div class="col-sm-9">
                                                {{ Form::text('endereco',  null , ['class' => ' form-control']) }}
                                            </div>
                                    </div>


                                    <div class="form-group">
                                            {{ Form::label('telefone', 'Telefone:', ['class' => 'col-sm-3 control-label']) }}
                                            <div class="col-sm-9">
                                                {{ Form::text('telefone',  null , ['class' => ' form-control']) }}
                                            </div>
                                    </div>




                                

                                    <div class="form-group">
                                      <div class="col-sm-9">
                                        {{ Form::submit('Cadastrar', array('class' => 'btn btn-info')) }}
                                        {{ link_to_route('clientes.store', 'Cancelar',array('class' => 'btn btn-info')) }}
                                      </div>

                                    </div>

                            {{ Form::close() }}
                    </div>
                </div>

        </div>
    </div>

    @endsection
