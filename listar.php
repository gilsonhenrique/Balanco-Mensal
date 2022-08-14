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
<div class="container" id="vertical-center">
<div class="col-md-6 offset-md-3 mb-3">
<h1 align="center">Relatório Setor de Contas</h1>
</div>
<form method="POST" action="listar2.php">
  <div class="col-md-4 offset-md-4 mb-5 mt-2">
  <label for="" class="form-label">Mes:</label>
  <select class="form-select" aria-label="Default select example" name="mes" id="mes" required>
  <option value="">Selecione o mes</option>
  <option value=1>Janeiro</option>
  <option value=2>Fevereiro</option>
  <option value=3>Março</option>
  <option value=4>Abril</option>
  <option value=5>Maio</option>
  <option value=6>Junho</option>
  <option value=7>Julho</option>
  <option value=8>Agosto</option>
  <option value=9>Setembro</option>
  <option value=10>Outubro</option>
  <option value=11>Novembro</option>
  <option value=12>Dezembro</option>
</select>
</div>
<div class="col-md-4 offset-md-4">
  <label for="" class="form-label">Ano:</label>
<select class="form-select" aria-label="Default select example" name="ano" id="ano" required>
  <option value="">Selecione o ano</option>
  <option value=2021>2021</option>
  <option value=2022>2022</option>
  <option value=2023>2023</option>
  <option value=2024>2024</option>
  <option value=2025>2025</option>
</select>
</div>
 
 <div class="row col-md-4 offset-md-4 mt-4">
  <div class="col">
  <input type="submit" value="Avançar" class="btn btn-primary">
 </div>
 <div class="col text-end">
    <a href="index.php" class="link-secondary mt-5">Retornar</a>
 </div>
</div>

</form>
</div>
</body>
</html>