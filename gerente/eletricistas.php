<!DOCTYPE html>
<?php
    include "../acao/acao.php";
    $pagina = "Eletricistas";
    session_start();
    var_dump($_SESSION);
    
    $caminho = '../json/eletricista.json';
    $json = json_decode(file_get_contents($caminho), true);
?>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$pagina?></title>
    <?php include "link.html";?>
</head>
<body>
    <?php include "../navbar/nav-gerente.php";?>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="titulo verde text-center mt-4"><?=$pagina?></h3>
            </div>
        </div>
        <div class="row">
            <?php
                foreach($json as $value){
                    if($_SESSION['nomeGerente'] == $value['gerente']){
                        echo "<div class='col-4'>
                                <table class='table text-center table-bordered mt-4 table-sm'>
                                    <tr>
                                        <td><img src='../img/icones/user.png' width='20%' class='mt-2'></td></tr>
                                        <tr><th>".$value['nome']."</th></tr>
                                        <tr><td>".$value['email']."</td></tr>
                                        <tr><td>".formataTelefone($value['celular'])."</td>
                                    </tr>
                                </table>
                            </div>";
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>