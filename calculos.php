<?php
require_once 'model.php';

$mes = $mes_atual;
$dia = date('d');
$ano = date('Y');

// conversão mes string
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

//  MES ANTERIOR  //

$te_ant= $te_ant[0]['SUM(valor)'];
settype($te_ant,'float');

$ts_ant= $ts_ant[0]['SUM(valor)'];
settype($ts_ant,'float');


//  SALDO ANTERIOR

$sd_ant= $te_ant - $ts_ant;

// -------------------------------------------

//  MES ATUAL  //

$te_atu= $te_atu[0]['SUM(valor)'];
settype($te_atu,'float');
//var_dump($te_atu);

$ts_atu= $ts_atu[0]['SUM(valor)'];
settype($ts_atu,'float');
//var_dump($ts_atu);

//saldo atual
$sd_atu= $sd_ant + $te_atu - $ts_atu;

// -------------------------------------------

//  CÁLCULOS  //

$re_de_ant= $te_ant-$ts_ant;//Receitas menos as Despesas do mes anterior(até o último dia do mes)
$re_de= $te_atu-$ts_atu;//Receitas menos as Despesas do mes atual
$sd_anual= $re_de+$re_de_ant;
//$ts_atu = (float) $ts_atu;
//$ts_atu = number_format($ts_atu, 2 , ",", ".");




