<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <?php include "css/link.html";?>
</head>
<body>
    <?php include "navbar/nav-todos.html"; ?>
    <div class="container">
        <div class="row mt-5">
            <h3 class="titulo verde text-center">FAÇA O SEU CADASTRO</h3>
        </div>
        <form action="" method="post">
            <div class="row mt-4">
                <div class="col-4">
                    <label for="nome" class="form-label">Nome Completo:</label>
                </div>
                <div class="col-2">
                    <label for="dataNasc" class="form-label">Data de Nascimento:</label>
                </div>
                <div class="col-4">
                    <label for="sexo" class="form-check-label">Sexo:</label>
                </div> 
                <div class="col-2">
                    <label for="cargo" class="form-label">Cargo:</label>
                </div>                
            </div>

            <div class="row">
                <div class="col-4">
                    <input type="text" name="nome" id="nome" class="form-control border-success">
                </div>
                <div class="col-2">
                    <input type="date" name="dataNasc" id="dataNasc" class="form-control border-success">
                </div>
                <div class="col-4">
                    <div class="row">
                        <div class="col-4">
                            <input type="radio" name="sexo" id="sexo" value="Feminino" class="form-check-input border-success"> Feminino
                        </div>
                        <div class="col-4">
                            <input type="radio" name="sexo" id="sexo" value="Masculino" class="form-check-input border-success" checked> Masculino
                        </div>
                        <div class="col-3">
                            <input type="radio" name="sexo" id="sexo" value="Outro" class="form-check-input border-success"> Outro
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <select name="cargo" id="cargo" class="form-select border-success">
                        <option value="Eletricista" selected>Eletricista</option>
                        <option value="Gerente">Gerente</option>
                    </select>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-3">
                    <label for="cpf" class="form-label">CPF:</label>
                </div>
                <div class="col-3">
                    <label for="celular" class="form-label">Celular:</label>
                </div>
                <div class="col-6">
                    <label for="email" class="form-check-label">E-mail:</label>
                </div>                 
            </div>

            <div class="row">
                <div class="col-3">
                    <input type="text" name="cpf" id="cpf" class="form-control border-success" placeholder="000.000.000-00">
                </div>
                <div class="col-3">
                    <input type="text" name="celular" id="celular" class="form-control border-success" placeholder="(00) 00000-0000">
                </div>
                <div class="col-6">
                    <input type="email" name="email" id="email" class="form-control border-success" placeholder="dominio@email.com"> 
                </div>
            </div>
            
            <div class="row mt-4">
                <div class="col-3">
                    <label for="cep" class="form-label">CEP:</label>
                </div>
                <div class="col-3">
                    <label for="estado" class="form-label">Estado:</label>
                </div>
                <div class="col-3">
                    <label for="cidade" class="form-check-label">Cidade:</label>
                </div>
                <div class="col-3">
                    <label for="bairro" class="form-check-label">Bairro:</label>
                </div>                      
            </div>

            <div class="row">
                <div class="col-3">
                    <input type="text" name="cep" id="cep" class="form-control border-success" placeholder="00000-0000">
                </div>
                <div class="col-3">
                    <select name="estado" id="estado" class="form-select border-success">
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espírito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC" selected>Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                        <option value="EX">Estrangeiro</option>
                    </select>
                </div>
                <div class="col-3">
                    <input type="text" name="cidade" id="cidade" class="form-control border-success"> 
                </div>
                <div class="col-3">
                    <input type="text" name="bairro" id="bairro" class="form-control border-success"> 
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-3">
                    <label for="rua" class="form-label">Rua:</label>
                </div>
                <div class="col-7">
                    <label for="complemento" class="form-label">Complemento:</label>
                </div>
                <div class="col-2">
                    <label for="numero" class="form-check-label">Número:</label>
                </div>                 
            </div>

            <div class="row">
                <div class="col-3">
                    <input type="text" name="rua" id="rua" class="form-control border-success">
                </div>
                <div class="col-7">
                    <input type="text" name="complemento" id="complemento" class="form-control border-success" placeholder="Ex: Casa">
                </div>
                <div class="col-2">
                    <input type="numero" name="numero" id="numero" class="form-control border-success"> 
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-1">
                    <button class="btn btn-secondary border-dark"><a href="index.html" class="link texto branco">Voltar</a></button>
                </div>
                <div class="col-1">
                    <button class="btn secundario border-success"><a href="senha.php" class="link texto branco">Próximo</a></button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>