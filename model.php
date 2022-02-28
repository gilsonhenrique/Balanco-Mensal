<?php
require_once 'conexao.php';
//require_once 'index.php';
require_once 'calculos.php';
//
/////////  RELATORIOS ////////////

$mes_atual = $_POST['mes'];
//
//
//
function mesAnterior($mes)
{
	if ($mes > 1 & $mes <= 12) {
	 $mes_anterior = $mes - 1;
	}elseif ($mes = 1) {
	 $mes_anterior = 12;
	}

	return $mes_anterior;
}

$mes_anterior= mesAnterior($mes_atual);
//
//
$ano_atual =  $_POST['ano'];
//
// função último dia do mes anterior    Prencha Aqui Ano //     <=====================
$ultimo_dia = date("t", mktime(0,0,0,$mes_anterior,'01',$ano_atual)); // Mágica, plim!
//
//

//  Mes ANTERIOR //
// Total do MES
$sql = "SELECT * FROM `balanco` WHERE month(data) = $mes_anterior ORDER BY data ASC";
$statement = $PDO->query($sql);
$todos_ant = $statement->fetchAll(PDO::FETCH_ASSOC);
//
// Total do mes ENTRADA  // Preencha o ano aqui   <=====================
$sql = "SELECT SUM(valor) FROM `balanco` WHERE data <= '2021-$mes_anterior-$ultimo_dia' AND status = 'ENTRADA'";
$stmt = $PDO->query($sql);
$te_ant = $stmt->fetchAll(PDO::FETCH_ASSOC);
//
// Total do mes SAIDA   // Preencha o ano aqui   <=====================
$sql = "SELECT SUM(valor) FROM `balanco` WHERE data <= '2021-$mes_anterior-$ultimo_dia' AND status = 'SAIDA'";
$stmt = $PDO->query($sql);
$ts_ant = $stmt->fetchAll(PDO::FETCH_ASSOC);
//
//
//
//  Mes ATUAL  //
//Total do MES
$sql = "SELECT * FROM `balanco` WHERE extract(month from data) = $mes_atual ORDER BY data ASC";
$statement = $PDO->query($sql);
$todos_atual = $statement->fetchAll(PDO::FETCH_ASSOC);

//Total do mes ENTRADA
$sql = "SELECT SUM(valor) FROM `balanco` WHERE extract(month from data) = $mes_atual AND status = 'ENTRADA'";
$stmt = $PDO->query($sql);
$te_atu = $stmt->fetchAll(PDO::FETCH_ASSOC);

//Total do mes SAIDA
$sql = "SELECT SUM(valor) FROM `balanco` WHERE extract(month from data) = $mes_atual AND status = 'SAIDA'";
$stmt = $PDO->query($sql);
$ts_atu = $stmt->fetchAll(PDO::FETCH_ASSOC);
//
//
//
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