<?php

function gravarLogin($cliente) {
    /* Altera a data e hora do Localhost */
    date_default_timezone_set('America/Sao_Paulo');
    $pdo = conectar();
    try {
        
        $gravarLogin = $pdo->prepare("INSERT INTO dados_login (dados_login_cliente, dados_login_data) VALUES (:cliente, :data)");
        $gravarLogin->bindValue(":cliente", $cliente);
        $gravarLogin->bindValue(":data", date("Y/m/d h:i:s"));
        $gravarLogin->execute();
        //Se cadastrou no banco o login do Administrador
        if ($gravarLogin->rowCount() == 1):
            return true;
        else:
            return false;
        endif;
    } catch (PDOException $e) {
        echo "MES" . $e->getMessage();
    }
}

function gravarDados($arquivo) {
    /* Altera a data e hora do Localhost */
    date_default_timezone_set('America/Sao_Paulo');
    /* Verifica o tipo de arquivo para gravar as mensagens */
    if ($arquivo == "functions/login/sucesso_login.txt"):
        $str = "O Administrador " . $_SESSION['cliente'] . " logou com sucesso o IP" . $_SERVER['REMOTE_ADDR'] .
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

function logar($login, $senha) {
    $pdo = conectar();
    try {
        $logar = $pdo->prepare("SELECT * FROM clientes WHERE cliente_login = :login AND cliente_senha = :senha LIMIT 1");
        $logar->bindValue(":login", $login);
        $logar->bindValue(":senha", $senha);
        $logar->execute();
        $dadosLogin = $logar->fetch(PDO::FETCH_ASSOC);

        if ($logar->rowCount() == 1):
            //Se logou cria a Sessão
            $_SESSION['cliente'] = $dadosLogin['cliente_nome'];
            $_SESSION['logado_admin'] = true;

            //Grava no banco de dados
            if (gravarLogin($dadosLogin['cliente_id'])):
                //Grava em arquivo .txt                
                gravarDados("functions/login/sucesso_login.txt");
                return true;
            endif;
        else:
            //Se não logou grava em arquivo .txt
            gravarDados("functions/login/erro_login.txt");
            return false;
        endif;
    } catch (PDOException $e) {
        echo "ERRO" . $e->getMessage();
    }
}
    
function verificaLogado($sessao){
    if(!isset($_SESSION[$sessao])):
        header("Location: ../index.php");
    endif;
    
}