<?php 
    function format_cpf($cpf){
        return mask($cpf, '###.###.###-##');
    }

    function format_telefone($telefone){
        return mask($telefone, '(##) ####-####');
    }

    function mask($val, $mask)
    {
        $maskared = '';
        $k = 0;
        for($i = 0; $i<=strlen($mask)-1; $i++){
            if($mask[$i] == '#'){
                if(isset($val[$k]))
                    $maskared .= $val[$k++];
            }else{
                if(isset($mask[$i]))
                    $maskared .= $mask[$i];
            }
        }
        return $maskared;
    }

 ?>