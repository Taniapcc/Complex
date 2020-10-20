<?php
  header_admin($data);
  getModal('modalRoles',$data);   
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
          <h1><i class = "fas fa-user-tag" > </i><?php echo $data["page_title"] ;?>
             <button type = "button" class="btn bg-gradient-primary" 
              name = "btnAgregar" id="btnAgregar" 
              data-toggle="modal" data-target="#modalFormRol" onclick = "openModal();" >
              <i class="fa fa-plus-circle"></i> 
              Agregar
            </button>
           <!-- #modal-lg -->
           </h1>
         </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">         
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>/Dashboard"><i class= "fa fa-home fa-lg"></i></a></li> 
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
               
              
        <div class="card-body">
       
          <!-- Inicio Tabla -->
          <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-header">
                <h3 class="card-title">Listado de  Roles</h3>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="listadoRoles" class="table table-bordered table-striped">
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
              </div>
              <!-- /.card-body -->
            </div>

         
              <!-- /. Tabla card-body -->
            </div>
            <!-- /.card -->         
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
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
   // echo ($_SESSION['usuario']['nombre']);
    footer_admin($data);
  ?>
  <!-- Para dataTables -->
  <script src="<?php echo media(); ?>/js/funciones_roles.js"></script>



 