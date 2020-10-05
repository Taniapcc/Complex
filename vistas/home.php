<?php
    require ("layout/header.php");
    require ("layout/nav.php"); 
?>
  <!-- Content Wrapper. Contains page content -->
          <!-- Main content -->
    
   <section class="content">

<!-- START ACCORDION & CAROUSEL-->
<!--<h5 class="mt-4 mb-2">Bootstrap Accordion & Carousel</h5>-->

<div class="row">
  
  <!-- /.col -->
  <div class="col-md-12">
    <div class="card">
     <!-- <div class="card-header">
         <h3 class="card-title">Carousel</h3>
      </div> -->
      <!-- /.card-header -->
      <div class="card-body">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
              <div class="carousel-item active">
               <!-- <img class="d-block w-100" src="https://placehold.it/900x250/39CCCC/ffffff&text=Slide1" alt="First slide"> -->
               <img  class="d-block w-100" src="../public//dist/img/Slides/Slide1.jpg"    alt="Primer Slide" style="width:100%;">
              </div>
              <div class="carousel-item">
               <!-- <img class="d-block w-100" src="https://placehold.it/900x250/3c8dbc/ffffff&text=Slide2" alt="Second slide"> -->
               <img  class="d-block w-100" src="../public//dist/img/Slides/slide2.jpg"    alt="Segundo Slide" style="width:100%;">

              </div>
              <div class="carousel-item">
              <img  class="d-block w-100" src="../public//dist/img/Slides/slide3.jpg"    alt="Tercer Slide" style="width:100%;">

               <!-- <img class="d-block w-100" src="https://placehold.it/900x250/f39c12/ffffff&text=Slide3" alt="Third slide"> -->
              </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>

<!-- END ACCORDION & CAROUSEL-->

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Usuarios</h3>
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

                  <?php

                    foreach($matrizPersona as $registro){?>
                          <tr>
                            <!-- <td>
                                <a href="editar-persona.php?id= <?php echo $registro["idusuario"]; ?>" class="btn bg-success btn-flat margin">
                                <i class="fa fa-pencil-alt"></i>
                                </a>
                                <a href="#" data-id="<?php echo $registro["idusuario"]; ?>" data-tipo ="admin" class="btn bg-maroon  btn-flat margin borrar-registro" > 
                                <i <?Php echo $registro["condicion"] ? 'class= "far fa-check" ': '"fa fa-close"'; ?>>
                                </i>
                                </a>
                              </td>  -->

                              <td>
                                <?php 
                                  echo '<button class="btn btn-warning" onclick="mostrar('.$registro["idusuario"].')"><i class="fas fa-pen"></i></button>';
                                 if ($registro["condicion"]){
                                     echo '<button class="btn btn-danger" onclick="mostrar('.$registro["idusuario"].')"><i class="fa fa-times"></i></button>';
                                  }else {
                                     echo ' <button class="btn btn-primary" onclick="activar('.$registro["idusuario"].')"><i class="fa fa-check"></i></button>';
                                 }                                  
                                  
                                ?>
                              </td>
                             
                              <td><?php echo $registro["login"];  ?></td>
                              <td><?php echo $registro["nombre"];  ?>  </td> 
                              <td><?php echo $registro["condicion"] ?'<span class="label bg-green">Activado</span>':
                              '<span class="label bg-red">Desactivado</span>'
                              ; ?></td>
                             
                          </tr>                          
                        
                  <?php   }
                  ?>
                  
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
              <!-- /.card-body -->
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
    <!-- /.content -->


      
          </div>
          <!-- /.col-md-6 -->
          
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
       
<?php
    require ("layout/footer.php");
?>