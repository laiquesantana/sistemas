    @extends('layouts.app')

    @section('content')

     <div class="container">

            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-primary">
                    <div class="panel-heading">Editar Usuário</div>
                        <div class="panel-body">
                     <h1>Editar Usuário</h1>



                            {{ Form::model($users,
                            array(
                                'method' => 'PATCH',
                                'route' => array('funcionarios.update', $users->id),
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

                                        {{ Form::label('perfil', 'Administrador:', ['class' => 'col-sm-3 control-label'])}}
                                        <div class="col-sm-9">
                                            {{ Form::radio('perfil', 'admin')}}
                                            {{ Form::label('perfil', 'Sim') }}
                                            {{ Form::radio('perfil', 'user')}}
                                            {{ Form::label('perfil', 'Não' ) }}
                                        </div>
                                    </div>



                                    <div class="form-group">

                                         {{ Form::label('email', 'Email:',  ['class' => 'col-sm-3 control-label']) }}
                                            <div class="col-sm-9">
                                                 {{ Form::text('email', null , ['class' =>  'form-control']) }}
                                            </div>
                                    </div>


                                    <div class="form-group">
                                            {{ Form::label('name', 'Nome:', ['class' => 'col-sm-3 control-label']) }}
                                            <div class="col-sm-9">
                                                {{ Form::text('name',  null , ['class' => ' form-control']) }}
                                            </div>
                                    </div>



                                    <div class="form-group">

                                            {{ Form::label('password', 'Senha:',  ['class' => 'col-sm-3 control-label']) }}
                                            <div class="col-sm-9">
                                             {{ Form::password('password', ['class' => 'awesome form-control']) }}
                                            </div>
                                    </div>

                                    <div class="form-group">

                                            {{ Form::label('password', 'Confirmar Senha:',  ['class' => 'col-sm-3 control-label']) }}
                                            <div class="col-md-9">
                                              {{ Form::password('password_confirmation', ['class' => 'awesome form-control']) }}
                                            </div>
                                    </div>

                                    <div class="form-group">
                                      <div class="col-sm-9">
                                        {{ Form::submit('Atualizar', array('class' => 'btn btn-info')) }}
                                        {{ link_to_route('funcionarios.index', 'Cancelar', $users->id, array('class' => 'btn btn-info')) }}
                                      </div>

                                    </div>

                            {{ Form::close() }}
                    </div>
                </div>

        </div>
    </div>

    @endsection
