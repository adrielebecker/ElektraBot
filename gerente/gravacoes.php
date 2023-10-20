<!DOCTYPE html>
<?php
    $pagina = "Gravações";
    $caminhoGravacao = '../json/gravacoes.json';
    $caminhoEletricista = '../json/eletricista.json';
    $jsonGravacao = json_decode(file_get_contents($caminhoGravacao), true);
    $jsonEletricista = json_decode(file_get_contents($caminhoEletricista), true);
    session_start();
    // var_dump($_SESSION);
?>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$pagina?></title>
    <?php include 'link.html';?>
</head>
<body>
    <?php include '../navbar/nav-gerente.php';?>
    <div class="container">
        <div class="row">
            <div class="col-3">
                <button class="navbar-toggler border border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarToggleExternalContent">
                    <h6 class="texto verde mt-1">Acesso rápido</h6>
                </button>

                <div class="offcanvas p-5 offcanvas-start text-center" id="navbarToggleExternalContent">
                    <div class="offcanvas-header ms-5">
                        <h5 class="offcanvas-title titulo verde ms-4" id="offcanvasLabel"><?=$pagina?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <?php
                            foreach($jsonEletricista as $key){
                                foreach($jsonGravacao as $value){
                                    if($key['id'] == $value['idEletri']){   
                                        echo "<div class='row'>
                                                <a href='video.php?video={$value['video']}' class='link texto fs-5 text-reset'> {$value['video']} </a>
                                                <p>De: {$key['nome']}</p>
                                            </div>";
                                    }
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h3 class="text-center titulo verde"><?=$pagina?></h3>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-3"></div>
            <div class="col-4">
                <form action="" method="post">
                    <label for="eletricista" class="form-label">Pesquise gravações por eletricistas:</label>
                    <select name="eletricista" id="eletricista" class="form-select border-success text-center" required>
                        <option value="todos">Mostrar todas as gravações</option>
                        <?php
                            foreach($jsonEletricista as $value){
                                if($value['gerente'] == $_SESSION['nomeGerente']){
                                    echo "<option value='{$value['nome']}'>{$value['nome']}</option>";
                                }
                            }
                        ?>
                    </select>
            </div>
            <div class="col-2 mt-4">
                    <input type="submit" name="pesquisa" id="pesquisa" class="btn btn-success mt-2">
                </form> 
            </div>
        </div>

        <div class="row mt-3">
            <?php
                $eletricista = isset($_POST['eletricista']) ? $_POST['eletricista'] : "";

                foreach($jsonEletricista as $key){
                    foreach($jsonGravacao as $value){
                        if($eletricista == "todos"){
                            if($key['id'] == $value['idEletri']){   
                                echo "<div class='col-2 mt-4 text-center'>
                                        <a href='video.php?video={$value['video']}' class='link texto fs-5 text-reset'><img src='../img/icones/video.png'></a>
                                        <p class='texto fs-6'><b>{$value['video']}</b><br>{$key['nome']}</p>
                                    </div>";
                            }
    
                        }
                        elseif($eletricista == $key['nome']){
                            if($key['id'] == $value['idEletri']){   
                                echo "<div class='col-2 mt-4 text-center'>
                                        <a href='video.php?video={$value['video']}' class='link texto fs-5 text-reset'><img src='../img/icones/video.png'></a>
                                        <p class='texto text-center fs-6'><b>{$value['video']}</b><br> {$key['nome']}</p>
                                    </div>";
                            }
                        }
                    }
                }
            ?>
            </div>
        </div>
    </div>
</body>
</html>