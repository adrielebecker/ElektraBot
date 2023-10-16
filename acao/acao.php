<?php
    var_dump($_POST);
    $caminhoGerente = '../json/gerente.json';
    $caminhoEletricista = '../json/eletricista.json';
    $jsonGerente = json_decode(file_get_contents($caminhoGerente), true);
    $jsonEletricista = json_decode(file_get_contents($caminhoEletricista), true);

    switch($_SERVER['REQUEST_METHOD']){
        case 'POST': 
            $acao = isset($_POST['acao']) ? $_POST['acao'] : "";
            break;
        case 'GET':
            $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
            break;
    }
    
    switch($acao){
        case 'continuar':
            cargo();
        case 'salvarGerente':
            salvarGerente($caminhoGerente, $jsonGerente);
        case 'salvarEletricista':
            salvarEletricista($caminhoEletricista, $jsonEletricista);
    }

    function cargo(){
        $cargo = isset($_POST['cargo']) ? $_POST['cargo'] : "";
        if($cargo == 'eletricista'){
            header('Location: ../eletricista/cadastro-eletricista.php');
        }
        else{
            header('Location: ../gerente/cadastro-gerente.php');
        }
    }

    /******************************************* Gerente *****************************************************/
    function salvarGerente($caminhoGerente, $jsonGerente){
        $id = date("YmdHis");
        $nome = isset($_POST['nome']) ? $_POST['nome'] : "";
        $dataNasc = isset($_POST['dataNasc']) ? $_POST['dataNasc'] : "";
        $sexo = isset($_POST['sexo']) ? $_POST['sexo'] : "";
        $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : "";
        $celular = isset($_POST['celular']) ? $_POST['celular'] : "";
        $email = isset($_POST['email']) ? $_POST['email'] : "";
        $cep = isset($_POST['cep']) ? $_POST['cep'] : "";
        $estado = isset($_POST['estado']) ? $_POST['estado'] : "";
        $cidade = isset($_POST['cidade']) ? $_POST['cidade'] : "";
        $bairro = isset($_POST['bairro']) ? $_POST['bairro'] : "";
        $rua = isset($_POST['rua']) ? $_POST['rua'] : "";
        $complemento = isset($_POST['complemento']) ? $_POST['complemento'] : "";
        $numero = isset($_POST['numero']) ? $_POST['numero'] : 0;
        $matricula = isset($_POST['matricula']) ? $_POST['matricula'] : "";
        $senha = isset($_POST['senha']) ? $_POST['senha'] : "";

        $dados = ['id' => $id,
                'cargo' => 'gerente',
                'nome' => ucwords($nome),
                'dataNasc' => date("d/m/Y", strtotime($dataNasc)),
                'sexo' => $sexo,
                'cpf' => $cpf,
                'celular' => $celular,
                'email' => $email,
                'cep' => $cep,
                'estdado' => $estado,
                'cidade' => ucwords($cidade),
                'bairro' => ucwords($bairro),
                'rua' => ucwords($rua),
                'complemento' => ucwords($complemento),
                'numero' => $numero,
                'matricula' => $matricula,
                'senha' => $senha];

        if($jsonGerente != NULL){
            array_push($jsonGerente, $dados);
        } else{
            $jsonGerente = array();
            array_push($jsonGerente, $dados);
        }

        $dados_json = json_encode($jsonGerente);
        $fp = fopen($caminhoGerente, "w");
        fwrite($fp, $dados_json);
        fclose($fp);

        echo "<script> 
                alert('Cadastro efetuado com sucesso!'); 
                location.href = '../login.php';
            </script>";
    }

/************************************ Eletricista ************************************************/
    function salvarEletricista($caminhoEletricista, $jsonEletricista){
        $id = date("YmdHis");
        $nome = isset($_POST['nome']) ? $_POST['nome'] : "";
        $dataNasc = isset($_POST['dataNasc']) ? $_POST['dataNasc'] : "";
        $sexo = isset($_POST['sexo']) ? $_POST['sexo'] : "";
        $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : "";
        $celular = isset($_POST['celular']) ? $_POST['celular'] : "";
        $email = isset($_POST['email']) ? $_POST['email'] : "";
        $cep = isset($_POST['cep']) ? $_POST['cep'] : "";
        $estado = isset($_POST['estado']) ? $_POST['estado'] : "";
        $cidade = isset($_POST['cidade']) ? $_POST['cidade'] : "";
        $bairro = isset($_POST['bairro']) ? $_POST['bairro'] : "";
        $rua = isset($_POST['rua']) ? $_POST['rua'] : "";
        $complemento = isset($_POST['complemento']) ? $_POST['complemento'] : "";
        $numero = isset($_POST['numero']) ? $_POST['numero'] : "";
        $matricula = isset($_POST['matricula']) ? $_POST['matricula'] : "";
        $gerente = isset($_POST['gerente']) ? $_POST['gerente'] : "";
        $senha = isset($_POST['senha']) ? $_POST['senha'] : "";

        $dados = ['id' => $id,
                'cargo' => 'eletricista',
                'nome' => ucwords($nome),
                'dataNasc' => date("d/m/Y", strtotime($dataNasc)),
                'sexo' => $sexo,
                'cpf' => $cpf,
                'celular' => $celular,
                'email' => $email,
                'cep' => $cep,
                'estdado' => $estado,
                'cidade' => ucwords($cidade),
                'bairro' => ucwords($bairro),
                'rua' => ucwords($rua),
                'complemento' => ucwords($complemento),
                'numero' => $numero,
                'matricula' => $matricula,
                'senha' => $senha];

        if($jsonEletricista != NULL){
            array_push($jsonEletricista, $dados);
        } else{
            $jsonEletricista = array();
            array_push($jsonEletricista, $dados);
        }

        $dados_json = json_encode($jsonEletricista);
        $fp = fopen($caminhoEletricista, "w");
        fwrite($fp, $dados_json);
        fclose($fp);

        echo "<script> 
                alert('Cadastro efetuado com sucesso!'); 
                location.href = '../login.php';
            </script>";
    }
?>