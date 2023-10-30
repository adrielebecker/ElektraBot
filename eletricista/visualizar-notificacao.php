<!DOCTYPE html>
<?php
    $pagina = "Visualizar Substituição";
    $nomeSubstituicao = isset($_GET['nomeSubstituicao']) ? $_GET['nomeSubstituicao'] : "";
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
    <script src="../js/acao.js"></script>
    <?php include 'link.html';?>
</head>
<body>
    <?php include '../navbar/nav-gerente.php'; ?>
    <div class="container">
        <div class="row mt-4">
            <h3 class="titulo verde text-center"><?=$nomeSubstituicao?></h3>
        </div>

        <div class="row">
            <div class="col-6">
                <form action="../acao/acao.php" method="post">
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
                                foreach($jsonEletricista as $value){
                                    if($_SESSION['nomeEletri'] == $value['nome']){
                                        echo "<input type='text' name='gerente' id='gerente' value='".ucwords($value['gerente'])."' class='form-control text-center border-success' readonly>";
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
                    <div class="row mt-4">
                        <div class="col-5 mt-4">
                            <div class="row bg-success rounded">
                                <p class="texto text-center branco mt-3">Eletricista no projeto:</p>
                                    <?php
                                        echo "<input type='text' name='eletricista' id='eletricista' value='".ucwords($_SESSION['nomeEletri'])."' class='form-control text-center border-success' readonly>";
                                    ?>
                            </div>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-5 mt-4">
                            <div class="row bg-success rounded">
                                <p class="texto branco text-center mt-3">Data da Substituição:</p>
                                    <?php
                                        foreach($jsonSubstituicao as $value){
                                            if($nomeSubstituicao == $value['nome']){
                                                echo "<input type='text' name='dataSubstituicao' id='dataSubstituicao' value='".date("d/m/Y", strtotime($value['dataSubstituicao']))."' class='form-control text-center border-success' readonly>";
                                            }
                                        }
                                    ?>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-"></div>
                        <div class="col-6">                            
                            <button type="submit" class="btn btn-success" name="acao" id="acao" value="salvarSubstituicao">Marcar como concluída</button>
                        </div>
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
                            if($nomeSubstituicao == $value['nome']){
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