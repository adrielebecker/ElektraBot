<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php include "css/link.html"?>
</head>
<body>
    <?php include "nav/nav-todos.html"?>
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
                <form action="" method="post">
                    <div class="row mt-3">
                        <div class="col-2"></div>
                        <div class="col-6 ms-5">
                            <label for="user" class="form-label texto verde">USUÁRIO:</label>
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
                            <label for="cargo" class="form-label texto verde">CARGO:</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-6 ms-5">
                            <select name="cargo" id="cargo" class="form-select border-success">
                                <option value="Eletricista" selected>Eletricista</option>
                                <option value="Gerente">Gerente</option>
                            </select>
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-6 ms-5">
                            <label for="senha" class="form-label texto verde">SENHA:</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-6 ms-5">
                            <input type="text" name="senha" id="senha" class="form-control border-success">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-5"></div>
                        <div class="col-2 ms-2">
                            <button class="btn secundario border-success"><a href="index.html" class="link branco">Entrar</a></button>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <a href="cadastro.php" class="text-end">Cadastrar</a>
                    </div>
                </form>
                <br>
            </div>
        </div>
    </div>
</body>
</html>