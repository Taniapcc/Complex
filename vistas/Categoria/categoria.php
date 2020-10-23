<?php
  if (inactividadSesion()){
    header("location:" . base_url() . "/Admon");  
  }
   header_admin($data);    
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

            <a class="btn btn-primary" href="<?php print base_url(); ?>/Categoria/alta" role="button">
            <i class="fa fa-plus-circle"></i> Agregar</a>
                                      
              <!-- #modal-lg -->
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>/Categoria"><i class="fa fa-home fa-lg"></i></a></li>
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
                <h3 class="card-title">Listado de Categorías</h3>
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
              </div>  <!-- /.col -->
             
            </div> <!-- /.row -->
           
          </div> <!-- /.card-body -->
                            
        </div><!-- /.card -->  


        <!--   formulario -->

        
      <div class="row"  id= "formularioregistros" name =  "formularioregistros">
          <div class="col-md-6">
          <div class="card card-primary">
          <div class="card-header">
                <h3 class="card-title">Categoria</h3>
           </div>

                 <form name="formulario" data-toggle="validator" id="formulario" method="POST" onsubmit="return validateForm()">
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label>Nombre(*):</label>
                            <input type="hidden" name="idcategoria" id="idcategoria" >
                            <input type="text" class="form-control" name="nombre" id="nombre" maxlength="50" 
                            placeholder= "Nombre" pattern = "[A-Z ]+" 
                            data-error = "Solo Mayúsculas"
                            title="Nombre debe contener  Letras Mayúsculas. Ej. LECHE"
                            required >
                           <div id="e-nombre" class = "errores" > </div>
                          </div>
                          
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label>Descripción(*):</label>
                            <input type="text" class="form-control" name="descripcion" id="descripcion" maxlength="256" placeholder="Descripción">
                            <div id="e-descripcion" class = "errores" >  </div>
                          </div>
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
                            <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                          </div>

                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <ul class="error" id="error"></ul>
                          </div>

                        </form>

          


            </div>
          </div>
      </div>
     
               

    </section>


  

    <!-- /.content -->
  </div>

  <?php
  // echo ($_SESSION['usuario']['nombre']);
  footer_admin($data);

  ?>

<script src="<?php echo media(); ?>/js/funciones_categoria.js"></script> 
