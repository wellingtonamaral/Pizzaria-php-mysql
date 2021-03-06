<?php
unset($_SESSION);
if (isset($_POST['cadastrarCliente'])):




    $nome = obrigatorio("nome", addslashes($_POST['nome']));
    $cidade = obrigatorio("cidade", addslashes($_POST['cidade']));
    $estado = obrigatorio("estado", addslashes($_POST['estado']));
    $bairro = obrigatorio("bairro", addslashes($_POST['bairro']));

    $cep = obrigatorio("cep", addslashes($_POST['cep']));
    validarCep($cep);
    $telefone = obrigatorio("telefone", addslashes($_POST['telefone']));
    validarTelefone($telefone);
    $celular = obrigatorio("celular", addslashes($_POST['celular']));
    validarCelular($celular);

    $endereco = obrigatorio("endereco ", addslashes($_POST['endereco']));
    $login = obrigatorio("login", addslashes($_POST['login']));
    $senha = obrigatorio("senha", addslashes($_POST['senha']));

    criaSessao("nome", $nome);
    criaSessao("cidade", $cidade);
    criaSessao("estado", $estado);
    criaSessao("bairro", $bairro);
    criaSessao("cep", $cep);
    criaSessao("celular", $celular);
    criaSessao("telefone", $telefone);
    criaSessao("endereco", $endereco);
    criaSessao("login", $login);

    
    global $obrigatorio;
    global $validou;

    if (empty($obrigatorio)):
        if (empty($validou)):

            if (verificaCadastro("clientes", "cliente_nome", $nome)):
                if (verificaCadastro("clientes", "cliente_login", $login)):
                    if (cadastrarCliente(array("nome" => $nome, "cidade" => $cidade, "estado" => $estado,
                                "bairro" => $bairro, "cep" => $cep, "telefone" => $telefone, "celular" => $celular,
                                "endereco" => $endereco, "login" => $login, "senha" => md5($senha)))):
                        $mensagem = "Cliente cadastrado com sucesso!!";
                    else:
                        $erro = "Erro ao cadastar Cliente!";
                    endif;

                else:
                    $erro = "Esse login já existe! ";
                endif;
            else:
                $erro = "Esse cliente já existe! ";
            endif;

        else:
            $erro = $validou;
        endif;
    else:
        $erro = $obrigatorio;
    endif;

endif;

if(isset($_POST['limparCampos'])):
    unset($_SESSION);
endif;
?>

<div class="formularioCadastroMedio">

    <h2>:.CADASTRAR CLIENTE.:</h2>

    <div class="formCadastroMedio">
        <form action="" method="POST">

            <label  for="nome">Nome:</label>
            <input class="formCad" type="text"  name="nome" value="<?php echo isset($_SESSION['nome']) ? $_SESSION['nome']: ""; ?>" placeholder="Nome Completo">Informe o Nome Completo                       
            <br>
            <label  for="cidade">Cidade: </label>
            <input class="formCad" type="text" name="cidade" value="<?php echo isset($_SESSION['cidade']) ? $_SESSION['cidade']: ""; ?>" placeholder="Cidade">Informe a cidade
            <br>
            <label for="estado">Estado: </label>
            <input class="formCad" type="text" name="estado" value="<?php echo isset($_SESSION['estado']) ? $_SESSION['estado']: ""; ?>" placeholder="Estado" maxlength="2">Informe o estado
            <br>
            <label  for="bairro">Bairro: </label>
            <input class="formCad" type="text"  name="bairro" value="<?php echo isset($_SESSION['bairro']) ? $_SESSION['bairro']: ""; ?>" placeholder="Bairro">Informe o bairro
            <br>
            <label for="cep">Cep: </label>
            <input class="formCad" type="text"  name="cep" value="<?php echo isset($_SESSION['cep']) ? $_SESSION['cep']: ""; ?>" placeholder="CEP" maxlength="9">Informe o CEP
            <br>
            <label for="telefone">Telefone: </label>
            <input class="formCad" type="text"  name="telefone" value="<?php echo isset($_SESSION['telefone']) ? $_SESSION['telefone']: ""; ?>"  placeholder="(XX) XXXX-XXXX">Telefone (XX) XXXX-XXXX
            <br>
            <label  for="celular">Celular: </label>
            <input class="formCad" type="text"  name="celular" value="<?php echo isset($_SESSION['celular']) ? $_SESSION['celular']: ""; ?>" placeholder="(XX) XXXX-XXXX">Celular (XX) XXXXX-XXXX
            <br>
            <label  for="endereco">Endereço: </label>
            <input class="formCad" type="text"  name="endereco" value="<?php echo isset($_SESSION['endereco']) ? $_SESSION['endereco']: ""; ?>" placeholder="Endereço">Informe o endereço
            <br>
            <label  for="login">Login: </label>
            <input class="formCad" type="text"  name="login" value="" placeholder="Login">Login 
            <br>
            <label for="senha" >Senha: </label>
            <input class="formCad" type="password"  name="senha" value=""placeholder="Senha"  >Senha minímo 6 dígitos
            
            
            <br>



            <div class="container-contact100-form-btn">
                <button class="contact100-form-btn" name="cadastrarCliente">Cadastrar</button>
                <button name="limparCampos" class="contact100-form-btn" >Limpar</button>
              
            </div>
              
        </form>

    </div>
    <?php echo isset($mensagem) ? '<div class="mensagem">' . $mensagem . '</div>' : ""; ?>
    <?php echo isset($erro) ? '<div class="erro">' . $erro . '</div>' : ""; ?>


</div>