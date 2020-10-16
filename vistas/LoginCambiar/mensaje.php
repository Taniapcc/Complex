                                                            |<?php
    require ("Vistas/Templates/headerHome.php");
    require ("Vistas/Templates/navHome.php");         
?>

<!-- Main content -->
<div class="content">
      <div class="container">
        <div class="row">         
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
                <div class="card">
                
                <div class="card-header card <?php echo $data["color"] ; ?> text-white">
                          <h5 class="card-title m-0"><?php echo $data["page_title"] ; ?> </h5>
                    </div>  <!-- card header -->
                    <div class="card-body">

                          <p class="card-text"><?php echo $data["texto"];?></p>
                          <a href="<?php echo  $data['url'] ; ?>" class="<?php echo $data['classbtn'] ; ?> "><?php echo $data['name_boton']; ?></a>

                     </div> <!-- card body -->
                </div>  <!--card -->
          </div>  <!-- /.col-md-6 -->
        </div>  <!-- /.row -->
        
      </div><!-- /.container-fluid -->
</div>   <!--content-->

<!-- fin MAIN CONTENT -->


<?php     
  require ("Vistas/Templates/footerHome.php");
?>  

