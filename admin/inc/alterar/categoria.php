<?php
if (isset($_POST['alterarCategoria'])):
    $nomeCategoria = obrigatorio("categoria", $_POST['categoriaNome']);
    $id = (int) $_POST['id'];
    
    
    
    global $obrigatorio;
    if (empty($obrigatorio)):

        if (verificaCadastroAlterar("categorias", "categoria_nome", $nomeCategoria, "categoria_id", $_POST['id'])):
            if (alterarCategoria($nomeCategoria, $id)):
                $mensagem = "";
                $mensagem = "Categoria alterada com sucesso";
                else:
                $erro = "Não foi possivél fazer a alteração da categoria";
            endif;
                else:
            $erro = "Já existe uma categoria com esse nome";
        endif;


    else:
        $erro = $obrigatorio;
    endif;
endif;
?>

<?php $dadosAdministrador = listar("categorias"); ?>

<table class="table-round-corner" cellspacing="0">
    <tr>
        <th class="table-th">Nome</th>
        <th class="table-th">Função</th>
    </tr>

    <?php
    $params = array(
        'mode' => 'Jumping',
        'perPage' => 10,
        'delta' => 5,
        'itemData' => $dadosAdministrador);

    $pager = & Pager::factory($params);
    $data = $pager->getPageData();


    foreach ($data as $d):
        ?>
        <form action="" method="POST">
            <tr>
            <input type="hidden" name="id" value="<?php echo $d['categoria_id']; ?>" />

            <td class="table-td">
                <input class="table-in" value="<?php echo $d['categoria_nome']; ?>" name="categoriaNome"></input>



            <td class="table-td" style="width: 100px;">  
                <input type="submit" name="alterarCategoria" value="alterar" class="table-button" />
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










</table>