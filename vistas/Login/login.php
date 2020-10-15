<?php
    require ("Vistas/Templates/headerHome.php");
    require ("Vistas/Templates/navHome.php");        
?>

<!-- Main content -->
<div class="content">
      <div class="container">
        <div class="row">         
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
             <div class="card">
             <div class="card-header card bg-primary text-white"  ><b class="card-title"><?php echo $data["page_title"] ; ?> </div>

            <div class="card-body login-card-body">
               <form action="<?php echo base_url(); ?>/LoginCambiar/cambiar"  method="POST" id="formLogin" name="formLogin">
      
      <div class="input-group mb-3">
        <input type="email" class="form-control" placeholder="Email">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-envelope"></span>
          </div>
        </div>
      </div>
      <div class="input-group mb-3">
        <input type="password" class="form-control" placeholder="Password">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-lock"></span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-8">
          <div class="icheck-primary">
            <input type="checkbox" id="remember">
            <label for="remember">
              Rercordar password
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-4">
          <button type="submit" class="btn btn-primary btn-block">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
   
    <!-- /.social-auth-links -->

    <p class="mb-1">
  <a href="<?php echo base_url(); ?>/LoginOlvido">Recuperar password</a>
</p>
<p class="mb-0">
  <a href="<?php echo base_url(); ?>/LoginRegistro" class="text-center">Registrar cuenta de acceso</a>
                
                    
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
    


