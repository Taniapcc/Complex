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
            <input type="text" id= "txtCeddula" name = "txtCedula" class="form-control" size = 10 placeholder="*Cédula" pattern="[0-9]{10} "   required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-address-card"></span>
              </div>
            </div>
          </div>
        <div class="input-group mb-3">          
          <input type="text" id="txtNombre" name = "txtNombre"  class="form-control" placeholder="*Apellidos Nombres" required >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">          
          <input type="text" class="form-control" placeholder="*Ciudad">
          <div class="input-group-append">
            <div class="input-group-text">
            <span class="fas fa-city"></span>            
            </div>
          </div>
        </div>
        <div class="input-group mb-3">          
          <input type="text" id="txtDireccion" name = "txtDireccion" class="form-control" placeholder="*Dirección">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-map-marked"></span>              
            </div>
          </div>
        </div>
        <div class="input-group mb-3">          
          <input type="tel" class="form-control" placeholder="*Teléfono" required pattern="[0-9]{10} size=10" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>              
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" id="txtEmail" name = "txtEmail" class="form-control" placeholder="*Email" required >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">          
          <input type="text" class="form-control" id= "txtCodigoPostal" name = "txtCodigoPosta" placeholder="*Código Postal" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-map-marker"></span>             
            </div>
          </div>
        </div>
        <div class="input-group mb-3">          
          <input type="text" class="form-control" placeholder="*Nombre Usuario" size = 40 required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>     
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" size = 8 >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Retype password" size = 8>
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

      <a href="login.html" class="text-center">I already have a membership</a>
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

