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
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                          <h1 class="box-title">Categoría 
                            <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button>
                          </h1>
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
                            <th>Descripción</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>
                    
                    <div class="panel-body" style="height: 400px;" id="formularioregistros">
                        <form name="formulario" data-toggle="validator" id="formulario" method="POST" onsubmit="return validateForm()">
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Nombre(*):</label>
                            <input type="hidden" name="idcategoria" id="idcategoria" >
                            <input type="text" class="form-control" name="nombre" id="nombre" maxlength="50" 
                            placeholder= "Nombre" pattern = "[A-Z ]+" 
                            data-error = "Solo Mayúsculas"
                            title="Nombre debe contener  Letras Mayúsculas. Ej. LECHE"
                            required >
                           <div id="e-nombre" class = "errores" > </div>
                          </div>
                          
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Descripción(*):</label>
                            <input type="text" class="form-control" name="descripcion" id="descripcion" maxlength="256" placeholder="Descripción">
                            <div id="e-descripcion" class = "errores" >  </div>
                          </div>
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
                            <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <ul class="error" id="error"></ul>
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
require 'footer.php'; ?>
<script type="text/javascript" src="scripts/categoria.js"></script>

<?php
} //fin sesion
ob_end_flush();
?>