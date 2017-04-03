@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
          <a href="{{route('alugeis.create')}}" class="btn btn-primary">Alugar Novo Veiculo</a>

          @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            
            <div class="panel panel-primary">
                <div class="panel-heading">Historico de Veiculos Alugados</div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered clientes">
                            <thead>
                                <th>Marca do Veiculo</th>
                                <th>Modelo</th>
                                <th>Cor</th>
                                <th>Placa</th>
                                <th>Ano</th>
                                <th>Data de Locação</th>
                                <th>Data de Devolução</th>
                                <th>Valor</th>
                                <th>Disponível</th>
                                <th>Devoluções</th>
                                <th>Excluir</th>
                            </thead>
                            <tbody>
                                @foreach ($alugueis as $aluguel)
                                <tr> 
                                    <td>{{$aluguel->marca}}</td>
                                    <td>{{$aluguel->modelo}}</td>
                                    <td>{{$aluguel->cor}}</td>
                                    <td>{{$aluguel->placa}}</td>
                                    <td>{{$aluguel->ano}}</td>
                                    <td>{{$aluguel->dataLocacao}}</td>
                                    <td>{{$aluguel->dataDevolucao}}</td>
                                    <td>{{$aluguel->pagamento}}</td>
                                    <td>
                                    @if ($aluguel->disponivel === 1)
                                     <ul>
                                         Sim </ul>
                                     @else ($aluguel->disponivel  != 1)
                                     <ul>
                                         Não </ul>
                                     @endif
                                    </td>
                                    <td> <a href="{{route('aluguel.devolucao', $aluguel->idAluguel) }}" class="btn btn-primary">Devolver</a></td>

                                <td> <form action="{{ route('alugeis.destroy', $aluguel->idAluguel) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <intput type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Excluir
                                                </intput>
                                    </form></td>
                                </tr>
                                @endforeach
                                   {{$alugueis->links()}}
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



