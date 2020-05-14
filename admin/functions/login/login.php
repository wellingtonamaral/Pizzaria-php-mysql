<?php
function gravarLogin($administrador){
     /* Altera a data e hora do Localhost */
    date_default_timezone_set('America/Sao_Paulo');
    
    $pdo =  conectar();
    try{
         $gravarLogin = $pdo->prepare("INSERT INTO dados_login_administrador(dados_login_administrador,dados_login_administrador_data) VALUES(:administrador, :data)");
         $gravarLogin->bindValue(":administrador", $administrador);
         $gravarLogin->bindValue(":data", date("Y/m/d h:i:s"));
         $gravarLogin->execute();
         
         //SE CADASTROU NO 'BD' O LOGIN DO ADMINISTRADOR
         if ($gravarLogin->rowCount() == 1):
            return true;
         else:
             return false;
         endif;
         
    } catch (PDOException $e) {
            echo "Erro ao gravar dados no login";
    }
    
}


function gravarDados($arquivo) {
    /* Altera a data e hora do Localhost */
    date_default_timezone_set('America/Sao_Paulo');
    /* Verifica o tipo de arquivo para gravar as mensagens */
    if ($arquivo == "functions/login/sucesso_login.txt"):
        $str = "O Administrador : " . $_SESSION['administrador'] . " logou com sucesso o IP : " . $_SERVER['REMOTE_ADDR'] .
                " na data " .date("d/m/y h:i:s") . "---\n";
                
        else:
           $str = "Erro ao logar com o IP " . $_SERVER['REMOTE_ADDR'].
                " na data " . date("d/m/y h:i:s"). "---\n";
    endif;
    /* Grava os dados em arquivo .txt */
    if (file_exists($arquivo)):
        $file = fopen($arquivo, "a");
        if ($file):
            fputs($file, $str);
        endif;
    endif;
}   

function logar($login, $senha){
   
    $pdo = conectar();
    try{
    $logar = $pdo->prepare("SELECT * FROM administrador WHERE administrador_login = :login AND administrador_senha = :senha");
    $logar->bindValue(":login", $login);
    $logar->bindValue(":senha", $senha);
    $logar->execute();
    $dadosLogin = $logar->fetch(PDO::FETCH_ASSOC);
    
    
    if($logar->rowCount()==1):
        
            //SE LOGOU CRIA AS SESSÕES
        $_SESSION['administrador'] = $dadosLogin['administrador_nome'];
        $_SESSION['administrador_id'] = $dadosLogin['administrador_id'];
        $_SESSION['logado_admin'] = true;
        
        //GRAVA OS DADOS DE 'LOGIN' NO BD.
        if (gravarLogin($dadosLogin['administrador_id'])):
           
        //GRAVA EM UM ARQUIVO 'TXT'
           gravarDados("functions/login/sucesso_login.txt");
        return true;
        endif;
         else: 
             //SENÃO CONSEGUIU LOGAR, GRAVA EM  'TXT' A TENTATIVA DE LOGIN
        gravarDados("functions/login/erro_login.txt");      
        return false;
    endif;
     
    }catch (PDOException $e){
     echo "Erro ao tentar conectar ao sistemas".$e->getMessage();
 }
 }
/*Guia consta na Aula 10,11*/
 
 function verificaLogado($sessao){
     if(!isset($_SESSION[$sessao])):
         header("Location: ../index.php");
     endif;
 } 
 function logOut(){
      
 }
 
 function pegaIdAdministrador($nome = null){
     $pdo =  conectar();
     try{
     $pegaId = $pdo->prepare("SELECT * FROM administrador WHERE administrador_nome = :administrador ");
     $pegaId->bindValue(":administrador", $nome);
     $pegaId->execute();
     $dados = $pegaId->fetch(PDO::FETCH_ASSOC);
     return $dados['administrador_id'];
     } catch (PDOException $e) {
         echo "Erro ao pega ID do ADMINISTRADOR" .$e->getMessage();
     }
 }
 function ultimoLogin($id){
     $pdo =  conectar();
     try{
     $ultimaVisita = $pdo->prepare("SELECT * FROM dados_login_administrador WHERE dados_login_administrador = :dados_login ORDER BY dados_login_administrador_data DESC Limit 1,1");
     $ultimaVisita->bindValue(":dados_login", $id);
     $ultimaVisita->execute();
     $dados = $ultimaVisita->fetch(PDO::FETCH_ASSOC);
     return $dados['dados_login_administrador_data'];
     } catch (PDOException $e) {
         echo "Erro ao pega ID do cliente" .$e->getMessage();
     }
 
 }
 