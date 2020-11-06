<?php
    headerHome($data);
    
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
               <form action="<?php echo base_url(); ?>/Admon/verifica"  method="POST" id="formLogin" name="formLogin">
      
      <div class="input-group mb-3">
        <input type="email" id = "usuario" name = "usuario" class="form-control" placeholder="Email"
         value = <?php isset($data['usuario'])? print $data['usuario']: ""; ?>
         >
         <input hidden="text" id = "tipousuario" name = "tipousuario" class="form-control" 
         value = "Empleado" >
         

        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-envelope"></span>
          </div>
        </div>
      </div>
      <div class="input-group mb-3">
        <input type="password" id="password" name ="password" class="form-control" placeholder="Password" 
        value = <?php isset($data['password'])? print $data['password']: ""; ?>
        >
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-lock"></span>
          </div>
        </div>
        <!-- /.col -->
       

      </div>
      <div class="col-4">
          <button type="submit" class="btn btn-primary btn-block">Iniciar sesión </button>
        </div>
    
    </form>
   
    <!-- /.social-auth-links -->

                    
                  </div> <!-- card body -->
                </div>  <!--card -->
          </div>  <!-- /.col-md-6 -->
        </div>  <!-- /.row -->
        
      </div><!-- /.container-fluid -->
</div>   <!--content-->

<!-- fin MAIN CONTENT -->     



<?php     
    footerHome($data);
?>   
    


