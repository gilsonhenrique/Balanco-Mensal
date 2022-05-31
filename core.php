<?php
require_once 'conexao.php';
require_once 'model.php';
//
//----------------   Variáveis
//
$dia = date('d');
$ano = date('Y');
//
$mes_extenso = array(
    '1' => 'Janeiro',
    '2' => 'Fevereiro',
    '3' => 'Março',
    '4' => 'Abril',
    '5' => 'Maio',
    '6' => 'Junho',
    '7' => 'Julho',
    '8' => 'Agosto',
    '9' => 'Setembro',
    '10' => 'Outubro',
    '11' => 'Novembro',
    '12' => 'Dezembro'
    );
//
$mes_relat = $_POST['mes'];
$ano_relat =  $_POST['ano'];
$mes_anterior_rel = '';
$ano_anterior_rel = '';
//
//---------------  Função p/ setar variáveis "mes e ano anterior" do relatório
//
function mesAnoAnterior(int $mes, int $ano)
{
    if ($mes > 1 && $mes <= 12) {
        $mes = $mes - 1;
    }elseif ($mes = 1) {
        $mes = 12;
        $ano = $ano - 1;
    }
    return [$mes, $ano];
}
//
$mes_ano = mesAnoAnterior($mes_relat,$ano_relat);
//
$mes_anterior_rel = $mes_ano[0];//  <==
$ano_anterior_rel = $mes_ano[1];//  <==

//--------------  Setar variável "último dia do mes anterior" do relatório

$ultimo_dia = date("t", mktime(0,0,0,$mes_anterior_rel,'01',$ano_anterior_rel)); // Mágica, plim!
settype($ultimo_dia,'int');
//
//
// -----------------------------------------------------------------------------------------

// Chamar as funções da model 


//  MES Relatório  //

$todos_mes_relat = listarMes($mes_relat, $ano_relat, $PDO);
//var_dump($todos_mes_relat);

$te_atu = somaMesAtualStatus($mes_relat, $ano_relat, "'ENTRADA'", $PDO);
$te_atu = $te_atu[0]['SUM(valor)'];
settype($te_atu,'float');
//var_dump($te_atu);

$ts_atu = somaMesAtualStatus($mes_relat, $ano_relat, "'SAIDA'", $PDO);
$ts_atu = $ts_atu[0]['SUM(valor)'];
settype($ts_atu,'float');
//var_dump($ts_atu);


//  ATÉ ÚLTIMO DIA MES ANTERIOR  //

$data_ultimo_dia_mes_anterior = $ano_anterior_rel.'-'.$mes_anterior_rel.'-'.$ultimo_dia;

$te_ant = somaMesAnteriorStatus($data_ultimo_dia_mes_anterior, "'ENTRADA'", $PDO);
$te_ant = $te_ant[0]['SUM(valor)'];
settype($te_ant,'float');

$ts_ant = somaMesAnteriorStatus($data_ultimo_dia_mes_anterior, "'SAÍDA'", $PDO);
$ts_ant = $ts_ant[0]['SUM(valor)'];
settype($ts_ant,'float');


//  SALDO ANTERIOR

$sd_ant= $te_ant - $ts_ant;

// SALDO ATUAL

$sd_atu= $sd_ant + $te_atu - $ts_atu;

// -------------------------------------------

//  CÁLCULOS  //

$re_de_ant= $te_ant-$ts_ant;//Receitas menos as Despesas do mes anterior(até o último dia do mes)
$re_de= $te_atu-$ts_atu;//Receitas menos as Despesas do mes atual
$sd_anual= $re_de+$re_de_ant;
