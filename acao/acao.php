<?php
    $caminhoGerente = '../json/gerente.json';
    $caminhoEletricista = '../json/eletricista.json';
    $caminhoGravacoes = '../json/gravacoes.json';
    $caminhoSubstituicao = '../json/substituicao.json';
    $jsonGerente = json_decode(file_get_contents($caminhoGerente), true);
    $jsonEletricista = json_decode(file_get_contents($caminhoEletricista), true);
    $jsonGravacoes = json_decode(file_get_contents($caminhoGravacoes), true);
    $jsonSubstituicao = json_decode(file_get_contents($caminhoSubstituicao), true);

    switch($_SERVER['REQUEST_METHOD']){
        case 'POST': 
            $acao = isset($_POST['acao']) ? $_POST['acao'] : "";
            break;
        case 'GET':
            $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
            break;
    }
    
    echo $acao;
    var_dump($_POST);
    var_dump($_GET);


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
        case 'salvarGravacao':
            salvarGravacao($caminhoGravacoes, $jsonGravacoes);
            break;
        case 'salvarSubstituicao':
            salvarSubstituicao($caminhoSubstituicao, $jsonSubstituicao);
            break;
        case 'concluir':
            concluirSubstituicao($caminhoSubstituicao, $jsonSubstituicao);
            break;
    }

/************************************ Outras funções ************************************************/
    function formataCpf($cpf){
        $cpf= substr($cpf,0,-8).".".substr($cpf, 3, -5).".".substr($cpf, -5, -2)."-".substr($cpf,-2);
        return $cpf;
    }

    function formataTelefone($number){
        $number="(".substr($number,0,2).") ".substr($number,2,-4)."-".substr($number,-4);
        return $number;
    }

    function formataCep($cep){
        $cep= substr($cep,0,-4)."-".substr($cep,-4);
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
                    $_SESSION['sexoGerente'] = $value['sexo'];
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
                    $_SESSION['sexoEletri'] = $value['sexo'];
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

/************************************ Salvar Gravação ************************************************/
    function salvarGravacao($caminhoGravacoes, $jsonGravacoes){
        $video = isset($_GET['video']) ? $_GET['video'] : "";
        $idEletri = isset($_GET['idEletri']) ? $_GET['idEletri'] : "";

        $dados = ['video' => $video, 
                    'idEletri' => $idEletri];

        if($jsonGravacoes != NULL){
            array_push($jsonGravacoes, $dados);
        }
        else{
            $jsonGravacoes = array();
            array_push($jsonGravacoes, $dados);
        }

        $dados_json = json_encode($jsonGravacoes);
        $fp = fopen($caminhoGravacoes, "w");
        fwrite($fp, $dados_json);
        fclose($fp);
        
        var_dump($_GET);
        var_dump($jsonGravacoes);
        header('Location: ../eletricista/gravacoes.php');
    }

/************************************ Salvar Substituição ************************************************/
    function salvarSubstituicao($caminhoSubstituicao, $jsonSubstituicao){
        $id = date("YmdHis");
        $eletricista = isset($_POST['eletricista']) ? $_POST['eletricista'] : "";
        $gerente = isset($_POST['gerente']) ? $_POST['gerente'] : "";
        $dataSubstituicao = isset($_POST['dataSubstituicao']) ? $_POST['dataSubstituicao'] : "";
        $nome = isset($_POST['nome']) ? $_POST['nome'] : "";
        $localizacao = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3548.2225635105933!2d-49.642396925310535!3d-27.212161305780715!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94dfb9a5881e0679%3A0x7ad28c5276b53a06!2sInstituto%20Federal%20Catarinense%20-%20Campus%20Rio%20do%20Sul!5e0!3m2!1spt-BR!2sbr!4v1697839297324!5m2!1spt-BR!2sbr";
        
        $dados = ['id' => $id,
                    'eletricista' => $eletricista,
                    'gerente' => $gerente,
                    'dataSubstituicao' => $dataSubstituicao,
                    'nome' => $nome,
                    'concluida' => NULL,
                    'localizacao' => $localizacao];
        
        if($jsonSubstituicao != NULL){
            array_push($jsonSubstituicao, $dados);
        }
        else{
            $jsonSubstituicao = array();
            array_push($jsonSubstituicao, $dados);
        }

        $dados_json = json_encode($jsonSubstituicao);
        $fp = fopen($caminhoSubstituicao, "w");
        fwrite($fp, $dados_json);
        fclose($fp);
        header('Location: ../gerente/notificacoes.php');
    }

/************************************ Concluir Substituição ************************************************/
    function concluirSubstituicao($caminhoSubstituicao, $jsonSubstituicao){
        foreach($jsonSubstituicao as $key => $value){
            if($value['id'] == $_POST['id']){
                $jsonSubstituicao[$key] = ['id' => $_POST['id'],
                        'eletricista' => $value['eletricista'],
                        'gerente' => $value['gerente'],
                        'dataSubstituicao' => $value['dataSubstituicao'],
                        'nome' => $value['nome'],
                        'concluida' => "sim",
                        'localizacao' => $value['localizacao']];
            }
        }

        $dados_json = json_encode($jsonSubstituicao);
        $fp = fopen($caminhoSubstituicao, "w");
        fwrite($fp, $dados_json);
        fclose($fp);

        header('Location: ../gerente/notificacoes.php');
    }
?>