<?php
ob_start();
session_start();

if (!isset($_SESSION["nombre"])) {
  header("Location: login.html");
}
else {
   require 'header.php';
   if ($_SESSION['admin']==1) {
    ?>
?>
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                         <h1 class="box-title">Cliente <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        
                         <div class="box-tools pull-right">
                        </div>

                        
                      </div>
                        


                    </div>
                    <div>
                    
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                          <th>Opciones</th>
                            <th>Tienda</th>
                            <th>Nombre</th>
                            <th>Documento</th>
                            <th>Número</th>
                            <th>Teléfono</th>
                            <th>Email</th>
                            <th>Login</th>
                            <th>Foto</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                          <th>Opciones</th>
                            <th>Tienda</th>
                            <th>Documento</th>
                            <th>Número</th>
                            <th>Teléfono</th>
                            <th>Email</th>
                            <th>Login</th>
                            <th>Foto</th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" id="formularioregistros">
                        <form name="formulario" id="formulario" data-toggle="validator" method="POST">
                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label>Tienda(*):</label>
                            <select id="idtienda" name="idtienda" class="form-control selectpicker" data-live-search="true" required></select> 
                          </div>

                      <!--    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Rol(*):</label>
                            <select id="idtienda" name="idtienda" class="form-control selectpicker" data-live-search="true" required></select> 
                          </div>-->

                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label>Nombre(*):</label>
                            <input type="hidden" name="idusuario" id="idusuario">
                            <input type="hidden" name="tipousuario" id="tipousuario" value = "CLIENTE">
                            <input type="text" class="form-control" name="nombre" id="nombre" maxlength="100" placeholder="Nombre" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Tipo Documento(*):</label>
                            <select class="form-control select-picker" name="tipo_documento" id="tipo_documento" required>
                              <option value="CEDULA">CEDULA</option>
                              <option value="RUC">RUC</option>                             
                            </select>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Número(*):</label>
                            <input type="text" class="form-control" name="num_documento" id="num_documento" maxlength="20" placeholder="Documento" required>
                          </div>
                                               

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Dirección:</label>
                            <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Dirección" maxlength="70">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Teléfono:</label>
                            <input type="tel" class="form-control" name="telefono" id="telefono"
                             maxlength="9" placeholder="Teléfono" 
                             pattern="[0-9]{9}"
                             title="Teléfono 9 dígitos. Ej. 022342123">

                                                       
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Email:</label>
                            <input type="email" class="form-control" name="email" id="email" maxlength="50" placeholder="Email">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Cargo:</label>
                            <input type="text" class="form-control" name="cargo" id="cargo" maxlength="20" placeholder="Cargo">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Login (*):</label>
                            <input type="text" class="form-control" name="login" id="login" maxlength="20" placeholder="Login" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Clave (*):</label>
                            <input type="password" class="form-control" name="clave" id="clave" maxlength="64" placeholder="Clave" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Permisos:</label>
                            <ul style="list-style: none;" id="permisos">
                              
                            </ul>
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Imagen:</label>
                            <input type="file" class="form-control" name="imagen" id="imagen">
                            <input type="hidden" name="imagenactual" id="imagenactual">
                            <img src="" width="150px" height="120px" id="imagenmuestra">
                          </div>

                          
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

                            <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                          </div>
                        </form>
                    </div>

                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
 <?php
  } // fin de if
  else {
      require "noacceso.php";
  } // fin menu
require 'footer.php';
?>
<script type="text/javascript" src="scripts/cliente.js"></script>
<?php
}
ob_end_flush();
?>