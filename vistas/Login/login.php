<?php
    require ("Vistas/Templates/headerHome.php");
    require ("Vistas/Templates/navHome.php");  
    //dep($data);      
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
               <form action="<?php echo base_url(); ?>/Login/verifica"  method="POST" id="formLogin" name="formLogin">
      
      <div class="input-group mb-3">
        <input type="email" id = "usuario" name = "usuario" class="form-control" placeholder="Email"
         value = <?php isset($data['usuario'])? print $data['usuario']: ""; ?>
         >
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
      </div>
      <div class="row">
        <div class="col-8">
          <div class="icheck-primary">
            <input type="checkbox" id="recordar" name ="recordar"
            
             <?php  
                if (isset($data['recordar'])){
                    if ( $data['recordar'] == "on"){
                        print "checked";
                    }

                }

             ?>
            >
            <label for="remember">
              Rercordar password
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-4">
          <button type="submit" class="btn btn-primary btn-block">Iniciar sesión </button>
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
    


