<?php
if (inactividadSesion()) {
    header("location:" . base_url() . "/Admon");
}
header_admin($data);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <!--Boton de Agregar -->
                <div class="col-sm-6">
                    <h1><i class="fas fa-user-tag"> </i><?php echo $data["page_title"]; ?>
                        <a class="btn btn-primary" href="<?php print base_url(); ?>/Roles/alta" role="button">
                            <i class="fa fa-plus-circle"></i> Agregar</a>
                    </h1>
                </div>
                <!-- Boton de Agregrar -->

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>/Roles"><i class="fa fa-home fa-lg"></i></a></li>
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
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <?php echo $data["card_title"]; ?>
                </h3>
            </div>
            <div class="card-body">
                ¡Comienza a crear tu increíble aplicación!
                <table id="listado" class="table table-bordered table-striped">
                    <thead>
                        <tr>
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
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                </table>
            </div> <!-- /.card-body -->
        </div> <!-- /.card -->

        <!------- FORMULARIO --->



    </section> <!-- Main content -->
    <!-- /.content -->
</div> <!-- fin wrapper -->


<?php
// echo ($_SESSION['usuario']['nombre']);
footer_admin($data);

?>

<script src="<?php echo media(); ?>/js/funciones_roles.js"></script>