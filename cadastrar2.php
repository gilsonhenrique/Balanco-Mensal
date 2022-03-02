<?php
require_once 'conexao.php';
?>
<!DOCTYPE html>
<html lang = "pt-br">
<head>
	<title>IGREJA ABCD</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- style.css -->
	<link rel="stylesheet" type="text/css" href="estilo/style.css">

	<title>Balanço Mensal</title>
</head>
<body>

	<div class= "container justify-content-center" id="vertical-center">
		<?php

		if($_POST['status'] == 'ENTRADA'):
			$descricao = $_POST['entrada'];

			if(isset($_POST['complemento'])):
				$descricao = $_POST['entrada'] .' '. $_POST['complemento'];
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