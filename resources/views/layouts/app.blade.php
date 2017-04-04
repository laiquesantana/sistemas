<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/master.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src= "//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script src="{{ asset('js/bootstrap.js') }}" rel="stylesheet"></script>

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">

                  <ul class="nav navbar-nav">

                        @if (Auth::check() and Auth::user()->perfil === 'user')
                            <li><a href="{{ route('alugeis.user', Auth::user()->id) }}">Locação de Veiculos</a></li>   
                        @endif
                         @if (Auth::check()and Auth::user()->perfil != 'user')
                         <li><a href="{{ url('/clientes') }}">Clientes</a></li>  
                            <li><a href="{{ url('/veiculos') }}">Veiculos</a></li>
                            <li><a href="{{ route('alugeis.index') }}">Locação de Veiculos</a></li>   
                         @endif

                         @if (Auth::check()and Auth::user()->perfil === 'admin')
                            <li><a href="{{ url('/funcionarios') }}">Funcionarios</a></li>
                         @endif
                         

                    </ul>
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Cadastrar</a></li>
                        @else
                            <li class="dropdown">
                                <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Olá {{ Auth::user()->name }}, Clique aqui para deslogar</a>
                                
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/mask.js') }}" rel="stylesheet"></script>



</body>
</html>

<script type="text/javascript">
    $('#dataLocacao').on('change',function(e){
        var cat_id = e.target.value; 
       //ajax
         $.get("{{url('/ajax-marca1/') }}",{locacao:$(this).val(), devolucao:$("#dataDevolucao").val(), cat_id:$("#marcaoi").val()}, function(data){
           $('#idVeiculo').empty();
           $('#idVeiculo').append('<option value = "">Selecione o modelo do Veiculo</option>');
           $.each(data, function(index, subcatObj){
                $('#idVeiculo').append('<option value = "'+subcatObj.idV+'">'+subcatObj.modelo+'</option>');
               
           });
        });
    });

    $('#dataDevolucao').on('change',function(e){
        var cat_id = e.target.value; 
       //ajax
               
         $.get("{{url('/ajax-marca1/') }}",{locacao:$("#dataLocacao").val(), devolucao:$(this).val(), cat_id:$("#marcaoi").val()}, function(data){
           $('#idVeiculo').empty();
           $('#idVeiculo').append('<option value = "">Selecione o modelo do Veiculo</option>');
           $.each(data, function(index, subcatObj){
                $('#idVeiculo').append('<option value = "'+subcatObj.idV+'">'+subcatObj.modelo+'</option>');
                
           });
        });
    });

    $('#marcaoi').on('change',function(e){
        var cat_id = e.target.value; 
       //ajax
         $.get("{{url('/ajax-marca1/') }}",{locacao:$("#dataLocacao").val(), devolucao:$("#dataDevolucao").val(), cat_id:$(this).val()}, function(data){
           $('#idVeiculo').empty();
           $('#idVeiculo').append('<option value = "">Selecione o modelo do Veiculo</option>');
           $.each(data, function(index, subcatObj){
                $('#idVeiculo').append('<option value = "'+subcatObj.idV+'">'+subcatObj.modelo+'</option>');
           });
        });
    });

    $('#idVeiculo').on('change',function(e){
        var cat_id = e.target.value; 
       //ajax
        var inicio = new Date($('#dataLocacao').val());
        var fim = new Date($("#dataDevolucao").val());

        var timeDiff = Math.abs(fim.getTime() - inicio.getTime());
        var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 


         $.get("{{url('/ajax-veiculo/') }}",{cat_id:$(this).val()}, function(data){           
           $('#cor1').empty();
           $('#placa-div').empty();
           $('#ano-div').empty();
           $('#pagamento-div').empty()
           $.each(data, function(index, subcatObj){
                $('#cor1').append('<input name="cor" type="text" id="cor" class="form-control" readonly="readonly" value="'+subcatObj.cor+'" />');
                $('#placa-div').append('<input name="placa" type="text" id="placa" class="form-control" readonly="readonly" value="'+subcatObj.placa+'" />');
                $('#ano-div').append('<input name="ano" type="text" id="ano" class="form-control" readonly="readonly" value="'+subcatObj.ano+'" />');
                $('#pagamento-div').append('<input name="pagamento" type="text" id="pagamento" class="form-control" readonly="readonly" value="'+(subcatObj.valor_aluguel *diffDays )+'" />');
           });
        });
    });

    $(document).ready(function(){
            $('.cpf').mask('000.000.000-00');
            $('.telefone').mask('(00) 0000-0000');
    });

</script>