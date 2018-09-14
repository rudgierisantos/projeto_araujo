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
$cpf = $_POST["cpf"];
$query = mysql_query("SELECT * FROM funcionarios WHERE cpf = '$cpf'");

if(mysql_affected_rows() == 0){
	$nome = $_POST["nome"];
	$cpf = $_POST["cpf"];
	$cargo = $_POST["cargo"];
	$contrato = $_POST["contrato"];
	$admissao = $_POST["admissao"];
	$demissao = $_POST["demissao"];
	$query = mysql_query("INSERT INTO funcionarios (nome, cpf, cargo, contrato, admissao, demissao)
	VALUES ('$nome', '$cpf', '$cargo', '$contrato', '$admissao', '$demissao')");?>
  <!-- Modal -->
  			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  				<div class="modal-dialog" role="document">
  					<div class="modal-content">
  						<div class="modal-header">
  							<h4 class="modal-title" id="myModalLabel">Funcionário cadastrado com Sucesso!</h4>
  						</div>
  						<div class="modal-body">
  						<?php echo $nome; ?>
  						</div>
  						<div class="modal-footer">
  							<a href="../modulo_adm/funcionario.php"><button type="button" class="btn btn-success">Ok</button></a>
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
  							<h4 class="modal-title" id="myModalLabel">Funcionário já existe!</h4>
  						</div>
  						<div class="modal-body">
  						</div>
  						<div class="modal-footer">
  							<a href="../modulo_adm/cad_funcionario.php"><button type="button" class="btn btn-danger">Ok</button></a>
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
