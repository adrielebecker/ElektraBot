<!DOCTYPE html>
<?php
    $pagina = "Visualizar Substituição";
    $hoje = date("Y/m/d");
    $nomeSubstituicao = isset($_GET['nomeSubstituicao']) ? $_GET['nomeSubstituicao'] : "";
    $id = isset($_GET['id']) ? $_GET['id'] : "";
    $caminhoEletricista = '../json/eletricista.json';
    $caminhoSubstituicao = '../json/substituicao.json';
    $jsonEletricista = json_decode(file_get_contents($caminhoEletricista), true);
    $jsonSubstituicao = json_decode(file_get_contents($caminhoSubstituicao), true);
    session_start();
    var_dump($_SESSION);
    // var_dump($jsonSubstituicao);
?>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$pagina?></title>
    <script src="../js/acao.js"></script>
    <?php include 'link.html';?>
</head>
<body>
    <?php include '../navbar/nav-gerente.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col-3 mt-3">
                <button class="navbar-toggler border border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarToggleExternalContent">
                    <h6 class="texto verde mt-1">Acesso rápido</h6>
                </button>

                <div class="offcanvas p-5 offcanvas-start text-center" id="navbarToggleExternalContent">
                    <div class="offcanvas-header">
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                    <h5 class="texto text-dark pt-4">DESIGNADAS</h5>
                    <?php
                        foreach($jsonSubstituicao as $value){
                            if($_SESSION['nomeGerente'] == $value['gerente']){   
                                if($value['concluida'] == NULL && $hoje < $value['dataSubstituicao']){
                                    echo "<div class='row mt-2'>
                                            <a href='visualizar-notificacao.php?nomeSubstituicao={$value['nome']}&id={$value['id']}' class='text-reset link'>".ucwords($value['nome'])."</a>
                                        </div>";
                                }
                            }
                        }
                    ?>

                    <h5 class="texto text-danger pt-4">PENDENTES</h5>
                    <?php
                        foreach($jsonSubstituicao as $value){
                            if($_SESSION['nomeGerente'] == $value['gerente']){   
                                if($hoje > $value['dataSubstituicao']){
                                    if($value['concluida'] == NULL){
                                        echo "<div class='row mt-2'>
                                                <a href='visualizar-notificacao.php?nomeSubstituicao={$value['nome']}&id={$value['id']}' class='text-reset link'>".ucwords($value['nome'])."</a>
                                            </div>";
                                    }
                                }
                            }
                        }
                    ?>

                    <h5 class="texto verde pt-4">CONCLUÍDAS</h5>
                    <?php
                        foreach($jsonSubstituicao as $value){
                            if($_SESSION['nomeGerente'] == $value['gerente']){   
                                if($value['concluida'] != NULL){
                                    echo "<div class='row mt-2'>
                                            <a href='visualizar-notificacao.php?nomeSubstituicao={$value['nome']}&id={$value['id']}' class='text-reset link'>".ucwords($value['nome'])."</a>
                                        </div>";
                                }
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="row">
            <h3 class="titulo verde text-center"><?=$nomeSubstituicao?></h3>
        </div>

        <div class="row">
            <div class="col-6 mt-3">
                <form action="../acao/acao.php" method="post">
                    <input type="hidden" name="id" id="id" value="<?=$id?>">
                <div class="row mt-5">
                    <div class="col-5">
                        <div class="row bg-success rounded">
                            <p class="texto branco text-center mt-3">Nome da Substituição:</p>
                            <input type="text" name="nome" id="nome" value="<?=ucwords($nomeSubstituicao)?>" class="form-control text-center border-success" readonly>
                        </div>
                    </div>
                    <div class="col-2"></div>
                    <div class="col-5">
                        <div class="row bg-success rounded">
                            <p class="texto branco text-center mt-3">Gerente Responsavél:</p>
                            <?php
                                foreach($jsonSubstituicao as $value){
                                    if($_SESSION['nomeGerente'] == $value['gerente']){
                                        if($id == $value['id']){
                                            echo "<input type='text' name='gerente' id='gerente' value='".ucwords($value['gerente'])."' class='form-control text-center border-success' readonly>";
                                        }
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
                    <div class="row mt-4">
                        <div class="col-5 mt-4">
                            <div class="row bg-success rounded">
                                <p class="texto branco text-center mt-3">Data da Substituição:</p>
                                <?php
                                    foreach($jsonSubstituicao as $value){
                                        if($id == $value['id']){
                                            echo "<input type='text' name='dataSubstituicao' id='dataSubstituicao' value='".date("d/m/Y", strtotime($value['dataSubstituicao']))."' class='form-control text-center border-success' readonly>";
                                        }
                                    }
                                ?>    
                           
                            </div>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-5 mt-4">
                            <div class="row bg-success rounded">
                                <p class="texto text-center branco mt-3">Eletricista no projeto:</p>
                                <?php
                                    foreach($jsonSubstituicao as $value){
                                        if($_SESSION['nomeGerente'] == $value['gerente'] && $id == $value['id']){
                                            echo "<input type='text' name='eletricista' id='eletricista' value='".ucwords($value['eletricista'])."' class='form-control text-center border-success' readonly>";
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <?php
                            foreach($jsonSubstituicao as $value){
                                if($id == $value['id']){
                                    if($value['concluida'] != "sim"){
                                        echo "<div class='col-4 mt-2'> 
                                                <a href='notificacoes.php' class='link text-reset'> < Voltar</a>
                                            </div>
                                            <div class='col-6'> 
                                                <button type='submit' class='btn btn-success' name='acao' id='acao' value='concluir'>Concluir substituição</button>
                                            </div>";
                                    }
                                    elseif($value['concluida'] == "sim"){
                                        echo "<div class='col-4'> 
                                                <a href='notificacoes.php' class='link text-reset'> < Voltar</a>
                                            </div>
                                            <div class='col-6'> 
                                                Substituição concluída!
                                            </div>";
                                    }
                                }
                            }
                        ?>
                    </div>
                </form>
            </div>
            <div class="col-6 mt-4">
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-10">
                        <h6 class="texto verde text-center ms-5">LOCALIZAÇÃO</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-10 mt-3">
                    <?php
                        foreach($jsonSubstituicao as $value){
                            if($id == $value['id']){
                                echo "<iframe class='border border-success rounded-3' src='".$value['localizacao']."' width='400' height='300' loading='lazy' referrerpolicy='no-referrer-when-downgrade'></iframe>";
                            }
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>