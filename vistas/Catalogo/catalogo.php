<?php
    require ("Vistas/Templates/headerHome.php");
    require ("Vistas/Templates/navHome.php");         
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <!--Boton de Agregar -->
                <div class="col-sm-6">
                    <h1><i class="fas fa-user-tag"> </i><?php echo $data["page_title"]; ?>
                       <!-- <button class="btn btn-primary" id="btnagregar" tabindex="0" onclick="mostrarform(true)">
                            <i class="fa fa-plus-circle"></i> Agregar</button> -->
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
                <h3 align = "center" class="card-title" id="card-title" name="card-title">
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

                                     <table border="0" width="700" align="center" class="table">
                                        <tr align="center">
                                            <?php
                                            $num = 0;

                                            for ($i=0; $i < count($data['lproductos']) ; $i++) { 
                                                if ($num == 3) {
                                                    echo "<tr align = 'center'>";
                                                    $num = 1;
                                                } else {
                                                    $num++;
                                                } // fin if
                                                ?>

                                                <th><img src="./Assets/img/upload/productos/<?php echo $data['lproductos'][$i]['imagen'] ; ?>" width="120" height="120">
                                                    <br>
                                                    <label> <?php echo  $data['lproductos'][$i]['categoria'];?></label>
                                                    <br>
                                                    <label> <?php echo  $data['lproductos'][$i]['nombre'];?></label>
                                                    <br>
                                                    <label> <?php echo "Precio ". formatMoney($data['lproductos'][$i]['precio']);?></label>
                                                    <br>
                                                <!--    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="enviar1(<?php echo $reg[0]; ?>)">Agregar</button> -->
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="enviar1(<?php $data['lproductos'][$i]['idproducto']; ?>)">Agregar</button>

                                                
                                                </th>

                                            <?php

                                            }
                                            ?>



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



        <!--- fin FORMULARIO--->

    </section> <!-- Main content -->
    <!-- /.content -->
</div> <!-- fin wrapper -->


<!--Fin-Contenido-->

<?php
// echo ($_SESSION['usuario']['nombre']);
require ("Vistas/Templates/footerHome.php");

?>
<script src="<?php echo media(); ?>/js/funciones_catalogo.js"></script>

<?php
ob_end_flush()
?>




