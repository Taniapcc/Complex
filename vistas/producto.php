<?php
ob_start();
session_start();

if (!isset($_SESSION["nombre"])) {
  header("Location: login.html");
}
else {
require 'header.php';
if ($_SESSION['administrador']==1) {
  
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
                          <h1 class="box-title">Productos 
                          <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)">
                          <i class="fa fa-plus-circle"></i> Agregar</button>
                          <a target = "_blank" href="../reportes/rptproductos.php"><button class="btn btn-info"> Reporte</button>
                           </a>
                          
                          </h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">

                        <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>Seleccione una categoría(*):</label>
                            <select id="lcategoria" name="lcategoria" class="form-control selectpicker" data-live-search="true" required></select> 
                        </div>

                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Categoría</th>
                            <th>Nombre</th>                            
                            <th>Precio</th>                                                   
                            <th>Código</th> 
                            <th>Imagen</th>
                            <th>Estado</th>

                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Categoría</th>  
                            <th>Precio</th>
                            <th>Código</th>
                            <th>Imagen</th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>
                    
                
                <div class="panel-body" id="formularioregistros">
                        <form name="formulario" data-toggle="validator" id="formulario" method="POST">

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Categoría(*):</label>
                            <select id="idcategoria" name="idcategoria" class="form-control selectpicker" data-live-search="true" required></select> 
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Nombre(*):</label>
                            <input type="hidden" name="idproducto" id="idproducto">
                            <input type="text" class="form-control" name="nombre" id="nombre" maxlength="100" placeholder="Nombre" required>
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Presentacion(*):</label>
                            <select id="idpresentacion" name="idpresentacion" class="form-control selectpicker" data-live-search="true" required></select> 
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Unidad(*):</label>
                            <select id="idmedida" name="idmedida" class="form-control selectpicker" data-live-search="true" required></select> 
                          </div>

                          <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <label>Stock(*):</label>
                            <input type="number" class="form-control" name="stock" id="stock"  pattern = "[1-9]+" 
                            data-error = "Solo numeros"
                            title="Stock  debe ser mayor que 0. Ej. 10"
                            
                            required  >
                          </div>

                          <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <label>Precio(*):</label>
                             <input type="text" class="form-control" name="precio" id="precio" maxlength="14" placeholder="Precio" required>
                          </div>
                          
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Descripción:</label>
                            <input type="text" class="form-control" name="descripcion" id="descripcion" maxlength="256" placeholder="Descripción">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Imagen:</label>
                            <input type="file" class="form-control" name="imagen" id="imagen">
                            <input type="hidden" name="imagenactual" id="imagenactual">
                            <img src="" width="150px" height="120px" id="imagenmuestra">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Código(*) :</label>
                            <input type="text" class="form-control" name="codigo" id="codigo" placeholder="Código Barras" required>
                            <button class="btn btn-success" type="button" onclick="generarbarcode()">Generar</button>
                            <button class="btn btn-info" type="button" onclick="imprimir()">Imprimir</button>
                            <div id="print">
                              <svg id="barcode"></svg>
                            </div>
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
<script type="text/javascript" src="../public/js/JsBarcode.all.min.js"></script>
<script type="text/javascript" src="../public/js/jquery.PrintArea.js"></script>
<script type="text/javascript" src="scripts/productoRes.js"></script>

<?php
} //sesiones
ob_end_flush();
?>