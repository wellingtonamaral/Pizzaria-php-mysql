<h2> Pagina Inicial do sistema administrativo</h2>
<div id="bemvindo">


<p>
    <?php 
     $id = pegaIdCliente($_SESSION['cliente']);
    
     
    ?>
    
    Bem Vindo <?php echo $_SESSION['cliente'];?>,seu último acesso foi :
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
     