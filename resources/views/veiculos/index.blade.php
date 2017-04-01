@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">Veiculos</div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <a href="{{route('veiculos.create')}}" class="btn- btn-primary">Inserir Novo Veiculo</a>
                        <table class="table table-hover table-bordered clientes">
                            <thead>
                                <th>Nº</th>
                                <th>Ano</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Placa</th>
                                <th>Cor</th>
                                <th>Diaria</th>
                                <th>Editar</th>
                                <th>Desabilitar</th>
                                <th>Ativar</th>
                            </thead>
                            <tbody>
                                @foreach ($veiculos as $veiculo )
                                <tr>                       
                                    <td>{{$veiculo->id}}</td>
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



