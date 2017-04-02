@extends('layouts.app')
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel= "stylesheet">
<script src= "https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src= "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap-3-typeahead.min.js"></script>
@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">Usuários</div>
                <div class="panel-body">
                    <div class="table-responsive">

                      {!! Form::open([                            
                                'method' => 'GET',
                                'url' => 'search',
                                'class' => 'navbar-form navbar-right', 'role'=>'search'                          
                            ]) !!}
                         <div class="col-md-12">   
                           <div class="input-group custom-search-form">
                                <input type="text" name="search" class="form-control" placeholder= "buscando..">
                                <span class ="input-group-btn"><button class="btn btn-default" type="submit">Ir!</button>
                                </span> 
                            </div>
                            {{ Form::close() }}
                         </div>
                        <table class="table table-hover table-bordered user">
                            <thead>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Perfil</th>
                                <th>Ativo</th>
                                <th>Editar</th>
                                <th>Desabilitar</th>
                                <th>Ativar</th>
                            </thead>
                            <tbody>
                                @foreach ($users as $user )
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>@if ($user->perfil=== 'user')
                                     <ul>Funcionário</ul>
                                     @else ($user->perfil!= 'admin')
                                     <ul>Administrador</ul>
                                     @endif
                                    </td>
                                      <td>
                                    @if ($user->deleted_at === NULL)
                                     <ul>
                                         Sim </ul>
                                     @else ($user->deleted_at != NULL)
                                     <ul>
                                         Não </ul>
                                     @endif
                                    </td>
                                    <td><a href="{{ route('funcionarios.edit',array($user->id))}}" class="btn btn-success" > <span class="glyphicon glyphicon-edit"></span>  Editar</a></td>
                                    <td> <form action="{{ route('funcionarios.destroy', $user->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash">  <span class="glyphicon glyphicon-trash"></span> </i>Desabilitar
                                                </button>
                                    </form> </td>
                                    <td> <a href="{{ route('funcionarios.active',array($user->id))}}" class="btn btn-primary"> Ativar </a></td>
                                </tr>
                                @endforeach

        
                                   {{ $users->links() }}
                            </tbody>
                       </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

</script>


