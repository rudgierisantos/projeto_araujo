<?php
session_start();
include_once("../conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Celke - Formulario</title>
		<link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <style>
        .modal .modal-dialog { width: 35%; }
    </style>
	</head>
	<body>
		<div class="container theme-showcase" role="main">
			<!-- Valida se fucionário já existe -->
			    <?php
			$data = $_POST["data"];
			$id_funcionario = $_POST["id"];
			$query = mysql_query("SELECT * FROM cartao_ponto2 c
				inner join funcionarios f on c.id_funcionario = f.id WHERE c.data = '$data' and f.id = '$id_funcionario'");
  if(mysql_affected_rows() == 0){
  $id_funcionario = $_POST["id"];
	$data = $_POST["data"];
	$entrada = $_POST["entrada"];
  $saida_almoco = $_POST["saida_almoco"];
	$retorno_almoco = $_POST["retorno_almoco"];
	$saida = $_POST["saida"];
	$query = mysql_query("INSERT INTO cartao_ponto2 (id_funcionario ,data, entrada, saida_almoco, retorno_almoco, saida)
	VALUES ('$id_funcionario','$data', '$entrada','$saida_almoco','$retorno_almoco','$saida')");?>


  <!-- Modal -->
  			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  				<div class="modal-dialog" role="document">
  					<div class="modal-content">
  						<div class="modal-header">
  							<h4 class="modal-title" id="myModalLabel">Ponto cadastrado com Sucesso!</h4>
  						</div>
  						<div class="modal-body">
  						</div>
  						<div class="modal-footer">
  							<a href="../modulo_adm/cartao_ponto.php"><button type="button" class="btn btn-success">Ok</button></a>
  						</div>
  					</div>
  				</div>
  			</div>
  			<script>
  				$(document).ready(function () {
  					$('#myModal').modal('show');
  				});
  			</script>
  		<?php }else{ ?>
  			<!-- Modal -->
  			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  				<div class="modal-dialog" role="document">
  					<div class="modal-content">
  						<div class="modal-header">
  							<h4 class="modal-title" id="myModalLabel">Registro já existe!</h4>
  						</div>
  						<div class="modal-body">
  						</div>
  						<div class="modal-footer">
  							<a href="../modulo_adm/cartao_ponto.php"><button type="button" class="btn btn-danger">Ok</button></a>
  						</div>
  					</div>
  				</div>
  			</div>
  			<script>
  				$(document).ready(function () {
  					$('#myModal').modal('show');
  				});
  			</script>
	<?php } ?>
    </div>
  	</body>
  </html>
