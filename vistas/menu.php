<?php
ob_start();
session_start();

if (!isset($_SESSION["nombre"])) {
  header("Location: login.html");
}
else {
    require 'header.php';

     if ($_SESSION['admin']==1) {
        ?>
 <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <!-- centro -->
                    <div class="panel-body table-responsive" style="height: 400px;" id="">
                        
                    </div>
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->


<?php
    } // fin de if
    else {
        require "noacceso.php";
    } // fin menu
require 'footer.php'; ?>
<!--<script type="text/javascript" src="scripts/categoria2.js"></script> -->

<?php
} //fin sesion
ob_end_flush();
?>