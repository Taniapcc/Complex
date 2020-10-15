<?php
    require ("Vistas/Templates/headerHome.php");
    require ("Vistas/Templates/navHome.php");  
    dep($data) ;     
?>
<!-- Main content -->
<div class="content">
      <div class="container">
        <div class="row">         
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
                <div class="card">
                <div class="card-body login-card-body">
      <p class="login-box-msg">Está a solo a un paso de su nueva contraseña, recupere su contraseña ahora.</p>

      <form action="<?php echo base_url();?>/LoginCambiar/cambiar" method="post">
        <div class="input-group mb-3">
          <input type="password" id= "clave1" name ="clave1" class="form-control" placeholder="Ingrese Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          
          
          <input type="hidden" name="id" id = "id" value ="<?php echo $data['datos']; ?>" />
          <input type="password" id="clave2" name ="clave2" class="form-control" placeholder="Confirmar Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            
            <button type="submit" class="btn btn-primary btn-block">Cambiar password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="<?php echo base_url(); ?>/Login">Login</a>
      </p>
    </div>
                  
                </div> <!-- card body -->
                </div>  <!--card -->
          </div>  <!-- /.col-md-6 -->
        </div>  <!-- /.row -->
        
      </div><!-- /.container-fluid -->
</div>   <!--content-->

<!-- fin MAIN CONTENT --> 


<?php     
    //require ("Vistas/Templates/footerHome.php");
?>   