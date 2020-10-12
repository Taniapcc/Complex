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
              <div class="card-header card bg-primary text-white">
                <h5 class="card-title m-0"><?php echo $data["page_title"] ; ?> </h5>
              </div>
          <div class="card-body">

          <form action="<?php echo base_url(); ?>/LoginRegistro/loginRegistro" method="post">
            <div class="input-group mb-3">    
           
            <input class="form-control" type="text" id= "cedula" name = "cedula" 
            value = '<?php isset($data['cedula'])? print $data['cedula']: "";?>'
            size = 10 placeholder="*Cédula"   
            title=  "Cedula debe tener 10 dígitos" 
            required >
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-address-card"></span>
              </div>
            </div>
          </div>
        <div class="input-group mb-3">          
          <input type="text" id="nombre" name = "nombre" autocapitalize="words"
          value = '<?php isset($data['nombre'])? print $data['nombre']: "";?>'
           class="form-control" placeholder="*Apellidos Nombres"  >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">          
          <input type="text" class="form-control" id = "ciudad" name ="ciudad"
          value = '<?php isset($data['ciudad'])? print $data['ciudad']: "";?>'
          placeholder="*Ciudad">
          <div class="input-group-append">
            <div class="input-group-text">
            <span class="fas fa-city"></span>            
            </div>
          </div>
        </div>
        <div class="input-group mb-3">          
          <input type="text" id="direccion" name = "direccion" class="form-control" 
          value = '<?php isset($data['direccion'])? print $data['direccion']: "";?>'
          placeholder="*Dirección">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-map-marked"></span>              
            </div>
          </div>
        </div>
        <div class="input-group mb-3">          
          <input type="tel" class="form-control" id = "telefono" name = "telefono" 
          value = '<?php isset($data['telefono'])? print $data['telefono']: "";?>'
          placeholder="*Teléfono" required pattern="[0-9]{9}" size= "9"  
          title=  "Teléfono debe tener 9 dígitos"   >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>              
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" id="email" name = "email" class="form-control" 
          value = '<?php isset($data['email'])? print $data['email']: "";?>'
          placeholder="*Email" required >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">          
          <input type="text" class="form-control" id= "codPostal" name = "codPostal"
          value = '<?php isset($data['codPostal'])? print $data['codPostal']: "";?>'
           placeholder="*Código Postal" required pattern="[0-9]{6}" size= "9" required
           title=  "Código Postal debe tener 6 dígitos"
           >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-map-marker"></span>             
            </div>
          </div>
        </div>

        <div class="input-group mb-3">          
          <input type="text" class="form-control" id = "usuario"  name = "usuario" 
          value = '<?php isset($data['usuario'])? print $data['usuario']: "";?>'
          placeholder="*Nombre Usuario" size = 40 required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>  

        <div class="input-group mb-3">
          <input type="password" class="form-control" id="clave1" name = "clave1" placeholder=" *Password" size = 8 >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id= "clave2" name = "clave2" placeholder="Retype password" size = 8>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>

          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>


      </form>

      <a href="<?php echo base_url(); ?>/Login" class="text-center">I already have a membership</a>


       </div>
    </div>

          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>




<!-- fin MAIN CONTENT -->


<?php     
    //require ("Vistas/Templates/footerHome.php");
?>  

