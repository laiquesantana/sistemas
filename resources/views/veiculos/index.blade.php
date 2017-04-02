@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <a href="{{route('veiculos.create')}}" class="btn btn-primary">Inserir Novo Veiculo</a>

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                         <li>   {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <div class="panel panel-primary">
                <div class="panel-heading">Veiculos</div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered clientes">
                            <thead>
                                <th>Ano</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Placa</th>
                                <th>Cor</th>
                                <th>Diaria</th>
                                <th>Ativo</th>
                                <th>Editar</th>
                                <th>Opções</th>
                                <th>Excluir</th>
                            </thead>
                            <tbody>
                                @foreach ($veiculos as $veiculo )
                                <tr>         
                                    <td>{{$veiculo->ano}}</td>
                                    <td>{{$veiculo->marca}}</td>
                                    <td>{{$veiculo->modelo}}</td>
                                    <td>{{$veiculo->placa}}</td>
                                    <td>{{$veiculo->cor}}</td>
                                    <td>{{$veiculo->valor_aluguel}}</td>
                                    <td>
                                    @if ($veiculo->deleted_at === NULL)
                                     <ul>
                                         Sim </ul>
                                     @else ($veiculo->deleted_at != NULL)
                                     <ul>
                                         Não </ul>
                                     @endif
                                    </td>
                                    <td><a href="{{ route('veiculos.edit',array($veiculo->id))}}" class="btn btn-success"> Editar</a></td>
                                    <td> <form action="{{ route('veiculos.destroy', $veiculo->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Desabilitar
                                                </button>
                                    </form> </td>

                                <td> <a href="{{ route('veiculos.active',array($veiculo->id))}}" class="btn btn-primary"> Ativar </a></td>
                                </tr>
                                @endforeach
                                   {{$veiculos->links()}}
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



