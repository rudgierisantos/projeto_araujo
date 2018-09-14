<?php
session_start();
include_once("../conexao.php");
?>
<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body>
    <?php include_once("menu.php");
  $id = $_GET ['id'];
  $result = mysql_query("SELECT c.id, f.nome ,c.id_funcionario, c.data, c.entrada, c.saida_almoco, c.retorno_almoco,c.saida
   FROM cartao_ponto2 c INNER JOIN
  funcionarios f on c.id_funcionario = f.id WHERE c.id = '$id' LIMIT 1");
  $resultado = mysql_fetch_assoc($result);
  ?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Editar Cartão de Ponto</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Pesquisar...">
                    <span class="input-group-btn">
                              <button class="btn btn-default" type="button">Buscar!</button>
                          </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <!--<h2>Cadastro <small>Clientes</small></h2> -->
                    <ul class="nav navbar-right panel_toolbox">
                      <!--<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li> -->
                      <!--<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div> -->
                  </div>
                  <div class="x_content">


                    <form class="form-horizontal form-label-left" method="POST" action="../processa_adm/proc_edit_cartao_ponto.php" novalidate>

                        <input type="text" name = "id_cartao" value ="<?php echo $resultado['id']?>">
                        <input type="text" name = "id_funcionario" value ="<?php echo $resultado['id_funcionario']?>">


                      <span class="section">Funcionários</span>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cpf">Funcionário <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="id" class="form-control">
                            <?php
                              echo '<option value="'.$resultado["nome"].'">'.$resultado["nome"].'</option>';
                            ?>
                          </select>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"for="name">Data <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="data" name="data" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder=""
                          required="required" type="date" value ="<?php echo $resultado['data'] ?>">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"for="name">Entrada <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="entrada" name="entrada" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="entrada" placeholder=""
                          required="required" type="time" value ="<?php echo $resultado['entrada'] ?>">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"for="name">Saída Almoço <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="saida_almoco" name="saida_almoco" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"
                          name="saida_almoco" placeholder=""  type="time" value ="<?php echo $resultado['saida_almoco'] ?>">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"for="name">Retorno Almoço <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="retorno_almoco" name="retorno_almoco" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"
                          name="retorno_almoco" placeholder=""  type="time" value ="<?php echo $resultado['retorno_almoco'] ?>">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"for="name">Saída <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="saida" name="saida" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"
                          name="saida" placeholder=""  type="time"  value ="<?php echo $resultado['saida'] ?>">
                        </div>
                      </div>

                    <!--  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Textarea <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="textarea" required="required" name="textarea" class="form-control col-md-7 col-xs-12"></textarea>
                        </div>
                      </div> -->
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button id="send" type="submit" class="btn btn-success">Editar</button>
                          <button type="reset" class="btn btn-primary">Cancelar</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            <!--Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a> -->
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- validator -->
    <script src="../vendors/validator/validator.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

  </body>
</html>
