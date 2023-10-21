<!DOCTYPE html>
<?php
    $pagina = "Designar Substituições";
    $caminhoEletricista = '../json/eletricista.json';
    $caminhoSubstituicao = '../json/substituicao.json';
    $jsonEletricista = json_decode(file_get_contents($caminhoEletricista), true);
    $jsonSubstituicao = json_decode(file_get_contents($caminhoSubstituicao), true);
    session_start();
    // var_dump($jsonEletricista);
    // var_dump($jsonSubstituicao);
?>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$pagina?></title>
    <?php include 'link.html';?>
</head>
<body>
    <?php include '../navbar/nav-gerente.php'; ?>
    <div class="container">
        <!-- <div class="row mt-1">
            <div class="col-3">
                <button class="navbar-toggler border border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarToggleExternalContent">
                    <h6 class="texto verde mt-1">Acesso rápido</h6>
                </button>

                <div class="offcanvas p-5 offcanvas-start text-center" id="navbarToggleExternalContent">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title titulo verde" id="offcanvasLabel">Substituições Recentes</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <?php
                            if($jsonSubstituicao == NULL){
                                echo "Ainda não há substituições recentes!";
                            }
                            else{
                                foreach($jsonEletricista as $value){
                                    if($value['gerente'] == $_SESSION['nomeGerente']){
                                            foreach($jsonSubstituicao as $key){
                                            echo "<p'>{$key['nome']}</p>";
                                            echo $value['gerente'];
                                        }
                                    }
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="row mt-4">
            <h3 class="titulo verde text-center">Nova Substituição</h3>
        </div>

        <div class="row">
            <div class="col-6">
                <form action="../acao/acao.php" method="post">
                    <div class="row mt-4">
                        <div class="col-2"></div>
                        <div class="col-6">
                            <div class="row bg-success rounded">
                                <p class="texto text-center branco mt-3">Eletricista(s) no projeto:</p>
                                <select name="eletricista" id="eletricista" class="form-select border-success text-center">
                                    <option value="selecione">Selecione um eletricista...</option>
                                    <?php
                                        foreach($jsonEletricista as $value){
                                            if($_SESSION['nomeGerente'] == $value['gerente']){
                                                echo "<option value='{$value['nome']}'>{$value['nome']}</option>";
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-2"></div>
                        <div class="col-6">
                            <div class="row bg-success rounded">
                                <p class="texto branco text-center mt-3">Data da Substituição:</p>
                                <input type="date" name="dataSubstituicao" id="dataSubstituicao" class="form-control text-center">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-2"></div>
                        <div class="col-6">
                            <div class="row bg-success rounded">
                                <p class="texto branco text-center mt-3">Nome da Substituição:</p>
                                <input type="text" name="nome" id="nome" class="form-control text-center">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-2 ms-4"></div>
                        <div class="col-2 ms-4">
                            <button class="btn btn-danger">Cancelar</button>
                        </div>
                        <div class="col-2">                            
                            <button type="submit" class="btn btn-success" name="acao" id="acao" value="salvarSubstituicao">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-6 mt-3">
                <div class="row">
                    <div class="col-12">
                        <h6 class="texto verde text-center me-4">LOCALIZAÇÃO</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-6">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3548.2225635105933!2d-49.642396925310535!3d-27.212161305780715!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-BR!2sbr!4v1697839360200!5m2!1spt-BR!2sbr" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>