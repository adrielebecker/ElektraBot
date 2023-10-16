<!DOCTYPE html>
<?php
    $acao = isset($_POST['acao']) ? $_POST['acao'] : "";
    $nome = isset($_POST['nome']) ? $_POST['nome'] : "";
    $cargo = isset($_POST['cargo']) ? $_POST['cargo'] : "";
    $senha = isset($_POST['senha']) ? $_POST['senha'] : "";
?>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php include "css/link.html"?>
</head>
<body>
    <?php include "navbar/nav-todos.html"?>
    <div class="container">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-4 mt-5">
                <br><br>
                <img src="img/login/eletricista.png" alt="" width="60%">
            </div>
            <div class="col-1"></div>
            <div class="col-6 card-login">
                <br><br><br>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <h4 class="titulo verde text-center">Login</h4>
                    </div>
                </div>
                <form action="acao/acao.php" method="post">
                    <div class="row mt-3">
                        <div class="col-2"></div>
                        <div class="col-6 ms-5">
                            <label for="nome" class="form-label texto verde">USUÁRIO:</label>
                            <input type="text" name="nome" id="nome" class="form-control border-success" value="<?=$nome?>">
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-6 ms-5">
                            <label for="cargo" class="form-label texto verde">CARGO:</label>
                            <select name="cargo" id="cargo" class="form-select border-success">
                                <option value="Eletricista" <?php if($cargo == "Eletricista") echo "selected";?>>Eletricista</option>
                                <option value="Gerente" <?php if($cargo == "Gerente") echo "selected";?>>Gerente</option>
                            </select>
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-6 ms-5">
                            <label for="senha" class="form-label texto verde">SENHA:</label>
                            <input type="text" name="senha" id="senha" class="form-control border-success" value="<?=$senha?>">
                        </div>
                    </div>
        
                    <div class="row mt-4">
                        <div class="col-5"></div>
                        <div class="col-2 ms-2">
                            <button class="btn secundario border-success" type="submit" name="acao" id="acao" value="entrar">Entrar</button>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <a href="cargo.php" class="text-end">Cadastrar</a>
                    </div>
                </form>
                <br>
            </div>
        </div>
    </div>
</body>
</html>