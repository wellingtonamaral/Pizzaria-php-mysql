<?php
require_once "../biblioteca/lib/WideImage.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['cadastrarPizza'])):

    $categoriaPizza = obrigatorio("categoria", $_POST['categoria']);
    $nomePizza = obrigatorio("nome", $_POST['nome']);
    $precoPizza = obrigatorio("preço", $_POST['preco']);
    $fotoPizza = obrigatorio("foto", $_FILES['foto_pizza']['name']);
    $descricaoPizza = obrigatorio("descricao", $_POST['descricao']);

    criaSessao("nomePizza", $nomePizza);
    criaSessao("precoPizza", $precoPizza);
    criaSessao("descricaoPizza", $descricaoPizza);

    global $obrigatorio;
    if (empty($obrigatorio)):

        $foto = $_FILES['foto_pizza']['name'];
        $temp = $_FILES['foto_pizza']['tmp_name'];
        try {
            $fotos = WideImage::load($temp);
            $redimensionar = $fotos->resize(105, 80, "fill");
            $redimensionar->saveToFile("../fotos/" . $foto);

            if ($redimensionar->isValid()):
                $redimensionar = $fotos->resize(525, 525, "fill");
                $redimensionar->saveToFile("../detalhes/" . $foto);

                if (verificaCadastro("pizzas", "pizza_nome", $_POST['nome'])):


                    if (cadastrarPizza($dadosPizza = array(
                                "categoria" => $_POST['categoria'],
                                "nome" => $_POST['nome'],
                                "preco" => $_POST['preco'],
                                "descricao" => $_POST['descricao'],
                                "fotoInicio" => "fotos/" . $foto,
                                "fotoDetalhes" => "detalhes/" . $foto
                            ))):
                        $mensagem = "";
                        $mensagem = "Pizza cadastrada com sucesso !";
                    else:
                        $erro = "Erro ao cadastrar Pizza !";
                    endif;
                    else:
                     $erro = "Já existe uma pizza cadastrada com ess nome !";   
                endif;




            else:
                throw new Exception("Não foi possivél redimensionar a foto");
            endif;
        } catch (WideImage_InvalidImageSourceException $e) {
            echo "Erro :" . $e->getMessage();
        }



    else:
        $erro = $obrigatorio;
    endif;

endif;
?>
<div class="formularioCadastroMedio">

    <h2>:.CADASTRAR PIZZA.:</h2>

    <div class="formCadastroMedio">
        <form action="" method="POST" enctype="multipart/form-data">

            <select name="categoria" >

                <?php
                $dados = listar("categorias");
                if ($dados):
                    ?>
                    <option value="" selected="selected"> Escolha uma categoria </option>

                    <?php
                    foreach ($dados as $d):
                        ?>
                        <option value="<?php echo $d['categoria_id']; ?>"><?php echo $d['categoria_nome']; ?></option>
                        <?php
                    endforeach;
                else:
                    ?>
                    <option value="" selected="selected"> Nenhuma categoria cadastrada </option>
                <?php
                endif;
                ?>                                         

            </select>


            <input class="formPizza" type="nome"  name="nome" value="<?php echo isset($_SESSION['nomePizza']) ? $_SESSION['nomePizza']: ""; ?>" placeholder="Categoria da Pizza" max="44" />Informe a Categoria                       
            <br>

            <input class="formPizza" type="text" name="preco" value="<?php echo isset($_SESSION['precoPizza']) ? $_SESSION['precoPizza']: ""; ?>" placeholder="Preço da Pizza">Preço da Pizza
            <br>

            <input class="formPizza" type="file" style="color: blue;" name="foto_pizza" value="" accept="image/png, image/jpeg">Imagem da Pizza
            <br>

            <textarea class="formPizza" name="descricao" value="<?php echo isset($_SESSION['descricaoPizza']) ? $_SESSION['descricaoPizza']: ""; ?>" placeholder="Descrição da pizza, como peso, ingredientes..." cols="5" rows="6" maxlength="220"></textarea>
            <br />


            <div class="container-contact100-form-btn" style="margin-top: 70px; width: 105%;">
                <button class="contact100-form-btn" name="cadastrarPizza">Cadastrar</button>
                <button name="limparCampos" class="contact100-form-btn" >Limpar</button>

            </div>

        </form>

    </div>
    <?php echo isset($mensagem) ? '<div class="mensagem">' . $mensagem . '</div>' : ""; ?>
    <?php echo isset($erro) ? '<div class="erro">' . $erro . '</div>' : ""; ?>


</div>