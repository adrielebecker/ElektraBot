<!DOCTYPE html>
<?php
    session_start();
    // var_dump($_SESSION);
    $pagina = "Minha Conta";
    $caminho = '../json/gerente.json';
    $json = json_decode(file_get_contents($caminho), true);
?>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$pagina?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <?php include "../navbar/nav-gerente.php";?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="titulo verde text-center mt-5">Minha conta</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-2 mt-4 img-user">
                <div class="row">
                    <h6 class="titulo verde text-center">Foto de Perfil</h6>
                </div>
                <div class="row mt-3">
                    <img src="../img/icones/user.png" alt="" width="80%">
                </div>
                <div class="row">
                    <p class="text-center mt-2 texto">Alterar imagem:</p>
                </div>
                <div class="row">
                    <input type="file" name="foto" id="foto">
                </div>
            </div>
            <div class="col-1"></div>
            <div class="col-9">
                <div class="row mt-5">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <h6 class="titulo verde text-center nav-link active bg-success border-dark border-bottom-0" style="color: #FFF;">Dados Pessoais</h6>
                        </li>
                    </ul>
                    <table class="table text-center table-bordered border-dark">
                        <thead class="bg-success branco">
                            <tr>
                                <th>Nome Completo</th>
                                <th>Data de Nascimento</th>
                                <th>Sexo</th>
                                <th>CPF</th>
                                <th>Nome de Usuário</th>
                                <th>Matrícula</th>
                                <th>Cargo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($json as $value){
                                    if($_SESSION['idGerente'] == $value['id']){
                                        echo "<tr>
                                                <td>".$value['nome']."</td>
                                                <td>".$value['dataNasc']."</td>
                                                <td>".$value['sexo']."</td>
                                                <td>".$value['cpf']."</td>
                                                <td>".$value['user']."</td>
                                                <td>".$value['matricula']."</td>
                                                <td>".$value['cargo']."</td>
                                            </tr>";
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>

                <div class="row mt-4">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <h6 class="titulo verde text-center nav-link active bg-success border-dark border-bottom-0" style="color: #FFF;">Dados da Empresa</h6>
                        </li>
                    </ul>
                    <table class="table text-center table-bordered border-dark">
                        <thead class="bg-success branco">
                            <tr>
                                <th>Nome de Usuário</th>
                                <th>Matrícula</th>
                                <th>Cargo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($json as $value){
                                    if($_SESSION['idGerente'] == $value['id']){
                                        echo "<tr>
                                                <td>".$value['user']."</td>
                                                <td>".$value['matricula']."</td>
                                                <td>".$value['cargo']."</td>
                                            </tr>";
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>

                <div class="row mt-4">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <h6 class="titulo verde text-center nav-link active bg-success border-dark border-bottom-0" style="color: #FFF;">Dados de Contato</h6>
                        </li>
                    </ul>
                    <table class="table text-center table-bordered border-dark">
                        <thead class="bg-success branco">
                            <tr>
                                <th>Celular</th>
                                <th>E-mail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($json as $value){
                                    if($_SESSION['idGerente'] == $value['id']){
                                        echo "<tr>
                                                <td>".$value['celular']."</td>
                                                <td>".$value['email']."</td></tr>";
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>

                <div class="row mt-4">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <h6 class="titulo verde text-center nav-link active bg-success border-dark border-bottom-0" style="color: #FFF;">Dados de Endereço</h6>
                        </li>
                    </ul>
                    <table class="table text-center table-bordered border-dark">
                        <thead class="bg-success branco">
                            <tr>
                                <th>Estado</th>
                                <th>Cidade</th>
                                <th>Bairro</th>
                                <th>Rua</th>
                                <th>Complemento</th>
                                <th>Número</th>
                                <th>CEP</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($json as $value){
                                    if($_SESSION['idGerente'] == $value['id']){
                                        echo "<tr>
                                                <td>".$value['estado']."</td>
                                                <td>".$value['cidade']."</td>
                                                <td>".$value['bairro']."</td>
                                                <td>".$value['rua']."</td>
                                                <td>".$value['complemento']."</td>
                                                <td>".$value['numero']."</td>
                                                <td>".$value['cep']."</td>
                                            </tr>";
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>

        </div>
    </div>
</body>
</html>