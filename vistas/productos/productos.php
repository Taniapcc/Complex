
<?php
    require ("Vistas/Templates/headerHome.php");
    require ("Vistas/Templates/navHome.php"); 
    //echo dep($data);      
?>
<section>

<div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Productos</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="registros" class="table table-bordered table-hover">
                  <thead>
                  <tr>  
                    <th>Opciones</th>
                    <th>Usuario</th>
                    <th>Nombre</th>
                    <th>Estado</th>
                    
                   </tr>
                  </thead>
                  <tbody>

                                


                 
               
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Opciones</th>
                    <th>Usuario</th>
                    <th>Nombre</th>
                    <th>Estado</th>



                  </tr>
                  </tfoot>
                </table>
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
<!-- /.container-fluid -->
    </section>


<?php     
    require ("Vistas/Templates/footerHome.php");

?>