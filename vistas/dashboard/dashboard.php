<?php
  header_admin($data);
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1><i class = "fas fa-tachometer-alt" ></i><?php echo $data["page_title"] ;?></h1>
         </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">         
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>/dashboard"><i class= "fa fa-home fa-lg"></i></a></li> 
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

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">       
          Empieza a crear tu dashboard !
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
  <!-- /.content-wrapper -->
  <?php
    footer_admin($data);
  ?>
