@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><center>Bem Vindo(a) a XPTZ-Rent a Car</center></div>
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
                </div>
            </div>
        </div>
    </div>
    <center><img src="../images/ferrari.png" height="600px;"></center>
</div>
@endsection
