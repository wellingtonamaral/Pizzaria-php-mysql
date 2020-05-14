<div class="formularioCadastroMedio">

<h2>:.CADASTRAR CLIENTE.:</h2>

<div class="formCadastroMedio">
	<form action="" method="POST">
		
            <label  for="nome">Nome:</label>
            <input class="teste" type="text"  name="nome" value="Nome Completo" onfocus="this.value=''">Informe o Nome Completo                       
            <br>
            <label  for="cidade">Cidade: </label>
            <input class="teste" type="text" name="cidade" value="Cidade"onfocus="this.value=''">Informe a cidade
            <br>
            <label for="estado">Estado: </label>
            <input class="teste" type="text" name="estado" value="Estado"onfocus="this.value=''">Informe o estado
            <br>
            <label  for="bairro">Bairro: </label>
            <input class="teste" type="text"  name="bairro" value="Bairro"onfocus="this.value=''">Informe o bairro
            <br>
            <label for="cep">Cep: </label>
            <input class="teste" type="text"  name="cep" value="Cep"onfocus="this.value=''">Informe o CEP
            <br>
            <label for="telefone">Telefone: </label>
            <input class="teste" type="text"  name="telefone" value="Telefone"onfocus="this.value=''">Telefone (XX) XXXX-XXXX
            <br>
            <label  for="celular">Celular: </label>
            <input class="teste" type="text"  name="celular" value="Celular"onfocus="this.value=''">Celular (XX) XXXXX-XXXX
            <br>
            <label  for="endereco">Endereço: </label>
            <input class="teste" type="text"  name="endereco" value="Endereço"onfocus="this.value=''">Informe o endereço
            <br>
            <label  for="login">Login: </label>
            <input class="teste" type="text"  name="login" value="Login"onfocus="this.value=''">Login 
            <br>
            <label for="senha" >Senha: </label>
            <input class="teste" type="password"  name="senha" value="Senha" onfocus="this.value=''">Senha minímo 6 dígitos
            <br>
              
                
		<label for="submit"></label>
                
                <input type="submit" name="cadastrarCliente" value="cadastrar" class="bt_submit"></input>
                <input type="submit" name="limpaCampos" value="Limpar Formulario" class="bt_submit"></input>
	</form>
    
</div>


<?php echo isset($messagem) ? '<div class="mensagem">' .$messagem.'</div>' : ""; ?>
<?php echo isset($erro) ? '<div class="erro">' .$erro.'</div>' : ""; ?>

</div>