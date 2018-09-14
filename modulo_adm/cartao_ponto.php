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

    <title>Ferreir&Araujo</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body>

    <?php include_once("menu.php");
    ini_set('display_errors', 0 );
    error_reporting(0);
    $datainicial = $_POST["datainicial"];
    $datafinal = $_POST["datafinal"];
    $tipo_pagamento = $_POST['tipo_pagamento'];
    $funcionarios = $_POST['funcionarios'];
        $resultado = mysql_query("SELECT c.id, f.nome, c.data, c.entrada, c.saida_almoco, c.retorno_almoco, c.saida, c.hora_extra
          FROM cartao_ponto2 c
          inner join funcionarios f on c.id_funcionario = f.id ORDER BY c.data desc");
      $linhas = mysql_num_rows($resultado);
      ?>
        <!-- page content -->
        <!-- page content -->
         <div class="right_col" role="main">
           <div class="">
             <div class="page-title">
               <div class="title_left">
                 <h3>Cartão de Ponto <small></small></h3>
               </div>

               <div class="title_right">
                 <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                   <div class="input-group">
                     <input type="text" class="form-control" placeholder="Search for...">
                     <span class="input-group-btn">
                       <button class="btn btn-default" type="button">Go!</button>
                     </span>
                   </div>
                 </div>
               </div>
             </div>

             <div class="col-md-1">
                       <a href="cad_cartao_ponto.php"> <button class="btn btn-primary">Novo</button> </a>
                     </div>

             <div class="clearfix"></div>

             <div class="row">
               <div class="col-md-12 col-sm-12 col-xs-12">
                 <div class="content-wrapper">
         <!--<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4"> -->
         <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
           <!--<h1 class="h2">Bem Vindo a Area Administrativa</h1> -->
           <div class="btn-toolbar mb-2 mb-md-0">
             <!--  <div class="btn-group mr-2">
             <button class="btn btn-sm btn-outline-secondary">Share</button>
             <button class="btn btn-sm btn-outline-secondary">Export</button>
           </div> -->
           <!--  <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
           <span data-feather="calendar"></span>
           This week
         </button> -->
       </div>
     </div>

     <!--<canvas class="my-4" id="myChart" width="900" height="380"></canvas> -->
     <form  name="bind_venda" id="bind_venda" class="form-horizontal" method="POST" action="">
       <div class='col-sm-3'>
           Data Inicial
           <div class="form-group">
               <div class='input-group date' id='myDatepickerinicial'>
                   <input type='text' class="form-control" id="datafinal"  name="datafinal"
             required = "">
                   <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                   </span>
               </div>
           </div>
       </div>

       <div class='col-sm-3'>
           Data Final
           <div class="form-group">
               <div class='input-group date' id='myDatepickerfinal'>
                   <input type='text' class="form-control" id="datafinal"  name="datafinal"
             required = "">
                   <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                   </span>
               </div>
           </div>
       </div>
         <div class='col-sm-3'>
       Funcionario
           <div class="form-group">
           <select class="form-control" name="funcionario">
             <option value = "1">Todos</option>
               <?php
             $query = mysql_query("SELECT * FROM funcionarios");
                while($result = mysql_fetch_array($query))
                {
                  echo '<option value="'.$result["nome"].'">'.$result["nome"].'</option>';
                }
                ?>
           </select>
         </div>
       </div>

       <div class='col-sm-3'>
         <br>
           <div class="form-group">
         <input type="submit" class="btn btn-success" value = "Buscar">
       </div>
     </div>
       </form>

       <div class="col-md-12 col-sm-12 col-xs-12">
         <div class="x_panel">
           <div class="x_title">
             <h2>Batida de Ponto <small></small></h2>
             <ul class="nav navbar-right panel_toolbox">
               <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
               </li>
               <li class="dropdown">
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
             <div class="clearfix"></div>
           </div>
           <div class="x_content">

              <table id="datatable-buttons" class="table table-striped table-bordered">
           <thead>
             <tr>
               <th>Funcionário</th>
               <th>Data</th>
               <th>Entrada</th>
               <th>Saída Almoço</th>
               <th>Retorno Almoço</th>
               <th>Saída</th>
               <th>Hora Extra</th>
               <th>Ações</th>
             </tr>
           </thead>
           <tbody>
             <?php
           while($linhas = mysql_fetch_array(
             $resultado)){
               echo " <tr>";
               echo "<td>".$linhas['nome']."</td>";
               echo "<td>".$linhas['data']."</td>";
               echo "<td>".$linhas['entrada']."</td>";
               echo "<td>".$linhas['saida_almoco']."</td>";
               echo "<td>".$linhas['retorno_almoco']."</td>";
               echo "<td>".$linhas['saida']."</td>";
               echo "<td>".$linhas['hora_extra']."</td>";
               ?>
               <td>
       <a href ='editar_cartao_ponto.php?id=<?php echo $linhas['id']; ?>'><button type='button'
         class = 'btn btn-sm btn-info'>Editar</button></a>

         <a href ='../processa_adm/proc_apagar_cartao_ponto.php?id=<?php echo $linhas['id']; ?>'>
           <button type='button' class = 'btn btn-sm btn-danger'>Apagar</button></a>
         </td>

         <?php
                           echo " </tr>";
                         }

                         ?>

               <div class="table-responsive">
                 <table class="table table-striped table-sm">


                 </div>
               </div>
             </div>
           </div>
           </table>
         </div>
       </table>


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
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
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
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

  </body>
</html>
