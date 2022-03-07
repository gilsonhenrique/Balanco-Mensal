<?php
require_once 'calculos.php';
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

<body>
<div>
<nav class="navbar fixed-top navbar-light bg-light p-3" style="background-color: #e5e5e5;">
   <div class= "container">
    <div class="col-md-6 text-center">
      <a href="index.php" class="btn btn-primary btn-lg">Início</a>
    </div>
        <div class="col-md-6 text-center">
      <a href="listar.php" class="btn btn-primary btn-lg">Relatório</a>
    </div>
  </div>
</nav>
</div>
<div class="table-responsive">
<h2 align="center">IGREJA ABCD</h2>
<h2 align="center">Setor de Contas - Relatório Mensal - <?=$mes_extenso["$mes"] ."/" . $ano_atual?></h2> 
<table class="table table-striped mt-5">
  <thead class="table-active">
    <tr>
      <th style="text-align: center">Data</th>
      <th>Descrição</th>
      <th style="text-align: end">Receitas</th>
      <th style="text-align: end">Despesas</th>
    </tr>
  </thead>

  <tbody>
    <?php
//Utilizando a classe que formata números p/ R$  
    $formatter = new NumberFormatter('pt_BR',  NumberFormatter::CURRENCY);
    foreach ($todos_atual as $row)  : ?>
    <tr>
      <td style="text-align: center"><?= date('d/m/Y', strtotime($row['data']))?></td>
      <td><?= $row['descricao']?></td>
<!--Exibir Receitas -->
      <td style="text-align: end"><?php 
            if($row['status'] == 'ENTRADA'):
              echo $formatter->formatCurrency($row['valor'], 'BRL');
              //echo 'R$ '. number_format($row['valor'], 2 , ",", ".");
            else:
              echo '----------';
            endif;?>
      </td>
<!--Exibir Despesas -->
      <td style="text-align: end"><?php
            if($row['status'] == 'SAÍDA'):
              echo 'R$ '.number_format($row['valor'], 2 , ",", ".");
            else:
              echo '----------';
            endif;?>
      </td>
    </tr>
    <?php endforeach?>
</tbody>

<tfoot>
  <tr>
      <th></th>
      <th></th>
      <th style="text-align: end">Total Receitas:</th>
      <th style="text-align: end">Total Depesas:</th>      
  </tr>
  <tr>
      <th></th>
      <th></th>
      <td style="text-align: end"><?='R$ '.number_format($te_atu, 2 , ",", ".")?></td>
      <td style="text-align: end"><?='R$ '.number_format($ts_atu, 2 , ",", ".")?></td>
  </tr>
  <tr>
<!-- SALDO DO ÚLTIMO DIA DO MES ANTERIOR -->
    <th style="text-align: end">Saldo em: <?=$ultimo_dia."/".$mes_anterior_rel?></th>
  </tr>
  <tr>
    <td style="text-align: end"><?='R$ '.number_format($re_de_ant, 2 , ",", ".")?></td>
  </tr>  
  <tr>
<!-- RECEITAS - DESPESAS -->
    <th style="text-align: end">Receitas - Despesas: <?="(".$mes_extenso["$mes_atual"] ."/" . $ano_atual.")"?></th>
  </tr>
  <tr>
    <td style="text-align: end"><?='R$ '.number_format($re_de, 2 , ",", ".")?></td>
  </tr>
  <tr>
<!-- SALDO FINAL  -->
    <th style="text-align: end">Saldo Final: <?="(".$mes_extenso["$mes_atual"] ."/" . $ano_atual.")"?></th>
  </tr>
  <tr>
    <td style="text-align: end"><?='R$ '.number_format($sd_anual, 2 , ",", ".")?></td>
  </tr>

</tfoot>
</table>
</div>

<p class= "container mb-5" align="right"> Resp.:  ________________________________________________________________________   Data: ____/____/________</p>

</body>
</html>