<?php
ob_start();
session_start();

if (!isset($_SESSION["nombre"])) {
  header("Location: login.html");
}
else {
    require 'header.php';

     if ($_SESSION['ventas']==1) {
       
       ?>

<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                          <h1 class="box-title">Tabla <button class="btn btn-success" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="mapa table-responsive" style="height: 400px;" id="listadoregistros">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.783613838032!2d-78.52161668555108!3d-0.23898289982563434!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d599a017772405%3A0xc3706fdf6ab84b0f!2sRicardo%20Jaramillo%20%26%20Ugarte%2C%20Quito%20170111!5e0!3m2!1ses!2sec!4v1596388823227!5m2!1ses!2sec" width=100% height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->

  <?php
    } // fin de if
    else {
        require "noacceso.php";
    } // fin menu
require 'footer.php'; ?>
<script type="text/javascript" src="scripts/categoria.js"></script>

<?php
} //fin sesion
ob_end_flush();
?>