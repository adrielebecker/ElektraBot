<?php 
    function carregaUrl($url){
        if(function_exists('curl_init')){
            $cURL = curl_init($url);
            curl_setopt($cURL,CURLOPT_RETURNTRANSFER, true);
            curl_setopt($cURL,CURLOPT_FOLLOWLOCATION, true);
            $resultado = curl_exec($cURL);
            curl_close($cURL);
        } else {
            $resultado = file_get_contents($url);
        }

        if(!$resultado) {
            trigger_error("Não foi possivel carregar o endereço");
        } else{
            return $resultado;
        }
    }
    $url = "https://www.ifc-riodosul.edu.br/fabricadetecnologias/";
    echo carregaUrl($url);


    // procurar um plugin pra enviar a localizacao, vai ter q usar o js pra clicar e mandar
    
    /*if(isset($_GET['error'])){
        echo "user ou senha invalidos";
        // se for um a senha ta errada, se for 2, o user q ta (fazer)
    }*/
?>