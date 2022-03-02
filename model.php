<?php
require_once 'conexao.php';
/*
*   Definição/Ajuste na data o relatório
*/
$mes_atual = $_POST['mes'];
$ano_atual =  $_POST['ano'];
$mes_anterior_rel = '';
$ano_anterior_rel = '';
/*
*
* Função p/ setar "mes anterior / ano anterior" do relatório
*/
function mesAnoAnterior($mes,$ano)
{
	if ($mes > 1 && $mes <= 12) {
		$mes = $mes - 1;
		settype($ano, "int");
	}elseif ($mes = 1) {
		$mes = 12;
		$ano = $ano - 1;
	}
	return [$mes, $ano];
}

$mes_ano= mesAnoAnterior($mes_atual,$ano_atual);
$mes_anterior_rel = $mes_ano[0];
$ano_anterior_rel = $mes_ano[1];
/*
*
* Definir o último dia do mes anterior
*/
$ultimo_dia = date("t", mktime(0,0,0,$mes_anterior_rel,'01',$ano_anterior_rel)); // Mágica, plim!
/*
*
*  CONSULTAS AO BANCO DE DADOS
*
*  Listar Tudo mês ANTERIOR
*/
$sql = "SELECT * FROM `balanco` WHERE month(data) = $mes_anterior_rel ORDER BY data ASC";
$statement = $PDO->query($sql);
$todos_ant = $statement->fetchAll(PDO::FETCH_ASSOC);
/*
*  Listar Tudo mês ANTERIOR  = ENTRADA
*/
$sql = "SELECT SUM(valor) FROM `balanco` WHERE data <= '$ano_anterior_rel-$mes_anterior_rel-$ultimo_dia' AND status = 'ENTRADA'";
$stmt = $PDO->query($sql);
$te_ant = $stmt->fetchAll(PDO::FETCH_ASSOC);
/*
*  Listar Tudo mês ANTERIOR  = SAIDA
*/
$sql = "SELECT SUM(valor) FROM `balanco` WHERE data <= '$ano_anterior_rel-$mes_anterior_rel-$ultimo_dia' AND status = 'SAIDA'";
$stmt = $PDO->query($sql);
$ts_ant = $stmt->fetchAll(PDO::FETCH_ASSOC);
/*
*  Listar Tudo mês ATUAL
*/
$sql = "SELECT * FROM `balanco` WHERE extract(month from data) = $mes_atual AND extract(year from data) = $ano_atual ORDER BY data ASC";
$statement = $PDO->query($sql);
$todos_atual = $statement->fetchAll(PDO::FETCH_ASSOC);
/*
*  Listar Tudo mês ATUAL = ENTRADA
*/
$sql = "SELECT SUM(valor) FROM `balanco` WHERE extract(month from data) = $mes_atual AND extract(year from data) = $ano_atual AND status = 'ENTRADA'";
$stmt = $PDO->query($sql);
$te_atu = $stmt->fetchAll(PDO::FETCH_ASSOC);
/*
*  Listar Tudo mês ATUAL = SAIDA
*/
$sql = "SELECT SUM(valor) FROM `balanco` WHERE extract(month from data) = $mes_atual AND extract(year from data) = $ano_atual AND status = 'SAIDA'";
$stmt = $PDO->query($sql);
$ts_atu = $stmt->fetchAll(PDO::FETCH_ASSOC);
/*
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