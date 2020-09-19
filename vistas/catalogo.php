<?php
 ob_start();
 session_start();
 
 if (!isset($_SESSION["nombre"])) {
   header("Location: login.html");
 }
 else {
 require 'header.php';
 if ($_SESSION['pedidos']==1) {
  
 $ofertas = array();
  

  // require 'header.php';
?>

<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-6">
                  <div class="thumbnail">
                  <img data-src="..." alt="ImagenLeche">
                  <div class="caption">
                    <h3>Título de la imagen</h3>
                    <p>Lorem ipsum, dolor sit amet consectetur 
                    adipisicing elit. Odio ullam, aperiam dignissimos 
                    laborum quae rerum blanditiis, vero dolore praesentium
                    magnam eius. Aliquid iusto non, nam qui odio voluptate beatae dolore?</p>
                    <p>

                      <a href="#" class="btn btn-primary" role="button">Botón</a>
                      <a href="#" class="btn btn-default" role="button">Botón</a>
                    </p>
                  </div><!--Caption -->
                </div> <!--thumbnail -->

                <div class="thumbnail">
                  <img data-src="..." alt="ImagenLeche">
                  <div class="caption">
                    <h3>Título de la imagen</h3>
                    <p>Lorem ipsum, dolor sit amet consectetur 
                    adipisicing elit. Odio ullam, aperiam dignissimos 
                    laborum quae rerum blanditiis, vero dolore praesentium
                    magnam eius. Aliquid iusto non, nam qui odio voluptate beatae dolore?</p>
                    <p>

                      <a href="#" class="btn btn-primary" role="button">Botón</a>
                      <a href="#" class="btn btn-default" role="button">Botón</a>
                    </p>
                  </div><!--Caption -->
                </div> <!--thumbnail -->

                <div class="thumbnail">
                  <img data-src="..." alt="ImagenLeche">
                  <div class="caption">
                    <h3>Título de la imagen</h3>
                    <p>Lorem ipsum, dolor sit amet consectetur 
                    adipisicing elit. Odio ullam, aperiam dignissimos 
                    laborum quae rerum blanditiis, vero dolore praesentium
                    magnam eius. Aliquid iusto non, nam qui odio voluptate beatae dolore?</p>
                    <p>

                      <a href="#" class="btn btn-primary" role="button">Botón</a>
                      <a href="#" class="btn btn-default" role="button">Botón</a>
                    </p>
                  </div><!--Caption -->
                </div> <!--thumbnail -->
                  
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

