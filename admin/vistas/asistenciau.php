<?php 
//activamos almacenamiento en el buffer
ob_start();
session_start();
if (!isset($_SESSION['nombre'])) {
  header("Location: login.html");
}else{

require 'header.php';
 ?>
    <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="row">
        <div class="col-md-12">
      <div class="box">
<div class="box-header with-border">
  <h1 class="box-title">Usuarios</h1>
  <div class="box-tools pull-right">
    
  </div>
</div>
<!--box-header-->
<!--centro-->
      <div class="panel-body table-responsive" id="listadoregistros">
        <table id="tbllistadou" class="table table-striped table-bordered table-condensed table-hover">
          <thead>
            <th>Opciones</th>
            <th>Código</th>
            <th>Fecha</th>
            <th>Hora Ingreso</th>
            <th>Hora Salida</th>
            <th>Deudas</th>
            <th>Observaciones</th>
          </thead>
          <tbody>
          </tbody>
          <tfoot>
            <th>Opciones</th>
            <th>Código</th>
            <th>Fecha</th>
            <th>Hora Ingreso</th>
            <th>Hora Salida</th>
            <th>Deudas</th>
            <th>Observaciones</th>
          </tfoot>   
        </table>
      </div>

      </div>
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
<?php 

require 'footer.php';
 ?>
 <script src="scripts/asistencia.js"></script>
 <?php 
}

ob_end_flush();
  ?>
