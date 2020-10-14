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
                <div class="card-body login-card-body">
      <p class="login-box-msg">Usted olvido su password ? Aquí usted puede cambiar su password .</p>

      <form action="<?php echo base_url(); ?>/LoginOlvido/olvido" method="post">
        <div class="input-group mb-3">
          <input id= "email" name = "email" type="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Request new password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="<?php echo base_url(); ?>/Login">Login</a>
      </p>
      <p class="mb-0">
        <a href="<?php echo base_url(); ?>/LoginRegistro" class="text-center">Register a new membership</a>
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