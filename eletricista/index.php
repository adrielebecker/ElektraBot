<!DOCTYPE html>
<?php
    session_start();
    var_dump($_SESSION);
    $pagina = "Bem Vindo, ".$_SESSION['nomeEletri']."!";
?>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <?php include "link.html";?>
</head>
<body>
    <?php include "../navbar/nav-eletricista.php";?>
    <div class="container">
        <div class="row mt-5">
            <div class="col-3"></div>
            <div class="col-6">
                <img src="../img/logo/logo-grande.png" alt="" width="100%">
            </div>
        </div>
        
        <div class="row mt-5">
            <div class="col-3">
                <a href="camera.php" class="link">
                    <div class="card secundario border-success rounded-4">
                        <img src="../img/icones/camera.png" alt="camera" width="50%" class="rounded mx-auto d-block">
                        <div class="card-body">
                            <h5 class="titulo branco text-center">CÂMERA</h5>
                            <p class="texto branco text-center sobre-tam mt-3">
                                Esta funcionalidade permite que o eletricista visualize a câmera implantada no robô, em tempo real.
                            </p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-3">
                <a href="gravacoes.php" class="link">
                    <div class="card secundario border-success rounded-4">
                        <img src="../img/icones/gravacoes.png" alt="gravações" width="50%" class="rounded mx-auto d-block">
                        <div class="card-body">
                            <h5 class="titulo branco text-center">GRAVAÇÕES</h5>
                            <p class="texto branco text-center sobre-tam mt-3">
                                Aqui são armazenados todos os procedimentos. <br> As gravações podem ser visualizadas pelo eletricista.
                            </p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-3">
                <a href="" class="link">
                    <div class="card secundario border-success rounded-4">
                        <img src="../img/icones/relatorio.png" alt="Relatórios" width="40%" class="rounded mx-auto d-block mt-3">
                        <div class="card-body">
                            <h5 class="titulo branco text-center mt-2">RELATÓRIOS</h5>
                            <p class="texto branco text-center sobre-tam mt-3">
                                O eletricista pode criar relatórios sobre os procedimentos e adicionar algumas informações chave.
                            </p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-3">
                <a href="" class="link">
                    <div class="card secundario border-success rounded-4">
                        <img src="../img/icones/notificacoes.png" alt="notificações" width="40%" class="rounded mx-auto d-block mt-3">
                        <div class="card-body">
                            <h5 class="titulo branco text-center mt-2">NOTIFICAÇÕES</h5>
                            <p class="texto branco text-center sobre-tam mt-3">
                                A cada nova substituição designada, o eletricista é notificado e pode visualizar mais informações sobre.
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <br><br><br><br>

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-3">
                        <img src="../img/logo/logo-nav.png" alt="">
                    </div>
                    <div class="col-2"></div>
                    <div class="col-3">
                        <img src="../img/logo/logoIf.png" alt="" width="100%">
                    </div>
                </div>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-9">
                        <p class="copyright">Copyright ©2023 Todos os direitos reservados a ElektraBot 
                            | Institituto Federal Catarinenese - Campus Rio do Sul 
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>