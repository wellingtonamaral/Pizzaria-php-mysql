<?php

function verificaCadastro($tabela, $nomeCampo, $cadastro){
 
      
 $pdo = conectar();
 try{
     
 $verificaCadastro = $pdo->prepare("SELECT * FROM $tabela WHERE $nomeCampo = :cadastro ");
  $verificaCadastro->bindValue(":cadastro", $cadastro);
 $verificaCadastro->execute();
 
 if($verificaCadastro->rowCount() == 1):
     return false;
     else:
     return true;
 endif;
 }
 catch (PDOException $e){
     echo "Erro ao verificar registro cadastrado !" .$e->getMessage();
 }
   
}

function pegaId(){
    
}
function verificaCampoDigitado(){
    
}

function obrigatorio($nomeCampo, $campo = null){
    $obrigatorio = array();
    global$obrigatorio;
    
    if($campo !== null):
        if(empty($campo)):
            $obrigatorio[] = "O campo $nomeCampo é obrigatorio";
        return false;
            else:
                return $campo;
        endif;
    endif;
}