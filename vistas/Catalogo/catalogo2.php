<?php
headerHome($data);

?>

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
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>/Catalogo"><i class="fa fa-home fa-lg"></i></a></li>
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
                <h3 align="center" class="card-title" id="card-title" name="card-title">
                    <?php echo $data["card_title"]; ?>
                </h3>

                <!--
                <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <select class="form-control" name="ltablas" id="ltablas" data-live-search="true">
                        <?php
                        for ($i = 0; $i < count($data["ltablas"]); $i++) {
                            echo '<option value=' . $data["ltablas"][$i]["idcategoria"] . '>' . $data["ltablas"][$i]["nombre"] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                    -->
            </div>

            <div class="card-body">
                <!-- ¡Comienza a crear tu increíble aplicación! -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">

                            <div class="card">

                                <div class="card-body">

                                  


                                </div>
                                <!--card-body-->
                            </div> <!-- card -->
                        </div> <!-- col -12 -->
                    </div> <!-- row  -->
                </div> <!-- Container- fluid -->

            </div> <!-- /.card-body -->

        </div> <!-- /.card -->

        <!------- FORMULARIO --->



        <!--- fin FORMULARIO--->

    </section> <!-- Main content -->
    <!-- /.content -->
</div> <!-- fin wrapper -->


<!--Fin-Contenido-->

<?php
// echo ($_SESSION['usuario']['nombre']);
footerHome($data);

?>
<script src="<?php echo media(); ?>/js/funciones_catalogo.js"></script>

<?php
ob_end_flush()
?>