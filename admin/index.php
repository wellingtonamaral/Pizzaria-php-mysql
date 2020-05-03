<?php

session_start();
include_once './functions/config/config.php';
try{
    carregarIncludes(array("conexao","login"),"login");
} catch (Exception $e) {
    echo $e->getMessage();

}



if ($_SERVER['REQUEST_METHOD'] == 'POST'):
    if(isset($_POST['logar'])):
            $login = addslashes($_POST['login']);
            $senha = addslashes($_POST['senha']);
           
           if(logar($login,$senha)):
           header("Location: inc/painel.php");
           else: 
               $erro = "Usuário ou Senha Inválidos !";
           endif;
        endif;
    endif;
    
    
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" href="css/style_login.css" type="text/css" />
        <title>
                  Administrador - Pizzaria
        </title>
    <body>
        
        <div id="container">
            <div id="login"> 
            <div id="titulo">Acesso do Administrador
            </div><!--TITULO-->
            
            
            <div id="conteudo_login">
            <div id="cadeado"> 
                <img src="../src/assets/img/cadeado_2.png" title="login" alt="Login Administrador"/>
             </div><!--CADEADO--> 
             
             
             <div id="form_login">
                 <form action="" method="POST">
                     <label for="login_nome">Login:</label>
                     <input type="text" name="login" class="input_text_login"></input>
                     
                     <label for="senha">Senha:</label>
                     <input type="password" name="senha" class="input_text_login"></input>
                     <input type="submit" name="logar" value="" id="botao_logar" />
                 </form>
              </div><!--FORM DO LOGIN-->
              
                    
             <div id="fix"></div>
            </div><!--CONTEUDO LOGIN-->
            </div><!--LOGIN-->
            <div class="erro">
                <?php
                if(isset($erro)):
                    if(!empty($erro)):
                        echo $erro;
                    endif;
                endif;
                ?>
            </div>
            </div><!--CONTAINER-->
    </body>  
</head> 
</html>
