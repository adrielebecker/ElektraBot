<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar usuário</title>
    <?php include "css/link.html";?>
</head>
<body>
    <?php include "navbar/nav-todos.html"; ?>
    <div class="container">
        <div class="col-6 card-senha">
            <br><br>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8">
                    <h4 class="titulo verde text-center">Criar Usuário e Senha</h4>
                </div>
            </div>
            <form action="" method="post">
                <div class="row mt-3">
                    <div class="col-2"></div>
                    <div class="col-6 ms-5">
                        <label for="user" class="form-label">Nome de Usuário:</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-6 ms-5">
                        <input type="text" name="user" id="user" class="form-control border-success">
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-6 ms-5">
                        <label for="senha" class="form-label">Criar Senha:</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-6 ms-5">
                        <input type="text" name="senha" id="senha" class="form-control border-success">
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-6 ms-5">
                        <label for="confirmeSenha" class="form-label">Confirmar Senha:</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-6 ms-5">
                        <input type="text" name="confirmeSenha" id="confirmeSenha" class="form-control border-success">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-4"></div>
                    <div class="col-2">
                        <button class="btn btn-secondary border-dark"><a href="cadastro.php" class="link branco">Voltar</a></button>
                    </div>
                    <div class="col-2">
                        <button class="btn secundario branco border-success"><a href="index.html" class="link branco">Salvar</a></button>
                    </div>
                </div>
            </form>
            <br><br>
        </div>
    </div>
</body>
</html>