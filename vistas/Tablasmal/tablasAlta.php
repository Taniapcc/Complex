<?php
 session_start();

 if (!isset($_SESSION["usuario"])) {
    header("location:" . base_url() . "/Admon");  
 } 

  if (inactividadSesion()){
    header("location:" . base_url() . "/Admon");  
  }
  header_admin($data);

 

  
?>
<!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- Content Header Page header -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><i class="fas fa-users"></i><?php echo $data["page_title"]; ?></h1>
          </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>/tablas"><i class="fa fa-home fa-lg"></i></a></li>
            <li class="breadcrumb-item active"><?php echo $data["page_title"]; ?></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 "   >

          <div class="card  card-primary">
                                       
              <div class="card-header"> 
                <h3 class="card-title"><?php echo $data['card_title'];  ?>   </h3>
              </div>
            
            <div class="card-body">
            <!-- Llamando al controlador -->
            <form name = "crear-tablas" id ="crear-tablas" action="<?php echo base_url(); ?>/Tablas/alta/" method="post">

                  <div class="form-group  col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <label for="nombre">Nombre(*)</label>
                    <input type="text" id="idauxiliares" name="idauxiliares"  value ='<?php isset($data['idauxiliares']) ? print $data['idauxiliares'] : ""; ?>' > 

                    <input type="text" class="form-control" id="nombre" name = "nombre"
                    value='<?php isset($data['nombre']) ? print $data['nombre'] : ""; ?>'  
                    placeholder="Ingrese nombre" required >
                 </div>

                 <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <label>Descripción (*) </label>
                        <textarea class="form-control" 
                              rows="3"
                              cols= "100"
                              id = "descripcion"
                              name = "descripcion"                                
                              required                           
                            placeholder="Descripción categoría">
                            <?php isset($data['descripcion']) ? print trim($data['descripcion']) : ""; ?> 
                            
                      </textarea>
                  </div>
   
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                         <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
                         <a class="btn btn-danger" href="<?php print base_url(); ?>/Tablas" role="button">
                          <i class="fa fa-arrow-circle-left"></i> Cancelar </a>                         
                 </div>

              
                
              </form> <!-- /.Formulario -->

             </div>
            <!-- /.card-body -->
           
            <!-- /.card-footer-->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- /.content-wrapper -->
<?php

footer_admin($data);

?>