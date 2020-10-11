<?php
    require ("Vistas/Templates/headerHome.php");
    require ("Vistas/Templates/navHome.php"); 
    //echo dep($data);      
?>

<div content-wrapper>
<div class="row content"  >
<div class="col-sm-12 col-lg-4 col-sm-4">

 
  <div class="card">
  <div class="card-header card bg-primary text-white"  ><b class="card-title"><?php echo $data["page_title"] ; ?> </div>

    <div class="card-body register-card-body">
     
      <form action="../../index.html" method="post">
        <div class="input-group mb-3">          
            <input type="text" id= "cedula" name = "cedula" class="form-control" size = 10 placeholder="*Cédula" pattern="[0-9]{10} "   required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-address-card"></span>
              </div>
            </div>
          </div>
        <div class="input-group mb-3">          
          <input type="text" id="nombre" name = "nombre" autocapitalize="words"  class="form-control" placeholder="*Apellidos Nombres" required >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">          
          <input type="text" class="form-control" id = "ciudad" name ="ciudad"  placeholder="*Ciudad">
          <div class="input-group-append">
            <div class="input-group-text">
            <span class="fas fa-city"></span>            
            </div>
          </div>
        </div>
        <div class="input-group mb-3">          
          <input type="text" id="direccion" name = "direccion" class="form-control" placeholder="*Dirección">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-map-marked"></span>              
            </div>
          </div>
        </div>
        <div class="input-group mb-3">          
          <input type="tel" class="form-control" id = "telefono" name = "telefono" placeholder="*Teléfono" required pattern="[0-9]{10} size=10" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>              
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" id="correo" name = "correo" class="form-control" placeholder="*Email" required >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">          
          <input type="text" class="form-control" id= "codigoPostal" name = "codigoPostal" placeholder="*Código Postal" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-map-marker"></span>             
            </div>
          </div>
        </div>
        <div class="input-group mb-3">          
          <input type="text" class="form-control" id = "usuario"  name = "usuario" placeholder="*Nombre Usuario" size = 40 required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>     
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="clave1" name = "clave1" placeholder="Password" size = 8 >
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
    <!-- /.form-box -->
  </div><!-- /.card -->
  <!-- /.register-box -->

</div>
  </div>
</div>


<?php     
    //require ("Vistas/Templates/footerHome.php");
?>  

