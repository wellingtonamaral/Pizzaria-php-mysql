<?php
if (isset($_POST['cadastrarAdministrador'])):
    $nome = obrigatorio("nome", addslashes($_POST['nome']));
    $login = obrigatorio("login", addslashes($_POST['login']));
    /*  Senha abaixo com hash */
    //$senha = obrigatorio("senha",addslashes(password_hash($_POST['senha'],PASSWORD_DEFAULT)));
    $senha = obrigatorio("senha", addslashes($_POST['senha']));
    global $obrigatorio;


    if (empty($obrigatorio)):

        if (verificaCadastro("administrador", "administrador_nome", $nome)):
            if (verificaCadastro("administrador", "administrador_login", $login)):
                if (cadastrarAdministrador(array("nome" => $nome, "login" => $login, "senha" => md5($senha)))):
                    $mensagem = "Administrador cadastrado com sucesso!!";
                else:
                    $erro = "Erro ao cadastar administrador!";
                endif;

            else:
                $erro = "Esse login já existe! ";
            endif;
        else:
            $erro = "Esse administrador já existe! ";
        endif;
    else:
        $erro = $obrigatorio;
    endif;
endif;
?>


<div class="formularioCadastro">

    <h2>:.CADASTRAR ADIMINISTRADOR  .:</h2>

    <div class="formCadastro">
        <form action="" method="POST">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" class="txt_field"> </input>*		          

            <label for="login">Login:</label>
            <input type="text" name="login" class="txt_field_menor"> </input>*		          

            <label for="senha">Senha:</label>
            <input type="password" name="senha" class="txt_field_menor"> </input>*	          
            <br/>
            <br/>
            <input type="submit" name="cadastrarAdministrador" value="cadastrar" class="bt_submit"></input>
        </form>
    </div>

    <?php echo isset($mensagem) ? '<div class="mensagem">' . $mensagem . '</div>' : ""; ?>
   <?php echo isset($erro) ? '<div class="erro">' . $erro . '</div>' : ""; ?>



    <div class="obrigatorio">* Campos Obrigatórios</div>


</div>