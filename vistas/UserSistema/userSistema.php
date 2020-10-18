<?php
header_admin($data);
getModal('modalRoles', $data);
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
              <button type="button" class="btn bg-gradient-primary" name="btnAgregar" id="btnAgregar" data-toggle="modal" data-target="#modalFormRol" onclick="openModal();">
                <i class="fa fa-plus-circle"></i>
                Agregar
              </button>
              <!-- #modal-lg -->
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>/Dashboard"><i class="fa fa-home fa-lg"></i></a></li>
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
          <div class="card-body">

            <!-- Inicio Tabla -->
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <!-- /.card-header -->

                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="listadoRegistro" class="table table-bordered table-striped">
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
         
          <div class="card-footer">
            Footer
          </div> <!-- /.card-footer-->          
        </div><!-- /.card -->        
    </section>

    <section class="content">
      <div class="container-fluid">
      <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id= "formUser" name="formuser">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>



          </div> <!--col -->
        </div> <!-- row -->
      </div>  <!--- container fluid ---> 
    </section>     



    <!-- /.content -->
  </div>

  <?php
  // echo ($_SESSION['usuario']['nombre']);
  footer_admin($data);

  ?>