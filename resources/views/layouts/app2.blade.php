<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>XPTZ-RENT A CAR</title>

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
    
</body>
</html>

<script type="text/javascript">
    $('#marcaoi').on('change',function(e){
        var cat_id = e.target.value; 
       //ajax
         $.get("{{url('/ajax-marca1/') }}",{cat_id:$(this).val()}, function(data){
                     //  console.log(data);
           $('#modelo').empty();
           $.each(data, function(index, subcatObj){
                //console.log(subcatObj);
                $('#modelo').append('<option value = "'+subcatObj.id+'">'+subcatObj.modelo+'</option>');

           });

        });

    });

</script>