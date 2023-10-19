<!DOCTYPE html>
<?php
    $pagina = "Gravações";
    $caminho = '../json/gravacao.json';
    $json = json_decode(file_get_contents($caminho), true);
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
                            foreach($json as $value){
                                echo "<div class='row'>
                                        <a href='video.php?video={$value['video']}' class='link texto fs-5 text-reset'> {$value['video']} </a>
                                    </div>";
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

        <div class="row">
        <?php
            foreach($json as $value){
                echo "<div class='col-2 mt-4'>
                            <a href='video.php?video={$value['video']}' class='link texto fs-5 text-reset'><img src='../img/icones/video.png'></a>
                            <p class='texto fs-5'>{$value['video']}</p>
                        </div>";
            }
        ?>
        </div>
        
    </div>
</body>
</html>