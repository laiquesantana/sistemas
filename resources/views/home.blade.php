@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Painel</div>
                <div class="panel-body">


                            @if (session('clienteAt'))
                                <div class="alert alert-success">
                                    {{ session('clienteAt') }}
                                </div>
                            @endif
                             @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                    Você está logado!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
