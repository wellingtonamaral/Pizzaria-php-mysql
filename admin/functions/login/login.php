<?php

function logar($login, $senha){
 $pdo = conectar();
 try{
 $logar = $pdo->prepare("SELECT * FROM clientes WHERE cliente_login = :login AND cliente_senha = :senha");
    $logar->bindValue(":login", $login);
    $logar->bindValue(":senha", $senha);
    $logar->execute();
    
    $dadosLogin = $logar->fetch(PDO::FETCH_ASSOC);
    
 if($logar->rowCount()==1):
     $_SESSION['cliente'] = $dadosLogin['cliente_nome'];
     $_SESSION['logado_admin'] = true;
    return true;
else:
       return false;
endif;
 
 } catch (PDOException $e){
     echo "Erro ao tentar logar no sistema! ".$e->getMessage();
 }
}
