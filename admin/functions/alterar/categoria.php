<?php
function alterarCategoria ($categoria, $id){
    $pdo = conectar();
    try{
        $alterarCatego = $pdo->prepare("UPDATE categorias SET categoria_nome = :nome WHERE categoria_id = :id");
        

        $alterarCatego->bindValue(":nome", $categoria);
        $alterarCatego->bindValue(":id", $id);
        $alterarCatego->execute();
        
        if($alterarCatego->rowCount ()== 1):
            return true;
        else:
            return false;
        endif;
        
    } catch (PDOException $e) {
        echo "Erro: ".$e->getMessage();
    }
    
}

?>
