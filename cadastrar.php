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

    <form  method="POST" action="cadastrarb.php">

      <div class="col-md-6 offset-md-3 mb-5">
        <h1 align="center">Formulário de Cadastro</h1>
      </div>

      <div class="col-md-4 offset-md-4">
        <label for="datamov" class="form-label">Data</label>
        <input type="date" class="form-control" id="datamov" name="datamov" value= "<?php if(isset($_POST['datamov'])){ echo $_POST['datamov'];}?>">
      </div>

      <div class="col-md-4 offset-md-4">
        <label class="form-label mt-3">Tipo:</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" id="entrada" name="status" value="ENTRADA" <?php if(isset($_POST['status']) && $_POST['status'] == 'ENTRADA'){ echo 'checked';}?>>
          <label class="form-check-label" for="entrada">Entrada</label>
        </div>
      </div>

      <div class="col-md-4 offset-md-4">
        <div class="form-check">
         <input class="form-check-input" type="radio" id="saida" name="status" value="SAÍDA" <?php if(isset($_POST['status']) && $_POST['status'] == 'SAÍDA'){ echo 'checked';}?>>
         <label class="form-check-label" for="saida">Saída</label>
       </div>

       <div class="row mt-4">
         <div class="col">
          <input type="submit" value="Avançar" class="btn btn-primary">
        </div>
        <div class="col text-end">
         <a href="index.php" class="link-secondary mt-5">Retornar</a>
       </div>
     </div>

   </div>

 </form>

</div>	
</body>
</html>