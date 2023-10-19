<!DOCTYPE html>
<?php
    $pagina = 'Vídeo';
    $video = isset($_GET['video']) ? $_GET['video'] : "";
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
    
    <div class="row">
        <div class="col-3">
            <button class="navbar-toggler border border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarToggleExternalContent">
                <h6 class="texto verde ms-5">Acesso rápido</h6>
            </button>

            <div class="offcanvas p-5 offcanvas-start text-center" id="navbarToggleExternalContent">
                <div class="offcanvas-header ms-5">
                    <h5 class="offcanvas-title titulo verde ms-4" id="offcanvasLabel">Gravações</h5>
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
        <div class="col-1"></div>
        <div class="col-8">
            <h3 class="titulo verde mt-3 ms-2"><?=$video?></h3>
        </div>
    </div>

    <div class="row">
            <div class="col-3"></div>
            <div class="col-6 ms-5">
                <?php
                    echo "<video width='600' controls autoplay muted>
                            <source src='../video/{$video}' type='video/mp4'>
                        </video>";
                ?>
            </div>
            <div class="col-1"></div>
        </div>

</body>
</html>