<?php
    require ("Vistas/Templates/headerHome.php");
    require ("Vistas/Templates/navHome.php"); 
    //echo dep($data);      
?>

 <div content-wrapper>

   <div class="row content"  >
       <div class="col-sm-12 col-lg-4 col-sm-4">
         <!-- card -->     
  <!-- /.login-logo -->
      <div class="card">
        <div class="card-header card bg-primary text-white"  ><b class="card-title"><?php echo $data["page_title"] ; ?> </div>

        <div class="card-body login-card-body">
          <p class="login-box-msg"> Registrese para iniciar su session</p>

          <form action="<?php echo base_url(); ?>/Login/"  method="POST" id="formLogin" name="formLogin">
      
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
        <a href="forgot-password.html">Recuperar password</a>
      </p>
      <p class="mb-0">
        <a href="<?php echo base_url(); ?>/LoginRegistro" class="text-center">Registrar cuenta de acceso</a>
      </p>
        
        </div>
        <!-- /.login-card-body -->
      </div>
    </div>
    <!-- -->     
     
         <!-- card -->
       </div>
   </div>

</div> 


<?php     
    //require ("Vistas/Templates/footerHome.php");
?>   
    


