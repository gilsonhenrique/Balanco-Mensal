<?php
require_once 'conexao.php';
/*

RUIM  =>  Mistura a tela de retorno com a Model


*/
?>
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
	<div class= "container" id="vertical-center">
<?php

if($_POST['status'] == 'ENTRADA'):
	$descricao = $_POST['entrada'];
	
	if(isset($_POST['complemento'])):
	$descricao = $_POST['entrada'] .' '. $_POST['complemento'];
	endif;

			$sql = "INSERT INTO balanco (descricao,data,valor,status) VALUES(:descricao, :data, :valor, :status)";
			$stmt = $PDO->prepare( $sql );
			$stmt->bindParam( ':descricao', $descricao );
			//$stmt->bindParam( ':descricao', $_POST['entrada'] );
			$stmt->bindParam( ':data', $_POST['datamov'] );
			$stmt->bindParam( ':valor', $_POST['valor'] );
			$stmt->bindParam( ':status', $_POST['status'] );

				$result = $stmt->execute();

				if ( ! $result )
				{
					//echo $message;
					var_dump( $stmt->errorInfo() );
					exit;
				}
 ?>
 <div class="col-md-6 offset-md-3 text-center mb-5" role="alert">
 	<h4>Cadastro ok,  <a href="cadastrar.php" class="alert-link">Retornar </a></h4>
 </div>

 	<div class="col-md-6 offset-md-3 text-white bg-success text-center mt-5">
 		<div class="card-header"><?=$_POST['status'] . '<br>'. $descricao?></div>
 		<div class="card-body">
 			<p class="card-text">Data: <?= date('d/m/Y', strtotime($_POST['datamov'])) ?></p><!--Data formatada d/m/y-->
 			<p class="card-text"><?='R$ '.number_format($_POST['valor'], 2 , ",", ".")?></p><!--Moeda formatada R$-->
 		</div>
 	</div>


<?php

elseif($_POST['status'] == 'SAÍDA'):
	$descricao = $_POST['saida'];

	if(isset($_POST['complemento'])):
	$descricao = $_POST['saida'] .' '. $_POST['complemento'];
	endif;	

				$sql = "INSERT INTO balanco (descricao,data,valor,status) VALUES(:descricao, :data, :valor, :status)";
				$stmt = $PDO->prepare( $sql );
				$stmt->bindParam( ':descricao', $descricao );
				$stmt->bindParam( ':data', $_POST['datamov'] );
				$stmt->bindParam( ':valor', $_POST['valor'] );
				$stmt->bindParam( ':status', $_POST['status'] );

				$result = $stmt->execute();

				if ( ! $result )
				{
					var_dump( $stmt->errorInfo() );
					exit;
				}
?>
 <div class="col-md-6 offset-md-3 text-center mb-5" role="alert">
 	<h4>Cadastro ok,  <a href="cadastrar.php" class="alert-link">Retornar </a></h4>
 </div>

 	<div class="col-md-6 offset-md-3 text-white bg-success text-center mt-5">
 		<div class="card-header"><?=$_POST['status'] . '<br>'. $descricao?></div>
 		<div class="card-body">
 			<p class="card-text">Data: <?= date('d/m/Y', strtotime($_POST['datamov'])) ?></p><!--Data formatada d/m/y-->
 			<p class="card-text"><?='R$ '.number_format($_POST['valor'], 2 , ",", ".")?></p><!--Moeda formatada R$-->
 		</div>
 	</div>

<?php endif;?>
</div>
</body>
</html>