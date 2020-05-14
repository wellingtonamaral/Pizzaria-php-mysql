<h2> Pagina Inicial do sistema administrativo</h2>
<div id="bemvindo">


<p>
    <?php 
     $id = pegaIdAdministrador($_SESSION['administrador']);
    
     
    ?>
    
    Bem Vindo <?php echo $_SESSION['administrador'];?>,seu último acesso foi :
   <span id="ultimoLogin">
 <?php 
    $dataLogin = ultimoLogin($id);
    if(empty($dataLogin)):
        echo "Essa é seu primeiro login";
        else:
        
        echo  date("d/m/Y h:i:s" , strtotime(ultimoLogin($id))); 
    
    endif;
    
     ?>
    
</p>
   </span>
</div>
     