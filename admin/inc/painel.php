<?php
session_start();
include_once '../functions/config/config.php';
try{
    carregarIncludes(array("conexao","url","login","categoria","utils","administrador","cliente","pizza","Pager","Jumping"),"admin");
} catch (Exception $e) {
    echo $e->getMessage();
}
verificaLogado('logado_admin');
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

        <title>Painel do Administrador</title>
        <link rel="stylesheet" href="../css/style_painel.css" type="text/css" />
        <script type="text/javascript" src="js/jquery.min"></script>
        <script type="text/javascript" src="../jscripts/tiny_mce/tiny_mce.js"></script>
        <script type="text/javascript" src="../jscripts/tiny_mce/tiny.js"></script>

    </head>
    <body>
        <div id="container">
            <div id="header">
                <div id="logo">Pizzaria da Programação<br />
                    <span id="sublogo">A melhor ....</span>

                </div><!--LOGO -->


                <div id="busca">
                    <form action="" method="POST">

                        <input type="text" name="busca" id="txt_busca"></input>
                        <input type="submit" name="buscar" value="ok" id="bt_busca"></input>

                    </form>
                    <div id="lupa"><img src=""></img></div><!--LUPA-->
                </div><!--BUSCA -->
            </div><!--HEADER -->

            <div id="conteudo">
                <div id="menu_lateral">
                    <ul>
                        <li><a href="?p=cadastrar_pizza" >  Cadastrar Pizza</a></li>
                        <li><a href="?p=cadastrar_categoria"> Cadastrar Categoria</a></li>
                        <li><a href="?p=cadastrar_cliente">  Cadastrar Cliente</a></li>
                        <li><a href="?p=cadastrar_administrador">  Cadastrar Administradors</a></li>
                        

                        <br />
                        <li><a href="?p=alterar_pizza"> Alterar Pizza</a></li>
                        <li><a href="?p=alterar_foto"> Alterar Foto da Pizza</a></li>
                        <li><a href="?p=alterar_categoria"> Alterar Categoria</a></li>
                        <li><a href="?p=alterar_cliente"> Alterar Cliente</a></li>
                        <li><a href="?p=alterar_administrador"> Alterar Administrador</a></li>
                        <br />
                        <li><a href="?p=deletar_pizza"> Detelar Pizza</a></li>
                        <li><a href="?p=deletar_foto"> Deletar Foto da Pizza</a></li>
                        <li><a href="?p=deletar_categoria"> Deletar Categoria</a></li>
                        <li><a href="?p=deletar_cliente"> Deletar Cliente</a></li>
                        <li><a href="?p=deletar_administrador"> Deletar Administrador</a></li>
                        <br />
                        <br />
                        <li><a href=""> Relatório dos Pedidos</a></li>
                        <li><a href=""> Relatório dos Clientes</a></li>
                        <li><a href=""> E-mails Recebidos</a></li>
                        <li><a href=""> Aniversariantes</a></li>
                        <br />

                    </ul>


                </div>

                <div id="conteudo_do_admin">
<?php
if (isset($_GET['p'])):
    try {
        carregaUrls($_GET['p']);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
else:
    include_once "home.php";
endif;
?>

                </div>

            </div>

            <div id="fix"></div>
            <div id="rodape">
                Pizzaria dos Programadores <?php echo date("Y"); ?> Painel Adminstrativo 
            </div><!--RODAPE -->
        </div><!--CONTAINER -->




</html>