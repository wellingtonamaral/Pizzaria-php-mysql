<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="src/css/style.css" type="text/css" />
        
        <title></title>
    </head>
    <body>
         <div id="container">
            <div id="header">
                <div id="logo"><img src="src/assets/img/logo.png" title="Pizzaria da Net" alt="logo pizzaria da net"></div><!--LOGO-->
                 <div id="busca">
                     <form action="" method="POST"></form>
                     <!--<label for="busca">Busca:</label>-->
                     <input type="text" name="bucar_pizza" value="Busca..." id="txt_busca"/>
                     <select name="categorias"id="select_busca">
                         <option selected="selected">Escolha uma categoria</option>
                         <input type="submit" name="buscar_pizza_categoria" value=OK id="button_ok"/>
                 </div><!--BUSCA-->
            </div><!--HEADER-->
            <div id="menu">
                <ul>
                    <li><a href="">Home</li>
                     <li><a href="">A Empresa</a></li>
                      <li><a href="">Meus Pedidos</a></li>
                       <li><a href="">Cadastro</a></li>
                        <li><a href="">Contato</a></li>
                         <li><a href="">Pizzas</a></li>
                         <li><a href="admin/index.php">Login</a></li>
                </ul>
            </div><!--MENU-->
        <div id="mensagem_logado">Seja bem vindo visitante</div><!--MENSAGEM LOGADO-->
            
            <div id="conteudo">
             <div id="destaques_semana">destaque semana</div><!--DESTAQUeS SEMANA-->
             <div id="pizzas_amostra">destaques semana</div><!--PIZZA AMOSTRA-->
             <div id="fix"></div><!--FIX-->
            </div><!--CONTEUDO-->
            
            
                
             
             
             
            <div id="footer">Pizzaria ™ <?php echo date("Y"); ?> - Todos direitos reservados</div><!--RODAPE-->
            
        </div><!--CONTAINER-->

    </body>
</html>
