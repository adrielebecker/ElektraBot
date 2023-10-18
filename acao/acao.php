<?php
    // include 'funcoes.php';
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
    
    echo $acao;

    switch($acao){
        case 'continuar':
            cargo();
            break;

        case 'salvarGerente':
            salvarGerente($caminhoGerente, $jsonGerente);
            break;

        case 'salvarEletricista':
            salvarEletricista($caminhoEletricista, $jsonEletricista);
            break;

        case 'entrar':
            login($caminhoEletricista, $caminhoGerente, $jsonEletricista, $jsonGerente);
            break;
            
        case 'logoff':
            logoff();
            break;
        case 'alterarGerente':
            alterarGerente($caminhoGerente, $jsonGerente);
            break;
        case 'alterarEletricista':
            alterarEletricista($caminhoEletricista, $jsonEletricista);
            break;
    }

/************************************ Outras funções ************************************************/
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

    function cargo(){
        $cargo = isset($_POST['cargo']) ? $_POST['cargo'] : "";
        if($cargo == 'eletricista'){
            header('Location: ../eletricista/cadastro-eletricista.php');
        }
        else{
            header('Location: ../gerente/cadastro-gerente.php');
        }
    }
    /************************************ Buscar ID ************************************************/
    function busca($id, $caminho){
        $json = json_decode(file_get_contents($caminho));

        foreach($json as $value){
            if($value->id == $id){
                return(array)$value;
            }
        }
    }

    /************************************ Gerente ************************************************/
/************************************ salvar Gerente ************************************************/
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
        $user = isset($_POST['user']) ? $_POST['user'] : "";
        $matricula = isset($_POST['matricula']) ? $_POST['matricula'] : "";
        $senha = isset($_POST['senha']) ? $_POST['senha'] : "";

        $dados = ['id' => $id,
                'cargo' => 'Gerente',
                'nome' => ucwords($nome),
                'dataNasc' => date("d/m/Y", strtotime($dataNasc)),
                'sexo' => $sexo,
                'cpf' => formataCpf($cpf),
                'celular' => formataTelefone($celular),
                'email' => $email,
                'cep' => formataCep($cep),
                'estado' => $estado,
                'cidade' => ucwords($cidade),
                'bairro' => ucwords($bairro),
                'rua' => ucwords($rua),
                'complemento' => ucwords($complemento),
                'numero' => $numero,
                'user' => $user,
                'matricula' => $matricula,
                'senha' => $senha,
                'foto' => '../dowloads/documento.png'];

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
                alert('Cadastro efetuado com sucesso!')
                location.href = '../login.php';
            </script>";
    }

/************************************ alterar gerente ************************************************/
    function alterarGerente($caminhoGerente, $jsonGerente){
        $jsonGerente = json_decode(file_get_contents($caminhoGerente), true);
        foreach($jsonGerente as $key => $value){
            if($value['id'] == $_POST['id']){
                $jsonGerente[$key] = ['id' => $_POST['id'],
                        'cargo' => 'Gerente',
                        'nome' => ucwords($_POST['nome']),
                        'dataNasc' => date("d/m/Y", strtotime($_POST['dataNasc'])),
                        'sexo' => $_POST['sexo'],
                        'cpf' => $_POST['cpf'],
                        'celular' => $_POST['celular'],
                        'email' => $_POST['email'],
                        'cep' => $_POST['cep'],
                        'estado' => $_POST['estado'],
                        'cidade' => ucwords($_POST['cidade']),
                        'bairro' => ucwords($_POST['bairro']),
                        'rua' => ucwords($_POST['rua']),
                        'complemento' => ucwords($_POST['complemento']),
                        'numero' => $_POST['numero'],
                        'user' => $_POST['user'],
                        'matricula' => $_POST['matricula'],
                        'senha' => $_POST['senha']];
            }
            
            $dados_json = json_encode($jsonGerente);
            $fp = fopen($caminhoGerente, "w");
            fwrite($fp, $dados_json);
            fclose($fp);
        }
    }

    /************************************ Eletricista ************************************************/
/************************************ salvar eletricista ************************************************/
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
        $user = isset($_POST['user']) ? $_POST['user'] : "";
        $matricula = isset($_POST['matricula']) ? $_POST['matricula'] : "";
        $gerente = isset($_POST['gerente']) ? $_POST['gerente'] : "";
        $senha = isset($_POST['senha']) ? $_POST['senha'] : "";

        $dados = ['id' => $id,
                'cargo' => 'Eletricista',
                'nome' => ucwords($nome),
                'dataNasc' => date("d/m/Y", strtotime($dataNasc)),
                'sexo' => $sexo,
                'cpf' => $cpf,
                'celular' => $celular,
                'email' => $email,
                'cep' => $cep,
                'estado' => $estado,
                'cidade' => ucwords($cidade),
                'bairro' => ucwords($bairro),
                'rua' => ucwords($rua),
                'complemento' => ucwords($complemento),
                'numero' => $numero,
                'gerente' => $gerente,
                'user' => $user,
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
                alert('Cadastro efetuado com sucesso!')
                location.href = '../login.php';
            </script>";
    }

/************************************ alterar eletricista ************************************************/
function alterarEletricista($caminhoEletricista, $jsonEletricista){
    $jsonEletricista = json_decode(file_get_contents($caminhoEletricista), true);
    foreach($jsonEletricista as $key => $value){
        if($value['id'] == $_POST['id']){
            $jsonEletricista[$key] = ['id' => $_POST['id'],
                    'cargo' => 'Eletricista',
                    'nome' => ucwords($_POST['nome']),
                    'dataNasc' => date("d/m/Y", strtotime($_POST['dataNasc'])),
                    'sexo' => $_POST['sexo'],
                    'cpf' => $_POST['cpf'],
                    'celular' => $_POST['celular'],
                    'email' => $_POST['email'],
                    'cep' => $_POST['cep'],
                    'estado' => $_POST['estado'],
                    'cidade' => ucwords($_POST['cidade']),
                    'bairro' => ucwords($_POST['bairro']),
                    'rua' => ucwords($_POST['rua']),
                    'complemento' => ucwords($_POST['complemento']),
                    'numero' => $_POST['numero'],
                    'gerente' => $_POST['gerente'],
                    'user' => $_POST['user'],
                    'matricula' => $_POST['matricula'],
                    'senha' => $_POST['senha']];
        }
        
        $dados_json = json_encode($jsonEletricista);
        $fp = fopen($caminhoEletricista, "w");
        fwrite($fp, $dados_json);
        fclose($fp);
    }
}
/************************************ Login ************************************************/
    function login($caminhoEletricista, $caminhoGerente, $jsonEletricista, $jsonGerente){
        $cargo = isset($_POST['cargo']) ? $_POST['cargo'] : "";
        $user = isset($_POST['user']) ? $_POST['user'] : "";
        $senha = isset($_POST['senha']) ? $_POST['senha'] : "";

        if($cargo == "Gerente"){
            $jsonG = json_decode(file_get_contents($caminhoGerente), true);
            foreach($jsonG as $value){
                if(strtolower($value['user']) == strtolower($user) && $value['senha'] == $senha){
                    session_start();
                    $_SESSION['nomeGerente'] = $value['nome'];
                    $_SESSION['idGerente'] = $value['id'];
                    header('Location: ../gerente/index.php');
                } 
                else{
                    echo "Nome ou senha incorretos!";
                    echo $value['nome'];
                }
            }
        }

        if($cargo == "Eletricista"){
            $jsonE = json_decode(file_get_contents($caminhoEletricista), true);
            foreach($jsonE as $value){
                if(strtolower($value['user']) == strtolower($user) && $value['senha'] == $senha){
                    session_start();
                    $_SESSION['nomeEletri'] = $value['nome'];
                    $_SESSION['idEletri'] = $value['id'];
                    header('Location: ../eletricista/index.php');
                } 
                else{
                    echo "Nome ou senha incorretos!";
                    echo $value['nome'];
                }
            }
        }
    }

/************************************ Login ************************************************/
    function logoff(){
        session_start();
        session_destroy();
        header('Location: ../index.php');  
    }
?>