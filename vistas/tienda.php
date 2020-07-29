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
                          <h1 class="box-title">Tienda <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Nombre</th>
                            <th>Provincia</th>
                            <th>Ciudad</th>
                            <th>Direccion</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                          <th>Opciones</th>
                            <th>Nombre</th>
                            <th>Provincia</th>
                            <th>Ciudad</th>
                            <th>Direccion</th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>
                 
                    <div class="panel-body" style="height: 400px;" id="formularioregistros">
                    <!--<form action="insertar.php" method="GET" onsubmit="return validaCampos();"> -->   
                        <form name="formulario" data-toggle="validator" id="formulario" method="POST" onsubmit="return validar();" >
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Nombre(*):</label>
                            <input type="hidden" name="idtienda" id="idtienda" >
                            <input type="text" class="form-control" name="nombre" id="nombre" maxlength="50" 
                            placeholder= "Nombre" pattern = "[A-Z ]+" 
                            data-error = "Solo Mayúsculas"
                            title="Provincia debe contener  Letras Mayúsculas. Ej. TIENDA"
                            required >                           
                           <div id="mensaje1" class = "errores" > </div>
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Provincia(*):</label>
                            <input type="text" class="form-control" name="provincia" id="provincia" maxlength="50"
                             placeholder="Provincia" pattern = "[A-Z ]+" 
                             title="Solo acepeta  Letras Mayúsculas. Ej. PROVINCIA"
                             required>
                            <div id="mensaje2" class = "errores" > </div>
                            <span class= "help-block"> </span>
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Ciudad(*):</label>
                            <input type="text" class="form-control" name="ciudad" id="ciudad" maxlength="50" 
                            placeholder="Ciudad" pattern = "[A-Z ]+" 
                             title="Solo acepeta  Letras Mayúsculas. Ej. CIUDAD"
                             required>
                            <div id="mensaje3" class = "errores" > </div>
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Dirección(*):</label>
                            <input type="text" class="form-control" name="direccion" 
                            id="direccion" maxlength="256" placeholder="Dirección" required>
                            <div id="mensaje4" class = "errores" >  </div>
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
<script type="text/javascript" src="scripts/tienda.js"></script>
<script type="text/javascript" src="scripts/validacion.js"></script>
<!--https://es.stackoverflow.com/questions/148434/validar-datos-y-mostrar-alertas-bootstrap/148446> -->

<?php
}
ob_end_flush();
?>