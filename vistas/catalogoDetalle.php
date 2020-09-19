<?php
ob_start();
session_start();

if (!isset($_SESSION["nombre"])) {
  header("Location: login.html");
}
else {
   require 'header.php';
   
   if ($_SESSION['pedidos']==1) {

   
?>

<!-- Main Sidebar Container -->
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                          <h1 class="box-title">Catalogo de Productos</h1>

                          
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" style="height: 400px;" id="listadoregistros">
                        
                    </div>
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->



     

  <!-- /.content-wrapper -->

<?php
 } // fin de if
 else {
     require "noacceso.php";
 } // fin 

   require 'footer.php'; ?>
// falta script 

<?php
}
ob_end_flush();
?>