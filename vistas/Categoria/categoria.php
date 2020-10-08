<?php
  header_admin($data);
  getModal('modalRoles',$data);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1><i class = "fas fa-cog" > </i><?php echo $data["page_title"] ;?>
             <button type = "button" class="btn bg-gradient-primary" name = "btnAgregar" id="btnAgregar" onclick="openModal();" ><i class="fa fa-plus-circle"></i> Agregar</button>  
        </h1>
         </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">         
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>/roles"><i class= "fa fa-home fa-lg"></i></a></li> 
              <li class="breadcrumb-item active"><?php echo $data["page_title"] ;?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Title</h3>
         </div>
        <div class="card-body">
          Roles de usuario !

          <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
          </div>
                    
          <div class="panel-body" style="height: 400px;" id="formularioregistros">
              <form name="formulario" data-toggle="validator" id="formulario" method="POST" onsubmit="return validateForm()">
                  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                       <label>Nombre(*):</label>
                              <input type="hidden" name="Tcidcategoria" id="idcategoria" >
                              <input type="text" class="form-control" name="nombre" id="nombre" maxlength="50" 
                              placeholder= "Nombre" pattern = "[A-Z ]+" 
                              data-error = "Solo Mayúsculas"
                              title="Nombre debe contener  Letras Mayúsculas. Ej. LECHE"
                              required >
                            <div id="e-nombre" class = "errores" > </div>
                            </div>
                          
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Descripción(*):</label>
                            <input type="text" class="form-control" name="descripcion" id="descripcion" maxlength="256" placeholder="Descripción">
                            <div id="e-descripcion" class = "errores" >  </div>
                          </div>
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
                            <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <ul class="error" id="error"></ul>
                          </div>
            </form>
          </div> 
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>
  <?php
    footer_admin($data);
  ?>
