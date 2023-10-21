<!DOCTYPE html>
<?php
    $pagina = "Gravações";
    $caminhoGravacao = '../json/gravacoes.json';
    $jsonGravacao = json_decode(file_get_contents($caminhoGravacao), true);
    // var_dump($jsonGravacao);
    session_start();
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
                            foreach($jsonGravacao as $value){
                                if($_SESSION['idEletri'] == $value['idEletri']){   
                                    echo "<div class='row'>
                                            <a href='video.php?video={$value['video']}' class='link texto fs-5 text-reset'> {$value['video']} </a>
                                        </div>";
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <?php
                if($jsonGravacao == NULL){
                    echo "<h4 class='text-center titulo mt-5'>Ainda não há gravações!</h4>
                    <div class='col-4'></div>
                    <div class='col-4 ms-4 mt-4 bg-image'>
                        <img src='../img/icones/video.png' width='60%' class='img-gravacao ms-5'>
                    </div>";
                }
                else{
                    foreach($jsonGravacao as $value){
                        if($_SESSION['idEletri'] == $value['idEletri']){   
                            echo "<div class='col-2 mt-4 text-center'>
                                    <a href='video.php?video={$value['video']}' class='link texto fs-5 text-reset'><img src='../img/icones/video.png'></a>
                                    <p class='texto fs-6'>{$value['video']}</p>
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