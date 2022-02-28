<!DOCTYPE html>
<html lang = "pt-br">
<head>
	<title>IGREJA ABCD</title>
	<meta charset="utf-8">
    
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="estilo/style.css">
</head>

<body>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<div class= "container justify-content-center" id="vertical-center">

<!-- ---------------------------------Formulário POST p/ mesma página---------------------------------  -->
<form  method="POST" action="cadastrar2.php">

  <div class="col-md-6 offset-md-3 mb-5">
  <h1 align="center">Formulário de Cadastro</h1>
  </div>

  <div class="col-md-4 offset-md-4 mt-3">
  <label for="datamov" class="form-label">Data:</label>
  <input type="date" class="form-control" id="datamov" name="datamov" value= "<?php if(isset($_POST['datamov'])){ echo $_POST['datamov'];}?>">
  </div>
  <div class="col-md-4 offset-md-4 mt-3">
  <label class="form-label">Tipo:</label>
  <div class="form-check">
  <input class="form-check-input" type="radio" id="entrada" name="status" value="ENTRADA" <?php if(isset($_POST['status']) && $_POST['status'] == 'ENTRADA'): echo 'checked'; else: echo 'disabled'; endif;?>>
  <label class="form-check-label" for="entrada">Entrada</label>
  </div>
  </div>

  <div class="col-md-4 offset-md-4 mt-3">
  <div class="form-check">
  <input class="form-check-input" type="radio" id="saida" name="status" value="SAÍDA" <?php if(isset($_POST['status']) && $_POST['status'] == 'SAÍDA'): echo 'checked'; else: echo 'disabled';endif;?>>
  <label class="form-check-label" for="saida">Saída</label>
  </div>
  </div>
<!-- ---------------------------------------------------------------------------------- -->

<?php if(isset($_POST['status']) && $_POST['status'] == 'ENTRADA'): ?>

 									<div class="col-md-4 offset-md-4 mt-3">
									<label for="entrada" class="form-label">Entrada:</label>
									<select class="form-select form-select" name="entrada" id="entrada"required>
										<option value=""><?php if(isset($_POST['entrada'])): echo $_POST['entrada']; else: echo "--Selecione o tipo de entrada--"; endif;?></option>
										<option value="Oferta">Oferta</option>
										<option value="Escola Dominical">Escola Domical</option>
										<option value="Dízimo">Dízimo</option>
										<option value="Consagração">Consagração</option>
										<option value="Cantina">Cantina</option>
										<option value="Oferta especial">Oferta Especial</option>
										<option value="Saldo Atual">Saldo Atual</option>	
									</select>
								  </div>

									<div class="col-md-4 offset-md-4 mt-3">
										<label for="datamov" class="form-label">Complemento:</label>
										<input type="text" class="form-control" id="complemento" name="complemento" value= "<?php if(isset($_POST['complemento'])){ echo $_POST['complemento'];}?>">
									</div>

  								<div class="col-md-4 offset-md-4 mt-3">
								   <div class="input-group mb-3">
 									 <span class="input-group-text">R$</span>
 								  <input type="number" step="0.01" name="valor" min="0.01" class="form-control" aria-label="Real (com ponto e duas casas decimais)" value="<?php if(isset($_POST['valor'])){ echo $_POST['valor'];}?>"required>
								</div>

<?php endif; ?>

<!-- ---------------------------------------------------------------------------- -->							

<?php if(isset($_POST['status']) && $_POST['status'] == 'SAÍDA'): ?>

 									<div class="col-md-4 offset-md-4 mt-3 mb-3">
									<label for="saida" class="form-label">Saída:</label>
									<select class="form-select form-select" name="saida" id="saida"required>
										<option value=""><?php if(isset($_POST['saida'])): echo $_POST['saida']; else: echo "--Selecione o tipo de saida--"; endif;?></option>
										<option value="Aluguel:">Aluguel:</option>	
										<option value="Plano de Saúde">Plano de Saúde Pastoral</option>
										<option value="Materiais:">Materiais:</option>		
										<option value="Conserto/Reparo:">Conserto/Reparo:</option>
										<option value="Doações">Doações</option>
										<option value="Encargos Sociais:">Encargos Sociais:</option>
										<option value="Contas Diversas:">Contas Diversas:</option>
										<option value="Oferta p/:">Oferta p/:</option>
										<option value="Serviços:">Serviços:</option>										
										<option value="Repasse p/ Sociedade/Departamento:">Repasse p/ Sociedade/Departamento:</option>
										<option value="Subsídio Pastoral">Subsídio Pastoral</option>
									</select>
									</div>
									<div class="col-md-4 offset-md-4 mt-3">
										<label for="datamov" class="form-label">Complemento:</label>
										<input type="text" class="form-control" id="complemento" name="complemento" value= "<?php if(isset($_POST['complemento'])){ echo $_POST['complemento'];}?>">
									</div>

								<div class="col-md-4 offset-md-4 mt-3">
								<div class="input-group mb-3">
 								<span class="input-group-text">R$</span>
								<input type="number" step="0.01" name="valor" min="0.01" class="form-control" aria-label="Real (com ponto e duas casas decimais)" value="<?php if(isset($_POST['valor'])){ echo $_POST['valor'];}?>"required>
								</div>
								
<?php endif;?>

 <div class="row mt-4">
 	<div class="col">
<input type="submit" value="Cadastrar" class="btn btn-primary">
</div>
 <div class="col text-end">
 	<a href="cadastrar.php" class="link-secondary mt-5">Retornar</a>
 </div>
</div>

</form>

</div>	
</body>
</html>