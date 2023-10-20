<!DOCTYPE html>
<?php 
    $pagina = "Câmera";
    $video = 'substituicao-longa.mp4';
    session_start();
    var_dump($_SESSION);
?>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$pagina?></title>
    <?php include 'link.html'; ?>
</head>
<body>
    <?php include '../navbar/nav-eletricista.php'; ?>

    <nav class="navbar">
        <div class="col-6 ms-3">
            <button class="navbar-toggler border border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <h6 class="texto verde">Conectar Dispositivo</h6>
            </button>
        </div>
        <div class="col-2">
                <?php
                    echo "<a href='../acao/acao.php?acao=salvarGravacao&video={$video}&idEletri={$_SESSION['idEletri']}' class='btn btn-success'>Salvar Gravação</a>";
                ?>
            </div>
        <div class="offcanvas" id="navbarToggleExternalContent">
            <div class="m-5 ms-0">
                <ul class="mt-5 pb-5 border-bottom border-success">
                    <li class="nav-link">
                        <h5 class="titulo verde text-center mt-5">Conectar Dispositivo</h5>
                    </li>
                    <li class="nav-link">
                        <p class="text-center mt-5 texto">Certifique-se que o Bluetooth <br> está ligado...</p>
                    </li>
                    <li class="nav-link">
                        <div class="d-flex align-items-center mt-5">
                            <div class="spinner-border text-success" role="status"></div>
                                <strong class="ms-2">BUSCANDO DISPOSITIVOS...</strong>
                        </div>
                    </li>
                </ul>
                <ul>
                    <li class="nav-link">
                        <h5 class="titulo verde text-center mt-5">Dispositivos</h5>
                    </li>
                    <li class="text-center border border-bottom-0 border-success nav-link">
                        <p class="text-center mt-3">ELEKTRABOT - Robô</p>
                        <img src="../img/logo/logo-rob.png" alt="" width="40%">
                    </li>
                    <li class="text-center border border-top-0 border-success nav-link">
                        <button class="btn">Conectar Dispositivo</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">

        <div class="row">
            <div class="col-4">
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h3 class="titulo verde text-center"><?=$pagina?></h3>
            </div>
        </div>

        <div class="row">
            <div class="col-2"></div>
            <div class="col-6 ms-5">
                <?php
                    echo "<video width='600' controls autoplay muted>
                            <source src='../video/{$video}' type='video/mp4'>
                        </video>";
                ?>
            </div>
            <div class="col-1"></div>
            
        </div>
    </div>
</body>
</html>