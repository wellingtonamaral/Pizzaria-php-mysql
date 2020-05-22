<?php
if (isset($_POST['alterarAdmin'])):

    $nomeAdministrador = obrigatorio("nome", $_POST['adminNome']);
    $loginAdministrador = obrigatorio("login", $_POST['adminLogin']);
    $senhaAdministrador = obrigatorio("senha", $_POST['adminSenha']);


    global $obrigatorio;
    if (empty($obrigatorio)):

        if (verificaCadastroAlterar("administrador", "administrador_nome", $nomeAdministrador, "administrador_id", $_POST['id'])):

            if (verificaCadastroAlterar("administrador", "administrador_login", $loginAdministrador, "administrador_id", $_POST['id'])):

                 $dados = pegaId("administrador", "administrador_id", $_POST['id']);
            
            if($dados['administrador_senha'] == $senhaAdministrador):
                $senhaAdmin = $dados['administrador_senha'];
                else:
                $senhaAdmin = md5($senhaAdministrador);
            endif;    
            
                if (alterarAdministrador($dadosAdministrador = array(
                            "nome" => $nomeAdministrador,
                            "login" => $loginAdministrador,
                            "senha" => $senhaAdmin,
                            "id" => $_POST['id']
                        ))):


                    $mensagem = "";
                    $mensagem = "Administrador alterador com sucesso !";
                else:
                    $erro = "Erro ao alterar administrador !";
                endif;
            else:
                $erro = "Já existe um administrador com esse Login";

            endif;
        else:
            $erro = "Já existe um administrador com esse nome";
        endif;

    else:
        $erro = $obrigatorio;
    endif;
endif;
?>

<div class="formularioAlterar">
    <?php
    $dadosAdministrador = listar("administrador");
    ?>

    <table width="500">
        <tr>
            <td>Nome</td>
            <td>Usario</td>
            <td>Senha</td>

        </tr>

        <?php
        $params = array(
            'mode' => 'Jumping',
            'perPage' => 15,
            'delta' => 5,
            'itemData' => $dadosAdministrador);

        $pager = & Pager::factory($params);
        $data = $pager->getPageData();


        foreach ($data as $d):
            ?>
            <form action="" method="POST">
                <tr>
                <input type="hidden" name="id" value="<?php echo $d['administrador_id']; ?>" />
                <td><input type="text" value="<?php echo $d['administrador_nome']; ?>" name="adminNome" class="input_text"></input></td>
                <td><input type="text" value="<?php echo $d['administrador_login']; ?>" name="adminLogin" class="input_text"></input></td>
                <td><input type="text" value="<?php echo $d['administrador_senha']; ?>" name="adminSenha" class="input_text"></input></td>
                <td><input type="submit" name="alterarAdmin" value="alterar" class="input_button" /></td>

                </tr>
            </form>


        <?php endforeach; ?>

        <tr>
            <td colspan="4" align="center">
                <?php
                $links = $pager->getLinks();
                echo $links['all'];
                ?>

            </td>
        </tr>

        <tr>
            <td colspan="4" align="center">
                <?php echo isset($mensagem) ? '<div class="mensagem">' . $mensagem . '</div>' : ""; ?>
                <?php echo isset($erro) ? '<div class="erro">' . $erro . '</div>' : ""; ?>


            </td>
        </tr>

    </table></div>