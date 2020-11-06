<?php
 session_start();

 if (!isset($_SESSION["usuario"])) {
    header("location:" . base_url() . "/Admon");
 }
 if (inactividadSesion()){
  header("location:" . base_url() . "/Admon");  
}

header_admin($data);

?>
<!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- Content Header Page header -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><i class="fas fa-users"></i><?php echo $data["page_title"]; ?></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>/dashboard"><i class="fa fa-home fa-lg"></i></a></li>
            <li class="breadcrumb-item active"><?php echo $data["page_title"]; ?></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class=" col-lg-6 col-md-6 col-sm-12 col-xs-12">

          <div class="card">
            
            <div class="card-body">

            <form action="<?php echo base_url(); ?>/UserSistema/alta" method="post">
                <div class="input-group mb-3">
                  
                   <input class="form-control" type="text" id="cedula" name="cedula" value='<?php isset($data['cedula']) ? print $data['cedula'] : ""; ?>' size=10 placeholder="*Cédula" title="Cedula debe tener 10 dígitos" required>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-address-card"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                   <input type="hidden" id="idusuario" name="idusuario"  >' 
                  <input type="text" id="nombre" name="nombre" autocapitalize="words" value='<?php isset($data['nombre']) ? print $data['nombre'] : ""; ?>' 
                  class="form-control" placeholder="*Apellidos Nombres" size=60>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-user"></span>
                    </div>
                  </div>
                </div>

                <div class="input-group mb-3">
                  <input type="text" class="form-control" id="ciudad" name="ciudad" size=100 value='<?php isset($data['ciudad']) ? print $data['ciudad'] : ""; ?>' placeholder="*Ciudad">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-city"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="text" id="direccion" name="direccion" class="form-control" size=100 value='<?php isset($data['direccion']) ? print $data['direccion'] : ""; ?>' placeholder="*Dirección">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-map-marked"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="tel" class="form-control" id="telefono" name="telefono" value='<?php isset($data['telefono']) ? print $data['telefono'] : ""; ?>' placeholder="*Teléfono" required pattern="[0-9]{9}" size="9" title="Teléfono debe tener 9 dígitos">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-phone"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="email" id="email" name="email" class="form-control" size=100 value='<?php isset($data['email']) ? print $data['email'] : ""; ?>' placeholder="*Email" required>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-envelope"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" id="codPostal" name="codPostal" value='<?php isset($data['codPostal']) ? print $data['codPostal'] : ""; ?>' placeholder="*Código Postal" required pattern="[0-9]{6}" size="6" required title="Código Postal debe tener 6 dígitos">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-map-marker"></span>
                    </div>
                  </div>
                </div>

                <div class="input-group mb-3">
                  <input type="text" class="form-control" id="login" 
                  name="login" value='<?php isset($data['login']) ? print $data['login'] : ""; ?>' 
                  placeholder="*Usuario Empleado" size=40 required>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-user"></span>
                    </div>
                  </div>
                </div>

                <div class="input-group mb-3">
                  <input type="password" class="form-control" id="clave1" name="clave1" placeholder=" *Password" size=8>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="password" class="form-control" id="clave2" name="clave2" placeholder="Retype password" size=8>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                  
                </div>
                

                        

                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                         <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
                         <a class="btn btn-danger" href="<?php print base_url(); ?>/UserSistema" role="button">
                          <i class="fa fa-arrow-circle-left"></i> Cancelar </a>                         
                 </div>

              
                
              </form> <!-- /.Formulario -->

             </div>
            <!-- /.card-body -->
           
            <!-- /.card-footer-->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- /.content-wrapper -->
<?php

footer_admin($data);

?>