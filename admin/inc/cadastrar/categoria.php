<?php
if (isset($_POST['cadastrarCategoria'])):
    $categoria = obrigatorio("categoria",addslashes($_POST['categoria']));
global $obrigatorio;
    

    if(empty($obrigatorio)):

    if (verificaCadastro("categorias", "categoria_nome", $categoria)):
        if (cadastrarCategoria($categoria)):
            $mensagem = "Categoria cadastrada com sucesso!!";
        else:
            $erro = "Erro ao cadastar categoria!";
        endif;

    else:
        $erro = "Essa categoria já existe! ";

    endif;
    else:
        $erro = $obrigatorio;
    endif;
endif;
?>

<div class="formularioCadastro">

    <h2>:.CADASTRAR CATEGORIA.:</h2>

    <div class="formCadastro">
        <form action="" method="POST">
            <label for="categoria"></label>
            <input type="text" name="categoria" class="txt_field"> </input>*		          
            <input type="submit" name="cadastrarCategoria" value="cadastrar" class="bt_submit"></input>
        </form>
    </div>

    <?php echo isset($mensagem) ? '<div class="mensagem">' . $mensagem . '</div>' : ""; ?>
    <?php echo isset($erro) ? '<div class="erro">' . $erro . '</div>' : ""; ?>
    <div class="obrigatorio">* Campos Obrigatórios</div>
</div>