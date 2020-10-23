<?php
 if (inactividadSesion()){
  header("location:" . base_url() . "/Admon");  
  }
header_admin($data);

 $idauxiliares =$data['id_table'];

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- card Inicial -->
  <div class="card">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">


            <h1><i class="fas fa-user-tag"> </i><?php echo $data["page_title"]; ?>

              <a class="btn btn-primary" href="<?php print base_url(); ?>/Tablas/alta" role="button">
                <i class="fa fa-plus-circle"></i> Agregar</a>

                <input type="text" id="idTable" name="idTable"  value ='<?php isset($data['id_table']) ? print $data['id_table'] : ""; ?>' >                 
            
              

              <!-- #modal-lg -->
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>/Tablas"><i class="fa fa-home fa-lg"></i></a></li>
              <li class="breadcrumb-item active"><?php echo $data["page_title"]; ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card">
        <!-- <div class="card-header">-->
        <!-- /.card-header -->
        <div class="card-header">
          <h3 class="card-title">Listado de Tablas</h3>
        </div>

        <!-- /.card-header -->

        <div class="card-body">

          <!-- Inicio Tabla -->
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <!-- /.card-header -->

                  <!-- /.card-header -->
                  <div class="card-body">
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

                </div> <!-- /.card-body -->


                <!-- /. Tabla card-body -->
              </div> <!-- /COL 112 -->

              <!-- /.card -->
            </div> <!-- /.col -->

          </div> <!-- /.row -->

        </div> <!-- /.card-body -->

      </div><!-- /.card -->


      <!--   formulario -->


    </section>




    <!-- /.content -->
  </div>

  <?php
  // echo ($_SESSION['usuario']['nombre']);
  footer_admin($data);

  ?>

  <script src="<?php echo media(); ?>/js/funciones_tablasHija.js"></script>