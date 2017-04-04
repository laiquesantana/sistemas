<?php
    function format_cpf($cpf){
        return mask($cpf, '###.###.###-##');
    }

    function format_telefone($telefone){
        return mask($telefone, '(##) ####-####');
    }

    if(!function_exists('is_brazilian_format')) {
    function is_brazilian_format($data) {
        return strpos($data, '/');
     }
    }

    function convertDateField($fields, $input)
    {
        foreach($fields as $field){
            if(array_key_exists($field, $input)){
                if($this->is_brazilian_format($input[$field]) === false){
                    $date = new Carbon($input[$field]);
                }elseif($input[$field] == '00/00/0000' || $input[$field] == ''){
                    $date = null;
                }else{
                    $date = Carbon::createFromFormat('d/m/Y', $input[$field]);
                }
                $input[$field] = $date != null ? $date->format('Y-m-d') : null;
            }
        }
        return $input;
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
