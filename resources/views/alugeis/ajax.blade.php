<select class="form-control input-sm" name="marca" id="marca">
	<option value="">Escolha o Modelo do Veiculo</option>
   		@foreach($Veiculos as $veiculo)
        	<option value="{{$veiculo->id}}">{{$veiculo->modelo}}</option>
   		@endforeach
    </select>