<?php
ob_start();

if (inactividadSesion()) {
    header("location:" . base_url() . "/Login");
}


headerHome($data);

?>
<!--Contenido-->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <!--Boton de Agregar -->
                <div class="col-sm-6">
                    <h1><i class="fas fa-user-tag"> </i><?php echo $data["page_title"]; ?>
                        <button class="btn btn-primary" id="btnagregar" tabindex="0" onclick="mostrarform(true)">
                            <i class="fa fa-plus-circle"></i> Agregar</button>
                    </h1>
                </div>
                <!-- Boton de Agregrar -->

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>/Tablas"><i class="fa fa-home fa-lg"></i></a></li>
                        <li class="breadcrumb-item active"><?php echo $data["page_title"]; ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Fin cabecera -->

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card" id="listadoregistros" name="listadoregistros">
            <div class="card-header">
                <h3 class="card-title" id="card-title" name="card-title">
                    <?php echo $data["card_title"]; ?>
                </h3>
                <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <select class="form-control" name="ltablas" id="ltablas" data-live-search="true">
                        <?php
                        for ($i = 0; $i < count($data["ltablas"]); $i++) {
                            echo '<option value=' . $data["ltablas"][$i]["idcategoria"] . '>' . $data["ltablas"][$i]["nombre"] . '</option>';
                        }
                        ?>
                    </select>
                </div>

            </div>

            <div class="card-body">
                <!-- ¡Comienza a crear tu increíble aplicación! -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">

                            <div class="card">

                                <div class="card-body">
                                    <table id="listado" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Acciones</th>
                                                <th>ID</th>
                                                <th>Línea</th>
                                                <th>Prest.</th>
                                                <th>Tam</th>
                                                <th>Med.</th>
                                                <th>Precio</th>
                                                <th>Stock</th>
                                                <th>Imagen</th>
                                                <th>Estado</th>                                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                       


                                        </tbody>
                                        <tfoot>
                                            <tr>
                                            <th>Acciones</th>
                                                <th>ID</th>
                                                <th>Línea</th>
                                                <th>Prest.</th>
                                                <th>Tam</th>
                                                <th>Med.</th>
                                                <th>Precio</th>
                                                <th>Stock</th>
                                                <th>Imagen</th>
                                                <th>Estado</th>     
                                                
                                            </tr>
                                        </tfoot>
                                    </table>


                                </div>
                                <!--card-body-->
                            </div> <!-- card -->
                        </div> <!-- col -12 -->
                    </div> <!-- row  -->
                </div> <!-- Container- fluid -->

            </div> <!-- /.card-body -->

        </div> <!-- /.card -->

        <!------- FORMULARIO --->

        <div class="card card-primary col-lg-12 col-md-12 col-sm-12 col-xs-12" id="formularioregistros">
            <div class="card-header">
                <h3 class="card-title" id="tituloForm">Ejemplo rápido</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" id="formulario" method="POST">
                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group ">
                                <label for="nombre">Línea(*)</label>
                                <input type="hidden" name="idcategoria" id="idcategoria">
                                <input type="hidden" name="idproducto" id="idproducto">
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese nombre">
                            </div>
                        </div>
                       
                        <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <label> Presentación (*)</label>
                            <select class="form-control" name="lpresentacion" id="lpresentacion" data-live-search="true">
                                <?php
                                for ($i = 0; $i < count($data["lpresentacion"]); $i++) {
                                    echo '<option value=' . $data["lpresentacion"][$i]["idpresentacion"] . '>' . $data["lpresentacion"][$i]["nombre"] . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                    </div>

                    <div class="row">
                        <div class="form-group col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                            <label for="tamanio">Tamaño(*)</label>
                            <input type="text" class="form-control" id="tamanio" name="tamanio" placeholder="Ingrese tamaño">
                        </div>

                    
                        <div class="form-group col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <label> Medida (*)</label>

                            <select class="form-control" name="lmedidas" id="lmedidas" data-live-search="true">
                                <?php
                                for ($i = 0; $i < count($data["lmedidas"]); $i++) {
                                    echo '<option value=' . $data["lmedidas"][$i]["idmedidas"] . '>' . $data["lmedidas"][$i]["nombre"] . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <label for="stock">Stock(*)</label>
                            <input type="text" class="form-control" id="stock" name="stock"    size= 4 placeholder="Ingrese stock">
                        </div>

                    </div>

                    <div class="row">
                        <div class="form-group col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="form-group ">
                                <label for="precio">Precio(*)</label>
                                <input type="text" class="form-control" id="precio" name="precio" placeholder="Ingrese precio" pattern="^(\d|-)?(\d|,)*\.?\d*$" >
                            </div>
                        </div>

                        <div class="form-group col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="form-group ">
                                <label for="iva">IVA(*)</label>
                                <input type="text" class="form-control" id="iva" name="iva" placeholder="Ingrese iva" value="0" pattern="^(\d|-)?(\d|,)*\.?\d*$" >
                            </div>
                        </div>

                        <div class="form-group col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="form-group ">
                                <label for="descuento">Descuento(*)</label>
                                <input type="text" class="form-control" id="descuento" name="descuento" value="0" placeholder="Ingrese descuento" pattern="^(\d|-)?(\d|,)*\.?\d*$" >
                            </div>
                        </div>

                        <div class="form-group col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="form-group ">
                                <label for="costoe">Costo Envio(*)</label>
                                <input type="text" class="form-control" id="costoe" name="costoe" value="0" placeholder="Ingrese costo envio" pattern="^(\d|-)?(\d|,)*\.?\d*$" >
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        

                        <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group ">
                                <label for="imagen">Imagen:</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="imagen" name="imagen">
                                        <input type="hidden" name="imagenactual" id="imagenactual">
                                        <label class="custom-file-label" for="imagen">Escoja archivo</label>                                       
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group ">
                                <label for="descripcion">Descripción(*)</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese descripcion">
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <img src="" width="150px" height="120px" id="imagenmuestra">
                        </div>

                        
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> Guardar</button>
                        <button type="button" class="btn btn-secondary" onclick="cancelarform()"> <i class="fa fa-arrow-circle-left"></i>Cancelar</button>

                    </div>

            </form>
        </div>

        <!-- Otro formulario -->

        <!--- fin FORMULARIO--->

    </section> <!-- Main content -->
    <!-- /.content -->
</div> <!-- fin wrapper -->


<!--Fin-Contenido-->

<?php
// echo ($_SESSION['usuario']['nombre']);
require("Vistas/Templates/footerHome.php");

?>
<script src="<?php echo media(); ?>/js/funciones_carrito.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        bsCustomFileInput.init();
    });
</script>



<?php
ob_end_flush()
?>