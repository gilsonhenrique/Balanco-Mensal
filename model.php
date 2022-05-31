<?php
/*
*
*  CONSULTAS AO BANCO DE DADOS
*
*/
function listarMes($mes, $ano, $PDO){
$sql = "SELECT * FROM `balanco` WHERE extract(month from data) = $mes AND extract(year from data) = $ano ORDER BY data ASC";
$statement = $PDO->query($sql);
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
return $result;
}
/*
*  Soma Tudo mês ANTERIOR  = ENTRADA / SAIDA
*/
function somaMesAnteriorStatus($ate_ultimo_dia, $status, $PDO){

$sql = "SELECT SUM(valor) FROM `balanco` WHERE data <= '$ate_ultimo_dia' AND status = $status";
$stmt = $PDO->query($sql);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
return $result;
}
/*
*
*  Soma Tudo mês ATUAL  = ENTRADA / SAIDA
*/
function somaMesAtualStatus($mes, $ano, $status, $PDO){

$sql = "SELECT SUM(valor) FROM `balanco` WHERE extract(month from data) = $mes AND extract(year from data) = $ano AND status = $status";
$stmt = $PDO->query($sql);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
return $result;
}
/*
*
*  ============================================================================
*
*  INSERT, DELETE, UPDATE AO BANCO DE DADOS
*
*/
function cadastrar(){

	if($_GET['status'] == 'ENTRADA'):

		$sql = "INSERT INTO balanco (descricao,data,valor,status) VALUES(:descricao, :data, :valor, :status)";
		$stmt = $PDO->prepare( $sql );
		$stmt->bindParam( ':descricao', $_GET['entrada'] );
		$stmt->bindParam( ':data', $_GET['datamov'] );
		$stmt->bindParam( ':valor', $_GET['valor'] );
		$stmt->bindParam( ':status', $_GET['status'] );

		$result = $stmt->execute();

		if ( ! $result )
		{
			var_dump( $stmt->errorInfo() );
			exit;
		}

		echo $stmt->rowCount() . "linhas inseridas";
		$message = '</div>
		<div class="col-md-6 offset-md-3 alert alert-success" role="alert">
		Cadastro OK, <a href="index.php" class="alert-link">Clique aqui p/</a>cadastrar.
		</div>';
		echo $message;

	elseif($_GET['status'] == 'SAÍDA'):

		$sql = "INSERT INTO balanco (descricao,data,valor,status) VALUES(:descricao, :data, :valor, :status)";
		$stmt = $PDO->prepare( $sql );
		$stmt->bindParam( ':descricao', $_GET['saida'] );
		$stmt->bindParam( ':data', $_GET['datamov'] );
		$stmt->bindParam( ':valor', $_GET['valor'] );
		$stmt->bindParam( ':status', $_GET['status'] );

		$result = $stmt->execute();

		if ( ! $result )
		{
			var_dump( $stmt->errorInfo() );
			exit;
		}

		echo $stmt->rowCount() . "linhas inseridas";
		$message = '</div>
		<div class="col-md-6 offset-md-3 alert alert-success" role="alert">
		Cadastro OK, <a href="index.php" class="alert-link">Clique aqui p/</a>cadastrar.
		</div>';
		echo $message;
	endif;

}

function atualizar($id){
	}

function deletar($id){
	}