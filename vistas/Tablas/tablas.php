<?php
ob_start();

if (inactividadSesion()) {
    header("location:" . base_url() . "/Admon");
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
                        <button class="btn btn-primary" id="btnagregar" onclick="mostrarform(true)">
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
        <div class="card" id="listadoregistros" name="listadoregistros" >
            <div class="card-header">
                <h3 class="card-title" id="card-title" name="card-title">
                    <?php echo $data["card_title"]; ?>
                </h3>
                <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <select class="form-control" name="ltablas" id="ltablas" data-live-search="true">
                        <?php
                        for ($i = 0; $i < count($data["ltablas"]); $i++) {
                            echo '<option value=' . $data["ltablas"][$i]["idtabla"] . '>' . $data["ltablas"][$i]["nombre"] . '</option>';
                        }
                        ?>
                    </select>
                </div>

            </div>

            <div class="card-body" >
                <!-- ¡Comienza a crear tu increíble aplicación! -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">

                            <div class="card">

                                <div class="card-body">
                                    <table id="listado" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Tbl</th>
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Descripcion</th>
                                                <th>Estado</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Tbl</th>
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Descripcion</th>
                                                <th>Estado</th>
                                                <th>Acciones</th>
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

        <div class="card card-primary col-lg-6 col-md-6 col-sm-6 col-xs-12" id="formularioregistros">
            <div class="card-header">
                <h3 class="card-title" id="tituloForm">Ejemplo rápido</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" id="formulario" method="POST">
                <div class="card-body">
                    <div class="form-group">                        
                        <label for="nombre">Nombre(*)</label>
                        <input type="hidden" name="idauxiliares" id="idauxiliares" >
                        <input type="hidden"  name="idsubtabla" id="idsubtabla"  > 
                        <input type="hidden"  name="idtabla" id="idtabla"  > 
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese nombre">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción(*)</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese descripción">
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
<script src="<?php echo media(); ?>/js/funciones_tablas.js"></script>



<?php
ob_end_flush()
?>