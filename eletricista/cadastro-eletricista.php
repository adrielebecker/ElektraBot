<!DOCTYPE html>
<?php
    session_start();
    isset($_SESSION['dados']);
    $pagina = "Cadastro";
    $acao = isset($_POST['acao']) ? $_POST['acao'] : "";
    $nome = isset($_POST['nome']) ? $_POST['nome'] : "";
    $dataNasc = isset($_POST['dataNasc']) ? $_POST['dataNasc'] : "";
    $sexo = isset($_POST['sexo']) ? $_POST['sexo'] : "";
    $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : "";
    $celular = isset($_POST['celular']) ? $_POST['celular'] : "";
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $cep = isset($_POST['cep']) ? $_POST['cep'] : "";
    $estado = isset($_POST['estado']) ? $_POST['estado'] : "";
    $cidade = isset($_POST['cidade']) ? $_POST['cidade'] : "";
    $bairro = isset($_POST['bairro']) ? $_POST['bairro'] : "";
    $rua = isset($_POST['rua']) ? $_POST['rua'] : "";
    $complemento = isset($_POST['complemento']) ? $_POST['complemento'] : "";
    $numero = isset($_POST['numero']) ? $_POST['numero'] : "";
    $matricula = isset($_POST['matricula']) ? $_POST['matricula'] : "";
    $gerente = isset($_POST['gerente']) ? $_POST['gerente'] : "";
    $senha = isset($_POST['senha']) ? $_POST['senha'] : "";
    $confirmaSenha = isset($_POST['confirmaSenha']) ? $_POST['confirmaSenha'] : "";

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
</head>
<body>
    <?php include "../navbar/nav-eletricista.php"; ?>
    
    <div class="container">
        <div class="row mt-4">
            <h3 class="titulo verde text-center">FAÇA O SEU CADASTRO</h3>
        </div>
        <form action="../acao/acao.php" method="post">
            <div class="row mt-2">
                <div class="col-4">
                    <label for="nome" class="form-label">Nome Completo:</label>
                    <input type="text" name="nome" id="nome" class="form-control border-success text-center" value="<?=$nome?>">
                </div>
                <div class="col-2">
                    <label for="dataNasc" class="form-label">Data de Nascimento:</label>
                    <input type="date" name="dataNasc" id="dataNasc" class="form-control border-success" value="<?=$dataNasc?>">
                </div>
                <div class="col-4">
                    <label for="sexo" class="form-check-label">Sexo:</label>
                    <div class="row mt-3">
                        <div class="col-4">
                            <input type="radio" name="sexo" id="sexo" value="Feminino" class="form-check-input border-success" <?php if($sexo =="Feminino") echo "checked";?>> Feminino
                        </div>
                        <div class="col-4">
                            <input type="radio" name="sexo" id="sexo" value="Masculino" class="form-check-input border-success" checked <?php if($sexo =="Masculino") echo "checked";?>> Masculino
                        </div>
                        <div class="col-3">
                            <input type="radio" name="sexo" id="sexo" value="Outro" class="form-check-input border-success" <?php if($sexo =="Outro") echo "checked";?>> Outro
                        </div>
                    </div>
                </div>               
                <div class="col-2">
                    <label for="cpf" class="form-label">CPF:</label>
                    <input type="text" name="cpf" id="cpf" class="form-control border-success text-center" placeholder="000.000.000-00" value="<?=$cpf?>">
                </div> 
            </div>

            <div class="row mt-3">
                <div class="col-3">
                    <label for="celular" class="form-label">Celular:</label>
                    <input type="text" name="celular" id="celular" class="form-control border-success text-center" placeholder="(00) 00000-0000" value="<?=$celular?>">
                </div>
                <div class="col-6">
                    <label for="email" class="form-label">E-mail:</label>
                    <input type="text" name="email" id="email" class="form-control border-success text-center" placeholder="dominio@email.com" value="<?=$email?>">    
                </div> 
                <div class="col-3">
                    <label for="cep" class="form-label">CEP:</label>
                    <input type="text" name="cep" id="cep" class="form-control border-success text-center" placeholder="00000-0000" value="<?=$cep?>">
                </div>               
            </div>
            
            <div class="row mt-3">
                <div class="col-3">
                    <label for="estado" class="form-label">Estado:</label>
                    <select name="estado" id="estado" class="form-select border-success text-center">
                        <option value="AC" <?php if($estado =="AC") echo "selected";?>>Acre</option>
                        <option value="AL" <?php if($estado =="AL") echo "selected";?>>Alagoas</option>
                        <option value="AP" <?php if($estado =="AP") echo "selected";?>>Amapá</option>
                        <option value="AM" <?php if($estado =="AM") echo "selected";?>>Amazonas</option>
                        <option value="BA" <?php if($estado =="BA") echo "selected";?>>Bahia</option>
                        <option value="CE" <?php if($estado =="CE") echo "selected";?>>Ceará</option>
                        <option value="DF" <?php if($estado =="DF") echo "selected";?>>Distrito Federal</option>
                        <option value="ES" <?php if($estado =="ES") echo "selected";?>>Espírito Santo</option>
                        <option value="GO" <?php if($estado =="GO") echo "selected";?>>Goiás</option>
                        <option value="MA" <?php if($estado =="MA") echo "selected";?>>Maranhão</option>
                        <option value="MT" <?php if($estado =="MT") echo "selected";?>>Mato Grosso</option>
                        <option value="MS" <?php if($estado =="MS") echo "selected";?>>Mato Grosso do Sul</option>
                        <option value="MG" <?php if($estado =="MG") echo "selected";?>>Minas Gerais</option>
                        <option value="PA" <?php if($estado =="PA") echo "selected";?>>Pará</option>
                        <option value="PB" <?php if($estado =="PB") echo "selected";?>>Paraíba</option>
                        <option value="PR" <?php if($estado =="PR") echo "selected";?>>Paraná</option>
                        <option value="PE" <?php if($estado =="PE") echo "selected";?>>Pernambuco</option>
                        <option value="PI" <?php if($estado =="PI") echo "selected";?>>Piauí</option>
                        <option value="RJ" <?php if($estado =="RJ") echo "selected";?>>Rio de Janeiro</option>
                        <option value="RN" <?php if($estado =="RN") echo "selected";?>>Rio Grande do Norte</option>
                        <option value="RS" <?php if($estado =="RS") echo "selected";?>>Rio Grande do Sul</option>
                        <option value="RO" <?php if($estado =="RO") echo "selected";?>>Rondônia</option>
                        <option value="RR" <?php if($estado =="RR") echo "selected";?>>Roraima</option>
                        <option value="SC" selected <?php if($estado =="SC") echo "selected";?>>Santa Catarina</option>
                        <option value="SP" <?php if($estado =="SP") echo "selected";?>>São Paulo</option>
                        <option value="SE" <?php if($estado =="SE") echo "selected";?>>Sergipe</option>
                        <option value="TO" <?php if($estado =="TO") echo "selected";?>>Tocantins</option>
                        <option value="EX" <?php if($estado =="EX") echo "selected";?>>Estrangeiro</option>
                    </select>
                </div>
                <div class="col-3">
                    <label for="cidade" class="form-label">Cidade:</label>
                    <input type="text" name="cidade" id="cidade" class="form-control border-success text-center" value="<?=$cidade?>"> 
                </div>
                <div class="col-3">
                    <label for="bairro" class="form-label">Bairro:</label>
                    <input type="text" name="bairro" id="bairro" class="form-control border-success text-center" value="<?=$bairro?>"> 
                </div> 
                <div class="col-3">
                    <label for="rua" class="form-label">Rua:</label>
                    <input type="text" name="rua" id="rua" class="form-control border-success text-center" value="<?=$rua?>">
                </div>                     
            </div>

            <div class="row mt-3">
                <div class="col-7">
                    <label for="complemento" class="form-label">Complemento:</label>
                    <input type="text" name="complemento" id="complemento" class="form-control border-success" placeholder="Ex: Casa" value="<?=$complemento?>">
                </div>
                <div class="col-2">
                    <label for="numero" class="form-label">Número:</label>
                    <input type="text" name="numero" id="numero" class="form-control border-success text-center" value="<?=$numero?>">
                </div>  
                <div class="col-3">
                    <label for="matricula" class="form-label">Matrícula:</label>
                    <input type="text" name="matricula" id="matricula" class="form-control border-success text-center" value="<?=$matricula?>">
                </div>           
            </div>

            <div class="row mt-3">
                <div class="col-4">
                    <label for="gerente" class="form-label">Gerente Responsável:</label>
                    <select name="gerente" id="gerente" class="form-select">
                        <?php
                            foreach($json as $value){
                                echo "<option value='{$value['nome']}'>{$value['nome']}</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="col-4">
                    <label for="senha" class="form-label">Criar Senha:</label>
                    <input type="password" name="senha" id="senha" class="form-control border-success text-center" value="<?=$senha?>">
                </div>
                <div class="col-4">
                    <label for="confirmaSenha" class="form-label">Confirmar Senha:</label>
                    <input type="password" name="confirmaSenha" id="confirmaSenha" class="form-control border-success text-center" value="<?=$confirmaSenha?>">
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-1">
                    <button class="btn btn-secondary border-dark"><a href="../index.php" class="link texto branco">Voltar</a></button>
                </div>
                <div class="col-1">
                    <button class="btn secundario border-success branco texto" type="submit" name="acao" id="acao" value="salvarEletricista">Salvar</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>