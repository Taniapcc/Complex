<?php
    require ("vistas/layout/headerHome.php");
    require ("vistas/layout/navHome.php"); 
    //echo dep($data);      
?>
<section class="content">
      <div class="error-page">
        <h2 class="headline text-warning"> 404</h2>

        <div class="error-content">
          <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Página No Encontrada.</h3>

          <p>
            No hemos encontrado la página que busca.
            
            Mientras tanto puede <a href="<?php echo base_url(); ?>"> regresar al inicio </a> o tratar de buscar.
          </p>

          <form class="search-form">
            <div class="input-group">
              <input type="text" name="search" class="form-control" placeholder="Buscar">

              <div class="input-group-append">
                <button type="submit" name="submit" class="btn btn-warning"><i class="fas fa-search"></i>
                </button>
              </div>
            </div>
            <!-- /.input-group -->
          </form>
        </div>
        <!-- /.error-content -->
      </div>
      <!-- /.error-page -->
    </section>

<?php     
   // require ("vistas/layout/footerHome.php");
?>   