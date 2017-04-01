    @extends('layouts.app')

    @section('content')


     <div class="container">

            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-primary">
                    <div class="panel-heading">Editar Cliente</div>
                        <div class="panel-body">
                     <h1>Editar :</h1>              
                            {{ Form::model($Clientes,
                            array(
                                'method' => 'PATCH',
                                'route' => array('clientes.update', $Clientes->id),
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
                                        {{ Form::submit('Atualizar', array('class' => 'btn btn-success')) }}
                                        {{ link_to_route('funcionarios.index', 'Cancelar', $Clientes->id, array('class' => 'btn btn-danger')) }}
                                      </div>

                                    </div>

                            {{ Form::close() }}
                    </div>
                </div>

        </div>
    </div>

    @endsection
