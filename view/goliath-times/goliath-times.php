<?php

require_once __DIR__ . '../../../controller/GoliathTimes.php';

$salvarTempo = $_POST['salvarTempo'] ?? null;

$goliathTimes = new GoliathTimes('goliathTimes');
$times = $goliathTimes->getAllTimes();

if (!is_null($salvarTempo)) {
    try {
        $nmVhc = $_POST['nmVhc'] ?? null;
        $hrTempo = $_POST['hrTempo'] ?? null;
        $qtClasse = $_POST['qtClasse'] ?? null;
        $goliathTimes->setTime($nmVhc, $hrTempo, $qtClasse);
    } catch (Exception $e) {
        throw $e;
    }
    header('LOCATION:goliath-times.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- <link rel="stylesheet" dir="../bootstrap"> -->
    <link rel="stylesheet" href="goliath-times.css">
    <title>Goliath</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(Página atual)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Destaques</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Preços</a>
      </li>
    </ul>
</nav>

<form method="POST">
<div class="container" id="formTempo">
  <div class="row">
  <div class="col-2">
  </div>
    <div class="col-4">
    <label class="form-label">Veículo</label>
    <input type="text" class="form-control" name="nmVhc">
    </div>
    <div class="col-2">
    <label class="form-label">Tempo</label>
    <input type="time" class="form-control" step="0.001" name="hrTempo" value="00:00">
    </div>
    <div class="col-1">
    <label class="form-label">Classe</label>
    <input type="number" class="form-control" name="qtClasse" id="qtClasse" max="999">
    </div>
    <div class="col-1" id="divButton">
    <input type="hidden" name="salvarTempo" value="salvarTempo">
    <button type="submit" class="btn btn-primary" name="btnSalvar">Salvar</button>
    </div>
  </div>
</div>
</form>

<hr>

<div class="container">
    <table class="table table-dark" id="tabelaRanking">
  <thead>
    <th>#</th>
    <th id="headerVeiculo">Veículo</th>
    <th>Tempo</th>
    <th>Classe</th>
  </thead>
  <tbody>
      <?php foreach($times as $time){?>
    <tr class="table-active">
  <th scope="row"><?=$time['colocacao']?>°</th>
    <td><?=$time['nm_vhc']?></td>
    <td id="columnTime"><?=str_replace('.', ',', substr($time['hr_tempo_vhc'], -9));?></td>
    <?php switch($time['nm_classe_vhc']){
      case 'X':?>
    <td colspan="2" id="columnClass"><a id="classVhcX" class="btn btn-outline-primary" aria-disabled="true" role="button" data-bs-toggle="button"><?=$time['nm_classe_vhc']?></a><a id="qtClassX" class="btn btn-outline-primary" aria-disabled="true" role="button" data-bs-toggle="button"><?=$time['qt_classe_vhc']?></a></td>
    <?php break;?>
      <?php case 'S2':?>
    <td colspan="2" id="columnClass"><a id="classVhcS2" class="btn btn-outline-primary" aria-disabled="true" role="button" data-bs-toggle="button"><?=$time['nm_classe_vhc']?></a><a id="qtClassS2" class="btn btn-outline-primary" aria-disabled="true" role="button" data-bs-toggle="button"><?=$time['qt_classe_vhc']?></a></td>
    <?php break;?>
      <?php case 'S1':?>
    <td colspan="2" id="columnClass"><a id="classVhcS1" class="btn btn-outline-primary" aria-disabled="true" role="button" data-bs-toggle="button"><?=$time['nm_classe_vhc']?></a><a id="qtClassS1" class="btn btn-outline-primary" aria-disabled="true" role="button" data-bs-toggle="button"><?=$time['qt_classe_vhc']?></a></td>
    <?php break;?>
      <?php case 'A':?>
    <td colspan="2" id="columnClass"><a id="classVhcA" class="btn btn-outline-primary" aria-disabled="true" role="button" data-bs-toggle="button"><?=$time['nm_classe_vhc']?></a><a id="qtClassA" class="btn btn-outline-primary" aria-disabled="true" role="button" data-bs-toggle="button"><?=$time['qt_classe_vhc']?></a></td>
    <?php break;?>
      <?php case 'B':?>
    <td colspan="2" id="columnClass"><a id="classVhcB" class="btn btn-outline-primary" aria-disabled="true" role="button" data-bs-toggle="button"><?=$time['nm_classe_vhc']?></a><a id="qtClassB" class="btn btn-outline-primary" aria-disabled="true" role="button" data-bs-toggle="button"><?=$time['qt_classe_vhc']?></a></td>
    <?php break;?>
      <?php case 'C':?>
    <td colspan="2" id="columnClass"><a id="classVhcC" class="btn btn-outline-primary" aria-disabled="true" role="button" data-bs-toggle="button"><?=$time['nm_classe_vhc']?></a><a id="qtClassC" class="btn btn-outline-primary" aria-disabled="true" role="button" data-bs-toggle="button"><?=$time['qt_classe_vhc']?></a></td>
    <?php break;?>
      <?php case 'D':?>
    <td colspan="2" id="columnClass"><a id="classVhcD" class="btn btn-outline-primary" aria-disabled="true" role="button" data-bs-toggle="button"><?=$time['nm_classe_vhc']?></a><a id="qtClassD" class="btn btn-outline-primary" aria-disabled="true" role="button" data-bs-toggle="button"><?=$time['qt_classe_vhc']?></a></td>
    <?php break;?>
    <?php }?>
    </tr>
    <?php }?>
  </tbody>
</table>
</div>
</body>
</html>