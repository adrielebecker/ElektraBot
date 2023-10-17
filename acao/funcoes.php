<?php
    function nome($pagina){
        echo $pagina;
    }

    function formataCpf($cpf){
        $cpf= substr($cpf,0,-8).".".substr($cpf, 3, -5).".".substr($cpf, -5, -2)."-".substr($cpf,-2);
        return $cpf;
    }

    function formataTelefone($number){
        $number="(".substr($number,0,2).") ".substr($number,2,-4)." - ".substr($number,-4);
        return $number;
    }

    function formataCep($cep){
        $cep= substr($cep,0,-4)." - ".substr($cep,-4);
        return $cep;
    }
    
?>