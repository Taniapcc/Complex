<?php
headerHome($data);

//echo dep($data);
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
                <img class="d-block w-100" src="<?php echo media(); ?>/img/Slides/Slide1.jpg" alt="Primer Slide" style="width:100%;">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="<?php echo media(); ?>/img/Slides/slide2.jpg" alt="Segundo Slide" style="width:100%;">

              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="<?php echo media();?>/img/Slides/slide3.jpg" alt="Tercer Slide" style="width:100%;">

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

  <div class="col-mde-12">

    <div class="container">
      <div class="card-deck">
        <div class="card">
          <img src="<?php echo media();?>/img/card/card1.jpg" class="card-img-top" alt="Foto Leche">
          <div class="card-body">
            <h5 class="card-title">Leche</h5>
            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
        </div>
        <div class="card">
          <img src="<?php echo media();?>/img/card/card2.jpg" class="card-img-top" alt="Foto Leche">
          <div class="card-body">
            <h5 class="card-title">Queso</h5>
            <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
        </div>
        <div class="card">
          <img src="<?php echo media();?>/img/card/Card3.jpg" class="card-img-top" alt="Foto Manjar">
          <div class="card-body">
            <h5 class="card-title">Majar</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
        </div>
      </div>
    </div>
  </div>
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
//echo base_url()."<br>";
//echo passGenerador();
//echo formatMoney(23240);
footerHome($data);
?>