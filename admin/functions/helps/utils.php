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
    
    global$obrigatorio;
    
    if($campo !== null):
        if(empty($campo)):
            $obrigatorio = "O campo $nomeCampo é obrigatorio";
        return false;
            else:
                return $campo;
        endif;
    endif;
}
function validarCep($cep){
    
    global $validou;
    if(preg_match("/^\d{5}-\d{3}$/i", $cep)):
        return true;
        else:
        $validou = "O Formato do CEP, não foi aceito";
    endif;
}

function  validarTelefone($telefone){
    global $validou;
    
    if(preg_match("/^[(]\d{2}[)]\d{4}-\d{4}$/i", $telefone)):
        return true;
        else:
        $validou = "O formato do telefone não foi aceito";
    endif;
    
}
function  validarCelular($celular){
    global $validou;
    
    if(preg_match("/^[(]\d{2}[)]\d{5}-\d{4}$/i", $celular)):
        return true;
        else:
        $validou = "O formato do celular não foi aceito";
    endif;
    
}