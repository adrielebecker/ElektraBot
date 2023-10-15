<!DOCTYPE html>
<?php
    $nome = "Fulano";
    $pagina = "Bem Vindo, ".$nome."!";
?>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <?php include "../navbar/nav-gerente.php";?>
    <div class="container">
        <div class="row mt-5">
            <div class="col-3"></div>
            <div class="col-6">
                <img src="../img/logo/logo-grande.png" alt="" width="100%">
            </div>
        </div>
        
        <div class="row mt-5">
            <div class="col-3">
                <a href="" class="link">
                    <div class="card secundario border-success rounded-4">
                        <img src="../img/icones/designar.png" alt="designar" width="40%" class="rounded mx-auto d-block mt-3">
                        <div class="card-body">
                            <h5 class="titulo branco text-center">Designar Substituição</h5>
                            <p class="texto branco text-center sobre-tam mt-3 mb-2">
                                O gerente pode designar um ou mais eletricistas a uma substituição e adicionar mais 
                                informações sobre a mesma.
                            </p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-3">
                <a href="" class="link">
                    <div class="card secundario border-success rounded-4">
                        <img src="../img/icones/gravacoes.png" alt="gravações" width="50%" class="rounded mx-auto d-block">
                        <div class="card-body">
                            <h5 class="titulo branco text-center">GRAVAÇÕES</h5>
                            <p class="texto branco text-center sobre-tam mt-4 mb-3">
                                Esta funcionalidade armazena todos os procedimentos feitos em tempo real <br>
                                As gravações podem ser visualizadas pelo gerente.
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
                            <p class="texto branco text-center sobre-tam mt-4">
                                O gerente pode visualizar os relatórios criados pelos eletricistas. <br>
                                É permitido que o gerente adicione comentários sobre o procedimento.
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
                            <p class="texto branco text-center sobre-tam mt-4">
                                Substituições realizadas e/ou pendentes serão notificadas ao gerente, 
                                que pode apenas visualizar ou adicionar uma mensagem ao eletricista.st
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