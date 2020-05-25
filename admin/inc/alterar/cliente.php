<?php
if (isset($_POST['alterarCliente'])):

    $nomeAdministrador = obrigatorio("nome", $_POST['adminNome']);
    $loginAdministrador = obrigatorio("login", $_POST['adminLogin']);
    $senhaAdministrador = obrigatorio("senha", $_POST['adminSenha']);


    global $obrigatorio;
    if (empty($obrigatorio)):

      
        /**
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
          **/
    endif;
 
    
endif;
?>


    <?php
    $dadosAdministrador = listar("clientes");
    ?>

   <table class="table-round-corner" cellspacing="0">
    <tr>
        <th class="table-th">Nome</th>
        <th class="table-th">Estado</th>
        <th class="table-th">Cidade</th>
        <th class="table-th">Bairro</th>
        <th class="table-th">CEP</th>
        <th class="table-th">Telefone</th>
         <th class="table-th">Celular</th>
        <th class="table-th">Endereço</th>
        <th class="table-th">Login</th>
        <th class="table-th">Senha</th>
       
        
        
        
        
        <th class="table-th">Função</th>
        
    </tr>

        <?php
        $params = array(
            'mode' => 'Jumping',
            'perPage' => 15,
            'delta' => 5,
            'itemData' => $dadosAdministradoAr);

        $pager = & Pager::factory($params);
        $data = $pager->getPageData();


        foreach ($data as $d):
            ?>
            <form action="" method="POST">
                <tr>
                <input type="hidden" name="id" value="<?php echo $d['cliente_id']; ?>" />
                
                
                
                
                
                
                <td class="table-td">
                    <input class="table-in" value="<?php echo $d['cliente_nome']; ?>" name="clienteNome"></input>
                    
                </td>
                <td class="table-td">
                    <input class="table-in" value="<?php echo $d['cliente_estado']; ?>" name="clienteEstado"></input>
                    
                </td>
                <td class="table-td">
                    <input class="table-in" value="<?php echo $d['cliente_cidade']; ?>" name="clienteCidade"></input>
                    
                </td>
                <td class="table-td">
                    <input class="table-in" value="<?php echo $d['cliente_bairro']; ?>" name="clienteBairro"></input>
                    
                </td>
                <td class="table-td">
                    <input class="table-in" value="<?php echo $d['cliente_cep']; ?>" name="clienteCep"></input>
                    
                </td>
                <td class="table-td">
                    <input class="table-in" value="<?php echo $d['cliente_telefone']; ?>" name="clienteTelefone"></input>
                    
                </td>
                <td class="table-td">
                    <input class="table-in" value="<?php echo $d['cliente_celular']; ?>" name="clienteCelular"></input>
                    
                </td>
                <td class="table-td">
                    <input class="table-in" value="<?php echo $d['cliente_endereco']; ?>" name="clienteEndereco"></input>
                    
                </td>
                <td class="table-td">
                    <input class="table-in" value="<?php echo $d['cliente_login']; ?>" name="clienteLogin"></input>
                    
                </td>
                <td class="table-td">
                    <input class="table-in" value="<?php echo $d['cliente_senha']; ?>" name="clienteenha"></input>
                    
                </td>
                
                
                
                
                
                
                
                
                
                <td class="table-td">                             
                 <input type="submit" name="alterarCliente" value="alterar" class="table-button" />
                </td>

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

    </table>z