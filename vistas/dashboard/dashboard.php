<?php
ob_start();

if (inactividadSesion()) {
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
          <h1><i class="fas fa-tachometer-alt"></i><?php echo $data["page_title"]; ?></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>/dashboard"><i class="fa fa-home fa-lg"></i></a></li>
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
      <div class="card-header">
        <h3 class="card-title"></h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fas fa-times"></i></button>
        </div>
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">
                  <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">Tráfico de CPU</font>
                  </font>
                </span>
                <span class="info-box-number">
                  <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">
                      10
                    </font>
                  </font><small>
                    <font style="vertical-align: inherit;">
                      <font style="vertical-align: inherit;">%</font>
                    </font>
                  </small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">
                  <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">Gustos</font>
                  </font>
                </span>
                <span class="info-box-number">
                  <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">41.410</font>
                  </font>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">
                  <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">Ventas</font>
                  </font>
                </span>
                <span class="info-box-number">
                  <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">760</font>
                  </font>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">
                  <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">Nuevos miembros</font>
                  </font>
                </span>
                <span class="info-box-number">
                  <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">2000</font>
                  </font>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>


      </div>


      <div class="card-body">
        <div class="row">
          <div class="col-md-8">
            <p class="text-center">
              <strong>Sales: 1 Jan, 2020 - 30 Jul, 2020</strong>
            </p>

            <div class="chart">
              <!-- Sales Chart Canvas -->
              <canvas id="salesChart" height="180" style="height: 180px;"></canvas>
            </div>
            <!-- /.chart-responsive -->
          </div>
          <!-- /.col -->
          <div class="col-md-4">
            <p class="text-center">
              <strong>Goal Completion</strong>
            </p>

            <div class="progress-group">
              Add Products to Cart
              <span class="float-right"><b>160</b>/200</span>
              <div class="progress progress-sm">
                <div class="progress-bar bg-primary" style="width: 80%"></div>
              </div>
            </div>
            <!-- /.progress-group -->

            <div class="progress-group">
              Complete Purchase
              <span class="float-right"><b>310</b>/400</span>
              <div class="progress progress-sm">
                <div class="progress-bar bg-danger" style="width: 75%"></div>
              </div>
            </div>

            <!-- /.progress-group -->
            <div class="progress-group">
              <span class="progress-text">Visit Premium Page</span>
              <span class="float-right"><b>480</b>/800</span>
              <div class="progress progress-sm">
                <div class="progress-bar bg-success" style="width: 60%"></div>
              </div>
            </div>

            <!-- /.progress-group -->
            <div class="progress-group">
              Send Inquiries
              <span class="float-right"><b>250</b>/500</span>
              <div class="progress progress-sm">
                <div class="progress-bar bg-warning" style="width: 50%"></div>
              </div>
            </div>
            <!-- /.progress-group -->
          </div>
          <!-- /.col -->
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
<!-- /.content-wrapper -->

<!-- /.content-wrapper -->
<?php
footer_admin($data);
?>
<script src="<?php echo media(); ?>/js/pages/dashboard2.js"></script>