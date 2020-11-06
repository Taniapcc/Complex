<?php
ob_start();

if (inactividadSesion()) {
    header("location:" . base_url() . "/admon");
}
header_admin($data);
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

                    </h1>
                </div>
                <!-- Boton de Agregrar -->

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>/Permiso"><i class="fa fa-home fa-lg"></i></a></li>
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
                                                <th>Cedula</th>
                                                <th>Nombre</th>
                                                <th>Estado</th>
                                            </tr>
                                        </thead>
                                        <tbody>



                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Acciones</th>
                                                <th>ID</th>
                                                <th>Cedula</th>
                                                <th>Nombre</th>
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
                                <label for="nombre">Nombre(*)</label>
                                <input type="hidden" name="idusuario" id="idusuario">
                                <input type="hidden" name="id" id="id">
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese nombre">
                            </div>
                        </div>
                    </div>
                    <!--
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <ul id="permisos" name="permisos" style="list-style : none;">

                            </ul>
                        </div>
                    </div>

-->



                    <div class="row">
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Permisos:  </label>
                            <div class="custom-control custom-switch">
                                <ul id="permisos" name="permisos" style="list-style : none;">
                                    <!-- <li> <input type="checkbox" name=permiso[] class="custom-control-input" id="customSwitch1" name=permiso>
                                        <label class="custom-control-label" for="customSwitch1">Escritorio</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" name=permiso[] class="custom-control-input" id="customSwitch2" name=permiso>
                                        <label class="custom-control-label" for="customSwitch2">Admin</label>
                                     </li>
-->
                                </ul>

                            </div>

                        </div>

                    </div>

                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> Guardar</button>
                        <button type="button" class="btn btn-secondary" onclick="cancelarform()"> <i class="fa fa-arrow-circle-left"></i>Cancelar</button>

                    </div>

            </form>
        </div>

        <!--- fin FORMULARIO--->

    </section> <!-- Main content -->
    <!-- /.content -->
</div> <!-- fin wrapper -->


<!--Fin-Contenido-->

<?php
// echo ($_SESSION['usuario']['nombre']);
footer_admin($data);

?>
<script src="<?php echo media(); ?>/js/funciones_permiso.js"></script>


<?php
ob_end_flush()
?>