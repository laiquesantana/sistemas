@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">Clientes</div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered clientes">
                            <thead>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>CPF</th>
                                <th>Endereço</th>
                                <th>Telefone</th>
                                <th>Ativo</th>
                                <th>Editar</th>
                                <th>Desabilitar</th>
                                <th>Ativar</th>
                            </thead>
                            <tbody>
                                @foreach ($clientes as $cliente )
                                <tr> 
                                    <td>{{$cliente->nome}}</td>
                                    <td>{{$cliente->email}}</td>
                                    <td>{{$cliente->cpf}}</td>
                                    <td>{{$cliente->endereco}}</td>
                                    <td>{{$cliente->telefone}}</td>
                                    <td>
                                    @if ($cliente->deleted_at === NULL)
                                     <ul>
                                         Sim </ul>
                                     @else ($cliente->deleted_at != NULL)
                                     <ul>
                                         Não </ul>
                                     @endif
                                    </td>
                                    <td><a href="{{ route('clientes.edit',array($cliente->id))}}" class="btn btn-success"> Editar</a></td>
                                    <td> <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Desabilitar
                                                </button>
                                    </form> </td>

                                <td> <a href="{{ route('clientes.active',array($cliente->id))}}" class="btn btn-primary"> Ativar </a></td>
                                </tr>
                                @endforeach
                                   {{$clientes->links()}}
                            </tbody>
                       </table>

                    </div>
                          <!-- Modal -->


                </div>
            </div>
        </div>
    </div>
</div>
@endsection



