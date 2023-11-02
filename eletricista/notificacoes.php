<!DOCTYPE html>
<?php
    session_start();
    var_dump($_SESSION);
    $pagina = "Notificações";
    $hoje = date("Y/m/d");
    $busca = $_POST['busca'] ? $_POST['busca'] : "";
    $caminhoEletricista = '../json/eletricista.json';
    $caminhoSubstituicao = '../json/substituicao.json';
    $jsonEletricista = json_decode(file_get_contents($caminhoEletricista), true);
    $jsonSubstituicao = json_decode(file_get_contents($caminhoSubstituicao), true);
?>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$pagina?></title>
    <?php include 'link.html';?>
</head>
<body>
    <?php include '../navbar/nav-eletricista.php';?>
    <div class="container-fluid">
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
                            if($_SESSION['nomeEletri'] == $value['eletricista']){   
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
                            if($_SESSION['nomeEletri'] == $value['eletricista']){   
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
                            if($_SESSION['nomeEletri'] == $value['eletricista']){   
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
            <div class="col-12 mt-1">
                <h5 class="text-center titulo verde">Mostrar:</h5>
            </div>
        </div>

        <div class="row mt-3 text-center">
            <div class="col-3"></div>
            <div class="col-4">
                <form action="" method="post">
                    <select name="busca" id="busca" class="form-select border-success text-center" required>
                        <option value="todas" <?php if($busca == "todas") echo "selected";?>>Todas</option>
                        <option value="designadas" <?php if($busca == "designadas") echo "selected";?>>Designadas</option>
                        <option value="concluidas" <?php if($busca == "concluidas") echo "selected";?>>Concluídas</option>
                        <option value="pendentes" <?php if($busca == "pendentes") echo "selected";?>>Pendentes</option>
                    </select>
            </div>
            <div class="col-2">
                    <input type="submit" name="pesquisa" id="pesquisa" class="btn btn-success">
                </form> 
            </div>
        </div>
            
        <div class="col-1"></div>
        <div class="col-11">
            <div class="row mt-4">
                <?php
                    if($busca == "designadas"){
                        foreach($jsonSubstituicao as $value){
                            if($_SESSION['nomeEletri'] == $value['eletricista']){   
                                if($value['concluida'] == NULL && $hoje < $value['dataSubstituicao']){
                                    echo "<div class='col-2 mt-2 text-center'>
                                            <a href='visualizar-notificacao.php?nomeSubstituicao={$value['nome']}&id={$value['id']}' class='text-reset link'>".ucwords($value['nome'])."</a>
                                        </div>";
                                }
                            }
                        }
                    }
        
                    elseif($busca == "pendentes"){
                        foreach($jsonSubstituicao as $value){
                            if($_SESSION['nomeEletri'] == $value['eletricista']){   
                                if($hoje > $value['dataSubstituicao']){
                                    if($value['concluida'] == NULL){
                                        echo "<div class='col-2 mt-2 text-center'>
                                                <a href='visualizar-notificacao.php?nomeSubstituicao={$value['nome']}&id={$value['id']}' class='text-reset link'>".ucwords($value['nome'])."</a>
                                            </div>";
                                    }
                                }
                            }
                        }
                    }

                    elseif($busca == "concluidas"){
                        foreach($jsonSubstituicao as $value){
                            if($_SESSION['nomeEletri'] == $value['eletricista']){   
                                if($value['concluida'] != NULL){
                                    echo "<div class='col-2 mt-2 text-center'>
                                            <a href='visualizar-notificacao.php?nomeSubstituicao={$value['nome']}&id={$value['id']}' class='text-reset link'>".ucwords($value['nome'])."</a>
                                        </div>";
                                }
                            }
                        }
                    }

                    else{
                        foreach($jsonSubstituicao as $value){
                            if($_SESSION['nomeEletri'] == $value['eletricista']){   
                                echo "<div class='col-2 mt-2 text-center'>
                                        <a href='visualizar-notificacao.php?nomeSubstituicao={$value['nome']}&id={$value['id']}' class='text-reset link'>".ucwords($value['nome'])."</a>
                                    </div>";
                            }
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>